<?php
class Person{
    public $name;
    public $money;
    /**
     * @var array
     */
    public $bagOfProducts;

    /**
     * Person constructor.
     * @param $name
     * @param $money
     */
    public function __construct($name, $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->bagOfProducts = [];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    private function setName($name): void
    {
        if ($name!="") {
            $this->name = $name;
        } else {
            echo "Name cannot be empty";
            exit();
        }
    }

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param mixed $money
     */
    private function setMoney($money): void
    {
        if ($money>=0) {
            $this->money = $money;
        } else {
            echo "Money cannot be negative";
            exit();
        }

    }

    /**
     * @return mixed
     */
    public function getBagOfProducts()
    {
        return $this->bagOfProducts;
    }

    /**
     * @param mixed $bagOfProducts
     */
    public function setBagOfProducts($bagOfProducts): void
    {
        $this->bagOfProducts = $bagOfProducts;
    }

    public function buyProduct(Product $product){
        $this->money-=$product->getCost();
        $this->bagOfProducts[] = $product;
        echo "{$this->getName()} bought {$product->name}".PHP_EOL;
    }
}

class Product{
    public $name;
    public $cost;

    /**
     * Product constructor.
     * @param $name
     * @param $cost
     */
    public function __construct($name, $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    private function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    private function setCost($cost): void
    {
        $this->cost = $cost;
    }

}

$peoples = [];
$products = [];

$inputPeoples = preg_split("/[=;]/", readline());
for ($i = 0; $i<count($inputPeoples)-1; $i+=2) {
    try{
        $person = new Person($inputPeoples[$i], floatval($inputPeoples[$i+1]));
        $peoples[$inputPeoples[$i]] = $person;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

$inputProducts = preg_split("/[=;]/", readline()); //PREG_SPLIT_NO_EMPTY
for ($i = 0; $i<count($inputProducts)-1; $i+=2) {
    try{
        $product = new Product($inputProducts[$i], floatval($inputProducts[$i+1]));
        $products[$inputProducts[$i]] = $product;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

$input = explode(" ",readline());
while($input[0]!="END") {
    $namePerson = $input[0];
    $nameProduct = $input[1];
    if ($peoples[$namePerson]->getMoney()>=$products[$nameProduct]->getCost()) {
        $peoples[$namePerson]->buyProduct($products[$nameProduct]);
    } else {
        echo $namePerson." can't afford ".$nameProduct.PHP_EOL;
    }
    $input = explode(" ",readline());
}
foreach ($peoples as $people){
    $bag = $people->getBagOfProducts();
    $outputBag = [];
    foreach ($bag as $b){
        $outputBag[] = $b->name;
    }
    if (count($outputBag)!=0){
        echo $people->getName()." - ".implode(",",$outputBag).PHP_EOL;
    } else{
        echo $people->getName()." - Nothing bought".PHP_EOL;
    }
}
