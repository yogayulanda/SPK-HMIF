<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaAspirasi extends Model
{
    protected $table = 'kriteria_aspirasi';
    protected $fillable = ['nama_kriteria', 'bobot_kriteria'];


}
