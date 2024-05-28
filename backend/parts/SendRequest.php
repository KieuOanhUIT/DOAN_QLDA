<?php
include 'header.php';
include 'C:\xamppp\htdocs\DOAN_WEBSITE\backend\YeuCauClass.php';
$yeucauClass = new YeuCauClass();
?>

<header id="header"></header>
<body>
    <div id="wp-content">
        
        <h4>GỬI YÊU CẦU</h4>
        <h6>__________________________________________________________</h6>
        
        <br/>
        <div class ="search-container">
            <label for="text">Tìm kiếm</label>
            <br/>
            <input type="text" placeholder="Tìm kiếm...">
            <button type="submit">Tìm</button>
            <button type="button">Xóa</button>
        </div>
        <div class="KhuVucBangYeuCau">            
            <table id="employeeTable">
                <h3>CÁC YÊU CẦU ĐÃ GỬI</h3>
                <thead>
                    <tr >
                        <th style="width: 40px;">STT</th>
                        <th style="width: 150px;" >Loại yêu cầu</th>
                        <th style="width: 250px;">Nội dung</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>   
                <tbody>
                    <tr >
                        <td>1</td>
                        <td>Nghỉ phép</td>
                        <td>Xin nghỉ phép ngày 18/4/2024.</td>
                        <td>10/4/2024</td>
                        <td>Đang xử lý</td>
                    </tr>
                    <tr >
                        <td>2</td>
                        <td>Nghỉ phép</td>
                        <td>Xin nghỉ phép ngày 18/4/2024.</td>
                        <td>10/4/2024</td>
                        <td>Đang xử lý</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <!--end KhuVucBangYeuCau-->

        <div class="KhuVucDangKyYeuCau">
            <h3>ĐĂNG KÝ YÊU CẦU</h3>

            <form action="">
                <label for="LYC">Loại yêu cầu</label>
                <br/>
                <select id="LYC" name="LYC">
                    <option value="">-Chọn loại yêu cầu-</option>
                    <option value="">Nghỉ phép</option>
                    <option value="">Tăng Lương</option>
                    <option value="">Hỗ trợ kỹ thuật</option>
                    <option value="">Khác</option>
                </select>
                <br />
                <br />
                <label for="NoiDung">Nội dung</label>
                <br/>
                <textarea id="NoiDung" name="NoiDung" placeholder="Nhập nội dung"></textarea>
                <br/>
                <br/>
                <button id="saveButton" type ="submit">Lưu</button>
            </form>
        </div>
        <!--end KhuVucGuiYeuCau-->

    </div>
</body>

<!-- chân trang-------------------------------->
<footer>
  <?php
    include 'footer.php';
  ?>
</footer>

</html>
