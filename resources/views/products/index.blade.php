@extends('layouts.app')

@section('content')
    <h1>商品一覧</h1>
    <div class="container mt-4">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        
                        <div class="card-body">
                            <a href="{{ url('/product', $product->id) }}" class="card-title">{{ $product->name }}</a>
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Price: {{ $product->price }}</li>
                            <li class="list-group-item">Stock: {{ $product->stock }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    
@endsection