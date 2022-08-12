<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name_ar', 'name_en', 'main_image', 'description_ar', 'description_en', 'price', 'short_description_ar', 'short_description_en', 'category_id', 'product_num', 'available_count', 'size', 'S_available_count', 'M_available_count', 'L_available_count', 'X_available_count', 'XX_available_count', '3X_available_count', 'best_offer'];


    public function orders()
    {
        return $this->belongsToMany('App\Model\Site\Order', 'order_product', 'product_id', 'order_id');
    }

    // public function setMainImageAttribute($file)
    // {

    //     $thumbnailImage = \Image::make($file);
    //     $imageName      = time().$file->getClientOriginalName();
    //     $originalPath   = public_path().'/images/product/';
    //     $thumbnailImage->save($originalPath.$imageName);
    //     $thumbnailImage->resize(200,265);

    //     $thumbnailPath  = public_path().'/thumbnail/product/';
    //     $thumbnailImage->save($thumbnailPath.$imageName); 

    //     $this->attributes['main_image'] = $imageName;
    // }

    public function setMainImageAttribute($file)
    {
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('images/product'), $fileName);
        $this->attributes['main_image'] = $fileName;
    }

    public function setSizeAttribute($size)
    {
        if (is_array($size)) {
            $this->attributes['size'] = implode('|', $size);
        } else {
            $this->attributes['size'] = $size;
        }
    }

    public function getSizeAttribute()
    {
        return explode("|", $this->attributes['size']);
    }

    public function getMainImageAttribute()
    {
        return asset('images/product/' . $this->attributes['main_image']);
    }

    public function image()
    {
        return asset('images/product/' . $this->attributes['main_image']);
    }

    public function images()
    {
        return $this->hasMany('App\Model\Admin\ProductImage', 'product_id', 'id');
    }
}
