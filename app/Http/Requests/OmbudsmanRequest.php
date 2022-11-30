<?php

namespace App\Http\Requests;

use App\Models\Ombudsman;
use App\Models\TypeAccess;
use App\Models\TypeRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class OmbudsmanRequest extends FormRequest
{
    /**
     * Determine if the BiddingModality is authorized to make this request. 
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
            'type_request_id'    => [
                Rule::exists(TypeRequest::class, 'id')
            ],
            'access_id'    => [
                Rule::exists(TypeAccess::class, 'id')
            ],
            'title'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'content'          => [
                'required',
                'min:3',
                'max:150'
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'A ocupação tem que ter de 3 a 150 caracteres.',
            'name.max' => 'A ocupação tem que ter de 3 a 150 caracteres.',
            'email.min' => 'A ocupação tem que ter de 3 a 150 caracteres.',
            'email.max' => 'A ocupação tem que ter de 3 a 150 caracteres.',
            'title.required' => 'É obrigatório colocar uma ocupação.',
            'title.min' => 'A ocupação tem que ter de 3 a 150 caracteres.',
            'title.max' => 'A ocupação tem que ter de 3 a 150 caracteres.',
            'content.required' => 'É obrigatório colocar uma ocupação.',
            'content.min' => 'A ocupação tem que ter de 3 a 150 caracteres.',
            'content.max' => 'A ocupação tem que ter de 3 a 150 caracteres.',
        ];
    }
    
    public function attributes()
    {
        return [
            'type_request_id'                    => 'Requisição',
            'access_id'                    => 'Acesso',
            'name'                    => 'Nome',
            'email'                    => 'E-mail',
            'title'                    => 'Título',
            'content'                    => 'Conteúdo',
        ];
    }
}
