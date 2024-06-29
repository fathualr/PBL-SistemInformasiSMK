@extends('layouts.main')

@section('Main')

<div class="flex flex-col w-full border-opacity-50 mb-10">
    @foreach($albums as $album)
    <div class="tablet:divider smartphone:text-center smartphone:text-lg tablet:text-2xl font-bold">
        {{ $album->nama_album }}
    </div>
    <p class="my-5 text-center mx-auto">{{ $album->deskripsi_album }}</p>
    @endforeach
</div>

<div class="lg:col-span-2 grid md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-y-14 lg:gap-y-8 lg:gap-6">
    @foreach($videos->chunk(6) as $chunk)
    @foreach($chunk as $video)
    <div class="smartphone:w-80 laptop:w-96 h-52">
        <iframe class="smartphone:w-80 laptop:w-96 h-52" src="{{ $video->embed_link }}" allowfullscreen></iframe>
    </div>
    @endforeach
    @endforeach
</div>

<div class="join flex justify-center my-5">
    @if ($videos->onFirstPage())
    <button class="join-item btn disabled">«</button>
    @else
    <a href="{{ $videos->previousPageUrl() }}" class="join-item btn">«</a>
    @endif

    <button class="join-item btn">Halaman {{ $videos->currentPage() }}</button>

    @if ($videos->hasMorePages())
    <a href="{{ $videos->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>
@endsection