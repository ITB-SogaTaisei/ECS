@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <!-- <h3 class="mt-3 mb-3">パスワード再設定</h3> -->
            <div class="mt-3 mb-3 h3">パスワード再設定
                <span class="h6">
                        <a href="{{ url('/products') }}">ログイン画面へ</a>
                </span>
            </div>
            <hr>
            <p>
                会員ご登録時のメールアドレスを入力してください。<br>
                ご入力いただいたメールアドレスに再設定用のメールを送信いたします。
            </p>
            <hr>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                 {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror ECS-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>メールアドレスが正しくない可能性があります。</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn ECS-submit w-100 mt-3">
                        メールを送信
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
