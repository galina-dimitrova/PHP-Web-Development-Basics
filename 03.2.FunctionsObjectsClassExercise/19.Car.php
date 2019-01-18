<?php
class Car {
    public $speed;
    public $fuel;
    public $fuelEconomy;

    /**
     * Car constructor.
     * @param $speed
     * @param $fuel
     * @param $fuelEconomy
     */
    public function __construct($speed, $fuel, $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
    }

    public function getFarDist ($dist) {
        $availD = ($this->getFuel()/$this->getFuelEconomy())*100;
        if ($availD<$dist) {
            return $availD;
        } else {
            return $dist;
        }
    }

    public function getNeedFuel ($dist) {
        $needF = $dist*$this->getFuelEconomy();
        if ($needF>$this->getFuel()) {
            $needF = $this->getFuel();
        }
        return $needF;
    }

    public function getNeedTime ($dist) {
        $time = $dist/$this->getSpeed()*60;
        $hours = intval($time/60);
        $min = $time%60;
        return "$hours hours and $min minutes";
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @return mixed
     */
    public function getFuelEconomy()
    {
        return $this->fuelEconomy;
    }


    /**
     * @return mixed
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * @param mixed $fuel
     */
    public function setFuel($fuel): void
    {
        $this->fuel += $fuel;
    }

}
$info = explode(" ", readline());
$car = new Car($info[0], $info[1], $info[2]);
$input = explode(" ", readline());
$distance = 0;
$totalD = 0.0;

do {
    switch ($input[0]) {
        case "Travel":
            $distance+=$input[1];
            break;
        case "Refuel":
            $car->setFuel($input[1]);
            break;
        case  "Distance":
            $totalD = number_format($car->getFarDist($distance), 1, '.', '');
            echo "Total Distance: {$totalD}\n";
            break;
        case "Time":
            $needTime = $car->getNeedTime($totalD);
            echo "Total Time: {$needTime}\n";
            break;
        case "Fuel":
            $remF = number_format($car->getFuel()-$car->getNeedFuel($distance), 1, '.', '');
            echo "Fuel left: {$remF} liters\n";
            break;
        //case "END":
         //   return;
    }
    $input = explode(" ", readline());
} while ($input[0] != "END");
return;

