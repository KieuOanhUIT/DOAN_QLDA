<?php
include 'header.php';
include 'C:\xampp\htdocs\DOAN_WEBSITE\database\database.php';
?>

<body>
  <div class="label">Thời gian</div>
  <div class="row-nhaptg">
    <input class="search" type="text" placeholder="Nhập ngày" />
    <input class="search" type="text" placeholder="Nhập tháng" />
    <input class="search" type="text" placeholder="Nhập năm" />
    <button class="search-button">Xem phòng trống</button>
  </div>
  <div class="label">Đăng ký phòng</div>
  <div class="row-nhaptg">
    <input class="search" type="text" placeholder="Nhập mã nhân viên" />
    <input class="search" type="text" placeholder="Nhập mục đích mượn" />
    <input class="search" type="text" placeholder="Nhập mã phòng cần mượn" />
    <button class="search-button">Đăng ký</button>
  </div>
  
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