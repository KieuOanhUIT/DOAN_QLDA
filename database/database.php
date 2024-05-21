<?php
include 'config.php';
class Database{
    public $servername = servername;
    public $username = username;
    public $password = password;
    public $databaseName = databaseName;
    public $conn;

    public function __construct(){
        $this->connect();
    }

    public function connect(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->databaseName);
        if ($this->conn->connect_error) {
            die("Connection failed: ". $this->conn->connect_error);
        }
        //echo "Connected successfully </br>";
    }
}