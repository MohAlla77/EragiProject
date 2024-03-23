<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request){
        //validated
        //create user
        //redirect

        $validated  = $request->validated();


       $user =  User::create(
            [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                // 'role' => $validated['role'],

            ]
        );
        return redirect()->route('home');

    }


public function login(){
    return view('auth.login');
}

public function authenticate(){
    //validated
    //create user
    //redirect

    //dd(request()->all());
    $validated  = request()->validate(
        [

        'email' => 'required|email',
        'password' => 'required|min:8',

       ]
    );

    if(auth()->attempt($validated)) {
        request()->session()->regenerate();

        return redirect()->route('home');
    }

    return redirect()->route('login')->withErrors([

        'email' => "Email or password miss match !"
    ]);

}
public function logout(){

    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');
}
}


