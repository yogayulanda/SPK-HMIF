<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaAspirasiMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_aspirasi_mahasiswa', function (Blueprint $table) {
            $table->Integer('mahasiswa_id')->unsigned();
            $table->unsignedInteger('kriteria_aspirasi_id')->unsigned();
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
        Schema::dropIfExists('kriteria_aspirasi_mahasiswa');
    }
}
