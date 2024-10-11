<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Импортируем Validator
use App\Models\User; // Импортируем модель User
use Illuminate\Support\Facades\Hash; // Импортируем Hash

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); // Путь к вашей форме
    }

    public function register(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
            'email' => 'required|email|unique:users,email',
            'telephoneNumber' => [
                'required',
                'string',
                'regex:/^(\+375|80)\s\((29|25|44|33|17)\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/',
            ], // Добавляем правило для телефона
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Создание пользователя
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephoneNumber' => $request->telephoneNumber, // Сохраняем номер телефона
            'password' => Hash::make($request->password),
        ]);

        // Перенаправление после успешной регистрации
        return redirect("/");
    }
}