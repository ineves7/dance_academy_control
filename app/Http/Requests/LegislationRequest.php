<?php

namespace App\Http\Requests;

use App\Models\Legislation;
use App\Models\LegislationCategory;
use App\Models\LegislationSituation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LegislationRequest extends FormRequest
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
            'category_id'    => [
                Rule::exists(LegislationCategory::class, 'id')
            ],
            'situation_id'    => [
                Rule::exists(LegislationSituation::class, 'id')
            ],
            'ementa'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'number'          => [
                'required'
            ],
            'number_complement'          => [
                'min:1',
                'max:150'
            ],
            'date'     => [
                'nullable',
                'date'
            ],
            'initial_term'     => [
                'nullable',
                'date'
            ],
            'final_term'     => [
                'nullable',
                'date'
            ],
            'information'          => [
            ],
            'excerpt'          => [
            ],
            'body'          => [
            ],
            'meta_description'          => [
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'category_id'                    => 'Categoria',
            'situation_id'                    => 'Situzção',
            'ementa'                    => 'Ementa',
            'number'                    => 'Número',
            'number_complement'                    => 'Complemento',
            'date'                    => 'Data',
            'initial_term'                    => 'Data inicial',
            'final_term'                    => 'Data final',
            'information'                    => 'Informação',
            'excerpt'                    => 'excerpt',
            'body'                    => 'body',
            'meta_description'                    => 'meta_description',
        ];
    }
}
