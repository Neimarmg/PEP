<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atividade;
use App\Exercicio;

class AtividadeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web');
        // $this->middleware('auth:instrutor');
        // $this->middleware('instrutor',['except'=>'test']);
    }

    public function index()
    {
        $atividades ['atividades'] = Atividade::all();
        $exercicios ['exercicios'] = Exercicio::all(); 
        return view('atividade.lista',$atividades,$exercicios);
        // return view('atividade.lista',compact('atividades'));

        // $atividades ['atividades'] = Atividade::all();
        // $exercicios ['exercicios'] = Exercicio::all(); 
        // if($this->middleware('auth')){
        //     return view('shared.filtroLogado');
        // } else {
        //     return view('atividade.lista',$atividades,$exercicios);            
        // }
    }

    public function create()
    {
        $exercicios ['exercicios'] = Exercicio::all(); 
        return view('atividade.cadastro',$exercicios);
    }

    public function store(Request $request)
    {    
        $atividade = new Atividade;
        $atividade->exercicio_id = $request->exercicio_id;
        $atividade->ordem = $request->ordem;
        $atividade->carga = $request->carga;
        $atividade->series = $request->series;
        $atividade->repeticoes = $request->repeticoes;
        $atividade->save();
        return redirect('atividade');
        // return redirect()->back()->withInput();
        
        // return redirect('atividade',$exercicios);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $exercicios ['exercicios'] = Exercicio::all();              
        $atividade['atividade'] = Atividade::find($id);
        return view('atividade.cadastro',$atividade,$exercicios);
    }

    public function update(Request $request, $id)
    {
        $exercicios ['exercicios'] = Exercicio::all();        
        $atividade = [
            'nome' => $request->nome,
            'grupo_muscular_id' => $request->grupo_musular_id,
            'ordem' => $request->ordem,
            'carga' => $request->carga,
            'series' => $request->series,
            'repeticoes' => $request->repeticoes,
        ];
        $update = Atividade::find($id)->update($atividade);
        if($update)
            return redirect('atividade');
        else
            return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $atividade = Atividade::find($id);
        if($atividade){
            $atividade->destroy($id);
            $msg = '* EXERCÍCIO REMOVIDO COM SUCESSO *';
        }
        else{
            $msg = '* EXERCÍCIO NÃO ENCONTRADO *';
        }
        return redirect()
            ->back()
            ->withSucess($msg);   
    }
}