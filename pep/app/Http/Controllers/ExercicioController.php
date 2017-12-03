<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercicio;
use App\GrupoMuscular;
use App\Atividade;

class ExercicioController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web');
        // $this->middleware('auth:instrutor');
        // $this->middleware('instrutor',['except'=>'test']);
    }

    public function index()
    {
        $exercicios ['exercicios'] = Exercicio::all();
        $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all(); 
        $atividades ['atividades'] = Atividade::all(); 
        return view('exercicio.lista', $exercicios, $grupoMusculars, $atividades);
    }

    public function create()
    {
        $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all();
        $atividades ['atividades'] = Atividade::all();
        return view('exercicio.cadastro',$grupoMusculars,$atividades);
    }

    public function store(Request $request)
    {    
        $exercicio = new Exercicio;
        $this->validate($request,[
            'nome'=>'required|unique:exercicios',
            'grupo_muscular_id'=>'required',
        ]);
        $exercicio->nome = $request->nome;
        $exercicio->grupo_muscular_id = $request->grupo_muscular_id;
        // OLD!!!! $exercicio->ordem = $request->ordem;
        // $exercicio->carga = $request->carga;
        // $exercicio->series = $request->series;
        // $exercicio->repeticoes = $request->repeticoes;
        $exercicio->save();
        return redirect('exercicio');
        // return redirect()->back()->withInput();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all();
        $atividades ['atividades'] = Atividade::all();
        $exercicio['exercicio'] = Exercicio::find($id);
        return view('exercicio.cadastro',$exercicio,$grupoMusculars,$atividades);
    }

    public function update(Request $request, $id)
    {
        $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all();
        $exercicio = [
            'nome' => $request->nome,
            'grupo_muscular_id' => $request->grupo_muscular_id,
            // 'ordem' => $request->ordem,
            // 'carga' => $request->carga,
            // 'series' => $request->series,
            // 'repeticoes' => $request->repeticoes,
        ];
        $update = Exercicio::find($id)->update($exercicio);
        if($update)
            return redirect('exercicio');
        else
            return redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $exercicio = Exercicio::find($id);
        if($exercicio){
            $exercicio->destroy($id);
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