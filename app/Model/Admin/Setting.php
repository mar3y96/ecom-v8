<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable =['siteTitle','tags','description','about_en','about_ar','about_section1_image','about_section2_image','vision_ar','vision_en','mission_en','mission_ar','goals_en','goals_ar','phone','phone2', 'facebook', 'twitter', 'instagram', 'google_plus','site_url','site_email','address_ar','address_en','site_logo'];

    public function setAboutSection1ImageAttribute($value)
    {
        $name = time().'.'.$value->getClientOriginalExtension();
        $destinationPath = public_path('settings/images/');
        $value->move($destinationPath, $name);
        $this->attributes['about_section1_image'] = $name;
    }
    
    public function setSiteLogoAttribute($value)
    {
        $name = time().'.'.$value->getClientOriginalExtension();
        $destinationPath = public_path('settings/images/');
        $value->move($destinationPath, $name);
        $this->attributes['site_logo'] = $name;
    }

    public function getSiteLogoAttribute()
    {
        return asset('settings/images/'.$this->attributes['site_logo']);
    }

    public function getAboutSection1ImageAttribute()
    {
        return asset('settings/images/'.$this->attributes['about_section1_image']);
    }

    public function setAboutSection2ImageAttribute($value)
    {
        $name = time().'.'.$value->getClientOriginalExtension();
        $destinationPath = public_path('settings/images/');
        $value->move($destinationPath, $name);
        $this->attributes['about_section2_image'] = $name;
    }
    public function getAboutSection2ImageAttribute()
    {
        return asset('settings/images/'.$this->attributes['about_section2_image']);
    }
}
