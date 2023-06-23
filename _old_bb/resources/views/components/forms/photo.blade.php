<?php
/** @var \App\Photo $photo */
/** @var \App\Tag $tag */
/** @var \Illuminate\Support\Collection $allTags */
?>
<div class="col s6">
    <div class='form-group'>
        <img src="{{ $photo->storage_path }}" class="responsive-img">
    </div>
</div>
<div class="col s6">
    <div class="row">

    </div>
    <div class='form-group'>Category: {{ $photo->category }}</div>
    <div class='form-group'>File Name: {{ $photo->file_name }}</div>
    <div class='form-group'>Public Path: {{ $photo->public_path }}</div>
    <div class='form-group'>Storage Path: {{ $photo->storage_path }}</div>
    {!! Form::hidden('category', $photo->category) !!}
    {!! Form::hidden('file_name', $photo->file_name) !!}
    {!! Form::hidden('public_path', $photo->public_path) !!}
    {!! Form::hidden('storage_path', $photo->storage_path) !!}
    {!! Form::hidden('height', $photo->height) !!}
    {!! Form::hidden('width', $photo->width) !!}

    <div class='form-group'>
        {!! Form::label('slug', 'Slug:') !!}
        {!! Form::text('slug', $photo->slug, ['class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $photo->name, ['class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>

    {{ Form::label('tags', 'Tags:') }}
    <div class="chips chips-initial chips-autocomplete">
        {{-- Filled by JS --}}
    </div>

    {!! Form::hidden('tags-text', null, ['class' => 'form-control', 'id' => 'tags-text']) !!}

    <div class='form-group'>
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
    </div>
</div>

<script>
    let options = {
        data: {!! $existingTagsJson ?? '' !!},
        autocompleteOptions: {
            data: {!! $allTagsJson !!},
            limit: Infinity,
            minLength: 1
        },
        onChipAdd: function (elem) {
            $('#tags-text').val($('.chips').text().trim());
        },
        onChipDelete: function () {
            $('#tags-text').val($('.chips').text().trim());
        }
    };

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.chips');
        var instances = M.Chips.init(elems, options);

        $('#tags-text').val($('.chips').text().trim());
    });
</script>
