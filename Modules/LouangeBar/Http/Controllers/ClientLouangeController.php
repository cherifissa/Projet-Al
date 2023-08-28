<?php

namespace Modules\LouangeBar\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class ClientLouangeController extends Controller
{
    public function index()
    {
        $users = User::where('isadmin', 'client')
            ->orderBy('id', 'desc')
            ->paginate(8);
        return view('réservation::manager.clients.index', compact('users'));
    }

    public function indexclt()
    {
        $users = User::where('isadmin', 'client')
            ->orderBy('id')
            ->paginate(6);
        return view('louangebar::bar.indexclt', compact('users'));
    }
}