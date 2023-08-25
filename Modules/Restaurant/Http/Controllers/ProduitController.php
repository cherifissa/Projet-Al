<?php

namespace Modules\Restaurant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Restaurant\Entities\Produit;
use Illuminate\Contracts\Support\Renderable;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('restaurant::restaurants.index', ['produits' => $produits]);
    }

    public function create()
    {

        return view('restaurant::restaurants.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'image' => 'required',
        ]);

        $produit = Produit::create($validatedData);
        return redirect()->route('produit.index')->with('success', 'update');
    }

    public function edit(Produit $produit)
    {
        return view('restaurant::reservations.edit', compact('reservation'));
    }


    public function update(Request $request, Produit $produit)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'image' => 'required',
        ]);

        $produit->update($validatedData);

        return redirect()->back()->with('successUpdate', 'successfully');
    }

    public function destroy(Produit $produit)
    {

        return redirect()->back()->with('successDelete', 'Delete');
    }
}
