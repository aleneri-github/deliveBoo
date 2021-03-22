<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  protected $fillable = [
    'name',
    'surname',
    'buyer_address',
    'buyer_email',
    'total',
  ];

    public function dishes() {
      return $this->belongsToMany('App\Dish');
    }

}
