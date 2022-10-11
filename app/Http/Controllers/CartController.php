<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;

class CartController extends Controller
{
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
