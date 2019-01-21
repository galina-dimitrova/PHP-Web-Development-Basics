<?php
interface Area {
    public function getSurface();
}

interface Circumference {
    public function getCircumference();
}

class Circle implements Area,Circumference {
    private $radius;

    /**
     * Circle constructor.
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    public function getCircumference()
    {
        return $circ = 2*pi()*$this->radius;
    }

    public function getSurface()
    {
        $r = $this->getRadius();
        return $area = pow($r, 2)*pi();
    }

    public function __toString()
    {
        return "Circle with radius = ".$this->getRadius()." mm:\nArea = ".$this->getSurface()." mm\nCircumference = ".$this->getCircumference()." mm";
    }

}

class Rectangle implements Area {
    private $a;
    private $b;

    /**
     * Rectangle constructor.
     * @param $a
     * @param $b
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getSurface()
    {
        return $area = $this->a*$this->b;
    }

    public function __toString()
    {
        return "Rectangle, width = ".$this->a."mm, height = ".$this->b."mm, areea = ".$this->getSurface()."mm";
    }
}

$myCircle = new Circle(readline());
//[$a,$b] = (explode(" ", readline()));
//$myRec = new Rectangle($a, $b);

echo $myCircle;
