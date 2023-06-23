@extends('layouts.user')
@section('title', 'Photos')

<?php
/** @var \App\Tag $tag */
/** @var \App\Photo $photo */
?>

@section('content')

    <div class="our-service-sass theme-more-feature hide-pr" style="padding: 65px 0 0px;">
        <div class="container">
            <div class="theme-title-one text-center">
                <h2 class="main-title">Photos{{ $search ? ": {$search}" : '' }}</h2>
                @if ($search)
                    <a href="{{ route('photos.index') }}" class="download-button">
                        Back to all photos
                    </a>
                @endif
            </div> <!-- /.theme-title-one -->
            @if (!$search)
                <div class="inner-wrapper inner-content">
                    <div class="main-title">
                        @include('components.clouds.category', [
                            'tags' => $tags,
                            'search' => $search
                        ])
                    </div>
                    {{-- Todo: make it so that any of these can work independently --}}
                    {{--                <div class="row">--}}
                    {{--                    @include('components.clouds.tag', [--}}
                    {{--                        'tags' => $tags,--}}
                    {{--                        'search' => $search,--}}
                    {{--                        'route' => 'photos.index'--}}
                    {{--                    ])--}}
                    {{--                </div>--}}
                </div>
            @endif
        </div> <!-- /.container -->
    </div> <!-- /.our-service-sass -->

    <!-- Element Style -->
    <div class="element-section mb-200">
        <div class="section-portfo our-project-portfo m0">
            <div id="isotop-gallery-wrapper">
                <div class="grid-sizer"></div>
                @forelse($photos as $photo)
                    @include('components.cards.photo', ['photo' => $photo])
                @empty
                    No photos found
                @endforelse
            </div>
        </div> <!-- /.our-project-portfo -->
    </div>

@stop
