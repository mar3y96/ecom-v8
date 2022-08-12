<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    protected $fillable = ['body','status'];
    
    public function setBodyAttribute($value)
    {
    	$this->attributes['body'] = json_encode($value);
    }

    public function getBodyAttribute()
    {
    	return json_decode($this->attributes['body']);
    }
}
