<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    public function restaurant() {
      return $this->belongsTo('App\Restaurant');
    }
}
