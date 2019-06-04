@extends('layouts.admin')

<?php
/** @var \App\Photo $photo */
/** @var \App\Tag $tag */
?>

@section('content')
    <div class="row">
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
    </div>
@stop