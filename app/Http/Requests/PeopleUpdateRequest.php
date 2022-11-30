<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PeopleUpdateRequest extends FormRequest
{
    /**
     * Determine if the People is authorized to make this request. 
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
            'person_name'          => [
                'exclude_unless:person_type,pf',
                'required',
                'min:3',
                'max:150'
            ],
            'genre'    => [
                'exclude_unless:person_type,pf',
                Rule::exists(Genre::class, 'id')
            ],
            'matrial_status'    => [
                'exclude_unless:person_type,pf',
                Rule::exists(MatrialStatus::class, 'id')
            ],
            //pj
            'company_name' => [
                'exclude_unless:person_type,pj',
                'required',
            ],
            'legal_responsible' => [
                'exclude_unless:person_type,pj',
                'required',
            ],
            'social_name' => [
                'exclude_unless:person_type,pf',
                'nullable',
                'min:3',
                'max:150'
            ],
            'birthdate'     => [
                'exclude_unless:person_type,pf',
                'nullable',
                'date'
            ],
            'email' => [
                'nullable',
                'email',
            ],
            'phone' => [
                'nullable'
            ],
        ];
    }

    public function messages()
    {
        return [
            'person_name.required' => 'É obrigatório colocar um nome completo.',
            'person_name.min' => 'O nome tem que ter de 3 a 150 caracteres.',
            'person_name.max' => 'O nome tem que ter de 3 a 150 caracteres.',
            'social_name.min' => 'O nome social tem que ter de 3 a 150 caracteres.',
            'social_name.max' => 'O nome social tem que ter de 3 a 150 caracteres.',
            'birthdate.date' => 'Digite corretamente a data.',
        ];
    }
    
    public function attributes()
    {
        return [
            'company_name'              => 'nome da empresa',
            'name'                      => 'nome',
            'genre'                     => 'genero',
            'matrial_status'            => 'estado civil',
            'documents.document.*'      => 'documento',
            'birthdate'                 => 'data de nascimento',
            'email'                     => 'email',
            'phone'                     => 'telefone',
        ];
    }
}
