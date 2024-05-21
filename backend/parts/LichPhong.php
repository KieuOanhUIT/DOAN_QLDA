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
    <button class="search-button">Xem lịch</button>
  </div>
  <!-- them bang -->
  <table>
    <tr>
      <th>Phòng</th>
      <th>Thời gian</th>
      <th>Thứ 2</th>
      <th>Thứ 3</th>
      <th>Thứ 4</th>
      <th>Thứ 5</th>
      <th>Thứ 6</th>
    </tr>
    <tr>
      <td>1</td>
      <td>8h00 - 11h30</td>
      <td></td>
      <td>Họp phòng nhân sự</td>
      <td></td>
      <td>Phỏng vấn bảo vệ</td>
      <td></td>
    </tr>
    <tr>
      <td>2</td>
      <td>14h00 - 16h30</td>
      <td>Họp phòng chiến lược</td>
      <td></td>
      <td>Seminar</td>
      <td>Seminar</td>
      <td></td>
    </tr>
    <tr>
      <td>3</td>
      <td>8h00 - 11h30</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>Giao lưu công ty ToFu</td>
    </tr>
    <tr>
      <td>4</td>
      <td>14h00 - 16h30</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>5</td>
      <td>8h00 - 11h30</td>
      <td>Liên hoan công ty</td>
      <td></td>
      <td>Seminar</td>
      <td>Hội thảo</td>
      <td></td>
    </tr>
  </table>

</body>

<footer>
  <?php
    include 'footer.php';
  ?>
</footer>
</html>