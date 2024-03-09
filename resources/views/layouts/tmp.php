<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/script.js')
    <title>SMK Muhammadiyah Plus Kota Batam | Home</title>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar bg-transparent fixed top-0 z-40" id="navbar">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Beranda</a></li>
                    <li><a>Profile Sekolah</a></li>
                    <li><a>PPDB</a></li>
                    <li><a>Direktori</a></li>
                    <li><a>Galeri</a></li>
                    <li><a>Sarana & Prasarana</a></li>
                    <li><a>Prestasi Siswa</a></li>
                    <li><a>Berita</a></li>
                    <li><a>Ekstrakulikuler</a></li>
                    <li><a>Media Sosial</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl md:navbar-end sm:flex-none sm:content-end">
                <div class="avatar-group -space-x-6 rtl:space-x-reverse flex items-center md:ml-auto sm:ml-0">
                    <div class="avatar">
                        <div class="w-12">
                            <img src="..." alt="Logo" />
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="navbar-center block md:hidden sm:hidden lg:flex -translate-x-28 font-bold" id="nav-text">
            <ul class="menu menu-horizontal px-1">
                <li class="bg-celadon rounded-md"><a>Beranda</a></li>
                <li><a>Profile Sekolah</a></li>
                <li><a>PPDB</a></li>
                <li><a>Direktori</a></li>
                <li><a>Galeri</a></li>
                <li><a>Sarana & Prasarana</a></li>
                <li><a>Prestasi Siswa</a></li>
                <li><a>Berita</a></li>
                <li><a>Ekstrakulikuler</a></li>
                <li><a>Media Sosial</a></li>
            </ul>
        </div>
        <div class="navbar-end hidden">
            <a class="btn">Button</a>
        </div>
    </div>
    <!-- Navbar -->

    <!-- Carousel -->
    <div class="carousel w-full">
        <div id="slide1" class="carousel-item relative w-full">
            <img src="https://daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide4" class="btn btn-circle">❮</a>
                <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide2" class="carousel-item relative w-full">
            <img src="https://daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide1" class="btn btn-circle">❮</a>
                <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide3" class="carousel-item relative w-full">
            <img src="https://daisyui.com/images/stock/photo-1414694762283-acccc27bca85.jpg" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide2" class="btn btn-circle">❮</a>
                <a href="#slide4" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide4" class="carousel-item relative w-full">
            <img src="https://daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.jpg" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide3" class="btn btn-circle">❮</a>
                <a href="#slide1" class="btn btn-circle">❯</a>
            </div>
        </div>
    </div>
    <!-- Carousel -->

    <!-- Main -->
    <div class="container bg-blue-800 mx-auto h-96 w-11/12 my-10">
        @yield('main')
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