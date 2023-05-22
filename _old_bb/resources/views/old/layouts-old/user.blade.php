@extends('layouts.base')

@section('head')
    {!! MaterializeCSS::include_full() !!}
    <link rel="stylesheet" href="{{ mix('/css/iosifv-style.css') }}">
@endsection

@section('body')
    <div class="spacer-1"></div>
    <main class="container container-dark">
        <nav>
            <div class="nav-wrapper">
                <a href="{{ route('iosifv') }}">
                    <img src="/assets/images/logo/favicon-270x270.png" class="menu-logo">
                </a>
                <a href="{{ route('iosifv') }}" class="brand-logo hide-on-med-and-down" style="padding-left: 15px;">
                    iosifv.com
                </a>
                <ul id="nav-mobile" class="right">
                    <li>

                        <form method="get" action="" accept-charset="UTF-8">
                            <div class="input-field" style="height: auto;">
                                <input name="search" id="search" type="search" required>
                                <label class="label-icon" for="search">
                                    <i class="material-icons">search</i>
                                </label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </li>
                    <li class="{{ request()->is('quotes') ? 'active' : '' }}">
                        <a href="{{ route('quotes.index') }}">Quotes</a>
                    </li>
                    <li class="{{ request()->is('photos') ? 'active' : '' }}">
                        <a href="{{ route('photos.index') }}">Photos</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="spacer-1"></div>

        @yield('content')

    </main>

    <footer class="page-footer container">
        <div class="footer-copyright">
            <div class="container">
                © 2019 dev@iosifv.com
                <a class="grey-text text-lighten-4 right" href="{{ route('iosifv') }}">iosifv.com</a>
            </div>
        </div>
    </footer>
@endsection
