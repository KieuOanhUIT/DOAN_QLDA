<?php
include 'C:\xamppp\htdocs\DOAN_QLDA\database\database.php';

class YeuCauClass {
    public $Database;

    public function __construct() {
        $this->Database = new Database();
    }

    // hàm show tất cả yêu cầu
    public function getAllRequests() {
        $sql = "SELECT MaYC, MaNV, LoaiYC, NoiDung, NgTao, TrangThai FROM yeucau";
        return $this->Database->executeQuery($sql);
    }

    // hàm tìm kiếm yêu cầu
    public function searchRequests($keyword) {
        $sql = "SELECT MaYC, MaNV, LoaiYC, NoiDung, NgTao, TrangThai FROM yeucau WHERE MaNV LIKE '%$keyword%' OR LoaiYC LIKE '%$keyword%' OR NoiDung LIKE '%$keyword%' OR NgTao LIKE '%$keyword%' OR TrangThai LIKE '%$keyword%'";
        return $this->Database->executeQuery($sql);
    }

    // hàm tạo mã yêu cầu tự động
    private function generateRequestId() {
        $sql = "SELECT MAX(MaYC) as maxMaYC FROM yeucau";
        $result = $this->Database->executeQuery($sql);
        $row = $result->fetch_assoc();
        $maxMaYC = $row['maxMaYC'];
        
        $number = (int)substr($maxMaYC, 2) + 1;
        return 'YC' . str_pad($number, 2, '0', STR_PAD_LEFT);
    }

    // hàm thêm yêu cầu mới
    public function addRequest($manv, $loaiyc, $noidung) {
        $mayc = $this->generateRequestId();
        $ngaytao = date('Y-m-d');
        $trangthai = 'Đang xử lý';
        $sql = "INSERT INTO yeucau (MaYC, MaNV, LoaiYC, NoiDung, NgTao, TrangThai) VALUES ('$mayc', '$manv', '$loaiyc', '$noidung', '$ngaytao', '$trangthai')";
        $this->Database->executeQuery($sql);
    }

    // hàm xóa yêu cầu
    public function deleteRequest($mayc) {
        $sql = "DELETE FROM yeucau WHERE MaYC='$mayc'";
        $this->Database->executeQuery($sql);
    }
}
?>
