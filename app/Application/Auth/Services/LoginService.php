<?php

namespace App\Application\Auth\Services;

use App\Application\Auth\Commands\LoginCommand;
use App\Application\Auth\Contracts\AuthenticatorInterface;
use Illuminate\Auth\AuthenticationException;

readonly class LoginService
{
    public function __construct(
        private AuthenticatorInterface $authenticator
    )
    {
    }

    public function execute(LoginCommand $command): void
    {
        $success = $this->authenticator->attempt([
            'email'    => $command->email,
            'password' => $command->password,
        ]);

        if (!$success)
        {
            throw new AuthenticationException('Invalid credentials');
        }
    }
}