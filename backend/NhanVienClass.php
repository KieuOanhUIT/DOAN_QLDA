<?php
include 'C:\xampp\htdocs\DOAN_WEBSITE\database\database.php';

class NhanVienCLass{
    public $Database;
    public function __construct(){
        $this->Database = new Database;
    }
    public function getEmployeeInfo(){
        global $conn;
        $sql = "SELECT MANV, TENPB, CHUCVU, SDT, DIACHI, NGSINH, NGVL FROM nhanvien n join phongban p on n.MAPB = p.MAPB";
        $result = $conn->query($sql);

        //while(){
            $row = mysql_fetch_array($result);
            echo "<tr>";
            echo "<td>". $row['MANV']. "</td>";
            echo "<td>". $row['TENPB']. "</td>";
            echo "<td>". $row['CHUCVU']. "</td>";
            echo "<td>". $row['SDT']. "</td>";
            echo "<td>". $row['DIACHI']. "</td>";
            echo "<td>". $row['NGSINH']. "</td>";
            echo "<td>". $row['NGVL']. "</td>";
            echo "</tr>";   
        //}

        return $result;
    }
    // Hàm cập nhật thông tin nhân viên
    public function updateEmployee($manv, $gioitinh, $sdt, $ngaysinh, $ngayvaolam, $chucvu, $maphongbanpb)
    $st = $conn->prepare("UPDATE nhanvien SET GIOITINH=?, SDT=?, NGSINH=?, NGVL=?, CHUCVU=?, MAPB=? WHERE MANV=?");
    $st->bind_param("ssssss", $manv, $gioitinh, $sdt, $ngaysinh, $ngayvaolam, $chucvu, $maphongbanpb);
    $st->execute();
    $st->close();
    }

    public function searchEmployee($manv) {
    global $conn;
    $st = $conn->prepare("SELECT MANV, TENPB, CHUCVU, SDT, DIACHI, NGSINH, NGVL FROM nhanvien WHERE MANV = ?");
    $st->bind_param("s", $manv);
    $st->execute();
    $result = $st->get_result();
    return $result->fetch_assoc(); 
  }
  //$conn->close();


?>