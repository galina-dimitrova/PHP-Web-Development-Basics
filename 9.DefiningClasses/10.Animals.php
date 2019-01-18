<?php
class Animal{
    /**
     * @var string
     */
    private $name;
    /**
     * @var integer
     */
    private $age;
    /**
     * @var string
     */
    private $gender;

    /**
     * Animal constructor.
     * @param string $name
     * @param int $age
     * @param string $gender
     * @throws Exception
     */
    public function __construct(string $name, int $age, string $gender)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws Exception
     */
    public function setName(string $name): void
    {
        if ($name!=""){
            $this->name = $name;
        } else{
            throw new Exception("Invalid input!");
        }
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @throws Exception
     */
    public function setAge(int $age): void
    {
        if ($age>=0){
            $this->age = $age;
        } else{
            throw new Exception("Invalid input!");
        }
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @throws Exception
     */
    public function setGender(string $gender): void
    {
        if ($gender!=""){
            $this->gender = $gender;
        } else {
            throw new Exception("Invalid input!");
        }
    }

    public function produceSound(string $kind){
        switch ($kind){
            case "Dog":
                echo "BauBau".PHP_EOL;
                break;
            case "Cat":
                echo "MiauMiau".PHP_EOL;
                break;
            case "Frog":
                echo "Frogggg".PHP_EOL;
                break;
            case "Kittens":
                echo "Miau".PHP_EOL;
                break;
            case "Tomcat":
                echo "Give me one million b***h".PHP_EOL;
                break;
            default:
                echo "Not implemented!".PHP_EOL;
                break;
        }
    }
}
$input = readline();
while ($input!="Beast!"){
    $kind = $input;
    $info = explode(" ", readline());
    try{
        $ani = new Animal($info[0], intval($info[1]), $info[2]);
        echo $kind." ".$ani->getName()." ".$ani->getAge()." ".$ani->getGender().PHP_EOL;
        $ani->produceSound($kind);
    } catch (Exception $e) {
        echo $e->getMessage().PHP_EOL;
    }
    $input = readline();
}