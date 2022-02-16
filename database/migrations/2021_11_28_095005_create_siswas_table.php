<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenjang_id')->nullable();
            $table->foreignId('kelas_id')->nullable();
            $table->foreignId('halaqoh_id')->nullable();
            $table->string('nama_siswa');
            $table->text('total_hafalan')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('siswas');
    }
}
