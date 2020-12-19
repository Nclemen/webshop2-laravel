<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('main.index') }}">AO webshop2</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item @if (url()->current() == route('shop.index')) active @endif">
            <a class="nav-link" href="{{ route('shop.index') }}">shop</a>
          </li>
          @if (Auth::check() && Auth::user()->is_admin)
          <li class="nav-item @if (url()->current() == route('admin.index')) active @endif">
            <a class="nav-link" href="{{ route('admin.index') }}">admin</a>
          </li>
          @endif
        </ul>
        @if (Session::get('cart')) 
        <a class="nav-link" href="{{ route('shop.cart')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
        </a>
        @endif
        @if (Auth::check())
          <a href="{{ route('profile') }}" class="" type="submit">profile</a>
          <form action="{{route('logout')}}" class="form" method="post">
            @csrf
            <input type="submit" value="logout" class="btn btn-danger" >
          </form>
        @else 
          <a href="{{ route('registerForm') }}" class="btn btn-outline-secondary my-2 my-sm-0" type="submit">register</a>
          <a href="{{ route('loginForm') }}" class="btn btn-outline-primary my-2 my-sm-0" type="submit">login</a>
        @endif
      </div>
    </div>
    </nav>