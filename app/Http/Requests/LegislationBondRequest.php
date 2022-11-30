<?php

namespace App\Http\Requests;

use App\Models\LegislationBond;
use App\Models\Legislation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LegislationBondRequest extends FormRequest
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
            'base_id'    => [
                Rule::exists(Legislation::class, 'id')
            ],
            'vinculo_id'    => [
                Rule::exists(Legislation::class, 'id')
            ],
            'status'          => [
            ],
            'active'          => [
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'base_id'                    => 'base',
            'vinculo_id'                    => 'vínculo',
            'status'                    => 'status',
            'active'                    => 'ativo',
        ];
    }
}
