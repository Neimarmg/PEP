<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('aluno');
        // $this->middleware('aluno',['except'=>'test']);
    }

    public function index()
    {
        return view('aluno.home');
    }

    public function test()
    {
        return view('admin.test');
    }
}