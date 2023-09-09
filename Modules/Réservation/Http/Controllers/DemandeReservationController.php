<?php

namespace Modules\Réservation\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Réservation\Entities\DemandeReservation;
use Modules\Réservation\Emails\ReservationAcceptedMail;
use Modules\Réservation\Emails\ReservationRefusedMail;

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

    public function accepter($demandeReservationid)
    {
        $demandeReservation = DemandeReservation::find($demandeReservationid);
        // dd($demandeReservation->email_client);
        try {
            Mail::to($demandeReservation->email_client)->send(new ReservationAcceptedMail($demandeReservation));

            return redirect()->back()->with('successMessage', 'successfully');
        } catch (Exception  $e) {
            return redirect()->back()->with('errorMessage', 'Failed');
        }
    }
    public function reject($demandeReservationid)
    {
        $demandeReservation = DemandeReservation::find($demandeReservationid);
        // dd($demandeReservation->email_client);
        try {
            Mail::to($demandeReservation->email_client)->send(new ReservationRefusedMail($demandeReservation));

            return redirect()->back()->with('successMessage', 'successfully');
        } catch (Exception  $e) {
            return redirect()->back()->with('errorMessage', 'Failed');
        }
    }

    public function destroy($demandeReservationid)
    {
        $demandeReservation = DemandeReservation::find($demandeReservationid);
        // dd($demandeReservation);
        $demandeReservation->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}