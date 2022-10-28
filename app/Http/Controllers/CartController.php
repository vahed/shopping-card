<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content('default');

        return Inertia::render('Cart/Cart', ['cartItems', $cartItems]);
    }

    public function store(Request $request)
    {

        $cartItems = Cart::instance('default')->add(
            $request->id,
            $request->name,
            $request->quantity,
            $request->price,
            0,
            [
                'totalQty' => $request->totalQty,
                'product_code' => $request->product_code,
                'image' => $request->image,
                'slug' => $request->slug,
                'details' => $request->details
            ]
        )->associate('App\Models\Product');

        return Inertia::render('Cart/Cart', ['cartItems', $cartItems]);
    }

    public function cart()
    {
        $cartCollection = Cart::getContent();
        //dd($cartCollection);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed');
    }

    public function add(Request $request)
    {
        Cart::add(array(
           'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));

        return redirect()->route('cart.index')->with('success_msg', 'Item is added');
    }
}
