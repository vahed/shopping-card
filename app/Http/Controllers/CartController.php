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

        return Inertia::render('Products/Cart', ['cartItem', $cartItem]);
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
        //dd($request->id);
        //$cart = Cart::search('a5210b8fa526d18d5551a9a1209ec314');
        $cartItems = Cart::content();
//dd($cartItems);
foreach($cartItems as $key => $items ) {
    //dd($items->rowId, $items->id, $request->id);
    if ($items->id === $request->id){
        //dd($cartItems->rowId);
        //dd('yes this item exists');
        Cart::instance()->update(
            $items->rowId, $request->quantity
        );
    }
}
        
        

        $cartItems = Cart::instance()->add(
            $request->id,
            $request->name,
            $request->quantity,
            $request->price,
            0,
            [
                'totalQty' => $request->quantity,
                'product_code' => $request->product_code,
                'image' => $request->image,
                'slug' => $request->slug,
                'details' => $request->details
            ]
        )->associate('App\Models\Product');

        // redirect()->route('cart.index');
        $cartItems = Cart::content();

        return Inertia::render('Products/Cart', [ 'cartItems' => $cartItems ]);
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
        
        // Cart::instance()->update($id, $request->price);
        // return back();
    }

    public function incrementItem(Request $request, $id) {
        $request->qty++;
        Cart::instance()->update($id, $request->qty);

        $cartItems = Cart::content();

        return Inertia::render('Products/Cart', [ 'cartItems' => $cartItems ]);
    }

    public function decrementItem(Request $request, $id) {
        $request->qty--;
        Cart::instance()->update($id, $request->qty);

        $cartItems = Cart::content();

        return Inertia::render('Products/Cart', [ 'cartItems' => $cartItems ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        Cart::remove($id, $request->id);
        //return back();
        $cartItems = Cart::content();

        return Inertia::render('Products/Cart', [ 'cartItems' => $cartItems ]);
    }
}
