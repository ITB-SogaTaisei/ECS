@extends('layouts.app')
 
@section('content')
@if (session('message-login'))
    <div class="message-login">     
    {{ session('message-login') }}
    </div> 
@endif

<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3 bg-white mypage-container">

            <div class="text-center pb-1 pt-3 mypage-div">マイページ
                <span class="mypage-span">
                    < <a href="{{ url('products') }}">商品ページ</a>
                </span>
            </div>
                
        
            

            <hr>

            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <label class="user-name">会員情報の編集</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{route('mypage.edit')}}">
                            <label class="mypage-label1"><i class="fa-solid fa-user-pen"></i></label>
                        </a>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <label class="user-name">パスワードの変更</label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <a href="{{route('mypage.edit_password')}}">
                            <label class="mypage-label2"><i class="fa-solid fa-arrow-right-arrow-left"></i></label>
                        </a>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <label class="user-name">商品カート</label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <a href="#">
                            <label class="mypage-label"><i class="fa-solid fa-cart-shopping"></i></label>
                        </a>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container">
                <div class="d-flex justify-content-between mb-3">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <label class="user-name">ログアウト</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <label class="mypage-label"><i class="fa-solid fa-right-from-bracket"></i></label>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<br>
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-fluid">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">×閉じる</button>
                            </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="user-logout">本当にログアウトしますか？</label>
                                        <p class="text-danger" style="font-size: 20px">注意！！</p>
                                        <p>・注文を行う際は再度ログインが必要になります。</p>
                                        <br>
                                        <hr>
                                        <button class="btn ECS-submit" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            ログアウトする                            
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection