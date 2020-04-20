<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaLitbang extends Model
{
    protected $table = 'kriteria_litbang';
    protected $fillable = ['nama_kriteria', 'bobot_kriteria'];

public function Mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class);
    }
}

