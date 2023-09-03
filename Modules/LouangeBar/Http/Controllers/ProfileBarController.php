<?php

namespace Modules\LouangeBar\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\Renderable;

class ProfileBarController extends Controller
{
    public function index()
    {

        $user = User::find(session('barman'));
        $user =  $user[0];
        //dd($user->id);
        return view('louangebar::bar.profile.pofile', compact('user'));
    }
    public function update(Request $request,  $user)
    {

        $user = User::find($user);

        // dd($user->password);
        $validateData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'tel' => 'required',
        ]);

        // Use the update method directly on the model
        $user->update($validateData);
        return redirect()->route('profilebar.index')->with('success', 'update');
    }

    public function changePassword(Request $request,  $user)
    {
        $user = User::find($user);
        dd($user->email);

        $request->validate([
            'oldpassword' => 'required|string|min:8',
            'password' => 'required|string|min:8|same:password_confirmation',
        ]);


        if (Hash::check($request->input('oldpassword'), $user->password)) {
            if ($request->input('password') == $request->input('password_confirmation')) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect()->route('profilebar.index')->with('successpassword', 'updated');
            } else {
                return back()->withErrors(['oldpassword' => 'L\'ancien mot de passe est incorrect.']);
            }
        } else {
            return back();
        }
    }
}
