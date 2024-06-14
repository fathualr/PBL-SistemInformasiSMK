@extends('layouts.main')

@section('Main')

<div class="divider">
    <h4 class="font-bold text-2xl">PENGUMUMAN PPDB</h4>
</div>
<div class="text-center"><Span>{{ $informasi->deskripsi_pengumuman }}</Span></div>

<div
    class="smartphone:grid smartphone:justify-center smartphone:gap-y-4 tablet:gap-y-0 tablet:flex tablet:justify-between items-center mt-5">

    @if($pengumuman_ppdb->tautan_dokumen)
    <a href="{{ asset('storage/' . $pengumuman_ppdb->tautan_dokumen) }}" target="_blank">
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Lihat Dokumen</button>
    </a>
    @else
    <button class="bg-gray-500 text-white px-4 py-2 rounded cursor-not-allowed" disabled>Tidak ada dokumen</button>
    @endif

    <div class="flex items-center">
        <div class="relative mr-2 flex">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option
                    value="{{ route('guest.pengumuman-ppdb.index', array_merge(request()->query(), ['perPage' => 25])) }}"
                    {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option
                    value="{{ route('guest.pengumuman-ppdb.index', array_merge(request()->query(), ['perPage' => 50])) }}"
                    {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option
                    value="{{ route('guest.pengumuman-ppdb.index', array_merge(request()->query(), ['perPage' => 75])) }}"
                    {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option
                    value="{{ route('guest.pengumuman-ppdb.index', array_merge(request()->query(), ['perPage' => 100])) }}"
                    {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>

        <div class="mr-2 flex">
            <form action="{{ route('guest.pengumuman-ppdb.index') }}" method="GET">
                <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" class="grow smartphone:w-44 tablet:w-72" name="search"
                        placeholder="Cari Nama, NISN" value="{{ request()->get('search') }}" />
                    <input type="hidden" name="perPage" value="{{ request()->get('perPage') }}" />
                </label>
            </form>
        </div>

    </div>
</div>

<div class="divider my-5">
    <h4 class="font-bold text-2xl">DATA SISWA</h4>
</div>
<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-2">
        <div class="mt-5">
            <table class="table smartphone:table-xs tablet:table-md border text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th class="p-2 hidden md:table-cell">NISN</th>
                        <th class="p-2 hidden md:table-cell">Tahun Pendaftaran</th>
                        <th class="p-2 hidden md:table-cell">Program Diterima</th>
                        <th class="tablet:p-2 table-cell">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $key => $form_ppdb)
                    <tr class="hover">
                        <th class="p-2">{{ ($forms->currentPage() - 1) * $forms->perPage() + $key + 1 }}</th>
                        <td class="p-2">{{ $form_ppdb->nama_lengkap }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $form_ppdb->nisn }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $form_ppdb->tahun_pendaftaran }}</td>
                        <td class="p-2 hidden md:table-cell">
                            @if ($form_ppdb->program_diterima)
                            {{ $form_ppdb->program_diterima }}
                            @else
                            -
                            @endif
                        </td>
                        <td class="tablet:p-2 table-cell">
                            @if ($form_ppdb->status == 'Diterima')
                            <span
                                class="smartphone:w-20 smartphone:text-xs tablet:px-2 py-1 text-white bg-elm rounded-full">Diterima</span>
                            @elseif ($form_ppdb->status == 'Ditolak')
                            <span
                                class="smartphone:w-20 smartphone:text-xs tablet:px-2 py-1 text-white bg-error rounded-full">Ditolak</span>
                            @else
                            <span
                                class="smartphone:w-20 smartphone:text-xs tablet:px-2 py-1  text-white bg-gray-500 rounded-full">Dalam
                                Proses</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th class="p-2 hidden md:table-cell">NISN</th>
                        <th class="p-2 hidden md:table-cell">Tahun Pendaftaran</th>
                        <th class="tablet:p-2 table-cell">Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</form>

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