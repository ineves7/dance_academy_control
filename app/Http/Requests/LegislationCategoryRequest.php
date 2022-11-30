<?php

namespace App\Http\Requests;

use App\Models\LegislationCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LegislationCategoryRequest extends FormRequest
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
            'category'          => [
                'required',
                'min:3',
                'max:150'
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'category'                    => 'Categoria',
        ];
    }
}
