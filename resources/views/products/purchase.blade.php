@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <img src="{{ $productData->image }}" class="img-fluid" alt="{{ $productData->name }}">
    </div>
    <div class="col-md-6">
        <div class="mb-5">
            <h2>{{ $productData->name }}</h2>
        </div>

        <div class="mb-5">
            <h2>お届け先</h2>
            <h4>{{ $userData->name }}</h4>
            <h4>{{ $userData->postal_code }}</h4>
            <h4>{{ $userData->address }}</h4>
        </div>

        <div class="mb-5">
            <h2>合計</h2>
            <p class="h3 text-primary">￥{{ $productData->price }}</p>
        </div>

        <div class="mb-5">
            <button class="btn btn-primary" onclick="location.href='./{{ $productData->id }}/purchase'">支払いを確定する</button>
        </div>
    </div>
</div>

@endsection
