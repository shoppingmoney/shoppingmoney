<?php

class Connection {

    //put your code here
    private $servername = "localhost";
    private $username = "shopping_demo";
    private $password = "Buoyant@123";
    private $dbname = "shopping_demo";
    public $conn;

    public function __construct() {

        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "connect";
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

}
?>

