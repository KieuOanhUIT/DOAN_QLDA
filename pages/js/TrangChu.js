var slideIndex = 0;
showSlides();

function showSlides() {
    var slides = document.getElementsByClassName("slide");

    // Hide all slides
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Increase slideIndex and reset if needed
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    // Show the current slide
    slides[slideIndex - 1].style.display = "block";

    // Call showSlides() again after 10 seconds
    setTimeout(showSlides, 10000);
}

function plusSlides(n) {
    var slides = document.getElementsByClassName("slide");
    slideIndex += n;

    // Ensure slideIndex stays within bounds
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    if (slideIndex < 1) {
        slideIndex = slides.length;
    }

    // Hide all slides
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Show the current slide
    slides[slideIndex - 1].style.display = "block";
}

// Function to scroll smoothly to sections
function scrollToSection(event) {
    event.preventDefault();
    const targetId = event.target.getAttribute('href').substring(1);
    const targetSection = document.getElementById(targetId);
    if (targetSection) {
        targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Function to switch frames based on header links
function switchFrame(event) {
    event.preventDefault();
    const targetFrame = event.target.getAttribute('href');
    if (targetFrame) {
        const frameContainer = document.getElementById('frame-container');
        frameContainer.src = targetFrame;
    }
}

// Function to initialize event listeners
function initializeListeners() {
    // Header links for smooth scrolling
    document.querySelectorAll('.nav__item a').forEach(item => {
        item.addEventListener('click', scrollToSection);
    });

    // Header links for frame switching
    document.querySelectorAll('.nav__item a[data-frame]').forEach(item => {
        item.addEventListener('click', switchFrame);
    });
}

// Call initializeListeners on window load
window.onload = initializeListeners