@extends('layouts.base')

@section('html', 'class="skrollr skrollr-desktop wf-inactive"')
@section('title', 'Home')

@section('head')
    <!-- Scripts -->
    <script src="{{ mix('/js/welcome-vendor.js') }}" type="text/javascript"></script>
    <script src="{{ mix('/js/welcome-app.js') }}" type="text/javascript"></script>

    <!-- css -->
    <link href="{{ mix('/css/welcome-style.css') }}" rel="stylesheet">
    <link href="{{ mix('/vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">
@endsection

@section('body')
<div class="sticky-title-container mobile-hide fixed full-height t0 l0 bg-black z-index-1 transition-all" style="width: 60px;">

    <div class="sticky-hamburger">
        <div class="slice">&nbsp;</div>
        <div class="slice">&nbsp;</div>
        <div class="slice">&nbsp;</div>
    </div>

    <div class="sticky-title sticky-title-left l0 skrollable skrollable-between"
         data-0="left: 140px;"
         data-100p="left: -10px;"
         data-200p="left: -70px;"
         data-300p="left: -130px;"
         data-400p="left: -190px;"
         style="left: -280px;">
        <a class="title white no-decoration" href="/#about">About me</a>
        <a class="title white no-decoration" href="/#legacy">Legacy</a>
        <a class="title white no-decoration" href="/#wisdom">Wisdom</a>
        <a class="title white no-decoration" href="/#light">Light</a>
        <a class="title white no-decoration" href="/#contact">Contact</a>
    </div>
</div>

