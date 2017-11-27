<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AlunoResetPasswordNotification;
use App\Instrutor;

class Aluno extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'lastname', 'instrutor_id', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AlunoResetPasswordNotification($token));
    }

    public function instrutor()
    {
        return $this->belongsTo(Instrutor::Class);
    }
}
