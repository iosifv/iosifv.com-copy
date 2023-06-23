@extends('layouts.user')
@section('title', 'Quotes')

<?php
/** @var \App\Tag $tag */
/** @var \App\Quote $quote */
?>

@section('content')

    <div class="our-service-sass theme-more-feature hide-pr" style="padding: 65px 0 0px;">
        <div class="container">
            <div class="theme-title-one text-center">
                <h2 class="main-title">Quotes{{ $search ? ": {$search}" : '' }}</h2>
                @if ($search)
                    <a href="{{ route('quotes.index') }}" class="download-button">
                        Back to all quotes
                    </a>
                @endif
            </div> <!-- /.theme-title-one -->

            <div class="inner-wrapper inner-content">
                @if (!$search)
                    {{-- Todo: Make the tags work with quotes --}}
                    {{--                    <div class="row">--}}
                    {{--                        @include('components.clouds.tag', [--}}
                    {{--                            'tags' => $tags,--}}
                    {{--                            'search' => $search,--}}
                    {{--                            'route' => 'quotes.index',--}}
                    {{--                        ])--}}
                    {{--                    </div>--}}
                @endif
                <div class="row">
                    @forelse($quotes as $quote)
                        @include('components.cards.quote', ['quote' => $quote])
                    @empty
                        No quotes found
                    @endforelse
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.our-service-sass -->

    {{--    <div class="element-section mb-200">--}}
    {{--        <div class="section-portfo our-project-portfo m0">--}}
    {{--            <div id="isotop-gallery-wrapper">--}}
    {{--                <div class="grid-sizer"></div>--}}
    {{--                    @forelse($quotes as $quote)--}}
    {{--                        @include('components.cards.quote', ['quote' => $quote])--}}
    {{--                    @empty--}}
    {{--                        No quotes found--}}
    {{--                    @endforelse--}}
    {{--                </div>--}}
    {{--            </div> <!-- /.our-project-portfo -->--}}
    {{--        </div>--}}


    {{--    <div class="our-project-portfo">--}}
    {{--        <div id="isotop-gallery-wrapper">--}}
    {{--            @forelse($quotes as $quote)--}}
    {{--                @include('components.cards.quote', ['quote' => $quote])--}}
    {{--            @empty--}}
    {{--                No quotes found--}}
    {{--            @endforelse--}}
    {{--        </div>--}}
    {{--    </div>--}}

@stop
