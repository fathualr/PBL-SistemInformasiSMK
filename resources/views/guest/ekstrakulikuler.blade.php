@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-xl">EKSTRAKULIKULER</p>
</div>

<div class="grid grid-cols-3 gap-4 grid-flow-row my-24">
    
    @foreach ($ekstrakulikuler as $ekskul )
    <div class="mx-auto mt-6">
        <a href="/guest/ekstrakulikuler-template/{{ $ekskul->id_ekstrakurikuler }}">
            <div class="card card-compact w-11/12 bg-base-100 shadow-xl">
                <figure class="">
                    <img src="{{ asset('storage/'. $ekskul->gambar_profil_ekstrakurikuler) }}" class="h-64 w-96" alt="Shoes" />
                </figure>
                <p class="absolute bottom-28 font-bold ml-5 text-white">{{ $ekskul->nama_ekstrakurikuler }}</p>
                <div class="card-body">
                    <table class="">
                        <tr>
                            <td class="font-bold">Pembimbing</td>
                            <td>:</td>
                            <td>{{ $ekskul->guru->nama_guru }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Tempat</td>
                            <td>:</td>
                            <td class="w-64">
                                <p class="truncate w-56">{{ $ekskul->tempat_ekstrakurikuler }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold">Jadwal</td>
                            <td>:</td>
                            <td>{{ $ekskul->jadwal_ekstrakurikuler }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </a>
    </div>
    @endforeach

</div>

@endsection