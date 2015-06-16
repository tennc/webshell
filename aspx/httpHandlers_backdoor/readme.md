## author:园长
### url: http://javaweb.org/?p=1755

使用说明
global.asax是不需要编译的，所以直接忽略。

httpHandlers和httpModules配置方式：

1、自行编译上面的cs文件dll

2、复制dll到bin目录

3、修改上述配置，并仔细检查

或：

1、直接新建个Customize.cs文件

2、复制Customize.cs文件到App_Code目录

3、修改上述配置，并仔细检查

连接：

1、菜刀连接的时候必须选Customize：

2、httpHandlers 可以自己指定后缀，比如你配置了.api请求那么可以  http://xx.com/123456.api  做为shell地址，可能会有不能拦截除aspx的情况

3、httpModules可以随便访问一个只要不是静态文件的链接(比如jpg文件不允许被POST) 可以访问:http://xx.com/123456.xxx  

4、连接密码:023

