@extends('layouts.main')

@section('Main')

<h1 class="font-bold text-sm tablet:text-xl text-center my-12 divider">SMK MUHAMMADIYAH PLUS KOTA BATAM</h1>

<div class="grid tablet:grid-cols-3 laptop:grid-cols-6 tablet:gap-4">

    <div class="tablet:col-span-3 tablet:grid tablet:grid-cols-3 laptop:grid-cols-none laptop:col-span-2 bg-gossamer">
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
                <p class="">SMK Muhammadiyah</p>

                <h2 class="card-title mx-auto mb-3">Nama Kepala Sekolah</h2>
                <p class="">Bpk. Lorem</p>
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
                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae quam illo blanditiis beatae
                    incidunt tempore.</p>
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
                <p class="">Loremipsumdolor@gmail.com</p>

                <h2 class="card-title mx-auto mb-3">No.telp Sekolah</h2>
                <p class="">08184587</p>
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
                    <p class="">92568787</p>

                    <h2 class="text-md mx-auto mb-3 font-bold">No. Sertifikat</h2>
                    <p class="">421 / 997 / 2005</p>
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
                    <p class="">20 1 02 06 10 008</p>

                    <h2 class="text-md mx-auto mb-3 font-bold">NIS</h2>
                    <p class="">200080</p>
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
                    <p class="">A</p>

                    <h2 class="text-md mx-auto font-bold">Tahun Didirikan</h2>
                    <p class="">2024</p>

                    <h2 class="text-md mx-auto font-bold">Tahun Operasional</h2>
                    <p class="">2025</p>
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
                    <p class="">Hak Milik</p>

                    <h2 class="text-md mx-auto font-bold">Luas Tanah</h2>
                    <p class="">5.007 M2</p>

                    <h2 class="text-md mx-auto font-bold">Status Kepemilikan Bangunan</h2>
                    <p class="">Pemerintah</p>
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
                    <h2 class="text-md mx-auto mb-3 font-bold">No. Pendirian Sekolah</h2>
                    <p class="">92568787</p>

                    <h2 class="text-md mx-auto mb-3 font-bold">No. Sertifikat</h2>
                    <p class="">421 / 997 / 2005</p>
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
                    <p class="">2.140 M2</p>

                    <h2 class="text-md mx-auto font-bold">Fasilitas Lainnya</h2>
                    <p class="">10</p>

                    <h2 class="text-md mx-auto font-bold">Sisa Lahan Seluruhnya</h2>
                    <p class="">-</p>
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
            <h2 class="text-center font-bold text-white text-xl bg-dark-kepple w-full mt-10">VISI</h2>
            <div class="card-body items-center text-center">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nulla earum. Accusantium excepturi eos
                    perferendis a quos tenetur, beatae in magni doloribus, quod totam consequuntur deserunt recusandae
                    sed rerum cupiditate?</p>
            </div>
        </div>
    </div>
    <!-- Visi -->

    <!-- Misi -->
    <div class="mx-auto">
        <div class="card w-72 laptop:w-96 bg-slate-100">
            <h2 class="text-center font-bold text-white text-xl bg-dark-kepple w-full mt-10">MISI</h2>
            <div class="card-body items-center text-center">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nulla earum. Accusantium excepturi eos
                    perferendis a quos tenetur, beatae in magni doloribus, quod totam consequuntur deserunt recusandae
                    sed rerum cupiditate?</p>
            </div>
        </div>
    </div>
    <!-- Misi -->
</div>

<h1 class="font-bold text-sm tablet:text-xl text-center my-12 divider">KOMPETENSI KEAHLIAN</h1>

<div class="grid tablet:grid-cols-2 laptop:grid-cols-4 gap-y-16 tablet:gap-y-28 laptop:gap-y-0 tablet:gap-2 my-24">
    <!-- Kompetensi 1 -->
    <div class="mx-auto">
        <div class="card card-compact w-72 h-80 shadow-xl bg-indigo-500">
            <div class="avatar mx-auto h-28 -translate-y-10">
                <div class="w-24 h-24 rounded-full">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-100">
                <h2 class="card-title text-center my-3 h-14">Teknik Komputer dan Jaringan</h2>
                <p class="text-center truncate">If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-center">
                    <!-- Modal -->
                    <button class="btn bottom-0" onclick="my_modal_4.showModal()">Lihat Selengkapnya</button>
                    <dialog id="my_modal_4" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click on ✕ button to close</p>
                        </div>
                    </dialog>
                    <!-- Modal -->
                </div>
            </div>
        </div>
    </div>
    <!-- Kompetensi 1 -->

    <!-- Kompetensi 2 -->
    <div class="mx-auto">
        <div class="card card-compact w-72 h-80 shadow-xl bg-red-500">
            <div class="avatar mx-auto h-28 -translate-y-10">
                <div class="w-24 h-24 rounded-full">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-100">
                <h2 class="card-title justify-center my-3 h-14">Rekayasa Perangkat Lunak</h2>
                <p class="text-center truncate">If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-center">
                    <!-- Modal -->
                    <button class="btn bottom-0" onclick="my_modal_4.showModal()">Lihat Selengkapnya</button>
                    <dialog id="my_modal_4" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click on ✕ button to close</p>
                        </div>
                    </dialog>
                    <!-- Modal -->
                </div>
            </div>
        </div>
    </div>
    <!-- Kompetensi 2 -->

    <!-- Kompetensi 3 -->
    <div class="mx-auto">
        <div class="card card-compact w-72 h-80 shadow-xl bg-green-500">
            <div class="avatar mx-auto h-28 -translate-y-10">
                <div class="w-24 h-24 rounded-full">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-100">
                <h2 class="card-title justify-center my-3 h-14">Animasi</h2>
                <p class="text-center truncate">If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-center">
                    <!-- Modal -->
                    <button class="btn bottom-0" onclick="my_modal_4.showModal()">Lihat Selengkapnya</button>
                    <dialog id="my_modal_4" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click on ✕ button to close</p>
                        </div>
                    </dialog>
                    <!-- Modal -->
                </div>
            </div>
        </div>
    </div>
    <!-- Kompetensi 3 -->

    <!-- Kompetensi 4 -->
    <div class="mx-auto">
        <div class="card card-compact w-72 h-80 shadow-xl bg-yellow-500">
            <div class="avatar mx-auto h-28 -translate-y-10">
                <div class="w-24 h-24 rounded-full">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-100">
                <h2 class="card-title justify-center my-3 h-14">Teknik Mesin</h2>
                <p class="text-center truncate">If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-center">
                    <!-- Modal -->
                    <button class="btn bottom-0" onclick="my_modal_4.showModal()">Lihat Selengkapnya</button>
                    <dialog id="my_modal_4" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click on ✕ button to close</p>
                        </div>
                    </dialog>
                    <!-- Modal -->
                </div>
            </div>
        </div>
    </div>
    <!-- Kompetensi 4 -->
</div>

@endsection