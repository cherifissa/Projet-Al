<?php

namespace App\Http\Controllers\Aut;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function login(Request $request)
    {
        $maxAttempts = 4;
        $sessionKey = 'login_attempts';
        $sessionLifetime = 30;

        $attempts = session($sessionKey, 0);

        if ($attempts == $maxAttempts) {
            return back()
                ->withErrors(['erreur' => 'Trop de tentatives de connexion. Veuillez réessayer ultérieurement.'])
                ->withInput(['email']);
        }

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            session([$sessionKey => 0]);

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
            $attempts++;
            session([$sessionKey => $attempts], 30);

            return back()
                ->withErrors(['erreur' => 'Email ou mot de passe incorrect'])
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
