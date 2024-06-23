<!-- JavaScript for loader -->
<script>
window.addEventListener('load', () => {
    setTimeout(() => {
        document.body.classList.add('loaded');
    }, 2000);
});


document.addEventListener("DOMContentLoaded", function() {
    var lazyBgImages = document.querySelectorAll('.lazy-bg');

    function lazyLoadBgImages() {
        lazyBgImages.forEach(function(bgImage) {
            if (isElementInViewport(bgImage)) {
                bgImage.style.backgroundImage = "url('" + bgImage.dataset.bg + "')";
                bgImage.classList.remove('lazy-bg');
            }
        });
    }

    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    lazyLoadBgImages();

    window.addEventListener('scroll', lazyLoadBgImages);
});
</script>