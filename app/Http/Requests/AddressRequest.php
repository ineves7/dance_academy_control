<?php

namespace App\Http\Requests;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the Address is authorized to make this request. 
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
            'street'          => [
                'nullable',
                'min:3',
                'max:300'
            ],
            'complement'          => [
                'nullable',
                'min:3',
                'max:150'
            ],
            'postal_code'          => [
                'nullable',
                'min:8',
                'max:8'
            ],
            'neighborhood'          => [
                'nullable',
                'min:3',
                'max:150'
            ],
            'city_id'    => [
                'required',
                Rule::exists(City::class, 'id')
            ],
        ];
    }

    public function messages()
    {
        return [
            'street.min' => 'A rua tem que ter de 3 a 300 caracteres.',
            'street.max' => 'A rua tem que ter de 3 a 300 caracteres.',
            'complement.min' => 'O complemento tem que ter de 3 a 150 caracteres.',
            'complement.max' => 'O complemento tem que ter de 3 a 150 caracteres.',
            'postal_code.min' => 'O CEP tem que ter de 3 a 150 caracteres.',
            'postal_code.max' => 'O CEP tem que ter de 3 a 150 caracteres.',
            'neighborhood.min' => 'O bairro tem que ter de 3 a 150 caracteres.',
            'neighborhood.max' => 'O bairro tem que ter de 3 a 150 caracteres.',
            'city_id.required' => 'É obrigatório colocar uma cidade.',
        ];
    }
    
    public function attributes()
    {
        return [
        ];
    }
}