<?php

namespace App\Http\Requests;

use App\Models\Unit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DepartamentRequest extends FormRequest
{
    /**
     * Determine if the Departament is authorized to make this request. 
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return Auth::user()->isEmployee() ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'departament'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'sigla'          => [
                'required',
                'min:1',
                'max:15'
            ],
            'unit_id'    => [
                'required',
                Rule::exists(Unit::class, 'id')
            ],
        ];
    }

    public function messages()
    {
        return [
            'departament.required' => 'É obrigatório colocar um nome.',
            'departament.min' => 'O nome tem que ter de 3 a 150 caracteres.',
            'departament.max' => 'O nome tem que ter de 3 a 150 caracteres.',
            'sigla.required' => 'É obrigatório colocar uma sigla.',
            'sigla.min' => 'Asigla tem que ter de 3 a 15 caracteres.',
            'sigla.max' => 'Asigla tem que ter de 3 a 15 caracteres.',
        ];
    }
    
    public function attributes()
    {
        return [
            'departament'                 => 'departamento',
            'code'                 => 'code',
            'sigla'                 => 'sigla',
            'unit_id'                 => 'unidade',
            'responsible'                     => 'responsavel',
            'phone'                     => 'celular',
            'email'                     => 'email',
        ];
    }
}
