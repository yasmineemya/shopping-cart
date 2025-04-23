<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Orders</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>All Orders</header>
<div class="navbar">
  <a href="/products">SHOP</a> | <a href="/cart">CART</a> | <a href="/admin/products">ADMIN</a> | <a href="/admin/orders">ORDERS</a>
</div>

<div class="container">
    <h2 class="section-title">Order History</h2>

    <table class="cart-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>ZIP</th>
                <th>Total ($)</th>
                <th>Placed At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->zip }}</td>
                <td>{{ number_format($order->total_amount, 2) }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
