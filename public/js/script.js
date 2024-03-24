// Navbar
document.addEventListener("DOMContentLoaded", function () {
    var navbar = document.getElementById("navbar");
    var navbarText = document.getElementById("nav-text");

    window.addEventListener("scroll", function () {
        if (window.scrollY > document.querySelector(".carousel").offsetHeight) {
            navbar.classList.remove("bg-transparent");
            navbar.classList.add("bg-blue-lagoon");

            navbarText.classList.add("text-white");
        } else {
            navbar.classList.remove("bg-blue-lagoon");
            navbar.classList.add("bg-transparent");

            navbarText.classList.remove("text-white");
        }
    });
});
// Navbar

// Carousel
document.addEventListener("DOMContentLoaded", function () {
    let currentSlide = 0;
    const slides = document.querySelectorAll(".carousel-item ");
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

    setInterval(nextSlide, 5000);
});
// Carousel

// Navbar Dropdown
document.addEventListener("DOMContentLoaded", function () {
    const detailsElements = document.querySelectorAll("details");

    detailsElements.forEach(function (detailsElement) {
        detailsElement.addEventListener("toggle", function () {
            if (detailsElement.open) {
                closeOtherDetails(detailsElement);
            }
        });
    });

    function closeOtherDetails(currentDetails) {
        detailsElements.forEach(function (details) {
            if (details !== currentDetails && details.open) {
                details.open = false;
            }
        });
    }
});

// Navbar Dropdown

// PPDB Format Rupaiah Penghasilan Wali
var inputPenghasilanWali = document.getElementById("penghasilan_wali");

inputPenghasilanWali.addEventListener("input", function (e) {
    var angka = parseInt(this.value.replace(/[^\d]/g, ""), 10);
    if (angka < 0) {
        angka = 0;
    }
    this.value = formatRupiah(angka);
});

function formatRupiah(angka) {
    var rupiah = "";
    var angkarev = angka.toString().split("").reverse().join("");
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ".";
    return (
        "Rp " +
        rupiah
            .split("", rupiah.length - 1)
            .reverse()
            .join("")
    );
}

// PPDB Format Rupaiah Penghasilan Wali
