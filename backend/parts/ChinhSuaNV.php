<?php
include 'header.php';
include 'C:\xampp\htdocs\DOAN_WEBSITE\database\database.php';

//include 'C:\xampp\htdocs\DOAN_WEBSITE\backend\NhanVienClass.php';
?>

<?php
$database = new Database;

// $nv = new NhanVienCLass();
// $nv->getEmployeeInfo();
?>

<body>

  <div class="employee-card">
    <div class="avatar">
      <img src="https://i.pinimg.com/564x/12/fe/2d/12fe2d285f543778b31f4893cf4c22ff.jpg" />
    </div>
    <div class="infor">
      <div class="name">TRẦN THỊ KIỀU OANH</div>
      <div class="infor-content">
        <div class="left">
          <div>Mã nhân viên</div>
          <div>Phòng ban</div>
          <div>Chức vụ</div>
          <div>Số điện thoại</div>
          <div>Địa chỉ</div>
          <div>Ngày sinh</div>
          <div>Ngày vào làm</div>
        </div>
        <div class="right">
          <div>001</div>
          <div>Nhân sự</div>
          <div>Trưởng phòng</div>
          <div>0864213579</div>
          <div>KTX Khu A, ĐHQG - HCM</div>
          <div>07/08/2004</div>
          <div>08/07/2024</div>
        </div>
      </div>
    </div>
  </div>
  <div class="row-button">
    <button class="button">Hủy</button>
    <button class="button">Cập nhật</button>
  </div>

</body>

<footer>
  <?php
    include 'footer.php';
  ?>
</footer>
</html>