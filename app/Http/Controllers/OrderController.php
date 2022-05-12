<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function add(\Illuminate\Http\Request $request)
    {
        $user = Auth::user();
        if(!$user) return response('error',500);
        $order = new Order();
        $order->userid = $user->id;
        $order->products = $request->get('product');
        $order->save();
        return response('success');
    }

    public function setComment(\Illuminate\Http\Request $request)
    {
        $comm = $request->get('comment');
        try{
            Order::where('userid',Auth::id())->update(['comment'=>$comm]);
        } catch (\Throwable $e) {
            return response(['status'=>'error']);
        }
        return response(['status'=>'success']);
    }
}
