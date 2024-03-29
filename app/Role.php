<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $fillable = [
      'name', 'title',
  ];

  public function permissions(){
    return $this->belongsToMany(Permission::class);
  }

  public function users(){
    return $this->belongsToMany(User::class);
  }


}
