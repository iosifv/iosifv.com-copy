<!DOCTYPE html>
<html @yield('html') lang="{{ config('app.locale') }}">

<head>
    <!-- This should contain stuff needed by the whole website -->

    @include('layouts.components.head-meta')
    @include('layouts.components.head-facebook')
    @include('layouts.components.head-title')
    @include('layouts.components.head-css')
    @include('layouts.components.head-ie-fix')

    @yield('head')
</head>

<body @yield('body-class')>

<div class="main-page-wrapper">
    @yield('body')
</div> <!-- /.main-page-wrapper -->

@include('layouts.components.footer-javascript')
@include('layouts.components.footer-analytics')
</body>

<!-- Yield After Body -->
@yield('after-body')

</html>
