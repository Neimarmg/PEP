<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Treino;

class Exercicio extends Model
{
    protected $fillable = [
        'nome', 'grupo_muscular_id', 'ordem', 'carga', 'series', 'repeticoes',
    ];

    public function treinos()
    {
        return $this->belongsToMany(Treino::Class);
    }
}
