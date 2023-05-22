@extends('layouts.base')

@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSS -->
    <link href="{{ mix('/css/cv-style.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/vendor-bootstrap-v3.3.min.css') }}" rel="stylesheet">
    <link href="{{ mix('vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
@endsection

@section('after-body')
    <!-- js -->
@endsection

@section('body')
<section id="home" class="header" style="background-image: url('/assets/images/cv/cover.jpg')">
    <div class="sector">
        <div class="box">
            <h1> IV </h1>
        </div>
            <h1 class="main-title"> Iosif Vigh </h1>

        <h4 class="tagline"> Web developer | Creative thinker | Solution creator | Change maker </h4>
    </div>
</section>
<?php
$size = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]) ? 'sm' : 'xs';
?>
<section id="about">

    <div class="container">
        <div class="row">
            <div class="col-{{$size}}-4 col-{{$size}}-push-8">
                <div class="section-holder texture">
                   <p>
                       * These instructions follow Google Chrome browser, but the steps are almost similar for Microsoft Edge or Firefox
                   </p>
                </div>
            </div>

            <div class="col-{{$size}}-8 col-{{$size}}-pull-4">
                <div class="section-holder">
                    @include('cv.component-title-start', ['title' => 'Print or save', 'icon' => 'ion-ios-printer-outline'])

                    <br> <br>
                    <h4>Access the link containing the CV.</h4>
                    <ul>
                        <li>
                            To hide my contact details, open <a href="/cv/hide">iosifv.com/cv/hide</a>
                            (<strong>for recruiters</strong>)
                        </li>
                        <li>If not, just go the the normal version <a href="/cv">iosifv.com/cv</a></li>
                    </ul>

                    <br> <br>

                    <h4>a) Save as PDF</h4>
                    <ul>
                        <li>Go to File > Print...</li>
                        <li>From the printer selection, choose <strong>Save as PDF</strong></li>
                        <li>Under the Advanced Tab <strong>un-check Headers and Footers</strong></li>
                    </ul>

                    <br> <br>

                    <h4>b) Just Print</h4>
                    <ul>
                        <li>Go to File > Print...</li>
                        <li>Under the Advanced Tab <strong>un-check Headers and Footers</strong></li>
                    </ul>

                    <br> <br>

                    <img style="margin:25px;" src="/assets/images/cv/print-chrome.png" size="50%">
                    <img style="margin:25px;" src="/assets/images/cv/print-edge.png">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
