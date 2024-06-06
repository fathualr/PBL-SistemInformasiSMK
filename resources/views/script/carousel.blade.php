<script>
let currentIndex = 0;
let autoSlideInterval;

function showSlide(index) {
    const carousel = document.getElementById('carousel');
    const slides = carousel.children;
    const totalSlides = slides.length;

    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }

    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
        nextSlide();
    }, 2000);
}

function stopAutoSlide() {
    clearInterval(autoSlideInterval);
}

document.addEventListener('DOMContentLoaded', () => {
    showSlide(currentIndex);
    startAutoSlide();

    document.getElementById('carousel').addEventListener('mouseenter', stopAutoSlide);
    document.getElementById('carousel').addEventListener('mouseleave', startAutoSlide);
});
</script>