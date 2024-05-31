@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 rounded-md shadow-lg p-4">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Direktori Guru</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-2 row-start-2 mx-5">

        <button class="btn w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-user-plus"></i>
            Tambah
        </button>

    </div>
    <!-- Modal -->

    <!-- Search Bar -->
    <div class="col-span-2 row-start-2 col-start-7">
        <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Cari" />
        </label>
    </div>
    <!-- Search Bar -->

    <!-- Content -->
    <div class="col-span-9 row-start-3">
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
                    @foreach($direktoriGuru as $guruIndex => $guru)
                    @foreach($programKeahlian as $index => $program)
                    @if($guru->id_program === $program->id_program)
                    <tr class="hover">
                        <th>{{ $guruIndex + 1 }}</th>
                        <td class="w-52">
                            <div class="avatar">
                                <div class="mask mask-squircle w-16 h-16">
                                    <img src="{{ asset('storage/'.$guru->gambar_guru) }}" alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $guru->nama_guru }}
                        </td>
                        <td>{{ $guru->nik_guru }}</td>
                        <td class="w-64">{{ $program->nama_program }}</td>
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
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_edit{{ $guru->id_guru }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_view{{ $guru->id_guru }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete{{ $guru->id_guru }}'].showModal()">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </li>
                                    <!-- Delete -->
                                </ul>
                            </details>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <dialog id="my_modal_edit{{ $guru->id_guru }}" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Edit Data Guru</h3>

                            <div class="grid grid-cols-8 w-52 -mt-5">
                                <div class="divider"></div>
                                <div class="divider divider-success"></div>
                                <div class="divider"></div>
                            </div>

                            <form action="{{ route('DirektoriGuru.update', ['id_guru' => $guru->id_guru]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Guru" name="nama_guru" value="{{ $guru->nama_guru }}" />
                                </label>

                                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nik_guru" value="{{ $guru->nik_guru }}" />
                                </label>

                                <select class="select border-elm border-2 w-full mb-5" name="id_program">
                                    <option disabled selected>Pilih Program Keahlian</option>
                                    @foreach($programKeahlian as $index => $program)
                                    <option value="{{ $program->id_program }}" @if($program->id_program ===
                                        $guru->id_program) selected @endif>{{ $program->nama_program }}</option>
                                    @endforeach
                                </select>

                                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_guru" value="{{ $guru->email_guru }}" />
                                </label>

                                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_guru" value="{{ $guru->no_hp_guru }}" />
                                </label>

                                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="date" class="grow bg-transparent border-r-2 py-2 w-16" placeholder="Tanggal Lahir" name="TTL_guru" value="{{ $guru->TTL_guru }}" />
                                    <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_guru" value="{{ $guru->tempat_lahir_guru }}" />
                                </label>

                                <select class="select border-elm border-2 w-full mb-5" name="jenis_kelamin">
                                    <option disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki - Laki" @if($guru->id_guru ===
                                        $guru->jenis_kelamin) selected @endif>Laki - Laki</option>
                                    <option value="Perempuan" @if($guru->id_guru ===
                                        $guru->jenis_kelamin) selected @endif>Perempuan</option>
                                </select>

                                <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_guru">{{ $guru->alamat_guru }}</textarea>

                                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan" name="jabatan_guru" value="{{ $guru->jabatan_guru }}" />
                                </label>

                                <select class="select border-elm border-2 w-full mb-5" name="status_guru">
                                    <option disabled>Pilih Status Guru</option>
                                    <option value="Aktif" @if($guru->id_guru ===
                                        $guru->status_guru) selected @endif>Aktif</option>
                                    <option value="Cuti" @if($guru->id_guru ===
                                        $guru->status_guru) selected @endif>Cuti</option>
                                    <option value="Pensiun" @if($guru->id_guru ===
                                        $guru->status_guru) selected @endif>Pensiun</option>
                                    <option value="Resign" @if($guru->id_guru ===
                                        $guru->status_guru) selected @endif>Resign</option>
                                </select>

                                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="file" name="gambar_guru" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarGuru/*" placeholder="Logo" />
                                </label>

                                <div class="flex justify-end items-end mt-20 gap-4">

                                    <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                        <i class=" fas fa-pen-to-square"></i>
                                        Edit
                                    </button>

                                </div>

                            </form>

                            </form>
                        </div>
                    </dialog>
                    <!-- Edit Modal -->

                    <!-- View Modal -->
                    <dialog id="my_modal_view{{ $guru->id_guru }}" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Info Detail Data Guru</h3>
                            <div class="grid grid-cols-8 w-52 -mt-5">
                                <div class="divider"></div>
                                <div class="divider divider-success"></div>
                                <div class="divider"></div>
                            </div>

                            <div class="avatar flex justify-center items-center my-5">
                                <div class="mask mask-squircle w-36 h-36">
                                    <img src="{{ asset('storage/'.$guru->gambar_guru) }}" alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>

                            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                <i class="fas fa-link"></i>
                                <input type="text" name="gambar_guru" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarGuru/*" placeholder="Logo" value="{{ $guru->gambar_guru }}" />
                            </label>

                            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Guru" name="nama_guru" value="{{ $guru->nama_guru }}" readonly />
                            </label>

                            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nik_guru" value="{{ $guru->nik_guru }}" readonly />
                            </label>

                            <select class="pointer-events-none select border-elm border-2 w-full mb-5" name="id_program">
                                <option disabled selected>Pilih Program Keahlian</option>
                                @foreach($programKeahlian as $index => $program)
                                <option value="{{ $program->id_program }}" @if($program->id_program ===
                                    $guru->id_program) selected @endif>{{ $program->nama_program }}</option>
                                @endforeach
                            </select>

                            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_guru" value="{{ $guru->email_guru }}" readonly />
                            </label>

                            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_guru" value="{{ $guru->no_hp_guru }}" readonly />
                            </label>

                            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                <input type="date" class="grow bg-transparent border-r-2 py-2 w-16" placeholder="Tanggal Lahir" name="TTL_guru" value="{{ $guru->TTL_guru }}" readonly />
                                <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_guru" value="{{ $guru->tempat_lahir_guru }}" readonly />
                            </label>

                            <select class="pointer-events-none select border-elm border-2 w-full mb-5" name="jenis_kelamin">
                                <option disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki - Laki" @if($guru->id_guru ===
                                    $guru->jenis_kelamin) selected @endif>Laki - Laki</option>
                                <option value="Perempuan" @if($guru->id_guru ===
                                    $guru->jenis_kelamin) selected @endif>Perempuan</option>
                            </select>

                            <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_guru" readonly>{{ $guru->alamat_guru }}</textarea>

                            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan" name="jabatan_guru" value="{{ $guru->jabatan_guru }}" readonly />
                            </label>

                            <select class="select border-elm border-2 w-full mb-5" name="status_guru" disabled>
                                <option disabled>Pilih Status Guru</option>
                                <option value="Aktif" @if($guru->id_guru ===
                                    $guru->status_guru) selected @endif>Aktif</option>
                                <option value="Cuti" @if($guru->id_guru ===
                                    $guru->status_guru) selected @endif>Cuti</option>
                                <option value="Pensiun" @if($guru->id_guru ===
                                    $guru->status_guru) selected @endif>Pensiun</option>
                                <option value="Resign" @if($guru->id_guru ===
                                    $guru->status_guru) selected @endif>Resign</option>
                            </select>

                        </div>
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

                                <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus
                                    Data Ini ?</h3>

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
                    @endif
                    @endforeach
                    @endforeach
                </tbody>
                @if ($guru->count() > 5)
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
                @endif
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
        <h3 class="font-bold text-lg">Tambah Guru</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('DirektoriGuru.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Guru" name="nama_guru" />
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="NIP" name="nik_guru" />
            </label>

            <select class="select border-elm border-2 w-full mb-5" name="id_program">
                <option disabled selected>Pilih Program Keahlian</option>
                @foreach($programKeahlian as $program)
                <option value="{{ $program->id_program }}">{{ $program->nama_program }}</option>
                @endforeach
            </select>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_guru" />
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_guru" />
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-4 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent border-r-2 py-2 px-2 w-24" placeholder="Tanggal Lahir" name="TTL_guru" />
                <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_guru" />
            </label>

            <select class="select border-elm border-2 w-full mb-5" name="jenis_kelamin">
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_guru"></textarea>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Jabatan" name="jabatan_guru" />
            </label>

            <select class="select border-elm border-2 w-full mb-5" name="status_guru">
                <option disabled selected>Pilih Status Guru</option>
                <option value="Aktif">Aktif</option>
                <option value="Cuti">Cuti</option>
                <option value="Pensiun">Pensiun</option>
                <option value="Resign">Resign</option>
            </select>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_guru" class="grow file-input file-input-success border-none bg-transparent py-2" placeholder="Logo" />
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
</dialog>

@endsection