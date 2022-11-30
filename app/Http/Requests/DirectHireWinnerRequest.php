<?php

namespace App\Http\Requests;

use App\Models\DirectHireWinner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DirectHireWinnerRequest extends FormRequest
{
    /**
     * Determine if the DirectHireWinner is authorized to make this request. 
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
            'direct_hire_id'          => [
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'direct_hire_id'                    => 'direct_hire_id',
        ];
    }
}
