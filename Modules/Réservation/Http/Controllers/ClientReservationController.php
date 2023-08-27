<?php

namespace Modules\Réservation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Réservation\Entities\DemandeReservation;

class ClientReservationController extends Controller
{
    public function reserver(Request $request)
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

        // dd($validatedData);

        $demandeReservation =  DemandeReservation::create($validatedData);
        return redirect()->route('accueil')->with('success', 'create.');
    }
}