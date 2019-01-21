<?php
interface Id{
    public function getId();
}
interface Buyer{
    public function buyFood(int $purchased);
}
class Pet {
    protected $name;
    protected $birthDate;

    /**
     * Pet constructor.
     * @param $name
     * @param $birthDate
     */
    public function __construct($name, $birthDate)
    {
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function getBirthDate(){
        return $this->birthDate;
    }

}
class Citizen extends Pet implements Id, Buyer {
    protected $age;
    protected $id;

    /**
     * Citizen constructor.
     * @param $name
     * @param $birthDate
     * @param $age
     * @param $id
     */
    public function __construct($name,$birthDate, $age, $id )
    {
        parent::__construct($name, $birthDate);
        $this->age = $age;
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function buyFood(int $purchased)
    {
        return $purchased+10;
    }
}
class Robot implements Id {
    protected $model;
    protected $id;

    /**
     * Robot constructor.
     * @param $model
     * @param $id
     */
    public function __construct($model, $id)
    {
        $this->model = $model;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
class Rebal implements Buyer {
    protected $name;
    protected $age;
    protected $group;

    /**
     * Rebal constructor.
     * @param string $name
     * @param int $age
     * @param string $group
     */
    public function __construct($name, $age, $group)
    {
        $this->name = $name;
        $this->age = $age;
        $this->group = $group;
    }

    public function getName(){
        return $this->name;
    }

    public function buyFood(int $purchased)
    {
        return $purchased+5;
    }
}

/**
 * Object[]
 */
$buyers = [];
$purchased = 0;
$n = readline();
for ($i = 0; $i<$n; $i++){
    $data = explode(" ", readline());
    if (count($data)==4){
        $citizen = new Citizen($data[0], $data[3], $data[1], $data[2]);
        $buyers[$data[0]] = $citizen;
        //$birthDates[] = $citizen->getBirthDate();
        //} elseif($data[0]=="Robot") {
        // $robot = new Robot($data[0], $data[1]);
        // } elseif ($data[0]=="Pet"){
        //  $pet = new Pet($data[1], $data[2]);
        // $birthDates[] = $pet->getBirthDate();
    } elseif (count($data)==3){
        $rebal = new Rebal($data[0], intval($data[1]), $data[2]);
        $buyers[$data[0]] = $rebal;
    }
    //$input = readline();
}
$input = readline();
while ($input!="End"){
    foreach ($buyers as $buyer){
        if ($buyer->getName() == $input){
            $purchased = $buyer->buyFood($purchased);
        }
    }
    $input = readline();
}
echo $purchased;
//$search = readline();
//foreach ($birthDates as $bD){
//    if (substr($bD, -4,4)==$search) {
//        echo $bD.PHP_EOL;
//    }
//}