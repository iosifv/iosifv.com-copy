<div class='form-group'>
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('meta', 'Meta:') !!}
    {!! Form::textarea('meta', empty($tag) ? '{}' : $tag->getPrettyMeta(), ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>