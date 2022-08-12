<?php

namespace App\Http\Controllers\User;

use App\Model\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistCtrl extends Controller
{
    public function add(Product $product)
    {
        if ($product) {  
            $user = Auth::user();
            $select = DB::table('product_user')->where('user_id',$user->id)->where('product_id',$product->id )->count();
            if ($select!='1') {
                $user->products()->syncWithoutDetaching($product->id);
                echo trans('site.addSuccessfully');
            }
            else{
                echo trans('site.alreadyExists');
            }
        }
    }
    
    public function index()
    {
        $user = Auth::user();
        $products = $user->products;
        return view('site.products',compact('products'));
    }

    public function remove($product)
    {
        $user = Auth::user();
        $user->products()->detach($product);   
        return back();     
    }
}
