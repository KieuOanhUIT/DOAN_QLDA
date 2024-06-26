<?php
include 'header.php';
include 'C:\xampp\htdocs\DOAN_QLDA\backend\NhanVienClass.php';
$NhanVienClass = new NhanVienClass();
?>
<?php
  $selectAll=$NhanVienClass->selectAll();

  if(isset($_POST['search'])){
    //$resultID=array();
    $txtsearch = $_POST['txtsearch'];
    $nv = new NhanVienClass;
    $select = $nv->selectByMANV($txtsearch);
    if($select){
      $resultID = $select->fetch_assoc();
    }
  }
?>

<body>
  <div class="search-box">Tìm kiếm nhân viên</div>
  <form action="" method="post">
    <input class="search-input" type="text" name="txtsearch" placeholder="Nhập mã nhân viên" />
    <button class="search-button" type ="submit" name="search">Tìm kiếm</button>
    <div class="employee-card">
    <div class="avatar">
      <img src="https://i.pinimg.com/564x/12/fe/2d/12fe2d285f543778b31f4893cf4c22ff.jpg" />
    </div>
    <div class="infor">
      <div class="name"><?php echo $resultID['TENNV']?><a href="/DOAN_QLDA/backend/parts/ChinhSuaNV.php"><i class="fa fa-pen" style="color: #2b7a77;"></i></a></div>
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
          <div><?php echo $resultID['MANV'] ?></div>
          <div><?php echo $resultID['MAPB'] ?></div>
          <div><?php echo $resultID['CHUCVU'] ?></div>
          <div><?php echo $resultID['SDT'] ?></div>
          <div><?php echo $resultID['GIOITINH'] ?></div>
          <div><?php echo $resultID['NGSINH'] ?></div>
          <div><?php echo $resultID['NGVL'] ?></div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <?php
      if($selectAll->num_rows >0){
        while($result = $selectAll->fetch_assoc()){
    ?>
  <div class="employee-card">
    <div class="avatar">
      <img src="https://i.pinimg.com/564x/12/fe/2d/12fe2d285f543778b31f4893cf4c22ff.jpg" />
    </div>
    <div class="infor">
      <div class="name"><?php echo $result['TENNV']?><a href="/DOAN_QLDA/backend/parts/ChinhSuaNV.php"><i class="fa fa-pen" style="color: #2b7a77;"></i></a></div>
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
  <hr width="80%" size="3px" text-align="center" color="#2b7a77" />

  <?php
      }
    }
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