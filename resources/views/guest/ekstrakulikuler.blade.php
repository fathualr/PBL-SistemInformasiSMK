@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold smartphone:text-lg tablet:text-2xl">EKSTRAKULIKULER</p>
</div>

<div class="flex smartphone:justify-center tablet:justify-end">
    <form action="{{ route('guest.ekstrakulikuler.index') }}" method="GET">
        <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow" name="search" value="{{ request()->get('search') }}" placeholder="Cari Ekstrakulikuler" />
        </label>
    </form>
</div>

<div class="grid tablet:grid-cols-2 laptop:grid-cols-3 gap-4 grid-flow-row my-10">
    @foreach ($ekstrakulikuler as $ekskul )
    <div class="mx-auto mt-6">
        <a href="/guest/ekstrakulikuler-template/{{ $ekskul->id_ekstrakurikuler }}">
            <div class="card card-compact mx-auto smartphone:w-10/12 tablet:w-11/12 bg-base-100 shadow-xl transition-all duration-300 hover:scale-110">
                <figure class="">
                    <img src="{{ asset('storage/'. $ekskul->gambar_profil_ekstrakurikuler) }}" class="h-64 w-96" alt="Shoes" />
                </figure>
                <div class="px-2 absolute smartphone:bottom-28 tablet:bottom-24 bg-teal-50/70 w-full h-12 flex items-center">
                    <p class="font-bold text-black">{{ $ekskul->nama_ekstrakurikuler }}</p>
                </div>
                <div class="card-body">
                    <table class="">
                        <tr>
                            <td class="font-bold">Pembimbing</td>
                            <td>:</td>
                            <td>{{ $ekskul->guru->nama_guru ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Tempat</td>
                            <td>:</td>
                            <td class="w-64">
                                <p class="truncate smartphone:w-32 tablet:w-40">{{ $ekskul->tempat_ekstrakurikuler }}
                                </p>
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

<div class="join flex justify-center my-5">
    @if($ekstrakulikuler->previousPageUrl())
    <a href="{{ $ekstrakulikuler->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $ekstrakulikuler->currentPage() }}</button>
    @if($ekstrakulikuler->nextPageUrl())
    <a href="{{ $ekstrakulikuler->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>


@endsection