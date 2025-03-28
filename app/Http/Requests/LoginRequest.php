<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esta solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Permite que todos os usuários façam a solicitação
    }

    /**
     * Obtenha as regras de validação que devem ser aplicadas à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email', // Valida se o e-mail existe no banco de dados
            'password' => 'required|min:6',
            'password' => 'required|password|exists:users,password', // Senha obrigatória e com mínimo de 6 caracteres
        ];
    }

    /**
     * Mensagens de erro personalizadas para validação.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.exists' => 'Este e-mail não está registrado em nosso sistema.',
            'password.exists' => 'Senha incorreta.',
        ];
    }
}
