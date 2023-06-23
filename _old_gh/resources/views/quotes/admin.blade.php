@extends('layouts.admin')

<?php
/**
 * @var \App\Quote $quote
 */
?>
@section('content')
    <div class="container">
        <div class="left">
            <h1>Quotes</h1>
        </div>
        <div class="right">
            <h1>
                <a href="{{ route('quotes.create') }}" class="btn-floating btn-large red">
                    <i class="material-icons medium">add</i>
                </a>
            </h1>
        </div>
    </div>
    <table class="table table-striped table-bordered highlight">
        <thead>
        <tr>
            <td>Actions</td>
            <td>Author</td>
            <td>Content</td>
            <td>Description</td>
        </tr>
        </thead>
        <tbody>
        @forelse($quotes as $quote)
            <tr>
                <td class="center">
                    <a class="btn btn-small" href="{{ route('quotes.show', ['id' => $quote->id]) }}">
                        {{ $quote->id }}
                    </a>

                    <a class="btn-floating blue" href="{{ route('quotes.edit', ['id' => $quote->id]) }}">
                        <i class="material-icons">edit</i>
                    </a>

                    {!! Form::model($quote, [
                        'method' => 'DELETE',
                        'action' => ['QuoteController@destroy', $quote->id],
                        'class' => 'btn-floating red'
                    ]) !!}
                        {{ Form::button(
                            '<i class="material-icons">delete</i>',
                            ['type' => 'submit', 'class' => 'btn-floating red'] )
                        }}
                    {!! Form::close() !!}

                    <p>
                        <a class="btn btn-small" href="{{ route('quotes.show-slug', ['slug' => $quote->slug]) }}">
                            {{ $quote->slug }}
                        </a>
                    </p>
                </td>
                <td>{{ $quote->getAuthorName() }}</td>
                <td>
                    <p>
                        {{ $quote->text }}
                    </p>
                    @foreach($quote->tags as $tag)
                        <a class="btn">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </td>
                <td>{{ $quote->description }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No quotes found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@stop