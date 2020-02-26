<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
