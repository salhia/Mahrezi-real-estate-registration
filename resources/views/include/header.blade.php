<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{config('app.name')}}</a>  <!-- this code points towards  Config folder app.php file (name saved in env file)-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        @auth
            <li class="nav-item">
                  <a class="nav-link" href="/logout">Logout</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="/change-password">Change Password</a>
            </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/logout">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/registration">Registration</a>
        </li>

        @endauth
      </ul>
      @if(Auth::check())
      <span class="navbar-text">
       {{auth()->user()->name}}
      </span>
      @endif
    </div>
  </div>
</nav>