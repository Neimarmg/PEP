<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GrupoMuscular;

class GrupoMuscularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->middleware('auth');
        $grupomMscular ['grupoMuscular']= GrupoMuscular::all(); 
        return view('grupoMuscular.lista',$grupomMscular);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupoMuscular.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $novo = new GrupoMuscular;
        $this->validate($request,[
            'nome'=>'required|unique:grupo_musculars',
            'tipo'=>'required',
        ]);
        $novo->nome = $request->nome;
        $novo->tipo = $request->tipo;
        $novo->save();
        return redirect('grupoMuscular');
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
        $grupoMuscular['grupoMuscular'] = GrupoMuscular::find($id);
        return view('grupoMuscular.cadastro',$grupoMuscular);
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
            'nome'=>'required',
            'tipo'=>'required',
        ]);
        $grupoMuscular = [
            'nome' => $request->nome,
            'tipo' => $request->tipo,
        ];
        $update = GrupoMuscular::find($id)->update($grupoMuscular);
        if($update)
            return redirect('grupoMuscular');
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
        $grupoMuscular = GrupoMuscular::find($id);
        if($grupoMuscular){
            $grupoMuscular->destroy($id);
            $msg = 'Grupo Muscular removido com Sucesso.';
        }
        else{
            $msg = 'Grupo Muscular não encontrado';
        }
        return redirect()
            ->back()
            ->withSucess($msg);
    }
}