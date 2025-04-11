<?php

namespace App\Http\Requests\web\Shared\Login;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => ['required'],
            'password' => ['required'],
        ];
    }
}
