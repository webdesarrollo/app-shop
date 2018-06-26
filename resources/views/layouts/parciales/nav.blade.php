<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 shadow-md sticky-top">
    <a class="navbar-brand" href="#">Top navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">{{Request::path()}}</a>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0">
      <a href="{{ route('register') }}" class="btn btn-default nav-link">Registrarse</a>
      @if(!auth()->user())
      <a href="{{ route('login') }}" class="btn btn-outline-success my-2 my-sm-0 text-white">Login</a>
      @else
      <a href="{{ route('home') }}" class="btn btn-outline-success my-2 my-sm-0 text-white">Home</a>
      @endif
    </form>
    </div>
</nav>