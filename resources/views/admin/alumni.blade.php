@extends('layouts.mainAdmin')

@section('main-content')



@include('shared.success-message')
@include('shared.error-message')
<!-- Title -->
<div class="col-span-2 my-4 mx-5 row-start-2">
    <h3 class="font-bold text-lg">Direktori Alumni</h3>
</div>
<!-- Title -->

<!-- Modal -->
<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <button class="btn btn-outline hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-user-plus"></i>
            Tambah Alumni
        </button>
    </div>
    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('admin.direktoriAlumni.index', ['perPage' => 10]) }}" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('admin.direktoriAlumni.index', ['perPage' => 25]) }}" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('admin.direktoriAlumni.index', ['perPage' => 50]) }}" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('admin.direktoriAlumni.index', ['perPage' => 75]) }}" {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="{{ route('admin.direktoriAlumni.index', ['perPage' => 100]) }}" {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>
        <form action="{{ route('admin.direktoriAlumni.index') }}" method="GET">
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
                        <th>Foto Alumni</th>
                        <th>Nama Alumni</th>
                        <th>Tahun Kelulusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($direktoriAlumni as $key => $alumni)
                    <tr class="hover">
                        <th>{{ ($direktoriAlumni->currentPage() - 1) * $direktoriAlumni->perPage() + $key + 1 }}</th>
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
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="join flex justify-center my-5">
    @if($direktoriAlumni->previousPageUrl())
    <a href="{{ $direktoriAlumni->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif

    <button class="join-item btn">Page {{ $direktoriAlumni->currentPage() }}</button>

    @if($direktoriAlumni->nextPageUrl())
    <a href="{{ $direktoriAlumni->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>



<!-- Create Modal -->
<dialog id="my_modal_add" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Alumni</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('DirektoriAlumni.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <span class="label-text -mb-4">Nama Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama" name="nama_alumni" />
            </label>
            <span class="label-text -mb-4">Email Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_alumni" />
            </label>
            <span class="label-text -mb-4">No.Handphone Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_alumni" />
            </label>
            <span class="label-text -mb-4">Tempat, Tanggal Lahir Pegawai :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir" name="tempat_lahir_alumni" />
                <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_alumni" />
            </label>
            <span class="label-text -mb-4">Jenis Kelamin Alumni :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="jenis_kelamin_alumni">
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <span class="label-text -mb-4">Tahun Kelulusan Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="Tahun Kelulusan" name="tahun_kelulusan_alumni" />
            </label>
            <span class="label-text -mb-4">Alamat Alumni :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_alumni"></textarea>
            <span class="label-text -mb-4">Foto Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_alumni" accept="gambarAlumni/*" class="grow file-input file-input-success border-none bg-transparent py-2
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
<!-- Create Modal -->

<!-- Edit Modal -->
@foreach($direktoriAlumni as $key => $alumni)
<dialog id="my_modal_edit{{ $alumni->id_alumni }}" class="modal">
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

        <form action="{{ route('DirektoriAlumni.update', $alumni->id_alumni) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <span class="label-text -mb-4">Nama Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama" name="nama_alumni" value="{{ $alumni->nama_alumni }}" />
            </label>
            <span class="label-text -mb-4">Email Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="email" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_alumni" value="{{ $alumni->email_alumni }}" />
            </label>
            <span class="label-text -mb-4">No.Handphone Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_alumni" value="{{ $alumni->no_hp_alumni }}" />
            </label>
            <span class="label-text -mb-4">Tempat, Tanggal Lahir Pegawai :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir" name="tempat_lahir_alumni" value="{{ $alumni->tempat_lahir_alumni }}" />
                <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_alumni" value="{{ $alumni->TTL_alumni }}" />
            </label>
            <span class="label-text -mb-4">Jenis Kelamin Alumni :</span>
            <select class="select border-blue-400 border-2 w-full mb-5" name="jenis_kelamin_alumni">
                <option disabled>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki" {{ $alumni->jenis_kelamin_alumni === 'Laki - Laki' ? 'selected' : '' }}>Laki
                    - Laki</option>
                <option value="Perempuan" {{ $alumni->jenis_kelamin_alumni === 'Perempuan' ? 'selected' : '' }}>
                    Perempuan</option>
            </select>
            <span class="label-text -mb-4">Tahun Kelulusan Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="number" class="grow bg-transparent border-b-2 py-2" placeholder="Tahun Kelulusan" name="tahun_kelulusan_alumni" value="{{ $alumni->tahun_kelulusan_alumni }}" />
            </label>
            <span class="label-text -mb-4">Alamat Alumni :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_alumni">{{ $alumni->alamat_alumni }}</textarea>
            <span class="label-text -mb-4">Foto Alumni :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_alumni" accept="gambarAlumni/*" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required />
            </label>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
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
<dialog id="my_modal_view{{ $alumni->id_alumni }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
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
        <span class="label-text -mb-4">Tautan Foto :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" name="gambar_guru" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarGuru/*" placeholder="Logo" value="{{ $alumni->gambar_alumni }}" readonly />
        </label>
        <span class="label-text -mb-4">Nama Alumni :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama" name="nama_alumni" value="{{ $alumni->nama_alumni }}" readonly />
        </label>
        <span class="label-text -mb-4">Email Alumni :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Email" name="email_alumni" value="{{ $alumni->email_alumni }}" readonly />
        </label>
        <span class="label-text -mb-4">No.Handphone Alumni :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="no_hp_alumni" value="{{ $alumni->no_hp_alumni }}" readonly />
        </label>
        <span class="label-text -mb-4">Tempat, Tanggal Lahir Pegawai :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-r-2 py-2" placeholder="Tempat Lahir" name="tempat_lahir_alumni" value="{{ $alumni->tempat_lahir_alumni }}" readonly />
            <input type="date" class="grow bg-transparent py-2 w-16" placeholder="Tanggal Lahir" name="TTL_alumni" value="{{ $alumni->TTL_alumni }}" readonly />
        </label>
        <span class="label-text -mb-4">Jenis Kelamin Alumni :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="No.Hp" name="jenis_kelamin_alumni" value="{{ $alumni->jenis_kelamin_alumni }}" readonly />
        </label>
        <span class="label-text -mb-4">Tahun Kelulusan Alumni :</span>
        <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Tahun Kelulusan" name="tahun_kelulusan_alumni" value="{{ $alumni->tahun_kelulusan_alumni }}" readonly />
        </label>
        <span class="label-text -mb-4">Alamat Alumni :</span>
        <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Alamat" name="alamat_alumni" readonly>{{ $alumni->alamat_alumni }}</textarea>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
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
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- Delete Modal -->
@endforeach

@endsection