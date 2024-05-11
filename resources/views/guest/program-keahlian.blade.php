@extends('layouts.main')

@section('Main')

<div class="grid tablet:grid-cols-2 laptop:grid-cols-3 gap-y-16 laptop:gap-y-16 tablet:gap-y-28 tablet:gap-2 my-24">
    <!-- Kompetensi 1 -->
    @foreach($programKeahlian as $index => $program)
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
                    <a href="/guest/detail-program/{{ $program->id_program }}">
                        <button class="btn bottom-0">Lihat Selengkapnya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Kompetensi 1 -->
</div>

@endsection