<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {!! Form::select($name.($multiple ? '[]' : ''), $value, $selected, array_merge(['class' => 'form-control select2', $multiple ? 'multiple="multiple"' : ''], $attributes)) !!}
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
