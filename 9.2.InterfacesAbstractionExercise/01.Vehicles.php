<?php
abstract class Vehicle{
    /**
     * @var float
     */
    protected $fuel;
    /**
     * @var float
     */
    protected $consumation;
    /**
     * @var float
     */
    protected $capacity;
    /**
     * Vehicle constructor.
     * @param float $fuel
     * @param float $consumation
     */

    protected $status;

    public function __construct(float $fuel, float $consumation, float $capacity)
    {
        $this->fuel = $fuel;
        $this->consumation = $consumation;
        $this->capacity = $capacity;
    }

    /**
     * @return float
     */
    public function getFuel(): float
    {
        if ($this->fuel<0){
            echo "Fuel must be a positive number".PHP_EOL;
        }
        return $this->fuel;
    }

    /**
     * @return float
     */
    abstract public function getConsumation(): float;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }


    function refuel(float $fuel)
    {
        if ($this->capacity>=$fuel){
            return $this->fuel += $fuel;
        } else {
            echo "Cannot fit fuel in tank".PHP_EOL;
        }
    }

    /**
     * @param float $distance
     * @return float|int
     * @throws Exception
     */
    function drive(float $distance)
    {
        $canDrive = $this->getFuel()/$this->getConsumation();
        if ($distance>$canDrive){
            $this->status=" needs refueling";
            return false;
        }
        $this->status = ' travelled '.$distance.' km';
        $this->fuel=$this->getFuel()-$distance*$this->getConsumation();
        return true;
    }

    ///**
    // * @param float $distance
    // * @return float|int
    // * @throws Exception
    // */
    //function driveEmpty(float $distance){
    //    $out = $this->drive($distance);
    //    return $out;
    //}
}

class Car extends Vehicle{

    /**
     * @return float
     */
    public function getConsumation(): float
    {
        return $this->consumation+0.9;
    }
}

class Truck extends Vehicle{

    /**
     * @return float
     */
    public function getConsumation(): float
    {
        return $this->consumation+1.6;
    }

    public function refuel(float $fuel): float
    {
        return $this->fuel += $fuel*0.95;
    }
}

class Bus extends Vehicle{
    public function getConsumation(): float
    {
        return $this->consumation;
    }

    /**
     * @param float $distance
     * @return float|int
     * @throws Exception
     */
    function drive(float $distance){

        $canDrive = $this->getFuel()/($this->getConsumation()+1.4);
        if ($distance>$canDrive){
            $this->status=" needs refueling";
            return false;
        }
        $this->status = ' travelled '.$distance.' km';
        $this->fuel=$this->getFuel()-$distance*($this->getConsumation()+1.4);
        return true;
    }
    /**
     * @param float $distance
     * @return float|int
     * @throws Exception
     */
    function driveEmpty(float $distance){

        $canDrive = $this->getFuel()/$this->getConsumation();
        if ($distance>$canDrive){
            $this->status=" needs refueling";
            return false;
        }
        $this->status = ' travelled '.$distance.' km';
        $this->fuel=$this->getFuel()-$distance*($this->getConsumation());
        return true;
    }
}

class Application
{
    /**
     * @var Vehicle[]
     */
    private $vehicles = [];

    /**
     * @throws Exception
     */
    public function readData(){
        for ($i = 0; $i<3; $i++) {
            [$type, $fuel, $consumation, $tank] = explode(" ", readline());
            if (!class_exists($type)) {
                throw new Exception("Non valid type");
            }
            $this->vehicles[$type] = new $type($fuel, $consumation, $tank);
        }
    }

    /**
     * @param int $n
     * @throws Exception
     */
    public function printData($n){
        for ($i = 0; $i<$n; $i++) {
            $input = readline("Type operation:");
            [$operation, $type, $data] = explode(" ", $input);
            if (!isset($this->vehicles[$type])) {
                throw new Exception("Non valid type");
            }
            if (!is_callable([$this->vehicles[$type], $operation])) {
                throw new Exception("Non valid operation");
            }
            $this->vehicles[$type]->$operation($data);
            if ($operation != "Refuel") {
                echo $type . $this->vehicles[$type]->getStatus() . PHP_EOL;
            }
        }
    }

    public function printFuel(){
        foreach ($this->vehicles as $vehicle => $value){
            echo $vehicle.": ".number_format($value->getFuel(), 2, '.', '').PHP_EOL;
        }
    }
}

$start = new Application();
try {
    $start->readData();
} catch (Exception $e) {
    $e->getMessage();
}
$n = readline();
try {
    $start->printData($n);
} catch (Exception $e) {
    $e->getMessage();
}

$start->printFuel();