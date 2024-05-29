<?php
include 'header.php';
include 'C:\xampp\htdocs\DOAN_QLDA\backend\PhongClass.php';
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
    <button class="search-button">Xem lịch</button>
    
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
  <!-- them bang -->
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

</body>

<footer>
  <?php
    include 'footer.php';
  ?>
</footer>
</html>