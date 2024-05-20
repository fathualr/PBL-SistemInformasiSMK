@extends('layouts.mainAdmin')

@section('main-content')

<div class="card w-full h-max bg-slate-200 shadow-xl">
    <div class="card-body">
        <div class="grid grid-cols-4">
            <!-- First Card -->
            <div class="card w-96">
                <div class="card-body">
                    <div class="grid grid-rows-2 grid-flow-col gap-4">
                        <div class="row-span-3 flex justify-center items-center">
                            <div class="rounded-full bg-elm w-20 h-20 flex justify-center items-center">
                                <i class="far fa-user text-2xl text-white"></i>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <p>Siswa Aktif</p>
                        </div>
                        <div class="col-span-2">
                            <h2 class="text-2xl font-bold text-elm">
                                200
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- First Card -->

            <!-- Sceond Card -->
            <div class="card w-96">
                <div class="card-body">
                    <div class="grid grid-rows-2 grid-flow-col gap-4">
                        <div class="row-span-3 flex justify-center items-center">
                            <div class="rounded-full bg-elm w-20 h-20 flex justify-center items-center">
                                <i class="fas fa-chalkboard-user text-2xl text-white"></i>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <p>Staff Pengajar</p>
                        </div>
                        <div class="col-span-2">
                            <h2 class="text-2xl font-bold text-elm">
                                200
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sceond Card -->

            <!-- Third Card -->
            <div class="card w-96">
                <div class="card-body">
                    <div class="grid grid-rows-2 grid-flow-col gap-4">
                        <div class="row-span-3 flex justify-center items-center">
                            <div class="rounded-full bg-elm w-20 h-20 flex justify-center items-center">
                                <i class="fas fa-file-contract text-2xl text-white"></i>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <p>Pendaftar PPDB</p>
                        </div>
                        <div class="col-span-2">
                            <h2 class="text-2xl font-bold text-elm">
                                200
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Third Card -->

            <!-- Fourth Card -->
            <div class="card w-96">
                <div class="card-body">
                    <div class="grid grid-rows-2 grid-flow-col gap-4">
                        <div class="row-span-3 flex justify-center items-center">
                            <div class="rounded-full bg-elm w-20 h-20 flex justify-center items-center">
                                <i class="fas fa-user-check text-2xl text-white"></i>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <p>Lolos PPDB</p>
                        </div>
                        <div class="col-span-2">
                            <h2 class="text-2xl font-bold text-elm">
                                200
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fourth Card -->
        </div>
    </div>
</div>

@include('layouts.chart')

@endsection