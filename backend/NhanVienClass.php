<?php
include 'C:\xampp\htdocs\DOAN_QLDA\database\database.php';

class NhanVienCLass{
    public $Database;
    public function __construct(){
        $this->Database = new Database;
    }

    //hàm show tất cả nhân viên
    public function selectAll(){
        $sql = "SELECT * FROM nhanvien";
        $result = $this->Database->selectAll_NV($sql);
        return $result;
    }
    // Hàm cập nhật thông tin nhân viên
    public function updateNV($manv, $gioitinh, $sdt, $ngaysinh, $ngayvaolam, $chucvu, $mapb){
        $sql = "UPDATE nhanvien SET gioitinh='$gioitinh',sdt='$sdt',ngsinh='$ngaysinh', ngvl='$ngayvaolam', chucvu='$chucvu', mapb='$mapb' WHERE manv='$manv'";
        $result = $this -> Database->updateNV($sql);
        return $result;
    }

    //hàm tìm kiếm nhân viên theo mã nhân viên
    public function selectByMANV($manv){
        $sql = "SELECT * FROM nhanvien WHERE manv = '$manv'";
        $result = $this->Database->selectByMANV($sql);
        return $result;
    }
}
?>