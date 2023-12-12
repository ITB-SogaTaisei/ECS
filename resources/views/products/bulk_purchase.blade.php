@extends('layouts.app')

@section('content')

@php
$totalPrice = 0; // 合計金額を初期化
@endphp

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach($cartData as $cartItem)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    @if ($cartItem->image)
                                        <img src="{{ asset($cartItem->image) }}" class="card-img" style="max-height: 100%;">
                                    @else
                                        <img src="{{ asset('img/NOIMAGE.png')}}" class="card-img" style="max-height: 100%;">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cartItem->name }}</h5>
                                        <p class="card-text h3 text-primary mb-3">￥{{ number_format($cartItem->price) }}</p>
                                        <p class="card-text mb-2">在庫: {{ $cartItem->stock }}</p>
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
        </div>

        <div class="col-md-4">
            <div class="mb-5">
                <h4>名前：{{ $userData->name }}</h4>
                <h4>郵便番号 : {{ $userData->postal_code }}</h4>
                <h4>配送先 : {{ $userData->address }}
                    <a class="btn btn-link mr-3" href="{{ route('mypage.edit') }}">
                        < 配送先の変更
                    </a>
                </h4>
            </div>

            <div class="mb-5">
                <h2>合計</h2>
                <p>￥{{ number_format($totalPrice) }}</p>
            </div>

            <div>
                @if ($cartData->isNotEmpty() && $cartData->first()->stock > 0)
                    <button class="btn btn-primary" onclick="location.href='/purchase/compete'">支払いを確定する</button>
                @else
                    <input class="btn btn-primary-disabled" type="submit" value="お客様のカートに商品はありません。" disabled>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
