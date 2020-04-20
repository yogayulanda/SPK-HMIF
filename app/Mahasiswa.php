<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama_mahasiswa', 'nim', 'kelas', 'jenis_kelamin'];

    public function KriteriaAspirasi()
    {
        return $this->belongsToMany(KriteriaAspirasi::class)->withPivot('nilai', 'nilai_bobot_kriteria')->withTimestamps();
    }

    public function KriteriaLitbang()
    {
        return $this->belongsToMany(KriteriaLitbang::class)->withPivot('nilai', 'nilai_bobot_kriteria')->withTimestamps();
    }

    public function KriteriaHumas()
    {
        return $this->belongsToMany(KriteriaHumas::class)->withPivot('nilai', 'nilai_bobot_kriteria')->withTimestamps();
    }

    public function KriteriaKeorganisasian()
    {
        return $this->belongsToMany(KriteriaKeorganisasian::class)->withPivot('nilai', 'nilai_bobot_kriteria')->withTimestamps();
    }

        public function smartAspirasi()
        {
            $smart = 0;
            $sum = 0;
            $cmax=100;
            $cmin = 20;
            foreach($this->KriteriaAspirasi as $nilai){
                $sum = KriteriaAspirasi::sum('bobot_kriteria');
                $smart = $smart + (($nilai->pivot->nilai-$cmin)/($cmax-$cmin)) * ($nilai->pivot->nilai_bobot_kriteria/$sum);
            }
            return ($smart);
            }

            public function smartKeorganisasian()
            {
                $smart = 0;
                $sum = 0;
                $cmax=100;
                $cmin = 20;
                foreach($this->KriteriaKeorganisasian as $nilai){
                    $sum = KriteriaKeorganisasian::sum('bobot_kriteria');
                    $smart = $smart + (($nilai->pivot->nilai-$cmin)/($cmax-$cmin)) * ($nilai->pivot->nilai_bobot_kriteria/$sum);
                }
                return ($smart);
                }

            public function smartHumas()
            {
                $smart = 0;
                $sum = 0;
                $cmax=100;
                $cmin = 20;
                foreach($this->KriteriaHumas as $nilai){
                    $sum = KriteriaHumas::sum('bobot_kriteria');
                    $smart = $smart + (($nilai->pivot->nilai-$cmin)/($cmax-$cmin)) * ($nilai->pivot->nilai_bobot_kriteria/$sum);
                }
                return ($smart);
                }

            public function smartLitbang()
            {
                $smart = 0;
                $sum = 0;
                $cmax=100;
                $cmin = 20;
                foreach($this->KriteriaLitbang as $nilai){
                    $sum = KriteriaLitbang::sum('bobot_kriteria');
                    $smart = $smart + (($nilai->pivot->nilai-$cmin)/($cmax-$cmin)) * ($nilai->pivot->nilai_bobot_kriteria/$sum);
                }
                return ($smart);
                }
}
