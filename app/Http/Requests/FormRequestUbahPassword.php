<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestUbahPassword extends FormRequest
{

    public function rules()
    {
        return [

            // Mahasiswa
            'name'=> 'required|min:4' ,
            'email' => 'required|email',
            'password' => 'min:6',    
        ];
    }

    public function messages()
    {
        return [

            // Mahasiswa
            'name.required' => 'Nama Tidak Boleh Kosong' ,
            'name.min' => 'Nama Harus Lebih dari 4 Karakter' ,
            'email.required' => 'Email Tidak Boleh Kosong' ,
            'email.email' => 'Masukkan Email Yang Valid' ,
            'password.min' => 'Password Minimal 6 Karakter' ,
            
            
        ];
    }
}
