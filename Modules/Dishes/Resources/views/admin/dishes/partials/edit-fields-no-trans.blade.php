<div class='form-group{{ $errors->has('price') ? ' has-error' : '' }}'>
    <?php $oldPrice = isset($dish->price) ? $dish->price : ''; ?>
    {!! Form::label('price', trans('dishes::dishes.form.price')) !!}
    {!! Form::text('price', old('price', $oldPrice), ['class' => 'form-control', 'placeholder' => trans('dishes::dishes.form.price')]) !!}
    {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
</div>