<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    protected $fillable = [
        'instrutor_id', 'aluno_id', 'titulo',
    ];
}
