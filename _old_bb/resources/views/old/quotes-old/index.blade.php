@extends('layouts.base')
@section('title', 'Quotes')

@section('body')

    <h5>Tags:</h5>
    @foreach($tags as $tag)
        @if ($search == $tag->name)
            <a href="{{route('quotes.index')}}">
                {{ $tag->name }}
            </a>
        @else
            <a href="{{route('quotes.index', ['search' => $tag->name])}}">
                {{ $tag->name }}
            </a>
        @endif
    @endforeach
    <div class="our-service-sass theme-more-feature hide-pr">
        <div class="container">
            <div class="theme-title-one text-center">
                <h2 class="main-title">More Features</h2>
            </div> <!-- /.theme-title-one -->
            <div class="inner-wrapper">
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
@stop
