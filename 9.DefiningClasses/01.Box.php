<?php
class Box {
    private $length;
    private $width;
    private $height;

    /**
     * Box constructor.
     * @param $length
     * @param $width
     * @param $height
     */
    public function __construct($length, $width, $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @return mixed
     */
    private function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    private function setLength($length): void
    {
        if ($length>0) {
            $this->length = $length;
        }else {
            echo "Length cannot be zero or negative.";
            exit();
        }
    }

    /**
     * @return mixed
     */
    private function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    private function setWidth($width): void
    {
        if ($width>0) {
            $this->width = $width;
        } else {
            echo "Width cannot be zero or negative.";
            exit();
        }
    }

    /**
     * @return mixed
     */
    private function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    private function setHeight($height): void
    {
        if ($height>0) {
            $this->height = $height;
        }else {
            echo "Height cannot be zero or negative.";
            exit();
        }
    }

    public function getSurfaceArea(){
        $l = $this->getLength();
        $w = $this->getWidth();
        $h = $this->getHeight();
           $surfaceArea = 2*($l*$w+$l*$h+$w*$h);
           return number_format($surfaceArea, 2, '.', '');
    }

    public function getLateralSurface(){
        $l = $this->getLength();
        $w = $this->getWidth();
        $h = $this->getHeight();
        $lateralSurfaceArea = 2*($l*$h+$w*$h);
        return number_format($lateralSurfaceArea, 2, '.', '');
    }

    public function getVolume() {
        $l = $this->getLength();
        $w = $this->getWidth();
        $h = $this->getHeight();
        $volume = $l*$w*$h;
        return number_format($volume, 2, '.', '');
    }
}

$l = floatval(readline());
$w = floatval(readline());
$h = floatval(readline());

$box = new Box($l, $w, $h);

echo "Surface Area - ".$box->getSurfaceArea().PHP_EOL;
echo "Lateral Surface Area - ".$box->getLateralSurface().PHP_EOL;
echo "Volume - ".$box->getVolume().PHP_EOL;
