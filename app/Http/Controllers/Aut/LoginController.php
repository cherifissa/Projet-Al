<?php

namespace App\Http\Controllers\Aut;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function login(Request $request)
    {
        $validatedate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $validatedate['email'])->first();

        if ($user && Hash::check($validatedate['password'], $user->password)) {
            if ($user->isadmin == 'client') {
                session(['client' => $user]);
                return redirect()->intended('/');
            } elseif ($user->isadmin == 'barman') {
                session(['barman' => $user]);
                return redirect()->intended('/louangebar');
            } elseif ($user->isadmin == 'recept') {
                session(['recept' => $user]);
                return redirect()->intended('/reservation');
            } elseif ($user->isadmin == 'server') {
                session(['server' => $user]);
                return redirect()->intended('/restaurant');
            }
            return redirect()->intended();
        } else {
            return back()->withErrors(['erreur' => 'Email ou mot de passe incorrect'])
                ->withInput(['email']);
        }
    }
    public function disconnect($userid)
    {
        $user = User::find($userid);

        // dd($user->isadmin);
        if ($user->isadmin == 'client') {
            session(['client' => null]);
            return redirect()->intended('/');
        } elseif ($user->isadmin == 'barman') {
            session(['barman' => null]);
            return redirect()->intended('/login');
        } elseif ($user->isadmin == 'recept') {
            session(['recept' => null]);
            return redirect()->intended('/login');
        } elseif ($user->isadmin == 'server') {
            session(['server' => null]);
            return redirect()->intended('/login');
        }
    }
}