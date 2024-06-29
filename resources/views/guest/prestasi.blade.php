@extends('layouts.main')
@section('Main')

<div class="divider">
    <p class="font-bold smartphone:text-lg tablet:text-2xl">PRESTASI SISWA</p>
</div>

@if($PrestasiSiswa->isNotEmpty())
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 mx-5 tablet:mt-5 laptop:mt-0">
    <div class="col-span-1 sm:col-span-2 md:col-span-4 lg:col-span-6 flex flex-wrap justify-between items-center">
        <div class="dropdown dropdown-hover w-full md:w-auto">
            <div tabindex="0" role="button" class="btn btn-outline w-full m-1">
                <i class="fas fa-list"></i>
                Tingkat Prestasi
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-full md:w-auto">
                <li>
                    <a href="{{ route('guest.prestasi.index', array_merge(request()->query(), ['tingkat_prestasi' => null])) }}"
                        class="font-bold">
                        Tampilkan Semua
                    </a>
                </li>
                @foreach($tingkatPrestasiDropdown as $tingkat)
                <li>
                    <a
                        href="{{ route('guest.prestasi.index', array_merge(request()->query(), ['tingkat_prestasi' => $tingkat->tingkat_prestasi])) }}">
                        {{ $tingkat->tingkat_prestasi }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="flex flex-wrap items-center mt-4 md:mt-0 space-y-2 md:space-y-0 md:space-x-2 w-full md:w-auto">
            <div class="relative flex w-full md:w-auto">
                <select onchange="window.location.href=this.value"
                    class="select border-b-2 border-base-300 w-full md:w-auto">
                    <option selected disabled>Jumlah Data</option>
                    <option
                        value="{{ route('guest.prestasi.index', array_merge(request()->query(), ['perPage' => 10])) }}"
                        {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                    <option
                        value="{{ route('guest.prestasi.index', array_merge(request()->query(), ['perPage' => 25])) }}"
                        {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                    <option
                        value="{{ route('guest.prestasi.index', array_merge(request()->query(), ['perPage' => 50])) }}"
                        {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                    <option
                        value="{{ route('guest.prestasi.index', array_merge(request()->query(), ['perPage' => 75])) }}"
                        {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                    <option
                        value="{{ route('guest.prestasi.index', array_merge(request()->query(), ['perPage' => 100])) }}"
                        {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
            <form action="{{ route('guest.prestasi.index') }}" method="GET" class="w-full md:w-auto">
                <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" class="grow" name="search" value="{{ request()->get('search') }}"
                        placeholder="Cari" />
                </label>
            </form>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 gap-y-10 my-10">
    @foreach($PrestasiSiswa as $prestasi)
    <div class="card tablet:card-side bg-base-100 shadow-xl">
        <figure class="h-full w-80 overflow-hidden">
            <img class="object-cover w-[30rem] h-full" src="{{ asset('storage/'.$prestasi->gambar_prestasi) }}"
                alt="Album" />
        </figure>
        <div class="card-body">
            <h2 class="text-2xl font-bold truncate smartphone:w-64 laptop:w-[25rem]">{{ $prestasi->nama_prestasi }}</h2>
            <div class="flex justify-start gap-5">
                <div class="px-2 py-1 text-white bg-gray-500 rounded-full">{{ $prestasi->kategori_prestasi }}</div>
                <div class="px-2 py-1 text-white bg-gray-500 rounded-full">{{ $prestasi->tingkat_prestasi }}</div>
            </div>
            <div class="h-28 overflow-y-hidden smartphone:w-64 laptop:w-[50rem]">
                <p class="truncate mt-5">
                    {!! $prestasi->deskripsi_prestasi !!}
                </p>
            </div>
            <div class="card-actions smartphone:justify-center tablet:justify-end">
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

<div class="join flex justify-center my-5">
    @if($PrestasiSiswa->previousPageUrl())
    <a href="{{ $PrestasiSiswa->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Halaman {{ $PrestasiSiswa->currentPage() }}</button>
    @if($PrestasiSiswa->nextPageUrl())
    <a href="{{ $PrestasiSiswa->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>
@endif

@endsection