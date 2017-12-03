<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exercicio;

class Atividade extends Model
{
    protected $fillable = [
        'exercicio_id', 'ordem', 'carga', 'series', 'repeticoes',
    ];

    public function exercicio()
    {
        return $this->belongsTo(Exercicio::Class);
    }
}
