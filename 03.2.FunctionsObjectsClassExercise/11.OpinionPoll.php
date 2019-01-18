<?php
$n = intval(readline());
$persons = array();
for ($i=0; $i<$n; $i++) {
    $input = explode(" ", readline());
    $person = new Person($input[0], (intval($input[1])));
    if ($person->age>30) {
        array_push($persons, $person);
    }
}
usort($persons, function (Person $p1, Person $p2) {
    return $p1->name <=> $p2->name;
});
foreach ($persons as $person){
    echo $person->name.' - '.$person->age.PHP_EOL;
}
class Person {
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}