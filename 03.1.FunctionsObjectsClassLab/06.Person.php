<?php
$person = new Person();
echo (count(get_object_vars($person)));

class Person {
    public $name;
    public $age;
}
