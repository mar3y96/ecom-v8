<?php

namespace App\Http\Controllers\Admin;

use App\Model\Site\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactCtrl extends Controller
{
    public function index()
    {
        //
        $messages = Contact::all();
        return view('admin.contacts.index',compact('messages'));
    }

    public function show(Contact $message)
    {
        // return $product;
        return view('admin.contacts.show',compact('message'));

    }

    public function delete(Contact $message)
    {
        $message->delete();
        return back()->with('done','تم الحذف بنجاح');
    }
}
