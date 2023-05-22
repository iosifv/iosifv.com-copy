@extends('layouts.base')

@section('title', 'Personal CV')
@section('fb-url', route('cv.main') )
@section('fb-image', asset('assets/images/profile/square-smile-profile-fb.jpg') )
@section('fb-description', 'Web developer | Creative thinker | Solution creator | Change maker' )

@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSS -->
    <link href="{{ mix('/css/cv-style.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/vendor-bootstrap-v3.3.min.css') }}" rel="stylesheet">
    <link href="{{ mix('vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
{{--    <link href="{{ mix('/css/vendor-animate.css') }}" rel="stylesheet">--}}

    <link href="{{ mix('/vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

@endsection

@section('after-body')
    <!-- js -->
    <script src="/js/cv-vendor-jquery.js" type="text/javascript"></script>
{{--    <script src="/js/cv-vendor-jq-lettering.js" type="text/javascript"></script>--}}
    <script src="/js/cv-vendor-jq-textillate.js" type="text/javascript"></script>
    <script src="/js/cv-vendor-smoothscroll.js" type="text/javascript"></script>
    <script src="/js/cv-app.js" type="text/javascript"></script>

@endsection

@section('body')
@if (!$hide)
<section id="home" class="header" style="background-image: url('/assets/images/cv/cover.jpg')">
    <div class="sector">
        <div id="logo" class="box">
            <img src="/assets/images/logo/favicon-96x96.png" style=" height: 64px; width: 64px;">
        </div>
        @if (!$hide)
            <h1 class="main-title"> Iosif V </h1>
        @endif
        <h4 class="tagline">{{ $resume->meta->tagline }}</h4>
    </div>
</section>
@endif
<?php
/** @var object $resume */

$size =
    preg_match(
        "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|" .
        "palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
        $_SERVER["HTTP_USER_AGENT"]
    ) ? 'sm' : 'xs';
?>
<section id="about">

    <div class="container">
        <div class="row">
            <div class="col-{{$size}}-4 col-{{$size}}-push-8">
                @if (!$hide)
                    <div class="section-holder texture">

                        @include('cv.decorated-box')

                        <div class="img-holder">
                            <img src="/assets/images/profile/square-smile-profile.jpg"
                                 class="img-responsive img-circle img-grayscale" alt="Iosif V">
                        </div>

                        @include('cv.component-title-start', ['title' => 'Let\'s Talk', 'icon' => 'ion-ios-chatboxes-outline'])

                        <br><br>

                        <table>
                            <tr>
                                <td>
                                    <i class="ion-ios-email-outline fa-2x"></i>
                                    &nbsp;
                                </td>
                                <td>
                                    <a href="mailto:spamATiosifvDOTcom"
                                       onclick = "this.href = this.href
                                        .replace(/AT/,'&#64;').replace(/DOT/,'&#46;').replace(/spam/,'hire-me')">
                                        <i class="icon-email size-2x"></i>
                                        <p id="hide"><span id="where"></span></p>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="ion-ios-telephone-outline fa-2x"></i>
                                </td>
                                <td>
                                    <div id="phone-number"
                                         data-last="713.7739"
                                         data-warning="Thank you for reading my CV! :)">
                                        +44.759.<span>[reveal]</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="ion-ios-location-outline fa-2x"></i>
                                </td>
                                <td>
                                    {{ $resume->basics->location->city }}, {{ $resume->basics->location->countryCode }}
                                </td>
                            </tr>
                        </table>

                        <hr>
                        <div class="social-links">
                            <a target="_blank" href={{ asset('resume.html') }}>
                                <i class="ion-ios-printer-outline fa-2x"></i>
                                Print version
                            </a>
                            <br>
                            <a target="_blank" href={{ asset('resume.pdf') }}>
                                <i class="ion-ios-download-outline fa-2x"></i>
                                &nbsp;Download PDF
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-{{$size}}-8 col-{{$size}}-pull-4">
                <div class="section-holder">
                    @include('cv.component-title-start', ['title' => 'about me', 'icon' => 'ion-ios-compose-outline'])

                    @if (env('CV_STATUS_ENABLE'))
                        <br> <br>
                        <h4><strong>Status: </strong>{{ env('CV_STATUS_TEXT') }}</h4>
                    @endif

                    <hr>
                    <h4>Summary</h4>
                    <ul>
                        <li>{{ $resume->basics->summary }}</li>
                    </ul>

                    <br>

                    <h4> Languages </h4>
                    <ul>
                        <li>English, Romanian, Hungarian</li>
                    </ul>

                    <br>

                    <h4> Other </h4>
                    <ul>
                        <li>Romanian nationality</li>
                        <li>Hobbies: {{ implode(', ', $resume->interests[0]->keywords) }}</li>
                    </ul>
                    @if (!$hide)
                    <hr>

                    <h3> Online Presence </h3>
                    <div class="social-links">
                        <a target="_blank" href="{{ $resume->basics->profiles[0]->url }}">
                            <i class="fab fa-{{ $resume->basics->profiles[0]->network }} fa-2x"></i>
                        </a>
                        &bull;
                        <a target="_blank" href="{{ $resume->basics->profiles[1]->url }}">
                            <i class="fab fa-{{ $resume->basics->profiles[1]->network }} fa-2x"></i>
                        </a>
                        &bull;
                        <a target="_blank" href="{{ $resume->basics->profiles[2]->url }}">
                            <i class="fab fa-{{ $resume->basics->profiles[2]->network }} fa-2x"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


