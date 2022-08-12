<?php

namespace App\Http\Controllers\User;

use Cart;
use App\Model\Site\Tax;
use App\Model\Site\Order;
use App\Model\Admin\Product;
use App\Model\Site\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\AdminNotification;
use App\Http\Requests\Site\OrderRequest;

class OrderCtrl extends Controller
{
    public function create(OrderRequest $request, Discount $discount = null)
    {
        $city = Tax::find($request->city);
        $user = Auth::user();
        if ($discount) {
            $request->merge(['count' => Cart::count(), 'subtotal' => Cart::subtotal(2, '.', ''), 'discount' => (int)(Cart::subtotal(2, '.', '') * $discount->value / 100), 'shipping' => $city->value, 'total' => Cart::subtotal(2, '.', '') + $city->value - (int)(Cart::subtotal(2, '.', '') * $discount->value / 100), 'status' => 'pending', 'user_id' => $user->id, 'city_id' => $city->city_name_ar]);
        } else {
            $request->merge(['count' => Cart::count(), 'subtotal' => Cart::subtotal(2, '.', ''), 'shipping' => $city->value, 'total' => Cart::subtotal(2, '.', '') + $city->value, 'status' => 'pending', 'user_id' => $user->id, 'city_id' => $city->city_name_ar]);
        }
        $order = $user->orders()->create($request->all());
        $cartContent = Cart::content();
        foreach ($cartContent as $item) {
            $number_of_pices = Product::find($item->id)[$item->options->size.'_available_count'];
            if (( $number_of_pices - $item->qty) >= 0) {
                $order->orderItems()->attach($item->id, ['qty' => $item->qty, 'total' => (int)($item->qty * $item->price), 'size' => $item->options->size]);
            } else {
                $order->delete();
                return redirect(url('/cart'))->with('error', 'There is an error in your order');
            }
        }
        foreach ($cartContent as $item) {
            $pro = Product::find($item->id);
            $pro[$item->options->size.'_available_count'] -= $item->qty;
            $pro->available_count -= $item->qty;
            $pro->save();
        }
        if ($discount) {
            $order->update(['discount_id' => $discount->id]);
        }
        AdminNotification::create([
            'body' => [
                'link' => 'admin/orders/' . $order->id . '/show',
                'message' => '<span style="color:blue"> طلب جديد </span>',
            ]
        ]);
        Cart::destroy();
        return  redirect(url('/orders'));
    }

    public function cancel(Order $order)
    {
        // return $order;
        if ($order->user_id == Auth::user()->id) {
            $order->update(['status' => 'canceled-user']);
            foreach ($order->orderItems as $item) {
                $pro = Product::find($item->id);
                $pro->available_count += $item->pivot->qty;
                $pro[$item->pivot->size.'_available_count'] += $item->pivot->qty;
                $pro->save();
            }
            AdminNotification::create([
                'body' => [
                    'link' => 'admin/orders/' . $order->id . '/show',
                    'message' => '<span style="color:blue"> تم إسترجاع 
                    طلب </span>',
                ]
            ]);
            return back();
        }
    }
}
