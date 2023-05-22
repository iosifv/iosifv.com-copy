<?php
/** @var \App\Quote $quote */
/** @var \App\Tag $tag */
/** @var \Illuminate\Support\Collection $allTags */
?>
<div class='form-group'>
    {!! Form::label('text', 'Text:') !!}
    {!! Form::text('text', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

{{ Form::label('tags', 'Tags:') }}
<div class="chips chips-initial chips-autocomplete">
    {{-- Filled by JS --}}
</div>

{!! Form::hidden('tags-text', null, ['class' => 'form-control', 'id' => 'tags-text']) !!}

<div class='form-group'>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>

<script>
    let options = {
        data: {!! $existingTagsJson !!},
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