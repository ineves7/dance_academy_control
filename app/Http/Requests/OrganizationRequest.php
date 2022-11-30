<?php

namespace App\Http\Requests;

use App\Models\City;
use App\Models\Organization;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class OrganizationRequest extends FormRequest
{
    /**
     * Determine if the Organization is authorized to make this request. 
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
            'title'          => [
                'required',
                'max:150'
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'É obrigatório colocar um nome.',
            'title.max' => 'O nome tem no máximo 150 caracteres.',
        ];
    }
    
    public function attributes()
    {
        return [
            'title'                     => 'title',
        ];
    }
}
