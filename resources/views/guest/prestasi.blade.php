@extends('layouts.main')
@section('Main')

<div class="divider">
    <p class="font-bold text-xl">Prestasi Siswa</p>
</div>

<div class="grid grid-cols-1 gap-y-10">

    @foreach($PrestasiSiswa as $prestasi)
    <div class="card lg:card-side bg-base-100 shadow-xl">
        <figure class="h-full w-80 overflow-hidden">
            <img class="object-cover w-[30rem] h-72" src="{{ asset('storage/'.$prestasi->gambar_prestasi) }}"
                alt="Album" />
        </figure>
        <div class="card-body">
            <h2 class="text-2xl font-bold my-5 truncate w-[25rem]">{{ $prestasi->nama_prestasi }}</h2>
            <p class="truncate w-72">
                {{ $prestasi->deskripsi_prestasi }}
            </p>
            <div class="card-actions justify-end">
                <a href="/guest/prestasi-siswa-template/{{ $prestasi->id_prestasi }}">
                    <button
                        class="btn bg-blue-400 mx-auto md:mx-0 md:w-full h-10 rounded-sm border-none text-white mt-8 hover:text-blue-400">
                        Baca Selengkapnya >>
                    </button>
                </a>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection