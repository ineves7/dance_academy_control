<?php

namespace App\Http\Requests;

use App\Models\Expense;
use App\Models\TypeExpense;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ExpenseRequest extends FormRequest
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
            'type_expense_id'    => [
                Rule::exists(TypeExpense::class, 'id')
            ],
            'user_id'    => [
                Rule::exists(User::class, 'id')
            ],
            'title'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'register'          => [
                'required'
            ],
            'source'          => [
                'nullable',
            ],
            'current_balance'     => [
                'nullable'
            ],
            'blocked_balance'     => [
                'nullable'
            ],
            'used_balance'     => [
                'nullable'
            ],
            'available_balance'          => [
                'nullable'
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'type_expense_id'                    => 'Tipo',
            'user_id'                    => 'User',
            'title'                    => 'Despesa',
            'register'                    => 'Registro',
            'source'                    => 'Fonte',
            'current_balance'                    => 'Saldo Atual',
            'blocked_balance'                    => 'Saldo Bloqueado',
            'used_balance'                    => 'Saldo Utilizado',
            'available_balance'                    => 'Saldo Disponível',
        ];
    }
}
