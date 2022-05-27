<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //функция авторизации
    public function auth(Request $request)
    {
        $email = $request->get('email');//получаю email и пароль из параметров запроса
        $password = $request->get('password');
        $valid = Validator::make($request->all(), [//валидирую эмейл и пароль(они должны не быть пустыми, быть строками и email должен соответствовать формату и находиться в таблицe users)
            'email' => ['required', 'string', 'email', 'exists:users'],
            'password'=>['required','string']
        ]);
        try {
            $valid->validate();//если валидация прошла успешно, то пробую авторизоваться
        } catch (\Throwable $e) {
            return back()->withErrors(['msg' => 'Почта или пароль неверны']);
        }
        $user = User::where('email', $email)->where('password', md5($password))->first();//ищу пользователя в базе
        if ($user) {
            Auth::login($user);//авторизую его и возвращаю успешный ответ
            return response(['status'=>'success']);
        } else return back()->withErrors(['msg' => 'Пользователь не найден']);
    }
}
