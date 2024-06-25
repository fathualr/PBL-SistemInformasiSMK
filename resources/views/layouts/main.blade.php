<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <link rel="icon" type="image/x-icon"
        href="{{ !empty($konten->logo_sekolah) ? asset('storage/'.$konten->logo_sekolah) : asset('image/null.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/typingFx.js') }}"></script>
    <style>
    .overflow-y-auto::-webkit-scrollbar {
        display: none;
    }

    ::-webkit-scrollbar {
        display: none;

    }

    .carousel-inner {
        display: flex;
        overflow: hidden;
        width: 100%;
        position: relative;
    }

    .carousel-items {
        min-width: 100%;
        transition: transform 0.5s ease-in-out;
    }

    .loader {
        position: absolute;
        top: 50%;
        left: 50%;
        right: 50%;
        transform: translate(-50%, -50%);
        width: 100px;
        height: 100px;
        z-index: 1000;
        background-repeat: no-repeat;
        background-image: linear-gradient(#3b82f6 50px, transparent 0),
            linear-gradient(#3b82f6 50px, transparent 0),
            linear-gradient(#3b82f6 50px, transparent 0),
            linear-gradient(#3b82f6 50px, transparent 0),
            linear-gradient(#3b82f6 50px, transparent 0),
            linear-gradient(#3b82f6 50px, transparent 0);
        background-position: 0px center, 15px center, 30px center, 45px center, 60px center, 75px center, 90px center;
        animation: rikSpikeRoll 0.65s linear infinite alternate;
    }

    @keyframes rikSpikeRoll {
        0% {
            background-size: 10px 3px;
        }

        16% {
            background-size: 10px 50px, 10px 3px, 10px 3px, 10px 3px, 10px 3px, 10px 3px
        }

        33% {
            background-size: 10px 30px, 10px 50px, 10px 3px, 10px 3px, 10px 3px, 10px 3px
        }

        50% {
            background-size: 10px 10px, 10px 30px, 10px 50px, 10px 3px, 10px 3px, 10px 3px
        }

        66% {
            background-size: 10px 3px, 10px 10px, 10px 30px, 10px 50px, 10px 3px, 10px 3px
        }

        83% {
            background-size: 10px 3px, 10px 3px, 10px 10px, 10px 30px, 10px 50px, 10px 3px
        }

        100% {
            background-size: 10px 3px, 10px 3px, 10px 3px, 10px 10px, 10px 30px, 10px 50px
        }
    }

    /* Hide loader after page load */
    body.loaded .loader-wrapper {
        display: none;
    }

    @media (min-width: 1024px) {
        .laptop\:not-truncate {
            white-space: normal;
            overflow: visible;
            text-overflow: clip;
        }
    }

    #slider {
        display: flex;
        width: 100%;
    }

    #sliderBerita {
        display: flex;
        width: 100%;
    }

    #slider>div {
        min-width: 100%;
        transition: transform 0.5s ease;
    }

    #sliderBerita>div {
        min-width: 100%;
        transition: transform 0.5s ease;
    }

    @media (min-width: 640px) {
        #slider>div {
            min-width: 50%;
        }

        #sliderBerita>div {
            min-width: 50%;
        }
    }

    @media (min-width: 1024px) {
        #slider>div {
            min-width: 25%;
            /* Tampilkan 4 gambar per slide di desktop */
        }
    }
    </style>
    <title>SMK Muhammadiyah Plus Kota Batam | {{ $title }}</title>
</head>

