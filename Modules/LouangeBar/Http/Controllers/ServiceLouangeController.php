<?php

namespace Modules\LouangeBar\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Restaurant\Entities\Service;
use Illuminate\Contracts\Support\Renderable;
use Modules\Réservation\Entities\Reservation;

class ServiceLouangeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->paginate(6);
        return view('restaurant::restaurants.services.index', ['services' => $services]);
    }
    public function create(Request $request)
    {
        $total = $request->input('cart');

        //dd($totalPrice);

        $reservations = Reservation::all();
        return view('restaurant::restaurants.services.create', compact('reservations', 'total'));

        $reservations = Reservation::all();
        return view('restaurant::restaurants.services.create', ['reservations' => $reservations]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type_service' => 'required|in:ptdej,dej,diner',
            'type_payement' => 'required|in:cash,gratuite,reservation',
            'prix' => 'required|numeric',
            'reservation_id' => 'exists:reservations,numero',
        ]);
        $service = Service::create($validatedData);
        return redirect()->route('services.index')->with('success', 'successfully');
    }
    public function edit(Service $service)
    {
        return view('restaurant::restaurants.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'type_payement' => 'required|in:cash,gratuite,reservation',
            'prix' => 'required|numeric',
            'reservation_id' => 'required',
        ]);

        $service->update($validatedData);

        return redirect()->route('services.index')->with('successUpdate', 'successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->back()->with('successDelete', 'Delete');
    }
}
