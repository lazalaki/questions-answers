<?php

namespace App\Http\Controllers;
use App\Http\Requests\Loginrequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Loginrequest $request) {
        $token = auth()->attempt(['email' => $request['email'], 'password' => $request['password']]);

        if (!$token) {
            throw new \Exception('Bad credientals. Please try again.');
        }

        return redirect()->route('questions.view');
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login-form');
    }
}
