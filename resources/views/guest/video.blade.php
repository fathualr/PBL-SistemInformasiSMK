@extends('layouts.main')

@section('Main')
<div class="lg:col-span-2 grid md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-y-14 lg:gap-y-8 lg:gap-4">
    @foreach($albums as $key => $album)
    @if($key % 6 == 0) 
</div>
<div class="lg:col-span-2 grid md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-y-14 lg:gap-y-8 lg:gap-4">
    @endif
    @if($album->tipe_album === 'Video')
    <div class="card md:mx-auto rounded-b-xl w-80 h-80 lg:h-96 lg:w-96 bg-cover bg-[url(https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg)]">
        <div class=" bg-dark-lochinvar/70 rounded-none rounded-b-xl py-8 lg:py-8 translate-y-[9.75rem] lg:translate-y-[13.75rem]">
            <h2 class="card-title px-5 text-white">{{ $album->nama_album }}</h2>
            <p class="px-5 text-white">{{ $album->deskripsi_album }}</p>
            <div class="card-actions justify-end">
                <a href="/guest/galeri-template-video/{{ $album->id_album }}" class="btn bg-transparent hover:bg-transparent border-none">
                    <img src="{{ asset('assets/Arrow-Foto.svg') }}" class="object-cover rounded-full w-8 h-8 mt-8" />
                </a>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<div class="join flex justify-center my-5">
    @if ($albums->onFirstPage())
    <button class="join-item btn disabled">«</button>
    @else
    <a href="{{ $albums->previousPageUrl() }}" class="join-item btn">«</a>
    @endif

    <button class="join-item btn">Page {{ $albums->currentPage() }}</button>

    @if ($albums->hasMorePages())
    <a href="{{ $albums->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>

@endsection