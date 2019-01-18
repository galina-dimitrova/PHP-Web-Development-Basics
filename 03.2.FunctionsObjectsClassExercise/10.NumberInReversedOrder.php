<?php
$num = new DecimalNumber(readline());
$num->reverse();
class DecimalNumber {
    public $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function reverse() {
        $output = null;
        for ($i = strlen($this->number)-1; $i>=0; $i--) {
            $output.=$this->number[$i];
        }
        echo $output;
    }
}