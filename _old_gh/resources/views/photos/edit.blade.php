@extends('layouts.admin')

<?php
/** @var \App\Photo $photo */
/** @var \App\Tag $tag */
?>

@section('content')
    <div class="row">
        <h4>
            Edit photo
        </h4>
        {!! Form::model($photo, [
            'method' => 'PATCH',
            'action' => ['PhotoController@update', $photo->id]
        ]) !!}

        @include('components.forms.photo', [
            'submitButtonText' => 'Update',
            'tags' => $tags,
            'existingTagsJson' => $existingTagsJson,
            'allTagsJson' => $allTagsJson,
            'photo' => $photo,
        ])

    {!! Form::close() !!}
    </div>
@stop