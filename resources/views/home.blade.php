@extends('layouts.main')

@section('Main')

<!-- First Content -->
@if(is_null($konten))
@else
<div class=" divider smartphone:mt-10 tablet:mt-20 2xl:-mt-20 mb-10">
    <p class="font-bold smartphone:text-lg tablet:text-2xl">KATA SAMBUTAN</p>
</div>
<div class=" grid lg:grid-rows-3 grid-cols-2 lg:grid-cols-4 lg:grid-flow-col lg:gap-4 mt-8">
    <div class=" lg:row-span-3 col-span-2 mx-auto lg:mx-0">
        <div class="aspect-w-16 aspect-h-9">
            <iframe class="w-full h-full lg:h-96"
                src="{!! empty($konten->tautan_video_sambutan) ? 'https://www.youtube.com/' : $konten->tautan_video_sambutan !!}"
                loading="lazy"></iframe>
        </div>
    </div>
    <!-- Kata Sambutan -->
    <div class="col-span-2 overflow-x-auto">
        <div class="card w-full h-54">
            <div class="card-body">
                <h1 class="card-title text-lg">
                    {!! empty($konten->nama_sekolah) ? '<p class="text-slate-400 italic">Konten Belum Tersedia</p>' :
                    $konten->nama_sekolah !!}
                </h1>

                <div class="overflow-y-auto h-[13.5rem] tablet:py-5">
                    <p>
                        {!! empty($konten->sambutan) ? '
                    <p class="text-slate-400 italic">Konten Belum Tersedia</p>' : $konten->sambutan !!}
                    </p>
                </div>
            </div>
            <div class="card-actions justify-center items-center">
                <a class="btn bg-blue-400 w-48 h-10 rounded-sm border-none text-white mt-auto hover:text-blue-400"
                    href="{!! empty($konten->tautan_video_sambutan) ? 'https://www.youtube.com/' : $konten->tautan_video_sambutan !!}">
                    Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
    <!-- Kata Sambutan -->
</div>
<!-- First Content -->

<!-- Second Content -->
<div class="divider smartphone:mt-10 tablet:mt-20 laptop:-mt-[40rem] tablet:mb-10">
    <p class="font-bold smartphone:text-lg tablet:text-2xl">PROFIL SEKOLAH</p>
</div>
<div
    class="grid grid-rows-1 desktop:grid-flow-col desktop:grid-cols-5 laptop:gap-4 w-full mx-auto md:bg-slate-100 smartphone:-mt-7 tablet:my-10 justify-center items-center">
    <!-- School Profile -->
    <div class=" desktop:row-span-1 tablet:col-span-2 py-8 px-12 h-max">
        <div
            class="card smartphone:w-72 tablet:w-full rounded-sm desktop:my-48 tablet:mx-auto lg:mx-10 desktop:border-r-2 border-gray-400">
            <div class="card-body">
                <h2 class="card-title font-bold mb-3">Profil Sekolah</h2>
                <p class="overflow-y-auto smartphone:h-44 tablet:h-32">
                    {!! empty($konten->teks_profile) ? '
                <p class="text-slate-400 italic">Konten Belum Tersedia</p>' : $konten->teks_profile !!}
                </p>
                <div class="card-actions justify-center md:justify-start">
                    <a href="/guest/profile">
                        <button
                            class="btn bg-blue-400 mx-auto md:mx-0 smartphone:w-full md:w-48 h-10 rounded-sm border-none text-white tablet:mt-8 hover:text-blue-400">Lebih
                            Lanjut</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- School Profile -->

    <div
        class="tablet:col-span-3 grid smartphone:grid-cols-1 smartphone:justify-center smartphone:items-center tablet:grid-cols-2 grid-rows-1 py-20 px-10 gap-y-5 smartphone:-mt-32 tablet:-mt-16 desktop:-mt-0">

        <div class="col-span-1 smartphone:mx-auto tablet:mx-0">
            <!-- Facility School -->
            <a href="/guest/sarana-prasarana">
                <div
                    class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full shadow-md">
                            <div class="size-20 p-5  rounded-full">
                                <img src="{{ asset('assetIcon/Group 30.svg') }}" alt="Fasilitas"
                                    class="object-contain rounded-full w-5 h-5" loading="lazy" />
                            </div>
                        </div>
                    </figure>
                    <div class="card-body text-start">
                        <h2 class="card-title">Fasilitas</h2>
                        <p class="overflow-y-auto h-20">
                            {!! empty($konten->teks_fasilitas) ? '
                        <p class="text-slate-400 italic">Konten Belum Tersedia</p>' : $konten->teks_fasilitas !!}
                        </p>
                    </div>
                </div>
            </a>
            <!-- Facility School -->
        </div>

        <div class="col-span-1 smartphone:mx-auto tablet:mx-0">
            <!-- School Location -->
            <a href="/guest/media-sosial">
                <div
                    class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full">
                            <div class="size-20 p-5 shadow-md rounded-full">
                                <img src="{{ asset('assetIcon/Group 31.svg') }}" alt="Lokasi"
                                    class="rounded-full size-5" loading="lazy" />
                            </div>
                        </div>
                    </figure>
                    <div class="card-body text-start">
                        <h2 class="card-title">Lokasi</h2>
                        <p class="overflow-y-auto h-20">
                            {!! empty($konten->teks_lokasi) ? '
                        <p class="text-slate-400 italic">Konten Belum Tersedia</p>' : $konten->teks_lokasi !!}
                        </p>
                    </div>
                </div>
            </a>
            <!-- School Location -->
        </div>

        <div class=" col-span-1 smartphone:mx-auto tablet:mx-0">
            <!-- School History -->
            <a href="/guest/profile">
                <div
                    class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full shadow-md">
                            <div class="size-20 p-5  rounded-full">
                                <img src="{{ asset('assetIcon/Group 32.svg') }}" alt="Sejarah"
                                    class="object-cover rounded-full w-5 h-5" loading="lazy" />
                            </div>
                        </div>
                    </figure>
                    <div class="card-body text-start">
                        <h2 class="card-title">Sejarah</h2>
                        <p class="overflow-y-auto h-20">
                            {!! empty($konten->teks_sejarah) ? '
                        <p class="text-slate-400 italic">Konten Belum Tersedia</p>' : $konten->teks_sejarah !!}
                        </p>
                    </div>
                </div>
            </a>
            <!-- School History -->
        </div>

        <div class=" col-span-1 smartphone:mx-auto tablet:mx-0">
            <!-- School Achievement -->
            <a href="/guest/prestasi-siswa">
                <div
                    class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full shadow-md">
                            <div class="size-20 p-5  rounded-full">
                                <img src="{{ asset('assetIcon/Group 33.svg') }}" alt="Prestasi"
                                    class="object-cover rounded-full w-5 h-5" loading="lazy" />
                            </div>
                        </div>
                    </figure>
                    <div class="card-body text-start">
                        <h2 class="card-title">Prestasi</h2>
                        <p class="overflow-y-auto h-20">
                            {!! empty($konten->teks_prestasi) ? '
                        <p class="text-slate-400 italic">Konten Belum Tersedia</p>' : $konten->teks_prestasi !!}
                        </p>
                    </div>
                </div>
            </a>
            <!-- School Achievement -->
        </div>

    </div>
</div>
@endif
<!-- Second Content -->

<!-- Third Content -->
@if($berita->isNotEmpty())
<div class=" divider smartphone:-mt-10 smartphone:mb-10 tablet:mt-20 tablet:mb-10" loading="lazy">
    <p class="font-bold smartphone:text-lg tablet:text-2xl">BERITA SEKOLAH</p>
</div>
<div class=" grid md:grid-rows-3 smartphone:grid-cols-1 laptop:grid-cols-2 laptop:grid-flow-col gap-6" loading="lazy">
    @foreach ($berita as $brt)
    <div class="smartphone:col-span-1 tablet:mx-auto flex">
        <div
            class="card card-side bg-base-100 shadow-xl smartphone:w-full tablet:w-[35rem] laptop:w-[30rem] 2xl:w-[40rem] smartphone:h-40 tablet:h-32 lg:h-60 shrink">
            <figure class="h-full overflow-hidden">
                <img class="object-cover smartphone:w-64 laptop:w-72 h-full"
                    src="{{ asset('storage/'.$brt->gambar_headline) }}" alt="Nama Gambar" loading="lazy">
            </figure>
            <div class="card-body laptop:w-60">
                <h2
                    class="smartphone:text-sm tablet:text-xl font-bold smartphone:-mt-16 tablet:-mt-5 lg:-mt-0 truncate smartphone:w-32 smartphone:py-10 tablet:py-0 tablet:w-72 laptop:w-48 h-16">
                    {{ $brt->judul_berita }}
                </h2>
                <div
                    class="smartphone:h-[3.75rem] smartphone:w-20 tablet:w-60 smartphone:-mt-7 tablet:-mt-2 laptop:h-[8rem] overflow-y-hidden">
                    <p
                        class="smartphone:w-28 tablet:w-52 py-5 -my-3 laptop:py-0 laptop:-my-0 laptop:w-48 smartphone:truncate tablet:truncate laptop:not-truncate">
                        {!! $brt->isi_berita !!}
                    </p>
                </div>

                <div class="card-actions justify-end smartphone:h-5">
                    <a class="btn btn-ghost" href="/guest/berita-template/{{ $brt->id_berita }}">
                        <i class="fas fa-arrow-right smartphone:text-sm tablet:text-lg laptop:text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="flex justify-center mx-auto w-full desktop:mt-10">
    <a href="/guest/berita">
        <button
            class="btn bg-blue-400 mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-blue-400">Lainnya
        </button>
    </a>
</div>
@endif
<!-- Third Content -->

<!-- Fourth Content -->
@if($album->isNotEmpty())
<div class=" divider smartphone:mt-10 tablet:mt-20 tablet:mb-10" loading="lazy">
    <p class="font-bold smartphone:text-lg tablet:text-2xl">ALBUM SEKOLAH</p>
</div>

<div class="relative w-full overflow-hidden justify-center items-center my-10" loading="lazy">
    <div class="flex transition-transform duration-500" id="slider">
        @foreach ($album as $abm)
        <div class="w-full flex-shrink-0">
            <div class="mx-auto smartphone:w-screen tablet:w-[25rem] laptop:w-full">
                <div class="card smartphone:mx-7 tablet:mx-[3.7rem] laptop:mx-auto rounded-b-xl smartphone:w-64 laptop:w-60 h-72 bg-cover"
                    style="background-image: url('{{ asset('storage/' . $abm->gambar_album) }}');">
                    <div
                        class="bg-teal-50/70 rounded-none rounded-b-xl py-3 smartphone:translate-y-[10.4rem] lg:py-3 lg:translate-y-[10.4rem]">
                        <h2 class="card-title px-5 text-black/80">
                            <p class="truncate w-80">{{ $abm->nama_album }}</p>
                        </h2>
                        <p class="px-5 text-black/50 truncate w-64">{{ $abm->deskripsi_album }}</p>
                        <div class="card-actions justify-end">
                            <a href="/guest/galeri-template/{{ $abm->id_album }}"
                                class="btn bg-transparent hover:bg-transparent border-none">
                                <img src="{{ asset('assetIcon/Arrow-Foto.svg') }}"
                                    class="object-cover rounded-full w-8 h-8 mt-3 brightness-50" loading="lazy" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button
        class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute left-0 top-1/2 transform -translate-y-1/2 p-2 flex justify-center items-center"
        onclick="prevSlide()">
        <i class="fas fa-angle-left text-white"></i>
    </button>
    <button
        class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute right-0 top-1/2 transform -translate-y-1/2 p-2 flex justify-center items-center"
        onclick="nextSlide()">
        <i class="fas fa-angle-right text-white"></i>
    </button>
</div>

<div class="flex justify-center items-center mt-10 mb-28 mx-auto w-full">
    <a href="/guest/galeri-foto">
        <button
            class="btn bg-blue-400 mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-blue-400">Lainnya
        </button>
    </a>
</div>
@endif
<!-- Fourth Content -->
@endsection