<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //shows whats in the cart
    public function show()
    {
        //gets cart from session n passes cart to the view
        $cart = session()->get('cart', []);
        return view('cart.index', ['cart' => $cart]);
    }

    //adds product to the cart
    public function add(Request $request)
    {
        //gets the product details from DB
        $product = DB::select("SELECT * FROM products WHERE id = ?", [$request->product_id])[0];

        $cart = session()->get('cart', []);

        //if product in cart, it increases amount
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            //if not it add it w quantity 1
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        //saves the updated cart bacl to session
        session()->put('cart', $cart);

        //redirect back to product pg 
        return redirect('/products')->with('success', 'Product added to cart!');
    }

    //removes a product from the cart
    public function remove(Request $request)
    {
        //gets the current cart back
        $cart = session()->get('cart', []);

        //removes the selected product from cart
        unset($cart[$request->product_id]);

        //update cart
        session()->put('cart', $cart);

        //refirect backto cart pg
        return redirect('/cart');
    }

    //updates the quantity of a product inside the cart
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        //if product exists in cart, update its quantity
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
        }

        //save n redircet
        session()->put('cart', $cart);
        return redirect('/cart');
    }
}
