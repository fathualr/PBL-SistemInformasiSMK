@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-xl">EKSTRAKULIKULER</p>
</div>

<div class="grid grid-cols-3 gap-4 gap-y-14 my-24">
    @foreach ($ekstrakulikuler as $ekskul )
    @foreach($direktoriGuru as $guru)
    @if($ekskul->id_guru === $guru->id_guru)

    <div class="mx-auto my-10">
        <a href="/guest/ekstrakulikuler-template/{{ $ekskul->id_ekstrakurikuler }}">
            <div class="card card-compact w-full bg-base-100 shadow-xl">
                <figure class="">
                    <img src="{{ asset('storage/'. $ekskul->gambar_profil_ekstrakurikuler) }}" class="h-64 w-96"
                        alt="Shoes" />
                </figure>
                <p class="absolute bottom-28 font-bold ml-5 text-white">{{ $ekskul->nama_ekstrakurikuler }}</p>
                <div class="card-body">
                    <table class="">
                        <tr>
                            <td class="font-bold">Pembimbing</td>
                            <td>:</td>
                            <td>{{ $guru->nama_guru }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Tempat</td>
                            <td>:</td>
                            <td>{{ $ekskul->tempat_ekstrakurikuler }}</td>
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

    @endif
    @endforeach
    @endforeach
</div>

@endsection