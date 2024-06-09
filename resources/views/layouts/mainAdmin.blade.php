<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"
        href="{{ !empty($konten->logo_sekolah) ? asset('storage/'.$konten->logo_sekolah) : asset('image/null.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Admin SMK Muhammadiyah Plus Kota Batam | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
    @vite('resources/css/app.css')
</head>
<style>
.overflow-x-auto::-webkit-scrollbar {
    display: none;
}


::-webkit-scrollbar {
    display: none;

}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Menghilangkan spinner di Firefox */
input[type=number] {
    -moz-appearance: textfield;
}
</style>

<body class="font-poppins">

    <!-- Navbar -->
    <div class="flex h-max">
        <!-- Side Navbar -->
        <div class="w-20 bg-blue-500 text-white flex-none transition-all duration-300">
            <div class="flex flex-col py-4">
                <button id="toggleButton"
                    class="focus:outline-none absolute left-[0.85rem] text-xl text-center btn rounded-full transition-all duration-300 z-50 tooltip tooltip-right"
                    data-tip="Alt + O" accesskey="o">
                    <i id="toggleIcon" class="fas fa-bars transition-all duration-500"></i>
                </button>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <!-- Title -->
                <div class="font-bold capitalize  hidden" id="normalTitle">
                    <img class="rounded-full w-32 h-32 mx-auto"
                        src="{{ !empty($konten->logo_sekolah) ? asset('storage/'.$konten->logo_sekolah) : asset('image/null.png') }}"
                        alt="">
                    <h1 class="mt-5 py-2 w-11/12 text-base border-b-2 border-white text-center mx-auto">SMK Muhammadiyah
                        Plus Kota
                        Batam
                    </h1>
                </div>
                <!-- Title -->

                <!-- Nav -->
                <ul class="menu p-4 w-72 translate-y-3 text-white flex justify-center items-center z-50" id="menu">
                    <!-- Sidebar content here -->
                    <li class="hover:translate-y-0 @if($title == 'Dashboard') bg-blue-600 rounded-md @endif"">
                        <a href=" /admin/dashboard">
                        <div class=" w-3 flex justify-center items-center">
                            <i class="fas fa-chart-simple text-2xl font-bold"></i>
                        </div>
                        <h1 class="font-bold mx-10 hidden" id="navTitle">Dashboard</h1>
                        </a>
                    </li>
                    @if ($adminRole === 'Master')
                    <li class="hover:translate-y-0 @if($title == 'Admin') bg-blue-600 rounded-md @endif">
                        <a href="/admin/admin">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-user-gear text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Admin</h1>
                        </a>
                    </li>
                    @endif
                    <li class="hover:translate-y-0 @if($title == 'Admin Carousel') bg-blue-600 rounded-md @endif">
                        <a href="/admin/carousels">
                            <div class=" w-3 flex justify-center items-center">
                                <i class="fas fa-film text-2xl font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Carousel</h1>
                        </a>
                    </li>
                    <li
                        class="hover:translate-y-0 @if($title == 'Admin Sejarah Sekolah') bg-blue-600 rounded-md @endif">
                        <a href="/admin/sejarah">
                            <div class=" w-3 flex justify-center items-center">
                                <i class="fas fa-timeline text-2xl font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Sejarah Sekolah</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Profile') bg-blue-600 rounded-md @endif">
                        <a href="/admin/profile/#">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-school text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Konten Website</h1>
                        </a>
                    </li>
                    <li
                        class="hover:translate-y-0 @if($title == 'Admin Program Keahlian') bg-blue-600 rounded-md @endif">
                        <a href="/admin/program-keahlian">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-pen-ruler text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Program Keahlian</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0">
                        <!-- W-20 -->
                        <div class="dropdown dropdown-hover -mt-1" id="dropdown">
                            <div tabindex="0" role="button" class="btn bg-transparent border-none">
                                <div class="w-3 flex justify-center items-center text-white">
                                    <i class="fas fa-folder-open text-2xl text-center font-bold"></i>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content menu p-2 text-white shadow bg-blue-500 rounded-box w-52">
                                <li class="@if($title == 'Admin Guru') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/guru">
                                        <i class="fas fa-chalkboard-user"></i>
                                        <h1 class="font-bold mx-5">Guru</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pegawai') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pegawai">
                                        <i class="fas fa-clipboard-user text-2xl"></i>
                                        <h1 class="font-bold mx-5">Pegawai</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Siswa') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/siswa">
                                        <i class="fas fa-users"></i>
                                        <h1 class="font-bold mx-5">Siswa</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Alumni') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/alumni">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                        <h1 class="font-bold mx-5">Alumni</h1>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- W-20 -->
                        <details class="hidden" id="navTitle">
                            <summary
                                class="@if($title == 'Admin Guru' || $title == 'Admin Pegawai' || $title == 'Admin Siswa' || $title == 'Admin Alumni') bg-blue-600 rounded-md @endif">
                                <div class="w-3 flex justify-center items-center">
                                    <i class="fas fa-folder-open text-2xl text-center font-bold"></i>
                                </div>
                                <h1 class="font-bold mx-10 hidden" id="navTitle">Direktori</h1>
                            </summary>
                            <ul>
                                <li class="@if($title == 'Admin Guru') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/guru">
                                        <i class="fas fa-chalkboard-user"></i>
                                        <h1 class="font-bold mx-5">Guru</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pegawai') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pegawai">
                                        <i class="fas fa-clipboard-user text-2xl"></i>
                                        <h1 class="font-bold mx-5">Pegawai</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Siswa') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/siswa">
                                        <i class="fas fa-users"></i>
                                        <h1 class="font-bold mx-5">Siswa</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Alumni') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/alumni">
                                        <i class="fas fa-graduation-cap"></i>
                                        <h1 class="font-bold mx-5">Alumni</h1>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li class="hover:translate-y-0">
                        <!-- W-20 -->
                        <div class="dropdown dropdown-hover -mt-3 -z-50" id="dropdown">
                            <div tabindex="0" role="button" class="btn bg-transparent border-none">
                                <div class="w-3 flex justify-center items-center text-white">
                                    <i class="fas fa-photo-film text-2xl text-center font-bold"></i>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content z-[1] menu p-2 text-white shadow bg-blue-500 rounded-box w-52">
                                <li class="@if($title == 'Admin Album') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/album">
                                        <i class="fas fa-image"></i>
                                        <h1 class="font-bold mx-5">Album</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Foto') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/foto">
                                        <i class="fas fa-image"></i>
                                        <h1 class="font-bold mx-5">Foto</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Video') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/video">
                                        <i class="fas fa-film"></i>
                                        <h1 class="font-bold mx-5">Video</h1>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- W-20 -->
                        <details class="hidden" id="navTitle">
                            <summary
                                class="@if($title == 'Admin Album' || $title == 'Admin Foto' || $title == 'Admin Video' ) bg-blue-600 rounded-md @endif">
                                <div class="w-3  flex justify-center items-center">
                                    <i class="fas fa-photo-film text-2xl text-center font-bold"></i>
                                </div>
                                <h1 class="font-bold mx-10 hidden" id="navTitle">Galeri</h1>
                            </summary>
                            <ul>
                                <li class="@if($title == 'Admin Album') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/album">
                                        <i class="fas fa-image"></i>
                                        <h1 class="font-bold mx-5">Album</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Foto') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/foto">
                                        <i class="fas fa-image"></i>
                                        <h1 class="font-bold mx-5">Foto</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Video') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/video">
                                        <i class="fas fa-film"></i>
                                        <h1 class="font-bold mx-5">Video</h1>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li class="hover:translate-y-0">
                        <!-- W-20 -->
                        <div class="dropdown dropdown-hover -mt-3 -z-50" id="dropdown">
                            <div tabindex="0" role="button" class="btn bg-transparent border-none">
                                <div class="w-3 flex justify-center items-center text-white">
                                    <i class="fas fa-file-lines text-2xl text-center font-bold"></i>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content z-[1] menu p-2 text-white shadow bg-blue-500 rounded-box w-max">
                                <li class="@if($title == 'Admin Informasi PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/informasiPPDB">
                                        <i class="fas fa-circle-info"></i>
                                        <h1 class="font-bold mx-5">Informasi PPDB</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pendaftaran PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pendaftaranPPDB">
                                        <i class="fas fa-clipboard"></i>
                                        <h1 class="font-bold mx-5">Pendaftaran PPDB</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pengumuman PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pengumumanPPDB">
                                        <i class="fas fa-bullhorn"></i>
                                        <h1 class="font-bold mx-5">Pengumuman PPDB</h1>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- W-20 -->
                        <details class="hidden" id="navTitle">
                            <summary
                                class="@if($title == 'Admin Informasi PPDB' || $title == 'Admin Pendaftaran PPDB' || $title == 'Admin Pengumuman PPDB') bg-blue-600 rounded-md @endif">
                                <div class="w-3 flex justify-center items-center">
                                    <i class="fas fa-file-lines text-2xl text-center font-bold"></i>
                                </div>
                                <h1 class="font-bold mx-10 hidden" id="navTitle">PPDB</h1>
                            </summary>
                            <ul>
                                <li class="@if($title == 'Admin Informasi PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/informasiPPDB">
                                        <i class="fas fa-circle-info"></i>
                                        <h1 class="font-bold mx-5">Informasi PPDB</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pendaftaran PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pendaftaranPPDB">
                                        <i class="fas fa-clipboard"></i>
                                        <h1 class="font-bold mx-5">Pendaftaran PPDB</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pengumuman PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pengumumanPPDB">
                                        <i class="fas fa-bullhorn"></i>
                                        <h1 class="font-bold mx-5">Pengumuman PPDB</h1>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>

                    <li class="hover:translate-y-0">
                        <!-- W-20 -->
                        <div class="dropdown dropdown-hover -mt-3 -z-50" id="dropdown">
                            <div tabindex="0" role="button" class="btn bg-transparent border-none">
                                <div class="w-3 flex justify-center items-center text-white -z-50">
                                    <i class="fas fa-building text-2xl text-center font-bold"></i>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content z-[1] menu p-2 text-white shadow bg-blue-500 rounded-box w-max">
                                <li
                                    class="hover:translate-y-0 @if($title == 'Admin Sarana & Prasarana') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/saranaPrasarana">
                                        <div class="w-3 flex justify-center items-center">
                                            <i class="fas fa-building text-2xl text-center font-bold"></i>
                                        </div>
                                        <h1 class="font-bold mx-10">Sarana & Prasarana</h1>
                                    </a>
                                </li>
                                <li
                                    class="hover:translate-y-0 @if($title == 'Gambar Sarana & Prasarana') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/fotoPrasarana">
                                        <div class="w-3 flex justify-center items-center">
                                            <i class="fas fa-building text-2xl text-center font-bold"></i>
                                        </div>
                                        <h1 class="font-bold mx-10">Gambar Prasarana</h1>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- W-20 -->
                        <details class="hidden" id="navTitle">
                            <summary
                                class="@if($title == 'Admin Sarana & Prasarana' || $title == 'Gambar Sarana & Prasarana') bg-blue-600 rounded-md @endif">
                                <div class="w-3 flex justify-center items-center">
                                    <i class="fas fa-building text-2xl text-center font-bold"></i>
                                </div>
                                <h1 class="font-bold mx-10 hidden" id="navTitle">Prasarana</h1>
                            </summary>
                            <ul>
                                <li
                                    class="hover:translate-y-0 @if($title == 'Admin Sarana & Prasarana') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/saranaPrasarana">
                                        <div class="w-3 flex justify-center items-center">
                                            <i class="fas fa-building text-2xl text-center font-bold"></i>
                                        </div>
                                        <h1 class="font-bold mx-10 hidden" id="navTitle">Sarana & Prasarana</h1>
                                    </a>
                                </li>
                                <li
                                    class="hover:translate-y-0 @if($title == 'Gambar Sarana & Prasarana') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/fotoPrasarana">
                                        <div class="w-3 flex justify-center items-center -z-50">
                                            <i class="fas fa-building text-2xl text-center font-bold"></i>
                                        </div>
                                        <h1 class="font-bold mx-10 hidden" id="navTitle">Gambar Prasarana</h1>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li class="hover:translate-y-0 -z-50 @if($title == 'Admin Prestasi') bg-blue-600 rounded-md @endif">
                        <a href="/admin/prestasi">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-trophy text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Prestasi Siswa</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Admin Berita') bg-blue-600 rounded-md @endif">
                        <a href="/admin/berita">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-bullhorn text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Berita</h1>
                        </a>
                    </li>
                    <li
                        class="hover:translate-y-0 @if($title == 'Admin Ekstrakulikuler') bg-blue-600 rounded-md @endif">
                        <a href="/admin/ekstrakulikuler">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-baseball-bat-ball text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Ekstrakulikuler</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Admin Sosial Media') bg-blue-600 rounded-md @endif">
                        <a href="/admin/sosialMedia">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-link text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Sosial Media</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Admin Umpan Balik') bg-blue-600 rounded-md @endif">
                        <a href="/admin/umpanBalik">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-message text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Umpan Balik</h1>
                        </a>
                    </li>
                </ul>
                <!-- Nav -->
            </div>
        </div>
        <!-- Content -->
        <div class="flex-1 p-4">

            <div class="card card-compact bg-blue-100 w-full h-72 shadow-xl mx-auto">
                <div class="card-body h-60 sticky top-16 rounded-lg wave-effect">
                    @include('layouts.wave')
                    <h1 class="card-title font-bold text-xl uppercase absolute bottom-10 left-5 text-white">
                        Welcome {{ auth('admin')->user()->nama }}
                    </h1>
                    <div class="card-actions text-xl absolute right-6 top-5 gap-6 text-slate-500">
                        <button type="button" class="bg-transparent border-0 cursor-pointer"
                            onclick="logout.showModal()">
                            <i class="fas fa-arrow-right-from-bracket"></i>
                        </button>

                    </div>
                </div>
            </div>

            <dialog id="logout" class="modal">
                <div class="modal-box">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </form>
                    <h3 class="font-bold text-lg">Konfirmasi Logout</h3>
                    <div class="grid grid-cols-3 w-52 -mt-5">
                        <div class="divider"></div>
                        <div class="divider divider-error"></div>
                        <div class="divider"></div>
                    </div>

                    <h3 class="font-bold text-lg flex justify-center items-center">Apakah Anda Yakin Ingin Logout</h3>

                    <div class="flex justify-center items-center mt-20 gap-4">
                        <form id="logout-form" action="{{ route('account.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn w-40 bg-elm text-white hover:text-elm cursor-pointer">
                                <i class="fas fa-check"></i>Ya
                            </button>
                        </form>

                        <form method="dialog">
                            <button class="btn w-40 bg-error text-white hover:text-error cursor-pointer">
                                <i class="fas fa-times"></i>
                                Tidak
                            </button>
                        </form>


                    </div>

                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>

            <div class="my-20 mx-auto">
                @yield('main-content')
            </div>
            <!-- Content -->
        </div>
        <!-- Navbar -->


        @include('script.sidebar')
        @include('script.actionButton')
        @include('script.editor')
        @include('script.duplicateInput')
</body>

</html>