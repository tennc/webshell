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
   if ($login!==false && (!isset($_SERVER['PHP_AUTH_USER']) || 
      $_SERVER['PHP_AUTH_USER']!=$login || $_SERVER['PHP_AUTH_PW']!=$pass)) {
      header("WWW-Authenticate: Basic realm=\"phpRemoteView\"");
      header("HTTP/1.0 401 Unauthorized");
      exit("<h1><a href=http://php.spb.ru/remview/>phpRemoteView</a>: Access Denied - password erroneous</h1>\n");
   }

   error_reporting(E_ALL);
   set_magic_quotes_runtime(0);
   @set_time_limit(0);
   @ini_set('max_execution_time',0);
   @ini_set('output_buffering',0);
   if (function_exists("ob_start") && (!isset($c) || $c!="md5crack")) ob_start("ob_gzhandler");

   $self=basename($_SERVER['PHP_SELF']);

   $url="http://".getenv('HTTP_HOST').
        (getenv('SERVER_PORT')!=80 ? ":".getenv('SERVER_PORT') : "").
        $_SERVER['PHP_SELF'].
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
      if (isset($_POST[$v])) $$v=$_POST[$v];
         elseif (isset($_GET[$v])) $$v=$_GET[$v];
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
   if (isset($_COOKIE["cp$panel"])) 
      $cp=explode("~",$_COOKIE["cp$panel"]); 
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
                  break;
               default:
                  echo jsval("??");
                  break;
               }
               break;
            
            case "s": 
               if ($ftype[$k]=='file') echo jsval(sizeparse($fsize[$k])); 
               else echo jsval(''); 
               break;
            
            case "o": 
               $tmp=@_posix_getpwuid($fowner[$k]);
               if (!isset($tmp['name']) || $tmp['name']=="") $tow=$fowner[$k];
               else $tow=$tmp['name'];
               echo jsval($tow);
               break;
            
            case "g": 
               $tmp2=@_posix_getgrgid($fgroup[$k]);
               if (!isset($tmp2['name']) || $tmp2['name']=="") $tgr=$fgroup[$k];
               else $tgr=$tmp2['name'];
               echo jsval($tgr);
               break;
            
            case "a": 
               $tmp=@_posix_getpwuid($fowner[$k]);
               if (!isset($tmp['name']) || $tmp['name']=="") $tow=$fowner[$k];
               else $tow=$tmp['name'];
               $tmp2=@_posix_getgrgid($fgroup[$k]);
               if (!isset($tmp2['name']) || $tmp2['name']=="") $tgr=$fgroup[$k];
               else $tgr=$tmp2['name'];
               echo jsval("$tow/$tgr");
               break;

            case "c": 
               echo jsval(display_perms($fperms[$k])); break;
            
            case "1": echo jsval(date($cp[2],$fctime[$k])); break;
            
            case "2": echo jsval(date($cp[2],$fmtime[$k])); break;
            
            case "3": echo jsval(date($cp[2],$fatime[$k])); break;

            default: echo "??$cn[$i]??";

         } //switch ($ftype)
      
      }//for ($cn)
      
      echo "0);\n";

   }//foreach ($names)
   
   echo "\n\n</script>\n\n\n";
   
   echo '</td></tr></table></td></tr></table></td></tr></table>';


   echo "<P align=center>
   <font size=1 style='Font: 8pt Verdana'><B>
   <a href=$self?c=setup&ref=$uurl>".mm("Setup")."</a> | 
   <a href=$self?c=t>PHP eval</a> | 
   <a href=$self?c=phpinfo>phpinfo()</a> | 
   <a href=$self?c=t>Shell</a> | 
   <a href=$self?c=codes>".mm("Char map")."</a> |
   ".mm("Language").": 
   <a href=$self?c=set&c2=eng&ref=$uurl&pan=0>".mm("English")."</a>/<a href=$self?c=set&c2=rus&ref=$uurl&pan=0>".mm("Russian")."</a>
   
   </b>
   <hr size=1 noshade width=55%><center>

   <table border=0 cellspacing=0 cellpadding=0><tr><td width=32>
   <font face=webdings style='Font-size: 22pt;'>&#0033;</font></td><td>
   <font size=1 style='Font: 8pt Verdana'>phpRemoteView &copy; Dmitry Borodin (".mm("version")." $version)<br>
   ".mm("Free download")." - <a href='http://php.spb.ru/remview/'>http://php.spb.ru/remview/</a></b></font></td>
   </tr></table>";

break;


case "set": 

   switch ($c2) {
      case "sort":
         $name=intval($name);
         if ($name==$cc[0]) if ($cc[1]==='0') $cc[1]='1'; else $cc[1]='0';
         $cc[0]=$name;
         break;

      case "panel":
         $cn='';
         foreach ($names as $k=>$v) {
            if ($v!="") $cn.=substr($v,0,1);
         }
         $cc[0]=substr($sort,0,1);
         $cc[1]=substr($sortby,0,1);
         $cp[2]=substr($datetime,0,50);
         $cp[3]=substr($fontname,0,50);
         $cp[4]=substr($fontsize,0,50);

         //exit("cn=$cn<br>cc=$cc");
         break;

      case "eng":
         $cc[5]=1;
         break;

      case "rus":
         $cc[5]=2;
         break;

   }


   $cookie=$cc."~".$cn."~".$cp[2]."~".$cp[3]."~".$cp[4];
   if ($c2=="reset") $cookie=implode("~",$cp_def);
   //echo "<script>alert('$cookie')</script>";
   setcookie("cp$pan",$cookie,time()+24*60*60*333,'/');
   header("Location: $ref");
   echo "<script>location.href=\"$ref\";</script>";
   //echo "[$ref]";
   //phpinfo();
   break;


case "setup": 

   echo $GLOBALS['html'];

   echo "<center><h3><b>phpRemoteView ".mm("setup")."</b> [<A href='javascript:history.go(-1)'>".mm("back")."</a>]</h3></center><hr size=1 noshade>";

   echo "<STYLE>
   .setup {
      font-size: 8pt;
      font-family: Tahoma;
   }
   HTML, TD {font: 90%}
   </STYLE>";

   echo "
   <b><u>".mm("Reset all settings")."</u></b>: <a href=$self?c=set&c2=reset&pan=$panel&ref=$ref>".mm("clear")."</a>";
   echo " <font color=white>(".mm("Current").": <small>".implode(" | ",$cp)."</small>)</font><P>";

   echo "
   <form action=$self method=post>
   <input type=hidden name=c value=\"set\">
   <input type=hidden name=c2 value=\"panel\">
   <input type=hidden name=pan value=\"$panel\">
   <input type=hidden name=ref value=\"$ref\">
   ";
   echo "<b><u>".mm("Colums and sort")."</u></b><br>";

   echo "".mm("Sort order").": ";
   echo "<input type=radio name=sortby value=0 id=q3 ".($cc[1]=='0'?"checked":"").">";
   echo "<label for=q3>".mm("Ascending sort")."</label>";
   echo "<input type=radio name=sortby value=1 id=q4 ".($cc[1]=='1'?"checked":"").">";
   echo "<label for=q4>".mm("Descending sort")."</label><br>";

   echo "<input type=radio name=sort value='n' id=q1 ".($cc[0]=='n'?"checked":"").">";
   echo "<label for=q1>".mm("Sort by filename")."</label>";
   echo "<input type=radio name=sort value='e' id=q2 ".($cc[0]=='e'?"checked":"").">";
   echo "<label for=q2>".mm("Sort by filename extension")."</label>";
   echo "<table border=0 cellspacing=0 cellpadding=3>";
   for ($i=0; $i<2; $i++) {
      echo "<tr>";
      for ($j=0; $j<7; $j++) {
         $n=$j+$i*7;
         echo "<td align=center><label for=$n>Sort by ".($n+1)."</label>";
         echo "<input type=radio name=sort value=$n id=$n ".($cc[0]=="$n"?"checked":"").">";
         echo "<br><select class=setup name=names[] size=".(count($cn_name)+1).">";
         echo "<option value=''>--hidden--";
         foreach ($cn_name as $kk=>$vv) 
            echo "<option value='$kk'".($n<strlen($cn) && $cn[$n]==$kk?" selected":"").">$vv";
         echo "</select>";
      }
      echo "</tr>";
   }
   echo "</table><P>";

   echo "<b><u>".mm("Date/time format")."</u></b>: <input type=text name=datetime value=\"$cp[2]\"><br>
   d - day, m - month, y - year2, Y - year4, H - hour, m - minute, s - second<P>";

   echo "<b><u>".mm("Panel font & size")."</u></b>: 
   <input type=text name=fontname value=\"$cp[3]\" size=12> 
   <input type=text name=fontsize value=\"$cp[4]\" size=2>pt<P>";

   echo "<P><center><input type=submit value='&nbsp; &nbsp; S &nbsp; U &nbsp; B &nbsp; M &nbsp; I &nbsp; T &nbsp; &nbsp;'></center></form>";

   
   echo "<hr size=1 noshade>";
   break;



