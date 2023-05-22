<!-- Facebook Open Graph -->
<meta property="og:type" content="website"/>

@if(View::hasSection('title'))
    <meta property="og:title" content="iosifv.com - @yield('title')"/>
@else
    <meta property="og:title" content="iosifv.com - Personal Homepage"/>
@endif

@if(View::hasSection('fb-description'))
    <meta property="og:description" content="@yield('fb-description')"/>
@endif

@if(View::hasSection('fb-url'))
    <meta property="og:url" content="@yield('fb-url')"/>
@else
    <meta property="og:url" content="https://www.iosifv.com/"/>
@endif

@if(View::hasSection('fb-image'))
    <meta property="og:image" content="@yield('fb-image')"/>
@else
    <meta property="og:image" content="{{ asset('assets/images/logo/logo-2000x2000.png') }}"/>
@endif
