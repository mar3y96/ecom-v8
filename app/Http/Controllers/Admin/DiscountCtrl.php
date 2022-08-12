<?php

namespace App\Http\Controllers\Admin;

use App\Model\Site\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;

class DiscountCtrl extends Controller
{
    public function index()
    {
        $discounts = Discount::orderBy('end_date', 'DESC')->get();
        return view('admin.discounts.index',compact('discounts'));
    }

    public function store(DiscountRequest $request)
    {
        if ($request->end_date > now()) {
            $request->merge(['status'=>'avilable']);
            Discount::create($request->all());
            return redirect(url('/admin/discount-codes'))->with('done','تمت الإضافة بنجاح');
        }
        else {
            return back()->with('error','تاريخ غير صحيح');
        }

    }

    public function edit(Discount $code)
    {
        return view('admin.discounts.edit',compact('code'));       
    }

    public function update(Discount $code ,DiscountRequest $request)
    {
        if ($request->end_date > now()) {
        $code->update($request->all());
        return redirect(url('/admin/discount-codes'))->with('done','تمت التعديل بنجاح');
        }
        else {
            return back()->with('error','تاريخ غير صحيح');
        }
        
    }

}
