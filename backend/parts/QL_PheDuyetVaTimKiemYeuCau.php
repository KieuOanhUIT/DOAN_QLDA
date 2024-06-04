<?php
include 'D:\xampp\htdocs\DOAN_QLDA-main\database\DB.php';
include 'D:\xampp\htdocs\DOAN_QLDA-main\backend\YeuCauClass.php';

// Tạo một đối tượng của class YeuCauClass
$yeuCauClass = new YeuCauClass();

// Gọi phương thức getAllRequests để lấy tất cả các yêu cầu
$result = $yeuCauClass->getAllRequests2();
?>
<!DOCTYPE html>
<html lang="en">
<head> 78ii67i
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web</title>
    <link rel="stylesheet" href="/DOAN_QLDA-main/pages/css/XuLyYeuCau.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="stylesheet" href="/DOAN_QLDA-main/pages/css/header.css">
    <link rel="stylesheet" href="/DOAN_QLDA-main/pages/css/footer.css">
    <script>
        window.onload = function () {
            // Include Header
            fetch("/DOAN_QLDA-main/pages/html/header.html")
                .then(response => response.text())
                .then(data => document.querySelector("header").innerHTML = data);

            // Include Footer
            fetch("/DOAN_QLDA-main/pages/html/footer.html")
                .then(response => response.text())
                .then(data => document.querySelector("footer").innerHTML = data);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const input = document.querySelector('.input');
            input.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Ngăn chặn hành động mặc định của form

                    const query = input.value;
                    if (query) {
                        // Gửi dữ liệu qua AJAX để tìm kiếm
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "/DOAN_QLDA-main/backend/parts/search_Request.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                if (xhr.responseText.trim() === "no-match") {
                                    alert("Không có thông tin trùng khớp");
                                } else {
                                    // Hiển thị kết quả trả về từ server
                                    document.querySelector('tbody').innerHTML = xhr.responseText;
                                    attachRowClickEvent(); // Gắn lại sự kiện sau khi thay đổi nội dung bảng
                                }
                            }
                        };
                        xhr.send("query=" + encodeURIComponent(query));
                    }
                }
            });

            function attachRowClickEvent() {
                const rows = document.querySelectorAll('.data-table tbody tr');
                rows.forEach(row => {
                    row.addEventListener('click', function () {
                        // Bỏ chọn tất cả các hàng trước khi chọn hàng hiện tại
                        rows.forEach(r => r.classList.remove('selected'));

                        // Chọn hàng hiện tại
                        this.classList.add('selected');

                        const maNV = this.dataset.manv;
                        const tenNV = this.dataset.tennv;
                        const loaiYC = this.dataset.loaiyc;
                        const noiDung = this.dataset.noidung;
                        const ngayTao = this.dataset.ngaytao;
                        const trangThai = this.dataset.trangthai;

                        // Cập nhật các input với thông tin tương ứng
                        document.querySelector('.input1').textContent = maNV;
                        document.querySelector('.input2').textContent = tenNV;
                        document.querySelector('.input3').textContent = loaiYC;
                        document.querySelector('.input4').textContent = ngayTao;
                        document.querySelector('.input5').textContent = noiDung;
                    });
                });
            }

            attachRowClickEvent();

            document.querySelector('.custom-button').addEventListener('click', function () {
                updateRequestStatus('Không chấp nhận');
            });

            document.querySelector('.custom-button1').addEventListener('click', function () {
                updateRequestStatus('Chấp nhận');
            });

            function updateRequestStatus(status) {
                const maNV = document.querySelector('.input1').textContent;
                if (!maNV) {
                    alert("Vui lòng chọn một yêu cầu.");
                    return;
                }

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "/DOAN_QLDA-main/backend/parts/updateStatus_Request.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        if (xhr.responseText.trim() === "success") {
                            alert("Cập nhật trạng thái thành công.");
                            location.reload(); // Tải lại trang để cập nhật danh sách yêu cầu
                        } else {
                            alert("Cập nhật trạng thái thất bại.");
                        }
                    }
                };
                xhr.send("maNV=" + encodeURIComponent(maNV) + "&status=" + encodeURIComponent(status));
            }
        });
    </script>
</head>
<header id="header"></header>
<body>
    <div class="container">
        <div class="text-box">
            XỬ LÝ YÊU CẦU
        </div>
        <div class="line"></div>
        <div class="input-container">
            <input type="text" class="input" placeholder="Tìm kiếm">
            <div class="label">Tìm kiếm</div>
            <div class="search-icon"></div>
        </div>
        <div class="container_table">
        <table class="data-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã nhân viên</th>
                    <th>Tên nhân viên</th>
                    <th>Loại yêu cầu</th>
                    <th>Nội dung</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php
                if ($result) {
                    if ($result->num_rows > 0) {
                        // Hiển thị dữ liệu cho mỗi hàng
                        $count = 1;
                        while($row = $result->fetch_assoc()) {
                            echo "<tr data-manv='" . $row["manv"] ."' data-tennv='". $row["tennv"] . "' data-loaiyc='" . $row["loaiyc"] . "' data-noidung='" . $row["noidung"] . "' data-ngaytao='" . $row["ngtao"] . "' data-trangthai='" . $row["trangthai"] . "'>";
                            echo "<td>" . $count . "</td>";
                            echo "<td>" . $row["manv"] . "</td>";
                            echo "<td>" . $row["tennv"] . "</td>";
                            echo "<td>" . $row["loaiyc"] . "</td>";
                            echo "<td>" . $row["noidung"] . "</td>";
                            echo "<td>" . $row["ngtao"] . "</td>";
                            echo "<td>" . $row["trangthai"] . "</td>";
                            echo "</tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
                    }
                } else {
                    // Hiển thị lỗi truy vấn cơ sở dữ liệu
                    echo "<tr><td colspan='7'>Lỗi truy vấn cơ sở dữ liệu: " . $yeuCauClass->Database->conn->error . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
        <div class="container1"></div>
        <div class="container11">
            <div id="text-box1">NỘI DUNG YÊU CẦU</div>
        </div>
        <div class="input-container1">
            <div class="input1"></div>
            <div class="label1">Mã nhân viên</div>
        </div>
        <div class="input-container2">
            <div class="input2"></div>
            <div class="label2">Tên nhân viên</div>
        </div>
        <div class="input-container3">
            <div class="input3"></div>
            <div class="label3">Loại yêu cầu</div>
        </div>
        <div class="input-container4">
            <div class="input4"></div>
            <div class="label4">Ngày tạo</div>
        </div>
        <div class="input-container5">
            <div class="input5"></div>
            <div class="label5">Nội dung</div>
        </div>
        <button class="custom-button">Không chấp nhận</button>
        <button class="custom-button1">Chấp nhận</button>
    </div>
</body>
<footer id="footer"></footer>
</html>