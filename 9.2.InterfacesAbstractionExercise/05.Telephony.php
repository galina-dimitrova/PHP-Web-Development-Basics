<?php
interface Call
{
    public function call(string $num) : string ;
}
interface Browse{
    public function browse(string $site) : string ;
}
class SmartPhone implements Call,Browse {

    /**
     * @param string $num
     * @return Call|string
     * @throws Exception
     */
    public function call(string $num) : string
    {
        if (preg_match_all("/[^0-9]+/",$num)){
            throw new Exception("Invalid number!".PHP_EOL);
        }
        return "Calling... $num".PHP_EOL;
    }

    /**
     * @param string $site
     * @return string
     * @throws Exception
     */
    public function browse(string $site) : string
    {
        if (preg_match_all("/[0-9]+/", $site)){
            throw new Exception("Invalid URL!".PHP_EOL);
        }
        return "Browsing: $site!".PHP_EOL;
    }
}

$phone = new SmartPhone();
$phones = explode(" ", readline());
$sites = explode(" ", readline());

foreach ($phones as $num){
    try {
        echo $phone->call($num);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
foreach ($sites as $site){
    try {
        echo $phone->browse($site);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}