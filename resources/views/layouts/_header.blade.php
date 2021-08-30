<nav class="navbar navbar-expand-lg navbar-light bg-white navbar-static-top">
  <div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand" href="{{ url('/') }}">
      <div class="h2 mb-0"><strong>X</strong><i>CARD</i></div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登入</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">註冊</a></li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle rounded-circle mr-1" width="30px" height="30px">
            {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">
                <div class="user-item">
                  <div><i class="far fa-user"></i></div>
                  <div>個人中心</div>
                </div>
              </a>
              <a class="dropdown-item" href="{{ route('users.edit', Auth::id()) }}">
                <div class="user-item">
                  <div><i class="far fa-edit"></i></div>
                  <div>編輯資料</div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" id="logout" href="#">
                <form action="{{ route('logout') }}" method="POST"
                      onsubmit="return confirm('您確定要退出嗎？');">
                  {{ csrf_field() }}
                  <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                </form>
              </a>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>