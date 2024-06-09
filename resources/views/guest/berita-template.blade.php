@extends('layouts.main')

@section('Main')

<div class="grid grid-cols-3">
    <div class="col-span-2">
        <!-- Image -->
        <div class="col-span-2 my-5 w-full">
            <img class="w-[55rem] h-[25rem] rounded-xl mx-auto" src="{{ asset('storage/'.$berita->gambar_headline) }}" alt="Nama Gambar">
        </div>

        <div class="col-span-2 grid grid-cols-2 gap-4 justify-center items-center w-full">
            <!-- Kategori -->
            @if($berita->kategori->isNotEmpty())
            <div class="h-full w-full mt-10">
                @foreach ($berita->kategori as $kategori)
                <a href="">
                    <div class="badge bg-blue-600 opacity-45 text-white capitalize p-4">{{ $kategori->nama_kategori }}
                    </div>
                </a>
                @endforeach
            </div>
            @endif

            <div class="col-start-2 flex justify-end items-center">
                <span class="badge gap-4 text-lg bg-transparent border-none">
                    <i class="far fa-message"></i>
                    {{ $berita->komentar->count() }}
                </span>
            </div>
        </div>

        <!-- Title -->
        <div class="col-span-2 text-start w-full">
            <h1 class="font-bold text-2xl">{{ $berita->judul_berita }}</h1>
            <p class="text-sm text-slate-600 mb-10">{{ $berita->created_at }}</p>
        </div>

        <div class="col-span-2 h-full w-full mb-5">
            <p>
                {!! $berita->isi_berita !!}
            </p>

            <div class="relative w-full overflow-hidden my-10">
                <div class="flex transition-transform duration-500" id="slider" style="width: 100%;">
                    @if($berita->gambar->isNotEmpty())
                    @foreach ($berita->gambar->chunk(2) as $chunk)
                    <div class="w-full grid grid-cols-2 justify-center items-center" style="min-width: 100%;">
                        @foreach ($chunk as $gambar)
                        <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $gambar->id_gambar }}'].showModal()">
                            <img src="{{ asset('storage/'. $gambar->tautan_gambar) }}" class="w-full h-64 object-cover rounded-sm mx-auto" alt="Image {{ $gambar->berita_id }}">
                        </button>
                        @endforeach
                    </div>
                    @endforeach
                    @endif
                </div>
                <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute left-5 top-1/2 transform -translate-y-1/2 p-2 flex justify-center items-center" onclick="prevSlide()">
                    <i class="fas fa-angle-left text-white"></i>
                </button>
                <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute right-5 top-1/2 transform -translate-y-1/2 p-2 flex justify-center items-center" onclick="nextSlide()">
                    <i class="fas fa-angle-right text-white"></i>
                </button>
            </div>
        </div>
        <!-- Text -->
    </div>

    @foreach ($berita->gambar as $gambar)
    <dialog id="my_modal_view{{ $gambar->id_gambar}}" class="modal">
        <div class="modal-box w-11/12 max-w-7xl bg-transparent shadow-none p-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute -top-1 -right-0">
                    <i class="fas fa-times text-2xl text-white"></i>
                </button>
            </form>
            <img src="{{ asset('storage/'. $gambar->tautan_gambar) }}" class="w-11/12 h-1/2 object-cover rounded-sm mx-auto" alt="Image 1">
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    @endforeach

    <div class="col-start-3 ">
        <h2 class="font-bold text-xl ml-10 my-5">Berita Terbaru</h2>
        <div class="grid grid-rows-3 grid-flow-row ml-10 gap-4">
            @foreach($latestBerita as $latest)
            <div class="card w-68 h-64 bg-base-100 shadow-xl mx-auto transition-all duration-200 hover:scale-105">
                <figure><img src="{{ asset('storage/'.$latest->gambar_headline) }}" alt="Gambar Berita" /></figure>
                <div class="card-body h-24 p-5">
                    <div class="grid grid-cols-2 justify-center items-end">
                        <div class="w-full">
                            <h2 class="font-bold text-lg truncate">
                                {{ $latest->judul_berita }}
                            </h2>
                        </div>
                        <div class="flex justify-end items-end">
                            <span class="badge gap-4 text-sm bg-transparent border-none">
                                <i class="far fa-message"></i>
                                {{ $latest->komentar->count() }}
                            </span>
                        </div>
                    </div>
                    <a href="/guest/berita-template/{{ $latest->id_berita }}" class="text-blue-500 hover:underline text-sm">Read more</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="divider my-5"></div>
<!-- Comments -->
<div class=" w-full">

    @include('shared.success-message')
    @include('shared.error-message')
    <form action="{{ route('komentarBerita.store', $berita->id_berita) }}" method="POST">
        @csrf
        @method('POST')
        <label class="form-control gap-2">
            <div class="label">
                <span class="label-text font-bold text-xl">Komentar</span>
            </div>
            <input type="text" placeholder="Nama Anda" class="input input-bordered w-full" name="nama_komentar" />
            <textarea class="textarea textarea-bordered textarea-lg w-full h-32" placeholder="Tulis Komentar Anda Disini" name="teks_komentar"></textarea>
        </label>
        <div class="flex justify-end my-5">
            <button type="submit" class="btn btn-outline btn-accent font-bold">
                <i class="fas fa-paper-plane"></i>
                <span>Kirim</span>
            </button>
        </div>
    </form>

</div>
<!-- Comments -->
<div class="divider my-5"></div>
<!-- Show Others Comments -->
<div class="w-full">

    @foreach($berita->komentar as $komentar)
    <div class="chat chat-start">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full border-2 place-content-center">
                <div class="text-center">
                    <i class="fas fa-user text-xl"></i>
                </div>
            </div>
        </div>
        <div class="chat-header">
            {{ $komentar->nama_komentar }}
            <time class="text-xs opacity-50">{{ $komentar->created_at->format('d M Y H:i:s') }}</time>
        </div>
        <div class="chat-bubble">
            <p>{{ $komentar->teks_komentar }}</p>
        </div>
    </div>
    @endforeach

</div>
<!-- Show Others Comments -->

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