<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>{{ $product->name }}</header>

<div class="navbar">
  <a href="/products">SHOP</a> | &nbsp;
  <a href="/cart">CART</a> | &nbsp;
  <a href="/admin/products">ADMIN</a>
  |  <a href="/admin/orders">ORDERS</a>
</div>

<div class="container" style="max-width: 1000px; margin: 50px auto; padding: 40px; display: flex; flex-wrap: wrap; justify-content: center; gap: 40px;">

    <div style="flex: 1 1 400px;">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" style="width: 100%; height: auto; border-radius: 6px;">
    </div>


    <div style="flex: 1 1 400px; text-align: left;">
        <h2 style="font-family: 'Playfair Display', serif; font-size: 24px; margin-bottom: 10px;">{{ $product->name }}</h2>

        <p class="price" style="font-weight: 600; font-size: 18px; margin-bottom: 20px;">${{ number_format($product->price, 2) }}</p>

        <p style="font-size: 14px; margin-bottom: 20px;">{{ $product->description }}</p>

        @if($product->color)
        <p style="font-size: 14px;">Color: {{ $product->color }}</p>
        @endif

        @if($product->size)
        <p style="font-size: 14px;">Size: {{ $product->size }}</p>
        @endif

        <form action="/cart/add" method="POST" style="margin-top: 30px;">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-dark">Add to Cart</button>
        </form>
    </div>
</div>

</body>
</html>
