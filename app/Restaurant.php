<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function user() {
      return $this->belongsTo('App\User');
    }

    public function types() {
      return $this->belongsToMany('App\RestType');
    }

    public function foods() {
      return $this->hasMany('App\Food');
    }

}
