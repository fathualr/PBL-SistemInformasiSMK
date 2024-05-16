@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 shadow-xl rounded-md">

    <div class="col-span-3 my-4 mx-5">
        <h3 class="font-bold text-lg">Pengelolaan Media Sosial</h3>
    </div>
    <!-- Content -->
    
    
    <div class="grid col-span-9 row-start-3 gap-5 mt-10">
        <div class="grid grid-cols-6 gap-5">
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Instagram</h2>
                    <form action="{{ route('medsos.update', ['id' => $medsos->id_media_sosial, 'field' => 'instagram']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full">
                            <div class="label mt-5">
                                <span class="label-text">Link:</span>
                            </div>
                            <input type="text" name="instagram" value="{{ $medsos->instagram }}" class="input input-bordered input-sm w-full" />
                        </label>
                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Facebook</h2>
                    <form action="{{ route('medsos.update', ['id' => $medsos->id_media_sosial, 'field' => 'facebook']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" name="facebook" placeholder="{{ $medsos->facebook }}" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div></form>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-6 gap-5">
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Youtube</h2>
                    <form action="{{ route('medsos.update', ['id' => $medsos->id_media_sosial, 'field' => 'youtube']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" name="youtube" placeholder="{{ $medsos->youtube }}" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div></form>
                </div>
            </div>
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Tiktok</h2>
                    <form action="{{ route('medsos.update', ['id' => $medsos->id_media_sosial, 'field' => 'tiktok']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" name="tiktok" placeholder="{{ $medsos->tiktok }}" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div></form>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-6 gap-5">
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Email</h2>
                    <form action="{{ route('medsos.update', ['id' => $medsos->id_media_sosial, 'field' => 'email']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" name="email" placeholder="{{ $medsos->email }}" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div></form>
                </div>
            </div>
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Telepon</h2>
                    <form action="{{ route('medsos.update', ['id' => $medsos->id_media_sosial, 'field' => 'nomor_telepon']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" name="nomor_telepon" placeholder="{{ $medsos->nomor_telepon }}" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div></form>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-6 gap-5">
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Fax</h2>
                    <form action="{{ route('medsos.update', ['id' => $medsos->id_media_sosial, 'field' => 'fax']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" name="fax" placeholder="{{ $medsos->fax }}" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div></form>
                </div>
            </div>
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Google Map:</h2>
                    <form action="{{ route('medsos.update', ['id' => $medsos->id_media_sosial, 'field' => 'google_map']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" name="google_map" placeholder="{{ $medsos->google_map }}" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div></form>
                </div>
            </div>
        </div>
    </div>  
<!-- Content -->

</div>
@endsection