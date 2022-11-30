<?php

namespace App\Http\Requests;

use App\Models\People;
use App\Models\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PhoneRequest extends FormRequest
{
    /**
     * Determine if the Phone is authorized to make this request. 
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
            'phone'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'people_id'    => [
                Rule::exists(People::class, 'id')
            ],
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'É obrigatório colocar um celular.',
            'phone.min' => 'O nome tem que ter de 3 a 150 caracteres.',
            'phone.max' => 'O nome tem que ter de 3 a 150 caracteres.',
            'people_id.required' => 'É obrigatório colocar um dono do celular.',
        ];
    }
    
    public function attributes()
    {
        return [
            'email'                    => 'celular',
            'people_id'                => 'pessoa',
        ];
    }
}
