<?php

namespace App\Http\Requests;

use App\Models\Bidding;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\CPF;

class BiddingUpdateRequest extends FormRequest
{
    /**
     * Determine if the Bidding is authorized to make this request. 
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
            'Title'          => [
                'required',
                'min:3',
                'max:150'
            ],
        ];
    }
    public function attributes()
    {
        return [
            'title'              => 'título',
        ];
    }
}
