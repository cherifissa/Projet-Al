<?php

namespace Modules\Restaurant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Restaurant\Entities\Produit;
use Illuminate\Contracts\Support\Renderable;
use Modules\Réservation\Entities\Reservation;

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
        $product_prix = $request->input('product_price');
        $product = Produit::find($product_id);
        // dd($product_id, $product_qt);
        $cart = Session::get('cart', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $product_qt;
        } else {
            $cart[$product_id] = [
                'name' => $product->nom,
                'quantity' => $product_qt,
                'price' => $product_prix,
            ];
        }
        Session::put('cart', $cart);


        return redirect()->back();
    }
    public function removeFromCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $cart = Session::get('cart', []);

        if (isset($cart[$product_id])) {
            if ($cart[$product_id]['quantity'] <= 1) {
                unset($cart[$product_id]);
            } else {
                $cart[$product_id]['quantity']--;
            }
            Session::put('cart', $cart);
        }

        return redirect()->back();
    }

    public function removeAllCart(Request $request)
    {
        Session::put('cart', []);

        return redirect()->back();
    }
}
