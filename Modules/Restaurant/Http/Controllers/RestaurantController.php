<?php

namespace Modules\Restaurant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Restaurant\Entities\Produit;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Session;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $produits = Produit::all();
        return view('restaurant::restaurants.index', ['produits' => $produits]);
    }
    public function addToCart(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_qt = $request->input('quantite') ?? 1;

        $cart = Session::get('cart', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id] += $product_qt;
        } else {
            $cart[$product_id] = $product_qt;
        }

        Session::put('cart', $cart);


        return redirect()->back();
    }
}
