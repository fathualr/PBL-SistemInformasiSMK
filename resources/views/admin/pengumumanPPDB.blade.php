@extends('layouts.mainAdmin')

@section('main-content')

<div>
    <h2 class="text-black font-bold text-xl mx-5 my-2">Pengumuman PPDB</h2>
</div>

<div class="flex justify-end items-center">
    <div class="flex items-center">
        <div class="relative mr-2 hidden md:flex">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('admin.pengumumanPPDB.index', array_merge(request()->query(), ['perPage' => 10])) }}" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('admin.pengumumanPPDB.index', array_merge(request()->query(), ['perPage' => 25])) }}" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('admin.pengumumanPPDB.index', array_merge(request()->query(), ['perPage' => 50])) }}" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('admin.pengumumanPPDB.index', array_merge(request()->query(), ['perPage' => 75])) }}" {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="{{ route('admin.pengumumanPPDB.index', array_merge(request()->query(), ['perPage' => 100])) }}" {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>

        <div class="hidden mr-2 md:flex">
            <form action="{{ route('admin.pengumumanPPDB.index') }}" method="GET">
                <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" class="grow w-40" name="search" placeholder="Cari Nama" value="{{ request()->get('search') }}" />
                    <input type="hidden" name="perPage" value="{{ request()->get('perPage') }}" />
                </label>
            </form>
        </div>
        <div class="mr-2">
            <form id="updateStatusForm" action="{{ route('admin.pengumumanPPDB.updateBatch') }}" method="POST">
                @csrf
                <select name="status" class="select select-bordered w-32">
                    <option value="Diterima">Diterima</option>
                    <option value="Ditolak">Ditolak</option>
                    <option value="Dalam Proses">Dalam Proses</option>
                </select>
                <button type="submit" class="btn bg-blue-400 text-white hover:text-blue-400">Update Status</button>
        </div>
    </div>
</div>

<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-2">
        <div class="mt-5">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" id="select-all" />
                            </label>
                        </th>
                        <th>No.</th>
                        <th>Nama</th>
                        <th class="p-2 hidden md:table-cell">NISN</th>
                        <th class="p-2 hidden md:table-cell">Tahun Pendaftaran</th>
                        <th class="p-2 hidden md:table-cell">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $key => $form_ppdb)
                    <tr class="hover">
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox select-item" name="selected_forms[]" value="{{ $form_ppdb->id_pendaftaran }}" />
                            </label>
                        </th>
                        <th class="p-2">{{ ($forms->currentPage() - 1) * $forms->perPage() + $key + 1 }}</th>
                        <td class="p-2">{{ $form_ppdb->nama_lengkap }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $form_ppdb->nisn }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $form_ppdb->tahun_pendaftaran }}</td>
                        <td class="p-2 hidden md:table-cell">
                            @if ($form_ppdb->status == 'Diterima')
                            <span class="px-2 py-1 text-white bg-elm rounded-full">Diterima</span>
                            @elseif ($form_ppdb->status == 'Ditolak')
                            <span class="px-2 py-1 text-white bg-error rounded-full">Ditolak</span>
                            @else
                            <span class="px-2 py-1 text-white bg-gray-500 rounded-full">Dalam Proses</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" id="select-all-footer" />
                            </label>
                        </th>
                        <th>No.</th>
                        <th>Nama</th>
                        <th class="p-2 hidden md:table-cell">NISN</th>
                        <th class="p-2 hidden md:table-cell">Tahun Pendaftaran</th>
                        <th class="p-2 hidden md:table-cell">Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</form>

<div class="join flex justify-center my-5">
    @if($forms->previousPageUrl())
    <a href="{{ $forms->previousPageUrl() }}&search={{ request()->get('search') }}&perPage={{ request()->get('perPage') }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif

    <button class="join-item btn">Page {{ $forms->currentPage() }}</button>

    @if($forms->nextPageUrl())
    <a href="{{ $forms->nextPageUrl() }}&search={{ request()->get('search') }}&perPage={{ request()->get('perPage') }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>

@endsection