// view
case "v":


   if (!isset($fnot)) $fnot=0;
   if (!isset($ftype)) $ftype=0;
   
   if ($fnot==0) {
      echo $GLOBALS['html'];
      up($d,$f);
      echo "<a href=$self?&c=l&d=".urlencode($d)."><nobr>&lt;&lt;&lt;<b>".mm("back to directory")."</b> &gt;&gt;&gt;</nobr></a>";
      up_link($d,$f);
      echo "<hr size=1 noshade>";
   }      
   if (!realpath($d.$f) || !file_exists($d.$f)) exit("".mm("file not found")."");
   if (!is_file($d.$f) || !$fi=@fopen($d.$f,"rb")) exit("<p><font color=red><b>".mm("access denied")."</b></font>");

   if ($ftype==0 || $ftype==4) {
      $buf=fread($fi,max(filesize($d.$f),$maxsize_fread));
      fclose($fi);
   }


   switch ($ftype) {

   case 0: 
      echo "<pre>".htmlspecialchars($buf)."</pre>";
      break;

   case 1: 
      readfile($d.$f); 
      break;

   case 2: 
      header("Content-type: image/gif"); 
      readfile($d.$f); 
      break;

   case 3: // download

      if (isset($fatt) && strlen($fatt)>0) {
          $attach=$fatt; 
          header("Content-type: text/plain"); 
      } 
      else {
          $attach=$f;
          header("Content-type: phpspbru"); 
      }
      header("Content-disposition: attachment; filename=\"$attach\";"); 
      readfile($d.$f); 
      break;

   case 4: // session
   
      echo "<xmp>";
      if (substr($f,0,5)=="sess_" && preg_match("!^sess_([a-z0-9]{32})$!i",$f,$ok)) {
         ini_set("session.save_path",$d);
         session_id($ok[1]);
         session_start();
         print_r($_SESSION);
      }
      else {
         print_r(unserialize($buf));
      }
      echo "</xmp>";//<hr size=1 noshade><xmp>";
      break;

   }

   break;







case "i": // information for FILE

   echo $GLOBALS['html'];
   up($d,$f);
   echo "<a href=$self?&c=l&d=".urlencode($d)."><nobr>&lt;&lt;&lt;<b>".mm("back to directory")."</b> &gt;&gt;&gt;</nobr></a>";
   up_link($d,$f);

   if (!realpath($d.$f) || !file_exists($d.$f)) exit(mm("file not found"));

   echo "<P><big><b><tt>".htmlspecialchars($d.$f)."</tt></b></big><P>";
   echo "<table class=tab border=0 cellspacing=1 cellpadding=2>";
   echo "<tr class=tr><td>".mm("Size")."        </td><td> ".filesize($d.$f)."</td></tR>";
   echo "<tr class=tr><td>".mm("Owner")."/".mm("Group")." </td><td> ";      
   $tmp=@_posix_getpwuid(fileowner($d.$f));
   if (!isset($tmp['name']) || $tmp['name']=="") echo fileowner($d.$f)." ";
   else echo $tmp['name']." ";
   $tmp=@_posix_getgrgid(filegroup($d.$f));
   if (!isset($tmp['name']) || $tmp['name']=="") echo filegroup($d.$f);
   else echo $tmp['name'];
   echo "<tr class=tr><td>".mm("FileType")."    </td><td> ".filetype($d.$f)."</td></tr>";
   echo "<tr class=tr><td>".mm("Perms")."       </td><td> ".display_perms(fileperms($d.$f))."</td></tr>";
   echo "<tr class=tr><td>".mm("Create time")." </td><td> ".date("d/m/Y H:i:s",filectime($d.$f))."</td></tr>";
   echo "<tr class=tr><td>".mm("Access time")." </td><td> ".date("d/m/Y H:i:s",fileatime($d.$f))."</td></tr>";
   echo "<tr class=tr><td>".mm("MODIFY time")." </td><td> ".date("d/m/Y H:i:s",filemtime($d.$f))."</td></tr>";
   echo "</table><P>";

   $fi=@fopen($d.$f,"rb");
   if ($fi) {
      $str=fread($fi,$hexdump_lines*$hexdump_rows);
      echo "<b>".mm("HEXDUMP PREVIEW")."</b>";
      $n=0;
      $a0="00000000<br>";
      $a1="";
      $a2="";
      for ($i=0; $i<strlen($str); $i++) {
         $a1.=sprintf("%02X",ord($str[$i])).' ';
         switch (ord($str[$i])) {
            case 0:  $a2.="<font class=s2>0</font>"; break;
            case 32: 
            case 10:
            case 13: $a2.="&nbsp;"; break;
            default:  $a2.=htmlspecialchars($str[$i]);
         }
         $n++;
         if ($n==$hexdump_rows) {
            $n=0;
            if ($i+1<strlen($str)) $a0.=sprintf("%08X",$i+1)."<br>";
            $a1.="<br>";
            $a2.="<br>";
         }
      }
      //if ($a1!="") $a0.=sprintf("%08X",$i)."<br>";
      echo "<table border=0 bgcolor=#cccccc cellspacing=1 cellpadding=4 ".
         "class=sy><tr><td bgcolor=#e0e0e0>$a0</td><td bgcolor=white>".
         "$a1</td><td bgcolor=white>$a2</td></tr></table><p>";
   }
   
   echo "<b>Base64: </b>
   <nobr>[<a href=$self?c=base64&c2=0&d=".urlencode($d)."&f=".urlencode($f).">Encode</a>]&nbsp;</nobr>
   <nobr>[<a href=$self?c=base64&c2=1&d=".urlencode($d)."&f=".urlencode($f).">+chunk</a>]&nbsp;</nobr>
   <nobr>[<a href=$self?c=base64&c2=2&d=".urlencode($d)."&f=".urlencode($f).">+chunk+quotes</a>]&nbsp;</nobr>
   <nobr>[<a href=$self?c=base64&c2=3&d=".urlencode($d)."&f=".urlencode($f).">Decode</a>]&nbsp;</nobr>
   <P>";


   if (!$write_access) exitw();

   $msg="";
   if (!is_file($d.$f) || !$fi=@fopen($d.$f,"r+")) $msg=" (<font color=red><b>".mm("ONLY READ ACCESS")."</b></font>)";
   else fclose($fi);
   if (!is_file($d.$f) || !$fi=@fopen($d.$f,"r")) $msg=" (<font color=red><b>".mm("Can't READ file - access denied")."</b></font>)";
   else fclose($fi);
   if ($msg=="") $msg=" (".mm("full read/write access").")";

   echo "<b>".mm("FILE SYSTEM COMMANDS")."$msg</b><p>";

   echo "
<table border=0 cellspacing=0 cellpadding=0><tr>

<td bgcolor=#cccccc><a href=$self?c=e&d=".urlencode($d)."&f=".urlencode($f).
"><b>&nbsp;&nbsp;".mm("EDIT")."&nbsp;&nbsp;<br>&nbsp;&nbsp;".mm("FILE")."&nbsp;&nbsp;</b></a></td>
<td>&nbsp;&nbsp;&nbsp;</td>

<td><form action=$self method=post>
<input type=hidden name=c value=delete>
<input type=hidden name=c2 value=delete>
<input type=hidden name=d value=\"".htmlspecialchars($d)."\">
<input type=hidden name=f value=\"".htmlspecialchars($f)."\">
<input type=submit value='".mm("DELETE")."'><small>&gt;</small><input type=checkbox name=confirm value=delete></nobr><br>
<small>".mm("Delete this file")."</small>
</td><td></form></td><td>&nbsp;&nbsp;&nbsp;</td>

<td><form action=$self method=post>
<input type=hidden name=c value=delete>
<input type=hidden name=c2 value=clean>
<input type=hidden name=d value=\"".htmlspecialchars($d)."\">
<input type=hidden name=f value=\"".htmlspecialchars($f)."\">
<input type=submit value='".mm("CLEAN")."'><small>&gt;</small><input type=checkbox name=confirm value=touch></nobr><br>
<small>".mm("filesize to 0byte")."</small>
</td><td></form></td><td>&nbsp;&nbsp;&nbsp;</td>

<td><form action=$self method=post>
<input type=hidden name=c value=delete>
<input type=hidden name=c2 value=touch>
<input type=hidden name=d value=\"".htmlspecialchars($d)."\">
<input type=hidden name=f value=\"".htmlspecialchars($f)."\">
<input type=submit value='".mm("TOUCH")."'><small>&gt;</small><input type=checkbox name=confirm value=touch></nobr><br>
<small>".mm("Set current 'mtime'")."</small>
</td><td></form></td><td>&nbsp;&nbsp;&nbsp;</td>

