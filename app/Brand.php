<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected $fillable = [
      'name','en_name'
  ];
    public function product(){
      return $this->hasMany(Product::class);
    }

    public static function search($data){
      $brand=Brand::orderBy('id','DESC');
      if(sizeof($data) > 0){
        if(array_key_exists('name', $data)){
          $brand = $brand->where('name','like','%'.$data['name'].'%');
        }

      }
      $brand=$brand->paginate(10);
      return $brand;
      // dd($data);
    }
}
