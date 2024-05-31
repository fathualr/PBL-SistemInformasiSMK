@extends('layouts.main')

@section('Main')

<h2 class="text-xl font-bold mb-8 text-center divider">Program Keahlian</h2>
<div class="grid tablet:grid-cols-2 laptop:grid-cols-3 gap-y-16 laptop:gap-y-16 tablet:gap-y-28 tablet:gap-2 my-24">
    <!-- Kompetensi 1 -->
    @forelse($programKeahlian as $program)
    <div class="mx-auto">
        <div class="card card-compact smartphone:w-72 laptop:w-96 h-80 shadow-xl bg-indigo-500">
            <div class="avatar mx-auto h-28 -translate-y-10">
                <div class="w-24 h-24 rounded-full">
                    <img src="{{ asset($program->logo_program) }}" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-100">
                <h2 class="card-title justify-center text-center my-3 h-14">{{ $program->nama_program }}</h2>
                <p class="text-center truncate">{{ $program->deskripsi_program }}</p>
                <div class="card-actions justify-center">
                    <a href="/guest/program-keahlian-template/{{ $program->id_program }}">
                        <button class="btn bottom-0">Lihat Selengkapnya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-start-2">
        <h2 class="text-center text-2xl capitalize font-bold">Tidak ada data program Keahlian yang tersedia.</h2>

    </div>
    @endforelse
    <!-- Kompetensi 1 -->
</div>

@endsection