<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:web');
        $this->middleware('auth:aluno');
        // $this->middleware('aluno',['except'=>'test']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aluno.home');
    }

    // public function test()
    // {
    //     return view('aluno.test');
    // }
}
