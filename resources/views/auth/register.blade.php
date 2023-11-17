@extends('layouts.app')
 
 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-5">
            <div class="mt-3 mb-3 h3">新規会員登録
                <span class="ml-3 h6">
                        <a href="{{ url('/products') }}">ログイン画面へ</a>
                </span>
            </div>
            <hr>
 
            <form method="POST" action="{{ route('register') }}">
                @csrf
 
                <div class="form-group row">
                    <label for="name" class="col-md-5 col-form-label text-md-left">氏名<span class="ml-1 ECS-require-input-label"><span class="ECS-require-input-label-text">必須</span></span></label>
 
                    <div class="col-md-7">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror ECS-login-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="田中 太郎">
 
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>氏名を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
 
                <div class="form-group row">
                    <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス<span class="ml-1 ECS-require-input-label"><span class="ECS-require-input-label-text">必須</span></span></label>
 
                    <div class="col-md-7">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror ECS-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="tanaka@tanaka.com">
 
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>メールアドレスを入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
 
                <div class="form-group row">
                    <label for="postal_code" class="col-md-5 col-form-label text-md-left">郵便番号<span class="ml-1 ECS-require-input-label"><span class="ECS-require-input-label-text">必須</span></span></label>
 
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('postal_code') is-invalid @enderror ECS-login-input" name="postal_code" required placeholder="160-○○○○">
                    </div>
                </div>
 
                <div class="form-group row">
                    <label for="address" class="col-md-5 col-form-label text-md-left">配送先住所<span class="ml-1 ECS-require-input-label"><span class="ECS-require-input-label-text">必須</span></span></label>
 
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('address') is-invalid @enderror ECS-login-input" name="address" required placeholder="東京都〇〇区〇〇1丁目１１−１">
                    </div>
                </div>
 
                <div class="form-group row">
                    <label for="phone" class="col-md-5 col-form-label text-md-left">電話番号<span class="ml-1 ECS-require-input-label"><span class="ECS-require-input-label-text">必須</span></span></label>
 
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror ECS-login-input" name="phone" required placeholder="090-○○○○-○○○○">
                    </div>
                </div>
 
                <div class="form-group row">
                    <label for="password" class="col-md-5 col-form-label text-md-left">パスワード<span class="ml-1 ECS-require-input-label"><span class="ECS-require-input-label-text">必須</span></span></label>
 
                    <div class="col-md-7">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror ECS-login-input" name="password" required autocomplete="new-password">
 
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
 
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-5 col-form-label text-md-left"></label>
 
                    <div class="col-md-7">
                        <input id="password-confirm" type="password" class="form-control ECS-login-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
 
                <div class="form-group">
                    <button type="submit" class="btn ECS-submit w-100 mt-3">
                        アカウント作成
                    </button>
                </div>
             </form>
         </div>
     </div>
 </div>
 @endsection
