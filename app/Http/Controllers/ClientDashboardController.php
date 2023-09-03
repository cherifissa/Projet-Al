<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $user = session('client');
        $reservations = $user->reservations;
        return view('clients.dashboard.dashboard', compact('reservations', 'user'));
    }
}
