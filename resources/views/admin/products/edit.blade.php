<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
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

.edit-link a {
  font-size: 12px;
  text-decoration: none;
  color: #000;
  font-family: 'Didact Gothic', sans-serif;
  border-bottom: 1px solid #ccc;
  letter-spacing: 0.5px;
}

.edit-link a:hover {
  color: #555;
  border-color: #aaa;
}
</style>
<body>
<header>Edit Product</header>
<div class="navbar">
    <a href="/products">SHOP</a> | <a href="/cart">CART</a> | <a href="/admin/products">ADMIN</a>
    |  <a href="/admin/orders">ORDERS</a>
</div>

<div class="container">
    <form action="/admin/products/update/{{ $product->id }}" method="POST" class="admin-form">
        @csrf
        <input type="text" name="sku" value="{{ $product->sku }}" required>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <textarea name="description" required>{{ $product->description }}</textarea>
        <input type="text" name="image_url" value="{{ $product->image_url }}" required>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
        <input type="text" name="color" value="{{ $product->color }}">
        <input type="text" name="size" value="{{ $product->size }}">
        <button type="submit">Update Product</button>
    </form>
</div>
</body>
</html>
