<?php
include 'D:\xampp\htdocs\DOAN_QLDA-main\database\DB.php';
include 'D:\xampp\htdocs\DOAN_QLDA-main\backend\YeuCauClass.php';

// Kiểm tra nếu có dữ liệu POST được gửi lên
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['query'])) {
    $query = $_POST['query'];

    // Tạo một đối tượng của class YeuCauClass
    $yeuCauClass = new YeuCauClass();

    // Kiểm tra từ khóa tìm kiếm có trống hay không
    if (empty($query)) {
        // Nếu từ khóa trống, lấy tất cả các yêu cầu
        $result = $yeuCauClass->getAllRequests();
    } else {
        // Nếu có từ khóa, thực hiện tìm kiếm
        $result = $yeuCauClass->searchRequests($query);
    }

    // Khởi tạo biến lưu trữ kết quả
    $output = "";

    // Kiểm tra và hiển thị kết quả tìm kiếm
    if ($result && $result->num_rows > 0) {
        $count = 1;
        while($row = $result->fetch_assoc()) {
            $output .= "<tr data-manv='" . $row["MaNV"] ."' data-tennv='". $row["TenNV"] . "' data-loaiyc='" . $row["LoaiYC"] . "' data-noidung='" . $row["NoiDung"] . "' data-ngaytao='" . $row["NgTao"] . "' data-trangthai='" . $row["TrangThai"] . "'>";
            $output .= "<td>" . $count . "</td>";
            $output .= "<td>" . $row["MaNV"] . "</td>";
            $output .= "<td>" . $row["TenNV"] . "</td>";
            $output .= "<td>" . $row["LoaiYC"] . "</td>";
            $output .= "<td>" . $row["NoiDung"] . "</td>";
            $output .= "<td>" . $row["NgTao"] . "</td>";
            $output .= "<td>" . $row["TrangThai"] . "</td>";
            $output .= "</tr>";
            $count++;
        }
    } else {
        // Nếu không có kết quả tìm kiếm, gửi tín hiệu thông báo
        $output = "no-match";
    }

    // Trả về kết quả
    echo $output;
}
?>
