<?php

namespace App\Http\Controllers\Site;

use Cart;
use App\Model\Site\Tax;
use App\Model\Admin\Product;
use App\Model\Site\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartCtrl extends Controller
{
    public function index()
    {
        $data = Cart::content();
        // return $data;
        return view('site.cart',compact('data'));
    }

    public function add(Product $product,$total,Request $request)
    { 
        // return $request->size;
        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name_en,
            'qty'=>$total,
            'price'=>$product->price,
            'options' => ['size' => $request->size,'image'=>$product->main_image],
        ]);
        echo trans('site.cartUpdatedSuccessfully');
        
    }

    public function quickAdd(Product $product)
    {
       
        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name_en,
            'qty'=>1,
            'price'=>$product->price,
            'options' => ['size' => $product->size[0],'image'=>$product->main_image],
        ]);
        echo trans('site.cartUpdatedSuccessfully');
    }
    public function actions($rowId,Request $request)
    { 
      
        if ($request->action=='delete') {
            Cart::remove($rowId);
            return back()->with('done',trans('site.cartUpdatedSuccessfully'));
        }
        
        elseif ($request->action=='update'){
            $cartProduct = Cart::get($rowId);
            $request->validate(['qty'=>'required|integer|min:1']);
            $pro = Product::find(Cart::get($rowId)->id);
            if ($pro[$cartProduct->options->size.'_available_count'] >= $request->qty) {   
                Cart::update($rowId,$request->qty);
                return back()->with('done',trans('site.cartUpdatedSuccessfully'));
            }
            else {
                return back()->with('error',trans('app.warningMsg'));
            }
        }
    }
    
    public function checkOut(Request $request)
    {
        // return $request;
        $cities = Tax::all();
        if ($request->discount) {
            $discount = Discount::where(['code'=>$request->discount])->where('end_date','>=',now())->first();  
        }
        // return $discount;
        if (!$request->discount) {
            $discount = null;
        }
        return view('site.check-out',compact('discount','cities'));
    }
    
    public function applyDiscount($code)
    {
        $discount =Discount::where(['code'=>$code])->where('end_date','>=',now())->first();
        if ($discount) {
            $status = 'true';
        }
        else{
            $status = 'false';
        }
        return response([
            'status'=>$status
        ]);
        // echo $code;
    }

    public function tax(Tax $city,Discount $discount=null)
    {
        // return $discount;
        $tax = $city->value;
        $html =view('site.elements.details',compact('tax','discount'))->render(); 
        return $html;
    }
}
