<?php
class Person{
    public $name;
    public $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

}
class Family {
    public $peoples;

    public function __construct()
    {
        $this->peoples = [];
    }

    public function addMember(Person $person) {
        $this->peoples[] = $person;
    }

    /**
     * @return mixed
     */
    public function getPeoples()
    {
        return $this->peoples;
    }

    public function getOldestMember() {
        $old = $this->peoples[0];
        foreach ($this->peoples as $people) {
            if ($people->age > $old->age) {
                $old = $people;
            }
        }
        return $old;
    }
    public function __toString()
    {
        $old = $this->getOldestMember();
        return "$old->name $old->age";
    }
}
$n = intval(readline());
$peoples = new Family();
for ($i = 0; $i<$n; $i++) {
    $input = explode(" ", readline());
    $person = new Person($input[0], $input[1]);
    $peoples->addMember($person);
}
echo $peoples;