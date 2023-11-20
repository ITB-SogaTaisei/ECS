@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('手続き') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('手続きが完了しました！') }} <a href="{{ url('/products') }}">商品画面へ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
