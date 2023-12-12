@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5"> <!-- 上下のマージンを大胆に追加 -->
    <h1 class="text-center mb-4">
        @if($cartData->isEmpty())
            <span class="display-1">カートに商品はありません。</span>
            <br>
            <a href="/products" class="btn btn-secondary mt-3">商品一覧に戻る</a>
        @else
            カート
        @endif
    </h1>

    @if(!$cartData->isEmpty())
        <div class="row">
            @php
                $totalPrice = 0; // 合計金額を初期化
            @endphp

            @foreach($cartData as $cartItem)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                @if ($cartItem->image)
                                    <img src="{{ asset($cartItem->image) }}" class="card-img">
                                @else
                                    <img src="{{ asset('img/NOIMAGE.png')}}" class="card-img">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cartItem->name }}</h5>
                                    <p class="card-text h3 text-primary mb-3">￥{{ number_format($cartItem->price) }}</p>
                                    <p class="card-text mb-2">在庫: {{ $cartItem->stock }}</p>
                                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-3">削除する</button>
                                    </form>
                                    <button class="btn btn-primary mb-3" onclick="location.href='./product/{{ $cartItem->product_id }}/purchase'">購入する</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $totalPrice += $cartItem->price; // 合計金額に商品の値段を加算
                @endphp
            @endforeach
        </div>

        <div class="text-right mt-5"> <!-- 上マージンを大胆に追加 -->
            <h4>小計 ({{ $cartData->count() }} 個の商品) (税込) : ￥{{ number_format($totalPrice) }}</h4>
            <a href="cart/balk_purchase" class="btn btn-success">レジに進む</a>
        </div>
    @endif
</div>
@endsection
