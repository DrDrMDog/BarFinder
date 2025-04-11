<?php

namespace App\Http\Controllers\web\Shared;

use App\Http\Requests\web\Shared\Login\AuthenticateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LoginController extends WebController
{
    public function form()
    {
        return Inertia::render(
            component: 'login_page'
        );
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return Redirect::route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Die Logindaten sind falsch oder die E-Mail-Adresse existiert nicht.'
        ])->onlyInput('email');
    }
}