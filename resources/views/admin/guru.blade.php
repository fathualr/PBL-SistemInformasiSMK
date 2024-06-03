@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 shadow-lg px-4 rounded-md">

    @include('shared.success-message')
    @include('shared.error-message')
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Direktori Guru</h3>
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
                        <th class="w-52">Foto Guru</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th class="w-64">Program Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($gurus as $key => $guru)
                    <tr class="hover">
                        <th>{{ ($gurus->currentPage() - 1) * $gurus->perPage() + $key + 1 }}</th>
                        <td class="w-56">
                            <div class="avatar">
                                <div class="mask mask-squircle w-16 h-16">
                                    <img src="{{ asset('storage/'.$guru->gambar_guru) }}"
                                        alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $guru->nama_guru }}
                        </td>
                        <td>{{ $guru->nik_guru }}</td>
                        <td class="w-64">{{ $guru->programKeahlian->nama_program }}</td>
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
                                            onclick="window['my_modal_edit{{ $guru->id_guru }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_view{{ $guru->id_guru }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_delete{{ $guru->id_guru }}'].showModal()">
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
                        <th class="w-56">Foto Guru</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th class="w-64">Program Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>

            <!-- Pagination -->
            <div class="join flex justify-center my-5">
                @if($gurus->previousPageUrl())
                <a href="{{ $gurus->previousPageUrl() }}" class="join-item btn">«</a>
                @else
                <button class="join-item btn disabled">«</button>
                @endif
                <button class="join-item btn">Page {{ $gurus->currentPage() }}</button>
                @if($gurus->nextPageUrl())
                <a href="{{ $gurus->nextPageUrl() }}" class="join-item btn">»</a>
                @else
                <button class="join-item btn disabled">»</button>
                @endif
            </div>

        </div>
    </div>
    <!-- Content -->
</div>

