<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('username')->Unique();
            $table->string('password');
            $table->string('nama');
            $table->enum('role', ['Master Admin', 'Admin Konten', 'Admin PPDB']);
            $table->enum('status', ['Online', 'Offline']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema ::create('direktoriPegawai', function (Blueprint $table){
            $table->id('id_pegawai');
            $table->string('nama_pegawai');
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->date('tempat_tanggal_lahir');
            $table->string('gambar');
            $table->longText('alamat_pegawai');
            $table->integer('nik_pegawai')->Unique();
            $table->string('jabatan_pegawai');
            $table->char('no_hp_pegawai');
            $table->string('email_pegawai');
            $table->enum('status_pegawai', ['Aktif', 'Tidak Aktif', 'Cuti', 'Resign', 'Pensiun', 'Kontrak']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema ::create('programKeahlian', function(Blueprint $table){
            $table->id('id_program');
            $table->string('nama_program');
            $table->string('logo_program');
            $table->longtext('deskripsi_program');
            $table->longtext('visi_program');
            $table->longtext('misi_program');
            $table->longtext('tujuan_program');
            $table->longtext('sasaran_program');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema ::create('capaianPembelajaran', function(Blueprint $table){
            $table->id('id_capaian_pembelajaran');
            $table->unsignedBigInteger('id_program');
            $table->foreign('id_program')->references('id_program')->on('programKeahlian');
            $table->longText('deskripsi_capaian_pembelajaran');
            $table->longText('aspek_sikap');
            $table->longText('aspek_pengetahuan');
            $table->longText('aspek_keterampilan_umum');
            $table->longText('aspek_keterampilan_khusus');            
            $table->rememberToken();
            $table->timestamps();
        });

        Schema ::create('peluangKerja', function(Blueprint $table){
            $table->id('id_peluang_kerja');
            $table->unsignedBigInteger('id_program');
            $table->foreign('id_program')->references('id_program')->on('programKeahlian');
            $table->longText('peluang_kerja');
        });

        Schema ::create('direktoriGuru', function(Blueprint $table){
            $table->id('id_guru');
            $table->string('nama_guru');
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->date('tempat_tanggal_lahir');
            $table->string('gambar');
            $table->longText('alamat_guru');
            $table->integer('nip_guru')->Unique();
            $table->string('jabatan_guru');
            $table->char('no_hp_guru');
            $table->string('email_guru');
            $table->enum('status_guru', ['Aktif', 'Tidak Aktif', 'Cuti', 'Resign', 'Pensiun', 'Kontrak']);
            $table->unsignedBigInteger('id_program');
            $table->foreign('id_program')->references('id_program')->on('programKeahlian');
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};