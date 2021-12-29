<?php

use Illuminate\Database\Migrations\Migration;
use MStaack\LaravelPostgis\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarUsaha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_usaha', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_usaha');
            $table->string('jenis_usaha');
            $table->string('alamat');
            $table->string('ltg'); 
            $table->string('bjr');             
            $table->point('koordinat', 'GEOMETRY', 4326);
            $table->decimal('telp', 15, 0);
            $table->string('jam_operasional');
            $table->string('deskripsi');
            $table->string('foto');            
            $table->integer('fk_usaha_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_usaha');
    }
}
