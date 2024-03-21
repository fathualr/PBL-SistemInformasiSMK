@extends('layouts.main')

@section('Main')

<div class="grid tablet:grid-cols-2 laptop:grid-cols-3 gap-y-16 laptop:gap-y-16 tablet:gap-y-28 tablet:gap-2 my-24">
    <!-- Kompetensi 1 -->
    <div class="mx-auto">
        <div class="card card-compact smartphone:w-72 laptop:w-96 h-80 shadow-xl bg-indigo-500">
            <div class="avatar mx-auto h-28 -translate-y-10">
                <div class="w-24 h-24 rounded-full">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-100">
                <h2 class="card-title justify-center text-center my-3 h-14">Teknik Komputer dan Jaringan</h2>
                <p class="text-center truncate">If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-center">
                    <a href="/detail-program">
                        <button class="btn bottom-0">Lihat Selengkapnya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Kompetensi 1 -->

    <!-- Kompetensi 2 -->
    <div class="mx-auto">
        <div class="card card-compact smartphone:w-72 laptop:w-96 h-80 shadow-xl bg-red-500">
            <div class="avatar mx-auto h-28 -translate-y-10">
                <div class="w-24 h-24 rounded-full">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-100">
                <h2 class="card-title justify-center my-3 h-14">Rekayasa Perangkat Lunak</h2>
                <p class="text-center truncate">If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-center">
                    <button class="btn bottom-0">Lihat Selengkapnya</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Kompetensi 2 -->

    <!-- Kompetensi 3 -->
    <div class="mx-auto">
        <div class="card card-compact smartphone:w-72 laptop:w-96 h-80 shadow-xl bg-green-500">
            <div class="avatar mx-auto h-28 -translate-y-10">
                <div class="w-24 h-24 rounded-full">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-100">
                <h2 class="card-title justify-center my-3 h-14">Animasi</h2>
                <p class="text-center truncate">If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-center">
                    <button class="btn bottom-0">Lihat Selengkapnya</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Kompetensi 3 -->

    <!-- Kompetensi 4 -->
    <div class="mx-auto">
        <div class="card card-compact smartphone:w-72 laptop:w-96 h-80 shadow-xl bg-yellow-500">
            <div class="avatar mx-auto h-28 -translate-y-10">
                <div class="w-24 h-24 rounded-full">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <div class="card-body rounded-b-xl h-28 bg-base-100">
                <h2 class="card-title justify-center my-3 h-14">Teknik Mesin</h2>
                <p class="text-center truncate">If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-center">
                    <button class="btn bottom-0">Lihat Selengkapnya</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Kompetensi 4 -->
</div>

@endsection