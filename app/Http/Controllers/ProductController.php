<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
{
    $products = DB::select("SELECT * FROM products ORDER BY id DESC");
    return view('admin.products.index', ['products' => $products]);
}

public function showList()
{
    $products = DB::select("SELECT * FROM products ORDER BY id DESC");
    return view('products.index', ['products' => $products]);
}


public function store(Request $request)
{
    $sql = "INSERT INTO products (sku, name, description, price, image_url, color, size)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $cleanPrice = str_replace(['$', ','], '', $request->price); // Remove $ and commas

    DB::insert($sql, [
        $request->sku,
        $request->name,
        $request->description,
        $cleanPrice,
        $request->image_url,
        $request->item,
        $request->size


    ]);

    return redirect('/admin/products');
}


}
