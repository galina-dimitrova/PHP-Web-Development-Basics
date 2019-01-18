<?php
class Car {
    public $model;
    public $engine;
    public $weight;
    public $color;

    public function __construct($model, $engine, $weight, $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model): void
    {
        $this->model = $model;
    }

    public function getEngine()
    {
        return $this->engine;
    }

    public function setEngine($engine): void
    {
        $this->engine = $engine;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color): void
    {
        $this->color = $color;
    }
}

class Engine {
    public $model;
    public $power;
    public $displacement;
    public $efficiency;

    public function __construct($model, $power, $displacement, $efficiency)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model): void
    {
        $this->model = $model;
    }

    public function getPower()
    {
        return $this->power;
    }

    public function setPower($power): void
    {
        $this->power = $power;
    }

    public function getDisplacement()
    {
        return $this->displacement;
    }

    public function setDisplacement($displacement): void
    {
        $this->displacement = $displacement;
    }

    public function getEfficiency()
    {
        return $this->efficiency;
    }

    public function setEfficiency($efficiency): void
    {
        $this->efficiency = $efficiency;
    }

    public function __toString()
    {
        return"Power: {$this->getPower()}\n
        Displacement: {$this->getDisplacement()}\n
        Efficiency: {$this->getEfficiency()}\n";
    }
}

$engines = array();
$cars = array();
$n = intval(readline());
while ($n-- >0) {
    $input = explode(" ", readline());
    $model = $input[0];
    $power = $input[1];
    if (count($input)==3){
        if (is_numeric($input[2])) {
            $displacement = $input[2];
            $efficiency = "n/a";
        } else {
            $displacement = "n/a";
            $efficiency = $input[2];
        }
    } elseif(count($input)==4) {
        $displacement = $input[2];
        $efficiency = $input[3];
    } else {
        $displacement = "n/a";
        $efficiency = "n/a";
    }
    $engine = new Engine($model, $power, $displacement, $efficiency);
    $engines[] = $engine;
}
$n = intval(readline());
while ($n-- >0) {
    $input = explode(" ", readline());
    $model = $input[0];
    $engine = $input[1];
    if (count($input)==3){
        if (is_numeric($input[2])) {
            $weight = $input[2];
            $color = "n/a";
        } else {
            $weight = "n/a";
            $color = $input[2];
        }
    } elseif(count($input)==4) {
        $weight = $input[2];
        $color = $input[3];
    } else {
        $weight = "n/a";
        $color = "n/a";
    }
    $car = new Car($model, $engine, $weight, $color);
    $cars[] = $car;
}
foreach ($cars as $car) {
    echo
    "$car->model: 
  $car->engine:";
    foreach ($engines as $engine) {
        if ($car->engine==$engine->model) {
            echo "
    Power: $engine->power
    Displacement: $engine->displacement
    Efficiency: $engine->efficiency\n";
        }
    }
  echo "  Weight: $car->weight 
  Color: $car->color\n";
}
