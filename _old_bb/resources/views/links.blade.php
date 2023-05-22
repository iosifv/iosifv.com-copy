@extends('layouts.user')

@section('html', 'class="skrollr skrollr-desktop wf-inactive"')
@section('title', 'Links')

@section('head')
    <!-- This should contain only stuff needed by the welcome page -->
@endsection

@section('content')

    <style>
        .inner-content {
            padding-left: 50px!important;]
        }
        .social-icon {
            text-align: left;
        }
        .social-icon li {
            display: inline-block;
        }
        .social-icon .dirty-center {
            margin-left: 12px;
        }
        .social-icon li a {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            line-height: 45px;
            color: rgba(255, 255, 255, 0.2);
            font-size: 22px;
            display: inline-block;
            /*margin: 0 6px;*/

        }
        .social-icon li a:hover {
            background: #e1a34c;
            color: #fff !important;
            text-decoration-color: #0b2e13;
        }
        p {
            font-size: 20px;
            color: rgba(255, 255, 255, 0.6);
            padding-bottom: 5px;
            display: inline-block;
        }
    </style>

    <!--
    =============================================
        Links
    ==============================================
    -->
    <div class="about-me-portfo contact-address-two">
        <div class="container">
            <div class="inner-content">
                <h2 class="theme-title-two" style="margin-top: -150px;">
                    Links<span>.</span>
                </h2>
                <div class="img-box hide-pr">
                    <img src="/assets/images/logo/favicon-70x70.png" alt="" hidden>
                </div>
                <div class="profile-tab" >
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs hide-pr">

                        @foreach( array_keys(config('blade.links')) as $category)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#{{ $category }}">{{ ucfirst($category) }}.</a>
                            </li>
                        @endforeach

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        @foreach( config('blade.links') as $category => $buttons)
                            <div id="{{ $category }}" class="tab-pane">
                                <ul class="social-icon" style="border-width: 2px">
                                    @foreach( $buttons as $button => $info )
                                        @include('layouts.components.links-button', ['path' => $category. '.' . $button]) <br>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach


                    </div>

                </div> <!-- /.profile-tab -->
            </div> <!-- /.inner-content -->
        </div>
    </div> <!-- /.about-me-portfo -->

@endsection

@section('after-body')
    {{--    <div class="partical-bg">--}}
    {{--        <div id="particles"></div>--}}
    {{--    </div>--}}
    <!-- Partical js -->
    {{--    <script src="vendor/particles.min.js"></script>--}}
@endsection
