<?php
include 'Vehicle.php';

class Car extends Vehicle {
    public $brand;
    public $model;
    public $year;

    /**
     * Car constructor.
     * @param $doors
     * @param $color
     * @param $brand
     * @param $model
     * @param $year
     */
    public function __construct($doors, $color, $brand, $model, $year)
    {
        parent::__construct($doors, $color);
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    /**
     * @param $paint_color
     */
    public function paint($paint_color){
        $this->color = $paint_color;
    }
}

$input = explode(" ", readline());
$color = $input[0];
$brand = $input[1];
$model = $input[2];
$year = $input[3];
$doors = $input[5];
$paint = readline();
$result = readline();
$myCar = new Car($doors, $color, $brand, $model, $year);
$result;



