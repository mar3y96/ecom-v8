<?php

namespace App\Http\Controllers\Site;

use App\Model\Site\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactRequest;

class ContactCtrl extends Controller
{
    public function create(ContactRequest $request)
    {
        Contact::create($request->all());
        return back()->with('done','your message has been sent successfully');
    }
}
