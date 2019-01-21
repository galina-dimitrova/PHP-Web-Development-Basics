<?php
abstract class Food {
    /**
     * @var int
     */
    protected $quantity;

    /**
     * Food constructor.
     * @param int $quantity
     */
    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    abstract public function getQuantity(): int;

}
abstract class Animal {
    /**
     * @var string
     */
    protected $aniName;
    /**
     * @var string
     */
    protected $aniType;
    /**
     * @var float
     */
    protected $aniWeight;
    /**
     * @var int
     */
    protected $foodEaten=0;

    /**
     * Animal constructor.
     * @param string $aniName
     * @param string $aniType
     * @param float $aniWeight
     */
    public function __construct(string $aniType, string $aniName, float $aniWeight)
    {
        $this->aniName = $aniName;
        $this->aniType = $aniType;
        $this->aniWeight = $aniWeight;
    }

    abstract public function makeSound() ;
    public function eat(string $foods, Food $food): void
    {
        $this->foodEaten = $this->foodEaten+=$food->getQuantity();
    }
}
abstract class Mammal extends Animal {
    /**
     * @var string
     */
    protected $livingRegion;

    /**
     * Mammal constructor.
     * @param $name
     * @param $type
     * @param $weight
     * @param string $livingRegion
     */
    public function __construct($type, $name, $weight, string $livingRegion)
    {
        parent::__construct($type, $name, $weight);
        $this->livingRegion = $livingRegion;
    }
    public function __toString()
    {
        return $this->aniType."[".$this->aniName.", ".$this->aniWeight.", ".$this->livingRegion.", ".$this->foodEaten."]\n";
    }
}
class Vegetable extends Food {
    public function __construct(int $quantity)
{
    parent::__construct($quantity);
}

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

}
class Meat extends Food
{
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

}
class Mouse extends Mammal{
    public function __construct($type, $name, $weight, string $livingRegion)
{
    parent::__construct($type, $name, $weight, $livingRegion);
}
public function eat(string $foods, Food $food): void
{
    if ($foods=="Vegetable"){
        $this->foodEaten = $this->foodEaten+=$food->getQuantity();
    }else{
        echo "Mouses are not eating that type of food!".PHP_EOL;
    }
}
public function makeSound(): void
{
    echo "SQUEEEAAAK!".PHP_EOL;
}
}
abstract class Felime extends Mammal{
    public function __construct($type, $name, $weight, string $livingRegion)
{
    parent::__construct($type, $name, $weight, $livingRegion);
}

}
class Zebra extends Mammal{
    public function __construct($type, $name, $weight, string $livingRegion)
{
    parent::__construct($type, $name, $weight, $livingRegion);
}
    public function eat(string $foods, Food $food): void
    {
        if ($foods=="Vegetable"){
            $this->foodEaten = $this->foodEaten+=$food->getQuantity();
        }else{
            echo "Zebras are not eating that type of food!".PHP_EOL;
        }
    }
    public function makeSound(): void
    {
        echo "Zs".PHP_EOL;
    }
}
class Cat extends Felime {
    /**
     * @var string
     */
    protected $breed;

    public function __construct($type, $name, $weight, string $livingRegion, $breed)
{
    parent::__construct($type, $name, $weight, $livingRegion);
    $this->breed = $breed;
}
    public function makeSound(): void
    {
        echo "Meowwww".PHP_EOL;
    }
    public function __toString()
    {
        return $this->aniType."[".$this->aniName.", ".$this->breed.", ".$this->aniWeight.", ".$this->livingRegion.", ".$this->foodEaten."]\n";
    }
}
class Tiger extends Felime {
    public function __construct($type, $name, $weight, string $livingRegion)
{
    parent::__construct($type, $name, $weight, $livingRegion);
}
    public function eat(string $foods, Food $food): void
    {
        if ($foods=="Meat"){
            $this->foodEaten = $this->foodEaten+=$food->getQuantity();
        }else{
            echo "Tigers are not eating that type of food!".PHP_EOL;
        }
    }
    public function makeSound(): void
    {
        echo "ROAAR!!!".PHP_EOL;
    }
}
$input = readline();
while ($input!= "End"){
    /**
     * @var Mammal[]
     */
    $animals = [];
    /**
     * #var Food[]
     */
    $foods = [];
    [$anitype, $name, $weight, $region] = explode(" ", $input);
    if ($anitype=="Cat"){
        [$anitype, $name, $weight, $region, $breed] = explode(" ", $input);
    }
    if (!class_exists($anitype)){
        echo "Non valid animal type";
    }
    if ($anitype=="Cat") {
        $animals[$anitype] = new $anitype($anitype, $name, floatval($weight), $region, $breed);
    } else {
        $animals[$anitype] = new $anitype($anitype, $name, floatval($weight), $region);
    }
    [$foodType, $quantity] = explode(" ", readline());
    if (!class_exists($foodType)){
        echo "Non valid food type";
    }
    $foods[$foodType] = new $foodType(intval($quantity));

    $animals[$anitype]->makeSound();
    //$am = $foods[$foodType]->getQuantity();
    $animals[$anitype]->eat($foodType, $foods[$foodType]);
    echo $animals[$anitype];
    $input = readline();
}