<td><form action=$self method=post>
<input type=hidden name=c value=delete>
<input type=hidden name=c2 value=wipe>
<input type=hidden name=d value=\"".htmlspecialchars($d)."\">
<input type=hidden name=f value=\"".htmlspecialchars($f)."\">
<input type=submit value='".mm("WIPE(delete)")."'><small>&gt;</small><input type=checkbox name=confirm value=delete></nobr><br>
<small>".mm("Write '0000..' and delete")."</small>
</td><td></form></td><td>&nbsp;&nbsp;&nbsp;</td>
</tr></table>
";

   echo "<form action=$self method=post><input type=hidden name=c value=copy>".
        "<b>".mm("COPY FILE")."</b> ".mm("from")." <input type=text size=40 name=from value=\"".htmlspecialchars($d.$f)."\">".
        " ".mm("to")." <input type=text name=to size=40 value=\"".htmlspecialchars($d.$f)."\">".
        "<nobr><input type=submit value='".mm("COPY")."!'>".
        "&gt;<input type=checkbox name=confirm value=copy></nobr></form>";

echo "
<form action=$self method=post>
<b>".mm("MAKE DIR")."</b> (".mm("type full path").")
<input type=hidden name=c value=newdir_submit>
<input type=text size=60 name=df value=\"".htmlspecialchars($d)."\">
<input type=submit value='".mm("MkDir")."'>
</form>";


echo "
<form action=$self method=post>
<b>".mm("CREATE NEW FILE or override old file")."</b><br>
<input type=hidden name=c value=newfile_submit>
".mm("Full file name")." <input type=text size=50 name=df value=\"".htmlspecialchars($d.$f)."\">
<input type=submit value='".mm("CREATE/OVERRIDE")."'>
<input type=checkbox name=confirm value=1 id=conf1><label for=conf1>&lt;=confirm</label><br>
<textarea name=text cols=70 rows=10 style='width: 100%;'></textarea><br>
</form>";

echo "
<form enctype='multipart/form-data' action='$self' method=post>
<input type=hidden name=c value=fileupload_submit>
<b>FILE UPLOAD: ".mm("CREATE NEW FILE or override old file")."</b><br>
<input type=hidden name='MAX_FILE_SIZE' value=999000000>
1. ".mm("select file on your local computer").": <input name=userfile type=file><br>
2. ".mm("save this file on path").": 
  <input name=df size=50 value=\"$d$f\"><br>
3. <input type=checkbox name=df2 value=1 id=df2 checked>
  <label for=df2>".mm("create file name automatic")."</label>
  &nbsp;&nbsp;".mm("OR")."&nbsp;&nbsp;
  ".mm("type any file name").":
  <input name=df3 size=20><br>
4. <input type=checkbox name=df4 value=1 id=df4>
  <label for=df4>".mm("convert file name to lovercase")."</label><br>
<input type=submit value='".mm("Send File")."'>
</form>";

break;


case "base64":

   echo "<pre>\n";
   $ff=fopen($d.$f,"rb") or exit("<p>access denied");
   $text=fread($ff,max(filesize($d.$f),$maxsize_fread));
   fclose($ff);
   switch ($c2) {
      case 0:
         echo base64_encode($text);
         break;
      case 1:
         echo chunk_split(base64_encode($text));
         break;
      case 2:
         $text=base64_encode($text);
         echo substr(preg_replace("!.{1,76}!","'\\0'.\n",$text),0,-2);
         break;
      case 3:
         echo base64_decode($text);
         break;
   }
   break;



case "d": // information for DIRECTORY

   echo $GLOBALS['html'];
   up($d,"","Directory");
   echo "<a href=$self?&c=l&d=".urlencode($d)."><nobr>&lt;&lt;&lt;<b>".mm("back to directory")."</b> &gt;&gt;&gt;</nobr></a>";
   echo "<p>";

   //up_link($d,"");

   if (!realpath($d) || !is_dir($d.$f)) exit(mm("dir not found"));

   echo "<table border=0 cellspacing=0 cellpadding=0><tr><td>";

   echo "<table border=0 cellspacing=1 cellpadding=1 class=tab>";
   echo "<tr class=tr><td>&nbsp;&nbsp;&nbsp;".mm("Owner")."/".mm("Group")."&nbsp;&nbsp;&nbsp;</td><td>";      
   $tmp=@_posix_getpwuid(fileowner($d.$f));
   if (!isset($tmp['name']) || $tmp['name']=="") echo fileowner($d.$f)." ";
   else echo $tmp['name']." ";
   $tmp=@_posix_getgrgid(filegroup($d.$f));
   if (!isset($tmp['name']) || $tmp['name']=="") echo filegroup($d.$f);
   else echo $tmp['name'];
   echo "</td></tr><tr class=tr><td>";
   echo mm("Perms")."</td><td>".display_perms(fileperms($d.$f))."</td></tr><tr class=tr><td>";
   echo mm("Create time")."</td><td>".date("d/m/Y H:i:s",filectime($d.$f))."</td></tr><tr class=tr><td>";
   echo mm("Access time")."</td><td>".date("d/m/Y H:i:s",fileatime($d.$f))."</td></tr><tr class=tr><td>";
   echo mm("MODIFY time")."</td><td>".date("d/m/Y H:i:s",filemtime($d.$f))."</td></tr></table>";

   echo "</tD><form action=$self method=get><td width=70>&nbsp;</td><td>
   <input type=hidden name=c value=\"tree\">
   Root <input type=text name=d value=\"$d\"><br>
   <input type=checkbox name=showfile value=1 id=tree1><label for=tree1>Show files in tree</label><br>
   <input type=checkbox name=showsize value=1 id=tree2 checked><label for=tree2>Show dir/files size</label><br>
   <input type=submit value='Show TREE directory'>";

   echo "</td></form></tr></table><P>";


   
   if (!$write_access) exitw();

   echo "<b>".mm("FILE SYSTEM COMMANDS")."</b><p>";

   echo "
<table border=0 cellspacing=0 cellpadding=0><tr>

<td><form action=$self method=post>
<input type=hidden name=c value=dirdelete>
<input type=hidden name=c2 value=files>
<input type=hidden name=d value=\"".htmlspecialchars($d)."\">
<input type=hidden name=ref value=\"$url\">
<input type=submit value='".mm("Delete all files in dir")." (rm *)'><small>&gt;</small><input type=checkbox name=confirm value=delete></nobr>
</td><td></form></td><td>&nbsp;&nbsp;&nbsp;</td>

<td><form action=$self method=post>
<input type=hidden name=c value=dirdelete>
<input type=hidden name=c2 value=dir>
<input type=hidden name=d value=\"".htmlspecialchars($d)."\">
<input type=hidden name=ref value=\"$url\">
<input type=submit value='".mm("Delete all dir/files recursive")." (rm -fr)'><small>&gt;</small><input type=checkbox name=confirm value=delete></nobr>
</td><td></form></td><td>&nbsp;&nbsp;&nbsp;</td>

</tr></table>
";

echo "
<form action=$self method=post>
<b>".mm("MAKE DIR")."</b> (type full path)
<input type=hidden name=c value=newdir_submit>
<input type=text size=60 name=df value=\"".htmlspecialchars($d)."\">
<input type=submit value='".mm("MkDir")."'>
</form>";


echo "
<form action=$self method=post>
<b>".mm("CREATE NEW FILE or override old file")."</b><br>
<input type=hidden name=c value=newfile_submit>
".mm("Full file name")." <input type=text size=50 name=df value=\"".htmlspecialchars($d)."\">
<input type=submit value='".mm("CREATE/OVERRIDE")."'>
<input type=checkbox name=confirm value=1 id=conf1><label for=conf1>&lt;=confirm</label><br>
<textarea name=text cols=70 rows=10 style='width: 100%;'></textarea><br>
</form>";

echo "
<form enctype='multipart/form-data' action='$self' method=post>
<input type=hidden name=c value=fileupload_submit>
<b>(FILE UPLOAD) ".mm("CREATE NEW FILE or override old file")."</b><br>
<input type=hidden name='MAX_FILE_SIZE' value=999000000>
1. ".mm("select file on your local computer").": <input name=userfile type=file><br>
2. ".mm("save this file on path").": 
  <input name=df size=50 value=\"".realpath($d)."/\"><br>
3. <input type=checkbox name=df2 value=1 id=df2 checked>
  <label for=df2>".mm("create file name automatic")."</label>
  &nbsp;&nbsp;".mm("OR")."&nbsp;&nbsp;
  ".mm("type any file name").":
  <input name=df3 size=20><br>
4. <input type=checkbox name=df4 value=1 id=df4>
  <label for=df4>".mm("convert file name to lovercase")."</label><br>
<input type=submit value='".mm("Send File")."'>
</form>";


break;



case "tree":

$tcolors=array(
'eee','ddd','ccc','bbb','aaa','999','888','988','a88','b88','c88','d88','e88','d98',
'ca8','bb8','ac8','9d8','8e8','8d9','8ca','8bb','8ac','89d','88e');

