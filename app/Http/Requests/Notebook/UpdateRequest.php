<?php

namespace App\Http\Requests\Notebook;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fio' => 'string',
            'company' => 'string|nullable',
            'phone' => 'string',
            'email' => 'email',
            'birth_date' => 'date|nullable',
            'photo' => 'string|nullable',
        ];
    }

    public function messages()
    {
        return [
            'fio' => 'FIO should be string',
            'company' => 'Company should be string',
            'phone' => 'Phone should be string',
            'email' => 'Email should be valid email',
            'birth_date' => 'Birth date should be datetime',
            'photo' => 'Photo should be string',
        ];
    }
}
