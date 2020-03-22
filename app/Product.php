<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['name','brand_id', 'user_id', 'image', 'body', 'price', 'discount','status', 'count', 'category_id'];
    public function brand(){
      return $this->belongsTo(Brand::class);
    }
    public function image(){
      return $this->hasMany(Image::class);
    }
    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function basket(){
      return $this->hasMany(Basket::class);
    }
}
