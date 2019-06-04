@extends('layouts.show-photo')
@section('title', 'Photo: ' . $photo->name)

@section('content')

    @include('components.photo-card', ['photo' => $photo])

@stop