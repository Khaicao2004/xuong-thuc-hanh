<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>

<body>
    <h1>New Order Created</h1>
    <p>Order ID: {{ $order->id }}</p>
    <p>Product Name: {{ $order->product_name }}</p>
    <p>Quantity: {{ $order->quantity }}</p>
    <p>Price: {{ $order->price }}</p>
</body>

</html>
