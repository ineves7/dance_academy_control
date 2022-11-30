<?php

namespace App\Http\Requests;

use App\Models\ProjectMedia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProjectMediaRequest extends FormRequest
{
    /**
     * Determine if the ProjectMedia is authorized to make this request. 
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
            'project_id'          => [
                'required'
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'title'                    => 'Título',
        ];
    }
}
