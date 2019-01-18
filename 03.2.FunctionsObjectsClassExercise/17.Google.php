<?php
class Person
{
    public $name;
    public $company;
    public $pokemones;
    public $parents;
    public $childrens;
    public $car;

    /**
     * Person constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->company = null;
        $this->pokemones = [];
        $this->parents = [];
        $this->childrens = [];
        $this->car = null;
    }

    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemones[] = $pokemon;
    }

    public function addParent(PersonParent $parent)
    {
        $this->parents[] = $parent;
    }

    public function addChildren(Children $children)
    {
        $this->childrens[] = $children;
    }

    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    public function setCar(Car $car): void
    {
        $this->car = $car;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return array
     */
    public function getPokemones(): array
    {
        return $this->pokemones;
    }

    /**
     * @return array
     */
    public function getParents(): array
    {
        return $this->parents;
    }

    /**
     * @return array
     */
    public function getChildrens(): array
    {
        return $this->childrens;
    }

    /**
     * @return null
     */
    public function getCar()
    {
        return $this->car;
    }

    public function __toString()
    {
        if (count($this->pokemones)!=0) {
            $pokOut = "\n".implode("\n", $this->getPokemones());
        } else {
            $pokOut ="";
        }
        if (count($this->parents)!=0) {
            $parOut = "\n".implode("\n",$this->getParents());
        } else {
            $parOut="";
        }
        if (count($this->childrens)!=0) {
            $childOut = "\n".implode("\n", $this->getChildrens());
        } else {
            $childOut = "";
        }
        if ($this->car!=null) {
            $carOut = "\n".$this->getCar();
        } else {
            $carOut = "";
        }
        if ($this->company!=null) {
            $compOut = "\n".$this->getCompany();
        } else {
            $compOut = "";
        }
        return
"{$this->getName()}
Company:{$compOut}
Car:{$carOut}
Pokemon:{$pokOut}
Parents:{$parOut}
Children:{$childOut}";
    }
}
class Company {
    public $name;
    public $department;
    public $salary;

    /**
     * Company constructor.
     * @param $name
     * @param $department
     * @param $salary
     */
    public function __construct(string $name, string $department, float $salary)
    {
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    public function __toString()
    {
        $saleryFormat = number_format($this->getSalary(), 2);
        return "{$this->getName()} {$this->getDepartment()} {$saleryFormat}";
    }
}
class Car {
    public $model;
    public $speed;

    /**
     * Car constructor.
     * @param $model
     * @param $speed
     */
    public function __construct(string $model, string $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getSpeed(): string
    {
        return $this->speed;
    }

    public function __toString()
    {
        return "{$this->getModel()} {$this->getSpeed()}";
    }

}
class Pokemon {
    public $name;
    public $type;

    /**
     * Pokemon constructor.
     * @param $name
     * @param $type
     */
    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function __toString()
    {
        return "{$this->getName()} {$this->getType()}";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
class PersonParent
{
    public $name;
    public $birthday;

    /**
     * PersonParent constructor.
     * @param $name
     * @param $birthday
     */
    public function __construct(string $name, string $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function __toString()
    {
        return "{$this->getName()} {$this->getBirthday()}";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }
}
class Children {
    public $name;
    public $birthday;

    /**
     * Children constructor.
     * @param $name
     * @param $birthday
     */
    public function __construct(string $name, string $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function __toString()
    {
        return "{$this->getName()} {$this->getBirthday()}";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }
}
$persons = [];
$input = readline();
while ($input!="End") {
    $data = explode(" ", $input);
    $personName = $data[0];
    if (!array_key_exists($personName, $persons)) {
        $person = new Person($personName);
        $persons[$personName] = $person;
    }
    $token = $data[1];
    switch ($token) {
        case "company":
            $company = new Company($data[2], $data[3], (floatval($data[4])));
            $persons[$personName]->setCompany($company);
            break;
        case "pokemon":
            $pokemon = new Pokemon($data[2], $data[3]);
            $persons[$personName]->addPokemon($pokemon);
            break;
        case "parents":
            $parent = new PersonParent($data[2], $data[3]);
            $persons[$personName]->addParent($parent);
            break;
        case "children":
            $child = new Children($data[2], $data[3]);
            $persons[$personName]->addChildren($child);
            break;
        case "car":
            $car = new Car($data[2], $data[3]);
            $persons[$personName]->setCar($car);
            break;
    }
    $input= readline();
}
$searchName = readline();
foreach ($persons as $person) {
    if ($person->name == $searchName) {
        echo $person;
    }
}