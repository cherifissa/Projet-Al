<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileCltController extends Controller
{
    public function index()
    {

        $user = User::find(session('client'));
        $user =  $user[0];
        //dd($user->id);
        return view('clients.profile.profile', compact('user'));
    }
    public function update(Request $request,  $user)
    {
        $user = User::find($user);

        $validateData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'tel' => 'required',
        ]);
        // Use the update method directly on the model
        $user->update($validateData);
        return redirect()->route('profileclt.index')->with('success', 'update');
    }

    public function changePassword(Request $request,  $user)
    {
        $user = User::find($user);
        dd($user->email);
        // dd($user->password);
        $request->validate([
            'oldpassword' => 'required|string|min:8',
            'password' => 'required|string|min:8|same:password_confirmation',
        ]);


        if (Hash::check($request->input('oldpassword'), $user->password)) {
            if ($request->input('password') == $request->input('password_confirmation')) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect()->route('profileclt.index')->with('successpassword', 'updated');
            } else {
                return back()->withErrors(['oldpassword' => 'L\'ancien mot de passe est incorrect.']);
            }
        } else {
            return back();
        }
    }
}
