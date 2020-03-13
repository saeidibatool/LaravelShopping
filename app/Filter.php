<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
  protected $fillable = [
    'category_id', 'name', 'en_name', 'parent_id', 'type'
  ];
  public $timestamps = false;

  public function category(){
    return $this->belongsTo(Category::class);
  }
}
