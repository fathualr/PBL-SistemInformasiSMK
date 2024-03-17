@extends('layouts.main')

@section('Main')

<div class="mx-auto bg-white rounded-md ">
    <!-- Informasi PPDB -->
    <div class="divider">
        <h4 class="font-bold">INFORMASI PPDB</h4>
    </div>
    <span>Lorem Ipsum is placeholder text commonly used in the design and typesetting industry. It's derived from sections of a Latin text by Cicero, written in 45 BC, titled "de Finibus Bonorum et Malorum" (On the Ends of Goods and Evils). The Lorem Ipsum text, however, is not a coherent or meaningful passage. Instead, it consists of scrambled Latin words, making it ideal for demonstrating the visual presentation of textual elements such as font, typography, and layout without the distraction of meaningful content. It's often used in graphic design, web design, and typesetting as a placeholder until the final content is available.</span>
    <!-- ALur PPDB -->
    <div class="divider">
        <h4 class="font-bold">ALUR PPDB</h4>
    </div>
    <div>
        <ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical">
            <li>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-start md:text-end mb-10">
                    <time class="font-mono italic">1984</time>
                    <div class="text-lg font-black">Pendaftaran</div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab consectetur maiores doloribus architecto repudiandae aliquid, alias maxime quasi deleniti sapiente omnis harum nisi quisquam natus nulla eaque optio sed pariatur.
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-end mb-10">
                    <time class="font-mono italic">1998</time>
                    <div class="text-lg font-black">Verifikasi Dokumen</div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis explicabo error excepturi officiis veritatis blanditiis hic, iste eius reiciendis pariatur incidunt omnis itaque, accusamus porro sit sapiente! Ullam, rerum nam!
                    Aperiam suscipit quibusdam sunt minima pariatur omnis doloribus magni tempore? Esse asperiores sit sequi omnis laudantium dolorem, magnam possimus officia necessitatibus nemo unde, excepturi voluptatum dolore consectetur, non veritatis! Recusandae?
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-start md:text-end mb-10">
                    <time class="font-mono italic">2001</time>
                    <div class="text-lg font-black">Pengumuman Hasil</div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe doloribus dolorem veritatis perspiciatis animi dolores inventore ad quis corrupti. Ullam error facere earum nobis exercitationem totam, dolorum quod necessitatibus voluptates!
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-end mb-10">
                    <time class="font-mono italic">2007</time>
                    <div class="text-lg font-black">Daftar Ulang</div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, deserunt. Repellendus quisquam aliquam asperiores! Maxime nesciunt asperiores praesentium magnam. Illum nesciunt quae distinctio ab, neque iusto quidem alias provident deserunt?
                </div>
                <hr />
            </li>
        </ul>
    </div>
    <!-- Form PPDB -->
    <div class="divider">
        <h4 class="font-bold">FORM PPDB</h4>
    </div>
    <form action="/ppdb" method="GET">
        @csrf
        <div class="space-y-4 my-5">
            <!-- Data Siswa -->
            <div class=" bg-elm py-1">
                <h2 class="text-white font-bold ml-2 mt-2 mb-2">Data Siswa</h2>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="nama_lengkap" class="block font-medium ml-2">Nama Lengkap</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="input input-bordered w-full" placeholder="Nama Lengkap">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="jenis_kelamin" class="block font-medium ml-2">Jenis Kelamin</label>
                </div>
                <div class="col-span-8">
                    <select id="jenis_kelamin" name="jenis_kelamin" class="select select-bordered w-full">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="nisn" class="block font-medium ml-2">NISN</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="nisn" name="nisn" class="input input-bordered w-full" placeholder="NISN">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="agama" class="block font-medium ml-2">Agama</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="agama" name="agama" class="input input-bordered w-full" placeholder="Agama">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="tempat_lahir" class="block font-medium ml-2">Tempat Lahir</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="input input-bordered w-full" placeholder="Tempat Lahir">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="tanggal_lahir" class="block font-medium ml-2">Tanggal Lahir</label>
                </div>
                <div class="col-span-8 ">
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="input input-bordered w-full" placeholder="Tanggal Lahir">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="tanggal_lahir" class="block font-medium ml-2">No Telepon</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="no_telepon" name="no_telepon" class="input input-bordered w-full" placeholder="No Telepon">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="pilihan_1" class="block font-medium ml-2">Pilihan 1</label>
                </div>
                <div class="col-span-8">
                    <select id="pilihan_1" name="pilihan_1" class="select select-bordered w-full">
                        <option value="...">Teknik Komputer & Jaringan</option>
                        <option value="...">Rekayasa Perangkat Lunak</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="pilihan_2" class="block font-medium ml-2">Pilihan 2</label>
                </div>
                <div class="col-span-8">
                    <select id="pilihan_2" name="pilihan_2" class="select select-bordered w-full">
                        <option value="...">Teknik Komputer & Jaringan</option>
                        <option value="...">Rekayasa Perangkat Lunak</option>
                    </select>
                </div>
            </div>
            <!-- Data Sekolah -->
            <div class=" bg-elm py-1">
                <h2 class="text-white font-bold ml-2 mt-2 mb-2">Data Sekolah</h2>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="nama_sekolah_asal" class="block font-medium ml-2">Nama Sekolah Asal</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="nama_sekolah_asal" name="nama_sekolah_asal" class="input input-bordered w-full" placeholder="Nama Sekolah Asal">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="kota_sekolah_asal" class="block font-medium ml-2">Kota Sekolah Asal</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="kota_sekolah_asal" name="kota_sekolah_asal" class="input input-bordered w-full" placeholder="Kota Sekolah Asal">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="alamat" class="block font-medium ml-2">Alamat</label>
                </div>
                <div class="col-span-8 ">
                    <textarea id="alamat" name="alamat" class="textarea textarea-bordered w-full" placeholder="Alamat"></textarea>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="no_rt" class="block font-medium ml-2">No. RT</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="no_rt" name="no_rt" class="input input-bordered w-full" placeholder="No. RT">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="no_rw" class="block font-medium ml-2">No. RW</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="no_rw" name="no_rw" class="input input-bordered w-full" placeholder="No. RW">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="kelurahan" class="block font-medium ml-2">Kelurahan</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="kelurahan" name="kelurahan" class="input input-bordered w-full" placeholder="Kelurahan">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="kecamatan" class="block font-medium ml-2">Kecamatan</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="kecamatan" name="kecamatan" class="input input-bordered w-full" placeholder="Kecamatan">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="kota" class="block font-medium ml-2">Kota</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="kota" name="kota" class="input input-bordered w-full" placeholder="Kota">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="provinsi" class="block font-medium ml-2">Provinsi</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="provinsi" name="provinsi" class="input input-bordered w-full" placeholder="Provinsi">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="kode_pos" class="block font-medium ml-2">Kode Pos</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="kode_pos" name="kode_pos" class="input input-bordered w-full" placeholder="Kode Pos">
                </div>
            </div>
            <!-- Data Wali -->
            <div class=" bg-elm py-1">
                <h2 class="text-white font-bold ml-2 mt-2 mb-2">Data Wali</h2>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="nama_wali" class="block font-medium ml-2">Nama Wali</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="nama_wali" name="nama_wali" class="input input-bordered w-full" placeholder="Nama Wali">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="agama_wali" class="block font-medium ml-2">Agama Wali</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="agama_wali" name="agama_wali" class="input input-bordered w-full" placeholder="Agama Wali">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="tempat_lahir_wali" class="block font-medium ml-2">Tempat Lahir Wali</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="tempat_lahir_wali" name="tempat_lahir_wali" class="input input-bordered w-full" placeholder="Tempat Lahir Wali">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="tanggal_lahir_wali" class="block font-medium ml-2">Tanggal Lahir Wali</label>
                </div>
                <div class="col-span-8 ">
                    <input type="date" id="tanggal_lahir_wali" name="tanggal_lahir_wali" class="input input-bordered w-full">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="pekerjaan_wali" class="block font-medium ml-2">Pekerjaan Wali</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="pekerjaan_wali" name="pekerjaan_wali" class="input input-bordered w-full" placeholder="Pekerjaan Wali">
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <label for="penghasilan_wali" class="block font-medium ml-2">Penghasilan Wali</label>
                </div>
                <div class="col-span-8 ">
                    <input type="text" id="penghasilan_wali" name="penghasilan_wali" class="input input-bordered w-full" placeholder="Penghasilan Wali">
                </div>
            </div>
            <div class="flex justify-center">
                <button class="btn btn-success w-40 my-5">Kirim</button>
            </div>
        </div>
    </form>
</div>
@endsection