@extends('layouts.material-admin')

@section('content')

    <h1>Create a Tag</h1>

    <pre>
        {{ var_export(\App\Tag::TYPES) }}
    </pre>

    {!! Form::open(['action' => 'TagController@store']) !!}
    @include('components.forms.tag', [
        'submitButtonText' => 'Create Tag',
        'tag' => $tag ?? null
    ])
    {!! Form::close() !!}

@stop
