 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navbar-fixed-top">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">
                    manna
                </a>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ !request()->is('/') ?: 'active' }}"><a href="{{ route('home') }}">Početna</a></li>
                <li class="{{ !request()->is('about') ?: 'active' }}"><a href="{{ route('about') }}">O nama</a></li>
                <li class="{{ !request()->is('contact') ?: 'active' }}"><a href="{{ route('contact') }}">Kontakt</a></li>
            </ul>
            <ul class="navbar-nav pull-right right-nav">
                @if( ! auth()->user() )
                    <li class="nav-item {{ !request()->is('login') ?: 'active' }}" style="margin-right: 20px;">
                        <a class="nav-link" href="{{route('login_form')}}"><i class="fa fa-unlock"></i> Prijavite se</a>
                    </li>
                    <li class="nav-item {{ !request()->is('register') ?: 'active' }}">
                        <a class="nav-link" href="{{ route('register_form') }}"><i class="fa fa-user-plus"></i> Registrujte se</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="navbar-brand" style="margin-right: 35px;" href="{{ route('church.index') }}">
                            {{ auth()->user()->first_name.' '.auth()->user()->last_name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 10px;" href="{{ route('logout') }}"><i class="fa fa-lock"></i> Odjavite se</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>