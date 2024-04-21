@extends('layouts.mainAdmin')

@section('main-content')
<!-- First Content -->
<div class="grid grid-cols-3 grid-flow-row gap-y-12">

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-users text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Pengunjung</h2>
            <h2 class="card-title mx-auto font-bold text-base">1000</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-user-check text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Siswa Aktif</h2>
            <h2 class="card-title mx-auto font-bold text-base">300</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-user-graduate text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Alumni</h2>
            <h2 class="card-title mx-auto font-bold text-base">100</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-address-book text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Siswa Mendaftar</h2>
            <h2 class="card-title mx-auto font-bold text-base">100</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-users-viewfinder text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Lolos PPDB</h2>
            <h2 class="card-title mx-auto font-bold text-base">100</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-users-slash text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Tidak Lolos PPDB</h2>
            <h2 class="card-title mx-auto font-bold text-base">100</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-chalkboard-user text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Guru</h2>
            <h2 class="card-title mx-auto font-bold text-base">100</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-clipboard-user text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Staff</h2>
            <h2 class="card-title mx-auto font-bold text-base">100</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-user-gear text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Admin</h2>
            <h2 class="card-title mx-auto font-bold text-base">10</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-pen-ruler text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Program Keahlian</h2>
            <h2 class="card-title mx-auto font-bold text-base">2</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-baseball-bat-ball text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Ekstrakulikuler</h2>
            <h2 class="card-title mx-auto font-bold text-base">7</h2>
        </div>
    </div>

    <div class="card w-80 h-32 bg-slate-200 shadow-xl mx-auto">
        <div class="card-body">
            <button
                class="btn btn-outline btn-success w-20 h-20 border-2 hover:rounded-full mx-auto transition-all duration-500 absolute -top-8 right-28">
                <i class="fas fa-message text-xl"></i>
            </button>
            <h2 class="card-title mx-auto font-bold mt-5">Feedback</h2>
            <h2 class="card-title mx-auto font-bold text-base">200</h2>
        </div>
    </div>

</div>

<!-- First Content -->
@endsection