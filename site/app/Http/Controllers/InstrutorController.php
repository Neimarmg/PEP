<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instrutor;
use Hash;

class InstrutorController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['instrutors'] = Instrutor::all();
        return view('users.instrutor.lista',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.instrutor.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instrutor = new Instrutor;
        $this->validate($request,[
            'nome'=>'required|unique:instrutors',
            'email'=>'required|unique:instrutors',
        ]);
        $instrutor->name = $request->name;
        $instrutor->email = $request->email;
        $instrutor->password = $request->Hash::make($request->name);
        $instrutor->save();
        
        // return redirect('instrutor');

        // $instrutor = [
        //     'name' => $request->nome,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->nome),
        // ];
        // $save = Instrutor::insert($instrutor);
        // if($save)
        //     return redirect('instrutors');
        // else
            return redirect()->back()->withInput();
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
        $data['instrutor'] = Instrutor::find($id);
        return view('users.instrutor.register',$data);
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
        if($request->has('password')){
            $password = $request->password;
            $instrutor = [
                'name' => $request->nome,
                'email' => $request->email,
                'password' => $password,
            ];
        }
        else{
            $instrutor = [
                'name' => $request->nome,
                'email' => $request->email,
            ];
        }
        $update = Instrutor::find($id)->update($instrutor);
        if($update)
            return redirect('instrutor');
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
}
