<nav class="uk-navbar-container uk-navbar-transparent uk-container uk-margin uk-light uk-position-top uk-position-z-index" uk-navbar="mode: click">
    <div class="uk-navbar-left">              
        <a class="uk-navbar-item uk-logo" href="{{ url('/') }}"><img width="50" height="50" src="{{ asset('/img/its-putih.png') }}"/></a>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav uk-visible@s">
            <li><a href="/web">Web Gis</a></li>
            <li><a href="/usaha">Usaha</a></li>
        </ul>
        <ul class="uk-navbar-nav">
            @guest
            <li><a class="uk-navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a></li> 
            @else
            <li><a href="#">{{ Auth::user()->name }}</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href='/home'>Dashboard</a></li>
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </ul>
                </div>
            </li>
            @endguest                  
        </ul>                    
        <a class="uk-navbar-toggle uk-hidden@s" href="#offcanvas-slide" uk-navbar-toggle-icon="" uk-toggle=""></a>  
    </div>
</nav>