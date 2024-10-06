@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach ($products as $product)
                            <h2>Product: {{ $product->product_name }}</h2>
                            <h3>Price: ${{ $product->price }}</h3>
                            <form action="{{ route('stripe') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="submit" value="Pay With Stripe">
                            </form>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
