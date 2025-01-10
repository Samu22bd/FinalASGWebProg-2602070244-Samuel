<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> @yield('title') </title>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <div class="col-2">
        <a class="navbar-brand" href={{ route('home') }}>ConnectFriend</a>
      </div>

      <div class="col-2">
        <a class="nav-link" href="{{ route('avatar.index') }}">@lang('layouts.a_avatars')</a>
      </div>

      <div class="col-2">
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @lang('layouts.a_language')
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('locale.set', ['locale'=>'en']) }}">@lang('layouts.a_english')</a></li>
            <li><a class="dropdown-item" href="{{ route('locale.set', ['locale'=>'id']) }}">@lang('layouts.a_indonesia')</a></li>
          </ul>
        </div>
      </div>
      
      @if(auth()->user())
      <div class="col-2">
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hi, {{auth()->user()->name}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('user.profile') }}">@lang('layouts.a_profile')</a></li>
            <li><a class="dropdown-item" href="{{ route('coin.show') }}">@lang('layouts.a_addCoin')</a></li>
            <li><a class="dropdown-item" href="{{ route('user.avatar') }}">@lang('layouts.a_myAvatars')</a></li>
            <li><a class="dropdown-item" href="{{ route('user.setting') }}">@lang('layouts.a_settings')</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="dropdown-item">@lang('layouts.a_logout')</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
      @else
      <div class="col-2">
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @lang('layouts.a_welcome')
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('login.show') }}">@lang('layouts.a_login')</a></li>
            <li><a class="dropdown-item" href="{{ route('register.show') }}">@lang('layouts.a_register')</a></li>
          </ul>
        </div>
      </div>
      @endif

    </div>
  </nav>

  @yield('content')

  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>