<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function create()
    {
        return view('manager.users.create');
    }

    public function store(Request $request)
    {
        dd($request);
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:255',
            'adresse' => 'required|string|max:255',
            'isadmin' => 'required|in:barman,recept,client,server',
            'type_piece' => 'required|in:cni,passeport,carte consulaire',
            'numero_piece' => 'required|string|max:15',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create($validatedData);
        if ($user->isadmin == "client") {
            $route = '/reservation/clients';
        } else {
            $route = '/reservation/admins';
        }


        // return Redirect::to($url);

        // return redirect()->route($route)->with('success', 'created');
    }

    public function edit(User $user)
    {
        return view('manager.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        if ($user->isadmin == "client") {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'tel' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
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
                'type_piece' => 'required|in:cni,passeport,carte consulaire',
                'numero_piece' => 'required|string|max:15',
                'isadmin' => '|in:barman,recept,server',
            ]);
        }


        if ($user->isadmin == "client") {
            $route = '/reservation/clients';
        } else {
            $route = '/reservation/admins';
        }
        $user->update($validatedData);

        return Redirect::to($route)->with('success', 'successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}
