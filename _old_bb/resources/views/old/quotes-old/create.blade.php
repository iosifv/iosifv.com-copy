@extends('layouts.material-admin')

@section('content')

    <h1>Create a Quote</h1>

    {!! Form::open(['action' => 'QuoteController@store']) !!}
    @include('components.forms.quote', [
        'submitButtonText' => 'Add Quote',
        'tags' => $tags,
    ])
    {!! Form::close() !!}

@stop
