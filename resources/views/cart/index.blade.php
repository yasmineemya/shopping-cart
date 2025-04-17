<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
<header>Your Shopping Cart</header>
<div class="navbar">
  <a href="/products">
    SHOP</a>  | &nbsp; <a href = "/cart">CART</a>  | &nbsp; <a href = "/admin/products">ADMIN&nbsp;</a>
  </div>

<div class="container">
    @if (count($cart) > 0)
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>
                            <form action="/cart/update" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form action="/cart/remove" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="cart-total">
            <strong>Total: ${{ number_format($total, 2) }}</strong>
        </div>
        <a href="/checkout" class="btn btn-dark">Proceed to Checkout</a>
    @else
        <p>Your cart is empty.</p>
        <a href="/products" class="btn btn-outline">Shop Products</a>
    @endif
</div>
</body>
</html>
