@extends('layouts.main')

@section('Main')

<!-- First Content -->
<div class="grid lg:grid-rows-3 grid-cols-2 lg:grid-cols-4 lg:grid-flow-col lg:gap-4 mt-8">
    <div class=" lg:row-span-3 col-span-2 mx-auto lg:mx-0 ">
        <iframe class="w-full aspect-video" src="https://www.youtube.com/..."></iframe>
    </div>
    <!-- Title -->
    <div class="col-span-2 overflow-x-auto">
        <div class="card w-full text-primary-content">
            <div class="card-body">
                <h1 class="card-title text-lg">
                    Lorem
                </h1>
            </div>
        </div>
    </div>
    <!-- Title -->
    <!-- Description & Other -->
    <div class="lg:row-span-2 col-span-2 -mt-10 lg:-mt-0">
        <div class="card w-full text-primary-content">
            <div class="card-body">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro, error fugiat? Repellendus
                    consequuntur provident iure at. Aut nobis quasi amet. Iure dolorum placeat corporis eaque tenetur
                    distinctio id voluptatum maxime.
                </p>
                <div class="card-actions justify-start sticky mt-7 lg:bottom-0">
                    <button class="btn bg-elm w-48 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">Lebih
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
    class="grid grid-rows-1 lg:grid-flow-col smartphone:grid-cols-2 lg:grid-cols-5 lg:gap-4 w-full mx-auto md:bg-slate-100">
    <!-- School Profile -->
    <div class="lg:row-span-1 col-span-2 py-8 px-12 h-max ">
        <div class="card w-full rounded-sm my-24 lg:my-48 mx-auto lg:mx-10 lg:border-r-2 border-gray-400">
            <div class="card-body">
                <h2 class="card-title font-bold mb-3">Profil Sekolah</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati omnis assumenda earum nihil, fuga
                    ratione facere ducimus eaque, commodi quae odio sequi eveniet enim corrupti adipisci repellendus
                    ipsam. Nulla, sapiente!</p>
                <div class="card-actions justify-center md:justify-start">
                    <button
                        class="btn bg-elm mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-elm">Lebih
                        Lanjut</button>
                </div>
            </div>
        </div>
    </div>
    <!-- School Profile -->

    <div
        class="md:col-span-3 grid smartphone:grid-cols-1 md:grid-cols-2 grid-rows-1 py-20 px-10 gap-y-5 lg:gap-y-0 -mt-16 lg:-mt-0">

        <div class="col-span-1">
            <!-- Facility School -->
            <div class="card smartphone:w-60 lg:w-72 h-72 bg-base-100 shadow-xl md:mx-auto rounded-sm">
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat fugit
                        molestiae voluptatem eum
                        molestias dignissimos labore enim, possimus optio maxime exercitationem ullam? Quisquam optio
                        inventore qui sequi enim eaque neque?</p>
                </div>
            </div>
            <!-- Facility School -->
        </div>

        <div class="col-span-1">
            <!-- School Location -->
            <div class="card smartphone:w-60 lg:w-72 h-72 bg-base-100 shadow-xl md:mx-auto rounded-sm">
                <figure class="px-5 pt-5 -translate-x-16">
                    <div class="avatar rounded-full">
                        <div class="size-20 p-5 shadow-md rounded-full">
                            <img src="{{ asset('assets/Group 31.svg') }}" alt="Lokasi" class="rounded-full size-5" />
                        </div>
                    </div>
                </figure>
                <div class="card-body text-start">
                    <h2 class="card-title">Lokasi</h2>
                    <p class="overflow-y-auto h-20">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat fugit
                        molestiae voluptatem eum
                        molestias dignissimos labore enim, possimus optio maxime exercitationem ullam? Quisquam optio
                        inventore qui sequi enim eaque neque?</p>
                </div>
            </div>
            <!-- School Location -->
        </div>

        <div class="col-span-1">
            <!-- School History -->
            <div class="card smartphone:w-60 lg:w-72 h-72 bg-base-100 shadow-xl md:mx-auto rounded-sm">
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat fugit
                        molestiae voluptatem eum
                        molestias dignissimos labore enim, possimus optio maxime exercitationem ullam? Quisquam optio
                        inventore qui sequi enim eaque neque?</p>
                </div>
            </div>
            <!-- School History -->
        </div>

        <div class="col-span-1">
            <!-- School Achievement -->
            <div class="card smartphone:w-60 lg:w-72 h-72 bg-base-100 shadow-xl md:mx-auto rounded-sm">
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat fugit
                        molestiae voluptatem eum
                        molestias dignissimos labore enim, possimus optio maxime exercitationem ullam? Quisquam optio
                        inventore qui sequi enim eaque neque?</p>
                </div>
            </div>
            <!-- School Achievement -->
        </div>

    </div>
</div>
<!-- Second Content -->

<!-- Third Content -->
<div class="grid lg:grid-rows-4 smartphone:grid-cols-1 lg:grid-cols-2 lg:grid-flow-col">
    <div class="smartphone:col-span-1 lg:col-span-2">
        <h1 class="font-bold text-xl text-center">Berita Dan Agenda</h1>
        <label class="input input-bordered mx-auto my-10 flex items-center smartphone:w-52 md:w-72">
            <input type="text" class="grow" placeholder="Search" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                <path fill-rule="evenodd"
                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                    clip-rule="evenodd" />
            </svg>
        </label>
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
                        <img src="{{ asset('assets/right-arrow.svg') }}" alt="Prestasi"
                            class="object-cover rounded-full w-5 h-5" />
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
<div class="grid lg:grid-rows-3 grid-cols-2 lg:grid-cols-3 lg:grid-flow-col mt-10 lg:mt-0">
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
</div>
<!-- Fourth Content -->


@endsection