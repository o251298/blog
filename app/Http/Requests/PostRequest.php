<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'text' => 'required',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Поле title обазательно к заполнению',
            'text.required' => 'Поле text обазательно к заполнению',
            'image.required' => 'Поле image обазательно к заполнению',
        ];
    }
}
