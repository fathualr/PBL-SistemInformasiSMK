@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-lg md:text-2xl">DIREKTORI PEGAWAI</p>
</div>

@if($direktoriPegawai->isNotEmpty())
<div class="flex smartphone:justify-center tablet:justify-end">
    <div class="relative flex mr-2">
        <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
            <option selected disabled>Jumlah Data</option>
            <option value="{{ route('guest.pegawai.index', array_merge(request()->query(), ['perPage' => 12])) }}"
                {{ request()->get('perPage') == 12 ? 'selected' : '' }}>12</option>
            <option value="{{ route('guest.pegawai.index', array_merge(request()->query(), ['perPage' => 24])) }}"
                {{ request()->get('perPage') == 24 ? 'selected' : '' }}>24</option>
            <option value="{{ route('guest.pegawai.index', array_merge(request()->query(), ['perPage' => 36])) }}"
                {{ request()->get('perPage') == 36 ? 'selected' : '' }}>36</option>
            <option value="{{ route('guest.pegawai.index', array_merge(request()->query(), ['perPage' => 60])) }}"
                {{ request()->get('perPage') == 60 ? 'selected' : '' }}>60</option>
            <option value="{{ route('guest.pegawai.index', array_merge(request()->query(), ['perPage' => 96])) }}"
                {{ request()->get('perPage') == 96 ? 'selected' : '' }}>96</option>
        </select>
    </div>
    <form action="{{ route('guest.pegawai.index') }}" method="GET">
        <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow smartphone:w-1/2 tablet:w-full" name="search"
                value="{{ request()->get('search') }}" placeholder="Cari" />
        </label>
    </form>
</div>

<div
    class="grid {{ count($direktoriPegawai) > 3 ? 'tablet:grid-cols-3 laptop:grid-cols-4' : (count($direktoriPegawai) > 2 ? 'tablet:grid-cols-3' : (count($direktoriPegawai) > 1 ? 'tablet:grid-cols-2' : 'grid-cols-1')) }} gap-3 gap-y-10 my-16 mx-auto">
    @foreach($direktoriPegawai as $pegawai)
    <div class="mx-auto w-full smartphone:flex smartphone:justify-center smartphone:items-center">
        <button class="hover:scale-110 transition-all duration-300"
            onclick="window['my_modal_view{{ $pegawai->id_pegawai }}'].showModal()">
            <div class="card card-compact smartphone:w-full laptop:w-64 h-80 shadow-xl">
                <figure>
                    <img src="{{ asset('storage/' . $pegawai->gambar_pegawai) }}"
                        class="h-28 w-full object-cover blur-sm" alt="Shoes" />
                </figure>
                <div class="h-2/5 bg-indigo-600 rounded-t-lg">
                    <div class="avatar absolute mx-auto h-28 -translate-y-12 -translate-x-16">
                        <div class="w-32 h-32 rounded-full">
                            <img src="{{ asset('storage/'.$pegawai->gambar_pegawai) }}" />
                        </div>
                    </div>
                    <div class="card-body bg-base-100">
                        <h2 class="text-center font-bold text-xl mt-16 truncate w-48 mx-auto">
                            {{ $pegawai->nama_pegawai }}
                        </h2>
                        <p class="text-center">{{ $pegawai->jabatan_pegawai }}
                        </p>
                        <p class="text-center">{{ $pegawai->nik_pegawai }}</p>
                    </div>
                </div>
            </div>
        </button>
    </div>
    @endforeach
</div>

@foreach($direktoriPegawai as $pegawai)
<dialog id="my_modal_view{{ $pegawai->id_pegawai }}" class="modal">
    <div class="modal-box w-10/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">
            <i class="far fa-id-card mr-5"></i>
            Info Detail Pegawai
        </h3>
        <div class="grid grid-cols-8 w-[32rem] -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <div class="grid smartphone:grid-cols-1 tablet:grid-cols-3 my-10">
            <!-- Photo -->
            <div class="flex justify-center items-center">
                <div class="avatar flex justify-center items-center my-5">
                    <div class="mask mask-squircle w-44 h-44">
                        <img src="{{ asset('storage/'.$pegawai->gambar_pegawai) }}"
                            alt="Avatar Tailwind CSS Component" />
                    </div>
                </div>
                <div class="laptop:divider laptop:divider-horizontal laptop:translate-x-8"></div>
            </div>
            <!-- Photo -->
            <!-- Information -->
            <div class="smartphone:text-xs tablet:text-base tablet:col-span-2">
                <table class="w-full">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                            {{ $pegawai->nama_pegawai }}
                        </td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>
                            {{ $pegawai->nik_pegawai }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td>
                            {{ $pegawai->tempat_lahir_pegawai }}, {{ $pegawai->TTL_pegawai }}
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            {{ $pegawai->jenis_kelamin }}
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                            {{ $pegawai->alamat_pegawai }}
                        </td>
                    </tr>
                    <tr>
                        <td>No. Handphone</td>
                        <td>:</td>
                        <td>
                            {{ $pegawai->no_hp_pegawai }}
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            {{ $pegawai->email_pegawai }}
                        </td>
                    </tr>
                    <tr>
                        <td>Jabatan pegawai</td>
                        <td>:</td>
                        <td>
                            {{ $pegawai->jabatan_pegawai }}
                        </td>
                    </tr>
                    <tr>
                        <td>Status pegawai</td>
                        <td>:</td>
                        <td>
                            {{ $pegawai->status_pegawai }}
                        </td>
                    </tr>
                </table>
            </div>
            <!-- Information -->
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
@endforeach

<div class="join flex justify-center my-5">
    @if($direktoriPegawai->previousPageUrl())
    <a href="{{ $direktoriPegawai->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $direktoriPegawai->currentPage() }}</button>
    @if($direktoriPegawai->nextPageUrl())
    <a href="{{ $direktoriPegawai->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>
@endif

@endsection