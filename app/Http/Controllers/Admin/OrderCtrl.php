<?php

namespace App\Http\Controllers\Admin;

use App\Model\Site\Order;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderCtrl extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }
    public function status($status)
    {
        // return $status;
        $orders = Order::where('status', $status)->get();
        return view('admin.orders.index', compact('orders', 'status'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function update(Order $order, Request $request)
    {
        if ($order->status == 'pending' || $order->status == 'processing' || $order->status == 'shipping') {
            $order->update(['status' => $request->status]);
            if ($request->status == 'canceled' || $request->status == 'undelivered') {
                foreach ($order->orderItems as $item) {
                    $pro = Product::find($item->id);
                    $pro->available_count += $item->pivot->qty;
                    $pro[$item->pivot->size . '_available_count'] += $item->pivot->qty;
                    $pro->save();
                }
            }
        }
        return back()->with('done', 'تم التعديل بنجاح');
    }
}
