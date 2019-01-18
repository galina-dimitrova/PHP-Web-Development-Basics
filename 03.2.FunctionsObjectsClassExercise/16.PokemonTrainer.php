<?php
class Trainer {
    public $name;
    public $badges;
    public $pokemones;

    public function __construct($name)
    {
        $this->name = $name;
        $this->badges = '0';
        $this->pokemones = [];
    }

    public function addPokemon(Pokemon $pokemon) {
        $this->pokemones[] = $pokemon;
    }

    public function numberPokemons() {
        $number = count($this->pokemones);
        foreach ($this->pokemones as $pokemone) {
            if ($pokemone->health<=0) {
                $number-=1;
            }
        }
        return $number;
    }

    public function __toString()
    {
        return "{$this->getName()} {$this->getBadges()} {$this->numberPokemons()}\n";
    }

    /**
     * @return mixed
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param mixed $badges
     */
    public function setBadges($badges): void
    {
        $this->badges = $badges;
    }

    /**
     * @return array
     */
    public function getPokemones(): array
    {
        return $this->pokemones;
    }

    /**
     * @param array $pokemones
     */
    public function setPokemones(array $pokemones): void
    {
        $this->pokemones[] = $pokemones;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}

class Pokemon {
    public $name;
    public $element;
    public $health;

    /**
     * Pokemon constructor.
     * @param $name
     * @param $element
     * @param $health
     */
    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $element
     */
    public function setElement(string $element): void
    {
        $this->element = $element;
    }

}

$trainers = [];
$pokemons = [];
$input = readline();
while ($input!="Tournament") {
    $data = explode(" ", $input);
    $trainerName = $data[0];
    $pokemonName = $data[1];
    $pokemonElement = $data[2];
    $pokemonHealth = (intval($data[3]));
    $pokemon = new Pokemon($pokemonName, $pokemonElement, $pokemonHealth);
    $pokemons[$pokemonName] = $pokemon;
    if (!array_key_exists($trainerName,$trainers)) {      //add trainer
        $trainer = new Trainer($trainerName);
        $trainers[$trainerName] = $trainer;
    }
    $trainers[$trainerName]->addPokemon($pokemon);       //add Trainers pokemon

    $input = readline();
}
$input = readline();
while ($input!="End") {
    $command = $input;
    foreach ($trainers as $trainer) {
        $checkPokemons = $trainer->getPokemones();
        $count = 0;
        foreach ($checkPokemons as $pokemon) {                 //add badge
            if (($pokemon->element == $command) && ($pokemon->health>0)) {
                $count+=1;
                $trainer->setBadges((intval($trainer->getBadges()))+1);
                break;
            }
        }
        if ($count==0) {                       //pokemon lose health
            foreach ($checkPokemons as $pokemon) {
                $pokemon->setHealth($pokemon->getHealth()-10);
            }
        }
    }
    $input = readline();
}

usort($trainers, function (Trainer $p1, Trainer $p2) {
    return $p2->getBadges() <=> $p1->getBadges();
});
foreach ($trainers as $trainer) {
    echo $trainer;
}