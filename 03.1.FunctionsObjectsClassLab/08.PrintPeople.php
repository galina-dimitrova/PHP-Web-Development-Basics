<?php
$input = readline();
$persons = array();

while ($input!="END") {
    $data = explode(" ", $input);
    $name = $data[0];
    $age = $data[1];
    $occupation = $data[2];
    $person = new Person($name, $age, $occupation);
    array_push($persons, $person);
    $input = readline();
}
usort($persons, "cmp");
foreach ($persons as $person) {
    echo $person->name . ' - age: ' .
        $person->age.', occupation: '.
        $person->occupation.PHP_EOL;
}

function cmp($a, $b) {
    return strcmp($a->age, $b->age);
}

class Person {
    public $name;
    public $age;
    public $occupation;

    public function __construct(string $name, int $age, string $occupation) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;

    }
}