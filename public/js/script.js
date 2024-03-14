// Navbar
document.addEventListener("DOMContentLoaded", function () {
    var navbar = document.getElementById("navbar");
    var navbarText = document.getElementById("nav-text");

    window.addEventListener("scroll", function () {
        if (window.scrollY > document.querySelector(".carousel").offsetHeight) {
            navbar.classList.remove("bg-transparent");
            navbar.classList.add("bg-dark-lochinvar");

            navbarText.classList.add("text-white");
        } else {
            navbar.classList.remove("bg-dark-lochinvar");
            navbar.classList.add("bg-transparent");

            navbarText.classList.remove("text-white");
        }
    });
});
// Navbar

// Carousel
document.addEventListener("DOMContentLoaded", function () {
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
});

// Carousel
