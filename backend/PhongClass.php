<?php
include 'C:\xampp\htdocs\DOAN_WEBSITE\database\database.php';

class PhongCLass{
    public $Database;
    public function __construct(){
        $this->Database = new Database;
    }
    
    public function selectAll(){
        $sql = "SELECT * FROM phong";
        $result = $this->Database->selectAll_Phong($sql);
        return $result;
    }

    public function selectByNgay($ngay){
        $date=$ngay['ngay'];
        $sql = "SELECT * FROM phong WHERE NGAY = '$date'";
        $result = $this->Database->selectByNgay($sql);
        return $result;
    }
}
?>