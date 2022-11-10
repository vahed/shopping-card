<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class CartController extends Cart
{
    public function index()
    {
        $cartItem = Cart::content();

        return Inertia::render('Cart/Cart', ['cartItem', $cartItem]);
    }

    // public function index(CartService $cartService) {
    //     return Inertia::render('Cart/Index', [
    //         'cartItems' => $cartService->setCartValues()->get('cartItems'),
    //         'cartTaxRate' => $cartService->setCartValues()->get('cartTaxRate'),
    //         'cartSubtotal' => $cartService->setCartValues()->get('cartSubtotal'),
    //         'newTax' => $cartService->setCartValues()->get('newTax'),
    //         'code' =>$cartService->setCartValues()->get('code'),
    //         'discount' => $cartService->setCartValues()->get('discount'),
    //         'newSubtotal' => $cartService->setCartValues()->get('newSubtotal'),
    //         'newTotal' => $cartService->setCartValues()->get('newTotal'),
    //         'laterItems' =>$cartService->setCartValues()->get('laterItems'),
    //         'laterCount' => $cartService->setCartValues()->get('laterCount'),
    //     ]);
    // }

    public function store(Request $request)
    {

        $cartItems = Cart::instance()->add(
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

        // redirect()->route('cart.index');
        $cartItems = Cart::content();

        return Inertia::render('Cart/Cart', [ 'cartItems' => $cartItems ]);
    }

    // public function cart()
    // {
    //     $cartCollection = Cart::getContent();
    //     return redirect()->route('cart.index')->with('success_msg', 'Item is removed');
    // }

    // public function add(Request $request)
    // {
    //     Cart::add(array(
    //        'id' => $request->id,
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'quantity' => $request->quantity,
    //         'attributes' => array(
    //             'image' => $request->img,
    //             'slug' => $request->slug
    //         )
    //     ));

    //     return redirect()->route('cart.index')->with('success_msg', 'Item is added');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        Cart::instance('default')->update($id, $request->quantity);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Cart::instance('default')->remove($id);
        return back();
    }
}
