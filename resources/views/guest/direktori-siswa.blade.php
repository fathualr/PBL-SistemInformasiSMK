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
                @foreach($programKeahlian as $index => $program)
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
@foreach($direktoriSiswa as $siswa)
@foreach($programKeahlian as $program)
@if($siswa->id_program === $program->id_program)

<div class="overflow-x-auto my-10">
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
            <tr class="hover">
                <td>
                    <div class="flex justify-center items-center gap-4">
                        <div class="avatar">
                            <div class="mask mask-squircle w-12 h-12">
                                <img src="{{ asset($siswa->gambar_siswa) }}" alt="Avatar Tailwind CSS Component" />
                            </div>
                        </div>
                        <div>
                            <div class="font-bold">{{ $siswa->nama_siswa }}</div>
                            <div class="text-sm opacity-50">{{ $siswa->nisn_siswa }}</div>
                        </div>
                    </div>
                </td>
                <td>
                    {{ $siswa->alamat_siswa }}
                </td>
                <td>{{ $program->nama_program }}</td>
                <td>{{ $siswa->tahun_angkatan_siswa }}</td>
                <th>
                    <button class="btn btn-ghost btn-xs">
                        <i class="fas fa-eye text-xl"></i>
                    </button>
                </th>
            </tr>
        </tbody>
        <!-- foot -->
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

@endif
@endforeach
@endforeach
<!-- Content -->

@endsection