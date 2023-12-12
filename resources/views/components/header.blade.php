<nav class="navbar navbar-expand-md navbar-light shadow-sm header-container">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/product') }}">
      <!-- {{ config('app.name', 'Laravel') }} -->
      <img src="{{ asset('img/phplogo.png') }}" style="width:100px; height: 50px">
    </a>


    
    <form class="row" action="{{ route('products.index') }}" method="GET">
      @csrf
      <div class="col-auto">
        <input type="text" class="form-control header-search" name="keyword" value="" placeholder="キーワード検索">
      </div>
      <div class="col-auto">
          <button type="submit" class="btn ECS-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
    </form>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mr-5 mt-2">

        @guest
        <li class="nav-item mr-5">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        <li class="nav-item mr-5">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @else
        <li class="nav-item mr-5">
          <a class="nav-link" href="{{ route('mypage') }}">
            <label><i class="fa-solid fa-house" style="font-size: 30px"></i></label>
          </a>
        </li>
        @endguest
      </ul>
    </div>

  </div>
</nav>