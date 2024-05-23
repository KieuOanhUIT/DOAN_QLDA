<?php
include 'header.php';
include 'C:\xampp\htdocs\DOAN_WEBSITE\backend\NhanVienClass.php';
$NhanVienClass = new NhanVienClass;
?>
<?php
  $selectAll=$NhanVienClass->selectAll();
?>

<body>

  <form action="" method="post">
  <div class="employee-card">
  <?php
      if($selectAll->num_rows >0 && $result = $selectAll->fetch_assoc()){
    ?>
    <div class="avatar">
      <img src="https://i.pinimg.com/564x/12/fe/2d/12fe2d285f543778b31f4893cf4c22ff.jpg" />
    </div>
    <div class="infor">
      <div class="name"> <?php echo $result['TENNV']?></div>
      <div class="infor-content">
        <div class="left">
          <div>Mã nhân viên</div>
          <div>Phòng ban</div>
          <div>Chức vụ</div>
          <div>Số điện thoại</div>
          <div>Giới tính</div>
          <div>Ngày sinh</div>
          <div>Ngày vào làm</div>
        </div>
        <div class="right">
          <div><?php echo $result['MANV'] ?></div>
          <div><?php echo $result['MAPB'] ?></div>
          <div><?php echo $result['CHUCVU'] ?></div>
          <div><?php echo $result['SDT'] ?></div>
          <div><?php echo $result['GIOITINH'] ?></div>
          <div><?php echo $result['NGSINH'] ?></div>
          <div><?php echo $result['NGVL'] ?></div>
        </div>
      </div>
    </div>
  </div>
    <?php
      }
    ?>
  <div class="row-button">
    <button class="button">Hủy</button>
    <button class="button">Cập nhật</button>
  </div>
  </form>

</body>

<footer>
  <?php
    include 'footer.php';
  ?>
</footer>
</html>