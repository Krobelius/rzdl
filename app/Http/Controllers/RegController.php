<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegController extends Controller
{
    public function reg(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'email'=>['required','email','unique:users'],
            'password'=>['required','min:8']
        ]);
        try{
            $valid->validate();
            $pass_hashed = md5($request->get('password'));
            $mail = $request->get('email');
            $user = new User();
            $user->email = $mail;
            $user->password = $pass_hashed;
            $user->save();
            Auth::login($user);
            return response(['status'=>'success']);
        } catch (\Throwable $e){
            return response(['status'=>'error','msg'=>'Данные неверны!']);
        }
    }
}
