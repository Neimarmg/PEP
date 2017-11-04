<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelasController extends Controller
{
    public function NomeDaTela()
    {
        // $data['users'] = User::all();
        // return view('users',$data);
        return view('NomeDaBlade',$DadosAseremPassados);
    }
}
