<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\SendEmailJob;
use App\Mail\SubscribeMails;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use App\Model\Site\Subscribe;
use App\Model\Admin\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\ProductAddRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;

class ProductCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {
        $available = 0;
        foreach ($request->size as $s) {
            $request->validate([
                $s . '_available_count' => 'required|min:1'
            ]);
            $available += $request[$s . '_available_count'];
        }
        $request->merge(['available_count' => $available]);
        // return $request;
        $subscribes = Subscribe::select('email')->get();
        $request->merge(['product_num' => rand(10000, 1000000)]);
        $product = Product::create($request->all());
        // Subscribe
        foreach ($subscribes as $sub) {
            SendEmailJob::dispatch($sub->email, $product->id);
        }
        return back()->with('done', 'تم اضافة منتج بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return $product;
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // return $product;
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $available = 0;
        foreach ($request->size as $s) {
            $request->validate([
                $s . '_available_count' => 'required|min:1'
            ]);
            $available += $request[$s . '_available_count'];
        }
        $request->merge(['available_count' => $available]);
        $product->update($request->all());
        return back()->with('done', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->orders->count() > 0) {
            return back()->with('error', 'لا يمكن مسح هذا المنتج');
        } else {

            $product->delete();
            return back()->with('done', 'تم الحذف بنجاح');
        }
    }

    public function images(Product $product)
    {
        return view('admin.products.images', compact('product'));
    }

    public function storeImages(Product $product, Request $request)
    {
        $request->validate(['images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg']);
        foreach ($request->images as  $image) {
            ProductImage::create(['image' => $image, 'product_id' => $product->id]);
        }
        return back()->with('done', 'تم الإضافة بنجاح');;
    }

    public function deleteImages(ProductImage $image)
    {
        $image->delete();
        return back()->with('done', 'تم الحذف بنجاح');
    }

    public function bestOffer(Product $product)
    {
        $bestOffer = Product::whereNotNull('best_offer')->first();
        if ($bestOffer) {
            $bestOffer->update(['best_offer' => null]);
        }
        $product->update(['best_offer' => 'best']);
    }
}
