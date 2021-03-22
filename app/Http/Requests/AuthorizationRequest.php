<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorizationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'auth_email' => 'required|email',
            'auth_password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'auth_email.required' => "Заполните поле 'Email'",
            'auth_email.email' => "Поле 'Email' должно соответствовать маске email",
            'auth_password.required' => "Заполните поле 'Пароль'",
            'auth_password.min' => "В поле 'Пароль' необходимо ввести не менее 6 символов"
        ];
    }
}
