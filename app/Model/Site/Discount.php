<?php

namespace App\Model\Site;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable =['code','value','end_date','status'];
}