function dir_tree($df,$level=0) {
   global $tcolors,$self;

   $df=str_replace("//","/",$df);
   $dirs=array();
   $files=array();
   if ($dir=opendir($df)) {
      while (($file=readdir($dir))!==false) {
         if ($file=="." || $file=="..") continue;
         if (is_dir("$df/$file"))  {
            $dirs[]=$file;
         }
         else {
            $files[]=$file;
         }
      }
   }
   closedir($dir);

   sort($dirs);
   sort($files);
   
   $i=min($level,count($tcolors)-1);
   $c=$tcolors[$i][0].$tcolors[$i][0].$tcolors[$i][1].$tcolors[$i][1].$tcolors[$i][2].$tcolors[$i][2];

   echo "\r\n\r\n\r\n
   <table width=100% border=0 cellspacing=2 cellpadding=1><tr><td bgcolor=#000000>
   <table width=100% border=0 cellspacing=0 cellpadding=1 bgcolor=#$c>
   <tr><td colspan=3 class=dir>".
   "<a href=$self?c=l&d=".urlencode($df)." class=dir><img src=$self?name=dir&c=img&1 border=0>".
   $df."</a></td></tr>";

   if (count($dirs) || count($files)) {
      echo "<tr><td width=15>&nbsp;</td><td class=all width=97%>";
      for ($i=0; $i<count($files); $i++) {
         echo $files[$i]." ";
      }
      for ($i=0; $i<count($dirs); $i++) {
         dir_tree($df."/".$dirs[$i],$level+1);
      }
      echo "</td><td width=10>&nbsp;</td></tr>";
   }
   echo '</table></td></tr></table>';
}

   echo "
   <STYLE>
   .all {
   font-family: Verdana;
   font-size: 80%;
   }
   .dir {
   font-family: Verdana;
   font-size: 95%;
   background: #666699;
   font-weight: bold;
   color: white
   }
   </STYLE>";
   echo $GLOBALS['html'];

   up($d,"","Directory");
   echo "<a href=$self?&c=l&d=".urlencode($d)."><nobr>&lt;&lt;&lt;<b>".mm("back to directory")."</b> &gt;&gt;&gt;</nobr></a>";
   echo "<p>";
   dir_tree($d);
   break;



