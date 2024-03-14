<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/script.js') }}"></script>
    <style>
    .overflow-y-auto::-webkit-scrollbar {
        display: none;
    }
    </style>
    <title>SMK Muhammadiyah Plus Kota Batam | {{ $title }}</title>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar bg-transparent fixed top-0 z-40" id="navbar">
        <div class="navbar-start lg:hidden">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li class="@if($title == 'Home') bg-celadon rounded-md @endif"><a href="/">Beranda</a></li>
                    <li class="@if($title == 'Profile') bg-celadon rounded-md @endif"><a href="/profile">Profile
                            Sekolah</a></li>
                    <li><a>PPDB</a></li>
                    <li>
                        <details>
                            <summary>Direktori</summary>
                            <ul class="p-2">
                                <li class="text-black"><a>Guru</a></li>
                                <li class="text-black"><a>Jumlah Siswa</a></li>
                                <li class="text-black"><a>Data Ruang Kelas</a></li>
                                <li class="text-black"><a>Data Tenaga Pendidik & Kependidikan</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Galeri</summary>
                            <ul class="p-2">
                                <li><a>Foto</a></li>
                                <li><a>Video</a></li>
                            </ul>
                        </details>
                    </li>
                    <li><a>Sarana & Prasarana</a></li>
                    <li><a>Prestasi Siswa</a></li>
                    <li><a>Berita</a></li>
                    <li><a>Ekstrakulikuler</a></li>
                    <li><a>Media Sosial</a></li>
                </ul>
            </div>
        </div>
        <div class="grid grid-cols-7 gap-1 w-full lg:place-items-center place-items-end">
            <div class="lg:col-span-1 col-end-7">
                <div
                    class="avatar-group -space-x-6 rtl:space-x-reverse flex translate-x-7 items-center md:ml-auto sm:ml-0">
                    <div class="avatar lg:mx-auto">
                        <div class="w-12">
                            <img src="..." alt="Logo" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-6 w-full font-bold hidden lg:flex" id="nav-text">
                <ul class="menu menu-horizontal px-1">
                    <li class="@if($title == 'Home') bg-celadon rounded-md @endif"><a href="/">Beranda</a></li>
                    <li class="@if($title == 'Profile') bg-celadon rounded-md @endif"><a href="/profile">Profile
                            Sekolah</a></li>
                    <li><a>PPDB</a></li>
                    <li>
                        <details>
                            <summary>Direktori</summary>
                            <ul class="p-2">
                                <li class="text-black"><a>Guru</a></li>
                                <li class="text-black"><a>Jumlah Siswa</a></li>
                                <li class="text-black"><a>Data Ruang Kelas</a></li>
                                <li class="text-black"><a>Data Tenaga Pendidik & Kependidikan</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>Galeri</summary>
                            <ul class="p-2">
                                <li class="text-black"><a>Foto</a></li>
                                <li class="text-black"><a>Video</a></li>
                            </ul>
                        </details>
                    </li>
                    <li><a>Sarana & Prasarana</a></li>
                    <li><a>Prestasi Siswa</a></li>
                    <li><a>Berita</a></li>
                    <li><a>Ekstrakulikuler</a></li>
                    <li><a>Media Sosial</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navbar -->

    <!-- Carousel -->
    <div class="flex justify-center items-center">
        <div class="carousel w-full h-[50vh] relative overflow-hidden">
            <div id="slide1" class="carousel-item relative w-full">
                <img src="https://daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg"
                    class="w-full transition-transform duration-500 transform" />
            </div>
            <div id="slide2" class="carousel-item relative w-full hidden">
                <img src="https://daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg"
                    class="w-full transition-transform duration-500 transform" />
            </div>
            <div id="slide3" class="carousel-item relative w-full hidden">
                <img src="https://daisyui.com/images/stock/photo-1414694762283-acccc27bca85.jpg"
                    class="w-full transition-transform duration-500 transform" />
            </div>
            <div id="slide4" class="carousel-item relative w-full hidden">
                <img src="https://daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.jpg"
                    class="w-full transition-transform duration-500 transform" />
            </div>
        </div>
    </div>
    <!-- Carousel -->

    <!-- Main -->
    <div class="container  mx-auto h-max w-11/12 my-10">
        @yield('Main')
    </div>
    <!-- Main -->

    <!-- Footer -->
    <footer class="footer p-10 bg-base-200 text-base-content bottom-0">
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
            <a class="link link-hover">Terms of use</a>
            <a class="link link-hover">Privacy policy</a>
            <a class="link link-hover">Cookie policy</a>
        </nav>
    </footer>
    <!-- Footer -->

</body>

</html>