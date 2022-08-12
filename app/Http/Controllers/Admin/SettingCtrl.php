<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingCtrl extends Controller
{
    public function saveSettings(Request $request)
    {
    	// return $request->image;
    	$data =$request->except('_method','_token','about_section2_image','about_section1_image');
        $updated = settings();
    	if ($request->has('about_section1_image')) {
    		$updated->about_section1_image = $request->about_section1_image;
        }
        if ($request->has('about_section2_image')) {
    		$updated->about_section2_image = $request->about_section2_image;
    	}
        $updated->update($data);
        return redirect('admin/settings')->with('done',trans('updated successfully'));
    }
}
