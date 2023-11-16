<nav class="navbar navbar-expand-md navbar-light shadow-sm header-container">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>


    
    <form class="row g-1" action="{{ route('products.index') }}" method="GET">
      @csrf
      <div class="col-auto">
        <input type="text" class="form-control header-search-input" name="keyword" value="">
      </div>
      <div class="col-auto">
         <button type="submit" class="btn header-search-button"></button>
      </div>
    </form>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
 
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
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ログアウト
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>