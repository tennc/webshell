#!/usr/bin/perl -w

unlink("results.html");
print "\n \n#Will check a directory for all includes and unsets \n";
print "#Coded by Ironfist (ironsecurity.nl) \n";
print "#Usage: create a folder in your perlfolder and put the files to be scanned in it, next type the folder name below (eg myfolder) \n";
print "#GIVES ERRORS WHEN CHECKING SUBFOLDERS: IGNORE THEM :) \n\n\n";


print "Directory to read? ";
$input = <stdin>;
chop ($input);

@files = <$input/*>;

foreach $file (@files) {
  print "Checking: " .$file . "\n";


open(MYINPUTFILE, "$file");
while(<MYINPUTFILE>)
 {

 my($line) = $_;

 chomp($line);
if(($line =~ m/include_once \$/i) || ($line =~ m/require_once \$/i) || ($line =~ m/include_once\(\$/i) || ($line =~ m/require_once\(\$/i) || ($line =~ m/require \$/i) || ($line =~ m/require\(\$/i) ||  ($line =~ m/require \$/i) || ($line =~ m/include \$/i) || ($line =~ m/include\(\$/i))
{
open(DAT,">>results.html") || die("Cannot Open File");
print DAT "FOUND: $line in $file
";
close(DAT);

}
 }
}
@files2 = <$input/*/*>;
foreach $file (@files2) {
  print "Checking: " .$file . "\n";


open(MYINPUTFILE, "$file");
while(<MYINPUTFILE>)
 {

 my($line) = $_;

 chomp($line);
if(($line =~ m/include_once \$/i) || ($line =~ m/require_once \$/i) || ($line =~ m/include_once\(\$/i) || ($line =~ m/require_once\(\$/i) || ($line =~ m/require \$/i) || ($line =~ m/require\(\$/i) ||  ($line =~ m/require \$/i) || ($line =~ m/include \$/i) || ($line =~ m/include\(\$/i))
{
open(DAT,">>results.html") || die("Cannot Open File");
print DAT "FOUND: $line in $file
";
close(DAT);

}
 }
}
@files3 = <$input/*/*/*>;
foreach $file (@files3) {
  print "Checking: " .$file . "\n";


open(MYINPUTFILE, "$file");
while(<MYINPUTFILE>)
 {

 my($line) = $_;

 chomp($line);
if(($line =~ m/include_once \$/i) || ($line =~ m/require_once \$/i) || ($line =~ m/include_once\(\$/i) || ($line =~ m/require_once\(\$/i) || ($line =~ m/require \$/i) || ($line =~ m/require\(\$/i) ||  ($line =~ m/require \$/i) || ($line =~ m/include \$/i) || ($line =~ m/include\(\$/i))
{
open(DAT,">>results.html") || die("Cannot Open File");
print DAT "FOUND: $line in $file
";
close(DAT);

}
 }
}
@files4 = <$input/*/*/*/*>;
foreach $file (@files4) {
  print "Checking: " .$file . "\n";


open(MYINPUTFILE, "$file");
while(<MYINPUTFILE>)
 {

 my($line) = $_;

 chomp($line);
if(($line =~ m/include_once \$/i) || ($line =~ m/require_once \$/i) || ($line =~ m/include_once\(\$/i) || ($line =~ m/require_once\(\$/i) || ($line =~ m/require \$/i) || ($line =~ m/require\(\$/i) ||  ($line =~ m/require \$/i) || ($line =~ m/include \$/i) || ($line =~ m/include\(\$/i))
{
open(DAT,">>results.html") || die("Cannot Open File");
print DAT "FOUND: $line in $file
";
close(DAT);

}
 }
}
@files5 = <$input/*/*/*/*/*>;
foreach $file (@files5) {
  print "Checking: " .$file . "\n";


open(MYINPUTFILE, "$file");
while(<MYINPUTFILE>)
 {

 my($line) = $_;

 chomp($line);
if(($line =~ m/include_once \$/i) || ($line =~ m/require_once \$/i) || ($line =~ m/include_once\(\$/i) || ($line =~ m/require_once\(\$/i) || ($line =~ m/require \$/i) || ($line =~ m/require\(\$/i) ||  ($line =~ m/require \$/i) || ($line =~ m/include \$/i) || ($line =~ m/include\(\$/i))
{
open(DAT,">>results.html") || die("Cannot Open File");
print DAT "FOUND: $line in $file
";
close(DAT);

}
 }
}
@files6 = <$input/*/*/*/*/*/*>;
foreach $file (@files6) {
  print "Checking: " .$file . "\n";


open(MYINPUTFILE, "$file");
while(<MYINPUTFILE>)
 {

 my($line) = $_;

 chomp($line);
if(($line =~ m/include_once \$/i) || ($line =~ m/require_once \$/i) || ($line =~ m/include_once\(\$/i) || ($line =~ m/require_once\(\$/i) || ($line =~ m/require \$/i) || ($line =~ m/require\(\$/i) ||  ($line =~ m/require \$/i) || ($line =~ m/include \$/i) || ($line =~ m/include\(\$/i))
{
open(DAT,">>results.html") || die("Cannot Open File");
print DAT "FOUND: $line in $file
";
close(DAT);

}
 }
}
@files7 = <$input/*/*/*/*/*/*/*>;
foreach $file (@files7) {
  print "Checking: " .$file . "\n";


open(MYINPUTFILE, "$file");
while(<MYINPUTFILE>)
 {

 my($line) = $_;

 chomp($line);
if(($line =~ m/include_once \$/i) || ($line =~ m/require_once \$/i) || ($line =~ m/include_once\(\$/i) || ($line =~ m/require_once\(\$/i) || ($line =~ m/require \$/i) || ($line =~ m/require\(\$/i) ||  ($line =~ m/require \$/i) || ($line =~ m/include \$/i) || ($line =~ m/include\(\$/i))
{
open(DAT,">>results.html") || die("Cannot Open File");
print DAT "FOUND: $line in $file
";
close(DAT);

}
 }
}


print "Done! Check results.html for the found inclusions!";