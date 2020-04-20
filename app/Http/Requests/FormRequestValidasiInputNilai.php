<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestValidasiInputNilai extends FormRequest
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
            'nilai_bobot_kriteria' => 'required',
        ];
    }
    public function messages()
    {
        return [

            // Aspirasi
            'nilai_bobot_kriteria.required' => 'Silakan Pilih Kriteria dengan Benar' ,
            
            
        ];
    }
}
