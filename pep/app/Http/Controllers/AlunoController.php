<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Instrutor;
use Auth;

class AlunoController extends Controller
{
    public function __construct()
    {       
        $this->middleware('auth:aluno');            
    }

    public function index()
    {           
        $alunos ['alunos'] = Aluno::all();
        $instrutores ['instrutores'] = Instrutor::all();
        return view('aluno.home', $alunos,$instrutores);
    }

    public function selecionarInstrutor($id)
    {
        $aluno['aluno'] = Aluno::find($id);        
        $instrutores ['instrutores'] = Instrutor::all();
        return view('aluno.addinstrutor',$aluno,$instrutores);
    }

    public function show()
    {
        $data['alunos'] = Aluno::all();
        return view('aluno.lista',$data);
    }
    public function create()
    {
        return view('aluno.register');
    }
    
    public function edit($id)
    {
        $aluno['aluno'] = Aluno::find($id);
        return view('aluno.edit',$aluno);
    }

    public function update(Request $request, $id)
    {
        
        if($request->has('password')){
            $aluno = [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => $request->password,
            ];
        } else{
            $aluno = [
                'name' => $request->name,
                'lastname' => $request->lastname,
            ];
        }
        $update = Aluno::find($id)->update($aluno);
        if($update)
            return redirect('aluno');
        else
            return redirect()->back()->withInput();
    }

    public function updateInstrutor(Request $request, $id)
    {
        $aluno = [ 'instrutor_id' => $request->instrutor_id, ];

        $update = Aluno::find($id)->update($aluno);
        if($update)
            return redirect('aluno');
        else
            return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $aluno = Aluno::find($id);
        if($aluno){
            $aluno->destroy($id);
            $msg = 'Aluno removido com Sucesso.';
        }
        else{
            $msg = 'Aluno não encontrado';
        }
        return redirect()
            ->back()
            ->withSucess($msg);        
    }
}
