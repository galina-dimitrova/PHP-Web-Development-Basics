<?php
class Book{
    private $title;
    private $author;
    private $price;

    /**
     * Book constructor.
     * @param $title
     * @param $author
     * @param $price
     */
    public function __construct($author, $title, $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    private function setTitle($title): void
    {
        if (strlen($title)<3){
            echo "Title not valid!";
            exit();
        }else {
            $this->title = $title;
        }
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    private function setAuthor($author): void
    {
        $name = explode(" ", $author)[1];
        if (is_numeric($name[0])) {
            echo "Author not valid!";
            exit();
        } else {
            $this->author = $author;
        }
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    private function setPrice($price): void
    {
        if ($price<=0){
            echo "Price not valid!";
            exit();
        }
        $this->price = $price;
    }

    public function __toString()
    {
        return "OK".PHP_EOL.$this->getPrice();
    }
}

class GoldenEditionBook extends Book {
    public $type;
    public function __construct($author, $title, $price, $type)
{
    parent::__construct($author, $title, $price);
    $this->type = $type;
}

    public function getPrice()
    {
        return parent::getPrice()*1.3;
    }
}

$name = readline();
$title = readline();
$price = readline();
$type = readline();
switch ($type) {
    case "GOLD":
        $book = new GoldenEditionBook($name, $title, $price, $type);
        echo $book;
        break;
    case  "STANDARD":
        $book = new Book($name, $title, $price);
        echo $book;
        break;
    default:
        echo "Type is not valid!";
        break;
}
