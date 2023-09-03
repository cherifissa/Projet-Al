<?php

namespace Modules\Réservation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Réservation\Entities\DemandeReservation;

class DemandeReservationController extends Controller
{
    public function index()
    {
        $demandes = DemandeReservation::orderBy('id', 'desc')->paginate(8);
        return view('réservation::manager.demandes.index', compact('demandes'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_client' => 'required|string',
            'email_client' => 'required|email',
            'tel_client' => 'required|numeric',
            'date_arrive' => 'required|date',
            'date_depart' => 'required|date|after:date_arrive',
            'type_chambre' => 'required|in:standard,privilege,suite junior,suite famille,suite VIP,suite presidentielle',
            'nombre_adulte' => 'required|integer|min:1',
            'nombre_enfant' => 'required|integer|min:0',
        ]);

        $demandeReservation =  DemandeReservation::create($validatedData);

        return redirect()->route('accueil')->with('success', 'successfully');
    }

    public function destroy($demandeReservationid)
    {
        $demandeReservation = DemandeReservation::find($demandeReservationid);
        $demandeReservation->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}
