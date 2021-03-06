<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  protected $fillable = [
    'user_id',
    'name',
    'address',
    'phone_number',
    'website',
    'email_rest',
    'image',
    'vat',
    'slug'
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function types() {
    return $this->belongsToMany('App\RestType');
  }

  public function dishes() {
    return $this->hasMany('App\Dish');
  }

}
