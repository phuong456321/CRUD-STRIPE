<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    @if(session('message'))
        <div style="color: red;">{{ session('message') }}</div>
    @endif
    <form action="{{url('createProduct')}}" method="post">
        {{ csrf_field() }}
        <div>
            Product ID: <input type="text" name="product_id" required>
        </div><br>
        <div>
            Product Name: <input type="text" name="product_name" required>
        </div><br>
        <div>
            Price: <input type="number" name="price" required>
        </div><br>
        <div>
            Quantity: <input type="number" name="quantity" required>
        </div><br>
        <div>
            Currency: <input type="text" name="currency" required>
        </div><br>
        <div><input type="submit" value="Create new product"></div>
    </form>
    <br>
    <div><a href="{{ url('admin')}}">Back</a></div>
</body>
</html>