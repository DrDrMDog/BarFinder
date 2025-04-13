<?php

namespace App\Infrastructure\Auth;

use App\Application\Auth\Contracts\AuthenticatorInterface;
use Illuminate\Support\Facades\Auth;

class LaravelAuthenticator implements AuthenticatorInterface
{
    public function attempt(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }
}