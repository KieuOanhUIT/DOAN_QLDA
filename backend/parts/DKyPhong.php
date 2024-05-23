<?php
include 'header.php';
include 'C:\xampp\htdocs\DOAN_WEBSITE\backend\PhongClass.php';
$phongClass = new PhongClass();
?>
<?php
  $selectAll=$phongClass->selectAll();

   if($_SERVER['REQUEST_METHOD']=='POST'){
    $ngay = new PhongCLass;
    $ngayy = $_POST['ngay'];
    $getLich = $ngay->selectByNgay($ngayy);
    if($getLich){
      $resultID = $getLich->fetch_assoc();
    }
   }

?>

<body>
<form action="" method="post">
  <div class="label">Thời gian</div>
  <div class="row-nhaptg">
    <input class="search" type="text" name="ngay" placeholder="Nhập ngày/tháng/năm" />
    <button class="search-button">Xem phòng trống</button>
  </div>
  <div class="label">Đăng ký phòng</div>
  <div class="row-nhaptg">
    <input class="search" type="text" placeholder="Nhập mã nhân viên" />
    <input class="search" type="text" placeholder="Nhập mục đích mượn" />
    <input class="search" type="text" placeholder="Nhập mã phòng cần mượn" />
    <button class="search-button">Đăng ký</button>
  </div>
  <table>
    <tr>
      <th>Mã phòng</th>
      <th>Tên phòng</th>
      <th>Thời gian mượn</th>
      <th>Ngày</th>
      <th>Tình trạng</th>
    </tr>
      <tr>
        <td><?php echo $resultID['MAP'] ?></td>
        <td><?php echo $resultID['TENP'] ?></td>
        <td><?php echo $resultID['TGMUON'] ?></td>
        <td><?php echo $resultID['NGAY'] ?></td>
        <td><?php echo $resultID['TINHTRANG'] ?></td>
      </tr>
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
    ?>
  </table>
</form>
  
  
  <!-- them bang -->
  <table>
    <tr>
      <th>Phòng</th>
      <th>Thời gian</th>
      <th>Ngày</th>
      <th>Trạng thái</th>
    </tr>
    <tr>
      <td>1</td>
      <td>8h00 - 11h30</td>
      <td>02/05/2024</td>
      <td>Trống</td>
    </tr>
    <tr>
      <td>2</td>
      <td>8h00 - 11h30</td>
      <td>02/05/2024</td>
      <td>Trống</td>
    </tr>
    <tr>
      <td>3</td>
      <td>14h00 - 16h30</td>
      <td>02/05/2024</td>
      <td>Trống</td>
    </tr>
    <tr>
      <td>5</td>
      <td>8h00 - 11h30</td>
      <td>02/05/2024</td>
      <td>Trống</td>
    </tr>
    <tr>
      <td>6</td>
      <td>14h00 - 16h30</td>
      <td>02/05/2024</td>
      <td>Trống</td>
      <!-- <td><input type="checkbox"></td> -->
    </tr>
  </table>
</body>

<footer>
  <?php
    include 'footer.php';
  ?>
</footer>
</html>