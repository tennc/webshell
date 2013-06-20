<!--此程序纯属娱乐！不得用于非法用途，滥用者后果自付！-->
<!--开源小程序，请保留版权 Author:YoCo Smart-->
<!--20120214版-->
<?php
date_default_timezone_set("PRC");
$data = addslashes(trim($_POST['what']));
$data = mb_substr(str_replace(array('说点什么吧'),array(''),$data),0,82,'gb2312');
if (!empty($data))
{
$data = str_replace(array('http://',';','<','>','?','"','(',')','POST','GET','_','/'),array('','&#59;','&lt;','&gt;','&#63;','&#34;','|','|','P0ST','G&#69;T','&#95;','&#47;'),$data);
$data = str_replace(array('[img]','[&#47;img]'),array('<img src="http://','" />'),$data);
$ip = preg_replace('/((?:\d+\.){3})\d+/','\\1*',$_SERVER['REMOTE_ADDR']);
$time = date("Y-m-d G:i:s A");
$text = "<pre>".$data."<p>IP为".$ip."的童鞋 >>> Fucked at:".$time."</p></pre>";
$file = fopen(__FILE__,'a');
fwrite($file,$text);
fclose($file);
echo "<script>location.replace(location.href);</script>";
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Chinese Hackers' Chating Room</title>
<style type="text/css">
html{background:#f7f7f7;}
pre{font-size:15pt;font-family:Times New Roman;line-height:120%;}
p{font-size:10pt;}
.tx{font-family:Lucida Handwriting,Times New Roman;}
</style>
</head>
<center>
<a style="letter-spacing:3px;"><b>Hacked! Owned by Chinese Hackers!</b><br></a>
<h1>菊花聊天室</h1>
<hr>
<form method=post action="?">
<p><a href="#img" onclick="document.getElementById('what').value+='[img]这里换成图片的URL地址[/img]'">插入图片</a></p>
<textarea rows="5" id="what" style="font-family:Times New Roman;font-size:14pt;" cols="80" name="what">说点什么吧</textarea>
<p class="tx">Chating Room is Powered By <a href="http://blackbap.org" target="_blank">Silic Group Hacker Army</a>&copy;2009-2011</p>
<input type="submit" value="雁过留声 路过留言" tilte="提交" style="width:120px;height:64px;">
</form>
</center>
