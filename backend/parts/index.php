<?php
include 'header.php';
?>

<body>
    <header>
        <!-- Include Header -->
        <div id="header"></div>
    </header>

    <main>
        <div class="slideshow-container">
            <img class="slide" src="https://i.pinimg.com/564x/f3/15/e7/f315e797ccd5778f477c319f97d1d14e.jpg">
            <img class="slide" src="https://i.pinimg.com/564x/42/60/6a/42606a8ecd3cc554ee27111d979b8eb5.jpg">
            <img class="slide" src="https://i.pinimg.com/564x/64/7f/f2/647ff2bfe7dbb3f9f49bd134a47d065b.jpg">
            <img class="slide" src="https://i.pinimg.com/564x/49/95/07/4995079a688baf50e65526372be252f7.jpg" alt="Mô tả của ảnh">
            <div class="caption">Happy Birthday, Kiều Oanh!</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="search-container">
            <div class="search-text">Tìm kiếm</div>
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search...">
            </div>
            <div class="search-text1">Search for this site</div>
        </div>

        <main class = "main-container">
        <section class="info-box">
            <h1>THÔNG TIN</h1>
            <img src="https://i.pinimg.com/564x/b9/bd/9f/b9bd9fb452c6c863d3bf00ae09e84c35.jpg" alt="Ảnh thông tin" style="width: 650px">
            <h2>Cổng thông tin của Công ty Sản xuất - Thương mại TUFO</h2>
            <div class="info-content">
                <h3>Thông báo của công ty đến nhân viên</h3>
                <ul>
                    <li>Thông báo về chính sách mới của công ty.</li>
                    <li>Các thông tin quan trọng về hoạt động kinh doanh.</li>
                    <li>Thông tin về sự kiện và hoạt động trong công ty.</li>
                </ul>
                <h3>Kế hoạch năm</h3>
                <ul>
                    <li>Kế hoạch sản xuất và kinh doanh trong năm.</li>
                    <li>Các chương trình đào tạo và phát triển nhân viên.</li>
                    <li>Thông tin về các dự án mới và mục tiêu trong năm.</li>
                </ul>
            </div>
        </section>

        <section class="highlight-box">
            <h4>TIN NỔI BẬT</h4>
            <img src="https://i.pinimg.com/564x/a3/42/ee/a342eebfb750f95aab988b873a0115e4.jpg" alt="Ảnh nổi bật" style="width: 650px">
            <div class="highlight-content">
                <ul>
                    <li>Thông báo nghỉ lễ 30/4 - 1/5.</li>
                    <li>Thông điệp chào mừng năm mới - Xuân giáp Thìn 2024.</li>
                </ul>
            </div>
        </section>
    </main>
    </main>

    <script src="/pages/js/trangchu copy.js"></script>
<?php
include 'footer.php';
?>
    
</body>

</html>
