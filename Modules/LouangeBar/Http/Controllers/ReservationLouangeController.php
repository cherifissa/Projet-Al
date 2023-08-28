<?php

namespace Modules\LouangeBar\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Réservation\Entities\Reservation;

class ReservationLouangeController extends Controller
{
    public function indexrsv()
    {
        $reservations = Reservation::paginate(6);
        return view('louangebar::bar.indexrsv', ['reservations' => $reservations]);
    }
}
