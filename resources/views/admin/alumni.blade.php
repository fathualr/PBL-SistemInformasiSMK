@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 rounded-md">

    @include('shared.success-message')
    @include('shared.error-message')
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Direktori Alumni</h3>
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
                        <th>Foto Alumni</th>
                        <th>Nama Alumni</th>
                        <th>Tahun Kelulusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($direktoriAlumni as $key => $alumni)
                    <tr class="hover">
                        <th>{{ ($alumni->currentPage() - 1) * $alumni->perPage() + $key + 1 }}</th>
                        <td>
                            <div class="flex justify-center items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="{{ asset('storage/'.$alumni->gambar_alumni) }}" alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $alumni->nama_alumni }}</td>
                        <td>{{ $alumni->tahun_kelulusan_alumni }}</td>
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
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_edit{{ $alumni->id_alumni }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_view{{ $alumni->id_alumni }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete{{ $alumni->id_alumni }}'].showModal()">
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
                        <th>Foto Alumni</th>
                        <th>Nama Alumni</th>
                        <th>Tahun Kelulusan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
            
            <!-- Pagination -->
            <div class="flex justify-center my-5 gap-2">
                @if($direktoriAlumni->previousPageUrl())
                <a href="{{ $direktoriAlumni->previousPageUrl() }}" class="btn">«</a>
                @else
                <button class="btn disabled">«</button>
                @endif

                <button class="btn">Page {{ $direktoriAlumni->currentPage() }}</button>

                @if($direktoriAlumni->nextPageUrl())
                <a href="{{ $direktoriAlumni->nextPageUrl() }}" class="btn">»</a>
                @else
                <button class="btn disabled">»</button>
                @endif
            </div> 

        </div>
    </div>
    <!-- Content -->
</div>

<!-- Create Modal -->
<dialog id="my_modal_add" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Alumni</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('DirektoriAlumni.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama" name="nama_alumni" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_alumni" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_alumni" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent border-r-2 py-2 w-16" placeholder="Tanggal Lahir" name="TTL_alumni" />
                <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_alumni" />
            </label>
            <select class="select border-elm border-2 w-full mb-5" name="jenis_kelamin_alumni">
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="Tahun Kelulusan" name="tahun_kelulusan_alumni" />
            </label>
            <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_alumni"></textarea>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_alumni" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarAlumni/*" placeholder="Logo" />
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
<!-- Create Modal -->

<!-- Edit Modal -->
@foreach($direktoriAlumni as $key => $alumni)
<dialog id="my_modal_edit{{ $alumni->id_alumni }}" class="modal">
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

        <form action="{{ route('DirektoriAlumni.update', $alumni->id_alumni) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama" name="nama_alumni" value="{{ $alumni->nama_alumni }}" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_alumni" value="{{ $alumni->email_alumni }}" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_alumni" value="{{ $alumni->no_hp_alumni }}" />
            </label>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent border-r-2 py-2 w-16" placeholder="Tanggal Lahir" name="TTL_alumni" value="{{ $alumni->TTL_alumni }}" />
                <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_alumni" value="{{ $alumni->tempat_lahir_alumni }}" />
            </label>
            <select class="select border-elm border-2 w-full mb-5" name="jenis_kelamin_alumni">
                <option disabled>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki" {{ $alumni->jenis_kelamin_alumni === 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                <option value="Perempuan" {{ $alumni->jenis_kelamin_alumni === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="Tahun Kelulusan" name="tahun_kelulusan_alumni" value="{{ $alumni->tahun_kelulusan_alumni }}" />
            </label>
            <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_alumni">{{ $alumni->alamat_alumni }}</textarea>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_alumni" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarAlumni/*" placeholder="Logo" />
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
</dialog>
<!-- Edit Modal -->

<!-- View Modal -->
<dialog id="my_modal_view{{ $alumni->id_alumni }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Data</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <div class="avatar flex justify-center items-center my-5">
            <div class="mask mask-squircle w-36 h-36">
                <img src="{{ asset('storage/'.$alumni->gambar_alumni) }}" alt="Avatar Tailwind CSS Component" />
            </div>
        </div>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <i class="fas fa-link"></i>
            <input type="text" name="gambar_guru" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarGuru/*" placeholder="Logo" value="{{ $alumni->gambar_alumni }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama" name="nama_alumni" value="{{ $alumni->nama_alumni }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_alumni" value="{{ $alumni->email_alumni }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_alumni" value="{{ $alumni->no_hp_alumni }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="date" class="grow bg-transparent border-r-2 py-2 w-16" placeholder="Tanggal Lahir" name="TTL_alumni" value="{{ $alumni->TTL_alumni }}" readonly />
            <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_alumni" value="{{ $alumni->tempat_lahir_alumni }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="jenis_kelamin_alumni" value="{{ $alumni->jenis_kelamin_alumni }}" readonly />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Tahun Kelulusan" name="tahun_kelulusan_alumni" value="{{ $alumni->tahun_kelulusan_alumni }}" readonly />
        </label>
        <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_alumni" readonly>{{ $alumni->alamat_alumni }}</textarea>
    </div>
</dialog>
<!-- View Modal -->

<!-- Delete Modal -->
<dialog id="my_modal_delete{{ $alumni->id_alumni }}" class="modal">
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

        <form action="{{ route('DirektoriAlumni.destroy', ['id_alumni' => $alumni->id_alumni]) }}" method="post">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class=" fas fa-trash"></i>
                    Hapus
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama" name="nama_alumni" />
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_alumni" />
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_alumni" />
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent border-r-2 py-2 w-16" placeholder="Tanggal Lahir" name="TTL_alumni" />
                <input type="text" class="grow bg-transparent py-2" placeholder="Tempat Lahir" name="tempat_lahir_alumni" />
            </label>

            <select class="select border-elm border-2 w-full mb-5" name="jenis_kelamin">
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Tahun Kelulusan" name="tahun_kelulusan_alumni" />
            </label>

            <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_alumni"></textarea>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_alumni" class="grow file-input file-input-success border-none bg-transparent py-2" placeholder="Logo" />
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
<!-- Delete Modal -->
@endforeach

@endsection