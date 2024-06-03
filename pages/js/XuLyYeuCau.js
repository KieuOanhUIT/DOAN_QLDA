document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.custom-button, .custom-button1');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const trangThai = button.textContent === 'Không chấp nhận' ? 'Không chấp nhận' : 'Chấp nhận';
            const maNV = document.querySelector('.input1').textContent.trim(); // Lấy mã nhân viên từ input1
            
            // Gửi yêu cầu cập nhật trạng thái
            fetch('/update_request_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ maNV, trangThai }),
            })
            .then(response => response.json())
            .then(data => {
                // Hiển thị thông báo
                alert(data.message);
                // Cập nhật lại bảng
                fetchRequests();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

    // Xử lý khi click vào mỗi hàng trên bảng
    const rows = document.querySelectorAll('.data-table tbody tr');
    rows.forEach(row => {
        row.addEventListener('click', function () {
            const maNV = this.querySelector('td:nth-child(2)').textContent.trim();
            const tenNV = this.querySelector('td:nth-child(3)').textContent.trim();
            const loaiYC = this.querySelector('td:nth-child(4)').textContent.trim();
            const noiDung = this.querySelector('td:nth-child(5)').textContent.trim();
            const ngayTao = this.querySelector('td:nth-child(6)').textContent.trim();
            const trangThai = this.querySelector('td:nth-child(7)').textContent.trim();

            // Cập nhật các input với thông tin tương ứng
            document.querySelector('.input1').textContent = maNV;
            document.querySelector('.input2').textContent = tenNV;
            document.querySelector('.input3').textContent = loaiYC;
            document.querySelector('.input4').textContent = ngayTao;
            document.querySelector('.input5').textContent = noiDung;
        });
    });
});

// Hàm gửi yêu cầu lấy lại dữ liệu yêu cầu từ máy chủ và cập nhật lại bảng
function fetchRequests() {
    fetch('/fetch_requests.php')
    .then(response => response.json())
    .then(data => {
        // Cập nhật lại bảng với dữ liệu mới
        const tableBody = document.querySelector('.data-table tbody');
        tableBody.innerHTML = ''; // Xóa hết các dòng trong tbody
        data.forEach((row, index) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${index + 1}</td>
                            <td>${row.manv}</td>
                            <td>${row.tennv}</td>
                            <td>${row.loaiyc}</td>
                            <td>${row.noidung}</td>
                            <td>${row.ngtao}</td>
                            <td>${row.trangthai}</td>`;
            tableBody.appendChild(tr);
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


console.log("File JavaScript đã được tải và hoạt động!");