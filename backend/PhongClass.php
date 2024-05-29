<?php
include 'C:\xampp\htdocs\DOAN_QLDA\database\database.php';

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
        $sql = "SELECT * FROM phong WHERE NGAY = '$ngay'";
        $result = $this->Database->selectByNgay($sql);
        return $result;
    }

    public function insertDKy($manv, $noidung, $map){
        // $manv=$data['manv'];
        // $map=$data['map'];
        // $noidung=$data['noidung'];
        $query = "INSERT INTO ctdkphong (manv, map, noidung, trangthai)
        VALUES ('$manv','$map','$noidung','Đang chờ xử lý')";
        $result = $this -> Database-> insertDKy($query);
        return $result;
    }

    public function selectAllDKy(){
        $sql = "SELECT * FROM ctdkphong";
        $result = $this->Database->selectAll_DKy($sql);
        return $result;
    }
}
?>