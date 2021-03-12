<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function order() {
      return $this->belongsTo('App\Order');
    }

    public function foods() {
      return $this->hasMany('App\Food');
    }

    public function beverages() {
      return $this->hasMany('App\Beverage');
    }

}
