<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a form to register.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerForm()
    {
        return view('pages.register');
    }

    /**
     * Store a new user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|filled',
            'email' => 'required|email:filter|string|filled',
            'password' => 'required|string|confirmed|filled',
        ]);
        
        $credentials = ['email' => $request->email, 'password' => $request->password];
        
        $request['password'] = Hash::make($request->password);

        User::create($request->except('_token','password_confirmation'));

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        }

        return redirect()->route('main.index');

    }

}
