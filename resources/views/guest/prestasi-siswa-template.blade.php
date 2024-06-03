@extends('layouts.main')

@section('Main')

<div class="grid grid-cols-2">
    <!-- Image -->
    <div class="col-span-2 my-5 w-full">
        <img class="w-[55rem] h-[25rem] rounded-xl mx-auto" src="{{ asset('storage/'.$PrestasiSiswa->gambar_prestasi) }}" alt="Nama Gambar">
    </div>
    <!-- Image -->

    <!-- Title -->
    <div class="col-span-2 text-start w-full">
        <h1 class="font-bold text-2xl">{{ $PrestasiSiswa->nama_prestasi }}</h1>
        <p class="text-sm text-slate-600 mb-10">{{ $PrestasiSiswa->created_at }}</p>
    </div>
    <!-- Title -->

    <!-- Text -->
    <div class="col-span-2 h-full w-full mb-5">
        <p>
            {{ $PrestasiSiswa->deskripsi_prestasi }}
        </p>

        <div class="relative w-full overflow-hidden my-10">
            <div class="flex transition-transform duration-500" id="slider">
                @if($PrestasiSiswa->gambar->isNotEmpty())
                @foreach ($PrestasiSiswa->gambar->chunk(2) as $chunk)
                <div class="w-full grid grid-cols-2 justify-center items-center" style="min-width: 100%;">
                    @foreach ($chunk as $gambar)
                    <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $gambar->id_gambar }}'].showModal()">
                        <img src="{{ asset('storage/'. $gambar->gambar) }}" class="w-full h-64 object-cover rounded-sm mx-auto" alt="Image {{ $gambar->id_gambar }}">
                    </button>
                    @endforeach
                </div>
                @endforeach
                @endif
            </div>

            <button id="prevButton" class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute left-5 top-1/2 transform -translate-y-1/2 p-2 flex justify-center items-center" onclick="prevSlide()">
                <i class="fas fa-angle-left text-white"></i>
            </button>
            <button id="nextButton" class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute right-5 top-1/2 transform -translate-y-1/2 p-2 flex justify-center items-center" onclick="nextSlide()">
                <i class="fas fa-angle-right text-white"></i>
            </button>
        </div>

    </div>
    <!-- Text -->

    @foreach ($PrestasiSiswa->gambar as $gambar)
    <dialog id="my_modal_view{{ $gambar->id_gambar }}" class="modal">
        <div class="modal-box w-11/12 max-w-7xl bg-transparent shadow-none p-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute -top-1 -right-0">
                    <i class="fas fa-times text-2xl text-white"></i>
                </button>
            </form>
            <img src="{{ asset('storage/'. $gambar->gambar) }}" class="w-11/12 h-1/2 object-cover rounded-sm mx-auto" alt="Image 1">
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    @endforeach

</div>


<script>
    let currentIndex = 0;
    let autoSlideInterval;

    function showSlide(index) {
        const slider = document.getElementById('slider');
        const slides = slider.children;
        const totalSlides = slides.length;

        if (index >= totalSlides) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = totalSlides - 1;
        } else {
            currentIndex = index;
        }

        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
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

        document.getElementById('slider').addEventListener('mouseenter', stopAutoSlide);
        document.getElementById('slider').addEventListener('mouseleave', startAutoSlide);
    });
</script>

@endsection