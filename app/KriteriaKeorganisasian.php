<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaKeorganisasian extends Model
{
    protected $table = 'kriteria_keorganisasian';
    protected $fillable = ['nama_kriteria', 'bobot_kriteria'];
}
