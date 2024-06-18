@extends('layouts.main')

@section('Main')
<div class="divider">
    <p class="font-bold text-lg md:text-2xl">DIREKTORI SISWA</p>
</div>

<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 mx-5 tablet:mt-5 laptop:mt-0">
    <div class="col-span-1 sm:col-span-2 md:col-span-4 lg:col-span-6 flex flex-wrap justify-between items-center">
        <div class="dropdown dropdown-hover w-full md:w-auto">
            <div tabindex="0" role="button" class="btn btn-outline w-full m-1">
                <i class="fas fa-list"></i>
                Program Keahlian
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-full md:w-auto">
                <li>
                    <a href="{{ route('guest.siswa.index', array_merge(request()->query(), ['nama_program' => null])) }}"
                        class="font-bold">
                        Tampilkan Semua
                    </a>
                </li>
                @foreach($programKeahlian as $program)
                <li>
                    <a
                        href="{{ route('guest.siswa.index', array_merge(request()->query(), ['nama_program' => $program->nama_program])) }}">
                        {{ $program->nama_program }}
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
                    <option value="{{ route('guest.siswa.index', array_merge(request()->query(), ['perPage' => 10])) }}"
                        {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                    <option value="{{ route('guest.siswa.index', array_merge(request()->query(), ['perPage' => 25])) }}"
                        {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                    <option value="{{ route('guest.siswa.index', array_merge(request()->query(), ['perPage' => 50])) }}"
                        {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                    <option value="{{ route('guest.siswa.index', array_merge(request()->query(), ['perPage' => 75])) }}"
                        {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                    <option
                        value="{{ route('guest.siswa.index', array_merge(request()->query(), ['perPage' => 100])) }}"
                        {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
            <form action="{{ route('guest.siswa.index') }}" method="GET" class="w-full md:w-auto">
                <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" class="grow" name="search" value="{{ request()->get('search') }}"
                        placeholder="Cari" />
                </label>
            </form>
        </div>
    </div>
</div>

<!-- Content -->
<div class="my-10 smartphone:flex smartphone:justify-center">
    <table class="table smartphone:table-xs text-center">
        <!-- head -->
        <thead>
            <tr>
                <th>Nama</th>
                <th class="hidden tablet:table-cell">Alamat</th>
                <th>Jurusan</th>
                <th class="hidden tablet:table-cell">Tahun Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($direktoriSiswa as $siswa)
            <tr class="hover">
                <td>
                    <div class="flex justify-start items-start text-start gap-4">
                        <div class="avatar">
                            <div class="mask mask-squircle w-12 h-12">
                                <img src="{{ asset('storage/'.$siswa->gambar_siswa) }}"
                                    alt="Avatar Tailwind CSS Component" />
                            </div>
                        </div>
                        <div>
                            <div class="font-bold">{{ $siswa->nama_siswa }}</div>
                            <div class="text-sm opacity-50">{{ $siswa->nisn_siswa }}</div>
                        </div>
                    </div>
                </td>
                <td class="hidden tablet:table-cell">{{ $siswa->alamat_siswa }}</td>
                <td>{{ $siswa->programKeahlian ? $siswa->programKeahlian->nama_program : '-' }}</td>
                <td class="hidden tablet:table-cell">{{ $siswa->tahun_angkatan_siswa }}</td>
                <th>
                    <button class="btn" onclick="window['my_modal_4{{ $siswa->id_siswa }}'].showModal()">
                        <i class="fas fa-eye text-xl"></i>
                    </button>
                </th>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <th>Nama</th>
                <th class="hidden tablet:table-cell">Alamat</th>
                <th>Jurusan</th>
                <th class="hidden tablet:table-cell">Tahun Angkatan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

<div class="join flex justify-center my-5">
    @if($direktoriSiswa->previousPageUrl())
    <a href="{{ $direktoriSiswa->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $direktoriSiswa->currentPage() }}</button>
    @if($direktoriSiswa->nextPageUrl())
    <a href="{{ $direktoriSiswa->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>
<!-- Content -->

@foreach($direktoriSiswa as $siswa)
<dialog id="my_modal_4{{ $siswa->id_siswa }}" class="modal">
    <div class="modal-box w-10/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">
            <i class="far fa-id-card mr-5"></i>
            Info Detail Siswa
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
                        <img src="{{ asset('storage/'.$siswa->gambar_siswa) }}" alt="Avatar Tailwind CSS Component" />
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
                        <td>{{ $siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{ $siswa->nisn_siswa }}</td>
                    </tr>
                    <tr>
                        <td>Program Keahlian</td>
                        <td>:</td>
                        <td>{{ $siswa->programKeahlian ? $siswa->programKeahlian->nama_program : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $siswa->tempat_lahir_siswa }}, {{ $siswa->TTL_siswa }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ $siswa->jenis_kelamin_siswa }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $siswa->alamat_siswa }}</td>
                    </tr>
                    <tr>
                        <td>No. Handphone</td>
                        <td>:</td>
                        <td>{{ $siswa->no_hp_siswa }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Angkatan</td>
                        <td>:</td>
                        <td>{{ $siswa->tahun_angkatan_siswa }}</td>
                    </tr>
                </table>
            </div>
            <!-- Information -->
        </div>
    </div>
</dialog>
@endforeach

@endsection