<?php

namespace App\Http\Requests;

use App\Models\City;
use App\Models\Organization;
use App\Models\Unit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UnitRequest extends FormRequest
{
    /**
     * Determine if the Unit is authorized to make this request. 
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
            'organization_id'    => [
                Rule::exists(Organization::class, 'id')
            ],
            'name'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'sigla'          => [
                'required',
                'max:150'
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É obrigatório colocar um nome.',
            'name.min' => 'O nome tem que ter de 3 a 150 caracteres.',
            'name.max' => 'O nome tem que ter de 3 a 150 caracteres.',
            'sigla.required' => 'É obrigatório colocar uma sigla.',
            'sigla.max' => 'O nome tem que ter de 3 a 150 caracteres.',
        ];
    }
    
    public function attributes()
    {
        return [
            'organization_id'                 => 'organização',
            'name'                     => 'nome',
            'sigla'                     => 'sigla',
        ];
    }
}
