@extends('layouts.app')

@section('content')
    <div class="product-home">
        @if (session('message-login'))
            <div class="message-login">
            {{ session('message-login') }}
            </div> 
        @endif
        <h1 class="product-list">商品一覧</h1>

        <div class="container mt-4 product-container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            
                            <div class="card-body">
                                <p class="product-name">{{ $product->name }}</p>
                                <div class="product-img">
                                    <a href="{{ url('/product', $product->id) }}" class="card-title">
                                        @if ($product->image)
                                            <img src="{{ asset($product->image) }}" class="card-img-top">
                                        @else
                                            <img src="{{ asset('img/NOIMAGE.png')}}" class="card-img-top">
                                        @endif
                                    </a>
                                </div>
                                
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">価格: {{ number_format($product->price) }} 税込（/１個）</li>
                                <li class="list-group-item">在庫: {{ $product->stock }}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    
@endsection