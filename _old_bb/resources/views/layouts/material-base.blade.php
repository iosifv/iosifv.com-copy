<!DOCTYPE html>
<html @yield('html') lang="{{ config('app.locale') }}">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="name" content="Iosif V">
    <meta property="description" content="Software Engineer. Talented Photographer.">
    <meta content="width=device-width,initial-scale=1" name="viewport">

    <!-- Title -->
    <title>
        @if(View::hasSection('title'))
            iosifv.com - @yield('title')
        @else
            iosifv.com
        @endif
    </title>

    <!-- favicon -->
    {{-- Todo: move this to laravel.mix ? --}}
    <link rel="icon"     type="image/png"    href="/assets/images/logo/favicon-16x16.png" sizes="16x16">
    <link rel="icon"     type="image/png"    href="/assets/images/logo/favicon-32x32.png" sizes="32x32">
    <link rel="icon"     type="image/png"    href="/assets/images/logo/favicon-96x96.png" sizes="96x96">
    <link rel="shortcut" type="image/x-icon" href="/assets/images/logo/logo-2000x2000.png">

    <!-- Scripts -->
    <style>@media print {#ghostery-purple-box {display:none !important}}</style>

    <!-- Facebook Open Graph -->
    <meta property="og:type"  content="website"/>

    @if(View::hasSection('title'))
        <meta property="og:title" content="iosifv.com - @yield('title')"/>
    @else
        <meta property="og:title" content="iosifv.com - Personal Homepage"/>
    @endif

    @if(View::hasSection('fb-description'))
        <meta property="og:description" content="@yield('fb-description')"/>
    @endif

    @if(View::hasSection('fb-url'))
        <meta property="og:url"   content="@yield('fb-url')"/>
    @else
        <meta property="og:url"   content="https://www.iosifv.com/"/>
    @endif

    @if(View::hasSection('fb-image'))
        <meta property="og:image" content="@yield('fb-image')"/>
    @else
        <meta property="og:image" content="{{ asset('assets/images/logo/logo-2000x2000.png') }}"/>
    @endif

    <!-- Yield Head -->
    @yield('head')
</head>

<body>
    <header>
        @include('layouts.components.session-messages')
    </header>
    @yield('body')
</body>

<!-- Yield After Body -->
@yield('after-body')

</html>
