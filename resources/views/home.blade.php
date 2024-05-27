@extends('layouts.main')

@section('Main')

<!-- First Content -->
<label class="input input-bordered mx-auto my-10 flex items-center smartphone:w-52 md:w-72">
    <input type="text" class="grow" placeholder="Cari" />
    <i class="fas fa-magnifying-glass"></i>
</label>
<div class="grid lg:grid-rows-3 grid-cols-2 lg:grid-cols-4 lg:grid-flow-col lg:gap-4 mt-8">
    <div class=" lg:row-span-3 col-span-2 mx-auto lg:mx-0">
        <div class="aspect-w-16 aspect-h-9">
            <iframe class="w-full h-full lg:h-96"
                src="{!! empty($konten->tautan_video_sambutan) ? 'https://www.youtube.com/' : $konten->tautan_video_sambutan !!}"></iframe>
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
                    <button
                        class="btn bg-blue-400 w-48 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">Lebih
                        Lanjut</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Description & Other -->
</div>
<!-- First Content -->

<!-- Second Content -->
<div
    class="grid grid-rows-1 desktop:grid-flow-col smartphone:grid-cols-2 desktop:grid-cols-5 lg:gap-4 w-full mx-auto md:bg-slate-100 my-10">
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
                        <button
                            class="btn bg-blue-400 mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-blue-400">Lebih
                            Lanjut</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!-- School Profile -->

    <div
        class="tablet:col-span-3 grid smartphone:grid-cols-1 tablet:grid-cols-2 grid-rows-1 py-20 px-10 gap-y-5 desktop:gap-y-0 -mt-16 desktop:-mt-0">

        <div class="col-span-1">
            <!-- Facility School -->
            <a href="/guest/sarana-prasarana">
                <div
                    class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full shadow-md">
                            <div class="size-20 p-5  rounded-full">
                                <img src="{{ asset('assets/Group 30.svg') }}" alt="Fasilitas"
                                    class="object-contain rounded-full w-5 h-5" />
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
                <div
                    class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full">
                            <div class="size-20 p-5 shadow-md rounded-full">
                                <img src="{{ asset('assets/Group 31.svg') }}" alt="Lokasi"
                                    class="rounded-full size-5" />
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
                <div
                    class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full shadow-md">
                            <div class="size-20 p-5  rounded-full">
                                <img src="{{ asset('assets/Group 32.svg') }}" alt="Sejarah"
                                    class="object-cover rounded-full w-5 h-5" />
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
                <div
                    class="card smartphone:w-60 tablet:w-72 h-72 bg-base-100 shadow-xl tablet:mx-auto rounded-sm hover:scale-110 duration-150">
                    <figure class="px-5 pt-5 -translate-x-16">
                        <div class="avatar rounded-full shadow-md">
                            <div class="size-20 p-5  rounded-full">
                                <img src="{{ asset('assets/Group 33.svg') }}" alt="Prestasi"
                                    class="object-cover rounded-full w-5 h-5" />
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
<div class="grid md:grid-rows-4 smartphone:grid-cols-1 md:grid-cols-2 md:grid-flow-col gap-6">
    <div class="smartphone:col-span-1 md:col-span-2">
        <h1 class="font-bold text-xl text-center">Berita Dan Agenda</h1>
    </div>
    <div class="smartphone:col-span-1 md:mx-auto">
        <div class="card card-side bg-base-100 shadow-xl h-32 lg:h-60">
            <figure>
                <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                    class="w-24 lg:w-auto" />
            </figure>
            <div class="card-body w-60 lg:w-full">
                <h2 class="lg:card-title text-sm font-bold -mt-5 lg:-mt-0">Kegiatan Belajar mengajar di
                    Rumah</h2>
                <p class="w-28 py-5 -my-3 lg:py-0 lg:-my-0 lg:w-72 truncate text-xs">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quasi,
                    omnis ut, Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur quo atque blanditiis
                    iusto accusantium. Nobis rem illo exercitationem quam. Debitis voluptate amet incidunt esse officia
                    laboriosam voluptas, expedita veritatis cupiditate?
                </p>
                <div class="card-actions justify-end">
                    <button class="btn btn-ghost">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto">05</div>
    <div class="mx-auto">05</div>
    <div class="mx-auto">05</div>
    <div class="mx-auto">05</div>
    <div class="mx-auto">05</div>
</div>
<!-- Third Content -->

<!-- Fourth Content -->
<div class="grid lg:grid-rows-4 grid-cols-2 lg:grid-cols-3 lg:grid-flow-row mt-10 lg:mt-0">
    <div class="col-span-2 lg:col-span-3 mx-auto">
        <h1 class="font-bold text-xl text-center my-5">Galeri</h1>
    </div>
    <div class="mx-auto  lg:w-full h-min">
        <div class="avatar">
            <div class="lg:w-64 rounded-sm">
                <img src="{{ asset('assets/Group 30.svg') }}" class="object-contain w-5 h-5" />
            </div>
        </div>
    </div>
    <div class="mx-auto lg:w-full h-min">
        <div class="avatar">
            <div class="lg:w-64 rounded-sm">
                <img src="{{ asset('assets/Group 30.svg') }}" class="object-contain w-5 h-5" />
            </div>
        </div>
    </div>
    <div class="mx-auto">01</div>
    <div class="mx-auto">01</div>
    <div class="mx-auto">01</div>
    <div class="mx-auto">01</div>
    <div class="col-span-2 lg:col-span-3 mx-auto">
        <a href="/guest/galeri-foto">
            <button
                class="btn bg-blue-400 mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-blue-400">Lebih
                Lanjut
            </button>
        </a>
    </div>
</div>
<!-- Fourth Content -->


@endsection