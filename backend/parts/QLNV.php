<?php
include 'header.php';
include 'C:\xampp\htdocs\DOAN_WEBSITE\backend\NhanVienClass.php';
$NhanVienClass = new NhanVienClass;
?>
<?php
  $selectAll=$NhanVienClass->selectAll();
?>

<body>
  <div class="search-box">Tìm kiếm nhân viên</div>
  <form>
    <input class="search-input" type="text" placeholder="Nhập mã nhân viên" />
    <button class="search-button">Tìm kiếm</button>
  </form>
  <?php
      if($selectAll->num_rows >0){while($result = $selectAll->fetch_assoc()){
    ?>
  <div class="employee-card">
    <div class="avatar">
      <img src="https://i.pinimg.com/564x/12/fe/2d/12fe2d285f543778b31f4893cf4c22ff.jpg" />
    </div>
    <div class="infor">
      <div class="name"><?php echo $result['TENNV']?><a href="/DOAN_WEBSITE/backend/parts/ChinhSuaNV.php"><i class="fa fa-pen" style="color: #2b7a77;"></i></a></div>
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
  <hr width="80%" size="3px" text-align="center" color="#2b7a77" />

  <?php
      }}
    ?>

  <!-- <hr width="80%" size="3px" text-align="center" color="#2b7a77" /> -->

  <div class="row-pgnumber">
    <button class="button-page">1</button>
    <button class="button-page">2</button>
    <button class="button-page">3</button>
  </div>
</body>

<footer>
  <?php
    include 'footer.php';
  ?>
</footer>
</html>