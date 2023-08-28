<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $user = session('client');
        $reservations = $user->reservations;
        return view('clients.dashboard.dashboard', compact('reservations', 'user'));
    }
}
