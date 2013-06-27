<?php
function rstr() //Random String Function
{
 $len=rand(3,6);
 $chr='';
 for($i=1;$i<=$len;$i++)
 {
  $chr.=rand(0,1) ? chr(rand(65,90)) : chr(rand(97,122));
 }
 return $chr;
}
function enjumble($data) //Custom Encoding + Base64 + gzinflate()
{
 for($i=0;$i<strlen($data);$i++)
 {
  $data[$i]=chr(ord($data[$i])+1);
 }
 return base64_encode(gzdeflate($data,9));
}
function striptag($in) //Remove '<?php' from initial code
{
 $pos = strpos($in,"<?php"); //to do: add support for short_tags 
 if(is_numeric($pos))
 {
  for($i=$pos;$i<=$pos+4 && strlen($in) >=5;$i++)
  {
  $in[$i]=' ';
  }
  return $in;
 }
 else
 {
 return $in;
 }
}
function makeoutfile($str)
{ $funcname=rstr();
$varname='$'.rstr();
$template=
"<?php function ".$funcname."($varname)
{ 
$varname=gzinflate(base64_decode($varname));
 for(\$i=0;\$i<strlen($varname);\$i++)
 {
".$varname."[\$i] = chr(ord(".$varname."[\$i])-1);
 }
 return $varname;
 }eval($funcname(\"";
  $str=enjumble($str);
 $template = $template . $str."\"));?>";
 return $template;
}
function main($argc,$argv)
{
$banner=
"\n +-------------------------------------------------------------------+
 |+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++|
 |+                                                                 +|
 +____               _             _                    _           +| 
/  __ \             | |           | |                  (_)          +|   
| /  \/  __ _  _ __ | |__   _   _ | |  __ _  _ __ ___   _  _ __    _+|_ 
| |     / _` || '__|| '_ \ | | | || | / _` || '_ ` _ \ | || '_ \  / _ \
| \__/\| (_| || |   | |_) || |_| || || (_| || | | | | || || | | ||  __/
 \____/ \__,_||_|   |_.__/  \__, ||_| \__,_||_| |_| |_||_||_| |_| \___|
 |+                         __/ |                                    +|  
 |+                    Carbylamine PHP Encoder                      +|  
 |+                           v0.1.1 Nightly                        +|
 |+                                                                 +|
 |+                                                                 +|
 |+                      Coded by Prakhar Prasad                    +|
 |+                        (prakharpd@gmail.com)                    +|
 |+                                                                 +|
 |+                                                                 +|
 |+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++|
 +-------------------------------------------------------------------+\n\n";
$usage="$banner Syntax: ".$_SERVER['PHP_SELF']." <file to encode> <output file>\n";
if($argc==1) {echo $usage ; die();}
if($argc>1) $file = $argv[1];
if($argc>2) $outfile = $argv[2];
if(empty($file) || empty($outfile)) { echo "Input/Output filename not entered!\n\n\x07" ;die();}
if(!file_exists($file))
{
echo "$banner Error: Input file doesn't exist\n\n\x07";
}
else{
$orginal_size=round(filesize($file)/1024,2);
echo "$banner  Encoding : $file ($orginal_size KB) \n\n ";
$output_filename=$outfile;
$outfile=fopen($outfile,'w+');
$file=fread(fopen($file,'r'),filesize($file));
$outdata=makeoutfile(striptag($file));
$newsize=round(strlen($outdata)/1024,2);
echo " Compression : ".@round(100-(($newsize*100)/($orginal_size!=0?$orginal_size:1)),2)."%\n\n";
if(!fwrite($outfile,$outdata))
{
 echo " Unable to write to $output_filename\n\n\x07";
}
else
{
echo "  Successfully Encoded! to $output_filename\n\n" ;
}}}
main($argc,$argv);
?>
