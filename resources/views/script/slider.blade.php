<script>
let currentIndex = 0;
let autoSlideInterval;

function showSlide(index) {
    const slider = document.getElementById('slider');
    const slides = Array.from(slider.children);
    const totalSlides = slides.length;

    // Determine the number of slides per view based on screen size
    let slidesPerView = 1; // Default for mobile
    if (window.innerWidth >= 1024) {
        slidesPerView = 4; // For desktop
    } else if (window.innerWidth >= 640) {
        slidesPerView = 2; // For tablet
    }

    if (index >= totalSlides / slidesPerView) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = Math.ceil(totalSlides / slidesPerView) - 1;
    } else {
        currentIndex = index;
    }

    const slideWidth = 100 / slidesPerView;
    const offset = -currentIndex * 100;
    slider.style.transform = `translateX(${offset}%)`;

    slides.forEach((slide) => {
        slide.style.flex = `0 0 ${slideWidth}%`;
    });
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 2500);
}

function stopAutoSlide() {
    clearInterval(autoSlideInterval);
}

document.addEventListener('DOMContentLoaded', () => {
    showSlide(currentIndex);
    startAutoSlide();

    const slider = document.getElementById('slider');
    slider.addEventListener('mouseenter', stopAutoSlide);
    slider.addEventListener('mouseleave', startAutoSlide);

    window.addEventListener('resize', () => showSlide(currentIndex));
});
</script>