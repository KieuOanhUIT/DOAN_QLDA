var slideIndex = 0;
showSlides();

function showSlides() {
    var slides = document.getElementsByClassName("slide");

    // Ẩn tất cả các slide
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Tăng slideIndex và reset nếu cần
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    // Hiển thị slide hiện tại
    slides[slideIndex - 1].style.display = "block";

    // Gọi lại hàm showSlides() sau 10 giây
    setTimeout(showSlides, 10000);
}

function plusSlides(n) {
    slideIndex += n;
    showSlides();
}
