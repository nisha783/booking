<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'name',
    'description',
    'category_id',
    'type',
    'price',
    'location',
    'start_time',
    'end_time',
    'max_attendence',
  ];


  protected function price()
  {
    return  Attribute::make(

      get: fn($price) => $price / 100,
      set: fn($price) => $price * 100
    );
  }


  protected function location()
  {
    return  Attribute::make(

      get: fn($value) => $value,
      set: fn($value) => $value 
    );
  }

  public function  category()
  {
      return  $this->belongsTo(category::class, 'category_id');
  }
}
