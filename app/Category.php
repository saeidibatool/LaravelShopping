<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
      'title', 'title_fa', 'chId', 'image',
  ];
  public function product(){
    return $this->hasMany(Product::class);
  }

  public function filter(){
    return $this->hasMany(Filter::class);
  }

  public static function search($data){
    $category = Category::orderBy('id','DESC');
    if(sizeof($data) > 0){
      // dd($data);
      if(array_key_exists('name', $data)){
        $category = $category->where('title','like','%'.$data['name'].'%')
                              ->orWhere('title_fa','like','%'.$data['name'].'%');
      }
    }

    $category = $category->paginate(10);
    return $category;
  }
}
