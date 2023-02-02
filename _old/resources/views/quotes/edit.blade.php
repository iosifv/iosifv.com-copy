@extends('layouts.admin')

@section('content')
    <div class="row">
        <h4>
            Edit quote
        </h4>
        {!! Form::model($quote, [
            'method' => 'PATCH',
            'action' => ['QuoteController@update', $quote->id]
        ]) !!}

        @include('components.forms.quote', [
            'submitButtonText' => 'Update',
            'tags' => $tags,
            'existingTagsJson' => $existingTagsJson,
            'allTagsJson' => $allTagsJson,
            'quote' => $quote,
        ])

        {!! Form::close() !!}
    </div>
@stop