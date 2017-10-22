<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercicio;

class ExercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercicios ['exercicios'] = Exercicio::all(); 
        // $exercicios = Exercicio::all(); 
        return view('exercicios.exercicio',$exercicios);
        // return view('exercicios.exercicio',compact('exercicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exercicios.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exercicio = new Exercicio;
        $this->validate($request,[
            'nome'=>'required|unique:exercicios',
            // 'carga'=>'required',
            // 'series'=>'required',
            // 'repeticoes'=>'required',
        ]);
        $exercicio->nome = $request->nome;
        $exercicio->ordem = $request->ordem;
        $exercicio->carga = $request->carga;
        $exercicio->series = $request->series;
        $exercicio->repeticoes = $request->repeticoes;
        $exercicio->save();
        return redirect('exercicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercicio['exercicio'] = Exercicio::find($id);
        return view('exercicios.formulario',$exercicio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome'=>'required|unique:exercicios',
            // 'carga'=>'required',
            // 'series'=>'required',
            // 'repeticoes'=>'required',
        ]);
        $exercicio = [
            'nome' => $request->nome,
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercicio = Exercicio::find($id);
        if($exercicio){
            $exercicio->destroy($id);
            $msg = 'Exercício removido com Sucesso.';
        }
        else{
            $msg = 'Exercício não encontrado';
        }
        return redirect()
            ->back()
            ->withSucess($msg);   
    }
}
