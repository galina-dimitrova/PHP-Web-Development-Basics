<?php
namespace Database;
class PDOPreparedStatement implements PreparedStatementInterface
{
    private $pdoStatement;
    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }
    public function execute(array $params = []): ResultSetInterface
    {
        $this->pdoStatement->execute($params);
        return new ResultSet($this->pdoStatement);
    }
}