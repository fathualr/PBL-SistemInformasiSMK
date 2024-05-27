@extends('layouts.main')

@section('Main')

<div class="grid grid-cols-2 place-items-center">
    <!-- Title -->
    <div class="col-span-2 flex flex-col items-center">
        <h1 class="font-bold text-2xl text-center">{{ $ekstrakulikuler->nama_ekstrakurikuler }}</h1>
        <p class="text-sm text-slate-600 my-3"></p>
    </div>
    <!-- Title -->

    <!-- Image -->
    <div class="col-span-2 carousel w-full">
        @foreach ( $ekstrakulikuler -> gambarEkstrakurikuler as $ekskul )
        <div id="slide1" class="carousel-item relative w-full mx-auto">
            <img src="{{ asset('storage/'. $ekskul->gambar_ekstrakurikuler) }}" class="w-fit h-5/12 mx-auto" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide4" class="btn btn-circle">❮</a>
                <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Image -->

</div>


@endsection