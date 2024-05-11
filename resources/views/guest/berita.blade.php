@extends('layouts.main')
@section('Main')

<div class="divider">
    <p class="font-bold text-xl">Berita</p>
</div>

{{-- <div class="grid grid-cols-2">
    <p class="font-bold text-lg">BERITA TERBARU</p>
    <a class="link link-primary text-end">see all</a>
</div> --}}

<div class="grid grid-cols-3 gap-2 gap-y-20 my-10">
    @if ($berita->isEmpty())
        <div class="flex justify-center">
            <p class="text-xs text-red-500">Tidak ada Berita yang tersedia.</p>
        </div>
    @else
        @foreach ($berita as $brt)
            <div class="card w-96 bg-base-100 rounded-sm shadow-lg">
                <figure>
                    <img src="{{ asset('storage/'.$brt->gambar_headline) }}" alt="Nama Gambar">
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $brt->judul_berita }}</h2>
                    <p class="truncate text-gray-700">
                        {{ $brt->isi_berita }}
                    </p>
                    <a href="/guest/berita-template/{{ $brt->id_berita }}" class="text-blue-500 hover:underline">Read more</a>
                </div>
            </div>
        @endforeach
    @endif
</div>

<div class="grid grid-cols-2">
    <p class="font-bold " style="font-size: larger;">Recent post</p>
</div>

<button class="btn btn-outline btn-xs w-20 rounded-full">
    Default
</button>
<button class="btn btn-outline btn-primary btn-xs w-20 rounded-full">
    Primary
</button>
<button class="btn btn-outline btn-success btn-xs w-20 rounded-full">
    Success
</button>
<button class="btn btn-outline btn-info btn-xs w-20 rounded-full">
    Info
</button>
</div>

@endsection