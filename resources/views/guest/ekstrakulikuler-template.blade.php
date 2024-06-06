@extends('layouts.main')

@section('Main')

<!-- Main Section -->
<section class="">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="font-bold text-2xl text-center">{{ $ekstrakulikuler->nama_ekstrakurikuler }}</h1>

            <div class="grid grid-cols-3 w-6/12 mx-auto">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <section class="p-8 bg-gray-100">
            <div class="container mx-auto flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h2 class="text-2xl font-bold mb-4">Tentang Ekstrakurikuler Ini</h2>
                    <div class="h-72 overflow-y-auto border-b-2 border-slate-800 py-4">
                        <p class="text-gray-700">{!! $ekstrakulikuler->deskripsi_ekstrakurikuler !!}
                        </p>
                    </div>
                    <table class="table my-5">
                        <tr>
                            <td class="font-bold">Pembimbing</td>
                            <td>:</td>
                            <td>{{ $ekstrakulikuler->guru->nama_guru }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Tempat</td>
                            <td>:</td>
                            <td class="w-64">
                                <p class="">{{ $ekstrakulikuler->tempat_ekstrakurikuler }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold">Jadwal</td>
                            <td>:</td>
                            <td>{{ $ekstrakulikuler->jadwal_ekstrakurikuler }}</td>
                        </tr>
                    </table>
                </div>
                <div class="md:w-1/2 flex justify-center md:justify-end">
                    <div class="flex space-x-4">
                        <div class="h-48 w-48">
                            <!-- Logo Ekstrakurikuler -->
                            <p class="text-gray-400 text-center">Logo Ekstrakurikuler</p>
                            <img class="mask mask-circle mx-auto w-44 h-44" src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" />
                        </div>
                        <div class="h-48 w-48 items-center justify-center">
                            <!-- Foto Pembimbing -->
                            <p class="text-gray-400 text-center">Guru Pembimbing</p>
                            <img class="mask mask-circle mx-auto w-44 h-44" src="{{ asset('storage/'.$ekstrakulikuler->guru->gambar_guru) }}" />
                        </div>
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
    <div class="relative w-full overflow-hidden my-10">
        <div class="flex transition-transform duration-500" id="slider">
            @if($ekstrakulikuler->gambar->isNotEmpty())
            @foreach ($ekstrakulikuler->gambar->chunk(4) as $chunk)
            <div class="w-full grid grid-cols-4 justify-center items-center" style="min-width: 100%;">
                @foreach ($chunk as $gambar)
                <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $gambar->id_gambar_ekstrakurikuler }}'].showModal()">
                    <img src="{{ asset('storage/'. $gambar->gambar_ekstrakurikuler) }}" class="w-full h-64 object-cover rounded-sm mx-auto" alt="Image {{ $gambar->id_ekstrakurikuler }}">
                </button>
                @endforeach
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute left-5 top-1/2 transform p-2 flex justify-center items-center" onclick="prevSlide()">
        <i class="fas fa-angle-left text-white"></i>
    </button>
    <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute right-5 top-1/2 transform p-2 flex justify-center items-center" onclick="nextSlide()">
        <i class="fas fa-angle-right text-white"></i>
    </button>
</div>

@foreach ($ekstrakulikuler->gambar as $gambar)
<dialog id="my_modal_view{{ $gambar->id_gambar_ekstrakurikuler }}" class="modal">
    <div class="modal-box w-11/12 max-w-7xl bg-transparent shadow-none p-5">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute -top-1 -right-0">
                <i class="fas fa-times text-2xl text-white"></i>
            </button>
        </form>
        <img src="{{ asset('storage/'. $gambar->gambar_ekstrakurikuler) }}" class="w-11/12 h-1/2 object-cover rounded-sm mx-auto" alt="Image 1">
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
@endforeach

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