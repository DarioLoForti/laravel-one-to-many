<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
            'nome' => 'required|max:15|unique:types',
            'descrizione' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'Il nome è obbligatorio',
            'nome.max'     => 'Il nome può contenere al massimo 50 caratteri',
            'nome.unique'     => 'E\' già presente una tipologia con questo nome',
            'descrizione.required' => 'La descrizione è obbligatoria',
        ];
    }
}
