var slideIndex = 0;
showSlides();

function showSlides() {
    var slides = document.getElementsByClassName("slide");
    var prev = document.querySelector(".prev");
    var next = document.querySelector(".next");

    // Hide all slides
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Increment slideIndex and reset if necessary
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    // Display the current slide
    slides[slideIndex - 1].style.display = "block";

    // Call showSlides() again after 10 seconds
    setTimeout(showSlides, 10000);
}

function plusSlides(n) {
    slideIndex += n;
    showSlides();
}
