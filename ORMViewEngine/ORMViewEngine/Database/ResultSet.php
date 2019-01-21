<?php
namespace Database;
class ResultSet implements ResultSetInterface
{
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }
    public function fetchAll(?string $className)  :\Generator
    {
        while ($row=$this->pdoStatement->fetchObject($className))
            yield $row;
    }
}