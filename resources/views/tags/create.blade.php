@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-10 offset-1">
            <h1>Create a Tag</h1>

            <pre>
                {{ var_export(\App\Tag::TYPES) }}
            </pre>

            {!! Form::open(['action' => 'TagController@store']) !!}
            @include('components.forms.tag', [
                'submitButtonText' => 'Add Quote',
                'tag' => $tag ?? null
            ])
            {!! Form::close() !!}
        </div>
    </div>
@stop