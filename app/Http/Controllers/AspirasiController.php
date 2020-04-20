<?php

namespace App\Http\Controllers;

use App\KriteriaAspirasi;   // Pakai Model Kriteria Aspirasi
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestValidasiAspirasi; //Pakai Form Validasi Custom
use App\Exports\AspirasiExport;
use Maatwebsite\Excel\Facades\Excel;


class AspirasiController extends Controller
{

    public function index(Request $request)

    {  
            $data_mahasiswa = Mahasiswa::all(); //Ambil Nilai Model Mahasiswa
            $kriteria = KriteriaAspirasi::all();  //Ambil Nilai Model Kriteria    

        return view('aspirasi/index', ['data_mahasiswa' => $data_mahasiswa],['kriteria' => $kriteria]); //Lempar Nilai Ke View
    }

    public function create(FormRequestValidasiAspirasi $request)
    {
        KriteriaAspirasi::create($request->all()); //Ambil Nilai Request dari Form yang DiInput
        return redirect('/aspirasi')->with('sukses', 'Data Berhasil Ditambahkan'); //Return Ke Halaman dengan Alert Sukses
    }

    public function edit($id)
    {
        $kriteria = KriteriaAspirasi::find($id);  //Ambil Nilai ID yang diedit
        return view('aspirasi/edit', ['kriteria_aspirasi' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $kriteria = KriteriaAspirasi::find($id);
        $kriteria->update($request->all());
        return redirect('/aspirasi')->with('sukses', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $kriteria = KriteriaAspirasi::find($id);
        $kriteria->delete($kriteria);
        return redirect('/aspirasi')->with('sukses', 'Data Berhasil Di Hapus');
    }

    public function hitungutility(Request $request)
    {
            $data_mahasiswa = Mahasiswa::all();
            $kriteria = KriteriaAspirasi::all();

        return view('aspirasi/hitungutility', compact('data_mahasiswa', 'kriteria'));

    }

    public function smart(Request $request)
    {
            $data_mahasiswa = Mahasiswa::all();
            $kriteria = KriteriaAspirasi::all();
            return view('aspirasi/smart', ['data_mahasiswa' => $data_mahasiswa], ['kriteria' => $kriteria]);  
        }

        public function export() 
        {
            return Excel::download(new AspirasiExport, 'aspirasi.xlsx');
        }
}
