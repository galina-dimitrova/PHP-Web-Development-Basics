<?php
class Cat{
    private $name;
    private $breed;
    private $characteristic;

    /**
     * Cat constructor.
     * @param $name
     * @param $breed
     * @param $characteristic
     */
    public function __construct($name, $breed, $characteristic)
    {
        $this->name = $name;
        $this->breed = $breed;
        $this->characteristic = $characteristic;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->breed." ".$this->name." ".$this->characteristic;
    }

}                ///ee mn lesno bez iziskvaniq...
$cats = [];
$input = readline();
while ($input!="End") {
    $input1 = explode(" ", $input);
    $breed = $input1[0];
    $name = $input1[1];
    $characteristic = $input1[2];
    $cat = new Cat($name, $breed, $characteristic);
    $cats[] = $cat;
    $input = readline();
}
$search = readline();
foreach ($cats as $c){
    if ($c->name==$search){
        echo $c;
    }
}