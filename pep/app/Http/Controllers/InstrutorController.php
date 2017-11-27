<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instrutor;
use App\Aluno;
use App\Treino;
use App\Exercicio;

class InstrutorController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:web');
        $this->middleware('auth:instrutor');
        // $this->middleware('instrutor',['except'=>'test']);
    }

    public function index()
    {
        // $exercicio = treino::find(1)->exercicios;
        // $treino = exercicio::find(1)->treinos;
        // return $treino;
        // return view('instrutor.home', $instrutor, $alunos);
        return view('instrutor.home');
    }

    public function show()
    {
        $data['instrutors'] = Instrutor::all();
        return view('instrutor.lista',$data);
    }
    
    public function gerenciaTreinos($id)
    {
        // $treinos ['treinos'] = Treino::all();   Auth::user()->name
        $treinos ['treinos'] = Instrutor::find($id)->treinos;
        $alunos ['alunos'] = Instrutor::find($id)->alunos;
        return view('instrutor.treinos', $treinos);
    }

    public function create()
    {
        return view('instrutor.register');
    }
    
    public function edit($id)
    {
        $instrutor['instrutor'] = Instrutor::find($id);
        return view('instrutor.edit',$instrutor);
    }

    public function update(Request $request, $id)
    {
        
        if($request->has('password')){
            $instrutor = [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'registro' => $request->registro,
                'email' => $request->email,
                'password' => $request->password,
            ];
        } else{
            $instrutor = [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'registro' => $request->registro,
            ];
        }
        $update = Instrutor::find($id)->update($instrutor);
        if($update)
            return redirect('instrutor');
        else
            return redirect()->back()->withInput();
    }


    public function destroy($id)
    {
        $instrutor = Instrutor::find($id);
        if($instrutor){
            $instrutor->destroy($id);
            $msg = 'Instrutor removido com Sucesso.';
        }
        else{
            $msg = 'Instrutor não encontrado';
        }
        return redirect()
            ->back()
            ->withSucess($msg);        
    }

    public function alunos($id)
    {
        $alunos = Instrutor::find($id)->alunos;
        return view('instrutor/alunos',compact('alunos'));
    }
}
