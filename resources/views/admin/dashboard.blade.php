@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-4 w-full max-w-5xl rounded-lg shadow-xl bg-slate-200">
    <!-- First Card -->
    <div class="card w-full">
        <div class="card-body">
            <div class="flex items-center space-x-4">
                <div class="rounded-full bg-blue-700 w-20 h-20 flex justify-center items-center">
                    <i class="far fa-user text-2xl text-white"></i>
                </div>
                <div>
                    <p>Siswa Aktif</p>
                    <h2 class="text-2xl font-bold text-blue-700">
                        200
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- First Card -->

    <!-- Second Card -->
    <div class="card w-full">
        <div class="card-body">
            <div class="flex items-center space-x-4">
                <div class="rounded-full bg-blue-700 w-20 h-20 flex justify-center items-center">
                    <i class="fas fa-chalkboard-user text-2xl text-white"></i>
                </div>
                <div>
                    <p>Staff</p>
                    <h2 class="text-2xl font-bold text-blue-700">
                        200
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Second Card -->

    <!-- Third Card -->
    <div class="card w-full">
        <div class="card-body">
            <div class="flex items-center space-x-4">
                <div class="rounded-full bg-blue-700 w-20 h-20 flex justify-center items-center">
                    <i class="fas fa-file-contract text-2xl text-white"></i>
                </div>
                <div>
                    <p>PPDB</p>
                    <h2 class="text-2xl font-bold text-blue-700">
                        200
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Third Card -->

    <!-- Fourth Card -->
    <div class="card w-full">
        <div class="card-body">
            <div class="flex items-center space-x-4">
                <div class="rounded-full bg-blue-700 w-20 h-20 flex justify-center items-center">
                    <i class="fas fa-user-check text-2xl text-white"></i>
                </div>
                <div>
                    <p>Lolos PPDB</p>
                    <h2 class="text-2xl font-bold text-blue-700">
                        200
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Fourth Card -->

</div>

<div class="max-w-xl">
    @include('layouts.chart')
</div>

@endsection