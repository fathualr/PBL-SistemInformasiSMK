<script>
    const carouselInner = document.querySelector('.carousels > .flex');
    const carouselItems = document.querySelectorAll('.carousel-items');
    let index = 0;

    const autoSlide = () => {
        index = (index + 1) % carouselItems.length;
        carouselInner.style.transform = `translateX(-${index * 100}%)`;
    };

    setInterval(autoSlide, 5000);

    const title =
        `Halaman {{ $title }} {!! empty($konten->nama_sekolah) ? '<p class="text-slate-400 italic">Konten Belum Tersedia</p>' : $konten->nama_sekolah !!}`;
    new Typed('#element', {
        strings: [title],
        typeSpeed: 50,
        showCursor: false,
        loop: true,
        loopCount: Infinity,
    });
</script>