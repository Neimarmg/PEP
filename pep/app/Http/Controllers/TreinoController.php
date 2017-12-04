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

    public function salvar(Request $request)
    {   
        $treino = new Treino;
        $this->validate($request,[
            'instrutor_id'=>'required',
            'aluno_id'=>'required',
            'titulo'=>'required',
        ]);
        $treino->instrutor_id = $request->instrutor_id;
        $treino->aluno_id = $request->aluno_id;
        $treino->titulo = $request->titulo;
        $treino->comentario = $request->comentario;
        $treino->save();
        return redirect('atividade/cadastro',$treino);
        // return $this->index();  
    }

    public function store(Request $request)
    {   
        $data = new Treino;
        $this->validate($request,[
            'instrutor_id'=>'required',
            'aluno_id'=>'required',
            'titulo'=>'required',
        ]);
        $data->instrutor_id = $request->instrutor_id;
        $data->aluno_id = $request->aluno_id;
        $data->titulo = $request->titulo;
        $data->comentario = $request->comentario;
        $data->save();
        $treino = Instrutor::find($data->instrutor_id)->treinos->last();
        $exercicios = Exercicio::all(); 
        $alunos = Instrutor::find($data->instrutor_id)->alunos; 
        // $treinos = Instrutor::find($treino->instrutor_id)->treinos;
        return view('atividade/cadastro', compact('treino','exercicios','alunos'));
        // return redirect('treino/lista/' . $request->instrutor_id);
        // return $this->index();  
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $alunos = Aluno::all();
        $treino = Treino::find($id);
        $atividades = Treino::find($id)->atividades;
        return view('treino.cadastro',compact('treino','atividades','alunos'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'instrutor_id'=>'required',
            'aluno_id'=>'required',
            'titulo'=>'required',
        ]);
        $data = [
            'instrutor_id' => $request->instrutor_id,
            'aluno_id' => $request->aluno_id,
            'titulo' => $request->titulo,
            'comentario' => $request->comentario,
        ];
        $update = Treino::find($id)->update($data);
        if($update){
            $treino = Treino::find($id);
            $exercicios = Exercicio::all(); 
            $alunos = Instrutor::find($treino->instrutor_id)->alunos;
            // return redirect('treino');
            return view('atividade/cadastro', compact('treino','exercicios','alunos'));            
            // return redirect('treino/lista/' . $request->instrutor_id);
        }
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