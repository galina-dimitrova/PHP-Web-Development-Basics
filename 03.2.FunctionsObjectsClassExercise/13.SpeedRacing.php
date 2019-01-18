<?php
class Car {
    private $model;
    private $fuelAmount;
    private $fuelCost;
    private $distance;

    /**
     * Car constructor.
     * @param $model
     * @param $fuelAmount
     * @param $fuelCost
     */
    public function __construct(string $model, float $fuelAmount, float $fuelCost)
    {
        $this->setModel($model);
        $this->setFuelAmount(number_format($fuelAmount, 2, '.', ''));
        $this->setFuelCost(number_format($fuelCost, 2, '.', ''));
        $this->distance = 0;
    }

    public function checkTravel($travel) {
        $canTravel = number_format($this->getFuelAmount()/$this->getFuelCost(), 2, '.', '');
        if ($canTravel>=$travel) {
            $this->setDistance($this->getDistance()+$travel);
            $this->setFuelAmount(number_format($this->getFuelAmount()-$travel*$this->getFuelCost(), 2, '.', ''));
        } else {
            echo "Insufficient fuel for the drive".PHP_EOL;
        }

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
     * @return float
     */
    public function getFuelAmount(): float
    {
        return $this->fuelAmount;
    }

    /**
     * @param float $fuelAmount
     */
    private function setFuelAmount(float $fuelAmount): void
    {
        $this->fuelAmount = $fuelAmount;
    }

    /**
     * @return float
     */
    public function getFuelCost(): float
    {
        return $this->fuelCost;
    }

    /**
     * @param float $fuelCost
     */
    private function setFuelCost(float $fuelCost): void
    {
        $this->fuelCost = $fuelCost;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    private function setDistance(int $distance): void
    {
        $this->distance = $distance;
    }


}
$n = intval(readline());
$cars = [];
for ($i = 0; $i < $n; $i++) {
    $carInfo = explode(" ", readline());
    $model = $carInfo[0];
    $fuelAmount = floatval($carInfo[1]);
    $fuelCost = floatval($carInfo[2]);
    $car = new Car($model, $fuelAmount, $fuelCost);
    $cars[] = $car;
}
do {
    $input = explode(" ", readline());
    switch ($input[0]) {
        case "Drive":
            $model = $input[1];
            $travel = $input[2];
            foreach ($cars as $car) {
                if ($car->getModel() == $model) {
                    $car->checkTravel($travel);
                }
            }
            break;
        case "End":
            break;
    }
} while ($input[0] != "End");
foreach ($cars as $car) {
    $fuel = number_format($car->getFuelAmount(), 2, '.', '');
    $distance = $car->getDistance();
    echo "{$car->getModel()} {$fuel} {$distance}".PHP_EOL;
}