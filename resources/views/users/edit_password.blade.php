@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3 bg-white mypage-container">
            <div class="text-center pb-1 pt-3 mypage-div">パスワードの変更
                <span class="mypage-span">
                    < <a href="{{ route('mypage') }}">マイページ</a>
                </span>
            </div>

            <hr>
                

            <div class="col-md-12">
                <form method="post" action="{{ route('mypage.change_password') }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                    <div class="row mb-3 mt-5 form-group justify-content-center">
                        <label for="password" class="col-md-3 col-form-label text-md-left">新しいパスワード</label>
                        <div class="col-md-7">
                            <input id="password" type="password" class="form-control @error('password')is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>パスワードが一致していません</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-5 form-group justify-content-center">
                        <label for="password-confirm" class="col-md-3 col-form-label text-md-left">確認用</label>
                        <div class="col-md-7">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn ECS-submit my-3 mr-5 w-25 justify-content-center">変更</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

