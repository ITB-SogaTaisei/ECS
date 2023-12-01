@extends('layouts.app')
 
@section('content')

@if (session('message-login'))
    <div class="message-login">     
    {{ session('message-login') }}
    </div> 
@endif

<div class="container justify-content-center mt-5">
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
                            <label class="user-name" style="font-size: 60px">></label>
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
                            <label class="user-name" style="font-size: 60px">></label>
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
                                <label class="user-name">ログアウト</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <label class="user-name" style="font-size: 60px">></label>
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
@endsection