<?php

use App\Data;
use App\BobotParameter;
use App\NilaiKlasifikasi;
use App\NilaiAspirasi;


function MunculinParameterNilai($kriteria, $mahasiswa)
{
    $datas = NilaiAspirasi::where('kriteria_aspirasi_id', $kriteria)->where('mahasiswa_id', $mahasiswa)->first();
    return @$datas->nilai;
}
