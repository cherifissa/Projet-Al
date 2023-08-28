<?php

namespace Modules\LouangeBar\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Restaurant\Entities\Produit;
use Illuminate\Contracts\Support\Renderable;
use Modules\Réservation\Entities\Reservation;

class ProduitLouangeController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('restaurant::restaurants.produits.index', ['produits' => $produits]);
    }

    public function create()
    {
        $reservations = Reservation::all();
        return view('restaurant::restaurants.produits.create', compact('reservations'));
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'image' => 'required',
            'type' => 'in:boisson,nourriture'
        ]);

        //dd($validatedData);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = str_replace(' ', '_', $validatedData['nom']) . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
        //dd($validatedData);
        $produit = Produit::create($validatedData);
        return redirect()->route('produits.index')->with('success', 'update');
    }

    public function edit(Produit $produit)
    {
        //dd($produit);
        return view('restaurant::restaurants.produits.edit', compact('produit'));
    }


    public function update(Request $request, Produit $produit)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'type' => 'in:boisson,nourriture'

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = str_replace(' ', '_', $validatedData['nom']) . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
        //dd($validatedData);

        $produit->update($validatedData);

        return redirect()->route('produits.index')->with('successUpdate', 'update');
    }

    public function destroy(Produit $produit)
    {

        return redirect()->back()->with('successDelete', 'Delete');
    }
}
