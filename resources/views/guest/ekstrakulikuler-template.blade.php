@extends('layouts.main')

@section('Main')

<!-- Main Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="font-bold text-2xl text-center">{{ $ekstrakulikuler->nama_ekstrakurikuler }}</h1>

            <div class="grid grid-cols-3 w-6/12 mx-auto">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <section class="py-16 bg-gray-200 my-10">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold">Pembimbing</h2>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Pembimbing Image -->
                    <div>
                        <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                            class="mask mask-squircle w-full h-64" alt="Pembimbing">
                    </div>
                    <!-- Pembimbing Description -->
                    <div class="flex items-center">
                        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

<div class="relative w-full overflow-hidden">
    <div class="text-center">
        <h1 class="font-bold text-2xl text-center">Foto Kegiatan</h1>

        <div class="grid grid-cols-3 w-6/12 mx-auto">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
    </div>
    <div class="flex transition-transform duration-500" id="slider" style="width: 300%;">
        <div class="w-full grid grid-cols-4 justify-center items-center">
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
        </div>
        <div class="w-full grid grid-cols-4 justify-center items-center">
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
        </div>
        <div class="w-full grid grid-cols-4 justify-center items-center">
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110"
                onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
                    class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
        </div>
    </div>
    <button
        class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute left-5 top-1/2 transform p-2 flex justify-center items-center"
        onclick="prevSlide()">
        <i class="fas fa-angle-left text-white"></i>
    </button>
    <button
        class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute right-5 top-1/2 transform p-2 flex justify-center items-center"
        onclick="nextSlide()">
        <i class="fas fa-angle-right text-white"></i>
    </button>
</div>

<dialog id="my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}" class="modal">
    <div class="modal-box w-11/12 max-w-7xl bg-transparent shadow-none p-5">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute -top-1 -right-0">
                <i class="fas fa-times text-2xl text-white"></i>
            </button>
        </form>
        <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}"
            class="w-11/12 h-1/2 object-cover rounded-sm mx-auto" alt="Image 1">
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

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

    slider.style.transform = `translateX(-${currentIndex * 100 / totalSlides}%)`;
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
});

document.getElementById('slider').addEventListener('mouseenter', stopAutoSlide);
document.getElementById('slider').addEventListener('mouseleave', startAutoSlide);
</script>

@endsection