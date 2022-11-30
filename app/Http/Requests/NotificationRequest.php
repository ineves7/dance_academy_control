<?php

namespace App\Http\Requests;

use App\Models\NotificationStatus;
use App\Models\NotificationType;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NotificationRequest extends FormRequest
{
    /**
     * Determine if the Notification is authorized to make this request. 
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
                'required',
                Rule::exists(NotificationType::class, 'id')
            ],
            'status_id'    => [
                'required',
                Rule::exists(NotificationStatus::class, 'id')
            ],
            'sender_id'    => [
                'required',
                Rule::exists(User::class, 'id')
            ],
            'title'          => [
                'required',
                'max:150'
            ],
            'content'          => [
            ],
            'scheduled_at'     => [
                'nullable',
                'date'
            ],
        ];
    }

    public function messages()
    {
        return [
            'type_id.required' => 'É obrigatório colocar um tipo.',
            'status_id.required' => 'É obrigatório colocar um status.',
            'sender_id.required' => 'É obrigatório colocar um remetente.',
            'title.required' => 'É obrigatório colocar um título.',
            'title.max' => 'O título tem que ter de 3 a 150 caracteres.',
            'document_type_id.required' => 'É obrigatório colocar um tipo.',
            'scheduled_at.date' => 'Tem que ser uma data.',
        ];
    }

    public function attributes()
    {
        return [
            'type_id'                       => 'tipo',
            'status_id'                       => 'status_id',
            'sender_id'                       => 'sender_id',
            'title'                         => 'título',
            'content'                       => 'conteúdo',
            'scheduled_at'                  => 'agendado',
        ];
    }
}
