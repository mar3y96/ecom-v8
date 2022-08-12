<?php

namespace App\Model\Site;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable =['name','email','subject','content'];
}
