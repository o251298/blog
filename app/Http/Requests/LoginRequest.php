<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|min:3|max:20',
            'password' => 'required|min:5|max:10',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Поле username обазательно к заполнению',
            'username.min' => 'Поле username должно быть больше 3 символов',
            'username.unique' => 'Поле username уникальным',
            'username.max' => 'Поле username  должно быть меньше 10 символов',
            'password.required' => 'Поле password обазательно к заполнению',
            'password.min' => 'Поле password должно быть больше 5 символов',
            'password.max' => 'Поле password должно быть меньше 10 символов',
        ];
    }
}
