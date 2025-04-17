<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showForm()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', ['cart' => $cart]);
    }

    public function submit(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/products')->with('error', 'Your cart is empty.');
        }

        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        DB::insert("INSERT INTO orders (name, address, city, zip, total_amount) VALUES (?, ?, ?, ?, ?)", [
            $request->name,
            $request->address,
            $request->city,
            $request->zip,
            $total
        ]);

        session()->forget('cart');

        return redirect('/products')->with('success', 'Order placed successfully!');
    }
}
