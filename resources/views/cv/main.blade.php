@extends('layouts.base')

@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSS -->
    <link href="{{ mix('/css/cv-style.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/vendor-bootstrap-v3.3.min.css') }}" rel="stylesheet">
    <link href="{{ mix('vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/vendor-animate.css') }}" rel="stylesheet">

    <link href="{{ mix('/vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

@endsection

@section('after-body')
    <!-- js -->
    <script src="/js/cv-vendor-jquery.js" type="text/javascript"></script>
    <script src="/js/cv-vendor-jq-lettering.js" type="text/javascript"></script>
    <script src="/js/cv-vendor-jq-textillate.js" type="text/javascript"></script>
    <script src="/js/cv-vendor-smoothscroll.js" type="text/javascript"></script>
    <script src="/js/cv-app.js" type="text/javascript"></script>
    @include('components.analytics')
@endsection

@section('body')
<section id="home" class="header" style="background-image: url('/assets/images/cv/cover.jpg')">
    <div class="sector">
        <div class="box">
            <img src="/assets/images/logo/favicon-96x96.png" style="height: 64px; width: 64px;">
        </div>
        @if (!$hide)
            <h1 class="main-title"> Iosif V </h1>
        @endif
        <h4 class="tagline"> Web developer | Creative thinker | Solution creator | Change maker </h4>
    </div>
</section>
<?php
$size =
    preg_match(
        "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|" .
        "palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
        $_SERVER["HTTP_USER_AGENT"]
    ) ? 'sm' : 'xs';
?>
<section id="about">

    @include('cv.component-title-end', ['title' => 'about'])

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

                        {{-- ToDo: change this table to divs --}}
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
                                    London
                                </td>
                            </tr>
                        </table>


                        <br>

                        <div class="social-links">
                            <h4>Social</h4>
                            <p  style="padding-left:1.5em">
                                <a target="_blank" href="https://www.linkedin.com/in/iosifv">
                                    <i class="fab fa-linkedin fa-2x"></i>
                                </a>
                                <a target="_blank" href="https://www.facebook.com/iosifvee/">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </a>
                                <a target="_blank" href="https://www.instagram.com/iosifvee/">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>
                                <a target="_blank" href="https://www.chess.com/stats/daily/chess/iosifv">
                                    <i class="fas fa-chess fa-2x"></i>
                                </a>
                            </p>
                        </div>

                        <br>

                        <div class="social-links">
                            <h4>Dev</h4>
                            <p  style="padding-left:1.5em">
                                <a target="_blank" href="https://github.com/iosifv">
                                    <i class="fab fa-github fa-2x"></i>
                                </a>
                                <a target="_blank" href="https://stackoverflow.com/users/3219816/iosifv">
                                    <i class="fab fa-stack-overflow fa-2x"></i>
                                </a>
                                <!-- <a target="_blank" href="https://laracasts.com/@vighiosif">
                                    <i class="fab fa-laravel fa-2x"></i>
                                </a>
                                <a target="_blank" href="https://www.codecademy.com/iosifv">
                                    <i class="fas fa-code fa-2x"></i>
                                </a> -->
                                <!-- <a target="_blank"
                                   href="https://www.codingame.com/profile/cb4232fc92bec1e6aac10e484ff651a1924753">
                                    <i class="fas fa-file-code fa-2x"></i>
                                </a> -->
                            </p>
                        </div>

                        <hr>
                        <div class="social-links">
                            <a target="_blank" href="/cv/print">
                                <i class="ion-ios-printer-outline fa-2x"></i>
                                Printing options
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
                    <h4>Objective</h4>
                    <ul>
                        <li> Combine hard work with vertically increasing my knowledge within the software engineering world.</li>
                    </ul>

                    <h4>The perfect boss</h4>
                    <ul>
                        <li>You are proud of your
                            <a class="link-text" target="_blank"
                               href="https://www.joelonsoftware.com/2000/08/09/the-joel-test-12-steps-to-better-code/">
                                Joel Test
                            </a> score
                        </li>
                        <li>You are interested in growing loyal partners</li>
                        <li>You have an office in UK, London area</li>
                    </ul>

                    <h4> Links don’t lie </h4>
                    <ul>
                        <li>To get to know me better check out my social and professional online presence.</li>
                    </ul>

                    <h4> Languages </h4>
                    <ul>
                        <li>Romanian</li>
                        <li>English</li>
                        <li>Hungarian</li>
                    </ul>

                    <h4> Personality </h4>
                    <ul>
                        <li>High moral fiber</li>
                        <li>Always willing to learn new things</li>
                        <li>The right man with a contingency plan for every critical situation</li>
                    </ul>

                    <h4> Other </h4>
                    <ul>
                        <li>Romanian nationality</li>
                        <li>Drivers license categories A, B</li>
                        <li>Hobbies: Chess, HiFi Music, Photography</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>


