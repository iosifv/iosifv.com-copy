@extends('layouts.user')

@section('html', 'class="skrollr skrollr-desktop wf-inactive"')
@section('title', 'Home')

@section('head')
    <!-- This should contain only stuff needed by the welcome page -->

@endsection

@section('content')

    <!--
    =============================================
        Theme Main Banner Three
    ==============================================
    -->
    <style>
        @media (max-width: 767px) {
            #theme-banner-three .main-title {
                font-size: 40px;
            }
        }
    </style>
    <div id="theme-banner-three" style="font-size: calc(80%);">
        <div class="container">
            <div class="main-wrapper">
                <h1 class="main-title wow fadeInUp animated" data-wow-delay="0.2s">
                    <span class="cd-headline clip">
                        <span>Hey! I'm Iosif, </span>
                        <br>
                        <span class="cd-words-wrapper">
                            <b class="is-visible">a Creative Thinker<i>.</i></b>
                            <b>a Solution Creator<i>.</i></b>
                            <b>a Change Maker<i>.</i></b>
                        </span>
                    </span>
                </h1>
            </div> <!-- /.main-wrapper -->
        </div> <!-- /.container -->
    </div> <!-- /#theme-banner-one -->


    <!--
    =============================================
        About Me
    ==============================================
    -->
    <div class="about-me-portfo section-portfo">
        <div class="container">
            <div class="inner-content">
                <h2 class="theme-title-two">About me<span>.</span></h2>
                <div class="img-box hide-pr">
                    <img src="/assets/images/profile/smile-profile-crop.jpg" alt="">
                </div>
                <div class="profile-tab">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs hide-pr">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#myself">Myself.</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#education">Education.</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#skill">Skill.</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="myself" class="tab-pane active">
                            <p>Hello! I’m <span>Iosif V.</span> a romanian expat living in <span>London</span>.</p>
                            <p>I'm a <span>self-development</span> junkie and I try my best to use what I learn.</p>
                            <p>
                                I started my professional life working as a <span>photographer</span>.
                                After a few years of delivering great memories
                                I switched back to <span>Software Engineering</span>, which I studied in school.
                            </p>
                        </div>
                        <div id="education" class="tab-pane fade">
                            <p>
                                <span>Computer Science</span>
                                @ Technical University of Cluj-Napoca, class of 2009
                            </p>
                            <p>
                                <span>Management and Business</span>
                                @ Technical University of Cluj-Napoca, class of 2012
                            </p>
                        </div>
                        <div id="skill" class="tab-pane fade">
                            <p></p>
                            <ul class="skill-list">
                                <li>Entrepreneurship. _<span>Always had a small side-hustle besides my job.</span></li>
                                <li>Software Engineer. _<span>Designed complete software solutions.</span></li>
                                <li>Photography. _<span>Personal or professional, my images are high quality.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <ul class="button-group">
                        <li><a href="{{ route('cv.main') }}" class="download-button">Check my CV.</a></li>
                    </ul>
                </div> <!-- /.profile-tab -->
            </div> <!-- /.inner-content -->
        </div>
    </div> <!-- /.about-me-portfo -->




    <!--
    =============================================
        Our Service
    ==============================================
    -->
    <div class="section-portfo our-service-portfo" style="margin-bottom: 0;">
{{--        <div class="section-num hide-pr"><span>0</span><span>2</span></div>--}}
        <div class="container">
            <div class="title-wrapper">
                <h2 class="theme-title-two">Projects<span>.</span></h2>
                <p>These are personal projects I care about, either happiness focused or money focused </p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="service-block" data-aos="flip-right">
                        <img src="images/icon/icon18.svg" alt="" class="icon">
                        <h5 class="title"><a href="{{ route('photos.index') }}">Photography.</a></h5>
                        <p>
                            Either a new snap taken with my phone or a throwback photo taken years ago,
                            this is were I keep my images that I love the most.
                        </p>
                        <a href="{{ route('photos.index') }}" class="read-more"><i class="flaticon-next"></i></a>
                    </div> <!-- /.service-block -->
                </div> <!-- /.col- -->
                <div class="col-lg-6">
                    <div class="service-block" data-aos="flip-right">
                        <img src="images/icon/icon19.svg" alt="" class="icon">
                        <h5 class="title"><a href="{{ route('quotes.index') }}">Favourite Quotes.</a></h5>
                        <p>
                            When consuming a lot of information, it's known that you forget 90%, so why not write it
                            down? Keeping quotes and trying to live by them is an easy life hack that I recommend.
                        </p>
                        <a href="{{ route('quotes.index') }}" class="read-more"><i class="flaticon-next"></i></a>
                    </div> <!-- /.service-block -->
                </div> <!-- /.col- -->
                <div class="col-lg-6">
                    <div class="service-block" data-aos="flip-right">
                        <img src="images/icon/icon20.svg" alt="" class="icon">
                        <h5 class="title"><a>Cryptocurrency mining farm.</a></h5>
                        <p>
                            Family business dealing with mining crypto-currencies using GPU's.
                            Our farm consists of 90 graphic cards.
                        </p>
{{--                        <a href="#" class="read-more"><i class="flaticon-next"></i></a>--}}
                    </div> <!-- /.service-block -->
                </div> <!-- /.col- -->
                <div class="col-lg-6">
                    <div class="service-block" data-aos="flip-right">
                        <img src="images/icon/icon21.svg" alt="" class="icon">
                        <h5 class="title"><a>Cryptocurrency mining delegate.</a></h5>
                        <p>
                            Together with a partner we are managing a delegate server node for a DPoS
                            (Delegated Proof of Stake) coin.
                        </p>
{{--                        <a href="#" class="read-more"><i class="flaticon-next"></i></a>--}}
                    </div> <!-- /.service-block -->
                </div> <!-- /.col- -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.our-service-portfo -->


    <!--
    =============================================
        Our Project
    ==============================================
    -->
    {{--    <div class="section-portfo our-project-portfo">--}}
    {{--        <div class="section-num hide-pr"><span>0</span><span>4</span></div>--}}
    {{--        <div class="container">--}}
    {{--            <h2 class="theme-title-two">Projects<span>.</span></h2>--}}

    {{--            <ul class="isotop-menu-wrapper hide-pr">--}}
    {{--                <li class="is-checked" data-filter="*">Design.</li>--}}
    {{--                <li data-filter=".development">Development.</li>--}}
    {{--                <li data-filter=".marketing">Marketing.</li>--}}
    {{--                <li data-filter=".photoshop">Photoshop.</li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--        <div class="text-content">--}}
    {{--            <div class="container">--}}
    {{--                <p>Die CI Farben von Millhaus sind schwarz . Nett aber auch herausfoernd. Anfangs probierten, uns abert z.</p>--}}
    {{--            </div>--}}
    {{--            <a href="project-full-width.html" class="gallery-button" data-aos="fade-left" data-aos-duration="2000">View Gallery</a>--}}
    {{--        </div>--}}

    {{--        <div id="isotop-gallery-wrapper">--}}
    {{--            <div class="grid-sizer"></div>--}}
    {{--            <div class="isotop-item marketing">--}}
    {{--                <div class="effect-zoe">--}}
    {{--                    <img src="images/portfolio/5.jpg" alt="">--}}
    {{--                    <div class="inner-caption">--}}
    {{--                        <h2><a href="#">Rogan <span>Chee</span></a></h2>--}}
    {{--                        <p class="icon-links">--}}
    {{--                            <a href="images/portfolio/5.jpg" class="icon zoom fancybox" data-fancybox="images"><i class="fa fa-eye" aria-hidden="true"></i></a>--}}
    {{--                            <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>--}}
    {{--                        </p>--}}
    {{--                        <p class="description">Rogan never had the patience of her sisters. She deliberately punched the bear in his face.</p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div> <!-- /.isotop-item -->--}}
    {{--            <div class="isotop-item development">--}}
    {{--                <div class="effect-zoe">--}}
    {{--                    <img src="images/portfolio/6.jpg" alt="">--}}
    {{--                    <div class="inner-caption">--}}
    {{--                        <h2><a href="#">Rogan <span>Chee</span></a></h2>--}}
    {{--                        <p class="icon-links">--}}
    {{--                            <a href="images/portfolio/6.jpg" class="icon zoom fancybox" data-fancybox="images"><i class="fa fa-eye" aria-hidden="true"></i></a>--}}
    {{--                            <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>--}}
    {{--                        </p>--}}
    {{--                        <p class="description">Rogan never had the patience of her sisters. She deliberately punched the bear in his face.</p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div> <!-- /.isotop-item -->--}}
    {{--        </div>--}}
    {{--    </div> <!-- /.our-project-portfo -->--}}




    <!--
    =====================================================
        Testimonial
    =====================================================
    -->
    {{--    <div class="portfo-testimonial section-portfo">--}}
    {{--        <div class="section-num hide-pr"><span>0</span><span>5</span></div>--}}
    {{--        <div class="container clearfix">--}}
    {{--            <h2 class="theme-title-two">Testimonials<span>.</span></h2>--}}


    {{--            <div class="row">--}}
    {{--                <div class="col-lg-4">--}}
    {{--                    <h2 class="inner-title">What’s <br> Our Client Say About Us.</h2>--}}
    {{--                </div>--}}

    {{--                <div class="col-lg-8">--}}
    {{--                    <div class="slider-wrapper">--}}
    {{--                        <div class="agn-testimonial-slider">--}}
    {{--                            <div class="item">--}}
    {{--                                <p>Having a home based business is a wonderful asset to your life. The problem still stands, when it comes timeadvertise your business for a cheap cost. I know you have looked for to answer everywhere.</p>--}}
    {{--                                <div class="author-info clearfix">--}}
    {{--                                    <img src="images/home/2.jpg" alt="" class="author-img">--}}
    {{--                                    <div class="name-info">--}}
    {{--                                        <h6 class="name">Rashed kabir</h6>--}}
    {{--                                        <span>Designer</span>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="item">--}}
    {{--                                <p>Having a home based business is a wonderful asset to your life. The problem still stands, when it comes timeadvertise your business for a cheap cost. I know you have looked for to answer everywhere.</p>--}}
    {{--                                <div class="author-info clearfix">--}}
    {{--                                    <img src="images/home/3.jpg" alt="" class="author-img">--}}
    {{--                                    <div class="name-info">--}}
    {{--                                        <h6 class="name">Zubayer hasan</h6>--}}
    {{--                                        <span>Developer</span>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div> <!-- /.agn-testimonial-slider -->--}}
    {{--                    </div> <!-- /.slider-wrapper -->--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div> <!-- /.container -->--}}
    {{--    </div> <!-- /.portfo-testimonial -->--}}




    <!--
    =====================================================
        Footer
    =====================================================
    -->
    <footer class="portfo-footer hide-pr">
        <img src="images/shape/shape-7.svg" alt="" class="round-shape">
        <div class="container">
            <div class="theme-title-one text-center hide-pr">
                <div class="upper-title">Contact Me</div>
                <h2 class="main-title">
                    Send me a message,<br>
                    I will be in touch with you shortly.
                </h2>
            </div> <!-- /.theme-title-one -->

            <style>
                .social-icon li {
                    display: inline-block;
                }

                .social-icon li a {
                    width: 45px;
                    height: 45px;
                    background: rgba(255, 255, 255, 0.05);
                    border-radius: 50%;
                    line-height: 45px;
                    color: rgba(255, 255, 255, 0.2);
                    font-size: 22px;
                    display: block;
                    margin: 0 6px;

                }

                .social-icon li a:hover {
                    background: #e1a34c;
                    color: #fff !important;
                    text-decoration-color: #0b2e13;
                }

                p {
                    font-size: 20px;
                    color: rgba(255, 255, 255, 0.6);
                    padding-top: 45px;
                }
            </style>

            <div class="row contact-address-two" style="padding: 0;">

                <div class="col-lg-3">
                    <div class="address-block">
                        <div class="icon-box" style="color:slategray;">
                            <i class="fa fa-envelope fa-4x" aria-hidden="true"></i>
                        </div>
                        <style>
                            #hide::before {
                                content: 'hi';
                            }

                            #hide::after {
                                content: ".com\A";
                            }

                            #where::before {
                                content: "@";
                            }

                            #where::after {
                                content: "iosifv";
                            }
                        </style>
                        <h5>Email</h5>
                        <a class="button" href="mailto:spamATiosifvDOTcom"
                           onclick="this.href = this.href
                                    .replace(/AT/,'&#64;')
                                    .replace(/DOT/,'&#46;')
                                    .replace(/spam/,'hi')">

                            <p id="hide"><span id="where"></span></p>
                        </a>
                    </div> <!-- /.address-block -->
                </div> <!-- /.col- -->

                <div class="col-lg-3">
                    <div class="address-block">
                        <div class="icon-box" style="color:slategray;">
                            <i class="fa fa-phone fa-4x" aria-hidden="true"></i>
                        </div>
                        <h5>Phone & IM</h5>
                        <p>+44 759 713 7739</p>

                        <ul class="social-icon" style="border-width: 2px">
                            @include('layouts.components.homepage-icon', ['name' => 'contact.whatsapp'])
                            @include('layouts.components.homepage-icon', ['name' => 'contact.phone'])
                            <li>
                                <a href="{{ config('blade.links.contact.vcf.url') }}" target="_blank">
                                    <i class="{{ config('blade.links.contact.vcf.icon') }}" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>

                    </div> <!-- /.address-block -->
                </div> <!-- /.col- -->

                <div class="col-lg-3">
                    <div class="address-block">
                        <div class="icon-box" style="color:slategray;">
                            <i class="fa fa-comment fa-4x" aria-hidden="true"></i>
                        </div>
                        <h5>Social</h5>
                        <p>@iosifvee</p>

                        <ul class="social-icon" style="border-width: 2px">
                            @include('layouts.components.homepage-icon', ['name' => 'social.instagram'])
                            @include('layouts.components.homepage-icon', ['name' => 'social.facebook'])
                            {{-- @include('layouts.components.homepage-icon', ['name' => 'contact.messenger'])--}}
                        </ul>

                    </div> <!-- /.address-block -->
                </div> <!-- /.col- -->

                <div class="col-lg-3">
                    <div class="address-block">
                        <div class="icon-box" style="color:slategray;">
                            <i class="fa fa-code fa-4x" aria-hidden="true"></i>
                        </div>
                        <h5>Professional</h5>
                        <p>@iosifv</p>

                        <ul class="social-icon" style="border-width: 2px">
                            @include('layouts.components.homepage-icon', ['name' => 'social.linkedin'])
                            @include('layouts.components.homepage-icon', ['name' => 'development.github'])
                            @include('layouts.components.homepage-icon', ['name' => 'development.stackoverflow'])
                        </ul>

                    </div> <!-- /.address-block -->
                </div> <!-- /.col- -->


                <div class="col-lg-4">

                </div> <!-- /.col- -->
                <div class="col-lg-4">
                    <div class="address-block">

                        <br><br>

                        <p>
                            <a href="{{ config('blade.links.contact.vcf.url') }}" target="_blank">
                                Or download all my contact info<br>to your phone<br>
                                <i class="{{ config('blade.links.contact.vcf.icon') }}" aria-hidden="true"></i>
                            </a>
                        </p>

                    </div> <!-- /.address-block -->
                </div> <!-- /.col- -->

            </div>

        </div> <!-- /.row -->


        <hr>
        <div class="copyright-text">
            <p>
                Made in London 🇬🇧 with
                ♡.<br> {{-- There is a hidden UK character in here that the IDE does not show --}}
                Steal my sourcecode here
                <a href="https://github.com/iosifv" class="social-icon" ><i class="fa fa-github" aria-hidden="true"></i></a>.
            </p>
            <p>&copy; Iosif V.</p>
        </div> <!-- /.copyright-text -->
        {{--        </div>--}}
    </footer> <!-- /.portfo-footer -->


    <!-- Scroll Top Button -->
    <button class="scroll-top tran3s" style="width:50px; height: 50px;">
        <i class="fa fa-angle-up fa-2x" aria-hidden="true"></i>
    </button>


@endsection

@section('after-body')
{{--    <div class="partical-bg">--}}
{{--        <div id="particles"></div>--}}
{{--    </div>--}}
    <!-- Partical js -->
{{--    <script src="vendor/particles.min.js"></script>--}}
@endsection
