
<div class="box-body">
    <?php $oldTitle = isset($matcategory->translate($lang)->title) ? $matcategory->translate($lang)->title : ''; ?>
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('mats::matcategories.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.[title]", $oldTitle), ['class' => 'form-control', 'placeholder' => trans('mats::matcategories.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}

    </div>

</div>

<div class="hidden">
    <?php $oldTeaser = isset($matcategory->translate($lang)->teaser) ? $matcategory->translate($lang)->title : ''; ?>
    <div class='form-group{{ $errors->has("$lang.teaser") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[teaser]", trans('mats::matcategories.form.teaser')) !!}
        {!! Form::text("{$lang}[teaser]", old("$lang.[teaser]", $oldTeaser), ['class' => 'form-control teaser', 'placeholder' => trans('mats::matcategories.form.teaser')]) !!}
        {!! $errors->first("$lang.teaser", '<span class="help-block">:message</span>') !!}
    </div>
</div>