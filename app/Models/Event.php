<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    
    protected function price()
     {
       return  Attribute::make(

        get: fn ( $price) => $price / 100,
        set: fn ( $price) => $price *100
       ); 
    }
}
