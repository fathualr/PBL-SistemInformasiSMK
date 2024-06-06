@extends('layouts.main')
@section('Main')

<div class="divider">
    <p class="font-bold text-xl">Berita</p>
</div>

<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <div class="dropdown dropdown-hover">
            <div tabindex="0" role="button" class="btn btn-outline w-full m-1">
                <i class="fas fa-list"></i>
                Kategori Berita
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-max">
                <li>
                    <a href="{{ route('berita.show', array_merge(request()->query(), ['nama_kategori' => null])) }}" class="font-bold">
                        Tampilkan Semua
                    </a>
                </li>
                @foreach ($kategoriBerita as $kategori)
                <li>
                    <a href="{{ route('berita.show', array_merge(request()->query(), ['nama_kategori' => $kategori->nama_kategori])) }}">
                        {{ $kategori->nama_kategori }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('berita.show', array_merge(request()->query(), ['perPage' => 6])) }}" {{ request()->get('perPage') == 6 ? 'selected' : '' }}>6</option>
                <option value="{{ route('berita.show', array_merge(request()->query(), ['perPage' => 12])) }}" {{ request()->get('perPage') == 12 ? 'selected' : '' }}>12</option>
                <option value="{{ route('berita.show', array_merge(request()->query(), ['perPage' => 18])) }}" {{ request()->get('perPage') == 18 ? 'selected' : '' }}>18</option>
                <option value="{{ route('berita.show', array_merge(request()->query(), ['perPage' => 24])) }}" {{ request()->get('perPage') == 24 ? 'selected' : '' }}>24</option>
                <option value="{{ route('berita.show', array_merge(request()->query(), ['perPage' => 30])) }}" {{ request()->get('perPage') == 30 ? 'selected' : '' }}>30</option>
            </select>
        </div>
        <form action="{{ route('berita.show') }}" method="GET">
            <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" class="grow" name="search" value="{{ request()->get('search') }}" placeholder="Cari" />
            </label>
        </form>
    </div>
</div>

<div class="grid grid-cols-3 gap-2 gap-y-20 my-10">
    @if ($berita->isEmpty())
    <div class="flex justify-center">
        <p class="text-xs text-red-500">Tidak ada Berita yang tersedia.</p>
    </div>
    @else
    @foreach ($berita as $brt)
    <div class="card w-96 bg-base-100 rounded-sm shadow-lg">
        <figure class="h-full overflow-hidden">
            <img src="{{ asset('storage/'.$brt->gambar_headline) }}" class="object-cover h-full" alt="Nama Gambar">
        </figure>
        <div class="card-body">
            <h2 class="font-bold text-xl truncate w-full">{{ $brt->judul_berita }}</h2>
            <div class="h-24 overflow-y-hidden">
                <p class="truncate  text-gray-700">
                    {!! $brt->isi_berita !!}
                </p>
            </div>
            <a href="/guest/berita-template/{{ $brt->id_berita }}" class="text-blue-500 hover:underline">Read more</a>
        </div>
    </div>
    @endforeach
    @endif
</div>

<div class="join flex justify-center my-5">
    @if($berita->previousPageUrl())
    <a href="{{ $berita->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $berita->currentPage() }}</button>
    @if($berita->nextPageUrl())
    <a href="{{ $berita->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>

@endsection