<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimonials extends Model
{
    // In this class we have to define in which table column data, will be fill
    protected $fillable = ['title', 'message', 'image'];

}
