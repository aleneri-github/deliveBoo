<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
  protected $fillable = [
    'restaurant_id',
    'name',
    'ingredients',
    'description',
    'price',
    'image',
    'visible',
    'vegetarian',
    'slug'
    ];

  public function restaurant() {
    return $this->belongsTo('App\Restaurant');
  }

  public function orders() {
    return $this->belongsToMany('App\Order');
  }
}
