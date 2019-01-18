<?php
class Vehicle{
    private $doors;
    private $color;

    /**
     * Vehicle constructor.
     * @param $numDoors
     * @param $color
     */
    public function __construct($numDoors, $color)
    {
        $this->setDoors($numDoors);
        $this->setColor($color);
    }

    /**
     * @return mixed
     */
    public function getDoors()
    {
        return $this->doors;
    }

    /**
     * @param mixed $doors
     */
    public function setDoors($doors): void
    {
        $this->doors = $doors;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function __get($name)
    {
        if (isset($this->{$name})) {
            return $this->{$name};
        } else {
            return 'property doesn`t exist'; // ne mi go izpisva
        }
    }

    public function paint($newColor){
        return $this->setColor($newColor);
    }
}
