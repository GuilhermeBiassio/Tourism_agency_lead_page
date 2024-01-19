<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackgroundUpdateRequest extends FormRequest
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
            'background_file' => [
                'image',
                'mimes:jpg,png',
                'max:5120',
                'dimensions:min_width=900,min_height=600'
            ],
            'qrcode_link' => [
                'required',
                'active_url'
            ]
        ];
    }

    public function messages()
    {
        return [
            'background_file.required' => 'Nenhuma imagem anexada!',
            'background_file.mimes' => 'A imagem deve ser do tipo: jpg, png',
            'background_file.dimensions' => 'A imagem deve ter a resolução mínima de 900x600',
            'qrcode_link.active_url' => 'O link não é uma URL válida.'
        ];
    }
}
