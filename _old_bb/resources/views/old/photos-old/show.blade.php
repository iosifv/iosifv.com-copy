@extends('layouts.show-photo')
@section('title', 'Photo: ' . $photo->name)
@section('fb-description', $photo->description)
@section('fb-url', route('photos.show-slug', ['slug' => $photo->slug]) )
@section('fb-image', Request::root() . $photo->storage_path)

@section('content')

    @include('components.photo-card', ['photo' => $photo])

@stop
