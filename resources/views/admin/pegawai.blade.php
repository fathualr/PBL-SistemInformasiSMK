@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 rounded-md">

    @include('shared.success-message')
    @include('shared.error-message')
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Direktori Pegawai</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-3 row-start-3 mx-5">
        <button class="btn btn-outline w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-user-plus"></i>
            Tambah
        </button>
    </div>
    <!-- Modal -->

    <!-- Search Bar -->
    <div class="col-span-2 row-start-3 col-start-7">
        <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Cari" />
        </label>
    </div>
    <!-- Search Bar -->

    <!-- Content -->
    <div class="col-span-9 row-start-4">
        <div class="mt-5">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th class="w-52">Foto Pegawai</th>
                        <th class="w-24">Nama Pegawai</th>
                        <th>NIP</th>
                        <th class="w-32">Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($pegawai as $key => $pgw)
                    <tr class="hover">
                        <th>{{ $key + 1 }}</th>
                        <td class="w-56">
                            <div class="avatar">
                                <div class="mask mask-squircle w-16 h-16">
                                    <img src="{{ asset('storage/'.$pgw->gambar_pegawai) }}"
                                        alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                        </td>
                        <td>{{ $pgw->nama_pegawai }}</td>
                        <td>{{ $pgw->nik_pegawai }}</td>
                        <td>{{ $pgw->jabatan_pegawai }}</td>
                        <td>
                            <details class="dropdown dropdown-right">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0"
                                    class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                    <!-- Edit -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_edit{{ $pgw->id_pegawai }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_view{{ $pgw->id_pegawai }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_delete{{ $pgw->id_pegawai }}'].showModal()">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </li>
                                    <!-- Delete -->
                                </ul>
                            </details>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <!-- foot -->
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Foto Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Content -->
</div>

<dialog id="my_modal_add" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Staff</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        
        <form action="{{ route('DirektoriPegawai.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent py-2" placeholder="Nama Pegawai" name="nama_pegawai" required />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent py-2" placeholder="NIP" name="nik_pegawai" required />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent py-2" placeholder="Email" name="email_pegawai" required />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent py-2" placeholder="No.Hp" name="no_hp_pegawai" required />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent border-r-2 py-2 w-16" placeholder="Tanggal Lahir" name="TTL_pegawai" required />
                <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_pegawai" required />
            </label>
            <select class="select border-elm border-2 w-full mb-5" name="jenis_kelamin" required>
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_pegawai" required></textarea>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent py-2" placeholder="Jabatan" name="jabatan_pegawai" required />
            </label>
            <select class="select border-elm border-2 w-full mb-5" name="status_pegawai" required>
                <option disabled selected>Pilih Status Pegawai</option>
                <option value="Aktif">Aktif</option>
                <option value="Cuti">Cuti</option>
                <option value="Pensiun">Pensiun</option>
                <option value="Resign">Resign</option>
            </select>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_pegawai" class="grow file-input file-input-success border-none bg-transparent py-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-elm file:text-white hover:file:bg-white hover:file:text-elm" accept="gambarPegawai/*" placeholder="Logo" required />
            </label>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="reset"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>
                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-plus"></i>
                    Tambah
                </button>
            </div>
        </form>

    </div>
</dialog>

<!-- Edit Modal -->
@foreach($pegawai as $key => $pgw)
<dialog id="my_modal_edit{{ $pgw->id_pegawai }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data</h3>
        <div class="grid grid-cols-8 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('DirektoriPegawai.update', $pgw->id_pegawai) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Pegawai" name="nama_pegawai" value="{{ $pgw->nama_pegawai }}" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nik_pegawai" value="{{ $pgw->nik_pegawai }}" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_pegawai" value="{{ $pgw->email_pegawai }}" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_pegawai" value="{{ $pgw->no_hp_pegawai }}" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent border-r-2 py-2 w-16" placeholder="Tanggal Lahir" name="TTL_pegawai" value="{{ $pgw->TTL_pegawai }}" />
                <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_pegawai" value="{{ $pgw->tempat_lahir_pegawai }}" />
            </label>
            <select class="select border-elm border-2 w-full mb-5" name="jenis_kelamin">
                <option disabled>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki" {{ $pgw->jenis_kelamin === 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                <option value="Perempuan" {{ $pgw->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_pegawai">{{ $pgw->alamat_pegawai }}</textarea>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan" name="jabatan_pegawai" value="{{ $pgw->jabatan_pegawai }}" />
            </label>
            <select class="select border-elm border-2 w-full mb-5" name="status_pegawai">
                <option disabled>Pilih Status Pegawai</option>
                <option value="Aktif" {{ $pgw->status_pegawai === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Cuti" {{ $pgw->status_pegawai === 'Cuti' ? 'selected' : '' }}>Cuti</option>
                <option value="Pensiun" {{ $pgw->status_pegawai === 'Pensiun' ? 'selected' : '' }}>Pensiun</option>
                <option value="Resign" {{ $pgw->status_pegawai === 'Resign' ? 'selected' : '' }}>Resign</option>
            </select>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_pegawai" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarPegawai/*" placeholder="Logo" />
            </label>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-pen-to-square"></i>
                    Simpan
                </button>
            </div>
        </form>

    </div>
</dialog>
<!-- Edit Modal -->

<!-- View Modal -->
<dialog id="my_modal_view{{ $pgw->id_pegawai }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Data</h3>
        <div class="avatar flex justify-center items-center my-5">
            <div class="mask mask-squircle w-36 h-36">
                <img src="{{ asset('storage/'.$pgw->gambar_pegawai) }}"
                    alt="Avatar Tailwind CSS Component" />
            </div>
        </div>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <i class="fas fa-link"></i>
            <input type="text" name="gambar_guru" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarGuru/*" placeholder="Logo" value="{{ $pgw->gambar_pegawai }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Pegawai" name="nama_pegawai" value="{{ $pgw->nama_pegawai }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nik_pegawai" value="{{ $pgw->nik_pegawai }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_pegawai" value="{{ $pgw->email_pegawai }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_pegawai" value="{{ $pgw->no_hp_pegawai }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="date" class="grow bg-transparent border-r-2 py-2 w-16" placeholder="Tanggal Lahir" name="TTL_pegawai" value="{{ $pgw->TTL_pegawai }}" />
            <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_pegawai" value="{{ $pgw->tempat_lahir_pegawai }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Pegawai" name="jenis_kelamin" value="{{ $pgw->jenis_kelamin }}" readonly />
        </label>
        <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_pegawai" readonly>{{ $pgw->alamat_pegawai }}</textarea>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan" name="jabatan_pegawai" value="{{ $pgw->jabatan_pegawai }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Pegawai" name="status_pegawai" value="{{ $pgw->status_pegawai }}" readonly />
        </label>
    </div>
</dialog>
<!-- View Modal -->

<!-- Delete Modal -->
<dialog id="my_modal_delete{{ $pgw->id_pegawai }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('DirektoriPegawai.destroy', $pgw->id_pegawai) }}" method="post">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class=" fas fa-trash"></i>
                    Hapus
                </button>
            </div>
        </form>

    </div>
</dialog>
<!-- Delete Modal -->
@endforeach

@endsection