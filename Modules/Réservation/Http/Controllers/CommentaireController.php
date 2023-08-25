<?php

namespace Modules\Réservation\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Modules\Réservation\Entities\Commentaire;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::orderBy('id', 'desc')->paginate(8);

        return view('réservation::manager.commentaires.index', ['commentaires' => $commentaires]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'contenu' => 'required|string',
            'client_id' => 'required',
        ]);
        $clientJson = $validatedData['client_id'];
        $client = json_decode($clientJson);

        $validatedData['client_id'] = $client->id;

        $commentaire = Commentaire::create($validatedData);
        return redirect()->route('chambre')->with('success', 'create.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}
