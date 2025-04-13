<?php

namespace App\Application\Auth\Contracts;

interface AuthenticatorInterface
{
    public function attempt(array $credentials): bool;
}