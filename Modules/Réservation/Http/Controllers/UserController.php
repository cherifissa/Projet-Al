<?php

namespace Modules\Réservation\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Support\Renderable;

class UserController extends Controller
{
    public function create()
    {
        $previousUrl = url()->previous();
        // dd($previousUrl);

        return view('réservation::manager.users.create', compact('previousUrl'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:255',
            'sexe' => 'required|string|in:M,F',
            'adresse' => 'required|string|max:255',
            'isadmin' => 'required|in:admin,recept,client,server',
            'type_piece' => 'required|in:cni,passeport,carte consulaire',
            'numero_piece' => 'required|string|max:15',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create($validatedData);

        if ($user->isadmin == "client") {
            $route = 'clients.index';
        } else {
            $route = 'admins.index';
        }

        //dd($request);

        return redirect()->route($route)->with('success', 'created');
    }

    public function edit(User $user)
    {
        $routeName = $user->isadmin == 'client' ? 'clients.index' : 'admins.index';
        return view('réservation::manager.users.edit', compact('user', 'routeName'));
    }

    public function update(Request $request, User $user)
    {


        if ($user->isadmin == "client") {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'tel' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'sexe' => 'required|string|in:M,F',
                'adresse' => 'required|string|max:255',
                'type_piece' => 'required|in:cni,passeport,carte consulaire',
                'numero_piece' => 'required|string|max:15',
            ]);
        } else {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'tel' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'adresse' => 'required|string|max:255',
                'sexe' => 'required|string|in:M,F',
                'type_piece' => 'required|in:cni,passeport,carte consulaire',
                'numero_piece' => 'required|string|max:15',
                'isadmin' => '|in:admin,recept,server',
            ]);
        }


        if ($user->isadmin == "client") {
            $route = 'clients.index';
        } else {
            $route = 'admins.index';
        }

        $user->update($validatedData);

        return redirect()->route($route)->with('successUpdate', 'created');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}
