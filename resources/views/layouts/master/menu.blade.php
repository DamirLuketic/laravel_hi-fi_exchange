<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{route('index')}}">Home</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">

</ul>

<ul id="navbar_right" class="nav navbar-nav navbar-right">

    @if(!Auth::check())

        <li><a href="{{ url('/login') }}">Login</a></li>

        <li><a href="{{ url('/register') }}">Register</a></li>

    @else

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Welcome {{ Auth::user()->name }}</a>

        <li><a href="{{ url('/logout') }}">Logout</a></li>

        <li><a href="{{ route('users.edit', Auth::user()->slug) }}">Personal</a></li>

    @endif

</ul>