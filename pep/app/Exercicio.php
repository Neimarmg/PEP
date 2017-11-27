<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    protected $fillable = [
        'nome', 'grupo_muscular_id', 'ordem', 'carga', 'series', 'repeticoes',
    ];
}
