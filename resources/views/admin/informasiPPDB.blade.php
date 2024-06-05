@extends('layouts.mainAdmin')

@section('main-content')

@include('shared.success-message')
@include('shared.error-message')

<div role="tablist" class="tabs tabs-lifted">
    <input type="radio" name="my_tabs_2" role="tab" class="tab font-bold" aria-label="Informasi PPDB" checked />
    <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">

        <div class="collapse collapse-arrow bg-base-200" id="nama_sekolah">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                <span class="label-text font-bold">Informasi PPDB</span>
            </div>
            <div class="collapse-content">
                <form
                    action="{{ route('admin.informasiPPDB.update', ['id'=> $informasi->id_ppdb, 'field' => 'deskripsi_ppdb' ]) }}"
                    method="POST" class="grid gap-2">
                    @csrf
                    @method('PATCH')
                    <label class="form-control w-full gap-2">
                        @if(!empty($informasi->deskripsi_ppdb))
                        <textarea class="textarea textarea-bordered bg-white"
                            disabled>{{ $informasi->deskripsi_ppdb }}</textarea>
                        @else
                        <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar
                            dapat ditampilkan.</p>
                        @endif
                        <input type="text" placeholder="Type here" class="input input-bordered w-full"
                            name="deskripsi_ppdb" required />
                    </label>
                    <div class="flex justify-end items-end gap-2">
                        <button type="submit"
                            class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                            <i class="fas fa-plus"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="collapse collapse-arrow bg-base-200 mt-5" id="nama_sekolah">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                <span class="label-text font-bold">Pengumuman PPDB</span>
            </div>
            <div class="collapse-content">
                <form
                    action="{{ route('admin.informasiPPDB.update', ['id'=> $informasi->id_ppdb, 'field' => 'deskripsi_pengumuman' ]) }}"
                    method="POST" class="grid gap-2">
                    @csrf
                    @method('PATCH')
                    <label class="form-control w-full gap-2">
                        @if(!empty($informasi->deskripsi_pengumuman))
                        <textarea class="textarea textarea-bordered bg-white"
                            disabled>{{ $informasi->deskripsi_pengumuman }}</textarea>
                        @else
                        <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar
                            dapat ditampilkan.</p>
                        @endif
                        <input type="text" placeholder="Type here" class="input input-bordered w-full"
                            name="deskripsi_pengumuman" required />
                    </label>
                    <div class="flex justify-end items-end gap-2">
                        <button type="submit"
                            class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                            <i class="fas fa-plus"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="collapse collapse-arrow bg-base-200 mt-5" id="nama_sekolah">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                <span class="label-text font-bold">Upload Pengumuman PPDB</span>
            </div>
            <div class="collapse-content">
                @if($pengumuman_ppdb)
                <form action="{{ route('admin.pengumumanPPDB.update', ['id' => $pengumuman_ppdb->id_pengumuman]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <label class="btn btn-outline w-max hover:animate-pulse cursor-pointer">
                        <i class="fas fa-file-upload mr-2"></i>
                        Upload PDF
                        <input type="file" name="tautan_dokumen" accept="application/pdf" class="hidden">
                    </label>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
                @else
                <p class="text-red-500">Pengumuman PPDB belum tersedia.</p>
                @endif
            </div>
        </div>


        <div class="collapse collapse-arrow bg-base-200 mt-5" id="countdown_settings">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                <span class="label-text font-bold">Pengaturan Hitungan Mundur</span>
            </div>
            <div class="collapse-content">
                <form action="{{ route('admin.countdown.update') }}" method="POST" class="grid gap-2">
                    @csrf
                    <label class="form-control w-full gap-2">
                        <p class="label-text font-semibold">Waktu Mulai</p>
                        <input type="datetime-local" class="input input-bordered w-full" name="countdown_start"
                            value="{{ $countdownStart ?? '' }}" required />
                    </label>
                    <label class="form-control w-full gap-2">
                        <p class="label-text font-semibold">Waktu Akhir</p>
                        <input type="datetime-local" class="input input-bordered w-full" name="countdown_end"
                            value="{{ $countdownEnd ?? '' }}" required />
                    </label>
                    <div class="flex justify-end items-end gap-4">
                        <button type="submit"
                            class="btn bg-elm w-32 h-10 rounded-sm border-none text-white hover:text-elm">
                            <i class="fas fa-save"></i>
                            Simpan
                        </button>
                </form>
                <!-- Form for delete action -->
                <form action="{{ route('admin.countdown.delete') }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="btn bg-red-600 w-32 h-10 rounded-sm border-none text-white hover:bg-red-700">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<input type="radio" name="my_tabs_2" role="tab" class="tab font-bold" aria-label="Alur PPDB" />
