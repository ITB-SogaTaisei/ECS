@extends('layouts.app')

@section('content')
    <h1>商品登録</h1>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">商品名:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="description">説明:</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label for="price">価格:</label>
            <input type="number" name="price" required>
        </div>
        <div>
            <label for="stock">在庫:</label>
            <input type="number" name="stock" required>
        </div>
        <div>
            <label for="image">画像:</label>
            <input type="file" name="image" accept="image/*" required>
        </div>
        <div>
            <a href="/products">
                <button type="submit">登録</button>
            </a>
            
        </div>
    </form>
@endsection
