<?php
class Gandalf{
    private $happinessP;
    private $mood;

    /**
     * Gandalf constructor.
     * @param $happinessP
     */
    public function __construct($happinessP)
    {
        $this->setHappinessP($happinessP);
        $this->setMood($happinessP);
    }

    /**
     * @return mixed
     */
    public function getHappinessP()
    {
        return $this->happinessP;
    }

    /**
     * @return mixed
     */
    public function getMood()
    {
        return $this->mood;
    }


    /**
     * @param mixed $happinessP
     */
    public function setHappinessP(int $happinessP): void
    {
        $this->happinessP = $this->getHappinessP()+ $happinessP;  //mn me symnqva...
    }

    /**
     * @param mixed $points
     */
    public function setMood(int $points): void
    {
        //$mood = "";
        if ($points<-5){
            $mood = "Angry";
        } elseif ($points<=0){
            $mood = "Sad";
        } elseif ($points<=15) {
            $mood = "Happy";
        } else{
            $mood = "PHP";
        }
        $this->mood = $mood;
    }


}
class Food{
    /**
     * @var integer
     */
    private $point;

    /**
     * Food constructor.
     * @param string $food
     */
    public function __construct(string $food)
    {
        $this->setPoint($food);
    }

    /**
     * @return int
     */

    public function getPoint(): int
    {
        return $this->point;
    }

    /**
     * @param string $food
     */
    private function setPoint(string $food): void
    {
        switch ($food){
            case "cram":
                $point=2;
                break;
            case "lembas":
                $point = 3;
                break;
            case  "apple":
                $point = 1;
                break;
            case "melon":
                $point = 1;
                break;
            case "honeycake":
                $point = 5;
                break;
            case "mushrooms":
                $point = -10;
                break;
            default:
                $point = -1;
                break;
        }
        $this->point = $point;
    }

}
$gMood = new Gandalf(0);
$input = explode(",", strtolower(readline()));
foreach ($input as $food){
    $eat = new Food($food);
    $hPoint = $eat->getPoint();
    $gMood->setHappinessP($hPoint);
    $gMood->setMood($gMood->getHappinessP());
}
echo $gMood->getHappinessP().PHP_EOL;
echo $gMood->getMood();
