@extends('layouts.admin')

<?php
/** @var \App\Tag $tag */
?>

@section('content')
    <div class="container">
        <div class="left">
            <h1>Tags</h1>
        </div>
        <div class="right">
            <h1>
                <a href="{{ route('tags.create') }}" class="btn-floating btn-large red">
                    <i class="material-icons medium">add</i>
                </a>
            </h1>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Type</td>
            <td>Name</td>
            <td>Meta</td>
            <td>Usage</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->getTypeName() }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                    @forelse($tag->getAllMeta() as $metaKey => $metaValue)
                        {{ $metaKey }} => {{ $metaValue }} <br>
                    @empty
                        No Meta fields.
                    @endforelse
                </td>
                <td>
                    {{ $tag->quotes()->count() }}
                </td>

                <td>
                    <a class="btn-floating blue" href="{{ route('tags.edit', ['id' => $tag->id]) }}">
                        <i class="material-icons">edit</i>
                    </a>
                    {!! Form::model($tag, [
                        'method' => 'DELETE',
                        'action' => ['TagController@destroy', $tag->id],
                        'class' => '',
                    ]) !!}
                        <?php $isDisabled = ($tag->quotes()->count() > 0) ? ' disabled' : ''; ?>
                        {{ Form::button(
                            '<i class="material-icons">delete</i>', [
                                'type' => 'submit',
                                'class' => 'btn-floating red' . $isDisabled,
                                ] )
                        }}
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No Tags found</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@stop