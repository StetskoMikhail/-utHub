<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'telephoneNumber' => [
                'required',
                'string',
                'regex:/^(\+375|80)\s\((29|25|44|33|17)\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/',
            ],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        throw ValidationException::withMessages([
            'telephoneNumber' => __('The provided credentials do not match our records.'),
        ]);
    }

    public function destroy(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}

    
}

