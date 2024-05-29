@extends('layouts.main')

@section('Main')

<div class="grid grid-cols-2 place-items-center">
    <!-- Title -->
    <div class="col-span-2 flex flex-col items-center">
        <h1 class="font-bold text-2xl text-center">{{ $PrestasiSiswa->nama_prestasi }}</h1>

        <p class="text-sm text-slate-600 my-3"> {{ $PrestasiSiswa->tanggal_prestasi }}</p>
    </div>
    <!-- Title -->

    <!-- Image -->
    <div class="col-span-2 my-5">
        <img class="w-full h-full" src="{{ asset('storage/'.$PrestasiSiswa->gambar_prestasi) }}">
    </div>
    <!-- Image -->

    <!-- Text -->
    <div class="col-span-2 h-full w-full">
        <p>
            {{ $PrestasiSiswa->deskripsi_prestasi }}
        </p>
    </div>
    <!-- Text -->

    <!-- Gambar -->
    @if($PrestasiSiswa->gambar->isNotEmpty())
    <div class="col-span-2 h-full w-full mt-10">
        @foreach ($PrestasiSiswa->gambar as $gambar)
            <div class="flex justify-center">
                <img class="w-3/12" src="{{ asset('storage/'. $gambar->gambar) }}" alt="">
            </div>
        @endforeach
    </div>
    @endif
    <!-- Gambar -->
</div>


@endsection