<?php

namespace App\Model\Site;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['count', 'total', 'status', 'f_name', 's_name', 'email', 'phone', 'address', 'city_id', 'user_id','discount_id','subtotal','discount','shipping'];

    public function orderItems()
    {
        return $this->belongsToMany('App\Model\Admin\Product', 'order_product',  'order_id','product_id')->withPivot('total','qty','size');
    }

    public function discountCode()
    {
        return $this->hasOne('App\Model\Site\Discount', 'id', 'discount_id');
    }
    
}
