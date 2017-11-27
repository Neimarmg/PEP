<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GrupoMuscular;

class GrupoMuscularController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web');
        // $this->middleware('auth:instrutor');
        // $this->middleware('instrutor',['except'=>'test']);
    }
    
    public function index()
    {
        // $this->middleware('auth');
        $grupomMscular ['grupoMuscular']= GrupoMuscular::all(); 
        return view('grupoMuscular.lista',$grupomMscular);
    }

    public function create()
    {
        return view('grupoMuscular.cadastro');
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $grupoMuscular['grupoMuscular'] = GrupoMuscular::find($id);
        return view('grupoMuscular.cadastro',$grupoMuscular);
    }

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