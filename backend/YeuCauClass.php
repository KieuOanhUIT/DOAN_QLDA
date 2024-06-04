<?php
require_once 'D:/xampp/htdocs/DOAN_QLDA-main/database/DB.php';

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

    // Hàm show tất cả yêu cầu kèm tên nhân viên
    public function getAllRequests2() {
        $sql = "SELECT nv.manv, nv.tennv, yc.noidung, yc.trangthai, yc.loaiyc, yc.ngtao 
                FROM yeucau yc
                JOIN nhanvien nv ON yc.manv = nv.manv";
        return $this->Database->executeQuery($sql);
    }

    //Hàm cập nhật trạng thái yêu cầu
    public function updateRequestStatus($maNV, $status) {
        $sql = "UPDATE yeucau SET TrangThai = ? WHERE MaNV = ?";
        $stmt = $this->Database->conn->prepare($sql);
        $stmt->bind_param("ss", $status, $maNV);
        return $stmt->execute();
    }

    // hàm tìm kiếm yêu cầu
    public function searchRequests($keyword) {
        $sql = "SELECT MaYC, MaNV, LoaiYC, NoiDung, NgTao, TrangThai FROM yeucau WHERE MaNV LIKE '%$keyword%' OR LoaiYC LIKE '%$keyword%' OR NoiDung LIKE '%$keyword%' OR NgTao LIKE '%$keyword%' OR TrangThai LIKE '%$keyword%'";
        return $this->Database->executeQuery($sql);
    }

    public function searchRequests($keyword) {
        // Sử dụng Prepared Statements để tránh SQL Injection
        $stmt = $this->Database->conn->prepare(
            "SELECT yc.MaYC, yc.MaNV, nv.TenNV, yc.LoaiYC, yc.NoiDung, yc.NgTao, yc.TrangThai
            FROM yeucau yc JOIN nhanvien nv ON yc.manv = nv.manv
            WHERE yc.MaNV LIKE ? OR nv.TenNV LIKE ? OR yc.LoaiYC LIKE ? OR yc.NoiDung LIKE ? OR yc.NgTao LIKE ? OR yc.TrangThai LIKE ?"
        );
    
        // Thêm ký tự wildcard (%) cho từ khóa tìm kiếm
        $searchKeyword = "%$keyword%";
    
        // Gán các giá trị cho các tham số trong prepared statement
        $stmt->bind_param("ssssss", $searchKeyword, $searchKeyword, $searchKeyword, $searchKeyword, $searchKeyword, $searchKeyword);
    
        // Thực thi câu lệnh truy vấn
        $stmt->execute();
    
        // Lấy kết quả truy vấn
        $result = $stmt->get_result();
    
        // Đóng prepared statement
        $stmt->close();
    
        return $result;
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

    // Hàm để lấy mã yêu cầu dựa trên các thuộc tính khác
    public function getRequestId($manv, $loaiyc, $noidung, $ngaytao, $trangthai) {
        // Câu lệnh SQL để lấy mã yêu cầu
        $sql = "SELECT MAYC FROM table_name WHERE MANV = ? AND LOAIYC = ? AND NOIDUNG = ? AND NGTAO = ? AND TRANGTHAI = ?";
        
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->Database->conn->prepare($sql);
        
        // Bind các tham số
        $stmt->bind_param("sssss", $manv, $loaiyc, $noidung, $ngaytao, $trangthai);
        
        // Thực thi câu lệnh SQL
        $stmt->execute();
        
        // Lấy kết quả
        $result = $stmt->get_result();
        
        // Kiểm tra xem có kết quả trả về hay không
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['MAYC']; // Trả về mã yêu cầu nếu có kết quả
        } else {
            return null; // Trả về null nếu không có kết quả
        }
    }

    // hàm thêm yêu cầu mới
public function addRequest1($manv, $loaiyc, $noidung) {
    $mayc = $this->generateRequestId();
    $ngaytao = date('Y-m-d');
    $trangthai = 'Đang xử lý';
    $sql = "INSERT INTO yeucau (MaYC, MaNV, LoaiYC, NoiDung, NgTao, TrangThai) VALUES ('$mayc', '$manv', '$loaiyc', '$noidung', '$ngaytao', '$trangthai')";
    if ($this->Database->executeQuery($sql) === FALSE) {
        throw new Exception("Error: " . $this->Database->conn->error);
    }
}

}
?>