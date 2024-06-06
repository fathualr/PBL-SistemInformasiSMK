@extends('layouts.main')

@section('Main')

<h2 class="text-xl font-bold mb-8 text-center divider">Album Foto</h2>
<div class="lg:col-span-2 grid md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-y-14 lg:gap-y-8 lg:gap-4">
    @foreach($albums as $key => $album)
    @if($key % 6 == 0)
</div>

<div class="lg:col-span-2 grid md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-y-14 lg:gap-y-8 lg:gap-4">
    @endif
    @if($album->tipe_album === 'Foto')
    <div class="card md:mx-auto rounded-b-xl w-80 h-80 lg:h-72 lg:w-96 bg-cover transition-all duration-200 hover:scale-105" style="background-image: url('{{ asset('storage/' . $album->gambar_album) }}');">
        <div class=" bg-teal-50/70 rounded-none rounded-b-xl py-3 translate-y-[12.4rem] lg:py-3 lg:translate-y-[10.4rem]">
            <h2 class="card-title px-5 text-black/80">
                <p class="truncate w-80">{{ $album->nama_album }}</p>
            </h2>
            <p class="px-5 text-black/50 truncate w-64">{{ $album->deskripsi_album }}</p>
            <div class="card-actions justify-end">
                <a href="/guest/galeri-template/{{ $album->id_album }}" class="btn bg-transparent hover:bg-transparent border-none">
                    <img src="{{ asset('assetIcon/Arrow-Foto.svg') }}" class="object-cover rounded-full w-8 h-8 mt-3" />
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