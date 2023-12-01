@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-5 show-img">
        @if ($productData->image)
            <img src="{{ asset($productData->image) }}" class="w-100 img-fluid">
        @else
            <img src="{{ asset('img/NOIMAGE.png')}}" class="w-100 img-fluid">
        @endif
    </div>
    <div class="col-md-6">
        <h2 class="mb-3">{{ $productData->name }}</h2>
        <p class="h3 text-primary mb-3">￥{{ number_format($productData->price) }}</p>
        <p class="mb-2">在庫: {{ $productData->stock }}</p>

        
        <button class="btn btn-primary mb-3" onclick="location.href='./{{ $productData->id }}/purchase'">購入する</button>
        <p class="text-muted" style="max-width: 80%;">{!! nl2br($productData->description) !!}</p>
    </div>
</div>

@endsection