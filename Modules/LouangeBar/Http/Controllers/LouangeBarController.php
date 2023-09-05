<?php

namespace Modules\LouangeBar\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Restaurant\Entities\Produit;
use Illuminate\Contracts\Support\Renderable;

class LouangeBarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $produits = Produit::all();
        return view('louangebar::bar.index', ['produits' => $produits]);
    }
    public function addToCartbar(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qt = $request->input('quantite') ?? 1;
        $product_prix = $request->input('product_price');
        $product = Produit::find($product_id);
        // dd($product_id, $product_qt);
        $cart = Session::get('cartbar', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $product_qt;
        } else {
            $cart[$product_id] = [
                'name' => $product->nom,
                'quantity' => $product_qt,
                'price' => $product_prix,
            ];
        }
        Session::put('cartbar', $cart);

        return redirect()->back();
    }
    public function removeFromCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $cart = Session::get('cartbar', []);

        if (isset($cart[$product_id])) {
            if ($cart[$product_id]['quantity'] <= 1) {
                unset($cart[$product_id]);
            } else {
                $cart[$product_id]['quantity']--;
            }
            Session::put('cartbar', $cart);
        }

        return redirect()->back();
    }

    public function removeAllCart(Request $request)
    {
        Session::put('cartbar', []);

        return redirect()->back();
    }
}
