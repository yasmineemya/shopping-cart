<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller{
    //shows the checkout form n passes the cart data to show
    public function showForm()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', ['cart' => $cart]);
    }
    public function allOrders()
{
    $orders = DB::select("SELECT * FROM orders ORDER BY created_at DESC");
    return view('admin.orders.index', ['orders' => $orders]);
}


    //handles form submission when anyone places an order
    public function submit(Request $request)
{
    //gets the cart
    $cart = session()->get('cart', []);

    //if cart = empty, takes u back to product pg w error 
    if (empty($cart)) {
        return redirect('/products')->with('error', 'Your cart is empty.');
    }

    //to calculate the price total n w quantity for each item
    $total = array_sum(array_map(function ($item) {
        return $item['price'] * $item['quantity'];
    }, $cart));

    //insert the dorder details into the order table
    DB::insert("INSERT INTO orders (name, address, city, zip, total_amount) VALUES (?, ?, ?, ?, ?)", [
        $request->name,
        $request->address,
        $request->city,
        $request->zip,
        $total
    ]);

    //gets the id of order to use for orderitems
    $orderId = DB::getPdo()->lastInsertId();

    //insert to the orderitem table
    foreach ($cart as $productId => $item) {
        DB::insert("INSERT INTO orderitems (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)", [
            $orderId,
            $productId,
            $item['quantity'],
            $item['price']
        ]);
    }
    //clear the cart
    session()->forget('cart');

    //redirects to confirmation pg
    return redirect('/checkout/confirmation');
}
}