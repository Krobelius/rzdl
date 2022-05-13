<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});
Route::get("/order",function (){
    return view('order');
});

Route::post('/auth',[\App\Http\Controllers\AuthController::class,'auth']);
Route::post('/reg',[\App\Http\Controllers\RegController::class,'reg']);
Route::post('/add_order',[\App\Http\Controllers\OrderController::class,'add']);
Route::post('/set_comment_order',[\App\Http\Controllers\OrderController::class,'setComment']);
Route::get('/logout',function (){
   \Illuminate\Support\Facades\Auth::logout();
   return redirect('/');
});
