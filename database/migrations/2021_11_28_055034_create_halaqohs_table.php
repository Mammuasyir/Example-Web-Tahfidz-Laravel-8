<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalaqohsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halaqohs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenjang_id')->nullable();
            $table->foreignId('kelas_id')->nullable();
            $table->string('nama_halaqoh');
            $table->string('nama_guru');
            $table->string('slug');
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
        Schema::dropIfExists('halaqohs');
    }
}
