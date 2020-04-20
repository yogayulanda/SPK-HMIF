<?php

namespace App\Http\Controllers;

use App\KriteriaKeorganisasian;   // Pakai Model Kriteria Keorganisasian
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestValidasiKeorganisasian; //Pakai Form Validasi Custom
use App\Exports\KeorganisasianExport;
use Maatwebsite\Excel\Facades\Excel;

class KeorganisasianController extends Controller
{

    public function index(Request $request)

    {  
            $data_mahasiswa = Mahasiswa::all(); //Ambil Nilai Model Mahasiswa
            $kriteria = KriteriaKeorganisasian::all();  //Ambil Nilai Model Kriteria    

        return view('keorganisasian/index', ['data_mahasiswa' => $data_mahasiswa],['kriteria' => $kriteria]); //Lempar Nilai Ke View
    }

    public function create(FormRequestValidasiKeorganisasian $request)
    {
        KriteriaKeorganisasian::create($request->all()); //Ambil Nilai Request dari Form yang DiInput
        return redirect('/keorganisasian')->with('sukses', 'Data Berhasil Ditambahkan'); //Return Ke Halaman dengan Alert Sukses
    }

    public function edit($id)
    {
        $kriteria = KriteriaKeorganisasian::find($id);  //Ambil Nilai ID yang diedit
        return view('keorganisasian/edit', ['kriteria_Keorganisasian' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $kriteria = KriteriaKeorganisasian::find($id);
        $kriteria->update($request->all());
        return redirect('/keorganisasian')->with('sukses', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $kriteria = KriteriaKeorganisasian::find($id);
        $kriteria->delete($kriteria);
        return redirect('/keorganisasian')->with('sukses', 'Data Berhasil Di Hapus');
    }

    public function hitungutility(Request $request)
    {
            $data_mahasiswa = Mahasiswa::all();
            $kriteria = KriteriaKeorganisasian::all();

        return view('keorganisasian/hitungutility', compact('data_mahasiswa', 'kriteria'));

    }

    public function smart(Request $request)
    {
            $data_mahasiswa = Mahasiswa::all();
            $kriteria = KriteriaKeorganisasian::all();
            return view('keorganisasian/smart', ['data_mahasiswa' => $data_mahasiswa], ['kriteria' => $kriteria]);  
        }
        public function export() 
        {
            return Excel::download(new KeorganisasianExport, 'keorganisasian.xlsx');
        }
}
