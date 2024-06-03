@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 shadow-lg rounded-md px-4">

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
            <table class="table border text-center">
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
                        <th>{{ ($pegawai->currentPage() - 1) * $pegawai->perPage() + $key + 1 }}</th>
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
                            <details class="dropdown">
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

            <!-- Pagination -->
            <div class="join flex justify-center my-5">
                @if($pegawai->previousPageUrl())
                <a href="{{ $pegawai->previousPageUrl() }}" class="join-item btn">«</a>
                @else
                <button class="join-item btn disabled">«</button>
                @endif
                <button class="join-item btn">Page {{ $pegawai->currentPage() }}</button>
                @if($pegawai->nextPageUrl())
                <a href="{{ $pegawai->nextPageUrl() }}" class="join-item btn">»</a>
                @else
                <button class="join-item btn disabled">»</button>
                @endif
            </div>

        </div>
    </div>
    <!-- Content -->
</div>

<dialog id="my_modal_add" class="modal">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <h3 class="font-bold text-lg">Tambah Staff</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-2">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </form>
        </div>

        <form action="{{ route('DirektoriPegawai.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <span class="label-text -mb-4">Nama Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent py-2" placeholder="Nama Pegawai" name="nama_pegawai"
                    required />
            </label>
            <span class="label-text -mb-4">NIP Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent py-2" placeholder="NIP" name="nik_pegawai" required />
            </label>
            <span class="label-text -mb-4">Email Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent py-2" placeholder="Email" name="email_pegawai"
                    required />
            </label>
            <span class="label-text -mb-4">No.Handphone Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent py-2" placeholder="No.Hp" name="no_hp_pegawai"
                    required />
            </label>
            <span class="label-text -mb-4">Tempat, Tanggal Lahir Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir"
                    name="tempat_lahir_pegawai" required />
                <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_pegawai"
                    required />
            </label>
            <span class="label-text -mb-4">Jenis Kelamin Pegawai :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="jenis_kelamin" required>
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <span class="label-text -mb-4">Alamat Pegawai :</span>
            <textarea
                class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Alamat" name="alamat_pegawai" required></textarea>
            <span class="label-text -mb-4">Jabatan Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent py-2" placeholder="Jabatan" name="jabatan_pegawai"
                    required />
            </label>
            <span class="label-text -mb-4">Status Pegawai :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="status_pegawai" required>
                <option disabled selected>Pilih Status Pegawai</option>
                <option value="Aktif">Aktif</option>
                <option value="Cuti">Cuti</option>
                <option value="Pensiun">Pensiun</option>
                <option value="Resign">Resign</option>
            </select>
            <span class="label-text -mb-4">Foto Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_pegawai" accept="gambarPegawai/*" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required />
            </label>
            <div class="flex justify-end items-end my-5 gap-4">
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
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Edit Modal -->
@foreach($pegawai as $key => $pgw)
<dialog id="my_modal_edit{{ $pgw->id_pegawai }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data</h3>
        <div class="grid grid-cols-8 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('DirektoriPegawai.update', $pgw->id_pegawai) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <span class="label-text -mb-4">Nama Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Pegawai"
                    name="nama_pegawai" value="{{ $pgw->nama_pegawai }}" />
            </label>
            <span class="label-text -mb-4">NIP Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nik_pegawai"
                    value="{{ $pgw->nik_pegawai }}" />
            </label>
            <span class="label-text -mb-4">Email Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_pegawai"
                    value="{{ $pgw->email_pegawai }}" />
            </label>
            <span class="label-text -mb-4">No.Handphone Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_pegawai"
                    value="{{ $pgw->no_hp_pegawai }}" />
            </label>
            <span class="label-text -mb-4">Tempat, Tanggal Lahir Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir"
                    name="tempat_lahir_pegawai" value="{{ $pgw->tempat_lahir_pegawai }}" />
                <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_pegawai"
                    value="{{ $pgw->TTL_pegawai }}" />
            </label>
            <span class="label-text -mb-4">Jenis Kelamin Pegawai :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="jenis_kelamin">
                <option disabled>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki" {{ $pgw->jenis_kelamin === 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki
                </option>
                <option value="Perempuan" {{ $pgw->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <span class="label-text -mb-4">Alamat Pegawai :</span>
            <textarea
                class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Alamat" name="alamat_pegawai">{{ $pgw->alamat_pegawai }}</textarea>
            <span class="label-text -mb-4">Jabatan Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan"
                    name="jabatan_pegawai" value="{{ $pgw->jabatan_pegawai }}" />
            </label>
            <span class="label-text -mb-4">Status Pegawai :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="status_pegawai">
                <option disabled>Pilih Status Pegawai</option>
                <option value="Aktif" {{ $pgw->status_pegawai === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Cuti" {{ $pgw->status_pegawai === 'Cuti' ? 'selected' : '' }}>Cuti</option>
                <option value="Pensiun" {{ $pgw->status_pegawai === 'Pensiun' ? 'selected' : '' }}>Pensiun</option>
                <option value="Resign" {{ $pgw->status_pegawai === 'Resign' ? 'selected' : '' }}>Resign</option>
            </select>
            <span class="label-text -mb-4">Foto Pegawai :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_pegawai" accept="gambarPegawai/*" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required />
            </label>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-pen-to-square"></i>
                    Edit
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
<dialog id="my_modal_view{{ $pgw->id_pegawai }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Data</h3>
        <div class="grid grid-cols-8 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <div class="avatar flex justify-center items-center my-5">
            <div class="mask mask-squircle w-36 h-36">
                <img src="{{ asset('storage/'.$pgw->gambar_pegawai) }}" alt="Avatar Tailwind CSS Component" />
            </div>
        </div>
        <span class="label-text -mb-4">Tautan Foto :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" name="gambar_guru"
                class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarGuru/*"
                placeholder="Logo" value="{{ $pgw->gambar_pegawai }}" readonly />
        </label>
        <span class="label-text -mb-4">Nama Pegawai :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Pegawai"
                name="nama_pegawai" value="{{ $pgw->nama_pegawai }}" readonly />
        </label>
        <span class="label-text -mb-4">NIP Pegawai :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nik_pegawai"
                value="{{ $pgw->nik_pegawai }}" readonly />
        </label>
        <span class="label-text -mb-4">Email Pegawai :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_pegawai"
                value="{{ $pgw->email_pegawai }}" readonly />
        </label>
        <span class="label-text -mb-4">No.Handphone Pegawai :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_pegawai"
                value="{{ $pgw->no_hp_pegawai }}" readonly />
        </label>
        <span class="label-text -mb-4">Tempat, Tanggal Lahir Pegawai :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir"
                name="tempat_lahir_pegawai" value="{{ $pgw->tempat_lahir_pegawai }}" readonly />
            <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_pegawai"
                value="{{ $pgw->TTL_pegawai }}" />
        </label>
        <span class="label-text -mb-4">Jenis Kelamin Pegawai :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Pegawai"
                name="jenis_kelamin" value="{{ $pgw->jenis_kelamin }}" readonly />
        </label>
        <span class="label-text -mb-4">Alamat Pegawai :</span>
        <textarea
            class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
            placeholder="Alamat" name="alamat_pegawai" readonly>{{ $pgw->alamat_pegawai }}</textarea>
        <span class="label-text -mb-4">Jabatan Pegawai :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan" name="jabatan_pegawai"
                value="{{ $pgw->jabatan_pegawai }}" readonly />
        </label>
        <span class="label-text -mb-4">Status Pegawai :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Pegawai"
                name="status_pegawai" value="{{ $pgw->status_pegawai }}" readonly />
        </label>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
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
                <button type="submit"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
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