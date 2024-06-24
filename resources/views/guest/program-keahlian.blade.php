@extends('layouts.main')

@section('Main')

<h2 class="text-2xl font-bold text-center divider">PROGRAM KEAHLIAN</h2>
<div class="grid tablet:grid-cols-2 laptop:grid-cols-4 gap-y-16 laptop:gap-y-7 tablet:gap-y-28 tablet:gap-2 my-16 px-7">

    @forelse($programKeahlian as $program)
    <div class="mx-auto">
        <div
            class="card card-compact smartphone:w-72 laptop:w-64 h-80 shadow-xl transition-all duration-200 hover:scale-105">
            <figure>
                <img src="{{ asset('storage/' . $program->logo_program) }}" class="h-28 w-full object-cover blur-sm"
                    alt="Shoes" />
            </figure>
            <div
                class="avatar absolute mx-auto h-28 smartphone:translate-x-[5.5rem] laptop:translate-x-[4.5rem] translate-y-7">
                <div class="w-28 h-28 rounded-full">
                    <img src="{{ asset('storage/'.$program->logo_program) }}" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-200">
                <h2 class="card-title justify-center text-center my-3 h-14">{{ $program->nama_program }}</h2>
                <div class="h-24 overflow-y-hidden text-center">
                    <p class="text-center truncate">{!! $program->deskripsi_program !!}</p>
                </div>
                <div class="card-actions justify-center">
                    <a href="/guest/program-keahlian-template/{{ $program->id_program }}">
                        <button class="btn bg-blue-400 text-white hover:text-blue-400 bottom-0">Lihat
                            Selengkapnya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-2 laptop:col-start-2">
        <h2 class="text-center text-2xl capitalize font-bold">Tidak ada data program Keahlian yang tersedia.</h2>
    </div>
    @endforelse

</div>

@endsection