<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-static-top shadow-lg">
  <div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand" href="{{ url('/') }}">
      <strong>X</strong>card
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
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登入</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">註冊</a></li>
      </ul>
    </div>
  </div>
</nav>