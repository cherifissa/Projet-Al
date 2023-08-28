<?php

namespace Modules\Réservation\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Réservation\Entities\Chambre;
use Illuminate\Contracts\Support\Renderable;
use Modules\Réservation\Entities\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->paginate(8);
        return view('réservation::manager.reservations.index', ['reservations' => $reservations]);
    }
    public function indexrsv()
    {
        $reservations = Reservation::paginate(6);
        return view('réservation::manager.restaurants.indexrsv', ['reservations' => $reservations]);
    }
    public function create()
    {
        $users = User::where('isadmin', '=', 'client')->get();
        $chambres = Chambre::where('status', '=', 'libre')->get();
        return view('réservation::manager.reservations.create', ['users' => $users, 'chambres' => $chambres]);
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nbr_jour' => 'required|integer|min:1',
            'nbr_client' => 'required|integer|min:1',
            'status' => 'required|in:attente,enregistre',
            'date_arrive' => 'required|date|before:date_depart',
            'date_depart' => 'required|date|after:date_arrive',
            'client_id' => 'required|exists:users,id',
            'chambre_id' => 'required|exists:chambres,id',
        ]);

        $chambre = Chambre::find($validatedData["chambre_id"]);

        $reservations = Reservation::where('chambre_id', $validatedData["chambre_id"])->get();
        if (count($reservations) >= 1) {
            foreach ($reservations as $reservation) {
                if ($reservation->date_depart >= $validatedData["date_arrive"]) {
                    return redirect()->back()
                        ->withInput()
                        ->with('erreur', 'error');
                } else {
                    $today = Carbon::today();
                    $arrival = Carbon::parse($validatedData["date_arrive"]);
                    if ($arrival->isSameDay($today)) {
                        $chambre->status = 'occupé';
                        $chambre->save();
                    }
                }
            }
        }
        $validatedData["prix"] = $chambre->chambreCategorie->prix * $validatedData["nbr_jour"];
        //dd($arrival->isSameDay($today));
        $validatedData["numero"] = $this->generateUniqueNumero();

        //dd($validatedData);
        $reservation = Reservation::create($validatedData);

        return redirect()->route('reservations.index')->with('success', 'create.');
    }

    public function generateUniqueNumero()
    {
        $randomNumber = mt_rand(1000000000, 999999999999);

        $unique = false;
        $prefix = 'RES';

        do {
            $numero = $prefix . $randomNumber;

            $existingReservation = Reservation::where('numero', $numero)->exists();

            if (!$existingReservation) {
                $unique = true;
            } else {
                $randomNumber = mt_rand(1000000000, 9999999999);
            }
        } while (!$unique);

        return $numero;
    }

    public function edit(Reservation $reservation)
    {
        return view('réservation::manager.reservations.edit', compact('reservation'));
    }


    public function update(Request $request, Reservation $reservation)
    {
        $validatedData = $request->validate([
            'nbr_jour' => 'required|integer|min:1',
            'status' => 'required|in:annule,quitte,attente,enregistre',
            'date_arrive' => 'required|date|before:date_depart',
            'date_depart' => 'required|date|after:date_arrive',
        ]);
        $chambre = Chambre::find($reservation->chambre_id);
        $today = Carbon::today();
        $arrival = Carbon::parse($validatedData["date_arrive"]);
        if ($arrival->isSameDay($today)) {
            $chambre->status = 'occupé';
            $chambre->save();
        }
        $reservation->update($validatedData);

        return redirect()->route('reservations.index')->with('successUpdate', 'successfully');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}
