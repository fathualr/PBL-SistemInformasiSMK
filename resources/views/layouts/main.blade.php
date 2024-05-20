<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    <style>
    .overflow-y-auto::-webkit-scrollbar {
        display: none;
    }

    ::-webkit-scrollbar {
        display: none;

    }
    </style>
    <title>SMK Muhammadiyah Plus Kota Batam | {{ $title }}</title>
</head>

<body class="font-poppins">

    <!-- Navbar -->
    <div class="navbar bg-transparent fixed top-0 z-40" id="navbar">
        <div class="navbar-start lg:hidden">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <img src="{{ !empty($konten->logo_sekolah) ? asset('storage/'.$konten->logo_sekolah) : 'empty' }}"
                        class="h-5 w-5" alt="logo_sekolah">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg> --}}
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li class="@if($title == 'Home') bg-celadon rounded-md @endif"><a href="/">Beranda</a></li>
                    <li class="@if($title == 'Profile') bg-celadon rounded-md @endif"><a href="/guest/profile">Profile
                            Sekolah</a></li>
                    <li>
                    <li class="@if($title == 'Program Keahlian') bg-celadon rounded-md @endif"><a
                            href="/guest/program-keahlian">
                            Program Keahlian</a></li>
                    <li>
                        <details>
                            <summary>PPDB</summary>
                            <ul class="p-2">
                                <li class="text-black @if($title == 'PPDB') bg-celadon rounded-md @endif">
                                    <a href="/guest/ppdb">Pendaftaran</a>
                                </li>
                                <li class="text-black @if($title == 'Pengumuman PPDB') bg-celadon rounded-md @endif">
                                    <a href="/guest/pengumuman-ppdb">Pengumuman</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Direktori</summary>
                            <ul class="">
                                <li class="text-black @if($title == 'Direktori Guru') bg-celadon rounded-md @endif">
                                    <a href="/guest/direktori-guru">Guru</a>
                                </li>
                                <li class="text-black @if($title == 'Direktori Pegawai') bg-celadon rounded-md @endif">
                                    <a href="/guest/direktori-pegawai">Pegawai</a>
                                </li>
                                <li class="text-black @if($title == 'Direktori Siswa') bg-celadon rounded-md @endif">
                                    <a href="/guest/direktori-siswa">Siswa</a>
                                </li>
                                <li class="text-black @if($title == 'Direktori Alumni') bg-celadon rounded-md @endif">
                                    <a href="/guest/direktori-alumni">Alumni</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Galeri</summary>
                            <ul class="p-2">
                                <li class="text-black @if($title == 'Galeri Foto') bg-celadon rounded-md @endif"><a
                                        href="/guest/galeri-foto">Foto</a></li>
                                <li class="text-black @if($title == 'Galeri Video') bg-celadon rounded-md @endif"><a
                                        href="/guest/galeri-video">Video</a></li>
                            </ul>
                        </details>
                    </li>
                    <li class="@if($title == 'Sarana & Prasarana') bg-celadon rounded-md @endif"><a
                            href="/guest/sarana-prasarana">Sarana & Prasarana</a></li>
                    <li class="@if($title == 'Prestasi Siswa') bg-celadon rounded-md @endif"><a
                            href="/guest/prestasi-siswa">Prestasi Siswa</a></li>
                    <li class="@if($title == 'Ekstrakulikuler') bg-celadon rounded-md @endif"><a
                            href="/guest/ekstrakulikuler">Ekstrakulikuler</a></li>
                    <li>
                        <details>
                            <summary>Lainnya</summary>
                            <ul class="p-2">
                                <li class="text-black @if($title == 'Berita') bg-celadon rounded-md @endif"><a
                                        href="/guest/berita">Berita</a></li>
                                <li class="text-black @if($title == 'Media Sosial') bg-celadon rounded-md @endif">
                                    <a href="/guest/media-sosial">Informasi Lainnya</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>
        </div>

        <!--Normal-->
        <div class="grid grid-cols-10 gap-1 w-full lg:place-items-start  place-items-end">
            <div class="">
                <div
                    class="avatar-group -space-x-6 rtl:space-x-reverse hidden laptop:flex translate-x-7 items-center md:ml-auto sm:ml-0">
                    <div class="avatar lg:mx-auto">
                        <div class="w-12">
                            <img src="{{ !empty($konten->logo_sekolah) ? asset('storage/'.$konten->logo_sekolah) : 'empty' }}"
                                class="h-5 w-5" alt="logo_sekolah">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-9 w-full font-bold hidden laptop:flex desktop:justify-center desktop:items-center"
                id="nav-text">
                <ul class="menu menu-horizontal px-1 justify-center items-center">
                    <li class="@if($title == 'Beranda') bg-deep-sea rounded-md @endif"><a href="/">Beranda</a>
                    </li>
                    <li class="@if($title == 'Profile') bg-deep-sea rounded-md @endif"><a href="/guest/profile">Profile
                            Sekolah</a></li>
                    <li>
                    <li class="@if($title == 'Program Keahlian') bg-deep-sea rounded-md @endif"><a
                            href="/guest/program-keahlian">Program Keahlian</a></li>
                    <li>
                        <details>
                            <summary>PPDB</summary>
                            <ul class="p-2 bg-blue-lagoon w-60 z-40">
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md  @if($title == 'PPDB') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/ppdb">Informasi & Pendaftaran</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md  @if($title == 'Pengumuman PPDB') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/pengumuman-ppdb">Pengumuman</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Direktori</summary>
                            <ul class="bg-blue-lagoon z-40">
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md @if($title == 'Direktori Guru') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/direktori-guru">Guru</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md @if($title == 'Direktori Pegawai') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/direktori-pegawai">Pegawai</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md @if($title == 'Direktori Siswa') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/direktori-siswa">Siswa</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md @if($title == 'Direktori Alumni') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/direktori-alumni">Alumni</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Galeri</summary>
                            <ul class="p-2 bg-blue-lagoon z-40">
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md @if($title == 'Galeri Foto') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/galeri-foto">Foto</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md @if($title == 'Galeri Video') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/galeri-video">Video</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li class="@if($title == 'Sarana & Prasarana') bg-deep-sea rounded-md @endif"><a
                            href="/guest/sarana-prasarana">Sarana & Prasarana</a></li>
                    <li class="@if($title == 'Prestasi Siswa') bg-deep-sea rounded-md @endif"><a
                            href="/guest/prestasi-siswa">Prestasi Siswa</a></li>
                    <li class="@if($title == 'Ekstrakulikuler') bg-deep-sea rounded-md @endif"><a
                            href="/guest/ekstrakulikuler">Ekstrakulikuler</a></li>
                    <li>
                        <details>
                            <summary>Lainnya</summary>
                            <ul class="p-2 bg-blue-lagoon w-40">
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md @if($title == 'Berita') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/berita">Berita</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-dark-lochinvar hover:rounded-md @if($title == 'Media Sosial') bg-deep-sea rounded-md @endif">
                                    <a href="/guest/media-sosial">Informasi Lainnya</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navbar -->

    <!-- Carousel -->
    <div class="flex justify-center items-center">
        <div class="carousel w-full h-[30vh] lg:h-[70vh] relative overflow-hidden">
            @foreach($carousels as $key => $crs)
            <div id="slide{{ $key+1 }}" class="carousel-item relative w-full transition {{ $key !== 0 ? 'hidden' : '' }}">
                <img src="{{ asset('storage/'. $crs->image) }}" class="w-full transition-transform duration-500 transform" />
                @if ($key === 0)
                    <div class="absolute inset-0 flex justify-center items-center">
                        <div class="p-4 text-white bg-opacity-50 text-center w-[30rem]">
                            <p class="text-2xl font-bold">Halaman {{ $title }} SMK Muhammadiyah Plus Batam Kota </p>
                        </div>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    <!-- Carousel -->

    <!-- Main -->
    <div class="container mx-auto h-max w-11/12 my-10">
        @yield('Main')
    </div>
    <!-- Main -->

    <!-- Footer -->
    <footer class="footer p-10 bottom-0 bg-blue-lagoon text-white">
        <aside>
            <div class="avatar-group -space-x-6 rtl:space-x-reverse">
                <div class="avatar">
                    <div class="w-12">
                        <img src="..." alt="Logo" />
                    </div>
                </div>
            </div>
            <path
                d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
            </path>
            </svg>
            <p>ACME Industries Ltd.<br>Providing reliable tech since 1992</p>
        </aside>
        <nav>
            <h6 class="footer-title">Jelajah</h6>
            <a class="link link-hover">Sambutan</a>
            <a class="link link-hover">Profil Sekolah</a>
            <a class="link link-hover">Berita</a>
            <a class="link link-hover">Galeri</a>
        </nav>
        <nav>
            <h6 class="footer-title">Halaman Umum</h6>
            <a class="link link-hover">Data Guru</a>
            <a class="link link-hover">PPDB SMK</a>
            <a class="link link-hover">Panduan PPDB</a>
            <a class="link link-hover">Lokasi</a>
            <a class="link link-hover">Kontak</a>
        </nav>
        <nav>
            <h6 class="footer-title">Media Sosial</h6>
            <ul class="flex gap-4">
                <li>
                    <a class="link link-hover">
                        <button class="btn btn-outline hover:bg-transparent">
                            <i class="fa-brands fa-facebook text-2xl"></i>
                        </button>
                    </a>
                </li>
                <li>
                    <a class="link link-hover">
                        <button class="btn btn-outline hover:bg-transparent">
                            <i class="fa-brands fa-instagram text-2xl"></i>
                        </button>
                    </a>
                </li>
                <li>
                    <a class="link link-hover">
                        <button class="btn btn-outline hover:bg-transparent">
                            <i class="fa-brands fa-youtube text-2xl"></i>
                        </button>
                    </a>
                </li>
            </ul>
            <a class="link link-hover w-full">
                <button class="btn btn-outline hover:bg-transparent w-full h-max">
                    <ul class="flex justify-center items-center font-bold">
                        <li>Made by : </li>
                        <li>
                            <img src="{{ asset('image/watermark.png') }}" alt=""
                                class="w-20 transition-all duration-500 hover:animate-spin">
                        </li>
                    </ul>
                </button>
            </a>
        </nav>
    </footer>
    <!-- Footer -->

</body>
<script src="{{ asset('js/script.js') }}"></script>

</html>