<div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">

    <div class="w-full md:w-auto mb-2 md:mt-5">
        <button class="btn btn-outline w-full md:w-auto hover:animate-pulse relative disable-cursor"
            onclick="my_modal_add_alur.showModal()" @if($alurs->count() >= 4) disabled class="btn-disabled" @endif>
            <i class="fas fa-plus"></i>
            Tambahkan Alur
        </button>
    </div>

    <div class="mt-5">
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="w-20">No.</th>
                    <th class="text-left pl-10 w-20">Judul Alur</th>
                    <th class="text-left pl-10 w-20">Tanggal Alur</th>
                    <th class="text-left pl-10 w-72">Deskripsi Alur</th>
                    <th class="w-20">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alurs as $key => $alur_ppdb)
                <tr class="hover">
                    <th class="w-20">{{ $key + 1 }}</th>
                    <td class="text-left pl-10 w-20">{{ $alur_ppdb->judul_alur }}</td>
                    <td class="text-left pl-10 w-20">{{ $alur_ppdb->tanggal_alur }}</td>
                    <td class="text-left pl-10">
                        <p class="truncate w-72">{{ $alur_ppdb->deskripsi_alur }}</p>
                    </td>
                    <td>
                        <details class="dropdown">
                            <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                            </summary>
                            <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse"
                                        onclick="window['my_modal_edit_alur_{{ $alur_ppdb->id_alur }}'].showModal()">
                                        <i class="fas fa-pen-to-square"></i> Edit
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse"
                                        onclick="window['my_modal_delete_alur_{{ $alur_ppdb->id_alur }}'].showModal()">
                                        <i class="fas fa-trash"></i> Hapus
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
                    <th class="w-20">No.</th>
                    <th class="text-left pl-10 w-20">Judul Alur</th>
                    <th class="text-left pl-10 w-20">Tanggal Alur</th>
                    <th class="text-left pl-10 w-72">Deskripsi Alur</th>
                    <th class="w-20">Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>


</div>

</div>

<dialog id="my_modal_add_alur" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Tambah Alur PPDB</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('admin.alurPPDB.store') }}" method="post">
            @csrf
            <span class="label-text -mb-4">Judul Alur :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="judul_alur" class="grow bg-transparent py-2" placeholder="Judul Alur" />
            </label>
            <span class="label-text -mb-4">Tanggal Alur :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" name="tanggal_alur" class="grow bg-transparent py-2" placeholder="Tanggal Alur" />
            </label>
            <span class="label-text -mb-4">Deskripsi Alur :</span>
            <textarea name="deskripsi_alur"
                class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow bg-transparent py-2"
                placeholder="Deskripsi Alur"></textarea>

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

@foreach($alurs as $key => $alur_ppdb)
<dialog id="my_modal_edit_alur_{{ $alur_ppdb->id_alur }}" class="modal"
    onclick="if (event.target === this) this.close()">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Edit Data</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.alurPPDB.update', $alur_ppdb->id_alur) }}" method="post">
            @csrf
            @method('PATCH')
            <span class="label-text -mb-4">Judul Alur :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="judul_alur" class="grow bg-transparent py-2"
                    value="{{ $alur_ppdb->judul_alur }}" />
            </label>
            <span class="label-text -mb-4">Tanggal Alur :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" name="tanggal_alur" class="grow bg-transparent py-2"
                    value="{{ $alur_ppdb->tanggal_alur }}" />
            </label>
            <span class="label-text -mb-4">Deskripsi Alur :</span>
            <textarea name="deskripsi_alur"
                class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-28 focus-within:outline-none grow bg-transparent py-2">{{ $alur_ppdb->deskripsi_alur }}</textarea>

            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class="fas fa-pen-to-square"></i>
                    Edit
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="my_modal_delete_alur_{{ $alur_ppdb->id_alur }}" class="modal"
    onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Alur PPDB</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.alurPPDB.destroy', $alur_ppdb->id_alur) }}" method="post">
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

@endsection