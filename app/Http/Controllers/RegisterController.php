<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' =>  Hash::make($request->get('password')),
        ]);

        return redirect()->route('login-form');
    }
}
