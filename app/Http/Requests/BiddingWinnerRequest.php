<?php

namespace App\Http\Requests;

use App\Models\BiddingWinner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BiddingWinnerRequest extends FormRequest
{
    /**
     * Determine if the BiddingWinner is authorized to make this request. 
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
            'bidding_id'          => [
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'bidding_id'                    => 'id',
        ];
    }
}
