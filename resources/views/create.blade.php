<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                  <label for="product_name" class="form-label">Product name:</label>
                  <input type="text" class="form-control" id="product_name" placeholder="Enter product_name" name="product_name">
                </div>
                <div class="mb-3">
                  <label for="quantity" class="form-label">Quantity:</label>
                  <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
    </div>
</body>
</html>