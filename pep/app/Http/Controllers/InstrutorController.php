<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstrutorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:web');
        $this->middleware('auth:instrutor');
        // $this->middleware('instrutor',['except'=>'test']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instrutor.home');
    }

    // public function test()
    // {
    //     return view('instrutor.test');
    // }
}
