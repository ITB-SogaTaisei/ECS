@extends('layouts.app')
 


@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 offset-3 bg-white mypage-container">
            <div class="text-center pb-1 pt-3 mypage-div">会員情報の編集
                <span class="mypage-span">
                    < <a href="{{ route('mypage') }}">マイページ</a>
                </span>
            </div>
                
            <div class="col-md-12">
            

                <hr>

                <form method="POST" action="{{ route('mypage') }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="name" class="text-md-left">氏名</label>
                        <div class="collapse show editUserName">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="田中 太郎">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>氏名を入力してください</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <br>


                    <div class="form-group">
                        <label for="email" class="text-md-left">メールアドレス</label>
                        <div class="collapse show editUserMail">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="tanaka@tanaka.com">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>メールアドレスを入力してください</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="postal_code" class="text-md-left">郵便番号</label>
                        <div class="collapse show editUserPhone">
                            <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ $user->postal_code }}" required autocomplete="postal_code" autofocus placeholder="⚪︎⚪︎⚪︎-⚪︎⚪︎⚪︎⚪︎">
                            @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>郵便番号を入力してください</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="address" class="text-md-left">配送先住所</label>
                        <div class="collapse show editUserPhone">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus placeholder="東京都⚪︎⚪︎区⚪︎-⚪︎-⚪︎">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>住所を入力してください</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="phone" class="text-md-left">電話番号</label>
                        <div class="collapse show editUserPhone">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus placeholder="⚪︎⚪︎⚪︎-⚪︎⚪︎⚪︎-⚪︎⚪︎⚪︎⚪︎">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>電話番号を入力してください</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <button type="submit" class="btn ECS-submit my-3 mr-5 w-25">
                        保存
                    </button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection