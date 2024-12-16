<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Category extends Model
{
    //


    protected function name()
     {
       return  Attribute::make(

        get: fn (string $name) => ucfirst($name),
        set: fn (string $name) => strtolower($name)
       ); 
    }
}
