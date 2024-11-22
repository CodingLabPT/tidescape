<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Mail;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Altere conforme necessário para controle de acesso
    }

    // Define as regras de validação
    public function rules()
    {
        return [
            'fn' => 'required|string|max:255',
            'ln' => 'required|string|max:255',
            'phone' => 'required|string|max:19|unique:users,phone', // Ajuste o formato conforme necessário
            'email' => 'required|string|email|unique:users,email|lowercase',
            'password' => 'required|string|min:9|confirmed', // A senha deve ter pelo menos 9 caracteres e ser confirmada
            'checkbox' => 'accepted', // Verifica se o checkbox foi aceito
        ];
    }


}
