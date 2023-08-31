<?php

namespace Modules\Restaurant\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class ClientRestoController extends Controller
{
    public function index()
    {
        $users = User::where('isadmin', 'client')
            ->orderBy('id', 'desc')
            ->paginate(8);
        return view('restaurant::restaurants.indexclt', compact('users'));
    }

    public function indexclt()
    {

        $users = User::where('isadmin', 'client')
            ->orderBy('id')
            ->paginate(6);
        return view('restaurant::restaurants.indexclt', compact('users'));
    }
}
