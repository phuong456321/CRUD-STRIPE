<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="{{url("edit/{$product->product_id}")}}" method="POST">
        {{ csrf_field() }}
        <div>
            Product ID: <input type="text" name="product_id"  value="{{$product->product_id}}" readonly>
        </div><br>
        <div>
            Product Name: <input type="text" name="product_name" value="{{$product->product_name}}" required>
        </div><br>
        <div>
            Price: <input type="number" name="price" value="{{$product->price}}" required>
        </div><br>
        <div>
            Quantity: <input type="number" name="quantity" value="{{$product->quantity}}" required>
        </div><br>
        <div>
            Currency: <input type="text" name="currency" value="{{$product->currency}}" required>
        </div><br>
        <div><input type="submit" value="Edit"></div>
    </form>
    <br>
    <div><a href="{{ url('admin')}}">Back</a></div>
</body>
</html>