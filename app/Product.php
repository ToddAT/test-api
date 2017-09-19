<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'description', 'price', 'image'];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function owners()
    {
        return $this->belongsToMany('App\User', 'links', 'pid', 'uid')->using('App\Link')->as('users')->withTimestamps();
    }
}
