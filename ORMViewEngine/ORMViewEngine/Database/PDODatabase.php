<?php
namespace Database;
class PDODatabase implements DatabaseInterface
{
    private $pdo;
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function query(string $query): PreparedStatementInterface
    {
        $stm = $this->pdo->prepare($query);
        return new PDOPreparedStatement($stm);
    }

    public function getLastError()
    {
        // TODO: Implement getLastError() method.
    }

    public function getLastId()
    {
        // TODO: Implement getLastId() method.
    }
}