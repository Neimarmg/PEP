<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercicio;
use App\GrupoMuscular;

class ExercicioController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web');
        $this->middleware('auth:instrutor');
        // $this->middleware('instrutor',['except'=>'test']);
    }

    public function index()
    {
        $exercicios ['exercicios'] = Exercicio::all();
        $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all(); 
        return view('exercicio.lista',$exercicios,$grupoMusculars);
        // return view('exercicio.lista',compact('exercicios'));

        // $exercicios ['exercicios'] = Exercicio::all();
        // $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all(); 
        // if($this->middleware('auth')){
        //     return view('shared.filtroLogado');
        // } else {
        //     return view('exercicio.lista',$exercicios,$grupoMusculars);            
        // }
    }

    public function create()
    {
        $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all(); 
        return view('exercicio.cadastro',$grupoMusculars);
    }

    public function store(Request $request)
    {
        // $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all();      
        // $grupoMusculars ['grupoMusculars'] = GrupoMuscular::lists('id','nome')->all();      
        $exercicio = new Exercicio;
        $this->validate($request,[
            'nome'=>'required|unique:exercicios',
            // 'carga'=>'required',
            // 'series'=>'required',
            // 'repeticoes'=>'required',
        ]);
        $exercicio->nome = $request->nome;
        // $exercicio->grupo_muscular_id = $request->grupo_Muscular_id;
        $exercicio->ordem = $request->ordem;
        $exercicio->carga = $request->carga;
        $exercicio->series = $request->series;
        $exercicio->repeticoes = $request->repeticoes;
        $exercicio->save();
        return redirect('exercicio');
        // return redirect()->back()->withInput();
        
        // return redirect('exercicio',$grupoMusculars);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all();              
        $exercicio['exercicio'] = Exercicio::find($id);
        return view('exercicio.cadastro',$exercicio,$grupoMusculars);
    }

    public function update(Request $request, $id)
    {
        // $this->validate($request,[
            // 'nome'=>'required|unique:exercicios',
            // 'grupo_musular_id'=>'required',
            // 'carga'=>'required',
            // 'series'=>'required',
            // 'repeticoes'=>'required',
        // ]);
        $grupoMusculars ['grupoMusculars'] = GrupoMuscular::all();        
        $exercicio = [
            'nome' => $request->nome,
            // 'grupo_musular_id' => $request->grupo_musular_id,
            'ordem' => $request->ordem,
            'carga' => $request->carga,
            'series' => $request->series,
            'repeticoes' => $request->repeticoes,
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