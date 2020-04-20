<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\KriteriaAspirasi;
use App\KriteriaLitbang;
use App\KriteriaHumas;
use App\KriteriaKeorganisasian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Http\Requests\FormRequestValidasi;
use App\Http\Requests\FormRequestValidasiInputNilai;
use Response;
use DB;
use App\Exports\MahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        if ($request->has('cari')) {
            $data_mahasiswa = \App\Mahasiswa::where('nama_mahasiswa', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_mahasiswa = \App\Mahasiswa::all();
        }

        return view('mahasiswa/index', ['data_mahasiswa' => $data_mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormRequestValidasi $request)
    {
        
        
        \App\Mahasiswa::create($request->all());

        return redirect('/mahasiswa')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        return view('mahasiswa/edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        return redirect('/mahasiswa')->with('sukses', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        $mahasiswa->KriteriaAspirasi()->detach();
        $mahasiswa->KriteriaLitbang()->detach();
        $mahasiswa->KriteriaHumas()->detach();
        $mahasiswa->KriteriaKeorganisasian()->detach();
        $mahasiswa->delete($mahasiswa);
 
        return redirect('/mahasiswa')->with('sukses', 'Data Berhasil Di Hapus');
    }

    public function profile($id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        $tambah = KriteriaAspirasi::all();
        $humas = KriteriaHumas::all();
        $litbang = KriteriaLitbang::all();
        $keorganisasian = KriteriaKeorganisasian::all();

        return view('/mahasiswa/profile', ['mahasiswa' => $mahasiswa, 'tambah' => $tambah, 'humas' => $humas, 'litbang' => $litbang, 'keorganisasian' => $keorganisasian]);
    
    }

    public function addnilai(FormRequestValidasiInputNilai $request, $idmahasiswa)
    {


        $mahasiswa = \App\Mahasiswa::find($idmahasiswa);
        $mahasiswa->KriteriaAspirasi()->attach($request->KriteriaAspirasi, ['nilai'  => $request->nilai, 'nilai_bobot_kriteria' => $request->nilai_bobot_kriteria]);

        return redirect('mahasiswa/' . $idmahasiswa . '/profile')->with('Sukses', 'Nilai Berhasil disimpan !');
    }

    public function addnilaiLitbang(FormRequestValidasiInputNilai $request, $idmahasiswa)
    {


        $mahasiswa = \App\Mahasiswa::find($idmahasiswa);
        $mahasiswa->KriteriaLitbang()->attach($request->KriteriaLitbang, ['nilai'  => $request->nilai, 'nilai_bobot_kriteria' => $request->nilai_bobot_kriteria]);

        return redirect('mahasiswa/' . $idmahasiswa . '/profile')->with('Sukses', 'Nilai Berhasil disimpan !');
    }

    public function addnilaiHumas(FormRequestValidasiInputNilai $request, $idmahasiswa)
    {


        $mahasiswa = \App\Mahasiswa::find($idmahasiswa);
        $mahasiswa->KriteriaHumas()->attach($request->KriteriaHumas, ['nilai'  => $request->nilai, 'nilai_bobot_kriteria' => $request->nilai_bobot_kriteria]);

        return redirect('mahasiswa/' . $idmahasiswa . '/profile')->with('Sukses', 'Nilai Berhasil disimpan !');
    }

    public function addnilaiKeorganisasian(FormRequestValidasiInputNilai $request, $idmahasiswa)
    {


        $mahasiswa = \App\Mahasiswa::find($idmahasiswa);
        $mahasiswa->KriteriaKeorganisasian()->attach($request->KriteriaKeorganisasian, ['nilai'  => $request->nilai, 'nilai_bobot_kriteria' => $request->nilai_bobot_kriteria]);

        return redirect('mahasiswa/' . $idmahasiswa . '/profile')->with('Sukses', 'Nilai Berhasil disimpan !');
    }

    public function deletenilai($idmahasiswa, $idkriteria)
    {


        $mahasiswa = \App\Mahasiswa::find($idmahasiswa);
        $mahasiswa->KriteriaAspirasi()->detach($idkriteria);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }

    
    public function deletenilaihumas($idmahasiswa, $idkriteria)
    {


        $mahasiswa = \App\Mahasiswa::find($idmahasiswa);
        $mahasiswa->KriteriaHumas()->detach($idkriteria);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }

    
    public function deletenilailitbang($idmahasiswa, $idkriteria)
    {


        $mahasiswa = \App\Mahasiswa::find($idmahasiswa);
        $mahasiswa->KriteriaLitbang()->detach($idkriteria);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }

    
    public function deletenilaikeorganisasian($idmahasiswa, $idkriteria)
    {


        $mahasiswa = \App\Mahasiswa::find($idmahasiswa);
        $mahasiswa->KriteriaKeorganisasian()->detach($idkriteria);
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }

    public function getInfo(Request $request)
    {

    $fill = DB::table('kriteria_aspirasi')->where('id',$request->id)->value('bobot_kriteria');
    return Response::json(['success'=>true, 'info'=>$fill]);
    }

    public function getInfoHumas(Request $request)
    {

    $fill = DB::table('kriteria_humas')->where('id',$request->id)->value('bobot_kriteria');
    return Response::json(['success'=>true, 'info'=>$fill]);
    }

    public function getInfoLitbang(Request $request)
    {

    $fill = DB::table('kriteria_litbang')->where('id',$request->id)->value('bobot_kriteria');
    return Response::json(['success'=>true, 'info'=>$fill]);
    }

    public function getInfoKeorganisasian(Request $request)
    {

    $fill = DB::table('kriteria_keorganisasian')->where('id',$request->id)->value('bobot_kriteria');
    return Response::json(['success'=>true, 'info'=>$fill]);
    }

    public function export() 
        {
            return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
        }

}
