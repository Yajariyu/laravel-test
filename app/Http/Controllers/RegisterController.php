<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {
        // dd($request);
        // dd($request->name);

        $request->request->add(['username', Str::slug($request->username)]);

        //Validacion
        $this->validate($request,[
            'name'=> 'required|min:5',
            'username' => 'required|unique:users|min:3|max:30',
            'email'=>'required|unique:users|email| max:60',
            'password' => 'required|min:4|confirmed'
        ]);

        User::create([
            'name'=> $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password' => $request->password ,
        ]);

        // auth()->attempt([
        //     'email'=> $request->email,
        //     'password' => $request->password ,
        // ]);

        
        auth()->attempt($request->only('email','password'));

        return redirect()->route('post.index');
    }
}
