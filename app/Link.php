<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Link extends Pivot
{
  protected $fillable = [
      'uid', 'pid',
  ];

  protected $hidden = [
      'updated_at', 'created_at'
  ];

  protected $table = 'links';

  public function scopeOfProduct($query, $product)
  {
    return $query->where('pid', $product);
  }

  public function scopeOfUser($query, $user)
  {
    return $query->where('uid', $user);
  }

}
