<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     protected $fillable = [
        'titulo',
    ];

    // public function users()
    // {
    //   return $this->belongsToMany(User::class);
    // }
}
