@extends('layouts.base')
@section('title', 'myAdmin')

@section('head')
    {!! MaterializeCSS::include_full() !!}
    <link rel="stylesheet" href="{{ mix('/css/iosifv-style.css') }}">
@endsection

@section('body')
    <div class="spacer-1"></div>
    <main class="container">
        <nav>
            <div class="nav-wrapper">

                <ul id="nav-mobile" class="left">
                    <li><a href="{{ route('quotes.index') }}">Quotes</a></li>
                    <li><a href="{{ route('photos.index') }}">Photos</a></li>
                    <li>|</li>
                    <li><a href="{{ route('iosifv') }}">iosifv.com</a></li>
                </ul>
                <ul id="nav-mobile" class="right">
                    <li>
                        <a href="{{ route('voyager.media.index') }}">Voyager</a>
                    </li>
                    <li class="{{ request()->is('quotes/admin') ? 'active' : '' }}">
                        <a href="{{ route('quotes.admin') }}">Quotes</a>
                    </li>
                    <li class="{{ request()->is('photos/admin') ? 'active' : '' }}">
                        <a href="{{ route('photos.admin') }}">Photos</a>
                    </li>
                    <li class="{{ request()->is('tags')   ? 'active' : '' }}">
                        <a href="{{ route('tags.index') }}">Tags</a>
                    </li>
                </ul>
            </div>
        </nav>

        @include('components.session-messages')

        <div class="spacer-1"></div>

        @yield('content')

    </main>
@endsection
