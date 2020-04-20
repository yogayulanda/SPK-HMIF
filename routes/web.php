<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auths//login');
});



// Login
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/dashboard', 'DashboardController@index');

    // Mahasiswa
    Route::get('/mahasiswa', 'MahasiswaController@index');
    Route::POST('/mahasiswa/create', 'MahasiswaController@create');
    Route::get('/mahasiswa/{id}/edit', 'MahasiswaController@edit');
    Route::post('/mahasiswa/{id}/update', 'MahasiswaController@update');
    Route::get('/mahasiswa/{id}/delete', 'MahasiswaController@delete');
    Route::get('/mahasiswa/{id}/profile', 'MahasiswaController@profile');
    Route::post('/mahasiswa/{id}/addnilai', 'MahasiswaController@addnilai');
    Route::post('/mahasiswa/{id}/addnilaiLitbang', 'MahasiswaController@addnilaiLitbang');
    Route::post('/mahasiswa/{id}/addnilaiHumas', 'MahasiswaController@addnilaiHumas');
    Route::post('/mahasiswa/{id}/addnilaiKeorganisasian', 'MahasiswaController@addnilaiKeorganisasian');
    Route::get('/mahasiswa/{id}/{kriteria_id}/deletenilai', 'MahasiswaController@deletenilai');
    Route::get('/mahasiswa/{id}/{kriteria_id}/deletenilaihumas', 'MahasiswaController@deletenilaihumas');
    Route::get('/mahasiswa/{id}/{kriteria_id}/deletenilailitbang', 'MahasiswaController@deletenilailitbang');
    Route::get('/mahasiswa/{id}/{kriteria_id}/deletenilaikeorganisasian', 'MahasiswaController@deletenilaikeorganisasian');

    // FindBobot
    Route::get('/findBobot', 'MahasiswaController@getInfo');
    Route::get('/findBobotHumas', 'MahasiswaController@getInfoHumas');
    Route::get('/findBobotLitbang', 'MahasiswaController@getInfoLitbang');
    Route::get('/findBobotKeorganisasian', 'MahasiswaController@getInfoKeorganisasian');

    // Divisi
    Route::get('/divisi', 'DivisiController@index');
    Route::POST('/divisi/create', 'DivisiController@create');
    Route::get('/divisi/{id}/edit', 'DivisiController@edit');
    Route::post('/divisi/{id}/update', 'DivisiController@update');
    Route::get('/divisi/{id}/delete', 'DivisiController@delete');

    // Aspirasi
    Route::get('/aspirasi', 'AspirasiController@index');
    Route::POST('/aspirasi/create', 'AspirasiController@create');
    Route::get('/aspirasi/{id}/edit', 'AspirasiController@edit');
    Route::post('/aspirasi/{id}/update', 'AspirasiController@update');
    Route::get('/aspirasi/{id}/delete', 'AspirasiController@delete');
    Route::get('/aspirasi/hitungutility', 'AspirasiController@hitungutility');
    Route::get('/aspirasi/smart', 'AspirasiController@smart');
 
    // Litbang
    Route::get('/litbang', 'LitbangController@index');
    Route::POST('/litbang/create', 'LitbangController@create');
    Route::get('/litbang/{id}/edit', 'LitbangController@edit');
    Route::post('/litbang/{id}/update', 'LitbangController@update');
    Route::get('/litbang/{id}/delete', 'LitbangController@delete');
    Route::get('/litbang/hitungutility', 'LitbangController@hitungutility');
    Route::get('/litbang/smart', 'LitbangController@smart');

    // Humas
    Route::get('/humas', 'HumasController@index');
    Route::POST('/humas/create', 'HumasController@create');
    Route::get('/humas/{id}/edit', 'HumasController@edit');
    Route::post('/humas/{id}/update', 'HumasController@update');
    Route::get('/humas/{id}/delete', 'HumasController@delete');
    Route::get('/humas/hitungutility', 'HumasController@hitungutility');
    Route::get('/humas/smart', 'HumasController@smart');

    // Keorganisasian
    Route::get('/keorganisasian', 'KeorganisasianController@index');
    Route::POST('/keorganisasian/create', 'KeorganisasianController@create');
    Route::get('/keorganisasian/{id}/edit', 'KeorganisasianController@edit');
    Route::post('/keorganisasian/{id}/update', 'KeorganisasianController@update');
    Route::get('/keorganisasian/{id}/delete', 'KeorganisasianController@delete');
    Route::get('/keorganisasian/hitungutility', 'KeorganisasianController@hitungutility');
    Route::get('/keorganisasian/smart', 'KeorganisasianController@smart');

    // Admin
    Route::get('/admin', 'AdminController@index');
    Route::POST('/admin/create', 'AdminController@create');
    Route::get('/admin/{id}/edit', 'AdminController@edit');
    Route::post('/admin/{id}/update', 'AdminController@update');
    Route::get('/admin/{id}/delete', 'AdminController@delete');

    //Export
    Route::get('mahasiswa/export/', 'MahasiswaController@export');
    Route::get('aspirasi/export/', 'AspirasiController@export');
    Route::get('litbang/export/', 'LitbangController@export');
    Route::get('humas/export/', 'HumasController@export');
    Route::get('keorganisasian/export/', 'KeorganisasianController@export');
});

// Role Ketua , Pembina -----------------------------------------------------------------
