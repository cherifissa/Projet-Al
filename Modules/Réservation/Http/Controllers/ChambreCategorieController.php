<?php

namespace Modules\Réservation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Réservation\Entities\ChambreCategorie;

class ChambreCategorieController extends Controller
{
    public function infos(Request $request)
    {
        $chambreValue = $request->route('chambre');
        $chambreCategorie = ChambreCategorie::where('nom', $chambreValue)->first();
        if ($chambreCategorie == null) {
            return redirect()->back()->with('error', 'erreur');
        }
        //dd($chambreCategorie);
        return view('clients.chambre.chambreinfos', compact('chambreCategorie'));
    }
    public function index()
    {
        $ChambreCategories = ChambreCategorie::paginate(8);
        return view('réservation::manager.chambre_categories.index', compact('ChambreCategories'));
    }
    public function create()
    {
        return view('réservation::manager.chambre_categories.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nom' => 'required|in:standard,privilege,suite junior,suite famille,suite VIP,suite presidentielle|unique:chambre_categories',
            'prix' => 'required|integer',
            'nbr_lit' => 'required|integer|min:1',
            'nbr_chb' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);
        $validatedData['petit_dej'] = $request->has('petit_dej') ? 1 : 0;
        $validatedData['wifi'] = $request->has('wifi') ? 1 : 0;


        //dd($validatedData);
        $chambreCategorie = ChambreCategorie::create($validatedData);

        return redirect()->route('chambre_categories.index')->with('success', 'Chambre category created successfully.');
    }

    public function edit($ChambreCategorieid)
    {
        $chambreCategorie = ChambreCategorie::find($ChambreCategorieid);
        return view('réservation::manager.chambre_categories.edit', compact('chambreCategorie'));
    }

    public function update(Request $request,  $ChambreCategorieid)
    {
        $chambreCategorie = ChambreCategorie::find($ChambreCategorieid);
        $validatedData = $request->validate([
            'nom' => 'required|in:standard,privilege,suite junior,suite famille,suite VIP,suite presidentielle|unique:chambre_categories,nom,' . $chambreCategorie->id,
            'prix' => 'required|integer',
            'nbr_lit' => 'required|integer|min:1',
            'nbr_chb' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);
        $validatedData['petit_dej'] = $request->has('petit_dej') ? 1 : 0;
        $validatedData['wifi'] = $request->has('wifi') ? 1 : 0;

        //dd($validatedData);
        $chambreCategorie->update($validatedData);

        return redirect()->route('chambre_categories.index')
            ->with('successUpdate', 'Chambre category updated successfully.');
    }

    public function destroy($ChambreCategorieid)
    {
        $ChambreCategorie = ChambreCategorie::find($ChambreCategorieid);
        $ChambreCategorie->delete();

        return redirect()->back()->with('successDelete', 'Delete');
    }
}
