<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpUnitStore extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'indukId' => 'nullable',
            'nama' => 'required',
            'namaKetua' => 'required',
            'alamat' => 'required',
            'noTelepon' => 'required',
            'namaBank' => 'required',
            'noRekening' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }
}
