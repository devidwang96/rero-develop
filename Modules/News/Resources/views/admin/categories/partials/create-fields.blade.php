<div class="box-body">
    {{  dump($errors) }}
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('news::category.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.[title]"), ['class' => 'form-control', 'placeholder' => trans('news::category.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}

    </div>
    <div class='form-group{{ $errors->has("$lang.teaser") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[teaser]", trans('news::category.form.teaser')) !!}
        {!! Form::text("{$lang}[teaser]", old("$lang.[teaser]"), ['class' => 'form-control teaser', 'placeholder' => trans('news::category.form.teaser')]) !!}
        {!! $errors->first("$lang.teaser", '<span class="help-block">:message</span>') !!}
    </div>

</div>