<?php
include 'header.php';
include 'C:\xamppp\htdocs\DOAN_QLDA\backend\YeuCauClass.php';

$yeucauClass = new YeuCauClass();

$search = isset($_GET['search']) ? $_GET['search'] : '';
$yeuCauList = $search ? $yeucauClass->searchRequests($search) : $yeucauClass->getAllRequests();

?>

</head>
<header id="header"></header>
<body>
    <div id="wp-content">
        
        <h4>GỬI YÊU CẦU</h4>
        <h6>__________________________________________________________</h6>
        
        <br/>
        <div class ="search-container">
            <form method="get" action="">
                <label for="text">Tìm kiếm</label>
                <br/>
                <input type="text" name="search" placeholder="Tìm kiếm..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Tìm</button>
                <!--<button type="button" onclick="window.location.href='SenRequest.php'">Xóa</button>>-->
            </form>
        </div>
        <div class="KhuVucBangYeuCau">            
            <table id="employeeTable">
                <h3>CÁC YÊU CẦU ĐÃ GỬI</h3>
                <thead>
                    <tr>
                        <th style="width: 40px;">STT</th>
                        <th style="width: 200px;">Mã nhân viên</th>
                        <th style="width: 200px;">Loại yêu cầu</th>
                        <th style="width: 300px;">Nội dung</th>
                        <th style="width: 200px;">Ngày tạo</th>
                        <th style="width: 200px;">Trạng thái</th>
                        <th style="width: 150px;">Hành động</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php if ($yeuCauList && $yeuCauList->num_rows > 0): ?>
                        <?php $stt = 1; ?>
                        <?php while($row = $yeuCauList->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo htmlspecialchars($row['MaNV']); ?></td>
                                <td><?php echo htmlspecialchars($row['LoaiYC']); ?></td>
                                <td><?php echo htmlspecialchars($row['NoiDung']); ?></td>
                                <td><?php echo htmlspecialchars($row['NgTao']); ?></td>
                                <td><?php echo htmlspecialchars($row['TrangThai']); ?></td>
                                <td>
                                    <a href="delete_request.php?MaYC=<?php echo $row['MaYC']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa yêu cầu này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">Không tìm thấy yêu cầu nào</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!--end KhuVucBangYeuCau-->

        <div class="KhuVucDangKyYeuCau">
            <h3>ĐĂNG KÝ YÊU CẦU</h3>

            <form method="post" action="submit_request.php">
                <label for="manv">Mã nhân viên</label>
                <br>
                <input type="text" name="manv" placeholder="Nhập mã nhân viên" size  = "30" >
                <br/>

                <label for="LYC">Loại yêu cầu</label>
                <br/>
                <select id="LYC" name="loaiyc" style="width: 250px;"> 
                    <option value="">-Chọn loại yêu cầu-</option>
                    <option value="Nghỉ phép">Nghỉ phép</option>
                    <option value="Tăng Lương">Tăng Lương</option>
                    <option value="Hỗ trợ kỹ thuật">Hỗ trợ kỹ thuật</option>
                    <option value="Khác">Khác</option>
                </select>
                <br />
                <br />
                <label for="NoiDung">Nội dung</label>
                <br/>
                <textarea id="NoiDung" name="noidung" placeholder="Nhập nội dung"></textarea>
                <br/>
                <br/>
                <button id="saveButton" type="submit">Lưu</button>
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
