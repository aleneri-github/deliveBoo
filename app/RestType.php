<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestType extends Model
{
    public function restaurants() {
      return $this->belongsToMany('App\Restaurant');
    }
}
