<?php

namespace Modules\Restaurant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Réservation\Entities\Reservation;

class ReservationRestoController extends Controller
{
    public function indexrsv()
    {
        $reservations = Reservation::paginate(6);
        return view('restaurant::restaurants.indexrsv', ['reservations' => $reservations]);
    }
}
