<?php
include 'D:\xampp\htdocs\DOAN_QLDA-main\database\DB.php';
include 'D:\xampp\htdocs\DOAN_QLDA-main\backend\YeuCauClass.php';

// Kiểm tra nếu có dữ liệu POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maNV = $_POST['maNV'];
    $status = $_POST['status'];

    // Tạo một đối tượng của class YeuCauClass
    $yeuCauClass = new YeuCauClass();

    // Gọi phương thức để cập nhật trạng thái yêu cầu
    $result = $yeuCauClass->updateRequestStatus($maNV, $status);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