<dialog id="my_modal_add" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Guru</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('DirektoriGuru.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <span class="label-text -mb-4">Nama Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-none py-2" placeholder="Nama Guru"
                    name="nama_guru" />
            </label>
            <span class="label-text -mb-4">NIP Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-none py-2" placeholder="NIP" name="nik_guru" />
            </label>
            <span class="label-text -mb-4">Bidang Program Keahlian :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="id_program">
                <option disabled selected>Pilih Program Keahlian</option>

                @foreach($programKeahlian as $program)
                <option value="{{ $program->id_program }}">{{ $program->nama_program }}</option>
                @endforeach

            </select>
            <span class="label-text -mb-4">Email Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_guru" />
            </label>
            <span class="label-text -mb-4">No.Handphone Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp"
                    name="no_hp_guru" />
            </label>
            <span class="label-text -mb-4">Tempat, Tanggal Lahir Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir"
                    name="tempat_lahir_guru" />
                <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_guru" />
            </label>
            <span class="label-text -mb-4">Jenis Kelamin Guru :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="jenis_kelamin">
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <span class="label-text -mb-4">Alamat Guru :</span>
            <textarea
                class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Alamat" name="alamat_guru"></textarea>
            <span class="label-text -mb-4">Jabatan Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan"
                    name="jabatan_guru" />
            </label>
            <span class="label-text -mb-4">Status Guru :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="status_guru">
                <option disabled selected>Pilih Status Guru</option>
                <option value="Aktif">Aktif</option>
                <option value="Cuti">Cuti</option>
                <option value="Pensiun">Pensiun</option>
                <option value="Resign">Resign</option>
            </select>
            <span class="label-text -mb-4">Foto Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_guru" accept="gambarGuru/*" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required />
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
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Edit Modal -->
@foreach($gurus as $key => $guru)
<dialog id="my_modal_edit{{ $guru->id_guru }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Guru</h3>
        <div class="grid grid-cols-8 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('DirektoriGuru.update', $guru->id_guru) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <span class="label-text -mb-4">Nama Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Guru" name="nama_guru"
                    value="{{ $guru->nama_guru }}" />
            </label>
            <span class="label-text -mb-4">NIP Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nik_guru"
                    value="{{ $guru->nik_guru }}" />
            </label>
            <span class="label-text -mb-4">Bidang Program Keahlian :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="id_program">
                <option disabled selected>Pilih Program Keahlian</option>

                @foreach($programKeahlian as $program)
                <option value="{{ $program->id_program }}"
                    {{ $guru->id_program === $program->id_program ? 'selected' : '' }}>{{ $program->nama_program }}
                </option>
                @endforeach

            </select>
            <span class="label-text -mb-4">Email Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_guru"
                    value="{{ $guru->email_guru }}" />
            </label>
            <span class="label-text -mb-4">No.Handphone Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_guru"
                    value="{{ $guru->no_hp_guru }}" />
            </label>
            <span class="label-text -mb-4">Tempat, Tanggal Lahir Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir"
                    name="tempat_lahir_guru" value="{{ $guru->tempat_lahir_guru }}" />
                <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_guru"
                    value="{{ $guru->TTL_guru }}" />
            </label>
            <span class="label-text -mb-4">Jenis Kelamin Guru :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="jenis_kelamin">
                <option disabled>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki" {{ $guru->jenis_kelamin === 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki
                </option>
                <option value="Perempuan" {{ $guru->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan
                </option>
            </select>
            <span class="label-text -mb-4">Alamat Guru :</span>
            <textarea
                class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Alamat" name="alamat_guru">{{ $guru->alamat_guru }}</textarea>
            <span class="label-text -mb-4">Jabatan Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan" name="jabatan_guru"
                    value="{{ $guru->jabatan_guru }}" />
            </label>
            <span class="label-text -mb-4">Status Guru :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="status_guru">
                <option disabled>Pilih Status Guru</option>
                <option value="Aktif" {{ $guru->status_guru === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Cuti" {{ $guru->status_guru === 'Cuti' ? 'selected' : '' }}>Cuti</option>
                <option value="Pensiun" {{ $guru->status_guru === 'Pensiun' ? 'selected' : '' }}>Pensiun</option>
                <option value="Resign" {{ $guru->status_guru === 'Resign' ? 'selected' : '' }}>Resign</option>
            </select>
            <span class="label-text -mb-4">Foto Guru :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_guru" accept="gambarGuru/*" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" />
            </label>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
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
<dialog id="my_modal_view{{ $guru->id_guru }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Data Guru</h3>
        <div class="grid grid-cols-8 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <div class="avatar flex justify-center items-center my-5">
            <div class="mask mask-squircle w-36 h-36">
                <img src="{{ asset('storage/'.$guru->gambar_guru) }}" alt="Avatar Tailwind CSS Component" />
            </div>
        </div>
        <span class="label-text -mb-4">Tautan Foto Guru :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <i class="fas fa-link"></i>
            <input type="text" name="gambar_guru"
                class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarGuru/*"
                placeholder="Logo" value="{{ $guru->gambar_guru }}" />
        </label>
        <span class="label-text -mb-4">Nama Guru :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Guru" name="nama_guru"
                value="{{ $guru->nama_guru }}" readonly />
        </label>
        <span class="label-text -mb-4">NIP Guru :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nik_guru"
                value="{{ $guru->nik_guru }}" readonly />
        </label>
        <span class="label-text -mb-4">Bidang Program Keahlian :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nama_program"
                value="{{ $guru->programKeahlian->nama_program }}" readonly />
        </label>
        <span class="label-text -mb-4">Email Guru :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_guru"
                value="{{ $guru->email_guru }}" readonly />
        </label>
        <span class="label-text -mb-4">No.Handphone Guru :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_guru"
                value="{{ $guru->no_hp_guru }}" readonly />
        </label>
        <span class="label-text -mb-4">Tempat, Tanggal Lahir Guru :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir"
                name="tempat_lahir_guru" value="{{ $guru->tempat_lahir_guru }}" readonly />
            <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_guru"
                value="{{ $guru->TTL_guru }}" readonly />
        </label>
        <span class="label-text -mb-4">Jenis Kelamin Guru :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="jenis_kelamin"
                value="{{ $guru->jenis_kelamin }}" readonly />
        </label>
        <span class="label-text -mb-4">Alamat Guru :</span>
        <textarea
            class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
            placeholder="Alamat" name="alamat_guru" readonly>{{ $guru->alamat_guru }}</textarea>
        <span class="label-text -mb-4">Jabatan Guru :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan" name="jabatan_guru"
                value="{{ $guru->jabatan_guru }}" readonly />
        </label>
        <span class="label-text -mb-4">Status Guru :</span>
        <label
            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="status_guru"
                value="{{ $guru->status_guru }}" readonly />
        </label>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- View Modal -->

<!-- Delete Modal -->
<dialog id="my_modal_delete{{ $guru->id_guru }}" class="modal">
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
        <form action="{{ route('DirektoriGuru.destroy', ['id_guru' => $guru->id_guru]) }}" method="post">
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