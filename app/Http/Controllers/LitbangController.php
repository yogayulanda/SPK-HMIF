<?php

namespace App\Http\Controllers;

use App\KriteriaLitbang;   // Pakai Model Kriteria Litbang
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestValidasiLitbang; //Pakai Form Validasi Custom
use App\Exports\LitbangExport;
use Maatwebsite\Excel\Facades\Excel;

class LitbangController extends Controller
{
    public function index(Request $request)

    {  
            $data_mahasiswa = Mahasiswa::all(); //Ambil Nilai Model Mahasiswa
            $kriteria = KriteriaLitbang::all();  //Ambil Nilai Model Kriteria    

        return view('litbang/index', ['data_mahasiswa' => $data_mahasiswa],['kriteria' => $kriteria]); //Lempar Nilai Ke View
    }

    public function create(FormRequestValidasiLitbang $request)
    {
        KriteriaLitbang::create($request->all()); //Ambil Nilai Request dari Form yang DiInput
        return redirect('/litbang')->with('sukses', 'Data Berhasil Ditambahkan'); //Return Ke Halaman dengan Alert Sukses
    }

    public function edit($id)
    {
        $kriteria = KriteriaLitbang::find($id);  //Ambil Nilai ID yang diedit
        return view('litbang/edit', ['kriteria_litbang' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $kriteria = KriteriaLitbang::find($id);
        $kriteria->update($request->all());
        return redirect('/litbang')->with('sukses', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $kriteria = KriteriaLitbang::find($id);
        $kriteria->delete($kriteria);
        return redirect('/litbang')->with('sukses', 'Data Berhasil Di Hapus');
    }

    public function hitungutility(Request $request)
    {
            $data_mahasiswa = Mahasiswa::all();
            $kriteria = KriteriaLitbang::all();

        return view('litbang/hitungutility', compact('data_mahasiswa', 'kriteria'));

    }

    public function smart(Request $request)
    {
            $data_mahasiswa = Mahasiswa::all();
            $kriteria = KriteriaLitbang::all();
            return view('litbang/smart', ['data_mahasiswa' => $data_mahasiswa], ['kriteria' => $kriteria]);  
        }

        public function export() 
        {
            return Excel::download(new LitbangExport, 'litbang.xlsx');
        }
}
