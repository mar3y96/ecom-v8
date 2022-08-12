<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PrintImage extends Model
{
    protected $fillable = ['image','title'];

    public function setImageAttribute($file)
    {
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move(public_path('images/print'),$fileName);
        $this->attributes['image'] = $fileName;
    }

    public function getImageAttribute()
    {
        return asset('images/print/'.$this->attributes['image']);
    }
}
