@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-xl">DIREKTORI SISWA</p>
</div>

<div class="grid grid-cols-8">

    <!-- Category -->
    <div class="col-span-2">
        <div class="dropdown dropdown-hover">
            <div tabindex="0" role="button" class="btn btn-outline w-full m-1">
                <i class="fas fa-list"></i>
                Program Keahlian
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-max">
                @foreach($programKeahlian as $program)
                <li><a>{{ $program->nama_program }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Category -->

    <!-- Search Box -->
    <div class="col-span-1 col-start-8">
        <div class="flex justify-end">
            <label class="input input-bordered flex justify-between items-center gap-2">
                <input type="text" class="grow" placeholder="Cari Siswa" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                    class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
            </label>
        </div>
    </div>
    <!-- Search Box -->
</div>

<!-- Content -->
<div class="my-10">
    <table class="table text-center">
        <!-- head -->
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Tahun Angkatan</th>
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
                <td>{{ $siswa->alamat_siswa }}</td>
                <td>{{ $siswa->programKeahlian->nama_program }}</td>
                <td>{{ $siswa->tahun_angkatan_siswa }}</td>
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
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Tahun Angkatan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
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
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <div class="grid grid-cols-3 my-10">
            <!-- Photo -->
            <div class="flex justify-center items-center">
                <div class="avatar flex justify-center items-center my-5">
                    <div class="mask mask-squircle w-44 h-44">
                        <img src="{{ asset('storage/'.$siswa->gambar_siswa) }}" alt="Avatar Tailwind CSS Component" />
                    </div>
                </div>
                <div class="divider divider-horizontal translate-x-8"></div>
            </div>
            <!-- Photo -->
            <!-- Information -->
            <div class="col-span-2">
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
                        <td>{{ $siswa->programKeahlian->nama_program }}</td>
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
                        <td>Email</td>
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