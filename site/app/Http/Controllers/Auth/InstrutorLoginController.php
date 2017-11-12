<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class InstrutorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:instrutor', ['except'=> ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.instrutor-login');
    }

    public function login(Request $request)
    {
        // validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        // Attempt to log the user in
        if(Auth::guard('instrutor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // If successfull, then redirect to their intended location
            return redirect()->intended(route('instrutor.dashboard'));
        }

        // If unsuccessfull, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('instrutor')->logout();
        return redirect('/');
    }
}
