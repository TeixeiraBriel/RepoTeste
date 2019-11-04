<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Carbon\Carbon;
class candidatosRequest extends FormRequest
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
            'name' => 'required',
            'zip-code' => 'required|min:8|max:8',
            'date_of_birth' => 'required|before:15 years ago|after:'.Carbon::now()->subYears(19),
            'uf' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'uf.required' => 'Sua cidade não esta participando desta campanha.',
            'required' => 'O campo :attribute é obrigatorio',
            'zip-code.min' => 'O campo CEP deve ter 8 numeros.',
            'zip-code.max' => 'O campo CEP deve ter 8 numeros.',
            'date_of_birth.before' => 'Sua faixa etaria não permite participar dessa camapnha.',
            'date_of_birth.after' => 'Sua faixa etaria não permite participar dessa camapnha.'
        ];
    }
}