<body class="font-poppins">
    <!-- Loader -->
    <div class="loader-wrapper fixed top-0 left-0 bg-white flex justify-center items-center w-full h-full z-[9999]">
        <div class="loader mx-auto">
        </div>
    </div>
    <!-- Loader -->

    <!-- Navbar -->
    <div class="navbar bg-transparent backdrop-blur  text-slate-300 fixed top-0 z-[999]" id="navbar">
        <div class="navbar-start lg:hidden">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <i class="fas fa-bars"></i>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content text-black mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li class="@if($title == 'Beranda') bg-blue-400 text-white rounded-md @endif"><a
                            href="/">Beranda</a></li>
                    <li
                        class="@if($title == 'Profile' || $title == 'Sejarah') bg-blue-400 text-white rounded-md @endif">
                        <a href="/guest/profile">Profile
                            Sekolah</a>
                    </li>
                    <li>
                    <li
                        class="@if($title == 'Program Keahlian' || $title == 'Detail Program Keahlian') bg-blue-400 text-white rounded-md @endif">
                        <a href="/guest/program-keahlian">
                            Program Keahlian</a>
                    </li>
                    <li>
                        <details>
                            <summary
                                class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'PPDB' || $title == 'Pengumuman PPDB') bg-blue-400 text-white rounded-md @endif">
                                PPDB</summary>
                            <ul class="p-2">
                                <li class="text-black @if($title == 'PPDB') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/ppdb">Pendaftaran</a>
                                </li>
                                <li
                                    class="text-black @if($title == 'Pengumuman PPDB') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/pengumuman-ppdb">Pengumuman</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary
                                class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Direktori Guru' || $title == 'Direktori Pegawai' || $title == 'Direktori Siswa' || $title == 'Direktori Alumni') bg-blue-400 text-white rounded-md @endif">
                                Direktori</summary>
                            <ul class="">
                                <li
                                    class="text-black @if($title == 'Direktori Guru') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/direktori-guru">Guru</a>
                                </li>
                                <li
                                    class="text-black @if($title == 'Direktori Pegawai') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/direktori-pegawai">Pegawai</a>
                                </li>
                                <li
                                    class="text-black @if($title == 'Direktori Siswa') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/direktori-siswa">Siswa</a>
                                </li>
                                <li
                                    class="text-black @if($title == 'Direktori Alumni') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/direktori-alumni">Alumni</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary
                                class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Galeri Foto' || $title == 'Galeri Video') bg-blue-400 text-white rounded-md @endif">
                                Galeri</summary>
                            <ul class="p-2">
                                <li
                                    class="text-black @if($title == 'Galeri Foto') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/galeri-foto">Foto</a>
                                </li>
                                <li
                                    class="text-black @if($title == 'Galeri Video') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/galeri-video">Video</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li class="@if($title == 'Sarana & Prasarana') bg-blue-400 text-white rounded-md @endif"><a
                            href="/guest/sarana-prasarana">Sarana & Prasarana</a></li>
                    <li class="@if($title == 'Prestasi Siswa') bg-blue-400 text-white rounded-md @endif"><a
                            href="/guest/prestasi-siswa">Prestasi Siswa</a></li>
                    <li class="@if($title == 'Ekstrakulikuler') bg-blue-400 text-white rounded-md @endif"><a
                            href="/guest/ekstrakulikuler">Ekstrakulikuler</a></li>
                    <li>
                        <details>
                            <summary
                                class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Berita' || $title == 'Media Sosial') bg-blue-400 text-white rounded-md @endif">
                                Lainnya</summary>
                            <ul class="p-2">
                                <li class="text-black @if($title == 'Berita') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/berita">Berita</a>
                                </li>
                                <li
                                    class="text-black @if($title == 'Media Sosial') bg-blue-400 text-white rounded-md @endif">
                                    <a href="/guest/media-sosial">Informasi Lainnya</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>
        </div>

        <!--Normal-->
        <div class="grid grid-cols-10 gap-1 w-full lg:place-items-start place-items-end">
            <div class="">
                <div
                    class="avatar-group -space-x-6 rtl:space-x-reverse hidden laptop:flex translate-x-7 items-center md:ml-auto sm:ml-0">
                    <div class="avatar lg:mx-auto">
                        <div class="w-12">
                            <img src="{{ !empty($konten->logo_sekolah) ? asset('storage/'.$konten->logo_sekolah) : asset('image/null.png') }}"
                                class="h-5 w-5" alt="logo_sekolah">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-9 w-full font-bold hidden laptop:flex desktop:justify-center desktop:items-center"
                id="nav-text">
                <ul class="menu menu-horizontal px-1 justify-center items-center">
                    <li
                        class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Beranda') bg-blue-400 rounded-md @endif">
                        <a href="/">Beranda</a>
                    </li>
                    <li
                        class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Profile' || $title == 'Sejarah') bg-blue-400 rounded-md @endif">
                        <a href="/guest/profile">Profile
                            Sekolah</a>
                    </li>
                    <li>
                    <li
                        class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Program Keahlian' || $title == 'Detail Program Keahlian') bg-blue-500 rounded-md @endif">
                        <a href="/guest/program-keahlian">Program Keahlian</a>
                    </li>
                    <li>
                        <details>
                            <summary
                                class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'PPDB' || $title == 'Pengumuman PPDB') bg-blue-500 rounded-md @endif">
                                PPDB
                            </summary>
                            <ul class="p-2 bg-blue-400 w-max z-40">
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300  @if($title == 'PPDB') bg-blue-500 rounded-md @endif">
                                    <a href="/guest/ppdb">Informasi & Pendaftaran</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300  @if($title == 'Pengumuman PPDB') bg-blue-500 rounded-md @endif">
                                    <a href="/guest/pengumuman-ppdb">Pengumuman</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary
                                class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Direktori Guru' || $title == 'Direktori Pegawai' || $title == 'Direktori Siswa' || $title == 'Direktori Alumni') bg-blue-500 rounded-md @endif">
                                Direktori
                            </summary>
                            <ul class="bg-blue-400 z-40">
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Direktori Guru') bg-blue-500 rounded-md @endif">
                                    <a href="/guest/direktori-guru">Guru</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Direktori Pegawai') bg-blue-500 rounded-md @endif">
                                    <a href="/guest/direktori-pegawai">Pegawai</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Direktori Siswa') bg-blue-500 rounded-md @endif">
                                    <a href="/guest/direktori-siswa">Siswa</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Direktori Alumni') bg-blue-500 rounded-md @endif">
                                    <a href="/guest/direktori-alumni">Alumni</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary
                                class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Galeri Foto' || $title == 'Galeri Video') bg-blue-500 rounded-md @endif">
                                Galeri
                            </summary>
                            <ul class="p-2 bg-blue-400 z-40">
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Galeri Foto') bg-blue-500 rounded-md @endif">
                                    <a href="/guest/galeri-foto">Foto</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Galeri Video') bg-blue-500 rounded-md @endif">
                                    <a href="/guest/galeri-video">Video</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li
                        class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Sarana & Prasarana') bg-blue-500 rounded-md @endif">
                        <a href="/guest/sarana-prasarana">Sarana & Prasarana</a>
                    </li>
                    <li
                        class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Prestasi Siswa') bg-blue-500 rounded-md @endif">
                        <a href="/guest/prestasi-siswa">Prestasi Siswa</a>
                    </li>
                    <li
                        class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Ekstrakulikuler') bg-blue-500 rounded-md @endif">
                        <a href="/guest/ekstrakulikuler">Ekstrakulikuler</a>
                    </li>
                    <li>
                        <details>
                            <summary
                                class="hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Berita' || $title == 'Media Sosial') bg-blue-500 rounded-md @endif">
                                Lainnya
                            </summary>
                            <ul class="p-2 bg-blue-400 w-40">
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Berita') bg-blue-500 rounded-md @endif">
                                    <a href="/guest/berita">Berita</a>
                                </li>
                                <li
                                    class="text-white m-2 hover:bg-blue-400 hover:rounded-md transition-all duration-300 @if($title == 'Media Sosial') bg-blue-500 rounded-md @endif">
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
        <div class="carousels w-full h-[50vh] lg:h-[100vh] relative overflow-hidden">
            <div class="flex transition-all duration-700 ease-in-out transform">
                @foreach($carousels as $key => $crs)
                <div class="carousel-items w-full flex-shrink-0" id="items">
                    <img src="{{ asset('storage/'. $crs->image) }}"
                        class="w-full h-[35rem] 2xl:h-[40rem] object-cover" />
                    @if ($key === 0)
                    <div
                        class="absolute smartphone:bottom-1/2 tablet:bottom-0 inset-0 flex justify-center items-center">
                        <div class="p-4 text-white text-center w-[30rem]">
                            <p class="smartphone:text-xl tablet:text-3xl font-bold" id="element"></p>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Carousel -->


    <!-- Main -->
    <div class="container mx-auto h-max w-11/12 my-10">
        @yield('Main')
    </div>
    <!-- Main -->

    <!-- Footer -->
    <footer class="footer p-10 bottom-0 bg-blue-300 text-white">
        <aside>
            <div class="avatar-group -space-x-6 rtl:space-x-reverse">
                <div class="avatar">
                    <div class="w-12">
                        <img src="{{ !empty($konten->logo_sekolah) ? asset('storage/'.$konten->logo_sekolah) : asset('image/null.png') }}"
                            class="h-5 w-5" alt="logo_sekolah">
                    </div>
                </div>
            </div>
            <path
                d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
            </path>
            </svg>
            <p>
                {!! empty($konten->alamat_sekolah) ? '
            <p class="text-red-500 italic">$NULL</p>' : $konten->alamat_sekolah !!}
            </p>
        </aside>
        <nav>
            <h6 class="footer-title">Jelajah</h6>
            <a href="/" class="link link-hover">Sambutan</a>
            <a href="/guest/profile" class="link link-hover">Profil Sekolah</a>
            <a href="/guest/berita" class="link link-hover">Berita</a>
            <a href="/guest/galeri-foto" class="link link-hover">Galeri</a>
        </nav>
        <nav>
            <h6 class="footer-title">Halaman Umum</h6>
            <a href="/guest/direktori-guru" class="link link-hover">Data Guru</a>
            <a href="/guest/ppdb" class="link link-hover">PPDB SMK</a>
            <a href="/guest/ppdb" class="link link-hover">Panduan PPDB</a>
            <a href="/guest/media-sosial" class="link link-hover">Lokasi</a>
            <a href="/guest/media-sosial" class="link link-hover">Kontak</a>
        </nav>
        <nav>
            <h6 class="footer-title">Media Sosial</h6>
            <ul class="flex gap-4">
                <li>
                    <a href="{{ $medsos->facebook ?? '-' }}" class="link link-hover">
                        <button class="btn btn-outline hover:bg-transparent">
                            <i class="fa-brands fa-facebook text-2xl"></i>
                        </button>
                    </a>
                </li>
                <li>
                    <a href="{{ $medsos->instagram ?? '-'  }}" class="link link-hover">
                        <button class="btn btn-outline hover:bg-transparent">
                            <i class="fa-brands fa-instagram text-2xl"></i>
                        </button>
                    </a>
                </li>
                <li>
                    <a href="{{ $medsos->youtube ?? '-'  }}" class="link link-hover">
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
@include('script.slider')
@include('script.carousel')
@include('script.loader')

</html>