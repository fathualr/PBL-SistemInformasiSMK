@extends('layouts.main')

@section('Main')

<div class="flex flex-col w-full border-opacity-50 mb-10">
    @foreach($albums as $album)
    <div class="divider text-3xl font-bold">{{ $album->nama_album }}</div>
    <p class="my-5 text-center mx-auto">{{ $album->deskripsi_album }}</p>
    @endforeach
</div>

<div class="lg:col-span-2 grid md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-y-14 lg:gap-y-8 lg:gap-6">
    @foreach($fotos->chunk(16) as $chunk)
    @foreach($chunk as $foto)
    <button>
        <img class="object-cover object-center w-96 h-44 max-w-full rounded-lg" src="{{ asset('/' . $foto->tautan_foto) }}" alt="gallery foto" />
    </button>
    @endforeach
    @endforeach
</div>

<div class="join flex justify-center my-5">
    @if ($fotos->onFirstPage())
    <button class="join-item btn disabled">«</button>
    @else
    <a href="{{ $fotos->previousPageUrl() }}" class="join-item btn">«</a>
    @endif

    <button class="join-item btn">Page {{ $fotos->currentPage() }}</button>

    @if ($fotos->hasMorePages())
    <a href="{{ $fotos->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>
@endsection