<section id="experience-testimonials">

    @include('cv.component-title-end', ['title' => 'experience'])

    <div class="container">
        <div class="row">

            <div class="col-sm-4">
                <div class="section-holder texture">

                    @include('cv.decorated-box')

                    @include('cv.component-title-start', ['title' => 'skills', 'icon' => 'ion-ios-cog-outline'])

                    <div class="testi-holder owl-carousel owl-theme">

                    @component('cv.component-skill', [
                        'title' => 'Software Engineering',
                        'skills' => [
                            'Coding' => 'OOP, Design Patterns, SOLID, readable code, logging',
                            'API' => 'Designed and implemented RESTful APIs; Postman is my friend',
                            'Dev-Ops' => 'Personal & some limited professional experience',
                            'Bash' => 'Not afraid of leaving the mouse untouched & rely on my friendly aliases',
                        ]])
                        @endcomponent

                        @component('cv.component-skill', [
                        'title' => 'Programming Languages',
                        'skills' => [
                            'Node.JS' => 'Express, Loopback, Typescrypt',
                            'PHP' => 'Laravel 5.6, PSR standards, 5.6, 7.2',
                            'SQL/noSQL' => 'Designed and implemented complete databases',
                            'Frontend' => 'Bugfixing experience with Angular, Bootstrap, MaterializeCSS',
                        ]])
                        @endcomponent

                        @component('cv.component-skill', [
                        'title' => 'Relevant Software',
                        'skills' => [
                            'Productivity' => 'Jira, Confluence, Bamboo, LucidChart',
                            'Subversioning' => 'Thorough understanding of Git',
                            'Virtualization' => 'Docker, VirtualBox, Homestead',
                            'Other' => 'Adobe Suite (Photoshop, Lightroom, Illustrator, InDesign)',
                        ]])
                        @endcomponent

                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="section-holder">
                    @include('cv.component-title-start', ['title' => 'work experience', 'icon' => 'ion-ios-briefcase-outline'])

                    <div class="time-line">
                        <div class="row">

                            {{-- Skin Analytics --}}
                            @component('cv.component-work', [
                                'time' => '11.2018-present',
                                'company' => 'Skin Analytics',
                                'title' => 'Software Engineer',
                                'details' => [
                                    'website' => 'www.skin-analytics.com',
                                    'activity' => 'Catch skin diseases early by using a phone and AI',
                                    'responsibilities' => 'Developing & maintaining current applications.
                                            Deploy code on staging and production environments',
                                    'achievements' => 'Learned coding with NodeJS.
                                            Created a couple of APIs to help a slow transition towards a microservices architecture.',
                                    'technologies' => 'NodeJS, Typescrypt, AWS, Express, Loopback'
                                ]])
                            @endcomponent

                            {{-- Freelancer --}}
                            @component('cv.component-work', [
                                'time' => '07.2018-11.2018',
                                'company' => 'Freelancer',
                                'title' => 'PHP Application Developer',
                                'details' => [
                                    'achievements' => 'For each client I worked with, I was submitting pull requests in the first day.',
                                    'technologies' => 'Laravel, Symfony, PHP 7.1, MySql, Git, PhpUnit.'
                                ]])
                            @endcomponent

                            {{-- Woooba --}}
                            @component('cv.component-work', [
                                'time' => '02.2017-06.2018',
                                'company' => 'Woooba',
                                'title' => 'PHP Application Developer / Dev-Ops',
                                'details' => [
                                    'website' => 'www.wooobalab.com',
                                    'activity' => 'Designing, developing & supporting client applications.
                                            Integration and designing APIs. Writing documentation for users.',
                                    'responsibilities' => 'Developing & maintaining nationwide educational platforms.
                                            For one of our clients we built a complete financial application.',
                                    'achievements' => 'I became efficient in working with Laravel.
                                            Managed all our DigitalOcean droplets with a continuous integration setup.',
                                    'technologies' => 'Laravel, DigitalOcean, Forge, PHP 5.6, PHP 7.1,
                                            RESTful APIs, MySql, Git, Terminal, VueJS, PhpUnit.'
                                ]])
                            @endcomponent

                            {{-- iQU Group --}}
                            @component('cv.component-work', [
                                'time' => '11.2015-11.2016',
                                'company' => 'iQU Group',
                                'title' => 'PHP Application Developer',
                                'details' => [
                                'website' => 'www.iqu.com',
                                'activity' => 'Marketing solutions for game developers.',
                                'responsibilities' => 'Create new products to use within the company.
                                        Working only with PHP, no front-end.
                                        For all the projects I am working on, I am the main developer.
                                        All back-end projects developed by iQU are APIs.
                                        Also worked on a small project in Java.',
                                'achievements' => 'Having a senior’s mentoring I created complete API’s from start to end.
                                        Learned to use Docker.
                                        Also needed to create a library which is being used by my colleagues.',
                                'technologies' => 'PHP, RESTful APIs, MySQL, Git, Docker, Terminal, PhpUnit, AngularJS.'
                                ]])
                            @endcomponent

                            {{-- Project 89109 --}}
                            @component('cv.component-work', [
                                'time' => '10.2014-11.2015',
                                'company' => 'Project 89109',
                                'title' => 'PHP Application Developer',
                                'details' => [
                                'activity' => 'Online adult dating services.',
                                'responsibilities' => 'PHP Developer, working in the team.',
                                'achievements' => 'I have broadened my general PHP knowledge.
                                        After less than two months I successfully delivered an API
                                        which connects to several other projects from within the company’s codebase
                                        having to write both sides of the call.',
                                'technologies' => 'PHP, API, MySQL, Terminal, Git, JS.'
                                ]])
                            @endcomponent

                        </div>
                    </div>

                    <br>

                    @include('cv.component-title-start', ['title' => 'personal ventures', 'icon' => 'ion-ios-briefcase-outline'])

                    <div class="time-line">
                        <div class="row">

                            {{-- Persona Delegate --}}
                            @component('cv.component-work', [
                                'time' => '04.2018-present',
                                'company' => 'Persona Cryptocurrency',
                                'title' => 'Persona Coin Delegate Node System Administrator',
                                'details' => [
                                    'coin website' => 'persona.io',
                                    'activity' => 'Together with a partner we are managing a delegate server node for a DPoS coin',
                                    'DPoS explanation' => 'http://bit.ly/2EueROf',
                                    'responsibilities' => 'To create and manage the server so that we can reliably "forge" new coins.
                                            Implemented an automatic payment system for our delegate voters.
                                            Also, some of the marketing materials were my responsibility.',
                                    'personal achievements' => 'Learned a lot about how the blockchain actually works.
                                            Managed to be actively engaged with the community.'
                                ]])
                            @endcomponent

                            {{-- Hidden Hash --}}
                            @component('cv.component-work', [
                                'time' => '11.2017-present',
                                'company' => 'Hidden Hash',
                                'title' => 'Hardware Engineer / Dev-Ops',
                                'details' => [
                                    'activity' => 'Family business dealing with mining crypto-currencies using GPU\'s.
                                            Our farm, located in Romania currently consists of 90 graphic cards.',
                                    'responsibilities' => 'Business model, Hardware setup,
                                            Software & security optimization/tweaks/updates,
                                            Mining performance fine tuning, Trading mined assets.',
                                    'achievements as a company' => 'Implemented business plan in less than 2 weeks.
                                            We created a room which is capable of pumping filtered air to
                                            cool of the mining rigs and we are en route to building a system for
                                            automated cooling using Arduino\'s. Set up monitoring and management software.',
                                    'personal achievements' => 'Learned a lot about managing a larger than usual
                                            number of computers and hardware components. Got used to second guessing
                                            the most popular opinion/solution on the internet.
                                            Built a watchdog mechanism for certain types of cards
                                            (https://github.com/iosifv/amd-vega-startup-scripts).'
                                ]])
                            @endcomponent

                            {{-- myOrder --}}
                            @component('cv.component-work', [
                                'time' => '06.2011-02.2012',
                                'company' => 'myOrder',
                                'title' => 'Salesman',
                                'details' => [
                                    'activity' => 'Providing digital menus on electronic tablets for restaurants,
                                            clubs and bars. The product created better client management,
                                            up/cross selling thus creating higher profits.',
                                    'responsibilities' => 'Business model, Marketing, Client handling.',
                                    'achievements as a company' => 'Working software version developed on Android 2.2
                                            with client-server capabilities.',
                                    'personal achievements' => 'Even though this was a failed start-up I probably
                                            learned more than any other project I had. I needed to be persistent and keep
                                            improving my presentation with every potential client which turned me down.'
                                ]])
                            @endcomponent

                            {{-- Saya Studio --}}
                            @component('cv.component-work', [
                                'time' => '05.2005-12.2014',
                                'company' => 'Saya Studio',
                                'title' => 'Photographer',
                                'details' => [
                                    'website' => 'www.saya.ro',
                                    'activity' => 'Wedding photography mainly but also: corporate, modeling, portrait,
                                            product photography and some graphic design.',
                                    'responsibilities' => 'Client handling, Marketing, Accounting, Management,
                                            Photographing, Retouching, Graphic design, Web-design.',
                                    'achievements' => 'Became one of the best known photography studios in Cluj-Napoca
                                            and Transylvania.',
                                ]])
                            @endcomponent


                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section id="skill-education">

    @include('cv.component-title-end', ['title' => 'education'])

    <div class="container">
        <div class="row">

            <div class="col-{{$size}}-6">
                <div class="section-holder">
                    @include('cv.component-title-start', ['title' => 'education', 'icon' => 'ion-ios-lightbulb-outline'])

                    <div class="time-line">
                        <div class="row">

                            @component('cv.component-education', [
                                'time' => '2010 - 2012',
                                'title' => 'Technical University of Cluj-Napoca (UTCN)',
                                'institute' => 'Masters Program in <br> Management and Business Engineering',
                                'description' => 'Covered general management theories.',
                            ])
                            @endcomponent

                            @component('cv.component-education', [
                                'time' => '2004 - 2009',
                                'title' => 'Technical University of Cluj-Napoca (UTCN)',
                                'institute' => 'Computer Science Faculty',
                                'description' => 'Covered everything from very high level prog. lang.
                                        to the workings of the x86 processor. By the extent of the curriculum,
                                        the diploma is equivalent to a master’s diploma.',
                            ])
                            @endcomponent

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-{{$size}}-6">
                <div class="section-holder texture">

                    @include('cv.decorated-box')

                    @include('cv.component-title-start', ['title' => 'Workshops and courses ', 'icon' => 'ion-ios-book-outline'])


                    <div class="skill-holder">
                        @component('cv.component-achievements', [
                            'title' => 'Workshops',
                            'achievements' => [
                                'Startup Academy' => '5 months seminar, divided into 20 modules about starting
                                        and growing a business. Including personal improvement education (2010)',
                                'Know!' => 'one month workshop on 3 modules: Communication, Leadership,
                                        Client Orientation (2012)',
                                'Ernst & Young' => 'one week workshop on management tactics (2013)',
                                'Legacy Training UK' => 'Real Estate Investing (2016)',
                                'Success Resources' => 'Trading Strategies by Sandy Jadeja (2017)',
                        ]])
                        @endcomponent

                        @component('cv.component-achievements', [
                            'title' => 'Online Courses',
                            'achievements' => [
                                'Coursera' => 'Programming Mobile Applications for Android Handheld Systems
                                        by University of Maryland (2016)',
                                'Coursera ' => 'Pattern-Oriented Software Architectures:
                                        Programming Mobile Services for Android by Vanderblit University (2016)',
                        ]])
                        @endcomponent

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
