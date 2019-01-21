<?php
interface Keyboard {
    public function pressKey();
    public function changeStatus();
}
interface Mouse {
    public function move();
    public function click();
}
interface TouchPad {
    public function moveFinger();
    public function click();
}

abstract class Computer {
    protected $processor;
    protected $ram;
}
abstract class Mobile {
    protected $operator;
    /**
     * @var bool
     */
    protected $canCall;
    protected $battery;
}

class DesktopComputer extends Computer implements Keyboard {
    public function pressKey()
    {
        // TODO: Implement pressKey() method.
    }
    public function changeStatus()
    {
        // TODO: Implement changeStatus() method.
    }
}
class Laptop extends Computer implements Mouse {
    protected $battery;

    public function click()
    {
        // TODO: Implement click() method.
    }
    public function move()
    {
        // TODO: Implement move() method.
    }
}
class Tablet extends Mobile implements TouchPad {
    protected $stdResolution;
    public function moveFinger()
    {
        // TODO: Implement moveFinger() method.
    }
    public function click()
    {
        // TODO: Implement click() method.
    }
    public function writeText()
    {

    }

}
class MobilePhone extends Mobile implements TouchPad {
    protected $size;
    public function moveFinger()
    {
        // TODO: Implement moveFinger() method.
    }
    public function click()
    {
        // TODO: Implement click() method.
    }
    public function writeText()
    {

    }
}
