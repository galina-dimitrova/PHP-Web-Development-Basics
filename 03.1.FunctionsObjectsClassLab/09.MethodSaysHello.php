<?php
$name = readline();
$person = new Person($name);
$person->greet();

class Person {
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function greet(): void {
        echo $this->name.' says "Hello"!';
    }
}