<?php
interface Identifiable{
    public function setId(string $id) : void ;
}
interface Birthable {
    public function setBirthDate(string $birthDate) : void ;
}
interface Person {
    public function setName(string $name) : void ;
    public function setAge(int $age) : void ;
}

class Citizen implements Person,Birthable , Identifiable {
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $age;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $birthDate;

    /**
     * Citizen constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     * @param string $birthDate
     */
    public function __construct(string $name, int $age, string $id, string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthDate($birthDate);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }
    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function __toString()
    {
        return $this->name.PHP_EOL.$this->age.PHP_EOL.$this->id.PHP_EOL.$this->birthDate;
    }
}

//class Application {
//    function readData() : string {
//   }
//}

//$myApp = new Application();
$name = readline();
$age = intval(readline());
$id = readline();
$birthDate = readline();
//return "$name, $age, $id, $birthDate";
$person = new Citizen($name, $age, $id, $birthDate);
echo $person;