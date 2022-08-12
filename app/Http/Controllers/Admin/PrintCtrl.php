<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\PrintImage;
use App\Model\Site\PrintDesign;
use App\Http\Controllers\Controller;

class PrintCtrl extends Controller
{
    public function index()
    {
        $orders = PrintDesign::all();
        return view('admin.print.index',compact('orders'));
    }

    public function images()
    {
        $images = PrintImage::all();
        return view('admin.print.images',compact('images'));
    }

    public function storeImages(Request $request)
    {
        $request->validate(['image'=>'required|image|mimes:jpeg,png,jpg,gif,svg','title'=>'required']);   
        PrintImage::create($request->all());
        return back()->with('done','تم الإضافة بنجاح');;
    }

    public function deleteImage(PrintImage $image)
    {
        $image->delete();
        return back()->with('done','تم الحذف بنجاح');
    }

    public function show(PrintDesign $order)
    {
        $style_image = PrintImage::find($order->style_image_id);
        return view('admin.print.show',compact('style_image','order'));
    }
}
