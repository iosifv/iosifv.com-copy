<!--
    =============================================
        Theme Main Menu
    ==============================================
    -->
<div class="theme-main-menu theme-menu-three">
    <div class="logo">
        <a href="{{ route('homepage') }}">
            <img src="/assets/images/logo/favicon-70x70.png" style="background-color: #e1a34c;" alt="">
        </a>
    </div>
    <nav id="mega-menu-holder" class="navbar navbar-expand-lg" style="margin-right: 255px;">
        <div  class="ml-auto nav-container">
            <button class="navbar-toggler navbar-toggler-right"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="flaticon-setup"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown {{ Route::current()->getName() !== 'homepage' ?: 'active'}}">
                        <a href="{{ route('homepage') }}" class="nav-link dropdown-toggle">Home.</a>
                    </li>
                    <li class="nav-item dropdown position-relative {{ Route::current()->getName() !== 'photos.index' ?: 'active'}}">
                        <a class="nav-link dropdown-toggle" href="/photos">Photos.</a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('photos.index', ['search' => 'phoneography']) }}">Phoneography</a>
                            <a class="dropdown-item" href="{{ route('photos.index', ['search' => 'eye-candy']) }}">Eye-Candy</a>
                        </ul> <!-- /.dropdown-menu -->
                    </li>
                    <li class="nav-item dropdown position-relative {{ Route::current()->getName() !== 'quotes.index' ?: 'active'}}">
                        <a class="nav-link" href="{{ route('quotes.index') }}">Quotes.</a>
                    </li>

                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="/photos">C.V.</a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('cv.main')  }}">View online</a>
                            <a class="dropdown-item" href="{{ asset('resume.html')  }}">Printer friendly</a>
                            <a class="dropdown-item" href="{{ asset('resume.pdf')  }}">Download PDF</a>
                        </ul> <!-- /.dropdown-menu -->
                    </li>

                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Other.</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('links') }}" class="dropdown-item">Links</a></li>
{{--                            <li class="dropdown-submenu dropdown">--}}
{{--                                <a class="dropdown-item dropdown-toggle" href="{{ route('cv.main') }}" data-toggle="dropdown">C.V.</a>--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li><a href="{{ route('cv.main') }}" class="dropdown-item">View online</a></li>--}}
{{--                                    <li><a href="{{ asset('resume.html') }}" class="dropdown-item">Printer friendly</a></li>--}}
{{--                                    <li><a href="{{ asset('resume.pdf') }}" class="dropdown-item">PDF</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                            <li><a href="{{ route('voyager.dashboard') }}" class="dropdown-item">Admin Login</a></li>
                        </ul> <!-- /.dropdown-menu -->
                    </li>
                    @if (Auth::user())
                        <li class="nav-item dropdown position-relative">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Admin.</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('voyager.dashboard') }}" class="dropdown-item">Voyager</a></li>
                                <li><a href="{{ route('photos.admin') }}" class="dropdown-item">Photos Admin</a></li>
                                <li><a href="{{ route('quotes.admin') }}" class="dropdown-item">Quotes Admin</a></li>
                                <form action="{{ route('voyager.logout') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit">
                                        <li><a class="dropdown-item">Logout</a></li>
                                    </button>
                                </form>

                            </ul> <!-- /.dropdown-menu -->
                        </li>
                    @endif
                </ul>
            </div>
        </div> <!-- /.container -->
    </nav> <!-- /#mega-menu-holder -->
    <div class="header-right-widget" style="right: 25px;">
        <ul class="social-icon">
            @include('layouts.components.homepage-icon', ['name' => 'social.instagram'])
            @include('layouts.components.homepage-icon', ['name' => 'social.linkedin'])
            @include('layouts.components.homepage-icon', ['name' => 'contact.phone'])
        </ul>
    </div> <!-- /.header-right-widget -->
</div> <!-- /.theme-main-menu -->
<br><br><br>
