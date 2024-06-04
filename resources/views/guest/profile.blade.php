@extends('layouts.main')

@section('Main')

<h1 class="font-bold text-sm tablet:text-xl text-center my-12 divider">SEJARAH SEKOLAH</h1>

<div class="grid grid-rows-3 grid-cols-4 grid-flow-col gap-4">
    <div class="col-span-2">
        <h1 class="font-bold text-2xl">
            {!! empty($konten->nama_sekolah) ? '<p class="text-red-500 italic">$NULL</p>' : $konten->nama_sekolah !!}
        </h1>
    </div>
    <div class="col-span-2">
        <p class="-mt-10">
            {!! empty($konten->sejarah) ? '
        <p class="text-red-500 italic">$NULL</p>' : $konten->sejarah !!}
        </p>
    </div>
    <div class="col-span-2 mt-10">
        <a href="/guest/sejarah">
            <button class="btn bg-blue-400 w-48 h-10 rounded-sm border-none text-white mt-auto hover:text-blue-400">Lebih
                Lanjut
            </button>
        </a>
    </div>
    <div class=" lg:row-span-3 col-span-2 mx-auto lg:mx-0">
        <div class="aspect-w-16 aspect-h-9">
            <iframe class="w-full h-full lg:h-96" src="{!! empty($konten->tautan_video_sejarah) ? 'https://www.youtube.com/' : $konten->tautan_video_sejarah !!}"></iframe>
        </div>
    </div>
</div>

<h1 class="font-bold text-sm tablet:text-xl text-center my-12 divider">{!! empty($konten->nama_sekolah) ? '<p class="text-red-500 italic">$NULL</p>' : $konten->nama_sekolah !!}</h1>

<div class="grid tablet:grid-cols-3 laptop:grid-cols-6 tablet:gap-4">

    <div class="tablet:col-span-3 tablet:grid tablet:grid-cols-3 laptop:grid-cols-none laptop:col-span-2 bg-blue-500 rounded-sm">
        <!-- First Card -->
        <div class="card smartphone:w-60 tablet:w-60 lg:w-full h-96 mx-auto rounded-sm">
            <figure class="px-5 pt-5 mx-auto">
                <div class="avatar rounded-full bg-white">
                    <div class="size-20 p-5 shadow-md rounded-full">
                        <img src="{{ asset('assets/Group 194.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                    </div>
                </div>
            </figure>
            <div class="card-body text-center text-white">
                <h2 class="card-title mx-auto mb-3">Nama Sekolah</h2>
                <p class="">
                    {!! empty($konten->nama_sekolah) ? '
                <p class="text-red-500 italic">$NULL</p>' : $konten->nama_sekolah !!}

                </p>

                <h2 class="card-title mx-auto mb-3">Nama Kepala Sekolah</h2>
                <p class="">
                    {!! empty($konten->nama_kepala_sekolah) ? '
                <p class="text-red-500 italic">$NULL</p>' : $konten->nama_kepala_sekolah !!}
                </p>
            </div>
        </div>
        <!-- First Card -->

        <!-- Second Card -->
        <div class="card smartphone:w-60 lg:w-full h-96 mx-auto rounded-sm">
            <figure class="px-5 pt-5 mx-auto">
                <div class="avatar rounded-full bg-white">
                    <div class="size-20 p-5 shadow-md rounded-full">
                        <img src="{{ asset('assets/Group 31.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                    </div>
                </div>
            </figure>
            <div class="card-body text-center text-white">
                <h2 class="card-title mx-auto mb-3">Alamat Sekolah</h2>
                <p class="">
                    {!! empty($konten->alamat_sekolah) ? '
                <p class="text-red-500 italic">$NULL</p>' : $konten->alamat_sekolah !!}
                </p>
            </div>
        </div>
        <!-- Second Card -->

        <!-- Third Card -->
        <div class="card smartphone:w-60 lg:w-full h-96 mx-auto rounded-sm">
            <figure class="px-5 pt-5 mx-auto">
                <div class="avatar rounded-full bg-white">
                    <div class="size-20 p-5 shadow-md rounded-full">
                        <img src="{{ asset('assets/Group 195.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                    </div>
                </div>
            </figure>
            <div class="card-body text-center text-white">
                <h2 class="card-title mx-auto mb-3">Email Sekolah</h2>
                <p class="">
                    {!! empty($konten->email_sekolah) ? '
                <p class="text-red-500 italic">$NULL</p>' : $konten->email_sekolah !!}
                </p>

                <h2 class="card-title mx-auto mb-3">No.telp Sekolah</h2>
                <p class="">
                    {!! empty($konten->no_telepon_sekolah) ? '
                <p class="text-red-500 italic">$NULL</p>' : $konten->no_telepon_sekolah !!}
                </p>
            </div>
        </div>
        <!-- Third Card -->
    </div>

    <div class="tablet:col-span-3 laptop:col-span-4 grid tablet:grid-cols-2 laptop:grid-cols-2 p-5 gap-y-5">

        <!-- Fourth Card -->
        <div class="laptop:col-span-1">
            <div class="card smartphone:w-60 lg:w-80 h-96 bg-base-100 border-2 shadow-xl mx-auto rounded-xl">
                <figure class="px-5 pt-5 mx-auto">
                    <div class="avatar rounded-full bg-white">
                        <div class="size-20 p-5 shadow-md rounded-full">
                            <img src="{{ asset('assets/Group 194.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                        </div>
                    </div>
                </figure>
                <div class="card-body text-center">
                    <h2 class="text-md mx-auto mb-3 font-bold">No. Pendirian Sekolah</h2>
                    <p class="">
                        {!! empty($konten->no_pendirian_sekolah) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->no_pendirian_sekolah !!}
                    </p>

                    <h2 class="text-md mx-auto mb-3 font-bold">No. Sertifikat</h2>
                    <p class="">
                        {!! empty($konten->no_sertifikat) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->no_sertifikat !!}
                    </p>
                </div>
            </div>
        </div>
        <!-- Fourth Card -->

        <!-- Fifth Card -->
        <div class="laptop:col-span-1">
            <div class="card smartphone:w-60 lg:w-80 h-96 bg-base-100 border-2 shadow-xl mx-auto rounded-xl">
                <figure class="px-5 pt-5 mx-auto">
                    <div class="avatar rounded-full bg-white">
                        <div class="size-20 p-5 shadow-md rounded-full">
                            <img src="{{ asset('assets/Group 196.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                        </div>
                    </div>
                </figure>
                <div class="card-body text-center">
                    <h2 class="text-md mx-auto mb-3 font-bold">No. Statistik Sekolah</h2>
                    <p class="">
                        {!! empty($konten->no_statistik_sekolah) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->no_statistik_sekolah !!}
                    </p>

                    <h2 class="text-md mx-auto mb-3 font-bold">NIS</h2>
                    <p class="">
                        {!! empty($konten->nis) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->nis !!}
                    </p>
                </div>
            </div>
        </div>
        <!-- Fifth Card -->

        <!-- Sixth Card -->
        <div class="col-span-1">
            <div class="card smartphone:w-60 lg:w-80 h-96 bg-base-100 border-2 shadow-xl mx-auto rounded-xl">
                <figure class="px-5 pt-5 mx-auto">
                    <div class="avatar rounded-full bg-white">
                        <div class="size-20 p-5 shadow-md rounded-full">
                            <img src="{{ asset('assets/Group 198.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                        </div>
                    </div>
                </figure>
                <div class="card-body text-center">
                    <h2 class="text-md mx-auto font-bold">Jenjang Akreditasi</h2>
                    <p class="">
                        {!! empty($konten->status_akreditasi_sekolah) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->status_akreditasi_sekolah !!}
                    </p>

                    <h2 class="text-md mx-auto font-bold">Tahun Didirikan</h2>
                    <p class="">
                        {!! empty($konten->tahun_didirikan) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->tahun_didirikan !!}
                    </p>

                    <h2 class="text-md mx-auto font-bold">Tahun Operasional</h2>
                    <p class="">
                        {!! empty($konten->tahun_operasional) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->tahun_operasional !!}
                    </p>
                </div>
            </div>
        </div>
        <!-- Sixth Card -->

        <!-- Seventh Card -->
        <div class="col-span-1">
            <div class="card smartphone:w-60 lg:w-80 h-96 bg-base-100 border-2 shadow-xl mx-auto rounded-xl">
                <figure class="px-5 pt-5 mx-auto">
                    <div class="avatar rounded-full bg-white">
                        <div class="size-20 p-5 shadow-md rounded-full">
                            <img src="{{ asset('assets/Group 199.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                        </div>
                    </div>
                </figure>
                <div class="card-body text-center">
                    <h2 class="text-md mx-auto font-bold">Status Kepemilikan Tanah</h2>
                    <p class="">
                        {!! empty($konten->status_kepemilikan_tanah) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->status_kepemilikan_tanah !!}
                    </p>

                    <h2 class="text-md mx-auto font-bold">Luas Tanah</h2>
                    <p class="">
                        {!! empty($konten->luas_tanah) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->luas_tanah !!}
                    </p>

                    <h2 class="text-md mx-auto font-bold">Status Kepemilikan Bangunan</h2>
                    <p class="">
                        {!! empty($konten->status_kepemilikan_bangunan) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->status_kepemilikan_bangunan !!}
                    </p>
                </div>
            </div>
        </div>
        <!-- Seventh Card -->

        <!-- Eighth Card -->
        <div class="col-span-1">
            <div class="card smartphone:w-60 lg:w-80 h-96 bg-base-100 border-2 shadow-xl mx-auto rounded-xl">
                <figure class="px-5 pt-5 mx-auto">
                    <div class="avatar rounded-full bg-white">
                        <div class="size-20 p-5 shadow-md rounded-full">
                            <img src="{{ asset('assets/Group 194.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                        </div>
                    </div>
                </figure>
                <div class="card-body text-center">
                    <h2 class="text-md mx-auto mb-3 font-bold">Jumlah Staff</h2>
                    <p class="">
                        $count::Pegawai
                    </p>

                    <h2 class="text-md mx-auto mb-3 font-bold">Jumlah Siswa</h2>
                    <p class="">
                        $count::Siswa
                    </p>
                </div>
            </div>
        </div>
        <!-- Eighth Card -->

        <!-- Ninth Card -->
        <div class="col-span-1">
            <div class="card smartphone:w-60 lg:w-80 h-96 bg-base-100 border-2 shadow-xl mx-auto rounded-xl">
                <figure class="px-5 pt-5 mx-auto">
                    <div class="avatar rounded-full bg-white">
                        <div class="size-20 p-5 shadow-md rounded-full">
                            <img src="{{ asset('assets/Group 194.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                        </div>
                    </div>
                </figure>
                <div class="card-body text-center">
                    <h2 class="text-md mx-auto font-bold">Luas Tanah Keseluruhan</h2>
                    <p class="">
                        {!! empty($konten->luas_lahan_keseluruhan) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->luas_lahan_keseluruhan !!}
                    </p>

                    <h2 class="text-md mx-auto font-bold">Fasilitas Lainnya</h2>
                    <p class="">
                        {!! empty($konten->fasilitas_lainnya) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->fasilitas_lainnya !!}
                    </p>

                    <h2 class="text-md mx-auto font-bold">Sisa Lahan Seluruhnya</h2>
                    <p class="">
                        {!! empty($konten->sisa_lahan_seluruhnya) ? '
                    <p class="text-red-500 italic">$NULL</p>' : $konten->sisa_lahan_seluruhnya !!}
                    </p>
                </div>
            </div>
        </div>
        <!-- Ninth Card -->
    </div>

</div>

<h1 class="font-bold text-sm tablet:text-xl text-center my-12 divider">VISI & MISI SEKOLAH</h1>

<div class="grid tablet:grid-cols-2 gap-y-4 tablet:gap-y-0 tablet:gap-4">
    <!-- Visi -->
    <div class="mx-auto">
        <div class="card w-72 laptop:w-96 bg-slate-100">
            <h2 class="text-center font-bold text-white text-xl bg-blue-400 w-full mt-10">VISI</h2>
            <div class="card-body items-center text-center h-40">
                <p>
                    {!! empty($konten->visi) ? '
                <p class="text-red-500 italic">$NULL</p>' : $konten->visi !!}
                </p>
            </div>
        </div>
    </div>
    <!-- Visi -->

    <!-- Misi -->
    <div class="mx-auto">
        <div class="card w-72 laptop:w-96 bg-slate-100">
            <h2 class="text-center font-bold text-white text-xl bg-blue-400 w-full mt-10">MISI</h2>
            <div class="card-body items-center text-center h-40">
                <p class="overflow-y-auto">
                    {!! empty($konten->misi) ? '
                <p class="text-red-500 italic">$NULL</p>' : $konten->misi !!}
                </p>
            </div>
        </div>
    </div>
    <!-- Misi -->
</div>

<h1 class="font-bold text-sm tablet:text-xl text-center my-12 divider">STRUKTUR ORGANISASI SEKOLAH</h1>

<div class="col-span-2 my-5 w-full">
    @if(empty($konten->struktur_organisasi_sekolah))
    <p class="text-red-500 italic">$NULL</p>
    @else
    <img class="w-full" src="{{ asset('storage/'.$konten->struktur_organisasi_sekolah) }}" alt="struktur_organisasi_sekolah">
    @endif
</div>

<h1 class="font-bold text-sm tablet:text-xl text-center my-12 divider">KOMPETENSI KEAHLIAN</h1>

<div class="relative w-full overflow-hidden my-10">
    <div class="flex transition-transform duration-500" id="slider">
        @if($programKeahlian->isNotEmpty())
        @foreach ($programKeahlian->chunk(4) as $chunk)
        <div class="w-full grid grid-cols-4 gap-4 justify-center items-center" style="min-width: 100%;">
            @foreach ($chunk as $prg)
            <div class="mx-auto">
                <div class="card card-compact smartphone:w-72 laptop:w-72 h-80 shadow-xl bg-indigo-500">
                    <div class="avatar mx-auto h-28 -translate-y-10">
                        <div class="w-24 h-24 rounded-full">
                            <img src="{{ asset('storage/'.$prg->logo_program) }}" />
                        </div>
                    </div>
                    <div class="card-body rounded-b-xl h-28 bg-base-100">
                        <h2 class="card-title justify-center text-center my-3 h-14">{{ $prg->nama_program }}</h2>
                        <p class="text-center truncate">{{ $prg->deskripsi_program }}</p>
                        <div class="card-actions justify-center">
                            <a href="/guest/program-keahlian-template/{{ $prg->id_program }}">
                                <button class="btn bottom-0">Lihat Selengkapnya</button>
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
    <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute left-5 top-1/2 transform p-2 flex justify-center items-center" onclick="prevSlide()">
        <i class="fas fa-angle-left text-white"></i>
    </button>
    <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute right-5 top-1/2 transform p-2 flex justify-center items-center" onclick="nextSlide()">
        <i class="fas fa-angle-right text-white"></i>
    </button>
</div>

<script>
    let currentIndex = 0;
    let autoSlideInterval;

    function showSlide(index) {
        const slider = document.getElementById('slider');
        const slides = slider.children;
        const totalSlides = slides.length;

        if (index >= totalSlides) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = totalSlides - 1;
        } else {
            currentIndex = index;
        }

        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            nextSlide();
        }, 3000);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    document.addEventListener('DOMContentLoaded', () => {
        showSlide(currentIndex);
        startAutoSlide();

        document.getElementById('slider').addEventListener('mouseenter', stopAutoSlide);
        document.getElementById('slider').addEventListener('mouseleave', startAutoSlide);
    });
</script>
@endsection