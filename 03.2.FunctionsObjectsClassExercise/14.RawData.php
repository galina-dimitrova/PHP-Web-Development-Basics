<?php
class Car {
   public $model;
   public $engine;
   public $cargo;
   public $tires;

    /**
     * Car constructor.
     * @param $model
     * @param $engine
     * @param $cargo
     */

    public function __construct(string $model, Engine $engine, Cargo $cargo)
    {
        $this->setModel($model);
        $this->setEngine($engine);
        $this->setCargo($cargo);
        $this->tires = [];
    }

    public function checkPressure(Tire $tire) {
        if ($tire->getPressure() < 1) {
            return true;
        } else {
            return false;
        }
    }

    public function addTires(Tire $tire) {
        $this->tires[] = $tire;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    private function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @param mixed $engine
     */
    private function setEngine($engine): void
    {
        $this->engine = $engine;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     */
    private function setCargo($cargo): void
    {
        $this->cargo = $cargo;
    }

    /**
     * @return mixed
     */
    public function getTires()
    {
        return $this->tires;
    }
}
class Engine {
    private $speed;
    private $power;

    /**
     * Engine constructor.
     * @param $speed
     * @param $power
     */
    public function __construct(int $speed, int $power)
    {
        $this->setSpeed($speed);
        $this->setPower($power);
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     */
    private function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    private function setPower(int $power): void
    {
        $this->power = $power;
    }

}
class Cargo {
    private $weight;
    private $type;

    /**
     * Cargo constructor.
     * @param $weight
     * @param $type
     */
    public function __construct(int $weight, string $type)
    {
        $this->setWeight($weight);
        $this->setType($type);
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    private function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    private function setType(string $type): void
    {
        $this->type = $type;
    }

}
class Tire {
    private $pressure;
    private $age;

    /**
     * Tire constructor.
     * @param $pressure
     * @param $age
     */
    public function __construct(float $pressure, int $age)
    {
        $this->setPressure($pressure);
        $this->setAge($age);
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }

    /**
     * @param float $pressure
     */
    private function setPressure(float $pressure): void
    {
        $this->pressure = $pressure;
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
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

}

$n = intval(readline());
$cars = [];
for ($i = 0; $i<$n; $i++) {
    $input = explode(" ", readline());
    $engine = new Engine(intval($input[1]), intval($input[2]));
    $cargo = new Cargo(intval($input[3]), $input[4]);
    $car = new Car($input[0], $engine, $cargo);
    $tire1 = new Tire(floatval($input[5]), intval($input[6]));
    $car->addTires($tire1);
    $tire2 = new Tire(floatval($input[7]), intval($input[8]));
    $car->addTires($tire2);
    $tire3 = new Tire(floatval($input[9]), intval($input[10]));
    $car->addTires($tire3);
    $tire4 = new Tire(floatval($input[11]), intval($input[12]));
    $car->addTires($tire4);
    $cars[] = $car;
}
$command = readline();
switch ($command) {
    case "fragile":
        foreach ($cars as $car) {
            if ($car->getCargo()->getType()=="fragile") {
                foreach ($car->getTires() as $tire) {
                    if ($car->checkPressure($tire) == true) {
                        echo $car->getModel().PHP_EOL;
                        break;
                    }
                }
            }
        }
        break;
    case "flamable":
        foreach ($cars as $car) {
            if ($car->getCargo()->getType()=="flamable") {
                if ($car->getEngine()->getPower()>250) {
                    echo $car->getModel().PHP_EOL;
                }
            }
        }
        break;
}

