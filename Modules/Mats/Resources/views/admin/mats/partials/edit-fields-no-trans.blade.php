<div class='form-group{{ $errors->has('price') ? ' has-error' : '' }}'>
    <?php $oldPrice = isset($mat->price) ? $mat->price : ''; ?>
    {!! Form::label('price', trans('mats::mats.form.price')) !!}
    {!! Form::text('price', old('price', $oldPrice), ['class' => 'form-control', 'placeholder' => trans('mats::mats.form.price')]) !!}
    {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
</div>