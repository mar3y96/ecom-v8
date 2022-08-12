<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_id','image'];
    public function setImageAttribute($file)
    {
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move(public_path('images/product/images'),$fileName);
        $this->attributes['image'] = $fileName;
    }
    public function getImageAttribute()
    {
        return asset('images/product/images/'.$this->attributes['image']);
    }
}
