<?php
include 'header.php';
include 'C:\xampp\htdocs\DOAN_WEBSITE\backend\NhanVienClass.php';
$NhanVienClass = new NhanVienClass;
?>
<?php
  $selectAll=$NhanVienClass->selectAll();
?>
<?php
  if(isset($_POST['capnhat'])){
    $manv=$_POST['txtmanv'];
    $mapb=$_POST['txtmapb'];
    $chucvu=$_POST['txtchucvu'];
    $sdt=$_POST['txtsdt'];
    $gioitinh=$_POST['txtgioitinh'];
    $ngaysinh=$_POST['txtngaysinh'];
    $ngayvaolam=$_POST['txtngayvaolam'];
    $update = $NhanVienClass->updateNV($manv, $gioitinh, $sdt, $ngaysinh, $ngayvaolam, $chucvu, $mapb);
  }
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
         
          <input type=text name="txtmanv" value="<?php echo $result['MANV']; ?>" id="" readonly="true">
          <input type=text name="txtmapb" value="<?php echo $result['MAPB'] ?>">
          <input type=text name="txtchucvu" value="<?php echo $result['CHUCVU'] ?>">
          <input type=text name="txtsdt" value="<?php echo $result['SDT'] ?>">
          <input type=text name="txtgioitinh" value="<?php echo $result['GIOITINH'] ?>">
          <input type=text name="txtngsinh" value="<?php echo $result['NGSINH'] ?>">
          <input type=text name="txtngvl" value="<?php echo $result['NGVL'] ?>">

        </div>
      </div>
    </div>
  </div>
    <?php
      }
    ?>
  <div class="row-button">
  <a href="/DOAN_WEBSITE/backend/parts/QLNV.php"><button class="button"name="huy">Hủy</button></a>
    <button class="button" type = "submit" name="capnhat" id="">Cập nhật</button>
  </div>
  </form>

</body>

<footer>
  <?php
    include 'footer.php';
  ?>
</footer>
</html>