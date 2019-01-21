<?php
class Product
{

    // TODO

    // database connection and table name
    private $conn;
    private $table_name = "products";

    // object properties
    public $id;
    public $name;
    public $price;
    public $description;
    public $category_id;
    public $timestamp;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // create product
    function create()
    {

        $stmt = $this->conn->prepare("INSERT INTO
                    " . $this->table_name . "
                SET
                    name = ?, price = ?, description = ?,
                        category_id = ?, created = ?");

        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');

        // bind values
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->price);
        $stmt->bindParam(3, $this->description);
        $stmt->bindParam(4, $this->category_id);
        $stmt->bindParam(5, $this->timestamp);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function readAll($from_record_num, $records_per_page){

        $query = "SELECT
            id, name, description, price, category_id
        FROM
            " . $this->table_name . "
        ORDER BY
            name ASC
        LIMIT
            {$from_record_num}, {$records_per_page}";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

// used for paging products
    public function countAll() : int {
        return  $this->conn->query("select count(*) from $this->table_name")->fetchColumn();
    }

    function readOne() {

        $query = "SELECT
            name, price, description, category_id
        FROM
            " . $this->table_name . "
        WHERE
            id = ?
        LIMIT
            0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_id = $row['category_id'];
    }

    function update(){

        $query = "UPDATE
            " . $this->table_name . "
        SET
            name = ?,
            price = ?,
            description = ?,
            category_id  = ?
        WHERE
            id = ?";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->price);
        $stmt->bindParam(3, $this->description);
        $stmt->bindParam(4, $this->category_id);
        $stmt->bindParam(5, $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

    // delete the product
    function delete(){

        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

}

?>
