<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestValidasi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            // Mahasiswa
            'nama_mahasiswa' => 'required|min:5|unique:mahasiswa' ,
            'nim' => 'required|min:10|max:10|unique:mahasiswa',
            'kelas' => 'required|min:8|max:8',
            'jenis_kelamin' => 'required|min:5' ,

            
        ];
    }

    public function messages()
    {
        return [

            // Mahasiswa
            'nama_mahasiswa.required' => 'Nama Tidak Boleh Kosong' ,
            'nama_mahasiswa.min' => 'Nama Harus Lebih dari 5 Karakter' ,
            'nama_mahasiswa.unique' => 'Nama Mahasiswa Sudah Tersedia' ,
            'nim.required' => 'Nim Tidak Boleh Kosong' ,
            'nim.min' => 'Masukkan Nim Sesuai Format' ,
            'nim.max' => 'Masukkan Nim Sesuai Format' ,
            'nim.unique' => 'Nim Mahasiswa Sudah Tersedia' ,
            'kelas.required' => 'Kelas Tidak Boleh Kosong' ,
            'kelas.max' => 'Masukkan Kelas Sesuai Format' ,
            'kelas.min' => 'Masukkan Kelas Sesuai Format' ,
            
            
        ];
    }
}
