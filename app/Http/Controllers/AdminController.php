<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormRequestValidasiAdmin; //Pakai Form Validasi Custom
use App\Http\Requests\FormRequestUbahPassword; //Pakai Form Validasi Custom
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admin = \App\User::all();
        return view('admin/index', ['admin' => $admin]);
    }

    public function create(FormRequestValidasiAdmin $request)
    {
            User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);
        return redirect('/admin')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $admin = \App\User::find($id);
    
    
        return view('admin/edit', ['admin' => $admin]);
    }

    public function update(FormRequestUbahPassword $request, $id)
    {
        $admin = \App\User::find($id);
        $admin->update(['name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        ]);
        return redirect('/admin')->with('sukses', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $admin = \App\User::find($id);
        $admin->delete($admin);
        return redirect('/admin')->with('sukses', 'Data Berhasil Di Hapus');
    }
}
