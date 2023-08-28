<?php

namespace Modules\Réservation\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Restaurant\Entities\Service;
use Illuminate\Contracts\Support\Renderable;
use Modules\Réservation\Entities\Reservation;

class FactureController extends Controller
{
    public function index(Reservation $reservation)
    {
        $currentDate = Carbon::now();
        $date = "le " . $currentDate->format('d/m/Y');
        $client = User::find($reservation->client_id);
        $services1 = Service::where('reservation_id', $reservation->numero)
            ->where(function ($query) {
                $query->where('type_payement', '<>', 'reservation');
            })->get();

        $services = Service::where('reservation_id', $reservation->numero)
            ->get()
            ->groupBy('type_service')
            ->map(function ($group) {
                return [
                    'services' => $group,
                    'quantity' => count($group),
                    'totalPrice' => $group->sum('prix'),
                    'name' => $this->getServiceTypeName($group->first()->type_service)
                ];
            })
            ->values()
            ->toArray();

        $totalPrixservice = $services1->sum('prix');
        $totalPrixFromServices = collect($services)->pluck('totalPrice')->sum();
        $totalprix = $reservation->prix + $totalPrixFromServices;
        // dd($reservation);
        return view('réservation::manager.facture.index', compact('client', 'services', 'reservation', 'date', 'totalprix', 'totalPrixFromServices', 'totalPrixservice'));
    }

    private function getServiceTypeName($type)
    {
        $typeNames = [
            'ptdej' => 'petit déjeuner',
            'dej' => 'déjeuner',
            'diner' => 'dinner'
        ];

        return $typeNames[$type] ?? $type; // Return the full name or the original type if not found
    }
    public function print()
    {
        return view('réservation::manager.facture.printfacture');
    }
    public function rapport()
    {
        return view('réservation::manager.facture.Rapport.rapport');
    }
}