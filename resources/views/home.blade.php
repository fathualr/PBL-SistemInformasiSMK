@extends('layouts.main')

@section('Main')

<!-- First Content -->
<label class="input input-bordered border-2 rounded-full mx-auto mt-20 w-[30rem] flex justify-center items-center focus-within:outline-none">
    <input type="text" class="grow" placeholder="Cari" />
    <i class="fas fa-magnifying-glass"></i>
</label>

<div class="divider mt-20 mb-10">
    <p class="font-bold text-2xl">KATA SAMBUTAN</p>
</div>
<div class="grid lg:grid-rows-3 grid-cols-2 lg:grid-cols-4 lg:grid-flow-col lg:gap-4 mt-8">
    <div class=" lg:row-span-3 col-span-2 mx-auto lg:mx-0">
        <div class="aspect-w-16 aspect-h-9">
            <iframe class="w-full h-full lg:h-96" src="{!! empty($konten->tautan_video_sambutan) ? 'https://www.youtube.com/' : $konten->tautan_video_sambutan !!}"></iframe>
        </div>
    </div>
    <!-- Title -->
    <div class="col-span-2 overflow-x-auto">
        <div class="card w-full ">
            <div class="card-body">
                <h1 class="card-title text-lg">
                    {!! empty($konten->nama_sekolah) ? '<p class="text-red-500 italic">$NULL</p>' :
                    $konten->nama_sekolah !!}
                </h1>
            </div>
        </div>
    </div>
    <!-- Title -->
    <!-- Description & Other -->
    <div class="lg:row-span-2 col-span-2 -mt-10 lg:-mt-0">
        <div class="card w-full">
            <div class="card-body">
                <p>
                    {!! empty($konten->sambutan) ? '
                <p class="text-red-500 italic">$NULL</p>' : $konten->sambutan !!}.
                </p>
                <div class="card-actions justify-start mt-7">
                    <button class="btn bg-blue-400 w-48 h-10 rounded-sm border-none text-white mt-auto hover:text-blue-400">Lebih
                        Lanjut</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Description & Other -->
</div>
<!-- First Content -->

<!-- Second Content -->
<div class="divider mt-20 mb-10">
    <p class="font-bold text-2xl">PROFILE SEKOLAH</p>
</div>
<div class="grid grid-rows-1 desktop:grid-flow-col smartphone:grid-cols-2 desktop:grid-cols-5 lg:gap-4 w-full mx-auto md:bg-slate-100 my-10">
    <!-- School Profile -->
    <div class="desktop:row-span-1 col-span-2 py-8 px-12 h-max ">

        <div class="card w-full rounded-sm my-24 desktop:my-48 mx-auto lg:mx-10 desktop:border-r-2 border-gray-400">
            <div class="card-body">
                <h2 class="card-title font-bold mb-3">Profil Sekolah</h2>
                <p class="overflow-y-auto h-32">
                    {!! empty($konten->teks_profile) ? '
                <p class="text-red-500 italic">$NULL</p>' : $konten->teks_profile !!}
                </p>
                <div class="card-actions justify-center md:justify-start">
                    <a href="/guest/profile">
                        <button class="btn bg-blue-400 mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-blue-400">Lebih
                            Lanjut</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!-- School Profile -->

    <div class="tablet:col-span-3 grid smartphone:grid-cols-1 tablet:grid-cols-2 grid-rows-1 py-20 px-10 gap-y-5 desktop:gap-y-0 -mt-16 desktop:-mt-0">

        <div class="col-span-1">
            <!-- Facility School -->
            <a href="/guest/sarana-prasarana">
                <div class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full shadow-md">
                            <div class="size-20 p-5  rounded-full">
                                <img src="{{ asset('assetIcon/Group 30.svg') }}" alt="Fasilitas" class="object-contain rounded-full w-5 h-5" />
                            </div>
                        </div>
                    </figure>
                    <div class="card-body text-start">
                        <h2 class="card-title">Fasilitas</h2>
                        <p class="overflow-y-auto h-20">
                            {!! empty($konten->teks_fasilitas) ? '
                        <p class="text-red-500 italic">$NULL</p>' : $konten->teks_fasilitas !!}
                        </p>
                    </div>
                </div>
            </a>
            <!-- Facility School -->
        </div>

        <div class="col-span-1">
            <!-- School Location -->
            <a href="/guest/media-sosial">
                <div class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full">
                            <div class="size-20 p-5 shadow-md rounded-full">
                                <img src="{{ asset('assetIcon/Group 31.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                            </div>
                        </div>
                    </figure>
                    <div class="card-body text-start">
                        <h2 class="card-title">Lokasi</h2>
                        <p class="overflow-y-auto h-20">
                            {!! empty($konten->teks_lokasi) ? '
                        <p class="text-red-500 italic">$NULL</p>' : $konten->teks_lokasi !!}
                        </p>
                    </div>
                </div>
            </a>
            <!-- School Location -->
        </div>

        <div class="col-span-1">
            <!-- School History -->
            <a href="/guest/profile">
                <div class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full shadow-md">
                            <div class="size-20 p-5  rounded-full">
                                <img src="{{ asset('assetIcon/Group 32.svg') }}" alt="Sejarah" class="object-cover rounded-full w-5 h-5" />
                            </div>
                        </div>
                    </figure>
                    <div class="card-body text-start">
                        <h2 class="card-title">Sejarah</h2>
                        <p class="overflow-y-auto h-20">
                            {!! empty($konten->teks_sejarah) ? '
                        <p class="text-red-500 italic">$NULL</p>' : $konten->teks_sejarah !!}
                        </p>
                    </div>
                </div>
            </a>
            <!-- School History -->
        </div>

        <div class="col-span-1">
            <!-- School Achievement -->
            <a href="/guest/prestasi-siswa">
                <div class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full shadow-md">
                            <div class="size-20 p-5  rounded-full">
                                <img src="{{ asset('assetIcon/Group 33.svg') }}" alt="Prestasi" class="object-cover rounded-full w-5 h-5" />
                            </div>
                        </div>
                    </figure>
                    <div class="card-body text-start">
                        <h2 class="card-title">Prestasi</h2>
                        <p class="overflow-y-auto h-20">
                            {!! empty($konten->teks_prestasi) ? '
                        <p class="text-red-500 italic">$NULL</p>' : $konten->teks_prestasi !!}
                        </p>
                    </div>
                </div>
            </a>
            <!-- School Achievement -->
        </div>

    </div>
</div>
<!-- Second Content -->

<!-- Third Content -->
<div class="divider mt-20 mb-10">
    <p class="font-bold text-2xl">BERITA SEKOLAH</p>
</div>
<div class="grid md:grid-rows-3 smartphone:grid-cols-1 md:grid-cols-2 md:grid-flow-col gap-6">
    {{-- <div class="smartphone:col-span-1 md:col-span-2">
        <h1 class="font-bold text-xl text-center">Berita Dan Agenda</h1>
    </div> --}}
    @foreach ($berita as $brt)
    <div class="smartphone:col-span-1 md:mx-auto">
        <div class="card card-side bg-base-100 shadow-xl w-[35rem] h-32 lg:h-60">
            <figure class="h-full overflow-hidden">
                <img class="object-cover w-72 h-full" src="{{ asset('storage/'.$brt->gambar_headline) }}" alt="Nama Gambar">
            </figure>
            <div class="card-body w-60 lg:w-full">
                <h2 class="text-xl font-bold -mt-5 lg:-mt-0 truncate w-72 h-16">
                    {{ $brt->judul_berita }}
                </h2>
                <div class="h-[8rem] overflow-y-hidden">
                    <p class="w-28 py-5 -my-3 lg:py-0 lg:-my-0 lg:w-72">
                        {!! $brt->isi_berita !!}
                    </p>
                </div>
                <div class="card-actions justify-end">
                    <a class="btn btn-ghost" href="/guest/berita-template/{{ $brt->id_berita }}">
                        <i class="fas fa-arrow-right text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
<div class="flex justify-center mx-auto w-full">
    <a href="/guest/berita">
        <button class="btn bg-blue-400 mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-blue-400">Lainnya
        </button>
    </a>
</div>
<!-- Third Content -->

<!-- Fourth Content -->
<div class="divider mt-20">
    <p class="font-bold text-2xl">ALBUM SEKOLAH</p>
</div>
<div class="grid gap-5 lg:grid-rows-2 grid-cols-2 lg:grid-cols-3 lg:grid-flow-row">


    <div class="relative w-[75rem] overflow-hidden">
        <div class="flex transition-transform duration-500" id="slider">
            @if($album->isNotEmpty())
            @foreach ($album->chunk(4) as $chunk)
            <div class="w-full grid grid-cols-4 justify-center items-center p-10" style="min-width: 100%;">
                @foreach ($chunk as $abm)
                <div class="">
                    <div class="card md:mx-auto rounded-b-xl w-64 h-72 bg-cover" style="background-image: url('{{ asset('storage/' . $abm->gambar_album) }}');">
                        <div class=" bg-teal-50/70 rounded-none rounded-b-xl py-3 translate-y-[12.4rem] lg:py-3 lg:translate-y-[10.4rem]">
                            <h2 class="card-title px-5 text-black/80">
                                <p class="truncate w-80">{{ $abm->nama_album }}</p>
                            </h2>
                            <p class="px-5 text-black/50 truncate w-64">{{ $abm->deskripsi_album }}</p>
                            <div class="card-actions justify-end">
                                <a href="/guest/galeri-template/{{ $abm->id_album }}" class="btn bg-transparent hover:bg-transparent border-none">
                                    <img src="{{ asset('assetIcon/Arrow-Foto.svg') }}" class="object-cover rounded-full w-8 h-8 mt-3" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
        </div>
        <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute left-0 top-1/2 transform p-2 flex justify-center items-center" onclick="prevSlide()">
            <i class="fas fa-angle-left text-white"></i>
        </button>
        <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute right-0 top-1/2 transform p-2 flex justify-center items-center" onclick="nextSlide()">
            <i class="fas fa-angle-right text-white"></i>
        </button>
    </div>
</div>
<div class="flex justify-center items-center -mt-[27rem] mb-28 mx-auto w-full">
    <a href="/guest/galeri-foto">
        <button class="btn bg-blue-400 mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-blue-400">Lainnya
        </button>
    </a>
</div>
<!-- Fourth Content -->


@endsection