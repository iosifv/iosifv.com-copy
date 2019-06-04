@extends('layouts.admin')

@section('content')

    {!! Form::model($tag, [
        'method' => 'PATCH',
        'action' => ['TagController@update', $tag->id]
    ]) !!}

    @include('components.forms.tag', ['tag' => $tag, 'submitButtonText' => 'Edit Tag'])

    {!! Form::close() !!}

@stop