<section id="experience-testimonials">

    <div class="container">
        <div class="row">

            <div class="col-sm-4">

                <div class="section-holder texture">
                    @include('cv.decorated-box')
                    @include('cv.component-title-start', ['title' => 'Projects', 'icon' => 'ion-ios-barcode-outline'])
                    <div class="testi-holder">

                        @component('cv.component-project', [
                            'hide' => $hide,
                            'title' => $resume->projects[0]->name,
                            'highlights' => $resume->projects[0]->highlights
                            ])
                        @endcomponent

                        @component('cv.component-project', [
                            'hide' => $hide,
                            'title' => $resume->projects[1]->name,
                            'url' => $resume->projects[1]->url,
                            'highlights' => $resume->projects[1]->highlights
                            ])
                        @endcomponent

                        @component('cv.component-project', [
                            'hide' => $hide,
                            'title' => $resume->projects[2]->name,
                            'url' => $resume->projects[2]->url,
                            'highlights' => $resume->projects[2]->highlights
                            ])
                        @endcomponent
                    </div>
                </div>

                <br><br>

                <div class="section-holder texture">
                    @include('cv.decorated-box')
                    @include('cv.component-title-start', ['title' => 'skills', 'icon' => 'ion-ios-cog-outline'])
                    <div class="testi-holder">
                        @component('cv.component-skill', [
                        'title' => 'Software Engineering',
                        'skills' => [
                            $resume->skills[0]->name => implode(', ', $resume->skills[0]->keywords),
                            $resume->skills[1]->name => implode(', ', $resume->skills[1]->keywords),
                            $resume->skills[2]->name => implode(', ', $resume->skills[2]->keywords)
                        ]])
                        @endcomponent
                    </div>
                </div>

                <br><br>

                <div class="section-holder texture">
                    @include('cv.decorated-box')
                    @include('cv.component-title-start', ['title' => 'education', 'icon' => 'ion-ios-lightbulb-outline'])
                    <div class="time-line">
                        <div class="row">
                        @component('cv.component-education', [
                                'startDate' => substr($resume->education[0]->startDate, 0, 4),
                                'endDate' => substr($resume->education[0]->endDate, 0, 4),
                                'title' =>  $resume->education[0]->institution,
                                'institute' => $resume->education[0]->area,
                                'description' => implode(', ', $resume->education[0]->courses),
                            ])
                        @endcomponent

                        @component('cv.component-education', [
                            'startDate' => substr($resume->education[1]->startDate, 0, 4),
                            'endDate' => substr($resume->education[1]->endDate, 0, 4),
                            'title' => $resume->education[1]->institution,
                            'institute' => $resume->education[1]->area,
                            'description' => implode(', ', $resume->education[1]->courses),
                        ])
                        @endcomponent
                        </div>
                    </div>
            </div>
            </div>

            <div class="col-sm-8">
                <div class="section-holder">
                    @include('cv.component-title-start', ['title' => 'work experience', 'icon' => 'ion-ios-briefcase-outline'])

                    <div class="time-line">
                        <div class="row">

                            {{-- True Compliance 2020 --}}
                            {{-- Freelancer 2019--}}
                            {{-- Skin Analytics --}}
                            {{-- Freelancer 2018 --}}
                            {{-- Woooba --}}
                            {{-- iQU Group --}}
                            {{-- Project 89109 --}}

                            @foreach($resume->work as $job)
                                @if (!str_contains($job->company, 'Personal Venture'))
                                    @component('cv.component-work', [
                                        'startDate' => $job->startDate,
                                        'endDate' => $job->endDate ?? '',
                                        'company' => $job->company,
                                        'title' => $job->position,
                                        'summary' => $job->summary,
                                        'highlights' => $job->highlights,
                                        ])
                                    @endcomponent
                                @endif
                            @endforeach

                        </div>
                    </div>

                    <br>

                    @include('cv.component-title-start', ['title' => 'personal ventures', 'icon' => 'ion-ios-briefcase-outline'])

                    <div class="time-line">
                        <div class="row">

                            {{-- Hidden Hash --}}
                            {{-- Saya Studio --}}
                            @foreach($resume->work as $job)
                                @if (str_contains($job->company, 'Personal Venture'))
                                    @component('cv.component-work', [
                                        'startDate' => $job->startDate,
                                        'endDate' => $job->endDate ?? '',
                                        'company' => $job->company,
                                        'title' => $job->position,
                                        'summary' => $job->summary,
                                        'highlights' => $job->highlights,
                                        ])
                                    @endcomponent
                                @endif
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
