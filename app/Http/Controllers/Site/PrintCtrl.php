<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Model\Site\PrintDesign;
use App\Http\Controllers\Controller;

class PrintCtrl extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required",
            "phone"=> "required",
            "email"=> "required",
            "qty"=> "required|integer",
            "color"=> "required",
            "description"=> "required",
            "design"=>"image" 
        ]);
        PrintDesign::create($request->all());
        return back()->with('done','your design has been sent successfully');
    }
}
