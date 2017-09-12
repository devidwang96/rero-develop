<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        <?php $oldTitle = isset($mat->translate($lang)->title) ? $mat->translate($lang)->title : ''; ?>
        {!! Form::label("{$lang}[title]", trans('mats::mats.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.[title]", $oldTitle), ['class' => 'form-control', 'placeholder' => trans('mats::mats.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}

    </div>
    <div class='form-group{{ $errors->has("$lang.teaser") ? ' has-error' : '' }}'>
        <?php $oldContain = isset($mat->translate($lang)->teaser) ? $mat->translate($lang)->teaser : ''; ?>
        {!! Form::label("{$lang}[teaser]", trans('mats::mats.form.teaser')) !!}
        {!! Form::text("{$lang}[teaser]", old("$lang.[teaser]", $oldContain), ['class' => 'form-control teaser', 'placeholder' => trans('mats::mats.form.teaser')]) !!}
        {!! $errors->first("$lang.teaser", '<span class="help-block">:message</span>') !!}
    </div>

    <?php $old = isset($mat->translate($lang)->full_description) ? $mat->translate($lang)->full_description : ''; ?>
    @editor('full_description', trans('mats::mats.form.full_description'), old("{$lang}.full_description", $old), $lang)
</div>
