<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
<header>Checkout</header>
<div class="navbar">
  <a href="/products">
    SHOP</a>  | &nbsp; <a href = "/cart">CART</a>  | &nbsp; <a href = "/admin/products">ADMIN&nbsp;</a>
  </div>

<div class="container">
    <form action="/checkout" method="POST" class="checkout-form">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="city" placeholder="City" required>
        <input type="text" name="zip" placeholder="ZIP Code" required>
        <button type="submit" class="btn btn-dark">Place Order</button>
    </form>
</div>
</body>
</html>

