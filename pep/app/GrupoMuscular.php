<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoMuscular extends Model
{
    protected $fillable = [
        'nome', 'tipo',
    ];
}
