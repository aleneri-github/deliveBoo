<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function user() {
      return $this->belongsTo('App\User');
    }

    public function types() {
      return $this->belongsToMany('App\RestTypes');
    }

    public function foods() {
      return $this->hasMany('App\Food');
    }

    public function orders() {
      return $this->hasMany('App\Order');
    }

    public function beverages() {
      return $this->hasMany('App\Beverage');
    }
    
}
