@extends('layouts.main')

@section('Main')

<div class="grid grid-cols-2 place-items-center">
    <!-- Title -->
    <div class="col-span-2 flex flex-col items-center">
        <h1 class="font-bold text-2xl text-center">{{ $berita->judul_berita }}</h1>
        <p class="text-sm text-slate-600 my-3">{{ $berita->tanggal_berita }}</p>
    </div>
    <!-- Title -->

    <!-- Image -->
    <div class="col-span-2 my-5 w-full">
        <img class="w-full" src="{{ asset('storage/'.$berita->gambar_headline) }}" alt="Nama Gambar">
    </div>
    <!-- Image -->

    <!-- Text -->
    <div class="col-span-2 h-full w-full">
        <p>
            {{ $berita->isi_berita }}
        </p>
    </div>
    <!-- Text -->

    <!-- Gambar -->
    @if($berita->gambar->isNotEmpty())
    <div class="col-span-2 h-full w-full mt-10">
        @foreach ($berita->gambar as $gambar)
            <div class="flex justify-center">
                <img class="w-3/12" src="{{ asset('storage/'. $gambar->tautan_gambar) }}" alt="">
            </div>
        @endforeach
    </div>
    @endif
    <!-- Gambar -->

    <!-- Kategori -->
    @if($berita->kategori->isNotEmpty())
    <div class="col-span-2 h-full w-full mt-10">
        <p>Kategori:</p>
        @foreach ($berita->kategori as $kategori)
        <a href="">
            <div class="badge badge-neutral">{{ $kategori->nama_kategori }}</div>
            </a>
        @endforeach
    </div>
    @endif
    <!-- Kategori -->
    
    <!-- Side -->
    <!-- <div class=" h-full w-full">

        <div class="sticky top-28 space-y-3">

            <h1 class="font-bold text-center text-2xl my-5">Baca Juga</h1>

            <div class="card card-side bg-base-100 shadow-xl w-3/4 h-24 mx-auto">
                <figure>
                    <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                        class="w-32" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title text-base">New movie is released!</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary h-5">Watch</button>
                    </div>
                </div>
            </div>

            <div class="card card-side bg-base-100 shadow-xl w-3/4 h-24 mx-auto">
                <figure>
                    <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                        class="w-32" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary h-5">Watch</button>
                    </div>
                </div>
            </div>

            <div class="card card-side bg-base-100 shadow-xl w-3/4 h-24 mx-auto">
                <figure>
                    <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                        class="w-32" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary h-5">Watch</button>
                    </div>
                </div>
            </div>

            <div class="card card-side bg-base-100 shadow-xl w-3/4 h-24 mx-auto">
                <figure>
                    <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                        class="w-32" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary h-5">Watch</button>
                    </div>
                </div>
            </div>
        </div>

    </div> -->
    <!-- Side -->
</div>

<div class="divider my-5"></div>
<!-- Comments -->
<div class=" w-full">
    <form action="">
        <label class="form-control">
            <div class="label">
                <span class="label-text font-bold text-xl">Komentar</span>
            </div>
            <textarea class="textarea textarea-bordered textarea-lg w-full h-32"
                placeholder="Tulis Komentar Anda Disini"></textarea>
        </label>
        <a href="" class="flex justify-end my-5">
            <button class="btn btn-outline btn-accent font-bold">
                <i class="fas fa-paper-plane"></i>
                <span>Kirim</span>
            </button>
        </a>
    </form>
</div>
<!-- Comments -->
<div class="divider my-5"></div>
<!-- Show Others Comments -->
<div class="w-full">
    <div class="chat chat-start">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full border-2 place-content-center">
                <div class="text-center">
                    <i class="fas fa-user text-xl"></i>
                </div>
            </div>
        </div>
        <div class="chat-bubble">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero nesciunt odio tempore
                exercitationem architecto fuga maiores optio, eaque veritatis deserunt omnis est pariatur quaerat
                perferendis, soluta rem praesentium tenetur laudantium.</p>
            <span class="flex justify-end items-end text-sm text-slate-300 pt-5">2024-09-12</span>
        </div>
    </div>
    <div class="chat chat-start">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full border-2 place-content-center">
                <div class="text-center">
                    <i class="fas fa-user text-xl"></i>
                </div>
            </div>
        </div>
        <div class="chat-bubble">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero nesciunt odio tempore
                exercitationem architecto fuga maiores optio, eaque veritatis deserunt omnis est pariatur quaerat
                perferendis, soluta rem praesentium tenetur laudantium.</p>
            <span class="flex justify-end items-end text-sm text-slate-300 pt-5">2024-09-12</span>
        </div>
    </div>
    <div class="chat chat-start">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full border-2 place-content-center">
                <div class="text-center">
                    <i class="fas fa-user text-xl"></i>
                </div>
            </div>
        </div>
        <div class="chat-bubble">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero nesciunt odio tempore
                exercitationem architecto fuga maiores optio, eaque veritatis deserunt omnis est pariatur quaerat
                perferendis, soluta rem praesentium tenetur laudantium.</p>
            <span class="flex justify-end items-end text-sm text-slate-300 pt-5">2024-09-12</span>
        </div>
    </div>
</div>
<!-- Show Others Comments -->

@endsection