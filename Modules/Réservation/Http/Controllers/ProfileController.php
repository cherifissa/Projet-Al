<?php

namespace Modules\Réservation\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\Renderable;

class ProfileController extends Controller
{
    public function index()
    {

        $user = User::find(session('recept'));
        $user =  $user[0];
        //dd($user->id);
        return view('réservation::manager.profile', compact('user'));
    }
    public function update(Request $request,  $user)
    {
        $user = User::find($user);
        //dd($user->id);
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
        return redirect()->route('profile.index')->with('success', 'update');
    }

    public function changePassword(Request $request,  $user)
    {
        $user = User::find($user);
        // dd($user->email);
        $request->validate([
            'oldpassword' => 'required|string|min:8',
            'password' => 'required|string|min:8|same:password_confirmation',
        ]);


        if (Hash::check($request->input('oldpassword'), $user->password)) {
            if ($request->input('password') == $request->input('password_confirmation')) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect()->route('profile.index')->with('successpassword', 'updated');
            } else {
                return back()->withErrors(['oldpassword' => 'L\'ancien mot de passe est incorrect.']);
            }
        } else {
            return back();
        }
    }
}
