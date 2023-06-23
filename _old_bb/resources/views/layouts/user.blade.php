@extends('layouts.base')

@section('head')
    {{-- Stuff needed only by the user facing pages --}}
@endsection

@section('body-class')
    class="no-scroll-y home-portfo"
@endsection

@section('body')

    @include('layouts.components.menu-main')

    <header>
        @include('layouts.components.session-messages')
    </header>

    @include('layouts.components.preloader')

    @yield('content')

    @include('layouts.components.scroll-to-top')

@endsection
