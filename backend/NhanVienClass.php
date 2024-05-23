<?php
include 'C:\xampp\htdocs\DOAN_WEBSITE\database\database.php';

class NhanVienCLass{
    public $Database;
    public function __construct(){
        $this->Database = new Database;
    }
    public function selectAll(){
        $sql = "SELECT * FROM nhanvien";
        $result = $this->Database->selectAll_NV($sql);
        return $result;
    }
    // Hàm cập nhật thông tin nhân viên
    // public function updateEmployee($manv, $gioitinh, $sdt, $ngaysinh, $ngayvaolam, $chucvu, $maphongbanpb)
    // $st = $conn->prepare("UPDATE nhanvien SET GIOITINH=?, SDT=?, NGSINH=?, NGVL=?, CHUCVU=?, MAPB=? WHERE MANV=?");
    // $st->bind_param("ssssss", $manv, $gioitinh, $sdt, $ngaysinh, $ngayvaolam, $chucvu, $maphongbanpb);
    // $st->execute();
    // $st->close();
    // }

    public function searchEmployee($manv) {
    global $conn;
    $st = $conn->prepare("SELECT MANV, TENPB, CHUCVU, SDT, DIACHI, NGSINH, NGVL FROM nhanvien WHERE MANV = ?");
    $st->bind_param("s", $manv);
    $st->execute();
    $result = $st->get_result();
    return $result->fetch_assoc(); 
  }
  //$conn->close();
    public function show_nhanvien(){
    $query = "SELECT * FROM nhanvien";
        $result = $this -> Database -> select($query);
        return $result;
        
    }

}
?>