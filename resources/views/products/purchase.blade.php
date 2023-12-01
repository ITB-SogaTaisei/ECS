@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-5 show-img">
        @if ($productData->image)
            <img src="{{ asset($productData->image) }}" class="w-100 img-fluid">
            @else
            <img src="{{ asset('img/NOIMAGE.png') }}" class="w-100 img-fluid">
        @endif
    </div>
    <div class="col-md-6">
        <div class="mb-5">
            <h2>{{ $productData->name }}</h2>
        </div>

        <div class="mb-5">
            <h2>お届け先</h2>

            <br>
            
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
            <p class="h3 text-primary">￥{{ number_format($productData->price) }}</p>
        </div>

        <div class="mb-5">
            <!-- <button class="btn btn-primary" onclick="location.href='./purchase/complete'">支払いを確定する</button> -->
            @if (0 < $productData->stock)
                <button class="btn btn-primary" type="submit" onclick="location.href='./purchase/complete' ">支払いを確定する
            @else
                <input class="btn btn-primary-disabled" type="submit" value="売り切れてしまいました！入荷されるまでお待ちください。(場合によっては入荷されない場合もございます。)" disabled>
            @endif
        </div>
    </div>
</div>

@endsection
