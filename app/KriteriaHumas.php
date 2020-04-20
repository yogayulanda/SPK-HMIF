<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaHumas extends Model
{
    protected $table = 'kriteria_humas';
    protected $fillable = ['nama_kriteria', 'bobot_kriteria'];
}
