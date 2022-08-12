<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Model\Site\Subscribe;
use App\Http\Controllers\Controller;

class SubscribeCtrl extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['email'=>'required|email|unique:subscribes']);
        Subscribe::create($request->all());
        return response(['data'=>trans('site.SubscribedSuccessfully')]);
    }
    public function cancel( $email)
    {
        $e = Subscribe::where('email',$email)->firstOrFail();
        $e->delete();
        return redirect(url('/'));
    }
}
