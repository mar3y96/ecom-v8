<?php

namespace App\Model\Site;

use Illuminate\Database\Eloquent\Model;

class PrintDesign extends Model
{
    protected $fillable =['name', 'phone', 'email', 'style_image_id', 'qty', 'color', 'description', 'design'];

    public function setDesignAttribute($file)
    {
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move(public_path('images/print/design'),$fileName);
        $this->attributes['design'] = $fileName;
    }

    public function getDesignAttribute()
    {
        return asset('images/print/design/'.$this->attributes['design']);
    }
}
