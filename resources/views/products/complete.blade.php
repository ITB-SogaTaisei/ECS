<!-- resources/views/purchases/complete.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('購入が完了しました！') }}</div>

                    <div class="card-body">
                        <p>ご購入感謝します！</p>
                        <a href="/product" class="btn btn-primary mt-3">商品一覧に戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
