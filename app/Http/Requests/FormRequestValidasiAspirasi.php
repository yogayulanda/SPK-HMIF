<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestValidasiAspirasi extends FormRequest
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
            //// Aspirasi
            'nama_kriteria' => 'required|unique:kriteria_aspirasi' ,
            'bobot_kriteria' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [

            // Aspirasi
            'nama_kriteria.required' => 'Nama Kriteria Tidak Boleh Kosong' ,
            'nama_kriteria.unique' => 'Kriteria Sudah Tersedia' ,
            'bobot_kriteria.required' => 'Bobot Kriteria Tidak Boleh Kosong',
            'bobot_kriteria.numeric' => 'Silakan Masukkan nilai Dengan Benar',
            
            
        ];
    }
}
