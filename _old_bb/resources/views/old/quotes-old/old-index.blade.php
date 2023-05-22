@extends('layouts.user')
@section('title', 'Quotes')

@section('content')
    <div class="row">
        <div class="col s10 offset-s1 cards-tag-selector-color card">
            <h5>Tags:</h5>
            <div class="chips">
                @foreach($tags as $tag)
                    @if ($search == $tag->name)
                        <a href="{{route('quotes.index')}}"
                        class="chip green">
                            {{ $tag->name }}
                            <i class="material-icons right deselect-chip">close</i>
                        </a>
                    @else
                    <a href="{{route('quotes.index', ['search' => $tag->name])}}"
                        class="chip">
                            {{ $tag->name }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col s12 cards-container">
            @forelse($quotes as $quote)
                @include('components.cards.quote', ['quote' => $quote])
            @empty
                No quotes found
            @endforelse
        </div>
    </div>
@stop
