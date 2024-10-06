<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Employee</title>
</head>

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Products') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button><a href="{{ url('createProduct') }}">Add new</a></button>
                        <br>
                        <br>
                        <div class="row">

                            <div class="col-md-12 text-center d-flex justify-content-center">
                                <table border="1" cellpadding="10">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Currency</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->product_id }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->currency }}</td>
                                                <td>
                                                    <button><a
                                                            href="{{ url("edit/{$product->product_id}") }}">Edit</a></button>
                                                    |
                                                    <button><a
                                                            href="{{ url("delete/{$product->product_id}") }}">Delete</a></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

</html>
