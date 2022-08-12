<?php

namespace App\Http\Controllers\Admin;

use App\Model\Site\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TaxRequest;

class TaxCtrl extends Controller
{
    public function index()
    {
        $taxes = Tax::all();
        return view('admin.taxes.index',compact('taxes'));
    }

    public function store(TaxRequest $request)
    {
        Tax::create($request->all());
        return redirect(url('/admin/tax'))->with('done','تمت الإضافة بنجاح');
    }

    public function edit(Tax $tax)
    {
        return view('admin.taxes.edit',compact('tax'));       
    }

    public function update(Tax $tax ,TaxRequest $request)
    {
        $tax->update($request->all());
        return redirect(url('/admin/tax'))->with('done','تمت التعديل بنجاح');
        
    }
}
