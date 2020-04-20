<?php

namespace App\Http\Controllers;
use App\Mahasiswa;
use App\Divisi;
use App\User;
use App\KriteriaAspirasi;
use App\KriteriaLitbang;
use App\KriteriaHumas;
use App\KriteriaKeorganisasian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_mahasiswa = Mahasiswa::all();
        $data_mahasiswa->map(function($value){
            $value->smartAspirasi = $value->smartAspirasi();
            return $value;
        });
    
        $rangkinglitbang= Mahasiswa::all();
        $rangkinglitbang->map(function($value){
            $value->smartLitbang = $value->smartLitbang();
            return $value;
        });

        $rangkinghumas= Mahasiswa::all();
        $rangkinghumas->map(function($value){
            $value->smartHumas = $value->smartHumas();
            return $value;
        });

        $rangkingkeorganisasian= Mahasiswa::all();
        $rangkingkeorganisasian->map(function($value){
            $value->smartKeorganisasian = $value->smartKeorganisasian();
            return $value;
        });

        $data_mahasiswa = $data_mahasiswa->sortByDesc('smartAspirasi')->take(5);
        $rangkinglitbang = $rangkinglitbang->sortByDesc('smartLitbang')->take(5);
        $rangkinghumas = $rangkinghumas->sortByDesc('smartHumas')->take(5);
        $rangkingkeorganisasian = $rangkingkeorganisasian->sortByDesc('smartKeorganisasian')->take(5);
        $total = Mahasiswa::all()->count();
        $totaldivisi = Divisi::all()->count();
        $totaluser = User::all()->count();
        $aspirasi = KriteriaAspirasi::all()->count();
        $litbang = KriteriaLitbang::all()->count();
        $humas = KriteriaHumas::all()->count();
        $keorganisasian = KriteriaKeorganisasian::all()->count();
        $totalkriteria = $aspirasi + $litbang + $humas + $keorganisasian;
    
        return view('dashboard/index' ,['keorganisasian'=>$keorganisasian,'humas'=>$humas,'litbang'=>$litbang,'aspirasi'=>$aspirasi,'totalkriteria'=>$totalkriteria,'totaluser'=>$totaluser,'totaldivisi'=>$totaldivisi,'total'=>$total,'data_mahasiswa'=>$data_mahasiswa , 'rangkinglitbang'=>$rangkinglitbang , 'rangkinghumas'=>$rangkinghumas , 'rangkingkeorganisasian'=>$rangkingkeorganisasian]);
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
