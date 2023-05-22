@extends('layouts.show-quote')
@section('title', 'Quote by: ' . $quote->getAuthorName())

@section('fb-description', $quote->text)
@section('fb-url', route('quotes.show-slug', ['slug' => $quote->slug]) )
@section('fb-image', asset('assets/images/logo/logo-770x770.png') )

@section('content')

    @include('components.cards.quote', ['quote' => $quote])

@stop
