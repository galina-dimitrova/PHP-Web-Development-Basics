<?php
class Pizza{
    private $name;
    private $numToppings;
    private $calories;

    /**
     * Pizza constructor.
     * @param $name
     * @param $numToppings
     * @param $calories
     * @throws Exception
     */
    public function __construct($name, $numToppings, $calories=0)
    {
        $this->setName($name);
        $this->setNumToppings($numToppings);
        $this->calories=$calories;
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
    public function getNumToppings()
    {
        return $this->numToppings;
    }

    /**
     * @return mixed
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * @param mixed $calories
     */
    public function setCalories($calories): void
    {
        $this->calories += $calories;
    }

    /**
     * @param mixed $name
     * @throws Exception
     */
    public function setName($name): void
    {
        if (strlen($name)>0&&strlen($name)<=15){
            $this->name = $name;
        }else{
            throw new Exception("Pizza name should be between 1 and 15 symbols.");
        }
    }

    /**
     * @param mixed $numToppings
     * @throws Exception
     */
    public function setNumToppings($numToppings): void
    {
        if (intval($numToppings)>=0&&intval($numToppings)<=10){
            $this->numToppings = $numToppings;
        }else{
            throw new Exception("Number of toppings should be in range [0..10].");

        }
    }

    public function __toString()
    {
        return $this->getName()." - ".number_format($this->getCalories(), 2, '.', '')." Calories.";
    }
}

class Dough{
    private $calories;

    /**
     * Dough constructor.
     * @param $type
     * @param $additional
     * @param $grams
     * @throws Exception
     */
    public function __construct($type, $additional, $grams)
    {
        $this->setCalories($type, $additional, $grams);
    }

    /**
     * @return mixed
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * @param $type
     * @param $addition
     * @param $grams
     * @throws Exception
     */
    public function setCalories($type, $addition, $grams): void
    {
            switch (strtolower($type)) {
                case "white":
                    $mody = 1.5;
                    break;
                case "wholegrain":
                    $mody = 1.0;
                    break;
                default:
                    echo "Invalid type of dough.";
                    exit();
            }
            switch (strtolower($addition)) {
                case "crispy":
                    $mody1 = 0.9;
                    break;
                case "chewy":
                    $mody1 = 1.1;
                    break;
                case "homemade":
                    $mody1 = 1.0;
                    break;
                default:
                    echo "Invalid type of dough.";
                    exit();
            }
        if ($grams>0&&$grams<=200) {
            $calories = number_format((2*$grams)*$mody*$mody1, 2, '.','');
            $this->calories = $calories;
        } else{
            throw new Exception("Dough weight should be in the range [1..200].");
        }
    }
}

class Topping{
    private $calories;

    /**
     * Topping constructor.
     * @param $type
     * @param $grams
     * @throws Exception
     */
    public function __construct($type, $grams)
    {
        $this->setCalories($type, $grams);
    }

    /**
     * @return mixed
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * @param $type
     * @param $grams
     * @throws Exception
     */
    public function setCalories($type, $grams): void
    {
            switch (strtolower($type)) {
                case "meat":
                    $mody = 1.2;
                    break;
                case "veggies":
                    $mody = 0.8;
                    break;
                case "cheese":
                    $mody = 1.1;
                    break;
                case "sauce":
                    $mody = 0.9;
                    break;
                default:
                    echo "Cannot place $type on top of your pizza.";
                    exit();
            }
        if ($grams>0&&$grams<=50) {
            $calories = number_format((2*$grams)*$mody, 2, '.','');
            $this->calories = $calories;
        } else{
            throw new Exception("$type weight should be in the range [1..50].");
        }
    }
}


$info = readline();
while ($info!="END"){
    $input = explode(" ", $info);
    if ($input[0]=="Pizza") {
        try {
            $pizza = new Pizza($input[1], $input[2]);
            $input = explode(" ", readline());
            if ($input[0] == "Dough") {
                $type = $input[1];
                $addition = $input[2];
                $grams = $input[3];
                try {
                    $dough = new Dough($type, $addition, $grams);
                    $pizza->setCalories($dough->getCalories());
                } catch (Exception $e) {
                    echo $e->getMessage() . PHP_EOL;
                    exit();
                }
            }
            for ($i = 0; $i < $pizza->getNumToppings(); $i++) {
                $input = explode(" ", readline());
                if ($input[0] == "Topping") {
                    $type = $input[1];
                    $grams = $input[2];
                    try {
                        $topping = new Topping($type, $grams);
                        $pizza->setCalories($topping->getCalories());
                    } catch (Exception $e) {
                        echo $e->getMessage() . PHP_EOL;
                        exit();
                    }
                }
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            exit();
        }
    }
$info = readline();
}
echo $pizza;

