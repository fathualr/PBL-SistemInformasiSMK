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
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" placeholder="$link" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Facebook</h2>
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" placeholder="$link" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-6 gap-5">
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Youtube</h2>
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" placeholder="$link" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Tiktok</h2>
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" placeholder="$link" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-6 gap-5">
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Email</h2>
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" placeholder="$link" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Telepon</h2>
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" placeholder="$link" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-6 gap-5">
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Fax</h2>
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" placeholder="$link" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="col-span-3 card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Google Map:</h2>
                    <label class="form-control w-full">
                        <div class="label mt-5">
                            <span class="label-text">Link:</span>
                        </div>
                        <input type="text" placeholder="$link" class="input input-bordered input-sm w-full" />
                    </label>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Content -->
</div>

<!-- Modal CREATE -->
<dialog id="my_modal_add" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <div class="grid gap-y-5">
                <input type="text" class="input input-bordered input-success w-full" placeholder="Judul berita" />
                <input type="file" class="file-input file-input-bordered file-input-success w-full" placeholder="Pilih gambar berita" />
                <textarea class="textarea textarea-success w-full" placeholder="Isi berita"></textarea>
                <input type="text" class="input input-bordered input-success w-full" placeholder="Kategori berita" />
                <input type="date" class="input input-bordered input-success w-full" placeholder="" />
            </div>
            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="reset"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>
                <a href="" class="">
                    <button type="submit"
                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class=" fas fa-plus"></i>
                        Tambah
                    </button>
                </a>
            </div>
        </form>
    </div>
</dialog>
<!-- Modal CREATE end -->

<!-- Modal EDIT -->
<dialog id="my_modal_edit" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <div class="grid gap-y-5">
                <input type="text" class="input input-bordered input-success w-full" placeholder="$judul" />
                <input type="file" class="file-input file-input-bordered file-input-success w-full" placeholder="" />
                <textarea class="textarea textarea-success w-full h-60" placeholder="$isi"></textarea>
                <input type="text" class="input input-bordered input-success w-full" placeholder="$kategori" />
                <input type="date" class="input input-bordered input-success w-full" placeholder="$tanggal" />
            </div>
            <div class="flex justify-end items-end mt-10 gap-4">
                <a href="" class="">
                    <button type="submit"
                        class="btn bg-elm w-60 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class=" fas fa-plus"></i>
                        Simpan perubahan
                    </button>
                </a>
            </div>
        </form>
    </div>
</dialog>
<!-- Modal EDIT end -->

<!-- Modal VIEW -->
<dialog id="my_modal_view" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <div>
            <figure class="w-full flex justify-center"><img src="{{asset('image/test-berita.png')}}" alt="Shoes" /></figure>
            <div class="label">
                <span class="label-text-alt">$tanggal</span>
            </div>
            <div class="divider">
                <p class="font-bold text-xl">$Judul</p>
            </div>
            <p>$isi berita</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem labore nemo reiciendis explicabo debitis recusandae a nisi, quidem inventore dolore quae facere quis rerum reprehenderit laudantium voluptatibus eius! Maiores, aspernatur.</p>
            <button class="btn btn-outline mt-10 btn-xs w-20 rounded-full">
                Default
            </button>
        </div>
    </div>
</dialog>
<!-- Modal VIEW end -->

<!-- Modal DELETE -->
<dialog id="my_modal_delete" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Berita</h3>
        <div class="flex justify-end items-end gap-4">
            <a href="" class="">
                <button type="submit"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    Hapus
                </button>
            </a>
        </div>
    </div>
</dialog>
<!-- Modal DELETE end -->

@endsection