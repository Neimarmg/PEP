<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Instrutor;
use App\Treino;
use App\Exercicio;

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
        $treinos ['treinos'] = Treino::all();
        // $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all(); 
        return view('treino.lista',$treinos);       
    }

    public function create()
    {
        $alunos ['alunos'] = Aluno::all();
        $exercicios ['exercicios'] = Exercicio::all();
        return view('treino.cadastro',$alunos,$exercicios);
    }

    public function store(Request $request)
    {   
        $treino = new Treino;
        $this->validate($request,[
            'instrutor_id'=>'required',
            'aluno_id'=>'required',
            'titulo'=>'required',
        ]);
        $treino = [
            'instrutor_id' => $request->instrutor_id,
            'aluno_id' => $request->aluno_id,
            'titulo' => $request->titulo,
            'comentario' => $request->comentario,
        ];
        $treino->save();
        // return redirect('instrutor/treinos');
        return $this->index();  
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $alunos ['alunos'] = Aluno::all();
        $treino['treino'] = Treino::find($id);
        return view('treino.cadastro',$treino,$alunos);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'instrutor_id'=>'required',
            'aluno_id'=>'required',
            'titulo'=>'required',
        ]);
        $treino = [
            'instrutor_id' => $request->instrutor_id,
            'aluno_id' => $request->aluno_id,
            'titulo' => $request->titulo,
            'comentario' => $request->comentario,
        ];
        $update = Treino::find($id)->update($treino);
        if($update)
            return redirect('treino');
        else
            return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $treino = Treino::find($id);
        if($treino){
            $treino->destroy($id);
            $msg = 'Treino removido com Sucesso.';
        }
        else{
            $msg = 'Treino não encontrado';
        }
        return redirect()
            ->back()
            ->withSucess($msg);  
    }

    public function lista($id)
    {
        $treinos ['treinos'] = Instrutor::find($id)->treinos;
        return view('treino.lista', $treinos);
    }
}