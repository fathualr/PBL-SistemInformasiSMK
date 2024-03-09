// Navbar
document.addEventListener("DOMContentLoaded", function () {
    var navbar = document.getElementById("navbar");
    var navbarText = document.getElementById("nav-text");

    window.addEventListener("scroll", function () {
        if (window.scrollY > document.querySelector(".carousel").offsetHeight) {
            navbar.classList.remove("backdrop-blur-sm");
            navbar.classList.add("bg-lochinvar");

            navbarText.classList.add("text-white");
        } else {
            navbar.classList.remove("bg-lochinvar");
            navbar.classList.add("backdrop-blur-sm");

            navbarText.classList.remove("text-white");
        }
    });
});
// Navbar

// Carousel
let currentSlide = 0;
const slides = document.querySelectorAll(".carousel-item");
const totalSlides = slides.length;

function showSlide(n) {
    slides.forEach((slide) => {
        slide.classList.add("hidden");
    });
    slides[n].classList.remove("hidden");
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
}

setInterval(nextSlide, 4000);
// Carousel
