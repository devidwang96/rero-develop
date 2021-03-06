<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('mats::mats.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.[title]"), ['class' => 'form-control', 'placeholder' => trans('mats::mats.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}

    </div>
    <div class='form-group{{ $errors->has("$lang.teaser") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[teaser]", trans('mats::mats.form.teaser')) !!}
        {!! Form::text("{$lang}[teaser]", old("$lang.[teaser]"), ['class' => 'form-control teaser', 'placeholder' => trans('mats::mats.form.teaser')]) !!}
        {!! $errors->first("$lang.teaser", '<span class="help-block">:message</span>') !!}
    </div>

    @editor('full_description', trans('mats::mats.form.full_description'), old("{$lang}.full_description"), $lang)
</div>