<article class="slide-container full-height">

    {{-- About --}}
    <section id="about" class="slide mobile-table full-height">
        <div class="mobile-table-cell">
            <div class="col-center col-2 center">
                {{-- Todo: align center --}}
                <img src="/assets/images/logo/logo-960x960-no_text.png"  style="max-width: 240px; ">
            </div>
            <div class="col-center col-5" style="padding-top: 5em;">
                <div class="pl1 pr1">
                    <div class="big-type light no-margin">
                        <span class="nowrap">Hey!</span>
                        <span class="nowrap">My name is</span>
                        <span class="nowrap"><strong>Iosif V.</strong></span>
                        <span class="nowrap">and I'm a</span>
                    </div>
                </div>
            </div>
            <div class="col-center col-5"  style="padding-bottom:12em;">
                <div class="pl1 pr1">
                    <div class="big-type light no-margin">
                        <span class="scroll-content">
                            <div class="scroll-content__container">
                                <ul class="scroll-content__container__list">
                                    <li class="scroll-content__container__list__item nowrap">Creative Thinker</li>
                                    <li class="scroll-content__container__list__item nowrap">Solution Creator</li>
                                    <li class="scroll-content__container__list__item nowrap">Change Maker</li>
                                    <li class="scroll-content__container__list__item nowrap">Team Invigorator</li>
                                </ul>
                            </div>
                        </span>
                    </div>
                    {{--Mouse Scroll--}}
                    <div class="scroll-downs">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    {{-- Legacy --}}
    <section id="legacy" class="slide mobile-table full-height">
        <div class="mobile-table-cell">
            <div class="col-center col-6">
                <div class="pl2 pr2">
                    <p class="medium-type light pt2">
                        <span class="nowrap">Happy expat in London.</span>
                        <br>
                        <span>I'm a self-development junkie and I try my best to use what I learn.</span>
                    </p>
                    <hr>
                    <p class="light py1">
                        This is how I <a class="button" href="https://www.youtube.com/watch?v=PIJElPStJpg"><strong>hustle</strong>&trade;</a>:
                    </p>
                    <div class="container">
                        <div class="mobile-table-cell center">
                            <span class="nowrap">
                                <a class="button hustle-icon block" href="/cv" target="_blank">
                                    <i class="fas fa-code fa-4x"></i>
                                    <p class="hustle-text">Web developer<br>[my C.V.]</p>
                                </a>
                                <!-- <a class="button hustle-icon block" href="http://casa4.co.uk/" target="_blank">
                                    <i class="fas fa-home fa-4x"></i>
                                    <p class="hustle-text">Real Estate<br>[Casa4 Ltd.]</p>
                                </a> -->
                                <a class="button hustle-icon block" href="http://www.hiddenhash.com/" target="_blank">
                                    <i class="fas fa-server fa-4x"></i>
                                    <p class="hustle-text">Cryptocurrency Mining<br>[Hidden Hash]</p>
                                </a>
                                <a class="button hustle-icon block" href="https://explorer.persona.im/#/wallets/PWB63HSSusT54BzvPJ4MKT35D3nBuJSPJB" target="_blank">
                                    <i class="far fa-chart-bar fa-4x"></i>
                                    <p class="hustle-text">Cryptocurrency Delegate<br>[Persona coin (PRSN)]</p>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Wisdom --}}
    <section id="wisdom" class="slide mobile-table bg-white full-height">
        <div class="mobile-table-cell">
            <div class="col-center col-6">
                <div class="pl2 pr2">
                    <p class="small-type light black">
                        When consuming a lot of information, it's known that you forget 90%, so why not write it down?
                        Keeping quotes and trying to live by them is an easy life hack that I recommend.
                    </p>
                    <p class="big-type light black">
                        I save my favourite quotes here:
                    </p>
                    <p class="medium-type light black">
                        <span class="white">[</span>
                        <a href="{{ route('quotes.index') }}" class="button">iosifv.com/quotes</a>
                        <span class="white">]</span>
                        <!-- <a href="#" class="button coming-soon">[Coming soon]</a> -->
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Light --}}
    <section id="light" class="slide mobile-table full-height">
        <div class="mobile-table-cell">
            <div class="col-center col-6">

                <div class="pl1 pr1">
                    <p class="medium-type light">
                        Used to work as a professional photographer,<br>
                        Now I mostly take pictures as a hobby
                    </p>

                    <div class="container">
                        <div class="mobile-table-cell center">
                            <span class="nowrap">
                                <a class="button photo-icon block" href="/photos?search=phoneography" target="_blank">
                                    <i class="fas fa-camera fa-4x"></i>
                                    <p class="photo-text">Phoneography</p>
                                </a>
                                <a class="button photo-icon block" href="/photos?search=eye-candy" target="_blank">
                                    <i class="fas fa-camera fa-4x"></i>
                                    <p class="photo-text">Eye Candy</p>
                                </a>
                            </span>
                            <!-- <span class="nowrap">
                                <a class="button photo-icon block coming-soon" href="#" target="_blank" disabled="">
                                    <i class="fas fa-camera fa-4x"></i>
                                    <p class="photo-text">Wallpapers<br>[Coming soon]</p>
                                </a>
                            </span> -->
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="slide mobile-table full-height">
        <div class="mobile-table-cell center">

            <div>
                <a class="button" href="https://www.facebook.com/iosifvee/" target="_blank">
                    <i class="fab fa-facebook-f fa-2x"></i>
                </a>
                <a class="button" href="https://www.instagram.com/iosifvee/" target="_blank">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a class="button" href="https://twitter.com/iosifvee/" target="_blank">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a class="button" href="https://www.snapchat.com/add/iosifvee/" target="_blank">
                    <i class="fab fa-snapchat fa-2x"></i>
                </a>
                <p>@iosifvee</p>
            </div>

            <hr>
            <br>
            <div>
                <a class="button type" href="tel:+44 759 713 7739">
                    <i class="fas fa-phone fa-2x"></i>
                    <p>+44 759 713 7739</p>
                </a>
            </div>
            <br>
            <div>
                <a class="button" href="mailto:spamATiosifvDOTcom"
                        onclick = "this.href = this.href
                        .replace(/AT/,'&#64;')
                        .replace(/DOT/,'&#46;')
                        .replace(/spam/,'hi')">
                    <i class="icon-email size-2x"></i>
                    <p id="hide"><span id="where"></span></p>
                </a>
            </div>
            <br>
            <hr>
            <br>
            <div>
                <p class="small-type light white">
                    Or save the contact in your phone
                </p>

                <a class="button type" href="{{ mix('assets/iosifv.vcf') }}">
                    <i class="fas fa-user-circle fa-2x"></i>
                </a>
            </div>
        </div>
    </section>

</article>

<!-- Analytics -->
{{-- ToDo: make sure this works;--}}
@include('components.analytics')

@endsection
