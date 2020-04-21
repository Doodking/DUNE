<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'email' => 'required|email|min:10|max:40',
            'password' => 'required|min:8|max:20',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Введите свой почтовый адрес. Он должен содержать не менее 10 символов, а так же в правильном формате',
            'password.required' => 'Длина пароля не менее 8 символов.'
        ];
    }
}
