@extends('layouts.show-quote')
@section('title', 'Quote by: ' . $quote->getAuthorName())
@section('content')

    @include('components.quote-card', ['quote' => $quote])

@stop