case "delete":

   if (!$write_access) exitw();

   if (!isset($c2)) exit("err# delete 1");
   if (!isset($confirm) || strlen($confirm)<3) exit("".mm("Confirm not found (go back and set checkbox)")."");
   echo "<a href=$self?&c=l&d=".urlencode($d)."><nobr>&lt;&lt;&lt;<b>".mm("back to directory")."</b> &gt;&gt;&gt;</nobr></a><p>";
   if (!isset($d) || !isset($f) || !@file_exists($d.$f) || !@realpath($d.$f)) 
      exit("".mm("Delete cancel - File not found")."");
   if (realpath(getenv("SCRIPT_FILENAME"))==$d.$f && !isset($delete_remview_confirm))
      exit(mm("Do you want delete this script (phpRemoteView) ???")."<br><br><br><br>
      <a href='$self?c=delete&c2=$c2&confirm=delete&d=".urlencode($d)."&f=".urlencode($f)."&delete_remview_confirm=YES'>[".mm("YES").", ".mm("DELETE")." <b>".mm("ME")."</b>]</a>
       &nbsp; &nbsp; &nbsp;
      <a href='javascript:history.back(-1)'>[".mm("NO (back)")."]</a>");

   switch ($c2) {
   case "delete":
       //exit("$d $f");
       ob();
       if (!unlink($d.$f)) 
          obb().exit("<font color=red><b>".mm("Delete cancel")." - ".mm("ACCESS DENIED")."</b></font>$obb"); 
       Header("Location: $self?c=l&d=".urlencode($d));
       echo "<P><a href=$self?c=l&d=".urlencode($d).">".mm("done (go back)")."!</a><p>";
       echo "".mm("Delete ok")."";
       break;
   case "touch":
       ob();
       if (!touch($d.$f)) 
          obb().exit("<font color=red><b>".mm("Touch cancel")." - ".mm("ACCESS DENIED")."</b></font>$obb"); 
       Header("Location: $self?c=i&d=".urlencode($d)."&f=".urlencode($f));
       echo "<a href=$self?c=i&d=".urlencode($d)."&f=".urlencode($f).">".mm("done (go back)")."!</a><p>";
       echo "".mm("Touch ok (set current time to 'modify time')")."";
       break;
   case "clean":
       ob();
       $fi=fopen($d.$f,"w+") or 
          obb().exit("<font color=red><b>".mm("Clean (empty file) cancel")." - ".mm("ACCESS DENIED")."</b></font>obb"); 
       ftruncate($fi,0);
       fclose($fi);
       Header("Location: $self?c=i&d=".urlencode($d)."&f=".urlencode($f));
       echo "<a href=$self?c=i&d=".urlencode($d)."&f=".urlencode($f).">".mm("done (go back)")."!</a><p>";
       echo "".mm("Clean ok (file now empty)")."";
       break;
   case "wipe":
       $size=filesize($d.$f);
       ob();
       $fi=fopen($d.$f,"w+") or 
          obb().exit("<font color=red><b>".mm("Wipe cancel - access denied")."</b></font>$obb");
       $str=md5("phpspbru".mt_rand(0,999999999).time());
       for ($i=0; $i<5; $i++) $str.=$str; // strlen 1024 byte
       for ($i=0; $i<intval($size/1024)+1; $i++) fwrite($fi,$str);
       fclose($fi);
       ob();
       if (!unlink($d.$f)) 
          obb().exit("err# delete 2 - file was rewrite, but not delete...(only write access, delete disable)$obb"); 
       Header("Location: $self?c=l&d=".urlencode($d));
       echo "<a href=$self?c=i&d=".urlencode($d).">".mm("done (go back)")."!</a><p>";
       echo "".mm("Wipe ok (file deleted)")."";
       break;
   }

   //Header("Location: $self?c=l&d=".urlencode(dirname($df)));
   //echo "<a href=$self?c=i&d=".urlencode(dirname($df)).">SAVE NEW FILE DONE (go back)!</a>";

   break;


case "dirdelete":

   if (!$write_access) exitw();

function dir_delete($df) {
   echo "<b>".basename($df)."</b><ul>";
   if ($dir=opendir($df)) {
      $i=0;
      while (($file=readdir($dir))!==false) {
         if ($file=="." || $file=="..") continue;
         if (is_dir("$df/$file"))  {
            dir_delete($df."/".$file);
         } 
         else {
            echo "$file<br>";
            echo "".mm("DELETE")." <tt>$df/$file</tt> ...<br>";
            unlink($df."/".$file);
         }
         $i++;
      }
      //if ($i==0) echo "-empty-<br>";
   }
   closedir($dir);
   echo "</ul>";
   echo "".mm("DELETE")." ".mm("DIR")." <tt>$df</tt> ...<br>";
   rmdir("$df/$file");
}

   if (!isset($c2)) exit("error dirdelete 1");
   if (!isset($confirm)) exit("".mm("Confirm not found (go back and set checkbox)")."!");
   $df="$d";

   switch ($c2) {

      case "files":
         echo "<h3>".mm("Deleting all files in")." <tt>$df</tt> ..</h3>";
         if ($dir=opendir($df)) {
            while (($file=readdir($dir))!==false) {
                if ($file=="." || $file=="..") continue;
                if (is_dir($df.$file))  {
                   echo "<big><tt><b>>$file</b></tt></big> ".mm("skip").": ".filetype($df.$file)."<br>";
                }
                elseif (is_file($df.$file)) {
                   echo "<big><tt><b><font color=red>$file</font></b></tt></big> ".mm("deleting")."...";
                   unlink($df.$file);
                   echo "<br>";
                }
                else {
                   echo "<big><tt><b>$file</b></tt></big> ".mm("skip").": ".filetype($df.$file)."<br>";
                }
            }  
         }
         closedir($dir);
         $ref="$self?c=l&d=".urlencode($d);
         break;
   
      case "dir":
         echo "<h3>".mm("Deleting all dir/files (recursive) in")." <tt>$df</tt> ...</h3>";
         dir_delete($df);
         $ref="$self?c=l&d=".urlencode(realpath($d."/.."));
         break;
   }
   //header("Location: $ref");
   echo "<p><a href=$ref>".mm("DONE, go back")."</a>";
   break;

case "copy": 

   if (!$write_access) exitw();

   if (!isset($from) || !@file_exists($from) || !@realpath($from))
      exit("err# copy 1, file [$from] not found");
   if (!isset($to) || strlen($to)==0)
      exit("err# copy 2, file [$to] not found");
   echo "Copy: ....<hr size=1 noshade>";
   if (!copy($from,$to)) { 
      echo "<hr size=1 noshade><font color=red><b>Error!</b></font><p>";
      echo "View <a href=$self?c=l&d=".urlencode(dirname($from)).">".dirname($from)."<p>";
   }
   else
      echo "".mm("DONE")."!<p>";
      echo "View <a href=$self?c=l&d=".urlencode(dirname($from)).">".dirname($from)."</a> (dir 'from')<p>";
      echo "View <a href=$self?c=l&d=".urlencode(dirname($to)).">".dirname($to)."</a> (dir 'to')<p>";
   break;




case "e": // edit

   if (!$write_access) exitw();

   if (!@realpath($d.$f) || !file_exists($d.$f)) exit("".mm("file not found")."");
   echo $GLOBALS['html'];
   up($d,$f);
   echo "<a href=$self?&c=l&d=".urlencode($d)."><nobr>&lt;&lt;&lt;<b>".mm("back to directory")."</b> &gt;&gt;&gt;</nobr></a>";
   up_link($d,$f);
   $msg="";
   if (!is_file($d.$f) || !$fi=@fopen($d.$f,"r+")) $msg=" (<font color=red><b>".mm("ONLY READ ACCESS (don't edit!)")."</b></font>)";
   else fclose($fi);
   if (!is_file($d.$f) || !$fi=@fopen($d.$f,"r")) $msg=" (<font color=red><b>".mm("Can't READ file - access denied (don't edit!)")."</b></font>)";
   else fclose($fi);
   if ($msg=="") $msg="(<font color=#009900><b>".mm("full read/write access")."</b></font>)";
   echo "<p><b>".mm("EDIT FILE")."</b> $msg<p>";

   if (!$fi=@fopen($d.$f,"rb")) exit("".mm("can't open, access denied")."");
   echo "<form action=$self method=post>
   <input type=hidden name=c value=e_submit>
   <input type=hidden name=d value=\"".htmlspecialchars($d)."\">
   <input type=hidden name=f value=\"".htmlspecialchars($f)."\">
   <textarea name=text cols=70 rows=20 style='width: 100%;'>".
   htmlspecialchars(fread($fi,filesize($d.$f)))."</textarea><p>
   <input type=submit value=' ".mm("SAVE FILE (write to disk)")." '>
   <input type=checkbox name=confirm value=1 id=conf> 
   <label for=conf><font color=red><b><= confirm</b></font></label>
   </form>";

   break;


case "e_submit":

   if (!$write_access) exitw();

   if (!realpath($d.$f) || !file_exists($d.$f)) exit("file not found");
   if (!isset($text)) exit("err# e_submit 1");
   if (!isset($confirm)) exit("Confirm not found (go back and set checkbox)");
   if (!$fi=@fopen($d.$f,"w+")) exit("access denied");
   fwrite($fi,$text);
   fclose($fi);
   Header("Location: $self?c=i&d=".urlencode($d)."&f=".urlencode($f));
   echo "<a href=$self?c=i&d=".urlencode($d)."&f=".urlencode($f).">SAVE DONE (go back)!</a>";

   break;



case "newfile_submit":

   if (!$write_access) exitw();

   if (!isset($text) || !isset($df)) exit("err# newfile_submit 1");
   if (!isset($confirm)) exit("Confirm not found (go back and set checkbox)");
   if (!$fi=@fopen($df,"w+")) exit("access denied, can't create/open [$df]");
   fwrite($fi,$text);
   fclose($fi);
   Header("Location: $self?c=l&d=".urlencode(dirname($df)));
   echo "<a href=$self?c=i&d=".urlencode(dirname($df)).">SAVE NEW FILE DONE (go back)!</a>";
   break;


case "fileupload_submit":

   if (!$write_access) exitw();
   if (!isset($df)) exit("err# newfile_submit 1");
   if (!isset($df3)) exit("err# newfile_submit 2");

   $fname="";
   if (isset($df2)) { 
      if (!preg_match("~([^/]+)$~",$_FILES['userfile']['name'],$ok)) {
         exit("Upload failed: can't detect file name");
      }
      $fname=$ok[1];
   }
   else {
      $fname=$df3;
   }
   if ($fname=="") 
     exit("".mm("You mast checked 'create file name automatic' OR typed file name!").""); 
   if (isset($df4)) $fname=strtolower($fname);

   echo "Temp file: ".$_FILES['userfile']['tmp_name']."<br>";
   echo "Origin file name: ".$_FILES['userfile']['name']."<br>";
   echo "File size: ".$_FILES['userfile']['size']."<br>";
   if ($df[strlen($df)-1]!="/") $df.="/";
   echo "".mm("SAVING TO").": <font color=blue>$df</font><font color=red><b>$fname</b></font><p>";

   ob();
   $ok=copy($_FILES['userfile']['tmp_name'],"$df$fname");
   obb();
   if (!$ok) exit("<font color=red><b>".mm("Sorry, access denied")."</b></font> $obb");

   if (!isset($ref)) $ref="$self?c=l&d=".urlencode($df);
   Header("Location: $ref");
   echo "<a href='$ref'>NEW FILE SAVED</a>";
  
   break;


case "newdir_submit": 

   if (!$write_access) exitw();
   if (!isset($df)) exit("err# newdir_submit 1");
   ob();
   if (!mkdir($df,$mkdir_mode)) {
      obb();
      exit("Access denied $obb");
   }
   obb();
   if (!isset($ref)) $ref="$self?c=l&d=".urlencode($df);
   Header("Location: $ref");
   echo "<a href='$ref'>Go to new directory!</a>";

   break;


case "t": 

   echo "<h3>
   <a href='$self'>START PAGE</a> |
   <a href='$self?c=t'>Eval/Shell</a> | 
   <a href='$self?c=codes'>Character map</a>
   </h3>";


   if (!$write_access) exitw();
   error_reporting(2038);

   if (!isset($php)) {
      $php="/* line 1 */\n\n// ".mm("for example, uncomment next line").":\nphpinfo();\n\n//readfile(\"/etc/passwd\");\n\n/* line 8 */";
      $skipphp=1;
      $pre='checked';
      $nlbr='';
      $xmp='';
      $htmls='checked';
   } 

   echo "<b>".mm("Eval PHP code")."</b> (".mm("don't type")." \"&lt;?\" ".mm("and")." \"?&gt;\")
<form action=$self method=post>
<input type=hidden name=c value=t>
<textarea name=php rows=".(!isset($skipphp)?10:4)." cols=60 style='width:100%;'>$php</textarea>
<input type=checkbox name=pre value='checked' $pre id='pre'>
   <label for='pre'> add &lt;pre&gt;</label> &nbsp;
<input type=checkbox name=xmp value='checked' $xmp id='xmp'>
   <label for='xmp'> add &lt;xmp&gt;</label> &nbsp;
<input type=checkbox name=htmls value='checked' $htmls id='htmls'>
   <label for='htmls'> add htmlspecialchars()</label> &nbsp;
<input type=checkbox name=nlbr value='checked' $nlbr id='nlbr'>
   <label for='nlbr'> add nl2br()</label><br>
<input type=submit></form>
<P>";

   if (!isset($shell)) $skipshell=1;

   if (!isset($skipphp)) {
      echo "<hr size=1 noshade>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
      if ($pre<>'') echo "<pre>";
      if ($xmp<>'') echo "<xmp>";
      if ($nlbr<>'' || $htmls<>'') {
         ob_start();
      }
      if ($phpeval_access) eval($php);
      else die("Sorry, function eval() disabled.");
      if ($nlbr<>'' || $htmls<>'') {
         $tmp=ob_get_contents();
         ob_end_clean(); 
         if ($htmls<>'') $tmp=htmlspecialchars($tmp);
         if ($nlbr<>'') $tmp=nl2br($tmp);
         echo $tmp;
      }
      if ($xmp<>'') echo "</xmp>";
      if ($pre<>'') echo "</pre>";
      echo "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
      echo "</table></table></table></table></table></table></table></table></table></center></table><hr size=1 noshade>";
   }

   if (!isset($shell)) {
      $shell="#".mm("example (remove comments '#')").": \n\n#cat /etc/passwd;\n\n#ps -ax\n\n#uname -a";
      $skipshell=1;
   }
   echo "<P><b>".mm("Shell commands")."</b>
<form action=$self method=post>
<input type=hidden name=c value=t>
<textarea name=shell rows=".(!isset($skipshell)?10:4)." cols=60 style='width:100%;'>$shell</textarea><br>
<input type=submit></form>
<P>";
   if (!isset($skipshell)) {
      echo "<hr size=1 noshade>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n<xmp>";
      if ($system_access) system($shell);
      else die("Sorry, function system() disabled.");
      echo "</xmp>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n
      </table></table></table></table></table></table></table></table></table></center><hr size=1 noshade>";
   }


  $ttype=array(1=>"MD5",7=>"Decode MD5 (password crack)<br>",
  2=>"Base64",3=>"Base64 + chunk",4=>"Base64 + chunk + quotes",
  5=>"Decode Base64<br>",
  6=>"UnixTime=>Date(".time().")",
  8=>"MKtime: YYYY MM DD [hh [mm [ss]]]<br>",
  9=>"Translit=&gt;RusText", 14=>"RusText=&gt;Translit<br>",
  10=>"cp1251=&gt;koi8r",11=>"koi8r=&gt;cp1251",12=>"cp1251=&gt;mac",13=>"mac=&gt;cp1251",
  15=>"koi8r=&gt;mac",16=>"mac=&gt;koi8r",
  );
  echo "<P><b>".mm("Universal convert")."</b>";

  echo "<a name=convert></a><form action='$self#convert' method=post>";
  foreach ($ttype as $k=>$v) 
     echo "&nbsp;&nbsp;<nobr><input ".($k==$name?"checked":"")." type=radio name=name value=$k id=x$k><label for=x$k>$v</label></nobr> ";

  echo "
<input type=hidden name=c value=t>
<textarea name=convert rows=".(isset($convert)?10:3)." cols=60 style='width:100%;'>".htmlspecialchars($convert)."</textarea><br>
<input type=submit><br>";

   
   $russtr1="JCUKENGZH_FYVAPROLDESMIT_Bjcukengzh_fyvaproldesmit_b";
   $russtr2="ЙЦУКЕНГЗХЪФЫВАПРОЛДЭСМИТЬБйцукенгзхъфывапролдэсмитьб";
   function from_translit($ss) {
      global $russtr1,$russtr2;
      $w=array("Sch",'Щ',"SCH",'Щ',"ScH",'Щ',"SCh",'Щ',"sch",'щ',"Jo",'Ё',"JO",'Ё',"jo",'ё',
      "Zh",'Ж',"ZH",'Ж',"zh",'ж',"Ch",'Ч',"CH",'Ч',"ch",'ч',"Sh",'Ш',"SH",'Ш',"sh",'ш',
      "##",'Ъ',"''",'Ь',"Eh",'Э',"EH",'Э',"eh",'э',"Ju",'Ю',"JU",'Ю',"ju",'ю',"Yu",'Ю',
      "YU",'Ю',"yu",'ю',"YA","Я","Ya","Я","ya","я","Ja",'Я',"JA",'Я',"ja",'я');
      $c=count($w);
      for ($i=0; $i<$c; $i+=2) $ss=str_replace($w[$i],$w[$i+1],$ss);
      $ss=strtr($ss,$russtr1,$russtr2);
      $ss=preg_replace("!([а-я]+)~([а-я]+)!is","\\1\\2",$ss);
      return $ss;
   }
   function to_translit($ss) {
      global $russtr1,$russtr2;
      $ss=strtr($ss,$russtr2,$russtr1);
      $ss=str_replace(
         array('Ш', 'Щ',  'Ж', 'Я', 'Ч', 'Ю', 'Ё', 'ш', 'щ',  'ж', 'я', 'ч', 'ю', 'ё', ),
         array('SH','SCH','ZH','YA','CH','YU','YO','sh','sch','zh','ya','ch','yu','yo',),
         $ss);
      return $ss;
   }
   
   if (isset($convert)) {
      if (!isset($name)) $name="0";
      $out="";
      switch ($name) {

         case 1: 
            $out=md5($convert);
            break;

         case 2:
            $out=base64_encode($convert);
            break;

         case 3:
            $out=chunk_split(base64_encode($convert));
            break;

         case 4:
            $out=base64_encode($convert);
            $out=substr(preg_replace("!.{1,76}!","'\\0'.\n",$out),0,-2);
            break;

         case 5:
            $out=base64_decode($convert);
            break;

         case 6:
            $convert=intval($convert);
            if ($convert==0) $convert=time();
            $out="Unixtime=$convert\n---Day/Month/Year--\n".
               date("d/m/Y H:i:s",$convert)."\n".
               date("d-m-Y H:i:s",$convert)."\n".
               date("d.m.Y H:i:s",$convert)."\n".
             "---Month/Day/Year--\n".
               date("m/d/Y H:i:s",$convert)."\n".
               date("m-d-Y H:i:s",$convert)."\n".
               date("m.d.Y H:i:s",$convert)."\n".
             "---------SQL-------\n".
               date("Y-m-d H:i:s",$convert)."\n".
               date("Y m d H i s",$convert)."\n".
               date("YmdHis",$convert);
            break;

         case 8:
            $c=explode(" ",trim(preg_replace("! +!"," ",$convert)));
            if (count($c)<3 || count($c)>6) $out="Bad value. Type: 2000 12 31 or 2000 12 31 12 59 59";
            else {
               if (empty($c[0])) $c[0]=1970;
               if ($c[0]<50) $c[0]=2000+$c[0];
               if ($c[0]>50 && $c[0]<100) $c[0]=1900+$c[0];
               if (empty($c[1])) $c[1]=1;
               if (empty($c[2])) $c[2]=1;
               if (empty($c[3])) $c[3]=0;
               if (empty($c[4])) $c[4]=0;
               if (empty($c[5])) $c[5]=0;
               $out="TIME: $c[0]-$c[1]-$c[2] $c[3]:$c[4]:$c[5]\nMKTIME: ".mktime($c[3],$c[4],$c[5],$c[1],$c[2],$c[0]);
            }
            break;

         case 9:
            $out=from_translit($convert);
            break;

         case 14:
            $out=to_translit($convert);
            break;

         case 10: $out=convert_cyr_string($convert,'w','k'); break;
         case 11: $out=convert_cyr_string($convert,'k','w'); break;
         case 12: $out=convert_cyr_string($convert,'w','m'); break;
         case 13: $out=convert_cyr_string($convert,'m','w'); break;
         case 15: $out=convert_cyr_string($convert,'k','m'); break;
         case 16: $out=convert_cyr_string($convert,'m','k'); break;

         case 7:
            echo "<script>top.location.href='$self?c=md5crack&text=$convert'</script>";
            break;

         case 0:
            $out="Please select anythink function in list. Example: type 'test' and select 'md5'. Then click 'Submit'.";
            break;

         default: 
            $out='Sorry, this function not work (try new versions)';
      }
      echo "<P><hr size=1 noshade>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n<pre><xmp>$out</xmp></pre>\n\n\n\n\n\n\n\n\n<hr size=1 noshade>";
   }
   
   break;


case "md5crack":

   echo "<form action=$self name=main><input type=hidden name=c value=md5crack>
   <h2>Decode MD5 (<a href=$self>home</a>|<a href=$self?c=t&name=1#convert>md5</a>)</h2><P>";

   if (!isset($go)) {
      if (!isset($fullqty)) $fullqty="";
      if (!isset($fulltime)) $fulltime="";
      if (!isset($php)) $php="";
      if (!isset($from)) $from="";
      echo "<b>STRING</b>: <input type=text name=text value='$text' size=40> (only 32 char: 0,1,2,3,4,5,6,7,8,9,a,b,c,d,e,f)";
      echo "<P><b>Range</b>: <input type=text name=php value=\"".htmlspecialchars($php)."\" size=90><br>";
      $chars=array(
      'a-z'=>"abcdefghijklmnopqrstuvwxyz",
      'a-z,A-Z'=>"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ",
      'a-z,0-9'=>"abcdefghijklmnopqrstuvwxyz0123456789",
      'a-z,A-Z,0-9'=>"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
      'a-z,A-Z,0-9,other'=>"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~`!@#\$%^&*()_+-=[]{};:,<.>/\"'\\");
      $i=0;
      foreach ($chars as $k=>$v) {
         echo "<script>str$i=\"".str_replace("\"","\\\"",str_replace("\\","\\\\",$v))."\"</script>
         <a href='' onclick=\"document.main.php.value=str$i;return false\">$k</a> &nbsp; ";
         $i++;
      }
      echo "<P>
      <b>Start from</b>: <input type=text size=70 name=from value='$from'><P>
      <input type=hidden name=go value=1>
      <input type=hidden name=fullqty value=$fullqty>
      <input type=hidden name=fulltime value=$fulltime>
      <input type=submit value='Start!'><form>";
   }
   else {

      function mdgetword() {
         global $php,$from,$word;
         $word="";
         for ($i=0; $i<count($from); $i++) $word.=$php[$from[$i]];
      }

      $fulltime=@intval($fulltime);
      $fullqty=@intval($fullqty);

      $text=strtolower($text);
      if (!preg_match("!^[0-9a-f]{32}$!",$text)) exit("md5 bad format: must be 32 bytes, range 0-9,a,b,c,d,e,f");
      if (!isset($php) || strlen($php)==0) $php="qwertyuiopasdfghjklzxcvbnm";
      if (!isset($from) || !preg_match("!^([0-9]+):(([0-9]+,)*[0-9]+)$!",$from,$ok)) {
         $pos=0;
         $from=0;
      }
      else {
         $pos=$ok[1];
         $from=$ok[2];
      }
      $from=explode(",",$from);
      if (!is_array($from) || !count($from) || count($from)==1 && $from[0]==0) { 
         $from=array(0);
         if (md5("")===$text) exit("** DONE **<br><br>md5('')=$text<br><br>(try empty string, 0 bytes!)");
      }
      $phplen=strlen($php);
      mdgetword();
      $poslen=strlen($word);
      if ($pos<0 || $pos>=$poslen) $pos=0;

      for ($i=0; $i<10; $i++) { echo "<!-- -->\r\n"; flush(); }

      echo "<h3><a href='$self?c=md5crack".
         "&from=".urlencode("$pos:".implode(",",$from)).
         "&text=".urlencode($text).
         "&php=".urlencode($php).
         "&fulltime=$fulltime&fullqty=$fullqty".
         "'>Save this link</a> - click for break and save current position</h3>";
      flush();

      echo "
      MD5_HASH=$text<br>
      CURRENT_WORD=$word<br>
      CURRENT_DIGIT=$pos:".implode(",",$from)."<br>
      RANGE=".htmlspecialchars($php)."<br>
      ProcessTime=$fulltime sec (".(floor($fulltime/60/60))."h)<br>
      Calculation(qty)={$fullqty}0000<p><font face=courier>";
      flush();


      $fullsum=pow($phplen,$poslen);
      $time1=time();
      $i=0;

      while (1) {

         $i++;
         if ($i>50000) {
            $time=time()-$time1;
            if ($time>20) break;
            $i=0;
            $sum=0;
            for ($j=1; $j<count($from); $j++) $sum+=$from[$j]*pow($phplen,$j);
            printf("<nobr><b>%02.2f%%</b> ($word) %02dsec |</nobr> \r\n",
               $sum*100/$fullsum,$time);
            flush();
            $fullqty+=5;
         }

         if (md5($word)===$text) 
            exit("<P><font color=red size=+1><b>** DONE **<P><tt>[$word]=[$text]</tt></b></font>
            <script> window.focus();  window.focus(); setTimeout(\"alert('Done!')\",100);</script>");
         $from[$pos]++;
         if ($from[$pos]==$phplen) {
            $flag=1;
            $from[$pos]=0;
            $word[$pos]=$php[0];
            for ($pos=$pos+1; $pos<$poslen; $pos++) {
               if ($from[$pos]+1<$phplen) {
                  $from[$pos]++;
                  $word[$pos]=$php[$from[$pos]];
                  $flag=0;
                  $pos=0;
                  break;
               }
               else {
                  $from[$pos]=0;
                  $word[$pos]=$php[0];
               }
            }
            if ($flag) {
               $from[]=0;
               $poslen=count($from);
               $word.=$php[0];
               $pos=0;
               $fullsum=pow($phplen,$poslen);
            }
         }
         $word[$pos]=$php[$from[$pos]];
      }

      $fulltime+=time()-$time1;
      if ($i>5000) $fullqty++;
      $url="$self?c=md5crack".
           "&from=".urlencode("$pos:".implode(",",$from)).
           "&text=".urlencode($text).
           "&php=".urlencode($php).
           "&fulltime=$fulltime&fullqty=$fullqty&go=1";
      echo "<script>location.href=\"$url\"</script><a href='$url'>click here</a>";

   }

   break;


case "phpinfo":

   phpinfo();
   break;


case "codes":

   error_reporting(2039);
   if (!isset($limit)) $limit=999;
   if (!isset($fontsize)) $fontsize="300%";

   echo "<h3>
   <a href='$self'>START PAGE</a> |
   <a href='$self?c=t'>Eval/Shell</a> | 
   <a href='$self?c=codes'>Character map</a>
   </h3>";

   echo "<h3>".mm("Character map (symbol codes table)")."</h3>
   <form action=$self method=get>
   <input type=hidden name=c value=\"codes\">
   <select name=fontname size=1>
   <option value='Webdings'>====[ ".mm("Select font")." ]====";

   foreach (array('Arial','Courier','Comic Sans MS','Fixedsys','Small fonts','Symbol',
      'System','Tahoma','Terminal','Times New Roman','Verdana',
      'Webdings','Wingdings','Wingdings 2','Wingdings 3') as $v)
      echo "<option".($fontname==$v?" selected":"").">$v";
   
   echo "</select>
   ".mm("or type other")." 
   <input size=13 type=text name=fontname2 value=\"$fontname2\">.
   ".mm("Font size").": <input size=6 type=text name=fontsize value=\"$fontsize\">.<br>
   ".mm("Code limit").": 
   <input type=radio name=limit value=255 id=a1 ".($limit==255?"checked":"")."><label for=a1>0-255</label>
   <input type=radio name=limit value=999 id=a2 ".($limit==999?"checked":"")."><label for=a2>0-999 </label>
   <input type=radio name=limit value=9999 id=a3 ".($limit==9999?"checked":"")."><label for=a3>0-9999</label>
   <input type=submit value='".mm("Generate table")." !'></form><P>";

   if (!isset($fontname)) break; 
   if (!empty($fontname2)) $fontname=$fontname2;
   echo "
   <STYLE>
   .codes { font: $fontsize $fontname; text-align: center; }
   .z { font: 12pt Fixedsys; color: #cccccc; }
   </STYLE>
   <table class=codes border=0 cellspacing=0 cellpadding=1>";
   ?>
   <SCRIPT>
   m=8;
   n=1;
   s=new String("");
   s=s+"<tr><td class=z>&amp;#0000;</td><td>&nbsp;</td>";
   for (i=1; i<=<?php echo $limit; ?>; i++) {
      if (i<10) x="000"+i;
      else if (i<100) x="00"+i;
           else if (i<1000) x="0"+i;
                else x=i;
      if (n%m==0) s=s+"<tr>";
      s=s+"<td class=z>&amp;#"+x+";</td>";
      s=s+"<td>&#"+x+";</td>";
      if (n%m+1==m) s=s+"</tr>";
      if (s.length>500) {
         document.write(s);
         s=""
      } 
      n++;
   }
   document.write(s);
   </SCRIPT>
   <?php

   echo "</table>";
   break;



case "img":

   unset($img);
$img=array(
'dir'=>
'R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAA'.
'AAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp'.
'/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs=',
'fon'=>
'R0lGODlhQAYEALMAAAAAAP///6bK8A4obRs2eSlFhDZTkEVjnVRyqWKCtnCQwXyezIiq1pO24J3A'.
'6P///yH5BAEAAA8ALAAAAABABgQAAAT/cMhJq704E7n78EQXjmRpnmcRqizRsgUcz3Rt37QR63zR'.
'GzygcEgsGo8HYNKQbDKfh2Z0Sq1ar9goQsvdeg/eMGJMLpvPaHRivG4j3O14Yk6v2+/4u2K+7yf8'.
'Cn2Bg4SFhoeGC4GKjAqNC4yQkpOUlZaTDJCZmwubngygoaKjpKUNDKepqKipDa6vsLGysg4Ntbe2'.
'tg63u72+v8AOArvDxcLFAsnKy8zNzs/Q0dLT1NXW19jZ2tvc3d7f4OHi4+Tl5ufo6err7O3u7/Dx'.
'8vPSGfb3GCAfHBP6IvwgRKBIscJFwREvXMRYkVCGQhw1dPiYSJHiDx8SLwLBeKSjkyUg/5VAGRnl'.
'CUkmWVKCWfmF5UqXX8bAZJmmJpubbt6QWaNzTs+ccOTkwbPnj9GjfIwCKspUqSBEiRxJnbpI6qNG'.
'Vh1d2sopUydNYEF18tp1bClTq06JUqvK1aq0rGbNwvUKl11deIP9Mkasr7Fkwo4do0e4sOHDiBMr'.
'Xsy4sePHkCNLnkzZHL7LmC9s2LdZ34eAAkOjUGGCNAyEBhkqfDiDNcTXGS1O7IFx9sYhHDuKRCIy'.
'pBSSUqgAV7kFS/GXMcHIXK6cDEybOm+e4emzp/Wgdd7E0T50aNNAdADxeTroT3moVQspWrT+0dRI'.
'k7Ju/VrJK/2ynsyG+nr2LSlVrMCVlsIsA8pVCyx05bJLXrzoFQxff0WITGUUVmjhhRhmqOGGHHbo'.
'4YcgepPZiP3wA9A+nJ0o0GchsDjQiwaRFiNCL7R2Wo2vRZRDRbJpdJsQueWm2xImfdTbbkYKNwUU'.
'KjXp0pPMJScGTdBVeZ10V2J3XXdEJaWUHUWZ9yV4ZDqFHnrrZVWVe5VYNZ8l9pF1H3/87ddVf6Oo'.
'JSCAcMHSp1wGKujKXQsGo8uDvgwTWGCKKjMYYCFGKumklFZq6aWYZqrppstEAAA7',
'mode'=>
'R0lGODlhHQAUALMAAAAAAP///6CgpN3d3czMzIaGhmZmZl9fX////wAAAAAAAAAAAAAAAAAAAAAA'.
'AAAAACH5BAEAAAgALAAAAAAdABQAAASBEMlJq70461m6/+AHZMUgnGiqniNWHHAsz3F7FUGu73xO'.
'2BZcwGDoEXk/Uq4ICACeQ6fzmXTlns0ddle99b7cFvYpER55Z10Xy1lKt8wpoIsACrdaqBpYEYK/'.
'dH1LRWiEe0pRTXBvVHwUd3o6eD6OHASXmJmamJUSY5+gnxujpBIRADs=',

'refresh'=>
'R0lGODlhEQAUALMAAAAAAP////Hx8erq6uPj493d3czMzLKysoaGhmZmZl9fXwQEBP///wAAAAAA'.
'AAAAACH5BAEAAAwALAAAAAARABQAAAR1kMlJq0Q460xR+GAoIMvkheIYlMyJBkJ8lm6YxMKi6zWY'.
'3AKCYbjo/Y4EQqFgKIYUh8EvuWQ6PwPFQJpULpunrXZLrYKx20G3oDA7093Esv19q5O/woFu9ZAJ'.
'R3lufmWCVX13h3KHfWWMjGBDkpOUTTuXmJgRADs=',
'search'=>
'R0lGODlhFAAUALMAAAAAAP///+rq6t3d3czMzMDAwLKysoaGhnd3d2ZmZl9fX01NTSkpKQQEBP//'.
'/wAAACH5BAEAAA4ALAAAAAAUABQAAASn0Ml5qj0z5xr6+JZGeUZpHIqRNOIRfIYiy+a6vcOpHOap'.
's5IKQccz8XgK4EGgQqWMvkrSscylhoaFVmuZLgUDAnZxEBMODSnrkhiSCZ4CGrUWMA+LLDxuSHsD'.
'AkN4C3sfBX10VHaBJ4QfA4eIU4pijQcFmCVoNkFlggcMRScNSUCdJyhoDasNZ5MTDVsXBwlviRmr'.
'Cbq7C6sIrqawrKwTv68iyA6rDhEAOw==',
'setup'=>
'R0lGODlhFAAUAMQAAAAAAP////j4+OPj493d3czMzMDAwLKyspaWloaGhnd3d2ZmZl9fX01NTUJC'.
'QhwcHP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEA'.
'ABAALAAAAAAUABQAAAWVICSKikKWaDmuShCUbjzMwEoGhVvsfHEENRYOgegljkeg0PF4KBIFRMIB'.
'qCaCJ4eIGQVoIVWsTfQoXMfoUfmMZrgZ2GNDPGII7gJDLYErwG1vgW8CCQtzgHiJAnaFhyt2dwQE'.
'OwcMZoZ0kJKUlZeOdQKbPgedjZmhnAcJlqaIqUesmIikpEixnyJhulUMhg24aSO6YyEAOw==',
'up'=>
'R0lGODlhFAAUALMAAAAAAP////j4+OPj493d3czMzLKysoaGhk1NTf///wAAAAAAAAAAAAAAAAAA'.
'AAAAACH5BAEAAAkALAAAAAAUABQAAAR0MMlJq734ns1PnkcgjgXwhcNQrIVhmFonzxwQjnie27jg'.
'+4Qgy3XgBX4IoHDlMhRvggFiGiSwWs5XyDftWplEJ+9HQCyx2c1YEDRfwwfxtop4p53PwLKOjvvV'.
'IXtdgwgdPGdYfng1IVeJaTIAkpOUlZYfHxEAOw==',
'sort_asc'=>
'R0lGODlhDgAJAKIAAAAAAP///9TQyICAgP///wAAAAAAAAAAACH5BAEAAAQALAAAAAAOAAkAAAMa'.
'SLrcPcE9GKUaQlQ5sN5PloFLJ35OoK6q5SYAOw==',
'sort_desc'=>
'R0lGODlhDgAJAKIAAAAAAP///9TQyICAgP///wAAAAAAAAAAACH5BAEAAAQALAAAAAAOAAkAAAMb'.
'SLrcOjBCB4UVITgyLt5ch2mgSJZDBi7p6hIJADs=',
'exe'=>
'R0lGODlhEwAOAKIAAAAAAP///wAAvcbGxoSEhP///wAAAAAAACH5BAEAAAUALAAAAAATAA4AAAM7'.
'WLTcTiWSQautBEQ1hP+gl21TKAQAio7S8LxaG8x0PbOcrQf4tNu9wa8WHNKKRl4sl+y9YBuAdEqt'.
'xhIAOw==',
'html'=>
'R0lGODlhEwAQALMAAAAAAP///2trnM3P/FBVhrPO9l6Itoyt0yhgk+Xy/WGp4sXl/i6Z4mfd/HNz'.
'c////yH5BAEAAA8ALAAAAAATABAAAAST8Ml3qq1m6nmC/4GhbFoXJEO1CANDSociGkbACHi20U3P'.
'KIFGIjAQODSiBWO5NAxRRmTggDgkmM7E6iipHZYKBVNQSBSikukSwW4jymcupYFgIBqL/MK8KBDk'.
'Bkx2BXWDfX8TDDaFDA0KBAd9fnIKHXYIBJgHBQOHcg+VCikVA5wLpYgbBKurDqysnxMOs7S1sxIR'.
'ADs=',
'txt'=>
'R0lGODlhEwAQAKIAAAAAAP///8bGxoSEhP///wAAAAAAAAAAACH5BAEAAAQALAAAAAATABAAAANJ'.
'SArE3lDJFka91rKpA/DgJ3JBaZ6lsCkW6qqkB4jzF8BS6544W9ZAW4+g26VWxF9wdowZmznlEup7'.
'UpPWG3Ig6Hq/XmRjuZwkAAA7',
'unk'=>
'R0lGODlhEwAQAKIAAAAAAP///8bGxoSEhP///wAAAAAAAAAAACH5BAEAAAQALAAAAAATABAAAANE'.
'SLPcSzCqQKsVQ8JhexBBJnGVYFZACowleJZrRH7lFW8eDbMXaPO1juA2uXiGwBwFKRMeiTPlByrd'.
'yUzYbJao6npVkQQAOw==',
'php'=>
'R0lGODlhEwAQALMAAAAAAP///9fX3d3f7s/S5F1qpmJpjKOqyr7D27i80K+ywEtam4OIk+T/AO7u'.
'7v///yH5BAEAAA8ALAAAAAATABAAAAR08D0wK71VSna47yBHadxhnujRqKRJvC+SJIPKbgJR7DzP'.
'NECNgNFbGI/HhmZQWASezugzsFBKdtJsoEA1aLBTJzTMIDWpRqr6mFgyounswiAgDYjY/FwxGD1K'.
'BAMIg4MJCg41fiUpjAeKjY1+EwCUlZaVGhEAOw==',
'img'=>
'R0lGODlhEwAQALMAAAAAAP///6CgpHFzcVe2Osz/mbPmZkRmAPj4+Nra2szMzLKyspeXl4aGhlVV'.
'Vf///yH5BAEAAA8ALAAAAAATABAAAASA8KFJq00vozZ6Z4uSjGOTSV3DMFzTCGJ5boIQKsrqgoqp'.
'qbabYsFq+SSs1WLJFLgGx82OUWMuXVEPdGcLOmcehziVtEXFjoHiQGCnV99fR4EgFA6DBVQ3c3bq'.
'BIEBAXtRSwIsCwYGgwEJAywzOCGHOliRGjiam5M4RwlYoaJPGREAOw==',
'edit'=>
'R0lGODlhFAAUALMAAAAAAP///93d3czMzLKysoaGhmZmZl9fXwQEBP///wAAAAAAAAAAAAAAAAAA'.
'AAAAACH5BAEAAAkALAAAAAAUABQAAAR0MMlJqyzFalqEQJuGEQSCnWg6FogpkHAMF4HAJsWh7/ze'.
'EQYQLUAsGgM0Wwt3bCJfQSFx10yyBlJn8RfEMgM9X+3qHWq5iED5yCsMCl111knDpuXfYls+IK61'.
'LXd+WWEHLUd/ToJFZQOOj5CRjiCBlZaXIBEAOw==',
'papki'=>
'R0lGODlhFAAUAKIAAAAAAP////j4+N3d3czMzLKysoaGhv///yH5BAEAAAcALAAAAAAUABQAAANo'.
'eLrcribG90y4F1Amu5+NhY2kxl2CMKwrQRSGuVjp4LmwDAWqiAGFXChg+xhnRB+ptLOhai1crEmD'.
'Dlwv4cEC46mi2YgJQKaxsEGDFnnGwWDTEzj9jrPRdbhuG8Cr/2INZIOEhXsbDwkAOw==',
'home'=>
'R0lGODlhFAAUALMAAAAAAP///+rq6t3d3czMzLKysoaGhmZmZgQEBP///wAAAAAAAAAAAAAAAAAA'.
'AAAAACH5BAEAAAkALAAAAAAUABQAAAR+MMk5TTWI6ipyMoO3cUWRgeJoCCaLoKO0mq0ZxjNSBDWS'.
'krqAsLfJ7YQBl4tiRCYFSpPMdRRCoQOiL4i8CgZgk09WfWLBYZHB6UWjCequwEDHuOEVK3QtgN/j'.
'VwMrBDZvgF+ChHaGeYiCBQYHCH8VBJaWdAeSl5YiW5+goBIRADs=',
'back'=>
'R0lGODlhFAAUAKIAAAAAAP///93d3cDAwIaGhgQEBP///wAAACH5BAEAAAYALAAAAAAUABQAAAM8'.
'aLrc/jDKSWWpjVysSNiYJ4CUOBJoqjniILzwuzLtYN/3zBSErf6kBW+gKRiPRghPh+EFK0mOUEqt'.
'Wg0JADs='

);


   header("Content-type: image/gif");
   header("Cache-control: public");
   // /*
   header("Expires: ".date("r",mktime(0,0,0,1,1,2030)));
   header("Cache-control: max-age=".(60*60*24*7));
   header("Last-Modified: ".date("r",filemtime(__FILE__)));
   // */
   echo base64_decode($img[$name]);

   break;

}


?>
