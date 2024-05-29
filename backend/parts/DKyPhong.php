<?php
include 'header.php';
include 'C:\xampp\htdocs\DOAN_QLDA\backend\PhongClass.php';
$phongClass = new PhongClass();
?>
<?php
  $selectAll=$phongClass->selectAll();

  $ctdkClass = new PhongClass();
  $selectAllDKy=$ctdkClass->selectAllDKy();

  if(isset($_POST['btn'])){
    $manv=$_POST['manv'];
    $noidung=$_POST['noidung'];
    $map=$_POST['map'];
    $data = new PhongCLass;
    $update = $data->insertDKy($manv,$noidung,$map);
    echo "Đã lưu thông tin đăng ký";
  }
?>
<?php
      
?>

<body>
  <form action="" method="post">
  <div class="label">Đăng ký phòng</div>
  <div class="row-nhaptg">
    <input class="search" type="text" name="manv" placeholder="Nhập mã nhân viên" />
    <input class="search" type="text" name="noidung" placeholder="Nhập mục đích mượn" />
    <input class="search" type="text" name="map" placeholder="Nhập mã phòng cần mượn" />
    <button class="search-button" type="submit" name ="btn">Đăng ký</button>
  </div>
  </form>

  <table>
    <tr>
      <th>Mã nhân viên</th>
      <th>Mã phòng</th>
      <th>Nội dung</th>
      <th>Trạng thái</th>
    </tr>
    <?php
      if($selectAllDKy->num_rows >0){ while($resultDK = $selectAllDKy->fetch_assoc()){
    ?>
      <tr>
        <td><?php echo $resultDK['MANV'] ?></td>
        <td><?php echo $resultDK['MAP'] ?></td>
        <td><?php echo $resultDK['NOIDUNG'] ?></td>
        <td><?php echo $resultDK['TRANGTHAI'] ?></td>
      </tr>
      <?php
      }}
      else {
        echo "Không có dữ liệu";
      }
    ?>
  </table>

  <table>
    <tr>
      <th>Mã phòng</th>
      <th>Tên phòng</th>
      <th>Thời gian mượn</th>
      <th>Ngày</th>
      <th>Tình trạng</th>
    </tr>
    <?php
      if($selectAll->num_rows >0){ while($result = $selectAll->fetch_assoc()){
    ?>
      <tr>
        <td><?php echo $result['MAP'] ?></td>
        <td><?php echo $result['TENP'] ?></td>
        <td><?php echo $result['TGMUON'] ?></td>
        <td><?php echo $result['NGAY'] ?></td>
        <td><?php echo $result['TINHTRANG'] ?></td>
      </tr>
    <?php
      }}
      else {
        echo "Không có dữ liệu";
      }
    ?>
  </table>

</body>

<footer>
  <?php
    include 'footer.php';
  ?>
</footer>
</html>