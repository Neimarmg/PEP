<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:aluno');
    }

    public function showLinkRequestForm()
    {
        return view('aluno.passwords.email');
    }

    public function broker()
    {
        return Password::broker('alunos');
    }
}
