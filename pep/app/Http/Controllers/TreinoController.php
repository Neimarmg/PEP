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
        return view('treino.cadastro',$alunos);
    }

    public function edit($id)
    {
        $alunos = Aluno::all();
        $treino = Treino::find($id);
        $atividades = Treino::find($id)->atividades;
        return view('treino.cadastro',compact('treino','atividades','alunos'));
        // return view('treino.cadastro',compact('treino','alunos'));
    }

    public function store(Request $request)
    {   
        $novoTreino = new Treino;
        $this->validate($request,[
            'instrutor_id'=>'required',
            'aluno_id'=>'required',
            'titulo'=>'required',
        ]);
        // $novoTreino = [
        //     'instrutor_id' => $request->instrutor_id,
        //     'aluno_id' => $request->aluno_id,
        //     'titulo' => $request->titulo,
        //     'comentario' => $request->comentario,
        // ];
        $novoTreino->instrutor_id   = $request->instrutor_id;
        $novoTreino->aluno_id       = $request->aluno_id;
        $novoTreino->titulo         = $request->titulo;
        $novoTreino->comentario     = $request->comentario;

        $novoTreino->save();
        // $treino = Instrutor::find($novoTreino->instrutor_id)->treinos->last();
        $treino = $novoTreino;
        $exercicios = Exercicio::all(); 
        $alunos = Instrutor::find($request->instrutor_id)->alunos; 
        // $treinos = Instrutor::find($treino->instrutor_id)->treinos;
        return view('atividade/cadastro', compact('treino','exercicios','alunos'));
        // return redirect('treino/lista/' . $request->instrutor_id);
        // return $this->index();  
    }

    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'instrutor_id'=>'required',
            'aluno_id'=>'required',
            'titulo'=>'required',
        ]);
        $atualizaTreino = [
            'instrutor_id' => $request->instrutor_id,
            'aluno_id' => $request->aluno_id,
            'titulo' => $request->titulo,
            'comentario' => $request->comentario,
        ];
        $update = Treino::find($id)->update($atualizaTreino);
        $atividades = Treino::find($id)->atividades;
        $exercicios = Exercicio::all(); 
        $alunos = Instrutor::find($request->instrutor_id)->alunos;
        $treino = Treino::find($id);
        if($update){
            // return redirect('treino');
            return view('atividade/cadastro', compact('treino','exercicios','atividades','alunos'));            
            // return redirect('treino/lista/' . $request->instrutor_id);
        }
        else
            // return redirect('atividade/cadastro', compact('treino','exercicios','atividades','alunos'));
        
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