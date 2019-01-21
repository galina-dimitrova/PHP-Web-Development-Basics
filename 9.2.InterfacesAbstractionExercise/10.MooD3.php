<?php
interface ICharacters {
    public function setSpecialPoints($points);
    public function setHashedPassword($userName);
}
abstract class Characters{
    /**
     * @var string
     */
    protected $userName;
    /**
     * @var string
     */
    protected $hashedPassword;
    /**
     * @var int
     */
    protected $level;
    protected $specialPoints;
    protected $type;

    /**
     * Characters constructor.
     * @param string $userName
     * @param int $level
     * @param string $type
     */
    public function __construct(string $userName, int $level, string $type)
    {
        $this->userName = $userName;
        $this->level = $level;
        $this->type = $type;
    }
    public function __toString()
    {
        return "\"".$this->userName."\" | \"".$this->hashedPassword."\" -> ".$this->type.PHP_EOL.$this->specialPoints*$this->level;
    }
}
class Demon extends Characters implements ICharacters{

    /**
     * Demon constructor.
     * @param string $userName
     * @param int $level
     * @param string $type
     * @param $specialPoints
     */
    public function __construct(string $userName, int $level, string $type, $specialPoints)
    {
        parent::__construct($userName, $level, $type);
        $this->setSpecialPoints($specialPoints);
        $this->setHashedPassword($userName);
    }

    /**
     * @param float $specialPoints
     */
    public function setSpecialPoints($specialPoints): void
    {
        $this->specialPoints = floatval($specialPoints);
    }

    public function setHashedPassword($username)
    {
        $this->hashedPassword = strlen($username)*217;
    }
    public function __toString()
    {
        return "\"".$this->userName."\" | \"".$this->hashedPassword."\" -> ".$this->type.PHP_EOL.number_format($this->specialPoints*$this->level, 1, '.', '');
    }
}
class Archangel extends Characters implements ICharacters{

    /**
     * Archangel constructor.
     * @param string $userName
     * @param int $level
     * @param string $type
     * @param $specialPoints
     */
    public function __construct(string $userName, int $level, string $type, $specialPoints)
    {
        parent::__construct($userName, $level, $type);
        $this->setSpecialPoints($specialPoints);
        $this->setHashedPassword($userName);
    }
    /**
     * @param int $specialPoints
     */
    public function setSpecialPoints($specialPoints): void
    {
        $this->specialPoints = intval($specialPoints);
    }
    public function setHashedPassword($username)
    {
        $this->hashedPassword = strrev($username).strlen($username)*21;
    }
}

$input = explode(" | ", readline());
$userName = $input[0];
$characterType = $input[1];
$points = $input[2];
$level = intval($input[3]);
if ($characterType == "Demon") {
    $demon = new Demon($userName, $level, $characterType, $points);
    echo $demon;
} elseif ($characterType == "Archangel") {
    $archangel = new Archangel($userName, $level, $characterType, $points) ;
    echo $archangel;
}