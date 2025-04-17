<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Boutique</title>
  <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    body {
      font-family: 'Didact Gothic', sans-serif;
      background: white;
      margin: 0;
      padding: 0;
      color: #111;
    }

    header {
      background: #e0dcd5;
      padding: 30px 0;
      text-align: center;
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      letter-spacing: 1px;
      border-bottom: 1px solid #d4cec6;
    }

    .navbar {
      text-align: center;
      margin-top: 10px;
      font-size: 13px;
      font-family: 'Didact Gothic', sans-serif;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
      max-width: 1200px;
      margin: 50px auto;
      padding: 0 20px;
    }

    .product-card {
      background: #fff;
      border-radius: 6px;
      overflow: hidden;
      text-align: center;
      font-size: 14px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.04);
    }

    .product-card img {
      width: 100%;
      object-fit: cover;
      height: 350px;
    }

    .product-card h2 {
      font-family: 'Playfair Display', serif;
      font-size: 16px;
      margin: 15px 0 5px;
    }

    .product-card p.price {
      font-weight: 600;
      color: #444;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .product-card form button {
      background: #e0dcd5;
      color: #111;
      border: none;
      padding: 10px 20px;
      font-size: 13px;
      cursor: pointer;
      margin-bottom: 20px;
    }

    
  </style>
</head>
<body>
  <header>yasmine shopping-cart</header>

  <div class="navbar">
  <a href="/products">
    SHOP</a>  | &nbsp; <a href = "/cart">CART</a>  | &nbsp; <a href = "/admin/products">ADMIN&nbsp;</a>
  </div>

  <div class="product-grid">
    @foreach ($products as $product)
      <div class="product-card">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
        <h2>{{ $product->name }}</h2>
        <p class="price">${{ $product->price }}</p>
        <form action="/cart/add" method="POST">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <button type="submit">Add to Cart</button>
</form>

      </div>
    @endforeach
  </div>

</body>
</html>




