<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    //Register
    public function register(Request $request) {

        //Validate
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email','unique:users'],
            'password' => ['required', 'min:3', 'confirmed']
        ]);

        //Register
        $user = User::create($fields);

        //Login
        Auth::login($user);

        //Redirect
        return redirect()->route('posts.index');
    }

    //Login User
    public function login(Request $request){
        //validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        

        //Try to login the user
        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'The provided credencials do not
                match our records.'
            ]);
        }
    }

    //Logout user
    public function logout(Request $request){
        //logout the user
        Auth::logout();

        //Invalidate user's session
        $request->session()->regenerateToken();

        //redirect to home
        return redirect('/');
    }


}
