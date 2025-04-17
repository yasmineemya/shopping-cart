<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Products</title>
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
      margin-bottom:20px;
      font-size: 13px;
      font-family: 'Didact Gothic', sans-serif;
    }
    .container {
  max-width: 900px;
  margin: auto;
  padding: 0 20px;
}

.admin-form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-bottom: 40px;
}

.admin-form input,
.admin-form textarea,
.admin-form button {
  padding: 12px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 0;
  background-color: white;
  font-family: inherit;
}

.admin-form button {
  background-color: #000;
  color: white;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  border: none;
}

.admin-form button:hover {
  background-color: #333;
}

.section-title {
  font-size: 24px;
  margin-bottom: 20px;
  font-weight: 300;
  letter-spacing: 1px;
  text-align: center;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 20px;
}

.product-card {
  background: white;
  border: 1px solid #e0e0e0;
  padding: 10px;
  text-align: center;
  transition: all 0.3s ease;
}

.product-card:hover {
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.product-card img {
  width: 100%;
  height: auto;
  object-fit: cover;
  margin-bottom: 10px;
}

.product-info h5 {
  font-weight: 400;
  font-size: 16px;
  margin: 0;
}

.product-info p {
  font-size: 14px;
  margin: 5px 0;
}

.text-muted {
  color: #777;
  font-size: 12px;
}
</style>
</head>
<body>
<header>Admin - Add Product</header>
<div class="navbar">
  <a href="/products">
    SHOP</a>  | &nbsp; <a href = "/cart">CART</a>  | &nbsp; <a href = "/admin/products">ADMIN&nbsp;</a>
  </div>
    

    <div class="container">
        <form action="/admin/products/add" method="POST" class="admin-form">
            @csrf
            <input type="text" name="sku" placeholder="SKU" required>
            <input type="text" name="name" placeholder="Product Name" required>
            <textarea name="description" placeholder="Product Description" required></textarea>
            <input type="text" name="image_url" placeholder="Image URL" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <input type="text" name="item" placeholder="item (optional)">
            <input type="text" name="size" placeholder="Size (optional)">
            <button type="submit">Add Product</button>
        </form>

        <h2 class="section-title">Current Products</h2>
        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <div class="product-info">
                        <h5>{{ $product->name }}</h5>
                        <p>${{ number_format($product->price, 2) }}</p>
                        <p class="text-muted">{{ $product->sku }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>


