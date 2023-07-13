<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(auth()->attempt($credentials)) {            
            User::where('email', $request->email)->first();

            $request->session()->regenerate(); 

            return redirect('/dashboard');
        }

        return back()->with('error', 'Wrong email/password')->withInput();
    }

    public function logout(Request $request) {
        Auth::logout();        
        $request->session()->invalidate();        
        $request->session()->regenerateToken();
    
        return Redirect::route('login');
    }
}
