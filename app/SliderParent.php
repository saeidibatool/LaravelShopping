<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderParent extends Model
{
  protected $fillable = [
    'name', 'en_name',
  ];

  public function slider(){
    return $this->hasMany(Slider::class);
  }
}
