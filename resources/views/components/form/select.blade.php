<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {!! Form::select($name, $value, $selected, array_merge(['class' => 'form-control'], $attributes)) !!}
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
