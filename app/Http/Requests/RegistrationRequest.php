<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'password' => 'required|min:6',
            'confirm' => 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> "Заполните поле 'Имя'",
            'second_name.required'=> "Заполните поле 'Отчество'",
            'last_name.required'=> "Заполните поле 'Фамилия'",
            'email.required'=> "Заполните поле 'Email'",
            'telephone.required'=> "Заполните поле 'Телефон'",
            'password.required'=> "Заполните поле 'Пароль'",
            'confirm.required'=> "Заполните поле 'Повторите пароль'",
            'email.email'=> "Поле 'Email' должно соответствовать маске email",
            'telephone.numeric'=> "В поле 'Номер телефона' допускаются только цифры",
            'password.min'=> "В поле 'Пароль' необходимо ввести не менее 6 символов",
            'confirm.min'=> "В поле 'Повторите пароль' необходимо ввести не менее 6 символов"


        ];
    }
}
