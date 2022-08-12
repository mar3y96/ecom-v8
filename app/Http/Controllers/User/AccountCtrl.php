<?php

namespace App\Http\Controllers\User;

use App\Model\Site\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountCtrl extends Controller
{
    public function orders()
    {
        $user = Auth::user();
        $orders = $user->orders->whereNotIn('status',['canceled-user']);
        // return $orders;
        return view('user.orders',compact('orders'));
    }
    public function orderStatus(Order $order)
    {
        $user = Auth::user();
        if ($order->user_id==$user->id) {
            return view('user.order-status',compact('order'));
        }
        else {
            abort(404);
        }
        
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required'
        ]);
        if ($request->password==null) {
            $user->update($request->only(['f_name','l_name','email']));
        }
        else{
        // return $request;
            $request->validate([
                'password'=>'string|min:6'
            ]);
            $user->update($request->all());
        }
        return back();
    }
}
