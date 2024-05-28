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

    //hàm lấy ra tất cả phòng
    public function selectAll_Phong($query){
        $result = $this->conn->query($query);
        return $result;
    }

    //hàm lấy ra danh sách đăng ký phòng
    public function selectAll_DKy($query){
        $result = $this->conn->query($query);
        return $result;
    }

    //hàm lấy ra lịch theo ngày
    public function selectByNgay($query){
        $result = $this->conn->query($query);
        return $result;
    }

    //hàm show mọi nhân viên
    public function selectAll_NV($query){
        $result = $this->conn->query($query);
        return $result;
    }

    //hàm lấy ra nhân viên theo mã nhân viên
    public function selectByMANV($query){
        $result = $this->conn->query($query);
        return $result;
    }

    // hàm đăng ký phòng
    public function insertDKy($query){
        $result = $this->conn->query($query);
        return $result;
    }

    //hàm update nhân viên
    public function updateNV($query){
        $result = $this->conn->query($query);
        return $result;
    }
    //<!--------------------------------------------------------------->
    public function executeQuery($query) {
        return $this->conn->query($query);
    }
}

?>