@extends('layouts.user')
@section('title', 'Photos')

<?php
/** @var \App\Tag $tag */
/** @var \App\Photo $photo */
?>

@section('content')
    <div class="row cards-container-color">
        <div class="col s10 offset-s1 cards-tag-selector-color card">
            <h5>Categories:</h5>
            <div class="chips">
                @foreach($categories as $category)
                    @if ( $search == $category)
                        <a href="{{route('photos.index')}}"
                        class="chip green">
                            {{ $category }}
                            <i class="material-icons right deselect-chip">close</i>
                    </a>
                    @else
                        <a href="{{route('photos.index', ['search' => $category])}}"
                        class="chip">
                            {{ $category }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col s10 offset-s1 cards-tag-selector-color card">
            <h5>Tags:</h5>
            <div class="chips">
                @foreach($tags as $tag)
                    @if ($search == $tag->name)
                        <a href="{{route('photos.index')}}"
                        class="chip green">
                            {{ $tag->name }}
                            <i class="material-icons right">close</i>
                        </a>
                    @else
                    <a href="{{route('photos.index', ['search' => $tag->name])}}"
                        class="chip">
                            {{ $tag->name }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 cards-container cards-container-color">
            @forelse($photos as $photo)
                @include('components.photo-card', ['photo' => $photo])
            @empty
                No Photos found
            @endforelse
        </div>
    </div>
@stop
