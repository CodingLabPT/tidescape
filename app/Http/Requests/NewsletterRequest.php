<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite que todos os usuários façam esta requisição
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:newsletters,email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Por favor, insira um endereço de email.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
            'email.unique' => 'Este endereço de e-mail j&aacute; est&aacute; registrado!',
        ];
    }
}
