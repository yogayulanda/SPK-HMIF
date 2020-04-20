<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaLitbangMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_litbang_mahasiswa', function (Blueprint $table) {
            $table->integer('mahasiswa_id');
            $table->integer('kriteria_litbang_id');
            $table->double('nilai');
            $table->double('nilai_bobot_kriteria');
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
        Schema::dropIfExists('kriteria_litbang_mahasiswa');
    }
}
