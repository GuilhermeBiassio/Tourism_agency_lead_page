<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_name' => ['required'],
            'email' => [
                'required',
                'email:rfc,dns',
                'unique:form_data'
            ],
            'phone' => [
                'required',
                'min:14'
            ],
            'message' => ['max:300'],
            'terms' => ['accepted']
        ];
    }

    public function messages(): array
    {
        return [
            'terms.accepted' => 'Os termos devem ser aceitos!',
            'phone.min' => 'O Telefone deve ter, no mínimo, 10 digitos!',
            'email.unique' => 'O e-mail inserido já foi cadastrado!'
        ];
    }
}
