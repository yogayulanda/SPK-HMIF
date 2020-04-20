<?php

namespace App\Exports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return Mahasiswa::all();
    }

        public function map($mahasiswa): array
        {
            return [
                $mahasiswa->nama_mahasiswa,
                $mahasiswa->nim,
                $mahasiswa->kelas,
                $mahasiswa->jenis_kelamin,
                
            ];
        }

        public function headings(): array
        {
            return [
                'NAMA',
                'NIM',
                'KELAS',
                'JENIS KELAMIN'

            ];
        }
    }
