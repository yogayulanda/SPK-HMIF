<?php

namespace App\Http\Controllers;

use App\KriteriaHumas;   // Pakai Model Kriteria Humas
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestValidasiHumas; //Pakai Form Validasi Custom
use App\Exports\HumasExport;
use Maatwebsite\Excel\Facades\Excel;

class HumasController extends Controller
{

    public function index(Request $request)

    {  
            $data_mahasiswa = Mahasiswa::all(); //Ambil Nilai Model Mahasiswa
            $kriteria = KriteriaHumas::all();  //Ambil Nilai Model Kriteria    

        return view('humas/index', ['data_mahasiswa' => $data_mahasiswa],['kriteria' => $kriteria]); //Lempar Nilai Ke View
    }

    public function create(FormRequestValidasiHumas $request)
    {
        KriteriaHumas::create($request->all()); //Ambil Nilai Request dari Form yang DiInput
        return redirect('/humas')->with('sukses', 'Data Berhasil Ditambahkan'); //Return Ke Halaman dengan Alert Sukses
    }

    public function edit($id)
    {
        $kriteria = KriteriaHumas::find($id);  //Ambil Nilai ID yang diedit
        return view('humas/edit', ['kriteria_Humas' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $kriteria = KriteriaHumas::find($id);
        $kriteria->update($request->all());
        return redirect('/humas')->with('sukses', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $kriteria = KriteriaHumas::find($id);
        $kriteria->delete($kriteria);
        return redirect('/humas')->with('sukses', 'Data Berhasil Di Hapus');
    }

    public function hitungutility(Request $request)
    {
            $data_mahasiswa = Mahasiswa::all();
            $kriteria = KriteriaHumas::all();

        return view('humas/hitungutility', compact('data_mahasiswa', 'kriteria'));

    }

    public function smart(Request $request)
    {
            $data_mahasiswa = Mahasiswa::all();
            $kriteria = KriteriaHumas::all();
            return view('humas/smart', ['data_mahasiswa' => $data_mahasiswa], ['kriteria' => $kriteria]);  
        }

        public function export() 
        {
            return Excel::download(new HumasExport, 'humas.xlsx');
        }
}
