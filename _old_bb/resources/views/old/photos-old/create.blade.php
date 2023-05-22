@extends('layouts.material-admin')

<?php
/** @var \App\Photo $photo */
/** @var \App\Tag $tag */
?>

@section('content')
    <h4>
        Create photo
    </h4>
    {!! Form::open(['action' => 'PhotoController@store']) !!}

    @include('components.forms.photo', [
        'submitButtonText' => 'Create',
        'allTags' => $allTags,
        'photo' => $photo,
    ])

    {!! Form::close() !!}
@stop
