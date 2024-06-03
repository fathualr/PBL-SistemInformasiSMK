@extends('layouts.mainAdmin')

@section('main-content')

<div>
    <h2 class="text-black font-bold text-xl mx-5 my-2">Pendaftaraan PPDB</h2>
</div>

<div class="flex justify-between items-center mx-5">
    <a href="{{ route('download.excel') }}" class="btn btn-outline w-max hover:animate-pulse">
        <i class="fas fa-file-excel mr-2"></i>
        Download Excel
    </a>

    <div class="flex items-center">
        <div class="relative mr-2 hidden md:flex">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('admin.pendaftaranPPDB.index', ['perPage' => 10]) }}"
                    {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('admin.pendaftaranPPDB.index', ['perPage' => 25]) }}"
                    {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('admin.pendaftaranPPDB.index', ['perPage' => 50]) }}"
                    {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('admin.pendaftaranPPDB.index', ['perPage' => 75]) }}"
                    {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="{{ route('admin.pendaftaranPPDB.index', ['perPage' => 100]) }}"
                    {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>

        <div class="hidden md:flex">
            <form action="{{ route('admin.pendaftaranPPDB.index') }}" method="GET">
                <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" class="grow" name="search" placeholder="Cari Nama" />
                </label>
            </form>
        </div>
    </div>
</div>


<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-2">
        <div class="mt-5">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th class="p-2 hidden md:table-cell">Jenis Kelamin</th>
                        <Th class="p-2 hidden md:table-cell">Nisn</Th>
                        <Th class="p-2 hidden md:table-cell">No Telepon</Th>
                        <th class="p-2 hidden md:table-cell">Dokumen</th>
                        <Th>Aksi</Th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $key => $form_ppdb)
                    <tr class="hover">
                        <th class="w-8">{{ ($forms->currentPage() - 1) * $forms->perPage() + $key + 1 }}</th>
                        <td class="w-8">{{ $form_ppdb->nama_lengkap }}</td>
                        <td class="w-8 p-2 hidden md:table-cell">{{ $form_ppdb->jenis_kelamin }}</td>
                        <td class="w-8 p-2 hidden md:table-cell">{{ $form_ppdb->nisn }}</td>
                        <td class="w-8 p-2 hidden md:table-cell">{{ $form_ppdb->no_hp }}</td>
                        <td class="w-8 p-2 hidden md:table-cell">
                            @if($form_ppdb->tautan_dokumen)
                            <a href="{{ asset('storage/' . $form_ppdb->tautan_dokumen) }}" target="_blank">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Lihat
                                    Dokumen</button>
                            </a>
                            @else
                            <button class="bg-gray-500 text-white px-4 py-2 rounded cursor-not-allowed" disabled>Tidak
                                ada dokumen</button>
                            @endif
                        </td>

                        <td class="w-8">
                            <details class="dropdown">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0"
                                    class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_view_{{ $form_ppdb->id_pendaftaran }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_delete_{{ $form_ppdb->id_pendaftaran }}'].showModal()">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </li>
                                </ul>
                            </details>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <Th>Nisn</Th>
                        <Th>No Telepon</Th>
                        <Th>Dokumen</Th>
                        <Th>Aksi</Th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@foreach ($forms as $form_ppdb)
<dialog id="my_modal_view_{{ $form_ppdb->id_pendaftaran }}" class="modal">
    <div class="modal-box max-w-full sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Data</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100">
            <div class="collapse-title font-medium">
                Data Siswa
            </div>
            <div class="collapse-content">
                <table class="table w-full">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Nama Lengkap</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Jenis Kelamin</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">NISN</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->nisn }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Agama</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->agama }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Tempat Lahir</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Tanggal Lahir</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">No HP</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->no_hp }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Pilihan 1</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->pilihan_1 }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Pilihan 2</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->pilihan_2 }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Tahun Pendaftaran</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->tahun_pendaftaran }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100 mt-2">
            <div class="collapse-title font-medium">
                Data Sekolah
            </div>
            <div class="collapse-content">
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Nama Sekolah Asal</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->nama_sekolah_asal }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Alamat</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->alamat }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">No RT</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->no_rt }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">No RW</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->no_rw }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Kelurahan</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->kelurahan }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Kecamatan</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->kecamatan }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Kota</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->kota }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Provinsi</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->provinsi }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Kode Pos</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->kode_pos }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100 mt-2">
            <div class="collapse-title font-medium">
                Data Wali
            </div>
            <div class="collapse-content">
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Nama Wali</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->nama_wali }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Agama Wali</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->agama_wali }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Alamat Wali</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->alamat_wali }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">No HP Wali</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->no_hp_wali }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Tempat Lahir Wali</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->tempat_lahir_wali }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Tanggal Lahir Wali</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->tanggal_lahir_wali }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Pekerjaan Wali</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->pekerjaan_wali }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Penghasilan Wali</td>
                            <td class="border px-4 py-2">{{ $form_ppdb->penghasilan_wali }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100 mt-2">
            <div class="collapse-title font-medium">
                Dokumen Tambahan
            </div>
            <div class="collapse-content">
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td class="w-8">
                                @if($form_ppdb->tautan_dokumen)
                                <a href="{{ asset('storage/' . $form_ppdb->tautan_dokumen) }}" target="_blank">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Lihat
                                        Dokumen</button>
                                </a>
                                @else
                                <button class="bg-gray-500 text-white px-4 py-2 rounded cursor-not-allowed"
                                    disabled>Tidak ada dokumen</button>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="my_modal_delete_{{ $form_ppdb->id_pendaftaran }}" class="modal">
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
        <form action="{{ route('admin.pendaftaranPPDB.destroy', $form_ppdb->id_pendaftaran) }}" method="post">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-trash"></i>
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

<div class="join flex justify-center my-5">
    @if($forms->previousPageUrl())
    <a href="{{ $forms->previousPageUrl() }}&perPage={{ request()->get('perPage') }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif

    <button class="join-item btn">Page {{ $forms->currentPage() }}</button>

    @if($forms->nextPageUrl())
    <a href="{{ $forms->nextPageUrl() }}&perPage={{ request()->get('perPage') }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>

@endsection