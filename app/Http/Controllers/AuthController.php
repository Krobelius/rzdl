<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $valid = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'exists:users'],
            'password'=>['required','string']
        ]);
        try {
            $valid->validate();
        } catch (\Throwable $e) {
            return back()->withErrors(['msg' => 'Почта или пароль неверны']);
        }
        $user = User::where('email', $email)->where('password', md5($password))->first();
        if ($user) {
            Auth::login($user);
            return response(['status'=>'success']);
        } else return back()->withErrors(['msg' => 'Пользователь не найден']);
    }
}
