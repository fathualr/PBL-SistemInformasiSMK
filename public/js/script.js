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

var inputPenghasilanWali = document.getElementById('penghasilan_wali');

// Menambahkan event listener untuk mengubah format saat nilai diubah
inputPenghasilanWali.addEventListener('input', function(e) {
    // Menghapus karakter non-digit dan mengonversi ke integer
    var angka = parseInt(this.value.replace(/[^\d]/g, ''), 10);
    // Memastikan angka tidak kurang dari 0
    if (angka < 0) {
        angka = 0;
    }
    // Memformat nilai menjadi Rupiah
    this.value = formatRupiah(angka);
});

// Fungsi untuk memformat angka menjadi Rupiah
function formatRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp ' + rupiah.split('', rupiah.length - 1).reverse().join('');
}

  // PPDB Format Rupaiah Penghasilan Wali