<?php

namespace App\Http\Controllers\Auth;

use App\Application\Auth\Commands\LoginCommand;
use App\Application\Auth\Services\LoginService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function __construct(
        private readonly LoginService $loginService
    )
    {
    }

    public function __invoke(LoginRequest $request)
    {
        $loginCommand = new LoginCommand(
            email: $request->input('email'),
            password: $request->input('password')
        );

        try
        {
            $this->loginService->execute($loginCommand);
        } catch (AuthenticationException $exception)
        {
            return back()->withErrors([
                'email' => 'Die Logindaten sind falsch oder die E-Mail-Adresse existiert nicht.'
            ])->onlyInput('email');
        }

        return Redirect::route('dashboard');

    }
}
