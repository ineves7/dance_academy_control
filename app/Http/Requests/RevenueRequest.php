<?php

namespace App\Http\Requests;

use App\Models\Revenue;
use App\Models\RevenueType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RevenueRequest extends FormRequest
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
            'type_id'    => [
                Rule::exists(RevenueType::class, 'id')
            ],
            'description'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'value'          => [
                'nullable'
            ],
            'receipt_at'     => [
                'nullable',
                'date'
            ],
            'collection_initial_at'     => [
                'nullable',
                'date'
            ],
            'collection_final_at'     => [
                'nullable',
                'date'
            ],
            'referent'          => [
            ],
            'notes'          => [
                'nullable'
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'type_id'                    => 'tipo',
            'description'                    => 'descrição',
            'value'                    => 'valor bruto',
            'receipt_at'                    => 'data de recebimento',
            'collection_initial_at'                    => 'Data Inicial de recolhimento',
            'collection_final_at'                    => 'Data Final de recolhimento',
            'referent'                    => 'Referente',
            'notes'                    => 'anotações',
        ];
    }
}
