@extends('layouts.admin')

<?php
/** @var \App\Photo $photo */
?>

@section('content')
    <h1>Photos</h1>

    @forelse($photos as $photo)
        <div class="row">

            {{-- Photo --}}
            <div class="col s3">
                <img src="{{ $photo->storage_path }}" class="responsive-img">
            </div>

            {{-- Info & links --}}
            <div class="col s4">
                <a class="btn btn-small blue">{{ $photo->category }}</a>
                @if ($photo->id)
                    <a href="{{ route('photos.show', ['id' => $photo->id]) }}" class="btn btn-small btn">
                        {{ $photo->id }}
                    </a>
                    <a href="{{ route('photos.show-slug', ['slug' => $photo->slug]) }}" class="btn btn-small">
                        {{ $photo->slug }}
                    </a>
                @endif

                {{-- Storage paths --}}
                <ul>
                    <li>
                        <a href="{{ $photo->storage_path }}">{{ $photo->storage_path }}</a>
                    </li>
                    <li>
                        {{ $photo->public_path }}
                    </li>
                </ul>

                {{-- Photo info --}}
                <a class="btn btn-small disabled">
                    {{ $photo->width }}x{{ $photo->height }}
                </a>
            </div>

            {{-- Descriptions --}}
            <div class="col s3">
                <h5>
                    {{ $photo->name }}
                </h5>
                <p>
                    {{ $photo->description }}
                </p>
                <div class="chips">
                    @forelse($photo->tags as $tag)
                        <div class="chip">
                            {{ $tag->name }}
                        </div>
                    @empty
                        No tags
                    @endforelse
                </div>
            </div>

            {{-- Buttons --}}
            <div class="col s2">
                @if (empty($photo->id))
                    {!! Form::model($photo, [
                        'method' => 'PUT',
                        'action' => ['PhotoController@create'],
                        'class' => 'btn-floating green'
                    ]) !!}
                    {!! Form::hidden('storage_path', $photo->storage_path) !!}
                    {!! Form::hidden('public_path', $photo->public_path) !!}

                    {{ Form::button(
                        '<i class="material-icons">add</i>',
                        ['type' => 'submit', 'class' => 'btn-floating green'] )
                    }}
                    {!! Form::close() !!}
                @else
                    <a class="btn-floating blue"
                       href="{{ route('photos.edit', ['id' => $photo->id]) }}">
                        <i class="material-icons">edit</i>
                    </a>
                    {!! Form::model($photo, [
                        'method' => 'DELETE',
                        'action' => ['PhotoController@destroy', $photo->id],
                        'class' => 'btn-floating red'
                    ]) !!}
                    {{ Form::button(
                        '<i class="material-icons">delete</i>',
                        ['type' => 'submit', 'class' => 'btn-floating red'] )
                    }}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    @empty
        No Photos found :(
    @endforelse

@stop