<?php

namespace Modules\Réservation\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('isadmin', '<>', 'client')
            ->orderBy('id', 'desc')
            ->paginate(8);
        return view('réservation::manager.admins.index', compact('users'));
    }
}
