<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255','unique:users'],
            'password' => ['required', 'confirmed', 'min:3'],
        ]);

        $user = User::create($fields);

        Auth::login($user);

//        return redirect()->route('home');
        return redirect()->route('posts.index');
    }


    public function login(Request $request){
        $fields = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($fields,$request->remember)){
            return redirect()->intended('dashboard');
        }else{
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.'
            ]);
        }
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        // regenerate crsf token
        $request->session()->regenerateToken();
        return redirect('/');

    }

}
