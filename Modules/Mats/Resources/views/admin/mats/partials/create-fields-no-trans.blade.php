<div class='form-group{{ $errors->has('price') ? ' has-error' : '' }}'>
    {!! Form::label('price', trans('mats::mats.form.price')) !!}
    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => trans('mats::mats.form.price')]) !!}
    {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
</div>