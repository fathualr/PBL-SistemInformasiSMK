@extends('layouts.mainAdmin')

@section('main-content')



@include('shared.success-message')
@include('shared.error-message')
<!-- Title -->
<div class="col-span-2 my-4 mx-5 row-start-2">
    <h3 class="font-bold text-lg">Direktori Siswa</h3>
</div>
<!-- Title -->

<!-- Modal -->
<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <button class="btn btn-outline hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-user-plus"></i>
            Tambah Siswa
        </button>
    </div>
    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('admin.direktoriSiswa.index', ['perPage' => 10]) }}" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('admin.direktoriSiswa.index', ['perPage' => 25]) }}" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('admin.direktoriSiswa.index', ['perPage' => 50]) }}" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('admin.direktoriSiswa.index', ['perPage' => 75]) }}" {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="{{ route('admin.direktoriSiswa.index', ['perPage' => 100]) }}" {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>
        <form action="{{ route('admin.direktoriSiswa.index') }}" method="GET">
            <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" class="grow" name="search" placeholder="Cari Nama" />
            </label>
        </form>
    </div>
</div>

<!-- Search Bar -->

<!-- Content -->
<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-4">
        <div class="mt-5">
            <table class="table border text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Foto Siswa</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Program Keahlian</th>
                        <th>Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($siswa as $key => $ssw)
                    <tr class="hover">
                        <th>{{ ($siswa->currentPage() - 1) * $siswa->perPage() + $key + 1 }}</th>
                        <td>
                            <div class="flex justify-center items-center">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="{{ asset('storage/'.$ssw->gambar_siswa) }}" alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $ssw->nama_siswa }}</td>
                        <td>{{ $ssw->nisn_siswa }}</td>
                        <td>{{ $ssw->programKeahlian ? $ssw->programKeahlian->nama_program : '-' }}</td>
                        <td>
                            <details class="dropdown">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                    <!-- Edit -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_edit{{ $ssw->id_siswa }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_view{{ $ssw->id_siswa }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete{{ $ssw->id_siswa }}'].showModal()">
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
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Foto Siswa</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Program Keahlian</th>
                        <th>Aksi</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="join flex justify-center my-5">
    @if($siswa->previousPageUrl())
    <a href="{{ $siswa->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $siswa->currentPage() }}</button>
    @if($siswa->nextPageUrl())
    <a href="{{ $siswa->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>



<dialog id="my_modal_add" class="modal">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Tambah Siswa</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="{{ route('DirektoriSiswa.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <span class="label-text -mb-4">Nama Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-none py-2" placeholder="Nama" name="nama_siswa" />
            </label>
            <span class="label-text -mb-4">NISN Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-none py-2" placeholder="NISN" name="nisn_siswa" />
            </label>
            <span class="label-text -mb-4">Kelas Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-none py-2" placeholder="Kelas" name="kelas_siswa" />
            </label>
            <span class="label-text -mb-4">Program Keahlian Siswa :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="id_program">
                <option disabled selected>Pilih Program Keahlian</option>

                @foreach($programKeahlian as $program)
                <option value="{{ $program->id_program }}">{{ $program->nama_program }}</option>
                @endforeach

            </select>
            <span class="label-text -mb-4">No.Handphone Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-none py-2" placeholder="No.Hp" name="no_hp_siswa" />
            </label>
            <span class="label-text -mb-4">Tempat, Tanggal Lahir Pegawai :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir" name="tempat_lahir_siswa" />
                <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_siswa" />
            </label>
            <span class="label-text -mb-4">Jenis Kelamin Siswa :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="jenis_kelamin_siswa">
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <span class="label-text -mb-4">Alamat Siswa :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_siswa"></textarea>
            <span class="label-text -mb-4">Tahun Angkatan Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-none py-2" placeholder="Tahun Angkatan Siswa" name="tahun_angkatan_siswa" />
            </label>
            <span class="label-text -mb-4">Foto Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_siswa" accept="gambarSiswa/*" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required />
            </label>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="reset" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-plus"></i>
                    Tambah
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Edit Modal -->
@foreach($siswa as $key => $ssw)
<dialog id="my_modal_edit{{ $ssw->id_siswa }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Edit Data</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="{{ route('DirektoriSiswa.update', $ssw->id_siswa) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <span class="label-text -mb-4">Nama Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama" name="nama_siswa" value="{{ $ssw->nama_siswa }}" />
            </label>
            <span class="label-text -mb-4">NISN Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="NISN" name="nisn_siswa" value="{{ $ssw->nisn_siswa }}" />
            </label>
            <span class="label-text -mb-4">Kelas Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Kelas" name="kelas_siswa" value="{{ $ssw->kelas_siswa }}" />
            </label>
            <span class="label-text -mb-4">Program Keahlian Siswa :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="id_program">
                <option disabled>Pilih Program Keahlian</option>

                @foreach($programKeahlian as $program)
                <option value="{{ $program->id_program }}" {{ $ssw->id_program === $program->id_program ? 'selected' : '' }}>{{ $program->nama_program }}
                </option>
                @endforeach

            </select>
            <span class="label-text -mb-4">No.Handphone Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_siswa" value="{{ $ssw->no_hp_siswa }}" />
            </label>
            <span class="label-text -mb-4">Tempat, Tanggal Lahir Pegawai :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir" name="tempat_lahir_siswa" value="{{ $ssw->tempat_lahir_siswa }}" />
                <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_siswa" value="{{ $ssw->TTL_siswa }}" />
            </label>
            <span class="label-text -mb-4">Jenis Kelamin Siswa :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="jenis_kelamin_siswa">
                <option disabled>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki" {{ $ssw->jenis_kelamin_siswa === 'Laki - Laki' ? 'selected' : '' }}>Laki -
                    Laki</option>
                <option value="Perempuan" {{ $ssw->jenis_kelamin_siswa === 'Perempuan' ? 'selected' : '' }}>Perempuan
                </option>
            </select>
            <span class="label-text -mb-4">Alamat Siswa :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_siswa">{{ $ssw->alamat_siswa }}</textarea>
            <span class="label-text -mb-4">Tahun Angkatan Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Tahun Angkatan Siswa" name="tahun_angkatan_siswa" value="{{ $ssw->tahun_angkatan_siswa }}" />
            </label>
            <span class="label-text -mb-4">Foto Siswa :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_siswa" accept="gambarSiswa/*" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required />
            </label>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-pen-to-square"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- Edit Modal -->

<!-- View Modal -->
<dialog id="my_modal_view{{ $ssw->id_siswa }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Info Detail Data</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <div class="avatar flex justify-center items-center my-5">
            <div class="mask mask-squircle w-36 h-36">
                <img src="{{ asset('storage/'.$ssw->gambar_siswa) }}" alt="Avatar Tailwind CSS Component" />
            </div>
        </div>
        <span class="label-text -mb-4">Tautan Foto :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" name="gambar_siswa" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarGuru/*" placeholder="Logo" value="{{ $ssw->gambar_siswa }}" readonly />
        </label>
        <span class="label-text -mb-4">Nama Siswa :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama" name="nama_siswa" value="{{ $ssw->nama_siswa }}" readonly />
        </label>
        <span class="label-text -mb-4">NISN Siswa :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="NISN" name="nisn_siswa" value="{{ $ssw->nisn_siswa }}" readonly />
        </label>
        <span class="label-text -mb-4">Kelas Siswa :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Kelas" name="kelas_siswa" value="{{ $ssw->kelas_siswa }}" readonly />
        </label>
        <span class="label-text -mb-4">Program Keahlian Siswa :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Kelas" name="programKeahlian" value="{{ $ssw->id_program }}" readonly />
        </label>
        <span class="label-text -mb-4">No.Handphone Siswa :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_siswa" value="{{ $ssw->no_hp_siswa }}" readonly />
        </label>
        <span class="label-text -mb-4">Tempat, Tanggal Lahir Pegawai :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir" name="tempat_lahir_siswa" value="{{ $ssw->tempat_lahir_siswa }}" readonly />
            <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_siswa" value="{{ $ssw->TTL_siswa }}" readonly />
        </label>
        <span class="label-text -mb-4">Jenis Kelamin Siswa :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="jenis_kelamin" value="{{ $ssw->jenis_kelamin_siswa }}" readonly />
        </label>
        <span class="label-text -mb-4">Alamat Siswa :</span>
        <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_siswa" readonly>{{ $ssw->alamat_siswa }}</textarea>
        <span class="label-text -mb-4">Tahun Angkatan Siswa :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Tahun Angkatan Siswa" name="tahun_angkatan_siswa" value="{{ $ssw->tahun_angkatan_siswa }}" readonly />
        </label>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- View Modal -->

<!-- Delete Modal -->
<dialog id="my_modal_delete{{ $ssw->id_siswa }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('DirektoriSiswa.destroy', $ssw->id_siswa) }}" method="post">
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
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
@endforeach
<!-- Delete Modal -->

@endsection