@extends('layouts.main')

@section('Main')

<div class="divider">
    <h4 class="font-bold">PENGUMUMAN PPDB</h4>
</div>
<Span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia maxime ratione assumenda facilis placeat voluptatibus necessitatibus perspiciatis, distinctio sunt consequuntur aliquid mollitia perferendis quos qui architecto eos quas repudiandae non.</Span>
<div class="flex justify-end items-center mt-5">
    <div class="relative mr-2 hidden md:flex">
        <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
            <option value="{{ route('guest.pengumuman-ppdb.index', ['perPage' => 10]) }}" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="{{ route('guest.pengumuman-ppdb.index', ['perPage' => 25]) }}" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="{{ route('guest.pengumuman-ppdb.index', ['perPage' => 50]) }}" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
            <option value="{{ route('guest.pengumuman-ppdb.index', ['perPage' => 75]) }}" {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
            <option value="{{ route('guest.pengumuman-ppdb.index', ['perPage' => 100]) }}" {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
        </select>
    </div>

    <div class="hidden mr-2 md:flex">
        <form action="{{ route('guest.pengumuman-ppdb.index') }}" method="GET">
            <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" class="grow" name="search" placeholder="Cari Nama" value="{{ request()->get('search') }}" />
            </label>
        </form>
    </div>
</div>

<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-2">
        <div class="mt-5">
            <table class="table table-md text-center">
                <thead>
                    <tr>
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
                        <th class="p-2">{{ ($forms->currentPage() - 1) * $forms->perPage() + $key + 1 }}</th>
                        <td class="p-2">{{ $form_ppdb->nama_lengkap }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $form_ppdb->nisn }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $form_ppdb->tahun_pendaftaran }}</td>
                        <td class="p-2 hidden md:table-cell">
                            @if ($form_ppdb->status == 'Diterima')
                            <span class="px-2 py-1 text-white bg-green-500 rounded-full">Diterima</span>
                            @elseif ($form_ppdb->status == 'Ditolak')
                            <span class="px-2 py-1 text-white bg-red-500 rounded-full">Ditolak</span>
                            @else
                            <span class="px-2 py-1 text-white bg-gray-500 rounded-full">Dalam Proses</span>
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