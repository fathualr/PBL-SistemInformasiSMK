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

        // Schema untuk tabel admin
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama');
            $table->string('role');
            $table->timestamps();
        });

        // Schema untuk tabel konten_website
        Schema::create('konten_website', function (Blueprint $table) {
            $table->id('id_sekolah');
            $table->string('nama_sekolah')->notNullable();
            $table->string('logo_sekolah')->nullable();
            $table->string('alamat_sekolah')->notNullable();
            $table->string('no_telepon_sekolah')->notNullable();
            $table->string('email_sekolah')->notNullable();
            $table->text('sejarah')->notNullable();
            $table->text('sambutan')->notNullable();
            $table->text('visi')->notNullable();
            $table->text('misi')->notNullable();
            $table->enum('status_akreditasi_sekolah', ['Belum Terakreditasi', 'Akreditasi A', 'Akreditasi B', 'Akreditasi C'])->notNullable(); // Pilihan untuk sekolah swasta
            $table->text('struktur_organisasi_sekolah')->notNullable();
            $table->string('status_kepemilikan_tanah')->notNullable();
            $table->string('tahun_didirikan')->notNullable();
            $table->string('tahun_operasional')->notNullable();
            $table->string('no_statistik_sekolah')->notNullable();
            $table->string('fasilitas_lainnya')->notNullable();
            $table->string('luas_tanah')->notNullable();
            $table->string('nama_kepala_sekolah')->notNullable();
            $table->string('no_sertifikat')->notNullable();
            $table->string('no_pendirian_sekolah')->notNullable();
            $table->string('status_kepemilikan_bangunan')->notNullable();
            $table->string('sisa_lahan_seluruhnya')->notNullable();
            $table->string('luas_lahan_keseluruhan')->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel media_sosial
        Schema::create('media_sosial', function (Blueprint $table) {
            $table->id('id_media_sosial');
            $table->string('nomor_telepon');
            $table->string('fax');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('youtube');
            $table->string('tiktok');
            $table->string('email');
            $table->string('google_map');
            $table->timestamps();
        });

        // Schema untuk tabel konten_ppdb
        Schema::create('konten_ppdb', function (Blueprint $table) {
            $table->id('id_ppdb');
            $table->text('deskripsi_ppdb')->nullable();
            $table->timestamps();
        });

        // Schema untuk tabel alur_ppdb
        Schema::create('alur_ppdb', function (Blueprint $table) {
            $table->id('id_alur');
            $table->date('tanggal_alur');
            $table->text('deskripsi_alur')->nullable();
            $table->timestamps();
        });

        // Schema untuk tabel sejarah_sekolah
        Schema::create('sejarah_sekolah', function (Blueprint $table) {
            $table->id('id_sejarah');
            $table->text('deskripsi_sejarah')->nullable();
            $table->date('tanggal_sejarah')->nullable();
            $table->string('gambar_sejarah')->nullable();
            $table->timestamps();
        });

        // Schema untuk tabel program_keahlian
        Schema::create('program_keahlian', function (Blueprint $table) {
            $table->id('id_program');
            $table->string('nama_program')->notNullable();
            $table->string('logo_program')->nullable();
            $table->text('deskripsi_program')->nullable();
            $table->text('visi_program')->nullable();
            $table->text('misi_program')->nullable();
            $table->text('tujuan_program')->nullable();
            $table->text('sasaran_program')->nullable();
            $table->timestamps();
        });

        // Schema untuk tabel direktori_pegawai
        Schema::create('direktori_pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama_pegawai')->notNullable();
            $table->string('nik_pegawai')->unique()->notNullable();
            $table->string('jabatan_pegawai')->notNullable();
            $table->date('TTL_pegawai')->notNullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Wanita'])->nullable();
            $table->string('no_hp_pegawai')->notNullable();
            $table->string('alamat_pegawai')->notNullable();
            $table->string('gambar_pegawai')->nullable();
            $table->enum('status_pegawai', ['Aktif', 'Cuti', 'Pensiun', 'Resign'])->notNullable();
            $table->string('email_pegawai')->unique()->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel direktori_alumni
        Schema::create('direktori_alumni', function (Blueprint $table) {
            $table->id('id_alumni');
            $table->string('nama_alumni')->notNullable();
            $table->string('no_hp_alumni')->notNullable();
            $table->enum('jenis_kelamin_alumni', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->date('TTL_alumni')->nullable();
            $table->unsignedSmallInteger('tahun_kelulusan_alumni')->nullable();
            $table->string('gambar_alumni')->nullable();
            $table->string('alamat_alumni')->nullable();
            $table->timestamps();
        });

        // Schema untuk tabel direktori_siswa
        Schema::create('direktori_siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->unsignedBigInteger('id_program')->notNullable();
            $table->string('nama_siswa')->notNullable();
            $table->string('nisn_siswa')->unique()->notNullable();
            $table->enum('jenis_kelamin_siswa', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->date('TTL_siswa')->nullable();
            $table->string('kelas_siswa')->nullable();
            $table->unsignedSmallInteger('tahun_angkatan_siswa')->nullable();
            $table->string('gambar_siswa')->nullable();
            $table->timestamps();

            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });

        // Schema untuk tabel direktori_guru
        Schema::create('direktori_guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->unsignedBigInteger('id_program')->notNullable();
            $table->string('nama_guru')->notNullable();
            $table->string('nik_guru')->unique()->notNullable();
            $table->string('jabatan_guru')->notNullable();
            $table->date('TTL_guru')->notNullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Wanita'])->nullable();
            $table->string('no_hp_guru')->notNullable();
            $table->string('alamat_guru')->notNullable();
            $table->string('gambar_guru')->nullable();
            $table->enum('status_guru', ['Aktif', 'Cuti', 'Pensiun', 'Resign'])->notNullable();
            $table->string('email_guru')->unique()->notNullable();
            $table->timestamps();

            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });

        // Schema untuk tabel form_ppdb
        Schema::create('form_ppdb', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->unsignedBigInteger('id_program')->notNullable();
            $table->string('nama_lengkap')->notNullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->notNullable();
            $table->string('nisn')->notNullable();
            $table->string('agama')->notNullable();
            $table->date('TTL')->notNullable();
            $table->string('no_hp')->notNullable();
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
            $table->date('TTL_wali')->notNullable();
            $table->string('pekerjaan_wali')->notNullable();
            $table->string('penghasilan_wali')->notNullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });

        // Schema untuk tabel pengumuman_ppdb
        Schema::create('pengumuman_ppdb', function (Blueprint $table) {
            $table->id('id_pengumuman');
            $table->unsignedBigInteger('id_pendaftaran')->notNullable();
            $table->string('bukti_daftar_ulang')->nullable();
            $table->enum('status', ['Diterima', 'Ditolak', 'Dalam Proses'])->notNullable()->default('Dalam Proses');
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('form_ppdb')->onDelete('cascade');
        });

        // Schema untuk tabel dokumen_ppdb
        Schema::create('dokumen_ppdb', function (Blueprint $table) {
            $table->id('id_dokumen');
            $table->unsignedBigInteger('id_pendaftaran')->notNullable();
            $table->string('tautan_dokumen')->notNullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('form_ppdb')->onDelete('cascade');
        });

        // Schema untuk tabel capaian_pembelajaran
        Schema::create('capaian_pembelajaran', function (Blueprint $table) {
            $table->id('id_capaian_pembelajaran');
            $table->unsignedBigInteger('id_program')->notNullable();
            $table->text('capaian')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });

        // Schema untuk tabel peluang_kerja
        Schema::create('peluang_kerja', function (Blueprint $table) {
            $table->id('id_peluang_kerja');
            $table->unsignedBigInteger('id_program')->notNullable();
            $table->text('peluang_kerja')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });

        // Schema untuk tabel ekstrakurikuler
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

        // Schema untuk tabel gambar_ekstrakurikuler
        Schema::create('gambar_ekstrakurikuler', function (Blueprint $table) {
            $table->id('id_gambar_ekstrakurikuler');
            $table->unsignedBigInteger('id_ekstrakurikuler');
            $table->string('gambar_ekstrakurikuler')->nullable();
            $table->timestamps();

            $table->foreign('id_ekstrakurikuler')->references('id_ekstrakurikuler')->on('ekstrakurikuler')->onDelete('cascade');
        });

        // Schema untuk tabel prestasi_siswa
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

        // Schema untuk tabel gambar_prestasi
        Schema::create('gambar_prestasi', function (Blueprint $table) {
            $table->id('id_gambar');
            $table->unsignedBigInteger('id_prestasi')->notNullable();
            $table->foreign('id_prestasi')->references('id_prestasi')->on('prestasi_siswa')->onDelete('cascade');
            $table->string('gambar')->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel umpan_balik
        Schema::create('umpan_balik', function (Blueprint $table) {
            $table->id('id_pesan');
            $table->string('nama_penulis')->notNullable();
            $table->string('email_penulis')->notNullable();
            $table->string('judul_pesan')->notNullable();
            $table->text('deskripsi_pesan')->notNullable();
            $table->timestamp('tanggal_unggah_pesan')->useCurrent();
            $table->timestamps();
        });

        // Schema untuk tabel fasilitas
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id('id_fasilitas');
            $table->unsignedBigInteger('id_gedung')->nullable();
            $table->foreign('id_gedung')->references('id_gedung')->on('gedung')->onDelete('cascade');
            $table->string('nama_fasilitas')->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel lapangan
        Schema::create('lapangan', function (Blueprint $table) {
            $table->id('id_lapangan');
            $table->unsignedBigInteger('id_prasarana')->notNullable();
            $table->foreign('id_prasarana')->references('id_prasarana')->on('prasarana')->onDelete('cascade');
            $table->string('ukuran_lapangan')->notNullable();
            $table->enum('jenis_lapangan', ['Futsal', 'Basket', 'Tenis', 'Voli', 'Badminton'])->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel fasilitas
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id('id_fasilitas');
            $table->unsignedBigInteger('id_gedung')->nullable();
            $table->foreign('id_gedung')->references('id_gedung')->on('gedung')->onDelete('cascade');
            $table->string('nama_fasilitas')->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel album
        Schema::create('album', function (Blueprint $table) {
            $table->id('id_album');
            $table->string('nama_album')->notNullable();
            $table->enum('tipe_album', ['Foto', 'Video'])->notNullable();
            $table->text('deskripsi_album')->notNullable();
            $table->date('tanggal_unggah')->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel foto
        Schema::create('foto', function (Blueprint $table) {
            $table->id('id_foto');
            $table->unsignedBigInteger('id_album')->notNullable();
            $table->foreign('id_album')->references('id_album')->on('album')->onDelete('cascade');
            $table->string('tautan_foto')->notNullable();
            $table->timestamps();

            // Index foreign key
            $table->index('id_album');
        });

        // Schema untuk tabel vidio
        Schema::create('vidio', function (Blueprint $table) {
            $table->id('id_video');
            $table->unsignedBigInteger('id_album')->notNullable();
            $table->foreign('id_album')->references('id_album')->on('album')->onDelete('cascade');
            $table->string('tautan_video')->notNullable();
            $table->timestamps();

            // Index foreign key
            $table->index('id_album');
        });

        // Schema untuk tabel berita
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita');
            $table->string('judul_berita')->notNullable();
            $table->text('isi_berita')->notNullable();
            $table->date('tanggal_berita')->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel kategori_berita
        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->unsignedBigInteger('berita_id');
            $table->foreign('berita_id')->references('id_berita')->on('berita')->onDelete('cascade');
            $table->string('nama_kategori')->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel gambar_berita
        Schema::create('gambar_berita', function (Blueprint $table) {
            $table->id('id_gambar');
            $table->unsignedBigInteger('berita_id');
            $table->foreign('berita_id')->references('id_berita')->on('berita')->onDelete('cascade');
            $table->string('tautan_gambar')->notNullable();
            $table->timestamps();
        });

        // Schema untuk tabel komentar_berita
        Schema::create('komentar_berita', function (Blueprint $table) {
            $table->id('id_komentar');
            $table->unsignedBigInteger('id_berita')->notNullable();
            $table->foreign('id_berita')->references('id_berita')->on('berita')->onDelete('cascade');
            $table->string('nama_komentar')->notNullable();
            $table->text('teks_komentar')->notNullable();
            $table->timestamp('waktu_komentar')->useCurrent();
            $table->timestamps();

            // Index foreign key
            $table->index('id_berita');
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
    }
};