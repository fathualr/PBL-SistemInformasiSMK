<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel untuk admin
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama');
            $table->string('role');
            $table->timestamps();
        });

        // Tabel untuk konten_website
        Schema::create('konten_website', function (Blueprint $table) {
            $table->id('id_sekolah');
            $table->string('nama_sekolah')->nullable();
            $table->string('logo_sekolah')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->string('no_telepon_sekolah')->nullable();
            $table->string('email_sekolah')->nullable();
            $table->string('nama_kepala_sekolah')->nullable();
            $table->text('sejarah')->nullable();
            $table->string('tautan_video_sejarah')->nullable();
            $table->text('sambutan')->nullable();
            $table->string('tautan_video_sambutan')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('nis')->nullable();
            $table->enum('status_akreditasi_sekolah', ['Belum Terakreditasi', 'Akreditasi A', 'Akreditasi B', 'Akreditasi C'])->nullable();
            $table->text('struktur_organisasi_sekolah')->nullable();
            $table->string('status_kepemilikan_tanah')->nullable();
            $table->string('tahun_didirikan')->nullable();
            $table->string('tahun_operasional')->nullable();
            $table->string('no_statistik_sekolah')->nullable();
            $table->string('fasilitas_lainnya')->nullable();
            $table->string('luas_tanah')->nullable();
            $table->string('no_sertifikat')->nullable();
            $table->string('no_pendirian_sekolah')->nullable();
            $table->string('status_kepemilikan_bangunan')->nullable();
            $table->string('sisa_lahan_seluruhnya')->nullable();
            $table->string('luas_lahan_keseluruhan')->nullable();
            $table->text('teks_profile')->nullable();
            $table->text('teks_fasilitas')->nullable();
            $table->text('teks_lokasi')->nullable();
            $table->text('teks_sejarah')->nullable();
            $table->text('teks_prestasi')->nullable();
            $table->timestamps();
        });        

        // Tabel untuk media_sosial
        Schema::create('media_sosial', function (Blueprint $table) {
            $table->id('id_media_sosial');
            $table->string('nomor_telepon')->nullable();
            $table->string('fax')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('email')->nullable();
            $table->string('google_map')->nullable();
            $table->timestamps();
        });
        
        // Tabel untuk konten_ppdb
        Schema::create('informasi_ppdb', function (Blueprint $table) {
            $table->id('id_ppdb');
            $table->text('deskripsi_ppdb')->nullable();
            $table->timestamps();
        });

        // Tabel untuk alur_ppdb
        Schema::create('alur_ppdb', function (Blueprint $table) {
            $table->id('id_alur');
            $table->text('judul_alur');
            $table->date('tanggal_alur');
            $table->text('deskripsi_alur')->nullable();
            $table->timestamps();
        });

        // Tabel untuk sejarah_sekolah
        Schema::create('sejarah_sekolah', function (Blueprint $table) {
            $table->id('id_sejarah');
            $table->text('judul_sejarah')->nullable();
            $table->text('deskripsi_sejarah')->nullable();
            $table->date('tanggal_sejarah')->nullable();
            $table->string('gambar_sejarah')->nullable();
            $table->timestamps();
        });

        // Tabel untuk program_keahlian
        Schema::create('program_keahlian', function (Blueprint $table) {
            $table->id('id_program');
            $table->string('nama_program')->notNullable();
            $table->string('logo_program')->nullable();
            $table->text('deskripsi_program')->nullable();
            $table->text('deskripsi_peluang_kerja')->nullable();
            $table->text('visi_program')->nullable();
            $table->text('misi_program')->nullable();
            $table->text('tujuan_program')->nullable();
            $table->text('sasaran_program')->nullable();
            $table->timestamps();
        });

        // Tabel untuk direktori_pegawai
        Schema::create('direktori_pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama_pegawai')->notNullable();
            $table->string('nik_pegawai')->unique()->notNullable();
            $table->string('jabatan_pegawai')->notNullable();
            $table->date('TTL_pegawai')->notNullable();
            $table->string('tempat_lahir_pegawai')->notNullable();
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Wanita'])->nullable();
            $table->string('no_hp_pegawai')->notNullable();
            $table->string('alamat_pegawai')->notNullable();
            $table->string('gambar_pegawai')->nullable();
            $table->enum('status_pegawai', ['Aktif', 'Cuti', 'Pensiun', 'Resign'])->notNullable();
            $table->string('email_pegawai')->unique()->notNullable();
            $table->timestamps();
        });

        // Tabel untuk direktori_alumni
        Schema::create('direktori_alumni', function (Blueprint $table) {
            $table->id('id_alumni');
            $table->string('nama_alumni')->notNullable();
            $table->string('no_hp_alumni')->notNullable();
            $table->string('email_alumni')->notNullable();
            $table->enum('jenis_kelamin_alumni', ['Laki - Laki', 'Perempuan'])->nullable();
            $table->date('TTL_alumni')->nullable();
            $table->string('tempat_lahir_alumni')->notNullable();
            $table->unsignedSmallInteger('tahun_kelulusan_alumni')->nullable();
            $table->string('gambar_alumni')->nullable();
            $table->string('alamat_alumni')->nullable();
            $table->timestamps();
        });

        // Tabel untuk direktori_siswa
        Schema::create('direktori_siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->unsignedBigInteger('id_program')->notNullable();
            $table->string('nama_siswa')->notNullable();
            $table->string('nisn_siswa')->unique()->notNullable();
            $table->enum('jenis_kelamin_siswa', ['Laki - Laki', 'Perempuan'])->nullable();
            $table->string('no_hp_siswa')->notNullable();
            $table->date('TTL_siswa')->nullable();
            $table->string('tempat_lahir_siswa')->notNullable();
            $table->text('alamat_siswa')->notNullable();
            $table->string('kelas_siswa')->nullable();
            $table->unsignedSmallInteger('tahun_angkatan_siswa')->nullable();
            $table->string('gambar_siswa')->nullable();
            $table->timestamps();

            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });

        // Tabel untuk direktori_guru
        Schema::create('direktori_guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->unsignedBigInteger('id_program')->notNullable();
            $table->string('nama_guru')->notNullable();
            $table->string('nik_guru')->unique()->notNullable();
            $table->string('jabatan_guru')->notNullable();
            $table->date('TTL_guru')->notNullable();
            $table->string('tempat_lahir_guru')->notNullable();
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan'])->nullable();
            $table->string('no_hp_guru')->notNullable();
            $table->string('alamat_guru')->notNullable();
            $table->string('gambar_guru')->nullable();
            $table->enum('status_guru', ['Aktif', 'Cuti', 'Pensiun', 'Resign'])->notNullable();
            $table->string('email_guru')->unique()->notNullable();
            $table->timestamps();

            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });

        // Tabel untuk informasi pendaftaran siswa PPDB
        Schema::create('form_ppdb', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->unsignedBigInteger('id_program')->nullable();
            $table->string('nama_lengkap')->notNullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->notNullable();
            $table->string('nisn')->notNullable();
            $table->string('agama')->notNullable();
            $table->string('tempat_lahir')->notNullable();
            $table->date('tanggal_lahir')->notNullable();
            $table->string('no_hp')->notNullable();
            $table->string('pilihan_1')->notNullable();
            $table->string('pilihan_2')->notNullable();
            $table->string('nama_sekolah_asal')->notNullable();
            $table->string('alamat')->notNullable();
            $table->string('no_rt')->notNullable();
            $table->string('no_rw')->notNullable();
            $table->string('kelurahan')->notNullable();
            $table->string('kecamatan')->notNullable();
            $table->string('kota')->notNullable();
            $table->string('provinsi')->notNullable();
            $table->string('kode_pos')->notNullable();
            $table->string('nama_wali')->notNullable();
            $table->string('agama_wali')->notNullable();
            $table->string('alamat_wali')->notNullable();
            $table->string('no_hp_wali')->notNullable();
            $table->string('tempat_lahir_wali')->notNullable();
            $table->date('tanggal_lahir_wali')->notNullable();
            $table->string('pekerjaan_wali')->notNullable();
            $table->string('penghasilan_wali')->notNullable();
            $table->string('tautan_dokumen')->notNullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade')->nullable();
        });

        // Tabel untuk pengumuman hasil pendaftaran PPDB
        Schema::create('pengumuman_ppdb', function (Blueprint $table) {
            $table->id('id_pengumuman');
            $table->unsignedBigInteger('id_pendaftaran')->notNullable();
            $table->string('bukti_daftar_ulang')->nullable();
            $table->enum('status', ['Diterima', 'Ditolak', 'Dalam Proses'])->notNullable()->default('Dalam Proses');
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('form_ppdb')->onDelete('cascade');
        });

        // Tabel untuk capaian pembelajaran
        Schema::create('capaian_pembelajaran', function (Blueprint $table) {
            $table->id('id_capaian_pembelajaran');
            $table->unsignedBigInteger('id_program')->notNullable();
            $table->longText('deskripsi_capaian_pembelajaran');
            $table->longText('aspek_sikap');
            $table->longText('aspek_pengetahuan');
            $table->longText('aspek_keterampilan_umum');
            $table->longText('aspek_keterampilan_khusus');
            $table->text('capaian')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });

        // Tabel untuk peluang kerja
        Schema::create('peluang_kerja', function (Blueprint $table) {
            $table->id('id_peluang_kerja');
            $table->unsignedBigInteger('id_program')->notNullable();
            $table->text('peluang_kerja')->nullable();
            $table->text('deskripsi_pekerjaan')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });

        // Tabel untuk  ekstrakulikuler
        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->id('id_ekstrakurikuler');
            $table->unsignedBigInteger('id_guru')->notNullable();
            $table->string('nama_ekstrakurikuler')->notNullable();
            $table->text('deskripsi_ekstrakurikuler')->nullable();
            $table->string('tempat_ekstrakurikuler')->nullable();
            $table->string('jadwal_ekstrakurikuler')->nullable();
            $table->string('gambar_profil_ekstrakurikuler')->nullable();
            $table->timestamps();

            $table->foreign('id_guru')->references('id_guru')->on('direktori_guru')->onDelete('cascade');
        });

        // Tabel untuk gambar ekstrakurikuler
        Schema::create('gambar_ekstrakurikuler', function (Blueprint $table) {
            $table->id('id_gambar_ekstrakurikuler');
            $table->unsignedBigInteger('id_ekstrakurikuler');
            $table->string('gambar_ekstrakurikuler')->nullable();
            $table->timestamps();

            $table->foreign('id_ekstrakurikuler')->references('id_ekstrakurikuler')->on('ekstrakurikuler')->onDelete('cascade');
        });

        // Tabel untuk prestasi_siswa
        Schema::create('prestasi_siswa', function (Blueprint $table) {
            $table->id('id_prestasi');
            $table->string('nama_prestasi')->notNullable();
            $table->string('siswa_prestasi')->notNullable();
            $table->text('deskripsi_prestasi')->notNullable();
            $table->date('tanggal_prestasi')->notNullable();
            $table->enum('kategori_prestasi', ['Akademik', 'Olahraga', 'Seni', 'Lainnya'])->notNullable();
            $table->enum('tingkat_prestasi', ['Sekolah', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional'])->notNullable();
            $table->timestamps();
        });

        // Tabel untuk gambar_prestasi
        Schema::create('gambar_prestasi', function (Blueprint $table) {
            $table->id('id_gambar');
            $table->unsignedBigInteger('id_prestasi')->notNullable();
            $table->foreign('id_prestasi')->references('id_prestasi')->on('prestasi_siswa')->onDelete('cascade');
            $table->string('gambar')->notNullable();
            $table->timestamps();
        });

        // Tabel untuk umpan_balik
        Schema::create('umpan_balik', function (Blueprint $table) {
            $table->id('id_pesan');
            $table->string('nama_penulis')->notNullable();
            $table->string('email_penulis')->notNullable();
            $table->text('deskripsi_pesan')->notNullable();
            $table->timestamp('tanggal_unggah_pesan')->useCurrent();
            $table->timestamps();
        });

        // Tabel untuk prasarana
        Schema::create('prasarana', function (Blueprint $table) {
            $table->id('id_prasarana');
            $table->string('deskripsi_prasarana')->notNullable();
            $table->string('lokasi')->notNullable();
            $table->enum('status_prasarana', ['Aktif', 'Tidak Aktif', 'Perbaikan'])->notNullable();
            $table->timestamps();
        });

        // Tabel untuk gedung
        Schema::create('gedung', function (Blueprint $table) {
            $table->id('id_gedung');
            $table->unsignedBigInteger('id_prasarana')->notNullable();
            $table->foreign('id_prasarana')->references('id_prasarana')->on('prasarana')->onDelete('cascade');
            $table->integer('jumlah_lantai')->unsigned()->notNullable();
            $table->timestamps();
        });

        // Tabel untuk ruangan
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id('id_ruangan');
            $table->unsignedBigInteger('id_prasarana')->notNullable();
            $table->foreign('id_prasarana')->references('id_prasarana')->on('prasarana')->onDelete('cascade');
            $table->integer('kapasitas_ruangan')->unsigned()->notNullable();
            $table->timestamps();
        });

        // Tabel untuk lapangan
        Schema::create('lapangan', function (Blueprint $table) {
            $table->id('id_lapangan');
            $table->unsignedBigInteger('id_prasarana')->notNullable();
            $table->foreign('id_prasarana')->references('id_prasarana')->on('prasarana')->onDelete('cascade');
            $table->string('ukuran_lapangan')->notNullable();
            $table->enum('jenis_lapangan', ['Futsal', 'Basket', 'Tenis', 'Voli', 'Badminton'])->notNullable();
            $table->timestamps();
        });

        // Tabel untuk fasilitas
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id('id_fasilitas');
            $table->unsignedBigInteger('id_gedung')->nullable();
            $table->foreign('id_gedung')->references('id_gedung')->on('gedung')->onDelete('cascade');
            $table->string('nama_fasilitas')->notNullable();
            $table->timestamps();
        });

        // Tabel untuk album
        Schema::create('album', function (Blueprint $table) {
            $table->id('id_album');
            $table->string('nama_album')->notNullable();
            $table->string('gambar_album')->notNullable();
            $table->enum('tipe_album', ['Foto', 'Video'])->notNullable();
            $table->text('deskripsi_album')->notNullable();
            $table->date('tanggal_unggah')->notNullable();
            $table->timestamps();
        });

        // Tabel untuk foto
        Schema::create('foto', function (Blueprint $table) {
            $table->id('id_foto');
            $table->unsignedBigInteger('id_album')->notNullable();
            $table->foreign('id_album')->references('id_album')->on('album')->onDelete('cascade');
            $table->string('tautan_foto')->notNullable();
            $table->timestamps();

            // Index foreign key
            $table->index('id_album');
        });

        // Tabel untuk vidio
        Schema::create('video', function (Blueprint $table) {
            $table->id('id_video');
            $table->unsignedBigInteger('id_album')->notNullable();
            $table->foreign('id_album')->references('id_album')->on('album')->onDelete('cascade');
            $table->string('tautan_video')->notNullable();
            $table->timestamps();

            // Index foreign key
            $table->index('id_album');
        });

        // Tabel untuk berita
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita');
            $table->string('judul_berita')->notNullable();
            $table->text('isi_berita')->notNullable();
            $table->date('tanggal_berita')->notNullable();
            $table->string('gambar_headline')->notNullable();
            $table->timestamps();
        });

        // Tabel untuk kategori_berita
        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->unsignedBigInteger('berita_id');
            $table->foreign('berita_id')->references('id_berita')->on('berita')->onDelete('cascade');
            $table->string('nama_kategori')->notNullable();
            $table->timestamps();
        });

        // Tabel untuk gambar_berita
        Schema::create('gambar_berita', function (Blueprint $table) {
            $table->id('id_gambar');
            $table->unsignedBigInteger('berita_id');
            $table->foreign('berita_id')->references('id_berita')->on('berita')->onDelete('cascade');
            $table->string('tautan_gambar')->notNullable();
            $table->timestamps();
        });

        // Tabel untuk komentar_berita
        Schema::create('komentar_berita', function (Blueprint $table) {
            $table->id('id_komentar');
            $table->unsignedBigInteger('id_berita')->notNullable();
            $table->foreign('id_berita')->references('id_berita')->on('berita')->onDelete('cascade');
            $table->string('nama_komentar')->notNullable();
            $table->text('teks_komentar')->notNullable();
            // $table->timestamp('waktu_komentar')->useCurrent();
            $table->timestamps();

            // Index foreign key
            $table->index('id_berita');
        });

        // Tabel untuk carousel
        Schema::create('carousels', function (Blueprint $table) {
            $table->id('id_carousels');
            $table->string('image');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('admin');
        Schema::dropIfExists('konten_website');
        Schema::dropIfExists('media_sosial');
        Schema::dropIfExists('konten_ppdb');
        Schema::dropIfExists('alur_ppdb');
        Schema::dropIfExists('sejarah_sekolah');
        Schema::dropIfExists('gambar_ekstrakurikuler');
        Schema::dropIfExists('ekstrakurikuler');
        Schema::dropIfExists('direktori_guru');
        Schema::dropIfExists('direktori_pegawai');
        Schema::dropIfExists('direktori_siswa');
        Schema::dropIfExists('direktori_alumni');
        Schema::dropIfExists('peluang_kerja');
        Schema::dropIfExists('capaian_pembelajaran');
        Schema::dropIfExists('dokumen_ppdb');
        Schema::dropIfExists('pengumuman_ppdb');
        Schema::dropIfExists('form_ppdb');
        Schema::dropIfExists('program_keahlian');
        Schema::dropIfExists('gambar_prestasi');
        Schema::dropIfExists('prestasi_siswa');
        Schema::dropIfExists('umpan_balik');
        Schema::dropIfExists('fasilitas');
        Schema::dropIfExists('lapangan');
        Schema::dropIfExists('ruangan');
        Schema::dropIfExists('gedung');
        Schema::dropIfExists('prasarana');
        Schema::dropIfExists('album');
        Schema::dropIfExists('foto');
        Schema::dropIfExists('video');
        Schema::dropIfExists('komentar_berita');
        Schema::dropIfExists('gambar_berita');
        Schema::dropIfExists('kategori_berita');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('carousels');
    }
};