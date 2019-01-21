<?php
interface FerariInterf{
    public function useBrakes();
    public function pushGas();
}
class Ferrari implements FerariInterf {
    protected $driver;

    /**
     * Ferrari constructor.
     * @param $driver
     */
    public function __construct($driver)
    {
        $this->setDriver($driver);
    }

    /**
     * @param mixed $driver
     */
    public function setDriver($driver): void
    {
        $this->driver = $driver;
    }
    public function useBrakes()
    {
        echo "Brakes!";
    }
    public function pushGas()
    {
        echo "Zadu6avam sA!";
    }
    static $model = "488-Spider/Brakes!/Zadu6avam sA!/";

    public function __toString()
    {
        return static::$model.$this->driver;
    }
}

$name = readline();
$ferrari = new Ferrari($name);
echo $ferrari;