<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
    { {
            return [
                'titolo' => 'required|max:150|unique:projects',
                'autore' => 'required|max:50',
                'descrizione' => 'required',
                'fine_progetto' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'titolo.required' => 'Il titolo è obbligatorio',
            'titolo.max'     => 'Il titolo può contenere al massimo 150 caratteri',
            'titolo.unique'     => 'E\' già presente un progetto con questo nome',
            'autore.required'     => 'Il nome dell\'autore è obbligatorio',
            'autore.max'     => 'Il nome dell\'autore può contenere al massimo 50 caratteri',
            'descrizione.required' => 'La descrizione è obbligatoria',
            'fine_progetto.required' => 'la data di fine progetto è obbligatoria'
        ];
    }
}
