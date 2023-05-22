@extends('layouts.base')

@section('head')
    {!! MaterializeCSS::include_full() !!}
    <link rel="stylesheet" href="{{ mix('/css/iosifv-style.css') }}">
@endsection

@section('body')

    <main class="container showcase">
        <div class="row">
            <div class="col l6 offset-l3">
                <div class="spacer-2"></div>
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="page-footer">
    <!-- <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Control</h5>
                <p class="grey-text text-lighten-4">
                    [coming soon]
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li>
                        <a class="grey-text text-lighten-3" href="{{ route('photos.index') }}">
                            Back to all photos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
    <div class="footer-copyright">
        <div class="container">
            <p>
                © 2019 dev@iosifv.com
                <a class="grey-text text-lighten-4 right" href="{{ route('iosifv') }}">iosifv.com</a>
                <a class="grey-text text-lighten-4 right">&nbsp;|&nbsp;</a>
                <a class="grey-text text-lighten-4 right" href="javascript:history.back(1);">Back</a>
            </p>
        </div>
    </div>
    </footer>

@endsection
