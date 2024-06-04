<?php
class Database {
    public $servername = "localhost";
    public $username = "root";
    public $password = "094492";
    public $databaseName = "web";
    public $conn = null;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->databaseName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        //echo "Connected successfully<br>";
    }

    public function executeQuery($query) {
        return $this->conn->query($query);
    }
}
?>