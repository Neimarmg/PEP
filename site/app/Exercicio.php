<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'nome', 'ordem', 'carga', 'series', 'repeticoes',
    ];
}