<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCtrl extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('admin')->user();
        if ($user->pre) {
            $admins = Admin::where('email','<>',$user->email)->where('password','<>',$user->password)->get();
            return view('admin.admins.index',compact('admins'));
        }
        else {
            abort(404);
        }
    }

    public function profile(Request $request)
    {
        $user = auth()->guard('admin')->user();
        return view('admin.profile',compact('user'));
    }

    public function store(Request $request,Admin $admin)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6',
        ]);
        
        $admin->name = $request->name; 
        $admin->email = $request->email; 
        $admin->password = bcrypt($request->password); 
        if ($request->has('pre')) {
            $admin->pre = $request->pre;
        }
        $admin->save();
        return redirect('admin/admins')->with('success','تمت الاضافة بنجاح'); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->guard('admin')->user();
        if ($user->pre) {        
        return view('admin.admins.create');
        }
        else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        // return($admins);
        return view('admin.admins.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $user = auth()->guard('admin')->user();
        if ($user->pre) {   
        return view('admin.admins.edit',compact('admin'));
        }
        else {
            abort(404);
        }
    }

    public function update(Request $request,Admin $admin)
    {
        // return $request;
        $request->validate([
        	'name'=>'required',
        	'email'=>'required',
        ]);
        if ($request->has('pre')) {
            $request->merge(['pre'=> $request->pre ]);
        }
        else{
            $admin->pre = null;
            $admin->save();
        }
        if ($request->password == null) {
            $admin->update($request->except('password'));
        }
        else{
            $request->merge(['password'=> bcrypt($request->password) ]);
            $admin->update($request->all());
        }

        return back()->with('done','تم التعديل بنجاح');
        
    }
    public function updateProfile(Request $request)
    {
        // return $request->all();
        $request->validate([
        	'name'=>'required',
        	'email'=>'required',
        ]);
        $user = auth()->guard('admin')->user();
        
        if ($request->password == null) {
            $user->update($request->except('password'));
        }else{
            $request->merge(['password'=> bcrypt($request->password) ]);
            $user->update($request->all());
        }

        return back()->with('done','تم التعديل بنجاح');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return back()->with('done','تم الحذف بنجاح');
    }
    
}
