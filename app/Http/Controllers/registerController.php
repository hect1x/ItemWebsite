<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function register(){
        return view('/register',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:6|max:12',
            'number' => 'required|starts_with:08|min:8|max:15'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect ('/login');
    }
}
