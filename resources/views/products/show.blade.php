@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <img src="{{ $productData->image }}" class="img-fluid" alt="{{ $productData->name }}">
    </div>
    <div class="col-md-6">
        <h2 class="mb-3">{{ $productData->name }}</h2>
        <p class="h3 text-primary mb-3">￥{{ $productData->price }}</p>
        <p class="mb-2">Stock: {{ $productData->stock }}</p>
        <button class="btn btn-primary mb-3" onclick="location.href='./{{ $productData->id }}/purchase'">購入する</button>
        <p class="text-muted" style="max-width: 80%;">{{ $productData->description }}</p>
    </div>
</div>

@endsection