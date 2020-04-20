<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestValidasiDivisi extends FormRequest
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
            //// Divisi
            'nama_divisi' => 'required|unique:divisi' ,
            'kepala_divisi' => 'required'
        ];
    }
    public function messages()
    {
        return [

            // Divisi
            'nama_divisi.required' => 'Nama Divisi Tidak Boleh Kosong' ,
            'nama_divisi.unique' => 'Divisi Sudah Ada' ,
            'kepala_divisi.required' => 'Kepala Divisi Tidak Boleh Kosong'
            
            
        ];
    }
}