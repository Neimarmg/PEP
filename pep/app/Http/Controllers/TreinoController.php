<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Instrutor;

class TreinoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web');
        $this->middleware('auth:instrutor');
        // $this->middleware('instrutor',['except'=>'test']);
    }

    public function index()
    {
        // $this->middleware('auth'); 
        $treinos ['treinos'] = Exercicio::all();
        // $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all(); 
        return view('treino.lista',$treinos);       
    }

    public function create()
    {
        $alunos ['alunos'] = Aluno::all();
        return view('treino.cadastro',$alunos);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}