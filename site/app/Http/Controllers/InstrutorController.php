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
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $data['instrutors'] = Instrutor::all();
        return view('users.instrutor.lista',$data);
    }

    public function create()
    {
        return view('users.instrutor.register');
    }
    
    // public function store(Request $request)
    // {
    //     $instrutor = [
    //         'name' => $request->nome,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->nome),
    //     ];
    //     $save = Instrutor::insert($instrutor);
    //     if($save)
    //         return redirect('instrutors');
    //     else
    //         return redirect()->back()->withInput();
    // }

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
            return redirect()->back()->withInput();
    }

    // public function edit($id)
    // {
    //     $data['instrutors'] = Instrutor::find($id);
    //     return view('users.instrutor.lista',$data);
    // }
    public function edit($id)
    {
        $data['instrutors'] = Instrutor::find($id);
        return view('users.instrutor.register',$data);
    }

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