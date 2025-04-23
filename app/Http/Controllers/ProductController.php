<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //admin pg: shows all products
    public function index()
{
    //gets all products from database, recent first on the list
    $products = DB::select("SELECT * FROM products ORDER BY id DESC");
    //passes the product to admin
    return view('admin.products.index', ['products' => $products]);
}

//customer pg: shows all products
public function showList()
{
    //gets product from database
    $products = DB::select("SELECT * FROM products ORDER BY id DESC");
    //passes the products to shop pg
    return view('products.index', ['products' => $products]);
}

//admin: product creation form
public function store(Request $request)
{
    //checking input before saving it
    $request->validate([
        'sku' => 'required|unique:products,sku',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image_url' => 'required|url',
        'item' => 'nullable|string',
        'size' => 'nullable|string'
    ], [
        //error messages
        'sku.required' => 'Please enter a SKU.',
        'sku.unique' => 'That SKU already exists.',
        'name.required' => 'Product name is required.',
        'description.required' => 'Please provide a description.',
        'price.required' => 'Enter a price.',
        'price.numeric' => 'Price must be a number.',
        'image_url.required' => 'Image URL is required.',
        'image_url.url' => 'Please enter a valid URL.'
    ]);

    //adding new products
    $sql = "INSERT INTO products (sku, name, description, price, image_url, color, size)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    //removes $ n etc
    $cleanPrice = str_replace(['$', ','], '', $request->price); // Remove $ and commas

    //insert the product data into the products table
    DB::insert($sql, [
        $request->sku,
        $request->name,
        $request->description,
        $cleanPrice,
        $request->image_url,
        $request->item,
        $request->size


    ]);

    //redirect back to admin product list
    return redirect('/admin/products');
}
public function detail($id)
{
    $product = DB::select("SELECT * FROM products WHERE id = ?", [$id]);

    if (!$product) {
        abort(404);
    }

    return view('products.detail', ['product' => $product[0]]);
}
public function edit($id)
{
    $product = DB::select("SELECT * FROM products WHERE id = ?", [$id])[0];
    return view('admin.products.edit', ['product' => $product]);
}
public function update(Request $request, $id)
{
    $sql = "UPDATE products SET sku = ?, name = ?, description = ?, price = ?, image_url = ?, color = ?, size = ? WHERE id = ?";

    $cleanPrice = str_replace(['$', ','], '', $request->price);

    DB::update($sql, [
        $request->sku,
        $request->name,
        $request->description,
        $cleanPrice,
        $request->image_url,
        $request->color,
        $request->size,
        $id
    ]);

    return redirect('/admin/products')->with('success', 'Product updated successfully!');
}



}
