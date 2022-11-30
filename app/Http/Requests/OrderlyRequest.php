<?php

namespace App\Http\Requests;

use App\Models\Departament;
use App\Models\OrderlyTime;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class OrderlyRequest extends FormRequest
{
    /**
     * Determine if the Orderly is authorized to make this request. 
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
                'min:3',
                'max:150'
            ],
            'admin_id'    => [
                Rule::exists(User::class, 'id')
            ],
            'time_id'    => [
                Rule::exists(OrderlyTime::class, 'id')
            ],
            'started_at'     => [
                'required'
            ],
            'ended_at'     => [
                'required'
            ],
            'vacancy'          => [
                'required'
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'É obrigatório colocar uma ocupação.',
            'title.min' => 'A ocupação tem que ter de 3 a 150 caracteres.',
            'title.max' => 'A ocupação tem que ter de 3 a 150 caracteres.',
            'started_at.required' => 'É obrigatório colocar uma data de início.',
            'ended_at.required' => 'É obrigatório colocar uma data e fim.',
            'vacancy.required' => 'É obrigatório colocar vagas.',
        ];
    }
    
    public function attributes()
    {
        return [
        ];
    }
}
