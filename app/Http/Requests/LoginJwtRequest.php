<?php

namespace FCB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginJwtRequest extends FormRequest
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
            'email' => 'required|max:255|string',
            'password' => 'required|min:8|string',
        ];
    }

    /**
         * Get the error messages for the defined validation rules.
         *
         * @return array
         */
        public function messages()
        {
            return [
                'email.required' => 'O E-mail é obrigatório',
                'password.required' => 'A senha é Obrigatória',
                'min' => 'A senha deve ter no mínimo 8 caracteres',
                'max' => 'O E-mail deve ter no máximo 255 caracteres',
            ];
        }
}
